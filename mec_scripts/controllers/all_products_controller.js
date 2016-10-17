/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


mahmud_ecommerce_app.controller('all_products_controller',
    function ($scope, all_products_service, ALL_STR) {

        get_all_products(ALL_STR);
        function get_all_products(ALL_STR) {
            all_products_service.get_all_products()
                .success(function (responce) {
                    $scope.products = responce.products;
                    console.log($scope.products);
                    
                    $scope.message = "Total Products : ";
                    $scope.category = ALL_STR;
                    $scope.manufacturer = ALL_STR;
                    
                    $scope.all_str = ALL_STR;

                    $scope.limit_range = [];
                    var max_page_size = 16;
                    if ($scope.products.length < 16) {
                        max_page_size = $scope.products.length;
                    }
                    for (var i = 1; i <= max_page_size; i++) {
                        $scope.limit_range.push(i);
                    }

                    $scope.page_size = 8;
                    if ($scope.products.length < 8) {
                        $scope.page_size = $scope.products.length;
                    }

                    $scope.selected_page = 1;
                    $scope.reset_page = function () {
                        $scope.selected_page = 1;
                    };
                    
                    $scope.reset_by_category = function(){
                        $scope.page_size = 8;
                        $scope.selected_page = 1;

                        $scope.limit_range = [];
                        max_page_size = 16;

                        if ($scope.category != $scope.all_str) {
                            var count = 0;

                            for (var i = 0; i < $scope.products.length; i++) {
                                if ($scope.products[i].category_name == $scope.category) {
                                    count++;
                                }
                            }

                            if (count < 16) {
                                max_page_size = count;
                            }

                            for (var i = 1; i <= count; i++) {
                                $scope.limit_range.push(i);
                            }

                            if (count < 8) {
                                $scope.page_size = count;
                            }
                        } else {
                            if ($scope.products.length < 16) {
                                max_page_size = $scope.products.length;
                            }

                            for (var i = 1; i <= max_page_size; i++) {
                                $scope.limit_range.push(i);
                            }

                            if ($scope.products.length < 8) {
                                $scope.page_size = $scope.products.length;
                            }
                        }
                    };
                    
                    $scope.reset_by_manufacturer = function(){
                        $scope.page_size = 8;
                        $scope.selected_page = 1;

                        $scope.limit_range = [];
                        max_page_size = 16;

                        if ($scope.manufacturer != $scope.all_str) {
                            var count = 0;

                            for (var i = 0; i < $scope.products.length; i++) {
                                if ($scope.products[i].manufacturer_name == $scope.manufacturer) {
                                    count++;
                                }
                            }

                            if (count < 16) {
                                max_page_size = count;
                            }

                            for (var i = 1; i <= count; i++) {
                                $scope.limit_range.push(i);
                            }

                            if (count < 8) {
                                $scope.page_size = count;
                            }
                        } else {
                            if ($scope.products.length < 16) {
                                max_page_size = $scope.products.length;
                            }

                            for (var i = 1; i <= max_page_size; i++) {
                                $scope.limit_range.push(i);
                            }

                            if ($scope.products.length < 8) {
                                $scope.page_size = $scope.products.length;
                            }
                        }
                    };
                    
                    $scope.is_product_selected = function(product){
                        return ($scope.category == ALL_STR || $scope.category == product.category_name)&&($scope.manufacturer == ALL_STR || $scope.manufacturer == product.manufacturer_name);
                    };

                    $scope.select_page = function (page_no) {
                        $scope.selected_page = page_no;
                    }

                    $scope.get_btn_class = function (page_no) {
                        return $scope.selected_page == page_no ? "active" : "";
                    }
                })
                .error(function (error) {
                    $scope.status = 'Unable to load Product data: ' + error.message;
                    console.log($scope.status);
                    alert($scope.status);
                });
        }

    });