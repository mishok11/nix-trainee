<?php

namespace framework;

class Model
{
    protected $_table;

    /**
     * @return mixed
     */
    public function getTable()
    {
        return $this->_table;
    }

    /**
     * @param mixed $table
     */
    public function setTable($table): void
    {
        $this->_table = $table;
    }
}
