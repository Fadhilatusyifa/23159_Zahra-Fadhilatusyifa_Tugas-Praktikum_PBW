<?php

class Book {
    // Properti dibuat private agar hanya bisa diakses lewat method class ini
    private $code_book;
    private $name;
    private $qty;

    // Constructor memanggil setter (setter qty dan code_book private)
    public function __construct($code_book, $name, $qty) {
        $this->setCodeBook($code_book); // panggil method untuk set kode buku 
        $this->name = $name;            // langsung menyimpan nama buku         
        $this->setQty($qty);            // panggil method untuk set jumlah buku 
    }

    // Getter untuk mengambil nilai code_book
    public function getCodeBook() {
        return $this->code_book;
    }

   
    // Getter untuk mengambil nilai name (judul buku)
    public function getName() {
        return $this->name;
    }

    // Getter untuk mengambil nilai qty
    public function getQty() {
        return $this->qty;
    }

    // Setter private untuk code_book
    private function setCodeBook($code_book) {
        // pengecekan kode buku harus 2 huruf besar + 2 angka (misal BB00)
        if (preg_match("/^[A-Z]{2}[0-9]{2}$/", $code_book)) {
            $this->code_book = $code_book;  // kalau valid, simpan 
        } else {
            echo "Error: Format code_book tidak valid. Harus berupa 2 huruf besar diikuti 2 angka (contoh: BB00).\n";
        }
    }

    // Setter private untuk qty
    private function setQty($qty) {
        // pengecekan qty harus bilangan bulat dan lebih dari 0
        if (is_int($qty) && $qty > 0) {
            $this->qty = $qty; // kalau valid, simpan
        } else {
            echo "Error: qty harus berupa integer positif dan lebih dari 0.\n";
        }
    }
}

// objek buku dengan input yang valid
$book1 = new Book("BB00", "Belajar PHP", 5);
echo "Kode Buku  : " . $book1->getCodeBook() . "\n";
echo "Judul Buku : " . $book1->getName() . "\n";
echo "Jumlah     : " . $book1->getQty() . "\n";
echo "===============================================================================================\n";

// objek dengan input tidak valid, akan muncul pesan error
$book2 = new Book("bb99", "Pemrograman", -3);
