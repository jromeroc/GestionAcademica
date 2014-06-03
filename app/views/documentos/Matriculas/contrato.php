<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<style>
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
		</style>
		<title> Doc. Contrato </title>
	</head>
		
	<body>
		<table class="encabezado">
   			<tr>
      			<td style="width:250px"><img id="img" src="http://colhebreo.dev/cch/CCH.jpg"/></td>
		    	<th>
		    		<p class="head">COLEGIO COLOMBO HEBREO</p>
    				<p class="head">PROCESO DE MATRICULA</p>
    				<p class="head">CONTRATO DE PRESTACION DE SERVICIOS EDUCATIVOS</p>
    			</th>
		    </tr>
		</table> 
            <p>
	            Entre los suscritos a saber <strong><?php echo $presidente ?></strong>. 
	            mayor de edad, plenamente capaz, e identificado con cédula de ciudadanía 
	            Nº '.$indentification.' de ciudad exp D.C., obrando como Representante Legal del 
	            <strong>COLEGIO COLOMBO HEBREO - BOGOTÁ D.C.</strong>, entidad sin ánimo de lucro, 
	            calendario B, con personería jurídica vigente y reconocida mediante la 
	            Resolución 1891 del 28 de junio de1958, expedida por el 
	            Ministerio de justicia y reforma estatutaria según resolución 
	            1578 del 04 de mayo de 2006 expedida por la Secretaría de 
	            Educación Distrital, identificada con el NIT No. 860.006.523-8 , 
	            que funciona actualmente en la Av. Calle 153 No 50 – 65  Suba, 
	            Cundinamarca y que para los efectos del presente contrato en adelante se 
	            denominará <strong>EL COLEGIO</strong>  o por quien legalmente le sustituya y 
	            <?php foreach($papas as $infopapa){echo $infopapa['nombre']." , "; } ?> en adelante <strong>LOS PADRES</strong>, identificados como aparece al
				pie de nuestras firmas, obrando como <strong>PADRES</strong> y/o acudientes de <?php foreach($hijos as $son) {echo $son['nombre']." del grado ". $son['grado'].", ";} ?>
				quien en lo sucesivo se denominará <strong>EL EDUCANDO</strong>. En cumplimiento de los artículos 26,27,67,68,69 y 70 de la Constitución 
				Nacional con el fin de asegurar el derecho a la educación; celebramos el presente 
				CONTRATO DE PRESTACIÓN DEL SERVICIO EDUCATIVO, el cual se regirá por las 
				siguientes cláusulas, y en lo no previsto en ellas, por las disposiciones establecidas en la Ley 
				General de Educación y en el Código Civil Colombiano, teniendo en cuenta que los artículos 
				95 y 201 de la Ley 115 de 1994 prescriben que la matrícula y su renovación constituyen un 
				contrato regulado por las normas del derecho privado.
			</p>
			
			<p>
				<strong>PRIMERA. -DEFINICIÓN DEL CONTRATO.</strong> El presente es un contrato de prestación de 
				servicios educativos que obedece a las disposiciones constitucionales y legales donde 
				se establece una responsabilidad compartida, en la cual concurren obligaciones de los 
				educadores, los <strong>PADRES</strong> de familia y los <strong>EDUCANDO</strong>s; obligaciones que son correlativas y 
				esenciales a la consecución del objeto y de los fines comunes, pues la educación es un 
				derecho- deber donde la exigencia de un derecho trae aparejado el cumplimiento de un 
				deber. El presente contrato formaliza la vinculación del (la) <strong>EDUCANDO</strong> al servicio educativo 
				que ofrece el <strong>COLEGIO COLOMBO HEBREO</strong>, en los términos de los artículos 95 y 201 
				de la Ley 115 de 1994. <strong>PARÁGRAFO</strong>. La naturaleza jurídica del presente contrato es de 
				carácter civil según lo estipulado en el artículo 201 de la Ley 115.
			</p>
			
			<p>
				<strong>SEGUNDA. - OBJETO DEL CONTRATO.</strong> El objeto del presente contrato es procurar la 
				formación integral del <strong>EDUCANDO</strong> mediante la recíproca complementación de esfuerzos del 
				mismo, de los padres o acudientes y del <strong>COLEGIO</strong> con la búsqueda del pleno desarrollo de 
				la personalidad del (la) estudiante y un rendimiento académico satisfactorio en el ejercicio del 
				programa curricular correspondiente al grado ____, aprobado por el Ministerio de Educación 
				Nacional, mediante el desarrollo del Proyecto Educativo Institucional del <strong>COLEGIO</strong> y el 
				cumplimiento de su Manual de Convivencia.
			</p>
			
			<p>
				<strong>TERCERA -TÉRMINO.</strong> El presente contrato tiene vigencia para el período del año lectivo 
				'.$yearLectivo.' y su ejecución será sucesiva por períodos mensuales.
			</p>
			
			<p>
				<strong>CUARTA. -COSTO DEL SERVICIO EDUCATIVO.</strong> El presente contrato tiene una tarifa
				educativa anual para el grado __________ de __________
				$ ____________________, los cuales serán cancelados por los padres de familia o 
				acudientes de la siguiente manera: a) por concepto de matrícula la suma de 
				____________________ $ ____________________, la que será 
				cancelada en el momento de la firma de este contrato; b) El dinero restante por 
				un monto de ____________________ pesos $ ____________________, 
				comprenderá la pensión escolar y será pagadero en diez (10) cuotas mensuales de 
				________________________ pesos $ ____________________, cada una de las cuales 
				será pagada dentro de los cinco (5) primeros días de cada mes. Además una cuota única 
				anual de ____________________ $ ____________________, por concepto de otros costos.
			</p>
			
			<p class="paragrafo">
				<strong>PARÁGRAFO PRIMERO. RETARDO EN PAGOS O INCUMPLIMIENTO:</strong> En caso de 
				mora en los pagos, los padres o acudientes del (la) estudiante beneficiario(a) reconocerán 
				intereses mensuales a la tasa máxima legal permitida sobre el valor del saldo no pagado 
				los cuales se causarán después de la fecha límite de pago de cada cuota y deberán ser 
				cancelados en el mes siguiente a pagar. En caso de incumplimiento en el pago de una o más 
				de las sumas estipuladas o por terminación del presente contrato, los padres o acudientes 
				se declaran y aceptan ser deudores del <strong>COLEGIO</strong>,</strong> quien podrá declarar insubsistentes los 
				plazos de esta obligación o de las cuotas que constituyan el saldo y exigir su pago inmediato 
				judicial o extrajudicialmente en aplicación del procedimiento establecido por la institución 
				educativa para el cobro de cartera morosa, quedando obligados los padres o acudientes 
				autorizados a asumir el valor correspondiente por los costos judiciales a que hubiere lugar, 
				así como a los honorarios legales correspondientes.
			</p>

			<p class="paragrafo">
				<strong>PARÁGRAFO SEGUNDO. – CONSTITUCIÓN EN MORA:</strong> para los efectos del presente 
				parágrafo <strong>LOS PADRES</strong> manifiestan expresamente que renuncian a cualquier trámite 
				extrajudicial o judicial para constituirse en mora, la cual se tendrá por constituida con el 
				simple retardo en el pago de las obligaciones pecuniarias a su cargo y sin requerimiento 
				alguno.
			</p>

			<p class="paragrafo">
				<strong>PARAGRAFO TERCERO. -AUSENCIAS TEMPORALES O DEFINITIVAS:</strong> La ausencia del 
				(la) estudiante beneficiario(a), en forma temporal o total dentro del mes por enfermedad, por 
				causa fortuita o fuerza mayor, no dará el derecho al aquí comprometido a descontar suma 
				alguna de lo obligado a pagar o a que el <strong>COLEGIO</strong> haga devoluciones o abonos posteriores.
			</p>
			
			<p>
				<strong>QUINTA. - RESPONSABILIDAD PERSONAL. LOS PADRES</strong> de familia o acudientes
				autorizados, declaran que conocen y aceptan que las obligaciones de tipo económico 
				que adquieren con el <strong>COLEGIO,</strong> las adquieren a título personal como responsables de 
				la educación de su hijo(a), en el libre ejercicio del derecho a elegir para el/ella el tipo de 
				educación de acuerdo a sus creencias y posibilidades, y por tanto no será argumento para 
				buscar judicialmente la exoneración del pago de lo debido, impetrando el mecanismo judicial 
				de la Tutela por medio de su hijo(a) beneficiario(a) del servicio contratado, invocando el 
				derecho a la educación y la prevalecía de los derechos de los menores. Así mismo declaran 
				y aceptan que en caso de presentarse situaciones económicas difíciles que les impidan 
				costear el servicio que ofrece la institución educativa, acudirán a buscar alternativas para el 
				pago de las obligaciones económicas adquiridas con la Institución, evitando el detrimento 
				patrimonial del <strong>COLEGIO</strong> y la consecuente afectación de la calidad del servicio educativo 
				que éste presta.
			</p>
			
			<p>
				<strong>SEXTA. - DERECHOS Y OBLIGACIONES ESENCIALES DEL CONTRATO.</strong> En 
				cumplimiento de las normas vigentes para el servicio educativo, el Decreto 1286 de 2005, 
				La ley 1098 del 2006 Ley de Infancia y Adolescencia y el Decreto 1290 del 2009 sobre el 
				Sistema de Evaluación y Promoción; los padres tienen los siguientes derechos y deberes 
				además de los contemplados en el Manual de Convivencia:
			</p>

			<p>
				DERECHOS Y OBLIGACIONES DE LOS <strong>PADRES</strong> O ACUDIENTES AUTORIZADOS. En 
				cumplimiento de las normas vigentes para el servicio educativo y en concordancia con el 
				objeto del presente contrato, los padres tienen los siguientes derechos:
				<ol type="a">
					<li> 
						Elegir el tipo de educación que de acuerdo con sus convicciones, procure el desarrollo
						integral de su hijo(a), de acuerdo con la Constitución y con la Legislación Nacional.
					</li>
					<li> 
						Recibir información sobre <strong>EL COLEGIO</strong> y que este se encuentre debidamente autorizado 
						para prestar el servicio educativo.</li>
					<li> 
						Conocer con anticipación o en el momento de la matrícula las características del 
						<strong>COLEGIO,</strong> los principios que orientan el proceso educativo institucional, el manual de 
						convivencia, el plan de estudios, las estrategias pedagógicas básicas, el sistema de 
						evaluación escolar y el plan de mejoramiento institucional.</li>
					<li> 
						Exigir la regular prestación del servicio.
					</li>
					<li>	
						Exigir el cumplimiento del PROYECTO EDUCATIVO INSTITUCIONAL.
					</li>
					<li> 
						Participar en el proceso educativo que desarrolle <strong>EL COLEGIO</strong> y en especial, en la 
						construcción, ejecución y modificación del proyecto educativo institucional.
					</li>
					<li> 
						Expresar de manera respetuosa y por conducto regular sus opiniones respecto del 
						proceso educativo de su hijo(a), y sobre el grado de idoneidad del personal docente y 
						directivo del <strong>COLEGIO</strong>
					</li>
					<li> 
						Recibir respuesta suficiente y oportuna a sus requerimientos sobre la marcha del 
						<strong>COLEGIO</strong> y sobre los asuntos que afecten particularmente el proceso educativo de su 
						hijo(a).
					</li>
					<li>
						Recibir durante el año escolar y en forma periódica, información sobre el rendimiento 
						académico y el comportamiento de su hijo(a).
						</li>
					<li> 
						Conocer información sobre el resultado de las pruebas de evaluación de la calidad del 
						servicio educativo.
					</li>
					<li> 
						Elegir y ser elegido para representar a los padres de familia en los órganos de gobierno 
						escolar y ante las autoridades públicas, en los términos previstos en la Ley General de 
						Educación y sus decretos Reglamentarios.
					</li>
					<li> 
						Ejercer el derecho de asociación con el propósito de mejorar los procesos educativos, 
						la capacitación de los padres en los asuntos que atañen a la mejor educación y el 
						desarrollo armónico de su hijo(a).
					</li>
					<li> 
						Conocer el Sistema Institucional de Evaluación así como los criterios, procedimientos e 
						instrumentos de evaluación y promoción de conformidad con el Decreto 1290 de 2009.
					</li>
					<li> 
						Acompañar el proceso evaluativo del <strong>EDUCANDO</strong>.</strong>
					</li>
					<li> 
						Recibir oportunamente respuestas a las inquietudes y solicitudes presentadas sobre el 
						proceso de evaluación de sus hijos(as).
					</li>
				</ol>
			</p>

			<p>
				Así mismo <strong>LOS PADRES</strong> o acudientes autorizados contraen <strong>LAS SIGUIENTES OBLIGACIONES:</strong>
				<ol type="a">
					<li> 
						Matricular al <strong>EDUCANDO</strong> en los días y horas señalados para ello en cada período 
						académico, previo el cumplimiento de los requisitos exigidos por el <strong>COLEGIO</strong> para el 
						caso.
					</li>
					<li> 
						Pagar estricta y cumplidamente los costos mensuales del servicio educativo.
					</li>
					<li> 
						Cumplir con las obligaciones contraídas en el presente contrato y en el manual de 
						convivencia, para facilitar el proceso educativo.
					</li>
					<li> 
						Contribuir en la construcción de un clima de respeto, tolerancia y responsabilidad mutua 
						que favorezca la educación de su hija y la mejor relación entre los miembros de la 
						comunidad educativa.
					</li>
					<li> 
						Comunicar oportunamente y en primer lugar a las autoridades del <strong>COLEGIO</strong> las 
						irregularidades de que tenga conocimiento, entre otras, en relación con el maltrato 
						infantil, abuso sexual, tráfico o consumo de drogas ilícitas
					</li>
					<li> 
						Apoyar al <strong>COLEGIO</strong> en el desarrollo de las acciones que conduzcan al mejoramiento 
						del servicio educativo y que eleven la calidad de los aprendizajes, especialmente en la 
						formulación y desarrollo de los planes de mejoramiento institucional
					</li>
					<li> 
						Velar por el progreso del <strong>EDUCANDO</strong> beneficiario(a) en todos los órdenes, en contacto 
						permanente con el <strong>COLEGIO</strong>. 
					</li>
					<li> 
						Cumplir estrictamente las citas y los llamados que hagan las directivas del <strong>COLEGIO</strong>.</strong>
					</li>
					<li> 
						Tener vigente la vinculación del (la) estudiante a una EPS o al seguro escolar con las 
						especificaciones de donde ser remitido por el <strong>COLEGIO</strong> en caso de sufrir enfermedad o 
						accidente dentro de la jornada de estudio.
					</li>
					<li> 
						En caso de que el <strong>EDUCANDO</strong> haya sido medicado/a, los <strong>PADRES</strong> de familia o 
						acudientes autorizados son los responsables de suministrar el tratamiento y medicina 
						indicada, junto con la prescripción médica. 
					</li>
					<li> 
						Asumir los costos de tratamientos especializados de psicología que requiera el (la) 
						estudiante beneficiario(a), ante la valoración que haga el <strong>COLEGIO</strong> de la necesidad de 
						tratamiento.
					</li>
					<li> 
						Asumir los costos extras e imprevistos que fortuitamente resulten, el costo de los daños 
						ocasionados a personas, cosas o a la planta física del <strong>COLEGIO</strong> por el <strong>EDUCANDO</strong> </strong>
						beneficiario(a),
					</li>
					<li> 
						Asumir el veinte por ciento 20% del importe del cheque no pagado y librado por los 
						<strong>PADRES</strong> a favor del <strong>COLEGIO</strong> por concepto de sanción comercial de acuerdo a las 
						condiciones del artículo 731 del código de comercio.
					</li>
					<li> 
						Asumir las sumas de dinero correspondientes a talleres y cursos extracurriculares y 
						demás actividades las cuales los <strong>PADRES</strong> autoricen, deban pagar y que no comprenden 
						el valor del presente contrato. .
					</li>
					<li> 
						Conocer y respetar la filosofía institucional acatando las normas contenidas en el Manual 
						de Convivencia, en los procesos, procedimientos y reglamentos internos.
					</li>
					<li> 
						Contribuir para que el proceso educativo sea armónico con el ejercicio del derecho a la 
						educación y en cumplimiento de sus fines legales y sociales
					</li>
					<li> 
						Acompañar el proceso educativo en cumplimiento de su responsabilidad como primeros 
						educadores de sus hijos, para mejorar la orientación personal y el desarrollo de valores 
						ciudadanos
					</li>
					<li> 
						Participar en el proceso de auto - evaluación anual del establecimiento educativo.
					</li>
					<li> 
						Participar, a través de las instancias del gobierno escolar, en la definición de criterios y 
						procedimientos de la evaluación del aprendizaje de las estudiantes y promoción escolar 
						de conformidad con lo establecido por el Decreto 1290 de 2009.
						</li>
					<li> 
						Realizar seguimiento permanente al proceso evaluativo de sus hijos.
					</li>
					<li> 
						Analizar los informes periódicos de evaluación.
					</li>
					<li> 
						Conocer los planes y programas establecidos mediante el PROYECTO EDUCATIVO 
						INSTITUCIONAL.
					</li>
				</ol>
			</p>

			<p>
				<strong>DERECHOS Y OBLIGACIONES DEL EDUCANDO BENEFICIARIO(A).</strong> En cumplimiento de 
				las normas vigentes para el servicio educativo y en concordancia con el objeto del presente 
				contrato, el (la) estudiante beneficiario(a) tiene los derechos y deberes contemplados en el 
				Manual de Convivencia.
			</p>

			<p>
				<strong>DERECHOS Y OBLIGACIONES DEL COLEGIO</strong>. En cumplimiento de las normas vigentes
				para el servicio educativo y en concordancia con el objeto del presente contrato, el <strong>COLEGIO</strong> 
				tiene los siguientes derechos:

				<ol type="a">
					<li>
						Exigir el cumplimiento del Manual de Convivencia, de los procesos, procedimientos 
						y reglamentos internos por parte de los <strong>PADRES</strong> DE FAMILIA, ACUDIENTES 
						AUTORIZADOS Y ESTUDIANTES y de los deberes que derivan del servicio.
					</li>
					<li>
						Exigir a los <strong>PADRES</strong> DE FAMILIA Y ACUDIENTES AUTORIZADOS el cumplimiento de 
						sus obligaciones como responsables del <strong>EDUCANDO</strong>.
					</li>
					<li>
						Recuperar los costos incurridos en los servicios y a exigir y lograr el pago de los derechos 
						correspondientes a matrícula, pensión y otros cobros, por todos los medios lícitos a su 
						alcance, quedando facultado para realizar cobro prejurídico y jurídico, con fundamento 
						en el contrato y haciendo uso del título valor pagaré, firmado por los <strong>PADRES</strong> Y/O 
						ACUDIENTES AUTORIZADOS simultáneamente con este documento.
					</li>
					<li>
						Teniendo en cuenta que el <strong>COLEGIO</strong> es una institución educativa de carácter PRIVADO 
						no obstante prestar el SERVICIO PÚBLICO DE EDUCACIÓN tendrá derecho a exigir 
						la efectividad de sus derechos e intereses y el respeto por el equilibrio y la ecuación 
						Contractual.
					</li>
					<li>
						Reservarse el derecho de no renovación del presente contrato (la matrícula) 
						según estipulaciones del Reglamento o Manual de Convivencia y por razones de 
						comportamiento, rendimiento, por el no pago en las obligaciones contractuales a que da 
						lugar el presente contrato o por el incumplimiento del mismo.
					</li>
					<p>	
						Así mismo el <strong>COLEGIO</strong> se obliga a:
					</p>
						<ol type="a">
							<li>
								Ofrecer una educación integral de acuerdo con los fines de la educación colombiana, 
								los lineamientos del Ministerio de Educación Nacional y el ideario del Proyecto 
								Educativo Institucional
							</li>
							<li>
								Desarrollar los planes y programas establecidos mediante el PROYECTO 
								EDUCATIVO INSTITUCIONAL.
							</li>
							<li>
								Cumplir y exigir el cumplimiento del Reglamento o Manual de Convivencia
							<li>
								Prestar en forma continua y cualificada el servicio educativo contratado dentro de las 
								prescripciones legales
							</li>
						</ol>
					</li>
				</ol>
			</p>

			<p>
				<strong>SÉPTIMA- CAUSALES DE TERMINACIÓN DEL CONTRATO.</strong> El presente contrato, 
				terminará además de las razones contempladas en el PROYECTO EDUCATIVO 
				INSTITUCIONAL y el Reglamento o Manual de Convivencia por una de las siguientes 
				causas:
				<ol type="a">
					<li>
						Por culminación de las áreas correspondientes al grado académico por parte del 
						estudiante
					</li>
					<li>
						Por mutuo consentimiento de las partes
					</li>
					<li>	
						Por muerte del(la) estudiante o fuerza mayor
					</li>
					<li>	
						Por suspensión de actividades del <strong>COLEGIO COLOMBO HEBREO</strong> por más de sesenta 
						(60) días o por clausura definitiva del establecimiento educativo
					</li>
					<li>	
						Por retraso en el pago oportuno de pensiones a discreción de la institución.
					</li>
					<li>	
						Por sanción que sea aplicada como consecuencia del bajo rendimiento académico y 
						disciplinario, imputable a el (la) estudiante beneficiario(a) o a sus padres o acudientes 
						autorizados.
					</li>
					<li>	
						Si como consecuencia del no suministro de tratamiento o medicinas, el (la) estudiante 
						presenta bajo rendimiento académico y/o disciplinario que le impida lograr los objetivos del 
						programa curricular, esta situación será causal de terminación del contrato de prestación 
						de servicios educativos por parte del establecimiento educativo.
					</li>
					<li>	
						Por incumplimiento de cualquiera de las obligaciones aquí estipuladas, por las causales 
						determinadas en el Reglamento o Manual de Convivencia.
					</li>
				</ol>
			</p>

			<p class="paragrafo">
				<strong>PARÁGRAFO:</strong> En caso de retiro de un <strong>EDUCANDO</strong> antes de finalizar el ciclo académico.
				EL <strong>COLEGIO</strong> no está obligado a devolver dinero por concepto de matrícula. En cuanto a 
				pensiones pagadas por anticipado EL <strong>COLEGIO</strong> devolverá el dinero correspondiente a los 
				meses no tomados y según lo estipulado en el presente contrato.
			</p>

			<p>
				<strong>OCTAVA. - PRORROGA</strong> Para el presente contrato no operará prórroga automática del 
				mismo, es independiente para cada programa curricular la celebración de un nuevo contrato 
				y el <strong>COLEGIO</strong> se reserva el derecho a celebrar un nuevo contrato a la terminación de cada 
				año lectivo de acuerdo a la evaluación que se haga del desempeño académico y disciplinario 
				de cada uno(a) de los (las) estudiantes, y del cumplimiento de las responsabilidades 
				contraídas por los padres y acudientes debidamente autorizados.
			</p>

			<p>
				<strong>NOVENA. - AUTORIZACIÓN.</strong> Los <strong>PADRES</strong> Y/O ACUDIENTES autorizan, expresamente 
				al <strong>COLEGIO</strong>, para que con fines estadísticos de control, supervisión y de información 
				comercial, consulte, reporte, procese y divulgue a la entidad que maneje bases de datos con 
				los mismos fines, el nacimiento, manejo, modificación y extinción de obligaciones contraídas 
				con anterioridad o a través del presente contrato con el <strong>COLEGIO</strong> o derivadas del mismo, 
				con los sectores comercial y financiero.
			</p>

			<p>
				<strong>DECIMA. -CERTIFICADOS Y CONSTANCIAS.</strong> Los padres de familia o acudientes, podrán
				solicitar al <strong>COLEGIO</strong> que se expidan certificados y constancias sobre el (la) estudiante 
				beneficiario(a), lo cual se hará por el <strong>COLEGIO</strong> dentro de los dos (2) días siguientes a la 
				solicitud, siempre y cuando se paguen los derechos de expedición de los mismos y no exista 
				retardo o incumplimiento en el pago de los costos educativos pactados en este contrato. 
				(Sentencia SU 624 de 1999). En el evento de que termine el año lectivo y los padres de
				familia o acudiente no están a Paz y Salvo por todo con el <strong>COLEGIO</strong>, éste puede negarse a 
				la renovación del contrato.
			</p>

			<p>
				<strong>DÉCIMA PRIMERA. – DECLARACIONES: Los padres</strong> o acudientes nos declaramos 
				en capacidad de pago y aceptamos las tarifas establecidas, así mismo declaramos que 
				aceptamos las directrices generales planteadas dentro del PEI del COLEGIO donde se 
				proyecta como una de las instituciones con más alta calidad a nivel nacional que está en 
				constante innovación, preparando a sus alumnos para ser líderes competentes en una 
				sociedad globalizada en el marco de la excelencia académica y ética siempre bajo los 
				valores de la formación y vivencias judaicas, deseamos expresa y conscientemente que 
				nuestro(a) hijo(a) o acudido(a) así sea formado(a) (art. 68 C.N.)
			</p>

			<p>
				<strong>DECIMA SEGUNDA. - MERITO EJECUTIVO.</strong> Para todos los efectos legales el presente
				contrato presta mérito ejecutivo con su sola presentación.
			</p>

			<p>
				Para constancia se firma en __________ a los _______ días del mes de 
				____________________ de ________________, en dos ejemplares del mismo tenor.
			</p>

			<p>
				Para constancia se firma en Bogotá a los <?php echo date('d'); ?> días del mes de 
				<?php echo date('M'); ?> de ________________, en dos ejemplares del mismo tenor.
			</p>

			<table class="padres">
				<?php foreach($papas as $infopapa){ ?>
				<tr>
					<td class="firma"><strong>PADRE O ACUDIENTE</strong></td>
					<td> </td>
					<td class="firma"><strong>MADRE O ACUDIENTE</strong></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td><strong>C.C</strong> <?php ?></td>
					<td></td>
					<td><strong>C.C</strong><?php ?></td>
				</tr>

				<tr>
					<td><strong>DIRECCIÓN</strong> <?php ?></td>
					<td></td>
					<td><strong>DIRECCIÓN</strong> <?php ?></td>
				</tr>

				<tr>
					<td><strong>TELÉFONO</strong> <?php ?></td>
					<td></td>
					<td><strong>TELÉFONO</strong> <?php ?></td>
				</tr>

				<tr>
					<td><strong>CELULAR</strong> <?php ?></td>
					<td></td>
					<td><strong>CELULAR</strong> <?php ?></td>
				</tr>

				<tr>
					<td><strong>E-MAIL</strong> <?php ?></td>
					<td></td>
					<td><strong>E-MAIL</strong> <?php ?></td>
				</tr>
			<?php } ?>
			</table>



			<table class="firmas">
			<tr>
				<td class="firma"><strong>NOMBRE ASESOR DE MATRICULA</strong></td>
				<td></td>	
				<td class="firma"><strong>ESTUDIANTE</strong></td>
			</tr>
			</table>

			<table class="cch">
			<tr>
				<td class="firma"><strong>COLEGIO COLOMBO HEBREO</strong></td>
			</tr>
			<tr>
				<td><strong>REPRESENTANTE LEGAL</strong></td>
			</tr>
			</table>
        </body>
    </html>