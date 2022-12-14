<?php
/*
* Plugin Name: BA Dynamic Toplists
* Description: show BA Dynamic Toplist items
* Version: 1.0
* Author: KP Family
*/

function top_list_items($attr){
    ob_start();
    require_once plugin_dir_path( __FILE__ ) . '/php/DataFactory.php';
    require_once plugin_dir_path( __FILE__ ) . '/php/FetchData.php';
    require_once plugin_dir_path( __FILE__ ) . '/php/LoadTemplate.php';

    $attr = shortcode_atts( array(
        'filter'                => '',
        'gen_features'          => '',
        'category'              => '',
        'results'               => '',
		'index'                 => '',
        'product_attributes'    => '',
        'attribute_names'       => '',
        'label'                 => '',
        'headline'              => '',
        'table'                 => '',
        'firstresultlabel'      => '',
        'orderby'               => '',
	), $attr, 'dynamic_toplist' );

    $obj = new DataFactory();

    $obj->setDataType(new FetchData($attr));
    $json = $obj->getDataType();
    if(!empty($json->data[0]->attributes->abstractProducts) && isset($json)) {
        $obj->setDataType(new LoadTemplate($attr, $json));
        $obj->getDataType();
    } 
    else if(empty($json->data[0]->attributes->abstractProducts) && isset($json)) {
        
        echo "</br>
                <section>
                    No items found...
                    </br>
                    please check <i>Shortcode</i>, If valid <i>category, gen_features, results</i> are selected
                    and if there is spacing between each <i>attribute</i> in shortcode...
                    </br></br>
                    For example: [dynamic_toplist gen_features='Handbremse, Big+wheels' category=1 product_attributes='color, gender, pack_weight' attribute_names='Farbe, Gender, Weight' orderby='price_asc' results=5 index=1 firstresultlabel='Best Seller']
                </section>
            </br>";
            
    }
    
    
    return ob_get_clean();
}
add_shortcode('dynamic_toplist', 'top_list_items');
?>