// Khusus ketika klik button +Tambah Kartu //
function openAdd(id){
    const cardTrello = document.getElementById(`cardTrello${id}`);

    let style = cardTrello.getAttribute("class")
    
    if (style.includes('hidden')) {
        cardTrello.classList.remove("hidden");
    } else {
        cardTrello.classList.add("hidden");
    }
}
// /Khusus ketika klik button +Tambah Kartu //

// Khusus untuk menghilangkan dan memunculkan edit & delete beserta menghilangkan text yang ada di +Tambah Kartu //
function hideAdd() {
    const targetCard = document.querySelectorAll(".card-trello");
    targetCard.forEach(element => {
        element.classList.add("hidden");
    });
}
function aksiKolomShow(id){
    const aksiKolom = document.getElementById(`aksi-kolom${id}`);
    const aksiKolom2 = document.getElementById(`aksi-kolom2${id}`);
    aksiKolom.classList.add("flex");
    aksiKolom2.classList.add("flex");
}
function aksiKolomHide(id){
    const aksiKolom = document.getElementById(`aksi-kolom${id}`);
    const aksiKolom2 = document.getElementById(`aksi-kolom2${id}`);
    aksiKolom.classList.remove("flex");
    aksiKolom2.classList.remove("flex");
    aksiKolom.classList.add("hidden");
    aksiKolom2.classList.add("hidden");
    hideAdd()
}
// /Khusus untuk menghilangkan dan memunculkan edit & delete beserta menghilangkan text yang ada di +Tambah Kartu //

// Khusus untuk menghilangkan dan memunculkan edit kartu //
function hideKartu() {
    const targetKartu = document.querySelectorAll(".aksi-card");
    targetKartu.forEach(element => {
        element.classList.add("hidden");
    });
}
function aksiKartuShow(id){
    const aksiKartu = document.getElementById(`aksi-card${id}`);
    aksiKartu.classList.add("flex");
}
function aksiKartuHide(id){
    const aksiKartu = document.getElementById(`aksi-card${id}`);
    aksiKartu.classList.remove("flex");
    aksiKartu.classList.add("hidden");
    hideKartu()
}
// /Khusus untuk menghilangkan dan memunculkan edit kartu //

// Untuk menyembunyikan dan melihat activity //
function showActivity() {
    var activityDiv = document.getElementById('showActivity');
    var icon = document.getElementById('showActivityIcon');

    if (icon.classList.contains('fa-eye')) {
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
    } else {
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
    }

    if (activityDiv.classList.contains('hiddens')) {
        activityDiv.classList.remove('hiddens');
    } else {
        activityDiv.classList.add('hiddens');
    }
}
// /Untuk menyembunyikan dan melihat activity //

// Untuk menyembunyikan dan melihat simpan komentar //
function saveComment() {
    var komentarTextarea = document.getElementById('komentar');
    var simpanButton = document.getElementById('simpanButton');

    komentarTextarea.addEventListener('input', function () {
        if (komentarTextarea.value.trim() !== "") {
            simpanButton.classList.remove('hidden');
        } else {
            simpanButton.classList.add('hidden');
        }
    });
}
// /Untuk menyembunyikan dan melihat simpan komentar //