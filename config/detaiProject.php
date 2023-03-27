<?php
// Import class Connect
require_once "Connect.php";
class Project {
  private $conn;
  public function __construct() {
    // Instantiate class Connect
    $connection = new Connect();
    // Get database connection
    $this->conn = $connection->getConnection();
  }
public function showProject($category){
  $query_cek = "SELECT * FROM projects WHERE kategori = :category";
  $stm = $this->conn->prepare($query_cek);
  $stm->bindParam(':category', $category);
  $stm->execute();
  $cek = $stm->fetchAll();
  
  // Menghitung jumlah kolom
  $num_cols = ceil(count($cek));
  
  
   // Membuat perulangan untuk membuat kartu
    foreach ($cek as $data){
    //memotong text
  $title = $data['title'];
  $description = $data['description'];
  
  // Batasi panjang title dan description menjadi 20 karakter
  $title = (strlen($title) > 1) ? substr($title, 0, 8).'...' : $title;
  $description = (strlen($description) > 1) ? substr($description, 0, 10).'...' : $description;
    
        echo "<div class='box'>";
        echo "<img src='img/".$data['img']."'>";
        echo "<div class='title'>";
        echo "<b>".$title."</b>";
        echo "<a>".$description."</a>";
        echo "</div>";

        echo "<div class='footer-card'>";
        echo "<div class='size'>";
        echo "<i class='fa fa-file'></i>";
    echo "<span><b>Size : </b>". $data['size'] ."</span>";
        echo "</div>";

        echo " <div class='size'>";
        echo " <i class='fa fa-download'></i>";
        echo " <span class='download'>Download</span>";
        echo " </div> </div>";
        echo "</div>";
      }
}

 public function showNewProjects(){
  $query = "SELECT * FROM projects ORDER BY created_at DESC";
  $stm = $this->conn->prepare($query);
  $stm->execute();
  $newProjects = $stm->fetchAll();
  return $newProjects;
}

public function displayProjects(){
  $newProjects = $this->showNewProjects();
foreach($newProjects as $project){
  $title = $project['title'];
  $description = $project['description'];
  
  // Batasi panjang title dan description menjadi 20 karakter
  $title = (strlen($title) > 1) ? substr($title, 0, 8).'...' : $title;
  $description = (strlen($description) > 1) ? substr($description, 0, 10).'...' : $description;
    
        echo "<div class='box'>";
        echo "<img src='img/".$project['img']."'>";
        echo "<div class='title'>";
        echo "<b>".$title."</b>";
        echo "<a>".$description."</a>";
        echo "</div>";

        echo "<div class='footer-card'>";
        echo "<div class='size'>";
        echo "<i class='fa fa-file'></i>";
    echo "<span><b>Size : </b>". $project['size'] ."</span>";
        echo "</div>";

        echo " <div class='size'>";
        echo " <i class='fa fa-download'></i>";
        echo " <span class='download'>Download</span>";
        echo " </div> </div>";
        echo "</div>";
}
} 
}
?>