<?php

namespace Cacofony\BaseClasse;


use App\Service\DebugService;
use Cacofony\Interfaces\FactoryInterface;

abstract class BaseManager
{
    protected \PDO $pdo;
    protected string $shortEntityName;
    protected string $entityName;

    public function __construct(FactoryInterface $factory)
    {
        $this->pdo = $factory->getPDO();
        $this->shortEntityName = str_replace('Manager', '', (new \ReflectionClass($this))->getShortName());
        $this->entityName = 'App\\Entity\\' . $this->shortEntityName;
    }

    /**
     * @return BaseEntity[]
     */
    public function findAll(): array
    {
        $results = $this->pdo
            ->query("SELECT * FROM `$this->shortEntityName`")
            ->fetchAll(\PDO::FETCH_ASSOC);
        foreach ($results as $post) {
            $classes[] = new $this->entityName($post);
        }
        return $classes ?? [];
    }

    /**
     * @param string $column
     * @param string|int $value
     * @return BaseEntity[]
     */
    public function findAllBy(string $column, string|int $value): array
    {
        $statement = $this->pdo->prepare("SELECT * FROM `$this->shortEntityName` WHERE `$column` = :val");
        $statement->bindValue('val', $value);
        $statement->execute();
        $statement->setFetchMode(\PDO::FETCH_ASSOC);

        $results = $statement->fetchAll();

        foreach ($results as $post) {
            $classes[] = new $this->entityName($post);
        }
        return $classes ?? [];
    }

    /**
     * @param string $column
     * @param string|int $value
     * @return BaseEntity|bool
     */
    public function findOneBy(string $column, string|int $value): BaseEntity|bool
    {
        $statement = $this->pdo->prepare("SELECT * FROM `$this->shortEntityName` WHERE `$column` = :val");
        $statement->bindValue('val', $value);
        $statement->execute();
        $statement->setFetchMode(\PDO::FETCH_ASSOC);

        if (!$result = $statement->fetch()) {
            return false;
        }

        return new $this->entityName($result);
    }

    public function create(array $properties): BaseEntity|bool
    {

        $keys = array_keys($properties);

        $columns = '(' . implode(', ', $keys) . ')';
        $values_prepared = '(:' . implode(', :', $keys) . ')';

        $statement = $this->pdo->prepare("insert into `$this->shortEntityName` {$columns} values {$values_prepared}");

        foreach ($properties as $key => $value) {
            $statement->bindValue($key, $value);
        }

        $statement->execute();

        return $this->findOneBy('id', $this->pdo->lastInsertId());
    }
}