<?php

class Collection implements ArrayAccess, Countable, Iterator
{
    /** @var ArrayObject */
    public $arrayObject;

    /** @var ArrayIterator */
    protected $iterator;

    public function __construct(array $array = [])
    {
        $this->arrayObject = new ArrayObject($array);
        $this->iterator = $this->arrayObject->getIterator();
    }

    public function isEmpty(): bool
    {
        return !!$this->current();
    }

    public function sum(string $accessor): float
    {
        $sum = 0;
        foreach ($this->arrayObject as $element) {
            $sum += $element->$accessor;
        }

        return $sum;
    }

    /**
     * @param string $accessor
     * @param mixed ...$params
     * @return mixed|int|float
     */
    public function min(string $accessor, ...$params)
    {
        $values = $this->pluckArray($accessor, ...$params);

        return min($values, null);
    }

    /**
     * @param string $accessor
     * @param mixed ...$params
     * @return mixed|int|float
     */
    public function max(string $accessor, ...$params)
    {
        $values = $this->pluckArray($accessor, ...$params);

        return max($values, null);
    }

    public function pluck(string $accessor, ...$params): Collection
    {
        $values = $this->pluckArray($accessor, ...$params);

        return new static($values);
    }

    /*
     * Countable
     */
    public function count()
    {
        return count($this->arrayObject);
    }

    /*
     * ArrayAccess
     */
    public function offsetExists($offset): bool
    {
        return array_key_exists($offset, $this->arrayObject);
    }

    public function offsetGet($offset)
    {
        return $this->arrayObject[$offset];
    }

    /**
     * @param mixed $offset
     * @param Model $model
     */
    public function offsetSet($offset, $model)
    {
        $this->arrayObject[$offset] = $model;
    }

    public function offsetUnset($offset)
    {
        unset($this->arrayObject[$offset]);
    }

    /*
     * Iterator
     */
    public function current()
    {
        return $this->arrayObject->getIterator()->current();
    }

    public function next()
    {
        $this->arrayObject->getIterator()->next();
    }

    public function key()
    {
        return $this->arrayObject->getIterator()->key();
    }

    public function valid()
    {
        return $this->arrayObject->getIterator()->valid();
    }

    public function rewind()
    {
        $this->arrayObject->getIterator()->rewind();
    }

    /*
     * Private
     */
    private function pluckArray(string $accessor, ...$params): array
    {
        $values = [];
        foreach ($this->arrayObject as $element) {
            $values[] = $element->$accessor(...$params);
        }

        return $values;
    }
}
