<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class User_model extends CI_Model {

	//fetch all users from db
	public function get_all_users() {
		$this->db->select('*');
		$this->db->from('user_info');
		$this->db->where('isAdmin', '0');
		$result = $this->db->get()->result();
		// echo $this->db->last_query();die;
		return $result;
	}

	//save user data to db
	public function create_user($name,$mobile) {
		$this->db->where('mobile', $mobile);
		$query = $this->db->get('user_info');

        if($query->num_rows() > 0){
        	echo '<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>';
			  echo "Email already taken";	
			echo '</strong></div>';

		}else{

			$new_user_insert_data = array(
				'name' => $name,
				'mobile' => $mobile,					
			);
			$insert = $this->db->insert('user_info', $new_user_insert_data);
		 	$insert_id = $this->db->insert_id();
			// echo $this->db->last_query();
			//die;
		    return $insert_id;
		}
	}

	//fetch all pictures from db
    function get_all_pics(){
        $all_pics = $this->db->get('pictures');
        return $all_pics->result();
    }

    //save picture data to db
    function store_pic_data($data){
        $insert_data['pic_title'] = $data['pic_title'];
        $insert_data['pic_desc'] = $data['pic_desc'];
        $insert_data['pic_file'] = $data['pic_file'];
        $insert_data['user_id'] = $data['user_id'];
        $query = $this->db->insert('pictures', $insert_data);
    }

}