<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 11 - Dashboard Progressbar</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body class="w3-container w3-margin">
    <h2>Task 11. Dashboard Progressbar</h2>
    <div class="w3-card-4 w3-padding w3-white w3-margin-top">
        <h3>Sales Achievement Progress</h3>
        <hr>
        <?php
        $cars = array (
            array("BYD",10,80),
            array("AION",20,40),
            array("XPeng",20,10),
            array("Geely",50,35)
        );

        function setColor($sales_percent) {
            if ($sales_percent <= 40) return "w3-red";
            if ($sales_percent <= 60) return "w3-yellow";
            if ($sales_percent <= 80) return "w3-green";
            return "w3-blue";
        }

        for ($x = 0; $x < count($cars); $x++) {
            $merk = $cars[$x][0];
            $in_stock = $cars[$x][1];
            $sold = $cars[$x][2];
            $percent = ($in_stock > 0) ? round(($sold / $in_stock) * 100) : 0;
 
            $percent = $cars[$x][2];
            $color = setColor($percent);
            
            echo '<p><b>' . $merk . '</b> (' . $percent . '%)</p>';
            echo '<div class="w3-light-grey w3-round-xlarge w3-margin-bottom">';
            echo '<div class="w3-container w3-center w3-round-xlarge ' . $color . '" style="width:' . $percent . '%">' . $percent . '%</div>';
            echo '</div>';
        }
        ?>
    </div>
</body>
</html>