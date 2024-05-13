@extends('repeter.navbar_adjoint')



@section('title')
    adjoint.notification
@endsection

@section('client-active')
   
@endsection



@section('cdn')

    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toast Notification</title>
    <!--Google Font-->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <!--Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .container{
            width: 100%;
            height: fit-content;
            background: rgb(202, 202, 202);
            margin-top: 20px;
            display: flex;
            justify-content: space-evenly;
            align-items: center;
        }
        .container .prof,.stock{
            width: 450px;
            height: 500px;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 10px 10px;
            
        }
        ::-webkit-scrollbar{
            display: none;
        }
        h4{
            margin-bottom: 50px;
            text-align: center;
        }
        .card{
            width: 100%;
            height: 500px;
            display: inline;
            overflow-y: scroll;
            background: transparent;
            border: none;
        }
        .con{
            width: 100%;
            height: fit-content;
            padding: 3px 8px;
            margin-bottom: 5px;
            background: white;
            display: flex;
            align-content: center;
            justify-content: space-evenly;
            position: relative;
        }
        .con i:first-child{
            position: absolute;
            top: 20px;
            left: 5px;
            font-size: 26px;
            color: green;
            cursor: pointer;
        }
        .con i:nth-child(2){
            position: absolute;
            top: 0px;
            left: 410px;
            font-size: 20px;
            color: red;
            cursor: pointer;
        }
        .con p{
            margin-bottom: 0; 
        }
        .img img{
            height: 60px;
        }
    </style>
@endsection

@section('content')

    <div class="container">
        <div class="prof">
            <h4>Professeur notification</h4>
            
            <div class="card">
                {{-- foreach --}}
                @foreach ($commande as $c)
                    @if ($c->clientId && $c->etat == 0)

                    @foreach ($user as $u)
                        @if ($u->id == $c->clientId)
                        @foreach ($produit as $p)
                        @if ($p->id == $c->produitId)
                            <div class="con"  id="con{{$c->id}}">
                                <i class='bx bx-bell'></i>
                                <i class='bx bx-x' onclick="del({{$c->id}})"></i>
                    <div class="img">
                        <img src="{{asset($p->image)}}" alt="">
                    </div>
                    <div class="text">
                        <h6> <b>Pr.{{$u->name}}</b> a demandé {{$c->quantite}} {{$p->name}}</h6>
                        <p style="text-align: end;"> {{ $c->created_at}} </p>
                    </div>
                    
                    </div>
                        @endif
                            
                        @endforeach
                            
                        @endif
                    @endforeach
                        
                    
                        
                    @endif
                @endforeach
                
            </div>
        </div>
        <div class="stock">
            <h4>Stock notification</h4>
            <div class="card">
                {{-- foreach --}}
                @foreach ($produit as $p)
                    @if ($p->quantite < 20)
                    <div class="con" id="conp{{$p->id}}">
                        <i class='bx bx-bell'></i>
                        <i class='bx bx-x'  onclick="delp({{$p->id}})"></i>
                        <div class="img">
                            <img src="{{asset($p->image)}}" alt="">
                        </div>
                        <div class="text">
                            <h6>Cher Adjoint, <b>{{$p->name}}</b> arrive au stock minimal de <b>{{$p->quantite}}</b> </h6>
                            <p style="text-align: end;font-size:15px;">Veuillez faire une demande d'approvisionnement.
                            </p>
                        </div>
                        
                        </div>
                    @endif
                @endforeach
                
            </div>
        </div>
    </div>


    <script>
        function del(id){
            document.getElementById("con"+id).style.display="none";
        }
        function delp(id){
            document.getElementById("conp"+id).style.display="none";
        }
    </script>

@endsection