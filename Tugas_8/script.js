// Mengambil elemen form dengan class 'ticket-form'
const form = document.querySelector('.ticket-form');

// Mengambil elemen notifikasi (popup atau pesan konfirmasi)
const notifikasi = document.getElementById('notifikasi');

// Mengambil elemen tombol "OK" yang ada di dalam notifikasi
const okButton = document.getElementById('okButton');

// Saat Form di submit akan menampilkan notifikasi konfirmasi
// dan mencegah form untuk langsung terkirim
form.addEventListener('submit', function(e) {
    e.preventDefault(); 
     notifikasi.style.display = 'block'; 
});

// Saat tombol "OK" di klik, sembunyikan notifikasi dan Mengirim form secara manual
// setelah menekan tombol "OK".
okButton.addEventListener('click', function() {
    notifikasi.style.display = 'none'; 
    form.submit(); 
})