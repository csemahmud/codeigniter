<!--tabs-->
<h2 class="color_dark tt_uppercase m_bottom_25">Shipment Information</h2>
<div class="bs_inner_offsets bg_light_color_3 shadow r_corners m_bottom_45">
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <h5 class="fw_medium m_bottom_15">Ship To</h5>
            <h5 class="fw_medium m_bottom_15">
                <a href="<?php echo base_url(); ?>shipping_controller/shipping_same_as_billing">
                    Click for &Lt;Shipping Same As Billing&Gt;
                </a>
            </h5>
            <form name="shipping_information_form" action="<?php echo base_url(); ?>shipping_controller/save_shipping_info" 
                  onsubmit="return validateStandard(this)" method="post">
                <ul>
                    <li class="m_bottom_15">
                            <label for="s_first_name" class="d_inline_b m_bottom_5 required">First Name :</label>
                            <input type="text" id="s_first_name" name="s_first_name" regexp="JSVAL_RX_ALPHA"
                                   err="Please   Enter   Valid   First   Name   ....." maxlength="50" 
                                   required="required" placeholder="Enter First Name ....." class="r_corners full_width">
                    </li>
                    <li class="m_bottom_15">
                            <label for="s_last_name" class="d_inline_b m_bottom_5 required">Last Name :</label>
                            <input type="text" id="s_last_name" name="s_last_name" regexp="JSVAL_RX_ALPHA"
                                   err="Please   Enter   Valid   Last   Name   ....."  maxlength="25" 
                                   required="required" placeholder="Enter Last Name ....." class="r_corners full_width">
                    </li>
                    <li class="m_bottom_15">
                            <label for="s_email" class="d_inline_b m_bottom_5 required">Email :</label>
                            <input type="text" id="s_email" name="s_email" regexp="JSVAL_RX_EMAIL"
                                   err="Please   Enter   Valid   Email   Address   ....." maxlength="100"
                                   required="required" placeholder="email.address@eaxample.com" 
                                   class="r_corners full_width">
                    </li>
                    <li class="m_bottom_15">
                            <label for="s_mobile" class="d_inline_b m_bottom_5 required">Mobile No :</label>
                            <input type="text" id="s_mobile" name="s_mobile" maxlength="14" 
                                   required="required" placeholder="Enter Mobile No ....." class="r_corners full_width">
                    </li>
                    <li class="m_bottom_15">
                            <label for="s_phone" class="d_inline_b m_bottom_5">Phone No :</label>
                            <input type="text" id="s_phone" name="s_phone" maxlength="7" placeholder="Enter Phone No ....." class="r_corners full_width">
                    </li>
                    <li>
                            <label for="s_fax" class="d_inline_b m_bottom_5">Fax :</label>
                            <input type="text" id="s_fax" name="s_fax" maxlength="7" placeholder="Enter Fax ....." class="r_corners full_width">
                    </li>
                    <li class="m_bottom_15">
                            <label for="s_company" class="d_inline_b m_bottom_5">Company Name :</label>
                            <input type="text" id="s_company" name="s_company" maxlength="100" placeholder="Enter Company Name ....." class="r_corners full_width">
                    </li>
                    <li class="m_bottom_15">
                            <label for="s_address" class="d_inline_b m_bottom_5 required">Address :</label>
                            <textarea id="s_address" name="s_address" rows="6" cols="44" 
                                      placeholder="Enter Full Mailing Address..." required="required" spellcheck="true" class="r_corners full_width"></textarea>
                    </li>
                    <li class="m_bottom_15">
                            <label for="s_city" class="d_inline_b m_bottom_5 required">City :</label>
                            <input type="text" id="s_city" name="s_city" maxlength="50" 
                                   required="required" placeholder="Enter City Name ....." class="r_corners full_width">
                    </li>
                    <li class="m_bottom_15">
                            <label class="d_inline_b m_bottom_5 required">Country :</label>
                            <!--product name select-->
                            <div>
                                <select id="s_country" name="s_country" exclude=" " err="Please select a valid Country" 
                                        required="required">
                                        <option value=" ">Select Country...</option>
                                        <script type="text/javascript">
                                            
                                            printCountryOptions();
                                            
                                        </script>
                                        
                                    </select>
                            </div>
                    </li>
                    <li class="m_bottom_15">
                            <label for="s_zip_code" class="d_inline_b m_bottom_5 required">Zip / Postal Code</label>
                            <input type="text" id="s_zip_code" name="s_zip_code" regexp="JSVAL_RX_NUMERIC"
                                   err="ZIP Code Must be Numeric values Only ....." maxlength="5" 
                                   required="required" placeholder="Enter ZIP Code ....." class="r_corners full_width">
                    </li>
                    <li class="m_bottom_15">
                        <button type="submit" class="button_type_4 r_corners bg_scheme_color color_light tr_all_hover">Next</button>
                    </li>
                </ul>
            </form>
            <script type="text/javascript">
                document.forms["shipping_information_form"].elements["s_country"].value = "BD";
            </script>
        </div>
    </div>
</div>