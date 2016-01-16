<!-- Search Form Begins Here -->
<?php $search_terms = htmlspecialchars( $_GET["s"] ); ?>
<form role="search-form" action="<?php bloginfo('siteurl'); ?>/" id="searchform" method="get">
    <label for="s" class="sr-only">Search</label>
    <div class="input-group">
		<input type="text" class="form-control search-input" id="s" name="s" placeholder="Search"<?php if ( $search_terms !== '' ) { echo ' value="' . $search_terms . '"'; } ?> />
        <span class="input-group-btn">
			<button type="submit" class="search-button btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
        </span>
    </div> <!-- .input-group -->
</form>
<!-- Search Form Ends Here -->