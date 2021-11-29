<?php include("./includes/header.php") ?>
<?php require_once "procesa.php"; ?>
<title><?php echo basename(__FILE__, ".php"); ?></title>
<link rel="stylesheet" href="/includes/styles.css">
</head>

<body>
    <?php include("./includes/header.php"); ?>
    <?php include("./includes/nav.php"); session_start();?>
    <?php
    $curl = curl_init();
    $symbol = $_GET['symbol'];
    curl_setopt_array($curl, [
        CURLOPT_URL => "https://yh-finance.p.rapidapi.com/stock/v3/get-historical-data?symbol=$symbol&region=US",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => [
            "x-rapidapi-host: yh-finance.p.rapidapi.com",
            "x-rapidapi-key: 436448cdb8msha5a41450f6206c5p16f004jsncdcd5984f9fb"
        ],
    ]);
    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);
    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        $decodedResponse = json_decode($response);
        $dataPoints = array();
        $i = 0;
        foreach ($decodedResponse->{'prices'} as $datos){
            $epoch = $datos->{'date'} . 0 . 0 . 0;
            $i+=1;
            $dataPoints[] =  array("x" => $epoch, "y" => array($datos->{'open'}, $datos->{'high'}, $datos->{'low'}, $datos->{'close'}));
        }
    }
    ?>
    <script>
    window.onload = function() {
        var chart = new CanvasJS.Chart("chartContainer", {
            zoomEnabled: true,
            exportEnabled: true,
            title: {
                text: "<?php echo $_GET['shortName']?> STOCK"
            },
            subtitles: [{
                text: ""
            }],
            axisX: {
                valueFormatString: "MMM YYYY"
            },
            axisY: {
                suffix: " US"
            },
            data: [{
                type: "candlestick",
                xValueType: "dateTime",
                yValueFormatString: "$##0.00",
                xValueFormatString: "DD MMM YY",
                dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
            }],
        });
        chart.render();
    }
    </script>
    <div class="container-fluid" id="page-content-wrapper">
        <br>
        <div id="chartContainer" style="height: 700px; width: 100%;"></div>
        <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    </div>
    <?php include("./includes/footer.php"); ?>