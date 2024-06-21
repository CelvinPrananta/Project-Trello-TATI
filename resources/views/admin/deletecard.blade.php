<script>
    $(document).ready(function () {
        const id = '{{ $isianKartu->id }}';
        $('#deleteCardForm'+id).on('submit', function(e){
            e.preventDefault();
            var form = $(this);
            var url = form.attr('action');
            var cardId = form.data('id');
            
            $.ajax({
                type: 'POST',
                url: url,
                data: form.serialize(),
                success: function (response) {
                    $('#isianKartu' + id).modal('hide');
                    $('li[data-id="' + cardId + '"]').addClass('hidden');
                    toastr.success('Anda berhasil menghapus kartu!');
                    console.log('a');
                },
                error: function(response) {
                    toastr.error('Anda gagal menghapus kartu!');
                }
            });
        });
    });
</script>