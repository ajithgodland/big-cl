<?php
class admin_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        //$this->output->enable_profiler(TRUE);
        $this->tree = array();
        $this->parent = '';
        $this->arr = array();
        $this->arr2 = array();
        $this->arrz = array();
        $this->arrs = array();
        $this->arrow = '|';
        $this->arrzz = array();
		
		date_default_timezone_set('Asia/Calcutta');
		
    }
	
	
	 function DeleteById($table, $id, $field)
    {
        //echo $id;
        $this->db->where(array($field => $id));
        $this->db->delete($table);
    }
    function GetByRow($table, $eventid, $field)
    {
        //echo $eventid;
        $this->db->where(array($field => $eventid));
        return $result = $this->db->get($table)->row();
    }


	function clean_name($string)
    {
        $string = trim($string);
        $string = str_replace(" ", "-", $string);
        $string = str_replace("&", "and", $string);
        $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
        $string = preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
        $product = strtolower($string);
        return $product;
    }
	
	
	function get_location_lists($type)
	{
	$this->db->where('status !=', 'd');
	$this->db->where('action !=', 'd');	
	$this->db->where('type', $type);
	return $this->db->get('tb_country')->result();
	}
	
	
	function get_location_lists2($id)
	{
	$this->db->where('status !=', 'd');
	$this->db->where('action !=', 'd');	
	$this->db->where('parent_id', $id);
	return $this->db->get('tb_country')->result();
	}
	

	function get_country()
	{
	$this->db->where('status !=', 'd');
	$this->db->where('action !=', 'd');	
	$this->db->where('parent_id', '0');
	return $this->db->get('tb_country')->result();
	}
	
	function get_state($cid)
	{
	$this->db->where('status !=', 'd');
	$this->db->where('action !=', 'd');	
	$this->db->where('parent_id', $cid);
	return $this->db->get('tb_country')->result();
	}
	
	
	function get_districts($cid)
	{
	$this->db->where('state', $cid);
	$this->db->where('parent_id', '0');
	$this->db->where('status', 'a');
	$this->db->where('action !=', 'd');
	return $this->db->get('tb_locations')->result();
	}
	
	function get_locations($cid,$type)
	{	
	
		if($type=='district')
		{
		$this->db->where('zoneid', $cid);
		$this->db->where('type', $type);
		}
		else
		{
		$this->db->where('parent_id', $cid);
		$this->db->where('type', $type);
		}
	
	$this->db->where('status', 'a');
	$this->db->where('action !=', 'd');
	return $this->db->get('tb_locations')->result();
	}
	
	
	function insertdistrict()
	{
		
	$location = $this->input->post('location');
	$location = strtolower($location);
	

	
	$state = $this->input->post('state');
	$country = $this->input->post('country');
	
	$region = $this->input->post('region');
	$zone = $this->input->post('zone');
	
	//$country_details = $this->admin_model->GetByRow('tb_country', $country, 'id');
	//$state_details = $this->admin_model->GetByRow('tb_country', $state, 'id');
	
	//$region_details = $this->admin_model->GetByRow('tb_country', $region, 'id');
	//$zone_details = $this->admin_model->GetByRow('tb_country', $zone, 'id');
	
	
		$this->db->where('parent_id', '0');
		$this->db->where('country', $country);	
		$this->db->where('regionid', $region);	
		$this->db->where('state', $state);	
		$this->db->where('zoneid', $zone);
		$this->db->where('location', $location);
		$this->db->where('type', 'district');	
		$this->db->where('action !=', 'd');
		$check = $this->db->get('tb_locations')->row();
		
	if($check)
	{
		echo 'yes';
	}
	else
	{
	
	
		$data = array(
		'parent_id' => '0',
		'type' => 'district',
		'status' => 'a',
		'country' => $this->input->post('country'),
		'regionid' => $this->input->post('region'),
		'state' => $this->input->post('state'),
		'zoneid' => $this->input->post('zone'),
		//'statename' => $state_details->country,
		//'countryname' => $country_details->country,
		//'regionname' => $region_details->country,
		//'zonename' => $zone_details->country,
		'date' => date('d-m-Y H:i:s'),
		'date2' => date('Y-m-d H:i:s'),
		'location' => $location,
		
		);
		
		$this->db->insert('tb_locations', $data);
		
		echo 'no';
	
	}
	
	}	
	

function select_location_name()
    {
        $location = $this->input->post('location');
		$location = strtolower($location);
		
		$type = $this->input->post('type');
		
		$country = $this->input->post('country');
		$region = $this->input->post('region');
		$state = $this->input->post('state');
		$zone = $this->input->post('zone');
		
		if($type=='district')
		{
			
		
		$this->db->where('parent_id', '0');
		$this->db->where('country', $country);	
		$this->db->where('regionid', $region);	
		$this->db->where('state', $state);	
		$this->db->where('zoneid', $zone);	
					
		}
		else
		if($type=='area')
		{
		
		$district = $this->input->post('district');
			
		$this->db->where('parent_id', $district);
		$this->db->where('country', $country);	
		$this->db->where('regionid', $region);	
		$this->db->where('state', $state);	
		$this->db->where('zoneid', $zone);	
		
		}
		else
		if($type=='centre')
		{
		$district = $this->input->post('district');
		$area = $this->input->post('area');
		
		$this->db->where('parent_id', $area);
		$this->db->where('district', $district);		
		$this->db->where('country', $country);	
		$this->db->where('regionid', $region);	
		$this->db->where('state', $state);	
		$this->db->where('zoneid', $zone);	
				
		}
		
		$this->db->where('location', $location);	
		$this->db->where('type', $type);	
		
		$this->db->where('action !=', 'd');
		
        return $this->db->get('tb_locations')->row();
    }
	
    function select_location_name1()
    {
		
		$location = $this->input->post('location');
		$location = strtolower($location);
		
		$id = $this->uri->segment(3);
		
		$type = $this->input->post('type');
		
		$country = $this->input->post('country');
		$region = $this->input->post('region');
		$state = $this->input->post('state');
		$zone = $this->input->post('zone');
		
		if($type=='district')
		{
			
		
		$this->db->where('parent_id', '0');
		$this->db->where('country', $country);	
		$this->db->where('regionid', $region);	
		$this->db->where('state', $state);	
		$this->db->where('zoneid', $zone);	
					
		}
		else
		if($type=='area')
		{
		
		$district = $this->input->post('district');
			
		$this->db->where('parent_id', $district);
		$this->db->where('country', $country);	
		$this->db->where('regionid', $region);	
		$this->db->where('state', $state);	
		$this->db->where('zoneid', $zone);	
		
		}
		else
		if($type=='centre')
		{
		$district = $this->input->post('district');
		$area = $this->input->post('area');
		
		$this->db->where('parent_id', $area);
		$this->db->where('district', $district);		
		$this->db->where('country', $country);	
		$this->db->where('regionid', $region);	
		$this->db->where('state', $state);	
		$this->db->where('zoneid', $zone);	
				
		}
		
		$this->db->where('location', $location);
		$this->db->where('type', $type);	
		
        
        $this->db->where('id !=', $id);
		$this->db->where('action !=', 'd');
        return $this->db->get('tb_locations')->row();
    }		


function count_all_districts()
{


if($this->uri->segment(3) != '0' && $this->uri->segment(3) != 'All')
{          

$country=$this->uri->segment(3);  
$this->db->where('country', $country);

}


if($this->uri->segment(4) != '0' && $this->uri->segment(4) != 'All')
{	

$state=$this->uri->segment(4);

$this->db->where('state', $state);	

}  


if($this->uri->segment(5) != '0' && $this->uri->segment(5) != 'All')
{	

$status=$this->uri->segment(5);

$this->db->where('status', $status);	

}  


//
if ($this->uri->segment(6) != '0') {

$sess_val = $this->uri->segment(6);
$s_a = str_replace("123", "&", $sess_val);

$s_a = str_replace("-", " ", $s_a);
$this->db->like('location', $s_a);

}
//

if($this->uri->segment(7) != '0' && $this->uri->segment(7) != 'All' && $this->uri->segment(7) != 'no')
{	

$region=$this->uri->segment(7);

$this->db->where('regionid', $region);	

} 


if($this->uri->segment(8) != '0' && $this->uri->segment(8) != 'All' && $this->uri->segment(8) != 'no')
{	

$zone=$this->uri->segment(8);

$this->db->where('zoneid', $zone);	

} 


$this->db->where('parent_id', '0');
$this->db->where('action !=', 'd'); 

$val = $this->db->get('tb_locations');
return $val->num_rows;

}


function list_districts($perpage, $rec_from)
{


if($this->uri->segment(3) != '0' && $this->uri->segment(3) != 'All')
{          

$country=$this->uri->segment(3);  
$this->db->where('country', $country);

}


if($this->uri->segment(4) != '0' && $this->uri->segment(4) != 'All')
{	

$state=$this->uri->segment(4);

$this->db->where('state', $state);	

}  



if($this->uri->segment(5) != '0' && $this->uri->segment(5) != 'All')
{	

$status=$this->uri->segment(5);

$this->db->where('status', $status);	

}  


//
if ($this->uri->segment(6) != '0') {

$sess_val = $this->uri->segment(6);
$s_a = str_replace("123", "&", $sess_val);

$s_a = str_replace("-", " ", $s_a);
$this->db->like('location', $s_a);

}
//

if($this->uri->segment(7) != '0' && $this->uri->segment(7) != 'All' && $this->uri->segment(7) != 'no')
{	

$region=$this->uri->segment(7);

$this->db->where('regionid', $region);	

} 


if($this->uri->segment(8) != '0' && $this->uri->segment(8) != 'All' && $this->uri->segment(8) != 'no')
{	

$zone=$this->uri->segment(8);

$this->db->where('zoneid', $zone);	

} 


$this->db->where('parent_id', '0');     		
$this->db->order_by('id', 'DESC');
$this->db->where('action !=', 'd');


$this->db->limit($perpage, $rec_from);
return $this->db->get('tb_locations')->result();
}		



function editdistrict($id)
    {

		
	$location = $this->input->post('location');
	$location = strtolower($location);
	

	
	$state = $this->input->post('state');
	$country = $this->input->post('country');
	
	$region = $this->input->post('region');
	$zone = $this->input->post('zone');
	
	//$country_details = $this->admin_model->GetByRow('tb_country', $country, 'id');
	//$state_details = $this->admin_model->GetByRow('tb_country', $state, 'id');
	
	//$region_details = $this->admin_model->GetByRow('tb_country', $region, 'id');
	//$zone_details = $this->admin_model->GetByRow('tb_country', $zone, 'id');
	
	$data = array(
	'parent_id' => '0',
	'type' => 'district',
	'status' => $this->input->post('status'),
	'country' => $this->input->post('country'),
	'regionid' => $this->input->post('region'),
	'state' => $this->input->post('state'),
	'zoneid' => $this->input->post('zone'),
	//'statename' => $state_details->country,
	//'countryname' => $country_details->country,
	//'regionname' => $region_details->country,
	//'zonename' => $zone_details->country,
	'location' => $location,
	
	);
		
	
        $this->db->where('id', $id);
        $this->db->update('tb_locations', $data);
		
		
		/*$data3 = array( 
		
				'districtname' => $location,
								
         	   );
			
       
        $this->db->where('parent_id', $id);
        $this->db->update('tb_locations', $data3);
		
		
		$data5 = array( 
		
				'districtname' => $location,
								
         	   );
			
       
        $this->db->where('district', $id);
        $this->db->update('tb_locations', $data5);		
		
		
		$data4 = array( 
		
				'districtname' => $location,
				
								
         	   );
			
       
        $this->db->where('district', $id);
        $this->db->update('tb_shops', $data4);	*/
		
		
		
		
		
    }



function insertlocation()
	{
		
	
   $location = $this->input->post('location');
	$location = strtolower($location);
	
	
	$state = $this->input->post('state');
	$country = $this->input->post('country');
	
	$region = $this->input->post('region');
	$zone = $this->input->post('zone');
	
	$district = $this->input->post('district');
	
	//$country_details = $this->admin_model->GetByRow('tb_country', $country, 'id');
	//$state_details = $this->admin_model->GetByRow('tb_country', $state, 'id');
	
	//$region_details = $this->admin_model->GetByRow('tb_country', $region, 'id');
	//$zone_details = $this->admin_model->GetByRow('tb_country', $zone, 'id');
	
	//$district_details = $this->admin_model->GetByRow('tb_locations', $district, 'id');
	
	
	$this->db->where('parent_id', $district);
	$this->db->where('country', $country);	
	$this->db->where('regionid', $region);	
	$this->db->where('state', $state);	
	$this->db->where('zoneid', $zone);	
	
	$this->db->where('location', $location);
	$this->db->where('type', 'area');	
	$this->db->where('action !=', 'd');
	$check=  $this->db->get('tb_locations')->row();
	
	if($check)
	{
		echo 'yes';
	}
	else
	{
	
	
	$data = array(
	'parent_id' => $this->input->post('district'),
	'type' => 'area',
	'status' => 'a',
	'country' => $this->input->post('country'),
	'regionid' => $this->input->post('region'),
	'state' => $this->input->post('state'),
	'zoneid' => $this->input->post('zone'),
	//'statename' => $state_details->country,
	//'countryname' => $country_details->country,
	//'regionname' => $region_details->country,
	//'zonename' => $zone_details->country,
	//'districtname' => $district_details->location,
	'date' => date('d-m-Y H:i:s'),
	'date2' => date('Y-m-d H:i:s'),
	'location' => $location,
	
	);
		
	$this->db->insert('tb_locations', $data);	
	
	echo 'no';
	
	}
	
	
	}	



function count_all_locations()
{


if($this->uri->segment(3) != '0' && $this->uri->segment(3) != 'All')
{          

$country=$this->uri->segment(3);  
$this->db->where('country', $country);

}


if($this->uri->segment(4) != '0' && $this->uri->segment(4) != 'All')
{	

$state=$this->uri->segment(4);

$this->db->where('state', $state);	

}  


if($this->uri->segment(5) != '0' && $this->uri->segment(5) != 'All')
{	

$status=$this->uri->segment(5);

$this->db->where('status', $status);	

}  


//
if ($this->uri->segment(6) != '0') {

$sess_val = $this->uri->segment(6);
$s_a = str_replace("123", "&", $sess_val);

$s_a = str_replace("-", " ", $s_a);
$this->db->like('location', $s_a);

}
//

if($this->uri->segment(7) != '0' && $this->uri->segment(7) != 'All')
{	

$district=$this->uri->segment(7);

$this->db->where('parent_id', $district);	

} 

if($this->uri->segment(8) != '0' && $this->uri->segment(8) != 'All' && $this->uri->segment(8) != 'no')
{	

$region=$this->uri->segment(8);

$this->db->where('regionid', $region);	

}

if($this->uri->segment(9) != '0' && $this->uri->segment(9) != 'All' && $this->uri->segment(9) != 'no')
{	

$zone=$this->uri->segment(9);

$this->db->where('zoneid', $zone);	

}


$this->db->where('type', 'area'); 
$this->db->where('action !=', 'd');

$val = $this->db->get('tb_locations');
return $val->num_rows;

}


function list_locations($perpage, $rec_from)
{


if($this->uri->segment(3) != '0' && $this->uri->segment(3) != 'All')
{          

$country=$this->uri->segment(3);  
$this->db->where('country', $country);

}


if($this->uri->segment(4) != '0' && $this->uri->segment(4) != 'All')
{	

$state=$this->uri->segment(4);

$this->db->where('state', $state);	

}  



if($this->uri->segment(5) != '0' && $this->uri->segment(5) != 'All')
{	

$status=$this->uri->segment(5);

$this->db->where('status', $status);	

}  


//
if ($this->uri->segment(6) != '0') {

$sess_val = $this->uri->segment(6);
$s_a = str_replace("123", "&", $sess_val);

$s_a = str_replace("-", " ", $s_a);
$this->db->like('location', $s_a);

}
//

if($this->uri->segment(7) != '0' && $this->uri->segment(7) != 'All')
{	

$district=$this->uri->segment(7);

$this->db->where('parent_id', $district);	

} 

if($this->uri->segment(8) != '0' && $this->uri->segment(8) != 'All' && $this->uri->segment(8) != 'no')
{	

$region=$this->uri->segment(8);

$this->db->where('regionid', $region);	

}

if($this->uri->segment(9) != '0' && $this->uri->segment(9) != 'All' && $this->uri->segment(9) != 'no')
{	

$zone=$this->uri->segment(9);

$this->db->where('zoneid', $zone);	

}


$this->db->where('type', 'area');    		
$this->db->order_by('id', 'DESC');
$this->db->where('action !=', 'd');


$this->db->limit($perpage, $rec_from);
return $this->db->get('tb_locations')->result();
}		



function editlocation($id)
    {
    $location = $this->input->post('location');
	$location = strtolower($location);
	
	
	$state = $this->input->post('state');
	$country = $this->input->post('country');
	
	$region = $this->input->post('region');
	$zone = $this->input->post('zone');
	
	$district = $this->input->post('district');
	
	//$country_details = $this->admin_model->GetByRow('tb_country', $country, 'id');
	//$state_details = $this->admin_model->GetByRow('tb_country', $state, 'id');
	
	//$region_details = $this->admin_model->GetByRow('tb_country', $region, 'id');
	//$zone_details = $this->admin_model->GetByRow('tb_country', $zone, 'id');
	
	//$district_details = $this->admin_model->GetByRow('tb_locations', $district, 'id');
	
	$data = array(
	'parent_id' => $this->input->post('district'),
	'type' => 'area',
	'status' => $this->input->post('status'),
	'country' => $this->input->post('country'),
	'regionid' => $this->input->post('region'),
	'state' => $this->input->post('state'),
	'zoneid' => $this->input->post('zone'),
	//'statename' => $state_details->country,
	//'countryname' => $country_details->country,
	//'regionname' => $region_details->country,
	//'zonename' => $zone_details->country,
	//'districtname' => $district_details->location,	
	'location' => $location,
	
	);
	
        $this->db->where('id', $id);
        $this->db->update('tb_locations', $data);
		
		
		
				
		/*$data3 = array( 
		
				'areaname' => $location,
								
         	   );
			
       
        $this->db->where('parent_id', $id);
        $this->db->update('tb_locations', $data3);	
		
		
		
		$data4 = array( 
		
				'areaname' => $location,
				
								
         	   );
			
       
        $this->db->where('areaid', $id);
        $this->db->update('tb_shops', $data4);	*/
		
    }




function insertcentre()
	{
		
	
    $location = $this->input->post('location');
	$location = strtolower($location);
	
	
	$state = $this->input->post('state');
	$country = $this->input->post('country');
	
	$region = $this->input->post('region');
	$zone = $this->input->post('zone');
	
	$district = $this->input->post('district');
	$area = $this->input->post('area');
	
	//$country_details = $this->admin_model->GetByRow('tb_country', $country, 'id');
	//$state_details = $this->admin_model->GetByRow('tb_country', $state, 'id');
	
	//$region_details = $this->admin_model->GetByRow('tb_country', $region, 'id');
	//$zone_details = $this->admin_model->GetByRow('tb_country', $zone, 'id');
	
	//$district_details = $this->admin_model->GetByRow('tb_locations', $district, 'id');
	//$area_details = $this->admin_model->GetByRow('tb_locations', $area, 'id');
	
	
		$this->db->where('parent_id', $area);
		$this->db->where('district', $district);		
		$this->db->where('country', $country);	
		$this->db->where('regionid', $region);	
		$this->db->where('state', $state);	
		$this->db->where('zoneid', $zone);	
		
		$this->db->where('location', $location);
		$this->db->where('type', 'centre');	
		$this->db->where('action !=', 'd');
		$check = $this->db->get('tb_locations')->row();
		
	if($check)
	{
		echo 'yes';
	}
	else
	{
		
	
	$data = array(
	'parent_id' => $this->input->post('area'),
	'type' => 'centre',
	'status' => 'a',
	'country' => $this->input->post('country'),
	'regionid' => $this->input->post('region'),
	'state' => $this->input->post('state'),
	'zoneid' => $this->input->post('zone'),
	'district' => $this->input->post('district'),
	//'statename' => $state_details->country,
	//'countryname' => $country_details->country,
	//'regionname' => $region_details->country,
	//'zonename' => $zone_details->country,
	//'districtname' => $district_details->location,
	//'areaname' => $area_details->location,
	'date' => date('d-m-Y H:i:s'),
	'date2' => date('Y-m-d H:i:s'),
	'location' => $location,
	
	);
	
	$this->db->insert('tb_locations', $data);
	
	echo 'no';
	
	}
	
	
	}	




function count_all_centre()
{


if($this->uri->segment(3) != '0' && $this->uri->segment(3) != 'All')
{          

$country=$this->uri->segment(3);  
$this->db->where('country', $country);

}


if($this->uri->segment(4) != '0' && $this->uri->segment(4) != 'All')
{	

$state=$this->uri->segment(4);

$this->db->where('state', $state);	

}  


if($this->uri->segment(5) != '0' && $this->uri->segment(5) != 'All')
{	

$status=$this->uri->segment(5);

$this->db->where('status', $status);	

}  


//
if ($this->uri->segment(6) != '0') {

$sess_val = $this->uri->segment(6);
$s_a = str_replace("123", "&", $sess_val);

$s_a = str_replace("-", " ", $s_a);
$this->db->like('location', $s_a);

}
//

if($this->uri->segment(7) != '0' && $this->uri->segment(7) != 'All')
{	

$district=$this->uri->segment(7);

$this->db->where('district', $district);	

} 

if($this->uri->segment(8) != '0' && $this->uri->segment(8) != 'All' && $this->uri->segment(8) != 'no')
{	

$region=$this->uri->segment(8);

$this->db->where('regionid', $region);	

}

if($this->uri->segment(9) != '0' && $this->uri->segment(9) != 'All' && $this->uri->segment(9) != 'no')
{	

$zone=$this->uri->segment(9);

$this->db->where('zoneid', $zone);	

}


if($this->uri->segment(10) != '0' && $this->uri->segment(10) != 'All' && $this->uri->segment(10) != 'no')
{	

$area=$this->uri->segment(10);

$this->db->where('parent_id', $area);	

}


$this->db->where('type', 'centre'); 
$this->db->where('action !=', 'd');

$val = $this->db->get('tb_locations');
return $val->num_rows;

}


function list_centre($perpage, $rec_from)
{


if($this->uri->segment(3) != '0' && $this->uri->segment(3) != 'All')
{          

$country=$this->uri->segment(3);  
$this->db->where('country', $country);

}


if($this->uri->segment(4) != '0' && $this->uri->segment(4) != 'All')
{	

$state=$this->uri->segment(4);

$this->db->where('state', $state);	

}  



if($this->uri->segment(5) != '0' && $this->uri->segment(5) != 'All')
{	

$status=$this->uri->segment(5);

$this->db->where('status', $status);	

}  


//
if ($this->uri->segment(6) != '0') {

$sess_val = $this->uri->segment(6);
$s_a = str_replace("123", "&", $sess_val);

$s_a = str_replace("-", " ", $s_a);
$this->db->like('location', $s_a);

}
//

if($this->uri->segment(7) != '0' && $this->uri->segment(7) != 'All')
{	

$district=$this->uri->segment(7);

$this->db->where('district', $district);	

} 

if($this->uri->segment(8) != '0' && $this->uri->segment(8) != 'All' && $this->uri->segment(8) != 'no')
{	

$region=$this->uri->segment(8);

$this->db->where('regionid', $region);	

}

if($this->uri->segment(9) != '0' && $this->uri->segment(9) != 'All' && $this->uri->segment(9) != 'no')
{	

$zone=$this->uri->segment(9);

$this->db->where('zoneid', $zone);	

}


if($this->uri->segment(10) != '0' && $this->uri->segment(10) != 'All' && $this->uri->segment(10) != 'no')
{	

$area=$this->uri->segment(10);

$this->db->where('parent_id', $area);	

}


$this->db->where('type', 'centre');    		
$this->db->order_by('id', 'DESC');
$this->db->where('action !=', 'd');


$this->db->limit($perpage, $rec_from);
return $this->db->get('tb_locations')->result();
}		



function editcentre($id)
    {

$location = $this->input->post('location');
	$location = strtolower($location);
	
	
	$state = $this->input->post('state');
	$country = $this->input->post('country');
	
	$region = $this->input->post('region');
	$zone = $this->input->post('zone');
	
	$district = $this->input->post('district');
	$area = $this->input->post('area');
	
	//$country_details = $this->admin_model->GetByRow('tb_country', $country, 'id');
	//$state_details = $this->admin_model->GetByRow('tb_country', $state, 'id');
	
	//$region_details = $this->admin_model->GetByRow('tb_country', $region, 'id');
	//$zone_details = $this->admin_model->GetByRow('tb_country', $zone, 'id');
	
	//$district_details = $this->admin_model->GetByRow('tb_locations', $district, 'id');
	//$area_details = $this->admin_model->GetByRow('tb_locations', $area, 'id');
	
	$data = array(
	'parent_id' => $this->input->post('area'),
	'type' => 'centre',
	'status' => $this->input->post('status'),
	'country' => $this->input->post('country'),
	'regionid' => $this->input->post('region'),
	'state' => $this->input->post('state'),
	'zoneid' => $this->input->post('zone'),
	'district' => $this->input->post('district'),
	//'statename' => $state_details->country,
	//'countryname' => $country_details->country,
	//'regionname' => $region_details->country,
	//'zonename' => $zone_details->country,
	//'districtname' => $district_details->location,
	//'areaname' => $area_details->location,
	'location' => $location,
	
	);
	
        $this->db->where('id', $id);
        $this->db->update('tb_locations', $data);
		
		
		/*$data4 = array( 
		
				'centrename' => $location,
				
								
         	   );
			
       
        $this->db->where('centreid', $id);
        $this->db->update('tb_shops', $data4);	*/
		
    }



function select_shop_slug()
    {
        $slug = $this->input->post('slug');
		$catid = $this->input->post('cat');
		$location = $this->input->post('location');
		
		$this->db->where('slug', $slug);
        $this->db->where('parent_cat', $catid);
		$this->db->where('location', $location);
		$this->db->where('action !=', 'd');
        return $this->db->get('tb_shops')->row();
    }
	
    function select_shop_slug1()
    {
        $id = $this->uri->segment(3);
        $slug = $this->input->post('slug');
		$catid = $this->input->post('cat');
		$location = $this->input->post('location');
		
        $this->db->where('slug', $slug);
		$this->db->where('parent_cat', $catid);
		$this->db->where('location', $location);
        $this->db->where('id !=', $id);
		$this->db->where('action !=', 'd');
        return $this->db->get('tb_shops')->row();
    }	
		

function add_shop($filename)
    {

				
	$state = $this->input->post('state');
	$country = $this->input->post('country');
	
	$region = $this->input->post('region');
	$zone = $this->input->post('zone');
	
	$district = $this->input->post('district');
	$area = $this->input->post('area');
	$centre = $this->input->post('centre');
	
	//$country_details = $this->admin_model->GetByRow('tb_country', $country, 'id');
	//$state_details = $this->admin_model->GetByRow('tb_country', $state, 'id');
	
	//$region_details = $this->admin_model->GetByRow('tb_country', $region, 'id');
	//$zone_details = $this->admin_model->GetByRow('tb_country', $zone, 'id');
	
	//$district_details = $this->admin_model->GetByRow('tb_locations', $district, 'id');
	//$area_details = $this->admin_model->GetByRow('tb_locations', $area, 'id');
	//$centre_details = $this->admin_model->GetByRow('tb_locations', $centre, 'id');
					
	   
//



$label = '';
if ($_POST['label'][0] != '') {
for ($i = 0; $i < count($_POST['label']); $i++) {
$label .= $_POST['label'][$i] . "+";
}
$label = '+' . $label;
}


$text = '';
if ($_POST['text'][0] != '') {
for ($i = 0; $i < count($_POST['text']); $i++) {
$text .= $_POST['text'][$i] . "+";
}
$text = '+' . $text;
}



//


	if($this->input->post('longitude') == '' || $this->input->post('latitude') == '')
	{
	
	$longitude =  '' ;
	
	$latitude =  '' ;
	
	$marked = 'no';
	
	}
	else
	{
	
	$longitude =  $this->input->post('longitude') ;
	
	$latitude =  $this->input->post('latitude') ;
	
	$marked = 'yes';
	
	}   
	   
	   
	   
        $data = array(
			
			'country' => $this->input->post('country'),	
			'regionid' => $this->input->post('region'),
			'state' => $this->input->post('state'),	
			'zoneid' => $this->input->post('zone'),		
			'district' => $this->input->post('district'),
			'areaid' => $this->input->post('area'),
			'centreid' => $this->input->post('centre'),
			
			//'centrename' => $centre_details->location,	
			//'areaname' => $area_details->location,			
			//'districtname' => $district_details->location,	
			//'zonename' => $zone_details->country,		
			//'statename' => $state_details->country,
			//'regionname' => $region_details->country,				
			//'countryname' => $country_details->country,	
					
			'name' => $this->input->post('name'),					
			'phone' => $this->input->post('phone'),
			'email' => $this->input->post('email'),
			'address' => $this->input->post('address'),
			
			'category_picture' => $filename,
			
			'contactname' => $this->input->post('contactname'),
			'contactnumber' => $this->input->post('contactnumber'),
			'tin' => $this->input->post('tin'),
			'pin' => $this->input->post('pin'),
			'cst' => $this->input->post('cst'),
			'whatsapp' => $this->input->post('whatsapp'),
			
			'label' => $label,
			'text' => $text,  
			
			'longitude' => $longitude,
			'latitude' => $latitude,
			'marked' => $marked,  	
					
			
						
			'status' => 'a',
			'date' => date('Y-m-d'),
			'datetime' => date('Y-m-d H:i:s'),
			
			
			
        );
		
        $this->db->insert('tb_shops', $data);
		
		
		
		
    }



	function count_all_shops()
    {
		

	 
		
	  if($this->uri->segment(3) != '0' && $this->uri->segment(3) != 'All')
	  {
		  
		$country=$this->uri->segment(3);  
		$this->db->where('country', $country);
		  
	  }  
	   
	   if($this->uri->segment(4) != '0' && $this->uri->segment(4) != 'All')
	  {
		  
		$region=$this->uri->segment(4);  
		$this->db->where('regionid', $region);
		  
	   }   
	   
	   
	    if($this->uri->segment(5) != '0' && $this->uri->segment(5) != 'All')
	  {
		  
		$state=$this->uri->segment(5);  
		$this->db->where('state', $state);
		  
	   }  
	   
	    if($this->uri->segment(6) != '0' && $this->uri->segment(6) != 'All')
	  {
		  
		$zone=$this->uri->segment(6);  
		$this->db->where('zoneid', $zone);
		  
	   }  
	   
	   if($this->uri->segment(7) != '0' && $this->uri->segment(7) != 'All')
	  {
		  
		$district=$this->uri->segment(7);  
		$this->db->where('district', $district);
		  
	   }  
	   
	    if($this->uri->segment(8) != '0' && $this->uri->segment(8) != 'All')
	  {
		  
		$area=$this->uri->segment(8);  
		$this->db->where('areaid', $area);
		  
	   }  
	   
	   if($this->uri->segment(9) != '0' && $this->uri->segment(9) != 'All')
	  {
		  
		$centre=$this->uri->segment(9);  
		$this->db->where('centreid', $centre);
		  
	   } 
	   
	   if($this->uri->segment(10) != '0' && $this->uri->segment(10) != 'All')
	  {
		  
		$status=$this->uri->segment(10);  
		$this->db->where('status', $centre);
		  
	   }   
		
  		//
        if ($this->uri->segment(11) != '0') {
			
            $sess_val = $this->uri->segment(11);
            $s_a = str_replace("123", "&", $sess_val);
			
            $s_a = str_replace("-", " ", $s_a);
			$s_a = trim($s_a);
            $this->db->like('name', $s_a);
			
        }
		//
		
 
		
       
	   $this->db->where('action !=', 'd');
       
		$val = $this->db->get('tb_shops');
        return $val->num_rows;
		
    }
	
	
	function list_all_shops($perpage, $rec_from)
    {
		
	  
	  if($this->uri->segment(3) != '0' && $this->uri->segment(3) != 'All')
	  {
		  
		$country=$this->uri->segment(3);  
		$this->db->where('country', $country);
		  
	  }  
	   
	   if($this->uri->segment(4) != '0' && $this->uri->segment(4) != 'All')
	  {
		  
		$region=$this->uri->segment(4);  
		$this->db->where('regionid', $region);
		  
	   }   
	   
	   
	    if($this->uri->segment(5) != '0' && $this->uri->segment(5) != 'All')
	  {
		  
		$state=$this->uri->segment(5);  
		$this->db->where('state', $state);
		  
	   }  
	   
	    if($this->uri->segment(6) != '0' && $this->uri->segment(6) != 'All')
	  {
		  
		$zone=$this->uri->segment(6);  
		$this->db->where('zoneid', $zone);
		  
	   }  
	   
	   if($this->uri->segment(7) != '0' && $this->uri->segment(7) != 'All')
	  {
		  
		$district=$this->uri->segment(7);  
		$this->db->where('district', $district);
		  
	   }  
	   
	    if($this->uri->segment(8) != '0' && $this->uri->segment(8) != 'All')
	  {
		  
		$area=$this->uri->segment(8);  
		$this->db->where('areaid', $area);
		  
	   }  
	   
	   if($this->uri->segment(9) != '0' && $this->uri->segment(9) != 'All')
	  {
		  
		$centre=$this->uri->segment(9);  
		$this->db->where('centreid', $centre);
		  
	   } 
	   
	   if($this->uri->segment(10) != '0' && $this->uri->segment(10) != 'All')
	  {
		  
		$status=$this->uri->segment(10);  
		$this->db->where('status', $centre);
		  
	   }   
		
  		//
        if ($this->uri->segment(11) != '0') {
			
            $sess_val = $this->uri->segment(11);
            $s_a = str_replace("123", "&", $sess_val);
			
            $s_a = str_replace("-", " ", $s_a);
			$s_a = trim($s_a);
            $this->db->like('name', $s_a);
			
        }
		//
	  
	  
        
        $this->db->order_by('id', 'DESC');
		$this->db->where('action !=', 'd');
       
        $this->db->limit($perpage, $rec_from);
        return $this->db->get('tb_shops')->result();
		
		
    }	


function edit_shop($id,$filename)
    {


	$state = $this->input->post('state');
	$country = $this->input->post('country');
	
	$region = $this->input->post('region');
	$zone = $this->input->post('zone');
	
	$district = $this->input->post('district');
	$area = $this->input->post('area');
	$centre = $this->input->post('centre');
	
	//$country_details = $this->admin_model->GetByRow('tb_country', $country, 'id');
	//$state_details = $this->admin_model->GetByRow('tb_country', $state, 'id');
	
	//$region_details = $this->admin_model->GetByRow('tb_country', $region, 'id');
	//$zone_details = $this->admin_model->GetByRow('tb_country', $zone, 'id');
	
	//$district_details = $this->admin_model->GetByRow('tb_locations', $district, 'id');
	//$area_details = $this->admin_model->GetByRow('tb_locations', $area, 'id');
	//$centre_details = $this->admin_model->GetByRow('tb_locations', $centre, 'id');
					
	   
//



$label = '';
if ($_POST['label'][0] != '') {
for ($i = 0; $i < count($_POST['label']); $i++) {
$label .= $_POST['label'][$i] . "+";
}
$label = '+' . $label;
}


$text = '';
if ($_POST['text'][0] != '') {
for ($i = 0; $i < count($_POST['text']); $i++) {
$text .= $_POST['text'][$i] . "+";
}
$text = '+' . $text;
}



//


		$row_details = $this->admin_model->GetByRow('tb_shops', $id, 'id');	
	
	   if ($filename != '') {
			
            $filename = $filename;
			
        } else {
			
            $filename = $row_details->category_picture;
			
        }
	   

		
		if($this->input->post('longitude') == '' || $this->input->post('latitude') == '')
		{
		
		$longitude =  '' ;
		
		$latitude =  '' ;
		
		
		}
		else
		{
		
		$longitude =  $this->input->post('longitude') ;
		
		$latitude =  $this->input->post('latitude') ;
		
		}


	   
	   
        $data = array(
			
			'country' => $this->input->post('country'),	
			'regionid' => $this->input->post('region'),
			'state' => $this->input->post('state'),	
			'zoneid' => $this->input->post('zone'),		
			'district' => $this->input->post('district'),
			'areaid' => $this->input->post('area'),
			'centreid' => $this->input->post('centre'),
			
			//'centrename' => $centre_details->location,	
			//'areaname' => $area_details->location,			
			//'districtname' => $district_details->location,	
			//'zonename' => $zone_details->country,		
			//'statename' => $state_details->country,
			//'regionname' => $region_details->country,				
			//'countryname' => $country_details->country,	
					
			'name' => $this->input->post('name'),					
			'phone' => $this->input->post('phone'),
			'email' => $this->input->post('email'),
			'address' => $this->input->post('address'),
			
			'category_picture' => $filename,
			
			'contactname' => $this->input->post('contactname'),
			'contactnumber' => $this->input->post('contactnumber'),
			'tin' => $this->input->post('tin'),
			'pin' => $this->input->post('pin'),
			'cst' => $this->input->post('cst'),
			'whatsapp' => $this->input->post('whatsapp'),
			
			'label' => $label,
			'text' => $text,  
			
			'longitude' => $longitude,
			'latitude' => $latitude,
			'marked' => $this->input->post('marked'),  
						
			'status' => $this->input->post('status'),
			
			
        );
		
		
		
		
        $this->db->where('id', $id);
        $this->db->update('tb_shops', $data);
		
		
		

		
    }		


function trashById($table, $id, $field)
    {
		
        
$this->db->where(array($field => $id));

$data = array(

'action' => 'd',

);

$this->db->where('id', $id);
$this->db->update($table, $data);

		
    }	




	


function select_country_name()
    {

		$location = $this->input->post('location');
		$location = strtolower($location);
		
		$type = $this->input->post('type');
		
		if($type=='country')
		{		
		$this->db->where('parent_id', '0');	
			
		}
		else
		if($type=='region')
		{
		$country = $this->input->post('country');
		
		$this->db->where('parent_id', $country);			
		}
		else
		if($type=='state')
		{
		$country = $this->input->post('country');
		$region = $this->input->post('region');
		
		$this->db->where('countryid', $country);	
		$this->db->where('parent_id', $region);			
		}
		else
		if($type=='zone')
		{
		$country = $this->input->post('country');
		$region = $this->input->post('region');
		$state = $this->input->post('state');
		
		$this->db->where('countryid', $country);	
		$this->db->where('regionid', $region);
		$this->db->where('parent_id', $state);			
		}
		
      
		$this->db->where('type', $type);	
	    $this->db->where('action !=', 'd');		
		$this->db->where('country', $location);		
        return $this->db->get('tb_country')->row();
    }


function select_country_name1()
    {
		
		
		$location = $this->input->post('location');	
		$location = strtolower($location);
		
		$type = $this->input->post('type');
		$id = $this->uri->segment(3);
		
		if($type=='country')
		{		
		$this->db->where('parent_id', '0');	
			
		}
		else
		if($type=='region')
		{
		$country = $this->input->post('country');
		
		$this->db->where('parent_id', $country);			
		}
		else
		if($type=='state')
		{
		$country = $this->input->post('country');
		$region = $this->input->post('region');
		
		$this->db->where('countryid', $country);	
		$this->db->where('parent_id', $region);			
		}
		else
		if($type=='zone')
		{
		$country = $this->input->post('country');
		$region = $this->input->post('region');
		$state = $this->input->post('state');
		
		$this->db->where('countryid', $country);	
		$this->db->where('regionid', $region);
		$this->db->where('parent_id', $state);			
		}
			
		$this->db->where('type', $type);
        $this->db->where('id !=', $id);
		$this->db->where('action !=', 'd');
		$this->db->where('country', $location);		
        return $this->db->get('tb_country')->row();
    }	
	


function insertcountry()
	{
		
	$location = $this->input->post('location');
	$location = strtolower($location);
	
			
		$this->db->where('parent_id', '0');			
		$this->db->where('type', 'country');	
	    $this->db->where('action !=', 'd');		
		$this->db->where('country', $location);		
        $check =  $this->db->get('tb_country')->row();
		
	if($check)
	{	
		echo 'yes';
	}
	else
	{
			
		$data = array(
		'parent_id' => '0',
		'status' => 'a',
		'type' => 'country',
		'country' => $location,
		
		'date' => date('d-m-Y H:i:s'),
		'date2' => date('Y-m-d H:i:s'),
		
		);
		
		$this->db->insert('tb_country', $data);
		
		echo 'no';
	
	}
	
	}		



function count_all_country()
{

if($this->uri->segment(3) != '0' && $this->uri->segment(3) != 'All')
{	

$status=$this->uri->segment(3);

$this->db->where('status', $status);	

}  


//
if ($this->uri->segment(4) != '0') {

$sess_val = $this->uri->segment(4);
$s_a = str_replace("123", "&", $sess_val);

$s_a = str_replace("-", " ", $s_a);
$this->db->like('country', $s_a);

}
//


$this->db->where('type', 'country');  
$this->db->where('action !=', 'd'); 

$val = $this->db->get('tb_country');
return $val->num_rows;

}


function list_country($perpage, $rec_from)
{



if($this->uri->segment(3) != '0' && $this->uri->segment(3) != 'All')
{	

$status=$this->uri->segment(3);

$this->db->where('status', $status);	

}  


//
if ($this->uri->segment(4) != '0') {

$sess_val = $this->uri->segment(4);
$s_a = str_replace("123", "&", $sess_val);

$s_a = str_replace("-", " ", $s_a);
$this->db->like('country', $s_a);

}
//


$this->db->where('type', 'country');  
$this->db->order_by('country', 'ASC');
$this->db->where('action !=', 'd');


$this->db->limit($perpage, $rec_from);
return $this->db->get('tb_country')->result();
}		



function editcountry($id)
    {
  
	$location = $this->input->post('location');
	$location = strtolower($location);
		
		$data = array(
		
		'parent_id' => '0',
		'status' => $this->input->post('status'),
		'country' => $location,
		
		'type' => 'country',
		
		);
	
        $this->db->where('id', $id);
        $this->db->update('tb_country', $data);
		
		
	
		/*$data3 = array( 
		
				'countryname' => $this->input->post('location'),
								
         	   );
			
       
        $this->db->where('country', $id);
        $this->db->update('tb_locations', $data3);	
		
		
		$data4 = array( 
		
				'countryname' => $this->input->post('location'),
			
								
         	   );
			
       
        $this->db->where('country', $id);
        $this->db->update('tb_shops', $data4);	*/
		
		
		
		
		
    }



function insertregion()
	{
	
	$location = $this->input->post('location');
	$location = strtolower($location);	
	
	$country = $this->input->post('country');
	
	$this->db->where('parent_id', $country);
	$this->db->where('type', 'region');	
	$this->db->where('action !=', 'd');		
	$this->db->where('country', $location);		
	$check =  $this->db->get('tb_country')->row();	
	
	if($check)
	{
		echo 'yes';
	}
	else
	{
	
		$data = array(
		'parent_id' => $this->input->post('country'),
		'status' => 'a',
		'country' => $location,
		'type' => 'region',
		'date' => date('d-m-Y H:i:s'),
		'date2' => date('Y-m-d H:i:s'),
		
		);
		
		$this->db->insert('tb_country', $data);
		
		echo 'no';
	
	}
	
	}		



function count_all_region()
{


if($this->uri->segment(3) != '0' && $this->uri->segment(3) != 'All')
{          

$country=$this->uri->segment(3);  
$this->db->where('parent_id', $country);

}



if($this->uri->segment(4) != '0' && $this->uri->segment(4) != 'All')
{	

$status=$this->uri->segment(4);

$this->db->where('status', $status);	

}  


//
if ($this->uri->segment(5) != '0') {

$sess_val = $this->uri->segment(5);
$s_a = str_replace("123", "&", $sess_val);

$s_a = str_replace("-", " ", $s_a);
$this->db->like('country', $s_a);

}
//

if($this->uri->segment(6) != '0' && $this->uri->segment(6) != 'All' && $this->uri->segment(6) != 'no')
{	

$top=$this->uri->segment(6);

$this->db->where('top', $top);	

} 


$this->db->where('type', 'region'); 
$this->db->where('action !=', 'd'); 

$val = $this->db->get('tb_country');
return $val->num_rows;

}


function list_region($perpage, $rec_from)
{


if($this->uri->segment(3) != '0' && $this->uri->segment(3) != 'All')
{          

$country=$this->uri->segment(3);  
$this->db->where('parent_id', $country);

}



if($this->uri->segment(4) != '0' && $this->uri->segment(4) != 'All')
{	

$status=$this->uri->segment(4);

$this->db->where('status', $status);	

}  


//
if ($this->uri->segment(5) != '0') {

$sess_val = $this->uri->segment(5);
$s_a = str_replace("123", "&", $sess_val);

$s_a = str_replace("-", " ", $s_a);
$this->db->like('country', $s_a);

}//


if($this->uri->segment(6) != '0' && $this->uri->segment(6) != 'All' && $this->uri->segment(6) != 'no')
{	

$top=$this->uri->segment(6);

$this->db->where('top', $top);	

} 


$this->db->where('type', 'region');    		
$this->db->order_by('country', 'ASC');
$this->db->where('action !=', 'd');


$this->db->limit($perpage, $rec_from);
return $this->db->get('tb_country')->result();
}		



function editregion($id)
    {
		
	$location = $this->input->post('location');
	$location = strtolower($location);	
     
		$data = array(
		'parent_id' => $this->input->post('country'),
		'status' => $this->input->post('status'),
		'country' => $location,
		'type' => 'region',
		
				
		);
	
        $this->db->where('id', $id);
        $this->db->update('tb_country', $data);
		
		
		/*$data3 = array( 
		
				'regionname' => $this->input->post('location'),
								
         	   );
			
       
        $this->db->where('regionid', $id);
        $this->db->update('tb_locations', $data3);	
		
		
		$data4 = array( 
		
				'regionname' => $this->input->post('location'),
				
								
         	   );
			
       
        $this->db->where('regionid', $id);
        $this->db->update('tb_shops', $data4);	*/
		
		
		
    }		
	


function insertstate()
	{
	
	$location = $this->input->post('location');
	$location = strtolower($location);
	
	
	$country = $this->input->post('country');
	$region = $this->input->post('region');
	
	$this->db->where('countryid', $country);	
	$this->db->where('parent_id', $region);	
	$this->db->where('type', 'state');	
	$this->db->where('action !=', 'd');		
	$this->db->where('country', $location);		
	$check =  $this->db->get('tb_country')->row();
	
	if($check)
	{
		echo 'yes';
	}
	else
	{
		
	
		$data = array(
		'countryid' => $this->input->post('country'),
		'parent_id' => $this->input->post('region'),
		'status' => 'a',
		'type' => 'state',
		'country' => $location,
		'date' => date('d-m-Y H:i:s'),
		'date2' => date('Y-m-d H:i:s'),
		
		);
		
		$this->db->insert('tb_country', $data);
		
		echo 'no';
	
	}
	
	}	
	


	




function count_all_state()
{


if($this->uri->segment(3) != '0' && $this->uri->segment(3) != 'All')
{          

$country=$this->uri->segment(3);  
$this->db->where('countryid', $country);

}



if($this->uri->segment(4) != '0' && $this->uri->segment(4) != 'All')
{	

$status=$this->uri->segment(4);

$this->db->where('status', $status);	

}  


//
if ($this->uri->segment(5) != '0') {

$sess_val = $this->uri->segment(5);
$s_a = str_replace("123", "&", $sess_val);

$s_a = str_replace("-", " ", $s_a);
$this->db->like('country', $s_a);

}//


if($this->uri->segment(6) != '0' && $this->uri->segment(6) != 'All' && $this->uri->segment(6) != 'no')
{	

$region=$this->uri->segment(6);

$this->db->where('parent_id', $region);	

} 


$this->db->where('type', 'state');
$this->db->where('action !=', 'd'); 

$val = $this->db->get('tb_country');
return $val->num_rows;

}


function list_state($perpage, $rec_from)
{


if($this->uri->segment(3) != '0' && $this->uri->segment(3) != 'All')
{          

$country=$this->uri->segment(3);  
$this->db->where('countryid', $country);

}



if($this->uri->segment(4) != '0' && $this->uri->segment(4) != 'All')
{	

$status=$this->uri->segment(4);

$this->db->where('status', $status);	

}  


//
if ($this->uri->segment(5) != '0') {

$sess_val = $this->uri->segment(5);
$s_a = str_replace("123", "&", $sess_val);

$s_a = str_replace("-", " ", $s_a);
$this->db->like('country', $s_a);

}//


if($this->uri->segment(6) != '0' && $this->uri->segment(6) != 'All' && $this->uri->segment(6) != 'no')
{	

$region=$this->uri->segment(6);

$this->db->where('parent_id', $region);	

} 


$this->db->where('type', 'state');    		
$this->db->order_by('country', 'ASC');
$this->db->where('action !=', 'd');


$this->db->limit($perpage, $rec_from);
return $this->db->get('tb_country')->result();
}		



function editstate($id)
    {
		
	$location = $this->input->post('location');
	$location = strtolower($location);	
     
		$data = array(
		'countryid' => $this->input->post('country'),
		'parent_id' => $this->input->post('region'),
		'status' => $this->input->post('status'),
		'country' => $location,
		'type' => 'state',
		
				
		);
	
        $this->db->where('id', $id);
        $this->db->update('tb_country', $data);
		
		
		/*$data3 = array( 
		
				'statename' => $this->input->post('location'),
								
         	   );
			
       
        $this->db->where('state', $id);
        $this->db->update('tb_locations', $data3);	
		
		
		$data4 = array( 
		
				'statename' => $this->input->post('location'),
				
								
         	   );
			
       
        $this->db->where('state', $id);
        $this->db->update('tb_shops', $data4);	*/
		
		
		
    }
	


function insertzone()
	{
		
	$location = $this->input->post('location');
	$location = strtolower($location);	
	
	$country = $this->input->post('country');
	$region = $this->input->post('region');
	$state = $this->input->post('state');
	
	$this->db->where('countryid', $country);	
	$this->db->where('regionid', $region);
	$this->db->where('parent_id', $state);	
	$this->db->where('type', 'zone');	
	$this->db->where('action !=', 'd');		
	$this->db->where('country', $location);		
	$check =  $this->db->get('tb_country')->row();	
	
	if($check)
	{
		echo 'yes';
	}
	else
	{
	
		$data = array(
		'countryid' => $this->input->post('country'),
		'regionid' => $this->input->post('region'),
		'parent_id' => $this->input->post('state'),
		'status' => 'a',
		'type' => 'zone',
		'country' => $location,
		'date' => date('d-m-Y H:i:s'),
		'date2' => date('Y-m-d H:i:s'),
		
		);
		
		$this->db->insert('tb_country', $data);
		
		echo 'no';
	
	}
	
	}	




function count_all_zone()
{


if($this->uri->segment(3) != '0' && $this->uri->segment(3) != 'All')
{          

$country=$this->uri->segment(3);  
$this->db->where('countryid', $country);

}



if($this->uri->segment(4) != '0' && $this->uri->segment(4) != 'All')
{	

$status=$this->uri->segment(4);

$this->db->where('status', $status);	

}  


//
if ($this->uri->segment(5) != '0') {

$sess_val = $this->uri->segment(5);
$s_a = str_replace("123", "&", $sess_val);

$s_a = str_replace("-", " ", $s_a);
$this->db->like('country', $s_a);

}//


if($this->uri->segment(6) != '0' && $this->uri->segment(6) != 'All' && $this->uri->segment(6) != 'no')
{	

$region=$this->uri->segment(6);

$this->db->where('regionid', $region);	

} 


if($this->uri->segment(7) != '0' && $this->uri->segment(7) != 'All' && $this->uri->segment(7) != 'no')
{	

$state=$this->uri->segment(7);

$this->db->where('parent_id', $state);	

}


$this->db->where('type', 'zone');
$this->db->where('action !=', 'd'); 

$val = $this->db->get('tb_country');
return $val->num_rows;

}


function list_zone($perpage, $rec_from)
{


if($this->uri->segment(3) != '0' && $this->uri->segment(3) != 'All')
{          

$country=$this->uri->segment(3);  
$this->db->where('countryid', $country);

}



if($this->uri->segment(4) != '0' && $this->uri->segment(4) != 'All')
{	

$status=$this->uri->segment(4);

$this->db->where('status', $status);	

}  


//
if ($this->uri->segment(5) != '0') {

$sess_val = $this->uri->segment(5);
$s_a = str_replace("123", "&", $sess_val);

$s_a = str_replace("-", " ", $s_a);
$this->db->like('country', $s_a);

}//


if($this->uri->segment(6) != '0' && $this->uri->segment(6) != 'All' && $this->uri->segment(6) != 'no')
{	

$region=$this->uri->segment(6);

$this->db->where('regionid', $region);	

} 


if($this->uri->segment(7) != '0' && $this->uri->segment(7) != 'All' && $this->uri->segment(7) != 'no')
{	

$state=$this->uri->segment(7);

$this->db->where('parent_id', $state);	

} 


$this->db->where('type', 'zone');    		
$this->db->order_by('country', 'ASC');
$this->db->where('action !=', 'd');


$this->db->limit($perpage, $rec_from);
return $this->db->get('tb_country')->result();
}		



function editzone($id)
    {
		
	$location = $this->input->post('location');
	$location = strtolower($location);
     
		$data = array(
		'countryid' => $this->input->post('country'),
		'regionid' => $this->input->post('region'),
		'parent_id' => $this->input->post('state'),
		'status' => $this->input->post('status'),
		'country' => $location,
		'type' => 'zone',
		
				
		);
	
        $this->db->where('id', $id);
        $this->db->update('tb_country', $data);
		
		
		/*$data3 = array( 
		
				'regionname' => $this->input->post('location'),
								
         	   );
			
       
        $this->db->where('regionid', $id);
        $this->db->update('tb_locations', $data3);	
		
		
		$data4 = array( 
		
				'regionname' => $this->input->post('location'),
				
								
         	   );
			
       
        $this->db->where('regionid', $id);
        $this->db->update('tb_shops', $data4);	*/
		
		
		
    }	
		
	

	function bulk_locations_upload()
    {
		ini_set('max_execution_time', 9000000); 	
		
        $ftyp = $_FILES['sel_file']['type'];
        $fname = $_FILES['sel_file']['name'];
        $chk_ext = explode(".",$fname);
        if(strtolower($chk_ext[1]) == "csv")
        {
            $filename = $_FILES['sel_file']['tmp_name'];
            $handle = fopen($filename, "r");
            while (($csvdata = fgetcsv($handle, 1000, ",")) !== FALSE)
            {
                if (!is_numeric($csvdata[0]))
                {
				
                }
                else{
                
                    $location=$this->admin_model->clean_string($csvdata[1]);
					$pincode=$this->admin_model->clean_string($csvdata[2]);
					$state=$this->admin_model->clean_string($csvdata[3]); 
					$district=$this->admin_model->clean_string($csvdata[4]); 
					$Latitude=$this->admin_model->clean_string($csvdata[5]); 
					$Longitude=$this->admin_model->clean_string($csvdata[6]);  
					
					$district=strtolower($district);
					
					$this->db->where('parent_id','0');
					$this->db->where('location',$district);
					$distcrict_data = $this->db->get('tb_locations')->row();
					
					if($distcrict_data)
					{
						
					}
					else
					{
					
						
						$district = strtolower($district);
						
						$districtslugname = $district;
						$districtslugname_clean_name = $this->admin_model->clean_name($districtslugname);						
						
						$state_details = $this->admin_model->GetByRow('tb_country', $state, 'id');
						
						$country_details = $this->admin_model->GetByRow('tb_country', $state_details->parent_id, 'id');
						
						
						
						$data = array(
						'parent_id' => '0',
						'type' => 'admin',
						'status' => 'a',
						'country' => $country_details->id,
						'state' => $state_details->id,
						'statename' => $state_details->country,
						'countryname' => $country_details->country,
						'date' => date('d-m-Y H:i:s'),
						'date2' => date('Y-m-d H:i:s'),
						'location' => $district,
						
						);
						
						$this->db->insert('tb_locations', $data);
						
						$did = $this->db->insert_id();
						
						$this->db->where('id',$did);
					    $distcrict_data = $this->db->get('tb_locations')->row();
						
					}
					
					
						
						$location = strtolower($location);
						
						$slugname = $location;
						$slugname_clean_name = $this->admin_model->clean_name($slugname);
						
						$districtid = $distcrict_data->id;
						
						
						$state_details = $this->admin_model->GetByRow('tb_country', $state, 'id');
						$country_details = $this->admin_model->GetByRow('tb_country', $state_details->parent_id, 'id');
						
						$district_details = $this->admin_model->GetByRow('tb_locations', $districtid, 'id');
						
						$data2 = array(
						'parent_id' => $district_details->id,
						'type' => 'admin',
						'status' => 'a',
						'country' => $country_details->id,
						'state' => $state_details->id,
						'statename' => $state_details->country,
						'countryname' => $country_details->country,
						'districtname' => $district_details->location,
						'longitude' => $Longitude,
						'latitude' => $Latitude,
						'date' => date('d-m-Y H:i:s'),
						'date2' => date('Y-m-d H:i:s'),
						'location' => $location,
						
						'pincode' => $pincode,
						
						);
						
						          

                  
                    $location = strtolower($location);
					$this->db->where('parent_id !=','0');
					$this->db->where('location',$location);
					$this->db->where('pincode',$pincode);
					$check2 = $this->db->get('tb_locations')->row();
					
					
                    if($check2)
                    {
					
											
					$this->db->where('id',$check2->id);
                    $this->db->update('tb_locations', $data2);
						
                      
                    }
                    else
                    {							
						
                       $this->db->insert('tb_locations', $data2);
                    }
					
					
                    /*End insert*/
                }
            }
        }
    }	
	
	
	
 function clean_string($string) {
        $string=trim($string);
       // $string = str_replace(" ", "", $string); // Replaces all spaces.
       // $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
        return $string ;
    }	
	

function get_salesmans_lists()
{

	$this->db->select('*');
	$this->db->from('users')->order_by('meta.s_firstname','ASC');  
	$this->db->join('meta', 'users.id = meta.user_id');
	$this->db->where('users.group_id', '2');	
	$this->db->where('meta.utype', 'salesman');	
	$query = $this->db->get();
	return $query->result();	
	
	
}
	


function adduserlocation()
    {

				
	$state = $this->input->post('state');
	$country = $this->input->post('country');
	
	$region = $this->input->post('region');
	$zone = $this->input->post('zone');
	
	$district = $this->input->post('district');
	$area = $this->input->post('area');
	//$centre = $this->input->post('centre');
	
	//$country_details = $this->admin_model->GetByRow('tb_country', $country, 'id');
	//$state_details = $this->admin_model->GetByRow('tb_country', $state, 'id');
	
	//$region_details = $this->admin_model->GetByRow('tb_country', $region, 'id');
	//$zone_details = $this->admin_model->GetByRow('tb_country', $zone, 'id');
	
	//$district_details = $this->admin_model->GetByRow('tb_locations', $district, 'id');
	//$area_details = $this->admin_model->GetByRow('tb_locations', $area, 'id');
	//$centre_details = $this->admin_model->GetByRow('tb_locations', $centre, 'id');
	
	$userid = $this->input->post('userid');
		
		$this->db->where('country', $country);	
		$this->db->where('regionid', $region);	
		$this->db->where('state', $state);	
		$this->db->where('zoneid', $zone);	
		$this->db->where('district', $district);	
		$this->db->where('areaid', $area);	
		//$this->db->where('centreid', $centre);	
		$this->db->where('userid', $userid);
		
		$check = $this->db->get('tb_user_locations')->row();	
	
	
	if($check)
	{
		echo 'yes';
	}
	else
	{
   
	   
        $data = array(
			
			'country' => $this->input->post('country'),	
			'regionid' => $this->input->post('region'),
			'state' => $this->input->post('state'),	
			'zoneid' => $this->input->post('zone'),		
			'district' => $this->input->post('district'),
			'areaid' => $this->input->post('area'),
			//'centreid' => $this->input->post('centre'),
			
			//'centrename' => $centre_details->location,	
			//'areaname' => $area_details->location,			
			//'districtname' => $district_details->location,	
			//'zonename' => $zone_details->country,		
			//'statename' => $state_details->country,
			//'regionname' => $region_details->country,				
			//'countryname' => $country_details->country,	
			
			'userid' => $this->input->post('userid'),
			
			'date' => date('Y-m-d'),
			'datetime' => date('Y-m-d H:i:s'),
			
			
			
        );
		
        $this->db->insert('tb_user_locations', $data);
		
		echo 'no';
		
	}
		
		
    }	


function count_all_userlocations()
    {
		


		  
		$userid=$this->uri->segment(3);  
		$this->db->where('userid', $userid);
		  
	 if($this->uri->segment(4) != '0' && $this->uri->segment(4) != 'All')
	  {
		  
		$country=$this->uri->segment(4);  
		$this->db->where('country', $country);
		  
	  }  
	   
	   if($this->uri->segment(5) != '0' && $this->uri->segment(5) != 'All')
	  {
		  
		$region=$this->uri->segment(5);  
		$this->db->where('regionid', $region);
		  
	   }   
	   
	   
	    if($this->uri->segment(6) != '0' && $this->uri->segment(6) != 'All')
	  {
		  
		$state=$this->uri->segment(6);  
		$this->db->where('state', $state);
		  
	   }  
	   
	    if($this->uri->segment(7) != '0' && $this->uri->segment(7) != 'All')
	  {
		  
		$zone=$this->uri->segment(7);  
		$this->db->where('zoneid', $zone);
		  
	   }  
	   
	   if($this->uri->segment(8) != '0' && $this->uri->segment(8) != 'All')
	  {
		  
		$district=$this->uri->segment(8);  
		$this->db->where('district', $district);
		  
	   }  
	   
	    if($this->uri->segment(9) != '0' && $this->uri->segment(9) != 'All')
	  {
		  
		$area=$this->uri->segment(9);  
		$this->db->where('areaid', $area);
		  
	   }  
		
 
		
       
	   $this->db->where('action !=', 'd');
       
		$val = $this->db->get('tb_user_locations');
        return $val->num_rows;
		
    }
	
	
	function list_all_userlocations($perpage, $rec_from)
    {
		
	 		$userid=$this->uri->segment(3);  
		$this->db->where('userid', $userid);
		  
	 if($this->uri->segment(4) != '0' && $this->uri->segment(4) != 'All')
	  {
		  
		$country=$this->uri->segment(4);  
		$this->db->where('country', $country);
		  
	  }  
	   
	   if($this->uri->segment(5) != '0' && $this->uri->segment(5) != 'All')
	  {
		  
		$region=$this->uri->segment(5);  
		$this->db->where('regionid', $region);
		  
	   }   
	   
	   
	    if($this->uri->segment(6) != '0' && $this->uri->segment(6) != 'All')
	  {
		  
		$state=$this->uri->segment(6);  
		$this->db->where('state', $state);
		  
	   }  
	   
	    if($this->uri->segment(7) != '0' && $this->uri->segment(7) != 'All')
	  {
		  
		$zone=$this->uri->segment(7);  
		$this->db->where('zoneid', $zone);
		  
	   }  
	   
	   if($this->uri->segment(8) != '0' && $this->uri->segment(8) != 'All')
	  {
		  
		$district=$this->uri->segment(8);  
		$this->db->where('district', $district);
		  
	   }  
	   
	    if($this->uri->segment(9) != '0' && $this->uri->segment(9) != 'All')
	  {
		  
		$area=$this->uri->segment(9);  
		$this->db->where('areaid', $area);
		  
	   }  
	  
	  
        
        $this->db->order_by('id', 'DESC');
		$this->db->where('action !=', 'd');
       
        $this->db->limit($perpage, $rec_from);
        return $this->db->get('tb_user_locations')->result();
		
		
    }	



function select_shop_name()
    {
        $name = $this->input->post('name');		
		
		$country = $this->input->post('country');
		$region = $this->input->post('region');
		$state = $this->input->post('state');
		$zone = $this->input->post('zone');
		$district = $this->input->post('district');
		$area = $this->input->post('area');
		$centre = $this->input->post('centre');
		
		
		$this->db->where('country', $country);	
		$this->db->where('regionid', $region);	
		$this->db->where('state', $state);	
		$this->db->where('zoneid', $zone);	
		$this->db->where('district', $district);	
		$this->db->where('areaid', $area);	
		$this->db->where('centreid', $centre);	
		
		
		$this->db->where('name', $name);	
		
		$this->db->where('action !=', 'd');
		
        return $this->db->get('tb_shops')->row();
    }
	
    function select_shop_name1()
    {
		
		$name = $this->input->post('name');		
		
		$country = $this->input->post('country');
		$region = $this->input->post('region');
		$state = $this->input->post('state');
		$zone = $this->input->post('zone');
		$district = $this->input->post('district');
		$area = $this->input->post('area');
		$centre = $this->input->post('centre');
		
		
		$this->db->where('country', $country);	
		$this->db->where('regionid', $region);	
		$this->db->where('state', $state);	
		$this->db->where('zoneid', $zone);	
		$this->db->where('district', $district);	
		$this->db->where('areaid', $area);	
		$this->db->where('centreid', $centre);	
		
		$this->db->where('name', $name);	
			
		
		$id = $this->uri->segment(3);
        
        $this->db->where('id !=', $id);
		$this->db->where('action !=', 'd');
        return $this->db->get('tb_shops')->row();
    }






function count_all_dailyvisit()
    {
		
	 if($this->uri->segment(3) != '0' && $this->uri->segment(3) != 'All')
	  {
		  
		$userid=$this->uri->segment(3);  
		$this->db->where('userid', $userid);
		  
	  }  
		  
	 if($this->uri->segment(4) != '0' && $this->uri->segment(4) != 'All')
	  {
		  
		$country=$this->uri->segment(4);  
		$this->db->where('country', $country);
		  
	  }  
	   
	   if($this->uri->segment(5) != '0' && $this->uri->segment(5) != 'All')
	  {
		  
		$region=$this->uri->segment(5);  
		$this->db->where('regionid', $region);
		  
	   }   
	   
	   
	    if($this->uri->segment(6) != '0' && $this->uri->segment(6) != 'All')
	  {
		  
		$state=$this->uri->segment(6);  
		$this->db->where('state', $state);
		  
	   }  
	   
	    if($this->uri->segment(7) != '0' && $this->uri->segment(7) != 'All')
	  {
		  
		$zone=$this->uri->segment(7);  
		$this->db->where('zoneid', $zone);
		  
	   }  
	   
	   if($this->uri->segment(8) != '0' && $this->uri->segment(8) != 'All')
	  {
		  
		$district=$this->uri->segment(8);  
		$this->db->where('district', $district);
		  
	   }  
	   
	   if($this->uri->segment(9) != '0')
	  {
		  
		$date=$this->uri->segment(9);
		
		$double_splite = explode('to',$date);
		
		$split_date = explode('-',$double_splite[0]);
		
		$date2 = $split_date[2].'-'.$split_date[0].'-'.$split_date[1] ;
		
		if(isset($double_splite[1]))
		{
			
		$split_date2 = explode('-',$double_splite[1]);
		
		$date3 = $split_date2[2].'-'.$split_date2[0].'-'.$split_date2[1] ;
		
		$this->db->where('date BETWEEN "'.$date2.'" AND "'.$date3.'"', NULL, FALSE);
		
		}
		else
		{			
			$this->db->where('date', $date2);
		}
		  
	  }  
		
 
		
       
	   $this->db->where('action !=', 'd');
       
		$val = $this->db->get('tb_dailyvisit');
        return $val->num_rows;
		
    }
	
	
	function list_all_dailyvisit($perpage, $rec_from)
    {
		
	 if($this->uri->segment(3) != '0' && $this->uri->segment(3) != 'All')
	  {
		  
		$userid=$this->uri->segment(3);  
		$this->db->where('userid', $userid);
		  
	  }  
		  
	 if($this->uri->segment(4) != '0' && $this->uri->segment(4) != 'All')
	  {
		  
		$country=$this->uri->segment(4);  
		$this->db->where('country', $country);
		  
	  }  
	   
	   if($this->uri->segment(5) != '0' && $this->uri->segment(5) != 'All')
	  {
		  
		$region=$this->uri->segment(5);  
		$this->db->where('regionid', $region);
		  
	   }   
	   
	   
	    if($this->uri->segment(6) != '0' && $this->uri->segment(6) != 'All')
	  {
		  
		$state=$this->uri->segment(6);  
		$this->db->where('state', $state);
		  
	   }  
	   
	    if($this->uri->segment(7) != '0' && $this->uri->segment(7) != 'All')
	  {
		  
		$zone=$this->uri->segment(7);  
		$this->db->where('zoneid', $zone);
		  
	   }  
	   
	   if($this->uri->segment(8) != '0' && $this->uri->segment(8) != 'All')
	  {
		  
		$district=$this->uri->segment(8);  
		$this->db->where('district', $district);
		  
	   }  
	   
	    if($this->uri->segment(9) != '0')
	  {
		  
		$date=$this->uri->segment(9);
		
		$double_splite = explode('to',$date);
		
		$split_date = explode('-',$double_splite[0]);
		
		$date2 = $split_date[2].'-'.$split_date[0].'-'.$split_date[1] ;
		
		if(isset($double_splite[1]))
		{
			
		$split_date2 = explode('-',$double_splite[1]);
		
		$date3 = $split_date2[2].'-'.$split_date2[0].'-'.$split_date2[1] ;
		
		$this->db->where('date BETWEEN "'.$date2.'" AND "'.$date3.'"', NULL, FALSE);
		
		}
		else
		{			
			$this->db->where('date', $date2);
		}
		  
	  }  
	  
	  
        
        $this->db->order_by('id', 'DESC');
		$this->db->where('action !=', 'd');
       
        $this->db->limit($perpage, $rec_from);
        return $this->db->get('tb_dailyvisit')->result();
		
		
    }	


function get_all_salesman_lists()
{

	$this->db->select('*');
    $this->db->from('users')->order_by('meta.s_firstname','asc');  
    $this->db->join('meta', 'users.id = meta.user_id');
	$this->db->where('group_id', '2');
	
    $query = $this->db->get();
    return $query->result();

}




function count_all_dayvisit()
    {

	   $dailyid=$this->uri->segment(3);  
	   $this->db->where('dailyid', $dailyid);
	   
	   if($this->uri->segment(5) != '0' && $this->uri->segment(5) != 'All')
	  {
		  
		$area=$this->uri->segment(5);  
		$this->db->where('areaid', $area);
		  
	   } 
       
	   $this->db->where('action !=', 'd');
       
		$val = $this->db->get('tb_locationvisit');
        return $val->num_rows;
		
    }
	
	
	function list_all_dayvisit($perpage, $rec_from)
    {		
 
		$dailyid=$this->uri->segment(3);  
		$this->db->where('dailyid', $dailyid);
		
		if($this->uri->segment(5) != '0' && $this->uri->segment(5) != 'All')
	  {
		  
		$area=$this->uri->segment(5);  
		$this->db->where('areaid', $area);
		  
	   }  
		  
        
        $this->db->order_by('id', 'DESC');
		$this->db->where('action !=', 'd');
       
        $this->db->limit($perpage, $rec_from);
        return $this->db->get('tb_locationvisit')->result();
		
		
    }	


function get_user_areas_list($userid)
{
		
		$this->db->where('userid', $userid);
        $this->db->order_by('areaname', 'ASC');
		$this->db->where('action !=', 'd');		        
        return $this->db->get('tb_user_locations')->result();	
	
}




function count_all_centre_shops()
    {
		

		$dailyid=$this->uri->segment(4);  
		$this->db->where('dailyid', $dailyid);
		
		
		
  		//
        if ($this->uri->segment(7) != '0') {
			
            $sess_val = $this->uri->segment(7);
            $s_a = str_replace("123", "&", $sess_val);
			
            $s_a = str_replace("-", " ", $s_a);
			$s_a = trim($s_a);
            $this->db->like('shopname', $s_a);
			
        }
		//
		
 
		
       
	   $this->db->where('action !=', 'd');
       
		$val = $this->db->get('tb_shopvisit');
        return $val->num_rows;
		
    }
	
	
	function list_all_centre_shops($perpage, $rec_from)
    {
		
	  
	   $dailyid=$this->uri->segment(4);  
		$this->db->where('dailyid', $dailyid);
		
		
		
  		//
        if ($this->uri->segment(7) != '0') {
			
            $sess_val = $this->uri->segment(7);
            $s_a = str_replace("123", "&", $sess_val);
			
            $s_a = str_replace("-", " ", $s_a);
			$s_a = trim($s_a);
            $this->db->like('shopname', $s_a);
			
        }
		//
	  
        
        $this->db->order_by('id', 'DESC');
		$this->db->where('action !=', 'd');
       
        $this->db->limit($perpage, $rec_from);
        return $this->db->get('tb_shopvisit')->result();
		
		
    }		
	
		
	
	
	
}
?>