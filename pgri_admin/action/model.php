<?php
class Model
{
    
    protected $db;
    protected $error;
    protected $fields = [];
    protected $table;

    function __construct($db_connect){

        $this->db = $db_connect;

    }

    public function getAll()
    {
        
        try {

            $getData = $this->db->query('SELECT ' . implode(',' , $this->fields) . ' FROM ' . $this->table);

            $getData->execute();

            $data = $getData->fetchAll();

            return $data;

        } catch (PDOException $e) {
            
            $this->error = $e->getMessage();

            return false;

        }

    }

    public function getById($fieldname, $record)
    {
        
        try {
            
            $getDataById = $this->db->query('SELECT ' . implode(',' , $this->fields) . ' FROM ' . $this->table . ' WHERE ' . $fieldname . ' = "' . $record . '"');

            $getDataById->execute();

            $data = $getDataById->fetch();

            return $data;

        } catch (PDOException $e) {
            
            $this->error = $e->getMessage();

            return false;

        }
    }

    public function getByCondition(array $fieldname, array $record)
    {
        
        try {

            $condition = $this->param($fieldname, $record);

            $getByCondition = $this->db->query("SELECT " . implode(',', $this->fields) . " FROM " . $this->table . " WHERE " . implode(' AND ', $condition));

            $getByCondition->execute();

            $data = $getByCondition->fetchAll();

            return $data;
            
        } catch (PDOException $e) {
            
            $this->error = $e->getMessage();

            return false;

        }

        
    }

    public function inputData(array $data)
    {
        
        try {

            $fields = implode(',', $this->fields);
    
            $parameter = $this->serializeData($data);
    
            $keys = implode(',', array_keys($parameter));
    
            $inputData = $this->db->prepare('INSERT INTO ' . $this->table . '(' . $fields . ') VALUES (' . $keys . ')');
    
            $inputData->execute($parameter);

            return true;

        } catch (PDOException $e) {
            
            $this->error = $e->getMessage();

            return false;

        }

    }

    public function updateData(array $newValue, array $fields, array $record)
    {
        
        try {
            
            $newRecord = $this->param($this->fields, $newValue);
            $condition = $this->param($fields, $record);
            
            $updateData = $this->db->query('UPDATE ' . $this->table . ' SET ' . implode(',', $newRecord) . ' WHERE ' . implode(' AND ', $condition));

            $updateData->execute();

            return true;

        } catch (PDOException $e) {
            
            $this->error = $e->getMessage();

            return false;

        }
    }

    public function updateByCondition(array $fieldName, array $newValue, array $fieldCondition, array $recordCondition)
    {
        
        try {
            
            $dataSetUpdate = $this->param($fieldName, $newValue);
            $dataUpdateCondition = $this->param($fieldCondition, $recordCondition);

            $updateByCondition = $this->db->query('UPDATE ' . $this->table . ' SET ' . implode(', ', $dataSetUpdate) . ' WHERE ' . implode(' AND ', $dataUpdateCondition));

            $updateByCondition->execute();

            return true;
            
        } catch (PDOException $e) {
            
            $this->error = $e->getMessage();

            return false;
        }

    }

    public function deleteData(array $fields, array $record)
    {
        
        try {
            
            $condition = $this->param($fields, $record);

            $deleteData = $this->db->query('DELETE FROM ' . $this->table . ' WHERE ' . implode(' AND ', $condition));

            $deleteData->execute();

            return true;

        } catch (PDOException $e) {
            
            $this->error = $e->getMessage();

            return false;

        }

    }

    public function sumData($fieldname, array $fields, array $record)
    {
        
        try {
            
            $condition = $this->param($fields, $record);

            $sumData = $this->db->query("SELECT SUM(" . $fieldname . ") AS $fieldname FROM " . $this->table . " WHERE " . implode(' AND ', $condition));

            $sumData->execute();

            $data = $sumData->fetch();

            return $data;


        } catch (PDOException $e) {
            
            $this->error = $e->getMessage();

            return false;
            
        }

    }

    public function countData($fieldname, array $fields, array $record)
    {
        
        try {
            
            $condition = $this->param($fields, $record);

            $countData = $this->db->query("SELECT COUNT(" . $fieldname . ") AS $fieldname FROM " . $this->table . " WHERE " . implode(' AND ', $condition));

            $countData->execute();

            $data = $countData->fetch();

            return $data;

        } catch (PDOException $e) {
            
            $this->error = $e->getMessage();

            return false;

        }
    }

    public function serializeData(array $data)
    {
        
        $param = [];

        foreach ($data as $key => $value) {
            
            $param[':' . $key] = $value;

        }

        return $param;
    }

    public function param(array $fields, array $record)
    {
        
        $param = [];

        foreach ($fields as $key => $value) {
            
            $param[$key] = $value . " = '" . $record[$key] . "'";

        }

        return $param;
    }

    public function getLastError()
    {

        $lastError = $this->error;

        return $lastError;

    }

}
