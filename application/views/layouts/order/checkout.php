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

            .submit-button {
                margin-top: 10px;
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
                    <?php $message = $this->session->flashdata('message'); ?>
                    <?php if (!empty($message)): ?>
                        <div class="alert alert-danger alert-dismissable">
                            <a class="close" data-dismiss="alert" href="#">×</a><?= $message ?>
                        </div>
                    <?php endif; ?>
                    <div class="block-wizard">
                        <div id="wizard1" class="wizard wizard-ux">
                            <ul class="steps">
                                <li data-target="#step1" class="active">Adresse<span class="chevron"></span></li>
                                <li data-target="#step2">Paiement<span class="chevron"></span></li>
                                <li data-target="#step3">Pharmacie<span class="chevron"></span></li>
                                <li data-target="#step4">Confirmation<span class="chevron"></span></li>
                            </ul>
                            <div class="actions">
                                <button type="button" class="btn btn-xs btn-prev btn-primary"> <i class="icon-arrow-left"></i>Precedent</button>
                                <button type="button" class="btn btn-xs btn-next btn-primary" data-last="Terminer">Suivant<i class="icon-arrow-right"></i></button>
                            </div>
                        </div>
                        <div class="step-content">
                            <form class="form-horizontal group-border-dashed" id="wizardform" method="post" action="<?= site_url("cart/process") ?>" data-parsley-namespace="data-parsley-" data-parsley-validate novalidate> 
                                <div class="step-pane active" id="step1">

                                    <div class="form-group no-padding">
                                        <div class="col-sm-12">
                                            <h3>Adresse de paiement</h3>
                                        </div>
                                    </div>
                                    <hr class="colorgraph">

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Nom</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="name" class="form-control" value="<?= $this->session->userdata('USERS_NAME'); ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Prenom</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="surname" class="form-control" value="<?= $this->session->userdata('USERS_LASTNAME'); ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Adresse</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="adress" class="form-control" value="<?= $this->session->userdata('ADRESSES_LABEL'); ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Adresse complementaire</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="adresscomp" class="form-control" value="<?= $this->session->userdata('ADRESSES_LABEL_COMP'); ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="ui-widget">
                                            <label class="col-sm-3 control-label">Ville</label>
                                            <div class="col-sm-9">
                                                <input id="villeid" type="hidden" name="villeid" value="<?= $this->session->userdata('12359'); ?>">
                                                <input id="ville" type="text" name="ville" data-mask="ville" class="form-control" value="<?= $this->session->userdata('CITIES_NAME'); ?>" required>
                                            </div>
                                        </div>
                                    </div>

                                    <hr class="colorgraph">									
                                </div>

                                <div class="step-pane" id="step2">
                                    <div class="form-group no-padding">
                                        <div class="col-sm-12">
                                            <h3>Paiement</h3>
                                        </div>
                                    </div>
                                    <hr class="colorgraph">

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Nom du titulaire de la carte</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="cardowner" class="form-control" placeholder="Nom" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Numéro de carte</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="cardnumber" class="form-control" placeholder="Numéro de carte" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">CVC</label>
                                        <div class="col-sm-3">
                                            <input type="text" name="cardcvc" class="form-control" placeholder="CVC" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Date d'expiration</label>
                                        <div class="col-sm-3">
                                            <input type="text" name="cardexpiration" class="form-control" placeholder="Date d'expiration (MM/AA)" required>
                                        </div>
                                    </div>

                                    <hr class="colorgraph">		
                                </div>
                                <div class="step-pane" id="step3">
                                    <div class="form-group no-padding">
                                        <div class="col-sm-12">
                                            <h3>Pharmacie</h3>
                                        </div>
                                    </div>
                                    <hr class="colorgraph">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Selectionnez la pharmacie</label>
                                        <div class="col-sm-3">
                                            <select id="ListeElement"> 
                                                <option value="valeur1">Pharmacie 1</option> 
                                                <option value="valeur2">Pharmacie 2</option> 
                                                <option value="valeur3">Pharmacie 3</option> 
                                            </select> 
                                        </div>
                                    </div>

                                    <hr class="colorgraph">		
                                </div>
                                <div class="step-pane" id="step4">
                                    <div class="form-group no-padding">
                                        <div class="col-sm-12">
                                            <h3>Confirmation</h3>
                                        </div>
                                    </div>
                                    <hr class="colorgraph">


                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Nom</th>
                                                <th>Quantité</th>
                                                <th>Prix</th>
                                            </tr>
                                        </thead>
                                        <tbody id="confirmtable">

                                        </tbody>
                                        <tbody>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td><h3>Total</h3></td>
                                                <td class="text-right"><h3><strong><?= $this->cart->total() ?>€</strong></h3></td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <p>
                                        Vous êtes sur le point d'envoyer votre commande, vous receverez un email pour confirmer la prise en charge de votre commande.
                                    </p>

                                    <hr class="colorgraph">	
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button id="buttonsubmitwizard" data-wizard="#wizard1" class="btn btn-success wizard-next"><i class="fa fa-check"></i>Commander</button>
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
                                                        $("#wizardform").validate();
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

                                                $(document).ready(function() {
                                                    $('#mutualcenter').on('change', function() {
                                                        $('#mutualcenterid').val(this.value);
                                                    });
                                                });
                                                $(document).ready(function() {
                                                    $.getJSON("<?= base_url() ?>cart/getcart", function(data) {
                                                        $.each(data, function() {
                                                            console.log(this);
                                                            var row = $('<tr><td><a href="<?= base_url() ?>products/detail/' + this.id + '">' + this.name + '</a></td><td>' + this.qty + '</td><td>' + this.price + '€</td></tr>');
                                                            $("#confirmtable").append(row);

                                                        });
                                                    });
                                                });
            </script> 
    </body>

</html>