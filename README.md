# Базовый шаблон CodeIgniter - версия 0.1.1

Данная сборка включает в себя следующие компоненты:

* [CodeIgniter 2.2.1](href=http://codeigniter.com)
* [PHPMailer 5.2.9](href=https://github.com/PHPMailer/PHPMailer)
* [Шаблонизатор Smarty](href=http://www.smarty.net/)
* [Шаблонизатор Twig](href=http://twig.sensiolabs.org/)
* [Визуальный редактор CKEditor](href=http://ckeditor.com/)
* [Файловый менеджер KCFinder](href=http://kcfinder.sunhater.com/)

## 1. Интеграция тестового редактора

Для интеграции ***визуального редактора*** на странице необходимо выполнить следующие действия:

1. Скачиваем [CKEditor](href=http://ckeditor.com/) с официального сайта и разархивируем в папку
`path_to_site/libs/`
2. Аналогично, скачиваем [KCFinder](href=http://kcfinder.sunhater.com/) и кладем его в ту же папку
3. В итоге у нас должна получится вот такая структура
<br /><br />
    ***path_to_site*** - папка с фреймворком<br />
    &nbsp;|<br />
    &nbsp;...  остальные файлы<br />
    &nbsp;|--> ***path_to_site/libs/***<br />
    &nbsp;|--> ***path_to_site/libs/ckeditor/файлы визуального редактора***<br />
    &nbsp;|--> ***path_to_site/libs/kcfinder/файлы файлового менеджера***<br />
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
 
 6. Далее переходим в папку с файловым менеджером `path_to_site/libs/kcfinder/conf/config.php`
 и внесем изменения в настройки менеджера (строки 24-25)
 
        'disabled' => false,
        'uploadURL' => "upload",
        
        
## 2. Настройка отправки почты помощью PHPMailer

Для использования в проекте библиотеки [PHPMailer](href=http://kcfinder.sunhater.com/) достаточно выполнить следующие действия:

* Перейти в папку `path_to_site/application/config/` и открыть файл my_config.php
* Отредактируйте данные, отмеченные в комментариях как ***Настройки для почты***
* Откройте в той же папке файл autoload.php и в настройке `$autoload['libraries']` добавьте имя библиотеки `sendmailer`
* Дополнительно библиотеку натривать не надо, настройки она возьмет из файла my_config.php
* Библиотека содержит следующие методы:
    * setSenderLabel($name) - устанавливает подпись отправителя письма
    * setRecipient($email, $name) - устанавливает email и подпись того, кому отправляется письмо (для того, чтобы добавить больше
    одного получателя, можно вызывать этот метод в цикле)
    * send() - отправляет письмо адресату(-там) и возвращает TRUE если письмо отправлено, или FALSE - в противном случае