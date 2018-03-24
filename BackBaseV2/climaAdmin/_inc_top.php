<div id="top"> 
	<div class="container-fluid">
		<div class="pull-left">
			<a href="#" id="brand">
				<span></span>&nbsp;<?=str_replace('_',' ',SITE_NAME);?>
			</a>
			<div class="collapse-me"></div>
		</div>
		<div class="pull-right">
			<div class="btn-group">
				<a href="#" class="button dropdown-toggle" data-toggle="dropdown"><i class="icon-white icon-user"></i><?=ucwords($_SESSION['administradorNombre']);?><span class="caret"></span></a>
				<div class="dropdown-menu pull-right">
					<div class="right-details">
						<h6>Logueado como:</h6>
						<span class="name"><?=ucwords($_SESSION['administradorNombre']);?></span>
						<span class="email"><?=$_SESSION['administradorEmail'];?></span>
						<ul>
							<li>
								<a href="#">Configuración</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<a href="login.php?logout" class="button">
				<i class="icon-signout"></i> Salir
			</a>
		</div>
	</div>
</div>

