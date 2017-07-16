<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme and one of the
 * two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Odin
 * @since 2.2.0
 */

get_header(); ?>

	<div class="col-md-12">
		<div class="row">

			<div id="my-slides" class="col-md-9 carousel slide" data-ride="carousel">
				<ol class="slides carousel-indicators">
						<li data-target="#my-slides" data-slide-to="0" class="active"></li>
						<li data-target="#my-slides" data-slide-to="1"></li>
						<li data-target="#my-slides" data-slide-to="2"></li>
					<li data-target="#my-slides" data-slide-to="3"></li>
					<li data-target="#my-slides" data-slide-to="4"></li>
				</ol>
				<div class="carousel-inner" role="listbox">
					<?php
					if ( have_posts() ) :
						// Start the Loop.
						$i = 0;
						while ( have_posts() && $i < 5) : the_post();
							$i++;
							echo '<div class="item '.($i == 1 ? "active": "") .'">';
							print_r(the_post_thumbnail());
							echo "<div class='post-title carousel-caption'>".get_post()->post_title."</div>";
							echo '</div>';
						endwhile;
					endif;
					?>
				</div>
				<a class="left carousel-control" href="#my-slides" role="button" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="right carousel-control" href="#my-slides" role="button" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
		</div>
		<div class="row">
			<main id="content" class="<?php echo odin_classes_page_sidebar(); ?>" tabindex="-1" role="main">

			<?php

				if ( have_posts() ) :
					// Start the Loop.
					while ( have_posts() ) : the_post();
						/*
						 * Include the post format-specific template for the content. If you want to
						 * use this in a child theme, then include a file called called content-___.php
						 * (where ___ is the post format) and that will be used instead.
						 */
						get_template_part( 'content', get_post_format() );

					endwhile;

					// Post navigation.
					odin_paging_nav();

				else :
					// If no content, include the "No posts found" template.
					get_template_part( 'content', 'none' );

				endif;
			?>

	</main><!-- #content -->
		</div>
	</div>
<?php
get_sidebar();
get_footer();
