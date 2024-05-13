@extends('repeter.navClient')

@section('title')
    notification
@endsection



@section('cdn')

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .container{
            width: fit-content;
            height: fit-content;
            /* background: rgb(202, 202, 202); */
            background: transparent;
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
            border: none;
            outline: none;
            
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
            outline: none;
        }
        .con{
            width: 100%;
            height: 60px;
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
        <div class="stock">
            <h4>Notification</h4>
            <div class="card">
                {{-- foreach --}}
               
                @foreach ($commande as $c)
                    @if ($c->adminId!=null)
                        @foreach ($user as $u)
                            @if ($u->id == $c->adminId)
                                @if ($c->etat==1)
                                    <div class="con" style="background: rgba(94, 255, 156, 0.432);" id="con{{$c->id}}">
                                        <i class='bx bx-bell'></i>
                                        <i class='bx bx-x'  onclick="del({{$c->id}})"></i>
                                        <div class="img">
                                            {{-- <img src="{{asset($p->image)}}" alt=""> --}}
                                        </div>
                                        <div class="text">
                                            <h6>Admin :  <b>{{$u->name}}</b> a accepter votre commande N° {{$c->id}}</h6>
                                            <p style="text-align: end;">veuillez collecter ton produit au departement</p>
                                        </div>
                                    </div>
                                @endif
                                @if ($c->etat==-1)
                                    <div class="con" style="background: rgba(255, 94, 94, 0.432);" id="con{{$c->id}}">
                                        <i class='bx bx-bell'></i>
                                        <i class='bx bx-x'  onclick="del({{$c->id}})"></i>
                                        <div class="img">
                                            {{-- <img src="{{asset($p->image)}}" alt=""> --}}
                                        </div>
                                        <div class="text">
                                            <h6>Admin :  <b>{{$u->name}}</b> a refuser votre commande N° {{$c->id}}</h6>
                                            <p></p>
                                            <p style="text-align: end;">merci de nous contactez au departement</p>
                                        </div>
                                    </div>
                                @endif
                                
                            @endif
                        @endforeach
                    
                    @endif
                    @if ($c->adjointId!=null)
                    @foreach ($user as $u)
                        @if ($u->id == $c->adjointId)
                            @if ($c->etat==1)
                                <div class="con" style="background: rgba(94, 255, 156, 0.432);" id="con{{$c->id}}">
                                    <i class='bx bx-bell'></i>
                                    <i class='bx bx-x'  onclick="del({{$c->id}})"></i>
                                    <div class="img">
                                        {{-- <img src="{{asset($p->image)}}" alt=""> --}}
                                    </div>
                                    <div class="text">
                                        <h6>Adjoint :  <b>{{$u->name}}</b> a accepter votre commande N° {{$c->id}}</h6>
                                        <p style="text-align: end;">veuillez collecter ton produit au departement</p>
                                    </div>
                                </div>
                            @endif
                            @if ($c->etat==-1)
                                <div class="con" style="background: rgba(255, 94, 94, 0.432);" id="con{{$c->id}}">
                                    <i class='bx bx-bell'></i>
                                    <i class='bx bx-x'  onclick="del({{$c->id}})"></i>
                                    <div class="img">
                                        {{-- <img src="{{asset($p->image)}}" alt=""> --}}
                                    </div>
                                    <div class="text">
                                        <h6>Adjoint :  <b>{{$u->name}}</b> a refuser votre commande N° {{$c->id}}</h6>
                                        <p style="text-align: end;">merci de nous contactez au departement</p>
                                    </div>
                                </div>
                            @endif
                            
                        @endif
                    @endforeach
                
                @endif
                @endforeach
                
            </div>
        </div>
    </div>


    <script>
        function del(id){
            document.getElementById("con"+id).style.display="none";
        }
    </script>

@endsection