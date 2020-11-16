<!-- This shows title, form with search result inside it, and counts the number of results -->
<?php if ( have_posts() ) : ?>
	<header class="search-header">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<h2>Search Results</h2>
					<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
						<label for="search-form" id="searchfield" class="hidelabel">Search</label>
						<input value="<?php printf( esc_html__( '%s', 'thirdwave' ), get_search_query()  );
						?>" aria-labelledby="searchfield" type="text" class="search-field" name="s" id="s"  />
						<input onclick="JavaScript:return Validator();" aria-label="Submit Search" type="submit" class="submit" name="submit" id="searchsubmit" value="<?php esc_attr_e( 'Go', 'thirdwave' ); ?>" />
					</form>

					<p>
						<?php echo count($posts); ?> results for <span><?php printf( esc_html__( '%s', 'thirdwave' ), get_search_query()  );
						?></span>
					</p>
				</h2>
			</div>
		</div>
	</div>
</header>
<?php endif; ?>