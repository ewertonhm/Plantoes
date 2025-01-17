<?php

namespace Base;

use \DiasIndisponiveis as ChildDiasIndisponiveis;
use \DiasIndisponiveisQuery as ChildDiasIndisponiveisQuery;
use \Exception;
use \PDO;
use Map\DiasIndisponiveisTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'dias_indisponiveis' table.
 *
 *
 *
 * @method     ChildDiasIndisponiveisQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildDiasIndisponiveisQuery orderByData($order = Criteria::ASC) Order by the data column
 * @method     ChildDiasIndisponiveisQuery orderByJuizId($order = Criteria::ASC) Order by the juiz_id column
 *
 * @method     ChildDiasIndisponiveisQuery groupById() Group by the id column
 * @method     ChildDiasIndisponiveisQuery groupByData() Group by the data column
 * @method     ChildDiasIndisponiveisQuery groupByJuizId() Group by the juiz_id column
 *
 * @method     ChildDiasIndisponiveisQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildDiasIndisponiveisQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildDiasIndisponiveisQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildDiasIndisponiveisQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildDiasIndisponiveisQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildDiasIndisponiveisQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildDiasIndisponiveisQuery leftJoinJuizes($relationAlias = null) Adds a LEFT JOIN clause to the query using the Juizes relation
 * @method     ChildDiasIndisponiveisQuery rightJoinJuizes($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Juizes relation
 * @method     ChildDiasIndisponiveisQuery innerJoinJuizes($relationAlias = null) Adds a INNER JOIN clause to the query using the Juizes relation
 *
 * @method     ChildDiasIndisponiveisQuery joinWithJuizes($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Juizes relation
 *
 * @method     ChildDiasIndisponiveisQuery leftJoinWithJuizes() Adds a LEFT JOIN clause and with to the query using the Juizes relation
 * @method     ChildDiasIndisponiveisQuery rightJoinWithJuizes() Adds a RIGHT JOIN clause and with to the query using the Juizes relation
 * @method     ChildDiasIndisponiveisQuery innerJoinWithJuizes() Adds a INNER JOIN clause and with to the query using the Juizes relation
 *
 * @method     \JuizesQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildDiasIndisponiveis findOne(ConnectionInterface $con = null) Return the first ChildDiasIndisponiveis matching the query
 * @method     ChildDiasIndisponiveis findOneOrCreate(ConnectionInterface $con = null) Return the first ChildDiasIndisponiveis matching the query, or a new ChildDiasIndisponiveis object populated from the query conditions when no match is found
 *
 * @method     ChildDiasIndisponiveis findOneById(int $id) Return the first ChildDiasIndisponiveis filtered by the id column
 * @method     ChildDiasIndisponiveis findOneByData(string $data) Return the first ChildDiasIndisponiveis filtered by the data column
 * @method     ChildDiasIndisponiveis findOneByJuizId(int $juiz_id) Return the first ChildDiasIndisponiveis filtered by the juiz_id column *

 * @method     ChildDiasIndisponiveis requirePk($key, ConnectionInterface $con = null) Return the ChildDiasIndisponiveis by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDiasIndisponiveis requireOne(ConnectionInterface $con = null) Return the first ChildDiasIndisponiveis matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildDiasIndisponiveis requireOneById(int $id) Return the first ChildDiasIndisponiveis filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDiasIndisponiveis requireOneByData(string $data) Return the first ChildDiasIndisponiveis filtered by the data column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDiasIndisponiveis requireOneByJuizId(int $juiz_id) Return the first ChildDiasIndisponiveis filtered by the juiz_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildDiasIndisponiveis[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildDiasIndisponiveis objects based on current ModelCriteria
 * @method     ChildDiasIndisponiveis[]|ObjectCollection findById(int $id) Return ChildDiasIndisponiveis objects filtered by the id column
 * @method     ChildDiasIndisponiveis[]|ObjectCollection findByData(string $data) Return ChildDiasIndisponiveis objects filtered by the data column
 * @method     ChildDiasIndisponiveis[]|ObjectCollection findByJuizId(int $juiz_id) Return ChildDiasIndisponiveis objects filtered by the juiz_id column
 * @method     ChildDiasIndisponiveis[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class DiasIndisponiveisQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\DiasIndisponiveisQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\DiasIndisponiveis', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildDiasIndisponiveisQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildDiasIndisponiveisQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildDiasIndisponiveisQuery) {
            return $criteria;
        }
        $query = new ChildDiasIndisponiveisQuery();
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
     * @return ChildDiasIndisponiveis|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(DiasIndisponiveisTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = DiasIndisponiveisTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildDiasIndisponiveis A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, data, juiz_id FROM dias_indisponiveis WHERE id = :p0';
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
            /** @var ChildDiasIndisponiveis $obj */
            $obj = new ChildDiasIndisponiveis();
            $obj->hydrate($row);
            DiasIndisponiveisTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildDiasIndisponiveis|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildDiasIndisponiveisQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(DiasIndisponiveisTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildDiasIndisponiveisQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(DiasIndisponiveisTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildDiasIndisponiveisQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(DiasIndisponiveisTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(DiasIndisponiveisTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DiasIndisponiveisTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildDiasIndisponiveisQuery The current query, for fluid interface
     */
    public function filterByData($data = null, $comparison = null)
    {
        if (is_array($data)) {
            $useMinMax = false;
            if (isset($data['min'])) {
                $this->addUsingAlias(DiasIndisponiveisTableMap::COL_DATA, $data['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($data['max'])) {
                $this->addUsingAlias(DiasIndisponiveisTableMap::COL_DATA, $data['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DiasIndisponiveisTableMap::COL_DATA, $data, $comparison);
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
     * @return $this|ChildDiasIndisponiveisQuery The current query, for fluid interface
     */
    public function filterByJuizId($juizId = null, $comparison = null)
    {
        if (is_array($juizId)) {
            $useMinMax = false;
            if (isset($juizId['min'])) {
                $this->addUsingAlias(DiasIndisponiveisTableMap::COL_JUIZ_ID, $juizId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($juizId['max'])) {
                $this->addUsingAlias(DiasIndisponiveisTableMap::COL_JUIZ_ID, $juizId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DiasIndisponiveisTableMap::COL_JUIZ_ID, $juizId, $comparison);
    }

    /**
     * Filter the query by a related \Juizes object
     *
     * @param \Juizes|ObjectCollection $juizes The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildDiasIndisponiveisQuery The current query, for fluid interface
     */
    public function filterByJuizes($juizes, $comparison = null)
    {
        if ($juizes instanceof \Juizes) {
            return $this
                ->addUsingAlias(DiasIndisponiveisTableMap::COL_JUIZ_ID, $juizes->getId(), $comparison);
        } elseif ($juizes instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(DiasIndisponiveisTableMap::COL_JUIZ_ID, $juizes->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return $this|ChildDiasIndisponiveisQuery The current query, for fluid interface
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
     * @param   ChildDiasIndisponiveis $diasIndisponiveis Object to remove from the list of results
     *
     * @return $this|ChildDiasIndisponiveisQuery The current query, for fluid interface
     */
    public function prune($diasIndisponiveis = null)
    {
        if ($diasIndisponiveis) {
            $this->addUsingAlias(DiasIndisponiveisTableMap::COL_ID, $diasIndisponiveis->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the dias_indisponiveis table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(DiasIndisponiveisTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            DiasIndisponiveisTableMap::clearInstancePool();
            DiasIndisponiveisTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(DiasIndisponiveisTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(DiasIndisponiveisTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            DiasIndisponiveisTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            DiasIndisponiveisTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // DiasIndisponiveisQuery
