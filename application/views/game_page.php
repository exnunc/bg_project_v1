<div class="container">
    <div class="row panes-container">
        {menu}
        <div class="col-md-12">          	
            <div class="row">
                <div id="game-description-container" class="col-md-9">
                    <div>
                        <h3>{bg_name}</h3>
                        <span class="stars">{rating}</span>
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

                            <p>
                                <a id="shop-{bg_id}" href="#" class="shop-btn btn btn-default"><span class="glyphicon glyphicon-shopping-cart"></span>Add to cart</a>
                                <a id="meet-{bg_id}" data-toggle="modal" href="#meetings-modal" class="meet-btn btn btn-default"><span class="glyphicon glyphicon-fire"></span>Meetings</a>
                            </p>
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

<!-- Modal for meetings-->
<div class="modal fade" id="meetings-modal" tabindex="-1" role="dialog" aria-labelledby="meetings" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Meetings</h4>
            </div>
            <div id="meetings-body" class="modal-body" >
                {meet_area}
            </div>
            <div class="modal-footer">
                <div class="form-group row">
                    <div class="col-lg-6">
                        <input type="text" class ="form-control" id="meet-location" placeholder="Location">
                    </div>
                    <div class="col-lg-6">
                        <input type="datetime-local" class="form-control" name="meetdaytime" id="meet-time-id">
                    </div>
                </div>
                
                <div class="form-group row">
                    <div class="col-lg-12">
                        <input type="text" class="form-control" id="meet-details" placeholder="Details">
                    </div>
                   
                </div>


                
                <button id="save-new-meeting" type="button" class="btn btn-default">Save</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->




