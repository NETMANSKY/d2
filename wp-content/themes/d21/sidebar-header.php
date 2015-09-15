<?php theme_print_sidebar('header-widget-area'); ?>



    <div class="shapes">
<div class="textblock object985512391" data-left="0%">
        <div class="object985512391-text-container">
        <div class="object985512391-text"></div>
    </div>
    
</div>
            </div>
<?php if(theme_get_option('theme_header_show_headline')): ?>
	<?php $headline = theme_get_option('theme_'.(is_home()?'posts':'single').'_headline_tag'); ?>
	<<?php echo $headline; ?> class="headline" data-left="91.95%">
    <a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a>
</<?php echo $headline; ?>>
<?php endif; ?>


<div class="textblock textblock-1573669739" data-left="10.68%">
        <div class="textblock-1573669739-text-container">
        <div class="textblock-1573669739-text">&nbsp;<a href="/" class="facebook-tag-icon"></a>&nbsp;</div>
    </div>
    
</div>

<nav class="nav">
    <?php
	echo theme_get_menu(array(
			'source' => theme_get_option('theme_menu_source'),
			'depth' => theme_get_option('theme_menu_depth'),
			'menu' => 'primary-menu',
			'class' => 'hmenu'
		)
	);
	get_sidebar('nav'); 
?> 
    </nav>

                    
