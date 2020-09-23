<?php

namespace Marshmallow\SimpleValueMetric;

use Laravel\Nova\Metrics\Value;

class SimpleValueMetric extends Value
{
    /**
     * The width of the card (1/3, 1/2, or full).
     *
     * @var string
     */
    public $width = '1/3';

    public $title;

    public $footer;

    public $suffix;

    public $help_width = 250;

    public $calculateCallback = null;

    public $footer_icon = null; // Increase | Decrease | null

    public function __construct()
    {
        parent::__construct();
        $this->withMeta(
            [
                // 'title' => $this->title,
                'footerIcon' => $this->footer_icon,
                // 'footer' => $this->footer,
                // 'suffix' => $this->suffix,
                // 'helpWidth' => $this->help_width,
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

    public function suffix($suffix)
    {
        $this->withMeta(['suffix' => $suffix]);
        return $this;
    }

    public function helpWidth($help_width)
    {
        $this->withMeta(['help_width' => $help_width]);
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
        return 'simple-value';
    }
}
