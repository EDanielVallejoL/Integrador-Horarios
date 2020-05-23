$(document).ready(function () {

    $("#cbCarreras").change(function (e) {
        e.preventDefault();
        $.get( "Tabla", {x : $("#cbCarreras").val(), y : $("#opcion").val()}, function (data) {
            $("#cargaexterna").html(data);
    	    });    
    });

    $("#opcion").change(function (e) {
        e.preventDefault();
        $valor = $("#cbCarreras").val();
        if($valor != null)
        {
            $.get( "Tabla", {x : $("#cbCarreras").val(), y : $("#opcion").val()}, function (data) {
                $("#cargaexterna").html(data);
            });    
        }
        else
        {
            alertify.error("Porfavor selecciona una carrera");
        }
    });

});




function isMPN(input)
{
    var value = input.value;

    var dato = value.substr(value.lastIndexOf("M"));
    var res =  dato == "MPN.xlsx";
    if (!res) {
        input.value = "";
        alertify.error("Solo acepta MPN.xlsx intenta de nuevo");
    }
    else {
        alertify.success("Archivo MPN.xlsx cargado correctamente");
    }
    return res;
}

function isArchivoHorario(input)
{
    var value = input.value;

    var dato = value.substr(value.lastIndexOf("H"));
    var res =  dato == "HorariosCompletos.xlsx";
    if (!res) {
        input.value = "";
        alertify.error("Solo acepta HorariosCompletos.xlsx intenta de nuevo");
    }
    else {
        alertify.success("Archivo HorariosCompletos.xlsx cargado correctamente");
    }
    return res;
}

function isAlumnosAceptados(input)
{
    var value = input.value;

    var dato = value.substr(value.lastIndexOf("Al"));
    var res =  dato == "Alumnos_Aceptados.xlsx";
    if (!res) {
        input.value = "";
        alertify.error("Solo acepta Alumnos_Aceptados.xlsx intenta de nuevo");
    }
    else {
        alertify.success("Archivo Alumnos_Aceptados.xlsx cargado correctamente");
    }
    return res;
}