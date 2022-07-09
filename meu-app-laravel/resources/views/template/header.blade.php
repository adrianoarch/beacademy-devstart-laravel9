<nav class="navbar navbar-dark navbar-expand-lg bg-dark">
    <div class="container-fluid justify-content-between">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <a class="navbar-brand" href="#">Sistema</a>
        <ul class="navbar-nav mb-2 mb-lg-0 me-auto">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('users.index')}}">Usuários</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('posts.index')}}">Posts</a>
          </li>
        </ul>
      </div>
      <div class="">
        <ul class="navbar-nav ml-auto">
          @if(Auth::user())
            <li class="nav-item">
              <a class="nav-link" href="{{ Auth::user()->name }}">{{ Auth::user()->name }}</a>
            </li>
            @if(Auth::user()->is_admin == 1)
              <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.index') }}">Admin</a>
              </li>
            @endif
            <li class="nav-item mt-1">
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="btn btn-sm btn-outline-danger">Logout</button>
            </li>
          @else
            <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">Login</a>
            </li>
            <li>
              <a class="nav-link" href="{{ route('register') }}">Cadastrar</a>
            </li>
          @endif
      </div>
    </div>
</nav>