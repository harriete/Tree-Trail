<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <title>Tree Trail</title>

  <link rel="stylesheet" href="<?= base_url('static/node_modules/bootstrap/dist/css/bootstrap.min.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('static/node_modules/bootstrap/dist/css/bootstrap-theme.min.css'); ?>">
  {{$ extra_styles }}{{/ extra_styles }}


  <style>
    .btn {
	float: right;
	color: black;
	font: bold 14px Arial, Helvetica;
	cursor: pointer;
}
  
    #login-content {
      display: none;
      position: absolute;
	  top: 120%;
	  right: 15%;
	  background: #000;
	  opacity: 0.9;
	  padding: 15px;
	  box-shadow: 0 2px 2px -1px rgba(0,0,0,.9);
    }
	
	#inputs input {
  background: #f1f1f1;
  padding: 6px 5px;
  margin: 0 0 5px 0;
  width: 238px;
  border: 1px solid #ccc;
  border-radius: 3px;
  box-shadow: 0 1px 1px #ccc inset;
}

#inputs input:focus {
  background-color: #fff;
  border-color: #e8c291;
  outline: none;
  box-shadow: 0 0 0 1px #e8c291 inset;
}
  {{$ extra_inline_styles }}{{/ extra_inline_styles }}
  </style>

  {{$ extra_head_scripts }}{{/ extra_head_scripts }}

</head>
<body> 
  <nav class="navbar navbar-default navbar-fixed-top navbar-inverse">
    <div class="container-fluid">

      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/">TreeTrail</a>
      </div>

      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
<<<<<<< HEAD
          <li><a href="<?= base_url('/statistics'); ?>">Statistics</a></li>
          <li><a href="<?= base_url('/about'); ?>">About Project Tree Trail</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="<?= base_url('/dashboard'); ?>">Admininstrator Dashboard</a></li>
=======
          <?php if( == 'still login'):
			echo '<li><a href="';
			echo base_url('/statistics');
			echo '">Statistics</a></li>';
			endif;
		  ?>
          <li><a href="<?= base_url('/about'); ?>">About Project Tree Trail</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
		  <li id="login">
		    <a id="login-trigger" href="#">
			  <button class="btn">Login</button>
			</a>
			  <div id="login-content">
				<form action="login" method="post">
				  <fieldset id="inputs">
					<input id="username" type="text" name="username" placeholder="Username" required>   
					<input id="password" type="password" name="password" placeholder="Password" required>
				  </fieldset>
				  <br />
				  <fieldset id="actions">
					<input type="submit" class="btn" id="submit" value="Login">
					<span>New User?</span>
					<span><a href="#">Register.</a></span>
				  </fieldset>
				</form>
			  </div>                
		  </li>
          <!-- <li><a href="<?= base_url('/dashboard'); ?>">Admininstrator Dashboard</a></li>-->
>>>>>>> updated to recent copy of ammil and added UI for login
        </ul>
      </div>

    </div>
  </nav>

  {{$ extra_content }}{{/ extra_content }}

  <script src="<?= base_url('static/node_modules/jquery/dist/jquery.min.js'); ?>"></script>
  <script src="<?= base_url('static/node_modules/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
<<<<<<< HEAD
=======
  <script>
    $(document).ready(function(){
      $('#login-trigger').click(function(){
        $(this).next('#login-content').slideToggle();
        $(this).toggleClass('active');
      })
    });
  </script>
>>>>>>> updated to recent copy of ammil and added UI for login
  {{$ extra_libs }}{{/ extra_libs }}

  {{$ extra_plugins }}{{/ extra_plugins }}

  {{$ extra_scripts }}{{/ extra_scripts }}

</body>
</html>
