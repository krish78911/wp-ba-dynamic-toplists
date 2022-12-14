<?php
/**
 * Get data from API
 */
require_once 'DataInterface.php';
class FetchData implements DataInterface{

    public $attr;
    public $json;

    function __construct($attr) {
        $this->attr = $attr;
    }
    public function getData() {
        $gen_features_arr = explode(",", $this->attr['gen_features']);
        $gen_features = '';
        $ipp = $this->attr['results'];
        for ($i=0; $i<count($gen_features_arr); $i++) {
            if($i != 0) {
                $gen_features .= '&gen_features[]='.trim($gen_features_arr[$i]).'';
            } else {
                $gen_features .= 'gen_features[]='.trim($gen_features_arr[$i]).'';
            }
            
        }
        $orderby = '';
        if(empty($this->attr['orderby']) || !isset($this->attr['orderby'])) {
            $orderby = 'category_relevance';
        } else {
            $orderby = $this->attr['orderby'];
        }
        //$response = wp_remote_get('https://glue.babyartikel.de/catalog-search?'.$gen_features.'&category='.$this->attr['category'].'&ipp='.$ipp.'&sort='.$orderby.'', []);
        $response = wp_remote_get('https://glue.babyartikel.de/catalog-search?'.$this->attr['filter'].'&category='.$this->attr['category'].'&ipp='.$ipp.'&sort='.$orderby.'', []);
        if( is_wp_error( $response ) ) {
            echo "<section> API is not available... </section>";
            return NULL;
        }
        // Decode JSON data into PHP array
        return json_decode($response['body']);
    }
}

?>