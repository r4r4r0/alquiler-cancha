<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <link rel="icon" href="../../favicon.ico">

    <title><?php echo $titulo ?></title>

    <!-- Planilla ingresar -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/plantilla_ingresar.min.css" media="screen" title="no title" charset="utf-8">

    <!-- Hoja de estilos de animaciones -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/animate.css" media="screen" title="no title" charset="utf-8">

  </head>
  <body class="site__container">
  <div class="line"> </div>

  <?php if ($this->session->flashdata('mensaje')): ?>
    <div class="alerta-ingresar alerta-error animated tada">
      <?php echo $this->session->flashdata('mensaje'); ?>
    </div>
  <?php endif; ?>

  <div class="main__container">
    <div class="content">
      <?php $attributes = array('class' => 'form__login' ); ?>
      <?php echo form_open_multipart('inicio/ingresar', $attributes) ?>


       <h2 class="titulo"><?php echo $titulo ?></h2>
        <div class="form__field">
          <label class="form__label" for="input-usuario"><span class="hidden">Usuario</span></label>
          <input id="input-usuario" name="input-usuario" type="text" class="form__input">
          <?php echo form_error('input-usuario') ?>
        </div>

        <div class="form__field">
          <label class="form__label" for="input-contrasena"><span class="hidden">Contraseña</span></label>
          <input id="input-contrasena" name="input-contrasena" type="password" class="form__input" >
          <?php echo form_error('input-contrasena') ?>
        </div>

        <div class="form__field">
          <input type="submit" value="Entrar" class="form__submit">
        </div>

        </form>
    </div>

    </div>

  </body>
</html>
