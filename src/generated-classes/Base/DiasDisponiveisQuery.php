<?php

namespace Base;

use \DiasDisponiveis as ChildDiasDisponiveis;
use \DiasDisponiveisQuery as ChildDiasDisponiveisQuery;
use \Exception;
use \PDO;
use Map\DiasDisponiveisTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'dias_disponiveis' table.
 *
 *
 *
 * @method     ChildDiasDisponiveisQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildDiasDisponiveisQuery orderByData($order = Criteria::ASC) Order by the data column
 * @method     ChildDiasDisponiveisQuery orderByJuizId($order = Criteria::ASC) Order by the juiz_id column
 *
 * @method     ChildDiasDisponiveisQuery groupById() Group by the id column
 * @method     ChildDiasDisponiveisQuery groupByData() Group by the data column
 * @method     ChildDiasDisponiveisQuery groupByJuizId() Group by the juiz_id column
 *
 * @method     ChildDiasDisponiveisQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildDiasDisponiveisQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildDiasDisponiveisQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildDiasDisponiveisQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildDiasDisponiveisQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildDiasDisponiveisQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildDiasDisponiveisQuery leftJoinJuizes($relationAlias = null) Adds a LEFT JOIN clause to the query using the Juizes relation
 * @method     ChildDiasDisponiveisQuery rightJoinJuizes($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Juizes relation
 * @method     ChildDiasDisponiveisQuery innerJoinJuizes($relationAlias = null) Adds a INNER JOIN clause to the query using the Juizes relation
 *
 * @method     ChildDiasDisponiveisQuery joinWithJuizes($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Juizes relation
 *
 * @method     ChildDiasDisponiveisQuery leftJoinWithJuizes() Adds a LEFT JOIN clause and with to the query using the Juizes relation
 * @method     ChildDiasDisponiveisQuery rightJoinWithJuizes() Adds a RIGHT JOIN clause and with to the query using the Juizes relation
 * @method     ChildDiasDisponiveisQuery innerJoinWithJuizes() Adds a INNER JOIN clause and with to the query using the Juizes relation
 *
 * @method     \JuizesQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildDiasDisponiveis findOne(ConnectionInterface $con = null) Return the first ChildDiasDisponiveis matching the query
 * @method     ChildDiasDisponiveis findOneOrCreate(ConnectionInterface $con = null) Return the first ChildDiasDisponiveis matching the query, or a new ChildDiasDisponiveis object populated from the query conditions when no match is found
 *
 * @method     ChildDiasDisponiveis findOneById(int $id) Return the first ChildDiasDisponiveis filtered by the id column
 * @method     ChildDiasDisponiveis findOneByData(string $data) Return the first ChildDiasDisponiveis filtered by the data column
 * @method     ChildDiasDisponiveis findOneByJuizId(int $juiz_id) Return the first ChildDiasDisponiveis filtered by the juiz_id column *

 * @method     ChildDiasDisponiveis requirePk($key, ConnectionInterface $con = null) Return the ChildDiasDisponiveis by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDiasDisponiveis requireOne(ConnectionInterface $con = null) Return the first ChildDiasDisponiveis matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildDiasDisponiveis requireOneById(int $id) Return the first ChildDiasDisponiveis filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDiasDisponiveis requireOneByData(string $data) Return the first ChildDiasDisponiveis filtered by the data column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDiasDisponiveis requireOneByJuizId(int $juiz_id) Return the first ChildDiasDisponiveis filtered by the juiz_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildDiasDisponiveis[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildDiasDisponiveis objects based on current ModelCriteria
 * @method     ChildDiasDisponiveis[]|ObjectCollection findById(int $id) Return ChildDiasDisponiveis objects filtered by the id column
 * @method     ChildDiasDisponiveis[]|ObjectCollection findByData(string $data) Return ChildDiasDisponiveis objects filtered by the data column
 * @method     ChildDiasDisponiveis[]|ObjectCollection findByJuizId(int $juiz_id) Return ChildDiasDisponiveis objects filtered by the juiz_id column
 * @method     ChildDiasDisponiveis[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class DiasDisponiveisQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\DiasDisponiveisQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\DiasDisponiveis', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildDiasDisponiveisQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildDiasDisponiveisQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildDiasDisponiveisQuery) {
            return $criteria;
        }
        $query = new ChildDiasDisponiveisQuery();
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
     * @return ChildDiasDisponiveis|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(DiasDisponiveisTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = DiasDisponiveisTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildDiasDisponiveis A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, data, juiz_id FROM dias_disponiveis WHERE id = :p0';
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
            /** @var ChildDiasDisponiveis $obj */
            $obj = new ChildDiasDisponiveis();
            $obj->hydrate($row);
            DiasDisponiveisTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildDiasDisponiveis|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildDiasDisponiveisQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(DiasDisponiveisTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildDiasDisponiveisQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(DiasDisponiveisTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildDiasDisponiveisQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(DiasDisponiveisTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(DiasDisponiveisTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DiasDisponiveisTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildDiasDisponiveisQuery The current query, for fluid interface
     */
    public function filterByData($data = null, $comparison = null)
    {
        if (is_array($data)) {
            $useMinMax = false;
            if (isset($data['min'])) {
                $this->addUsingAlias(DiasDisponiveisTableMap::COL_DATA, $data['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($data['max'])) {
                $this->addUsingAlias(DiasDisponiveisTableMap::COL_DATA, $data['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DiasDisponiveisTableMap::COL_DATA, $data, $comparison);
    }

    /**
     * Filter the query on the juiz_id column
     *
     * Example usage:
     * <code>
     * $query->filterByJuizId(1234); // WHERE juiz_id = 1234
     * $query->filterByJuizId(array(12, 34)); // WHERE juiz_id IN (12, 34)
     * $query->filterByJuizId(array('min' => 12)); // WHERE juiz_id > 12
     * </code>
     *
     * @see       filterByJuizes()
     *
     * @param     mixed $juizId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDiasDisponiveisQuery The current query, for fluid interface
     */
    public function filterByJuizId($juizId = null, $comparison = null)
    {
        if (is_array($juizId)) {
            $useMinMax = false;
            if (isset($juizId['min'])) {
                $this->addUsingAlias(DiasDisponiveisTableMap::COL_JUIZ_ID, $juizId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($juizId['max'])) {
                $this->addUsingAlias(DiasDisponiveisTableMap::COL_JUIZ_ID, $juizId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DiasDisponiveisTableMap::COL_JUIZ_ID, $juizId, $comparison);
    }

    /**
     * Filter the query by a related \Juizes object
     *
     * @param \Juizes|ObjectCollection $juizes The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildDiasDisponiveisQuery The current query, for fluid interface
     */
    public function filterByJuizes($juizes, $comparison = null)
    {
        if ($juizes instanceof \Juizes) {
            return $this
                ->addUsingAlias(DiasDisponiveisTableMap::COL_JUIZ_ID, $juizes->getId(), $comparison);
        } elseif ($juizes instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(DiasDisponiveisTableMap::COL_JUIZ_ID, $juizes->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByJuizes() only accepts arguments of type \Juizes or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Juizes relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildDiasDisponiveisQuery The current query, for fluid interface
     */
    public function joinJuizes($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Juizes');

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
            $this->addJoinObject($join, 'Juizes');
        }

        return $this;
    }

    /**
     * Use the Juizes relation Juizes object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \JuizesQuery A secondary query class using the current class as primary query
     */
    public function useJuizesQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinJuizes($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Juizes', '\JuizesQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildDiasDisponiveis $diasDisponiveis Object to remove from the list of results
     *
     * @return $this|ChildDiasDisponiveisQuery The current query, for fluid interface
     */
    public function prune($diasDisponiveis = null)
    {
        if ($diasDisponiveis) {
            $this->addUsingAlias(DiasDisponiveisTableMap::COL_ID, $diasDisponiveis->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the dias_disponiveis table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(DiasDisponiveisTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            DiasDisponiveisTableMap::clearInstancePool();
            DiasDisponiveisTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(DiasDisponiveisTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(DiasDisponiveisTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            DiasDisponiveisTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            DiasDisponiveisTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // DiasDisponiveisQuery
