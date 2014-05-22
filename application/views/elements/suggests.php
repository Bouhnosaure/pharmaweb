<div class="recent-posts blocky">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- Section title -->
                <div class="section-title">
                    <h4><i class="icon-desktop color"></i> &nbsp;Suggestions</h4>
                </div>    

                <div class="row">
                    <div class="col-md-12">
                        <div class="my_carousel">

                            <div class="carousel_nav pull-right">
                                <!-- Carousel navigation -->
                                <a class="prev" id="car_prev" href="#"><i class="icon-chevron-left"></i></a>
                                <a class="next" id="car_next" href="#"><i class="icon-chevron-right"></i></a>
                            </div>

                            <ul id="carousel_container">
                                <!-- Carousel item -->

                            </ul>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        updatesuggests();
    });

    function updatesuggests() {
        //$("#carousel_container").empty();

        $.getJSON("<?= base_url() ?>suggest").done(function(datass) {
            $("#carousel_container").empty();

            $.each(datass, function() {
                var url = '<?= base_url() ?>products/detail/' + this[1]['PRODUCTS_ID'];
                var name = this[1]['PRODUCTS_LABEL'];
                var price = this[1]['PRODUCTS_TAXES_FREE_PRICE'];
                var image = '<?= asset_url() . 'img/no-picture.jpg' ?>';
                var element = $('<li><a href="#"><img src="' + image + '" alt="" class="img-responsive"/></a><div class="carousel_caption"><p>' + name + '</p><br><a href="' + url + '"><i class="icon-shopping-cart"></i>Voir le produit</a></div></li>');
                $("#carousel_container").append(element);
            });
            $('#carousel_container').carouFredSel({
                responsive: true,
                width: '100%',
                direction: 'right',
                scroll: {
                    items: 4,
                    delay: 2000,
                    duration: 500,
                    pauseOnHover: "true"
                },
                prev: {
                    button: "#car_prev",
                    key: "left"
                },
                next: {
                    button: "#car_next",
                    key: "right"
                },
                items: {
                    visible: {
                        min: 1,
                        max: 4
                    }
                }
            })
        });
    }
</script>