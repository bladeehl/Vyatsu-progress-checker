<?php require_once "charts-data.php";?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width-device-width, initial-scale=1.0">
    <title>Personal Account</title>
    <link rel="shortcut icon" href="logo.png">
    <link rel="stylesheet" href="globals.css" />
    <link rel="stylesheet" href="styles.css" />
    <script src="https://code.highcharts.com/stock/highstock.js"></script>
    <script src="https://rawgit.com/highcharts/rounded-corners/master/rounded-corners.js"></script>
</head>

<body>
    <div class="container">
        <div class="header">
            <img src="logo.png" name="image1">
            <h3>VyatSU</h3>
            <div class="buttons">
                <form action="logout.php" method="post">
                    <div class="button">
                        <input type="submit" value="Log Out" name="logout">
                    </div>
                </form>
                <div class="button">
                    <input type="submit" value="Change Language" name="">
                </div>
            </div>
        </div>
        <div class="content">
            <div class="box box-1">
                <?php
                    if(isset($_SESSION['image']) && isset($_SESSION['title'])){
                        $image = $_SESSION['image'];
                        $title = $_SESSION['title'];
                        echo "<img src=$image>";
                        echo "<div class='message '>$title</div>";
                    }
                ?>
            </div>
            <!--div class="boxes">
                <div class="box box-2"></div>
                <div class="boxes2">
                    <div class="box box-3"></div>
                </div>
            </div-->

            <div class="boxes">
                <div class="chart-container" id="container1" style="height: 40%; margin: 10px; padding: 20px; padding-top: 50px;"></div>
                <div style="height: 40%; margin: 10px; display: flex;flex-direction: row;">
                    <div class="chart-container" style="width: 40%; margin-right: 50px;float:left;">
                        <div class="chart-subcontainer" id="container2"></div>
                        <span class="chart-title" style="margin-bottom: 10px">Процент успеваемости за месяц</span>
                    </div>
                    <div class="chart-container" style="width: 60%;overflow:hidden;">
                        <span class="chart-title" style="margin-top: 10px">Выполнено лабораторных работ</span>
                        <div class="chart-subcontainer" id="container3"></div>
                        
                    </div>
                </div>
            </div>

            <script src="charts.js"></script> <!-- располагаем здесь, чтобы скрипт видел id контейнеров -->

            <script>
                
                document.getElementById('container1').onclick = function() {
                    window.location.href = 'table1.php';
                };
                document.getElementById('container2').onclick = function() {
                    window.location.href = 'table1.php';
                };
                document.getElementById('container3').onclick = function() {
                    window.location.href = 'table1.php';
                };
            </script>

        </div>
    </div>
</body>