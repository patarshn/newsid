<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Migration_create_users_table extends CI_Migration {
public function up() {

        $query = "CREATE TABLE `users` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `username` varchar(30) NOT NULL,
            `password` varchar(30) NOT NULL,
            `role` varchar(30) NOT NULL,
            `created_by` varchar(30) DEFAULT NULL,
            `created_at` datetime DEFAULT NULL,
            `updated_by` varchar(30) DEFAULT NULL,
            `update_at` datetime DEFAULT NULL,
            PRIMARY KEY (`id`)
        )";

        $this->db->query($query);

    }
    public function down() {
        $this->dbforge->drop_table('users');
    }
}
