<?php
session_start();

require __DIR__ . '/../config.php';
require __DIR__ . '/../lib/AltoRouter.php';
require __DIR__ . '/../src/Service/CaptchaService.php';
require __DIR__ . '/../src/Service/LoggerService.php';
require __DIR__ . '/../src/Service/MailService.php';
require __DIR__ . '/../src/Controller/CoreController.php';
require __DIR__ . '/../src/Controller/DefaultController.php';

$router = new AltoRouter();

// map homepage
$router->map('GET', '/', function () {
    LoggerService::incrementNumberOfVisitors();
    $controller = new DefaultController();
    $controller->homePage();
});

// map contact
$router->map('GET|POST', '/contact', function () {
    if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
        $controller = new DefaultController();
        $controller->contact();
    } else {
        header($_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
        $controller = new DefaultController();
        $controller->error404();
    }
});

// match current request url
$match = $router->match();

// call closure or throw 404 status
if (is_array($match) && is_callable($match['target'])) {
    call_user_func_array($match['target'], $match['params']);
} else {
    // no route was matched
    header($_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
    $controller = new DefaultController();
    $controller->error404();
}
