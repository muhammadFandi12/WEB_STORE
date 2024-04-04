let openShopping = document.querySelector('.shopping');
let closeShopping = document.querySelector('.closeShopping');
let list = document.querySelector('.list');
let listCard = document.querySelector('.listCard');
let body = document.querySelector('body');
let total = document.querySelector('.total');
let notifQuant = document.querySelector(".quantity");

let menuPrice = 0; //hitung 
let totalPrice = 0;
let hitungNotif = 0;

let userLogin = [];
let listCards = [];
let sudah_ada = [];

openShopping.addEventListener('click', ()=>{
    body.classList.add('active');
})
closeShopping.addEventListener('click', ()=>{
    body.classList.remove('active');
})

// Ambil user
// ambilUser()
// function ambilUser(){
//     userLogin = [];
//     userLogin = [{nama : document.querySelector(".tampungUser").innerHTML}];
//     // userLog = userLogin.innerHTML
// } 

function addToCard(key){
    let gambar = document.getElementsByClassName("image");
    let judul = document.getElementsByClassName("title");
    let tahun = document.getElementsByClassName("year");
    let harga = document.getElementsByClassName("price");

    let tampungUser = [];
    tampungUser = document.querySelector(".tampungUser");

    let userLogin = tampungUser.innerHTML;
    let image = gambar[key].getAttribute("src"); // Mengambil nilai HTML dari elemen title
    let title = judul[key].innerHTML; // Mengambil nilai HTML dari elemen title
    let year = parseInt(tahun[key].innerHTML);  // Mengambil nilai HTML dari elemen title
    let price = parseInt(harga[key].innerHTML); // Mengambil nilai HTML dari elemen title

    listCards.push({
        user : userLogin,
        image : image,
        name : title,
        year : year,
        price : price,
        quantity : 1,
        total : 0
    });

    reloadCard();
    }
    

function reloadCard(){ 
    let image = listCards[listCards.length - 1]["image"];
    let name = listCards[listCards.length - 1]["name"];
    let year = listCards[listCards.length - 1]["year"];
    let price = listCards[listCards.length - 1]["price"];
    let quantity = listCards[listCards.length - 1]["quantity"]; 
    let indexArray = listCards.length - 1

    if(listCards != null){
        if (sudah_ada.includes(name)) {
            console.log("sudah gan");
            return;
        }
        else if (!sudah_ada.includes(name)){
            let newDiv = document.createElement('li');
            newDiv.innerHTML = `
                <div><img src="${image}"/></div>
                <div>${name}</div>
                <div>Year: ${year}</div>
                <div>Rp.${price}</div>
                <div>
                    <button class="tombolKuanti" onclick="gantiQuant('kurang',${indexArray})">-</button>
                    <div class="count${indexArray}">${quantity}</div>
                    <button class="tombolKuanti" onclick="gantiQuant('tambah',${indexArray})">+</button>
                </div>          
                `;
            listCard.appendChild(newDiv);
            sudah_ada.push(name);
            hitung()
        }
    }
}

function hitung(){
    let price = listCards[listCards.length - 1]["price"];
    let totalOrder = listCards[listCards.length -1]["total"];

    totalOrder += price;
    listCards[listCards.length -1]["total"] = totalOrder

    menuPrice = menuPrice + price;
    totalPrice = totalPrice + menuPrice;

    hitungNotif += 1;
    hitungNotif = hitungNotif 
    
    notifQuant.innerText = hitungNotif;
    total.innerText = "Rp. " + totalPrice;
    menuPrice = 0;
    
    // console.log(totalOrder);
}

function gantiQuant(param,nilai){ // yang mantep
    let totalOrder = listCards[nilai]["total"];
    let kuantitas = listCards[nilai]["quantity"];
    let tagQuant = document.querySelector('.count' + nilai);
    let tambahQuant = 1;
    let price = listCards[nilai]["price"];
    let tambah = 0;

    if (param === "tambah"){
        totalOrder += price;
        kuantitas += tambahQuant;
        tagQuant.innerText = kuantitas;

        listCards[nilai]["total"] = totalOrder;
        listCards[nilai]["quantity"] = kuantitas;
        tambah = tambah + price;
        totalPrice = totalPrice + tambah;
        // console.log(totalOrder);
        // total.innerText = totalPrice;
    }

    else if (param === "kurang"){
        totalOrder -= price;
        kuantitas -= tambahQuant;
        tagQuant.innerText = kuantitas;

        listCards[nilai]["total"] = totalOrder;
        listCards[nilai]["quantity"] = kuantitas;
        totalPrice = totalPrice - price;
        // console.log(totalOrder);
        // total.innerText = totalPrice;
    }

    if(kuantitas === 0){
        tagQuant.parentNode.parentNode.remove();
        hitungNotif -= 1;
        hitungNotif = hitungNotif 
    
        notifQuant.innerText = hitungNotif;
        delete listCards[nilai];
        delete sudah_ada[nilai];
    }

    total.innerText = "Rp. " + totalPrice;
}

// push db
function pushData() {
    const dataArray = listCards;
    // const dataLogin = userLogin;

    if(totalPrice == 0){
        alert("Pilih Menu Anda!")
        location.reload();

    }
    else if (totalPrice > 0){
        // Kirim permintaan AJAX ke server
        $.ajax({
        url: 'function/push.php',
        method: 'POST',
        data: {data: dataArray}, // Kirim data ke server dalam bentuk objek
        // dataLogin: {dataLogin: dataLogin},
        success: function(result) {
            console.log(result);
            alert("Order Reserved");
            location.reload();
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
        });
    }
    else{
        alert("Hah?");
    }
}

function userDashboard(){
    window.location.href = "status/index.php"
}