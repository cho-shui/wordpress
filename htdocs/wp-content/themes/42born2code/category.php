<?php get_header() ?>

		<div id="contentfull">

			<h2 class="category-page-title"><span><?php single_cat_title() ?></span></h2>
			<?php $categorydesc = category_description(); if ( !empty($categorydesc) ) echo apply_filters( 'archive_meta', '<div class="archive-meta">' . $categorydesc . '</div>' ); ?>


<?php while ( have_posts() ) : the_post()  //begin loop ?>

		<div class="entry">
			<div class="entry-top">

				<h2 class="entry-title"><a href="<?php the_permalink() ?>" title="<?php printf( __('Permalink to %s', 'wpbx'), the_title_attribute('echo=0') ) ?>" rel="bookmark"><?php the_title() ?></a></h2>

				<div class="entry-meta-top">
					<span class="entry-date"><?php unset($previousday); printf( __( '%1$s', 'wpbx' ), the_date( 'D, j M Y', '', '', false ) ) ?></span>
					<span class="entry-meta-sep">|</span>
					<span class="entry-comm">Publie dans <?php the_category(', '); ?></span>
				</div>

			</div>

				<div class="entry-content clearfix">

					<div class= "entry-list-thumb">
						<a href="<?php the_permalink(); ?>" title="<?php printf(__( 'Read %s', 'wpbx' ), wp_specialchars(get_the_title(), 1)) ?>">
						<?php the_post_thumbnail(); ?>
						</a>
					</div>

					<div class="entry-content">
										<?php the_excerpt(); ?>
					</div>
				</div>

				<div class="entry-meta">
					<span class="entry-comm"><?php comments_popup_link( __( 'Pas de Commentaires', 'wpbx' ), __( '1 Commentaire', 'wpbx' ), __( '% Commentaires', 'wpbx' ) ) ?></span>
					<span class="entry-meta-sep">|</span>
					<span class="entry-more"><a href="<?php the_permalink() ?>" title="<?php printf(__('Continue reading %s'), wp_specialchars(get_the_title(), 1)) ?>"><?php _e( 'Lire plus', 'wpbx' ) ?></a></span>
				</div>
		</div><!-- .post -->

<?php endwhile; //end loop ?>

			<div class="navigation clearfix">
				<div class="nav-previous"><?php next_posts_link(__( 'Precedent <span class="meta-nav">Articles</span>', 'wpbx' )) ?></div>
				<div class="nav-next"><?php previous_posts_link(__( 'Suivant <span class="meta-nav">Articles</span>', 'wpbx' )) ?></div>
			</div>

		</div><!-- #content -->

<?php get_footer() ?>
