@extends('repeter.navbar')

@section('title')
    profile
@endsection

@section('profile-active')
   class="active selected"
@endsection



{{-- css --}}
@section('cdn')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
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
    </style>
@endsection

{{-- content html body --}}
@section('content')
<div class="container rounded bg-white mt-2 mb-2">
   <div class="row">
       <div class="col-md-6 border-right">
           <div class="d-flex flex-column align-items-center text-center p-3 py-5">
            <img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
            <span class="font-weight-bold">{{ Auth::user()->name }}</span>
            <span class="text-black-50">{{ Auth::user()->email }}</span>
            <span>
                @if (session('success'))
                <div class="alert alert-success" style="margin: 5px 0px;">
                    <ul style="padding-left:0;width:fit-content; text-align:center;font-size:18px;font-weight:700;">

                        <li>
                            {{ session('success') }}
                        </li>

                    </ul>
                </div>
            @endif    
            @if (session('fail'))
                <div class="alert alert-danger" style="margin: 5px 0px;">
                    <ul style="padding-left:0;width:fit-content;text-align:center;font-size:18px;font-weight:700;">

                        <li>
                            {{ session('fail') }}
                        </li>

                    </ul>
                </div>
            @endif     
            </span></div>
       </div>
       <div class="col-md-6 border-right">
           <div class="p-2 py-6">
               <div class="d-flex justify-content-between align-items-center mb-2">
                   <h4 class="text-right">Profile</h4>
               </div>
               {{-- ******************** --}}
               <form action="{{ url('edit-profile') }}" method="POST">
                  @csrf
                  <div class="row mt-2">
                     <div class="col-md-6"><label class="labels">Nom</label>                      <input type="text" id="name" name="name" class="form-control  @error('name') is-invalid @enderror" placeholder="Entrer votre nom" value="{{ Auth::user()->name }}"></div>
                     <div class="col-md-6"><label class="labels">Prenom</label>                   <input type="text" id="prenom" name="prenom" class="form-control  @error('prenom') is-invalid @enderror" placeholder="Entrer votre prenom" value="{{ Auth::user()->prenom }}"></div>
                  </div>
                  <div class="row mt-3">
                     <div class="col-md-12"><label class="labels">Telephone</label>               <input type="number" id="telephone" name="telephone" class="form-control  @error('telephone') is-invalid @enderror" placeholder="Entrer votre Telephone" value="{{ Auth::user()->telephone }}">
                        @error('telephone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                     <div class="col-md-12"><label class="labels">Date de Naissance</label>       <input type="date" id="dateNaissance" name="dateNaissance" class="form-control  @error('dateNaissance') is-invalid @enderror" placeholder="Entrer votre date de Naissance" value="{{ Auth::user()->dateNaissance }}"></div>
                     <div class="col-md-12"><label class="labels">Email</label>                   <input type="text" id="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Entrer votre Email" value="{{ Auth::user()->email }}">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                     </div>
                     <div class="col-md-12"><label class="labels">Password</label>                <input type="text" id="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Entrer votre mot de pass" value=""></div>
                     <div class="col-md-12"><label class="labels">Confirm Password</label>        <input type="text" id="password_confirmation" name="password_confirmation" class="form-control " placeholder="Confirmer votre mot de pass" value=""></div>
                     {{-- <div class="col-md-12"><label class="labels">Postcode</label><input type="text" class="form-control" placeholder="enter address line 2" value=""></div>
                     <div class="col-md-12"><label class="labels">State</label><input type="text" class="form-control" placeholder="enter address line 2" value=""></div>
                     <div class="col-md-12"><label class="labels">Area</label><input type="text" class="form-control" placeholder="enter address line 2" value=""></div>
                     <div class="col-md-12"><label class="labels">Email ID</label><input type="text" class="form-control" placeholder="enter email id" value=""></div>
                     <div class="col-md-12"><label class="labels">Education</label><input type="text" class="form-control" placeholder="education" value=""></div> --}}
                  </div>
                  {{-- <div class="row mt-3">
                     <div class="col-md-6"><label class="labels">Country</label><input type="text" class="form-control" placeholder="country" value=""></div>
                     <div class="col-md-6"><label class="labels">State/Region</label><input type="text" class="form-control" value="" placeholder="state"></div>
                  </div> --}}
                  <div class="mt-3 text-center"><button class="btn btn-primary profile-button" type="submit">Enregistrer</button></div>
               </form>
               {{-- ******************* --}}
               
           </div>
       </div>
       {{-- <div class="col-md-4">
           <div class="p-3 py-5">
               <div class="d-flex justify-content-between align-items-center experience"><span>Edit Experience</span><span class="border px-3 p-1 add-experience"><i class="fa fa-plus"></i>&nbsp;Experience</span></div><br>
               <div class="col-md-12"><label class="labels">Experience in Designing</label><input type="text" class="form-control" placeholder="experience" value=""></div> <br>
               <div class="col-md-12"><label class="labels">Additional Details</label><input type="text" class="form-control" placeholder="additional details" value=""></div>
           </div>
       </div> --}}
   </div>
</div>
</div>
</div>
@endsection