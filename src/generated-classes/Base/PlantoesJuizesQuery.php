<?php

namespace Base;

use \PlantoesJuizes as ChildPlantoesJuizes;
use \PlantoesJuizesQuery as ChildPlantoesJuizesQuery;
use \Exception;
use \PDO;
use Map\PlantoesJuizesTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'plantoes_juizes' table.
 *
 *
 *
 * @method     ChildPlantoesJuizesQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildPlantoesJuizesQuery orderByCoeficienteDePlantoes($order = Criteria::ASC) Order by the coeficiente_de_plantoes column
 * @method     ChildPlantoesJuizesQuery orderByAno($order = Criteria::ASC) Order by the ano column
 * @method     ChildPlantoesJuizesQuery orderByNumeroDePlantoesRealizados($order = Criteria::ASC) Order by the numero_de_plantoes_realizados column
 * @method     ChildPlantoesJuizesQuery orderBySemanaUltimoPlantao($order = Criteria::ASC) Order by the semana_ultimo_plantao column
 * @method     ChildPlantoesJuizesQuery orderByJuizId($order = Criteria::ASC) Order by the juiz_id column
 *
 * @method     ChildPlantoesJuizesQuery groupById() Group by the id column
 * @method     ChildPlantoesJuizesQuery groupByCoeficienteDePlantoes() Group by the coeficiente_de_plantoes column
 * @method     ChildPlantoesJuizesQuery groupByAno() Group by the ano column
 * @method     ChildPlantoesJuizesQuery groupByNumeroDePlantoesRealizados() Group by the numero_de_plantoes_realizados column
 * @method     ChildPlantoesJuizesQuery groupBySemanaUltimoPlantao() Group by the semana_ultimo_plantao column
 * @method     ChildPlantoesJuizesQuery groupByJuizId() Group by the juiz_id column
 *
 * @method     ChildPlantoesJuizesQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildPlantoesJuizesQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildPlantoesJuizesQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildPlantoesJuizesQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildPlantoesJuizesQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildPlantoesJuizesQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildPlantoesJuizesQuery leftJoinJuizes($relationAlias = null) Adds a LEFT JOIN clause to the query using the Juizes relation
 * @method     ChildPlantoesJuizesQuery rightJoinJuizes($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Juizes relation
 * @method     ChildPlantoesJuizesQuery innerJoinJuizes($relationAlias = null) Adds a INNER JOIN clause to the query using the Juizes relation
 *
 * @method     ChildPlantoesJuizesQuery joinWithJuizes($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Juizes relation
 *
 * @method     ChildPlantoesJuizesQuery leftJoinWithJuizes() Adds a LEFT JOIN clause and with to the query using the Juizes relation
 * @method     ChildPlantoesJuizesQuery rightJoinWithJuizes() Adds a RIGHT JOIN clause and with to the query using the Juizes relation
 * @method     ChildPlantoesJuizesQuery innerJoinWithJuizes() Adds a INNER JOIN clause and with to the query using the Juizes relation
 *
 * @method     \JuizesQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildPlantoesJuizes findOne(ConnectionInterface $con = null) Return the first ChildPlantoesJuizes matching the query
 * @method     ChildPlantoesJuizes findOneOrCreate(ConnectionInterface $con = null) Return the first ChildPlantoesJuizes matching the query, or a new ChildPlantoesJuizes object populated from the query conditions when no match is found
 *
 * @method     ChildPlantoesJuizes findOneById(int $id) Return the first ChildPlantoesJuizes filtered by the id column
 * @method     ChildPlantoesJuizes findOneByCoeficienteDePlantoes(int $coeficiente_de_plantoes) Return the first ChildPlantoesJuizes filtered by the coeficiente_de_plantoes column
 * @method     ChildPlantoesJuizes findOneByAno(int $ano) Return the first ChildPlantoesJuizes filtered by the ano column
 * @method     ChildPlantoesJuizes findOneByNumeroDePlantoesRealizados(int $numero_de_plantoes_realizados) Return the first ChildPlantoesJuizes filtered by the numero_de_plantoes_realizados column
 * @method     ChildPlantoesJuizes findOneBySemanaUltimoPlantao(int $semana_ultimo_plantao) Return the first ChildPlantoesJuizes filtered by the semana_ultimo_plantao column
 * @method     ChildPlantoesJuizes findOneByJuizId(int $juiz_id) Return the first ChildPlantoesJuizes filtered by the juiz_id column *

 * @method     ChildPlantoesJuizes requirePk($key, ConnectionInterface $con = null) Return the ChildPlantoesJuizes by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPlantoesJuizes requireOne(ConnectionInterface $con = null) Return the first ChildPlantoesJuizes matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPlantoesJuizes requireOneById(int $id) Return the first ChildPlantoesJuizes filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPlantoesJuizes requireOneByCoeficienteDePlantoes(int $coeficiente_de_plantoes) Return the first ChildPlantoesJuizes filtered by the coeficiente_de_plantoes column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPlantoesJuizes requireOneByAno(int $ano) Return the first ChildPlantoesJuizes filtered by the ano column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPlantoesJuizes requireOneByNumeroDePlantoesRealizados(int $numero_de_plantoes_realizados) Return the first ChildPlantoesJuizes filtered by the numero_de_plantoes_realizados column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPlantoesJuizes requireOneBySemanaUltimoPlantao(int $semana_ultimo_plantao) Return the first ChildPlantoesJuizes filtered by the semana_ultimo_plantao column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPlantoesJuizes requireOneByJuizId(int $juiz_id) Return the first ChildPlantoesJuizes filtered by the juiz_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPlantoesJuizes[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildPlantoesJuizes objects based on current ModelCriteria
 * @method     ChildPlantoesJuizes[]|ObjectCollection findById(int $id) Return ChildPlantoesJuizes objects filtered by the id column
 * @method     ChildPlantoesJuizes[]|ObjectCollection findByCoeficienteDePlantoes(int $coeficiente_de_plantoes) Return ChildPlantoesJuizes objects filtered by the coeficiente_de_plantoes column
 * @method     ChildPlantoesJuizes[]|ObjectCollection findByAno(int $ano) Return ChildPlantoesJuizes objects filtered by the ano column
 * @method     ChildPlantoesJuizes[]|ObjectCollection findByNumeroDePlantoesRealizados(int $numero_de_plantoes_realizados) Return ChildPlantoesJuizes objects filtered by the numero_de_plantoes_realizados column
 * @method     ChildPlantoesJuizes[]|ObjectCollection findBySemanaUltimoPlantao(int $semana_ultimo_plantao) Return ChildPlantoesJuizes objects filtered by the semana_ultimo_plantao column
 * @method     ChildPlantoesJuizes[]|ObjectCollection findByJuizId(int $juiz_id) Return ChildPlantoesJuizes objects filtered by the juiz_id column
 * @method     ChildPlantoesJuizes[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class PlantoesJuizesQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\PlantoesJuizesQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\PlantoesJuizes', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildPlantoesJuizesQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildPlantoesJuizesQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildPlantoesJuizesQuery) {
            return $criteria;
        }
        $query = new ChildPlantoesJuizesQuery();
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
     * @return ChildPlantoesJuizes|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(PlantoesJuizesTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = PlantoesJuizesTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildPlantoesJuizes A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, coeficiente_de_plantoes, ano, numero_de_plantoes_realizados, semana_ultimo_plantao, juiz_id FROM plantoes_juizes WHERE id = :p0';
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
            /** @var ChildPlantoesJuizes $obj */
            $obj = new ChildPlantoesJuizes();
            $obj->hydrate($row);
            PlantoesJuizesTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildPlantoesJuizes|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildPlantoesJuizesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(PlantoesJuizesTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildPlantoesJuizesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(PlantoesJuizesTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildPlantoesJuizesQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(PlantoesJuizesTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(PlantoesJuizesTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PlantoesJuizesTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the coeficiente_de_plantoes column
     *
     * Example usage:
     * <code>
     * $query->filterByCoeficienteDePlantoes(1234); // WHERE coeficiente_de_plantoes = 1234
     * $query->filterByCoeficienteDePlantoes(array(12, 34)); // WHERE coeficiente_de_plantoes IN (12, 34)
     * $query->filterByCoeficienteDePlantoes(array('min' => 12)); // WHERE coeficiente_de_plantoes > 12
     * </code>
     *
     * @param     mixed $coeficienteDePlantoes The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPlantoesJuizesQuery The current query, for fluid interface
     */
    public function filterByCoeficienteDePlantoes($coeficienteDePlantoes = null, $comparison = null)
    {
        if (is_array($coeficienteDePlantoes)) {
            $useMinMax = false;
            if (isset($coeficienteDePlantoes['min'])) {
                $this->addUsingAlias(PlantoesJuizesTableMap::COL_COEFICIENTE_DE_PLANTOES, $coeficienteDePlantoes['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($coeficienteDePlantoes['max'])) {
                $this->addUsingAlias(PlantoesJuizesTableMap::COL_COEFICIENTE_DE_PLANTOES, $coeficienteDePlantoes['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PlantoesJuizesTableMap::COL_COEFICIENTE_DE_PLANTOES, $coeficienteDePlantoes, $comparison);
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
     * @return $this|ChildPlantoesJuizesQuery The current query, for fluid interface
     */
    public function filterByAno($ano = null, $comparison = null)
    {
        if (is_array($ano)) {
            $useMinMax = false;
            if (isset($ano['min'])) {
                $this->addUsingAlias(PlantoesJuizesTableMap::COL_ANO, $ano['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ano['max'])) {
                $this->addUsingAlias(PlantoesJuizesTableMap::COL_ANO, $ano['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PlantoesJuizesTableMap::COL_ANO, $ano, $comparison);
    }

    /**
     * Filter the query on the numero_de_plantoes_realizados column
     *
     * Example usage:
     * <code>
     * $query->filterByNumeroDePlantoesRealizados(1234); // WHERE numero_de_plantoes_realizados = 1234
     * $query->filterByNumeroDePlantoesRealizados(array(12, 34)); // WHERE numero_de_plantoes_realizados IN (12, 34)
     * $query->filterByNumeroDePlantoesRealizados(array('min' => 12)); // WHERE numero_de_plantoes_realizados > 12
     * </code>
     *
     * @param     mixed $numeroDePlantoesRealizados The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPlantoesJuizesQuery The current query, for fluid interface
     */
    public function filterByNumeroDePlantoesRealizados($numeroDePlantoesRealizados = null, $comparison = null)
    {
        if (is_array($numeroDePlantoesRealizados)) {
            $useMinMax = false;
            if (isset($numeroDePlantoesRealizados['min'])) {
                $this->addUsingAlias(PlantoesJuizesTableMap::COL_NUMERO_DE_PLANTOES_REALIZADOS, $numeroDePlantoesRealizados['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($numeroDePlantoesRealizados['max'])) {
                $this->addUsingAlias(PlantoesJuizesTableMap::COL_NUMERO_DE_PLANTOES_REALIZADOS, $numeroDePlantoesRealizados['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PlantoesJuizesTableMap::COL_NUMERO_DE_PLANTOES_REALIZADOS, $numeroDePlantoesRealizados, $comparison);
    }

    /**
     * Filter the query on the semana_ultimo_plantao column
     *
     * Example usage:
     * <code>
     * $query->filterBySemanaUltimoPlantao(1234); // WHERE semana_ultimo_plantao = 1234
     * $query->filterBySemanaUltimoPlantao(array(12, 34)); // WHERE semana_ultimo_plantao IN (12, 34)
     * $query->filterBySemanaUltimoPlantao(array('min' => 12)); // WHERE semana_ultimo_plantao > 12
     * </code>
     *
     * @param     mixed $semanaUltimoPlantao The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPlantoesJuizesQuery The current query, for fluid interface
     */
    public function filterBySemanaUltimoPlantao($semanaUltimoPlantao = null, $comparison = null)
    {
        if (is_array($semanaUltimoPlantao)) {
            $useMinMax = false;
            if (isset($semanaUltimoPlantao['min'])) {
                $this->addUsingAlias(PlantoesJuizesTableMap::COL_SEMANA_ULTIMO_PLANTAO, $semanaUltimoPlantao['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($semanaUltimoPlantao['max'])) {
                $this->addUsingAlias(PlantoesJuizesTableMap::COL_SEMANA_ULTIMO_PLANTAO, $semanaUltimoPlantao['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PlantoesJuizesTableMap::COL_SEMANA_ULTIMO_PLANTAO, $semanaUltimoPlantao, $comparison);
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
     * @return $this|ChildPlantoesJuizesQuery The current query, for fluid interface
     */
    public function filterByJuizId($juizId = null, $comparison = null)
    {
        if (is_array($juizId)) {
            $useMinMax = false;
            if (isset($juizId['min'])) {
                $this->addUsingAlias(PlantoesJuizesTableMap::COL_JUIZ_ID, $juizId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($juizId['max'])) {
                $this->addUsingAlias(PlantoesJuizesTableMap::COL_JUIZ_ID, $juizId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PlantoesJuizesTableMap::COL_JUIZ_ID, $juizId, $comparison);
    }

    /**
     * Filter the query by a related \Juizes object
     *
     * @param \Juizes|ObjectCollection $juizes The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildPlantoesJuizesQuery The current query, for fluid interface
     */
    public function filterByJuizes($juizes, $comparison = null)
    {
        if ($juizes instanceof \Juizes) {
            return $this
                ->addUsingAlias(PlantoesJuizesTableMap::COL_JUIZ_ID, $juizes->getId(), $comparison);
        } elseif ($juizes instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PlantoesJuizesTableMap::COL_JUIZ_ID, $juizes->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return $this|ChildPlantoesJuizesQuery The current query, for fluid interface
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
     * @param   ChildPlantoesJuizes $plantoesJuizes Object to remove from the list of results
     *
     * @return $this|ChildPlantoesJuizesQuery The current query, for fluid interface
     */
    public function prune($plantoesJuizes = null)
    {
        if ($plantoesJuizes) {
            $this->addUsingAlias(PlantoesJuizesTableMap::COL_ID, $plantoesJuizes->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the plantoes_juizes table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PlantoesJuizesTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            PlantoesJuizesTableMap::clearInstancePool();
            PlantoesJuizesTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(PlantoesJuizesTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(PlantoesJuizesTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            PlantoesJuizesTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            PlantoesJuizesTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // PlantoesJuizesQuery
