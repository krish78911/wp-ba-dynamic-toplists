<div class="swiper-slide">
    <!--Slide 1-->
    <div class="card">
        <span class="label"> <?php echo $platz; // place of item in number example 1, 2 or 3 ?> </span>
        <img src="<?php echo $image; ?>" class="card-img-top" loading="lazy" alt="...">
        <div class="card-body">
            <ul>
                <li><strong> <?php echo $brand; // brand ?> </strong></li>
                <li class="product-title"> <?php echo $cardText; // title ?> </li>
                <li>
                    <a href="<?php echo $url; // url to the product page ?>" class="btn">Zum Produkt</a>
                    <span> <?php echo $price.' '.$currencySymbol; // price ?> </span>
                </li>
                <li>
                    <!--<span class="stars"></span>-->
                    <span class="ratingStars"><?php echo $stars; ?></span>
                </li>
                <?php 
                    // optional details based on selected in shortcode
                    for($i = 0; $i < count($product_attributes_arr); $i++) {
                        $productAttribute = $attributes_array[trim($product_attributes_arr[$i])][0];
                        $attributeName    = trim($attribute_names_arr[$i]);
                        if(!empty($productAttribute) && isset($productAttribute)) {
                            ?>
                            <li>
                                <?php if(!empty($attributeName) && isset($attributeName) && $attributeName != "") { echo $attributeName.":<br>"; } ?>
                                <?php echo $productAttribute; ?>
                            </li>
                            <?php
                        }
                    }
                ?>
                
            </ul>
        </div>
    </div>
</div>