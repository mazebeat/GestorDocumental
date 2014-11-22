// Init app
var gestorDocumental = angular.module('gestorDocumental', ['debounce', 'localytics.directives', 'AxelSoft']);

// Loading directive
gestorDocumental.directive('loading', function () {
    return {
        restrict: 'E',
        replace: true,
        template: '<div class="loading" style="margin-top: 15px;"><img src="images/loaders/loader3.gif"/></div>',
        link: function (scope, element, attr) {
            scope.$watch('loading', function (val) {
                if (val)
                    $(element).show();
                else
                    $(element).hide();
            });
        }
    }
});

// TreeView Service
gestorDocumental.factory('treeFactory', function () {
    var servicio = {
        objeto: {
            lista: [
                {name: 'Carpeta', root: 'a_2014**m_04**c_1111'}
            ],
            messageError: 'Mensaje de error de prueba'
        },
        newListFolder: function (list) {
            servicio.objeto.lista = list;
        },
        newMsgError: function (msg) {
            servicio.objeto.messageError = msg;
        }
    };

    return servicio;
});


gestorDocumental.controller('treeViewController2', ['$scope', 'treeFactory', function ($scope, treeFactory) {
    $scope.objeto = treeFactory.objeto;
    $scope.listFolder = treeFactory.listFolder;
    $scope.messageError = treeFactory.messageError;
}]);

// TreeView controller
gestorDocumental.controller('treeViewController', ['$scope', '$http', 'treeFactory', function ($scope, $http, treeFactory) {

    $scope.breadcrums = [''];
    $scope.messageError = treeFactory.messageError;
    $scope.objeto = treeFactory.objeto;

    $scope.buscarCarpeta = function () {
        $http.post('dashboard/folder', {year: $scope.year})
            .success(function (data) {
                if (data.ok) {
                    $scope.error = false;
                    $scope.structure = {
                        folders: data.folder
                    };
                    $scope.messageError = "";
                } else {
                    $scope.error = true;
                    $scope.structure = {};
                    $scope.messageError = "No se encontro directorio";
                }
            });
    }

    var iconClassMap = {
            txt: 'icon-file-text',
            jpg: 'icon-picture blue',
            png: 'icon-picture orange'
        },
        defaultIconClass = 'icon-file';

    $scope.options = {
        mapIcon: function (file) {
            var pattern = /\.(\w+)$/,
                match = pattern.exec(file.name),
                ext = match && match[1];

            return iconClassMap[ext] || defaultIconClass;
        },
        onNodeSelect: function (node, breadcrums) {
            $scope.breadcrums = breadcrums;
            $http.post('dashboard/show_folder', {name: node.name, root: node.root, year: $scope.year})
                .success(function (data) {
                    $scope.listFolder = treeFactory.newListFolder(data.folder);
                });
        }
    }

    $scope.listFolder = treeFactory.newListFolder("HOLA MUNDOI");
}]);

// Search controller
gestorDocumental.controller('searchController', ['$scope', '$http', function ($scope, $http) {
    $scope.keyword = null;

    $scope.change = function (text) {
        $scope.keyword = text;

        //$http.get('dashboard/fastSearch/' + keyword).then(function (result) {
        //    $scope.entries = result.data;
        //});
    }
}]);

// Signin controller
gestorDocumental.controller('signInController', ['$scope', '$http', function ($scope, $http) {
    $scope.selectProfile = '';
    $scope.perfilesFromQuery = {};

    $scope.loginFormSubmit = function () {
        return false;
    }

    $scope.signInOne = function () {

        $scope.loading = true;
        init.start();

        if ($scope.user.username === '') {
            $scope.loading = false;
            init.stop();
            return false; // break
        }

        $http.post('/', {username: $scope.user.username, password: $scope.user.password})
            .success(function (data) {
                if (data.ok) {
                    if (data.find) {
                        $scope.loading = false;
                        init.stop();
                        $scope.perfilesFromQuery = data.profiles;
                        jQuery('#profileList').modal('show');
                    } else {
                        $scope.loading = false;
                        init.stop();
                        $scope.perfilesFromQuery = {};
                        jQuery('#profileList').modal('hide');
                    }
                } else {
                    $scope.loading = false;
                    init.stop();
                    angular.forEach(data.message, function (value, key) {
                    });
                }
            });
    }

    $scope.signInTwo = function () {
        finish.start();
        $http.post('loginFinish', {profile: $scope.user.profile})
            .success(function (data) {
                if (data.ok) {
                    window.location = "dashboard";
                    finish.stop();
                } else {
                    window.location = "/"
                }
            });
    }
}]);
