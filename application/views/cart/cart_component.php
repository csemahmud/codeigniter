<?php

    $contents = $this->cart->contents();
    /*echo '<pre>';
    print_r($contents);
    echo '</pre>';
    exit();*/

?>
<div class="row clearfix">
        <!--left content column-->
        <section class="col-lg-9 col-md-9 col-sm-9 m_xs_bottom_30">
                <h2 class="tt_uppercase color_dark m_bottom_25">Cart</h2>
                <!--cart table-->
                <table class="table_type_4 responsive_table full_width r_corners wraper shadow t_align_l t_xs_align_c m_bottom_30">
                        <thead>
                                <tr class="f_size_large">
                                        <!--titles for td-->
                                        <th>Product Image &amp; Name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Subtotal</th>
                                </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($contents as $content_value) { ?>
                                <tr>
                                        <!--Product name and image-->
                                        <td data-title="Product Image &amp; name" class="t_md_align_c">
                                                <img src="<?php echo base_url().$content_value['image'];?>" alt="" class="cart_img m_md_bottom_5 d_xs_block d_xs_centered">
                                                <a href="<?php echo base_url()."front_controller/details_product/".$content_value["id"];?>" 
                                                   class="d_inline_b m_left_5 color_dark">
                                                    <?php echo $content_value['name'];?>
                                                </a>
                                        </td>
                                        <!--product key-->
                                        <!--product price-->
                                        <td data-title="Price">
                                                <p class="f_size_large color_dark"><?php echo $content_value['price'];?> BDT</p>
                                        </td>
                                        <!--quanity-->
                                        <td data-title="Quantity">
                                            <form action="<?php echo base_url(); ?>cart_controller/update_cart" method="post">
                                                <div class="clearfix quantity r_corners d_inline_middle f_size_medium color_dark m_bottom_10">
                                                    
                                                    <input type="text" id="qty" name="qty" value="<?php echo $content_value['qty'];?>" class="f_left">
                                                    <input type="hidden" id="rowid" name="rowid" value="<?php echo $content_value['rowid'];?>">
                                                        
                                                </div>
                                                <div>
                                                    <button type="submit" class="color_dark"><i class="fa fa-check f_size_medium m_right_5"></i>Update</a><br /></button>
                                                    <a href="<?php echo base_url()."cart_controller/remove_from_cart/".$content_value['rowid']; ?>" class="color_dark"><i class="fa fa-times f_size_medium m_right_5"></i>Remove</a><br />
                                                </div>
                                            </form>
                                        </td>
                                        <!--subtotal-->
                                        <td data-title="Subtotal">
                                                <p class="f_size_large fw_medium scheme_color">
                                                    <?php echo $content_value['subtotal'];?> BDT
                                                </p>
                                        </td>
                                </tr>
                            <?php } ?>
                                <!--prices-->
                                <!--<tr>
                                        <td colspan="4">
                                                <p class="fw_medium f_size_large t_align_r t_xs_align_c">Coupon Discount:</p>
                                        </td>
                                        <td colspan="1">
                                                <p class="fw_medium f_size_large color_dark">$-74.96</p>
                                        </td>
                                </tr>
                                <tr>
                                        <td colspan="4">
                                                <p class="fw_medium f_size_large t_align_r t_xs_align_c">Subtotal:</p>
                                        </td>
                                        <td colspan="1">
                                                <p class="fw_medium f_size_large color_dark">$95.00</p>
                                        </td>
                                </tr>
                                <tr>
                                        <td colspan="4">
                                                <p class="fw_medium f_size_large t_align_r t_xs_align_c">Payment Fee:</p>
                                        </td>
                                        <td colspan="1">
                                                <p class="fw_medium f_size_large color_dark">$6.05</p>
                                        </td>
                                </tr>
                                <tr>
                                        <td colspan="4">
                                                <p class="fw_medium f_size_large t_align_r t_xs_align_c">Shipment Fee:</p>
                                        </td>
                                        <td colspan="1">
                                                <p class="fw_medium f_size_large color_dark">$0.00</p>
                                        </td>
                                </tr>
                                <tr>
                                        <td colspan="4">
                                                <p class="fw_medium f_size_large t_align_r t_xs_align_c">Tax Total:</p>
                                        </td>
                                        <td colspan="1">
                                                <p class="fw_medium f_size_large color_dark">$17.54</p>
                                        </td>
                                </tr>-->
                                <!--total-->
                                <tr>
                                        <td colspan="4" class="v_align_m d_ib_offset_large t_xs_align_l">
                                                <!--coupon-->
                                                <form class="d_ib_offset_0 d_inline_middle half_column d_xs_block w_xs_full m_xs_bottom_5">
                                                        <input type="text" placeholder="Enter your coupon code" name="" class="r_corners f_size_medium">
                                                        <button class="button_type_4 r_corners bg_light_color_2 m_left_5 mw_0 tr_all_hover color_dark">Save</button>
                                                </form>
                                                <p class="fw_medium f_size_large t_align_r scheme_color p_xs_hr_0 d_inline_middle half_column d_ib_offset_normal d_xs_block w_xs_full t_xs_align_c">Total:</p>
                                        </td>
                                        <td colspan="1" class="v_align_m">
                                                <p class="fw_medium f_size_large scheme_color m_xs_bottom_10"><?php echo $this->cart->total();?> BDT</p>
                                        </td>
                                </tr>
                        </tbody>
                </table>

                <?php
                    
                    echo $checkout_component;
                
                ?>
                
                <!--<h2 class="tt_uppercase color_dark m_bottom_30">Shipment Information</h2>
                <div class="bs_inner_offsets bg_light_color_3 shadow r_corners m_bottom_45">
                        <figure class="block_select clearfix relative m_bottom_15">
                                <input type="radio" checked name="radio_1" class="d_none">
                                <img src="<?php echo base_url();?>images/shipment_logo.jpg" alt="" class="f_left m_right_20 f_mxs_none m_mxs_bottom_10">
                                <figcaption>
                                        <h5 class="color_dark fw_medium m_bottom_15 m_sm_bottom_5">Shipment Method 1</h5>
                                        <p>Ut tellus dolor, dapibus eget, elementum vel, cursus eleifend, elit. Aenean auctor wisi et urna. Aliquam erat volutpat. Duis ac turpis. Donec sit amet eros. Lorem ipsum dolor sit amet, consecvtetuer. </p>
                                </figcaption>
                        </figure>
                        <hr class="m_bottom_20">
                        <figure class="block_select clearfix relative">
                                <input type="radio" name="radio_1" class="d_none">
                                <img src="<?php echo base_url();?>images/shipment_logo.jpg" alt="" class="f_left m_right_20 f_mxs_none m_mxs_bottom_10">
                                <figcaption>
                                        <h5 class="color_dark fw_medium m_bottom_15 m_sm_bottom_5">Shipment Method 2</h5>
                                        <p>Ut tellus dolor, dapibus eget, elementum vel, cursus eleifend, elit. Aenean auctor wisi et urna. Aliquam erat volutpat. Duis ac turpis. Donec sit amet eros.</p>
                                </figcaption>
                        </figure>
                </div>-->
                
                <h2 class="tt_uppercase color_dark m_bottom_30">Terms of service</h2>
                <div class="bs_inner_offsets bg_light_color_3 shadow r_corners m_bottom_45">
                        <p class="m_bottom_10">Ut tellus dolor, dapibus eget, elementum vel, cursus eleifend, elit. Aenean auctor wisi et urna. Aliquam erat volutpat. Duis ac turpis. Donec sit amet eros. Lorem ipsum dolor sit amet, consecvtetuer adipiscing elit. Mauris fermentum dictum magna. Sed laoreet aliquam leo. Ut tellus dolor, dapibus eget, elementum vel, cursus eleifend, elit. Aenean auctor wisi et urna. Aliquam erat volutpat. Duis ac turpis. Integer rutrum ante eu lacus.Vestibulum libero nisl, porta vel, scelerisque eget, malesuada at, neque. </p>
                        <p>Vivamus eget nibh. Etiam cursus leo vel metus. Nulla facilisi. Aenean nec eros. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Suspendisse sollicitudin velit sed leo. Ut pharetra augue nec augue. Nam elit agna,endrerit sit amet, tincidunt ac, viverra sed, nulla. Donec porta diam eu massa. Quisque diam lorem, interdum vitae,dapibus ac, scelerisque vitae, pede. Donec eget tellus non erat lacinia fermentum. Donec in velit vel ipsum auctor pulvinar. </p>
                </div>
                <h2 class="tt_uppercase color_dark m_bottom_30">Notes and special requests</h2>
                <!--requests table-->
                <table class="table_type_5 full_width r_corners wraper shadow t_align_l">
                        <tr>
                                <td colspan="2">
                                        <label for="notes" class="d_inline_b m_bottom_5">Notes and special requests:</label>
                                        <textarea id="notes" class="r_corners notes full_width"></textarea>
                                </td>
                        </tr>
                        <tr>
                                <td class="t_align_r">
                                        <p class="f_size_large fw_medium">Coupon Discount:</p>
                                </td>
                                <td>
                                        <p class="f_size_large fw_medium color_dark">$-74.96</p>
                                </td>
                        </tr>
                        <tr>
                                <td class="t_align_r">
                                        <p class="f_size_large fw_medium">Subtotal:</p>
                                </td>
                                <td>
                                        <p class="f_size_large fw_medium color_dark">$95.00</p>
                                </td>
                        </tr>
                        <tr>
                                <td class="t_align_r">
                                        <p class="f_size_large fw_medium">Payment Fee:</p>
                                </td>
                                <td>
                                        <p class="f_size_large fw_medium color_dark">$6.05</p>
                                </td>
                        </tr>
                        <tr>
                                <td class="t_align_r">
                                        <p class="f_size_large fw_medium">Shipment Fee:</p>
                                </td>
                                <td>
                                        <p class="f_size_large fw_medium color_dark">$0.00</p>
                                </td>
                        </tr>
                        <tr>
                                <td class="t_align_r">
                                        <p class="f_size_large fw_medium">Tax Total:</p>
                                </td>
                                <td>
                                        <p class="f_size_large fw_medium color_dark">$17.54</p>
                                </td>
                        </tr>
                        <tr>
                                <td class="t_align_r">
                                        <p class="f_size_large fw_medium scheme_color">Total:</p>
                                </td>
                                <td>
                                        <p class="f_size_large fw_medium scheme_color">$101.05</p>
                                </td>
                        </tr>
                        <tr>
                                <td colspan="2">
                                        <input type="checkbox" name="checkbox_8" id="checkbox_8" class="d_none"><label for="checkbox_8">I agree to the Terms of Service (Terms of service)</label>
                                </td>
                        </tr>
                        <tr>
                                <td colspan="2">
                                        <button class="button_type_6 bg_scheme_color f_size_large r_corners tr_all_hover color_light m_bottom_20">Confirm Purchase</button>
                                </td>
                        </tr>
                </table>
        </section>
        <!--right column-->
        <aside class="col-lg-3 col-md-3 col-sm-3">
                <!--widgets-->
                <figure class="widget shadow r_corners wrapper m_bottom_30">
                        <figcaption>
                                <h3 class="color_light">Categories</h3>
                        </figcaption>
                        <div class="widget_content">
                                <!--Categories list-->
                                <ul class="categories_list">
                                        <li class="active">
                                                <a href="#" class="f_size_large scheme_color d_block relative">
                                                        <b>Women</b>
                                                        <span class="bg_light_color_1 r_corners f_right color_dark talign_c"></span>
                                                </a>
                                                <!--second level-->
                                                <ul>
                                                        <li class="active">
                                                                <a href="#" class="d_block f_size_large color_dark relative">
                                                                        Dresses<span class="bg_light_color_1 r_corners f_right color_dark talign_c"></span>
                                                                </a>
                                                                <!--third level-->
                                                                <ul>
                                                                        <li><a href="#" class="color_dark d_block">Evening Dresses</a></li>
                                                                        <li><a href="#" class="color_dark d_block">Casual Dresses</a></li>
                                                                        <li><a href="#" class="color_dark d_block">Party Dresses</a></li>
                                                                </ul>
                                                        </li>
                                                        <li>
                                                                <a href="#" class="d_block f_size_large color_dark relative">
                                                                        Accessories<span class="bg_light_color_1 r_corners f_right color_dark talign_c"></span>
                                                                </a>
                                                        </li>
                                                        <li>
                                                                <a href="#" class="d_block f_size_large color_dark relative">
                                                                        Tops<span class="bg_light_color_1 r_corners f_right color_dark talign_c"></span>
                                                                </a>
                                                        </li>
                                                </ul>
                                        </li>
                                        <li>
                                                <a href="#" class="f_size_large color_dark d_block relative">
                                                        <b>Men</b>
                                                        <span class="bg_light_color_1 r_corners f_right color_dark talign_c"></span>
                                                </a>
                                                <!--second level-->
                                                <ul class="d_none">
                                                        <li>
                                                                <a href="#" class="d_block f_size_large color_dark relative">
                                                                        Shorts<span class="bg_light_color_1 r_corners f_right color_dark talign_c"></span>
                                                                </a>
                                                                <!--third level-->
                                                                <ul class="d_none">
                                                                        <li><a href="#" class="color_dark d_block">Evening</a></li>
                                                                        <li><a href="#" class="color_dark d_block">Casual</a></li>
                                                                        <li><a href="#" class="color_dark d_block">Party</a></li>
                                                                </ul>
                                                        </li>
                                                </ul>
                                        </li>
                                        <li>
                                                <a href="#" class="f_size_large color_dark d_block relative">
                                                        <b>Kids</b>
                                                        <span class="bg_light_color_1 r_corners f_right color_dark talign_c"></span>
                                                </a>
                                        </li>
                                </ul>
                        </div>
                </figure>
                <!--compare products-->
                <figure class="widget shadow r_corners wrapper m_bottom_30">
                        <figcaption>
                                <h3 class="color_light">Compare Products</h3>
                        </figcaption>
                        <div class="widget_content">
                                <div class="clearfix m_bottom_15 relative cw_product">
                                        <img src="<?php echo base_url();?>images/bestsellers_img_1.jpg" alt="" class="f_left m_right_15 m_sm_bottom_10 f_sm_none f_xs_left m_xs_bottom_0">
                                        <a href="#" class="color_dark d_block bt_link">Ut tellus dolor dapibus</a>
                                        <button type="button" class="f_size_medium f_right color_dark bg_tr tr_all_hover close_fieldset"><i class="fa fa-times lh_inherit"></i></button>
                                </div>
                                <hr class="m_bottom_15">
                                <div class="clearfix m_bottom_25 relative cw_product">
                                        <img src="<?php echo base_url();?>images/bestsellers_img_2.jpg" alt="" class="f_left m_right_15 m_sm_bottom_10 f_sm_none f_xs_left m_xs_bottom_0">
                                        <a href="#" class="color_dark d_block bt_link">Elemenum vel</a>
                                        <button type="button" class="f_size_medium f_right color_dark bg_tr tr_all_hover close_fieldset"><i class="fa fa-times lh_inherit"></i></button>
                                </div>
                                <a href="#" class="color_dark"><i class="fa fa-files-o m_right_10"></i>Go to Compare</a>
                        </div>
                </figure>
                <!--wishlist-->
                <figure class="widget shadow r_corners wrapper m_bottom_30">
                        <figcaption>
                                <h3 class="color_light">Wishlist</h3>
                        </figcaption>
                        <div class="widget_content">
                                <div class="clearfix m_bottom_15 relative cw_product">
                                        <img src="<?php echo base_url();?>images/bestsellers_img_1.jpg" alt="" class="f_left m_right_15 m_sm_bottom_10 f_sm_none f_xs_left m_xs_bottom_0">
                                        <a href="#" class="color_dark d_block bt_link">Ut tellus dolor dapibus</a>
                                        <button type="button" class="f_size_medium f_right color_dark bg_tr tr_all_hover close_fieldset"><i class="fa fa-times lh_inherit"></i></button>
                                </div>
                                <hr class="m_bottom_15">
                                <div class="clearfix m_bottom_25 relative cw_product">
                                        <img src="<?php echo base_url();?>images/bestsellers_img_2.jpg" alt="" class="f_left m_right_15 m_sm_bottom_10 f_sm_none f_xs_left m_xs_bottom_0">
                                        <a href="#" class="color_dark d_block bt_link">Elemenum vel</a>
                                        <button type="button" class="f_size_medium f_right color_dark bg_tr tr_all_hover close_fieldset"><i class="fa fa-times lh_inherit"></i></button>
                                </div>
                                <a href="#" class="color_dark"><i class="fa fa-heart-o m_right_10"></i>Go to Wishlist</a>
                        </div>
                </figure>
                <!--banner-->
                <a href="#" class="d_block r_corners m_bottom_30">
                        <img src="<?php echo base_url();?>images/banner_img_6.jpg" alt="">
                </a>
                <!--Bestsellers-->
                <figure class="widget shadow r_corners wrapper m_bottom_30">
                        <figcaption>
                                <h3 class="color_light">Bestsellers</h3>
                        </figcaption>
                        <div class="widget_content">
                                <div class="clearfix m_bottom_15">
                                        <img src="<?php echo base_url();?>images/bestsellers_img_1.jpg" alt="" class="f_left m_right_15 m_sm_bottom_10 f_sm_none f_xs_left m_xs_bottom_0">
                                        <a href="#" class="color_dark d_block bt_link">Ut dolor dapibus</a>
                                        <!--rating-->
                                        <ul class="horizontal_list clearfix d_inline_b rating_list type_2 tr_all_hover m_bottom_10">
                                                <li class="active">
                                                        <i class="fa fa-star-o empty tr_all_hover"></i>
                                                        <i class="fa fa-star active tr_all_hover"></i>
                                                </li>
                                                <li class="active">
                                                        <i class="fa fa-star-o empty tr_all_hover"></i>
                                                        <i class="fa fa-star active tr_all_hover"></i>
                                                </li>
                                                <li class="active">
                                                        <i class="fa fa-star-o empty tr_all_hover"></i>
                                                        <i class="fa fa-star active tr_all_hover"></i>
                                                </li>
                                                <li class="active">
                                                        <i class="fa fa-star-o empty tr_all_hover"></i>
                                                        <i class="fa fa-star active tr_all_hover"></i>
                                                </li>
                                                <li>
                                                        <i class="fa fa-star-o empty tr_all_hover"></i>
                                                        <i class="fa fa-star active tr_all_hover"></i>
                                                </li>
                                        </ul>
                                        <p class="scheme_color">$61.00</p>
                                </div>
                                <hr class="m_bottom_15">
                                <div class="clearfix m_bottom_15">
                                        <img src="<?php echo base_url();?>images/bestsellers_img_2.jpg" alt="" class="f_left m_right_15 m_sm_bottom_10 f_sm_none f_xs_left m_xs_bottom_0">
                                        <a href="#" class="color_dark d_block bt_link">Elementum vel</a>
                                        <!--rating-->
                                        <ul class="horizontal_list clearfix d_inline_b rating_list type_2 tr_all_hover m_bottom_10">
                                                <li class="active">
                                                        <i class="fa fa-star-o empty tr_all_hover"></i>
                                                        <i class="fa fa-star active tr_all_hover"></i>
                                                </li>
                                                <li class="active">
                                                        <i class="fa fa-star-o empty tr_all_hover"></i>
                                                        <i class="fa fa-star active tr_all_hover"></i>
                                                </li>
                                                <li class="active">
                                                        <i class="fa fa-star-o empty tr_all_hover"></i>
                                                        <i class="fa fa-star active tr_all_hover"></i>
                                                </li>
                                                <li class="active">
                                                        <i class="fa fa-star-o empty tr_all_hover"></i>
                                                        <i class="fa fa-star active tr_all_hover"></i>
                                                </li>
                                                <li>
                                                        <i class="fa fa-star-o empty tr_all_hover"></i>
                                                        <i class="fa fa-star active tr_all_hover"></i>
                                                </li>
                                        </ul>
                                        <p class="scheme_color">$57.00</p>
                                </div>
                                <hr class="m_bottom_15">
                                <div class="clearfix m_bottom_5">
                                        <img src="<?php echo base_url();?>images/bestsellers_img_3.jpg" alt="" class="f_left m_right_15 m_sm_bottom_10 f_sm_none f_xs_left m_xs_bottom_0">
                                        <a href="#" class="color_dark d_block bt_link">Crsus eleifend elit</a>
                                        <!--rating-->
                                        <ul class="horizontal_list clearfix d_inline_b rating_list type_2 tr_all_hover m_bottom_10">
                                                <li class="active">
                                                        <i class="fa fa-star-o empty tr_all_hover"></i>
                                                        <i class="fa fa-star active tr_all_hover"></i>
                                                </li>
                                                <li class="active">
                                                        <i class="fa fa-star-o empty tr_all_hover"></i>
                                                        <i class="fa fa-star active tr_all_hover"></i>
                                                </li>
                                                <li class="active">
                                                        <i class="fa fa-star-o empty tr_all_hover"></i>
                                                        <i class="fa fa-star active tr_all_hover"></i>
                                                </li>
                                                <li class="active">
                                                        <i class="fa fa-star-o empty tr_all_hover"></i>
                                                        <i class="fa fa-star active tr_all_hover"></i>
                                                </li>
                                                <li>
                                                        <i class="fa fa-star-o empty tr_all_hover"></i>
                                                        <i class="fa fa-star active tr_all_hover"></i>
                                                </li>
                                        </ul>
                                        <p class="scheme_color">$24.00</p>
                                </div>
                        </div>
                </figure>
                <!--tags-->
                <figure class="widget shadow r_corners wrapper m_bottom_30">
                        <figcaption>
                                <h3 class="color_light">Tags</h3>
                        </figcaption>
                        <div class="widget_content">
                                <div class="tags_list">
                                        <a href="#" class="color_dark d_inline_b v_align_b">accessories,</a>
                                        <a href="#" class="color_dark d_inline_b f_size_ex_large v_align_b">bestseller,</a>
                                        <a href="#" class="color_dark d_inline_b v_align_b">clothes,</a>
                                        <a href="#" class="color_dark d_inline_b f_size_big v_align_b">dresses,</a>
                                        <a href="#" class="color_dark d_inline_b v_align_b">fashion,</a>
                                        <a href="#" class="color_dark d_inline_b f_size_large v_align_b">men,</a>
                                        <a href="#" class="color_dark d_inline_b v_align_b">pants,</a>
                                        <a href="#" class="color_dark d_inline_b v_align_b">sale,</a>
                                        <a href="#" class="color_dark d_inline_b v_align_b">short,</a>
                                        <a href="#" class="color_dark d_inline_b f_size_ex_large v_align_b">skirt,</a>
                                        <a href="#" class="color_dark d_inline_b v_align_b">top,</a>
                                        <a href="#" class="color_dark d_inline_b f_size_big v_align_b">women</a>
                                </div>
                        </div>
                </figure>
                <!--New products-->
                <figure class="widget shadow r_corners wrapper m_bottom_30">
                        <figcaption>
                                <h3 class="color_light">New Products</h3>
                        </figcaption>
                        <div class="widget_content">
                                <div class="clearfix m_bottom_15">
                                        <img src="<?php echo base_url();?>images/new_products_img_1.jpg" alt="" class="f_left m_right_15 m_sm_bottom_10 f_sm_none f_xs_left m_xs_bottom_0">
                                        <a href="#" class="color_dark d_block m_bottom_5 bt_link">Ut tellus dolor dapibus</a>
                                        <p class="scheme_color">$61.00</p>
                                </div>
                                <hr class="m_bottom_15">
                                <div class="clearfix m_bottom_15">
                                        <img src="<?php echo base_url();?>images/new_products_img_2.jpg" alt="" class="f_left m_right_15 m_sm_bottom_10 f_sm_none f_xs_left m_xs_bottom_0">
                                        <a href="#" class="color_dark d_block m_bottom_5 bt_link">Elementum vel</a>
                                        <p class="scheme_color">$57.00</p>
                                </div>
                                <hr class="m_bottom_15">
                                <div class="clearfix m_bottom_5">
                                        <img src="<?php echo base_url();?>images/new_products_img_3.jpg" alt="" class="f_left m_right_15 m_sm_bottom_10 f_sm_none f_xs_left m_xs_bottom_0">
                                        <a href="#" class="color_dark d_block m_bottom_5 bt_link">Crsus eleifend elit</a>
                                        <p class="scheme_color">$24.00</p>
                                </div>
                        </div>
                </figure>
                <!--Specials-->
                <figure class="widget shadow r_corners wrapper m_bottom_30">
                        <figcaption class="clearfix relative">
                                <h3 class="color_light f_left f_sm_none m_sm_bottom_10 m_xs_bottom_0">Specials</h3>
                                <div class="f_right nav_buttons_wrap_type_2 tf_sm_none f_sm_none clearfix">
                                        <button class="button_type_7 bg_cs_hover box_s_none f_size_ex_large color_light t_align_c bg_tr f_left tr_delay_hover r_corners sc_prev"><i class="fa fa-angle-left"></i></button>
                                        <button class="button_type_7 bg_cs_hover box_s_none f_size_ex_large color_light t_align_c bg_tr f_left m_left_5 tr_delay_hover r_corners sc_next"><i class="fa fa-angle-right"></i></button>
                                </div>
                        </figcaption>
                        <div class="widget_content">
                                <div class="specials_carousel">
                                        <!--carousel item-->
                                        <div class="specials_item">
                                                <a href="#" class="d_block d_xs_inline_b wrapper m_bottom_20">
                                                        <img class="tr_all_long_hover" src="<?php echo base_url();?>uploads/product_images/product_img_6.jpg" alt="">
                                                </a>
                                                <h5 class="m_bottom_10"><a href="#" class="color_dark">Aliquam erat volutpat</a></h5>
                                                <p class="f_size_large m_bottom_15"><s>$79.00</s> <span class="scheme_color">$36.00</span></p>
                                                <button class="button_type_4 mw_sm_0 r_corners color_light bg_scheme_color tr_all_hover m_bottom_5">Add to Cart</button>
                                        </div>
                                        <!--carousel item-->
                                        <div class="specials_item">
                                                <a href="#" class="d_block d_xs_inline_b wrapper m_bottom_20">
                                                        <img class="tr_all_long_hover" src="<?php echo base_url();?>uploads/product_images/product_img_7.jpg" alt="">
                                                </a>
                                                <h5 class="m_bottom_10"><a href="#" class="color_dark">Integer rutrum ante </a></h5>
                                                <p class="f_size_large m_bottom_15"><s>$79.00</s> <span class="scheme_color">$36.00</span></p>
                                                <button class="button_type_4 mw_sm_0 r_corners color_light bg_scheme_color tr_all_hover m_bottom_5">Add to Cart</button>
                                        </div>
                                        <!--carousel item-->
                                        <div class="specials_item">
                                                <a href="#" class="d_block d_xs_inline_b wrapper m_bottom_20">
                                                        <img class="tr_all_long_hover" src="<?php echo base_url();?>uploads/product_images/product_img_5.jpg" alt="">
                                                </a>
                                                <h5 class="m_bottom_10"><a href="#" class="color_dark">Aliquam erat volutpat</a></h5>
                                                <p class="f_size_large m_bottom_15"><s>$79.00</s> <span class="scheme_color">$36.00</span></p>
                                                <button class="button_type_4 mw_sm_0 r_corners color_light bg_scheme_color tr_all_hover m_bottom_5">Add to Cart</button>
                                        </div>
                                </div>
                        </div>
                </figure>
                <!--Popular articles-->
                <figure class="widget shadow r_corners wrapper m_bottom_30">
                        <figcaption>
                                <h3 class="color_light">Popular Articles</h3>
                        </figcaption>
                        <div class="widget_content">
                                <article class="clearfix m_bottom_15">
                                        <img src="<?php echo base_url();?>images/article_img_1.jpg" alt="" class="f_left m_right_15 m_sm_bottom_10 f_sm_none f_xs_left m_xs_bottom_0">
                                        <a href="#" class="color_dark d_block bt_link p_vr_0">Aliquam erat volutpat.</a>
                                        <p class="f_size_medium">50 comments</p>
                                </article>
                                <hr class="m_bottom_15">
                                <article class="clearfix m_bottom_15">
                                        <img src="<?php echo base_url();?>images/article_img_2.jpg" alt="" class="f_left m_right_15 m_sm_bottom_10 f_sm_none f_xs_left m_xs_bottom_0">
                                        <a href="#" class="color_dark d_block p_vr_0 bt_link">Integer rutrum ante </a>
                                        <p class="f_size_medium">34 comments</p>
                                </article>
                                <hr class="m_bottom_15">
                                <article class="clearfix m_bottom_5">
                                        <img src="<?php echo base_url();?>images/article_img_3.jpg" alt="" class="f_left m_right_15 m_sm_bottom_10 f_sm_none f_xs_left m_xs_bottom_0">
                                        <a href="#" class="color_dark d_block p_vr_0 bt_link">Vestibulum libero nisl, porta vel</a>
                                        <p class="f_size_medium">21 comments</p>
                                </article>
                        </div>
                </figure>
                <!--Latest articles-->
                <figure class="widget shadow r_corners wrapper m_bottom_30">
                        <figcaption>
                                <h3 class="color_light">Latest Articles</h3>
                        </figcaption>
                        <div class="widget_content">
                                <article class="clearfix m_bottom_15">
                                        <img src="<?php echo base_url();?>images/article_img_4.jpg" alt="" class="f_left m_right_15 m_sm_bottom_10 f_sm_none f_xs_left m_xs_bottom_0">
                                        <a href="#" class="color_dark d_block bt_link p_vr_0">Aliquam erat volutpat.</a>
                                        <p class="f_size_medium">25 January, 2013</p>
                                </article>
                                <hr class="m_bottom_15">
                                <article class="clearfix m_bottom_15">
                                        <img src="<?php echo base_url();?>images/article_img_5.jpg" alt="" class="f_left m_right_15 m_sm_bottom_10 f_sm_none f_xs_left m_xs_bottom_0">
                                        <a href="#" class="color_dark d_block p_vr_0 bt_link">Integer rutrum ante </a>
                                        <p class="f_size_medium">21 January, 2013</p>
                                </article>
                                <hr class="m_bottom_15">
                                <article class="clearfix m_bottom_5">
                                        <img src="<?php echo base_url();?>images/article_img_6.jpg" alt="" class="f_left m_right_15 m_sm_bottom_10 f_sm_none f_xs_left m_xs_bottom_0">
                                        <a href="#" class="color_dark d_block p_vr_0 bt_link">Vestibulum libero nisl, porta vel</a>
                                        <p class="f_size_medium">18 January, 2013</p>
                                </article>
                        </div>
                </figure>
        </aside>
</div>