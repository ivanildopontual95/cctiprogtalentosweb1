<nav class="{{config('app.corSite')}}">
  <div class="nav-wrapper container">
    <a href="{{ url('/') }}"><img class="responsive-img" src="/images/cctirsz.png" title="Início"</i></a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        @if (Auth::guest())
          <li><a href="{{ url('/register') }}">Registre-se</a></li>
          <li><a href="{{ url('/login') }}">Entrar</a></li>
        @else
          <li><a href="/dashboard">{{ Auth::user()->name }}<i class="material-icons left">person</i></a></li></li>
          <li>
              <a href="{{ url('/logout') }}"
                  onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                  <i class="material-icons left">exit_to_app</i>Sair
              </a>
              <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
              </form>
          </li>
        @endif
      </ul>
  </div>
</nav>