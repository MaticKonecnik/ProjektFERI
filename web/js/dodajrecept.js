function ajax()
{
    $.ajax({type: "post", url: "includes/ajax/dodaja_recepta.php", success: function(data) {
<<<<<<< HEAD
            $("#demo-input-facebook-theme").tokenInput("includes/ajax/dodaja_recepta.php", {// to obvezno spremenit
=======
            $("#demo-input-facebook-theme").tokenInput("includes/ajax/dodaja_recepta.php", {
>>>>>>> 793df8fa7ab12a978a5e19d6f9bafe95a8eb6c00
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
        if($("#fileimagename").text() === "") // �e je al ni slika
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
                        alert("Pri obdelavi je pri�lo do napake");
                    }
                    else
                    {
                        window.location.replace("recept.php?id=" + msg);
                    }
                });
    });

});