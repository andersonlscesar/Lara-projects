<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
      <a class="navbar-brand text-uppercase" href="{{ route('welcome') }}">            
          <strong>Contact</strong> App
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-toggler" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
          
      <!-- /.navbar-header -->
      <div class="collapse navbar-collapse" id="navbar-toggler">
        @auth 
          <ul class="navbar-nav">
            <li class="nav-item"><a href="#" class="nav-link">Companies</a></li>
            <li class="nav-item active"><a href="{{ route('contacts.index') }}" class="nav-link">Contacts</a></li>
          </ul>
        @endauth
        <ul class="navbar-nav ml-auto">
          @auth 
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ Auth::user()->name }}
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="{{ route('contacts.profile-information') }}">Profile</a>
                <form action="{{ route('logout') }}" method="POST">
                  @csrf 
                  @method("POST")
                  <button class="dropdown-item btn" type="submit">Logout</button>
                </form>
              </div>
            </li>
            
            @else
            
            <li class="nav-item mr-2"><a href="{{ route('login') }}" class="btn btn-outline-secondary">Login</a></li>
            <li class="nav-item"><a href="{{ route('register') }}" class="btn btn-outline-primary">Register</a></li>
          @endauth
        </ul>
      </div>
    </div>
  </nav>


