<div class="container">
    <div class="row panes-container">
        {menu}
        <div class="col-md-12">          	
            <!-- tabs left -->
            <div class="tabbable tabs-left">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#start" data-toggle="tab">START</a></li>
                    <li><a href="#featured" data-toggle="tab">FEATURED</a></li>
                    <li><a href="#top5" data-toggle="tab">TOP 5</a></li>
                    <li><a href="#browse" data-toggle="tab">BROWSE</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="start">
                        <div class="row ">
                            <div class="well col-md-4 col-md-offset-4">
                                Welcome, {name}

                            </div>
                        </div>

                    </div>
                    {featured}
                    {top5}
                    {browse}
                </div>
            </div>
            <!-- /tabs -->

        </div>
    </div><!-- /row -->
</div>




<hr>

