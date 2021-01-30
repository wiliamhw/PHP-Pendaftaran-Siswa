<?php
require 'routing/Router.php';

$uri = trim($_SERVER['REQUEST_URI'], '/');

$router = Router::load('routes.php');
require $router->direct($uri);
