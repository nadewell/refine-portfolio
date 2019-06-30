<?php
/*************
 * Template:Portfolio Col 3
 */
$full_width = false;

get_header();

global $wp_query;

$wp_query = new WP_Query(array(
    'post_type'     => 'portfolio',
    'posts_per_page'  => 8
)); ?>

<?php if( isset($full_width) && $full_width == true){ ?>
<div class="container">
<?php } ?>

    <div class="refine-portfolio">
        <div class="port-nav">
            <ul class="port-filter">
            <?php $terms = get_terms(array(
                'taxonomy' => 'portfolio-category',
                'hide_empty' => false,
            )); ?>
            <li class="filter active" data-filter="*">All</li>
            <?php foreach($terms as $term): ?>
            <li class="filter" data-filter="<?php echo $term->slug; ?>"><?php echo $term->name; ?></li>
            <?php endforeach; ?>
            </ul>
        </div>
        <div class="portfolio-wrapper">
<?php
if($wp_query->have_posts()):
    while($wp_query->have_posts()):$wp_query->the_post(); ?>
            <?php 
                $port_terms = get_the_terms( get_the_ID(), 'portfolio-category' );
                $term_array = array();
                foreach($port_terms as $term){
                    $term_array[] = $term->slug;
                }
                $terms = implode(' ',$term_array);
            ?>
            <article class="port-item <?php echo $terms; ?>">
                <div class="port-item-wrapper">
                    <a href="<?php the_permalink(); ?>" class="port-link" title="<?php the_title(); ?>">
                        <div class="port-image" data-image="<?php echo wp_get_attachment_image_src( get_post_thumbnail_id(get_the_iD()) ,'Large' )[0]; ?>">&nbsp;</div>
                        <div class="overlay">
                            <h2 class="port-title"><?php the_title(); ?></h2>
                        </div>
                    </a>
                </div>
            </article>
        
<?php
    endwhile;
endif;
?>
        </div>
    </div>

<?php if( isset($full_width) ){ ?>    
</div>
<?php } ?>

<?php
get_footer();