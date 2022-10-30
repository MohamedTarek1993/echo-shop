<?php 

/**
 * The sidebar containing the shop page
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Echo-shop
 */
?>


<div class="sideber_warrper">
		<?php
        if(is_active_sidebar( 'sidebar-shop' )):
		dynamic_sidebar('sidebar-shop'); 
        endif;
        ?>


</div>