angular.module("todoList", [])

.controller("myCtrl", function($scope, $http) {
    $scope.inputTitle = {title: ''};
    $scope.tasks = [];
    $scope.selected = [];

    $scope.getTasks = function() {
        $http({
            method: 'GET',
            url: "get.php",
            type: 'json'
        }).then(function(response) {
            $scope.tasks = response.data;
        });
    };

    $scope.getTasks();

    $scope.insertTask = function() {
        if ($scope.inputTitle.title === '') {
            alert('Please enter title');
        } else {
            $http({
                method: 'POST',
                url: "insert.php",
                data: $scope.inputTitle.title
            }).then(function(response) {
                $scope.inputTitle.title = '';
                $scope.getTasks();
            });
        }
    };

    $scope.deleteTask = function(task) {
        $http({
            method: 'POST',
            url: "delete.php",
            data: task.id
        }).then(function(response) {
            $scope.select(task);
            $scope.getTasks();
        });
    };

    $scope.editTask = function(task) {
        var editTitle = prompt("Please enter your name", task.title);
        if (editTitle != null) {
            $http({
                method: 'POST',
                url: "update.php",
                data: {id: task.id, title: editTitle}
            }).then(function(response) {
                $scope.getTasks();
            });
        }
    };

    $scope.select = function(task) {
        if (task.id === $scope.selected[task.id]) {
            $scope.selected[task.id] = null;
        } else {
            $scope.selected[task.id] = task.id;
        }
    };

    $scope.isChecked = function(task) {
        var is_checked = false;
        for (var i = 0; i < $scope.selected.length; i++) {
            if ($scope.selected[i] === task.id) {
                is_checked = true;
            }
        }
        return is_checked;
    };
})
