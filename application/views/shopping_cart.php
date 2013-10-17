<div class="container">
    <div class="row panes-container">
        {menu}
        <div class="col-md-12">   
            <div class="row">
                <h4>Shopping cart</h4>
                <hr>
            </div>
            <div class="row">
                {error}

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#ID</th>
                                <th>Boardgame</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            {cart}
                            <tr>
                                <td>{cart_bg_id}</td>
                                <td>{cart_bg_name}</td>
                                <td>
                                    <div class="styled-select">
                                        <select>
                                            {cart_bg_stock_range}
                                            <option {selected}>{val}</option>
                                            {/cart_bg_stock_range}
                                        </select>
                                    </div>

                                </td>
                                <td>{cart_bg_price}</td>
                                <td id="remove-{cart_bg_id}"><span class="glyphicon glyphicon-trash"></span></td>
                            </tr>
                            {/cart}

                            <tr class="warning">
                                <td colspan="3"><strong>Shipping</strong></td>
                                <td>{shipping}</td>
                                <td></td>
                            </tr>
                            <tr class="success">
                                <td colspan="3"><strong>Total</strong></td>
                                <td>{total_sum}</td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>


            </div>
            
            <div class="row">
                <div class="pull-right">
                    <button class="btn btn-danger">Empty cart</button>
                    <button class="btn btn-success">Checkout</button>
                </div>
            </div>



        </div>
    </div><!-- /row -->
</div>




