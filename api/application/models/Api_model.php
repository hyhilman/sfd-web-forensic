<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_Model extends CI_Model {

  public $remote_host;
  public $ident_user;
  public $auth_user;
  public $time_stamp;
  public $time_zone;
  public $request_method;
  public $request_uri;
  public $request_protocol;
  public $status;
  public $bytes;
  public $referer;
  public $user_agent;
  public $site;
  public $id;

  public function __construct(){
    parent::__construct();
    $this->load->database();
  }

	public function get($filter = null) {

    $sql =  'SELECT remote_host, time_stamp, request_method, request_protocol, request_uri, status, bytes, referer, site FROM access_log_web_forensic
WHERE  '.filter.'( remote_host = '$this->remote_host.' OR ( FALSE OR 0 = 0 ) )';

    $query = $this->db->query($sql);

    return $query;
	}


}
