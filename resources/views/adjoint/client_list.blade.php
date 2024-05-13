@extends('repeter.navbar_adjoint')

@section('title')
    professeurs
@endsection

@section('client-active')
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
    </style>
@endsection



@section('content')
<main>
        
  <!--MDB Tables-->
  <h2 style="text-align: center;">Liste des professeur</h2>
  <div class="container mt-4">

      

      <div class="card mb-4">
          <div class="card-body">
              <!-- Grid row -->
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
              <!-- Grid row -->
              <!--Table-->
              <button class="btn btn-primary" style="margin-bottom: 20px;" data-toggle="modal" data-target="#ajouter">Ajouter Professeur</button>
              <table class="table table-striped">
                  <!--Table head-->
                  <thead>
                      <tr>
                          <th>Nom</th>
                          <th>Prenom</th>
                          <th>Email</th>
                          <th>Telephone</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                  <!--Table head-->
                  <!--Table body-->
                  <tbody>
                      @foreach ($user as $u)
                          @if (!$u->isAdmin)
                          <tr>
                            <td style="display:none;" class="id"> {{ $u->id }} </td>
                            <td class="nom">{{$u->name}}</td>
                            <td class="prenom">{{$u->prenom}}</td>
                            <td class="email">{{$u->email}}</td>
                            <td class="telephone">{{$u->telephone}}</td>
                            <td>
                                <button type="button" class="edit" {{--onclick="edit({{$f->id}})"--}} data-toggle="modal" data-target="#edit">
                                    <i style="color: green;" class='bx bx-edit'></i>
                                </button>
                                <button type="button"  onclick="del({{$u->id}})" data-toggle="modal" data-target="#deleteAdjoint">
                                    <i style="color: red;" class='bx bxs-trash-alt'></i>
                                </button>
                                
                            </td>
                        </tr>
                          @endif
                      @endforeach
                  </tbody>
                  <!--Table body-->
              </table>
              <!--Table-->
          </div>
      </div>
      
      
      
    
      

  </div>
  <!--MDB Tables-->

</main>
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

          <form id="edit-form" action="{{Route('professeur-update')}}" method="POST"> 
            @csrf
            {{-- @method('PUT') --}}

            <input type="hidden" name="id" id="id">
            <div class="fullname">
                <input placeholder="nom" id="nom" type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{ old('nom') }}" required autocomplete="nom" autofocus>

                                
                <input placeholder="prenom" id="prenom" type="text" class="form-control @error('prenom') is-invalid @enderror" name="prenom" value="{{ old('prenom') }}" required autocomplete="prenom" autofocus>

                                
            </div>
            
            <input placeholder="telephone" id="telephone" type="text" class="form-control @error('telephone') is-invalid @enderror" name="telephone" value="{{ old('telephone') }}" required autocomplete="telephone">

                                
            {{-- <input  id="dateNaissance" type="date" class="form-control @error('dateNaissance') is-invalid @enderror" name="dateNaissance" required autocomplete="dateNaissance"> --}}

                                
            <input placeholder="email" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                
            
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
          <p id="text" style="color: orange;">supprimer ce professeur ?? </p>
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

          <form id="ajouter-form" method="POST" action="{{ route('professeur.store') }}">
          @csrf

          <div class="fullname">
              <input placeholder="nom" id="nom" type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{ old('nom') }}" required autocomplete="nom" autofocus>

                              
              <input placeholder="prenom" id="prenom" type="text" class="form-control @error('prenom') is-invalid @enderror" name="prenom" value="{{ old('prenom') }}" required autocomplete="prenom" autofocus>

                              
          </div>
          
          <input placeholder="telephone" id="telephone" type="text" class="form-control @error('telephone') is-invalid @enderror" name="telephone" value="{{ old('telephone') }}" required autocomplete="telephone">

                              
          {{-- <input placeholder="dateNaissance" id="dateNaissance" type="date" class="form-control @error('dateNaissance') is-invalid @enderror" name="dateNaissance" value="{{ old('dateNaissance') }}" required autocomplete="dateNaissance"> --}}

                              
          <input placeholder="email" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                              
          

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
      $('#email').val(_this.find('.email').text());
    });

    // function edit(id){
    //     $.get('/admin/'+id,function(adjoint){
    //         $('#nom').val(adjoint.nom);
    //         $('#prenom').val(adjoint.prenom);
    //         $('#telephone').val(adjoint.telephone);
    //         $('#email').val(adjoint.email);
    //         $('#addresse').val(adjoint.address);
    //         $('#id').val(adjoint.id);
    //     });
    // }
    function del(id){
        $('#del').attr('action' , "/professeur/" + id);
        //document.getElementById("text").innerHTML = "supprimer ce fournisseur "+id;
        // forme = document.getElementById("del")
        // forme.setAttribute("action" , "/admin/" + id);
    }
    
</script>   
@endsection

