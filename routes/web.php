<?php

use App\Http\Controllers\AC;
use App\Http\Controllers\CC;
use App\Http\Controllers\PC;
use App\Http\Controllers\AdjointController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfesseurController;
use App\Http\Controllers\FournisseurController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// Route::get('/', function () {
//     return view('welcome');
// });

//Route::redirect('/','/login');
//Route::redirect('/home','/login');
Route::view('/','auth.login')->name('home');
// Route::view('/home','auth.login')->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('admin',AdminController::class)->middleware(['auth' , 'isAdmin' , 'backAllowed']);
Route::get('admin.dashboard', '\App\Http\Controllers\FournisseurController@dash')->name('admin.dashboard');
Route::view('admin.profile', 'admin/profile')->name('admin.profile');
Route::get('admin.client','\App\Http\Controllers\AdminController@admin_client')->name('admin.client');
Route::get('/admin/{id}' , '\App\Http\Controllers\AdminController@destroy');
Route::get('admin.produits.consommable','\App\Http\Controllers\ProduitController@index_admin_consommable')->name('produit.admin.index.consommable');
Route::get('admin.produits.industriel','\App\Http\Controllers\ProduitController@index_admin_industriel')->name('produit.admin.index.industriel');
Route::get('admin.produits.bureautique','\App\Http\Controllers\ProduitController@index_admin_bureautique')->name('produit.admin.index.bureautique');
// Route::get('admin.commande.entree','\App\Http\Controllers\CommandeController@admin_entree')->name('admin.commande.entree');
Route::get('admin.commande.sortie','\App\Http\Controllers\CommandeController@admin_sortie')->name('admin.commande.sortie');
Route::get('commande.entree.admin','\App\Http\Controllers\CommandeController@admin_entree_commande')->name('commande.entree.admin');
Route::get('commande.entree.adjoint','\App\Http\Controllers\CommandeController@adjoint_entree_commande')->name('commande.entree.adjoint');
Route::get('admin.notification','\App\Http\Controllers\AdminController@notification')->name('admin.notification');


// Route::put('admin','AdminController@update')->name('admin.update');

Route::post('update','\App\Http\Controllers\AdminController@update')->name('update');
Route::post('edit-profile', '\App\Http\Controllers\AdminController@editProfile')->name('adminProfile.editProfile');
Route::post('edit-quantite','\App\Http\Controllers\ProduitController@quantite')->name('edit-quantite');
Route::post('edit-quantite-client','\App\Http\Controllers\ProduitController@quantite_client')->name('edit-quantite-client');
Route::post('edit-quantite-client-accepter','\App\Http\Controllers\ProduitController@quantite_client_1')->name('edit-quantite-client-1');
Route::post('edit-quantite-client-refuser','\App\Http\Controllers\ProduitController@quantite_client_2')->name('edit-quantite-client-2');
Route::post('delete-fournisseur','\App\Http\Controllers\FournisseurController@destroy')->name('fournisseur.delete');
Route::post('fournisseur.update','\App\Http\Controllers\FournisseurController@update')->name('fournisseur-update');
Route::post('professeur.update','\App\Http\Controllers\ProfesseurController@update')->name('professeur-update');
Route::post('AC.update','\App\Http\Controllers\AC@update')->name('AC-update');

Route::resource('client',ClientController::class)->middleware(['auth' , 'isClient' , 'backAllowed']);
Route::view('client_profile', 'client/client_profile')->name('client.profile');
Route::get('client.produits','\App\Http\Controllers\ProduitController@index_client')->name('produit.client.index');
Route::get('client.produits.consommable','\App\Http\Controllers\ProduitController@index_client_consommable')->name('produit.client.index.consommable');
Route::get('client.produits.industriel','\App\Http\Controllers\ProduitController@index_client_industriel')->name('produit.client.index.industriel');
Route::get('client.produits.bureautique','\App\Http\Controllers\ProduitController@index_client_bureautique')->name('produit.client.index.bureautique');
Route::get('client.commande','\App\Http\Controllers\CommandeController@client_commande')->name('client.commande');
Route::get('client.notification','\App\Http\Controllers\CommandeController@client_notification')->name('client.notification');
Route::get('pdf','\App\Http\Controllers\CommandeController@pdf')->name('pdf');
Route::post('CC.update','\App\Http\Controllers\CC@update')->name('CC-update');


Route::resource('adjoint',AdjointController::class)->middleware(['auth' , 'isAdjoint' , 'backAllowed']);
Route::get('adjoint.dashboard', '\App\Http\Controllers\FournisseurController@dash')->name('adjoint.dashboard');
Route::view('adjoint.profile', 'adjoint/profile')->name('adjoint.profile');

Route::get('admin.produits','\App\Http\Controllers\ProduitController@index_admin')->name('produit.admin.index');
Route::get('adjoint.produits','\App\Http\Controllers\ProduitController@index_adjoint')->name('produit.adjoint.index');
Route::get('adjoint.produits.consommable','\App\Http\Controllers\ProduitController@index_adjoint_consommable')->name('produit.adjoint.index.consommable');
Route::get('adjoint.produits.industriel','\App\Http\Controllers\ProduitController@index_adjoint_industriel')->name('produit.adjoint.index.industriel');
Route::get('adjoint.produits.bureautique','\App\Http\Controllers\ProduitController@index_adjoint_bureautique')->name('produit.adjoint.index.bureautique');
Route::get('adjoint.commande.entree','\App\Http\Controllers\CommandeController@adjoint_entree')->name('adjoint.commande.entree');
Route::get('adjoint.commande.sortie','\App\Http\Controllers\CommandeController@adjoint_sortie')->name('adjoint.commande.sortie');
Route::get('adjoint.client','\App\Http\Controllers\AdminController@adjoint_client')->name('adjoint.client');
Route::get('adjoint.notification','\App\Http\Controllers\AdminController@notification')->name('adjoint.notification');


// Route::resource('fournisseur',FournisseurController::class);
// Route::put('fournisseur.destroy','FournisseurController@destroy')->name('fournisseur.destroy');
Route::get('adjoint.fournisseur','\App\Http\Controllers\FournisseurController@index_adjoint')->name('adjoint.fournisseur');
Route::get('admin.fournisseur','\App\Http\Controllers\FournisseurController@index_admin')->name('admin.fournisseur');


Route::get('adjoint.stock','\App\Http\Controllers\ProduitController@stock_adjoint')->name('adjoint.stock');
Route::get('admin.stock','\App\Http\Controllers\ProduitController@stock_admin')->name('admin.stock');



Route::resource('fournisseur',FournisseurController::class);
Route::resource('professeur',ProfesseurController::class);
Route::resource('AC',AC::class);
Route::resource('CC',CC::class);
Route::resource('PC',PC::class);