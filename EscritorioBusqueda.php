<?php include("./includes/header.php") ?>
<?php require_once "procesa.php"; ?>
<title><?php echo basename(__FILE__, ".php"); ?></title>
<link rel="stylesheet" href="/includes/styles.css">
</head>

<body>
    <?php include("./includes/header.php");
    $symbol3=$_GET['symbol2'];
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
    <div class="container-fluid" id="page-content-wrapper">
        <br>
        
        <div id="accordion">
            <?php 
                //echo $_SESSION['id']; 
                
				$aContatena ="https://yh-finance.p.rapidapi.com/market/v2/get-quotes?region=US&symbols=";
                //echo "Symbol: ".$row['symbol']."<br>";
				$aContatena .= $symbol3;
                        
               
				//echo $aContatena ."<br>";
				//echo $aContatena ."<br>";
                ?>
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h5 class="mb-0">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne"
                            aria-expanded="false" aria-controls="collapseOne"
                            style="text-decoration: none; color: inherit;">
                            <b>Resultado de búsqueda en Escritorio</b>
                        </button>
                    </h5>
                </div>
                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                        <div class="container-fluid table-responsive">
                            <?php
							$curl = curl_init();
							curl_setopt_array($curl, [
								//CURLOPT_URL => "https://yh-finance.p.rapidapi.com/market/v2/get-quotes?region=US&symbols=TSLA%2CAMD%2CIBM%2CAAPL",
								CURLOPT_URL => $aContatena,			
								CURLOPT_RETURNTRANSFER => true,
								CURLOPT_FOLLOWLOCATION => true,
								CURLOPT_ENCODING => "",
								CURLOPT_MAXREDIRS => 10,
								CURLOPT_TIMEOUT => 30,
								CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
								CURLOPT_CUSTOMREQUEST => "GET",
								CURLOPT_HTTPHEADER => [
									"x-rapidapi-host: yh-finance.p.rapidapi.com",
									"x-rapidapi-key: 224b78383emsh42e552d9fc9b67ap193d85jsnaea589dffa31"
								],
							]);
							$response = curl_exec($curl);
							$err = curl_error($curl);
							curl_close($curl);
							if ($err) {
								echo "cURL Error #:" . $err;
							} else {
								//echo $response; //para no desplegar todos los datos de response 
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
                                        <th class="text-white" colspan="1">AGREGAR?</th>
                                    </tr>
                                </thead>
                                <?php
            $decodedResponse = json_decode($response);
            foreach ($decodedResponse->{'quoteResponse'}->{'result'} as $datos){?>
                                <tr>
                                    <td><a
                                            href="./Grafica.php?symbol=<?php echo $datos->{'symbol'}; ?>&shortName=<?php echo $datos->{'shortName'};?>"><?php echo $datos->{'symbol'}; ?></a>
                                    </td>
                                    <td><?php echo $datos->{'shortName'}; ?></td>
                                    <td><?php echo $datos->{'regularMarketPrice'}; ?></td>
                                    <td><?php echo $datos->{'regularMarketChange'}; ?></td>
                                    <td><?php echo $datos->{'regularMarketChangePercent'}; ?></td>
                                    <td><?php echo $datos->{'regularMarketVolume'}; ?></td>
                                    <td><?php echo $datos->{'averageDailyVolume3Month'}; ?></td>
                                    <td><?php echo $datos->{'marketCap'}; ?></td>
                                    <td>
                                        <a href=procesa.php?agregar=<?php echo $datos->{'symbol'}; ?>
                                            class="btn btn-info">AGREGAR</a>
                                    </td>
                                </tr>
                                <?php
            }
            ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include("./includes/footer.php") ?>