<?php 


namespace App\Models;

use CodeIgniter\Model;

class Budgets extends Model
{
    protected $table = "budgets";

    protected $primaryKey = 'Id';

    protected $allowedFields = [
        'Id', 'Budget', 'Spent', 'Duration'
    ];


    /**
     * Retieves all records from database
     * 
     * <id> : record id in table
     * 
     * @returns [Array] : Associative array of records
     */
    public function getRecords(int $id)
    {
        if ($id === false)
        {
            throw new \Exceptions("Could not get information of budgets. Improper identification number. ");   
        }else
        {
            return $this -> asArray()
                         -> where(['Id' => $id])
                         -> first();
        }
    }



    /**
     * load the records into database
     * 
     * <data> : Associative array with key as column names of table
     * 
     * @returns [boolean] : True on success, otherwise false 
     * 
     */
    public function setRecords(iterable $data)
    {
        if($data == false)
        {
            throw new Exception("Could not find data to save. Please try again. ");
        }else
        {
            $this -> insert($data); // insertion query
            return true;
        }
        return false;
    }





    /**
     * Updates the records of an existing records
     * 
     * <data> : Associative array with keys as column names of table
     * 
     * @returns [boolean] : True on success, otherwise false
     */
    public function updateRecords(iterable $data, int $id)
    {
        if($data == false && $id == 0)
        {
            throw new Exception ('Could not find data to update. Please try again. ');
        }else
        {
            $this -> set($data) -> where('Id', $id) -> update();
            return true;
        }
        return false;
    }


    /**
     * Deletes a records in table
     * 
     * <id> : column id to be deleted 
     * 
     * @returns [boolean] : True on success, otherwise False
     */
    public function deleteRecord(int $id)
    {
        if ($id === false)
        {
            // throw exception if id not received
            throw new Exceptions("Error: Could not get identification number. Please try again. ");
            
        }else if($this -> delete(['Id' => $id]))
        {
            return true;
        }
        // return false otherwise
        return false;
    }
}



?>