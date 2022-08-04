<?php
    ob_start();
    //cek session
    session_start();

    if(empty($_SESSION['admin'])){
        $_SESSION['err'] = '<center>Anda harus login terlebih dahulu!</center>';
        header("Location: ./");
        die();
    } else {
?>
<!--

Name        : Aplikasi Surat Menyurat
Version     : v1.0.0
Description : Aplikasi untuk mencatat data surat masuk dan keluar secara digital.
Date        : 2022
Developer   : Leni Tiara


-->
<!doctype html>
<html lang="en">

<!-- Include Head START -->
<?php include('include/head.php'); ?>
<!-- Include Head END -->

<!-- Body START -->
<body class="bg">

<!-- Header START -->
<header>

<!-- Include Navigation START -->
<?php include('include/menu.php'); ?>
<!-- Include Navigation END -->

</header>
<!-- Header END -->

<!-- Main START -->
<main>

    <!-- container START -->
    <div class="container">

    <?php
        if(isset($_REQUEST['page'])){
            $page = $_REQUEST['page'];
            switch ($page) {
                case 'tsm':
                    include "transaksi_surat_masuk.php";
                    break;
                case 'tsmf':
                    include "ft_transaksi_surat_masuk.php";
                    break;
                case 'ctk':
                    include "cetak_disposisi.php";
                    break;
                case 'ctkf':
                    include "ft_cetak_disposisi.php";
                    break;
                case 'tsk':
                    include "transaksi_surat_keluar.php";
                    break;
                case 'asm':
                    include "agenda_surat_masuk.php";
                    break;
                case 'asmf':
                    include "ft_agenda_surat_masuk.php";
                    break;
                case 'ask':
                    include "agenda_surat_keluar.php";
                    break;
                case 'ref':
                    include "referensi.php";
                    break;
                case 'sett':
                    include "pengaturan.php";
                    break;
                case 'pro':
                    include "profil.php";
                    break;
                case 'gsm':
                    include "galeri_sm.php";
                    break;
                case 'gsmf':
                    include "ft_galeri_sm.php";
                    break;
                case 'gsk':
                    include "galeri_sk.php";
                    break;
                case 'tms':
                    include "transaksi_membuat_surat.php";
                    break;
                case 'ctkb':
                    include "cetak_bikin_surat.php";
                    break;
                    
            }
        } else {
    ?>
        <!-- Row START -->
        <div class="row">

            <!-- Include Header Instansi START -->
            <?php include('include/header_instansi.php'); ?>
            <!-- Include Header Instansi END -->

            <!-- Welcome Message START -->
            <div class="col s12">
                
                    <div class="card-content">
                        <h4>Selamat Datang</h4>
                        <p class="description">Anda login sebagai
                        <?php
                            if($_SESSION['admin'] == 1){
                                echo "<strong>Staf Fakultas</strong>. Anda memiliki akses penuh terhadap sistem.";
                            } elseif($_SESSION['admin'] == 4){
                                echo "<strong>Staf Prodi Informatika</strong>. Berikut adalah statistik data yang tersimpan dalam sistem.";
                            } elseif($_SESSION['admin'] == 5){
                                echo "<strong>Staf Prodi Sipil</strong>. Berikut adalah statistik data yang tersimpan dalam sistem.";
                            }elseif($_SESSION['admin'] == 6){
                                echo "<strong>Staf Prodi Industri</strong>. Berikut adalah statistik data yang tersimpan dalam sistem.";
                            }else {
                                echo "<strong>Petugas Disposisi</strong>. Berikut adalah statistik data yang tersimpan dalam sistem.";
                            }?></p>
                    
                </div>
            </div>
            <!-- Welcome Message END -->

            <?php
                //menghitung jumlah surat masuk
                $count1 = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM tbl_surat_masuk"));

                //menghitung jumlah surat masuk
                $count2 = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM tbl_surat_keluar"));

                //menghitung jumlah surat masuk
                $count3 = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM tbl_disposisi"));

                //menghitung jumlah kategori surat
                $count4 = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM tbl_klasifikasi"));

                //menghitung jumlah pengguna
                $count5 = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM tbl_user"));
                
                //menghitung jumlah surat masuk
                $count6 = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM tbl_surat_masuk_ft"));

                //menghitung jumlah surat masuk
                $count7 = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM tbl_surat_keluar_ft"));

                //menghitung jumlah surat masuk
                $count8 = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM tbl_disposisi_ft"));

                //menghitung jumlah kategori surat
                $count9 = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM tbl_klasifikasi_ft"));
                
            ?>

            <!-- Info Statistic START -->
            <?php
            if($_SESSION['id_user'] == 1 || $_SESSION['admin'] == 5 || $_SESSION['admin'] == 6 ){?>
            <div class="col s12 m4">
                <div class="card blue accent-1">
                    <div class="card-content">
                        <span class="card-title white-text"><i class="material-icons md-36">mail</i> Jumlah Surat Masuk</span>
                        <?php echo '<h5 class="white-text link">'.$count1.' Surat Masuk</h5>'; ?>
                    </div>
                </div>
            </div>
            <?php
                 }
            ?>

            <?php
            if($_SESSION['id_user'] == 3 ){?>
            <div class="col s12 m4">
                <div class="card blue accent-1">
                    <div class="card-content">
                        <span class="card-title white-text"><i class="material-icons md-36">mail</i> Jumlah Surat Masuk</span>
                        <?php echo '<h5 class="white-text link">'.$count6.' Surat Masuk</h5>'; ?>
                    </div>
                </div>
            </div>
            <?php
                 }
            ?>
            
            <?php
            if($_SESSION['id_user'] == 1 || $_SESSION['admin'] == 5 || $_SESSION['admin'] == 6){?>
            <div class="col s12 m4">
                <div class="card red">
                    <div class="card-content">
                        <span class="card-title white-text"><i class="material-icons md-36">drafts</i> Jumlah Surat Keluar</span>
                        <?php echo '<h5 class="white-text link">'.$count2.' Surat Keluar</h5>'; ?>
                    </div>
                </div>
            </div>
            <?php
                 }
            ?>

            <?php
            if($_SESSION['id_user'] == 3 ){?>
            <div class="col s12 m4">
                <div class="card red">
                    <div class="card-content">
                        <span class="card-title white-text"><i class="material-icons md-36">drafts</i> Jumlah Surat Keluar</span>
                        <?php echo '<h5 class="white-text link">'.$count7.' Surat Keluar</h5>'; ?>
                    </div>
                </div>
            </div>
            <?php
                 }
            ?>

            <?php
            if($_SESSION['id_user'] == 1 || $_SESSION['admin'] == 5 || $_SESSION['admin'] == 6){?>
            <div class="col s12 m4">
                <div class="card green">
                    <div class="card-content">
                        <span class="card-title white-text"><i class="material-icons md-36">description</i> Jumlah Disposisi</span>
                        <?php echo '<h5 class="white-text link">'.$count3.' Disposisi</h5>'; ?>
                    </div>
                </div>
            </div>
            <?php
                 }
            ?>
            
            <?php
            if($_SESSION['id_user'] == 3 ){?>
            <div class="col s12 m4">
                <div class="card green">
                    <div class="card-content">
                        <span class="card-title white-text"><i class="material-icons md-36">description</i> Jumlah Disposisi</span>
                        <?php echo '<h5 class="white-text link">'.$count8.' Disposisi</h5>'; ?>
                    </div>
                </div>
            </div>
            <?php
                 }
            ?>

            <?php
            if($_SESSION['id_user'] == 1 || $_SESSION['admin'] == 5 || $_SESSION['admin'] == 6){?>
            <div class="col s12 m4">
                <div class="card orange">
                    <div class="card-content">
                        <span class="card-title white-text"><i class="material-icons md-36">class</i> Kategori Surat</span>
                        <?php echo '<h5 class="white-text link">'.$count4.' Kategori Surat</h5>'; ?>
                    </div>
                </div>
            </div>
            <?php
                 }
            ?>

            <?php
            if($_SESSION['id_user'] == 3 ){?>
            <div class="col s12 m4">
                <div class="card orange">
                    <div class="card-content">
                        <span class="card-title white-text"><i class="material-icons md-36">class</i> Kategori Surat</span>
                        <?php echo '<h5 class="white-text link">'.$count9.' Kategori Surat</h5>'; ?>
                    </div>
                </div>
            </div>
            <?php
                 }
            ?>

        <?php
            if($_SESSION['id_user'] == 1 || $_SESSION['admin'] == 2){?>
            <div class="col s12 m4">
                <div class="card lime">
                    <div class="card-content">
                        <span class="card-title white-text"><i class="material-icons md-36">people</i> Pengelolaan Pengguna</span>
                        <?php echo '<h5 class="white-text link">'.$count5.' Pengguna</h5>'; ?>
                    </div>
                </div>
            </div>
            <!-- Info Statistic START -->

        <?php
            }
        ?>

        </div>
        <!-- Row END -->
    <?php
        }
    ?>
    </div>
    <!-- container END -->

</main>
<!-- Main END -->

<!-- Include Footer START -->
<?php include('include/footer.php'); ?>
<!-- Include Footer END -->

</body>
<!-- Body END -->

</html>

<?php
    }
?>
