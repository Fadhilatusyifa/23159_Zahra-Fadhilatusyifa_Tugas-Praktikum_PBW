// Fungsi untuk mencetak deret Fibonacci
function fibonacci(n) {
    // inisialisasi array dengan dua bilangan pertama fibonacci
    let fib = [0, 1];

    // menghitung bilangan fibonacci berikutnya hingga mencapai jumlah yang diinginkan
    for (let i = 2; i < n; i++) {
        fib[i] = fib[i - 1] + fib[i - 2]; // menjumlahkan dua bilangan sebelumnya
    }
    return fib; // mengembalikan deret fibonacci dalam bentuk array
}

// Contoh penggunaan: mencetak 15 bilangan Fibonacci pertama
let n = 15;
console.log(`\nDeret Fibonacci hingga ${n} bilangan:`);
console.log("===========================================================");
console.log(fibonacci(n).join(", ")); // menampilkan deret fibonacci
console.log("===========================================================\n");

