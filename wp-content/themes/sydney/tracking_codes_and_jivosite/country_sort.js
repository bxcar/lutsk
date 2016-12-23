jQuery(document).ready(function () {

    var h1 = document.getElementById("multi-title");
    var str = h1.innerHTML;
    //alert(str);
    var id;
    if (str.indexOf('Египет') + 1) {
        id = 'Египет';
    } else if (str.indexOf('Болгарию') + 1) {
        id = 'Болгария';
    } else if (str.indexOf('Турцию') + 1) {
        id = 'Турция';
    } else if (str.indexOf('Грецию') + 1) {
        id = 'Греция';
    } else if (str.indexOf('Испанию') + 1) {
        id = 'Испания';
    } else if (str.indexOf('Кипр') + 1) {
        id = 'Кипр';
    } else if (str.indexOf('Черногорию') + 1) {
        id = 'Черногория';
    } else if (str.indexOf('Хорватию') + 1) {
        id = 'Хорватия';
    } else if (str.indexOf('Мальдивы') + 1) {
        id = 'Мальдивы';
    } else if (str.indexOf('Шри-Ланку') + 1) {
        id = 'Шри-Ланка';
    } else if (str.indexOf('ОАЭ') + 1) {
        id = 'ОАЭ';
    } else if (str.indexOf('Францию') + 1) {
        id = 'Франция';
    } else if (str.indexOf('Италию') + 1) {
        id = 'Италия';
    } else if (str.indexOf('Занзибар') + 1) {
        id = 'Занзибар';
    } else if (str.indexOf('Доминикану') + 1) {
        id = 'Доминикана';
    } else if (str.indexOf('Индию') + 1) {
        id = 'Индия';
    } else if (str.indexOf('Тайланд') + 1) {
        id = 'Тайланд';
    } else if (str.indexOf('Индонезию') + 1) {
        id = 'Индонезия';
    } else if (str.indexOf('Чехию') + 1) {
        id = 'Чехия';
    } else if (str.indexOf('Европу') + 1) {
        id = 'Европа';
    } else if (str.indexOf('Израиль') + 1) {
        id = 'Израиль';
    } else {
        id = 'Все страны';
    }


    jQuery("#fon").css({'display': 'block'});
    jQuery("#load").fadeIn(1000, function () {
        jQuery.ajax({
            url: '/wp-content/themes/sydney/content.php',
            data: 'sort_id=' + id,
            type: 'get',
            success: function (html) {
                jQuery("#primary").html(html).hide().fadeIn(2000);
                jQuery("#fon").css({'display': 'none'});
                jQuery("#load").fadeOut(500);
            },
            error: function (html) {
                alert("Error");
            }
        });
    });

    jQuery.ajax({
        url: '/wp-content/themes/sydney/content.php',
        data: 'select_id=all_country',
        type: 'get',
        success: function (html) {
            jQuery("#country-select").html(html).hide().fadeIn(2000);
            jQuery("#country-select").val(id);
        },
        error: function (html) {
            alert("Error");
        }
    });
});