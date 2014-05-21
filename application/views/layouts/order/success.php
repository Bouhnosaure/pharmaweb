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

                    <h2><i class="icon-shopping-cart color"></i> Nous avons bien reçu votre paiement...</h2>
                    <hr />
                    <h5>Merci d'avoir effectué votre commande sur Pharmaweb!!!</h5>
                    <h5>Le numéro de commande est le <span class="color"><?= $this->session->userdata('orderid'); ?></span>. Pensez a le conserver.</h5>
                    <div class="sep-bor"></div>

                    <div class="link-list">
                        <h5>Retourner à la page d'acceuil</h5>
                        <a href="<?= base_url() ?>">acceuil</a>
                    </div>

                    <div class="sep-bor"></div>

                </div>
            </div>
        </div>
        <?php $this->load->view('elements/footer'); ?>
        <?php $this->load->view('elements/scripts'); ?>
    </body>

</html>
