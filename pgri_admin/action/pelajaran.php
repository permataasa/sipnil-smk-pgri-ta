<?php
require_once "model.php";

class Pelajaran extends Model
{
    
    protected $fields = [
        'kode_pelajaran',
        'pelajaran',
        'kkm'
    ];
    protected $table = 'pelajaran';

}
