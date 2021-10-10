// $(document).ready(function(){

$(".headersingin").click(function() {
	$('#exampleModalCenter2').modal('show');
})
$(".signinasbuyer").click(function() {
	$('#exampleModalCenter').modal('show');
})
$(".loginasbuyerpopupshow").click(function() {
	$('#exampleModalCenter2').modal('hide');
	$("#loginasbuyer").modal('show');
})
$(".loginasbuyersave").click(function(){
	$("#loginasbuyer").modal('hide');
})
$(".loginassellershow").click(function(){
	$('#exampleModalCenter2').modal('hide');
	$("#loginasseller").modal('show');
})
$(".loginasbuyersave").click(function(){
	$("#loginasseller").modal('hide');
})
$(".signupasbuyershow").click(function(){
	$("#signupasbuyer").modal('show');
})
$(".signasbuyersave").click(function(){
	$("#signupasbuyer").modal('hide');
})
$(".signupasselleropen").click(function(){
	$("#signasseller").modal("show");
})
$(".signassellersave").click(function(){
	$("#signasseller").modal("hide");
})
$('.multiple-items').slick({
	infinite: true,
 	slidesToShow: 3,
	slidesToScroll: 3,
	prevArrow:"<button type='button' class='slick-prev pull-left'><i class='fa fa-angle-left' aria-hidden='true'></i></button>",
    nextArrow:"<button type='button' class='slick-next pull-right'><i class='fa fa-angle-right' aria-hidden='true'></i></button>"
});
$(".mnc").hover(function(){
 	$(this).parent().find(".imglink").addClass("imglinkimagchangeeffect");
 	$(this).parent().find(".ticket-icon").addClass("zIndex2");
  	}, function(){
  	$(".imglink").removeClass("imglinkimagchangeeffect");
  	$(".ticket-icon").removeClass("zIndex2");
});
// });
