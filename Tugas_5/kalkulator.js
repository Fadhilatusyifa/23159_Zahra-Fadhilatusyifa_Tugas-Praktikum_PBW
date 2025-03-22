// membuat fungsi kalkulator dengan parameter operator dan angka
const Kalkulator = (operator, ...angka) => {
    switch (operator) {
        // operasi penjumlahan
        // jika operator adalah 'tambah', jumlahkan semua angka
        case 'tambah':
            return angka.reduce((a, b) => a + b, 0);   
        
        // operasi pengurangan
        // jika operator adalah 'kurang', kurangkan angka secara berurutan
        case 'kurang':
            return angka.reduce((a, b) => a - b);       
        
        // operasi perkalian 
        // jika operator adalah 'kali', kalikan semua angka
        case 'kali':
            return angka.reduce((a, b) => a * b, 1);    
        
        // operasi pembagian 
        // jika operator adalah 'bagi', bagi angka secara berurutan
        case 'bagi':
            return angka.reduce((a, b) => a / b);       
        
        // operasi modulo 
        // jika operator adalah 'modulo', hitung sisa hasil bagi secara berurutan
        case 'modulo':
            return angka.reduce((a, b) => a % b);       

        // jika operator tidak dikenali, mengembalikan pesan "Operator Tidak Valid"
        default:
            return "Operator Tidak Valid";
    }
};

// menampilkan header kalkulator
console.log("============================================");
console.log("            KALKULATOR SEDERHANA           ");
console.log("============================================");
 
// menampilkan hasil operasi dengan memanggil metode dari objek kalkulator
console.log(" hasil Penjumlahan : ", Kalkulator("tambah", 15, 1, 4));   // 15 + 1 + 4  = 20
console.log(" hasil Pengurangan : ", Kalkulator("kurang", 30,8, 7));    // 30 - 8 - 7  = 15
console.log(" hasil Perkalian   : ", Kalkulator("kali", 7, 3, 10));     // 7 * 3 * 10  = 210
console.log(" hasil Pembagian   : ", Kalkulator("bagi", 10, 10, 5));    // 10 / 10 / 5 = 0.2
console.log(" hasil Modulo      : ", Kalkulator("modulo", 100, 8, 9));  // 100 % 8 % 9 = 4
console.log(" hasil Pangkat     : ", Kalkulator("pangkat", 3, 3));      // "Operator tidak valid", karena operasi pangkat belum didefinisikan

// menampilkan footer kalkulator
console.log("============================================");
