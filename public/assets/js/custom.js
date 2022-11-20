var navBar = document.getElementById('navBar')
var mainMenu = document.getElementById('mainMenu')

$("#navBar").click(function() {
    $("#mainMenu").slideToggle("500", function() {

    });
});



function Submenu(id) {



    var classlength = $('.submenu').length;

    for (var i = 1; i <= classlength; i++) {

        if (id == i) {

        } else {

            $("#submenu" + i).hide("500", function() {

            });
        }


    }


    $("#submenu" + id).slideToggle("500", function() {

    });
}




// navBar.addEventListener("click", function(){
//     mainMenu.classList.toggle('showNav');
// });