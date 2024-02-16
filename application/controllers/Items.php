<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Items extends CI_Controller 
{
	/* new added */
	function __construct()
    {
        parent::__construct();
        $this->load->model('item');
        $this->load->library('session');
		$this->load->library('form_validation');
        $this->load->helper('form');
    }

	function index()
	{
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

	function add_item($item_id)
	{
        $quantity = $this->input->post('quantity', TRUE);	// Enable xss_clean
        
        // Call the add_to_cart method in the model
        $this->item->add_to_cart($item_id, $quantity);

        // Redirect to the cart page
        redirect('items');
	}
 
	function cart()
	{
        // Get the cart contents
        $data['cart_contents'] = $this->item->get_cart_contents();

		// Calculate total price
		$data['total_price'] = 0;
		foreach ($data['cart_contents'] as $item) 
		{
			$data['total_price'] += $item['price'] * $item['quantity'];
		}

		/* new added - Order successful when order submitted*/
		$data['success_order'] = $this->session->flashdata('success_order');

        $this->load->view('cart', $data);
	}

	function remove_item($cart_id)
    {
		$this->item->remove_from_cart($cart_id);
		redirect('items/cart');
    }

	/* new added */
	function submit_order()
	{
		// Set validation rules
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('address', 'Address', 'required');
		$this->form_validation->set_rules('card_number', 'Card Number', 'required');
	
		if($this->form_validation->run() == FALSE)
		{
			// If validation fails, reload the cart view with validation errors
			$this->cart();
		}
		else 
		{
			// If validation passes, proceed with submitting the order
			$this->item->remove_all_cart();
	
			/* $this->load->library('session'); */
			$this->session->set_flashdata('success_order','Your order has been submitted!');
			redirect('items/cart');
		}

		/* $this->item->remove_all_cart();
		$this->session->set_flashdata('success_order','Your order has been submitted!');
		redirect('items/cart'); */
	}

	function go_back()
	{
		redirect('items');
	}
}
