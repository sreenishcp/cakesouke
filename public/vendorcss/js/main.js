$(document).ready(function() {
  "use strict";

  PageLoad();

  $('.chat-list-item .avatar,.chat-list-item .chat-bttn').on('click', function() {
      $('.chat-content').addClass('mobile-active');
      return false;
    });

  $('.back-chat-div').on('click', function() {
    $('.chat-content').removeClass('mobile-active');
    return false;
  });

  $('.fab').on('click', function() {
    $(this).toggleClass('open');
    $('.option').toggleClass('open');
    $('.close').toggleClass('open');
  })

  $('#floating-button').on('click', function() {
    $(this).closest('#container-floating').toggleClass('is-opened');
    $('.nds').removeClass('is-opened');
    $('body').toggleClass('is-blur');
  })

    $('.nds').on('click', function() {
      $('.nds').not(this).removeClass('is-opened');
      $(this).toggleClass('is-opened');
    })

  $('.emoji-bttn').on('click', function() {
      $('.emoji-wrap').toggleClass('active');
      return false;
  });

  $('#sidebar-right').on('click', function() {
      $('.perspective').addClass('animate');
      return false;
  });
  $('#close-sidebar').on('click', function() {
      $('.perspective').removeClass('animate');
      return false;
  });
    $('.close-sidebar').on('click', function() {
      $('.perspective').removeClass('animate');
      return false;
  });

  $('.add').on('click', function() {
      if ($(this).prev().val() < 3) {
        $(this).prev().val(+$(this).prev().val() + 1);
      }
  });
  $('.sub').on('click', function() {
      if ($(this).next().val() > 1) {
        if ($(this).next().val() > 1) $(this).next().val(+$(this).next().val() - 1);
      }
  });

  $('[data-toggle="tooltip"]').tooltip()

  
  $('.shop-categoris').owlCarousel({
      loop:true,
      margin:0,
      nav:false,
      autoplay:true,  
      dots:false,
      items:5
  })

  $('.special-slider').owlCarousel({
      loop:true,
      margin:10,
      nav:false,
      autoplay:false,  
      dots:false,
      items:2
    })
  $('.food-cat').owlCarousel({
      loop:true,
      margin:10,
      nav:false,
      autoplay:false,  
      dots:false,
       autoWidth:true,
      items:4 

  })
 

  var $owl = $('.item-category-link')

  $owl.children().each( function( index ) {
    $(this).attr( 'data-position', index ); // NB: .attr() instead of .data()
  });

  $owl.owlCarousel({
    center: true,
    loop: true,
    items: 4,
    autoWidth:true,
    dots:false,
  });

  $(document).on('click', '.owl-item>div.item.text-left', function() {
    var data_tab = $(this).find('h4').attr('data-profile');
     
        $('.profile-content-tab').removeClass('active-tab');
        $('#'+data_tab).addClass('active-tab');
    
    var $speed = 300; 
    $owl.trigger('to.owl.carousel', [$(this).data( 'position' ), $speed] );
  });

  $('.travel-slider').owlCarousel({
      loop:true,
      margin:10,
      nav:false,
      autoplay:false,  
      dots:false,
      items:2
       
  })
  $('.single-product').owlCarousel({
      loop:true,
      margin:0,
      nav:true,
      autoplay:false,  
      dots:true,
      items:1       
  })
  $('.item-banner').owlCarousel({
      loop:false,
      margin:10,
      nav:false,
      autoplay:false,  
      dots:false,
      items:2
       
    })

  $('.slider-0').owlCarousel({
      loop:false,
      margin:5,
      nav:false,
      autoplay:false,  
      dots:false,
      responsive:{
          0:{
              items:6
          },
          600:{
              items:6
          },
          1000:{
              items:6
          },
          1400:{
              items:3
          }
      }
  })

  var owlslide_1 = $('.slider-1')
    owlslide_1.owlCarousel({
      loop:false,
      margin:0,
      nav:false,
      autoplay:false,  
      mouseDrag:true,  
      touchDrag:true,  
      dots:true,
      responsive:{
          0:{
              items:1
          },
          600:{
              items:1
          },
          1000:{
              items:1
          }
      }
    })

    $('.start-tour,.next-tour').on('click', function() {
      owlslide_1.trigger('next.owl.carousel');
    });
  
  
    $(".imgAdd").click(function(){
      $(this).closest(".row").find('.imgAdd').before('<div class="col-4a imgUp"><div class="imagePreview"></div><label class="btn btn-primary">Upload<input type="file" class="uploadFile img" value="Upload Photo" style="width:0px;height:0px;overflow:hidden;"></label><i class="fa fa-times del"></i></div>');
    });
    $(document).on("click", "i.del" , function() {
      $(this).parent().remove();
    });
    $(function() {
        $(document).on("change",".uploadFile", function()
        {
            var uploadFile = $(this);
            var files = !!this.files ? this.files : [];
            if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support
     
            if (/^image/.test( files[0].type)){ // only image file
                var reader = new FileReader(); // instance of the FileReader
                reader.readAsDataURL(files[0]); // read the local file
     
                reader.onloadend = function(){ // set image data as background of div
                    //alert(uploadFile.closest(".upimage").find('.imagePreview').length);
    uploadFile.closest(".imgUp").find('.imagePreview').addClass('imagePreviewMain').css("background-image", "url("+this.result+")");
                }
            }
          
        });
    });
  
});


 



function PageLoad() {
  jQuery(window).on("load", function(){
        setInterval(function(){ 
            $('.preloader-wrap').fadeOut(300);
        }, 400);
        setInterval(function(){ 
            $('body').addClass('loaded');
        }, 600); 
  });
}

 
 

function initImageUpload(box) {
  let uploadField = box.querySelector('.image-upload');

  uploadField.addEventListener('change', getFile);

  function getFile(e){
    let file = e.currentTarget.files[0];
    checkType(file);
  }
  
  function previewImage(file){
    let thumb = box.querySelector('.js--image-preview'),
        reader = new FileReader();

    reader.onload = function() {
      thumb.style.backgroundImage = 'url(' + reader.result + ')';
    }
    reader.readAsDataURL(file);
    thumb.className += ' js--no-default';
  }

  function checkType(file){
    let imageType = /image.*/;
    if (!file.type.match(imageType)) {
      throw 'Datei ist kein Bild';
    } else if (!file){
      throw 'Kein Bild gewählt';
    } else {
      previewImage(file);
    }
  }
  
}

// initialize box-scope
var boxes = document.querySelectorAll('.box');

for (let i = 0; i < boxes.length; i++) {
  let box = boxes[i];
  initDropEffect(box);
  initImageUpload(box);
}



