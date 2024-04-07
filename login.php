<?php
// проверяем, была ли отправлена форма
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // подключение к базе данных
    $host = "localhost";
    $username = "root";
    $password = "mysql";
    $database = "users";

    $conn = new mysqli($host, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // получение данных из формы
    $username = $_POST['username'];
    $password = $_POST['password'];

    // защита от SQL-инъекций
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);

    // проверяем, была ли установлена галочка "Запомнить меня"
    if (isset($_POST['remember']) && $_POST['remember'] == 'on') {
        // устанавливаем куки для имени пользователя и пароля на 1 неделю
        setcookie('username', $username, time() + (7 * 24 * 60 * 60), '/');
        setcookie('password', $password, time() + (7 * 24 * 60 * 60), '/');
    }

    // поиск пользователя в базе данных
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // пользователь найден, выполнение действий
        echo "Добро пожаловать, $username!";
    } else {
        // пользователь не найден
        echo "Неверное имя пользователя или пароль.";
    }
    // закрытие соединения с базой данных
    $conn->close();
}
?>
