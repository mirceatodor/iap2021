<?php 
    // the query
    $the_query = new WP_Query(array(
        'posts_per_page' => 3,
    )); 
?>

<?php if ( $the_query->have_posts() ) : ?>
<div class="section section-blog">
    <div class="container-sm">
        <h2 class="section-title">Check out our latest article</h2>
        <div class="row">
            <?php while ($the_query->have_posts()): ?>
                <?php $the_query->the_post() ?>
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="blog-card">
                        <?php if ( has_post_thumbnail() ): ?>
                            <a href="<?php the_permalink() ?>" class="blog-card-image">
                                <?php the_post_thumbnail(); ?>
                            </a>
                        <?php endif; ?>

                        <div class="blog-card-content">
                            <h3 class="blog-card-title"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
                            <div class="blog-card-excerpt"><?= the_excerpt() ?></div>
                            <a href="<?php the_permalink() ?>" class="blog-card-link">
                                <span>Read more</span>
                                <svg width="15" height="9" viewBox="0 0 15 9" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0)"><path d="M1.375 5.304h10.607l-2.33 2.33a.777.777 0 000 1.125.777.777 0 001.125 0l3.696-3.697a.777.777 0 000-1.125L10.777.241a.777.777 0 00-1.125 0 .777.777 0 000 1.125l2.33 2.33H1.375a.805.805 0 00-.804.804c0 .482.402.804.804.804z" fill="#4089ED"/></g><defs><clipPath id="clip0"><path fill="#fff" transform="rotate(-180 7.357 4.5)" d="M0 0h14.143v9H0z"/></clipPath></defs></svg>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endwhile ?>
        </div>
        <div class="section-actions">
            <a href="/blog/" class="button secondary">View all</a>
        </div>
    </div>
</div>
<?php endif ?>