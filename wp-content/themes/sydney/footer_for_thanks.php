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
        <p class="f-text1 box">ТОВ «МАКІНТУР» <br/>
            ЄДРПОУ: 36480659 <br/>
            <a class="popmake-515" href="#">Платіжна інформація</a><br/>
            моб. +38 096 595 01 01
        </p>

        <p class="f-text2 box">м.&nbsp;Луцьк, <br/>
            вул.&nbsp;Кривий Вал <span style="white-space:nowrap;">34</span>, <br/>оф.201<br>
            <span class="span-none">e-mail:</span> lutsk@makintour.com</p>

        <p class="f-text3 box">
            <a class="popmake-158 modal-link" href="#">Згода на обробку персональних даних.</a><br/>

            <a class="popmake-bank modal-link" href="#">Банківська гарантія</a><br/>
        </p>
    </div>
</footer><!-- #colophon -->
</div><!-- #page -->
</body>
</html>
