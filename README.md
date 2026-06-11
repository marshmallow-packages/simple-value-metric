![alt text](https://marshmallow.dev/cdn/media/logo-red-237x46.png "marshmallow.")

# Nova Simple Value Metric

[![Latest Version on Packagist](https://img.shields.io/packagist/v/marshmallow/simple-value-metric.svg?style=flat-square)](https://packagist.org/packages/marshmallow/simple-value-metric)
[![Total Downloads](https://img.shields.io/packagist/dt/marshmallow/simple-value-metric.svg?style=flat-square)](https://packagist.org/packages/marshmallow/simple-value-metric)

A Laravel Nova card that renders a simple value metric with a title, footer, optional help text and an optional action button.

<img src="https://raw.githubusercontent.com/marshmallow-packages/simple-value-metric/main/resources/screenshot/screenshot.png">

## Installation

Install the package via Composer:

```bash
composer require marshmallow/simple-value-metric
```

The card registers itself through Laravel package auto-discovery (`Marshmallow\SimpleValueMetric\CardServiceProvider`), so no further setup is required.

## Usage

Add the card to the `cards()` method of any Nova resource or dashboard:

```php
use Marshmallow\SimpleValueMetric\SimpleValueMetric;

protected function cards()
{
    return [
        (new SimpleValueMetric)
            ->title('Scored quotations')
            ->calculate(function ($metric) {
                return $metric->formattedValue(72)
                    ->footer('99% of the quotations are orders!');
            })
            ->help('72 of a total of 73 quotations are now orders :)'),
    ];
}
```

The value is set inside the `calculate()` callback so it can be computed at render time. The callback receives the card instance, on which you call the fluent methods below.

### Available methods

| Method | Description |
| --- | --- |
| `title(string $title)` | The label shown above the value. |
| `calculate(callable $callback)` | Callback (receiving the card) used to compute the metric when it renders. |
| `formattedValue(mixed $value)` | The value displayed on the card. |
| `footer(string $footer)` | Text shown below the value. |
| `suffix(string $suffix)` | A suffix appended to the value (e.g. a unit or percentage sign). |
| `button(string $link, string $text, string $class = 'btn btn-default btn-primary', string $target = '_blank')` | Render an action button on the card. |
| `showButtonWhen(Closure $closure)` | Show the button only when the closure returns `true`. |
| `help(string $helpText)` | Help text shown in a tooltip on the card. |
| `helpWidth(int $width)` | Width of the help tooltip in pixels (defaults to `250`). |

The card width can be set with Nova's standard `$width` property (`1/3`, `1/2`, or `full`); it defaults to `1/3`.

### Adding a button

```php
use Marshmallow\SimpleValueMetric\SimpleValueMetric;

(new SimpleValueMetric)
    ->title('Open quotations')
    ->calculate(function ($metric) {
        return $metric->formattedValue(12)
            ->footer('Quotations awaiting review')
            ->button('/nova/resources/quotations', 'View all');
    });
```

## Security

If you discover any security related issues, please email stef@marshmallow.dev instead of using the issue tracker.

## Credits

- [Marshmallow](https://github.com/marshmallow-packages)
- [All Contributors](https://github.com/marshmallow-packages/simple-value-metric/contributors)

## License

The MIT License (MIT). Please see the [License File](LICENSE.md) for more information.
