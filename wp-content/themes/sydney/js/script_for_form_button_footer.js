var i = 0;
window.onload = function () {
    document.getElementById('contact-form').addEventListener('submit', function (evt) {
        var loading = document.getElementById("submit-but");
        loading.setAttribute("value", "");
        loading.setAttribute("style",
            "background: url(/wp-content/themes/sydney/img/post_preloader.gif) 50% 50% no-repeat #0088e7");
    }, false);

    document.getElementById('contact-form').addEventListener('DOMNodeInserted', function (evt) {
        var loading = document.getElementById("submit-but");
        loading.setAttribute("value", "Отправить");
        loading.setAttribute("style",
            "background: #0088e7; color: #fff;");

        if(loading.style.color == '#0088e7') {
            loading.onmouseover = function () {
                loading.style.color = '#fff';
                loading.style.background = 'url(/wp-content/themes/sydney/img/post_preloader.gif) 50% 50% no-repeat #0088e7';
                /*loading.setAttribute("style",
                 "background: url(/wp-content/themes/sydney/img/post_preloader.gif) 50% 50% no-repeat #0088e7; color: #fff;");*/
            };
            loading.onmouseout = function () {
                loading.style.color = '#fff';
                loading.style.background = 'url(/wp-content/themes/sydney/img/post_preloader.gif) 50% 50% no-repeat #0088e7';
                /*loading.setAttribute("style",
                 "background: url(/wp-content/themes/sydney/img/post_preloader.gif) 50% 50% no-repeat #0088e7; color: #fff;");*/
            };
        }
        else if(loading.style.background == '#0088e7') {
            loading.onmouseover = function () {
                loading.style.color = '#0088e7';
                loading.style.background = '#fff';
                /*loading.setAttribute("style",
                 "background: url(/wp-content/themes/sydney/img/post_preloader.gif) 50% 50% no-repeat #0088e7; color: #fff;");*/
            };
            loading.onmouseout = function () {
                loading.style.color = '#fff';
                loading.style.background = '#0088e7';
                /*loading.setAttribute("style",
                 "background: url(/wp-content/themes/sydney/img/post_preloader.gif) 50% 50% no-repeat #0088e7; color: #fff;");*/
            };
        }
//                }
        i++;
    });
};