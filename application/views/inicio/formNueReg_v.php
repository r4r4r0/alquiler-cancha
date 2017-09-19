<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="myform">
  <h2>Nuevo registro</h2>

  <?php echo form_open_multipart('inicio/nuevoRegistro') ?>
    <!--  DNI -->
    <div class="form-item">
      <label for="input-dni">DNI <span class="req">*</span></label>
      <input type="text" name="input-dni" value="<?php echo set_value('input-dni') ?>" id="input-dni" placeholder="Ingresa tu DNI" required>
      <?php echo form_error('input-dni') ?>
    </div>
    <!--/ DNI -->

    <!-- Nombres del cliente -->
    <div class="form-item">
      <label for="input-nombres">Nombre(s) <span class="req">*</span></label>
      <input type="text" name="input-nombres" value="<?php echo set_value('input-nombres') ?>" id="input-nombres" placeholder="Ingrese su nombre" required>
      <?php echo form_error('input-nombres') ?>
    </div>
    <!--/Nombres del cliente -->

    <!--  Apellido paterno -->
    <div class="form-item">
      <label for="input-app-pat">Apellido paterno <span class="req">*</span></label>
      <input type="text" name="input-app-pat" value="<?php echo set_value('input-app-pat') ?>" id="input-app-pat" placeholder="Ingresa tu apellido paterno" required>
      <?php echo form_error('input-app-pat') ?>
    </div>
    <!--/ Apellido paterno -->

    <!--  Apellido materno -->
    <div class="form-item">
      <label for="input-app-mat">Apellido materno <span class="req">*</span></label>
      <input type="text" name="input-app-mat" value="<?php echo set_value('input-app-mat') ?>" id="input-app-mat" placeholder="Ingresa tu apellido materno" required>
      <?php echo form_error('input-app-mat') ?>
    </div>
    <!--/ Apellido materno -->

    <!-- Edad -->
    <div class="form-item">
      <label for="input-edad">Edad <span class="req">*</span></label>
      <input type="number" name="input-edad" value="<?php echo set_value('input-edad') ?>" id="input-edad" placeholder="Ingresa tu edad" required>
      <?php echo form_error('input-edad') ?>
    </div>
    <!--/Edad -->

    <!-- Correo electrónico -->
    <div class="form-item">
      <label for="input-correo">Correo electrónico <span class="req">*</span></label>
      <input type="email" name="input-correo" value="<?php echo set_value('input-correo') ?>" id="input-correo" placeholder="Ingresa tu correo electrónico" required>
      <?php echo form_error('input-correo') ?>
    </div>
    <!--/Correo electrónico -->

    <!-- Número telefónico -->
    <div class="form-item">
      <label for="input-tel">Número telefónico <span class="req">*</span></label>
      <input type="tel" name="input-tel" value="<?php echo set_value('input-tel') ?>" id="input-tel" placeholder="Ingresa tu número telefónico" required>
      <?php echo form_error('input-tel') ?>
    </div>
    <!--/Número telefónico -->

    <!-- Departamento -->
    <div class="form-item">
      <label for="input-departamento">Departamento <span class="req">*</span></label>
      <select class="" name="input-departamento" required>
        <option value=""> -- </option>
      <?php foreach ($departamentos->result() as $departamento): ?>
          <option value="<?php echo $departamento->id ?>"><?php echo $departamento->nombre ?></option>
      <?php endforeach; ?>
    </select>
      <?php echo form_error('input-departamento') ?>
    </div>
    <!--/Departamento -->

    <!-- Provincia -->
    <div class="form-item">
      <label for="input-provincia">Provincia <span class="req">*</span></label>
      <select class="" name="input-provincia" required>
        <option value=""> -- </option>
        <?php foreach ($provincias->result() as $provincia): ?>
          <option value="<?php echo $provincia->id ?>"><?php echo $provincia->nombre ?></option>
        <?php endforeach; ?>
      </select>
      <!-- <input type="text" name="input-provincia" value="<?php echo set_value('input-provincia') ?>" id="input-provincia"> -->
      <?php echo form_error('input-provincia') ?>
    </div>
    <!--/Provincia -->

    <!-- Distrito -->
    <div class="form-item">
      <label for="input-distrito">Distrito <span class="req">*</span></label>
      <select class="" name="input-distrito" required>
        <option value=""> -- </option>

        <?php foreach ($distritos->result() as $distrito): ?>
          <option value="<?php echo $distrito->id ?>"><?php echo $distrito->nombre ?></option>
        <?php endforeach; ?>
      </select>
      <?php echo form_error('input-distrito') ?>
    </div>
    <!--/Distrito -->

    <!-- Nombre de usuario -->
    <div class="form-item">
      <label for="input-nomusuario">Nombre de usuario <span class="req">*</span></label>
      <input type="text" name="input-nomusuario" value="<?php echo set_value('input-nomusuario') ?>" placeholder="Escribe tu nombre de usuario" required>
      <?php echo form_error('input-nomusuario') ?>
    </div>
    <!--/Nombre de usuario -->

    <!-- Contraseña de usuario -->
    <div class="form-item">
      <label for="input-contra">Contraseña <span class="req">*</span></label>
      <input type="password" name="input-contra" value="<?php echo set_value('input-contra') ?>" placeholder="Establece una contraseña" required>
      <?php echo form_error('input-contra') ?>
    </div>
    <!--/Contraseña de usuario -->

    <!-- Repetir contraseña -->
    <div class="form-item">
      <label for="input-repcontra">Repetir contraseña <span class="req">*</span> <span class="desc">Repite la contraseña que acabas de crear</span></label>
      <input type="password" name="input-repcontra" value="<?php echo set_value('input-repcontra') ?>" placeholder="Repite la contraseña" required>
      <?php echo form_error('input-repcontra') ?>
    </div>
    <!--/Repetir contraseña -->

    <!-- Fotografía del usuario -->
    <div class="form-item">
      <label for="input-fotografia">Sube una fotografía <span class="req">*</span></label>
      <input type="file" name="input-fotografia" value="" id="input-fotografia" required>
    </div>
    <!--/Fotografía del usuario -->

    <!-- Botón para enviar formulario -->
    <div class="form-item">
      <button type="submit" name="btn-form-nuevo">Registrar</button>
    </div>
    <!--/Botón para enviar formulario -->
  </form>
</div>
