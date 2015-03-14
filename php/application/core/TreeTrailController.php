<?php defined('BASEPATH') or exit('No direct script access allowed');


class TreeTrailController extends RestController{

  public function render($view = NULL, $data = [], $partials = []){
    $this->load->model('session_model', 'tree_trail_session');

    // Add the partials and pragmas
    $renderer = new Mustache_Engine([
      'pragmas' => [Mustache_Engine::PRAGMA_BLOCKS],
      'partials' => array_map(function($partial){
        return $this->load->view($partial, NULL, true);
      }, $partials)
    ]);

    // Inject common data
    $isLoggedIn = $this->tree_trail_session->isLogin();
    $isSuperAdmin = $this->tree_trail_session->isSuperAdmin();

    $data['isLoggedIn'] = $isLoggedIn;
    $data['canManageBadges'] = ($isLoggedIn && !$isSuperAdmin);
    
    echo $renderer->render($this->load->view($view, NULL, true), $data);
  }

}