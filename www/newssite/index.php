<?php
session_start();

require_once __DIR__ . '/autoload.php';

$ctrl = isset($_GET['ctrl']) ? $_GET['ctrl'] : 'News';
$act = isset($_GET['act']) ? $_GET['act'] : 'All';

$controllerClassName = $ctrl . 'Controller';

//require_once __DIR__ . '/controllers/' . $controllerClassName . '.php';
try{
    $controller = new $controllerClassName;
    $method = 'action' . $act;
    $controller->$method();
} catch (E404Exception $e404){
    $e404->display();
} catch (PDOException $e403){
    $log = new Logging();
    $log->message = 'Код ошибки: ' . $e403->getCode() . ', Сообщение: ' . $e403->getMessage() . ';' . PHP_EOL;
    $log->place = 'В файле: ' . $e403->getFile() . ', на строке ' . $e403->getLine();
    $log->record();

    $template  = '/exceptions/error_page.php';
    $view = new View();
    $view->items  = ['title' => 'Ошибка 403!', 'error' => $e403->getCode() . $e403->getMessage()];
    header('HTTP/1.1 403 Forbidden');
    $view->display($template);
}

