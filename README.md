# Nova Simple Value Metric

This is a package to create a simple metric card.

<img src="https://raw.githubusercontent.com/marshmallow-packages/categorise-resources/master/resources/images/screenshot.png">

## Installation
```bash
composer require marshmallow/simple-value-metric
```

## Usage

You can add this metric by adding the code like below to your `cards` method.
```php
// ...
protected function cards()
{
	(new SimpleValue)
	    ->title('Scored quotations')
	    ->calculate(
	        function ($simple_value) {
	            return $simple_value->formattedValue(72)
	                                ->footer(
	                                    '99% of the quotations are orders!'
	                                );
	        }
	    )->help('72 of a total of 73 quotations are now orders :)'),
	// ...
}
```



### Security

If you discover any security related issues, please email stef@marshmallow.dev instead of using the issue tracker.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
