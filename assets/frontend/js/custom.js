/* ==========================================================================
   matchHeight
   ========================================================================== */

   !function(t){var e=-1,a=-1,o=function(t){return parseFloat(t)||0},i=function(e){var a=1,i=t(e),n=null,r=[];return i.each(function(){var e=t(this),i=e.offset().top-o(e.css("margin-top")),s=r.length>0?r[r.length-1]:null;null===s?r.push(e):Math.floor(Math.abs(n-i))<=a?r[r.length-1]=s.add(e):r.push(e),n=i}),r},n=function(e){var a={byRow:!0,property:"height",target:null,remove:!1};return"object"==typeof e?t.extend(a,e):("boolean"==typeof e?a.byRow=e:"remove"===e&&(a.remove=!0),a)},r=t.fn.matchHeight=function(e){var a=n(e);if(a.remove){var o=this;return this.css(a.property,""),t.each(r._groups,function(t,e){e.elements=e.elements.not(o)}),this}return this.length<=1&&!a.target?this:(r._groups.push({elements:this,options:a}),r._apply(this,a),this)};r.version="master",r._groups=[],r._throttle=80,r._maintainScroll=!1,r._beforeUpdate=null,r._afterUpdate=null,r._rows=i,r._parse=o,r._parseOptions=n,r._apply=function(e,a){var s=n(a),h=t(e),c=[h],l=t(window).scrollTop(),p=t("html").outerHeight(!0),d=h.parents().filter(":hidden");return d.each(function(){var e=t(this);e.data("style-cache",e.attr("style"))}),d.css("display","block"),s.byRow&&!s.target&&(h.each(function(){var e=t(this),a=e.css("display");"inline-block"!==a&&"inline-flex"!==a&&(a="block"),e.data("style-cache",e.attr("style")),e.css({display:a,"padding-top":"0","padding-bottom":"0","margin-top":"0","margin-bottom":"0","border-top-width":"0","border-bottom-width":"0",height:"100px",overflow:"hidden"})}),c=i(h),h.each(function(){var e=t(this);e.attr("style",e.data("style-cache")||"")})),t.each(c,function(e,a){var i=t(a),n=0;if(s.target)n=s.target.outerHeight(!1);else{if(s.byRow&&i.length<=1)return void i.css(s.property,"");i.each(function(){var e=t(this),a=e.css("display");"inline-block"!==a&&"inline-flex"!==a&&(a="block");var o={display:a};o[s.property]="",e.css(o),e.outerHeight(!1)>n&&(n=e.outerHeight(!1)),e.css("display","")})}i.each(function(){var e=t(this),a=0;s.target&&e.is(s.target)||("border-box"!==e.css("box-sizing")&&(a+=o(e.css("border-top-width"))+o(e.css("border-bottom-width")),a+=o(e.css("padding-top"))+o(e.css("padding-bottom"))),e.css(s.property,n-a+"px"))})}),d.each(function(){var e=t(this);e.attr("style",e.data("style-cache")||null)}),r._maintainScroll&&t(window).scrollTop(l/p*t("html").outerHeight(!0)),this},r._applyDataApi=function(){var e={};t("[data-match-height], [data-mh]").each(function(){var a=t(this),o=a.attr("data-mh")||a.attr("data-match-height");o in e?e[o]=e[o].add(a):e[o]=a}),t.each(e,function(){this.matchHeight(!0)})};var s=function(e){r._beforeUpdate&&r._beforeUpdate(e,r._groups),t.each(r._groups,function(){r._apply(this.elements,this.options)}),r._afterUpdate&&r._afterUpdate(e,r._groups)};r._update=function(o,i){if(i&&"resize"===i.type){var n=t(window).width();if(n===e)return;e=n}o?-1===a&&(a=setTimeout(function(){s(i),a=-1},r._throttle)):s(i)},t(r._applyDataApi),t(window).bind("load",function(t){r._update(!1,t)}),t(window).bind("resize orientationchange",function(t){r._update(!0,t)})}(jQuery);	
   /* ========================================================================== */

    

    

    

    

    $(function(){



     /*---------------------- Main menu With drop down -----------------------*/

        

     function menuSettings(){

          

      // detect drop down for adding class

      $(".main-menu ul li").find("> ul").parent().addClass("dropdown");



      $(".main-menu ul li").find("> .mega-drop").parent().addClass("drp");

      

      // create mobile menu

      var menuHtml = $(".main-menu").html();

      $(".mobile-menu .container").html(menuHtml);

      

      // top links add to main nav (for mobile)

      var topnavHtml = $(".main-menu > ul.menu-list2").html();

      $(".mobile-menu ul.menu-list > li:last-child()").after(topnavHtml);

      

      // mobile menu toggle

      $(".mobile-menu .menu-toggle").click(function(){

        $(this).parent().find(">ul.menu-list").stop(true, true).slideToggle(150);

        $(this).toggleClass("active");

      });

      

    }

    

    menuSettings();

    

    // ----------------------------- Dropdown menu -----------------------------   

        

    

      // drp menu 

      $(".mobile-menu .menu-list li").find(".mega-drop").parent().addClass("drp");

      var allAccordion = $('.mega-drop');

      var allAccordionItem = $('.mobile-menu .menu-list li.drp > a');

      $(allAccordionItem).click(function () {



          if ($(this).hasClass('open')) {

              $(this).removeClass('open');

              $(this).next().slideUp(100);

          }

          else {



              allAccordion.slideUp(100);

              allAccordionItem.removeClass('open');

              $(this).addClass('open');

              $(this).next().slideDown(100);

              return false;

          }

      });

    

    

    function menuMobile(){

      // drp menu 

      var allAccordion = $('.mobile-menu ul.menu-list > li > ul');

      var allAccordionItem = $('.mobile-menu ul.menu-list > li.dropdown > a');

      $(allAccordionItem).click(function() {

        

        if($(this).hasClass('open'))

        {

          $(this).removeClass('open');

          $(this).next().slideUp(150);

        }

        else

        {

          allAccordion.slideUp(150);

          allAccordionItem.removeClass('open');

          $(this).addClass('open');

          $(this).next().slideDown(150);

          return false;

        }

      });

      /* Menu Second Level  */

      var allAccordion1 = $('.mobile-menu ul.menu-list > li > ul > li >ul');

      var allAccordionItem1 = $('.mobile-menu ul.menu-list > li > ul >li.dropdown > a');

      $(allAccordionItem1).click(function () {



        if ($(this).hasClass('open')) {

          $(this).removeClass('open');

          $(this).next().slideUp(150);

        }

        else {

          allAccordion1.slideUp(150);

          allAccordionItem1.removeClass('open');

          $(this).addClass('open');

          $(this).next().slideDown(150);

          return false;

        }

      });

    }

    menuMobile();

    

    /* ==========================================================================

        Menu with dropdown menu End 27-01-2021

        ========================================================================== */

});













$(function () {



  // CONFIG

  let visibilityIds = ['#counters_1', '#counters_2', '#counters_3']; //must be an array, could have only one element

  let counterClass = '.counter';

  let defaultSpeed = 3000; //default value



  // END CONFIG



  //init if it becomes visible by scrolling

  $(window).on('scroll', function () {

      getVisibilityStatus();

  });



  //init if it's visible by page loading

  getVisibilityStatus();



  function getVisibilityStatus() {

      elValFromTop = [];

      var windowHeight = $(window).height(),

          windowScrollValFromTop = $(this).scrollTop();



      visibilityIds.forEach(function (item, index) { //Call each class

          try { //avoid error if class not exist

              elValFromTop[index] = Math.ceil($(item).offset().top);

          } catch (err) {

              return;

          }

          // if the sum of the window height and scroll distance from the top is greater than the target element's distance from the top, 

          //it should be in view and the event should fire, otherwise reverse any previously applied methods

          if ((windowHeight + windowScrollValFromTop) > elValFromTop[index]) {

              counter_init(item);

          }

      });

  }



  function counter_init(groupId) {

      let num, speed, direction, index = 0;

      $(counterClass).each(function () {

          num = $(this).attr('data-TargetNum');

          speed = $(this).attr('data-Speed');

          direction = $(this).attr('data-Direction');

          easing = $(this).attr('data-Easing');

          if (speed == undefined) speed = defaultSpeed;

          $(this).addClass('c_' + index); //add a class to recognize each counter

          doCount(num, index, speed, groupId, direction, easing);

          index++;

      });

  }



  function doCount(num, index, speed, groupClass, direction, easing) {

      let className = groupClass + ' ' + counterClass + '.' + 'c_' + index;

      if(easing == undefined) easing = "swing";

      $(className).animate({

          num

      }, {

          duration: +speed,

          easing: easing,

          step: function (now) {

              if (direction == 'reverse') {

                  $(this).text(num - Math.floor(now));

              } else {

                  $(this).text(Math.floor(now));

              }

          },

          complete: doCount

      });

  }

}) 































    $(function(){



        //banner slider

        $('.banner-slider.owl-carousel').owlCarousel({

            items:1,

            loop:true,

            autoplay:true,

            nav:true,

            dots:false

        });





  // Home Partners & Customers

  $(document).ready(function(){

    $('.services-slider.owl-carousel').owlCarousel({

      items:1,

      loop:true,

      margin:15,

      autoplay:false,

      nav:true,

      navText: false,

      dots:false,

      responsive:{

          0:{

              items:1

          },

          320:{

              items:1

          },

          767:{

              items:2

          },

          991:{

              items:3

          },

          1200:{

              items:3

          }

      }

    });

});

        
    // Home Partners & Customers

    $(document).ready(function(){

        $('.testimonials-slider.owl-carousel').owlCarousel({

            items:1,

            loop:true,

            margin:45,

            autoplay:false,

            nav:true,

            navText: false,

            dots:false,

            responsive:{

                0:{

                    items:1

                },

                600:{

                    items:1   

                },

                767:{

                    items:2

                },

                991:{

                    items:2

                },

                1200:{

                    items:3

                },

                1366:{

                    items:3

                }

            }

        });

    });







        



      // Gallery

      $(document).ready(function(){

        $('.similar-products.owl-carousel').owlCarousel({

          items:1,

          loop:true,

          margin:20,

          autoplay:true,

          mouseDrag:true,

          nav:true,

          navText: ["<span class='fa fa-angle-left'></span>", "<span class='fa fa-angle-right'></span>"],

          dots:false,

          responsive:{

              0:{

                  items:1,

                  nav:false,

                  dots:true

              },

              767:{

                  items:3

              },

              991:{

                  items:4

              },

              1200:{

                  items:4

              }

          }

        });

    });





});



      











        // Home Partners & Customers

        $(document).ready(function(){

            $('.product-services.owl-carousel').owlCarousel({

              items:1,

              loop:true,

              margin:20,

              autoplay:true,

              nav:false,

              dots:false,

              responsive:{

                  0:{

                      items:1

                  },

                  600:{

                      items:2

                  },

                  767:{

                      items:3

                  },

                  991:{

                      items:4

                  },

                  1200:{

                      items:5

                  },

                  1366:{

                      items:6

                  }

              }

            });

        });



        // $('.testimonials-block .owl-carousel button.owl-dot').attr('aria-label', 'owl-dot');



        // $(".prev").click(function(){

        //     $(".news-carousel .owl-prev").trigger('click');	 

        // });

        // $(".next").click(function(){

        //     $(".news-carousel .owl-next").trigger('click');	 

        // });



        $(".owl-dot").attr('aria-label',"slide-dot");





    //Match Height

    $(".same").matchHeight({

        property: 'height',	

    });

    $(".cm-height").matchHeight({

        property: 'height',	

    });

    $(".equal-height").matchHeight({

        property: 'height',	

    });





    //Tooltip

    $(".categories-click").click(function(){

        $(this).next().stop(true, true).toggleClass("open");

        $(this).toggleClass("active");

    });







    $(function(){



        //left/Right margin

        function minusMargin() {

            var winWidth = $(window).width();

            var containerWidth = $(".container").width();

            var csWidth = (winWidth - containerWidth) / 2;

            $(".touch-right").css({ 'margin-right': -csWidth});

            $(".touch-left").css({ 'margin-left': -csWidth });

        }

        minusMargin();

        $(window).resize(function () {

            minusMargin();

        });





        //Mobile search

        $(".head-search-btn").click(function(){

            $(this).parent().stop(true, true).toggleClass("active");

            $(this).toggleClass("active");

        });

        $('body').click(function () {

            $('.head-search-btn').removeClass("active");

            $('.header-search').removeClass("active");

        });

        $('.head-search-btn, .header-search').click(function (event) {

            event.stopPropagation();

        });





        //Simple Accordien

        $(function($) {

            var allAccordions = $('.accordion .accordion-box div.data');

            var allAccordionItems = $('.accordion .accordion-box .accordion-item');

            $('.accordion > .accordion-box > .accordion-item').click(function() {

                if($(this).hasClass('open'))

                {

                    $(this).removeClass('open');

                    $(this).next().slideUp(150);

                }

                else

                {

                    allAccordions.slideUp(150);

                    allAccordionItems.removeClass('open');

                    $(this).addClass('open');

                    $(this).next().slideDown(150);

                    return false;

                }

            });

        });    

        

    });







    const Utils = {

  

        addClass: function(element, theClass) {

          element.classList.add(theClass);

        },

        

        removeClass: function(element, theClass) {

          element.classList.remove(theClass);

        },

        

        showMore: function(element, excerpt) {

          element.addEventListener("click", event => {

            const linkText = event.target.textContent.toLowerCase();

            event.preventDefault();

            

            console.log(this);

            if (linkText == "show more") {

              element.textContent = "Show less";

              this.removeClass(excerpt, "excerpt-hidden");

              this.addClass(excerpt, "excerpt-visible");

            } else {

              element.textContent = "Show more";

              this.removeClass(excerpt, "excerpt-visible");

              this.addClass(excerpt, "excerpt-hidden");

            }

          });

        } 

      };

      

      const ExcerptWidget = {

        showMore: function(showMoreLinksTarget, excerptTarget) {

         const showMoreLinks = document.querySelectorAll(showMoreLinksTarget);

          

         showMoreLinks.forEach(function(link) {

           const excerpt = link.previousElementSibling.querySelector(excerptTarget);

           Utils.showMore(link, excerpt);

         });

        }

      };

       

      ExcerptWidget.showMore('.js-show-more', '.js-excerpt');



