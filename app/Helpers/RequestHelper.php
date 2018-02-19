<?php

namespace App\Helpers;

class RequestHelper
{ 
    public function structure_query($order) {
        // If request has no query string, append order to url
        if (!request()->query()) {
            return request()->url() . '/?order=' . $order;
        }
        
        // If request has query string but no order in it, append order to query string
        if (!request()->has('order')) {
            return request()->fullurl() . '&order=' . $order;
        }
        
        // If request has query string and has order in it
        // Get query string
        $query = request()->query();
        
        // Replace value of order with provided value
        $query['order'] = $order;
        
        // If query has key 'page', set it to 1, so we get redirected to page 1
        // after changing order in which posts are shown
        if (isset($query['page'])) {
            $query['page'] = 1;
        }
        
        // Form query string and append it to url
        $query_string = '';
        $first_element = true;
        
        foreach ($query as $key => $val) {
            if ($first_element) {
                $query_string = "?$key=$val";
                $first_element = false;
                continue;
            }
            $query_string .= "&$key=$val";
        }
        
        return request()->url() . $query_string;
    }

}
