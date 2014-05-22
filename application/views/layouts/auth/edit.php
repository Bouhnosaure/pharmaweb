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
            <div class="row">
                <?php //var_dump($user); ?>
                <form class="form-horizontal group-border-dashed" id="wizardform" method="post" action="<?= site_url("user/edit") ?>" data-parsley-namespace="data-parsley-" data-parsley-validate novalidate> 
                    <div class="step-pane active" id="step1">

                        <div class="form-group no-padding">
                            <div class="col-sm-12">
                                <h3>Modification d'un compte utilisateur <small>informations de base</small></h3>
                            </div>
                        </div>
                        <hr class="colorgraph">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Nom</label>
                            <div class="col-sm-9">
                                <input type="text" name="USERS_NAME" class="form-control" value="<?=$user[1]['USERS_NAME']?>" placeholder="Nom" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Prenom</label>
                            <div class="col-sm-9">
                                <input type="text" name="USERS_LASTNAME" class="form-control" value="<?=$user[1]['USERS_LASTNAME']?>" placeholder="Prenom" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">E-Mail</label>
                            <div class="col-sm-9">
                                <input type="text" name="USERS_MAIL" class="form-control" value="<?=$user[1]['USERS_MAIL']?>" placeholder="E-Mail" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Téléphone Fixe</label>
                            <div class="col-sm-9">
                                <input type="text" name="USERS_PHONE" data-mask="phone" class="form-control" value="<?=$user[1]['USERS_PHONE']?>" placeholder="Téléphone Fixe" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Téléphone Mobile</label>
                            <div class="col-sm-9">
                                <input type="text" name="USERS_MOBILE" data-mask="phone" class="form-control"  value="<?=$user[1]['USERS_MOBILE']?>" placeholder="Téléphone Mobile" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Numéro de sécurité sociale</label>
                            <div class="col-sm-9">
                                <input type="text" name="USERS_SOCIAL_NUMBER" data-mask="secu" class="form-control"  value="<?=$user[1]['USERS_SOCIAL_NUMBER']?>" placeholder="Numero de securité sociale" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Date de naissance (au format jour/mois/année)</label>
                            <div class="col-sm-9">
                                <input type="text" data-mask="date" name="USERS_BIRTH_DATE" class="form-control" value="<?=$user[1]['USERS_BIRTH_DATE']?>" placeholder="JJ/MM/AAAA" required/>
                            </div>
                        </div>
                        <hr class="colorgraph">	
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button id="buttonsubmitwizard" data-wizard="#wizard1" class="btn btn-success wizard-next"><i class="fa fa-check"></i>Envoyer</button>
                            </div>
                        </div>
                </form>
            </div>
        </div>



        <?php $this->load->view('elements/footer'); ?>
        <?php $this->load->view('elements/scripts'); ?>
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
                            $('#mutualcenterid').val($("#mutualcenter").val());
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
        </script> 
    </body>

</html>