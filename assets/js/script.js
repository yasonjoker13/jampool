//solo numeros
    function numeros(numero) { // 1
        tecla = (document.all) ? numero.keyCode : numero.which; // 2
       if (tecla==0 || tecla==8 || tecla==46) return true; // 3
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
        clases = $('.check-ani[num="'+numero+'"]').attr('class');
        hora = $('.hora[checked="checked"]').val();
        if(hora == null){
            hora = '00:00 MM';
        }
        if(clases == 'col-md-4 col-sm-4 col-xs-6 check-ani bg-teal'){
            $('.check-ani[num="'+numero+'"]').removeClass('bg-teal');
            $('.tr-'+numero).css('display','none');
            valor = $('.input-checkbox-animalito[id="animal_'+numero+'"]').attr('costo');
            total = $('#total').text();
            if(total == '0'){
                resta = '0'
            }else{
                resta = total-valor;
            }
            $('#total').text(resta);
            $('#costo_total').val(resta);
            $('.input-checkbox-animalito[id="animal_'+numero+'"]').removeAttr('costo');
            $('.animal-'+numero).text('');
        }else{
            $('.check-ani[num="'+numero+'"]').addClass('bg-teal');
            $('.tr-'+numero).removeAttr('style');
            $('.td-hora').text(hora);
            $('.animal-'+numero).text('0');
            $('.input-checkbox-animalito[id="animal_'+numero+'"]').removeAttr('costo');
        }
    });

    //Hora
    $('.label-hora').click(function(){
        este = $(this).attr('for');
        hora = $('#'+este).val();
        check = $('#'+este).attr('disabled');
        if(check != 'disabled'){
            $('.hora').removeAttr('checked');
            $('#'+este).attr('checked','checked');
            $('.td-hora').text(hora);
        }
    });

    //Monto
    $('#monto').change(function(){
        monto = $(this).val();
        $('.td-costo').each(function(){
            total = $('#total').text();
            costo = $(this).text();
            if(costo == '0'){
                $(this).text(monto);
                suma = parseInt(monto)+parseInt(total);
                $('#total').text(suma);
                $('#costo_total').val(suma);
                //colocar value
                id = $(this).attr('id');
                numero = $('.input-checkbox-animalito[id="ani'+id+'"]').data('num');
                animal = $('.input-checkbox-animalito[id="ani'+id+'"]').data('animal');
                $('.input-checkbox-animalito[id="ani'+id+'"]').val(numero+':'+animal+':'+monto);
                $('.input-checkbox-animalito[id="ani'+id+'"]').attr('costo', monto);
            }
        });
    });

    //Edicion
    $('.td-costo').focus(function(){
        costo_ini = $(this).text();
            total = $('#total').text();
        $(this).change(function(){
            resta = parseInt(total)-parseInt(costo_ini);
            costo = $(this).text();
            suma = parseInt(costo)+parseInt(resta);
            $('#total').text(suma);
            $('#costo_total').val(suma);
            //colocar value
            id = $(this).attr('id');
            numero = $('.input-checkbox-animalito[id="ani'+id+'"]').data('num');
            animal = $('.input-checkbox-animalito[id="ani'+id+'"]').data('animal');
            $('.input-checkbox-animalito[id="ani'+id+'"]').val(numero+':'+animal+':'+costo);
            $('.input-checkbox-animalito[id="ani'+id+'"]').attr('costo', costo);
        });
    });

    //reset-ani
    $('.confirm').click(function(){
        $('.check-ani').removeClass('bg-teal');
        $('.hora').removeAttr('checked');
        $('.input-checkbox-animalito').removeAttr('checked');
        $('.tr-animales').css('display','none');
        $('.td-costo').text('');
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
        correo      = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
        telefono    = /^[0-9]+\-[0-9]+$/;
        email = $('#email').val();
        telf = $('#telefono').val();

        if(!correo.test(email) && email != ''){
            e.preventDefault();
            $('#form-email').addClass('focused error');
        }else{
            $('#form-email').removeClass('focused error');
        }

        if(!telefono.test(telf) && telf != ''){
            e.preventDefault();
            $('#form-telf').addClass('focused error');
        }else{
            $('#form-telf').removeClass('focused error');
        }

    });

    //reset-ani
    $('#reset-play').click(function(){
        $('.check-ani').removeClass('bg-teal');
        $('.hora').removeAttr('checked');
        $('.input-checkbox-animalito').removeAttr('checked');
        $('.tr-animales').css('display','none');
        $('.td-costo').text('');
        $('#total').text('0');
    });

    //validacion
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
                }else if(cantidad != ''){
                    $('#enviar-play').click();
                }
            });
        }
    });
	
});