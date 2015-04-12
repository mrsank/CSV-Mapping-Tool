<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * CSV Mapping tool
 * 
 *
 * PHP version 5
 *
 * LICENSE: This source file is subject to version 3.01 of the PHP license
 * that is available through the world-wide-web at the following URI:
 * http://www.php.net/license/3_01.txt.  If you did not receive a copy of
 * the PHP License and are unable to obtain it through the web, please
 * send a note to license@php.net so we can mail you a copy immediately.
 *
 * @author     		Harisankar.M.R <mrsank@gmail.com>
 * @license    		http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version    		1.0.0
 * @file       		main.php
 * @location   		/application/controllers/main.php
 * @description		Controller file for the application
 * @date      		07/11/2013
 */

class Main extends CI_Controller {

	public function index()
	{
		$this->dashboard();			// Redirects the index function into dashboard
	}
	
	
	/** Dashboard function for the application **/
	public function dashboard(){
		$data['url'] = base_url();
		$this->load->view('main/dashboard',$data);
	}
	
	/** Order details function for showing the available data from database in table format **/
	public function order_details(){
		$data['url'] = base_url();
		$config['base_url']="http://localhost/excersise/main/order_details";
		$config['total_rows'] = $this->Main_model->total();
		$config['per_page'] = 10;
		$config["uri_segment"] = 3;
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = round($choice);
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data['sort_id'] = "sort_id_desc";
		$data['sort_fname'] = "sort_fname_desc";
		$data['sort_lname'] = "sort_lname_desc";
		$data['sort_country'] = "sort_country_desc";
		$data['total'] = "sort_total_desc";
		$records = $this->Main_model->fetch_all($page,$config['per_page']);		// Pagination happens here
		$data['records'] = $records->result();
		$this->load->view('main/order_details',$data);
	}
	
	/** Upload function for uploading csv and mapping the CSV values **/	
	public function upload_csv(){
		$data['page_status'] = 1;
		$data['error'] = "CSV File";
		if(isset($_POST['btnUpload'])){			// Upload area after clicking the upload button
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'csv';
			$config['max_size']	= '1024';
			$this->load->library('upload', $config);
			if ( $this->upload->do_upload()){
				$data = array('upload_data' => $this->upload->data());
				$data['file'] = $data['upload_data']['full_path'];
				$entire_data = file_get_contents($data['file']);			
				$exp_entire_data = explode("\n",$entire_data);
				$file_column_name = explode(";",$exp_entire_data[0]);
				$data['csv_columns'] = $file_column_name;
				$data['page_status'] = 2;
			}else{
				$data['error'] = "Only CSV files allowed";
			}
		}
		if(isset($_POST['btnUpdate'])){			// Mapping area after maping the values with CSV file values and inserting data to the database
			$entire_data = file_get_contents($_POST['hdnFile']);
			$exp_entire_data = explode("\n",$entire_data);
			$file_column_name = explode(";",$exp_entire_data[0]);
			$count = count($exp_entire_data);
			for($i=1; $i< $count - 1; $i++){
				$exp_entire_value = explode(";",$exp_entire_data[$i]);
				$entire_csv_values[] = array_combine($file_column_name,$exp_entire_value);
			}

			$count = count($entire_csv_values);
			for($c=0;$c<$count;$c++){
				foreach($entire_csv_values[$c] as $key=>$value){
					foreach($_POST as $kval=>$dat){
						if($key==$dat){
							$result[$kval] = $value;
						}
					}
				}
				$orderArr = array('ship_first_name','ship_last_name','ship_city','ship_street1','ship_street2','ship_zip','ship_state','ship_country','inv_city','inv_street1','inv_street2','inv_zip','grand_total','ship_company','cust_ord_id');
				foreach($orderArr as $val){
					if(array_key_exists($val,$result)){
						$order[$val]= $result[$val];		
					}
				}
				$order_id = $this->Main_model->insert_order($order);		// Matching and inserting the field for the order table
				$result['order_id'] = $order_id;
				
				$custArr = array('first_name','last_name','email','phone','order_id');
				foreach($custArr as $val){
					if(array_key_exists($val,$result)){
						$customer[$val]= $result[$val];
					}
				}
				$this->Main_model->insert_customer($customer);		// Matching and inserting the field for the customer table
				
				$itemArr = array('quantity','price','order_id');
				foreach($itemArr as $val){
					if(array_key_exists($val,$result)){
						$item[$val]= $result[$val];
					}
				}
				$this->Main_model->insert_item($item);	// Matching and inserting the field for the order items table 
				
				$productArr = array('sku','name','order_id');
				foreach($productArr as $val){
					if(array_key_exists($val,$result)){
						$product[$val]= $result[$val];
					}
				}
				$this->Main_model->insert_product($product);	// Matching and inserting the field for the product table
			}
			redirect('/main/order_details', 'refresh');
		}
		$data['url'] = base_url();
		$this->load->view('main/upload_csv',$data);
	}
	
	
	/** Sorting  function based on ID asecending along with pagination **/
	public function sort_id_asc(){
		$data['url'] = base_url();
		$config['base_url']="http://localhost/excersise/main/order_details";
		$config['total_rows'] = $this->Main_model->total();
		$config['per_page'] = 10;
		$config["uri_segment"] = 3;
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = round($choice);
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$records = $this->Main_model->id_asc($page,$config['per_page']);		// Pagination happens here
		$data['records'] = $records->result();
		$data['sort_id'] = "sort_id_desc";
		$data['sort_fname'] = "sort_fname_desc";
		$data['sort_lname'] = "sort_lname_desc";
		$data['sort_country'] = "sort_country_desc";
		$data['total'] = "sort_total_desc";
		$this->load->view('main/order_details',$data);
	}
	
	
	/** Sorting function based on ID descenting along with pagination **/
	public function sort_id_desc(){
		$data['url'] = base_url();
		$config['base_url']="http://localhost/excersise/main/order_details";
		$config['total_rows'] = $this->Main_model->total();
		$config['per_page'] = 10;
		$config["uri_segment"] = 3;
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = round($choice);
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$records = $this->Main_model->id_desc($page,$config['per_page']);		// Pagination happens here
		$data['records'] = $records->result();
		$data['sort_id'] = "sort_id_asc";
		$data['sort_fname'] = "sort_fname_asc";
		$data['sort_lname'] = "sort_lname_asc";
		$data['sort_country'] = "sort_country_asc";
		$data['total'] = "sort_total_asc";
		$this->load->view('main/order_details',$data);
	}
	
	/** Sorting function based on First Name ascending along with pagination **/
	public function sort_fname_asc(){
		$data['url'] = base_url();
		$config['base_url']="http://localhost/excersise/main/order_details";
		$config['total_rows'] = $this->Main_model->total();
		$config['per_page'] = 10;
		$config["uri_segment"] = 3;
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = round($choice);
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$records = $this->Main_model->fname_asc($page,$config['per_page']);		// Pagination happens here
		$data['records'] = $records->result();
		$data['sort_id'] = "sort_id_desc";
		$data['sort_fname'] = "sort_fname_desc";
		$data['sort_lname'] = "sort_lname_desc";
		$data['sort_country'] = "sort_country_desc";
		$data['total'] = "sort_total_desc";
		$this->load->view('main/order_details',$data);
	}
	
	/** Sorting function based on First Name descenting along with pagination **/
	public function sort_fname_desc(){
		$data['url'] = base_url();
		$config['base_url']="http://localhost/excersise/main/order_details";
		$config['total_rows'] = $this->Main_model->total();
		$config['per_page'] = 10;
		$config["uri_segment"] = 3;
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = round($choice);
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$records = $this->Main_model->fname_desc($page,$config['per_page']);		// Pagination happens here
		$data['records'] = $records->result();
		$data['sort_id'] = "sort_id_asc";
		$data['sort_fname'] = "sort_fname_asc";
		$data['sort_lname'] = "sort_lname_asc";
		$data['sort_country'] = "sort_country_asc";
		$data['total'] = "sort_total_asc";
		$this->load->view('main/order_details',$data);
	}
	
	/** Sorting function based on Last Name ascending along with pagination **/
	public function sort_lname_asc(){
		$data['url'] = base_url();
		$config['base_url']="http://localhost/excersise/main/order_details";
		$config['total_rows'] = $this->Main_model->total();
		$config['per_page'] = 10;
		$config["uri_segment"] = 3;
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = round($choice);
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$records = $this->Main_model->lname_asc($page,$config['per_page']);		// Pagination happens here
		$data['records'] = $records->result();
		$data['sort_id'] = "sort_id_desc";
		$data['sort_fname'] = "sort_fname_desc";
		$data['sort_lname'] = "sort_lname_desc";
		$data['sort_country'] = "sort_country_desc";
		$data['total'] = "sort_total_desc";
		$this->load->view('main/order_details',$data);
	}
	
	/** Sorting function based on Last Name descenting along with pagination **/
	public function sort_lname_desc(){
		$data['url'] = base_url();
		$config['base_url']="http://localhost/excersise/main/order_details";
		$config['total_rows'] = $this->Main_model->total();
		$config['per_page'] = 10;
		$config["uri_segment"] = 3;
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = round($choice);
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$records = $this->Main_model->lname_desc($page,$config['per_page']);		// Pagination happens here
		$data['records'] = $records->result();
		$data['sort_id'] = "sort_id_asc";
		$data['sort_fname'] = "sort_fname_asc";
		$data['sort_lname'] = "sort_lname_asc";
		$data['sort_country'] = "sort_country_asc";
		$data['total'] = "sort_total_asc";
		$this->load->view('main/order_details',$data);
	}
	
	/** Sorting function based on Country ascending along with pagination **/
	public function sort_country_asc(){
		$data['url'] = base_url();
		$config['base_url']="http://localhost/excersise/main/order_details";
		$config['total_rows'] = $this->Main_model->total();
		$config['per_page'] = 10;
		$config["uri_segment"] = 3;
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = round($choice);
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$records = $this->Main_model->country_asc($page,$config['per_page']);		// Pagination happens here
		$data['records'] = $records->result();
		$data['sort_id'] = "sort_id_desc";
		$data['sort_fname'] = "sort_fname_desc";
		$data['sort_lname'] = "sort_lname_desc";
		$data['sort_country'] = "sort_country_desc";
		$data['total'] = "sort_total_desc";
		$this->load->view('main/order_details',$data);
	}
	
	/** Sorting function based on Country descenting along with pagination **/
	public function sort_country_desc(){
		$data['url'] = base_url();
		$config['base_url']="http://localhost/excersise/main/order_details";
		$config['total_rows'] = $this->Main_model->total();
		$config['per_page'] = 10;
		$config["uri_segment"] = 3;
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = round($choice);
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$records = $this->Main_model->country_desc($page,$config['per_page']);	// Pagination happens here
		$data['records'] = $records->result();
		$data['sort_id'] = "sort_id_asc";
		$data['sort_fname'] = "sort_fname_asc";
		$data['sort_lname'] = "sort_lname_asc";
		$data['sort_country'] = "sort_country_asc";
		$data['total'] = "sort_total_asc";
		$this->load->view('main/order_details',$data);
	}
	
	/** Sorting function based on Grand Total ascending along with pagination **/
	public function sort_total_asc(){
		$data['url'] = base_url();
		$config['base_url']="http://localhost/excersise/main/order_details";
		$config['total_rows'] = $this->Main_model->total();
		$config['per_page'] = 10;
		$config["uri_segment"] = 3;
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = round($choice);
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$records = $this->Main_model->total_asc($page,$config['per_page']);		// Pagination happens here
		$data['records'] = $records->result();
		$data['sort_id'] = "sort_id_desc";
		$data['sort_fname'] = "sort_fname_desc";
		$data['sort_lname'] = "sort_lname_desc";
		$data['sort_country'] = "sort_country_desc";
		$data['total'] = "sort_total_desc";
		$this->load->view('main/order_details',$data);
	}
	
	/** Sorting function based on Grand Total descenting along with pagination **/
	public function sort_total_desc(){
		$data['url'] = base_url();
		$config['base_url']="http://localhost/excersise/main/order_details";
		$config['total_rows'] = $this->Main_model->total();
		$config['per_page'] = 10;
		$config["uri_segment"] = 3;
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = round($choice);
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$records = $this->Main_model->total_desc($page,$config['per_page']);	// Pagination happens here
		$data['records'] = $records->result();
		$data['sort_id'] = "sort_id_asc";
		$data['sort_fname'] = "sort_fname_asc";
		$data['sort_lname'] = "sort_lname_asc";
		$data['sort_country'] = "sort_country_asc";
		$data['total'] = "sort_total_asc";
		$this->load->view('main/order_details',$data);
	}
	
	/** View function for viewing the individual order based on user selection **/
	public function view_order($id){
		$data['url'] = base_url();
		$data['result'] = $this->Main_model->data_ind($id);
		$this->load->view('main/view_item',$data);
	}
	
	/** Edit function for editing the individual order based on user selection **/
	public function edit_order($id){
		$data['url'] = base_url();
		$data['result'] = $this->Main_model->data_ind($id);
		$this->load->view('main/edit_item',$data);
	}
	
	
	/** Update function for updating the edited data into the database **/
	public function update(){
		$result = $_POST;
		$id = $_POST['id'];
		$orderArr = array('ship_first_name','ship_last_name','ship_city','ship_street1','ship_street2','ship_zip','ship_state','ship_country','inv_city','inv_street1','inv_street2','inv_zip','grand_total','ship_company','cust_ord_id');
		foreach($orderArr as $val){
			if(array_key_exists($val,$result)){
				$order[$val]= $result[$val];
			}
		}
		$this->Main_model->update_order($order,$id);		// Matching and updating order table
				
		$custArr = array('first_name','last_name','email','phone');
		foreach($custArr as $val){
			if(array_key_exists($val,$result)){
				$customer[$val]= $result[$val];
			}
		}
		$this->Main_model->update_customer($customer,$id);	// Matching and updating customer table
		
		$itemArr = array('quantity','price');
		foreach($itemArr as $val){
			if(array_key_exists($val,$result)){
				$item[$val]= $result[$val];
			}
		}
		$this->Main_model->update_item($item,$id);		// Matching and updating item order table
		
		$productArr = array('sku','name');
		foreach($productArr as $val){
			if(array_key_exists($val,$result)){
				$product[$val]= $result[$val];
			}
		}
		$this->Main_model->update_product($product,$id);		//Matching and updating product table	
		$this->order_details();
	}
	
	/** Search function for searching the data in the data area based on id, first name and last name **/
	public function search(){
		$parameter = $_POST['search'];
		$data['url'] = base_url();
		$data['sort_id'] = "sort_id_desc";
		$data['sort_fname'] = "sort_fname_desc";
		$data['sort_lname'] = "sort_lname_desc";
		$data['sort_country'] = "sort_country_desc";
		$data['total'] = "sort_total_desc";
		$records = $this->Main_model->search($parameter);		//Search happens here
		$data['records'] = $records->result();
		$this->load->view('main/order_details',$data);
	}
}
