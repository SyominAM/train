<?php
    require_once 'Date.php';
    require_once 'Interval.php';
    require_once 'File.php';
    require_once 'Tag.php';
    require_once 'Validator.php';
    require_once 'FileManipuator.php';
    require_once 'SessionShell.php';
    require_once 'CookieShell.php';
    require_once 'DatabaseShell.php';
    
/*
	$date = new Date('2025-12-31');

	echo $date->getYear();  // выведет '2025'
    echo '</br>';
	echo $date->getMonth(); // выведет '12'
    echo '</br>';
	echo $date->getDay();   // выведет '31'
    echo '</br>';
	
	echo $date->getWeekDay();     // выведет '3'
    echo '</br>';
	echo $date->getWeekDay('ru'); // выведет 'среда'
    echo '</br>';
	echo $date->getWeekDay('en'); // выведет 'wednesday'
    echo '</br>';

	echo (new Date('2025-12-31'))->addYear(1); // '2026-12-31'
    echo '</br>';
	echo (new Date('2025-12-31'))->addDay(1);  // '2026-01-01'
	
	echo (new Date('2025-12-31'))->subDay(3)->addYear(1); // '2026-12-28'
    echo '</br>';
    $date1 = new Date('2025-12-31');
	$date2 = new Date('2026-11-28');
	
	$interval = new Interval($date1, $date2);

	echo $interval->toDays();   // выведет разницу в днях
    echo '</br>';
	echo $interval->toMonths(); // выведет разницу в месяцах
    echo '</br>';
	echo $interval->toYears();
    echo '</br>';
    $file1 = new File('example.txt');
    $file2 = new File('example2.txt');
    
    echo "Path : " . $file1->getPath() . "<br>";
    echo "Dir : " . $file1->getDir() . "<br>";
    echo "Name : " . $file1->getName() . "<br>";
    echo "Ext : " . $file1->getExt() . "<br>";
    echo "Size : " . $file1->getSize() . "<br>";

    $validator = new Validator;
    var_dump($validator->isDomain('sdf.ru')); 
    var_dump($validator->inRange(10, 0, 5)); 
    var_dump($validator->inLength('hello', 0, 5));

    $fileManipulator = new FileManipulator();


    $file = 'file.txt';
    $fileManipulator->create($file);


    $copy = 'copy.txt';
    $fileManipulator->copy($file, $copy);


    $newName = 'renamed.txt';
    $fileManipulator->rename($file, $newName);

    $replacePath = 'replace.txt';
    $fileManipulator->replace($newName, $replacePath);


    $fileManipulator->delete($replacePath);

    $size = $fileManipulator->weigh($copy);

    echo $size; 
    
    Пусть у вас есть папка modules/cart. Сделайте так, чтобы все классы из этой папки относились к пространству имен Modules\Cart.
    1. Создать файл modules/cart/Cart.php
    2. Добавить следующее пространство имен в начало файла:

    namespace Modules\Cart;

    3. Добавить все классы, которые должны относиться к пространству имен Modules\Cart, в этот файл.

    4. Для каждого класса добавить строку: 

    class ClassName
    {
        // Код класса
    } 

    5. Для использования классов из папки modules/cart добавить следующую строку в ваши другие файлы: 

    use Modules\Cart\ClassName;
    */


    $s = new SessionShell();
    $s->set('name', 'value');
    echo $s->get('name'); // value
    $s->destroy();
    
    $cookieShell = new CookieShell();

    // Тестирование
    $cookieShell->set('counter', 0, 100);
    $cookieShell->get('counter'); 
    $cookieShell->del('counter');
    $cookieShell->get('counter'); 
    $cookieShell->exists('counter'); 

    // Счетчик обновления страницы
    $counter = $cookieShell->get('page_counter');
    $counter = $counter ? $counter : 0;
    $counter++;
    $cookieShell->set('page_counter', $counter, 3600);
    echo "Page refresh count: {$counter}";



?>