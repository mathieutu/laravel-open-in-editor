# Laravel Open In Editor

[![Latest Version on Packagist](https://img.shields.io/packagist/v/mathieutu/laravel-open-in-editor.svg?style=flat-square)](https://packagist.org/packages/mathieutu/laravel-open-in-editor)
[![Build Status](https://img.shields.io/travis/mathieutu/laravel-open-in-editor/master.svg?style=flat-square)](https://travis-ci.org/mathieutu/laravel-open-in-editor)
[![Quality Score](https://img.shields.io/scrutinizer/g/mathieutu/laravel-open-in-editor.svg?style=flat-square)](https://scrutinizer-ci.com/g/mathieutu/laravel-open-in-editor)
[![Total Downloads](https://img.shields.io/packagist/dt/mathieutu/laravel-open-in-editor.svg?style=flat-square)](https://packagist.org/packages/mathieutu/laravel-open-in-editor)

Let the "Open in Editor" feature from devtools works with Laravel.

<p align="center">
    <a href="https://raw.githubusercontent.com/mathieutu/laravel-open-in-editor/master/assets/screenshot.png">
        <img src="https://raw.githubusercontent.com/mathieutu/laravel-open-in-editor/master/assets/screenshot.png" alt="Open in editor screenshot">
    </a>
</p>

[See example on youtube](https://www.youtube.com/watch?v=XBKStgyhY18)

## Installation

You can install the package via composer:

```bash
composer require --dev mathieutu/laravel-open-in-editor
```

## Usage

When app is in debugging mode, the package let you use the "open in editor" function of devtools.

Under the hood, it creates a `__open-in-editor?file=MYFILE&line=MYLINE` route, that you can call from anywhere and that will open on the fly the given file directly in your IDE!

It uses the editor methods of [Whoops handler](https://github.com/filp/whoops/blob/master/docs/Open%20Files%20In%20An%20Editor.md), so you have to set your editor by adding the `editor` key to the `./config/app.php` configuration file.

```php
'editor' => 'phpstorm',
```

### License

This package is an open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).

### Contributing

Issues and PRs are obviously welcomed and encouraged, as well for new features than documentation.
Each piece of code added should be fully tested, but we can do that all together, so please don't be afraid by that. 

