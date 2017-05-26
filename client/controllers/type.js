'use strict';
yii2AngApp_type.config(['$routeProvider', function ($routeProvider) {
    $routeProvider
        .when('/type/index', {
            templateUrl: 'views/type/index.html',
            controller: 'index'
        })
        .when('/type/create', {
            templateUrl: 'views/type/create.html',
            controller: 'create',
            resolve: {
                type: function (services, $route) {
                    return services.getTypes();
                }
            }
        })
        .when('/type/update/:typeId', {
            templateUrl: 'views/type/update.html',
            controller: 'update',
            resolve: {
                type: function (services, $route) {
                    var typeId = $route.current.params.typeId;
                    return services.getType(typeId);
                }
            }
        })
        .when('/type/delete/:typeId', {
            templateUrl: 'views/type/delete.html',
            controller: 'delete'
        })
        .otherwise({
            redirectTo: 'type/index'
        })
}]);

yii2AngApp_type
    .controller('index', ['$scope', '$http', 'services',
        function ($scope, $http, services) {
            $scope.message = 'Everyone come and see how good I look!';
            services.getTypes().then(function (data) {
                $scope.types = data.data;
            });
            $scope.deleteType = function (typeID) {
                if(confirm('Are you sure?') == true && typeID > 0) {
                    services.deleteType(typeID);
                    $route.reload();
                }
            };
        }])
    .controller('create', ['$scope', '$http', 'services','$location','type',
        function ($scope, $http, services, $location, type) {
            $scope.message = 'Hey hey';
            $scope.createType = function (type) {
                var results = services.createType(type);
            }
        }])
    .controller('update', ['$scope', '$http', '$routeParams', 'services', '$location', 'type',
        function ($scope, $http, $routeParams, services, $location, type) {
            $scope.message = 'Contact';
            var original = type.data;
            $scope.type = angular.copy(original);
            $scope.isClean = function () {
                return angular.equals(original, $scope.type);
            };
            $scope.updateType = function (type) {
                var results = services.updateType(type);
            }
        }]);