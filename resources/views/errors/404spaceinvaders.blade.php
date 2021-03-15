<!DOCTYPE html>
<html lang="en" class="cb">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>404 - Pagina non trovata o distrutta - Giocaci!</title>
	
    
<script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js' id='jquery-js'></script>


<link rel="stylesheet" type="text/css" href="https://chargebacks911.com/wp-content/themes/CB911/dist/css/pages/space-invaders.min.css">
<link rel="icon" href="{{url('/').'/favicon.ico'}}" sizes="32x32" />



</head>
<body class="page-template-default page page-id-22261 group-blog has-sidebar-right">
    <div id="page" class="site not-home">
      
        <div style="background-color: #000; position: fixed; width: 100%; top:0px">
            <nav style="width: 100%; margin-left: auto; margin-right: auto;">
                <div style="display:flex; flex-wrap:wrap; align-items: center; ">
                    <div style="display:flex; margin-left: auto; margin-right: auto;">
                        <a href="{{url('/')}}">
                            <img style="height: 4rem; margin: 10px" 
                            src="{{asset("img/header-logo-ssse.png")}}" 
                            alt="Scuola specializzata superiore di economia"/>
                        </a>
                    </div>
                </div>
            </nav>
            <div style="line-height: .75rem; background-color:rgba(10, 134, 41, 0.781)">
                &nbsp;
            </div>
        </div>


<style>
  .gameover {
    z-index: 1000;
    background: rgba(0,0,0,0.9);
    display: none;
  }

  .gameover__content {
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%,-50%);
    text-align: center;
  }

  .gameover h2 {
    color: #b90000;
    font-family: 'arcade';
    font-size: 100px;
    letter-spacing: 0.05em;
    margin-bottom: 20px;
  }

  .gameover__score {
    font-size: 48px;
    margin-bottom: 30px !important;
    color: #ffC300;
  }

  .gameover__challenge {
    font-size: 28px;
  }

  .gameover__challenge a{
    text-decoration: underline;
  }

  .gameover__restart {
    display: inline-block;
    font-size: 22px;
    border: 1px solid #fff;
    border-radius: 3px;
    padding: 0.6em 1em;
    margin-top: 50px;
    cursor: pointer;
  }

  .gameover__restart:hover {
    background: #fff;
    color: #000;
  }


  .space-invader-mobile {
    padding: 20px 0;
    width: 100%;
    margin: 0 auto;
    display: none;
  }

  @media (max-width: 767px) {
    .space-invader-mobile {
      display: block;
    }

    .gameover,
    .space-invaders {
      display: none !important;
    }
  }
</style>
<div style="margin-top: 50px;"></div>
<div class="gameover">
  <div class="gameover__content">
    <h2>Game Over</h2>
    <p class="gameover__score">Hai fatto <span class="js-current-score">000000</span>!</p>
    <p class="gameover__challenge">Invita i tuoi amici e conoscenti a batterti e a conoscere la scuola</p>
    
        
        <a href="{{url('/')}}" class="container mx-auto">
            <img class=" flex mx-auto h-24 mt-2 mb-2" style = "height: 6rem;" 
              src="{{asset("img/header-logo-ssse.png")}}" 
              alt="Scuola specializzata superiore di economia"/>
          </a>
          
    <p class="gameover__restart">Clicca per giocare di nuovo</p>
  </div>
</div>

<div class="space-invaders">
  <div class="space-invaders-top">
    <div class="space-invaders-title">
        <p> ERRORE 404</p>
        <p> &emsp;</p>
      <p>LA PAGINA CHE STAI CONSULTANDO NON ESISTE OPPURE È STATA DISTRUTTA PAGE YOU ARE  LOOKING FOR WAS EITHER NOT FOUND OR DESTROYED!</p>
    </div>

    <div class="space-invaders-score">
      <p>HI SCORE: <span class="js-hi-score">000000</span></p>
      <p>SCORE: <span class="js-current-score">000000</span></p>
    </div>
  </div>

  <div class="space-invaders-game">
    <canvas id="space-invaders"></canvas>
  </div>

  <div class="space-invaders-bottom">
    <div class="space-invaders-lives">
      <p>Vite: <span class="js-lives"><img src="https://chargebacks911.com/wp-content/themes/CB911/dist/img/pages/404/lives-3.png" /></span></p>
      <p>Lillo: <span class="js-level">01</span></p>
    </div>

    <div class="space-invaders-directions">
      <p>Usa <span>Spazio</span> per sparare e <span><</span><span>></span> per muoverti</p>
    </div>
  </div>
</div>

<div class="space-invader-mobile">
  <a href="{{url('/')}}">
    <img src="https://chargebacks911.com/wp-content/themes/CB911/dist/img/pages/404/mobile-404.png" />
  </a>
</div>

<script src="https://chargebacks911.com/wp-content/themes/CB911/dist/js/pages/404/space-invaders-final.min.js"></script>

</body>
</html>

