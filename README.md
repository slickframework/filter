# Slick Filter package

[![Latest Version](https://img.shields.io/github/release/slickframework/filter.svg?style=flat-square)](https://github.com/slickframework/filter/releases)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://img.shields.io/travis/slickframework/filter/master.svg?style=flat-square)](https://travis-ci.org/slickframework/filter)
[![Coverage Status](https://img.shields.io/scrutinizer/coverage/g/slickframework/filter/master.svg?style=flat-square)](https://scrutinizer-ci.com/g/slickframework/filter/code-structure?branch=master)
[![Quality Score](https://img.shields.io/scrutinizer/g/slickframework/filter/master.svg?style=flat-square)](https://scrutinizer-ci.com/g/slickframework/filter?branch=master)
[![Total Downloads](https://img.shields.io/packagist/dt/slick/filter.svg?style=flat-square)](https://packagist.org/packages/slick/filter)

Slick Filter is a set of filter utilities tah can be used to filter input values,
sanitize data and create filter chains to apply on a certain value.

This package is compliant with PSR-2 code standards and PSR-4 autoload standards. It
also applies the [semantic version 2.0.0](http://semver.org) specification.

## Install

Via Composer

``` bash
$ composer require slick/filter
```

## Usage

The best way to filter your data is to use the `StaticFilter` utility class. It can create any
`FilterInterface` filter and it has alias for the known filters that are bundled with the
`Slick\Filter` package.

```php
use Slick\Filter\StaticFilter;

echo StaticFilter::filter('number', '12 3');  // Will output 123

$text = StaticFilter::filter('text', 123);
echo is_string($text);      // will output 1 (true)
```

#### Known filters

| Alias          | Class                       | Description                                                   |
|----------------|-----------------------------|---------------------------------------------------------------|
| _text_         | `Slick\Filter\Text`         | Converts input to a string                                    |
| _number_       | `Slick\Filter\Number`       | Converts the input to an integer number                       |
| _url_          | `Slick\Filter\Url`          | Converts/Fixes the input to a valid URL                       |
| _htmlEntities_ | `Slick\Filter\HtmlEntities` | Converts special characters to its html entity representation | 

#### Filter chains

It is also possible to combine multiple filters to a single input value by using the
`FilterChainInterface`. 

```php
use Slick\Filter\FilterChain;
use Slick\Filter\StaticFilter;

$filterChain = new FilterChain();

$filterChain
    ->add(StaticFilter::create('text'))
    ->add(StaticFilter::create('htmlEntities'));
    
$input = '<p>This is a simple text & cia!</p>';

$output = $filterChain->filter($value);

echo $output;
```

The above code will output:

```html
This is a simple text &amp; cia!
```

You can create you own filters by implementing the `FilterInterface`.

## Testing

``` bash
$ vendor/bin/phpunit
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email silvam.filipe@gmail.com instead of using the issue tracker.

## Credits

- [Slick framework](https://github.com/slickframework)
- [All Contributors](https://github.com/slickframework/common/graphs/contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

