<?php
class attribut extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
		$this->load->model('app');
        $this->load->model('common');
		$this->load->library(array('ion_auth','form_validation'));
        $this->load->helper(array('url','language'));	
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
            $crud = new grocery_CRUD();
            $crud->set_table('attributes')
            ->set_subject('Attributes');
            $crud->add_action('Edit', ''.base_url().'assets/uploads/pencil.png', 'attribut/edit_attribute');
            $crud->unset_add();
            $crud->unset_edit();
            $output = $crud->render();
            $this->template->load('adminleft','attribut',$output);
        }
        else
        {
            $this->template->load('admin','content');
        }
    }
    function add_attribut()
    {
        if($this -> ion_auth -> logged_in()==1)
        {
            $this->form_validation->set_rules('attr[attribute_code]', 'Attribute Code', 'required');
            $this->form_validation->set_rules('attr[label]', 'Label', 'required');
            if ($this->form_validation->run() == FALSE)
            {
        	   $this->template->load('form','add_attribut');
            }
            else
            {
                $attributes = $this->input->post('attr');
                $option     = $this->input->post('option');
                $insert     = $this->app->attribute_insert($attributes);
                $attribute_id = $this->db->insert_id();
                if($insert==1)
                {
                    $this->app->attribute_options_insert($option,$attribute_id);
                }
            }
            
        }
        else
        {
            $this->template->load('admin','content');
        }
    }
    function edit_attribute()
    {
        if($this -> ion_auth -> logged_in()==1)
        {
            $this->data['attrubute'] = $this->app->attribute_data($this->uri->segment(3));
            $this->data['options'] = $this->app->get_attributes_options($this->uri->segment(3));
            $this->form_validation->set_rules('attr[label]', 'Label', 'required');
            if ($this->form_validation->run() == FALSE)
            {
        	   $this->template->load('form','edit_attribute',$this->data);
            }
            else
            {
                $attributes = $this->input->post('attr');
                $option     = $this->input->post('option');
                $update     = $this->app->attribute_update($attributes,$this->input->post('attribute_id'));
                $this->app->attribute_options_update($option,$this->input->post('attribute_id'));
                if($this->input->post('sav')=='sav')
                {
                    echo 'r';
                }
                else
                {
                    echo '<div class="alert alert-success">
                        Attribute<strong>"'.$attributes['label'].'"</strong> successfully updated.
                      </div>';
                }
            }
            
        }
        else
        {
            $this->template->load('admin','content');
        }
    }
    function add_attribut_set()
    {
        
        if($this -> ion_auth -> logged_in()==1)
        {
            $this->data['attributes'] = $this->app->get_all_attributes();
            $this->form_validation->set_rules('attr[attribute_code]', 'Attribute Code', 'required');
            $this->form_validation->set_rules('attr[label]', 'Label', 'required');
            if ($this->form_validation->run() == FALSE)
            {
        	   $this->template->load('form','add_attribut_set',$this->data);
            }
            else
            {
                $attributes = $this->input->post('attr');
                $option     = $this->input->post('option');
                $insert     = $this->app->attribute_insert($attributes);
                $attribute_id = $this->db->insert_id();
                if($insert==1)
                {
                    $this->app->attribute_options_insert($option,$attribute_id);
                }
            }
            
        }
        else
        {
            $this->template->load('admin','content');
        }
    }
    function save_attributeset()
    {
        $app= new app;
        $attributes=$this->input->post('attributes');
        $attribute_name=$this->input->post('attribute_name');
        for ($i = 0; $i < count($attributes); $i++)
        {
            $data=array(
                'attribute_set_name' => $attribute_name,
                'attributes' => $attributes[$i]
            );
            $app->common_insert('attribute_set',$data);
        }

    }
}
?>