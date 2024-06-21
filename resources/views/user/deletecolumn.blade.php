<script>
    $(document).ready(function() {
        $('.deleteColumnForm').on('submit', function(e) {
            e.preventDefault();
            var form = $(this);
            var columnId = form.data('column-id');
            var formData = form.serialize();
            var modal = $('#deleteColumn' + columnId);
            $.ajax({
                url: form.attr('action'),
                type: 'POST',
                data: formData,
                success: function(response) {
                    modal.modal('hide');
                    $('#kolom-card-' + columnId).addClass('hidden');
                    toastr.success('Anda berhasil menghapus kolom!');
                },
                error: function(response) {
                    toastr.success('Anda gagal menghapus kolom!');
                }
            });
        });
    });
</script>