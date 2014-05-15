<!DOCTYPE html>
<html lang="fr">
    <head>
        <?php $this->load->view('elements/head'); ?>
    </head>
    <body>
        <?php $this->load->view('elements/header'); ?>
        <?php var_dump($cart); ?>
        <!-- header -->
        <div class="view-cart blocky">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
               
                  <!-- Table -->
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>Nom</th>
                          <th>Quantité</th>
                          <th>Prix a l'unité</th>
                          <th>Total</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <!-- Product  name -->
                          <td><a href="single-item.html">HTC One</a></td>
                          <!-- Quantity with refresh and remove button -->
                          <td>
                            <div class="input-group">
                              <input type="text" class="form-control" placeholder="1">
                              <span class="input-group-btn">
                                <button class="btn btn-info" type="button"><i class="icon-refresh"></i></button>
                                <button class="btn btn-danger" type="button"><i class="icon-remove"></i></button>
                              </span>
                            </div>
                          </td>
                          <!-- Unit price -->
                          <td>$150</td>
                          <!-- Total cost -->
                          <td>$300</td>
                        </tr>
                      </tbody>
                    </table>
                     
                     <div class="sep-bor"></div>
                     <!-- Button s-->
                    <div class="row">
                      <div class="span4 offset8">
                        <div class="pull-right">
                          <a href="index.html" class="btn btn-info">Continue Shopping</a>
                          <a href="checkout.html" class="btn btn-danger">CheckOut</a>
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
