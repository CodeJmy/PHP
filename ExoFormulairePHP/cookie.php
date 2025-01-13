<?php
setcookie('nom','David',(time()+3600));
if(!empty($_COOKIE['nom']))
{
    echo 'Bonjour, '.$_COOKIE['nom'], ' ! Content de vous revoir.'; // Pour afficher un cookie
}
else{    
    echo 'Bonjour, nouvel utilisateur !';
    }
?>