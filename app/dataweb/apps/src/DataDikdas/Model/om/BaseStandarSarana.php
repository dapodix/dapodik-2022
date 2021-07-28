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
use \PropelDateTime;
use \PropelException;
use \PropelPDO;
use DataDikdas\Model\BentukPendidikan;
use DataDikdas\Model\BentukPendidikanQuery;
use DataDikdas\Model\JenisPrasarana;
use DataDikdas\Model\JenisPrasaranaQuery;
use DataDikdas\Model\JenisSarana;
use DataDikdas\Model\JenisSaranaQuery;
use DataDikdas\Model\Jurusan;
use DataDikdas\Model\JurusanQuery;
use DataDikdas\Model\StandarSarana;
use DataDikdas\Model\StandarSaranaPeer;
use DataDikdas\Model\StandarSaranaQuery;

/**
 * Base class that represents a row from the 'ref.standar_sarana' table.
 *
 * 
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseStandarSarana extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'DataDikdas\\Model\\StandarSaranaPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        StandarSaranaPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the id_std_sarana field.
     * @var        string
     */
    protected $id_std_sarana;

    /**
     * The value for the jenis_prasarana_id field.
     * @var        int
     */
    protected $jenis_prasarana_id;

    /**
     * The value for the jenis_sarana_id field.
     * @var        int
     */
    protected $jenis_sarana_id;

    /**
     * The value for the jurusan_id field.
     * @var        string
     */
    protected $jurusan_id;

    /**
     * The value for the bentuk_pendidikan_id field.
     * @var        int
     */
    protected $bentuk_pendidikan_id;

    /**
     * The value for the a_harus_ada field.
     * @var        string
     */
    protected $a_harus_ada;

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
     * @var        JenisSarana
     */
    protected $aJenisSarana;

    /**
     * @var        BentukPendidikan
     */
    protected $aBentukPendidikan;

    /**
     * @var        JenisPrasarana
     */
    protected $aJenisPrasarana;

    /**
     * @var        Jurusan
     */
    protected $aJurusan;

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
     * Initializes internal state of BaseStandarSarana object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [id_std_sarana] column value.
     * 
     * @return string
     */
    public function getIdStdSarana()
    {
        return $this->id_std_sarana;
    }

    /**
     * Get the [jenis_prasarana_id] column value.
     * 
     * @return int
     */
    public function getJenisPrasaranaId()
    {
        return $this->jenis_prasarana_id;
    }

    /**
     * Get the [jenis_sarana_id] column value.
     * 
     * @return int
     */
    public function getJenisSaranaId()
    {
        return $this->jenis_sarana_id;
    }

    /**
     * Get the [jurusan_id] column value.
     * 
     * @return string
     */
    public function getJurusanId()
    {
        return $this->jurusan_id;
    }

    /**
     * Get the [bentuk_pendidikan_id] column value.
     * 
     * @return int
     */
    public function getBentukPendidikanId()
    {
        return $this->bentuk_pendidikan_id;
    }

    /**
     * Get the [a_harus_ada] column value.
     * 
     * @return string
     */
    public function getAHarusAda()
    {
        return $this->a_harus_ada;
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
     * Set the value of [id_std_sarana] column.
     * 
     * @param string $v new value
     * @return StandarSarana The current object (for fluent API support)
     */
    public function setIdStdSarana($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->id_std_sarana !== $v) {
            $this->id_std_sarana = $v;
            $this->modifiedColumns[] = StandarSaranaPeer::ID_STD_SARANA;
        }


        return $this;
    } // setIdStdSarana()

    /**
     * Set the value of [jenis_prasarana_id] column.
     * 
     * @param int $v new value
     * @return StandarSarana The current object (for fluent API support)
     */
    public function setJenisPrasaranaId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->jenis_prasarana_id !== $v) {
            $this->jenis_prasarana_id = $v;
            $this->modifiedColumns[] = StandarSaranaPeer::JENIS_PRASARANA_ID;
        }

        if ($this->aJenisPrasarana !== null && $this->aJenisPrasarana->getJenisPrasaranaId() !== $v) {
            $this->aJenisPrasarana = null;
        }


        return $this;
    } // setJenisPrasaranaId()

    /**
     * Set the value of [jenis_sarana_id] column.
     * 
     * @param int $v new value
     * @return StandarSarana The current object (for fluent API support)
     */
    public function setJenisSaranaId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->jenis_sarana_id !== $v) {
            $this->jenis_sarana_id = $v;
            $this->modifiedColumns[] = StandarSaranaPeer::JENIS_SARANA_ID;
        }

        if ($this->aJenisSarana !== null && $this->aJenisSarana->getJenisSaranaId() !== $v) {
            $this->aJenisSarana = null;
        }


        return $this;
    } // setJenisSaranaId()

    /**
     * Set the value of [jurusan_id] column.
     * 
     * @param string $v new value
     * @return StandarSarana The current object (for fluent API support)
     */
    public function setJurusanId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->jurusan_id !== $v) {
            $this->jurusan_id = $v;
            $this->modifiedColumns[] = StandarSaranaPeer::JURUSAN_ID;
        }

        if ($this->aJurusan !== null && $this->aJurusan->getJurusanId() !== $v) {
            $this->aJurusan = null;
        }


        return $this;
    } // setJurusanId()

    /**
     * Set the value of [bentuk_pendidikan_id] column.
     * 
     * @param int $v new value
     * @return StandarSarana The current object (for fluent API support)
     */
    public function setBentukPendidikanId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->bentuk_pendidikan_id !== $v) {
            $this->bentuk_pendidikan_id = $v;
            $this->modifiedColumns[] = StandarSaranaPeer::BENTUK_PENDIDIKAN_ID;
        }

        if ($this->aBentukPendidikan !== null && $this->aBentukPendidikan->getBentukPendidikanId() !== $v) {
            $this->aBentukPendidikan = null;
        }


        return $this;
    } // setBentukPendidikanId()

    /**
     * Set the value of [a_harus_ada] column.
     * 
     * @param string $v new value
     * @return StandarSarana The current object (for fluent API support)
     */
    public function setAHarusAda($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->a_harus_ada !== $v) {
            $this->a_harus_ada = $v;
            $this->modifiedColumns[] = StandarSaranaPeer::A_HARUS_ADA;
        }


        return $this;
    } // setAHarusAda()

    /**
     * Sets the value of [create_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return StandarSarana The current object (for fluent API support)
     */
    public function setCreateDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->create_date !== null || $dt !== null) {
            $currentDateAsString = ($this->create_date !== null && $tmpDt = new DateTime($this->create_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->create_date = $newDateAsString;
                $this->modifiedColumns[] = StandarSaranaPeer::CREATE_DATE;
            }
        } // if either are not null


        return $this;
    } // setCreateDate()

    /**
     * Sets the value of [last_update] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return StandarSarana The current object (for fluent API support)
     */
    public function setLastUpdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->last_update !== null || $dt !== null) {
            $currentDateAsString = ($this->last_update !== null && $tmpDt = new DateTime($this->last_update)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->last_update = $newDateAsString;
                $this->modifiedColumns[] = StandarSaranaPeer::LAST_UPDATE;
            }
        } // if either are not null


        return $this;
    } // setLastUpdate()

    /**
     * Sets the value of [expired_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return StandarSarana The current object (for fluent API support)
     */
    public function setExpiredDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->expired_date !== null || $dt !== null) {
            $currentDateAsString = ($this->expired_date !== null && $tmpDt = new DateTime($this->expired_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->expired_date = $newDateAsString;
                $this->modifiedColumns[] = StandarSaranaPeer::EXPIRED_DATE;
            }
        } // if either are not null


        return $this;
    } // setExpiredDate()

    /**
     * Sets the value of [last_sync] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return StandarSarana The current object (for fluent API support)
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
                $this->modifiedColumns[] = StandarSaranaPeer::LAST_SYNC;
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

            $this->id_std_sarana = ($row[$startcol + 0] !== null) ? (string) $row[$startcol + 0] : null;
            $this->jenis_prasarana_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->jenis_sarana_id = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
            $this->jurusan_id = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->bentuk_pendidikan_id = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
            $this->a_harus_ada = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->create_date = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->last_update = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->expired_date = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->last_sync = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 10; // 10 = StandarSaranaPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating StandarSarana object", $e);
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

        if ($this->aJenisPrasarana !== null && $this->jenis_prasarana_id !== $this->aJenisPrasarana->getJenisPrasaranaId()) {
            $this->aJenisPrasarana = null;
        }
        if ($this->aJenisSarana !== null && $this->jenis_sarana_id !== $this->aJenisSarana->getJenisSaranaId()) {
            $this->aJenisSarana = null;
        }
        if ($this->aJurusan !== null && $this->jurusan_id !== $this->aJurusan->getJurusanId()) {
            $this->aJurusan = null;
        }
        if ($this->aBentukPendidikan !== null && $this->bentuk_pendidikan_id !== $this->aBentukPendidikan->getBentukPendidikanId()) {
            $this->aBentukPendidikan = null;
        }
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
            $con = Propel::getConnection(StandarSaranaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = StandarSaranaPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aJenisSarana = null;
            $this->aBentukPendidikan = null;
            $this->aJenisPrasarana = null;
            $this->aJurusan = null;
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
            $con = Propel::getConnection(StandarSaranaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = StandarSaranaQuery::create()
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
            $con = Propel::getConnection(StandarSaranaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                StandarSaranaPeer::addInstanceToPool($this);
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

            // We call the save method on the following object(s) if they
            // were passed to this object by their coresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aJenisSarana !== null) {
                if ($this->aJenisSarana->isModified() || $this->aJenisSarana->isNew()) {
                    $affectedRows += $this->aJenisSarana->save($con);
                }
                $this->setJenisSarana($this->aJenisSarana);
            }

            if ($this->aBentukPendidikan !== null) {
                if ($this->aBentukPendidikan->isModified() || $this->aBentukPendidikan->isNew()) {
                    $affectedRows += $this->aBentukPendidikan->save($con);
                }
                $this->setBentukPendidikan($this->aBentukPendidikan);
            }

            if ($this->aJenisPrasarana !== null) {
                if ($this->aJenisPrasarana->isModified() || $this->aJenisPrasarana->isNew()) {
                    $affectedRows += $this->aJenisPrasarana->save($con);
                }
                $this->setJenisPrasarana($this->aJenisPrasarana);
            }

            if ($this->aJurusan !== null) {
                if ($this->aJurusan->isModified() || $this->aJurusan->isNew()) {
                    $affectedRows += $this->aJurusan->save($con);
                }
                $this->setJurusan($this->aJurusan);
            }

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
        if ($this->isColumnModified(StandarSaranaPeer::ID_STD_SARANA)) {
            $modifiedColumns[':p' . $index++]  = '"id_std_sarana"';
        }
        if ($this->isColumnModified(StandarSaranaPeer::JENIS_PRASARANA_ID)) {
            $modifiedColumns[':p' . $index++]  = '"jenis_prasarana_id"';
        }
        if ($this->isColumnModified(StandarSaranaPeer::JENIS_SARANA_ID)) {
            $modifiedColumns[':p' . $index++]  = '"jenis_sarana_id"';
        }
        if ($this->isColumnModified(StandarSaranaPeer::JURUSAN_ID)) {
            $modifiedColumns[':p' . $index++]  = '"jurusan_id"';
        }
        if ($this->isColumnModified(StandarSaranaPeer::BENTUK_PENDIDIKAN_ID)) {
            $modifiedColumns[':p' . $index++]  = '"bentuk_pendidikan_id"';
        }
        if ($this->isColumnModified(StandarSaranaPeer::A_HARUS_ADA)) {
            $modifiedColumns[':p' . $index++]  = '"a_harus_ada"';
        }
        if ($this->isColumnModified(StandarSaranaPeer::CREATE_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"create_date"';
        }
        if ($this->isColumnModified(StandarSaranaPeer::LAST_UPDATE)) {
            $modifiedColumns[':p' . $index++]  = '"last_update"';
        }
        if ($this->isColumnModified(StandarSaranaPeer::EXPIRED_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"expired_date"';
        }
        if ($this->isColumnModified(StandarSaranaPeer::LAST_SYNC)) {
            $modifiedColumns[':p' . $index++]  = '"last_sync"';
        }

        $sql = sprintf(
            'INSERT INTO "ref"."standar_sarana" (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '"id_std_sarana"':						
                        $stmt->bindValue($identifier, $this->id_std_sarana, PDO::PARAM_STR);
                        break;
                    case '"jenis_prasarana_id"':						
                        $stmt->bindValue($identifier, $this->jenis_prasarana_id, PDO::PARAM_INT);
                        break;
                    case '"jenis_sarana_id"':						
                        $stmt->bindValue($identifier, $this->jenis_sarana_id, PDO::PARAM_INT);
                        break;
                    case '"jurusan_id"':						
                        $stmt->bindValue($identifier, $this->jurusan_id, PDO::PARAM_STR);
                        break;
                    case '"bentuk_pendidikan_id"':						
                        $stmt->bindValue($identifier, $this->bentuk_pendidikan_id, PDO::PARAM_INT);
                        break;
                    case '"a_harus_ada"':						
                        $stmt->bindValue($identifier, $this->a_harus_ada, PDO::PARAM_STR);
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


            // We call the validate method on the following object(s) if they
            // were passed to this object by their coresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aJenisSarana !== null) {
                if (!$this->aJenisSarana->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aJenisSarana->getValidationFailures());
                }
            }

            if ($this->aBentukPendidikan !== null) {
                if (!$this->aBentukPendidikan->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aBentukPendidikan->getValidationFailures());
                }
            }

            if ($this->aJenisPrasarana !== null) {
                if (!$this->aJenisPrasarana->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aJenisPrasarana->getValidationFailures());
                }
            }

            if ($this->aJurusan !== null) {
                if (!$this->aJurusan->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aJurusan->getValidationFailures());
                }
            }


            if (($retval = StandarSaranaPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
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
        $pos = StandarSaranaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdStdSarana();
                break;
            case 1:
                return $this->getJenisPrasaranaId();
                break;
            case 2:
                return $this->getJenisSaranaId();
                break;
            case 3:
                return $this->getJurusanId();
                break;
            case 4:
                return $this->getBentukPendidikanId();
                break;
            case 5:
                return $this->getAHarusAda();
                break;
            case 6:
                return $this->getCreateDate();
                break;
            case 7:
                return $this->getLastUpdate();
                break;
            case 8:
                return $this->getExpiredDate();
                break;
            case 9:
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
        if (isset($alreadyDumpedObjects['StandarSarana'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['StandarSarana'][$this->getPrimaryKey()] = true;
        $keys = StandarSaranaPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdStdSarana(),
            $keys[1] => $this->getJenisPrasaranaId(),
            $keys[2] => $this->getJenisSaranaId(),
            $keys[3] => $this->getJurusanId(),
            $keys[4] => $this->getBentukPendidikanId(),
            $keys[5] => $this->getAHarusAda(),
            $keys[6] => $this->getCreateDate(),
            $keys[7] => $this->getLastUpdate(),
            $keys[8] => $this->getExpiredDate(),
            $keys[9] => $this->getLastSync(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aJenisSarana) {
                $result['JenisSarana'] = $this->aJenisSarana->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aBentukPendidikan) {
                $result['BentukPendidikan'] = $this->aBentukPendidikan->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aJenisPrasarana) {
                $result['JenisPrasarana'] = $this->aJenisPrasarana->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aJurusan) {
                $result['Jurusan'] = $this->aJurusan->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
        $pos = StandarSaranaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdStdSarana($value);
                break;
            case 1:
                $this->setJenisPrasaranaId($value);
                break;
            case 2:
                $this->setJenisSaranaId($value);
                break;
            case 3:
                $this->setJurusanId($value);
                break;
            case 4:
                $this->setBentukPendidikanId($value);
                break;
            case 5:
                $this->setAHarusAda($value);
                break;
            case 6:
                $this->setCreateDate($value);
                break;
            case 7:
                $this->setLastUpdate($value);
                break;
            case 8:
                $this->setExpiredDate($value);
                break;
            case 9:
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
        $keys = StandarSaranaPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdStdSarana($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setJenisPrasaranaId($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setJenisSaranaId($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setJurusanId($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setBentukPendidikanId($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setAHarusAda($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setCreateDate($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setLastUpdate($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setExpiredDate($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setLastSync($arr[$keys[9]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(StandarSaranaPeer::DATABASE_NAME);

        if ($this->isColumnModified(StandarSaranaPeer::ID_STD_SARANA)) $criteria->add(StandarSaranaPeer::ID_STD_SARANA, $this->id_std_sarana);
        if ($this->isColumnModified(StandarSaranaPeer::JENIS_PRASARANA_ID)) $criteria->add(StandarSaranaPeer::JENIS_PRASARANA_ID, $this->jenis_prasarana_id);
        if ($this->isColumnModified(StandarSaranaPeer::JENIS_SARANA_ID)) $criteria->add(StandarSaranaPeer::JENIS_SARANA_ID, $this->jenis_sarana_id);
        if ($this->isColumnModified(StandarSaranaPeer::JURUSAN_ID)) $criteria->add(StandarSaranaPeer::JURUSAN_ID, $this->jurusan_id);
        if ($this->isColumnModified(StandarSaranaPeer::BENTUK_PENDIDIKAN_ID)) $criteria->add(StandarSaranaPeer::BENTUK_PENDIDIKAN_ID, $this->bentuk_pendidikan_id);
        if ($this->isColumnModified(StandarSaranaPeer::A_HARUS_ADA)) $criteria->add(StandarSaranaPeer::A_HARUS_ADA, $this->a_harus_ada);
        if ($this->isColumnModified(StandarSaranaPeer::CREATE_DATE)) $criteria->add(StandarSaranaPeer::CREATE_DATE, $this->create_date);
        if ($this->isColumnModified(StandarSaranaPeer::LAST_UPDATE)) $criteria->add(StandarSaranaPeer::LAST_UPDATE, $this->last_update);
        if ($this->isColumnModified(StandarSaranaPeer::EXPIRED_DATE)) $criteria->add(StandarSaranaPeer::EXPIRED_DATE, $this->expired_date);
        if ($this->isColumnModified(StandarSaranaPeer::LAST_SYNC)) $criteria->add(StandarSaranaPeer::LAST_SYNC, $this->last_sync);

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
        $criteria = new Criteria(StandarSaranaPeer::DATABASE_NAME);
        $criteria->add(StandarSaranaPeer::ID_STD_SARANA, $this->id_std_sarana);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return string
     */
    public function getPrimaryKey()
    {
        return $this->getIdStdSarana();
    }

    /**
     * Generic method to set the primary key (id_std_sarana column).
     *
     * @param  string $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdStdSarana($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdStdSarana();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of StandarSarana (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setJenisPrasaranaId($this->getJenisPrasaranaId());
        $copyObj->setJenisSaranaId($this->getJenisSaranaId());
        $copyObj->setJurusanId($this->getJurusanId());
        $copyObj->setBentukPendidikanId($this->getBentukPendidikanId());
        $copyObj->setAHarusAda($this->getAHarusAda());
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

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdStdSarana(NULL); // this is a auto-increment column, so set to default value
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
     * @return StandarSarana Clone of current object.
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
     * @return StandarSaranaPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new StandarSaranaPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a JenisSarana object.
     *
     * @param             JenisSarana $v
     * @return StandarSarana The current object (for fluent API support)
     * @throws PropelException
     */
    public function setJenisSarana(JenisSarana $v = null)
    {
        if ($v === null) {
            $this->setJenisSaranaId(NULL);
        } else {
            $this->setJenisSaranaId($v->getJenisSaranaId());
        }

        $this->aJenisSarana = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the JenisSarana object, it will not be re-added.
        if ($v !== null) {
            $v->addStandarSarana($this);
        }


        return $this;
    }


    /**
     * Get the associated JenisSarana object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return JenisSarana The associated JenisSarana object.
     * @throws PropelException
     */
    public function getJenisSarana(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aJenisSarana === null && ($this->jenis_sarana_id !== null) && $doQuery) {
            $this->aJenisSarana = JenisSaranaQuery::create()->findPk($this->jenis_sarana_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aJenisSarana->addStandarSaranas($this);
             */
        }

        return $this->aJenisSarana;
    }

    /**
     * Declares an association between this object and a BentukPendidikan object.
     *
     * @param             BentukPendidikan $v
     * @return StandarSarana The current object (for fluent API support)
     * @throws PropelException
     */
    public function setBentukPendidikan(BentukPendidikan $v = null)
    {
        if ($v === null) {
            $this->setBentukPendidikanId(NULL);
        } else {
            $this->setBentukPendidikanId($v->getBentukPendidikanId());
        }

        $this->aBentukPendidikan = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the BentukPendidikan object, it will not be re-added.
        if ($v !== null) {
            $v->addStandarSarana($this);
        }


        return $this;
    }


    /**
     * Get the associated BentukPendidikan object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return BentukPendidikan The associated BentukPendidikan object.
     * @throws PropelException
     */
    public function getBentukPendidikan(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aBentukPendidikan === null && ($this->bentuk_pendidikan_id !== null) && $doQuery) {
            $this->aBentukPendidikan = BentukPendidikanQuery::create()->findPk($this->bentuk_pendidikan_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aBentukPendidikan->addStandarSaranas($this);
             */
        }

        return $this->aBentukPendidikan;
    }

    /**
     * Declares an association between this object and a JenisPrasarana object.
     *
     * @param             JenisPrasarana $v
     * @return StandarSarana The current object (for fluent API support)
     * @throws PropelException
     */
    public function setJenisPrasarana(JenisPrasarana $v = null)
    {
        if ($v === null) {
            $this->setJenisPrasaranaId(NULL);
        } else {
            $this->setJenisPrasaranaId($v->getJenisPrasaranaId());
        }

        $this->aJenisPrasarana = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the JenisPrasarana object, it will not be re-added.
        if ($v !== null) {
            $v->addStandarSarana($this);
        }


        return $this;
    }


    /**
     * Get the associated JenisPrasarana object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return JenisPrasarana The associated JenisPrasarana object.
     * @throws PropelException
     */
    public function getJenisPrasarana(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aJenisPrasarana === null && ($this->jenis_prasarana_id !== null) && $doQuery) {
            $this->aJenisPrasarana = JenisPrasaranaQuery::create()->findPk($this->jenis_prasarana_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aJenisPrasarana->addStandarSaranas($this);
             */
        }

        return $this->aJenisPrasarana;
    }

    /**
     * Declares an association between this object and a Jurusan object.
     *
     * @param             Jurusan $v
     * @return StandarSarana The current object (for fluent API support)
     * @throws PropelException
     */
    public function setJurusan(Jurusan $v = null)
    {
        if ($v === null) {
            $this->setJurusanId(NULL);
        } else {
            $this->setJurusanId($v->getJurusanId());
        }

        $this->aJurusan = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Jurusan object, it will not be re-added.
        if ($v !== null) {
            $v->addStandarSarana($this);
        }


        return $this;
    }


    /**
     * Get the associated Jurusan object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Jurusan The associated Jurusan object.
     * @throws PropelException
     */
    public function getJurusan(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aJurusan === null && (($this->jurusan_id !== "" && $this->jurusan_id !== null)) && $doQuery) {
            $this->aJurusan = JurusanQuery::create()->findPk($this->jurusan_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aJurusan->addStandarSaranas($this);
             */
        }

        return $this->aJurusan;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id_std_sarana = null;
        $this->jenis_prasarana_id = null;
        $this->jenis_sarana_id = null;
        $this->jurusan_id = null;
        $this->bentuk_pendidikan_id = null;
        $this->a_harus_ada = null;
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
            if ($this->aJenisSarana instanceof Persistent) {
              $this->aJenisSarana->clearAllReferences($deep);
            }
            if ($this->aBentukPendidikan instanceof Persistent) {
              $this->aBentukPendidikan->clearAllReferences($deep);
            }
            if ($this->aJenisPrasarana instanceof Persistent) {
              $this->aJenisPrasarana->clearAllReferences($deep);
            }
            if ($this->aJurusan instanceof Persistent) {
              $this->aJurusan->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        $this->aJenisSarana = null;
        $this->aBentukPendidikan = null;
        $this->aJenisPrasarana = null;
        $this->aJurusan = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(StandarSaranaPeer::DEFAULT_STRING_FORMAT);
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
