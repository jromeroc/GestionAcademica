<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Contabilidad</title>
		<style type="text/css">
			body{
      font-size: 13px
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
        width:200px;
        border-top:solid black;
      }
      .firmas{
        width:100%;
        margin:90px 50px 20px;
      }
      .cch{
        width:50%;
        margin: 50px;
      }
      
      #img{
        height: 130px;
        width: 250px;
      }
      .head{
        font-size: 15px;
        margin: 2px 0px;
        text-align : left;
      }

      .diligenciar{
        border-bottom: solid black 1px;
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
          <p class="head">HOJA CONTABILIDAD</p>
        </th>
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
        <th>Dirección</th>
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
        <th>Dirección</th>
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

    <h3>Información acudiente</h3>
    <table id="acudiente">
      <tr>
        <th>Nombre</th>
        <td><?=$acudiente['nombre_acudiente']?></td>

        <th>Parentesco</th>
        <td><?=$acudiente['parentesco_acudiente']?></td>
        
      </tr>

      <tr>
        

        <th>Celular</th>
        <td><?=$acudiente['celular_acudiente']?></td>

        <th>Telefono Oficina</th>
        <td><?=$acudiente['teloficina_acudiente']?></td>

        <th>Telefono Casa</th>
        <td><?=$acudiente['telefono_acudiente']?></td>
      </tr>

    </table>
    <h3>Información Alumnos</h3>
    <table>
      <tr>
        <th>Edad</th>
        <th>Nombre (DEL MAYOR AL MENOR)</th>
        <th>CURSO (AL QUE INGRESA)</th>  
      </tr>
      <?php foreach ($hijos as $key) { ?>
      <tr>
        <td><?= $key['age']." años" ?></td>
        <td><?= $key['nombre'] ?></td>
        <td><?= $key['grado'] ?></td>
      </tr>
      <?php } ?>
    </table>

    <table>
      <tr>
        <th>Curso</th>
        <th>Valor Matricula</th>
        <th>Valor Material Didactico</th>  
        <th>Subtotal</th>  
      </tr>
      <?php foreach ($hijos as $key) { ?>
      <tr>
        <td><?= $key['grado'] ?></td>
        <td class="diligenciar"></td>
        <td class="diligenciar"></td>
        <td class="diligenciar"></td>
      </tr>
      <?php } ?>

      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>

      <tr>
        <td></td>
        <td></td>
        <td><b>TOTAL:</b></td>
        <td class="diligenciar"></td>
      </tr>

      <tr>
        <td></td>
        <td></td>
        <td><b>VR. DESCUENTO:</b></td>
        <td class="diligenciar"></td>
      </tr>

      <tr>
        <td></td>
        <td></td>
        <td><b>VR. RECARGO:</b></td>
        <td class="diligenciar"></td>
      </tr>

      <tr>
        <td></td>
        <td></td>
        <td><b>OTROS:</b></td>
        <td class="diligenciar"></td>
      </tr>

      <tr>
        <td></td>
        <td></td>
        <td><b>TOTAL:</b></td>
        <td class="diligenciar"></td>
      </tr>

    </table>

    <table>
      <tr>
        <th>Curso</th>
        <th>Pensión</th>
        <th>Transporte</th>  
        <th>Vigilancia</th>  
        <th>Hebraicos</th>  
        <th>VR. Total</th>  
      </tr>
      <?php foreach ($hijos as $key) { ?>
      <tr>
        <td><?= $key['grado'] ?></td>
        <td class="diligenciar"></td>
        <td class="diligenciar"></td>
        <td class="diligenciar"></td>
        <td class="diligenciar"></td>
        <td class="diligenciar"></td>
      </tr>
      <?php } ?>

      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td><b>SUBTOTAL:</b></td>
        <td class="diligenciar" colspan="2"></td>
      </tr>

      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td><b>DESCUENTO:</b></td>
        <td class="diligenciar" colspan="2"></td>
      </tr>

      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td><b>OTROS DESCUENTOS:</b></td>
        <td class="diligenciar" colspan="2"></td>
      </tr>

      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td><b>OTROS PAGOS:</b></td>
        <td class="diligenciar" colspan="2"></td>
      </tr>

      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td><b>OTROS PAGOS:</b></td>
        <td class="diligenciar" colspan="2"></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td><b>TOTAL:</b></td>
        <td class="diligenciar" colspan="2"></td>
      </tr>
    </table>

  </body>      
</html>