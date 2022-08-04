<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_api extends CI_Model
{

    //ini model buat loginnya ya sya  

    public function proses_login($email, $password)
    {
        return $this->db->query("SELECT id FROM tb_user WHERE email = '$email' AND password = MD5('$password')");
    }
}
