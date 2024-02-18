$("#clrf").click(function(){
    let inpval = $("#pm_d_left input");
    let empval = "";
    inpval.val(empval);

    let cmtval = $("#msgbox2");
    cmtval.html(empval);

});

$(".p_name").keyup(function(){
    let m = $(".p_name").val();
    let c = $(".c_name").val();
    $.post("saledata.php",{p_name:m, c_name:c},function(value){
        let data = value.split(",");

        $("#msgbox1").html(data[0]);
        $(".p_type").val(data[1]);
        $(".p_supplier").val(data[2]);
        $("#p_price").val(data[3]);
        $("#msgbox2").html("Total: "+data[4])
        $(".c_debit").val(data[5]);
        $(".c_credit").val(data[6]);
    });
});
$(".c_name").keyup(function(){
    let m = $(".p_name").val();
    let c = $(".c_name").val();
    $.post("saledata.php",{p_name:m, c_name:c},function(value){
        let data = value.split(",");

        $("#msgbox1").html(data[0]);
        $(".p_type").val(data[1]);
        $(".p_supplier").val(data[2]);
        $("#p_price").val(data[3]);
        $("#msgbox2").html("Total: "+data[4])
        $(".c_debit").val(data[5]);
        $(".c_credit").val(data[6]);
        $(".c_id").val(data[7]);
    });
});




$("#s_qty").on("input",function(){
let s_qty = $("#s_qty").val();
let p_price = $("#p_price").val();
let res = s_qty*p_price;
parseInt($("#s_total").val(res))
});




function printsingle()
{
    if($("#s_qty").val() != '')
    {
        let p_name = $(".p_name").val();
        let c_name = $(".c_name").val();
        let p_price = $("#p_price").val();
        let p_qty = $("#s_qty").val();
        let p_total = $("#s_total").val();
        let s_moneyrecieved = $(".s_moneyrecieved").val();
        
        const datee = new Date();
        let day = datee.getDate();
        let month = datee.getMonth() + 1;
        let year = datee.getFullYear();

        
        var date = new Date();
        var hours = date.getHours() > 12 ? date.getHours() - 12 : date.getHours();
        var am_pm = date.getHours() >= 12 ? "PM" : "AM";
        hours = hours < 10 ? "0" + hours : hours;
        var minutes = date.getMinutes() < 10 ? "0" + date.getMinutes() : date.getMinutes();
        var seconds = date.getSeconds() < 10 ? "0" + date.getSeconds() : date.getSeconds();
        time = hours + ":" + minutes + ":" + seconds + " " + am_pm;
        
        let currentDate = `${day}-${month}-${year}`;
        $("#recipt_date").html(currentDate+"<br>"+time);

        
        
        $("#customer_name").html(c_name);
        $("#print_sale_name").html(p_name);
        $("#print_sale_qty").html(p_qty);
        $("#print_sale_up").html(p_price);
        $("#print_sale_tprice").html(p_total);
        $("#tt").html(p_total);
        $("#mr").html(s_moneyrecieved);

        $("#container").hide();
        let rr = $("#recipt").show();
        window.print(rr);
        rr.hide();
        $('#container').show();
    }
}

$(".sub").click(function(){

    let debit = parseFloat($(".c_debit").val());
    let credit = parseFloat($(".c_credit").val());
    let total = parseFloat($("#s_total").val());
    let rec = parseFloat($(".s_moneyrecieved").val());
    
    
    let rem;
    let rem2;
    let rem3;
    rem = rec - total;
    if(rem > 0)
    {
        let newcred = rem+credit;
        $(".c_credit").val(newcred);

        rem2 = debit - newcred;
        rem3 = newcred - debit;
        if(debit > newcred)
        {
            $(".c_credit").val(rem3-rem3);
            $(".c_debit").val(rem3*-1);
        }
        if(debit < newcred)
        {
            $(".c_credit").val(rem3*1);
            $(".c_debit").val(rem3-rem3);
        }
        if(debit == newcred)
        {
            $(".c_debit").val(0);
            $(".c_credit").val(0);
        }
    }
    if(rem < 0)
    {
        let newcred = rem+credit;
        $(".c_credit").val(newcred);

        rem2 = debit - newcred;
        rem3 = newcred - debit;
        $(".h1").html("="+rem3+""+rem2);
        if(debit > newcred)
        {
            $(".c_credit").val(rem3-rem3);
            $(".c_debit").val(rem3*-1);
        }
        if(debit < newcred)
        {
            $(".c_credit").val(rem3*1);
            $(".c_debit").val(rem3-rem3);
        }
        if(debit == newcred)
        {
            $(".c_debit").val(0);
            $(".c_credit").val(0);
        }
    }
    if(rem == 0)
    {
        rem2 = debit - credit;
        rem3 = credit - debit;
        if(debit > credit)
        {
            $(".c_credit").val(rem3-rem3);
            $(".c_debit").val(rem3*-1);
        }
        if(debit < credit)
        {
            $(".c_credit").val(rem3*1);
            $(".c_debit").val(rem3-rem3);
        }
        if(debit == credit)
        {
            $(".c_debit").val(0);
            $(".c_credit").val(0);
        }
    } 
});





















// $("#carticon").click(function(){
//     $("#cartspace").slideDown();
//     $("#container").css({"filter":"blur(2px)","transition":".25s"})
// });


// $("#cartspace i").click(function(){
//     $("#cartspace").fadeOut();
//     $("#container").css({"filter":"blur(0px)","transition":".25s"});
// });




// $("#atc").click(function(){
//     let p_name = $(".p_name").val();
//     let p_type = $(".p_type").val();
//     let c_name = $(".c_name").val();
//     let p_supplier = $(".p_supplier").val();
//     let p_price = $("#p_price").val();
//     let p_qty = $("#s_qty").val();
//     let p_total = $("#s_total").val();
    
//     let backup = $("#atc-table").html();
//     syntax = "<tr><td><input type='text' value='"+p_name+"' name='pro_name'></td>   <td><input type='text' value='"+c_name+"' name='cus_name'></td>    <td><input type='text' value='"+p_type+"' name='pro_type'></td>  <td><input type='text' value='"+p_supplier+"' name='pro_supplier'></td>     <td><input type='text' value='"+p_price+"' name='pro_price'></td>    <td><input type='text' value='"+p_qty+"' name='pro_qty'></td>  <td><input type='text' value='"+p_total+"' name='pro_total'></td>    </tr>";
//     if(p_name != '')
//     {
//         $("#atc-table").html(backup+syntax);
        
//         $("#count_product").html(0+1);
//     }

// });
