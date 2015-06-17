String.prototype.endsWith = function (s) {
    return this.length >= s.length && this.substr(this.length - s.length) == s;
};

// TreeView controller for Section content
gestorDocumental
    .controller('treeViewController2', ['$scope', 'treeFactory', function ($scope, treeFactory) {
        $scope.objeto = treeFactory.objeto;
    }])

    // TreeView controller for Section left-side
    .controller('treeViewController', ['$scope', '$http', 'treeFactory', '$location', function ($scope, $http, treeFactory, $location) {
        $scope.objeto = treeFactory.objeto;

        //$http.post('/dashboard/getSession', {session: 'listFolders'})
        //    .then(function (response) {
        //        if (response.status == 200) {
        //            response = response.data;
        //
        //            if (response.ok) {
        //                $scope.year = response.data.year;
        //                //treeFactory.newListFolder(response.data.folder);
        //                treeFactory.newStructure({folders: response.data.folder});
        //                var absUrl = $location.absUrl();
        //                console.log(absUrl)
        //
        //                if (!absUrl.endsWith("/dashboard")) {
        //                    $http.post('/dashboard/saveSession', {session: 'listFolders_' + $scope.year, data: {folder: data.folder, breadcrums: breadcrums, objeto: treeFactory.objeto}})
        //                        .then(function (data) {
        //                            console.log(data);
        //                            window.location = "/dashboard";
        //                        });
        //                } else {
        //                    treeFactory.newListFolder(data.folder);
        //                }
        //            } else {
        //                if ($scope.year != undefined && $scope.year != '') {
        //                    $scope.error = true;
        //                    $scope.year = '';
        //                    treeFactory.newStructure({folders: []});
        //                    treeFactory.newMsgError("No se encontraron directorios en el año " + $scope.year);
        //                }
        //            }
        //        }
        //    });

        $scope.buscarCarpeta = function () {
            treeFactory.newYear($scope.year);
            $http.post('/dashboard/folder', {year: $scope.year, session: 'listFolders_' + $scope.year})
                .then(function (response) {
                    console.log(response);
                    if (response.status == 200) {
                        response = response.data;
                        if (response.ok) {
                            $scope.error = false;
                            treeFactory.newStructure({
                                folders: response.folder
                            });
                            treeFactory.newMsgError("");
                        } else {
                            $scope.error = true;
                            treeFactory.newStructure({});
                            treeFactory.newMsgError("No se encontraron directorios en el año " + $scope.year);
                        }
                    }
                });
        }

        var iconClassMap = {
            txt: 'icon-file-text',
            jpg: 'icon-picture blue',
            png: 'icon-picture orange'
        };
        var defaultIconClass = 'icon-file';

        $scope.options = {
            mapIcon: function (file) {
                var pattern = /\.(\w+)$/;
                var match = pattern.exec(file.name);
                var ext = match && match[1];

                return iconClassMap[ext] || defaultIconClass;
            },
            onNodeSelect: function (node, breadcrums) {
                treeFactory.newBreadcrumbs(breadcrums);
                $http.post('/dashboard/show_folder', {name: node.name, root: node.root, year: $scope.year})
                    .success(function (data) {
                        var absUrl = $location.absUrl();

                        if (!absUrl.endsWith("/dashboard")) {
                            //    $http.post('/dashboard/saveSession', {session: 'listFolders_' + $scope.year, data: {folder: data.folder, breadcrums: breadcrums, objeto: treeFactory.objeto}})
                            //        .then(function (data) {
                            //            console.log(data);
                            window.location = "/dashboard";
                            //        });
                        } else {
                            treeFactory.newListFolder(data.folder);
                        }
                    });
            }
        }
    }])


    // Search controller
    .controller('searchController', ['$scope', '$http', function ($scope, $http) {
        $scope.keyword = null;

        $scope.change = function (text) {
            $scope.keyword = text;

            //$http.get('dashboard/fastSearch/' + keyword).then(function (result) {
            //    $scope.entries = result.data;
            //});
        }
    }])

    // Signin controller
    .controller('signInController', ['$scope', '$http', function ($scope, $http) {
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
                        window.location = "/dashboard";
                        finish.stop();
                    } else {
                        window.location = "/"
                    }
                });
        }
    }])

    // New User controller
    .controller('userFormController', ['$scope', '$http', function ($scope, $http) {

        $scope.loginFormSubmit = function () {
            return false;
        };
    }])

    // Profile controller
    .controller('profileController', ['$scope', '$http', function ($scope, $http) {

    }])
