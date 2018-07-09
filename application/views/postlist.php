
<?php

if(!$this->session->userdata('logged_in')) {
	redirect('user/login','refresh');
} 

 ?>

<!DOCTYPE html>
<html lang="">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Title Page</title>

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>

		<h1 class="text-center">Hello World</h1><p align="right">
			<?php if($this->session->userdata('logged_in') && $this->session->userdata('level') != 'ekonomi') { ?>
			<a href="<?php echo base_url('index.php\category'); ?>" class="btn btn-primary">Category</a>
			
			<a href="<?php echo base_url('index.php\blog\create'); ?>" class="btn btn-primary">Create Post</a>
			<?php } ?>
		</p>
		<div class="container">

			<?php if( !empty($postlist) ) : ?>
				<div class="album py-5 bg-light">
					<div class="container">
						<div class="row">

							<?php
						// Kita looping data dari controller
							foreach ($postlist as $key) :
								?>

								<div class="col-md-4">
									<!-- Kita format tampilan blog dalam bentuk card -->
									<!-- https://getbootstrap.com/docs/4.0/components/card/ -->
									<div class="card mb-4 box-shadow border-0">

										<div class="card-body">

											<!-- Batasi cuplikan konten dengan substr sederhana -->
											<h5><?php echo character_limiter($key->judul, 20) ?></h5>
											<small class="text-success text-uppercase"><?php echo $key->cat_name ?></small>
											<p class="card-text"><?php echo word_limiter($key->konten, 20) ?></p>

											<div class="d-flex justify-content-between align-items-center">
												<div class="btn-group">
													<!-- Untuk link detail -->
													<a href="<?php echo base_url(). 'index.php/blog/read/' . $key->id_post ?>" class="btn btn-outline-secondary">Baca</a>
													<?php if($this->session->userdata('logged_in') && $this->session->userdata('level') != 'ekonomi') : ?>
														<a href="<?php echo base_url(). 'index.php/blog/update/' . $key->id_post ?>" class="btn btn-outline-secondary">Edit</a>
													<?php endif; ?>


												</div>

											</div>
										</div>

									</div>
								</div>
							<?php endforeach; ?>

						</div>
					</div>
				</div>
			<?php else : ?>
				<p>Belum ada data bosque.</p>
			<?php endif; ?>

			<?php
			if (isset($links)) { ?>

			<p align="center"><?php echo $links; ?></p>


			<?php } 
			?>
		</div>

		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
		<script src="Hello World"></script>
	</body>
	</html>