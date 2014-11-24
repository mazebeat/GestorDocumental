// TreeView Service
gestorDocumental.factory('treeFactory', function () {
    var service = {
        objeto: {
            structure: {},
            listFolder: [],
            breadcrums: [],
            messageError: '',
            year: ''
        },
        newStructure: function (stc) {
            service.objeto.structure = stc;
        },
        newListFolder: function (list) {
            service.objeto.listFolder = list;
        },
        newBreadcrumbs: function (bc) {
            service.objeto.breadcrums = bc;
        },
        newMsgError: function (msg) {
            service.objeto.messageError = msg;
        },
        newYear: function (y) {
            service.objeto.year = y;
        }
    };

    return service;
});
