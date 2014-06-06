<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Contabilidad</title>
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
      .firmas{
        width:100%;
        margin:90px 50px 20px;
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

    <h3>Información acudiente</h3>
    <table>
      <tr>
        <th>Nombre</th>
        <td></td>
      </tr>
      <tr>
        <th>Parentesco</th>
        <td></td>
      </tr>
    </table>
    

  </body>      
</html>