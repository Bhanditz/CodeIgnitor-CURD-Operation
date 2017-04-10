<?php include 'public_header.php'; ?>
<div class="container">
    <h1>All Articles</h1>
    <hr>
    <table class="table">
        <thead>
            <tr>
                <td>Sr. No.</td>
                <td>Article Title</td>
                <td>Published on</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php if(count($articles)){
                    
                    $count = $this->uri->segment(3, 0);
                      foreach ($articles as $article) :
                          ?>
                 <td><?=  ++$count; ?></td>
                 <td><a href="http://localhost/Miniproject/user/article/<?php echo $article->id; ?>"><?= $article->title; ?></a></td>
                <td><?= date('d M y H:i:s',strtotime($article->created_at)); ?></td>             
               
            </tr>
             <?php
                          
                      endforeach;
                } else{
                    echo '<tr><td class="colspan="3">No records found</td></tr>';
                }
                ?>
        </tbody>
      </table>
    <?= $this->pagination->create_links(); ?>
</div>
<?php include 'public_footer.php';
?>
        