<?php

$user = '';
$password = '';
$data = [];
$driver = null;
$mdbFile = 'data.mdb';
// Current OS system
$os = current(explode(" ",php_uname()));

switch ($os){
    case 'Windows':
        $driver = '{Microsoft Access Driver (*.mdb)}';
        break;
    case 'Linux':
        $driver = 'MDBTools';
        break;
    default:
        echo "Don't know about this OS";
}

// Connection String
$dataSourceName = "odbc:Driver=$driver;DBQ=$mdbFile;";

// PDO init connection
$connection = new \PDO($dataSourceName);

// Simple query string
$query = 'SELECT * FROM tablaName';

// Fetch results
$tablaNames = $connection->query($query)->fetchAll(\PDO::FETCH_OBJ);

foreach ($tablaNames as $key => $tablaName) {
    echo sprintf('FieldNameValue: %s', $tablaName->fieldNameValue.PHP_EOL);
}