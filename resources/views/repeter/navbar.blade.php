<?php 
 use Illuminate\Support\Facades\Auth;
 use App\Models\Fournisseur;
 use App\Models\User;
 use App\Models\Commande;
 use App\Models\Produit;
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>@yield('title')</title>
   
   <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

   <style>
      @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap");

*,
*::before,
*::after {
  padding: 0;
  margin: 0;
  box-sizing: border-box;
}

:root {
  --main-color: #313131;
  --main-color-dark: #141414;
  --main-color-light: #686868;
  --text-color: #cfcde7;
}

body {
  font-family: "Poppins", sans-serif;
  overflow-x: hidden;
  background-color: #ffffff;
  min-height: 100vh;
  display: flex;
  position: relative;
}


a {
  text-decoration: none;
}

ul {
  list-style: none;
}

nav {
  position: sticky;
  top: 0;
  left: 0;
  height: 100vh;
  background-color: var(--main-color);
  width: 14rem;
  padding: 1.8rem 0.3rem;
  color: #fff;
  display: flex;
  flex-direction: column;
  transition: width 0.5s ease-in-out;
}

nav::before {
  content: "";
  position: absolute;
  width: 2rem;
  height: 100%;
  top: 0;
  left: 100%;
}

main {
  flex: 1;
  padding: 2rem;
  color: #1f2027;
  display: flex;
  flex-direction: column;
}

main h1 {
  margin-bottom: 1rem;
}

main .copyright {
  margin-top: auto;
  font-size: 0.9rem;
}

main .copyright span {
  color: var(--main-color);
  font-weight: 500;
  cursor: pointer;
}

.sidebar-top {
  position: relative;
  display: flex;
  align-items: center;
  margin-bottom: 20px;
}

.sidebar-top .logo {
  width: 3rem;
  margin: 0 0.3rem;
}

.sidebar-top h3 {
  padding-left: 0.5rem;
  font-weight: 600;
  font-size: 1.15rem;
}

.shrink-btn {
  position: absolute;
  top: 50%;
  height: 27px;
  padding: 0 0.3rem;
  background-color: var(--main-color);
  border-radius: 6px;
  cursor: pointer;
  box-shadow: 0 3px 10px -3px rgba(70, 46, 118, 0.3);
  right: -2.65rem;
  transform: translateY(-50%) translateX(-8px);
  opacity: 0;
  pointer-events: none;
  transition: 0.3s;
}

.shrink-btn i {
  line-height: 27px;
  transition: 0.3s;
}

.shrink-btn:hover {
  background-color: var(--main-color-dark);
}

nav:hover .shrink-btn,
.shrink-btn.hovered {
  transform: translateY(-50%) translateX(0px);
  opacity: 1;
  pointer-events: all;
}

.search {
  min-height: 2.7rem;
  background-color: var(--main-color-light);
  margin: 2rem 0.5rem 1.7rem;
  display: grid;
  grid-template-columns: 2.7rem 1fr;
  align-items: center;
  text-align: center;
  border-radius: 50px;
  cursor: pointer;
}

.search input {
  height: 100%;
  border: none;
  background: none;
  outline: none;
  color: #fff;
  caret-color: #fff;
  font-family: inherit;
}

.search input::placeholder {
  color: var(--text-color);
}

.sidebar-links ul {
  position: relative;
}

.sidebar-links li {
  position: relative;
  padding: 2.5px 0;

}
.sidebar-links ul,ol{
  padding-left: 0rem;
}
.sidebar-links a {
  color: var(--text-color);
  font-weight: 400;
  font-size: 0.9rem;
  display: flex;
  align-items: center;
  height: 41px;
  text-decoration: none;
}
a{
  text-decoration: none;
}
/* ***************************************************** */
.sidebar-links .tooltip-element{
  border-radius: 8px;
    transition: 0.3s;
    position: relative;
    text-decoration: none;
}
.sidebar-links .tooltip-element:hover{
  background-color: #101014;
  text-decoration: none;
}
.sidebar-links .tooltip-element .selected{
  background-color: #101014;
  border-radius: 10px;
}



.icon {
  font-size: 1.3rem;
  text-align: center;
  min-width: 3.7rem;
  display: grid;
  grid-template-columns: 1fr;
  grid-template-rows: 1fr;
}

.icon i {
  grid-column: 1 / 2;
  grid-row: 1 / 2;
  transition: 0.3s;
}

.icon i:last-child {
  opacity: 0;
  color: #fff;
}

.sidebar-links a.active,
.sidebar-links a:hover {
  color: #fff;
  text-decoration: none;
}

.sidebar-links a .link {
  transition: opacity 0.3s 0.2s, color 0.3s;
  text-decoration: none;
}

.sidebar-links a.active i:first-child {
  opacity: 0;
}

.sidebar-links a.active i:last-child {
  opacity: 1;
}

.active-tab {
  width: 100%;
  height: 53px;
  background-color: var(--main-color-dark);
  border-radius: 10px;
  position: absolute;
  top: 2.5px;
  left: 0;
  transition: top 0.3s;
}

.sidebar-links h4 {
  position: relative;
  font-size: 0.8rem;
  text-transform: uppercase;
  font-weight: 600;
  padding: 0 0.8rem;
  color: var(--text-color);
  letter-spacing: 0.5px;
  height: 45px;
  line-height: 45px;
  transition: opacity 0.3s 0.2s, height 0.5s 0s;
}

.sidebar-footer {
  position: absolute;
  margin-top: auto;
  bottom: 0;
}

.account {
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1.3rem;
  color: var(--text-color);
  height: 53px;
  width: 3.7rem;
  opacity: 0;
  pointer-events: none;
  transition: opacity 0.3s 0s, color 0.3s 0s;
}

.account:hover {
  color: #fff;
}

.admin-user {
  display: flex;
  align-items: center;
}

.admin-profile {
  white-space: nowrap;
  max-width: 100%;
  transition: opacity 0.3s 0.2s, max-width 0.7s 0s ease-in-out;
  display: flex;
  align-items: center;
  flex: 1;
  overflow: hidden;
}

.admin-user img {
  width: 2.9rem;
  border-radius: 50%;
  margin: 0 0.4rem;
}

.admin-info {
  padding-left: 0.3rem;
}

.admin-info h3 {
  font-weight: 500;
  font-size: 1rem;
  line-height: 1;
}

.admin-info h5 {
  font-weight: 400;
  font-size: 0.75rem;
  color: var(--text-color);
  margin-top: 0.3rem;
  line-height: 1;
}

.log-out {
  display: flex;
  height: 40px;
  min-width: 2.4rem;
  background-color: var(--main-color-dark);
  color: var(--text-color);
  align-items: center;
  justify-content: center;
  font-size: 1.15rem;
  border-radius: 10px;
  margin: 0 0.65rem;
  transition: color 0.3s;
}

.log-out:hover {
  color: #fff;
}

/* .tooltip {
  background-color: var(--main-color);
  position: absolute;
  right: -1.2rem;
  top: 0;
  transform: translateX(100%) translateY(-50%);
  padding: 0 0.8rem;
  font-size: 0.85rem;
  display: none;
  grid-template-rows: 1fr;
  grid-template-columns: 1fr;
  height: 30px;
  align-items: center;
  border-radius: 7px;
  box-shadow: 0 3px 10px -3px rgba(70, 46, 118, 0.3);
  opacity: 0;
  pointer-events: none;
  transition: all 0.05s;
  text-align: center;
  white-space: nowrap;
} */

.tooltip span {
  grid-column: 1 / 2;
  grid-row: 1 / 2;
  opacity: 0;
  transition: 0.3s;
}

.tooltip span.show {
  opacity: 1;
}

/* .tooltip-element:hover ~ .tooltip {
  opacity: 1;
  pointer-events: all;
} */

/* When the menu shrinks */

.hide {
  transition: opacity 0.3s 0.2s;
}

body.shrink nav {
  width: 4.4rem;
}

body.shrink .hide {
  opacity: 0;
  pointer-events: none;
  transition-delay: 0s;
}

body.shrink .shrink-btn i {
  transform: rotate(-180deg);
}

body.shrink .sidebar-links h4 {
  height: 10px;
}

body.shrink .account {
  opacity: 1;
  pointer-events: all;
  transition: opacity 0.3s 0.3s, color 0.3s 0s;
}

body.shrink .admin-profile {
  max-width: 0;
  transition: opacity 0.3s 0s, max-width 0.7s 0s ease-in-out;
}

/* body.shrink .tooltip {
  display: grid;
} */
body.shrink .container{
  width: 100%;
}
.container{
  width: 100%;
  padding: 10px 40px;
  margin: 0;
}
::placeholder{
  color: white;
}
.dropdown{
  background: #1f2027;
  
  position: absolute;
  top: -35px;
  left: 10px;
}
.dropdown-menu{
  background: #1f2027;
}
.links  a{
  color: rgb(255, 255, 255);
  text-decoration: none;
}
.links  a:hover{
  color: rgb(255, 255, 255);
  background: #101014;
  text-decoration: none;
}
.links{
  position: relative;
}
.entree{
  position: absolute;
  background: #1f2027;
  top: -90px;
  left:30px;

  max-height: 0;
  overflow: hidden;

  
  border-radius: 3px;
  transition: 0.3s ease-in-out;
}
.entree-link:hover + .entree{
  max-height: fit-content;
  padding: 10px 0;
  border: 1px solid white;
}
.entree:hover{
  max-height: fit-content;
  padding: 10px 0;
    border: 1px solid white;
}
.bell{
  margin-left: 10px;
}
.bell img{
  width: 20px;
  height: 20px;
}

   </style>

<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
@yield('cdn')
</head>
<body style="background-color: rgb(224, 224, 224);">

   <nav>
      <div class="sidebar-top">
        <span class="shrink-btn">
          <i class='bx bx-chevron-left'></i>
        </span>
        <img src="{{asset('img/logo-app.png')}}" class="logo" alt="">
        <h3 class="hide" style="font-family: 'Poppins', sans-serif;color: white;font-weight: 600;font-size: 1.15rem;">Stock</h3>
        <a class="hide bell" href="{{route('admin.notification')}}">
          <img src="{{asset('img/bell.png')}}">
        </a>

        
        

        
      </div>
   
      {{-- <div class="search">
        <i class='bx bx-search'></i>
        <input type="text" style="color:white;"  class="hide" placeholder="Quick Search ...">
      </div> --}}
   
      <div class="sidebar-links">
        <ul>

          {{-- ******************************** --}}
          {{-- <div class="active-tab"></div> --}}

          
  

          <li class="tooltip-element" data-tooltip="0">
            <a href="{{route('admin.dashboard')}}" @yield('dashboard-active') data-active="0">
              <div class="icon">
                <i class='bx bx-tachometer'></i>
                <i class='bx bxs-tachometer'></i>
              </div>
              <span class="link hide">Tableau de bord</span>
            </a>
          </li>

          
          {{-- **************************************** --}}
          <li class="tooltip-element dropdownmenu" data-tooltip="1">
            <a href="{{route('produit.admin.index')}}" @yield('produit-active') data-active="1">
              <div class="icon">
                <i class='bx bxs-component'></i>
                <i class='bx bxs-component'></i>
              </div>
              <span class="link hide">Produit</span>
            </a>
          </li>
          <li class="tooltip-element dropdownmenu" data-tooltip="1">
            <a href="{{route('admin.index')}}" @yield('adjoint-active')   data-active="1">
              <div class="icon">
                <i class='bx bx-user-circle'></i>
                <i class='bx bxs-user-circle' ></i>
              </div>
              <span class="link hide">Adjoints</span>
            </a>
          </li>
            {{-- **************************************** --}}
            <li class="tooltip-element dropdownmenu" data-tooltip="1">
              <a href="#" @yield('categorie-active') data-active="1" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="icon">
                  <i class='bx bx-category'></i>
                  <i class='bx bxs-category'></i>
                </div>
                <span class="link hide">Categorie</span>
              </a>
              <div class="dropdown">
                <div style="background:#1f2027" class="links dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="{{route('produit.admin.index.consommable')}}">Consommable</a>
                  <a class="dropdown-item" href="{{route('produit.admin.index.industriel')}}">Industriel</a>
                  <a class="dropdown-item" href="{{route('produit.admin.index.bureautique')}}">Bureautique</a>
                </div>
              </div>
            </li>
            
            {{-- **************************************** --}}
            <li class="tooltip-element dropdownmenu" data-tooltip="1">
              <a href="{{route('admin.fournisseur')}}" @yield('fournisseur-active') data-active="1">
                <div class="icon">
                  <i class='bx bx-user'></i>
                  <i class='bx bxs-user' ></i>
                </div>
                <span class="link hide">Fournisseur</span>
              </a>
              
            </li>
            {{-- **************************************** --}}
            <li class="tooltip-element dropdownmenu" data-tooltip="1">
              <a href="{{route('admin.stock')}}" @yield('stock-active') data-active="1">
                <div class="icon">
                  <i class='bx bx-store-alt'></i>
                  <i class='bx bxs-store-alt' ></i>
                </div>
                <span class="link hide">Stock</span>
              </a>
              
            </li>
            {{-- **************************************** --}}
            <li class="tooltip-element dropdownmenu" data-tooltip="1">
              <a href="{{route('admin.client')}}" @yield('client-active') data-active="1">
                <div class="icon">
                  <i class='bx bxs-id-card'></i>
                  <i class='bx bxs-id-card'></i>
                </div>
                <span class="link hide">Professeur</span>
              </a>
            </li>

            {{-- **************************************** --}}
            <li class="tooltip-element dropdownmenu" data-tooltip="1">
              <a href="#" @yield('commande-active') data-active="1" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="icon">
                  <i class='bx bx-receipt'></i>
                  <i class='bx bxs-receipt' ></i>
                </div>
                <span class="link hide">Commande</span>
              </a>

              <div class="dropdown">
                <div style="background:#1f2027" class="links dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="entree-link dropdown-item" href="{{--route('admin.commande.entree')--}}javascript:void(0)" >Entrée</a>
                  <div class="entree" id="entree">
                    <a class="dropdown-item"  href="{{route('commande.entree.adjoint')}}" >Adjoint Commandes</a>
                    <a class="dropdown-item"  href="{{route('commande.entree.admin')}}" >Mes Commande</a>
                  </div>
                  <a class="dropdown-item" href="{{route('admin.commande.sortie')}}">Sortie</a>
                </div>
              </div>

              

                

            </li>
            


              


            {{-- **************************************** --}}
          <li class="tooltip-element dropdownmenu" data-tooltip="1">
            <a href="{{route('admin.profile')}}" @yield('profile-active') data-active="1">
              <div class="icon">
                <i class='bx bx-notepad'></i>
                <i class='bx bxs-notepad' ></i>
              </div>
              <span class="link hide">Profile</span>
            </a>
          </li>
         
          
              

            


            
          

          
        
            {{-- **************************************** --}}
          

          {{-- <li class="tooltip-element" data-tooltip="2">
            <a href="#" data-active="2">
              <div class="icon">
                <i class='bx bx-message-square-detail'></i>
                <i class='bx bxs-message-square-detail'></i>
              </div>
              <span class="link hide">Messages</span>
            </a>
          </li>
          <li class="tooltip-element" data-tooltip="3">
            <a href="#" data-active="3">
              <div class="icon">
                <i class='bx bx-bar-chart-square'></i>
                <i class='bx bxs-bar-chart-square'></i>
              </div>
              <span class="link hide">Analytics</span>
            </a>
          </li> --}}
          {{-- <div class="tooltip">
            <span class="show">Dashboard</span>
            <span>Projects</span>
            <span>Messages</span>
            <span>Analytics</span>
          </div> --}}
        </ul>
   
        {{-- <h4 class="hide">Shortcuts</h4>
   
        <ul>
          <li class="tooltip-element" data-tooltip="0">
            <a href="#" data-active="4">
              <div class="icon">
                <i class='bx bx-notepad'></i>
                <i class='bx bxs-notepad'></i>
              </div>
              <span class="link hide">Tasks</span>
            </a>
          </li>
          <li class="tooltip-element" data-tooltip="1">
            <a href="#" @yield('') data-active="5">
              <div class="icon">
                <i class='bx bx-help-circle'></i>
                <i class='bx bxs-help-circle'></i>
              </div>
              <span class="link hide">Help</span>
            </a>
          </li>
          <li class="tooltip-element" data-tooltip="2">
            <a href="#" data-active="6">
              <div class="icon">
                <i class='bx bx-cog'></i>
                <i class='bx bxs-cog'></i>
              </div>
              <span class="link hide">Settings</span>
            </a>
          </li> --}}
          {{-- <div class="tooltip">
            <span class="show">Tasks</span>
            <span>Help</span>
            <span>Settings</span>
          </div> --}}
        {{-- </ul> --}}
      </div>
   
      <div class="sidebar-footer">
        {{-- <a href="#" class="account tooltip-element" data-tooltip="0">
          <i class='bx bx-user'></i>
        </a> --}}
        <div class="admin-user tooltip-element" data-tooltip="1">
          <div class="admin-profile hide">
            <img src="{{asset('img/logo.png')}}" alt="">
            <div class="admin-info">
              <h3 style="color: white;"> {{Auth::user()->name}} </h3>
              <h5>Admin</h5>
            </div>
          </div>
          {{-- <a href="#" class="log-out">
            <i class='bx bx-log-out'></i>
          </a> --}}
          <a class="log-out" style="text-decoration: none;" href="{{ route('logout') }}"
                     onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                        <i class='bx bx-log-out'></i>
                      </a>
   
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                  </form>
        </div>
        {{-- <div class="tooltip">
          <span class="show">John Doe</span>
          <span>Logout</span>
        </div> --}}
      </div>
    </nav>
   

   {{-- container   --}}
    <div class="container" style="padding: 10px 40px;width: 100%;background-color: rgb(224, 224, 224);">
      @yield('content')
    </div>
      
    @yield('script')


      
      <script>
         const shrink_btn = document.querySelector(".shrink-btn");
const search = document.querySelector(".search");
const sidebar_links = document.querySelectorAll(".sidebar-links a");
const active_tab = document.querySelector(".active-tab");
const shortcuts = document.querySelector(".sidebar-links h4");
const tooltip_elements = document.querySelectorAll(".tooltip-element");

let activeIndex;

shrink_btn.addEventListener("click", () => {
  document.body.classList.toggle("shrink");
  setTimeout(moveActiveTab, 400);

  shrink_btn.classList.add("hovered");

  setTimeout(() => {
    shrink_btn.classList.remove("hovered");
  }, 500);
});

search.addEventListener("click", () => {
  document.body.classList.remove("shrink");
  search.lastElementChild.focus();
});






// function moveActiveTab() {
//   let topPosition = activeIndex * 58 + 2.5;

//   if (activeIndex > 3) {
//     topPosition += shortcuts.clientHeight;
//   }

//   active_tab.style.top = `${topPosition}px`;
// }

// function changeLink() {
//   sidebar_links.forEach((sideLink) => sideLink.classList.remove("active"));
//   this.classList.add("active");

//   activeIndex = this.dataset.active;

//   moveActiveTab();
// }

// sidebar_links.forEach((link) => link.addEventListener("click", changeLink));

// function showTooltip() {
//   let tooltip = this.parentNode.lastElementChild;
//   let spans = tooltip.children;
//   let tooltipIndex = this.dataset.tooltip;

//   Array.from(spans).forEach((sp) => sp.classList.remove("show"));
//   spans[tooltipIndex].classList.add("show");

//   tooltip.style.top = `${(100 / (spans.length * 2)) * (tooltipIndex * 2 + 1)}%`;
// }

// tooltip_elements.forEach((elem) => {
//   elem.addEventListener("mouseover", showTooltip);



// });
      </script>
</body>



                    