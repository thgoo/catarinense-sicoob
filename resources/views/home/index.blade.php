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
        <link rel="stylesheet" href="/css/app.css?v=1.0.8">
    </head>
    <body class="bg-black">
        <div id="app">
            <div class="container">
                <header><a href="http://www.sicoobsc.com.br/" target="_blank"></a></header>
                <section class="video">
                    <div class="video-viewport">
                        <video src="/video/video1080.mp4" id="video" muted loop></video>
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
                            <a href="/files/hino-completo.mp3" download></a>
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
        <script src="/js/app.js?v=1.0.8"></script>
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
        </script>
    </body>
</html>