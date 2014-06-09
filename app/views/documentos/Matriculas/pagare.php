<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<style>
			body{
				font-size: 14px;
				margin-bottom: 50px;
			}

			h4{
				text-align : justify;
				margin: 10px 30px;
			}

			p{
				text-align : justify;
				margin: 10px 30px;
			}
			li{
				text-align : justify;
				margin: 5px ,60px;
			}
			th{
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

			.container{
				padding-top: 80px;
			    font-size: 16px;
			}
			.control-label{
			    font-weight:bold;
			}
			.col{
				border-top: 2px solid;
				margin-left: 30px;
				width: 45%;
				display: inline-block;
			}
		</style>
		<title> Doc. Pagare </title>
	</head>

	<body>
		<?php
				if ($firma == 1){ 
					$representantes = "Yo ".$padres['papa']['nombre']." mayor de edad y vecino de la ciudad de Bogotá D.C. identificado como aparece al pie de mi firma por medio del presente escrito autorizo"; 
					$infoPagare = "Yo ".$padres['papa']['nombre']."mayor de edad y con domicilio en La ciudad de Bogotá D.C.:".$padres['papa']['direccion']." identificado como aparece al pie de mi firma, actuando en mi propio nombre, declaro de manera expresa por medio del presente instrumento que SOLIDARIA e INCONDICIONALMENTE pagare a la orden del COLEGIO COLOMBO HEBREO, o a su orden, en sus oficinas de ________________ el día ".date('d')." de _____ del ".date('Y').", las siguientes cantidades:";}
				elseif($firma == 2) { 
					$representantes = "Yo ".$padres['mama']['nombre']." mayor de edad y vecina de la ciudad de Bogotá D.C. identificada como aparece al pie de mi firma por medio del presente escrito autorizo";
					$infoPagare = "Yo ".$padres['mama']['nombre']."mayor de edad y con domicilio en La ciudad de Bogotá D.C.:".$padres['mama']['direccion']." identificada como aparece al pie de mi firma, actuando en mi propio nombre, declaro de manera expresa por medio del presente instrumento que SOLIDARIA e 		INCONDICIONALMENTE pagare a la orden del COLEGIO COLOMBO HEBREO, o a su orden, en sus oficinas de ________________ el día ".date('d')." de _____ del ".date('Y').", las siguientes cantidades:"; }
				elseif($firma == 3)	{ 
					$representantes = "Nosotros ".$padres['papa']['nombre']." y ".$padres['mama']['nombre']." mayores de edad y vecinos de la ciudad de Bogotá D.C. identificados como aparece al pie de nuestras firmas por medio del presente escrito autorizamos";
					$infoPagare = "Nosotros ".$padres['papa']['nombre']." y ".$padres['papa']['nombre']."mayores de edad y con domicilio en La ciudad de Bogotá D.C.:".$padres['papa']['direccion']." ".$padres['mama']['direccion']."identificados como aparece al pie de mi firma, actuando en nuestro propio nombre, declaramos de manera expresa por medio del presente instrumento que SOLIDARIA e 		INCONDICIONALMENTE pagare a la orden del COLEGIO COLOMBO HEBREO, o a su orden, en sus oficinas de ________________ el día ".date('d')." de _____ del ".date('Y').", las siguientes cantidades:";	}
			?> 

		<table class="encabezado">
   			<tr>
      			<td style="width:250px"><img id="img" src="http://192.168.0.50/cch/CCH.jpg"/></td>
		    	<th>
		    		<p class="head">COLEGIO COLOMBO HEBREO</p>
    				<p class="head">PROCESO DE MATRÍCULA</p>
    				<p class="head">CARTA DE AUTORIZACIÓN Y PAGARÉ</p>
    			</th>
		    </tr>
		</table> 
		<p>
			<?= $representantes?> al <strong>COLEGIO COLOMBO 
			HEBREO</strong> o a quien represente sus derechos, de conformidad con el artículo 622 del 
			Código de Comercio, en forma irrevocable y permanente para diligenciar sin previo aviso 
			los espacios en blanco contenidos en el presente pagaré que hemos otorgado a su orden, 
			cuando exista incumplimientos de cualquier obligación a mi / nuestro cargo o se presente 
			cualquier evento que permita al <strong><strong>COLEGIO COLOMBO HEBREO</strong></strong>, acelerar las obligaciones 
			conforme al <strong>CONTRATO DE PRESTACION DE SERVICIOS EDUCATIVOS</strong> celebrado con la 
			institución, de acuerdo con las siguientes instrucciones.
		</p>	
		<p>
		<ol type="a">
			<li>El lugar de pago será la ciudad donde se diligencie el pagaré, el lugar y fecha de emisión
				del pagaré serán el lugar y el día en que sea llenado por el <strong>COLEGIO COLOMBO
				HEBREO</strong> y la fecha de vencimiento será el día siguiente al de la fecha de emisión.
			</li>
			<li>
				El monto por concepto de capital será igual al valor de capital de todas las obligaciones
				exigibles a favor del <strong>COLEGIO COLOMBO HEBREO</strong>, de las que el / los otorgante / s 
				sea/n deudor/es individual, conjunta o solidaria, o de las que sean garantes o avalistas 
				o de las que por cualquier motivo resulten a su cargo, más los valores que se relacionen 
				con las anteriores obligaciones por concepto de, honorarios de abogados, gastos 
				administrativos y de cobranzas, así como cualquier otra suma que se deba por concepto 
				distinto de intereses, salvo aquellos intereses que sea permitido capitalizar.
			</li>
			<li>
				El monto por intereses causados y no pagados será el que corresponda por este 
				concepto, tanto de intereses de plazo como de intereses de mora.
			</li>
			<li>
				En caso de incumplimiento, retardo o existencia de cualquier causal de aceleración 
				contemplada en el <strong>CONVENIO DE PAGO</strong>, frente a cualquiera de las obligaciones a cargo 
				<strong>DEL / LOS OTORGANTE/S</strong>, el <strong>COLEGIO COLOMBO HEBREO</strong> queda autorizado para 
				acelerar el vencimiento y exigir anticipadamente el valor de las demás obligaciones de 
				las que sean los deudores, garantes o avalistas, individual, conjunta o solidariamente, sin 
				necesidad de requerimiento judicial o extrajudicial para constituir en mora, así como para 
				incorporarlas en el pagaré.
			</li>
			<li>
				Así mismo <strong>EL / LOS OTORGANTE/S</strong>, autorizan expresamente a diligenciar los espacios 
				en blanco correspondientes a su nombre y domicilio.
			</li>
		</ol>
		</p>
		<p>
			<strong>EL / LOS OTORGANTE/S</strong> declara/n que ha/n recibido copia de esta carta de instrucciones, 
			así como del <strong>CONTRATO DE PRESTACION DE SERVICIOS EDUCATIVOS</strong> y acepta/n el 
			contenido total de los mismos.
		</p>

		<h4>PAGARÉ</h4>
		<p>
			<?=$infoPagare;?>
		</p>
		<p>
		<ol type="1">
			<li>Por concepto de capital, la suma de _________________________________________________ ($ ) moneda 
				corriente.
			</li>
			<li>
				Por concepto de intereses causados y no pagados la suma de _____________________________ ($ ) moneda corriente
			</li>
			<li>
				Sobre las sumas del capital mencionadas en el numeral primero de este pagaré, 
				reconoceré / mos intereses de mora a la tasa máxima legalmente autorizadas.
			</li>
			<li>
				Autorizamos al COLEGIO COLOMBO HEBREO, o a quien represente sus derechos, para 
				que consulte mi/nuestra historia comercial y crediticia, además para que procese o divulgue 
				a cualquier central de riesgo o entidad que maneje o administre bases de datos con los 
				mismos fines para que reporte en las mismas el incumplimiento de la presente obligación; de 
				igual manera, expresamente autorizo/amos al COLEGIO COLOMBO HEBREO, o a quien 
				represente sus derechos, para llenar los espacios en blanco contenidos en este pagare; así 
				mismo, autorizo/amos al COLEGIO COLOMBO HEBREO para que a cualquier titulo endose 
				el presente pagare o ceda la obligación contenida en el a cualquier tercero sin necesidad de 
				su notificación. 
			</li>
			<li>
				Renunciamos a la presentación para el pago, al protesto.
			</li>
		</ol>

		<p>
			CIUDAD Y FECHA: ___________ _____DE _____________DE 20___.
		</p>

		<div class="container">
			<?php
    			if ($firma == 1 || $firma == 3) {
    			?>
    			<div class="col">
		    		<div class="form-group">
					    <label class="control-label">Nombres y Apellidos del otorgante deudor</label>
					    <?= $padres['papa']['nombre']?>
				  	</div>
				  	<div class="form-group">
					    <label class="control-label">C.C</label>
					    <span><?= $padres['papa']['CC']?></span>
				  	</div>
				  	<div class="form-group">
					    <label class="control-label">Dirección</label>
					    <span><?= $padres['papa']['direccion']?></span>
				  	</div>
				  	<div class="form-group">
					    <label class="control-label">Teléfono</label>
					    <span><?= $padres['papa']['telefono']?></span>
				  	</div>
				  	<div class="form-group">
					    <label class="control-label">Celular</label>
					    <span><?= $padres['papa']['celular']?></span>
				  	</div>
				  	<div class="form-group">
					    <label class="control-label">Email</label>
					    <span><?= $padres['papa']['email']?></span>
					    <br><br><br><br>
					  	<table style="margin-left:30px">
							<tr>
								<td class="firma"><strong>Firma del Deudor</strong></td>
							</tr>
						</table>
				  	</div>
			  	</div>

    			<?php	
    			}
			?>
			<?php
	    		if ($firma == 2 || $firma == 3) {
	    		?>
	    		<div class="col">
		    		<div class="form-group">
					    <label class="control-label">Nombres y Apellidos del otorgante deudor</label>
					    <?= $padres['mama']['nombre']?>
				  	</div>
				  	<div class="form-group">
					    <label class="control-label">C.C</label>
					    <span><?= $padres['mama']['CC']?></span>
				  	</div>
				  	<div class="form-group">
					    <label class="control-label">Dirección</label>
					    <span><?= $padres['mama']['direccion']?></span>
				  	</div>
				  	<div class="form-group">
					    <label class="control-label">Teléfono</label>
					    <span><?= $padres['mama']['telefono']?></span>
				  	</div>
				  	<div class="form-group">
					    <label class="control-label">Celular</label>
					    <span><?= $padres['mama']['celular']?></span>
				  	</div>
				  	<div class="form-group">
					    <label class="control-label">Email</label>
					    <span><?= $padres['mama']['email']?></span>
					    <br><br><br><br>
					  	<table>
							<tr>
								<td class="firma"><strong>Firma del Deudor</strong></td>
							</tr>
						</table>
				  	</div>
			  	</div>

    			<?php	
	    		}
			?>
		</div>
		

	</body>
</html>