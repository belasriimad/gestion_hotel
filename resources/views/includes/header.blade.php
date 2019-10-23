<div class="top-bar">
  <div class="top-bar-left">
    <ul class="dropdown menu" data-dropdown-menu>
      <li class="menu-text">Gestion Hotel</li>
      <li>
        <a href="{{route('home')}}"><i class="fa fa-home" aria-hidden="true"></i> Accueil</a>
      </li>  
      <li><a href="{{route('reservations.index')}}"><i class="fa fa-book" aria-hidden="true"></i> Résérvations</a></li>
      <li><a href="{{route('contacts.create')}}"><i class="fa fa-envelope" aria-hidden="true"></i> Contact</a></li>
      @if(Auth::guard('admins')->check() && $_SESSION['admin'] = true)
         <li><a href="{{route('clients.index')}}"><i class="fa fa-handshake-o" aria-hidden="true"></i> Clients</a></li>
         <li><a href="{{route('contacts.index')}}"><i class="fa fa-envelope" aria-hidden="true"></i> Messages</a></li>
      @endif
    </ul>
  </div>
  <div class="top-bar-right">
    <ul class="menu">
         @if(!isset(Auth::user()->id))
            <li><a href="{{route('clients.create')}}"><i class="fa fa-user-plus" aria-hidden="true"></i> Inscription</a></li>
            <li><a href="{{route('clients.login')}}"><i class="fa fa-sign-in" aria-hidden="true"></i> Connexion</a></li>
         @else
            <li><a href="{{route('clients.logout')}}"><i class="fa fa-sign-in" aria-hidden="true"></i> Déconnexion</a></li>
         @endif
    </ul>
  </div>
</div>