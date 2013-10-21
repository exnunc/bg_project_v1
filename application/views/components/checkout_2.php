<div class="container">
    <div class="row panes-container">
        {menu}
        <div class="col-md-12">   
            <div class="row">
                <h4>Payment</h4>
                <hr>
            </div>
            <div class="row">
                {error}
                {form_open}
                <div class="row well">
                    <div class="form-group row">
                        <div class="styled-select col-md-2">
                            <select id="payment-select" name="payment-select">
                                
                                <option value="Charge on delivery">Charge on delivery</option>
                                <option value="Other option">Other option</option>
                                
                                
                            </select>
                        </div>
                    </div>



                </div>

                <div class="row">
                    <div class="pull-right">
                        <button class="btn btn-danger back-btn">Back</button>
                        <input type="submit" id="place-order-btn-2" class="btn btn-success" value="Continue">
                    </div>
                </div>
                {form_close}


            </div>





        </div>
    </div><!-- /row -->

</div>




