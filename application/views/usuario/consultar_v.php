<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<!-- <div class="box-tools">
						<div class="input-group input-group-sm" style="width: 150px;">
							<input type="text" name="table_search" class="form-control pull-right" placeholder="Search">
							<div class="input-group-btn">
								<button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
							</div>
						</div>
					</div> -->
				</div>
				<!-- /.box-header -->
				<div class="box-body table-responsive no-padding">
					<table class="table table-hover">
						<tbody>
							<tr>
								<th>Id</th>
								<th>Nombre</th>
								<th>Fotografía</th>
								<th>Tipo de usuario</th>
								<th>Cliente</th>
							</tr>
							<?php foreach ($usuarios->result() as $usuario): ?>
								<tr>
									<!-- Usuario id-->
									<td>#<?php echo $usuario->id ?></td>
									<!-- Nombre usuario -->
									<td><?php echo $usuario->nombre ?></td>
									<!-- Imagen usuario -->
									<td><img src="<?php echo base_url().$usuario->fotografia ?>" alt="" class="img-table"></td>
									<!-- Tipo de usuario -->
									<td>
										<?php if ($usuario->idtipousuario == 1): ?>
											<span class="label label-success">
											 Administrador
										<?php else: ?>
											<span class="label label-primary">
												Usuario
											</span>
										<?php endif; ?>
									</td>
									<td>
										<?php
										 	$c = $this->cliente_model->obtenerPorCampo('idusuario', $usuario->id)->row();
											if (isset($c))
												echo $c->nombres;
											else
												echo "No tiene un cliente especificado";
										?>
									</td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->
		</div>
	</div>
