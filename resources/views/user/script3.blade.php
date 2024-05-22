<script>
    $(document).ready(function(){
       // Form delete Checklist
       const checklist_id = '{{$checklists->id}}'
        $('#myFormChecklistDelete'+checklist_id).on('submit', function(event){
            event.preventDefault();
            var formData = $(this).serialize();
            console.log(checklist_id);
            $.ajax({
                type: 'POST',
                url: "{{ route('hapusChecklist2') }}",
                data: formData,
                success: function(response){
                    console.log(response);
                    location.reload();
                    localStorage.setItem('modal_id', response.card_id);
                    toastr.success('Anda berhasil menghapus checklist!');

                    // Show modal after create title
                    var modal_id = localStorage.getItem('modal_id');
                    $('#isianKartu'+modal_id).modal('show');
                    $('#isianKartu'+id).on('click', function(){
                        localStorage.clear();
                    });
                },
                error: function(){
                    alert('An error occurred. Please try again.');
                }
            });
        });
        // End Section Checklist
    });
</script>