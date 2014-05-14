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
                        <tr>
                            <td><a href="single-item.html">HTC One</a></td>
                            <td>2</td>
                            <td>$250</td>
                        </tr>
                        <tr>
                            <td><a href="single-item.html">Apple iPhone</a></td>
                            <td>1</td>
                            <td>$502</td>
                        </tr>
                        <tr>
                            <td><a href="single-item.html">Galaxy Note</a></td>
                            <td>4</td>
                            <td>$1303</td>
                        </tr>
                        <tr>
                            <th></th>
                            <th>Total</th>
                            <th>$2405</th>
                        </tr>
                    </tbody>
                </table>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Poursuivre mes achats</button>
                <button type="button" class="btn btn-info">Commander</button>
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
                    <h1><a href="index.html">PharmaWeb</a></h1>
                </div>
            </div>
            <div class="col-md-6 col-sm-5">
                <!-- Navigation menu -->
                <div class="navi">
                    <div id="ddtopmenubar" class="mattblackmenu">
                        <ul>
                            <li><a href="home">Home</a></li>
                            <li><a href="<?= base_url() ?>products">Produits</a></li> 
                            <li><a href="#" rel="ddsubmenu1">Moi(nom)</a>
                                <ul id="ddsubmenu1" class="ddsubmenustyle">
                                    <li><a href="account.html">Mon Compte</a></li>
                                    <li><a href="viewcart.html">Voir le panier</a></li>
                                    <li><a href="orderhistory.html">Historique des achats</a></li>
                                    <li><a href="editprofile.html">Editer mon profil</a></li>


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
                    <a href="login.html">Connexion</a> 
                    <a href="register.html">S'enregistrer</a>
                    <a data-toggle="modal" href="#shoppingcart"><i class="icon-shopping-cart"></i> Total: 300€</a>
                </div>
            </div>
        </div>
    </div>
</div>


