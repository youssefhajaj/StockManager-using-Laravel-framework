@extends('repeter.navbar')

@section('title')
    adjoint
@endsection

@section('adjoint-active')
   class="active selected"
@endsection




@section('cdn')

    <style>
        *{
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
}
body{
    font-family: Helvetica;
    -webkit-font-smoothing: antialiased;
}
.title{
    display: flex;
    align-items: center;
    gap: 20px;
}


/* Table Styles */

.table-wrapper{
    margin: 10px 70px 70px;
    box-shadow: 0px 35px 50px rgba( 0, 0, 0, 0.2 );
}

.fl-table {
    border-radius: 5px;
    font-size: 12px;
    font-weight: normal;
    border: none;
    border-collapse: collapse;
    width: 100%;
    max-width: 100%;
    white-space: nowrap;
    background-color: white;
}

.fl-table td, .fl-table th {
    font-size: 19px;
    text-align: center;
    padding: 8px;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
}

.fl-table td {
    border-right: 1px solid #f8f8f8;
    font-size: 18px;
}

.fl-table thead th {
    color: #ffffff;
    background: #7a7a7a;
}


.fl-table thead th:nth-child(odd) {
    color: #ffffff;
    background: #585858;
}

.fl-table tr:nth-child(even) {
    background: #e0e0e0;
}

/* Responsive */

/* @media (max-width: 767px) {
    .fl-table {
        display: block;
        width: 100%;
    }
    .table-wrapper:before{
        content: "Scroll horizontally >";
        display: block;
        text-align: right;
        font-size: 11px;
        color: white;
        padding: 0 0 10px;
    }
    .fl-table thead, .fl-table tbody, .fl-table thead th {
        display: block;
    }
    .fl-table thead th:last-child{
        border-bottom: none;
    }
    .fl-table thead {
        float: left;
    }
    .fl-table tbody {
        width: auto;
        position: relative;
        overflow-x: auto;
    }
    .fl-table td, .fl-table th {
        padding: 20px .625em .625em .625em;
        height: 60px;
        vertical-align: middle;
        box-sizing: border-box;
        overflow-x: hidden;
        overflow-y: auto;
        width: 120px;
        font-size: 13px;
        text-overflow: ellipsis;
    }
    .fl-table thead th {
        text-align: left;
        border-bottom: 1px solid #f7f7f9;
    }
    .fl-table tbody tr {
        display: table-cell;
    }
    .fl-table tbody tr:nth-child(odd) {
        background: none;
    }
    .fl-table tr:nth-child(even) {
        background: transparent;
    }
    .fl-table tr td:nth-child(odd) {
        background: #F8F8F8;
        border-right: 1px solid #E6E4E4;
    }
    .fl-table tr td:nth-child(even) {
        border-right: 1px solid #E6E4E4;
    }
    .fl-table tbody td {
        display: block;
        text-align: center;
    } 
}*/
a{
    text-decoration: none;
}
.box_icon{
    display: flex;
    align-items: center;
    justify-content: space-around;
}
.box_icon i{
    font-size: 24px;
}
.box_icon button{
    border: none;
    outline: none;
    background: transparent;
}
.box_icon button:hover{
    background: transparent;
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
    margin: 20px 70px;
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
  left: 85px;
  font-size: 26px;
}


    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
@endsection



@section('content')
<div class="title">
    <i class="fa-sharp fa-regular fa-list-ul"></i>
    <h2>La liste des Adjoints</h2>
</div>


@if ($errors->any())
    <div class="alert alert-danger" style="margin: 5px 300px;">
        <ul style="font-size:16px;font-weight:500;">
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
    <ul style="text-align:center;font-size:18px;font-weight:500;">

            <li>
                {{ session('success') }}
            </li>

    </ul>
</div>
@endif

<div class="ajouter">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ajouter">
       ajouter adjoint
      </button>
    </div>

    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Chercher par nom..." title="Type in a name">
    <div class="srch">
      <i class='bx bx-search'></i>
    </div>
<div class="table-wrapper">
    

    <table id="myTable" class="fl-table">
        <thead>
        <tr>
            <th style="display: none;">id</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Email</th>
            <th>Phone</th>
            <th>DateNaissance</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>


            @foreach ($adjoints as $a)
                <tr>
                    <td style="display:none;" class="id"> {{ $a->id }} </td>
                    <td class="name"> {{ $a->name }} </td>
                    <td class="prenom"> {{ $a->prenom }} </td>
                    <td class="email"> {{ $a->email }} </td>
                    <td class="telephone"> {{ $a->telephone }} </td>
                    <td class="dateNaissance"> {{ $a->dateNaissance }} </td>
                    <td class="box_icon">
                        <button type="button" {{--onclick="edit({{$a->id}})"--}} class="edit btn btn-primary" data-toggle="modal" data-target="#edit">
                            <i style="color: green;" class='bx bx-edit'></i>
                        </button>
                        <button type="button"  onclick="del({{$a->id}})" class="btn btn-primary" data-toggle="modal" data-target="#deleteAdjoint">
                            <i style="color: red;" class='bx bxs-trash-alt'></i>
                        </button>
                    
                    </td>
                </tr>
            @endforeach
            
        
        <tbody>
    </table>
</div>

{{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit">
    Launch demo modal
  </button> --}}
  
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

          <form id="edit-form" action="{{Route('update')}}" method="POST"> 
            @csrf
            {{-- @method('PUT') --}}

            <input type="hidden" name="id" id="id">
            <div class="fullname">
                <input placeholder="nom" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                
                <input placeholder="prenom" id="prenom" type="text" class="form-control @error('prenom') is-invalid @enderror" name="prenom" value="{{ old('prenom') }}" required autocomplete="prenom" autofocus>

                                
            </div>
            
            <input placeholder="telephone" id="telephone" type="text" class="form-control @error('telephone') is-invalid @enderror" name="telephone" value="{{ old('telephone') }}" required autocomplete="telephone">

                                
            <input  id="dateNaissance" type="date" class="form-control @error('dateNaissance') is-invalid @enderror" name="dateNaissance" required autocomplete="dateNaissance">

                                
            <input placeholder="email" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                
            
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
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
          <p style="color: orange;">supprimer ce adjoint ??</p>
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

          <form id="ajouter-form" method="POST" action="{{ route('admin.store') }}">
          @csrf

          <div class="fullname">
              <input placeholder="nom" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                              
              <input placeholder="prenom" id="prenom" type="text" class="form-control @error('prenom') is-invalid @enderror" name="prenom" value="{{ old('prenom') }}" required autocomplete="prenom" autofocus>

                              
          </div>
          
          <input placeholder="telephone" id="telephone" type="text" class="form-control @error('telephone') is-invalid @enderror" name="telephone" value="{{ old('telephone') }}" required autocomplete="telephone">

                              
          <input placeholder="dateNaissance" id="dateNaissance" type="date" class="form-control @error('dateNaissance') is-invalid @enderror" name="dateNaissance" value="{{ old('dateNaissance') }}" required autocomplete="dateNaissance">

                              
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
      $('#name').val(_this.find('.name').text());
      $('#prenom').val(_this.find('.prenom').text());
      $('#telephone').val(_this.find('.telephone').text());
      $('#dateNaissance').val(_this.find('.dateNaissance').text());
      $('#email').val(_this.find('.email').text());
    });

    function edit(id){
        $.get('/admin/'+id,function(adjoint){
            $('#name').val(adjoint.name);
            $('#prenom').val(adjoint.prenom);
            $('#telephone').val(adjoint.telephone);
            $('#dateNaissance').val(adjoint.dateNaissance);
            $('#email').val(adjoint.email);
            $('#id').val(adjoint.id);
        });
    }
    function del(id){
        $('#del').attr('action' , "/admin/" + id);
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
