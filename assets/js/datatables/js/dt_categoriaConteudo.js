$(document).ready(function() {
    $('#datatable-1').DataTable( {
        "order": [[ 1, "asc" ], [ 2, "asc" ]],
        "lengthMenu": [[10, 25, 50, 100, 250, 500, -1], [10, 25, 50, 100, 250, 500, "Todos"]],
        "fixedHeader": true,
        "responsive": true,
        "processing": true,
        "destroy": true,
        "fnDrawCallback": function (e) {
            var api = this.api();
            api.$('td').click(function () {
            });
        },
		"language": {
            "emptyTable": "Nenhum registro encontrado",
            "info": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            "infoEmpty": "Mostrando 0 até 0 de 0 registros",
            "infoFiltered": "(Filtrados de _MAX_ registros)",
            "infoPostFix": "",
            "infoThousands": ".",
            "lengthMenu": "Mostrar _MENU_ resultados por página",
            "loadingRecords": "Carregando...",
            "processing": "Processando...",
            "zeroRecords": "Nenhum registro encontrado",
            "search": "Pesquisar",
            "paginate": {
                "first": "<< Primeiro",
                "last": "Último",
                "next": "Próximo >",
                "previous": "< Anterior"
            },
            "oAria": {
                "sortAscending": ": Ordenar colunas de forma ascendente",
                "sortDescending": ": Ordenar colunas de forma descendente"
            }
        }
    } );
} );