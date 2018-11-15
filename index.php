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


$app->get('/employes', function (Request $request, Response $response, array $args) {

    //affichage des employes          ALAN

    $employes= R::getAll( 'SELECT * FROM employes' );
    $response->getBody()->write(json_encode($employes));

    return $response->withJson($employes);
});


$app->get('/regions', function (Request $request, Response $response, array $args) {

    //affichage des regions          ALAN

    $regions= R::getAll( 'SELECT * FROM regions' );
    $response->getBody()->write(json_encode($regions));

    return $response->withJson($regions);
});


$app->get('/secteurs', function (Request $request, Response $response, array $args) {

    //affichage des secteurs         ALAN

    $secteurs= R::getAll( 'SELECT * FROM secteurs' );
    $response->getBody()->write(json_encode($secteurs));

    return $response->withJson($secteurs);
});


$app->get('/praticiens', function (Request $request, Response $response, array $args) {

    //affichage des praticiens          ALAN

    $praticiens= R::getAll( 'SELECT * FROM praticiens' );
    $response->getBody()->write(json_encode($praticiens));

    return $response->withJson($praticiens);
});


$app->get('/visites', function (Request $request, Response $response, array $args) {

    //affichage des visites       ALAN

    $visites= R::getAll( 'SELECT * FROM visites' );
    $response->getBody()->write(json_encode($visites));

    return $response->withJson($visites);
});


$app->get('/formation', function (Request $request, Response $response, array $args) {

    //affichage des formation        ALAN

    $formation= R::getAll( 'SELECT * FROM formation' );
    $response->getBody()->write(json_encode($formation));

    return $response->withJson($formation);
});


$app->get('/employe/{codeEmploye}', function (Request $request, Response $response, array $args) {

    //afficher les informations d'un employe        ALAN

    $codeEmploye= $args['codeEmploye'];
    $request= "call LA PROCEDURE STOCKEE (";
    $agences= R::getAll( $request .'"'.$codeEmploye.'");');
    $response->getBody()->write(json_encode($agences));

    return $response->withJson($agences);
});


$app->get('/visite/{codeVisite}', function (Request $request, Response $response, array $args) {

    //afficher les informations d'une visite         ALAN

    $codeVisite= $args['codeVisite'];
    $request= "call LA PROCEDURE STOCKEE (";
    $agences= R::getAll( $request .'"'.$codeVisite.'");');
    $response->getBody()->write(json_encode($agences));

    return $response->withJson($agences);
});


$app->get('/praticiens/{codePraticiens}', function (Request $request, Response $response, array $args) {

    //afficher les informations d'un praticiens          ALAN

    $codePraticiens= $args['codePraticiens'];
    $request= "call LA PROCEDURE STOCKEE (";
    $agences= R::getAll( $request .'"'.$codePraticiens.'");');
    $response->getBody()->write(json_encode($agences));

    return $response->withJson($agences);
});


$app->get('/objectif/{codeObjectif}', function (Request $request, Response $response, array $args) {

    //afficher un objectif          ALAN

    $codeObjectif= $args['codeObjectif'];
    $request= "call LA PROCEDURE STOCKEE (";
    $agences= R::getAll( $request .'"'.$codeObjectif.'");');
    $response->getBody()->write(json_encode($agences));

    return $response->withJson($agences);
});


$app->get('/objectif/{codeObjectif}', function (Request $request, Response $response, array $args) {

    //afficher un objectif          ALAN

    $codeObjectif= $args['codeObjectif'];
    $request= "call LA PROCEDURE STOCKEE (";
    $agences= R::getAll( $request .'"'.$codeObjectif.'");');
    $response->getBody()->write(json_encode($agences));

    return $response->withJson($agences);
});


$app->get('/objectif/creer/{nombreEchantillons}', function (Request $request, Response $responseReservationCreation, array $args) {
    // ajout d'un objectif          ALAN

    $codeAgence= $args['codeAgence'];
    $codeVehiclue= $args[' codeTypeVehicule'];
    $resultcodeAgence=R::getAll('');

    return $responseReservationCreation->withJson($resultcodeAgence);
});

$app->run();

































$app->get('/location/{DateFin}/{NbLocation}', function (Request $request, Response $response, array $args) {
//locations en cours pour un jour donné

    $dateFin= $args['DateFin'];
    $NbLocation=$args['NbLocation'];
    $request= "call sixt_v0.ps_find_rental_per_day(";
    $agences= R::getAll( $request .'"'.$dateFin.'"'.','.$NbLocation.');');
    $response->getBody()->write(json_encode($agences));

    return $response->withJson($agences);
});



$app->get('/customer/{idCustomer}', function (Request $request, Response $response, array $args) {
    //afficher les réservation d'un client

    $idCustomer= $args['idCustomer'];
    $request= "call sixt_v0.ps_find_rental_per_customer_id(";
    $agences= R::getAll( $request .'"'.$idCustomer.'");');
    $response->getBody()->write(json_encode($agences));

    return $response->withJson($agences);
});

$app->get('/km/{agenceId}', function (Request $request, Response $response, array $args) {
    //afficher les kilometres d'un véhicule

    $agenceId= $args['agenceId'];
    $request= "call sixt_v0.ps_find_vehicule_to_change_per_agence_id(";
    $agences= R::getAll( $request .'"'.$agenceId.'");');
    $response->getBody()->write(json_encode($agences));

    return $response->withJson($agences);
});


$app->get('/agences', function (Request $request, Response $response, array $args) {
    //affichage des agences de la BDD

    $agences= R::getAll( 'SELECT * FROM agency' );
    $response->getBody()->write(json_encode($agences));

    return $response->withJson($agences);
});






$app->get('/agences/{codeAgence}', function (Request $request, Response $responseCodeAgence, array $args) {
    // afficher une agence  définit par son ID

    $resultcodeAgence= R::findOne( 'agency','id=?',[$args['codeAgence']]);

    return $responseCodeAgence->withJson($resultcodeAgence);
});


$app->get('/agences/{codeAgence}/typesVehicules', function (Request $request, Response $responseCodeAgence, array $args) {
    // afficher une liste de véhicules présent dans une agence à l'ID précises

    $codeAgence= $args['codeAgence'];
    $resultcodeAgence=R::getAll('SELECT label FROM model,vehicle WHERE model.id = vehicle.model_id AND  vehicle.agency_id=?',[$codeAgence]);

    return $responseCodeAgence->withJson($resultcodeAgence);
});


$app->get('agences/{codeAgence}/{codeTypeVehicule}/{dateHeureDepart}/{dateHeureArrivee}', function (Request $request, Response $responseCodeAgence, array $args) {
    // afficher la liste des véhicules dans une agence et si ils sont disponibles

    $codeAgence= $args['codeAgence'];
    $codeVehiclue= $args[' codeTypeVehicule'];
    $resultcodeAgence=R::getAll('SELECT * FROM model,vehicle,rental WHERE model.id = vehicle.model_id AND vehicle.id= rental.vehicle_id AND startDate < {dateHeureArrive} AND andDate > {dateHeureDepart} AND vehicle.agency_id=?',[$codeAgence]);

    return $responseCodeAgence->withJson($resultcodeAgence);
});


$app->get('reservations/[{dateDebut}]', function (Request $request, Response $responseReservation, array $args) {
    // affichage des réservations du client

    $codeAgence= $args['codeAgence'];
    $codeVehiclue= $args[' codeTypeVehicule'];
    $resultcodeAgence=R::getAll('');

    return $responseReservation->withJson($resultcodeAgence);
});


$app->get('reservations/creer/{codeTypeVehicule}/{DateHeureDepart}/{dateHeureArrivee}/{codeAgenceDepart}/{codeAgenceArrivee}', function (Request $request, Response $responseReservationCreation, array $args) {
    // ajout d'une reservation

    $codeAgence= $args['codeAgence'];
    $codeVehiclue= $args[' codeTypeVehicule'];
    $resultcodeAgence=R::getAll('');

    return $responseReservationCreation->withJson($resultcodeAgence);
});

$app->run();
