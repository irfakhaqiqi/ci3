
<?php

if(!$this->session->userdata('logged_in')) {
	redirect('user/login','refresh');
} 

if($this->session->userdata('level') == 'ekonomi') {
	redirect('user/error_akses','refresh');
} 
?>

<!DOCTYPE html>
<html lang="">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Input Data</title>

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
 		<div class="container-fluid">
 			<div class="col-md-4"></div>
 			<div class="col-md-4">
 				<h1>Tambah postingan</h1>
 				<?php 
 				echo form_open('blog/create'); 
 				echo validation_errors();

 				?>

 				<div class="form-group">
 					<label>Judul<font color="red">*</font></label>
 					<input type="text" class="form-control" id="judul" name="judul" placeholder="Input field">
 				</div>
 				<div class="form-group">
 					<label>Isi Konten</label>
 					<input type="text" class="form-control" id="konten" name="konten" size="255" placeholder="Input field">
 				</div>
 				<div class="form-group">
 					<label>Kategori</label>
 					<select class="form-control" name="category">
 						<?php foreach ($categorylist as $row) { ?>
 						<option value="<?php echo $row['id'] ?>"><?php echo $row['cat_name']; ?></option>
 						<?php } ?>
 					</select>
 				</div>

 				<font color="red"><i>* Wajib diisi</i></font>
 				<br>
 				<br>

 				<button type="submit" class="btn btn-primary">Submit</button>
 				<?php echo form_close(); ?>
 			</div>
 			<div class="col-md-4"></div>
 		</div>

 		<!-- jQuery -->
 		<script src="//code.jquery.com/jquery.js"></script>
 		<!-- Bootstrap JavaScript -->
 		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
 		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
 		<script src="Hello World"></script>
 	</body>
 	</html>