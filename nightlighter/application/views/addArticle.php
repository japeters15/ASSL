<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Add Article</title>
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

    
  
<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
<!-- Content Header (Page header) -->
<div class="container">

<section class="content-header">
<h1>
Add New Article
</h1>
</section>
<!-- Main content -->
<section class="content">
<div class='row'>
<div class='col-md-12'>
<div class='box box-info'>
<div class="box-body">
<form method = "POST" action = "<?php echo site_url('blog/addArticle');?>" enctype='multipart/form-data'>
<div class="form-group">
<label for="exampleInputEmail1">Title</label>
<input type="text" name = "title" class="form-control" id="exampleInputEmail1" placeholder="">
</div>
<div class="form-group">
<label> Select Category</label>
<select class="form-control" name="category">
<option>Select</option>
<?php  foreach($category as $row){?>
<option value = "<?php echo $row->Id;?>"><?php echo $row->Type;?></option>
<?php } ?>
</select>
</div>
<div class='box-header'>
<h3 class='box-title'>Description</h3>
<!-- tools box -->
<div class="pull-right box-tools">
<button class="btn btn-info btn-sm" data-widget='collapse' data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
<button class="btn btn-info btn-sm" data-widget='remove' data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
</div>
<!-- /. tools -->
</div>
<!-- /.box-header -->
<div class='box-body pad'>
<textarea id="editor1" name="editor1" rows="10" cols="80">
</textarea>
</div>
<div class="form-group">
<label for="exampleInputFile">Add Feature Image</label>
<input type="file" name="featureImage" id="exampleInputFile">
</div>
<div class="form-group">
<label for="exampleInputFile">Upload more Images</label>
<input type="file" name="userfile[]" id="exampleInputFile" multiple>
</div>
<div class="box-footer">
<button type="submit" name="addArticle" class="btn btn-warning">Submit</button>
    </div>
</div>
</form>
</div>
<!-- /.box -->
</div>
<!-- /.col-->
</div>
<!-- ./row -->
</section>
<!-- /.content -->
</aside>
<!-- /.right-side -->
</div><!-- ./wrapper -->


    
<script type="text/javascript" src="<?php echo base_url("bootstrap/js/jquery-1.10.2.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("bootstrap/js/bootstrap.js"); ?>"></script>
</body>
</html>