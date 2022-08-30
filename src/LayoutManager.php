<?php declare(strict_types=1);

namespace Mskocik\Forms;

use Nette\Forms\Container;
use Nette\Forms\Controls\BaseControl;

/**
 * @property Form $this
 */
trait LayoutManager
{
    /** @var LayoutRow[] */
    protected $layoutRows = [];

    public function addRow(?Container $container = null): LayoutRow
    {
        $row = new LayoutRow($container ?? $this);
        return $row;
    }

    public function addCell($cols = false, ?LayoutRow $row = null): LayoutCell
    {
        if (!$row) $row = count($this->layoutRows)
            ? $this->layoutRows[count($this->layoutRows) - 1]
            : $this->addRow();

        $cell = $row->addCell($cols);
        return $cell;
    }

    public function addCellControl($cols, BaseControl $control): BaseControl
    {
        return $this->addCell($cols)->insert($control);
    }
}
