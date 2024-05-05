<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Таблица с данными</title>
    <style>
        body {
            font-family: "Jura-Bold", Helvetica;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        .contentbox {
            width: 100%;
            height: 100%;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: auto;
            font-family: "Jura-Bold", Helvetica;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            border: 2px solid #007bff;
            border-radius: 5px;
            overflow: hidden;
            font-family: "Jura-Bold", Helvetica;
        }

        th, td {
            border: 1px solid #007bff;
            padding: 12px;
            text-align: left;
            color: #66729c;
        }

        th {
            background-color: #f2f2f2;
            color: #66729c;
            font-weight: 400;
        }

        tr:nth-child(even) {
            background-color: #e6f7ff;
        }

        tr:hover {
            background-color: #cce5ff;
        }

        .table-container {
            margin: 0 auto;
            overflow-x: auto;
        }

        .no-results {
            font-style: italic;
            color: #868e96;
        }
        #redirectBtn {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 20px;
            transition: background-color 0.3s ease;
        }

        #redirectBtn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="contentbox">
        <div class="table-container">
            <table>
                <tr>
                    <th>Имя</th>
                    <th>Фамилия</th>
                    <th>Количество экзаменов</th>
                    <th>Экзаменов посещено</th>
                    <th>Баллы по программированию</th>
                    <th>Всего баллов по программированию</th>
                    <th>Баллы по математике</th>
                    <th>Всего баллов по математике</th>
                    <th>Баллы по информатике</th>
                    <th>Всего баллов по информатике</th>
                    <th>Баллы по английскому</th>
                    <th>Всего баллов по английскому</th>
                    <th>Баллы по физике</th>
                    <th>Всего баллов по физике</th>
                    <th>Лабораторные работы по информатике</th>
                    <th>Лабораторные работы по программированию</th>
                    <th>Лабораторные работы по физике</th>
                    <th>Баллы за лабораторные работы</th>
                    <th>Максимально баллов за лабораторные работы</th>
                </tr>
                <?php
                session_start();

                if (!isset($_SESSION['id'])) {
                    header("Location: index.php");
                    exit;
                }

                $username = $_SESSION['id'];

                $servername = "localhost";
                $db_username = "root";
                $db_password = "mysql";
                $dbname = "users";

                $conn = new mysqli($servername, $db_username, $db_password, $dbname);

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT * FROM datas WHERE id='$username'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>".$row["name"]."</td>";
                        echo "<td>".$row["lastName"]."</td>";
                        echo "<td>".$row["totalExams"]."</td>";
                        echo "<td>".$row["attendedExams"]."</td>";
                        echo "<td>".$row["pointsProg"]."</td>";
                        echo "<td>".$row["totalProg"]."</td>";
                        echo "<td>".$row["pointsMath"]."</td>";
                        echo "<td>".$row["totalMath"]."</td>";
                        echo "<td>".$row["pointsInfo"]."</td>";
                        echo "<td>".$row["totalInfo"]."</td>";
                        echo "<td>".$row["pointsEng"]."</td>";
                        echo "<td>".$row["totalEng"]."</td>";
                        echo "<td>".$row["pointsPhys"]."</td>";
                        echo "<td>".$row["totalPhys"]."</td>";
                        echo "<td>".$row["labsInf"]."</td>";
                        echo "<td>".$row["labsProg"]."</td>";
                        echo "<td>".$row["labsPhys"]."</td>";
                        echo "<td>".$row["pointsLabs"]."</td>";
                        echo "<td>".$row["totalLabs"]."</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='17'>0 результатов</td></tr>";
                }

                $conn->close();
                ?>
            </table>
        </div>
        <button id="redirectBtn">Вернуться</button>
    </div>

    <script>
        document.getElementById("redirectBtn").addEventListener("click", function() {
            window.location.href = "charts_page.php";
        });
    </script>
</body>
</html>
