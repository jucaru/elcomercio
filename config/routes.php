<?php
// Routes
$app->post('/employees', \App\Controllers\EmployeeController::class . ':indexWS');
$app->get('/employees/wsdl', \App\Controllers\EmployeeController::class . ':wsdl');

