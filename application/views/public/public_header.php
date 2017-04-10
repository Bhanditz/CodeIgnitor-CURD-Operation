<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>This is test project</title>
        <?php // echo link_tag('assets/css/bootstrap.min.css'); ?>
        <link rel="stylesheet" type="text/css" href="http://localhost/Miniproject/assets/css/bootstrap.min.css">
         <!--<link rel="stylesheet" type="text/css" href="<?php // echo base_url('/assets/css/bootstrap.min.css');                   ?>">-->
    </head>
    <body>
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Articles</a>
                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <!--                    <ul class="nav navbar-nav">
                                            <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
                                            <li><a href="#">Link</a></li>
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li><a href="#">Action</a></li>
                                                    <li><a href="#">Another action</a></li>
                                                    <li><a href="#">Something else here</a></li>
                                                    <li class="divider"></li>
                                                    <li><a href="#">Separated link</a></li>
                                                    <li class="divider"></li>
                                                    <li><a href="#">One more separated link</a></li>
                                                </ul>
                                            </li>
                                        </ul>-->
                    <form class="navbar-form navbar-left" role="search" action="http://localhost/Miniproject/user/search" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search" name="query">
                        </div>
                        <button type="submit" class="btn btn-default">Submit</button>
                    </form>
                    <?= form_error('query', '<p class="navbar-text text-danger">', '</p>'); ?>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="http://localhost/Miniproject/login/">Login</a></li>
                    </ul>
                </div>
            </div>
        </nav>