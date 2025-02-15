function getData() {
    fetch('../login/login.php')
        .then(response => response.json())
        .then(data => {
            console.log(data); // Olingan malumotni konsolgacha chiqarish
            // Qolgan ishlarni bajarish mumkin
        })
        .catch(error => console.error('Xatolik: ', error));
}

// Malumotlarni olish uchun tugma
var button = document.createElement("button");
button.innerHTML = "Malumotni olish";
button.onclick = getData;

// Saifaga tugmani qo'shish
document.body.appendChild(button);