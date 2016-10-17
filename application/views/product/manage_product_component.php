<div>
        <ul class="breadcrumb">
                <li>
                        <a href="#">Home</a> <span class="divider">/</span>
                </li>
                <li>
                        <a href="#">Manage Products</a>
                </li>
        </ul>
</div>

<div class="row-fluid sortable">	
        <div class="box span12">
                <div class="box-header well" data-original-title>
                        <h2>Product Manager</h2>
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
                    <div class="row-fluid">
                        <div id="left_select" class="span6">
                        <div class="control-group">
                                <label class="control-label" for="selectError3">Select Category :</label>
                                <div class="controls">
                                    <select id="category_id" name="category_id" onchange="show_products_by_category_manufacturer()">
                                      <option value="all"><<--ALL Categories-->></option>
                                      <?php foreach ($all_categories as $v_category) { ?>
                                        <option value="<?php echo $v_category->category_id; ?>">
                                            <?php echo $v_category->category_name; ?>
                                        </option>
                                      <?php } ?>
                                  </select>
                                </div>
                          </div>                            
                    </div>
                    <div id="right_select" class="span6">
                        <div class="control-group">
                                <label class="control-label" for="selectError3">Select manufacturer :</label>
                                <div class="controls">
                                    <select id="manufacturer_id" name="manufacturer_id" onchange="show_products_by_category_manufacturer()">
                                      <option value="all"><<--ALL Manufacturers-->></option>
                                      <?php foreach ($all_manufacturers as $v_manufacturer) { ?>
                                        <option value="<?php echo $v_manufacturer->manufacturer_id; ?>">
                                            <?php echo $v_manufacturer->manufacturer_name; ?>
                                        </option>
                                      <?php } ?>
                                  </select>
                                </div>
                          </div>    
                    </div>
                    </div>
                    <div id="ajax_product_grid"><h3>Select Category or Manufacturer</h3></div>
                </div>
        </div><!--/span-->
</div><!--/row-->

<script type="text/javascript">
            
    function show_products_by_category_manufacturer(){
        var category_id = document.getElementById("category_id").value;
        var manufacturer_id = document.getElementById("manufacturer_id").value;
        
        if(category_id.length==0){
            document.getElementById('ajax_product_grid').innerHTML = '';
            return ;
        }
        
        if(manufacturer_id.length==0){
            document.getElementById('ajax_product_grid').innerHTML = '';
            return ;
        }

        if(window.XMLHttpRequest){
            //   code   for   IE7+,   Firefox   Chrome,   Opera   and   Safari
            var xmlhttp = new XMLHttpRequest();
        }
        else{
            //   code   for   IE6,   IE5
            var xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
        }

        xmlhttp.onreadystatechange = function(){
            if(xmlhttp.readyState==4 && xmlhttp.status==200){
                document.getElementById('ajax_product_grid').innerHTML = xmlhttp.responseText;
            }
        }
        
        xmlhttp.open('GET', '<?php echo base_url(); ?>product_controller/ajax_product_grid/'+category_id+'/'+manufacturer_id,true);
        
        xmlhttp.send();
    }
    
    show_products_by_category_manufacturer();
</script>