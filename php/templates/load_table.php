<section>
    <div class="bootstrap-container dynamic-toplist-table">
    <h1>
        <?php 
            if(!empty($this->attr['headline']) && isset($this->attr['headline'])) {
                echo $this->attr['headline'];
            }
        ?>
    </h1>

    <!-- Slider main container -->
    <div class="swiper mySwiper swiper-initialized swiper-horizontal swiper-pointer-events swiper-watch-progress swiper-backface-hidden">

        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
            <!-- Slides -->
            <?php 
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
                        include("item_table_template.php"); // get item template with filled in data and design
                    }
                }
            ?>
            
        </div>

        <!-- If we need navigation buttons -->
        <div class="swiper-button-prev">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#ffffff" class="bi bi-chevron-compact-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M9.224 1.553a.5.5 0 0 1 .223.67L6.56 8l2.888 5.776a.5.5 0 1 1-.894.448l-3-6a.5.5 0 0 1 0-.448l3-6a.5.5 0 0 1 .67-.223z"></path>
            </svg>
        </div>
        <div class="swiper-button-next">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-chevron-compact-right" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M6.776 1.553a.5.5 0 0 1 .671.223l3 6a.5.5 0 0 1 0 .448l-3 6a.5.5 0 1 1-.894-.448L9.44 8 6.553 2.224a.5.5 0 0 1 .223-.671z"/>
            </svg>
        </div>

        <!-- If we need scrollbar -->
        <div class="swiper-scrollbar"></div>

    </div>

</div>
</section>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css">
<script type="module">
    import Swiper from 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.esm.browser.min.js';

        var swiper = new Swiper(".mySwiper", {
        // Default parameters
        watchSlidesProgress: true,
        slidesPerView: 1,

        // Responsive breakpoints
        breakpoints: {            
            // when window width is >= 768px
            680: {
            slidesPerView: 2,
            },
            // when window width is >= 575px
            575: {
            slidesPerView: 1.5,
            },
            },  
       
        
        // If we need pagination
        //pagination: {
        //    el: '.swiper-pagination',
        //},

        // Navigation arrows
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
          // And if we need scrollbar
            scrollbar: {
                el: '.swiper-scrollbar',
            },

        });
</script>

<style>

    .dynamic-toplist-table .card{
        text-align:center;
        padding: 1rem;
        border: 0px;
    }

    .dynamic-toplist-table .card:after {
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

    @media all and (min-width: 575px){
        .dynamic-toplist-table .card{
            width: 18rem;
        }
    }

    .dynamic-toplist-table .card .card-body{
        padding: 0rem;
        z-index: 13;
    }

    .dynamic-toplist-table .card .label{
        position: absolute;
        color: white;
        background-color: #4880C0;
        text-align: left;
        width: fit-content;
        padding: 0.25rem 0.5rem;
        margin-left: -1rem;
        font-weight: 600;
    }

    .dynamic-toplist-table .card li{
        padding: 0.35rem 0;
    }
    
    .dynamic-toplist-table .card li:nth-child(2n){
        background-color: #ECECEC;
        margin: 0 -1rem;
        padding: 0.35rem 1rem;
    }

    .dynamic-toplist-table .card li .btn{
        width: -webkit-fill-available;
        background-color: #C8BFDF;
        margin-top: 0.5rem;
        margin-bottom: 0.5rem;
        border: hidden;
        font-weight: 600;

    }

    .dynamic-toplist-table .card p {
        margin-bottom: 0rem;;
    }    
    
    .dynamic-toplist-table .card .product-title{
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .dynamic-toplist-table .card .stars{
        text-align: left;
        margin: -0.25rem 0 -1rem 0;
    }
    .dynamic-toplist-table .card .ratingStars {
        text-align: left;
        padding-top: 10px;
        padding-bottom: 10px;
    }

    /*just to add contrast for the test layout*/
    .dynamic-toplist-table .card .stars:before{
        color: #ffbf1c;
    }

    .dynamic-toplist-table .swiper-button-next, .swiper-button-prev{
        color: #fff;
        border-radius: 100%;
        background: rgba(17,17,17,.7);
        width: 2.5rem;
        height: 2.5rem;
    }
    .dynamic-toplist-table .swiper-button-next:after, .swiper-button-prev:after {
        font-size: inherit;
        content: none;
    }

    .dynamic-toplist-table .card ul{
        list-style-type: none;
        padding-left: 0;
    }

</style>