<!DOCTYPE html>
<html lang="fr">
    <head>
        <?php $this->load->view('elements/head'); ?>
    </head>
    <body>
        <?php $this->load->view('elements/header'); ?>
        <!-- header -->
        <div class="clearfix"></div>
        <div class="page-title">
            <div class="container">
                <h2><i class="icon-desktop color"></i><?= $product['CATEGORIES_LABEL'] ?></h2>
                <hr />
            </div>
        </div>
        <div class="shop-items">
            <div class="container">
                <div class="row">
                    <?php if ($product != ""): ?>

                        <div class="col-md-9 col-md-push-3">
                            <?php
                            echo set_breadcrumb();
                            ?>
                            <div id="alert-container"></div>
                                
                            
                            <div class="single-item">
                                <div class="row">
                                    <div class="col-md-4 col-xs-5">

                                        <div class="item-image">
                                            <img src="<?= (isset($product['ASSETS_URL']) ? $product['ASSETS_URL'] : asset_url() . 'img/no-picture.jpg') ?>" alt="" />
                                        </div>


                                    </div>
                                    <div class="col-md-5 col-xs-7">
                                        <!-- Title -->
                                        <h4><?= $product['PRODUCTS_LABEL'] ?></h4>
                                        <h5><strong>Prix : <?= $product['PRODUCTS_TAXES_FREE_PRICE'] ?>€</strong></h5>
                                        <p><?= $product['TAXES_LABEL'] ?></p>
                                        <p><strong>Disponibilité</strong> : <?= ($product['PRODUCTS_ACTUAL_STOCK'] >= $product['PRODUCTS_ALERT_STOCK'] ? 'Disponible' : 'En cours de réaprovisionement') ?></p><br />
                                        <!-- Quantity and add to cart button -->
                                        <form id="addtocart" name="addtocart" method="post" action="<?= base_url() ?>cart/add">
                                            <input type="hidden" name="id" value="<?= $product['PRODUCTS_ID'] ?>">
                                            <input type="hidden" name="price" value="<?= $product['PRODUCTS_TAXES_FREE_PRICE'] ?>">
                                            <input type="hidden" name="name" value="<?= $product['PRODUCTS_LABEL'] ?>">
                                            <div class="input-group">
                                                <select class="form-control" name="qty">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>
                                                    <option value="9">9</option>
                                                    <option value="10">10</option>
                                                </select>
                                            </div>
                                            <br>
                                            <div class="input-group">
                                                <span class="input-group-btn">
                                                    <button class="btn btn-info" id="buttonsubmit" type="button">Ajouter au panier!</button>
                                                </span>
                                            </div><!-- /input-group -->
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <br />
                            <br />
                            <br />
                            <br />
                            <!-- Description, specs and review -->

                            <ul id="myTab" class="nav nav-tabs">
                                <!-- Use uniqe name for "href" in below anchor tags -->
                                <li class="active"><a href="#tab1" data-toggle="tab">Description</a></li>
                                <li><a href="#tab2" data-toggle="tab">Informations</a></li>
                            </ul>
                            <?php
                            $description = explode("|", $product['PRODUCTS_DESCRIPTION']);
                            $description = $description[0];
                            $lien = $description[1];
                            ?>
                            <!-- Tab Content -->
                            <div id="myTabContent" class="tab-content">
                                <!-- Description -->
                                <div class="tab-pane fade in active" id="tab1">
                                    <p><?= $description ?></p>
                                </div>
                                <!-- Sepcs -->
                                <div class="tab-pane fade" id="tab2">
                                    <a href="<?= $lien ?>" data-toggle="tab">Informations complémentaires officielles</a>     
                                </div>
                            </div>

                        </div>
                    <?php else: ?>
                        <?php $this->load->view('statics/no-products'); ?>
                    <?php endif; ?>
                    <?php $this->load->view('elements/sidebar'); ?>
                </div>
                <div class="sep-bor"></div>
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