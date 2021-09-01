<?php include("./includes/header.php");
$enter = $_SESSION['id'];
if ($enter == null || $enter == ''){
    $_SESSION['message_erro'] = 'Por favor inicie sesión';
    header("Location: ./index.php");
    die();
}
else{
    
}
?>

<?php include("./includes/nav.php"); session_start();?>



<div class="d-xl-flex" id="wrapper">

    <!--<?php// print "<p>El id es: $_SESSION[id]</p>"; ?>-->
    <!-- Sidebar -->
    <!--
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading">Listas de mercados</div>
      <div class="list-group list-group-flush">
        <a href="#" class="list-group-item list-group-item-action bg-light">The Berkshire Hathaway Portfolio</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Currency 2          </a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Currency 3          </a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Currency 4          </a>
      </div>
    </div>
    -->
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div class="container-fluid" id="page-content-wrapper">
        <!--       <div class="input-group mb-3">
          <span class="input-group-text" id="inputGroup-sizing-default">Buscar</span>
          <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
      </div> -->
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
                            aria-expanded="false" aria-controls="collapseOne">
                            The Berkshire Hathaway Portfolio
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
            <div class="card">
                <div class="card-header" id="headingTwo">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo"
                            aria-expanded="false" aria-controls="collapseTwo">
                            Tech Stocks That Move the Market
                        </button>
                    </h5>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                    <div class="card-body">
                        <?php

          $curl = curl_init();

          curl_setopt_array($curl, [
            CURLOPT_URL => "https://apidojo-yahoo-finance-v1.p.rapidapi.com/market/get-watchlist-detail?userId=X3NJ2A7VDSABUI4URBWME2PZNM&pfId=the_only_tech_stocks_that_matter",
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

          $decodedResponse = json_decode($response);
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


            <div class="card">
                <div class="card-header" id="headingThree">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree"
                            aria-expanded="false" aria-controls="collapseThree">
                            Cannabis Stocks
                        </button>
                    </h5>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                
                    <div class="card-body">
                    
                        <?php

          $curl = curl_init();

          curl_setopt_array($curl, [
            CURLOPT_URL => "https://apidojo-yahoo-finance-v1.p.rapidapi.com/market/get-watchlist-detail?userId=X3NJ2A7VDSABUI4URBWME2PZNM&pfId=420_stocks",
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


            <div class="card">
                <div class="card-header" id="headingFour">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour"
                            aria-expanded="false" aria-controls="collapseFour">
                            The Fight Against COVID19

                            <!-- "userId":"X3NJ2A7VDSABUI4URBWME2PZNM"
                            "pfId":"the_fight_against_covid19" -->

                        </button>
                    </h5>
                </div>
                <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                    <div class="card-body">
                        <?php

          $curl = curl_init();

          curl_setopt_array($curl, [
            CURLOPT_URL => "https://apidojo-yahoo-finance-v1.p.rapidapi.com/market/get-watchlist-detail?userId=X3NJ2A7VDSABUI4URBWME2PZNM&pfId=the_fight_against_covid19",
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

            <div class="card">
                <div class="card-header" id="headingFive">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFive"
                            aria-expanded="false" aria-controls="collapseFive">
                            Top Crypto Bets
                        </button>
                    </h5>
                </div>
                <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
                    <div class="card-body">
                        <?php

          $curl = curl_init();

          curl_setopt_array($curl, [
            CURLOPT_URL => "https://apidojo-yahoo-finance-v1.p.rapidapi.com/market/get-watchlist-detail?userId=X3NJ2A7VDSABUI4URBWME2PZNM&pfId=top_crypto_bets",
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

            
            <div class="card">
                <div class="card-header" id="headingSix">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseSix"
                            aria-expanded="false" aria-controls="collapseSix">
                            Crowded Tech Hedge Fund Positions
                        </button>
                    </h5>
                </div>
                <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordion">
                    <div class="card-body">
                        <?php

          $curl = curl_init();

          curl_setopt_array($curl, [
            CURLOPT_URL => "https://apidojo-yahoo-finance-v1.p.rapidapi.com/market/get-watchlist-detail?userId=X3NJ2A7VDSABUI4URBWME2PZNM&pfId=crowded_tech_hedge_fund_positions",
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

            
            <div class="card">
                <div class="card-header" id="headingSeven">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseSeven"
                            aria-expanded="false" aria-controls="collapseSeven">
                            Crypto Top Market Cap
                        </button>
                    </h5>
                </div>
                <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordion">
                    <div class="card-body">
                     <!-- "userId":"5SSSFLJVWAMDKUGZM5HLSSBNAY"
                            "pfId":"crypto_top_market_cap" -->
                        <?php

          $curl = curl_init();


          curl_setopt_array($curl, [
            CURLOPT_URL => "https://apidojo-yahoo-finance-v1.p.rapidapi.com/market/get-watchlist-detail?userId=5SSSFLJVWAMDKUGZM5HLSSBNAY&pfId=crypto_top_market_cap",
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

            <div class="card">
                <div class="card-header" id="headingEight">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseEight"
                            aria-expanded="false" aria-controls="collapseEight">
                            Most Bought By Activist Hedge Funds
                        </button>
                    </h5>
                </div>
                <div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-parent="#accordion">
                    <div class="card-body">
                    <!-- 5SSSFLJVWAMDKUGZM5HLSSBNAY
                            most_bought_by_activist_hedge_funds -->
                        <?php

          $curl = curl_init();

          curl_setopt_array($curl, [
            CURLOPT_URL => "https://apidojo-yahoo-finance-v1.p.rapidapi.com/market/get-watchlist-detail?userId=5SSSFLJVWAMDKUGZM5HLSSBNAY&pfId=most_bought_by_activist_hedge_funds",
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
            
            
            <div class="card">
                <div class="card-header" id="headingNine">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseNine"
                            aria-expanded="false" aria-controls="collapseNine">
                            Most Active Penny Stocks
                        </button>
                    </h5>
                </div>
                <div id="collapseNine" class="collapse" aria-labelledby="headingNine" data-parent="#accordion">
                
                    <div class="card-body">
                    <!-- "userId":"X3NJ2A7VDSABUI4URBWME2PZNM"
                            "pfId":"most_active_penny_stocks" -->
                    
                        <?php

          $curl = curl_init();

          curl_setopt_array($curl, [
            CURLOPT_URL => "https://apidojo-yahoo-finance-v1.p.rapidapi.com/market/get-watchlist-detail?userId=X3NJ2A7VDSABUI4URBWME2PZNM&pfId=most_active_penny_stocks",
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

            
            <div class="card">
                <div class="card-header" id="headingTen">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTen"
                            aria-expanded="false" aria-controls="collapseTen">
                            Most Sold By Activist Hedge Funds
                        </button>
                    </h5>
                </div>
                <div id="collapseTen" class="collapse" aria-labelledby="headingTen" data-parent="#accordion">
                
                    <div class="card-body">
                    <!--  "userId":"5SSSFLJVWAMDKUGZM5HLSSBNAY"
                            "pfId":"most_sold_by_activist_hedge_funds" -->
                        <?php

          $curl = curl_init();

          curl_setopt_array($curl, [
            CURLOPT_URL => "https://apidojo-yahoo-finance-v1.p.rapidapi.com/market/get-watchlist-detail?userId=5SSSFLJVWAMDKUGZM5HLSSBNAY&pfId=most_sold_by_activist_hedge_funds",
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

            
            <div class="card">
                <div class="card-header" id="headingEleven">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseEleven"
                            aria-expanded="false" aria-controls="collapseEleven">
                            New Hedge Fund Holders
                        </button>
                    </h5>
                </div>
                <div id="collapseEleven" class="collapse" aria-labelledby="headingEleven" data-parent="#accordion">
                
                    <div class="card-body">
                    <!-- "userId":"X3NJ2A7VDSABUI4URBWME2PZNM"
                            "pfId":"new_hedge_fund_holders" -->
                        <?php

          $curl = curl_init();

          curl_setopt_array($curl, [
            CURLOPT_URL => "https://apidojo-yahoo-finance-v1.p.rapidapi.com/market/get-watchlist-detail?userId=X3NJ2A7VDSABUI4URBWME2PZNM&pfId=new_hedge_fund_holders",
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

            
            <div class="card">
                <div class="card-header" id="headingTwelve">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwelve"
                            aria-expanded="false" aria-controls="collapseTwelve">
                            Crypto Top Volume 24hr
                        </button>
                    </h5>
                </div>
                <div id="collapseTwelve" class="collapse" aria-labelledby="headingTwelve" data-parent="#accordion">
                
                    <div class="card-body">
                    <!-- "userId":"5SSSFLJVWAMDKUGZM5HLSSBNAY"
                            "pfId":"crypto_top_volume_24hr" -->
                        <?php

          $curl = curl_init();

          curl_setopt_array($curl, [
            CURLOPT_URL => "https://apidojo-yahoo-finance-v1.p.rapidapi.com/market/get-watchlist-detail?userId=5SSSFLJVWAMDKUGZM5HLSSBNAY&pfId=crypto_top_volume_24hr",
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

            
            <div class="card">
                <div class="card-header" id="headingThirteen">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThirteen"
                            aria-expanded="false" aria-controls="collapseThirteen">
                            Smart Money Stocks
                        </button>
                    </h5>
                </div>
                <div id="collapseThirteen" class="collapse" aria-labelledby="headingThirteen" data-parent="#accordion">
                
                    <div class="card-body">
                    <!-- "userId":"X3NJ2A7VDSABUI4URBWME2PZNM"
                            "pfId":"smart_money_stocks" -->
                        <?php

          $curl = curl_init();

          curl_setopt_array($curl, [
            CURLOPT_URL => "https://apidojo-yahoo-finance-v1.p.rapidapi.com/market/get-watchlist-detail?userId=X3NJ2A7VDSABUI4URBWME2PZNM&pfId=smart_money_stocks",
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


            <div class="card">
                <div class="card-header" id="headingFourteen">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFourteen"
                            aria-expanded="false" aria-controls="collapseFourteen">
                            Fiftytwo Wk Gain
                        </button>
                    </h5>
                </div>
                <div id="collapseFourteen" class="collapse" aria-labelledby="headingFourteen" data-parent="#accordion">
                
                    <div class="card-body">
                    <!-- "userId":"5SSSFLJVWAMDKUGZM5HLSSBNAY"
                            "pfId":"fiftytwo_wk_gain" -->
                        <?php

          $curl = curl_init();

          curl_setopt_array($curl, [
            CURLOPT_URL => "https://apidojo-yahoo-finance-v1.p.rapidapi.com/market/get-watchlist-detail?userId=5SSSFLJVWAMDKUGZM5HLSSBNAY&pfId=fiftytwo_wk_gain",
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

            
            <div class="card">
                <div class="card-header" id="headingFifteen">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFifteen"
                            aria-expanded="false" aria-controls="collapseFifteen">
                            The Autonomous Car
                        </button>
                    </h5>
                </div>
                <div id="collapseFifteen" class="collapse" aria-labelledby="headingFifteen" data-parent="#accordion">
                
                    <div class="card-body">
                    <!-- "userId":"X3NJ2A7VDSABUI4URBWME2PZNM"
                        "pfId":"the_autonomous_car" -->
                        <?php

          $curl = curl_init();

          curl_setopt_array($curl, [
            CURLOPT_URL => "https://apidojo-yahoo-finance-v1.p.rapidapi.com/market/get-watchlist-detail?userId=X3NJ2A7VDSABUI4URBWME2PZNM&pfId=the_autonomous_car",
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


            <div class="card">
                <div class="card-header" id="headingSixteen">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseSixteen"
                            aria-expanded="false" aria-controls="collapseSixteen">
                            Most Sold By Hedge Funds
                        </button>
                    </h5>
                </div>
                <div id="collapseSixteen" class="collapse" aria-labelledby="headingSixteen" data-parent="#accordion">
                
                    <div class="card-body">
                    <!-- "userId":"5SSSFLJVWAMDKUGZM5HLSSBNAY"
                            "pfId":"most_sold_by_hedge_funds" -->
                        <?php

          $curl = curl_init();

          curl_setopt_array($curl, [
            CURLOPT_URL => "https://apidojo-yahoo-finance-v1.p.rapidapi.com/market/get-watchlist-detail?userId=5SSSFLJVWAMDKUGZM5HLSSBNAY&pfId=most_sold_by_hedge_funds",
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
            
            
            <div class="card">
                <div class="card-header" id="headingSeventeen">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseSeventeen"
                            aria-expanded="false" aria-controls="collapseSeventeen">
                            Most Active Small Cap stocks
                        </button>
                    </h5>
                </div>
                <div id="collapseSeventeen" class="collapse" aria-labelledby="headingSeventeen" data-parent="#accordion">
                
                    <div class="card-body">
                    <!-- "userId":"X3NJ2A7VDSABUI4URBWME2PZNM"
                            "pfId":"most_active_small_cap_stocks" -->
                        <?php

          $curl = curl_init();

          curl_setopt_array($curl, [
            CURLOPT_URL => "https://apidojo-yahoo-finance-v1.p.rapidapi.com/market/get-watchlist-detail?userId=X3NJ2A7VDSABUI4URBWME2PZNM&pfId=most_active_small_cap_stocks",
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

               
            <div class="card">
                <div class="card-header" id="headingEightteen">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseEightteen"
                            aria-expanded="false" aria-controls="collapseEightteen">
                            Dividend Growth Market Leaders
                        </button>
                    </h5>
                </div>
                <div id="collapseEightteen" class="collapse" aria-labelledby="headingEightteen" data-parent="#accordion">
                
                    <div class="card-body">
                    <!-- "userId":"X3NJ2A7VDSABUI4URBWME2PZNM"
                            "pfId":"10_dividends_to_trust" -->
                        <?php

          $curl = curl_init();

          curl_setopt_array($curl, [
            CURLOPT_URL => "https://apidojo-yahoo-finance-v1.p.rapidapi.com/market/get-watchlist-detail?userId=X3NJ2A7VDSABUI4URBWME2PZNM&pfId=10_dividends_to_trust",
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


            <div class="card">
                <div class="card-header" id="headingActivist_hedge_fund_positions">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseActivist_hedge_fund_positions"
                            aria-expanded="false" aria-controls="collapseActivist_hedge_fund_positions">
                            Activist Hedge Fund Positions
                        </button>
                    </h5>
                </div>
                <div id="collapseActivist_hedge_fund_positions" class="collapse" aria-labelledby="headingActivist_hedge_fund_positions" data-parent="#accordion">
                    <div class="card-body">
                        <?php

          $curl = curl_init();

          curl_setopt_array($curl, [
            CURLOPT_URL => "https://apidojo-yahoo-finance-v1.p.rapidapi.com/market/get-watchlist-detail?userId=X3NJ2A7VDSABUI4URBWME2PZNM&pfId=activist_hedge_fund_positions",
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

          $decodedResponse = json_decode($response);
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
            <div class="card">
                <div class="card-header" id="headingMost">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseMost"
                            aria-expanded="false" aria-controls="collapseMost">
                            Most Added to Watchlists
                        </button>
                    </h5>
                </div>
                <div id="collapseMost" class="collapse" aria-labelledby="headingMost" data-parent="#accordion">
                    <div class="card-body">
                        <?php

          $curl = curl_init();

          curl_setopt_array($curl, [
            CURLOPT_URL => "https://apidojo-yahoo-finance-v1.p.rapidapi.com/market/get-watchlist-detail?userId=5SSSFLJVWAMDKUGZM5HLSSBNAY&pfId=most_added",
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

          $decodedResponse = json_decode($response);
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
                <!-- /#page-content-wrapper -->

            </div>





            <?php include("./includes/footer.php") ?>