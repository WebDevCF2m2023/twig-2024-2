<?php
// chemins vers les classes Twig
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

// chargement de l'autoload de composer
require_once "../vendor/autoload.php";

$loader = new FilesystemLoader('../view');
$twig = new Environment($loader,[
    // on désactive le cache en développement
    'cache' => false,
    // on affiche le debogage en développement
    'debug' => true,
]);

$nav_links = [[
        "link" => "./",
        "name" => "Dashboard",
    ],[
        "link" => "./?p=blank",
        "name" => "Blank Page",
    ],[
        "link" => "./?p=tables",
        "name" => "Tables",
    ],[
        "link" => "./?p=forms",
        "name" => "Forms",
    ],[
        "link" => "./?p=tabs",
        "name" => "Tabbed Content",
    ],[
        "link" => "./?p=calendar",
        "name" => "Calendar",
    ],
];

// chargement d'un template se trouvant dans view
echo $twig->render('public/calendar.html.twig',[
    "nav_links" => $nav_links,
    "current_article_link" => "./?p=calendar",
]);


