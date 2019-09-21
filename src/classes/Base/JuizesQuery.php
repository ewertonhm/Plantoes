<?php

namespace Base;

use \Juizes as ChildJuizes;
use \JuizesQuery as ChildJuizesQuery;
use \Exception;
use \PDO;
use Map\JuizesTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'juizes' table.
 *
 *
 *
 * @method     ChildJuizesQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildJuizesQuery orderByNome($order = Criteria::ASC) Order by the nome column
 * @method     ChildJuizesQuery orderByTelefone($order = Criteria::ASC) Order by the telefone column
 * @method     ChildJuizesQuery orderByCidadeId($order = Criteria::ASC) Order by the cidade_id column
 *
 * @method     ChildJuizesQuery groupById() Group by the id column
 * @method     ChildJuizesQuery groupByNome() Group by the nome column
 * @method     ChildJuizesQuery groupByTelefone() Group by the telefone column
 * @method     ChildJuizesQuery groupByCidadeId() Group by the cidade_id column
 *
 * @method     ChildJuizesQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildJuizesQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildJuizesQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildJuizesQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildJuizesQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildJuizesQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildJuizesQuery leftJoinCidades($relationAlias = null) Adds a LEFT JOIN clause to the query using the Cidades relation
 * @method     ChildJuizesQuery rightJoinCidades($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Cidades relation
 * @method     ChildJuizesQuery innerJoinCidades($relationAlias = null) Adds a INNER JOIN clause to the query using the Cidades relation
 *
 * @method     ChildJuizesQuery joinWithCidades($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Cidades relation
 *
 * @method     ChildJuizesQuery leftJoinWithCidades() Adds a LEFT JOIN clause and with to the query using the Cidades relation
 * @method     ChildJuizesQuery rightJoinWithCidades() Adds a RIGHT JOIN clause and with to the query using the Cidades relation
 * @method     ChildJuizesQuery innerJoinWithCidades() Adds a INNER JOIN clause and with to the query using the Cidades relation
 *
 * @method     ChildJuizesQuery leftJoinAgendas($relationAlias = null) Adds a LEFT JOIN clause to the query using the Agendas relation
 * @method     ChildJuizesQuery rightJoinAgendas($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Agendas relation
 * @method     ChildJuizesQuery innerJoinAgendas($relationAlias = null) Adds a INNER JOIN clause to the query using the Agendas relation
 *
 * @method     ChildJuizesQuery joinWithAgendas($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Agendas relation
 *
 * @method     ChildJuizesQuery leftJoinWithAgendas() Adds a LEFT JOIN clause and with to the query using the Agendas relation
 * @method     ChildJuizesQuery rightJoinWithAgendas() Adds a RIGHT JOIN clause and with to the query using the Agendas relation
 * @method     ChildJuizesQuery innerJoinWithAgendas() Adds a INNER JOIN clause and with to the query using the Agendas relation
 *
 * @method     ChildJuizesQuery leftJoinDiasDisponiveis($relationAlias = null) Adds a LEFT JOIN clause to the query using the DiasDisponiveis relation
 * @method     ChildJuizesQuery rightJoinDiasDisponiveis($relationAlias = null) Adds a RIGHT JOIN clause to the query using the DiasDisponiveis relation
 * @method     ChildJuizesQuery innerJoinDiasDisponiveis($relationAlias = null) Adds a INNER JOIN clause to the query using the DiasDisponiveis relation
 *
 * @method     ChildJuizesQuery joinWithDiasDisponiveis($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the DiasDisponiveis relation
 *
 * @method     ChildJuizesQuery leftJoinWithDiasDisponiveis() Adds a LEFT JOIN clause and with to the query using the DiasDisponiveis relation
 * @method     ChildJuizesQuery rightJoinWithDiasDisponiveis() Adds a RIGHT JOIN clause and with to the query using the DiasDisponiveis relation
 * @method     ChildJuizesQuery innerJoinWithDiasDisponiveis() Adds a INNER JOIN clause and with to the query using the DiasDisponiveis relation
 *
 * @method     ChildJuizesQuery leftJoinDiasIndisponiveis($relationAlias = null) Adds a LEFT JOIN clause to the query using the DiasIndisponiveis relation
 * @method     ChildJuizesQuery rightJoinDiasIndisponiveis($relationAlias = null) Adds a RIGHT JOIN clause to the query using the DiasIndisponiveis relation
 * @method     ChildJuizesQuery innerJoinDiasIndisponiveis($relationAlias = null) Adds a INNER JOIN clause to the query using the DiasIndisponiveis relation
 *
 * @method     ChildJuizesQuery joinWithDiasIndisponiveis($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the DiasIndisponiveis relation
 *
 * @method     ChildJuizesQuery leftJoinWithDiasIndisponiveis() Adds a LEFT JOIN clause and with to the query using the DiasIndisponiveis relation
 * @method     ChildJuizesQuery rightJoinWithDiasIndisponiveis() Adds a RIGHT JOIN clause and with to the query using the DiasIndisponiveis relation
 * @method     ChildJuizesQuery innerJoinWithDiasIndisponiveis() Adds a INNER JOIN clause and with to the query using the DiasIndisponiveis relation
 *
 * @method     ChildJuizesQuery leftJoinPlantoes($relationAlias = null) Adds a LEFT JOIN clause to the query using the Plantoes relation
 * @method     ChildJuizesQuery rightJoinPlantoes($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Plantoes relation
 * @method     ChildJuizesQuery innerJoinPlantoes($relationAlias = null) Adds a INNER JOIN clause to the query using the Plantoes relation
 *
 * @method     ChildJuizesQuery joinWithPlantoes($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Plantoes relation
 *
 * @method     ChildJuizesQuery leftJoinWithPlantoes() Adds a LEFT JOIN clause and with to the query using the Plantoes relation
 * @method     ChildJuizesQuery rightJoinWithPlantoes() Adds a RIGHT JOIN clause and with to the query using the Plantoes relation
 * @method     ChildJuizesQuery innerJoinWithPlantoes() Adds a INNER JOIN clause and with to the query using the Plantoes relation
 *
 * @method     ChildJuizesQuery leftJoinPlantoesJuizes($relationAlias = null) Adds a LEFT JOIN clause to the query using the PlantoesJuizes relation
 * @method     ChildJuizesQuery rightJoinPlantoesJuizes($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PlantoesJuizes relation
 * @method     ChildJuizesQuery innerJoinPlantoesJuizes($relationAlias = null) Adds a INNER JOIN clause to the query using the PlantoesJuizes relation
 *
 * @method     ChildJuizesQuery joinWithPlantoesJuizes($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the PlantoesJuizes relation
 *
 * @method     ChildJuizesQuery leftJoinWithPlantoesJuizes() Adds a LEFT JOIN clause and with to the query using the PlantoesJuizes relation
 * @method     ChildJuizesQuery rightJoinWithPlantoesJuizes() Adds a RIGHT JOIN clause and with to the query using the PlantoesJuizes relation
 * @method     ChildJuizesQuery innerJoinWithPlantoesJuizes() Adds a INNER JOIN clause and with to the query using the PlantoesJuizes relation
 *
 * @method     \CidadesQuery|\AgendasQuery|\DiasDisponiveisQuery|\DiasIndisponiveisQuery|\PlantoesQuery|\PlantoesJuizesQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildJuizes findOne(ConnectionInterface $con = null) Return the first ChildJuizes matching the query
 * @method     ChildJuizes findOneOrCreate(ConnectionInterface $con = null) Return the first ChildJuizes matching the query, or a new ChildJuizes object populated from the query conditions when no match is found
 *
 * @method     ChildJuizes findOneById(int $id) Return the first ChildJuizes filtered by the id column
 * @method     ChildJuizes findOneByNome(string $nome) Return the first ChildJuizes filtered by the nome column
 * @method     ChildJuizes findOneByTelefone(string $telefone) Return the first ChildJuizes filtered by the telefone column
 * @method     ChildJuizes findOneByCidadeId(int $cidade_id) Return the first ChildJuizes filtered by the cidade_id column *

 * @method     ChildJuizes requirePk($key, ConnectionInterface $con = null) Return the ChildJuizes by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildJuizes requireOne(ConnectionInterface $con = null) Return the first ChildJuizes matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildJuizes requireOneById(int $id) Return the first ChildJuizes filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildJuizes requireOneByNome(string $nome) Return the first ChildJuizes filtered by the nome column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildJuizes requireOneByTelefone(string $telefone) Return the first ChildJuizes filtered by the telefone column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildJuizes requireOneByCidadeId(int $cidade_id) Return the first ChildJuizes filtered by the cidade_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildJuizes[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildJuizes objects based on current ModelCriteria
 * @method     ChildJuizes[]|ObjectCollection findById(int $id) Return ChildJuizes objects filtered by the id column
 * @method     ChildJuizes[]|ObjectCollection findByNome(string $nome) Return ChildJuizes objects filtered by the nome column
 * @method     ChildJuizes[]|ObjectCollection findByTelefone(string $telefone) Return ChildJuizes objects filtered by the telefone column
 * @method     ChildJuizes[]|ObjectCollection findByCidadeId(int $cidade_id) Return ChildJuizes objects filtered by the cidade_id column
 * @method     ChildJuizes[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class JuizesQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\JuizesQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Juizes', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildJuizesQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildJuizesQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildJuizesQuery) {
            return $criteria;
        }
        $query = new ChildJuizesQuery();
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
     * @return ChildJuizes|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(JuizesTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = JuizesTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildJuizes A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, nome, telefone, cidade_id FROM juizes WHERE id = :p0';
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
            /** @var ChildJuizes $obj */
            $obj = new ChildJuizes();
            $obj->hydrate($row);
            JuizesTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildJuizes|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildJuizesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(JuizesTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildJuizesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(JuizesTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildJuizesQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(JuizesTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(JuizesTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JuizesTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildJuizesQuery The current query, for fluid interface
     */
    public function filterByNome($nome = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nome)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JuizesTableMap::COL_NOME, $nome, $comparison);
    }

    /**
     * Filter the query on the telefone column
     *
     * Example usage:
     * <code>
     * $query->filterByTelefone('fooValue');   // WHERE telefone = 'fooValue'
     * $query->filterByTelefone('%fooValue%', Criteria::LIKE); // WHERE telefone LIKE '%fooValue%'
     * </code>
     *
     * @param     string $telefone The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildJuizesQuery The current query, for fluid interface
     */
    public function filterByTelefone($telefone = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($telefone)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JuizesTableMap::COL_TELEFONE, $telefone, $comparison);
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
     * @return $this|ChildJuizesQuery The current query, for fluid interface
     */
    public function filterByCidadeId($cidadeId = null, $comparison = null)
    {
        if (is_array($cidadeId)) {
            $useMinMax = false;
            if (isset($cidadeId['min'])) {
                $this->addUsingAlias(JuizesTableMap::COL_CIDADE_ID, $cidadeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cidadeId['max'])) {
                $this->addUsingAlias(JuizesTableMap::COL_CIDADE_ID, $cidadeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JuizesTableMap::COL_CIDADE_ID, $cidadeId, $comparison);
    }

    /**
     * Filter the query by a related \Cidades object
     *
     * @param \Cidades|ObjectCollection $cidades The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildJuizesQuery The current query, for fluid interface
     */
    public function filterByCidades($cidades, $comparison = null)
    {
        if ($cidades instanceof \Cidades) {
            return $this
                ->addUsingAlias(JuizesTableMap::COL_CIDADE_ID, $cidades->getId(), $comparison);
        } elseif ($cidades instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(JuizesTableMap::COL_CIDADE_ID, $cidades->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return $this|ChildJuizesQuery The current query, for fluid interface
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
     * Filter the query by a related \Agendas object
     *
     * @param \Agendas|ObjectCollection $agendas the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildJuizesQuery The current query, for fluid interface
     */
    public function filterByAgendas($agendas, $comparison = null)
    {
        if ($agendas instanceof \Agendas) {
            return $this
                ->addUsingAlias(JuizesTableMap::COL_ID, $agendas->getJuizId(), $comparison);
        } elseif ($agendas instanceof ObjectCollection) {
            return $this
                ->useAgendasQuery()
                ->filterByPrimaryKeys($agendas->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByAgendas() only accepts arguments of type \Agendas or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Agendas relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildJuizesQuery The current query, for fluid interface
     */
    public function joinAgendas($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Agendas');

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
            $this->addJoinObject($join, 'Agendas');
        }

        return $this;
    }

    /**
     * Use the Agendas relation Agendas object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \AgendasQuery A secondary query class using the current class as primary query
     */
    public function useAgendasQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinAgendas($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Agendas', '\AgendasQuery');
    }

    /**
     * Filter the query by a related \DiasDisponiveis object
     *
     * @param \DiasDisponiveis|ObjectCollection $diasDisponiveis the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildJuizesQuery The current query, for fluid interface
     */
    public function filterByDiasDisponiveis($diasDisponiveis, $comparison = null)
    {
        if ($diasDisponiveis instanceof \DiasDisponiveis) {
            return $this
                ->addUsingAlias(JuizesTableMap::COL_ID, $diasDisponiveis->getJuizId(), $comparison);
        } elseif ($diasDisponiveis instanceof ObjectCollection) {
            return $this
                ->useDiasDisponiveisQuery()
                ->filterByPrimaryKeys($diasDisponiveis->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByDiasDisponiveis() only accepts arguments of type \DiasDisponiveis or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the DiasDisponiveis relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildJuizesQuery The current query, for fluid interface
     */
    public function joinDiasDisponiveis($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('DiasDisponiveis');

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
            $this->addJoinObject($join, 'DiasDisponiveis');
        }

        return $this;
    }

    /**
     * Use the DiasDisponiveis relation DiasDisponiveis object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \DiasDisponiveisQuery A secondary query class using the current class as primary query
     */
    public function useDiasDisponiveisQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinDiasDisponiveis($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'DiasDisponiveis', '\DiasDisponiveisQuery');
    }

    /**
     * Filter the query by a related \DiasIndisponiveis object
     *
     * @param \DiasIndisponiveis|ObjectCollection $diasIndisponiveis the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildJuizesQuery The current query, for fluid interface
     */
    public function filterByDiasIndisponiveis($diasIndisponiveis, $comparison = null)
    {
        if ($diasIndisponiveis instanceof \DiasIndisponiveis) {
            return $this
                ->addUsingAlias(JuizesTableMap::COL_ID, $diasIndisponiveis->getJuizId(), $comparison);
        } elseif ($diasIndisponiveis instanceof ObjectCollection) {
            return $this
                ->useDiasIndisponiveisQuery()
                ->filterByPrimaryKeys($diasIndisponiveis->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByDiasIndisponiveis() only accepts arguments of type \DiasIndisponiveis or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the DiasIndisponiveis relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildJuizesQuery The current query, for fluid interface
     */
    public function joinDiasIndisponiveis($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('DiasIndisponiveis');

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
            $this->addJoinObject($join, 'DiasIndisponiveis');
        }

        return $this;
    }

    /**
     * Use the DiasIndisponiveis relation DiasIndisponiveis object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \DiasIndisponiveisQuery A secondary query class using the current class as primary query
     */
    public function useDiasIndisponiveisQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinDiasIndisponiveis($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'DiasIndisponiveis', '\DiasIndisponiveisQuery');
    }

    /**
     * Filter the query by a related \Plantoes object
     *
     * @param \Plantoes|ObjectCollection $plantoes the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildJuizesQuery The current query, for fluid interface
     */
    public function filterByPlantoes($plantoes, $comparison = null)
    {
        if ($plantoes instanceof \Plantoes) {
            return $this
                ->addUsingAlias(JuizesTableMap::COL_ID, $plantoes->getJuizId(), $comparison);
        } elseif ($plantoes instanceof ObjectCollection) {
            return $this
                ->usePlantoesQuery()
                ->filterByPrimaryKeys($plantoes->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPlantoes() only accepts arguments of type \Plantoes or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Plantoes relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildJuizesQuery The current query, for fluid interface
     */
    public function joinPlantoes($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Plantoes');

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
            $this->addJoinObject($join, 'Plantoes');
        }

        return $this;
    }

    /**
     * Use the Plantoes relation Plantoes object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \PlantoesQuery A secondary query class using the current class as primary query
     */
    public function usePlantoesQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinPlantoes($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Plantoes', '\PlantoesQuery');
    }

    /**
     * Filter the query by a related \PlantoesJuizes object
     *
     * @param \PlantoesJuizes|ObjectCollection $plantoesJuizes the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildJuizesQuery The current query, for fluid interface
     */
    public function filterByPlantoesJuizes($plantoesJuizes, $comparison = null)
    {
        if ($plantoesJuizes instanceof \PlantoesJuizes) {
            return $this
                ->addUsingAlias(JuizesTableMap::COL_ID, $plantoesJuizes->getJuizId(), $comparison);
        } elseif ($plantoesJuizes instanceof ObjectCollection) {
            return $this
                ->usePlantoesJuizesQuery()
                ->filterByPrimaryKeys($plantoesJuizes->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPlantoesJuizes() only accepts arguments of type \PlantoesJuizes or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PlantoesJuizes relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildJuizesQuery The current query, for fluid interface
     */
    public function joinPlantoesJuizes($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PlantoesJuizes');

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
            $this->addJoinObject($join, 'PlantoesJuizes');
        }

        return $this;
    }

    /**
     * Use the PlantoesJuizes relation PlantoesJuizes object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \PlantoesJuizesQuery A secondary query class using the current class as primary query
     */
    public function usePlantoesJuizesQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinPlantoesJuizes($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PlantoesJuizes', '\PlantoesJuizesQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildJuizes $juizes Object to remove from the list of results
     *
     * @return $this|ChildJuizesQuery The current query, for fluid interface
     */
    public function prune($juizes = null)
    {
        if ($juizes) {
            $this->addUsingAlias(JuizesTableMap::COL_ID, $juizes->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the juizes table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(JuizesTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            JuizesTableMap::clearInstancePool();
            JuizesTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(JuizesTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(JuizesTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            JuizesTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            JuizesTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // JuizesQuery
