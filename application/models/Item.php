<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item extends CI_Model 
{
    function index()
    {

    }

    function add_to_cart($item_id, $quantity)
    {
        // Check if the item already exists in the cart
        $query = $this->db->query("SELECT * FROM carts WHERE item_id = $item_id");
        $result = $query->row_array();

        if ($result) {
            // If the item exists, update the quantity
            $new_quantity = $result['quantity'] + $quantity;
            $this->db->where('item_id', $item_id);
            $this->db->update('carts', array('quantity' => $new_quantity));
        } else {
            // If the item does not exist, insert a new row
            $data = array(
                'item_id' => $item_id,
                'quantity' => $quantity );
            $this->db->insert('cart', $data);
        }
    }

    function get_cart_contents()
    {
        // Join the items table to get item name and price
        $this->db->select('carts.quantity, items.item_name, items.price');
        $this->db->from('carts');
        $this->db->join('items', 'carts.item_id = items.item_id');
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_item_price($item_id)
    {

    }
}