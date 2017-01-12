<!-- Las plantillas html que pueden convivir con codigo php, actuarán como mascaras con un aspecto que se visualizará en el navegador pero tendrán espacios con código php que el controlador dará desde el modelo. -->

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Home</title>
</head>
<body>
	<h1><?= $this->title; ?></h1>
	<h2><?= $this->name; ?></h2>
</body>
</html>