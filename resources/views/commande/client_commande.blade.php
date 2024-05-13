@extends('repeter.navClient')

@section('title')
    commande
@endsection






{{-- css --}}
@section('cdn')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
{{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> --}}
{{-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> --}}
{{-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> --}}
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> --}}
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> --}}
{{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> --}}
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
        color: black;
        text-align: center;
        border: 1px solid #888888;
        vertical-align: middle;
    }
    button{
    border: none;
    outline: none;
    background: transparent;
    font-size: 25px;
    margin: 0 10px;
    cursor: pointer;
}
</style>
@endsection

@section('content')
    <h1 style="text-align: center;margin: 20px 0;">Mes commandes</h1>
    <div class="container">
        
        <table class="table">
            <thead class="">
              <tr>
                <th style="color: #fff;" scope="col">N°</th>
                <th style="color: #fff;" scope="col" colspan="2">Produit</th>
                <th style="color: #fff;" scope="col">Quantité</th>
                <th style="color: #fff;" scope="col">Date</th>
                <th style="color: #fff;" scope="col">Etat</th>
                <th style="color: #fff;" scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
             
                @foreach($commande as $c)
                        
                        <tr>
                            <td class="id"> {{ $c->id}} </td>
                            <td> 
                                @foreach ($produit as $p)
                                    @if ($p->id == $c->produitId)
                                        <img src="{{$p->image}}" style="width:80px;">
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
                            <td class="quantite"> {{ $c->quantite }} </td>
                            <td> {{ $c->created_at }} </td>
                             
                                @switch($c->etat)
                                    @case(-1)
                                        <td style="color: red;font-size:18px;font-weight:500;">refuser</td>
                                        @break
                                    @case(0)
                                        <td style="color: rgb(255, 123, 0);font-size:18px;font-weight:500;">en cours d 'execution</td>
                                        @break
                                    @case(1)
                                        <td style="color: green;font-size:18px;font-weight:500;">valider</td>
                                        @break
                                    
                                        
                                @endswitch
                                <td   >
                                    <button type="button" class="edit" {{--onclick="edit({{$f->id}})"--}} data-toggle="modal" data-target="#edit">
                                        <i style="color: green;" class='bx bx-edit'></i>
                                    </button>
                                    <button type="button"  onclick="del({{$c->id}})" data-toggle="modal" data-target="#deleteAdjoint">
                                        <i style="color: red;" class='bx bxs-trash-alt'></i>
                                    </button>
                                    
                                    
                                    
                                </td>
                            
                            
                          </tr>
                    
                @endforeach
              
            </tbody>
          </table>
          
          
          
    </div>



<!-- Edit -->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modifier la Quantite de cette Commande</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <form style="text-align: center;width:140px;margin:auto;display:flex;justify-content:center;" id="edit-form" action="{{Route('CC-update')}}" method="POST"> 
            @csrf

            <input type="hidden" name="id" id="id">
            <div style="display: flex;width:100%;">
                
                <button type="button" onclick="sub();">
                    <i class='bx bxs-minus-circle' style="color: rgb(94, 94, 94);font-size:40px;"></i>
                </button>
                <input style="border: none;width: 50px;text-align:center;" type="text" name="quantite" id="quantite" value="0">
                <button type="button" onclick="add();">
                    <i class='bx bxs-plus-circle' style="color: rgb(94,94,94);font-size:40px;"></i>
                </button>
            </div>
                                

                                
            
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" onclick="document.getElementById('edit-form').submit();"  class="btn btn-primary">Enregistrer</button>
        </div>
      </div>
    </div>
  </div>



  <!-- *************************************** Delete  *************************************** -->
  
  
  <div class="modal fade" id="deleteAdjoint" tabindex="-1" role="dialog" aria-labelledby="delete" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Supprimer</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p id="text" style="color: orange;">supprimer cette Commande ?? </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
          
          <form id="del" method="POST">
            @csrf
            @method('DELETE')
            <button style="background: red;" type="submit" class="btn btn-primary">supprimer</button>
          </form>

          {{-- <a style="text-decoration: none;" href="/admin/{{$a->id}}">
            <button style="background: red;" class="btn btn-primary">supprimer</button>
        </a> --}}
          
        </div>
      </div>
    </div>
  </div>

  <!-- ************************************** Ajouter ************************************** -->
  <div class="modal fade" id="ajouter" tabindex="-1" role="dialog" aria-labelledby="ajouter" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ajouter</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          {{-- ************************************************* --}}

          <form id="ajouter-form" method="POST" action="{{ route('fournisseur.store') }}">
          @csrf

          <div class="fullname">
              <input placeholder="nom" id="nom" type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{ old('nom') }}" required autocomplete="nom" autofocus>

                              
              <input placeholder="prenom" id="prenom" type="text" class="form-control @error('prenom') is-invalid @enderror" name="prenom" value="{{ old('prenom') }}" required autocomplete="prenom" autofocus>

                              
          </div>
          
          <input placeholder="telephone" id="telephone" type="text" class="form-control @error('telephone') is-invalid @enderror" name="telephone" value="{{ old('telephone') }}" required autocomplete="telephone">

                              
          {{-- <input placeholder="dateNaissance" id="dateNaissance" type="date" class="form-control @error('dateNaissance') is-invalid @enderror" name="dateNaissance" value="{{ old('dateNaissance') }}" required autocomplete="dateNaissance"> --}}

                              
          <input placeholder="email" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
          <input placeholder="address" id="address" type="email" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address">

                              
          

        </form>
      </div>
      {{-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" onclick="document.getElementById('edit-form').submit();"  class="btn btn-primary">Save changes</button>
      </div> --}}

          {{-- ************************************************* --}}
  
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
          <button style="background: green;" onclick="document.getElementById('ajouter-form').submit();" type="button" class="btn btn-primary">Save</button>
        </div>
      </div>
    </div>
  </div>


  
{{--************************************************ javaScript ***************************************--}}


<script>

function add(){
		$text = document.getElementById("quantite");
		$text.value = Number(document.getElementById("quantite").value)+1;
	}
	function sub(){
		$text = document.getElementById("quantite");
        if(Number(document.getElementById("quantite").value) > 0){
            $text.value = Number(document.getElementById("quantite").value)-1;
        }
		
	}

    $(document).on('click','.edit',function(){
      var _this = $(this).parents('tr');
      
      $('#id').val(_this.find('.id').text());
      $('#quantite').val(_this.find('.quantite').text());
    //   $('#prenom').val(_this.find('.prenom').text());
    //   $('#telephone').val(_this.find('.telephone').text());
    //   $('#address').val(_this.find('.address').text());
    //   $('#email').val(_this.find('.email').text());
    });

    function edit(id){
        $.get('/admin/'+id,function(adjoint){
            $('#nom').val(adjoint.nom);
            $('#prenom').val(adjoint.prenom);
            $('#telephone').val(adjoint.telephone);
            $('#email').val(adjoint.email);
            $('#addresse').val(adjoint.address);
            $('#id').val(adjoint.id);
        });
    }
    function del(id){
        $('#del').attr('action' , "/CC/" + id);
        //document.getElementById("text").innerHTML = "supprimer ce fournisseur "+id;
        // forme = document.getElementById("del")
        // forme.setAttribute("action" , "/admin/" + id);
    }
    function myFunction() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");
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