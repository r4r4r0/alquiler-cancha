<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente_Model extends Funciones_model{

  public function __construct()
  {
    parent::__construct();
    $this->tabla = "cliente";
  }

  public function prueba()
  {
    echo "Esta es una prueba desde mi modelo";
  }

}
