<?php

namespace Base;

use \Agendas as ChildAgendas;
use \AgendasQuery as ChildAgendasQuery;
use \Exception;
use \PDO;
use Map\AgendasTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'agendas' table.
 *
 *
 *
 * @method     ChildAgendasQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildAgendasQuery orderByDataInicio($order = Criteria::ASC) Order by the data_inicio column
 * @method     ChildAgendasQuery orderByDataFim($order = Criteria::ASC) Order by the data_fim column
 * @method     ChildAgendasQuery orderBySemana($order = Criteria::ASC) Order by the semana column
 * @method     ChildAgendasQuery orderByAno($order = Criteria::ASC) Order by the ano column
 * @method     ChildAgendasQuery orderByJuizId($order = Criteria::ASC) Order by the juiz_id column
 *
 * @method     ChildAgendasQuery groupById() Group by the id column
 * @method     ChildAgendasQuery groupByDataInicio() Group by the data_inicio column
 * @method     ChildAgendasQuery groupByDataFim() Group by the data_fim column
 * @method     ChildAgendasQuery groupBySemana() Group by the semana column
 * @method     ChildAgendasQuery groupByAno() Group by the ano column
 * @method     ChildAgendasQuery groupByJuizId() Group by the juiz_id column
 *
 * @method     ChildAgendasQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAgendasQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAgendasQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAgendasQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAgendasQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAgendasQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAgendasQuery leftJoinJuizes($relationAlias = null) Adds a LEFT JOIN clause to the query using the Juizes relation
 * @method     ChildAgendasQuery rightJoinJuizes($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Juizes relation
 * @method     ChildAgendasQuery innerJoinJuizes($relationAlias = null) Adds a INNER JOIN clause to the query using the Juizes relation
 *
 * @method     ChildAgendasQuery joinWithJuizes($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Juizes relation
 *
 * @method     ChildAgendasQuery leftJoinWithJuizes() Adds a LEFT JOIN clause and with to the query using the Juizes relation
 * @method     ChildAgendasQuery rightJoinWithJuizes() Adds a RIGHT JOIN clause and with to the query using the Juizes relation
 * @method     ChildAgendasQuery innerJoinWithJuizes() Adds a INNER JOIN clause and with to the query using the Juizes relation
 *
 * @method     \JuizesQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildAgendas findOne(ConnectionInterface $con = null) Return the first ChildAgendas matching the query
 * @method     ChildAgendas findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAgendas matching the query, or a new ChildAgendas object populated from the query conditions when no match is found
 *
 * @method     ChildAgendas findOneById(int $id) Return the first ChildAgendas filtered by the id column
 * @method     ChildAgendas findOneByDataInicio(string $data_inicio) Return the first ChildAgendas filtered by the data_inicio column
 * @method     ChildAgendas findOneByDataFim(string $data_fim) Return the first ChildAgendas filtered by the data_fim column
 * @method     ChildAgendas findOneBySemana(int $semana) Return the first ChildAgendas filtered by the semana column
 * @method     ChildAgendas findOneByAno(int $ano) Return the first ChildAgendas filtered by the ano column
 * @method     ChildAgendas findOneByJuizId(int $juiz_id) Return the first ChildAgendas filtered by the juiz_id column *

 * @method     ChildAgendas requirePk($key, ConnectionInterface $con = null) Return the ChildAgendas by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAgendas requireOne(ConnectionInterface $con = null) Return the first ChildAgendas matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAgendas requireOneById(int $id) Return the first ChildAgendas filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAgendas requireOneByDataInicio(string $data_inicio) Return the first ChildAgendas filtered by the data_inicio column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAgendas requireOneByDataFim(string $data_fim) Return the first ChildAgendas filtered by the data_fim column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAgendas requireOneBySemana(int $semana) Return the first ChildAgendas filtered by the semana column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAgendas requireOneByAno(int $ano) Return the first ChildAgendas filtered by the ano column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAgendas requireOneByJuizId(int $juiz_id) Return the first ChildAgendas filtered by the juiz_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAgendas[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAgendas objects based on current ModelCriteria
 * @method     ChildAgendas[]|ObjectCollection findById(int $id) Return ChildAgendas objects filtered by the id column
 * @method     ChildAgendas[]|ObjectCollection findByDataInicio(string $data_inicio) Return ChildAgendas objects filtered by the data_inicio column
 * @method     ChildAgendas[]|ObjectCollection findByDataFim(string $data_fim) Return ChildAgendas objects filtered by the data_fim column
 * @method     ChildAgendas[]|ObjectCollection findBySemana(int $semana) Return ChildAgendas objects filtered by the semana column
 * @method     ChildAgendas[]|ObjectCollection findByAno(int $ano) Return ChildAgendas objects filtered by the ano column
 * @method     ChildAgendas[]|ObjectCollection findByJuizId(int $juiz_id) Return ChildAgendas objects filtered by the juiz_id column
 * @method     ChildAgendas[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AgendasQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\AgendasQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Agendas', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAgendasQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAgendasQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAgendasQuery) {
            return $criteria;
        }
        $query = new ChildAgendasQuery();
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
     * @return ChildAgendas|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AgendasTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AgendasTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAgendas A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, data_inicio, data_fim, semana, ano, juiz_id FROM agendas WHERE id = :p0';
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
            /** @var ChildAgendas $obj */
            $obj = new ChildAgendas();
            $obj->hydrate($row);
            AgendasTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAgendas|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAgendasQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AgendasTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAgendasQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AgendasTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildAgendasQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(AgendasTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(AgendasTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AgendasTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the data_inicio column
     *
     * Example usage:
     * <code>
     * $query->filterByDataInicio('2011-03-14'); // WHERE data_inicio = '2011-03-14'
     * $query->filterByDataInicio('now'); // WHERE data_inicio = '2011-03-14'
     * $query->filterByDataInicio(array('max' => 'yesterday')); // WHERE data_inicio > '2011-03-13'
     * </code>
     *
     * @param     mixed $dataInicio The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAgendasQuery The current query, for fluid interface
     */
    public function filterByDataInicio($dataInicio = null, $comparison = null)
    {
        if (is_array($dataInicio)) {
            $useMinMax = false;
            if (isset($dataInicio['min'])) {
                $this->addUsingAlias(AgendasTableMap::COL_DATA_INICIO, $dataInicio['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dataInicio['max'])) {
                $this->addUsingAlias(AgendasTableMap::COL_DATA_INICIO, $dataInicio['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AgendasTableMap::COL_DATA_INICIO, $dataInicio, $comparison);
    }

    /**
     * Filter the query on the data_fim column
     *
     * Example usage:
     * <code>
     * $query->filterByDataFim('2011-03-14'); // WHERE data_fim = '2011-03-14'
     * $query->filterByDataFim('now'); // WHERE data_fim = '2011-03-14'
     * $query->filterByDataFim(array('max' => 'yesterday')); // WHERE data_fim > '2011-03-13'
     * </code>
     *
     * @param     mixed $dataFim The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAgendasQuery The current query, for fluid interface
     */
    public function filterByDataFim($dataFim = null, $comparison = null)
    {
        if (is_array($dataFim)) {
            $useMinMax = false;
            if (isset($dataFim['min'])) {
                $this->addUsingAlias(AgendasTableMap::COL_DATA_FIM, $dataFim['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dataFim['max'])) {
                $this->addUsingAlias(AgendasTableMap::COL_DATA_FIM, $dataFim['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AgendasTableMap::COL_DATA_FIM, $dataFim, $comparison);
    }

    /**
     * Filter the query on the semana column
     *
     * Example usage:
     * <code>
     * $query->filterBySemana(1234); // WHERE semana = 1234
     * $query->filterBySemana(array(12, 34)); // WHERE semana IN (12, 34)
     * $query->filterBySemana(array('min' => 12)); // WHERE semana > 12
     * </code>
     *
     * @param     mixed $semana The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAgendasQuery The current query, for fluid interface
     */
    public function filterBySemana($semana = null, $comparison = null)
    {
        if (is_array($semana)) {
            $useMinMax = false;
            if (isset($semana['min'])) {
                $this->addUsingAlias(AgendasTableMap::COL_SEMANA, $semana['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($semana['max'])) {
                $this->addUsingAlias(AgendasTableMap::COL_SEMANA, $semana['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AgendasTableMap::COL_SEMANA, $semana, $comparison);
    }

    /**
     * Filter the query on the ano column
     *
     * Example usage:
     * <code>
     * $query->filterByAno(1234); // WHERE ano = 1234
     * $query->filterByAno(array(12, 34)); // WHERE ano IN (12, 34)
     * $query->filterByAno(array('min' => 12)); // WHERE ano > 12
     * </code>
     *
     * @param     mixed $ano The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAgendasQuery The current query, for fluid interface
     */
    public function filterByAno($ano = null, $comparison = null)
    {
        if (is_array($ano)) {
            $useMinMax = false;
            if (isset($ano['min'])) {
                $this->addUsingAlias(AgendasTableMap::COL_ANO, $ano['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ano['max'])) {
                $this->addUsingAlias(AgendasTableMap::COL_ANO, $ano['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AgendasTableMap::COL_ANO, $ano, $comparison);
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
     * @return $this|ChildAgendasQuery The current query, for fluid interface
     */
    public function filterByJuizId($juizId = null, $comparison = null)
    {
        if (is_array($juizId)) {
            $useMinMax = false;
            if (isset($juizId['min'])) {
                $this->addUsingAlias(AgendasTableMap::COL_JUIZ_ID, $juizId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($juizId['max'])) {
                $this->addUsingAlias(AgendasTableMap::COL_JUIZ_ID, $juizId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AgendasTableMap::COL_JUIZ_ID, $juizId, $comparison);
    }

    /**
     * Filter the query by a related \Juizes object
     *
     * @param \Juizes|ObjectCollection $juizes The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildAgendasQuery The current query, for fluid interface
     */
    public function filterByJuizes($juizes, $comparison = null)
    {
        if ($juizes instanceof \Juizes) {
            return $this
                ->addUsingAlias(AgendasTableMap::COL_JUIZ_ID, $juizes->getId(), $comparison);
        } elseif ($juizes instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(AgendasTableMap::COL_JUIZ_ID, $juizes->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return $this|ChildAgendasQuery The current query, for fluid interface
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
     * @param   ChildAgendas $agendas Object to remove from the list of results
     *
     * @return $this|ChildAgendasQuery The current query, for fluid interface
     */
    public function prune($agendas = null)
    {
        if ($agendas) {
            $this->addUsingAlias(AgendasTableMap::COL_ID, $agendas->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the agendas table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AgendasTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AgendasTableMap::clearInstancePool();
            AgendasTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AgendasTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AgendasTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AgendasTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AgendasTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AgendasQuery
