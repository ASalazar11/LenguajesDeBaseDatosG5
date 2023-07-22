// Obtener los elementos de los botones
const likeButton = document.getElementById('vote-like');
const dislikeButton = document.getElementById('vote-dislike');


$(document).ready(function () {
    obtieneVotacion();
});//(document).ready

likeButton.addEventListener('click', () => {
    registraVotacion(0);
});

dislikeButton.addEventListener('click', () => {
    registraVotacion(1);
});


function obtieneVotacion(pvoto) {
    try {
        $.ajax(
            {
                url: 'server/poll_result.php',
                type: 'GET',
                dataType: 'json',
                // beforeSend: function ()
                //(
                //      $("#pnlInfo").fadeTo("slow");
                //      $("#pnlMensaje").fadeTo("slow");
                // },
                success: function (r) {
                    InsercionVotacionExistosa(r);
                },
                error: function (r) {
                    InsercionVotacionFallida(r);
                }
            });
    } catch (err) {
        alert(err);
    }
}//Fin registraVotacion


function registraVotacion(pvoto) {
    try {
        $.ajax(
            {
                data: {
                    vote: pvoto
                },

                url: 'server/poll_vote.php',
                type: 'GET',
                dataType: 'json',
                // beforeSend: function ()
                // {
                //        $("#pnlInfo").fadeTo("slow");
                //        $("#pnlMensaje").fadeTo("slow");
                // },

                success: function (r) {
                    InsercionVotacionExistosa(r);
                },
                error: function (r) {
                    InsercionVotacionExistosa(r);
                }
            });
    } catch (err) {
        alert(err);
    }
}//Fin registraVotacion ======

function InsercionVotacionExistosa(ObjetoJSON) {
    let porcentajeSi = Math.round(100 * (ObjetoJSON.Si / (ObjetoJSON.No + ObjetoJSON.Si)), 2);
    let porcentajeNo = Math.round(100 * (ObjetoJSON.No / (ObjetoJSON.No + ObjetoJSON.Si)), 2);
    $("#resultado").empty();

    $("#resultado").append("<tr class='resultado-row'>");
    $("#resultado").append("<td class='resultado-data'></td>");
    $("#resultado").append("<td class='resultado-data'><img src='imagenes/yes.png' width='" + porcentajeSi + "' height='20'><span class='porcentaje'>" + porcentajeSi + "%</span></td>");
    $("#resultado").append("</tr>");
    $("#resultado").append("<tr class='resultado-row'>");
    $("#resultado").append("<td class='resultado-data'></td>");
    $("#resultado").append("<td class='resultado-data'><img src='imagenes/no.png' width='" + porcentajeNo + "' height='20'><span class='porcentaje'>" + porcentajeNo + "%</span></td>");
    $("#resultado").append("</tr>");

    // Agregar clase "resultado-header" a la fila de encabezado
    $("#resultado tr:first-child").addClass("resultado-header");

    // Aplicar estilos CSS a las filas y celdas con la clase "resultado-row"
    $(".resultado-row").css({
        "background-color": "#f2f2f2",
        "border-bottom": "1px solid #ddd"
    });

    // Aplicar estilos CSS a las celdas de datos
    $(".resultado-data").css({
        "text-align": "left",
        "padding": "12px",
        "font-size": "14px"
    });

    // Aplicar estilos CSS a las celdas de encabezado
    $(".resultado-header th").css({
        "background-color": "#4CAF50",
        "color": "white",
        "text-align": "left",
        "padding": "12px",
        "font-size": "14px"
    });

    // Aplicar estilos CSS al elemento span dentro de las celdas
    $(".porcentaje").css({
        "display": "inline-block",
        "margin-left": "5px"
    });
}//Fin InsercionTutoriaExitosa


function InsercionVotacionFallida(TextoJSON) {
    $("#pnlMensaje").dialog();
    $("#pnlMensaje").html('<p>Ocurrio un error en el servidor..</p>' + TextoJSON.responseText);
}//Fin Insercion VotacionFallida