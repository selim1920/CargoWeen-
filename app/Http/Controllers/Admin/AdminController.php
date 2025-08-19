<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Mail\ApprovedAccountMail;
use App\Mail\RejectedAccountMail;
use App\Models\offre;
use App\Models\reservation;
use Carbon\Carbon;


class AdminController extends Controller
{
    //
    public function AdminDashboard()
    {
        $reservationsPerMonth = DB::table('reservations')
            ->select(
                DB::raw('COUNT(*) as reservations_count'),
                DB::raw('MONTH(created_at) as month')
            )
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $labels = [];
        $data = [];

        // Create an array of all the months
        $allMonths = Carbon::parse('2023-01-01')->format('n');
        for ($i = 1; $i <= 12; $i++) {
            $labels[] = Carbon::parse('2023-' . $i . '-01')->format('M');
            $data[] = 0; // Initialize the count to 0 for each month
        }

        // Update the counts for the existing reservations
        foreach ($reservationsPerMonth as $reservation) {
            $month = $reservation->month;
            $data[$month - 1] = $reservation->reservations_count;
        }

        // Fetch the number of offers for each user
        $offersPerUser = Offre::select('id_user', DB::raw('COUNT(*) as offers_count'))
            ->groupBy('id_user')
            ->get();

        $userLabels = [];
        $userOfferCounts = [];

        // Populate the user labels and offer counts
        foreach ($offersPerUser as $offer) {
            $user = User::find($offer->id_user);
            $userLabels[] = $user->name;
            $userOfferCounts[] = $offer->offers_count;
        }

        return view('Admin.index-admin', compact('labels', 'data', 'userLabels', 'userOfferCounts'));
    }





    public function AjouterAdmin(Request $requset)
    {
        $requset->validate([

                    'name'=>'required',
                    'email'=>'required',
                    'password'=>'required',
                    'confirm_password'=>'required',



        ], );
        $user= new user();
        $user->name = $requset->name;
        $user->email = $requset->email;
        $user->role = 'Admin';
        $user->status = 'accepted';
        $user->password= $requset->password;
        $user->confirm_password = $requset->confirm_password;

        $save = $user->save();
        if($save){
            return redirect()->back()->with('success','You are now registered successfully');
    }else {
        return  redirect()->back()->with('fail','Somethingn went wrong, fails to register ');
    }
}


    public function create_transitaire_admin(Request $requset)
    {
        $requset->validate([
                    'name'=>'required',
                    'prenom'=>'required',
                    'adresse'=>'required',
                    'ville'=>'required',
                    'code_postal'=>'required',
                    'pays'=>'required',
                    'fonction'=>'required',
                    'email'=>'required|email',
                    'telephone'=>'required',
                    'numero_cass'=>'required',

        ], );
        $user= new user();
        $user->name = $requset->name;
        $user->prenom = $requset->prenom;
        $user->adresse = $requset->adresse;
        $user->ville = $requset->ville;
        $user->code_postal = $requset->code_postal;
        $user->pays = $requset->pays;
        $user->fonction = $requset->fonction;
        $user->email = $requset->email;
        $user->role = 'Transitaire';
        $user->telephone= $requset->telephone;
        $user->numero_cass = $requset->numero_cass;

        $save = $user->save();
        if($save){
            return redirect()->back()->with('success','You are now registered successfully');
    }else {
        return  redirect()->back()->with('fail','Somethingn went wrong, fails to register ');
    }
}
public function create_compagnie_admin(Request $requset)
    {
        $requset->validate([
                    'name'=>'required',
                    'prenom'=>'required',
                    'nom_compagnie_aerienne'=>'required',
                    'adresse'=>'required',
                    'ville'=>'required',
                    'code_postal'=>'required',
                    'pays'=>'required',
                    'fonction'=>'required',
                    'email'=>'required|email',
                    'telephone'=>'required',
                    'code_airport'=>'required',
                    'code_LATA'=>'required',

        ], );
        $user= new user();
        $user->name = $requset->name;
        $user->prenom = $requset->prenom;
        $user->nom_compagnie_aerienne= $requset->nom_compagnie_aerienne;
        $user->prenom = $requset->prenom;
        $user->adresse = $requset->adresse;
        $user->ville = $requset->ville;
        $user->code_postal = $requset->code_postal;
        $user->pays = $requset->pays;
        $user->fonction = $requset->fonction;
        $user->email = $requset->email;
        $user->role = 'CompagnieAerienne';
        $user->telephone= $requset->telephone;
        $user->code_airport= $requset->code_airport;
        $user->code_LATA= $requset->code_LATA;

        $save = $user->save();
        if($save){
            return redirect()->back()->with('success','You are now registered successfully');
    }else {
        return  redirect()->back()->with('fail','Somethingn went wrong, fails to register ');
    }
}


    public function liste_des_users()
    {
        $users = User::where('role', 'Transitaire')
        ->where('status','pending')
        ->get();

        return view('admin.liste_des_users',['users'=>$users]);
    }

    public function liste_users_accepter()
    {
        $users = User::where('role', 'Transitaire')
        ->where('status','accepted')
        ->get();
        return view('admin.liste_users_accepter', ['users' => $users]);
    }


    public function liste_des_compagnie()
    {
        $users = User::where('role', 'CompagnieAerienne')
        ->where('status','pending')
        ->get();

        return view('admin.liste_des_compagnie',['users'=>$users]);
    }

    public function liste_compagnie_accepter()
    {
        $users = User::where('role', 'CompagnieAerienne')
        ->where('status','accepted')
        ->get();
        return view('admin.liste_compagnie_accepter', ['users' => $users]);
    }




    public function destroyUser($id) //
{
      $users = user::find($id);

     $users->delete(); //delete the user

    return redirect('liste_des_users');
}

public function updateStatusUsers(Request $request, $id)
{
    $user = User::findOrFail($id);
    $password = Str::random(8);
    $user->password = Hash::make($password);

    $user->status = $request->input('status');
    $user->save();

    // Send email with password if user's account is approved
    if ($user->status === 'accepted') {
        Mail::to($user->email)->send(new ApprovedAccountMail($password));
    }
    if ($user->status === 'refused') {
        $reason = 'your account does not have access to this webex site';
        // Send email to user
        Mail::to($user->email)->send(new RejectedAccountMail($reason));
        return redirect()->back()->with('fail', 'Le compte n\'a pas été accepté. ');
    }

    return redirect()->back()->with('success', 'Le statut de l\'utilisateur a été accepté.');
}



public function updateStatusUsersCompagnie(Request $request, $id)
{
    $user = User::findOrFail($id);



        $password = Str::random(8);


        $user->password = Hash::make($password);

    $user->status = $request->input('status');
    $user->save();

    // Send email with password if user's account is approved
    if ($user->status === 'accepted') {
        Mail::to($user->email)->send(new ApprovedAccountMail($password));
    }
    if ($user->status === 'refused' ) {
        $reason ='your account does not have access to this webex site';
        // Send email to user
        Mail::to($user->email)->send(new RejectedAccountMail(($reason)));
    }

    return redirect()->back()->with('success', 'Le statut de user a été mis à jour avec succès.');
}


public function liste_offres()
{
    $offres = offre::all();
    return view('admin.liste_des_offres',['offres'=>$offres]);
}


public function crud_offre()
{
    $offres = offre::all();
    return view('admin.crud_offre',['offres'=>$offres]);
}

public function destroyoffre($id)
{
    $offres = offre::find($id);
    $offres->delete();

    return redirect('admin.crud_offre');
}

public function liste_des_reservation()
{
    $reservations = reservation::all();
    return view('admin.liste_des_reservations',['reservations'=>$reservations]);
}
public function updateFlight(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'num_vol' => 'required',
            'nom_compagnie' => 'required',
            'airport_depart' => 'required',
            'airport_arrive' => 'required',
            'jour_depart' => 'required',
            'jour_arrive' => 'required',
            'tarif_kg' => 'required',
        ]);

        // Find the flight by ID
        $flight = Offre::findOrFail($id);

        // Update the flight details
        $flight->num_vol = $request->num_vol;
        $flight->nom_compagnie = $request->nom_compagnie;
        $flight->airport_depart = $request->airport_depart;
        $flight->airport_arrive = $request->airport_arrive;
        $flight->jour_depart = $request->jour_depart;
        $flight->jour_arrive = $request->jour_arrive;
        $flight->tarif_kg = $request->tarif_kg;

        // Save the updated flight
        $flight->save();

        // Redirect back to the flight listing page or any other appropriate page
        return redirect()->route('crud_offre')->with('success', 'Flight details updated successfully.');
    }





}
