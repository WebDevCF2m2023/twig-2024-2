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

/* test
$tab = ["un","deux","trois","quatre"];

// chargement d'un template se trouvant dans view
echo $twig->render('test.html.twig',[
    "message" => "Hello World!",
    "tab" => $tab,
]);
*/
$route = $_GET['rub'] ?? "home";

switch($route) {
    case "home":
        $response = "Ceci vient aussi de la db";
        echo $twig->render('public/public.homepage.html.twig', ['response' => $response]);
        break;
    case "suite":
        $response = "Ceci vient de la db";
        echo $twig->render('public/public.suite.html.twig', ['response' => $response]);
        break;
}

