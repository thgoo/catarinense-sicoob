<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Campeonato Catarinense - Sicoob</title>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/brands.css" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/solid.css" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/fontawesome.css" crossorigin="anonymous">
        <link rel="stylesheet" href="/css/app.css?v=1.0.9">
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-133445686-1"></script>
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'UA-133445686-1');

        // facebook pixel
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};
        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
        n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t,s)}(window, document,'script',
        'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '416403555764978');
        fbq('track', 'PageView');
        fbq('track', 'ViewContent');
      </script>
    </head>
    <body class="bg-black">
        <noscript><img height="1" width="1" style="display:none"
            src="https://www.facebook.com/tr?id=416403555764978&ev=PageView&noscript=1"
            /></noscript>
        <div id="app">
            <div class="container">
                <header><a href="http://www.sicoobsc.com.br/" target="_blank"></a></header>
                <section class="video">
                    <div class="video-viewport">
                        <video id="video" loop muted playsinline>
                            <source src="/video/video1080.mp4" type="video/mp4">
                        </video>
                        <div class="play-button" id="play-button">
                            <i class="fas fa-play"></i>
                        </div>
                    </div>
                    <div class="instructions">
                        <div class="text">Vire a tela</div>
                        <div class="arrow"></div>
                    </div>
                </section>
                <section class="anthems">
                    <div class="text">
                        Temos orgulho em patrocinar<br />
                        o Campeonato Catarinense,<br />
                        unindo clubes e torcedores <br class="mobile-hidden" /> para<br class="desktop-hidden" />
                        trazer paz aos estádios.<br />
                        Faça parte desse movimento.<br />
                        Confira a letra e baixe o<br />
                        Hino do Catarinense em <br class="mobile-hidden" /> seu celular.<br class="desktop-hidden" />
                        Depois é cantar <br class="mobile-hidden" /> juntos e correr pro abraço!
                    </div>
                    <div class="download">
                        <div class="text">Esse Hino é seu também!</div>
                        <div class="button">
                            <a href="/files/hino-completo.mp3" download onclick="onClickDownload();"></a>
                        </div>
                    </div>
                    <div class="green-text">
                        futebol<br />
                        é time,<br />
                        é torcida,<br />
                        é a vitória<br />
                        da cooperação
                    </div>
                    <div class="shadow"></div>
                </section>
                <section class="instagram">
                    <div class="instructions">
                        <strong>Compartilhe</strong> a sua<br />
                        torcida com a hashtag
                    </div>
                    <div class="hashtag">
                        <img src="/img/hashtag.png" alt="#catarinensesicoob">
                    </div>
                    <instagram-images></instagram-images>
                    <div class="green-text">
                        futebol<br />
                        é time,<br />
                        é torcida,<br />
                        é a vitória<br />
                        da cooperação
                    </div>
                </section>
                <section class="scoreboard-section">
                    <scoreboard-list></scoreboard-list>
                </section>
                <footer>
                    <ul class="social-networks">
                        <li><a href="https://twitter.com/SicoobSCRS" target="_blank"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="https://www.facebook.com/sicoobscrs/" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="https://www.linkedin.com/company/sicoobscrs/" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                        <li><a href="https://www.youtube.com/user/sicoobscrs" target="_blank"><i class="fab fa-youtube"></i></a></li>
                    </ul>
                </footer>
            </div>
        </div>
        <script src="/js/app.js?v=1.0.9"></script>
        <script>
            var video = document.getElementById('video');
            var playButton = document.getElementById('play-button');

            video.play();

            if(!video.paused) {
                playButton.classList.add('is-hidden');
            }

            video.addEventListener('click', function() {
                if (video.muted && !video.paused) {
                    video.muted = false;
                } else if (video.paused) {
                    video.play();
                    video.muted = false;
                    playButton.classList.add('is-hidden');
                } else {
                    video.pause();
                    playButton.classList.remove('is-hidden');
                }
            });

            function onClickDownload() {
                fbq('track', 'Purchase');
                gtag('event', 'Download - Hino');
            }
        </script>
    </body>
</html>