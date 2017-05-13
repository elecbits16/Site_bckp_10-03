 <?php
    /**
     * Get current users preference
     * @return int
     */
    function jc_get_products_per_page(){
 
        global $woocommerce;
 
        $default = 24;
        $count = $default;
        $options = jc_get_products_per_page_options();
 
        // capture form data and store in session
        if(isset($_POST['jc-woocommerce-products-per-page'])){
 
            // set products per page from dropdown
            $products_max = intval($_POST['jc-woocommerce-products-per-page']);
            if($products_max != 0 && $products_max >= -1){
 
            	if(is_user_logged_in()){
 
            		$user_id = get_current_user_id();
    		    	$limit = get_user_meta( $user_id, '_product_per_page', true );
 
    		    	if(!$limit){
    		    		add_user_meta( $user_id, '_product_per_page', $products_max);
    		    	}else{
    		    		update_user_meta( $user_id, '_product_per_page', $products_max, $limit);
    		    	}
            	}
 
                $woocommerce->session->jc_product_per_page = $products_max;
                return $products_max;
            }    
        }
 
        // load product limit from user meta
        if(is_user_logged_in() && !isset($woocommerce->session->jc_product_per_page)){
 
            $user_id = get_current_user_id();
            $limit = get_user_meta( $user_id, '_product_per_page', true );
 
            if(array_key_exists($limit, $options)){
                $woocommerce->session->jc_product_per_page = $limit;
                return $limit;  
            }       
        }
 
        // load product limit from session
        if(isset($woocommerce->session->jc_product_per_page)){
 
            // set products per page from woo session
            $products_max = intval($woocommerce->session->jc_product_per_page);
            if($products_max != 0 && $products_max >= -1){
                return $products_max;
            }
        }	
 
        return $count;
    }
    add_filter('loop_shop_per_page','jc_get_products_per_page');
 
    /**
     * Fetch list of avaliable options
     * @return array
     */
    function jc_get_products_per_page_options(){
    	$options = apply_filters( 'jc_products_per_page', array(
    		4 => __('4', 'woocommerce'),
    		6 => __('6', 'woocommerce'),
    		8 => __('8', 'woocommerce'),
            10 => __('10', 'woocommerce'),
            12 => __('12', 'woocommerce'),
        ));
 
    	return $options;
    }
 
    /**
     * Display dropdown form to change amount of products displayed
     * @return void
     */
    function jc_woocommerce_products_per_page(){
        global $wp_query;
        $paged    = max( 1, $wp_query->get( 'paged' ) );
        $total    = $wp_query->found_posts;

        
        $options = jc_get_products_per_page_options(); 
        $current_value = jc_get_products_per_page();
        ?>
        <div class="products-filter products-per-page">
            <label>View Items:</label>
            <form action="" method="POST" class="woocommerce-products-per-page">
                <select name="jc-woocommerce-products-per-page"  class="filter-products-per-page" onchange="this.form.submit()">
                <?php foreach($options as $value => $name): ?>
                    <?php if(ceil($total/$value) >= $paged): ?>
                        <option value="<?php echo $value; ?>" <?php selected($value, $current_value); ?>><?php echo $name; ?></option>
                    <?php endif; ?>
                <?php endforeach; ?>        
                </select>
            </form>
        </div>
        <?php
    }
 
    ?>