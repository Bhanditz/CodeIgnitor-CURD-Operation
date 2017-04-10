<?php

/*
 * ljgklfdsjfklj.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$config = [

                'add_article_rules' =>
                                    [
                                            [
                                                'field' => 'title',
                                                'label' =>'Title required',
                                                'rules' =>'required|alphadash'
                                            ],
                                            [
                                                'field' => 'body',
                                                'label' =>'Body',
                                                'rules'=> 'required'
                                            ]
                                    ],
                'admin_login' => [
                                            [
                                                'field' => 'username',
                                                'label' =>'Username required',
                                                'rules' =>'required|alpha|trim'
                                            ],
                                            [
                                                'field' => 'password',
                                                'label' =>'Password',
                                                'rules'=> 'required|trim'
                                            ]
                                 ]
];
