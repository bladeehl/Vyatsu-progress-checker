<?php
// проверяем, были ли установлены куки
if (isset($_COOKIE['username']) && isset($_COOKIE['password'])) {
    // подключение к базе данных
    session_start();
    $host = "localhost";
    $username = "root";
    $password = "mysql";
    $database = "users";

    $conn = new mysqli($host, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // получение данных из кук
    $username = $_COOKIE['username'];
    $password = $_COOKIE['password'];

    // поиск пользователя в базе данных
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // пользователь найден, выполнение действий для авторизованного пользователя
        $_SESSION['userId'] = $username;
        header("Location: formula.php");
        exit; // завершаем выполнение скрипта после перенаправления
    } else {
        // пользователь не найден, удаляем куки и перенаправляем на страницу ввода данных
        setcookie('username', '', time() - 3600, '/');
        setcookie('password', '', time() - 3600, '/');
        // проверяем текущую страницу, чтобы избежать циклического переадресации
        if (basename($_SERVER['PHP_SELF']) !== 'index.php') {
            header("Location: index.php");
            exit;
        }
    }

    // закрытие соединения с базой данных
    $conn->close();
} else {
    // куки отсутствуют, перенаправляем на страницу ввода данных
    if (basename($_SERVER['PHP_SELF']) !== 'index.php') {
        header("Location: index.php");
        exit; //
    }
}
?>
