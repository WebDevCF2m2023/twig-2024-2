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

$pages = [
    "blank" => ["link" => "./?p=blank", "name" => "Blank Page", "view" => "public/blank.html.twig"],
    "tables" => ["link" => "./?p=tables", "name" => "Tables", "view" => "public/tables.html.twig"],
    "forms" => ["link" => "./?p=forms", "name" => "Forms", "view" => "public/forms.html.twig"],
    "tabs" => ["link" => "./?p=tabs", "name" => "Tabbed Content", "view" => "public/tabs.html.twig"],
    "calendar" => ["link" => "./?p=calendar", "name" => "Calendar", "view" => "public/calendar.html.twig"],
];

if (isset($_GET["p"], $pages[$_GET["p"]])){
    $view = $pages[$_GET["p"]]["view"];
    $current_article_link = $pages[$_GET["p"]]["link"];
}else {
    $view = "public/dashboard.html.twig";
    $current_article_link = "./";
}
echo $twig->render($view,[
    "nav_links" => $nav_links,
    "current_article_link" => $current_article_link,
]);