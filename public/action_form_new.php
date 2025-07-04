<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Сначала проверяем обязательные поля
    $errors = [];

    if (isset($_POST["lastname"]) && trim($_POST["lastname"]) !== '') {
        $lastname = htmlspecialchars(trim($_POST["lastname"]));
    } else {
        $errors[] = "Поле 'Фамилия' не заполнено.";
    }

    if (isset($_POST["firstname"]) && trim($_POST["firstname"]) !== '') {
        $firstname = htmlspecialchars(trim($_POST["firstname"]));
    } else {
        $errors[] = "Поле 'Имя' не заполнено.";
    }

    if (isset($_POST["answer"]) && trim($_POST["answer"]) !== '') {
        $answer = htmlspecialchars(trim($_POST["answer"]));
    } else {
        $errors[] = "Поле 'Ваши предложения' не заполнено.";
    }

    if (!empty($errors)) {
        // Выводим ошибки и прекращаем выполнение
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
        exit;
    }

    // Подключение к базе
    $host = "MySQL-8.0";
    $database = "product_store";
    $username = "root";
    $password = "";

    try {
        $opt = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        $conn = new PDO("mysql:host=$host;dbname=$database;charset=utf8", $username, $password, $opt);

        // Подготавливаем SQL-запрос
        $query = $conn->prepare("INSERT INTO feedback (lastname, firstname, answer) VALUES (:lastname, :firstname, :answer)");

        // Выполняем запрос
        if ($query->execute(['lastname' => $lastname, 'firstname' => $firstname, 'answer' => $answer])) {
            echo "Информация занесена в базу данных";
        } else {
            echo "Ошибка при записи данных в базу данных.";
        }
    } catch (PDOException $e) {
        //Более подробное сообщение об ошибке для отладки
        error_log("Database error: " . $e->getMessage());
        echo "Произошла ошибка. Пожалуйста, попробуйте позже.";
    }
}

