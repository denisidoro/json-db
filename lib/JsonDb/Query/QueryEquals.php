<?php

namespace JsonDb\Query;

class QueryEquals extends Query implements QueryInterface
{
    private $field;
    private $value;
    private $fn;

    public function __construct($field, $value, $fn = null)
    {
        $this->field = $field;
        $this->value = $value;
        $this->fn = trim($fn);
    }
    /**
     * {@inheritdoc}
     */
    public function match(array $document)
    {

        if ($this->fn != null)
            return eval($this->fn);

        return isset($document[$this->field]) && $document[$this->field] == $this->value;

    }

}