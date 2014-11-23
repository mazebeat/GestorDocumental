// TreeView Service
gestorDocumental.factory('treeFactory', function () {
    var service = {
        objeto: {
            structure: {
                folders: [
                    {name: 'Mes1', root: 'a_2014**m_04**c_1111'},
                    {name: 'Mes2', root: 'a_2014**m_04**c_1111'},
                    {name: 'Mes3', root: 'a_2014**m_04**c_1111'}
                ]
            },
            listFolder: [
                {name: 'Carpeta1', root: '2014121111'},
                {name: 'Carpeta2', root: '20150'},
                {name: 'Carpeta3', root: '201604222145'}
            ],
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
