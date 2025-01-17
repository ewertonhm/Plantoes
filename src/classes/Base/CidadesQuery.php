<?php

namespace Base;

use \Cidades as ChildCidades;
use \CidadesQuery as ChildCidadesQuery;
use \Exception;
use \PDO;
use Map\CidadesTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'cidades' table.
 *
 *
 *
 * @method     ChildCidadesQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildCidadesQuery orderByNome($order = Criteria::ASC) Order by the nome column
 *
 * @method     ChildCidadesQuery groupById() Group by the id column
 * @method     ChildCidadesQuery groupByNome() Group by the nome column
 *
 * @method     ChildCidadesQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildCidadesQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildCidadesQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildCidadesQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildCidadesQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildCidadesQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildCidadesQuery leftJoinFeriados($relationAlias = null) Adds a LEFT JOIN clause to the query using the Feriados relation
 * @method     ChildCidadesQuery rightJoinFeriados($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Feriados relation
 * @method     ChildCidadesQuery innerJoinFeriados($relationAlias = null) Adds a INNER JOIN clause to the query using the Feriados relation
 *
 * @method     ChildCidadesQuery joinWithFeriados($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Feriados relation
 *
 * @method     ChildCidadesQuery leftJoinWithFeriados() Adds a LEFT JOIN clause and with to the query using the Feriados relation
 * @method     ChildCidadesQuery rightJoinWithFeriados() Adds a RIGHT JOIN clause and with to the query using the Feriados relation
 * @method     ChildCidadesQuery innerJoinWithFeriados() Adds a INNER JOIN clause and with to the query using the Feriados relation
 *
 * @method     ChildCidadesQuery leftJoinJuizes($relationAlias = null) Adds a LEFT JOIN clause to the query using the Juizes relation
 * @method     ChildCidadesQuery rightJoinJuizes($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Juizes relation
 * @method     ChildCidadesQuery innerJoinJuizes($relationAlias = null) Adds a INNER JOIN clause to the query using the Juizes relation
 *
 * @method     ChildCidadesQuery joinWithJuizes($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Juizes relation
 *
 * @method     ChildCidadesQuery leftJoinWithJuizes() Adds a LEFT JOIN clause and with to the query using the Juizes relation
 * @method     ChildCidadesQuery rightJoinWithJuizes() Adds a RIGHT JOIN clause and with to the query using the Juizes relation
 * @method     ChildCidadesQuery innerJoinWithJuizes() Adds a INNER JOIN clause and with to the query using the Juizes relation
 *
 * @method     \FeriadosQuery|\JuizesQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildCidades findOne(ConnectionInterface $con = null) Return the first ChildCidades matching the query
 * @method     ChildCidades findOneOrCreate(ConnectionInterface $con = null) Return the first ChildCidades matching the query, or a new ChildCidades object populated from the query conditions when no match is found
 *
 * @method     ChildCidades findOneById(int $id) Return the first ChildCidades filtered by the id column
 * @method     ChildCidades findOneByNome(string $nome) Return the first ChildCidades filtered by the nome column *

 * @method     ChildCidades requirePk($key, ConnectionInterface $con = null) Return the ChildCidades by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCidades requireOne(ConnectionInterface $con = null) Return the first ChildCidades matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCidades requireOneById(int $id) Return the first ChildCidades filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCidades requireOneByNome(string $nome) Return the first ChildCidades filtered by the nome column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCidades[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildCidades objects based on current ModelCriteria
 * @method     ChildCidades[]|ObjectCollection findById(int $id) Return ChildCidades objects filtered by the id column
 * @method     ChildCidades[]|ObjectCollection findByNome(string $nome) Return ChildCidades objects filtered by the nome column
 * @method     ChildCidades[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class CidadesQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\CidadesQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Cidades', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildCidadesQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildCidadesQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildCidadesQuery) {
            return $criteria;
        }
        $query = new ChildCidadesQuery();
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
     * @return ChildCidades|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(CidadesTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = CidadesTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildCidades A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, nome FROM cidades WHERE id = :p0';
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
            /** @var ChildCidades $obj */
            $obj = new ChildCidades();
            $obj->hydrate($row);
            CidadesTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildCidades|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildCidadesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(CidadesTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildCidadesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(CidadesTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildCidadesQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(CidadesTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(CidadesTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CidadesTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildCidadesQuery The current query, for fluid interface
     */
    public function filterByNome($nome = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nome)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CidadesTableMap::COL_NOME, $nome, $comparison);
    }

    /**
     * Filter the query by a related \Feriados object
     *
     * @param \Feriados|ObjectCollection $feriados the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCidadesQuery The current query, for fluid interface
     */
    public function filterByFeriados($feriados, $comparison = null)
    {
        if ($feriados instanceof \Feriados) {
            return $this
                ->addUsingAlias(CidadesTableMap::COL_ID, $feriados->getCidadeId(), $comparison);
        } elseif ($feriados instanceof ObjectCollection) {
            return $this
                ->useFeriadosQuery()
                ->filterByPrimaryKeys($feriados->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByFeriados() only accepts arguments of type \Feriados or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Feriados relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCidadesQuery The current query, for fluid interface
     */
    public function joinFeriados($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Feriados');

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
            $this->addJoinObject($join, 'Feriados');
        }

        return $this;
    }

    /**
     * Use the Feriados relation Feriados object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \FeriadosQuery A secondary query class using the current class as primary query
     */
    public function useFeriadosQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinFeriados($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Feriados', '\FeriadosQuery');
    }

    /**
     * Filter the query by a related \Juizes object
     *
     * @param \Juizes|ObjectCollection $juizes the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCidadesQuery The current query, for fluid interface
     */
    public function filterByJuizes($juizes, $comparison = null)
    {
        if ($juizes instanceof \Juizes) {
            return $this
                ->addUsingAlias(CidadesTableMap::COL_ID, $juizes->getCidadeId(), $comparison);
        } elseif ($juizes instanceof ObjectCollection) {
            return $this
                ->useJuizesQuery()
                ->filterByPrimaryKeys($juizes->getPrimaryKeys())
                ->endUse();
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
     * @return $this|ChildCidadesQuery The current query, for fluid interface
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
     * @param   ChildCidades $cidades Object to remove from the list of results
     *
     * @return $this|ChildCidadesQuery The current query, for fluid interface
     */
    public function prune($cidades = null)
    {
        if ($cidades) {
            $this->addUsingAlias(CidadesTableMap::COL_ID, $cidades->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the cidades table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CidadesTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            CidadesTableMap::clearInstancePool();
            CidadesTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(CidadesTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(CidadesTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            CidadesTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            CidadesTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // CidadesQuery
