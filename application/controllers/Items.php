<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Items extends CI_Controller 
{
	function index()
	{
		$this->load->view('catalog');
	}

	function add_item()
	{
		$item_id = $this->input->post('item_id');
        $quantity = $this->input->post('quantity');
        
        // Load the model
        $this->load->model('item');
        
        // Call the add_to_cart method in the model
        $this->item->add_to_cart($item_id, $quantity);

        // Redirect to the cart page
        redirect('items/cart');
	}

	function cart()
	{
		// Load the model
        $this->load->model('item');

        // Get the cart contents
        $data['cart_contents'] = $this->item->get_cart_contents();

        // Load the view
        $this->load->view('cart', $data);
	}

	function go_back()
	{
		// Redirect back to the catalog page
		redirect('items');
	}
}
