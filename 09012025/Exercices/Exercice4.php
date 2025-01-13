<?php
// Créer une fonction PHP qui génère une liste déroulante de formulaire
function genererForm($param = array(), $valeur = array())
{
    // J'initialise une variable form vide
    $form = '';
    $form.= '<select name='.$param['name'].'class='.$param['class'].'id='.$param['id'].'>';
    // Je parcours mon tableau de valeur et je génère les options de la liste déroulante
    foreach($valeur as $key => $value)
    {
        // Si la valeur de mon tableau est égale à la valeur passée en argument
        $form.= '<option value='.$key.'>'.$value.'</option>';
    }
    // Je ferme la balise select
    $form.='</select>';
    // Je retourne la chaine de caractères contenant la liste déroulante
    return $form;
}

// Utilisation de la fonction
// On crée une liste déroulante avec les prénoms de personnes
echo genererForm(['name' => 'Prenom',
                    'class' => '',
                    'id' => ''],
                    ['1' =>'Nicolas','2' =>'Imane','3' =>'Romaine','4' =>'Hugo']);
?>
