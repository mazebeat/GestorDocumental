// TreeView controller for Section content
gestorDocumental.controller('treeViewController2', ['$scope', 'treeFactory', function ($scope, treeFactory) {
    $scope.objeto = treeFactory.objeto;
}]);

// TreeView controller for Section left-side
gestorDocumental.controller('treeViewController', ['$scope', '$http', 'treeFactory', function ($scope, $http, treeFactory) {
    $scope.objeto = treeFactory.objeto;

    $scope.buscarCarpeta = function () {
        treeFactory.newYear($scope.year);
        $http.post('dashboard/folder', {year: $scope.year})
            .success(function (data) {
                if (data.ok) {
                    $scope.error = false;
                    treeFactory.newStructure({
                        folders: data.folder
                    });
                    treeFactory.newMsgError("");
                } else {
                    $scope.error = true;
                    treeFactory.newStructure({});
                    treeFactory.newMsgError("No se encontraron directorios en el año " + $scope.year);
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
            treeFactory.newBreadcrumbs(breadcrums);
            $http.post('dashboard/show_folder', {name: node.name, root: node.root, year: $scope.year})
                .success(function (data) {
                    treeFactory.newListFolder(data.folder);
                });
        }
    }
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

// New User controller
gestorDocumental.controller('userFormController', ['$scope', '$http', function ($scope, $http) {

    $scope.loginFormSubmit = function () {
        return false;
    };
}]);


// Profile controller
gestorDocumental.controller('profileController', ['$scope', '$http', function ($scope, $http) {

}]);
