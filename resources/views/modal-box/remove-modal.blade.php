<!-- Modal -->
<div class="modal fade" id="removeModal" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Confirm</h4>
            </div>

            <div class="modal-body">
                <p>Are you sure you want to remove this?</p>
            </div>

            <div class="modal-footer">
                <form method="POST" action="" accept-charset="UTF-8" id="remove">
                    <input name="_method" value="DELETE" type="hidden">
                    {!! csrf_field() !!}

                    <button type="button" class="btn btn-danger btn-line btn-rect" id="confirm">Yes</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {

        var data_url = '';

        $('a[data-toggle=modal], button[data-toggle=modal], i[data-toggle=modal]').click(function () {

            if (typeof $(this).data('url') !== 'undefined') {

                data_url = $(this).data('url');

            }
        });

        <!-- Form confirm handler, submits form -->
        $('#removeModal').find('.modal-footer #confirm').on('click', function(){

            $('#remove').attr('action', data_url).submit();

        });
    });

</script>