<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//---@Arthur daniel---\\

class Logout extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //this condition checks the existence of session if user is not accessing  
        //login method as it can be accessed without user session
        if( !$this->session->userdata('logged_in') == TRUE) {
            //redirect('/Home'); 
        }
    }

    function index()
    {
        #tar bort sessionen.
        $this->session->userdata = array();
        $this->session->sess_destroy();
        redirect(base_url('components'));
    }
}
//---@Arthur daniel---\\
