## CVator

CVator or CV Creator is free and simple app for build your CV. While you are entering your data in fields, CVator is creating document in PDF.

## Before

Before everything, install XAMPP and Composer.

## Download via Git

Open Git and run:
```
$ git clone https://github.com/milanbrckalo/cvator.git
```

## Installation

In XAMPP start Apache and MySQL.

In phpMyAdmin create database "cvator" with collation "utf8_unicode_ci".

In Terminal or CMD choose cvator's directory and run:
```
$ composer install
$ php artisan migrate
```

Copy all files from "public/fonts" to "vendor/dompdf/dompdf/lib/fonts".

Then, in "vendor/dompdf/dompdf/lib/fonts" open via text editor file "dompdf_font_family_cache.dist.php" and add:
```
'glyphicons halflings' => 
array (
  'normal' => DOMPDF_DIR . '/lib/fonts/glyphicons-halflings-regular',
),
```

Open new Terminal or CMD and run:
```
$ php artisan serve
```

## Info

CVator is still in development. Maybe you will find some mistakes. 

CVator uses:

[LaravelCollective/html](https://github.com/LaravelCollective/html)

[vsmoraes/pdf-laravel5](https://github.com/vsmoraes/pdf-laravel5)

## License

CVator is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
