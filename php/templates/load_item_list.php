<section>
    <div class="bootstrap-container dynamic-toplist">
    <?php
        //echo ($indexIsSet != 0) ? '':'<div class="card-columns">';
    ?>
    
        <?php

        if($indexIsSet == 0) { // if index is not set then show all items
            $pl = 2;
            for($j=0; $j<$ipp; $j++) { // loop through all the items
                if($j < count($this->json->data[0]->attributes->abstractProducts)) {
                    $stars = '';
                    if($j==0) {
                        $platz = $this->attr['firstresultlabel']; // top left placeholder in 1st item
                        if(empty($this->attr['firstresultlabel']) || !isset($this->attr['firstresultlabel'])) {
                            $platz = 'Platz 1';
                        } 
                    } else {
                        $platz = 'Platz '.$pl; // top left placeholder in 2nd and rest other items
                        $pl++;
                    }
    
                    include("get_variables_template.php"); // get variables to show item details
                    include("item_template.php"); // get item template with filled in data and design
                }
                
            }
        } else { // if index is set then show only the item with selected index value
            $platz = $this->attr['firstresultlabel']; // top left placeholder in 1st item
            if(empty($this->attr['firstresultlabel']) || !isset($this->attr['firstresultlabel'])) {
                $platz = 'Platz 1';
            } 
            $j = $index;
            if($j < count($this->json->data[0]->attributes->abstractProducts)) {
                $stars = '';
                include("get_variables_template.php"); // get variables to show item details
                include("item_template.php"); // get item template with filled in data and design
            }
        }
        ?>
    <?php
        //echo ($indexIsSet != 0) ? '':'</div>';
    ?>
</div>
</section>
<style>
.card-columns {
		 column-count: 1;
}
@media only screen and (min-width: 1200px) {
	 .card-columns {
		 column-count: 2;
	}
}
@media only screen and (min-width: 1500px) {
	 .card-columns {
		 column-count: 3;
	}
}

/*center cards for Desktop*/
.dynamic-toplist {
    text-align: -webkit-center;
    margin-top: 10px;
}

.dynamic-toplist .card{
    text-align:center;
    margin: 0 0.25rem 1rem 0.25rem;
    padding: 1rem;
    border: 0px;
}

@media all and (min-width: 575px){
    .dynamic-toplist .card{
        max-width: 32rem;
    }

    .dynamic-toplist .card img{
        max-width: 20rem;
        align-self: center;
    }
}


.dynamic-toplist .card:after {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    border-radius: 0.375rem;
    background: rgba(17,17,17,.05);
    z-index: 12;
}

.dynamic-toplist .card .btn{
    width: -webkit-fill-available;
    background-color: #C8BFDF;
    margin-top: 0.5rem;
    border: hidden;
    font-weight: 600;
}

.dynamic-toplist .card .btn:focus{
    background-color: #ECECEC;
}

.dynamic-toplist .accordion .btn{
    background-color: #E4E0F1;
}

.dynamic-toplist .btn:focus{
    box-shadow: none;
}

.dynamic-toplist .card .card-body{
    padding: 0rem;
    z-index: 13;
}

.dynamic-toplist .card .label{
    position: absolute;
    color: white;
    background-color: #4880C0;
    text-align: left;
    width: fit-content;
    padding: 0.25rem 0.5rem;
    margin-left: -1rem;
    font-weight: 600;
}

.dynamic-toplist .card p {
    margin-bottom: 0rem;;
}    

.dynamic-toplist .card .price{
    text-align: right;
    align-self: center;
    font-weight: 600;
}

.dynamic-toplist .card .card-text{
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
}

.dynamic-toplist .card .ratingStars {
    text-align: left;
    padding-top: 10px;
    padding-bottom: 10px;
}
.dynamic-toplist .card .stars{
    text-align: left;
}

/*just to add contrast for the test layout*/
.dynamic-toplist .card .stars:before{
    color: #ffbf1c;
}

.dynamic-toplist dl{
    text-align: left;
    font-size: 1rem;
    margin-top: 1rem;
    margin-bottom: -0.5rem;
}

.dynamic-toplist .attributes li{
    font-weight: 600;
}
</style>