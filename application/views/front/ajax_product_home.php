<?php
if(count($selected_products) > 0) {
?>
<div class="panel panel-default">
    <div id="topheader" class="panel-heading">
        <div class="col-lg-6">
            <h3 id="header_ajs" class="fa fa-2x">Ajax Products Home</h3>
        </div>
        <div class="col-lg-6">
            <h4 id="header_count">
                <i class="icon-th"></i>Total Products : 
                <span class="label label-primary"><?php echo count($selected_products); ?></span>
            </h4>
        </div>
    </div>
    <div id="product_container" class="panel-body">
        <?php foreach ($selected_products as $v_product) { ?>
            <!--product item-->
            <div class="product_div">
                <figure class="figure_style">
                    <a class="fill_style" href="<?php echo base_url(); ?>front_controller/details_product/<?php echo $v_product->product_id; ?>">
                        <img class="img_style" src="<?php echo base_url().$v_product->upload_path.$v_product->product_image; ?>" />
                    </a>
                    <figcaption class="caption_style"><strong><?php echo $v_product->product_name; ?></strong></figcaption>
                    <span class="caption_style">price : <strong id="price_strong"><?php echo $v_product->product_price; ?> BDT</strong></span>
                </figure>
                <div class="fill_style">
                    <div class="btn-group">
                        <a href="<?php echo base_url(); ?>front_controller/details_product/<?php echo $v_product->product_id; ?>" class="btn btn-primary btn-default">Deatails</a>
                        <!--<span class="left_float">&nbsp;|&nbsp;</span> 
                        <a ng-href="" class="btn btn-primary btn-default">Add to Cart</a>-->
                    </div>
                </div>
                <hr class="fill_style"/>
            </div>
        <?php } ?>
    </div>
</div>
<?php } else {
    ?><h1 class="error_message">No Product to show .....</h1><?php
} ?>