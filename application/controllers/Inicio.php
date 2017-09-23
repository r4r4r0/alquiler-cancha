<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
  }

  /**
	 * Función principal de la clase a la que llama por defecto.
	 *
	 * Realiza una verificación si se ha generado un log de los
	 * registros necesarios para la aplicación, si no, llama a
	 * la librería donde se encuentran las funciones para la
	 * inserción de registros necesarios.
	 *
	 * @return void
	 */
  public function index()
	{
    if ( ! $this->session->userdata('sesion_id_usuario'))
    {
      $this->ingresar();
    }
    else
    {
      $this->dashboard();
    }

	}

  public function dashboard()
  {
    $data['titulo'] = "¡Bienvenido!";
    $data['pagina'] = "inicio/index";
    $this->load->view('layouts/base', $data);
  }

  public function ingresar()
  {
    $this->load->model('usuario_model');

    $mensaje = "";

    /*
     * ------------------------------------------------------
     * Validación de los datos del formulario
     * ------------------------------------------------------
     */
    $this->form_validation->set_rules('input-usuario', 'Nombre de usuaro', 'required');
    $this->form_validation->set_rules('input-contrasena', 'Contraseña', 'required');

    $this->form_validation->set_error_delimiters('<span class="form__desc--error">', '</span>');

    if ($this->form_validation->run() == FALSE)
    {
      $data['titulo'] = "Iniciar sesión";
      $this->load->view('layouts/ingresar', $data);
    }
    else
    {
      /*
       * ------------------------------------------------------
       * Obtiene los datos del formulario
       * ------------------------------------------------------
       */
      // Usuario
      $usuario = $this->security->xss_clean(strip_tags($this->input->post('input-usuario')));

      // Contraseña
      $contrasena = $this->security->xss_clean(strip_tags($this->input->post('input-contrasena')));

      // Verifica que el usuario esté registrado en la base de datos
      $usr_db = $this->usuario_model->obtenerPorCampo('nombre', $usuario);

      // Si el mensaje no está en la base de datos...
      // no hay nada que se pueda hacer :(
      if ($usr_db->num_rows() <= 0)
      {
        $this->mostrarMensaje("El usuario $usuario no existe.");
        redirect(base_url().'index.php/inicio/ingresar');
        return 0;
      }

      //
      // Verifica el nombre de usuario y contraseña,
      // si la consulta no arroja ningún resultado
      // la contraseña o el nombre de usaurio es
      // incorrecto :/
      //
      $query = $this->usuario_model->verificarUsuario($usuario, $contrasena);
      if (is_int($query))
      {
        if ($query == 0)
        {
          $this->mostrarMensaje("El usuario o contrasena es incorrecta");
          redirect(base_url().'index.php/inicio/ingresar');
          return 0;
        }
      }


      $this->output->enable_profiler(TRUE);
      // Si ha llegado a este punto, significa que
      // el usuario y contraseña son correctos
      // entonces realiza los datos de sesión
      $usr = $query->row();
      $datosSesion = array(
					'sesion_id_usuario'         		=> $usr->id,
					'sesion_nombre_usuario'     		=> $usr->nombre,
          'sesion_foto_usuario'           => $usr->fotografia,
          'sesion_tipo_usuario'           => $usr->idtipousuario
			);
			$this->session->set_userdata($datosSesion);

      redirect(base_url());
      return;
    }

  }

  private function mostrarMensaje($mensaje)
  {
    $new_flashdata = array('mensaje' => $mensaje);
    $this->session->set_flashdata($new_flashdata);
  }

  public function registrar()
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

    // Departamento
    $this->form_validation->set_rules('input-departamento', 'Departamento', 'trim|required|numeric');

    // Provincia
    $this->form_validation->set_rules('input-provincia', 'Provincia', 'trim|required|numeric');

    // Distrito
    $this->form_validation->set_rules('input-distrito', 'Distrito', 'trim|required|numeric');

    // Establece los delimitadores
    $this->form_validation->set_error_delimiters('<div class="form-error">', '</div>');

    if ($this->form_validation->run() == FALSE)
    {
      $data['titulo'] = "Nuevo cliente";
      $data['pagina'] = "inicio/registrar_v";
      $this->load->view('layouts/base', $data);
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

      // NOTE: Cambiar esto, se debe de pedir también el tipo de usuario que se vaya a registrar
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
        print_r($error);
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

      
    }
  }

  /**
   * Elimina la sesión actual y redirige a la página de login
   *
   * @return void
   **/
  public function salir()
  {
    $this->session->sess_destroy();
    redirect(base_url());
  }

}
