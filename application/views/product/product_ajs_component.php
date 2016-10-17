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

<div class="row-fluid sortable" ng-app="mahmud_ecommerce_app">	
    <div class="box span12" ng-controller="all_products_controller">
        <div class="box-header well" data-original-title>
                <h2>AngularJs Product Manager</h2>
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
                                <select id="category_id" name="category_id" ng-model="category"
                                        ng-options="ct for ct in products | orderBy:'category_name' | unique:'category_name'"
                                        ng-change="reset_by_category()">
                                </select>
                              </div>
                    </div>                            
                </div>
                <div id="right_select" class="span6">
                    <div class="control-group">
                            <label class="control-label" for="selectError3">Select manufacturer :</label>
                            <div class="controls">
                                <select id="manufacturer_id" name="manufacturer_id" ng-model="manufacturer"
                                        ng-options="mn for mn in products | orderBy:'manufacturer_name' | unique:'manufacturer_name'"
                                        ng-change="reset_by_manufacturer()">
                                </select>
                            </div>
                      </div>    
                </div>
            </div>
                    
            <div id="product_grid" ng-if="((products | filter:is_product_selected).length > 0)">

                <div class="row-fluid">
                    <div id="left_select" class="span6">
                        <div class="control-group">
                                <label class="control-label" for="selectError3">Select Products Per Page :-</label>
                                <div class="controls">
                                    <select id="category_id" name="category_id" ng-model="page_size"
                                            ng-options="num for num in limit_range"
                                            ng-change="reset_page()">
                                    </select>
                                  </div>
                        </div>                            
                    </div>
                    <div id="left_select" class="span6">
                        <div class="control-group">
                            <div class="controls">
                                <h3>Total Products : 
                                    <button class="btn btn-info">{{(products | filter:is_product_selected).length}}</button>
                                </h3>;
                              </div>
                        </div>                            
                    </div>
                </div>

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
                          <tr ng-repeat="pr in products | filter:is_product_selected | orderBy:'-product_id' | range:selected_page:page_size">
                              <td>{{pr.product_id}}</td>
                              <td class="center">{{pr.product_name}}</td>
                              <td class="center">
                                  <span ng-if="(pr.pr_publication_status == 1)" class="success_message">Published</span>
                                  <span ng-if="(pr.pr_publication_status == 0)" class="error_message">Unpublished</span>
                              </td>
                              <td class="center">
                                  <a class="btn btn-info" ng-href="<?php echo base_url(); ?>product_controller/edit_product/{{pr.product_id}}" title="Edit"><i class="icon-edit icon-white"></i></a>
                                  <a class="btn btn-danger" ng-href="<?php echo base_url(); ?>product_controller/ajs_delete_product/{{pr.product_id}}" 
                                     onclick="return confirm('Are you sure, you want to delete this Product ?')" title="Delete">
                                      <i class="icon-trash icon-white"></i></a> 

                                  <a class="btn btn-danger" ng-if="(pr.pr_publication_status == 1)" ng-href="<?php echo base_url(); ?>product_controller/ajs_unpublish_product/{{pr.product_id}}" title="Unpublish"><i class="icon-eye-close icon-black"></i></a>

                                  <a class="btn btn-success" ng-if="(pr.pr_publication_status == 0)" ng-href="<?php echo base_url(); ?>product_controller/ajs_publish_product/{{pr.product_id}}" title="Publish"><i class="icon-eye-open icon-white"></i></a>

                              </td>                                       
                          </tr>
                    </tbody>
                 </table>  
                 <div class="pagination pagination-centered">
                  <ul class="right btn-group">
                        <li>
                            <a ng-repeat="page in products | filter:is_product_selected | page_count:page_size"
                                ng-click="select_page($index + 1)" class="btn btn-default"
                                ng-class="get_btn_class($index + 1)">
                                 {{$index + 1}}
                             </a>
                        </li>
                  </ul>
                </div>
            </div>   
            <h1 ng-if="((products | filter:is_product_selected).length == 0)" class="error_message">
                No Product to show .....
            </h1>
        </div>
    </div><!--/span-->
</div><!--/row--