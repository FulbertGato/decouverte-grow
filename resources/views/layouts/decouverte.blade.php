<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Premiere</title>
    <link rel="icon" href="">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;500&display=swap" rel="stylesheet">


    <!-- Css Files -->
    <link rel="stylesheet" href="{{asset('decouverte/assets/css/normalize.css')}}">
    <link rel="stylesheet" href="{{asset('decouverte/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('decouverte/assets/css/fontawesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('decouverte/assets/css/audioplayer.css')}}">
    <link rel="stylesheet" href="{{asset('decouverte/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('decouverte/assets/css/responsive.css')}}">
    <link rel="stylesheet" href="{{asset('decouverte/assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('decouverte/assets/css/owl.theme.default.min.css')}}">
    <link href="https://vjs.zencdn.net/7.19.2/video-js.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wavesurfer.js/1.3.2/wavesurfer.min.js"></script>
</head>

<body>

    <!-- Start video area -->
    @yield('content')
    <!-- End video area -->
    <footer class="main-footer-area main-width">
        <ul>
            <li><a href="{{route('home')}}"><img src="{{asset('decouverte/assets/images/home.png')}}" alt="home"><span>Accueil</span></a></li>
            <li><a href="{{route('video')}}"><img src="{{asset('decouverte/assets/images/youtube.png')}}" alt="youtube"><span>Videos</span></a></li>
            <li><a href="{{route('podcast.play')}}"><img src="{{asset('decouverte/assets/images/microphone.png')}}" alt="microphone"><span>Podcast</span></a></li>
        </ul>
    </footer>

    <!-- JS Files -->


    <script src="https://vjs.zencdn.net/7.19.2/video.min.js"></script>
    <script src="{{asset('decouverte/assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('decouverte/assets/js/owl.carousel.min.js')}}"></script>
    <script>
        $('.videos-items').owlCarousel({
                    items:3,
                    loop:true,
                    dots:false,
                    nav:false,
                    margin:15,
                    center: true,
                });
    </script>
    <script src="{{asset('decouverte/assets/js/popper.min.js')}}"></script>
    <script src="{{asset('decouverte/assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('decouverte/assets/js/scripts.js')}}"></script>
    <script src="{{asset('decouverte/assets/js/audioplayer.js')}}"></script>




    <script>
        /*--- [ER] mod-preset ---*/

        jQuery(document).ready(function ($) {

          var presetBrowser = {
            globals: {
              currentAudioGallery: null,
              stickyplayer: {
                status: null
              }
            }
          }

          init();

          function init() {
            initAudioPlayer();
            document.addEventListener('mySuperEvt', function (e) {
              console.log("mySuperEvt capture on document level");
              document.getElementById(presetBrowser.globals.currentAudioGallery).api_goto_next();
            }, false);
          }
          function initAudioPlayer() {
            var settings_ap = {
              autoplayNext: true,
              autoplay: 'true',
              disable_scrub: 'default',
              design_skin: 'skin-wave',
              skinwave_dynamicwaves: 'on',
              cue: 'on',
              transition: 'fade'
            };
            var ag_id = "#audio-gallery-0";
            var gallery = dzsag_init(ag_id, {
              'transition': 'fade',
              'autoplay': 'off',
              'settings_ap': settings_ap
            });
            $("audio", ag_id).on("ended", function () {
              console.log("audio audiogallery jQuery .on('ended')");
              document.getElementById(presetBrowser.globals.currentAudioGallery).api_goto_next();
            });
            initStickyPlayer(this);
          }
          /**
           *  Init or reinit player sticked to bottom of page, add event listener (prev and next audio demo) at first call
           * @param audioGal
           */
          function initStickyPlayer(audioGal) {
            var settings_ap = {
              autoplayNext: true,
              swf_location: "/templates/arturia-bootstrap/assets/scripts/jquery-plugins/waveform-audio-player/ap.swf",
              autoplay: 'true',
              preload_method: 'none',
              disable_scrub: 'default',
              design_skin: 'skin-wave',
              skinwave_dynamicwaves: 'on',
              cue: 'on',
              transition: 'fade',
              skinwave_mode: 'small'
            };
            dzsap_init('.stickyplayer', settings_ap);

            if (presetBrowser.globals.stickyplayer.status != "initialized_almost_once") {
              $('#stickyplayer .btn-prev').on('click', function (event) {
                document.getElementById(presetBrowser.globals.currentAudioGallery).api_goto_prev();
              })
              $('#stickyplayer .btn-next').on('click', function (event) {
                document.getElementById(presetBrowser.globals.currentAudioGallery).api_goto_next();
              })
            }
            $('#stickyplayer audio')[0].addEventListener('ended', function (event) {
              console.log("stickyplayer ended captured from addEventListern");
            })
            $('#stickyplayer audio')[0].onended = function (event) {
              console.log("stickyplayer ended captured from onended");
            }
            // jQuery way
            $("#stickyplayer audio").on("ended", function () {
              console.log("stickyplayer jQuery .on('ended')");
              document.getElementById(presetBrowser.globals.currentAudioGallery).api_goto_next();
            })
            presetBrowser.globals.stickyplayer.status = "initialized_almost_once";
          }

          function showStickyPlayer(audiogaleryID) {
            var packname = $('.playerInfos', audiogaleryID).data('packname');
            $(".dzsap-sticktobottom .the-artist").html(packname);
            $(".dzsap-sticktobottom").animate({
              opacity: 1
            }, 700, function () {
              $(window).trigger('resize'); // force waveform to be recalculate
            });

          }
          function hideStickyPlayer() {
            $(".dzsap-sticktobottom").css({
              "opacity": "0"
            });
          }

        });
      </script>
 </body>

</html>
