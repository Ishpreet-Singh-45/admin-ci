<?php

namespace App\Controllers;

// include(APPPATH . 'Libraries\facebook\src\facebook.php');

// use App\Libraries\facebook\src\facebook;

/**
 * OAuth is a file to fulfill the users wish to login via Facebook
 * 
 * 
 */

class FB_Auth extends BaseController
{
    public $user = "";

    public function __construct()
    {
        parent::__construct();

        $facebook = new Facebook();

        // get this users information
        $this -> user_data = $this -> facebook -> getUser();

        
    }

    public function auth()
    {
        // store user information and proceed to profile page
        if($this -> user_data)
        {
            $data['user_profile'] = $this -> facebook -> api('/me/');

            // get logout url of facebook
            $data['logouturl'] = $this -> facebook -> getLogoutUrl(array(
                'next' => base_url() . 'oauth/logout'
            ));

            // sent data to profile page
            return view('profile', $data);
        }else
        {
            // stores users facebook login url
            $data['login_url'] = $this -> facebook -> getloginUrl();

            return view('login', $data);

        }
    }

        // logout from facebook
    public function logout()
    {
        session_destroy();

        redirect(base_url()); // redirect to login page
    }





}