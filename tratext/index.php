<?php require_once 'translator.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>TraText - Yandex API</title>
	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
	<script src="js/translator.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">	
</head>
<body>
	
	<hr>	
	<div class="container">		
	<h1 class="text-center">TraText - Yandex API</h1>
		<div class="alert alert-success">
			<p class="messages"> + Bu alanı çevir.</p>
			<?php show_translate_string('Bu alanı çevir.') ; ?> 
			<!-- Metin, kullanıcının lokasyon bilgisi ile aynı değilse 'Translate' yazısı çıksın.
			Bu alanı veritabanından gelen verilere göre düzenleyin.
			--> 
		</div>
	
		<div class="alert alert-danger">
				<p class="messages"> + You can install the latest version of jQuery with the command</p>
				<?php show_translate_string('You can install the latest version of jQuery with the command.') ; ?> 
		</div>		
	</div>	
</body>
</html>