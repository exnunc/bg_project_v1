<div class="container">
    <div class="row panes-container">
        {menu}
        <div class="col-md-12">   
            <div class="row">
                <h4>Comfirmation</h4>
                <hr>
            </div>
            <div class="row">
                {error}
                
                <div class="row well">
                    <h4>Contact information</h4>
                    <p>{contact_string}</p>
                    
                    <h4>Payment method</h4>
                    <p>{payment_string}</p>

                </div>

                {form_open}
                <div class="row">
                    <div class="pull-right">
                        <button class="btn btn-danger back-btn">Back</button>
                        <input type="submit" id="place-order-btn-3" class="btn btn-success" value="Finish" name="submit">
                    </div>
                </div>
                {form_close}


            </div>





        </div>
    </div><!-- /row -->

</div>




