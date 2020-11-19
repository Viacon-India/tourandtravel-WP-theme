$().ready(function() {
  //initialize aos
  AOS.init();

  $(document).scroll(function() {
    //parallax scroll on hero image
    let scrolled = $(this).scrollTop();
    // console.log(scrolled / 2 + "px");
    $(".hero img").css("top", -scrolled / 5 + "px");
    // console.log(scrolled / 1 + "%");
    $(".hero img").css({
      transform: "scale(" + (100 + scrolled / 9) / 100 + ")"
    });
    
    // $(".hero video").css({
    //   transform: "rotate(180deg) scale(" + (100 + scrolled / 9) / 100 + ")"
    // });
  });

  $(function() {
    //makes card title clickable
    $(".card .card-title").click(function() {
      let link = $(this)
        .closest(".card")
        .find("a")
        .attr("href");
      window.location = link;
    });

    //makes card image clickable
    $(".card img").click(function() {
      let link = $(this)
        .closest(".card")
        .find("a")
        .attr("href");
      window.location = link;
    });
    
    //makes card2 image clickable
    $(".card2 img").click(function() {
      let link = $(this)
        .closest(".card2")
        .find("a")
        .attr("href");
      window.location = link;
    });
    
    //makes card3 image clickable
    $(".card3 img").click(function() {
      let link = $(this)
        .closest(".card3")
        .find("a.top-post-title")
        .attr("href");
        if (link == null) link = "#";
      window.location = link;
    });

    //control sibcription form
    $("#subscription-btn").click(function() {
      $("subscription-form").modal();
    });
  });
});

$(document).ready(function () {
  
  'use strict';
  
   var c, currentScrollTop = 0,
       navbar = $('nav.navbar');

   $(window).scroll(function () {
      var a = $(window).scrollTop();
      var b = navbar.height();
     
      currentScrollTop = a;
     
      if (c < currentScrollTop && a > b + b) {
        navbar.addClass("scrollUp");
        // console.log("Testing header");
      } else if (c > currentScrollTop && !(a <= b)) {
        navbar.removeClass("scrollUp");
      }
      c = currentScrollTop;
  });
  
});

jQuery(document).ready(function($) {
    
      $('.top-search').hide();
      $('.travel-search').on("click", function(){
          $('.top-search').slideToggle();
          $(".top-search").animate({height: "80px"});
          $(".top-search").find('input[type="search"]').focus();
      });
      $(window).scroll(function () {
          $('.top-search').hide();
      });
      
      $('a').each(function() {
           var a = new RegExp('/' + window.location.host + '/');
           if(!a.test(this.href)) {
               $(this).click(function(event) {
                   event.preventDefault();
                   event.stopPropagation();
                   window.open(this.href, '_blank');
               });
           }
      });

      $('.footer-newsletter input[type="text"]').attr("placeholder", "Your Name");
      $('.footer-newsletter input[type="email"]').attr("placeholder", "Your Email");
        
      $(".commment-body").hide();
      $(".commment-nubmer-div").click(function () {
    	  $(".commment-body").toggle("slow");
    	  $('.commment-nubmer-div').toggleClass('active');
      });
    
      let images = document.getElementsByTagName("img");
    
      for (var i = 0; i < images.length; i++) addAlt(images[i]);
    
      //adds alt value from file name
      function addAlt(el) {
        if(el.getAttribute("alt")) return;
		//alert(el.getAttribute("alt"));
        url = el.src;
        let filename = url.substring(url.lastIndexOf("/") + 1);
        
        if(!filename) {
            filename= 'tour-and-travel-image';
        }
        filename = filename
          .split(".")
          .slice(0, -1)
          .join(".");
        
        el.setAttribute("alt", filename);
      }
    });

    function copyToClipboard(element) {
        
        alert('copied');
      $('#p1').text(window.location);
      var $temp = $("<input>");
      $("body").append($temp);
      $temp.val($(element).text()).select();
      document.execCommand("copy");
      $temp.remove();
      $('#link-copy-msg').show();
      setTimeout(function(){
         document.getElementById("link-copy-msg").innerHTML= 'Link Copied';
      },3000);
      
    }

jQuery(document).ready(function ($) {
	
	$(document).on('submit','#tech_contact_form', function (e) {
        e.preventDefault();
        var _data = $(this).serialize();
		$('.contact-loader').show();
        $.post(Front.ajaxurl, _data, function (resp) {
			$('.contact-loader').hide();
            if(resp.flag == true) {
                $('.success-msg').show();
                $('.success-msg').append('<span class="smessage" style="color: green;">' + resp.msg + '</span>');
                $('#tech_contact_form').trigger("reset");
                setTimeout(function() {
                  $('span.smessage').remove();
                  $('.success-msg').hide();
                }, 6000);
            } else {
                $('.error-msg').show();
                $('.error-msg').append('<span class="emessage" style="color: red;">' + resp.msg + '</span>');
                setTimeout(function() {
                  $('span.emessage').remove();
                  $('.error-msg').hide();
                }, 6000);
            }
        }, 'json');

    });
});
