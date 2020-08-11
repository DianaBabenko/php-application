var Site = {
    onload: document.addEventListener('DOMContentLoaded', function() {
        Site.init();
    }),
    init: function() {
        $('input[type="tel"]').inputmask({alias: 'phone'}).on('keydown', function(e) {
            if ($(this).inputmask('isComplete')) { e.preventDefault(); return false; }
        });
        this.bind();
    },
    bind: function() {
        $(document).on('click', 'button.form-submit', function(e) {
            e.preventDefault();
            Site.ajax.formSubmit($(this).prop('disabled', true).parents('form'));
        }).on('input', 'div.field .has-error', function() {
            $(this).removeClass('has-error').parents('div.field').find('span.error').fadeOut('fast', function() {
                $(this).html('');
            });
        });
    },
    ajax: {
        obj: {},
        send: function(success, failure) {
            $.post('/', this.obj, function(answer) {
                console.log(answer);
                (answer.result && typeof success == 'function') ? success(answer) :
                    (!answer.result && typeof failure == 'function') ? failure(answer) : null;
                Site.ajax.obj = {};
            });
        },
        formSubmit: function($form) {
            this.obj.method = 'formSubmit';
            this.obj.data = $form.serializeArray();
            this.send(function() {
                $form.fadeOut('fast', function() {
                    $form[0].reset();
                    $form.parent().find('div.thank-you').fadeIn('fast', function() {
                        setTimeout(function() {
                            $form.parent().find('div.thank-you').fadeOut('fast', function() {
                                $form.fadeIn('fast', function() {
                                    $form.find('button.form-submit').prop('disabled', false);
                                });
                            });
                        }, 3000);
                    });
                });
            }, function(answer) {
                console.log(answer);
                $.each(answer.error, function(k, v) {
                    $form.find('[name="' + k + '"]').addClass('has-error').parents('div.field').find('span.error').fadeIn('fast', function() {
                        $(this).html(v);
                    });
                });
                $form.find('button.form-submit').prop('disabled', false);
            });
        }
    }
};
