<?php
global $theme_sidebars;
$places = array();
foreach ($theme_sidebars as $sidebar){
    if ($sidebar['group'] !== 'footer')
        continue;
    $widgets = theme_get_dynamic_sidebar_data($sidebar['id']);
    if (!is_array($widgets) || count($widgets) < 1)
        continue;
    $places[$sidebar['id']] = $widgets;
}
$place_count = count($places);
$needLayout = ($place_count > 1);
if (theme_get_option('theme_override_default_footer_content')) {
    if ($place_count > 0) {
        $centred_begin = '<div class="center-wrapper"><div class="center-inner">';
        $centred_end = '</div></div><div class="clearfix"> </div>';
        if ($needLayout) { ?>
<div class="content-layout">
    <div class="content-layout-row">
        <?php 
        }
        foreach ($places as $widgets) { 
            if ($needLayout) { ?>
            <div class="layout-cell layout-cell-size<?php echo $place_count; ?>">
            <?php 
            }
            $centred = false;
            foreach ($widgets as $widget) {
                 $is_simple = ('simple' == $widget['style']);
                 if ($is_simple) {
                     $widget['class'] = implode(' ', array_merge(explode(' ', theme_get_array_value($widget, 'class', '')), array('footer-text')));
                 }
                 if (false === $centred && $is_simple) {
                     $centred = true;
                     echo $centred_begin;
                 }
                 if (true === $centred && !$is_simple) {
                     $centred = false;
                     echo $centred_end;
                 }
                 theme_print_widget($widget);
            } 
            if (true === $centred) {
                echo $centred_end;
            }
            if ($needLayout) {
           ?>
            </div>
        <?php 
            }
        } 
        if ($needLayout) { ?>
    </div>
</div>
        <?php 
        }
    }
?>
<div class="footer-text">
<?php
global $theme_default_options;
echo do_shortcode(theme_get_option('theme_override_default_footer_content') ? theme_get_option('theme_footer_content') : theme_get_array_value($theme_default_options, 'theme_footer_content'));
} else { 
?>
<div class="footer-text">

<div class="content-layout-wrapper layout-item-0">
<div class="content-layout">
    <div class="content-layout-row">
    <div class="layout-cell layout-item-1" style="width: 100%">
        <p style="text-align: center;"><span style="font-style: normal; font-weight: bold;">&nbsp;<span style="font-size: 14px;">© 2015&nbsp;</span></span></p><p><span style="font-style: normal; font-weight: bold; font-size: 14px;">Рекламно-производственная компания</span></p><p style="text-align: center;"><span style="font-size: 14px;">&nbsp;<a href="<?php theme_ob_start() ?>[post_link name='/%d0%bd%d0%b0%d1%87%d0%b0%d0%bb%d0%be']<?php echo do_shortcode(theme_ob_get_clean()) ?>"><img width="45" height="58" alt="" src="<?php echo get_template_directory_uri() ?>/images/d22222_1.png" style="margin-top: 0px;" class=""></a></span><br></p>
    </div>
    </div>
</div>
</div>


<?php } ?>

</div>
