<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commande;
use App\Models\Produit;
use App\Models\User;
use App\Models\Fournisseur;
// use Barryvdh\DomPDF\PDF;
use Barryvdh\DomPDF\Facade\PDF;
// use Barryvdh\DomPDF\Facade as PDF;
use Barryvdh\DomPDF\Facade;
use FontLib\Font;
use Dompdf\Adapter\PDFLib;
use Illuminate\Support\Facades\Auth;

class CommandeController extends Controller
{
    //admin ****************************************************
    function admin_entree_commande(){
        $commande = Commande::where('adminId',Auth::user()->id)->orderBy('created_at','desc')->get();
        $produit = Produit::all();

        return view('commande.admin_entree_commande',['commande' => $commande , 'produit' => $produit]);
    }
    function adjoint_entree_commande(){
        $commande = Commande::where('adjointId',"!=",null)->orderBy('created_at','desc')->get();
        $produit = Produit::all();
        $adjoint = User::all();

        return view('commande.adjoint_entree_commande',['commande' => $commande , 'produit' => $produit,  'adjoint' => $adjoint]);
    }

    function admin_sortie(){
        $commande = Commande::where('clientId','!=',null)->orderBy('created_at','desc')->get();
        $produit = Produit::all();
        $client = User::all();

        return view('commande.admin_sortie',['commande' => $commande , 'produit' => $produit,  'client' => $client]);
    }


    //adjoint *************************************************************
    function adjoint_entree(){
        $commande = Commande::where('adjointId',Auth::user()->id)->orderBy('created_at','desc')->get();
        $produit = Produit::all();

        return view('commande.adjoint_entree',  ['commande' => $commande, 'produit' => $produit]);
    }

    function adjoint_sortie(){
        $commande = Commande::where('clientId','!=',null)->orderBy('created_at','desc')->get();
        $client = User::all();
        $produit = Produit::all();

        return view('commande.adjoint_sortie',['commande' => $commande , 'produit' => $produit,  'client' => $client]);
    }

    //client ****************************************************************
    function client_commande(){
        $commande = Commande::where('clientId',Auth::user()->id)->orderBy('created_at','desc')->get();
        $produit = Produit::all();

        return view('commande.client_commande',['commande' => $commande, 'produit' => $produit]);
    }
    function client_notification(){
        $commande = Commande::where('clientId',Auth::user()->id)->orderBy('created_at','desc')->get();
        $produit = Produit::all();
        $user = User::all();

        return view('client.notification',['commande' => $commande, 'produit' => $produit, 'user' => $user]);
    }

    //     pdf 
    function pdf(Request $request){
        $commande = Commande::where('fournisseurId',$request->id)
                                    // ->where('etat',0)
                                    ->orderBy('created_at','DESC')->get();
        $produit = Produit::all();
        $fournisseur = Fournisseur::where('id' , $request->id)->get();

        $pdf = PDF::loadView('pdf',['commande' => $commande ,'produit' => $produit ,'fournisseur' => $fournisseur]);
                    
        return $pdf->stream();
        
        
        // $c = Commande::find($request->id);
        // foreach($commande as $c){
        //     $c->etat = 0;
        //     $c->save();
        // }
        
        return $pdf->download('Bon_de_Commande.pdf');

        
        
    }
}
