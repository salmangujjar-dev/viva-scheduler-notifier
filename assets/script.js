$(document).ready(function() {
    

var count=0;
var student1;
var student2;
// jQuery 1.7+
$(function () {
    $('a').on("click", function (e) {
        if (count<2){
        e.preventDefault();
        alert('Please select 2 Students.');
    }
    else{
        fun();
    }
    });
});
    $('#grouping tbody').on( 'click', 'tr', function () {
    if (count<2 || $(this).css('background-color')==="rgb(173, 216, 230)"){

        if ($(this).css('background-color')==="rgba(0, 0, 0, 0)"){
            $(this).css({"background-color": "rgb(173, 216, 230)"});
            $(this).css({'color':'white'});
                if (count==0){
                student1=$(this).find("td:first").text();
                }
                else if (count==1){
                student2=$(this).find("td:first").text();
                }
                count++;
        }
        
        else if ($(this).css('background-color')==="rgb(173, 216, 230)"){
            $(this).css({"background-color": "rgba(0, 0, 0, 0)"});
            $(this).css({'color':'#808080'});
            count--;
            console.log(count);
        }
        else{
            console.log($(this).css('background-color'));
        }
        $('#table input[type="checkbox"]:checked').each(function() {
            selected.push($(this).attr('id'));
        });
    }
    else{
        alert("You cannot select more than 2 Students.");
    }
    } );
 function fun(){

    window.location.href = "add_group.php?student1=" + student1 + "&student2=" + student2;

 }

} );