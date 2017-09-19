<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="myform">
  <h3>Iniciar sesión</h3>
  <form class="form" action="<?php echo base_url().'index.php/inicio/iniciarSesion' ?>" method="post">
    <!-- Nombre de usuario -->
    <div class="form-item">
      <label for="input-nomusuario">Nombre de usuario</label>
      <input type="text" name="input-nomusuario" value="" id="input-nomusuario" placeholder="Ingresa tu nombre de usuario">
    </div>
    <!--/Nombre de usuario -->

    <!-- Contraseña del usuario -->
    <div class="form-item">
      <label for="input-contra">Contraseña</label>
      <input type="password" name="input-contra" value="" id="input-contra" placeholder="Ingresa tu contraseña">
    </div>
    <!--/Contraseña del usuario -->

    <!-- Botón de enviar -->
    <div class="form-item">
      <button type="submit" name="btn-form-iniciar">Iniciar sesión</button>
    </div>
    <!--/Botón de enviar -->
  </form>
</div>
