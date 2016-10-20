<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>View Articles</title>
	<link rel="stylesheet" href="<?php echo base_url("bootstrap/css/bootstrap.css"); ?>">
</head>
<body>
<nav class="navbar navbar-default" role="navigation">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="<?php echo base_url(); ?>index.php/home"><img src="<?php echo site_url('../bootstrap/images/nightlighter.png'); ?>" /></a>
		</div>
		<div class="collapse navbar-collapse" id="navbar1">
			<ul class="nav navbar-nav navbar-right">
				<?php if ($this->session->userdata('login')){ ?>
				<li><p class="navbar-text">Hello <?php echo $this->session->userdata('uname'); ?></p></li>
				<li><a href="<?php echo base_url(); ?>index.php/home/logout">Log Out</a></li>
				<?php } else { ?>
				<li><a href="<?php echo base_url(); ?>index.php/login">Login</a></li>
				<li><a href="<?php echo base_url(); ?>index.php/signup">Signup</a></li>
				<?php } ?>
			</ul>
		</div>
	</div>
</nav>
   
<div class="container-fluid">
      <ul class="nav nav-tabs">
        <li><a href="<?php echo site_url('blog/addCategory');?>"><i class="fa fa-angle-double-right"></i> Add Category</a></li>
<li><a href="<?php echo site_url('blog/allCategory');?>"><i class="fa fa-angle-double-right"></i> View All Categories</a></li>
<li><a href="<?php echo site_url('blog/addArticle');?>"><i class="fa fa-angle-double-right"></i> Add Article</a></li>
<li><a href="<?php echo site_url('blog/allArticle');?>"><i class="fa fa-angle-double-right"></i> All Article</a></li>
      </ul>
</div>

    <h1>
Articles Created
</h1>
<table id="example1" class="table table-bordered table-striped">
<thead>
<tr>
<th>Title</th>
<th>Description</th>
<th>Published On</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php foreach($Article as $row) { ?>
<tr>
<td><a href = "<?php echo site_url('blog/editArticle');?>/<?php echo $row->Id;?>"><?php echo $row->Title;?></a></td>
<td><?php echo $row->Description;?></td>
<td><?php echo $row->DateTime;?></td>
<td><a href="<?php echo site_url('blog/editArticle');?>/<?php echo $row->Id;?>">Edit</a>
<a href="<?php echo site_url('blog/deleteArticle');?>/<?php echo $row->Id;?>">Delete</a></td>
</tr>
<?php } ?>
</tbody>
</table>
</body>
</html>