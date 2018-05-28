<!DOCTYPE html>
<html lang="">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Title Page</title>

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.css"/>



	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<div class="container">
			<h1 class="text-center">DataTable</h1>
			<table id="dt-basic" class="table table-striped table-bordered">
				<thead>
					<tr>
						<th>ID</th>
						<th>Judul</th>
						<th>Kategori</th>
						<?php if($this->session->userdata('logged_in')) : ?>
							<th>Action</th>
						<?php endif; ?>
						
					</tr>
				</thead>
				<tbody>
					<?php foreach ($data as $d) : ?>
						<tr>
							<td><?php echo $d->id_post ?></td>
							<td><?php echo $d->judul ?></td>
							<td><?php echo $d->cat_name ?></td>
							<?php if($this->session->userdata('logged_in')) : ?>
								<td><a href="<?php echo base_url('/blog/edit/') . $d->id_post ?>">Edit</a>
									<a href="<?php echo base_url('/blog/delete/') . $d->id_post ?>">Delete</a></td>
								<?php endif; ?>

							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
			<!-- jQuery -->
			<script src="//code.jquery.com/jquery.js"></script>

			<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.js"></script>
			<script>
				$(document).ready( function () {
					$('#dt-basic').DataTable();
				} );
			</script>

			<!-- Bootstrap JavaScript -->
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
			<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
			<script src="Hello World"></script>
		</body>
		</html>