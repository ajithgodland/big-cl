<?php
class user extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('common');
        $this->load->library(array('ion_auth', 'form_validation'));
        $this->load->helper(array('url', 'language'));
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
        $this->lang->load('auth');
        $this->load->model('ion_auth_model');
        $this->load->helper('url');
        $this->load->library('grocery_CRUD');
    }
    function index()
    {
        if($this -> ion_auth -> logged_in()==1)
        {
            $user=new user_model;
            $this->data['categories'] = $user->get_categories();
            $this->template->load('products','user_view',$this->data);
        }
        else
        {
            $this->template->load('admin','content');
        }
    }
    function attributes()
    {
        $user = new user_model;
        $category_id=$this->input->post('category_id');
        $attribute_set=$user->get_attribute_set($category_id);
        $option_set='';
        $result='';
        foreach($attribute_set as $attr):
            $options=$user->attribute_options($attr->attribute_id);
            if($attr->input_type == 5):
                    foreach($options as $opt):
                        $option_set='<option value='.$opt->option_id.'>'.$opt->option_value.'</option>';
                    endforeach;
                $result.='<select name='.$attr->attribute_code.' id='.$attr->attribute_code.'>';
                $result.= $option_set;
                $result.= '</select>';
                endif;
            endforeach;
    }
}