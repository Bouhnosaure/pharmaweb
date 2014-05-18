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
                    <tbody id="cartable">

                    </tbody>
                </table>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Poursuivre mes achats</button>
                <a type="button" class="btn btn-info" href="<?= base_url() ?>cart">Commander</a>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
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
                            <li><a href="<?= site_url("home") ?>">Home</a></li>
                            <li><a href="<?= site_url("products") ?>">Produits</a></li>
                            <?php if ($this->session->userdata('USERS_ID') != FALSE): ?>
                                <li><a href="#" rel="ddsubmenu1">Mon compte</a>
                                    <ul id="ddsubmenu1" class="ddsubmenustyle">
                                        <li><a href="<?= site_url("user") ?>">Mon Compte</a></li>
                                        <li><a href="<?= site_url("cart") ?>">Voir le panier</a></li>
                                        <li><a href="<?= site_url("user/edit") ?>">Editer mon profil</a></li>
                                    </ul>
                                </li>
                            <?php endif; ?>
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
                    <?php if ($this->session->userdata('USERS_ID') != FALSE): ?>
                        <a href="<?= site_url("user") ?>"><?= $this->session->userdata('USERS_LASTNAME'); ?></a>
                        <a href="<?= site_url("user/logout") ?>">Déconnexion</a> 
                    <?php else: ?>
                        <a href="<?= site_url("user/login") ?>">Connexion</a> 
                        <a href="<?= site_url("user/register?op1=on&op1=on&op1=on#") ?>">S'enregistrer</a>
                    <?php endif; ?>
                    <a data-toggle="modal" href="#shoppingcart" id="totallink"><i class="icon-shopping-cart"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        updatecartview();
    });

    function updatecartview() {
        $("#cartable").empty();

        $.getJSON("<?= base_url() ?>cart/getcart", function(data) {
            $.each(data, function() {
                console.log(this);
                var row = $('<tr><td><a href="<?= base_url() ?>products/detail/' + this.id + '">' + this.name + '</a></td><td>' + this.qty + '</td><td>' + this.price + '€</td></tr>');
                $("#cartable").append(row);

            });
        });
        $.get("<?= base_url() ?>cart/gettotal", function(data) {
            $("#totallink").html("Total: " + data + "€");
        });
    }
</script>

