<?php
    class Koneksi{
        private $server = "localhost";
        private $username = "id6085205_mahasiswa";
        private $password = "blackmarket";
        private $db = "id6085205_data_mahasiswa";

        function getKoneksi(){
            return new mysqli($this->server, $this->username, $this->password, $this->db);
        }

    }
    
    
?>