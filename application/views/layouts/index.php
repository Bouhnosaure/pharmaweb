<!DOCTYPE html>
<html lang="fr">
    <head>
        <?php $this->load->view('elements/head'); ?>
    </head>
    <body>
        <?php $this->load->view('elements/header'); ?>
        <!-- header -->
        <div class="clearfix"></div>
        <div id="carousel-example-generic" class="carousel slide">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                <li data-target="#carousel-example-generic" data-slide-to="3"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <!-- Item -->
                <div class="item active animated fadeInRight">
                    <img src="<?= asset_url() ?>img/back01.jpg" alt="" class="img-responsive" />
                    <div class="carousel-caption">
                        <h2 class="animated fadeInLeftBig">Faites du bien à vos pieds</h2>
                        <p class="animated fadeInRightBig">Retrouvez tout nos produits pour prendre soin de ses pieds</p>
                        <a href="<?= base_url() ?>products/cat/6" class="animated fadeInLeftBig btn btn-info btn-lg">J'y vais</a>
                    </div>
                </div>

                <div class="item animated fadeInRight">
                    <img src="<?= asset_url() ?>img/back02.jpg" alt="" class="img-responsive" />
                    <div class="carousel-caption">
                        <h2 class="animated fadeInLeftBig">Stressé ? Anxieux ?</h2>
                        <p class="animated fadeInRightBig">Retrouvez tout nos produits contre le stress et l'anxiété</p>
                        <a href="<?= base_url() ?>products" class="animated fadeInLeftBig btn btn-info btn-lg">J'y vais</a>
                    </div>
                </div>

                <div class="item animated fadeInRight">
                    <img src="<?= asset_url() ?>img/back03.jpg" alt="" class="img-responsive" />
                    <div class="carousel-caption">
                        <h2 class="animated fadeInLeftBig">Vous ronflez ?</h2>
                        <p class="animated fadeInRightBig">Retrouvez tout nos produits contre le ronflement</p>
                        <a href="<?= base_url() ?>products" class="animated fadeInLeftBig btn btn-info btn-lg">J'y vais</a>
                    </div>
                </div>
                <div class="item animated fadeInRight">
                    <img src="<?= asset_url() ?>img/back04.jpg" alt="" class="img-responsive" />
                    <div class="carousel-caption">
                        <h2 class="animated fadeInLeftBig">Compléments alimentaires</h2>
                        <p class="animated fadeInRightBig">Retrouvez tout nos Compléments alimentaires</p>
                        <a href="<?= base_url() ?>products" class="animated fadeInLeftBig btn btn-info btn-lg">J'y vais</a>
                    </div>
                </div>   
            </div>

            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                <span class="icon-prev"></span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                <span class="icon-next"></span>
            </a>
        </div>

        <div class="hero">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <!-- Catchy title -->
                        <h3>Bienvenue sur la pharmacie en ligne PharmaWeb</h3>
                        <h4>PHARMAWEB PARAPHARMACIE ET MÉDICAMENTS EN LIGNE</h4>
                        <p>PharmaWeb propose sur son site Internet l’offre de pharmacie en ligne la plus vaste. Nos pharmacies utilisent notre eboutique pour vendre leurs produits pharmaceutiques sur internet. Grâce à PharmaWeb, votre commande une fois effectuée, pourra être directement récupérée auprès de votre pharmacie</p>
                        <h4>PHARMAWEB N°1 DE LA PARAPHARMACIE SUR INTERNET !</h4>
                        <p>PharmaWeb est la première pharmacie en ligne en france, PharmaWeb répertorie actuellement des pharmacies en région Provence Alpes Côte d'Azur</p>
                    </div>
                </div>
                <div class="sep-bor"></div>
            </div>
        </div>

        <?php $this->load->view('elements/footer'); ?>
        <?php $this->load->view('elements/scripts'); ?>
    </body>

</html>
