<div class="container">
    <div class="row panes-container">
        {menu}
        <div class="col-md-12">   
            <div class="row">
                <h4>Checkout</h4>
                <hr>
            </div>
            <div class="row">
                {error}
                {form_open}
                    <div class="row well">
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <input type="text" class="form-control" id="first-name" name="first-name" placeholder="First name" value="<?php echo set_value('first-name'); ?>">
                            </div>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" id="last-name" name="last-name" placeholder="Last name" value="<?php echo set_value('last-name'); ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <input type="text" class="form-control" id="email" name="email" placeholder="E-mail" value="<?php echo set_value('email'); ?>">
                            </div>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" id="telephone" name="telephone" placeholder="Telephone" value="<?php echo set_value('telephone'); ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-lg-12">
                                <input type="text" class="form-control" id="address" name="address" placeholder="Address" value="<?php echo set_value('address'); ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-5">
                                <input type="text" class="form-control" id="country" name="country" placeholder="Country" value="<?php echo set_value('country'); ?>">
                            </div>
                            <div class="col-lg-5">
                                <input type="text" class="form-control" id="city" name="city" placeholder="City" value="<?php echo set_value('city'); ?>">
                            </div>
                            <div class="col-lg-2">
                                <input type="text" class="form-control" id="zip" name="zip" placeholder="ZIP" value="<?php echo set_value('zip'); ?>">
                            </div>
                        </div>


                    </div>

                    <div class="row">
                        <div class="pull-right">
                            <button class="btn btn-danger back-btn">Back</button>
                            <input type="submit" id="place-order-btn" class="btn btn-success" value="Place order">
                        </div>
                    </div>
                {form_close}


            </div>





        </div>
    </div><!-- /row -->

</div>




