<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "Passw0rd.1";
$dbname = "testing";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Proses update pesan
if (isset($_POST['pesan'])) {
    $pesan = $_POST['pesan'];
    $sql = "UPDATE pesan SET pesan='$pesan' WHERE id=1";
    mysqli_query($conn, $sql);
}

// Proses update tabel
if (isset($_POST['nama']) && isset($_POST['email']) && isset($_POST['password'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "INSERT INTO users (nama, email, password) VALUES ('$nama', '$email', '$password')";
    mysqli_query($conn, $sql);
}

// Query untuk mengambil data pesan
$sql = "SELECT * FROM pesan WHERE id=1";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

// Query untuk mengambil data user
$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);

// Tampilkan data dalam bentuk tabel
echo "<h1>".$row["pesan"]."</h1>";
echo "<table>";
echo "<tr><th>Nama</th><th>Email</th><th>Password</th></tr>";
while($row = mysqli_fetch_assoc($result)) {
    echo "<tr><td>".$row["nama"]."</td><td>".$row["email"]."</td><td>".$row["password"]."</td></tr>";
}
echo "</table>";

// Tutup koneksi ke database
mysqli_close($conn);
?>

<!-- Form untuk update pesan -->
<form method="POST">
    <label for="pesan">Pesan:</label>
    <input type="text" name="pesan" value="<?php echo $row['pesan']; ?>">
    <button type="submit">Update Pesan</button>
</form>

<!-- Form untuk update tabel -->
<form method="POST">
    <label for="nama">Nama:</label>
    <input type="text" name="nama">
    <label for="email">Email:</label>
    <input type="text" name="email">
    <label for="password">Password:</label>
    <input type="password" name="password">
    <button type="submit">Tambah User</button>
</form>
