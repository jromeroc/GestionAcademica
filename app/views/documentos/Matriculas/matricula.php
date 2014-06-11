<html>
<head>
	<title>Matricula</title>
	<style type="text/css">
		#encabezado{margin-bottom: 10px;}
		#encabezado div{
			width: 32%;
			display: inline-block;
		}
		.cch{
			width: 250px;
        	height: 130px;
		}
		.efqm{
			width: 200px;
        	height: 130px;
   		}
   		.fecha{
   			text-align: right;
   			margin-right: 30px;
   		}
   		.footer{
   			position:absolute; 
 			bottom:150;
 			width: 100%;
   		}
   		.firmas{
   			margin-top: 90px;
   		}

   		.firmas div{
   			border-top: 1px solid #000;
   			display: inline-block;
   			width: 300px;
   			font-weight:bold;
   			margin-right: 30px
   		}

   		table{
   			width: 100%;
   		}
   		table th{
   			height: 25px;
   		}
		th{
			text-align: left;
		}
	 	h3{
	 		background-color: #819FF7;
	        border-bottom: solid #662 1px;
	        margin: 0;
	        padding: 5px 0 0 0;
		}
	</style>
</head>
<body>


	<?php foreach ($hijo as $infohijo) { ?>
	<div style="page-break-after: always;">
		<div id="encabezado">
			<div>
				<img class="cch" src="http://192.168.0.50/cch/CCH.jpg"/>
			</div>
			<div></div>
			<div>
				<img class="efqm" src="http://192.168.0.50/cch/efqm.jpg"/>
			</div>
		</div>
		<?php
			$fecha = explode('-', $infohijo['fecha']);
			$nacimiento = explode('-', $infohijo['date_born']);
		?>
		<p class="fecha"><strong>Bogotá <?= $fecha[2]?> de <?= $mes[intval($fecha[1])]?> del <?= $fecha[0]?></strong></p>
		<div>
			<table>
				<tr>
					<th>Codigo Matricula</th>
					<td ><?=$infohijo['matricula']?></td>
					<th >Folio</th>
				</tr>
				<tr>
					<th>Nombre del estudiante</th>
					<td colspan="3"><?=$infohijo['nombre']?></td>
				</tr>
				<tr>
					<th>Se matricula al grado</th>
					<td colspan="3"><?=$infohijo['grado']?></td>
				</tr>
				<tr>
					<th>Fecha de nacimiento</th>
					<td><?= $nacimiento[2]?> de <?= $mes[intval($nacimiento[1])]?> del <?= $nacimiento[0]?></td>
					<th>Edad</th>
					<td><?=$infohijo['age']?> años</td>
				</tr>
				<tr>
					<th>Lugar de nacimiento</th>
					<td><?=$infohijo['nombre_ciudad']?> / <?=$infohijo['name_pais']?></td>
					
				</tr>
				<tr>
					<th>Tipo de identificación</th>
					<td><?=$infohijo['name']?></td>
					<th>Identificación</th>
					<td><?=$infohijo['num_document']?></td>
				</tr>
				<tr>
					<th>Dirección casa</th>
					<td><?=$infohijo['direccion']?></td>
					<th>Teléfono casa</th>
					<td><?=$infohijo['telefono']?></td>
				</tr>
			</table>
		</div>

		<?php
		if (isset($padres['papa']['id'])) {
		if ($padres['papa']['id'] != 1){
		?>	
		<div>
			<h3>Informacion papá</h3>
			<table>
				<tr>
					<th>Nombre</th>
					<td><?= $padres['papa']['nombre']?></td>
					<th>Profesión</th>
					<td><?= $padres['papa']['profesion_padre']?></td>
				</tr>
				<tr>
					<th>Teléfono oficina</th>
					<td><?= $padres['papa']['oficina']?></td>
					<th>Celular</th>
					<td><?= $padres['papa']['celular']?></td>
				</tr>
			</table>
		</div>
		<?php
		} } 
		?>
		<?php
		if (isset($padres['mama']['id'])){
		if ($padres['mama']['id'] != 1){
		?>	
		<div>
			<h3>Informacion mamá</h3>
			<table>
				<tr>
					<th>Nombre</th>
					<td><?= $padres['mama']['nombre']?></td>
					<th>Profesión</th>
					<td><?= $padres['mama']['profesion_padre']?></td>
				</tr>
				<tr>
					<th>Teléfono oficina</th>
					<td><?= $padres['mama']['oficina']?></td>
					<th>Celular</th>
					<td><?= $padres['mama']['celular']?></td>
				</tr>
			</table>
		</div>
		<?php
		}}
		?>
		
		<div >
			<div class="firmas">
				<div>Firma padre o acudiente<p><strong>N° Identificación </strong>____________________</p></div>
				<div>Firma alumno</div>
			</div>
			<div class="firmas">
				<div>Firma rector</div>
				<div>Firma secretaria académica</div>
			</div>
		</div>
	<div>
		<img class="footer" src="http://192.168.0.50/cch/footer.jpg">
	</div>
	</div>
	 <?php }?>
</body>
</html>
