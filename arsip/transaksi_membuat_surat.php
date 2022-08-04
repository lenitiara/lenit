<?php
    //cek session
    if(empty($_SESSION['admin'])){
        $_SESSION['err'] = '<center>Anda harus login terlebih dahulu!</center>';
        header("Location: ./");
        die();
    } else {

        if($_SESSION['admin'] != 1 AND $_SESSION['admin'] != 3){
            echo '<script language="javascript">
                    window.alert("ERROR! Anda tidak memiliki hak akses untuk membuka halaman ini");
                    window.location.href="./logout.php";
                  </script>';
        } else {

            if(isset($_REQUEST['act'])){
                $act = $_REQUEST['act'];
                switch ($act) {
                    case 'tbs':
                        include "tambah_bikin_surat.php";
                        break;
                    case 'editb':
                        include "edit_buat_surat.php";
                        break;
                    case 'disp':
                        include "disposisi.php";
                        break;
                    case 'printb':
                        include "cetak_bikin_surat.php";
                        break;
                    case 'delb':
                        include "hapus_buat_surat.php";
                        break;
                    
                }
            } else {

                $query = mysqli_query($koneksi, "SELECT buat_surat FROM tbl_sett");
                list($buat_surat) = mysqli_fetch_array($query);

                //pagging
                $limit = $buat_surat;
                $pg = @$_GET['pg'];
                if(empty($pg)){
                    $curr = 0;
                    $pg = 1;
                } else {
                    $curr = ($pg - 1) * $limit;
                }?>

                <!-- Row Start -->
                <div class="row">
                    <!-- Secondary Nav START -->
                    <div class="col s12">
                        <div class="z-depth-1">
                            <nav class="secondary-nav">
                                <div class="nav-wrapper blue-grey darken-1">
                                    <div class="col m7">
                                        <ul class="left">
                                            <li class="waves-effect waves-light hide-on-small-only"><a href="?page=tms" class="judul"><i class="material-icons">mail</i> Pembuatan Surat</a></li>
                                            <li class="waves-effect waves-light">
                                                <a href="?page=tms&act=tbs"><i class="material-icons md-24">add_circle</i> Buat Surat</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col m5 hide-on-med-and-down">
                                        <form method="post" action="?page=tms">
                                            <div class="input-field round-in-box">
                                                <input id="search" type="search" name="cari" placeholder="Ketik dan tekan enter mencari data..." required>
                                                <label for="search"><i class="material-icons md-dark">search</i></label>
                                                <input type="submit" name="submit" class="hidden">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </nav>
                        </div>
                    </div>
                    <!-- Secondary Nav END -->
                </div>
                <!-- Row END -->

                <?php
                    if(isset($_SESSION['succAdd'])){
                        $succAdd = $_SESSION['succAdd'];
                        echo '<div id="alert-message" class="row">
                                <div class="col m12">
                                    <div class="card green lighten-5">
                                        <div class="card-content notif">
                                            <span class="card-title green-text"><i class="material-icons md-36">done</i> '.$succAdd.'</span>
                                        </div>
                                    </div>
                                </div>
                            </div>';
                        unset($_SESSION['succAdd']);
                    }
                    if(isset($_SESSION['succEdit'])){
                        $succEdit = $_SESSION['succEdit'];
                        echo '<div id="alert-message" class="row">
                                <div class="col m12">
                                    <div class="card green lighten-5">
                                        <div class="card-content notif">
                                            <span class="card-title green-text"><i class="material-icons md-36">done</i> '.$succEdit.'</span>
                                        </div>
                                    </div>
                                </div>
                            </div>';
                        unset($_SESSION['succEdit']);
                    }
                    if(isset($_SESSION['succDel'])){
                        $succDel = $_SESSION['succDel'];
                        echo '<div id="alert-message" class="row">
                                <div class="col m12">
                                    <div class="card green lighten-5">
                                        <div class="card-content notif">
                                            <span class="card-title green-text"><i class="material-icons md-36">done</i> '.$succDel.'</span>
                                        </div>
                                    </div>
                                </div>
                            </div>';
                        unset($_SESSION['succDel']);
                    }
                ?>

                <!-- Row form Start -->
                <div class="row jarak-form">

                <?php
                    if(isset($_REQUEST['submit'])){
                    $cari = mysqli_real_escape_string($koneksi, $_REQUEST['cari']);
                        echo '
                        <div class="col s12" style="margin-top: -18px;">
                            <div class="card blue lighten-5">
                                <div class="card-content">
                                <p class="description">Hasil pencarian untuk kata kunci <strong>"'.stripslashes($cari).'"</strong><span class="right"><a href="?page=tms"><i class="material-icons md-36" style="color: #333;">clear</i></a></span></p>
                                </div>
                            </div>
                        </div>

                        <div class="col m12" id="colres">
                        <table class="bordered" id="tbl">
                            <thead class="blue lighten-4" id="head">
                                <tr>
                                    <th width="10%">Nomor<br/>Perihal</th>
                                    <th width="30%">Isi Surat<br/>
                                    <th width="24%">Tujuan<br/>Keterangan</th> 
                                    <th width="18%">No. Surat<br/>Tgl Surat</th>
                                    <th width="18%">Tindakan <span class="right"><i class="material-icons" style="color: #333;">settings</i></span></th>
                                </tr>
                            </thead>
                            <tbody>';

                            //script untuk mencari data
                            $query = mysqli_query($koneksi, "SELECT * FROM tbl_buat_surat WHERE isi LIKE '%$cari%' ORDER by id_surat DESC LIMIT 15");
                            if(mysqli_num_rows($query) > 0){
                                $no = 1;
                                while($row = mysqli_fetch_array($query)){
                                  echo '
                                  <tr>
                                    <td>'.$row['no_urut'].'<br/><hr/>'.$row['lampiran'].'</td>
                                    <td>'.substr($row['isi'],0,200).'<br/><br/>';

                                  echo '
                                    <td>'.$row['tujuan'].$row['keterangan'].'</td>
                                    <td>'.$row['no_surat'].'<br/><hr/>'.indoDate($row['tgl_surat']).'</td>
                                    <td>';

                                    if($_SESSION['id_user'] != $row['id_user'] AND $_SESSION['id_user'] != 1){
                                        echo '<a class="btn small yellow darken-3 waves-effect waves-light" href="?page=ctkd&id_surat='.$row['id_surat'].'" target="_blank">
                                            <i class="material-icons">print</i> PRINT</a>';
                                    } else {
                                      echo '<a class="btn small blue waves-effect waves-light" href="?page=tms&act=editb&id_surat='.$row['id_surat'].'">
                                                <i class="material-icons">edit</i> EDIT</a>
                                            <a class="btn small light-green waves-effect waves-light tooltipped" data-position="left" data-tooltip="Pilih Disp untuk menambahkan Disposisi Surat" href="?page=tsm&act=disp&id_surat='.$row['id_surat'].'">
                                                <i class="material-icons">description</i> DISP</a>
                                            <a class="btn small yellow darken-3 waves-effect waves-light" href="?page=ctk&id_surat='.$row['id_surat'].'" target="_blank">
                                                <i class="material-icons">print</i> PRINT</a>
                                            <a class="btn small deep-orange waves-effect waves-light" href="?page=tms&act=delb&id_surat='.$row['id_surat'].'">
                                                <i class="material-icons">delete</i> DEL</a>';
                                    } echo '
                                        </td>
                                    </tr>';
                                }
                            } else {
                                echo '<tr><td colspan="5"><center><p class="add">Tidak ada data yang ditemukan</p></center></td></tr>';
                            }
                             echo '</tbody></table><br/><br/>
                        </div>
                    </div>
                    <!-- Row form END -->';

                    } else {

                        echo '
                        <div class="col m12" id="colres">
                            <table class="bordered" id="tbl">
                                <thead class="blue lighten-4" id="head">
                                    <tr>
                                        <th width="10%">Nomor<br/>Perihal</th>
                                        <th width="30%">Isi Surat</th>
                                        <th width="24%">Tujuan<br/>Keterangan</th>
                                        <th width="18%">No. Surat<br/>Tgl Surat</th>
                                        <th width="18%">Tindakan <span class="right tooltipped" data-position="left" data-tooltip="Atur jumlah data yang ditampilkan"><a class="modal-trigger" href="#modal"><i class="material-icons" style="color: #333;">settings</i></a></span></th>

                                            <div id="modal" class="modal">
                                                <div class="modal-content white">
                                                    <h5>Jumlah data yang ditampilkan per halaman</h5>';
                                                    $query = mysqli_query($koneksi, "SELECT id_sett,buat_surat FROM tbl_sett");
                                                    list($id_sett,$buat_surat) = mysqli_fetch_array($query);
                                                    echo '
                                                    <div class="row">
                                                        <form method="post" action="">
                                                            <div class="input-field col s12">
                                                                <input type="hidden" value="'.$id_sett.'" name="id_sett">
                                                                <div class="input-field col s1" style="float: left;">
                                                                    <i class="material-icons prefix md-prefix">looks_one</i>
                                                                </div>
                                                                <div class="input-field col s11 right" style="margin: -5px 0 20px;">
                                                                    <select class="browser-default validate" name="buat_surat" required>
                                                                        <option value="'.$buat_surat.'">'.$buat_surat.'</option>
                                                                        <option value="5">5</option>
                                                                        <option value="10">10</option>
                                                                        <option value="20">20</option>
                                                                        <option value="50">50</option>
                                                                        <option value="100">100</option>
                                                                    </select>
                                                                </div>
                                                                <div class="modal-footer white">
                                                                    <button type="submit" class="modal-action waves-effect waves-green btn-flat" name="simpan">Simpan</button>';
                                                                    if(isset($_REQUEST['simpan'])){
                                                                        $id_sett = "1";
                                                                        $buat_surat = $_REQUEST['buat_surat'];
                                                                        $id_user = $_SESSION['id_user'];

                                                                        $query = mysqli_query($koneksi, "UPDATE tbl_sett SET buat_surat='$buat_surat',id_user='$id_user' WHERE id_sett='$id_sett'");
                                                                        if($query == true){
                                                                            header("Location: ./admin.php?page=tms");
                                                                            die();
                                                                        }
                                                                    } echo '
                                                                    <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Batal</a>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                    </tr>
                                </thead>
                                <tbody>';

                                //script untuk menampilkan data
                                $query = mysqli_query($koneksi, "SELECT * FROM tbl_buat_surat ORDER by id_surat DESC LIMIT $curr, $limit");
                                if(mysqli_num_rows($query) > 0){
                                    $no = 1;
                                    while($row = mysqli_fetch_array($query)){
                                      echo '
                                      <tr>
                                        <td>'.$row['no_urut'].'<br/><hr/>'.$row['perihal'].'</td>
                                        <td>'.$row['isi'].'<br/><br/>';
                                        
                                        if(!empty($row['file'])){
                                            echo ' <strong><a href="?page=gsm&act=fsm&id_surat='.$row['id_surat'].'">'.$row['file'].'</a></strong>';
                                        } else {
                                            echo '<em>Tidak ada file yang di upload</em>';
                                        } echo '</td>
                                        <td>'.$row['tujuan'].$row['keterangan'].'</td>
                                        <td>'.$row['no_surat'].'<br/><hr/>'.indoDate($row['tgl_surat']).'</td>
                                        <td>';

                                        if($_SESSION['id_user'] != $row['id_user'] AND $_SESSION['id_user'] != 1){
                                            echo '<a class="btn small yellow darken-3 waves-effect waves-light" href="?page=ctkb&id_surat='.$row['id_surat'].'" target="_blank">
                                                <i class="material-icons">print</i> PRINT</a>';
                                        } else {
                                          echo '<a class="btn small blue waves-effect waves-light" href="?page=tms&act=editb&id_surat='.$row['id_surat'].'">
                                                    <i class="material-icons">edit</i> EDIT</a>
                                                <a class="btn small light-green waves-effect waves-light tooltipped" data-position="left" data-tooltip="Pilih Disp untuk menambahkan Disposisi Surat" href="?page=tms&act=disp&id_surat='.$row['id_surat'].'">
                                                    <i class="material-icons">description</i> DISP</a>
                                                <a class="btn small yellow darken-3 waves-effect waves-light" href="?page=ctkb&id_surat='.$row['id_surat'].'" target="_blank">
                                                    <i class="material-icons">print</i> PRINT</a>
                                                <a class="btn small deep-orange waves-effect waves-light" href="?page=tms&act=delb&id_surat='.$row['id_surat'].'">
                                                    <i class="material-icons">delete</i> DEL</a>';
                                        } echo '
                                        </td>
                                    </tr>';
                                }
                            } else {
                                echo '<tr><td colspan="5"><center><p class="add">Tidak ada data untuk ditampilkan. <u><a href="?page=tms&act=tbs">Tambah data baru</a></u></p></center></td></tr>';
                            }
                          echo '</tbody></table>
                        </div>
                    </div>
                    <!-- Row form END -->';

                    $query = mysqli_query($koneksi, "SELECT * FROM tbl_buat_surat");
                    $cdata = mysqli_num_rows($query);
                    $cpg = ceil($cdata/$limit);

                    echo '<br/><!-- Pagination START -->
                          <ul class="pagination">';

                    if($cdata > $limit ){

                        //first and previous pagging
                        if($pg > 1){
                            $prev = $pg - 1;
                            echo '<li><a href="?page=tms&pg=1"><i class="material-icons md-48">first_page</i></a></li>
                                  <li><a href="?page=tms&pg='.$prev.'"><i class="material-icons md-48">chevron_left</i></a></li>';
                        } else {
                            echo '<li class="disabled"><a href="#"><i class="material-icons md-48">first_page</i></a></li>
                                  <li class="disabled"><a href="#"><i class="material-icons md-48">chevron_left</i></a></li>';
                        }

                        //perulangan pagging
                        for ($i = 1; $i <= $cpg; $i++) {
                            if ((($i >= $pg - 3) && ($i <= $pg + 3)) || ($i == 1) || ($i == $cpg)) {
                                if ($i == $pg) echo '<li class="active waves-effect waves-dark"><a href="?page=tms&pg='.$i.'"> '.$i.' </a></li>';
                                else echo '<li class="waves-effect waves-dark"><a href="?page=tms&pg='.$i.'"> '.$i.' </a></li>';
                            }
                        }

                        //last and next pagging
                        if($pg < $cpg){
                            $next = $pg + 1;
                            echo '<li><a href="?page=tms&pg='.$next.'"><i class="material-icons md-48">chevron_right</i></a></li>
                                  <li><a href="?page=tms&pg='.$cpg.'"><i class="material-icons md-48">last_page</i></a></li>';
                        } else {
                            echo '<li class="disabled"><a href="#"><i class="material-icons md-48">chevron_right</i></a></li>
                                  <li class="disabled"><a href="#"><i class="material-icons md-48">last_page</i></a></li>';
                        }
                        echo '
                        </ul>';
                    } else {
                        echo '';
                    }
                }
            }
        }
    }
?>
