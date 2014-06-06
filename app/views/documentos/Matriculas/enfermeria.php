<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Doc. Enfermeria</title>
		<style type="text/css">
			body{
      font-size: 14px
      }
      p{
        text-align : justify;
        margin: 10px 30px;
      }
      li{
        text-align : justify;
        margin: 5px ,30px;
      }
      table{
        width: 100%;
      }
      th{
        text-align: left;
        padding: 2px;
      }
      .paragrafo{
        margin-left: 50px; 
      }
      .padres{    
        width: 100%;
        margin: 65px;
      }
      .padres td {
        padding: 2px;
      }
      .firma{
        width:200px;
        border-top:solid black;
      }
      .firma{
        border-top: solid #000 1px;
      }
      .cch{
        width:50%;
        margin: 50px;
      }
      
      #img{
        width: 250px;
        height: 130px;
      }
      .head{
        font-size: 15px;
        text-align : left;
        margin: 2px 0px;
      }
	</style>
</head>
<body>
	<table class="encabezado">
      <tr>
        <td style="width:250px"><img id="img" src="http://colhebreo.dev/cch/CCH.jpg"/></td>
        <th>
          <p class="head">COLEGIO COLOMBO HEBREO</p>
          <p class="head">AÑO LECTIVO 2014 - 2015</p>
          <p class="head">SERVICIO MEDICO</p>
        </th>
      </tr>
    </table>

    <p>Bogotá D.C  <?= date('d')?> de <?= date('m')?> del <?= date('Y')?></p>

    Información Alumno

    <table>
    	<tr>
    		<th>Apellidos y nombres</th>
    		<td></td>
    		<th>Grado</th>
    		<td></td>
    	</tr>
    	<tr>
			<th>Tipo documento</th>
			<td></td>
			<th>Num. Identificación</th>
			<td></td>
    	</tr>
    	<tr>
    		<th>Lugar de nacimiento, Ciudad/ pais</th>
    		<td></td>
    		<th>RH</th>
    		<td></td>
    	</tr>
    	<tr>
    		<th>Dirección de residencia</th>
    		<td></td>
    		<th>Teléfono casa</th>
    		<td></td>
    	</tr>
    	<tr>

    	</tr>

    </table>

     <?php
      if($firma == 1 || $firma == 3)
      {
    ?>
    <h3>Información papá</h3>
    <table>
      <tr>
        <th>Nombre</th>
        <td><?= $padres['papa']['nombre']?></td>
        <th>C.C o NIT</th>
        <td><?= $padres['papa']['CC']?></td>
      </tr>
      <tr>
        <th>Dirección residencia</th>
        <td><?= $padres['papa']['direccion']?></td>
        <th>Teléfono</th>
        <td><?= $padres['papa']['telefono']?></td>
      </tr>
      <tr>
        <th>Celular</th>
        <td><?= $padres['papa']['celular']?></td>
        <th>E-mail</th>
        <td><?= $padres['papa']['email']?></td>
      </tr>
    </table>
    <?php      
      }
    ?>
    <?php
      if($firma == 2 || $firma == 3)
      {
    ?>
    <h3>Información mamá</h3>
    <table>
      <tr>
        <th>Nombre</th>
        <td><?= $padres['mama']['nombre']?></td>
        <th>C.C o NIT</th>
        <td><?= $padres['mama']['CC']?></td>
      </tr>
      <tr>
        <th>Dirección residencia</th>
        <td><?= $padres['mama']['direccion']?></td>
        <th>Teléfono</th>
        <td><?= $padres['mama']['telefono']?></td>
      </tr>
      <tr>
        <th>Celular</th>
        <td><?= $padres['mama']['celular']?></td>
        <th>E-mail</th>
        <td><?= $padres['mama']['email']?></td>
      </tr>
    </table>
    <?php
      }
    ?>

    <h3>Medico de referencia</h3>
    <table>
    	<tr>
    		<th>Doctor</th>
    		<td class="diligencia"></td>
    	</tr>
    	<tr>
    		<th>Consultorio</th>
    		<td class="diligencia"></td>
    		<th>Teléfono</th>
    		<td class="diligencia"></td>
		</tr>
		<tr>
    		<th>Teléfono casa</th>
    		<td class="diligencia"></td>
    		<th>Celular</th>
    		<td class="diligencia"></td>
    	</tr>
    	<tr>
    		<th>En caso de emergencia avisar a :</th>
    		<td><strong>Casa</strong> ( )</td>
    		<td><strong>Oficina</strong></td>
    		<td><strong>Celular</strong></td>
    	</tr>
    	<tr>
    		<th>Clinica de referencia para llevar en caso de emergencia : </th>
    		<td class="diligencia"></td>
    	</tr>
    	<tr>
    		<th>Nombre del seguro medico diferente al tomado con el colegio (Favor anexar copia de afiliacion a EPS</th>
    	</tr>
    	<tr>
    		<td class="diligencia"></td>
    	</tr>
    </table>
    <h3>Antecedentes medicos</h3>
    <table>
    	<tr>
	    	<th>Que enfermedades anteriores a sufrido (incluyendo eruptivas):</th>
	    	<td class="diligencia"></td>
		</tr>
		<tr>
    		<td class="diligencia"></td>
		</tr>
		<tr>
    		<td class="diligencia"></td>
		</tr>
		<tr>
    		<th>Presenta alergias a : drogas, alimentos, otro.</th>
			<td class="diligencia"></td>
		</tr>
		<tr>
			<td class="diligencia"></td>
		</tr>	
		<tr>
			<td class="diligencia"></td>
		</tr>

		<tr>
			<th>Antecedentes de diabetes : </th>
			<td class="diligencia"></td>
			<th>Asma : </th>
			<td class="diligencia"></td>
			<th>Convulsiones : </th>
			<td class="diligencia"></td>
		</tr>
		<tr>
			<th>Antecedentes quirurgicos:</th>
			<td class="diligencia"></td>
		</tr>
		<tr>
			<th>Antecedentes hospitalarios:</th>
			<td class="diligencia"></td>
		</tr>
		<tr>
			<th>Toma actualmente alguna medicina:</th>
			<td class="diligencia"></td>
		</tr>
		<tr>
			<th>Autorizo en caso necesario suministrar:</th>
			<td class="diligencia"></td>
		</tr>
		<tr>
			<th>Onservaciones:</th>
			<td class="diligencia"></td>
		</tr>
		<tr>
			<td colspan="2" class="diligencia"></td>
		</tr>
		<tr>
			<td colspan="2" class="diligencia"></td>
		</tr>

		<tr>
			<th><p>Autorizo al colegio Colombo Hebreo, para llevar 
				a mi hijo(a) ala clinica en case de emergencia par su atención y tratamiento</p></th>
		</tr>
    </table>

   	<div class="firma">
   		<p><strong>Firma del padre / acudiente</strong></p>
   		<p><strong></strong></p>
   	</div>



</body>
</html>