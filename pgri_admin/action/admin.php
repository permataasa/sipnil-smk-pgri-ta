<?php
require_once "model.php";

class Admin extends Model
{
    
    protected $fields = [
        'id_admin',
        'nama_depan',
        'nama_belakang',
        'tempat',
        'tgl_lahir',
        'jenis_kelamin',
        'alamat',
        'password',
        'level_admin'
    ];
    protected $table = 'admin';

}
