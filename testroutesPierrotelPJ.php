<?php
/**
 * Created by PhpStorm.
 * User: usersio
 * Date: 15/11/18
 * Time: 16:11
 */

//Les listes :


//Liste des employés (Pierre Auffret)

$app->get('/employes', function (Request $request, Response $response, array $args) {


    $employes= R::getAll( 'SELECT * FROM employee' );
    $response->getBody()->write(json_encode($employes));

    return $response->withJson($employes);
});


//Liste des régions (Pierre Auffret)

$app->get('/regions', function (Request $request, Response $response, array $args) {


    $regions= R::getAll( 'SELECT * FROM region' );
    $response->getBody()->write(json_encode($regions));

    return $response->withJson($regions);
});



//Liste des secteurs (Pierre Auffret)

$app->get('/secteurs', function (Request $request, Response $response, array $args) {


    $secteurs= R::getAll( 'SELECT * FROM secteur' );
    $response->getBody()->write(json_encode($secteurs));

    return $response->withJson($secteurs);
});

//Liste des praticiens (Pierre Auffret)

$app->get('/praticiens', function (Request $request, Response $response, array $args) {


    $praticiens= R::getAll( 'SELECT * FROM praticien' );
    $response->getBody()->write(json_encode($praticiens));

    return $response->withJson($praticiens);
});


//Liste des visites (Pierre Auffret)

$app->get('/visites', function (Request $request, Response $response, array $args) {


    $visites= R::getAll( 'SELECT * FROM visite' );
    $response->getBody()->write(json_encode($visites));

    return $response->withJson($visites);
});


//Liste des réunions mensuels (Pierre Auffret)

$app->get('/reunionMensuels', function (Request $request, Response $response, array $args) {

    $reunionMensuels= R::getAll( 'SELECT * FROM reunionMensuel' );
    $response->getBody()->write(json_encode($reunionMensuels));

    return $response->withJson($reunionMensuels);
});


//Liste des problèmes de terrain (Pierre Auffret)

$app->get('/problemesTerrain', function (Request $request, Response $response, array $args) {

    $problemesTerrain= R::getAll( 'SELECT * FROM problemesTerrain' );
    $response->getBody()->write(json_encode($problemesTerrain));

    return $response->withJson($problemesTerrain);
});


//Liste des échantillons (Pierre Auffret)

$app->get('/echantillons', function (Request $request, Response $response, array $args) {

    $echantillons= R::getAll( 'SELECT * FROM echantillons' );
    $response->getBody()->write(json_encode($echantillons));

    return $response->withJson($echantillons);
});

//Liste des évaluations annuelles (Pierre Auffret)

$app->get('/evaluationsAnnuelles', function (Request $request, Response $response, array $args) {

    $evaluationsAnnuelles= R::getAll( 'SELECT * FROM evaluationsAnnuelles' );
    $response->getBody()->write(json_encode($evaluationsAnnuelles));

    return $response->withJson($evaluationsAnnuelles);
});

//Liste des types d'états (Pierre Auffret)

$app->get('/typesEtats', function (Request $request, Response $response, array $args) {

    $typesEtats= R::getAll( 'SELECT * FROM typesEtats' );
    $response->getBody()->write(json_encode($typesEtats));

    return $response->withJson($typesEtats);
});

//Liste des activités complémentaires (Pierre Auffret)

$app->get('/activitesComplementaires', function (Request $request, Response $response, array $args) {

    $activitesComplementaires= R::getAll( 'SELECT * FROM activitesComplementaires' );
    $response->getBody()->write(json_encode($activitesComplementaires));

    return $response->withJson($activitesComplementaires);
});


//Liste des types de professions (Pierre Auffret)

$app->get('/typesprofessions', function (Request $request, Response $response, array $args) {

    $typesprofessions= R::getAll( 'SELECT * FROM typesprofessions' );
    $response->getBody()->write(json_encode($typesprofessions));

    return $response->withJson($typesprofessions);
});


//Liste des types de statuts (Pierre Auffret)

$app->get('/typesStatuts', function (Request $request, Response $response, array $args) {

    $typesStatuts= R::getAll( 'SELECT * FROM typesStatuts' );
    $response->getBody()->write(json_encode($typesStatuts));

    return $response->withJson($typesStatuts);
});



//Les Infos :

//Information d'un employé (Pierre Auffret )

$app->get('/employe/{codeEmploye}', function (Request $request, Response $responseCodeEmploye, array $args) {
    //afficher des informations sur un employe suivant le code de l'employe

    $resultcodeEmploye= R::findOne( 'employee','id=?',[$args['codeEmploye']]);

    return $responseCodeEmploye->withJson($resultcodeEmploye);
});


//Information d'une visite (Pierre Auffret )

$app->get('/visite/{codeVisite}', function (Request $request, Response $responseCodeVisite, array $args) {
    //afficher des informations sur une visite suivant le code de celle-ci

    $resultcodeVisite= R::findOne( 'visite','id=?',[$args['codeVisite']]);

    return $responseCodeVisite->withJson($resultcodeVisite);
});

//Information d'un praticien (Pierre Auffret )

$app->get('/praticien/{codePraticien}', function (Request $request, Response $responseCodePraticien, array $args) {
    //afficher des informations sur un employe suivant le code de l'employe

    $resultcodePraticien= R::findOne( 'praticien','id=?',[$args['codePraticien']]);

    return $responseCodePraticien->withJson($resultcodePraticien);
});


//Les enregistrements :


