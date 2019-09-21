<?php

namespace Base;

use \Agendas as ChildAgendas;
use \AgendasQuery as ChildAgendasQuery;
use \Cidades as ChildCidades;
use \CidadesQuery as ChildCidadesQuery;
use \DiasDisponiveis as ChildDiasDisponiveis;
use \DiasDisponiveisQuery as ChildDiasDisponiveisQuery;
use \DiasIndisponiveis as ChildDiasIndisponiveis;
use \DiasIndisponiveisQuery as ChildDiasIndisponiveisQuery;
use \Juizes as ChildJuizes;
use \JuizesQuery as ChildJuizesQuery;
use \Plantoes as ChildPlantoes;
use \PlantoesJuizes as ChildPlantoesJuizes;
use \PlantoesJuizesQuery as ChildPlantoesJuizesQuery;
use \PlantoesQuery as ChildPlantoesQuery;
use \Exception;
use \PDO;
use Map\AgendasTableMap;
use Map\DiasDisponiveisTableMap;
use Map\DiasIndisponiveisTableMap;
use Map\JuizesTableMap;
use Map\PlantoesJuizesTableMap;
use Map\PlantoesTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveRecord\ActiveRecordInterface;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\BadMethodCallException;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Parser\AbstractParser;

/**
 * Base class that represents a row from the 'juizes' table.
 *
 *
 *
 * @package    propel.generator..Base
 */
abstract class Juizes implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\JuizesTableMap';


    /**
     * attribute to determine if this object has previously been saved.
     * @var boolean
     */
    protected $new = true;

    /**
     * attribute to determine whether this object has been deleted.
     * @var boolean
     */
    protected $deleted = false;

    /**
     * The columns that have been modified in current object.
     * Tracking modified columns allows us to only update modified columns.
     * @var array
     */
    protected $modifiedColumns = array();

    /**
     * The (virtual) columns that are added at runtime
     * The formatters can add supplementary columns based on a resultset
     * @var array
     */
    protected $virtualColumns = array();

    /**
     * The value for the id field.
     *
     * @var        int
     */
    protected $id;

    /**
     * The value for the nome field.
     *
     * @var        string
     */
    protected $nome;

    /**
     * The value for the telefone field.
     *
     * @var        string
     */
    protected $telefone;

    /**
     * The value for the cidade_id field.
     *
     * @var        int
     */
    protected $cidade_id;

    /**
     * @var        ChildCidades
     */
    protected $aCidades;

    /**
     * @var        ObjectCollection|ChildAgendas[] Collection to store aggregation of ChildAgendas objects.
     */
    protected $collAgendass;
    protected $collAgendassPartial;

    /**
     * @var        ObjectCollection|ChildDiasDisponiveis[] Collection to store aggregation of ChildDiasDisponiveis objects.
     */
    protected $collDiasDisponiveiss;
    protected $collDiasDisponiveissPartial;

    /**
     * @var        ObjectCollection|ChildDiasIndisponiveis[] Collection to store aggregation of ChildDiasIndisponiveis objects.
     */
    protected $collDiasIndisponiveiss;
    protected $collDiasIndisponiveissPartial;

    /**
     * @var        ObjectCollection|ChildPlantoes[] Collection to store aggregation of ChildPlantoes objects.
     */
    protected $collPlantoess;
    protected $collPlantoessPartial;

    /**
     * @var        ObjectCollection|ChildPlantoesJuizes[] Collection to store aggregation of ChildPlantoesJuizes objects.
     */
    protected $collPlantoesJuizess;
    protected $collPlantoesJuizessPartial;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildAgendas[]
     */
    protected $agendassScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildDiasDisponiveis[]
     */
    protected $diasDisponiveissScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildDiasIndisponiveis[]
     */
    protected $diasIndisponiveissScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildPlantoes[]
     */
    protected $plantoessScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildPlantoesJuizes[]
     */
    protected $plantoesJuizessScheduledForDeletion = null;

    /**
     * Initializes internal state of Base\Juizes object.
     */
    public function __construct()
    {
    }

    /**
     * Returns whether the object has been modified.
     *
     * @return boolean True if the object has been modified.
     */
    public function isModified()
    {
        return !!$this->modifiedColumns;
    }

    /**
     * Has specified column been modified?
     *
     * @param  string  $col column fully qualified name (TableMap::TYPE_COLNAME), e.g. Book::AUTHOR_ID
     * @return boolean True if $col has been modified.
     */
    public function isColumnModified($col)
    {
        return $this->modifiedColumns && isset($this->modifiedColumns[$col]);
    }

    /**
     * Get the columns that have been modified in this object.
     * @return array A unique list of the modified column names for this object.
     */
    public function getModifiedColumns()
    {
        return $this->modifiedColumns ? array_keys($this->modifiedColumns) : [];
    }

    /**
     * Returns whether the object has ever been saved.  This will
     * be false, if the object was retrieved from storage or was created
     * and then saved.
     *
     * @return boolean true, if the object has never been persisted.
     */
    public function isNew()
    {
        return $this->new;
    }

    /**
     * Setter for the isNew attribute.  This method will be called
     * by Propel-generated children and objects.
     *
     * @param boolean $b the state of the object.
     */
    public function setNew($b)
    {
        $this->new = (boolean) $b;
    }

    /**
     * Whether this object has been deleted.
     * @return boolean The deleted state of this object.
     */
    public function isDeleted()
    {
        return $this->deleted;
    }

    /**
     * Specify whether this object has been deleted.
     * @param  boolean $b The deleted state of this object.
     * @return void
     */
    public function setDeleted($b)
    {
        $this->deleted = (boolean) $b;
    }

    /**
     * Sets the modified state for the object to be false.
     * @param  string $col If supplied, only the specified column is reset.
     * @return void
     */
    public function resetModified($col = null)
    {
        if (null !== $col) {
            if (isset($this->modifiedColumns[$col])) {
                unset($this->modifiedColumns[$col]);
            }
        } else {
            $this->modifiedColumns = array();
        }
    }

    /**
     * Compares this with another <code>Juizes</code> instance.  If
     * <code>obj</code> is an instance of <code>Juizes</code>, delegates to
     * <code>equals(Juizes)</code>.  Otherwise, returns <code>false</code>.
     *
     * @param  mixed   $obj The object to compare to.
     * @return boolean Whether equal to the object specified.
     */
    public function equals($obj)
    {
        if (!$obj instanceof static) {
            return false;
        }

        if ($this === $obj) {
            return true;
        }

        if (null === $this->getPrimaryKey() || null === $obj->getPrimaryKey()) {
            return false;
        }

        return $this->getPrimaryKey() === $obj->getPrimaryKey();
    }

    /**
     * Get the associative array of the virtual columns in this object
     *
     * @return array
     */
    public function getVirtualColumns()
    {
        return $this->virtualColumns;
    }

    /**
     * Checks the existence of a virtual column in this object
     *
     * @param  string  $name The virtual column name
     * @return boolean
     */
    public function hasVirtualColumn($name)
    {
        return array_key_exists($name, $this->virtualColumns);
    }

    /**
     * Get the value of a virtual column in this object
     *
     * @param  string $name The virtual column name
     * @return mixed
     *
     * @throws PropelException
     */
    public function getVirtualColumn($name)
    {
        if (!$this->hasVirtualColumn($name)) {
            throw new PropelException(sprintf('Cannot get value of inexistent virtual column %s.', $name));
        }

        return $this->virtualColumns[$name];
    }

    /**
     * Set the value of a virtual column in this object
     *
     * @param string $name  The virtual column name
     * @param mixed  $value The value to give to the virtual column
     *
     * @return $this|Juizes The current object, for fluid interface
     */
    public function setVirtualColumn($name, $value)
    {
        $this->virtualColumns[$name] = $value;

        return $this;
    }

    /**
     * Logs a message using Propel::log().
     *
     * @param  string  $msg
     * @param  int     $priority One of the Propel::LOG_* logging levels
     * @return boolean
     */
    protected function log($msg, $priority = Propel::LOG_INFO)
    {
        return Propel::log(get_class($this) . ': ' . $msg, $priority);
    }

    /**
     * Export the current object properties to a string, using a given parser format
     * <code>
     * $book = BookQuery::create()->findPk(9012);
     * echo $book->exportTo('JSON');
     *  => {"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * @param  mixed   $parser                 A AbstractParser instance, or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param  boolean $includeLazyLoadColumns (optional) Whether to include lazy load(ed) columns. Defaults to TRUE.
     * @return string  The exported data
     */
    public function exportTo($parser, $includeLazyLoadColumns = true)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        return $parser->fromArray($this->toArray(TableMap::TYPE_PHPNAME, $includeLazyLoadColumns, array(), true));
    }

    /**
     * Clean up internal collections prior to serializing
     * Avoids recursive loops that turn into segmentation faults when serializing
     */
    public function __sleep()
    {
        $this->clearAllReferences();

        $cls = new \ReflectionClass($this);
        $propertyNames = [];
        $serializableProperties = array_diff($cls->getProperties(), $cls->getProperties(\ReflectionProperty::IS_STATIC));

        foreach($serializableProperties as $property) {
            $propertyNames[] = $property->getName();
        }

        return $propertyNames;
    }

    /**
     * Get the [id] column value.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the [nome] column value.
     *
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Get the [telefone] column value.
     *
     * @return string
     */
    public function getTelefone()
    {
        return $this->telefone;
    }

    /**
     * Get the [cidade_id] column value.
     *
     * @return int
     */
    public function getCidadeId()
    {
        return $this->cidade_id;
    }

    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return $this|\Juizes The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[JuizesTableMap::COL_ID] = true;
        }

        return $this;
    } // setId()

    /**
     * Set the value of [nome] column.
     *
     * @param string $v new value
     * @return $this|\Juizes The current object (for fluent API support)
     */
    public function setNome($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->nome !== $v) {
            $this->nome = $v;
            $this->modifiedColumns[JuizesTableMap::COL_NOME] = true;
        }

        return $this;
    } // setNome()

    /**
     * Set the value of [telefone] column.
     *
     * @param string $v new value
     * @return $this|\Juizes The current object (for fluent API support)
     */
    public function setTelefone($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->telefone !== $v) {
            $this->telefone = $v;
            $this->modifiedColumns[JuizesTableMap::COL_TELEFONE] = true;
        }

        return $this;
    } // setTelefone()

    /**
     * Set the value of [cidade_id] column.
     *
     * @param int $v new value
     * @return $this|\Juizes The current object (for fluent API support)
     */
    public function setCidadeId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->cidade_id !== $v) {
            $this->cidade_id = $v;
            $this->modifiedColumns[JuizesTableMap::COL_CIDADE_ID] = true;
        }

        if ($this->aCidades !== null && $this->aCidades->getId() !== $v) {
            $this->aCidades = null;
        }

        return $this;
    } // setCidadeId()

    /**
     * Indicates whether the columns in this object are only set to default values.
     *
     * This method can be used in conjunction with isModified() to indicate whether an object is both
     * modified _and_ has some values set which are non-default.
     *
     * @return boolean Whether the columns in this object are only been set with default values.
     */
    public function hasOnlyDefaultValues()
    {
        // otherwise, everything was equal, so return TRUE
        return true;
    } // hasOnlyDefaultValues()

    /**
     * Hydrates (populates) the object variables with values from the database resultset.
     *
     * An offset (0-based "start column") is specified so that objects can be hydrated
     * with a subset of the columns in the resultset rows.  This is needed, for example,
     * for results of JOIN queries where the resultset row includes columns from two or
     * more tables.
     *
     * @param array   $row       The row returned by DataFetcher->fetch().
     * @param int     $startcol  0-based offset column which indicates which restultset column to start with.
     * @param boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @param string  $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                  One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                            TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false, $indexType = TableMap::TYPE_NUM)
    {
        try {

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : JuizesTableMap::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : JuizesTableMap::translateFieldName('Nome', TableMap::TYPE_PHPNAME, $indexType)];
            $this->nome = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : JuizesTableMap::translateFieldName('Telefone', TableMap::TYPE_PHPNAME, $indexType)];
            $this->telefone = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : JuizesTableMap::translateFieldName('CidadeId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cidade_id = (null !== $col) ? (int) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 4; // 4 = JuizesTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Juizes'), 0, $e);
        }
    }

    /**
     * Checks and repairs the internal consistency of the object.
     *
     * This method is executed after an already-instantiated object is re-hydrated
     * from the database.  It exists to check any foreign keys to make sure that
     * the objects related to the current object are correct based on foreign key.
     *
     * You can override this method in the stub class, but you should always invoke
     * the base method from the overridden method (i.e. parent::ensureConsistency()),
     * in case your model changes.
     *
     * @throws PropelException
     */
    public function ensureConsistency()
    {
        if ($this->aCidades !== null && $this->cidade_id !== $this->aCidades->getId()) {
            $this->aCidades = null;
        }
    } // ensureConsistency

    /**
     * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
     *
     * This will only work if the object has been saved and has a valid primary key set.
     *
     * @param      boolean $deep (optional) Whether to also de-associated any related objects.
     * @param      ConnectionInterface $con (optional) The ConnectionInterface connection to use.
     * @return void
     * @throws PropelException - if this object is deleted, unsaved or doesn't have pk match in db
     */
    public function reload($deep = false, ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("Cannot reload a deleted object.");
        }

        if ($this->isNew()) {
            throw new PropelException("Cannot reload an unsaved object.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(JuizesTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildJuizesQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aCidades = null;
            $this->collAgendass = null;

            $this->collDiasDisponiveiss = null;

            $this->collDiasIndisponiveiss = null;

            $this->collPlantoess = null;

            $this->collPlantoesJuizess = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see Juizes::setDeleted()
     * @see Juizes::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(JuizesTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildJuizesQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
            if ($ret) {
                $deleteQuery->delete($con);
                $this->postDelete($con);
                $this->setDeleted(true);
            }
        });
    }

    /**
     * Persists this object to the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All modified related objects will also be persisted in the doSave()
     * method.  This method wraps all precipitate database operations in a
     * single transaction.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see doSave()
     */
    public function save(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("You cannot save an object that has been deleted.");
        }

        if ($this->alreadyInSave) {
            return 0;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(JuizesTableMap::DATABASE_NAME);
        }

        return $con->transaction(function () use ($con) {
            $ret = $this->preSave($con);
            $isInsert = $this->isNew();
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
            } else {
                $ret = $ret && $this->preUpdate($con);
            }
            if ($ret) {
                $affectedRows = $this->doSave($con);
                if ($isInsert) {
                    $this->postInsert($con);
                } else {
                    $this->postUpdate($con);
                }
                $this->postSave($con);
                JuizesTableMap::addInstanceToPool($this);
            } else {
                $affectedRows = 0;
            }

            return $affectedRows;
        });
    }

    /**
     * Performs the work of inserting or updating the row in the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All related objects are also updated in this method.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see save()
     */
    protected function doSave(ConnectionInterface $con)
    {
        $affectedRows = 0; // initialize var to track total num of affected rows
        if (!$this->alreadyInSave) {
            $this->alreadyInSave = true;

            // We call the save method on the following object(s) if they
            // were passed to this object by their corresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aCidades !== null) {
                if ($this->aCidades->isModified() || $this->aCidades->isNew()) {
                    $affectedRows += $this->aCidades->save($con);
                }
                $this->setCidades($this->aCidades);
            }

            if ($this->isNew() || $this->isModified()) {
                // persist changes
                if ($this->isNew()) {
                    $this->doInsert($con);
                    $affectedRows += 1;
                } else {
                    $affectedRows += $this->doUpdate($con);
                }
                $this->resetModified();
            }

            if ($this->agendassScheduledForDeletion !== null) {
                if (!$this->agendassScheduledForDeletion->isEmpty()) {
                    foreach ($this->agendassScheduledForDeletion as $agendas) {
                        // need to save related object because we set the relation to null
                        $agendas->save($con);
                    }
                    $this->agendassScheduledForDeletion = null;
                }
            }

            if ($this->collAgendass !== null) {
                foreach ($this->collAgendass as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->diasDisponiveissScheduledForDeletion !== null) {
                if (!$this->diasDisponiveissScheduledForDeletion->isEmpty()) {
                    foreach ($this->diasDisponiveissScheduledForDeletion as $diasDisponiveis) {
                        // need to save related object because we set the relation to null
                        $diasDisponiveis->save($con);
                    }
                    $this->diasDisponiveissScheduledForDeletion = null;
                }
            }

            if ($this->collDiasDisponiveiss !== null) {
                foreach ($this->collDiasDisponiveiss as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->diasIndisponiveissScheduledForDeletion !== null) {
                if (!$this->diasIndisponiveissScheduledForDeletion->isEmpty()) {
                    foreach ($this->diasIndisponiveissScheduledForDeletion as $diasIndisponiveis) {
                        // need to save related object because we set the relation to null
                        $diasIndisponiveis->save($con);
                    }
                    $this->diasIndisponiveissScheduledForDeletion = null;
                }
            }

            if ($this->collDiasIndisponiveiss !== null) {
                foreach ($this->collDiasIndisponiveiss as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->plantoessScheduledForDeletion !== null) {
                if (!$this->plantoessScheduledForDeletion->isEmpty()) {
                    foreach ($this->plantoessScheduledForDeletion as $plantoes) {
                        // need to save related object because we set the relation to null
                        $plantoes->save($con);
                    }
                    $this->plantoessScheduledForDeletion = null;
                }
            }

            if ($this->collPlantoess !== null) {
                foreach ($this->collPlantoess as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->plantoesJuizessScheduledForDeletion !== null) {
                if (!$this->plantoesJuizessScheduledForDeletion->isEmpty()) {
                    foreach ($this->plantoesJuizessScheduledForDeletion as $plantoesJuizes) {
                        // need to save related object because we set the relation to null
                        $plantoesJuizes->save($con);
                    }
                    $this->plantoesJuizessScheduledForDeletion = null;
                }
            }

            if ($this->collPlantoesJuizess !== null) {
                foreach ($this->collPlantoesJuizess as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            $this->alreadyInSave = false;

        }

        return $affectedRows;
    } // doSave()

    /**
     * Insert the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @throws PropelException
     * @see doSave()
     */
    protected function doInsert(ConnectionInterface $con)
    {
        $modifiedColumns = array();
        $index = 0;

        $this->modifiedColumns[JuizesTableMap::COL_ID] = true;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . JuizesTableMap::COL_ID . ')');
        }
        if (null === $this->id) {
            try {
                $dataFetcher = $con->query("SELECT nextval('juizes_id_seq')");
                $this->id = (int) $dataFetcher->fetchColumn();
            } catch (Exception $e) {
                throw new PropelException('Unable to get sequence id.', 0, $e);
            }
        }


         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(JuizesTableMap::COL_ID)) {
            $modifiedColumns[':p' . $index++]  = 'id';
        }
        if ($this->isColumnModified(JuizesTableMap::COL_NOME)) {
            $modifiedColumns[':p' . $index++]  = 'nome';
        }
        if ($this->isColumnModified(JuizesTableMap::COL_TELEFONE)) {
            $modifiedColumns[':p' . $index++]  = 'telefone';
        }
        if ($this->isColumnModified(JuizesTableMap::COL_CIDADE_ID)) {
            $modifiedColumns[':p' . $index++]  = 'cidade_id';
        }

        $sql = sprintf(
            'INSERT INTO juizes (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'id':
                        $stmt->bindValue($identifier, $this->id, PDO::PARAM_INT);
                        break;
                    case 'nome':
                        $stmt->bindValue($identifier, $this->nome, PDO::PARAM_STR);
                        break;
                    case 'telefone':
                        $stmt->bindValue($identifier, $this->telefone, PDO::PARAM_STR);
                        break;
                    case 'cidade_id':
                        $stmt->bindValue($identifier, $this->cidade_id, PDO::PARAM_INT);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), 0, $e);
        }

        $this->setNew(false);
    }

    /**
     * Update the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @return Integer Number of updated rows
     * @see doSave()
     */
    protected function doUpdate(ConnectionInterface $con)
    {
        $selectCriteria = $this->buildPkeyCriteria();
        $valuesCriteria = $this->buildCriteria();

        return $selectCriteria->doUpdate($valuesCriteria, $con);
    }

    /**
     * Retrieves a field from the object by name passed in as a string.
     *
     * @param      string $name name
     * @param      string $type The type of fieldname the $name is of:
     *                     one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                     TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                     Defaults to TableMap::TYPE_PHPNAME.
     * @return mixed Value of field.
     */
    public function getByName($name, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = JuizesTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
        $field = $this->getByPosition($pos);

        return $field;
    }

    /**
     * Retrieves a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param      int $pos position in xml schema
     * @return mixed Value of field at $pos
     */
    public function getByPosition($pos)
    {
        switch ($pos) {
            case 0:
                return $this->getId();
                break;
            case 1:
                return $this->getNome();
                break;
            case 2:
                return $this->getTelefone();
                break;
            case 3:
                return $this->getCidadeId();
                break;
            default:
                return null;
                break;
        } // switch()
    }

    /**
     * Exports the object as an array.
     *
     * You can specify the key type of the array by passing one of the class
     * type constants.
     *
     * @param     string  $keyType (optional) One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     *                    TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                    Defaults to TableMap::TYPE_PHPNAME.
     * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to TRUE.
     * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
     * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = TableMap::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array(), $includeForeignObjects = false)
    {

        if (isset($alreadyDumpedObjects['Juizes'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Juizes'][$this->hashCode()] = true;
        $keys = JuizesTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getNome(),
            $keys[2] => $this->getTelefone(),
            $keys[3] => $this->getCidadeId(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aCidades) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'cidades';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'cidades';
                        break;
                    default:
                        $key = 'Cidades';
                }

                $result[$key] = $this->aCidades->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collAgendass) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'agendass';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'agendass';
                        break;
                    default:
                        $key = 'Agendass';
                }

                $result[$key] = $this->collAgendass->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collDiasDisponiveiss) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'diasDisponiveiss';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'dias_disponiveiss';
                        break;
                    default:
                        $key = 'DiasDisponiveiss';
                }

                $result[$key] = $this->collDiasDisponiveiss->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collDiasIndisponiveiss) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'diasIndisponiveiss';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'dias_indisponiveiss';
                        break;
                    default:
                        $key = 'DiasIndisponiveiss';
                }

                $result[$key] = $this->collDiasIndisponiveiss->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collPlantoess) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'plantoess';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'plantoess';
                        break;
                    default:
                        $key = 'Plantoess';
                }

                $result[$key] = $this->collPlantoess->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collPlantoesJuizess) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'plantoesJuizess';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'plantoes_juizess';
                        break;
                    default:
                        $key = 'PlantoesJuizess';
                }

                $result[$key] = $this->collPlantoesJuizess->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
        }

        return $result;
    }

    /**
     * Sets a field from the object by name passed in as a string.
     *
     * @param  string $name
     * @param  mixed  $value field value
     * @param  string $type The type of fieldname the $name is of:
     *                one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                Defaults to TableMap::TYPE_PHPNAME.
     * @return $this|\Juizes
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = JuizesTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Juizes
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setId($value);
                break;
            case 1:
                $this->setNome($value);
                break;
            case 2:
                $this->setTelefone($value);
                break;
            case 3:
                $this->setCidadeId($value);
                break;
        } // switch()

        return $this;
    }

    /**
     * Populates the object using an array.
     *
     * This is particularly useful when populating an object from one of the
     * request arrays (e.g. $_POST).  This method goes through the column
     * names, checking to see whether a matching key exists in populated
     * array. If so the setByName() method is called for that column.
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param      array  $arr     An array to populate the object from.
     * @param      string $keyType The type of keys the array uses.
     * @return void
     */
    public function fromArray($arr, $keyType = TableMap::TYPE_PHPNAME)
    {
        $keys = JuizesTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setId($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setNome($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setTelefone($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setCidadeId($arr[$keys[3]]);
        }
    }

     /**
     * Populate the current object from a string, using a given parser format
     * <code>
     * $book = new Book();
     * $book->importFrom('JSON', '{"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param mixed $parser A AbstractParser instance,
     *                       or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param string $data The source data to import from
     * @param string $keyType The type of keys the array uses.
     *
     * @return $this|\Juizes The current object, for fluid interface
     */
    public function importFrom($parser, $data, $keyType = TableMap::TYPE_PHPNAME)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        $this->fromArray($parser->toArray($data), $keyType);

        return $this;
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(JuizesTableMap::DATABASE_NAME);

        if ($this->isColumnModified(JuizesTableMap::COL_ID)) {
            $criteria->add(JuizesTableMap::COL_ID, $this->id);
        }
        if ($this->isColumnModified(JuizesTableMap::COL_NOME)) {
            $criteria->add(JuizesTableMap::COL_NOME, $this->nome);
        }
        if ($this->isColumnModified(JuizesTableMap::COL_TELEFONE)) {
            $criteria->add(JuizesTableMap::COL_TELEFONE, $this->telefone);
        }
        if ($this->isColumnModified(JuizesTableMap::COL_CIDADE_ID)) {
            $criteria->add(JuizesTableMap::COL_CIDADE_ID, $this->cidade_id);
        }

        return $criteria;
    }

    /**
     * Builds a Criteria object containing the primary key for this object.
     *
     * Unlike buildCriteria() this method includes the primary key values regardless
     * of whether or not they have been modified.
     *
     * @throws LogicException if no primary key is defined
     *
     * @return Criteria The Criteria object containing value(s) for primary key(s).
     */
    public function buildPkeyCriteria()
    {
        $criteria = ChildJuizesQuery::create();
        $criteria->add(JuizesTableMap::COL_ID, $this->id);

        return $criteria;
    }

    /**
     * If the primary key is not null, return the hashcode of the
     * primary key. Otherwise, return the hash code of the object.
     *
     * @return int Hashcode
     */
    public function hashCode()
    {
        $validPk = null !== $this->getId();

        $validPrimaryKeyFKs = 0;
        $primaryKeyFKs = [];

        if ($validPk) {
            return crc32(json_encode($this->getPrimaryKey(), JSON_UNESCAPED_UNICODE));
        } elseif ($validPrimaryKeyFKs) {
            return crc32(json_encode($primaryKeyFKs, JSON_UNESCAPED_UNICODE));
        }

        return spl_object_hash($this);
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getId();
    }

    /**
     * Generic method to set the primary key (id column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \Juizes (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setNome($this->getNome());
        $copyObj->setTelefone($this->getTelefone());
        $copyObj->setCidadeId($this->getCidadeId());

        if ($deepCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);

            foreach ($this->getAgendass() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addAgendas($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getDiasDisponiveiss() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addDiasDisponiveis($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getDiasIndisponiveiss() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addDiasIndisponiveis($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getPlantoess() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPlantoes($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getPlantoesJuizess() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPlantoesJuizes($relObj->copy($deepCopy));
                }
            }

        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setId(NULL); // this is a auto-increment column, so set to default value
        }
    }

    /**
     * Makes a copy of this object that will be inserted as a new row in table when saved.
     * It creates a new object filling in the simple attributes, but skipping any primary
     * keys that are defined for the table.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param  boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @return \Juizes Clone of current object.
     * @throws PropelException
     */
    public function copy($deepCopy = false)
    {
        // we use get_class(), because this might be a subclass
        $clazz = get_class($this);
        $copyObj = new $clazz();
        $this->copyInto($copyObj, $deepCopy);

        return $copyObj;
    }

    /**
     * Declares an association between this object and a ChildCidades object.
     *
     * @param  ChildCidades $v
     * @return $this|\Juizes The current object (for fluent API support)
     * @throws PropelException
     */
    public function setCidades(ChildCidades $v = null)
    {
        if ($v === null) {
            $this->setCidadeId(NULL);
        } else {
            $this->setCidadeId($v->getId());
        }

        $this->aCidades = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildCidades object, it will not be re-added.
        if ($v !== null) {
            $v->addJuizes($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildCidades object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildCidades The associated ChildCidades object.
     * @throws PropelException
     */
    public function getCidades(ConnectionInterface $con = null)
    {
        if ($this->aCidades === null && ($this->cidade_id != 0)) {
            $this->aCidades = ChildCidadesQuery::create()->findPk($this->cidade_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aCidades->addJuizess($this);
             */
        }

        return $this->aCidades;
    }


    /**
     * Initializes a collection based on the name of a relation.
     * Avoids crafting an 'init[$relationName]s' method name
     * that wouldn't work when StandardEnglishPluralizer is used.
     *
     * @param      string $relationName The name of the relation to initialize
     * @return void
     */
    public function initRelation($relationName)
    {
        if ('Agendas' == $relationName) {
            $this->initAgendass();
            return;
        }
        if ('DiasDisponiveis' == $relationName) {
            $this->initDiasDisponiveiss();
            return;
        }
        if ('DiasIndisponiveis' == $relationName) {
            $this->initDiasIndisponiveiss();
            return;
        }
        if ('Plantoes' == $relationName) {
            $this->initPlantoess();
            return;
        }
        if ('PlantoesJuizes' == $relationName) {
            $this->initPlantoesJuizess();
            return;
        }
    }

    /**
     * Clears out the collAgendass collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addAgendass()
     */
    public function clearAgendass()
    {
        $this->collAgendass = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collAgendass collection loaded partially.
     */
    public function resetPartialAgendass($v = true)
    {
        $this->collAgendassPartial = $v;
    }

    /**
     * Initializes the collAgendass collection.
     *
     * By default this just sets the collAgendass collection to an empty array (like clearcollAgendass());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initAgendass($overrideExisting = true)
    {
        if (null !== $this->collAgendass && !$overrideExisting) {
            return;
        }

        $collectionClassName = AgendasTableMap::getTableMap()->getCollectionClassName();

        $this->collAgendass = new $collectionClassName;
        $this->collAgendass->setModel('\Agendas');
    }

    /**
     * Gets an array of ChildAgendas objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildJuizes is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildAgendas[] List of ChildAgendas objects
     * @throws PropelException
     */
    public function getAgendass(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collAgendassPartial && !$this->isNew();
        if (null === $this->collAgendass || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collAgendass) {
                // return empty collection
                $this->initAgendass();
            } else {
                $collAgendass = ChildAgendasQuery::create(null, $criteria)
                    ->filterByJuizes($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collAgendassPartial && count($collAgendass)) {
                        $this->initAgendass(false);

                        foreach ($collAgendass as $obj) {
                            if (false == $this->collAgendass->contains($obj)) {
                                $this->collAgendass->append($obj);
                            }
                        }

                        $this->collAgendassPartial = true;
                    }

                    return $collAgendass;
                }

                if ($partial && $this->collAgendass) {
                    foreach ($this->collAgendass as $obj) {
                        if ($obj->isNew()) {
                            $collAgendass[] = $obj;
                        }
                    }
                }

                $this->collAgendass = $collAgendass;
                $this->collAgendassPartial = false;
            }
        }

        return $this->collAgendass;
    }

    /**
     * Sets a collection of ChildAgendas objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $agendass A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildJuizes The current object (for fluent API support)
     */
    public function setAgendass(Collection $agendass, ConnectionInterface $con = null)
    {
        /** @var ChildAgendas[] $agendassToDelete */
        $agendassToDelete = $this->getAgendass(new Criteria(), $con)->diff($agendass);


        $this->agendassScheduledForDeletion = $agendassToDelete;

        foreach ($agendassToDelete as $agendasRemoved) {
            $agendasRemoved->setJuizes(null);
        }

        $this->collAgendass = null;
        foreach ($agendass as $agendas) {
            $this->addAgendas($agendas);
        }

        $this->collAgendass = $agendass;
        $this->collAgendassPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Agendas objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related Agendas objects.
     * @throws PropelException
     */
    public function countAgendass(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collAgendassPartial && !$this->isNew();
        if (null === $this->collAgendass || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collAgendass) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getAgendass());
            }

            $query = ChildAgendasQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByJuizes($this)
                ->count($con);
        }

        return count($this->collAgendass);
    }

    /**
     * Method called to associate a ChildAgendas object to this object
     * through the ChildAgendas foreign key attribute.
     *
     * @param  ChildAgendas $l ChildAgendas
     * @return $this|\Juizes The current object (for fluent API support)
     */
    public function addAgendas(ChildAgendas $l)
    {
        if ($this->collAgendass === null) {
            $this->initAgendass();
            $this->collAgendassPartial = true;
        }

        if (!$this->collAgendass->contains($l)) {
            $this->doAddAgendas($l);

            if ($this->agendassScheduledForDeletion and $this->agendassScheduledForDeletion->contains($l)) {
                $this->agendassScheduledForDeletion->remove($this->agendassScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildAgendas $agendas The ChildAgendas object to add.
     */
    protected function doAddAgendas(ChildAgendas $agendas)
    {
        $this->collAgendass[]= $agendas;
        $agendas->setJuizes($this);
    }

    /**
     * @param  ChildAgendas $agendas The ChildAgendas object to remove.
     * @return $this|ChildJuizes The current object (for fluent API support)
     */
    public function removeAgendas(ChildAgendas $agendas)
    {
        if ($this->getAgendass()->contains($agendas)) {
            $pos = $this->collAgendass->search($agendas);
            $this->collAgendass->remove($pos);
            if (null === $this->agendassScheduledForDeletion) {
                $this->agendassScheduledForDeletion = clone $this->collAgendass;
                $this->agendassScheduledForDeletion->clear();
            }
            $this->agendassScheduledForDeletion[]= $agendas;
            $agendas->setJuizes(null);
        }

        return $this;
    }

    /**
     * Clears out the collDiasDisponiveiss collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addDiasDisponiveiss()
     */
    public function clearDiasDisponiveiss()
    {
        $this->collDiasDisponiveiss = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collDiasDisponiveiss collection loaded partially.
     */
    public function resetPartialDiasDisponiveiss($v = true)
    {
        $this->collDiasDisponiveissPartial = $v;
    }

    /**
     * Initializes the collDiasDisponiveiss collection.
     *
     * By default this just sets the collDiasDisponiveiss collection to an empty array (like clearcollDiasDisponiveiss());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initDiasDisponiveiss($overrideExisting = true)
    {
        if (null !== $this->collDiasDisponiveiss && !$overrideExisting) {
            return;
        }

        $collectionClassName = DiasDisponiveisTableMap::getTableMap()->getCollectionClassName();

        $this->collDiasDisponiveiss = new $collectionClassName;
        $this->collDiasDisponiveiss->setModel('\DiasDisponiveis');
    }

    /**
     * Gets an array of ChildDiasDisponiveis objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildJuizes is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildDiasDisponiveis[] List of ChildDiasDisponiveis objects
     * @throws PropelException
     */
    public function getDiasDisponiveiss(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collDiasDisponiveissPartial && !$this->isNew();
        if (null === $this->collDiasDisponiveiss || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collDiasDisponiveiss) {
                // return empty collection
                $this->initDiasDisponiveiss();
            } else {
                $collDiasDisponiveiss = ChildDiasDisponiveisQuery::create(null, $criteria)
                    ->filterByJuizes($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collDiasDisponiveissPartial && count($collDiasDisponiveiss)) {
                        $this->initDiasDisponiveiss(false);

                        foreach ($collDiasDisponiveiss as $obj) {
                            if (false == $this->collDiasDisponiveiss->contains($obj)) {
                                $this->collDiasDisponiveiss->append($obj);
                            }
                        }

                        $this->collDiasDisponiveissPartial = true;
                    }

                    return $collDiasDisponiveiss;
                }

                if ($partial && $this->collDiasDisponiveiss) {
                    foreach ($this->collDiasDisponiveiss as $obj) {
                        if ($obj->isNew()) {
                            $collDiasDisponiveiss[] = $obj;
                        }
                    }
                }

                $this->collDiasDisponiveiss = $collDiasDisponiveiss;
                $this->collDiasDisponiveissPartial = false;
            }
        }

        return $this->collDiasDisponiveiss;
    }

    /**
     * Sets a collection of ChildDiasDisponiveis objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $diasDisponiveiss A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildJuizes The current object (for fluent API support)
     */
    public function setDiasDisponiveiss(Collection $diasDisponiveiss, ConnectionInterface $con = null)
    {
        /** @var ChildDiasDisponiveis[] $diasDisponiveissToDelete */
        $diasDisponiveissToDelete = $this->getDiasDisponiveiss(new Criteria(), $con)->diff($diasDisponiveiss);


        $this->diasDisponiveissScheduledForDeletion = $diasDisponiveissToDelete;

        foreach ($diasDisponiveissToDelete as $diasDisponiveisRemoved) {
            $diasDisponiveisRemoved->setJuizes(null);
        }

        $this->collDiasDisponiveiss = null;
        foreach ($diasDisponiveiss as $diasDisponiveis) {
            $this->addDiasDisponiveis($diasDisponiveis);
        }

        $this->collDiasDisponiveiss = $diasDisponiveiss;
        $this->collDiasDisponiveissPartial = false;

        return $this;
    }

    /**
     * Returns the number of related DiasDisponiveis objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related DiasDisponiveis objects.
     * @throws PropelException
     */
    public function countDiasDisponiveiss(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collDiasDisponiveissPartial && !$this->isNew();
        if (null === $this->collDiasDisponiveiss || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collDiasDisponiveiss) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getDiasDisponiveiss());
            }

            $query = ChildDiasDisponiveisQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByJuizes($this)
                ->count($con);
        }

        return count($this->collDiasDisponiveiss);
    }

    /**
     * Method called to associate a ChildDiasDisponiveis object to this object
     * through the ChildDiasDisponiveis foreign key attribute.
     *
     * @param  ChildDiasDisponiveis $l ChildDiasDisponiveis
     * @return $this|\Juizes The current object (for fluent API support)
     */
    public function addDiasDisponiveis(ChildDiasDisponiveis $l)
    {
        if ($this->collDiasDisponiveiss === null) {
            $this->initDiasDisponiveiss();
            $this->collDiasDisponiveissPartial = true;
        }

        if (!$this->collDiasDisponiveiss->contains($l)) {
            $this->doAddDiasDisponiveis($l);

            if ($this->diasDisponiveissScheduledForDeletion and $this->diasDisponiveissScheduledForDeletion->contains($l)) {
                $this->diasDisponiveissScheduledForDeletion->remove($this->diasDisponiveissScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildDiasDisponiveis $diasDisponiveis The ChildDiasDisponiveis object to add.
     */
    protected function doAddDiasDisponiveis(ChildDiasDisponiveis $diasDisponiveis)
    {
        $this->collDiasDisponiveiss[]= $diasDisponiveis;
        $diasDisponiveis->setJuizes($this);
    }

    /**
     * @param  ChildDiasDisponiveis $diasDisponiveis The ChildDiasDisponiveis object to remove.
     * @return $this|ChildJuizes The current object (for fluent API support)
     */
    public function removeDiasDisponiveis(ChildDiasDisponiveis $diasDisponiveis)
    {
        if ($this->getDiasDisponiveiss()->contains($diasDisponiveis)) {
            $pos = $this->collDiasDisponiveiss->search($diasDisponiveis);
            $this->collDiasDisponiveiss->remove($pos);
            if (null === $this->diasDisponiveissScheduledForDeletion) {
                $this->diasDisponiveissScheduledForDeletion = clone $this->collDiasDisponiveiss;
                $this->diasDisponiveissScheduledForDeletion->clear();
            }
            $this->diasDisponiveissScheduledForDeletion[]= $diasDisponiveis;
            $diasDisponiveis->setJuizes(null);
        }

        return $this;
    }

    /**
     * Clears out the collDiasIndisponiveiss collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addDiasIndisponiveiss()
     */
    public function clearDiasIndisponiveiss()
    {
        $this->collDiasIndisponiveiss = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collDiasIndisponiveiss collection loaded partially.
     */
    public function resetPartialDiasIndisponiveiss($v = true)
    {
        $this->collDiasIndisponiveissPartial = $v;
    }

    /**
     * Initializes the collDiasIndisponiveiss collection.
     *
     * By default this just sets the collDiasIndisponiveiss collection to an empty array (like clearcollDiasIndisponiveiss());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initDiasIndisponiveiss($overrideExisting = true)
    {
        if (null !== $this->collDiasIndisponiveiss && !$overrideExisting) {
            return;
        }

        $collectionClassName = DiasIndisponiveisTableMap::getTableMap()->getCollectionClassName();

        $this->collDiasIndisponiveiss = new $collectionClassName;
        $this->collDiasIndisponiveiss->setModel('\DiasIndisponiveis');
    }

    /**
     * Gets an array of ChildDiasIndisponiveis objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildJuizes is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildDiasIndisponiveis[] List of ChildDiasIndisponiveis objects
     * @throws PropelException
     */
    public function getDiasIndisponiveiss(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collDiasIndisponiveissPartial && !$this->isNew();
        if (null === $this->collDiasIndisponiveiss || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collDiasIndisponiveiss) {
                // return empty collection
                $this->initDiasIndisponiveiss();
            } else {
                $collDiasIndisponiveiss = ChildDiasIndisponiveisQuery::create(null, $criteria)
                    ->filterByJuizes($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collDiasIndisponiveissPartial && count($collDiasIndisponiveiss)) {
                        $this->initDiasIndisponiveiss(false);

                        foreach ($collDiasIndisponiveiss as $obj) {
                            if (false == $this->collDiasIndisponiveiss->contains($obj)) {
                                $this->collDiasIndisponiveiss->append($obj);
                            }
                        }

                        $this->collDiasIndisponiveissPartial = true;
                    }

                    return $collDiasIndisponiveiss;
                }

                if ($partial && $this->collDiasIndisponiveiss) {
                    foreach ($this->collDiasIndisponiveiss as $obj) {
                        if ($obj->isNew()) {
                            $collDiasIndisponiveiss[] = $obj;
                        }
                    }
                }

                $this->collDiasIndisponiveiss = $collDiasIndisponiveiss;
                $this->collDiasIndisponiveissPartial = false;
            }
        }

        return $this->collDiasIndisponiveiss;
    }

    /**
     * Sets a collection of ChildDiasIndisponiveis objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $diasIndisponiveiss A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildJuizes The current object (for fluent API support)
     */
    public function setDiasIndisponiveiss(Collection $diasIndisponiveiss, ConnectionInterface $con = null)
    {
        /** @var ChildDiasIndisponiveis[] $diasIndisponiveissToDelete */
        $diasIndisponiveissToDelete = $this->getDiasIndisponiveiss(new Criteria(), $con)->diff($diasIndisponiveiss);


        $this->diasIndisponiveissScheduledForDeletion = $diasIndisponiveissToDelete;

        foreach ($diasIndisponiveissToDelete as $diasIndisponiveisRemoved) {
            $diasIndisponiveisRemoved->setJuizes(null);
        }

        $this->collDiasIndisponiveiss = null;
        foreach ($diasIndisponiveiss as $diasIndisponiveis) {
            $this->addDiasIndisponiveis($diasIndisponiveis);
        }

        $this->collDiasIndisponiveiss = $diasIndisponiveiss;
        $this->collDiasIndisponiveissPartial = false;

        return $this;
    }

    /**
     * Returns the number of related DiasIndisponiveis objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related DiasIndisponiveis objects.
     * @throws PropelException
     */
    public function countDiasIndisponiveiss(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collDiasIndisponiveissPartial && !$this->isNew();
        if (null === $this->collDiasIndisponiveiss || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collDiasIndisponiveiss) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getDiasIndisponiveiss());
            }

            $query = ChildDiasIndisponiveisQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByJuizes($this)
                ->count($con);
        }

        return count($this->collDiasIndisponiveiss);
    }

    /**
     * Method called to associate a ChildDiasIndisponiveis object to this object
     * through the ChildDiasIndisponiveis foreign key attribute.
     *
     * @param  ChildDiasIndisponiveis $l ChildDiasIndisponiveis
     * @return $this|\Juizes The current object (for fluent API support)
     */
    public function addDiasIndisponiveis(ChildDiasIndisponiveis $l)
    {
        if ($this->collDiasIndisponiveiss === null) {
            $this->initDiasIndisponiveiss();
            $this->collDiasIndisponiveissPartial = true;
        }

        if (!$this->collDiasIndisponiveiss->contains($l)) {
            $this->doAddDiasIndisponiveis($l);

            if ($this->diasIndisponiveissScheduledForDeletion and $this->diasIndisponiveissScheduledForDeletion->contains($l)) {
                $this->diasIndisponiveissScheduledForDeletion->remove($this->diasIndisponiveissScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildDiasIndisponiveis $diasIndisponiveis The ChildDiasIndisponiveis object to add.
     */
    protected function doAddDiasIndisponiveis(ChildDiasIndisponiveis $diasIndisponiveis)
    {
        $this->collDiasIndisponiveiss[]= $diasIndisponiveis;
        $diasIndisponiveis->setJuizes($this);
    }

    /**
     * @param  ChildDiasIndisponiveis $diasIndisponiveis The ChildDiasIndisponiveis object to remove.
     * @return $this|ChildJuizes The current object (for fluent API support)
     */
    public function removeDiasIndisponiveis(ChildDiasIndisponiveis $diasIndisponiveis)
    {
        if ($this->getDiasIndisponiveiss()->contains($diasIndisponiveis)) {
            $pos = $this->collDiasIndisponiveiss->search($diasIndisponiveis);
            $this->collDiasIndisponiveiss->remove($pos);
            if (null === $this->diasIndisponiveissScheduledForDeletion) {
                $this->diasIndisponiveissScheduledForDeletion = clone $this->collDiasIndisponiveiss;
                $this->diasIndisponiveissScheduledForDeletion->clear();
            }
            $this->diasIndisponiveissScheduledForDeletion[]= $diasIndisponiveis;
            $diasIndisponiveis->setJuizes(null);
        }

        return $this;
    }

    /**
     * Clears out the collPlantoess collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addPlantoess()
     */
    public function clearPlantoess()
    {
        $this->collPlantoess = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collPlantoess collection loaded partially.
     */
    public function resetPartialPlantoess($v = true)
    {
        $this->collPlantoessPartial = $v;
    }

    /**
     * Initializes the collPlantoess collection.
     *
     * By default this just sets the collPlantoess collection to an empty array (like clearcollPlantoess());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPlantoess($overrideExisting = true)
    {
        if (null !== $this->collPlantoess && !$overrideExisting) {
            return;
        }

        $collectionClassName = PlantoesTableMap::getTableMap()->getCollectionClassName();

        $this->collPlantoess = new $collectionClassName;
        $this->collPlantoess->setModel('\Plantoes');
    }

    /**
     * Gets an array of ChildPlantoes objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildJuizes is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildPlantoes[] List of ChildPlantoes objects
     * @throws PropelException
     */
    public function getPlantoess(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collPlantoessPartial && !$this->isNew();
        if (null === $this->collPlantoess || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collPlantoess) {
                // return empty collection
                $this->initPlantoess();
            } else {
                $collPlantoess = ChildPlantoesQuery::create(null, $criteria)
                    ->filterByJuizes($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collPlantoessPartial && count($collPlantoess)) {
                        $this->initPlantoess(false);

                        foreach ($collPlantoess as $obj) {
                            if (false == $this->collPlantoess->contains($obj)) {
                                $this->collPlantoess->append($obj);
                            }
                        }

                        $this->collPlantoessPartial = true;
                    }

                    return $collPlantoess;
                }

                if ($partial && $this->collPlantoess) {
                    foreach ($this->collPlantoess as $obj) {
                        if ($obj->isNew()) {
                            $collPlantoess[] = $obj;
                        }
                    }
                }

                $this->collPlantoess = $collPlantoess;
                $this->collPlantoessPartial = false;
            }
        }

        return $this->collPlantoess;
    }

    /**
     * Sets a collection of ChildPlantoes objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $plantoess A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildJuizes The current object (for fluent API support)
     */
    public function setPlantoess(Collection $plantoess, ConnectionInterface $con = null)
    {
        /** @var ChildPlantoes[] $plantoessToDelete */
        $plantoessToDelete = $this->getPlantoess(new Criteria(), $con)->diff($plantoess);


        $this->plantoessScheduledForDeletion = $plantoessToDelete;

        foreach ($plantoessToDelete as $plantoesRemoved) {
            $plantoesRemoved->setJuizes(null);
        }

        $this->collPlantoess = null;
        foreach ($plantoess as $plantoes) {
            $this->addPlantoes($plantoes);
        }

        $this->collPlantoess = $plantoess;
        $this->collPlantoessPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Plantoes objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related Plantoes objects.
     * @throws PropelException
     */
    public function countPlantoess(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collPlantoessPartial && !$this->isNew();
        if (null === $this->collPlantoess || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPlantoess) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getPlantoess());
            }

            $query = ChildPlantoesQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByJuizes($this)
                ->count($con);
        }

        return count($this->collPlantoess);
    }

    /**
     * Method called to associate a ChildPlantoes object to this object
     * through the ChildPlantoes foreign key attribute.
     *
     * @param  ChildPlantoes $l ChildPlantoes
     * @return $this|\Juizes The current object (for fluent API support)
     */
    public function addPlantoes(ChildPlantoes $l)
    {
        if ($this->collPlantoess === null) {
            $this->initPlantoess();
            $this->collPlantoessPartial = true;
        }

        if (!$this->collPlantoess->contains($l)) {
            $this->doAddPlantoes($l);

            if ($this->plantoessScheduledForDeletion and $this->plantoessScheduledForDeletion->contains($l)) {
                $this->plantoessScheduledForDeletion->remove($this->plantoessScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildPlantoes $plantoes The ChildPlantoes object to add.
     */
    protected function doAddPlantoes(ChildPlantoes $plantoes)
    {
        $this->collPlantoess[]= $plantoes;
        $plantoes->setJuizes($this);
    }

    /**
     * @param  ChildPlantoes $plantoes The ChildPlantoes object to remove.
     * @return $this|ChildJuizes The current object (for fluent API support)
     */
    public function removePlantoes(ChildPlantoes $plantoes)
    {
        if ($this->getPlantoess()->contains($plantoes)) {
            $pos = $this->collPlantoess->search($plantoes);
            $this->collPlantoess->remove($pos);
            if (null === $this->plantoessScheduledForDeletion) {
                $this->plantoessScheduledForDeletion = clone $this->collPlantoess;
                $this->plantoessScheduledForDeletion->clear();
            }
            $this->plantoessScheduledForDeletion[]= $plantoes;
            $plantoes->setJuizes(null);
        }

        return $this;
    }

    /**
     * Clears out the collPlantoesJuizess collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addPlantoesJuizess()
     */
    public function clearPlantoesJuizess()
    {
        $this->collPlantoesJuizess = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collPlantoesJuizess collection loaded partially.
     */
    public function resetPartialPlantoesJuizess($v = true)
    {
        $this->collPlantoesJuizessPartial = $v;
    }

    /**
     * Initializes the collPlantoesJuizess collection.
     *
     * By default this just sets the collPlantoesJuizess collection to an empty array (like clearcollPlantoesJuizess());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPlantoesJuizess($overrideExisting = true)
    {
        if (null !== $this->collPlantoesJuizess && !$overrideExisting) {
            return;
        }

        $collectionClassName = PlantoesJuizesTableMap::getTableMap()->getCollectionClassName();

        $this->collPlantoesJuizess = new $collectionClassName;
        $this->collPlantoesJuizess->setModel('\PlantoesJuizes');
    }

    /**
     * Gets an array of ChildPlantoesJuizes objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildJuizes is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildPlantoesJuizes[] List of ChildPlantoesJuizes objects
     * @throws PropelException
     */
    public function getPlantoesJuizess(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collPlantoesJuizessPartial && !$this->isNew();
        if (null === $this->collPlantoesJuizess || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collPlantoesJuizess) {
                // return empty collection
                $this->initPlantoesJuizess();
            } else {
                $collPlantoesJuizess = ChildPlantoesJuizesQuery::create(null, $criteria)
                    ->filterByJuizes($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collPlantoesJuizessPartial && count($collPlantoesJuizess)) {
                        $this->initPlantoesJuizess(false);

                        foreach ($collPlantoesJuizess as $obj) {
                            if (false == $this->collPlantoesJuizess->contains($obj)) {
                                $this->collPlantoesJuizess->append($obj);
                            }
                        }

                        $this->collPlantoesJuizessPartial = true;
                    }

                    return $collPlantoesJuizess;
                }

                if ($partial && $this->collPlantoesJuizess) {
                    foreach ($this->collPlantoesJuizess as $obj) {
                        if ($obj->isNew()) {
                            $collPlantoesJuizess[] = $obj;
                        }
                    }
                }

                $this->collPlantoesJuizess = $collPlantoesJuizess;
                $this->collPlantoesJuizessPartial = false;
            }
        }

        return $this->collPlantoesJuizess;
    }

    /**
     * Sets a collection of ChildPlantoesJuizes objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $plantoesJuizess A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildJuizes The current object (for fluent API support)
     */
    public function setPlantoesJuizess(Collection $plantoesJuizess, ConnectionInterface $con = null)
    {
        /** @var ChildPlantoesJuizes[] $plantoesJuizessToDelete */
        $plantoesJuizessToDelete = $this->getPlantoesJuizess(new Criteria(), $con)->diff($plantoesJuizess);


        $this->plantoesJuizessScheduledForDeletion = $plantoesJuizessToDelete;

        foreach ($plantoesJuizessToDelete as $plantoesJuizesRemoved) {
            $plantoesJuizesRemoved->setJuizes(null);
        }

        $this->collPlantoesJuizess = null;
        foreach ($plantoesJuizess as $plantoesJuizes) {
            $this->addPlantoesJuizes($plantoesJuizes);
        }

        $this->collPlantoesJuizess = $plantoesJuizess;
        $this->collPlantoesJuizessPartial = false;

        return $this;
    }

    /**
     * Returns the number of related PlantoesJuizes objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related PlantoesJuizes objects.
     * @throws PropelException
     */
    public function countPlantoesJuizess(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collPlantoesJuizessPartial && !$this->isNew();
        if (null === $this->collPlantoesJuizess || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPlantoesJuizess) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getPlantoesJuizess());
            }

            $query = ChildPlantoesJuizesQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByJuizes($this)
                ->count($con);
        }

        return count($this->collPlantoesJuizess);
    }

    /**
     * Method called to associate a ChildPlantoesJuizes object to this object
     * through the ChildPlantoesJuizes foreign key attribute.
     *
     * @param  ChildPlantoesJuizes $l ChildPlantoesJuizes
     * @return $this|\Juizes The current object (for fluent API support)
     */
    public function addPlantoesJuizes(ChildPlantoesJuizes $l)
    {
        if ($this->collPlantoesJuizess === null) {
            $this->initPlantoesJuizess();
            $this->collPlantoesJuizessPartial = true;
        }

        if (!$this->collPlantoesJuizess->contains($l)) {
            $this->doAddPlantoesJuizes($l);

            if ($this->plantoesJuizessScheduledForDeletion and $this->plantoesJuizessScheduledForDeletion->contains($l)) {
                $this->plantoesJuizessScheduledForDeletion->remove($this->plantoesJuizessScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildPlantoesJuizes $plantoesJuizes The ChildPlantoesJuizes object to add.
     */
    protected function doAddPlantoesJuizes(ChildPlantoesJuizes $plantoesJuizes)
    {
        $this->collPlantoesJuizess[]= $plantoesJuizes;
        $plantoesJuizes->setJuizes($this);
    }

    /**
     * @param  ChildPlantoesJuizes $plantoesJuizes The ChildPlantoesJuizes object to remove.
     * @return $this|ChildJuizes The current object (for fluent API support)
     */
    public function removePlantoesJuizes(ChildPlantoesJuizes $plantoesJuizes)
    {
        if ($this->getPlantoesJuizess()->contains($plantoesJuizes)) {
            $pos = $this->collPlantoesJuizess->search($plantoesJuizes);
            $this->collPlantoesJuizess->remove($pos);
            if (null === $this->plantoesJuizessScheduledForDeletion) {
                $this->plantoesJuizessScheduledForDeletion = clone $this->collPlantoesJuizess;
                $this->plantoesJuizessScheduledForDeletion->clear();
            }
            $this->plantoesJuizessScheduledForDeletion[]= $plantoesJuizes;
            $plantoesJuizes->setJuizes(null);
        }

        return $this;
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        if (null !== $this->aCidades) {
            $this->aCidades->removeJuizes($this);
        }
        $this->id = null;
        $this->nome = null;
        $this->telefone = null;
        $this->cidade_id = null;
        $this->alreadyInSave = false;
        $this->clearAllReferences();
        $this->resetModified();
        $this->setNew(true);
        $this->setDeleted(false);
    }

    /**
     * Resets all references and back-references to other model objects or collections of model objects.
     *
     * This method is used to reset all php object references (not the actual reference in the database).
     * Necessary for object serialisation.
     *
     * @param      boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep) {
            if ($this->collAgendass) {
                foreach ($this->collAgendass as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collDiasDisponiveiss) {
                foreach ($this->collDiasDisponiveiss as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collDiasIndisponiveiss) {
                foreach ($this->collDiasIndisponiveiss as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collPlantoess) {
                foreach ($this->collPlantoess as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collPlantoesJuizess) {
                foreach ($this->collPlantoesJuizess as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        $this->collAgendass = null;
        $this->collDiasDisponiveiss = null;
        $this->collDiasIndisponiveiss = null;
        $this->collPlantoess = null;
        $this->collPlantoesJuizess = null;
        $this->aCidades = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(JuizesTableMap::DEFAULT_STRING_FORMAT);
    }

    /**
     * Code to be run before persisting the object
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preSave(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preSave')) {
            return parent::preSave($con);
        }
        return true;
    }

    /**
     * Code to be run after persisting the object
     * @param ConnectionInterface $con
     */
    public function postSave(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postSave')) {
            parent::postSave($con);
        }
    }

    /**
     * Code to be run before inserting to database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preInsert(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preInsert')) {
            return parent::preInsert($con);
        }
        return true;
    }

    /**
     * Code to be run after inserting to database
     * @param ConnectionInterface $con
     */
    public function postInsert(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postInsert')) {
            parent::postInsert($con);
        }
    }

    /**
     * Code to be run before updating the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preUpdate(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preUpdate')) {
            return parent::preUpdate($con);
        }
        return true;
    }

    /**
     * Code to be run after updating the object in database
     * @param ConnectionInterface $con
     */
    public function postUpdate(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postUpdate')) {
            parent::postUpdate($con);
        }
    }

    /**
     * Code to be run before deleting the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preDelete(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preDelete')) {
            return parent::preDelete($con);
        }
        return true;
    }

    /**
     * Code to be run after deleting the object in database
     * @param ConnectionInterface $con
     */
    public function postDelete(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postDelete')) {
            parent::postDelete($con);
        }
    }


    /**
     * Derived method to catches calls to undefined methods.
     *
     * Provides magic import/export method support (fromXML()/toXML(), fromYAML()/toYAML(), etc.).
     * Allows to define default __call() behavior if you overwrite __call()
     *
     * @param string $name
     * @param mixed  $params
     *
     * @return array|string
     */
    public function __call($name, $params)
    {
        if (0 === strpos($name, 'get')) {
            $virtualColumn = substr($name, 3);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }

            $virtualColumn = lcfirst($virtualColumn);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }
        }

        if (0 === strpos($name, 'from')) {
            $format = substr($name, 4);

            return $this->importFrom($format, reset($params));
        }

        if (0 === strpos($name, 'to')) {
            $format = substr($name, 2);
            $includeLazyLoadColumns = isset($params[0]) ? $params[0] : true;

            return $this->exportTo($format, $includeLazyLoadColumns);
        }

        throw new BadMethodCallException(sprintf('Call to undefined method: %s.', $name));
    }

}
