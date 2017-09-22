<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Campos registrados</h3>

					<div class="box-tools">
						<div class="input-group input-group-sm" style="width: 150px;">
							<input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

							<div class="input-group-btn">
								<button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
							</div>
						</div>
					</div>
				</div>
				<!-- /.box-header -->
				<div class="box-body table-responsive no-padding">
					<table class="table table-hover">
						<tbody>
							<tr>
								<th>Id</th>
								<th>Nombre</th>
								<th>Tamaño</th>
								<th>Lugar</th>
								<th>Tipo</th>
								<th>Opciones</th>
							</tr>

							<?php foreach ($campos->result() as $campo): ?>
							<tr>
								<td>#<?php echo $campo->id ?></td>
								<td><?php echo $campo->nombre ?></td>
								<td><?php echo $campo->tamano ?></td>
								<td><?php echo $campo->lugar ?></td>
								<td><?php echo $campo->tipo ?></td>
								<th>
									<div class="btn-group">
                      <a href="<?php echo base_url().'index.php/campo/editar/'.$campo->id ?>" class="btn btn-info"><i class="fa fa-edit"></i></a>
                      <button class="btn btn-danger" data-toggle="modal" data-target="#modal-danger"><i class="fa fa-remove"></i></button>

											<div class="modal modal-danger fade in" id="modal-danger" style="display: none;">
												<div class="modal-dialog">
							            <div class="modal-content">
							              <div class="modal-header">
							                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							                  <span aria-hidden="true">×</span></button>
							                <h4 class="modal-title">¿Estás seguro que quieres eliminar este registro?</h4>
							              </div>
							              <div class="modal-body">
							                <p>Registro: <?php echo $campo->nombre ?></p>
							              </div>
							              <div class="modal-footer">
							                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cerrar</button>
							                <a href="<?php echo base_url().'index.php/campo/eliminar/'.$campo->id ?>" type="button" class="btn btn-outline">Continuar</a>
							              </div>
							            </div>
							            <!-- /.modal-content -->
							          </div>
							          <!-- /.modal-dialog -->
							        </div>

                    </div>
								</th>
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


	<!-- Componentes -->

<!--/Componentes -->
