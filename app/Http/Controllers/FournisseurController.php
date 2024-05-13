<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fournisseur;
use App\Models\User;
use App\Models\Produit;
use Illuminate\Support\Facades\Auth;
use App\Models\Commande;

class FournisseurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index_admin(){
        $fournisseur = Fournisseur::all();

        return view('fournisseur.fournisseur_admin' , ['fournisseur' => $fournisseur]);
    }

    public function index_adjoint(){
        $fournisseur = Fournisseur::all();

        return view('fournisseur.fournisseur_adjoint' , ['fournisseur' => $fournisseur]);
    }

    
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'telephone' => ['required' , 'digits:10'],
            'address' => ['required' , 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:fournisseurs'],
        ]);

        $user = new Fournisseur();

        $user->nom            = $request->nom;
        $user->prenom          = $request->prenom;
        $user->telephone       = $request->telephone;
        $user->email           = $request->email;
        $user->address           = $request->address;
        
        $user->save();

        return redirect()->back()->with('success','Fournisseur a été bien ajouté !');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'nom' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'telephone' => ['required' , 'digits:10'],
            'address' => ['required' , 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);



        $user = Fournisseur::find($request->id);

        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->telephone = $request->telephone;
        $user->address = $request->address;

        if($user->email != $request->email){
            $user->email = $request->email;
        }

        $user->save();

        return redirect()->back()->with('success','fournisseur a été bien modifié');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Fournisseur::destroy($id);
        // User::delete('delete from users where id = ?',[$id]);
        return redirect()->back()->with('success','fournisseur a été supprimé');
    }

    public function dash(){
        $produit = Produit::all();
        $commande = Commande::where('id','!=',null)->orderBy('created_at','DESC')->get();
        $user = User::all();
        $fournisseur = Fournisseur::all();

        if(Auth::user()->isAdmin == true){
            return view('admin.dashboard',compact('user','produit','commande','fournisseur'));
        }
        if(Auth::user()->isAdjoint == true){
            return view('adjoint.dashboard',compact('user','produit','commande','fournisseur'));
        }
        
    }
}
