@extends('repeter.navbar')

@section('title')
    produit
@endsection

@section('categorie-active')
   class="active selected"
@endsection


@section('cdn')
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Open+Sans">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>
body {
	background: #e2eaef;
	font-family: "Open Sans", sans-serif;
}
h2 {
	color: #000;
	font-size: 26px;
	font-weight: 300;
	text-align: center;
	text-transform: uppercase;
	position: relative;
	margin: 30px 0 60px;
}
h2::after {
	content: "";
	width: 100px;
	position: absolute;
	margin: 0 auto;
	height: 4px;
	border-radius: 1px;
	background: #7ac400;
	left: 0;
	right: 0;
	bottom: -20px;
}
.carousel {
	margin: 50px auto;
	padding: 0 70px;
}
.carousel .item {
	color: #747d89;
	min-height: 325px;
	text-align: center;
	overflow: hidden;
}
.carousel .thumb-wrapper {
	padding: 25px 15px;
	background: #fff;
	border-radius: 6px;
	text-align: center;
	position: relative;
	box-shadow: 0 2px 3px rgba(0,0,0,0.2);
}
.carousel .item .img-box {
	height: 120px;
	margin-bottom: 20px;
	width: 100%;
	position: relative;
}
.carousel .item img {	
	max-width: 100%;
	max-height: 100%;
	display: inline-block;
	position: absolute;
	bottom: 0;
	margin: 0 auto;
	left: 0;
	right: 0;
}
.carousel .item h4 {
	font-size: 18px;
}
.carousel .item h4, .carousel .item p, .carousel .item ul {
	margin-bottom: 5px;
}
.carousel .thumb-content .btn {
	color: #7ac400;
	font-size: 11px;
	text-transform: uppercase;
	font-weight: bold;
	background: none;
	border: 1px solid #7ac400;
	padding: 6px 14px;
	margin-top: 5px;
	line-height: 16px;
	border-radius: 20px;
	transition: .3s;
}
.carousel .thumb-content .btn:hover, .carousel .thumb-content .btn:focus {
	color: #fff;
	background: #7ac400;
	padding: 6px 20px;
	box-shadow: none;
}
.carousel .thumb-content .btn i {
	font-size: 14px;
	font-weight: bold;
	margin-left: 5px;
}
.carousel .item-price {
	font-size: 13px;
	padding: 2px 0;
}
.carousel .item-price strike {
	opacity: 0.7;
	margin-right: 5px;
}
.carousel-control-prev, .carousel-control-next {
	height: 44px;
	width: 40px;
	background: #7ac400;	
	margin: auto 0;
	border-radius: 4px;
	opacity: 0.8;
}
.carousel-control-prev:hover, .carousel-control-next:hover {
	background: #78bf00;
	opacity: 1;
}
.carousel-control-prev i, .carousel-control-next i {
	font-size: 36px;
	position: absolute;
	top: 50%;
	display: inline-block;
	margin: -19px 0 0 0;
	z-index: 5;
	left: 0;
	right: 0;
	color: #fff;
	text-shadow: none;
	font-weight: bold;
}
.carousel-control-prev i {
	margin-left: -2px;
}
.carousel-control-next i {
	margin-right: -4px;
}		
.carousel-indicators {
	bottom: -50px;
}
.carousel-indicators li, .carousel-indicators li.active {
	width: 10px;
	height: 10px;
	margin: 4px;
	border-radius: 50%;
	border: none;
}
.carousel-indicators li {	
	background: rgba(0, 0, 0, 0.2);
}
.carousel-indicators li.active {	
	background: rgba(0, 0, 0, 0.6);
}
.carousel .wish-icon {
	position: absolute;
	right: 10px;
	top: 10px;
	z-index: 99;
	cursor: pointer;
	font-size: 16px;
	color: #abb0b8;
}
.carousel .wish-icon .fa-heart {
	color: #ff6161;
}
.star-rating li {
	padding: 0;
}
.star-rating i {
	font-size: 14px;
	color: #ffc000;
}
.edit{
	width: 100%;
	height: fit-content;
}
.edit-form{
	width: 100%;
	height: fit-content;
	display: flex;
	flex-direction: column;
	align-items: center;
	justify-content: space-around;
	margin: 10px 0;
}
.edit-form input{
	width: 50px;
	padding: 5px 5px;
	text-align: center;
	border: none;
	outline: none;
}
.edit-form button{
	border: none;
	background: transparent;
	width: fit-content;
	height: fit-content;
	display: flex;
	align-items: center;
	justify-content: center;
}
.edit-form button *{
	font-size: 40px;
	transition: .3s;
}
.edit-form button *:hover{
	transform: scale(1.2);
}
::placeholder{
    font-size: 18px;
    color: rgb(31, 31, 31);
}
#myInput{
    padding: 10px 20px;
		margin: 10px 20px;
    border: 1px solid #565656;
		width: 96%;
}
</style>  
@endsection
  
@section('content')

<div class="container-xl">
	<div class="row">
		<div class="col-md-12">
			<h2>Produits bureautique</h2>
			<div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="0">
			   
			<!-- Wrapper for carousel items -->
			<div class="carousel-inner">
        
				<div class="item carousel-item active">
					<div class="row">

						{{-- <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Chercher par nom..." title="Type in a name"> --}}

            {{-- foreach --}}
						@foreach ($produit as $p)
						@if ($p->type == "bureautique")
								
						
                <div class="col-sm-3 mb-5">
							<div class="thumb-wrapper">
								<span class="wish-icon"><i class="fa fa-heart-o"></i></span>
								<div class="img-box">
									<img src="{{asset($p->image)}}" class="img-fluid" alt="Nikon">
								</div>
								<div class="thumb-content" id="myTable">
									<h4 style="margin-bottom: 20px;"> {{ $p->name }} </h4>
									<h5>quantité : {{$p->quantite}} </h5>									
									<div class="star-rating">
										<ul class="list-inline">
											<li class="list-inline-item"><i class="fa fa-star"></i></li>
											<li class="list-inline-item"><i class="fa fa-star"></i></li>
											<li class="list-inline-item"><i class="fa fa-star"></i></li>
											<li class="list-inline-item"><i class="fa fa-star-o"></i></li>
											<li class="list-inline-item"><i class="fa fa-star-o"></i></li>
										</ul>
									</div>
									<p class="item-price"><strike>DH 315.00</strike> <b>DH {{$p->prix}} </b></p>

									<div class="edit">
										<form  action="{{ route('edit-quantite') }}" method="POST" class="edit-form" id="edit{{$p->id}}">
											@csrf
										<div style="display: flex;margin:5px 0;">
											<input type="hidden" name="id" id="id" value="{{$p->id}}">
											<button type="button" onclick="sub({{$p->id}});">
												<i class='bx bxs-minus-circle' style="color: rgb(94, 94, 94);"></i>
											</button>
											<input type="text" name="quantite" id="quantite{{$p->id}}" value="0">
											<button type="button" onclick="add({{$p->id}});">
												<i class='bx bxs-plus-circle' style="color: rgb(94,94,94);"></i>
											</button>
										</div>

											<select name="fournisseur" class="form-select" aria-label="Default select example">
												@foreach ($fournisseur as $f)
														<option value="{{$f->id}}">{{$f->nom}}</option>
												@endforeach
											</select>
											
											
										</form>
									</div>

									<a href="#" onclick="document.getElementById('edit{{$p->id}}').submit();" class="btn btn-primary">confirmer</a>
								</div>						
							</div>
						</div>
						@endif
            @endforeach							
						
					</div>
				</div>


				
			</div>
			<!-- Carousel controls -->
			
		</div>
		
	</div>
</div>
<script>
	
	function add(id){
		$text = document.getElementById("quantite"+id);
		$text.value = Number(document.getElementById("quantite"+id).value)+1;
	}
	function sub(id){
		$text = document.getElementById("quantite"+id);
		$text.value = Number(document.getElementById("quantite"+id).value)-1;
	}
	function myFunction() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1];
            if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
            }       
        }
    }

</script>


@endsection