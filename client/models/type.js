yii2AngApp_type.factory("services", ['$http', '$location', '$route',
    function ($http, $location, $route) {
    var obj = {};
    obj.getTypes = function () {
        return $http.get(serviceBase + 'types');
    };
    obj.getType = function (typeID) {
        return $http.get(serviceBase + 'types/' + typeID);
    };
    obj.createType = function (type) {
        return $http.post(serviceBase + 'types', type)
            .then(successHandler)
            .catch(errorHandler);
        function successHandler(result) {
            $location.path('/type/index');
        }
        function errorHandler(result) {
            alert("Error data");
            $location.path('/type/create');
        }
    };
    obj.updateType = function (type) {
        return $http.put(serviceBase + 'types/' + type.id, type)
            .then(successHandler)
            .catch(errorHandler);
        function successHandler(result) {
            $location.path('/type/index');
        }
        function errorHandler(result) {
            alert("Error data");
            $location.path('/type/update');
        }
    };
    obj.deleteType = function (typeID) {
        return $http.delete(serviceBase + 'types/' + typeID)
            .then(successHandler)
            .catch(errorHandler);
        function successHandler(result) {
            $route.reload();
        }
        function errorHandler(result) {
            alert("Error data");
            $route.reload();
        }
    };
    return obj;
}]);
