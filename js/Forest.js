//az oldal tejére gomb
function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}



$(document).ready(function () {
    //törlés
    $("#btn_torles").click(function(){
        if(confirm("Biztos benne hogy törölni akarja?"))
        {
            var id = [];

            $(':checkbox:checked').each(function(i){
               id[i]=$(this).val(); 
            });

            if(id.length === 0)
            {
                alert("A törlés akkor lehetséges, ha minimum egy sor ki van jelölve.");
            }
            else
            {
                $.ajax({
                    url: 'Delete.php',
                    method: 'POST',
                    data: {id:id},
                    success: function()
                    {
                        for (var j = 0; j < id.length; j++) {
                            $('tr#'+id[i]+'').fadeOut('slow');
                        }
                    }
                });
            }
        }
        else
        {
            return false;
        }
    });

    //módosítás
    $('.updateUser').on('click', function(){
        $('#UpdataUser').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function(){
            return $(this).text();
        }).get();

        $('#id').val(data[0]);
        $('#nev').val(data[1]);
        $('#cim').val(data[2]);
        $('#email').val(data[3]);
        $('#jelszo').val(data[4]);

    });
});

