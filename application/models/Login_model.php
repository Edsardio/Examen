<?php
class Login_model extends CI_Model{
	public function __construct(){
		$this->load->database();

	}
	
	public function checkUser($email, $password){
		$query = $this->db->query('SELECT * FROM klanten WHERE email = "' . $email . '"');
		$row = $query->row_array();
		if($query->num_rows() === 1){
			if(crypt($password, $row['password']) == $row['password']){
				$userQuery = $this->db->query('SELECT user_group.klant_id, groups.group_id 
											   FROM user_group 
											   INNER JOIN groups 
											   ON user_group.group_id = groups.group_id 
											   WHERE klant_id = "' . $row['klant_id'] . '"');
				$userRow = $userQuery->row_array();
				session_start();
				if($userRow['group_id'] == '3'){
					$_SESSION['admin_group'] = $userRow['group_id'];
					$_SESSION['user_group'] = '2';
				}else{
					$_SESSION['admin_group'] = '1';
					$_SESSION['user_group'] = $userRow['group_id'];
				}
				$_SESSION['user_id'] = $row['klant_id'];
				$_SESSION['expire'] = $_SESSION['start'] + (30 * 60);
				if($_SESSION['admin_group'] == '3'){
					redirect('admin/editgroups');
				} else {
					header('Location: ../details');
				}
			}else{
				return "Onjuiste gegevens.";
			}
		}else{
			return "Onjuiste gegevens.";
		}
	}
}