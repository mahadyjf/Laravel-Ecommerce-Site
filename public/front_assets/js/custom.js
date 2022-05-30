/** 
  * Template Name: Daily Shop
  * Version: 1.0  
  * Template Scripts
  * Author: MarkUps
  * Author URI: http://www.markups.io/

  Custom JS
  

  1. CARTBOX
  2. TOOLTIP
  3. PRODUCT VIEW SLIDER 
  4. POPULAR PRODUCT SLIDER (SLICK SLIDER) 
  5. FEATURED PRODUCT SLIDER (SLICK SLIDER)
  6. LATEST PRODUCT SLIDER (SLICK SLIDER) 
  7. TESTIMONIAL SLIDER (SLICK SLIDER)
  8. CLIENT BRAND SLIDER (SLICK SLIDER)
  9. PRICE SLIDER  (noUiSlider SLIDER)
  10. SCROLL TOP BUTTON
  11. PRELOADER
  12. GRID AND LIST LAYOUT CHANGER 
  13. RELATED ITEM SLIDER (SLICK SLIDER)

  
**/

jQuery(function($){


  /* ----------------------------------------------------------- */
  /*  1. CARTBOX 
  /* ----------------------------------------------------------- */
    
     jQuery(".aa-cartbox").hover(function(){
      jQuery(this).find(".aa-cartbox-summary").fadeIn(500);
    }
      ,function(){
          jQuery(this).find(".aa-cartbox-summary").fadeOut(500);
      }
     );   
  
  /* ----------------------------------------------------------- */
  /*  2. TOOLTIP
  /* ----------------------------------------------------------- */    
    jQuery('[data-toggle="tooltip"]').tooltip();
    jQuery('[data-toggle2="tooltip"]').tooltip();

  /* ----------------------------------------------------------- */
  /*  3. PRODUCT VIEW SLIDER 
  /* ----------------------------------------------------------- */    

    jQuery('#demo-1 .simpleLens-thumbnails-container img').simpleGallery({
        loading_image: 'demo/images/loading.gif'
    });

    jQuery('#demo-1 .simpleLens-big-image').simpleLens({
        loading_image: 'demo/images/loading.gif'
    });

  /* ----------------------------------------------------------- */
  /*  4. POPULAR PRODUCT SLIDER (SLICK SLIDER)
  /* ----------------------------------------------------------- */      

    jQuery('.aa-popular-slider').slick({
      dots: false,
      infinite: false,
      speed: 300,
      slidesToShow: 4,
      slidesToScroll: 4,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 3,
            infinite: true,
            dots: true
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
      ]
    }); 

  
  /* ----------------------------------------------------------- */
  /*  5. FEATURED PRODUCT SLIDER (SLICK SLIDER)
  /* ----------------------------------------------------------- */      

    jQuery('.aa-featured-slider').slick({
        dots: false,
        infinite: false,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 4,
        responsive: [
          {
            breakpoint: 1024,
            settings: {
              slidesToShow: 3,
              slidesToScroll: 3,
              infinite: true,
              dots: true
            }
          },
          {
            breakpoint: 600,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 2
            }
          },
          {
            breakpoint: 480,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }
          // You can unslick at a given breakpoint now by adding:
          // settings: "unslick"
          // instead of a settings object
        ]
    });
    
  /* ----------------------------------------------------------- */
  /*  6. LATEST PRODUCT SLIDER (SLICK SLIDER)
  /* ----------------------------------------------------------- */      
    jQuery('.aa-latest-slider').slick({
        dots: false,
        infinite: false,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 4,
        responsive: [
          {
            breakpoint: 1024,
            settings: {
              slidesToShow: 3,
              slidesToScroll: 3,
              infinite: true,
              dots: true
            }
          },
          {
            breakpoint: 600,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 2
            }
          },
          {
            breakpoint: 480,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }
          // You can unslick at a given breakpoint now by adding:
          // settings: "unslick"
          // instead of a settings object
        ]
    });

  /* ----------------------------------------------------------- */
  /*  7. TESTIMONIAL SLIDER (SLICK SLIDER)
  /* ----------------------------------------------------------- */     
    
    jQuery('.aa-testimonial-slider').slick({
      dots: true,
      infinite: true,
      arrows: false,
      speed: 300,
      slidesToShow: 1,
      adaptiveHeight: true
    });

  /* ----------------------------------------------------------- */
  /*  8. CLIENT BRAND SLIDER (SLICK SLIDER)
  /* ----------------------------------------------------------- */  

    jQuery('.aa-client-brand-slider').slick({
        dots: false,
        infinite: false,
        speed: 300,
        autoplay: true,
        autoplaySpeed: 2000,
        slidesToShow: 5,
        slidesToScroll: 1,
        responsive: [
          {
            breakpoint: 1024,
            settings: {
              slidesToShow: 4,
              slidesToScroll: 4,
              infinite: true,
              dots: true
            }
          },
          {
            breakpoint: 600,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 2
            }
          },
          {
            breakpoint: 480,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }
          // You can unslick at a given breakpoint now by adding:
          // settings: "unslick"
          // instead of a settings object
        ]
    });

  /* ----------------------------------------------------------- */
  /*  9. PRICE SLIDER  (noUiSlider SLIDER)
  /* ----------------------------------------------------------- */        

    jQuery(function(){
      if($('body').is('.productPage')){
       var skipSlider = document.getElementById('skipstep');
       var short_price_start = jQuery('#short_price_start').val();
       var short_price_end = jQuery('#short_price_end').val();
       if(short_price_start == '' || short_price_end == ''){
        var short_price_start= 100;
        var short_price_end= 1500;
       }
        noUiSlider.create(skipSlider, {
            range: {
                'min': 0,
                '10%': 100,
                '20%': 200,
                '30%': 300,
                '40%': 400,
                '50%': 500,
                '60%': 700,
                '70%': 1000,
                '80%': 1300,
                '90%': 1500,
                'max': 2000
            },
            snap: true,
            connect: true,
            start: [short_price_start, short_price_end]
        });
        // for value print
        var skipValues = [
          document.getElementById('skip-value-lower'),
          document.getElementById('skip-value-upper')
        ];

        skipSlider.noUiSlider.on('update', function( values, handle ) {
          skipValues[handle].innerHTML = values[handle];
        });
      }
    });


    
  /* ----------------------------------------------------------- */
  /*  10. SCROLL TOP BUTTON
  /* ----------------------------------------------------------- */

  //Check to see if the window is top if not then display button

    jQuery(window).scroll(function(){
      if ($(this).scrollTop() > 300) {
        $('.scrollToTop').fadeIn();
      } else {
        $('.scrollToTop').fadeOut();
      }
    });
     
    //Click event to scroll to top

    jQuery('.scrollToTop').click(function(){
      $('html, body').animate({scrollTop : 0},800);
      return false;
    });
  
  /* ----------------------------------------------------------- */
  /*  11. PRELOADER
  /* ----------------------------------------------------------- */

    jQuery(window).load(function() { // makes sure the whole site is loaded      
      jQuery('#wpf-loader-two').delay(200).fadeOut('slow'); // will fade out      
    })

  /* ----------------------------------------------------------- */
  /*  12. GRID AND LIST LAYOUT CHANGER 
  /* ----------------------------------------------------------- */

  jQuery("#list-catg").click(function(e){
    e.preventDefault(e);
    jQuery(".aa-product-catg").addClass("list");
  });
  jQuery("#grid-catg").click(function(e){
    e.preventDefault(e);
    jQuery(".aa-product-catg").removeClass("list");
  });


  /* ----------------------------------------------------------- */
  /*  13. RELATED ITEM SLIDER (SLICK SLIDER)
  /* ----------------------------------------------------------- */      

    jQuery('.aa-related-item-slider').slick({
      dots: false,
      infinite: false,
      speed: 300,
      slidesToShow: 4,
      slidesToScroll: 4,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 3,
            infinite: true,
            dots: true
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
      ]
    }); 
    
});

function change_product_color_image(img, color){
  jQuery('#color_id').val(color);
  jQuery('.simpleLens-big-image-container').html('<a data-lens-image="'+img+'" class="simpleLens-lens-image"><img src="'+img+'" class="simpleLens-big-image"></a>')
}

function showColor(size){
  jQuery('#size_id').val(size);
  jQuery('.product_color').hide();
  jQuery('.size_'+size).show();
  jQuery('.size_link').css('border', '1px solid #ddd');
  jQuery('#size_'+size).css('border', '1px solid black');
  
}
function homeaddToCart(id, size_str_id, color_str_id){
  jQuery('#size_id').val(size_str_id);
  jQuery('#color_id').val(color_str_id);
  addToCart(id, size_str_id, color_str_id)
}
function addToCart(id, size_str_id, color_str_id){
  jQuery('#addToCart_mag').html("");
  let size = jQuery('#size_id').val();
  let color = jQuery('#color_id').val();
  if(size_str_id == '' && color_str_id == ''){
    size_str_id = "no";
    color_str_id = "no";
  }
  
  if(size == '' && size_str_id != "no"){
    jQuery('#addToCart_mag').html("<div class='alert alert-danger fade in alert-dismissible mt5'><a href='#' class='close' data-dismiss='alert' aria-label='close' title='close'>×</a>Pleas Select <strong>Size!</strong></div>");
  }else if(color == '' && color_str_id != "no"){
    jQuery('#addToCart_mag').html("<div class='alert alert-danger fade in alert-dismissible mt5'><a href='#' class='close' data-dismiss='alert' aria-label='close' title='close'>×</a>Pleas Select <strong>Color!</strong></div>");
  }else{
    jQuery('#product_id').val(id);
    jQuery('#pqty').val(jQuery('#qty').val());

    jQuery.ajax({
      url: '/add_to_cart',
      data: jQuery('#addToCartForm').serialize(),
      type: 'post',
      success: function(result){
        alert(result.msg);
        jQuery('#addToCart_mag').html("<div class='alert alert-success fade in alert-dismissible mt5'><a href='#' class='close' data-dismiss='alert' aria-label='close' title='close'>×</a>Product <strong>"+result.msg+"</strong></div>");
        if(result.totalItem == 0){
          jQuery('.aa-cart-notify').html('0');
          jQuery('.aa-cartbox-summary').remove();
        }else{
          jQuery('.aa-cart-notify').html(result.totalItem);
          var html = '<ul>';
          let totalPrice = 0;
          jQuery.each(result.data, function(arrkey, arrval){
             totalPrice = totalPrice+(arrval.price*arrval.qty);
            html+= '<li><a class="aa-cartbox-img" href="'+PRODUCT_DETAIL_PAGE+'/'+arrval.slug+'"><img src="'+PRODUCT_IMAGE+'/'+arrval.image+'" alt="img"></a><div class="aa-cartbox-info"><h4><a href="'+PRODUCT_DETAIL_PAGE+'/'+arrval.slug+'">'+arrval.name+'</a></h4> <p>'+arrval.qty+' x $'+arrval.price*arrval.qty+'</p></div></li>';
            
          });
          html+='<li><span class="aa-cartbox-total-title">Total</span><span class="aa-cartbox-total-price">$'+totalPrice+'</span></li>';
          html+='</ul>';
          html+='<a class="aa-cartbox-checkout aa-primary-btn" href="'+CHECKOUT+'">Checkout</a>'
            jQuery('.aa-cartbox-summary').html(html);
        }
      }
    });
  }
}

function updateQty(pid, size, color, attr_id, price){
  jQuery('#size_id').val(size);
  jQuery('#color_id').val(color);
  let qty =jQuery('#qty'+attr_id).val();
  jQuery('#qty').val(qty);
  addToCart(pid, size, color)
  jQuery('#total_price_'+attr_id).html('$ '+qty*price)
}

function deleteCartProduct(pid, size, color, attr_id){
  jQuery('#size_id').val(size);
  jQuery('#color_id').val(color);
  jQuery('#qty').val(0);
  addToCart(pid, size, color)
  jQuery('#cart_box'+attr_id).remove();
  
}

function short_by(){
  var value = jQuery('#short_by_val').val();
  jQuery('#short').val(value);
  jQuery('#shortByForm').submit();
}

function short_price_filter(){
  var valStart = jQuery('#skip-value-lower').html();
  var valEnd = jQuery('#skip-value-upper').html();
  
  jQuery('#short_price_start').val(valStart);
  jQuery('#short_price_end').val(valEnd);
  jQuery('#shortByForm').submit();
}

function color_filter(color, type){
  var ex = jQuery('#filter_color').val();
  if(type == 1){
    var new_color = ex.replace(color+':', '');
    jQuery('#filter_color').val(new_color);
  
  }else{
    jQuery('#filter_color').val(color+':'+ex);
  jQuery('#shortByForm').submit();
  }
  jQuery('#shortByForm').submit();
}

function funSearch(){
  var search = jQuery('#search').val();
  if(search != '' && search.length>3){
    window.location.href= '/search/'+search;
  }
}

jQuery('#registrationFrm').submit(function(e){
  e.preventDefault();
  jQuery('.field_error').html('');
  jQuery.ajax({
    url: 'registration_prosses',
    data: jQuery('#registrationFrm').serialize(),
    type: 'post',
    success: function(result){
      if(result.status=="error"){
        jQuery.each(result.error, function(key, val){
          jQuery('#'+key+'_error').html(val[0]);
        });
      }
      if(result.status=="success"){
        jQuery('#registrationFrm')[0].reset();
        jQuery('#success_msg').html(result.msg);
      }
    }
  });
})


jQuery('#loginFrm').submit(function(e){
  e.preventDefault();
  jQuery('#login_error_msg').html('');
  jQuery.ajax({
    url: 'login_prosses',
    data: jQuery('#loginFrm').serialize(),
    type: 'post',
    success: function(result){
      if(result.status=="error"){
        jQuery('#login_error_msg').html(result.msg);
        }
      if(result.status=="success"){
        
        window.location.href= '/';
        // jQuery('#registrationFrm')[0].reset();
        // jQuery('#success_msg').html(result.msg);
      }
    }
  });
})