
	<div class="container">
		
	<ul class="nav nav-pills">
			
			<li>
				<a class="nav-link <?php if ($CURRENT_PAGE == "Artikal") { ?>hover<?php } ?>"
					href="artikal.php">Artikal</a>
			</li>
			<li class="nav-item">
				<a class="nav-link <?php if ($CURRENT_PAGE == "Lager") { ?>hover<?php } ?>" href="lager.php">Lager</a>
			</li>
			<li class="nav-item">
				<a class="nav-link <?php if ($CURRENT_PAGE == "Racun") { ?>hover<?php } ?>" href="racun_lista.php">Racun</a>
			</li>
			<li class="nav-item">
				<a class="nav-link <?php if ($CURRENT_PAGE == "Radnik") { ?>hover<?php } ?>"
					href="radnik.php">Radnik</a>
			</li>
			<li class="nav-item">
				<a class="nav-link <?php if ($CURRENT_PAGE == "Logout") { ?>hover<?php } ?>"
					href="logout.php">Logout</a>
			</li>
		</ul>
		</div>

<style>
.nav{
	display: flex;
  justify-content: start ;
  align-items: center;
  padding: 20px;
  /* background-color: #3498db; */
  color: whit
}
	
	

	nav ul {
		list-style: none;
		margin: 0;
		padding: 0;
		text-align: center;
	}

	.nav-link {
		display: block;
		padding: 10px;
		text-decoration: none;
		color: black;
	}

	.nav-link:hover {
		background-color: #27ae60;
		color: white;
	}
	
	


</style>