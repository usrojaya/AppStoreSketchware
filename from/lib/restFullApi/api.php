<?php

// Koneksi ke database
$db = mysqli_connect("127.0.0.1", "root", "root", "dbuser");

// Fungsi untuk menambah pesan baru
function add_message($sender_id, $receiver_id, $message) {
    global $db;
    $sql = "INSERT INTO messages (sender_id, receiver_id, message) VALUES ('$sender_id', '$receiver_id', '$message')";
    mysqli_query($db, $sql);
}

// Fungsi untuk mengambil pesan dari pengguna tertentu
function get_messages() {
    global $db;
// Koneksi ke database
// Periksa apakah koneksi berhasil
if (mysqli_connect_errno()) {
  echo "Koneksi ke database gagal: " . mysqli_connect_error();
  exit();
}

// Query untuk mengambil data dari tabel "data"
$sql = "SELECT * FROM messages";
$result = mysqli_query($db, $sql);

// Periksa apakah query berhasil dieksekusi
if (!$result) {
  echo "Query gagal dieksekusi: " . mysqli_error($con);
  exit();
}

// Inisialisasi array kosong untuk menyimpan data
$data = array();

// Looping untuk mengambil setiap baris data dari hasil query
while ($row = mysqli_fetch_assoc($result)) {
  // Tambahkan baris data ke dalam array
  $data[] = $row;
}

return $data;
// Tutup koneksi ke database
mysqli_close($db);

 

}

// Fungsi untuk menghapus pesan berdasarkan ID
function delete_message($message_id) {
    global $db;
    $sql = "DELETE FROM messages WHERE id='$message_id'";
    mysqli_query($db, $sql);
}

// Memeriksa jenis metode HTTP yang digunakan
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Menerima data JSON yang dikirimkan dari aplikasi
    $json_data = file_get_contents('php://input');
    // Mengubah data JSON menjadi array asosiatif
    $data = json_decode($json_data, true);
    // Mengambil nilai-nilai yang dibutuhkan dari data JSON
    $sender_id = $data['sender_id'];
    $receiver_id = $data['receiver_id'];
    $message = $data['message'];

    // Menambah pesan baru ke database
    add_message($sender_id, $receiver_id, $message);

    // Mengirimkan response dalam format JSON
    $response = array('status' => 'success');
    header('Content-Type: application/json');
    echo json_encode($response);
} else if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['user_id'])) {
    // Menerima parameter user_id dari URL
    $user_id = $_GET['user_id'];

    // Mengambil pesan dari pengguna tertentu
    $messages = get_messages();

    // Mengirimkan response dalam format JSON
    header('Content-Type: application/json');
    echo json_encode($messages);
} else if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['message_id'])) {
    // Menerima parameter message_id dari URL
    $message_id = $_GET['message_id'];

    // Menghapus pesan berdasarkan ID
    delete_message($message_id);

    // Mengirimkan response dalam format JSON
    $response = array('status' => 'success');
    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    // Mengirimkan response jika metode HTTP yang digunakan tidak didukung
    get_messages();
    header('HTTP/1.1 405 Method Not Allowed');
    header('Content-Type: application/json');
    $response = array('status' => 'error', 'message' => 'Metode HTTP tidak didukung');
    echo json_encode($response);
}


?>
