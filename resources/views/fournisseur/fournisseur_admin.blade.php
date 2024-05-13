@extends('repeter.navbar')


@section('title')
    fournisseur
@endsection

@section('fournisseur-active')
   class="active selected"
@endsection

@section('cdn')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<style>
    button{
    border: none;
    outline: none;
    background: transparent;
    font-size: 25px;
    margin: 0 10px;
}
table *{
    text-align: center;
}
.button{
    margin: 10px;
    margin-left: 800px;
    padding: 10px 20px;
    font-size: 18px;
    color: white;
    border-radius: 6px;
    background: rgb(177, 18, 192);
}
form{
    margin: 3px 20px;
    display: flex;
    flex-direction: column;
    gap: 5px;
    color: black;
    font-weight: 800;
}
form .fullname{
    display: flex;
    align-items: center;
    justify-content: center;
    width: 100%;
    gap: 10px;
}
form input{
    padding: 5px 10px;
    font-size: 22px;
    color: black;
    font-weight: 800;
}
#edit-form input{
    font-size: 22px;
    color: black;
}
#ajouter-form input{
    font-size: 22px;
    color: black;
}
::placeholder{
    font-size: 18px;
    color: black;
}

.ajouter{
    width: 100%;
    display: flex;
    justify-content: flex-end;
    margin: 10px -70px;
}
#myInput{
    padding: 10px 50px;
    width: 300px;
    margin: 20px 0;
    border-radius: 50vh;
    border: 1px solid #565656;
    outline: none;
}
.srch{
  position: relative;
}
.srch i{
  position: absolute;
  top: -54px;
  left: 18px;
  font-size: 26px;
}
</style>
@endsection

@section('content')
    
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center mb-5">
                <h2 class="heading-section">Liste des Fournisseurs</h2>
            </div>
        </div>
        
{{-- /***************** --}}
@if ($errors->any())
    <div class="alert alert-danger" style="margin: 5px 280px;">
        <ul style="font-size:17px;font-weight:500;">
            @foreach ($errors->all() as $error)
                <li>
                    {{ $error }}
                </li>
            @endforeach
        </ul>
    </div>
@endif
@if (session('success'))
<div class="alert alert-success" style="margin: 5px 300px;">
    <ul style="text-align:center;font-size:18px;font-weight:700;">

            <li>
                {{ session('success') }}
            </li>

    </ul>
</div>
@endif
{{-- /***************** --}}

        <button class="button" data-toggle="modal" data-target="#ajouter">Ajouter fournisseur</button>
        
        <div class="row">
            <div class="col-md-12">
                {{-- <h4 class="text-center mb-4">Create Your Domain Name</h4> --}}
                <div class="table-wrap">
                  <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Chercher par nom..." title="Type in a name">
                  <div class="srch">
                    <i class='bx bx-search'></i>
                  </div>
                  

                    <table class="table" id="myTable">
                    <thead class="thead-primary">
                      <tr>
                        <th style="background: #0066ff;">Nom</th>
                        <th style="background: #0066ff;">Prenom</th>
                        <th style="background: #0066ff;">Telephone</th>
                        <th style="background: #0066ff;">Email</th>
                        <th style="background: #0066ff;">Addresse</th>
                        <th style="background: #0066ff;">Action</th>
                      </tr>
                    </thead>
                    {{-- <tbody> --}}
                      
                      @foreach ($fournisseur as $f)
                      <tr>
                        <td style="display:none;" class="id"> {{ $f->id }} </td>
                        <td class="nom" style="border-left: 1px solid #585858;border-bottom:1px solid #585858;" >{{$f->nom}}</td>
                        <td class="prenom" style="border-bottom:1px solid #585858;">{{$f->prenom}}</td>
                        <td class="telephone" style="border-bottom:1px solid #585858;">{{$f->telephone}}</td>
                        <td class="email" style="border-bottom:1px solid #585858;">{{$f->email}}</td>
                        <td class="address" style="border-bottom:1px solid #585858;">{{$f->address}}</td>
                        <td  style="border-right: 1px solid #585858;border-bottom:1px solid #585858;" >
                            <button type="button" class="edit" {{--onclick="edit({{$f->id}})"--}} data-toggle="modal" data-target="#edit">
                                <i style="color: green;" class='bx bx-edit'></i>
                            </button>
                            <button type="button"  onclick="del({{$f->id}})" data-toggle="modal" data-target="#deleteAdjoint">
                                <i style="color: red;" class='bx bxs-trash-alt'></i>
                            </button>
                            <button type="button"  onclick="document.getElementById('pdf{{$f->id}}').submit();">
                              <i style="color: orange;" class='bx bxs-file-pdf'></i>
                          </button>
                          
                          <form action="{{route('pdf')}}" id="pdf{{$f->id}}" method="GET" hidden>
                            <input type="text" value="{{$f->id}}" name="id" id="id">
                          </form>
                            
                            
                        </td>
                      </tr>
                      @endforeach
                      
                      
                    {{-- </tbody> --}}
                  </table>
                </div>
            </div>
        </div>
    </div>
</section>



<!-- Edit -->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modifier</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <form id="edit-form" action="{{Route('fournisseur-update')}}" method="POST"> 
            @csrf
            {{-- @method('PUT') --}}

            <input type="hidden" name="id" id="id">
            <div class="fullname">
                <input placeholder="nom" id="nom" type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{ old('nom') }}" required autocomplete="nom" autofocus>

                                
                <input placeholder="prenom" id="prenom" type="text" class="form-control @error('prenom') is-invalid @enderror" name="prenom" value="{{ old('prenom') }}" required autocomplete="prenom" autofocus>

                                
            </div>
            
            <input placeholder="addresse" id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address">
            <input placeholder="telephone" id="telephone" type="text" class="form-control @error('telephone') is-invalid @enderror" name="telephone" value="{{ old('telephone') }}" required autocomplete="telephone">

                                
            {{-- <input  id="dateNaissance" type="date" class="form-control @error('dateNaissance') is-invalid @enderror" name="dateNaissance" required autocomplete="dateNaissance"> --}}

                                
            <input placeholder="email" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                
            
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
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
          <p id="text" style="color: orange;">supprimer ce fournisseur ?? </p>
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

    $(document).on('click','.edit',function(){
      var _this = $(this).parents('tr');
      
      $('#id').val(_this.find('.id').text());
      $('#nom').val(_this.find('.nom').text());
      $('#prenom').val(_this.find('.prenom').text());
      $('#telephone').val(_this.find('.telephone').text());
      $('#address').val(_this.find('.address').text());
      $('#email').val(_this.find('.email').text());
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
        $('#del').attr('action' , "/fournisseur/" + id);
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