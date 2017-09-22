<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller{

  private $plantilla;

  public function __construct()
  {
    parent::__construct();

    $this->plantilla = "layouts/base";
  }

  public function index()
  {
    $data['titulo'] = "Administración de usuarios";
    $data['pagina'] = "usuario/index";
    $this->load->view($this->plantilla, $data);
  }

  public function consultar()
  {
    $this->load->model('usuario_model');
    $this->load->model('cliente_model');

    $data['usuarios'] = $this->usuario_model->obtenerDatos();
    $data['clientes'] = $this->cliente_model->obtenerDatos();

    $data['titulo'] = "Usuarios registrados";
    $data['pagina'] = "usuario/consultar_v";

    $this->load->view($this->plantilla, $data);
  }

}
