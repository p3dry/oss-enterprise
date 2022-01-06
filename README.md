# php-read-mdb

Introduction
------------

This code allows to read mdb files using PHP.

Dependencies
------------

PHP ODBC module
In Linux this is achieved by intalling the ``php5-odbc`` package::

    php -i | grep PDO
    # PDO
    # PDO support => enabled
    # PDO drivers => mysql, odbc
    # PDO Driver for MySQL => enabled
    # PDO_ODBC
    # PDO Driver for ODBC (unixODBC) => enabled

In Windows, typical PHP installation contains ODBC support.

Installation
------------

To use this, you need `PHP`, `APACHE`, `php-pdo`.   

1. To install `php-obdc` and `odbc-mdbtools` in linux, run the following command:

    ```bash
   sudo apt install php5-odbc
   sudo apt install odbc-mdbtools
    ```


Examples
--------

At first, you need to define one or more input files for the database conversion.

```php
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

// var_dump($tablaNames);
```
## Feedback
We love to get feedback from you! Did you discover a bug? Do you need an additional feature? Open an issue on Github and RebaseData will try to resolve your issue as soon as possible! Thanks in advance for your feedback!

## License
This code is licensed under the [MIT license](https://opensource.org/licenses/MIT).
