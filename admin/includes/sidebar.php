<nav class="navbar navbar-inverse">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>               
			</button>
		</div>
		<div class="collapse navbar-collapse" id="myNavbar">
			<ul class="nav navbar-nav">											
				<li><a href="o_nama.php">O nama</a></li>
				<li><a href="#maloprodaja" data-toggle="collapse">Maloprodaja</a>
					<ul class="nav collapse" id="maloprodaja">
						<li><a href="edit_trenutno_u_ponudi.php">M. Trenutno u ponudi</a></li>
						<li><a href="edit_novo_u_ponudi.php">M. Novo u ponudi</a></li>
						<li><a href="m_katalog_namjestaja.php">M. Katalog namjestaja</a></li>
						<li><a href="m_katalog_tekstila.php">M. Katalog tekstila</a></li>
					</ul>
				</li>
				<li><a href="#veleprodaja" data-toggle="collapse">Veleprodaja </a>
					<ul class="nav collapse" id="veleprodaja">
						<li><a href="edit_trenutno_u_prodaji.php">V. Trenutno u prodaji</a></li>
						<li><a href="m_katalog_tekstila.php">V. Katalog tekstila</a></li>
						<li><a href="edit_ugostiteljstvo.php">V. Ugostiteljstvo</a></li>
						<li><a href="kontakt.php">V. Kontakti</a></li>
					</ul>
				</li>
				<li><a href="aktuelno.php">Aktuelno</a></li>
				<li><a href="sajmovi.php">Sajmovi</a></li>
				<li><a href="kontakt.php">Kontakt</a></li>
				<li><a href="faq.php">FAQ</a></li>
				<li><a href="vauceri.php">Vauceri</a></li>
				<li><a href="penzioneri.php">Penzioneri</a></li>
				<li><a href="sindikalna_prodaja.php">Sindikalna prodaja</a></li>
				<li><a href="wedding_lista.php">Wedding lista</a></li>
				<li><a href="kartica.php">Kartica</a></li>
				<li><a href="profile.php">Profil</a></li>
				<li><a href="pitanja.php">Pitanja</a></li>
				<li><a href="profile.php">Zdravo, <b><?php echo $ime;?></b></a></li>
	            <li><a href="../accounts/logout.php">Odjavi se</a></li>
			</ul>
		</div>
	</div>
</nav>