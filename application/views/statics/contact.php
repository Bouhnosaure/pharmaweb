<!DOCTYPE html>
<html lang="fr">
    <head>
        <?php $this->load->view('elements/head'); ?>
    </head>
    <body>
        <?php $this->load->view('elements/header'); ?>
        <!-- header -->
        <div class="clearfix"></div>
        <div class="contactus ">
            <!-- Google maps -->
            <div class="gmap">
                <!-- Google Maps. Replace the below iframe with your Google Maps embed code -->
                <iframe height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.co.in/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Provence-Alpes-Côte+d'Azur&amp;z=8&amp;output=embed"></iframe>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-7">
                        <div class="cwell">
                            <!-- Contact form -->
                            <h5>Contact</h5>

                            <form role="form">
                                <div class="form-group">
                                    <label for="name">Votre nom</label>
                                    <input type="text" class="form-control" id="name" placeholder="Enter Name">
                                </div>                                    
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Adresse Email</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Contenu du message</label>
                                    <textarea class="form-control" rows="3"></textarea>
                                </div>                                      
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox"> Important?
                                    </label>
                                </div>
                                <button type="submit" class="btn btn-info">Envoyer</button>
                                <button type="reset" class="btn btn-default">Reset</button>
                            </form>

                        </div>
                    </div>
                    <div class="col-md-6 col-sm-5">
                        <div class="cwell">
                            <!-- Address section -->
                            <h5>Addresse</h5>
                            <div class="address">
                                <address>
                                    <!-- Company name -->
                                    <h6>Pharmaweb</h6>
                                    <!-- Address -->
                                    65 rue de la république<br>
                                    84404, Ville<br>
                                    <!-- Phone number -->
                                    <abbr title="Phone">Telephone:</abbr> 055589060.
                                </address>

                                <address>
                                    <!-- Name -->
                                    <h6>Pharmaweb</h6>
                                    <!-- Email -->
                                    <a href="mailto:#">contact@pharmaweb.com</a>
                                </address>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>



    <?php $this->load->view('elements/footer'); ?>
    <?php $this->load->view('elements/scripts'); ?>
</body>

</html>