<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Campo_model extends Funciones_model{

  public function __construct()
  {
    parent::__construct();
    $this->tabla = "campo";
  }

}
