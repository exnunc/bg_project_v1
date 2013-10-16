<div class="container">
    <div class="row panes-container">
        {menu}
        <div class="col-md-12">          	
            <div class="row">
                <div id="game-description-container" class="col-md-9">
                    <div>
                        <h3>{bg_name}</h3>

                    </div>
                    <div id="game-description">
                        {bg_description}
                    </div>
                </div>
                <div id="game-image-container" class="col-sm-6 col-md-3">
                    <div class="thumbnail">
                        <img src="{bg_path}" alt="game image">
                        <div class="caption">
                            <h3>{bg_name}</h3>
                            <!--<p>...</p>
                            <p><a href="#" class="btn btn-primary">Button</a> -->
                                
                                <p><a id="shop-{bg_id}" href="#" class="btn btn-default"><span class="glyphicon glyphicon-shopping-cart"></span>Add to cart</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                {reviews}
                <h3>{review_user_id}</h3>
                <p>{review_content}</p>
                {/reviews}
            </div>

        </div>
    </div><!-- /row -->
</div>




