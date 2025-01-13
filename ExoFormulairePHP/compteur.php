<?php
session_start();
if (isset($_SESSION))
{
    $_SESSION['nombre']++;
    echo 'Vous avez visité cette page '.$_SESSION['nombre'].',fois';
}
else
{
    $_SESSION['nombre'] == 0;
    echo "c'est votre première visite"
}
var_dump($_SESSION);
?>
