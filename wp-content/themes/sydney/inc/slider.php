<?php
/**
 * Slider template
 *
 * @package Sydney
 */

//Slider template
if ( ! function_exists( 'sydney_slider_template' ) ) :
function sydney_slider_template() {

    if ( (get_theme_mod('front_header_type','slider') == 'slider' && is_front_page()) || (get_theme_mod('site_header_type') == 'slider' && !is_front_page()) ) {

    //Get the slider options
    $speed      = get_theme_mod('slider_speed', '4000');
    $text_slide = get_theme_mod('textslider_slide', 0);

    //Slider text
    if ( !function_exists('pll_register_string') ) {
        $slider_title_1     = get_theme_mod('slider_title_1', 'Welcome to Sydney');
        $slider_title_2     = get_theme_mod('slider_title_2', 'Ready to begin your journey?');
        $slider_title_3     = get_theme_mod('slider_title_3');
        $slider_title_4     = get_theme_mod('slider_title_4');
        $slider_title_5     = get_theme_mod('slider_title_5');
        $slider_subtitle_1  = get_theme_mod('slider_subtitle_1','Feel free to look around');
        $slider_subtitle_2  = get_theme_mod('slider_subtitle_2', 'Click the button below');
        $slider_subtitle_3  = get_theme_mod('slider_subtitle_3');
        $slider_subtitle_4  = get_theme_mod('slider_subtitle_4');
        $slider_subtitle_5  = get_theme_mod('slider_subtitle_5');
    } else {
        $slider_title_1     = pll__(get_theme_mod('slider_title_1', 'Welcome to Sydney'));
        $slider_title_2     = pll__(get_theme_mod('slider_title_2', 'Ready to begin your journey?'));
        $slider_title_3     = pll__(get_theme_mod('slider_title_3'));
        $slider_title_4     = pll__(get_theme_mod('slider_title_4'));
        $slider_title_5     = pll__(get_theme_mod('slider_title_5'));
        $slider_subtitle_1  = pll__(get_theme_mod('slider_subtitle_1','Feel free to look around'));
        $slider_subtitle_2  = pll__(get_theme_mod('slider_subtitle_2', 'Click the button below'));
        $slider_subtitle_3  = pll__(get_theme_mod('slider_subtitle_3'));
        $slider_subtitle_4  = pll__(get_theme_mod('slider_subtitle_4'));
        $slider_subtitle_5  = pll__(get_theme_mod('slider_subtitle_5'));  
    }

    ?>
    <div id="slideshow" class="header-slider" data-speed="<?php echo esc_attr($speed); ?>">
        <div class="slides-container">
            <?php 
                if ( get_theme_mod('slider_image_1', get_template_directory_uri() . '/images/1.png') ) {
                    echo '<div class="slide-item" style="background-image:url(' . esc_url(get_theme_mod('slider_image_1', get_template_directory_uri() . '/images/1.jpg')) . ');">';
                    ?>
                    <div class="overlay-main"></div>
                        <div class="slide-inner">
                            <div class="contain animated fadeInRightBig text-slider text-slider-none">
                                <a class="abs-link modal-link" href="#works"><span>Як це праціює?</span></a>
                                <h1 id="multi-title" class="maintitle maintitle-none">Гарячі тури<br> з гарантією <span style="color: #ff5516;">КРАЩОЇ</span> ціни в<br> Луцьку<?php //echo esc_html($slider_title_1); ?></h1>
                                <p class="subtitle subtitle-none"><?php echo esc_html($slider_subtitle_1); ?></p>
                            </div>
                            <?php sydney_slider_button(); ?>
                        </div>
                    <?php
                    echo '</div>';
//                    echo '<div class="overlay"></div>';
                
                }
                if ( get_theme_mod('slider_image_2', get_template_directory_uri() . '/images/2.jpg') ) {
                    echo '<div class="slide-item" style="background-image:url(' . esc_url(get_theme_mod('slider_image_2', get_template_directory_uri() . '/images/2.jpg')) . ');">';
                    ?>
                    <div class="overlay-main"></div>
                        <div class="slide-inner">
                            <div class="contain animated fadeInRightBig text-slider">
                                <h2 class="maintitle"><?php echo esc_html($slider_title_2); ?></h2>
                                <p class="subtitle"><?php echo esc_html($slider_subtitle_2); ?></p>
                            </div>
                            <?php sydney_slider_button(); ?> 
                        </div>                   
                    <?php
                    echo '</div>';
//                    echo '<div class="overlay"></div>';
                }           
                if ( get_theme_mod('slider_image_3') ) {
                    echo '<div class="slide-item" style="background-image:url(' . esc_url(get_theme_mod('slider_image_3')) . ');">';
                    ?>
                        <div class="slide-inner">                    
                            <div class="contain animated fadeInRightBig text-slider">
                                <h2 class="maintitle"><?php echo esc_html($slider_title_3); ?></h2>
                                <p class="subtitle"><?php echo esc_html($slider_subtitle_3); ?></p>
                            </div>
                            <?php sydney_slider_button(); ?>
                        </div>                         
                    <?php                    
                    echo '</div>';
                }
                if ( get_theme_mod('slider_image_4') ) {
                    echo '<div class="slide-item" style="background-image:url(' . esc_url(get_theme_mod('slider_image_4')) . ');">';
                    ?>
                        <div class="slide-inner">                                        
                            <div class="contain animated fadeInRightBig text-slider">
                                <h2 class="maintitle"><?php echo esc_html($slider_title_4); ?></h2>
                                <p class="subtitle"><?php echo esc_html($slider_subtitle_4); ?></p>
                            </div>
                            <?php sydney_slider_button(); ?>
                        </div>                        
                    <?php                    
                    echo '</div>';
                }
                if ( get_theme_mod('slider_image_5') ) {
                    echo '<div class="slide-item" style="background-image:url(' . esc_url(get_theme_mod('slider_image_5')) . ');">';
                    ?>
                        <div class="slide-inner">                                                            
                            <div class="contain animated fadeInRightBig text-slider">
                                <h2 class="maintitle"><?php echo esc_html($slider_title_5); ?></h2>
                                <p class="subtitle"><?php echo esc_html($slider_subtitle_5); ?></p>
                            </div>
                            <?php sydney_slider_button(); ?> 
                        </div>                                              
                    <?php                    
                    echo '</div>';
                }               
            ?>  
        </div>        
    </div>

    <?php if ( $text_slide ) : ?>
        <?php echo sydney_stop_text(); ?>
    <?php endif; ?>

    <?php
    }
}
endif;

function sydney_slider_button() {

    if ( !function_exists('pll_register_string') ) {
        $slider_button      = get_theme_mod('slider_button_text', 'Click to begin');
        $slider_button_url  = get_theme_mod('slider_button_url','#goto-from-top-button');
    } else {
        $slider_button      = pll__(get_theme_mod('slider_button_text', 'Click to begin'));
        $slider_button_url  = pll__(get_theme_mod('slider_button_url','#goto-from-top-button')); //#primary
    }

    if ($slider_button) {
        echo '<a style="display: none;" href="' . esc_url($slider_button_url) . '" class="roll-button button-slider">' . esc_html($slider_button) . '</a>
       
                <div class="top-form-container">
                    <div class="form-descr box">
                        <h3>Отримайте <span class="discount-size">знижку</span> <br/>
                            1000&nbsp;грн. на тур*</h3>

                        <p><span>Акція!</span> Даруємо сертифікат на 1000&nbsp;грн. на придбання туру*
                            всім
                            відвідувачам
                            сайту. <br/>
                            Просто заповніть форму.</p>

                        <p><span>Залишилось усього 7 сертифікатів!</span></p>
                    </div>
                    <div class="sidebar-column col-md-4">
                        <aside id="text-2" class="widget widget_text"><h3 class="widget-title"
                                                                          style="text-align: left; width: 93%;">
                                Заповніть форму зараз</h3>
                            <p class="under-header-in-form">та отримайте 5 варіантів відпочинку з докладним розрахунком цін</p>
                            <div class="textwidget">
<!--                                <div role="form" class="wpcf7" id="wpcf7-f47-o1" lang="ru-RU" dir="ltr">-->
                                    <div class="screen-reader-response"></div>
                                    <form onsubmit="loaderMainFormTop();" id="contact-form" action="/thanks/" method="post"
                                          class="wpcf7-form">
                                        <!--action="/#wpcf7-f47-o1"-->
                                        <div style="display: none;">
                                            <input type="hidden" name="order" value="Верхняя форма на главной странице">
                                        </div>
                                            <span class="wpcf7-form-control-wrap your-name"><input required type="text"
                                                                                                   style="width: 100%;"
                                                                                                   name="your-name"
                                                                                                   placeholder="Ваше ім\'я*"
                                                                                                   value="" size="40"
                                                                                                   class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required"
                                                                                                   aria-required="true"
                                                                                                   aria-invalid="false"></span>

                                            <span class="wpcf7-form-control-wrap tel-564"><input required type="tel"
                                                                                                 style="width: 100%;"
                                                                                                 name="tel-564"
                                                                                                 placeholder="Контактний телефон*"
                                                                                                 value=""
                                                                                                 size="40"
                                                                                                 class="wpcf7-form-control wpcf7-text wpcf7-tel wpcf7-validates-as-tel"
                                                                                                 aria-invalid="false"></span>

                                            <span class="wpcf7-form-control-wrap your-message"><textarea
                                                    name="your-message"
                                                    placeholder="Побажання до туру*"
                                                    cols="40" rows="10"
                                                    class="wpcf7-form-control wpcf7-textarea"
                                                    aria-invalid="false"></textarea></span> </label></p>
                                        <p><input id="submit-but" type="submit" value="Розрахувати">
                                        </p>
                                        <div class="wpcf7-response-output wpcf7-display-none"></div>
                                    </form>
                                    <p class="form-text2">Ми зателефонуємо вам через 10 хвилин, засікайте!</p>
                                </div>
                            </div>
                        </aside>
<!--                    </div>-->
                </div>
                ';
    }
}

function sydney_stop_text() {

    if ( !function_exists('pll_register_string') ) {
        $slider_title_1     = get_theme_mod('slider_title_1', 'Welcome to Sydney');
        $slider_subtitle_1  = get_theme_mod('slider_subtitle_1','Feel free to look around');
    } else {
        $slider_title_1     = pll__(get_theme_mod('slider_title_1', 'Welcome to Sydney'));
        $slider_subtitle_1  = pll__(get_theme_mod('slider_subtitle_1','Feel free to look around')); 
    }

    ?>    
    <div class="slide-inner text-slider-stopped">
        <div class="contain text-slider">
            <h2 class="maintitle"><?php echo esc_html($slider_title_1); ?></h2>
            <p class="subtitle"><?php echo esc_html($slider_subtitle_1); ?></p>
        </div>
        <?php sydney_slider_button(); ?>
    </div>   
    <?php 
}