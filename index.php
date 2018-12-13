<?php
chdir(__DIR__);
require './vendor/autoload.php';
require './config.php';
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use \RedBeanPHP\R as R;

$app = new \Slim\App([
    'settings' => [
        'displayErrorDetails' => true
    ]
]);


$app = new \Slim\App;

//$app->get('/agences', function (Request $request, Response $response, array $args) {
//    //affichage des agences de la BDD
//
//    $agences= R::getAll( 'SELECT * FROM agency' );
//    $response->getBody()->write(json_encode($agences));
//
//    return $response->withJson($agences);
//});
//
//
//





//Routes Antoine








$app->get('/employes', function (Request $request, Response $response, array $args) {
    //affichage des agences de la BDD

    $employes= R::getAll( 'SELECT * FROM employee' );
    $response->getBody()->write(json_encode($employes));
    return $response->withJson($employes);
});
//
//
////Liste des absences (Antoine Zinedine Jagueneau)
//
//$app->get('/employes/absences', function (Request $request, Response $response, array $args) {
//    //affichage des agences de la BDD
//
//    $absences= R::getAll( 'SELECT * FROM absences' );
//    $response->getBody()->write(json_encode($absences));
//
//    return $response->withJson($absences);
//});
//
//
////Liste des revenus (Antoine Zinedine Jagueneau)
//
//$app->get('/employes/revenus', function (Request $request, Response $response, array $args) {
//    //affichage des agences de la BDD
//
//    $revenus= R::getAll( 'SELECT * FROM revenus');
//    $response->getBody()->write(json_encode($revenus));
//
//    return $response->withJson($revenus);
//});
//
//
//
////Liste des formations (Antoine Zinedine Jagueneau)
//
//$app->get('/formations', function (Request $request, Response $response, array $args) {
//    //affichage des agences de la BDD
//
//    $formations= R::getAll( 'SELECT * FROM formations' );
//    $response->getBody()->write(json_encode($formations));
//
//    return $response->withJson($formations);
//});
//
//
//
////Liste des Missions (Antoine Zinedine Jagueneau)
//
//$app->get('/missions', function (Request $request, Response $response, array $args) {
//    //affichage des agences de la BDD
//
//    $missions= R::getAll( 'SELECT * FROM missions' );
//    $response->getBody()->write(json_encode($missions));
//
//    return $response->withJson($missions);
//});
//
//
////Liste des postes (Antoine Zinedine Jagueneau)
//
//$app->get('/postes', function (Request $request, Response $response, array $args) {
//    //affichage des agences de la BDD
//
//    $postes= R::getAll( 'SELECT * FROM employee' );
//    $response->getBody()->write(json_encode($postes));
//
//    return $response->withJson($postes);
//});
//
//
////Liste des primes (Antoine Zinedine Jagueneau)
//
//$app->get('/employes/revenus/primes', function (Request $request, Response $response, array $args) {
//    //affichage des agences de la BDD
//
//    $primes= R::getAll( 'SELECT * FROM primes' );
//    $response->getBody()->write(json_encode($primes));
//
//    return $response->withJson($primes);
//});
//
//
////Liste des salaires (Antoine Zinedine Jagueneau)
//
//$app->get('/employes/revenus/salaires', function (Request $request, Response $response, array $args) {
//    //affichage des agences de la BDD
//
//    $salaires= R::getAll( 'SELECT * FROM primes' );
//    $response->getBody()->write(json_encode($salaires));
//
//    return $response->withJson($salaires);
//});
//
//
//
////Les info :
//
//
////Information du revenu d'un employé (Antoine Zinedine Jagueneau )
//
//$app->get('/employe/revenu/{codeEmploye}', function (Request $request, Response $responseCodeEmploye, array $args) {
//    //afficher un revenu définit par le code de l'employe
//
//    $resultcodeEmploye= R::findOne( 'revenu','id=?',[$args['codeEmploye']]);
//
//    return $responseCodeEmploye->withJson($resultcodeEmploye);
//});
//
//
////Information d'un employé (Antoine Zinedine Jagueneau )
//
//$app->get('/employe/{codeEmploye}', function (Request $request, Response $responseCodeEmploye, array $args) {
//    //afficher des informations sur un employe suivant le code de l'employe
//
//    $resultcodeEmploye= R::findOne( 'employee','id=?',[$args['codeEmploye']]);
//
//    return $responseCodeEmploye->withJson($resultcodeEmploye);
//});
//
//
////Information des absences d'un employé (Antoine Zinedine Jagueneau )
//
//$app->get('employe/absence/{codeEmploye}', function (Request $request, Response $responseCodeEmploye, array $args) {
//    // afficher les absences défini par un code Employe
//
//    $resultcodeEmploye= R::findOne( 'absence','id=?',[$args['codeEmploye']]);
//
//    return $responseCodeEmploye->withJson($resultcodeEmploye);
//});
//
////Liste des employés d'un poste (Antoine Zinedine Jagueneau )
//
//$app->get('/employes/{codePoste}', function (Request $request, Response $responseCodePoste, array $args) {
//    // afficher les employés defini par un code Poste
//
//    $resultcodePoste= R::findOne( 'employee','id=?',[$args['codePoste']]);
//
//    return $responseCodePoste->withJson($resultcodePoste);
//});
//
//
////Liste des sessions de formation d'un employe (Antoine Zinedine Jagueneau )
//
//$app->get('/formations/sessions/{codePoste}/{code/Employe}', function (Request $request, Response $responseSessions, array $args) {
//    // afficher les sessions defini par le poste et l'employe
//
//    $codePoste= $args['codePoste'];
//    $codeEmploye= $args['codeEmploye'];
//    $resultSessions=R::getAll('SELECT label FROM model,vehicle WHERE model.id = vehicle.model_id AND  vehicle.agency_id=?',[]);
//
//    return $responseSessions->withJson($resultSessions);
//});
//
//
////Liste des missions d'un employe (Antoine Zinedine Jagueneau)
//$app->get('/missions/{codePoste}/{code/Employe}', function (Request $request, Response $responseMissions, array $args) {
//    // afficher les missions defini par un code Employe et un code Poste
//
//    $codePoste= $args['codePoste'];
//    $codeEmploye= $args['codeEmploye'];
//    $resultMissions=R::getAll('SELECT label FROM model,vehicle WHERE model.id = vehicle.model_id AND  vehicle.agency_id=?',[]);
//
//    return $responseMissions->withJson($resultMissions);
//});
//










//Routes Lucas










//
//
//$app->get('/users', function (Request $request, Response $response, array $args) {
//    //affichage des utilisateurs de la BDD
//
//    $users= R::getAll( 'SELECT * FROM users' );
//    $response->getBody()->write(json_encode($users));
//
//    return $response->withJson($users);
//});
//
//$app->get('/vehicle', function (Request $request, Response $response, array $args) {
//    //affichage des véhicules de la BDD
//
//    $vehicles= R::getAll( 'SELECT * FROM vehicle' );
//    $response->getBody()->write(json_encode($vehicles));
//
//    return $response->withJson($vehicles);
//});
//
//$app->get('/expenseSheet', function (Request $request, Response $response, array $args) {
//    //affichage des utilisateurs de la BDD
//
//    $expenseSheet= R::getAll( 'SELECT * FROM users' );
//    $response->getBody()->write(json_encode($expenseSheet));
//
//    return $response->withJson($expenseSheet);
//});
//
//$app->get('/expenseLine', function (Request $request, Response $response, array $args) {
//    //affichage des utilisateurs de la BDD
//
//    $expenseLine= R::getAll( 'SELECT * FROM expenseLine' );
//    $response->getBody()->write(json_encode($expenseLine));
//
//    return $response->withJson($expenseLine);
//});












//Routes Pierre













//
//$app->get('/employes', function (Request $request, Response $response, array $args) {
//
//
//    $employes= R::getAll( 'SELECT * FROM employee' );
//    $response->getBody()->write(json_encode($employes));
//
//    return $response->withJson($employes);
//});
//
//
////Liste des régions (Pierre Auffret)
//
//$app->get('/regions', function (Request $request, Response $response, array $args) {
//
//
//    $regions= R::getAll( 'SELECT * FROM region' );
//    $response->getBody()->write(json_encode($regions));
//
//    return $response->withJson($regions);
//});
//
//
//
////Liste des secteurs (Pierre Auffret)
//
//$app->get('/secteurs', function (Request $request, Response $response, array $args) {
//
//
//    $secteurs= R::getAll( 'SELECT * FROM secteur' );
//    $response->getBody()->write(json_encode($secteurs));
//
//    return $response->withJson($secteurs);
//});
//
////Liste des praticiens (Pierre Auffret)
//
//$app->get('/praticiens', function (Request $request, Response $response, array $args) {
//
//
//    $praticiens= R::getAll( 'SELECT * FROM praticien' );
//    $response->getBody()->write(json_encode($praticiens));
//
//    return $response->withJson($praticiens);
//});
//
//
////Liste des visites (Pierre Auffret)
//
//$app->get('/visites', function (Request $request, Response $response, array $args) {
//
//
//    $visites= R::getAll( 'SELECT * FROM visite' );
//    $response->getBody()->write(json_encode($visites));
//
//    return $response->withJson($visites);
//});
//
//
////Liste des réunions mensuels (Pierre Auffret)
//
//$app->get('/reunionMensuels', function (Request $request, Response $response, array $args) {
//
//    $reunionMensuels= R::getAll( 'SELECT * FROM reunionMensuel' );
//    $response->getBody()->write(json_encode($reunionMensuels));
//
//    return $response->withJson($reunionMensuels);
//});
//
//
////Liste des problèmes de terrain (Pierre Auffret)
//
//$app->get('/problemesTerrain', function (Request $request, Response $response, array $args) {
//
//    $problemesTerrain= R::getAll( 'SELECT * FROM problemesTerrain' );
//    $response->getBody()->write(json_encode($problemesTerrain));
//
//    return $response->withJson($problemesTerrain);
//});
//
//
////Liste des échantillons (Pierre Auffret)
//
//$app->get('/echantillons', function (Request $request, Response $response, array $args) {
//
//    $echantillons= R::getAll( 'SELECT * FROM echantillons' );
//    $response->getBody()->write(json_encode($echantillons));
//
//    return $response->withJson($echantillons);
//});
//
////Liste des évaluations annuelles (Pierre Auffret)
//
//$app->get('/evaluationsAnnuelles', function (Request $request, Response $response, array $args) {
//
//    $evaluationsAnnuelles= R::getAll( 'SELECT * FROM evaluationsAnnuelles' );
//    $response->getBody()->write(json_encode($evaluationsAnnuelles));
//
//    return $response->withJson($evaluationsAnnuelles);
//});
//
////Liste des types d'états (Pierre Auffret)
//
//$app->get('/typesEtats', function (Request $request, Response $response, array $args) {
//
//    $typesEtats= R::getAll( 'SELECT * FROM typesEtats' );
//    $response->getBody()->write(json_encode($typesEtats));
//
//    return $response->withJson($typesEtats);
//});
//
////Liste des activités complémentaires (Pierre Auffret)
//
//$app->get('/activitesComplementaires', function (Request $request, Response $response, array $args) {
//
//    $activitesComplementaires= R::getAll( 'SELECT * FROM activitesComplementaires' );
//    $response->getBody()->write(json_encode($activitesComplementaires));
//
//    return $response->withJson($activitesComplementaires);
//});
//
//
////Liste des types de professions (Pierre Auffret)
//
//$app->get('/typesprofessions', function (Request $request, Response $response, array $args) {
//
//    $typesprofessions= R::getAll( 'SELECT * FROM typesprofessions' );
//    $response->getBody()->write(json_encode($typesprofessions));
//
//    return $response->withJson($typesprofessions);
//});
//
//
////Liste des types de statuts (Pierre Auffret)
//
//$app->get('/typesStatuts', function (Request $request, Response $response, array $args) {
//
//    $typesStatuts= R::getAll( 'SELECT * FROM typesStatuts' );
//    $response->getBody()->write(json_encode($typesStatuts));
//
//    return $response->withJson($typesStatuts);
//});
//
//
//
////Les Infos :
//
////Information d'un employé (Pierre Auffret )
//
//$app->get('/employe/{codeEmploye}', function (Request $request, Response $responseCodeEmploye, array $args) {
//    //afficher des informations sur un employe suivant le code de l'employe
//
//    $resultcodeEmploye= R::findOne( 'employee','id=?',[$args['codeEmploye']]);
//
//    return $responseCodeEmploye->withJson($resultcodeEmploye);
//});
//
//
////Information d'une visite (Pierre Auffret )
//
//$app->get('/visite/{codeVisite}', function (Request $request, Response $responseCodeVisite, array $args) {
//    //afficher des informations sur une visite suivant le code de celle-ci
//
//    $resultcodeVisite= R::findOne( 'visite','id=?',[$args['codeVisite']]);
//
//    return $responseCodeVisite->withJson($resultcodeVisite);
//});
//
////Information d'un praticien (Pierre Auffret )
//
//$app->get('/praticien/{codePraticien}', function (Request $request, Response $responseCodePraticien, array $args) {
//    //afficher des informations sur un employe suivant le code de l'employe
//
//    $resultcodePraticien= R::findOne( 'praticien','id=?',[$args['codePraticien']]);
//
//    return $responseCodePraticien->withJson($resultcodePraticien);
//});






$app->run();
