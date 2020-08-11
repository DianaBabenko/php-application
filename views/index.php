<?php
/**
 * @var $this View
 */
?>
<div class="container">
    <div class="row">
        <div class="col-xs-4"></div>
        <div class="col-xs-4">
            <form class="form-horizontal">
                <div class="row form-group field">
                    <label class="col-xs-4 control-label">
                        Имя:
                        <span class="error"></span>
                    </label>
                    <div class="col-xs-8">
                        <input type="text" name="name" class="form-control" placeholder="Введите имя" />
                    </div>
                </div>
                <div class="row form-group field">
                    <label class="col-xs-4 control-label">
                        Телефон:
                        <span class="error"></span>
                    </label>
                    <div class="col-xs-8">
                        <input type="tel" name="phone" class="form-control" placeholder="Ваш телефон" />
                    </div>
                </div>
                <div class="row form-group field">
                    <label class="col-xs-4 control-label">
                        E-mail:
                        <span class="error"></span>
                    </label>
                    <div class="col-xs-8">
                        <input type="email" name="email" class="form-control" placeholder="username@sitename.com" />
                    </div>
                </div>
                <div class="row form-group field">
                    <label class="col-xs-4 control-label">
                        Комментарий:
                        <span class="error"></span>
                    </label>
                    <div class="col-xs-8">
                        <textarea class="form-control" name="comment" rows="5" placeholder="Можно написать пару слов..."></textarea>
                    </div>
                    <span class="error"></span>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <button class="btn btn-default pull-right form-submit">
                            Отправить
                        </button>
                    </div>
                </div>
            </form>
            <div class="thank-you">
                Спасибо!
            </div>
        </div>
        <div class="col-xs-4"></div>
    </div>
</div>
