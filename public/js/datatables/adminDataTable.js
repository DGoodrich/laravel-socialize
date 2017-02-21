$(document).ready(function() {
    $('.data-table').DataTable({
        "order": [[0, "asc"]],
        responsive: true,
        dom: 'Bfrtip',
        lengthMenu: [
            [10, 25, 50, 100, -1],
            ['10 rows', '25 rows', '50 rows', '100 rows', 'Show all']
        ],
        buttons: [
            'pageLength'
        ]
    });
});