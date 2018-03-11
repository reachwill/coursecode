app.controller("myCtrl", function ($scope, $http) {
    $http.get("data/players.txt")
        .success(function (response) {
            $scope.names = response;
        });
    $scope.toggle = function () {
        $scope.toggleVar = !$scope.toggleVar;
    };



    //stage 2 - FORMS
    $scope.master = {
        firstName: "John",
        lastName: "Doe",
        email: "johndoe@ email.com"
    };
    $scope.reset = function () {
        $scope.user = angular.copy($scope.master);
    };
    $scope.reset();





});