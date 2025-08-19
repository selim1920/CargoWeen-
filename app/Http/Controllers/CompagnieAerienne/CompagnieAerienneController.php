<?php

namespace App\Http\Controllers\CompagnieAerienne;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReservationStatusUpdated;
use Carbon\Carbon;
use App\Models\User;
use App\Models\offre;
use App\Models\reservation;




class CompagnieAerienneController extends Controller
{
    //
    public function CompagnieDashboard()
    {
        $user = auth()->user();

        $offerCounts = Offre::where('id_user', $user->id)
            ->selectRaw('DATE_FORMAT(created_at, "%m") as month, COUNT(*) as count')
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('count', 'month')
            ->toArray();

        $allMonths = [
            '01' => 'January',
            '02' => 'February',
            '03' => 'March',
            '04' => 'April',
            '05' => 'May',
            '06' => 'June',
            '07' => 'July',
            '08' => 'August',
            '09' => 'September',
            '10' => 'October',
            '11' => 'November',
            '12' => 'December',
        ];

        $labels = [];
        $data = [];

        foreach ($allMonths as $monthNumber => $monthName) {
            $labels[] = $monthName;
            $data[] = $offerCounts[$monthNumber] ?? 0;
        }

        return view('CompagnieAerienne.dashboard-compagnie-aerienne', compact('user', 'labels', 'data'));
    }



    public function create_compagnie(Request $requset)
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


public function AjouterOffre(Request $request)

{
            $request->validate([
        'num_vol' => 'required',
        'nom_compagnie' => 'required|',
        'airport_depart' => 'required',
        'airport_arrive' => 'required',
        'jour_depart' => 'required',
        'jour_arrive' => 'required',
        'tarif_kg' => 'required',
    ], [
        'name.required' => 'Le champ nom est requis.',
    ]);

    $offre = new offre();
    $offre->num_vol = $request->num_vol;
    $offre->id_user = Auth::User()->id;
    $offre->nom_compagnie = $request->nom_compagnie;
    $offre->airport_depart = $request->airport_depart;
    $offre->airport_arrive = $request->airport_arrive;
    $offre->jour_depart = $request->jour_depart;
    $offre->jour_arrive = $request->jour_arrive;
    $offre->maxquantite = $request->maxquantite;
    $offre->tarif_kg = $request->tarif_kg;
    $save = $offre->save();
if($save){
    return redirect('/AjouterOffre')->with('success', "L'offre est créé avec succès.");

}else {
    return redirect('/AjouterOffre')->with('fail', "L'offre est n'est pas créé .");
}

}

public function liste_offres()
{

    $offres = offre::where('id_user', Auth::User()->id)->get();
    return view('CompagnieAerienne.liste_offre', ['offres' => $offres]);

}

public function destroyOffres($id) //Destruir cliente y todo lo relacionado de la bbdd
    {
        $offres = offre::find($id);
        $offres->delete(); //delete the client


        return redirect('liste_offre');
    }

    public function liste_reservation()
    {
        $compagnieId = Auth::user()->id;
        $reservations = Reservation::with('Transitaire', 'offre')
            ->whereHas('offre', function ($query) use ($compagnieId) {
                $query->where('id_user', $compagnieId);
            })
            ->where('status', 'attente')
            ->get();
        return view('CompagnieAerienne.liste_reservation', ['reservations' => $reservations]);
    }



    public function liste_reservation_accepter()
    {
        $compagnieId = Auth::user()->id;
        $reservations = Reservation::with('Transitaire', 'offre')
            ->whereHas('offre', function ($query) use ($compagnieId) {
                $query->where('id_user', $compagnieId);
            })
            ->where('status', 'accepted')
            ->get();
        return view('CompagnieAerienne.liste_reservation_accepter', ['reservations' => $reservations]);
    }

    public function updateStatus(Request $request, $id)
    {
        $reservation = Reservation::findOrFail($id);

        $offre = offre::find($reservation->offre_id);


        $poids_total = $this->poids_total($reservation->poids, $reservation->quantite);

        $offre->maxquantite = $offre->maxquantite -  $poids_total ;

        $reservation->status = $request->input('status');

        $reservation->save();


        $offre->save();



        Mail::to($reservation->Transitaire->email)->send(new ReservationStatusUpdated($reservation));

        return redirect()->back()->with('success', 'Le statut de la réservation a été mis à jour avec succès.');



    }


    public function poids_total(float $poids,int $quantite){
        return $poids*$quantite;
        }



    public function uploadLogo(Request $request)
    {
        $user = auth()->user();

        // Check that $user is not null and is an instance of the User model class
        if ($user instanceof User) {
            if ($request->hasFile('logo')) {
                $logo = $request->file('logo');
                $logoPath = $logo->store('logos', 'public');
                $user->logo = $logoPath;
                $user->save();
            }
        }

        return redirect('/CompagnieDashboard');
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
        $flight->maxquantite = $request->maxquantite;
        // Save the updated flight
        $flight->save();

        // Redirect back to the flight listing page or any other appropriate page
        return redirect()->route('liste_offres')->with('success', 'Flight details updated successfully.');
    }



}
