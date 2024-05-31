<?php
use Src\Api\Forms;
use Src\FormController;
use Src\Router;

$route = new Router();
$route->addRoute('/api/create-form', Forms::class, 'createForms');
$route->addRoute('/api/save-form', Forms::class, 'saveForms');
$route->addRoute('/', FormController::class, 'renderFormsList');
$route->addRoute('/load-form', FormController::class, 'loadForm');
$route->addRoute('/create-form', FormController::class, 'createForm');
$route->addRoute('/save-form', FormController::class, 'saveForm');
return $route;
