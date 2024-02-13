<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item extends CI_Model 
{
    function index()
    {}

    function add_to_cart($item_id, $quantity)
    {
        // Check if item already exists in the cart
        $query = $this->db->query("SELECT * FROM carts WHERE item_id = $item_id");
        $result = $query->row_array();

        if ($result) 
        {
            // If the item exists, update the quantity
            $new_quantity = $result['quantity'] + $quantity;
            $sql = "UPDATE carts SET quantity = ? WHERE item_id = ?";
            $this->db->query($sql, array($new_quantity, $item_id));

            /* BELOW! SQL queries without proper sanitization or validation */
            /* $sql = "UPDATE carts SET quantity = $new_quantity WHERE item_id = $item_id";
            $this->db->query($sql);  */
        } 
        else 
        {
            // If item doesn't exist, insert a new row
            $sql = "INSERT INTO carts (item_id, quantity) VALUES (?, ?)";
            $this->db->query($sql, array($item_id, $quantity));
        }
    }

    function get_cart_contents()
    {
        // Join the items table to get item name and price
        $sql = "SELECT carts.id as cart_id, carts.quantity, items.item_name, items.price
                FROM carts
                JOIN items ON carts.item_id = items.id";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function remove_from_cart($cart_id)
    {
        // SQL query to delete the row from the carts table
        $sql = "DELETE FROM carts WHERE id = ?";
            
        // Execute the SQL query with the cart_id as a parameter
        $this->db->query($sql, array($cart_id));   
    }
}