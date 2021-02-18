<?php if ( have_posts() ) : ?>
	<div class="alignwide tainacan-list-post table-responsive">
		<table class="table table-hover tainacan-list-collection--container-table">
			<thead>
				<tr>
					<th scope="col"></th>
					<th scope="col"><?php _e( 'Título', 'iphan_inrc' ); ?></th>
					<th scope="col"><?php _e( 'Descrição', 'iphan_inrc' ); ?></th>
				</tr>
			</thead>
			<tbody>
				<?php while ( have_posts() ) : the_post(); ?>
					<tr class="tainacan-list-collection" onclick="location.href='<?php the_permalink(); ?>'">
						<td class="collection-miniature">
							<?php if ( has_post_thumbnail() ) : 
								the_post_thumbnail('tainacan-small', array('class' => 'img-fluid')); ?>
							<?php else : ?>
								<div class="image-placeholder">
									<h4>
									<?php echo esc_html( tainacan_get_initials( get_the_title(), true ) ); ?>
									</h4>
								</div>
							<?php endif; ?>
						</td>
						<td class="collection-title text-black"><?php the_title(); ?></td>
						<td class="collection-description text-oslo-gray">
							<?php if ( get_the_excerpt() ) : ?>
								<p><?php echo wp_trim_words( get_the_excerpt(), 35, '[...]' ); ?></p>
							<?php else : ?>
								<p style="font-style: italic;"><?php _e( 'Nenhuma descrição fornecida', 'iphan_inrc' ); ?></p>
							<?php endif; ?>
						</td>
					</tr>
				<?php endwhile; ?>
			</tbody>
		</table>
	</div>

	<?php echo tainacan_pagination(); ?>

<?php else : ?>
	<?php _e( 'Nada encontrado', 'iphan_inrc' ); ?>
<?php endif; ?>
