<div class="card">
    <span class="label"> <?php echo $platz; // place of item in number example 1, 2 or 3 ?> </span>
    <img src="<?php echo $image; ?>" class="card-img-top" loading="lazy" alt="...">
    <div class="card-body">
        <h5 class="card-title"> <?php echo $brand; // brand ?> </h5>
        <p class="card-text"> <?php echo $cardText; // title ?> </p>
        <div class="row justify-content-between">
            <!--<span class="stars col-7"></span>-->
            <span class="ratingStars col-7"><?php echo $stars; ?></span>
            <span class="price col-5"> <?php echo $price.' '.$currencySymbol; // price ?> </span>
        </div>
        <a href="<?php echo $url; // url to the product page ?>" class="btn">Zum Produkt</a>

        <!--More details-->
        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <span class="accordion-header" id="headingOne">
                    <?php 
                        $rand = rand(100,10000).'_'.rand(100,10000);
                    ?>
                    <button class="btn" type="button" data-toggle="collapse" href="#collapseOne<?php echo $j.'_'.$rand; ?>" aria-expanded="true" aria-controls="collapseOne">
                        Mehr Details
                    </button>
                </span>
                <div id="collapseOne<?php echo $j.'_'.$rand; ?>" class="collapse">
                    <div class="accordion-body">
                        <dl class="row">
                            <?php 
                                // optional details based on selected in shortcode
                                for($i = 0; $i < count($product_attributes_arr); $i++) {
                                    $productAttribute = $attributes_array[trim($product_attributes_arr[$i])][0];
                                    $attributeName    = trim($attribute_names_arr[$i]);
                                    if(!empty($productAttribute) && isset($productAttribute)) {
                                        ?>
                                        <dt class="col-sm-5">
                                            <?php if(!empty($attributeName) && isset($attributeName)) { echo $attributeName; } ?>
                                        </dt>
                                        <dd class="col-sm-7"> <?php echo $productAttribute; ?> </dd>
                                        <?php
                                    }
                                }
                            ?>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>