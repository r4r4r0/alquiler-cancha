<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 		Verifica la sesión del usuario
 *
 * 		Esta clase carga después del sistema de CI
 * 		está pensado para restringir el acceso a usuarios, y
 * 		garantizar el manejo de datos con una sesión registrada.
 */
class VerificarAcceso{

  /**
   * Variable que obtiene la instancia de CI
   *
   * @var Object
   */
  private  $CI;

  /**
   * Obtiene los controladores establecidos en la base de datos
   * @var array
   */
  private $controladores = array();

  /**
   * Obtiene los métodos establecidos en la base de datos
   * @var array
   */
  private $metodos = array();

  /**
   * Establece los controladores deshabilitados de forma manual
   * @var array
   */
  private $controladoresDeshabilitados = array();

  /**
   * Establece los métodos deshabilitados de forma manual
   * @var array
   */
  private $metodosDeshabilitados = array();

  /**
   * controladoresHabilitados, contiene los controladores de la base de datos
   * relacionados con el usuario que está actualmente en sesión
   * @var array
   */
  private $controladoresHabilitados = array();

  /**
   * Array que contiene los métodos con acceso establecido
   * desde la base de datos de cada usuario.
   *
   * @var array
   */
  private $metodosHabilitados = array();


  // --------------------------------------------------------------------

  /**
   * Constructor de la clase
   */
  public function __construct()
  {
    $this->CI                           =& get_instance();

    $this->controladoresDeshabilitados  = [''];
    $this->metodosDeshabilitados        = [''];

    $this->controladoresHabilitados     = ['inicio'];
    $this->metodosHabilitados           = ['index','salir', 'ingresar', 'registrar'];

    $this->CI->load->helper('url');
    $this->CI->load->library('session');
    $this->CI->load->model('funciones_model');
    $this->CI->load->model("usuario_model");

    $this->obtenerControladores();
  }

  // --------------------------------------------------------------------

  /**
   * Verifica la sesión antes de mandar el contenido al usuario.
   *
   * @return void
   */
  public function sesion()
  {
    $this->class    = $this->CI->router->class;

    $this->method   = $this->CI->router->method;

    $this->session  = $this->CI->session->userdata('sesion_id_usuario');

    if (in_array($this->class, $this->controladoresHabilitados) && in_array($this->method, $this->metodosHabilitados))
    {
      if ($this->CI->session->has_userdata('sesion_id_usuario'))
      {
        // Verifica el acceso a los controladores deshabilitados y a los métodos deshabilitados
        if (in_array($this->class, $this->controladoresDeshabilitados) || in_array($this->method, $this->metodosDeshabilitados))
        {
          // Acceso no autorizado
          redirect(base_url());
        }

        // Verifica que el usuario siga en la base de datos, si no es así
        // destruye la sesión y lo saca de la aplicación
        $consulta = $this->CI->usuario_model->obtenerPorCampo("Id", $this->session)->result();
        if (empty($consulta))
        {
          // El usuario logueado no coincide con la base de datos
          $this->CI->session->sess_destroy();
          redirect(base_url());
        }
      }
    }
    elseif (! $this->CI->session->has_userdata("sesion_id_usuario") )
    {
      redirect(base_url());
    }

  }

  // --------------------------------------------------------------------


  /**
   * Obtiene el nombre de los archivos controladores que están en la carpeta
   * controllers, esto con el fin de no registrar cada uno de los controladores
   * nuevos que se escriba.
   *
   * @return void
   */
  private function obtenerControladores()
  {
    $directorioControladores = scandir(FCPATH.'application'.DIRECTORY_SEPARATOR.'controllers');

    foreach ($directorioControladores as $directorio)
    {
      $archivo = pathinfo($directorio);

      array_push($this->controladores, $archivo['filename']);
    }
  }

}
