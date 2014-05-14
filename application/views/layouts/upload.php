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
                <?php
                $attributes = array('class' => 'dropzone', 'id' => 'dropzone');
                echo form_open('upload/file', $attributes);
                ?>
            </div>
        </div>

        <?php $this->load->view('elements/footer'); ?>
        <?php $this->load->view('elements/scripts'); ?>
        <script type="text/javascript">
            Dropzone.options.dropzone = {
                accept: function(file, done) {
                    if (file.type != "image/jpeg" && file.type != "image/png") {
                        done("Error! Files of this type are not accepted");
                    }
                    else {
                        done();
                    }
                }
            }
        </script>
    </body>

</html>