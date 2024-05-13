<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fournisseur;
use App\Models\User;
use App\Models\Produit;
use Illuminate\Support\Facades\Auth;
use App\Models\Commande;

class AC extends Controller
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
        $produit = Produit::find($commande->produitId);

        
        
        $produit->quantite = $produit->quantite - ($commande->quantite - $request->quantite);
        $commande->quantite = $request->quantite;
        $produit->save();
        $commande->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $commande = Commande::find($id);
        
        $produit = Produit::find($commande->produitId);
        $produit->quantite -= $commande->quantite;
        if($produit->quantite < 0 ){
            $produit->quantite = 0;
        }
        $produit->save();
        Commande::destroy($id);
        return redirect()->back();
    }
}
