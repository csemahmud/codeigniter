<div>
        <ul class="breadcrumb">
                <li>
                        <a href="#">Home</a> <span class="divider">/</span>
                </li>
                <li>
                        <a href="#">Product</a>
                </li>
        </ul>
</div>

<div class="row-fluid sortable">
        <div class="box span12">
                <div class="box-header well" data-original-title>
                        <h2>
                            <?php
                            switch($function){
                            case "Add":
                            ?><i class="icon-plus"></i><?php
                            break;
                            case "Update":
                            ?><i class="icon-edit"></i><?php
                            break;
                            } ?>
                            <?php echo $function; ?> product</h2>
                        <div class="box-icon">
                                <a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
                                <a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
                                <a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
                        </div>
                </div>
                <div class="box-content">
                            <h3 class="success_message">
                                <?php
                                $message = $this->session->userdata("message");
                                if($message != NULL){
                                    echo $message;
                                    $this->session->unset_userdata("message");
                                }
                                ?>
                            </h3>
                            <h3 class="error_message">
                                <?php
                                $error = $this->session->userdata("error");
                                if($error != NULL){
                                    echo $error;
                                    $this->session->unset_userdata("error");
                                }
                                ?>
                            </h3>
                    <form name="save_product_form" action="<?php echo base_url(); ?>product_controller/<?php 
                              switch ($function){
                              case "Add":
                                  echo "save";
                                  break;
                                  case "Update":
                                      echo "update";
                              }
                              ?>_product" method="post" enctype="multipart/form-data" class="form-horizontal" onsubmit="return check_pr_validity()">
                          <fieldset>
                                <legend><?php echo $function; ?> product</legend>
                                <?php if(isset($product_info->product_id)) { ?>
                                <input type="hidden" id="product_id" name="product_id" value="<?php echo $product_info->product_id; ?>">
                                <?php } ?>
                                <div class="control-group">
                                  <label class="control-label" for="typeahead">Product Name :</label>
                                  <div class="controls">
                                      <input type="text" class="span6 typeahead" id="product_name" name="product_name" value="<?php 
                                      if(isset($product_info->product_name)) {
                                          echo $product_info->product_name;
                                          }  ?>" required="required" tabindex="1">
                                      <span class="required"><strong>*</strong></span>
                                  </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="selectError3">Select Category :</label>
                                    <div class="controls">
                                        <select id="category_id" name="category_id" tabindex="2">
                                          <option value=" "><<--Select Category-->></option>
                                          <?php foreach ($all_categories as $v_category) { ?>
                                            <option value="<?php echo $v_category->category_id; ?>">
                                                <?php echo $v_category->category_name; ?>
                                            </option>
                                          <?php } ?>
                                      </select><span class="required"><strong>*</strong></span>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="selectError3">Select Manufacturer :</label>
                                    <div class="controls">
                                        <select id="manufacturer_id" name="manufacturer_id" tabindex="3">
                                          <option value=" "><<--Select Manufacturer-->></option>
                                          <?php foreach ($all_manufacturers as $v_manufacturer) { ?>
                                            <option value="<?php echo $v_manufacturer->manufacturer_id; ?>">
                                                <?php echo $v_manufacturer->manufacturer_name; ?>
                                            </option>
                                          <?php } ?>
                                      </select><span class="required"><strong>*</strong></span>
                                    </div>
                              </div>
                                <div class="control-group">
                                  <label class="control-label" for="textarea2">Product Short Description :</label>
                                  <div class="controls">
                                      <textarea class="cleditor" id="product_short_description" name="product_short_description" rows="3" tabindex="4"><?php 
                                      if(isset($product_info->product_short_description)) {
                                          echo $product_info->product_short_description;
                                      }
                                        ?></textarea>
                                  </div>
                                </div>
                                <div class="control-group">
                                  <label class="control-label" for="textarea2">Product Long Description :</label>
                                  <div class="controls">
                                      <textarea class="cleditor" id="product_long_description" name="product_long_description" rows="3" tabindex="5"><?php 
                                      if(isset($product_info->product_long_description)) {
                                          echo $product_info->product_long_description;
                                      }
                                        ?></textarea>
                                  </div>
                                </div>
                                <div class="control-group">
                                  <label class="control-label" for="typeahead">Product Price :</label>
                                  <div class="controls">
                                      <input type="text" class="span6 typeahead" id="product_price" name="product_price" value="<?php 
                                      if(isset($product_info->product_price)) {
                                          echo $product_info->product_price;
                                          }  ?>" required="required" tabindex="6">
                                      <span class="required"><strong>*</strong></span>
                                  </div>
                                </div>
                                <div class="control-group">
                                  <label class="control-label" for="typeahead">Product Quantity :</label>
                                  <div class="controls">
                                      <input type="text" class="span6 typeahead" id="product_quantity" name="product_quantity" value="<?php 
                                      if(isset($product_info->product_quantity)) {
                                          echo $product_info->product_quantity;
                                          }  ?>" required="required" tabindex="7">
                                      <span class="required"><strong>*</strong></span>
                                      <span>( in BDT )</span>
                                  </div>
                                </div>
                                <div class="control-group">
                                  <label class="control-label" for="typeahead">Expiry Date :</label>
                                  <div class="controls">
                                      <input type="text" class="span6 typeahead" id="expiry_date" name="expiry_date" value="<?php 
                                      if(isset($product_info->expiry_date)) {
                                          echo $product_info->expiry_date;
                                          }  ?>" placeholder="Enter   yyyy-mm-dd   format   ....." tabindex="8">
                                      <p class="help-block">Enter   yyyy-mm-dd   format   .....</p>
                                  </div>
                                </div>
                                <?php
                                    if(isset($product_info->product_image)) {
                                        if($product_info->product_image != '') { ?>
                                        <div class="control-group">
                                          <label class="control-label" for="fileInput">Current Image</label>
                                          <div class="controls">
                                              <figure class="figure_style">
                                                <img class="img_style" id="current_product_image" src="<?php echo base_url().$product_info->upload_path.$product_info->product_image; ?>" />
                                              </figure>                                          
                                          </div>
                                        </div>
                                    <?php }} ?>

                                <div class="control-group">
                                  <label class="control-label" for="fileInput">Select Product Image</label>
                                  <div class="controls">
                                      <input class="input-file uniform_on" id="product_image" name="product_image" type="file" tabindex="9">
                                  </div>
                                </div>
                                
                                <input type="hidden" id="product_image_value" name="product_image_value" value="<?php 
                                if(isset($product_info->product_image)) {
                                    echo $product_info->product_image; 
                                }
                                ?>" />
                                <input type="hidden" id="upload_path_value" name="upload_path_value" value="<?php 
                                if(isset($product_info->upload_path)) {
                                    echo $product_info->upload_path; 
                                }
                                ?>" />
                                
                                <div class="control-group">
                                      <label class="control-label">Publication   Status :</label>
                                      <div class="controls">
                                        <label class="radio">
                                              <input type="radio" name="pr_publication_status" id="pr_publication_status1" value="1"
                                                     <?php 
                                                     if(isset($product_info->pr_publication_status)) { 
                                                         if($product_info->pr_publication_status == 1) {
                                                         ?>
                                                     checked="checked"
                                                     <?php }
                                                     
                                                         } else {?>
                                                     checked="checked"
                                                         <?php } ?>  tabindex="10">
                                              Published
                                        </label>
                                        <div style="clear:both"></div>
                                        <label class="radio">
                                              <input type="radio" name="pr_publication_status" id="pr_publication_status2" value="0"
                                                     <?php 
                                                     if(isset($product_info->pr_publication_status)) { 
                                                         if($product_info->pr_publication_status == 0) {
                                                         ?>
                                                     checked="checked"
                                                     <?php }
                                                     
                                                     } ?>  tabindex="11">
                                              Unpublished
                                        </label>
                                      </div>
                                </div>
                                <div class="form-actions">
                                    <button type="submit" class="btn btn-primary" tabindex="12">Save product</button>
                                    <button type="reset" class="btn" tabindex="13">Reset</button>
                                </div>
                          </fieldset>
                        </form>   

                </div>
        </div><!--/span-->

</div><!--/row-->

<script type="text/javascript">
    $(document).ready(function () {
        $("#expiry_date").datepicker({
            dateFormat: 'yy-mm-dd',
            changeMonth: true,
            changeYear: true
        });
    });
</script>

<script type="text/javascript">
    document.forms["save_product_form"].elements["category_id"].value 
            = "<?php 
            if(isset($product_info->category_id)) {
                echo $product_info->category_id;
            } else {
                echo " ";
            }
            ?>";
    document.forms["save_product_form"].elements["manufacturer_id"].value 
            = "<?php 
            if(isset($product_info->manufacturer_id)) {
                echo $product_info->manufacturer_id;
            } else {
                echo " ";
            }
            ?>";
</script>
<script type="text/javascript">
    function check_pr_validity() {
        if(document.getElementById("category_id").value == " "){
            alert("Category Must be Selected");
            return false;
        }
        if(document.getElementById("manufacturer_id").value == " "){
            alert("Manufacturer Must be Selected");
            return false;
        }
    }
</script>