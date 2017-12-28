<?php

require 'vendor/autoload.php';

use App\Model as Model;

(new Model())->createTables();

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>TODO List</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" type="text/css" href="plugins/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/styles.css">

        <script src="plugins/jquery/jquery-3.1.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.6.5/angular.min.js"></script>
    </head>
    <body>
        <div class="container" ng-app="todoList" ng-controller="myCtrl" ng-cloak>
            <div class="header">
                <span class="title">TODO List</span>
                <input type="text" class="input_title" placeholder="Enter title here" ng-model="inputTitle.title">
                <span class="addBtn" ng-click="insertTask()">Add</span>
            </div>

            <ul id="myUL">
                <li ng-repeat="t in tasks">
                    {{ t.title }}
                    <span class="edit" ng-click="editTask(t)"><i class="glyphicon glyphicon-pencil"></i></span>
                    <span class="close" ng-click="deleteTask(t)">&times;</span>
                </li>
            </ul>
        </div>

        <script type="text/javascript" src="js/app.js"></script>
        <script src="plugins/bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>
