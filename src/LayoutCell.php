<?php declare(strict_types=1);

namespace Mskocik\Forms;

use Nette\Forms\Container;
use Nette\Forms\Controls\BaseControl;

class LayoutCell
{
    protected $controls = [];

    protected $cols;

    public function __construct(
        private Container $container,
        $cols
    ) {
        $this->cols = $cols;
    }

    public function insert(BaseControl $control, $ruleSetter = null): BaseControl
    {
        if (!$this->container->getComponent($control->name, false)) {
            $this->container->addComponent($control, $control->name);
        }
        $this->controls[] = $control;
        $ruleSetter && $ruleSetter($control);
        return $control;
    }
}
