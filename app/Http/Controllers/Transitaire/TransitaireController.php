<?php

namespace App\Http\Controllers\Transitaire;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\offre;
use App\Models\reservation;



class TransitaireController extends Controller
{
    //
    public function TransitaireDashboard()
    {
        $reservations = Reservation::where('id_Transitaire', Auth::user()->id)->get();
        $totalReservationsCount = $reservations->count();
        $acceptedReservationsCount = $reservations->where('status', 'accepted')->count();
        $rejectedReservationsCount = $reservations->where('status', 'rejected')->count();
        $attenteReservationsCount = $reservations->where('status', 'attente')->count();

        $labels = ['Total', 'Accepted', 'Rejected', 'Attente'];
        $data = [$totalReservationsCount, $acceptedReservationsCount, $rejectedReservationsCount, $attenteReservationsCount];

        return view('Transitaire.dashboard-transitaire', compact('totalReservationsCount', 'acceptedReservationsCount', 'rejectedReservationsCount', 'attenteReservationsCount', 'labels', 'data'));
    }



    public function create_transitaire(Request $requset)
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
public function search(Request $request)
{
    $airport_depart = $request->input('airport_depart');
    $airport_arrive = $request->input('airport_arrive');
    $jour_depart = $request->input('jour_depart');
    $service = $request->input('service');
    $quantite = $request->input('quantite');
    $longeur = $request->input('longeur');
    $largeur = $request->input('largeur');
    $hauteur = $request->input('hauteur');
    $poids = $request->input('poids');
    $type = $request->input('type');
    $nature = $request->input('nature');
    $Stockage = $request->input('Stockage');
    $Etat = $request->input('Etat');

    $donnees = [
        'service' => $service,
        'quantite' => $quantite,
        'longeur' => $longeur,
        'largeur' => $largeur,
        'hauteur' => $hauteur,
        'poids' => $poids,
        'nature' => $nature,
        'type' => $type,
        'Stockage' => $Stockage,
        'Etat' => $Etat
    ];


    $request->session()->put('donnees', $donnees);

  $offres = offre::when($airport_depart, function ($query) use ($airport_depart) {
        return $query->where('airport_depart', $airport_depart);
    })
    ->when($airport_arrive, function ($query) use ($airport_arrive) {
        return $query->where('airport_arrive', $airport_arrive);
    })
    ->when($jour_depart, function ($query) use ($jour_depart) {
        return $query->whereDate('jour_depart', '>=', $jour_depart);
    })
    ->orderBy('jour_depart', 'asc')
    ->get();


    return view('Transitaire.Search', compact('offres'));

}




public function reservation(Request $request)
{
    $id = $request->reservationId;
    $donnees = session('donnees');
    $offre = offre::with('user')->find($id);

    $poids_total = $this->poids_totla($donnees['poids'],$donnees['quantite']);
    $poids_taxable = $this->poids_taxable($donnees['longeur'],$donnees['largeur'],$donnees['hauteur'],$donnees['quantite'],$donnees['poids']);

    $prix_total = $offre->tarif_kg * $poids_taxable ;

    $reservation1 = [
        'offre_id' => $offre,
        'poids_total' => $poids_total,
        'poids_taxable' => $poids_taxable,
        'prix_total' => $prix_total,
    ];

    $request->session()->put('reservation1', $reservation1);

    return view('Transitaire.reservation',['donnees'=> $donnees, 'offre'=> $offre,'prix_total'=>$prix_total,'poids_taxable'=>$poids_taxable,'poids_total'=>$poids_total]);
}

public function poids_totla(float $poids,int $quantite){
return $poids*$quantite;
}

public function volume_m3(float $longer,float $largeur,float $hauteur, int $quantite){
$longer_m = $longer/100;
$largeur_m = $largeur/100;
$hauteur_m = $hauteur/100;

return $longer_m*$largeur_m*$hauteur_m*$quantite;

}

public function poids_taxable(float $longer,float $largeur,float $hauteur, int $quantite,float $poids){
$x = ($this->volume_m3($longer,$largeur,$hauteur,$quantite)/6)*1000;
if ($x >=$this->poids_totla($poids,$quantite))
    return $x;
else
   return $this->poids_totla($poids,$quantite);
}


public function store_reservation(Request $request)
{
$reservation = new reservation();
$reservation1 = session('reservation1');
$donnees = session('donnees');
$reservation->Service = $donnees['service'];
$reservation->quantite = $donnees['quantite'];
$reservation->longueur = $donnees['longeur'];
$reservation->largeur = $donnees['largeur'];
$reservation->hauteur = $donnees['hauteur'];
$reservation->poids = $donnees['poids'];
$reservation->type = $donnees['type'];
$reservation->nature = $donnees['nature'];
$reservation->stockage = $donnees['Stockage'];
$reservation->etat = $donnees['Etat'];
$reservation->poids_total = $reservation1['poids_total'];
$reservation->poids_taxable = $reservation1['poids_taxable'];
$reservation->prix_total = $reservation1['prix_total'];

$offre = $reservation1['offre_id'];
$reservation->offre_id =  $reservation1['offre_id'];
$reservation->id_Transitaire =  Auth::User()->id;
$reservation->code = $request->input('code');
$reservation->type_code = $request->input('code_type');

$offre->reservation()->save($reservation);



return view('Transitaire.recherche');
}

public function liste_des_reservations_transitaire()
{
    $reservations = Reservation::where('id_Transitaire', Auth::user()->id)->get();

    return view('Transitaire.liste_des_reservations_transitaire', compact('reservations'));
}

}
