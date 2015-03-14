<?php defined('BASEPATH') or exit('No direct script access allowed');

class Badges_model extends TreeTrailModel {

  public $tableName = 'locations';
  public $tableId = 'id';

  public function readWithPhotos(){
    // Joins are great, but SQL just returns flat data. We need embedded data.
    // Deflattening joined data is just about the same work as getting all data
    // and deflattening it. However, join 2 tables with 3 rows each
    // results in 3^2 rows, while just getting them individually is 3x2. The
    // second option is lighter, at the expense of a second query.
    
    $badges = $this->db->get($this->tableName)->result_array();
    $photos = $this->db->get('photos')->result_array();

    if($badges && $photos){
      foreach ($badges as $index => &$badge) {
        $badge['photos'] = array_values(array_filter($photos, function($photo) use ($badge){
          return ($photo['location_id'] === $badge['id']);
        }));
      }
    }

    return $badges;
  }

  public function readWithPhotosApproved(){
    return array_values(array_filter($this->readWithPhotos(), function($badge){
      return !is_null($badge['approved']);
    }));
  }

}