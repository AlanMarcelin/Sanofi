<?php
chdir(__DIR__);
require './vendor/autoload.php';
require './config.php';
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


$app = new \Slim\App([


$app->run();
