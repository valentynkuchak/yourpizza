jQuery(document).ready(function ($) {

  $(function(){
    setInterval(function () {
        moveRight();
    }, 4500);
  });

//   function myLoop () {           //  create a loop function
//    setTimeout(function () {    //  call a 3s setTimeout when the loop is called
//       i++;                     //  increment the counter
//       if (i < 10) {            //  if the counter < 10, call the loop function
//          myLoop();             //  ..  again which will trigger another 
//       }                        //  ..  setTimeout()
//    }, 4500)
// }
  
	var slideCount = $('#slider ul li').length;
	var slideWidth = $('#slider ul li').width();
	var slideHeight = $('#slider ul li').height();
	var sliderUlWidth = slideCount * slideWidth;
	
	$('#slider').css({ width: slideWidth, height: slideHeight });
	
	$('#slider ul').css({ width: sliderUlWidth, marginLeft: - slideWidth });
	
    $('#slider ul li:last-child').prependTo('#slider ul');

    function moveLeft() {
        $('#slider ul').animate({
            left: + slideWidth
        }, 900, function () {
            $('#slider ul li:last-child').prependTo('#slider ul');
            $('#slider ul').css('left', '');
        });
    };

    function moveRight() {
        $('#slider ul').animate({
            left: - slideWidth
        }, 900, function () {
            $('#slider ul li:first-child').appendTo('#slider ul');
            $('#slider ul').css('left', '');
        });
    };

    $('a.control_prev').click(function () {
        event.preventDefault();
        moveLeft();
    });

    $('a.control_next').click(function () {
        event.preventDefault();
        moveRight();
    });

});    
