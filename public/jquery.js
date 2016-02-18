$(document).ready(function(){
 //hiding all the divs apart from home as it needs to be displayed on initial viewing
$("#Examples, #Recurrence,#MathInduction, #Test, #Review,#quadratic,#tohInduction,#tohclosed,#quadfull,#linmi,#quadmi").hide();
//on the click of a tab
$(".nav li a").click(function(evt){
//hiding all the divs including home once this button is clicked as a new one will appear when another tab is clicked.
$("#Home, #Examples, #Recurrence,#MathInduction, #Test, #Review,#quadratic,#quadrec,#tohrecurrence,#tohInduction,#fullLinear,#tohclosed,#tohfull,#linearfull,#quadfull,#linrec,#linmi,#quadmi").hide();
//link clicked becomes the text of the tab
linkclicked = $(this).text();
		  //Switch on the text value passed in, which will determin its outcome using a case
          switch(linkclicked)
          {       	  
            case "Home":
			$("#Home").show();
			break;
			case "Examples":
			$("#Examples").show();
			$("#linearfull").show();
			$("#tohrecurrence").show();
			$("#linrec").show();
            $("#fullLinear").show();
			break;
			case "Recurrence relation":
			$("#Recurrence").show();
			move("#recTable");
			break;
			case "Mathematical Induction":
            $("#MathInduction").show();
            break;			
            case "Test Yourself":
            $("#Test").show();
            break;
            case "Review ":
            $("#Review").show();
            break;
            case "Towers of Hanoi Recurrence relation":
            $("#Examples").show();
            $("#tohfull").show();
            $("#tohrecurrence").show();
            move(".towersTitle");
            break;
             case "Towers of Hanoi Mathematical Induction":
            $("#Examples").show();
            $("#tohfull").show();
            $("#tohInduction").show();
            break;
            case "Towers of Hanoi Closed-form Expression":
            $("#Examples").show();
            $("#tohfull").show();
            $("#tohclosed").show();
            break;
            case "Linear recurrence relation":
            $("#linearfull").show();
            $("#Examples").show();
            $("#linrec").show();
            $("#fullLinear").show();

            break;
            case "Quadratic recurrence relation":
            $("#quadfull").show();
            $("#Examples").show();
            $("#quadrec").show();

            break;
            case "Linear Proof By Mathematical Induction":
            $("#linearfull").show();
            $("#Examples").show();
            $("#linmi").show();
            $("#fullLinear").show();
            break;
             case "Quadratic Proof By Mathematical Induction":
            $("#quadfull").show();
            $("#Examples").show();
            $("#quadmi").show();
    
            break;
            case "Towers of Hanoi":
             $("#Examples").show();
             $("#tohrecurrence").show();
            $("#tohfull").show();
            break;
            case "Linear Example":
            $("#Examples").show();
            $("#fullLinear").show();
            $("#linearfull").show();
            $("#linrec").show();

            break;
            case "Quadratic Example":
            $("#Examples").show();
            $("#quadfull").show();
            $("#quadrec").show();
            break;
			default:
			$("#Home" ).show();	
			break;

          }
		  });



$("#move2, #move3").hide();

$(".disks").click(function(e){
$("#move1, #move2, #move3").hide();
var link = $(this).attr("id");

switch(link){

case "seeonemove":
$("#move1").show();
$("#move2, #move3").hide();
break;
case "seetwomove":
$("#move2").show();
$("#move1, #move3").hide();
break;
case "seethreemove":
$("#move3").show();
$("#move2, #move1").hide();
break;

}
});


$answers = [];
$numbers = [];
var count = 0;
$("#findDiff").hide();
function move(element){
var offset = $(element).offset();
$('html, body').animate({
    scrollTop: offset.top,
    scrollLeft: offset.left
});	
}
var a,b,findc,c;
$n = null;
$firstnumber = null;
$secondnumber = null; 
$thirdnumber = null;
$initialnumber = null;
$answers.length = 0;

$( '#vertseq' ).on( 'keyup', '.sequenceval', function () { 

var index = $( ".sequenceval" ).index( this );
var useranswer = $(this).val();

var id = $(this).attr("id");
$numbers.push(id);
if (useranswer == id){
	count++;
$(this).css('border', '3px solid green'); 
$(this).prop("readonly", true);
}else{
	//count--;
	$(this).css('border', '3px solid red'); 
}   

if (count ==5){
	$("#findDiff").show();
	move("#findDiff");
}
});
var difference = null;
$(".recurrenceTable").hide();
$('#recsubmit').click(function(){
	count = 0;
	$numbers.length = 0;
	$answers.length =0;
	$("#buttons").empty();
$n =  parseInt($('#initialnumber').val(), 10);
$firstnumber = parseInt($('#firstnumber').val(), 10);
$secondnumber = parseInt($('#secondnumber').val(), 10); 
$thirdnumber = parseInt($('#thirdnumber').val(), 10);
if($("#initialnumber").val().length == 0 || $("#firstnumber").val().length == 0 ||$("#secondnumber").val().length == 0 ||$("#thirdnumber").val().length == 0 ){
	alert("oops");
	$("#vertseq").empty();
}else{
	$answers.length = 0;
	$("#findDifference").empty();
$("#vertseq").empty();
	$("#findDiff").hide();
	//$i = 1;
	//$(".result").append("<p>Work out the values for the recurrence relation above and enter the answers below</p>");
	//$(".result").append(("<br /><div id = 'firstdifftext'>First Difference</div><div id ='seconddifftext'>Second Difference</div>"));
	$("#buttons").append("<button id = 'clear'>Clear</button><br /><br />");
	$("#vertseq").append(("<td>U(1) = <br /><input type = 'text' class = 'sequenceval' readonly = 'true' value ='"+$n +"'/><br /><div id = 'test1'></div><div id ='second1'></div></td>"));
	for (var i = 2; i<=6; i++){
		var j = i-1;
		$answer = $firstnumber*$n+($secondnumber*i)+$thirdnumber;
	$n = $answer;
	$answers.push("<td>U("+i+") = <br/><input type = 'text' class ='sequenceval' id='"+$answer+"'/><span class='glyphicon glyphicon-question-sign'data-toggle='tooltip' title ='Un ="+ $firstnumber+"*"+'U('+j+')'+"+"+$secondnumber+"n +"+$thirdnumber+"' aria-hidden='true'></span>"+$answer+"<div id = 'test"+i+"'></div><div id ='second"+i+"'></div>"+"</td>");
}
$('[data-toggle="tooltip"]').tooltip(); 
if($answers.length == 5){
	$("#diffex").append("");

$("#vertseq").append($answers);
$(".result").append("");
$(".recurrenceTable").show();
 move(".sequenceval");
}
}
$("#buttons #clear").click(function(){
$answers.length = 0;
$(".recurrenceTable .result").empty();
$(".recurrenceTable #closedFormArea").empty();
$(".recurrenceTable").hide();
$("#initialnumber").val("");
$("#secondnumber").val("");
$("#thirdnumber").val("");
//$(".recurrenceTable").children().hide();
//$(".result").empty();
//$(".result").hide();
});
});


$("#findDifference").hide();

$("#findDiff").click(function(){
//$("#clear").remove();
$("#findDifference").empty();
$("#test1,#test2,#test3,#test4,#test5").empty();
$("#second1,#second2,#second3,#second4,#second5").empty();
$("#closedFormArea").empty();
var values = jQuery.unique( $numbers );
$("#findDifference").show();

$n =  parseInt($('#initialnumber').val(), 10);
var first = $(".sequenceval").eq(1).attr("id");
var second = $(".sequenceval").eq(2).attr("id");
var third = $(".sequenceval").eq(3).attr("id");
var fourth = $(".sequenceval").eq(4).attr("id");
var fifth = $(".sequenceval").eq(5).attr("id");

var initialDifference  = first -$n;
var firstDifference = second - first;
var secondDifference = third - second;
var thirdDifference = fourth - third;
var fourthDifference = fifth - fourth;

$("#test1").append("1st <p><span class='glyphicon glyphicon-arrow-right' aria-hidden='true'></span>"+initialDifference+"</p>");
$("#test2").append("1st <p><span class='glyphicon glyphicon-arrow-right' aria-hidden='true'></span>"+firstDifference+"</p>");
$("#test3").append("1st <p><span class='glyphicon glyphicon-arrow-right' aria-hidden='true'></span>"+secondDifference+"</p>");
$("#test4").append("1st <p><span class='glyphicon glyphicon-arrow-right' aria-hidden='true'></span>"+thirdDifference+"</p>");
$("#test5").append("1st <p><span class='glyphicon glyphicon-arrow-right' aria-hidden='true'></span>"+fourthDifference+"</p>");

if ((firstDifference == secondDifference) && (secondDifference==thirdDifference) &&(thirdDifference ==fourthDifference)){

	alert("all values are equal");
}else{

var initialDifference2 = firstDifference - initialDifference;
var firstDifference2 = secondDifference - firstDifference;
var secondDifference2 = thirdDifference - secondDifference;
var thirdDifference2 = fourthDifference - thirdDifference;
$('#second1').append("2nd <p><span class='glyphicon glyphicon-arrow-right' aria-hidden='true'></span>"+initialDifference2+"</p>");
$('#second2').append("2nd <p><span class='glyphicon glyphicon-arrow-right' aria-hidden='true'></span>"+firstDifference2+"</p>");
$('#second3').append("2nd <p><span class='glyphicon glyphicon-arrow-right' aria-hidden='true'></span>"+secondDifference2+"</p>");
$('#second4').append("2nd <p><span class='glyphicon glyphicon-arrow-right' aria-hidden='true'></span>"+thirdDifference2+"</p>");
}
$("#closedFormArea").append("<button id ='closedForm'>Generate Closed Form Expression</button><br />");
 move("#closedForm");

a = firstDifference2 / 2;
b = initialDifference - 3*a;
findc = a+b;
c = $n -findc;

$("#closedForm").click(function(){
$("#closedFormArea #closedFormGuess").empty();
$("#closedFormArea").append("<div id ='closedFormGuess'>Tn = "+"<input type ='text' id = "+a+" class ='guess'/>n&#178; +<input type ='text' id = "+b+" class ='guess'/>n + <input type ='text' id = "+c+" class ='guess'/></div>"); 
 move(".guess");
});
});
$closedformAnswers = [];
var reccount=0;
$("#proofbutton").hide();
$( '#closedFormArea' ).on( 'keyup', '.guess', function () {  
	$("#checkAny").empty();
var value = $(this).val();
var aID = $(this).attr("id");
if (value == aID){
$(this).css('border', '3px solid green'); 
$(this).prop("readonly", true);
$closedformAnswers.push(aID);
reccount++;
}else{
	$(this).css('border', '3px solid red'); 
}   
if($closedformAnswers.length ==3){
	$('#checkAny').empty();
$( '#closedFormArea' ).append("<br /><div id = 'checkAny'>Enter a value of n:<input type ='text' id ='term'/>= <div id ='termAns'></div></div>");
move("#checkAny");
}
});

$("#closedFormArea").on("keyup", "#term", function(){
	$("#termAns").empty();

var userinput = $(this).val();
var firstterm = (userinput *userinput)*a;
var secondterm = b * userinput;
var thirdterm = c;
var answer;

answer = (firstterm + secondterm) + thirdterm;
if(userinput == ""){
	$("#termAns").empty();
}else{
$("#termAns").append("<p>U("+userinput+") = "+answer +"<br/></p>");
$("#termAns").append("<p>T("+userinput+") = "+answer+"</p.");
move("#termAns");
	$("#proofbutton").show();
}
var closedFormEq = "T(n) = " +a +"n&#178; + " +b+ "(n) +"+ c;
$("#proof").one('click', function(e){
e.preventDefault();
$("#closedFormArea").append("<div id ='proofMessage'>Go to the Mathematical Induction tab<br /><a href = '#' id = 'backtotop'>Back to top</a></div>");
move("#proofMessage");
$("#backtotop").click(function(){
move(".jumbotron");
});
$("#step1").append("Step 1");
//$("#step1Eq").append("U(n+1) ="+$firstnumber+"U(n) +"+$secondnumber+"n +"+$thirdnumber);
//$("#step1Eq").append("U(n+1) ="+$firstnumber+ "0 + " + $secondnumber+"(1) +"+$thirdnumber);
$("#step1Eq").append("Initially we need to recheck what U(1) is in our recurrence relation:<br /><br />");
var recurrenceans = "U(1) = "+ $n +"<br /><br />";
$("#step1Eq").append(recurrenceans);
$("#step1Eq").append("For step 1 to be true, when we enter 1 into our Closed-form expression we should get the same answer as the U(1) in our Recurrence Relation: <br /><br />");
$("#step1Eq").append(closedFormEq +"<br />");
$("#step1Eq").append("T(1) = "+a+"(1&#178;) + "+b+"(1) +"+c +"<br /><br />");
var closedn1 = (a*(1*1)+(b*1)+c);
$("#step1Eq").append("T(1) = "+closedn1);
if (closedn1 == $n)
{
$("#trueorFalse").append("<div id = 'true'>TRUE!</div>");
$("#step2").append("Step 2");
$("#step2Eq").append("Let's assume the recurrence relation is equal to the closed-form expression for arbitrary integer k. <br /><br />");
$("#step2Eq").append("T(k) = " +a +"k&#178; + " +b+ "(k) +"+ c+" <br /><br />");
$("#step2Eq").append("U(k) ="+$firstnumber+"U(k-1) +"+$secondnumber+"k +"+$thirdnumber+" <br /><br />");
$("#step3").append("Step 3");
$("#step3Eq").append("We want to show that U(k + 1) = T(k + 1). <br /><br />");
$("#step3Eq").append("U(k+1) ="+$firstnumber+"U(k) +"+$secondnumber+"k +"+$thirdnumber+" <br /><br />");
$("#step3Eq").append("We know that U(k) in the equation above is equal to" +a +"k&#178; + " +b+ "(k) +"+ c+" so we can replace the U(k) our recurrence relation. <br /><br />");
$("#step3Eq").append("U(k+1) ="+$firstnumber+"("+a +"k&#178; + " +b+ "(k) +"+ c+")" +$secondnumber+"k +"+$thirdnumber+" <br /><br />");

}else{
	$("#step2Eq").append("They are not equal<br /><br />");

}
});


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
$('#myTab a:last').hide();
$('#myTab a[name="test"]').hide();
if ($('.AuthUser').is(':empty')){
$('#usernametxt,#passwordtxt,#passwordtxt,#registerbutton').show();
$('#logoutbutton').hide();
}else{
$('#usernametxt,#passwordtxt,#loginbutton,#registerbutton').hide();
$('#logoutbutton').show();
$('#myTab a:last').show();
$('#myTab a[name="test"]').show();
}

});