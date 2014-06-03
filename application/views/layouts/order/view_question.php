<!DOCTYPE html>
<html lang="fr">
    <head>
        <?php $this->load->view('elements/head'); ?>
        <style>
            .panel-heading a:after {
                font-family: 'Glyphicons Halflings';
                content: "\e114";    
                float: right; 
                color: grey; 
            }
            .panel-heading a.collapsed:after {
                content: "\e080";
            }
        </style>
    </head>
    <body>
        <?php $this->load->view('elements/header'); ?>
        <!-- header -->
        <div class="clearfix"></div>
        <div class="container">
            <div class="row">
                <?php $this->load->view('elements/accountsidebar'); ?>
                <div class="col-md-9">
                    <div class="panel-group" id="accordion">

                        <?php foreach ($questions as $question): ?>

                            <div class="panel panel-default" id="panel1">
                                <div class="panel-heading">
                                    <h4>
                                        <a data-toggle="collapse" data-target="#collapse<?=$question[0]->QUESTIONS_ID?>" 
                                           href="#collapse<?=$question[0]->QUESTIONS_ID?>">
                                            <?=$question[0]->QUESTIONS_SUBJECT?>
                                        </a>
                                    </h4>
                                    <p><?=$question[0]->QUESTION_CONTENT?></p>
                                </div>
                                <div id="collapse<?=$question[0]->QUESTIONS_ID?>" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <?php if($question[0]->QUESTIONS_ANSWER != ''):?>
                                        <?=$question[0]->QUESTIONS_ANSWER?>
                                        <?php else: ?>
                                        <p>il n'y a pas encore de réponse a votre question</p>
                                        <?php endif;?>
                                    </div>
                                </div>
                            </div>

                        <?php endforeach; ?>

                    </div>
                </div>
            </div>

            <div class="sep-bor"></div>
        </div>




        <?php $this->load->view('elements/footer'); ?>
        <?php $this->load->view('elements/scripts'); ?>
    </body>

</html>