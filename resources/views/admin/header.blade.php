<header id="header-bar">
	<div class="user">
		<img src="/backend/img/user.png">
		<p>{{ Auth::user()->email }}</p>
	</div>
	<div class="welcome">
		<p>Serdecznie witamy na U4U admin! W tym miejscu możesz swobodnie zarządzać swoją stroną!</p>
		<p>Dziękujemy, że nas wybrałeś i życzymy owocnej pracy!</p>
	</div>
	<button id="burger">
		<div></div>
		<div></div>
		<div></div>
	</button>
	<div class="logout">
		<a href="{{ route('logout') }}">
			<p>WYLOGUJ</p>
		</a>
	</div>
</header>


{{-- <header id="header-bar">
	<div class="container-fluid">
		<div class="user">
			<img src="../../img/admin/user.png">
			admin@e-u4u.pl
		</div>
		<div class="welcome">
			<p>Serdecznie witamy na U4Uadmin! W tym miejscu możesz swobodnie zarządzać swoją stroną!<br />Dziękujemy, że nas wybrałeś i życzymy owocnej pracy! </p>
		</div>
		<a href="http://kancelaria-gospodarcza.com.pl/admin/logout" class="logout">WYLOGUJ</a>
	</div>
</header> --}}
