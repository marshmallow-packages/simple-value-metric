<?php

namespace Marshmallow\SimpleValueMetric;

use Laravel\Nova\Card;
use Laravel\Nova\Metrics\HasHelpText;

class SimpleValueMetric extends Card
{
    use HasHelpText;

    /**
     * The width of the card (1/3, 1/2, or full).
     *
     * @var string
     */
    public $width = '1/3';

    public $title;

    public $footer;

    public $show_button = true;

    public $button_link;

    public $button_text;

    public $button_target;

    public $button_class;

    public $suffix;

    public $help_width = 250;

    public $calculateCallback = null;

    public $footer_icon = null; // Increase | Decrease | null

    public function __construct()
    {
        ray($this->getHelpText());
        parent::__construct();
        $this->withMeta(
            [
                // 'title' => $this->title,
                'footerIcon' => $this->footer_icon,
                'show_button' => $this->show_button,
                // 'footer' => $this->footer,
                // 'suffix' => $this->suffix,
                // 'helpText' => $this->getHelpText(),
                // 'helpWidth' => $this->getHelpWidth(),
                // 'formattedValue' => '53.685',
            ]
        );
    }

    public function calculate($callable)
    {
        $this->calculateCallback = $callable;
        return $this;
    }

    public function formattedValue($formattedValue)
    {
        $this->withMeta(['formattedValue' => $formattedValue]);
        return $this;
    }

    public function title($title)
    {
        $this->withMeta(['title' => $title]);
        return $this;
    }

    public function footer($footer)
    {
        $this->withMeta(['footer' => $footer]);
        return $this;
    }

    public function button(string $link, string $text, string $class = 'btn btn-default btn-primary', string $target = '_blank')
    {
        $this->withMeta([
            'button_link' => $link,
            'button_text' => $text,
            'button_class' => $class,
            'button_target' => $target,
        ]);
        return $this;
    }

    public function showButtonWhen($closure)
    {
        $this->withMeta([
            'show_button' => $closure()
        ]);
        return $this;
    }

    public function suffix($suffix)
    {
        $this->withMeta(['suffix' => $suffix]);
        return $this;
    }

    public function help($help_text)
    {
        $this->withMeta(['helpText' => $help_text]);
        return $this;
    }

    public function helpWidth($help_width)
    {
        $this->withMeta(['helpWidth' => $help_width]);
        return $this;
    }

    /**
     * Get the component name for the element.
     *
     * @return string
     */
    public function component()
    {
        if ($this->calculateCallback) {
            $callable = $this->calculateCallback;
            $callable($this);
        }

        return 'simple-value-metric';
    }
}
