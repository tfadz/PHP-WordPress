<ul>
	<li><a href="http://twitter.com/intent/tweet?text=<?php the_title(); ?>&amp;url=<?php the_permalink(); ?>" target="_blank"><i class="fab fa-twitter"></i>
	</a></li>
	<li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_the_permalink(); ?>" target="_blank">
		<i class="fab fa-facebook"></i>
	</a></li>
	<li><a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php the_permalink() ?>&amp;title=<?php the_title() ?>&amp;summary=&amp;source=MccormickFoundation" target="_blank">
		<i class="fab fa-linkedin-in"></i>
	</a></li>

	<li> <a href="mailto:type%20email%20address%20here?subject=I%20wanted%20to%20share%20this%20post%20with%20you%20from%20<?php bloginfo('name'); ?>&body=<?php the_title(); ?> - <?php the_permalink(); ?>" title="Email to a friend/colleague" target="_blank"><i class="fal fa-envelope" aria-hidden="true"></i>
	</a></li>
</ul>