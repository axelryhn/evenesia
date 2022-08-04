<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_api');
    }

    // ini buat login ya sya

    public function login()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['email']) && isset($_POST['password'])) {

                $user_login = $this->M_api->proses_login($_POST['email'], $_POST['password']);
                $result['id']   = null;

                if ($user_login->num_rows() == 1) {
                    $result['value'] = "1";
                    $result['pesan'] = "sukses login!";
                    $result['id']   = $user_login->row()->id;
                } else {
                    $result['value'] = "0";
                    $result['pesan'] = "username / password salah!";
                }
            } else {
                $result['value'] = "0";
                $result['pesan'] = "beberapa inputan masih kosong!";
            }
        } else {
            $result['value'] = "0";
            $result['pesan'] = "invalid request method!";
        }

        echo json_encode($result);
    }
}
