<?php
// Trait untuk informasi tambahan mahasiswa
trait InfoTambahan {
    public $semester;
    public $kelasWaktu;
    public $isKIPK;

    public function setInfoTambahan($semester, $kelasWaktu, $isKIPK) {
        $this->semester = $semester;
        $this->kelasWaktu = $kelasWaktu;
        $this->isKIPK = $isKIPK;
    }

    public function getInfoTambahan() {
        return "Semester: $this->semester, Kelas: $this->kelasWaktu, KIPK: " . ($this->isKIPK ? "Ya" : "Tidak");
    }
}

// Kelas Mahasiswa
class Mahasiswa {
    use InfoTambahan;

    public $nama;
    public $nim;
    public $jurusan;
    public $ips = [];
    public $ipk;
    public $status = "Aktif";

    public function __construct($nama, $nim, $jurusan, $ips) {
        $this->nama = $nama;
        $this->nim = $nim;
        $this->jurusan = $jurusan;
        $this->ips = $ips;
        $this->ipk = $this->hitungIPK();
    }

    public function cetakInfo() {
        echo "Nama: $this->nama<br>";
        echo "NIM: $this->nim<br>";
        echo "Jurusan: $this->jurusan<br>";
        echo "IPK: " . number_format($this->ipk, 2) . "<br>";
        echo "Status: $this->status<br>";
        echo $this->getInfoTambahan() . "<br>";
    }

    public function hitungIPK() {
        $total = array_sum($this->ips);
        return $total / count($this->ips);
    }

    public function setLulus() {
        $this->status = "Lulus";
    }
}

// Kelas Mahasiswa Sarjana (S1)
class MahasiswaSarjana extends Mahasiswa {
    public $judulSkripsi;
    public $tahunSelesai;

    public function __construct($nama, $nim, $jurusan, $ips, $judulSkripsi = null, $tahunSelesai = null) {
        parent::__construct($nama, $nim, $jurusan, $ips);
        $this->judulSkripsi = $judulSkripsi;
        $this->tahunSelesai = $tahunSelesai;
    }

    public function cetakInfo() {
        parent::cetakInfo();
        if ($this->judulSkripsi) {
            echo "Judul Skripsi: $this->judulSkripsi<br>";
            echo "Tahun Penyelesaian: $this->tahunSelesai<br>";
        }
    }
}

// Kelas Jurusan
class Jurusan {
    public $namaJurusan;
    public $daftarMahasiswa = [];

    public function __construct($namaJurusan) {
        $this->namaJurusan = $namaJurusan;
    }

    public function tambahMahasiswa(Mahasiswa $mhs) {
        $this->daftarMahasiswa[] = $mhs;
    }

    public function cetakDaftarMahasiswa($filter = null) {
        echo "Daftar Mahasiswa di Jurusan $this->namaJurusan:<br>";
        foreach ($this->daftarMahasiswa as $mahasiswa) {
            if ($filter === null || $filter($mahasiswa)) {
                $mahasiswa->cetakInfo();
                echo "<br>";
            }
        }
    }
}

// Kelas Kampus
class Kampus {
    public $namaKampus;
    public $daftarJurusan = [];

    public function __construct($namaKampus) {
        $this->namaKampus = $namaKampus;
    }

    public function tambahJurusan(Jurusan $jurusan) {
        $this->daftarJurusan[] = $jurusan;
    }

    public function cetakInfoKampus() {
        echo "Informasi Kampus: $this->namaKampus<br>";
        echo "Jurusan yang tersedia:<br>";
        foreach ($this->daftarJurusan as $jurusan) {
            echo "- " . $jurusan->namaJurusan . "<br>";
        }
    }

    public function cetakSemuaMahasiswa() {
        echo "Daftar Seluruh Mahasiswa $this->namaKampus:<br>";
        foreach ($this->daftarJurusan as $jurusan) {
            $jurusan->cetakDaftarMahasiswa();
            echo "<br>";
        }
    }
}

// Inisialisasi Kampus
$kampusARZY = new Kampus("Institut ARZY");

// Inisialisasi Jurusan
$jurusanInformatika = new Jurusan("Teknik Informatika");
$jurusanSI = new Jurusan("Sistem Informasi");
$jurusanKA = new Jurusan("Komputerisasi Akuntansi");

// Menambahkan Jurusan ke Kampus
$kampusARZY->tambahJurusan($jurusanInformatika);
$kampusARZY->tambahJurusan($jurusanSI);
$kampusARZY->tambahJurusan($jurusanKA);

// Menambahkan mahasiswa ke masing-masing jurusan
$mhs1 = new MahasiswaSarjana("Kevin Manunggal", "TI001", "Teknik Informatika", [3.5, 3.6, 3.7, 3.8]);
$mhs1->setInfoTambahan(6, "Pagi", true);
$jurusanInformatika->tambahMahasiswa($mhs1);

$mhs2 = new MahasiswaSarjana("Lina Wijaya", "SI001", "Sistem Informasi", [3.6, 3.7, 3.8, 3.9], "Analisis Sistem Informasi Manajemen", 2023);
$mhs2->setInfoTambahan(8, "Malam", false);
$mhs2->setLulus();
$jurusanSI->tambahMahasiswa($mhs2);

$mhs3 = new MahasiswaSarjana("Budi Santoso", "KA001", "Komputerisasi Akuntansi", [3.4, 3.5, 3.6, 3.7]);
$mhs3->setInfoTambahan(4, "Pagi", true);
$jurusanKA->tambahMahasiswa($mhs3);

// Contoh penggunaan
echo "Informasi Kampus:<br>";
$kampusARZY->cetakInfoKampus();

echo "<br>Semua Mahasiswa di Institut ARZY:<br>";
$kampusARZY->cetakSemuaMahasiswa();

echo "<br>Mahasiswa Teknik Informatika:<br>";
$jurusanInformatika->cetakDaftarMahasiswa();

echo "<br>Mahasiswa yang Sudah Lulus:<br>";
$kampusARZY->cetakSemuaMahasiswa(function($mhs) {
    return $mhs->status === "Lulus";
});

echo "<br>Mahasiswa KIPK:<br>";
$kampusARZY->cetakSemuaMahasiswa(function($mhs) {
    return $mhs->isKIPK;
});

echo "<br>Mahasiswa Kelas Malam:<br>";
$kampusARZY->cetakSemuaMahasiswa(function($mhs) {
    return $mhs->kelasWaktu === "Malam";
});
?>