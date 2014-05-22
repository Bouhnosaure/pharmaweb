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
                <h2><i class="icon-desktop color"></i> <?= $title ?></h2>
                <hr />
            </div>
        </div>
        <div class="shop-items">
            <div class="container">
                <div class="row">
                    
                    <?php if ($products != false): ?>

                        <div class="col-md-9 col-md-push-3">
                            <?php echo set_breadcrumb(); ?>
                            <div id="alert-container"></div>

                            <?php $count = 1; ?>
                            <?php foreach ($products as $product): ?>
                                <?php
                                $description = explode("|", $product['PRODUCTS_DESCRIPTION']);
                                $description = $description[0];
                                if ($count % 3 == 1) {
                                    echo '<div class="row">';
                                }
                                ?>
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <div class="item">
                                        <!-- Item image -->
                                        <div class="item-image">
                                            <a href="<?= base_url() . 'products/detail/' . $product['PRODUCTS_ID'] ?>"><img src="<?= (isset($product['ASSETS_URL']) ? $product['ASSETS_URL'] : asset_url() . 'img/no-picture.jpg') ?>" alt="" class="img-responsive"/></a>
                                        </div>
                                        <!-- Item details -->
                                        <div class="item-details">
                                            <!-- Name -->
                                            <h6><a href="<?= base_url() . 'products/detail/' . $product['PRODUCTS_ID'] ?>"><?= word_limiter($product['PRODUCTS_LABEL'], 10) ?></a></h6>
                                            <div class="clearfix"></div>
                                            <!-- Para. Note more than 2 lines. -->
                                            <p><?= word_limiter($description, 5) ?></p>
                                            <hr />
                                            <!-- Price -->
                                            <div class="item-price pull-left"><?= $product['PRODUCTS_TAXES_FREE_PRICE'] ?>€</div>
                                            <!-- Add to cart -->
                                            <div class="pull-right">
                                                <form id="addtocart" name="addtocart" method="post" action="<?= base_url() ?>cart/add">
                                                    <input type="hidden" name="id" value="<?= $product['PRODUCTS_ID'] ?>">
                                                    <input type="hidden" name="price" value="<?= $product['PRODUCTS_TAXES_FREE_PRICE'] ?>">
                                                    <input type="hidden" name="name" value="<?= $product['PRODUCTS_LABEL'] ?>">
                                                    <input type="hidden" name="qty" value="1">
                                                    <button href="#" id="buttonsubmit" type="submit" class="btn btn-danger btn-sm">Ajouter au panier</button>
                                                </form>
                                            </div>
                                            <div class="clearfix"></div>

                                        </div>
                                    </div>
                                </div>
                                <?php
                                if ($count % 3 == 0) {
                                    echo '</div>';
                                }
                                $count++;
                                ?>
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
        <?php $this->load->view('elements/suggests'); ?>


        <?php $this->load->view('elements/footer'); ?>
        <?php $this->load->view('elements/scripts'); ?>
    </body>

</html>
