<?php
require_once "model.php";

class Kelas extends Model
{
    
    protected $fields = [
        'kode_kelas',
        'tingkat',
        'kelas',
        'kode_guru'
    ];
    protected $table = 'kelas';
    
}
