<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
  <head>
    <?php $this->load->view('layouts/includes/head'); ?>
    <!-- Login Css -->
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/login.min.css' ?>">
  </head>
  <body>

    <section class="main__content">
      <?php if ($this->router->method != "login"): ?>
        <nav class="breadcrumbs mybread">
          <ul>
            <li><a href="<?php echo base_url().'index.php/'.$this->router->class ?>"><?php echo ucfirst($this->router->class) ?></a></li>
            <li><a href="<?php echo base_url().'index.php/inicio/login' ?>">Login</a></li>
            <li><span><?php echo $titulo ?></span></li>
          </ul>
        </nav>
      <?php endif; ?>
      <!-- Carga el contenido dinámico -->
      <?php $this->load->view($pagina); ?>
    </section>

    <?php $this->load->view('layouts/includes/js_files'); ?>
  </body>
</html>
