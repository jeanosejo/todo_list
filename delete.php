<?php

require 'vendor/autoload.php';

use App\Model as Model;

$deleteData = file_get_contents("php://input");

(new Model())->deleteTask($deleteData);

print_r(json_encode($data));

?>
