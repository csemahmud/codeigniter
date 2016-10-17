<div class="clearfix m_bottom_30 t_xs_align_c">
        <div class="photoframe type_2 shadow r_corners f_left f_sm_none d_xs_inline_b product_single_preview relative m_right_30 m_bottom_5 m_sm_bottom_20 m_xs_right_0 w_mxs_full">
                <span class="hot_stripe"><img src="<?php echo base_url();?>images/sale_product.png" alt=""></span>
                <div class="relative d_inline_b m_bottom_10 qv_preview d_xs_block">
                    <figure id="fig_zoom_image">
                        <img id="zoom_image" src="<?php echo base_url().$product_info->upload_path.$product_info->product_image; ?>" 
                             data-zoom-image="<?php echo base_url().$product_info->upload_path.$product_info->product_image; ?>" class="tr_all_hover" alt="">
                        <a href="<?php echo base_url().$product_info->upload_path.$product_info->product_image; ?>" class="d_block button_type_5 r_corners tr_all_hover box_s_none color_light p_hr_0">
                                <i class="fa fa-expand"></i>
                        </a>
                    </figure>
                </div>
                <!--carousel-->
                <div class="relative qv_carousel_wrap">
                        <button class="button_type_11 bg_light_color_1 t_align_c f_size_ex_large bg_cs_hover r_corners d_inline_middle bg_tr tr_all_hover qv_btn_single_prev">
                                <i class="fa fa-angle-left "></i>
                        </button>
                        <ul class="qv_carousel_single d_inline_middle">
                                <a href="#" data-image="<?php echo base_url();?>images/quick_view_img_7.jpg" data-zoom-image="<?php echo base_url();?>images/preview_zoom_1.jpg"><img src="<?php echo base_url();?>images/quick_view_img_10.jpg" alt=""></a>
                                <a href="#" data-image="<?php echo base_url();?>images/quick_view_img_8.jpg" data-zoom-image="<?php echo base_url();?>images/preview_zoom_2.jpg"><img src="<?php echo base_url();?>images/quick_view_img_11.jpg" alt=""></a>
                                <a href="#" data-image="<?php echo base_url();?>images/quick_view_img_9.jpg" data-zoom-image="<?php echo base_url();?>images/preview_zoom_3.jpg"><img src="<?php echo base_url();?>images/quick_view_img_12.jpg" alt=""></a>
                                <a href="#" data-image="<?php echo base_url();?>images/quick_view_img_16.jpg" data-zoom-image="<?php echo base_url();?>images/preview_zoom_4.jpg"><img src="<?php echo base_url();?>images/quick_view_img_13.jpg" alt=""></a>
                                <a href="#" data-image="<?php echo base_url();?>images/quick_view_img_17.jpg" data-zoom-image="<?php echo base_url();?>images/preview_zoom_5.jpg"><img src="<?php echo base_url();?>images/quick_view_img_14.jpg" alt=""></a>
                                <a href="#" data-image="<?php echo base_url();?>images/quick_view_img_18.jpg" data-zoom-image="<?php echo base_url();?>images/preview_zoom_6.jpg"><img src="<?php echo base_url();?>images/quick_view_img_15.jpg" alt=""></a>
                        </ul>
                        <button class="button_type_11 bg_light_color_1 t_align_c f_size_ex_large bg_cs_hover r_corners d_inline_middle bg_tr tr_all_hover qv_btn_single_next">
                                <i class="fa fa-angle-right "></i>
                        </button>
                </div>
        </div>
        <div class="p_top_10 t_xs_align_l">
                <!--description-->
                <h2 class="color_dark fw_medium m_bottom_10"><?php echo $product_info->product_name; ?></h2>
                <div class="m_bottom_10">
                        <!--rating-->
                        <ul class="horizontal_list d_inline_middle type_2 clearfix rating_list tr_all_hover">
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
                        <a href="#" class="d_inline_middle default_t_color f_size_small m_left_5">1 Review(s) </a>
                </div>
                <hr class="m_bottom_10 divider_type_3">
                <table class="description_table m_bottom_10">
                        <tr>
                                <td>Manufacturer:</td>
                                <td><a href="#" class="color_dark"><?php echo $product_info->manufacturer_name; ?></a></td>
                        </tr>
                        <tr>
                                <td>Availability:</td>
                                <?php if($product_info->product_quantity > 0){ ?>
                                    <td><span class="color_green">in stock</span>
                                <?php } ?>
                                    <?php 
                                echo $product_info->product_quantity; 
                                ?> item(s)</td>
                        </tr>
                        <?php if(isset($product_info->expiry_date)){
                            if(($product_info->expiry_date!= NULL)&&($product_info->expiry_date != '')){
                            ?>
                        <tr>
                                <td>Expiry Date :</td>
                                <td><?php echo $product_info->expiry_date; ?></td>
                        </tr>
                        <?php }}?>
                </table>
                <h5 class="fw_medium m_bottom_10">Product Dimensions and Weight</h5>
                <table class="description_table m_bottom_5">
                        <tr>
                                <td>Product Length:</td>
                                <td><span class="color_dark">10.0000M</span></td>
                        </tr>
                        <tr>
                                <td>Product Weight:</td>
                                <td>10.0000KG</td>
                        </tr>
                </table>
                <hr class="divider_type_3 m_bottom_10">
                <p class="m_bottom_10"><?php echo $product_info->product_short_description; ?> </p>
                <hr class="divider_type_3 m_bottom_15">
                <div class="m_bottom_15">
                        <s class="v_align_b f_size_ex_large"><?php echo ($product_info->product_price * 1.4); ?> BDT</s>
                        <span class="v_align_b f_size_big m_left_5 scheme_color fw_medium"><?php echo $product_info->product_price; ?> BDT</span>
                </div>
                <form action="<?php echo base_url(); ?>cart_controller/add_to_cart.aspx" method="post">
                    <table class="description_table type_2 m_bottom_15">
                            <!--<tr>
                                    <td class="v_align_m">Size:</td>
                                    <td class="v_align_m">
                                            <div class="custom_select f_size_medium relative d_inline_middle">
                                                    <div class="select_title r_corners relative color_dark">s</div>
                                                    <ul class="select_list d_none"></ul>
                                                    <select name="product_name">
                                                            <option value="s">s</option>
                                                            <option value="m">m</option>
                                                            <option value="l">l</option>
                                                    </select>
                                            </div>
                                    </td>
                            </tr>-->
                            <tr>
                                    <td class="v_align_m">Quantity:</td>
                                    <td class="v_align_m">
                                            <div class="clearfix quantity r_corners d_inline_middle f_size_medium color_dark">
                                                    
                                                    <input type="text" id="qty" name="qty" value="1" class="f_left">
                                                    
                                                    
                                            </div>
                                        <input type="hidden" id="product_id" name="product_id" value="<?php echo $product_info->product_id; ?>" >
                                        <input type="hidden" id="product_name" name="product_name" value="<?php echo $product_info->product_name; ?>" >
                                        <input type="hidden" id="product_price" name="product_price" value="<?php echo $product_info->product_price; ?>" >
                                        <input type="hidden" id="upload_path" name="upload_path" value="<?php echo $product_info->upload_path; ?>" >
                                        <input type="hidden" id="product_image" name="product_image" value="<?php echo $product_info->product_image; ?>" >
                                    </td>
                            </tr>
                    </table>
                    <div class="d_ib_offset_0 m_bottom_20">
                        <button type="submit" class="button_type_12 r_corners bg_scheme_color color_light tr_delay_hover d_inline_b f_size_large">Add to Cart</button>
                            <button class="button_type_12 bg_light_color_2 tr_delay_hover d_inline_b r_corners color_dark m_left_5 p_hr_0"><span class="tooltip tr_all_hover r_corners color_dark f_size_small">Wishlist</span><i class="fa fa-heart-o f_size_big"></i></button>
                            <button class="button_type_12 bg_light_color_2 tr_delay_hover d_inline_b r_corners color_dark m_left_5 p_hr_0"><span class="tooltip tr_all_hover r_corners color_dark f_size_small">Compare</span><i class="fa fa-files-o f_size_big"></i></button>
                            <button class="button_type_12 bg_light_color_2 tr_delay_hover d_inline_b r_corners color_dark m_left_5 p_hr_0 relative"><i class="fa fa-question-circle f_size_big"></i><span class="tooltip tr_all_hover r_corners color_dark f_size_small">Ask a Question</span></button>
                    </div>
                </form>
                <p class="d_inline_middle">Share this:</p>
                <div class="d_inline_middle m_left_5 addthis_widget_container">
                        <!-- AddThis Button BEGIN -->
                        <div class="addthis_toolbox addthis_default_style addthis_32x32_style">
                        <a class="addthis_button_preferred_1"></a>
                        <a class="addthis_button_preferred_2"></a>
                        <a class="addthis_button_preferred_3"></a>
                        <a class="addthis_button_preferred_4"></a>
                        <a class="addthis_button_compact"></a>
                        <a class="addthis_counter addthis_bubble_style"></a>
                        </div>
                        <!-- AddThis Button END -->
                </div>
        </div>
</div>
<!--tabs-->
<div class="tabs m_bottom_45">
        <!--tabs navigation-->
        <nav>
                <ul class="tabs_nav horizontal_list clearfix">
                        <li class="f_xs_none"><a href="#tab-1" class="bg_light_color_1 color_dark tr_delay_hover r_corners d_block">Description</a></li>
                        <li class="f_xs_none"><a href="#tab-2" class="bg_light_color_1 color_dark tr_delay_hover r_corners d_block">Specifications</a></li>
                        <li class="f_xs_none"><a href="#tab-3" class="bg_light_color_1 color_dark tr_delay_hover r_corners d_block">Reviews</a></li>
                        <li class="f_xs_none"><a href="#tab-4" class="bg_light_color_1 color_dark tr_delay_hover r_corners d_block">Custom Tab</a></li>
                </ul>
        </nav>
        <section class="tabs_content shadow r_corners">
                <div id="tab-1">
                    <p class="m_bottom_10">
                        <?php echo $product_info->product_long_description; ?>
                    </p>
                </div>
                
        </section>
</div>
<div class="clearfix">
        <h2 class="color_dark tt_uppercase f_left m_bottom_15 f_mxs_none">Related Products</h2>
        <div class="f_right clearfix nav_buttons_wrap f_mxs_none m_mxs_bottom_5">
                <button class="button_type_7 bg_cs_hover box_s_none f_size_ex_large t_align_c bg_light_color_1 f_left tr_delay_hover r_corners rp_prev"><i class="fa fa-angle-left"></i></button>
                <button class="button_type_7 bg_cs_hover box_s_none f_size_ex_large t_align_c bg_light_color_1 f_left m_left_5 tr_delay_hover r_corners rp_next"><i class="fa fa-angle-right"></i></button>
        </div>
</div>
<div class="related_projects product_full_width m_bottom_15">
        <figure class="r_corners photoframe shadow relative d_inline_b d_md_block d_xs_inline_b tr_all_hover">
                <!--product preview-->
                <a href="#" class="d_block relative pp_wrap">
                        <!--hot product-->
                        <span class="hot_stripe type_2"><img src="<?php echo base_url();?>images/hot_product_type_2.png" alt=""></span>
                        <img src="<?php echo base_url();?>uploads/product_images/product_img_5.jpg" class="tr_all_hover" alt="">
                        <span data-popup="#quick_view_product" class="button_type_5 box_s_none color_light r_corners tr_all_hover d_xs_none">Quick View</span>
                </a>
                <!--description and price of product-->
                <figcaption class="t_xs_align_l">
                        <h5 class="m_bottom_10"><a href="#" class="color_dark ellipsis">Eget elementum vel</a></h5>
                        <div class="clearfix">
                                <p class="scheme_color f_left f_size_large m_bottom_15">$102.00</p>
                                <!--rating-->
                                <ul class="horizontal_list f_right clearfix rating_list tr_all_hover">
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
                        </div>
                        <button class="button_type_4 bg_scheme_color r_corners tr_all_hover color_light mw_0">Add to Cart</button>
                </figcaption>
        </figure>
        <figure class="r_corners photoframe shadow relative d_inline_b d_md_block d_xs_inline_b tr_all_hover">
                <!--product preview-->
                <a href="#" class="d_block relative pp_wrap">
                        <img src="<?php echo base_url();?>uploads/product_images/product_img_7.jpg" class="tr_all_hover" alt="">
                        <span data-popup="#quick_view_product" class="button_type_5 box_s_none color_light r_corners tr_all_hover d_xs_none">Quick View</span>
                </a>
                <!--description and price of product-->
                <figcaption class="t_xs_align_l">
                        <h5 class="m_bottom_10"><a href="#" class="color_dark ellipsis">Cursus eleifend elit aenean elit aenean</a></h5>
                        <div class="clearfix">
                                <p class="scheme_color f_left f_size_large m_bottom_15">$99.00</p>
                                <!--rating-->
                                <ul class="horizontal_list f_right clearfix rating_list tr_all_hover">
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
                        </div>
                        <button class="button_type_4 bg_scheme_color r_corners tr_all_hover color_light mw_0">Add to Cart</button>
                </figcaption>
        </figure>
        <figure class="r_corners photoframe shadow relative d_inline_b d_md_block d_xs_inline_b tr_all_hover">
                <!--product preview-->
                <a href="#" class="d_block relative pp_wrap">
                        <!--sale product-->
                        <span class="hot_stripe type_2"><img src="<?php echo base_url();?>images/sale_product_type_2.png" alt=""></span>
                        <img src="<?php echo base_url();?>uploads/product_images/product_img_8.jpg" class="tr_all_hover" alt="">
                        <span data-popup="#quick_view_product" class="button_type_5 box_s_none color_light r_corners tr_all_hover d_xs_none">Quick View</span>
                </a>
                <!--description and price of product-->
                <figcaption class="t_xs_align_l">
                        <h5 class="m_bottom_10"><a href="#" class="color_dark ellipsis">Aliquam erat volutpat</a></h5>
                        <div class="clearfix">
                                <p class="scheme_color f_left f_size_large m_bottom_15"><s class="default_t_color m_right_5">$79.00</s>$36.00</p>
                                <!--rating-->
                                <ul class="horizontal_list f_right clearfix rating_list tr_all_hover">
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
                        </div>
                        <button class="button_type_4 bg_scheme_color r_corners tr_all_hover color_light mw_0">Add to Cart</button>
                </figcaption>
        </figure>
        <figure class="r_corners photoframe shadow relative d_inline_b d_md_block d_xs_inline_b tr_all_hover">
                <!--product preview-->
                <a href="#" class="d_block relative pp_wrap">
                        <!--hot product-->
                        <span class="hot_stripe type_2"><img src="<?php echo base_url();?>images/hot_product_type_2.png" alt=""></span>
                        <img src="<?php echo base_url();?>uploads/product_images/product_img_3.jpg" class="tr_all_hover" alt="">
                        <span data-popup="#quick_view_product" class="button_type_5 box_s_none color_light r_corners tr_all_hover d_xs_none">Quick View</span>
                </a>
                <!--description and price of product-->
                <figcaption class="t_xs_align_l">
                        <h5 class="m_bottom_10"><a href="#" class="color_dark ellipsis">Eget elementum vel</a></h5>
                        <div class="clearfix">
                                <p class="scheme_color f_left f_size_large m_bottom_15">$102.00</p>
                                <!--rating-->
                                <ul class="horizontal_list f_right clearfix rating_list tr_all_hover">
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
                        </div>
                        <button class="button_type_4 bg_scheme_color r_corners tr_all_hover color_light mw_0">Add to Cart</button>
                </figcaption>
        </figure>
        <figure class="r_corners photoframe shadow relative d_inline_b d_md_block d_xs_inline_b tr_all_hover">
                <!--product preview-->
                <a href="#" class="d_block relative pp_wrap">
                        <img src="<?php echo base_url();?>uploads/product_images/product_img_1.jpg" class="tr_all_hover" alt="">
                        <span data-popup="#quick_view_product" class="button_type_5 box_s_none color_light r_corners tr_all_hover d_xs_none">Quick View</span>
                </a>
                <!--description and price of product-->
                <figcaption class="t_xs_align_l">
                        <h5 class="m_bottom_10"><a href="#" class="color_dark ellipsis">Cursus eleifend elit aenean...</a></h5>
                        <div class="clearfix">
                                <p class="scheme_color f_left f_size_large m_bottom_15">$99.00</p>
                                <!--rating-->
                                <ul class="horizontal_list f_right clearfix rating_list tr_all_hover">
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
                        </div>
                        <button class="button_type_4 bg_scheme_color r_corners tr_all_hover color_light mw_0">Add to Cart</button>
                </figcaption>
        </figure>
        <figure class="r_corners photoframe shadow relative d_inline_b d_md_block d_xs_inline_b tr_all_hover">
                <!--product preview-->
                <a href="#" class="d_block relative pp_wrap">
                        <!--sale product-->
                        <span class="hot_stripe type_2"><img src="<?php echo base_url();?>images/sale_product_type_2.png" alt=""></span>
                        <img src="<?php echo base_url();?>uploads/product_images/product_img_9.jpg" class="tr_all_hover" alt="">
                        <span data-popup="#quick_view_product" class="button_type_5 box_s_none color_light r_corners tr_all_hover d_xs_none">Quick View</span>
                </a>
                <!--description and price of product-->
                <figcaption class="t_xs_align_l">
                        <h5 class="m_bottom_10"><a href="#" class="color_dark ellipsis">Aliquam erat volutpat</a></h5>
                        <div class="clearfix">
                                <p class="scheme_color f_left f_size_large m_bottom_15"><s class="default_t_color m_right_5">$79.00</s>$36.00</p>
                                <!--rating-->
                                <ul class="horizontal_list f_right clearfix rating_list tr_all_hover">
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
                        </div>
                        <button class="button_type_4 bg_scheme_color r_corners tr_all_hover color_light mw_0">Add to Cart</button>
                </figcaption>
        </figure>
</div>
<hr class="divider_type_3 m_bottom_15">
<a href="category_grid.html" role="button" class="d_inline_b bg_light_color_2 color_dark tr_all_hover button_type_4 r_corners"><i class="fa fa-reply m_left_5 m_right_10 f_size_large"></i>Back to: Woman</a>