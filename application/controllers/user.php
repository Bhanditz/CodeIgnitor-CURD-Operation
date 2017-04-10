<?php

/*
 * ljgklfdsjfklj.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class User extends CI_Controller {

    public function index() {
        $this->load->library('form_validation');
        $this->load->model('articlesmodel', 'article');
        $this->load->library('pagination');
        $config = [
            'base_url' => 'http://localhost/Miniproject/user/index',
            'per_page' => '5',
            'total_rows' => $this->article->count_all_articles(),
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
        $articles = $this->article->all_articles_list($config['per_page'], $this->uri->segment(3));
        $this->load->view('public/articles_list', compact('articles'));
    }

    public function search() {

        $this->load->library('form_validation');
        $this->form_validation->set_rules('query', 'query', 'required');
        if (!$this->form_validation->run()) {
            $this->index();
        } else {
            $query = $this->input->post('query');
            header("Location:http://localhost/Miniproject/user/search_results/$query");
        }
    }

    public function search_results($query) {

        $this->load->library('form_validation');
        $this->load->model('articlesmodel', 'article');
        $this->load->library('pagination');
        $config = [
            'base_url' => "http://localhost/Miniproject/user/search_results/$query",
            'per_page' => '5',
            'total_rows' => $this->article->count_search_results($query),
            'full_tag_open' => "<ul class='pagination'>",
            'full_tag_close' => "</ul>",
            'first_tag_open' => '<li>',
            'uri_segment' => 4,
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
        $articles = $this->article->search($query, $config['per_page'], $this->uri->segment(4));
        $this->load->view('public/search_result', compact('articles'));
    }

    public function article($id) {
        $this->load->library('form_validation');
        $this->load->model('articlesmodel', 'article');
        $article = $this->article->find($id);
        $this->load->view('public/article_detail', compact('article'));
    }

}
