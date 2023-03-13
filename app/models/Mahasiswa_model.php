<?php

class Mahasiswa_model{

    private $table = 'siswa';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllMahasiswa()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getMahasiswaById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }   

    public function tambahDataMahasiswa($data)
    {                     //nama tabel
        $query = "INSERT INTO siswa VALUES('', :nama, :nisn, :email, :jurusan)";
        
        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('nisn', $data['nisn']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('jurusan', $data['jurusan']);

        $this->db->execute();

        return $this->db->rowCount();
    }
}
    