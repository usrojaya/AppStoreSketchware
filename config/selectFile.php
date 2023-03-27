<?php
class FileDir{
public function showFile(){
  // direktori yang akan dicari
  $dir = "/storage/emulated/0/htdocs/website-Desa/swb";
   
  // mengambil daftar semua file di dalam direktori
  $files = scandir($dir);

  // menampilkan tautan ke setiap file dengan ekstensi .swb dalam sebuah div
  foreach($files as $file) {
    // hanya menampilkan file dengan ekstensi .swb
    if(is_file($dir.'/'.$file) && pathinfo($file, PATHINFO_EXTENSION) == 'swb') {
      // Mendapatkan ukuran file
      $filesize = filesize($dir.'/'.$file);
     $filesize_kb = round($filesize / 1024, 2);
     // Konversi ke KB dan bulatkan ke 2 angka di belakang koma
      // Mendapatkan informasi tentang nama file
      $fileinfo = pathinfo($dir.'/'.$file);
      $basename = $fileinfo['basename'];
      $extension = $fileinfo['extension'];
// Mendapatkan tipe file
      $filetype = mime_content_type($dir.'/'.$file);

      // Menentukan kelas CSS yang sesuai dengan tipe file
      if(strpos($filetype, 'image/') !== false) {
        $icon_class = 'fa fa-file-image-o';
      } else if(strpos($filetype, 'audio/') !== false) {
        $icon_class = 'fa fa-file-audio-o';
      } else if(strpos($filetype, 'video/') !== false) {
        $icon_class = 'fa fa-file-video-o';
      } else {
        $icon_class = 'fa fa-file-o';
      }
     
      $_FILES['fileUpload']['name'] = $basename;
      $_FILES['fileUpload']['size'] = $filesize_kb;
      $_FILES['fileUpload']['tmp_name'] = $files;
      $_FILES['fileUpload']['type'] = $filetype;
      

   // tambahkan id checkbox ke dalam array
    
// Mendefinisikan array "cek"
  echo '<div class="grid-item-bottomsheet" style="display: flex;
   flex-direction: column;
   justify-content: center;
   align-items: center;
   margin:4px;
   width: 110px;
  box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;
  border-radius: 8px;
  ">
      <i class="'.$icon_class.'" style="margin: 8px 0px"></i>
<form action="../from/config/Control.php" method="post" enctype="multipart/form-data">

   <input type="hidden" name="title" value="'.$basename.'">
   <input type="hidden" name="size" value="'.$filesize_kb.'">
<input type="file" name="fileUpload" id="fileUpload" value="'.$basename.'" style="display: block;" onchange="document.getElementById("submit").click();">

<button style="width: 110px; height: 70px; border: none;" name="submit" type="submit" id="submit">'.$basename.' <br> ('.$filesize_kb.' KB)</button>

</form>

   </div>';

  }
  }
}
}
?>
