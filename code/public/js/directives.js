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

// ListFolders directive
gestorDocumental.directive('showFolders', ['rootFactory', function (rootFactory) {
    return {
        scope: {
            ngModel: '='
        },
        link: function (scope, element, attr) {
            scope.root = rootFactory.raiz;
        },
        template: '<a href="{{ root }}/dashboard/folder/{{ ngModel.root }} ">{{ ngModel.name }}</a>'
    }
}]);
