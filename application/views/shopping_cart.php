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
                                    <div class="styled-select" id="quantity-select">
                                        <select data-id="{cart_id}" class="select-quantity">
                                            {cart_bg_stock_range}
                                            <option {selected} value="{val}">{val}</option>
                                            {/cart_bg_stock_range}
                                        </select>
                                    </div>

                                </td>
                                <td>{cart_bg_price}</td>
                                <td id="remove-{cart_bg_id}" class="remove-from-cart" data-id="{cart_id}"><span class="glyphicon glyphicon-trash"></span></td>
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
                    <button class="btn btn-danger" id="empty-cart" data-uid="{user_id}">Empty cart</button>
                    <button id="checkout-btn" class="btn btn-success" data-error="{empty_cart}">Checkout</button>
                </div>
            </div>



        </div>
    </div><!-- /row -->
</div>




