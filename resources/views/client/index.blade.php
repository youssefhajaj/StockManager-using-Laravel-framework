@extends('repeter.navClient')

@section('title')
    profile
@endsection






{{-- css --}}
@section('cdn')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
      

.form-control:focus {
    box-shadow: none;
    border-color: #BA68C8
}

.profile-button {
    background: rgb(99, 39, 120);
    box-shadow: none;
    border: none
}

.profile-button:hover {
    background: #682773
}

.profile-button:focus {
    background: #682773;
    box-shadow: none
}

.profile-button:active {
    background: #682773;
    box-shadow: none
}

.back:hover {
    color: #682773;
    cursor: pointer
}

.labels {
    font-size: 15px;
    margin-top: 10px;   
}

.add-experience:hover {
    background: #BA68C8;
    color: #fff;
    cursor: pointer;
    border: solid 1px #BA68C8
}
.portfolio{
    width: 100%;
    /* height: 100vh; */
    background: url("{{asset('img/header.png')}}");
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    
}
.portfolio .container{
    width: 100%;
    margin-top: 30px;
    height: fit-content;
    
    display: flex;
    flex-direction: column;
    /* align-items: center; */
    /* justify-content: center; */
    gap: 20px;
    /* border: 2px solid black; */
    /* border-radius: 20px; */
}

.portfolio .container h2{
    font-size: 45px;
    font-weight: 600;
    letter-spacing: 0.3px;
    color: rgb(255, 255, 255);
}
.portfolio .container h3{
    font-size: 35px;
    font-weight: 600;
    color: rgb(255, 255, 255);
}
.portfolio .container p{
    color: rgb(255, 255, 255);
    margin-right: 200px;
}
.link{
    padding: 10px 20px;
    width: 200px;
    text-align: center;
    border: 2px solid #BA68C8;
    color: rgb(0, 0, 0);
    cursor: pointer;
    font-weight: 600;
    transition: .3s ease-in-out;
}
.link:hover{
    background-color: #BA68C8;
    color: #fff;
    width: 220px;
    text-decoration: none;
}

@import url('https://fonts.googleapis.com/css?family=Rubik&display=swap');
body {
    font-family: 'Rubik', sans-serif;
    height: 100 !important;
}


.container-fluid{

    margin-top: 50px ;
    background:#262626 ;
    color: #627482  !important;
    margin-bottom: 0 ;
    padding-bottom:0  ;
}

small{
    font-size: calc(12px + (15 - 12) * ((100vw - 360px) / (1600 - 360))) !important; 
}

.bold-text{
    color: #989c9e !important;
}


.mt-55{
    margin-top: calc(50px + (60 - 50) * ((100vw - 360px) / (1600 - 360))) !important; 
}


h3{
    font-size: calc(34px + (40 - 34) * ((100vw - 360px) / (1600 - 360))) !important; 
}
 
.social{
    font-size: 21px !important; 
}

.rights{
    font-size: calc(10px + (12 - 10) * ((100vw - 360px) / (1600 - 360))) !important; 
}
.footer-a{
    color: #989c9e;
}

.footer-a:hover{
    text-decoration: none;
    color: #ffffff;
}
.text{
    backdrop-filter: blur(2px);
    background: rgba(0, 0, 0, 0.589);
    border-radius: 10px;
    padding: 10px 30px;
    width: 100%;
    font-size: 17px;
    letter-spacing: 0.5px;
    font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
}


    </style>
@endsection





{{-- content html body --}}
@section('content')

<div class="portfolio">
    <div class="container" style="margin-bottom: 113px;">
        <h3></h3>
        {{-- <h3>client : {{Auth::user()->name}} </h3> --}}
        <p class="text">
            <span style="margin-right: 15px;"></span> Bienvenue sur notre page dédiée à la gestion de stock pour le département informatique de la Faculté des Sciences d'Agadir ! Nous sommes conscients que la gestion de stock efficace est essentielle pour assurer la disponibilité des ressources, minimiser les coûts et maximiser les bénéfices. C'est pourquoi nous avons mis en place une application web de gestion de stock pour simplifier et optimiser notre gestion de stock. <br> <span style="margin-right: 15px;"></span>Cette application nous offre une visibilité en temps réel sur les niveaux de stock, les commandes en cours, les prévisions de demande, les mouvements de stock et les données de performance. Grâce à cette application, nous pouvons gérer nos stocks de manière proactive, anticiper les besoins des utilisateurs et prendre des décisions éclairées pour améliorer l'efficacité de notre département. <br>Contactez-nous si vous avez des questions ou si vous souhaitez en savoir plus sur notre gestion de stock.
        </p>
        <a class="link" href="{{route('produit.client.index')}}">Demander Produit</a>
        <a class="link" href="{{route('client.commande')}}">Mes Commandes</a>
    </div>

    <div class="container-fluid pb-0 mt-5 mb-0 justify-content-center text-light ">
        <footer>
            <div class="row my-5 justify-content-center py-5">
                <div class="col-11">
                    <div class="row ">
                        <div class="col-xl-8 col-md-4 col-sm-4 col-12   my-auto mx-auto a"><h3 class="text-muted mb-md-0 mb-5 bold-text">Stock Departement Informatique</h3></div>
                        <div class="col-xl-2 col-md-4 col-sm-4 col-12"><h6 class="mb-3 mb-lg-4 bold-text "><b>MENU</b></h6><ul class="list-unstyled"><a  class="footer-a" href=""><li>Home</li></a><a class="footer-a" href="{{route('client.index')}}"><li>Produit</li></a><a  class="footer-a" href="{{route('produit.client.index.consommable')}}"><li style="margin-left: 15px;">Consommable</li></a><a  class="footer-a"  href="{{route('produit.client.index.industriel')}}"><li style="margin-left: 15px;">Industriel</li></a><a  class="footer-a"  href="{{route('produit.client.index.bureautique')}}"><li style="margin-left: 15px;">Bureautique</li></a><a  class="footer-a" href="{{route('produit.client.index.consommable')}}"><li style="margin-left: 15px;">Consommable</li></a><a  class="footer-a"  href="{{route('produit.client.index.industriel')}}"><li style="margin-left: 15px;">Industriel</li></a><a  class="footer-a"  href="{{route('client.commande')}}"><li>Mes Commande</li></a></ul></div>
                        <div class="col-xl-2 col-md-4 col-sm-4 col-12"><h6 class="mb-3 mb-lg-4 text-muted bold-text mt-sm-0 mt-5"><b>ADDRESS</b></h6><p class="mb-1">605, RATAN ICON BUILDING</p><p>SEAWOODS SECTOR</p> </div>
                    </div>
                    <div class="row ">
                        <div class="col-xl-5 ml-5 col-md-4 col-sm-4 col-auto  my-md-0 mt-5 order-sm-1 order-3 align-self-end"><p class="social text-muted mb-0 pb-0 bold-text"> <span  class="mx-2"><i class="fa fa-facebook" aria-hidden="true"></i></span> <span class="mx-2"><i class="fa fa-linkedin-square" aria-hidden="true"></i></span> <span class="mx-2"><i class="fa fa-twitter" aria-hidden="true"></i></span> <span class="mx-2"><i class="fa fa-instagram" aria-hidden="true"></i></span> </p><small class="rights"><span>&#174;</span>  All Rights Reserved.</small></div>
                        <div class="col-xl-3 col-md-4 col-sm-4 col-auto order-1 align-self-end "><h6 class="mt-55 mt-2 text-muted bold-text"><b>YOUSSEF HAJAJ</b></h6><small> <span><i class="fa fa-envelope" aria-hidden="true"></i></span> youssef.hajaj111@gmail.com</small></div>
                        <div class="col-xl-3 col-md-4 col-sm-4 col-auto order-2 align-self-end mt-3   "><h6 class="text-muted bold-text"><b>IDOURGHE RKIA</b></h6><small><span><i class="fa fa-envelope" aria-hidden="true"></i></span> idourgherkia@gmail.com</small></div>
                    </div>
                </div>
            </div>
        </footer>
    </div>

</div>

@endsection