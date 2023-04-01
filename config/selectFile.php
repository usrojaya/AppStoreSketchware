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
      $dataFileUpload = $dir.'/'.$file;
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
 
// Mendefinisikan array "cek"
 // echo '<div class="grid-item-bottomsheet" style="display: flex;
  //flex-direction: column;
  // justify-content: center;
 //  align-items: center;
  // margin:4px;
  // width: 110px;
 // box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;
 //border-radius: 8px;
//  ">
      //<i class="'.$icon_class.'" style="margin: 8px 0px"></i>


  // </div>';
  }
  }
}
}
?>
