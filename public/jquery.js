$(document).ready(function(){
 //hiding all the divs apart from home as it needs to be displayed on initial viewing
$("#Notation, #Recurrence,#MathInduction, #Test, #Review,#quadratic").hide();
//on the click of a tab
$(".nav li a").click(function(evt){
//hiding all the divs including home once this button is clicked as a new one will appear when another tab is clicked.
$("#Home, #Notation, #Recurrence,#MathInduction, #Test, #Review,#quadratic").hide();
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
            case "Review ":
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
function move(element){
var offset = $(element).offset();
$('html, body').animate({
    scrollTop: offset.top,
    scrollLeft: offset.left
});	
}
var a,b,findc,c;
$( '.result' ).on( 'keyup', '.sequenceval', function () { 

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
}
});
var difference = null;
$('#recsubmit').click(function(){
if($("#initialnumber").val().length == 0 || $("#firstnumber").val().length == 0 ||$("#secondnumber").val().length == 0 ||$("#thirdnumber").val().length == 0 ){
	alert("oops");
	$(".result").empty();
}else{
	$numbers.length = 0;
	$answers.length = 0;
	$("#findDifference").empty();
$(".result").empty();
	$("#findDiff").hide();

$answers.length = 0;
$n =  parseInt($('#initialnumber').val(), 10);
$firstnumber = parseInt($('#firstnumber').val(), 10);
$secondnumber = parseInt($('#secondnumber').val(), 10); 
$thirdnumber = parseInt($('#thirdnumber').val(), 10);
	//$i = 1;
	//$(".result").append("<p>Work out the values for the recurrence relation above and enter the answers below</p>");

	$(".result").append(("U(1) = "+$n +"<br /><div id = 'test1'></div><div id ='second1'></div>"));
	for (var i = 2; i<=6; i++){
		$answer = $firstnumber*$n+($secondnumber*i)+$thirdnumber;
	$n = $answer;
	$answers.push("<tr><td>U("+i+") = <input type = 'text' class ='sequenceval' id="+$answer+" placeholder ='Enter the value'/>"+$answer+"<div id = 'test"+i+"'></div><div id ='second"+i+"'></div>"+"</td></tr>");
}
$(".result").append($answers);

$(".result").append("");
 move(".sequenceval");
}
});

$("#findDifference").hide();
var operator;
$("#findDiff").click(function(){
$("#findDifference").empty();
$("#test1,#test2,#test3,#test4,#test5").empty();
var values = jQuery.unique( $numbers );
$("#findDifference").show();
$n =  parseInt($('#initialnumber').val(), 10);
var first = $(".sequenceval").eq(0).attr("id");
var second = $(".sequenceval").eq(1).attr("id");
var third = $(".sequenceval").eq(2).attr("id");
var fourth = $(".sequenceval").eq(3).attr("id");
var fifth = $(".sequenceval").eq(4).attr("id");

var initialDifference  = first -$n;
var firstDifference = second - first;
var secondDifference = third - second;
var thirdDifference = fourth - third;
var fourthDifference = fifth - fourth;

$("#test1").append("<p class = 'arrow'>&#8680;"+initialDifference+"</p>");
$("#test2").append("<p class = 'arrow'>&#8680;"+firstDifference+"</p>");
$("#test3").append("<p class = 'arrow'>&#8680;"+secondDifference+"</p>");
$("#test4").append("<p class = 'arrow'>&#8680;"+thirdDifference+"</p>");
$("#test5").append("<p class = 'arrow'>&#8680;"+fourthDifference+"</p>");


if ((firstDifference == secondDifference) && (secondDifference==thirdDifference) &&(thirdDifference ==fourthDifference)){

	alert("all values are equal");
}else{

var initialDifference2 = firstDifference - initialDifference;
var firstDifference2 = secondDifference - firstDifference;
var secondDifference2 = thirdDifference - secondDifference;
var thirdDifference2 = fourthDifference - thirdDifference;
$('#second1').append("<p class = 'arrow'>&#8680;"+initialDifference2+"</p>");
$('#second2').append("<p class = 'arrow'>&#8680;"+firstDifference2+"</p>");
$('#second3').append("<p class = 'arrow'>&#8680;"+secondDifference2+"</p>");
$('#second4').append("<p class = 'arrow'>&#8680;"+thirdDifference2+"</p>");
}
$("#closedFormArea").append("<button id ='closedForm'>Generate Closed Form Expression</button><br />");
 move("#closedForm");

a = firstDifference2 / 2;
b = initialDifference - 3*a;
findc = a+b;
c = $n -findc;

$("#closedForm").click(function(){

if(c<0){
	operator = "-";
 c =Math.abs(c);
}else{
	operator = "+";
}

$("#closedFormArea").append("Tn = "+"<input type ='text' id = "+a+" class ='guess'/>n&#178; +<input type ='text' id = "+b+" class ='guess'/>n "+operator+"<input type ='text' id = "+c+" class ='guess'/>"); 
 move(".guess");
});
});
$closedformAnswers = [];
var reccount=0;

$( '#closedFormArea' ).on( 'keyup', '.guess', function () {  
	$("#checkAny").empty();
var value = $(this).val();
var aID = $(this).attr("id");
if (value == aID){
$(this).css('border', '3px solid green'); 
$closedformAnswers.push(aID);
reccount++;
$(this).prop("readonly", true);
}else{
	
	$(this).css('border', '3px solid red'); 
}   
if(reccount ==3){
$( '#closedFormArea' ).append("<br /><div id = 'checkAny'>Enter a term to see if it is true far:U(<input type ='text' id ='term'/>)<br />= <div id ='termAns'></div></div>");
move("#checkAny");
}
});

$("#closedFormArea").on("keyup", "#term", function(){
	$("#termAns").empty();
	$("#proof").empty();
	$("#proofbutton").empty();
var userinput = $(this).val();
var firstterm = (userinput *userinput)*a;
var secondterm = b * userinput;
 c =-Math.abs(c);
var thirdterm = c;
var answer;
if(thirdterm<0){
answer = (firstterm + secondterm) + thirdterm;
}else{
answer = firstterm + secondterm+ thirdterm;
}
if(userinput == ""){
	$("#termAns").empty();
}
$("#termAns").append(answer);
move("#termAns");
$("#closedFormArea").append("<div id = 'proofbutton'><button id = 'proof'>Proof by Mathematical Induction</div></div>");
var closedFormEq = "U(n) = " +a +"nn&#178; + " + "3("+b +")"+ operator +" "+ c;
$("#proof").one('click', function(e){
e.preventDefault();
$("#closedFormArea").append("<div id ='proofMessage'>Go to the Mathematical Induction tab<br /><a href = '#' id = 'backtotop'>Back to top</a></div>");
move("#proofMessage");
$("#backtotop").click(function(){
move(".jumbotron");
});

$("#step1").append("Step 1");
$("#step1Eq").append(closedFormEq +"<br /> Lets see if it is true for n=1: <br />");
$('#step1Eq' ).append("<br /><div id = 'checkAny'>Enter a term to see if it is true far:U(<input type ='text' id ='term'/>)<br />= <div id ='firstTermAnswer'></div></div>");
});
});
$("#step1Eq").on("keyup", "#term", function(){
	$("#error").empty();
	$("#true").empty();
	$("#step2Eq").empty();
	$("#step3Eq").empty();
	$("#step2").empty();
	$("#step3").empty();
$("#firstTermAnswer").empty();
var userinput = $(this).val();
var firstterm = (userinput *userinput)*a;
var secondterm = b * userinput;
var thirdterm = c;
var answer;
if(thirdterm<0){
answer = (firstterm + secondterm) + thirdterm;
}else{
answer = firstterm + secondterm+ thirdterm;
}
if(userinput == ""){
	$("#termAns").empty();
	$("#error").empty();
	$("#true").empty();
}else if(userinput != 1){
$("#error").empty();
$("#true").empty();
var error = "<div id ='error'>You can only enter 1.</div>";
$("#step1Eq").append(error);
move("#error");
}else{
	$("#error").empty();
	$("#true").empty();
	$("#step2Eq").val('');
	$("#step3Eq").val('');
	
	$(this).prop("readonly", true);
	$("#firstTermAnswer").append(answer);
	$("#firstTermAnswer").append("<div id = 'true'>TRUE!</div>");
move("#firstTermAnswer");
$("#step2").append("Step 2");
$("#step2Eq").append("Let's assume n=k");
move("#step2Eq");
$("#step3").append("Step 3");
$("#step3Eq").append("Let's check if n=k+1");
move("#step3Eq");
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