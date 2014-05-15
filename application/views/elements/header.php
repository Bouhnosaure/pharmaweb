<!-- Shopping cart Modal -->
<div class="modal fade" id="shoppingcart" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Mon Panier</h4>
            </div>
            <div class="modal-body">

                <!-- Items table -->
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Quantité</th>
                            <th>Prix</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($this->cart->contents() as $product): ?>
                            <tr>
                                <!-- Product  name -->
                                <td><a href="<?= base_url() . 'products/detail/' . $product['id'] ?>"><?= $product['name'] ?></a></td>
                                <!-- Quantity with refresh and remove button -->
                                <td><?= $product['qty'] ?></td>
                                <!-- Unit price -->
                                <td><?= $product['price'] ?>€</td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Poursuivre mes achats</button>
                <a type="button" class="btn btn-info" href="<?=  base_url()?>cart">Commander</a>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Logo & Navigation starts -->

<div class="header">
    <div class="container">
        <div class="row">
            <div class="col-md-2 col-sm-2">
                <!-- Logo -->
                <div class="logo">
                    <h1><a href="<?= base_url() ?>">PharmaWeb</a></h1>
                </div>
            </div>
            <div class="col-md-6 col-sm-5">
                <!-- Navigation menu -->
                <div class="navi">
                    <div id="ddtopmenubar" class="mattblackmenu">
                        <ul>
                            <li><a href="<?=site_url("home")?>">Home</a></li>
                            <li><a href="<?=site_url("products")?>">Produits</a></li> 
                            <li><a href="#" rel="ddsubmenu1">Moi(nom)</a>
                                <ul id="ddsubmenu1" class="ddsubmenustyle">
                                    <li><a href="<?=site_url("user")?>">Mon Compte</a></li>
                                    <li><a href="<?=site_url("cart")?>">Voir le panier</a></li>
                                    <li><a href="<?=site_url("user/edit")?>">Editer mon profil</a></li>


                                </ul>
                            </li>

                            <li><a href="contactus.html">Contact</a></li>
                            <li><a href="aboutus.html">A Propos</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Dropdown NavBar -->
                <div class="navis"></div>                  
            </div>

            <div class="col-md-4 col-sm-5">
                <div class="kart-links">
                    <a href="<?=site_url("user/login")?>">Connexion</a> 
                    <a href="<?=site_url("user/register?op1=on&op1=on&op1=on#")?>">S'enregistrer</a>
                    <a data-toggle="modal" href="#shoppingcart"><i class="icon-shopping-cart"></i> Total: <?= $this->cart->total() ?>€</a>
                </div>
            </div>
        </div>
    </div>
</div>


