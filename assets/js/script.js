//solo numeros
    function numeros(numero) { // 1
        tecla = (document.all) ? numero.keyCode : numero.which; // 2
        if (tecla==0 || tecla==8 || tecla==46) return true; // 3
        //alert(tecla);
        patron = /\d/; // Solo acepta números
        te = String.fromCharCode(tecla); // 5
        return patron.test(te); // 6
    }

//Telefono
    function isTelephone(numero) { // 1
        tecla = (document.all) ? numero.keyCode : numero.which; // 2
        if (tecla==0 || tecla==8 || tecla==40 || tecla==41 || tecla==45 || tecla==46) return true; // 3
        //alert(tecla);
        patron = /\d/; // Solo acepta números
        te = String.fromCharCode(tecla); // 5
        return patron.test(te); // 6
    }

//solo letras
    function isNumber(e) {
    k = (document.all) ? e.keyCode : e.which;
    if (k==8 || k==0) return true;
    patron = /\D/;
    n = String.fromCharCode(k);
    return patron.test(n);
}

$(function(){

    //Animalitos
    $('.label-animal').click(function(){
        numero = $(this).attr('nume');
        horas = $(".hora:checked");
        clases = $('.check-ani[num="'+numero+'"]').attr('class');
        if(clases == 'col-md-4 col-sm-4 col-xs-6 check-ani bg-teal'){
            $('.check-ani[num="'+numero+'"]').removeClass('bg-teal');
            $('.tr-'+numero).css('display','none');
            valor = $('.input-checkbox-animalito[id="animal_'+numero+'"]').attr('costo');
            sub_total = $('#sub-total').text();
            if(sub_total == '0'){
                resta = '0'
            }else{
                resta = sub_total-valor;
            }
            $('#sub-total').text(resta);
            total = (horas.length)*resta;
            $('#total').text(total);
            $('#costo_total').val(total);
            $('.input-checkbox-animalito[id="animal_'+numero+'"]').removeAttr('costo');
            $('.animal-'+numero).text('');
        }else{
            $('.check-ani[num="'+numero+'"]').addClass('bg-teal');
            $('.tr-'+numero).removeAttr('style');
            $('.animal-'+numero).text('0');
            $('.input-checkbox-animalito[id="animal_'+numero+'"]').removeAttr('costo');
        }
    });

    //Hora
    $('.label-hora').click(function(){
        este = $(this).attr('for');
        check = $('#'+este).attr('disabled');
        sub_total = $('#sub-total').text();
        cantidad = $(".hora:checked");
        if(check != 'disabled'){
            style = $('.td-hora span.'+este).attr('style');
            if(style == 'display: none;'){
                multi = (cantidad.length+1)*sub_total;
                $('.td-hora span.'+este).css('display','inline-block');
                $('#total').text(multi);
                $('#costo_total').val(multi);
            }else{
                divid = (cantidad.length-1)*sub_total;
                $('.td-hora span.'+este).css('display','none');
                if(divid == 0){
                   $('#total').text(sub_total);
                   $('#costo_total').val(sub_total);
                }else{
                    $('#total').text(divid);
                    $('#costo_total').val(divid);
                }
            }
        }
    });

    //Monto
    $('#monto').change(function(){
        monto = $(this).val();
        $('.td-costo').each(function(){
            horas = $(".hora:checked");
            sub_total = $('#sub-total').text();
            costo = $(this).text();
            if(costo == '0'){
                $(this).text(monto);
                suma = parseInt(monto)+parseInt(sub_total);
                $('#sub-total').text(suma);
                if(horas.length == '0'){
                    $('#total').text(suma);
                    $('#costo_total').val(suma);
                }else{
                    total = horas.length*suma;
                    $('#total').text(total);
                    $('#costo_total').val(total);
                }
                //colocar value
                id = $(this).attr('id');
                numero = $('.input-checkbox-animalito[id="ani'+id+'"]').data('num');
                animal = $('.input-checkbox-animalito[id="ani'+id+'"]').data('animal');
                $('.input-checkbox-animalito[id="ani'+id+'"]').val(numero+':'+animal+':'+monto);
                $('.input-checkbox-animalito[id="ani'+id+'"]').attr('costo', monto);
            }
        });
        $(this).val('');
    });

    //Numero
    $('#numero').change(function(){
        scroll = $(document).scrollTop();
        numero = $(this).val();
        $('.tr-'+numero).removeAttr('style');
        costo = $('.animal-'+numero).text();
        if(costo == ''){
            $(".label-animal[for='animal_"+numero+"']").click();
            $(document).scrollTop(scroll);
        }
        $(this).val('');
    });

    //Edicion
    $('.td-costo').focus(function(){
        costo_ini = $(this).text();
        sub_total = $('#sub-total').text();
        $(this).change(function(){
            resta = parseInt(sub_total)-parseInt(costo_ini);
            costo = $(this).text();
            suma = parseInt(costo)+parseInt(resta);
            $('#sub-total').text(suma);
            horas = $(".hora:checked");
            if(horas.length == 0){
                $('#total').text(suma);
                $('#costo_total').val(suma);
            }else{
                total = horas.length*suma;
                $('#total').text(total);
                $('#costo_total').val(total);
            }
            //colocar value
            id = $(this).attr('id');
            numero = $('.input-checkbox-animalito[id="ani'+id+'"]').data('num');
            animal = $('.input-checkbox-animalito[id="ani'+id+'"]').data('animal');
            $('.input-checkbox-animalito[id="ani'+id+'"]').val(numero+':'+animal+':'+costo);
            $('.input-checkbox-animalito[id="ani'+id+'"]').attr('costo', costo);
        });
    });

    //reset-ani
    $('#reset-ani').click(function(){
        $('.check-ani').removeClass('bg-teal');
        $('.td-hora span').css('display','none');
        $('.input-checkbox-animalito').removeAttr('checked');
        $('.tr-animales').css('display','none');
        $('.td-costo').text('');
        $('#sub-total').text('0');
        $('#total').text('0');
    });

    //Redireccion de status user
    $('.lever-user').click(function(){
        id = $(this).attr('id');
        checked = $('#lever-'+id).attr('checked');
        if(checked == 'checked'){
            window.location = 'status/'+id+'/0';
        }else{
            window.location = 'status/'+id+'/1';
        }
    });

    //Redireccion de status config
    $('.lever-defecto').click(function(){
        id = $(this).attr('id');
        checked = $('#lever-'+id).attr('checked');
        if(checked == 'checked'){
            window.location = 'status_defecto/'+id+'/0';
        }else{
            window.location = 'status_defecto/'+id+'/1';
        }
    });

    //Validaciones de usuarios
    $('#submit-user').click(function(e){
        correo  = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
        email   = $('#email').val();
        if(!correo.test(email) && email != ''){
            e.preventDefault();
            $('#form-email').addClass('focused error');
        }else{
            $('#form-email').removeClass('focused error');
        }

    });

    //reset-ani
    $('#reset-play').click(function(){
        $('.check-ani').removeClass('bg-teal');
        $('.hora').removeAttr('checked');
        $('.input-checkbox-animalito').removeAttr('checked');
        $('.tr-animales').css('display','none');
        $('.td-costo').text('');
        $('#sub-total').text('0');
    });

    //validacion de ventas
    $('#submit-play').click(function(e){
        animalitos = $('.input-checkbox-animalito:checked');
        hora = $(".hora:checked");
        cerrado = $('#hora_19').attr('disabled');
        if(cerrado == 'disabled'){
            e.preventDefault();
            $('#btn-cerrado').click();
        }else{
            if(hora.length == 0){
                e.preventDefault();
                $('#btn-hora').click();
            }
            if(animalitos.length == 0){
                e.preventDefault();
                $('#btn-animal').click();
            }
            $('.td-costo').each(function(){
                cantidad = $(this).text();
                if(cantidad == '0'){
                    e.preventDefault();
                    $('#btn-falta').click();
                    return false;
                }
            });
        }
    });
	
});