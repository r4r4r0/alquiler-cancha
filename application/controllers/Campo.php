<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Campo extends CI_Controller{

  private $plantilla;

  public function __construct()
  {
    parent::__construct();

    $this->plantilla = "layouts/base";
  }

  public function index()
  {
    $data['titulo'] = "Página de administración de campos";
    $data['pagina'] = "campo/index";
    $this->load->view($this->plantilla, $data);
  }

  public function registrar()
  {
    /*
     * ------------------------------------------------------
     * Validación para los datos del formulario
     * ------------------------------------------------------
     */
    $this->form_validation->set_rules('nombre-campo', 'Nombre del campo', 'required|min_length[4]' );
    $this->form_validation->set_rules('tamano-campo', 'Tamaño del campo', 'required');
    $this->form_validation->set_rules('lugar-campo', 'Lugar del campo', 'required');
    $this->form_validation->set_rules('tipo-campo', 'Tipo del campo', 'required');

    $this->form_validation->set_error_delimiters("<span class='help-block'>","</span>");

    if ($this->form_validation->run() == FALSE)
    {
      $data['titulo'] = "Registrar campo";
      $data['pagina'] = "campo/registrar_v";
      $data['destino_form'] = "campo/registrar";

      $this->load->view('layouts/base', $data);
    }
    else
    {
      $this->load->model('campo_model');

      $nombre = $campo['nombre'] = $this->security->xss_clean(strip_tags($this->input->post('nombre-campo')));
      $campo['tamano'] = $this->security->xss_clean(strip_tags($this->input->post('tamano-campo')));
      $campo['lugar'] = $this->security->xss_clean(strip_tags($this->input->post('lugar-campo')));
      $campo['tipo'] = $this->security->xss_clean(strip_tags($this->input->post('tipo-campo')));

      $this->campo_model->insertar($campo);

      $data['mensaje_titulo'] = "Campo $nombre registrado correctamente";
      $data['mensaje_tipo'] = "success";
      $data['mensaje'] = "El campo se ha registrado exitosamente!";

      $this->session->set_userdata($data);
      $this->session->mark_as_temp("mensaje", 5);

      redirect(base_url().'index.php/campo/registrar');

      return;
    }
  }

  public function consultar()
  {
    $this->load->model('campo_model');

    $data['titulo'] = "Registro de campos";
    $data['pagina'] = "campo/consultar_v";
    $data['campos'] = $this->campo_model->obtenerDatos();

    $this->load->view($this->plantilla, $data);
  }

  public function editar($dato = "")
  {

    // Obtiene los datos del campo que se ha solicitado
    $this->load->model('campo_model');

    $campo = $this->campo_model->obtenerPorId($dato)->row();

    // NOTE: RECORDAR REFACTORIZAR EL SIGUIENTE CÓDIGO
    /*
     * ------------------------------------------------------
     * Validación para los datos del formulario
     * ------------------------------------------------------
     */
    $this->form_validation->set_rules('nombre-campo', 'Nombre del campo', 'required|min_length[4]' );
    $this->form_validation->set_rules('tamano-campo', 'Tamaño del campo', 'required');
    $this->form_validation->set_rules('lugar-campo', 'Lugar del campo', 'required');
    $this->form_validation->set_rules('tipo-campo', 'Tipo del campo', 'required');

    if ($this->form_validation->run() == FALSE)
    {

      $data['titulo'] = "Actualizar campo #$dato";
      $data['nom'] = $campo->nombre;
      $data['tam'] = $campo->tamano;
      $data['lug'] = $campo->lugar;
      $data['tipo'] = $campo->tipo;

      $data['pagina'] = "campo/registrar_v";
      $data['destino_form'] = "campo/editar/".$dato;

      $this->load->view($this->plantilla, $data);
    }
    else
    {
      $nombre = $campoData['nombre'] = $this->security->xss_clean(strip_tags($this->input->post('nombre-campo')));
      $campoData['tamano'] = $this->security->xss_clean(strip_tags($this->input->post('tamano-campo')));
      $campoData['lugar'] = $this->security->xss_clean(strip_tags($this->input->post('lugar-campo')));
      $campoData['tipo'] = $this->security->xss_clean(strip_tags($this->input->post('tipo-campo')));

      $this->campo_model->actualizar($dato, $campoData);

      $mensaje['mensaje_titulo'] = "Campo $nombre actualizado correctamente";
      $mensaje['mensaje_tipo'] = "success";
      $mensaje['mensaje'] = "El campo se ha actualizado exitosamente!";

      $this->session->set_userdata($mensaje);
      $this->session->mark_as_temp("mensaje", 5);

      redirect(base_url().'index.php/campo/consultar');

      return;
    }

  }

  public function eliminar($dato = "")
  {
    $this->load->model('campo_model');

    $this->campo_model->eliminar($dato);

    $this->consultar();

    return;
  }

  public function calendario()
  {
    $data['titulo'] = "Calendario de asignaciones";
    $data['pagina'] = "campo/calendario_v";
    $this->load->view($this->plantilla, $data);
  }

}
