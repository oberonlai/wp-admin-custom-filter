<?php

namespace ODS;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! class_exists( 'CustomFilter' ) ) {
    class CustomFilter {
        public $option;
        
        public function __construct( Array $option ){
            $this->option = $option;
            add_action( 'restrict_manage_posts', array( $this, 'set_status_filter' ), 10, 1 );
            add_filter( 'parse_query', array( $this, 'get_status_filter_result' ) );
        }

        /**
    	 * 增加列表頁 Filter 下拉選單
    	 */
    	public function set_status_filter( $post_type ){
    		global $wp_query;
    			if ( $this->option['posttype'] === $post_type ) { 
    				$current_plugin = '';
    				if( isset( $_GET[$this->option['name']] ) ) {
    					$current_plugin = $_GET[$this->option['name']];
    				} ?>
    				<select name="<?php echo $this->option['name']; ?>" id="<?php echo $this->option['name']; ?>" style="width: 150px;">
                        <?php foreach ( $this->option['option'] as $k => $i ): ?>
    					<option value="<?php echo $k ?>" <?php selected( $k, $current_plugin ); ?>><?php echo $i; ?></option>
                        <?php endforeach; ?>
    				</select>
    		<?php }
    	}

    	/**
    	 * 列表取得 Filter 結果
    	 */
    	public function get_status_filter_result( $query ){
    		global $pagenow;
    		$post_type = isset( $_GET['post_type'] ) ? $_GET['post_type'] : '';
    		if ( is_admin() && $pagenow=='edit.php' && $post_type == $this->option['posttype'] && isset( $_GET[$this->option['name']] ) && $_GET[$this->option['name']] !='all' ) {
    			$query->query_vars['post_status'] = 'all';
    			$query->query_vars['meta_key'] = $this->option['key'];
    			$query->query_vars['meta_value'] = $_GET[$this->option['name']];
    			$query->query_vars['meta_compare'] = $this->option['compare'];
    		}
    	}
    }
}