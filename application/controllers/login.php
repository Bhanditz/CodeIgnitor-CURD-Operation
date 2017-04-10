<?php

/*
 * ljgklfdsjfklj.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Login extends MY_Controller {

    public function index() {

        if ($this->session->userdata('user_id'))
            header('Location:http://localhost/Miniproject/admin/dashboard');
        $this->load->helper('form');
        $this->load->view('public/admin_login');
    }

    public function admin_login() {
        $this->load->library('form_validation');
        if ($this->form_validation->run('admin_login')) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $this->load->model('loginmodel');
            $login_id = $this->loginmodel->login_valid($username, $password);
            if ($login_id) {
                $this->session->set_userdata('user_id', $login_id);
                header('Location:http://localhost/Miniproject/admin/dashboard');
            } else {

                $this->session->set_flashdata('login_failed', 'Invalid Username/Password');
                header('Location:http://localhost/Miniproject/login');
            }
        } else {
            $this->load->view('public/admin_login');
//            echo validation_errors();
        }
    }

    public function logout() {
        $this->session->unset_userdata('user_id');
        header('Location:http://localhost/Miniproject/login');
    }

}
