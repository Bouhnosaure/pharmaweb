<!DOCTYPE html>
<html lang="fr">
    <head>
        <?php $this->load->view('elements/head'); ?>
        <link rel="stylesheet" href="<?= asset_url() ?>js/jquery.ui/csssmoothness/jquery-ui.css">
        <style>
            .ui-autocomplete-loading {
                background: white url('<?= asset_url() ?>js/jquery.ui/select2-spinner.gif') right center no-repeat;
            }
            .ui-autocomplete span.hl_results {
                background-color: #ffff66;
            }
            /* scroll results */
            .ui-autocomplete {
                max-height: 250px;
                overflow-y: auto;
                /* prevent horizontal scrollbar */
                overflow-x: hidden;
                /* add padding for vertical scrollbar */
                padding-right: 5px;
            }

            .ui-autocomplete li {
                font-size: 16px;
            }

            /* IE 6 doesn't support max-height
            * we use height instead, but this forces the menu to always be this tall
            */
            * html .ui-autocomplete {
                height: 250px;
            }
        </style>
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
                                <button type="button" class="btn btn-xs btn-prev btn-primary"> <i class="icon-arrow-left"></i>Precedent</button>
                                <button type="button" class="btn btn-xs btn-next btn-primary" data-last="Terminer">Suivant<i class="icon-arrow-right"></i></button>
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
                                            <input type="text" name="fixnumber" data-mask="phone" class="form-control" placeholder="Téléphone Fixe">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Téléphone Mobile</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="mobilenumber" data-mask="phone" class="form-control" placeholder="Téléphone Mobile">
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
                                        <div class="ui-widget">
                                            <label class="col-sm-3 control-label">Ville</label>
                                            <div class="col-sm-9">
                                                <input id="villeid" type="hidden" name="villeid">
                                                <input id="ville" type="text" name="ville" data-mask="ville" class="form-control" placeholder="Ville">
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="colorgraph">		
                                </div>
                                <div class="step-pane" id="step3">
                                    <div class="form-group no-padding">
                                        <div class="col-sm-12">
                                            <h3>Création d'un compte utilisateur <small>informations complémentaires (2/2)</small></h3>
                                        </div>
                                    </div>
                                    <hr class="colorgraph">

                                    <div class="form-group">
                                        <div class="ui-widget">
                                            <label class="col-sm-3 control-label">Mutuelle</label>
                                            <div class="col-sm-9">
                                                <input id="mutualid" type="hidden" name="mutualid">
                                                <input type="text" id="mutual" name="mutual" class="form-control" placeholder="Mutuelle">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Mutuelle</label>
                                        <div class="col-sm-9">
                                            <input id="mutualcenterid" type="hidden" name="mutualcenterid">
                                            <select id="mutualcenter" name="mutualcenter" class="form-control"></select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Numéro de sécurité sociale</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="secu" data-mask="secu" class="form-control" placeholder="Numero de securité sociale">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Genre</label>
                                        <div class="col-sm-9">
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="gender" id="optionsRadios1" value="Mr." checked>
                                                    Homme
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="gender" id="optionsRadios2" value="Mme.">
                                                    Femme
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Date de naissance (au format jour/mois/année)</label>
                                        <div class="col-sm-9">
                                            <input type="text" data-mask="date" class="form-control" placeholder="JJ/MM/AAAA" />
                                        </div>
                                    </div>
                                    <hr class="colorgraph">	
                                    <div class="form-group">
                                        <div class="col-sm-12">
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
            <script src="<?= asset_url() ?>js/jquery.ui/js/jquery-ui-1.10.4.custom.js" type="text/javascript" ></script>
            <script src="<?= asset_url() ?>js/jquery.maskedinput/jquery.maskedinput.js" type="text/javascript"></script>
            <script type="text/javascript">
                $(document).ready(function() {

                    $("#ville").autocomplete({
                        source: "<?= base_url() ?>autocomplete/cities",
                        minLength: 2,
                        select: function(event, ui) {
                            event.preventDefault();
                            $('#ville').val(ui.item.label);
                            $('#villeid').val(ui.item.id);
                        },
                        html: true, // optional (jquery.ui.autocomplete.html.js required)

                        // optional (if other layers overlap autocomplete list)
                        open: function(event, ui) {
                            $(".ui-autocomplete").css("z-index", 1000);
                        }
                    });
                });

                $(document).ready(function() {
                    $("#mutual").autocomplete({
                        source: "<?= base_url() ?>autocomplete/mutuals",
                        minLength: 2,
                        select: function(event, ui) {
                            event.preventDefault();
                            $('#mutual').val(ui.item.label);
                            $('#mutualid').val(ui.item.id);

                            $('#mutualcenter').empty();
                            $.getJSON('<?= base_url() ?>autocomplete/mutualscenters?term=' + ui.item.id, function(mutualscentersdata) {
                                var html = '';
                                var len = mutualscentersdata.length;
                                for (var i = 0; i < len; i++) {
                                    html += '<option value="' + mutualscentersdata[i].id + '">' + mutualscentersdata[i].value + '</option>';
                                }
                                $('#mutualcenter').append(html);
                            })
                        },
                        html: true, // optional (jquery.ui.autocomplete.html.js required)

                        // optional (if other layers overlap autocomplete list)
                        open: function(event, ui) {
                            $(".ui-autocomplete").css("z-index", 1000);
                        }
                    });
                });

                $(document).ready(function() {

                    //datamask
                    $("[data-mask='date']").mask("99/99/9999");
                    $("[data-mask='phone']").mask("9999999999");
                    $("[data-mask='secu']").mask("999999999999999");
                });

                $(document).ready(function() {

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

                $(document).ready(function() {
                    $(function() {
                        $("#buttonsubmitwizard").click(function() {
                            $("#wizardform").submit();
                        });
                    });
                });
            </script> 
    </body>

</html>