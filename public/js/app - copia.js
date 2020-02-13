// Var Globales
var arrayDeCadenas;
var materia;
var tds;
var option;
var grupo;
var materia;

var valAnterior;
var valAnterior2;

$('#input-excel').change(function (e) {
	$("#wrapper").children().remove();
	var reader = new FileReader();
	reader.readAsArrayBuffer(e.target.files[0]);
	reader.onload = function (e) {
		var data = new Uint8Array(reader.result);
		var wb = XLSX.read(data, { type: 'array' });
		var htmlstr = XLSX.write(wb, { sheet: "Hoja1", type: 'binary', bookType: 'html' });
		$('#wrapper')[0].innerHTML += htmlstr;
	}

});


$('#cMateria').on('click', function () {
	$('#wrapper tbody tr').each(function () {
		var tds1 = $(this).find('td');
		var dato = tds1.filter(":eq(0)").text();;
		dat = '<option value="' + dato + '">' + dato + '</option>';

		$("#comboBoxMaterias").append(dat);
	})
});

$('#comboBoxMaterias').change(function () {
	$("#tablaAux").children().remove();
	var cod = document.getElementById("comboBoxMaterias").value;
	$('#wrapper tbody tr').each(function () {
		tds = $(this).find('td');
		var dato = tds.filter(":eq(0)").text();

		if (cod == dato) {
			materia = dato;
			$("#list1").remove();
			$("#list2").remove();
			dat =
				`<div class="col-12 col-md-6" id="list1">
					<ul class="list-unstyled">
						<li class="font-weight-bold" id=""clave>Clave: ${tds.filter(":eq(1)").text()}</li>
						<li class="font-weight-bold">Inscritos Actualmente: ${tds.filter(":eq(11)").text()}</li>
						<li class="font-weight-bold">Indice de reprobados: ${tds.filter(":eq(8)").text()}</li>
						<li class="font-weight-bold">Materia requisito 1: ${tds.filter(":eq(2)").text()}</li>
						<li class="font-weight-bold">Materia requisito 2: ${tds.filter(":eq(3)").text()}</li>

					</ul>
				</div>
				<div class="col-12 col-md-6" id="list2">
					<ul class="list-unstyled">
						<li class="font-weight-bold">Inscritos Materia Requisito 1: ${tds.filter(":eq(9)").text()}</li>
						<li class="font-weight-bold">Inscritos Materia Requisito 2: ${tds.filter(":eq(10)").text()}</li>
						<li class="font-weight-bold">Computación: ${tds.filter(":eq(5)").text()}</li>
						<li class="font-weight-bold">Informatica: ${tds.filter(":eq(6)").text()}</li>
						<li class="font-weight-bold">Sistemas Inteligentes: ${tds.filter(":eq(7)").text()}</li>

					</ul>
				</div>
				`;
			$("#divTablaAux").append(dat);

			option = tds.filter(":eq(4)").text();
			grupo = tds.filter(":eq(1)").text();
			switch (option) {
				case "1":
					$("#caso").remove();
					campo = '<h4 id="caso" class="text-center"> Nuevo Ingreso </h4>';
					$("#captura").append(campo);
					caso1html(tds);
					break;
				case "2":
					$("#caso").remove();
					campo = '<h4 id="caso" class="text-center"> Aprobar Materia Anterior Ligada </h4>';
					$("#captura").append(campo);
					caso2html(tds);
					break;
				case "3":
					$("#caso").remove();
					campo = '<h4 id="caso" class="text-center"> Sin Materia Requisito </h4>';
					$("#captura").append(campo);
					caso3html(tds);
					break;
				case "4":
					$("#caso").remove();
					campo = '<h4 id="caso" class="text-center"> Aprobar 2 Materias Anteriores Ligadas </h4>';
					$("#captura").append(campo);
					caso4html(tds);
					break;
				case "5":
					$("#caso").remove();
					campo = '<h4 id="caso" class="text-center"> Aprobar Calcúlo D </h4>';
					$("#captura").append(campo);
					caso3html(tds);
					break;
				case "6":
					$("#caso").remove();
					campo = '<h4 id="caso" class="text-center"> Aprobar 2 Materias Anteriores Ligadas, Materia Optativa</h4>';
					$("#captura").append(campo);
					caso4html(tds);
					break;
				case "7":
					$("#caso").remove();
					campo = '<h4 id="caso" class="text-center"> Sin Materia Requisito, Materia Optativa </h4>';
					$("#captura").append(campo);
					caso3html(tds);
					break;
				case "8":
					$("#caso").remove();
					campo = '<h4 id="caso" class="text-center"> Aprobar Materia Anterior Ligada, Materia Optativa </h4>';
					$("#captura").append(campo);
					caso2html(tds);
					break;

				default:

			}
		}
	});

});


function caso1html(tds) {
	$("#chale").remove();
	$("#chale2").remove();
	$("#chale3").remove();
	$("#chale4").remove();

	campo =
		'<div class="row mt-3" id="chale">' +
		'<div class="col-12 col-md-6">' +

		'<div id="dato2" class="form-group">' +
		'<div class="p-1 mb-1 bg-info">' +
		'<label for="asesoria">Alumnos de Nuevo Ingreso</label>' +
		'<input type="text" class="form-control" id="asesoria"' +
		'</div>' +
		'</div>' +
		'<div id="dato3" class="form-group mt-3">' +
		'<div class="p-1 mb-1 bg-info">' +
		'<label for="iActual">Inscritos actualmente</label>' +
		'<input type="text" class="form-control" id="iActual"' +
		'</div>' +
		'</div>' +
		'</div>' +
		'</div>';
	$("#captura").append(campo);

	campo2 =
		'<div class="col-12 col-md-6" id="chale2">' +
		'<div id="dato4" class="form-group">' +
		'<div class="p-1 mb-1 bg-info">' +
		'<label for="iRepA">% de Reprobados</label>' +
		'<input type="text" class="form-control" id="iRepA" ' +
		'</div>' +
		'</div>' +
		'<div id="dato8" class="form-group mt-3">' +
		'<div class="p-1 mb-1 bg-info">' +
		'<label for="iCupo">Cupo Máximo por Salón</label>' +
		'<input type="text" class="form-control" id="iCupo" ' +
		'</div>' +
		'</div>'
	'</div>'
		;
	$("#chale").append(campo2);

	$("#materia").val(tds.filter(":eq(0)").text());
	$("#iActual").val(tds.filter(":eq(11)").text());
	$("#iRepA").val(tds.filter(":eq(8)").text());
}

function caso2html(tds) {
	$("#chale").remove();
	$("#chale2").remove();
	$("#chale3").remove();
	$("#chale4").remove();


	campo = `<div class="row mt-1" id="chale">
				<div class="col-12 col-md-3">
				    <div id="dato2" class="form-group">
						<div class="p-1 mb-1 bg-info">
							<label for="asesoria">Alumnos por asesoria</label>
							<input type="text" class="form-control" id="asesoria"
						</div>
					</div> 
				</div>
			</div>`

	$("#captura").append(campo);

	campo =	`<div class="row mt-1" id="chale2">
				<div class="col-12 col-md-3">
					<div id="dato3" class="form-group mt-1">
						<div class="p-1 mb-1 bg-info">
							<label for="iActual">Inscritos actualmente</label>
							<input type="text" class="form-control" id="iActual"
						</div>
					</div>
				</div>
			</div>`
	$("#captura").append(campo);		

	campo =`<div class="col-12 col-md-1">
				<div class="mt-3 text-center">
					<label class="font-weight-bold h3"> + </label>
				</div>
			</div>`
	$("#chale2").append(campo);		

	campo =`<div class="col-12 col-md-3">
		<div id="dato4" class="form-group mt-1">
			<div class="p-1 mb-1 bg-info">
				<label for="iRepA">% de Reprobados</label>
				<input type="text" class="form-control" id="iRepA"
			</div>
		</div>
	</div>`
	$("#chale2").append(campo);	

	campo =`<div class="col-12 col-md-1">
		<div class="mt-3 text-center">
			<label class="font-weight-bold h3"> = </label>
		</div>
	</div>`
	$("#chale2").append(campo);		

	campo =`<div class="col-12 col-md-3">
		<div id="dato7" class="form-group">
			<div class="p-1 mb-1 bg-info">
				<label for="res1">1° Resultado</label>
				<input type="text" class="form-control" id="res1"
			</div>
		</div>
	</div>`
	$("#chale2").append(campo);	

	campo =	`<div class="row mt-1" id="chale3">
				<div class="col-12 col-md-3">
					<div id="dato6" class="form-group">
						<div class="p-1 mb-1 bg-info">
							<label for="iIMReq">Incritos Materia Requisito</label>
							<input type="text" class="form-control" id="iIMReq"
						</div>
					</div>
				</div>
			</div>`
	$("#captura").append(campo);		
	
	campo =`<div class="col-12 col-md-1">
		<div class="mt-3 text-center">
			<label class="font-weight-bold h3"> + </label>
		</div>
	</div>`
	$("#chale3").append(campo);	

	campo =`<div class="col-12 col-md-3">
					<div id="dato7" class="form-group">
						<div class="p-1 mb-1 bg-info">
							<label for="iMReqA">% Exito Materia Requisito</label>
							<input type="text" class="form-control" id="iMReqA"
						</div>
					</div>
				</div>`
	$("#chale3").append(campo);		

	campo =`<div class="col-12 col-md-1">
		<div class="mt-3 text-center">
			<label class="font-weight-bold h3"> = </label>
		</div>
	</div>`
	$("#chale3").append(campo);		

	campo =`<div class="col-12 col-md-3">
		<div id="dato7" class="form-group">
			<div class="p-1 mb-1 bg-info">
				<label for="res2">2° Resultado</label>
				<input type="text" class="form-control" id="res2"
			</div>
		</div>
	</div>`
	$("#chale3").append(campo);		

	campo =`<div class="row mt-1" id="chale4">
				<div class="col-12 col-md-3">
					<div id="dato8" class="form-group">
						<div class="p-1 mb-1 bg-info">
							<label for="iCupo">Cupo Máximo por Salón</label>
							<input type="text" class="form-control" id="iCupo"
						</div>
					</div>
				</div>
			</div>`;
	$("#captura").append(campo);	



	$("#materia").val(tds.filter(":eq(0)").text());
	$("#iMReq").val(tds.filter(":eq(2)").text());
	$("#iActual").val(tds.filter(":eq(11)").text());
	$("#iIMReq").val(tds.filter(":eq(9)").text());
	$("#iRepA").val(tds.filter(":eq(8)").text());

	var dato1 = $("#iActual").val();
	var dato2 = $("#iRepA").val();
	var res = dato1 * (dato2 / 100);
	$("#res1").val(res);         

	dato1 = $("#iIMReq").val();
	dato2 = $("#iMReqA").val();
	res = dato1 * (dato2 / 100);
	$("#res2").val(res);    

	valAnterior = $("#iRepA").val();
	valAnterior2 = $("#iMReqA").val();

}

function caso3html(tds) {
	$("#chale").remove();
	$("#chale2").remove();
	$("#chale3").remove();
	$("#chale4").remove();
	campo =
		'<div class="row mt-3" id="chale">' +
		'<div class="col-12 col-md-6">' +

		'<div id="dato2" class="form-group">' +
		'<div class="p-1 mb-1 bg-info">' +
		'<label for="asesoria">Alumnos Por Asesoria</label>' +
		'<input type="text" class="form-control" id="asesoria"' +
		'</div>' +
		'</div>' +
		'<div id="dato3" class="form-group mt-3">' +
		'<div class="p-1 mb-1 bg-info">' +
		'<label for="iActual">Inscritos actualmente</label>' +
		'<input type="text" class="form-control" id="iActual"' +
		'</div>' +
		'</div>' +
		'</div>' +
		'</div>';
	$("#captura").append(campo);

	campo2 =
		'<div class="col-12 col-md-6" id="chale2">' +
		'<div id="dato4" class="form-group">' +
		'<div class="p-1 mb-1 bg-info">' +
		'<label for="iRepA">% de Reprobados</label>' +
		'<input type="text" class="form-control" id="iRepA" ' +
		'</div>' +
		'</div>' +
		'<div id="dato8" class="form-group mt-3">' +
		'<div class="p-1 mb-1 bg-info">' +
		'<label for="iCupo">Cupo Máximo por Salón</label>' +
		'<input type="text" class="form-control" id="iCupo" ' +
		'</div>' +
		'</div>'
	'</div>'
		;
	$("#chale").append(campo2);

	$("#materia").val(tds.filter(":eq(0)").text());
	$("#iActual").val(tds.filter(":eq(11)").text());
	$("#iRepA").val(tds.filter(":eq(8)").text());
}

function caso4html(tds) {
	$("#chale").remove();
	$("#chale2").remove();
	$("#chale3").remove();
	$("#chale4").remove();


	campo = '<div class="row mt-3" id="chale">' +
		'<div class="col-12 col-md-3">' +

		'<div id="dato2" class="form-group">' +
		'<div class="p-1 mb-1 bg-info">' +
		'<label for="asesoria">Alumnos por asesoria</label>' +
		'<input type="text" class="form-control" id="asesoria"' +
		'</div>' +
		'</div>' +

		'<div id="dato3" class="form-group mt-3">' +
		'<div class="p-1 mb-1 bg-info">' +
		'<label for="iActual">Inscritos actualmente</label>' +
		'<input type="text" class="form-control" id="iActual"' +
		'</div>' +
		'</div>' +

		'</div>'
	'</div>';
	$("#captura").append(campo);

	campo2 =
		'<div class="col-12 col-md-3" id="chale2">' +
		'<div id="dato4" class="form-group">' +
		'<div class="p-1 mb-1 bg-info">' +
		'<label for="iRepA">% de Reprobados</label>' +
		'<input type="text" class="form-control" id="iRepA" ' +
		'</div>' +
		'</div>' +


		'<div id="dato6" class="form-group mt-3">' +
		'<div class="p-1 mb-1 bg-info">' +
		'<label for="iIMReq">Inscritos  Materia Requisito 1</label>' +
		'<input type="text" class="form-control" id="iIMReq"' +
		'</div>' +
		'</div>'
	'</div>';
	$("#chale").append(campo2);

	campo3 = '<div class="col-12 col-md-3" id="chale3">' +
		'<div id="dato7" class="form-group">' +
		'<div class="p-1 mb-1 bg-info">' +
		'<label for="iMReqA">% Exito Materia Requisito 1</label>' +
		'<input type="text" class="form-control" id="iMReqA" ' +
		'</div>' +
		'</div>' +

		'<div id="dato10" class="form-group mt-3">' +
		'<div class="p-1 mb-1 bg-info">' +
		'<label for="iIMReq2">Inscritos  Materia Requisito 2</label>' +
		'<input type="text" class="form-control" id="iIMReq2"' +
		'</div>' +
		'</div>' +

		'</div>'
		;
	$("#chale").append(campo3);

	campo4 = '<div class="col-12 col-md-3" id="chale4">' +
		'<div id="dato11" class="form-group">' +
		'<div class="p-1 mb-1 bg-info">' +
		'<label for="iMReqA2">% Exito Materia Requisito 2</label>' +
		'<input type="text" class="form-control" id="iMReqA2" ' +
		'</div>' +
		'</div>' +

		'<div id="dato8" class="form-group mt-3">' +
		'<div class="p-1 mb-1 bg-info">' +
		'<label for="iCupo">Cupo Máximo por Salón</label>' +
		'<input type="text" class="form-control" id="iCupo" ' +
		'</div>' +
		'</div>' +
		'</div>';
	$("#chale").append(campo4);

	$("#materia").val(tds.filter(":eq(0)").text());
	$("#iActual").val(tds.filter(":eq(11)").text());
	$("#iMReq").val(tds.filter(":eq(2)").text());
	$("#iMReq2").val(tds.filter(":eq(3)").text());
	$("#iRepA").val(tds.filter(":eq(8)").text());
	$("#iIMReq").val(tds.filter(":eq(9)").text());
	$("#iIMReq2").val(tds.filter(":eq(10)").text());
}

// Evento para el input de % reprobados
$("#captura").on('keyup', '#iRepA' , function(){
	var num = $("#iRepA").val();
	var regex = /^[0-9]+$/;
	if(regex.test($("#iRepA").val()))
	{
		if (num >= 1 && num <= 100) {
			var dato1 = $("#iActual").val();
			var dato2 = $("#iRepA").val();
		
			var res = dato1 * (dato2 / 100);
		
		
			$("#res1").val(res);         
	
			valAnterior = $("#iRepA").val();
		 } 
		else 
		{
		   if($("#iRepA").val() == "" || $("#iRepA").val() <= 0)
		   {
      		$("#iRepA").val("");
		   }
		   else
			{
				$("#iRepA").val(valAnterior);
			}
		}
	}
	else
	{
		$("#iRepA").val("");
	}

});

// Evento para el input de inscritos actualmente
$("#captura").on('keyup', '#iActual' , function(){
	var regex = /^[0-9]+$/;
	if(regex.test($("#iActual").val()))
	{
		var dato1 = $("#iActual").val();
		var dato2 = $("#iRepA").val();
	
		var res = dato1 * (dato2 / 100);
	
	
		$("#res1").val(res);         
	}
	else
	{
		$("#iActual").val("");
	}

});

// Evento para el input de % Exito Materia Requisito
$("#captura").on('keyup', '#iMReqA' , function(){
	var num = $("#iMReqA").val();
	var regex = /^[0-9]+$/;
	if(regex.test($("#iMReqA").val()))
	{
		if (num >= 1 && num <= 100) {
			var dato1 = $("#iIMReq").val();
			var dato2 = $("#iMReqA").val();
		
			var res = dato1 * (dato2 / 100);
		
		
			$("#res2").val(res);         
	
			valAnterior2 = $("#iMReqA").val();
		 } 
		else 
		{
		   if($("#iMReqA").val() == "" || $("#iMReqA").val() <= 0)
		   {
      		$("#iMReqA").val("");
		   }
		   else
			{
				$("#iMReqA").val(valAnterior2);
			}
		}
	}
	else
	{
		$("#iMReqA").val("");
	}

});

// Evento para el input de inscritos actualmente
$("#captura").on('keyup', '#iIMReq' , function(){
	var regex = /^[0-9]+$/;
	if(regex.test($("#iIMReq").val()))
	{
		var dato1 = $("#iIMReq").val();
		var dato2 = $("#iMReqA").val();
	
		var res = dato1 * (dato2 / 100);
	
	
		$("#res2").val(res);        
	}
	else
	{
		$("#iIMReq").val("");
	}

});




function caso1() {
	var alumnosA = document.getElementById("asesoria").value;
	var insAct = document.getElementById("iActual").value;
	var pReprobados = document.getElementById("iRepA").value;
	var cupo = document.getElementById("iCupo").value;


	var dato1 = insAct * (pReprobados / 100);
	dato1 += parseInt(alumnosA);
	var lisAlumn = dato1.toString().split(".");
	c = (dato1 % 1);
	if (c <= 0.5)
		$("#idDemanda").val(lisAlumn[0]);
	else if (c > 0.5) {
		redo = parseInt(lisAlumn[0]);
		redo++;
		$("#idDemanda").val(redo);
	}

	formula(dato1, cupo, c, materia);
}

function caso2() {
	var alumnosA = document.getElementById("asesoria").value;
	var insAct = document.getElementById("iActual").value;
	var pReprobados = document.getElementById("iRepA").value;
	var insReq = document.getElementById("iIMReq").value;
	var pExito = document.getElementById("iMReqA").value;
	var cupo = document.getElementById("iCupo").value;

	var dato1 = insAct * (pReprobados / 100);
	var dato2 = insReq * (pExito / 100);
	dato1 += dato2;

	var alumnos = 0;
	if (dato1 > alumnosA) {
		alumnos = dato1;
	}
	else {
		alumnos = alumnosA;
	}

	var lisAlumn = alumnos.toString().split(".");
	c = (alumnos % 1);
	if (c <= 0.5)
		$("#idDemanda").val(lisAlumn[0]);
	else if (c > 0.5) {
		redo = parseInt(lisAlumn[0]);
		redo++;
		$("#idDemanda").val(redo);
	}

	formula(alumnos, cupo, c, materia);
}

function caso4() {
	var alumnosA = document.getElementById("asesoria").value;
	var insAct = document.getElementById("iActual").value;
	var pReprobados = document.getElementById("iRepA").value;
	var insReq = document.getElementById("iIMReq").value;
	var pExito = document.getElementById("iMReqA").value;
	var insReq2 = document.getElementById("iIMReq2").value;
	var pExito2 = document.getElementById("iMReqA2").value;
	var cupo = document.getElementById("iCupo").value;

	var dato1 = insAct * (pReprobados / 100);
	var dato2 = insReq * (pExito / 100);
	var dato3 = insReq2 * (pExito2 / 100);
	var dato4 = (dato2 + dato3) / 2;

	dato1 += dato4;

	var alumnos = 0;
	if (dato1 > alumnosA) {
		alumnos = dato1;
	}
	else {
		alumnos = alumnosA;
	}

	var lisAlumn = alumnos.toString().split(".");
	c = (alumnos % 1);
	if (c <= 0.5)
		$("#idDemanda").val(lisAlumn[0]);
	else if (c > 0.5) {
		redo = parseInt(lisAlumn[0]);
		redo++;
		$("#idDemanda").val(redo);
	}

	formula(alumnos, cupo, c, materia);
}

function formula(dato1, cupo, c, materia) {


	cupo = parseInt(cupo) - parseInt(5);

	numSalones = dato1 / cupo;

	
	var vformula = `<label for="formula1"> 1° Resultado  +  2° Resultado = ${dato1} </label> `
	$("#formula").append(vformula);


	c = (numSalones % 1);
	if (c != 0) {
		var lisVal = numSalones.toString().split(".");
		salones = lisVal[0];
		$("#idNsalones").val(salones);

		var listaSalones = [];

		for (i = 0; i < salones; i++) {
			var lista = [];
			lista.push(materia);
			lista.push(grupo + " - " + (i + 1));
			lista.push(cupo);
			listaSalones.push(lista);
		}

		dec = lisVal[1];
		decc = "." + dec;
		incremento = decc * cupo;

		a = incremento;

		b = (a % 1);

		if (b < 0.5)
			a = Math.round(a);
		else if (b >= 0.5)
			a = Math.ceil(a);

		res = a / salones;

		var lisVal2 = res.toString().split(".");
		incremento = lisVal2[0];
		incremento = parseInt(incremento) + parseInt(listaSalones[0][2]);
		for (i = 0; i < salones; i++) {
			listaSalones[i][2] = incremento;
		}

		if (lisVal2.length > 1) {
			dec = lisVal2[1][0];
			de = dec / 10;

			de = de * salones;

			incremento = parseInt(listaSalones[0][2]) + parseInt(1);
			for (i = 0; i < de; i++) {
				listaSalones[i][2] = incremento;
			}
		}


		// Buscar la forma de hacer un clear
		//dataGridView2.Rows.Clear();
		//$("#tablaRes").closest('tr').remove();
		$("#tablaRes").children().remove();

		for (i = 0; i < listaSalones.length; i++) {
			// Aqui se agrega codigo html
			//dataGridView2.Rows.Add(listaSalones[i][0], listaSalones[i][1], listaSalones[i][2], listaSalones[i][3]);
			campo = '<tr id="renglon1"><td>' + listaSalones[i][0] + '</td><td>' + listaSalones[i][1] + '</td><td>' + listaSalones[i][2] + '</td></tr>';
			$("#tablaRes").append(campo);
		}

	}
	else {
		$("#idDemanda").val(dato1);
		var listaSalones = [];

		for (i = 0; i < numSalones; i++) {
			var lista = [];
			lista.push(materia);
			lista.push(grupo + " - " + (i + 1));
			lista.push(cupo);
			listaSalones.push(lista);
		}

		$("#tablaRes").children().remove();


		for (i = 0; i < listaSalones.length; i++) {
			// Aqui se agrega codigo html
			//dataGridView2.Rows.Add(listaSalones[i][0], listaSalones[i][1], listaSalones[i][2], listaSalones[i][3]);


			campo = '<tr id="renglon"><td>' + listaSalones[i][0] + '</td><td>' + listaSalones[i][1] + '</td><td>' + listaSalones[i][2] + '</td></tr>';
			$("#tablaRes").append(campo);
		}
	}
}



