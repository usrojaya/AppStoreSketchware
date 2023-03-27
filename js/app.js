
		// add an event listener to the input element to reset its height when the Enter key is pressed

const overlay = document.querySelector(".overlay-nav");

function openNav() {
  document.getElementById("mySidenav").style.width = "280px";
  overlay.style.display="block";
}

/* Set the width of the side navigation to 0 */
function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
overlay.style.display="none";
    
}
overlay.addEventListener("click", () =>{
    closeNav();
});

// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";

}
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
    closeNav();
  }
}
function login(){
 if(getCookie('user')){
   window.location.replace('../from/config/Control.php?isLogin');
 }else{
   window.location.replace('../from/intro.html');
 }
}

let nameUser = document.getElementById('nameUser');

// Ambil nilai cookie dengan nama "nama_user"
let namaUserCookie = getCookie('user');

// Tampilkan nilai cookie di dalam elemen HTML
nameUser.innerHTML = namaUserCookie;

// Fungsi untuk mengambil nilai cookie
function getCookie(cookieName) {
  // Split semua cookie yang ada menjadi array
  let cookies = document.cookie.split(';');
  // Loop melalui semua cookie untuk mencari cookie dengan nama yang sesuai
  for (let i = 0; i < cookies.length; i++) {
    let cookie = cookies[i].trim();
    // Jika cookie ditemukan, ambil nilainya dan return
    if (cookie.startsWith(cookieName + '=')) {
      return cookie.substring(cookieName.length + 1);
    }
  }
  // Jika cookie tidak ditemukan, return string kosong
  return '';
}
