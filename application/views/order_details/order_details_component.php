<div id="invoice" class="new">


	<div class="this-is">
		<strong>Invoice</strong>
	</div><!-- invoice headline -->


	<header id="header">
		<div class="invoice-intro">
			<h1>M@hmud's E-Commerce</h1>
			<p>Feeling beautiful everyday every way</p>
		</div>

		<!--<dl class="invoice-meta">
			<dt class="invoice-number">Invoice #</dt>
			<dd><?php //echo $order_info->invoice_no?></dd>
			<dt class="invoice-date">Date of Invoice</dt>
			<dd><?php //echo $order_info->order_date_time?></dd>
			<dt class="invoice-due">Due Date</dt>
			<dd><?php //echo $order_info->due_date?></dd>
		</dl>-->
	</header>
	<!-- e: invoice header -->


	<section id="parties">

		<div class="invoice-to">
			<h2>Billing Address:</h2>
			<div id="hcard-Hiram-Roth" class="vcard">
				<span><?php echo $billing_info->first_name.' '.$billing_info->last_name?></span>
				<div class="org"><?php echo $billing_info->address;?><span class="street-address">-<?php echo $billing_info->zip_code;?></span></div>
                                <div class="org">
                                    <script type="text/javascript">
                                        var key='<?php echo $billing_info->country;?>';
                                        //alert();
                                        document.write(getCountryFullName(key));
                                    </script>
                                </div>
			  <a class="email" href="mailto:<?php echo $billing_info->customer_email;?>"><?php echo $billing_info->customer_email;?></a>
				
				<div class="adr">
				  <div class="street-address"></div>
			  </div>

				<div class="tel"><?php echo $billing_info->mobile;?></div>
			</div><!-- e: vcard -->
		</div><!-- e invoice-to -->


		<div class="invoice-from">
			<h2>Delivery Address:</h2>
			<div id="hcard-Admiral-Valdore" class="vcard">
				<span><?php echo $shipping_info->s_first_name.' '.$shipping_info->s_last_name ?></span>
				<div class="org"><?php echo $shipping_info->s_address;?><span class="street-address">-<?php echo $billing_info->zip_code;?></span></div>
                                <div class="org">
                                    <script type="text/javascript">
                                        var key='<?php echo $shipping_info->s_country;?>';
                                        document.write(getCountryFullName(key));
                                    </script>
                                </div>
			  <a class="email" href="mailto:<?php echo $shipping_info->s_email;?>"><?php echo $shipping_info->s_email;?></a>
				
				<div class="adr">
				  <div class="street-address"></div>
			  </div>

				<div class="tel"><?php echo $shipping_info->s_mobile;?></div>
			</div><!-- e: vcard -->
		</div><!-- e invoice-from -->


		<div class="invoice-status">
			<h3>Invoice Status</h3>
			<strong>
                            <?php echo $order_info->order_status; ?>
                        </strong>
		</div><!-- e: invoice-status -->

	</section><!-- e: invoice partis -->


	<section class="invoice-financials">

		<div class="invoice-items">
			<table>
				<caption>Your Invoice</caption>
				<thead>
					<tr>
						<th>Product Name</th>
						<th>Quantity</th>
						<th>Unite Price</th>
                                                <th>Sub Total</th>
					</tr>
				</thead>
				<tbody>
					<?php
                                            foreach($order_details as $v_order_details)
                                            {
                                        ?>
                                        <tr>
						<th><?php echo $v_order_details->product_name;?></th>
						<td><?php echo $v_order_details->subtotal_quantity;?></td>
						<td>BDT <?php echo $v_order_details->order_price;?></td>
                                                <td>BDT <?php echo $v_order_details->subtotal_quantity * $v_order_details->order_price;?></td>
					</tr>
                                            <?php } ?>
					
				</tbody>
				
			</table>
		</div><!-- e: invoice items -->


	  <div class="invoice-totals">
		<table>
				<caption>Totals:</caption>
				<tbody>
					<tr>
						<th>Total:</th>
						<td></td>
						<td>BDT <?php echo $order_info->order_total?></td>
					</tr>
					<tr>
						<th>Tax:</th>
						<td>5%</td>
						<td>BDT 
                                                    <?php 
                                                    $tax_total=(5/100)*$order_info->order_total;
                                                    echo $tax_total;
                                                    ?>
                                                </td>
					</tr>
					<tr>
						<th>Grand Total:</th>
						<td></td>
                                                <td>BDT 
                                                    <?php 
                                                        echo $order_info->order_total+$tax_total;
                                                    ?>
                                                </td>
					</tr>
				</tbody>
		  </table>
		</div><!-- e: invoice totals -->


		<div class="invoice-notes">
			Please be Noted after delivery product within three days you can return product or refund. product return is only applicable for electronic product.
		</div><!-- e: invoice-notes -->

	</section><!-- e: invoice financials -->


	<footer id="footer">
		<p>
		Contact: www.abc.com Phone: 008803455656 Email: info@abc.com 
		</p>
                <p><span><strong>
                            <a href="<?php echo base_url(); ?>order_controller/" title="Back to Manage Orders">
                                Back
                            </a>
                        </strong></span></p>
	</footer>


</div><!-- e: invoice -->
