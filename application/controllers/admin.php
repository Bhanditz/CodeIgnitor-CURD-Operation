<?php

/*
 * ljgklfdsjfklj.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

Class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('user_id')) {
            header('Location:http://localhost/Miniproject/login');
        }
        $this->load->model('articlesmodel', 'article');
    }

    public function dashboard() {

        $this->load->library('pagination');
        $config = [
            'base_url' => 'http://localhost/Miniproject/admin/dashboard',
            'per_page' => '5',
            'total_rows' => $this->article->num_rows(),
            'full_tag_open' => "<ul class='pagination'>",
            'full_tag_close' => "</ul>",
            'first_tag_open' => '<li>',
            'first_tag_close' => '</li>',
            'last_tag_open' => '<li>',
            'last_tag_close' => '</li>',
            'next_tag_open' => '<li>',
            'next_tag_close' => '</li>',
            'prev_tag_open' => '<li>',
            'prev_tag_close' => '</li>',
            'num_tag_open' => '<li>',
            'num_tag_close' => '</li>',
            'cur_tag_open' => "<li class='active'><a>",
            'cur_tag_close' => '</a></li>',
        ];
        $this->pagination->initialize($config);
        $article = $this->article->articles_list($config['per_page'], $this->uri->segment(3));
        $this->load->view('admin/dashboard', ['articles' => $article]);
    }

    public function add_articles() {


        $this->load->helper('form');
        $this->load->view('admin/add_articles');
    }

    public function store_article() {

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '100000';
        $config['max_width'] = '10240';
        $config['max_height'] = '7680';

        $this->load->library('upload', $config);
        $this->load->library('form_validation');
        if ($this->form_validation->run('add_article_rules') && $this->upload->do_upload()) {
            $post = $this->input->post();
            $data = $this->upload->data();
            $image_path = 'http://localhost/Miniproject/uploads/'.$data['raw_name'].$data['file_ext'];
            $post['image_path'] = $image_path;
            $this->_flashAndRedirect(
                    $this->article->add_article($post), 'Article is added succesfully', 'Article failed to added'
            );
        } else {
            $upload_error = $this->upload->display_errors();

            $this->load->view('admin/add_articles', compact('upload_error'));
        }
    }

    public function edit_article($article_id) {

        $this->load->library('form_validation');
        $article = $this->article->find_article($article_id);
        $this->load->view('admin/edit_article', ['article' => $article]);
    }

    public function update_article($article_id) {

        $this->load->library('form_validation');
        if ($this->form_validation->run('add_article_rules')) {
            $post = $this->input->post();
            $this->_flashAndRedirect(
                    $this->article->update_article($article_id, $post), 'Article is updated succesfully', 'Article failed to updated'
            );
        } else {
            $this->load->view('admin/edit_article');
        }
    }

    public function delete_article() {

        $article_id = $this->input->post('article_id');
        $this->_flashAndRedirect(
                $this->article->delete_article($article_id), 'Article is deleted succesfully', 'Article failed to delete'
        );
    }

    private function _flashAndRedirect($succssful, $successMessage, $failerMessage) {

        if ($succssful) {
            $this->session->set_flashdata('feedback', $successMessage);
            $this->session->set_flashdata('success_class', 'alert-success');
        } else {
            $this->session->set_flashdata('feedback', $failerMessage);
            $this->session->set_flashdata('success_class', 'alert-danger');
        }
        header('Location:http://localhost/Miniproject/admin/dashboard');
    }

}
