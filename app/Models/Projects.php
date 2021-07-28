<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\Budgets;



/**
 * 
 * Model Projects dealing with 'projects' database
 * 
 */

class Projects extends Model
{
    protected $table = "projects";
    
    protected $primaryKey = 'Id';

    protected $allowedFields = [
        'Id', 'Name', 'Description', 'Status', 'ClientCompany', 'ProjectLeader', 'Files', 'FileSize'
    ];

    /**
     * will retrieve records from the database 
     * based on the <id> parameter
     */
    public function getRecords($id = false) // Working ... All Okay
    {
        /**
         * Method which will return all the projects details using two conditions
         * - according to the variable 'id' specified as paramater
         * - or all projects will be returned
         */

        if($id === false)
        {
            return $this -> findAll(); // return all projects irrespective of -id-
        }

        // get projects according to -id-
        return $this -> asArray()
                    -> where(['Id' => $id])
                    -> first();
    }


    /**
     * will load the database
     * 
     * <data> : data to be provided
     * 
     */
    public function setRecords($data = false)
    {
        // load the database with data
        if ($data == false)
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
     * will load the database with data
     * 
     * <data> : should be an associative array with key as column name of database
     * <id> : id of the data whose/where to set
     * <files> : boolean value to tell what data to insert
     * 
     * @returns [boolean] : True on success, otherwise false
     * 
     */
    public function updateRecords(iterable $data, int $id, bool $files)// Working ... All Okay
    {
        if($files)
        {
            $olddata = $this -> getRecords($id);
            $oldFiles = $olddata['Files']; // old files
            $oldFileSizes = $olddata['FileSize']; // old file sizes

            unset($olddata); // free the memory

            // converting the recieved array to string
            $files = join(', ', $data['filenames']); 
            $filesizes = join(', ', $data['filesizes']);

            if($oldFiles)
            {
                // joining new files with old ones
                $newfiles = trim($oldFiles) . ', ' . $files;
                $newsizes = trim($oldFileSizes) . ', ' . $filesizes;
            }else
            {
                // joining new files with old ones
                $newfiles = $files;
                $newsizes = $filesizes;
            }
            $data = null; // reset the data variable

            // update variable with new data
            $data = [
                'Files' => $newfiles,
                'FileSize' => $newsizes
            ];
        }
        
        // <data> can be anything - Files or Projects/Budgets
        $this -> set($data) -> where('Id', $id) -> update();
        return true;
        
    }


    

    
    public function deleteProject($id = false) // Working .... All Okay
    {
        /**
         * 
         * Method to delete the project from the database
         * 
         */
        $budgets = new Budgets();
        if($id === false)
        {
            throw new Exceptions("Error: Could not get identification number. Please try again. ");

        }else if ($this -> delete(['Id' => $id]) && $budgets -> deleteRecord($id))
        {
            // returning true if successfully deleted.
            return true;
        }
        // return false otherwise
        return false;

    }

    /**
     * Deleting individual files from local directory
     */
    public function deleteFile($data = false)
    {
        if($data == false)
        {
            throw new Exception("Could not find the name of the file. ");
        }else
        {
            $path = base_url("assets/uploads/" . $id . '/');
            unlink($path . $data);
        }
    }
}



