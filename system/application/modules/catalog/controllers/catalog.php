<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class catalog extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('email');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('common');
        //  error_reporting(0);
        $this->load->model('admin_model');
        $this->load->library('ion_auth');
        session_start();
        date_default_timezone_set('Asia/Calcutta');
        if (!$this->ion_auth->is_admin()) {
            redirect('secureadmin/index');
        }
        if ($this->ion_auth->logged_in()) {
            //$this->mydata['log_details'] = $this->ion_auth->get_user();
        }
    }
    function addcountry()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('location', 'Country', 'required|trim|callback_handle_country_name');
        if ($this->form_validation->run() == FALSE) {
            $this->template->load('adminproducts', 'add_country', '');
        } else {
            $this->admin_model->insertcountry();
            $this->session->set_flashdata('message', "Added Successfully!..");
            redirect('catalog/addcountry/');
        }
    }
    function addcountry2()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('location', 'Country', 'required|trim');
        if ($this->form_validation->run() == FALSE) {
            // $this->template->load('admin', 'add_country', '');
        } else {
            $this->admin_model->insertcountry();
            //$this->session->set_flashdata('message', "Added Successfully!..");
            //redirect('catalog/addcountry/');
        }
    }
    function handle_country_name()
    {
        $ret = $this->admin_model->select_country_name();
        if ($ret) {
            $this->form_validation->set_message('handle_country_name', 'This Name Is Already Exist!..');
            return FALSE;
        } else {
            return TRUE;
        }
    }
    function handle_country_name1()
    {
        $ret = $this->admin_model->select_country_name1();
        if ($ret) {
            $this->form_validation->set_message('handle_country_name1', 'This Name Is Already Exist!..');
            return FALSE;
        } else {
            return TRUE;
        }
    }
    function viewcountry($status = 0, $search = 0, $page_position = 0)
    {
        $this->load->library('pagination');
        $config['base_url'] = base_url() . 'catalog/viewcountry/' . $status . '/' . $search;
        $config['total_rows'] = $this->admin_model->count_all_country();
        $config['per_page'] = '20';
        $config['num_links'] = 5;
        $config['uri_segment'] = 5;
        $config['prev_link'] = ' Previous';
        $config['prev_tag_open'] = '';
        $config['prev_tag_close'] = '';
        $config['next_link'] = ' Next';
        $config['next_tag_open'] = '';
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $data['values'] = $this->admin_model->list_country($config['per_page'], $page_position);
        $data['page_position'] = $page_position;
        $this->template->load('adminproducts', 'viewcountry', $data);
    }
    function editcountry($id)
    {
        $data['value'] = $this->admin_model->GetByRow('tb_country', $id, 'id');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('location', 'Country', 'required|trim|callback_handle_country_name1');
        if ($this->form_validation->run() == FALSE) {
            $this->template->load('admin', 'edit_country', $data);
        } else {
            $this->admin_model->editcountry($id);
            $this->session->set_flashdata('message', "Edited Successfully!..");
            redirect('catalog/viewcountry/' . $this->uri->segment(4) . '/' . $this->uri->segment(5) . '/' . $this->uri->segment(6));
        }
    }
    function deletecountry($id)
    {
        $this->admin_model->trashById('tb_country', $id, 'id');
        $this->session->set_flashdata('message', "Deleted Successfully!..");
        redirect('catalog/viewcountry/' . $this->uri->segment(4) . '/' . $this->uri->segment(5) . '/' . $this->uri->segment(6));
    }
    function addregion()
    {
        $data['countries'] = $this->admin_model->get_location_lists('country');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('location', 'Region', 'required|trim|callback_handle_country_name');
        $this->form_validation->set_rules('country', 'country', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->template->load('adminproducts', 'add_region', $data);
        } else {
            $this->admin_model->insertregion();
            $this->session->set_flashdata('message', "Added Successfully!..");
            redirect('catalog/addregion/');
        }
    }
    function addregion2()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('location', 'Region', 'required|trim');
        $this->form_validation->set_rules('country', 'country', 'required');
        if ($this->form_validation->run() == FALSE) {
            // $this->template->load('admin', 'add_region', $data);
        } else {
            $this->admin_model->insertregion();
            // $this->session->set_flashdata('message', "Added Successfully!..");
            // redirect('catalog/addregion/');
        }
    }
    function viewregion($country = 0, $status = 0, $search = 0, $top = 0, $page_position = 0)
    {
        $data['countries'] = $this->admin_model->get_location_lists('country');
        $this->load->library('pagination');
        $config['base_url'] = base_url() . 'catalog/viewregion/' . $country . '/' . $status . '/' . $search . '/' . $top;
        $config['total_rows'] = $this->admin_model->count_all_region();
        $config['per_page'] = '20';
        $config['num_links'] = 5;
        $config['uri_segment'] = 7;
        $config['prev_link'] = ' Previous';
        $config['prev_tag_open'] = '';
        $config['prev_tag_close'] = '';
        $config['next_link'] = ' Next';
        $config['next_tag_open'] = '';
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $data['values'] = $this->admin_model->list_region($config['per_page'], $page_position);
        $data['page_position'] = $page_position;
        $this->template->load('adminproducts', 'viewregion', $data);
    }
    function editregion($id)
    {
        $data['countries'] = $this->admin_model->get_location_lists('country');
        $data['value'] = $this->admin_model->GetByRow('tb_country', $id, 'id');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('location', 'Region', 'required|trim|callback_handle_country_name1');
        $this->form_validation->set_rules('country', 'country', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->template->load('admin', 'edit_region', $data);
        } else {
            $this->admin_model->editregion($id);
            $this->session->set_flashdata('message', "Edited Successfully!..");
            redirect('catalog/viewregion/' . $this->uri->segment(4) . '/' . $this->uri->segment(5) . '/' . $this->uri->segment(6) . '/' . $this->uri->segment(7) . '/' . $this->uri->segment(8));
        }
    }
    function deleteregion($id)
    {
        $this->admin_model->trashById('tb_country', $id, 'id');
        $this->session->set_flashdata('message', "Deleted Successfully!..");
        redirect('catalog/viewregion/' . $this->uri->segment(4) . '/' . $this->uri->segment(5) . '/' . $this->uri->segment(6) . '/' . $this->uri->segment(7) . '/' . $this->uri->segment(8));
    }
    function addstate()
    {
        $data['countries'] = $this->admin_model->get_location_lists('country');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('location', 'State', 'required|trim|callback_handle_country_name');
        $this->form_validation->set_rules('country', 'country', 'required');
        $this->form_validation->set_rules('region', 'region', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->template->load('adminproducts', 'add_state', $data);
        } else {
            $this->admin_model->insertstate();
            $this->session->set_flashdata('message', "Added Successfully!..");
            redirect('catalog/addstate/');
        }
    }
    function addstate2()
    {
        //$data['countries'] = $this->admin_model->get_location_lists('country');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('location', 'State', 'required|trim');
        $this->form_validation->set_rules('country', 'country', 'required');
        $this->form_validation->set_rules('region', 'region', 'required');
        if ($this->form_validation->run() == FALSE) {
            //$this->template->load('admin', 'add_state', $data);
        } else {
            $this->admin_model->insertstate();
            // $this->session->set_flashdata('message', "Added Successfully!..");
            // redirect('catalog/addstate/');
        }
    }
    function viewstate($country = 0, $status = 0, $search = 0, $region = 0, $page_position = 0)
    {
        $data['countries'] = $this->admin_model->get_location_lists('country');
        $this->load->library('pagination');
        $config['base_url'] = base_url() . 'catalog/viewstate/' . $country . '/' . $status . '/' . $search . '/' . $region;
        $config['total_rows'] = $this->admin_model->count_all_state();
        $config['per_page'] = '20';
        $config['num_links'] = 5;
        $config['uri_segment'] = 7;
        $config['prev_link'] = ' Previous';
        $config['prev_tag_open'] = '';
        $config['prev_tag_close'] = '';
        $config['next_link'] = ' Next';
        $config['next_tag_open'] = '';
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $data['values'] = $this->admin_model->list_state($config['per_page'], $page_position);
        $data['page_position'] = $page_position;
        $this->template->load('adminproducts', 'viewstate', $data);
    }
    function editstate($id)
    {
        $data['countries'] = $this->admin_model->get_location_lists('country');
        $data['value'] = $this->admin_model->GetByRow('tb_country', $id, 'id');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('location', 'State', 'required|trim|callback_handle_country_name1');
        $this->form_validation->set_rules('country', 'country', 'required');
        $this->form_validation->set_rules('region', 'region', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->template->load('admin', 'edit_state', $data);
        } else {
            $this->admin_model->editstate($id);
            $this->session->set_flashdata('message', "Edited Successfully!..");
            redirect('catalog/viewstate/' . $this->uri->segment(4) . '/' . $this->uri->segment(5) . '/' . $this->uri->segment(6) . '/' . $this->uri->segment(7) . '/' . $this->uri->segment(8));
        }
    }
    function deletestate($id)
    {
        $this->admin_model->trashById('tb_country', $id, 'id');
        $this->session->set_flashdata('message', "Deleted Successfully!..");
        redirect('catalog/viewstate/' . $this->uri->segment(4) . '/' . $this->uri->segment(5) . '/' . $this->uri->segment(6) . '/' . $this->uri->segment(7) . '/' . $this->uri->segment(8));
    }
    function addzone()
    {
        $data['countries'] = $this->admin_model->get_location_lists('country');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('location', 'State', 'required|trim|callback_handle_country_name');
        $this->form_validation->set_rules('country', 'country', 'required');
        $this->form_validation->set_rules('region', 'region', 'required');
        $this->form_validation->set_rules('state', 'state', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->template->load('adminproducts', 'add_zone', $data);
        } else {
            $this->admin_model->insertzone();
            $this->session->set_flashdata('message', "Added Successfully!..");
            redirect('catalog/addzone/');
        }
    }
    function addzone2()
    {
        // $data['countries'] = $this->admin_model->get_location_lists('country');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('location', 'State', 'required|trim');
        $this->form_validation->set_rules('country', 'country', 'required');
        $this->form_validation->set_rules('region', 'region', 'required');
        $this->form_validation->set_rules('state', 'state', 'required');
        if ($this->form_validation->run() == FALSE) {
            //$this->template->load('admin', 'add_zone', $data);
        } else {
            $this->admin_model->insertzone();
            // $this->session->set_flashdata('message', "Added Successfully!..");
            //redirect('catalog/addzone/');
        }
    }
    function viewzone($country = 0, $status = 0, $search = 0, $region = 0, $state = 0, $page_position = 0)
    {
        $data['countries'] = $this->admin_model->get_location_lists('country');
        $this->load->library('pagination');
        $config['base_url'] = base_url() . 'catalog/viewzone/' . $country . '/' . $status . '/' . $search . '/' . $region . '/' . $state;
        $config['total_rows'] = $this->admin_model->count_all_zone();
        $config['per_page'] = '20';
        $config['num_links'] = 5;
        $config['uri_segment'] = 8;
        $config['prev_link'] = ' Previous';
        $config['prev_tag_open'] = '';
        $config['prev_tag_close'] = '';
        $config['next_link'] = ' Next';
        $config['next_tag_open'] = '';
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $data['values'] = $this->admin_model->list_zone($config['per_page'], $page_position);
        $data['page_position'] = $page_position;
        $this->template->load('adminproducts', 'viewzone', $data);
    }
    function editzone($id)
    {
        $data['countries'] = $this->admin_model->get_location_lists('country');
        $data['value'] = $this->admin_model->GetByRow('tb_country', $id, 'id');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('location', 'State', 'required|trim|callback_handle_country_name1');
        $this->form_validation->set_rules('country', 'country', 'required');
        $this->form_validation->set_rules('region', 'region', 'required');
        $this->form_validation->set_rules('state', 'state', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->template->load('admin', 'edit_zone', $data);
        } else {
            $this->admin_model->editzone($id);
            $this->session->set_flashdata('message', "Edited Successfully!..");
            redirect('catalog/viewzone/' . $this->uri->segment(4) . '/' . $this->uri->segment(5) . '/' . $this->uri->segment(6) . '/' . $this->uri->segment(7) . '/' . $this->uri->segment(8) . '/' . $this->uri->segment(9));
        }
    }
    function deletezone($id)
    {
        $this->admin_model->trashById('tb_country', $id, 'id');
        $this->session->set_flashdata('message', "Deleted Successfully!..");
        redirect('catalog/viewzone/' . $this->uri->segment(4) . '/' . $this->uri->segment(5) . '/' . $this->uri->segment(6) . '/' . $this->uri->segment(7) . '/' . $this->uri->segment(8) . '/' . $this->uri->segment(9));
    }
    function adddistrict()
    {
        $data['countries'] = $this->admin_model->get_location_lists('country');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('country', 'country', 'required');
        $this->form_validation->set_rules('region', 'region', 'required');
        $this->form_validation->set_rules('state', 'state', 'required');
        $this->form_validation->set_rules('zone', 'zone', 'required');
        $this->form_validation->set_rules('location', 'District', 'required|callback_handle_location_name');
        if ($this->form_validation->run() == FALSE) {
            $this->template->load('admin', 'add_district', $data);
        } else {
            $this->admin_model->insertdistrict();
            $this->session->set_flashdata('message', "Added Successfully!..");
            redirect('catalog/adddistrict/');
        }
    }
    function adddistrict2()
    {
        //$data['countries'] = $this->admin_model->get_location_lists('country');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('country', 'country', 'required');
        $this->form_validation->set_rules('region', 'region', 'required');
        $this->form_validation->set_rules('state', 'state', 'required');
        $this->form_validation->set_rules('zone', 'zone', 'required');
        $this->form_validation->set_rules('location', 'District', 'required');
        if ($this->form_validation->run() == FALSE) {
            //$this->template->load('admin', 'add_district', $data);
        } else {
            $this->admin_model->insertdistrict();
            //$this->session->set_flashdata('message', "Added Successfully!..");
            //redirect('catalog/adddistrict/');
        }
    }
    function get_country_locations()
    {
        $location = $this->input->post('location');
        $this->db->where('parent_id', $location);
        $this->db->where('status', 'a');
        $this->db->where('action !=', 'd');
        $all_values = $this->db->get('tb_country')->result();
        ?>
        <option value="">Select</option>
        <?php
        foreach ($all_values as $row) {
            ?>
            <option value="<?php echo $row->id; ?>"><?php echo ucwords($row->country); ?></option>
            <?php
        }
    }
    function handle_location_name()
    {
        $ret = $this->admin_model->select_location_name();
        if ($ret) {
            $this->form_validation->set_message('handle_location_name', 'This Name Is Already Exist!..');
            return FALSE;
        } else {
            return TRUE;
        }
    }
    function handle_location_name1()
    {
        $ret = $this->admin_model->select_location_name1();
        if ($ret) {
            $this->form_validation->set_message('handle_location_name1', 'This Name Is Already Exist!..');
            return FALSE;
        } else {
            return TRUE;
        }
    }
    function viewdistricts($country = 0, $state = 0, $status = 0, $search = 0, $region = 0, $zone = 0, $page_position = 0)
    {
        $data['countries'] = $this->admin_model->get_location_lists('country');
        $this->load->library('pagination');
        $config['base_url'] = base_url() . 'catalog/viewdistricts/' . $country . '/' . $state . '/' . $status . '/' . $search . '/' . $region . '/' . $zone;
        $config['total_rows'] = $this->admin_model->count_all_districts();
        $config['per_page'] = '20';
        $config['num_links'] = 5;
        $config['uri_segment'] = 9;
        $config['prev_link'] = ' Previous';
        $config['prev_tag_open'] = '';
        $config['prev_tag_close'] = '';
        $config['next_link'] = ' Next';
        $config['next_tag_open'] = '';
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $data['values'] = $this->admin_model->list_districts($config['per_page'], $page_position);
        $data['page_position'] = $page_position;
        $this->template->load('adminproducts', 'viewdistricts', $data);
    }
    function editdistrict($id)
    {
        $data['countries'] = $this->admin_model->get_location_lists('country');
        $data['value'] = $this->admin_model->GetByRow('tb_locations', $id, 'id');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('country', 'country', 'required');
        $this->form_validation->set_rules('region', 'region', 'required');
        $this->form_validation->set_rules('state', 'state', 'required');
        $this->form_validation->set_rules('zone', 'zone', 'required');
        $this->form_validation->set_rules('location', 'District', 'required|callback_handle_location_name1');
        if ($this->form_validation->run() == FALSE) {
            $this->template->load('admin', 'edit_district', $data);
        } else {
            $this->admin_model->editdistrict($id);
            $this->session->set_flashdata('message', "Edited Successfully!..");
            redirect('catalog/viewdistricts/' . $this->uri->segment(4) . '/' . $this->uri->segment(5) . '/' . $this->uri->segment(6) . '/' . $this->uri->segment(7) . '/' . $this->uri->segment(8) . '/' . $this->uri->segment(9) . '/' . $this->uri->segment(10));
        }
    }
    function deletedistrict($id)
    {
        $this->admin_model->trashById('tb_locations', $id, 'id');
        $this->session->set_flashdata('message', "Deleted Successfully!..");
        redirect('catalog/viewdistricts/' . $this->uri->segment(4) . '/' . $this->uri->segment(5) . '/' . $this->uri->segment(6) . '/' . $this->uri->segment(7) . '/' . $this->uri->segment(8) . '/' . $this->uri->segment(9) . '/' . $this->uri->segment(10));
    }
    function addlocation()
    {
        $data['countries'] = $this->admin_model->get_location_lists('country');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('country', 'country', 'required');
        $this->form_validation->set_rules('region', 'region', 'required');
        $this->form_validation->set_rules('state', 'state', 'required');
        $this->form_validation->set_rules('zone', 'zone', 'required');
        $this->form_validation->set_rules('district', 'District', 'required');
        $this->form_validation->set_rules('location', 'area', 'required|trim|callback_handle_location_name');
        if ($this->form_validation->run() == FALSE) {
            $this->template->load('admin', 'add_location', $data);
        } else {
            $this->admin_model->insertlocation();
            $this->session->set_flashdata('message', "Added Successfully!..");
            redirect('catalog/addlocation/');
        }
    }
    function addlocation2()
    {
        // $data['countries'] = $this->admin_model->get_location_lists('country');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('country', 'country', 'required');
        $this->form_validation->set_rules('region', 'region', 'required');
        $this->form_validation->set_rules('state', 'state', 'required');
        $this->form_validation->set_rules('zone', 'zone', 'required');
        $this->form_validation->set_rules('district', 'District', 'required');
        $this->form_validation->set_rules('location', 'area', 'required|trim');
        if ($this->form_validation->run() == FALSE) {
            //$this->template->load('admin', 'add_location', $data);
        } else {
            $this->admin_model->insertlocation();
            //$this->session->set_flashdata('message', "Added Successfully!..");
            // redirect('catalog/addlocation/');
        }
    }
    function get_districts()
    {
        $state = $this->input->post('state');
        $this->db->where('state', $state);
        $this->db->where('parent_id', '0');
        $this->db->where('status', 'a');
        $this->db->where('action !=', 'd');
        $all_values = $this->db->get('tb_locations')->result();
        ?>
        <option value="">Select</option>
        <?php
        foreach ($all_values as $row) {
            ?>
            <option value="<?php echo $row->id; ?>"><?php echo ucwords($row->location); ?></option>
            <?php
        }
    }
    function get_locations()
    {
        $location = $this->input->post('location');
        $type = $this->input->post('type');
        if ($type == 'district') {
            $this->db->where('zoneid', $location);
            $this->db->where('type', $type);
        } else {
            $this->db->where('parent_id', $location);
            $this->db->where('type', $type);
        }
        $this->db->where('status', 'a');
        $this->db->where('action !=', 'd');
        $all_values = $this->db->get('tb_locations')->result();
        ?>
        <option value="">Select</option>
        <?php
        foreach ($all_values as $row) {
            ?>
            <option value="<?php echo $row->id; ?>"><?php echo ucwords($row->location); ?></option>
            <?php
        }
    }
    function viewlocations($country = 0, $state = 0, $status = 0, $search = 0, $district = 0, $region = 0, $zone = 0, $page_position = 0)
    {
        $data['countries'] = $this->admin_model->get_location_lists('country');
        $this->load->library('pagination');
        $config['base_url'] = base_url() . 'catalog/viewlocations/' . $country . '/' . $state . '/' . $status . '/' . $search . '/' . $district . '/' . $region . '/' . $zone;
        $config['total_rows'] = $this->admin_model->count_all_locations();
        $config['per_page'] = '20';
        $config['num_links'] = 5;
        $config['uri_segment'] = 10;
        $config['prev_link'] = ' Previous';
        $config['prev_tag_open'] = '';
        $config['prev_tag_close'] = '';
        $config['next_link'] = ' Next';
        $config['next_tag_open'] = '';
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $data['values'] = $this->admin_model->list_locations($config['per_page'], $page_position);
        $data['page_position'] = $page_position;
        $this->template->load('adminproducts', 'viewlocations', $data);
    }
    function editlocation($id)
    {
        $data['countries'] = $this->admin_model->get_location_lists('country');
        $data['value'] = $this->admin_model->GetByRow('tb_locations', $id, 'id');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('country', 'country', 'required');
        $this->form_validation->set_rules('region', 'region', 'required');
        $this->form_validation->set_rules('state', 'state', 'required');
        $this->form_validation->set_rules('zone', 'zone', 'required');
        $this->form_validation->set_rules('district', 'District', 'required');
        $this->form_validation->set_rules('location', 'area', 'required|trim|callback_handle_location_name1');
        if ($this->form_validation->run() == FALSE) {
            $this->template->load('admin', 'edit_location', $data);
        } else {
            $this->admin_model->editlocation($id);
            $this->session->set_flashdata('message', "Edited Successfully!..");
            redirect('catalog/viewlocations/' . $this->uri->segment(4) . '/' . $this->uri->segment(5) . '/' . $this->uri->segment(6) . '/' . $this->uri->segment(7) . '/' . $this->uri->segment(8) . '/' . $this->uri->segment(9) . '/' . $this->uri->segment(10) . '/' . $this->uri->segment(11) . '/' . $this->uri->segment(12));
        }
    }
    function deletelocation($id)
    {
        $this->admin_model->trashById('tb_locations', $id, 'id');
        $this->session->set_flashdata('message', "Deleted Successfully!..");
        redirect('catalog/viewlocations/' . $this->uri->segment(4) . '/' . $this->uri->segment(5) . '/' . $this->uri->segment(6) . '/' . $this->uri->segment(7) . '/' . $this->uri->segment(8) . '/' . $this->uri->segment(9) . '/' . $this->uri->segment(10) . '/' . $this->uri->segment(11) . '/' . $this->uri->segment(12));
    }
    function addcentre()
    {
        $data['countries'] = $this->admin_model->get_location_lists('country');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('country', 'country', 'required');
        $this->form_validation->set_rules('region', 'region', 'required');
        $this->form_validation->set_rules('state', 'state', 'required');
        $this->form_validation->set_rules('zone', 'zone', 'required');
        $this->form_validation->set_rules('district', 'District', 'required');
        $this->form_validation->set_rules('area', 'Area', 'required');
        $this->form_validation->set_rules('location', 'centre', 'required|trim|callback_handle_location_name');
        if ($this->form_validation->run() == FALSE) {
            $this->template->load('admin', 'add_centre', $data);
        } else {
            $this->admin_model->insertcentre();
            $this->session->set_flashdata('message', "Added Successfully!..");
            redirect('catalog/addcentre/');
        }
    }
    function addcentre2()
    {
        //$data['countries'] = $this->admin_model->get_location_lists('country');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('country', 'country', 'required');
        $this->form_validation->set_rules('region', 'region', 'required');
        $this->form_validation->set_rules('state', 'state', 'required');
        $this->form_validation->set_rules('zone', 'zone', 'required');
        $this->form_validation->set_rules('district', 'District', 'required');
        $this->form_validation->set_rules('area', 'Area', 'required');
        $this->form_validation->set_rules('location', 'centre', 'required|trim');
        if ($this->form_validation->run() == FALSE) {
            // $this->template->load('admin', 'add_centre', $data);
        } else {
            $this->admin_model->insertcentre();
            //  $this->session->set_flashdata('message', "Added Successfully!..");
            // redirect('catalog/addcentre/');
        }
    }
    function viewcentres($country = 0, $state = 0, $status = 0, $search = 0, $district = 0, $region = 0, $zone = 0, $area = 0, $page_position = 0)
    {
        $data['countries'] = $this->admin_model->get_location_lists('country');
        $this->load->library('pagination');
        $config['base_url'] = base_url() . 'catalog/viewcentres/' . $country . '/' . $state . '/' . $status . '/' . $search . '/' . $district . '/' . $region . '/' . $zone . '/' . $area;
        $config['total_rows'] = $this->admin_model->count_all_centre();
        $config['per_page'] = '20';
        $config['num_links'] = 5;
        $config['uri_segment'] = 11;
        $config['prev_link'] = ' Previous';
        $config['prev_tag_open'] = '';
        $config['prev_tag_close'] = '';
        $config['next_link'] = ' Next';
        $config['next_tag_open'] = '';
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $data['values'] = $this->admin_model->list_centre($config['per_page'], $page_position);
        $data['page_position'] = $page_position;
        $this->template->load('adminproducts', 'viewcentres', $data);
    }
    function editcentre($id)
    {
        $data['countries'] = $this->admin_model->get_location_lists('country');
        $data['value'] = $this->admin_model->GetByRow('tb_locations', $id, 'id');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('country', 'country', 'required');
        $this->form_validation->set_rules('region', 'region', 'required');
        $this->form_validation->set_rules('state', 'state', 'required');
        $this->form_validation->set_rules('zone', 'zone', 'required');
        $this->form_validation->set_rules('district', 'District', 'required');
        $this->form_validation->set_rules('area', 'Area', 'required');
        $this->form_validation->set_rules('location', 'centre', 'required|trim|callback_handle_location_name1');
        if ($this->form_validation->run() == FALSE) {
            $this->template->load('admin', 'edit_centre', $data);
        } else {
            $this->admin_model->editcentre($id);
            $this->session->set_flashdata('message', "Edited Successfully!..");
            redirect('catalog/viewcentres/' . $this->uri->segment(4) . '/' . $this->uri->segment(5) . '/' . $this->uri->segment(6) . '/' . $this->uri->segment(7) . '/' . $this->uri->segment(8) . '/' . $this->uri->segment(9) . '/' . $this->uri->segment(10) . '/' . $this->uri->segment(11) . '/' . $this->uri->segment(12) . '/' . $this->uri->segment(13));
        }
    }
    function deletecentre($id)
    {
        $this->admin_model->trashById('tb_locations', $id, 'id');
        $this->session->set_flashdata('message', "Deleted Successfully!..");
        redirect('catalog/viewcentres/' . $this->uri->segment(4) . '/' . $this->uri->segment(5) . '/' . $this->uri->segment(6) . '/' . $this->uri->segment(7) . '/' . $this->uri->segment(8) . '/' . $this->uri->segment(9) . '/' . $this->uri->segment(10) . '/' . $this->uri->segment(11) . '/' . $this->uri->segment(12) . '/' . $this->uri->segment(13));
    }
    function addshop()
    {
        $data['countries'] = $this->admin_model->get_location_lists('country');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('country', 'country', 'required');
        $this->form_validation->set_rules('region', 'region', 'required');
        $this->form_validation->set_rules('state', 'state', 'required');
        $this->form_validation->set_rules('zone', 'zone', 'required');
        $this->form_validation->set_rules('district', 'District', 'required');
        $this->form_validation->set_rules('area', 'Area', 'required');
        $this->form_validation->set_rules('centre', 'centre', 'required|trim');
        $this->form_validation->set_rules('name', 'Name', 'trim|required|callback_handle_shop_name');
        $this->form_validation->set_rules('phone', 'Phone', 'trim');
        $this->form_validation->set_rules('email', 'Email', 'trim|valid_email');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('contactname', 'contactname', 'required');
        $this->form_validation->set_rules('contactnumber', 'contactnumber', 'required');
        $this->form_validation->set_rules('tin', 'tin', '');
        $this->form_validation->set_rules('pin', 'pin', '');
        $this->form_validation->set_rules('cst', 'cst', '');
        $this->form_validation->set_rules('whatsapp', 'whatsapp', '');
        $this->form_validation->set_rules('longitude', 'longitude', '');
        $this->form_validation->set_rules('latitude', 'latitude', '');
        if ($this->form_validation->run() == FALSE) {
            $this->template->load('admin', 'addshop', $data);
        } else {
            if ($_FILES['cat_picture']['name'] != "") {
                $this->upload();
            } else {
                $this->file_name = "";
            }
            $this->admin_model->add_shop($this->file_name);
            $this->session->set_flashdata('message', "Added Successfully!..");
            redirect('catalog/addshop');
        }
    }
    function viewshops($country = 0, $region = 0, $state = 0, $zone = 0, $district = 0, $area = 0, $centre = 0, $status = 0, $search = 0, $page_position = 0)
    {
        $data['countries'] = $this->admin_model->get_location_lists('country');
        $this->load->library('pagination');
        $config['base_url'] = base_url() . 'catalog/viewshops/' . $country . '/' . $region . '/' . $state . '/' . $zone . '/' . $district . '/' . $area . '/' . $centre . '/' . $status . '/' . $search;
        $config['total_rows'] = $this->admin_model->count_all_shops();
        $config['per_page'] = '20';
        $config['num_links'] = 10;
        $config['uri_segment'] = 12;
        $config['prev_link'] = 'Previous';
        $config['prev_tag_open'] = ' ';
        $config['prev_tag_close'] = ' ';
        $config['next_link'] = 'Next';
        $config['next_tag_open'] = ' ';
        $config['next_tag_close'] = ' ';
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $data['values'] = $this->admin_model->list_all_shops($config['per_page'], $page_position);
        $data['page_position'] = $page_position;
        $this->template->load('adminproducts', 'viewshops', $data);
    }
    function editshop($id)
    {
        $data['countries'] = $this->admin_model->get_location_lists('country');
        $data['value'] = $this->admin_model->GetByRow('tb_shops', $id, 'id');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('country', 'country', 'required');
        $this->form_validation->set_rules('region', 'region', 'required');
        $this->form_validation->set_rules('state', 'state', 'required');
        $this->form_validation->set_rules('zone', 'zone', 'required');
        $this->form_validation->set_rules('district', 'District', 'required');
        $this->form_validation->set_rules('area', 'Area', 'required');
        $this->form_validation->set_rules('centre', 'centre', 'required|trim');
        $this->form_validation->set_rules('name', 'Name', 'trim|required|callback_handle_shop_name1');
        $this->form_validation->set_rules('phone', 'Phone', 'trim');
        $this->form_validation->set_rules('email', 'Email', 'trim|valid_email');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('contactname', 'contactname', 'required');
        $this->form_validation->set_rules('contactnumber', 'contactnumber', 'required');
        $this->form_validation->set_rules('tin', 'tin', '');
        $this->form_validation->set_rules('pin', 'pin', '');
        $this->form_validation->set_rules('cst', 'cst', '');
        $this->form_validation->set_rules('whatsapp', 'whatsapp', '');
        $this->form_validation->set_rules('longitude', 'longitude', '');
        $this->form_validation->set_rules('latitude', 'latitude', '');
        if ($this->form_validation->run() == FALSE) {
            $this->template->load('admin', 'editshop', $data);
        } else {
            if ($_FILES['cat_picture']['name'] != "") {
                $this->upload();
            } else {
                $this->file_name = "";
            }
            $this->admin_model->edit_shop($id, $this->file_name);
            $this->session->set_flashdata('message', "Added Successfully!..");
            redirect('catalog/viewshops/' . $this->uri->segment(4) . '/' . $this->uri->segment(5) . '/' . $this->uri->segment(6) . '/' . $this->uri->segment(7) . '/' . $this->uri->segment(8) . '/' . $this->uri->segment(9) . '/' . $this->uri->segment(10) . '/' . $this->uri->segment(11) . '/' . $this->uri->segment(12) . '/' . $this->uri->segment(13));
        }
    }
    function deleteshop($id)
    {
        $this->admin_model->trashById('tb_shops', $id, 'id');
        $this->session->set_flashdata('message', "Deleted Successfully!..");
        redirect('catalog/viewshops/' . $this->uri->segment(4) . '/' . $this->uri->segment(5) . '/' . $this->uri->segment(6) . '/' . $this->uri->segment(7) . '/' . $this->uri->segment(8) . '/' . $this->uri->segment(9) . '/' . $this->uri->segment(10) . '/' . $this->uri->segment(11) . '/' . $this->uri->segment(12) . '/' . $this->uri->segment(13));
    }
    function authenticateshop($id)
    {
        $data = array(
            'status' => 'a',
        );
        $this->db->where('id', $id);
        $this->db->update('tb_shops', $data);
        $this->session->set_flashdata('message', "Activated Successfully!..");
        redirect('catalog/viewshops/' . $this->uri->segment(4) . '/' . $this->uri->segment(5) . '/' . $this->uri->segment(6) . '/' . $this->uri->segment(7) . '/' . $this->uri->segment(8) . '/' . $this->uri->segment(9) . '/' . $this->uri->segment(10) . '/' . $this->uri->segment(11) . '/' . $this->uri->segment(12) . '/' . $this->uri->segment(13));
    }
    function deactivateshop($id)
    {
        $data = array(
            'status' => 'd',
        );
        $this->db->where('id', $id);
        $this->db->update('tb_shops', $data);
        $this->session->set_flashdata('message', "Deactivated Successfully!..");
        redirect('catalog/viewshops/' . $this->uri->segment(4) . '/' . $this->uri->segment(5) . '/' . $this->uri->segment(6) . '/' . $this->uri->segment(7) . '/' . $this->uri->segment(8) . '/' . $this->uri->segment(9) . '/' . $this->uri->segment(10) . '/' . $this->uri->segment(11) . '/' . $this->uri->segment(12) . '/' . $this->uri->segment(13));
    }
    function handle_shop_name()
    {
        $ret = $this->admin_model->select_shop_name();
        if ($ret) {
            $this->form_validation->set_message('handle_shop_name', 'This Name Is Already Exist!..');
            return FALSE;
        } else {
            return TRUE;
        }
    }
    function handle_shop_name1()
    {
        $ret = $this->admin_model->select_shop_name1();
        if ($ret) {
            $this->form_validation->set_message('handle_shop_name1', 'This Name Is Already Exist!..');
            return FALSE;
        } else {
            return TRUE;
        }
    }
    function bluk_location_upload()
    {
        $data['submit'] = array('name' => 'submit', 'value' => 'Add', 'class' => 'btn_apply');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('bulk', 'bulk', '');
        if ($this->form_validation->run() == FALSE) {
            $this->template->load('admin', 'bulk_location', $data);
        } else {
            $this->admin_model->bulk_locations_upload();
            $this->session->set_flashdata('message', "Added Successfully!..");
            redirect('catalog/bluk_location_upload');
        }
    }
    function upload()
    {
        $this->load->library('upload');
        $config['upload_path'] = 'upload/category/';
        $config['allowed_types'] = 'jpg|jpeg|gif|png';
        //$config['max_size'] = '5000000';
        //$config['max_width'] = '2000';
        //$config['max_height'] = '2000';
        $this->file_name = $config['file_name'] = 'Jomsons-shop-' . $this->randomvalue() . '.' . end(explode('.', $_FILES['cat_picture']['name']));
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('cat_picture')) {
            //echo "test";
            $info = $this->upload->data();
            $error = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('message', $error);
        } else {
            /* To create thumb image */
            $info = $this->upload->data();
            $this->session->set_flashdata('message', "File Successfully uploaded");
            //  $this->image_thumb($info);
            //unlink($info['full_path']);
        }
    }
    function randomvalue()
    {
        $chars = "abcdefghijkmnopqrstuvwxyz023456789";
        srand((double)microtime() * 1000000);
        $i = 0;
        $pass = '';
        while ($i <= 5) {
            $num = rand() % 33;
            $tmp = substr($chars, $num, 1);
            $pass = $pass . $tmp;
            $i++;
        }
        return $pass;
    }
    function adduserlocation($id)
    {
        $data['countries'] = $this->admin_model->get_location_lists('country');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('country', 'country', 'required');
        $this->form_validation->set_rules('region', 'region', 'required');
        $this->form_validation->set_rules('state', 'state', 'required');
        $this->form_validation->set_rules('zone', 'zone', 'required');
        $this->form_validation->set_rules('district', 'District', 'required');
        $this->form_validation->set_rules('area', 'Area', 'required');
        //$this->form_validation->set_rules('centre', 'centre', 'required|trim');
        $this->form_validation->set_rules('userid', 'userid', 'required|trim');
        if ($this->form_validation->run() == FALSE) {
            $this->template->load('admin', 'adduserlocations', $data);
        } else {
            $this->admin_model->adduserlocation();
            $this->session->set_flashdata('message', "Added Successfully!..");
            redirect('catalog/adduserlocation/' . $this->uri->segment(3));
        }
    }
    function adduserlocationsave()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('country', 'country', 'required');
        $this->form_validation->set_rules('region', 'region', 'required');
        $this->form_validation->set_rules('state', 'state', 'required');
        $this->form_validation->set_rules('zone', 'zone', 'required');
        $this->form_validation->set_rules('district', 'District', 'required');
        $this->form_validation->set_rules('area', 'Area', 'required');
        //$this->form_validation->set_rules('centre', 'centre', 'required|trim');
        $this->form_validation->set_rules('userid', 'userid', 'required|trim');
        if ($this->form_validation->run() == FALSE) {
        } else {
            $this->admin_model->adduserlocation();
        }
    }
    function viewuserlocations($userid, $country = 0, $region = 0, $state = 0, $zone = 0, $district = 0, $area = 0, $page_position = 0)
    {
        $data['countries'] = $this->admin_model->get_location_lists('country');
        $data['userdetails'] = $this->admin_model->GetByRow('meta', $userid, 'id');
        $this->load->library('pagination');
        $config['base_url'] = base_url() . 'catalog/viewuserlocations/' . $userid . '/' . $country . '/' . $region . '/' . $state . '/' . $zone . '/' . $district . '/' . $area;
        $config['total_rows'] = $this->admin_model->count_all_userlocations();
        $config['per_page'] = '20';
        $config['num_links'] = 10;
        $config['uri_segment'] = 10;
        $config['prev_link'] = 'Previous';
        $config['prev_tag_open'] = ' ';
        $config['prev_tag_close'] = ' ';
        $config['next_link'] = 'Next';
        $config['next_tag_open'] = ' ';
        $config['next_tag_close'] = ' ';
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $data['values'] = $this->admin_model->list_all_userlocations($config['per_page'], $page_position);
        $data['page_position'] = $page_position;
        $this->template->load('admin', 'viewuserlocations', $data);
    }
    function deleteuserlocation($id)
    {
        $this->admin_model->trashById('tb_user_locations', $id, 'id');
        $this->session->set_flashdata('message', "Deleted Successfully!..");
        redirect('catalog/viewuserlocations/' . $this->uri->segment(4) . '/' . $this->uri->segment(5) . '/' . $this->uri->segment(6) . '/' . $this->uri->segment(7) . '/' . $this->uri->segment(8) . '/' . $this->uri->segment(9) . '/' . $this->uri->segment(10) . '/' . $this->uri->segment(11));
    }
    function viewdailyvisitreport($userid = 0, $country = 0, $region = 0, $state = 0, $zone = 0, $district = 0, $date = 0, $page_position = 0)
    {
        $data['countries'] = $this->admin_model->get_location_lists('country');
        $data['salesmans'] = $this->admin_model->get_all_salesman_lists();
        $this->load->library('pagination');
        $config['base_url'] = base_url() . 'catalog/viewdailyvisitreport/' . $userid . '/' . $country . '/' . $region . '/' . $state . '/' . $zone . '/' . $district . '/' . $date;
        $config['total_rows'] = $this->admin_model->count_all_dailyvisit();
        $config['per_page'] = '20';
        $config['num_links'] = 10;
        $config['uri_segment'] = 10;
        $config['prev_link'] = 'Previous';
        $config['prev_tag_open'] = ' ';
        $config['prev_tag_close'] = ' ';
        $config['next_link'] = 'Next';
        $config['next_tag_open'] = ' ';
        $config['next_tag_close'] = ' ';
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $data['values'] = $this->admin_model->list_all_dailyvisit($config['per_page'], $page_position);
        $data['page_position'] = $page_position;
        $this->template->load('admin', 'viewdailyvisit', $data);
    }
    function dayvisitreport($dailyid, $back = 0, $area = 0, $page_position = 0)
    {
        $data['daydata'] = $this->admin_model->GetByRow('tb_dailyvisit', $dailyid, 'id');
        $data['userareas'] = $this->admin_model->get_user_areas_list($data['daydata']->userid);
        $data['userdetails'] = $this->admin_model->GetByRow('meta', $data['daydata']->userid, 'id');
        $this->load->library('pagination');
        $config['base_url'] = base_url() . 'catalog/dayvisitreport/' . $dailyid . '/' . $back . '/' . $area;
        $config['total_rows'] = $this->admin_model->count_all_dayvisit();
        $config['per_page'] = '20';
        $config['num_links'] = 10;
        $config['uri_segment'] = 6;
        $config['prev_link'] = 'Previous';
        $config['prev_tag_open'] = ' ';
        $config['prev_tag_close'] = ' ';
        $config['next_link'] = 'Next';
        $config['next_tag_open'] = ' ';
        $config['next_tag_close'] = ' ';
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $data['values'] = $this->admin_model->list_all_dayvisit($config['per_page'], $page_position);
        $data['page_position'] = $page_position;
        $this->template->load('admin', 'viewdayvisitlocations', $data);
    }
    function dayvisitlocationshops($centreid, $dailyid, $back = 0, $status = 0, $name = 0, $page_position = 0)
    {
        $data['daydata'] = $this->admin_model->GetByRow('tb_dailyvisit', $dailyid, 'id');
        $data['userareas'] = $this->admin_model->get_user_areas_list($data['daydata']->userid);
        $data['userdetails'] = $this->admin_model->GetByRow('meta', $data['daydata']->userid, 'id');
        $data['location_details'] = $this->admin_model->GetByRow('tb_locationvisit', $centreid, 'id');
        $data['centre_details'] = $this->admin_model->GetByRow('tb_locations', $data['location_details']->centreid, 'id');
        $this->load->library('pagination');
        $config['base_url'] = base_url() . 'catalog/dayvisitlocationshops/' . $centreid . '/' . $dailyid . '/' . $back . '/' . $status . '/' . $name;
        $config['total_rows'] = $this->admin_model->count_all_centre_shops();
        $config['per_page'] = '20';
        $config['num_links'] = 10;
        $config['uri_segment'] = 8;
        $config['prev_link'] = 'Previous';
        $config['prev_tag_open'] = ' ';
        $config['prev_tag_close'] = ' ';
        $config['next_link'] = 'Next';
        $config['next_tag_open'] = ' ';
        $config['next_tag_close'] = ' ';
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $data['values'] = $this->admin_model->list_all_centre_shops($config['per_page'], $page_position);
        $data['page_position'] = $page_position;
        $this->template->load('admin', 'viewdailyvisitlocationshops', $data);
    }
}