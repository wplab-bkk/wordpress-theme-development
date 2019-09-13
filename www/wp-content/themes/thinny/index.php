<?php get_header(); ?>
<div class="contents">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div class="container">
        <div class="blog-title">  <?php the_title(); ?></div>
        <div class="content"><?php the_content(); ?></div>
    </div>
      
        
    <?php endwhile; ?>
    <?php endif; ?>
   
</div>
<?php get_footer(); ?>