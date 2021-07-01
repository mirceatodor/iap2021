<?php get_header() ?>

<div class="container">
    <div class="post">
        <h1 class="post-title"><?= the_title() ?></h1>
        <div class="post-main">
            <?php if ( has_post_thumbnail() ): ?>
                <div class="post-featured">
                    <?php the_post_thumbnail('full'); ?>
                </div>
            <?php endif; ?>
            <div class="post-content">
                <?php get_template_part( 'template-parts/blog/post-share'); ?>
                <?php the_content() ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer() ?>