<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact_Model extends TreeTrailModel {

  public $tableName = 'contacts';
  public $tableId   = 'id';
  public $tableCp   = 'contact_person';
  public $tableCn   = 'contact_number';
  public $tablemail = 'email';
  public $tableOr   = 'organization';
}