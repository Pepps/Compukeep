<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//---@Arthur daniel---\\

class Home extends CI_Controller
{

    function index()
    {

        if ($this->session->userdata('logged_in') == TRUE) {
            
            $email = $this->session->userdata('email');
            echo "Hello! What it goes? ";
            echo $email." ";
            $email1 = $this->session->userdata('access');
            echo $email1;
            echo " ";
            echo "<a href='./Cart'>Cart </a>";
            $this->load->view("logout_view.php");
        }
        else{

            #ladda allt som ska finnas när man inte är inloggad
            #login
            #registration
            
            echo "<a href='./Cart'>Cart</a>  ";
            echo "<a href='./Login'>Login </a>";
            
            #$this->load->view("registration.php");
        }

    }
}
//---@Arthur daniel---\\