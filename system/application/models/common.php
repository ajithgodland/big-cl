<?php
class common extends CI_Model
{
    function header()
    {
       return $this->load->view('admin/header');
    }
    function sidebar()
    {
       return $this->load->view('admin/sidebar');
    }
}
?>