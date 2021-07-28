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
use DataDikdas\Model\BeasiswaPesertaDidik;
use DataDikdas\Model\BeasiswaPesertaDidikQuery;
use DataDikdas\Model\Demografi;
use DataDikdas\Model\DemografiQuery;
use DataDikdas\Model\PengawasTerdaftar;
use DataDikdas\Model\PengawasTerdaftarQuery;
use DataDikdas\Model\PesertaDidikBaru;
use DataDikdas\Model\PesertaDidikBaruQuery;
use DataDikdas\Model\PtkBaru;
use DataDikdas\Model\PtkBaruQuery;
use DataDikdas\Model\PtkTerdaftar;
use DataDikdas\Model\PtkTerdaftarQuery;
use DataDikdas\Model\Semester;
use DataDikdas\Model\SemesterQuery;
use DataDikdas\Model\TahunAjaran;
use DataDikdas\Model\TahunAjaranPeer;
use DataDikdas\Model\TahunAjaranQuery;
use DataDikdas\Model\TanahLongitudinal;
use DataDikdas\Model\TanahLongitudinalQuery;
use DataDikdas\Model\TemplateUn;
use DataDikdas\Model\TemplateUnQuery;
use DataDikdas\Model\Un;
use DataDikdas\Model\UnQuery;

/**
 * Base class that represents a row from the 'ref.tahun_ajaran' table.
 *
 * 
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseTahunAjaran extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'DataDikdas\\Model\\TahunAjaranPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        TahunAjaranPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the tahun_ajaran_id field.
     * @var        string
     */
    protected $tahun_ajaran_id;

    /**
     * The value for the nama field.
     * @var        string
     */
    protected $nama;

    /**
     * The value for the periode_aktif field.
     * @var        string
     */
    protected $periode_aktif;

    /**
     * The value for the tanggal_mulai field.
     * @var        string
     */
    protected $tanggal_mulai;

    /**
     * The value for the tanggal_selesai field.
     * @var        string
     */
    protected $tanggal_selesai;

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
     * @var        PropelObjectCollection|BeasiswaPesertaDidik[] Collection to store aggregation of BeasiswaPesertaDidik objects.
     */
    protected $collBeasiswaPesertaDidiksRelatedByTahunSelesai;
    protected $collBeasiswaPesertaDidiksRelatedByTahunSelesaiPartial;

    /**
     * @var        PropelObjectCollection|BeasiswaPesertaDidik[] Collection to store aggregation of BeasiswaPesertaDidik objects.
     */
    protected $collBeasiswaPesertaDidiksRelatedByTahunMulai;
    protected $collBeasiswaPesertaDidiksRelatedByTahunMulaiPartial;

    /**
     * @var        PropelObjectCollection|Demografi[] Collection to store aggregation of Demografi objects.
     */
    protected $collDemografis;
    protected $collDemografisPartial;

    /**
     * @var        PropelObjectCollection|PengawasTerdaftar[] Collection to store aggregation of PengawasTerdaftar objects.
     */
    protected $collPengawasTerdaftars;
    protected $collPengawasTerdaftarsPartial;

    /**
     * @var        PropelObjectCollection|PesertaDidikBaru[] Collection to store aggregation of PesertaDidikBaru objects.
     */
    protected $collPesertaDidikBarus;
    protected $collPesertaDidikBarusPartial;

    /**
     * @var        PropelObjectCollection|PtkBaru[] Collection to store aggregation of PtkBaru objects.
     */
    protected $collPtkBarus;
    protected $collPtkBarusPartial;

    /**
     * @var        PropelObjectCollection|PtkTerdaftar[] Collection to store aggregation of PtkTerdaftar objects.
     */
    protected $collPtkTerdaftars;
    protected $collPtkTerdaftarsPartial;

    /**
     * @var        PropelObjectCollection|Semester[] Collection to store aggregation of Semester objects.
     */
    protected $collSemesters;
    protected $collSemestersPartial;

    /**
     * @var        PropelObjectCollection|TanahLongitudinal[] Collection to store aggregation of TanahLongitudinal objects.
     */
    protected $collTanahLongitudinals;
    protected $collTanahLongitudinalsPartial;

    /**
     * @var        PropelObjectCollection|TemplateUn[] Collection to store aggregation of TemplateUn objects.
     */
    protected $collTemplateUns;
    protected $collTemplateUnsPartial;

    /**
     * @var        PropelObjectCollection|Un[] Collection to store aggregation of Un objects.
     */
    protected $collUns;
    protected $collUnsPartial;

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
    protected $beasiswaPesertaDidiksRelatedByTahunSelesaiScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $beasiswaPesertaDidiksRelatedByTahunMulaiScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $demografisScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $pengawasTerdaftarsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $pesertaDidikBarusScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $ptkBarusScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $ptkTerdaftarsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $semestersScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $tanahLongitudinalsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $templateUnsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $unsScheduledForDeletion = null;

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
     * Initializes internal state of BaseTahunAjaran object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [tahun_ajaran_id] column value.
     * 
     * @return string
     */
    public function getTahunAjaranId()
    {
        return $this->tahun_ajaran_id;
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
     * Get the [periode_aktif] column value.
     * 
     * @return string
     */
    public function getPeriodeAktif()
    {
        return $this->periode_aktif;
    }

    /**
     * Get the [optionally formatted] temporal [tanggal_mulai] column value.
     * 
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getTanggalMulai($format = '%Y-%m-%d')
    {
        if ($this->tanggal_mulai === null) {
            return null;
        }


        try {
            $dt = new DateTime($this->tanggal_mulai);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->tanggal_mulai, true), $x);
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
     * Get the [optionally formatted] temporal [tanggal_selesai] column value.
     * 
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getTanggalSelesai($format = '%Y-%m-%d')
    {
        if ($this->tanggal_selesai === null) {
            return null;
        }


        try {
            $dt = new DateTime($this->tanggal_selesai);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->tanggal_selesai, true), $x);
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
     * Set the value of [tahun_ajaran_id] column.
     * 
     * @param string $v new value
     * @return TahunAjaran The current object (for fluent API support)
     */
    public function setTahunAjaranId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->tahun_ajaran_id !== $v) {
            $this->tahun_ajaran_id = $v;
            $this->modifiedColumns[] = TahunAjaranPeer::TAHUN_AJARAN_ID;
        }


        return $this;
    } // setTahunAjaranId()

    /**
     * Set the value of [nama] column.
     * 
     * @param string $v new value
     * @return TahunAjaran The current object (for fluent API support)
     */
    public function setNama($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nama !== $v) {
            $this->nama = $v;
            $this->modifiedColumns[] = TahunAjaranPeer::NAMA;
        }


        return $this;
    } // setNama()

    /**
     * Set the value of [periode_aktif] column.
     * 
     * @param string $v new value
     * @return TahunAjaran The current object (for fluent API support)
     */
    public function setPeriodeAktif($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->periode_aktif !== $v) {
            $this->periode_aktif = $v;
            $this->modifiedColumns[] = TahunAjaranPeer::PERIODE_AKTIF;
        }


        return $this;
    } // setPeriodeAktif()

    /**
     * Sets the value of [tanggal_mulai] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return TahunAjaran The current object (for fluent API support)
     */
    public function setTanggalMulai($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->tanggal_mulai !== null || $dt !== null) {
            $currentDateAsString = ($this->tanggal_mulai !== null && $tmpDt = new DateTime($this->tanggal_mulai)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->tanggal_mulai = $newDateAsString;
                $this->modifiedColumns[] = TahunAjaranPeer::TANGGAL_MULAI;
            }
        } // if either are not null


        return $this;
    } // setTanggalMulai()

    /**
     * Sets the value of [tanggal_selesai] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return TahunAjaran The current object (for fluent API support)
     */
    public function setTanggalSelesai($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->tanggal_selesai !== null || $dt !== null) {
            $currentDateAsString = ($this->tanggal_selesai !== null && $tmpDt = new DateTime($this->tanggal_selesai)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->tanggal_selesai = $newDateAsString;
                $this->modifiedColumns[] = TahunAjaranPeer::TANGGAL_SELESAI;
            }
        } // if either are not null


        return $this;
    } // setTanggalSelesai()

    /**
     * Sets the value of [create_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return TahunAjaran The current object (for fluent API support)
     */
    public function setCreateDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->create_date !== null || $dt !== null) {
            $currentDateAsString = ($this->create_date !== null && $tmpDt = new DateTime($this->create_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->create_date = $newDateAsString;
                $this->modifiedColumns[] = TahunAjaranPeer::CREATE_DATE;
            }
        } // if either are not null


        return $this;
    } // setCreateDate()

    /**
     * Sets the value of [last_update] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return TahunAjaran The current object (for fluent API support)
     */
    public function setLastUpdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->last_update !== null || $dt !== null) {
            $currentDateAsString = ($this->last_update !== null && $tmpDt = new DateTime($this->last_update)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->last_update = $newDateAsString;
                $this->modifiedColumns[] = TahunAjaranPeer::LAST_UPDATE;
            }
        } // if either are not null


        return $this;
    } // setLastUpdate()

    /**
     * Sets the value of [expired_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return TahunAjaran The current object (for fluent API support)
     */
    public function setExpiredDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->expired_date !== null || $dt !== null) {
            $currentDateAsString = ($this->expired_date !== null && $tmpDt = new DateTime($this->expired_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->expired_date = $newDateAsString;
                $this->modifiedColumns[] = TahunAjaranPeer::EXPIRED_DATE;
            }
        } // if either are not null


        return $this;
    } // setExpiredDate()

    /**
     * Sets the value of [last_sync] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return TahunAjaran The current object (for fluent API support)
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
                $this->modifiedColumns[] = TahunAjaranPeer::LAST_SYNC;
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

            $this->tahun_ajaran_id = ($row[$startcol + 0] !== null) ? (string) $row[$startcol + 0] : null;
            $this->nama = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->periode_aktif = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->tanggal_mulai = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->tanggal_selesai = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->create_date = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->last_update = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->expired_date = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->last_sync = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 9; // 9 = TahunAjaranPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating TahunAjaran object", $e);
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
            $con = Propel::getConnection(TahunAjaranPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = TahunAjaranPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->collBeasiswaPesertaDidiksRelatedByTahunSelesai = null;

            $this->collBeasiswaPesertaDidiksRelatedByTahunMulai = null;

            $this->collDemografis = null;

            $this->collPengawasTerdaftars = null;

            $this->collPesertaDidikBarus = null;

            $this->collPtkBarus = null;

            $this->collPtkTerdaftars = null;

            $this->collSemesters = null;

            $this->collTanahLongitudinals = null;

            $this->collTemplateUns = null;

            $this->collUns = null;

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
            $con = Propel::getConnection(TahunAjaranPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = TahunAjaranQuery::create()
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
            $con = Propel::getConnection(TahunAjaranPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                TahunAjaranPeer::addInstanceToPool($this);
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

            if ($this->beasiswaPesertaDidiksRelatedByTahunSelesaiScheduledForDeletion !== null) {
                if (!$this->beasiswaPesertaDidiksRelatedByTahunSelesaiScheduledForDeletion->isEmpty()) {
                    BeasiswaPesertaDidikQuery::create()
                        ->filterByPrimaryKeys($this->beasiswaPesertaDidiksRelatedByTahunSelesaiScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->beasiswaPesertaDidiksRelatedByTahunSelesaiScheduledForDeletion = null;
                }
            }

            if ($this->collBeasiswaPesertaDidiksRelatedByTahunSelesai !== null) {
                foreach ($this->collBeasiswaPesertaDidiksRelatedByTahunSelesai as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->beasiswaPesertaDidiksRelatedByTahunMulaiScheduledForDeletion !== null) {
                if (!$this->beasiswaPesertaDidiksRelatedByTahunMulaiScheduledForDeletion->isEmpty()) {
                    BeasiswaPesertaDidikQuery::create()
                        ->filterByPrimaryKeys($this->beasiswaPesertaDidiksRelatedByTahunMulaiScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->beasiswaPesertaDidiksRelatedByTahunMulaiScheduledForDeletion = null;
                }
            }

            if ($this->collBeasiswaPesertaDidiksRelatedByTahunMulai !== null) {
                foreach ($this->collBeasiswaPesertaDidiksRelatedByTahunMulai as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->demografisScheduledForDeletion !== null) {
                if (!$this->demografisScheduledForDeletion->isEmpty()) {
                    DemografiQuery::create()
                        ->filterByPrimaryKeys($this->demografisScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->demografisScheduledForDeletion = null;
                }
            }

            if ($this->collDemografis !== null) {
                foreach ($this->collDemografis as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->pengawasTerdaftarsScheduledForDeletion !== null) {
                if (!$this->pengawasTerdaftarsScheduledForDeletion->isEmpty()) {
                    PengawasTerdaftarQuery::create()
                        ->filterByPrimaryKeys($this->pengawasTerdaftarsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->pengawasTerdaftarsScheduledForDeletion = null;
                }
            }

            if ($this->collPengawasTerdaftars !== null) {
                foreach ($this->collPengawasTerdaftars as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->pesertaDidikBarusScheduledForDeletion !== null) {
                if (!$this->pesertaDidikBarusScheduledForDeletion->isEmpty()) {
                    PesertaDidikBaruQuery::create()
                        ->filterByPrimaryKeys($this->pesertaDidikBarusScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->pesertaDidikBarusScheduledForDeletion = null;
                }
            }

            if ($this->collPesertaDidikBarus !== null) {
                foreach ($this->collPesertaDidikBarus as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->ptkBarusScheduledForDeletion !== null) {
                if (!$this->ptkBarusScheduledForDeletion->isEmpty()) {
                    PtkBaruQuery::create()
                        ->filterByPrimaryKeys($this->ptkBarusScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->ptkBarusScheduledForDeletion = null;
                }
            }

            if ($this->collPtkBarus !== null) {
                foreach ($this->collPtkBarus as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->ptkTerdaftarsScheduledForDeletion !== null) {
                if (!$this->ptkTerdaftarsScheduledForDeletion->isEmpty()) {
                    PtkTerdaftarQuery::create()
                        ->filterByPrimaryKeys($this->ptkTerdaftarsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->ptkTerdaftarsScheduledForDeletion = null;
                }
            }

            if ($this->collPtkTerdaftars !== null) {
                foreach ($this->collPtkTerdaftars as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->semestersScheduledForDeletion !== null) {
                if (!$this->semestersScheduledForDeletion->isEmpty()) {
                    SemesterQuery::create()
                        ->filterByPrimaryKeys($this->semestersScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->semestersScheduledForDeletion = null;
                }
            }

            if ($this->collSemesters !== null) {
                foreach ($this->collSemesters as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->tanahLongitudinalsScheduledForDeletion !== null) {
                if (!$this->tanahLongitudinalsScheduledForDeletion->isEmpty()) {
                    TanahLongitudinalQuery::create()
                        ->filterByPrimaryKeys($this->tanahLongitudinalsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->tanahLongitudinalsScheduledForDeletion = null;
                }
            }

            if ($this->collTanahLongitudinals !== null) {
                foreach ($this->collTanahLongitudinals as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->templateUnsScheduledForDeletion !== null) {
                if (!$this->templateUnsScheduledForDeletion->isEmpty()) {
                    TemplateUnQuery::create()
                        ->filterByPrimaryKeys($this->templateUnsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->templateUnsScheduledForDeletion = null;
                }
            }

            if ($this->collTemplateUns !== null) {
                foreach ($this->collTemplateUns as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->unsScheduledForDeletion !== null) {
                if (!$this->unsScheduledForDeletion->isEmpty()) {
                    UnQuery::create()
                        ->filterByPrimaryKeys($this->unsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->unsScheduledForDeletion = null;
                }
            }

            if ($this->collUns !== null) {
                foreach ($this->collUns as $referrerFK) {
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
        if ($this->isColumnModified(TahunAjaranPeer::TAHUN_AJARAN_ID)) {
            $modifiedColumns[':p' . $index++]  = '"tahun_ajaran_id"';
        }
        if ($this->isColumnModified(TahunAjaranPeer::NAMA)) {
            $modifiedColumns[':p' . $index++]  = '"nama"';
        }
        if ($this->isColumnModified(TahunAjaranPeer::PERIODE_AKTIF)) {
            $modifiedColumns[':p' . $index++]  = '"periode_aktif"';
        }
        if ($this->isColumnModified(TahunAjaranPeer::TANGGAL_MULAI)) {
            $modifiedColumns[':p' . $index++]  = '"tanggal_mulai"';
        }
        if ($this->isColumnModified(TahunAjaranPeer::TANGGAL_SELESAI)) {
            $modifiedColumns[':p' . $index++]  = '"tanggal_selesai"';
        }
        if ($this->isColumnModified(TahunAjaranPeer::CREATE_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"create_date"';
        }
        if ($this->isColumnModified(TahunAjaranPeer::LAST_UPDATE)) {
            $modifiedColumns[':p' . $index++]  = '"last_update"';
        }
        if ($this->isColumnModified(TahunAjaranPeer::EXPIRED_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"expired_date"';
        }
        if ($this->isColumnModified(TahunAjaranPeer::LAST_SYNC)) {
            $modifiedColumns[':p' . $index++]  = '"last_sync"';
        }

        $sql = sprintf(
            'INSERT INTO "ref"."tahun_ajaran" (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '"tahun_ajaran_id"':						
                        $stmt->bindValue($identifier, $this->tahun_ajaran_id, PDO::PARAM_STR);
                        break;
                    case '"nama"':						
                        $stmt->bindValue($identifier, $this->nama, PDO::PARAM_STR);
                        break;
                    case '"periode_aktif"':						
                        $stmt->bindValue($identifier, $this->periode_aktif, PDO::PARAM_STR);
                        break;
                    case '"tanggal_mulai"':						
                        $stmt->bindValue($identifier, $this->tanggal_mulai, PDO::PARAM_STR);
                        break;
                    case '"tanggal_selesai"':						
                        $stmt->bindValue($identifier, $this->tanggal_selesai, PDO::PARAM_STR);
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


            if (($retval = TahunAjaranPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collBeasiswaPesertaDidiksRelatedByTahunSelesai !== null) {
                    foreach ($this->collBeasiswaPesertaDidiksRelatedByTahunSelesai as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collBeasiswaPesertaDidiksRelatedByTahunMulai !== null) {
                    foreach ($this->collBeasiswaPesertaDidiksRelatedByTahunMulai as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collDemografis !== null) {
                    foreach ($this->collDemografis as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collPengawasTerdaftars !== null) {
                    foreach ($this->collPengawasTerdaftars as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collPesertaDidikBarus !== null) {
                    foreach ($this->collPesertaDidikBarus as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collPtkBarus !== null) {
                    foreach ($this->collPtkBarus as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collPtkTerdaftars !== null) {
                    foreach ($this->collPtkTerdaftars as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collSemesters !== null) {
                    foreach ($this->collSemesters as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collTanahLongitudinals !== null) {
                    foreach ($this->collTanahLongitudinals as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collTemplateUns !== null) {
                    foreach ($this->collTemplateUns as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collUns !== null) {
                    foreach ($this->collUns as $referrerFK) {
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
        $pos = TahunAjaranPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getTahunAjaranId();
                break;
            case 1:
                return $this->getNama();
                break;
            case 2:
                return $this->getPeriodeAktif();
                break;
            case 3:
                return $this->getTanggalMulai();
                break;
            case 4:
                return $this->getTanggalSelesai();
                break;
            case 5:
                return $this->getCreateDate();
                break;
            case 6:
                return $this->getLastUpdate();
                break;
            case 7:
                return $this->getExpiredDate();
                break;
            case 8:
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
        if (isset($alreadyDumpedObjects['TahunAjaran'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['TahunAjaran'][$this->getPrimaryKey()] = true;
        $keys = TahunAjaranPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getTahunAjaranId(),
            $keys[1] => $this->getNama(),
            $keys[2] => $this->getPeriodeAktif(),
            $keys[3] => $this->getTanggalMulai(),
            $keys[4] => $this->getTanggalSelesai(),
            $keys[5] => $this->getCreateDate(),
            $keys[6] => $this->getLastUpdate(),
            $keys[7] => $this->getExpiredDate(),
            $keys[8] => $this->getLastSync(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->collBeasiswaPesertaDidiksRelatedByTahunSelesai) {
                $result['BeasiswaPesertaDidiksRelatedByTahunSelesai'] = $this->collBeasiswaPesertaDidiksRelatedByTahunSelesai->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collBeasiswaPesertaDidiksRelatedByTahunMulai) {
                $result['BeasiswaPesertaDidiksRelatedByTahunMulai'] = $this->collBeasiswaPesertaDidiksRelatedByTahunMulai->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collDemografis) {
                $result['Demografis'] = $this->collDemografis->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collPengawasTerdaftars) {
                $result['PengawasTerdaftars'] = $this->collPengawasTerdaftars->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collPesertaDidikBarus) {
                $result['PesertaDidikBarus'] = $this->collPesertaDidikBarus->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collPtkBarus) {
                $result['PtkBarus'] = $this->collPtkBarus->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collPtkTerdaftars) {
                $result['PtkTerdaftars'] = $this->collPtkTerdaftars->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collSemesters) {
                $result['Semesters'] = $this->collSemesters->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collTanahLongitudinals) {
                $result['TanahLongitudinals'] = $this->collTanahLongitudinals->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collTemplateUns) {
                $result['TemplateUns'] = $this->collTemplateUns->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collUns) {
                $result['Uns'] = $this->collUns->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = TahunAjaranPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setTahunAjaranId($value);
                break;
            case 1:
                $this->setNama($value);
                break;
            case 2:
                $this->setPeriodeAktif($value);
                break;
            case 3:
                $this->setTanggalMulai($value);
                break;
            case 4:
                $this->setTanggalSelesai($value);
                break;
            case 5:
                $this->setCreateDate($value);
                break;
            case 6:
                $this->setLastUpdate($value);
                break;
            case 7:
                $this->setExpiredDate($value);
                break;
            case 8:
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
        $keys = TahunAjaranPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setTahunAjaranId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setNama($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setPeriodeAktif($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setTanggalMulai($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setTanggalSelesai($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setCreateDate($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setLastUpdate($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setExpiredDate($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setLastSync($arr[$keys[8]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(TahunAjaranPeer::DATABASE_NAME);

        if ($this->isColumnModified(TahunAjaranPeer::TAHUN_AJARAN_ID)) $criteria->add(TahunAjaranPeer::TAHUN_AJARAN_ID, $this->tahun_ajaran_id);
        if ($this->isColumnModified(TahunAjaranPeer::NAMA)) $criteria->add(TahunAjaranPeer::NAMA, $this->nama);
        if ($this->isColumnModified(TahunAjaranPeer::PERIODE_AKTIF)) $criteria->add(TahunAjaranPeer::PERIODE_AKTIF, $this->periode_aktif);
        if ($this->isColumnModified(TahunAjaranPeer::TANGGAL_MULAI)) $criteria->add(TahunAjaranPeer::TANGGAL_MULAI, $this->tanggal_mulai);
        if ($this->isColumnModified(TahunAjaranPeer::TANGGAL_SELESAI)) $criteria->add(TahunAjaranPeer::TANGGAL_SELESAI, $this->tanggal_selesai);
        if ($this->isColumnModified(TahunAjaranPeer::CREATE_DATE)) $criteria->add(TahunAjaranPeer::CREATE_DATE, $this->create_date);
        if ($this->isColumnModified(TahunAjaranPeer::LAST_UPDATE)) $criteria->add(TahunAjaranPeer::LAST_UPDATE, $this->last_update);
        if ($this->isColumnModified(TahunAjaranPeer::EXPIRED_DATE)) $criteria->add(TahunAjaranPeer::EXPIRED_DATE, $this->expired_date);
        if ($this->isColumnModified(TahunAjaranPeer::LAST_SYNC)) $criteria->add(TahunAjaranPeer::LAST_SYNC, $this->last_sync);

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
        $criteria = new Criteria(TahunAjaranPeer::DATABASE_NAME);
        $criteria->add(TahunAjaranPeer::TAHUN_AJARAN_ID, $this->tahun_ajaran_id);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return string
     */
    public function getPrimaryKey()
    {
        return $this->getTahunAjaranId();
    }

    /**
     * Generic method to set the primary key (tahun_ajaran_id column).
     *
     * @param  string $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setTahunAjaranId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getTahunAjaranId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of TahunAjaran (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setNama($this->getNama());
        $copyObj->setPeriodeAktif($this->getPeriodeAktif());
        $copyObj->setTanggalMulai($this->getTanggalMulai());
        $copyObj->setTanggalSelesai($this->getTanggalSelesai());
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

            foreach ($this->getBeasiswaPesertaDidiksRelatedByTahunSelesai() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addBeasiswaPesertaDidikRelatedByTahunSelesai($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getBeasiswaPesertaDidiksRelatedByTahunMulai() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addBeasiswaPesertaDidikRelatedByTahunMulai($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getDemografis() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addDemografi($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getPengawasTerdaftars() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPengawasTerdaftar($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getPesertaDidikBarus() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPesertaDidikBaru($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getPtkBarus() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPtkBaru($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getPtkTerdaftars() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPtkTerdaftar($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getSemesters() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSemester($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getTanahLongitudinals() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addTanahLongitudinal($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getTemplateUns() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addTemplateUn($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getUns() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addUn($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setTahunAjaranId(NULL); // this is a auto-increment column, so set to default value
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
     * @return TahunAjaran Clone of current object.
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
     * @return TahunAjaranPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new TahunAjaranPeer();
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
        if ('BeasiswaPesertaDidikRelatedByTahunSelesai' == $relationName) {
            $this->initBeasiswaPesertaDidiksRelatedByTahunSelesai();
        }
        if ('BeasiswaPesertaDidikRelatedByTahunMulai' == $relationName) {
            $this->initBeasiswaPesertaDidiksRelatedByTahunMulai();
        }
        if ('Demografi' == $relationName) {
            $this->initDemografis();
        }
        if ('PengawasTerdaftar' == $relationName) {
            $this->initPengawasTerdaftars();
        }
        if ('PesertaDidikBaru' == $relationName) {
            $this->initPesertaDidikBarus();
        }
        if ('PtkBaru' == $relationName) {
            $this->initPtkBarus();
        }
        if ('PtkTerdaftar' == $relationName) {
            $this->initPtkTerdaftars();
        }
        if ('Semester' == $relationName) {
            $this->initSemesters();
        }
        if ('TanahLongitudinal' == $relationName) {
            $this->initTanahLongitudinals();
        }
        if ('TemplateUn' == $relationName) {
            $this->initTemplateUns();
        }
        if ('Un' == $relationName) {
            $this->initUns();
        }
    }

    /**
     * Clears out the collBeasiswaPesertaDidiksRelatedByTahunSelesai collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return TahunAjaran The current object (for fluent API support)
     * @see        addBeasiswaPesertaDidiksRelatedByTahunSelesai()
     */
    public function clearBeasiswaPesertaDidiksRelatedByTahunSelesai()
    {
        $this->collBeasiswaPesertaDidiksRelatedByTahunSelesai = null; // important to set this to null since that means it is uninitialized
        $this->collBeasiswaPesertaDidiksRelatedByTahunSelesaiPartial = null;

        return $this;
    }

    /**
     * reset is the collBeasiswaPesertaDidiksRelatedByTahunSelesai collection loaded partially
     *
     * @return void
     */
    public function resetPartialBeasiswaPesertaDidiksRelatedByTahunSelesai($v = true)
    {
        $this->collBeasiswaPesertaDidiksRelatedByTahunSelesaiPartial = $v;
    }

    /**
     * Initializes the collBeasiswaPesertaDidiksRelatedByTahunSelesai collection.
     *
     * By default this just sets the collBeasiswaPesertaDidiksRelatedByTahunSelesai collection to an empty array (like clearcollBeasiswaPesertaDidiksRelatedByTahunSelesai());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initBeasiswaPesertaDidiksRelatedByTahunSelesai($overrideExisting = true)
    {
        if (null !== $this->collBeasiswaPesertaDidiksRelatedByTahunSelesai && !$overrideExisting) {
            return;
        }
        $this->collBeasiswaPesertaDidiksRelatedByTahunSelesai = new PropelObjectCollection();
        $this->collBeasiswaPesertaDidiksRelatedByTahunSelesai->setModel('BeasiswaPesertaDidik');
    }

    /**
     * Gets an array of BeasiswaPesertaDidik objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this TahunAjaran is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|BeasiswaPesertaDidik[] List of BeasiswaPesertaDidik objects
     * @throws PropelException
     */
    public function getBeasiswaPesertaDidiksRelatedByTahunSelesai($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collBeasiswaPesertaDidiksRelatedByTahunSelesaiPartial && !$this->isNew();
        if (null === $this->collBeasiswaPesertaDidiksRelatedByTahunSelesai || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collBeasiswaPesertaDidiksRelatedByTahunSelesai) {
                // return empty collection
                $this->initBeasiswaPesertaDidiksRelatedByTahunSelesai();
            } else {
                $collBeasiswaPesertaDidiksRelatedByTahunSelesai = BeasiswaPesertaDidikQuery::create(null, $criteria)
                    ->filterByTahunAjaranRelatedByTahunSelesai($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collBeasiswaPesertaDidiksRelatedByTahunSelesaiPartial && count($collBeasiswaPesertaDidiksRelatedByTahunSelesai)) {
                      $this->initBeasiswaPesertaDidiksRelatedByTahunSelesai(false);

                      foreach($collBeasiswaPesertaDidiksRelatedByTahunSelesai as $obj) {
                        if (false == $this->collBeasiswaPesertaDidiksRelatedByTahunSelesai->contains($obj)) {
                          $this->collBeasiswaPesertaDidiksRelatedByTahunSelesai->append($obj);
                        }
                      }

                      $this->collBeasiswaPesertaDidiksRelatedByTahunSelesaiPartial = true;
                    }

                    $collBeasiswaPesertaDidiksRelatedByTahunSelesai->getInternalIterator()->rewind();
                    return $collBeasiswaPesertaDidiksRelatedByTahunSelesai;
                }

                if($partial && $this->collBeasiswaPesertaDidiksRelatedByTahunSelesai) {
                    foreach($this->collBeasiswaPesertaDidiksRelatedByTahunSelesai as $obj) {
                        if($obj->isNew()) {
                            $collBeasiswaPesertaDidiksRelatedByTahunSelesai[] = $obj;
                        }
                    }
                }

                $this->collBeasiswaPesertaDidiksRelatedByTahunSelesai = $collBeasiswaPesertaDidiksRelatedByTahunSelesai;
                $this->collBeasiswaPesertaDidiksRelatedByTahunSelesaiPartial = false;
            }
        }

        return $this->collBeasiswaPesertaDidiksRelatedByTahunSelesai;
    }

    /**
     * Sets a collection of BeasiswaPesertaDidikRelatedByTahunSelesai objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $beasiswaPesertaDidiksRelatedByTahunSelesai A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return TahunAjaran The current object (for fluent API support)
     */
    public function setBeasiswaPesertaDidiksRelatedByTahunSelesai(PropelCollection $beasiswaPesertaDidiksRelatedByTahunSelesai, PropelPDO $con = null)
    {
        $beasiswaPesertaDidiksRelatedByTahunSelesaiToDelete = $this->getBeasiswaPesertaDidiksRelatedByTahunSelesai(new Criteria(), $con)->diff($beasiswaPesertaDidiksRelatedByTahunSelesai);

        $this->beasiswaPesertaDidiksRelatedByTahunSelesaiScheduledForDeletion = unserialize(serialize($beasiswaPesertaDidiksRelatedByTahunSelesaiToDelete));

        foreach ($beasiswaPesertaDidiksRelatedByTahunSelesaiToDelete as $beasiswaPesertaDidikRelatedByTahunSelesaiRemoved) {
            $beasiswaPesertaDidikRelatedByTahunSelesaiRemoved->setTahunAjaranRelatedByTahunSelesai(null);
        }

        $this->collBeasiswaPesertaDidiksRelatedByTahunSelesai = null;
        foreach ($beasiswaPesertaDidiksRelatedByTahunSelesai as $beasiswaPesertaDidikRelatedByTahunSelesai) {
            $this->addBeasiswaPesertaDidikRelatedByTahunSelesai($beasiswaPesertaDidikRelatedByTahunSelesai);
        }

        $this->collBeasiswaPesertaDidiksRelatedByTahunSelesai = $beasiswaPesertaDidiksRelatedByTahunSelesai;
        $this->collBeasiswaPesertaDidiksRelatedByTahunSelesaiPartial = false;

        return $this;
    }

    /**
     * Returns the number of related BeasiswaPesertaDidik objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related BeasiswaPesertaDidik objects.
     * @throws PropelException
     */
    public function countBeasiswaPesertaDidiksRelatedByTahunSelesai(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collBeasiswaPesertaDidiksRelatedByTahunSelesaiPartial && !$this->isNew();
        if (null === $this->collBeasiswaPesertaDidiksRelatedByTahunSelesai || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collBeasiswaPesertaDidiksRelatedByTahunSelesai) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getBeasiswaPesertaDidiksRelatedByTahunSelesai());
            }
            $query = BeasiswaPesertaDidikQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByTahunAjaranRelatedByTahunSelesai($this)
                ->count($con);
        }

        return count($this->collBeasiswaPesertaDidiksRelatedByTahunSelesai);
    }

    /**
     * Method called to associate a BeasiswaPesertaDidik object to this object
     * through the BeasiswaPesertaDidik foreign key attribute.
     *
     * @param    BeasiswaPesertaDidik $l BeasiswaPesertaDidik
     * @return TahunAjaran The current object (for fluent API support)
     */
    public function addBeasiswaPesertaDidikRelatedByTahunSelesai(BeasiswaPesertaDidik $l)
    {
        if ($this->collBeasiswaPesertaDidiksRelatedByTahunSelesai === null) {
            $this->initBeasiswaPesertaDidiksRelatedByTahunSelesai();
            $this->collBeasiswaPesertaDidiksRelatedByTahunSelesaiPartial = true;
        }
        if (!in_array($l, $this->collBeasiswaPesertaDidiksRelatedByTahunSelesai->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddBeasiswaPesertaDidikRelatedByTahunSelesai($l);
        }

        return $this;
    }

    /**
     * @param	BeasiswaPesertaDidikRelatedByTahunSelesai $beasiswaPesertaDidikRelatedByTahunSelesai The beasiswaPesertaDidikRelatedByTahunSelesai object to add.
     */
    protected function doAddBeasiswaPesertaDidikRelatedByTahunSelesai($beasiswaPesertaDidikRelatedByTahunSelesai)
    {
        $this->collBeasiswaPesertaDidiksRelatedByTahunSelesai[]= $beasiswaPesertaDidikRelatedByTahunSelesai;
        $beasiswaPesertaDidikRelatedByTahunSelesai->setTahunAjaranRelatedByTahunSelesai($this);
    }

    /**
     * @param	BeasiswaPesertaDidikRelatedByTahunSelesai $beasiswaPesertaDidikRelatedByTahunSelesai The beasiswaPesertaDidikRelatedByTahunSelesai object to remove.
     * @return TahunAjaran The current object (for fluent API support)
     */
    public function removeBeasiswaPesertaDidikRelatedByTahunSelesai($beasiswaPesertaDidikRelatedByTahunSelesai)
    {
        if ($this->getBeasiswaPesertaDidiksRelatedByTahunSelesai()->contains($beasiswaPesertaDidikRelatedByTahunSelesai)) {
            $this->collBeasiswaPesertaDidiksRelatedByTahunSelesai->remove($this->collBeasiswaPesertaDidiksRelatedByTahunSelesai->search($beasiswaPesertaDidikRelatedByTahunSelesai));
            if (null === $this->beasiswaPesertaDidiksRelatedByTahunSelesaiScheduledForDeletion) {
                $this->beasiswaPesertaDidiksRelatedByTahunSelesaiScheduledForDeletion = clone $this->collBeasiswaPesertaDidiksRelatedByTahunSelesai;
                $this->beasiswaPesertaDidiksRelatedByTahunSelesaiScheduledForDeletion->clear();
            }
            $this->beasiswaPesertaDidiksRelatedByTahunSelesaiScheduledForDeletion[]= clone $beasiswaPesertaDidikRelatedByTahunSelesai;
            $beasiswaPesertaDidikRelatedByTahunSelesai->setTahunAjaranRelatedByTahunSelesai(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this TahunAjaran is new, it will return
     * an empty collection; or if this TahunAjaran has previously
     * been saved, it will retrieve related BeasiswaPesertaDidiksRelatedByTahunSelesai from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in TahunAjaran.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|BeasiswaPesertaDidik[] List of BeasiswaPesertaDidik objects
     */
    public function getBeasiswaPesertaDidiksRelatedByTahunSelesaiJoinPesertaDidik($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = BeasiswaPesertaDidikQuery::create(null, $criteria);
        $query->joinWith('PesertaDidik', $join_behavior);

        return $this->getBeasiswaPesertaDidiksRelatedByTahunSelesai($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this TahunAjaran is new, it will return
     * an empty collection; or if this TahunAjaran has previously
     * been saved, it will retrieve related BeasiswaPesertaDidiksRelatedByTahunSelesai from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in TahunAjaran.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|BeasiswaPesertaDidik[] List of BeasiswaPesertaDidik objects
     */
    public function getBeasiswaPesertaDidiksRelatedByTahunSelesaiJoinJenisBeasiswa($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = BeasiswaPesertaDidikQuery::create(null, $criteria);
        $query->joinWith('JenisBeasiswa', $join_behavior);

        return $this->getBeasiswaPesertaDidiksRelatedByTahunSelesai($query, $con);
    }

    /**
     * Clears out the collBeasiswaPesertaDidiksRelatedByTahunMulai collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return TahunAjaran The current object (for fluent API support)
     * @see        addBeasiswaPesertaDidiksRelatedByTahunMulai()
     */
    public function clearBeasiswaPesertaDidiksRelatedByTahunMulai()
    {
        $this->collBeasiswaPesertaDidiksRelatedByTahunMulai = null; // important to set this to null since that means it is uninitialized
        $this->collBeasiswaPesertaDidiksRelatedByTahunMulaiPartial = null;

        return $this;
    }

    /**
     * reset is the collBeasiswaPesertaDidiksRelatedByTahunMulai collection loaded partially
     *
     * @return void
     */
    public function resetPartialBeasiswaPesertaDidiksRelatedByTahunMulai($v = true)
    {
        $this->collBeasiswaPesertaDidiksRelatedByTahunMulaiPartial = $v;
    }

    /**
     * Initializes the collBeasiswaPesertaDidiksRelatedByTahunMulai collection.
     *
     * By default this just sets the collBeasiswaPesertaDidiksRelatedByTahunMulai collection to an empty array (like clearcollBeasiswaPesertaDidiksRelatedByTahunMulai());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initBeasiswaPesertaDidiksRelatedByTahunMulai($overrideExisting = true)
    {
        if (null !== $this->collBeasiswaPesertaDidiksRelatedByTahunMulai && !$overrideExisting) {
            return;
        }
        $this->collBeasiswaPesertaDidiksRelatedByTahunMulai = new PropelObjectCollection();
        $this->collBeasiswaPesertaDidiksRelatedByTahunMulai->setModel('BeasiswaPesertaDidik');
    }

    /**
     * Gets an array of BeasiswaPesertaDidik objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this TahunAjaran is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|BeasiswaPesertaDidik[] List of BeasiswaPesertaDidik objects
     * @throws PropelException
     */
    public function getBeasiswaPesertaDidiksRelatedByTahunMulai($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collBeasiswaPesertaDidiksRelatedByTahunMulaiPartial && !$this->isNew();
        if (null === $this->collBeasiswaPesertaDidiksRelatedByTahunMulai || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collBeasiswaPesertaDidiksRelatedByTahunMulai) {
                // return empty collection
                $this->initBeasiswaPesertaDidiksRelatedByTahunMulai();
            } else {
                $collBeasiswaPesertaDidiksRelatedByTahunMulai = BeasiswaPesertaDidikQuery::create(null, $criteria)
                    ->filterByTahunAjaranRelatedByTahunMulai($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collBeasiswaPesertaDidiksRelatedByTahunMulaiPartial && count($collBeasiswaPesertaDidiksRelatedByTahunMulai)) {
                      $this->initBeasiswaPesertaDidiksRelatedByTahunMulai(false);

                      foreach($collBeasiswaPesertaDidiksRelatedByTahunMulai as $obj) {
                        if (false == $this->collBeasiswaPesertaDidiksRelatedByTahunMulai->contains($obj)) {
                          $this->collBeasiswaPesertaDidiksRelatedByTahunMulai->append($obj);
                        }
                      }

                      $this->collBeasiswaPesertaDidiksRelatedByTahunMulaiPartial = true;
                    }

                    $collBeasiswaPesertaDidiksRelatedByTahunMulai->getInternalIterator()->rewind();
                    return $collBeasiswaPesertaDidiksRelatedByTahunMulai;
                }

                if($partial && $this->collBeasiswaPesertaDidiksRelatedByTahunMulai) {
                    foreach($this->collBeasiswaPesertaDidiksRelatedByTahunMulai as $obj) {
                        if($obj->isNew()) {
                            $collBeasiswaPesertaDidiksRelatedByTahunMulai[] = $obj;
                        }
                    }
                }

                $this->collBeasiswaPesertaDidiksRelatedByTahunMulai = $collBeasiswaPesertaDidiksRelatedByTahunMulai;
                $this->collBeasiswaPesertaDidiksRelatedByTahunMulaiPartial = false;
            }
        }

        return $this->collBeasiswaPesertaDidiksRelatedByTahunMulai;
    }

    /**
     * Sets a collection of BeasiswaPesertaDidikRelatedByTahunMulai objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $beasiswaPesertaDidiksRelatedByTahunMulai A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return TahunAjaran The current object (for fluent API support)
     */
    public function setBeasiswaPesertaDidiksRelatedByTahunMulai(PropelCollection $beasiswaPesertaDidiksRelatedByTahunMulai, PropelPDO $con = null)
    {
        $beasiswaPesertaDidiksRelatedByTahunMulaiToDelete = $this->getBeasiswaPesertaDidiksRelatedByTahunMulai(new Criteria(), $con)->diff($beasiswaPesertaDidiksRelatedByTahunMulai);

        $this->beasiswaPesertaDidiksRelatedByTahunMulaiScheduledForDeletion = unserialize(serialize($beasiswaPesertaDidiksRelatedByTahunMulaiToDelete));

        foreach ($beasiswaPesertaDidiksRelatedByTahunMulaiToDelete as $beasiswaPesertaDidikRelatedByTahunMulaiRemoved) {
            $beasiswaPesertaDidikRelatedByTahunMulaiRemoved->setTahunAjaranRelatedByTahunMulai(null);
        }

        $this->collBeasiswaPesertaDidiksRelatedByTahunMulai = null;
        foreach ($beasiswaPesertaDidiksRelatedByTahunMulai as $beasiswaPesertaDidikRelatedByTahunMulai) {
            $this->addBeasiswaPesertaDidikRelatedByTahunMulai($beasiswaPesertaDidikRelatedByTahunMulai);
        }

        $this->collBeasiswaPesertaDidiksRelatedByTahunMulai = $beasiswaPesertaDidiksRelatedByTahunMulai;
        $this->collBeasiswaPesertaDidiksRelatedByTahunMulaiPartial = false;

        return $this;
    }

    /**
     * Returns the number of related BeasiswaPesertaDidik objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related BeasiswaPesertaDidik objects.
     * @throws PropelException
     */
    public function countBeasiswaPesertaDidiksRelatedByTahunMulai(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collBeasiswaPesertaDidiksRelatedByTahunMulaiPartial && !$this->isNew();
        if (null === $this->collBeasiswaPesertaDidiksRelatedByTahunMulai || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collBeasiswaPesertaDidiksRelatedByTahunMulai) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getBeasiswaPesertaDidiksRelatedByTahunMulai());
            }
            $query = BeasiswaPesertaDidikQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByTahunAjaranRelatedByTahunMulai($this)
                ->count($con);
        }

        return count($this->collBeasiswaPesertaDidiksRelatedByTahunMulai);
    }

    /**
     * Method called to associate a BeasiswaPesertaDidik object to this object
     * through the BeasiswaPesertaDidik foreign key attribute.
     *
     * @param    BeasiswaPesertaDidik $l BeasiswaPesertaDidik
     * @return TahunAjaran The current object (for fluent API support)
     */
    public function addBeasiswaPesertaDidikRelatedByTahunMulai(BeasiswaPesertaDidik $l)
    {
        if ($this->collBeasiswaPesertaDidiksRelatedByTahunMulai === null) {
            $this->initBeasiswaPesertaDidiksRelatedByTahunMulai();
            $this->collBeasiswaPesertaDidiksRelatedByTahunMulaiPartial = true;
        }
        if (!in_array($l, $this->collBeasiswaPesertaDidiksRelatedByTahunMulai->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddBeasiswaPesertaDidikRelatedByTahunMulai($l);
        }

        return $this;
    }

    /**
     * @param	BeasiswaPesertaDidikRelatedByTahunMulai $beasiswaPesertaDidikRelatedByTahunMulai The beasiswaPesertaDidikRelatedByTahunMulai object to add.
     */
    protected function doAddBeasiswaPesertaDidikRelatedByTahunMulai($beasiswaPesertaDidikRelatedByTahunMulai)
    {
        $this->collBeasiswaPesertaDidiksRelatedByTahunMulai[]= $beasiswaPesertaDidikRelatedByTahunMulai;
        $beasiswaPesertaDidikRelatedByTahunMulai->setTahunAjaranRelatedByTahunMulai($this);
    }

    /**
     * @param	BeasiswaPesertaDidikRelatedByTahunMulai $beasiswaPesertaDidikRelatedByTahunMulai The beasiswaPesertaDidikRelatedByTahunMulai object to remove.
     * @return TahunAjaran The current object (for fluent API support)
     */
    public function removeBeasiswaPesertaDidikRelatedByTahunMulai($beasiswaPesertaDidikRelatedByTahunMulai)
    {
        if ($this->getBeasiswaPesertaDidiksRelatedByTahunMulai()->contains($beasiswaPesertaDidikRelatedByTahunMulai)) {
            $this->collBeasiswaPesertaDidiksRelatedByTahunMulai->remove($this->collBeasiswaPesertaDidiksRelatedByTahunMulai->search($beasiswaPesertaDidikRelatedByTahunMulai));
            if (null === $this->beasiswaPesertaDidiksRelatedByTahunMulaiScheduledForDeletion) {
                $this->beasiswaPesertaDidiksRelatedByTahunMulaiScheduledForDeletion = clone $this->collBeasiswaPesertaDidiksRelatedByTahunMulai;
                $this->beasiswaPesertaDidiksRelatedByTahunMulaiScheduledForDeletion->clear();
            }
            $this->beasiswaPesertaDidiksRelatedByTahunMulaiScheduledForDeletion[]= clone $beasiswaPesertaDidikRelatedByTahunMulai;
            $beasiswaPesertaDidikRelatedByTahunMulai->setTahunAjaranRelatedByTahunMulai(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this TahunAjaran is new, it will return
     * an empty collection; or if this TahunAjaran has previously
     * been saved, it will retrieve related BeasiswaPesertaDidiksRelatedByTahunMulai from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in TahunAjaran.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|BeasiswaPesertaDidik[] List of BeasiswaPesertaDidik objects
     */
    public function getBeasiswaPesertaDidiksRelatedByTahunMulaiJoinPesertaDidik($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = BeasiswaPesertaDidikQuery::create(null, $criteria);
        $query->joinWith('PesertaDidik', $join_behavior);

        return $this->getBeasiswaPesertaDidiksRelatedByTahunMulai($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this TahunAjaran is new, it will return
     * an empty collection; or if this TahunAjaran has previously
     * been saved, it will retrieve related BeasiswaPesertaDidiksRelatedByTahunMulai from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in TahunAjaran.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|BeasiswaPesertaDidik[] List of BeasiswaPesertaDidik objects
     */
    public function getBeasiswaPesertaDidiksRelatedByTahunMulaiJoinJenisBeasiswa($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = BeasiswaPesertaDidikQuery::create(null, $criteria);
        $query->joinWith('JenisBeasiswa', $join_behavior);

        return $this->getBeasiswaPesertaDidiksRelatedByTahunMulai($query, $con);
    }

    /**
     * Clears out the collDemografis collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return TahunAjaran The current object (for fluent API support)
     * @see        addDemografis()
     */
    public function clearDemografis()
    {
        $this->collDemografis = null; // important to set this to null since that means it is uninitialized
        $this->collDemografisPartial = null;

        return $this;
    }

    /**
     * reset is the collDemografis collection loaded partially
     *
     * @return void
     */
    public function resetPartialDemografis($v = true)
    {
        $this->collDemografisPartial = $v;
    }

    /**
     * Initializes the collDemografis collection.
     *
     * By default this just sets the collDemografis collection to an empty array (like clearcollDemografis());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initDemografis($overrideExisting = true)
    {
        if (null !== $this->collDemografis && !$overrideExisting) {
            return;
        }
        $this->collDemografis = new PropelObjectCollection();
        $this->collDemografis->setModel('Demografi');
    }

    /**
     * Gets an array of Demografi objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this TahunAjaran is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Demografi[] List of Demografi objects
     * @throws PropelException
     */
    public function getDemografis($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collDemografisPartial && !$this->isNew();
        if (null === $this->collDemografis || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collDemografis) {
                // return empty collection
                $this->initDemografis();
            } else {
                $collDemografis = DemografiQuery::create(null, $criteria)
                    ->filterByTahunAjaran($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collDemografisPartial && count($collDemografis)) {
                      $this->initDemografis(false);

                      foreach($collDemografis as $obj) {
                        if (false == $this->collDemografis->contains($obj)) {
                          $this->collDemografis->append($obj);
                        }
                      }

                      $this->collDemografisPartial = true;
                    }

                    $collDemografis->getInternalIterator()->rewind();
                    return $collDemografis;
                }

                if($partial && $this->collDemografis) {
                    foreach($this->collDemografis as $obj) {
                        if($obj->isNew()) {
                            $collDemografis[] = $obj;
                        }
                    }
                }

                $this->collDemografis = $collDemografis;
                $this->collDemografisPartial = false;
            }
        }

        return $this->collDemografis;
    }

    /**
     * Sets a collection of Demografi objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $demografis A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return TahunAjaran The current object (for fluent API support)
     */
    public function setDemografis(PropelCollection $demografis, PropelPDO $con = null)
    {
        $demografisToDelete = $this->getDemografis(new Criteria(), $con)->diff($demografis);

        $this->demografisScheduledForDeletion = unserialize(serialize($demografisToDelete));

        foreach ($demografisToDelete as $demografiRemoved) {
            $demografiRemoved->setTahunAjaran(null);
        }

        $this->collDemografis = null;
        foreach ($demografis as $demografi) {
            $this->addDemografi($demografi);
        }

        $this->collDemografis = $demografis;
        $this->collDemografisPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Demografi objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Demografi objects.
     * @throws PropelException
     */
    public function countDemografis(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collDemografisPartial && !$this->isNew();
        if (null === $this->collDemografis || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collDemografis) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getDemografis());
            }
            $query = DemografiQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByTahunAjaran($this)
                ->count($con);
        }

        return count($this->collDemografis);
    }

    /**
     * Method called to associate a Demografi object to this object
     * through the Demografi foreign key attribute.
     *
     * @param    Demografi $l Demografi
     * @return TahunAjaran The current object (for fluent API support)
     */
    public function addDemografi(Demografi $l)
    {
        if ($this->collDemografis === null) {
            $this->initDemografis();
            $this->collDemografisPartial = true;
        }
        if (!in_array($l, $this->collDemografis->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddDemografi($l);
        }

        return $this;
    }

    /**
     * @param	Demografi $demografi The demografi object to add.
     */
    protected function doAddDemografi($demografi)
    {
        $this->collDemografis[]= $demografi;
        $demografi->setTahunAjaran($this);
    }

    /**
     * @param	Demografi $demografi The demografi object to remove.
     * @return TahunAjaran The current object (for fluent API support)
     */
    public function removeDemografi($demografi)
    {
        if ($this->getDemografis()->contains($demografi)) {
            $this->collDemografis->remove($this->collDemografis->search($demografi));
            if (null === $this->demografisScheduledForDeletion) {
                $this->demografisScheduledForDeletion = clone $this->collDemografis;
                $this->demografisScheduledForDeletion->clear();
            }
            $this->demografisScheduledForDeletion[]= clone $demografi;
            $demografi->setTahunAjaran(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this TahunAjaran is new, it will return
     * an empty collection; or if this TahunAjaran has previously
     * been saved, it will retrieve related Demografis from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in TahunAjaran.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Demografi[] List of Demografi objects
     */
    public function getDemografisJoinMstWilayah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = DemografiQuery::create(null, $criteria);
        $query->joinWith('MstWilayah', $join_behavior);

        return $this->getDemografis($query, $con);
    }

    /**
     * Clears out the collPengawasTerdaftars collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return TahunAjaran The current object (for fluent API support)
     * @see        addPengawasTerdaftars()
     */
    public function clearPengawasTerdaftars()
    {
        $this->collPengawasTerdaftars = null; // important to set this to null since that means it is uninitialized
        $this->collPengawasTerdaftarsPartial = null;

        return $this;
    }

    /**
     * reset is the collPengawasTerdaftars collection loaded partially
     *
     * @return void
     */
    public function resetPartialPengawasTerdaftars($v = true)
    {
        $this->collPengawasTerdaftarsPartial = $v;
    }

    /**
     * Initializes the collPengawasTerdaftars collection.
     *
     * By default this just sets the collPengawasTerdaftars collection to an empty array (like clearcollPengawasTerdaftars());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPengawasTerdaftars($overrideExisting = true)
    {
        if (null !== $this->collPengawasTerdaftars && !$overrideExisting) {
            return;
        }
        $this->collPengawasTerdaftars = new PropelObjectCollection();
        $this->collPengawasTerdaftars->setModel('PengawasTerdaftar');
    }

    /**
     * Gets an array of PengawasTerdaftar objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this TahunAjaran is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|PengawasTerdaftar[] List of PengawasTerdaftar objects
     * @throws PropelException
     */
    public function getPengawasTerdaftars($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collPengawasTerdaftarsPartial && !$this->isNew();
        if (null === $this->collPengawasTerdaftars || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collPengawasTerdaftars) {
                // return empty collection
                $this->initPengawasTerdaftars();
            } else {
                $collPengawasTerdaftars = PengawasTerdaftarQuery::create(null, $criteria)
                    ->filterByTahunAjaran($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collPengawasTerdaftarsPartial && count($collPengawasTerdaftars)) {
                      $this->initPengawasTerdaftars(false);

                      foreach($collPengawasTerdaftars as $obj) {
                        if (false == $this->collPengawasTerdaftars->contains($obj)) {
                          $this->collPengawasTerdaftars->append($obj);
                        }
                      }

                      $this->collPengawasTerdaftarsPartial = true;
                    }

                    $collPengawasTerdaftars->getInternalIterator()->rewind();
                    return $collPengawasTerdaftars;
                }

                if($partial && $this->collPengawasTerdaftars) {
                    foreach($this->collPengawasTerdaftars as $obj) {
                        if($obj->isNew()) {
                            $collPengawasTerdaftars[] = $obj;
                        }
                    }
                }

                $this->collPengawasTerdaftars = $collPengawasTerdaftars;
                $this->collPengawasTerdaftarsPartial = false;
            }
        }

        return $this->collPengawasTerdaftars;
    }

    /**
     * Sets a collection of PengawasTerdaftar objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $pengawasTerdaftars A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return TahunAjaran The current object (for fluent API support)
     */
    public function setPengawasTerdaftars(PropelCollection $pengawasTerdaftars, PropelPDO $con = null)
    {
        $pengawasTerdaftarsToDelete = $this->getPengawasTerdaftars(new Criteria(), $con)->diff($pengawasTerdaftars);

        $this->pengawasTerdaftarsScheduledForDeletion = unserialize(serialize($pengawasTerdaftarsToDelete));

        foreach ($pengawasTerdaftarsToDelete as $pengawasTerdaftarRemoved) {
            $pengawasTerdaftarRemoved->setTahunAjaran(null);
        }

        $this->collPengawasTerdaftars = null;
        foreach ($pengawasTerdaftars as $pengawasTerdaftar) {
            $this->addPengawasTerdaftar($pengawasTerdaftar);
        }

        $this->collPengawasTerdaftars = $pengawasTerdaftars;
        $this->collPengawasTerdaftarsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related PengawasTerdaftar objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related PengawasTerdaftar objects.
     * @throws PropelException
     */
    public function countPengawasTerdaftars(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collPengawasTerdaftarsPartial && !$this->isNew();
        if (null === $this->collPengawasTerdaftars || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPengawasTerdaftars) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getPengawasTerdaftars());
            }
            $query = PengawasTerdaftarQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByTahunAjaran($this)
                ->count($con);
        }

        return count($this->collPengawasTerdaftars);
    }

    /**
     * Method called to associate a PengawasTerdaftar object to this object
     * through the PengawasTerdaftar foreign key attribute.
     *
     * @param    PengawasTerdaftar $l PengawasTerdaftar
     * @return TahunAjaran The current object (for fluent API support)
     */
    public function addPengawasTerdaftar(PengawasTerdaftar $l)
    {
        if ($this->collPengawasTerdaftars === null) {
            $this->initPengawasTerdaftars();
            $this->collPengawasTerdaftarsPartial = true;
        }
        if (!in_array($l, $this->collPengawasTerdaftars->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddPengawasTerdaftar($l);
        }

        return $this;
    }

    /**
     * @param	PengawasTerdaftar $pengawasTerdaftar The pengawasTerdaftar object to add.
     */
    protected function doAddPengawasTerdaftar($pengawasTerdaftar)
    {
        $this->collPengawasTerdaftars[]= $pengawasTerdaftar;
        $pengawasTerdaftar->setTahunAjaran($this);
    }

    /**
     * @param	PengawasTerdaftar $pengawasTerdaftar The pengawasTerdaftar object to remove.
     * @return TahunAjaran The current object (for fluent API support)
     */
    public function removePengawasTerdaftar($pengawasTerdaftar)
    {
        if ($this->getPengawasTerdaftars()->contains($pengawasTerdaftar)) {
            $this->collPengawasTerdaftars->remove($this->collPengawasTerdaftars->search($pengawasTerdaftar));
            if (null === $this->pengawasTerdaftarsScheduledForDeletion) {
                $this->pengawasTerdaftarsScheduledForDeletion = clone $this->collPengawasTerdaftars;
                $this->pengawasTerdaftarsScheduledForDeletion->clear();
            }
            $this->pengawasTerdaftarsScheduledForDeletion[]= clone $pengawasTerdaftar;
            $pengawasTerdaftar->setTahunAjaran(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this TahunAjaran is new, it will return
     * an empty collection; or if this TahunAjaran has previously
     * been saved, it will retrieve related PengawasTerdaftars from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in TahunAjaran.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PengawasTerdaftar[] List of PengawasTerdaftar objects
     */
    public function getPengawasTerdaftarsJoinBidangStudi($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PengawasTerdaftarQuery::create(null, $criteria);
        $query->joinWith('BidangStudi', $join_behavior);

        return $this->getPengawasTerdaftars($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this TahunAjaran is new, it will return
     * an empty collection; or if this TahunAjaran has previously
     * been saved, it will retrieve related PengawasTerdaftars from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in TahunAjaran.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PengawasTerdaftar[] List of PengawasTerdaftar objects
     */
    public function getPengawasTerdaftarsJoinJenisKeluar($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PengawasTerdaftarQuery::create(null, $criteria);
        $query->joinWith('JenisKeluar', $join_behavior);

        return $this->getPengawasTerdaftars($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this TahunAjaran is new, it will return
     * an empty collection; or if this TahunAjaran has previously
     * been saved, it will retrieve related PengawasTerdaftars from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in TahunAjaran.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PengawasTerdaftar[] List of PengawasTerdaftar objects
     */
    public function getPengawasTerdaftarsJoinLembagaNonSekolah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PengawasTerdaftarQuery::create(null, $criteria);
        $query->joinWith('LembagaNonSekolah', $join_behavior);

        return $this->getPengawasTerdaftars($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this TahunAjaran is new, it will return
     * an empty collection; or if this TahunAjaran has previously
     * been saved, it will retrieve related PengawasTerdaftars from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in TahunAjaran.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PengawasTerdaftar[] List of PengawasTerdaftar objects
     */
    public function getPengawasTerdaftarsJoinMataPelajaran($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PengawasTerdaftarQuery::create(null, $criteria);
        $query->joinWith('MataPelajaran', $join_behavior);

        return $this->getPengawasTerdaftars($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this TahunAjaran is new, it will return
     * an empty collection; or if this TahunAjaran has previously
     * been saved, it will retrieve related PengawasTerdaftars from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in TahunAjaran.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PengawasTerdaftar[] List of PengawasTerdaftar objects
     */
    public function getPengawasTerdaftarsJoinPtk($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PengawasTerdaftarQuery::create(null, $criteria);
        $query->joinWith('Ptk', $join_behavior);

        return $this->getPengawasTerdaftars($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this TahunAjaran is new, it will return
     * an empty collection; or if this TahunAjaran has previously
     * been saved, it will retrieve related PengawasTerdaftars from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in TahunAjaran.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PengawasTerdaftar[] List of PengawasTerdaftar objects
     */
    public function getPengawasTerdaftarsJoinJenjangKepengawasan($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PengawasTerdaftarQuery::create(null, $criteria);
        $query->joinWith('JenjangKepengawasan', $join_behavior);

        return $this->getPengawasTerdaftars($query, $con);
    }

    /**
     * Clears out the collPesertaDidikBarus collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return TahunAjaran The current object (for fluent API support)
     * @see        addPesertaDidikBarus()
     */
    public function clearPesertaDidikBarus()
    {
        $this->collPesertaDidikBarus = null; // important to set this to null since that means it is uninitialized
        $this->collPesertaDidikBarusPartial = null;

        return $this;
    }

    /**
     * reset is the collPesertaDidikBarus collection loaded partially
     *
     * @return void
     */
    public function resetPartialPesertaDidikBarus($v = true)
    {
        $this->collPesertaDidikBarusPartial = $v;
    }

    /**
     * Initializes the collPesertaDidikBarus collection.
     *
     * By default this just sets the collPesertaDidikBarus collection to an empty array (like clearcollPesertaDidikBarus());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPesertaDidikBarus($overrideExisting = true)
    {
        if (null !== $this->collPesertaDidikBarus && !$overrideExisting) {
            return;
        }
        $this->collPesertaDidikBarus = new PropelObjectCollection();
        $this->collPesertaDidikBarus->setModel('PesertaDidikBaru');
    }

    /**
     * Gets an array of PesertaDidikBaru objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this TahunAjaran is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|PesertaDidikBaru[] List of PesertaDidikBaru objects
     * @throws PropelException
     */
    public function getPesertaDidikBarus($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collPesertaDidikBarusPartial && !$this->isNew();
        if (null === $this->collPesertaDidikBarus || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collPesertaDidikBarus) {
                // return empty collection
                $this->initPesertaDidikBarus();
            } else {
                $collPesertaDidikBarus = PesertaDidikBaruQuery::create(null, $criteria)
                    ->filterByTahunAjaran($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collPesertaDidikBarusPartial && count($collPesertaDidikBarus)) {
                      $this->initPesertaDidikBarus(false);

                      foreach($collPesertaDidikBarus as $obj) {
                        if (false == $this->collPesertaDidikBarus->contains($obj)) {
                          $this->collPesertaDidikBarus->append($obj);
                        }
                      }

                      $this->collPesertaDidikBarusPartial = true;
                    }

                    $collPesertaDidikBarus->getInternalIterator()->rewind();
                    return $collPesertaDidikBarus;
                }

                if($partial && $this->collPesertaDidikBarus) {
                    foreach($this->collPesertaDidikBarus as $obj) {
                        if($obj->isNew()) {
                            $collPesertaDidikBarus[] = $obj;
                        }
                    }
                }

                $this->collPesertaDidikBarus = $collPesertaDidikBarus;
                $this->collPesertaDidikBarusPartial = false;
            }
        }

        return $this->collPesertaDidikBarus;
    }

    /**
     * Sets a collection of PesertaDidikBaru objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $pesertaDidikBarus A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return TahunAjaran The current object (for fluent API support)
     */
    public function setPesertaDidikBarus(PropelCollection $pesertaDidikBarus, PropelPDO $con = null)
    {
        $pesertaDidikBarusToDelete = $this->getPesertaDidikBarus(new Criteria(), $con)->diff($pesertaDidikBarus);

        $this->pesertaDidikBarusScheduledForDeletion = unserialize(serialize($pesertaDidikBarusToDelete));

        foreach ($pesertaDidikBarusToDelete as $pesertaDidikBaruRemoved) {
            $pesertaDidikBaruRemoved->setTahunAjaran(null);
        }

        $this->collPesertaDidikBarus = null;
        foreach ($pesertaDidikBarus as $pesertaDidikBaru) {
            $this->addPesertaDidikBaru($pesertaDidikBaru);
        }

        $this->collPesertaDidikBarus = $pesertaDidikBarus;
        $this->collPesertaDidikBarusPartial = false;

        return $this;
    }

    /**
     * Returns the number of related PesertaDidikBaru objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related PesertaDidikBaru objects.
     * @throws PropelException
     */
    public function countPesertaDidikBarus(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collPesertaDidikBarusPartial && !$this->isNew();
        if (null === $this->collPesertaDidikBarus || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPesertaDidikBarus) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getPesertaDidikBarus());
            }
            $query = PesertaDidikBaruQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByTahunAjaran($this)
                ->count($con);
        }

        return count($this->collPesertaDidikBarus);
    }

    /**
     * Method called to associate a PesertaDidikBaru object to this object
     * through the PesertaDidikBaru foreign key attribute.
     *
     * @param    PesertaDidikBaru $l PesertaDidikBaru
     * @return TahunAjaran The current object (for fluent API support)
     */
    public function addPesertaDidikBaru(PesertaDidikBaru $l)
    {
        if ($this->collPesertaDidikBarus === null) {
            $this->initPesertaDidikBarus();
            $this->collPesertaDidikBarusPartial = true;
        }
        if (!in_array($l, $this->collPesertaDidikBarus->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddPesertaDidikBaru($l);
        }

        return $this;
    }

    /**
     * @param	PesertaDidikBaru $pesertaDidikBaru The pesertaDidikBaru object to add.
     */
    protected function doAddPesertaDidikBaru($pesertaDidikBaru)
    {
        $this->collPesertaDidikBarus[]= $pesertaDidikBaru;
        $pesertaDidikBaru->setTahunAjaran($this);
    }

    /**
     * @param	PesertaDidikBaru $pesertaDidikBaru The pesertaDidikBaru object to remove.
     * @return TahunAjaran The current object (for fluent API support)
     */
    public function removePesertaDidikBaru($pesertaDidikBaru)
    {
        if ($this->getPesertaDidikBarus()->contains($pesertaDidikBaru)) {
            $this->collPesertaDidikBarus->remove($this->collPesertaDidikBarus->search($pesertaDidikBaru));
            if (null === $this->pesertaDidikBarusScheduledForDeletion) {
                $this->pesertaDidikBarusScheduledForDeletion = clone $this->collPesertaDidikBarus;
                $this->pesertaDidikBarusScheduledForDeletion->clear();
            }
            $this->pesertaDidikBarusScheduledForDeletion[]= clone $pesertaDidikBaru;
            $pesertaDidikBaru->setTahunAjaran(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this TahunAjaran is new, it will return
     * an empty collection; or if this TahunAjaran has previously
     * been saved, it will retrieve related PesertaDidikBarus from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in TahunAjaran.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidikBaru[] List of PesertaDidikBaru objects
     */
    public function getPesertaDidikBarusJoinPesertaDidik($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikBaruQuery::create(null, $criteria);
        $query->joinWith('PesertaDidik', $join_behavior);

        return $this->getPesertaDidikBarus($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this TahunAjaran is new, it will return
     * an empty collection; or if this TahunAjaran has previously
     * been saved, it will retrieve related PesertaDidikBarus from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in TahunAjaran.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidikBaru[] List of PesertaDidikBaru objects
     */
    public function getPesertaDidikBarusJoinJenisPendaftaran($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikBaruQuery::create(null, $criteria);
        $query->joinWith('JenisPendaftaran', $join_behavior);

        return $this->getPesertaDidikBarus($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this TahunAjaran is new, it will return
     * an empty collection; or if this TahunAjaran has previously
     * been saved, it will retrieve related PesertaDidikBarus from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in TahunAjaran.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidikBaru[] List of PesertaDidikBaru objects
     */
    public function getPesertaDidikBarusJoinSekolah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikBaruQuery::create(null, $criteria);
        $query->joinWith('Sekolah', $join_behavior);

        return $this->getPesertaDidikBarus($query, $con);
    }

    /**
     * Clears out the collPtkBarus collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return TahunAjaran The current object (for fluent API support)
     * @see        addPtkBarus()
     */
    public function clearPtkBarus()
    {
        $this->collPtkBarus = null; // important to set this to null since that means it is uninitialized
        $this->collPtkBarusPartial = null;

        return $this;
    }

    /**
     * reset is the collPtkBarus collection loaded partially
     *
     * @return void
     */
    public function resetPartialPtkBarus($v = true)
    {
        $this->collPtkBarusPartial = $v;
    }

    /**
     * Initializes the collPtkBarus collection.
     *
     * By default this just sets the collPtkBarus collection to an empty array (like clearcollPtkBarus());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPtkBarus($overrideExisting = true)
    {
        if (null !== $this->collPtkBarus && !$overrideExisting) {
            return;
        }
        $this->collPtkBarus = new PropelObjectCollection();
        $this->collPtkBarus->setModel('PtkBaru');
    }

    /**
     * Gets an array of PtkBaru objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this TahunAjaran is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|PtkBaru[] List of PtkBaru objects
     * @throws PropelException
     */
    public function getPtkBarus($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collPtkBarusPartial && !$this->isNew();
        if (null === $this->collPtkBarus || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collPtkBarus) {
                // return empty collection
                $this->initPtkBarus();
            } else {
                $collPtkBarus = PtkBaruQuery::create(null, $criteria)
                    ->filterByTahunAjaran($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collPtkBarusPartial && count($collPtkBarus)) {
                      $this->initPtkBarus(false);

                      foreach($collPtkBarus as $obj) {
                        if (false == $this->collPtkBarus->contains($obj)) {
                          $this->collPtkBarus->append($obj);
                        }
                      }

                      $this->collPtkBarusPartial = true;
                    }

                    $collPtkBarus->getInternalIterator()->rewind();
                    return $collPtkBarus;
                }

                if($partial && $this->collPtkBarus) {
                    foreach($this->collPtkBarus as $obj) {
                        if($obj->isNew()) {
                            $collPtkBarus[] = $obj;
                        }
                    }
                }

                $this->collPtkBarus = $collPtkBarus;
                $this->collPtkBarusPartial = false;
            }
        }

        return $this->collPtkBarus;
    }

    /**
     * Sets a collection of PtkBaru objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $ptkBarus A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return TahunAjaran The current object (for fluent API support)
     */
    public function setPtkBarus(PropelCollection $ptkBarus, PropelPDO $con = null)
    {
        $ptkBarusToDelete = $this->getPtkBarus(new Criteria(), $con)->diff($ptkBarus);

        $this->ptkBarusScheduledForDeletion = unserialize(serialize($ptkBarusToDelete));

        foreach ($ptkBarusToDelete as $ptkBaruRemoved) {
            $ptkBaruRemoved->setTahunAjaran(null);
        }

        $this->collPtkBarus = null;
        foreach ($ptkBarus as $ptkBaru) {
            $this->addPtkBaru($ptkBaru);
        }

        $this->collPtkBarus = $ptkBarus;
        $this->collPtkBarusPartial = false;

        return $this;
    }

    /**
     * Returns the number of related PtkBaru objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related PtkBaru objects.
     * @throws PropelException
     */
    public function countPtkBarus(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collPtkBarusPartial && !$this->isNew();
        if (null === $this->collPtkBarus || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPtkBarus) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getPtkBarus());
            }
            $query = PtkBaruQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByTahunAjaran($this)
                ->count($con);
        }

        return count($this->collPtkBarus);
    }

    /**
     * Method called to associate a PtkBaru object to this object
     * through the PtkBaru foreign key attribute.
     *
     * @param    PtkBaru $l PtkBaru
     * @return TahunAjaran The current object (for fluent API support)
     */
    public function addPtkBaru(PtkBaru $l)
    {
        if ($this->collPtkBarus === null) {
            $this->initPtkBarus();
            $this->collPtkBarusPartial = true;
        }
        if (!in_array($l, $this->collPtkBarus->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddPtkBaru($l);
        }

        return $this;
    }

    /**
     * @param	PtkBaru $ptkBaru The ptkBaru object to add.
     */
    protected function doAddPtkBaru($ptkBaru)
    {
        $this->collPtkBarus[]= $ptkBaru;
        $ptkBaru->setTahunAjaran($this);
    }

    /**
     * @param	PtkBaru $ptkBaru The ptkBaru object to remove.
     * @return TahunAjaran The current object (for fluent API support)
     */
    public function removePtkBaru($ptkBaru)
    {
        if ($this->getPtkBarus()->contains($ptkBaru)) {
            $this->collPtkBarus->remove($this->collPtkBarus->search($ptkBaru));
            if (null === $this->ptkBarusScheduledForDeletion) {
                $this->ptkBarusScheduledForDeletion = clone $this->collPtkBarus;
                $this->ptkBarusScheduledForDeletion->clear();
            }
            $this->ptkBarusScheduledForDeletion[]= clone $ptkBaru;
            $ptkBaru->setTahunAjaran(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this TahunAjaran is new, it will return
     * an empty collection; or if this TahunAjaran has previously
     * been saved, it will retrieve related PtkBarus from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in TahunAjaran.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PtkBaru[] List of PtkBaru objects
     */
    public function getPtkBarusJoinPtk($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PtkBaruQuery::create(null, $criteria);
        $query->joinWith('Ptk', $join_behavior);

        return $this->getPtkBarus($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this TahunAjaran is new, it will return
     * an empty collection; or if this TahunAjaran has previously
     * been saved, it will retrieve related PtkBarus from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in TahunAjaran.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PtkBaru[] List of PtkBaru objects
     */
    public function getPtkBarusJoinSekolah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PtkBaruQuery::create(null, $criteria);
        $query->joinWith('Sekolah', $join_behavior);

        return $this->getPtkBarus($query, $con);
    }

    /**
     * Clears out the collPtkTerdaftars collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return TahunAjaran The current object (for fluent API support)
     * @see        addPtkTerdaftars()
     */
    public function clearPtkTerdaftars()
    {
        $this->collPtkTerdaftars = null; // important to set this to null since that means it is uninitialized
        $this->collPtkTerdaftarsPartial = null;

        return $this;
    }

    /**
     * reset is the collPtkTerdaftars collection loaded partially
     *
     * @return void
     */
    public function resetPartialPtkTerdaftars($v = true)
    {
        $this->collPtkTerdaftarsPartial = $v;
    }

    /**
     * Initializes the collPtkTerdaftars collection.
     *
     * By default this just sets the collPtkTerdaftars collection to an empty array (like clearcollPtkTerdaftars());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPtkTerdaftars($overrideExisting = true)
    {
        if (null !== $this->collPtkTerdaftars && !$overrideExisting) {
            return;
        }
        $this->collPtkTerdaftars = new PropelObjectCollection();
        $this->collPtkTerdaftars->setModel('PtkTerdaftar');
    }

    /**
     * Gets an array of PtkTerdaftar objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this TahunAjaran is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|PtkTerdaftar[] List of PtkTerdaftar objects
     * @throws PropelException
     */
    public function getPtkTerdaftars($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collPtkTerdaftarsPartial && !$this->isNew();
        if (null === $this->collPtkTerdaftars || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collPtkTerdaftars) {
                // return empty collection
                $this->initPtkTerdaftars();
            } else {
                $collPtkTerdaftars = PtkTerdaftarQuery::create(null, $criteria)
                    ->filterByTahunAjaran($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collPtkTerdaftarsPartial && count($collPtkTerdaftars)) {
                      $this->initPtkTerdaftars(false);

                      foreach($collPtkTerdaftars as $obj) {
                        if (false == $this->collPtkTerdaftars->contains($obj)) {
                          $this->collPtkTerdaftars->append($obj);
                        }
                      }

                      $this->collPtkTerdaftarsPartial = true;
                    }

                    $collPtkTerdaftars->getInternalIterator()->rewind();
                    return $collPtkTerdaftars;
                }

                if($partial && $this->collPtkTerdaftars) {
                    foreach($this->collPtkTerdaftars as $obj) {
                        if($obj->isNew()) {
                            $collPtkTerdaftars[] = $obj;
                        }
                    }
                }

                $this->collPtkTerdaftars = $collPtkTerdaftars;
                $this->collPtkTerdaftarsPartial = false;
            }
        }

        return $this->collPtkTerdaftars;
    }

    /**
     * Sets a collection of PtkTerdaftar objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $ptkTerdaftars A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return TahunAjaran The current object (for fluent API support)
     */
    public function setPtkTerdaftars(PropelCollection $ptkTerdaftars, PropelPDO $con = null)
    {
        $ptkTerdaftarsToDelete = $this->getPtkTerdaftars(new Criteria(), $con)->diff($ptkTerdaftars);

        $this->ptkTerdaftarsScheduledForDeletion = unserialize(serialize($ptkTerdaftarsToDelete));

        foreach ($ptkTerdaftarsToDelete as $ptkTerdaftarRemoved) {
            $ptkTerdaftarRemoved->setTahunAjaran(null);
        }

        $this->collPtkTerdaftars = null;
        foreach ($ptkTerdaftars as $ptkTerdaftar) {
            $this->addPtkTerdaftar($ptkTerdaftar);
        }

        $this->collPtkTerdaftars = $ptkTerdaftars;
        $this->collPtkTerdaftarsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related PtkTerdaftar objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related PtkTerdaftar objects.
     * @throws PropelException
     */
    public function countPtkTerdaftars(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collPtkTerdaftarsPartial && !$this->isNew();
        if (null === $this->collPtkTerdaftars || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPtkTerdaftars) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getPtkTerdaftars());
            }
            $query = PtkTerdaftarQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByTahunAjaran($this)
                ->count($con);
        }

        return count($this->collPtkTerdaftars);
    }

    /**
     * Method called to associate a PtkTerdaftar object to this object
     * through the PtkTerdaftar foreign key attribute.
     *
     * @param    PtkTerdaftar $l PtkTerdaftar
     * @return TahunAjaran The current object (for fluent API support)
     */
    public function addPtkTerdaftar(PtkTerdaftar $l)
    {
        if ($this->collPtkTerdaftars === null) {
            $this->initPtkTerdaftars();
            $this->collPtkTerdaftarsPartial = true;
        }
        if (!in_array($l, $this->collPtkTerdaftars->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddPtkTerdaftar($l);
        }

        return $this;
    }

    /**
     * @param	PtkTerdaftar $ptkTerdaftar The ptkTerdaftar object to add.
     */
    protected function doAddPtkTerdaftar($ptkTerdaftar)
    {
        $this->collPtkTerdaftars[]= $ptkTerdaftar;
        $ptkTerdaftar->setTahunAjaran($this);
    }

    /**
     * @param	PtkTerdaftar $ptkTerdaftar The ptkTerdaftar object to remove.
     * @return TahunAjaran The current object (for fluent API support)
     */
    public function removePtkTerdaftar($ptkTerdaftar)
    {
        if ($this->getPtkTerdaftars()->contains($ptkTerdaftar)) {
            $this->collPtkTerdaftars->remove($this->collPtkTerdaftars->search($ptkTerdaftar));
            if (null === $this->ptkTerdaftarsScheduledForDeletion) {
                $this->ptkTerdaftarsScheduledForDeletion = clone $this->collPtkTerdaftars;
                $this->ptkTerdaftarsScheduledForDeletion->clear();
            }
            $this->ptkTerdaftarsScheduledForDeletion[]= clone $ptkTerdaftar;
            $ptkTerdaftar->setTahunAjaran(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this TahunAjaran is new, it will return
     * an empty collection; or if this TahunAjaran has previously
     * been saved, it will retrieve related PtkTerdaftars from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in TahunAjaran.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PtkTerdaftar[] List of PtkTerdaftar objects
     */
    public function getPtkTerdaftarsJoinJenisKeluar($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PtkTerdaftarQuery::create(null, $criteria);
        $query->joinWith('JenisKeluar', $join_behavior);

        return $this->getPtkTerdaftars($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this TahunAjaran is new, it will return
     * an empty collection; or if this TahunAjaran has previously
     * been saved, it will retrieve related PtkTerdaftars from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in TahunAjaran.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PtkTerdaftar[] List of PtkTerdaftar objects
     */
    public function getPtkTerdaftarsJoinPtk($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PtkTerdaftarQuery::create(null, $criteria);
        $query->joinWith('Ptk', $join_behavior);

        return $this->getPtkTerdaftars($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this TahunAjaran is new, it will return
     * an empty collection; or if this TahunAjaran has previously
     * been saved, it will retrieve related PtkTerdaftars from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in TahunAjaran.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PtkTerdaftar[] List of PtkTerdaftar objects
     */
    public function getPtkTerdaftarsJoinSekolah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PtkTerdaftarQuery::create(null, $criteria);
        $query->joinWith('Sekolah', $join_behavior);

        return $this->getPtkTerdaftars($query, $con);
    }

    /**
     * Clears out the collSemesters collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return TahunAjaran The current object (for fluent API support)
     * @see        addSemesters()
     */
    public function clearSemesters()
    {
        $this->collSemesters = null; // important to set this to null since that means it is uninitialized
        $this->collSemestersPartial = null;

        return $this;
    }

    /**
     * reset is the collSemesters collection loaded partially
     *
     * @return void
     */
    public function resetPartialSemesters($v = true)
    {
        $this->collSemestersPartial = $v;
    }

    /**
     * Initializes the collSemesters collection.
     *
     * By default this just sets the collSemesters collection to an empty array (like clearcollSemesters());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initSemesters($overrideExisting = true)
    {
        if (null !== $this->collSemesters && !$overrideExisting) {
            return;
        }
        $this->collSemesters = new PropelObjectCollection();
        $this->collSemesters->setModel('Semester');
    }

    /**
     * Gets an array of Semester objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this TahunAjaran is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Semester[] List of Semester objects
     * @throws PropelException
     */
    public function getSemesters($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collSemestersPartial && !$this->isNew();
        if (null === $this->collSemesters || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collSemesters) {
                // return empty collection
                $this->initSemesters();
            } else {
                $collSemesters = SemesterQuery::create(null, $criteria)
                    ->filterByTahunAjaran($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collSemestersPartial && count($collSemesters)) {
                      $this->initSemesters(false);

                      foreach($collSemesters as $obj) {
                        if (false == $this->collSemesters->contains($obj)) {
                          $this->collSemesters->append($obj);
                        }
                      }

                      $this->collSemestersPartial = true;
                    }

                    $collSemesters->getInternalIterator()->rewind();
                    return $collSemesters;
                }

                if($partial && $this->collSemesters) {
                    foreach($this->collSemesters as $obj) {
                        if($obj->isNew()) {
                            $collSemesters[] = $obj;
                        }
                    }
                }

                $this->collSemesters = $collSemesters;
                $this->collSemestersPartial = false;
            }
        }

        return $this->collSemesters;
    }

    /**
     * Sets a collection of Semester objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $semesters A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return TahunAjaran The current object (for fluent API support)
     */
    public function setSemesters(PropelCollection $semesters, PropelPDO $con = null)
    {
        $semestersToDelete = $this->getSemesters(new Criteria(), $con)->diff($semesters);

        $this->semestersScheduledForDeletion = unserialize(serialize($semestersToDelete));

        foreach ($semestersToDelete as $semesterRemoved) {
            $semesterRemoved->setTahunAjaran(null);
        }

        $this->collSemesters = null;
        foreach ($semesters as $semester) {
            $this->addSemester($semester);
        }

        $this->collSemesters = $semesters;
        $this->collSemestersPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Semester objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Semester objects.
     * @throws PropelException
     */
    public function countSemesters(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collSemestersPartial && !$this->isNew();
        if (null === $this->collSemesters || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collSemesters) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getSemesters());
            }
            $query = SemesterQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByTahunAjaran($this)
                ->count($con);
        }

        return count($this->collSemesters);
    }

    /**
     * Method called to associate a Semester object to this object
     * through the Semester foreign key attribute.
     *
     * @param    Semester $l Semester
     * @return TahunAjaran The current object (for fluent API support)
     */
    public function addSemester(Semester $l)
    {
        if ($this->collSemesters === null) {
            $this->initSemesters();
            $this->collSemestersPartial = true;
        }
        if (!in_array($l, $this->collSemesters->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddSemester($l);
        }

        return $this;
    }

    /**
     * @param	Semester $semester The semester object to add.
     */
    protected function doAddSemester($semester)
    {
        $this->collSemesters[]= $semester;
        $semester->setTahunAjaran($this);
    }

    /**
     * @param	Semester $semester The semester object to remove.
     * @return TahunAjaran The current object (for fluent API support)
     */
    public function removeSemester($semester)
    {
        if ($this->getSemesters()->contains($semester)) {
            $this->collSemesters->remove($this->collSemesters->search($semester));
            if (null === $this->semestersScheduledForDeletion) {
                $this->semestersScheduledForDeletion = clone $this->collSemesters;
                $this->semestersScheduledForDeletion->clear();
            }
            $this->semestersScheduledForDeletion[]= clone $semester;
            $semester->setTahunAjaran(null);
        }

        return $this;
    }

    /**
     * Clears out the collTanahLongitudinals collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return TahunAjaran The current object (for fluent API support)
     * @see        addTanahLongitudinals()
     */
    public function clearTanahLongitudinals()
    {
        $this->collTanahLongitudinals = null; // important to set this to null since that means it is uninitialized
        $this->collTanahLongitudinalsPartial = null;

        return $this;
    }

    /**
     * reset is the collTanahLongitudinals collection loaded partially
     *
     * @return void
     */
    public function resetPartialTanahLongitudinals($v = true)
    {
        $this->collTanahLongitudinalsPartial = $v;
    }

    /**
     * Initializes the collTanahLongitudinals collection.
     *
     * By default this just sets the collTanahLongitudinals collection to an empty array (like clearcollTanahLongitudinals());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initTanahLongitudinals($overrideExisting = true)
    {
        if (null !== $this->collTanahLongitudinals && !$overrideExisting) {
            return;
        }
        $this->collTanahLongitudinals = new PropelObjectCollection();
        $this->collTanahLongitudinals->setModel('TanahLongitudinal');
    }

    /**
     * Gets an array of TanahLongitudinal objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this TahunAjaran is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|TanahLongitudinal[] List of TanahLongitudinal objects
     * @throws PropelException
     */
    public function getTanahLongitudinals($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collTanahLongitudinalsPartial && !$this->isNew();
        if (null === $this->collTanahLongitudinals || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collTanahLongitudinals) {
                // return empty collection
                $this->initTanahLongitudinals();
            } else {
                $collTanahLongitudinals = TanahLongitudinalQuery::create(null, $criteria)
                    ->filterByTahunAjaran($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collTanahLongitudinalsPartial && count($collTanahLongitudinals)) {
                      $this->initTanahLongitudinals(false);

                      foreach($collTanahLongitudinals as $obj) {
                        if (false == $this->collTanahLongitudinals->contains($obj)) {
                          $this->collTanahLongitudinals->append($obj);
                        }
                      }

                      $this->collTanahLongitudinalsPartial = true;
                    }

                    $collTanahLongitudinals->getInternalIterator()->rewind();
                    return $collTanahLongitudinals;
                }

                if($partial && $this->collTanahLongitudinals) {
                    foreach($this->collTanahLongitudinals as $obj) {
                        if($obj->isNew()) {
                            $collTanahLongitudinals[] = $obj;
                        }
                    }
                }

                $this->collTanahLongitudinals = $collTanahLongitudinals;
                $this->collTanahLongitudinalsPartial = false;
            }
        }

        return $this->collTanahLongitudinals;
    }

    /**
     * Sets a collection of TanahLongitudinal objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $tanahLongitudinals A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return TahunAjaran The current object (for fluent API support)
     */
    public function setTanahLongitudinals(PropelCollection $tanahLongitudinals, PropelPDO $con = null)
    {
        $tanahLongitudinalsToDelete = $this->getTanahLongitudinals(new Criteria(), $con)->diff($tanahLongitudinals);

        $this->tanahLongitudinalsScheduledForDeletion = unserialize(serialize($tanahLongitudinalsToDelete));

        foreach ($tanahLongitudinalsToDelete as $tanahLongitudinalRemoved) {
            $tanahLongitudinalRemoved->setTahunAjaran(null);
        }

        $this->collTanahLongitudinals = null;
        foreach ($tanahLongitudinals as $tanahLongitudinal) {
            $this->addTanahLongitudinal($tanahLongitudinal);
        }

        $this->collTanahLongitudinals = $tanahLongitudinals;
        $this->collTanahLongitudinalsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related TanahLongitudinal objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related TanahLongitudinal objects.
     * @throws PropelException
     */
    public function countTanahLongitudinals(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collTanahLongitudinalsPartial && !$this->isNew();
        if (null === $this->collTanahLongitudinals || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collTanahLongitudinals) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getTanahLongitudinals());
            }
            $query = TanahLongitudinalQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByTahunAjaran($this)
                ->count($con);
        }

        return count($this->collTanahLongitudinals);
    }

    /**
     * Method called to associate a TanahLongitudinal object to this object
     * through the TanahLongitudinal foreign key attribute.
     *
     * @param    TanahLongitudinal $l TanahLongitudinal
     * @return TahunAjaran The current object (for fluent API support)
     */
    public function addTanahLongitudinal(TanahLongitudinal $l)
    {
        if ($this->collTanahLongitudinals === null) {
            $this->initTanahLongitudinals();
            $this->collTanahLongitudinalsPartial = true;
        }
        if (!in_array($l, $this->collTanahLongitudinals->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddTanahLongitudinal($l);
        }

        return $this;
    }

    /**
     * @param	TanahLongitudinal $tanahLongitudinal The tanahLongitudinal object to add.
     */
    protected function doAddTanahLongitudinal($tanahLongitudinal)
    {
        $this->collTanahLongitudinals[]= $tanahLongitudinal;
        $tanahLongitudinal->setTahunAjaran($this);
    }

    /**
     * @param	TanahLongitudinal $tanahLongitudinal The tanahLongitudinal object to remove.
     * @return TahunAjaran The current object (for fluent API support)
     */
    public function removeTanahLongitudinal($tanahLongitudinal)
    {
        if ($this->getTanahLongitudinals()->contains($tanahLongitudinal)) {
            $this->collTanahLongitudinals->remove($this->collTanahLongitudinals->search($tanahLongitudinal));
            if (null === $this->tanahLongitudinalsScheduledForDeletion) {
                $this->tanahLongitudinalsScheduledForDeletion = clone $this->collTanahLongitudinals;
                $this->tanahLongitudinalsScheduledForDeletion->clear();
            }
            $this->tanahLongitudinalsScheduledForDeletion[]= clone $tanahLongitudinal;
            $tanahLongitudinal->setTahunAjaran(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this TahunAjaran is new, it will return
     * an empty collection; or if this TahunAjaran has previously
     * been saved, it will retrieve related TanahLongitudinals from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in TahunAjaran.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|TanahLongitudinal[] List of TanahLongitudinal objects
     */
    public function getTanahLongitudinalsJoinTanah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TanahLongitudinalQuery::create(null, $criteria);
        $query->joinWith('Tanah', $join_behavior);

        return $this->getTanahLongitudinals($query, $con);
    }

    /**
     * Clears out the collTemplateUns collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return TahunAjaran The current object (for fluent API support)
     * @see        addTemplateUns()
     */
    public function clearTemplateUns()
    {
        $this->collTemplateUns = null; // important to set this to null since that means it is uninitialized
        $this->collTemplateUnsPartial = null;

        return $this;
    }

    /**
     * reset is the collTemplateUns collection loaded partially
     *
     * @return void
     */
    public function resetPartialTemplateUns($v = true)
    {
        $this->collTemplateUnsPartial = $v;
    }

    /**
     * Initializes the collTemplateUns collection.
     *
     * By default this just sets the collTemplateUns collection to an empty array (like clearcollTemplateUns());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initTemplateUns($overrideExisting = true)
    {
        if (null !== $this->collTemplateUns && !$overrideExisting) {
            return;
        }
        $this->collTemplateUns = new PropelObjectCollection();
        $this->collTemplateUns->setModel('TemplateUn');
    }

    /**
     * Gets an array of TemplateUn objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this TahunAjaran is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|TemplateUn[] List of TemplateUn objects
     * @throws PropelException
     */
    public function getTemplateUns($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collTemplateUnsPartial && !$this->isNew();
        if (null === $this->collTemplateUns || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collTemplateUns) {
                // return empty collection
                $this->initTemplateUns();
            } else {
                $collTemplateUns = TemplateUnQuery::create(null, $criteria)
                    ->filterByTahunAjaran($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collTemplateUnsPartial && count($collTemplateUns)) {
                      $this->initTemplateUns(false);

                      foreach($collTemplateUns as $obj) {
                        if (false == $this->collTemplateUns->contains($obj)) {
                          $this->collTemplateUns->append($obj);
                        }
                      }

                      $this->collTemplateUnsPartial = true;
                    }

                    $collTemplateUns->getInternalIterator()->rewind();
                    return $collTemplateUns;
                }

                if($partial && $this->collTemplateUns) {
                    foreach($this->collTemplateUns as $obj) {
                        if($obj->isNew()) {
                            $collTemplateUns[] = $obj;
                        }
                    }
                }

                $this->collTemplateUns = $collTemplateUns;
                $this->collTemplateUnsPartial = false;
            }
        }

        return $this->collTemplateUns;
    }

    /**
     * Sets a collection of TemplateUn objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $templateUns A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return TahunAjaran The current object (for fluent API support)
     */
    public function setTemplateUns(PropelCollection $templateUns, PropelPDO $con = null)
    {
        $templateUnsToDelete = $this->getTemplateUns(new Criteria(), $con)->diff($templateUns);

        $this->templateUnsScheduledForDeletion = unserialize(serialize($templateUnsToDelete));

        foreach ($templateUnsToDelete as $templateUnRemoved) {
            $templateUnRemoved->setTahunAjaran(null);
        }

        $this->collTemplateUns = null;
        foreach ($templateUns as $templateUn) {
            $this->addTemplateUn($templateUn);
        }

        $this->collTemplateUns = $templateUns;
        $this->collTemplateUnsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related TemplateUn objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related TemplateUn objects.
     * @throws PropelException
     */
    public function countTemplateUns(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collTemplateUnsPartial && !$this->isNew();
        if (null === $this->collTemplateUns || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collTemplateUns) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getTemplateUns());
            }
            $query = TemplateUnQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByTahunAjaran($this)
                ->count($con);
        }

        return count($this->collTemplateUns);
    }

    /**
     * Method called to associate a TemplateUn object to this object
     * through the TemplateUn foreign key attribute.
     *
     * @param    TemplateUn $l TemplateUn
     * @return TahunAjaran The current object (for fluent API support)
     */
    public function addTemplateUn(TemplateUn $l)
    {
        if ($this->collTemplateUns === null) {
            $this->initTemplateUns();
            $this->collTemplateUnsPartial = true;
        }
        if (!in_array($l, $this->collTemplateUns->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddTemplateUn($l);
        }

        return $this;
    }

    /**
     * @param	TemplateUn $templateUn The templateUn object to add.
     */
    protected function doAddTemplateUn($templateUn)
    {
        $this->collTemplateUns[]= $templateUn;
        $templateUn->setTahunAjaran($this);
    }

    /**
     * @param	TemplateUn $templateUn The templateUn object to remove.
     * @return TahunAjaran The current object (for fluent API support)
     */
    public function removeTemplateUn($templateUn)
    {
        if ($this->getTemplateUns()->contains($templateUn)) {
            $this->collTemplateUns->remove($this->collTemplateUns->search($templateUn));
            if (null === $this->templateUnsScheduledForDeletion) {
                $this->templateUnsScheduledForDeletion = clone $this->collTemplateUns;
                $this->templateUnsScheduledForDeletion->clear();
            }
            $this->templateUnsScheduledForDeletion[]= clone $templateUn;
            $templateUn->setTahunAjaran(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this TahunAjaran is new, it will return
     * an empty collection; or if this TahunAjaran has previously
     * been saved, it will retrieve related TemplateUns from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in TahunAjaran.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|TemplateUn[] List of TemplateUn objects
     */
    public function getTemplateUnsJoinJenjangPendidikan($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TemplateUnQuery::create(null, $criteria);
        $query->joinWith('JenjangPendidikan', $join_behavior);

        return $this->getTemplateUns($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this TahunAjaran is new, it will return
     * an empty collection; or if this TahunAjaran has previously
     * been saved, it will retrieve related TemplateUns from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in TahunAjaran.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|TemplateUn[] List of TemplateUn objects
     */
    public function getTemplateUnsJoinJurusan($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TemplateUnQuery::create(null, $criteria);
        $query->joinWith('Jurusan', $join_behavior);

        return $this->getTemplateUns($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this TahunAjaran is new, it will return
     * an empty collection; or if this TahunAjaran has previously
     * been saved, it will retrieve related TemplateUns from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in TahunAjaran.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|TemplateUn[] List of TemplateUn objects
     */
    public function getTemplateUnsJoinMataPelajaranRelatedByMp3Id($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TemplateUnQuery::create(null, $criteria);
        $query->joinWith('MataPelajaranRelatedByMp3Id', $join_behavior);

        return $this->getTemplateUns($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this TahunAjaran is new, it will return
     * an empty collection; or if this TahunAjaran has previously
     * been saved, it will retrieve related TemplateUns from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in TahunAjaran.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|TemplateUn[] List of TemplateUn objects
     */
    public function getTemplateUnsJoinMataPelajaranRelatedByMp4Id($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TemplateUnQuery::create(null, $criteria);
        $query->joinWith('MataPelajaranRelatedByMp4Id', $join_behavior);

        return $this->getTemplateUns($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this TahunAjaran is new, it will return
     * an empty collection; or if this TahunAjaran has previously
     * been saved, it will retrieve related TemplateUns from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in TahunAjaran.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|TemplateUn[] List of TemplateUn objects
     */
    public function getTemplateUnsJoinMataPelajaranRelatedByMp7Id($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TemplateUnQuery::create(null, $criteria);
        $query->joinWith('MataPelajaranRelatedByMp7Id', $join_behavior);

        return $this->getTemplateUns($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this TahunAjaran is new, it will return
     * an empty collection; or if this TahunAjaran has previously
     * been saved, it will retrieve related TemplateUns from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in TahunAjaran.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|TemplateUn[] List of TemplateUn objects
     */
    public function getTemplateUnsJoinMataPelajaranRelatedByMp5Id($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TemplateUnQuery::create(null, $criteria);
        $query->joinWith('MataPelajaranRelatedByMp5Id', $join_behavior);

        return $this->getTemplateUns($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this TahunAjaran is new, it will return
     * an empty collection; or if this TahunAjaran has previously
     * been saved, it will retrieve related TemplateUns from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in TahunAjaran.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|TemplateUn[] List of TemplateUn objects
     */
    public function getTemplateUnsJoinMataPelajaranRelatedByMp1Id($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TemplateUnQuery::create(null, $criteria);
        $query->joinWith('MataPelajaranRelatedByMp1Id', $join_behavior);

        return $this->getTemplateUns($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this TahunAjaran is new, it will return
     * an empty collection; or if this TahunAjaran has previously
     * been saved, it will retrieve related TemplateUns from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in TahunAjaran.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|TemplateUn[] List of TemplateUn objects
     */
    public function getTemplateUnsJoinMataPelajaranRelatedByMp2Id($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TemplateUnQuery::create(null, $criteria);
        $query->joinWith('MataPelajaranRelatedByMp2Id', $join_behavior);

        return $this->getTemplateUns($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this TahunAjaran is new, it will return
     * an empty collection; or if this TahunAjaran has previously
     * been saved, it will retrieve related TemplateUns from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in TahunAjaran.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|TemplateUn[] List of TemplateUn objects
     */
    public function getTemplateUnsJoinMataPelajaranRelatedByMp6Id($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TemplateUnQuery::create(null, $criteria);
        $query->joinWith('MataPelajaranRelatedByMp6Id', $join_behavior);

        return $this->getTemplateUns($query, $con);
    }

    /**
     * Clears out the collUns collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return TahunAjaran The current object (for fluent API support)
     * @see        addUns()
     */
    public function clearUns()
    {
        $this->collUns = null; // important to set this to null since that means it is uninitialized
        $this->collUnsPartial = null;

        return $this;
    }

    /**
     * reset is the collUns collection loaded partially
     *
     * @return void
     */
    public function resetPartialUns($v = true)
    {
        $this->collUnsPartial = $v;
    }

    /**
     * Initializes the collUns collection.
     *
     * By default this just sets the collUns collection to an empty array (like clearcollUns());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initUns($overrideExisting = true)
    {
        if (null !== $this->collUns && !$overrideExisting) {
            return;
        }
        $this->collUns = new PropelObjectCollection();
        $this->collUns->setModel('Un');
    }

    /**
     * Gets an array of Un objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this TahunAjaran is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Un[] List of Un objects
     * @throws PropelException
     */
    public function getUns($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collUnsPartial && !$this->isNew();
        if (null === $this->collUns || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collUns) {
                // return empty collection
                $this->initUns();
            } else {
                $collUns = UnQuery::create(null, $criteria)
                    ->filterByTahunAjaran($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collUnsPartial && count($collUns)) {
                      $this->initUns(false);

                      foreach($collUns as $obj) {
                        if (false == $this->collUns->contains($obj)) {
                          $this->collUns->append($obj);
                        }
                      }

                      $this->collUnsPartial = true;
                    }

                    $collUns->getInternalIterator()->rewind();
                    return $collUns;
                }

                if($partial && $this->collUns) {
                    foreach($this->collUns as $obj) {
                        if($obj->isNew()) {
                            $collUns[] = $obj;
                        }
                    }
                }

                $this->collUns = $collUns;
                $this->collUnsPartial = false;
            }
        }

        return $this->collUns;
    }

    /**
     * Sets a collection of Un objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $uns A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return TahunAjaran The current object (for fluent API support)
     */
    public function setUns(PropelCollection $uns, PropelPDO $con = null)
    {
        $unsToDelete = $this->getUns(new Criteria(), $con)->diff($uns);

        $this->unsScheduledForDeletion = unserialize(serialize($unsToDelete));

        foreach ($unsToDelete as $unRemoved) {
            $unRemoved->setTahunAjaran(null);
        }

        $this->collUns = null;
        foreach ($uns as $un) {
            $this->addUn($un);
        }

        $this->collUns = $uns;
        $this->collUnsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Un objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Un objects.
     * @throws PropelException
     */
    public function countUns(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collUnsPartial && !$this->isNew();
        if (null === $this->collUns || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collUns) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getUns());
            }
            $query = UnQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByTahunAjaran($this)
                ->count($con);
        }

        return count($this->collUns);
    }

    /**
     * Method called to associate a Un object to this object
     * through the Un foreign key attribute.
     *
     * @param    Un $l Un
     * @return TahunAjaran The current object (for fluent API support)
     */
    public function addUn(Un $l)
    {
        if ($this->collUns === null) {
            $this->initUns();
            $this->collUnsPartial = true;
        }
        if (!in_array($l, $this->collUns->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddUn($l);
        }

        return $this;
    }

    /**
     * @param	Un $un The un object to add.
     */
    protected function doAddUn($un)
    {
        $this->collUns[]= $un;
        $un->setTahunAjaran($this);
    }

    /**
     * @param	Un $un The un object to remove.
     * @return TahunAjaran The current object (for fluent API support)
     */
    public function removeUn($un)
    {
        if ($this->getUns()->contains($un)) {
            $this->collUns->remove($this->collUns->search($un));
            if (null === $this->unsScheduledForDeletion) {
                $this->unsScheduledForDeletion = clone $this->collUns;
                $this->unsScheduledForDeletion->clear();
            }
            $this->unsScheduledForDeletion[]= clone $un;
            $un->setTahunAjaran(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this TahunAjaran is new, it will return
     * an empty collection; or if this TahunAjaran has previously
     * been saved, it will retrieve related Uns from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in TahunAjaran.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Un[] List of Un objects
     */
    public function getUnsJoinTemplateUn($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = UnQuery::create(null, $criteria);
        $query->joinWith('TemplateUn', $join_behavior);

        return $this->getUns($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->tahun_ajaran_id = null;
        $this->nama = null;
        $this->periode_aktif = null;
        $this->tanggal_mulai = null;
        $this->tanggal_selesai = null;
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
            if ($this->collBeasiswaPesertaDidiksRelatedByTahunSelesai) {
                foreach ($this->collBeasiswaPesertaDidiksRelatedByTahunSelesai as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collBeasiswaPesertaDidiksRelatedByTahunMulai) {
                foreach ($this->collBeasiswaPesertaDidiksRelatedByTahunMulai as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collDemografis) {
                foreach ($this->collDemografis as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collPengawasTerdaftars) {
                foreach ($this->collPengawasTerdaftars as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collPesertaDidikBarus) {
                foreach ($this->collPesertaDidikBarus as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collPtkBarus) {
                foreach ($this->collPtkBarus as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collPtkTerdaftars) {
                foreach ($this->collPtkTerdaftars as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collSemesters) {
                foreach ($this->collSemesters as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collTanahLongitudinals) {
                foreach ($this->collTanahLongitudinals as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collTemplateUns) {
                foreach ($this->collTemplateUns as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collUns) {
                foreach ($this->collUns as $o) {
                    $o->clearAllReferences($deep);
                }
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collBeasiswaPesertaDidiksRelatedByTahunSelesai instanceof PropelCollection) {
            $this->collBeasiswaPesertaDidiksRelatedByTahunSelesai->clearIterator();
        }
        $this->collBeasiswaPesertaDidiksRelatedByTahunSelesai = null;
        if ($this->collBeasiswaPesertaDidiksRelatedByTahunMulai instanceof PropelCollection) {
            $this->collBeasiswaPesertaDidiksRelatedByTahunMulai->clearIterator();
        }
        $this->collBeasiswaPesertaDidiksRelatedByTahunMulai = null;
        if ($this->collDemografis instanceof PropelCollection) {
            $this->collDemografis->clearIterator();
        }
        $this->collDemografis = null;
        if ($this->collPengawasTerdaftars instanceof PropelCollection) {
            $this->collPengawasTerdaftars->clearIterator();
        }
        $this->collPengawasTerdaftars = null;
        if ($this->collPesertaDidikBarus instanceof PropelCollection) {
            $this->collPesertaDidikBarus->clearIterator();
        }
        $this->collPesertaDidikBarus = null;
        if ($this->collPtkBarus instanceof PropelCollection) {
            $this->collPtkBarus->clearIterator();
        }
        $this->collPtkBarus = null;
        if ($this->collPtkTerdaftars instanceof PropelCollection) {
            $this->collPtkTerdaftars->clearIterator();
        }
        $this->collPtkTerdaftars = null;
        if ($this->collSemesters instanceof PropelCollection) {
            $this->collSemesters->clearIterator();
        }
        $this->collSemesters = null;
        if ($this->collTanahLongitudinals instanceof PropelCollection) {
            $this->collTanahLongitudinals->clearIterator();
        }
        $this->collTanahLongitudinals = null;
        if ($this->collTemplateUns instanceof PropelCollection) {
            $this->collTemplateUns->clearIterator();
        }
        $this->collTemplateUns = null;
        if ($this->collUns instanceof PropelCollection) {
            $this->collUns->clearIterator();
        }
        $this->collUns = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(TahunAjaranPeer::DEFAULT_STRING_FORMAT);
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
