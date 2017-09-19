<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->output->enable_profiler(TRUE);
  }

  function index()
  {
    $data['titulo'] = "Inicio";
    $this->load->view('layouts/base', $data);
  }

  public function login()
  {
    $data['titulo'] = "Iniciar sesión";
    $data['pagina'] = "inicio/login_v";
    $this->load->view('layouts/login', $data);
  }

  public function nuevoRegistro()
  {
    $this->load->model('cliente_model');
    $this->load->model('usuario_model');

    $this->load->model('departamento_model');
    $this->load->model('provincia_model');
    $this->load->model('distrito_model');

    $data['departamentos'] = $this->departamento_model->obtenerDatos();
    $data['provincias'] = $this->provincia_model->obtenerDatos();
    $data['distritos'] = $this->distrito_model->obtenerDatos();

    /*
     * ------------------------------------------------------
     * Validación para los datos del formulario
     * ------------------------------------------------------
     */
    // Dni
    $this->form_validation->set_rules('input-dni', 'DNI', 'trim|integer|required|min_length[5]|is_unique[cliente.dni]', array('is_unique' => 'Esta clave %s ya está registrada.'));

    // Nombres del cliente
    $this->form_validation->set_rules('input-nombres', 'Nombres', 'trim|required');

    // Apellido paterno
    $this->form_validation->set_rules('input-app-pat', 'Apellido paterno', 'trim|required');

    // Apellido materno
    $this->form_validation->set_rules('input-app-mat', "Apellido materno", 'trim|alpha_numeric_spaces|required');

    // Edad
    $this->form_validation->set_rules('input-edad', 'Edad', 'trim|integer|is_natural_no_zero|required');

    // Correo electrónico
    $this->form_validation->set_rules('input-correo', 'Correo electrónico', 'trim|valid_email|required');

    // Número telefónico
    $this->form_validation->set_rules('input-tel', 'Teléfono', 'trim|is_natural|min_length[9]|required');

    // Nombre de usuario
    $this->form_validation->set_rules('input-nomusuario', 'Nombre de usuario', 'trim|required|is_unique[usuario.nombre]', array('is_unique' => "Este nombre de usuario ya está registrado, elige otro."));

    // Contraseña del usuario
    $this->form_validation->set_rules('input-contra', 'Contraseña', 'trim|required|min_length[5]');

    // Repetir contraseña del usuario
    $this->form_validation->set_rules('input-repcontra', 'Repetir contraseña', 'trim|required|matches[input-contra]', array('matches' => 'La contraseña no coincide con la que ha establecido.'));

    // Establece los delimitadores
    $this->form_validation->set_error_delimiters('<div class="form-error">', '</div>');

    if ($this->form_validation->run() == FALSE)
    {
      $data['titulo'] = "Nuevo registro";
      $data['pagina'] = "inicio/formNueReg_v";
      $this->load->view('layouts/login', $data);
    }
    else
    {
      /*
       * ------------------------------------------------------
       * Obtiene los datos del formulario
       * ------------------------------------------------------
       */

      // DNI
      $dataCliente['dni'] = $this->security->xss_clean(strip_tags($this->input->post('input-dni')));

      // Nombres del cliente
      $dataCliente['nombres'] = $this->security->xss_clean(strip_tags($this->input->post('input-nombres')));

      // Apellido paterno
      $dataCliente['apepater'] = $this->security->xss_clean(strip_tags($this->input->post('input-app-pat')));

      // Apellido materno
      $dataCliente['apemater'] = $this->security->xss_clean(strip_tags($this->input->post('input-app-mat')));

      // Edad
      // $dataCliente['edad'] = $this->security->xss_clean(strip_tags($this->input->post('input-edad')));

      // Correo electrónico
      $dataCliente['correo'] = $this->security->xss_clean(strip_tags($this->input->post('input-correo')));

      // Número telefónico
      $dataCliente['telefono'] = $this->security->xss_clean(strip_tags($this->input->post('input-tel')));

      // Departamento
      $location['departamento'] = $this->security->xss_clean(strip_tags($this->input->post('input-departamento')));

      // Provincia
      $location['provincia'] = $this->security->xss_clean(strip_tags($this->input->post('input-provincia')));

      // Distrito
      // $dataCliente['distrito'] = $this->security->xss_clean(strip_tags($this->input->post('input-distrito')));

      /*
       * ------------------------------------------------------
       * Datos del usuario
       * ------------------------------------------------------
       */
      // Nombre del usuario
      $dataUsuario['nombre'] = $this->security->xss_clean(strip_tags($this->input->post('input-nomusuario')));

      // Contraseña del usuario
      // NOTE: Recordar encriptar la contraseña
      $dataUsuario['contrasena'] = $this->security->xss_clean(strip_tags($this->input->post('input-contra')));

      // Establece el tipo de usuario
      $dataUsuario['idtipousuario'] = 2; // Tipo de usuario cliente

      $config['upload_path']          = './imagenes/';
      $config['allowed_types']        = 'gif|jpg|png';
      // $config['max_size']             = 100;
      // $config['max_width']            = 1024;
      // $config['max_height']           = 768;

      $this->load->library('upload', $config);

      if ( ! $this->upload->do_upload('input-fotografia'))
      {
        // NOTE: Cambiar esta parte por algo más estético...
        $error = array('error' => $this->upload->display_errors());
        echo "$error";
      }
      else
      {
        $file_data = $this->upload->data();
        $dataUsuario['fotografia'] = "/imagenes/".$file_data['file_name'];
      }

      //
      // Primero registra a un nuevo usuario
      //
      $this->usuario_model->insertar($dataUsuario);

      // -----------------------------------------------------------------

      //
      // Ahora que se ha registrado al usuario, obtiene su Id
      // para registrar al cliente
      //
      $usuario = $this->usuario_model->obtenerPorCampo('nombre', $dataUsuario['nombre'])->row();

      // Se registra a un nuevo cliente
      $dataCliente['idusuario'] = $usuario->id;
      $this->cliente_model->insertar($dataCliente);

      //
      // Establece los datos de inicio de sesión
      //
      $dataSesion = array(
        'sesion_id_usuario' => $usuario->id,
        'sesion_nombre_usuario' => $usuario->nombre,
        'sesion_foto_usuario' => $usuario->fotografia
      );

      $this->session->set_userdata($dataSesion);

      redirect(base_url().'index.php/inicio');
    }
}

  public function iniciarSesion()
  {
    $data['titulo'] = "Iniciar sesión";
    $data['pagina'] = "inicio/formInises_v";
    $this->load->view('layouts/login', $data);
  }

}
