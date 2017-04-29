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
WHERE  (
  request_uri LIKE "%..%"
  OR request_uri LIKE "%|%"
  OR request_uri LIKE "%!%"
  OR request_uri LIKE "%<%"
  OR request_uri LIKE "%>%"
  OR request_uri LIKE "%}%"
  OR request_uri LIKE "%{%"
  OR request_uri LIKE "%<?%"
  OR request_uri LIKE "%\'%"
  OR request_uri LIKE "%\`%"
  OR request_uri LIKE "%\%00%"
  OR request_uri LIKE "%\%20%"
  OR request_uri LIKE "%\%21%"
  OR request_uri LIKE "%\%27%"
  OR request_uri LIKE "%\%2E%"
  OR request_uri LIKE "%\%3C%"
  OR request_uri LIKE "%\%3D%"
  OR request_uri LIKE "%\%3E%"
  OR request_uri LIKE "%\%3F%"
  OR request_uri LIKE "%\%7B%"
  OR request_uri LIKE "%\%7C%"
  OR request_uri LIKE "%\%7D%"
  OR request_uri LIKE "%\%60%"
  OR request_uri LIKE "%/logs/%"
  OR request_uri LIKE "%.log"
  OR request_uri LIKE "%login%"
  OR request_uri LIKE "%print%"
  OR request_uri LIKE "%md5(%)%"
)
AND  ( remote_host = 0 OR ( FALSE OR 0 = 0 ) )';

    $query = $this->db->query($sql);

    return $query;
	}


}
