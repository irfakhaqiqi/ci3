
<?php

if(!$this->session->userdata('logged_in')) {
	redirect('user/login','refresh');
} 

if($this->session->userdata('level') == 'ekonomi') {
	redirect('user/error_akses','refresh');
} 
?>
<html>
<head>
	<title>My Post List</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</head>
<body>
   <nav class="navbar navbar-default">
      <div class="container-fluid">
	<div class="navbar-header">
		<a class="navbar-brand" href="">WHO!!!</a>
	</div>
	<ul class="nav navbar-nav">
		<li><a href="<?php echo base_url(); ?>">Home</a></li>
		<li><a href="<?php echo base_url('index.php\Welcome\about'); ?>">About</a></li>
		<li><a href="<?php echo base_url('index.php\blog'); ?>">Artikel</a></li> 
   </div>


</nav>
<a href="<?php echo base_url('index.php\category\create'); ?>" class="btn btn-primary">Create Category</a>

<div class="container">
	<table class="table table-hover">
				<th>Nama Kategori</th>
				<th>Deskripsi</th>
				<th>action</th>
		<tbody>
			<?php foreach ($categorylist as $row) { ?>
			<?php $row['cat_name']; ?>
			<tr>
				<td><?php echo $row['cat_name']; ?></td>
				<td><?php echo $row['cat_description']; ?></td>
				<td><a class="btn btn-warning" href="<?php echo base_url('index.php/category/update/'.$row['id']); ?>">Edit</a>  <a class="btn btn-warning" href="<?php echo base_url('index.php/category/delete/'.$row['id']); ?>">Delete</a></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
	
</div>
</body>
</html>