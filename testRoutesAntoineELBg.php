<?php


/**
 * Created by PhpStorm.
 * User: usersio
 * Date: 15/11/18
 * Time: 14:20
 */

//Les listes :

//Liste des employés (Antoine Zinedine Jagueneau)

$app->get('/employes', function (Request $request, Response $response, array $args) {
    //affichage des agences de la BDD

    $employes= R::getAll( 'SELECT * FROM employee' );
    $response->getBody()->write(json_encode($employes));

    return $response->withJson($employes);
});


//Liste des absences (Antoine Zinedine Jagueneau)

$app->get('/employes/absences', function (Request $request, Response $response, array $args) {
    //affichage des agences de la BDD

    $absences= R::getAll( 'SELECT * FROM absences' );
    $response->getBody()->write(json_encode($absences));

    return $response->withJson($absences);
});


//Liste des revenus (Antoine Zinedine Jagueneau)

$app->get('/employes/revenus', function (Request $request, Response $response, array $args) {
    //affichage des agences de la BDD

    $revenus= R::getAll( 'SELECT * FROM revenus');
    $response->getBody()->write(json_encode($revenus));

    return $response->withJson($revenus);
});



//Liste des formations (Antoine Zinedine Jagueneau)

$app->get('/formations', function (Request $request, Response $response, array $args) {
    //affichage des agences de la BDD

    $formations= R::getAll( 'SELECT * FROM formations' );
    $response->getBody()->write(json_encode($formations));

    return $response->withJson($formations);
});



//Liste des Missions (Antoine Zinedine Jagueneau)

$app->get('/missions', function (Request $request, Response $response, array $args) {
    //affichage des agences de la BDD

    $missions= R::getAll( 'SELECT * FROM missions' );
    $response->getBody()->write(json_encode($missions));

    return $response->withJson($missions);
});


//Liste des postes (Antoine Zinedine Jagueneau)

$app->get('/postes', function (Request $request, Response $response, array $args) {
    //affichage des agences de la BDD

    $postes= R::getAll( 'SELECT * FROM employee' );
    $response->getBody()->write(json_encode($postes));

    return $response->withJson($postes);
});


//Liste des primes (Antoine Zinedine Jagueneau)

$app->get('/employes/revenus/primes', function (Request $request, Response $response, array $args) {
    //affichage des agences de la BDD

    $primes= R::getAll( 'SELECT * FROM primes' );
    $response->getBody()->write(json_encode($primes));

    return $response->withJson($primes);
});


//Liste des salaires (Antoine Zinedine Jagueneau)

$app->get('/employes/revenus/salaires', function (Request $request, Response $response, array $args) {
    //affichage des agences de la BDD

    $salaires= R::getAll( 'SELECT * FROM primes' );
    $response->getBody()->write(json_encode($salaires));

    return $response->withJson($salaires);
});



//Les info :


//Information du revenu d'un employé (Antoine Zinedine Jagueneau )

$app->get('/employe/revenu/{codeEmploye}', function (Request $request, Response $responseCodeEmploye, array $args) {
    //afficher un revenu définit par le code de l'employe

    $resultcodeEmploye= R::findOne( 'revenu','id=?',[$args['codeEmploye']]);

    return $responseCodeEmploye->withJson($resultcodeEmploye);
});


//Information d'un employé (Antoine Zinedine Jagueneau )

$app->get('/employe/{codeEmploye}', function (Request $request, Response $responseCodeEmploye, array $args) {
    //afficher des informations sur un employe suivant le code de l'employe

    $resultcodeEmploye= R::findOne( 'employee','id=?',[$args['codeEmploye']]);

    return $responseCodeEmploye->withJson($resultcodeEmploye);
});


//Information des absences d'un employé (Antoine Zinedine Jagueneau )

$app->get('employe/absence/{codeEmploye}', function (Request $request, Response $responseCodeEmploye, array $args) {
    // afficher les absences défini par un code Employe

    $resultcodeEmploye= R::findOne( 'absence','id=?',[$args['codeEmploye']]);

    return $responseCodeEmploye->withJson($resultcodeEmploye);
});

//Liste des employés d'un poste (Antoine Zinedine Jagueneau )

$app->get('/employes/{codePoste}', function (Request $request, Response $responseCodePoste, array $args) {
    // afficher les employés defini par un code Poste

    $resultcodePoste= R::findOne( 'employee','id=?',[$args['codePoste']]);

    return $responseCodePoste->withJson($resultcodePoste);
});


//Liste des sessions de formation d'un employe (Antoine Zinedine Jagueneau )

$app->get('/formations/sessions/{codePoste}/{code/Employe}', function (Request $request, Response $responseSessions, array $args) {
    // afficher les sessions defini par le poste et l'employe

    $codePoste= $args['codePoste'];
    $codeEmploye= $args['codeEmploye'];
    $resultSessions=R::getAll('SELECT label FROM model,vehicle WHERE model.id = vehicle.model_id AND  vehicle.agency_id=?',[]);

    return $responseSessions->withJson($resultSessions);
});


//Liste des missions d'un employe (Antoine Zinedine Jagueneau)
$app->get('/missions/{codePoste}/{code/Employe}', function (Request $request, Response $responseMissions, array $args) {
    // afficher les missions defini par un code Employe et un code Poste

    $codePoste= $args['codePoste'];
    $codeEmploye= $args['codeEmploye'];
    $resultMissions=R::getAll('SELECT label FROM model,vehicle WHERE model.id = vehicle.model_id AND  vehicle.agency_id=?',[]);

    return $responseMissions->withJson($resultMissions);
});


//Les enregistrements








