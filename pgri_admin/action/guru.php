<?php
require_once "model.php";

class Guru extends Model
{
    
    protected $fields = [
        'kode_guru',
        'nuptk',
        'nama_depan',
        'nama_belakang',
        'tempat',
        'tgl_lahir',
        'jenis_kelamin',
        'alamat',
        'password'
    ];
    protected $table = 'guru';
    
}
