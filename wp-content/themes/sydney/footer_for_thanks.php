<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 13.11.2016
 * Time: 22:51
 */

/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Sydney
 */
?>
</div>
</div>
</div><!-- #content -->

<?php if (is_active_sidebar('footer-1')) : ?>
    <?php get_sidebar('footer'); ?>
<?php endif; ?>

<a class="go-top"><i class="fa fa-angle-up"></i></a>
<!--<div style="position: relative;">-->

<!--</div>-->
<?php wp_footer(); ?>
<footer style="position: absolute; bottom: 0; width: 100%;" id="colophon" class="site-footer" role="contentinfo">
    <div class="grid foot">
        <p class="f-text1 box">ООО «МАКИНТУР» <br/>
            ЕГРПОУ: 36480659 <br/>
            <a class="popmake-515" href="#">Платежная информация</a><br/>
            моб. +38 096 595 01 01
        </p>

        <p class="f-text2 box">г.&nbsp;Борисполь, <br/>
            ул.&nbsp;Киевский шлях, 76-а, <br/>офис 97<br>
            <span>e-mail:</span> info@makintour.com</p>

        <p class="f-text3 box">
            <a class="popmake-158 modal-link" href="#">Соглашение об обработке персональных данных.</a><br/>

            <a class="popmake-bank modal-link" href="#">Банковская гарантия</a><br/>
        </p>
    </div>
</footer><!-- #colophon -->
</div><!-- #page -->
</body>
</html>
