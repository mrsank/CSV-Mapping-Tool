<?php

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
 * @location   		/application/model/main_model.php
 * @description		Model file for the application
 * @date      		06/11/2013
 */

class Main_model extends CI_Model {

    function __construct()
    {
        parent::__construct();		// Contructor for the model
    }
	
	/** Function for order table insertion **/	
	function insert_order($array){
		$query = $this->db->insert('order',$array);
		$id = $this->db->insert_id();
		return $id;
	}
	
	/** Function for customer table insertion **/
	function insert_customer($array){	
		$query = $this->db->insert('customer',$array);
		return $query;
	}
	
	/** Function for item table insertion **/
	function insert_item($array){
		$query = $this->db->insert('order_items',$array);
		return $query;
	}
	
	/** Function for product table insertion **/
	function insert_product($array){
		$query = $this->db->insert('product',$array);
		return $query;
	}
	
	/** Function for fetching entire data from order table **/
	function fetch_all($limit,$offset){
		$this->db->limit($offset,$limit);
		$this->db->order_by('id','desc');	// Order by id desc which brings the latest record to the first column of table
		$query = $this->db->get('order');
		return $query;
	}
	
	/** Function for sorting the result based on ID ascending **/
	function id_asc($limit,$offset){
		$this->db->limit($offset,$limit);
		$this->db->order_by("id", "asc");
		$query = $this->db->get('order');
		return $query;
	}
	
	/** Function for sorting the result based on ID descending **/
	function id_desc($limit,$offset){
		$this->db->limit($offset,$limit);
		$this->db->order_by("id", "desc");
		$query = $this->db->get('order');
		return $query;
	}
	
	/** Function for sorting the result based on First Name ascending **/
	function fname_asc($limit,$offset){
		$this->db->limit($offset,$limit);
		$this->db->order_by("ship_first_name", "asc");
		$query = $this->db->get('order');
		return $query;
	}
	
	/** Function for sorting the result based on First name descending **/
	function fname_desc($limit,$offset){
		$this->db->limit($offset,$limit);
		$this->db->order_by("ship_first_name", "desc");
		$query = $this->db->get('order');
		return $query;
	}
	
	/** Function for sorting the result based on Last Name ascending **/
	function lname_asc($limit,$offset){
		$this->db->limit($offset,$limit);
		$this->db->order_by("ship_last_name", "asc");
		$query = $this->db->get('order');
		return $query;
	}
	
	/** Function for sorting the result based on Last Name descending **/
	function lname_desc($limit,$offset){
		$this->db->limit($offset,$limit);
		$this->db->order_by("ship_last_name", "desc");
		$query = $this->db->get('order');
		return $query;
	}
	
	/** Function for sorting the result based on Country ascending **/
	function country_asc($limit,$offset){
		$this->db->limit($offset,$limit);
		$this->db->order_by("ship_country", "asc");
		$query = $this->db->get('order');
		return $query;
	}
	
	/** Function for sorting the result based on Country descending **/
	function country_desc($limit,$offset){
		$this->db->limit($offset,$limit);
		$this->db->order_by("ship_country", "desc");
		$query = $this->db->get('order');
		return $query;
	}
	
	/** Function for sorting the result based on Grand Total ascending **/
	function total_asc($limit,$offset){
		$this->db->limit($offset,$limit);
		$this->db->order_by("grand_total", "asc");
		$query = $this->db->get('order');
		return $query;
	}
	
	/** Function for sorting the result based on Grand Total descending **/
	function total_desc($limit,$offset){
		$this->db->limit($offset,$limit);
		$this->db->order_by("grand_total", "desc");
		$query = $this->db->get('order');
		return $query;
	}
	
	/** Function for finding total for pagination in the table page **/
	function total(){
		return $this->db->get('order')->num_rows();
	}
	
	/** Function for showing individual data result for view and edit **/
	function data_ind($id){
		$query = $this->db->query("SELECT `order`.id,
`order`.ship_first_name,`order`.ship_last_name,`order`.ship_city,`order`.ship_company,`order`.grand_total,`order`.ship_street1,`order`.ship_street2,`order`.ship_zip,ship_state,`order`.ship_country,`order`.inv_city,`order`.inv_street1,`order`.inv_street2,`order`.inv_zip,`order`.cust_ord_id,`customer`.first_name,`customer`.last_name,`customer`.email,`customer`.phone,`order_items`.quantity,`order_items`.price,`product`.sku,`product`.name
FROM `order`
join `customer` on `customer`.order_id = `order`.id
join `order_items` on `order_items`.order_id = `order`.id
join `product` on `product`.order_id = `order`.id WHERE `order`.id = $id")->result();
		return $query;
	}
	
	/** Function for updating order table **/
	function update_order($array,$id){	
		$this->db->where('id',$id);
		$query = $this->db->update('order',$array);
		return $query;
	}
	
	/** Function for updating customer table **/
	function update_customer($array,$id){	
		$this->db->where('order_id',$id);
		$query = $this->db->update('customer',$array);
		return $query;
	}
	
	/** Function for updating order items table **/
	function update_item($array,$id){
		$this->db->where('order_id',$id);
		$query = $this->db->update('order_items',$array);
		return $query;
	}
	
	/** Function for updating product table **/
	function update_product($array,$id){
		$this->db->where('order_id',$id);
		$query = $this->db->update('product',$array);
		return $query;
	}
	
	/** Function for searching the data entered in the order details page **/
	function search($data){
		$this->db->like('cust_ord_id', $data);
		$this->db->or_like('ship_first_name', $data); 
		$this->db->or_like('ship_last_name', $data); 
		$this->db->or_like('ship_country', $data); 
		$query = $this->db->get('order');
		return $query;
	}
}

?>