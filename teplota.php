<?php
$dataFileCandidates = ["data.txt", "data/teplota.log"];
$dataFilePath = null;

foreach ($dataFileCandidates as $candidate) {
    if (is_readable($candidate)) {
        $dataFilePath = $candidate;
        break;
    }
}

$records = [];
$temperatures = [];

if ($dataFilePath !== null) {
    $lines = file($dataFilePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    foreach ($lines as $line) {
        $parts = preg_split('/\s+/', trim($line));

        if (count($parts) < 3) {
            continue;
        }

        $tempRaw = str_replace(',', '.', $parts[0]);

        if (!is_numeric($tempRaw)) {
            continue;
        }

        $temp = (float)$tempRaw;
        $date = $parts[1];
        $time = $parts[2];

        $records[] = [
            "temp" => $temp,
            "date" => $date,
            "time" => $time,
        ];

        $temperatures[] = $temp;
    }
}

$count = count($temperatures);
$hasData = $count > 0;

$avgTemp = $hasData ? (array_sum($temperatures) / $count) : null;
$minTemp = $hasData ? min($temperatures) : null;
$maxTemp = $hasData ? max($temperatures) : null;
$currentTemp = $hasData ? $temperatures[$count - 1] : null;

function formatTemp($value)
{
    if ($value === null) {
        return "-";
    }

    return number_format((float)$value, 1, ',', ' ');
}
?>
<!DOCTYPE html>
<html lang="sk">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="30">
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

                </div>
            </div>

            <div class="tm-row">
                <div class="tm-col-left">
                    <div class="pozadie-teploty">
                        <p class="temperature-stat">Priemerná teplota: <?= formatTemp($avgTemp); ?> °C</p>
                        <p class="temperature-stat">Aktuálna teplota: <?= formatTemp($currentTemp); ?> °C</p>
                        <p class="temperature-stat">Maximálna teplota: <?= formatTemp($maxTemp); ?> °C</p>
                        <p class="temperature-stat">Minimálna teplota: <?= formatTemp($minTemp); ?> °C</p>

                        <?php if (!$hasData): ?>
                            <p class="temperature-help">Zatiaľ nemáš žiadne merania. Pošli prvé dáta z ESP32-C6.</p>
                        <?php endif; ?>
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
                        <?php if (!$hasData): ?>
                            <tr>
                                <td colspan="3">Žiadne dáta na zobrazenie.</td>
                            </tr>
                        <?php else: ?>
                            <?php
                            $lastRecords = array_slice($records, -20);
                            foreach ($lastRecords as $record):
                            ?>
                                <tr>
                                    <td><?= htmlspecialchars(formatTemp($record["temp"]), ENT_QUOTES, 'UTF-8'); ?> °C</td>
                                    <td><?= htmlspecialchars($record["date"], ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td><?= htmlspecialchars($record["time"], ENT_QUOTES, 'UTF-8'); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
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