<?php
require_once 'DataInterface.php';
class LoadTemplate implements DataInterface{

    public $attr;
    public $json;

    function __construct($attr, $json) {
        $this->attr = $attr;
        $this->json = $json;
    }
    public function getData() {

        $product_attributes_arr = explode(",", $this->attr['product_attributes']);
        $attribute_names_arr    = explode(",", $this->attr['attribute_names']);

        $ipp                    = $this->attr['results'];

        if (trim($this->attr['table']) == 'true') {
            include("templates/load_table.php");
        } else {

            $indexIsSet = 0;
            $index      = 0;
            if(isset($this->attr['index']) && $this->attr['index'] != NULL) {
                $indexIsSet = 1;
                // $index = $this->attr['index']; // index start with 0 as per database
                $index = $this->attr['index']-1; // index start from 0 in database but user enter starting from 1, then we do -1 to match with index in database
                
            }
            if(($index >= 0) && ($index < $ipp)) {
                include("templates/load_item_list.php");
            } 
            else {
                echo "</br><section>
                    No items found..., 
                    </br>
                    <i>index</i> value in Shortcode must be between 1 to selected number of <i>results</i> 
                    </br>
                    if <i>results=3</i> then <i>index=1</i> or <i>index=2</i> or <i>index=3</i>
                    </br>
                    or if all items have to be shown then remove <i>index</i> attribute from shortcode...
                    
                </section></br>";
            }
            

        } 

    }
}

?>