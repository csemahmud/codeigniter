/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


mahmud_ecommerce_app.factory('products_service', ['$http', function ($http) {

    var products_service = {};
    products_service.get_products = function () {
        return $http.get('front_controller/products_json');
    };
    return products_service;

}]);