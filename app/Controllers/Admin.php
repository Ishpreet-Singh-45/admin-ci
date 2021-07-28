<?php

namespace App\Controllers;


use App\Controllers\BaseController;

use App\Models\Projects;
use App\Models\Budgets;



/**
 * 
 * Admin class provides helper function to every page of the project which is dealing 
 * with the database. 
 * 
 */

class Admin extends BaseController
{
    /**
     * 
     * ------------------  Default Index Method  -------------
     * 
     * Displays all the projects in the database.
     * 
     * The Entry point of task
     * 
     */
    public function index() // Working ... All Okay!
    {
        $session = \Config\Services::session();

        if(! (logged_in() || $session -> has('user'))) // check if user is logged in via google or signing up
        {
            return redirect() -> to(base_url('/login'));

        }else
        {
            $projects = new Projects();
            return view('Projects/projects', array(
                'meta_title' => "Projects",
                'page_title' => "All Projects under Admin Control",
                'details' => $projects -> getRecords(),
                'user' => user() -> username ?? ($session -> get('user'))['First_Name']
            ));
        }
    }

    /**
     * 
     * Method inserts a new project into the database based on the request method
     * 
     */
    public function create() // Working... All Okay!
    {
        $session = \Config\Services::session();

        if(! (logged_in() || $session -> has('user')) )
        {
            // redirect if user not logged in
            return redirect() -> to(base_url('/login'));
        }else
        {
            $projects = new Projects();
            $budgets = new Budgets();

            if($this -> request -> getMethod() == 'post')
            {
                // gather all the data from request
                $projectData = [
                    'Name' => $this -> request -> getPost('inputName'),
                    'Description' => $this -> request -> getPost('inputDescription'),
                    'Status' => $this -> request -> getPost('inputStatus'),
                    'ClientCompany' => $this -> request -> getPost('inputClientCompany'),
                    'ProjectLeader' => $this -> request -> getPost('inputProjectLeader')
                ];

                $budgetData = [
                    'Budget' => $this -> request -> getPost('inputEstimatedBudget'),
                    'Spent' => $this -> request -> getPost('inputTotalSpent'),
                    'Duration' => $this -> request -> getPost('inputEstimatedDuration')
                ];

                if($this -> validate('create'))
                {
                    // valid data will be entered into the database
                    if($projects -> setRecords($projectData) && $budgets -> setRecords($budgetData))
                    {
                        // return success
                        return view('ProjectMessages/success', array(
                            'title' => "Awesome! Your Records are successfully saved. ",
                            'redirect' => 'localhost' . PROJECTS
                        ));
                    }
                }else
                {
                    // invalid data will show errors on page
                    return view('Projects/createNew', array(
                        'meta_title' => "Admin | Add New Project",
                        'page_title' => "Project Add New",
                        'validation' => $this -> validator
                    ));
                }
            }

            // default view to display on no request
            return view('Projects/createNew', array(
                'meta_title' => "Admin | Add New Project",
                'page_title' => "Project Add New"
            ));
        }
    }


    /**
     * Method performs two functions based on id parameter
     * - showing the previously saved records 
     * - saving the records 
     */
    public function edit($id) // Working .... All Okay!
    {
        $session = \Config\Services::session();

        if(! (logged_in() || $session -> has('user')) )
        {
            return rediredt() -> to(base_url('/login'));
        }else
        {
            $projects = new Projects();
            $budgets = new Budgets();

            // Part - 1 -> SAVE All Records excluding files which will already be saved   
            // ############################################################

            // save the model if any edition done
            if($this -> request -> getMethod() == 'post')
            {
                if($this -> validate('edit'))
                {
                    // query is still to be build - add the id parameter in saving the records 
                    // Add the Update command here

                    $projectData = [
                            'Name' => $this -> request -> getPost('inputName'),
                            'Description' => $this -> request -> getPost('inputDescription'),
                            'Status' => $this -> request -> getPost('inputStatus'),
                            'ClientCompany' => $this -> request -> getPost('inputClientCompany'),
                            'ProjectLeader' => $this -> request -> getPost('inputProjectLeader')
                    ];

                    $budgetData = [
                            'Budget' => $this -> request -> getPost('inputEstimatedBudget'),
                            'Spent' => $this -> request -> getPost('inputTotalSpent'),
                            'Duration' => $this -> request -> getPost('inputEstimatedDuration')
                    ];

                
                    if($projects -> updateRecords($projectData, $id, false) && $budgets -> updateRecords($budgetData, $id))
                    {
                        // and show the success message
                        return redirect() -> route('index_page');
                    }
                }
            }
            // end of Saving records part


            // Part - 2 -> SHOW Previous Records
            // ########################################################################################

            
            // get the previous values from our records
            $data['projectDetails'] = $projects -> getRecords($id);
            $data['budgetDetails'] = $budgets -> getRecords($id);

            // if the data isn't found in our records, throw an Exception
            if(empty($data['projectDetails']))
            {
                throw new \CodeIgniter\Exceptions\PageNotFoundException('Connot find item with data provided. Please try again. ');
            }

            // else divide the data and pass it to the view file
            $formData = [
                // Project Details
                'id' => $data['projectDetails']['Id'],
                'name' => $data['projectDetails']['Name'],
                'desc' => $data['projectDetails']['Description'],
                'status' => $data['projectDetails']['Status'],
                'client' => $data['projectDetails']['ClientCompany'],
                'leader' => $data['projectDetails']['ProjectLeader'],
                'files' => $data['projectDetails']['Files'],
                'fileSize' => $data['projectDetails']['FileSize'],
                // Budget Details
                'budget' => $data['budgetDetails']['Budget'],
                'spent' => $data['budgetDetails']['Spent'],
                'duration' => $data['budgetDetails']['Duration']
            ];

            return view('Projects/projectEdit', array(
                'formData' => $formData,
                'meta_title' => "Project | Edit Records",
                'page_title' => "Project Edit"
            ));
        } 
    }


    /**
     * 
     * Method provides functionality to view the project records and progress
     * 
     */

    public function view($id) // Working .... All Okay!
    {
        $session = \Config\Services::session();

        if(! (logged_in() || $session -> has('user')) )
        {
            return redirect() -> to(base_url('/login'));
        }else
        {
            $projects = new Projects();
            $budgets = new Budgets();
            
            $data['projectDetails'] = $projects -> getRecords($id);
            $data['budgetDetails'] = $budgets -> getRecords($id);

            if(empty($data['projectDetails']))
            {
                throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find the item with data provided. Please try again. ');
            }
            $formData = [
                // Project Details
                'id' => $data['projectDetails']['Id'],
                'name' => $data['projectDetails']['Name'],
                'desc' => $data['projectDetails']['Description'],
                'status' => $data['projectDetails']['Status'],
                'client' => $data['projectDetails']['ClientCompany'],
                'leader' => $data['projectDetails']['ProjectLeader'],
                'files' => $data['projectDetails']['Files'],
                'fileSize' => $data['projectDetails']['FileSize'],
                // Budget Details
                'budget' => $data['budgetDetails']['Budget'],
                'spent' => $data['budgetDetails']['Spent'],
                'duration' => $data['budgetDetails']['Duration']
            ];
            return view('Projects/projectDetail', array(
                'formData' => $formData,
                'meta_title' => "Project | View Records",
                'page_title' => "Project Details"
            ));
        }
    }



    

    /**
     * 
     * Method to upload file names in database and files to server
     * 
     * Pseudo Code :
     * - if post request is received, gather the post data - files and Id
     * - divide the filenames and sizes into different arrays
     * - push the files into server uploads folder 
     * - and enter names and sizes into database
     * 
     */
    public function FileUpload($id)
    {
        $session = \Config\Services::session();

        if(! (logged_in() || $session -> has('user')) )
        {
            return redirect() -> to(base_url('/login'));
        }else
        {
            $projects = new Projects();


            if($this -> request -> getMethod() == 'post')
            {
                $filesArray = $this -> request -> getFiles()['files']; // getting files array from the request
                $id = $this -> request -> getPost('uri_id');


                $filenames = $filesizes = array(); // arrays for storing in database


                // looping through every file one by one 
                foreach($filesArray as $file)
                {
                    // file moved or is it valid ??
                    if($file -> isValid() && !$file -> hasMoved())
                    {

                        // Indexed array of filenames
                        array_push($filenames, $file -> getClientName());

                        // Indexed array of filesizes
                        array_push($filesizes, $file -> getSize());

                        // storing file in 'public/assets/uploads/id' path on server
                        $path = "assets/uploads/" . $id . '/';
                        $file -> move($path, $file -> getClientName());

                    }else
                    {
                        // throw exception if file is not valid or has been moved
                        throw new RuntimeException($file -> getErrorString() . '(' . $file -> getError() . ')');
                    }
                }
                
                // saving records into database and return to edit page
                if($projects -> updateRecords(array(
                    'filenames' => $filenames,
                    'filesizes' => $filesizes
                ), $id, true))
                {                    
                    return redirect() -> route('edit_page', array($id)); // loading edit page with new content
                }
            }else
            {
                // default view to be loaded before post request
                return view('Projects/file_upload', array(
                    'id' => $id,
                    'meta_title' => 'File Upload'
                ));
            }
        }
    }


    /**
     * 
     * Method will delete the whole project 
     * based on the <id> parameter.
     * 
     */
    public function deleteProject($name, $id) // Working ... All Okay!
    {
        $session = \Config\Services::session();

        if(! (logged_in() || $session -> has('user')) )
        {
            return redirect() -> to(base_url('/login'));
        }else
        {
            $projects = new Projects();

            if($this -> request -> getMethod() == 'post' && $id)
            {
                // write below the query to delete the whole project
                if($projects -> deleteProject($id))
                {
                    // delete the files from directory
                    $this -> deleteFiles($name, $id);

                    // success view to display after proj deletion
                    return redirect() -> route('index_page');
                }
            }
            echo view('Projects/projectDelete', array(
                'projectName' => $name,
                'projectDesc' => $projects -> select('Description') -> asArray() -> where('Id', $id) -> first()['Description']
            ));
        }
        

    }


    /**
     * 
     * Delete the whole directory of a particular file
     * 
     * <target> : file/directory to be deleted
     * 
     * 
     */
    public function deleteFiles(string $target, $id = false, $file = false) // Working ... All Okay!
    {
        $target = str_replace('\\', '/', APPPATH) . '../public/assets/uploads/' . $target;
        if(is_dir($target))
        {
            $files = glob($target . '*', GLOB_MARK); // GLOB_MARK will add a slash to directories returned
            // print_r($files);
            foreach($files as $file)
            {
                $this -> deleteFiles($file);
            }
        }else if(is_file($target))
        {
            unlink($target);
        }
        // reload the page if request is from edit page
        if($file)
        {
            return redirect() -> route('edit_page');
        }
    }
}


?>