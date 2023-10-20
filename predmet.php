<!DOCTYPE html>
<html lang="sk">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Internet vecí | Predmet</title>
    <link rel="icon" type="image/x-icon" href="img/iot-favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet" /> <!-- https://fonts.google.com/ -->
    <link href="css/bootstrap.min.css" rel="stylesheet" /> <!-- https://getbootstrap.com/ -->
    <link href="fontawesome/css/all.min.css" rel="stylesheet" /> <!-- https://fontawesome.com/ -->
    <link href="css/main.css" rel="stylesheet" />

</head>

<body>
    <div class="tm-container">        
        <div>
            <div class="tm-row pt-4">
                <div class="tm-col-left">
                    <div class="tm-site-header media">
                        <i class="fas fa-code fa-3x mt-1 tm-logo"></i>
                        <div class="media-body">
                            <h1 class="tm-sitename text-uppercase">INV</h1>
                            <i class="tm-slogon">internet vecí | internet of things</i>
                        </div>        
                    </div>
                </div>
                <div class="tm-col-right">
                    <nav class="navbar navbar-expand-lg" id="tm-main-nav">
                        <button class="navbar-toggler toggler-example mr-0 ml-auto" type="button" 
                            data-toggle="collapse" data-target="#navbar-nav" 
                            aria-controls="navbar-nav" aria-expanded="false" aria-label="Toggle navigation">
                            <span><i class="fas fa-bars"></i></span>
                        </button>
                        <div class="collapse navbar-collapse tm-nav" id="navbar-nav">
                            <ul class="navbar-nav text-uppercase">
                                <li class="nav-item">
                                    <a class="nav-link tm-nav-link" href="index.php">Domov</a>
                                </li>
                                <li class="nav-item active">
                                    <a class="nav-link tm-nav-link" href="#">Predmet</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link tm-nav-link" href="teplota.php">Meranie</a>
                                </li>                            
                                <li class="nav-item">
                                    <a class="nav-link tm-nav-link" href="kontakt.php">Kontakt</a>
                                </li>
                            </ul>                            
                        </div>                        
                    </nav>
                </div>
            </div>
            
            <div class="tm-row">
                <div class="tm-col-left"></div>
                <main class="tm-col-right">
                    <section class="tm-content tm-about">
                        <h2 class="mb-5 tm-content-title">Využitie Internetu Vecí</h2>
                        <hr class="mb-4">
                        <div class="media my-3">
                            <i class="fas fa-microchip fa-3x p-3 mr-4"></i>
                            <div class="media-body">
                                <p>Pomyselným základným kameňom celého internetu vecí sú senzory, teda zariadenia schopné zbierať údaje o okolitom svete. Ak by sme túto definíciu aplikovali na bežnú domácnosť, môžme hovoriť o inteligentných teplomeroch, vlhkomeroch, bezpečnostných snímačoch, kamerách, ale aj priamo o zariadeniach, ktoré danými snímačmi disponujú, napr. o inteligentných práčkach, sušičkách, či iných spotrebičoch.</p>
                            </div> 
                        </div>
                        <div class="media my-3">
                            <i class="fas fa-wifi fa-3x p-3 mr-4"></i>
                            <div class="media-body">
                                <p>Zozbierané údaje zo všemožných zariadení okolo nás sa následne odosielajú do cloudovej infraštruktúry, poprípade priamo do vášho smartfónu, či počítača, kde sú následne spracovávané. Aby sa ale údaje vôbec mohli spracovať, najskôr musia byť prenášané prostredníctvom internetového, či iného, najčastejšie bezdrôtového pripojenia. Zariadenia tým pádom môžu využívať naozaj akékoľvek siete, či už LTE siete, širokopásmové WAN siete, lokálne Wi-Fi pripojenie, satelitné siete, Bluetooth pripojenie, či ďalšie.</p>
                            </div> 
                        </div>
                        <div class="media my-3">
                            <i class="fas fa-database fa-3x p-3 mr-4"></i>
                            <div class="media-body">
                                <p>Ďalej sa dostávame do bodu, ktorý sme už spomenuli vyššie a tým je spracovanie zozbieraných údajov. Pod spracovávaním si môžme predstaviť naozaj jednoduché spracovanie údajov napríklad o teplote vo vašom byte, pričom softvér následne vyhodnotí, či treba alebo netreba zapnúť kúrenie. Údaje však môžu byť oveľa komplexnejšie, napríklad v takom výrobnom závode. Automatizované fabriky sú doslova posiate najmodernejšími senzormi, ktoré sledujú všetko od bezpečnosti až po odchýlky výroby.</p>
                            </div> 
                        </div>
                        <div class="media my-3">
                            <i class="fas fa-desktop fa-3x p-3 mr-4"></i>
                            <div class="media-body">
                                <p>Úplne posledným krokom v schéme internetu vecí je používateľské rozhranie. Pod týmto pojmom si môžete predstaviť napríklad prostredie aplikácie vo vašom smartfóne, ktorá získava údaje z termostatu vo vašom obydlí. Rozhranie internetu vecí však môže byť samozrejme aj oveľa jednoduchšie, ale aj tisícnásobne komplexnejšie.</p>
                            </div> 
                        </div>                        
                    </section>
                </main>
            </div>
        </div>        

        <div class="tm-row">
            <div class="tm-col-left text-center">            
                <ul class="tm-bg-controls-wrapper">
                    <li class="tm-bg-control active" data-id="0"></li>
                    <li class="tm-bg-control" data-id="1"></li>
                    <li class="tm-bg-control" data-id="2"></li>
                </ul>            
            </div>        
            <div class="tm-col-right tm-col-footer">
            <footer class="tm-site-footer text-right">
                    <p class="mb-0"> &#169; 2023 | Pavol Korabský 4.D IST
                </footer>
            </div>   
        </div>        

        <div class="tm-bg">
            <div class="tm-bg-left"></div>
            <div class="tm-bg-right"></div>
        </div>
    </div>

    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.backstretch.min.js"></script>
    <script src="js/templatemo-script.js"></script>
</body>
</html>
