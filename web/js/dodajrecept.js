/*jslint browser: true*/ // datoteka uprablja js lint
/*global  $*/ // - s tem povemo iskalniku, da naj upošteva globalne spremenljivke - dobro, saj uporabljamo jquery (window, document)
/*global alert*/ // definira globalne spremenljivke, ki se uporabljajo tekom razvoja (alert, console)
function ajax() { // JSLINT dela probleme s presledki, popravimo da med ( in { je samo en presledek
    "use strict"; // javi nam problem s $ in funkcijam, use secure naj bi bil kompatibilen s starejšimi verziji javascript, gre pa tudi da bi prevajalnik javil napake èe posamezna spremenljivke ne bi bila inicializirana
    $.ajax({type: "post", url: "includes/ajax/dodaja_recepta.php", success: function (data) { // spremenimo, da bo bila uporabljena tudi ta spremenljivka

        $("#demo-input-facebook-theme").tokenInput("includes/ajax/dodaja_recepta.php");
       // alert(data);
    }
        }); // popravljanje presledkov
}
$(document).ready(function () {
    "use strict"; // secure javaScript
    ajax();

    $("#submit").click(function () {
        var vrednost1, ime_datoteke1; // JSLint zahteva. da imamo èim manj var izjav oziroma želi, da ime spremenljivk podamo skupaj in ne vsako posebej
        vrednost1 = $("#demo-input-facebook-theme").val();
        if ($("#fileimagename").text() === "") {// èe je al ni slika
            ime_datoteke1 = -1;
        } else {
            ime_datoteke1 = "uploads/" +  $("#fileimagename").text();
        }
        $.ajax({
            type: "POST",
            url: "recipeadd.php",
            data: {vrednost: vrednost1, priprava: $("#priprava").val(), ime: $("#ime_recepta").val(), ime_datoteke: ime_datoteke1}
        })
                .done(function (msg) {
                if (msg === -1) { // primerjava v netbeansu zahteva ===
                    alert("Pri obdelavi je prišlo do napake");
                } else {
                    window.location.replace("recipe.php?id=" + msg);
                }
            });
    });

});