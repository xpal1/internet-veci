<!DOCTYPE html>
<html lang="sk">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="30; URL=http://127.0.0.1/korabsky_inv/korabsky_inv/teplota.php">
    <title>Internet vecí | Meranie teploty</title>
    <link rel="icon" type="image/x-icon" href="img/iot-favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet" /> <!-- https://fonts.google.com/ -->
    <link href="css/bootstrap.min.css" rel="stylesheet" /> <!-- https://getbootstrap.com/ -->
    <link href="fontawesome/css/all.min.css" rel="stylesheet" /> <!-- https://fontawesome.com/ -->
    <link href="css/main.css" rel="stylesheet" />
    <link href="css/tabulka.css" rel="stylesheet" />
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
                        <button class="navbar-toggler toggler-example mr-0 ml-auto" type="button" data-toggle="collapse" data-target="#navbar-nav" aria-controls="navbar-nav" aria-expanded="false" aria-label="Toggle navigation">
                            <span><i class="fas fa-bars"></i></span>
                        </button>
                        <div class="collapse navbar-collapse tm-nav" id="navbar-nav">
                            <ul class="navbar-nav text-uppercase">
                                <li class="nav-item">
                                    <a class="nav-link tm-nav-link" href="index.php">Domov</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link tm-nav-link" href="predmet.php">Predmet</a>
                                </li>
                                <li class="nav-item active">
                                    <a class="nav-link tm-nav-link" href="#">Meranie</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link tm-nav-link" href="kontakt.php">Kontakt</a>
                                </li>
                            </ul>
                        </div>
                    </nav>

                    <?php
                    $subor = file("data.txt");
                    ?>


                    <?php


                    $maxTeplota = explode(" ", max($subor));
                    $minTeplota = explode(" ", min($subor));
                    $aktTeplota = explode(" ", $subor[count($subor) - 1]);


                    ?>

                </div>
            </div>

            <div class="tm-row">
                <div class="tm-col-left">
                    <div class="pozadie-teploty" <p style="
                                  text-transform: uppercase;
                                  margin-top: 2rem;
                                  font-size: 1.4rem;
                                  ">Priemerná Teplota:
                        <?=
                        ($minTeplota[0] + $maxTeplota[0] / 2);
                        ?>
                        °C</p>

                        <p style="
                                  text-transform: uppercase;
                                  font-size: 1.4rem;
                                  ">Aktuálna Teplota:
                            <?=
                            $aktTeplota[0];
                            ?>
                            °C</p>

                        <p style="
                                  text-transform: uppercase;
                                  font-size: 1.4rem;
                                  ">Maximálna Teplota:
                            <?=
                            $maxTeplota[0];
                            ?>
                            °C</p>

                        <p style="
                                  text-transform: uppercase;
                                  font-size: 1.4rem;
                                  ">Minimálna Teplota:
                            <?=
                            $minTeplota[0];
                            ?>
                            °C</p>
                    </div>
                </div>

                <table class="styled-table">
                    <thead>
                        <tr>
                            <th>Teplota [°C]</th>
                            <th>Dátum [RRRR-MM-DD]</th>
                            <th>Čas [HH-MM-SS]</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>

                    <?php
                    for ($i = max(0, count($subor) - 20); $i < count($subor); $i++) {
                        $data = explode(" ", $subor[$i]);

                        echo ("<tr>");
                        foreach ($data as $x) {
                            echo ("<td>" . $x . "°C" . "</td>");
                        }
                        echo ("</tr>");
                    }
                    ?>

                </table>
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