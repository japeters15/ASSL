<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Add Category</title>
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
			<a class="navbar-brand" href="<?php echo base_url(); ?>index.php/home">Nightlighter Add Category</a>
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
<ul class="treeview-menu">
<li><a href="<?php echo site_url('blog/addCategory');?>"><i class="fa fa-angle-double-right"></i> Add Category</a></li>
<li><a href="<?php echo site_url('blog/allCategory');?>"><i class="fa fa-angle-double-right"></i> View All Categories</a></li>
<li><a href="<?php echo site_url('blog/addArticle');?>"><i class="fa fa-angle-double-right"></i> Add Article</a></li>
<li><a href="<?php echo site_url('blog/allArticle');?>"><i class="fa fa-angle-double-right"></i> All Article</a></li>
</ul>
<form role="form" method = "POST" action = "<?php echo site_url('blog/addCategory');?>">
<div class="box-body">
<div class="form-group">
<label for="exampleInputEmail1">Title</label><br>
<input type="text" name = "title" class="form-control" id="exampleInputEmail1" placeholder="">
</div>
<div>
<label>Description</label><br>
<textarea class="form-control" rows="10" name="desc" placeholder="Enter ..."></textarea>
</div>
</div>
<!-- /.box-body -->
<div class="box-footer">
<button type="submit" name = "addCategory" class="btn btn-primary">Submit</button>
</div>
</form>
<?php if(!empty($msg)){ echo $msg;};?>
</body>
</html>