$(document).ready(function(){

    /* init fancybox */

    $(".modal-link").fancybox({
        'padding' : 0,
        'background' : 'none'

    });

    /* masked input */

    $(".phone").mask("+38-999-999-9999",{placeholder:"_"});


    /* Date */

    var resDate,
        D1 = new Date(),
        D2 = new Date();

    D1.setDate( D1.getDate() - 8);
    D2.setDate( D2.getDate() - 1);

    Day1 = (D1.getDate() ).toString().replace( /^([0-9])$/, '0$1' );
    Month1 = (D1.getMonth()+1).toString().replace( /^([0-9])$/, '0$1' );
    Day2 = (D2.getDate() ).toString().replace( /^([0-9])$/, '0$1' );
    Month2 = (D2.getMonth()+1).toString().replace( /^([0-9])$/, '0$1' );

    resDate = Day1 + "." + Month1 + " по " + Day2 + "." + Month2;

    $('.date-val').text(resDate);


    var formOrder = 'форма 1';	
	var cntry = '';
    $('.product-link').click(
        function(){
			cntry = $(this).attr('country');
			formOrder = cntry+', '+$(this).attr('data-order');			
            console.log(formOrder);
				if (cntry){	
					$("h5").html(formOrder);
				}
        });


    $('.img-link').click(
        function(){
            $('#modal-pic').attr('src', $(this).attr('data-img'));
        });

    //form



    $('.form').submit( function(e){
        e.preventDefault();
        var $form = $(this);
        $form.append(" <input type='hidden' id='order' name='order' value=' " + formOrder + " ' /> " +
        " <input type='hidden' id='source' name='source' value=' " + document.location.href + " ' /> " +
            "<div class='sending'><em>отправка...</em></div>");
        $.ajax({
            type: 'POST',
            url: 'sendmessage.php',
            data: $form.serialize(),
            success: function(data) {
                if(data == "true") {
                    $('.text-field').val('');
                    document.location.href = 'thanks.html'
                }
            }
        });
    });

    /*

    $('.form').submit( function(e){
        e.preventDefault();
        document.location.href = 'thanks.html'
    });
     */

    $('.team-img img').hover( function() {
        var newSrc = $(this).attr('data-img');
        oldSrc = $(this).attr('src');
        $(this).attr('src', newSrc);
    }, function(){
        $(this).attr('src', oldSrc);
    })
});


