require.config({
  baseUrl: './static',
  paths: {
    ractive : 'node_modules/ractive/ractive',
    rvc: 'node_modules/rvc/rvc',
    css: 'node_modlues/require-css/css',
    leaflet: 'node_modules/leaflet/dist/leaflet',
  },
  waitSeconds: 60
});

require([
  'rvc!components/tree-app'
],function(TreeApp){

  new TreeApp({
    el: '.content'
  });

});
