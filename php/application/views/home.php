{{< layout }}

{{$ extra_styles }}
  <link rel="stylesheet" href="<?= base_url('static/node_modules/leaflet/dist/leaflet.css'); ?>">
{{/ extra_styles }}

{{$ extra_inline_styles }}
html, body, .content {
  position:relative;
  width : 100%;
  height: 100%;
}
body{
  padding-top: 50px;
}
{{/ extra_inline_styles }}

{{$ extra_content }}
  <div class="content"></div>
{{/ extra_content }}

{{$ extra_libs }}
  <script src="<?= base_url('static/node_modules/requirejs/require.js'); ?>"></script>
{{/ extra_libs }}

{{$ extra_scripts }}
  <script src="<?= base_url('static/scripts/home/main.js'); ?>"></script>
{{/ extra_scripts }}


{{/ layout}}