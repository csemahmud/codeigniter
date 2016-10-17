<?php if(isset($all_published_categories)) { ?>
<li class="relative f_xs_none m_xs_bottom_5"><a href="<?php echo base_url();?>front_controller/home.aspx" class="tr_delay_hover color_light tt_uppercase"><b>Categories</b></a>
        <!--sub menu-->
        <div class="sub_menu_wrap top_arrow d_xs_none type_2 tr_all_hover clearfix r_corners">
                <ul class="sub_menu">
                    <li>
                        <a class="color_dark tr_delay_hover" href="<?php echo base_url();?>front_controller/home.aspx"><<--ALL Categories-->></a>
                    </li>
                    <?php foreach ($all_published_categories as $v_category) { ?>
                        <li>
                            <a class="color_dark tr_delay_hover" href="<?php 
                                echo base_url()."front_controller/home_by_category/".$v_category->category_id."/".$v_category->category_name;
                            ?>"><?php echo $v_category->category_name; ?></a>
                        </li>
                    <?php } ?>
                </ul>
        </div>
</li>
<?php } ?>
<?php if(isset($all_published_manufacturers)) { ?>
<li class="relative f_xs_none m_xs_bottom_5"><a href="<?php echo base_url();?>front_controller/home.aspx" class="tr_delay_hover color_light tt_uppercase"><b>Manufacturers</b></a>
        <!--sub menu-->
        <div class="sub_menu_wrap top_arrow d_xs_none type_2 tr_all_hover clearfix r_corners">
                <ul class="sub_menu">
                    <li>
                        <a class="color_dark tr_delay_hover" href="<?php echo base_url();?>front_controller/home.aspx"><<--ALL Manufacturers-->></a>
                    </li>
                    <?php foreach ($all_published_manufacturers as $v_manufacturer) { ?>
                        <li>
                            <a class="color_dark tr_delay_hover" href=<?php 
                                echo base_url()."front_controller/home_by_manufacturer/".$v_manufacturer->manufacturer_id."/".$v_manufacturer->manufacturer_name;
                            ?>><?php echo $v_manufacturer->manufacturer_name; ?></a>
                        </li>
                    <?php } ?>
                </ul>
        </div>
</li>
<?php } ?>