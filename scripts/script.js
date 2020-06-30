$(window).on('load', function() {
  var open = false;
  var height = $(".mobile-navbar .menu").height(); // in px
  /* tova da go eliminiram niakaksi, samo ot children da vzema samia height, ili?! */
  $(".mobile-navbar .menu")
    .css("height", 0)
    .css("visibility", "visible");
  
  $(".mobile-navbar .menu-icon").on("click", function() {
    if(open == false) {
      $(this)
        .removeClass("fa-bars")
        .addClass("fa-times");
//      $(".mobile-navbar .menu").css("height", height+"px");
        $(".mobile-navbar .menu").css("height", '100vh');
    } else {
      $(this)
        .removeClass("fa-times")
        .addClass("fa-bars");
      $(".mobile-navbar .menu").css("height", 0);
    }
    open = !open;
  });
});

$(window).on('load', function() {
    var scrollOffset = $(document).scrollTop(); // in px
    if(scrollOffset >= 500) {
        animateTopContentScrollInitial();
    }
})

// TODO: opraviane buga, vav koito kato scrollnesh tvarde barzo niama da blurne do maksimalnoto, koeto triabva pri offset 500

function animateTopContentScrollInitial() {
    var scrollOffset = 500;
    // TODO: TO FIX DA RABOTI SAS OPACITY!!!!
//    $(".top-content")
//      .css("filter", "blur(" + ((scrollOffset/500)*10) + "px)")
//      .css("transform", "scale("+ (1.0-(scrollOffset/500)*0.1) + ", " + (1.0-(scrollOffset/500)*0.1) +")");
    
    $(".scroll-scale")
        .css("transform", "scale("+ (1.0-(scrollOffset/500)*0.1) + ", " + (1.0-(scrollOffset/500)*0.1) +")");
      
      $(".scroll-fade-in")
        .css("opacity", scrollOffset/500)
      $(".scroll-fade-out")
        .css("opacity", 1-scrollOffset/500);
}

var ticking = false;
var prevOffset = 0;

/* da vida tiahnia initial size kak da e vav samia css */
function animateTopContentScroll() {
  /* da vida kak da go napravia pravilno sas pixels, viewport golemina!!! */
  var scrollOffset = $(document).scrollTop(); // in px
  // a const da izpolzvam?
  /* a transition time da sloza, tova shte go napravi po-smooth, a ako veche ima transition in progress da se overridene, avtomatichno li stava??? ili ne e nuzno sas transitions??? */
  if(scrollOffset < 500 || prevOffset < 500) { /* parvo da se checkne dali e na nai-krainata stoinost, ako tvarde barzo scrollne shte zasedne na niakakva mezdinna stoinost. ako e na nai-krainata stoinost togava niama zashto da se promeniat properties */
    /* moze i prosto da izpolzvam .top-content-container > * ???, tova i za carousela da go izpolzvam blur?! */
    
    // old solution  
//    $(".top-content")
//      .css("filter", "blur(" + ((scrollOffset/500)*10) + "px)") /* BESHE 6 PX BLUR!!! */
//      .css("transform", "scale("+ (1.0-(scrollOffset/500)*0.1) + ", " + (1.0-(scrollOffset/500)*0.1) +")");
      
      $(".scroll-scale")
        .css("transform", "scale("+ (1.0-(scrollOffset/500)*0.1) + ", " + (1.0-(scrollOffset/500)*0.1) +")");
      
      $(".scroll-fade-in")
        .css("opacity", scrollOffset/500)
      $(".scroll-fade-out")
        .css("opacity", 1-scrollOffset/500);
//      $(".top-content.blurred")
//        .css("opacity", scrollOffset/500)
//        .css("transform", "scale("+ (1.0-(scrollOffset/500)*0.1) + ", " + (1.0-(scrollOffset/500)*0.1) +")");
//      $(".top-content > *")
//        .css("transform", "scale("+ (1.0-(scrollOffset/500)*0.1) + ", " + (1.0-(scrollOffset/500)*0.1) +")");
      
//      document.documentElement.style.setProperty('--z-distance', (-50*(scrollOffset/500))+'px');
  }
    
    prevOffset = scrollOffset;
    ticking = false;
}

/* moze i vav perspective da otide nazad samia image??? */
$(window).on('load', function() {
  $(window).on('scroll', function() {
      if(!ticking) {
        window.requestAnimationFrame(animateTopContentScroll);
          ticking = true;
      }
  });
});


/* CAROUSEL */
//http://stackoverflow.com/questions/4584373/difference-between-window-load-and-document-ready-functions
// da vnimavam sas tozi event, ako samia image bavno se zarezda??? explicit dimensions ot predi tova???
$(window).on('load', function() { // raboti i sas document ready, no dali sas document ready shte e consistent???  

  // sas swipe da raboti?!

  var itemsCount = $(".items > *").length;
  var selected = 0; // the index of the selected item, rename tozi i gornia variable???

  // Create the carousel option buttons
  for(var n = 1; n < itemsCount; n++) {
    $(".carousel-option:nth-child(1)")
      .clone()
      .removeClass("fa-circle fa-circle-o")
      .addClass("fa-circle-o")
      .appendTo(".carousel-buttons");
  }

  $('.carousel-option').on("mousedown", function() { // neka ne e click, zashtoto po-barzo raboti sas mousedown
    selectItem($(".carousel-option").index(this)); // mai se garantira ot jquery, che sa sortnati po samia dom order?!
  });

  // da promenia i mouse pointera varhu veche clicknat carousel option???
  $('.carousel-option').on("mouseenter", function() {
    if($(this).hasClass("fa-circle")) { // ili sas filter argument na .on methoda???
      return;
    }

    $(this)
      .removeClass("fa-circle-o fa-circle")
      .addClass("fa-dot-circle-o");
  });

  $('.carousel-option').on("mouseleave", function() {
    if($(this).hasClass("fa-circle")) {
      return;
    }

    $(this)
      .removeClass("fa-dot-circle-o fa-circle")
      .addClass("fa-circle-o");
  });

  function selectItem(index) { // da niama bounds checking, ne e nuzno?
    
    clearInterval(interval);
    interval = setInterval(timerNext, 5000);
//    $(".items > :nth-child(1)").css("margin-left", index*(-100) + "%"); // old way
      // vremenno reshenie taka
      $(".items > *").css("transition", "0.7s");
      // this fixes the disappearing elements
      $(".items > * > *").css("-webkit-backface-visibility", "hidden");
      $(".items > * > *").css("-webkit-transform", "translateZ(0)");
      
    $(".items > *").css("transform", "translate(" + index*(-100) + "%, 0px)"); // a da vida da e samo sas translating na edin parent element?
      
    selected = index;

    $(".carousel-option")
      .removeClass("fa-circle fa-dot-circle-o")
      .addClass("fa-circle-o");
    $(".carousel-option:nth-child(" + (index+1) + ")")
      .removeClass("fa-circle-o fa-dot-circle-o")
      .addClass("fa-circle");

    $(".left-arrow, .right-arrow").removeClass("disabled-arrow");
    if(index == 0) {
      $(".left-arrow").addClass("disabled-arrow");
    }
    if(index == itemsCount-1) {
      $(".right-arrow").addClass("disabled-arrow");
    }
  }

  function next() {
    if(selected+1 < itemsCount) {
      selectItem(selected+1);
    }
  }
  function prev() {
    if(selected > 0) {
      selectItem(selected-1);
    }
  }

  $('.left-arrow').on("click", function() {
    prev();
  });

  $('.right-arrow').on("click", function() {
    next();
  });
  
  function timerNext() {
    if(selected == itemsCount-1) {
      selectItem(0);
    } else {
      next();
    }
  }
  
  var interval = setInterval(timerNext, 5000);
});

// za kato albumite sa 0, 1, 2 i drugi takiva tanki sluchai da vida handling?

// Initialize album carousel
$(window).on('load', function() {
    var xmlString = $('#content-xml').html();
    //xmlString = xmlString.substr(xmlString.indexOf("<"), xmlString.lastIndexOf(">") + 1);
    xmlString = $.trim(xmlString); // inache ne parseva, ot kade idvat tezi characters, koito prechat?
    var xmlObject = $.parseXML(xmlString);
    var contentXML = $(xmlObject);
    var albums = [];
    
    contentXML.find('album').each(function(index, element) {
        element = $(element);
        
        albums.push({
            'top-content': {
                'details': element.find('top-content > details').text(),
                'play-button': element.find('top-content > play-button').text(),
                'buy-button': element.find('top-content > buy-button').text(),
                'background-image': element.find('top-content > background-image').text(),
                'play-link': element.find('top-content > play-link').text(),
                'buy-link': element.find('top-content > buy-link').text()
            },
            'title': element.find('album > title').text(),
            'length': element.find('top-content ~ length').text(),
            'image': element.find('image').text(),
            'description': element.find('description').text(),
            'purchase-label': element.find('purchase-label').text(),
            'songs': [],
            'purchase-links': []
        });
        
        element.find('song').each(function(index, element) {
            element = $(element);
            
            albums[albums.length-1].songs.push({
                'name': element.find('name').text(),
                'length': element.find('length').text(),
                'link': element.find('link').text()
            });
        });
        
        element.find('purchase-link').each(function(index, element) {
            element = $(element);
            
            albums[albums.length-1]['purchase-links'].push({
                'icon': element.find('icon').text(),
                'title': element.find('title').text(),
                'warning': element.find('warning').text(),
                'link': element.find('link').text()
            });
        });
    });
    
    // Remove the carousel controls if there are less than 2 items
    if(albums.length < 2) {
        $('.carousel-indicator').css('visibility', 'hidden');
        $('.carousel .control-left').css('visibility', 'hidden');
        $('.carousel .control-right').css('visibility', 'hidden');
    }
    
    // poveche sas pure functions da rabotia
    
    var backgroundElements = [], coverElements = [], albumElements = []; // dali moga da izbere samite cover i background elements navednaz i da gi handlevam navednaz sas jquery, vse pak mi go pozvolava, demek naprimer da imam elements.push($('.carousel-element.left')) vmesto album cover, backgound i t.n.??? da vida sashto da go podkaram samo sas 2 children vmesto sas 3?
    var albumsCount = albums.length;
    var currentIndex = 0;
    
    backgroundElements.push($('.carousel-background.left'));
    backgroundElements.push($('.carousel-background.mid'));
    backgroundElements.push($('.carousel-background.right'));
    
    coverElements.push($('.album-cover.left'));
    coverElements.push($('.album-cover.mid'));
    coverElements.push($('.album-cover.right'));
    
    albumElements.push($('.album-controls.left'));
    albumElements.push($('.album-controls.mid'));
    albumElements.push($('.album-controls.right'));
    
    // a koe da opredelya koda koga da blackoutne samite buttons?
    var leftControl = $('.carousel .control-left');
    var rightControl = $('.carousel .control-right');
    
    leftControl.on('click', rotateLeft);
    rightControl.on('click', rotateRight);
    
    //showAlbum(albums[albums.length-currentIndex-1], currentIndex); // da bade computenato vav PHP, zashtoto shte se vidi, che se calculateva
    // vav client-side inache!!!
    
    function rotateRight() {
        if(!(currentIndex < albumsCount-1)) {
            return;
        }
    
        /* promeniane na samia content cancelva li samia transition? */
        rotate(coverElements, true, albumsCount, currentIndex);
        rotate(backgroundElements, true, albumsCount, currentIndex);
        rotate(albumElements, true, albumsCount, currentIndex);
        
        if(currentIndex < albumsCount-1) {
            currentIndex++;
        }
        
        showAlbum(albums[albums.length-currentIndex-1], currentIndex);
        
        if(currentIndex < albumsCount-1) {
            //rightControl.removeClass("disabled-arrow"); // TODO: tova li e samia class?
        } else {
            rightControl.addClass("disabled-arrow");
        }
        leftControl.removeClass("disabled-arrow");
    }
    
    function rotateLeft() {
        if(!(currentIndex > 0)) {
            return;
        }
        
        rotate(coverElements, false, albumsCount, currentIndex);
        rotate(backgroundElements, false, albumsCount, currentIndex);
        rotate(albumElements, false, albumsCount, currentIndex);
        
        if(currentIndex > 0) {
            currentIndex--;
        }
        
        showAlbum(albums[albums.length-currentIndex-1], currentIndex);
        
        if(currentIndex > 0) {
            //leftControl.removeClass("disabled-arrow"); // TODO: tova li e samia class?
        } else {
            leftControl.addClass("disabled-arrow");
        }
        rightControl.removeClass("disabled-arrow");
        
    }
    
    // Define album carousel functions
    function rotate(elements, isRotatingLeft, count, currentIndex) { // jQuery elements kato argument!!!
        elements[0].removeClass("left"); // can fail bez da dava exception, taka i drugite, primerno kato go niama samia class???
        elements[1].removeClass("mid");
        elements[2].removeClass("right");

        if(isRotatingLeft) {
            if(currentIndex == count-1) {
                return;
            }

            var tmp = elements[0];
            elements[0] = elements[1];
            elements[1] = elements[2];
            elements[2] = tmp;
        } else {
            if(currentIndex == 0) {
                return;
            }

            var tmp = elements[2];
            elements[2] = elements[1];
            elements[1] = elements[0];
            elements[0] = tmp;
        }

        elements[0].addClass("left");
        elements[1].addClass("mid");
        elements[2].addClass("right");
    }


    // a za prefetching? da vida gore vav samia head tag da sloza rabotite, da ne slagam danni vav left i right??? da vida network throttling sas chrome za testing na tezi raboti chrez samite dev tools?
    function showAlbum(album, index) {
//        console.log(album);
//        console.log(index);

        $('.carousel-indicator').text( (index+1) + '/' + albums.length);

        $('.js-background.mid').attr('src', 'img/'+album['top-content']['background-image']);
        $('.js-album-image.mid').attr('src', 'img/'+album['image']);

        $('.album-controls.mid  .album-name').text(album['title']);
        $('.album-controls.mid  .content-message').text(album['top-content']['details']);
        $('.album-controls.mid  .button-link:nth-child(1) .label').text(album['top-content']['play-button']);
        $('.album-controls.mid  .button-link:nth-child(2) .label').text(album['top-content']['buy-button']);
        $('.album-controls.mid  .button-link:nth-child(1)').attr('href', album['top-content']['play-link']);
        $('.album-controls.mid  .button-link:nth-child(2)').attr('href', album['top-content']['buy-link']);

        // For the content section
        $('.album-section .album-image').attr('src', 'img/'+album['image']);
        $('.album-section .album-name').text(album['title']);
        $('.album-section .album-details').text(album.songs.length + " songs | " + album.length + " minutes");
        
        $('.album-section .album-description').text(album.description); // obache tova e async i moze da se sluchi predi ili sled samia shorten, da vida sas callback ili vav DOM objects izvan samia DOM i posle da se insertnat? po-dobre poslednoto?
        var w = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
        if(w <= 540) { /* dali i ravno??? */
//            console.log("bla");
                $('.album-description').shorten({
                    moreText: 'Show More',
                    lessText: 'Show Less',
                    showChars: 300,
                    force: true // zashtoto po princip ne pozvolyava povtorno da se applyne na edin i sasht element, ima vatreshen check
                });
            
                // TODO: vizdam, che ot portrait vav landscape mode se bugva i ne pokazva neshtata kakto triabva, ne e imalo predvid, che
                // samia text floatva, a ako si e bilo vav landscape ima predvid, che samia text floatva. da vida da reapplyna samia
                // shorten niakaksi pri resizing niakaksi??? moze bi chrez showAlbum functiona? moze i prosto samia plugin da se prenapishe
                // da si raboti seamlessly i za 2ta varianta? zaradi samia CSS e rabotata? nai-dobre e da napravia modifications po samia plugin
            }
        
        $('.album-section .buy-title').text(album['purchase-label']);

        $('.album-section .songs-list').html("");

        for(var n = 0; n < album.songs.length; n++) {
            $('.album-section .songs-list').append(
                "<tr><td>" + (n+1).toString() + "</td>" +
                "<td>" + album.songs[n].name + "</td>" +
                "<td>" + "" + "</td>" +
                "<td>" + album.songs[n].length + "</td>" +
                '<td><a href="' + album.songs[n].link + '"> \
                    <button class="play"><i class="fa fa-play fa-lg" aria-hidden="true"></i></button> \
                </a></td></tr>'
            );
        }
        
        $('.purchase-links').html("");
        
        for(var n = 0; n < album['purchase-links'].length; n++) {
            $('.album-section .purchase-links').append(
                '<a href="' + album['purchase-links'][n].link + '" class="buy-link">' +
                    '<i class="fa ' + album['purchase-links'][n].icon +  ' fa-3x" aria-hidden="true"></i>' +
                    '<span style="margin-top: 3px;">' + album['purchase-links'][n].title + '</span>' +
                    '<span style="margin-top: 3px; color: rgb(236, 128, 19);">' + album['purchase-links'][n].warning + '</span>' +
                '</a>'
            );
        }
    }
});

$(window).on('load', function() {
    $( "form" ).on( "submit", function( event ) {
        event.preventDefault();
        if(!$(this).find('.loading-indicator').hasClass('visible')) {
            $(this).find('.loading-indicator').addClass('visible');
            $.post('newsletter.php', $(this).serialize())
                .done(function() {
                    alert("Email added successfully! Check your inbox.");
                }).fail(function(){
                    alert("Operation was unsuccessful! Please try again later.");
                }).always(function() {
                    $('.loading-indicator').removeClass('visible');
                });   
        }
    });
});

$(window).on('load', function() {
    if(w > 540) {
        $('.news-entry').each(function(index, element) {
            
            // Problemat e, che kato ne e dostatuchno samia text, samia Read More ne se pokazva na desktop mode!!!
            $(element).find(".news-content").dotdotdot({
                ellipsis: '...',
                wrap: 'letter',
                after: 'a.show-more-link',
                height: '25px',
                watch: true
            });
        });
    }
});