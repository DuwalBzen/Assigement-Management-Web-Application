var formdata = [];
$(function () {
    $('.testimonialbxslider').bxSlider({
        captions: false
    });

    $('.verifiedPropertiesSlider').bxSlider({
        captions: false
    });

    $.validator.addMethod("script", function (value, element) {
        var div = document.createElement("DIV");
        div.innerHTML = value;
        return div.getElementsByTagName("script").length > 0 ? false : true;
    }, 'Please input valid content.');

    $(".prvstpbtn").click(function () {
        var current = $(this).closest("form");
        current.hide().prev("form").show();
        progress(current.prev("form").data("step"));
    });

    $('.backBtn, .close-form-btn').click(function () {
        $('.cashOfferSection').removeClass('open');
        $('body').css({"overflow": "auto", "padding-right": "0"});
    });

    $('#search-form').validate({
        submitHandler: function (form) {
            showPopup();
            return false;
        }
    });

    $('#step-1').validate({
        rules: {
            full_name: {
                required: true,
                script: true
            },
            email: {
                required: true,
                email: true
            },
            phone: {
                required: true,
                digits: true,
                maxlength: 10
            }
        },
        submitHandler: function (form) {
            formdata[0] = $(form).serialize();
            $(form).hide().next("form").show();
            progress("second");
            return false;
        }
    });

    $('#step-2').validate({
        rules: {
            address1: {
                required: true,
                script: true
            },
            address2: {
                script: true
            },
            town: {
                required: true,
                script: true
            },
            country: {
                required: true,
                script: true
            },
            postcode: {
                required: true,
                script: true
            },
            property_type: {
                required: true,
                script: true
            }
        },
        submitHandler: function (form) {
            formdata[1] = $(form).serialize();
            $.ajax({
                url: $(form).attr("action"),
                type: 'POST',
                data: formdata.join('&'),
                beforeSend: function () {
                    $(form).find("input[type=submit], input[type=button]").prop('disabled', true);
                    setTimeout(function() {
                        $(form).closest(".cashStepform").hide();
                        progress("fourth");
                        $("#step-3").show();
                    }, 1000);
                },
                success: function (data) {
                    data = JSON.parse(data);
                    if (data.hasOwnProperty("error")) {
                        if (data.error) {
                            alert(data.message);
                        } else {
                            resetForms();
                        }
                    } else {
                        alert("Some problem in processing request. Please try again.");
                    }
                },
                complete: function (jqXHR, textStatus) {
                    $(form).find("input[type=submit], input[type=button]").prop('disabled', false);
                }
            });
            return false;
        }
    });

     //For mobile menu
      $('.menuBtn').click(function(e){
        e.stopPropagation()
        $('.mobile-menu').animate({"right":"0"},0, function(){
          setTimeout(function(){
           $('.mobile-menu').addClass('open');
          },500)
        })
      });
      $('.close-menu').click(function(){
        $('.mobile-menu').css("right","-340px").removeClass('open');
      });

      $('body').click(function(e){
        $('.mobile-menu').css("right","-340px").removeClass('open');
      });

      $('.mobile-menu').click(function(e){
        e.stopPropagation()
      });//end
    
});

function resetForms() {
    formdata = [];
    $.each($('#search-form, .cashStepform form').find("input[type='text'], textarea"), function () {
        $(this).val("");
    });
}

function progress(step) {
    $("#steps").removeClass().addClass(step);
}

function showPopup() {
	$("#step-3, .cashStepform form").hide();
    $(".cashStepform form:first").show();
    $('.cashOfferSection').addClass('open');
    progress("first");
    $('body').css({"overflow": "hidden", "padding-right": "15px"});
}


(function($) {
  "use strict"; // Start of use strict

  // Smooth scrolling using jQuery easing
  $('a.js-scroll-trigger[href*="#"]:not([href="#"])').click(function() {
    if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      if (target.length) {
        $('html, body').animate({
          scrollTop: (target.offset().top - 112)
        }, 1000, "easeInOutExpo");
        return false;
      }
    }
  });

  // Closes responsive menu when a scroll trigger link is clicked
  $('.js-scroll-trigger').click(function() {
    $('.navbar-collapse').collapse('hide');
  });

  // Activate scrollspy to add active class to navbar items on scroll
  $('body').scrollspy({
    target: '#mainNav',
    offset: 80
  });

})(jQuery); // End of use strict
