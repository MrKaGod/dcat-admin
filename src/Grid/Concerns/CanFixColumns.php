<?php

namespace Dcat\Admin\Grid\Concerns;

use Dcat\Admin\Grid\FixColumns;
use Illuminate\Support\Collection;

trait CanFixColumns
{
    /**
     * @var FixColumns
     */
    protected $fixColumns;

    /**
     * @param int $head
     * @param int $tail
     *
     * @return $this
     */
    public function fixColumns(int $head, int $tail = -1)
    {
        $this->fixColumns = new FixColumns($this, $head, $tail);

        return $this;
    }

    protected function applyFixColumns()
    {
        if ($this->fixColumns) {
            $this->fixColumns->apply();
        }
    }

    /**
     * @return Collection
     */
    public function leftVisibleColumns()
    {
        return $this->fixColumns->leftColumns();
    }

    /**
     * @return Collection
     */
    public function rightVisibleColumns()
    {
        return $this->fixColumns->rightColumns();
    }
}
