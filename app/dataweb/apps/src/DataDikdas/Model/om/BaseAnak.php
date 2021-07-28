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
use DataDikdas\Model\Anak;
use DataDikdas\Model\AnakPeer;
use DataDikdas\Model\AnakQuery;
use DataDikdas\Model\JenjangPendidikan;
use DataDikdas\Model\JenjangPendidikanQuery;
use DataDikdas\Model\Ptk;
use DataDikdas\Model\PtkQuery;
use DataDikdas\Model\StatusAnak;
use DataDikdas\Model\StatusAnakQuery;
use DataDikdas\Model\VldAnak;
use DataDikdas\Model\VldAnakQuery;

/**
 * Base class that represents a row from the 'anak' table.
 *
 * 
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseAnak extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'DataDikdas\\Model\\AnakPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        AnakPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the anak_id field.
     * @var        string
     */
    protected $anak_id;

    /**
     * The value for the ptk_id field.
     * @var        string
     */
    protected $ptk_id;

    /**
     * The value for the status_anak_id field.
     * @var        string
     */
    protected $status_anak_id;

    /**
     * The value for the jenjang_pendidikan_id field.
     * @var        string
     */
    protected $jenjang_pendidikan_id;

    /**
     * The value for the nik field.
     * @var        string
     */
    protected $nik;

    /**
     * The value for the nisn field.
     * @var        string
     */
    protected $nisn;

    /**
     * The value for the nama field.
     * @var        string
     */
    protected $nama;

    /**
     * The value for the jenis_kelamin field.
     * @var        string
     */
    protected $jenis_kelamin;

    /**
     * The value for the tempat_lahir field.
     * @var        string
     */
    protected $tempat_lahir;

    /**
     * The value for the tanggal_lahir field.
     * @var        string
     */
    protected $tanggal_lahir;

    /**
     * The value for the tahun_masuk field.
     * @var        int
     */
    protected $tahun_masuk;

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
     * The value for the soft_delete field.
     * @var        string
     */
    protected $soft_delete;

    /**
     * The value for the last_sync field.
     * Note: this column has a database default value of: '1901-01-01 00:00:00'
     * @var        string
     */
    protected $last_sync;

    /**
     * The value for the updater_id field.
     * @var        string
     */
    protected $updater_id;

    /**
     * @var        Ptk
     */
    protected $aPtk;

    /**
     * @var        StatusAnak
     */
    protected $aStatusAnak;

    /**
     * @var        JenjangPendidikan
     */
    protected $aJenjangPendidikan;

    /**
     * @var        PropelObjectCollection|VldAnak[] Collection to store aggregation of VldAnak objects.
     */
    protected $collVldAnaks;
    protected $collVldAnaksPartial;

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
    protected $vldAnaksScheduledForDeletion = null;

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
     * Initializes internal state of BaseAnak object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [anak_id] column value.
     * 
     * @return string
     */
    public function getAnakId()
    {
        return $this->anak_id;
    }

    /**
     * Get the [ptk_id] column value.
     * 
     * @return string
     */
    public function getPtkId()
    {
        return $this->ptk_id;
    }

    /**
     * Get the [status_anak_id] column value.
     * 
     * @return string
     */
    public function getStatusAnakId()
    {
        return $this->status_anak_id;
    }

    /**
     * Get the [jenjang_pendidikan_id] column value.
     * 
     * @return string
     */
    public function getJenjangPendidikanId()
    {
        return $this->jenjang_pendidikan_id;
    }

    /**
     * Get the [nik] column value.
     * 
     * @return string
     */
    public function getNik()
    {
        return $this->nik;
    }

    /**
     * Get the [nisn] column value.
     * 
     * @return string
     */
    public function getNisn()
    {
        return $this->nisn;
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
     * Get the [jenis_kelamin] column value.
     * 
     * @return string
     */
    public function getJenisKelamin()
    {
        return $this->jenis_kelamin;
    }

    /**
     * Get the [tempat_lahir] column value.
     * 
     * @return string
     */
    public function getTempatLahir()
    {
        return $this->tempat_lahir;
    }

    /**
     * Get the [optionally formatted] temporal [tanggal_lahir] column value.
     * 
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getTanggalLahir($format = '%Y-%m-%d')
    {
        if ($this->tanggal_lahir === null) {
            return null;
        }


        try {
            $dt = new DateTime($this->tanggal_lahir);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->tanggal_lahir, true), $x);
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
     * Get the [tahun_masuk] column value.
     * 
     * @return int
     */
    public function getTahunMasuk()
    {
        return $this->tahun_masuk;
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
     * Get the [soft_delete] column value.
     * 
     * @return string
     */
    public function getSoftDelete()
    {
        return $this->soft_delete;
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
     * Get the [updater_id] column value.
     * 
     * @return string
     */
    public function getUpdaterId()
    {
        return $this->updater_id;
    }

    /**
     * Set the value of [anak_id] column.
     * 
     * @param string $v new value
     * @return Anak The current object (for fluent API support)
     */
    public function setAnakId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->anak_id !== $v) {
            $this->anak_id = $v;
            $this->modifiedColumns[] = AnakPeer::ANAK_ID;
        }


        return $this;
    } // setAnakId()

    /**
     * Set the value of [ptk_id] column.
     * 
     * @param string $v new value
     * @return Anak The current object (for fluent API support)
     */
    public function setPtkId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->ptk_id !== $v) {
            $this->ptk_id = $v;
            $this->modifiedColumns[] = AnakPeer::PTK_ID;
        }

        if ($this->aPtk !== null && $this->aPtk->getPtkId() !== $v) {
            $this->aPtk = null;
        }


        return $this;
    } // setPtkId()

    /**
     * Set the value of [status_anak_id] column.
     * 
     * @param string $v new value
     * @return Anak The current object (for fluent API support)
     */
    public function setStatusAnakId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->status_anak_id !== $v) {
            $this->status_anak_id = $v;
            $this->modifiedColumns[] = AnakPeer::STATUS_ANAK_ID;
        }

        if ($this->aStatusAnak !== null && $this->aStatusAnak->getStatusAnakId() !== $v) {
            $this->aStatusAnak = null;
        }


        return $this;
    } // setStatusAnakId()

    /**
     * Set the value of [jenjang_pendidikan_id] column.
     * 
     * @param string $v new value
     * @return Anak The current object (for fluent API support)
     */
    public function setJenjangPendidikanId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->jenjang_pendidikan_id !== $v) {
            $this->jenjang_pendidikan_id = $v;
            $this->modifiedColumns[] = AnakPeer::JENJANG_PENDIDIKAN_ID;
        }

        if ($this->aJenjangPendidikan !== null && $this->aJenjangPendidikan->getJenjangPendidikanId() !== $v) {
            $this->aJenjangPendidikan = null;
        }


        return $this;
    } // setJenjangPendidikanId()

    /**
     * Set the value of [nik] column.
     * 
     * @param string $v new value
     * @return Anak The current object (for fluent API support)
     */
    public function setNik($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nik !== $v) {
            $this->nik = $v;
            $this->modifiedColumns[] = AnakPeer::NIK;
        }


        return $this;
    } // setNik()

    /**
     * Set the value of [nisn] column.
     * 
     * @param string $v new value
     * @return Anak The current object (for fluent API support)
     */
    public function setNisn($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nisn !== $v) {
            $this->nisn = $v;
            $this->modifiedColumns[] = AnakPeer::NISN;
        }


        return $this;
    } // setNisn()

    /**
     * Set the value of [nama] column.
     * 
     * @param string $v new value
     * @return Anak The current object (for fluent API support)
     */
    public function setNama($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nama !== $v) {
            $this->nama = $v;
            $this->modifiedColumns[] = AnakPeer::NAMA;
        }


        return $this;
    } // setNama()

    /**
     * Set the value of [jenis_kelamin] column.
     * 
     * @param string $v new value
     * @return Anak The current object (for fluent API support)
     */
    public function setJenisKelamin($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->jenis_kelamin !== $v) {
            $this->jenis_kelamin = $v;
            $this->modifiedColumns[] = AnakPeer::JENIS_KELAMIN;
        }


        return $this;
    } // setJenisKelamin()

    /**
     * Set the value of [tempat_lahir] column.
     * 
     * @param string $v new value
     * @return Anak The current object (for fluent API support)
     */
    public function setTempatLahir($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->tempat_lahir !== $v) {
            $this->tempat_lahir = $v;
            $this->modifiedColumns[] = AnakPeer::TEMPAT_LAHIR;
        }


        return $this;
    } // setTempatLahir()

    /**
     * Sets the value of [tanggal_lahir] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Anak The current object (for fluent API support)
     */
    public function setTanggalLahir($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->tanggal_lahir !== null || $dt !== null) {
            $currentDateAsString = ($this->tanggal_lahir !== null && $tmpDt = new DateTime($this->tanggal_lahir)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->tanggal_lahir = $newDateAsString;
                $this->modifiedColumns[] = AnakPeer::TANGGAL_LAHIR;
            }
        } // if either are not null


        return $this;
    } // setTanggalLahir()

    /**
     * Set the value of [tahun_masuk] column.
     * 
     * @param int $v new value
     * @return Anak The current object (for fluent API support)
     */
    public function setTahunMasuk($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->tahun_masuk !== $v) {
            $this->tahun_masuk = $v;
            $this->modifiedColumns[] = AnakPeer::TAHUN_MASUK;
        }


        return $this;
    } // setTahunMasuk()

    /**
     * Sets the value of [create_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Anak The current object (for fluent API support)
     */
    public function setCreateDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->create_date !== null || $dt !== null) {
            $currentDateAsString = ($this->create_date !== null && $tmpDt = new DateTime($this->create_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->create_date = $newDateAsString;
                $this->modifiedColumns[] = AnakPeer::CREATE_DATE;
            }
        } // if either are not null


        return $this;
    } // setCreateDate()

    /**
     * Sets the value of [last_update] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Anak The current object (for fluent API support)
     */
    public function setLastUpdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->last_update !== null || $dt !== null) {
            $currentDateAsString = ($this->last_update !== null && $tmpDt = new DateTime($this->last_update)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->last_update = $newDateAsString;
                $this->modifiedColumns[] = AnakPeer::LAST_UPDATE;
            }
        } // if either are not null


        return $this;
    } // setLastUpdate()

    /**
     * Set the value of [soft_delete] column.
     * 
     * @param string $v new value
     * @return Anak The current object (for fluent API support)
     */
    public function setSoftDelete($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->soft_delete !== $v) {
            $this->soft_delete = $v;
            $this->modifiedColumns[] = AnakPeer::SOFT_DELETE;
        }


        return $this;
    } // setSoftDelete()

    /**
     * Sets the value of [last_sync] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Anak The current object (for fluent API support)
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
                $this->modifiedColumns[] = AnakPeer::LAST_SYNC;
            }
        } // if either are not null


        return $this;
    } // setLastSync()

    /**
     * Set the value of [updater_id] column.
     * 
     * @param string $v new value
     * @return Anak The current object (for fluent API support)
     */
    public function setUpdaterId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->updater_id !== $v) {
            $this->updater_id = $v;
            $this->modifiedColumns[] = AnakPeer::UPDATER_ID;
        }


        return $this;
    } // setUpdaterId()

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

            $this->anak_id = ($row[$startcol + 0] !== null) ? (string) $row[$startcol + 0] : null;
            $this->ptk_id = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->status_anak_id = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->jenjang_pendidikan_id = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->nik = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->nisn = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->nama = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->jenis_kelamin = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->tempat_lahir = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->tanggal_lahir = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
            $this->tahun_masuk = ($row[$startcol + 10] !== null) ? (int) $row[$startcol + 10] : null;
            $this->create_date = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
            $this->last_update = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
            $this->soft_delete = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
            $this->last_sync = ($row[$startcol + 14] !== null) ? (string) $row[$startcol + 14] : null;
            $this->updater_id = ($row[$startcol + 15] !== null) ? (string) $row[$startcol + 15] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 16; // 16 = AnakPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Anak object", $e);
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

        if ($this->aPtk !== null && $this->ptk_id !== $this->aPtk->getPtkId()) {
            $this->aPtk = null;
        }
        if ($this->aStatusAnak !== null && $this->status_anak_id !== $this->aStatusAnak->getStatusAnakId()) {
            $this->aStatusAnak = null;
        }
        if ($this->aJenjangPendidikan !== null && $this->jenjang_pendidikan_id !== $this->aJenjangPendidikan->getJenjangPendidikanId()) {
            $this->aJenjangPendidikan = null;
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
            $con = Propel::getConnection(AnakPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = AnakPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aPtk = null;
            $this->aStatusAnak = null;
            $this->aJenjangPendidikan = null;
            $this->collVldAnaks = null;

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
            $con = Propel::getConnection(AnakPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = AnakQuery::create()
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
            $con = Propel::getConnection(AnakPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                AnakPeer::addInstanceToPool($this);
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

            if ($this->aPtk !== null) {
                if ($this->aPtk->isModified() || $this->aPtk->isNew()) {
                    $affectedRows += $this->aPtk->save($con);
                }
                $this->setPtk($this->aPtk);
            }

            if ($this->aStatusAnak !== null) {
                if ($this->aStatusAnak->isModified() || $this->aStatusAnak->isNew()) {
                    $affectedRows += $this->aStatusAnak->save($con);
                }
                $this->setStatusAnak($this->aStatusAnak);
            }

            if ($this->aJenjangPendidikan !== null) {
                if ($this->aJenjangPendidikan->isModified() || $this->aJenjangPendidikan->isNew()) {
                    $affectedRows += $this->aJenjangPendidikan->save($con);
                }
                $this->setJenjangPendidikan($this->aJenjangPendidikan);
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

            if ($this->vldAnaksScheduledForDeletion !== null) {
                if (!$this->vldAnaksScheduledForDeletion->isEmpty()) {
                    VldAnakQuery::create()
                        ->filterByPrimaryKeys($this->vldAnaksScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->vldAnaksScheduledForDeletion = null;
                }
            }

            if ($this->collVldAnaks !== null) {
                foreach ($this->collVldAnaks as $referrerFK) {
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
        if ($this->isColumnModified(AnakPeer::ANAK_ID)) {
            $modifiedColumns[':p' . $index++]  = '"anak_id"';
        }
        if ($this->isColumnModified(AnakPeer::PTK_ID)) {
            $modifiedColumns[':p' . $index++]  = '"ptk_id"';
        }
        if ($this->isColumnModified(AnakPeer::STATUS_ANAK_ID)) {
            $modifiedColumns[':p' . $index++]  = '"status_anak_id"';
        }
        if ($this->isColumnModified(AnakPeer::JENJANG_PENDIDIKAN_ID)) {
            $modifiedColumns[':p' . $index++]  = '"jenjang_pendidikan_id"';
        }
        if ($this->isColumnModified(AnakPeer::NIK)) {
            $modifiedColumns[':p' . $index++]  = '"nik"';
        }
        if ($this->isColumnModified(AnakPeer::NISN)) {
            $modifiedColumns[':p' . $index++]  = '"nisn"';
        }
        if ($this->isColumnModified(AnakPeer::NAMA)) {
            $modifiedColumns[':p' . $index++]  = '"nama"';
        }
        if ($this->isColumnModified(AnakPeer::JENIS_KELAMIN)) {
            $modifiedColumns[':p' . $index++]  = '"jenis_kelamin"';
        }
        if ($this->isColumnModified(AnakPeer::TEMPAT_LAHIR)) {
            $modifiedColumns[':p' . $index++]  = '"tempat_lahir"';
        }
        if ($this->isColumnModified(AnakPeer::TANGGAL_LAHIR)) {
            $modifiedColumns[':p' . $index++]  = '"tanggal_lahir"';
        }
        if ($this->isColumnModified(AnakPeer::TAHUN_MASUK)) {
            $modifiedColumns[':p' . $index++]  = '"tahun_masuk"';
        }
        if ($this->isColumnModified(AnakPeer::CREATE_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"create_date"';
        }
        if ($this->isColumnModified(AnakPeer::LAST_UPDATE)) {
            $modifiedColumns[':p' . $index++]  = '"last_update"';
        }
        if ($this->isColumnModified(AnakPeer::SOFT_DELETE)) {
            $modifiedColumns[':p' . $index++]  = '"soft_delete"';
        }
        if ($this->isColumnModified(AnakPeer::LAST_SYNC)) {
            $modifiedColumns[':p' . $index++]  = '"last_sync"';
        }
        if ($this->isColumnModified(AnakPeer::UPDATER_ID)) {
            $modifiedColumns[':p' . $index++]  = '"updater_id"';
        }

        $sql = sprintf(
            'INSERT INTO "anak" (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '"anak_id"':						
                        $stmt->bindValue($identifier, $this->anak_id, PDO::PARAM_STR);
                        break;
                    case '"ptk_id"':						
                        $stmt->bindValue($identifier, $this->ptk_id, PDO::PARAM_STR);
                        break;
                    case '"status_anak_id"':						
                        $stmt->bindValue($identifier, $this->status_anak_id, PDO::PARAM_STR);
                        break;
                    case '"jenjang_pendidikan_id"':						
                        $stmt->bindValue($identifier, $this->jenjang_pendidikan_id, PDO::PARAM_STR);
                        break;
                    case '"nik"':						
                        $stmt->bindValue($identifier, $this->nik, PDO::PARAM_STR);
                        break;
                    case '"nisn"':						
                        $stmt->bindValue($identifier, $this->nisn, PDO::PARAM_STR);
                        break;
                    case '"nama"':						
                        $stmt->bindValue($identifier, $this->nama, PDO::PARAM_STR);
                        break;
                    case '"jenis_kelamin"':						
                        $stmt->bindValue($identifier, $this->jenis_kelamin, PDO::PARAM_STR);
                        break;
                    case '"tempat_lahir"':						
                        $stmt->bindValue($identifier, $this->tempat_lahir, PDO::PARAM_STR);
                        break;
                    case '"tanggal_lahir"':						
                        $stmt->bindValue($identifier, $this->tanggal_lahir, PDO::PARAM_STR);
                        break;
                    case '"tahun_masuk"':						
                        $stmt->bindValue($identifier, $this->tahun_masuk, PDO::PARAM_INT);
                        break;
                    case '"create_date"':						
                        $stmt->bindValue($identifier, $this->create_date, PDO::PARAM_STR);
                        break;
                    case '"last_update"':						
                        $stmt->bindValue($identifier, $this->last_update, PDO::PARAM_STR);
                        break;
                    case '"soft_delete"':						
                        $stmt->bindValue($identifier, $this->soft_delete, PDO::PARAM_STR);
                        break;
                    case '"last_sync"':						
                        $stmt->bindValue($identifier, $this->last_sync, PDO::PARAM_STR);
                        break;
                    case '"updater_id"':						
                        $stmt->bindValue($identifier, $this->updater_id, PDO::PARAM_STR);
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

            if ($this->aPtk !== null) {
                if (!$this->aPtk->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aPtk->getValidationFailures());
                }
            }

            if ($this->aStatusAnak !== null) {
                if (!$this->aStatusAnak->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aStatusAnak->getValidationFailures());
                }
            }

            if ($this->aJenjangPendidikan !== null) {
                if (!$this->aJenjangPendidikan->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aJenjangPendidikan->getValidationFailures());
                }
            }


            if (($retval = AnakPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collVldAnaks !== null) {
                    foreach ($this->collVldAnaks as $referrerFK) {
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
        $pos = AnakPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getAnakId();
                break;
            case 1:
                return $this->getPtkId();
                break;
            case 2:
                return $this->getStatusAnakId();
                break;
            case 3:
                return $this->getJenjangPendidikanId();
                break;
            case 4:
                return $this->getNik();
                break;
            case 5:
                return $this->getNisn();
                break;
            case 6:
                return $this->getNama();
                break;
            case 7:
                return $this->getJenisKelamin();
                break;
            case 8:
                return $this->getTempatLahir();
                break;
            case 9:
                return $this->getTanggalLahir();
                break;
            case 10:
                return $this->getTahunMasuk();
                break;
            case 11:
                return $this->getCreateDate();
                break;
            case 12:
                return $this->getLastUpdate();
                break;
            case 13:
                return $this->getSoftDelete();
                break;
            case 14:
                return $this->getLastSync();
                break;
            case 15:
                return $this->getUpdaterId();
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
        if (isset($alreadyDumpedObjects['Anak'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Anak'][$this->getPrimaryKey()] = true;
        $keys = AnakPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getAnakId(),
            $keys[1] => $this->getPtkId(),
            $keys[2] => $this->getStatusAnakId(),
            $keys[3] => $this->getJenjangPendidikanId(),
            $keys[4] => $this->getNik(),
            $keys[5] => $this->getNisn(),
            $keys[6] => $this->getNama(),
            $keys[7] => $this->getJenisKelamin(),
            $keys[8] => $this->getTempatLahir(),
            $keys[9] => $this->getTanggalLahir(),
            $keys[10] => $this->getTahunMasuk(),
            $keys[11] => $this->getCreateDate(),
            $keys[12] => $this->getLastUpdate(),
            $keys[13] => $this->getSoftDelete(),
            $keys[14] => $this->getLastSync(),
            $keys[15] => $this->getUpdaterId(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aPtk) {
                $result['Ptk'] = $this->aPtk->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aStatusAnak) {
                $result['StatusAnak'] = $this->aStatusAnak->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aJenjangPendidikan) {
                $result['JenjangPendidikan'] = $this->aJenjangPendidikan->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collVldAnaks) {
                $result['VldAnaks'] = $this->collVldAnaks->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = AnakPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setAnakId($value);
                break;
            case 1:
                $this->setPtkId($value);
                break;
            case 2:
                $this->setStatusAnakId($value);
                break;
            case 3:
                $this->setJenjangPendidikanId($value);
                break;
            case 4:
                $this->setNik($value);
                break;
            case 5:
                $this->setNisn($value);
                break;
            case 6:
                $this->setNama($value);
                break;
            case 7:
                $this->setJenisKelamin($value);
                break;
            case 8:
                $this->setTempatLahir($value);
                break;
            case 9:
                $this->setTanggalLahir($value);
                break;
            case 10:
                $this->setTahunMasuk($value);
                break;
            case 11:
                $this->setCreateDate($value);
                break;
            case 12:
                $this->setLastUpdate($value);
                break;
            case 13:
                $this->setSoftDelete($value);
                break;
            case 14:
                $this->setLastSync($value);
                break;
            case 15:
                $this->setUpdaterId($value);
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
        $keys = AnakPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setAnakId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setPtkId($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setStatusAnakId($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setJenjangPendidikanId($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setNik($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setNisn($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setNama($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setJenisKelamin($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setTempatLahir($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setTanggalLahir($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setTahunMasuk($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setCreateDate($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setLastUpdate($arr[$keys[12]]);
        if (array_key_exists($keys[13], $arr)) $this->setSoftDelete($arr[$keys[13]]);
        if (array_key_exists($keys[14], $arr)) $this->setLastSync($arr[$keys[14]]);
        if (array_key_exists($keys[15], $arr)) $this->setUpdaterId($arr[$keys[15]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(AnakPeer::DATABASE_NAME);

        if ($this->isColumnModified(AnakPeer::ANAK_ID)) $criteria->add(AnakPeer::ANAK_ID, $this->anak_id);
        if ($this->isColumnModified(AnakPeer::PTK_ID)) $criteria->add(AnakPeer::PTK_ID, $this->ptk_id);
        if ($this->isColumnModified(AnakPeer::STATUS_ANAK_ID)) $criteria->add(AnakPeer::STATUS_ANAK_ID, $this->status_anak_id);
        if ($this->isColumnModified(AnakPeer::JENJANG_PENDIDIKAN_ID)) $criteria->add(AnakPeer::JENJANG_PENDIDIKAN_ID, $this->jenjang_pendidikan_id);
        if ($this->isColumnModified(AnakPeer::NIK)) $criteria->add(AnakPeer::NIK, $this->nik);
        if ($this->isColumnModified(AnakPeer::NISN)) $criteria->add(AnakPeer::NISN, $this->nisn);
        if ($this->isColumnModified(AnakPeer::NAMA)) $criteria->add(AnakPeer::NAMA, $this->nama);
        if ($this->isColumnModified(AnakPeer::JENIS_KELAMIN)) $criteria->add(AnakPeer::JENIS_KELAMIN, $this->jenis_kelamin);
        if ($this->isColumnModified(AnakPeer::TEMPAT_LAHIR)) $criteria->add(AnakPeer::TEMPAT_LAHIR, $this->tempat_lahir);
        if ($this->isColumnModified(AnakPeer::TANGGAL_LAHIR)) $criteria->add(AnakPeer::TANGGAL_LAHIR, $this->tanggal_lahir);
        if ($this->isColumnModified(AnakPeer::TAHUN_MASUK)) $criteria->add(AnakPeer::TAHUN_MASUK, $this->tahun_masuk);
        if ($this->isColumnModified(AnakPeer::CREATE_DATE)) $criteria->add(AnakPeer::CREATE_DATE, $this->create_date);
        if ($this->isColumnModified(AnakPeer::LAST_UPDATE)) $criteria->add(AnakPeer::LAST_UPDATE, $this->last_update);
        if ($this->isColumnModified(AnakPeer::SOFT_DELETE)) $criteria->add(AnakPeer::SOFT_DELETE, $this->soft_delete);
        if ($this->isColumnModified(AnakPeer::LAST_SYNC)) $criteria->add(AnakPeer::LAST_SYNC, $this->last_sync);
        if ($this->isColumnModified(AnakPeer::UPDATER_ID)) $criteria->add(AnakPeer::UPDATER_ID, $this->updater_id);

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
        $criteria = new Criteria(AnakPeer::DATABASE_NAME);
        $criteria->add(AnakPeer::ANAK_ID, $this->anak_id);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return string
     */
    public function getPrimaryKey()
    {
        return $this->getAnakId();
    }

    /**
     * Generic method to set the primary key (anak_id column).
     *
     * @param  string $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setAnakId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getAnakId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of Anak (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setPtkId($this->getPtkId());
        $copyObj->setStatusAnakId($this->getStatusAnakId());
        $copyObj->setJenjangPendidikanId($this->getJenjangPendidikanId());
        $copyObj->setNik($this->getNik());
        $copyObj->setNisn($this->getNisn());
        $copyObj->setNama($this->getNama());
        $copyObj->setJenisKelamin($this->getJenisKelamin());
        $copyObj->setTempatLahir($this->getTempatLahir());
        $copyObj->setTanggalLahir($this->getTanggalLahir());
        $copyObj->setTahunMasuk($this->getTahunMasuk());
        $copyObj->setCreateDate($this->getCreateDate());
        $copyObj->setLastUpdate($this->getLastUpdate());
        $copyObj->setSoftDelete($this->getSoftDelete());
        $copyObj->setLastSync($this->getLastSync());
        $copyObj->setUpdaterId($this->getUpdaterId());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getVldAnaks() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addVldAnak($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setAnakId(NULL); // this is a auto-increment column, so set to default value
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
     * @return Anak Clone of current object.
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
     * @return AnakPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new AnakPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Ptk object.
     *
     * @param             Ptk $v
     * @return Anak The current object (for fluent API support)
     * @throws PropelException
     */
    public function setPtk(Ptk $v = null)
    {
        if ($v === null) {
            $this->setPtkId(NULL);
        } else {
            $this->setPtkId($v->getPtkId());
        }

        $this->aPtk = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Ptk object, it will not be re-added.
        if ($v !== null) {
            $v->addAnak($this);
        }


        return $this;
    }


    /**
     * Get the associated Ptk object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Ptk The associated Ptk object.
     * @throws PropelException
     */
    public function getPtk(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aPtk === null && (($this->ptk_id !== "" && $this->ptk_id !== null)) && $doQuery) {
            $this->aPtk = PtkQuery::create()->findPk($this->ptk_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aPtk->addAnaks($this);
             */
        }

        return $this->aPtk;
    }

    /**
     * Declares an association between this object and a StatusAnak object.
     *
     * @param             StatusAnak $v
     * @return Anak The current object (for fluent API support)
     * @throws PropelException
     */
    public function setStatusAnak(StatusAnak $v = null)
    {
        if ($v === null) {
            $this->setStatusAnakId(NULL);
        } else {
            $this->setStatusAnakId($v->getStatusAnakId());
        }

        $this->aStatusAnak = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the StatusAnak object, it will not be re-added.
        if ($v !== null) {
            $v->addAnak($this);
        }


        return $this;
    }


    /**
     * Get the associated StatusAnak object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return StatusAnak The associated StatusAnak object.
     * @throws PropelException
     */
    public function getStatusAnak(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aStatusAnak === null && (($this->status_anak_id !== "" && $this->status_anak_id !== null)) && $doQuery) {
            $this->aStatusAnak = StatusAnakQuery::create()->findPk($this->status_anak_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aStatusAnak->addAnaks($this);
             */
        }

        return $this->aStatusAnak;
    }

    /**
     * Declares an association between this object and a JenjangPendidikan object.
     *
     * @param             JenjangPendidikan $v
     * @return Anak The current object (for fluent API support)
     * @throws PropelException
     */
    public function setJenjangPendidikan(JenjangPendidikan $v = null)
    {
        if ($v === null) {
            $this->setJenjangPendidikanId(NULL);
        } else {
            $this->setJenjangPendidikanId($v->getJenjangPendidikanId());
        }

        $this->aJenjangPendidikan = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the JenjangPendidikan object, it will not be re-added.
        if ($v !== null) {
            $v->addAnak($this);
        }


        return $this;
    }


    /**
     * Get the associated JenjangPendidikan object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return JenjangPendidikan The associated JenjangPendidikan object.
     * @throws PropelException
     */
    public function getJenjangPendidikan(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aJenjangPendidikan === null && (($this->jenjang_pendidikan_id !== "" && $this->jenjang_pendidikan_id !== null)) && $doQuery) {
            $this->aJenjangPendidikan = JenjangPendidikanQuery::create()->findPk($this->jenjang_pendidikan_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aJenjangPendidikan->addAnaks($this);
             */
        }

        return $this->aJenjangPendidikan;
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
        if ('VldAnak' == $relationName) {
            $this->initVldAnaks();
        }
    }

    /**
     * Clears out the collVldAnaks collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Anak The current object (for fluent API support)
     * @see        addVldAnaks()
     */
    public function clearVldAnaks()
    {
        $this->collVldAnaks = null; // important to set this to null since that means it is uninitialized
        $this->collVldAnaksPartial = null;

        return $this;
    }

    /**
     * reset is the collVldAnaks collection loaded partially
     *
     * @return void
     */
    public function resetPartialVldAnaks($v = true)
    {
        $this->collVldAnaksPartial = $v;
    }

    /**
     * Initializes the collVldAnaks collection.
     *
     * By default this just sets the collVldAnaks collection to an empty array (like clearcollVldAnaks());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initVldAnaks($overrideExisting = true)
    {
        if (null !== $this->collVldAnaks && !$overrideExisting) {
            return;
        }
        $this->collVldAnaks = new PropelObjectCollection();
        $this->collVldAnaks->setModel('VldAnak');
    }

    /**
     * Gets an array of VldAnak objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Anak is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|VldAnak[] List of VldAnak objects
     * @throws PropelException
     */
    public function getVldAnaks($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collVldAnaksPartial && !$this->isNew();
        if (null === $this->collVldAnaks || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collVldAnaks) {
                // return empty collection
                $this->initVldAnaks();
            } else {
                $collVldAnaks = VldAnakQuery::create(null, $criteria)
                    ->filterByAnak($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collVldAnaksPartial && count($collVldAnaks)) {
                      $this->initVldAnaks(false);

                      foreach($collVldAnaks as $obj) {
                        if (false == $this->collVldAnaks->contains($obj)) {
                          $this->collVldAnaks->append($obj);
                        }
                      }

                      $this->collVldAnaksPartial = true;
                    }

                    $collVldAnaks->getInternalIterator()->rewind();
                    return $collVldAnaks;
                }

                if($partial && $this->collVldAnaks) {
                    foreach($this->collVldAnaks as $obj) {
                        if($obj->isNew()) {
                            $collVldAnaks[] = $obj;
                        }
                    }
                }

                $this->collVldAnaks = $collVldAnaks;
                $this->collVldAnaksPartial = false;
            }
        }

        return $this->collVldAnaks;
    }

    /**
     * Sets a collection of VldAnak objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $vldAnaks A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Anak The current object (for fluent API support)
     */
    public function setVldAnaks(PropelCollection $vldAnaks, PropelPDO $con = null)
    {
        $vldAnaksToDelete = $this->getVldAnaks(new Criteria(), $con)->diff($vldAnaks);

        $this->vldAnaksScheduledForDeletion = unserialize(serialize($vldAnaksToDelete));

        foreach ($vldAnaksToDelete as $vldAnakRemoved) {
            $vldAnakRemoved->setAnak(null);
        }

        $this->collVldAnaks = null;
        foreach ($vldAnaks as $vldAnak) {
            $this->addVldAnak($vldAnak);
        }

        $this->collVldAnaks = $vldAnaks;
        $this->collVldAnaksPartial = false;

        return $this;
    }

    /**
     * Returns the number of related VldAnak objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related VldAnak objects.
     * @throws PropelException
     */
    public function countVldAnaks(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collVldAnaksPartial && !$this->isNew();
        if (null === $this->collVldAnaks || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collVldAnaks) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getVldAnaks());
            }
            $query = VldAnakQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByAnak($this)
                ->count($con);
        }

        return count($this->collVldAnaks);
    }

    /**
     * Method called to associate a VldAnak object to this object
     * through the VldAnak foreign key attribute.
     *
     * @param    VldAnak $l VldAnak
     * @return Anak The current object (for fluent API support)
     */
    public function addVldAnak(VldAnak $l)
    {
        if ($this->collVldAnaks === null) {
            $this->initVldAnaks();
            $this->collVldAnaksPartial = true;
        }
        if (!in_array($l, $this->collVldAnaks->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddVldAnak($l);
        }

        return $this;
    }

    /**
     * @param	VldAnak $vldAnak The vldAnak object to add.
     */
    protected function doAddVldAnak($vldAnak)
    {
        $this->collVldAnaks[]= $vldAnak;
        $vldAnak->setAnak($this);
    }

    /**
     * @param	VldAnak $vldAnak The vldAnak object to remove.
     * @return Anak The current object (for fluent API support)
     */
    public function removeVldAnak($vldAnak)
    {
        if ($this->getVldAnaks()->contains($vldAnak)) {
            $this->collVldAnaks->remove($this->collVldAnaks->search($vldAnak));
            if (null === $this->vldAnaksScheduledForDeletion) {
                $this->vldAnaksScheduledForDeletion = clone $this->collVldAnaks;
                $this->vldAnaksScheduledForDeletion->clear();
            }
            $this->vldAnaksScheduledForDeletion[]= clone $vldAnak;
            $vldAnak->setAnak(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Anak is new, it will return
     * an empty collection; or if this Anak has previously
     * been saved, it will retrieve related VldAnaks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Anak.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|VldAnak[] List of VldAnak objects
     */
    public function getVldAnaksJoinErrortype($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = VldAnakQuery::create(null, $criteria);
        $query->joinWith('Errortype', $join_behavior);

        return $this->getVldAnaks($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->anak_id = null;
        $this->ptk_id = null;
        $this->status_anak_id = null;
        $this->jenjang_pendidikan_id = null;
        $this->nik = null;
        $this->nisn = null;
        $this->nama = null;
        $this->jenis_kelamin = null;
        $this->tempat_lahir = null;
        $this->tanggal_lahir = null;
        $this->tahun_masuk = null;
        $this->create_date = null;
        $this->last_update = null;
        $this->soft_delete = null;
        $this->last_sync = null;
        $this->updater_id = null;
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
            if ($this->collVldAnaks) {
                foreach ($this->collVldAnaks as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aPtk instanceof Persistent) {
              $this->aPtk->clearAllReferences($deep);
            }
            if ($this->aStatusAnak instanceof Persistent) {
              $this->aStatusAnak->clearAllReferences($deep);
            }
            if ($this->aJenjangPendidikan instanceof Persistent) {
              $this->aJenjangPendidikan->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collVldAnaks instanceof PropelCollection) {
            $this->collVldAnaks->clearIterator();
        }
        $this->collVldAnaks = null;
        $this->aPtk = null;
        $this->aStatusAnak = null;
        $this->aJenjangPendidikan = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(AnakPeer::DEFAULT_STRING_FORMAT);
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
