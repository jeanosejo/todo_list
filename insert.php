<?php

require 'vendor/autoload.php';

use App\Model as Model;

$insertData = file_get_contents("php://input");

(new Model())->insertTask($insertData);

print_r(json_encode($data));

?>
