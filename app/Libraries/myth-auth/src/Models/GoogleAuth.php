<?php

namespace Myth\Auth\Models;

use CodeIgniter\Model;

class GoogleAuth extends Model
{
    protected $table = 'social_login';

    protected $primaryKey = "Id";

    protected $allowedFields = [
        'Id', 'OAuth_Id', 'Email', 'First_Name', 'Last_Name', 'P_Pic'
    ];

    public function __construct()
    {
        $this -> db = \Config\Database::connect();

    }


    /**
     * Checks if user has already signed up
     * 
     * <id> : id to check
     * 
     * @returns [boolean] : True if exist, else false
     */ 

    public function userExist($id) : bool
    {
        echo 'Checking ... ';
        // Checking ...
        $this -> where('OAuth_Id', $id);
        if($this -> countAllResults() == 1)
        {
            return true;
        }else
        {
            return false;
        }
    }




    /**
     * Updates data in the database 
     * 
     * <id> : id of the user whose to update
     * 
     * @returns [boolean] : True if successfully updates, otherwise false
     */

    public function updateUserData(array $data, string $id) : bool
    {
        // updation query
        $this -> set($data) -> where('OAuth_Id', $id) -> update();

        if($this-> db -> affectedRows() == 1)
        {
            return true;

        }else
        {
            return false;

        }
    }




    /**
     * Insert a new User to the database
     * 
     * <data> : Data of the user
     * 
     * @returns [boolean] : True is successfull, False otherwise
     */

    public function setNewUser(array $data)
    {
        // Insert ...
        $this -> insert($data);
        if($this -> affectedRows() == 1)
        {
            return true;
        }else
        {
            return false;
        }
    }
}