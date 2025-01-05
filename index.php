<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kopi Kenangan Senja</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,300;1,700&display=swap" rel="stylesheet">

    <!-- Feather Icons -->
    <script src="https://unpkg.com/feather-icons"></script>

    <!-- My Style -->
    <link rel="stylesheet" href="style.css">
</head>
<title>Kopi Kenangan</title>
<body>
    <!-- Navbar Start -->
    <nav class="navbar">
        <a href="#" class="navbar-logo">kenangan <span>senja</span></a>

        <div class="navbar-nav">
            <a href="#home">Home</a>
            <a href="#about">Tentang Kami</a>
            <a href="#menu">Peserta</a>
            <a href="#contact">Kontak</a>
        </div>

        <div class="navbar-extra">
            <a href="#" id="hamburger-menu"><i data-feather="menu"></i></a>
        </div>
     </nav>
    <!-- Navbar End -->

    <!-- Hero Section Start-->
    <section class="hero" id="home">
        <main class="content">
            <h1>Mari Nikmati Secangkir <span>Kopi</span></h1>
            <p>Kami Membuat Kopi, Anda Membuat Kenangan</p>
            <p>Ayooo daftarkan diri anda</p>
            <a href="#menu" class="cta">Daftarkan Diri</a>
        </main>
     </section>

     <!-- Hero Section End -->

     <!-- About Section Start -->
      <section id="about" class="about">
       <br> <h2><span>Tentang</span> Kami</h2>
        <div class="row">
            <div class="about-img">
                <img src="tentang-kami.jpg" alt="Tentang Kami">
            </div>
            <div class="content">
                <h3>Kenapa Memilih Kopi Kami?</h3>
                <p>Kedai kami bukan hanya tentang kopi, tapi tentang menghadirkan kehangatan, momen berharga, dan tempat di mana percakapan berharga dimulai.</p>
                <p>"Setiap cangkir kopi yang kami buat bukan hanya tentang rasa yang sempurna, tetapi juga tentang menciptakan ruang di mana kreativitas, percakapan, dan kenangan bertemu.".</p>
            </div>
        </div>
      </section>
     <!-- About Section end -->

        <?php
        include "koneksi.php";

        // Inisialisasi variabel pencarian
        $katakunci = "";
        if (isset($_GET['katakunci'])) {
            $katakunci = htmlspecialchars($_GET['katakunci']);
        }

        // Cek apakah ada kiriman form dari method GET untuk menghapus data
        if (isset($_GET['id_peserta'])) {
            $id_peserta = htmlspecialchars($_GET["id_peserta"]);
            $sql = "DELETE FROM peserta WHERE id_peserta='$id_peserta'";
            $hasil = mysqli_query($kon, $sql);

            // Kondisi apakah berhasil atau tidak
            if ($hasil) {
                header("Location:index.php");
            } else {
                echo "<div class='alert alert-danger'> Data Gagal dihapus.</div>";
            }
        }
        ?>
<!-- Menu Section start -->
<section id="menu" class="menu">
     <br><h2><span>Daftar Peserta</span> Kenangan</h2><br>
        <!-- Form Pencarian -->
        <form class="form-inline" method="get">
            <input type="text" class="form-control" placeholder="Masukkan Kata Kunci..." name="katakunci" value="<?php echo $katakunci; ?>" />
            <button type="submit"><i data-feather="search"></i></button>
        </form>

        <br><table class="table-bordered">
            <thead>
                <tr class="table-primary">           
                    <th>No</th>
                    <th>Nama</th>
                    <th>Sekolah</th>
                    <th>Jurusan</th>
                    <th>No Hp</th>
                    <th>Alamat</th>
                    <th colspan='2'>Aksi</th>
                </tr>
            </thead>

            <?php
            // Query untuk mencari data
            $sql = "SELECT * FROM peserta WHERE 
                    nama LIKE '%$katakunci%' OR 
                    sekolah LIKE '%$katakunci%' OR 
                    jurusan LIKE '%$katakunci%' OR 
                    alamat LIKE '%$katakunci%' OR 
                    no_hp LIKE '%$katakunci%' 
                    ORDER BY id_peserta DESC";

            $hasil = mysqli_query($kon, $sql);
            $no = 0;
            while ($data = mysqli_fetch_array($hasil)) {
                $no++;
            ?>
            <tbody>
                <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo htmlspecialchars($data["nama"]); ?></td>
                    <td><?php echo htmlspecialchars($data["sekolah"]); ?></td>
                    <td><?php echo htmlspecialchars($data["jurusan"]); ?></td>
                    <td><?php echo htmlspecialchars($data["no_hp"]); ?></td>
                    <td><?php echo htmlspecialchars($data["alamat"]); ?></td>
                    <td>
                    <a href="update.php?id_peserta=<?php echo htmlspecialchars($data['id_peserta']); ?>" class="btn-warning" role="button">Update</a>
                    <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?id_peserta=<?php echo $data['id_peserta']; ?>" class="btn-danger" role="button">Delete</a>                    </td>
                </tr>
            </tbody>
            <?php
            }
            ?>
        </table><br><br>
        <a href="create.php" class="btn-primary" role="button">Tambah Data</a>
    </div>
<!-- Contact Section start -->
<section id="contact" class="contact">
        <br><h2><span>Kontak</span> Kami</h2>
        <p>"Hubungi kami dan temukan secangkir cerita bersama."</p>
        <div class="row">
            <form action="">
                <div class="input-grup">
                    <i data-feather="user">></i>
                    <input type="text" placeholder="Nama">
                </div>
                <div class="input-grup">
                    <i data-feather="mail">></i>
                    <input type="text" placeholder="Email">
                </div>
                <div class="input-grup">
                    <i data-feather="phone">></i>
                    <input type="text" placeholder="Nomor Handphone">
                </div>
                <div class="input-grup">
                    <i data-feather="message-square">></i>
                    <input type="text" placeholder="Pesan">
                </div>
                <button type="submit" class="btn">Kirim Pesan</button>
            </form>
        </div>
      </section>
     <!-- Contact Section end -->

     <!-- Footer start -->
      <footer>
        <div class="socials">
            <a href="#"><i data-feather="instagram"></i></a>
            <a href="#"><i data-feather="twitter"></i></a>
            <a href="#"><i data-feather="facebook"></i></a>
        </div>
        <div class="links">
            <a href="#home">Home</a>
            <a href="#about">Tentang Kami</a>
            <a href="#menu">Menu</a>
            <a href="#contact">Kontak</a>
        </div>
        <div class="credit">
            <p>Created by <a href="">Kenangan Senja</a>. | &copy : 2025</p>
        </div>
      </footer>
     <!-- Footer end -->
     <!-- Feather Icons -->
     <script>
        feather.replace();
     </script>

     <!-- My Javascript -->
      <script src="script.js"></script>
</body>
</html>