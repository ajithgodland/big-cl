<?php
class user_model extends CI_Model
{
    function get_categories()
    {
        $res=$this->db->get('catalog_category')->result();
        return $res;
    }
    function get_attribute_set($category_id)
    {
        $this->db->select('attribute_set');
        $this->db->where('category_id',$category_id);
        $query=$this->db->get('catalog_category')->row();
        $res=$query->attribute_set;
        $this->db->where('attribute_set_name',$res);
        $this->db->join('attributes','attributes.attribute_id = attribute_set.attributes');
        $query1=$this->db->get('attribute_set')->result();
        return $query1;
    }
    function attribute_options($attribute_id)
    {
        $this->db->where('attribute_id',$attribute_id);
        //$this->db->order
        return $this->db->get('attribute_options')->result();
    }
}