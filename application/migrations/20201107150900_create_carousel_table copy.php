<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Migration_create_carousel_table extends CI_Migration {
public function up() {

        $query = "CREATE TABLE `carousel` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `image` varchar(100) DEFAULT NULL,
            `title` varchar(255) NOT NULL,
            `description` varchar(255) NOT NULL,
            `created_at` datetime DEFAULT NULL,
            `created_by` int(3) DEFAULT NULL,
            `updated_at` datetime DEFAULT NULL,
            `updated_by` int(3) DEFAULT NULL,
            PRIMARY KEY (`id`)
        )";

        $this->db->query($query);

    }
    public function down() {
        $this->dbforge->drop_table('carousel');
    }
}
