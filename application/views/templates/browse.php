
<div class="tab-pane" id="browse">
   <!-- Single button -->
    <div class="btn-group">
        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
            Categories <span class="caret"></span>
        </button>
        <ul class="dropdown-menu" role="categories">
            <li><a href="#">Strategy Games</a></li>
            <li><a href="#">Card Games</a></li>
            <li><a href="#">Classic Games</a></li>
            <li><a href="#">Children's Games</a></li>
        </ul>
    </div>
   
   {bgames_cat}
   <div class="media">
        <a class="pull-left" href="#">
        <!--<img class="media-object" src="..." alt="...">-->
        </a>
        <div class="media-body">
        <h4 class="media-heading">{bgames_cat['bg_name']}</h4>
            <p>{bgames_cat['bg_description']}</p>
        </div>
    
   </div>
   {/bgames_cat}
</div>