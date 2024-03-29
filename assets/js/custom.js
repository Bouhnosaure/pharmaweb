/* Bootstrap Carousel */

$('.carousel').carousel({
    interval: 8000,
    pause: "hover"
});

/* Ecommerce single item carousel */

$('.ecarousel').carousel({
    interval: 8000,
    pause: "hover"
});

/* Navigation Menu */

ddlevelsmenu.setup("ddtopmenubar", "topbar");

/* Dropdown Select */

/* Navigation (Select box) */

// Create the dropdown base

$("<select />").appendTo(".navis");

// Create default option "Go to..."

$("<option />", {
    "selected": "selected",
    "value": "",
    "text": "Menu"
}).appendTo(".navis select");

// Populate dropdown with menu items

$(".navi a").each(function() {
    var el = $(this);
    $("<option />", {
        "value": el.attr("href"),
        "text": el.text()
    }).appendTo(".navis select");
});

$(".navis select").change(function() {
    window.location = $(this).find("option:selected").val();
});


/* Recent post carousel (CarouFredSel) */

/* Carousel */



/* Scroll to Top */


$(".totop").hide();

$(function() {
    $(window).scroll(function() {
        if ($(this).scrollTop() > 300)
        {
            $('.totop').slideDown();
        }
        else
        {
            $('.totop').slideUp();
        }
    });

    $('.totop a').click(function(e) {
        e.preventDefault();
        $('body,html').animate({scrollTop: 0}, 500);
    });

});


/* Support */

$("#slist a").click(function(e) {
    e.preventDefault();
    $(this).next('p').toggle(200);
});

/* Careers */

$('#myTab a').click(function(e) {
    e.preventDefault()
    $(this).tab('show')
})

/* Countdown */

$(function() {
    launchTime = new Date();
    launchTime.setDate(launchTime.getDate() + 365);
    $("#countdown").countdown({until: launchTime, format: "dHMS"});
});

/* Ecommerce sidebar */

$(document).ready(function() {
    $('.sidey .nav').navgoco({
        caretHtml: '<i class="some-random-icon-class"></i>',
        accordion: false,
        openClass: 'open',
        save: true,
        cookie: {
            name: 'navgoco',
            expires: false,
            path: '/'
        },
        slide: {
            duration: 400,
            easing: 'swing'
        }
    });
});
$(document).ready(function() {
    $("#buttonsubmit").click(function() {
        updatecartview();
    });

    $("#btn-flush").click(function() {
        $("#form-flush").submit();
        updatecartview();
    });

    $('#addtocart').on('submit', function() {
        var $this = $(this);
        $.ajax({
            url: $this.attr('action'), // le nom du fichier indiqué dans le formulaire
            type: $this.attr('method'), // la méthode indiquée dans le formulaire (get ou post)
            data: $this.serialize(), // je sérialise les données (voir plus loin), ici les $_POST
            success: function(html) { // je récupère la réponse du fichier PHP
                $("#alert-container").html('<div class="alert alert-success fade in"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>' + html + '</strong></div>');
                $('body,html').animate({scrollTop: 0}, 500);
            }
        }).done(function(data) {
            updatecartview();
        });
        
        //updatecartview();
        return false; // j'empêche le navigateur de soumettre lui-même le formulaire
    });

    $(".close").click(function() {
        $(".alert").alert('close')
    });
});

function updateCart(parentform) {
    $("#" + parentform).submit();
    updatecartview();
}

function deleteCart(parentform) {
    $("#" + parentform).find('input[class*="quantity"]').first().val(0);
    $("#" + parentform).submit();
    updatecartview();
}

