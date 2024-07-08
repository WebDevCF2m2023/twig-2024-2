<?php
// chemins vers les classes Twig
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

// chargement de l'autoload de composer
require_once "../vendor/autoload.php";

$page = "index";

$loader = new FilesystemLoader('../view');
$twig = new Environment($loader,[
    // on désactive le cache en développement
    'cache' => false,
    // on affiche le debogage en développement
    'debug' => true,
]);

if(isset($_GET['p'])){
    switch($_GET['p']){
        case 'qui-sommes-nous':
            $page = 'qui-sommes-nous';
            break;
        case 'orientation':
            $page = 'orientation';
            break;
        case 'offres-emploi':
            $page = 'offres-emploi';
            break;
        case 'contact':
            $page = 'contact';
            break;
        case 'biotiful':
            $page = 'biotiful';
            break;
        case 'agenda':
            $page = 'agenda';
            break;
        case 'accompagnement':
            $page = 'accompagnement';
            break;
        case '404-orientation':
            $page = '404-orientation';
            break;
        case '404-accompagnement':
            $page = '404-accompagnement';
            break;
    }
}

// chargement d'un template se trouvant dans view
echo $twig->render("public/$page.html.twig",[

]);


