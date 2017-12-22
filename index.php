<?php
	require_once "FormBuilder/autoload.php";

	use FormBuilder\FormBuilder;

	$fb = new FormBuilder();
	$form = $fb->buildContactForm();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Générateur de formulaire</title>
	<link rel="stylesheet" href="css/bootstrap-combined.no-icons.min.css">
</head>
<body>
	<?php $form->draw(); ?>
</body>
</html>
