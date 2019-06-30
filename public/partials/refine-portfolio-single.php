<?php get_header(); ?>
<div class="container">
<?php if(have_posts()): ?>
    <div class="refine-portfolio">
        <div class="portfolio-wrapper">
            <article class="port-item single">
                <div class="row">
                    <div class="port-primary">
                        <div class="port-image">
                            <img src="<?php echo wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),'Large')[0]; ?>" alt="<?php the_title() ?>">
                        </div>
                    </div>
                    <div class="port-secondary">
                        <div class="heading">
                            <h2 class="title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
                            <hr/>
                        </div>
                        <?php the_content(); ?>
                        <table>
                            <tr>
                                <td><h3 class="sub-heading">Client Name:</h3></td>
                                <td><?php echo ( get_field( 'client_name',get_the_ID() ) != '' ) ? get_field( 'client_name',get_the_ID() ) : '-' ; ?></td>
                            </tr>
                            <tr>
                                <td><h3 class="sub-heading">Project URL:</h3></td>
								<td><a href="<?php echo ( get_field( 'project_url',get_the_ID() ) != '' ) ? get_field( 'project_url',get_the_ID() ) : '-' ; ?>"><?php the_title(); ?></a></td>
                            </tr>
                            <tr>
                                <td><h3 class="sub-heading">Project Cost:</h3></td>
                                <td><?php echo ( ( get_field( 'project_cost',get_the_ID() ) != '' ) ? get_field( 'project_cost',get_the_ID() ) : '-' )." USD"; ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </article>
        </div>
    </div>
<?php endif; ?>
</div>
<?php get_footer();