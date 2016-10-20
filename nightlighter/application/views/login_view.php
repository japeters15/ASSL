<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>User Login </title>
	<link rel="stylesheet" href="<?php echo base_url("bootstrap/css/bootstrap.css"); ?>">
    <meta name="google-signin-scope" content="profile email">
    <link href="<?php echo base_url("bootstrap/css/styles.css"); ?>" rel="stylesheet" type="text/css" />
    <meta name="google-signin-client_id" content="668185675894-kaa5lc3a0tuaf0lnm3106v118oulsmeu.apps.googleusercontent.com">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4 well">
            <img src="<?php echo site_url('../bootstrap/images/nightlighter.png'); ?>" />
		<?php $attributes = array("name" => "loginform");
			echo form_open("login/index", $attributes);?>
			<legend>Login</legend>
			<div class="form-group">
				<label for="name">Email</label>
				<input class="form-control" name="email" placeholder="Enter Email" type="text" value="<?php echo set_value('email'); ?>" />
				<span class="text-danger"><?php echo form_error('email'); ?></span>
			</div>
			<div class="form-group">
				<label for="name">Password</label>
				<input class="form-control" name="password" placeholder="Password" type="password" value="<?php echo set_value('password'); ?>" />
				<span class="text-danger"><?php echo form_error('password'); ?></span>
			</div>
			<div class="form-group">
				<button name="submit" type="submit" class="btn btn-success">Login</button>
				<button name="cancel" type="reset" class="btn btn-danger">Cancel</button>
                 <div class="g-signin2" data-onsuccess="onSignIn" data-theme="dark"></div>
			</div>
            <script>
      function onSignIn(googleUser) {
        // Useful data for your client-side scripts:
        var profile = googleUser.getBasicProfile();
        console.log("ID: " + profile.getId()); // Don't send this directly to your server!
        console.log('Full Name: ' + profile.getName());
        console.log('Given Name: ' + profile.getGivenName());
        console.log('Family Name: ' + profile.getFamilyName());
        console.log("Image URL: " + profile.getImageUrl());
        console.log("Email: " + profile.getEmail());

        // The ID token you need to pass to your backend:
        var id_token = googleUser.getAuthResponse().id_token;
        console.log("ID Token: " + id_token);
      }; 
        </script>
        <a href="#" onclick="signOut();">Sign out</a>
<script>
  function signOut() {
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
      console.log('User signed out.');
    });
  }
</script>
		<?php echo form_close(); ?>
		<?php echo $this->session->flashdata('msg'); ?>
		</div>
	</div>
        
	<div class="row">
		<div class="col-md-4 col-md-offset-4 text-center">	
		New User? <a href="<?php echo base_url(); ?>index.php/signup">Sign Up Here</a>
		</div>
	</div>
</div>
<script type="text/javascript" src="<?php echo base_url("bootstrap/js/jquery-1.10.2.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("bootstrap/js/bootstrap.js"); ?>"></script>
</body>
</html>