<?php include("./includes/header.php"); ?>
<title><?php echo basename(__FILE__, ".php"); ?></title>
<link rel="stylesheet" href="./includes/styles.css">
</head>

<body>
    <?php include("./includes/nav.php"); session_start();?>
    <br>
    <div class="container-fluid" id="page-content-wrapper">
        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Buscar</span>
            <input type="text" class="form-control" aria-label="Sizing example input"
                aria-describedby="inputGroup-sizing-default">
        </div>
        <br>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dropdown
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
            </ul>
        </div>
        </nav>

        <div id="accordion">
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h5 class="mb-0">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne"
                            aria-expanded="false" aria-controls="collapseOne"
                            style="text-decoration: none; color: inherit;">
                            <b>La cartera de Berkshire Hathaway</b>
                        </button>
                    </h5>
                </div>

                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                        <div class="container-fluid table-responsive">
                            <?php

          $curl = curl_init();

          curl_setopt_array($curl, [
            CURLOPT_URL => "https://apidojo-yahoo-finance-v1.p.rapidapi.com/market/get-watchlist-detail?userId=X3NJ2A7VDSABUI4URBWME2PZNM&pfId=the_berkshire_hathaway_portfolio",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
              "x-rapidapi-host: apidojo-yahoo-finance-v1.p.rapidapi.com",
              "x-rapidapi-key: c16eeddc64msh42e20011a1e62b9p12d134jsn76f85846c0d0"
            ],
          ]);

          $response = curl_exec($curl);
          $err = curl_error($curl);

          curl_close($curl);

          if ($err) {
            echo "cURL Error #:" . $err;
          } else {
            //echo $response;
          }


          ?>
                            <table class="table table-striped table-bordered">
                                <thead class="bg-dark">
                                    <tr>
                                        <th class="text-white">SYMBOL</th>
                                        <th class="text-white">NOMBRE</th>
                                        <th class="text-white">ULTIMO PRECIO</th>
                                        <th class="text-white">CAMBIO</th>
                                        <th class="text-white">CAMBIO EN %</th>
                                        <th class="text-white">VOLUMEN</th>
                                        <th class="text-white">VOLUMEN PROMEDIO (3 MESES)</th>
                                        <th class="text-white">CAPITALIZACIÓN BURSÁTIL</th>
                                    </tr>
                                </thead>
                                <?php
            $decodedResponse = json_decode($response);
            foreach ($decodedResponse->{'finance'}->{'result'}[0]->{'quotes'} as $datos){?>
                                <tr>
                                    <td><?php echo $datos->{'symbol'}; ?></td>
                                    <td><?php echo $datos->{'shortName'}; ?></td>
                                    <td><?php echo $datos->{'regularMarketPrice'}; ?></td>
                                    <td><?php echo $datos->{'regularMarketChange'}; ?></td>
                                    <td><?php echo $datos->{'regularMarketChangePercent'}; ?></td>
                                    <td><?php echo $datos->{'regularMarketVolume'}; ?></td>
                                    <td><?php echo $datos->{'averageDailyVolume3Month'}; ?></td>
                                    <td><?php echo $datos->{'marketCap'}; ?></td>
                                </tr>
                                <?php
            }
            ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <?php include("./includes/footer.php"); ?>