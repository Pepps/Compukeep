<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//---@Arthur daniel---\\

class Cart extends CI_Controller
{

    function index()
    {
        $this->load->library('cart');
        session_start();
    }
    function Insertpart()
    {
        session_start();
        //hämtar information ifrån databasen.
        $data = $this->load->model("SaveCartModel");
        $data = $this->SaveCartModel->InsertPart();
        //en räknare som håller koll på hur många varor som ska in i carten.
        $count = count($data);
        //en loop som sätter in del för del.
        for ($i=0; $i < $count; $i++) { 
            $insertpart = array(

               'id'      => "$data[$i]",
               'qty'     => 1,
               'price'   => 3.00,
               'name'    => "$data[$i]",
               'options' => array('typ' => 'optional')
            );
            $this->cart->insert($insertpart);
        }
        
        redirect(base_url('components'));
    


    }
    function UpdateCart()
    {
        $this->load->library('cart');

        //updaterar hur många delar man vill ha av en specifik del.
        if ($this->input->post('update_cart'))
        {
            unset($_POST['update_cart']);
            $contents = $this->input->post();
        
        foreach ($contents as $content)
        {
            $info = array(
           'rowid' => $content['rowid'],
           'qty'   => $content['qty']
             );

            $this->cart->update($info);

        }
        }   

        redirect(base_url('components'));
    }
    function SaveCart()
    {
        //spara bygget
        $data = $this->load->model("SaveCartModel");
        $data = $this->SaveCartModel->SaveBuild();
        redirect(base_url('components'));

    }
    function DeleteCart()
    {
        //tar bort bygget
        $this->load->library('cart');
        $this->cart->destroy();
        session_start();
        session_destroy();
        redirect(base_url('components'));
    }
}
//---@Arthur daniel---\\