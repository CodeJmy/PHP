<!-- Je génère une fonction pour selectionner une date entre 1900 et aujourd'hui -->

<?php
function listeDate()
{
    $select = '<select name="date">';
    for($i=1900;$i<=date('Y');$i++)
    {
        $select.= '<option value="'.$i.'">'.$i.'</option>';
    }
    $select.= '</select>';
    return $select;
}
echo listeDate();
?>