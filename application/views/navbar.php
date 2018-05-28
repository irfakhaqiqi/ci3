<nav class="navbar navbar-default">
	<div class="container-fluid">
		<div class="navbar-header">
			<a class="navbar-brand" href="">WEB Framework</a>
		</div>
		<ul class="nav navbar-nav">
			<li><a href="<?php echo base_url(); ?>">Home</a></li>
			<li><a href="<?php echo base_url('index.php\Welcome\about'); ?>">About</a></li>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Artikel <span class="caret"></span></a>
				<ul class="dropdown-menu">
					<li><a href="<?php echo base_url('index.php\blog'); ?>">Index</a></li>
					<li><a href="<?php echo base_url('index.php\blog\datatable'); ?>">DataTable</a></li>
				</ul>
			</li>
		</ul>

			<ul class="nav navbar-nav navbar-right">
				<?php if(!$this->session->userdata('logged_in')) { ?>
					<li><a href="<?php echo base_url('index.php\user\register'); ?>">Register</a></li>
					<li><a href="<?php echo base_url('index.php\user\login'); ?>">Login</a></li>
				<?php }else { ?>
					<li><a href="<?php echo base_url('index.php\user\logout'); ?>">Logout</a></li>
				<?php } ?>
				
			</ul>
		</div>


	</nav>