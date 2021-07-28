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
use DataDikdas\Model\Bangunan;
use DataDikdas\Model\BangunanQuery;
use DataDikdas\Model\JenisPrasarana;
use DataDikdas\Model\JenisPrasaranaPeer;
use DataDikdas\Model\JenisPrasaranaQuery;
use DataDikdas\Model\PemakaiPrasarana;
use DataDikdas\Model\PemakaiPrasaranaQuery;
use DataDikdas\Model\Ruang;
use DataDikdas\Model\RuangQuery;
use DataDikdas\Model\StandarSarana;
use DataDikdas\Model\StandarSaranaQuery;
use DataDikdas\Model\Tanah;
use DataDikdas\Model\TanahQuery;

/**
 * Base class that represents a row from the 'ref.jenis_prasarana' table.
 *
 * 
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseJenisPrasarana extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'DataDikdas\\Model\\JenisPrasaranaPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        JenisPrasaranaPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the jenis_prasarana_id field.
     * @var        int
     */
    protected $jenis_prasarana_id;

    /**
     * The value for the nama field.
     * @var        string
     */
    protected $nama;

    /**
     * The value for the a_unit_organisasi field.
     * Note: this column has a database default value of: '0'
     * @var        string
     */
    protected $a_unit_organisasi;

    /**
     * The value for the a_tanah field.
     * Note: this column has a database default value of: '0'
     * @var        string
     */
    protected $a_tanah;

    /**
     * The value for the a_bangunan field.
     * Note: this column has a database default value of: '0'
     * @var        string
     */
    protected $a_bangunan;

    /**
     * The value for the a_ruang field.
     * Note: this column has a database default value of: '0'
     * @var        string
     */
    protected $a_ruang;

    /**
     * The value for the a_sub field.
     * @var        string
     */
    protected $a_sub;

    /**
     * The value for the create_date field.
     * Note: this column has a database default value of: '2021-06-07 11:49:57'
     * @var        string
     */
    protected $create_date;

    /**
     * The value for the last_update field.
     * Note: this column has a database default value of: '2021-06-07 11:49:57'
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
     * @var        PropelObjectCollection|Bangunan[] Collection to store aggregation of Bangunan objects.
     */
    protected $collBangunans;
    protected $collBangunansPartial;

    /**
     * @var        PropelObjectCollection|PemakaiPrasarana[] Collection to store aggregation of PemakaiPrasarana objects.
     */
    protected $collPemakaiPrasaranas;
    protected $collPemakaiPrasaranasPartial;

    /**
     * @var        PropelObjectCollection|Ruang[] Collection to store aggregation of Ruang objects.
     */
    protected $collRuangs;
    protected $collRuangsPartial;

    /**
     * @var        PropelObjectCollection|StandarSarana[] Collection to store aggregation of StandarSarana objects.
     */
    protected $collStandarSaranas;
    protected $collStandarSaranasPartial;

    /**
     * @var        PropelObjectCollection|Tanah[] Collection to store aggregation of Tanah objects.
     */
    protected $collTanahs;
    protected $collTanahsPartial;

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
    protected $bangunansScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $pemakaiPrasaranasScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $ruangsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $standarSaranasScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $tanahsScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->a_unit_organisasi = '0';
        $this->a_tanah = '0';
        $this->a_bangunan = '0';
        $this->a_ruang = '0';
        $this->create_date = '2021-06-07 11:49:57';
        $this->last_update = '2021-06-07 11:49:57';
        $this->last_sync = '1901-01-01 00:00:00';
    }

    /**
     * Initializes internal state of BaseJenisPrasarana object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
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
     * Get the [nama] column value.
     * 
     * @return string
     */
    public function getNama()
    {
        return $this->nama;
    }

    /**
     * Get the [a_unit_organisasi] column value.
     * 
     * @return string
     */
    public function getAUnitOrganisasi()
    {
        return $this->a_unit_organisasi;
    }

    /**
     * Get the [a_tanah] column value.
     * 
     * @return string
     */
    public function getATanah()
    {
        return $this->a_tanah;
    }

    /**
     * Get the [a_bangunan] column value.
     * 
     * @return string
     */
    public function getABangunan()
    {
        return $this->a_bangunan;
    }

    /**
     * Get the [a_ruang] column value.
     * 
     * @return string
     */
    public function getARuang()
    {
        return $this->a_ruang;
    }

    /**
     * Get the [a_sub] column value.
     * 
     * @return string
     */
    public function getASub()
    {
        return $this->a_sub;
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
     * Set the value of [jenis_prasarana_id] column.
     * 
     * @param int $v new value
     * @return JenisPrasarana The current object (for fluent API support)
     */
    public function setJenisPrasaranaId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->jenis_prasarana_id !== $v) {
            $this->jenis_prasarana_id = $v;
            $this->modifiedColumns[] = JenisPrasaranaPeer::JENIS_PRASARANA_ID;
        }


        return $this;
    } // setJenisPrasaranaId()

    /**
     * Set the value of [nama] column.
     * 
     * @param string $v new value
     * @return JenisPrasarana The current object (for fluent API support)
     */
    public function setNama($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nama !== $v) {
            $this->nama = $v;
            $this->modifiedColumns[] = JenisPrasaranaPeer::NAMA;
        }


        return $this;
    } // setNama()

    /**
     * Set the value of [a_unit_organisasi] column.
     * 
     * @param string $v new value
     * @return JenisPrasarana The current object (for fluent API support)
     */
    public function setAUnitOrganisasi($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->a_unit_organisasi !== $v) {
            $this->a_unit_organisasi = $v;
            $this->modifiedColumns[] = JenisPrasaranaPeer::A_UNIT_ORGANISASI;
        }


        return $this;
    } // setAUnitOrganisasi()

    /**
     * Set the value of [a_tanah] column.
     * 
     * @param string $v new value
     * @return JenisPrasarana The current object (for fluent API support)
     */
    public function setATanah($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->a_tanah !== $v) {
            $this->a_tanah = $v;
            $this->modifiedColumns[] = JenisPrasaranaPeer::A_TANAH;
        }


        return $this;
    } // setATanah()

    /**
     * Set the value of [a_bangunan] column.
     * 
     * @param string $v new value
     * @return JenisPrasarana The current object (for fluent API support)
     */
    public function setABangunan($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->a_bangunan !== $v) {
            $this->a_bangunan = $v;
            $this->modifiedColumns[] = JenisPrasaranaPeer::A_BANGUNAN;
        }


        return $this;
    } // setABangunan()

    /**
     * Set the value of [a_ruang] column.
     * 
     * @param string $v new value
     * @return JenisPrasarana The current object (for fluent API support)
     */
    public function setARuang($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->a_ruang !== $v) {
            $this->a_ruang = $v;
            $this->modifiedColumns[] = JenisPrasaranaPeer::A_RUANG;
        }


        return $this;
    } // setARuang()

    /**
     * Set the value of [a_sub] column.
     * 
     * @param string $v new value
     * @return JenisPrasarana The current object (for fluent API support)
     */
    public function setASub($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->a_sub !== $v) {
            $this->a_sub = $v;
            $this->modifiedColumns[] = JenisPrasaranaPeer::A_SUB;
        }


        return $this;
    } // setASub()

    /**
     * Sets the value of [create_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return JenisPrasarana The current object (for fluent API support)
     */
    public function setCreateDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->create_date !== null || $dt !== null) {
            $currentDateAsString = ($this->create_date !== null && $tmpDt = new DateTime($this->create_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ( ($currentDateAsString !== $newDateAsString) // normalized values don't match
                || ($dt->format('Y-m-d H:i:s') === '2021-06-07 11:49:57') // or the entered value matches the default
                 ) {
                $this->create_date = $newDateAsString;
                $this->modifiedColumns[] = JenisPrasaranaPeer::CREATE_DATE;
            }
        } // if either are not null


        return $this;
    } // setCreateDate()

    /**
     * Sets the value of [last_update] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return JenisPrasarana The current object (for fluent API support)
     */
    public function setLastUpdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->last_update !== null || $dt !== null) {
            $currentDateAsString = ($this->last_update !== null && $tmpDt = new DateTime($this->last_update)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ( ($currentDateAsString !== $newDateAsString) // normalized values don't match
                || ($dt->format('Y-m-d H:i:s') === '2021-06-07 11:49:57') // or the entered value matches the default
                 ) {
                $this->last_update = $newDateAsString;
                $this->modifiedColumns[] = JenisPrasaranaPeer::LAST_UPDATE;
            }
        } // if either are not null


        return $this;
    } // setLastUpdate()

    /**
     * Sets the value of [expired_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return JenisPrasarana The current object (for fluent API support)
     */
    public function setExpiredDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->expired_date !== null || $dt !== null) {
            $currentDateAsString = ($this->expired_date !== null && $tmpDt = new DateTime($this->expired_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->expired_date = $newDateAsString;
                $this->modifiedColumns[] = JenisPrasaranaPeer::EXPIRED_DATE;
            }
        } // if either are not null


        return $this;
    } // setExpiredDate()

    /**
     * Sets the value of [last_sync] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return JenisPrasarana The current object (for fluent API support)
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
                $this->modifiedColumns[] = JenisPrasaranaPeer::LAST_SYNC;
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
            if ($this->a_unit_organisasi !== '0') {
                return false;
            }

            if ($this->a_tanah !== '0') {
                return false;
            }

            if ($this->a_bangunan !== '0') {
                return false;
            }

            if ($this->a_ruang !== '0') {
                return false;
            }

            if ($this->create_date !== '2021-06-07 11:49:57') {
                return false;
            }

            if ($this->last_update !== '2021-06-07 11:49:57') {
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

            $this->jenis_prasarana_id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->nama = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->a_unit_organisasi = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->a_tanah = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->a_bangunan = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->a_ruang = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->a_sub = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->create_date = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->last_update = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->expired_date = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
            $this->last_sync = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 11; // 11 = JenisPrasaranaPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating JenisPrasarana object", $e);
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
            $con = Propel::getConnection(JenisPrasaranaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = JenisPrasaranaPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->collBangunans = null;

            $this->collPemakaiPrasaranas = null;

            $this->collRuangs = null;

            $this->collStandarSaranas = null;

            $this->collTanahs = null;

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
            $con = Propel::getConnection(JenisPrasaranaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = JenisPrasaranaQuery::create()
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
            $con = Propel::getConnection(JenisPrasaranaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                JenisPrasaranaPeer::addInstanceToPool($this);
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

            if ($this->bangunansScheduledForDeletion !== null) {
                if (!$this->bangunansScheduledForDeletion->isEmpty()) {
                    BangunanQuery::create()
                        ->filterByPrimaryKeys($this->bangunansScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->bangunansScheduledForDeletion = null;
                }
            }

            if ($this->collBangunans !== null) {
                foreach ($this->collBangunans as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->pemakaiPrasaranasScheduledForDeletion !== null) {
                if (!$this->pemakaiPrasaranasScheduledForDeletion->isEmpty()) {
                    PemakaiPrasaranaQuery::create()
                        ->filterByPrimaryKeys($this->pemakaiPrasaranasScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->pemakaiPrasaranasScheduledForDeletion = null;
                }
            }

            if ($this->collPemakaiPrasaranas !== null) {
                foreach ($this->collPemakaiPrasaranas as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->ruangsScheduledForDeletion !== null) {
                if (!$this->ruangsScheduledForDeletion->isEmpty()) {
                    RuangQuery::create()
                        ->filterByPrimaryKeys($this->ruangsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->ruangsScheduledForDeletion = null;
                }
            }

            if ($this->collRuangs !== null) {
                foreach ($this->collRuangs as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->standarSaranasScheduledForDeletion !== null) {
                if (!$this->standarSaranasScheduledForDeletion->isEmpty()) {
                    StandarSaranaQuery::create()
                        ->filterByPrimaryKeys($this->standarSaranasScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->standarSaranasScheduledForDeletion = null;
                }
            }

            if ($this->collStandarSaranas !== null) {
                foreach ($this->collStandarSaranas as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->tanahsScheduledForDeletion !== null) {
                if (!$this->tanahsScheduledForDeletion->isEmpty()) {
                    TanahQuery::create()
                        ->filterByPrimaryKeys($this->tanahsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->tanahsScheduledForDeletion = null;
                }
            }

            if ($this->collTanahs !== null) {
                foreach ($this->collTanahs as $referrerFK) {
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
        if ($this->isColumnModified(JenisPrasaranaPeer::JENIS_PRASARANA_ID)) {
            $modifiedColumns[':p' . $index++]  = '"jenis_prasarana_id"';
        }
        if ($this->isColumnModified(JenisPrasaranaPeer::NAMA)) {
            $modifiedColumns[':p' . $index++]  = '"nama"';
        }
        if ($this->isColumnModified(JenisPrasaranaPeer::A_UNIT_ORGANISASI)) {
            $modifiedColumns[':p' . $index++]  = '"a_unit_organisasi"';
        }
        if ($this->isColumnModified(JenisPrasaranaPeer::A_TANAH)) {
            $modifiedColumns[':p' . $index++]  = '"a_tanah"';
        }
        if ($this->isColumnModified(JenisPrasaranaPeer::A_BANGUNAN)) {
            $modifiedColumns[':p' . $index++]  = '"a_bangunan"';
        }
        if ($this->isColumnModified(JenisPrasaranaPeer::A_RUANG)) {
            $modifiedColumns[':p' . $index++]  = '"a_ruang"';
        }
        if ($this->isColumnModified(JenisPrasaranaPeer::A_SUB)) {
            $modifiedColumns[':p' . $index++]  = '"a_sub"';
        }
        if ($this->isColumnModified(JenisPrasaranaPeer::CREATE_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"create_date"';
        }
        if ($this->isColumnModified(JenisPrasaranaPeer::LAST_UPDATE)) {
            $modifiedColumns[':p' . $index++]  = '"last_update"';
        }
        if ($this->isColumnModified(JenisPrasaranaPeer::EXPIRED_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"expired_date"';
        }
        if ($this->isColumnModified(JenisPrasaranaPeer::LAST_SYNC)) {
            $modifiedColumns[':p' . $index++]  = '"last_sync"';
        }

        $sql = sprintf(
            'INSERT INTO "ref"."jenis_prasarana" (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '"jenis_prasarana_id"':						
                        $stmt->bindValue($identifier, $this->jenis_prasarana_id, PDO::PARAM_INT);
                        break;
                    case '"nama"':						
                        $stmt->bindValue($identifier, $this->nama, PDO::PARAM_STR);
                        break;
                    case '"a_unit_organisasi"':						
                        $stmt->bindValue($identifier, $this->a_unit_organisasi, PDO::PARAM_STR);
                        break;
                    case '"a_tanah"':						
                        $stmt->bindValue($identifier, $this->a_tanah, PDO::PARAM_STR);
                        break;
                    case '"a_bangunan"':						
                        $stmt->bindValue($identifier, $this->a_bangunan, PDO::PARAM_STR);
                        break;
                    case '"a_ruang"':						
                        $stmt->bindValue($identifier, $this->a_ruang, PDO::PARAM_STR);
                        break;
                    case '"a_sub"':						
                        $stmt->bindValue($identifier, $this->a_sub, PDO::PARAM_STR);
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


            if (($retval = JenisPrasaranaPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collBangunans !== null) {
                    foreach ($this->collBangunans as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collPemakaiPrasaranas !== null) {
                    foreach ($this->collPemakaiPrasaranas as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collRuangs !== null) {
                    foreach ($this->collRuangs as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collStandarSaranas !== null) {
                    foreach ($this->collStandarSaranas as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collTanahs !== null) {
                    foreach ($this->collTanahs as $referrerFK) {
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
        $pos = JenisPrasaranaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getJenisPrasaranaId();
                break;
            case 1:
                return $this->getNama();
                break;
            case 2:
                return $this->getAUnitOrganisasi();
                break;
            case 3:
                return $this->getATanah();
                break;
            case 4:
                return $this->getABangunan();
                break;
            case 5:
                return $this->getARuang();
                break;
            case 6:
                return $this->getASub();
                break;
            case 7:
                return $this->getCreateDate();
                break;
            case 8:
                return $this->getLastUpdate();
                break;
            case 9:
                return $this->getExpiredDate();
                break;
            case 10:
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
        if (isset($alreadyDumpedObjects['JenisPrasarana'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['JenisPrasarana'][$this->getPrimaryKey()] = true;
        $keys = JenisPrasaranaPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getJenisPrasaranaId(),
            $keys[1] => $this->getNama(),
            $keys[2] => $this->getAUnitOrganisasi(),
            $keys[3] => $this->getATanah(),
            $keys[4] => $this->getABangunan(),
            $keys[5] => $this->getARuang(),
            $keys[6] => $this->getASub(),
            $keys[7] => $this->getCreateDate(),
            $keys[8] => $this->getLastUpdate(),
            $keys[9] => $this->getExpiredDate(),
            $keys[10] => $this->getLastSync(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->collBangunans) {
                $result['Bangunans'] = $this->collBangunans->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collPemakaiPrasaranas) {
                $result['PemakaiPrasaranas'] = $this->collPemakaiPrasaranas->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collRuangs) {
                $result['Ruangs'] = $this->collRuangs->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collStandarSaranas) {
                $result['StandarSaranas'] = $this->collStandarSaranas->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collTanahs) {
                $result['Tanahs'] = $this->collTanahs->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = JenisPrasaranaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setJenisPrasaranaId($value);
                break;
            case 1:
                $this->setNama($value);
                break;
            case 2:
                $this->setAUnitOrganisasi($value);
                break;
            case 3:
                $this->setATanah($value);
                break;
            case 4:
                $this->setABangunan($value);
                break;
            case 5:
                $this->setARuang($value);
                break;
            case 6:
                $this->setASub($value);
                break;
            case 7:
                $this->setCreateDate($value);
                break;
            case 8:
                $this->setLastUpdate($value);
                break;
            case 9:
                $this->setExpiredDate($value);
                break;
            case 10:
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
        $keys = JenisPrasaranaPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setJenisPrasaranaId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setNama($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setAUnitOrganisasi($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setATanah($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setABangunan($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setARuang($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setASub($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setCreateDate($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setLastUpdate($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setExpiredDate($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setLastSync($arr[$keys[10]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(JenisPrasaranaPeer::DATABASE_NAME);

        if ($this->isColumnModified(JenisPrasaranaPeer::JENIS_PRASARANA_ID)) $criteria->add(JenisPrasaranaPeer::JENIS_PRASARANA_ID, $this->jenis_prasarana_id);
        if ($this->isColumnModified(JenisPrasaranaPeer::NAMA)) $criteria->add(JenisPrasaranaPeer::NAMA, $this->nama);
        if ($this->isColumnModified(JenisPrasaranaPeer::A_UNIT_ORGANISASI)) $criteria->add(JenisPrasaranaPeer::A_UNIT_ORGANISASI, $this->a_unit_organisasi);
        if ($this->isColumnModified(JenisPrasaranaPeer::A_TANAH)) $criteria->add(JenisPrasaranaPeer::A_TANAH, $this->a_tanah);
        if ($this->isColumnModified(JenisPrasaranaPeer::A_BANGUNAN)) $criteria->add(JenisPrasaranaPeer::A_BANGUNAN, $this->a_bangunan);
        if ($this->isColumnModified(JenisPrasaranaPeer::A_RUANG)) $criteria->add(JenisPrasaranaPeer::A_RUANG, $this->a_ruang);
        if ($this->isColumnModified(JenisPrasaranaPeer::A_SUB)) $criteria->add(JenisPrasaranaPeer::A_SUB, $this->a_sub);
        if ($this->isColumnModified(JenisPrasaranaPeer::CREATE_DATE)) $criteria->add(JenisPrasaranaPeer::CREATE_DATE, $this->create_date);
        if ($this->isColumnModified(JenisPrasaranaPeer::LAST_UPDATE)) $criteria->add(JenisPrasaranaPeer::LAST_UPDATE, $this->last_update);
        if ($this->isColumnModified(JenisPrasaranaPeer::EXPIRED_DATE)) $criteria->add(JenisPrasaranaPeer::EXPIRED_DATE, $this->expired_date);
        if ($this->isColumnModified(JenisPrasaranaPeer::LAST_SYNC)) $criteria->add(JenisPrasaranaPeer::LAST_SYNC, $this->last_sync);

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
        $criteria = new Criteria(JenisPrasaranaPeer::DATABASE_NAME);
        $criteria->add(JenisPrasaranaPeer::JENIS_PRASARANA_ID, $this->jenis_prasarana_id);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getJenisPrasaranaId();
    }

    /**
     * Generic method to set the primary key (jenis_prasarana_id column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setJenisPrasaranaId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getJenisPrasaranaId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of JenisPrasarana (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setNama($this->getNama());
        $copyObj->setAUnitOrganisasi($this->getAUnitOrganisasi());
        $copyObj->setATanah($this->getATanah());
        $copyObj->setABangunan($this->getABangunan());
        $copyObj->setARuang($this->getARuang());
        $copyObj->setASub($this->getASub());
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

            foreach ($this->getBangunans() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addBangunan($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getPemakaiPrasaranas() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPemakaiPrasarana($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getRuangs() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addRuang($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getStandarSaranas() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addStandarSarana($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getTanahs() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addTanah($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setJenisPrasaranaId(NULL); // this is a auto-increment column, so set to default value
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
     * @return JenisPrasarana Clone of current object.
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
     * @return JenisPrasaranaPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new JenisPrasaranaPeer();
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
        if ('Bangunan' == $relationName) {
            $this->initBangunans();
        }
        if ('PemakaiPrasarana' == $relationName) {
            $this->initPemakaiPrasaranas();
        }
        if ('Ruang' == $relationName) {
            $this->initRuangs();
        }
        if ('StandarSarana' == $relationName) {
            $this->initStandarSaranas();
        }
        if ('Tanah' == $relationName) {
            $this->initTanahs();
        }
    }

    /**
     * Clears out the collBangunans collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return JenisPrasarana The current object (for fluent API support)
     * @see        addBangunans()
     */
    public function clearBangunans()
    {
        $this->collBangunans = null; // important to set this to null since that means it is uninitialized
        $this->collBangunansPartial = null;

        return $this;
    }

    /**
     * reset is the collBangunans collection loaded partially
     *
     * @return void
     */
    public function resetPartialBangunans($v = true)
    {
        $this->collBangunansPartial = $v;
    }

    /**
     * Initializes the collBangunans collection.
     *
     * By default this just sets the collBangunans collection to an empty array (like clearcollBangunans());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initBangunans($overrideExisting = true)
    {
        if (null !== $this->collBangunans && !$overrideExisting) {
            return;
        }
        $this->collBangunans = new PropelObjectCollection();
        $this->collBangunans->setModel('Bangunan');
    }

    /**
     * Gets an array of Bangunan objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this JenisPrasarana is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Bangunan[] List of Bangunan objects
     * @throws PropelException
     */
    public function getBangunans($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collBangunansPartial && !$this->isNew();
        if (null === $this->collBangunans || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collBangunans) {
                // return empty collection
                $this->initBangunans();
            } else {
                $collBangunans = BangunanQuery::create(null, $criteria)
                    ->filterByJenisPrasarana($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collBangunansPartial && count($collBangunans)) {
                      $this->initBangunans(false);

                      foreach($collBangunans as $obj) {
                        if (false == $this->collBangunans->contains($obj)) {
                          $this->collBangunans->append($obj);
                        }
                      }

                      $this->collBangunansPartial = true;
                    }

                    $collBangunans->getInternalIterator()->rewind();
                    return $collBangunans;
                }

                if($partial && $this->collBangunans) {
                    foreach($this->collBangunans as $obj) {
                        if($obj->isNew()) {
                            $collBangunans[] = $obj;
                        }
                    }
                }

                $this->collBangunans = $collBangunans;
                $this->collBangunansPartial = false;
            }
        }

        return $this->collBangunans;
    }

    /**
     * Sets a collection of Bangunan objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $bangunans A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return JenisPrasarana The current object (for fluent API support)
     */
    public function setBangunans(PropelCollection $bangunans, PropelPDO $con = null)
    {
        $bangunansToDelete = $this->getBangunans(new Criteria(), $con)->diff($bangunans);

        $this->bangunansScheduledForDeletion = unserialize(serialize($bangunansToDelete));

        foreach ($bangunansToDelete as $bangunanRemoved) {
            $bangunanRemoved->setJenisPrasarana(null);
        }

        $this->collBangunans = null;
        foreach ($bangunans as $bangunan) {
            $this->addBangunan($bangunan);
        }

        $this->collBangunans = $bangunans;
        $this->collBangunansPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Bangunan objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Bangunan objects.
     * @throws PropelException
     */
    public function countBangunans(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collBangunansPartial && !$this->isNew();
        if (null === $this->collBangunans || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collBangunans) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getBangunans());
            }
            $query = BangunanQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByJenisPrasarana($this)
                ->count($con);
        }

        return count($this->collBangunans);
    }

    /**
     * Method called to associate a Bangunan object to this object
     * through the Bangunan foreign key attribute.
     *
     * @param    Bangunan $l Bangunan
     * @return JenisPrasarana The current object (for fluent API support)
     */
    public function addBangunan(Bangunan $l)
    {
        if ($this->collBangunans === null) {
            $this->initBangunans();
            $this->collBangunansPartial = true;
        }
        if (!in_array($l, $this->collBangunans->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddBangunan($l);
        }

        return $this;
    }

    /**
     * @param	Bangunan $bangunan The bangunan object to add.
     */
    protected function doAddBangunan($bangunan)
    {
        $this->collBangunans[]= $bangunan;
        $bangunan->setJenisPrasarana($this);
    }

    /**
     * @param	Bangunan $bangunan The bangunan object to remove.
     * @return JenisPrasarana The current object (for fluent API support)
     */
    public function removeBangunan($bangunan)
    {
        if ($this->getBangunans()->contains($bangunan)) {
            $this->collBangunans->remove($this->collBangunans->search($bangunan));
            if (null === $this->bangunansScheduledForDeletion) {
                $this->bangunansScheduledForDeletion = clone $this->collBangunans;
                $this->bangunansScheduledForDeletion->clear();
            }
            $this->bangunansScheduledForDeletion[]= clone $bangunan;
            $bangunan->setJenisPrasarana(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenisPrasarana is new, it will return
     * an empty collection; or if this JenisPrasarana has previously
     * been saved, it will retrieve related Bangunans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenisPrasarana.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Bangunan[] List of Bangunan objects
     */
    public function getBangunansJoinPtk($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = BangunanQuery::create(null, $criteria);
        $query->joinWith('Ptk', $join_behavior);

        return $this->getBangunans($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenisPrasarana is new, it will return
     * an empty collection; or if this JenisPrasarana has previously
     * been saved, it will retrieve related Bangunans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenisPrasarana.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Bangunan[] List of Bangunan objects
     */
    public function getBangunansJoinJenisHapusBuku($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = BangunanQuery::create(null, $criteria);
        $query->joinWith('JenisHapusBuku', $join_behavior);

        return $this->getBangunans($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenisPrasarana is new, it will return
     * an empty collection; or if this JenisPrasarana has previously
     * been saved, it will retrieve related Bangunans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenisPrasarana.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Bangunan[] List of Bangunan objects
     */
    public function getBangunansJoinTanah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = BangunanQuery::create(null, $criteria);
        $query->joinWith('Tanah', $join_behavior);

        return $this->getBangunans($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenisPrasarana is new, it will return
     * an empty collection; or if this JenisPrasarana has previously
     * been saved, it will retrieve related Bangunans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenisPrasarana.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Bangunan[] List of Bangunan objects
     */
    public function getBangunansJoinSekolah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = BangunanQuery::create(null, $criteria);
        $query->joinWith('Sekolah', $join_behavior);

        return $this->getBangunans($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenisPrasarana is new, it will return
     * an empty collection; or if this JenisPrasarana has previously
     * been saved, it will retrieve related Bangunans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenisPrasarana.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Bangunan[] List of Bangunan objects
     */
    public function getBangunansJoinStatusKepemilikanSarpras($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = BangunanQuery::create(null, $criteria);
        $query->joinWith('StatusKepemilikanSarpras', $join_behavior);

        return $this->getBangunans($query, $con);
    }

    /**
     * Clears out the collPemakaiPrasaranas collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return JenisPrasarana The current object (for fluent API support)
     * @see        addPemakaiPrasaranas()
     */
    public function clearPemakaiPrasaranas()
    {
        $this->collPemakaiPrasaranas = null; // important to set this to null since that means it is uninitialized
        $this->collPemakaiPrasaranasPartial = null;

        return $this;
    }

    /**
     * reset is the collPemakaiPrasaranas collection loaded partially
     *
     * @return void
     */
    public function resetPartialPemakaiPrasaranas($v = true)
    {
        $this->collPemakaiPrasaranasPartial = $v;
    }

    /**
     * Initializes the collPemakaiPrasaranas collection.
     *
     * By default this just sets the collPemakaiPrasaranas collection to an empty array (like clearcollPemakaiPrasaranas());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPemakaiPrasaranas($overrideExisting = true)
    {
        if (null !== $this->collPemakaiPrasaranas && !$overrideExisting) {
            return;
        }
        $this->collPemakaiPrasaranas = new PropelObjectCollection();
        $this->collPemakaiPrasaranas->setModel('PemakaiPrasarana');
    }

    /**
     * Gets an array of PemakaiPrasarana objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this JenisPrasarana is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|PemakaiPrasarana[] List of PemakaiPrasarana objects
     * @throws PropelException
     */
    public function getPemakaiPrasaranas($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collPemakaiPrasaranasPartial && !$this->isNew();
        if (null === $this->collPemakaiPrasaranas || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collPemakaiPrasaranas) {
                // return empty collection
                $this->initPemakaiPrasaranas();
            } else {
                $collPemakaiPrasaranas = PemakaiPrasaranaQuery::create(null, $criteria)
                    ->filterByJenisPrasarana($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collPemakaiPrasaranasPartial && count($collPemakaiPrasaranas)) {
                      $this->initPemakaiPrasaranas(false);

                      foreach($collPemakaiPrasaranas as $obj) {
                        if (false == $this->collPemakaiPrasaranas->contains($obj)) {
                          $this->collPemakaiPrasaranas->append($obj);
                        }
                      }

                      $this->collPemakaiPrasaranasPartial = true;
                    }

                    $collPemakaiPrasaranas->getInternalIterator()->rewind();
                    return $collPemakaiPrasaranas;
                }

                if($partial && $this->collPemakaiPrasaranas) {
                    foreach($this->collPemakaiPrasaranas as $obj) {
                        if($obj->isNew()) {
                            $collPemakaiPrasaranas[] = $obj;
                        }
                    }
                }

                $this->collPemakaiPrasaranas = $collPemakaiPrasaranas;
                $this->collPemakaiPrasaranasPartial = false;
            }
        }

        return $this->collPemakaiPrasaranas;
    }

    /**
     * Sets a collection of PemakaiPrasarana objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $pemakaiPrasaranas A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return JenisPrasarana The current object (for fluent API support)
     */
    public function setPemakaiPrasaranas(PropelCollection $pemakaiPrasaranas, PropelPDO $con = null)
    {
        $pemakaiPrasaranasToDelete = $this->getPemakaiPrasaranas(new Criteria(), $con)->diff($pemakaiPrasaranas);

        $this->pemakaiPrasaranasScheduledForDeletion = unserialize(serialize($pemakaiPrasaranasToDelete));

        foreach ($pemakaiPrasaranasToDelete as $pemakaiPrasaranaRemoved) {
            $pemakaiPrasaranaRemoved->setJenisPrasarana(null);
        }

        $this->collPemakaiPrasaranas = null;
        foreach ($pemakaiPrasaranas as $pemakaiPrasarana) {
            $this->addPemakaiPrasarana($pemakaiPrasarana);
        }

        $this->collPemakaiPrasaranas = $pemakaiPrasaranas;
        $this->collPemakaiPrasaranasPartial = false;

        return $this;
    }

    /**
     * Returns the number of related PemakaiPrasarana objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related PemakaiPrasarana objects.
     * @throws PropelException
     */
    public function countPemakaiPrasaranas(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collPemakaiPrasaranasPartial && !$this->isNew();
        if (null === $this->collPemakaiPrasaranas || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPemakaiPrasaranas) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getPemakaiPrasaranas());
            }
            $query = PemakaiPrasaranaQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByJenisPrasarana($this)
                ->count($con);
        }

        return count($this->collPemakaiPrasaranas);
    }

    /**
     * Method called to associate a PemakaiPrasarana object to this object
     * through the PemakaiPrasarana foreign key attribute.
     *
     * @param    PemakaiPrasarana $l PemakaiPrasarana
     * @return JenisPrasarana The current object (for fluent API support)
     */
    public function addPemakaiPrasarana(PemakaiPrasarana $l)
    {
        if ($this->collPemakaiPrasaranas === null) {
            $this->initPemakaiPrasaranas();
            $this->collPemakaiPrasaranasPartial = true;
        }
        if (!in_array($l, $this->collPemakaiPrasaranas->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddPemakaiPrasarana($l);
        }

        return $this;
    }

    /**
     * @param	PemakaiPrasarana $pemakaiPrasarana The pemakaiPrasarana object to add.
     */
    protected function doAddPemakaiPrasarana($pemakaiPrasarana)
    {
        $this->collPemakaiPrasaranas[]= $pemakaiPrasarana;
        $pemakaiPrasarana->setJenisPrasarana($this);
    }

    /**
     * @param	PemakaiPrasarana $pemakaiPrasarana The pemakaiPrasarana object to remove.
     * @return JenisPrasarana The current object (for fluent API support)
     */
    public function removePemakaiPrasarana($pemakaiPrasarana)
    {
        if ($this->getPemakaiPrasaranas()->contains($pemakaiPrasarana)) {
            $this->collPemakaiPrasaranas->remove($this->collPemakaiPrasaranas->search($pemakaiPrasarana));
            if (null === $this->pemakaiPrasaranasScheduledForDeletion) {
                $this->pemakaiPrasaranasScheduledForDeletion = clone $this->collPemakaiPrasaranas;
                $this->pemakaiPrasaranasScheduledForDeletion->clear();
            }
            $this->pemakaiPrasaranasScheduledForDeletion[]= clone $pemakaiPrasarana;
            $pemakaiPrasarana->setJenisPrasarana(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenisPrasarana is new, it will return
     * an empty collection; or if this JenisPrasarana has previously
     * been saved, it will retrieve related PemakaiPrasaranas from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenisPrasarana.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PemakaiPrasarana[] List of PemakaiPrasarana objects
     */
    public function getPemakaiPrasaranasJoinJurusan($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PemakaiPrasaranaQuery::create(null, $criteria);
        $query->joinWith('Jurusan', $join_behavior);

        return $this->getPemakaiPrasaranas($query, $con);
    }

    /**
     * Clears out the collRuangs collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return JenisPrasarana The current object (for fluent API support)
     * @see        addRuangs()
     */
    public function clearRuangs()
    {
        $this->collRuangs = null; // important to set this to null since that means it is uninitialized
        $this->collRuangsPartial = null;

        return $this;
    }

    /**
     * reset is the collRuangs collection loaded partially
     *
     * @return void
     */
    public function resetPartialRuangs($v = true)
    {
        $this->collRuangsPartial = $v;
    }

    /**
     * Initializes the collRuangs collection.
     *
     * By default this just sets the collRuangs collection to an empty array (like clearcollRuangs());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initRuangs($overrideExisting = true)
    {
        if (null !== $this->collRuangs && !$overrideExisting) {
            return;
        }
        $this->collRuangs = new PropelObjectCollection();
        $this->collRuangs->setModel('Ruang');
    }

    /**
     * Gets an array of Ruang objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this JenisPrasarana is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Ruang[] List of Ruang objects
     * @throws PropelException
     */
    public function getRuangs($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collRuangsPartial && !$this->isNew();
        if (null === $this->collRuangs || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collRuangs) {
                // return empty collection
                $this->initRuangs();
            } else {
                $collRuangs = RuangQuery::create(null, $criteria)
                    ->filterByJenisPrasarana($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collRuangsPartial && count($collRuangs)) {
                      $this->initRuangs(false);

                      foreach($collRuangs as $obj) {
                        if (false == $this->collRuangs->contains($obj)) {
                          $this->collRuangs->append($obj);
                        }
                      }

                      $this->collRuangsPartial = true;
                    }

                    $collRuangs->getInternalIterator()->rewind();
                    return $collRuangs;
                }

                if($partial && $this->collRuangs) {
                    foreach($this->collRuangs as $obj) {
                        if($obj->isNew()) {
                            $collRuangs[] = $obj;
                        }
                    }
                }

                $this->collRuangs = $collRuangs;
                $this->collRuangsPartial = false;
            }
        }

        return $this->collRuangs;
    }

    /**
     * Sets a collection of Ruang objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $ruangs A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return JenisPrasarana The current object (for fluent API support)
     */
    public function setRuangs(PropelCollection $ruangs, PropelPDO $con = null)
    {
        $ruangsToDelete = $this->getRuangs(new Criteria(), $con)->diff($ruangs);

        $this->ruangsScheduledForDeletion = unserialize(serialize($ruangsToDelete));

        foreach ($ruangsToDelete as $ruangRemoved) {
            $ruangRemoved->setJenisPrasarana(null);
        }

        $this->collRuangs = null;
        foreach ($ruangs as $ruang) {
            $this->addRuang($ruang);
        }

        $this->collRuangs = $ruangs;
        $this->collRuangsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Ruang objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Ruang objects.
     * @throws PropelException
     */
    public function countRuangs(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collRuangsPartial && !$this->isNew();
        if (null === $this->collRuangs || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collRuangs) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getRuangs());
            }
            $query = RuangQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByJenisPrasarana($this)
                ->count($con);
        }

        return count($this->collRuangs);
    }

    /**
     * Method called to associate a Ruang object to this object
     * through the Ruang foreign key attribute.
     *
     * @param    Ruang $l Ruang
     * @return JenisPrasarana The current object (for fluent API support)
     */
    public function addRuang(Ruang $l)
    {
        if ($this->collRuangs === null) {
            $this->initRuangs();
            $this->collRuangsPartial = true;
        }
        if (!in_array($l, $this->collRuangs->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddRuang($l);
        }

        return $this;
    }

    /**
     * @param	Ruang $ruang The ruang object to add.
     */
    protected function doAddRuang($ruang)
    {
        $this->collRuangs[]= $ruang;
        $ruang->setJenisPrasarana($this);
    }

    /**
     * @param	Ruang $ruang The ruang object to remove.
     * @return JenisPrasarana The current object (for fluent API support)
     */
    public function removeRuang($ruang)
    {
        if ($this->getRuangs()->contains($ruang)) {
            $this->collRuangs->remove($this->collRuangs->search($ruang));
            if (null === $this->ruangsScheduledForDeletion) {
                $this->ruangsScheduledForDeletion = clone $this->collRuangs;
                $this->ruangsScheduledForDeletion->clear();
            }
            $this->ruangsScheduledForDeletion[]= clone $ruang;
            $ruang->setJenisPrasarana(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenisPrasarana is new, it will return
     * an empty collection; or if this JenisPrasarana has previously
     * been saved, it will retrieve related Ruangs from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenisPrasarana.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Ruang[] List of Ruang objects
     */
    public function getRuangsJoinRuangRelatedByParentIdRuang($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = RuangQuery::create(null, $criteria);
        $query->joinWith('RuangRelatedByParentIdRuang', $join_behavior);

        return $this->getRuangs($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenisPrasarana is new, it will return
     * an empty collection; or if this JenisPrasarana has previously
     * been saved, it will retrieve related Ruangs from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenisPrasarana.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Ruang[] List of Ruang objects
     */
    public function getRuangsJoinBangunan($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = RuangQuery::create(null, $criteria);
        $query->joinWith('Bangunan', $join_behavior);

        return $this->getRuangs($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenisPrasarana is new, it will return
     * an empty collection; or if this JenisPrasarana has previously
     * been saved, it will retrieve related Ruangs from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenisPrasarana.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Ruang[] List of Ruang objects
     */
    public function getRuangsJoinSekolah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = RuangQuery::create(null, $criteria);
        $query->joinWith('Sekolah', $join_behavior);

        return $this->getRuangs($query, $con);
    }

    /**
     * Clears out the collStandarSaranas collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return JenisPrasarana The current object (for fluent API support)
     * @see        addStandarSaranas()
     */
    public function clearStandarSaranas()
    {
        $this->collStandarSaranas = null; // important to set this to null since that means it is uninitialized
        $this->collStandarSaranasPartial = null;

        return $this;
    }

    /**
     * reset is the collStandarSaranas collection loaded partially
     *
     * @return void
     */
    public function resetPartialStandarSaranas($v = true)
    {
        $this->collStandarSaranasPartial = $v;
    }

    /**
     * Initializes the collStandarSaranas collection.
     *
     * By default this just sets the collStandarSaranas collection to an empty array (like clearcollStandarSaranas());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initStandarSaranas($overrideExisting = true)
    {
        if (null !== $this->collStandarSaranas && !$overrideExisting) {
            return;
        }
        $this->collStandarSaranas = new PropelObjectCollection();
        $this->collStandarSaranas->setModel('StandarSarana');
    }

    /**
     * Gets an array of StandarSarana objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this JenisPrasarana is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|StandarSarana[] List of StandarSarana objects
     * @throws PropelException
     */
    public function getStandarSaranas($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collStandarSaranasPartial && !$this->isNew();
        if (null === $this->collStandarSaranas || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collStandarSaranas) {
                // return empty collection
                $this->initStandarSaranas();
            } else {
                $collStandarSaranas = StandarSaranaQuery::create(null, $criteria)
                    ->filterByJenisPrasarana($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collStandarSaranasPartial && count($collStandarSaranas)) {
                      $this->initStandarSaranas(false);

                      foreach($collStandarSaranas as $obj) {
                        if (false == $this->collStandarSaranas->contains($obj)) {
                          $this->collStandarSaranas->append($obj);
                        }
                      }

                      $this->collStandarSaranasPartial = true;
                    }

                    $collStandarSaranas->getInternalIterator()->rewind();
                    return $collStandarSaranas;
                }

                if($partial && $this->collStandarSaranas) {
                    foreach($this->collStandarSaranas as $obj) {
                        if($obj->isNew()) {
                            $collStandarSaranas[] = $obj;
                        }
                    }
                }

                $this->collStandarSaranas = $collStandarSaranas;
                $this->collStandarSaranasPartial = false;
            }
        }

        return $this->collStandarSaranas;
    }

    /**
     * Sets a collection of StandarSarana objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $standarSaranas A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return JenisPrasarana The current object (for fluent API support)
     */
    public function setStandarSaranas(PropelCollection $standarSaranas, PropelPDO $con = null)
    {
        $standarSaranasToDelete = $this->getStandarSaranas(new Criteria(), $con)->diff($standarSaranas);

        $this->standarSaranasScheduledForDeletion = unserialize(serialize($standarSaranasToDelete));

        foreach ($standarSaranasToDelete as $standarSaranaRemoved) {
            $standarSaranaRemoved->setJenisPrasarana(null);
        }

        $this->collStandarSaranas = null;
        foreach ($standarSaranas as $standarSarana) {
            $this->addStandarSarana($standarSarana);
        }

        $this->collStandarSaranas = $standarSaranas;
        $this->collStandarSaranasPartial = false;

        return $this;
    }

    /**
     * Returns the number of related StandarSarana objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related StandarSarana objects.
     * @throws PropelException
     */
    public function countStandarSaranas(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collStandarSaranasPartial && !$this->isNew();
        if (null === $this->collStandarSaranas || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collStandarSaranas) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getStandarSaranas());
            }
            $query = StandarSaranaQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByJenisPrasarana($this)
                ->count($con);
        }

        return count($this->collStandarSaranas);
    }

    /**
     * Method called to associate a StandarSarana object to this object
     * through the StandarSarana foreign key attribute.
     *
     * @param    StandarSarana $l StandarSarana
     * @return JenisPrasarana The current object (for fluent API support)
     */
    public function addStandarSarana(StandarSarana $l)
    {
        if ($this->collStandarSaranas === null) {
            $this->initStandarSaranas();
            $this->collStandarSaranasPartial = true;
        }
        if (!in_array($l, $this->collStandarSaranas->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddStandarSarana($l);
        }

        return $this;
    }

    /**
     * @param	StandarSarana $standarSarana The standarSarana object to add.
     */
    protected function doAddStandarSarana($standarSarana)
    {
        $this->collStandarSaranas[]= $standarSarana;
        $standarSarana->setJenisPrasarana($this);
    }

    /**
     * @param	StandarSarana $standarSarana The standarSarana object to remove.
     * @return JenisPrasarana The current object (for fluent API support)
     */
    public function removeStandarSarana($standarSarana)
    {
        if ($this->getStandarSaranas()->contains($standarSarana)) {
            $this->collStandarSaranas->remove($this->collStandarSaranas->search($standarSarana));
            if (null === $this->standarSaranasScheduledForDeletion) {
                $this->standarSaranasScheduledForDeletion = clone $this->collStandarSaranas;
                $this->standarSaranasScheduledForDeletion->clear();
            }
            $this->standarSaranasScheduledForDeletion[]= clone $standarSarana;
            $standarSarana->setJenisPrasarana(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenisPrasarana is new, it will return
     * an empty collection; or if this JenisPrasarana has previously
     * been saved, it will retrieve related StandarSaranas from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenisPrasarana.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|StandarSarana[] List of StandarSarana objects
     */
    public function getStandarSaranasJoinJenisSarana($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = StandarSaranaQuery::create(null, $criteria);
        $query->joinWith('JenisSarana', $join_behavior);

        return $this->getStandarSaranas($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenisPrasarana is new, it will return
     * an empty collection; or if this JenisPrasarana has previously
     * been saved, it will retrieve related StandarSaranas from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenisPrasarana.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|StandarSarana[] List of StandarSarana objects
     */
    public function getStandarSaranasJoinBentukPendidikan($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = StandarSaranaQuery::create(null, $criteria);
        $query->joinWith('BentukPendidikan', $join_behavior);

        return $this->getStandarSaranas($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenisPrasarana is new, it will return
     * an empty collection; or if this JenisPrasarana has previously
     * been saved, it will retrieve related StandarSaranas from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenisPrasarana.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|StandarSarana[] List of StandarSarana objects
     */
    public function getStandarSaranasJoinJurusan($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = StandarSaranaQuery::create(null, $criteria);
        $query->joinWith('Jurusan', $join_behavior);

        return $this->getStandarSaranas($query, $con);
    }

    /**
     * Clears out the collTanahs collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return JenisPrasarana The current object (for fluent API support)
     * @see        addTanahs()
     */
    public function clearTanahs()
    {
        $this->collTanahs = null; // important to set this to null since that means it is uninitialized
        $this->collTanahsPartial = null;

        return $this;
    }

    /**
     * reset is the collTanahs collection loaded partially
     *
     * @return void
     */
    public function resetPartialTanahs($v = true)
    {
        $this->collTanahsPartial = $v;
    }

    /**
     * Initializes the collTanahs collection.
     *
     * By default this just sets the collTanahs collection to an empty array (like clearcollTanahs());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initTanahs($overrideExisting = true)
    {
        if (null !== $this->collTanahs && !$overrideExisting) {
            return;
        }
        $this->collTanahs = new PropelObjectCollection();
        $this->collTanahs->setModel('Tanah');
    }

    /**
     * Gets an array of Tanah objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this JenisPrasarana is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Tanah[] List of Tanah objects
     * @throws PropelException
     */
    public function getTanahs($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collTanahsPartial && !$this->isNew();
        if (null === $this->collTanahs || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collTanahs) {
                // return empty collection
                $this->initTanahs();
            } else {
                $collTanahs = TanahQuery::create(null, $criteria)
                    ->filterByJenisPrasarana($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collTanahsPartial && count($collTanahs)) {
                      $this->initTanahs(false);

                      foreach($collTanahs as $obj) {
                        if (false == $this->collTanahs->contains($obj)) {
                          $this->collTanahs->append($obj);
                        }
                      }

                      $this->collTanahsPartial = true;
                    }

                    $collTanahs->getInternalIterator()->rewind();
                    return $collTanahs;
                }

                if($partial && $this->collTanahs) {
                    foreach($this->collTanahs as $obj) {
                        if($obj->isNew()) {
                            $collTanahs[] = $obj;
                        }
                    }
                }

                $this->collTanahs = $collTanahs;
                $this->collTanahsPartial = false;
            }
        }

        return $this->collTanahs;
    }

    /**
     * Sets a collection of Tanah objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $tanahs A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return JenisPrasarana The current object (for fluent API support)
     */
    public function setTanahs(PropelCollection $tanahs, PropelPDO $con = null)
    {
        $tanahsToDelete = $this->getTanahs(new Criteria(), $con)->diff($tanahs);

        $this->tanahsScheduledForDeletion = unserialize(serialize($tanahsToDelete));

        foreach ($tanahsToDelete as $tanahRemoved) {
            $tanahRemoved->setJenisPrasarana(null);
        }

        $this->collTanahs = null;
        foreach ($tanahs as $tanah) {
            $this->addTanah($tanah);
        }

        $this->collTanahs = $tanahs;
        $this->collTanahsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Tanah objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Tanah objects.
     * @throws PropelException
     */
    public function countTanahs(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collTanahsPartial && !$this->isNew();
        if (null === $this->collTanahs || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collTanahs) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getTanahs());
            }
            $query = TanahQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByJenisPrasarana($this)
                ->count($con);
        }

        return count($this->collTanahs);
    }

    /**
     * Method called to associate a Tanah object to this object
     * through the Tanah foreign key attribute.
     *
     * @param    Tanah $l Tanah
     * @return JenisPrasarana The current object (for fluent API support)
     */
    public function addTanah(Tanah $l)
    {
        if ($this->collTanahs === null) {
            $this->initTanahs();
            $this->collTanahsPartial = true;
        }
        if (!in_array($l, $this->collTanahs->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddTanah($l);
        }

        return $this;
    }

    /**
     * @param	Tanah $tanah The tanah object to add.
     */
    protected function doAddTanah($tanah)
    {
        $this->collTanahs[]= $tanah;
        $tanah->setJenisPrasarana($this);
    }

    /**
     * @param	Tanah $tanah The tanah object to remove.
     * @return JenisPrasarana The current object (for fluent API support)
     */
    public function removeTanah($tanah)
    {
        if ($this->getTanahs()->contains($tanah)) {
            $this->collTanahs->remove($this->collTanahs->search($tanah));
            if (null === $this->tanahsScheduledForDeletion) {
                $this->tanahsScheduledForDeletion = clone $this->collTanahs;
                $this->tanahsScheduledForDeletion->clear();
            }
            $this->tanahsScheduledForDeletion[]= clone $tanah;
            $tanah->setJenisPrasarana(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenisPrasarana is new, it will return
     * an empty collection; or if this JenisPrasarana has previously
     * been saved, it will retrieve related Tanahs from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenisPrasarana.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Tanah[] List of Tanah objects
     */
    public function getTanahsJoinJenisHapusBuku($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TanahQuery::create(null, $criteria);
        $query->joinWith('JenisHapusBuku', $join_behavior);

        return $this->getTanahs($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenisPrasarana is new, it will return
     * an empty collection; or if this JenisPrasarana has previously
     * been saved, it will retrieve related Tanahs from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenisPrasarana.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Tanah[] List of Tanah objects
     */
    public function getTanahsJoinSekolah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TanahQuery::create(null, $criteria);
        $query->joinWith('Sekolah', $join_behavior);

        return $this->getTanahs($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenisPrasarana is new, it will return
     * an empty collection; or if this JenisPrasarana has previously
     * been saved, it will retrieve related Tanahs from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenisPrasarana.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Tanah[] List of Tanah objects
     */
    public function getTanahsJoinStatusKepemilikanSarpras($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TanahQuery::create(null, $criteria);
        $query->joinWith('StatusKepemilikanSarpras', $join_behavior);

        return $this->getTanahs($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenisPrasarana is new, it will return
     * an empty collection; or if this JenisPrasarana has previously
     * been saved, it will retrieve related Tanahs from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenisPrasarana.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Tanah[] List of Tanah objects
     */
    public function getTanahsJoinMstWilayah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TanahQuery::create(null, $criteria);
        $query->joinWith('MstWilayah', $join_behavior);

        return $this->getTanahs($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->jenis_prasarana_id = null;
        $this->nama = null;
        $this->a_unit_organisasi = null;
        $this->a_tanah = null;
        $this->a_bangunan = null;
        $this->a_ruang = null;
        $this->a_sub = null;
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
            if ($this->collBangunans) {
                foreach ($this->collBangunans as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collPemakaiPrasaranas) {
                foreach ($this->collPemakaiPrasaranas as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collRuangs) {
                foreach ($this->collRuangs as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collStandarSaranas) {
                foreach ($this->collStandarSaranas as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collTanahs) {
                foreach ($this->collTanahs as $o) {
                    $o->clearAllReferences($deep);
                }
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collBangunans instanceof PropelCollection) {
            $this->collBangunans->clearIterator();
        }
        $this->collBangunans = null;
        if ($this->collPemakaiPrasaranas instanceof PropelCollection) {
            $this->collPemakaiPrasaranas->clearIterator();
        }
        $this->collPemakaiPrasaranas = null;
        if ($this->collRuangs instanceof PropelCollection) {
            $this->collRuangs->clearIterator();
        }
        $this->collRuangs = null;
        if ($this->collStandarSaranas instanceof PropelCollection) {
            $this->collStandarSaranas->clearIterator();
        }
        $this->collStandarSaranas = null;
        if ($this->collTanahs instanceof PropelCollection) {
            $this->collTanahs->clearIterator();
        }
        $this->collTanahs = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(JenisPrasaranaPeer::DEFAULT_STRING_FORMAT);
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
