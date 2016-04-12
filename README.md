### Demo
Готовый к использованию сервер временно находится [тут](http://92.255.196.18/rgk/rgk-test/web/)
### Install
* Клонируем репу
* Подтягиваем зависимости 
```
composer install
```
* Настраиваем базу данных в файле `config/db.php`
* Применяем миграции
```
./yii mirgate
```
* Даем права веб-серверу на запись в `web/assets` и `web/uploads`
* Настраиваем рабочую директорию веб-сервера на папку `web`
* Открываем в браузере и пользуемся

### Пояснения
* Изначально база с книгами ничем не заполняется, создается только список авторов. Для того чтобы что-то увидить нужно добавить несколько книг.
* Система управления пользователями не реализована, для использования доступны стандартные пользователи demo:demo и admin:admin.
* Валидация выполнена на минимальном уровне.
* Сортировка и фильтр должны сохраняться при добавлении, редактировании и удалении книг.
* Какой-либо интерфейс для формировании дат не был реализован. Даты принимаются в любом формате, который пережовывает sql, например `yyyy-mm-dd` или `yyyy-mm-dd HH:MM:SS`.
* Сортировка по автору выполняется на основе индекса, а не строки.
* Сортировка по превью выполняется на основе имени файла.
* Проверка на дублирование имени файла картинки не осуществляется.
* Для любой книги достаточно заполнить поле с именем.
* Если при обновлении новая картинка не была загружена, то остается старая.
* Дата создания и дата обновления устанавливаются автоматически
* Если дата выхода не была указана, она так же будет автоматически задана
