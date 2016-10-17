<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit Article</title>
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
			<a class="navbar-brand" href="<?php echo base_url(); ?>index.php/home">Nightlighter Edit Articles</a>
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
<form method = "POST" action = "<?php echo site_url('blog/updateArticle');?>" enctype='multipart/form-data'>
<div class="form-group">
<label for="exampleInputEmail1">Title</label>
<input type="text" name = "title" class="form-control" id="exampleInputEmail1" placeholder="" value = "<?php echo $getArticleById['0']->Title;?>">
</div>
<div class="form-group">
<label> Select Category</label>
<select class="form-control" name="category">
<option value = "<?php echo $getArticleById[0]->c_id;?>"><?php echo $getArticleById['0']->Type;?></option>
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
<?php echo $getArticleById['0']->Description;?>
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
<button type="submit" name="addArticle" class="btn btn-primary">Submit</button>
</div>
</form>
<script type="text/javascript" src="<?php echo base_url("bootstrap/js/jquery-1.10.2.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("bootstrap/js/bootstrap.js"); ?>"></script>
</body>
</html>