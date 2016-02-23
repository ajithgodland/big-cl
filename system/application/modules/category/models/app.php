<?php
class app extends CI_Model
{
    function category_insert($posts,$table)
    {
        $post_value = array();
        foreach($posts as $key=>$post)
        {
            $post_value[$key] = $post;
        }
        return $this->db->insert($table, $post_value);
    }
    function category_update($posts,$table,$id)
    {
        $post_value = array();
        foreach($posts as $key=>$post)
        {
            $post_value[$key] = $post;
        }
                
        $this->db->where('category_id',$id);
        $this->db->update($table, $post_value);
    }
    function url_checking($url_key,$id)
    {
        $this->db->select('url_key');
        $this->db->where('url_key',$url_key);
        $this->db->where('category_id',$id);
        $query = $this->db->get('catalog_category');
        return $query->num_rows();
    }
    function showsubs($cat_id, $dashes = '')
    {
        $dashes .= '__';
        $this->db->where('parent_category', $cat_id);
        $rsSub = $this->db->get('catalog_category')->result();
        if (count($rsSub) >= 1) {
            foreach ($rsSub as $rows_sub) {
                $this->arr[] = array('category_name' => $dashes . $rows_sub->category_name, 'category_id' => $rows_sub->category_id);
                $this->showsubs($rows_sub->category_id, $dashes);
            }
        }
    }
    function showcats()
    {
        $this->db->where('parent_category', 0);
        $rsMain = $this->db->get('catalog_category')->result();
        $this->arr = array();
        if (count($rsMain) >= 1) {
            foreach ($rsMain as $rows_main) {
                $this->arr[] = array('category_name' => $rows_main->category_name, 'category_id' => $rows_main->category_id);
                $this->showsubs($rows_main->category_id);
            }
            return $this->arr;
        }
    }
    function get_level($id)
    {
        $this->db->select('level');
        $this->db->where('category_id', $id);
        $query = $this->db->get('category_level');
        $res=$query->row_array();
        return $res['level'];
    }
    function get_main_category($category_id)
    {
        $this->db->select('parent_category');
        $this->db->where('category_id', $category_id);
        $query = $this->db->get('catalog_category');
        $res=$query->row_array();
        return$res['parent_category'];
    }
    function category_urlkey($category_id,$level)
    {
        $main= $this->get_main_category($category_id);
        if($main==0)
        {
            return $category_id;
        }
        else
        {
            $val=array();
            $val[]= $this->get_main_category($category_id);
            $j=0;
            for($i=1; $i<$level; $i++)
            {
                $val[$i]=$this->get_main_category($val[$j]);
                $j++;
            }
            $ky='';
            foreach(array_reverse($val) as $id)
            {
                if($id!=0)
                {
                    //$ky.= $this->url_key($id).'/';
                    $ky.= $id.'/';
                }
            }
            //return $ky.$this->url_key($category_id);
            return $ky.$category_id;
        }
    }
    function check_url($full_url)
	{
		$curl = curl_init($full_url);
		curl_setopt($curl, CURLOPT_NOBODY, true);
		$result = curl_exec($curl);
		if ($result !== false)
		{
			$statusCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
			if ($statusCode == 404)
			{
				return 0;
			}
			else
			{
				return 1;
			}
		}
		else
		{
			return 0;
		}
	}
    function get_category_level($category_id,$parent_id)
    {
        $parent_level=$this->get_main_category($category_id);
        if($parent_level==0)
        {
            $level=1;
        }
        else
        {
            $get_parent_level=$this->get_level($parent_id);
            $level=$get_parent_level+1;
        }
        return $level;
    }
    function seo_check($postvalue,$realvalue)
    {
        if($postvalue=='')
        {
            return $realvalue;
        }
        else
        {
            return $postvalue;
        }
    }
    function url_key($category_id)
    {
        $this->db->select('url_key');
        $this->db->where('category_id', $category_id);
        $query = $this->db->get('catalog_category');
        $res=$query->row_array();
        return$res['url_key'];
    }
    function get_category_data($category_id)
    {
        $this->db->select('*');
        $this->db->where('category_id', $category_id);
        $query = $this->db->get('catalog_category');
        $res=$query->row();
        return $res;
    }
    function get_category_seo_data($category_id)
    {
        $this->db->select('title,meta_keyword,meta_description');
        $this->db->where('section','category');
        $this->db->where('section_id',$category_id);
        $query = $this->db->get('seo');
        $res=$query->row();
        return $res;
    }
    function get_category_name($category_id)
    {
        $this->db->select('category_name');
        $this->db->where('category_id', $category_id);
        $query = $this->db->get('catalog_category');
        $res=$query->row();
        return $res->category_name;
    }
    function category_url_rout($url_key)
    {
        $data = '$route["' .$url_key.'"] = "product";';
        $output="";
        $output .= "<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');\n";
        $output .= implode("\n", $data);
        $output .="\n";
        $this->load->helper('file');
        write_file(APPPATH . "cache/category.php", $output,"a+");
    }
}
?>