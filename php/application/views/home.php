<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <title>Tree Trail</title>

  <link rel="stylesheet" href="<?= base_url('static/node_modules/bootstrap/dist/css/bootstrap.min.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('static/node_modules/bootstrap/dist/css/bootstrap-theme.min.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('static/node_modules/leaflet/dist/leaflet.css'); ?>">

  <style>
    html, body, .content {
      position:relative;
      width : 100%;
      height: 100%;
    }
    body{
      padding-top: 50px;
    }
  </style>

</head>
<body>

  <div class="content"></div>

  <script src="<?= base_url('static/node_modules/jquery/dist/jquery.min.js'); ?>"></script>
  <script src="<?= base_url('static/node_modules/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
  <script src="<?= base_url('static/node_modules/requirejs/require.js'); ?>"></script>
  <script src="<?= base_url('static/scripts/home/main.js'); ?>"></script>

</body>
</html>
