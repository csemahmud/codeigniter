<h2 class="tt_uppercase color_dark m_bottom_30">Select Payment Method :</h2>
<form action="<?php echo base_url(); ?>front_order_controller/confirm_order" method="post">
    <div class="bs_inner_offsets bg_light_color_3 shadow r_corners m_bottom_45">
        <?php foreach ($all_payments as $v_payment) { ?>
            <figure class="block_select clearfix relative m_bottom_15">
                <input type="radio" <?php
                    if($v_payment->payment_id == 1){
                        echo "checked";
                    }
                ?> name="payment_id" class="d_none" value="<?php echo $v_payment->payment_id; ?>">
                    <img src="<?php
                        echo base_url().$v_payment->payment_logo_path.$v_payment->payment_logo;
                    ?>" alt="" class="payment_logo f_left m_right_20 f_mxs_none m_mxs_bottom_10">
                    <figcaption class="d_table d_sm_block">
                            <div class="d_table_cell d_sm_block p_sm_right_0 p_right_45 m_mxs_bottom_5">
                                    <h5 class="color_dark fw_medium m_bottom_15 m_sm_bottom_5"><?php echo $v_payment->payment_name; ?></h5>
                                    <p><?php echo $v_payment->payment_description; ?></p>
                            </div>
                            <div class="d_table_cell d_sm_block discount">
                                    <h5 class="color_dark fw_medium m_bottom_15 m_sm_bottom_0">Discount/Fee</h5>
                                    <p class="color_dark">$8.48</p>
                            </div>
                    </figcaption>
            </figure>
            <hr class="m_bottom_20">
        <?php } ?>
            <ul>
                <li class="m_bottom_15">
                    <!--<input type="checkbox" required="required" class="d_none" id="terms_conditions" name="terms_conditions" />
                    <label for="checkbox_4"><span>I Accept All the </span><a href=""> Terms and Conditions</a></label>
                    <br/>-->
                    <button type="submit" class="button_type_4 r_corners bg_scheme_color color_light tr_all_hover">Confirm Order</button>
                </li>
            </ul>
    </div>
</form>
<script type="text/javascript">
    function invalid_payment()
    {
        alert("We are sorry, this payment option is INACTIVE !!!");
        return false;
    }
</script>