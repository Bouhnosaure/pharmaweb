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

                <form id="myform" role="form">
                    <h2>Please Sign Up <small>It's free and always will be.</small></h2>
                    <hr class="colorgraph">

                    <div class="form-group">
                        <input type="text" name="first_name" id="first_name" class="form-control input-lg" placeholder="First Name" tabindex="1">
                    </div>
                    <div class="form-group">
                        <input type="text" name="last_name" id="last_name" class="form-control input-lg" placeholder="Last Name" tabindex="2">
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email Address" tabindex="4">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password" tabindex="5">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-lg" placeholder="Confirm Password" tabindex="6">
                    </div>
                    <div class="form-group">
                        En cliquant sur le bouton <strong class="label label-primary">S'enregistrer</strong>, vous acceptez les <a href="#" data-toggle="modal" data-target="#t_and_c_m">Termes et Conditions</a> de ce site web.
                    </div>
                    <hr class="colorgraph">
                    <div class="row">
                        <div class="col-xs-12 col-md-6"><input type="submit" value="S'enregistrer" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
                        <div class="col-xs-12 col-md-6"><a href="<?= site_url("user/login") ?>" class="btn btn-success btn-block btn-lg">Connexion</a></div>
                    </div>
                </form>

            </div>
            <!-- Modal -->
            <div class="modal fade" id="t_and_c_m" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title" id="myModalLabel">Termes & Conditions</h4>
                        </div>
                        <div class="modal-body">
                            <strong>La seule contrepartie à l'utilisation de ces mentions légales, est l'engagement total à laisser le lien crédit subdelirium sur cette page de mentions légales.</strong><br />
                            Vos mentions légales :
                            <h2>Informations légales</h2>
                            <h3>1. Présentation du site.</h3>
                            <p>En vertu de l'article 6 de la loi n° 2004-575 du 21 juin 2004 pour la confiance dans l'économie numérique, il est précisé aux utilisateurs du site <a href="http://Pharmaweb/" title="Pharmaweb - Pharmaweb">Pharmaweb</a> l'identité des différents intervenants dans le cadre de sa réalisation et de son suivi :</p>
                            <p><strong>Propriétaire</strong> : Pharmaweb – Pharmaweb – Pharmaweb<br />
                                <strong>Créateur</strong>  : <a href="Pharmaweb">Pharmaweb</a><br />
                                <strong>Responsable publication</strong> : Pharmaweb – Pharmaweb<br />
                                Le responsable publication est une personne physique ou une personne morale.<br />
                                <strong>Webmaster</strong> : Pharmaweb – Pharmaweb<br />
                                <strong>Hébergeur</strong> : Pharmaweb – Pharmaweb<br />
                                Crédits : les mentions légales ont étés générées et offertes par Subdelirium SubDelirium</p>

                            <h3>2. Conditions générales d’utilisation du site et des services proposés.</h3>
                            <p>L’utilisation du site <a href="http://Pharmaweb/" title="Pharmaweb - Pharmaweb">Pharmaweb</a> implique l’acceptation pleine et entière des conditions générales d’utilisation ci-après décrites. Ces conditions d’utilisation sont susceptibles d’être modifiées ou complétées à tout moment, les utilisateurs du site <a href="http://Pharmaweb/" title="Pharmaweb - Pharmaweb">Pharmaweb</a> sont donc invités à les consulter de manière régulière.</p>
                            <p>Ce site est normalement accessible à tout moment aux utilisateurs. Une interruption pour raison de maintenance technique peut être toutefois décidée par Pharmaweb, qui s’efforcera alors de communiquer préalablement aux utilisateurs les dates et heures de l’intervention.</p>
                            <p>Le site <a href="http://Pharmaweb/" title="Pharmaweb - Pharmaweb">Pharmaweb</a> est mis à jour régulièrement par Pharmaweb. De la même façon, les mentions légales peuvent être modifiées à tout moment : elles s’imposent néanmoins à l’utilisateur qui est invité à s’y référer le plus souvent possible afin d’en prendre connaissance.</p>
                            <h3>3. Description des services fournis.</h3>
                            <p>Le site <a href="http://Pharmaweb/" title="Pharmaweb - Pharmaweb">Pharmaweb</a> a pour objet de fournir une information concernant l’ensemble des activités de la société.</p>
                            <p>Pharmaweb s’efforce de fournir sur le site <a href="http://Pharmaweb/" title="Pharmaweb - Pharmaweb">Pharmaweb</a> des informations aussi précises que possible. Toutefois, il ne pourra être tenue responsable des omissions, des inexactitudes et des carences dans la mise à jour, qu’elles soient de son fait ou du fait des tiers partenaires qui lui fournissent ces informations.</p>
                            <p>Tous les informations indiquées sur le site <a href="http://Pharmaweb/" title="Pharmaweb - Pharmaweb">Pharmaweb</a> sont données à titre indicatif, et sont susceptibles d’évoluer. Par ailleurs, les renseignements figurant sur le site <a href="http://Pharmaweb/" title="Pharmaweb - Pharmaweb">Pharmaweb</a> ne sont pas exhaustifs. Ils sont donnés sous réserve de modifications ayant été apportées depuis leur mise en ligne.</p>
                            <h3>4. Limitations contractuelles sur les données techniques.</h3>
                            <p>Le site utilise la technologie JavaScript.</p>
                            <p>Le site Internet ne pourra être tenu responsable de dommages matériels liés à l’utilisation du site. De plus, l’utilisateur du site s’engage à accéder au site en utilisant un matériel récent, ne contenant pas de virus et avec un navigateur de dernière génération mis-à-jour</p>
                            <h3>5. Propriété intellectuelle et contrefaçons.</h3>
                            <p>Pharmaweb est propriétaire des droits de propriété intellectuelle ou détient les droits d’usage sur tous les éléments accessibles sur le site, notamment les textes, images, graphismes, logo, icônes, sons, logiciels.</p>
                            <p>Toute reproduction, représentation, modification, publication, adaptation de tout ou partie des éléments du site, quel que soit le moyen ou le procédé utilisé, est interdite, sauf autorisation écrite préalable de : Pharmaweb.</p>
                            <p>Toute exploitation non autorisée du site ou de l’un quelconque des éléments qu’il contient sera considérée comme constitutive d’une contrefaçon et poursuivie conformément aux dispositions des articles L.335-2 et suivants du Code de Propriété Intellectuelle.</p>
                            <h3>6. Limitations de responsabilité.</h3>
                            <p>Pharmaweb ne pourra être tenue responsable des dommages directs et indirects causés au matériel de l’utilisateur, lors de l’accès au site Pharmaweb, et résultant soit de l’utilisation d’un matériel ne répondant pas aux spécifications indiquées au point 4, soit de l’apparition d’un bug ou d’une incompatibilité.</p>
                            <p>Pharmaweb ne pourra également être tenue responsable des dommages indirects (tels par exemple qu’une perte de marché ou perte d’une chance) consécutifs à l’utilisation du site <a href="http://Pharmaweb/" title="Pharmaweb - Pharmaweb">Pharmaweb</a>.</p>
                            <p>Des espaces interactifs (possibilité de poser des questions dans l’espace contact) sont à la disposition des utilisateurs. Pharmaweb se réserve le droit de supprimer, sans mise en demeure préalable, tout contenu déposé dans cet espace qui contreviendrait à la législation applicable en France, en particulier aux dispositions relatives à la protection des données. Le cas échéant, Pharmaweb se réserve également la possibilité de mettre en cause la responsabilité civile et/ou pénale de l’utilisateur, notamment en cas de message à caractère raciste, injurieux, diffamant, ou pornographique, quel que soit le support utilisé (texte, photographie…).</p>
                            <h3>7. Gestion des données personnelles.</h3>
                            <p>En France, les données personnelles sont notamment protégées par la loi n° 78-87 du 6 janvier 1978, la loi n° 2004-801 du 6 août 2004, l'article L. 226-13 du Code pénal et la Directive Européenne du 24 octobre 1995.</p>
                            <p>A l'occasion de l'utilisation du site <a href="http://Pharmaweb/" title="Pharmaweb - Pharmaweb">Pharmaweb</a>, peuvent êtres recueillies : l'URL des liens par l'intermédiaire desquels l'utilisateur a accédé au site <a href="http://Pharmaweb/" title="Pharmaweb - Pharmaweb">Pharmaweb</a>, le fournisseur d'accès de l'utilisateur, l'adresse de protocole Internet (IP) de l'utilisateur.</p>
                            <p> En tout état de cause Pharmaweb ne collecte des informations personnelles relatives à l'utilisateur que pour le besoin de certains services proposés par le site <a href="http://Pharmaweb/" title="Pharmaweb - Pharmaweb">Pharmaweb</a>. L'utilisateur fournit ces informations en toute connaissance de cause, notamment lorsqu'il procède par lui-même à leur saisie. Il est alors précisé à l'utilisateur du site <a href="http://Pharmaweb/" title="Pharmaweb - Pharmaweb">Pharmaweb</a> l’obligation ou non de fournir ces informations.</p>
                            <p>Conformément aux dispositions des articles 38 et suivants de la loi 78-17 du 6 janvier 1978 relative à l’informatique, aux fichiers et aux libertés, tout utilisateur dispose d’un droit d’accès, de rectification et d’opposition aux données personnelles le concernant, en effectuant sa demande écrite et signée, accompagnée d’une copie du titre d’identité avec signature du titulaire de la pièce, en précisant l’adresse à laquelle la réponse doit être envoyée.</p>
                            <p>Aucune information personnelle de l'utilisateur du site <a href="http://Pharmaweb/" title="Pharmaweb - Pharmaweb">Pharmaweb</a> n'est publiée à l'insu de l'utilisateur, échangée, transférée, cédée ou vendue sur un support quelconque à des tiers. Seule l'hypothèse du rachat de Pharmaweb et de ses droits permettrait la transmission des dites informations à l'éventuel acquéreur qui serait à son tour tenu de la même obligation de conservation et de modification des données vis à vis de l'utilisateur du site <a href="http://Pharmaweb/" title="Pharmaweb - Pharmaweb">Pharmaweb</a>.</p>
                            <p>Le site n'est pas déclaré à la CNIL car il ne recueille pas d'informations personnelles. Pharmaweb.</p>
                            <p>Les bases de données sont protégées par les dispositions de la loi du 1er juillet 1998 transposant la directive 96/9 du 11 mars 1996 relative à la protection juridique des bases de données.</p>
                            <h3>8. Liens hypertextes et cookies.</h3>
                            <p>Le site <a href="http://Pharmaweb/" title="Pharmaweb - Pharmaweb">Pharmaweb</a> contient un certain nombre de liens hypertextes vers d’autres sites, mis en place avec l’autorisation de Pharmaweb. Cependant, Pharmaweb n’a pas la possibilité de vérifier le contenu des sites ainsi visités, et n’assumera en conséquence aucune responsabilité de ce fait.</p>
                            <p>La navigation sur le site <a href="http://Pharmaweb/" title="Pharmaweb - Pharmaweb">Pharmaweb</a> est susceptible de provoquer l’installation de cookie(s) sur l’ordinateur de l’utilisateur. Un cookie est un fichier de petite taille, qui ne permet pas l’identification de l’utilisateur, mais qui enregistre des informations relatives à la navigation d’un ordinateur sur un site. Les données ainsi obtenues visent à faciliter la navigation ultérieure sur le site, et ont également vocation à permettre diverses mesures de fréquentation.</p>
                            <p>Le refus d’installation d’un cookie peut entraîner l’impossibilité d’accéder à certains services. L’utilisateur peut toutefois configurer son ordinateur de la manière suivante, pour refuser l’installation des cookies :</p>
                            <p>Sous Internet Explorer : onglet outil (pictogramme en forme de rouage en haut a droite) / options internet. Cliquez sur Confidentialité et choisissez Bloquer tous les cookies. Validez sur Ok.</p>
                            <p>Sous Firefox : en haut de la fenêtre du navigateur, cliquez sur le bouton Firefox, puis aller dans l'onglet Options. Cliquer sur l'onglet Vie privée.
                                Paramétrez les Règles de conservation sur :  utiliser les paramètres personnalisés pour l'historique. Enfin décochez-la pour  désactiver les cookies.</p>
                            <p>Sous Safari : Cliquez en haut à droite du navigateur sur le pictogramme de menu (symbolisé par un rouage). Sélectionnez Paramètres. Cliquez sur Afficher les paramètres avancés. Dans la section "Confidentialité", cliquez sur Paramètres de contenu. Dans la section "Cookies", vous pouvez bloquer les cookies.</p>
                            <p>Sous Chrome : Cliquez en haut à droite du navigateur sur le pictogramme de menu (symbolisé par trois lignes horizontales). Sélectionnez Paramètres. Cliquez sur Afficher les paramètres avancés. Dans la section "Confidentialité", cliquez sur préférences.  Dans l'onglet "Confidentialité", vous pouvez bloquer les cookies.</p>

                            <h3>9. Droit applicable et attribution de juridiction.</h3>
                            <p>Tout litige en relation avec l’utilisation du site <a href="http://Pharmaweb/" title="Pharmaweb - Pharmaweb">Pharmaweb</a> est soumis au droit français. Il est fait attribution exclusive de juridiction aux tribunaux compétents de Paris.</p>
                            <h3>10. Les principales lois concernées.</h3>
                            <p>Loi n° 78-87 du 6 janvier 1978, notamment modifiée par la loi n° 2004-801 du 6 août 2004 relative à l'informatique, aux fichiers et aux libertés.</p>
                            <p> Loi n° 2004-575 du 21 juin 2004 pour la confiance dans l'économie numérique.</p>
                            <h3>11. Lexique.</h3>
                            <p>Utilisateur : Internaute se connectant, utilisant le site susnommé.</p>
                            <p>Informations personnelles : « les informations qui permettent, sous quelque forme que ce soit, directement ou non, l'identification des personnes physiques auxquelles elles s'appliquent » (article 4 de la loi n° 78-17 du 6 janvier 1978).</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">J'accepte</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
        </div>



        <?php $this->load->view('elements/footer'); ?>
        <?php $this->load->view('elements/scripts'); ?>
        <script type="text/javascript">
            $(function() {
                $('.button-checkbox').each(function() {

                    // Settings
                    var $widget = $(this),
                            $button = $widget.find('button'),
                            $checkbox = $widget.find('input:checkbox'),
                            color = $button.data('color'),
                            settings = {
                                on: {
                                    icon: 'glyphicon glyphicon-check'
                                },
                                off: {
                                    icon: 'glyphicon glyphicon-unchecked'
                                }
                            };

                    // Event Handlers
                    $button.on('click', function() {
                        $checkbox.prop('checked', !$checkbox.is(':checked'));
                        $checkbox.triggerHandler('change');
                        updateDisplay();
                    });
                    $checkbox.on('change', function() {
                        updateDisplay();
                    });

                    // Actions
                    function updateDisplay() {
                        var isChecked = $checkbox.is(':checked');

                        // Set the button's state
                        $button.data('state', (isChecked) ? "on" : "off");

                        // Set the button's icon
                        $button.find('.state-icon')
                                .removeClass()
                                .addClass('state-icon ' + settings[$button.data('state')].icon);

                        // Update the button's color
                        if (isChecked) {
                            $button
                                    .removeClass('btn-default')
                                    .addClass('btn-' + color + ' active');
                        }
                        else {
                            $button
                                    .removeClass('btn-' + color + ' active')
                                    .addClass('btn-default');
                        }
                    }

                    // Initialization
                    function init() {

                        updateDisplay();

                        // Inject the icon if applicable
                        if ($button.find('.state-icon').length == 0) {
                            $button.prepend('<i class="state-icon ' + settings[$button.data('state')].icon + '"></i> ');
                        }
                    }
                    init();
                });
            });
        </script>
    </body>

</html>