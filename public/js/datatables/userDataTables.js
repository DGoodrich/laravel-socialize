var button_1_text = 'Ban selected Users';
var button_2_text = 'Banned Users';
var button_url = 'banned-users';

if($("input[name='page']").val() == 'banned-users') {
    button_1_text = 'Un-ban selected Users';
    button_2_text = 'Users';
    button_url = 'users';
}

$('.data-table').DataTable({
    "order": [[ 0, "asc" ]],
    responsive: true,
    dom: 'Bfrtip',
    lengthMenu: [
        [ 10, 25, 50, 100, -1 ],
        [ '10 rows', '25 rows', '50 rows', '100 rows', 'Show all' ]
    ],
    buttons: [
        'pageLength',
        {
            text: button_1_text,
            className: 'red',
            action: function () {
                document.getElementById("user_form").submit();
            }
        },
        {
            text: button_2_text,
            className: 'orange',
            action: function () {
                window.document.location = button_url;
            }
        }
    ]
});