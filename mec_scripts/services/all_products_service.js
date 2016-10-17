/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


mahmud_ecommerce_app.factory('all_products_service', ['$http', function ($http) {

    var all_products_service = {};
    all_products_service.get_all_products = function () {
        return $http.get('http://localhost:81/mahmud_ecommerce/product_controller/all_products_json.aspx');
    };
    return all_products_service;

}]);