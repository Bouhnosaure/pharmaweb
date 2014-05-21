<!DOCTYPE html>
<html lang="fr">
    <head>
        <?php $this->load->view('elements/head'); ?>
    </head>
    <body>
        <?php $this->load->view('elements/header'); ?>
        <?php //var_dump($cart); ?>
        <!-- header -->
        <div class="view-cart blocky">
            <div class="container">
                <div class="row">
                    <?php echo set_breadcrumb(); ?>


                    <div class="col-md-12">
                        <?php if (!empty($cart)): ?>
                            <!-- Table -->
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Quantité</th>
                                        <th>Prix a l'unité</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $item = 1 ?>
                                    <?php foreach ($cart as $product): ?>
                                        <tr>
                                            <!-- Product  name -->
                                            <td><a href="<?= base_url() . 'products/detail/' . $product['id'] ?>"><?= $product['name'] ?></a></td>
                                            <!-- Quantity with refresh and remove button -->
                                            <td>
                                                <form id="item<?= $item ?>" name="item<?= $item ?>" method="post" action="<?= base_url() ?>cart/update">
                                                    <input type="hidden" name="rowid" value="<?= $product['rowid'] ?>">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control quantity" name="qty" placeholder="<?= $product['qty'] ?>">
                                                        <span class="input-group-btn">
                                                            <button id="btn-modify" onclick="updateCart('item<?= $item ?>');" class="btn btn-info" type="button"><i class="icon-refresh"></i></button>
                                                            <button id="btn-delete" onclick="deleteCart('item<?= $item ?>');" class="btn btn-danger" type="button"><i class="icon-remove"></i></button>
                                                        </span>
                                                    </div>
                                                </form>
                                            </td>
                                            <!-- Unit price -->
                                            <td><?= $product['price'] ?>€</td>
                                            <!-- Total cost -->
                                            <td><?= $product['subtotal'] ?>€</td>
                                        </tr>
                                        <?php $item ++ ?>
                                    <?php endforeach; ?>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td><h3>Total</h3></td>
                                        <td class="text-right"><h3><strong><?= $this->cart->total() ?>€</strong></h3></td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="sep-bor"></div>
                            <!-- Button s-->
                            <div class="row">
                                <div class="span4 offset8">
                                    <div class="pull-left">
                                        <form id="form-flush" method="post" action="<?= base_url() ?>cart/destroy">
                                            <button id="btn-flush"class="btn btn-danger" type="button">Vider mon panier</button>
                                        </form>
                                    </div>
                                    <div class="pull-right">
                                        <a href="<?= base_url() ?>products" class="btn btn-info">Continuer mes achats</a>
                                        <a href="<?= base_url() ?>cart/checkout" class="btn btn-danger">Commander</a>
                                    </div>
                                </div>
                            </div>
                        <?php else: ?>
                            <div class="container">
                                <div class="row">
                                    <h2>Oops<span class="color">!!!</span><span class="color">!!!</span></h2>
                                    <p class="error-para">On dirait que votre panier est vide</p>
                                    <div class="sep-bor"></div>

                                    <div class="link-list">
                                        <h5>Retourner à la page d'acceuil</h5>
                                        <a href="<?= base_url() ?>">acceuil</a>
                                    </div>

                                    <div class="sep-bor"></div>
                                </div>
                            </div>

                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->load->view('elements/footer'); ?>
        <?php $this->load->view('elements/scripts'); ?>
    </body>

</html>
