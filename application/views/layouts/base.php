<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
	<!DOCTYPE html>
	<html>

	<head>
		<?php $this->load->view('layouts/includes/head'); ?>
	</head>

	<body class="hold-transition skin-blue sidebar-mini">
		<!-- Site wrapper -->
		<div class="wrapper">

			<!-- Main header -->
			<?php $this->load->view('layouts/includes/main-header'); ?>

			<!-- =============================================== -->

			<!-- Left side column. contains the sidebar -->
			<?php $this->load->view('layouts/includes/main-sidebar'); ?>

			<!-- =============================================== -->

			<!-- Content Wrapper. Contains page content -->
			<div class="content-wrapper">
				<!-- Content Header (Page header) -->
				<section class="content-header">
					<h1>
        <?php echo $titulo ?>
        <?php if (isset($descripcion)): ?>
          <small><?php echo $descripcion ?></small>
        <?php endif; ?>
      </h1>
					<ol class="breadcrumb">
						<li><a href="<?php echo base_url() ?>"><i class="fa fa-dashboard"></i> Inicio</a></li>

						<!-- Controlador -->
						<?php if (isset($this->router->class) && $this->router->class != "inicio"): ?>
						<li><a href="<?php echo base_url().'index.php/'.$this->router->class ?>"><?php echo $this->router->class ?></a></li>
						<?php endif; ?>

						<!-- Método -->
						<?php if (isset($this->router->method) && $this->router->method != "index"): ?>
						<li class="active">
							<?php echo $this->router->method ?>
						</li>
						<?php endif; ?>
					</ol>
				</section>

				<!-- Main content -->
				<section class="content">

					<?php if ($this->session->has_userdata('mensaje')): ?>
					<!-- Mensaje de alerta -->
					<div class="alert alert-<?php echo $this->session->userdata('mensaje_tipo') ?> alert-dismissible">

						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

						<h4><i class="icon fa fa-check"></i> <?php echo $this->session->userdata('mensaje_titulo'); ?></h4>

						<?php echo $this->session->userdata('mensaje'); ?>
					</div>
					<?php endif; ?>

					<?php $this->load->view($pagina); ?>
				</section>
				<!-- /.content -->
			</div>
			<!-- /.content-wrapper -->

			<?php $this->load->view('layouts/includes/main-footer'); ?>

			<?php $this->load->view('layouts/includes/control-sidebar'); ?>
		</div>
		<!-- ./wrapper -->



		<?php $this->load->view('layouts/includes/js_files'); ?>
	</body>

	</html>
