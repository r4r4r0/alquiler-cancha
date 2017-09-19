<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <?php $this->load->view('layouts/includes/head'); ?>
    <!-- Base CSS -->
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/base.min.css' ?>">
  </head>
  <body>

    Nombre de usuario:
    <?php if ($this->session->has_userdata('sesion_nombre_usuario') ): ?>
      <?php echo $this->session->userdata('sesion_nombre_usuario'); ?>
      <img src="<?php echo base_url().$this->session->userdata('sesion_foto_usuario') ?>" alt="" style="max-width: 100px">
    <?php endif; ?>


    <?php $this->load->view('layouts/includes/js_files'); ?>
  </body>
</html>
