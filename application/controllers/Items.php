<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Items extends CI_Controller 
{
	function index()
	{
		// Load the model
        $this->load->model('item');

        // Get the cart contents
        $data['cart_contents'] = $this->item->get_cart_contents();

		// Calculate total quantity
		$data['total_quantity'] = 0;
		foreach ($data['cart_contents'] as $item) 
		{
			$data['total_quantity'] += $item['quantity'];
		}

        // Load the view for the catalog page
        $this->load->view('catalog', $data);
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
        redirect('items');
	}
 
	function cart()
	{
		// Load the model
        $this->load->model('item');

        // Get the cart contents
        $data['cart_contents'] = $this->item->get_cart_contents();

		// Calculate total price
		$data['total_price'] = 0;
		foreach ($data['cart_contents'] as $item) 
		{
			$data['total_price'] += $item['price'] * $item['quantity'];
		}

        // Load the view
        $this->load->view('cart', $data);
	}

	// Helper function to calculate total price
	private function calculateTotal($cart_contents) 
	{
		$total = 0;
		foreach ($cart_contents as $item) {
			$total += $item['quantity'] * $item['price'];
		}
		return $total;
	}

	function remove_item()
    {
		$cart_id = $this->input->post('cart_id');
    
		$this->load->model('item');
		$this->item->remove_from_cart($cart_id);
	
		redirect('items/cart');
    }

	function go_back()
	{
		// Redirect back to the catalog page
		redirect('items');
	}
}
