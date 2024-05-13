<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Fournisseur;
use App\Models\Produit;
use App\Models\Commande;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $adjoints = User::where('isAdjoint','!=',false)->get();

        return view('admin.index' , ['adjoints' => $adjoints]);
    }

    

    public function editProfile(Request $request){

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'telephone' => ['required' , 'digits:10'],
            'dateNaissance' => ['required' , 'date'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);

        $user_id = Auth::user()->id;
        $user = User::findOrFail($user_id);

        $user->name = $request->input('name');
        $user->prenom = $request->input('prenom');
        $user->telephone = $request->input('telephone');
        $user->dateNaissance = $request->input('dateNaissance');
        $user->password = Hash::make($request->input('password'));
        $user->update();

        if($user->email != $request->input('email')){
            // $users = User::where('id' , '!=' , Auth::user()->id);
            $users = User::all();
            $found = false;
            foreach($users as $u){
                if($u->email == $request->input('email') && $u->id != Auth::user()->id){
                    $found=true;
                }
            }
            if($found == false){
                $user->email = $request->input('email');
                $user->update();
            }
            else{
                return redirect()->back()->with('fail','email deja utilisé');
            }
            
        }
        

        
        return redirect()->back()->with('success','profile bien modifié');
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
            'name' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'telephone' => ['required' , 'digits:10'],
            'dateNaissance' => ['required' , 'date'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);

        $user = new User();

        $user->name            = $request->name;
        $user->prenom          = $request->prenom;
        $user->telephone       = $request->telephone;
        $user->dateNaissance   = $request->dateNaissance;
        $user->email           = $request->email;
        $user->isAdjoint       = true;
        $user->password        = Hash::make('12345678');

        $user->save();

        return redirect()->back()->with('success','adjoint a bien ajouté !');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $adjoint = User::find($id);
        return response()->json($adjoint);
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
    public function update(Request $request/*, string $id*/)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'telephone' => ['required' , 'digits:10'],
            'dateNaissance' => ['required' , 'date'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);



        $user = User::find($request->id);

        $user->name = $request->name;
        $user->prenom = $request->prenom;
        $user->telephone = $request->telephone;
        $user->dateNaissance = $request->dateNaissance;
        $user->isAdjoint = true;

        if($user->email != $request->email){
            $user->email = $request->email;
        }

        $user->save();

        return redirect()->back()->with('success','adjoint a bien modifié');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        User::destroy($id);
        // User::delete('delete from users where id = ?',[$id]);
        return redirect()->back()->with('success','adjoint a supprimé');
    }






    function admin_client(){
        $user = User::where('isAdjoint' , false)->get();
        return view('admin.client_list' , ['user'   => $user]);
    }
    function adjoint_client(){
        $user = User::where('isAdjoint' , false)->get();
        return view('adjoint.client_list' , ['user'   => $user]);
    }


    function notification(){
        $user = User::all();
        $produit = Produit::all();
        $fournisseur = Fournisseur::all();
        $commande = Commande::where('id','!=','null')->orderBy('created_at','DESC')->get();

        if(Auth::user()->isAdmin == true){
            return view('admin.notification',[
                'user' => $user,
                'produit' => $produit,
                'fournisseur' => $fournisseur,
                'commande' => $commande
            ]);
        }else if(Auth::user()->isAdjoint == true){
            return view('adjoint.notification',[
                'user' => $user,
                'produit' => $produit,
                'fournisseur' => $fournisseur,
                'commande' => $commande
            ]);
        }
        
    }

}
