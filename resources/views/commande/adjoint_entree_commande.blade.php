@extends('repeter.navbar')

@section('title')
    commandes
@endsection

@section('commande-active')
   class="active selected"
@endsection



@section('cdn')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<style>
    .container{
        width: 100%;
        height: fit-content;
        padding: 20px 40px;
    }
    .table th{
        border: 1px solid #fff;
        border-color: #fff;
        width: fit-content;
        background: #252525;
        color: #fff;
        text-align: center;
    }
    .table td{
        text-align: center;
        /* border: 1px solid #888888; */
        vertical-align: middle;
    }
    .table tr:nth-child(2n){
        background: #cfcfcfd8;
    }
</style>
@endsection

@section('content')
    <h1 style="text-align: center;">adjoints commandes</h1>
    
    <div class="container">
        <table class="table">
            <thead class="">
              <tr>
                <th scope="col">N°</th>
                <th scope="col">Name</th>
                <th scope="col" colspan="2">Produit</th>
                <th scope="col">Quantité</th>
                <th scope="col">Date</th>
              </tr>
            </thead>
            <tbody>
                @foreach($commande as $c)
                    
                        <tr>
                            <td> {{ $c->id }} </td>
                            <td>
                                @foreach ($adjoint as $a)
                                    @if ($a->id == $c->adjointId)
                                        {{$a->name}}
                                    @endif
                                @endforeach 
                            </td>
                            <td> 
                                @foreach ($produit as $p)
                                    @if ($p->id == $c->produitId)
                                        <img src="{{$p->image}}" style="height:50px;">
                                    @endif
                                @endforeach  
                            </td>
                            <td>
                                @foreach ($produit as $p)
                                    @if ($p->id == $c->produitId)
                                        {{$p->name}}
                                    @endif
                                @endforeach 
                            </td>
                            <td> {{ $c->quantite }} </td>
                            <td> {{ $c->created_at }} </td>
                            
                          </tr>
                    
                @endforeach
              
            </tbody>
          </table>
          
          
          
    </div>
@endsection
