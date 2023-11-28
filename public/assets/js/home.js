$(function () {
    //START. Validation form download QR
    $('#form_generate_qr').validate({
        highlight: function (input) {
            $(input).parents('.form-line').addClass('error');
        },
        unhighlight: function (input) {
            $(input).parents('.form-line').removeClass('error');
        },
        errorPlacement: function (error, element) {
            $(element).parents('.form-group').append(error);
        },
        submitHandler: function(form) {
            //$(form).ajaxSubmit();
            //console.log(form.id);
            //return false;

            $.ajax({
                url: '/download_qr',
                dataType: 'json',
                cache: false,
                timeout: 5000,
                type: 'POST',
                data: {
                    name: $('#name').val(),
                    quantity: $('#quantity').val(),
                    phone: $('#phone').val(),
                },
                beforeSend: function() {
                    $('.button-download-qr').attr('disabled', true);
                },
                success: function(data) {
                    $('.button-download-qr').attr('disabled', false);

                    //console.log(data);
                    if (data.status === 200) {
                        let a = document.createElement("a");
                        a.href = data.data[0].qr_base64;
                        a.download = 'qr_'+$('#phone').val()+'.png';
                        a.click();

                        $('.img-qr').html('<img src="'+data.data[0].qr_base64+'" alt="qr_'+$('#phone').val()+'.png">');
                    } else {
                        alert('No fue posible descargar el QR, por favor intenta más tarde');
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    $('.button-download-qr').attr('disabled', false);

                    alert('error ' + textStatus + " " + errorThrown);
                }
            });
        }
    });
    //END. Validation form download QR

    //START. Download Form New Installation
    $('body').on('click', '.button-pdf-download', function (event) {
        $.ajax({
            url: '/download_pdf_form_new_installation',
            dataType: 'json',
            cache: false,
            timeout: 5000,
            type: 'POST',
            data: {
                establishment: $('#establishment').val(),
            },
            beforeSend: function() {
                $(this).attr('disabled', true);
            },
            success: function(data) {
                $(this).attr('disabled', false);

                //console.log(data);
                if (data.status === 200) {
                    event.preventDefault(); //stop the browser from following
                    let a = document.createElement("a");
                    a.href = data.data[0].file_base64;
                    a.download = 'formulario_nueva_instalacion_freelancer_'+$('#establishment').val()+'.pdf';
                    a.click();
                } else {
                    alert('No fue posible descargar el Formulario, por favor intenta más tarde');
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                $(this).attr('disabled', false);

                alert('error ' + textStatus + ' ' + errorThrown);
            }
        });
    });
    //END. Download Form New Installation
});
