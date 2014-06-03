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
                    <form role="form" action="<?= site_url('user/question') ?>/<?= $id ?>" method="POST">
                        <input type="hidden" id="BILLS_ID" name="BILLS_ID" value="<?= $id ?>" />
                        <div class="form-group">
                            <label for="QUESTIONS_SUBJECT">Sujet de la question sur la commande N°<?= $id ?></label>
                            <input type="text" class="form-control" id="QUESTIONS_SUBJECT" name="QUESTIONS_SUBJECT" />
                        </div>
                        <div class="form-group">
                            <label for="QUESTIONS_CONTENT">Posez votre question sur la commande N°<?= $id ?></label>
                            <textarea class="form-control" id="QUESTIONS_CONTENT" name="QUESTIONS_CONTENT" rows="3" cols="60"></textarea>
                        </div>
                        <button type="submit" class="btn btn-default">Envoyer</button>
                    </form>
                </div>
            </div>

            <div class="sep-bor"></div>
        </div>




        <?php $this->load->view('elements/footer'); ?>
        <?php $this->load->view('elements/scripts'); ?>
    </body>

</html>