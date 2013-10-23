<div class="container">
    <div class="row panes-container">
        
        <div class="col-md-12">          	
            <!-- tabs left -->
            <div class="tabbable tabs-left">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#start" data-toggle="tab">START</a></li>
                    <li><a href="#featured" data-toggle="tab">FEATURED</a></li>
                    <li><a href="#top5" data-toggle="tab">TOP 5</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="start">
                        <div class="row ">
                            <div class="col-md-4 col-md-offset-4">
                                {error}
                                {form_open}
                                <div class="form-group row">
                                    <input type="text" id="user-name" name="username" placeholder="Username" class="form-control login"/>
                                </div>
                                <div class="form-group row">
                                   <input type="password" id="password" name="password" placeholder="Password" class="form-control login"/>
                                </div>
                                <div class="form-group row">
                                  <input type="submit" name="submit" id="submit" class="btn btn-default col-md-12"/>
                                </div>
                                
                                {form_close}
                            </div>
                        </div>

                    </div>
                    {featured}
                    {top5}
                </div>
            </div>
            <!-- /tabs -->

        </div>
    </div><!-- /row -->
</div>




<hr>

