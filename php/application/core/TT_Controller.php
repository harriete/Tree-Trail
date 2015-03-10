<?php defined('BASEPATH') or exit('No direct script access allowed');


class TT_Controller extends REST_Controller{

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