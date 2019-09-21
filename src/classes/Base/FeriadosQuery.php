<?php

namespace Base;

use \Feriados as ChildFeriados;
use \FeriadosQuery as ChildFeriadosQuery;
use \Exception;
use \PDO;
use Map\FeriadosTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'feriados' table.
 *
 *
 *
 * @method     ChildFeriadosQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildFeriadosQuery orderByNome($order = Criteria::ASC) Order by the nome column
 * @method     ChildFeriadosQuery orderByData($order = Criteria::ASC) Order by the data column
 * @method     ChildFeriadosQuery orderByCidadeId($order = Criteria::ASC) Order by the cidade_id column
 *
 * @method     ChildFeriadosQuery groupById() Group by the id column
 * @method     ChildFeriadosQuery groupByNome() Group by the nome column
 * @method     ChildFeriadosQuery groupByData() Group by the data column
 * @method     ChildFeriadosQuery groupByCidadeId() Group by the cidade_id column
 *
 * @method     ChildFeriadosQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildFeriadosQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildFeriadosQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildFeriadosQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildFeriadosQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildFeriadosQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildFeriadosQuery leftJoinCidades($relationAlias = null) Adds a LEFT JOIN clause to the query using the Cidades relation
 * @method     ChildFeriadosQuery rightJoinCidades($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Cidades relation
 * @method     ChildFeriadosQuery innerJoinCidades($relationAlias = null) Adds a INNER JOIN clause to the query using the Cidades relation
 *
 * @method     ChildFeriadosQuery joinWithCidades($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Cidades relation
 *
 * @method     ChildFeriadosQuery leftJoinWithCidades() Adds a LEFT JOIN clause and with to the query using the Cidades relation
 * @method     ChildFeriadosQuery rightJoinWithCidades() Adds a RIGHT JOIN clause and with to the query using the Cidades relation
 * @method     ChildFeriadosQuery innerJoinWithCidades() Adds a INNER JOIN clause and with to the query using the Cidades relation
 *
 * @method     \CidadesQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildFeriados findOne(ConnectionInterface $con = null) Return the first ChildFeriados matching the query
 * @method     ChildFeriados findOneOrCreate(ConnectionInterface $con = null) Return the first ChildFeriados matching the query, or a new ChildFeriados object populated from the query conditions when no match is found
 *
 * @method     ChildFeriados findOneById(int $id) Return the first ChildFeriados filtered by the id column
 * @method     ChildFeriados findOneByNome(string $nome) Return the first ChildFeriados filtered by the nome column
 * @method     ChildFeriados findOneByData(string $data) Return the first ChildFeriados filtered by the data column
 * @method     ChildFeriados findOneByCidadeId(int $cidade_id) Return the first ChildFeriados filtered by the cidade_id column *

 * @method     ChildFeriados requirePk($key, ConnectionInterface $con = null) Return the ChildFeriados by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFeriados requireOne(ConnectionInterface $con = null) Return the first ChildFeriados matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildFeriados requireOneById(int $id) Return the first ChildFeriados filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFeriados requireOneByNome(string $nome) Return the first ChildFeriados filtered by the nome column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFeriados requireOneByData(string $data) Return the first ChildFeriados filtered by the data column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFeriados requireOneByCidadeId(int $cidade_id) Return the first ChildFeriados filtered by the cidade_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildFeriados[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildFeriados objects based on current ModelCriteria
 * @method     ChildFeriados[]|ObjectCollection findById(int $id) Return ChildFeriados objects filtered by the id column
 * @method     ChildFeriados[]|ObjectCollection findByNome(string $nome) Return ChildFeriados objects filtered by the nome column
 * @method     ChildFeriados[]|ObjectCollection findByData(string $data) Return ChildFeriados objects filtered by the data column
 * @method     ChildFeriados[]|ObjectCollection findByCidadeId(int $cidade_id) Return ChildFeriados objects filtered by the cidade_id column
 * @method     ChildFeriados[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class FeriadosQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\FeriadosQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Feriados', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildFeriadosQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildFeriadosQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildFeriadosQuery) {
            return $criteria;
        }
        $query = new ChildFeriadosQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildFeriados|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(FeriadosTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = FeriadosTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildFeriados A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, nome, data, cidade_id FROM feriados WHERE id = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildFeriados $obj */
            $obj = new ChildFeriados();
            $obj->hydrate($row);
            FeriadosTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildFeriados|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildFeriadosQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(FeriadosTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildFeriadosQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(FeriadosTableMap::COL_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFeriadosQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(FeriadosTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(FeriadosTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FeriadosTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the nome column
     *
     * Example usage:
     * <code>
     * $query->filterByNome('fooValue');   // WHERE nome = 'fooValue'
     * $query->filterByNome('%fooValue%', Criteria::LIKE); // WHERE nome LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nome The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFeriadosQuery The current query, for fluid interface
     */
    public function filterByNome($nome = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nome)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FeriadosTableMap::COL_NOME, $nome, $comparison);
    }

    /**
     * Filter the query on the data column
     *
     * Example usage:
     * <code>
     * $query->filterByData('2011-03-14'); // WHERE data = '2011-03-14'
     * $query->filterByData('now'); // WHERE data = '2011-03-14'
     * $query->filterByData(array('max' => 'yesterday')); // WHERE data > '2011-03-13'
     * </code>
     *
     * @param     mixed $data The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFeriadosQuery The current query, for fluid interface
     */
    public function filterByData($data = null, $comparison = null)
    {
        if (is_array($data)) {
            $useMinMax = false;
            if (isset($data['min'])) {
                $this->addUsingAlias(FeriadosTableMap::COL_DATA, $data['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($data['max'])) {
                $this->addUsingAlias(FeriadosTableMap::COL_DATA, $data['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FeriadosTableMap::COL_DATA, $data, $comparison);
    }

    /**
     * Filter the query on the cidade_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCidadeId(1234); // WHERE cidade_id = 1234
     * $query->filterByCidadeId(array(12, 34)); // WHERE cidade_id IN (12, 34)
     * $query->filterByCidadeId(array('min' => 12)); // WHERE cidade_id > 12
     * </code>
     *
     * @see       filterByCidades()
     *
     * @param     mixed $cidadeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFeriadosQuery The current query, for fluid interface
     */
    public function filterByCidadeId($cidadeId = null, $comparison = null)
    {
        if (is_array($cidadeId)) {
            $useMinMax = false;
            if (isset($cidadeId['min'])) {
                $this->addUsingAlias(FeriadosTableMap::COL_CIDADE_ID, $cidadeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cidadeId['max'])) {
                $this->addUsingAlias(FeriadosTableMap::COL_CIDADE_ID, $cidadeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FeriadosTableMap::COL_CIDADE_ID, $cidadeId, $comparison);
    }

    /**
     * Filter the query by a related \Cidades object
     *
     * @param \Cidades|ObjectCollection $cidades The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildFeriadosQuery The current query, for fluid interface
     */
    public function filterByCidades($cidades, $comparison = null)
    {
        if ($cidades instanceof \Cidades) {
            return $this
                ->addUsingAlias(FeriadosTableMap::COL_CIDADE_ID, $cidades->getId(), $comparison);
        } elseif ($cidades instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(FeriadosTableMap::COL_CIDADE_ID, $cidades->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByCidades() only accepts arguments of type \Cidades or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Cidades relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildFeriadosQuery The current query, for fluid interface
     */
    public function joinCidades($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Cidades');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Cidades');
        }

        return $this;
    }

    /**
     * Use the Cidades relation Cidades object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \CidadesQuery A secondary query class using the current class as primary query
     */
    public function useCidadesQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinCidades($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Cidades', '\CidadesQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildFeriados $feriados Object to remove from the list of results
     *
     * @return $this|ChildFeriadosQuery The current query, for fluid interface
     */
    public function prune($feriados = null)
    {
        if ($feriados) {
            $this->addUsingAlias(FeriadosTableMap::COL_ID, $feriados->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the feriados table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(FeriadosTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            FeriadosTableMap::clearInstancePool();
            FeriadosTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(FeriadosTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(FeriadosTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            FeriadosTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            FeriadosTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // FeriadosQuery
