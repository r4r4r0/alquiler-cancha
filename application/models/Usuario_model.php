<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends Funciones_model{

  public function __construct()
  {
    parent::__construct();
    $this->tabla = "usuario";
  }


  /**
   * VerificarUsuario
   *
   * Verifica si el usuario existe dado el nombre
   * del usuario y contraseña, el resultado da
   * simplemente un registro.
   *
   * @param  string $usuario
   * @param  string $contrasena
   * @return object             Devuelve result_set para usar estilo OOP
   */
  public function verificarUsuario($usuario, $contrasena)
  {
    $this->db->where('nombre', $usuario);
    $this->db->where('contrasena', $contrasena);
    $query = $this->db->get($this->tabla);

    if ($query->num_rows() <= 0)
    {
      return 0;
    }

    return $query;
  }
}
