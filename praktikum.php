<?php
/* ==================================================
   BAGIAN 1: LOGIKA PHP (DARI INDEX.PHP)
================================================== */
session_start();

$host = "localhost";
$user = "root";
$pass = "";
$db   = "db_latihan";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi gagal : " . mysqli_connect_error());
}

// Buat tabel otomatis
mysqli_query($conn, "
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100),
    email VARCHAR(100),
    password VARCHAR(100),
    jk VARCHAR(20),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)");

setcookie("website", "Belajar PHP", time()+3600);

$pesan = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama     = htmlspecialchars($_POST['nama']);
    $email    = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $jk       = $_POST['jk'];

    if (!empty($nama) && !empty($email) && !empty($password)) {
        $sql = "INSERT INTO users(nama,email,password,jk) VALUES('$nama','$email','$password','$jk')";
        if (mysqli_query($conn, $sql)) {
            $pesan = "<script>alert('Data Berhasil Disimpan!');</script>";
            $_SESSION['username'] = $nama;
        } else {
            $pesan = "<script>alert('Gagal simpan data!');</script>";
        }
    }
}

$query = mysqli_query($conn, "SELECT * FROM users ORDER BY id DESC");

function salam($nama){ return "Halo, $nama"; }
function tambah($a,$b){ return $a + $b; }
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <title>Belajar HTML5</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php echo $pesan; // Menjalankan alert sukses jika ada ?>

<header>
    <h1>Belajar HTML5</h1>
    <p>Status: <?php echo "Berhasil terhubung ke database"; ?></p>
</header>

<nav>
    <a href="#">Home</a>
    <a href="#">Materi</a>
    <a href="#">Kontak</a>
</nav>

<main>

    <section class="card">
        <h1>Heading 1</h1>
        <h2>Heading 2</h2>
        <h3>Heading 3</h3>
        <p>Ini adalah <b>paragraf</b> dengan <i>format teks</i> dan <u>garis bawah</u>.</p>
        <p class="text-merah">Ini teks warna merah</p>
    </section>

    <section class="card">
        <h2>Link & Gambar</h2>
        <p>Kunjungi <a href="https://www.google.com" target="_blank">Google</a></p>
       <img src="nami.jpg" alt="Contoh Gambar" width="120">
    </section>

    <section class="card">
        <h2>Daftar</h2>
        <h3>Unordered List (UL)</h3>
        <ul>
            <li>Item 1</li>
            <li>Item 2</li>
        </ul>
        <h3>Ordered List (OL)</h3>
        <ol>
            <li>Pertama</li>
            <li>Kedua</li>
        </ol>
    </section>

    <section class="card">
        <h2>Tabel Statis</h2>
        <table>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Kelas</th>
            </tr>
            <tr>
                <td>1</td>
                <td>Fany</td>
                <td>4C</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Tara </td>
                <td>4C</td>
            </tr>
        </table>
    </section>

    <section class="card">
        <h2>Formulir Input ke Database</h2>
        <form action="" method="POST" onsubmit="return validasiForm()">
            
            <label>Nama:</label>
            <input type="text" name="nama" id="nama" required>

            <label>Email:</label>
            <input type="email" name="email" id="email" required>

            <label>Password:</label>
            <input type="password" name="password" id="password" required minlength="6">

            <label>Jenis Kelamin:</label>
            <select name="jk" required style="width:100%; padding:8px; margin-top:8px;">
                <option value="L">Laki-laki</option>
                <option value="P">Perempuan</option>
            </select>

            <label>Tanggal Lahir:</label>
            <input type="date" id="tanggal" required>

            <label>Pesan:</label>
            <textarea id="pesan" required></textarea>

            <button type="submit" style="margin-top:10px; cursor:pointer;">Simpan ke Database</button>
        </form>
    </section>

    <section class="card">
        <h2>Data Real-time dari Database</h2>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>JK</th>
            </tr>
            <?php while($row = mysqli_fetch_assoc($query)) { ?>
            <tr>
                <td><?= $row['id']; ?></td>
                <td><?= $row['nama']; ?></td>
                <td><?= $row['email']; ?></td>
                <td><?= $row['jk']; ?></td>
            </tr>
            <?php } ?>
        </table>
    </section>

</main>

<script>
function validasiForm() {
    let nama = document.getElementById("nama").value;
    let email = document.getElementById("email").value;

    if (nama.length < 3) {
        alert("Nama minimal 3 karakter!");
        return false;
    }

    if (!email.includes("@")) {
        alert("Email tidak valid!");
        return false;
    }
    return true;
}
</script>
<script src="script.js"></script>

</body>
</html>