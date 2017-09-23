<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="box box-success">
  <!-- Box header -->
  <div class="box-header with-border">
  </div>
  <!--/Box header -->

  <!-- form start -->
    <?php $atributos = array('class' => 'form-horizontal' ); ?>
    <?php echo form_open_multipart('inicio/registrar', $atributos) ?>
    <div class="box-body">
      <!-- Dni -->
      <div class="form-group">
        <label class="col-sm-2 control-label" for="input-dni" class="col-sm-2 control-label">DNI <span class="req">*</span></label>

        <div class="col-sm-10">
          <input type="text" name="input-dni" class="form-control" value="<?php echo set_value('input-dni') ?>" placeholder="Ingrese su DNI">
          <?php echo form_error('input-dni') ?>
        </div>
      </div>
      <!--/Dni -->

      <!-- Nombres del cliente -->
      <div class="form-group">
        <label class="col-sm-2 control-label" for="input-nombres" class="col-sm-2 control-label">Nombres del cliente <span class="req">*</span></label>

        <div class="col-sm-10">
          <input type="text" name="input-nombres" value="<?php echo set_value('input-nombres') ?>" id="input-nombres" class="form-control" placeholder="Ingrese su nombre" >
          <?php echo form_error('input-nombres') ?>
        </div>
      </div>
      <!--/Nombres del cliente -->

      <!-- Apellido paterno -->
      <div class="form-group">
        <label class="col-sm-2 control-label" for="input-app-pat" class="col-sm-2 control-label">Apellido paterno <span class="req">*</span></label>

        <div class="col-sm-10">
          <input type="text" name="input-app-pat" class="form-control" value="<?php echo set_value('input-app-pat') ?>" id="input-app-pat" placeholder="Ingresa tu apellido paterno" >
          <?php echo form_error('input-app-pat') ?>
        </div>
      </div>
      <!--/Apellido paterno -->

      <!--  Apellido materno -->
      <div class="form-group">
        <label class="col-sm-2 control-label" for="input-app-mat" class="col-sm-2 control-label">Apellido materno <span class="req">*</span></label>

        <div class="col-sm-10">
          <input type="text" class="form-control" name="input-app-mat" value="<?php echo set_value('input-app-mat') ?>" id="input-app-mat" placeholder="Ingresa tu apellido materno" >
          <?php echo form_error('input-app-mat') ?>
        </div>
      </div>
      <!--/ Apellido materno -->

      <!-- Edad -->
      <div class="form-group">
        <label class="col-sm-2 control-label" for"input-edad">Edad <span class="req">*</span></label>

        <div class="col-sm-10">
          <input class="form-control" type="number" name="input-edad" value="<?php echo set_value('input-edad') ?>" id="input-edad" placeholder="Ingresa tu edad" >
          <?php echo form_error('input-edad') ?>
        </div>

      </div>
      <!--/Edad -->

      <!-- Correo electrónico -->
      <div class="form-group">
        <label class="col-sm-2 control-label" for"input-correo">Correo electrónico <span class="req">*</span></label>

        <div class="col-sm-10">
          <input class="form-control" type="email" name="input-correo" value="<?php echo set_value('input-correo') ?>" id="input-correo" placeholder="Ingresa tu correo electrónico" >
          <?php echo form_error('input-correo') ?>
        </div>
      </div>
      <!--/Correo electrónico -->

      <!-- Número telefónico -->
      <div class="form-group">
        <label class="col-sm-2 control-label" for"input-tel">Número telefónico <span class="req">*</span></label>

        <div class="col-sm-10">
          <input class="form-control" type="tel" name="input-tel" value="<?php echo set_value('input-tel') ?>" id="input-tel" placeholder="Ingresa tu número telefónico" >
          <?php echo form_error('input-tel') ?>
        </div>

      </div>
      <!--/Número telefónico -->

      <!-- Departamento -->
      <div class="form-group">
        <label class="col-sm-2 control-label" for="input-departamento">Departamento <span class="req">*</span></label>

        <div class="col-sm-10">
          <select class="form-control" name="input-departamento" >
            <option value=""> -- </option>

          <?php foreach ($departamentos->result() as $departamento): ?>
            <option value="<?php echo $departamento->id ?>" <?php echo set_select('input-departamento', $departamento->id) ?>><?php echo $departamento->nombre ?></option>
          <?php endforeach; ?>
        </select>
          <?php echo form_error('input-departamento') ?>
        </div>
      </div>
      <!--/Departamento -->

      <!-- Provincia -->
      <div class="form-group">
        <label class="col-sm-2 control-label" for="input-provincia">Provincia <span class="req">*</span></label>

        <div class="col-sm-10">
          <select class="form-control" name="input-provincia" >
            <option value=""> -- </option>

            <?php foreach ($provincias->result() as $provincia): ?>
              <option value="<?php echo $provincia->id ?>" <?php echo set_select('input-provincia', $provincia->id) ?>><?php echo $provincia->nombre ?></option>
            <?php endforeach; ?>
          </select>
          <!-- <input type="text" name="input-provincia" value="<?php echo set_value('input-provincia') ?>" id="input-provincia"> -->
          <?php echo form_error('input-provincia') ?>
        </div>

      </div>
      <!--/Provincia -->

      <!-- Distrito -->
      <div class="form-group">
        <label class="col-sm-2 control-label" for="input-distrito">Distrito <span class="req">*</span></label>

        <div class="col-sm-10">
          <select class="form-control" name="input-distrito" >
            <option value=""> -- </option>

            <?php foreach ($distritos->result() as $distrito): ?>
              <option value="<?php echo $distrito->id ?>" <?php echo set_select('input-distrito', $distrito->id) ?> > <?php echo $distrito->nombre ?></option>
            <?php endforeach; ?>
          </select>
          <?php echo form_error('input-distrito') ?>
        </div>
      </div>
      <!--/Distrito -->

      <!-- Nombre de usuario -->
      <div class="form-group">
        <label class="form-label col-sm-2" for="input-nomusuario">Nombre de usuario <span class="req">*</span></label>

        <div class="col-sm-10">
          <input class="form-control" type="text" name="input-nomusuario" value="<?php echo set_value('input-nomusuario') ?>" placeholder="Escribe tu nombre de usuario" >
          <?php echo form_error('input-nomusuario') ?>
        </div>
      </div>
      <!--/Nombre de usuario -->

      <!-- Contraseña de usuario -->
      <div class="form-group">
        <label class="form-label col-sm-2" for="input-contra">Contraseña <span class="req">*</span></label>

        <div class="col-sm-10">
          <input class="form-control" type="password" name="input-contra" value="<?php echo set_value('input-contra') ?>" placeholder="Establece una contraseña" >
          <?php echo form_error('input-contra') ?>
        </div>
      </div>
      <!--/Contraseña de usuario -->

      <!-- Repetir contraseña -->
      <div class="form-group">
        <label class="form-label col-sm-2" for="input-repcontra">Repetir contraseña <span class="req">*</span> </label>

        <div class="col-sm-10">
          <input class="form-control" type="password" name="input-repcontra" value="<?php echo set_value('input-repcontra') ?>" placeholder="Repite la contraseña" >
          <?php echo form_error('input-repcontra') ?>
        </div>
      </div>
      <!--/Repetir contraseña -->

      <!-- Fotografía del usuario -->
      <div class="form-group">
        <label class="form-label col-sm-2" for="input-fotografia">Sube una fotografía <span class="req">*</span></label>

        <div class="col-sm-10">
          <input class="form-control" type="file" name="input-fotografia" value="" id="input-fotografia" >
        </div>
      </div>
      <!--/Fotografía del usuario -->

      <!-- Botón de enviar -->
      <div class="form-group">
        <button type="submit" name="btn-editar" class="btn btn-success col-sm-offset-1">Guardar datos</button>
      </div>
    </div>
  </form>
  <!--/form start -->
</div>
