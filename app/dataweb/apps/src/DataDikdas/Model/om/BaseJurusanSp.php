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
use DataDikdas\Model\AkreditasiProdi;
use DataDikdas\Model\AkreditasiProdiQuery;
use DataDikdas\Model\JurSpLong;
use DataDikdas\Model\JurSpLongQuery;
use DataDikdas\Model\Jurusan;
use DataDikdas\Model\JurusanKerjasama;
use DataDikdas\Model\JurusanKerjasamaQuery;
use DataDikdas\Model\JurusanQuery;
use DataDikdas\Model\JurusanSp;
use DataDikdas\Model\JurusanSpPeer;
use DataDikdas\Model\JurusanSpQuery;
use DataDikdas\Model\KebutuhanKhusus;
use DataDikdas\Model\KebutuhanKhususQuery;
use DataDikdas\Model\RegistrasiPesertaDidik;
use DataDikdas\Model\RegistrasiPesertaDidikQuery;
use DataDikdas\Model\RombonganBelajar;
use DataDikdas\Model\RombonganBelajarQuery;
use DataDikdas\Model\Sekolah;
use DataDikdas\Model\SekolahQuery;
use DataDikdas\Model\VldJurusanSp;
use DataDikdas\Model\VldJurusanSpQuery;

/**
 * Base class that represents a row from the 'jurusan_sp' table.
 *
 * 
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseJurusanSp extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'DataDikdas\\Model\\JurusanSpPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        JurusanSpPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the jurusan_sp_id field.
     * @var        string
     */
    protected $jurusan_sp_id;

    /**
     * The value for the sekolah_id field.
     * @var        string
     */
    protected $sekolah_id;

    /**
     * The value for the kebutuhan_khusus_id field.
     * @var        int
     */
    protected $kebutuhan_khusus_id;

    /**
     * The value for the jurusan_id field.
     * @var        string
     */
    protected $jurusan_id;

    /**
     * The value for the nama_jurusan_sp field.
     * @var        string
     */
    protected $nama_jurusan_sp;

    /**
     * The value for the sk_izin field.
     * @var        string
     */
    protected $sk_izin;

    /**
     * The value for the tanggal_sk_izin field.
     * @var        string
     */
    protected $tanggal_sk_izin;

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
     * @var        Sekolah
     */
    protected $aSekolah;

    /**
     * @var        Jurusan
     */
    protected $aJurusan;

    /**
     * @var        KebutuhanKhusus
     */
    protected $aKebutuhanKhusus;

    /**
     * @var        PropelObjectCollection|AkreditasiProdi[] Collection to store aggregation of AkreditasiProdi objects.
     */
    protected $collAkreditasiProdis;
    protected $collAkreditasiProdisPartial;

    /**
     * @var        PropelObjectCollection|JurSpLong[] Collection to store aggregation of JurSpLong objects.
     */
    protected $collJurSpLongs;
    protected $collJurSpLongsPartial;

    /**
     * @var        PropelObjectCollection|JurusanKerjasama[] Collection to store aggregation of JurusanKerjasama objects.
     */
    protected $collJurusanKerjasamas;
    protected $collJurusanKerjasamasPartial;

    /**
     * @var        PropelObjectCollection|RegistrasiPesertaDidik[] Collection to store aggregation of RegistrasiPesertaDidik objects.
     */
    protected $collRegistrasiPesertaDidiks;
    protected $collRegistrasiPesertaDidiksPartial;

    /**
     * @var        PropelObjectCollection|RombonganBelajar[] Collection to store aggregation of RombonganBelajar objects.
     */
    protected $collRombonganBelajars;
    protected $collRombonganBelajarsPartial;

    /**
     * @var        PropelObjectCollection|VldJurusanSp[] Collection to store aggregation of VldJurusanSp objects.
     */
    protected $collVldJurusanSps;
    protected $collVldJurusanSpsPartial;

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
    protected $akreditasiProdisScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $jurSpLongsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $jurusanKerjasamasScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $registrasiPesertaDidiksScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $rombonganBelajarsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $vldJurusanSpsScheduledForDeletion = null;

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
     * Initializes internal state of BaseJurusanSp object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [jurusan_sp_id] column value.
     * 
     * @return string
     */
    public function getJurusanSpId()
    {
        return $this->jurusan_sp_id;
    }

    /**
     * Get the [sekolah_id] column value.
     * 
     * @return string
     */
    public function getSekolahId()
    {
        return $this->sekolah_id;
    }

    /**
     * Get the [kebutuhan_khusus_id] column value.
     * 
     * @return int
     */
    public function getKebutuhanKhususId()
    {
        return $this->kebutuhan_khusus_id;
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
     * Get the [nama_jurusan_sp] column value.
     * 
     * @return string
     */
    public function getNamaJurusanSp()
    {
        return $this->nama_jurusan_sp;
    }

    /**
     * Get the [sk_izin] column value.
     * 
     * @return string
     */
    public function getSkIzin()
    {
        return $this->sk_izin;
    }

    /**
     * Get the [optionally formatted] temporal [tanggal_sk_izin] column value.
     * 
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getTanggalSkIzin($format = '%Y-%m-%d')
    {
        if ($this->tanggal_sk_izin === null) {
            return null;
        }


        try {
            $dt = new DateTime($this->tanggal_sk_izin);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->tanggal_sk_izin, true), $x);
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
     * Set the value of [jurusan_sp_id] column.
     * 
     * @param string $v new value
     * @return JurusanSp The current object (for fluent API support)
     */
    public function setJurusanSpId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->jurusan_sp_id !== $v) {
            $this->jurusan_sp_id = $v;
            $this->modifiedColumns[] = JurusanSpPeer::JURUSAN_SP_ID;
        }


        return $this;
    } // setJurusanSpId()

    /**
     * Set the value of [sekolah_id] column.
     * 
     * @param string $v new value
     * @return JurusanSp The current object (for fluent API support)
     */
    public function setSekolahId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->sekolah_id !== $v) {
            $this->sekolah_id = $v;
            $this->modifiedColumns[] = JurusanSpPeer::SEKOLAH_ID;
        }

        if ($this->aSekolah !== null && $this->aSekolah->getSekolahId() !== $v) {
            $this->aSekolah = null;
        }


        return $this;
    } // setSekolahId()

    /**
     * Set the value of [kebutuhan_khusus_id] column.
     * 
     * @param int $v new value
     * @return JurusanSp The current object (for fluent API support)
     */
    public function setKebutuhanKhususId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->kebutuhan_khusus_id !== $v) {
            $this->kebutuhan_khusus_id = $v;
            $this->modifiedColumns[] = JurusanSpPeer::KEBUTUHAN_KHUSUS_ID;
        }

        if ($this->aKebutuhanKhusus !== null && $this->aKebutuhanKhusus->getKebutuhanKhususId() !== $v) {
            $this->aKebutuhanKhusus = null;
        }


        return $this;
    } // setKebutuhanKhususId()

    /**
     * Set the value of [jurusan_id] column.
     * 
     * @param string $v new value
     * @return JurusanSp The current object (for fluent API support)
     */
    public function setJurusanId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->jurusan_id !== $v) {
            $this->jurusan_id = $v;
            $this->modifiedColumns[] = JurusanSpPeer::JURUSAN_ID;
        }

        if ($this->aJurusan !== null && $this->aJurusan->getJurusanId() !== $v) {
            $this->aJurusan = null;
        }


        return $this;
    } // setJurusanId()

    /**
     * Set the value of [nama_jurusan_sp] column.
     * 
     * @param string $v new value
     * @return JurusanSp The current object (for fluent API support)
     */
    public function setNamaJurusanSp($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nama_jurusan_sp !== $v) {
            $this->nama_jurusan_sp = $v;
            $this->modifiedColumns[] = JurusanSpPeer::NAMA_JURUSAN_SP;
        }


        return $this;
    } // setNamaJurusanSp()

    /**
     * Set the value of [sk_izin] column.
     * 
     * @param string $v new value
     * @return JurusanSp The current object (for fluent API support)
     */
    public function setSkIzin($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->sk_izin !== $v) {
            $this->sk_izin = $v;
            $this->modifiedColumns[] = JurusanSpPeer::SK_IZIN;
        }


        return $this;
    } // setSkIzin()

    /**
     * Sets the value of [tanggal_sk_izin] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return JurusanSp The current object (for fluent API support)
     */
    public function setTanggalSkIzin($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->tanggal_sk_izin !== null || $dt !== null) {
            $currentDateAsString = ($this->tanggal_sk_izin !== null && $tmpDt = new DateTime($this->tanggal_sk_izin)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->tanggal_sk_izin = $newDateAsString;
                $this->modifiedColumns[] = JurusanSpPeer::TANGGAL_SK_IZIN;
            }
        } // if either are not null


        return $this;
    } // setTanggalSkIzin()

    /**
     * Sets the value of [create_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return JurusanSp The current object (for fluent API support)
     */
    public function setCreateDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->create_date !== null || $dt !== null) {
            $currentDateAsString = ($this->create_date !== null && $tmpDt = new DateTime($this->create_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->create_date = $newDateAsString;
                $this->modifiedColumns[] = JurusanSpPeer::CREATE_DATE;
            }
        } // if either are not null


        return $this;
    } // setCreateDate()

    /**
     * Sets the value of [last_update] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return JurusanSp The current object (for fluent API support)
     */
    public function setLastUpdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->last_update !== null || $dt !== null) {
            $currentDateAsString = ($this->last_update !== null && $tmpDt = new DateTime($this->last_update)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->last_update = $newDateAsString;
                $this->modifiedColumns[] = JurusanSpPeer::LAST_UPDATE;
            }
        } // if either are not null


        return $this;
    } // setLastUpdate()

    /**
     * Set the value of [soft_delete] column.
     * 
     * @param string $v new value
     * @return JurusanSp The current object (for fluent API support)
     */
    public function setSoftDelete($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->soft_delete !== $v) {
            $this->soft_delete = $v;
            $this->modifiedColumns[] = JurusanSpPeer::SOFT_DELETE;
        }


        return $this;
    } // setSoftDelete()

    /**
     * Sets the value of [last_sync] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return JurusanSp The current object (for fluent API support)
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
                $this->modifiedColumns[] = JurusanSpPeer::LAST_SYNC;
            }
        } // if either are not null


        return $this;
    } // setLastSync()

    /**
     * Set the value of [updater_id] column.
     * 
     * @param string $v new value
     * @return JurusanSp The current object (for fluent API support)
     */
    public function setUpdaterId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->updater_id !== $v) {
            $this->updater_id = $v;
            $this->modifiedColumns[] = JurusanSpPeer::UPDATER_ID;
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

            $this->jurusan_sp_id = ($row[$startcol + 0] !== null) ? (string) $row[$startcol + 0] : null;
            $this->sekolah_id = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->kebutuhan_khusus_id = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
            $this->jurusan_id = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->nama_jurusan_sp = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->sk_izin = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->tanggal_sk_izin = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->create_date = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->last_update = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->soft_delete = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
            $this->last_sync = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
            $this->updater_id = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 12; // 12 = JurusanSpPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating JurusanSp object", $e);
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

        if ($this->aSekolah !== null && $this->sekolah_id !== $this->aSekolah->getSekolahId()) {
            $this->aSekolah = null;
        }
        if ($this->aKebutuhanKhusus !== null && $this->kebutuhan_khusus_id !== $this->aKebutuhanKhusus->getKebutuhanKhususId()) {
            $this->aKebutuhanKhusus = null;
        }
        if ($this->aJurusan !== null && $this->jurusan_id !== $this->aJurusan->getJurusanId()) {
            $this->aJurusan = null;
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
            $con = Propel::getConnection(JurusanSpPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = JurusanSpPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aSekolah = null;
            $this->aJurusan = null;
            $this->aKebutuhanKhusus = null;
            $this->collAkreditasiProdis = null;

            $this->collJurSpLongs = null;

            $this->collJurusanKerjasamas = null;

            $this->collRegistrasiPesertaDidiks = null;

            $this->collRombonganBelajars = null;

            $this->collVldJurusanSps = null;

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
            $con = Propel::getConnection(JurusanSpPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = JurusanSpQuery::create()
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
            $con = Propel::getConnection(JurusanSpPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                JurusanSpPeer::addInstanceToPool($this);
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

            if ($this->aSekolah !== null) {
                if ($this->aSekolah->isModified() || $this->aSekolah->isNew()) {
                    $affectedRows += $this->aSekolah->save($con);
                }
                $this->setSekolah($this->aSekolah);
            }

            if ($this->aJurusan !== null) {
                if ($this->aJurusan->isModified() || $this->aJurusan->isNew()) {
                    $affectedRows += $this->aJurusan->save($con);
                }
                $this->setJurusan($this->aJurusan);
            }

            if ($this->aKebutuhanKhusus !== null) {
                if ($this->aKebutuhanKhusus->isModified() || $this->aKebutuhanKhusus->isNew()) {
                    $affectedRows += $this->aKebutuhanKhusus->save($con);
                }
                $this->setKebutuhanKhusus($this->aKebutuhanKhusus);
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

            if ($this->akreditasiProdisScheduledForDeletion !== null) {
                if (!$this->akreditasiProdisScheduledForDeletion->isEmpty()) {
                    AkreditasiProdiQuery::create()
                        ->filterByPrimaryKeys($this->akreditasiProdisScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->akreditasiProdisScheduledForDeletion = null;
                }
            }

            if ($this->collAkreditasiProdis !== null) {
                foreach ($this->collAkreditasiProdis as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->jurSpLongsScheduledForDeletion !== null) {
                if (!$this->jurSpLongsScheduledForDeletion->isEmpty()) {
                    JurSpLongQuery::create()
                        ->filterByPrimaryKeys($this->jurSpLongsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->jurSpLongsScheduledForDeletion = null;
                }
            }

            if ($this->collJurSpLongs !== null) {
                foreach ($this->collJurSpLongs as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->jurusanKerjasamasScheduledForDeletion !== null) {
                if (!$this->jurusanKerjasamasScheduledForDeletion->isEmpty()) {
                    JurusanKerjasamaQuery::create()
                        ->filterByPrimaryKeys($this->jurusanKerjasamasScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->jurusanKerjasamasScheduledForDeletion = null;
                }
            }

            if ($this->collJurusanKerjasamas !== null) {
                foreach ($this->collJurusanKerjasamas as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->registrasiPesertaDidiksScheduledForDeletion !== null) {
                if (!$this->registrasiPesertaDidiksScheduledForDeletion->isEmpty()) {
                    foreach ($this->registrasiPesertaDidiksScheduledForDeletion as $registrasiPesertaDidik) {
                        // need to save related object because we set the relation to null
                        $registrasiPesertaDidik->save($con);
                    }
                    $this->registrasiPesertaDidiksScheduledForDeletion = null;
                }
            }

            if ($this->collRegistrasiPesertaDidiks !== null) {
                foreach ($this->collRegistrasiPesertaDidiks as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->rombonganBelajarsScheduledForDeletion !== null) {
                if (!$this->rombonganBelajarsScheduledForDeletion->isEmpty()) {
                    foreach ($this->rombonganBelajarsScheduledForDeletion as $rombonganBelajar) {
                        // need to save related object because we set the relation to null
                        $rombonganBelajar->save($con);
                    }
                    $this->rombonganBelajarsScheduledForDeletion = null;
                }
            }

            if ($this->collRombonganBelajars !== null) {
                foreach ($this->collRombonganBelajars as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->vldJurusanSpsScheduledForDeletion !== null) {
                if (!$this->vldJurusanSpsScheduledForDeletion->isEmpty()) {
                    VldJurusanSpQuery::create()
                        ->filterByPrimaryKeys($this->vldJurusanSpsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->vldJurusanSpsScheduledForDeletion = null;
                }
            }

            if ($this->collVldJurusanSps !== null) {
                foreach ($this->collVldJurusanSps as $referrerFK) {
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
        if ($this->isColumnModified(JurusanSpPeer::JURUSAN_SP_ID)) {
            $modifiedColumns[':p' . $index++]  = '"jurusan_sp_id"';
        }
        if ($this->isColumnModified(JurusanSpPeer::SEKOLAH_ID)) {
            $modifiedColumns[':p' . $index++]  = '"sekolah_id"';
        }
        if ($this->isColumnModified(JurusanSpPeer::KEBUTUHAN_KHUSUS_ID)) {
            $modifiedColumns[':p' . $index++]  = '"kebutuhan_khusus_id"';
        }
        if ($this->isColumnModified(JurusanSpPeer::JURUSAN_ID)) {
            $modifiedColumns[':p' . $index++]  = '"jurusan_id"';
        }
        if ($this->isColumnModified(JurusanSpPeer::NAMA_JURUSAN_SP)) {
            $modifiedColumns[':p' . $index++]  = '"nama_jurusan_sp"';
        }
        if ($this->isColumnModified(JurusanSpPeer::SK_IZIN)) {
            $modifiedColumns[':p' . $index++]  = '"sk_izin"';
        }
        if ($this->isColumnModified(JurusanSpPeer::TANGGAL_SK_IZIN)) {
            $modifiedColumns[':p' . $index++]  = '"tanggal_sk_izin"';
        }
        if ($this->isColumnModified(JurusanSpPeer::CREATE_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"create_date"';
        }
        if ($this->isColumnModified(JurusanSpPeer::LAST_UPDATE)) {
            $modifiedColumns[':p' . $index++]  = '"last_update"';
        }
        if ($this->isColumnModified(JurusanSpPeer::SOFT_DELETE)) {
            $modifiedColumns[':p' . $index++]  = '"soft_delete"';
        }
        if ($this->isColumnModified(JurusanSpPeer::LAST_SYNC)) {
            $modifiedColumns[':p' . $index++]  = '"last_sync"';
        }
        if ($this->isColumnModified(JurusanSpPeer::UPDATER_ID)) {
            $modifiedColumns[':p' . $index++]  = '"updater_id"';
        }

        $sql = sprintf(
            'INSERT INTO "jurusan_sp" (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '"jurusan_sp_id"':						
                        $stmt->bindValue($identifier, $this->jurusan_sp_id, PDO::PARAM_STR);
                        break;
                    case '"sekolah_id"':						
                        $stmt->bindValue($identifier, $this->sekolah_id, PDO::PARAM_STR);
                        break;
                    case '"kebutuhan_khusus_id"':						
                        $stmt->bindValue($identifier, $this->kebutuhan_khusus_id, PDO::PARAM_INT);
                        break;
                    case '"jurusan_id"':						
                        $stmt->bindValue($identifier, $this->jurusan_id, PDO::PARAM_STR);
                        break;
                    case '"nama_jurusan_sp"':						
                        $stmt->bindValue($identifier, $this->nama_jurusan_sp, PDO::PARAM_STR);
                        break;
                    case '"sk_izin"':						
                        $stmt->bindValue($identifier, $this->sk_izin, PDO::PARAM_STR);
                        break;
                    case '"tanggal_sk_izin"':						
                        $stmt->bindValue($identifier, $this->tanggal_sk_izin, PDO::PARAM_STR);
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

            if ($this->aSekolah !== null) {
                if (!$this->aSekolah->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aSekolah->getValidationFailures());
                }
            }

            if ($this->aJurusan !== null) {
                if (!$this->aJurusan->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aJurusan->getValidationFailures());
                }
            }

            if ($this->aKebutuhanKhusus !== null) {
                if (!$this->aKebutuhanKhusus->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aKebutuhanKhusus->getValidationFailures());
                }
            }


            if (($retval = JurusanSpPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collAkreditasiProdis !== null) {
                    foreach ($this->collAkreditasiProdis as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collJurSpLongs !== null) {
                    foreach ($this->collJurSpLongs as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collJurusanKerjasamas !== null) {
                    foreach ($this->collJurusanKerjasamas as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collRegistrasiPesertaDidiks !== null) {
                    foreach ($this->collRegistrasiPesertaDidiks as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collRombonganBelajars !== null) {
                    foreach ($this->collRombonganBelajars as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collVldJurusanSps !== null) {
                    foreach ($this->collVldJurusanSps as $referrerFK) {
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
        $pos = JurusanSpPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getJurusanSpId();
                break;
            case 1:
                return $this->getSekolahId();
                break;
            case 2:
                return $this->getKebutuhanKhususId();
                break;
            case 3:
                return $this->getJurusanId();
                break;
            case 4:
                return $this->getNamaJurusanSp();
                break;
            case 5:
                return $this->getSkIzin();
                break;
            case 6:
                return $this->getTanggalSkIzin();
                break;
            case 7:
                return $this->getCreateDate();
                break;
            case 8:
                return $this->getLastUpdate();
                break;
            case 9:
                return $this->getSoftDelete();
                break;
            case 10:
                return $this->getLastSync();
                break;
            case 11:
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
        if (isset($alreadyDumpedObjects['JurusanSp'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['JurusanSp'][$this->getPrimaryKey()] = true;
        $keys = JurusanSpPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getJurusanSpId(),
            $keys[1] => $this->getSekolahId(),
            $keys[2] => $this->getKebutuhanKhususId(),
            $keys[3] => $this->getJurusanId(),
            $keys[4] => $this->getNamaJurusanSp(),
            $keys[5] => $this->getSkIzin(),
            $keys[6] => $this->getTanggalSkIzin(),
            $keys[7] => $this->getCreateDate(),
            $keys[8] => $this->getLastUpdate(),
            $keys[9] => $this->getSoftDelete(),
            $keys[10] => $this->getLastSync(),
            $keys[11] => $this->getUpdaterId(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aSekolah) {
                $result['Sekolah'] = $this->aSekolah->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aJurusan) {
                $result['Jurusan'] = $this->aJurusan->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aKebutuhanKhusus) {
                $result['KebutuhanKhusus'] = $this->aKebutuhanKhusus->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collAkreditasiProdis) {
                $result['AkreditasiProdis'] = $this->collAkreditasiProdis->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collJurSpLongs) {
                $result['JurSpLongs'] = $this->collJurSpLongs->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collJurusanKerjasamas) {
                $result['JurusanKerjasamas'] = $this->collJurusanKerjasamas->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collRegistrasiPesertaDidiks) {
                $result['RegistrasiPesertaDidiks'] = $this->collRegistrasiPesertaDidiks->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collRombonganBelajars) {
                $result['RombonganBelajars'] = $this->collRombonganBelajars->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collVldJurusanSps) {
                $result['VldJurusanSps'] = $this->collVldJurusanSps->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = JurusanSpPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setJurusanSpId($value);
                break;
            case 1:
                $this->setSekolahId($value);
                break;
            case 2:
                $this->setKebutuhanKhususId($value);
                break;
            case 3:
                $this->setJurusanId($value);
                break;
            case 4:
                $this->setNamaJurusanSp($value);
                break;
            case 5:
                $this->setSkIzin($value);
                break;
            case 6:
                $this->setTanggalSkIzin($value);
                break;
            case 7:
                $this->setCreateDate($value);
                break;
            case 8:
                $this->setLastUpdate($value);
                break;
            case 9:
                $this->setSoftDelete($value);
                break;
            case 10:
                $this->setLastSync($value);
                break;
            case 11:
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
        $keys = JurusanSpPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setJurusanSpId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setSekolahId($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setKebutuhanKhususId($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setJurusanId($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setNamaJurusanSp($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setSkIzin($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setTanggalSkIzin($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setCreateDate($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setLastUpdate($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setSoftDelete($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setLastSync($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setUpdaterId($arr[$keys[11]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(JurusanSpPeer::DATABASE_NAME);

        if ($this->isColumnModified(JurusanSpPeer::JURUSAN_SP_ID)) $criteria->add(JurusanSpPeer::JURUSAN_SP_ID, $this->jurusan_sp_id);
        if ($this->isColumnModified(JurusanSpPeer::SEKOLAH_ID)) $criteria->add(JurusanSpPeer::SEKOLAH_ID, $this->sekolah_id);
        if ($this->isColumnModified(JurusanSpPeer::KEBUTUHAN_KHUSUS_ID)) $criteria->add(JurusanSpPeer::KEBUTUHAN_KHUSUS_ID, $this->kebutuhan_khusus_id);
        if ($this->isColumnModified(JurusanSpPeer::JURUSAN_ID)) $criteria->add(JurusanSpPeer::JURUSAN_ID, $this->jurusan_id);
        if ($this->isColumnModified(JurusanSpPeer::NAMA_JURUSAN_SP)) $criteria->add(JurusanSpPeer::NAMA_JURUSAN_SP, $this->nama_jurusan_sp);
        if ($this->isColumnModified(JurusanSpPeer::SK_IZIN)) $criteria->add(JurusanSpPeer::SK_IZIN, $this->sk_izin);
        if ($this->isColumnModified(JurusanSpPeer::TANGGAL_SK_IZIN)) $criteria->add(JurusanSpPeer::TANGGAL_SK_IZIN, $this->tanggal_sk_izin);
        if ($this->isColumnModified(JurusanSpPeer::CREATE_DATE)) $criteria->add(JurusanSpPeer::CREATE_DATE, $this->create_date);
        if ($this->isColumnModified(JurusanSpPeer::LAST_UPDATE)) $criteria->add(JurusanSpPeer::LAST_UPDATE, $this->last_update);
        if ($this->isColumnModified(JurusanSpPeer::SOFT_DELETE)) $criteria->add(JurusanSpPeer::SOFT_DELETE, $this->soft_delete);
        if ($this->isColumnModified(JurusanSpPeer::LAST_SYNC)) $criteria->add(JurusanSpPeer::LAST_SYNC, $this->last_sync);
        if ($this->isColumnModified(JurusanSpPeer::UPDATER_ID)) $criteria->add(JurusanSpPeer::UPDATER_ID, $this->updater_id);

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
        $criteria = new Criteria(JurusanSpPeer::DATABASE_NAME);
        $criteria->add(JurusanSpPeer::JURUSAN_SP_ID, $this->jurusan_sp_id);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return string
     */
    public function getPrimaryKey()
    {
        return $this->getJurusanSpId();
    }

    /**
     * Generic method to set the primary key (jurusan_sp_id column).
     *
     * @param  string $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setJurusanSpId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getJurusanSpId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of JurusanSp (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setSekolahId($this->getSekolahId());
        $copyObj->setKebutuhanKhususId($this->getKebutuhanKhususId());
        $copyObj->setJurusanId($this->getJurusanId());
        $copyObj->setNamaJurusanSp($this->getNamaJurusanSp());
        $copyObj->setSkIzin($this->getSkIzin());
        $copyObj->setTanggalSkIzin($this->getTanggalSkIzin());
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

            foreach ($this->getAkreditasiProdis() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addAkreditasiProdi($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getJurSpLongs() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addJurSpLong($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getJurusanKerjasamas() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addJurusanKerjasama($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getRegistrasiPesertaDidiks() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addRegistrasiPesertaDidik($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getRombonganBelajars() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addRombonganBelajar($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getVldJurusanSps() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addVldJurusanSp($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setJurusanSpId(NULL); // this is a auto-increment column, so set to default value
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
     * @return JurusanSp Clone of current object.
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
     * @return JurusanSpPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new JurusanSpPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Sekolah object.
     *
     * @param             Sekolah $v
     * @return JurusanSp The current object (for fluent API support)
     * @throws PropelException
     */
    public function setSekolah(Sekolah $v = null)
    {
        if ($v === null) {
            $this->setSekolahId(NULL);
        } else {
            $this->setSekolahId($v->getSekolahId());
        }

        $this->aSekolah = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Sekolah object, it will not be re-added.
        if ($v !== null) {
            $v->addJurusanSp($this);
        }


        return $this;
    }


    /**
     * Get the associated Sekolah object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Sekolah The associated Sekolah object.
     * @throws PropelException
     */
    public function getSekolah(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aSekolah === null && (($this->sekolah_id !== "" && $this->sekolah_id !== null)) && $doQuery) {
            $this->aSekolah = SekolahQuery::create()->findPk($this->sekolah_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aSekolah->addJurusanSps($this);
             */
        }

        return $this->aSekolah;
    }

    /**
     * Declares an association between this object and a Jurusan object.
     *
     * @param             Jurusan $v
     * @return JurusanSp The current object (for fluent API support)
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
            $v->addJurusanSp($this);
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
                $this->aJurusan->addJurusanSps($this);
             */
        }

        return $this->aJurusan;
    }

    /**
     * Declares an association between this object and a KebutuhanKhusus object.
     *
     * @param             KebutuhanKhusus $v
     * @return JurusanSp The current object (for fluent API support)
     * @throws PropelException
     */
    public function setKebutuhanKhusus(KebutuhanKhusus $v = null)
    {
        if ($v === null) {
            $this->setKebutuhanKhususId(NULL);
        } else {
            $this->setKebutuhanKhususId($v->getKebutuhanKhususId());
        }

        $this->aKebutuhanKhusus = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the KebutuhanKhusus object, it will not be re-added.
        if ($v !== null) {
            $v->addJurusanSp($this);
        }


        return $this;
    }


    /**
     * Get the associated KebutuhanKhusus object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return KebutuhanKhusus The associated KebutuhanKhusus object.
     * @throws PropelException
     */
    public function getKebutuhanKhusus(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aKebutuhanKhusus === null && ($this->kebutuhan_khusus_id !== null) && $doQuery) {
            $this->aKebutuhanKhusus = KebutuhanKhususQuery::create()->findPk($this->kebutuhan_khusus_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aKebutuhanKhusus->addJurusanSps($this);
             */
        }

        return $this->aKebutuhanKhusus;
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
        if ('AkreditasiProdi' == $relationName) {
            $this->initAkreditasiProdis();
        }
        if ('JurSpLong' == $relationName) {
            $this->initJurSpLongs();
        }
        if ('JurusanKerjasama' == $relationName) {
            $this->initJurusanKerjasamas();
        }
        if ('RegistrasiPesertaDidik' == $relationName) {
            $this->initRegistrasiPesertaDidiks();
        }
        if ('RombonganBelajar' == $relationName) {
            $this->initRombonganBelajars();
        }
        if ('VldJurusanSp' == $relationName) {
            $this->initVldJurusanSps();
        }
    }

    /**
     * Clears out the collAkreditasiProdis collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return JurusanSp The current object (for fluent API support)
     * @see        addAkreditasiProdis()
     */
    public function clearAkreditasiProdis()
    {
        $this->collAkreditasiProdis = null; // important to set this to null since that means it is uninitialized
        $this->collAkreditasiProdisPartial = null;

        return $this;
    }

    /**
     * reset is the collAkreditasiProdis collection loaded partially
     *
     * @return void
     */
    public function resetPartialAkreditasiProdis($v = true)
    {
        $this->collAkreditasiProdisPartial = $v;
    }

    /**
     * Initializes the collAkreditasiProdis collection.
     *
     * By default this just sets the collAkreditasiProdis collection to an empty array (like clearcollAkreditasiProdis());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initAkreditasiProdis($overrideExisting = true)
    {
        if (null !== $this->collAkreditasiProdis && !$overrideExisting) {
            return;
        }
        $this->collAkreditasiProdis = new PropelObjectCollection();
        $this->collAkreditasiProdis->setModel('AkreditasiProdi');
    }

    /**
     * Gets an array of AkreditasiProdi objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this JurusanSp is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|AkreditasiProdi[] List of AkreditasiProdi objects
     * @throws PropelException
     */
    public function getAkreditasiProdis($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collAkreditasiProdisPartial && !$this->isNew();
        if (null === $this->collAkreditasiProdis || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collAkreditasiProdis) {
                // return empty collection
                $this->initAkreditasiProdis();
            } else {
                $collAkreditasiProdis = AkreditasiProdiQuery::create(null, $criteria)
                    ->filterByJurusanSp($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collAkreditasiProdisPartial && count($collAkreditasiProdis)) {
                      $this->initAkreditasiProdis(false);

                      foreach($collAkreditasiProdis as $obj) {
                        if (false == $this->collAkreditasiProdis->contains($obj)) {
                          $this->collAkreditasiProdis->append($obj);
                        }
                      }

                      $this->collAkreditasiProdisPartial = true;
                    }

                    $collAkreditasiProdis->getInternalIterator()->rewind();
                    return $collAkreditasiProdis;
                }

                if($partial && $this->collAkreditasiProdis) {
                    foreach($this->collAkreditasiProdis as $obj) {
                        if($obj->isNew()) {
                            $collAkreditasiProdis[] = $obj;
                        }
                    }
                }

                $this->collAkreditasiProdis = $collAkreditasiProdis;
                $this->collAkreditasiProdisPartial = false;
            }
        }

        return $this->collAkreditasiProdis;
    }

    /**
     * Sets a collection of AkreditasiProdi objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $akreditasiProdis A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return JurusanSp The current object (for fluent API support)
     */
    public function setAkreditasiProdis(PropelCollection $akreditasiProdis, PropelPDO $con = null)
    {
        $akreditasiProdisToDelete = $this->getAkreditasiProdis(new Criteria(), $con)->diff($akreditasiProdis);

        $this->akreditasiProdisScheduledForDeletion = unserialize(serialize($akreditasiProdisToDelete));

        foreach ($akreditasiProdisToDelete as $akreditasiProdiRemoved) {
            $akreditasiProdiRemoved->setJurusanSp(null);
        }

        $this->collAkreditasiProdis = null;
        foreach ($akreditasiProdis as $akreditasiProdi) {
            $this->addAkreditasiProdi($akreditasiProdi);
        }

        $this->collAkreditasiProdis = $akreditasiProdis;
        $this->collAkreditasiProdisPartial = false;

        return $this;
    }

    /**
     * Returns the number of related AkreditasiProdi objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related AkreditasiProdi objects.
     * @throws PropelException
     */
    public function countAkreditasiProdis(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collAkreditasiProdisPartial && !$this->isNew();
        if (null === $this->collAkreditasiProdis || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collAkreditasiProdis) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getAkreditasiProdis());
            }
            $query = AkreditasiProdiQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByJurusanSp($this)
                ->count($con);
        }

        return count($this->collAkreditasiProdis);
    }

    /**
     * Method called to associate a AkreditasiProdi object to this object
     * through the AkreditasiProdi foreign key attribute.
     *
     * @param    AkreditasiProdi $l AkreditasiProdi
     * @return JurusanSp The current object (for fluent API support)
     */
    public function addAkreditasiProdi(AkreditasiProdi $l)
    {
        if ($this->collAkreditasiProdis === null) {
            $this->initAkreditasiProdis();
            $this->collAkreditasiProdisPartial = true;
        }
        if (!in_array($l, $this->collAkreditasiProdis->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddAkreditasiProdi($l);
        }

        return $this;
    }

    /**
     * @param	AkreditasiProdi $akreditasiProdi The akreditasiProdi object to add.
     */
    protected function doAddAkreditasiProdi($akreditasiProdi)
    {
        $this->collAkreditasiProdis[]= $akreditasiProdi;
        $akreditasiProdi->setJurusanSp($this);
    }

    /**
     * @param	AkreditasiProdi $akreditasiProdi The akreditasiProdi object to remove.
     * @return JurusanSp The current object (for fluent API support)
     */
    public function removeAkreditasiProdi($akreditasiProdi)
    {
        if ($this->getAkreditasiProdis()->contains($akreditasiProdi)) {
            $this->collAkreditasiProdis->remove($this->collAkreditasiProdis->search($akreditasiProdi));
            if (null === $this->akreditasiProdisScheduledForDeletion) {
                $this->akreditasiProdisScheduledForDeletion = clone $this->collAkreditasiProdis;
                $this->akreditasiProdisScheduledForDeletion->clear();
            }
            $this->akreditasiProdisScheduledForDeletion[]= clone $akreditasiProdi;
            $akreditasiProdi->setJurusanSp(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JurusanSp is new, it will return
     * an empty collection; or if this JurusanSp has previously
     * been saved, it will retrieve related AkreditasiProdis from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JurusanSp.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|AkreditasiProdi[] List of AkreditasiProdi objects
     */
    public function getAkreditasiProdisJoinLembagaAkreditasi($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = AkreditasiProdiQuery::create(null, $criteria);
        $query->joinWith('LembagaAkreditasi', $join_behavior);

        return $this->getAkreditasiProdis($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JurusanSp is new, it will return
     * an empty collection; or if this JurusanSp has previously
     * been saved, it will retrieve related AkreditasiProdis from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JurusanSp.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|AkreditasiProdi[] List of AkreditasiProdi objects
     */
    public function getAkreditasiProdisJoinAkreditasi($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = AkreditasiProdiQuery::create(null, $criteria);
        $query->joinWith('Akreditasi', $join_behavior);

        return $this->getAkreditasiProdis($query, $con);
    }

    /**
     * Clears out the collJurSpLongs collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return JurusanSp The current object (for fluent API support)
     * @see        addJurSpLongs()
     */
    public function clearJurSpLongs()
    {
        $this->collJurSpLongs = null; // important to set this to null since that means it is uninitialized
        $this->collJurSpLongsPartial = null;

        return $this;
    }

    /**
     * reset is the collJurSpLongs collection loaded partially
     *
     * @return void
     */
    public function resetPartialJurSpLongs($v = true)
    {
        $this->collJurSpLongsPartial = $v;
    }

    /**
     * Initializes the collJurSpLongs collection.
     *
     * By default this just sets the collJurSpLongs collection to an empty array (like clearcollJurSpLongs());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initJurSpLongs($overrideExisting = true)
    {
        if (null !== $this->collJurSpLongs && !$overrideExisting) {
            return;
        }
        $this->collJurSpLongs = new PropelObjectCollection();
        $this->collJurSpLongs->setModel('JurSpLong');
    }

    /**
     * Gets an array of JurSpLong objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this JurusanSp is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|JurSpLong[] List of JurSpLong objects
     * @throws PropelException
     */
    public function getJurSpLongs($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collJurSpLongsPartial && !$this->isNew();
        if (null === $this->collJurSpLongs || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collJurSpLongs) {
                // return empty collection
                $this->initJurSpLongs();
            } else {
                $collJurSpLongs = JurSpLongQuery::create(null, $criteria)
                    ->filterByJurusanSp($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collJurSpLongsPartial && count($collJurSpLongs)) {
                      $this->initJurSpLongs(false);

                      foreach($collJurSpLongs as $obj) {
                        if (false == $this->collJurSpLongs->contains($obj)) {
                          $this->collJurSpLongs->append($obj);
                        }
                      }

                      $this->collJurSpLongsPartial = true;
                    }

                    $collJurSpLongs->getInternalIterator()->rewind();
                    return $collJurSpLongs;
                }

                if($partial && $this->collJurSpLongs) {
                    foreach($this->collJurSpLongs as $obj) {
                        if($obj->isNew()) {
                            $collJurSpLongs[] = $obj;
                        }
                    }
                }

                $this->collJurSpLongs = $collJurSpLongs;
                $this->collJurSpLongsPartial = false;
            }
        }

        return $this->collJurSpLongs;
    }

    /**
     * Sets a collection of JurSpLong objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $jurSpLongs A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return JurusanSp The current object (for fluent API support)
     */
    public function setJurSpLongs(PropelCollection $jurSpLongs, PropelPDO $con = null)
    {
        $jurSpLongsToDelete = $this->getJurSpLongs(new Criteria(), $con)->diff($jurSpLongs);

        $this->jurSpLongsScheduledForDeletion = unserialize(serialize($jurSpLongsToDelete));

        foreach ($jurSpLongsToDelete as $jurSpLongRemoved) {
            $jurSpLongRemoved->setJurusanSp(null);
        }

        $this->collJurSpLongs = null;
        foreach ($jurSpLongs as $jurSpLong) {
            $this->addJurSpLong($jurSpLong);
        }

        $this->collJurSpLongs = $jurSpLongs;
        $this->collJurSpLongsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related JurSpLong objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related JurSpLong objects.
     * @throws PropelException
     */
    public function countJurSpLongs(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collJurSpLongsPartial && !$this->isNew();
        if (null === $this->collJurSpLongs || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collJurSpLongs) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getJurSpLongs());
            }
            $query = JurSpLongQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByJurusanSp($this)
                ->count($con);
        }

        return count($this->collJurSpLongs);
    }

    /**
     * Method called to associate a JurSpLong object to this object
     * through the JurSpLong foreign key attribute.
     *
     * @param    JurSpLong $l JurSpLong
     * @return JurusanSp The current object (for fluent API support)
     */
    public function addJurSpLong(JurSpLong $l)
    {
        if ($this->collJurSpLongs === null) {
            $this->initJurSpLongs();
            $this->collJurSpLongsPartial = true;
        }
        if (!in_array($l, $this->collJurSpLongs->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddJurSpLong($l);
        }

        return $this;
    }

    /**
     * @param	JurSpLong $jurSpLong The jurSpLong object to add.
     */
    protected function doAddJurSpLong($jurSpLong)
    {
        $this->collJurSpLongs[]= $jurSpLong;
        $jurSpLong->setJurusanSp($this);
    }

    /**
     * @param	JurSpLong $jurSpLong The jurSpLong object to remove.
     * @return JurusanSp The current object (for fluent API support)
     */
    public function removeJurSpLong($jurSpLong)
    {
        if ($this->getJurSpLongs()->contains($jurSpLong)) {
            $this->collJurSpLongs->remove($this->collJurSpLongs->search($jurSpLong));
            if (null === $this->jurSpLongsScheduledForDeletion) {
                $this->jurSpLongsScheduledForDeletion = clone $this->collJurSpLongs;
                $this->jurSpLongsScheduledForDeletion->clear();
            }
            $this->jurSpLongsScheduledForDeletion[]= clone $jurSpLong;
            $jurSpLong->setJurusanSp(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JurusanSp is new, it will return
     * an empty collection; or if this JurusanSp has previously
     * been saved, it will retrieve related JurSpLongs from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JurusanSp.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|JurSpLong[] List of JurSpLong objects
     */
    public function getJurSpLongsJoinSemester($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = JurSpLongQuery::create(null, $criteria);
        $query->joinWith('Semester', $join_behavior);

        return $this->getJurSpLongs($query, $con);
    }

    /**
     * Clears out the collJurusanKerjasamas collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return JurusanSp The current object (for fluent API support)
     * @see        addJurusanKerjasamas()
     */
    public function clearJurusanKerjasamas()
    {
        $this->collJurusanKerjasamas = null; // important to set this to null since that means it is uninitialized
        $this->collJurusanKerjasamasPartial = null;

        return $this;
    }

    /**
     * reset is the collJurusanKerjasamas collection loaded partially
     *
     * @return void
     */
    public function resetPartialJurusanKerjasamas($v = true)
    {
        $this->collJurusanKerjasamasPartial = $v;
    }

    /**
     * Initializes the collJurusanKerjasamas collection.
     *
     * By default this just sets the collJurusanKerjasamas collection to an empty array (like clearcollJurusanKerjasamas());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initJurusanKerjasamas($overrideExisting = true)
    {
        if (null !== $this->collJurusanKerjasamas && !$overrideExisting) {
            return;
        }
        $this->collJurusanKerjasamas = new PropelObjectCollection();
        $this->collJurusanKerjasamas->setModel('JurusanKerjasama');
    }

    /**
     * Gets an array of JurusanKerjasama objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this JurusanSp is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|JurusanKerjasama[] List of JurusanKerjasama objects
     * @throws PropelException
     */
    public function getJurusanKerjasamas($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collJurusanKerjasamasPartial && !$this->isNew();
        if (null === $this->collJurusanKerjasamas || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collJurusanKerjasamas) {
                // return empty collection
                $this->initJurusanKerjasamas();
            } else {
                $collJurusanKerjasamas = JurusanKerjasamaQuery::create(null, $criteria)
                    ->filterByJurusanSp($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collJurusanKerjasamasPartial && count($collJurusanKerjasamas)) {
                      $this->initJurusanKerjasamas(false);

                      foreach($collJurusanKerjasamas as $obj) {
                        if (false == $this->collJurusanKerjasamas->contains($obj)) {
                          $this->collJurusanKerjasamas->append($obj);
                        }
                      }

                      $this->collJurusanKerjasamasPartial = true;
                    }

                    $collJurusanKerjasamas->getInternalIterator()->rewind();
                    return $collJurusanKerjasamas;
                }

                if($partial && $this->collJurusanKerjasamas) {
                    foreach($this->collJurusanKerjasamas as $obj) {
                        if($obj->isNew()) {
                            $collJurusanKerjasamas[] = $obj;
                        }
                    }
                }

                $this->collJurusanKerjasamas = $collJurusanKerjasamas;
                $this->collJurusanKerjasamasPartial = false;
            }
        }

        return $this->collJurusanKerjasamas;
    }

    /**
     * Sets a collection of JurusanKerjasama objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $jurusanKerjasamas A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return JurusanSp The current object (for fluent API support)
     */
    public function setJurusanKerjasamas(PropelCollection $jurusanKerjasamas, PropelPDO $con = null)
    {
        $jurusanKerjasamasToDelete = $this->getJurusanKerjasamas(new Criteria(), $con)->diff($jurusanKerjasamas);

        $this->jurusanKerjasamasScheduledForDeletion = unserialize(serialize($jurusanKerjasamasToDelete));

        foreach ($jurusanKerjasamasToDelete as $jurusanKerjasamaRemoved) {
            $jurusanKerjasamaRemoved->setJurusanSp(null);
        }

        $this->collJurusanKerjasamas = null;
        foreach ($jurusanKerjasamas as $jurusanKerjasama) {
            $this->addJurusanKerjasama($jurusanKerjasama);
        }

        $this->collJurusanKerjasamas = $jurusanKerjasamas;
        $this->collJurusanKerjasamasPartial = false;

        return $this;
    }

    /**
     * Returns the number of related JurusanKerjasama objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related JurusanKerjasama objects.
     * @throws PropelException
     */
    public function countJurusanKerjasamas(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collJurusanKerjasamasPartial && !$this->isNew();
        if (null === $this->collJurusanKerjasamas || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collJurusanKerjasamas) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getJurusanKerjasamas());
            }
            $query = JurusanKerjasamaQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByJurusanSp($this)
                ->count($con);
        }

        return count($this->collJurusanKerjasamas);
    }

    /**
     * Method called to associate a JurusanKerjasama object to this object
     * through the JurusanKerjasama foreign key attribute.
     *
     * @param    JurusanKerjasama $l JurusanKerjasama
     * @return JurusanSp The current object (for fluent API support)
     */
    public function addJurusanKerjasama(JurusanKerjasama $l)
    {
        if ($this->collJurusanKerjasamas === null) {
            $this->initJurusanKerjasamas();
            $this->collJurusanKerjasamasPartial = true;
        }
        if (!in_array($l, $this->collJurusanKerjasamas->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddJurusanKerjasama($l);
        }

        return $this;
    }

    /**
     * @param	JurusanKerjasama $jurusanKerjasama The jurusanKerjasama object to add.
     */
    protected function doAddJurusanKerjasama($jurusanKerjasama)
    {
        $this->collJurusanKerjasamas[]= $jurusanKerjasama;
        $jurusanKerjasama->setJurusanSp($this);
    }

    /**
     * @param	JurusanKerjasama $jurusanKerjasama The jurusanKerjasama object to remove.
     * @return JurusanSp The current object (for fluent API support)
     */
    public function removeJurusanKerjasama($jurusanKerjasama)
    {
        if ($this->getJurusanKerjasamas()->contains($jurusanKerjasama)) {
            $this->collJurusanKerjasamas->remove($this->collJurusanKerjasamas->search($jurusanKerjasama));
            if (null === $this->jurusanKerjasamasScheduledForDeletion) {
                $this->jurusanKerjasamasScheduledForDeletion = clone $this->collJurusanKerjasamas;
                $this->jurusanKerjasamasScheduledForDeletion->clear();
            }
            $this->jurusanKerjasamasScheduledForDeletion[]= clone $jurusanKerjasama;
            $jurusanKerjasama->setJurusanSp(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JurusanSp is new, it will return
     * an empty collection; or if this JurusanSp has previously
     * been saved, it will retrieve related JurusanKerjasamas from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JurusanSp.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|JurusanKerjasama[] List of JurusanKerjasama objects
     */
    public function getJurusanKerjasamasJoinMou($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = JurusanKerjasamaQuery::create(null, $criteria);
        $query->joinWith('Mou', $join_behavior);

        return $this->getJurusanKerjasamas($query, $con);
    }

    /**
     * Clears out the collRegistrasiPesertaDidiks collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return JurusanSp The current object (for fluent API support)
     * @see        addRegistrasiPesertaDidiks()
     */
    public function clearRegistrasiPesertaDidiks()
    {
        $this->collRegistrasiPesertaDidiks = null; // important to set this to null since that means it is uninitialized
        $this->collRegistrasiPesertaDidiksPartial = null;

        return $this;
    }

    /**
     * reset is the collRegistrasiPesertaDidiks collection loaded partially
     *
     * @return void
     */
    public function resetPartialRegistrasiPesertaDidiks($v = true)
    {
        $this->collRegistrasiPesertaDidiksPartial = $v;
    }

    /**
     * Initializes the collRegistrasiPesertaDidiks collection.
     *
     * By default this just sets the collRegistrasiPesertaDidiks collection to an empty array (like clearcollRegistrasiPesertaDidiks());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initRegistrasiPesertaDidiks($overrideExisting = true)
    {
        if (null !== $this->collRegistrasiPesertaDidiks && !$overrideExisting) {
            return;
        }
        $this->collRegistrasiPesertaDidiks = new PropelObjectCollection();
        $this->collRegistrasiPesertaDidiks->setModel('RegistrasiPesertaDidik');
    }

    /**
     * Gets an array of RegistrasiPesertaDidik objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this JurusanSp is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|RegistrasiPesertaDidik[] List of RegistrasiPesertaDidik objects
     * @throws PropelException
     */
    public function getRegistrasiPesertaDidiks($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collRegistrasiPesertaDidiksPartial && !$this->isNew();
        if (null === $this->collRegistrasiPesertaDidiks || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collRegistrasiPesertaDidiks) {
                // return empty collection
                $this->initRegistrasiPesertaDidiks();
            } else {
                $collRegistrasiPesertaDidiks = RegistrasiPesertaDidikQuery::create(null, $criteria)
                    ->filterByJurusanSp($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collRegistrasiPesertaDidiksPartial && count($collRegistrasiPesertaDidiks)) {
                      $this->initRegistrasiPesertaDidiks(false);

                      foreach($collRegistrasiPesertaDidiks as $obj) {
                        if (false == $this->collRegistrasiPesertaDidiks->contains($obj)) {
                          $this->collRegistrasiPesertaDidiks->append($obj);
                        }
                      }

                      $this->collRegistrasiPesertaDidiksPartial = true;
                    }

                    $collRegistrasiPesertaDidiks->getInternalIterator()->rewind();
                    return $collRegistrasiPesertaDidiks;
                }

                if($partial && $this->collRegistrasiPesertaDidiks) {
                    foreach($this->collRegistrasiPesertaDidiks as $obj) {
                        if($obj->isNew()) {
                            $collRegistrasiPesertaDidiks[] = $obj;
                        }
                    }
                }

                $this->collRegistrasiPesertaDidiks = $collRegistrasiPesertaDidiks;
                $this->collRegistrasiPesertaDidiksPartial = false;
            }
        }

        return $this->collRegistrasiPesertaDidiks;
    }

    /**
     * Sets a collection of RegistrasiPesertaDidik objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $registrasiPesertaDidiks A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return JurusanSp The current object (for fluent API support)
     */
    public function setRegistrasiPesertaDidiks(PropelCollection $registrasiPesertaDidiks, PropelPDO $con = null)
    {
        $registrasiPesertaDidiksToDelete = $this->getRegistrasiPesertaDidiks(new Criteria(), $con)->diff($registrasiPesertaDidiks);

        $this->registrasiPesertaDidiksScheduledForDeletion = unserialize(serialize($registrasiPesertaDidiksToDelete));

        foreach ($registrasiPesertaDidiksToDelete as $registrasiPesertaDidikRemoved) {
            $registrasiPesertaDidikRemoved->setJurusanSp(null);
        }

        $this->collRegistrasiPesertaDidiks = null;
        foreach ($registrasiPesertaDidiks as $registrasiPesertaDidik) {
            $this->addRegistrasiPesertaDidik($registrasiPesertaDidik);
        }

        $this->collRegistrasiPesertaDidiks = $registrasiPesertaDidiks;
        $this->collRegistrasiPesertaDidiksPartial = false;

        return $this;
    }

    /**
     * Returns the number of related RegistrasiPesertaDidik objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related RegistrasiPesertaDidik objects.
     * @throws PropelException
     */
    public function countRegistrasiPesertaDidiks(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collRegistrasiPesertaDidiksPartial && !$this->isNew();
        if (null === $this->collRegistrasiPesertaDidiks || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collRegistrasiPesertaDidiks) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getRegistrasiPesertaDidiks());
            }
            $query = RegistrasiPesertaDidikQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByJurusanSp($this)
                ->count($con);
        }

        return count($this->collRegistrasiPesertaDidiks);
    }

    /**
     * Method called to associate a RegistrasiPesertaDidik object to this object
     * through the RegistrasiPesertaDidik foreign key attribute.
     *
     * @param    RegistrasiPesertaDidik $l RegistrasiPesertaDidik
     * @return JurusanSp The current object (for fluent API support)
     */
    public function addRegistrasiPesertaDidik(RegistrasiPesertaDidik $l)
    {
        if ($this->collRegistrasiPesertaDidiks === null) {
            $this->initRegistrasiPesertaDidiks();
            $this->collRegistrasiPesertaDidiksPartial = true;
        }
        if (!in_array($l, $this->collRegistrasiPesertaDidiks->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddRegistrasiPesertaDidik($l);
        }

        return $this;
    }

    /**
     * @param	RegistrasiPesertaDidik $registrasiPesertaDidik The registrasiPesertaDidik object to add.
     */
    protected function doAddRegistrasiPesertaDidik($registrasiPesertaDidik)
    {
        $this->collRegistrasiPesertaDidiks[]= $registrasiPesertaDidik;
        $registrasiPesertaDidik->setJurusanSp($this);
    }

    /**
     * @param	RegistrasiPesertaDidik $registrasiPesertaDidik The registrasiPesertaDidik object to remove.
     * @return JurusanSp The current object (for fluent API support)
     */
    public function removeRegistrasiPesertaDidik($registrasiPesertaDidik)
    {
        if ($this->getRegistrasiPesertaDidiks()->contains($registrasiPesertaDidik)) {
            $this->collRegistrasiPesertaDidiks->remove($this->collRegistrasiPesertaDidiks->search($registrasiPesertaDidik));
            if (null === $this->registrasiPesertaDidiksScheduledForDeletion) {
                $this->registrasiPesertaDidiksScheduledForDeletion = clone $this->collRegistrasiPesertaDidiks;
                $this->registrasiPesertaDidiksScheduledForDeletion->clear();
            }
            $this->registrasiPesertaDidiksScheduledForDeletion[]= $registrasiPesertaDidik;
            $registrasiPesertaDidik->setJurusanSp(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JurusanSp is new, it will return
     * an empty collection; or if this JurusanSp has previously
     * been saved, it will retrieve related RegistrasiPesertaDidiks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JurusanSp.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|RegistrasiPesertaDidik[] List of RegistrasiPesertaDidik objects
     */
    public function getRegistrasiPesertaDidiksJoinPesertaDidik($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = RegistrasiPesertaDidikQuery::create(null, $criteria);
        $query->joinWith('PesertaDidik', $join_behavior);

        return $this->getRegistrasiPesertaDidiks($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JurusanSp is new, it will return
     * an empty collection; or if this JurusanSp has previously
     * been saved, it will retrieve related RegistrasiPesertaDidiks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JurusanSp.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|RegistrasiPesertaDidik[] List of RegistrasiPesertaDidik objects
     */
    public function getRegistrasiPesertaDidiksJoinSekolah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = RegistrasiPesertaDidikQuery::create(null, $criteria);
        $query->joinWith('Sekolah', $join_behavior);

        return $this->getRegistrasiPesertaDidiks($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JurusanSp is new, it will return
     * an empty collection; or if this JurusanSp has previously
     * been saved, it will retrieve related RegistrasiPesertaDidiks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JurusanSp.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|RegistrasiPesertaDidik[] List of RegistrasiPesertaDidik objects
     */
    public function getRegistrasiPesertaDidiksJoinJenisPendaftaran($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = RegistrasiPesertaDidikQuery::create(null, $criteria);
        $query->joinWith('JenisPendaftaran', $join_behavior);

        return $this->getRegistrasiPesertaDidiks($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JurusanSp is new, it will return
     * an empty collection; or if this JurusanSp has previously
     * been saved, it will retrieve related RegistrasiPesertaDidiks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JurusanSp.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|RegistrasiPesertaDidik[] List of RegistrasiPesertaDidik objects
     */
    public function getRegistrasiPesertaDidiksJoinJenisKeluar($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = RegistrasiPesertaDidikQuery::create(null, $criteria);
        $query->joinWith('JenisKeluar', $join_behavior);

        return $this->getRegistrasiPesertaDidiks($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JurusanSp is new, it will return
     * an empty collection; or if this JurusanSp has previously
     * been saved, it will retrieve related RegistrasiPesertaDidiks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JurusanSp.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|RegistrasiPesertaDidik[] List of RegistrasiPesertaDidik objects
     */
    public function getRegistrasiPesertaDidiksJoinJenisCita($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = RegistrasiPesertaDidikQuery::create(null, $criteria);
        $query->joinWith('JenisCita', $join_behavior);

        return $this->getRegistrasiPesertaDidiks($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JurusanSp is new, it will return
     * an empty collection; or if this JurusanSp has previously
     * been saved, it will retrieve related RegistrasiPesertaDidiks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JurusanSp.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|RegistrasiPesertaDidik[] List of RegistrasiPesertaDidik objects
     */
    public function getRegistrasiPesertaDidiksJoinJenisHobby($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = RegistrasiPesertaDidikQuery::create(null, $criteria);
        $query->joinWith('JenisHobby', $join_behavior);

        return $this->getRegistrasiPesertaDidiks($query, $con);
    }

    /**
     * Clears out the collRombonganBelajars collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return JurusanSp The current object (for fluent API support)
     * @see        addRombonganBelajars()
     */
    public function clearRombonganBelajars()
    {
        $this->collRombonganBelajars = null; // important to set this to null since that means it is uninitialized
        $this->collRombonganBelajarsPartial = null;

        return $this;
    }

    /**
     * reset is the collRombonganBelajars collection loaded partially
     *
     * @return void
     */
    public function resetPartialRombonganBelajars($v = true)
    {
        $this->collRombonganBelajarsPartial = $v;
    }

    /**
     * Initializes the collRombonganBelajars collection.
     *
     * By default this just sets the collRombonganBelajars collection to an empty array (like clearcollRombonganBelajars());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initRombonganBelajars($overrideExisting = true)
    {
        if (null !== $this->collRombonganBelajars && !$overrideExisting) {
            return;
        }
        $this->collRombonganBelajars = new PropelObjectCollection();
        $this->collRombonganBelajars->setModel('RombonganBelajar');
    }

    /**
     * Gets an array of RombonganBelajar objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this JurusanSp is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|RombonganBelajar[] List of RombonganBelajar objects
     * @throws PropelException
     */
    public function getRombonganBelajars($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collRombonganBelajarsPartial && !$this->isNew();
        if (null === $this->collRombonganBelajars || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collRombonganBelajars) {
                // return empty collection
                $this->initRombonganBelajars();
            } else {
                $collRombonganBelajars = RombonganBelajarQuery::create(null, $criteria)
                    ->filterByJurusanSp($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collRombonganBelajarsPartial && count($collRombonganBelajars)) {
                      $this->initRombonganBelajars(false);

                      foreach($collRombonganBelajars as $obj) {
                        if (false == $this->collRombonganBelajars->contains($obj)) {
                          $this->collRombonganBelajars->append($obj);
                        }
                      }

                      $this->collRombonganBelajarsPartial = true;
                    }

                    $collRombonganBelajars->getInternalIterator()->rewind();
                    return $collRombonganBelajars;
                }

                if($partial && $this->collRombonganBelajars) {
                    foreach($this->collRombonganBelajars as $obj) {
                        if($obj->isNew()) {
                            $collRombonganBelajars[] = $obj;
                        }
                    }
                }

                $this->collRombonganBelajars = $collRombonganBelajars;
                $this->collRombonganBelajarsPartial = false;
            }
        }

        return $this->collRombonganBelajars;
    }

    /**
     * Sets a collection of RombonganBelajar objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $rombonganBelajars A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return JurusanSp The current object (for fluent API support)
     */
    public function setRombonganBelajars(PropelCollection $rombonganBelajars, PropelPDO $con = null)
    {
        $rombonganBelajarsToDelete = $this->getRombonganBelajars(new Criteria(), $con)->diff($rombonganBelajars);

        $this->rombonganBelajarsScheduledForDeletion = unserialize(serialize($rombonganBelajarsToDelete));

        foreach ($rombonganBelajarsToDelete as $rombonganBelajarRemoved) {
            $rombonganBelajarRemoved->setJurusanSp(null);
        }

        $this->collRombonganBelajars = null;
        foreach ($rombonganBelajars as $rombonganBelajar) {
            $this->addRombonganBelajar($rombonganBelajar);
        }

        $this->collRombonganBelajars = $rombonganBelajars;
        $this->collRombonganBelajarsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related RombonganBelajar objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related RombonganBelajar objects.
     * @throws PropelException
     */
    public function countRombonganBelajars(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collRombonganBelajarsPartial && !$this->isNew();
        if (null === $this->collRombonganBelajars || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collRombonganBelajars) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getRombonganBelajars());
            }
            $query = RombonganBelajarQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByJurusanSp($this)
                ->count($con);
        }

        return count($this->collRombonganBelajars);
    }

    /**
     * Method called to associate a RombonganBelajar object to this object
     * through the RombonganBelajar foreign key attribute.
     *
     * @param    RombonganBelajar $l RombonganBelajar
     * @return JurusanSp The current object (for fluent API support)
     */
    public function addRombonganBelajar(RombonganBelajar $l)
    {
        if ($this->collRombonganBelajars === null) {
            $this->initRombonganBelajars();
            $this->collRombonganBelajarsPartial = true;
        }
        if (!in_array($l, $this->collRombonganBelajars->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddRombonganBelajar($l);
        }

        return $this;
    }

    /**
     * @param	RombonganBelajar $rombonganBelajar The rombonganBelajar object to add.
     */
    protected function doAddRombonganBelajar($rombonganBelajar)
    {
        $this->collRombonganBelajars[]= $rombonganBelajar;
        $rombonganBelajar->setJurusanSp($this);
    }

    /**
     * @param	RombonganBelajar $rombonganBelajar The rombonganBelajar object to remove.
     * @return JurusanSp The current object (for fluent API support)
     */
    public function removeRombonganBelajar($rombonganBelajar)
    {
        if ($this->getRombonganBelajars()->contains($rombonganBelajar)) {
            $this->collRombonganBelajars->remove($this->collRombonganBelajars->search($rombonganBelajar));
            if (null === $this->rombonganBelajarsScheduledForDeletion) {
                $this->rombonganBelajarsScheduledForDeletion = clone $this->collRombonganBelajars;
                $this->rombonganBelajarsScheduledForDeletion->clear();
            }
            $this->rombonganBelajarsScheduledForDeletion[]= $rombonganBelajar;
            $rombonganBelajar->setJurusanSp(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JurusanSp is new, it will return
     * an empty collection; or if this JurusanSp has previously
     * been saved, it will retrieve related RombonganBelajars from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JurusanSp.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|RombonganBelajar[] List of RombonganBelajar objects
     */
    public function getRombonganBelajarsJoinKebutuhanKhusus($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = RombonganBelajarQuery::create(null, $criteria);
        $query->joinWith('KebutuhanKhusus', $join_behavior);

        return $this->getRombonganBelajars($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JurusanSp is new, it will return
     * an empty collection; or if this JurusanSp has previously
     * been saved, it will retrieve related RombonganBelajars from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JurusanSp.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|RombonganBelajar[] List of RombonganBelajar objects
     */
    public function getRombonganBelajarsJoinKurikulum($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = RombonganBelajarQuery::create(null, $criteria);
        $query->joinWith('Kurikulum', $join_behavior);

        return $this->getRombonganBelajars($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JurusanSp is new, it will return
     * an empty collection; or if this JurusanSp has previously
     * been saved, it will retrieve related RombonganBelajars from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JurusanSp.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|RombonganBelajar[] List of RombonganBelajar objects
     */
    public function getRombonganBelajarsJoinSemester($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = RombonganBelajarQuery::create(null, $criteria);
        $query->joinWith('Semester', $join_behavior);

        return $this->getRombonganBelajars($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JurusanSp is new, it will return
     * an empty collection; or if this JurusanSp has previously
     * been saved, it will retrieve related RombonganBelajars from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JurusanSp.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|RombonganBelajar[] List of RombonganBelajar objects
     */
    public function getRombonganBelajarsJoinTingkatPendidikan($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = RombonganBelajarQuery::create(null, $criteria);
        $query->joinWith('TingkatPendidikan', $join_behavior);

        return $this->getRombonganBelajars($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JurusanSp is new, it will return
     * an empty collection; or if this JurusanSp has previously
     * been saved, it will retrieve related RombonganBelajars from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JurusanSp.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|RombonganBelajar[] List of RombonganBelajar objects
     */
    public function getRombonganBelajarsJoinPtk($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = RombonganBelajarQuery::create(null, $criteria);
        $query->joinWith('Ptk', $join_behavior);

        return $this->getRombonganBelajars($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JurusanSp is new, it will return
     * an empty collection; or if this JurusanSp has previously
     * been saved, it will retrieve related RombonganBelajars from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JurusanSp.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|RombonganBelajar[] List of RombonganBelajar objects
     */
    public function getRombonganBelajarsJoinRuang($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = RombonganBelajarQuery::create(null, $criteria);
        $query->joinWith('Ruang', $join_behavior);

        return $this->getRombonganBelajars($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JurusanSp is new, it will return
     * an empty collection; or if this JurusanSp has previously
     * been saved, it will retrieve related RombonganBelajars from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JurusanSp.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|RombonganBelajar[] List of RombonganBelajar objects
     */
    public function getRombonganBelajarsJoinSekolah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = RombonganBelajarQuery::create(null, $criteria);
        $query->joinWith('Sekolah', $join_behavior);

        return $this->getRombonganBelajars($query, $con);
    }

    /**
     * Clears out the collVldJurusanSps collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return JurusanSp The current object (for fluent API support)
     * @see        addVldJurusanSps()
     */
    public function clearVldJurusanSps()
    {
        $this->collVldJurusanSps = null; // important to set this to null since that means it is uninitialized
        $this->collVldJurusanSpsPartial = null;

        return $this;
    }

    /**
     * reset is the collVldJurusanSps collection loaded partially
     *
     * @return void
     */
    public function resetPartialVldJurusanSps($v = true)
    {
        $this->collVldJurusanSpsPartial = $v;
    }

    /**
     * Initializes the collVldJurusanSps collection.
     *
     * By default this just sets the collVldJurusanSps collection to an empty array (like clearcollVldJurusanSps());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initVldJurusanSps($overrideExisting = true)
    {
        if (null !== $this->collVldJurusanSps && !$overrideExisting) {
            return;
        }
        $this->collVldJurusanSps = new PropelObjectCollection();
        $this->collVldJurusanSps->setModel('VldJurusanSp');
    }

    /**
     * Gets an array of VldJurusanSp objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this JurusanSp is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|VldJurusanSp[] List of VldJurusanSp objects
     * @throws PropelException
     */
    public function getVldJurusanSps($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collVldJurusanSpsPartial && !$this->isNew();
        if (null === $this->collVldJurusanSps || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collVldJurusanSps) {
                // return empty collection
                $this->initVldJurusanSps();
            } else {
                $collVldJurusanSps = VldJurusanSpQuery::create(null, $criteria)
                    ->filterByJurusanSp($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collVldJurusanSpsPartial && count($collVldJurusanSps)) {
                      $this->initVldJurusanSps(false);

                      foreach($collVldJurusanSps as $obj) {
                        if (false == $this->collVldJurusanSps->contains($obj)) {
                          $this->collVldJurusanSps->append($obj);
                        }
                      }

                      $this->collVldJurusanSpsPartial = true;
                    }

                    $collVldJurusanSps->getInternalIterator()->rewind();
                    return $collVldJurusanSps;
                }

                if($partial && $this->collVldJurusanSps) {
                    foreach($this->collVldJurusanSps as $obj) {
                        if($obj->isNew()) {
                            $collVldJurusanSps[] = $obj;
                        }
                    }
                }

                $this->collVldJurusanSps = $collVldJurusanSps;
                $this->collVldJurusanSpsPartial = false;
            }
        }

        return $this->collVldJurusanSps;
    }

    /**
     * Sets a collection of VldJurusanSp objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $vldJurusanSps A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return JurusanSp The current object (for fluent API support)
     */
    public function setVldJurusanSps(PropelCollection $vldJurusanSps, PropelPDO $con = null)
    {
        $vldJurusanSpsToDelete = $this->getVldJurusanSps(new Criteria(), $con)->diff($vldJurusanSps);

        $this->vldJurusanSpsScheduledForDeletion = unserialize(serialize($vldJurusanSpsToDelete));

        foreach ($vldJurusanSpsToDelete as $vldJurusanSpRemoved) {
            $vldJurusanSpRemoved->setJurusanSp(null);
        }

        $this->collVldJurusanSps = null;
        foreach ($vldJurusanSps as $vldJurusanSp) {
            $this->addVldJurusanSp($vldJurusanSp);
        }

        $this->collVldJurusanSps = $vldJurusanSps;
        $this->collVldJurusanSpsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related VldJurusanSp objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related VldJurusanSp objects.
     * @throws PropelException
     */
    public function countVldJurusanSps(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collVldJurusanSpsPartial && !$this->isNew();
        if (null === $this->collVldJurusanSps || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collVldJurusanSps) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getVldJurusanSps());
            }
            $query = VldJurusanSpQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByJurusanSp($this)
                ->count($con);
        }

        return count($this->collVldJurusanSps);
    }

    /**
     * Method called to associate a VldJurusanSp object to this object
     * through the VldJurusanSp foreign key attribute.
     *
     * @param    VldJurusanSp $l VldJurusanSp
     * @return JurusanSp The current object (for fluent API support)
     */
    public function addVldJurusanSp(VldJurusanSp $l)
    {
        if ($this->collVldJurusanSps === null) {
            $this->initVldJurusanSps();
            $this->collVldJurusanSpsPartial = true;
        }
        if (!in_array($l, $this->collVldJurusanSps->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddVldJurusanSp($l);
        }

        return $this;
    }

    /**
     * @param	VldJurusanSp $vldJurusanSp The vldJurusanSp object to add.
     */
    protected function doAddVldJurusanSp($vldJurusanSp)
    {
        $this->collVldJurusanSps[]= $vldJurusanSp;
        $vldJurusanSp->setJurusanSp($this);
    }

    /**
     * @param	VldJurusanSp $vldJurusanSp The vldJurusanSp object to remove.
     * @return JurusanSp The current object (for fluent API support)
     */
    public function removeVldJurusanSp($vldJurusanSp)
    {
        if ($this->getVldJurusanSps()->contains($vldJurusanSp)) {
            $this->collVldJurusanSps->remove($this->collVldJurusanSps->search($vldJurusanSp));
            if (null === $this->vldJurusanSpsScheduledForDeletion) {
                $this->vldJurusanSpsScheduledForDeletion = clone $this->collVldJurusanSps;
                $this->vldJurusanSpsScheduledForDeletion->clear();
            }
            $this->vldJurusanSpsScheduledForDeletion[]= clone $vldJurusanSp;
            $vldJurusanSp->setJurusanSp(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JurusanSp is new, it will return
     * an empty collection; or if this JurusanSp has previously
     * been saved, it will retrieve related VldJurusanSps from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JurusanSp.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|VldJurusanSp[] List of VldJurusanSp objects
     */
    public function getVldJurusanSpsJoinErrortype($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = VldJurusanSpQuery::create(null, $criteria);
        $query->joinWith('Errortype', $join_behavior);

        return $this->getVldJurusanSps($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->jurusan_sp_id = null;
        $this->sekolah_id = null;
        $this->kebutuhan_khusus_id = null;
        $this->jurusan_id = null;
        $this->nama_jurusan_sp = null;
        $this->sk_izin = null;
        $this->tanggal_sk_izin = null;
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
            if ($this->collAkreditasiProdis) {
                foreach ($this->collAkreditasiProdis as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collJurSpLongs) {
                foreach ($this->collJurSpLongs as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collJurusanKerjasamas) {
                foreach ($this->collJurusanKerjasamas as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collRegistrasiPesertaDidiks) {
                foreach ($this->collRegistrasiPesertaDidiks as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collRombonganBelajars) {
                foreach ($this->collRombonganBelajars as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collVldJurusanSps) {
                foreach ($this->collVldJurusanSps as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aSekolah instanceof Persistent) {
              $this->aSekolah->clearAllReferences($deep);
            }
            if ($this->aJurusan instanceof Persistent) {
              $this->aJurusan->clearAllReferences($deep);
            }
            if ($this->aKebutuhanKhusus instanceof Persistent) {
              $this->aKebutuhanKhusus->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collAkreditasiProdis instanceof PropelCollection) {
            $this->collAkreditasiProdis->clearIterator();
        }
        $this->collAkreditasiProdis = null;
        if ($this->collJurSpLongs instanceof PropelCollection) {
            $this->collJurSpLongs->clearIterator();
        }
        $this->collJurSpLongs = null;
        if ($this->collJurusanKerjasamas instanceof PropelCollection) {
            $this->collJurusanKerjasamas->clearIterator();
        }
        $this->collJurusanKerjasamas = null;
        if ($this->collRegistrasiPesertaDidiks instanceof PropelCollection) {
            $this->collRegistrasiPesertaDidiks->clearIterator();
        }
        $this->collRegistrasiPesertaDidiks = null;
        if ($this->collRombonganBelajars instanceof PropelCollection) {
            $this->collRombonganBelajars->clearIterator();
        }
        $this->collRombonganBelajars = null;
        if ($this->collVldJurusanSps instanceof PropelCollection) {
            $this->collVldJurusanSps->clearIterator();
        }
        $this->collVldJurusanSps = null;
        $this->aSekolah = null;
        $this->aJurusan = null;
        $this->aKebutuhanKhusus = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(JurusanSpPeer::DEFAULT_STRING_FORMAT);
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
