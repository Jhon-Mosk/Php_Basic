<?php

$messages = [
    'ok' => 'Файл загружен',
    'error' => 'Ошибка загрузки',
    'sizeError' => 'Недопустимый размер файла',
    'typeError' => 'Недопустимый формат файла',
    'add' => 'Отзыв успешно добавлен',
    'delete' => 'Отзыв успешно удалён',
    'edit' => 'Отзыв успешно изменён',
    'wrong_auth' => 'Не верный логин пароль',
    'empty_input' => 'Поля не должны быть пустыми',
    'reg_ok' => 'Регистрация прошла успешно',
    'reg_repeat' => 'Пользователь с таким именем уже существует',
    'checkout' =>
    '
        <form method="post">
            <input type="phone" name="phone" placeholder="Ваш телефон" require>
            <input type="submit" name="checkout" value="Оформить">
        </form>
    ',
    'checkoutOk' => 'В ближайшее время с вами свяжется менеджер для уточнения деталей заказа',
    'notAdmin' => 'Нет прав!',
];

function getMessages($messages)
{
    return $messages;
}
