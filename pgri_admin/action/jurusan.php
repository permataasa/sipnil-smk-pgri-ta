<?php
require_once "model.php";

class Jurusan extends Model
{
    
    protected $fields = [
        'kode_jurusan',
        'jurusan'
    ];
    protected $table = 'jurusan';
    
}
