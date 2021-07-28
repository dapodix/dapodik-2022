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
use DataDikdas\Model\BentukPendidikan;
use DataDikdas\Model\BentukPendidikanPeer;
use DataDikdas\Model\BentukPendidikanQuery;
use DataDikdas\Model\Peran;
use DataDikdas\Model\PeranQuery;
use DataDikdas\Model\Sekolah;
use DataDikdas\Model\SekolahQuery;
use DataDikdas\Model\StandarSarana;
use DataDikdas\Model\StandarSaranaQuery;

/**
 * Base class that represents a row from the 'ref.bentuk_pendidikan' table.
 *
 * 
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseBentukPendidikan extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'DataDikdas\\Model\\BentukPendidikanPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        BentukPendidikanPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the bentuk_pendidikan_id field.
     * @var        int
     */
    protected $bentuk_pendidikan_id;

    /**
     * The value for the nama field.
     * @var        string
     */
    protected $nama;

    /**
     * The value for the jenjang_paud field.
     * @var        string
     */
    protected $jenjang_paud;

    /**
     * The value for the jenjang_tk field.
     * @var        string
     */
    protected $jenjang_tk;

    /**
     * The value for the jenjang_sd field.
     * @var        string
     */
    protected $jenjang_sd;

    /**
     * The value for the jenjang_smp field.
     * @var        string
     */
    protected $jenjang_smp;

    /**
     * The value for the jenjang_sma field.
     * @var        string
     */
    protected $jenjang_sma;

    /**
     * The value for the jenjang_tinggi field.
     * @var        string
     */
    protected $jenjang_tinggi;

    /**
     * The value for the direktorat_pembinaan field.
     * @var        string
     */
    protected $direktorat_pembinaan;

    /**
     * The value for the aktif field.
     * @var        string
     */
    protected $aktif;

    /**
     * The value for the formalitas_pendidikan field.
     * @var        string
     */
    protected $formalitas_pendidikan;

    /**
     * The value for the create_date field.
     * Note: this column has a database default value of: '2020-04-16 09:40:03'
     * @var        string
     */
    protected $create_date;

    /**
     * The value for the last_update field.
     * Note: this column has a database default value of: '2020-04-16 09:40:03'
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
     * @var        PropelObjectCollection|Peran[] Collection to store aggregation of Peran objects.
     */
    protected $collPerans;
    protected $collPeransPartial;

    /**
     * @var        PropelObjectCollection|Sekolah[] Collection to store aggregation of Sekolah objects.
     */
    protected $collSekolahs;
    protected $collSekolahsPartial;

    /**
     * @var        PropelObjectCollection|StandarSarana[] Collection to store aggregation of StandarSarana objects.
     */
    protected $collStandarSaranas;
    protected $collStandarSaranasPartial;

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
    protected $peransScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $sekolahsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $standarSaranasScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->create_date = '2020-04-16 09:40:03';
        $this->last_update = '2020-04-16 09:40:03';
        $this->last_sync = '1901-01-01 00:00:00';
    }

    /**
     * Initializes internal state of BaseBentukPendidikan object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
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
     * Get the [nama] column value.
     * 
     * @return string
     */
    public function getNama()
    {
        return $this->nama;
    }

    /**
     * Get the [jenjang_paud] column value.
     * 
     * @return string
     */
    public function getJenjangPaud()
    {
        return $this->jenjang_paud;
    }

    /**
     * Get the [jenjang_tk] column value.
     * 
     * @return string
     */
    public function getJenjangTk()
    {
        return $this->jenjang_tk;
    }

    /**
     * Get the [jenjang_sd] column value.
     * 
     * @return string
     */
    public function getJenjangSd()
    {
        return $this->jenjang_sd;
    }

    /**
     * Get the [jenjang_smp] column value.
     * 
     * @return string
     */
    public function getJenjangSmp()
    {
        return $this->jenjang_smp;
    }

    /**
     * Get the [jenjang_sma] column value.
     * 
     * @return string
     */
    public function getJenjangSma()
    {
        return $this->jenjang_sma;
    }

    /**
     * Get the [jenjang_tinggi] column value.
     * 
     * @return string
     */
    public function getJenjangTinggi()
    {
        return $this->jenjang_tinggi;
    }

    /**
     * Get the [direktorat_pembinaan] column value.
     * 
     * @return string
     */
    public function getDirektoratPembinaan()
    {
        return $this->direktorat_pembinaan;
    }

    /**
     * Get the [aktif] column value.
     * 
     * @return string
     */
    public function getAktif()
    {
        return $this->aktif;
    }

    /**
     * Get the [formalitas_pendidikan] column value.
     * 
     * @return string
     */
    public function getFormalitasPendidikan()
    {
        return $this->formalitas_pendidikan;
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
     * Set the value of [bentuk_pendidikan_id] column.
     * 
     * @param int $v new value
     * @return BentukPendidikan The current object (for fluent API support)
     */
    public function setBentukPendidikanId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->bentuk_pendidikan_id !== $v) {
            $this->bentuk_pendidikan_id = $v;
            $this->modifiedColumns[] = BentukPendidikanPeer::BENTUK_PENDIDIKAN_ID;
        }


        return $this;
    } // setBentukPendidikanId()

    /**
     * Set the value of [nama] column.
     * 
     * @param string $v new value
     * @return BentukPendidikan The current object (for fluent API support)
     */
    public function setNama($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nama !== $v) {
            $this->nama = $v;
            $this->modifiedColumns[] = BentukPendidikanPeer::NAMA;
        }


        return $this;
    } // setNama()

    /**
     * Set the value of [jenjang_paud] column.
     * 
     * @param string $v new value
     * @return BentukPendidikan The current object (for fluent API support)
     */
    public function setJenjangPaud($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->jenjang_paud !== $v) {
            $this->jenjang_paud = $v;
            $this->modifiedColumns[] = BentukPendidikanPeer::JENJANG_PAUD;
        }


        return $this;
    } // setJenjangPaud()

    /**
     * Set the value of [jenjang_tk] column.
     * 
     * @param string $v new value
     * @return BentukPendidikan The current object (for fluent API support)
     */
    public function setJenjangTk($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->jenjang_tk !== $v) {
            $this->jenjang_tk = $v;
            $this->modifiedColumns[] = BentukPendidikanPeer::JENJANG_TK;
        }


        return $this;
    } // setJenjangTk()

    /**
     * Set the value of [jenjang_sd] column.
     * 
     * @param string $v new value
     * @return BentukPendidikan The current object (for fluent API support)
     */
    public function setJenjangSd($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->jenjang_sd !== $v) {
            $this->jenjang_sd = $v;
            $this->modifiedColumns[] = BentukPendidikanPeer::JENJANG_SD;
        }


        return $this;
    } // setJenjangSd()

    /**
     * Set the value of [jenjang_smp] column.
     * 
     * @param string $v new value
     * @return BentukPendidikan The current object (for fluent API support)
     */
    public function setJenjangSmp($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->jenjang_smp !== $v) {
            $this->jenjang_smp = $v;
            $this->modifiedColumns[] = BentukPendidikanPeer::JENJANG_SMP;
        }


        return $this;
    } // setJenjangSmp()

    /**
     * Set the value of [jenjang_sma] column.
     * 
     * @param string $v new value
     * @return BentukPendidikan The current object (for fluent API support)
     */
    public function setJenjangSma($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->jenjang_sma !== $v) {
            $this->jenjang_sma = $v;
            $this->modifiedColumns[] = BentukPendidikanPeer::JENJANG_SMA;
        }


        return $this;
    } // setJenjangSma()

    /**
     * Set the value of [jenjang_tinggi] column.
     * 
     * @param string $v new value
     * @return BentukPendidikan The current object (for fluent API support)
     */
    public function setJenjangTinggi($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->jenjang_tinggi !== $v) {
            $this->jenjang_tinggi = $v;
            $this->modifiedColumns[] = BentukPendidikanPeer::JENJANG_TINGGI;
        }


        return $this;
    } // setJenjangTinggi()

    /**
     * Set the value of [direktorat_pembinaan] column.
     * 
     * @param string $v new value
     * @return BentukPendidikan The current object (for fluent API support)
     */
    public function setDirektoratPembinaan($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->direktorat_pembinaan !== $v) {
            $this->direktorat_pembinaan = $v;
            $this->modifiedColumns[] = BentukPendidikanPeer::DIREKTORAT_PEMBINAAN;
        }


        return $this;
    } // setDirektoratPembinaan()

    /**
     * Set the value of [aktif] column.
     * 
     * @param string $v new value
     * @return BentukPendidikan The current object (for fluent API support)
     */
    public function setAktif($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->aktif !== $v) {
            $this->aktif = $v;
            $this->modifiedColumns[] = BentukPendidikanPeer::AKTIF;
        }


        return $this;
    } // setAktif()

    /**
     * Set the value of [formalitas_pendidikan] column.
     * 
     * @param string $v new value
     * @return BentukPendidikan The current object (for fluent API support)
     */
    public function setFormalitasPendidikan($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->formalitas_pendidikan !== $v) {
            $this->formalitas_pendidikan = $v;
            $this->modifiedColumns[] = BentukPendidikanPeer::FORMALITAS_PENDIDIKAN;
        }


        return $this;
    } // setFormalitasPendidikan()

    /**
     * Sets the value of [create_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return BentukPendidikan The current object (for fluent API support)
     */
    public function setCreateDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->create_date !== null || $dt !== null) {
            $currentDateAsString = ($this->create_date !== null && $tmpDt = new DateTime($this->create_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ( ($currentDateAsString !== $newDateAsString) // normalized values don't match
                || ($dt->format('Y-m-d H:i:s') === '2020-04-16 09:40:03') // or the entered value matches the default
                 ) {
                $this->create_date = $newDateAsString;
                $this->modifiedColumns[] = BentukPendidikanPeer::CREATE_DATE;
            }
        } // if either are not null


        return $this;
    } // setCreateDate()

    /**
     * Sets the value of [last_update] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return BentukPendidikan The current object (for fluent API support)
     */
    public function setLastUpdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->last_update !== null || $dt !== null) {
            $currentDateAsString = ($this->last_update !== null && $tmpDt = new DateTime($this->last_update)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ( ($currentDateAsString !== $newDateAsString) // normalized values don't match
                || ($dt->format('Y-m-d H:i:s') === '2020-04-16 09:40:03') // or the entered value matches the default
                 ) {
                $this->last_update = $newDateAsString;
                $this->modifiedColumns[] = BentukPendidikanPeer::LAST_UPDATE;
            }
        } // if either are not null


        return $this;
    } // setLastUpdate()

    /**
     * Sets the value of [expired_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return BentukPendidikan The current object (for fluent API support)
     */
    public function setExpiredDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->expired_date !== null || $dt !== null) {
            $currentDateAsString = ($this->expired_date !== null && $tmpDt = new DateTime($this->expired_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->expired_date = $newDateAsString;
                $this->modifiedColumns[] = BentukPendidikanPeer::EXPIRED_DATE;
            }
        } // if either are not null


        return $this;
    } // setExpiredDate()

    /**
     * Sets the value of [last_sync] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return BentukPendidikan The current object (for fluent API support)
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
                $this->modifiedColumns[] = BentukPendidikanPeer::LAST_SYNC;
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
            if ($this->create_date !== '2020-04-16 09:40:03') {
                return false;
            }

            if ($this->last_update !== '2020-04-16 09:40:03') {
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

            $this->bentuk_pendidikan_id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->nama = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->jenjang_paud = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->jenjang_tk = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->jenjang_sd = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->jenjang_smp = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->jenjang_sma = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->jenjang_tinggi = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->direktorat_pembinaan = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->aktif = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
            $this->formalitas_pendidikan = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
            $this->create_date = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
            $this->last_update = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
            $this->expired_date = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
            $this->last_sync = ($row[$startcol + 14] !== null) ? (string) $row[$startcol + 14] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 15; // 15 = BentukPendidikanPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating BentukPendidikan object", $e);
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
            $con = Propel::getConnection(BentukPendidikanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = BentukPendidikanPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->collPerans = null;

            $this->collSekolahs = null;

            $this->collStandarSaranas = null;

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
            $con = Propel::getConnection(BentukPendidikanPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = BentukPendidikanQuery::create()
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
            $con = Propel::getConnection(BentukPendidikanPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                BentukPendidikanPeer::addInstanceToPool($this);
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

            if ($this->peransScheduledForDeletion !== null) {
                if (!$this->peransScheduledForDeletion->isEmpty()) {
                    PeranQuery::create()
                        ->filterByPrimaryKeys($this->peransScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->peransScheduledForDeletion = null;
                }
            }

            if ($this->collPerans !== null) {
                foreach ($this->collPerans as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->sekolahsScheduledForDeletion !== null) {
                if (!$this->sekolahsScheduledForDeletion->isEmpty()) {
                    SekolahQuery::create()
                        ->filterByPrimaryKeys($this->sekolahsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->sekolahsScheduledForDeletion = null;
                }
            }

            if ($this->collSekolahs !== null) {
                foreach ($this->collSekolahs as $referrerFK) {
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
        if ($this->isColumnModified(BentukPendidikanPeer::BENTUK_PENDIDIKAN_ID)) {
            $modifiedColumns[':p' . $index++]  = '"bentuk_pendidikan_id"';
        }
        if ($this->isColumnModified(BentukPendidikanPeer::NAMA)) {
            $modifiedColumns[':p' . $index++]  = '"nama"';
        }
        if ($this->isColumnModified(BentukPendidikanPeer::JENJANG_PAUD)) {
            $modifiedColumns[':p' . $index++]  = '"jenjang_paud"';
        }
        if ($this->isColumnModified(BentukPendidikanPeer::JENJANG_TK)) {
            $modifiedColumns[':p' . $index++]  = '"jenjang_tk"';
        }
        if ($this->isColumnModified(BentukPendidikanPeer::JENJANG_SD)) {
            $modifiedColumns[':p' . $index++]  = '"jenjang_sd"';
        }
        if ($this->isColumnModified(BentukPendidikanPeer::JENJANG_SMP)) {
            $modifiedColumns[':p' . $index++]  = '"jenjang_smp"';
        }
        if ($this->isColumnModified(BentukPendidikanPeer::JENJANG_SMA)) {
            $modifiedColumns[':p' . $index++]  = '"jenjang_sma"';
        }
        if ($this->isColumnModified(BentukPendidikanPeer::JENJANG_TINGGI)) {
            $modifiedColumns[':p' . $index++]  = '"jenjang_tinggi"';
        }
        if ($this->isColumnModified(BentukPendidikanPeer::DIREKTORAT_PEMBINAAN)) {
            $modifiedColumns[':p' . $index++]  = '"direktorat_pembinaan"';
        }
        if ($this->isColumnModified(BentukPendidikanPeer::AKTIF)) {
            $modifiedColumns[':p' . $index++]  = '"aktif"';
        }
        if ($this->isColumnModified(BentukPendidikanPeer::FORMALITAS_PENDIDIKAN)) {
            $modifiedColumns[':p' . $index++]  = '"formalitas_pendidikan"';
        }
        if ($this->isColumnModified(BentukPendidikanPeer::CREATE_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"create_date"';
        }
        if ($this->isColumnModified(BentukPendidikanPeer::LAST_UPDATE)) {
            $modifiedColumns[':p' . $index++]  = '"last_update"';
        }
        if ($this->isColumnModified(BentukPendidikanPeer::EXPIRED_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"expired_date"';
        }
        if ($this->isColumnModified(BentukPendidikanPeer::LAST_SYNC)) {
            $modifiedColumns[':p' . $index++]  = '"last_sync"';
        }

        $sql = sprintf(
            'INSERT INTO "ref"."bentuk_pendidikan" (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '"bentuk_pendidikan_id"':						
                        $stmt->bindValue($identifier, $this->bentuk_pendidikan_id, PDO::PARAM_INT);
                        break;
                    case '"nama"':						
                        $stmt->bindValue($identifier, $this->nama, PDO::PARAM_STR);
                        break;
                    case '"jenjang_paud"':						
                        $stmt->bindValue($identifier, $this->jenjang_paud, PDO::PARAM_STR);
                        break;
                    case '"jenjang_tk"':						
                        $stmt->bindValue($identifier, $this->jenjang_tk, PDO::PARAM_STR);
                        break;
                    case '"jenjang_sd"':						
                        $stmt->bindValue($identifier, $this->jenjang_sd, PDO::PARAM_STR);
                        break;
                    case '"jenjang_smp"':						
                        $stmt->bindValue($identifier, $this->jenjang_smp, PDO::PARAM_STR);
                        break;
                    case '"jenjang_sma"':						
                        $stmt->bindValue($identifier, $this->jenjang_sma, PDO::PARAM_STR);
                        break;
                    case '"jenjang_tinggi"':						
                        $stmt->bindValue($identifier, $this->jenjang_tinggi, PDO::PARAM_STR);
                        break;
                    case '"direktorat_pembinaan"':						
                        $stmt->bindValue($identifier, $this->direktorat_pembinaan, PDO::PARAM_STR);
                        break;
                    case '"aktif"':						
                        $stmt->bindValue($identifier, $this->aktif, PDO::PARAM_STR);
                        break;
                    case '"formalitas_pendidikan"':						
                        $stmt->bindValue($identifier, $this->formalitas_pendidikan, PDO::PARAM_STR);
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


            if (($retval = BentukPendidikanPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collPerans !== null) {
                    foreach ($this->collPerans as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collSekolahs !== null) {
                    foreach ($this->collSekolahs as $referrerFK) {
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
        $pos = BentukPendidikanPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getBentukPendidikanId();
                break;
            case 1:
                return $this->getNama();
                break;
            case 2:
                return $this->getJenjangPaud();
                break;
            case 3:
                return $this->getJenjangTk();
                break;
            case 4:
                return $this->getJenjangSd();
                break;
            case 5:
                return $this->getJenjangSmp();
                break;
            case 6:
                return $this->getJenjangSma();
                break;
            case 7:
                return $this->getJenjangTinggi();
                break;
            case 8:
                return $this->getDirektoratPembinaan();
                break;
            case 9:
                return $this->getAktif();
                break;
            case 10:
                return $this->getFormalitasPendidikan();
                break;
            case 11:
                return $this->getCreateDate();
                break;
            case 12:
                return $this->getLastUpdate();
                break;
            case 13:
                return $this->getExpiredDate();
                break;
            case 14:
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
        if (isset($alreadyDumpedObjects['BentukPendidikan'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['BentukPendidikan'][$this->getPrimaryKey()] = true;
        $keys = BentukPendidikanPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getBentukPendidikanId(),
            $keys[1] => $this->getNama(),
            $keys[2] => $this->getJenjangPaud(),
            $keys[3] => $this->getJenjangTk(),
            $keys[4] => $this->getJenjangSd(),
            $keys[5] => $this->getJenjangSmp(),
            $keys[6] => $this->getJenjangSma(),
            $keys[7] => $this->getJenjangTinggi(),
            $keys[8] => $this->getDirektoratPembinaan(),
            $keys[9] => $this->getAktif(),
            $keys[10] => $this->getFormalitasPendidikan(),
            $keys[11] => $this->getCreateDate(),
            $keys[12] => $this->getLastUpdate(),
            $keys[13] => $this->getExpiredDate(),
            $keys[14] => $this->getLastSync(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->collPerans) {
                $result['Perans'] = $this->collPerans->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collSekolahs) {
                $result['Sekolahs'] = $this->collSekolahs->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collStandarSaranas) {
                $result['StandarSaranas'] = $this->collStandarSaranas->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = BentukPendidikanPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setBentukPendidikanId($value);
                break;
            case 1:
                $this->setNama($value);
                break;
            case 2:
                $this->setJenjangPaud($value);
                break;
            case 3:
                $this->setJenjangTk($value);
                break;
            case 4:
                $this->setJenjangSd($value);
                break;
            case 5:
                $this->setJenjangSmp($value);
                break;
            case 6:
                $this->setJenjangSma($value);
                break;
            case 7:
                $this->setJenjangTinggi($value);
                break;
            case 8:
                $this->setDirektoratPembinaan($value);
                break;
            case 9:
                $this->setAktif($value);
                break;
            case 10:
                $this->setFormalitasPendidikan($value);
                break;
            case 11:
                $this->setCreateDate($value);
                break;
            case 12:
                $this->setLastUpdate($value);
                break;
            case 13:
                $this->setExpiredDate($value);
                break;
            case 14:
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
        $keys = BentukPendidikanPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setBentukPendidikanId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setNama($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setJenjangPaud($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setJenjangTk($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setJenjangSd($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setJenjangSmp($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setJenjangSma($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setJenjangTinggi($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setDirektoratPembinaan($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setAktif($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setFormalitasPendidikan($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setCreateDate($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setLastUpdate($arr[$keys[12]]);
        if (array_key_exists($keys[13], $arr)) $this->setExpiredDate($arr[$keys[13]]);
        if (array_key_exists($keys[14], $arr)) $this->setLastSync($arr[$keys[14]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(BentukPendidikanPeer::DATABASE_NAME);

        if ($this->isColumnModified(BentukPendidikanPeer::BENTUK_PENDIDIKAN_ID)) $criteria->add(BentukPendidikanPeer::BENTUK_PENDIDIKAN_ID, $this->bentuk_pendidikan_id);
        if ($this->isColumnModified(BentukPendidikanPeer::NAMA)) $criteria->add(BentukPendidikanPeer::NAMA, $this->nama);
        if ($this->isColumnModified(BentukPendidikanPeer::JENJANG_PAUD)) $criteria->add(BentukPendidikanPeer::JENJANG_PAUD, $this->jenjang_paud);
        if ($this->isColumnModified(BentukPendidikanPeer::JENJANG_TK)) $criteria->add(BentukPendidikanPeer::JENJANG_TK, $this->jenjang_tk);
        if ($this->isColumnModified(BentukPendidikanPeer::JENJANG_SD)) $criteria->add(BentukPendidikanPeer::JENJANG_SD, $this->jenjang_sd);
        if ($this->isColumnModified(BentukPendidikanPeer::JENJANG_SMP)) $criteria->add(BentukPendidikanPeer::JENJANG_SMP, $this->jenjang_smp);
        if ($this->isColumnModified(BentukPendidikanPeer::JENJANG_SMA)) $criteria->add(BentukPendidikanPeer::JENJANG_SMA, $this->jenjang_sma);
        if ($this->isColumnModified(BentukPendidikanPeer::JENJANG_TINGGI)) $criteria->add(BentukPendidikanPeer::JENJANG_TINGGI, $this->jenjang_tinggi);
        if ($this->isColumnModified(BentukPendidikanPeer::DIREKTORAT_PEMBINAAN)) $criteria->add(BentukPendidikanPeer::DIREKTORAT_PEMBINAAN, $this->direktorat_pembinaan);
        if ($this->isColumnModified(BentukPendidikanPeer::AKTIF)) $criteria->add(BentukPendidikanPeer::AKTIF, $this->aktif);
        if ($this->isColumnModified(BentukPendidikanPeer::FORMALITAS_PENDIDIKAN)) $criteria->add(BentukPendidikanPeer::FORMALITAS_PENDIDIKAN, $this->formalitas_pendidikan);
        if ($this->isColumnModified(BentukPendidikanPeer::CREATE_DATE)) $criteria->add(BentukPendidikanPeer::CREATE_DATE, $this->create_date);
        if ($this->isColumnModified(BentukPendidikanPeer::LAST_UPDATE)) $criteria->add(BentukPendidikanPeer::LAST_UPDATE, $this->last_update);
        if ($this->isColumnModified(BentukPendidikanPeer::EXPIRED_DATE)) $criteria->add(BentukPendidikanPeer::EXPIRED_DATE, $this->expired_date);
        if ($this->isColumnModified(BentukPendidikanPeer::LAST_SYNC)) $criteria->add(BentukPendidikanPeer::LAST_SYNC, $this->last_sync);

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
        $criteria = new Criteria(BentukPendidikanPeer::DATABASE_NAME);
        $criteria->add(BentukPendidikanPeer::BENTUK_PENDIDIKAN_ID, $this->bentuk_pendidikan_id);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getBentukPendidikanId();
    }

    /**
     * Generic method to set the primary key (bentuk_pendidikan_id column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setBentukPendidikanId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getBentukPendidikanId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of BentukPendidikan (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setNama($this->getNama());
        $copyObj->setJenjangPaud($this->getJenjangPaud());
        $copyObj->setJenjangTk($this->getJenjangTk());
        $copyObj->setJenjangSd($this->getJenjangSd());
        $copyObj->setJenjangSmp($this->getJenjangSmp());
        $copyObj->setJenjangSma($this->getJenjangSma());
        $copyObj->setJenjangTinggi($this->getJenjangTinggi());
        $copyObj->setDirektoratPembinaan($this->getDirektoratPembinaan());
        $copyObj->setAktif($this->getAktif());
        $copyObj->setFormalitasPendidikan($this->getFormalitasPendidikan());
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

            foreach ($this->getPerans() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPeran($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getSekolahs() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSekolah($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getStandarSaranas() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addStandarSarana($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setBentukPendidikanId(NULL); // this is a auto-increment column, so set to default value
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
     * @return BentukPendidikan Clone of current object.
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
     * @return BentukPendidikanPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new BentukPendidikanPeer();
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
        if ('Peran' == $relationName) {
            $this->initPerans();
        }
        if ('Sekolah' == $relationName) {
            $this->initSekolahs();
        }
        if ('StandarSarana' == $relationName) {
            $this->initStandarSaranas();
        }
    }

    /**
     * Clears out the collPerans collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return BentukPendidikan The current object (for fluent API support)
     * @see        addPerans()
     */
    public function clearPerans()
    {
        $this->collPerans = null; // important to set this to null since that means it is uninitialized
        $this->collPeransPartial = null;

        return $this;
    }

    /**
     * reset is the collPerans collection loaded partially
     *
     * @return void
     */
    public function resetPartialPerans($v = true)
    {
        $this->collPeransPartial = $v;
    }

    /**
     * Initializes the collPerans collection.
     *
     * By default this just sets the collPerans collection to an empty array (like clearcollPerans());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPerans($overrideExisting = true)
    {
        if (null !== $this->collPerans && !$overrideExisting) {
            return;
        }
        $this->collPerans = new PropelObjectCollection();
        $this->collPerans->setModel('Peran');
    }

    /**
     * Gets an array of Peran objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this BentukPendidikan is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Peran[] List of Peran objects
     * @throws PropelException
     */
    public function getPerans($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collPeransPartial && !$this->isNew();
        if (null === $this->collPerans || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collPerans) {
                // return empty collection
                $this->initPerans();
            } else {
                $collPerans = PeranQuery::create(null, $criteria)
                    ->filterByBentukPendidikan($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collPeransPartial && count($collPerans)) {
                      $this->initPerans(false);

                      foreach($collPerans as $obj) {
                        if (false == $this->collPerans->contains($obj)) {
                          $this->collPerans->append($obj);
                        }
                      }

                      $this->collPeransPartial = true;
                    }

                    $collPerans->getInternalIterator()->rewind();
                    return $collPerans;
                }

                if($partial && $this->collPerans) {
                    foreach($this->collPerans as $obj) {
                        if($obj->isNew()) {
                            $collPerans[] = $obj;
                        }
                    }
                }

                $this->collPerans = $collPerans;
                $this->collPeransPartial = false;
            }
        }

        return $this->collPerans;
    }

    /**
     * Sets a collection of Peran objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $perans A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return BentukPendidikan The current object (for fluent API support)
     */
    public function setPerans(PropelCollection $perans, PropelPDO $con = null)
    {
        $peransToDelete = $this->getPerans(new Criteria(), $con)->diff($perans);

        $this->peransScheduledForDeletion = unserialize(serialize($peransToDelete));

        foreach ($peransToDelete as $peranRemoved) {
            $peranRemoved->setBentukPendidikan(null);
        }

        $this->collPerans = null;
        foreach ($perans as $peran) {
            $this->addPeran($peran);
        }

        $this->collPerans = $perans;
        $this->collPeransPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Peran objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Peran objects.
     * @throws PropelException
     */
    public function countPerans(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collPeransPartial && !$this->isNew();
        if (null === $this->collPerans || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPerans) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getPerans());
            }
            $query = PeranQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByBentukPendidikan($this)
                ->count($con);
        }

        return count($this->collPerans);
    }

    /**
     * Method called to associate a Peran object to this object
     * through the Peran foreign key attribute.
     *
     * @param    Peran $l Peran
     * @return BentukPendidikan The current object (for fluent API support)
     */
    public function addPeran(Peran $l)
    {
        if ($this->collPerans === null) {
            $this->initPerans();
            $this->collPeransPartial = true;
        }
        if (!in_array($l, $this->collPerans->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddPeran($l);
        }

        return $this;
    }

    /**
     * @param	Peran $peran The peran object to add.
     */
    protected function doAddPeran($peran)
    {
        $this->collPerans[]= $peran;
        $peran->setBentukPendidikan($this);
    }

    /**
     * @param	Peran $peran The peran object to remove.
     * @return BentukPendidikan The current object (for fluent API support)
     */
    public function removePeran($peran)
    {
        if ($this->getPerans()->contains($peran)) {
            $this->collPerans->remove($this->collPerans->search($peran));
            if (null === $this->peransScheduledForDeletion) {
                $this->peransScheduledForDeletion = clone $this->collPerans;
                $this->peransScheduledForDeletion->clear();
            }
            $this->peransScheduledForDeletion[]= clone $peran;
            $peran->setBentukPendidikan(null);
        }

        return $this;
    }

    /**
     * Clears out the collSekolahs collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return BentukPendidikan The current object (for fluent API support)
     * @see        addSekolahs()
     */
    public function clearSekolahs()
    {
        $this->collSekolahs = null; // important to set this to null since that means it is uninitialized
        $this->collSekolahsPartial = null;

        return $this;
    }

    /**
     * reset is the collSekolahs collection loaded partially
     *
     * @return void
     */
    public function resetPartialSekolahs($v = true)
    {
        $this->collSekolahsPartial = $v;
    }

    /**
     * Initializes the collSekolahs collection.
     *
     * By default this just sets the collSekolahs collection to an empty array (like clearcollSekolahs());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initSekolahs($overrideExisting = true)
    {
        if (null !== $this->collSekolahs && !$overrideExisting) {
            return;
        }
        $this->collSekolahs = new PropelObjectCollection();
        $this->collSekolahs->setModel('Sekolah');
    }

    /**
     * Gets an array of Sekolah objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this BentukPendidikan is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Sekolah[] List of Sekolah objects
     * @throws PropelException
     */
    public function getSekolahs($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collSekolahsPartial && !$this->isNew();
        if (null === $this->collSekolahs || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collSekolahs) {
                // return empty collection
                $this->initSekolahs();
            } else {
                $collSekolahs = SekolahQuery::create(null, $criteria)
                    ->filterByBentukPendidikan($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collSekolahsPartial && count($collSekolahs)) {
                      $this->initSekolahs(false);

                      foreach($collSekolahs as $obj) {
                        if (false == $this->collSekolahs->contains($obj)) {
                          $this->collSekolahs->append($obj);
                        }
                      }

                      $this->collSekolahsPartial = true;
                    }

                    $collSekolahs->getInternalIterator()->rewind();
                    return $collSekolahs;
                }

                if($partial && $this->collSekolahs) {
                    foreach($this->collSekolahs as $obj) {
                        if($obj->isNew()) {
                            $collSekolahs[] = $obj;
                        }
                    }
                }

                $this->collSekolahs = $collSekolahs;
                $this->collSekolahsPartial = false;
            }
        }

        return $this->collSekolahs;
    }

    /**
     * Sets a collection of Sekolah objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $sekolahs A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return BentukPendidikan The current object (for fluent API support)
     */
    public function setSekolahs(PropelCollection $sekolahs, PropelPDO $con = null)
    {
        $sekolahsToDelete = $this->getSekolahs(new Criteria(), $con)->diff($sekolahs);

        $this->sekolahsScheduledForDeletion = unserialize(serialize($sekolahsToDelete));

        foreach ($sekolahsToDelete as $sekolahRemoved) {
            $sekolahRemoved->setBentukPendidikan(null);
        }

        $this->collSekolahs = null;
        foreach ($sekolahs as $sekolah) {
            $this->addSekolah($sekolah);
        }

        $this->collSekolahs = $sekolahs;
        $this->collSekolahsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Sekolah objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Sekolah objects.
     * @throws PropelException
     */
    public function countSekolahs(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collSekolahsPartial && !$this->isNew();
        if (null === $this->collSekolahs || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collSekolahs) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getSekolahs());
            }
            $query = SekolahQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByBentukPendidikan($this)
                ->count($con);
        }

        return count($this->collSekolahs);
    }

    /**
     * Method called to associate a Sekolah object to this object
     * through the Sekolah foreign key attribute.
     *
     * @param    Sekolah $l Sekolah
     * @return BentukPendidikan The current object (for fluent API support)
     */
    public function addSekolah(Sekolah $l)
    {
        if ($this->collSekolahs === null) {
            $this->initSekolahs();
            $this->collSekolahsPartial = true;
        }
        if (!in_array($l, $this->collSekolahs->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddSekolah($l);
        }

        return $this;
    }

    /**
     * @param	Sekolah $sekolah The sekolah object to add.
     */
    protected function doAddSekolah($sekolah)
    {
        $this->collSekolahs[]= $sekolah;
        $sekolah->setBentukPendidikan($this);
    }

    /**
     * @param	Sekolah $sekolah The sekolah object to remove.
     * @return BentukPendidikan The current object (for fluent API support)
     */
    public function removeSekolah($sekolah)
    {
        if ($this->getSekolahs()->contains($sekolah)) {
            $this->collSekolahs->remove($this->collSekolahs->search($sekolah));
            if (null === $this->sekolahsScheduledForDeletion) {
                $this->sekolahsScheduledForDeletion = clone $this->collSekolahs;
                $this->sekolahsScheduledForDeletion->clear();
            }
            $this->sekolahsScheduledForDeletion[]= clone $sekolah;
            $sekolah->setBentukPendidikan(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this BentukPendidikan is new, it will return
     * an empty collection; or if this BentukPendidikan has previously
     * been saved, it will retrieve related Sekolahs from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in BentukPendidikan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Sekolah[] List of Sekolah objects
     */
    public function getSekolahsJoinMstWilayah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = SekolahQuery::create(null, $criteria);
        $query->joinWith('MstWilayah', $join_behavior);

        return $this->getSekolahs($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this BentukPendidikan is new, it will return
     * an empty collection; or if this BentukPendidikan has previously
     * been saved, it will retrieve related Sekolahs from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in BentukPendidikan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Sekolah[] List of Sekolah objects
     */
    public function getSekolahsJoinKebutuhanKhusus($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = SekolahQuery::create(null, $criteria);
        $query->joinWith('KebutuhanKhusus', $join_behavior);

        return $this->getSekolahs($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this BentukPendidikan is new, it will return
     * an empty collection; or if this BentukPendidikan has previously
     * been saved, it will retrieve related Sekolahs from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in BentukPendidikan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Sekolah[] List of Sekolah objects
     */
    public function getSekolahsJoinYayasan($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = SekolahQuery::create(null, $criteria);
        $query->joinWith('Yayasan', $join_behavior);

        return $this->getSekolahs($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this BentukPendidikan is new, it will return
     * an empty collection; or if this BentukPendidikan has previously
     * been saved, it will retrieve related Sekolahs from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in BentukPendidikan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Sekolah[] List of Sekolah objects
     */
    public function getSekolahsJoinStatusKepemilikan($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = SekolahQuery::create(null, $criteria);
        $query->joinWith('StatusKepemilikan', $join_behavior);

        return $this->getSekolahs($query, $con);
    }

    /**
     * Clears out the collStandarSaranas collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return BentukPendidikan The current object (for fluent API support)
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
     * If this BentukPendidikan is new, it will return
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
                    ->filterByBentukPendidikan($this)
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
     * @return BentukPendidikan The current object (for fluent API support)
     */
    public function setStandarSaranas(PropelCollection $standarSaranas, PropelPDO $con = null)
    {
        $standarSaranasToDelete = $this->getStandarSaranas(new Criteria(), $con)->diff($standarSaranas);

        $this->standarSaranasScheduledForDeletion = unserialize(serialize($standarSaranasToDelete));

        foreach ($standarSaranasToDelete as $standarSaranaRemoved) {
            $standarSaranaRemoved->setBentukPendidikan(null);
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
                ->filterByBentukPendidikan($this)
                ->count($con);
        }

        return count($this->collStandarSaranas);
    }

    /**
     * Method called to associate a StandarSarana object to this object
     * through the StandarSarana foreign key attribute.
     *
     * @param    StandarSarana $l StandarSarana
     * @return BentukPendidikan The current object (for fluent API support)
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
        $standarSarana->setBentukPendidikan($this);
    }

    /**
     * @param	StandarSarana $standarSarana The standarSarana object to remove.
     * @return BentukPendidikan The current object (for fluent API support)
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
            $standarSarana->setBentukPendidikan(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this BentukPendidikan is new, it will return
     * an empty collection; or if this BentukPendidikan has previously
     * been saved, it will retrieve related StandarSaranas from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in BentukPendidikan.
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
     * Otherwise if this BentukPendidikan is new, it will return
     * an empty collection; or if this BentukPendidikan has previously
     * been saved, it will retrieve related StandarSaranas from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in BentukPendidikan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|StandarSarana[] List of StandarSarana objects
     */
    public function getStandarSaranasJoinJenisPrasarana($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = StandarSaranaQuery::create(null, $criteria);
        $query->joinWith('JenisPrasarana', $join_behavior);

        return $this->getStandarSaranas($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this BentukPendidikan is new, it will return
     * an empty collection; or if this BentukPendidikan has previously
     * been saved, it will retrieve related StandarSaranas from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in BentukPendidikan.
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
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->bentuk_pendidikan_id = null;
        $this->nama = null;
        $this->jenjang_paud = null;
        $this->jenjang_tk = null;
        $this->jenjang_sd = null;
        $this->jenjang_smp = null;
        $this->jenjang_sma = null;
        $this->jenjang_tinggi = null;
        $this->direktorat_pembinaan = null;
        $this->aktif = null;
        $this->formalitas_pendidikan = null;
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
            if ($this->collPerans) {
                foreach ($this->collPerans as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collSekolahs) {
                foreach ($this->collSekolahs as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collStandarSaranas) {
                foreach ($this->collStandarSaranas as $o) {
                    $o->clearAllReferences($deep);
                }
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collPerans instanceof PropelCollection) {
            $this->collPerans->clearIterator();
        }
        $this->collPerans = null;
        if ($this->collSekolahs instanceof PropelCollection) {
            $this->collSekolahs->clearIterator();
        }
        $this->collSekolahs = null;
        if ($this->collStandarSaranas instanceof PropelCollection) {
            $this->collStandarSaranas->clearIterator();
        }
        $this->collStandarSaranas = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(BentukPendidikanPeer::DEFAULT_STRING_FORMAT);
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
