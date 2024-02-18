$("#search").keyup(function(){
    let s = $("#search").val();
    if(s != "")
    {
        $.post("supplierecajax.php",{search:s},function(data){
            $("#result").html(data);
        });
    }
    else
    {
        $('#result').html('');
    }
});