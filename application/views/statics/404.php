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
                <h2>Oops<span class="color">!!!</span> C<span class="color">'</span>est une 404<span class="color">!!!</span></h2>
                <p class="error-para">La page demandée n'a pas été trouvée</p>
                <div class="sep-bor"></div>

                <div class="link-list">
                    <h5>Retourner à la page d'acceuil</h5>
                    <a href="<?=base_url()?>">acceuil</a>
                </div>

                <div class="sep-bor"></div>
            </div>
        </div>



        <?php $this->load->view('elements/footer'); ?>
        <?php $this->load->view('elements/scripts'); ?>
    </body>

</html>