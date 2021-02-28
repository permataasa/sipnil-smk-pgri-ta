<?php
require_once "model.php";

class DetailNilai extends Model
{
    
    protected $fields = [
        'id_nilai',
        'nis',
        'nilai'
    ];
    protected $table = 'detail_nilai';
    
}
