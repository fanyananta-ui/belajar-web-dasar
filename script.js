// ===============================
// JAVASCRIPT SESUAI MATERI
// ===============================

// OUTPUT DASAR
console.log("JavaScript berhasil dijalankan!");
alert("Selamat datang di halaman Belajar HTML5");

// ===============================
// VARIABEL & TIPE DATA
// ===============================
let nama = "Fany";          // bisa berubah
const umur = 20;            // tetap

let teks = "Hello";         // String
let angka = 10;             // Number
let aktif = true;           // Boolean
let kosong = null;
let belum;

let mahasiswa = {
    nama: "Fany",
    umur: 20
};

let nilai = [80, 90, 100];

console.log(mahasiswa);
console.log(nilai);

// ===============================
// FUNCTION BIASA
// ===============================
function sapa(nama) {
    return "Halo " + nama;
}

console.log(sapa("Fany"));

// ===============================
// ARROW FUNCTION
// ===============================
const tambah = (a, b) => {
    return a + b;
};

console.log("Hasil tambah: " + tambah(5, 3));

// ===============================
// PERCABANGAN IF ELSE
// ===============================
let hasil = 80;

if (hasil >= 75) {
    console.log("Lulus");
} else {
    console.log("Tidak Lulus");
}

// ===============================
// PERULANGAN LOOP
// ===============================
for (let i = 1; i <= 5; i++) {
    console.log("Perulangan ke-" + i);
}

// ===============================
// DOM MANIPULATION
// ===============================

// Mengubah teks heading
const judul = document.querySelector("h1");
judul.innerHTML = "Belajar HTML5 + JavaScript";

// Mengubah warna teks
judul.style.color = "yellow";

// ===============================
// INLINE EVENT
// ===============================
function klikSaya() {
    alert("Halo! Ini adalah Inline JavaScript");
}

// ===============================
// VALIDASI FORM
// ===============================
function validasiForm() {

    let nama = document.getElementById("nama").value;
    let email = document.getElementById("email").value;
    let tanggal = document.getElementById("tanggal").value;

    if (nama == "") {
        alert("Nama wajib diisi!");
        return false;
    }

    if (email == "") {
        alert("Email wajib diisi!");
        return false;
    }

    if (!email.includes("@")) {
        alert("Format email tidak valid!");
        return false;
    }

    if (tanggal == "") {
        alert("Tanggal wajib dipilih!");
        return false;
    }

    alert("Data berhasil dikirim!");
    return true;
}