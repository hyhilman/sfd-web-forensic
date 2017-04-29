<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller
{

  public function __construct() {
    parent::__construct();
    $this->load->model('api_model');
  }

  public function get($ipaddress = null) {
    if(empty($ipaddress)) {

      $ipaddress = $this->input->get('ipaddress');

      if(empty($ipaddress)) {

        $this->api_model->remote_host = "0";

      }

    }

    if(!empty($ipaddress)) {
      $this->api_model->remote_host = $ipaddress;
    }

    if($this->input->get('filter')) {
      $fields = array(
        '\%20', '..', '\%00', '|', '\%27', '!', '\%21', '<',
        '\%3E', '>', '\%3C', '<?', '\'', '\%7C', '\%3F', '\`',
        '\%60', '\%2E', '/log/', '.log', 'login'
      );

      $filter = $this->generate_request_uri_filter($fields);
      $data = $this->api_model->get($filter)->result();
    } else {
      $data = $this->api_model->get()->result();
    }

    $json = array('msg' => 'success retrieving data from db', 'status' => '200', 'data' => $data);

    // $this->output->enable_profiler(true);

    $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($json));

  }

  private function generate_request_uri_filter($fields) {

    if(!empty($fields)) {

      $string = " ( ";

      foreach ($fields as $key => $value) {

        $string .= 'request_uri LIKE "%'.$value.'%" ';

        if($key != sizeof($fields) - 1) {

          $string .= "\nOR ";

        } else {

          $string .= ") AND ";

        };
      }
    } else  {

      $string = "";

    }

    return $string;

  }

}
