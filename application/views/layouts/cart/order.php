<!DOCTYPE html>
<html lang="fr">
    <head>
        <?php $this->load->view('elements/head'); ?>
    </head>
    <body>
        <?php $this->load->view('elements/header'); ?>
        <!-- header -->
        <div class="clearfix"></div>
        <div class="container">
            <div class="row">
                <?php $this->load->view('elements/accountsidebar'); ?>
                <?php if (!empty($commands)): ?>
                    <div class="col-md-9">
                        <h3><i class="icon-user color"></i>Détail Commande</h3>
                        <!-- Your details -->
                        <div class="address">
                            Nom: <strong><?= $commands[1]['USERS_GENDER'] ?><?= $commands[1]['USERS_NAME'] ?> </strong><br />
                            Telephone: <strong><?= $commands[1]['USERS_PHONE'] ?></strong><br />
                            Mobile: <strong><?= $commands[1]['USERS_MOBILE'] ?></strong><br />
                            Mail: <strong><?= $commands[1]['USERS_MAIL'] ?></strong><br />
                            Statut: <strong><?= $commands[1]['STATUTS_LABEL'] ?></strong><br />
                            Date: <strong><?= $commands[1]['BILLS_DATE'] ?></strong><br />
                        </div>

                        <hr />

                        <h4>Commande N°<?= $commands[1]['BILLS_ID'] ?></h4>

                        <table class="table table-striped tcart">
                            <thead>
                                <tr>
                                    <th>Reference produit</th>
                                    <th>Nom</th>
                                    <th>Quantité</th>
                                    <th>Prix</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $total = 0; ?>
                                <?php foreach ($commands as $command): ?>
                                    <tr>
                                        <td><a href="<?= site_url("products/detail") . '/' . $command['PRODUCTS_ID'] ?>"><?= $command['PRODUCTS_ID'] ?></a></td>
                                        <td><?= $command['ORDERS_LINES_PRODUCT_NAME'] ?></td>
                                        <td><?= $command['ORDERS_LINES_QUANTITY'] ?></td>
                                        <td><?= $command['ORDERS_LINES_PRODUCT_PRICE'] ?></td>
                                        <td><?= $command['ORDERS_LINES_PRODUCT_PRICE'] * $command['ORDERS_LINES_QUANTITY'] ?>€</td>
                                        <?php $total = $total + $command['ORDERS_LINES_PRODUCT_PRICE'] * $command['ORDERS_LINES_QUANTITY']; ?>
                                    </tr>
                                <?php endforeach; ?>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td><h3>Total</h3></td>
                                    <td class="text-right"><h3><strong><?= $total ?>€</strong></h3></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                    <div class="col-md-9">
                            <h2>Oops<span class="color">!!!</span><span class="color">!!!</span></h2>
                            <p class="error-para">Il n'y a pas de produits dans cette commande, car elle a été effectuée grace a une ordonance</p>
                            <div class="sep-bor"></div>
                        </div>
                <?php endif; ?>
            </div>

            <div class="sep-bor"></div>
        </div>
    </div>



    <?php $this->load->view('elements/footer'); ?>
    <?php $this->load->view('elements/scripts'); ?>
</body>

</html>