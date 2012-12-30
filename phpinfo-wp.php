<?php /*
    Plugin Name: phpinfo-wp
    Plugin URI: http://webpresencepartners.com
    Description: Go to Tools &rarr; phpinfo
    Version: 1
    Author: Daniel Grundel, Web Presence Partners
    Author URI: http://webpresencepartners.com
*/
    
    class phpinfo_wp {
        public function __construct() {
            define('PHPINFO_WP_URL', plugin_dir_url(__FILE__));
            
            add_action('admin_menu', array(&$this, 'phpinfo_admin_menu'));
        }
        
        public function phpinfo_admin_menu() {
            add_management_page('phpinfo', 'phpinfo', 'manage_options', 'phpinfo', array(&$this, 'phpinfo_html'));
        }
        
        public function phpinfo_html() { ?>
            
            <style type="text/css">
                #phpinfo_wp {
                    margin: 0 auto;
                }
            </style>
            
            <div id="phpinfo_wp">
                <iframe src="<?php echo PHPINFO_WP_URL; ?>phpinfo-wp.php?phpinfo_iframe" width="98%" height="98%"></iframe>
            </div>
        <?php }
    }
    
    if(isset($_REQUEST['phpinfo_iframe'])) {
        phpinfo();
    } else {
        new phpinfo_wp();
    }
    
?>