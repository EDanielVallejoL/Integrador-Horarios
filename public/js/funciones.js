$(document).ready(function () {


    $('#example').dataTable({
        pageLength: 5,
        lengthMenu: [[5, 10, 15, -1], [5, 10, 15, 'Todos']],
        language: {
            sInfo: "Mostrando Alumnos del _START_ al _END_ de un total de _TOTAL_ Alumnos",
            sSearch:         "Buscar:",
            sLoadingRecords: "Cargando...",
            sLengthMenu: "Mostrar _MENU_ alumnos",
            sInfoFiltered: "",
            sZeroRecords: "No se encontraron resultados",
            sInfoEmpty: "",
            sEmptyTable: "Ningún dato disponible en esta tabla",
            oPaginate: {
                sFirst:    "Primero",
                sLast:     "Último",
                sNext:     "Siguiente",
                sPrevious: "Anterior"
            },
        },
    });



    $("#cbCarreras").change(function (e) {
        e.preventDefault();
        $.get("Tabla", { x: $("#cbCarreras").val(), y: $("#opcion").val() }, function (data) {
            $("#cargaexterna").html(data);
        });
    });

    $("#opcion").change(function (e) {
        e.preventDefault();
        $valor = $("#cbCarreras").val();
        if ($valor != null) {
            $.get("Tabla", { x: $("#cbCarreras").val(), y: $("#opcion").val() }, function (data) {
                $("#cargaexterna").html(data);
            });
        }
        else {
            alertify.error("Porfavor selecciona una carrera");
        }
    });

    $(document).on('click', 'button[id^="idA_"]', function (e) {
        alertify.success("Horarios cargado correctamente");
        var $id = $(this).attr('id');
        var $realId = $id.split('_');
        var $idAmandar = $realId[1];
        e.preventDefault();
        $.get("ResAlumnos", { x: $idAmandar}, function (data) {
            $("#cargaexterna").html(data);
        });
    });

});


function ocultaEstediv()
{
    $('#cargaexterna').hide(); //oculto mediante id
    $('#cargaexterna2').show(400); 
}

function muestraDiv()
{
    $('#cargaexterna').show(200); 
    $('#cargaexterna2').hide(); 
}


function isMPN(input) {
    var value = input.value;

    var dato = value.substr(value.lastIndexOf("M"));
    var res = dato == "MPN.xlsx";
    if (!res) {
        input.value = "";
        alertify.error("Solo acepta MPN.xlsx intenta de nuevo");
    }
    else {
        alertify.success("Archivo MPN.xlsx cargado correctamente");
    }
    return res;
}

function isArchivoHorario(input) {
    var value = input.value;

    var dato = value.substr(value.lastIndexOf("H"));
    var res = dato == "HorariosCompletos.xlsx";
    if (!res) {
        input.value = "";
        alertify.error("Solo acepta HorariosCompletos.xlsx intenta de nuevo");
    }
    else {
        alertify.success("Archivo HorariosCompletos.xlsx cargado correctamente");
    }
    return res;
}

function isAlumnosAceptados(input) {
    var value = input.value;

    var dato = value.substr(value.lastIndexOf("Al"));
    var res = dato == "Alumnos_Aceptados.xlsx";
    if (!res) {
        input.value = "";
        alertify.error("Solo acepta Alumnos_Aceptados.xlsx intenta de nuevo");
    }
    else {
        alertify.success("Archivo Alumnos_Aceptados.xlsx cargado correctamente");
    }
    return res;
}