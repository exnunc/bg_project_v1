<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{base_url}index.php/home">BOARDMEET</a>
    </div>
    
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">

        <div class="navbar-form navbar-left" role="search">
            <div class="form-group">
                <input id="search-field" type="text" class="form-control typeahead" placeholder="Search game" name="search">
            </div>
            
        </div>
      

        <ul class="nav navbar-nav navbar-right">
            {admin_dropdown}
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Account <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li class="view-cart"><a href="#"><span class="glyphicon glyphicon-shopping-cart"></span> View cart</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li id="logout-btn"><a>Logout</a></li>
                </ul>
            </li>
        </ul>
    </div><!-- /.navbar-collapse -->
</nav>