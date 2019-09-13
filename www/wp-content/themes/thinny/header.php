<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- <link rel="shortcut icon" href="//s.w.org/favicon.ico?2" type="image/x-icon"> -->
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <title>
        <?php 
            !is_home() ?  wp_title('', true) : the_title();
        ?>
    </title>
    <?php wp_head(); ?>

</head>

<body <?php echo body_class();?>>
    <div class="header">
    <div class="is-home">
        <ul>
            <li>
            <?php if ( is_front_page() && is_home() ) : ?>
                <h2 class="site-title">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                        <?php 
                       
                        if ( function_exists( 'the_custom_logo' ) ) {
                            the_custom_logo();
                            
                        }
                        bloginfo( 'name' ); 
                        ?>
                    </a>
            </h2>
            <?php else : ?>
                <h2 class="site-title">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                    <?php
                        
                        if ( function_exists( 'the_custom_logo' ) ) {
                            the_custom_logo();
                            
                        }
                        bloginfo( 'name' );
                        ?>
                    </a>
                </h2>
            <?php endif; ?>

            </li>
        </ul>
    </div>
    <div class="is-menu is-menu-right">
    <div class="is-menu-top">
        <div class="inner-menu">
        <ul class="menu-padding">
            <li> <a href="">CONTACT</a></li>
            <li> <a href="">NEIGHBOURHOOD</a> </li>
            <li class="language-bar">
                <a href="#" class="">
                    <img src="https://image.flaticon.com/icons/svg/555/555417.svg">
                </a>
            </li>
        </ul>
        </div>
    </div>

        <ul class="menu-padding">
    <?php
        $page_ids = get_all_page_ids();
        foreach ($page_ids as $page_id) {
            echo '
                    <li>
                        <a href="/' . get_page_uri($page_id) . '">' . get_the_title($page_id) . '</a>
                    </li>';
        }
        ?>
        <li>
            <a href="#" class="btn book-now">Book Now</a>
        </li>
         </ul>
         
    </div>

       
    </div> <!-- header -->
   
</body>

</html>