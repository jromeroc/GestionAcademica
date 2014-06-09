<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Doc. Enfermeria</title>
		<style type="text/css">
			body{
      font-size: 14px
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

      h3{
        border-bottom: solid #662 1px;
        margin: 0;
        padding: 5px 0 0 0;
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
        border-top: solid #000 1px;
        margin-top: 50px;
        width: 250px;
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

      .diligencia{
        border-bottom: solid #000 1px;
      }
	</style>
</head>
<body>
  <?php foreach ($hijo as $infohijo) { ?>
  
  <div style="page-break-after: always;"> 
  <table class="encabezado">
      <tr>
        <td style="width:250px"><img id="img" src="http://192.168.0.50/cch/CCH.jpg"/></td>
        <th>
          <p class="head">COLEGIO COLOMBO HEBREO</p>
          <p class="head">AÑO LECTIVO 2014 - 2015</p>
          <p class="head">SERVICIO MEDICO</p>
        </th>
      </tr>
    </table>

    <p>Bogotá D.C  <?= date('d')?> de <?= $mes[date('n')]?> del <?= date('Y')?></p>

    <h3>Información Alumno</h3>

    <table>
      <tr>
        <th>Apellidos y nombres</th>
        <td><?=$infohijo['nombre']?></td>
        <th>Grado</th>
        <td><?=$infohijo['grado']?></td>
      </tr>
      <tr>
      <th>Tipo documento</th>
      <td><?=$infohijo['name']?></td>
      <th>Num. Identificación</th>
      <td><?=$infohijo['num_document']?></td>
      </tr>
      <tr>
        <th>Lugar de nacimiento, Ciudad / pais</th>
        <td><?=$infohijo['nombre_ciudad']?> / <?=$infohijo['name_pais']?></td>
        <th>RH</th>
        <td><?=$infohijo['grupo_san'].$infohijo['rh']?></td>
      </tr>
      <tr>
        <th>Dirección de residencia</th>
        <td><?=$infohijo['direccion']?></td>
        <th>Teléfono casa</th>
        <td><?=$infohijo['telefono']?></td>
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
        <th colspan="2">Nombre doctor: _______________________________________________</th>
      </tr>
      <tr>
        <th>Consultorio: _________________________________</th>
        <th>Teléfono: _________________</th>
      </tr>
      <tr>
        <th>Teléfono casa: _________________</th>
        <th>Celular: _______________________</th>
      </tr>
      <tr>
        <th colspan="2">En caso de emergencia avisar a :
          <strong>Casa</strong> ( )
          <strong>Oficina</strong> ( )
          <strong>Celular</strong> ( )
        </th>
      </tr>
      <tr>
        <th colspan="2">Clinica de referencia para llevar en caso de emergencia:
          __________________________
      </th>
      </tr>
      <tr>
        <th  colspan="2">Nombre del seguro medico diferente al tomado con el colegio (Favor anexar copia de afiliacion a EPS)
          ______________________________________
        </th>
      </tr>

    </table>
    <h3>Antecedentes medicos</h3>
    <table>
      <tr>
        <th>Que enfermedades anteriores a sufrido (incluyendo eruptivas): 
          __________________________________________________________
        </th> 
      </tr>
    <tr>
      <th>Presenta alergias a : drogas, alimentos, otro.
        ________________________________________________________________________________________________
      </th>
    </tr>

    <tr>
      <th>Antecedentes de diabetes : ____________ Asma :  ____________ Convulsiones: ____________</th>
    </tr>

    <tr>
      <th>Antecedentes quirurgicos: 
        ________________________________________________________________________________________________
      </th>
    </tr>

    <tr>
      <th>Antecedentes hospitalarios: 
        ________________________________________________________________________________________________
      </th>
    </tr>

    <tr>
      <th>Toma actualmente alguna medicina: 
        ________________________________________________________________________________
      </th>
    </tr>
    <tr>
      <th>Autorizo en caso necesario suministrar: ___________________________________________________________</th>
    </tr>
    <tr>
      <th>Observaciones: 
        ____________________________________________________________________________________________________
      </th>
      
    </tr>

    <tr>
      <th><p>Autorizo al colegio Colombo Hebreo, para llevar a mi hijo(a) ala clinica en case de emergencia par su atención y tratamiento</p></th>
    </tr>
    </table>

    <div></div>
    <div class="firma">
      <p><strong>Firma del padre / acudiente</strong></p>
      <p><strong></strong></p>
    </div>
  </div>

  <?php }?>

</body>
</html>
