<?php

require 'vendor/autoload.php';

use App\Model as Model;

$updateData = json_decode(file_get_contents("php://input"));

(new Model())->updateTask($updateData);

print_r(json_encode($data));

?>
