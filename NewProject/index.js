$("#name").keyup(function(){
    let n = $("#name").val();
    $.post("indexdatausername.php",{name:n},function(value){
        $("#n_span").html(value);
    });
});

$("#pass").keyup(function(){
    let p = $("#pass").val();
    $.post("indexdatapassword.php",{pass:p},function(value){
        $("#p_span").html(value);
    });
});

