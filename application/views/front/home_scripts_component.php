<script type="text/javascript">
    var category = {
        category_id : <?php
            if(isset($category_id)){
                echo $category_id;
            } else {
                echo "'all'";
            }
        ?>,
        category_name : '<?php
            if(isset($category_name)){
                echo $category_name;
            } else {
                echo "ALL";
            }
        ?>'
    };
    
    var manufacturer = {
        manufacturer_id : <?php
            if(isset($manufacturer_id)){
                echo $manufacturer_id;
            } else {
                echo "'all'";
            }
        ?>,
        manufacturer_name : '<?php
            if(isset($manufacturer_name)){
                echo $manufacturer_name;
            } else {
                echo "ALL";
            }
        ?>'
    };
    
    function show_category_manufacturer(){
        document.getElementById("header_category_manufacturer").innerHTML 
                = "Category : " + category.category_name + " | Manufacturer : " + manufacturer.manufacturer_name;
    };
    
    function load_products(){
        $("#ajax_product_home").load(
                '<?php echo base_url(); ?>front_controller/ajax_product_home/'
                +category.category_id+'/'+manufacturer.manufacturer_id,
                function(responseTxt1,statusTxt1,xhr1){
                    if(statusTxt1=="error")
                        alert("Error : " + xhr1.status + " : " + xhr1.statusText);
            });
    };
    
    function select_category(category_id, category_name) {
        category.category_id = category_id;
        category.category_name = category_name;
        show_category_manufacturer();
        load_products();
    };
    
    function select_manufacturer(manufacturer_id, manufacturer_name) {
        manufacturer.manufacturer_id = manufacturer_id;
        manufacturer.manufacturer_name = manufacturer_name;
        show_category_manufacturer();
        load_products();
    };
    
    $(document).ready(function(){
        show_category_manufacturer();
        load_products();
    });
</script>