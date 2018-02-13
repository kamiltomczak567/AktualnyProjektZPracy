<div id="navbar-left">
  <div class="menu-background">
    <ul>
      <li><a href="{{ route('admin.start') }}" @if    (Route::currentRouteName()=='admin.start')  class="active" @endif>Start</a></li>
      <li><a href="{{ route('admin.ofirmie') }}" @if    (Route::currentRouteName()=='admin.ofirmie')  class="active" @endif>O firmie</a></li>
      <li><a href="{{ route('admin.oferta') }}" @if    (Route::currentRouteName()=='admin.oferta')  class="active" @endif>Oferta</a></li>
      <li><a href="{{ route('admin.projekty') }}" @if    (Route::currentRouteName()=='admin.projekty')  class="active" @endif>Projekty</a></li>
      <li><a href="{{ route('admin.kontakt') }}" @if    (Route::currentRouteName()=='admin.kontakt')  class="active" @endif>Kontakt</a></li>
      <li><a href="{{ route('admin.dojazd') }}" @if    (Route::currentRouteName()=='admin.dojazd')  class="active" @endif>Dojazd</a></li>
      <li><a href="{{ route('admin.ustawienia') }}" @if (Route::currentRouteName()=='admin.ustawienia')   class="active" @endif>Ustawienia</a></li>


      <hr />
      <li><a href="{{ route('home') }}">Wróć na stronę</a></li>
    </ul>
  </div>
  <div class="logout">
    <a href="{{ route('logout') }}">
      <p>WYLOGUJ</p>
    </a>
  </div>
  <div class="logo">
    <a href="https://e-u4u.pl/"><img src="/backend/img/logo.png" alt="Logo"></a>
  </div>
</div>
