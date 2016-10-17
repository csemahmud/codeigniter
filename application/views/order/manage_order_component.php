<div>
        <ul class="breadcrumb">
                <li>
                        <a href="#">Home</a> <span class="divider">/</span>
                </li>
                <li>
                        <a href="#">Manage Orders</a>
                </li>
        </ul>
</div>

<div class="row-fluid sortable">	
        <div class="box span12">
                <div class="box-header well" data-original-title>
                        <h2>Order Manager</h2>
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
                    <?php
                    if(count($all_orders) > 0) {
                    ?>
                    <table class="table table-bordered table-striped table-condensed">
                              <thead>
                                      <tr>
                                              <th>ID</th>
                                              <th>Customer Name</th>
                                              <th>Order Total</th>
                                              <th>Order Status</th>
                                              <th>Action</th>
                                      </tr>
                              </thead>   
                              <tbody>
                                  <?php foreach ($all_orders as $v_order) { ?>
                                    <tr>
                                        <td><?php echo $v_order->order_id; ?></td>
                                        <td class="center"><?php echo $v_order->first_name.' '.$v_order->last_name; ?></td>
                                        <td class="center"><?php echo $v_order->order_total; ?></td>
                                        <td class="center"><span <?php 
                                        if($v_order->order_status == $delivered){
                                            ?> class="success_message" <?php
                                        } elseif ($v_order->order_status == $pending){
                                            ?> class="warning_message" <?php
                                        }
                                        ?>><?php 
                                        echo $v_order->order_status; 
                                        ?></span></td>
                                        <td class="center">
                                            <a class="btn btn-info" href="<?php echo base_url(); ?>order_details_controller/order_details/<?php echo $v_order->order_id; ?>" title="Details" target="_blank"><i class="icon-zoom-in icon-white"></i></a>
                                            <a class="btn btn-info" href="<?php echo base_url(); ?>order_details_controller/edit_order/<?php echo $v_order->order_id; ?>" title="Edit"><i class="icon-pencil icon-white"></i></a>
                                            <a class="btn btn-danger" href="<?php echo base_url(); ?>order_controller/delete_order/<?php echo $v_order->order_id; ?>" onclick="return confirm('Are you sure, you want to delete this order ?')" title="Delete"><i class="icon-trash icon-white"></i></a>
                                            <a class="btn btn-info" href="<?php echo base_url(); ?>order_details_controller/download_invoice/<?php echo $v_order->order_id; ?>" title="Download Invoice"><i class="icon-download icon-white"></i></a>
                                            <a class="btn btn-success" href="<?php echo base_url(); ?>order_controller/deliver_order/<?php echo $v_order->order_id; ?>" title="Deliver"><i class="icon-check icon-white"></i></a> 
                                        </td>                                       
                                    </tr>
                                    <?php } ?>
                              </tbody>
                     </table>  
                     <div class="pagination pagination-centered">
                      <ul>
                            <li><?php
                            
                            echo $this->pagination->create_links();
                            
                            ?></li>
                      </ul>
                    </div>   
                    <?php } else {
                        ?><h1 class="error_message">No Order to show .....</h1><?php
                    } ?>
                </div>
        </div><!--/span-->
</div><!--/row-->