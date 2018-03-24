<? if ($row->id) { ?>
	<div class="span6">
		<div class="box">
			<div class="box-head">
				<i class="icon-time"></i>
				<span>Log</span>
			</div>
			<div class="box-body box-body-nopadding">
				<div class="accordion" id="accordion1">
					<div class="accordion-group">
						<div class="accordion-heading">
							<a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1" href="#collapse1">Ver / Ocultar</a>
						</div>
						<div id="collapse1" class="accordion-body collapse">
							<div class="accordion-inner accordion-inner-log">
								<table class="table table-striped table-nomargin table-log">
									<tr>
										<th width="30%" style="border-top:0">Fecha</th>
										<th width="30%">Hora</th>
										<th width="40%">Administrador</th>
									</tr>
									<? foreach ($db->iterate(getLogQuery(TABLA, $row->id, $db->fetchOne("SELECT valor FROM configuracion WHERE entidad = 'logs/cantidad'"))) as $row) { ?>
										<tr>
											<td><?=date("d-m-Y",$row->fecha);?></td>
											<td><?=date("H:i:s",$row->fecha);?></td>
											<td><?=$row->nombre;?></td>
										</tr>
									<? } ?>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<? } ?>