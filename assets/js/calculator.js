//solo numeros
function numCalculator(numero) { // 1
    tecla = (document.all) ? numero.keyCode : numero.which; // 2
    if (tecla==0 || tecla==8 || tecla ==45 || tecla==46) return true; // 3
    //alert(tecla);
    patron = /\d/; // Solo acepta números
    te = String.fromCharCode(tecla); // 5
    return patron.test(te); // 6
}

$(function(){

    $('.calculator').click(function(){
        setTimeout(clickNum, 800);
        function clickNum() {
            $('#num-1').focus();
        }
    });

    $('.btn-cal').click(function(){
        $('.btn-cal').removeClass('bg-teal');
        $(this).addClass('bg-teal');
        text = $(this).text();
        $('.label-operation').text(text);
        numResult = $('#num-result').val();
        if(numResult != ''){
            $('#num-1').val(numResult);
            $('#num-2').val('');
            $('#num-result').val('');
            $('#num-2').focus();
        }else{
            num1 = $('#num-1').val();
            num2 = $('#num-2').val();
            if(num1 == ''){
                $('#num-1').focus();
            }else if(num2 == ''){
                $('#num-2').focus();
            }
        }
    });

    $('#cal-igu').click(function(){
        num1 = parseInt($('#num-1').val());
        num2 = parseInt($('#num-2').val());
        operacion = $('.btn.bg-teal').attr('id');
        if(operacion == 'cal-sum'){
            result = num1+num2;
            $('#num-result').val(result);
        }
        if(operacion == 'cal-res'){
            result = num1-num2;
            $('#num-result').val(result);
        }
        if(operacion == 'cal-div'){
            result = num1/num2;
            $('#num-result').val(result);
        }
        if(operacion == 'cal-mul'){
            result = num1*num2;
            $('#num-result').val(result);
        }
        $('.btn-cal').removeClass('bg-teal');
    });

    $('#cal-ce').click(function(){
        $('#num-1').val('');
        $('.label-operation').html('&nbsp;');
        $('#num-2').val('');
        $('#num-result').val('');
        $('.btn-cal').removeClass('bg-teal');
    });
	
});