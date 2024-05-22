<!-- Methods Ke-1 tanpa menggunakan localStorage setInterval -->
{{-- <script>
    $(document).ready(function() {
        $('.progress').each(function() {
            var checklistId = $(this).data('checklist-id');
            updateProgressBar(checklistId);
        });
    });
    
    function updateProgressBar(checklistId) {
        $.ajax({
            url: '/user/tim/checklist/perbaharui/' + checklistId,
            method: 'GET',
            success: function(data) {
                var percentage = data.percentage;
                var progressBar = $('.progress-bar-' + checklistId);
                progressBar.css('width', percentage + '%');
                progressBar.attr('aria-valuenow', percentage);
                progressBar.text(Math.round(percentage) + '%');
                progressBar.removeClass('bg-danger bg-warning bg-info bg-success');
                if (percentage <= 25) {
                    progressBar.addClass('bg-danger');
                } else if (percentage > 25 && percentage < 50) {
                    progressBar.addClass('bg-warning');
                } else if (percentage >= 50 && percentage <= 75) {
                    progressBar.addClass('bg-info');
                } else if (percentage > 75) {
                    progressBar.addClass('bg-success');
                }
            }
        });
    }
</script> --}}
<!-- /Methods Ke-1 tanpa menggunakan localStorage setInterval -->

<!-- Methods ke-2 menggunakan localStorage setInterval -->
<script>
    function updateProgressBar2(checklistId) {
        $.ajax({
            url: '/user/tim/checklist/perbaharui/' + checklistId,
            method: 'GET',
            success: function(data) {
                var percentage = data.percentage;
                var progressBar = $('.progress-bar-' + checklistId);
                progressBar.css('width', percentage + '%');
                progressBar.attr('aria-valuenow', percentage);
                progressBar.text(Math.round(percentage) + '%');
                progressBar.removeClass('bg-danger bg-warning bg-info bg-success');
                if (percentage <= 25) {
                    progressBar.addClass('bg-danger');
                } else if (percentage > 25 && percentage < 50) {
                    progressBar.addClass('bg-warning');
                } else if (percentage >= 50 && percentage <= 75) {
                    progressBar.addClass('bg-info');
                } else if (percentage > 75) {
                    progressBar.addClass('bg-success');
                }

                // Simpan nilai persentase ke localStorage
                localStorage.setItem('progress_' + checklistId, percentage);
            }
        });
    }

    // Fungsi untuk memperbarui progress bar setiap detik
    function updateProgressBars2() {
        $('.progress2').each(function() {
            var checklistId = $(this).data('checklist-id');
            updateProgressBar(checklistId);
        });
    }

    $(document).ready(function() {
        // Memperbarui progress bar saat halaman dimuat
        updateProgressBars2();

        // Memperbarui progress bar setiap detik
        setInterval(updateProgressBars2, 1000);
    });
</script>
<!-- /Methods ke-2 menggunakan localStorage setInterval -->