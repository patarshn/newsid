<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Migration_create_data_kependudukan_table extends CI_Migration {
public function up() {

        $query = "CREATE TABLE `data_kependudukan` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `nkk` varchar(20) DEFAULT NULL,
            `nik` varchar(20) DEFAULT NULL,
            `nama` varchar(100) DEFAULT NULL,
            `tempat_lahir` varchar(100) DEFAULT NULL,
            `tanggal_lahir` date DEFAULT NULL,
            `jenis_kelamin` varchar(10) DEFAULT NULL,
            `agama` varchar(20) DEFAULT NULL,
            `pekerjaan` varchar(100) DEFAULT NULL,
            `pendidikan` varchar(100) DEFAULT NULL,
            `status_perkawinan` varchar(20) DEFAULT NULL,
            `alamat` varchar(100) DEFAULT NULL,
            `rt` int(3) DEFAULT NULL,
            `rw` int(3) DEFAULT NULL,
            `created_at` datetime DEFAULT current_timestamp(),
            `created_by` int(11) DEFAULT NULL,
            `updated_at` datetime DEFAULT current_timestamp(),
            `updated_by` int(11) DEFAULT NULL,
            PRIMARY KEY (`id`),
            UNIQUE KEY `nik` (`nik`)
        )";

        $this->db->query($query);

    }
    public function down() {
        $this->dbforge->drop_table('carousel');
    }
}
