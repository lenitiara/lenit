<?php
    //cek session
    if(!empty($_SESSION['admin'])){
?>
 
  
<nav class="blue darken-1">
    <div class="nav-wrapper">
        <a href="./" class="brand-logo center hide-on-large-only"><i class="material-icons md-36">mail</i> E-ARSIP</a>
        <ul id="slide-out" class="side-nav" data-simplebar-direction="vertical">
            <li class="no-padding">
                <div class="logo-side center blue-grey darken-3">
                    <?php
                        $query = mysqli_query($koneksi, "SELECT * FROM tbl_instansi");
                        while($data = mysqli_fetch_array($query)){
                            if(!empty($data['logo'])){
                                echo '<img class="logoside" src="./upload/'.$data['logo'].'"/>';
                            } else {
                                echo '<img class="logoside" src="./asset/img/logo.png"/>';
                            }
                            if(!empty($data['nama'])){
                                echo '<h5 class="ft-side">'.$data['nama'].'</h5>';
                            } else {
                                echo '<h5 class="ft-side">FAKULTAS TEKNIK UNIVERSITAS SURYAKANCANA</h5>';
                            }
                            if(!empty($data['alamat'])){
                                echo '<p class="description-side">'.$data['alamat'].'</p>';
                            } else {
                                echo '<p class="description-side">Jl. Pasir Gede Raya, Bojongherang, Kec. Cianjur, Kabupaten Cianjur, Jawa Barat 43216</p>';
                            }
                        }
                    ?>
                </div>
            </li>
            <li class="no-padding blue darken-1">
                <ul class="collapsible collapsible-accordion">
                    <li>
                        <a class="collapsible-header"><i class="material-icons">account_circle</i><?php echo $_SESSION['nama']; ?></a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="?page=pro">Profil</a></li>
                                <li><a href="?page=pro&sub=pass">Ubah Kata Sandi</a></li>
                                <li><a href="logout.php">Keluar</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </li>
            <li><a href="./"><i class="material-icons middle">dashboard</i> Beranda</a></li>
            <li class="no-padding">
        
                <ul class="collapsible collapsible-accordion">
                    <li>
                        <a class="collapsible-header"><i class="material-icons">repeat</i> Transaksi Surat</a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="?page=tsm">Surat Masuk</a></li>
                                <li><a href="?page=tsk">Surat Keluar</a></li>
                            </ul>
                        </div>
                   </li>
                </ul>
               
            </li>
            <li class="no-padding">
                <ul class="collapsible collapsible-accordion">
                    <li>
                        <a class="collapsible-header"><i class="material-icons">assignment</i> Buku Agenda</a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="?page=asm">Surat Masuk</a></li>
                                <li><a href="?page=ask">Surat Keluar</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </li>
            <li class="no-padding">
                <ul class="collapsible collapsible-accordion">
                    <li>
                        <a class="collapsible-header"><i class="material-icons">image</i>  File</a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="?page=gsm">Surat Masuk</a></li>
                                <li><a href="?page=gsk">Surat Keluar</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </li>
            <li><a href="?page=ref"><i class="material-icons middle">class</i> Referensi</a></li>
            <li class="no-padding">
            <?php
                if($_SESSION['admin'] == 1){ ?>
                <ul class="collapsible collapsible-accordion">
                    <li>
                        <a class="collapsible-header"><i class="material-icons">settings</i> Pengaturan</a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="?page=sett">Instansi</a></li>
                                <li><a href="?page=sett&sub=usr">User</a></li>
                                <li><a href="?page=sett&sub=back">Backup Database</a></li>
                                <li><a href="?page=sett&sub=rest">Restore Database</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            <?php
                }
            ?>
            <?php
                if($_SESSION['admin'] == 2){ ?>
                <ul class="collapsible collapsible-accordion">
                    <li>
                        <a class="collapsible-header"><i class="material-icons">settings</i> Pengaturan</a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="?page=sett">Instansi</a></li>
                                <li><a href="?page=sett&sub=usr">User</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            <?php
                }
            ?>
            </li>
        </ul>
        <!-- Menu on medium and small screen END -->


        <!-- Menu on large screen START -->
        
        <ul class="center hide-on-med-and-down" id="nv">
            <li><a href="./" class="ams hide-on-med-and-down"><i class="material-icons md-36">mail</i> E-ARSIP</a></li>
            <li><div class="grs"></></li>
            <li><a href="./"><i class="material-icons"></i>&nbsp; Beranda</a></li>
                   <!-- Kelola Surat  -->
            <?php
                if($_SESSION['admin'] == 1 ){ ?>
            <li><a class="dropdown-button" href="#!" data-activates="transaksi"> Kelola Surat <i class="material-icons md-18">arrow_drop_down</i></a></li>
                <ul id='transaksi' class='dropdown-content'>
                    <li><a href="?page=tsm">Surat Masuk</a></li>
                    <li><a href="?page=tsk">Surat Keluar</a></li>
                </ul>
            <?php
                }
            ?>   
            <?php
                if($_SESSION['admin'] == 4){ ?>
            <li><a class="dropdown-button" href="#!" data-activates="transaksi"> Kelola Surat <i class="material-icons md-18">arrow_drop_down</i></a></li>
                <ul id='transaksi' class='dropdown-content'>
                    <li><a href="?page=tsmf">Surat Masuk</a></li>
                    <li><a href="?page=tsk">Surat Keluar</a></li>
                </ul>
            <?php
                }
            ?>   
            <?php
                if($_SESSION['admin'] == 5){ ?>
            <li><a class="dropdown-button" href="#!" data-activates="transaksi"> Kelola Surat <i class="material-icons md-18">arrow_drop_down</i></a></li>
                <ul id='transaksi' class='dropdown-content'>
                    <li><a href="?page=tsm">Surat Masuk</a></li>
                    <li><a href="?page=tsk">Surat Keluar</a></li>
                </ul>
            <?php
                }
            ?>   
            <?php
                if($_SESSION['admin'] == 6){ ?>
            <li><a class="dropdown-button" href="#!" data-activates="transaksi"> Kelola Surat <i class="material-icons md-18">arrow_drop_down</i></a></li>
                <ul id='transaksi' class='dropdown-content'>
                    <li><a href="?page=tsm">Surat Masuk</a></li>
                    <li><a href="?page=tsk">Surat Keluar</a></li>
                </ul>
            <?php
                }
            ?>  
                         <!-- Buku Agenda  -->
            <?php
                if($_SESSION['admin'] == 1){ ?>
            <li><a class="dropdown-button" href="#!" data-activates="agenda">Buku Agenda <i class="material-icons md-18">arrow_drop_down</i></a></li>
                <ul id='agenda' class='dropdown-content'>
                    <li><a href="?page=asm">Surat Masuk</a></li>
                    <li><a href="?page=ask">Surat Keluar</a></li>
                </ul>
            <?php
                }
            ?>  

            <?php
                if($_SESSION['admin'] == 4){ ?>
            <li><a class="dropdown-button" href="#!" data-activates="agenda">Buku Agenda <i class="material-icons md-18">arrow_drop_down</i></a></li>
                <ul id='agenda' class='dropdown-content'>
                    <li><a href="?page=asm">Surat Masuk</a></li>
                    <li><a href="?page=ask">Surat Keluar</a></li>
                </ul>
            <?php
                }
            ?>  

            <?php
                if($_SESSION['admin'] == 5){ ?>
            <li><a class="dropdown-button" href="#!" data-activates="agenda">Buku Agenda <i class="material-icons md-18">arrow_drop_down</i></a></li>
                <ul id='agenda' class='dropdown-content'>
                    <li><a href="?page=asm">Surat Masuk</a></li>
                    <li><a href="?page=ask">Surat Keluar</a></li>
                </ul>
            <?php
                }
            ?>  

            <?php
                if($_SESSION['admin'] == 6){ ?>
            <li><a class="dropdown-button" href="#!" data-activates="agenda">Buku Agenda <i class="material-icons md-18">arrow_drop_down</i></a></li>
                <ul id='agenda' class='dropdown-content'>
                    <li><a href="?page=asm">Surat Masuk</a></li>
                    <li><a href="?page=ask">Surat Keluar</a></li>
                </ul>
            <?php
                }
            ?>  

                         <!-- Gallery File  -->
            <?php
                if($_SESSION['admin'] == 1){ ?>
            <li><a class="dropdown-button" href="#!" data-activates="agenda">GalleryFile<i class="material-icons md-18">arrow_drop_down</i></a></li>
                <ul id='agenda' class='dropdown-content'>
                    <li><a href="?page=gsm">Surat Masuk</a></li>
                    <li><a href="?page=gsk">Surat Keluar</a></li>
                </ul>
            <?php
                }
            ?>  

            <?php
                if($_SESSION['admin'] == 4){ ?>
            <li><a class="dropdown-button" href="#!" data-activates="agenda">GalleryFile<i class="material-icons md-18">arrow_drop_down</i></a></li>
                <ul id='agenda' class='dropdown-content'>
                    <li><a href="?page=gsm">Surat Masuk</a></li>
                    <li><a href="?page=gsk">Surat Keluar</a></li>
                </ul>
            <?php
                }
            ?>  

            <?php
                if($_SESSION['admin'] == 5){ ?>
            <li><a class="dropdown-button" href="#!" data-activates="agenda">GalleryFile<i class="material-icons md-18">arrow_drop_down</i></a></li>
                <ul id='agenda' class='dropdown-content'>
                    <li><a href="?page=gsm">Surat Masuk</a></li>
                    <li><a href="?page=gsk">Surat Keluar</a></li>
                </ul>
            <?php
                }
            ?>  

            <?php
                if($_SESSION['admin'] == 6){ ?>
            <li><a class="dropdown-button" href="#!" data-activates="agenda">GalleryFile<i class="material-icons md-18">arrow_drop_down</i></a></li>
                <ul id='agenda' class='dropdown-content'>
                    <li><a href="?page=gsm">Surat Masuk</a></li>
                    <li><a href="?page=gsk">Surat Keluar</a></li>
                </ul>
            <?php
                }
            ?>  
                         <!-- Kategori Surat  -->
            <?php
                if($_SESSION['admin'] == 1){ ?>
            <li><a href="?page=ref">Kategori Surat</a></li>
            <?php
                }
            ?> 

            <?php
                if($_SESSION['admin'] == 4){ ?>
            <li><a href="?page=ref">Kategori Surat</a></li>
            <?php
                }
            ?> 

            <?php
                if($_SESSION['admin'] == 5){ ?>
            <li><a href="?page=ref">Kategori Surat</a></li>
            <?php
                }
            ?> 

            <?php
                if($_SESSION['admin'] == 6){ ?>
            <li><a href="?page=ref">Kategori Surat</a></li>
            <?php
                }
            ?> 

                          <!-- Buat Surat  -->
            <?php
                if($_SESSION['admin'] == 1){ ?>
            <li><a href="#">Buat Surat</a></li>
            <?php
                }
            ?> 

            <?php
                if($_SESSION['admin'] == 4){ ?>
            <li><a href="#">Buat Surat</a></li>
            <?php
                }
            ?> 

            <?php
                if($_SESSION['admin'] == 5){ ?>
            <li><a href="#">Buat Surat</a></li>
            <?php
                }
            ?> 

            <?php
                if($_SESSION['admin'] == 6){ ?>
            <li><a href="#">Buat Surat</a></li>
            <?php
                }
            ?> 

            <?php
                if($_SESSION['admin'] == 1){ ?>
            <li><a class="dropdown-button" href="#!" data-activates="pengaturan">Kelola Akun <i class="material-icons md-18">arrow_drop_down</i></a></li>
                <ul id='pengaturan' class='dropdown-content'>
                    <li><a href="?page=sett">Instansi</a></li>
                    <li><a href="?page=sett&sub=usr">User</a></li>
                    <!--<li class="divider"></li>
                    <li><a href="?page=sett&sub=back">Backup Database</a></li>
                    <li><a href="?page=sett&sub=rest">Restore Database</a></li> -->
                </ul>
            <?php
                }
            ?>   

            <li class="right" style="margin-right: 10px;"><a class="dropdown-button" href="#!" data-activates="logout"><i class="material-icons">account_circle</i> <?php echo $_SESSION['nama']; ?><i class="material-icons md-18">arrow_drop_down</i></a></li>
                <ul id='logout' class='dropdown-content'>
                    <li><a href="?page=pro">Profil</a></li>
                    <li><a href="?page=pro&sub=pass">Ubah Kata Sandi</a></li>
                    <li class="divider"></li>
                    <li><a href="logout.php"><i class="material-icons">settings_power</i> Keluar</a></li>
                </ul>
        </ul>
         
        <!-- Menu on large screen END -->
        <a href="#" data-activates="slide-out" class="button-collapse" id="menu"><i class="material-icons">menu</i></a>
    </div>
</nav>

<?php
    } else {
        header("Location: ../");
        die();
    }
?>
