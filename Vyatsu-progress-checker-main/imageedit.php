<?php
    session_start();

    if(isset($_SESSION['total']) && isset($_SESSION['exams'])) {
        $total = $_SESSION['total'];
        $exams = $_SESSION['exams'];
        if ($exams < 50){
            $_SESSION['image'] = 'ужасно.png';
            $_SESSION['title'] = "Ты в гробу, отчисленыш.";
        }elseif ($total <= 10){
            $_SESSION['image'] = 'ужасно.png';
            $_SESSION['title'] = "Рой себе могилу, но пока живи.";
        } elseif ($total >= 11 && $total <= 20){
            $_SESSION['image'] = 'плохо.png';
            $_SESSION['title'] = "Надо исправляться, отчисление не за горами.";
        } elseif ($total >= 21 && $total <= 50){
            $_SESSION['image'] = 'жить можно.png';
            $_SESSION['title'] = "Пора прекращать лениться.";
        } elseif ($total >= 51 && $total <= 80){
            $_SESSION['image'] = 'хорошо.png';
            $_SESSION['title'] = "Здоровья молодым.";
        } elseif ($total >= 81 && $total <= 100){
            $_SESSION['image'] = 'отлично.png';
            $_SESSION['title'] = "Знаешь значение слова 'Жить'?";
        }
        header("Location: charts_page.php");
    } else {
        echo "Значение не установлено в сессии.";
    }
    
?>