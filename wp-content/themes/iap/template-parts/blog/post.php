<div class="blog-list">
    <?php if ( has_post_thumbnail() ): ?>
        <a href="<?php the_permalink() ?>" class="blog-list-image">
            <?php the_post_thumbnail(); ?>
        </a>
    <?php endif; ?>
    
    <div class="blog-list-content">
        <h3 class="blog-list-title"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
        <div class="blog-list-excerpt"><?= the_excerpt() ?></div>
        <a href="<?php the_permalink() ?>" class="blog-list-link">
            <span>Read more</span>
            <svg width="15" height="9" viewBox="0 0 15 9" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0)"><path d="M1.375 5.304h10.607l-2.33 2.33a.777.777 0 000 1.125.777.777 0 001.125 0l3.696-3.697a.777.777 0 000-1.125L10.777.241a.777.777 0 00-1.125 0 .777.777 0 000 1.125l2.33 2.33H1.375a.805.805 0 00-.804.804c0 .482.402.804.804.804z" fill="#4089ED"/></g><defs><clipPath id="clip0"><path fill="#fff" transform="rotate(-180 7.357 4.5)" d="M0 0h14.143v9H0z"/></clipPath></defs></svg>
        </a>
    </div>
</div>