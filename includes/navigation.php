<aside>
	<nav>
		<ul>
			
			<li class="nav-item">
				<a class="nav-link <?php if ($CURRENT_PAGE == "Artikal") { ?>active<?php } ?>"
					href="artikal.php">Artikal</a>
			</li>
			<li class="nav-item">
				<a class="nav-link <?php if ($CURRENT_PAGE == "Lager") { ?>active<?php } ?>" href="lager.php">Lager</a>
			</li>
			<li class="nav-item">
				<a class="nav-link <?php if ($CURRENT_PAGE == "Racun") { ?>active<?php } ?>" href="racun_lista.php">Racun</a>
			</li>
			<li class="nav-item">
				<a class="nav-link <?php if ($CURRENT_PAGE == "Radnik") { ?>active<?php } ?>"
					href="radnik.php">Radnik</a>
			</li>
			<li class="nav-item">
				<a class="nav-link <?php if ($CURRENT_PAGE == "Logout") { ?>active<?php } ?>"
					href="logout.php">Logout</a>
			</li>
		</ul>
		</div>
</aside>
<style>
	aside {
		width: 200px;
		background-color: lightgray;
		position: fixed;
		height: 100%;
	}

	nav ul {
		list-style: none;
		margin: 0;
		padding: 0;
		text-align: center;
	}

	nav li a {
		display: block;
		padding: 10px;
		text-decoration: none;
		color: black;
	}

	nav li a:hover {
		background-color: #27ae60;
		color: #eceff1;
	}
	nav li a:active {
		background-color: #27ae60;
		color: #eceff1;
	}

	@media (max-width: 600px) {
		aside {
			position: static;
			width: 100%;
			height: auto;
		}
	}
</style>