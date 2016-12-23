<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Sydney
 */
?>

<div class="prev about-prev">
    <h2>Принципы работы компании</h2>
    <div class="prev-item prev-item-about" id="prev_item_1">
        <img src="/wp-content/themes/sydney/img/icons_about/quality.png" width="61" height="64">
        <p class="title">Качество.</p>
        <p class="text">Мы не перестаем работать над улучшением уровня предлагаемых услуг, что бы
            сделать ваш отдых еще более комфортным и увлекательным. Менеджеры нашей компании повышают квалификацию
            и совершенствуют знания о различных направлениях.</p>
    </div>

    <div class="prev-item prev-item-about" id="prev_item_2">
        <img src="/wp-content/themes/sydney/img/icons_about/form.png" width="61" height="64">
        <p class="title">Ответственность.</p>
        <p class="text">Наша компания своевременно и качественно выполняет взятые на себя обязательства и гарантирует
            реализацию своего главного кредо – Надежность.</p>
    </div>

    <div class="prev-item prev-item-about" id="prev_item_3">
        <img src="/wp-content/themes/sydney/img/icons_about/bugs_work.png" width="61" height="64">
        <p class="title">Работа над ошибками.</p>
        <p class="text">Мы открыты к диалогу и будем рады услышать все ваши замечания и пожелания.
            Мы хотим становиться лучше для вас!</p>
    </div>

    <div class="prev-item prev-item-about" id="prev_item_4">
        <img src="/wp-content/themes/sydney/img/icons_about/relevance.png" width="61" height="64">
        <p class="title">Актуальность.</p>
        <p class="text">Компания «Coral Travel» следит за обновлениями баз отелей и рейсов и предлагает вам самые
            свежие и актуальные варианты. Мы подберем уникальный тур согласно вашим пожеланиям.</p>
    </div>

    <div class="prev-item prev-item-about" id="prev_item_4">
        <img src="/wp-content/themes/sydney/img/icons_about/loyalty.png" width="61" height="64">
        <p class="title">Лояльность по отношению к нашим клиентам.</p>
        <p class="text">Менеджеры нашей компании постараются найти для вас самый выгодный и оптимальный тур,
            и всегда рады ознакомить вас с системами скидок и специальных предложений.</p>
    </div>
</div>


<div class="container content-wrapper">
    <div class="row">
        <p>Приоритетной задачей компании «Coral Travel» является подбор и организация для наших клиентов
            идеального отдыха, так что бы вы захотели путешествовать с нами снова и снова.
            С большим удовольствием ждем вас по адресу: г.Борисполь, ул. Киевский Шлях, 2/6 - ТРЦ Аэромолл.</p>
    </div>
</div>
<section class="team" style="padding-top: 30px;">
    <div class="grid">
        <p class="team-text">Наши эксперты подберут и рассчитают для вас 5 вариантов отдыха за 10&nbsp;минут.</p>

        <h2>Проверьте нас прямо сейчас!</h2>

        <div class="team-item box">
            <div class="team-img Dunai"></div>
            <div class="team-info">
                <h3>Вознюк Адриана</h3>

                <p class="team-tel">+38 099 213-95-55<br><span style="font-size: 12px">(Viber, WhatsApp)</span></p>
                <!--<p class="viber-whatsapp"><span>(Viber, WhatsApp)</span> +38 099 213-95-55</p>-->

                <p class="team-mail">info@coralborispol.com</p>


                <p class="team-year">7 лет в туризме</p>

                <a href="#" class="popmake-129 modal-link product-link img-link"
                   data-order="Проверьте нас (Наталия)"
                   data-img="http://www.makintour.com/uploads/Dunai.jpg">Задайте мне вопрос</a>
            </div>
        </div>

        <div class="team-item box">
            <div class="team-img Desyatnik">
            </div>
            <div class="team-info">
                <h3>Легкая Людмила</h3>

                <p class="team-tel">+38 099 213-95-55<br><span style="font-size: 12px">(Viber, WhatsApp)</span></p>
                <!--<p class="viber-whatsapp"><span>(Viber, WhatsApp)</span> +38 099 213-95-55</p>-->

                <p class="team-mail">info@coralborispol.com</p>

                <p class="team-year">12 лет в туризме</p>

                <a href="#" class="popmake-from_2 modal-link product-link img-link"
                   data-order="Проверьте нас (Владимир)"
                   data-img="http://www.makintour.com/uploads/Desyatnik.JPG">Задайте мне вопрос</a>
            </div>
        </div>

        <div class="team-item box">
            <div class="team-img Chorna"></div>
            <div class="team-info">
                <h3>Тютюн Анна</h3>

                <p class="team-tel">+38 099 213-95-55<br><span style="font-size: 12px">(Viber, WhatsApp)</span></p>
                <!--<p class="viber-whatsapp"><span>(Viber, WhatsApp)</span> +38 099 213-95-55</p>-->

                <p class="team-mail">info@coralborispol.com </p>

                <p class="team-year">6 лет в туризме</p>

                <a href="#" class="popmake-form_1 modal-link product-link img-link"
                   data-order="Проверьте нас (Юлия)"
                   data-img="http://www.makintour.com/uploads/Chorna.jpg">Задайте мне вопрос</a>
            </div>
        </div>
    </div>
</section>
</div>
</div>
</div><!-- #content -->

<?php if (is_active_sidebar('footer-1')) : ?>
    <?php get_sidebar('footer'); ?>
<?php endif; ?>

<a class="go-top"><i class="fa fa-angle-up"></i></a>

<footer id="colophon" class="site-footer" role="contentinfo">
    <div class="grid foot">
        <p class="f-text1 box">ООО «ХОРОШЕЕ АГЕНСТВО» <br/>
            ЕГРПОУ: 39818659 <br/>
            <a class="popmake-515" href="#">Платежная информация</a><br/>
            моб. +38 098 11 69 555
        </p>

        <p class="f-text2 box">г.&nbsp;Борисполь, <br/>
            ул.&nbsp;Киевский шлях, 2/6, <br/>ТРЦ «АЕРОМОЛ»<br>
            <span>e-mail:</span> info@coralborispol.com</p>

        <p class="f-text3 box">
            <a class="popmake-158 modal-link" href="#">Соглашение об обработке персональных данных.</a><br />

            <a class="popmake-bank modal-link" href="#">Банковская гарантия</a><br />
        </p>
    </div>
</footer><!-- #colophon -->
<?php wp_footer(); ?>
</div><!-- #page -->
</body>
</html>
