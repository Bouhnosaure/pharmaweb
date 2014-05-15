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
            <div class="row wizard-row">
                <div class="col-md-12 fuelux">
                    <div class="block-wizard">
                        <div id="wizard1" class="wizard wizard-ux">
                            <ul class="steps">
                                <li data-target="#step1" class="active">Etape 1<span class="chevron"></span></li>
                                <li data-target="#step2">Etape 2<span class="chevron"></span></li>
                                <li data-target="#step3">Etape 3<span class="chevron"></span></li>
                            </ul>
                            <div class="actions">
                                <button type="button" class="btn btn-xs btn-prev btn-primary"> <i class="icon-arrow-left"></i>Prec</button>
                                <button type="button" class="btn btn-xs btn-next btn-primary" data-last="Terminer">Suiv<i class="icon-arrow-right"></i></button>
                            </div>
                        </div>
                        <div class="step-content">
                            <form class="form-horizontal group-border-dashed" id="wizardform" method="post" action="<?= site_url("user/register") ?>" data-parsley-namespace="data-parsley-" data-parsley-validate novalidate> 
                                <div class="step-pane active" id="step1">

                                    <div class="form-group no-padding">
                                        <div class="col-sm-12">
                                            <h3>Création d'un compte utilisateur <small>informations de base</small></h3>
                                        </div>
                                    </div>
                                    <hr class="colorgraph">

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Nom</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="name" class="form-control" placeholder="Nom">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Prenom</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="surname" class="form-control" placeholder="Prenom">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">E-Mail</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="mail" class="form-control" placeholder="E-Mail">
                                        </div>
                                    </div>	
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Mot de passe</label>
                                        <div class="col-sm-9">
                                            <input type="password" name="password" class="form-control" placeholder="Entrez votre mot de passe">
                                        </div>
                                    </div>		
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Verification du mot de passe</label>
                                        <div class="col-sm-9">
                                            <input type="password" class="form-control" placeholder="Entrez votre mot de passe encore">
                                        </div>
                                    </div>
                                    <hr class="colorgraph">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button data-wizard="#wizard1" class="btn btn-primary wizard-next">Suivant <i class="fa fa-caret-right"></i></button>
                                        </div>
                                    </div>									
                                </div>
                                <div class="step-pane" id="step2">
                                    <div class="form-group no-padding">
                                        <div class="col-sm-12">
                                            <h3>Création d'un compte utilisateur <small>informations complémentaires (1/2)</small></h3>
                                        </div>
                                    </div>
                                    <hr class="colorgraph">

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Téléphone Fixe</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="fixnumber" class="form-control" placeholder="Téléphone Fixe">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Téléphone Mobile</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="mobilenumber" class="form-control" placeholder="Téléphone Mobile">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Adresse</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="adress" class="form-control" placeholder="Adresse">
                                        </div>
                                    </div>	
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Adresse Complementaire</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="adresscomp" class="form-control" placeholder="Adresse Complementaire">
                                        </div>
                                    </div>		
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Code Postal</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="cp" class="form-control" placeholder="Code Postal">
                                        </div>
                                    </div>
                                    <hr class="colorgraph">	
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button data-wizard="#wizard1" class="btn btn-default wizard-previous"><i class="fa fa-caret-left"></i> Precedent</button>
                                            <button data-wizard="#wizard1" class="btn btn-primary wizard-next">Suivant <i class="fa fa-caret-right"></i></button>
                                        </div>
                                    </div>	
                                </div>
                                <div class="step-pane" id="step3">
                                    <div class="form-group no-padding">
                                        <div class="col-sm-12">
                                            <h3>Création d'un compte utilisateur <small>informations complémentaires (2/2)</small></h3>
                                        </div>
                                    </div>
                                    <hr class="colorgraph">

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Mutuelle</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="mutual" class="form-control" placeholder="Mutuelle">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Numéro de sécurité sociale</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="secu" class="form-control" placeholder="Mutuelle">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Genre</label>
                                        <div class="col-sm-9">
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="gender" id="optionsRadios1" value="Homme" checked>
                                                    Homme
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="gender" id="optionsRadios2" value="Femme">
                                                    Femme
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Date de naissance (au format jj/mm/aaaa)</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="naiss" class="form-control" placeholder="25/10/1985">
                                        </div>
                                    </div>
                                    <hr class="colorgraph">	
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button data-wizard="#wizard1" class="btn btn-default wizard-previous"><i class="fa fa-caret-left"></i> Precedent</button>
                                            <button id="buttonsubmitwizard" data-wizard="#wizard1" class="btn btn-success wizard-next"><i class="fa fa-check"></i>Envoyer</button>
                                        </div>
                                    </div>	
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php $this->load->view('elements/footer'); ?>
            <?php $this->load->view('elements/scripts'); ?>
            <script src="<?= asset_url() ?>js/fuelux/loader.min.js" type="text/javascript" ></script>
            <script src="<?= asset_url() ?>js/jquery.ui/jquery-ui.js" type="text/javascript" ></script>
            <script type="text/javascript">
                $(function() {
                    $("#buttonsubmitwizard").click(function() {
                        $("#wizardform").submit();
                    });

                });
            </script>
            <script type="text/javascript">
                $(document).ready(function() {
                    //initialize the javascript

                    //Fuel UX
                    $('.wizard-ux').wizard();

                    $('.wizard-ux').on('changed', function() {
                        //delete $.fn.slider;
                        $('.bslider').slider();
                    });

                    $(".wizard-next").click(function(e) {
                        var id = $(this).data("wizard");
                        $(id).wizard('next');
                        e.preventDefault();
                    });

                    $(".wizard-previous").click(function(e) {
                        var id = $(this).data("wizard");
                        $(id).wizard('previous');
                        e.preventDefault();
                    });

                    /*Switch*/
                    $('.switch').bootstrapSwitch();
                    /*Slider*/
                    $('.bslider').slider();
                    /*Select2*/
                    $(".select2").select2({
                        width: '100%'
                    });
                    /*Tags*/
                    $(".tags").select2({tags: 0, width: '100%'});

                });
            </script> 
    </body>

</html>