DROP TABLE det_keluarga;

CREATE TABLE `det_keluarga` (
  `id_keluarga` varchar(20) NOT NULL,
  `no_ktp` varchar(20) NOT NULL,
  KEY `id_warga` (`no_ktp`,`id_keluarga`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;




DROP TABLE keluarga;

CREATE TABLE `keluarga` (
  `id_keluarga` varchar(20) NOT NULL,
  `kepala_keluarga` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `dusun` varchar(30) NOT NULL,
  `rt` varchar(2) DEFAULT NULL,
  `rw` varchar(2) DEFAULT NULL,
  `ekonomi` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_keluarga`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;




DROP TABLE mutasi_warga;

CREATE TABLE `mutasi_warga` (
  `id_mutasi` mediumint(9) NOT NULL AUTO_INCREMENT,
  `id_warga` varchar(20) NOT NULL,
  `jenis_mutasi` varchar(15) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  PRIMARY KEY (`id_mutasi`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;




DROP TABLE surat;

CREATE TABLE `surat` (
  `id_surat` int(8) NOT NULL AUTO_INCREMENT,
  `jenis_surat` varchar(4) NOT NULL,
  `no_surat` varchar(50) NOT NULL,
  `nama_surat` varchar(50) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `isi_surat` text DEFAULT NULL,
  `tanda_tangan` varchar(50) NOT NULL,
  `id_warga` varchar(20) NOT NULL,
  `nama_warga` varchar(50) NOT NULL,
  PRIMARY KEY (`id_surat`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

INSERT INTO surat VALUES("1","SK","470/4/437.105.08/2022","keterangan","0000-00-00","{\"nama\":\"dddd\",\"t_lahir\":\"34\",\"j_kel\":\"l\",\"w_negara\":\"h\",\"pendidikan\":\"h\",\"agama\":\"h\",\"pekerjaan\":\"h\",\"s_nikah\":\"h\",\"no_ktp\":\"55555\",\"alamat\":\"ggggg\",\"ket\":\"ggggg\"}","{\"pejabat\":\"Kaji,S.Pbu\",\"nip\":\"0009.009.34343\"}","33","hhhh");
INSERT INTO surat VALUES("21","SK","470/6/437.105.08/2022","Surat Keterangan ","2022-07-23","{\"nama\":\"f\",\"t_lahir\":\"f\",\"j_kel\":\"l\",\"w_negara\":\"h\",\"pendidikan\":\"h\",\"agama\":\"h\",\"pekerjaan\":\"h\",\"s_nikah\":\"f\",\"no_ktp\":\"dd\",\"alamat\":\"hhh\",\"ket\":\"hhh\"}","{\"pejabat\":\"Tarmin Abdulghani, MT.\",\"nip\":\"0009.00","dd","f");
INSERT INTO surat VALUES("20","SKP","475/1/437.105.08/2022","Surat Keterangan Pindah","2022-07-23","{\"nama\":\"g\",\"t_lahir\":\"g\",\"j_kel\":\"l\",\"w_negara\":\"h\",\"pendidikan\":\"h\",\"agama\":\"h\",\"pekerjaan\":\"h\",\"s_nikah\":\"h\",\"no_ktp\":\"55555\",\"alamat\":\"kk\",\"pindah_ke\":\"kk\",\"alasan\":\"kkk\",\"tgl_pindah\":\"kkk\",\"jum_pengikut\":\"0\"}","{\"pejabat\":\"Tarmin Abdulghani, MT.\",\"nip\":\"0009.00","55555","g");
INSERT INTO surat VALUES("19","SK","470/5/437.105.08/2022","Surat Keterangan ","2022-07-23","{\"nama\":\"g\",\"t_lahir\":\"34\",\"j_kel\":\"l\",\"w_negara\":\"h\",\"pendidikan\":\"h\",\"agama\":\"h\",\"pekerjaan\":\"h\",\"s_nikah\":\"h\",\"no_ktp\":\"f\",\"alamat\":\"g\",\"ket\":\"g\"}","{\"pejabat\":\"Tarmin Abdulghani, MT.\",\"nip\":\"0009.00","f","g");



DROP TABLE tbl_buat_surat;

CREATE TABLE `tbl_buat_surat` (
  `id_surat` int(10) NOT NULL AUTO_INCREMENT,
  `no_urut` int(10) NOT NULL,
  `no_surat` varchar(50) NOT NULL,
  `lampiran` varchar(50) NOT NULL,
  `perihal` varchar(50) NOT NULL,
  `isi` mediumtext NOT NULL,
  `tgl_surat` date NOT NULL,
  `tujuan` varchar(250) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `id_user` tinyint(2) NOT NULL,
  PRIMARY KEY (`id_surat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE tbl_disposisi;

CREATE TABLE `tbl_disposisi` (
  `id_disposisi` int(10) NOT NULL AUTO_INCREMENT,
  `tujuan` varchar(250) NOT NULL,
  `isi_disposisi` mediumtext NOT NULL,
  `sifat` varchar(100) NOT NULL,
  `batas_waktu` date NOT NULL,
  `catatan` varchar(250) NOT NULL,
  `id_surat` int(10) NOT NULL,
  `id_user` tinyint(2) NOT NULL,
  PRIMARY KEY (`id_disposisi`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO tbl_disposisi VALUES("1","Yang berkepentingan","Sehubungan akan diadakannya seminar, maka dari itu diwajibkan untuk membayar","Segera","2022-07-24","ada anggaran yang terlampir","1","1");



DROP TABLE tbl_instansi;

CREATE TABLE `tbl_instansi` (
  `id_instansi` tinyint(1) NOT NULL,
  `institusi` varchar(150) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `status` varchar(150) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `kepsek` varchar(50) NOT NULL,
  `nip` varchar(25) NOT NULL,
  `website` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `logo` varchar(250) NOT NULL,
  `id_user` tinyint(2) NOT NULL,
  PRIMARY KEY (`id_instansi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO tbl_instansi VALUES("1","UNIVERSITAS SURYAKANCANA","FAKULTAS TEKNIK","Terakreditasi B","Jl. Pasir Gede Raya, Bojongherang, Cianjur.","H. Widy Setyawan, Ir., MT.","11234567891112","https://ft.unsur.ac.id/","info@ftunsur.ac.id","logoft.jpg","1");



DROP TABLE tbl_klasifikasi;

CREATE TABLE `tbl_klasifikasi` (
  `id_klasifikasi` int(5) NOT NULL AUTO_INCREMENT,
  `kode` varchar(30) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `uraian` mediumtext NOT NULL,
  `id_user` tinyint(2) NOT NULL,
  PRIMARY KEY (`id_klasifikasi`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO tbl_klasifikasi VALUES("1","01","Pemberitahuan","Surat Pemberitahuan","1");
INSERT INTO tbl_klasifikasi VALUES("2","02","Pengajuan","Surat Pengajuan","1");



DROP TABLE tbl_sett;

CREATE TABLE `tbl_sett` (
  `id_sett` tinyint(1) NOT NULL,
  `surat_masuk` tinyint(2) NOT NULL,
  `surat_keluar` tinyint(2) NOT NULL,
  `buat_surat` tinyint(2) NOT NULL,
  `referensi` tinyint(2) NOT NULL,
  `id_user` tinyint(2) NOT NULL,
  PRIMARY KEY (`id_sett`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO tbl_sett VALUES("1","10","10","10","10","1");



DROP TABLE tbl_surat_keluar;

CREATE TABLE `tbl_surat_keluar` (
  `id_surat` int(10) NOT NULL AUTO_INCREMENT,
  `no_agenda` int(10) NOT NULL,
  `tujuan` varchar(250) NOT NULL,
  `no_surat` varchar(50) NOT NULL,
  `isi` mediumtext NOT NULL,
  `kode` varchar(30) NOT NULL,
  `tgl_surat` date NOT NULL,
  `tgl_catat` date NOT NULL,
  `file` varchar(250) NOT NULL,
  `keterangan` varchar(250) NOT NULL,
  `id_user` tinyint(2) NOT NULL,
  PRIMARY KEY (`id_surat`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO tbl_surat_keluar VALUES("2","1","Rapat","04/ASD/VI/2022","Rapat di aula","01","2022-07-11","2022-07-24","79-contohsurat.png","Dengan diadakannya rapat di aula diharapkan datang sesegera mungkin","1");



DROP TABLE tbl_surat_masuk;

CREATE TABLE `tbl_surat_masuk` (
  `id_surat` int(10) NOT NULL AUTO_INCREMENT,
  `no_agenda` int(10) NOT NULL,
  `no_surat` varchar(50) NOT NULL,
  `asal_surat` varchar(250) NOT NULL,
  `isi` mediumtext NOT NULL,
  `kode` varchar(30) NOT NULL,
  `indeks` varchar(30) NOT NULL,
  `tgl_surat` date NOT NULL,
  `tgl_diterima` date NOT NULL,
  `file` varchar(250) NOT NULL,
  `keterangan` varchar(250) NOT NULL,
  `id_user` tinyint(2) NOT NULL,
  PRIMARY KEY (`id_surat`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO tbl_surat_masuk VALUES("1","1","04/LABTIF/VI/2022","LABORATORIUM","Pembayaran seminar","01","132","2022-06-04","2019-11-22","2810-contohsurat.png","Edaran","1");



DROP TABLE tbl_user;

CREATE TABLE `tbl_user` (
  `id_user` tinyint(2) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(35) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nip` varchar(25) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO tbl_user VALUES("1","admin","21232f297a57a5a743894a0e4a801fc3","Administrator","52654765474","1");
INSERT INTO tbl_user VALUES("2","pengguna","8b097b8a86f9d6a991357d40d3d58634","Username","58647333","3");



DROP TABLE v_detail_warga;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_detail_warga` AS select `a`.`id_keluarga` AS `id_keluarga`,`c`.`no_ktp` AS `no_ktp`,`c`.`nama` AS `nama`,`c`.`agama` AS `agama`,`c`.`t_lahir` AS `t_lahir`,date_format(`c`.`tgl_lahir`,'%d-%m-%Y') AS `tgl_lahir`,if(`c`.`j_kel` = 'L','Laki - laki','Wanita') AS `j_kel`,`c`.`gol_darah` AS `gol_darah`,`c`.`w_negara` AS `w_negara`,`c`.`pendidikan` AS `pendidikan`,`c`.`pekerjaan` AS `pekerjaan`,`c`.`s_nikah` AS `s_nikah`,`a`.`alamat` AS `alamat`,`a`.`rt` AS `rt`,`a`.`rw` AS `rw`,`a`.`dusun` AS `dusun` from ((`keluarga` `a` join `det_keluarga` `b`) join `warga` `c`) where `a`.`id_keluarga` = `b`.`id_keluarga` and `b`.`no_ktp` = `c`.`no_ktp` and `c`.`status` = '1';




DROP TABLE v_mutasi_warga;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_mutasi_warga` AS select `mutasi_warga`.`id_warga` AS `id_warga`,`warga`.`j_kel` AS `j_kel`,`mutasi_warga`.`jenis_mutasi` AS `jenis_mutasi`,date_format(`mutasi_warga`.`tanggal`,'%m-%Y') AS `periode`,`mutasi_warga`.`keterangan` AS `keterangan` from (`mutasi_warga` join `warga` on(`warga`.`no_ktp` = `mutasi_warga`.`id_warga`));




DROP TABLE warga;

CREATE TABLE `warga` (
  `no_ktp` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `t_lahir` varchar(20) NOT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `j_kel` enum('L','W') NOT NULL,
  `gol_darah` varchar(2) NOT NULL,
  `w_negara` varchar(20) NOT NULL,
  `pendidikan` varchar(10) DEFAULT NULL,
  `pekerjaan` varchar(30) NOT NULL,
  `s_nikah` varchar(20) DEFAULT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1',
  PRIMARY KEY (`no_ktp`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;




