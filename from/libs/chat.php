<?php
require_once 'server.php';
include"fullApi.php";
require __DIR__ . '/vendor/autoload.php';

use Ratchet\Client\WebSocket;
use Ratchet\RFC6455\Messaging\Frame;

$loop = \React\EventLoop\Factory::create();
$connector = new \Ratchet\Client\Connector($loop);


$connector('ws://localhost:8080')->then(function (WebSocket $send) {
    echo "Connected to WebSocket server\n";

    $send->on('message', function (Frame $frame) use ($send) {
        echo "Received message: {$frame->getPayload()}\n";
        // Lakukan proses untuk menampilkan pesan pada aplikasi
 if ($method == 'GET') {
        
        
            $stmt = $data->getAllData();
    $num = $stmt->rowCount();
    if ($num > 0) {
      $response["data"] = array();
      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $data = array(
          "id" => $id,
          "nama" => $name,
          "email" => $email,
          "password" => $password,
          "reset_token" => $reset_token,
          "reset_at" => $reset_at
        );
        array_push($response["data"], $data);
      }
      $response["status"] = 1;
      $response["message"] = "Data berhasil ditemukan.";
    } else {
      $response["status"] = 0;
      $response["message"] = "Data tidak ditemukan.";
   
}
}

    });

    // Lakukan proses untuk mengirim pesan ke WebSocket
    // Contoh:
    // $conn->send('Hello, WebSocket!');

}, function (\Exception $e) use ($loop) {
    echo "Could not connect to WebSocket server: {$e->getMessage()}\n";
    $loop->stop();
});

$loop->run();
?>