<?php defined('BASEPATH') or exit('No direct script access allowed');


class TreeTrailController extends RestController{

  public function render($view = NULL, $data = [], $partials = []){

    $renderer = new Mustache_Engine([
      'pragmas' => [Mustache_Engine::PRAGMA_BLOCKS],
      'partials' => array_map(function($partial){
        return $this->load->view($partial, NULL, true);
      }, $partials)
    ]);
    
    echo $renderer->render($this->load->view($view, NULL, true), $data);
  }

}