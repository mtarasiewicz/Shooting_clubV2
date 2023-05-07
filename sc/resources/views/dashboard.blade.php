<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>

<link rel="stylesheet" href="{{asset('cssfile/dashboard.css')}}">
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <script src="jsfile/dashboardScript.js" defer></script>  
</head>
  <body>
    <h1>Pure <span id="css">Css</span> Carousel</h1>
    <div class="carousel-wrapper">
      <span id="item-1"></span>
      <span id="item-2"></span>
      <span id="item-3"></span>
      <div class="carousel-item item-1">
        <a href="#item-3" class="arrow-prev arrow"></a>
        <a href="#item-2" class="arrow-next arrow"></a>
      </div>
  
      <div class="carousel-item item-2">
        <a href="#item-1" class="arrow-prev arrow"></a>
        <a href="#item-3" class="arrow-next arrow"></a>
      </div>
  
      <div class="carousel-item item-3">
        <a href="#item-2" class="arrow-prev arrow"></a>
        <a href="#item-1" class="arrow-next arrow"></a>
      </div>
  
    </div>

    <div class="heading">
        <h1>O nas</h1>
        <p>Klub Strzelecki "Łowcy Celu" został założony w 1995 roku przez grupę pasjonatów strzelectwa z Kalisza. 
            Początkowo klub działał na terenie jednego z podkaliskich strzelnic, ale wkrótce zaczęto poszukiwać własnego obiektu. 
            W 1997 roku udało się nabyć działkę w lesie, na której postawiono nowoczesną strzelnicę z kilkoma torami do strzelania na odległości do 50 metrów.
            Misją klubu "Łowcy Celu" jest propagowanie sportowego strzelectwa oraz zwiększenie wiedzy i świadomości na temat bezpiecznego 
            korzystania z broni palnej. Klub organizuje regularne treningi dla swoich członków oraz prowadzi szkolenia dla początkujących, które 
            obejmują zarówno teorię, jak i praktykę.
            
            
           </p>
    </div>
    <div class="aboutUsContainer">
        <section class="aboutUs">
            <div class="aboutUsImage">
                <img src="images/shootingImg.jpg">
            </div>
            <div class="aboutUsContent">
                
                <p>Jednym z celów klubu jest także reprezentowanie Polski na międzynarodowych zawodach strzeleckich. 
                    W ciągu kilku ostatnich lat klub "Łowcy Celu" odniosł kilka sukcesów na arenie międzynarodowej, 
                    zdobywając kilka medali na różnych turniejach.
                     Klub "Łowcy Celu" stawia na wysoką jakość sprzętu i wyposażenia, 
                     aby zapewnić swoim członkom najlepsze warunki do treningu i rywalizacji. 
                     Oprócz strzelnic klub posiada także własny magazyn broni oraz pomieszczenia socjalne, gdzie 
                     członkowie mogą odpocząć i porozmawiać po treningu.
                    W klubie panuje przyjazna i koleżeńska atmosfera, a 
                    członkowie klubu "Łowcy Celu" to ludzie z różnych środowisk i profesji, którzy łączy pasja do strzelectwa. 
                    Klub organizuje także liczne imprezy integracyjne i wyjazdy na zawody w Polsce i za granicą, aby umożliwić swoim 
                    członkom rozwijanie swoich umiejętności strzeleckich oraz nawiązywanie nowych znajomości.</p>
                 <a href="" class="readMore">więcej o nas</a>   
            </div>
        </section>
    </div>
    
    <footer class="footer">
    <div id="page-container">
    <div id="content-wrap">
       <div class="container">
        <div class="row">
          <div class="footer-col">
            <h4>information</h4>
            <ul>
              <li><a href="#">about us</a></li>
              <li><a href="#">our services</a></li>
              <li><a href="#">privacy policy</a></li>
              <li><a href="#">affiliate program</a></li>
            </ul>
          </div>
          <div class="footer-col">
            <h4>get help</h4>
            <ul>
              <li><a href="#">FAQ</a></li>
              <li><a href="#">rules</a></li>
            </ul>
          </div>
          <div class="footer-col">
            <h4>follow us</h4>
            <div class="social-links">
              <a href="#"><i class="fab fa-facebook-f"></i></a>
              <a href="#"><i class="fab fa-twitter"></i></a>
              <a href="#"><i class="fab fa-instagram"></i></a>
              <a href="#"><i class="fab fa-linkedin-in"></i></a>
            </div>
          </div>
        </div>
       </div>
    </footer>
  </body>
</x-app-layout>
