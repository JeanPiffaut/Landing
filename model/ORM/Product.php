<?php

class Product extends ORM
{
    public string $table = "products";
    public array  $columns = array("id", "name", "active");

    private int $id;
    private string $name;
    private bool $active;

    /**
     * @inheritDoc
     */
    public function setColumn(mixed $column, mixed $value): mixed
    {
        if($this->ValidateColumn($column) === true) {

            switch ($column) {
                case "id";
                    if($this->setId($value)) {

                        $col_value = $this->getId();
                    } else {

                        return false;
                    }
                    break;
                case "name";
                    if($this->setName($value)) {

                        $col_value = $this->getName();
                    } else {

                        return false;
                    }
                    break;
                case "active";
                    if($this->setActive($value)) {

                        $col_value = $this->isActive();
                    } else {

                        return false;
                    }
                    break;
                default:
                    $col_value = $value;
                    break;

            }

            return $col_value;
        } else {

            return false;
        }
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return bool
     */
    public function setId(int $id): bool
    {
        if($this->ValidateColumnValue($id, "number", 11)) {

            $this->id = $id;
            return true;
        } else {

            return false;
        }
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): bool
    {
        if($this->ValidateColumnValue($name, "string", 255)) {

            $this->name = $name;
            return true;
        } else {

            return false;
        }
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->active;
    }

    /**
     * @param bool $active
     */
    public function setActive(bool $active): bool
    {
        if($this->ValidateColumnValue($active, "bool", 1)) {

            $this->active = $active;
            return true;
        } else {
            return false;
        }
    }
}