/*SIDE SIDEBAR*/
function clickToggle() {
  $("#menu-toggle").click(function(e) {
      e.preventDefault();
      if ($( "#wrapper" ).hasClass( "toggled" )){
          $("#wrapper").removeClass("toggled");
          $("#menu-toggle").addClass("pushed");
      }
      else{
          $("#wrapper").addClass("toggled");
          $("#menu-toggle").removeClass("pushed");
      }
  });
};
/* FIN SIDENAV*/
/*   Thumbnail     */

function thumbnail() {
  $(".thumbnail").on("click", function(){
		$(".thumbnail").animate({
			width: "15em",
			height: "10em",
			duration: 0.25
		});
		$().css("visibility:", "");
	});
}
/*   Fin Thumbnail     */

$(document).ready(function() {
  clickToggle();
  thumbnail();
})
