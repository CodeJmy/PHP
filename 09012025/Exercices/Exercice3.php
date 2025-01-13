<?php
$listeMots = [

    'determinants' => [

        'Les',

        'Mes',

        'Tes',

        'Ses',

        'Nos',

        'Vos',

        'Leurs',

        'Ces'

    ],

    'noms' => [

        'parents',

        'voitures',

        'ascenseurs',

        'passagers',

        'oiseaux',

        'spaghettis',

        'logiciels',

        'téléviseurs',

        'collègues',

        'écrans'

    ],

    'verbesConjugués' => [

        'sont',

        'ont',

        'touchent avec leurs doigts sales',

        'veulent',

        'souillent',

        'désirent',

        'anticipent',

        'détruisent',

        'mettent dans leurs bouches',

        'sucent',

    ],

    'finsDePhrases' => [

        'nos vies.',

        'les enfants.',

        'trois pizzas sauce sirracha.',

        'un kebab salade tomate oignons, chef !',

        'un célèbre autrichien plutôt rancunier'

    ]

];

function genererPhrase($listeMotsf)

{

    $phrase = '';

    foreach ($listeMotsf as $listeMot)

    {

        $rand = rand(0, count($listeMot)-1);

            $phrase .= $listeMot[$rand] . ' ';

    }

    echo $phrase;

}

genererPhrase($listeMots);
?>