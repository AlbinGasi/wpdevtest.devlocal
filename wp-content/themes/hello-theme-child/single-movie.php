<?php
/**
 * Single Movie Tempplate
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();

$movieId = get_the_ID();
$movieTitle = get_post_meta($movieId, 'movie_title', true);
?>

<section class="movie-wrapper">
	<div class="movie-title">
		<h1><?php echo $movieTitle; ?></h1>
	</div>
	<div class="movie-content">
		<?php the_content(); ?>
	</div>

</section>

<?php
get_footer();
