<?php include_once 'admin_header.php'; ?>
<div class="container">
    <h1>Edit Article</h1>
 
    <form class="form-horizontal" action="http://localhost/Miniproject/admin/update_article/<?php echo $article->id; ?>" method="post">
        <div class="form-group">
            <span> <?php echo form_error('title',"<span class='text-danger'>","</span>" ); ?> </span>
            <label for="title" class="col-lg-2 control-label">Title</label>
            <div class="col-lg-10">
                <input type="text" class="form-control" id="title" placeholder="title" name="title" value="<?php echo set_value('title',$article->title); ?>">
            </div>
        </div>
        <div class="form-group">
            <span> <?php echo form_error('body',"<span class='text-danger'>","</span>"); ?> </span>
            <label for="body" class="col-lg-2 control-label">Article Body</label>
            <div class="col-lg-10">
                <!--<input type="text" class="form-control" id="body" placeholder="body" name="body" value="<?php //echo set_value('body'); ?>">-->        
            <?php echo form_textarea(['name'=>'body','class'=>'form-control','placeholder'=>'Article Bdy','value'=>  set_value('body',$article->body)]); ?>
            </div>
        </div> 
        <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
                <button type="reset" class="btn btn-default">Cancel</button>
                <button type="submit" class="btn btn-primary" >Submit</button>
            </div>
        </div>
    </form>
    <?php //echo validation_errors(); ?>
</div>
<?php include_once 'admin_header.php'; ?>