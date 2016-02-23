<?php
class category extends CI_Controller
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
            $crud->set_table('catalog_category')
            ->set_subject('Category')
            ->columns('category_id','category_name','url_key','parent_category');
            $crud->add_action('Edit', ''.base_url().'assets/uploads/pencil.png', 'category/editcategory');
            $crud->unset_add();
            $crud->unset_edit();
            $output = $crud->render();
            $this->template->load('adminleft','category',$output);
        }
        else
        {
            $this->template->load('admin','content');
        }
    }
    function add_categories()
    {
        if($this -> ion_auth -> logged_in()==1)
        {
            $this->form_validation->set_rules('cate[category_name]', 'Category Name', 'trim|required|xss_clean|callback_alpha_space_only');
            $this->data['categorylist'] = $this->app->showcats();
            if ($this->form_validation->run() == FALSE)
            {
        	   $this->template->load('form','add_categories',$this->data);
            }
            else
            {       $category           = new app;
                    $common             = new common;
                    $cate               = $this->input->post('cate');
                    $seo                = $this->input->post('seo');
                    $url                = trim($cate['url_key']);
                    $parent_category_id = $cate['parent_category'];
                    if($parent_category_id==0)
                    {
                        $full_url= base_url().$url;
                        $re_url = $url;
                    }
                    else
                    {
                        $level=$category->get_level($parent_category_id);
                        $url_key_id = $category->category_urlkey($parent_category_id,$level);
                        $categories = implode("/", array_map(array($category,'url_key'), explode("/", $url_key_id)));
                        $full_url= base_url().$categories.'/'.$url;
                        $re_url = $categories.'/'.$url;
                    }
                    if($category->check_url($full_url) == '0' or $category->check_url($full_url) == 0)
                    {
                        $cate_tf            = $category->category_insert($cate,'catalog_category'); 
                        $cate_id            = $this->db->insert_id();
                        #Level
                        $parent =   $cate['parent_category'];
                        $lavel  =   $category->get_category_level($cate_id,$parent);
                        $level_data =  array(
                        'category_id' => $cate_id,
                        'level'       => $lavel,
                        );
                        $this->db->insert('category_level', $level_data);
                        $category_level=$category->get_level($cate_id);
                        $url_key=$category->category_urlkey($cate_id,$category_level);
                        #Level End
                        if($cate_tf==1)
                        {
                            $title              = $category->seo_check($seo['title'],$cate['category_name']);
                            $meta_keyword       = $category->seo_check($seo['meta_keyword'],$cate['category_name']);
                            $meta_description   = $category->seo_check($seo['meta_description'],$cate['category_name']);
                            $section            = $seo['section'];
                            #SEO INSERT
                            $data               = array(
                                'title'             =>  $title,
                                'meta_keyword'      =>  $meta_keyword,
                                'meta_description'  =>  $meta_description,
                                'section'           =>  $section,
                                'section_id'        =>  $cate_id,
                                'url_key'           =>  $url_key,
                                'u_key'             =>  $url
                            );
                           $complted= $this->db->insert('seo', $data);
                        }
                        echo 'r';
                    }
                    else
                    {
                        echo '"Url KEY" is already exist. Please choose another one.';
                    }
            }
            
        }
        else
        {
            $this->template->load('admin','content');
        }
    }
    function editcategory()
    {
        $id = $this->uri->segment(3);
        $this->data['categorylist'] = $this->app->showcats();
        $this->app->get_category_data($id);
        if($this -> ion_auth -> logged_in()==1)
        {
            $this->form_validation->set_rules('cate[category_name]', 'Category Name', 'trim|required|xss_clean|callback_alpha_space_only');
            $this->data['categorylist'] = $this->app->showcats();
            $this->data['category'] = $this->app->get_category_data($id);
            $this->data['seo']=$this->app->get_category_seo_data($id);
            if ($this->form_validation->run() == FALSE)
            {
        	   $this->template->load('form','editcategory',$this->data);
            }
            else
            {
                $category           = new app;
                $common             = new common;
                $cate               = $this->input->post('cate');
                $seo                = $this->input->post('seo');
                $url                = trim($cate['url_key']);
                if($category->url_checking($url,$id)==0)
                {
                    $id = $this->input->post('category_id');
                    $level=$category->get_level($id);
                    if($level==1)
                    {
                       $full_url= base_url().$url.'.html';
                    }
                    else
                    {
                        $url_key_id = $category->category_urlkey($id,$level);
                        $re_url_key = substr($url_key_id, 0, -2);
                        $categories = implode("/", array_map(array($category,'url_key'), explode("/", $re_url_key)));
                        $full_url= base_url().$categories.'/'.$url.'.html';
                    }
                    if($category->check_url($full_url) == '0' or $category->check_url($full_url) == 0)
                    {
                        $cate_tf    = $category->category_update($cate,'catalog_category',$id);
                        $cate_id    = $id;
                        $parent     = $cate['parent_category'];
                        $lavel      = $category->get_category_level($cate_id,$parent);
                        $level_data =  array('level' => $lavel);
                        $this->db->where('category_id',$cate_id);
                        $this->db->update('category_level', $level_data);
                        $category_level=$category->get_level($cate_id);
                        $url_key=$category->category_urlkey($cate_id,$category_level);
                        $title              = $category->seo_check($seo['title'],$cate['category_name']);
                        $meta_keyword       = $category->seo_check($seo['meta_keyword'],$cate['category_name']);
                        $meta_description   = $category->seo_check($seo['meta_description'],$cate['category_name']);
                        #SEO INSERT
                        $data               = array
                        (
                            'title'             =>  $title,
                            'meta_keyword'      =>  $meta_keyword,
                            'meta_description'  =>  $meta_description,
                            'url_key'           =>  $url_key,
                            'u_key'             =>  $url
                        );
                        $this->db->where('section_id',$cate_id);
                        $this->db->where('section','category');
                        $this->db->update('seo', $data);
                        //echo 'Category "'.$cate['category_name'].'" successfully updated.';
                    }
                }
                else
                {
                    $cate_tf    = $category->category_update($cate,'catalog_category',$id);
                    $cate_id    = $id;
                    $parent     = $cate['parent_category'];
                    $lavel      = $category->get_category_level($cate_id,$parent);
                    $level_data =  array('level' => $lavel);
                    $this->db->where('category_id',$cate_id);
                    $this->db->update('category_level', $level_data);
                    
                    $category_level=$category->get_level($cate_id);
                    $url_key=$category->category_urlkey($cate_id,$category_level);
                    
                    $title              = $category->seo_check($seo['title'],$cate['category_name']);
                    $meta_keyword       = $category->seo_check($seo['meta_keyword'],$cate['category_name']);
                    $meta_description   = $category->seo_check($seo['meta_description'],$cate['category_name']);
                    #SEO INSERT
                    $data               = array
                    (
                        'title'             =>  $title,
                        'meta_keyword'      =>  $meta_keyword,
                        'meta_description'  =>  $meta_description,
                        'url_key'           =>  $url_key,
                        'u_key'             =>  $url
                    );
                    $this->db->where('section_id',$cate_id);
                    $this->db->where('section','category');
                    $this->db->update('seo', $data);
                    
                }
            }
            if($this->input->post('sav')=='sav')
            {
                echo '<div class="alert alert-success">
                        Category<strong>"'.$cate['category_name'].'"</strong> successfully updated.
                      </div>';
            }
            elseif($this->input->post('go')=='go')
            {
                echo 'r';
            }
        }
        else
        {
            $this->template->load('admin','content');
        }
    }
}
?>