function ajax()
{
    $.ajax({type: "post", url: "includes/ajax/dodaja_recepta.php", success: function(data) {
            $("#demo-input-facebook-theme").tokenInput("http://localhost/ProjektFERI/web/includes/ajax/dodaja_recepta.php", {// to obvezno spremenit
            });
            //alert(data);
        }
    });
}
$(document).ready(function() {
    ajax();

    $("#submit").click(function() {
        var vrednost1 = $("#demo-input-facebook-theme").val();
        var ime_datoteke1;
        if($("#fileimagename").text() === "") // èe je al ni slika
        {
            ime_datoteke1 = -1;
        }
            else
            {
      ime_datoteke1 = "uploads/" +  $("#fileimagename").text();
            }
        $.ajax({
            type: "POST",
            url: "recipeadd.php",
            data: {vrednost: vrednost1, priprava: $("#priprava").val(), ime: $("#ime_recepta").val(), ime_datoteke:ime_datoteke1}
        })
                .done(function(msg) {
                    if (msg == -1)
                    {
                        alert("Pri obdelavi je prišlo do napake");
                    }
                    else
                    {
                        window.location.replace("recept.php?id=" + msg);
                    }
                });
    });

});