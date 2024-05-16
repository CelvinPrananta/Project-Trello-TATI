document.addEventListener("DOMContentLoaded", function() {
    const targetKolom = document.getElementById("kolom-trello");
    const aksiKolom = document.querySelector(".aksi-kolom");

    targetKolom.addEventListener("mouseenter", function() {
    aksiKolom.style.display = "flex";
    });

    targetKolom.addEventListener("mouseleave", function() {
    aksiKolom.style.display = "none";
    });
});

document.addEventListener("DOMContentLoaded", function() {
    const targetKolom = document.getElementById("kolom-trello");
    const aksiKolom = document.querySelector(".aksi-kolom2");

    targetKolom.addEventListener("mouseenter", function() {
    aksiKolom.style.display = "flex";
    });

    targetKolom.addEventListener("mouseleave", function() {
    aksiKolom.style.display = "none";
    });
});

document.addEventListener("DOMContentLoaded", function() {
    const targetCard = document.getElementById("card-trello");
    const aksiCard = document.querySelector(".aksi-card");

    targetCard.addEventListener("mouseenter", function() {
    aksiCard.style.display = "flex";
    });

    targetCard.addEventListener("mouseleave", function() {
    aksiCard.style.display = "none";
    });
});

function openAdd(id){
    const cardTrello = document.getElementById(`cardTrello${id}`);

    let style = cardTrello.getAttribute("class")
    
    if (style.includes('hidden')) {
        cardTrello.classList.remove("hidden");
    } else {
        cardTrello.classList.add("hidden");
    }
}