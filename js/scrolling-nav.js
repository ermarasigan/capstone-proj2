//jQuery to collapse the navbar on scroll

$(window).scroll(function() {
    if ($(".navbar").offset().top > 50) {
        $("#js-header").addClass("top-nav-collapse");
    } else {
        $("#js-header").removeClass("top-nav-collapse");
    }
});

//jQuery for page scrolling feature - requires jQuery Easing plugin
function easeSearch() {
    searchparm = $("#search").val();
    if (searchparm==""){
        swal({
            title: "<span style='color:orange'>Empty</span>",
            text: "Please enter song title/artist.",
            html: true
        });
        return;
    }

    var $anchor = $(this);

    $.post("ajax/search.php",
        {
        searchparm: searchparm
        },
        function(data, status){
            if (data.length === 0){
                swal({
                    title: "<span style='color:orange'>Not found</span>",
                    text: '"' + searchparm + '" does not match any song title/artist.',
                    html: true
                    },
                    function(){
                        location.reload();
                });
                $("#searchbtn").attr('href','#');
            } 
            if (data.length > 0) {
                $("#searchbtn").attr('href','#about');
                $('html, body').stop().animate({
                    scrollTop: $($('#searchbtn').attr('href')).offset().top
                }, 1500, 'easeInOutExpo');
                event.preventDefault();
                $("#searchbtn").attr('href','#')

                setTimeout(function () {
                    location.reload();
                    }, 1500
                );
            }
        },
        "json"
    );
    $("#search").val('');
}

// On click of Search button, execute easeSearch
$(function() {
    $(document).on('click', 'a.page-scroll', function(event) {
        easeSearch();
    });
});

// On enter of input in Search bar, execute easeSearch
$(function() {
    $("#search").keypress(function( event ) {
      if ( event.which == 13 ) {
        event.preventDefault()
        easeSearch();
      }
    });
});

// Initialize and Configure Scroll Reveal Animation
    window.sr = ScrollReveal();
    sr.reveal('.icons-footer', {
        duration: 600,
        scale: 0.3,
        distance: '0px'
    }, 300);
    sr.reveal('.song-column', {
        duration: 300,
        scale: 0.3,
        distance: '0px'
    }, 300);
    sr.reveal('.pick-column', {
        duration: 300,
        scale: 0.3,
        distance: '0px'
    }, 300);