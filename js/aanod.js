$(document).ready( function () {

    // OPTION POUR LA DATATABLE JQUERY //

    $('#datatableMerch').DataTable({
              
        "paging" : false,
        "ordering": false,
        "info": false,
    
    // CHANGEMENT DE POSITION DU "SEARCH" //

    "dom": "<'left'f>"


    });

} );