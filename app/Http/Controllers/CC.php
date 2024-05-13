<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Fournisseur;
use App\Models\User;
use App\Models\Produit;
use Illuminate\Support\Facades\Auth;
use App\Models\Commande;

class CC extends Controller
{
    /**
     * Display a listing of the resource.
     */
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
        //
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
        $commande = Commande::find($request->id);
        if($request->quantite == $commande->quantite){
            return redirect()->back();
        }
        else{
            if($commande->etat == 1){
                $produit = Produit::find($commande->produitId);
                $produit->quantite += $commande->quantite;
                $produit->save();
            }
            $commande->etat = 0;
            $commande->quantite = $request->quantite;
            $commande->save();
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Commande::destroy($id);
        return redirect()->back();

    }
}
