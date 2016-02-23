<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class admin extends CI_Controller 
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
     }
     function index() 
     { 
         if ($this -> ion_auth -> logged_in())  
         { 
             if ($this->ion_auth->in_group('admin')) 
             { 
                redirect('dashboard'); 
             } 
             else if($this->ion_auth->in_group('user'))  
             { 
                redirect('login/user_panel');  
             }     
         } 
         else 
         { 
             $this->template->load('admin','content');
         }     
     }
     function admin_login() 
     { 
         $username=$this->input->post('username'); 
         $password=$this->input->post('password'); 
         $res=$this->ion_auth->login($username,$password); 
         if($res) 
         { 
             if($this->ion_auth->in_group('admin')) 
             { 
                 $user=$this->session->all_userdata(); 
                 $name=$this->ion_auth->user()->row(); 
                 echo 'r';
             } 
             elseif($this->ion_auth->in_group('user')) 
             { 
                 $user=$this->session->all_userdata(); 
                 $name=$this->ion_auth->user()->row(); 
                 echo 'r';
             } 
         } 
         else
         {
            echo '<div class="alert alert-danger" role="alert">Invalid Username or Password</div';
         }
     }
     function logout()
	 {
		$this->data['title'] = "Logout";

		// log the user out
		$logout = $this->ion_auth->logout();

		// redirect them to the login page
		$this->session->set_flashdata('message', $this->ion_auth->messages());
		redirect('admin');
	 }
     function change_password()
     {
        if($this -> ion_auth -> logged_in()==1)
        {
            $this->form_validation->set_rules('old', $this->lang->line('change_password_validation_old_password_label'), 'required');
		    $this->form_validation->set_rules('new', $this->lang->line('change_password_validation_new_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[new_confirm]');
            $this->form_validation->set_rules('new_confirm', $this->lang->line('change_password_validation_new_password_confirm_label'), 'required');
            if ($this->form_validation->run() == false)
            {
                $this->template->load('adminleft','change_password');
            }
            else
            {
                $identity = $this->session->userdata('identity');
    			$change = $this->ion_auth->change_password($identity, $this->input->post('old'), $this->input->post('new'));
    			if ($change)
    			{
    				//if the password was successfully changed
    				$this->session->set_flashdata('message', $this->ion_auth->messages());
    				$this->logout();
    			}
    			else
    			{
    				$this->session->set_flashdata('message', $this->ion_auth->errors());
    				redirect('admin/change_password', 'refresh');
    			}
            }
            
        }
        else
        {
            $this->template->load('admin','content');
        }
     }
     function create_user()
     {
        if($this -> ion_auth -> logged_in()==1)
        {
            $this->template->load('adminleft','create_user');
        }
        else
        {
            $this->template->load('admin','content');
        }
     }
}
?>