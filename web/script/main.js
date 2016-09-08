/*SIDE SIDEBAR*/
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
/* FIN SIDENAV*/