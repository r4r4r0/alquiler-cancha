<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (isset($nom))
{
  $val_nom = $nom;
}

$val_nom  = isset($nom)   ? $nom  : set_value('nombre-campo');
$val_tam  = isset($tam)   ? $tam  : set_value('tamano-campo');
$val_lug  = isset($lug)   ? $lug  : set_value('lugar-campo');
$val_tipo = isset($tipo)  ? $tipo : set_value('tipo-campo');
?>


<div class="box box-info">
  <div class="box-header with-border">
    <h3 class="box-title">Datos para el campo de fútbol</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  <form class="form-horizontal" method="post" action="<?php echo base_url().'index.php/'.$destino_form ?>">
    <div class="box-body">

      <!-- Nombre del campo -->
      <div class="form-group">
        <label for="nombre-campo" class="col-sm-2 control-label">Nombre del campo</label>

        <div class="col-sm-10">
          <input type="text" class="form-control" name="nombre-campo" id="nombre-campo" value="<?php echo $val_nom ?>" placeholder="Nombre del campo">
          <?php echo form_error('nombre-campo') ?>
        </div>
      </div>

      <!-- Tamaño del campo -->
      <div class="form-group">
        <label for="tamano-campo" class="col-sm-2 control-label">Tamaño del campo</label>

        <div class="col-sm-10">
          <input type="text" class="form-control" name="tamano-campo" id="tamano-campo" value="<?php echo $val_tam ?>" placeholder="Tamaño del campo">
          <?php echo form_error('tamano-campo') ?>
        </div>
      </div>

      <!-- Lugar del campo -->
      <div class="form-group">
        <label for="lugar-campo" class="col-sm-2 control-label">Lugar del campo</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="lugar-campo" id="lugar-campo" placeholder="Lugar del campo" name="lugar-campo" value="<?php echo $val_lug ?>">
          <?php echo form_error('lugar-campo') ?>
        </div>
      </div>

      <!-- Tipo de campo -->
      <div class="form-group">
        <label for="tipo-campo" class="col-sm-2 control-label">Tipo de campo</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="tipo-campo" id="tipo-campo" placeholder="Tipo del campo" name="tipo-campo" value="<?php echo $val_tipo ?>">
          <?php echo form_error('tipo-campo') ?>
        </div>
      </div>

    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      <button type="submit" class="btn btn-success pull-right">Guardar</button>
    </div>
    <!-- /.box-footer -->
  </form>
</div>
