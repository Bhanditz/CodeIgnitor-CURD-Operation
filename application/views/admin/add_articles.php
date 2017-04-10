<?php include_once 'admin_header.php'; ?>
<div class="container">
    <h1>Add Article</h1>
 
    <form class="form-horizontal" action="http://localhost/Miniproject/admin/store_article" method="post" enctype="multipart/form-data">
        <?php echo form_hidden('user_id',$this->session->userdata('user_id')); ?>
        <div class="form-group">
            <span> <?php echo form_error('title',"<span class='text-danger'>","</span>" ); ?> </span>
            <label for="title" class="col-lg-2 control-label">Title</label>
            <div class="col-lg-10">
                <input type="text" class="form-control" id="title" placeholder="title" name="title" value="<?php echo set_value('title'); ?>">
            </div>
        </div>
        <div class="form-group">
            <span> <?php echo form_error('body',"<span class='text-danger'>","</span>"); ?> </span>
            <label for="body" class="col-lg-2 control-label">Article Body</label>
            <div class="col-lg-10">
                <!--<input type="text" class="form-control" id="body" placeholder="body" name="body" value="<?php echo set_value('body'); ?>">-->        
            <?php echo form_textarea(['name'=>'body','class'=>'form-control','placeholder'=>'Article Bdy','value'=>  set_value('body')]); ?>
            </div>
        </div> 
         <div class="form-group">
             <span> <?php if(isset($upload_error)) { echo $upload_error; } ?> </span>
            <label for="file" class="col-lg-2 control-label">File</label>
            <div class="col-lg-10">
                <input type="file" class="form-control" id="title" name="userfile">
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
