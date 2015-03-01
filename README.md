# Базовый шаблон CodeIgniter - версия 0.1.1

Данная сборка включает в себя следующие компоненты:

* [CodeIgniter 2.2.1](http://codeigniter.com)
* [PHPMailer 5.2.9](https://github.com/PHPMailer/PHPMailer)
* [Шаблонизатор Smarty](http://www.smarty.net/)
* [Шаблонизатор Twig](http://twig.sensiolabs.org/)
* [Визуальный редактор CKEditor](http://ckeditor.com/)
* [Файловый менеджер KCFinder](http://kcfinder.sunhater.com/)
* [Google Recaptcta](https://developers.google.com/recaptcha/)

## 1. Интеграция тестового редактора

Для интеграции ***визуального редактора*** на странице необходимо выполнить следующие действия:

1. Скачиваем [CKEditor](http://ckeditor.com/) с официального сайта и разархивируем в папку
`path/to/libs/`
2. Аналогично, скачиваем [KCFinder](http://kcfinder.sunhater.com/) и кладем его в ту же папку
3. В итоге у нас должна получится вот такая структура
<br /><br />
    ***path/to*** - папка с фреймворком<br />
    &nbsp;|<br />
    &nbsp;...  остальные файлы<br />
    &nbsp;|--> ***path/to/libs/***<br />
    &nbsp;|--> ***path/to/libs/ckeditor/файлы визуального редактора***<br />
    &nbsp;|--> ***path/to/libs/kcfinder/файлы файлового менеджера***<br />
    &nbsp;...  остальные файлы<br />
    <br /><br />
2. Вставить в конце тега `head` скрипт `<script src="/libs/ckeditor/ckeditor.js"></script>`
3. В коде находим тег `textarea`, например такой `<textarea name="text" id="text" cols="30" rows="10"></textarea>`
4. Вставляем под ним следующий скрипт
    ` <script>
         var ckeditor = CKEDITOR.replace( 'text' );
     </script>`
5. Далее, открываем файл `path_to_folder/libs/ckeditor/config.js` и добавляем в него следующие строки:
        
        // Подключение файлового менеджера
        config.filebrowserBrowseUrl = '../libs/kcfinder/browse.php?opener=ckeditor&type=files';
        config.filebrowserImageBrowseUrl = '../libs/kcfinder/browse.php?opener=ckeditor&type=images';
        config.filebrowserFlashBrowseUrl = '../libs/kcfinder/browse.php?opener=ckeditor&type=flash';
        config.filebrowserUploadUrl = '../libs/kcfinder/upload.php?opener=ckeditor&type=files';
        config.filebrowserImageUploadUrl = '../libs/kcfinder/upload.php?opener=ckeditor&type=images';
        config.filebrowserFlashUploadUrl = '../libs/kcfinder/upload.php?opener=ckeditor&type=flash';
        
         // Настраиваем тулбары
         config.toolbarGroups = [
             { name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },
             { name: 'editing',     groups: [ 'find', 'selection' ] },
             { name: 'links' },
             { name: 'insert' },
             { name: 'tools' },
             { name: 'document',	   groups: [ 'mode', 'document', 'doctools' ] },
             '/',
             { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
             { name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },
             { name: 'styles',      groups: ['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'] },
             { name: 'colors' }
         ];
     
         // Удаляем ненужные кнопки
         config.removeButtons = 'Underline,Subscript,Superscript';
     
         // Настраиваем классы для тегов
         config.format_tags = 'p;h1;h2;h3;pre';
         config.skins = 'office2013';
         config.fullPage         = false;
         config.removeDialogTabs = 'image:advanced;link:advanced';
         config.codeSnippet_theme = 'pojoaque';
         config.filebrowserWindowHeight = 580;
         config.filebrowserWindowHeight = '50%';
         config.format_h1 = { element: 'h1', attributes: { 'class': 'h1' } };
         config.format_h2 = { element: 'h2', attributes: { 'class': 'h2' } };
         config.format_h3 = { element: 'h3', attributes: { 'class': 'h3' } };
         config.format_h4 = { element: 'h4', attributes: { 'class': 'h4' } };
         config.format_h5 = { element: 'h5', attributes: { 'class': 'h5' } };
         config.format_h6 = { element: 'h6', attributes: { 'class': 'h6' } };
         config.height = 500;        // 500 pixels.
         config.height = '25em';     // CSS length.
         config.height = '300px';    // CSS length.
         config.htmlEncodeOutput = true;
         config.toolbarGroupCycling = false;
         config.toolbarCanCollapse = true;
         config.toolbarStartupExpanded = true;
     
         config.extraPlugins = 'wordcount';
     
         // Настраиваем плагин, который считае количество слов и симловов введенных в редакторе
         config.wordcount = {
             showWordCount: true,
             showCharCount: true,
             countHTML: false
         };
     
         config.extraPlugins = 'autogrow';
         config.autoGrow_minHeight = 200;
         config.autoGrow_maxHeight = 480;
         config.autoGrow_bottomSpace = 50;
     
         //config.useComputedState = false;
 
 6. Далее переходим в папку с файловым менеджером `path/to/libs/kcfinder/conf/config.php`
 и внесем изменения в настройки менеджера (строки 24-25)
 
        'disabled' => false,
        'uploadURL' => "upload",
        
        
## 2. Настройка отправки почты помощью PHPMailer

Для использования в проекте библиотеки [PHPMailer](http://kcfinder.sunhater.com/) достаточно выполнить следующие действия:

1. Перейти в папку `path/to/application/config/` и открыть файл my_config.php
2. Отредактируйте данные, отмеченные в комментариях как ***Настройки для почты***
3. Откройте в той же папке файл autoload.php и в настройке `$autoload['libraries']` добавьте имя библиотеки `sendmailer`
4. Дополнительно библиотеку натривать не надо, настройки она возьмет из файла my_config.php
5. Библиотека содержит следующие методы:
    * ***setSenderLabel($name)*** - устанавливает подпись отправителя письма
    * ***setRecipient($email, $name)*** - устанавливает email и подпись того, кому отправляется письмо (для того, чтобы добавить больше
    одного получателя, можно вызывать этот метод в цикле)
    * ***send()*** - отправляет письмо адресату(-там) и возвращает TRUE если письмо отправлено, или FALSE - в противном случае
    
## 3. Использование [Google Recaptcha](https://developers.google.com/recaptcha/)

Для добавления на форму капчи от Google необходимо выполнить следующие действия:

1. Переходим на сайт [Google Captcha](https://www.google.com/recaptcha/intro/index.html) и нажимаем на кнопку getRECAPTCHA
2. Заполняем форму регистрации сайта и получаем открытый и закрытый ключ
3. Переходим на наш сайт в папку `path/to/application/config` и открываем файл ***my_config.php*** и редактируем:

        // Вставляем закрытый ключ
        $config['google_recaptcha_private'] = "закрытый ключ"
        $config['google_recaptcha_public']  = "открытый ключ"
     
4. Далее, в той же папке открывем файл ***autoload.php***
5. ***Переходим на строку 55*** и в ячейке конфигурации `$autoload['libraries']` добавляем библиотеку ***recaptcha***
6. Библиотека имеет следующий набор функций:
    <br /><br />
    6.1 ***captchaHtml()*** - метод генерирует URL на который нужно поылать результат отработки капчи<br />
    6.2 ***setSkin($skin)*** - метод устанавливает вид капчи. Имеет один параметр, который может иметь 2 значения - dark (темная тема) или light (светлая тема - по умолчанию)<br />
    6.3 ***setType($type)*** - метод устанавливает тип капчи. Имеет один параметр, который может иметь 2 значения - image (капча картинка - по умолчанию) или audio (аудио капча)<br />
    6.4 ***check($recaptcha, $ip)*** - метод проверяет капчу. Имеет 2 параметра:<br /><br />
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;6.4.1. ***$recaptcha*** - данные введенные в капчу<br />
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;6.4.2. ***$ip*** - IP пользователя, который отправляет данные в форму<br />
        
    <br /><br />
    
7. Для вставки шаблона в шаблонизатор Twig, необходимо для сгенерированного HTML добавить фильтр raw:<br /><br />
    
    ```
    {{ captcha_html | raw }}
    ```