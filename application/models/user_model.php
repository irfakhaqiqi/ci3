<?php


class User_model extends CI_Model{
   public function register($enc_password){
       // Array data user
       $data = array(
           'nama' => $this->input->post('nama'),
           'username' => $this->input->post('username'),
           'password' => $enc_password,
       );

       // Insert user
       return $this->db->insert('users', $data);
   }


    public function login($username, $password){
       // Validasi
       $this->db->where('username', $username);
       $this->db->where('password', $password);

       $result = $this->db->get('users');


       if($result->num_rows() == 1){
           return $result->row(0)->id_user;
       } else {
           return false;
       }

}
}

?>