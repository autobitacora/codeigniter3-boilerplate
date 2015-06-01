<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<?php
//con esto conseguimos el nombre del controlador vigente
$router =& load_class('Router', 'core');
$controlador = $this->router->fetch_class();
//y ahora lo usamos para el titulo
echo "<title> Administracion ".$controlador."</title>";
foreach($css_files as $file): ?>
<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>
<?php foreach($js_files as $file): ?>
<script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>
<style type='text/css'>
body
{
font-family: Arial;
font-size: 14px;
}
a {
color: blue;
text-decoration: none;
font-size: 14px;
}
a:hover
{
text-decoration: underline;
}
</style>
</head>
<body>
<?php
echo "<h1>Administración de ".ucfirst($controlador)."</h1>";
?>
<div>
<?php echo $output; ?>
</div>
</body>
</html>