<!DOCTYPE html>
<html lang="fr">
    <head>
        <?php $this->load->view('elements/head'); ?>
    </head>
    <body>
        <?php $this->load->view('elements/header'); ?>
        <!-- header -->
        <div class="clearfix"></div>
        <div class="shop-items">
            <div class="container">
                <div class="row">
                    <?php if ($products != ""): ?>

                        <div class="col-md-9 col-md-push-3">
                            <?php foreach ($products as $product): ?>
                                <?php
                                $description = explode("|", $product->PRODUCTS_DESCRIPTION);
                                $description = $description[0];
                                ?>
                                <div class="col-md-3 col-sm-4 col-xs-6">
                                    <div class="item">
                                        <!-- Item image -->
                                        <div class="item-image">
                                            <a href="single-item.html"><img src="http://placekitten.com/100/100" alt="" class="img-responsive"/></a>
                                        </div>
                                        <!-- Item details -->
                                        <div class="item-details">
                                            <!-- Name -->
                                            <h6><a href="single-item.html"><?= trunk($product->PRODUCTS_LABEL) ?></a></h6>
                                            <div class="clearfix"></div>
                                            <!-- Para. Note more than 2 lines. -->
                                            <hr />
                                            <!-- Price -->
                                            <div class="item-price pull-left"><?= $product->PRODUCTS_TAXES_FREE_PRICE ?>€</div>
                                            <!-- Add to cart -->
                                            <div class="pull-right"><a href="#" class="btn btn-danger btn-sm">Add to Cart</a></div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <?php echo $links; ?>
                                </div>
                            </div> 
                        </div>  
                    <?php else: ?>
                        <?php $this->load->view('statics/no-products'); ?>
                    <?php endif; ?>
                    <?php $this->load->view('elements/sidebar'); ?>
                </div>
            </div>
        </div>



        <?php $this->load->view('elements/footer'); ?>
        <?php $this->load->view('elements/scripts'); ?>
    </body>

</html>
<?php

function trunk($description) {
    //nombre de caractères à afficher
    $max_caracteres = 30;
    // Test si la longueur du texte dépasse la limite
    if (strlen($description) > $max_caracteres) {
        // Séléction du maximum de caractères
        $description = substr($description, 0, $max_caracteres);
        // Récupération de la position du dernier espace (afin déviter de tronquer un mot)
        $position_espace = strrpos($description, " ");
        $description = substr($description, 0, $position_espace);
        // Ajout des "..."
        $description = $description . "...";
    }
    return $description;
}
?>