CREATE TABLE `buku_peraturan_desa` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `jenis_peraturan_desa` varchar(255) DEFAULT NULL,
 `no_dan_tgl_ditetapkan` varchar(255) DEFAULT NULL,
 `tentang` varchar(255) DEFAULT NULL,
 `uraian_singkat` varchar(255) DEFAULT NULL,
 `tgl_kesepakatan_peraturan_desa` date DEFAULT NULL,
 `no_dan_tgl_dilaporkan` varchar(255) DEFAULT NULL,
 `no_dan_tgl_diundangkan_dalam_lembaran_desa` varchar(255) DEFAULT NULL,
 `no_dan_tgl_diundangkan_dalam_berita_desa` varchar(255) DEFAULT NULL,
 `ket` varchar(255) DEFAULT NULL,
 `created_at` datetime DEFAULT NULL,
 `created_by` varchar(255) DEFAULT NULL,
 `updated_at` datetime DEFAULT NULL,
 `updated_by` varchar(255) DEFAULT NULL,
 `verif_lurah` varchar(20) DEFAULT NULL,
 `verif_lurah_at` datetime DEFAULT NULL,
 `berkas` varchar(255) DEFAULT NULL,
 PRIMARY KEY (`id`)
);

CREATE TABLE `buku_keputusan_kepala_desa` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `no_tgl_keputusan_kepala_desa` varchar(255) DEFAULT NULL,
 `tentang` varchar(255) DEFAULT NULL,
 `uraian_singkat` varchar(255) DEFAULT NULL,
 `no_tgl_dilaporkan` varchar(255) DEFAULT NULL,
 `ket` varchar(255) DEFAULT NULL,
 PRIMARY KEY (`id`)
);

CREATE TABLE `buku_aparat_pemerintah_desa` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `nama` varchar(255) DEFAULT NULL,
 `niap` varchar(255) DEFAULT NULL,
 `nip` varchar(255) DEFAULT NULL,
 `jenis_kelamin` varchar(255) DEFAULT NULL,
 `ttl` varchar(255) DEFAULT NULL,
 `agama` varchar(255) DEFAULT NULL,
 `pangkat_golongan` varchar(255) DEFAULT NULL,
 `jabatan` varchar(255) DEFAULT NULL,
 `pendidikan_terakhir` varchar(255) DEFAULT NULL,
 `no_tgl_keputusan_pengangkatan` varchar(255) DEFAULT NULL,
 `no_tgl_keputusan_pemberhentian` varchar(255) DEFAULT NULL,
 `ket` varchar(255) DEFAULT NULL,
 PRIMARY KEY (`id`)
);

