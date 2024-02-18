$("#search").keyup(function(){
    $("#o_o_s").hide();
    if($("#search").val() == "")
    {
        $("#o_o_s").show();
    }
});