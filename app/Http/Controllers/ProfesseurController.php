<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ProfesseurController extends Controller
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
            'prenom' => ['required', 'string', 'max:255'],
            'telephone' => ['required' , 'digits:10'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:fournisseurs'],
        ]);

        $user = new User();

        $user->name            = $request->nom;
        $user->prenom          = $request->prenom;
        $user->telephone       = $request->telephone;
        $user->email           = $request->email;
        $user->password        = Hash::make('12345678');
        
        $user->save();

        return redirect()->back()->with('success','Professeur a été bien ajouté !');
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
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);



        $user = User::find($request->id);

        $user->name = $request->nom;
        $user->prenom = $request->prenom;
        $user->telephone = $request->telephone;

        if($user->email != $request->email){
            $user->email = $request->email;
        }

        $user->save();

        return redirect()->back()->with('success','Professeur a été bien modifié');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::destroy($id);
        // User::delete('delete from users where id = ?',[$id]);
        return redirect()->back()->with('success','Professeur a été supprimé');
    }
}
