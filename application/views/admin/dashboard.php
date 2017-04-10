<?php include_once 'admin_header.php'; ?>
<div class="container">
    <?php
    if ($feedback = $this->session->flashdata('feedback')) {
        $success_class = $this->session->flashdata('success_class')
        ?>

        <div class="alert alert-dismissable <?= $success_class ?>">
            <?php echo $feedback; ?>
        </div>

        <?php
    }
    ?>
    <div class="row">
        <div class="col-lg-6 col-lg-offset-6">
            <a href="http://localhost/Miniproject/admin/add_articles" class="btn btn-primary pull-right">Add Article</a>
        </div>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>SNO.</th>
                <th>Title</th>
                <th>Action</th>
            </tr>
        <tbody>
            <?php
            if (count($articles)) :
                $count = $this->uri->segment(3, 0);
                foreach ($articles as $article) :
                    ?>
                    <tr>
                        <td><?= ++$count; ?></td>
                        <td><?php echo $article->title; ?></td>
                        <td>
                            <div class="row">
                                <div class="col-lg-2">
                                    <a href="http://localhost/Miniproject/admin/edit_article/<?php echo $article->id; ?>" class="btn btn-primary">Edit</a>
                                </div>
                                <div class="col-lg-2">
                                    <form method="post" action="http://localhost/Miniproject/admin/delete_article">
                                        <input type="hidden" name="article_id" value="<?php echo $article->id; ?>">
                                        <input type="submit" name="submit" value="Delete" class="btn btn-default">
                                    </form>
                                </div>
                            </div>
                            
                        </td>
                    </tr>
                    <?php
                endforeach;
            else:
                ?>
                <tr>
                    <td colspan="3">No records found</td>
                </tr>
            <?php
            endif;
            ?>
        </tbody>
        </thead>
    </table>
    <?= $this->pagination->create_links(); ?>
</div>
<?php include_once 'admin_header.php'; ?>