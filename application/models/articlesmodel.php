<?php

/*
 * ljgklfdsjfklj.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Articlesmodel extends CI_Model {

    public function articles_list($limit, $offset) {

        $user_id = $this->session->userdata('user_id');
        $query = $this->db
                ->select(['title', 'id'])
                ->from('article')
                ->where('user_id', $user_id)
                ->limit($limit, $offset)
                ->get();
        return $query->result();
    }

    public function add_article($array) {

        return $this->db->insert('article', $array);
    }

    public function find_article($article_id) {

        $q = $this->db->select(['id', 'title', 'body'])
                ->where('id', $article_id)
                ->get('article');
        return $q->row();
    }

    public function update_article($article_id, Array $article) {

        return $this->db
                        ->where('id', $article_id)
                        ->update('article', $article);
    }

    public function delete_article($article_id) {

        return $this->db->delete('article', ['id' => $article_id]);
    }

    public function num_rows() {
        $user_id = $this->session->userdata('user_id');
        $query = $this->db
                ->select(['title', 'id'])
                ->from('article')
                ->where('user_id', $user_id)
                ->get();
        return $query->num_rows();
    }

    public function all_articles_list($limit, $offset) {

        $query = $this->db
                ->select(['title', 'id', 'created_at'])
                ->from('article')
                ->limit($limit, $offset)
                ->order_by('created_at', 'DESC')
                ->get();
        return $query->result();
    }

    public function count_all_articles() {
        $query = $this->db
                ->select(['title', 'id'])
                ->from('article')
                ->get();
        return $query->num_rows();
    }

    public function search($query, $limit, $offset) {

        $q = $this->db->from('article')
                ->like('title', $query)
                ->limit($limit, $offset)
                ->get();
        return $q->result();
    }

    public function count_search_results($query) {

        $q = $this->db->from('article')
                ->like('title', $query)
                ->get();
        return $q->num_rows();
    }

    public function find($id) {
        $q = $this->db->from('article')
                ->where(['id' => $id])
                ->get();
        if ($q->num_rows()) {
            return $q->row();
        } else {
            return FALSE;
        }
    }

}
