<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;
use App\Models\Commande;
use App\Models\Fournisseur;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProduitController extends Controller
{
    public function index_admin(){
        $produit = Produit::all();
        $fournisseur = Fournisseur::all();
        
        return view('produit.index_admin' , ['produit' => $produit , 'fournisseur' => $fournisseur]);
    }
    public function index_adjoint(){
        $produit = Produit::all();
        $fournisseur = Fournisseur::all();

        return view('produit.index_adjoint' , ['produit' => $produit, 'fournisseur' => $fournisseur]);
    }
    public function index_client(){
        $produit = Produit::all();
        
        return view('produit.index_client' , ['produit' => $produit]);
    }

    public function index_client_consommable(){
        $produit = Produit::all();
        
        
        return view('produit.consommable_client' , ['produit' => $produit]);
    }
    public function index_client_industriel(){
        $produit = Produit::all();
        
        
        return view('produit.industriel_client' , ['produit' => $produit]);
    }
    public function index_client_bureautique(){
        $produit = Produit::all();
        
        
        return view('produit.bureautique_client' , ['produit' => $produit]);
    }

    public function index_admin_consommable(){
        $produit = Produit::all();
        $fournisseur = Fournisseur::all();
        
        
        return view('produit.consommable_admin' , ['produit' => $produit , 'fournisseur' => $fournisseur]);
    }
    public function index_admin_industriel(){
        $produit = Produit::all();
        $fournisseur = Fournisseur::all();
        
        
        return view('produit.industriel_admin' , ['produit' => $produit , 'fournisseur' => $fournisseur]);
    }
    public function index_admin_bureautique(){
        $produit = Produit::all();
        $fournisseur = Fournisseur::all();
        
        
        return view('produit.bureautique_admin' , ['produit' => $produit , 'fournisseur' => $fournisseur]);
    }

    public function index_adjoint_consommable(){
        $produit = Produit::all();
        $fournisseur = Fournisseur::all();
        
        
        return view('produit.consommable_adjoint' , ['produit' => $produit , 'fournisseur' => $fournisseur]);
    }
    public function index_adjoint_industriel(){
        $produit = Produit::all();
        $fournisseur = Fournisseur::all();
        
        
        return view('produit.industriel_adjoint' , ['produit' => $produit , 'fournisseur' => $fournisseur]);
    }
    public function index_adjoint_bureautique(){
        $produit = Produit::all();
        $fournisseur = Fournisseur::all();
        
        
        return view('produit.bureautique_adjoint' , ['produit' => $produit , 'fournisseur' => $fournisseur]);
    }


    /*  add quantite */
    public function quantite(Request $request){
        $produit = Produit::find($request->id);

        

            $produit->quantite += $request->quantite ;

            if($produit->quantite < 0){
                $produit->quantite = 0;
            }
            if($produit->quantite > 50){
                $produit->quantite = 50;
            }
            // if admin ********************************
            if($request->quantite!=0){
                if(Auth::user()->isAdmin == true){

                $commande = new Commande;

                $commande->produitId = $produit->id;
                $commande->adminId = Auth::user()->id;
                $commande->quantite = $request->quantite;
                $commande->fournisseurId = $request->fournisseur;

                $commande->save();
            }
            else if(Auth::user()->isAdjoint == true){
                $commande = new Commande;

                $commande->produitId = $produit->id;
                $commande->adjointId = Auth::user()->id;
                $commande->quantite = $request->quantite;
                $commande->fournisseurId = $request->fournisseur;

                $commande->save();
            }
            }
            
            
            $produit->save();
        

        return redirect()->back();
    }

    public function quantite_client_1(Request $request){
        $commande = Commande::find($request->id);
        $produit = Produit::find($commande->produitId);

        $produit->quantite -= $commande->quantite ;
        
        $commande->etat = 1;
        $commande->date = $commande->date;

        if(Auth::user()->isAdmin == true){
            $commande->adminId = Auth::user()->id;
        }else if(Auth::user()->isAdjoint == true){
            $commande->adjointId = Auth::user()->id;
        }

        $commande->save();
        $produit->save();

        return redirect()->back();
    }
    public function quantite_client_2(Request $request){
        $commande = Commande::find($request->id);
        
        
        $commande->etat = -1;
        $commande->date = $commande->date;

        if(Auth::user()->isAdmin == true){
            $commande->adminId = Auth::user()->id;
        }else if(Auth::user()->isAdjoint == true){
            $commande->adjointId = Auth::user()->id;
        }
        $commande->save();


        return redirect()->back();
    }

    
    public function quantite_client(Request $request){
        $produit = Produit::find($request->id);

        
        //     if($produit->quantite >= $request->quantite)
        //         $produit->quantite -= $request->quantite ;

            if($request->quantite != 0){
                $commande = new Commande;

                $commande->produitId = $produit->id;
                $commande->clientId = Auth::user()->id;
                $commande->quantite = $request->quantite;
                

                $commande->save();
            }
                
            
            // $produit->save();
        

        return redirect()->back();
    }



    /* *************      stock          *************** */

    public function stock_admin(){
        $produit = Produit::all();

        return view('stock.stock_admin' , ['produit' => $produit]);
    }

    public function stock_adjoint(){
        $produit = Produit::all();

        return view('stock.stock_adjoint' , ['produit' => $produit]);
    }
}
