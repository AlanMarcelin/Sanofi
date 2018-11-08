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


$app->get('agence/{codeAgence}/{codeTypeVehicule}/{dateHeureDepart}/{dateHeureArrivee}', function (Request $request, Response $responseCodeAgence, array $args) {
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


$app->get('reservation/creer/{codeTypeVehicule}/{DateHeureDepart}/{dateHeureArrivee}/{codeAgenceDepart}/{codeAgenceArrivee}', function (Request $request, Response $responseReservationCreation, array $args) {
    // ajout d'une reservation

    $codeAgence= $args['codeAgence'];
    $codeVehiclue= $args[' codeTypeVehicule'];
    $resultcodeAgence=R::getAll('');

    return $responseReservationCreation->withJson($resultcodeAgence);
});

$app->run();
