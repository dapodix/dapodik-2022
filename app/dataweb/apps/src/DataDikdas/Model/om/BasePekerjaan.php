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
use DataDikdas\Model\Pekerjaan;
use DataDikdas\Model\PekerjaanPeer;
use DataDikdas\Model\PekerjaanQuery;
use DataDikdas\Model\PesertaDidik;
use DataDikdas\Model\PesertaDidikQuery;
use DataDikdas\Model\Ptk;
use DataDikdas\Model\PtkQuery;
use DataDikdas\Model\TracerLulusan;
use DataDikdas\Model\TracerLulusanQuery;

/**
 * Base class that represents a row from the 'ref.pekerjaan' table.
 *
 * 
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BasePekerjaan extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'DataDikdas\\Model\\PekerjaanPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        PekerjaanPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the pekerjaan_id field.
     * @var        int
     */
    protected $pekerjaan_id;

    /**
     * The value for the nama field.
     * @var        string
     */
    protected $nama;

    /**
     * The value for the a_wirausaha field.
     * Note: this column has a database default value of: '0'
     * @var        string
     */
    protected $a_wirausaha;

    /**
     * The value for the a_pejabat_publik field.
     * Note: this column has a database default value of: '0'
     * @var        string
     */
    protected $a_pejabat_publik;

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
     * @var        PropelObjectCollection|PesertaDidik[] Collection to store aggregation of PesertaDidik objects.
     */
    protected $collPesertaDidiksRelatedByPekerjaanId;
    protected $collPesertaDidiksRelatedByPekerjaanIdPartial;

    /**
     * @var        PropelObjectCollection|PesertaDidik[] Collection to store aggregation of PesertaDidik objects.
     */
    protected $collPesertaDidiksRelatedByPekerjaanIdAyah;
    protected $collPesertaDidiksRelatedByPekerjaanIdAyahPartial;

    /**
     * @var        PropelObjectCollection|PesertaDidik[] Collection to store aggregation of PesertaDidik objects.
     */
    protected $collPesertaDidiksRelatedByPekerjaanIdIbu;
    protected $collPesertaDidiksRelatedByPekerjaanIdIbuPartial;

    /**
     * @var        PropelObjectCollection|PesertaDidik[] Collection to store aggregation of PesertaDidik objects.
     */
    protected $collPesertaDidiksRelatedByPekerjaanIdWali;
    protected $collPesertaDidiksRelatedByPekerjaanIdWaliPartial;

    /**
     * @var        PropelObjectCollection|Ptk[] Collection to store aggregation of Ptk objects.
     */
    protected $collPtks;
    protected $collPtksPartial;

    /**
     * @var        PropelObjectCollection|TracerLulusan[] Collection to store aggregation of TracerLulusan objects.
     */
    protected $collTracerLulusans;
    protected $collTracerLulusansPartial;

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
    protected $pesertaDidiksRelatedByPekerjaanIdScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $pesertaDidiksRelatedByPekerjaanIdAyahScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $pesertaDidiksRelatedByPekerjaanIdIbuScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $pesertaDidiksRelatedByPekerjaanIdWaliScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $ptksScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $tracerLulusansScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->a_wirausaha = '0';
        $this->a_pejabat_publik = '0';
        $this->last_sync = '1901-01-01 00:00:00';
    }

    /**
     * Initializes internal state of BasePekerjaan object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [pekerjaan_id] column value.
     * 
     * @return int
     */
    public function getPekerjaanId()
    {
        return $this->pekerjaan_id;
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
     * Get the [a_wirausaha] column value.
     * 
     * @return string
     */
    public function getAWirausaha()
    {
        return $this->a_wirausaha;
    }

    /**
     * Get the [a_pejabat_publik] column value.
     * 
     * @return string
     */
    public function getAPejabatPublik()
    {
        return $this->a_pejabat_publik;
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
     * Set the value of [pekerjaan_id] column.
     * 
     * @param int $v new value
     * @return Pekerjaan The current object (for fluent API support)
     */
    public function setPekerjaanId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->pekerjaan_id !== $v) {
            $this->pekerjaan_id = $v;
            $this->modifiedColumns[] = PekerjaanPeer::PEKERJAAN_ID;
        }


        return $this;
    } // setPekerjaanId()

    /**
     * Set the value of [nama] column.
     * 
     * @param string $v new value
     * @return Pekerjaan The current object (for fluent API support)
     */
    public function setNama($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nama !== $v) {
            $this->nama = $v;
            $this->modifiedColumns[] = PekerjaanPeer::NAMA;
        }


        return $this;
    } // setNama()

    /**
     * Set the value of [a_wirausaha] column.
     * 
     * @param string $v new value
     * @return Pekerjaan The current object (for fluent API support)
     */
    public function setAWirausaha($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->a_wirausaha !== $v) {
            $this->a_wirausaha = $v;
            $this->modifiedColumns[] = PekerjaanPeer::A_WIRAUSAHA;
        }


        return $this;
    } // setAWirausaha()

    /**
     * Set the value of [a_pejabat_publik] column.
     * 
     * @param string $v new value
     * @return Pekerjaan The current object (for fluent API support)
     */
    public function setAPejabatPublik($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->a_pejabat_publik !== $v) {
            $this->a_pejabat_publik = $v;
            $this->modifiedColumns[] = PekerjaanPeer::A_PEJABAT_PUBLIK;
        }


        return $this;
    } // setAPejabatPublik()

    /**
     * Sets the value of [create_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Pekerjaan The current object (for fluent API support)
     */
    public function setCreateDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->create_date !== null || $dt !== null) {
            $currentDateAsString = ($this->create_date !== null && $tmpDt = new DateTime($this->create_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->create_date = $newDateAsString;
                $this->modifiedColumns[] = PekerjaanPeer::CREATE_DATE;
            }
        } // if either are not null


        return $this;
    } // setCreateDate()

    /**
     * Sets the value of [last_update] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Pekerjaan The current object (for fluent API support)
     */
    public function setLastUpdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->last_update !== null || $dt !== null) {
            $currentDateAsString = ($this->last_update !== null && $tmpDt = new DateTime($this->last_update)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->last_update = $newDateAsString;
                $this->modifiedColumns[] = PekerjaanPeer::LAST_UPDATE;
            }
        } // if either are not null


        return $this;
    } // setLastUpdate()

    /**
     * Sets the value of [expired_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Pekerjaan The current object (for fluent API support)
     */
    public function setExpiredDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->expired_date !== null || $dt !== null) {
            $currentDateAsString = ($this->expired_date !== null && $tmpDt = new DateTime($this->expired_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->expired_date = $newDateAsString;
                $this->modifiedColumns[] = PekerjaanPeer::EXPIRED_DATE;
            }
        } // if either are not null


        return $this;
    } // setExpiredDate()

    /**
     * Sets the value of [last_sync] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Pekerjaan The current object (for fluent API support)
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
                $this->modifiedColumns[] = PekerjaanPeer::LAST_SYNC;
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
            if ($this->a_wirausaha !== '0') {
                return false;
            }

            if ($this->a_pejabat_publik !== '0') {
                return false;
            }

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

            $this->pekerjaan_id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->nama = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->a_wirausaha = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->a_pejabat_publik = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->create_date = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->last_update = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->expired_date = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->last_sync = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 8; // 8 = PekerjaanPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Pekerjaan object", $e);
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
            $con = Propel::getConnection(PekerjaanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = PekerjaanPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->collPesertaDidiksRelatedByPekerjaanId = null;

            $this->collPesertaDidiksRelatedByPekerjaanIdAyah = null;

            $this->collPesertaDidiksRelatedByPekerjaanIdIbu = null;

            $this->collPesertaDidiksRelatedByPekerjaanIdWali = null;

            $this->collPtks = null;

            $this->collTracerLulusans = null;

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
            $con = Propel::getConnection(PekerjaanPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = PekerjaanQuery::create()
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
            $con = Propel::getConnection(PekerjaanPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                PekerjaanPeer::addInstanceToPool($this);
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

            if ($this->pesertaDidiksRelatedByPekerjaanIdScheduledForDeletion !== null) {
                if (!$this->pesertaDidiksRelatedByPekerjaanIdScheduledForDeletion->isEmpty()) {
                    foreach ($this->pesertaDidiksRelatedByPekerjaanIdScheduledForDeletion as $pesertaDidikRelatedByPekerjaanId) {
                        // need to save related object because we set the relation to null
                        $pesertaDidikRelatedByPekerjaanId->save($con);
                    }
                    $this->pesertaDidiksRelatedByPekerjaanIdScheduledForDeletion = null;
                }
            }

            if ($this->collPesertaDidiksRelatedByPekerjaanId !== null) {
                foreach ($this->collPesertaDidiksRelatedByPekerjaanId as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->pesertaDidiksRelatedByPekerjaanIdAyahScheduledForDeletion !== null) {
                if (!$this->pesertaDidiksRelatedByPekerjaanIdAyahScheduledForDeletion->isEmpty()) {
                    foreach ($this->pesertaDidiksRelatedByPekerjaanIdAyahScheduledForDeletion as $pesertaDidikRelatedByPekerjaanIdAyah) {
                        // need to save related object because we set the relation to null
                        $pesertaDidikRelatedByPekerjaanIdAyah->save($con);
                    }
                    $this->pesertaDidiksRelatedByPekerjaanIdAyahScheduledForDeletion = null;
                }
            }

            if ($this->collPesertaDidiksRelatedByPekerjaanIdAyah !== null) {
                foreach ($this->collPesertaDidiksRelatedByPekerjaanIdAyah as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->pesertaDidiksRelatedByPekerjaanIdIbuScheduledForDeletion !== null) {
                if (!$this->pesertaDidiksRelatedByPekerjaanIdIbuScheduledForDeletion->isEmpty()) {
                    foreach ($this->pesertaDidiksRelatedByPekerjaanIdIbuScheduledForDeletion as $pesertaDidikRelatedByPekerjaanIdIbu) {
                        // need to save related object because we set the relation to null
                        $pesertaDidikRelatedByPekerjaanIdIbu->save($con);
                    }
                    $this->pesertaDidiksRelatedByPekerjaanIdIbuScheduledForDeletion = null;
                }
            }

            if ($this->collPesertaDidiksRelatedByPekerjaanIdIbu !== null) {
                foreach ($this->collPesertaDidiksRelatedByPekerjaanIdIbu as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->pesertaDidiksRelatedByPekerjaanIdWaliScheduledForDeletion !== null) {
                if (!$this->pesertaDidiksRelatedByPekerjaanIdWaliScheduledForDeletion->isEmpty()) {
                    foreach ($this->pesertaDidiksRelatedByPekerjaanIdWaliScheduledForDeletion as $pesertaDidikRelatedByPekerjaanIdWali) {
                        // need to save related object because we set the relation to null
                        $pesertaDidikRelatedByPekerjaanIdWali->save($con);
                    }
                    $this->pesertaDidiksRelatedByPekerjaanIdWaliScheduledForDeletion = null;
                }
            }

            if ($this->collPesertaDidiksRelatedByPekerjaanIdWali !== null) {
                foreach ($this->collPesertaDidiksRelatedByPekerjaanIdWali as $referrerFK) {
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

            if ($this->tracerLulusansScheduledForDeletion !== null) {
                if (!$this->tracerLulusansScheduledForDeletion->isEmpty()) {
                    foreach ($this->tracerLulusansScheduledForDeletion as $tracerLulusan) {
                        // need to save related object because we set the relation to null
                        $tracerLulusan->save($con);
                    }
                    $this->tracerLulusansScheduledForDeletion = null;
                }
            }

            if ($this->collTracerLulusans !== null) {
                foreach ($this->collTracerLulusans as $referrerFK) {
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
        if ($this->isColumnModified(PekerjaanPeer::PEKERJAAN_ID)) {
            $modifiedColumns[':p' . $index++]  = '"pekerjaan_id"';
        }
        if ($this->isColumnModified(PekerjaanPeer::NAMA)) {
            $modifiedColumns[':p' . $index++]  = '"nama"';
        }
        if ($this->isColumnModified(PekerjaanPeer::A_WIRAUSAHA)) {
            $modifiedColumns[':p' . $index++]  = '"a_wirausaha"';
        }
        if ($this->isColumnModified(PekerjaanPeer::A_PEJABAT_PUBLIK)) {
            $modifiedColumns[':p' . $index++]  = '"a_pejabat_publik"';
        }
        if ($this->isColumnModified(PekerjaanPeer::CREATE_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"create_date"';
        }
        if ($this->isColumnModified(PekerjaanPeer::LAST_UPDATE)) {
            $modifiedColumns[':p' . $index++]  = '"last_update"';
        }
        if ($this->isColumnModified(PekerjaanPeer::EXPIRED_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"expired_date"';
        }
        if ($this->isColumnModified(PekerjaanPeer::LAST_SYNC)) {
            $modifiedColumns[':p' . $index++]  = '"last_sync"';
        }

        $sql = sprintf(
            'INSERT INTO "ref"."pekerjaan" (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '"pekerjaan_id"':						
                        $stmt->bindValue($identifier, $this->pekerjaan_id, PDO::PARAM_INT);
                        break;
                    case '"nama"':						
                        $stmt->bindValue($identifier, $this->nama, PDO::PARAM_STR);
                        break;
                    case '"a_wirausaha"':						
                        $stmt->bindValue($identifier, $this->a_wirausaha, PDO::PARAM_STR);
                        break;
                    case '"a_pejabat_publik"':						
                        $stmt->bindValue($identifier, $this->a_pejabat_publik, PDO::PARAM_STR);
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


            if (($retval = PekerjaanPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collPesertaDidiksRelatedByPekerjaanId !== null) {
                    foreach ($this->collPesertaDidiksRelatedByPekerjaanId as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collPesertaDidiksRelatedByPekerjaanIdAyah !== null) {
                    foreach ($this->collPesertaDidiksRelatedByPekerjaanIdAyah as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collPesertaDidiksRelatedByPekerjaanIdIbu !== null) {
                    foreach ($this->collPesertaDidiksRelatedByPekerjaanIdIbu as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collPesertaDidiksRelatedByPekerjaanIdWali !== null) {
                    foreach ($this->collPesertaDidiksRelatedByPekerjaanIdWali as $referrerFK) {
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

                if ($this->collTracerLulusans !== null) {
                    foreach ($this->collTracerLulusans as $referrerFK) {
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
        $pos = PekerjaanPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getPekerjaanId();
                break;
            case 1:
                return $this->getNama();
                break;
            case 2:
                return $this->getAWirausaha();
                break;
            case 3:
                return $this->getAPejabatPublik();
                break;
            case 4:
                return $this->getCreateDate();
                break;
            case 5:
                return $this->getLastUpdate();
                break;
            case 6:
                return $this->getExpiredDate();
                break;
            case 7:
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
        if (isset($alreadyDumpedObjects['Pekerjaan'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Pekerjaan'][$this->getPrimaryKey()] = true;
        $keys = PekerjaanPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getPekerjaanId(),
            $keys[1] => $this->getNama(),
            $keys[2] => $this->getAWirausaha(),
            $keys[3] => $this->getAPejabatPublik(),
            $keys[4] => $this->getCreateDate(),
            $keys[5] => $this->getLastUpdate(),
            $keys[6] => $this->getExpiredDate(),
            $keys[7] => $this->getLastSync(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->collPesertaDidiksRelatedByPekerjaanId) {
                $result['PesertaDidiksRelatedByPekerjaanId'] = $this->collPesertaDidiksRelatedByPekerjaanId->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collPesertaDidiksRelatedByPekerjaanIdAyah) {
                $result['PesertaDidiksRelatedByPekerjaanIdAyah'] = $this->collPesertaDidiksRelatedByPekerjaanIdAyah->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collPesertaDidiksRelatedByPekerjaanIdIbu) {
                $result['PesertaDidiksRelatedByPekerjaanIdIbu'] = $this->collPesertaDidiksRelatedByPekerjaanIdIbu->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collPesertaDidiksRelatedByPekerjaanIdWali) {
                $result['PesertaDidiksRelatedByPekerjaanIdWali'] = $this->collPesertaDidiksRelatedByPekerjaanIdWali->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collPtks) {
                $result['Ptks'] = $this->collPtks->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collTracerLulusans) {
                $result['TracerLulusans'] = $this->collTracerLulusans->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = PekerjaanPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setPekerjaanId($value);
                break;
            case 1:
                $this->setNama($value);
                break;
            case 2:
                $this->setAWirausaha($value);
                break;
            case 3:
                $this->setAPejabatPublik($value);
                break;
            case 4:
                $this->setCreateDate($value);
                break;
            case 5:
                $this->setLastUpdate($value);
                break;
            case 6:
                $this->setExpiredDate($value);
                break;
            case 7:
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
        $keys = PekerjaanPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setPekerjaanId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setNama($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setAWirausaha($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setAPejabatPublik($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setCreateDate($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setLastUpdate($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setExpiredDate($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setLastSync($arr[$keys[7]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(PekerjaanPeer::DATABASE_NAME);

        if ($this->isColumnModified(PekerjaanPeer::PEKERJAAN_ID)) $criteria->add(PekerjaanPeer::PEKERJAAN_ID, $this->pekerjaan_id);
        if ($this->isColumnModified(PekerjaanPeer::NAMA)) $criteria->add(PekerjaanPeer::NAMA, $this->nama);
        if ($this->isColumnModified(PekerjaanPeer::A_WIRAUSAHA)) $criteria->add(PekerjaanPeer::A_WIRAUSAHA, $this->a_wirausaha);
        if ($this->isColumnModified(PekerjaanPeer::A_PEJABAT_PUBLIK)) $criteria->add(PekerjaanPeer::A_PEJABAT_PUBLIK, $this->a_pejabat_publik);
        if ($this->isColumnModified(PekerjaanPeer::CREATE_DATE)) $criteria->add(PekerjaanPeer::CREATE_DATE, $this->create_date);
        if ($this->isColumnModified(PekerjaanPeer::LAST_UPDATE)) $criteria->add(PekerjaanPeer::LAST_UPDATE, $this->last_update);
        if ($this->isColumnModified(PekerjaanPeer::EXPIRED_DATE)) $criteria->add(PekerjaanPeer::EXPIRED_DATE, $this->expired_date);
        if ($this->isColumnModified(PekerjaanPeer::LAST_SYNC)) $criteria->add(PekerjaanPeer::LAST_SYNC, $this->last_sync);

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
        $criteria = new Criteria(PekerjaanPeer::DATABASE_NAME);
        $criteria->add(PekerjaanPeer::PEKERJAAN_ID, $this->pekerjaan_id);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getPekerjaanId();
    }

    /**
     * Generic method to set the primary key (pekerjaan_id column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setPekerjaanId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getPekerjaanId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of Pekerjaan (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setNama($this->getNama());
        $copyObj->setAWirausaha($this->getAWirausaha());
        $copyObj->setAPejabatPublik($this->getAPejabatPublik());
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

            foreach ($this->getPesertaDidiksRelatedByPekerjaanId() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPesertaDidikRelatedByPekerjaanId($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getPesertaDidiksRelatedByPekerjaanIdAyah() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPesertaDidikRelatedByPekerjaanIdAyah($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getPesertaDidiksRelatedByPekerjaanIdIbu() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPesertaDidikRelatedByPekerjaanIdIbu($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getPesertaDidiksRelatedByPekerjaanIdWali() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPesertaDidikRelatedByPekerjaanIdWali($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getPtks() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPtk($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getTracerLulusans() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addTracerLulusan($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setPekerjaanId(NULL); // this is a auto-increment column, so set to default value
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
     * @return Pekerjaan Clone of current object.
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
     * @return PekerjaanPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new PekerjaanPeer();
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
        if ('PesertaDidikRelatedByPekerjaanId' == $relationName) {
            $this->initPesertaDidiksRelatedByPekerjaanId();
        }
        if ('PesertaDidikRelatedByPekerjaanIdAyah' == $relationName) {
            $this->initPesertaDidiksRelatedByPekerjaanIdAyah();
        }
        if ('PesertaDidikRelatedByPekerjaanIdIbu' == $relationName) {
            $this->initPesertaDidiksRelatedByPekerjaanIdIbu();
        }
        if ('PesertaDidikRelatedByPekerjaanIdWali' == $relationName) {
            $this->initPesertaDidiksRelatedByPekerjaanIdWali();
        }
        if ('Ptk' == $relationName) {
            $this->initPtks();
        }
        if ('TracerLulusan' == $relationName) {
            $this->initTracerLulusans();
        }
    }

    /**
     * Clears out the collPesertaDidiksRelatedByPekerjaanId collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Pekerjaan The current object (for fluent API support)
     * @see        addPesertaDidiksRelatedByPekerjaanId()
     */
    public function clearPesertaDidiksRelatedByPekerjaanId()
    {
        $this->collPesertaDidiksRelatedByPekerjaanId = null; // important to set this to null since that means it is uninitialized
        $this->collPesertaDidiksRelatedByPekerjaanIdPartial = null;

        return $this;
    }

    /**
     * reset is the collPesertaDidiksRelatedByPekerjaanId collection loaded partially
     *
     * @return void
     */
    public function resetPartialPesertaDidiksRelatedByPekerjaanId($v = true)
    {
        $this->collPesertaDidiksRelatedByPekerjaanIdPartial = $v;
    }

    /**
     * Initializes the collPesertaDidiksRelatedByPekerjaanId collection.
     *
     * By default this just sets the collPesertaDidiksRelatedByPekerjaanId collection to an empty array (like clearcollPesertaDidiksRelatedByPekerjaanId());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPesertaDidiksRelatedByPekerjaanId($overrideExisting = true)
    {
        if (null !== $this->collPesertaDidiksRelatedByPekerjaanId && !$overrideExisting) {
            return;
        }
        $this->collPesertaDidiksRelatedByPekerjaanId = new PropelObjectCollection();
        $this->collPesertaDidiksRelatedByPekerjaanId->setModel('PesertaDidik');
    }

    /**
     * Gets an array of PesertaDidik objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Pekerjaan is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     * @throws PropelException
     */
    public function getPesertaDidiksRelatedByPekerjaanId($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collPesertaDidiksRelatedByPekerjaanIdPartial && !$this->isNew();
        if (null === $this->collPesertaDidiksRelatedByPekerjaanId || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collPesertaDidiksRelatedByPekerjaanId) {
                // return empty collection
                $this->initPesertaDidiksRelatedByPekerjaanId();
            } else {
                $collPesertaDidiksRelatedByPekerjaanId = PesertaDidikQuery::create(null, $criteria)
                    ->filterByPekerjaanRelatedByPekerjaanId($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collPesertaDidiksRelatedByPekerjaanIdPartial && count($collPesertaDidiksRelatedByPekerjaanId)) {
                      $this->initPesertaDidiksRelatedByPekerjaanId(false);

                      foreach($collPesertaDidiksRelatedByPekerjaanId as $obj) {
                        if (false == $this->collPesertaDidiksRelatedByPekerjaanId->contains($obj)) {
                          $this->collPesertaDidiksRelatedByPekerjaanId->append($obj);
                        }
                      }

                      $this->collPesertaDidiksRelatedByPekerjaanIdPartial = true;
                    }

                    $collPesertaDidiksRelatedByPekerjaanId->getInternalIterator()->rewind();
                    return $collPesertaDidiksRelatedByPekerjaanId;
                }

                if($partial && $this->collPesertaDidiksRelatedByPekerjaanId) {
                    foreach($this->collPesertaDidiksRelatedByPekerjaanId as $obj) {
                        if($obj->isNew()) {
                            $collPesertaDidiksRelatedByPekerjaanId[] = $obj;
                        }
                    }
                }

                $this->collPesertaDidiksRelatedByPekerjaanId = $collPesertaDidiksRelatedByPekerjaanId;
                $this->collPesertaDidiksRelatedByPekerjaanIdPartial = false;
            }
        }

        return $this->collPesertaDidiksRelatedByPekerjaanId;
    }

    /**
     * Sets a collection of PesertaDidikRelatedByPekerjaanId objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $pesertaDidiksRelatedByPekerjaanId A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Pekerjaan The current object (for fluent API support)
     */
    public function setPesertaDidiksRelatedByPekerjaanId(PropelCollection $pesertaDidiksRelatedByPekerjaanId, PropelPDO $con = null)
    {
        $pesertaDidiksRelatedByPekerjaanIdToDelete = $this->getPesertaDidiksRelatedByPekerjaanId(new Criteria(), $con)->diff($pesertaDidiksRelatedByPekerjaanId);

        $this->pesertaDidiksRelatedByPekerjaanIdScheduledForDeletion = unserialize(serialize($pesertaDidiksRelatedByPekerjaanIdToDelete));

        foreach ($pesertaDidiksRelatedByPekerjaanIdToDelete as $pesertaDidikRelatedByPekerjaanIdRemoved) {
            $pesertaDidikRelatedByPekerjaanIdRemoved->setPekerjaanRelatedByPekerjaanId(null);
        }

        $this->collPesertaDidiksRelatedByPekerjaanId = null;
        foreach ($pesertaDidiksRelatedByPekerjaanId as $pesertaDidikRelatedByPekerjaanId) {
            $this->addPesertaDidikRelatedByPekerjaanId($pesertaDidikRelatedByPekerjaanId);
        }

        $this->collPesertaDidiksRelatedByPekerjaanId = $pesertaDidiksRelatedByPekerjaanId;
        $this->collPesertaDidiksRelatedByPekerjaanIdPartial = false;

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
    public function countPesertaDidiksRelatedByPekerjaanId(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collPesertaDidiksRelatedByPekerjaanIdPartial && !$this->isNew();
        if (null === $this->collPesertaDidiksRelatedByPekerjaanId || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPesertaDidiksRelatedByPekerjaanId) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getPesertaDidiksRelatedByPekerjaanId());
            }
            $query = PesertaDidikQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPekerjaanRelatedByPekerjaanId($this)
                ->count($con);
        }

        return count($this->collPesertaDidiksRelatedByPekerjaanId);
    }

    /**
     * Method called to associate a PesertaDidik object to this object
     * through the PesertaDidik foreign key attribute.
     *
     * @param    PesertaDidik $l PesertaDidik
     * @return Pekerjaan The current object (for fluent API support)
     */
    public function addPesertaDidikRelatedByPekerjaanId(PesertaDidik $l)
    {
        if ($this->collPesertaDidiksRelatedByPekerjaanId === null) {
            $this->initPesertaDidiksRelatedByPekerjaanId();
            $this->collPesertaDidiksRelatedByPekerjaanIdPartial = true;
        }
        if (!in_array($l, $this->collPesertaDidiksRelatedByPekerjaanId->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddPesertaDidikRelatedByPekerjaanId($l);
        }

        return $this;
    }

    /**
     * @param	PesertaDidikRelatedByPekerjaanId $pesertaDidikRelatedByPekerjaanId The pesertaDidikRelatedByPekerjaanId object to add.
     */
    protected function doAddPesertaDidikRelatedByPekerjaanId($pesertaDidikRelatedByPekerjaanId)
    {
        $this->collPesertaDidiksRelatedByPekerjaanId[]= $pesertaDidikRelatedByPekerjaanId;
        $pesertaDidikRelatedByPekerjaanId->setPekerjaanRelatedByPekerjaanId($this);
    }

    /**
     * @param	PesertaDidikRelatedByPekerjaanId $pesertaDidikRelatedByPekerjaanId The pesertaDidikRelatedByPekerjaanId object to remove.
     * @return Pekerjaan The current object (for fluent API support)
     */
    public function removePesertaDidikRelatedByPekerjaanId($pesertaDidikRelatedByPekerjaanId)
    {
        if ($this->getPesertaDidiksRelatedByPekerjaanId()->contains($pesertaDidikRelatedByPekerjaanId)) {
            $this->collPesertaDidiksRelatedByPekerjaanId->remove($this->collPesertaDidiksRelatedByPekerjaanId->search($pesertaDidikRelatedByPekerjaanId));
            if (null === $this->pesertaDidiksRelatedByPekerjaanIdScheduledForDeletion) {
                $this->pesertaDidiksRelatedByPekerjaanIdScheduledForDeletion = clone $this->collPesertaDidiksRelatedByPekerjaanId;
                $this->pesertaDidiksRelatedByPekerjaanIdScheduledForDeletion->clear();
            }
            $this->pesertaDidiksRelatedByPekerjaanIdScheduledForDeletion[]= $pesertaDidikRelatedByPekerjaanId;
            $pesertaDidikRelatedByPekerjaanId->setPekerjaanRelatedByPekerjaanId(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pekerjaan is new, it will return
     * an empty collection; or if this Pekerjaan has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByPekerjaanId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pekerjaan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByPekerjaanIdJoinKebutuhanKhususRelatedByKebutuhanKhususIdAyah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('KebutuhanKhususRelatedByKebutuhanKhususIdAyah', $join_behavior);

        return $this->getPesertaDidiksRelatedByPekerjaanId($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pekerjaan is new, it will return
     * an empty collection; or if this Pekerjaan has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByPekerjaanId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pekerjaan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByPekerjaanIdJoinKebutuhanKhususRelatedByKebutuhanKhususIdIbu($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('KebutuhanKhususRelatedByKebutuhanKhususIdIbu', $join_behavior);

        return $this->getPesertaDidiksRelatedByPekerjaanId($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pekerjaan is new, it will return
     * an empty collection; or if this Pekerjaan has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByPekerjaanId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pekerjaan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByPekerjaanIdJoinNegara($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('Negara', $join_behavior);

        return $this->getPesertaDidiksRelatedByPekerjaanId($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pekerjaan is new, it will return
     * an empty collection; or if this Pekerjaan has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByPekerjaanId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pekerjaan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByPekerjaanIdJoinAlasanLayakPip($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('AlasanLayakPip', $join_behavior);

        return $this->getPesertaDidiksRelatedByPekerjaanId($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pekerjaan is new, it will return
     * an empty collection; or if this Pekerjaan has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByPekerjaanId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pekerjaan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByPekerjaanIdJoinBank($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('Bank', $join_behavior);

        return $this->getPesertaDidiksRelatedByPekerjaanId($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pekerjaan is new, it will return
     * an empty collection; or if this Pekerjaan has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByPekerjaanId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pekerjaan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByPekerjaanIdJoinMstWilayah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('MstWilayah', $join_behavior);

        return $this->getPesertaDidiksRelatedByPekerjaanId($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pekerjaan is new, it will return
     * an empty collection; or if this Pekerjaan has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByPekerjaanId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pekerjaan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByPekerjaanIdJoinKebutuhanKhususRelatedByKebutuhanKhususId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('KebutuhanKhususRelatedByKebutuhanKhususId', $join_behavior);

        return $this->getPesertaDidiksRelatedByPekerjaanId($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pekerjaan is new, it will return
     * an empty collection; or if this Pekerjaan has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByPekerjaanId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pekerjaan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByPekerjaanIdJoinAgama($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('Agama', $join_behavior);

        return $this->getPesertaDidiksRelatedByPekerjaanId($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pekerjaan is new, it will return
     * an empty collection; or if this Pekerjaan has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByPekerjaanId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pekerjaan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByPekerjaanIdJoinPenghasilanRelatedByPenghasilanIdAyah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('PenghasilanRelatedByPenghasilanIdAyah', $join_behavior);

        return $this->getPesertaDidiksRelatedByPekerjaanId($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pekerjaan is new, it will return
     * an empty collection; or if this Pekerjaan has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByPekerjaanId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pekerjaan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByPekerjaanIdJoinJenisTinggal($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('JenisTinggal', $join_behavior);

        return $this->getPesertaDidiksRelatedByPekerjaanId($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pekerjaan is new, it will return
     * an empty collection; or if this Pekerjaan has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByPekerjaanId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pekerjaan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByPekerjaanIdJoinAlatTransportasi($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('AlatTransportasi', $join_behavior);

        return $this->getPesertaDidiksRelatedByPekerjaanId($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pekerjaan is new, it will return
     * an empty collection; or if this Pekerjaan has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByPekerjaanId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pekerjaan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByPekerjaanIdJoinJenjangPendidikanRelatedByJenjangPendidikanIbu($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('JenjangPendidikanRelatedByJenjangPendidikanIbu', $join_behavior);

        return $this->getPesertaDidiksRelatedByPekerjaanId($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pekerjaan is new, it will return
     * an empty collection; or if this Pekerjaan has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByPekerjaanId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pekerjaan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByPekerjaanIdJoinPenghasilanRelatedByPenghasilanIdWali($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('PenghasilanRelatedByPenghasilanIdWali', $join_behavior);

        return $this->getPesertaDidiksRelatedByPekerjaanId($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pekerjaan is new, it will return
     * an empty collection; or if this Pekerjaan has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByPekerjaanId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pekerjaan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByPekerjaanIdJoinJenjangPendidikanRelatedByJenjangPendidikanAyah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('JenjangPendidikanRelatedByJenjangPendidikanAyah', $join_behavior);

        return $this->getPesertaDidiksRelatedByPekerjaanId($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pekerjaan is new, it will return
     * an empty collection; or if this Pekerjaan has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByPekerjaanId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pekerjaan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByPekerjaanIdJoinPenghasilanRelatedByPenghasilanIdIbu($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('PenghasilanRelatedByPenghasilanIdIbu', $join_behavior);

        return $this->getPesertaDidiksRelatedByPekerjaanId($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pekerjaan is new, it will return
     * an empty collection; or if this Pekerjaan has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByPekerjaanId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pekerjaan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByPekerjaanIdJoinJenjangPendidikanRelatedByJenjangPendidikanWali($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('JenjangPendidikanRelatedByJenjangPendidikanWali', $join_behavior);

        return $this->getPesertaDidiksRelatedByPekerjaanId($query, $con);
    }

    /**
     * Clears out the collPesertaDidiksRelatedByPekerjaanIdAyah collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Pekerjaan The current object (for fluent API support)
     * @see        addPesertaDidiksRelatedByPekerjaanIdAyah()
     */
    public function clearPesertaDidiksRelatedByPekerjaanIdAyah()
    {
        $this->collPesertaDidiksRelatedByPekerjaanIdAyah = null; // important to set this to null since that means it is uninitialized
        $this->collPesertaDidiksRelatedByPekerjaanIdAyahPartial = null;

        return $this;
    }

    /**
     * reset is the collPesertaDidiksRelatedByPekerjaanIdAyah collection loaded partially
     *
     * @return void
     */
    public function resetPartialPesertaDidiksRelatedByPekerjaanIdAyah($v = true)
    {
        $this->collPesertaDidiksRelatedByPekerjaanIdAyahPartial = $v;
    }

    /**
     * Initializes the collPesertaDidiksRelatedByPekerjaanIdAyah collection.
     *
     * By default this just sets the collPesertaDidiksRelatedByPekerjaanIdAyah collection to an empty array (like clearcollPesertaDidiksRelatedByPekerjaanIdAyah());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPesertaDidiksRelatedByPekerjaanIdAyah($overrideExisting = true)
    {
        if (null !== $this->collPesertaDidiksRelatedByPekerjaanIdAyah && !$overrideExisting) {
            return;
        }
        $this->collPesertaDidiksRelatedByPekerjaanIdAyah = new PropelObjectCollection();
        $this->collPesertaDidiksRelatedByPekerjaanIdAyah->setModel('PesertaDidik');
    }

    /**
     * Gets an array of PesertaDidik objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Pekerjaan is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     * @throws PropelException
     */
    public function getPesertaDidiksRelatedByPekerjaanIdAyah($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collPesertaDidiksRelatedByPekerjaanIdAyahPartial && !$this->isNew();
        if (null === $this->collPesertaDidiksRelatedByPekerjaanIdAyah || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collPesertaDidiksRelatedByPekerjaanIdAyah) {
                // return empty collection
                $this->initPesertaDidiksRelatedByPekerjaanIdAyah();
            } else {
                $collPesertaDidiksRelatedByPekerjaanIdAyah = PesertaDidikQuery::create(null, $criteria)
                    ->filterByPekerjaanRelatedByPekerjaanIdAyah($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collPesertaDidiksRelatedByPekerjaanIdAyahPartial && count($collPesertaDidiksRelatedByPekerjaanIdAyah)) {
                      $this->initPesertaDidiksRelatedByPekerjaanIdAyah(false);

                      foreach($collPesertaDidiksRelatedByPekerjaanIdAyah as $obj) {
                        if (false == $this->collPesertaDidiksRelatedByPekerjaanIdAyah->contains($obj)) {
                          $this->collPesertaDidiksRelatedByPekerjaanIdAyah->append($obj);
                        }
                      }

                      $this->collPesertaDidiksRelatedByPekerjaanIdAyahPartial = true;
                    }

                    $collPesertaDidiksRelatedByPekerjaanIdAyah->getInternalIterator()->rewind();
                    return $collPesertaDidiksRelatedByPekerjaanIdAyah;
                }

                if($partial && $this->collPesertaDidiksRelatedByPekerjaanIdAyah) {
                    foreach($this->collPesertaDidiksRelatedByPekerjaanIdAyah as $obj) {
                        if($obj->isNew()) {
                            $collPesertaDidiksRelatedByPekerjaanIdAyah[] = $obj;
                        }
                    }
                }

                $this->collPesertaDidiksRelatedByPekerjaanIdAyah = $collPesertaDidiksRelatedByPekerjaanIdAyah;
                $this->collPesertaDidiksRelatedByPekerjaanIdAyahPartial = false;
            }
        }

        return $this->collPesertaDidiksRelatedByPekerjaanIdAyah;
    }

    /**
     * Sets a collection of PesertaDidikRelatedByPekerjaanIdAyah objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $pesertaDidiksRelatedByPekerjaanIdAyah A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Pekerjaan The current object (for fluent API support)
     */
    public function setPesertaDidiksRelatedByPekerjaanIdAyah(PropelCollection $pesertaDidiksRelatedByPekerjaanIdAyah, PropelPDO $con = null)
    {
        $pesertaDidiksRelatedByPekerjaanIdAyahToDelete = $this->getPesertaDidiksRelatedByPekerjaanIdAyah(new Criteria(), $con)->diff($pesertaDidiksRelatedByPekerjaanIdAyah);

        $this->pesertaDidiksRelatedByPekerjaanIdAyahScheduledForDeletion = unserialize(serialize($pesertaDidiksRelatedByPekerjaanIdAyahToDelete));

        foreach ($pesertaDidiksRelatedByPekerjaanIdAyahToDelete as $pesertaDidikRelatedByPekerjaanIdAyahRemoved) {
            $pesertaDidikRelatedByPekerjaanIdAyahRemoved->setPekerjaanRelatedByPekerjaanIdAyah(null);
        }

        $this->collPesertaDidiksRelatedByPekerjaanIdAyah = null;
        foreach ($pesertaDidiksRelatedByPekerjaanIdAyah as $pesertaDidikRelatedByPekerjaanIdAyah) {
            $this->addPesertaDidikRelatedByPekerjaanIdAyah($pesertaDidikRelatedByPekerjaanIdAyah);
        }

        $this->collPesertaDidiksRelatedByPekerjaanIdAyah = $pesertaDidiksRelatedByPekerjaanIdAyah;
        $this->collPesertaDidiksRelatedByPekerjaanIdAyahPartial = false;

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
    public function countPesertaDidiksRelatedByPekerjaanIdAyah(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collPesertaDidiksRelatedByPekerjaanIdAyahPartial && !$this->isNew();
        if (null === $this->collPesertaDidiksRelatedByPekerjaanIdAyah || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPesertaDidiksRelatedByPekerjaanIdAyah) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getPesertaDidiksRelatedByPekerjaanIdAyah());
            }
            $query = PesertaDidikQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPekerjaanRelatedByPekerjaanIdAyah($this)
                ->count($con);
        }

        return count($this->collPesertaDidiksRelatedByPekerjaanIdAyah);
    }

    /**
     * Method called to associate a PesertaDidik object to this object
     * through the PesertaDidik foreign key attribute.
     *
     * @param    PesertaDidik $l PesertaDidik
     * @return Pekerjaan The current object (for fluent API support)
     */
    public function addPesertaDidikRelatedByPekerjaanIdAyah(PesertaDidik $l)
    {
        if ($this->collPesertaDidiksRelatedByPekerjaanIdAyah === null) {
            $this->initPesertaDidiksRelatedByPekerjaanIdAyah();
            $this->collPesertaDidiksRelatedByPekerjaanIdAyahPartial = true;
        }
        if (!in_array($l, $this->collPesertaDidiksRelatedByPekerjaanIdAyah->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddPesertaDidikRelatedByPekerjaanIdAyah($l);
        }

        return $this;
    }

    /**
     * @param	PesertaDidikRelatedByPekerjaanIdAyah $pesertaDidikRelatedByPekerjaanIdAyah The pesertaDidikRelatedByPekerjaanIdAyah object to add.
     */
    protected function doAddPesertaDidikRelatedByPekerjaanIdAyah($pesertaDidikRelatedByPekerjaanIdAyah)
    {
        $this->collPesertaDidiksRelatedByPekerjaanIdAyah[]= $pesertaDidikRelatedByPekerjaanIdAyah;
        $pesertaDidikRelatedByPekerjaanIdAyah->setPekerjaanRelatedByPekerjaanIdAyah($this);
    }

    /**
     * @param	PesertaDidikRelatedByPekerjaanIdAyah $pesertaDidikRelatedByPekerjaanIdAyah The pesertaDidikRelatedByPekerjaanIdAyah object to remove.
     * @return Pekerjaan The current object (for fluent API support)
     */
    public function removePesertaDidikRelatedByPekerjaanIdAyah($pesertaDidikRelatedByPekerjaanIdAyah)
    {
        if ($this->getPesertaDidiksRelatedByPekerjaanIdAyah()->contains($pesertaDidikRelatedByPekerjaanIdAyah)) {
            $this->collPesertaDidiksRelatedByPekerjaanIdAyah->remove($this->collPesertaDidiksRelatedByPekerjaanIdAyah->search($pesertaDidikRelatedByPekerjaanIdAyah));
            if (null === $this->pesertaDidiksRelatedByPekerjaanIdAyahScheduledForDeletion) {
                $this->pesertaDidiksRelatedByPekerjaanIdAyahScheduledForDeletion = clone $this->collPesertaDidiksRelatedByPekerjaanIdAyah;
                $this->pesertaDidiksRelatedByPekerjaanIdAyahScheduledForDeletion->clear();
            }
            $this->pesertaDidiksRelatedByPekerjaanIdAyahScheduledForDeletion[]= $pesertaDidikRelatedByPekerjaanIdAyah;
            $pesertaDidikRelatedByPekerjaanIdAyah->setPekerjaanRelatedByPekerjaanIdAyah(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pekerjaan is new, it will return
     * an empty collection; or if this Pekerjaan has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByPekerjaanIdAyah from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pekerjaan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByPekerjaanIdAyahJoinKebutuhanKhususRelatedByKebutuhanKhususIdAyah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('KebutuhanKhususRelatedByKebutuhanKhususIdAyah', $join_behavior);

        return $this->getPesertaDidiksRelatedByPekerjaanIdAyah($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pekerjaan is new, it will return
     * an empty collection; or if this Pekerjaan has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByPekerjaanIdAyah from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pekerjaan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByPekerjaanIdAyahJoinKebutuhanKhususRelatedByKebutuhanKhususIdIbu($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('KebutuhanKhususRelatedByKebutuhanKhususIdIbu', $join_behavior);

        return $this->getPesertaDidiksRelatedByPekerjaanIdAyah($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pekerjaan is new, it will return
     * an empty collection; or if this Pekerjaan has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByPekerjaanIdAyah from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pekerjaan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByPekerjaanIdAyahJoinNegara($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('Negara', $join_behavior);

        return $this->getPesertaDidiksRelatedByPekerjaanIdAyah($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pekerjaan is new, it will return
     * an empty collection; or if this Pekerjaan has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByPekerjaanIdAyah from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pekerjaan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByPekerjaanIdAyahJoinAlasanLayakPip($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('AlasanLayakPip', $join_behavior);

        return $this->getPesertaDidiksRelatedByPekerjaanIdAyah($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pekerjaan is new, it will return
     * an empty collection; or if this Pekerjaan has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByPekerjaanIdAyah from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pekerjaan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByPekerjaanIdAyahJoinBank($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('Bank', $join_behavior);

        return $this->getPesertaDidiksRelatedByPekerjaanIdAyah($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pekerjaan is new, it will return
     * an empty collection; or if this Pekerjaan has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByPekerjaanIdAyah from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pekerjaan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByPekerjaanIdAyahJoinMstWilayah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('MstWilayah', $join_behavior);

        return $this->getPesertaDidiksRelatedByPekerjaanIdAyah($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pekerjaan is new, it will return
     * an empty collection; or if this Pekerjaan has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByPekerjaanIdAyah from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pekerjaan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByPekerjaanIdAyahJoinKebutuhanKhususRelatedByKebutuhanKhususId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('KebutuhanKhususRelatedByKebutuhanKhususId', $join_behavior);

        return $this->getPesertaDidiksRelatedByPekerjaanIdAyah($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pekerjaan is new, it will return
     * an empty collection; or if this Pekerjaan has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByPekerjaanIdAyah from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pekerjaan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByPekerjaanIdAyahJoinAgama($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('Agama', $join_behavior);

        return $this->getPesertaDidiksRelatedByPekerjaanIdAyah($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pekerjaan is new, it will return
     * an empty collection; or if this Pekerjaan has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByPekerjaanIdAyah from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pekerjaan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByPekerjaanIdAyahJoinPenghasilanRelatedByPenghasilanIdAyah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('PenghasilanRelatedByPenghasilanIdAyah', $join_behavior);

        return $this->getPesertaDidiksRelatedByPekerjaanIdAyah($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pekerjaan is new, it will return
     * an empty collection; or if this Pekerjaan has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByPekerjaanIdAyah from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pekerjaan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByPekerjaanIdAyahJoinJenisTinggal($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('JenisTinggal', $join_behavior);

        return $this->getPesertaDidiksRelatedByPekerjaanIdAyah($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pekerjaan is new, it will return
     * an empty collection; or if this Pekerjaan has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByPekerjaanIdAyah from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pekerjaan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByPekerjaanIdAyahJoinAlatTransportasi($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('AlatTransportasi', $join_behavior);

        return $this->getPesertaDidiksRelatedByPekerjaanIdAyah($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pekerjaan is new, it will return
     * an empty collection; or if this Pekerjaan has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByPekerjaanIdAyah from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pekerjaan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByPekerjaanIdAyahJoinJenjangPendidikanRelatedByJenjangPendidikanIbu($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('JenjangPendidikanRelatedByJenjangPendidikanIbu', $join_behavior);

        return $this->getPesertaDidiksRelatedByPekerjaanIdAyah($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pekerjaan is new, it will return
     * an empty collection; or if this Pekerjaan has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByPekerjaanIdAyah from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pekerjaan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByPekerjaanIdAyahJoinPenghasilanRelatedByPenghasilanIdWali($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('PenghasilanRelatedByPenghasilanIdWali', $join_behavior);

        return $this->getPesertaDidiksRelatedByPekerjaanIdAyah($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pekerjaan is new, it will return
     * an empty collection; or if this Pekerjaan has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByPekerjaanIdAyah from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pekerjaan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByPekerjaanIdAyahJoinJenjangPendidikanRelatedByJenjangPendidikanAyah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('JenjangPendidikanRelatedByJenjangPendidikanAyah', $join_behavior);

        return $this->getPesertaDidiksRelatedByPekerjaanIdAyah($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pekerjaan is new, it will return
     * an empty collection; or if this Pekerjaan has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByPekerjaanIdAyah from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pekerjaan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByPekerjaanIdAyahJoinPenghasilanRelatedByPenghasilanIdIbu($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('PenghasilanRelatedByPenghasilanIdIbu', $join_behavior);

        return $this->getPesertaDidiksRelatedByPekerjaanIdAyah($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pekerjaan is new, it will return
     * an empty collection; or if this Pekerjaan has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByPekerjaanIdAyah from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pekerjaan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByPekerjaanIdAyahJoinJenjangPendidikanRelatedByJenjangPendidikanWali($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('JenjangPendidikanRelatedByJenjangPendidikanWali', $join_behavior);

        return $this->getPesertaDidiksRelatedByPekerjaanIdAyah($query, $con);
    }

    /**
     * Clears out the collPesertaDidiksRelatedByPekerjaanIdIbu collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Pekerjaan The current object (for fluent API support)
     * @see        addPesertaDidiksRelatedByPekerjaanIdIbu()
     */
    public function clearPesertaDidiksRelatedByPekerjaanIdIbu()
    {
        $this->collPesertaDidiksRelatedByPekerjaanIdIbu = null; // important to set this to null since that means it is uninitialized
        $this->collPesertaDidiksRelatedByPekerjaanIdIbuPartial = null;

        return $this;
    }

    /**
     * reset is the collPesertaDidiksRelatedByPekerjaanIdIbu collection loaded partially
     *
     * @return void
     */
    public function resetPartialPesertaDidiksRelatedByPekerjaanIdIbu($v = true)
    {
        $this->collPesertaDidiksRelatedByPekerjaanIdIbuPartial = $v;
    }

    /**
     * Initializes the collPesertaDidiksRelatedByPekerjaanIdIbu collection.
     *
     * By default this just sets the collPesertaDidiksRelatedByPekerjaanIdIbu collection to an empty array (like clearcollPesertaDidiksRelatedByPekerjaanIdIbu());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPesertaDidiksRelatedByPekerjaanIdIbu($overrideExisting = true)
    {
        if (null !== $this->collPesertaDidiksRelatedByPekerjaanIdIbu && !$overrideExisting) {
            return;
        }
        $this->collPesertaDidiksRelatedByPekerjaanIdIbu = new PropelObjectCollection();
        $this->collPesertaDidiksRelatedByPekerjaanIdIbu->setModel('PesertaDidik');
    }

    /**
     * Gets an array of PesertaDidik objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Pekerjaan is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     * @throws PropelException
     */
    public function getPesertaDidiksRelatedByPekerjaanIdIbu($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collPesertaDidiksRelatedByPekerjaanIdIbuPartial && !$this->isNew();
        if (null === $this->collPesertaDidiksRelatedByPekerjaanIdIbu || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collPesertaDidiksRelatedByPekerjaanIdIbu) {
                // return empty collection
                $this->initPesertaDidiksRelatedByPekerjaanIdIbu();
            } else {
                $collPesertaDidiksRelatedByPekerjaanIdIbu = PesertaDidikQuery::create(null, $criteria)
                    ->filterByPekerjaanRelatedByPekerjaanIdIbu($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collPesertaDidiksRelatedByPekerjaanIdIbuPartial && count($collPesertaDidiksRelatedByPekerjaanIdIbu)) {
                      $this->initPesertaDidiksRelatedByPekerjaanIdIbu(false);

                      foreach($collPesertaDidiksRelatedByPekerjaanIdIbu as $obj) {
                        if (false == $this->collPesertaDidiksRelatedByPekerjaanIdIbu->contains($obj)) {
                          $this->collPesertaDidiksRelatedByPekerjaanIdIbu->append($obj);
                        }
                      }

                      $this->collPesertaDidiksRelatedByPekerjaanIdIbuPartial = true;
                    }

                    $collPesertaDidiksRelatedByPekerjaanIdIbu->getInternalIterator()->rewind();
                    return $collPesertaDidiksRelatedByPekerjaanIdIbu;
                }

                if($partial && $this->collPesertaDidiksRelatedByPekerjaanIdIbu) {
                    foreach($this->collPesertaDidiksRelatedByPekerjaanIdIbu as $obj) {
                        if($obj->isNew()) {
                            $collPesertaDidiksRelatedByPekerjaanIdIbu[] = $obj;
                        }
                    }
                }

                $this->collPesertaDidiksRelatedByPekerjaanIdIbu = $collPesertaDidiksRelatedByPekerjaanIdIbu;
                $this->collPesertaDidiksRelatedByPekerjaanIdIbuPartial = false;
            }
        }

        return $this->collPesertaDidiksRelatedByPekerjaanIdIbu;
    }

    /**
     * Sets a collection of PesertaDidikRelatedByPekerjaanIdIbu objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $pesertaDidiksRelatedByPekerjaanIdIbu A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Pekerjaan The current object (for fluent API support)
     */
    public function setPesertaDidiksRelatedByPekerjaanIdIbu(PropelCollection $pesertaDidiksRelatedByPekerjaanIdIbu, PropelPDO $con = null)
    {
        $pesertaDidiksRelatedByPekerjaanIdIbuToDelete = $this->getPesertaDidiksRelatedByPekerjaanIdIbu(new Criteria(), $con)->diff($pesertaDidiksRelatedByPekerjaanIdIbu);

        $this->pesertaDidiksRelatedByPekerjaanIdIbuScheduledForDeletion = unserialize(serialize($pesertaDidiksRelatedByPekerjaanIdIbuToDelete));

        foreach ($pesertaDidiksRelatedByPekerjaanIdIbuToDelete as $pesertaDidikRelatedByPekerjaanIdIbuRemoved) {
            $pesertaDidikRelatedByPekerjaanIdIbuRemoved->setPekerjaanRelatedByPekerjaanIdIbu(null);
        }

        $this->collPesertaDidiksRelatedByPekerjaanIdIbu = null;
        foreach ($pesertaDidiksRelatedByPekerjaanIdIbu as $pesertaDidikRelatedByPekerjaanIdIbu) {
            $this->addPesertaDidikRelatedByPekerjaanIdIbu($pesertaDidikRelatedByPekerjaanIdIbu);
        }

        $this->collPesertaDidiksRelatedByPekerjaanIdIbu = $pesertaDidiksRelatedByPekerjaanIdIbu;
        $this->collPesertaDidiksRelatedByPekerjaanIdIbuPartial = false;

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
    public function countPesertaDidiksRelatedByPekerjaanIdIbu(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collPesertaDidiksRelatedByPekerjaanIdIbuPartial && !$this->isNew();
        if (null === $this->collPesertaDidiksRelatedByPekerjaanIdIbu || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPesertaDidiksRelatedByPekerjaanIdIbu) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getPesertaDidiksRelatedByPekerjaanIdIbu());
            }
            $query = PesertaDidikQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPekerjaanRelatedByPekerjaanIdIbu($this)
                ->count($con);
        }

        return count($this->collPesertaDidiksRelatedByPekerjaanIdIbu);
    }

    /**
     * Method called to associate a PesertaDidik object to this object
     * through the PesertaDidik foreign key attribute.
     *
     * @param    PesertaDidik $l PesertaDidik
     * @return Pekerjaan The current object (for fluent API support)
     */
    public function addPesertaDidikRelatedByPekerjaanIdIbu(PesertaDidik $l)
    {
        if ($this->collPesertaDidiksRelatedByPekerjaanIdIbu === null) {
            $this->initPesertaDidiksRelatedByPekerjaanIdIbu();
            $this->collPesertaDidiksRelatedByPekerjaanIdIbuPartial = true;
        }
        if (!in_array($l, $this->collPesertaDidiksRelatedByPekerjaanIdIbu->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddPesertaDidikRelatedByPekerjaanIdIbu($l);
        }

        return $this;
    }

    /**
     * @param	PesertaDidikRelatedByPekerjaanIdIbu $pesertaDidikRelatedByPekerjaanIdIbu The pesertaDidikRelatedByPekerjaanIdIbu object to add.
     */
    protected function doAddPesertaDidikRelatedByPekerjaanIdIbu($pesertaDidikRelatedByPekerjaanIdIbu)
    {
        $this->collPesertaDidiksRelatedByPekerjaanIdIbu[]= $pesertaDidikRelatedByPekerjaanIdIbu;
        $pesertaDidikRelatedByPekerjaanIdIbu->setPekerjaanRelatedByPekerjaanIdIbu($this);
    }

    /**
     * @param	PesertaDidikRelatedByPekerjaanIdIbu $pesertaDidikRelatedByPekerjaanIdIbu The pesertaDidikRelatedByPekerjaanIdIbu object to remove.
     * @return Pekerjaan The current object (for fluent API support)
     */
    public function removePesertaDidikRelatedByPekerjaanIdIbu($pesertaDidikRelatedByPekerjaanIdIbu)
    {
        if ($this->getPesertaDidiksRelatedByPekerjaanIdIbu()->contains($pesertaDidikRelatedByPekerjaanIdIbu)) {
            $this->collPesertaDidiksRelatedByPekerjaanIdIbu->remove($this->collPesertaDidiksRelatedByPekerjaanIdIbu->search($pesertaDidikRelatedByPekerjaanIdIbu));
            if (null === $this->pesertaDidiksRelatedByPekerjaanIdIbuScheduledForDeletion) {
                $this->pesertaDidiksRelatedByPekerjaanIdIbuScheduledForDeletion = clone $this->collPesertaDidiksRelatedByPekerjaanIdIbu;
                $this->pesertaDidiksRelatedByPekerjaanIdIbuScheduledForDeletion->clear();
            }
            $this->pesertaDidiksRelatedByPekerjaanIdIbuScheduledForDeletion[]= $pesertaDidikRelatedByPekerjaanIdIbu;
            $pesertaDidikRelatedByPekerjaanIdIbu->setPekerjaanRelatedByPekerjaanIdIbu(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pekerjaan is new, it will return
     * an empty collection; or if this Pekerjaan has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByPekerjaanIdIbu from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pekerjaan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByPekerjaanIdIbuJoinKebutuhanKhususRelatedByKebutuhanKhususIdAyah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('KebutuhanKhususRelatedByKebutuhanKhususIdAyah', $join_behavior);

        return $this->getPesertaDidiksRelatedByPekerjaanIdIbu($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pekerjaan is new, it will return
     * an empty collection; or if this Pekerjaan has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByPekerjaanIdIbu from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pekerjaan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByPekerjaanIdIbuJoinKebutuhanKhususRelatedByKebutuhanKhususIdIbu($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('KebutuhanKhususRelatedByKebutuhanKhususIdIbu', $join_behavior);

        return $this->getPesertaDidiksRelatedByPekerjaanIdIbu($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pekerjaan is new, it will return
     * an empty collection; or if this Pekerjaan has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByPekerjaanIdIbu from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pekerjaan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByPekerjaanIdIbuJoinNegara($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('Negara', $join_behavior);

        return $this->getPesertaDidiksRelatedByPekerjaanIdIbu($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pekerjaan is new, it will return
     * an empty collection; or if this Pekerjaan has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByPekerjaanIdIbu from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pekerjaan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByPekerjaanIdIbuJoinAlasanLayakPip($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('AlasanLayakPip', $join_behavior);

        return $this->getPesertaDidiksRelatedByPekerjaanIdIbu($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pekerjaan is new, it will return
     * an empty collection; or if this Pekerjaan has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByPekerjaanIdIbu from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pekerjaan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByPekerjaanIdIbuJoinBank($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('Bank', $join_behavior);

        return $this->getPesertaDidiksRelatedByPekerjaanIdIbu($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pekerjaan is new, it will return
     * an empty collection; or if this Pekerjaan has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByPekerjaanIdIbu from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pekerjaan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByPekerjaanIdIbuJoinMstWilayah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('MstWilayah', $join_behavior);

        return $this->getPesertaDidiksRelatedByPekerjaanIdIbu($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pekerjaan is new, it will return
     * an empty collection; or if this Pekerjaan has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByPekerjaanIdIbu from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pekerjaan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByPekerjaanIdIbuJoinKebutuhanKhususRelatedByKebutuhanKhususId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('KebutuhanKhususRelatedByKebutuhanKhususId', $join_behavior);

        return $this->getPesertaDidiksRelatedByPekerjaanIdIbu($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pekerjaan is new, it will return
     * an empty collection; or if this Pekerjaan has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByPekerjaanIdIbu from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pekerjaan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByPekerjaanIdIbuJoinAgama($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('Agama', $join_behavior);

        return $this->getPesertaDidiksRelatedByPekerjaanIdIbu($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pekerjaan is new, it will return
     * an empty collection; or if this Pekerjaan has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByPekerjaanIdIbu from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pekerjaan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByPekerjaanIdIbuJoinPenghasilanRelatedByPenghasilanIdAyah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('PenghasilanRelatedByPenghasilanIdAyah', $join_behavior);

        return $this->getPesertaDidiksRelatedByPekerjaanIdIbu($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pekerjaan is new, it will return
     * an empty collection; or if this Pekerjaan has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByPekerjaanIdIbu from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pekerjaan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByPekerjaanIdIbuJoinJenisTinggal($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('JenisTinggal', $join_behavior);

        return $this->getPesertaDidiksRelatedByPekerjaanIdIbu($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pekerjaan is new, it will return
     * an empty collection; or if this Pekerjaan has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByPekerjaanIdIbu from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pekerjaan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByPekerjaanIdIbuJoinAlatTransportasi($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('AlatTransportasi', $join_behavior);

        return $this->getPesertaDidiksRelatedByPekerjaanIdIbu($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pekerjaan is new, it will return
     * an empty collection; or if this Pekerjaan has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByPekerjaanIdIbu from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pekerjaan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByPekerjaanIdIbuJoinJenjangPendidikanRelatedByJenjangPendidikanIbu($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('JenjangPendidikanRelatedByJenjangPendidikanIbu', $join_behavior);

        return $this->getPesertaDidiksRelatedByPekerjaanIdIbu($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pekerjaan is new, it will return
     * an empty collection; or if this Pekerjaan has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByPekerjaanIdIbu from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pekerjaan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByPekerjaanIdIbuJoinPenghasilanRelatedByPenghasilanIdWali($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('PenghasilanRelatedByPenghasilanIdWali', $join_behavior);

        return $this->getPesertaDidiksRelatedByPekerjaanIdIbu($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pekerjaan is new, it will return
     * an empty collection; or if this Pekerjaan has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByPekerjaanIdIbu from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pekerjaan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByPekerjaanIdIbuJoinJenjangPendidikanRelatedByJenjangPendidikanAyah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('JenjangPendidikanRelatedByJenjangPendidikanAyah', $join_behavior);

        return $this->getPesertaDidiksRelatedByPekerjaanIdIbu($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pekerjaan is new, it will return
     * an empty collection; or if this Pekerjaan has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByPekerjaanIdIbu from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pekerjaan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByPekerjaanIdIbuJoinPenghasilanRelatedByPenghasilanIdIbu($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('PenghasilanRelatedByPenghasilanIdIbu', $join_behavior);

        return $this->getPesertaDidiksRelatedByPekerjaanIdIbu($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pekerjaan is new, it will return
     * an empty collection; or if this Pekerjaan has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByPekerjaanIdIbu from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pekerjaan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByPekerjaanIdIbuJoinJenjangPendidikanRelatedByJenjangPendidikanWali($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('JenjangPendidikanRelatedByJenjangPendidikanWali', $join_behavior);

        return $this->getPesertaDidiksRelatedByPekerjaanIdIbu($query, $con);
    }

    /**
     * Clears out the collPesertaDidiksRelatedByPekerjaanIdWali collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Pekerjaan The current object (for fluent API support)
     * @see        addPesertaDidiksRelatedByPekerjaanIdWali()
     */
    public function clearPesertaDidiksRelatedByPekerjaanIdWali()
    {
        $this->collPesertaDidiksRelatedByPekerjaanIdWali = null; // important to set this to null since that means it is uninitialized
        $this->collPesertaDidiksRelatedByPekerjaanIdWaliPartial = null;

        return $this;
    }

    /**
     * reset is the collPesertaDidiksRelatedByPekerjaanIdWali collection loaded partially
     *
     * @return void
     */
    public function resetPartialPesertaDidiksRelatedByPekerjaanIdWali($v = true)
    {
        $this->collPesertaDidiksRelatedByPekerjaanIdWaliPartial = $v;
    }

    /**
     * Initializes the collPesertaDidiksRelatedByPekerjaanIdWali collection.
     *
     * By default this just sets the collPesertaDidiksRelatedByPekerjaanIdWali collection to an empty array (like clearcollPesertaDidiksRelatedByPekerjaanIdWali());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPesertaDidiksRelatedByPekerjaanIdWali($overrideExisting = true)
    {
        if (null !== $this->collPesertaDidiksRelatedByPekerjaanIdWali && !$overrideExisting) {
            return;
        }
        $this->collPesertaDidiksRelatedByPekerjaanIdWali = new PropelObjectCollection();
        $this->collPesertaDidiksRelatedByPekerjaanIdWali->setModel('PesertaDidik');
    }

    /**
     * Gets an array of PesertaDidik objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Pekerjaan is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     * @throws PropelException
     */
    public function getPesertaDidiksRelatedByPekerjaanIdWali($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collPesertaDidiksRelatedByPekerjaanIdWaliPartial && !$this->isNew();
        if (null === $this->collPesertaDidiksRelatedByPekerjaanIdWali || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collPesertaDidiksRelatedByPekerjaanIdWali) {
                // return empty collection
                $this->initPesertaDidiksRelatedByPekerjaanIdWali();
            } else {
                $collPesertaDidiksRelatedByPekerjaanIdWali = PesertaDidikQuery::create(null, $criteria)
                    ->filterByPekerjaanRelatedByPekerjaanIdWali($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collPesertaDidiksRelatedByPekerjaanIdWaliPartial && count($collPesertaDidiksRelatedByPekerjaanIdWali)) {
                      $this->initPesertaDidiksRelatedByPekerjaanIdWali(false);

                      foreach($collPesertaDidiksRelatedByPekerjaanIdWali as $obj) {
                        if (false == $this->collPesertaDidiksRelatedByPekerjaanIdWali->contains($obj)) {
                          $this->collPesertaDidiksRelatedByPekerjaanIdWali->append($obj);
                        }
                      }

                      $this->collPesertaDidiksRelatedByPekerjaanIdWaliPartial = true;
                    }

                    $collPesertaDidiksRelatedByPekerjaanIdWali->getInternalIterator()->rewind();
                    return $collPesertaDidiksRelatedByPekerjaanIdWali;
                }

                if($partial && $this->collPesertaDidiksRelatedByPekerjaanIdWali) {
                    foreach($this->collPesertaDidiksRelatedByPekerjaanIdWali as $obj) {
                        if($obj->isNew()) {
                            $collPesertaDidiksRelatedByPekerjaanIdWali[] = $obj;
                        }
                    }
                }

                $this->collPesertaDidiksRelatedByPekerjaanIdWali = $collPesertaDidiksRelatedByPekerjaanIdWali;
                $this->collPesertaDidiksRelatedByPekerjaanIdWaliPartial = false;
            }
        }

        return $this->collPesertaDidiksRelatedByPekerjaanIdWali;
    }

    /**
     * Sets a collection of PesertaDidikRelatedByPekerjaanIdWali objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $pesertaDidiksRelatedByPekerjaanIdWali A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Pekerjaan The current object (for fluent API support)
     */
    public function setPesertaDidiksRelatedByPekerjaanIdWali(PropelCollection $pesertaDidiksRelatedByPekerjaanIdWali, PropelPDO $con = null)
    {
        $pesertaDidiksRelatedByPekerjaanIdWaliToDelete = $this->getPesertaDidiksRelatedByPekerjaanIdWali(new Criteria(), $con)->diff($pesertaDidiksRelatedByPekerjaanIdWali);

        $this->pesertaDidiksRelatedByPekerjaanIdWaliScheduledForDeletion = unserialize(serialize($pesertaDidiksRelatedByPekerjaanIdWaliToDelete));

        foreach ($pesertaDidiksRelatedByPekerjaanIdWaliToDelete as $pesertaDidikRelatedByPekerjaanIdWaliRemoved) {
            $pesertaDidikRelatedByPekerjaanIdWaliRemoved->setPekerjaanRelatedByPekerjaanIdWali(null);
        }

        $this->collPesertaDidiksRelatedByPekerjaanIdWali = null;
        foreach ($pesertaDidiksRelatedByPekerjaanIdWali as $pesertaDidikRelatedByPekerjaanIdWali) {
            $this->addPesertaDidikRelatedByPekerjaanIdWali($pesertaDidikRelatedByPekerjaanIdWali);
        }

        $this->collPesertaDidiksRelatedByPekerjaanIdWali = $pesertaDidiksRelatedByPekerjaanIdWali;
        $this->collPesertaDidiksRelatedByPekerjaanIdWaliPartial = false;

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
    public function countPesertaDidiksRelatedByPekerjaanIdWali(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collPesertaDidiksRelatedByPekerjaanIdWaliPartial && !$this->isNew();
        if (null === $this->collPesertaDidiksRelatedByPekerjaanIdWali || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPesertaDidiksRelatedByPekerjaanIdWali) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getPesertaDidiksRelatedByPekerjaanIdWali());
            }
            $query = PesertaDidikQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPekerjaanRelatedByPekerjaanIdWali($this)
                ->count($con);
        }

        return count($this->collPesertaDidiksRelatedByPekerjaanIdWali);
    }

    /**
     * Method called to associate a PesertaDidik object to this object
     * through the PesertaDidik foreign key attribute.
     *
     * @param    PesertaDidik $l PesertaDidik
     * @return Pekerjaan The current object (for fluent API support)
     */
    public function addPesertaDidikRelatedByPekerjaanIdWali(PesertaDidik $l)
    {
        if ($this->collPesertaDidiksRelatedByPekerjaanIdWali === null) {
            $this->initPesertaDidiksRelatedByPekerjaanIdWali();
            $this->collPesertaDidiksRelatedByPekerjaanIdWaliPartial = true;
        }
        if (!in_array($l, $this->collPesertaDidiksRelatedByPekerjaanIdWali->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddPesertaDidikRelatedByPekerjaanIdWali($l);
        }

        return $this;
    }

    /**
     * @param	PesertaDidikRelatedByPekerjaanIdWali $pesertaDidikRelatedByPekerjaanIdWali The pesertaDidikRelatedByPekerjaanIdWali object to add.
     */
    protected function doAddPesertaDidikRelatedByPekerjaanIdWali($pesertaDidikRelatedByPekerjaanIdWali)
    {
        $this->collPesertaDidiksRelatedByPekerjaanIdWali[]= $pesertaDidikRelatedByPekerjaanIdWali;
        $pesertaDidikRelatedByPekerjaanIdWali->setPekerjaanRelatedByPekerjaanIdWali($this);
    }

    /**
     * @param	PesertaDidikRelatedByPekerjaanIdWali $pesertaDidikRelatedByPekerjaanIdWali The pesertaDidikRelatedByPekerjaanIdWali object to remove.
     * @return Pekerjaan The current object (for fluent API support)
     */
    public function removePesertaDidikRelatedByPekerjaanIdWali($pesertaDidikRelatedByPekerjaanIdWali)
    {
        if ($this->getPesertaDidiksRelatedByPekerjaanIdWali()->contains($pesertaDidikRelatedByPekerjaanIdWali)) {
            $this->collPesertaDidiksRelatedByPekerjaanIdWali->remove($this->collPesertaDidiksRelatedByPekerjaanIdWali->search($pesertaDidikRelatedByPekerjaanIdWali));
            if (null === $this->pesertaDidiksRelatedByPekerjaanIdWaliScheduledForDeletion) {
                $this->pesertaDidiksRelatedByPekerjaanIdWaliScheduledForDeletion = clone $this->collPesertaDidiksRelatedByPekerjaanIdWali;
                $this->pesertaDidiksRelatedByPekerjaanIdWaliScheduledForDeletion->clear();
            }
            $this->pesertaDidiksRelatedByPekerjaanIdWaliScheduledForDeletion[]= $pesertaDidikRelatedByPekerjaanIdWali;
            $pesertaDidikRelatedByPekerjaanIdWali->setPekerjaanRelatedByPekerjaanIdWali(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pekerjaan is new, it will return
     * an empty collection; or if this Pekerjaan has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByPekerjaanIdWali from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pekerjaan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByPekerjaanIdWaliJoinKebutuhanKhususRelatedByKebutuhanKhususIdAyah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('KebutuhanKhususRelatedByKebutuhanKhususIdAyah', $join_behavior);

        return $this->getPesertaDidiksRelatedByPekerjaanIdWali($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pekerjaan is new, it will return
     * an empty collection; or if this Pekerjaan has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByPekerjaanIdWali from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pekerjaan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByPekerjaanIdWaliJoinKebutuhanKhususRelatedByKebutuhanKhususIdIbu($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('KebutuhanKhususRelatedByKebutuhanKhususIdIbu', $join_behavior);

        return $this->getPesertaDidiksRelatedByPekerjaanIdWali($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pekerjaan is new, it will return
     * an empty collection; or if this Pekerjaan has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByPekerjaanIdWali from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pekerjaan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByPekerjaanIdWaliJoinNegara($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('Negara', $join_behavior);

        return $this->getPesertaDidiksRelatedByPekerjaanIdWali($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pekerjaan is new, it will return
     * an empty collection; or if this Pekerjaan has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByPekerjaanIdWali from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pekerjaan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByPekerjaanIdWaliJoinAlasanLayakPip($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('AlasanLayakPip', $join_behavior);

        return $this->getPesertaDidiksRelatedByPekerjaanIdWali($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pekerjaan is new, it will return
     * an empty collection; or if this Pekerjaan has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByPekerjaanIdWali from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pekerjaan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByPekerjaanIdWaliJoinBank($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('Bank', $join_behavior);

        return $this->getPesertaDidiksRelatedByPekerjaanIdWali($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pekerjaan is new, it will return
     * an empty collection; or if this Pekerjaan has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByPekerjaanIdWali from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pekerjaan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByPekerjaanIdWaliJoinMstWilayah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('MstWilayah', $join_behavior);

        return $this->getPesertaDidiksRelatedByPekerjaanIdWali($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pekerjaan is new, it will return
     * an empty collection; or if this Pekerjaan has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByPekerjaanIdWali from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pekerjaan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByPekerjaanIdWaliJoinKebutuhanKhususRelatedByKebutuhanKhususId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('KebutuhanKhususRelatedByKebutuhanKhususId', $join_behavior);

        return $this->getPesertaDidiksRelatedByPekerjaanIdWali($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pekerjaan is new, it will return
     * an empty collection; or if this Pekerjaan has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByPekerjaanIdWali from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pekerjaan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByPekerjaanIdWaliJoinAgama($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('Agama', $join_behavior);

        return $this->getPesertaDidiksRelatedByPekerjaanIdWali($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pekerjaan is new, it will return
     * an empty collection; or if this Pekerjaan has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByPekerjaanIdWali from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pekerjaan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByPekerjaanIdWaliJoinPenghasilanRelatedByPenghasilanIdAyah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('PenghasilanRelatedByPenghasilanIdAyah', $join_behavior);

        return $this->getPesertaDidiksRelatedByPekerjaanIdWali($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pekerjaan is new, it will return
     * an empty collection; or if this Pekerjaan has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByPekerjaanIdWali from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pekerjaan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByPekerjaanIdWaliJoinJenisTinggal($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('JenisTinggal', $join_behavior);

        return $this->getPesertaDidiksRelatedByPekerjaanIdWali($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pekerjaan is new, it will return
     * an empty collection; or if this Pekerjaan has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByPekerjaanIdWali from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pekerjaan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByPekerjaanIdWaliJoinAlatTransportasi($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('AlatTransportasi', $join_behavior);

        return $this->getPesertaDidiksRelatedByPekerjaanIdWali($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pekerjaan is new, it will return
     * an empty collection; or if this Pekerjaan has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByPekerjaanIdWali from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pekerjaan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByPekerjaanIdWaliJoinJenjangPendidikanRelatedByJenjangPendidikanIbu($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('JenjangPendidikanRelatedByJenjangPendidikanIbu', $join_behavior);

        return $this->getPesertaDidiksRelatedByPekerjaanIdWali($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pekerjaan is new, it will return
     * an empty collection; or if this Pekerjaan has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByPekerjaanIdWali from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pekerjaan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByPekerjaanIdWaliJoinPenghasilanRelatedByPenghasilanIdWali($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('PenghasilanRelatedByPenghasilanIdWali', $join_behavior);

        return $this->getPesertaDidiksRelatedByPekerjaanIdWali($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pekerjaan is new, it will return
     * an empty collection; or if this Pekerjaan has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByPekerjaanIdWali from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pekerjaan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByPekerjaanIdWaliJoinJenjangPendidikanRelatedByJenjangPendidikanAyah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('JenjangPendidikanRelatedByJenjangPendidikanAyah', $join_behavior);

        return $this->getPesertaDidiksRelatedByPekerjaanIdWali($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pekerjaan is new, it will return
     * an empty collection; or if this Pekerjaan has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByPekerjaanIdWali from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pekerjaan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByPekerjaanIdWaliJoinPenghasilanRelatedByPenghasilanIdIbu($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('PenghasilanRelatedByPenghasilanIdIbu', $join_behavior);

        return $this->getPesertaDidiksRelatedByPekerjaanIdWali($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pekerjaan is new, it will return
     * an empty collection; or if this Pekerjaan has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByPekerjaanIdWali from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pekerjaan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByPekerjaanIdWaliJoinJenjangPendidikanRelatedByJenjangPendidikanWali($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('JenjangPendidikanRelatedByJenjangPendidikanWali', $join_behavior);

        return $this->getPesertaDidiksRelatedByPekerjaanIdWali($query, $con);
    }

    /**
     * Clears out the collPtks collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Pekerjaan The current object (for fluent API support)
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
     * If this Pekerjaan is new, it will return
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
                    ->filterByPekerjaan($this)
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
     * @return Pekerjaan The current object (for fluent API support)
     */
    public function setPtks(PropelCollection $ptks, PropelPDO $con = null)
    {
        $ptksToDelete = $this->getPtks(new Criteria(), $con)->diff($ptks);

        $this->ptksScheduledForDeletion = unserialize(serialize($ptksToDelete));

        foreach ($ptksToDelete as $ptkRemoved) {
            $ptkRemoved->setPekerjaan(null);
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
                ->filterByPekerjaan($this)
                ->count($con);
        }

        return count($this->collPtks);
    }

    /**
     * Method called to associate a Ptk object to this object
     * through the Ptk foreign key attribute.
     *
     * @param    Ptk $l Ptk
     * @return Pekerjaan The current object (for fluent API support)
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
        $ptk->setPekerjaan($this);
    }

    /**
     * @param	Ptk $ptk The ptk object to remove.
     * @return Pekerjaan The current object (for fluent API support)
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
            $ptk->setPekerjaan(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pekerjaan is new, it will return
     * an empty collection; or if this Pekerjaan has previously
     * been saved, it will retrieve related Ptks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pekerjaan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Ptk[] List of Ptk objects
     */
    public function getPtksJoinNegara($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PtkQuery::create(null, $criteria);
        $query->joinWith('Negara', $join_behavior);

        return $this->getPtks($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pekerjaan is new, it will return
     * an empty collection; or if this Pekerjaan has previously
     * been saved, it will retrieve related Ptks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pekerjaan.
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
     * Otherwise if this Pekerjaan is new, it will return
     * an empty collection; or if this Pekerjaan has previously
     * been saved, it will retrieve related Ptks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pekerjaan.
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
     * Otherwise if this Pekerjaan is new, it will return
     * an empty collection; or if this Pekerjaan has previously
     * been saved, it will retrieve related Ptks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pekerjaan.
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
     * Otherwise if this Pekerjaan is new, it will return
     * an empty collection; or if this Pekerjaan has previously
     * been saved, it will retrieve related Ptks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pekerjaan.
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
     * Otherwise if this Pekerjaan is new, it will return
     * an empty collection; or if this Pekerjaan has previously
     * been saved, it will retrieve related Ptks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pekerjaan.
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
     * Otherwise if this Pekerjaan is new, it will return
     * an empty collection; or if this Pekerjaan has previously
     * been saved, it will retrieve related Ptks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pekerjaan.
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
     * Otherwise if this Pekerjaan is new, it will return
     * an empty collection; or if this Pekerjaan has previously
     * been saved, it will retrieve related Ptks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pekerjaan.
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
     * Otherwise if this Pekerjaan is new, it will return
     * an empty collection; or if this Pekerjaan has previously
     * been saved, it will retrieve related Ptks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pekerjaan.
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
     * Otherwise if this Pekerjaan is new, it will return
     * an empty collection; or if this Pekerjaan has previously
     * been saved, it will retrieve related Ptks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pekerjaan.
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
     * Otherwise if this Pekerjaan is new, it will return
     * an empty collection; or if this Pekerjaan has previously
     * been saved, it will retrieve related Ptks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pekerjaan.
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
     * Otherwise if this Pekerjaan is new, it will return
     * an empty collection; or if this Pekerjaan has previously
     * been saved, it will retrieve related Ptks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pekerjaan.
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
     * Otherwise if this Pekerjaan is new, it will return
     * an empty collection; or if this Pekerjaan has previously
     * been saved, it will retrieve related Ptks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pekerjaan.
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
     * Otherwise if this Pekerjaan is new, it will return
     * an empty collection; or if this Pekerjaan has previously
     * been saved, it will retrieve related Ptks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pekerjaan.
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
     * Clears out the collTracerLulusans collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Pekerjaan The current object (for fluent API support)
     * @see        addTracerLulusans()
     */
    public function clearTracerLulusans()
    {
        $this->collTracerLulusans = null; // important to set this to null since that means it is uninitialized
        $this->collTracerLulusansPartial = null;

        return $this;
    }

    /**
     * reset is the collTracerLulusans collection loaded partially
     *
     * @return void
     */
    public function resetPartialTracerLulusans($v = true)
    {
        $this->collTracerLulusansPartial = $v;
    }

    /**
     * Initializes the collTracerLulusans collection.
     *
     * By default this just sets the collTracerLulusans collection to an empty array (like clearcollTracerLulusans());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initTracerLulusans($overrideExisting = true)
    {
        if (null !== $this->collTracerLulusans && !$overrideExisting) {
            return;
        }
        $this->collTracerLulusans = new PropelObjectCollection();
        $this->collTracerLulusans->setModel('TracerLulusan');
    }

    /**
     * Gets an array of TracerLulusan objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Pekerjaan is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|TracerLulusan[] List of TracerLulusan objects
     * @throws PropelException
     */
    public function getTracerLulusans($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collTracerLulusansPartial && !$this->isNew();
        if (null === $this->collTracerLulusans || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collTracerLulusans) {
                // return empty collection
                $this->initTracerLulusans();
            } else {
                $collTracerLulusans = TracerLulusanQuery::create(null, $criteria)
                    ->filterByPekerjaan($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collTracerLulusansPartial && count($collTracerLulusans)) {
                      $this->initTracerLulusans(false);

                      foreach($collTracerLulusans as $obj) {
                        if (false == $this->collTracerLulusans->contains($obj)) {
                          $this->collTracerLulusans->append($obj);
                        }
                      }

                      $this->collTracerLulusansPartial = true;
                    }

                    $collTracerLulusans->getInternalIterator()->rewind();
                    return $collTracerLulusans;
                }

                if($partial && $this->collTracerLulusans) {
                    foreach($this->collTracerLulusans as $obj) {
                        if($obj->isNew()) {
                            $collTracerLulusans[] = $obj;
                        }
                    }
                }

                $this->collTracerLulusans = $collTracerLulusans;
                $this->collTracerLulusansPartial = false;
            }
        }

        return $this->collTracerLulusans;
    }

    /**
     * Sets a collection of TracerLulusan objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $tracerLulusans A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Pekerjaan The current object (for fluent API support)
     */
    public function setTracerLulusans(PropelCollection $tracerLulusans, PropelPDO $con = null)
    {
        $tracerLulusansToDelete = $this->getTracerLulusans(new Criteria(), $con)->diff($tracerLulusans);

        $this->tracerLulusansScheduledForDeletion = unserialize(serialize($tracerLulusansToDelete));

        foreach ($tracerLulusansToDelete as $tracerLulusanRemoved) {
            $tracerLulusanRemoved->setPekerjaan(null);
        }

        $this->collTracerLulusans = null;
        foreach ($tracerLulusans as $tracerLulusan) {
            $this->addTracerLulusan($tracerLulusan);
        }

        $this->collTracerLulusans = $tracerLulusans;
        $this->collTracerLulusansPartial = false;

        return $this;
    }

    /**
     * Returns the number of related TracerLulusan objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related TracerLulusan objects.
     * @throws PropelException
     */
    public function countTracerLulusans(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collTracerLulusansPartial && !$this->isNew();
        if (null === $this->collTracerLulusans || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collTracerLulusans) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getTracerLulusans());
            }
            $query = TracerLulusanQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPekerjaan($this)
                ->count($con);
        }

        return count($this->collTracerLulusans);
    }

    /**
     * Method called to associate a TracerLulusan object to this object
     * through the TracerLulusan foreign key attribute.
     *
     * @param    TracerLulusan $l TracerLulusan
     * @return Pekerjaan The current object (for fluent API support)
     */
    public function addTracerLulusan(TracerLulusan $l)
    {
        if ($this->collTracerLulusans === null) {
            $this->initTracerLulusans();
            $this->collTracerLulusansPartial = true;
        }
        if (!in_array($l, $this->collTracerLulusans->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddTracerLulusan($l);
        }

        return $this;
    }

    /**
     * @param	TracerLulusan $tracerLulusan The tracerLulusan object to add.
     */
    protected function doAddTracerLulusan($tracerLulusan)
    {
        $this->collTracerLulusans[]= $tracerLulusan;
        $tracerLulusan->setPekerjaan($this);
    }

    /**
     * @param	TracerLulusan $tracerLulusan The tracerLulusan object to remove.
     * @return Pekerjaan The current object (for fluent API support)
     */
    public function removeTracerLulusan($tracerLulusan)
    {
        if ($this->getTracerLulusans()->contains($tracerLulusan)) {
            $this->collTracerLulusans->remove($this->collTracerLulusans->search($tracerLulusan));
            if (null === $this->tracerLulusansScheduledForDeletion) {
                $this->tracerLulusansScheduledForDeletion = clone $this->collTracerLulusans;
                $this->tracerLulusansScheduledForDeletion->clear();
            }
            $this->tracerLulusansScheduledForDeletion[]= $tracerLulusan;
            $tracerLulusan->setPekerjaan(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pekerjaan is new, it will return
     * an empty collection; or if this Pekerjaan has previously
     * been saved, it will retrieve related TracerLulusans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pekerjaan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|TracerLulusan[] List of TracerLulusan objects
     */
    public function getTracerLulusansJoinPenghasilan($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TracerLulusanQuery::create(null, $criteria);
        $query->joinWith('Penghasilan', $join_behavior);

        return $this->getTracerLulusans($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pekerjaan is new, it will return
     * an empty collection; or if this Pekerjaan has previously
     * been saved, it will retrieve related TracerLulusans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pekerjaan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|TracerLulusan[] List of TracerLulusan objects
     */
    public function getTracerLulusansJoinBidangUsaha($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TracerLulusanQuery::create(null, $criteria);
        $query->joinWith('BidangUsaha', $join_behavior);

        return $this->getTracerLulusans($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pekerjaan is new, it will return
     * an empty collection; or if this Pekerjaan has previously
     * been saved, it will retrieve related TracerLulusans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pekerjaan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|TracerLulusan[] List of TracerLulusan objects
     */
    public function getTracerLulusansJoinDudi($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TracerLulusanQuery::create(null, $criteria);
        $query->joinWith('Dudi', $join_behavior);

        return $this->getTracerLulusans($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pekerjaan is new, it will return
     * an empty collection; or if this Pekerjaan has previously
     * been saved, it will retrieve related TracerLulusans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pekerjaan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|TracerLulusan[] List of TracerLulusan objects
     */
    public function getTracerLulusansJoinRegistrasiPesertaDidik($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TracerLulusanQuery::create(null, $criteria);
        $query->joinWith('RegistrasiPesertaDidik', $join_behavior);

        return $this->getTracerLulusans($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->pekerjaan_id = null;
        $this->nama = null;
        $this->a_wirausaha = null;
        $this->a_pejabat_publik = null;
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
            if ($this->collPesertaDidiksRelatedByPekerjaanId) {
                foreach ($this->collPesertaDidiksRelatedByPekerjaanId as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collPesertaDidiksRelatedByPekerjaanIdAyah) {
                foreach ($this->collPesertaDidiksRelatedByPekerjaanIdAyah as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collPesertaDidiksRelatedByPekerjaanIdIbu) {
                foreach ($this->collPesertaDidiksRelatedByPekerjaanIdIbu as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collPesertaDidiksRelatedByPekerjaanIdWali) {
                foreach ($this->collPesertaDidiksRelatedByPekerjaanIdWali as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collPtks) {
                foreach ($this->collPtks as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collTracerLulusans) {
                foreach ($this->collTracerLulusans as $o) {
                    $o->clearAllReferences($deep);
                }
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collPesertaDidiksRelatedByPekerjaanId instanceof PropelCollection) {
            $this->collPesertaDidiksRelatedByPekerjaanId->clearIterator();
        }
        $this->collPesertaDidiksRelatedByPekerjaanId = null;
        if ($this->collPesertaDidiksRelatedByPekerjaanIdAyah instanceof PropelCollection) {
            $this->collPesertaDidiksRelatedByPekerjaanIdAyah->clearIterator();
        }
        $this->collPesertaDidiksRelatedByPekerjaanIdAyah = null;
        if ($this->collPesertaDidiksRelatedByPekerjaanIdIbu instanceof PropelCollection) {
            $this->collPesertaDidiksRelatedByPekerjaanIdIbu->clearIterator();
        }
        $this->collPesertaDidiksRelatedByPekerjaanIdIbu = null;
        if ($this->collPesertaDidiksRelatedByPekerjaanIdWali instanceof PropelCollection) {
            $this->collPesertaDidiksRelatedByPekerjaanIdWali->clearIterator();
        }
        $this->collPesertaDidiksRelatedByPekerjaanIdWali = null;
        if ($this->collPtks instanceof PropelCollection) {
            $this->collPtks->clearIterator();
        }
        $this->collPtks = null;
        if ($this->collTracerLulusans instanceof PropelCollection) {
            $this->collTracerLulusans->clearIterator();
        }
        $this->collTracerLulusans = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(PekerjaanPeer::DEFAULT_STRING_FORMAT);
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
