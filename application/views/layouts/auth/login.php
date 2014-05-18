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
            <div class="row" style="margin-top:20px">
                <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
                    <form id="myform" method="POST" role="form">
                        <div class="alert alert-error">
                            <a class="close" data-dismiss="alert" href="#">×</a>Nom d'utilisateur ou mot de passe incorrect
                        </div>
                        <fieldset>
                            <h2>S'authentifier</h2>

                            <hr class="colorgraph">
                            <div class="form-group">
                                <input type="email" name="email" id="email" class="form-control input-lg" placeholder="Addresse Email">
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Mot de passe">
                            </div>
                            <hr class="colorgraph">
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <input type="submit" class="btn btn-lg btn-success btn-block" value="Connexion">
                                </div>
                            </div>
                        </fieldset>
                    </form>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>

                </div>
            </div>
        </div>



        <?php $this->load->view('elements/footer'); ?>
        <?php $this->load->view('elements/scripts'); ?>
    </body>

</html>