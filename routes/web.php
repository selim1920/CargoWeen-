<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CompagnieAerienne\CompagnieAerienneController;
use App\Http\Controllers\Transitaire\TransitaireController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\EmailController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/contacter', function () {
  return view('contacter');
});

Route::post('/contacter', [EmailController::class, 'sendEmail'])->name('sendEmail');


Route::post('AjouterAdmin', [AdminController::class, 'AjouterAdmin'])->name('AjouterAdmin');


Route::get('/', function () {
    return view('welcome');
});

Route::get('/Login', function () {
    return view('Login');
});

Route::get('/sign-up-admin', function () {
    return view('sign-up-admin');
});


Route::get('/AdminLogin', function () {
    return view('admin.AdminLogin');
});

Route::get('/sign-up-compagnie', function () {
    return view('sign-up-compagnie');
});
Route::post('create_compagnie', [CompagnieAerienneController::class, 'create_compagnie'])->name('create_compagnie');

Route::get('/sign-up-transitaire', function () {
    return view('sign-up-transitaire');
});
Route::post('create_transitaire', [TransitaireController::class, 'create_transitaire'])->name('create_transitaire');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


         /*----------------------------
           ------------------------------
           dashboard-Admin route
           ----------------------------
           ------------------------------*/


Route::middleware(['auth','role:Admin'])->group(function (){


           Route::get('/ajouter_transitaire', function () {
            return view('admin.ajouter_transitaire');
        });
        Route::get('/ajouter_compagnie', function () {
            return view('admin.ajouter_compagnie'); });



Route::get('/liste_des_users', [AdminController::class, 'liste_des_users'])->name('liste_des_users');
Route::get('/liste_users_accepter', [AdminController::class, 'liste_users_accepter'])->name('liste_users_accepter');
Route::get('destroyUser/{id}', [AdminController::class, 'destroyUser'])->name('destroyUser');

Route::get('/liste_des_compagnie', [AdminController::class, 'liste_des_compagnie'])->name('liste_des_compagnie');
Route::get('/liste_compagnie_accepter', [AdminController::class, 'liste_compagnie_accepter'])->name('liste_compagnie_accepter');

Route::post('create_transitaire_admin', [AdminController::class, 'create_transitaire_admin'])->name('create_transitaire_admin');
Route::post('create_compagnie_admin', [AdminController::class, 'create_compagnie_admin'])->name('create_compagnie_admin');
Route::get('/AdminDashboard', [AdminController::class, 'AdminDashboard'])->name('AdminDashboard');
Route::post('/liste_des_users/{id}/updateStatusUsers', [AdminController::class, 'updateStatusUsers'])->name('updateStatusUsers');
Route::post('/liste_des_compagnie/{id}/updateStatusUsersCompagnie', [AdminController::class, 'updateStatusUsersCompagnie'])->name('updateStatusUsersCompagnie');
Route::get('/crud_offre', [AdminController::class, 'crud_offre'])->name('crud_offre');
Route::get('destroyoffre/{id}', [AdminController::class, 'destroyoffre'])->name('destroyoffre');
Route::get('/liste_offres', [AdminController::class, 'liste_offres'])->name('liste_offres');
Route::get('/liste_des_reservations', [AdminController::class, 'liste_des_reservation'])->name('liste_des_reservation');
Route::put('/flights/{id}', [AdminController::class, 'updateFlight'])->name('flight.update');


     });

         /*----------------------------
           ------------------------------
            Fin dashboard-Admin route
           ----------------------------
           ------------------------------*/


         /*----------------------------
           ------------------------------
            CompagnieAerienne route
           ----------------------------
           ------------------------------*/



Route::middleware(['auth','role:CompagnieAerienne'])->group(function (){

Route::get('/CompagnieDashboard', [CompagnieAerienneController::class, 'CompagnieDashboard'])->name('CompagnieDashboard');
Route::post('/AjouterOffre', [CompagnieAerienneController::class, 'AjouterOffre'])->name('AjouterOffre');
Route::get('destroyOffres/{id}', [CompagnieAerienneController::class, 'destroyOffres'])->name('destroyOffres');
Route::get('/liste_offre', [CompagnieAerienneController::class, 'liste_offres'])->name('liste_offres');
Route::get('/liste_reservation', [CompagnieAerienneController::class, 'liste_reservation'])->name('liste_reservation');
Route::get('/liste_reservation_accepter', [CompagnieAerienneController::class, 'liste_reservation_accepter'])->name('liste_reservation_accepter');
Route::post('/reservations/{id}/update-status', [CompagnieAerienneController::class, 'updateStatus'])->name('reservations.update-status');
Route::post('/user/logo', [CompagnieAerienneController::class, 'uploadLogo'])->name('user.logo.upload');
Route::put('/flights/{id}', [CompagnieAerienneController::class, 'updateFlight'])->name('flight.update');



 Route::get('/AjouterOffre', function () {
    return view('CompagnieAerienne.AjouterOffre');
});

                      });





         /*----------------------------
           ------------------------------
            Fin CompagnieAerienne route
           ----------------------------
           ------------------------------*/


         /*----------------------------
           ------------------------------
            Transitaire route
           ----------------------------
           ------------------------------*/


Route::middleware(['auth','role:Transitaire'])->group(function (){

     Route::get('/TransitaireDashboard', [TransitaireController::class, 'TransitaireDashboard'])->name('TransitaireDashboard');
     Route::get('search', [TransitaireController::class, 'search'])->name('search');
     Route::get('/recherche', function () { return view('Transitaire.recherche'); });
     Route::get('/reservation', [TransitaireController::class, 'reservation'])->name('reservation');
     Route::post('store_reservation', [TransitaireController::class, 'store_reservation'])->name('store_reservation');
     Route::get('/liste_des_reservations_transitaire', [TransitaireController::class, 'liste_des_reservations_transitaire'])->name('liste_des_reservations_transitaire');

            });



         /*----------------------------
           ------------------------------
            Fin Transitaire route
           ----------------------------
           ------------------------------*/
