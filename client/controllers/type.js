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