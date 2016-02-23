<?php
class app extends CI_Model
{
    function attribute_insert($posts)
    {
        $post_value = array();
        foreach($posts as $key=>$post)
        {
            $post_value[$key] = $post;
        }
        return $this->db->insert('attributes', $post_value);
    }
    function attribute_update($posts,$id)
    {
        $post_value = array();
        foreach($posts as $key=>$post)
        {
            $post_value[$key] = $post;
        }
                
        $this->db->where('attribute_id',$id);
        $this->db->update('attributes', $post_value);
    }
    function attribute_options_insert($option,$attribute_id)
    {
            
            $array=array();
            if($option) 
             { 
                 foreach ($option['option_value'] as $id => $key)  
                 { 
                     $array[] = array( 
                     'option_value'    => $option['option_value'][$id], 
                     'option_position' => $option['option_position'][$id],
                     'attribute_id'    => $attribute_id
                     ); 
                 } 
             }
          for($i=0;$i<count($array);$i++)
          {
              $this->db->insert('attribute_options',$array[$i]);
          } 
    }
    function attribute_options_update($option,$attribute_id)
    {
            
          $array_update=array();
          $array_insert=array();
          if($option) 
          { 
              foreach ($option['option_value'] as $id => $key)  
              { 
                if(isset($option['option_id'][$id]))
                {
                   $array_update[] = array( 
                     'option_value'    => $option['option_value'][$id], 
                     'option_position' => $option['option_position'][$id],
                     'attribute_id'    => $attribute_id,
                     'option_id'    => $option['option_id'][$id], 
                     );  
                }
                else
                {
                    $array_insert[] = array( 
                     'option_value'    => $option['option_value'][$id], 
                     'option_position' => $option['option_position'][$id],
                     'attribute_id'    => $attribute_id
                     ); 
                }
                     
              } 
          }
          for($i=0;$i<count($array_insert);$i++)
          {
            $this->db->insert('attribute_options',$array_insert[$i]);
          } 
          for($i=0;$i<count($array_update);$i++)
          {
            $option_id = $array_update[$i]['option_id'];
            unset($array_update[$i]['option_id']);
            $this->db->where('option_id',$option_id);
            $this->db->update('attribute_options',$array_update[$i]);
          } 
    }
    function attribute_data($attribute_id)
    {
        $this->db->where('attribute_id', $attribute_id);
        return $this->db->get('attributes')->row();
    }
    function get_attributes_options($attribute_id)
    {
        $this->db->where('attribute_id', $attribute_id);
        return $this->db->get('attribute_options')->result();
    }
    function get_all_attributes()
    {
        return $this->db->get('attributes')->result();
    }
    function common_insert($table,$post)
    {
        $this->db->insert($table,$post);
        return $this->db->insert_id();
    }
}
?>