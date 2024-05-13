<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;

class PC extends Controller
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
        $request->validate([
            'nom' => ['required', 'string', 'max:255'],
            'prix' => ['required', 'numeric'],
        ]);

        $produit = new Produit;
        
        $produit->name = $request->nom;
        $produit->prix = $request->prix;
        $produit->type = $request->type;

         if($request->hasFile('image')){
            $file = $request->file('image');

            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('img/produits/' , $filename);

            $produit->image = 'img/produits/'.$filename;
         }
        $produit->save();
        return redirect()->back();
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Produit::destroy($id);
        return redirect()->back();
    }
}
