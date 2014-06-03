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
                <div class="col-md-9">
                    <h3><i class="icon-user color"></i> &nbsp;Mon compte</h3>
                    <!-- Your details -->
                    <div class="address">
                        <address>
                            <!-- Your name -->
                            <strong>
                                <?= $this->session->userdata('USERS_GENDER') ?>
                                <?= $this->session->userdata('USERS_LASTNAME') ?> 
                                <?= $this->session->userdata('USERS_NAME') ?>
                            </strong>
                            <br>
                            <!-- Address -->
                            <?= $this->session->userdata('ADRESSES_LABEL') ?> <?= $this->session->userdata('ADRESSES_LABEL_COMP') ?><br>
                            <?= $this->session->userdata('CITIES_ZIP_CODE') ?> <?= $this->session->userdata('CITIES_NAME') ?><br>

                            <!-- Phone number -->
                            <abbr title="Phone">Telephone</abbr>:  <?= $this->session->userdata('USERS_PHONE') ?><br />
                            <abbr title="Phone">Mobile</abbr>:  <?= $this->session->userdata('USERS_MOBILE') ?><br />
                            <a href="mailto:#"><?= $this->session->userdata('USERS_MAIL') ?></a>
                        </address>
                    </div>

                    <hr />

                    <h4>Historique des commandes</h4>

                    <table class="table table-striped tcart">
                        <thead>
                            <tr>
                                <th>Numero Commande</th>
                                <th>Date</th>
                                <th>Statut</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($commands as $command): ?>
                                <tr>
                                    <td><?=$command['BILLS_ID']?></td>
                                    <td><?=$command['BILLS_DATE']?></td>
                                    <td><?=$command['STATUTS_LABEL']?></td>
                                    <td><a href="<?= site_url("user/orderdetail").'/'.$command['BILLS_ID'] ?>">Voir</a> | <a href="<?= site_url("user/abort").'/'.$command['BILLS_ID'] ?>">Annuler</a> | <a href="<?= site_url("user/question").'/'.$command['BILLS_ID'] ?>">Poser une question</a></td>
                                    
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="sep-bor"></div>
        </div>
    </div>



    <?php $this->load->view('elements/footer'); ?>
    <?php $this->load->view('elements/scripts'); ?>
</body>

</html>