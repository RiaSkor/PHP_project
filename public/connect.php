<!DOCTYPE html>
<html lang=ru >
<head>
	<title>Лакокрасочные материалы</title>
	<link rel="stylesheet" href="style.css" >
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>

<div class="wrapper">

    <header>
        <div class="header-container">
			<a href="index.html"><img src="static/logo.png" alt="Логотип" class="logopic"></a>
			<div class="header-info">
				<p>Свяжитесь с нами | </p>
					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
					  <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z"/>
					</svg>
					<span> +7 (123) 456-78-90 </span>				
			</div>
			<div class = "zav">
			<p><a href = "connect.php">Оставьте заявку</a></p>
				<div class="cart-container">
					<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-basket2-fill" viewBox="0 0 16 16">
					  <path d="M5.929 1.757a.5.5 0 1 0-.858-.514L2.217 6H.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h.623l1.844 6.456A.75.75 0 0 0 3.69 15h8.622a.75.75 0 0 0 .722-.544L14.877 8h.623a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1.717L10.93 1.243a.5.5 0 1 0-.858.514L12.617 6H3.383zM4 10a1 1 0 0 1 2 0v2a1 1 0 1 1-2 0zm3 0a1 1 0 0 1 2 0v2a1 1 0 1 1-2 0zm4-1a1 1 0 0 1 1 1v2a1 1 0 1 1-2 0v-2a1 1 0 0 1 1-1"/>
					</svg>
					<span class="cart-count">0</span>
					<div class="cart-dropdown">
						<div class="cart-items">
							<!-- Здесь будут отображаться товары -->
						</div>
						<div class="cart-total">
							Итого: <span class="cart-total-price">0</span> руб.
						</div>
					</div>
				</div>
			</div>
		</div>
    </header>

    <nav>
        <a href="index.html">Главная</a>
        <a href="about.html">О компании</a>
        <a href="products.php">Продукция</a>
        <a href="add_product_form.php">Добавить продукт</a>
    </nav>

    <main>
        <div class=content>
        <form action="action_form_new.php" method="post">

            <div class="form-container">
                <h2>Оставьте заявку</h2>
                <p>на бесплатную консультацию по вопросам колеровки, доставки и сроках хранения продуктов</p><br><br>

                <fieldset>
                    <label for="lastname">Фамилия:</label>
                    <input type="text" name="lastname" id="lastname">
                </fieldset>

                <fieldset>
                    <label for="firstname">Имя:</label>
                    <input type="text" name="firstname" id="firstname" required>
                </fieldset>

                <fieldset>
                    <label for="answer">Внесите Ваши предложения по улучшению нашей работы:</label>
                    <textarea name="answer" id="answer" rows="5" cols="50" required></textarea>
                </fieldset>

                <input type="submit" value="Отправить">

            </div>

        </form>
        </div>
    </main>

    <footer>
	<div class = "footer">
		<div>
            <h3>Продукция</h3>
            <ul>
                <li>Лаки</li>
                <li>Краски</li>
                <li>Морилки</li>
                <li>Колеровка</li>
            </ul>
        </div>
        <div>
            <h3>Компания</h3>
            <ul>
                <li>О компании</li>
                <li>Партнеры</li>
                <li>Реквизиты</li>
                <li>Вакансии</li>
            </ul>
        </div>
        <div>
            <h3>Закупки</h3>
            <ul>
                <li>Доставка</li>
                <li>Контакты</li>
            </ul>
        </div>
        <div>
            <h3>Контакты</h3>
			<ul>
                <li>+7 (123) 456-78-90</li>
                <li>+7 (343) 379-49-42</li>
                <li>+7 (343) 125-42-42</li>
            </ul>
            <br>
            <p><a href="mailto:lacocras@mail.ru">lacocras@mail.ru</a></p>
        </div>
	</div>	
    
	
	<div class="footer-bottom">
		<p>&copy; 2025 ООО "ЛАКОКРАС". Все права защищены.</p>
	</div>
	
	</footer>
	
</div>

<script src="script.js"></script>
</body>
</html>
