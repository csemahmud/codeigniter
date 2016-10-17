<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html dir="ltr" lang="en" class="no-js" xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin | Invoice</title>



<style type="text/css">

html, body, div, span, applet, object, iframe,
h1, h2, h3, h4, h5, h6, p, blockquote, pre,
a, abbr, acronym, address, big, cite, code,
del, dfn, em, img, ins, kbd, q, s, samp,
small, strike, strong, sub, sup, tt, var,
b, u, i, center,
dl, dt, dd, ol, ul, li,
fieldset, form, label, legend,
table, caption, tbody, tfoot, thead, tr, th, td,
article, aside, canvas, details, embed, 
figure, figcaption, footer, header, hgroup, 
menu, nav, output, ruby, section, summary,
time, mark, audio, video {
	margin: 0;
	padding: 0;
	border: 0;
	font-size: 100%;
	font: inherit;
	vertical-align: baseline;
}

article, aside, details, figcaption, figure, 
footer, header, hgroup, menu, nav, section {
	display: block;
}
body {
	line-height: 1;
}
ol, ul {
	list-style: none;
}
blockquote, q {
	quotes: none;
}
blockquote:before, blockquote:after,
q:before, q:after {
	content: '';
	content: none;
}
table {
	border-collapse: collapse;
	border-spacing: 0;
}

/* misc */

a{
	text-decoration: none;
}

a:hover{
	text-decoration: underline;
}

/* global (not for layout, content only) */
 
.clear         { clear:both; }
 
.float-left    { float:left; }
.float-right   { float:right; }
 
.text-left     { text-align:left; }
.text-right    { text-align:right; }
.text-center   { text-align:center; }
.text-justify  { text-align:justify; }
 
.bold          { font-weight:bold; }
.italic        { font-style:italic; }
.underline     { border-bottom:1px solid; }
.highlight     { background:#ffc; }
 
.wrap          { width:960px;margin:0 auto; }
 
.img-left      { float:left;margin:4px 10px 4px 0; }
.img-right     { float:right;margin:4px 0 4px 10px; }
 
.nopadding     { padding:0; }
.noindent      { margin-left:0;padding-left:0; }
.nobullet      { list-style:none;list-style-image:none; }


img.alignright {float:right; margin:0 0 1em 1em}
img.alignleft {float:left; margin:0 1em 1em 0}
img.aligncenter {display: block; margin-left: auto; margin-right: auto}
a img.alignright {float:right; margin:0 0 1em 1em}
a img.alignleft {float:left; margin:0 1em 1em 0}
a img.aligncenter {display: block; margin-left: auto; margin-right: auto}


.clearfix:after {
    content: "."; 
    display: block; 
    height: 0; 
    clear: both; 
    visibility: hidden;
}

.clearfix {display: inline-block;}

/* Hides from IE-mac \*/
* html .clearfix {height: 1%;}
.clearfix {display: block;}
/* End hide from IE-mac */

.clip {
    -webkit-background-clip: padding-box;
    -moz-background-clip: padding;
    -o-background-clip: padding;
    background-clip: padding-box;
}

/* handy shortcuts */

.clear {
    /* for use on: after */
    content: " ";
    display: block;
    height: 0;
    clear: both;
    visibility: hidden;
}

/* global color variables */

/* global layout */

body {
    font-size: 14px;
    margin: 0px;
    text-align: center;
    background: #ddd;
    color: #333;
    font-family: Helvetica, Arial, sans-serif;
    padding: 40px 0;
    line-height: 1.5em;
}

a {
    color: #333;
    text-decoration: underline;
}

strong { font-weight: bold }

em { font-style: italic }

h1 {
    font-size: 28px;
    font-weight: bold;
    padding: 20px 0 0px;
}

h2, h3, h4, h5, h6, .title {
    font-size: 16px;
    font-weight: bold;
    padding-bottom: 4px;
    margin-bottom: 4px;
    border-bottom: 1px solid #dddddd;
}

#invoice {
    position: relative;
    padding: 18px;
    max-width: 850px;
    margin: auto;
    background: #f5f5f5;
    border: 10px solid #fff;
    -webkit-box-shadow: 0 0 1px #888888;
    -moz-box-shadow: 0 0 1px #888888;
    -o-box-shadow: 0 0 1px #888888;
    box-shadow: 0 0 1px #888888;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}

#invoice.unpaid:before, #invoice.paid:before {
    position: absolute;
    top: -20px;
    right: 0;
    left: 0;
    height: 10px;
    background: red;
    background: rgba(187, 0, 0, 0.8);
    content: "";
}

#invoice.paid:before {
    background: green;
    background: rgba(122, 185, 0, 0.7);
}

.this-is {
    padding: 8px 0;
    font-size: 16px;
    font-weight: bold;
    border-top: 1px solid #dddddd;
    border-bottom: 1px solid #dddddd;
}

#header { padding-bottom: 20px }

.invoice-intro p {
    font-size: 12px;
    font-style: italic;
    line-height: 1.5em;
    padding-bottom: 20px;
}

.invoice-meta {
    position: relative;
    overflow: hidden;
    text-align: right;
    line-height: 1.5em;
}

	.invoice-meta dt {
	    float: left;
	    width: 46%;
	    clear: both;
	    font-weight: bold;
	}

	.invoice-meta dd {
	    width: 46%;
	    float: right;
	    text-align: left;
	}

#parties {
    position: relative;
    overflow: hidden;
}

.invoice-to, .invoice-from, .invoice-status {
    text-align: left;
    padding-bottom: 30px;
}

.unpaid .invoice-status strong, .paid .invoice-status strong {
    font-weight: bold;
    color: #fff;
    display: block;
    padding: 8px;
    background: red;
    background: rgba(187, 0, 0, 0.8);
}

.paid .invoice-status strong {
    background: green;
    background: rgba(122, 185, 0, 0.7);
}

.unpaid .invoice-pay ul {
    padding: 12px;
    border-right: 10px solid  red;
    border-right: 10px solid rgba(187, 0, 0, 0.8);
}

.gcheckout{
	float: right;
	height: 32px;
	width: 117px;
	text-indent: -9999em;
	
}

.acheckout{
	float: right;
	height: 38px;
	width: 173px;
	text-indent: -9999em;
	
}

.invoice-items, .invoice-totals {
    text-align: left;
    padding-bottom: 30px;
}

	.invoice-items table, .invoice-totals table {
	    width: 100%;
	    font-size: 12px;
	}

	.invoice-items caption, .invoice-totals caption {
	    font-size: 16px;
	    font-weight: bold;
	    padding-bottom: 4px;
	    margin-bottom: 4px;
	    border-bottom: 1px solid #dddddd;
	    text-align: left;
	}

	.invoice-items thead th, .invoice-totals thead th {
	    font-weight: bold;
	    padding: 6px 0;
	    background: #e5e5e5;
	}

	.invoice-items thead tc, .invoice-totals thead tc { text-align: center }

	.invoice-items thead th:first-of-type, .invoice-totals thead th:first-of-type { padding-left: 8px }

	.invoice-items thead th:last-of-type, .invoice-totals thead th:last-of-type {
	    text-align: right;
	    padding-right: 8px;
	}

	.invoice-items tbody tr th, .invoice-totals tbody tr th { padding-left: 8px }

	.invoice-items tbody tr td:last-of-type, .invoice-totals tbody tr td:last-of-type {
	    text-align: right;
	    padding-right: 8px;
	}

	.invoice-items tbody tr:nth-of-type(even) th, .invoice-totals tbody tr:nth-of-type(even) th, .invoice-items tbody tr:nth-of-type(even) td, .invoice-totals tbody tr:nth-of-type(even) td { background: #eee }

	.invoice-items tbody th, .invoice-totals tbody th, .invoice-items tbody td, .invoice-totals tbody td {
	    padding-top: 6px;
	    padding-bottom: 6px;
	    background: #fff;
	}

	.invoice-items tbody td, .invoice-totals tbody td { text-align: center }

	.invoice-items tfoot td, .invoice-totals tfoot td {
	    text-align: right;
	    font-size: 11px;
	    font-weight: bold;
	    background: #e5e5e5;
	    padding: 6px 8px;
	}

.invoice-pay { padding-top: 30px }

	.invoice-pay li {
	    overflow: hidden;
	    padding-top: 12px;
	}

	.invoice-pay li:nth-of-type(even) { padding-top: 18px }

.paid .invoice-pay ul li { display: none }

.paid .invoice-pay ul:after {
    display: block;
    font-weight: bold;
    color: #fff;
    padding: 8px;
    background: green;
    background: rgba(122, 185, 0, 0.7);
    content: "Paid in Full";
    text-align: right;
}

.invoice-notes {
    text-align: left;
    padding-bottom: 30px;
}

	.invoice-notes p, .invoice-notes ul, .invoice-notes ol, .invoice-notes dl { padding-bottom: 1em }

		.invoice-notes ul li { list-style: inside disc }

		.invoice-notes ol li { list-style: inside decimal }

#footer {
    border-top: 1px solid #dddddd;
    font-size: 11px;
    font-weight: bold;
}

/* some margin for middling sceens */

@media only screen and (min-width: 420px) and (max-width: 869px) { 
	#invoice { margin: 0 20px }
}

/* layout splits at 600 css pixels */

@media only screen and (min-width: 700px) { 
	h1 { padding: 10px 0 }

	#header {
	    overflow: hidden;
	    padding-top: 40px;
	}

	.invoice-intro {
	    float: left;
	    width: 50%;
	    text-align: left;
	}

		.invoice-intro p { text-align: left }

	.invoice-meta {
	    float: right;
	    width: 40%;
	}

		.invoice-meta dd { text-align: right }

	.invoice-to, .invoice-from, .invoice-status {
	    float: left;
	    width: 30%;
	    margin-right: 5%;
	}

	.invoice-status { margin-right: 0 }

	#footer {
	    padding-top: 18px;
	    font-size: 12px;
	}
}


</style>
<script src="<?php echo base_url();?>mec_scripts/utiliy_scripts/country.js"></script>
</head>

<body>
<!--
<!doctype html>
<html dir="ltr" lang="en" class="no-js">
<head>
<!-- begin markup -->


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


</body>
</html>
<!--
</body>
</html>
-->