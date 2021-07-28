<?php

namespace DataDikdas\Model\om;

use \BaseObject;
use \BasePeer;
use \Criteria;
use \DateTime;
use \Exception;
use \PDO;
use \Persistent;
use \Propel;
use \PropelCollection;
use \PropelDateTime;
use \PropelException;
use \PropelObjectCollection;
use \PropelPDO;
use DataDikdas\Model\Biblio;
use DataDikdas\Model\BiblioQuery;
use DataDikdas\Model\MstWilayah;
use DataDikdas\Model\MstWilayahQuery;
use DataDikdas\Model\Negara;
use DataDikdas\Model\NegaraPeer;
use DataDikdas\Model\NegaraQuery;
use DataDikdas\Model\PesertaDidik;
use DataDikdas\Model\PesertaDidikQuery;
use DataDikdas\Model\Ptk;
use DataDikdas\Model\PtkQuery;

/**
 * Base class that represents a row from the 'ref.negara' table.
 *
 * 
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseNegara extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'DataDikdas\\Model\\NegaraPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        NegaraPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the negara_id field.
     * @var        string
     */
    protected $negara_id;

    /**
     * The value for the nama field.
     * @var        string
     */
    protected $nama;

    /**
     * The value for the luar_negeri field.
     * @var        string
     */
    protected $luar_negeri;

    /**
     * The value for the create_date field.
     * Note: this column has a database default value of: (expression) now()
     * @var        string
     */
    protected $create_date;

    /**
     * The value for the last_update field.
     * Note: this column has a database default value of: (expression) now()
     * @var        string
     */
    protected $last_update;

    /**
     * The value for the expired_date field.
     * @var        string
     */
    protected $expired_date;

    /**
     * The value for the last_sync field.
     * Note: this column has a database default value of: '1901-01-01 00:00:00'
     * @var        string
     */
    protected $last_sync;

    /**
     * @var        PropelObjectCollection|Biblio[] Collection to store aggregation of Biblio objects.
     */
    protected $collBiblios;
    protected $collBibliosPartial;

    /**
     * @var        PropelObjectCollection|MstWilayah[] Collection to store aggregation of MstWilayah objects.
     */
    protected $collMstWilayahs;
    protected $collMstWilayahsPartial;

    /**
     * @var        PropelObjectCollection|PesertaDidik[] Collection to store aggregation of PesertaDidik objects.
     */
    protected $collPesertaDidiks;
    protected $collPesertaDidiksPartial;

    /**
     * @var        PropelObjectCollection|Ptk[] Collection to store aggregation of Ptk objects.
     */
    protected $collPtks;
    protected $collPtksPartial;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     * @var        boolean
     */
    protected $alreadyInSave = false;

    /**
     * Flag to prevent endless validation loop, if this object is referenced
     * by another object which falls in this transaction.
     * @var        boolean
     */
    protected $alreadyInValidation = false;

    /**
     * Flag to prevent endless clearAllReferences($deep=true) loop, if this object is referenced
     * @var        boolean
     */
    protected $alreadyInClearAllReferencesDeep = false;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $bibliosScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $mstWilayahsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $pesertaDidiksScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $ptksScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->last_sync = '1901-01-01 00:00:00';
    }

    /**
     * Initializes internal state of BaseNegara object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [negara_id] column value.
     * 
     * @return string
     */
    public function getNegaraId()
    {
        return $this->negara_id;
    }

    /**
     * Get the [nama] column value.
     * 
     * @return string
     */
    public function getNama()
    {
        return $this->nama;
    }

    /**
     * Get the [luar_negeri] column value.
     * 
     * @return string
     */
    public function getLuarNegeri()
    {
        return $this->luar_negeri;
    }

    /**
     * Get the [optionally formatted] temporal [create_date] column value.
     * 
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getCreateDate($format = 'Y-m-d H:i:s')
    {
        if ($this->create_date === null) {
            return null;
        }


        try {
            $dt = new DateTime($this->create_date);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->create_date, true), $x);
        }

        if ($format === null) {
            // Because propel.useDateTimeClass is true, we return a DateTime object.
            return $dt;
        }

        if (strpos($format, '%') !== false) {
            return strftime($format, $dt->format('U'));
        }

        return $dt->format($format);
        
    }

    /**
     * Get the [optionally formatted] temporal [last_update] column value.
     * 
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getLastUpdate($format = 'Y-m-d H:i:s')
    {
        if ($this->last_update === null) {
            return null;
        }


        try {
            $dt = new DateTime($this->last_update);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->last_update, true), $x);
        }

        if ($format === null) {
            // Because propel.useDateTimeClass is true, we return a DateTime object.
            return $dt;
        }

        if (strpos($format, '%') !== false) {
            return strftime($format, $dt->format('U'));
        }

        return $dt->format($format);
        
    }

    /**
     * Get the [optionally formatted] temporal [expired_date] column value.
     * 
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getExpiredDate($format = 'Y-m-d H:i:s')
    {
        if ($this->expired_date === null) {
            return null;
        }


        try {
            $dt = new DateTime($this->expired_date);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->expired_date, true), $x);
        }

        if ($format === null) {
            // Because propel.useDateTimeClass is true, we return a DateTime object.
            return $dt;
        }

        if (strpos($format, '%') !== false) {
            return strftime($format, $dt->format('U'));
        }

        return $dt->format($format);
        
    }

    /**
     * Get the [optionally formatted] temporal [last_sync] column value.
     * 
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getLastSync($format = 'Y-m-d H:i:s')
    {
        if ($this->last_sync === null) {
            return null;
        }


        try {
            $dt = new DateTime($this->last_sync);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->last_sync, true), $x);
        }

        if ($format === null) {
            // Because propel.useDateTimeClass is true, we return a DateTime object.
            return $dt;
        }

        if (strpos($format, '%') !== false) {
            return strftime($format, $dt->format('U'));
        }

        return $dt->format($format);
        
    }

    /**
     * Set the value of [negara_id] column.
     * 
     * @param string $v new value
     * @return Negara The current object (for fluent API support)
     */
    public function setNegaraId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->negara_id !== $v) {
            $this->negara_id = $v;
            $this->modifiedColumns[] = NegaraPeer::NEGARA_ID;
        }


        return $this;
    } // setNegaraId()

    /**
     * Set the value of [nama] column.
     * 
     * @param string $v new value
     * @return Negara The current object (for fluent API support)
     */
    public function setNama($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nama !== $v) {
            $this->nama = $v;
            $this->modifiedColumns[] = NegaraPeer::NAMA;
        }


        return $this;
    } // setNama()

    /**
     * Set the value of [luar_negeri] column.
     * 
     * @param string $v new value
     * @return Negara The current object (for fluent API support)
     */
    public function setLuarNegeri($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->luar_negeri !== $v) {
            $this->luar_negeri = $v;
            $this->modifiedColumns[] = NegaraPeer::LUAR_NEGERI;
        }


        return $this;
    } // setLuarNegeri()

    /**
     * Sets the value of [create_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Negara The current object (for fluent API support)
     */
    public function setCreateDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->create_date !== null || $dt !== null) {
            $currentDateAsString = ($this->create_date !== null && $tmpDt = new DateTime($this->create_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->create_date = $newDateAsString;
                $this->modifiedColumns[] = NegaraPeer::CREATE_DATE;
            }
        } // if either are not null


        return $this;
    } // setCreateDate()

    /**
     * Sets the value of [last_update] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Negara The current object (for fluent API support)
     */
    public function setLastUpdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->last_update !== null || $dt !== null) {
            $currentDateAsString = ($this->last_update !== null && $tmpDt = new DateTime($this->last_update)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->last_update = $newDateAsString;
                $this->modifiedColumns[] = NegaraPeer::LAST_UPDATE;
            }
        } // if either are not null


        return $this;
    } // setLastUpdate()

    /**
     * Sets the value of [expired_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Negara The current object (for fluent API support)
     */
    public function setExpiredDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->expired_date !== null || $dt !== null) {
            $currentDateAsString = ($this->expired_date !== null && $tmpDt = new DateTime($this->expired_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->expired_date = $newDateAsString;
                $this->modifiedColumns[] = NegaraPeer::EXPIRED_DATE;
            }
        } // if either are not null


        return $this;
    } // setExpiredDate()

    /**
     * Sets the value of [last_sync] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Negara The current object (for fluent API support)
     */
    public function setLastSync($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->last_sync !== null || $dt !== null) {
            $currentDateAsString = ($this->last_sync !== null && $tmpDt = new DateTime($this->last_sync)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ( ($currentDateAsString !== $newDateAsString) // normalized values don't match
                || ($dt->format('Y-m-d H:i:s') === '1901-01-01 00:00:00') // or the entered value matches the default
                 ) {
                $this->last_sync = $newDateAsString;
                $this->modifiedColumns[] = NegaraPeer::LAST_SYNC;
            }
        } // if either are not null


        return $this;
    } // setLastSync()

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
            if ($this->last_sync !== '1901-01-01 00:00:00') {
                return false;
            }

        // otherwise, everything was equal, so return true
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
     * @param array $row The row returned by PDOStatement->fetch(PDO::FETCH_NUM)
     * @param int $startcol 0-based offset column which indicates which restultset column to start with.
     * @param boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false)
    {
        try {

            $this->negara_id = ($row[$startcol + 0] !== null) ? (string) $row[$startcol + 0] : null;
            $this->nama = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->luar_negeri = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->create_date = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->last_update = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->expired_date = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->last_sync = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 7; // 7 = NegaraPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Negara object", $e);
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

    } // ensureConsistency

    /**
     * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
     *
     * This will only work if the object has been saved and has a valid primary key set.
     *
     * @param boolean $deep (optional) Whether to also de-associated any related objects.
     * @param PropelPDO $con (optional) The PropelPDO connection to use.
     * @return void
     * @throws PropelException - if this object is deleted, unsaved or doesn't have pk match in db
     */
    public function reload($deep = false, PropelPDO $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("Cannot reload a deleted object.");
        }

        if ($this->isNew()) {
            throw new PropelException("Cannot reload an unsaved object.");
        }

        if ($con === null) {
            $con = Propel::getConnection(NegaraPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = NegaraPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->collBiblios = null;

            $this->collMstWilayahs = null;

            $this->collPesertaDidiks = null;

            $this->collPtks = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param PropelPDO $con
     * @return void
     * @throws PropelException
     * @throws Exception
     * @see        BaseObject::setDeleted()
     * @see        BaseObject::isDeleted()
     */
    public function delete(PropelPDO $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getConnection(NegaraPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = NegaraQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
            if ($ret) {
                $deleteQuery->delete($con);
                $this->postDelete($con);
                $con->commit();
                $this->setDeleted(true);
            } else {
                $con->commit();
            }
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Persists this object to the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All modified related objects will also be persisted in the doSave()
     * method.  This method wraps all precipitate database operations in a
     * single transaction.
     *
     * @param PropelPDO $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @throws Exception
     * @see        doSave()
     */
    public function save(PropelPDO $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("You cannot save an object that has been deleted.");
        }

        if ($con === null) {
            $con = Propel::getConnection(NegaraPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        $isInsert = $this->isNew();
        try {
            $ret = $this->preSave($con);
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
                NegaraPeer::addInstanceToPool($this);
            } else {
                $affectedRows = 0;
            }
            $con->commit();

            return $affectedRows;
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs the work of inserting or updating the row in the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All related objects are also updated in this method.
     *
     * @param PropelPDO $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see        save()
     */
    protected function doSave(PropelPDO $con)
    {
        $affectedRows = 0; // initialize var to track total num of affected rows
        if (!$this->alreadyInSave) {
            $this->alreadyInSave = true;

            if ($this->isNew() || $this->isModified()) {
                // persist changes
                if ($this->isNew()) {
                    $this->doInsert($con);
                } else {
                    $this->doUpdate($con);
                }
                $affectedRows += 1;
                $this->resetModified();
            }

            if ($this->bibliosScheduledForDeletion !== null) {
                if (!$this->bibliosScheduledForDeletion->isEmpty()) {
                    BiblioQuery::create()
                        ->filterByPrimaryKeys($this->bibliosScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->bibliosScheduledForDeletion = null;
                }
            }

            if ($this->collBiblios !== null) {
                foreach ($this->collBiblios as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->mstWilayahsScheduledForDeletion !== null) {
                if (!$this->mstWilayahsScheduledForDeletion->isEmpty()) {
                    MstWilayahQuery::create()
                        ->filterByPrimaryKeys($this->mstWilayahsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->mstWilayahsScheduledForDeletion = null;
                }
            }

            if ($this->collMstWilayahs !== null) {
                foreach ($this->collMstWilayahs as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->pesertaDidiksScheduledForDeletion !== null) {
                if (!$this->pesertaDidiksScheduledForDeletion->isEmpty()) {
                    PesertaDidikQuery::create()
                        ->filterByPrimaryKeys($this->pesertaDidiksScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->pesertaDidiksScheduledForDeletion = null;
                }
            }

            if ($this->collPesertaDidiks !== null) {
                foreach ($this->collPesertaDidiks as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->ptksScheduledForDeletion !== null) {
                if (!$this->ptksScheduledForDeletion->isEmpty()) {
                    PtkQuery::create()
                        ->filterByPrimaryKeys($this->ptksScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->ptksScheduledForDeletion = null;
                }
            }

            if ($this->collPtks !== null) {
                foreach ($this->collPtks as $referrerFK) {
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
     * @param PropelPDO $con
     *
     * @throws PropelException
     * @see        doSave()
     */
    protected function doInsert(PropelPDO $con)
    {
        $modifiedColumns = array();
        $index = 0;


         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(NegaraPeer::NEGARA_ID)) {
            $modifiedColumns[':p' . $index++]  = '"negara_id"';
        }
        if ($this->isColumnModified(NegaraPeer::NAMA)) {
            $modifiedColumns[':p' . $index++]  = '"nama"';
        }
        if ($this->isColumnModified(NegaraPeer::LUAR_NEGERI)) {
            $modifiedColumns[':p' . $index++]  = '"luar_negeri"';
        }
        if ($this->isColumnModified(NegaraPeer::CREATE_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"create_date"';
        }
        if ($this->isColumnModified(NegaraPeer::LAST_UPDATE)) {
            $modifiedColumns[':p' . $index++]  = '"last_update"';
        }
        if ($this->isColumnModified(NegaraPeer::EXPIRED_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"expired_date"';
        }
        if ($this->isColumnModified(NegaraPeer::LAST_SYNC)) {
            $modifiedColumns[':p' . $index++]  = '"last_sync"';
        }

        $sql = sprintf(
            'INSERT INTO "ref"."negara" (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '"negara_id"':						
                        $stmt->bindValue($identifier, $this->negara_id, PDO::PARAM_STR);
                        break;
                    case '"nama"':						
                        $stmt->bindValue($identifier, $this->nama, PDO::PARAM_STR);
                        break;
                    case '"luar_negeri"':						
                        $stmt->bindValue($identifier, $this->luar_negeri, PDO::PARAM_STR);
                        break;
                    case '"create_date"':						
                        $stmt->bindValue($identifier, $this->create_date, PDO::PARAM_STR);
                        break;
                    case '"last_update"':						
                        $stmt->bindValue($identifier, $this->last_update, PDO::PARAM_STR);
                        break;
                    case '"expired_date"':						
                        $stmt->bindValue($identifier, $this->expired_date, PDO::PARAM_STR);
                        break;
                    case '"last_sync"':						
                        $stmt->bindValue($identifier, $this->last_sync, PDO::PARAM_STR);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), $e);
        }

        $this->setNew(false);
    }

    /**
     * Update the row in the database.
     *
     * @param PropelPDO $con
     *
     * @see        doSave()
     */
    protected function doUpdate(PropelPDO $con)
    {
        $selectCriteria = $this->buildPkeyCriteria();
        $valuesCriteria = $this->buildCriteria();
        BasePeer::doUpdate($selectCriteria, $valuesCriteria, $con);
    }

    /**
     * Array of ValidationFailed objects.
     * @var        array ValidationFailed[]
     */
    protected $validationFailures = array();

    /**
     * Gets any ValidationFailed objects that resulted from last call to validate().
     *
     *
     * @return array ValidationFailed[]
     * @see        validate()
     */
    public function getValidationFailures()
    {
        return $this->validationFailures;
    }

    /**
     * Validates the objects modified field values and all objects related to this table.
     *
     * If $columns is either a column name or an array of column names
     * only those columns are validated.
     *
     * @param mixed $columns Column name or an array of column names.
     * @return boolean Whether all columns pass validation.
     * @see        doValidate()
     * @see        getValidationFailures()
     */
    public function validate($columns = null)
    {
        $res = $this->doValidate($columns);
        if ($res === true) {
            $this->validationFailures = array();

            return true;
        }

        $this->validationFailures = $res;

        return false;
    }

    /**
     * This function performs the validation work for complex object models.
     *
     * In addition to checking the current object, all related objects will
     * also be validated.  If all pass then <code>true</code> is returned; otherwise
     * an aggreagated array of ValidationFailed objects will be returned.
     *
     * @param array $columns Array of column names to validate.
     * @return mixed <code>true</code> if all validations pass; array of <code>ValidationFailed</code> objets otherwise.
     */
    protected function doValidate($columns = null)
    {
        if (!$this->alreadyInValidation) {
            $this->alreadyInValidation = true;
            $retval = null;

            $failureMap = array();


            if (($retval = NegaraPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collBiblios !== null) {
                    foreach ($this->collBiblios as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collMstWilayahs !== null) {
                    foreach ($this->collMstWilayahs as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collPesertaDidiks !== null) {
                    foreach ($this->collPesertaDidiks as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collPtks !== null) {
                    foreach ($this->collPtks as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }


            $this->alreadyInValidation = false;
        }

        return (!empty($failureMap) ? $failureMap : true);
    }

    /**
     * Retrieves a field from the object by name passed in as a string.
     *
     * @param string $name name
     * @param string $type The type of fieldname the $name is of:
     *               one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *               BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *               Defaults to BasePeer::TYPE_FIELDNAME
     * @return mixed Value of field.
     */
    public function getByName($name, $type = BasePeer::TYPE_FIELDNAME)
    {
        $pos = NegaraPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
        $field = $this->getByPosition($pos);

        return $field;
    }

    /**
     * Retrieves a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param int $pos position in xml schema
     * @return mixed Value of field at $pos
     */
    public function getByPosition($pos)
    {
        switch ($pos) {
            case 0:
                return $this->getNegaraId();
                break;
            case 1:
                return $this->getNama();
                break;
            case 2:
                return $this->getLuarNegeri();
                break;
            case 3:
                return $this->getCreateDate();
                break;
            case 4:
                return $this->getLastUpdate();
                break;
            case 5:
                return $this->getExpiredDate();
                break;
            case 6:
                return $this->getLastSync();
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
     * @param     string  $keyType (optional) One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
     *                    BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *                    Defaults to BasePeer::TYPE_FIELDNAME.
     * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to true.
     * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
     * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = BasePeer::TYPE_FIELDNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array(), $includeForeignObjects = false)
    {
        if (isset($alreadyDumpedObjects['Negara'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Negara'][$this->getPrimaryKey()] = true;
        $keys = NegaraPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getNegaraId(),
            $keys[1] => $this->getNama(),
            $keys[2] => $this->getLuarNegeri(),
            $keys[3] => $this->getCreateDate(),
            $keys[4] => $this->getLastUpdate(),
            $keys[5] => $this->getExpiredDate(),
            $keys[6] => $this->getLastSync(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->collBiblios) {
                $result['Biblios'] = $this->collBiblios->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collMstWilayahs) {
                $result['MstWilayahs'] = $this->collMstWilayahs->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collPesertaDidiks) {
                $result['PesertaDidiks'] = $this->collPesertaDidiks->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collPtks) {
                $result['Ptks'] = $this->collPtks->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
        }

        return $result;
    }

    /**
     * Sets a field from the object by name passed in as a string.
     *
     * @param string $name peer name
     * @param mixed $value field value
     * @param string $type The type of fieldname the $name is of:
     *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *                     Defaults to BasePeer::TYPE_FIELDNAME
     * @return void
     */
    public function setByName($name, $value, $type = BasePeer::TYPE_FIELDNAME)
    {
        $pos = NegaraPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

        $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param int $pos position in xml schema
     * @param mixed $value field value
     * @return void
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setNegaraId($value);
                break;
            case 1:
                $this->setNama($value);
                break;
            case 2:
                $this->setLuarNegeri($value);
                break;
            case 3:
                $this->setCreateDate($value);
                break;
            case 4:
                $this->setLastUpdate($value);
                break;
            case 5:
                $this->setExpiredDate($value);
                break;
            case 6:
                $this->setLastSync($value);
                break;
        } // switch()
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
     * of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
     * BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     * The default key type is the column's BasePeer::TYPE_FIELDNAME
     *
     * @param array  $arr     An array to populate the object from.
     * @param string $keyType The type of keys the array uses.
     * @return void
     */
    public function fromArray($arr, $keyType = BasePeer::TYPE_FIELDNAME)
    {
        $keys = NegaraPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setNegaraId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setNama($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setLuarNegeri($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setCreateDate($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setLastUpdate($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setExpiredDate($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setLastSync($arr[$keys[6]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(NegaraPeer::DATABASE_NAME);

        if ($this->isColumnModified(NegaraPeer::NEGARA_ID)) $criteria->add(NegaraPeer::NEGARA_ID, $this->negara_id);
        if ($this->isColumnModified(NegaraPeer::NAMA)) $criteria->add(NegaraPeer::NAMA, $this->nama);
        if ($this->isColumnModified(NegaraPeer::LUAR_NEGERI)) $criteria->add(NegaraPeer::LUAR_NEGERI, $this->luar_negeri);
        if ($this->isColumnModified(NegaraPeer::CREATE_DATE)) $criteria->add(NegaraPeer::CREATE_DATE, $this->create_date);
        if ($this->isColumnModified(NegaraPeer::LAST_UPDATE)) $criteria->add(NegaraPeer::LAST_UPDATE, $this->last_update);
        if ($this->isColumnModified(NegaraPeer::EXPIRED_DATE)) $criteria->add(NegaraPeer::EXPIRED_DATE, $this->expired_date);
        if ($this->isColumnModified(NegaraPeer::LAST_SYNC)) $criteria->add(NegaraPeer::LAST_SYNC, $this->last_sync);

        return $criteria;
    }

    /**
     * Builds a Criteria object containing the primary key for this object.
     *
     * Unlike buildCriteria() this method includes the primary key values regardless
     * of whether or not they have been modified.
     *
     * @return Criteria The Criteria object containing value(s) for primary key(s).
     */
    public function buildPkeyCriteria()
    {
        $criteria = new Criteria(NegaraPeer::DATABASE_NAME);
        $criteria->add(NegaraPeer::NEGARA_ID, $this->negara_id);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return string
     */
    public function getPrimaryKey()
    {
        return $this->getNegaraId();
    }

    /**
     * Generic method to set the primary key (negara_id column).
     *
     * @param  string $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setNegaraId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getNegaraId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of Negara (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setNama($this->getNama());
        $copyObj->setLuarNegeri($this->getLuarNegeri());
        $copyObj->setCreateDate($this->getCreateDate());
        $copyObj->setLastUpdate($this->getLastUpdate());
        $copyObj->setExpiredDate($this->getExpiredDate());
        $copyObj->setLastSync($this->getLastSync());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getBiblios() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addBiblio($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getMstWilayahs() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addMstWilayah($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getPesertaDidiks() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPesertaDidik($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getPtks() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPtk($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setNegaraId(NULL); // this is a auto-increment column, so set to default value
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
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @return Negara Clone of current object.
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
     * Returns a peer instance associated with this om.
     *
     * Since Peer classes are not to have any instance attributes, this method returns the
     * same instance for all member of this class. The method could therefore
     * be static, but this would prevent one from overriding the behavior.
     *
     * @return NegaraPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new NegaraPeer();
        }

        return self::$peer;
    }


    /**
     * Initializes a collection based on the name of a relation.
     * Avoids crafting an 'init[$relationName]s' method name
     * that wouldn't work when StandardEnglishPluralizer is used.
     *
     * @param string $relationName The name of the relation to initialize
     * @return void
     */
    public function initRelation($relationName)
    {
        if ('Biblio' == $relationName) {
            $this->initBiblios();
        }
        if ('MstWilayah' == $relationName) {
            $this->initMstWilayahs();
        }
        if ('PesertaDidik' == $relationName) {
            $this->initPesertaDidiks();
        }
        if ('Ptk' == $relationName) {
            $this->initPtks();
        }
    }

    /**
     * Clears out the collBiblios collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Negara The current object (for fluent API support)
     * @see        addBiblios()
     */
    public function clearBiblios()
    {
        $this->collBiblios = null; // important to set this to null since that means it is uninitialized
        $this->collBibliosPartial = null;

        return $this;
    }

    /**
     * reset is the collBiblios collection loaded partially
     *
     * @return void
     */
    public function resetPartialBiblios($v = true)
    {
        $this->collBibliosPartial = $v;
    }

    /**
     * Initializes the collBiblios collection.
     *
     * By default this just sets the collBiblios collection to an empty array (like clearcollBiblios());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initBiblios($overrideExisting = true)
    {
        if (null !== $this->collBiblios && !$overrideExisting) {
            return;
        }
        $this->collBiblios = new PropelObjectCollection();
        $this->collBiblios->setModel('Biblio');
    }

    /**
     * Gets an array of Biblio objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Negara is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Biblio[] List of Biblio objects
     * @throws PropelException
     */
    public function getBiblios($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collBibliosPartial && !$this->isNew();
        if (null === $this->collBiblios || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collBiblios) {
                // return empty collection
                $this->initBiblios();
            } else {
                $collBiblios = BiblioQuery::create(null, $criteria)
                    ->filterByNegara($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collBibliosPartial && count($collBiblios)) {
                      $this->initBiblios(false);

                      foreach($collBiblios as $obj) {
                        if (false == $this->collBiblios->contains($obj)) {
                          $this->collBiblios->append($obj);
                        }
                      }

                      $this->collBibliosPartial = true;
                    }

                    $collBiblios->getInternalIterator()->rewind();
                    return $collBiblios;
                }

                if($partial && $this->collBiblios) {
                    foreach($this->collBiblios as $obj) {
                        if($obj->isNew()) {
                            $collBiblios[] = $obj;
                        }
                    }
                }

                $this->collBiblios = $collBiblios;
                $this->collBibliosPartial = false;
            }
        }

        return $this->collBiblios;
    }

    /**
     * Sets a collection of Biblio objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $biblios A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Negara The current object (for fluent API support)
     */
    public function setBiblios(PropelCollection $biblios, PropelPDO $con = null)
    {
        $bibliosToDelete = $this->getBiblios(new Criteria(), $con)->diff($biblios);

        $this->bibliosScheduledForDeletion = unserialize(serialize($bibliosToDelete));

        foreach ($bibliosToDelete as $biblioRemoved) {
            $biblioRemoved->setNegara(null);
        }

        $this->collBiblios = null;
        foreach ($biblios as $biblio) {
            $this->addBiblio($biblio);
        }

        $this->collBiblios = $biblios;
        $this->collBibliosPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Biblio objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Biblio objects.
     * @throws PropelException
     */
    public function countBiblios(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collBibliosPartial && !$this->isNew();
        if (null === $this->collBiblios || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collBiblios) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getBiblios());
            }
            $query = BiblioQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByNegara($this)
                ->count($con);
        }

        return count($this->collBiblios);
    }

    /**
     * Method called to associate a Biblio object to this object
     * through the Biblio foreign key attribute.
     *
     * @param    Biblio $l Biblio
     * @return Negara The current object (for fluent API support)
     */
    public function addBiblio(Biblio $l)
    {
        if ($this->collBiblios === null) {
            $this->initBiblios();
            $this->collBibliosPartial = true;
        }
        if (!in_array($l, $this->collBiblios->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddBiblio($l);
        }

        return $this;
    }

    /**
     * @param	Biblio $biblio The biblio object to add.
     */
    protected function doAddBiblio($biblio)
    {
        $this->collBiblios[]= $biblio;
        $biblio->setNegara($this);
    }

    /**
     * @param	Biblio $biblio The biblio object to remove.
     * @return Negara The current object (for fluent API support)
     */
    public function removeBiblio($biblio)
    {
        if ($this->getBiblios()->contains($biblio)) {
            $this->collBiblios->remove($this->collBiblios->search($biblio));
            if (null === $this->bibliosScheduledForDeletion) {
                $this->bibliosScheduledForDeletion = clone $this->collBiblios;
                $this->bibliosScheduledForDeletion->clear();
            }
            $this->bibliosScheduledForDeletion[]= clone $biblio;
            $biblio->setNegara(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Negara is new, it will return
     * an empty collection; or if this Negara has previously
     * been saved, it will retrieve related Biblios from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Negara.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Biblio[] List of Biblio objects
     */
    public function getBibliosJoinClassifications($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = BiblioQuery::create(null, $criteria);
        $query->joinWith('Classifications', $join_behavior);

        return $this->getBiblios($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Negara is new, it will return
     * an empty collection; or if this Negara has previously
     * been saved, it will retrieve related Biblios from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Negara.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Biblio[] List of Biblio objects
     */
    public function getBibliosJoinFrequency($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = BiblioQuery::create(null, $criteria);
        $query->joinWith('Frequency', $join_behavior);

        return $this->getBiblios($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Negara is new, it will return
     * an empty collection; or if this Negara has previously
     * been saved, it will retrieve related Biblios from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Negara.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Biblio[] List of Biblio objects
     */
    public function getBibliosJoinGmd($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = BiblioQuery::create(null, $criteria);
        $query->joinWith('Gmd', $join_behavior);

        return $this->getBiblios($query, $con);
    }

    /**
     * Clears out the collMstWilayahs collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Negara The current object (for fluent API support)
     * @see        addMstWilayahs()
     */
    public function clearMstWilayahs()
    {
        $this->collMstWilayahs = null; // important to set this to null since that means it is uninitialized
        $this->collMstWilayahsPartial = null;

        return $this;
    }

    /**
     * reset is the collMstWilayahs collection loaded partially
     *
     * @return void
     */
    public function resetPartialMstWilayahs($v = true)
    {
        $this->collMstWilayahsPartial = $v;
    }

    /**
     * Initializes the collMstWilayahs collection.
     *
     * By default this just sets the collMstWilayahs collection to an empty array (like clearcollMstWilayahs());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initMstWilayahs($overrideExisting = true)
    {
        if (null !== $this->collMstWilayahs && !$overrideExisting) {
            return;
        }
        $this->collMstWilayahs = new PropelObjectCollection();
        $this->collMstWilayahs->setModel('MstWilayah');
    }

    /**
     * Gets an array of MstWilayah objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Negara is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|MstWilayah[] List of MstWilayah objects
     * @throws PropelException
     */
    public function getMstWilayahs($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collMstWilayahsPartial && !$this->isNew();
        if (null === $this->collMstWilayahs || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collMstWilayahs) {
                // return empty collection
                $this->initMstWilayahs();
            } else {
                $collMstWilayahs = MstWilayahQuery::create(null, $criteria)
                    ->filterByNegara($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collMstWilayahsPartial && count($collMstWilayahs)) {
                      $this->initMstWilayahs(false);

                      foreach($collMstWilayahs as $obj) {
                        if (false == $this->collMstWilayahs->contains($obj)) {
                          $this->collMstWilayahs->append($obj);
                        }
                      }

                      $this->collMstWilayahsPartial = true;
                    }

                    $collMstWilayahs->getInternalIterator()->rewind();
                    return $collMstWilayahs;
                }

                if($partial && $this->collMstWilayahs) {
                    foreach($this->collMstWilayahs as $obj) {
                        if($obj->isNew()) {
                            $collMstWilayahs[] = $obj;
                        }
                    }
                }

                $this->collMstWilayahs = $collMstWilayahs;
                $this->collMstWilayahsPartial = false;
            }
        }

        return $this->collMstWilayahs;
    }

    /**
     * Sets a collection of MstWilayah objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $mstWilayahs A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Negara The current object (for fluent API support)
     */
    public function setMstWilayahs(PropelCollection $mstWilayahs, PropelPDO $con = null)
    {
        $mstWilayahsToDelete = $this->getMstWilayahs(new Criteria(), $con)->diff($mstWilayahs);

        $this->mstWilayahsScheduledForDeletion = unserialize(serialize($mstWilayahsToDelete));

        foreach ($mstWilayahsToDelete as $mstWilayahRemoved) {
            $mstWilayahRemoved->setNegara(null);
        }

        $this->collMstWilayahs = null;
        foreach ($mstWilayahs as $mstWilayah) {
            $this->addMstWilayah($mstWilayah);
        }

        $this->collMstWilayahs = $mstWilayahs;
        $this->collMstWilayahsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related MstWilayah objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related MstWilayah objects.
     * @throws PropelException
     */
    public function countMstWilayahs(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collMstWilayahsPartial && !$this->isNew();
        if (null === $this->collMstWilayahs || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collMstWilayahs) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getMstWilayahs());
            }
            $query = MstWilayahQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByNegara($this)
                ->count($con);
        }

        return count($this->collMstWilayahs);
    }

    /**
     * Method called to associate a MstWilayah object to this object
     * through the MstWilayah foreign key attribute.
     *
     * @param    MstWilayah $l MstWilayah
     * @return Negara The current object (for fluent API support)
     */
    public function addMstWilayah(MstWilayah $l)
    {
        if ($this->collMstWilayahs === null) {
            $this->initMstWilayahs();
            $this->collMstWilayahsPartial = true;
        }
        if (!in_array($l, $this->collMstWilayahs->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddMstWilayah($l);
        }

        return $this;
    }

    /**
     * @param	MstWilayah $mstWilayah The mstWilayah object to add.
     */
    protected function doAddMstWilayah($mstWilayah)
    {
        $this->collMstWilayahs[]= $mstWilayah;
        $mstWilayah->setNegara($this);
    }

    /**
     * @param	MstWilayah $mstWilayah The mstWilayah object to remove.
     * @return Negara The current object (for fluent API support)
     */
    public function removeMstWilayah($mstWilayah)
    {
        if ($this->getMstWilayahs()->contains($mstWilayah)) {
            $this->collMstWilayahs->remove($this->collMstWilayahs->search($mstWilayah));
            if (null === $this->mstWilayahsScheduledForDeletion) {
                $this->mstWilayahsScheduledForDeletion = clone $this->collMstWilayahs;
                $this->mstWilayahsScheduledForDeletion->clear();
            }
            $this->mstWilayahsScheduledForDeletion[]= clone $mstWilayah;
            $mstWilayah->setNegara(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Negara is new, it will return
     * an empty collection; or if this Negara has previously
     * been saved, it will retrieve related MstWilayahs from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Negara.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|MstWilayah[] List of MstWilayah objects
     */
    public function getMstWilayahsJoinKategoriDesa($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = MstWilayahQuery::create(null, $criteria);
        $query->joinWith('KategoriDesa', $join_behavior);

        return $this->getMstWilayahs($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Negara is new, it will return
     * an empty collection; or if this Negara has previously
     * been saved, it will retrieve related MstWilayahs from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Negara.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|MstWilayah[] List of MstWilayah objects
     */
    public function getMstWilayahsJoinLevelWilayah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = MstWilayahQuery::create(null, $criteria);
        $query->joinWith('LevelWilayah', $join_behavior);

        return $this->getMstWilayahs($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Negara is new, it will return
     * an empty collection; or if this Negara has previously
     * been saved, it will retrieve related MstWilayahs from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Negara.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|MstWilayah[] List of MstWilayah objects
     */
    public function getMstWilayahsJoinMstWilayahRelatedByMstKodeWilayah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = MstWilayahQuery::create(null, $criteria);
        $query->joinWith('MstWilayahRelatedByMstKodeWilayah', $join_behavior);

        return $this->getMstWilayahs($query, $con);
    }

    /**
     * Clears out the collPesertaDidiks collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Negara The current object (for fluent API support)
     * @see        addPesertaDidiks()
     */
    public function clearPesertaDidiks()
    {
        $this->collPesertaDidiks = null; // important to set this to null since that means it is uninitialized
        $this->collPesertaDidiksPartial = null;

        return $this;
    }

    /**
     * reset is the collPesertaDidiks collection loaded partially
     *
     * @return void
     */
    public function resetPartialPesertaDidiks($v = true)
    {
        $this->collPesertaDidiksPartial = $v;
    }

    /**
     * Initializes the collPesertaDidiks collection.
     *
     * By default this just sets the collPesertaDidiks collection to an empty array (like clearcollPesertaDidiks());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPesertaDidiks($overrideExisting = true)
    {
        if (null !== $this->collPesertaDidiks && !$overrideExisting) {
            return;
        }
        $this->collPesertaDidiks = new PropelObjectCollection();
        $this->collPesertaDidiks->setModel('PesertaDidik');
    }

    /**
     * Gets an array of PesertaDidik objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Negara is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     * @throws PropelException
     */
    public function getPesertaDidiks($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collPesertaDidiksPartial && !$this->isNew();
        if (null === $this->collPesertaDidiks || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collPesertaDidiks) {
                // return empty collection
                $this->initPesertaDidiks();
            } else {
                $collPesertaDidiks = PesertaDidikQuery::create(null, $criteria)
                    ->filterByNegara($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collPesertaDidiksPartial && count($collPesertaDidiks)) {
                      $this->initPesertaDidiks(false);

                      foreach($collPesertaDidiks as $obj) {
                        if (false == $this->collPesertaDidiks->contains($obj)) {
                          $this->collPesertaDidiks->append($obj);
                        }
                      }

                      $this->collPesertaDidiksPartial = true;
                    }

                    $collPesertaDidiks->getInternalIterator()->rewind();
                    return $collPesertaDidiks;
                }

                if($partial && $this->collPesertaDidiks) {
                    foreach($this->collPesertaDidiks as $obj) {
                        if($obj->isNew()) {
                            $collPesertaDidiks[] = $obj;
                        }
                    }
                }

                $this->collPesertaDidiks = $collPesertaDidiks;
                $this->collPesertaDidiksPartial = false;
            }
        }

        return $this->collPesertaDidiks;
    }

    /**
     * Sets a collection of PesertaDidik objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $pesertaDidiks A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Negara The current object (for fluent API support)
     */
    public function setPesertaDidiks(PropelCollection $pesertaDidiks, PropelPDO $con = null)
    {
        $pesertaDidiksToDelete = $this->getPesertaDidiks(new Criteria(), $con)->diff($pesertaDidiks);

        $this->pesertaDidiksScheduledForDeletion = unserialize(serialize($pesertaDidiksToDelete));

        foreach ($pesertaDidiksToDelete as $pesertaDidikRemoved) {
            $pesertaDidikRemoved->setNegara(null);
        }

        $this->collPesertaDidiks = null;
        foreach ($pesertaDidiks as $pesertaDidik) {
            $this->addPesertaDidik($pesertaDidik);
        }

        $this->collPesertaDidiks = $pesertaDidiks;
        $this->collPesertaDidiksPartial = false;

        return $this;
    }

    /**
     * Returns the number of related PesertaDidik objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related PesertaDidik objects.
     * @throws PropelException
     */
    public function countPesertaDidiks(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collPesertaDidiksPartial && !$this->isNew();
        if (null === $this->collPesertaDidiks || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPesertaDidiks) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getPesertaDidiks());
            }
            $query = PesertaDidikQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByNegara($this)
                ->count($con);
        }

        return count($this->collPesertaDidiks);
    }

    /**
     * Method called to associate a PesertaDidik object to this object
     * through the PesertaDidik foreign key attribute.
     *
     * @param    PesertaDidik $l PesertaDidik
     * @return Negara The current object (for fluent API support)
     */
    public function addPesertaDidik(PesertaDidik $l)
    {
        if ($this->collPesertaDidiks === null) {
            $this->initPesertaDidiks();
            $this->collPesertaDidiksPartial = true;
        }
        if (!in_array($l, $this->collPesertaDidiks->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddPesertaDidik($l);
        }

        return $this;
    }

    /**
     * @param	PesertaDidik $pesertaDidik The pesertaDidik object to add.
     */
    protected function doAddPesertaDidik($pesertaDidik)
    {
        $this->collPesertaDidiks[]= $pesertaDidik;
        $pesertaDidik->setNegara($this);
    }

    /**
     * @param	PesertaDidik $pesertaDidik The pesertaDidik object to remove.
     * @return Negara The current object (for fluent API support)
     */
    public function removePesertaDidik($pesertaDidik)
    {
        if ($this->getPesertaDidiks()->contains($pesertaDidik)) {
            $this->collPesertaDidiks->remove($this->collPesertaDidiks->search($pesertaDidik));
            if (null === $this->pesertaDidiksScheduledForDeletion) {
                $this->pesertaDidiksScheduledForDeletion = clone $this->collPesertaDidiks;
                $this->pesertaDidiksScheduledForDeletion->clear();
            }
            $this->pesertaDidiksScheduledForDeletion[]= clone $pesertaDidik;
            $pesertaDidik->setNegara(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Negara is new, it will return
     * an empty collection; or if this Negara has previously
     * been saved, it will retrieve related PesertaDidiks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Negara.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksJoinKebutuhanKhususRelatedByKebutuhanKhususIdAyah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('KebutuhanKhususRelatedByKebutuhanKhususIdAyah', $join_behavior);

        return $this->getPesertaDidiks($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Negara is new, it will return
     * an empty collection; or if this Negara has previously
     * been saved, it will retrieve related PesertaDidiks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Negara.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksJoinKebutuhanKhususRelatedByKebutuhanKhususIdIbu($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('KebutuhanKhususRelatedByKebutuhanKhususIdIbu', $join_behavior);

        return $this->getPesertaDidiks($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Negara is new, it will return
     * an empty collection; or if this Negara has previously
     * been saved, it will retrieve related PesertaDidiks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Negara.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksJoinAlasanLayakPip($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('AlasanLayakPip', $join_behavior);

        return $this->getPesertaDidiks($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Negara is new, it will return
     * an empty collection; or if this Negara has previously
     * been saved, it will retrieve related PesertaDidiks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Negara.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksJoinBank($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('Bank', $join_behavior);

        return $this->getPesertaDidiks($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Negara is new, it will return
     * an empty collection; or if this Negara has previously
     * been saved, it will retrieve related PesertaDidiks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Negara.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksJoinMstWilayah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('MstWilayah', $join_behavior);

        return $this->getPesertaDidiks($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Negara is new, it will return
     * an empty collection; or if this Negara has previously
     * been saved, it will retrieve related PesertaDidiks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Negara.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksJoinKebutuhanKhususRelatedByKebutuhanKhususId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('KebutuhanKhususRelatedByKebutuhanKhususId', $join_behavior);

        return $this->getPesertaDidiks($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Negara is new, it will return
     * an empty collection; or if this Negara has previously
     * been saved, it will retrieve related PesertaDidiks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Negara.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksJoinPekerjaanRelatedByPekerjaanId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('PekerjaanRelatedByPekerjaanId', $join_behavior);

        return $this->getPesertaDidiks($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Negara is new, it will return
     * an empty collection; or if this Negara has previously
     * been saved, it will retrieve related PesertaDidiks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Negara.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksJoinAgama($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('Agama', $join_behavior);

        return $this->getPesertaDidiks($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Negara is new, it will return
     * an empty collection; or if this Negara has previously
     * been saved, it will retrieve related PesertaDidiks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Negara.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksJoinPenghasilanRelatedByPenghasilanIdAyah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('PenghasilanRelatedByPenghasilanIdAyah', $join_behavior);

        return $this->getPesertaDidiks($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Negara is new, it will return
     * an empty collection; or if this Negara has previously
     * been saved, it will retrieve related PesertaDidiks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Negara.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksJoinJenisTinggal($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('JenisTinggal', $join_behavior);

        return $this->getPesertaDidiks($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Negara is new, it will return
     * an empty collection; or if this Negara has previously
     * been saved, it will retrieve related PesertaDidiks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Negara.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksJoinAlatTransportasi($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('AlatTransportasi', $join_behavior);

        return $this->getPesertaDidiks($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Negara is new, it will return
     * an empty collection; or if this Negara has previously
     * been saved, it will retrieve related PesertaDidiks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Negara.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksJoinPekerjaanRelatedByPekerjaanIdAyah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('PekerjaanRelatedByPekerjaanIdAyah', $join_behavior);

        return $this->getPesertaDidiks($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Negara is new, it will return
     * an empty collection; or if this Negara has previously
     * been saved, it will retrieve related PesertaDidiks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Negara.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksJoinJenjangPendidikanRelatedByJenjangPendidikanIbu($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('JenjangPendidikanRelatedByJenjangPendidikanIbu', $join_behavior);

        return $this->getPesertaDidiks($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Negara is new, it will return
     * an empty collection; or if this Negara has previously
     * been saved, it will retrieve related PesertaDidiks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Negara.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksJoinPenghasilanRelatedByPenghasilanIdWali($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('PenghasilanRelatedByPenghasilanIdWali', $join_behavior);

        return $this->getPesertaDidiks($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Negara is new, it will return
     * an empty collection; or if this Negara has previously
     * been saved, it will retrieve related PesertaDidiks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Negara.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksJoinPekerjaanRelatedByPekerjaanIdIbu($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('PekerjaanRelatedByPekerjaanIdIbu', $join_behavior);

        return $this->getPesertaDidiks($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Negara is new, it will return
     * an empty collection; or if this Negara has previously
     * been saved, it will retrieve related PesertaDidiks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Negara.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksJoinJenjangPendidikanRelatedByJenjangPendidikanAyah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('JenjangPendidikanRelatedByJenjangPendidikanAyah', $join_behavior);

        return $this->getPesertaDidiks($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Negara is new, it will return
     * an empty collection; or if this Negara has previously
     * been saved, it will retrieve related PesertaDidiks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Negara.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksJoinPenghasilanRelatedByPenghasilanIdIbu($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('PenghasilanRelatedByPenghasilanIdIbu', $join_behavior);

        return $this->getPesertaDidiks($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Negara is new, it will return
     * an empty collection; or if this Negara has previously
     * been saved, it will retrieve related PesertaDidiks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Negara.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksJoinPekerjaanRelatedByPekerjaanIdWali($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('PekerjaanRelatedByPekerjaanIdWali', $join_behavior);

        return $this->getPesertaDidiks($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Negara is new, it will return
     * an empty collection; or if this Negara has previously
     * been saved, it will retrieve related PesertaDidiks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Negara.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksJoinJenjangPendidikanRelatedByJenjangPendidikanWali($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('JenjangPendidikanRelatedByJenjangPendidikanWali', $join_behavior);

        return $this->getPesertaDidiks($query, $con);
    }

    /**
     * Clears out the collPtks collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Negara The current object (for fluent API support)
     * @see        addPtks()
     */
    public function clearPtks()
    {
        $this->collPtks = null; // important to set this to null since that means it is uninitialized
        $this->collPtksPartial = null;

        return $this;
    }

    /**
     * reset is the collPtks collection loaded partially
     *
     * @return void
     */
    public function resetPartialPtks($v = true)
    {
        $this->collPtksPartial = $v;
    }

    /**
     * Initializes the collPtks collection.
     *
     * By default this just sets the collPtks collection to an empty array (like clearcollPtks());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPtks($overrideExisting = true)
    {
        if (null !== $this->collPtks && !$overrideExisting) {
            return;
        }
        $this->collPtks = new PropelObjectCollection();
        $this->collPtks->setModel('Ptk');
    }

    /**
     * Gets an array of Ptk objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Negara is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Ptk[] List of Ptk objects
     * @throws PropelException
     */
    public function getPtks($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collPtksPartial && !$this->isNew();
        if (null === $this->collPtks || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collPtks) {
                // return empty collection
                $this->initPtks();
            } else {
                $collPtks = PtkQuery::create(null, $criteria)
                    ->filterByNegara($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collPtksPartial && count($collPtks)) {
                      $this->initPtks(false);

                      foreach($collPtks as $obj) {
                        if (false == $this->collPtks->contains($obj)) {
                          $this->collPtks->append($obj);
                        }
                      }

                      $this->collPtksPartial = true;
                    }

                    $collPtks->getInternalIterator()->rewind();
                    return $collPtks;
                }

                if($partial && $this->collPtks) {
                    foreach($this->collPtks as $obj) {
                        if($obj->isNew()) {
                            $collPtks[] = $obj;
                        }
                    }
                }

                $this->collPtks = $collPtks;
                $this->collPtksPartial = false;
            }
        }

        return $this->collPtks;
    }

    /**
     * Sets a collection of Ptk objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $ptks A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Negara The current object (for fluent API support)
     */
    public function setPtks(PropelCollection $ptks, PropelPDO $con = null)
    {
        $ptksToDelete = $this->getPtks(new Criteria(), $con)->diff($ptks);

        $this->ptksScheduledForDeletion = unserialize(serialize($ptksToDelete));

        foreach ($ptksToDelete as $ptkRemoved) {
            $ptkRemoved->setNegara(null);
        }

        $this->collPtks = null;
        foreach ($ptks as $ptk) {
            $this->addPtk($ptk);
        }

        $this->collPtks = $ptks;
        $this->collPtksPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Ptk objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Ptk objects.
     * @throws PropelException
     */
    public function countPtks(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collPtksPartial && !$this->isNew();
        if (null === $this->collPtks || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPtks) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getPtks());
            }
            $query = PtkQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByNegara($this)
                ->count($con);
        }

        return count($this->collPtks);
    }

    /**
     * Method called to associate a Ptk object to this object
     * through the Ptk foreign key attribute.
     *
     * @param    Ptk $l Ptk
     * @return Negara The current object (for fluent API support)
     */
    public function addPtk(Ptk $l)
    {
        if ($this->collPtks === null) {
            $this->initPtks();
            $this->collPtksPartial = true;
        }
        if (!in_array($l, $this->collPtks->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddPtk($l);
        }

        return $this;
    }

    /**
     * @param	Ptk $ptk The ptk object to add.
     */
    protected function doAddPtk($ptk)
    {
        $this->collPtks[]= $ptk;
        $ptk->setNegara($this);
    }

    /**
     * @param	Ptk $ptk The ptk object to remove.
     * @return Negara The current object (for fluent API support)
     */
    public function removePtk($ptk)
    {
        if ($this->getPtks()->contains($ptk)) {
            $this->collPtks->remove($this->collPtks->search($ptk));
            if (null === $this->ptksScheduledForDeletion) {
                $this->ptksScheduledForDeletion = clone $this->collPtks;
                $this->ptksScheduledForDeletion->clear();
            }
            $this->ptksScheduledForDeletion[]= clone $ptk;
            $ptk->setNegara(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Negara is new, it will return
     * an empty collection; or if this Negara has previously
     * been saved, it will retrieve related Ptks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Negara.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Ptk[] List of Ptk objects
     */
    public function getPtksJoinBank($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PtkQuery::create(null, $criteria);
        $query->joinWith('Bank', $join_behavior);

        return $this->getPtks($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Negara is new, it will return
     * an empty collection; or if this Negara has previously
     * been saved, it will retrieve related Ptks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Negara.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Ptk[] List of Ptk objects
     */
    public function getPtksJoinLargeObject($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PtkQuery::create(null, $criteria);
        $query->joinWith('LargeObject', $join_behavior);

        return $this->getPtks($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Negara is new, it will return
     * an empty collection; or if this Negara has previously
     * been saved, it will retrieve related Ptks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Negara.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Ptk[] List of Ptk objects
     */
    public function getPtksJoinJenisPtk($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PtkQuery::create(null, $criteria);
        $query->joinWith('JenisPtk', $join_behavior);

        return $this->getPtks($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Negara is new, it will return
     * an empty collection; or if this Negara has previously
     * been saved, it will retrieve related Ptks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Negara.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Ptk[] List of Ptk objects
     */
    public function getPtksJoinMstWilayah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PtkQuery::create(null, $criteria);
        $query->joinWith('MstWilayah', $join_behavior);

        return $this->getPtks($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Negara is new, it will return
     * an empty collection; or if this Negara has previously
     * been saved, it will retrieve related Ptks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Negara.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Ptk[] List of Ptk objects
     */
    public function getPtksJoinKebutuhanKhusus($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PtkQuery::create(null, $criteria);
        $query->joinWith('KebutuhanKhusus', $join_behavior);

        return $this->getPtks($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Negara is new, it will return
     * an empty collection; or if this Negara has previously
     * been saved, it will retrieve related Ptks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Negara.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Ptk[] List of Ptk objects
     */
    public function getPtksJoinLembagaPengangkat($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PtkQuery::create(null, $criteria);
        $query->joinWith('LembagaPengangkat', $join_behavior);

        return $this->getPtks($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Negara is new, it will return
     * an empty collection; or if this Negara has previously
     * been saved, it will retrieve related Ptks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Negara.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Ptk[] List of Ptk objects
     */
    public function getPtksJoinStatusKeaktifanPegawai($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PtkQuery::create(null, $criteria);
        $query->joinWith('StatusKeaktifanPegawai', $join_behavior);

        return $this->getPtks($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Negara is new, it will return
     * an empty collection; or if this Negara has previously
     * been saved, it will retrieve related Ptks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Negara.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Ptk[] List of Ptk objects
     */
    public function getPtksJoinSumberGaji($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PtkQuery::create(null, $criteria);
        $query->joinWith('SumberGaji', $join_behavior);

        return $this->getPtks($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Negara is new, it will return
     * an empty collection; or if this Negara has previously
     * been saved, it will retrieve related Ptks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Negara.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Ptk[] List of Ptk objects
     */
    public function getPtksJoinPangkatGolongan($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PtkQuery::create(null, $criteria);
        $query->joinWith('PangkatGolongan', $join_behavior);

        return $this->getPtks($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Negara is new, it will return
     * an empty collection; or if this Negara has previously
     * been saved, it will retrieve related Ptks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Negara.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Ptk[] List of Ptk objects
     */
    public function getPtksJoinBidangStudi($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PtkQuery::create(null, $criteria);
        $query->joinWith('BidangStudi', $join_behavior);

        return $this->getPtks($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Negara is new, it will return
     * an empty collection; or if this Negara has previously
     * been saved, it will retrieve related Ptks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Negara.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Ptk[] List of Ptk objects
     */
    public function getPtksJoinKeahlianLaboratorium($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PtkQuery::create(null, $criteria);
        $query->joinWith('KeahlianLaboratorium', $join_behavior);

        return $this->getPtks($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Negara is new, it will return
     * an empty collection; or if this Negara has previously
     * been saved, it will retrieve related Ptks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Negara.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Ptk[] List of Ptk objects
     */
    public function getPtksJoinPekerjaan($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PtkQuery::create(null, $criteria);
        $query->joinWith('Pekerjaan', $join_behavior);

        return $this->getPtks($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Negara is new, it will return
     * an empty collection; or if this Negara has previously
     * been saved, it will retrieve related Ptks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Negara.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Ptk[] List of Ptk objects
     */
    public function getPtksJoinAgama($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PtkQuery::create(null, $criteria);
        $query->joinWith('Agama', $join_behavior);

        return $this->getPtks($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Negara is new, it will return
     * an empty collection; or if this Negara has previously
     * been saved, it will retrieve related Ptks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Negara.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Ptk[] List of Ptk objects
     */
    public function getPtksJoinStatusKepegawaian($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PtkQuery::create(null, $criteria);
        $query->joinWith('StatusKepegawaian', $join_behavior);

        return $this->getPtks($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->negara_id = null;
        $this->nama = null;
        $this->luar_negeri = null;
        $this->create_date = null;
        $this->last_update = null;
        $this->expired_date = null;
        $this->last_sync = null;
        $this->alreadyInSave = false;
        $this->alreadyInValidation = false;
        $this->alreadyInClearAllReferencesDeep = false;
        $this->clearAllReferences();
        $this->applyDefaultValues();
        $this->resetModified();
        $this->setNew(true);
        $this->setDeleted(false);
    }

    /**
     * Resets all references to other model objects or collections of model objects.
     *
     * This method is a user-space workaround for PHP's inability to garbage collect
     * objects with circular references (even in PHP 5.3). This is currently necessary
     * when using Propel in certain daemon or large-volumne/high-memory operations.
     *
     * @param boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep && !$this->alreadyInClearAllReferencesDeep) {
            $this->alreadyInClearAllReferencesDeep = true;
            if ($this->collBiblios) {
                foreach ($this->collBiblios as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collMstWilayahs) {
                foreach ($this->collMstWilayahs as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collPesertaDidiks) {
                foreach ($this->collPesertaDidiks as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collPtks) {
                foreach ($this->collPtks as $o) {
                    $o->clearAllReferences($deep);
                }
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collBiblios instanceof PropelCollection) {
            $this->collBiblios->clearIterator();
        }
        $this->collBiblios = null;
        if ($this->collMstWilayahs instanceof PropelCollection) {
            $this->collMstWilayahs->clearIterator();
        }
        $this->collMstWilayahs = null;
        if ($this->collPesertaDidiks instanceof PropelCollection) {
            $this->collPesertaDidiks->clearIterator();
        }
        $this->collPesertaDidiks = null;
        if ($this->collPtks instanceof PropelCollection) {
            $this->collPtks->clearIterator();
        }
        $this->collPtks = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(NegaraPeer::DEFAULT_STRING_FORMAT);
    }

    /**
     * return true is the object is in saving state
     *
     * @return boolean
     */
    public function isAlreadyInSave()
    {
        return $this->alreadyInSave;
    }

}
