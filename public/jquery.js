$(document).ready(function(){
 //hiding all the divs apart from home as it needs to be displayed on initial viewing
$("#Notation, #Recurrence,#MathInduction, #Test, #Review").hide();
//on the click of a tab
$(".nav li a").click(function(evt){
//hiding all the divs including home once this button is clicked as a new one will appear when another tab is clicked.
$("#Home, #Notation, #Recurrence,#MathInduction, #Test, #Review").hide();
//link clicked becomes the text of the tab
linkclicked = $(this).text();
		  //Switch on the text value passed in, which will determin its outcome using a case
          switch(linkclicked)
          {       	  
            case "Home":
			$("#Home").show();
			break;
			case "Notation":
			$("#Notation").show();
			break;
			case "Recurrence relation":
			$("#Recurrence").show();
			break;
			case "Mathematical Induction":
            $("#MathInduction").show();
            break;			
            case "Test Yourself":
            $("#Test").show();
            break;
            case "Review":
            $("#Review").show();
            break;
			default:
			$("#Home" ).show();	
			break;
          }
		  });

$answers = [];
$numbers = [];
var count = 0;
$("#findDiff").hide();
$( '.result' ).on( 'keyup', '.sequenceval', function () { 

var index = $( ".sequenceval" ).index( this );
var useranswer = $(this).val();

var id = $(this).attr("id");
$numbers.push(id);
if (useranswer == id){
	count++;
$(this).css('border', '3px solid green'); 
}else{
	//count--;
	$(this).css('border', '3px solid red'); 
}   

if (count ==5){
	$("#findDiff").show();
}
});

$('#recsubmit').click(function(){
	$("#findDifference").empty();
$(".result").empty();
	$("#findDiff").hide();

$answers.length = 0;
$n =  parseInt($('#initialnumber').val(), 10);
$firstnumber = parseInt($('#firstnumber').val(), 10);
$secondnumber = parseInt($('#secondnumber').val(), 10); 
$thirdnumber = parseInt($('#thirdnumber').val(), 10);
	//$i = 1;
	$(".result").append(("U(1) = "+$n +"<br />"));
	for (var i = 2; i<=6; i++){
		$answer = $firstnumber*$n+($secondnumber*i)+$thirdnumber;
	$n = $answer;
	$answers.push("U("+i+") = <input type = 'text' class ='sequenceval' id="+$answer+" placeholder ='Enter the value'/>"+$answer +"<br /> ");
}
$(".result").append($answers);
$(".result").append("")
});
$("#findDifference").hide();

$("#findDiff").click(function(){
$("#findDifference").empty();
var values = jQuery.unique( $numbers );
$("#findDifference").show();
var first = $(".sequenceval").eq(0).attr("id");
var second = $(".sequenceval").eq(1).attr("id");
var third = $(".sequenceval").eq(2).attr("id");
var fourth = $(".sequenceval").eq(3).attr("id");
var fifth = $(".sequenceval").eq(4).attr("id");

var firstDifference = second - first;
var secondDifference = third - second;
var thirdDifference = fourth - third;
var fourthDifference = fifth - fourth;
var html = "<table>";

html += "<tr><td><div id = 'Difference'><p class = 'arrow'>&#8680;"+firstDifference+"</p></div></td><td class = 'column2'></td></tr>";
html += "<tr><td><div id = 'Difference'><p class = 'arrow'>&#8680;"+secondDifference+"</p></div></td><td class = 'column3'></td></tr>";
html +="<tr><td><div id = 'Difference'><p class = 'arrow'>&#8680;"+thirdDifference+"</p></div></td><td class = 'column4'></td></tr>";
html +="<tr><td><div id = 'Difference'><p class = 'arrow'>&#8680;"+fourthDifference+"</p></div></td><td class = 'column5'></td></tr>";
$("#findDifference").append(html);

if ((firstDifference == secondDifference) && (secondDifference==thirdDifference) &&(thirdDifference ==fourthDifference)){

	alert("all values are equal");
}else{

var firstDifference = secondDifference - firstDifference;
var secondDifference = thirdDifference - secondDifference;
var thirdDifference = fourthDifference - thirdDifference;
$('.column2').append("<div id = 'Difference'><p class = 'arrow'>&#8680;"+firstDifference+"</p></div>");
$('.column3').append("<div id = 'Difference'><p class = 'arrow'>&#8680;"+secondDifference+"</p></div>");
$('.column4').append("<div id = 'Difference'><p class = 'arrow'>&#8680;"+thirdDifference+"</p></div>");
}
});
$("#start").show();
$("#questions").hide();
$("#start").click(function(){
	$("#questions").show();
$("#start").hide();

});
		  
$('.launchConfirm').on('click', function (e) {
    $('#confirm')
        .modal({ backdrop: 'static', keyboard: false })
        .one('click', '[data-value]', function (e) {
            if($(this).data('value')) {
                alert('confirmed');
            } else {
                alert('canceled');
            }
        });
});
		    
var authuser = $('.AuthUser').val();
if ($('.AuthUser').is(':empty')){
$('#usernametxt,#passwordtxt,#passwordtxt,#registerbutton').show();
$('#logoutbutton').hide();
}else{
$('#usernametxt,#passwordtxt,#loginbutton,#registerbutton').hide();
$('#logoutbutton').show();
}

});