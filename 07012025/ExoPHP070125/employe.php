<?php
// Créez un tableau contenant des informations sur deux employés.

$employes = [
    [
        'Nom' => 'Alice',
        'Âge' => 30,
        'Poste' => 'Développeuse'
    ],
    [
        'Nom' => 'Marc',
        'Âge' => 45,
        'Poste' => 'Designer'
    ]
];
// Affichez les informations de chaque employé sans utiliser de boucle, en accédant aux indices et clés directement.

echo 'Nom : '. $employes[0]['Nom']. ', Âge : '. $employes[0]['Âge']. ', Poste : '. $employes[0]['Poste']. '<br>';
echo 'Nom : '. $employes[1]['Nom']. ', Âge : '. $employes[1]['Âge']. ', Poste : '. $employes[1]['Poste']. '<br>';
echo $employes[0]['Nom'].' âgée de '.$employes[0]['Âge'].' ans, est '.$employes[0]['Poste'].'<br>';
echo $employes[1]['Nom'].' âgée de '.$employes[1]['Âge'].' ans, est '.$employes[1]['Poste'].'<br>';

?>