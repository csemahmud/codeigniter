<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of Front_Controller
 *
 * @author Mahmudul Hasan Khan CSE
 */

class Front_Controller extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index() {
            $data = array();
            $data["title"] = "Angular Js";
            $this->load->view('front/angular_js_ui', $data);
	}
        
	public function home() {
            $mdata = array();
            $mdata["all_published_categories"] = $this->front_model->select_categories_by_publication_status(1);
            $mdata["all_published_manufacturers"] = $this->front_model->select_manufacturers_by_publication_status(1);
            $data = array();
            $data["submenu"] = $this->load->view("front/home_submenu_component",$mdata,TRUE);
            $data["main_content"] = $this->load->view("front/home_products_component",'',TRUE);
            $data["home_scripts"] = $this->load->view("front/home_scripts_component",'',TRUE);
            $data["home_slider"] = TRUE;
            $data["title"] = "Ajax";
            $this->load->view('shared/front_master_ui', $data);
        }
        
	public function home_by_category($category_id, $category_name) {
            $mdata = array();
            $mdata["all_published_categories"] = $this->front_model->select_categories_by_publication_status(1);
            $mdata["all_published_manufacturers"] = $this->front_model->select_manufacturers_by_publication_status(1);
            $jsdata = array();
            $jsdata["category_id"] = $category_id;
            $jsdata["category_name"] = $category_name;
            $data = array();
            $data["submenu"] = $this->load->view("front/home_submenu_component",$mdata,TRUE);
            $data["main_content"] = $this->load->view("front/home_products_component",'',TRUE);
            $data["home_scripts"] = $this->load->view("front/home_scripts_component",$jsdata,TRUE);
            $data["title"] = "Category";
            $this->load->view('shared/front_master_ui', $data);
        }
        
	public function home_by_manufacturer($manufacturer_id, $manufacturer_name) {
            $mdata = array();
            $mdata["all_published_categories"] = $this->front_model->select_categories_by_publication_status(1);
            $mdata["all_published_manufacturers"] = $this->front_model->select_manufacturers_by_publication_status(1);
            $jsdata = array();
            $jsdata["manufacturer_id"] = $manufacturer_id;
            $jsdata["manufacturer_name"] = $manufacturer_name;
            $data = array();
            $data["submenu"] = $this->load->view("front/home_submenu_component",$mdata,TRUE);
            $data["main_content"] = $this->load->view("front/home_products_component",'',TRUE);
            $data["home_scripts"] = $this->load->view("front/home_scripts_component",$jsdata,TRUE);
            $data["title"] = "Manufacturer";
            $this->load->view('shared/front_master_ui', $data);
        }
        
	public function details_product($product_id) {
            $mdata = array();
            $mdata["all_published_categories"] = $this->front_model->select_categories_by_publication_status(1);
            $mdata["all_published_manufacturers"] = $this->front_model->select_manufacturers_by_publication_status(1);
            $cdata = array();
            $cdata["product_info"] = $this->front_model->select_product_by_id_joining_manufacturer($product_id);
            $data = array();
            $data["submenu"] = $this->load->view("front/other_submenu_component",$mdata,TRUE);
            $data["main_content"] = $this->load->view("front/details_product_component",$cdata,TRUE);
            $data["title"] = "Details Product";
            $this->load->view('shared/front_master_ui', $data);
        }
        
        public function products_json() {
            $data = array();
            $all_published_products = $this->front_model->select_all_published_products_joining_category_joining_manufacturer();
            $products_json_str = '{"products":[';
            $count1 = 0;
            foreach ($all_published_products as $v_product) {
                $count1++;
                $products_json_str .= "{";
                $array1 = array();
                $i = 0;
                foreach ($v_product as $key => $value) {
                    $array1[$i] = '"'.$key.'":';
                    if(is_int($value) ||  is_double($value) || is_numeric($value)) {
                        $array1[$i] .= $value; 
                    } else {
                        $array1[$i] .= '"'.$value.'"';
                    }
                    $i++;
                }
                $products_json_str .= implode(",", $array1);
                $products_json_str .= "}";
                if($count1 < count($all_published_products)) {
                    $products_json_str .= ",";
                }
            }
            $products_json_str .= "]}";
            $data['all_published_products'] = $all_published_products;
            $data['products_json_str'] = $products_json_str;
            $this->load->view('shared/products_json',$data);
        }
    
        public function ajax_product_home($category_id, $manufacturer_id) {
            $cdata = array();
            if($category_id == 'all' && $manufacturer_id == 'all'){
                $cdata["selected_products"] = $this->front_model->select_products_by_publication(1);
            } else if($category_id == 'all') {
                $cdata["selected_products"] = $this->front_model->select_products_by_manufacturer_publication($manufacturer_id, 1);
            } else if($manufacturer_id == 'all') {
                $cdata["selected_products"] = $this->front_model->select_products_by_category_publication($category_id, 1);
            } else {
                $cdata["selected_products"] = $this->front_model->select_products_by_category_manufacturer_publication($category_id, $manufacturer_id, 1);
            }
            $this->load->view('front/ajax_product_home', $cdata);
        }
        
        public function order_complete() {
            $mdata = array();
            $mdata["all_published_categories"] = $this->front_model->select_categories_by_publication_status(1);
            $mdata["all_published_manufacturers"] = $this->front_model->select_manufacturers_by_publication_status(1);
            $data = array();
            $data["submenu"] = $this->load->view("front/other_submenu_component",$mdata,TRUE);
            $data["main_content"] = $this->load->view("front/order_complete_component",'',TRUE);
            $data["title"] = "Order Confirmed";
            $this->load->view('shared/front_master_ui', $data);
        }
        
	public function best_seller() {
            $mdata = array();
            $mdata["all_published_categories"] = $this->front_model->select_categories_by_publication_status(1);
            $mdata["all_published_manufacturers"] = $this->front_model->select_manufacturers_by_publication_status(1);
            $data = array();
            $data["submenu"] = $this->load->view("front/other_submenu_component",$mdata,TRUE);
            $cdata = array();
            $cdata["selected_products"] = $this->front_model->select_best_seller_products();
            $data["main_content"] = $this->load->view("front/best_seller_component",$cdata,TRUE);
            $data["title"] = "Best Seller";
            $this->load->view('shared/front_master_ui', $data);
        }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */