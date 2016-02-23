<?php
class dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
		$this->load->model('app');
		$this->load->library(array('ion_auth','form_validation'));
        $this->load->helper(array('url','language'));	
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
        $this->lang->load('auth');
        $this->load->model('ion_auth_model');
        $this->load->model('common');
    }
    function index()
    {
        if($this -> ion_auth -> logged_in()==1)
        {
            $this->template->load('2colum-left','dashboard');
        }
        else
        {
            $this->template->load('admin','content');
        }
    }
}
?>