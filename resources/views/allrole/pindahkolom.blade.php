<script>
    document.addEventListener('DOMContentLoaded', function() {
        const columnContainer = document.getElementById('cardContainer');
        const sortable = new Sortable(columnContainer, {
            animation: 150,
            onEnd: function (evt) {
                updateColumnPositions();
            },
        });
        
        [...document.getElementsByClassName('kartu-container')].forEach(e => {
            new Sortable(e, {
                animation: 150,
                onEnd: function (evt) {
                    updateCardPositions(e);
                },
            });
        });

        function updateColumnPositions() {
            const positions = {};
            const columnIds = columnContainer.children;
            for (let i = 0; i < columnIds.length; i++) {
                const column = columnIds[i];
                const id = column.dataset.id;
                positions[id] = i + 1;
            }

            fetch('{{ route("perbaharuiPosisiKolom") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ positions })
            })

            .then(response => response.json())

            .then(data => {
                if (data.success) {
                    toastr.success('Anda berhasil perbaharui posisi kolom!');
                    console.log('Posisi kolom berhasil diperbaharui!');
                } else {
                    toastr.success('Anda gagal perbaharui posisi kolom!');
                    console.error('Posisi kolom gagal diperbaharui!');
                }
            })

            .catch(error => {
                console.error('Terjadi kesalahan saat perbaharui posisi kolom:', error);
            });
            
        }

        function updateCardPositions(e) {
            const positions = {};
            const cards = e.children;
            for (let i = 0; i < cards.length; i++) {
                const card = cards[i];
                const id = card.dataset.id;
                positions[id] = i + 1;
            }

            fetch('{{ route("perbaharuiPosisiKartu") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ positions })
            })

            .then(response => response.json())

            .then(data => {
                if (data.success) {
                    toastr.success('Anda berhasil perbaharui posisi kartu!');
                    console.log('Posisi kartu berhasil diperbaharui!');
                } else {
                    toastr.success('Anda gagal perbaharui posisi kartu!');
                    console.error('Posisi kartu gagal diperbaharui!');
                }
            })

            .catch(error => {
                console.error('Terjadi kesalahan saat perbaharui posisi kartu:', error);
            });
            
        }
    });
</script>