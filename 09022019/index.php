<!DOCTYPE html>
<html>
<head>
	<title>Обработчик функций</title>
	<meta charset="utf-8">
</head>
<body>
	<div id="calculator">
	<form action="" method="POST">
		<h1>Обработчик функций PHP</h1>
		<p>В поле ниже введите PHP функцию и два числа, с которыми Вы хотите произвести действия.</p>
		<p>Пример ввода:</p>
		<ul>
			<li>sum (выдаст сумму n1 и n2);</li>
			<li>product (выдаст произведение n1 и n2);</li>
			<li>pow (выдаст число n1 в степени n2).</li>
		</ul>
		<p><label for="function">Поле для ввода функии: </label><input type="text" name = "function" id="function" placeholder="sum" pattern="^[a-zA-Z]+$" required="required"></p>
		<p><label for="n_one">Поле для ввода переменной n<sub>1</sub>:</label> <input type="text" name="n_one" id = "n_one" placeholder="Введите число" pattern="^[ 0-9]+$" required="required"></p>
		<p><label for="n_two">Поле для ввода переменной n<sub>2</sub>:</label> <input type="text" name="n_two" id = "n_two" placeholder="Введите число" pattern="^[ 0-9]+$" required="required"></p>
		<input type="submit" name="submit" value="Посчитать!">
		<p>Результат вычислений:</p>
		<p><?php
			include 'action.php';
			?></p>
	</form>
	</div>
</body>
</html>