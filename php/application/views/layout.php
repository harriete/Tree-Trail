<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <title>Tree Trail</title>

  <link rel="stylesheet" href="<?= base_url('static/node_modules/bootstrap/dist/css/bootstrap.min.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('static/node_modules/bootstrap/dist/css/bootstrap-theme.min.css'); ?>">
  {{$ extra_styles }}{{/ extra_styles }}


  <style>
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
          <li><a href="<?= base_url('/statistics'); ?>">Statistics</a></li>
          <li><a href="<?= base_url('/about'); ?>">About Project Tree Trail</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="<?= base_url('/dashboard'); ?>">Admininstrator Dashboard</a></li>
        </ul>
      </div>

    </div>
  </nav>

  {{$ extra_content }}{{/ extra_content }}

  <script src="<?= base_url('static/node_modules/jquery/dist/jquery.min.js'); ?>"></script>
  <script src="<?= base_url('static/node_modules/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
  {{$ extra_libs }}{{/ extra_libs }}

  {{$ extra_plugins }}{{/ extra_plugins }}

  {{$ extra_scripts }}{{/ extra_scripts }}

</body>
</html>
