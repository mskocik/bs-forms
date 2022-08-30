<?php declare(strict_types=1);

namespace Mskocik\Forms;

use Nette\Forms\Container;

class LayoutRow
{
    protected $cells = [];

    public function __construct(
        private Container $container
    ) {}

    public function addCell($cols = false): LayoutCell
    {
        $cell = new LayoutCell($this->container, $cols);
        $this->cells[] = $cell;

        return $cell;
    }
}
