<?php
if(count($selected_products) > 0) {
?>
<table class="table table-bordered table-striped table-condensed">
          <thead>
                  <tr>
                          <th>ID</th>
                          <th>product Name</th>
                          <th>Publication Status</th>
                          <th>Action</th>                                          
                  </tr>
          </thead>   
          <tbody>
              <?php foreach ($selected_products as $v_product) { ?>
                <tr>
                    <td><?php echo $v_product->product_id; ?></td>
                    <td class="center"><?php echo $v_product->product_name; ?></td>
                    <td class="center"><?php 
                        if($v_product->pr_publication_status == 1){
                            ?><span class="success_message">Published</span><?php
                        } else {
                            ?><span class="error_message">Unpublished</span><?php
                        }
                        ?></td>
                    <td class="center">
                        <a class="btn btn-info" href="<?php echo base_url(); ?>product_controller/edit_product/<?php echo $v_product->product_id; ?>" title="Edit"><i class="icon-edit icon-white"></i></a>
                        <a class="btn btn-danger" href="<?php echo base_url(); ?>product_controller/delete_product/<?php echo $v_product->product_id; ?>" onclick="return confirm('Are you sure, you want to delete this product : <?php 
                            echo $v_product->product_name;
                        ?> ?')" title="Delete"><i class="icon-trash icon-white"></i></a> 
                        <?php
                        if($v_product->pr_publication_status == 1) {
                        ?>
                            <a class="btn btn-danger" href="<?php echo base_url(); ?>product_controller/unpublish_product/<?php echo $v_product->product_id; ?>" title="Unpublish"><i class="icon-eye-close icon-black"></i></a>
                        <?php } else { ?>
                            <a class="btn btn-success" href="<?php echo base_url(); ?>product_controller/publish_product/<?php echo $v_product->product_id; ?>" title="Publish"><i class="icon-eye-open icon-white"></i></a>
                        <?php } ?> 
                    </td>                                       
                </tr>
                <?php } ?>
          </tbody>
 </table>  
 <div class="pagination pagination-centered">
  <ul>
        <li><a href="#">Prev</a></li>
        <li class="active">
          <a href="#">1</a>
        </li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li><a href="#">Next</a></li>
  </ul>
</div>   
<?php } else {
    ?><h1 class="error_message">No Product to show .....</h1><?php
} ?>