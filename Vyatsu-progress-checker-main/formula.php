<?php
    session_start();
    $host = "localhost";
    $username = "root";
    $password = "mysql";
    $database = "users";

    $conn = new mysqli($host, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // получение данных из формы
    $userid = $_SESSION['id'];

    // запрос для получения данных из таблицы datas, учитывая последнее обновление
    $sql = "SELECT totalExams, attendedExams, pointsProg, totalProg, pointsMath, totalMath, pointsInfo,
        totalInfo, pointsEng, totalEng, pointsPhys, totalPhys, pointsLabs, totalLabs
        FROM datas 
        WHERE id = '$userid' 
        ORDER BY lastUpdated DESC 
        LIMIT 1";

    $stmt = $conn->prepare($sql);
    
    if ($stmt === false) {
        die("Ошибка подготовки запроса: $conn->error");
    }

    if ($stmt->execute()) {
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // получение данных из datas
            $row = $result->fetch_assoc();
            $numberOfPoint = $row["pointsProg"] + $row["pointsMath"] + $row["pointsInfo"] + $row["pointsEng"] + $row["pointsPhys"];
            $attendedExams = $row["attendedExams"];
            $numberOfVisits = $row["totalProg"] + $row["totalMath"] + $row["totalInfo"] + $row["totalEng"] + $row["totalPhys"];
            $totalExams = $row["totalExams"];
            $numberOfLabs = $row["pointsLabs"];
            $totalOfLabs = $row["totalLabs"];

            // вычисление значения выражения
            if ($numberOfPoint <= $numberOfVisits)
                $resultValuePoint = ($numberOfPoint / $numberOfVisits) * 100;
            else
                $resultValuePoint = 100;
            $resultValueExams = ($attendedExams / $totalExams) * 100;
            $resultValueLabs = ($numberOfLabs / $totalOfLabs) * 100;
            $totalResult = ($resultValuePoint+$resultValueExams+$resultValueLabs)/3;

            // передача по текущей сессии
            $_SESSION['exams'] = $resultValueExams;
            $_SESSION['total'] = $totalResult;

            // переадресация на imageedit
            header("Location: imageedit.php");
        } else {
            echo "Нет данных для пользователя $userid.";
        }
    } else {
        echo "Ошибка выполнения запроса: $stmt->error";
    }

    $stmt->close();
    $conn->close();
?>