<?php

require 'vendor/autoload.php';

use App\Model as Model;

print_r(json_encode((new Model())->getTasks()));

?>
