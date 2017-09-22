<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo base_url().$this->session->userdata('sesion_foto_usuario') ?>"  alt="User Image" style="width:90%; height:90%">
      </div>
      <div class="pull-left info">
        <p><?php echo $this->session->userdata('sesion_nombre_usuario'); ?></p>
        <a href="#"><i class="fa fa-circle text-success"></i> En línea</a>
      </div>
    </div>

    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">NAVEGACIÓN PRINCIPAL</li>
      <!-- <li class="treeview">
        <a href="#">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?php // echo base_url().'/' ?>index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
          <li><a href="<?php // echo base_url().'/' ?>index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
        </ul>
      </li> -->

      <!-- <li class="treeview">
        <a href="#">
          <i class="fa fa-share"></i> <span>Multilevel</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
          <li class="treeview">
            <a href="#"><i class="fa fa-circle-o"></i> Level One
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
              <li class="treeview">
                <a href="#"><i class="fa fa-circle-o"></i> Level Two
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                  <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                </ul>
              </li>
            </ul>
          </li>
          <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
        </ul>
      </li> -->
      <!-- <li><a href="https://adminlte.io/docs"><i class="fa fa-book"></i> <span>Documentation</span></a></li> -->
      <!-- <li class="header">LABELS</li> -->
      <!-- <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
      <!-- <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li> -->

      <!-- Nuevo cliente -->
      <li><a href="<?php echo base_url().'index.php/inicio/registrar' ?>"><i class="fa fa-circle-o text-aqua"></i> <span>Nuevo cliente</span></a></li>

      <!-- Ver usuarios registrados -->
      <li><a href="<?php echo base_url().'index.php/usuario/consultar' ?>"><i class="fa fa-circle-o text-info"></i> <span>Ver usuarios</span></a></li>
      <!-- Registrar campo -->
      <li><a href="<?php echo base_url().'index.php/campo/registrar' ?>"><i class="fa fa-circle-o text-purple"></i> <span>Registrar campo</span></a></li>

      <!-- Consultar campo -->
      <li><a href="<?php echo base_url().'index.php/campo/consultar' ?>"><i class="fa fa-circle-o text-green"></i> <span>Consultar campos</span></a></li>

    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
