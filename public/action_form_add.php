<?php
// Параметры подключения — замените на свои
$host = 'MySQL-8.0';
$db   = 'product_store';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    die("Ошибка подключения к базе данных: " . $e->getMessage());
}

// Получаем данные из POST и очищаем
$name = trim($_POST['name_products'] ?? '');
$surface = trim($_POST['surface'] ?? '');
$volume = trim($_POST['volume'] ?? '');
$price = trim($_POST['price'] ?? '');
$image = trim($_POST['image'] ?? '');

// Простая валидация
$errors = [];

if ($name === '') $errors[] = 'Введите название продукта.';
if ($surface === '') $errors[] = 'Введите поверхность.';
if ($volume === '') $errors[] = 'Введите объём.';
if ($price === '' || !is_numeric($price) || (int)$price < 0) $errors[] = 'Введите корректную цену.';
if ($image === '') $errors[] = 'Введите имя изображения.';

if ($errors) {
    // Если есть ошибки — выводим и останавливаемся
    echo '<h2>Ошибки при заполнении формы:</h2><ul>';
    foreach ($errors as $err) {
        echo '<li>' . htmlspecialchars($err) . '</li>';
    }
    echo '</ul>';
    echo '<p><a href="add_product_form.php">Вернуться к форме</a></p>';
    exit;
}

// Вставляем в таблицу
$stmt = $pdo->prepare("INSERT INTO products (name_products, surface, volume, price, image) VALUES (?, ?, ?, ?, ?)");
$stmt->execute([$name, $surface, $volume, (int)$price, $image]);

echo '<h2>Продукт успешно добавлен!</h2>';
echo '<p><a href="add_product_form.php">Добавить ещё один продукт</a></p>';
echo '<p><a href="index.php">На главную</a></p>';

