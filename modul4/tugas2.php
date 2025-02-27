<?php
// 1. Buat 1 parent class yang berisikan 2 method
class film{
    function review_jelek(){
        echo "Film ini sangat jelek" . PHP_EOL;
    }

    function review_bagus(){
        echo "film ini sangat bagus" . PHP_EOL;
    }
}

// 2. Buat 1 abstract class yang berisikan 2 abstract method.
abstract class movie_abstrak {
    abstract function judul_film($name);
    abstract function kategori_film($name);
}

// 3. Buat 1 child class yang mengextend abstract class yang telah dibuat.

class rekomen extends movie_abstrak{
    public function judul_film($name): void{
        echo "Judul film ini : " . $name . PHP_EOL;
    }

    public function kategori_film($name){
        echo "Kategori film ini : " . $name . PHP_EOL;
    }
}

// 4. Buat trait untuk masing-masing abstract method yang telah dibuattadi.
trait trait_movie{
    public function nama_film($name){
        echo "film ini judulnya : " . $name . PHP_EOL . "<br>";
    }

    public function kategori_film($name){
        echo "film ini berkategori : " . $name . PHP_EOL . "<br>";
    }
}

class rekomen1{
    use trait_movie;
}

class rekomen2{
    use trait_movie;
}

$class1 = new rekomen1();
$class1->nama_film("The raid");
$class1->kategori_film("Sadis");

$class2 = new rekomen2();
$class2->nama_film("srimulat");
$class2->kategori_film("Comedy");