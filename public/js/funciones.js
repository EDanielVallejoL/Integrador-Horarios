var ordenCarreras;
$(document).ready(function () {
    

    $(".loader").fadeOut("slow");

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

    $('#example3').dataTable({
        pageLength: 5,
        lengthMenu: [[5, 10, 15, -1], [5, 10, 15, 'Todos']],
        language: {
            sInfo: "Mostrando Errores del _START_ al _END_ de un total de _TOTAL_ Erorres",
            sSearch:         "Buscar:",
            sLoadingRecords: "Cargando...",
            sLengthMenu: "Mostrar _MENU_ Erorres",
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

    $('#example4').dataTable({
        pageLength: -1,
        lengthMenu: [[-1], ['Todos']],
        language: {
            sInfo: "",
            sSearch:         "Buscar:",
            sLoadingRecords: "Cargando...",
            sLengthMenu: "",
            sInfoFiltered: "",
            sZeroRecords: "No se encontraron resultados",
            sInfoEmpty: "",
            sEmptyTable: "Ningún dato disponible en esta tabla",
            oPaginate: {
                sFirst:    "",
                sLast:     "",
                sNext:     "",
                sPrevious: ""
            },

        },
    });

    $('#example2').dataTable({
        dom: 'Bfrtip',
        buttons: [
            'excel'
        ],
        pageLength: 4,
        lengthMenu: [[4, 10, 50, -1], [4, 10, 50, 'Todos']],
        language: {
            sInfo: "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            sSearch:         "Buscar:",
            sLoadingRecords: "Cargando...",
            sLengthMenu: "Mostrar _MENU_ registros",
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
            alertify.error("Por favor selecciona una carrera");
        }
    });

    $(document).on('click', 'button[id^="nextStep"]', function (e) {

        const lista = document.getElementById('lista');
        var arrayCalificacion = [];
        var arrayCarrera = [];

        for (var i = 0; i <= lista.children.length - 1; i++) {

            var aux = lista.children[i].innerText;
            var arrayDeCadenas = aux.split("\n\n");
            arrayCalificacion.push(arrayDeCadenas[0])
            arrayCarrera.push(arrayDeCadenas[1])
            

        }
        
        $.ajax({
            url: "listaPCarreras?var=" + arrayCarrera,
            success: function (data) {
              //data es la respuesta del php
              alert( 'El servidor devolvio "' + data + '"' );
    
          }
    });

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

    $(document).on('click', 'button[id^="btnExporta"]', function (e) {
        alertify.success("listo para exportar escoge una opción");
        e.preventDefault();
        $.get("exporta", function (data) {
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

const lista = document.getElementById('lista');

Sortable.create(lista, {
    animation: 150,
    chosenClass: "seleccionado",
    //ghostClass: "fantasma"
    dragClass: "drag",

    onEnd: () => {
        alertify.success("Se movio carrera correctamente");
    },

    group: "lista-Orden",

    store: {
        // Guardamos el orden de la lista
        set: (sortable) => {
            const orden = sortable.toArray();
            ordenCarreras = orden;
            console.log(orden);
            localStorage.setItem(sortable.options.group.name, orden.join('|'));
        },

        // obtenemos el orden de la lista
        get: (sortable) => {
            const orden = localStorage.getItem(sortable.options.group.name);
            return orden ? orden.split('|') : [];
        }
    }


});