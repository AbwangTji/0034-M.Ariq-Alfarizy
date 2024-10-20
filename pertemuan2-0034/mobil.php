<?php
// Kelas Induk Mobil
class Mobil {
    protected $nama;
    protected $merk;

    public function __construct($nama, $merk) {
        $this->nama = $nama;
        $this->merk = $merk;
    }

    public function cetakInfo() {
        echo "Nama Mobil: " . $this->nama . "<br>";
        echo "Merk Mobil: " . $this->merk . "<br>";
    }
}

// Kelas MobilSport
class MobilSport extends Mobil {
    private $speed;
    private $turbo;

    public function __construct($nama, $merk, $speed, $turbo) {
        parent::__construct($nama, $merk);
        $this->speed = $speed;
        $this->turbo = $turbo;
    }

    public function cetakInfo() {
        parent::cetakInfo();
        echo "Kecepatan: " . $this->speed . " km/h<br>";
        echo "Turbo: " . ($this->turbo ? 'Ya' : 'Tidak') . "<br>";
    }
}

// Kelas CityCar
class CityCar extends Mobil {
    private $model;
    private $irit;
    private $sensor;

    public function __construct($nama, $merk, $model, $irit, $sensor) {
        parent::__construct($nama, $merk);
        $this->model = $model;
        $this->irit = $irit;
        $this->sensor = $sensor;
    }

    public function cetakInfo() {
        parent::cetakInfo();
        echo "Model: " . $this->model . "<br>";
        echo "Efisiensi Bahan Bakar: " . $this->irit . "<br>";
        echo "Sensor: " . $this->sensor . "<br>";
    }
}

// Contoh penggunaan
echo "<h2>Mobil Sport:</h2>";
$mobilSport = new MobilSport("Regera", "Koeniggseg", 350, true);
$mobilSport->cetakInfo();

echo "<h2>City Car:</h2>";
$cityCar = new CityCar("M3", "BMW", "2023", "20 km/l", "Parkir Otomatis");
$cityCar->cetakInfo();
?>
