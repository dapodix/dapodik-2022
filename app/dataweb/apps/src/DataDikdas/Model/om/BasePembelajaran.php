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
use DataDikdas\Model\BukuPelajaran;
use DataDikdas\Model\BukuPelajaranQuery;
use DataDikdas\Model\Jadwal;
use DataDikdas\Model\JadwalQuery;
use DataDikdas\Model\MataPelajaran;
use DataDikdas\Model\MataPelajaranQuery;
use DataDikdas\Model\Pembelajaran;
use DataDikdas\Model\PembelajaranPeer;
use DataDikdas\Model\PembelajaranQuery;
use DataDikdas\Model\PtkTerdaftar;
use DataDikdas\Model\PtkTerdaftarQuery;
use DataDikdas\Model\RombonganBelajar;
use DataDikdas\Model\RombonganBelajarQuery;
use DataDikdas\Model\Semester;
use DataDikdas\Model\SemesterQuery;
use DataDikdas\Model\VldPembelajaran;
use DataDikdas\Model\VldPembelajaranQuery;

/**
 * Base class that represents a row from the 'pembelajaran' table.
 *
 * 
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BasePembelajaran extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'DataDikdas\\Model\\PembelajaranPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        PembelajaranPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the pembelajaran_id field.
     * @var        string
     */
    protected $pembelajaran_id;

    /**
     * The value for the rombongan_belajar_id field.
     * @var        string
     */
    protected $rombongan_belajar_id;

    /**
     * The value for the semester_id field.
     * @var        string
     */
    protected $semester_id;

    /**
     * The value for the mata_pelajaran_id field.
     * @var        int
     */
    protected $mata_pelajaran_id;

    /**
     * The value for the ptk_terdaftar_id field.
     * @var        string
     */
    protected $ptk_terdaftar_id;

    /**
     * The value for the sk_mengajar field.
     * @var        string
     */
    protected $sk_mengajar;

    /**
     * The value for the tanggal_sk_mengajar field.
     * @var        string
     */
    protected $tanggal_sk_mengajar;

    /**
     * The value for the jam_mengajar_per_minggu field.
     * @var        string
     */
    protected $jam_mengajar_per_minggu;

    /**
     * The value for the status_di_kurikulum field.
     * @var        string
     */
    protected $status_di_kurikulum;

    /**
     * The value for the nama_mata_pelajaran field.
     * @var        string
     */
    protected $nama_mata_pelajaran;

    /**
     * The value for the induk_pembelajaran_id field.
     * @var        string
     */
    protected $induk_pembelajaran_id;

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
     * @var        Pembelajaran
     */
    protected $aPembelajaranRelatedByIndukPembelajaranId;

    /**
     * @var        PtkTerdaftar
     */
    protected $aPtkTerdaftar;

    /**
     * @var        Semester
     */
    protected $aSemester;

    /**
     * @var        RombonganBelajar
     */
    protected $aRombonganBelajar;

    /**
     * @var        MataPelajaran
     */
    protected $aMataPelajaran;

    /**
     * @var        PropelObjectCollection|BukuPelajaran[] Collection to store aggregation of BukuPelajaran objects.
     */
    protected $collBukuPelajarans;
    protected $collBukuPelajaransPartial;

    /**
     * @var        PropelObjectCollection|Jadwal[] Collection to store aggregation of Jadwal objects.
     */
    protected $collJadwalsRelatedByBelKe01;
    protected $collJadwalsRelatedByBelKe01Partial;

    /**
     * @var        PropelObjectCollection|Jadwal[] Collection to store aggregation of Jadwal objects.
     */
    protected $collJadwalsRelatedByBelKe02;
    protected $collJadwalsRelatedByBelKe02Partial;

    /**
     * @var        PropelObjectCollection|Jadwal[] Collection to store aggregation of Jadwal objects.
     */
    protected $collJadwalsRelatedByBelKe03;
    protected $collJadwalsRelatedByBelKe03Partial;

    /**
     * @var        PropelObjectCollection|Jadwal[] Collection to store aggregation of Jadwal objects.
     */
    protected $collJadwalsRelatedByBelKe04;
    protected $collJadwalsRelatedByBelKe04Partial;

    /**
     * @var        PropelObjectCollection|Jadwal[] Collection to store aggregation of Jadwal objects.
     */
    protected $collJadwalsRelatedByBelKe05;
    protected $collJadwalsRelatedByBelKe05Partial;

    /**
     * @var        PropelObjectCollection|Jadwal[] Collection to store aggregation of Jadwal objects.
     */
    protected $collJadwalsRelatedByBelKe06;
    protected $collJadwalsRelatedByBelKe06Partial;

    /**
     * @var        PropelObjectCollection|Jadwal[] Collection to store aggregation of Jadwal objects.
     */
    protected $collJadwalsRelatedByBelKe07;
    protected $collJadwalsRelatedByBelKe07Partial;

    /**
     * @var        PropelObjectCollection|Jadwal[] Collection to store aggregation of Jadwal objects.
     */
    protected $collJadwalsRelatedByBelKe08;
    protected $collJadwalsRelatedByBelKe08Partial;

    /**
     * @var        PropelObjectCollection|Jadwal[] Collection to store aggregation of Jadwal objects.
     */
    protected $collJadwalsRelatedByBelKe09;
    protected $collJadwalsRelatedByBelKe09Partial;

    /**
     * @var        PropelObjectCollection|Jadwal[] Collection to store aggregation of Jadwal objects.
     */
    protected $collJadwalsRelatedByBelKe10;
    protected $collJadwalsRelatedByBelKe10Partial;

    /**
     * @var        PropelObjectCollection|Jadwal[] Collection to store aggregation of Jadwal objects.
     */
    protected $collJadwalsRelatedByBelKe11;
    protected $collJadwalsRelatedByBelKe11Partial;

    /**
     * @var        PropelObjectCollection|Jadwal[] Collection to store aggregation of Jadwal objects.
     */
    protected $collJadwalsRelatedByBelKe12;
    protected $collJadwalsRelatedByBelKe12Partial;

    /**
     * @var        PropelObjectCollection|Jadwal[] Collection to store aggregation of Jadwal objects.
     */
    protected $collJadwalsRelatedByBelKe13;
    protected $collJadwalsRelatedByBelKe13Partial;

    /**
     * @var        PropelObjectCollection|Jadwal[] Collection to store aggregation of Jadwal objects.
     */
    protected $collJadwalsRelatedByBelKe14;
    protected $collJadwalsRelatedByBelKe14Partial;

    /**
     * @var        PropelObjectCollection|Jadwal[] Collection to store aggregation of Jadwal objects.
     */
    protected $collJadwalsRelatedByBelKe15;
    protected $collJadwalsRelatedByBelKe15Partial;

    /**
     * @var        PropelObjectCollection|Jadwal[] Collection to store aggregation of Jadwal objects.
     */
    protected $collJadwalsRelatedByBelKe16;
    protected $collJadwalsRelatedByBelKe16Partial;

    /**
     * @var        PropelObjectCollection|Jadwal[] Collection to store aggregation of Jadwal objects.
     */
    protected $collJadwalsRelatedByBelKe17;
    protected $collJadwalsRelatedByBelKe17Partial;

    /**
     * @var        PropelObjectCollection|Jadwal[] Collection to store aggregation of Jadwal objects.
     */
    protected $collJadwalsRelatedByBelKe18;
    protected $collJadwalsRelatedByBelKe18Partial;

    /**
     * @var        PropelObjectCollection|Jadwal[] Collection to store aggregation of Jadwal objects.
     */
    protected $collJadwalsRelatedByBelKe19;
    protected $collJadwalsRelatedByBelKe19Partial;

    /**
     * @var        PropelObjectCollection|Jadwal[] Collection to store aggregation of Jadwal objects.
     */
    protected $collJadwalsRelatedByBelKe20;
    protected $collJadwalsRelatedByBelKe20Partial;

    /**
     * @var        PropelObjectCollection|Pembelajaran[] Collection to store aggregation of Pembelajaran objects.
     */
    protected $collPembelajaransRelatedByPembelajaranId;
    protected $collPembelajaransRelatedByPembelajaranIdPartial;

    /**
     * @var        PropelObjectCollection|VldPembelajaran[] Collection to store aggregation of VldPembelajaran objects.
     */
    protected $collVldPembelajarans;
    protected $collVldPembelajaransPartial;

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
    protected $bukuPelajaransScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $jadwalsRelatedByBelKe01ScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $jadwalsRelatedByBelKe02ScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $jadwalsRelatedByBelKe03ScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $jadwalsRelatedByBelKe04ScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $jadwalsRelatedByBelKe05ScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $jadwalsRelatedByBelKe06ScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $jadwalsRelatedByBelKe07ScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $jadwalsRelatedByBelKe08ScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $jadwalsRelatedByBelKe09ScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $jadwalsRelatedByBelKe10ScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $jadwalsRelatedByBelKe11ScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $jadwalsRelatedByBelKe12ScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $jadwalsRelatedByBelKe13ScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $jadwalsRelatedByBelKe14ScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $jadwalsRelatedByBelKe15ScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $jadwalsRelatedByBelKe16ScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $jadwalsRelatedByBelKe17ScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $jadwalsRelatedByBelKe18ScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $jadwalsRelatedByBelKe19ScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $jadwalsRelatedByBelKe20ScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $pembelajaransRelatedByPembelajaranIdScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $vldPembelajaransScheduledForDeletion = null;

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
     * Initializes internal state of BasePembelajaran object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [pembelajaran_id] column value.
     * 
     * @return string
     */
    public function getPembelajaranId()
    {
        return $this->pembelajaran_id;
    }

    /**
     * Get the [rombongan_belajar_id] column value.
     * 
     * @return string
     */
    public function getRombonganBelajarId()
    {
        return $this->rombongan_belajar_id;
    }

    /**
     * Get the [semester_id] column value.
     * 
     * @return string
     */
    public function getSemesterId()
    {
        return $this->semester_id;
    }

    /**
     * Get the [mata_pelajaran_id] column value.
     * 
     * @return int
     */
    public function getMataPelajaranId()
    {
        return $this->mata_pelajaran_id;
    }

    /**
     * Get the [ptk_terdaftar_id] column value.
     * 
     * @return string
     */
    public function getPtkTerdaftarId()
    {
        return $this->ptk_terdaftar_id;
    }

    /**
     * Get the [sk_mengajar] column value.
     * 
     * @return string
     */
    public function getSkMengajar()
    {
        return $this->sk_mengajar;
    }

    /**
     * Get the [optionally formatted] temporal [tanggal_sk_mengajar] column value.
     * 
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getTanggalSkMengajar($format = '%Y-%m-%d')
    {
        if ($this->tanggal_sk_mengajar === null) {
            return null;
        }


        try {
            $dt = new DateTime($this->tanggal_sk_mengajar);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->tanggal_sk_mengajar, true), $x);
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
     * Get the [jam_mengajar_per_minggu] column value.
     * 
     * @return string
     */
    public function getJamMengajarPerMinggu()
    {
        return $this->jam_mengajar_per_minggu;
    }

    /**
     * Get the [status_di_kurikulum] column value.
     * 
     * @return string
     */
    public function getStatusDiKurikulum()
    {
        return $this->status_di_kurikulum;
    }

    /**
     * Get the [nama_mata_pelajaran] column value.
     * 
     * @return string
     */
    public function getNamaMataPelajaran()
    {
        return $this->nama_mata_pelajaran;
    }

    /**
     * Get the [induk_pembelajaran_id] column value.
     * 
     * @return string
     */
    public function getIndukPembelajaranId()
    {
        return $this->induk_pembelajaran_id;
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
     * Set the value of [pembelajaran_id] column.
     * 
     * @param string $v new value
     * @return Pembelajaran The current object (for fluent API support)
     */
    public function setPembelajaranId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->pembelajaran_id !== $v) {
            $this->pembelajaran_id = $v;
            $this->modifiedColumns[] = PembelajaranPeer::PEMBELAJARAN_ID;
        }


        return $this;
    } // setPembelajaranId()

    /**
     * Set the value of [rombongan_belajar_id] column.
     * 
     * @param string $v new value
     * @return Pembelajaran The current object (for fluent API support)
     */
    public function setRombonganBelajarId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->rombongan_belajar_id !== $v) {
            $this->rombongan_belajar_id = $v;
            $this->modifiedColumns[] = PembelajaranPeer::ROMBONGAN_BELAJAR_ID;
        }

        if ($this->aRombonganBelajar !== null && $this->aRombonganBelajar->getRombonganBelajarId() !== $v) {
            $this->aRombonganBelajar = null;
        }


        return $this;
    } // setRombonganBelajarId()

    /**
     * Set the value of [semester_id] column.
     * 
     * @param string $v new value
     * @return Pembelajaran The current object (for fluent API support)
     */
    public function setSemesterId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->semester_id !== $v) {
            $this->semester_id = $v;
            $this->modifiedColumns[] = PembelajaranPeer::SEMESTER_ID;
        }

        if ($this->aSemester !== null && $this->aSemester->getSemesterId() !== $v) {
            $this->aSemester = null;
        }


        return $this;
    } // setSemesterId()

    /**
     * Set the value of [mata_pelajaran_id] column.
     * 
     * @param int $v new value
     * @return Pembelajaran The current object (for fluent API support)
     */
    public function setMataPelajaranId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->mata_pelajaran_id !== $v) {
            $this->mata_pelajaran_id = $v;
            $this->modifiedColumns[] = PembelajaranPeer::MATA_PELAJARAN_ID;
        }

        if ($this->aMataPelajaran !== null && $this->aMataPelajaran->getMataPelajaranId() !== $v) {
            $this->aMataPelajaran = null;
        }


        return $this;
    } // setMataPelajaranId()

    /**
     * Set the value of [ptk_terdaftar_id] column.
     * 
     * @param string $v new value
     * @return Pembelajaran The current object (for fluent API support)
     */
    public function setPtkTerdaftarId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->ptk_terdaftar_id !== $v) {
            $this->ptk_terdaftar_id = $v;
            $this->modifiedColumns[] = PembelajaranPeer::PTK_TERDAFTAR_ID;
        }

        if ($this->aPtkTerdaftar !== null && $this->aPtkTerdaftar->getPtkTerdaftarId() !== $v) {
            $this->aPtkTerdaftar = null;
        }


        return $this;
    } // setPtkTerdaftarId()

    /**
     * Set the value of [sk_mengajar] column.
     * 
     * @param string $v new value
     * @return Pembelajaran The current object (for fluent API support)
     */
    public function setSkMengajar($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->sk_mengajar !== $v) {
            $this->sk_mengajar = $v;
            $this->modifiedColumns[] = PembelajaranPeer::SK_MENGAJAR;
        }


        return $this;
    } // setSkMengajar()

    /**
     * Sets the value of [tanggal_sk_mengajar] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Pembelajaran The current object (for fluent API support)
     */
    public function setTanggalSkMengajar($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->tanggal_sk_mengajar !== null || $dt !== null) {
            $currentDateAsString = ($this->tanggal_sk_mengajar !== null && $tmpDt = new DateTime($this->tanggal_sk_mengajar)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->tanggal_sk_mengajar = $newDateAsString;
                $this->modifiedColumns[] = PembelajaranPeer::TANGGAL_SK_MENGAJAR;
            }
        } // if either are not null


        return $this;
    } // setTanggalSkMengajar()

    /**
     * Set the value of [jam_mengajar_per_minggu] column.
     * 
     * @param string $v new value
     * @return Pembelajaran The current object (for fluent API support)
     */
    public function setJamMengajarPerMinggu($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->jam_mengajar_per_minggu !== $v) {
            $this->jam_mengajar_per_minggu = $v;
            $this->modifiedColumns[] = PembelajaranPeer::JAM_MENGAJAR_PER_MINGGU;
        }


        return $this;
    } // setJamMengajarPerMinggu()

    /**
     * Set the value of [status_di_kurikulum] column.
     * 
     * @param string $v new value
     * @return Pembelajaran The current object (for fluent API support)
     */
    public function setStatusDiKurikulum($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->status_di_kurikulum !== $v) {
            $this->status_di_kurikulum = $v;
            $this->modifiedColumns[] = PembelajaranPeer::STATUS_DI_KURIKULUM;
        }


        return $this;
    } // setStatusDiKurikulum()

    /**
     * Set the value of [nama_mata_pelajaran] column.
     * 
     * @param string $v new value
     * @return Pembelajaran The current object (for fluent API support)
     */
    public function setNamaMataPelajaran($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nama_mata_pelajaran !== $v) {
            $this->nama_mata_pelajaran = $v;
            $this->modifiedColumns[] = PembelajaranPeer::NAMA_MATA_PELAJARAN;
        }


        return $this;
    } // setNamaMataPelajaran()

    /**
     * Set the value of [induk_pembelajaran_id] column.
     * 
     * @param string $v new value
     * @return Pembelajaran The current object (for fluent API support)
     */
    public function setIndukPembelajaranId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->induk_pembelajaran_id !== $v) {
            $this->induk_pembelajaran_id = $v;
            $this->modifiedColumns[] = PembelajaranPeer::INDUK_PEMBELAJARAN_ID;
        }

        if ($this->aPembelajaranRelatedByIndukPembelajaranId !== null && $this->aPembelajaranRelatedByIndukPembelajaranId->getPembelajaranId() !== $v) {
            $this->aPembelajaranRelatedByIndukPembelajaranId = null;
        }


        return $this;
    } // setIndukPembelajaranId()

    /**
     * Sets the value of [create_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Pembelajaran The current object (for fluent API support)
     */
    public function setCreateDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->create_date !== null || $dt !== null) {
            $currentDateAsString = ($this->create_date !== null && $tmpDt = new DateTime($this->create_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->create_date = $newDateAsString;
                $this->modifiedColumns[] = PembelajaranPeer::CREATE_DATE;
            }
        } // if either are not null


        return $this;
    } // setCreateDate()

    /**
     * Sets the value of [last_update] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Pembelajaran The current object (for fluent API support)
     */
    public function setLastUpdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->last_update !== null || $dt !== null) {
            $currentDateAsString = ($this->last_update !== null && $tmpDt = new DateTime($this->last_update)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->last_update = $newDateAsString;
                $this->modifiedColumns[] = PembelajaranPeer::LAST_UPDATE;
            }
        } // if either are not null


        return $this;
    } // setLastUpdate()

    /**
     * Set the value of [soft_delete] column.
     * 
     * @param string $v new value
     * @return Pembelajaran The current object (for fluent API support)
     */
    public function setSoftDelete($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->soft_delete !== $v) {
            $this->soft_delete = $v;
            $this->modifiedColumns[] = PembelajaranPeer::SOFT_DELETE;
        }


        return $this;
    } // setSoftDelete()

    /**
     * Sets the value of [last_sync] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Pembelajaran The current object (for fluent API support)
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
                $this->modifiedColumns[] = PembelajaranPeer::LAST_SYNC;
            }
        } // if either are not null


        return $this;
    } // setLastSync()

    /**
     * Set the value of [updater_id] column.
     * 
     * @param string $v new value
     * @return Pembelajaran The current object (for fluent API support)
     */
    public function setUpdaterId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->updater_id !== $v) {
            $this->updater_id = $v;
            $this->modifiedColumns[] = PembelajaranPeer::UPDATER_ID;
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

            $this->pembelajaran_id = ($row[$startcol + 0] !== null) ? (string) $row[$startcol + 0] : null;
            $this->rombongan_belajar_id = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->semester_id = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->mata_pelajaran_id = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
            $this->ptk_terdaftar_id = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->sk_mengajar = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->tanggal_sk_mengajar = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->jam_mengajar_per_minggu = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->status_di_kurikulum = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->nama_mata_pelajaran = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
            $this->induk_pembelajaran_id = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
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
            return $startcol + 16; // 16 = PembelajaranPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Pembelajaran object", $e);
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

        if ($this->aRombonganBelajar !== null && $this->rombongan_belajar_id !== $this->aRombonganBelajar->getRombonganBelajarId()) {
            $this->aRombonganBelajar = null;
        }
        if ($this->aSemester !== null && $this->semester_id !== $this->aSemester->getSemesterId()) {
            $this->aSemester = null;
        }
        if ($this->aMataPelajaran !== null && $this->mata_pelajaran_id !== $this->aMataPelajaran->getMataPelajaranId()) {
            $this->aMataPelajaran = null;
        }
        if ($this->aPtkTerdaftar !== null && $this->ptk_terdaftar_id !== $this->aPtkTerdaftar->getPtkTerdaftarId()) {
            $this->aPtkTerdaftar = null;
        }
        if ($this->aPembelajaranRelatedByIndukPembelajaranId !== null && $this->induk_pembelajaran_id !== $this->aPembelajaranRelatedByIndukPembelajaranId->getPembelajaranId()) {
            $this->aPembelajaranRelatedByIndukPembelajaranId = null;
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
            $con = Propel::getConnection(PembelajaranPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = PembelajaranPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aPembelajaranRelatedByIndukPembelajaranId = null;
            $this->aPtkTerdaftar = null;
            $this->aSemester = null;
            $this->aRombonganBelajar = null;
            $this->aMataPelajaran = null;
            $this->collBukuPelajarans = null;

            $this->collJadwalsRelatedByBelKe01 = null;

            $this->collJadwalsRelatedByBelKe02 = null;

            $this->collJadwalsRelatedByBelKe03 = null;

            $this->collJadwalsRelatedByBelKe04 = null;

            $this->collJadwalsRelatedByBelKe05 = null;

            $this->collJadwalsRelatedByBelKe06 = null;

            $this->collJadwalsRelatedByBelKe07 = null;

            $this->collJadwalsRelatedByBelKe08 = null;

            $this->collJadwalsRelatedByBelKe09 = null;

            $this->collJadwalsRelatedByBelKe10 = null;

            $this->collJadwalsRelatedByBelKe11 = null;

            $this->collJadwalsRelatedByBelKe12 = null;

            $this->collJadwalsRelatedByBelKe13 = null;

            $this->collJadwalsRelatedByBelKe14 = null;

            $this->collJadwalsRelatedByBelKe15 = null;

            $this->collJadwalsRelatedByBelKe16 = null;

            $this->collJadwalsRelatedByBelKe17 = null;

            $this->collJadwalsRelatedByBelKe18 = null;

            $this->collJadwalsRelatedByBelKe19 = null;

            $this->collJadwalsRelatedByBelKe20 = null;

            $this->collPembelajaransRelatedByPembelajaranId = null;

            $this->collVldPembelajarans = null;

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
            $con = Propel::getConnection(PembelajaranPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = PembelajaranQuery::create()
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
            $con = Propel::getConnection(PembelajaranPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                PembelajaranPeer::addInstanceToPool($this);
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

            if ($this->aPembelajaranRelatedByIndukPembelajaranId !== null) {
                if ($this->aPembelajaranRelatedByIndukPembelajaranId->isModified() || $this->aPembelajaranRelatedByIndukPembelajaranId->isNew()) {
                    $affectedRows += $this->aPembelajaranRelatedByIndukPembelajaranId->save($con);
                }
                $this->setPembelajaranRelatedByIndukPembelajaranId($this->aPembelajaranRelatedByIndukPembelajaranId);
            }

            if ($this->aPtkTerdaftar !== null) {
                if ($this->aPtkTerdaftar->isModified() || $this->aPtkTerdaftar->isNew()) {
                    $affectedRows += $this->aPtkTerdaftar->save($con);
                }
                $this->setPtkTerdaftar($this->aPtkTerdaftar);
            }

            if ($this->aSemester !== null) {
                if ($this->aSemester->isModified() || $this->aSemester->isNew()) {
                    $affectedRows += $this->aSemester->save($con);
                }
                $this->setSemester($this->aSemester);
            }

            if ($this->aRombonganBelajar !== null) {
                if ($this->aRombonganBelajar->isModified() || $this->aRombonganBelajar->isNew()) {
                    $affectedRows += $this->aRombonganBelajar->save($con);
                }
                $this->setRombonganBelajar($this->aRombonganBelajar);
            }

            if ($this->aMataPelajaran !== null) {
                if ($this->aMataPelajaran->isModified() || $this->aMataPelajaran->isNew()) {
                    $affectedRows += $this->aMataPelajaran->save($con);
                }
                $this->setMataPelajaran($this->aMataPelajaran);
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

            if ($this->bukuPelajaransScheduledForDeletion !== null) {
                if (!$this->bukuPelajaransScheduledForDeletion->isEmpty()) {
                    BukuPelajaranQuery::create()
                        ->filterByPrimaryKeys($this->bukuPelajaransScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->bukuPelajaransScheduledForDeletion = null;
                }
            }

            if ($this->collBukuPelajarans !== null) {
                foreach ($this->collBukuPelajarans as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->jadwalsRelatedByBelKe01ScheduledForDeletion !== null) {
                if (!$this->jadwalsRelatedByBelKe01ScheduledForDeletion->isEmpty()) {
                    foreach ($this->jadwalsRelatedByBelKe01ScheduledForDeletion as $jadwalRelatedByBelKe01) {
                        // need to save related object because we set the relation to null
                        $jadwalRelatedByBelKe01->save($con);
                    }
                    $this->jadwalsRelatedByBelKe01ScheduledForDeletion = null;
                }
            }

            if ($this->collJadwalsRelatedByBelKe01 !== null) {
                foreach ($this->collJadwalsRelatedByBelKe01 as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->jadwalsRelatedByBelKe02ScheduledForDeletion !== null) {
                if (!$this->jadwalsRelatedByBelKe02ScheduledForDeletion->isEmpty()) {
                    foreach ($this->jadwalsRelatedByBelKe02ScheduledForDeletion as $jadwalRelatedByBelKe02) {
                        // need to save related object because we set the relation to null
                        $jadwalRelatedByBelKe02->save($con);
                    }
                    $this->jadwalsRelatedByBelKe02ScheduledForDeletion = null;
                }
            }

            if ($this->collJadwalsRelatedByBelKe02 !== null) {
                foreach ($this->collJadwalsRelatedByBelKe02 as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->jadwalsRelatedByBelKe03ScheduledForDeletion !== null) {
                if (!$this->jadwalsRelatedByBelKe03ScheduledForDeletion->isEmpty()) {
                    foreach ($this->jadwalsRelatedByBelKe03ScheduledForDeletion as $jadwalRelatedByBelKe03) {
                        // need to save related object because we set the relation to null
                        $jadwalRelatedByBelKe03->save($con);
                    }
                    $this->jadwalsRelatedByBelKe03ScheduledForDeletion = null;
                }
            }

            if ($this->collJadwalsRelatedByBelKe03 !== null) {
                foreach ($this->collJadwalsRelatedByBelKe03 as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->jadwalsRelatedByBelKe04ScheduledForDeletion !== null) {
                if (!$this->jadwalsRelatedByBelKe04ScheduledForDeletion->isEmpty()) {
                    foreach ($this->jadwalsRelatedByBelKe04ScheduledForDeletion as $jadwalRelatedByBelKe04) {
                        // need to save related object because we set the relation to null
                        $jadwalRelatedByBelKe04->save($con);
                    }
                    $this->jadwalsRelatedByBelKe04ScheduledForDeletion = null;
                }
            }

            if ($this->collJadwalsRelatedByBelKe04 !== null) {
                foreach ($this->collJadwalsRelatedByBelKe04 as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->jadwalsRelatedByBelKe05ScheduledForDeletion !== null) {
                if (!$this->jadwalsRelatedByBelKe05ScheduledForDeletion->isEmpty()) {
                    foreach ($this->jadwalsRelatedByBelKe05ScheduledForDeletion as $jadwalRelatedByBelKe05) {
                        // need to save related object because we set the relation to null
                        $jadwalRelatedByBelKe05->save($con);
                    }
                    $this->jadwalsRelatedByBelKe05ScheduledForDeletion = null;
                }
            }

            if ($this->collJadwalsRelatedByBelKe05 !== null) {
                foreach ($this->collJadwalsRelatedByBelKe05 as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->jadwalsRelatedByBelKe06ScheduledForDeletion !== null) {
                if (!$this->jadwalsRelatedByBelKe06ScheduledForDeletion->isEmpty()) {
                    foreach ($this->jadwalsRelatedByBelKe06ScheduledForDeletion as $jadwalRelatedByBelKe06) {
                        // need to save related object because we set the relation to null
                        $jadwalRelatedByBelKe06->save($con);
                    }
                    $this->jadwalsRelatedByBelKe06ScheduledForDeletion = null;
                }
            }

            if ($this->collJadwalsRelatedByBelKe06 !== null) {
                foreach ($this->collJadwalsRelatedByBelKe06 as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->jadwalsRelatedByBelKe07ScheduledForDeletion !== null) {
                if (!$this->jadwalsRelatedByBelKe07ScheduledForDeletion->isEmpty()) {
                    foreach ($this->jadwalsRelatedByBelKe07ScheduledForDeletion as $jadwalRelatedByBelKe07) {
                        // need to save related object because we set the relation to null
                        $jadwalRelatedByBelKe07->save($con);
                    }
                    $this->jadwalsRelatedByBelKe07ScheduledForDeletion = null;
                }
            }

            if ($this->collJadwalsRelatedByBelKe07 !== null) {
                foreach ($this->collJadwalsRelatedByBelKe07 as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->jadwalsRelatedByBelKe08ScheduledForDeletion !== null) {
                if (!$this->jadwalsRelatedByBelKe08ScheduledForDeletion->isEmpty()) {
                    foreach ($this->jadwalsRelatedByBelKe08ScheduledForDeletion as $jadwalRelatedByBelKe08) {
                        // need to save related object because we set the relation to null
                        $jadwalRelatedByBelKe08->save($con);
                    }
                    $this->jadwalsRelatedByBelKe08ScheduledForDeletion = null;
                }
            }

            if ($this->collJadwalsRelatedByBelKe08 !== null) {
                foreach ($this->collJadwalsRelatedByBelKe08 as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->jadwalsRelatedByBelKe09ScheduledForDeletion !== null) {
                if (!$this->jadwalsRelatedByBelKe09ScheduledForDeletion->isEmpty()) {
                    foreach ($this->jadwalsRelatedByBelKe09ScheduledForDeletion as $jadwalRelatedByBelKe09) {
                        // need to save related object because we set the relation to null
                        $jadwalRelatedByBelKe09->save($con);
                    }
                    $this->jadwalsRelatedByBelKe09ScheduledForDeletion = null;
                }
            }

            if ($this->collJadwalsRelatedByBelKe09 !== null) {
                foreach ($this->collJadwalsRelatedByBelKe09 as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->jadwalsRelatedByBelKe10ScheduledForDeletion !== null) {
                if (!$this->jadwalsRelatedByBelKe10ScheduledForDeletion->isEmpty()) {
                    foreach ($this->jadwalsRelatedByBelKe10ScheduledForDeletion as $jadwalRelatedByBelKe10) {
                        // need to save related object because we set the relation to null
                        $jadwalRelatedByBelKe10->save($con);
                    }
                    $this->jadwalsRelatedByBelKe10ScheduledForDeletion = null;
                }
            }

            if ($this->collJadwalsRelatedByBelKe10 !== null) {
                foreach ($this->collJadwalsRelatedByBelKe10 as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->jadwalsRelatedByBelKe11ScheduledForDeletion !== null) {
                if (!$this->jadwalsRelatedByBelKe11ScheduledForDeletion->isEmpty()) {
                    foreach ($this->jadwalsRelatedByBelKe11ScheduledForDeletion as $jadwalRelatedByBelKe11) {
                        // need to save related object because we set the relation to null
                        $jadwalRelatedByBelKe11->save($con);
                    }
                    $this->jadwalsRelatedByBelKe11ScheduledForDeletion = null;
                }
            }

            if ($this->collJadwalsRelatedByBelKe11 !== null) {
                foreach ($this->collJadwalsRelatedByBelKe11 as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->jadwalsRelatedByBelKe12ScheduledForDeletion !== null) {
                if (!$this->jadwalsRelatedByBelKe12ScheduledForDeletion->isEmpty()) {
                    foreach ($this->jadwalsRelatedByBelKe12ScheduledForDeletion as $jadwalRelatedByBelKe12) {
                        // need to save related object because we set the relation to null
                        $jadwalRelatedByBelKe12->save($con);
                    }
                    $this->jadwalsRelatedByBelKe12ScheduledForDeletion = null;
                }
            }

            if ($this->collJadwalsRelatedByBelKe12 !== null) {
                foreach ($this->collJadwalsRelatedByBelKe12 as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->jadwalsRelatedByBelKe13ScheduledForDeletion !== null) {
                if (!$this->jadwalsRelatedByBelKe13ScheduledForDeletion->isEmpty()) {
                    foreach ($this->jadwalsRelatedByBelKe13ScheduledForDeletion as $jadwalRelatedByBelKe13) {
                        // need to save related object because we set the relation to null
                        $jadwalRelatedByBelKe13->save($con);
                    }
                    $this->jadwalsRelatedByBelKe13ScheduledForDeletion = null;
                }
            }

            if ($this->collJadwalsRelatedByBelKe13 !== null) {
                foreach ($this->collJadwalsRelatedByBelKe13 as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->jadwalsRelatedByBelKe14ScheduledForDeletion !== null) {
                if (!$this->jadwalsRelatedByBelKe14ScheduledForDeletion->isEmpty()) {
                    foreach ($this->jadwalsRelatedByBelKe14ScheduledForDeletion as $jadwalRelatedByBelKe14) {
                        // need to save related object because we set the relation to null
                        $jadwalRelatedByBelKe14->save($con);
                    }
                    $this->jadwalsRelatedByBelKe14ScheduledForDeletion = null;
                }
            }

            if ($this->collJadwalsRelatedByBelKe14 !== null) {
                foreach ($this->collJadwalsRelatedByBelKe14 as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->jadwalsRelatedByBelKe15ScheduledForDeletion !== null) {
                if (!$this->jadwalsRelatedByBelKe15ScheduledForDeletion->isEmpty()) {
                    foreach ($this->jadwalsRelatedByBelKe15ScheduledForDeletion as $jadwalRelatedByBelKe15) {
                        // need to save related object because we set the relation to null
                        $jadwalRelatedByBelKe15->save($con);
                    }
                    $this->jadwalsRelatedByBelKe15ScheduledForDeletion = null;
                }
            }

            if ($this->collJadwalsRelatedByBelKe15 !== null) {
                foreach ($this->collJadwalsRelatedByBelKe15 as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->jadwalsRelatedByBelKe16ScheduledForDeletion !== null) {
                if (!$this->jadwalsRelatedByBelKe16ScheduledForDeletion->isEmpty()) {
                    foreach ($this->jadwalsRelatedByBelKe16ScheduledForDeletion as $jadwalRelatedByBelKe16) {
                        // need to save related object because we set the relation to null
                        $jadwalRelatedByBelKe16->save($con);
                    }
                    $this->jadwalsRelatedByBelKe16ScheduledForDeletion = null;
                }
            }

            if ($this->collJadwalsRelatedByBelKe16 !== null) {
                foreach ($this->collJadwalsRelatedByBelKe16 as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->jadwalsRelatedByBelKe17ScheduledForDeletion !== null) {
                if (!$this->jadwalsRelatedByBelKe17ScheduledForDeletion->isEmpty()) {
                    foreach ($this->jadwalsRelatedByBelKe17ScheduledForDeletion as $jadwalRelatedByBelKe17) {
                        // need to save related object because we set the relation to null
                        $jadwalRelatedByBelKe17->save($con);
                    }
                    $this->jadwalsRelatedByBelKe17ScheduledForDeletion = null;
                }
            }

            if ($this->collJadwalsRelatedByBelKe17 !== null) {
                foreach ($this->collJadwalsRelatedByBelKe17 as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->jadwalsRelatedByBelKe18ScheduledForDeletion !== null) {
                if (!$this->jadwalsRelatedByBelKe18ScheduledForDeletion->isEmpty()) {
                    foreach ($this->jadwalsRelatedByBelKe18ScheduledForDeletion as $jadwalRelatedByBelKe18) {
                        // need to save related object because we set the relation to null
                        $jadwalRelatedByBelKe18->save($con);
                    }
                    $this->jadwalsRelatedByBelKe18ScheduledForDeletion = null;
                }
            }

            if ($this->collJadwalsRelatedByBelKe18 !== null) {
                foreach ($this->collJadwalsRelatedByBelKe18 as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->jadwalsRelatedByBelKe19ScheduledForDeletion !== null) {
                if (!$this->jadwalsRelatedByBelKe19ScheduledForDeletion->isEmpty()) {
                    foreach ($this->jadwalsRelatedByBelKe19ScheduledForDeletion as $jadwalRelatedByBelKe19) {
                        // need to save related object because we set the relation to null
                        $jadwalRelatedByBelKe19->save($con);
                    }
                    $this->jadwalsRelatedByBelKe19ScheduledForDeletion = null;
                }
            }

            if ($this->collJadwalsRelatedByBelKe19 !== null) {
                foreach ($this->collJadwalsRelatedByBelKe19 as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->jadwalsRelatedByBelKe20ScheduledForDeletion !== null) {
                if (!$this->jadwalsRelatedByBelKe20ScheduledForDeletion->isEmpty()) {
                    foreach ($this->jadwalsRelatedByBelKe20ScheduledForDeletion as $jadwalRelatedByBelKe20) {
                        // need to save related object because we set the relation to null
                        $jadwalRelatedByBelKe20->save($con);
                    }
                    $this->jadwalsRelatedByBelKe20ScheduledForDeletion = null;
                }
            }

            if ($this->collJadwalsRelatedByBelKe20 !== null) {
                foreach ($this->collJadwalsRelatedByBelKe20 as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->pembelajaransRelatedByPembelajaranIdScheduledForDeletion !== null) {
                if (!$this->pembelajaransRelatedByPembelajaranIdScheduledForDeletion->isEmpty()) {
                    foreach ($this->pembelajaransRelatedByPembelajaranIdScheduledForDeletion as $pembelajaranRelatedByPembelajaranId) {
                        // need to save related object because we set the relation to null
                        $pembelajaranRelatedByPembelajaranId->save($con);
                    }
                    $this->pembelajaransRelatedByPembelajaranIdScheduledForDeletion = null;
                }
            }

            if ($this->collPembelajaransRelatedByPembelajaranId !== null) {
                foreach ($this->collPembelajaransRelatedByPembelajaranId as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->vldPembelajaransScheduledForDeletion !== null) {
                if (!$this->vldPembelajaransScheduledForDeletion->isEmpty()) {
                    VldPembelajaranQuery::create()
                        ->filterByPrimaryKeys($this->vldPembelajaransScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->vldPembelajaransScheduledForDeletion = null;
                }
            }

            if ($this->collVldPembelajarans !== null) {
                foreach ($this->collVldPembelajarans as $referrerFK) {
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
        if ($this->isColumnModified(PembelajaranPeer::PEMBELAJARAN_ID)) {
            $modifiedColumns[':p' . $index++]  = '"pembelajaran_id"';
        }
        if ($this->isColumnModified(PembelajaranPeer::ROMBONGAN_BELAJAR_ID)) {
            $modifiedColumns[':p' . $index++]  = '"rombongan_belajar_id"';
        }
        if ($this->isColumnModified(PembelajaranPeer::SEMESTER_ID)) {
            $modifiedColumns[':p' . $index++]  = '"semester_id"';
        }
        if ($this->isColumnModified(PembelajaranPeer::MATA_PELAJARAN_ID)) {
            $modifiedColumns[':p' . $index++]  = '"mata_pelajaran_id"';
        }
        if ($this->isColumnModified(PembelajaranPeer::PTK_TERDAFTAR_ID)) {
            $modifiedColumns[':p' . $index++]  = '"ptk_terdaftar_id"';
        }
        if ($this->isColumnModified(PembelajaranPeer::SK_MENGAJAR)) {
            $modifiedColumns[':p' . $index++]  = '"sk_mengajar"';
        }
        if ($this->isColumnModified(PembelajaranPeer::TANGGAL_SK_MENGAJAR)) {
            $modifiedColumns[':p' . $index++]  = '"tanggal_sk_mengajar"';
        }
        if ($this->isColumnModified(PembelajaranPeer::JAM_MENGAJAR_PER_MINGGU)) {
            $modifiedColumns[':p' . $index++]  = '"jam_mengajar_per_minggu"';
        }
        if ($this->isColumnModified(PembelajaranPeer::STATUS_DI_KURIKULUM)) {
            $modifiedColumns[':p' . $index++]  = '"status_di_kurikulum"';
        }
        if ($this->isColumnModified(PembelajaranPeer::NAMA_MATA_PELAJARAN)) {
            $modifiedColumns[':p' . $index++]  = '"nama_mata_pelajaran"';
        }
        if ($this->isColumnModified(PembelajaranPeer::INDUK_PEMBELAJARAN_ID)) {
            $modifiedColumns[':p' . $index++]  = '"induk_pembelajaran_id"';
        }
        if ($this->isColumnModified(PembelajaranPeer::CREATE_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"create_date"';
        }
        if ($this->isColumnModified(PembelajaranPeer::LAST_UPDATE)) {
            $modifiedColumns[':p' . $index++]  = '"last_update"';
        }
        if ($this->isColumnModified(PembelajaranPeer::SOFT_DELETE)) {
            $modifiedColumns[':p' . $index++]  = '"soft_delete"';
        }
        if ($this->isColumnModified(PembelajaranPeer::LAST_SYNC)) {
            $modifiedColumns[':p' . $index++]  = '"last_sync"';
        }
        if ($this->isColumnModified(PembelajaranPeer::UPDATER_ID)) {
            $modifiedColumns[':p' . $index++]  = '"updater_id"';
        }

        $sql = sprintf(
            'INSERT INTO "pembelajaran" (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '"pembelajaran_id"':						
                        $stmt->bindValue($identifier, $this->pembelajaran_id, PDO::PARAM_STR);
                        break;
                    case '"rombongan_belajar_id"':						
                        $stmt->bindValue($identifier, $this->rombongan_belajar_id, PDO::PARAM_STR);
                        break;
                    case '"semester_id"':						
                        $stmt->bindValue($identifier, $this->semester_id, PDO::PARAM_STR);
                        break;
                    case '"mata_pelajaran_id"':						
                        $stmt->bindValue($identifier, $this->mata_pelajaran_id, PDO::PARAM_INT);
                        break;
                    case '"ptk_terdaftar_id"':						
                        $stmt->bindValue($identifier, $this->ptk_terdaftar_id, PDO::PARAM_STR);
                        break;
                    case '"sk_mengajar"':						
                        $stmt->bindValue($identifier, $this->sk_mengajar, PDO::PARAM_STR);
                        break;
                    case '"tanggal_sk_mengajar"':						
                        $stmt->bindValue($identifier, $this->tanggal_sk_mengajar, PDO::PARAM_STR);
                        break;
                    case '"jam_mengajar_per_minggu"':						
                        $stmt->bindValue($identifier, $this->jam_mengajar_per_minggu, PDO::PARAM_STR);
                        break;
                    case '"status_di_kurikulum"':						
                        $stmt->bindValue($identifier, $this->status_di_kurikulum, PDO::PARAM_STR);
                        break;
                    case '"nama_mata_pelajaran"':						
                        $stmt->bindValue($identifier, $this->nama_mata_pelajaran, PDO::PARAM_STR);
                        break;
                    case '"induk_pembelajaran_id"':						
                        $stmt->bindValue($identifier, $this->induk_pembelajaran_id, PDO::PARAM_STR);
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

            if ($this->aPembelajaranRelatedByIndukPembelajaranId !== null) {
                if (!$this->aPembelajaranRelatedByIndukPembelajaranId->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aPembelajaranRelatedByIndukPembelajaranId->getValidationFailures());
                }
            }

            if ($this->aPtkTerdaftar !== null) {
                if (!$this->aPtkTerdaftar->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aPtkTerdaftar->getValidationFailures());
                }
            }

            if ($this->aSemester !== null) {
                if (!$this->aSemester->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aSemester->getValidationFailures());
                }
            }

            if ($this->aRombonganBelajar !== null) {
                if (!$this->aRombonganBelajar->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aRombonganBelajar->getValidationFailures());
                }
            }

            if ($this->aMataPelajaran !== null) {
                if (!$this->aMataPelajaran->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aMataPelajaran->getValidationFailures());
                }
            }


            if (($retval = PembelajaranPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collBukuPelajarans !== null) {
                    foreach ($this->collBukuPelajarans as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collJadwalsRelatedByBelKe01 !== null) {
                    foreach ($this->collJadwalsRelatedByBelKe01 as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collJadwalsRelatedByBelKe02 !== null) {
                    foreach ($this->collJadwalsRelatedByBelKe02 as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collJadwalsRelatedByBelKe03 !== null) {
                    foreach ($this->collJadwalsRelatedByBelKe03 as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collJadwalsRelatedByBelKe04 !== null) {
                    foreach ($this->collJadwalsRelatedByBelKe04 as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collJadwalsRelatedByBelKe05 !== null) {
                    foreach ($this->collJadwalsRelatedByBelKe05 as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collJadwalsRelatedByBelKe06 !== null) {
                    foreach ($this->collJadwalsRelatedByBelKe06 as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collJadwalsRelatedByBelKe07 !== null) {
                    foreach ($this->collJadwalsRelatedByBelKe07 as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collJadwalsRelatedByBelKe08 !== null) {
                    foreach ($this->collJadwalsRelatedByBelKe08 as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collJadwalsRelatedByBelKe09 !== null) {
                    foreach ($this->collJadwalsRelatedByBelKe09 as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collJadwalsRelatedByBelKe10 !== null) {
                    foreach ($this->collJadwalsRelatedByBelKe10 as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collJadwalsRelatedByBelKe11 !== null) {
                    foreach ($this->collJadwalsRelatedByBelKe11 as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collJadwalsRelatedByBelKe12 !== null) {
                    foreach ($this->collJadwalsRelatedByBelKe12 as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collJadwalsRelatedByBelKe13 !== null) {
                    foreach ($this->collJadwalsRelatedByBelKe13 as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collJadwalsRelatedByBelKe14 !== null) {
                    foreach ($this->collJadwalsRelatedByBelKe14 as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collJadwalsRelatedByBelKe15 !== null) {
                    foreach ($this->collJadwalsRelatedByBelKe15 as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collJadwalsRelatedByBelKe16 !== null) {
                    foreach ($this->collJadwalsRelatedByBelKe16 as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collJadwalsRelatedByBelKe17 !== null) {
                    foreach ($this->collJadwalsRelatedByBelKe17 as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collJadwalsRelatedByBelKe18 !== null) {
                    foreach ($this->collJadwalsRelatedByBelKe18 as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collJadwalsRelatedByBelKe19 !== null) {
                    foreach ($this->collJadwalsRelatedByBelKe19 as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collJadwalsRelatedByBelKe20 !== null) {
                    foreach ($this->collJadwalsRelatedByBelKe20 as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collPembelajaransRelatedByPembelajaranId !== null) {
                    foreach ($this->collPembelajaransRelatedByPembelajaranId as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collVldPembelajarans !== null) {
                    foreach ($this->collVldPembelajarans as $referrerFK) {
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
        $pos = PembelajaranPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getPembelajaranId();
                break;
            case 1:
                return $this->getRombonganBelajarId();
                break;
            case 2:
                return $this->getSemesterId();
                break;
            case 3:
                return $this->getMataPelajaranId();
                break;
            case 4:
                return $this->getPtkTerdaftarId();
                break;
            case 5:
                return $this->getSkMengajar();
                break;
            case 6:
                return $this->getTanggalSkMengajar();
                break;
            case 7:
                return $this->getJamMengajarPerMinggu();
                break;
            case 8:
                return $this->getStatusDiKurikulum();
                break;
            case 9:
                return $this->getNamaMataPelajaran();
                break;
            case 10:
                return $this->getIndukPembelajaranId();
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
        if (isset($alreadyDumpedObjects['Pembelajaran'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Pembelajaran'][$this->getPrimaryKey()] = true;
        $keys = PembelajaranPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getPembelajaranId(),
            $keys[1] => $this->getRombonganBelajarId(),
            $keys[2] => $this->getSemesterId(),
            $keys[3] => $this->getMataPelajaranId(),
            $keys[4] => $this->getPtkTerdaftarId(),
            $keys[5] => $this->getSkMengajar(),
            $keys[6] => $this->getTanggalSkMengajar(),
            $keys[7] => $this->getJamMengajarPerMinggu(),
            $keys[8] => $this->getStatusDiKurikulum(),
            $keys[9] => $this->getNamaMataPelajaran(),
            $keys[10] => $this->getIndukPembelajaranId(),
            $keys[11] => $this->getCreateDate(),
            $keys[12] => $this->getLastUpdate(),
            $keys[13] => $this->getSoftDelete(),
            $keys[14] => $this->getLastSync(),
            $keys[15] => $this->getUpdaterId(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aPembelajaranRelatedByIndukPembelajaranId) {
                $result['PembelajaranRelatedByIndukPembelajaranId'] = $this->aPembelajaranRelatedByIndukPembelajaranId->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aPtkTerdaftar) {
                $result['PtkTerdaftar'] = $this->aPtkTerdaftar->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aSemester) {
                $result['Semester'] = $this->aSemester->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aRombonganBelajar) {
                $result['RombonganBelajar'] = $this->aRombonganBelajar->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aMataPelajaran) {
                $result['MataPelajaran'] = $this->aMataPelajaran->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collBukuPelajarans) {
                $result['BukuPelajarans'] = $this->collBukuPelajarans->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collJadwalsRelatedByBelKe01) {
                $result['JadwalsRelatedByBelKe01'] = $this->collJadwalsRelatedByBelKe01->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collJadwalsRelatedByBelKe02) {
                $result['JadwalsRelatedByBelKe02'] = $this->collJadwalsRelatedByBelKe02->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collJadwalsRelatedByBelKe03) {
                $result['JadwalsRelatedByBelKe03'] = $this->collJadwalsRelatedByBelKe03->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collJadwalsRelatedByBelKe04) {
                $result['JadwalsRelatedByBelKe04'] = $this->collJadwalsRelatedByBelKe04->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collJadwalsRelatedByBelKe05) {
                $result['JadwalsRelatedByBelKe05'] = $this->collJadwalsRelatedByBelKe05->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collJadwalsRelatedByBelKe06) {
                $result['JadwalsRelatedByBelKe06'] = $this->collJadwalsRelatedByBelKe06->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collJadwalsRelatedByBelKe07) {
                $result['JadwalsRelatedByBelKe07'] = $this->collJadwalsRelatedByBelKe07->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collJadwalsRelatedByBelKe08) {
                $result['JadwalsRelatedByBelKe08'] = $this->collJadwalsRelatedByBelKe08->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collJadwalsRelatedByBelKe09) {
                $result['JadwalsRelatedByBelKe09'] = $this->collJadwalsRelatedByBelKe09->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collJadwalsRelatedByBelKe10) {
                $result['JadwalsRelatedByBelKe10'] = $this->collJadwalsRelatedByBelKe10->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collJadwalsRelatedByBelKe11) {
                $result['JadwalsRelatedByBelKe11'] = $this->collJadwalsRelatedByBelKe11->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collJadwalsRelatedByBelKe12) {
                $result['JadwalsRelatedByBelKe12'] = $this->collJadwalsRelatedByBelKe12->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collJadwalsRelatedByBelKe13) {
                $result['JadwalsRelatedByBelKe13'] = $this->collJadwalsRelatedByBelKe13->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collJadwalsRelatedByBelKe14) {
                $result['JadwalsRelatedByBelKe14'] = $this->collJadwalsRelatedByBelKe14->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collJadwalsRelatedByBelKe15) {
                $result['JadwalsRelatedByBelKe15'] = $this->collJadwalsRelatedByBelKe15->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collJadwalsRelatedByBelKe16) {
                $result['JadwalsRelatedByBelKe16'] = $this->collJadwalsRelatedByBelKe16->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collJadwalsRelatedByBelKe17) {
                $result['JadwalsRelatedByBelKe17'] = $this->collJadwalsRelatedByBelKe17->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collJadwalsRelatedByBelKe18) {
                $result['JadwalsRelatedByBelKe18'] = $this->collJadwalsRelatedByBelKe18->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collJadwalsRelatedByBelKe19) {
                $result['JadwalsRelatedByBelKe19'] = $this->collJadwalsRelatedByBelKe19->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collJadwalsRelatedByBelKe20) {
                $result['JadwalsRelatedByBelKe20'] = $this->collJadwalsRelatedByBelKe20->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collPembelajaransRelatedByPembelajaranId) {
                $result['PembelajaransRelatedByPembelajaranId'] = $this->collPembelajaransRelatedByPembelajaranId->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collVldPembelajarans) {
                $result['VldPembelajarans'] = $this->collVldPembelajarans->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = PembelajaranPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setPembelajaranId($value);
                break;
            case 1:
                $this->setRombonganBelajarId($value);
                break;
            case 2:
                $this->setSemesterId($value);
                break;
            case 3:
                $this->setMataPelajaranId($value);
                break;
            case 4:
                $this->setPtkTerdaftarId($value);
                break;
            case 5:
                $this->setSkMengajar($value);
                break;
            case 6:
                $this->setTanggalSkMengajar($value);
                break;
            case 7:
                $this->setJamMengajarPerMinggu($value);
                break;
            case 8:
                $this->setStatusDiKurikulum($value);
                break;
            case 9:
                $this->setNamaMataPelajaran($value);
                break;
            case 10:
                $this->setIndukPembelajaranId($value);
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
        $keys = PembelajaranPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setPembelajaranId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setRombonganBelajarId($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setSemesterId($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setMataPelajaranId($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setPtkTerdaftarId($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setSkMengajar($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setTanggalSkMengajar($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setJamMengajarPerMinggu($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setStatusDiKurikulum($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setNamaMataPelajaran($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setIndukPembelajaranId($arr[$keys[10]]);
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
        $criteria = new Criteria(PembelajaranPeer::DATABASE_NAME);

        if ($this->isColumnModified(PembelajaranPeer::PEMBELAJARAN_ID)) $criteria->add(PembelajaranPeer::PEMBELAJARAN_ID, $this->pembelajaran_id);
        if ($this->isColumnModified(PembelajaranPeer::ROMBONGAN_BELAJAR_ID)) $criteria->add(PembelajaranPeer::ROMBONGAN_BELAJAR_ID, $this->rombongan_belajar_id);
        if ($this->isColumnModified(PembelajaranPeer::SEMESTER_ID)) $criteria->add(PembelajaranPeer::SEMESTER_ID, $this->semester_id);
        if ($this->isColumnModified(PembelajaranPeer::MATA_PELAJARAN_ID)) $criteria->add(PembelajaranPeer::MATA_PELAJARAN_ID, $this->mata_pelajaran_id);
        if ($this->isColumnModified(PembelajaranPeer::PTK_TERDAFTAR_ID)) $criteria->add(PembelajaranPeer::PTK_TERDAFTAR_ID, $this->ptk_terdaftar_id);
        if ($this->isColumnModified(PembelajaranPeer::SK_MENGAJAR)) $criteria->add(PembelajaranPeer::SK_MENGAJAR, $this->sk_mengajar);
        if ($this->isColumnModified(PembelajaranPeer::TANGGAL_SK_MENGAJAR)) $criteria->add(PembelajaranPeer::TANGGAL_SK_MENGAJAR, $this->tanggal_sk_mengajar);
        if ($this->isColumnModified(PembelajaranPeer::JAM_MENGAJAR_PER_MINGGU)) $criteria->add(PembelajaranPeer::JAM_MENGAJAR_PER_MINGGU, $this->jam_mengajar_per_minggu);
        if ($this->isColumnModified(PembelajaranPeer::STATUS_DI_KURIKULUM)) $criteria->add(PembelajaranPeer::STATUS_DI_KURIKULUM, $this->status_di_kurikulum);
        if ($this->isColumnModified(PembelajaranPeer::NAMA_MATA_PELAJARAN)) $criteria->add(PembelajaranPeer::NAMA_MATA_PELAJARAN, $this->nama_mata_pelajaran);
        if ($this->isColumnModified(PembelajaranPeer::INDUK_PEMBELAJARAN_ID)) $criteria->add(PembelajaranPeer::INDUK_PEMBELAJARAN_ID, $this->induk_pembelajaran_id);
        if ($this->isColumnModified(PembelajaranPeer::CREATE_DATE)) $criteria->add(PembelajaranPeer::CREATE_DATE, $this->create_date);
        if ($this->isColumnModified(PembelajaranPeer::LAST_UPDATE)) $criteria->add(PembelajaranPeer::LAST_UPDATE, $this->last_update);
        if ($this->isColumnModified(PembelajaranPeer::SOFT_DELETE)) $criteria->add(PembelajaranPeer::SOFT_DELETE, $this->soft_delete);
        if ($this->isColumnModified(PembelajaranPeer::LAST_SYNC)) $criteria->add(PembelajaranPeer::LAST_SYNC, $this->last_sync);
        if ($this->isColumnModified(PembelajaranPeer::UPDATER_ID)) $criteria->add(PembelajaranPeer::UPDATER_ID, $this->updater_id);

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
        $criteria = new Criteria(PembelajaranPeer::DATABASE_NAME);
        $criteria->add(PembelajaranPeer::PEMBELAJARAN_ID, $this->pembelajaran_id);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return string
     */
    public function getPrimaryKey()
    {
        return $this->getPembelajaranId();
    }

    /**
     * Generic method to set the primary key (pembelajaran_id column).
     *
     * @param  string $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setPembelajaranId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getPembelajaranId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of Pembelajaran (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setRombonganBelajarId($this->getRombonganBelajarId());
        $copyObj->setSemesterId($this->getSemesterId());
        $copyObj->setMataPelajaranId($this->getMataPelajaranId());
        $copyObj->setPtkTerdaftarId($this->getPtkTerdaftarId());
        $copyObj->setSkMengajar($this->getSkMengajar());
        $copyObj->setTanggalSkMengajar($this->getTanggalSkMengajar());
        $copyObj->setJamMengajarPerMinggu($this->getJamMengajarPerMinggu());
        $copyObj->setStatusDiKurikulum($this->getStatusDiKurikulum());
        $copyObj->setNamaMataPelajaran($this->getNamaMataPelajaran());
        $copyObj->setIndukPembelajaranId($this->getIndukPembelajaranId());
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

            foreach ($this->getBukuPelajarans() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addBukuPelajaran($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getJadwalsRelatedByBelKe01() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addJadwalRelatedByBelKe01($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getJadwalsRelatedByBelKe02() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addJadwalRelatedByBelKe02($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getJadwalsRelatedByBelKe03() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addJadwalRelatedByBelKe03($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getJadwalsRelatedByBelKe04() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addJadwalRelatedByBelKe04($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getJadwalsRelatedByBelKe05() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addJadwalRelatedByBelKe05($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getJadwalsRelatedByBelKe06() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addJadwalRelatedByBelKe06($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getJadwalsRelatedByBelKe07() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addJadwalRelatedByBelKe07($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getJadwalsRelatedByBelKe08() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addJadwalRelatedByBelKe08($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getJadwalsRelatedByBelKe09() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addJadwalRelatedByBelKe09($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getJadwalsRelatedByBelKe10() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addJadwalRelatedByBelKe10($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getJadwalsRelatedByBelKe11() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addJadwalRelatedByBelKe11($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getJadwalsRelatedByBelKe12() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addJadwalRelatedByBelKe12($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getJadwalsRelatedByBelKe13() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addJadwalRelatedByBelKe13($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getJadwalsRelatedByBelKe14() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addJadwalRelatedByBelKe14($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getJadwalsRelatedByBelKe15() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addJadwalRelatedByBelKe15($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getJadwalsRelatedByBelKe16() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addJadwalRelatedByBelKe16($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getJadwalsRelatedByBelKe17() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addJadwalRelatedByBelKe17($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getJadwalsRelatedByBelKe18() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addJadwalRelatedByBelKe18($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getJadwalsRelatedByBelKe19() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addJadwalRelatedByBelKe19($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getJadwalsRelatedByBelKe20() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addJadwalRelatedByBelKe20($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getPembelajaransRelatedByPembelajaranId() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPembelajaranRelatedByPembelajaranId($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getVldPembelajarans() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addVldPembelajaran($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setPembelajaranId(NULL); // this is a auto-increment column, so set to default value
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
     * @return Pembelajaran Clone of current object.
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
     * @return PembelajaranPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new PembelajaranPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Pembelajaran object.
     *
     * @param             Pembelajaran $v
     * @return Pembelajaran The current object (for fluent API support)
     * @throws PropelException
     */
    public function setPembelajaranRelatedByIndukPembelajaranId(Pembelajaran $v = null)
    {
        if ($v === null) {
            $this->setIndukPembelajaranId(NULL);
        } else {
            $this->setIndukPembelajaranId($v->getPembelajaranId());
        }

        $this->aPembelajaranRelatedByIndukPembelajaranId = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Pembelajaran object, it will not be re-added.
        if ($v !== null) {
            $v->addPembelajaranRelatedByPembelajaranId($this);
        }


        return $this;
    }


    /**
     * Get the associated Pembelajaran object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Pembelajaran The associated Pembelajaran object.
     * @throws PropelException
     */
    public function getPembelajaranRelatedByIndukPembelajaranId(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aPembelajaranRelatedByIndukPembelajaranId === null && (($this->induk_pembelajaran_id !== "" && $this->induk_pembelajaran_id !== null)) && $doQuery) {
            $this->aPembelajaranRelatedByIndukPembelajaranId = PembelajaranQuery::create()->findPk($this->induk_pembelajaran_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aPembelajaranRelatedByIndukPembelajaranId->addPembelajaransRelatedByPembelajaranId($this);
             */
        }

        return $this->aPembelajaranRelatedByIndukPembelajaranId;
    }

    /**
     * Declares an association between this object and a PtkTerdaftar object.
     *
     * @param             PtkTerdaftar $v
     * @return Pembelajaran The current object (for fluent API support)
     * @throws PropelException
     */
    public function setPtkTerdaftar(PtkTerdaftar $v = null)
    {
        if ($v === null) {
            $this->setPtkTerdaftarId(NULL);
        } else {
            $this->setPtkTerdaftarId($v->getPtkTerdaftarId());
        }

        $this->aPtkTerdaftar = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the PtkTerdaftar object, it will not be re-added.
        if ($v !== null) {
            $v->addPembelajaran($this);
        }


        return $this;
    }


    /**
     * Get the associated PtkTerdaftar object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return PtkTerdaftar The associated PtkTerdaftar object.
     * @throws PropelException
     */
    public function getPtkTerdaftar(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aPtkTerdaftar === null && (($this->ptk_terdaftar_id !== "" && $this->ptk_terdaftar_id !== null)) && $doQuery) {
            $this->aPtkTerdaftar = PtkTerdaftarQuery::create()->findPk($this->ptk_terdaftar_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aPtkTerdaftar->addPembelajarans($this);
             */
        }

        return $this->aPtkTerdaftar;
    }

    /**
     * Declares an association between this object and a Semester object.
     *
     * @param             Semester $v
     * @return Pembelajaran The current object (for fluent API support)
     * @throws PropelException
     */
    public function setSemester(Semester $v = null)
    {
        if ($v === null) {
            $this->setSemesterId(NULL);
        } else {
            $this->setSemesterId($v->getSemesterId());
        }

        $this->aSemester = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Semester object, it will not be re-added.
        if ($v !== null) {
            $v->addPembelajaran($this);
        }


        return $this;
    }


    /**
     * Get the associated Semester object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Semester The associated Semester object.
     * @throws PropelException
     */
    public function getSemester(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aSemester === null && (($this->semester_id !== "" && $this->semester_id !== null)) && $doQuery) {
            $this->aSemester = SemesterQuery::create()->findPk($this->semester_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aSemester->addPembelajarans($this);
             */
        }

        return $this->aSemester;
    }

    /**
     * Declares an association between this object and a RombonganBelajar object.
     *
     * @param             RombonganBelajar $v
     * @return Pembelajaran The current object (for fluent API support)
     * @throws PropelException
     */
    public function setRombonganBelajar(RombonganBelajar $v = null)
    {
        if ($v === null) {
            $this->setRombonganBelajarId(NULL);
        } else {
            $this->setRombonganBelajarId($v->getRombonganBelajarId());
        }

        $this->aRombonganBelajar = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the RombonganBelajar object, it will not be re-added.
        if ($v !== null) {
            $v->addPembelajaran($this);
        }


        return $this;
    }


    /**
     * Get the associated RombonganBelajar object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return RombonganBelajar The associated RombonganBelajar object.
     * @throws PropelException
     */
    public function getRombonganBelajar(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aRombonganBelajar === null && (($this->rombongan_belajar_id !== "" && $this->rombongan_belajar_id !== null)) && $doQuery) {
            $this->aRombonganBelajar = RombonganBelajarQuery::create()->findPk($this->rombongan_belajar_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aRombonganBelajar->addPembelajarans($this);
             */
        }

        return $this->aRombonganBelajar;
    }

    /**
     * Declares an association between this object and a MataPelajaran object.
     *
     * @param             MataPelajaran $v
     * @return Pembelajaran The current object (for fluent API support)
     * @throws PropelException
     */
    public function setMataPelajaran(MataPelajaran $v = null)
    {
        if ($v === null) {
            $this->setMataPelajaranId(NULL);
        } else {
            $this->setMataPelajaranId($v->getMataPelajaranId());
        }

        $this->aMataPelajaran = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the MataPelajaran object, it will not be re-added.
        if ($v !== null) {
            $v->addPembelajaran($this);
        }


        return $this;
    }


    /**
     * Get the associated MataPelajaran object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return MataPelajaran The associated MataPelajaran object.
     * @throws PropelException
     */
    public function getMataPelajaran(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aMataPelajaran === null && ($this->mata_pelajaran_id !== null) && $doQuery) {
            $this->aMataPelajaran = MataPelajaranQuery::create()->findPk($this->mata_pelajaran_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aMataPelajaran->addPembelajarans($this);
             */
        }

        return $this->aMataPelajaran;
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
        if ('BukuPelajaran' == $relationName) {
            $this->initBukuPelajarans();
        }
        if ('JadwalRelatedByBelKe01' == $relationName) {
            $this->initJadwalsRelatedByBelKe01();
        }
        if ('JadwalRelatedByBelKe02' == $relationName) {
            $this->initJadwalsRelatedByBelKe02();
        }
        if ('JadwalRelatedByBelKe03' == $relationName) {
            $this->initJadwalsRelatedByBelKe03();
        }
        if ('JadwalRelatedByBelKe04' == $relationName) {
            $this->initJadwalsRelatedByBelKe04();
        }
        if ('JadwalRelatedByBelKe05' == $relationName) {
            $this->initJadwalsRelatedByBelKe05();
        }
        if ('JadwalRelatedByBelKe06' == $relationName) {
            $this->initJadwalsRelatedByBelKe06();
        }
        if ('JadwalRelatedByBelKe07' == $relationName) {
            $this->initJadwalsRelatedByBelKe07();
        }
        if ('JadwalRelatedByBelKe08' == $relationName) {
            $this->initJadwalsRelatedByBelKe08();
        }
        if ('JadwalRelatedByBelKe09' == $relationName) {
            $this->initJadwalsRelatedByBelKe09();
        }
        if ('JadwalRelatedByBelKe10' == $relationName) {
            $this->initJadwalsRelatedByBelKe10();
        }
        if ('JadwalRelatedByBelKe11' == $relationName) {
            $this->initJadwalsRelatedByBelKe11();
        }
        if ('JadwalRelatedByBelKe12' == $relationName) {
            $this->initJadwalsRelatedByBelKe12();
        }
        if ('JadwalRelatedByBelKe13' == $relationName) {
            $this->initJadwalsRelatedByBelKe13();
        }
        if ('JadwalRelatedByBelKe14' == $relationName) {
            $this->initJadwalsRelatedByBelKe14();
        }
        if ('JadwalRelatedByBelKe15' == $relationName) {
            $this->initJadwalsRelatedByBelKe15();
        }
        if ('JadwalRelatedByBelKe16' == $relationName) {
            $this->initJadwalsRelatedByBelKe16();
        }
        if ('JadwalRelatedByBelKe17' == $relationName) {
            $this->initJadwalsRelatedByBelKe17();
        }
        if ('JadwalRelatedByBelKe18' == $relationName) {
            $this->initJadwalsRelatedByBelKe18();
        }
        if ('JadwalRelatedByBelKe19' == $relationName) {
            $this->initJadwalsRelatedByBelKe19();
        }
        if ('JadwalRelatedByBelKe20' == $relationName) {
            $this->initJadwalsRelatedByBelKe20();
        }
        if ('PembelajaranRelatedByPembelajaranId' == $relationName) {
            $this->initPembelajaransRelatedByPembelajaranId();
        }
        if ('VldPembelajaran' == $relationName) {
            $this->initVldPembelajarans();
        }
    }

    /**
     * Clears out the collBukuPelajarans collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Pembelajaran The current object (for fluent API support)
     * @see        addBukuPelajarans()
     */
    public function clearBukuPelajarans()
    {
        $this->collBukuPelajarans = null; // important to set this to null since that means it is uninitialized
        $this->collBukuPelajaransPartial = null;

        return $this;
    }

    /**
     * reset is the collBukuPelajarans collection loaded partially
     *
     * @return void
     */
    public function resetPartialBukuPelajarans($v = true)
    {
        $this->collBukuPelajaransPartial = $v;
    }

    /**
     * Initializes the collBukuPelajarans collection.
     *
     * By default this just sets the collBukuPelajarans collection to an empty array (like clearcollBukuPelajarans());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initBukuPelajarans($overrideExisting = true)
    {
        if (null !== $this->collBukuPelajarans && !$overrideExisting) {
            return;
        }
        $this->collBukuPelajarans = new PropelObjectCollection();
        $this->collBukuPelajarans->setModel('BukuPelajaran');
    }

    /**
     * Gets an array of BukuPelajaran objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Pembelajaran is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|BukuPelajaran[] List of BukuPelajaran objects
     * @throws PropelException
     */
    public function getBukuPelajarans($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collBukuPelajaransPartial && !$this->isNew();
        if (null === $this->collBukuPelajarans || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collBukuPelajarans) {
                // return empty collection
                $this->initBukuPelajarans();
            } else {
                $collBukuPelajarans = BukuPelajaranQuery::create(null, $criteria)
                    ->filterByPembelajaran($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collBukuPelajaransPartial && count($collBukuPelajarans)) {
                      $this->initBukuPelajarans(false);

                      foreach($collBukuPelajarans as $obj) {
                        if (false == $this->collBukuPelajarans->contains($obj)) {
                          $this->collBukuPelajarans->append($obj);
                        }
                      }

                      $this->collBukuPelajaransPartial = true;
                    }

                    $collBukuPelajarans->getInternalIterator()->rewind();
                    return $collBukuPelajarans;
                }

                if($partial && $this->collBukuPelajarans) {
                    foreach($this->collBukuPelajarans as $obj) {
                        if($obj->isNew()) {
                            $collBukuPelajarans[] = $obj;
                        }
                    }
                }

                $this->collBukuPelajarans = $collBukuPelajarans;
                $this->collBukuPelajaransPartial = false;
            }
        }

        return $this->collBukuPelajarans;
    }

    /**
     * Sets a collection of BukuPelajaran objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $bukuPelajarans A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Pembelajaran The current object (for fluent API support)
     */
    public function setBukuPelajarans(PropelCollection $bukuPelajarans, PropelPDO $con = null)
    {
        $bukuPelajaransToDelete = $this->getBukuPelajarans(new Criteria(), $con)->diff($bukuPelajarans);

        $this->bukuPelajaransScheduledForDeletion = unserialize(serialize($bukuPelajaransToDelete));

        foreach ($bukuPelajaransToDelete as $bukuPelajaranRemoved) {
            $bukuPelajaranRemoved->setPembelajaran(null);
        }

        $this->collBukuPelajarans = null;
        foreach ($bukuPelajarans as $bukuPelajaran) {
            $this->addBukuPelajaran($bukuPelajaran);
        }

        $this->collBukuPelajarans = $bukuPelajarans;
        $this->collBukuPelajaransPartial = false;

        return $this;
    }

    /**
     * Returns the number of related BukuPelajaran objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related BukuPelajaran objects.
     * @throws PropelException
     */
    public function countBukuPelajarans(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collBukuPelajaransPartial && !$this->isNew();
        if (null === $this->collBukuPelajarans || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collBukuPelajarans) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getBukuPelajarans());
            }
            $query = BukuPelajaranQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPembelajaran($this)
                ->count($con);
        }

        return count($this->collBukuPelajarans);
    }

    /**
     * Method called to associate a BukuPelajaran object to this object
     * through the BukuPelajaran foreign key attribute.
     *
     * @param    BukuPelajaran $l BukuPelajaran
     * @return Pembelajaran The current object (for fluent API support)
     */
    public function addBukuPelajaran(BukuPelajaran $l)
    {
        if ($this->collBukuPelajarans === null) {
            $this->initBukuPelajarans();
            $this->collBukuPelajaransPartial = true;
        }
        if (!in_array($l, $this->collBukuPelajarans->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddBukuPelajaran($l);
        }

        return $this;
    }

    /**
     * @param	BukuPelajaran $bukuPelajaran The bukuPelajaran object to add.
     */
    protected function doAddBukuPelajaran($bukuPelajaran)
    {
        $this->collBukuPelajarans[]= $bukuPelajaran;
        $bukuPelajaran->setPembelajaran($this);
    }

    /**
     * @param	BukuPelajaran $bukuPelajaran The bukuPelajaran object to remove.
     * @return Pembelajaran The current object (for fluent API support)
     */
    public function removeBukuPelajaran($bukuPelajaran)
    {
        if ($this->getBukuPelajarans()->contains($bukuPelajaran)) {
            $this->collBukuPelajarans->remove($this->collBukuPelajarans->search($bukuPelajaran));
            if (null === $this->bukuPelajaransScheduledForDeletion) {
                $this->bukuPelajaransScheduledForDeletion = clone $this->collBukuPelajarans;
                $this->bukuPelajaransScheduledForDeletion->clear();
            }
            $this->bukuPelajaransScheduledForDeletion[]= clone $bukuPelajaran;
            $bukuPelajaran->setPembelajaran(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pembelajaran is new, it will return
     * an empty collection; or if this Pembelajaran has previously
     * been saved, it will retrieve related BukuPelajarans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pembelajaran.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|BukuPelajaran[] List of BukuPelajaran objects
     */
    public function getBukuPelajaransJoinBiblio($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = BukuPelajaranQuery::create(null, $criteria);
        $query->joinWith('Biblio', $join_behavior);

        return $this->getBukuPelajarans($query, $con);
    }

    /**
     * Clears out the collJadwalsRelatedByBelKe01 collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Pembelajaran The current object (for fluent API support)
     * @see        addJadwalsRelatedByBelKe01()
     */
    public function clearJadwalsRelatedByBelKe01()
    {
        $this->collJadwalsRelatedByBelKe01 = null; // important to set this to null since that means it is uninitialized
        $this->collJadwalsRelatedByBelKe01Partial = null;

        return $this;
    }

    /**
     * reset is the collJadwalsRelatedByBelKe01 collection loaded partially
     *
     * @return void
     */
    public function resetPartialJadwalsRelatedByBelKe01($v = true)
    {
        $this->collJadwalsRelatedByBelKe01Partial = $v;
    }

    /**
     * Initializes the collJadwalsRelatedByBelKe01 collection.
     *
     * By default this just sets the collJadwalsRelatedByBelKe01 collection to an empty array (like clearcollJadwalsRelatedByBelKe01());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initJadwalsRelatedByBelKe01($overrideExisting = true)
    {
        if (null !== $this->collJadwalsRelatedByBelKe01 && !$overrideExisting) {
            return;
        }
        $this->collJadwalsRelatedByBelKe01 = new PropelObjectCollection();
        $this->collJadwalsRelatedByBelKe01->setModel('Jadwal');
    }

    /**
     * Gets an array of Jadwal objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Pembelajaran is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Jadwal[] List of Jadwal objects
     * @throws PropelException
     */
    public function getJadwalsRelatedByBelKe01($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collJadwalsRelatedByBelKe01Partial && !$this->isNew();
        if (null === $this->collJadwalsRelatedByBelKe01 || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collJadwalsRelatedByBelKe01) {
                // return empty collection
                $this->initJadwalsRelatedByBelKe01();
            } else {
                $collJadwalsRelatedByBelKe01 = JadwalQuery::create(null, $criteria)
                    ->filterByPembelajaranRelatedByBelKe01($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collJadwalsRelatedByBelKe01Partial && count($collJadwalsRelatedByBelKe01)) {
                      $this->initJadwalsRelatedByBelKe01(false);

                      foreach($collJadwalsRelatedByBelKe01 as $obj) {
                        if (false == $this->collJadwalsRelatedByBelKe01->contains($obj)) {
                          $this->collJadwalsRelatedByBelKe01->append($obj);
                        }
                      }

                      $this->collJadwalsRelatedByBelKe01Partial = true;
                    }

                    $collJadwalsRelatedByBelKe01->getInternalIterator()->rewind();
                    return $collJadwalsRelatedByBelKe01;
                }

                if($partial && $this->collJadwalsRelatedByBelKe01) {
                    foreach($this->collJadwalsRelatedByBelKe01 as $obj) {
                        if($obj->isNew()) {
                            $collJadwalsRelatedByBelKe01[] = $obj;
                        }
                    }
                }

                $this->collJadwalsRelatedByBelKe01 = $collJadwalsRelatedByBelKe01;
                $this->collJadwalsRelatedByBelKe01Partial = false;
            }
        }

        return $this->collJadwalsRelatedByBelKe01;
    }

    /**
     * Sets a collection of JadwalRelatedByBelKe01 objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $jadwalsRelatedByBelKe01 A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Pembelajaran The current object (for fluent API support)
     */
    public function setJadwalsRelatedByBelKe01(PropelCollection $jadwalsRelatedByBelKe01, PropelPDO $con = null)
    {
        $jadwalsRelatedByBelKe01ToDelete = $this->getJadwalsRelatedByBelKe01(new Criteria(), $con)->diff($jadwalsRelatedByBelKe01);

        $this->jadwalsRelatedByBelKe01ScheduledForDeletion = unserialize(serialize($jadwalsRelatedByBelKe01ToDelete));

        foreach ($jadwalsRelatedByBelKe01ToDelete as $jadwalRelatedByBelKe01Removed) {
            $jadwalRelatedByBelKe01Removed->setPembelajaranRelatedByBelKe01(null);
        }

        $this->collJadwalsRelatedByBelKe01 = null;
        foreach ($jadwalsRelatedByBelKe01 as $jadwalRelatedByBelKe01) {
            $this->addJadwalRelatedByBelKe01($jadwalRelatedByBelKe01);
        }

        $this->collJadwalsRelatedByBelKe01 = $jadwalsRelatedByBelKe01;
        $this->collJadwalsRelatedByBelKe01Partial = false;

        return $this;
    }

    /**
     * Returns the number of related Jadwal objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Jadwal objects.
     * @throws PropelException
     */
    public function countJadwalsRelatedByBelKe01(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collJadwalsRelatedByBelKe01Partial && !$this->isNew();
        if (null === $this->collJadwalsRelatedByBelKe01 || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collJadwalsRelatedByBelKe01) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getJadwalsRelatedByBelKe01());
            }
            $query = JadwalQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPembelajaranRelatedByBelKe01($this)
                ->count($con);
        }

        return count($this->collJadwalsRelatedByBelKe01);
    }

    /**
     * Method called to associate a Jadwal object to this object
     * through the Jadwal foreign key attribute.
     *
     * @param    Jadwal $l Jadwal
     * @return Pembelajaran The current object (for fluent API support)
     */
    public function addJadwalRelatedByBelKe01(Jadwal $l)
    {
        if ($this->collJadwalsRelatedByBelKe01 === null) {
            $this->initJadwalsRelatedByBelKe01();
            $this->collJadwalsRelatedByBelKe01Partial = true;
        }
        if (!in_array($l, $this->collJadwalsRelatedByBelKe01->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddJadwalRelatedByBelKe01($l);
        }

        return $this;
    }

    /**
     * @param	JadwalRelatedByBelKe01 $jadwalRelatedByBelKe01 The jadwalRelatedByBelKe01 object to add.
     */
    protected function doAddJadwalRelatedByBelKe01($jadwalRelatedByBelKe01)
    {
        $this->collJadwalsRelatedByBelKe01[]= $jadwalRelatedByBelKe01;
        $jadwalRelatedByBelKe01->setPembelajaranRelatedByBelKe01($this);
    }

    /**
     * @param	JadwalRelatedByBelKe01 $jadwalRelatedByBelKe01 The jadwalRelatedByBelKe01 object to remove.
     * @return Pembelajaran The current object (for fluent API support)
     */
    public function removeJadwalRelatedByBelKe01($jadwalRelatedByBelKe01)
    {
        if ($this->getJadwalsRelatedByBelKe01()->contains($jadwalRelatedByBelKe01)) {
            $this->collJadwalsRelatedByBelKe01->remove($this->collJadwalsRelatedByBelKe01->search($jadwalRelatedByBelKe01));
            if (null === $this->jadwalsRelatedByBelKe01ScheduledForDeletion) {
                $this->jadwalsRelatedByBelKe01ScheduledForDeletion = clone $this->collJadwalsRelatedByBelKe01;
                $this->jadwalsRelatedByBelKe01ScheduledForDeletion->clear();
            }
            $this->jadwalsRelatedByBelKe01ScheduledForDeletion[]= $jadwalRelatedByBelKe01;
            $jadwalRelatedByBelKe01->setPembelajaranRelatedByBelKe01(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pembelajaran is new, it will return
     * an empty collection; or if this Pembelajaran has previously
     * been saved, it will retrieve related JadwalsRelatedByBelKe01 from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pembelajaran.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Jadwal[] List of Jadwal objects
     */
    public function getJadwalsRelatedByBelKe01JoinRuang($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = JadwalQuery::create(null, $criteria);
        $query->joinWith('Ruang', $join_behavior);

        return $this->getJadwalsRelatedByBelKe01($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pembelajaran is new, it will return
     * an empty collection; or if this Pembelajaran has previously
     * been saved, it will retrieve related JadwalsRelatedByBelKe01 from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pembelajaran.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Jadwal[] List of Jadwal objects
     */
    public function getJadwalsRelatedByBelKe01JoinSekolahLongitudinal($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = JadwalQuery::create(null, $criteria);
        $query->joinWith('SekolahLongitudinal', $join_behavior);

        return $this->getJadwalsRelatedByBelKe01($query, $con);
    }

    /**
     * Clears out the collJadwalsRelatedByBelKe02 collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Pembelajaran The current object (for fluent API support)
     * @see        addJadwalsRelatedByBelKe02()
     */
    public function clearJadwalsRelatedByBelKe02()
    {
        $this->collJadwalsRelatedByBelKe02 = null; // important to set this to null since that means it is uninitialized
        $this->collJadwalsRelatedByBelKe02Partial = null;

        return $this;
    }

    /**
     * reset is the collJadwalsRelatedByBelKe02 collection loaded partially
     *
     * @return void
     */
    public function resetPartialJadwalsRelatedByBelKe02($v = true)
    {
        $this->collJadwalsRelatedByBelKe02Partial = $v;
    }

    /**
     * Initializes the collJadwalsRelatedByBelKe02 collection.
     *
     * By default this just sets the collJadwalsRelatedByBelKe02 collection to an empty array (like clearcollJadwalsRelatedByBelKe02());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initJadwalsRelatedByBelKe02($overrideExisting = true)
    {
        if (null !== $this->collJadwalsRelatedByBelKe02 && !$overrideExisting) {
            return;
        }
        $this->collJadwalsRelatedByBelKe02 = new PropelObjectCollection();
        $this->collJadwalsRelatedByBelKe02->setModel('Jadwal');
    }

    /**
     * Gets an array of Jadwal objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Pembelajaran is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Jadwal[] List of Jadwal objects
     * @throws PropelException
     */
    public function getJadwalsRelatedByBelKe02($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collJadwalsRelatedByBelKe02Partial && !$this->isNew();
        if (null === $this->collJadwalsRelatedByBelKe02 || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collJadwalsRelatedByBelKe02) {
                // return empty collection
                $this->initJadwalsRelatedByBelKe02();
            } else {
                $collJadwalsRelatedByBelKe02 = JadwalQuery::create(null, $criteria)
                    ->filterByPembelajaranRelatedByBelKe02($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collJadwalsRelatedByBelKe02Partial && count($collJadwalsRelatedByBelKe02)) {
                      $this->initJadwalsRelatedByBelKe02(false);

                      foreach($collJadwalsRelatedByBelKe02 as $obj) {
                        if (false == $this->collJadwalsRelatedByBelKe02->contains($obj)) {
                          $this->collJadwalsRelatedByBelKe02->append($obj);
                        }
                      }

                      $this->collJadwalsRelatedByBelKe02Partial = true;
                    }

                    $collJadwalsRelatedByBelKe02->getInternalIterator()->rewind();
                    return $collJadwalsRelatedByBelKe02;
                }

                if($partial && $this->collJadwalsRelatedByBelKe02) {
                    foreach($this->collJadwalsRelatedByBelKe02 as $obj) {
                        if($obj->isNew()) {
                            $collJadwalsRelatedByBelKe02[] = $obj;
                        }
                    }
                }

                $this->collJadwalsRelatedByBelKe02 = $collJadwalsRelatedByBelKe02;
                $this->collJadwalsRelatedByBelKe02Partial = false;
            }
        }

        return $this->collJadwalsRelatedByBelKe02;
    }

    /**
     * Sets a collection of JadwalRelatedByBelKe02 objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $jadwalsRelatedByBelKe02 A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Pembelajaran The current object (for fluent API support)
     */
    public function setJadwalsRelatedByBelKe02(PropelCollection $jadwalsRelatedByBelKe02, PropelPDO $con = null)
    {
        $jadwalsRelatedByBelKe02ToDelete = $this->getJadwalsRelatedByBelKe02(new Criteria(), $con)->diff($jadwalsRelatedByBelKe02);

        $this->jadwalsRelatedByBelKe02ScheduledForDeletion = unserialize(serialize($jadwalsRelatedByBelKe02ToDelete));

        foreach ($jadwalsRelatedByBelKe02ToDelete as $jadwalRelatedByBelKe02Removed) {
            $jadwalRelatedByBelKe02Removed->setPembelajaranRelatedByBelKe02(null);
        }

        $this->collJadwalsRelatedByBelKe02 = null;
        foreach ($jadwalsRelatedByBelKe02 as $jadwalRelatedByBelKe02) {
            $this->addJadwalRelatedByBelKe02($jadwalRelatedByBelKe02);
        }

        $this->collJadwalsRelatedByBelKe02 = $jadwalsRelatedByBelKe02;
        $this->collJadwalsRelatedByBelKe02Partial = false;

        return $this;
    }

    /**
     * Returns the number of related Jadwal objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Jadwal objects.
     * @throws PropelException
     */
    public function countJadwalsRelatedByBelKe02(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collJadwalsRelatedByBelKe02Partial && !$this->isNew();
        if (null === $this->collJadwalsRelatedByBelKe02 || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collJadwalsRelatedByBelKe02) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getJadwalsRelatedByBelKe02());
            }
            $query = JadwalQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPembelajaranRelatedByBelKe02($this)
                ->count($con);
        }

        return count($this->collJadwalsRelatedByBelKe02);
    }

    /**
     * Method called to associate a Jadwal object to this object
     * through the Jadwal foreign key attribute.
     *
     * @param    Jadwal $l Jadwal
     * @return Pembelajaran The current object (for fluent API support)
     */
    public function addJadwalRelatedByBelKe02(Jadwal $l)
    {
        if ($this->collJadwalsRelatedByBelKe02 === null) {
            $this->initJadwalsRelatedByBelKe02();
            $this->collJadwalsRelatedByBelKe02Partial = true;
        }
        if (!in_array($l, $this->collJadwalsRelatedByBelKe02->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddJadwalRelatedByBelKe02($l);
        }

        return $this;
    }

    /**
     * @param	JadwalRelatedByBelKe02 $jadwalRelatedByBelKe02 The jadwalRelatedByBelKe02 object to add.
     */
    protected function doAddJadwalRelatedByBelKe02($jadwalRelatedByBelKe02)
    {
        $this->collJadwalsRelatedByBelKe02[]= $jadwalRelatedByBelKe02;
        $jadwalRelatedByBelKe02->setPembelajaranRelatedByBelKe02($this);
    }

    /**
     * @param	JadwalRelatedByBelKe02 $jadwalRelatedByBelKe02 The jadwalRelatedByBelKe02 object to remove.
     * @return Pembelajaran The current object (for fluent API support)
     */
    public function removeJadwalRelatedByBelKe02($jadwalRelatedByBelKe02)
    {
        if ($this->getJadwalsRelatedByBelKe02()->contains($jadwalRelatedByBelKe02)) {
            $this->collJadwalsRelatedByBelKe02->remove($this->collJadwalsRelatedByBelKe02->search($jadwalRelatedByBelKe02));
            if (null === $this->jadwalsRelatedByBelKe02ScheduledForDeletion) {
                $this->jadwalsRelatedByBelKe02ScheduledForDeletion = clone $this->collJadwalsRelatedByBelKe02;
                $this->jadwalsRelatedByBelKe02ScheduledForDeletion->clear();
            }
            $this->jadwalsRelatedByBelKe02ScheduledForDeletion[]= $jadwalRelatedByBelKe02;
            $jadwalRelatedByBelKe02->setPembelajaranRelatedByBelKe02(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pembelajaran is new, it will return
     * an empty collection; or if this Pembelajaran has previously
     * been saved, it will retrieve related JadwalsRelatedByBelKe02 from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pembelajaran.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Jadwal[] List of Jadwal objects
     */
    public function getJadwalsRelatedByBelKe02JoinRuang($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = JadwalQuery::create(null, $criteria);
        $query->joinWith('Ruang', $join_behavior);

        return $this->getJadwalsRelatedByBelKe02($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pembelajaran is new, it will return
     * an empty collection; or if this Pembelajaran has previously
     * been saved, it will retrieve related JadwalsRelatedByBelKe02 from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pembelajaran.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Jadwal[] List of Jadwal objects
     */
    public function getJadwalsRelatedByBelKe02JoinSekolahLongitudinal($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = JadwalQuery::create(null, $criteria);
        $query->joinWith('SekolahLongitudinal', $join_behavior);

        return $this->getJadwalsRelatedByBelKe02($query, $con);
    }

    /**
     * Clears out the collJadwalsRelatedByBelKe03 collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Pembelajaran The current object (for fluent API support)
     * @see        addJadwalsRelatedByBelKe03()
     */
    public function clearJadwalsRelatedByBelKe03()
    {
        $this->collJadwalsRelatedByBelKe03 = null; // important to set this to null since that means it is uninitialized
        $this->collJadwalsRelatedByBelKe03Partial = null;

        return $this;
    }

    /**
     * reset is the collJadwalsRelatedByBelKe03 collection loaded partially
     *
     * @return void
     */
    public function resetPartialJadwalsRelatedByBelKe03($v = true)
    {
        $this->collJadwalsRelatedByBelKe03Partial = $v;
    }

    /**
     * Initializes the collJadwalsRelatedByBelKe03 collection.
     *
     * By default this just sets the collJadwalsRelatedByBelKe03 collection to an empty array (like clearcollJadwalsRelatedByBelKe03());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initJadwalsRelatedByBelKe03($overrideExisting = true)
    {
        if (null !== $this->collJadwalsRelatedByBelKe03 && !$overrideExisting) {
            return;
        }
        $this->collJadwalsRelatedByBelKe03 = new PropelObjectCollection();
        $this->collJadwalsRelatedByBelKe03->setModel('Jadwal');
    }

    /**
     * Gets an array of Jadwal objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Pembelajaran is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Jadwal[] List of Jadwal objects
     * @throws PropelException
     */
    public function getJadwalsRelatedByBelKe03($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collJadwalsRelatedByBelKe03Partial && !$this->isNew();
        if (null === $this->collJadwalsRelatedByBelKe03 || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collJadwalsRelatedByBelKe03) {
                // return empty collection
                $this->initJadwalsRelatedByBelKe03();
            } else {
                $collJadwalsRelatedByBelKe03 = JadwalQuery::create(null, $criteria)
                    ->filterByPembelajaranRelatedByBelKe03($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collJadwalsRelatedByBelKe03Partial && count($collJadwalsRelatedByBelKe03)) {
                      $this->initJadwalsRelatedByBelKe03(false);

                      foreach($collJadwalsRelatedByBelKe03 as $obj) {
                        if (false == $this->collJadwalsRelatedByBelKe03->contains($obj)) {
                          $this->collJadwalsRelatedByBelKe03->append($obj);
                        }
                      }

                      $this->collJadwalsRelatedByBelKe03Partial = true;
                    }

                    $collJadwalsRelatedByBelKe03->getInternalIterator()->rewind();
                    return $collJadwalsRelatedByBelKe03;
                }

                if($partial && $this->collJadwalsRelatedByBelKe03) {
                    foreach($this->collJadwalsRelatedByBelKe03 as $obj) {
                        if($obj->isNew()) {
                            $collJadwalsRelatedByBelKe03[] = $obj;
                        }
                    }
                }

                $this->collJadwalsRelatedByBelKe03 = $collJadwalsRelatedByBelKe03;
                $this->collJadwalsRelatedByBelKe03Partial = false;
            }
        }

        return $this->collJadwalsRelatedByBelKe03;
    }

    /**
     * Sets a collection of JadwalRelatedByBelKe03 objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $jadwalsRelatedByBelKe03 A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Pembelajaran The current object (for fluent API support)
     */
    public function setJadwalsRelatedByBelKe03(PropelCollection $jadwalsRelatedByBelKe03, PropelPDO $con = null)
    {
        $jadwalsRelatedByBelKe03ToDelete = $this->getJadwalsRelatedByBelKe03(new Criteria(), $con)->diff($jadwalsRelatedByBelKe03);

        $this->jadwalsRelatedByBelKe03ScheduledForDeletion = unserialize(serialize($jadwalsRelatedByBelKe03ToDelete));

        foreach ($jadwalsRelatedByBelKe03ToDelete as $jadwalRelatedByBelKe03Removed) {
            $jadwalRelatedByBelKe03Removed->setPembelajaranRelatedByBelKe03(null);
        }

        $this->collJadwalsRelatedByBelKe03 = null;
        foreach ($jadwalsRelatedByBelKe03 as $jadwalRelatedByBelKe03) {
            $this->addJadwalRelatedByBelKe03($jadwalRelatedByBelKe03);
        }

        $this->collJadwalsRelatedByBelKe03 = $jadwalsRelatedByBelKe03;
        $this->collJadwalsRelatedByBelKe03Partial = false;

        return $this;
    }

    /**
     * Returns the number of related Jadwal objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Jadwal objects.
     * @throws PropelException
     */
    public function countJadwalsRelatedByBelKe03(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collJadwalsRelatedByBelKe03Partial && !$this->isNew();
        if (null === $this->collJadwalsRelatedByBelKe03 || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collJadwalsRelatedByBelKe03) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getJadwalsRelatedByBelKe03());
            }
            $query = JadwalQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPembelajaranRelatedByBelKe03($this)
                ->count($con);
        }

        return count($this->collJadwalsRelatedByBelKe03);
    }

    /**
     * Method called to associate a Jadwal object to this object
     * through the Jadwal foreign key attribute.
     *
     * @param    Jadwal $l Jadwal
     * @return Pembelajaran The current object (for fluent API support)
     */
    public function addJadwalRelatedByBelKe03(Jadwal $l)
    {
        if ($this->collJadwalsRelatedByBelKe03 === null) {
            $this->initJadwalsRelatedByBelKe03();
            $this->collJadwalsRelatedByBelKe03Partial = true;
        }
        if (!in_array($l, $this->collJadwalsRelatedByBelKe03->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddJadwalRelatedByBelKe03($l);
        }

        return $this;
    }

    /**
     * @param	JadwalRelatedByBelKe03 $jadwalRelatedByBelKe03 The jadwalRelatedByBelKe03 object to add.
     */
    protected function doAddJadwalRelatedByBelKe03($jadwalRelatedByBelKe03)
    {
        $this->collJadwalsRelatedByBelKe03[]= $jadwalRelatedByBelKe03;
        $jadwalRelatedByBelKe03->setPembelajaranRelatedByBelKe03($this);
    }

    /**
     * @param	JadwalRelatedByBelKe03 $jadwalRelatedByBelKe03 The jadwalRelatedByBelKe03 object to remove.
     * @return Pembelajaran The current object (for fluent API support)
     */
    public function removeJadwalRelatedByBelKe03($jadwalRelatedByBelKe03)
    {
        if ($this->getJadwalsRelatedByBelKe03()->contains($jadwalRelatedByBelKe03)) {
            $this->collJadwalsRelatedByBelKe03->remove($this->collJadwalsRelatedByBelKe03->search($jadwalRelatedByBelKe03));
            if (null === $this->jadwalsRelatedByBelKe03ScheduledForDeletion) {
                $this->jadwalsRelatedByBelKe03ScheduledForDeletion = clone $this->collJadwalsRelatedByBelKe03;
                $this->jadwalsRelatedByBelKe03ScheduledForDeletion->clear();
            }
            $this->jadwalsRelatedByBelKe03ScheduledForDeletion[]= $jadwalRelatedByBelKe03;
            $jadwalRelatedByBelKe03->setPembelajaranRelatedByBelKe03(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pembelajaran is new, it will return
     * an empty collection; or if this Pembelajaran has previously
     * been saved, it will retrieve related JadwalsRelatedByBelKe03 from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pembelajaran.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Jadwal[] List of Jadwal objects
     */
    public function getJadwalsRelatedByBelKe03JoinRuang($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = JadwalQuery::create(null, $criteria);
        $query->joinWith('Ruang', $join_behavior);

        return $this->getJadwalsRelatedByBelKe03($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pembelajaran is new, it will return
     * an empty collection; or if this Pembelajaran has previously
     * been saved, it will retrieve related JadwalsRelatedByBelKe03 from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pembelajaran.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Jadwal[] List of Jadwal objects
     */
    public function getJadwalsRelatedByBelKe03JoinSekolahLongitudinal($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = JadwalQuery::create(null, $criteria);
        $query->joinWith('SekolahLongitudinal', $join_behavior);

        return $this->getJadwalsRelatedByBelKe03($query, $con);
    }

    /**
     * Clears out the collJadwalsRelatedByBelKe04 collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Pembelajaran The current object (for fluent API support)
     * @see        addJadwalsRelatedByBelKe04()
     */
    public function clearJadwalsRelatedByBelKe04()
    {
        $this->collJadwalsRelatedByBelKe04 = null; // important to set this to null since that means it is uninitialized
        $this->collJadwalsRelatedByBelKe04Partial = null;

        return $this;
    }

    /**
     * reset is the collJadwalsRelatedByBelKe04 collection loaded partially
     *
     * @return void
     */
    public function resetPartialJadwalsRelatedByBelKe04($v = true)
    {
        $this->collJadwalsRelatedByBelKe04Partial = $v;
    }

    /**
     * Initializes the collJadwalsRelatedByBelKe04 collection.
     *
     * By default this just sets the collJadwalsRelatedByBelKe04 collection to an empty array (like clearcollJadwalsRelatedByBelKe04());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initJadwalsRelatedByBelKe04($overrideExisting = true)
    {
        if (null !== $this->collJadwalsRelatedByBelKe04 && !$overrideExisting) {
            return;
        }
        $this->collJadwalsRelatedByBelKe04 = new PropelObjectCollection();
        $this->collJadwalsRelatedByBelKe04->setModel('Jadwal');
    }

    /**
     * Gets an array of Jadwal objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Pembelajaran is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Jadwal[] List of Jadwal objects
     * @throws PropelException
     */
    public function getJadwalsRelatedByBelKe04($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collJadwalsRelatedByBelKe04Partial && !$this->isNew();
        if (null === $this->collJadwalsRelatedByBelKe04 || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collJadwalsRelatedByBelKe04) {
                // return empty collection
                $this->initJadwalsRelatedByBelKe04();
            } else {
                $collJadwalsRelatedByBelKe04 = JadwalQuery::create(null, $criteria)
                    ->filterByPembelajaranRelatedByBelKe04($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collJadwalsRelatedByBelKe04Partial && count($collJadwalsRelatedByBelKe04)) {
                      $this->initJadwalsRelatedByBelKe04(false);

                      foreach($collJadwalsRelatedByBelKe04 as $obj) {
                        if (false == $this->collJadwalsRelatedByBelKe04->contains($obj)) {
                          $this->collJadwalsRelatedByBelKe04->append($obj);
                        }
                      }

                      $this->collJadwalsRelatedByBelKe04Partial = true;
                    }

                    $collJadwalsRelatedByBelKe04->getInternalIterator()->rewind();
                    return $collJadwalsRelatedByBelKe04;
                }

                if($partial && $this->collJadwalsRelatedByBelKe04) {
                    foreach($this->collJadwalsRelatedByBelKe04 as $obj) {
                        if($obj->isNew()) {
                            $collJadwalsRelatedByBelKe04[] = $obj;
                        }
                    }
                }

                $this->collJadwalsRelatedByBelKe04 = $collJadwalsRelatedByBelKe04;
                $this->collJadwalsRelatedByBelKe04Partial = false;
            }
        }

        return $this->collJadwalsRelatedByBelKe04;
    }

    /**
     * Sets a collection of JadwalRelatedByBelKe04 objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $jadwalsRelatedByBelKe04 A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Pembelajaran The current object (for fluent API support)
     */
    public function setJadwalsRelatedByBelKe04(PropelCollection $jadwalsRelatedByBelKe04, PropelPDO $con = null)
    {
        $jadwalsRelatedByBelKe04ToDelete = $this->getJadwalsRelatedByBelKe04(new Criteria(), $con)->diff($jadwalsRelatedByBelKe04);

        $this->jadwalsRelatedByBelKe04ScheduledForDeletion = unserialize(serialize($jadwalsRelatedByBelKe04ToDelete));

        foreach ($jadwalsRelatedByBelKe04ToDelete as $jadwalRelatedByBelKe04Removed) {
            $jadwalRelatedByBelKe04Removed->setPembelajaranRelatedByBelKe04(null);
        }

        $this->collJadwalsRelatedByBelKe04 = null;
        foreach ($jadwalsRelatedByBelKe04 as $jadwalRelatedByBelKe04) {
            $this->addJadwalRelatedByBelKe04($jadwalRelatedByBelKe04);
        }

        $this->collJadwalsRelatedByBelKe04 = $jadwalsRelatedByBelKe04;
        $this->collJadwalsRelatedByBelKe04Partial = false;

        return $this;
    }

    /**
     * Returns the number of related Jadwal objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Jadwal objects.
     * @throws PropelException
     */
    public function countJadwalsRelatedByBelKe04(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collJadwalsRelatedByBelKe04Partial && !$this->isNew();
        if (null === $this->collJadwalsRelatedByBelKe04 || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collJadwalsRelatedByBelKe04) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getJadwalsRelatedByBelKe04());
            }
            $query = JadwalQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPembelajaranRelatedByBelKe04($this)
                ->count($con);
        }

        return count($this->collJadwalsRelatedByBelKe04);
    }

    /**
     * Method called to associate a Jadwal object to this object
     * through the Jadwal foreign key attribute.
     *
     * @param    Jadwal $l Jadwal
     * @return Pembelajaran The current object (for fluent API support)
     */
    public function addJadwalRelatedByBelKe04(Jadwal $l)
    {
        if ($this->collJadwalsRelatedByBelKe04 === null) {
            $this->initJadwalsRelatedByBelKe04();
            $this->collJadwalsRelatedByBelKe04Partial = true;
        }
        if (!in_array($l, $this->collJadwalsRelatedByBelKe04->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddJadwalRelatedByBelKe04($l);
        }

        return $this;
    }

    /**
     * @param	JadwalRelatedByBelKe04 $jadwalRelatedByBelKe04 The jadwalRelatedByBelKe04 object to add.
     */
    protected function doAddJadwalRelatedByBelKe04($jadwalRelatedByBelKe04)
    {
        $this->collJadwalsRelatedByBelKe04[]= $jadwalRelatedByBelKe04;
        $jadwalRelatedByBelKe04->setPembelajaranRelatedByBelKe04($this);
    }

    /**
     * @param	JadwalRelatedByBelKe04 $jadwalRelatedByBelKe04 The jadwalRelatedByBelKe04 object to remove.
     * @return Pembelajaran The current object (for fluent API support)
     */
    public function removeJadwalRelatedByBelKe04($jadwalRelatedByBelKe04)
    {
        if ($this->getJadwalsRelatedByBelKe04()->contains($jadwalRelatedByBelKe04)) {
            $this->collJadwalsRelatedByBelKe04->remove($this->collJadwalsRelatedByBelKe04->search($jadwalRelatedByBelKe04));
            if (null === $this->jadwalsRelatedByBelKe04ScheduledForDeletion) {
                $this->jadwalsRelatedByBelKe04ScheduledForDeletion = clone $this->collJadwalsRelatedByBelKe04;
                $this->jadwalsRelatedByBelKe04ScheduledForDeletion->clear();
            }
            $this->jadwalsRelatedByBelKe04ScheduledForDeletion[]= $jadwalRelatedByBelKe04;
            $jadwalRelatedByBelKe04->setPembelajaranRelatedByBelKe04(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pembelajaran is new, it will return
     * an empty collection; or if this Pembelajaran has previously
     * been saved, it will retrieve related JadwalsRelatedByBelKe04 from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pembelajaran.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Jadwal[] List of Jadwal objects
     */
    public function getJadwalsRelatedByBelKe04JoinRuang($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = JadwalQuery::create(null, $criteria);
        $query->joinWith('Ruang', $join_behavior);

        return $this->getJadwalsRelatedByBelKe04($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pembelajaran is new, it will return
     * an empty collection; or if this Pembelajaran has previously
     * been saved, it will retrieve related JadwalsRelatedByBelKe04 from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pembelajaran.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Jadwal[] List of Jadwal objects
     */
    public function getJadwalsRelatedByBelKe04JoinSekolahLongitudinal($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = JadwalQuery::create(null, $criteria);
        $query->joinWith('SekolahLongitudinal', $join_behavior);

        return $this->getJadwalsRelatedByBelKe04($query, $con);
    }

    /**
     * Clears out the collJadwalsRelatedByBelKe05 collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Pembelajaran The current object (for fluent API support)
     * @see        addJadwalsRelatedByBelKe05()
     */
    public function clearJadwalsRelatedByBelKe05()
    {
        $this->collJadwalsRelatedByBelKe05 = null; // important to set this to null since that means it is uninitialized
        $this->collJadwalsRelatedByBelKe05Partial = null;

        return $this;
    }

    /**
     * reset is the collJadwalsRelatedByBelKe05 collection loaded partially
     *
     * @return void
     */
    public function resetPartialJadwalsRelatedByBelKe05($v = true)
    {
        $this->collJadwalsRelatedByBelKe05Partial = $v;
    }

    /**
     * Initializes the collJadwalsRelatedByBelKe05 collection.
     *
     * By default this just sets the collJadwalsRelatedByBelKe05 collection to an empty array (like clearcollJadwalsRelatedByBelKe05());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initJadwalsRelatedByBelKe05($overrideExisting = true)
    {
        if (null !== $this->collJadwalsRelatedByBelKe05 && !$overrideExisting) {
            return;
        }
        $this->collJadwalsRelatedByBelKe05 = new PropelObjectCollection();
        $this->collJadwalsRelatedByBelKe05->setModel('Jadwal');
    }

    /**
     * Gets an array of Jadwal objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Pembelajaran is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Jadwal[] List of Jadwal objects
     * @throws PropelException
     */
    public function getJadwalsRelatedByBelKe05($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collJadwalsRelatedByBelKe05Partial && !$this->isNew();
        if (null === $this->collJadwalsRelatedByBelKe05 || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collJadwalsRelatedByBelKe05) {
                // return empty collection
                $this->initJadwalsRelatedByBelKe05();
            } else {
                $collJadwalsRelatedByBelKe05 = JadwalQuery::create(null, $criteria)
                    ->filterByPembelajaranRelatedByBelKe05($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collJadwalsRelatedByBelKe05Partial && count($collJadwalsRelatedByBelKe05)) {
                      $this->initJadwalsRelatedByBelKe05(false);

                      foreach($collJadwalsRelatedByBelKe05 as $obj) {
                        if (false == $this->collJadwalsRelatedByBelKe05->contains($obj)) {
                          $this->collJadwalsRelatedByBelKe05->append($obj);
                        }
                      }

                      $this->collJadwalsRelatedByBelKe05Partial = true;
                    }

                    $collJadwalsRelatedByBelKe05->getInternalIterator()->rewind();
                    return $collJadwalsRelatedByBelKe05;
                }

                if($partial && $this->collJadwalsRelatedByBelKe05) {
                    foreach($this->collJadwalsRelatedByBelKe05 as $obj) {
                        if($obj->isNew()) {
                            $collJadwalsRelatedByBelKe05[] = $obj;
                        }
                    }
                }

                $this->collJadwalsRelatedByBelKe05 = $collJadwalsRelatedByBelKe05;
                $this->collJadwalsRelatedByBelKe05Partial = false;
            }
        }

        return $this->collJadwalsRelatedByBelKe05;
    }

    /**
     * Sets a collection of JadwalRelatedByBelKe05 objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $jadwalsRelatedByBelKe05 A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Pembelajaran The current object (for fluent API support)
     */
    public function setJadwalsRelatedByBelKe05(PropelCollection $jadwalsRelatedByBelKe05, PropelPDO $con = null)
    {
        $jadwalsRelatedByBelKe05ToDelete = $this->getJadwalsRelatedByBelKe05(new Criteria(), $con)->diff($jadwalsRelatedByBelKe05);

        $this->jadwalsRelatedByBelKe05ScheduledForDeletion = unserialize(serialize($jadwalsRelatedByBelKe05ToDelete));

        foreach ($jadwalsRelatedByBelKe05ToDelete as $jadwalRelatedByBelKe05Removed) {
            $jadwalRelatedByBelKe05Removed->setPembelajaranRelatedByBelKe05(null);
        }

        $this->collJadwalsRelatedByBelKe05 = null;
        foreach ($jadwalsRelatedByBelKe05 as $jadwalRelatedByBelKe05) {
            $this->addJadwalRelatedByBelKe05($jadwalRelatedByBelKe05);
        }

        $this->collJadwalsRelatedByBelKe05 = $jadwalsRelatedByBelKe05;
        $this->collJadwalsRelatedByBelKe05Partial = false;

        return $this;
    }

    /**
     * Returns the number of related Jadwal objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Jadwal objects.
     * @throws PropelException
     */
    public function countJadwalsRelatedByBelKe05(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collJadwalsRelatedByBelKe05Partial && !$this->isNew();
        if (null === $this->collJadwalsRelatedByBelKe05 || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collJadwalsRelatedByBelKe05) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getJadwalsRelatedByBelKe05());
            }
            $query = JadwalQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPembelajaranRelatedByBelKe05($this)
                ->count($con);
        }

        return count($this->collJadwalsRelatedByBelKe05);
    }

    /**
     * Method called to associate a Jadwal object to this object
     * through the Jadwal foreign key attribute.
     *
     * @param    Jadwal $l Jadwal
     * @return Pembelajaran The current object (for fluent API support)
     */
    public function addJadwalRelatedByBelKe05(Jadwal $l)
    {
        if ($this->collJadwalsRelatedByBelKe05 === null) {
            $this->initJadwalsRelatedByBelKe05();
            $this->collJadwalsRelatedByBelKe05Partial = true;
        }
        if (!in_array($l, $this->collJadwalsRelatedByBelKe05->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddJadwalRelatedByBelKe05($l);
        }

        return $this;
    }

    /**
     * @param	JadwalRelatedByBelKe05 $jadwalRelatedByBelKe05 The jadwalRelatedByBelKe05 object to add.
     */
    protected function doAddJadwalRelatedByBelKe05($jadwalRelatedByBelKe05)
    {
        $this->collJadwalsRelatedByBelKe05[]= $jadwalRelatedByBelKe05;
        $jadwalRelatedByBelKe05->setPembelajaranRelatedByBelKe05($this);
    }

    /**
     * @param	JadwalRelatedByBelKe05 $jadwalRelatedByBelKe05 The jadwalRelatedByBelKe05 object to remove.
     * @return Pembelajaran The current object (for fluent API support)
     */
    public function removeJadwalRelatedByBelKe05($jadwalRelatedByBelKe05)
    {
        if ($this->getJadwalsRelatedByBelKe05()->contains($jadwalRelatedByBelKe05)) {
            $this->collJadwalsRelatedByBelKe05->remove($this->collJadwalsRelatedByBelKe05->search($jadwalRelatedByBelKe05));
            if (null === $this->jadwalsRelatedByBelKe05ScheduledForDeletion) {
                $this->jadwalsRelatedByBelKe05ScheduledForDeletion = clone $this->collJadwalsRelatedByBelKe05;
                $this->jadwalsRelatedByBelKe05ScheduledForDeletion->clear();
            }
            $this->jadwalsRelatedByBelKe05ScheduledForDeletion[]= $jadwalRelatedByBelKe05;
            $jadwalRelatedByBelKe05->setPembelajaranRelatedByBelKe05(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pembelajaran is new, it will return
     * an empty collection; or if this Pembelajaran has previously
     * been saved, it will retrieve related JadwalsRelatedByBelKe05 from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pembelajaran.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Jadwal[] List of Jadwal objects
     */
    public function getJadwalsRelatedByBelKe05JoinRuang($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = JadwalQuery::create(null, $criteria);
        $query->joinWith('Ruang', $join_behavior);

        return $this->getJadwalsRelatedByBelKe05($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pembelajaran is new, it will return
     * an empty collection; or if this Pembelajaran has previously
     * been saved, it will retrieve related JadwalsRelatedByBelKe05 from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pembelajaran.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Jadwal[] List of Jadwal objects
     */
    public function getJadwalsRelatedByBelKe05JoinSekolahLongitudinal($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = JadwalQuery::create(null, $criteria);
        $query->joinWith('SekolahLongitudinal', $join_behavior);

        return $this->getJadwalsRelatedByBelKe05($query, $con);
    }

    /**
     * Clears out the collJadwalsRelatedByBelKe06 collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Pembelajaran The current object (for fluent API support)
     * @see        addJadwalsRelatedByBelKe06()
     */
    public function clearJadwalsRelatedByBelKe06()
    {
        $this->collJadwalsRelatedByBelKe06 = null; // important to set this to null since that means it is uninitialized
        $this->collJadwalsRelatedByBelKe06Partial = null;

        return $this;
    }

    /**
     * reset is the collJadwalsRelatedByBelKe06 collection loaded partially
     *
     * @return void
     */
    public function resetPartialJadwalsRelatedByBelKe06($v = true)
    {
        $this->collJadwalsRelatedByBelKe06Partial = $v;
    }

    /**
     * Initializes the collJadwalsRelatedByBelKe06 collection.
     *
     * By default this just sets the collJadwalsRelatedByBelKe06 collection to an empty array (like clearcollJadwalsRelatedByBelKe06());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initJadwalsRelatedByBelKe06($overrideExisting = true)
    {
        if (null !== $this->collJadwalsRelatedByBelKe06 && !$overrideExisting) {
            return;
        }
        $this->collJadwalsRelatedByBelKe06 = new PropelObjectCollection();
        $this->collJadwalsRelatedByBelKe06->setModel('Jadwal');
    }

    /**
     * Gets an array of Jadwal objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Pembelajaran is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Jadwal[] List of Jadwal objects
     * @throws PropelException
     */
    public function getJadwalsRelatedByBelKe06($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collJadwalsRelatedByBelKe06Partial && !$this->isNew();
        if (null === $this->collJadwalsRelatedByBelKe06 || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collJadwalsRelatedByBelKe06) {
                // return empty collection
                $this->initJadwalsRelatedByBelKe06();
            } else {
                $collJadwalsRelatedByBelKe06 = JadwalQuery::create(null, $criteria)
                    ->filterByPembelajaranRelatedByBelKe06($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collJadwalsRelatedByBelKe06Partial && count($collJadwalsRelatedByBelKe06)) {
                      $this->initJadwalsRelatedByBelKe06(false);

                      foreach($collJadwalsRelatedByBelKe06 as $obj) {
                        if (false == $this->collJadwalsRelatedByBelKe06->contains($obj)) {
                          $this->collJadwalsRelatedByBelKe06->append($obj);
                        }
                      }

                      $this->collJadwalsRelatedByBelKe06Partial = true;
                    }

                    $collJadwalsRelatedByBelKe06->getInternalIterator()->rewind();
                    return $collJadwalsRelatedByBelKe06;
                }

                if($partial && $this->collJadwalsRelatedByBelKe06) {
                    foreach($this->collJadwalsRelatedByBelKe06 as $obj) {
                        if($obj->isNew()) {
                            $collJadwalsRelatedByBelKe06[] = $obj;
                        }
                    }
                }

                $this->collJadwalsRelatedByBelKe06 = $collJadwalsRelatedByBelKe06;
                $this->collJadwalsRelatedByBelKe06Partial = false;
            }
        }

        return $this->collJadwalsRelatedByBelKe06;
    }

    /**
     * Sets a collection of JadwalRelatedByBelKe06 objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $jadwalsRelatedByBelKe06 A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Pembelajaran The current object (for fluent API support)
     */
    public function setJadwalsRelatedByBelKe06(PropelCollection $jadwalsRelatedByBelKe06, PropelPDO $con = null)
    {
        $jadwalsRelatedByBelKe06ToDelete = $this->getJadwalsRelatedByBelKe06(new Criteria(), $con)->diff($jadwalsRelatedByBelKe06);

        $this->jadwalsRelatedByBelKe06ScheduledForDeletion = unserialize(serialize($jadwalsRelatedByBelKe06ToDelete));

        foreach ($jadwalsRelatedByBelKe06ToDelete as $jadwalRelatedByBelKe06Removed) {
            $jadwalRelatedByBelKe06Removed->setPembelajaranRelatedByBelKe06(null);
        }

        $this->collJadwalsRelatedByBelKe06 = null;
        foreach ($jadwalsRelatedByBelKe06 as $jadwalRelatedByBelKe06) {
            $this->addJadwalRelatedByBelKe06($jadwalRelatedByBelKe06);
        }

        $this->collJadwalsRelatedByBelKe06 = $jadwalsRelatedByBelKe06;
        $this->collJadwalsRelatedByBelKe06Partial = false;

        return $this;
    }

    /**
     * Returns the number of related Jadwal objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Jadwal objects.
     * @throws PropelException
     */
    public function countJadwalsRelatedByBelKe06(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collJadwalsRelatedByBelKe06Partial && !$this->isNew();
        if (null === $this->collJadwalsRelatedByBelKe06 || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collJadwalsRelatedByBelKe06) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getJadwalsRelatedByBelKe06());
            }
            $query = JadwalQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPembelajaranRelatedByBelKe06($this)
                ->count($con);
        }

        return count($this->collJadwalsRelatedByBelKe06);
    }

    /**
     * Method called to associate a Jadwal object to this object
     * through the Jadwal foreign key attribute.
     *
     * @param    Jadwal $l Jadwal
     * @return Pembelajaran The current object (for fluent API support)
     */
    public function addJadwalRelatedByBelKe06(Jadwal $l)
    {
        if ($this->collJadwalsRelatedByBelKe06 === null) {
            $this->initJadwalsRelatedByBelKe06();
            $this->collJadwalsRelatedByBelKe06Partial = true;
        }
        if (!in_array($l, $this->collJadwalsRelatedByBelKe06->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddJadwalRelatedByBelKe06($l);
        }

        return $this;
    }

    /**
     * @param	JadwalRelatedByBelKe06 $jadwalRelatedByBelKe06 The jadwalRelatedByBelKe06 object to add.
     */
    protected function doAddJadwalRelatedByBelKe06($jadwalRelatedByBelKe06)
    {
        $this->collJadwalsRelatedByBelKe06[]= $jadwalRelatedByBelKe06;
        $jadwalRelatedByBelKe06->setPembelajaranRelatedByBelKe06($this);
    }

    /**
     * @param	JadwalRelatedByBelKe06 $jadwalRelatedByBelKe06 The jadwalRelatedByBelKe06 object to remove.
     * @return Pembelajaran The current object (for fluent API support)
     */
    public function removeJadwalRelatedByBelKe06($jadwalRelatedByBelKe06)
    {
        if ($this->getJadwalsRelatedByBelKe06()->contains($jadwalRelatedByBelKe06)) {
            $this->collJadwalsRelatedByBelKe06->remove($this->collJadwalsRelatedByBelKe06->search($jadwalRelatedByBelKe06));
            if (null === $this->jadwalsRelatedByBelKe06ScheduledForDeletion) {
                $this->jadwalsRelatedByBelKe06ScheduledForDeletion = clone $this->collJadwalsRelatedByBelKe06;
                $this->jadwalsRelatedByBelKe06ScheduledForDeletion->clear();
            }
            $this->jadwalsRelatedByBelKe06ScheduledForDeletion[]= $jadwalRelatedByBelKe06;
            $jadwalRelatedByBelKe06->setPembelajaranRelatedByBelKe06(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pembelajaran is new, it will return
     * an empty collection; or if this Pembelajaran has previously
     * been saved, it will retrieve related JadwalsRelatedByBelKe06 from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pembelajaran.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Jadwal[] List of Jadwal objects
     */
    public function getJadwalsRelatedByBelKe06JoinRuang($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = JadwalQuery::create(null, $criteria);
        $query->joinWith('Ruang', $join_behavior);

        return $this->getJadwalsRelatedByBelKe06($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pembelajaran is new, it will return
     * an empty collection; or if this Pembelajaran has previously
     * been saved, it will retrieve related JadwalsRelatedByBelKe06 from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pembelajaran.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Jadwal[] List of Jadwal objects
     */
    public function getJadwalsRelatedByBelKe06JoinSekolahLongitudinal($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = JadwalQuery::create(null, $criteria);
        $query->joinWith('SekolahLongitudinal', $join_behavior);

        return $this->getJadwalsRelatedByBelKe06($query, $con);
    }

    /**
     * Clears out the collJadwalsRelatedByBelKe07 collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Pembelajaran The current object (for fluent API support)
     * @see        addJadwalsRelatedByBelKe07()
     */
    public function clearJadwalsRelatedByBelKe07()
    {
        $this->collJadwalsRelatedByBelKe07 = null; // important to set this to null since that means it is uninitialized
        $this->collJadwalsRelatedByBelKe07Partial = null;

        return $this;
    }

    /**
     * reset is the collJadwalsRelatedByBelKe07 collection loaded partially
     *
     * @return void
     */
    public function resetPartialJadwalsRelatedByBelKe07($v = true)
    {
        $this->collJadwalsRelatedByBelKe07Partial = $v;
    }

    /**
     * Initializes the collJadwalsRelatedByBelKe07 collection.
     *
     * By default this just sets the collJadwalsRelatedByBelKe07 collection to an empty array (like clearcollJadwalsRelatedByBelKe07());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initJadwalsRelatedByBelKe07($overrideExisting = true)
    {
        if (null !== $this->collJadwalsRelatedByBelKe07 && !$overrideExisting) {
            return;
        }
        $this->collJadwalsRelatedByBelKe07 = new PropelObjectCollection();
        $this->collJadwalsRelatedByBelKe07->setModel('Jadwal');
    }

    /**
     * Gets an array of Jadwal objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Pembelajaran is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Jadwal[] List of Jadwal objects
     * @throws PropelException
     */
    public function getJadwalsRelatedByBelKe07($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collJadwalsRelatedByBelKe07Partial && !$this->isNew();
        if (null === $this->collJadwalsRelatedByBelKe07 || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collJadwalsRelatedByBelKe07) {
                // return empty collection
                $this->initJadwalsRelatedByBelKe07();
            } else {
                $collJadwalsRelatedByBelKe07 = JadwalQuery::create(null, $criteria)
                    ->filterByPembelajaranRelatedByBelKe07($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collJadwalsRelatedByBelKe07Partial && count($collJadwalsRelatedByBelKe07)) {
                      $this->initJadwalsRelatedByBelKe07(false);

                      foreach($collJadwalsRelatedByBelKe07 as $obj) {
                        if (false == $this->collJadwalsRelatedByBelKe07->contains($obj)) {
                          $this->collJadwalsRelatedByBelKe07->append($obj);
                        }
                      }

                      $this->collJadwalsRelatedByBelKe07Partial = true;
                    }

                    $collJadwalsRelatedByBelKe07->getInternalIterator()->rewind();
                    return $collJadwalsRelatedByBelKe07;
                }

                if($partial && $this->collJadwalsRelatedByBelKe07) {
                    foreach($this->collJadwalsRelatedByBelKe07 as $obj) {
                        if($obj->isNew()) {
                            $collJadwalsRelatedByBelKe07[] = $obj;
                        }
                    }
                }

                $this->collJadwalsRelatedByBelKe07 = $collJadwalsRelatedByBelKe07;
                $this->collJadwalsRelatedByBelKe07Partial = false;
            }
        }

        return $this->collJadwalsRelatedByBelKe07;
    }

    /**
     * Sets a collection of JadwalRelatedByBelKe07 objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $jadwalsRelatedByBelKe07 A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Pembelajaran The current object (for fluent API support)
     */
    public function setJadwalsRelatedByBelKe07(PropelCollection $jadwalsRelatedByBelKe07, PropelPDO $con = null)
    {
        $jadwalsRelatedByBelKe07ToDelete = $this->getJadwalsRelatedByBelKe07(new Criteria(), $con)->diff($jadwalsRelatedByBelKe07);

        $this->jadwalsRelatedByBelKe07ScheduledForDeletion = unserialize(serialize($jadwalsRelatedByBelKe07ToDelete));

        foreach ($jadwalsRelatedByBelKe07ToDelete as $jadwalRelatedByBelKe07Removed) {
            $jadwalRelatedByBelKe07Removed->setPembelajaranRelatedByBelKe07(null);
        }

        $this->collJadwalsRelatedByBelKe07 = null;
        foreach ($jadwalsRelatedByBelKe07 as $jadwalRelatedByBelKe07) {
            $this->addJadwalRelatedByBelKe07($jadwalRelatedByBelKe07);
        }

        $this->collJadwalsRelatedByBelKe07 = $jadwalsRelatedByBelKe07;
        $this->collJadwalsRelatedByBelKe07Partial = false;

        return $this;
    }

    /**
     * Returns the number of related Jadwal objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Jadwal objects.
     * @throws PropelException
     */
    public function countJadwalsRelatedByBelKe07(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collJadwalsRelatedByBelKe07Partial && !$this->isNew();
        if (null === $this->collJadwalsRelatedByBelKe07 || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collJadwalsRelatedByBelKe07) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getJadwalsRelatedByBelKe07());
            }
            $query = JadwalQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPembelajaranRelatedByBelKe07($this)
                ->count($con);
        }

        return count($this->collJadwalsRelatedByBelKe07);
    }

    /**
     * Method called to associate a Jadwal object to this object
     * through the Jadwal foreign key attribute.
     *
     * @param    Jadwal $l Jadwal
     * @return Pembelajaran The current object (for fluent API support)
     */
    public function addJadwalRelatedByBelKe07(Jadwal $l)
    {
        if ($this->collJadwalsRelatedByBelKe07 === null) {
            $this->initJadwalsRelatedByBelKe07();
            $this->collJadwalsRelatedByBelKe07Partial = true;
        }
        if (!in_array($l, $this->collJadwalsRelatedByBelKe07->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddJadwalRelatedByBelKe07($l);
        }

        return $this;
    }

    /**
     * @param	JadwalRelatedByBelKe07 $jadwalRelatedByBelKe07 The jadwalRelatedByBelKe07 object to add.
     */
    protected function doAddJadwalRelatedByBelKe07($jadwalRelatedByBelKe07)
    {
        $this->collJadwalsRelatedByBelKe07[]= $jadwalRelatedByBelKe07;
        $jadwalRelatedByBelKe07->setPembelajaranRelatedByBelKe07($this);
    }

    /**
     * @param	JadwalRelatedByBelKe07 $jadwalRelatedByBelKe07 The jadwalRelatedByBelKe07 object to remove.
     * @return Pembelajaran The current object (for fluent API support)
     */
    public function removeJadwalRelatedByBelKe07($jadwalRelatedByBelKe07)
    {
        if ($this->getJadwalsRelatedByBelKe07()->contains($jadwalRelatedByBelKe07)) {
            $this->collJadwalsRelatedByBelKe07->remove($this->collJadwalsRelatedByBelKe07->search($jadwalRelatedByBelKe07));
            if (null === $this->jadwalsRelatedByBelKe07ScheduledForDeletion) {
                $this->jadwalsRelatedByBelKe07ScheduledForDeletion = clone $this->collJadwalsRelatedByBelKe07;
                $this->jadwalsRelatedByBelKe07ScheduledForDeletion->clear();
            }
            $this->jadwalsRelatedByBelKe07ScheduledForDeletion[]= $jadwalRelatedByBelKe07;
            $jadwalRelatedByBelKe07->setPembelajaranRelatedByBelKe07(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pembelajaran is new, it will return
     * an empty collection; or if this Pembelajaran has previously
     * been saved, it will retrieve related JadwalsRelatedByBelKe07 from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pembelajaran.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Jadwal[] List of Jadwal objects
     */
    public function getJadwalsRelatedByBelKe07JoinRuang($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = JadwalQuery::create(null, $criteria);
        $query->joinWith('Ruang', $join_behavior);

        return $this->getJadwalsRelatedByBelKe07($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pembelajaran is new, it will return
     * an empty collection; or if this Pembelajaran has previously
     * been saved, it will retrieve related JadwalsRelatedByBelKe07 from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pembelajaran.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Jadwal[] List of Jadwal objects
     */
    public function getJadwalsRelatedByBelKe07JoinSekolahLongitudinal($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = JadwalQuery::create(null, $criteria);
        $query->joinWith('SekolahLongitudinal', $join_behavior);

        return $this->getJadwalsRelatedByBelKe07($query, $con);
    }

    /**
     * Clears out the collJadwalsRelatedByBelKe08 collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Pembelajaran The current object (for fluent API support)
     * @see        addJadwalsRelatedByBelKe08()
     */
    public function clearJadwalsRelatedByBelKe08()
    {
        $this->collJadwalsRelatedByBelKe08 = null; // important to set this to null since that means it is uninitialized
        $this->collJadwalsRelatedByBelKe08Partial = null;

        return $this;
    }

    /**
     * reset is the collJadwalsRelatedByBelKe08 collection loaded partially
     *
     * @return void
     */
    public function resetPartialJadwalsRelatedByBelKe08($v = true)
    {
        $this->collJadwalsRelatedByBelKe08Partial = $v;
    }

    /**
     * Initializes the collJadwalsRelatedByBelKe08 collection.
     *
     * By default this just sets the collJadwalsRelatedByBelKe08 collection to an empty array (like clearcollJadwalsRelatedByBelKe08());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initJadwalsRelatedByBelKe08($overrideExisting = true)
    {
        if (null !== $this->collJadwalsRelatedByBelKe08 && !$overrideExisting) {
            return;
        }
        $this->collJadwalsRelatedByBelKe08 = new PropelObjectCollection();
        $this->collJadwalsRelatedByBelKe08->setModel('Jadwal');
    }

    /**
     * Gets an array of Jadwal objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Pembelajaran is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Jadwal[] List of Jadwal objects
     * @throws PropelException
     */
    public function getJadwalsRelatedByBelKe08($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collJadwalsRelatedByBelKe08Partial && !$this->isNew();
        if (null === $this->collJadwalsRelatedByBelKe08 || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collJadwalsRelatedByBelKe08) {
                // return empty collection
                $this->initJadwalsRelatedByBelKe08();
            } else {
                $collJadwalsRelatedByBelKe08 = JadwalQuery::create(null, $criteria)
                    ->filterByPembelajaranRelatedByBelKe08($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collJadwalsRelatedByBelKe08Partial && count($collJadwalsRelatedByBelKe08)) {
                      $this->initJadwalsRelatedByBelKe08(false);

                      foreach($collJadwalsRelatedByBelKe08 as $obj) {
                        if (false == $this->collJadwalsRelatedByBelKe08->contains($obj)) {
                          $this->collJadwalsRelatedByBelKe08->append($obj);
                        }
                      }

                      $this->collJadwalsRelatedByBelKe08Partial = true;
                    }

                    $collJadwalsRelatedByBelKe08->getInternalIterator()->rewind();
                    return $collJadwalsRelatedByBelKe08;
                }

                if($partial && $this->collJadwalsRelatedByBelKe08) {
                    foreach($this->collJadwalsRelatedByBelKe08 as $obj) {
                        if($obj->isNew()) {
                            $collJadwalsRelatedByBelKe08[] = $obj;
                        }
                    }
                }

                $this->collJadwalsRelatedByBelKe08 = $collJadwalsRelatedByBelKe08;
                $this->collJadwalsRelatedByBelKe08Partial = false;
            }
        }

        return $this->collJadwalsRelatedByBelKe08;
    }

    /**
     * Sets a collection of JadwalRelatedByBelKe08 objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $jadwalsRelatedByBelKe08 A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Pembelajaran The current object (for fluent API support)
     */
    public function setJadwalsRelatedByBelKe08(PropelCollection $jadwalsRelatedByBelKe08, PropelPDO $con = null)
    {
        $jadwalsRelatedByBelKe08ToDelete = $this->getJadwalsRelatedByBelKe08(new Criteria(), $con)->diff($jadwalsRelatedByBelKe08);

        $this->jadwalsRelatedByBelKe08ScheduledForDeletion = unserialize(serialize($jadwalsRelatedByBelKe08ToDelete));

        foreach ($jadwalsRelatedByBelKe08ToDelete as $jadwalRelatedByBelKe08Removed) {
            $jadwalRelatedByBelKe08Removed->setPembelajaranRelatedByBelKe08(null);
        }

        $this->collJadwalsRelatedByBelKe08 = null;
        foreach ($jadwalsRelatedByBelKe08 as $jadwalRelatedByBelKe08) {
            $this->addJadwalRelatedByBelKe08($jadwalRelatedByBelKe08);
        }

        $this->collJadwalsRelatedByBelKe08 = $jadwalsRelatedByBelKe08;
        $this->collJadwalsRelatedByBelKe08Partial = false;

        return $this;
    }

    /**
     * Returns the number of related Jadwal objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Jadwal objects.
     * @throws PropelException
     */
    public function countJadwalsRelatedByBelKe08(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collJadwalsRelatedByBelKe08Partial && !$this->isNew();
        if (null === $this->collJadwalsRelatedByBelKe08 || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collJadwalsRelatedByBelKe08) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getJadwalsRelatedByBelKe08());
            }
            $query = JadwalQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPembelajaranRelatedByBelKe08($this)
                ->count($con);
        }

        return count($this->collJadwalsRelatedByBelKe08);
    }

    /**
     * Method called to associate a Jadwal object to this object
     * through the Jadwal foreign key attribute.
     *
     * @param    Jadwal $l Jadwal
     * @return Pembelajaran The current object (for fluent API support)
     */
    public function addJadwalRelatedByBelKe08(Jadwal $l)
    {
        if ($this->collJadwalsRelatedByBelKe08 === null) {
            $this->initJadwalsRelatedByBelKe08();
            $this->collJadwalsRelatedByBelKe08Partial = true;
        }
        if (!in_array($l, $this->collJadwalsRelatedByBelKe08->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddJadwalRelatedByBelKe08($l);
        }

        return $this;
    }

    /**
     * @param	JadwalRelatedByBelKe08 $jadwalRelatedByBelKe08 The jadwalRelatedByBelKe08 object to add.
     */
    protected function doAddJadwalRelatedByBelKe08($jadwalRelatedByBelKe08)
    {
        $this->collJadwalsRelatedByBelKe08[]= $jadwalRelatedByBelKe08;
        $jadwalRelatedByBelKe08->setPembelajaranRelatedByBelKe08($this);
    }

    /**
     * @param	JadwalRelatedByBelKe08 $jadwalRelatedByBelKe08 The jadwalRelatedByBelKe08 object to remove.
     * @return Pembelajaran The current object (for fluent API support)
     */
    public function removeJadwalRelatedByBelKe08($jadwalRelatedByBelKe08)
    {
        if ($this->getJadwalsRelatedByBelKe08()->contains($jadwalRelatedByBelKe08)) {
            $this->collJadwalsRelatedByBelKe08->remove($this->collJadwalsRelatedByBelKe08->search($jadwalRelatedByBelKe08));
            if (null === $this->jadwalsRelatedByBelKe08ScheduledForDeletion) {
                $this->jadwalsRelatedByBelKe08ScheduledForDeletion = clone $this->collJadwalsRelatedByBelKe08;
                $this->jadwalsRelatedByBelKe08ScheduledForDeletion->clear();
            }
            $this->jadwalsRelatedByBelKe08ScheduledForDeletion[]= $jadwalRelatedByBelKe08;
            $jadwalRelatedByBelKe08->setPembelajaranRelatedByBelKe08(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pembelajaran is new, it will return
     * an empty collection; or if this Pembelajaran has previously
     * been saved, it will retrieve related JadwalsRelatedByBelKe08 from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pembelajaran.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Jadwal[] List of Jadwal objects
     */
    public function getJadwalsRelatedByBelKe08JoinRuang($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = JadwalQuery::create(null, $criteria);
        $query->joinWith('Ruang', $join_behavior);

        return $this->getJadwalsRelatedByBelKe08($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pembelajaran is new, it will return
     * an empty collection; or if this Pembelajaran has previously
     * been saved, it will retrieve related JadwalsRelatedByBelKe08 from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pembelajaran.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Jadwal[] List of Jadwal objects
     */
    public function getJadwalsRelatedByBelKe08JoinSekolahLongitudinal($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = JadwalQuery::create(null, $criteria);
        $query->joinWith('SekolahLongitudinal', $join_behavior);

        return $this->getJadwalsRelatedByBelKe08($query, $con);
    }

    /**
     * Clears out the collJadwalsRelatedByBelKe09 collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Pembelajaran The current object (for fluent API support)
     * @see        addJadwalsRelatedByBelKe09()
     */
    public function clearJadwalsRelatedByBelKe09()
    {
        $this->collJadwalsRelatedByBelKe09 = null; // important to set this to null since that means it is uninitialized
        $this->collJadwalsRelatedByBelKe09Partial = null;

        return $this;
    }

    /**
     * reset is the collJadwalsRelatedByBelKe09 collection loaded partially
     *
     * @return void
     */
    public function resetPartialJadwalsRelatedByBelKe09($v = true)
    {
        $this->collJadwalsRelatedByBelKe09Partial = $v;
    }

    /**
     * Initializes the collJadwalsRelatedByBelKe09 collection.
     *
     * By default this just sets the collJadwalsRelatedByBelKe09 collection to an empty array (like clearcollJadwalsRelatedByBelKe09());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initJadwalsRelatedByBelKe09($overrideExisting = true)
    {
        if (null !== $this->collJadwalsRelatedByBelKe09 && !$overrideExisting) {
            return;
        }
        $this->collJadwalsRelatedByBelKe09 = new PropelObjectCollection();
        $this->collJadwalsRelatedByBelKe09->setModel('Jadwal');
    }

    /**
     * Gets an array of Jadwal objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Pembelajaran is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Jadwal[] List of Jadwal objects
     * @throws PropelException
     */
    public function getJadwalsRelatedByBelKe09($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collJadwalsRelatedByBelKe09Partial && !$this->isNew();
        if (null === $this->collJadwalsRelatedByBelKe09 || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collJadwalsRelatedByBelKe09) {
                // return empty collection
                $this->initJadwalsRelatedByBelKe09();
            } else {
                $collJadwalsRelatedByBelKe09 = JadwalQuery::create(null, $criteria)
                    ->filterByPembelajaranRelatedByBelKe09($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collJadwalsRelatedByBelKe09Partial && count($collJadwalsRelatedByBelKe09)) {
                      $this->initJadwalsRelatedByBelKe09(false);

                      foreach($collJadwalsRelatedByBelKe09 as $obj) {
                        if (false == $this->collJadwalsRelatedByBelKe09->contains($obj)) {
                          $this->collJadwalsRelatedByBelKe09->append($obj);
                        }
                      }

                      $this->collJadwalsRelatedByBelKe09Partial = true;
                    }

                    $collJadwalsRelatedByBelKe09->getInternalIterator()->rewind();
                    return $collJadwalsRelatedByBelKe09;
                }

                if($partial && $this->collJadwalsRelatedByBelKe09) {
                    foreach($this->collJadwalsRelatedByBelKe09 as $obj) {
                        if($obj->isNew()) {
                            $collJadwalsRelatedByBelKe09[] = $obj;
                        }
                    }
                }

                $this->collJadwalsRelatedByBelKe09 = $collJadwalsRelatedByBelKe09;
                $this->collJadwalsRelatedByBelKe09Partial = false;
            }
        }

        return $this->collJadwalsRelatedByBelKe09;
    }

    /**
     * Sets a collection of JadwalRelatedByBelKe09 objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $jadwalsRelatedByBelKe09 A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Pembelajaran The current object (for fluent API support)
     */
    public function setJadwalsRelatedByBelKe09(PropelCollection $jadwalsRelatedByBelKe09, PropelPDO $con = null)
    {
        $jadwalsRelatedByBelKe09ToDelete = $this->getJadwalsRelatedByBelKe09(new Criteria(), $con)->diff($jadwalsRelatedByBelKe09);

        $this->jadwalsRelatedByBelKe09ScheduledForDeletion = unserialize(serialize($jadwalsRelatedByBelKe09ToDelete));

        foreach ($jadwalsRelatedByBelKe09ToDelete as $jadwalRelatedByBelKe09Removed) {
            $jadwalRelatedByBelKe09Removed->setPembelajaranRelatedByBelKe09(null);
        }

        $this->collJadwalsRelatedByBelKe09 = null;
        foreach ($jadwalsRelatedByBelKe09 as $jadwalRelatedByBelKe09) {
            $this->addJadwalRelatedByBelKe09($jadwalRelatedByBelKe09);
        }

        $this->collJadwalsRelatedByBelKe09 = $jadwalsRelatedByBelKe09;
        $this->collJadwalsRelatedByBelKe09Partial = false;

        return $this;
    }

    /**
     * Returns the number of related Jadwal objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Jadwal objects.
     * @throws PropelException
     */
    public function countJadwalsRelatedByBelKe09(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collJadwalsRelatedByBelKe09Partial && !$this->isNew();
        if (null === $this->collJadwalsRelatedByBelKe09 || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collJadwalsRelatedByBelKe09) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getJadwalsRelatedByBelKe09());
            }
            $query = JadwalQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPembelajaranRelatedByBelKe09($this)
                ->count($con);
        }

        return count($this->collJadwalsRelatedByBelKe09);
    }

    /**
     * Method called to associate a Jadwal object to this object
     * through the Jadwal foreign key attribute.
     *
     * @param    Jadwal $l Jadwal
     * @return Pembelajaran The current object (for fluent API support)
     */
    public function addJadwalRelatedByBelKe09(Jadwal $l)
    {
        if ($this->collJadwalsRelatedByBelKe09 === null) {
            $this->initJadwalsRelatedByBelKe09();
            $this->collJadwalsRelatedByBelKe09Partial = true;
        }
        if (!in_array($l, $this->collJadwalsRelatedByBelKe09->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddJadwalRelatedByBelKe09($l);
        }

        return $this;
    }

    /**
     * @param	JadwalRelatedByBelKe09 $jadwalRelatedByBelKe09 The jadwalRelatedByBelKe09 object to add.
     */
    protected function doAddJadwalRelatedByBelKe09($jadwalRelatedByBelKe09)
    {
        $this->collJadwalsRelatedByBelKe09[]= $jadwalRelatedByBelKe09;
        $jadwalRelatedByBelKe09->setPembelajaranRelatedByBelKe09($this);
    }

    /**
     * @param	JadwalRelatedByBelKe09 $jadwalRelatedByBelKe09 The jadwalRelatedByBelKe09 object to remove.
     * @return Pembelajaran The current object (for fluent API support)
     */
    public function removeJadwalRelatedByBelKe09($jadwalRelatedByBelKe09)
    {
        if ($this->getJadwalsRelatedByBelKe09()->contains($jadwalRelatedByBelKe09)) {
            $this->collJadwalsRelatedByBelKe09->remove($this->collJadwalsRelatedByBelKe09->search($jadwalRelatedByBelKe09));
            if (null === $this->jadwalsRelatedByBelKe09ScheduledForDeletion) {
                $this->jadwalsRelatedByBelKe09ScheduledForDeletion = clone $this->collJadwalsRelatedByBelKe09;
                $this->jadwalsRelatedByBelKe09ScheduledForDeletion->clear();
            }
            $this->jadwalsRelatedByBelKe09ScheduledForDeletion[]= $jadwalRelatedByBelKe09;
            $jadwalRelatedByBelKe09->setPembelajaranRelatedByBelKe09(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pembelajaran is new, it will return
     * an empty collection; or if this Pembelajaran has previously
     * been saved, it will retrieve related JadwalsRelatedByBelKe09 from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pembelajaran.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Jadwal[] List of Jadwal objects
     */
    public function getJadwalsRelatedByBelKe09JoinRuang($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = JadwalQuery::create(null, $criteria);
        $query->joinWith('Ruang', $join_behavior);

        return $this->getJadwalsRelatedByBelKe09($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pembelajaran is new, it will return
     * an empty collection; or if this Pembelajaran has previously
     * been saved, it will retrieve related JadwalsRelatedByBelKe09 from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pembelajaran.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Jadwal[] List of Jadwal objects
     */
    public function getJadwalsRelatedByBelKe09JoinSekolahLongitudinal($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = JadwalQuery::create(null, $criteria);
        $query->joinWith('SekolahLongitudinal', $join_behavior);

        return $this->getJadwalsRelatedByBelKe09($query, $con);
    }

    /**
     * Clears out the collJadwalsRelatedByBelKe10 collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Pembelajaran The current object (for fluent API support)
     * @see        addJadwalsRelatedByBelKe10()
     */
    public function clearJadwalsRelatedByBelKe10()
    {
        $this->collJadwalsRelatedByBelKe10 = null; // important to set this to null since that means it is uninitialized
        $this->collJadwalsRelatedByBelKe10Partial = null;

        return $this;
    }

    /**
     * reset is the collJadwalsRelatedByBelKe10 collection loaded partially
     *
     * @return void
     */
    public function resetPartialJadwalsRelatedByBelKe10($v = true)
    {
        $this->collJadwalsRelatedByBelKe10Partial = $v;
    }

    /**
     * Initializes the collJadwalsRelatedByBelKe10 collection.
     *
     * By default this just sets the collJadwalsRelatedByBelKe10 collection to an empty array (like clearcollJadwalsRelatedByBelKe10());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initJadwalsRelatedByBelKe10($overrideExisting = true)
    {
        if (null !== $this->collJadwalsRelatedByBelKe10 && !$overrideExisting) {
            return;
        }
        $this->collJadwalsRelatedByBelKe10 = new PropelObjectCollection();
        $this->collJadwalsRelatedByBelKe10->setModel('Jadwal');
    }

    /**
     * Gets an array of Jadwal objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Pembelajaran is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Jadwal[] List of Jadwal objects
     * @throws PropelException
     */
    public function getJadwalsRelatedByBelKe10($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collJadwalsRelatedByBelKe10Partial && !$this->isNew();
        if (null === $this->collJadwalsRelatedByBelKe10 || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collJadwalsRelatedByBelKe10) {
                // return empty collection
                $this->initJadwalsRelatedByBelKe10();
            } else {
                $collJadwalsRelatedByBelKe10 = JadwalQuery::create(null, $criteria)
                    ->filterByPembelajaranRelatedByBelKe10($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collJadwalsRelatedByBelKe10Partial && count($collJadwalsRelatedByBelKe10)) {
                      $this->initJadwalsRelatedByBelKe10(false);

                      foreach($collJadwalsRelatedByBelKe10 as $obj) {
                        if (false == $this->collJadwalsRelatedByBelKe10->contains($obj)) {
                          $this->collJadwalsRelatedByBelKe10->append($obj);
                        }
                      }

                      $this->collJadwalsRelatedByBelKe10Partial = true;
                    }

                    $collJadwalsRelatedByBelKe10->getInternalIterator()->rewind();
                    return $collJadwalsRelatedByBelKe10;
                }

                if($partial && $this->collJadwalsRelatedByBelKe10) {
                    foreach($this->collJadwalsRelatedByBelKe10 as $obj) {
                        if($obj->isNew()) {
                            $collJadwalsRelatedByBelKe10[] = $obj;
                        }
                    }
                }

                $this->collJadwalsRelatedByBelKe10 = $collJadwalsRelatedByBelKe10;
                $this->collJadwalsRelatedByBelKe10Partial = false;
            }
        }

        return $this->collJadwalsRelatedByBelKe10;
    }

    /**
     * Sets a collection of JadwalRelatedByBelKe10 objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $jadwalsRelatedByBelKe10 A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Pembelajaran The current object (for fluent API support)
     */
    public function setJadwalsRelatedByBelKe10(PropelCollection $jadwalsRelatedByBelKe10, PropelPDO $con = null)
    {
        $jadwalsRelatedByBelKe10ToDelete = $this->getJadwalsRelatedByBelKe10(new Criteria(), $con)->diff($jadwalsRelatedByBelKe10);

        $this->jadwalsRelatedByBelKe10ScheduledForDeletion = unserialize(serialize($jadwalsRelatedByBelKe10ToDelete));

        foreach ($jadwalsRelatedByBelKe10ToDelete as $jadwalRelatedByBelKe10Removed) {
            $jadwalRelatedByBelKe10Removed->setPembelajaranRelatedByBelKe10(null);
        }

        $this->collJadwalsRelatedByBelKe10 = null;
        foreach ($jadwalsRelatedByBelKe10 as $jadwalRelatedByBelKe10) {
            $this->addJadwalRelatedByBelKe10($jadwalRelatedByBelKe10);
        }

        $this->collJadwalsRelatedByBelKe10 = $jadwalsRelatedByBelKe10;
        $this->collJadwalsRelatedByBelKe10Partial = false;

        return $this;
    }

    /**
     * Returns the number of related Jadwal objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Jadwal objects.
     * @throws PropelException
     */
    public function countJadwalsRelatedByBelKe10(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collJadwalsRelatedByBelKe10Partial && !$this->isNew();
        if (null === $this->collJadwalsRelatedByBelKe10 || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collJadwalsRelatedByBelKe10) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getJadwalsRelatedByBelKe10());
            }
            $query = JadwalQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPembelajaranRelatedByBelKe10($this)
                ->count($con);
        }

        return count($this->collJadwalsRelatedByBelKe10);
    }

    /**
     * Method called to associate a Jadwal object to this object
     * through the Jadwal foreign key attribute.
     *
     * @param    Jadwal $l Jadwal
     * @return Pembelajaran The current object (for fluent API support)
     */
    public function addJadwalRelatedByBelKe10(Jadwal $l)
    {
        if ($this->collJadwalsRelatedByBelKe10 === null) {
            $this->initJadwalsRelatedByBelKe10();
            $this->collJadwalsRelatedByBelKe10Partial = true;
        }
        if (!in_array($l, $this->collJadwalsRelatedByBelKe10->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddJadwalRelatedByBelKe10($l);
        }

        return $this;
    }

    /**
     * @param	JadwalRelatedByBelKe10 $jadwalRelatedByBelKe10 The jadwalRelatedByBelKe10 object to add.
     */
    protected function doAddJadwalRelatedByBelKe10($jadwalRelatedByBelKe10)
    {
        $this->collJadwalsRelatedByBelKe10[]= $jadwalRelatedByBelKe10;
        $jadwalRelatedByBelKe10->setPembelajaranRelatedByBelKe10($this);
    }

    /**
     * @param	JadwalRelatedByBelKe10 $jadwalRelatedByBelKe10 The jadwalRelatedByBelKe10 object to remove.
     * @return Pembelajaran The current object (for fluent API support)
     */
    public function removeJadwalRelatedByBelKe10($jadwalRelatedByBelKe10)
    {
        if ($this->getJadwalsRelatedByBelKe10()->contains($jadwalRelatedByBelKe10)) {
            $this->collJadwalsRelatedByBelKe10->remove($this->collJadwalsRelatedByBelKe10->search($jadwalRelatedByBelKe10));
            if (null === $this->jadwalsRelatedByBelKe10ScheduledForDeletion) {
                $this->jadwalsRelatedByBelKe10ScheduledForDeletion = clone $this->collJadwalsRelatedByBelKe10;
                $this->jadwalsRelatedByBelKe10ScheduledForDeletion->clear();
            }
            $this->jadwalsRelatedByBelKe10ScheduledForDeletion[]= $jadwalRelatedByBelKe10;
            $jadwalRelatedByBelKe10->setPembelajaranRelatedByBelKe10(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pembelajaran is new, it will return
     * an empty collection; or if this Pembelajaran has previously
     * been saved, it will retrieve related JadwalsRelatedByBelKe10 from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pembelajaran.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Jadwal[] List of Jadwal objects
     */
    public function getJadwalsRelatedByBelKe10JoinRuang($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = JadwalQuery::create(null, $criteria);
        $query->joinWith('Ruang', $join_behavior);

        return $this->getJadwalsRelatedByBelKe10($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pembelajaran is new, it will return
     * an empty collection; or if this Pembelajaran has previously
     * been saved, it will retrieve related JadwalsRelatedByBelKe10 from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pembelajaran.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Jadwal[] List of Jadwal objects
     */
    public function getJadwalsRelatedByBelKe10JoinSekolahLongitudinal($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = JadwalQuery::create(null, $criteria);
        $query->joinWith('SekolahLongitudinal', $join_behavior);

        return $this->getJadwalsRelatedByBelKe10($query, $con);
    }

    /**
     * Clears out the collJadwalsRelatedByBelKe11 collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Pembelajaran The current object (for fluent API support)
     * @see        addJadwalsRelatedByBelKe11()
     */
    public function clearJadwalsRelatedByBelKe11()
    {
        $this->collJadwalsRelatedByBelKe11 = null; // important to set this to null since that means it is uninitialized
        $this->collJadwalsRelatedByBelKe11Partial = null;

        return $this;
    }

    /**
     * reset is the collJadwalsRelatedByBelKe11 collection loaded partially
     *
     * @return void
     */
    public function resetPartialJadwalsRelatedByBelKe11($v = true)
    {
        $this->collJadwalsRelatedByBelKe11Partial = $v;
    }

    /**
     * Initializes the collJadwalsRelatedByBelKe11 collection.
     *
     * By default this just sets the collJadwalsRelatedByBelKe11 collection to an empty array (like clearcollJadwalsRelatedByBelKe11());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initJadwalsRelatedByBelKe11($overrideExisting = true)
    {
        if (null !== $this->collJadwalsRelatedByBelKe11 && !$overrideExisting) {
            return;
        }
        $this->collJadwalsRelatedByBelKe11 = new PropelObjectCollection();
        $this->collJadwalsRelatedByBelKe11->setModel('Jadwal');
    }

    /**
     * Gets an array of Jadwal objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Pembelajaran is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Jadwal[] List of Jadwal objects
     * @throws PropelException
     */
    public function getJadwalsRelatedByBelKe11($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collJadwalsRelatedByBelKe11Partial && !$this->isNew();
        if (null === $this->collJadwalsRelatedByBelKe11 || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collJadwalsRelatedByBelKe11) {
                // return empty collection
                $this->initJadwalsRelatedByBelKe11();
            } else {
                $collJadwalsRelatedByBelKe11 = JadwalQuery::create(null, $criteria)
                    ->filterByPembelajaranRelatedByBelKe11($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collJadwalsRelatedByBelKe11Partial && count($collJadwalsRelatedByBelKe11)) {
                      $this->initJadwalsRelatedByBelKe11(false);

                      foreach($collJadwalsRelatedByBelKe11 as $obj) {
                        if (false == $this->collJadwalsRelatedByBelKe11->contains($obj)) {
                          $this->collJadwalsRelatedByBelKe11->append($obj);
                        }
                      }

                      $this->collJadwalsRelatedByBelKe11Partial = true;
                    }

                    $collJadwalsRelatedByBelKe11->getInternalIterator()->rewind();
                    return $collJadwalsRelatedByBelKe11;
                }

                if($partial && $this->collJadwalsRelatedByBelKe11) {
                    foreach($this->collJadwalsRelatedByBelKe11 as $obj) {
                        if($obj->isNew()) {
                            $collJadwalsRelatedByBelKe11[] = $obj;
                        }
                    }
                }

                $this->collJadwalsRelatedByBelKe11 = $collJadwalsRelatedByBelKe11;
                $this->collJadwalsRelatedByBelKe11Partial = false;
            }
        }

        return $this->collJadwalsRelatedByBelKe11;
    }

    /**
     * Sets a collection of JadwalRelatedByBelKe11 objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $jadwalsRelatedByBelKe11 A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Pembelajaran The current object (for fluent API support)
     */
    public function setJadwalsRelatedByBelKe11(PropelCollection $jadwalsRelatedByBelKe11, PropelPDO $con = null)
    {
        $jadwalsRelatedByBelKe11ToDelete = $this->getJadwalsRelatedByBelKe11(new Criteria(), $con)->diff($jadwalsRelatedByBelKe11);

        $this->jadwalsRelatedByBelKe11ScheduledForDeletion = unserialize(serialize($jadwalsRelatedByBelKe11ToDelete));

        foreach ($jadwalsRelatedByBelKe11ToDelete as $jadwalRelatedByBelKe11Removed) {
            $jadwalRelatedByBelKe11Removed->setPembelajaranRelatedByBelKe11(null);
        }

        $this->collJadwalsRelatedByBelKe11 = null;
        foreach ($jadwalsRelatedByBelKe11 as $jadwalRelatedByBelKe11) {
            $this->addJadwalRelatedByBelKe11($jadwalRelatedByBelKe11);
        }

        $this->collJadwalsRelatedByBelKe11 = $jadwalsRelatedByBelKe11;
        $this->collJadwalsRelatedByBelKe11Partial = false;

        return $this;
    }

    /**
     * Returns the number of related Jadwal objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Jadwal objects.
     * @throws PropelException
     */
    public function countJadwalsRelatedByBelKe11(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collJadwalsRelatedByBelKe11Partial && !$this->isNew();
        if (null === $this->collJadwalsRelatedByBelKe11 || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collJadwalsRelatedByBelKe11) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getJadwalsRelatedByBelKe11());
            }
            $query = JadwalQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPembelajaranRelatedByBelKe11($this)
                ->count($con);
        }

        return count($this->collJadwalsRelatedByBelKe11);
    }

    /**
     * Method called to associate a Jadwal object to this object
     * through the Jadwal foreign key attribute.
     *
     * @param    Jadwal $l Jadwal
     * @return Pembelajaran The current object (for fluent API support)
     */
    public function addJadwalRelatedByBelKe11(Jadwal $l)
    {
        if ($this->collJadwalsRelatedByBelKe11 === null) {
            $this->initJadwalsRelatedByBelKe11();
            $this->collJadwalsRelatedByBelKe11Partial = true;
        }
        if (!in_array($l, $this->collJadwalsRelatedByBelKe11->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddJadwalRelatedByBelKe11($l);
        }

        return $this;
    }

    /**
     * @param	JadwalRelatedByBelKe11 $jadwalRelatedByBelKe11 The jadwalRelatedByBelKe11 object to add.
     */
    protected function doAddJadwalRelatedByBelKe11($jadwalRelatedByBelKe11)
    {
        $this->collJadwalsRelatedByBelKe11[]= $jadwalRelatedByBelKe11;
        $jadwalRelatedByBelKe11->setPembelajaranRelatedByBelKe11($this);
    }

    /**
     * @param	JadwalRelatedByBelKe11 $jadwalRelatedByBelKe11 The jadwalRelatedByBelKe11 object to remove.
     * @return Pembelajaran The current object (for fluent API support)
     */
    public function removeJadwalRelatedByBelKe11($jadwalRelatedByBelKe11)
    {
        if ($this->getJadwalsRelatedByBelKe11()->contains($jadwalRelatedByBelKe11)) {
            $this->collJadwalsRelatedByBelKe11->remove($this->collJadwalsRelatedByBelKe11->search($jadwalRelatedByBelKe11));
            if (null === $this->jadwalsRelatedByBelKe11ScheduledForDeletion) {
                $this->jadwalsRelatedByBelKe11ScheduledForDeletion = clone $this->collJadwalsRelatedByBelKe11;
                $this->jadwalsRelatedByBelKe11ScheduledForDeletion->clear();
            }
            $this->jadwalsRelatedByBelKe11ScheduledForDeletion[]= $jadwalRelatedByBelKe11;
            $jadwalRelatedByBelKe11->setPembelajaranRelatedByBelKe11(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pembelajaran is new, it will return
     * an empty collection; or if this Pembelajaran has previously
     * been saved, it will retrieve related JadwalsRelatedByBelKe11 from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pembelajaran.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Jadwal[] List of Jadwal objects
     */
    public function getJadwalsRelatedByBelKe11JoinRuang($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = JadwalQuery::create(null, $criteria);
        $query->joinWith('Ruang', $join_behavior);

        return $this->getJadwalsRelatedByBelKe11($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pembelajaran is new, it will return
     * an empty collection; or if this Pembelajaran has previously
     * been saved, it will retrieve related JadwalsRelatedByBelKe11 from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pembelajaran.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Jadwal[] List of Jadwal objects
     */
    public function getJadwalsRelatedByBelKe11JoinSekolahLongitudinal($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = JadwalQuery::create(null, $criteria);
        $query->joinWith('SekolahLongitudinal', $join_behavior);

        return $this->getJadwalsRelatedByBelKe11($query, $con);
    }

    /**
     * Clears out the collJadwalsRelatedByBelKe12 collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Pembelajaran The current object (for fluent API support)
     * @see        addJadwalsRelatedByBelKe12()
     */
    public function clearJadwalsRelatedByBelKe12()
    {
        $this->collJadwalsRelatedByBelKe12 = null; // important to set this to null since that means it is uninitialized
        $this->collJadwalsRelatedByBelKe12Partial = null;

        return $this;
    }

    /**
     * reset is the collJadwalsRelatedByBelKe12 collection loaded partially
     *
     * @return void
     */
    public function resetPartialJadwalsRelatedByBelKe12($v = true)
    {
        $this->collJadwalsRelatedByBelKe12Partial = $v;
    }

    /**
     * Initializes the collJadwalsRelatedByBelKe12 collection.
     *
     * By default this just sets the collJadwalsRelatedByBelKe12 collection to an empty array (like clearcollJadwalsRelatedByBelKe12());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initJadwalsRelatedByBelKe12($overrideExisting = true)
    {
        if (null !== $this->collJadwalsRelatedByBelKe12 && !$overrideExisting) {
            return;
        }
        $this->collJadwalsRelatedByBelKe12 = new PropelObjectCollection();
        $this->collJadwalsRelatedByBelKe12->setModel('Jadwal');
    }

    /**
     * Gets an array of Jadwal objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Pembelajaran is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Jadwal[] List of Jadwal objects
     * @throws PropelException
     */
    public function getJadwalsRelatedByBelKe12($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collJadwalsRelatedByBelKe12Partial && !$this->isNew();
        if (null === $this->collJadwalsRelatedByBelKe12 || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collJadwalsRelatedByBelKe12) {
                // return empty collection
                $this->initJadwalsRelatedByBelKe12();
            } else {
                $collJadwalsRelatedByBelKe12 = JadwalQuery::create(null, $criteria)
                    ->filterByPembelajaranRelatedByBelKe12($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collJadwalsRelatedByBelKe12Partial && count($collJadwalsRelatedByBelKe12)) {
                      $this->initJadwalsRelatedByBelKe12(false);

                      foreach($collJadwalsRelatedByBelKe12 as $obj) {
                        if (false == $this->collJadwalsRelatedByBelKe12->contains($obj)) {
                          $this->collJadwalsRelatedByBelKe12->append($obj);
                        }
                      }

                      $this->collJadwalsRelatedByBelKe12Partial = true;
                    }

                    $collJadwalsRelatedByBelKe12->getInternalIterator()->rewind();
                    return $collJadwalsRelatedByBelKe12;
                }

                if($partial && $this->collJadwalsRelatedByBelKe12) {
                    foreach($this->collJadwalsRelatedByBelKe12 as $obj) {
                        if($obj->isNew()) {
                            $collJadwalsRelatedByBelKe12[] = $obj;
                        }
                    }
                }

                $this->collJadwalsRelatedByBelKe12 = $collJadwalsRelatedByBelKe12;
                $this->collJadwalsRelatedByBelKe12Partial = false;
            }
        }

        return $this->collJadwalsRelatedByBelKe12;
    }

    /**
     * Sets a collection of JadwalRelatedByBelKe12 objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $jadwalsRelatedByBelKe12 A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Pembelajaran The current object (for fluent API support)
     */
    public function setJadwalsRelatedByBelKe12(PropelCollection $jadwalsRelatedByBelKe12, PropelPDO $con = null)
    {
        $jadwalsRelatedByBelKe12ToDelete = $this->getJadwalsRelatedByBelKe12(new Criteria(), $con)->diff($jadwalsRelatedByBelKe12);

        $this->jadwalsRelatedByBelKe12ScheduledForDeletion = unserialize(serialize($jadwalsRelatedByBelKe12ToDelete));

        foreach ($jadwalsRelatedByBelKe12ToDelete as $jadwalRelatedByBelKe12Removed) {
            $jadwalRelatedByBelKe12Removed->setPembelajaranRelatedByBelKe12(null);
        }

        $this->collJadwalsRelatedByBelKe12 = null;
        foreach ($jadwalsRelatedByBelKe12 as $jadwalRelatedByBelKe12) {
            $this->addJadwalRelatedByBelKe12($jadwalRelatedByBelKe12);
        }

        $this->collJadwalsRelatedByBelKe12 = $jadwalsRelatedByBelKe12;
        $this->collJadwalsRelatedByBelKe12Partial = false;

        return $this;
    }

    /**
     * Returns the number of related Jadwal objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Jadwal objects.
     * @throws PropelException
     */
    public function countJadwalsRelatedByBelKe12(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collJadwalsRelatedByBelKe12Partial && !$this->isNew();
        if (null === $this->collJadwalsRelatedByBelKe12 || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collJadwalsRelatedByBelKe12) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getJadwalsRelatedByBelKe12());
            }
            $query = JadwalQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPembelajaranRelatedByBelKe12($this)
                ->count($con);
        }

        return count($this->collJadwalsRelatedByBelKe12);
    }

    /**
     * Method called to associate a Jadwal object to this object
     * through the Jadwal foreign key attribute.
     *
     * @param    Jadwal $l Jadwal
     * @return Pembelajaran The current object (for fluent API support)
     */
    public function addJadwalRelatedByBelKe12(Jadwal $l)
    {
        if ($this->collJadwalsRelatedByBelKe12 === null) {
            $this->initJadwalsRelatedByBelKe12();
            $this->collJadwalsRelatedByBelKe12Partial = true;
        }
        if (!in_array($l, $this->collJadwalsRelatedByBelKe12->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddJadwalRelatedByBelKe12($l);
        }

        return $this;
    }

    /**
     * @param	JadwalRelatedByBelKe12 $jadwalRelatedByBelKe12 The jadwalRelatedByBelKe12 object to add.
     */
    protected function doAddJadwalRelatedByBelKe12($jadwalRelatedByBelKe12)
    {
        $this->collJadwalsRelatedByBelKe12[]= $jadwalRelatedByBelKe12;
        $jadwalRelatedByBelKe12->setPembelajaranRelatedByBelKe12($this);
    }

    /**
     * @param	JadwalRelatedByBelKe12 $jadwalRelatedByBelKe12 The jadwalRelatedByBelKe12 object to remove.
     * @return Pembelajaran The current object (for fluent API support)
     */
    public function removeJadwalRelatedByBelKe12($jadwalRelatedByBelKe12)
    {
        if ($this->getJadwalsRelatedByBelKe12()->contains($jadwalRelatedByBelKe12)) {
            $this->collJadwalsRelatedByBelKe12->remove($this->collJadwalsRelatedByBelKe12->search($jadwalRelatedByBelKe12));
            if (null === $this->jadwalsRelatedByBelKe12ScheduledForDeletion) {
                $this->jadwalsRelatedByBelKe12ScheduledForDeletion = clone $this->collJadwalsRelatedByBelKe12;
                $this->jadwalsRelatedByBelKe12ScheduledForDeletion->clear();
            }
            $this->jadwalsRelatedByBelKe12ScheduledForDeletion[]= $jadwalRelatedByBelKe12;
            $jadwalRelatedByBelKe12->setPembelajaranRelatedByBelKe12(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pembelajaran is new, it will return
     * an empty collection; or if this Pembelajaran has previously
     * been saved, it will retrieve related JadwalsRelatedByBelKe12 from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pembelajaran.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Jadwal[] List of Jadwal objects
     */
    public function getJadwalsRelatedByBelKe12JoinRuang($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = JadwalQuery::create(null, $criteria);
        $query->joinWith('Ruang', $join_behavior);

        return $this->getJadwalsRelatedByBelKe12($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pembelajaran is new, it will return
     * an empty collection; or if this Pembelajaran has previously
     * been saved, it will retrieve related JadwalsRelatedByBelKe12 from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pembelajaran.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Jadwal[] List of Jadwal objects
     */
    public function getJadwalsRelatedByBelKe12JoinSekolahLongitudinal($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = JadwalQuery::create(null, $criteria);
        $query->joinWith('SekolahLongitudinal', $join_behavior);

        return $this->getJadwalsRelatedByBelKe12($query, $con);
    }

    /**
     * Clears out the collJadwalsRelatedByBelKe13 collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Pembelajaran The current object (for fluent API support)
     * @see        addJadwalsRelatedByBelKe13()
     */
    public function clearJadwalsRelatedByBelKe13()
    {
        $this->collJadwalsRelatedByBelKe13 = null; // important to set this to null since that means it is uninitialized
        $this->collJadwalsRelatedByBelKe13Partial = null;

        return $this;
    }

    /**
     * reset is the collJadwalsRelatedByBelKe13 collection loaded partially
     *
     * @return void
     */
    public function resetPartialJadwalsRelatedByBelKe13($v = true)
    {
        $this->collJadwalsRelatedByBelKe13Partial = $v;
    }

    /**
     * Initializes the collJadwalsRelatedByBelKe13 collection.
     *
     * By default this just sets the collJadwalsRelatedByBelKe13 collection to an empty array (like clearcollJadwalsRelatedByBelKe13());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initJadwalsRelatedByBelKe13($overrideExisting = true)
    {
        if (null !== $this->collJadwalsRelatedByBelKe13 && !$overrideExisting) {
            return;
        }
        $this->collJadwalsRelatedByBelKe13 = new PropelObjectCollection();
        $this->collJadwalsRelatedByBelKe13->setModel('Jadwal');
    }

    /**
     * Gets an array of Jadwal objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Pembelajaran is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Jadwal[] List of Jadwal objects
     * @throws PropelException
     */
    public function getJadwalsRelatedByBelKe13($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collJadwalsRelatedByBelKe13Partial && !$this->isNew();
        if (null === $this->collJadwalsRelatedByBelKe13 || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collJadwalsRelatedByBelKe13) {
                // return empty collection
                $this->initJadwalsRelatedByBelKe13();
            } else {
                $collJadwalsRelatedByBelKe13 = JadwalQuery::create(null, $criteria)
                    ->filterByPembelajaranRelatedByBelKe13($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collJadwalsRelatedByBelKe13Partial && count($collJadwalsRelatedByBelKe13)) {
                      $this->initJadwalsRelatedByBelKe13(false);

                      foreach($collJadwalsRelatedByBelKe13 as $obj) {
                        if (false == $this->collJadwalsRelatedByBelKe13->contains($obj)) {
                          $this->collJadwalsRelatedByBelKe13->append($obj);
                        }
                      }

                      $this->collJadwalsRelatedByBelKe13Partial = true;
                    }

                    $collJadwalsRelatedByBelKe13->getInternalIterator()->rewind();
                    return $collJadwalsRelatedByBelKe13;
                }

                if($partial && $this->collJadwalsRelatedByBelKe13) {
                    foreach($this->collJadwalsRelatedByBelKe13 as $obj) {
                        if($obj->isNew()) {
                            $collJadwalsRelatedByBelKe13[] = $obj;
                        }
                    }
                }

                $this->collJadwalsRelatedByBelKe13 = $collJadwalsRelatedByBelKe13;
                $this->collJadwalsRelatedByBelKe13Partial = false;
            }
        }

        return $this->collJadwalsRelatedByBelKe13;
    }

    /**
     * Sets a collection of JadwalRelatedByBelKe13 objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $jadwalsRelatedByBelKe13 A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Pembelajaran The current object (for fluent API support)
     */
    public function setJadwalsRelatedByBelKe13(PropelCollection $jadwalsRelatedByBelKe13, PropelPDO $con = null)
    {
        $jadwalsRelatedByBelKe13ToDelete = $this->getJadwalsRelatedByBelKe13(new Criteria(), $con)->diff($jadwalsRelatedByBelKe13);

        $this->jadwalsRelatedByBelKe13ScheduledForDeletion = unserialize(serialize($jadwalsRelatedByBelKe13ToDelete));

        foreach ($jadwalsRelatedByBelKe13ToDelete as $jadwalRelatedByBelKe13Removed) {
            $jadwalRelatedByBelKe13Removed->setPembelajaranRelatedByBelKe13(null);
        }

        $this->collJadwalsRelatedByBelKe13 = null;
        foreach ($jadwalsRelatedByBelKe13 as $jadwalRelatedByBelKe13) {
            $this->addJadwalRelatedByBelKe13($jadwalRelatedByBelKe13);
        }

        $this->collJadwalsRelatedByBelKe13 = $jadwalsRelatedByBelKe13;
        $this->collJadwalsRelatedByBelKe13Partial = false;

        return $this;
    }

    /**
     * Returns the number of related Jadwal objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Jadwal objects.
     * @throws PropelException
     */
    public function countJadwalsRelatedByBelKe13(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collJadwalsRelatedByBelKe13Partial && !$this->isNew();
        if (null === $this->collJadwalsRelatedByBelKe13 || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collJadwalsRelatedByBelKe13) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getJadwalsRelatedByBelKe13());
            }
            $query = JadwalQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPembelajaranRelatedByBelKe13($this)
                ->count($con);
        }

        return count($this->collJadwalsRelatedByBelKe13);
    }

    /**
     * Method called to associate a Jadwal object to this object
     * through the Jadwal foreign key attribute.
     *
     * @param    Jadwal $l Jadwal
     * @return Pembelajaran The current object (for fluent API support)
     */
    public function addJadwalRelatedByBelKe13(Jadwal $l)
    {
        if ($this->collJadwalsRelatedByBelKe13 === null) {
            $this->initJadwalsRelatedByBelKe13();
            $this->collJadwalsRelatedByBelKe13Partial = true;
        }
        if (!in_array($l, $this->collJadwalsRelatedByBelKe13->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddJadwalRelatedByBelKe13($l);
        }

        return $this;
    }

    /**
     * @param	JadwalRelatedByBelKe13 $jadwalRelatedByBelKe13 The jadwalRelatedByBelKe13 object to add.
     */
    protected function doAddJadwalRelatedByBelKe13($jadwalRelatedByBelKe13)
    {
        $this->collJadwalsRelatedByBelKe13[]= $jadwalRelatedByBelKe13;
        $jadwalRelatedByBelKe13->setPembelajaranRelatedByBelKe13($this);
    }

    /**
     * @param	JadwalRelatedByBelKe13 $jadwalRelatedByBelKe13 The jadwalRelatedByBelKe13 object to remove.
     * @return Pembelajaran The current object (for fluent API support)
     */
    public function removeJadwalRelatedByBelKe13($jadwalRelatedByBelKe13)
    {
        if ($this->getJadwalsRelatedByBelKe13()->contains($jadwalRelatedByBelKe13)) {
            $this->collJadwalsRelatedByBelKe13->remove($this->collJadwalsRelatedByBelKe13->search($jadwalRelatedByBelKe13));
            if (null === $this->jadwalsRelatedByBelKe13ScheduledForDeletion) {
                $this->jadwalsRelatedByBelKe13ScheduledForDeletion = clone $this->collJadwalsRelatedByBelKe13;
                $this->jadwalsRelatedByBelKe13ScheduledForDeletion->clear();
            }
            $this->jadwalsRelatedByBelKe13ScheduledForDeletion[]= $jadwalRelatedByBelKe13;
            $jadwalRelatedByBelKe13->setPembelajaranRelatedByBelKe13(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pembelajaran is new, it will return
     * an empty collection; or if this Pembelajaran has previously
     * been saved, it will retrieve related JadwalsRelatedByBelKe13 from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pembelajaran.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Jadwal[] List of Jadwal objects
     */
    public function getJadwalsRelatedByBelKe13JoinRuang($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = JadwalQuery::create(null, $criteria);
        $query->joinWith('Ruang', $join_behavior);

        return $this->getJadwalsRelatedByBelKe13($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pembelajaran is new, it will return
     * an empty collection; or if this Pembelajaran has previously
     * been saved, it will retrieve related JadwalsRelatedByBelKe13 from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pembelajaran.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Jadwal[] List of Jadwal objects
     */
    public function getJadwalsRelatedByBelKe13JoinSekolahLongitudinal($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = JadwalQuery::create(null, $criteria);
        $query->joinWith('SekolahLongitudinal', $join_behavior);

        return $this->getJadwalsRelatedByBelKe13($query, $con);
    }

    /**
     * Clears out the collJadwalsRelatedByBelKe14 collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Pembelajaran The current object (for fluent API support)
     * @see        addJadwalsRelatedByBelKe14()
     */
    public function clearJadwalsRelatedByBelKe14()
    {
        $this->collJadwalsRelatedByBelKe14 = null; // important to set this to null since that means it is uninitialized
        $this->collJadwalsRelatedByBelKe14Partial = null;

        return $this;
    }

    /**
     * reset is the collJadwalsRelatedByBelKe14 collection loaded partially
     *
     * @return void
     */
    public function resetPartialJadwalsRelatedByBelKe14($v = true)
    {
        $this->collJadwalsRelatedByBelKe14Partial = $v;
    }

    /**
     * Initializes the collJadwalsRelatedByBelKe14 collection.
     *
     * By default this just sets the collJadwalsRelatedByBelKe14 collection to an empty array (like clearcollJadwalsRelatedByBelKe14());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initJadwalsRelatedByBelKe14($overrideExisting = true)
    {
        if (null !== $this->collJadwalsRelatedByBelKe14 && !$overrideExisting) {
            return;
        }
        $this->collJadwalsRelatedByBelKe14 = new PropelObjectCollection();
        $this->collJadwalsRelatedByBelKe14->setModel('Jadwal');
    }

    /**
     * Gets an array of Jadwal objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Pembelajaran is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Jadwal[] List of Jadwal objects
     * @throws PropelException
     */
    public function getJadwalsRelatedByBelKe14($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collJadwalsRelatedByBelKe14Partial && !$this->isNew();
        if (null === $this->collJadwalsRelatedByBelKe14 || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collJadwalsRelatedByBelKe14) {
                // return empty collection
                $this->initJadwalsRelatedByBelKe14();
            } else {
                $collJadwalsRelatedByBelKe14 = JadwalQuery::create(null, $criteria)
                    ->filterByPembelajaranRelatedByBelKe14($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collJadwalsRelatedByBelKe14Partial && count($collJadwalsRelatedByBelKe14)) {
                      $this->initJadwalsRelatedByBelKe14(false);

                      foreach($collJadwalsRelatedByBelKe14 as $obj) {
                        if (false == $this->collJadwalsRelatedByBelKe14->contains($obj)) {
                          $this->collJadwalsRelatedByBelKe14->append($obj);
                        }
                      }

                      $this->collJadwalsRelatedByBelKe14Partial = true;
                    }

                    $collJadwalsRelatedByBelKe14->getInternalIterator()->rewind();
                    return $collJadwalsRelatedByBelKe14;
                }

                if($partial && $this->collJadwalsRelatedByBelKe14) {
                    foreach($this->collJadwalsRelatedByBelKe14 as $obj) {
                        if($obj->isNew()) {
                            $collJadwalsRelatedByBelKe14[] = $obj;
                        }
                    }
                }

                $this->collJadwalsRelatedByBelKe14 = $collJadwalsRelatedByBelKe14;
                $this->collJadwalsRelatedByBelKe14Partial = false;
            }
        }

        return $this->collJadwalsRelatedByBelKe14;
    }

    /**
     * Sets a collection of JadwalRelatedByBelKe14 objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $jadwalsRelatedByBelKe14 A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Pembelajaran The current object (for fluent API support)
     */
    public function setJadwalsRelatedByBelKe14(PropelCollection $jadwalsRelatedByBelKe14, PropelPDO $con = null)
    {
        $jadwalsRelatedByBelKe14ToDelete = $this->getJadwalsRelatedByBelKe14(new Criteria(), $con)->diff($jadwalsRelatedByBelKe14);

        $this->jadwalsRelatedByBelKe14ScheduledForDeletion = unserialize(serialize($jadwalsRelatedByBelKe14ToDelete));

        foreach ($jadwalsRelatedByBelKe14ToDelete as $jadwalRelatedByBelKe14Removed) {
            $jadwalRelatedByBelKe14Removed->setPembelajaranRelatedByBelKe14(null);
        }

        $this->collJadwalsRelatedByBelKe14 = null;
        foreach ($jadwalsRelatedByBelKe14 as $jadwalRelatedByBelKe14) {
            $this->addJadwalRelatedByBelKe14($jadwalRelatedByBelKe14);
        }

        $this->collJadwalsRelatedByBelKe14 = $jadwalsRelatedByBelKe14;
        $this->collJadwalsRelatedByBelKe14Partial = false;

        return $this;
    }

    /**
     * Returns the number of related Jadwal objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Jadwal objects.
     * @throws PropelException
     */
    public function countJadwalsRelatedByBelKe14(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collJadwalsRelatedByBelKe14Partial && !$this->isNew();
        if (null === $this->collJadwalsRelatedByBelKe14 || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collJadwalsRelatedByBelKe14) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getJadwalsRelatedByBelKe14());
            }
            $query = JadwalQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPembelajaranRelatedByBelKe14($this)
                ->count($con);
        }

        return count($this->collJadwalsRelatedByBelKe14);
    }

    /**
     * Method called to associate a Jadwal object to this object
     * through the Jadwal foreign key attribute.
     *
     * @param    Jadwal $l Jadwal
     * @return Pembelajaran The current object (for fluent API support)
     */
    public function addJadwalRelatedByBelKe14(Jadwal $l)
    {
        if ($this->collJadwalsRelatedByBelKe14 === null) {
            $this->initJadwalsRelatedByBelKe14();
            $this->collJadwalsRelatedByBelKe14Partial = true;
        }
        if (!in_array($l, $this->collJadwalsRelatedByBelKe14->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddJadwalRelatedByBelKe14($l);
        }

        return $this;
    }

    /**
     * @param	JadwalRelatedByBelKe14 $jadwalRelatedByBelKe14 The jadwalRelatedByBelKe14 object to add.
     */
    protected function doAddJadwalRelatedByBelKe14($jadwalRelatedByBelKe14)
    {
        $this->collJadwalsRelatedByBelKe14[]= $jadwalRelatedByBelKe14;
        $jadwalRelatedByBelKe14->setPembelajaranRelatedByBelKe14($this);
    }

    /**
     * @param	JadwalRelatedByBelKe14 $jadwalRelatedByBelKe14 The jadwalRelatedByBelKe14 object to remove.
     * @return Pembelajaran The current object (for fluent API support)
     */
    public function removeJadwalRelatedByBelKe14($jadwalRelatedByBelKe14)
    {
        if ($this->getJadwalsRelatedByBelKe14()->contains($jadwalRelatedByBelKe14)) {
            $this->collJadwalsRelatedByBelKe14->remove($this->collJadwalsRelatedByBelKe14->search($jadwalRelatedByBelKe14));
            if (null === $this->jadwalsRelatedByBelKe14ScheduledForDeletion) {
                $this->jadwalsRelatedByBelKe14ScheduledForDeletion = clone $this->collJadwalsRelatedByBelKe14;
                $this->jadwalsRelatedByBelKe14ScheduledForDeletion->clear();
            }
            $this->jadwalsRelatedByBelKe14ScheduledForDeletion[]= $jadwalRelatedByBelKe14;
            $jadwalRelatedByBelKe14->setPembelajaranRelatedByBelKe14(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pembelajaran is new, it will return
     * an empty collection; or if this Pembelajaran has previously
     * been saved, it will retrieve related JadwalsRelatedByBelKe14 from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pembelajaran.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Jadwal[] List of Jadwal objects
     */
    public function getJadwalsRelatedByBelKe14JoinRuang($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = JadwalQuery::create(null, $criteria);
        $query->joinWith('Ruang', $join_behavior);

        return $this->getJadwalsRelatedByBelKe14($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pembelajaran is new, it will return
     * an empty collection; or if this Pembelajaran has previously
     * been saved, it will retrieve related JadwalsRelatedByBelKe14 from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pembelajaran.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Jadwal[] List of Jadwal objects
     */
    public function getJadwalsRelatedByBelKe14JoinSekolahLongitudinal($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = JadwalQuery::create(null, $criteria);
        $query->joinWith('SekolahLongitudinal', $join_behavior);

        return $this->getJadwalsRelatedByBelKe14($query, $con);
    }

    /**
     * Clears out the collJadwalsRelatedByBelKe15 collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Pembelajaran The current object (for fluent API support)
     * @see        addJadwalsRelatedByBelKe15()
     */
    public function clearJadwalsRelatedByBelKe15()
    {
        $this->collJadwalsRelatedByBelKe15 = null; // important to set this to null since that means it is uninitialized
        $this->collJadwalsRelatedByBelKe15Partial = null;

        return $this;
    }

    /**
     * reset is the collJadwalsRelatedByBelKe15 collection loaded partially
     *
     * @return void
     */
    public function resetPartialJadwalsRelatedByBelKe15($v = true)
    {
        $this->collJadwalsRelatedByBelKe15Partial = $v;
    }

    /**
     * Initializes the collJadwalsRelatedByBelKe15 collection.
     *
     * By default this just sets the collJadwalsRelatedByBelKe15 collection to an empty array (like clearcollJadwalsRelatedByBelKe15());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initJadwalsRelatedByBelKe15($overrideExisting = true)
    {
        if (null !== $this->collJadwalsRelatedByBelKe15 && !$overrideExisting) {
            return;
        }
        $this->collJadwalsRelatedByBelKe15 = new PropelObjectCollection();
        $this->collJadwalsRelatedByBelKe15->setModel('Jadwal');
    }

    /**
     * Gets an array of Jadwal objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Pembelajaran is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Jadwal[] List of Jadwal objects
     * @throws PropelException
     */
    public function getJadwalsRelatedByBelKe15($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collJadwalsRelatedByBelKe15Partial && !$this->isNew();
        if (null === $this->collJadwalsRelatedByBelKe15 || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collJadwalsRelatedByBelKe15) {
                // return empty collection
                $this->initJadwalsRelatedByBelKe15();
            } else {
                $collJadwalsRelatedByBelKe15 = JadwalQuery::create(null, $criteria)
                    ->filterByPembelajaranRelatedByBelKe15($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collJadwalsRelatedByBelKe15Partial && count($collJadwalsRelatedByBelKe15)) {
                      $this->initJadwalsRelatedByBelKe15(false);

                      foreach($collJadwalsRelatedByBelKe15 as $obj) {
                        if (false == $this->collJadwalsRelatedByBelKe15->contains($obj)) {
                          $this->collJadwalsRelatedByBelKe15->append($obj);
                        }
                      }

                      $this->collJadwalsRelatedByBelKe15Partial = true;
                    }

                    $collJadwalsRelatedByBelKe15->getInternalIterator()->rewind();
                    return $collJadwalsRelatedByBelKe15;
                }

                if($partial && $this->collJadwalsRelatedByBelKe15) {
                    foreach($this->collJadwalsRelatedByBelKe15 as $obj) {
                        if($obj->isNew()) {
                            $collJadwalsRelatedByBelKe15[] = $obj;
                        }
                    }
                }

                $this->collJadwalsRelatedByBelKe15 = $collJadwalsRelatedByBelKe15;
                $this->collJadwalsRelatedByBelKe15Partial = false;
            }
        }

        return $this->collJadwalsRelatedByBelKe15;
    }

    /**
     * Sets a collection of JadwalRelatedByBelKe15 objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $jadwalsRelatedByBelKe15 A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Pembelajaran The current object (for fluent API support)
     */
    public function setJadwalsRelatedByBelKe15(PropelCollection $jadwalsRelatedByBelKe15, PropelPDO $con = null)
    {
        $jadwalsRelatedByBelKe15ToDelete = $this->getJadwalsRelatedByBelKe15(new Criteria(), $con)->diff($jadwalsRelatedByBelKe15);

        $this->jadwalsRelatedByBelKe15ScheduledForDeletion = unserialize(serialize($jadwalsRelatedByBelKe15ToDelete));

        foreach ($jadwalsRelatedByBelKe15ToDelete as $jadwalRelatedByBelKe15Removed) {
            $jadwalRelatedByBelKe15Removed->setPembelajaranRelatedByBelKe15(null);
        }

        $this->collJadwalsRelatedByBelKe15 = null;
        foreach ($jadwalsRelatedByBelKe15 as $jadwalRelatedByBelKe15) {
            $this->addJadwalRelatedByBelKe15($jadwalRelatedByBelKe15);
        }

        $this->collJadwalsRelatedByBelKe15 = $jadwalsRelatedByBelKe15;
        $this->collJadwalsRelatedByBelKe15Partial = false;

        return $this;
    }

    /**
     * Returns the number of related Jadwal objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Jadwal objects.
     * @throws PropelException
     */
    public function countJadwalsRelatedByBelKe15(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collJadwalsRelatedByBelKe15Partial && !$this->isNew();
        if (null === $this->collJadwalsRelatedByBelKe15 || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collJadwalsRelatedByBelKe15) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getJadwalsRelatedByBelKe15());
            }
            $query = JadwalQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPembelajaranRelatedByBelKe15($this)
                ->count($con);
        }

        return count($this->collJadwalsRelatedByBelKe15);
    }

    /**
     * Method called to associate a Jadwal object to this object
     * through the Jadwal foreign key attribute.
     *
     * @param    Jadwal $l Jadwal
     * @return Pembelajaran The current object (for fluent API support)
     */
    public function addJadwalRelatedByBelKe15(Jadwal $l)
    {
        if ($this->collJadwalsRelatedByBelKe15 === null) {
            $this->initJadwalsRelatedByBelKe15();
            $this->collJadwalsRelatedByBelKe15Partial = true;
        }
        if (!in_array($l, $this->collJadwalsRelatedByBelKe15->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddJadwalRelatedByBelKe15($l);
        }

        return $this;
    }

    /**
     * @param	JadwalRelatedByBelKe15 $jadwalRelatedByBelKe15 The jadwalRelatedByBelKe15 object to add.
     */
    protected function doAddJadwalRelatedByBelKe15($jadwalRelatedByBelKe15)
    {
        $this->collJadwalsRelatedByBelKe15[]= $jadwalRelatedByBelKe15;
        $jadwalRelatedByBelKe15->setPembelajaranRelatedByBelKe15($this);
    }

    /**
     * @param	JadwalRelatedByBelKe15 $jadwalRelatedByBelKe15 The jadwalRelatedByBelKe15 object to remove.
     * @return Pembelajaran The current object (for fluent API support)
     */
    public function removeJadwalRelatedByBelKe15($jadwalRelatedByBelKe15)
    {
        if ($this->getJadwalsRelatedByBelKe15()->contains($jadwalRelatedByBelKe15)) {
            $this->collJadwalsRelatedByBelKe15->remove($this->collJadwalsRelatedByBelKe15->search($jadwalRelatedByBelKe15));
            if (null === $this->jadwalsRelatedByBelKe15ScheduledForDeletion) {
                $this->jadwalsRelatedByBelKe15ScheduledForDeletion = clone $this->collJadwalsRelatedByBelKe15;
                $this->jadwalsRelatedByBelKe15ScheduledForDeletion->clear();
            }
            $this->jadwalsRelatedByBelKe15ScheduledForDeletion[]= $jadwalRelatedByBelKe15;
            $jadwalRelatedByBelKe15->setPembelajaranRelatedByBelKe15(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pembelajaran is new, it will return
     * an empty collection; or if this Pembelajaran has previously
     * been saved, it will retrieve related JadwalsRelatedByBelKe15 from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pembelajaran.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Jadwal[] List of Jadwal objects
     */
    public function getJadwalsRelatedByBelKe15JoinRuang($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = JadwalQuery::create(null, $criteria);
        $query->joinWith('Ruang', $join_behavior);

        return $this->getJadwalsRelatedByBelKe15($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pembelajaran is new, it will return
     * an empty collection; or if this Pembelajaran has previously
     * been saved, it will retrieve related JadwalsRelatedByBelKe15 from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pembelajaran.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Jadwal[] List of Jadwal objects
     */
    public function getJadwalsRelatedByBelKe15JoinSekolahLongitudinal($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = JadwalQuery::create(null, $criteria);
        $query->joinWith('SekolahLongitudinal', $join_behavior);

        return $this->getJadwalsRelatedByBelKe15($query, $con);
    }

    /**
     * Clears out the collJadwalsRelatedByBelKe16 collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Pembelajaran The current object (for fluent API support)
     * @see        addJadwalsRelatedByBelKe16()
     */
    public function clearJadwalsRelatedByBelKe16()
    {
        $this->collJadwalsRelatedByBelKe16 = null; // important to set this to null since that means it is uninitialized
        $this->collJadwalsRelatedByBelKe16Partial = null;

        return $this;
    }

    /**
     * reset is the collJadwalsRelatedByBelKe16 collection loaded partially
     *
     * @return void
     */
    public function resetPartialJadwalsRelatedByBelKe16($v = true)
    {
        $this->collJadwalsRelatedByBelKe16Partial = $v;
    }

    /**
     * Initializes the collJadwalsRelatedByBelKe16 collection.
     *
     * By default this just sets the collJadwalsRelatedByBelKe16 collection to an empty array (like clearcollJadwalsRelatedByBelKe16());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initJadwalsRelatedByBelKe16($overrideExisting = true)
    {
        if (null !== $this->collJadwalsRelatedByBelKe16 && !$overrideExisting) {
            return;
        }
        $this->collJadwalsRelatedByBelKe16 = new PropelObjectCollection();
        $this->collJadwalsRelatedByBelKe16->setModel('Jadwal');
    }

    /**
     * Gets an array of Jadwal objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Pembelajaran is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Jadwal[] List of Jadwal objects
     * @throws PropelException
     */
    public function getJadwalsRelatedByBelKe16($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collJadwalsRelatedByBelKe16Partial && !$this->isNew();
        if (null === $this->collJadwalsRelatedByBelKe16 || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collJadwalsRelatedByBelKe16) {
                // return empty collection
                $this->initJadwalsRelatedByBelKe16();
            } else {
                $collJadwalsRelatedByBelKe16 = JadwalQuery::create(null, $criteria)
                    ->filterByPembelajaranRelatedByBelKe16($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collJadwalsRelatedByBelKe16Partial && count($collJadwalsRelatedByBelKe16)) {
                      $this->initJadwalsRelatedByBelKe16(false);

                      foreach($collJadwalsRelatedByBelKe16 as $obj) {
                        if (false == $this->collJadwalsRelatedByBelKe16->contains($obj)) {
                          $this->collJadwalsRelatedByBelKe16->append($obj);
                        }
                      }

                      $this->collJadwalsRelatedByBelKe16Partial = true;
                    }

                    $collJadwalsRelatedByBelKe16->getInternalIterator()->rewind();
                    return $collJadwalsRelatedByBelKe16;
                }

                if($partial && $this->collJadwalsRelatedByBelKe16) {
                    foreach($this->collJadwalsRelatedByBelKe16 as $obj) {
                        if($obj->isNew()) {
                            $collJadwalsRelatedByBelKe16[] = $obj;
                        }
                    }
                }

                $this->collJadwalsRelatedByBelKe16 = $collJadwalsRelatedByBelKe16;
                $this->collJadwalsRelatedByBelKe16Partial = false;
            }
        }

        return $this->collJadwalsRelatedByBelKe16;
    }

    /**
     * Sets a collection of JadwalRelatedByBelKe16 objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $jadwalsRelatedByBelKe16 A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Pembelajaran The current object (for fluent API support)
     */
    public function setJadwalsRelatedByBelKe16(PropelCollection $jadwalsRelatedByBelKe16, PropelPDO $con = null)
    {
        $jadwalsRelatedByBelKe16ToDelete = $this->getJadwalsRelatedByBelKe16(new Criteria(), $con)->diff($jadwalsRelatedByBelKe16);

        $this->jadwalsRelatedByBelKe16ScheduledForDeletion = unserialize(serialize($jadwalsRelatedByBelKe16ToDelete));

        foreach ($jadwalsRelatedByBelKe16ToDelete as $jadwalRelatedByBelKe16Removed) {
            $jadwalRelatedByBelKe16Removed->setPembelajaranRelatedByBelKe16(null);
        }

        $this->collJadwalsRelatedByBelKe16 = null;
        foreach ($jadwalsRelatedByBelKe16 as $jadwalRelatedByBelKe16) {
            $this->addJadwalRelatedByBelKe16($jadwalRelatedByBelKe16);
        }

        $this->collJadwalsRelatedByBelKe16 = $jadwalsRelatedByBelKe16;
        $this->collJadwalsRelatedByBelKe16Partial = false;

        return $this;
    }

    /**
     * Returns the number of related Jadwal objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Jadwal objects.
     * @throws PropelException
     */
    public function countJadwalsRelatedByBelKe16(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collJadwalsRelatedByBelKe16Partial && !$this->isNew();
        if (null === $this->collJadwalsRelatedByBelKe16 || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collJadwalsRelatedByBelKe16) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getJadwalsRelatedByBelKe16());
            }
            $query = JadwalQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPembelajaranRelatedByBelKe16($this)
                ->count($con);
        }

        return count($this->collJadwalsRelatedByBelKe16);
    }

    /**
     * Method called to associate a Jadwal object to this object
     * through the Jadwal foreign key attribute.
     *
     * @param    Jadwal $l Jadwal
     * @return Pembelajaran The current object (for fluent API support)
     */
    public function addJadwalRelatedByBelKe16(Jadwal $l)
    {
        if ($this->collJadwalsRelatedByBelKe16 === null) {
            $this->initJadwalsRelatedByBelKe16();
            $this->collJadwalsRelatedByBelKe16Partial = true;
        }
        if (!in_array($l, $this->collJadwalsRelatedByBelKe16->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddJadwalRelatedByBelKe16($l);
        }

        return $this;
    }

    /**
     * @param	JadwalRelatedByBelKe16 $jadwalRelatedByBelKe16 The jadwalRelatedByBelKe16 object to add.
     */
    protected function doAddJadwalRelatedByBelKe16($jadwalRelatedByBelKe16)
    {
        $this->collJadwalsRelatedByBelKe16[]= $jadwalRelatedByBelKe16;
        $jadwalRelatedByBelKe16->setPembelajaranRelatedByBelKe16($this);
    }

    /**
     * @param	JadwalRelatedByBelKe16 $jadwalRelatedByBelKe16 The jadwalRelatedByBelKe16 object to remove.
     * @return Pembelajaran The current object (for fluent API support)
     */
    public function removeJadwalRelatedByBelKe16($jadwalRelatedByBelKe16)
    {
        if ($this->getJadwalsRelatedByBelKe16()->contains($jadwalRelatedByBelKe16)) {
            $this->collJadwalsRelatedByBelKe16->remove($this->collJadwalsRelatedByBelKe16->search($jadwalRelatedByBelKe16));
            if (null === $this->jadwalsRelatedByBelKe16ScheduledForDeletion) {
                $this->jadwalsRelatedByBelKe16ScheduledForDeletion = clone $this->collJadwalsRelatedByBelKe16;
                $this->jadwalsRelatedByBelKe16ScheduledForDeletion->clear();
            }
            $this->jadwalsRelatedByBelKe16ScheduledForDeletion[]= $jadwalRelatedByBelKe16;
            $jadwalRelatedByBelKe16->setPembelajaranRelatedByBelKe16(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pembelajaran is new, it will return
     * an empty collection; or if this Pembelajaran has previously
     * been saved, it will retrieve related JadwalsRelatedByBelKe16 from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pembelajaran.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Jadwal[] List of Jadwal objects
     */
    public function getJadwalsRelatedByBelKe16JoinRuang($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = JadwalQuery::create(null, $criteria);
        $query->joinWith('Ruang', $join_behavior);

        return $this->getJadwalsRelatedByBelKe16($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pembelajaran is new, it will return
     * an empty collection; or if this Pembelajaran has previously
     * been saved, it will retrieve related JadwalsRelatedByBelKe16 from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pembelajaran.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Jadwal[] List of Jadwal objects
     */
    public function getJadwalsRelatedByBelKe16JoinSekolahLongitudinal($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = JadwalQuery::create(null, $criteria);
        $query->joinWith('SekolahLongitudinal', $join_behavior);

        return $this->getJadwalsRelatedByBelKe16($query, $con);
    }

    /**
     * Clears out the collJadwalsRelatedByBelKe17 collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Pembelajaran The current object (for fluent API support)
     * @see        addJadwalsRelatedByBelKe17()
     */
    public function clearJadwalsRelatedByBelKe17()
    {
        $this->collJadwalsRelatedByBelKe17 = null; // important to set this to null since that means it is uninitialized
        $this->collJadwalsRelatedByBelKe17Partial = null;

        return $this;
    }

    /**
     * reset is the collJadwalsRelatedByBelKe17 collection loaded partially
     *
     * @return void
     */
    public function resetPartialJadwalsRelatedByBelKe17($v = true)
    {
        $this->collJadwalsRelatedByBelKe17Partial = $v;
    }

    /**
     * Initializes the collJadwalsRelatedByBelKe17 collection.
     *
     * By default this just sets the collJadwalsRelatedByBelKe17 collection to an empty array (like clearcollJadwalsRelatedByBelKe17());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initJadwalsRelatedByBelKe17($overrideExisting = true)
    {
        if (null !== $this->collJadwalsRelatedByBelKe17 && !$overrideExisting) {
            return;
        }
        $this->collJadwalsRelatedByBelKe17 = new PropelObjectCollection();
        $this->collJadwalsRelatedByBelKe17->setModel('Jadwal');
    }

    /**
     * Gets an array of Jadwal objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Pembelajaran is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Jadwal[] List of Jadwal objects
     * @throws PropelException
     */
    public function getJadwalsRelatedByBelKe17($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collJadwalsRelatedByBelKe17Partial && !$this->isNew();
        if (null === $this->collJadwalsRelatedByBelKe17 || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collJadwalsRelatedByBelKe17) {
                // return empty collection
                $this->initJadwalsRelatedByBelKe17();
            } else {
                $collJadwalsRelatedByBelKe17 = JadwalQuery::create(null, $criteria)
                    ->filterByPembelajaranRelatedByBelKe17($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collJadwalsRelatedByBelKe17Partial && count($collJadwalsRelatedByBelKe17)) {
                      $this->initJadwalsRelatedByBelKe17(false);

                      foreach($collJadwalsRelatedByBelKe17 as $obj) {
                        if (false == $this->collJadwalsRelatedByBelKe17->contains($obj)) {
                          $this->collJadwalsRelatedByBelKe17->append($obj);
                        }
                      }

                      $this->collJadwalsRelatedByBelKe17Partial = true;
                    }

                    $collJadwalsRelatedByBelKe17->getInternalIterator()->rewind();
                    return $collJadwalsRelatedByBelKe17;
                }

                if($partial && $this->collJadwalsRelatedByBelKe17) {
                    foreach($this->collJadwalsRelatedByBelKe17 as $obj) {
                        if($obj->isNew()) {
                            $collJadwalsRelatedByBelKe17[] = $obj;
                        }
                    }
                }

                $this->collJadwalsRelatedByBelKe17 = $collJadwalsRelatedByBelKe17;
                $this->collJadwalsRelatedByBelKe17Partial = false;
            }
        }

        return $this->collJadwalsRelatedByBelKe17;
    }

    /**
     * Sets a collection of JadwalRelatedByBelKe17 objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $jadwalsRelatedByBelKe17 A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Pembelajaran The current object (for fluent API support)
     */
    public function setJadwalsRelatedByBelKe17(PropelCollection $jadwalsRelatedByBelKe17, PropelPDO $con = null)
    {
        $jadwalsRelatedByBelKe17ToDelete = $this->getJadwalsRelatedByBelKe17(new Criteria(), $con)->diff($jadwalsRelatedByBelKe17);

        $this->jadwalsRelatedByBelKe17ScheduledForDeletion = unserialize(serialize($jadwalsRelatedByBelKe17ToDelete));

        foreach ($jadwalsRelatedByBelKe17ToDelete as $jadwalRelatedByBelKe17Removed) {
            $jadwalRelatedByBelKe17Removed->setPembelajaranRelatedByBelKe17(null);
        }

        $this->collJadwalsRelatedByBelKe17 = null;
        foreach ($jadwalsRelatedByBelKe17 as $jadwalRelatedByBelKe17) {
            $this->addJadwalRelatedByBelKe17($jadwalRelatedByBelKe17);
        }

        $this->collJadwalsRelatedByBelKe17 = $jadwalsRelatedByBelKe17;
        $this->collJadwalsRelatedByBelKe17Partial = false;

        return $this;
    }

    /**
     * Returns the number of related Jadwal objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Jadwal objects.
     * @throws PropelException
     */
    public function countJadwalsRelatedByBelKe17(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collJadwalsRelatedByBelKe17Partial && !$this->isNew();
        if (null === $this->collJadwalsRelatedByBelKe17 || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collJadwalsRelatedByBelKe17) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getJadwalsRelatedByBelKe17());
            }
            $query = JadwalQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPembelajaranRelatedByBelKe17($this)
                ->count($con);
        }

        return count($this->collJadwalsRelatedByBelKe17);
    }

    /**
     * Method called to associate a Jadwal object to this object
     * through the Jadwal foreign key attribute.
     *
     * @param    Jadwal $l Jadwal
     * @return Pembelajaran The current object (for fluent API support)
     */
    public function addJadwalRelatedByBelKe17(Jadwal $l)
    {
        if ($this->collJadwalsRelatedByBelKe17 === null) {
            $this->initJadwalsRelatedByBelKe17();
            $this->collJadwalsRelatedByBelKe17Partial = true;
        }
        if (!in_array($l, $this->collJadwalsRelatedByBelKe17->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddJadwalRelatedByBelKe17($l);
        }

        return $this;
    }

    /**
     * @param	JadwalRelatedByBelKe17 $jadwalRelatedByBelKe17 The jadwalRelatedByBelKe17 object to add.
     */
    protected function doAddJadwalRelatedByBelKe17($jadwalRelatedByBelKe17)
    {
        $this->collJadwalsRelatedByBelKe17[]= $jadwalRelatedByBelKe17;
        $jadwalRelatedByBelKe17->setPembelajaranRelatedByBelKe17($this);
    }

    /**
     * @param	JadwalRelatedByBelKe17 $jadwalRelatedByBelKe17 The jadwalRelatedByBelKe17 object to remove.
     * @return Pembelajaran The current object (for fluent API support)
     */
    public function removeJadwalRelatedByBelKe17($jadwalRelatedByBelKe17)
    {
        if ($this->getJadwalsRelatedByBelKe17()->contains($jadwalRelatedByBelKe17)) {
            $this->collJadwalsRelatedByBelKe17->remove($this->collJadwalsRelatedByBelKe17->search($jadwalRelatedByBelKe17));
            if (null === $this->jadwalsRelatedByBelKe17ScheduledForDeletion) {
                $this->jadwalsRelatedByBelKe17ScheduledForDeletion = clone $this->collJadwalsRelatedByBelKe17;
                $this->jadwalsRelatedByBelKe17ScheduledForDeletion->clear();
            }
            $this->jadwalsRelatedByBelKe17ScheduledForDeletion[]= $jadwalRelatedByBelKe17;
            $jadwalRelatedByBelKe17->setPembelajaranRelatedByBelKe17(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pembelajaran is new, it will return
     * an empty collection; or if this Pembelajaran has previously
     * been saved, it will retrieve related JadwalsRelatedByBelKe17 from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pembelajaran.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Jadwal[] List of Jadwal objects
     */
    public function getJadwalsRelatedByBelKe17JoinRuang($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = JadwalQuery::create(null, $criteria);
        $query->joinWith('Ruang', $join_behavior);

        return $this->getJadwalsRelatedByBelKe17($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pembelajaran is new, it will return
     * an empty collection; or if this Pembelajaran has previously
     * been saved, it will retrieve related JadwalsRelatedByBelKe17 from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pembelajaran.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Jadwal[] List of Jadwal objects
     */
    public function getJadwalsRelatedByBelKe17JoinSekolahLongitudinal($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = JadwalQuery::create(null, $criteria);
        $query->joinWith('SekolahLongitudinal', $join_behavior);

        return $this->getJadwalsRelatedByBelKe17($query, $con);
    }

    /**
     * Clears out the collJadwalsRelatedByBelKe18 collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Pembelajaran The current object (for fluent API support)
     * @see        addJadwalsRelatedByBelKe18()
     */
    public function clearJadwalsRelatedByBelKe18()
    {
        $this->collJadwalsRelatedByBelKe18 = null; // important to set this to null since that means it is uninitialized
        $this->collJadwalsRelatedByBelKe18Partial = null;

        return $this;
    }

    /**
     * reset is the collJadwalsRelatedByBelKe18 collection loaded partially
     *
     * @return void
     */
    public function resetPartialJadwalsRelatedByBelKe18($v = true)
    {
        $this->collJadwalsRelatedByBelKe18Partial = $v;
    }

    /**
     * Initializes the collJadwalsRelatedByBelKe18 collection.
     *
     * By default this just sets the collJadwalsRelatedByBelKe18 collection to an empty array (like clearcollJadwalsRelatedByBelKe18());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initJadwalsRelatedByBelKe18($overrideExisting = true)
    {
        if (null !== $this->collJadwalsRelatedByBelKe18 && !$overrideExisting) {
            return;
        }
        $this->collJadwalsRelatedByBelKe18 = new PropelObjectCollection();
        $this->collJadwalsRelatedByBelKe18->setModel('Jadwal');
    }

    /**
     * Gets an array of Jadwal objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Pembelajaran is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Jadwal[] List of Jadwal objects
     * @throws PropelException
     */
    public function getJadwalsRelatedByBelKe18($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collJadwalsRelatedByBelKe18Partial && !$this->isNew();
        if (null === $this->collJadwalsRelatedByBelKe18 || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collJadwalsRelatedByBelKe18) {
                // return empty collection
                $this->initJadwalsRelatedByBelKe18();
            } else {
                $collJadwalsRelatedByBelKe18 = JadwalQuery::create(null, $criteria)
                    ->filterByPembelajaranRelatedByBelKe18($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collJadwalsRelatedByBelKe18Partial && count($collJadwalsRelatedByBelKe18)) {
                      $this->initJadwalsRelatedByBelKe18(false);

                      foreach($collJadwalsRelatedByBelKe18 as $obj) {
                        if (false == $this->collJadwalsRelatedByBelKe18->contains($obj)) {
                          $this->collJadwalsRelatedByBelKe18->append($obj);
                        }
                      }

                      $this->collJadwalsRelatedByBelKe18Partial = true;
                    }

                    $collJadwalsRelatedByBelKe18->getInternalIterator()->rewind();
                    return $collJadwalsRelatedByBelKe18;
                }

                if($partial && $this->collJadwalsRelatedByBelKe18) {
                    foreach($this->collJadwalsRelatedByBelKe18 as $obj) {
                        if($obj->isNew()) {
                            $collJadwalsRelatedByBelKe18[] = $obj;
                        }
                    }
                }

                $this->collJadwalsRelatedByBelKe18 = $collJadwalsRelatedByBelKe18;
                $this->collJadwalsRelatedByBelKe18Partial = false;
            }
        }

        return $this->collJadwalsRelatedByBelKe18;
    }

    /**
     * Sets a collection of JadwalRelatedByBelKe18 objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $jadwalsRelatedByBelKe18 A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Pembelajaran The current object (for fluent API support)
     */
    public function setJadwalsRelatedByBelKe18(PropelCollection $jadwalsRelatedByBelKe18, PropelPDO $con = null)
    {
        $jadwalsRelatedByBelKe18ToDelete = $this->getJadwalsRelatedByBelKe18(new Criteria(), $con)->diff($jadwalsRelatedByBelKe18);

        $this->jadwalsRelatedByBelKe18ScheduledForDeletion = unserialize(serialize($jadwalsRelatedByBelKe18ToDelete));

        foreach ($jadwalsRelatedByBelKe18ToDelete as $jadwalRelatedByBelKe18Removed) {
            $jadwalRelatedByBelKe18Removed->setPembelajaranRelatedByBelKe18(null);
        }

        $this->collJadwalsRelatedByBelKe18 = null;
        foreach ($jadwalsRelatedByBelKe18 as $jadwalRelatedByBelKe18) {
            $this->addJadwalRelatedByBelKe18($jadwalRelatedByBelKe18);
        }

        $this->collJadwalsRelatedByBelKe18 = $jadwalsRelatedByBelKe18;
        $this->collJadwalsRelatedByBelKe18Partial = false;

        return $this;
    }

    /**
     * Returns the number of related Jadwal objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Jadwal objects.
     * @throws PropelException
     */
    public function countJadwalsRelatedByBelKe18(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collJadwalsRelatedByBelKe18Partial && !$this->isNew();
        if (null === $this->collJadwalsRelatedByBelKe18 || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collJadwalsRelatedByBelKe18) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getJadwalsRelatedByBelKe18());
            }
            $query = JadwalQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPembelajaranRelatedByBelKe18($this)
                ->count($con);
        }

        return count($this->collJadwalsRelatedByBelKe18);
    }

    /**
     * Method called to associate a Jadwal object to this object
     * through the Jadwal foreign key attribute.
     *
     * @param    Jadwal $l Jadwal
     * @return Pembelajaran The current object (for fluent API support)
     */
    public function addJadwalRelatedByBelKe18(Jadwal $l)
    {
        if ($this->collJadwalsRelatedByBelKe18 === null) {
            $this->initJadwalsRelatedByBelKe18();
            $this->collJadwalsRelatedByBelKe18Partial = true;
        }
        if (!in_array($l, $this->collJadwalsRelatedByBelKe18->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddJadwalRelatedByBelKe18($l);
        }

        return $this;
    }

    /**
     * @param	JadwalRelatedByBelKe18 $jadwalRelatedByBelKe18 The jadwalRelatedByBelKe18 object to add.
     */
    protected function doAddJadwalRelatedByBelKe18($jadwalRelatedByBelKe18)
    {
        $this->collJadwalsRelatedByBelKe18[]= $jadwalRelatedByBelKe18;
        $jadwalRelatedByBelKe18->setPembelajaranRelatedByBelKe18($this);
    }

    /**
     * @param	JadwalRelatedByBelKe18 $jadwalRelatedByBelKe18 The jadwalRelatedByBelKe18 object to remove.
     * @return Pembelajaran The current object (for fluent API support)
     */
    public function removeJadwalRelatedByBelKe18($jadwalRelatedByBelKe18)
    {
        if ($this->getJadwalsRelatedByBelKe18()->contains($jadwalRelatedByBelKe18)) {
            $this->collJadwalsRelatedByBelKe18->remove($this->collJadwalsRelatedByBelKe18->search($jadwalRelatedByBelKe18));
            if (null === $this->jadwalsRelatedByBelKe18ScheduledForDeletion) {
                $this->jadwalsRelatedByBelKe18ScheduledForDeletion = clone $this->collJadwalsRelatedByBelKe18;
                $this->jadwalsRelatedByBelKe18ScheduledForDeletion->clear();
            }
            $this->jadwalsRelatedByBelKe18ScheduledForDeletion[]= $jadwalRelatedByBelKe18;
            $jadwalRelatedByBelKe18->setPembelajaranRelatedByBelKe18(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pembelajaran is new, it will return
     * an empty collection; or if this Pembelajaran has previously
     * been saved, it will retrieve related JadwalsRelatedByBelKe18 from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pembelajaran.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Jadwal[] List of Jadwal objects
     */
    public function getJadwalsRelatedByBelKe18JoinRuang($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = JadwalQuery::create(null, $criteria);
        $query->joinWith('Ruang', $join_behavior);

        return $this->getJadwalsRelatedByBelKe18($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pembelajaran is new, it will return
     * an empty collection; or if this Pembelajaran has previously
     * been saved, it will retrieve related JadwalsRelatedByBelKe18 from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pembelajaran.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Jadwal[] List of Jadwal objects
     */
    public function getJadwalsRelatedByBelKe18JoinSekolahLongitudinal($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = JadwalQuery::create(null, $criteria);
        $query->joinWith('SekolahLongitudinal', $join_behavior);

        return $this->getJadwalsRelatedByBelKe18($query, $con);
    }

    /**
     * Clears out the collJadwalsRelatedByBelKe19 collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Pembelajaran The current object (for fluent API support)
     * @see        addJadwalsRelatedByBelKe19()
     */
    public function clearJadwalsRelatedByBelKe19()
    {
        $this->collJadwalsRelatedByBelKe19 = null; // important to set this to null since that means it is uninitialized
        $this->collJadwalsRelatedByBelKe19Partial = null;

        return $this;
    }

    /**
     * reset is the collJadwalsRelatedByBelKe19 collection loaded partially
     *
     * @return void
     */
    public function resetPartialJadwalsRelatedByBelKe19($v = true)
    {
        $this->collJadwalsRelatedByBelKe19Partial = $v;
    }

    /**
     * Initializes the collJadwalsRelatedByBelKe19 collection.
     *
     * By default this just sets the collJadwalsRelatedByBelKe19 collection to an empty array (like clearcollJadwalsRelatedByBelKe19());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initJadwalsRelatedByBelKe19($overrideExisting = true)
    {
        if (null !== $this->collJadwalsRelatedByBelKe19 && !$overrideExisting) {
            return;
        }
        $this->collJadwalsRelatedByBelKe19 = new PropelObjectCollection();
        $this->collJadwalsRelatedByBelKe19->setModel('Jadwal');
    }

    /**
     * Gets an array of Jadwal objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Pembelajaran is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Jadwal[] List of Jadwal objects
     * @throws PropelException
     */
    public function getJadwalsRelatedByBelKe19($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collJadwalsRelatedByBelKe19Partial && !$this->isNew();
        if (null === $this->collJadwalsRelatedByBelKe19 || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collJadwalsRelatedByBelKe19) {
                // return empty collection
                $this->initJadwalsRelatedByBelKe19();
            } else {
                $collJadwalsRelatedByBelKe19 = JadwalQuery::create(null, $criteria)
                    ->filterByPembelajaranRelatedByBelKe19($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collJadwalsRelatedByBelKe19Partial && count($collJadwalsRelatedByBelKe19)) {
                      $this->initJadwalsRelatedByBelKe19(false);

                      foreach($collJadwalsRelatedByBelKe19 as $obj) {
                        if (false == $this->collJadwalsRelatedByBelKe19->contains($obj)) {
                          $this->collJadwalsRelatedByBelKe19->append($obj);
                        }
                      }

                      $this->collJadwalsRelatedByBelKe19Partial = true;
                    }

                    $collJadwalsRelatedByBelKe19->getInternalIterator()->rewind();
                    return $collJadwalsRelatedByBelKe19;
                }

                if($partial && $this->collJadwalsRelatedByBelKe19) {
                    foreach($this->collJadwalsRelatedByBelKe19 as $obj) {
                        if($obj->isNew()) {
                            $collJadwalsRelatedByBelKe19[] = $obj;
                        }
                    }
                }

                $this->collJadwalsRelatedByBelKe19 = $collJadwalsRelatedByBelKe19;
                $this->collJadwalsRelatedByBelKe19Partial = false;
            }
        }

        return $this->collJadwalsRelatedByBelKe19;
    }

    /**
     * Sets a collection of JadwalRelatedByBelKe19 objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $jadwalsRelatedByBelKe19 A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Pembelajaran The current object (for fluent API support)
     */
    public function setJadwalsRelatedByBelKe19(PropelCollection $jadwalsRelatedByBelKe19, PropelPDO $con = null)
    {
        $jadwalsRelatedByBelKe19ToDelete = $this->getJadwalsRelatedByBelKe19(new Criteria(), $con)->diff($jadwalsRelatedByBelKe19);

        $this->jadwalsRelatedByBelKe19ScheduledForDeletion = unserialize(serialize($jadwalsRelatedByBelKe19ToDelete));

        foreach ($jadwalsRelatedByBelKe19ToDelete as $jadwalRelatedByBelKe19Removed) {
            $jadwalRelatedByBelKe19Removed->setPembelajaranRelatedByBelKe19(null);
        }

        $this->collJadwalsRelatedByBelKe19 = null;
        foreach ($jadwalsRelatedByBelKe19 as $jadwalRelatedByBelKe19) {
            $this->addJadwalRelatedByBelKe19($jadwalRelatedByBelKe19);
        }

        $this->collJadwalsRelatedByBelKe19 = $jadwalsRelatedByBelKe19;
        $this->collJadwalsRelatedByBelKe19Partial = false;

        return $this;
    }

    /**
     * Returns the number of related Jadwal objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Jadwal objects.
     * @throws PropelException
     */
    public function countJadwalsRelatedByBelKe19(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collJadwalsRelatedByBelKe19Partial && !$this->isNew();
        if (null === $this->collJadwalsRelatedByBelKe19 || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collJadwalsRelatedByBelKe19) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getJadwalsRelatedByBelKe19());
            }
            $query = JadwalQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPembelajaranRelatedByBelKe19($this)
                ->count($con);
        }

        return count($this->collJadwalsRelatedByBelKe19);
    }

    /**
     * Method called to associate a Jadwal object to this object
     * through the Jadwal foreign key attribute.
     *
     * @param    Jadwal $l Jadwal
     * @return Pembelajaran The current object (for fluent API support)
     */
    public function addJadwalRelatedByBelKe19(Jadwal $l)
    {
        if ($this->collJadwalsRelatedByBelKe19 === null) {
            $this->initJadwalsRelatedByBelKe19();
            $this->collJadwalsRelatedByBelKe19Partial = true;
        }
        if (!in_array($l, $this->collJadwalsRelatedByBelKe19->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddJadwalRelatedByBelKe19($l);
        }

        return $this;
    }

    /**
     * @param	JadwalRelatedByBelKe19 $jadwalRelatedByBelKe19 The jadwalRelatedByBelKe19 object to add.
     */
    protected function doAddJadwalRelatedByBelKe19($jadwalRelatedByBelKe19)
    {
        $this->collJadwalsRelatedByBelKe19[]= $jadwalRelatedByBelKe19;
        $jadwalRelatedByBelKe19->setPembelajaranRelatedByBelKe19($this);
    }

    /**
     * @param	JadwalRelatedByBelKe19 $jadwalRelatedByBelKe19 The jadwalRelatedByBelKe19 object to remove.
     * @return Pembelajaran The current object (for fluent API support)
     */
    public function removeJadwalRelatedByBelKe19($jadwalRelatedByBelKe19)
    {
        if ($this->getJadwalsRelatedByBelKe19()->contains($jadwalRelatedByBelKe19)) {
            $this->collJadwalsRelatedByBelKe19->remove($this->collJadwalsRelatedByBelKe19->search($jadwalRelatedByBelKe19));
            if (null === $this->jadwalsRelatedByBelKe19ScheduledForDeletion) {
                $this->jadwalsRelatedByBelKe19ScheduledForDeletion = clone $this->collJadwalsRelatedByBelKe19;
                $this->jadwalsRelatedByBelKe19ScheduledForDeletion->clear();
            }
            $this->jadwalsRelatedByBelKe19ScheduledForDeletion[]= $jadwalRelatedByBelKe19;
            $jadwalRelatedByBelKe19->setPembelajaranRelatedByBelKe19(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pembelajaran is new, it will return
     * an empty collection; or if this Pembelajaran has previously
     * been saved, it will retrieve related JadwalsRelatedByBelKe19 from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pembelajaran.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Jadwal[] List of Jadwal objects
     */
    public function getJadwalsRelatedByBelKe19JoinRuang($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = JadwalQuery::create(null, $criteria);
        $query->joinWith('Ruang', $join_behavior);

        return $this->getJadwalsRelatedByBelKe19($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pembelajaran is new, it will return
     * an empty collection; or if this Pembelajaran has previously
     * been saved, it will retrieve related JadwalsRelatedByBelKe19 from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pembelajaran.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Jadwal[] List of Jadwal objects
     */
    public function getJadwalsRelatedByBelKe19JoinSekolahLongitudinal($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = JadwalQuery::create(null, $criteria);
        $query->joinWith('SekolahLongitudinal', $join_behavior);

        return $this->getJadwalsRelatedByBelKe19($query, $con);
    }

    /**
     * Clears out the collJadwalsRelatedByBelKe20 collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Pembelajaran The current object (for fluent API support)
     * @see        addJadwalsRelatedByBelKe20()
     */
    public function clearJadwalsRelatedByBelKe20()
    {
        $this->collJadwalsRelatedByBelKe20 = null; // important to set this to null since that means it is uninitialized
        $this->collJadwalsRelatedByBelKe20Partial = null;

        return $this;
    }

    /**
     * reset is the collJadwalsRelatedByBelKe20 collection loaded partially
     *
     * @return void
     */
    public function resetPartialJadwalsRelatedByBelKe20($v = true)
    {
        $this->collJadwalsRelatedByBelKe20Partial = $v;
    }

    /**
     * Initializes the collJadwalsRelatedByBelKe20 collection.
     *
     * By default this just sets the collJadwalsRelatedByBelKe20 collection to an empty array (like clearcollJadwalsRelatedByBelKe20());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initJadwalsRelatedByBelKe20($overrideExisting = true)
    {
        if (null !== $this->collJadwalsRelatedByBelKe20 && !$overrideExisting) {
            return;
        }
        $this->collJadwalsRelatedByBelKe20 = new PropelObjectCollection();
        $this->collJadwalsRelatedByBelKe20->setModel('Jadwal');
    }

    /**
     * Gets an array of Jadwal objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Pembelajaran is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Jadwal[] List of Jadwal objects
     * @throws PropelException
     */
    public function getJadwalsRelatedByBelKe20($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collJadwalsRelatedByBelKe20Partial && !$this->isNew();
        if (null === $this->collJadwalsRelatedByBelKe20 || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collJadwalsRelatedByBelKe20) {
                // return empty collection
                $this->initJadwalsRelatedByBelKe20();
            } else {
                $collJadwalsRelatedByBelKe20 = JadwalQuery::create(null, $criteria)
                    ->filterByPembelajaranRelatedByBelKe20($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collJadwalsRelatedByBelKe20Partial && count($collJadwalsRelatedByBelKe20)) {
                      $this->initJadwalsRelatedByBelKe20(false);

                      foreach($collJadwalsRelatedByBelKe20 as $obj) {
                        if (false == $this->collJadwalsRelatedByBelKe20->contains($obj)) {
                          $this->collJadwalsRelatedByBelKe20->append($obj);
                        }
                      }

                      $this->collJadwalsRelatedByBelKe20Partial = true;
                    }

                    $collJadwalsRelatedByBelKe20->getInternalIterator()->rewind();
                    return $collJadwalsRelatedByBelKe20;
                }

                if($partial && $this->collJadwalsRelatedByBelKe20) {
                    foreach($this->collJadwalsRelatedByBelKe20 as $obj) {
                        if($obj->isNew()) {
                            $collJadwalsRelatedByBelKe20[] = $obj;
                        }
                    }
                }

                $this->collJadwalsRelatedByBelKe20 = $collJadwalsRelatedByBelKe20;
                $this->collJadwalsRelatedByBelKe20Partial = false;
            }
        }

        return $this->collJadwalsRelatedByBelKe20;
    }

    /**
     * Sets a collection of JadwalRelatedByBelKe20 objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $jadwalsRelatedByBelKe20 A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Pembelajaran The current object (for fluent API support)
     */
    public function setJadwalsRelatedByBelKe20(PropelCollection $jadwalsRelatedByBelKe20, PropelPDO $con = null)
    {
        $jadwalsRelatedByBelKe20ToDelete = $this->getJadwalsRelatedByBelKe20(new Criteria(), $con)->diff($jadwalsRelatedByBelKe20);

        $this->jadwalsRelatedByBelKe20ScheduledForDeletion = unserialize(serialize($jadwalsRelatedByBelKe20ToDelete));

        foreach ($jadwalsRelatedByBelKe20ToDelete as $jadwalRelatedByBelKe20Removed) {
            $jadwalRelatedByBelKe20Removed->setPembelajaranRelatedByBelKe20(null);
        }

        $this->collJadwalsRelatedByBelKe20 = null;
        foreach ($jadwalsRelatedByBelKe20 as $jadwalRelatedByBelKe20) {
            $this->addJadwalRelatedByBelKe20($jadwalRelatedByBelKe20);
        }

        $this->collJadwalsRelatedByBelKe20 = $jadwalsRelatedByBelKe20;
        $this->collJadwalsRelatedByBelKe20Partial = false;

        return $this;
    }

    /**
     * Returns the number of related Jadwal objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Jadwal objects.
     * @throws PropelException
     */
    public function countJadwalsRelatedByBelKe20(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collJadwalsRelatedByBelKe20Partial && !$this->isNew();
        if (null === $this->collJadwalsRelatedByBelKe20 || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collJadwalsRelatedByBelKe20) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getJadwalsRelatedByBelKe20());
            }
            $query = JadwalQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPembelajaranRelatedByBelKe20($this)
                ->count($con);
        }

        return count($this->collJadwalsRelatedByBelKe20);
    }

    /**
     * Method called to associate a Jadwal object to this object
     * through the Jadwal foreign key attribute.
     *
     * @param    Jadwal $l Jadwal
     * @return Pembelajaran The current object (for fluent API support)
     */
    public function addJadwalRelatedByBelKe20(Jadwal $l)
    {
        if ($this->collJadwalsRelatedByBelKe20 === null) {
            $this->initJadwalsRelatedByBelKe20();
            $this->collJadwalsRelatedByBelKe20Partial = true;
        }
        if (!in_array($l, $this->collJadwalsRelatedByBelKe20->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddJadwalRelatedByBelKe20($l);
        }

        return $this;
    }

    /**
     * @param	JadwalRelatedByBelKe20 $jadwalRelatedByBelKe20 The jadwalRelatedByBelKe20 object to add.
     */
    protected function doAddJadwalRelatedByBelKe20($jadwalRelatedByBelKe20)
    {
        $this->collJadwalsRelatedByBelKe20[]= $jadwalRelatedByBelKe20;
        $jadwalRelatedByBelKe20->setPembelajaranRelatedByBelKe20($this);
    }

    /**
     * @param	JadwalRelatedByBelKe20 $jadwalRelatedByBelKe20 The jadwalRelatedByBelKe20 object to remove.
     * @return Pembelajaran The current object (for fluent API support)
     */
    public function removeJadwalRelatedByBelKe20($jadwalRelatedByBelKe20)
    {
        if ($this->getJadwalsRelatedByBelKe20()->contains($jadwalRelatedByBelKe20)) {
            $this->collJadwalsRelatedByBelKe20->remove($this->collJadwalsRelatedByBelKe20->search($jadwalRelatedByBelKe20));
            if (null === $this->jadwalsRelatedByBelKe20ScheduledForDeletion) {
                $this->jadwalsRelatedByBelKe20ScheduledForDeletion = clone $this->collJadwalsRelatedByBelKe20;
                $this->jadwalsRelatedByBelKe20ScheduledForDeletion->clear();
            }
            $this->jadwalsRelatedByBelKe20ScheduledForDeletion[]= $jadwalRelatedByBelKe20;
            $jadwalRelatedByBelKe20->setPembelajaranRelatedByBelKe20(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pembelajaran is new, it will return
     * an empty collection; or if this Pembelajaran has previously
     * been saved, it will retrieve related JadwalsRelatedByBelKe20 from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pembelajaran.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Jadwal[] List of Jadwal objects
     */
    public function getJadwalsRelatedByBelKe20JoinRuang($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = JadwalQuery::create(null, $criteria);
        $query->joinWith('Ruang', $join_behavior);

        return $this->getJadwalsRelatedByBelKe20($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pembelajaran is new, it will return
     * an empty collection; or if this Pembelajaran has previously
     * been saved, it will retrieve related JadwalsRelatedByBelKe20 from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pembelajaran.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Jadwal[] List of Jadwal objects
     */
    public function getJadwalsRelatedByBelKe20JoinSekolahLongitudinal($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = JadwalQuery::create(null, $criteria);
        $query->joinWith('SekolahLongitudinal', $join_behavior);

        return $this->getJadwalsRelatedByBelKe20($query, $con);
    }

    /**
     * Clears out the collPembelajaransRelatedByPembelajaranId collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Pembelajaran The current object (for fluent API support)
     * @see        addPembelajaransRelatedByPembelajaranId()
     */
    public function clearPembelajaransRelatedByPembelajaranId()
    {
        $this->collPembelajaransRelatedByPembelajaranId = null; // important to set this to null since that means it is uninitialized
        $this->collPembelajaransRelatedByPembelajaranIdPartial = null;

        return $this;
    }

    /**
     * reset is the collPembelajaransRelatedByPembelajaranId collection loaded partially
     *
     * @return void
     */
    public function resetPartialPembelajaransRelatedByPembelajaranId($v = true)
    {
        $this->collPembelajaransRelatedByPembelajaranIdPartial = $v;
    }

    /**
     * Initializes the collPembelajaransRelatedByPembelajaranId collection.
     *
     * By default this just sets the collPembelajaransRelatedByPembelajaranId collection to an empty array (like clearcollPembelajaransRelatedByPembelajaranId());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPembelajaransRelatedByPembelajaranId($overrideExisting = true)
    {
        if (null !== $this->collPembelajaransRelatedByPembelajaranId && !$overrideExisting) {
            return;
        }
        $this->collPembelajaransRelatedByPembelajaranId = new PropelObjectCollection();
        $this->collPembelajaransRelatedByPembelajaranId->setModel('Pembelajaran');
    }

    /**
     * Gets an array of Pembelajaran objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Pembelajaran is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Pembelajaran[] List of Pembelajaran objects
     * @throws PropelException
     */
    public function getPembelajaransRelatedByPembelajaranId($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collPembelajaransRelatedByPembelajaranIdPartial && !$this->isNew();
        if (null === $this->collPembelajaransRelatedByPembelajaranId || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collPembelajaransRelatedByPembelajaranId) {
                // return empty collection
                $this->initPembelajaransRelatedByPembelajaranId();
            } else {
                $collPembelajaransRelatedByPembelajaranId = PembelajaranQuery::create(null, $criteria)
                    ->filterByPembelajaranRelatedByIndukPembelajaranId($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collPembelajaransRelatedByPembelajaranIdPartial && count($collPembelajaransRelatedByPembelajaranId)) {
                      $this->initPembelajaransRelatedByPembelajaranId(false);

                      foreach($collPembelajaransRelatedByPembelajaranId as $obj) {
                        if (false == $this->collPembelajaransRelatedByPembelajaranId->contains($obj)) {
                          $this->collPembelajaransRelatedByPembelajaranId->append($obj);
                        }
                      }

                      $this->collPembelajaransRelatedByPembelajaranIdPartial = true;
                    }

                    $collPembelajaransRelatedByPembelajaranId->getInternalIterator()->rewind();
                    return $collPembelajaransRelatedByPembelajaranId;
                }

                if($partial && $this->collPembelajaransRelatedByPembelajaranId) {
                    foreach($this->collPembelajaransRelatedByPembelajaranId as $obj) {
                        if($obj->isNew()) {
                            $collPembelajaransRelatedByPembelajaranId[] = $obj;
                        }
                    }
                }

                $this->collPembelajaransRelatedByPembelajaranId = $collPembelajaransRelatedByPembelajaranId;
                $this->collPembelajaransRelatedByPembelajaranIdPartial = false;
            }
        }

        return $this->collPembelajaransRelatedByPembelajaranId;
    }

    /**
     * Sets a collection of PembelajaranRelatedByPembelajaranId objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $pembelajaransRelatedByPembelajaranId A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Pembelajaran The current object (for fluent API support)
     */
    public function setPembelajaransRelatedByPembelajaranId(PropelCollection $pembelajaransRelatedByPembelajaranId, PropelPDO $con = null)
    {
        $pembelajaransRelatedByPembelajaranIdToDelete = $this->getPembelajaransRelatedByPembelajaranId(new Criteria(), $con)->diff($pembelajaransRelatedByPembelajaranId);

        $this->pembelajaransRelatedByPembelajaranIdScheduledForDeletion = unserialize(serialize($pembelajaransRelatedByPembelajaranIdToDelete));

        foreach ($pembelajaransRelatedByPembelajaranIdToDelete as $pembelajaranRelatedByPembelajaranIdRemoved) {
            $pembelajaranRelatedByPembelajaranIdRemoved->setPembelajaranRelatedByIndukPembelajaranId(null);
        }

        $this->collPembelajaransRelatedByPembelajaranId = null;
        foreach ($pembelajaransRelatedByPembelajaranId as $pembelajaranRelatedByPembelajaranId) {
            $this->addPembelajaranRelatedByPembelajaranId($pembelajaranRelatedByPembelajaranId);
        }

        $this->collPembelajaransRelatedByPembelajaranId = $pembelajaransRelatedByPembelajaranId;
        $this->collPembelajaransRelatedByPembelajaranIdPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Pembelajaran objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Pembelajaran objects.
     * @throws PropelException
     */
    public function countPembelajaransRelatedByPembelajaranId(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collPembelajaransRelatedByPembelajaranIdPartial && !$this->isNew();
        if (null === $this->collPembelajaransRelatedByPembelajaranId || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPembelajaransRelatedByPembelajaranId) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getPembelajaransRelatedByPembelajaranId());
            }
            $query = PembelajaranQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPembelajaranRelatedByIndukPembelajaranId($this)
                ->count($con);
        }

        return count($this->collPembelajaransRelatedByPembelajaranId);
    }

    /**
     * Method called to associate a Pembelajaran object to this object
     * through the Pembelajaran foreign key attribute.
     *
     * @param    Pembelajaran $l Pembelajaran
     * @return Pembelajaran The current object (for fluent API support)
     */
    public function addPembelajaranRelatedByPembelajaranId(Pembelajaran $l)
    {
        if ($this->collPembelajaransRelatedByPembelajaranId === null) {
            $this->initPembelajaransRelatedByPembelajaranId();
            $this->collPembelajaransRelatedByPembelajaranIdPartial = true;
        }
        if (!in_array($l, $this->collPembelajaransRelatedByPembelajaranId->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddPembelajaranRelatedByPembelajaranId($l);
        }

        return $this;
    }

    /**
     * @param	PembelajaranRelatedByPembelajaranId $pembelajaranRelatedByPembelajaranId The pembelajaranRelatedByPembelajaranId object to add.
     */
    protected function doAddPembelajaranRelatedByPembelajaranId($pembelajaranRelatedByPembelajaranId)
    {
        $this->collPembelajaransRelatedByPembelajaranId[]= $pembelajaranRelatedByPembelajaranId;
        $pembelajaranRelatedByPembelajaranId->setPembelajaranRelatedByIndukPembelajaranId($this);
    }

    /**
     * @param	PembelajaranRelatedByPembelajaranId $pembelajaranRelatedByPembelajaranId The pembelajaranRelatedByPembelajaranId object to remove.
     * @return Pembelajaran The current object (for fluent API support)
     */
    public function removePembelajaranRelatedByPembelajaranId($pembelajaranRelatedByPembelajaranId)
    {
        if ($this->getPembelajaransRelatedByPembelajaranId()->contains($pembelajaranRelatedByPembelajaranId)) {
            $this->collPembelajaransRelatedByPembelajaranId->remove($this->collPembelajaransRelatedByPembelajaranId->search($pembelajaranRelatedByPembelajaranId));
            if (null === $this->pembelajaransRelatedByPembelajaranIdScheduledForDeletion) {
                $this->pembelajaransRelatedByPembelajaranIdScheduledForDeletion = clone $this->collPembelajaransRelatedByPembelajaranId;
                $this->pembelajaransRelatedByPembelajaranIdScheduledForDeletion->clear();
            }
            $this->pembelajaransRelatedByPembelajaranIdScheduledForDeletion[]= $pembelajaranRelatedByPembelajaranId;
            $pembelajaranRelatedByPembelajaranId->setPembelajaranRelatedByIndukPembelajaranId(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pembelajaran is new, it will return
     * an empty collection; or if this Pembelajaran has previously
     * been saved, it will retrieve related PembelajaransRelatedByPembelajaranId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pembelajaran.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Pembelajaran[] List of Pembelajaran objects
     */
    public function getPembelajaransRelatedByPembelajaranIdJoinPtkTerdaftar($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PembelajaranQuery::create(null, $criteria);
        $query->joinWith('PtkTerdaftar', $join_behavior);

        return $this->getPembelajaransRelatedByPembelajaranId($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pembelajaran is new, it will return
     * an empty collection; or if this Pembelajaran has previously
     * been saved, it will retrieve related PembelajaransRelatedByPembelajaranId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pembelajaran.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Pembelajaran[] List of Pembelajaran objects
     */
    public function getPembelajaransRelatedByPembelajaranIdJoinSemester($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PembelajaranQuery::create(null, $criteria);
        $query->joinWith('Semester', $join_behavior);

        return $this->getPembelajaransRelatedByPembelajaranId($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pembelajaran is new, it will return
     * an empty collection; or if this Pembelajaran has previously
     * been saved, it will retrieve related PembelajaransRelatedByPembelajaranId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pembelajaran.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Pembelajaran[] List of Pembelajaran objects
     */
    public function getPembelajaransRelatedByPembelajaranIdJoinRombonganBelajar($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PembelajaranQuery::create(null, $criteria);
        $query->joinWith('RombonganBelajar', $join_behavior);

        return $this->getPembelajaransRelatedByPembelajaranId($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pembelajaran is new, it will return
     * an empty collection; or if this Pembelajaran has previously
     * been saved, it will retrieve related PembelajaransRelatedByPembelajaranId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pembelajaran.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Pembelajaran[] List of Pembelajaran objects
     */
    public function getPembelajaransRelatedByPembelajaranIdJoinMataPelajaran($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PembelajaranQuery::create(null, $criteria);
        $query->joinWith('MataPelajaran', $join_behavior);

        return $this->getPembelajaransRelatedByPembelajaranId($query, $con);
    }

    /**
     * Clears out the collVldPembelajarans collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Pembelajaran The current object (for fluent API support)
     * @see        addVldPembelajarans()
     */
    public function clearVldPembelajarans()
    {
        $this->collVldPembelajarans = null; // important to set this to null since that means it is uninitialized
        $this->collVldPembelajaransPartial = null;

        return $this;
    }

    /**
     * reset is the collVldPembelajarans collection loaded partially
     *
     * @return void
     */
    public function resetPartialVldPembelajarans($v = true)
    {
        $this->collVldPembelajaransPartial = $v;
    }

    /**
     * Initializes the collVldPembelajarans collection.
     *
     * By default this just sets the collVldPembelajarans collection to an empty array (like clearcollVldPembelajarans());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initVldPembelajarans($overrideExisting = true)
    {
        if (null !== $this->collVldPembelajarans && !$overrideExisting) {
            return;
        }
        $this->collVldPembelajarans = new PropelObjectCollection();
        $this->collVldPembelajarans->setModel('VldPembelajaran');
    }

    /**
     * Gets an array of VldPembelajaran objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Pembelajaran is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|VldPembelajaran[] List of VldPembelajaran objects
     * @throws PropelException
     */
    public function getVldPembelajarans($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collVldPembelajaransPartial && !$this->isNew();
        if (null === $this->collVldPembelajarans || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collVldPembelajarans) {
                // return empty collection
                $this->initVldPembelajarans();
            } else {
                $collVldPembelajarans = VldPembelajaranQuery::create(null, $criteria)
                    ->filterByPembelajaran($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collVldPembelajaransPartial && count($collVldPembelajarans)) {
                      $this->initVldPembelajarans(false);

                      foreach($collVldPembelajarans as $obj) {
                        if (false == $this->collVldPembelajarans->contains($obj)) {
                          $this->collVldPembelajarans->append($obj);
                        }
                      }

                      $this->collVldPembelajaransPartial = true;
                    }

                    $collVldPembelajarans->getInternalIterator()->rewind();
                    return $collVldPembelajarans;
                }

                if($partial && $this->collVldPembelajarans) {
                    foreach($this->collVldPembelajarans as $obj) {
                        if($obj->isNew()) {
                            $collVldPembelajarans[] = $obj;
                        }
                    }
                }

                $this->collVldPembelajarans = $collVldPembelajarans;
                $this->collVldPembelajaransPartial = false;
            }
        }

        return $this->collVldPembelajarans;
    }

    /**
     * Sets a collection of VldPembelajaran objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $vldPembelajarans A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Pembelajaran The current object (for fluent API support)
     */
    public function setVldPembelajarans(PropelCollection $vldPembelajarans, PropelPDO $con = null)
    {
        $vldPembelajaransToDelete = $this->getVldPembelajarans(new Criteria(), $con)->diff($vldPembelajarans);

        $this->vldPembelajaransScheduledForDeletion = unserialize(serialize($vldPembelajaransToDelete));

        foreach ($vldPembelajaransToDelete as $vldPembelajaranRemoved) {
            $vldPembelajaranRemoved->setPembelajaran(null);
        }

        $this->collVldPembelajarans = null;
        foreach ($vldPembelajarans as $vldPembelajaran) {
            $this->addVldPembelajaran($vldPembelajaran);
        }

        $this->collVldPembelajarans = $vldPembelajarans;
        $this->collVldPembelajaransPartial = false;

        return $this;
    }

    /**
     * Returns the number of related VldPembelajaran objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related VldPembelajaran objects.
     * @throws PropelException
     */
    public function countVldPembelajarans(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collVldPembelajaransPartial && !$this->isNew();
        if (null === $this->collVldPembelajarans || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collVldPembelajarans) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getVldPembelajarans());
            }
            $query = VldPembelajaranQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPembelajaran($this)
                ->count($con);
        }

        return count($this->collVldPembelajarans);
    }

    /**
     * Method called to associate a VldPembelajaran object to this object
     * through the VldPembelajaran foreign key attribute.
     *
     * @param    VldPembelajaran $l VldPembelajaran
     * @return Pembelajaran The current object (for fluent API support)
     */
    public function addVldPembelajaran(VldPembelajaran $l)
    {
        if ($this->collVldPembelajarans === null) {
            $this->initVldPembelajarans();
            $this->collVldPembelajaransPartial = true;
        }
        if (!in_array($l, $this->collVldPembelajarans->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddVldPembelajaran($l);
        }

        return $this;
    }

    /**
     * @param	VldPembelajaran $vldPembelajaran The vldPembelajaran object to add.
     */
    protected function doAddVldPembelajaran($vldPembelajaran)
    {
        $this->collVldPembelajarans[]= $vldPembelajaran;
        $vldPembelajaran->setPembelajaran($this);
    }

    /**
     * @param	VldPembelajaran $vldPembelajaran The vldPembelajaran object to remove.
     * @return Pembelajaran The current object (for fluent API support)
     */
    public function removeVldPembelajaran($vldPembelajaran)
    {
        if ($this->getVldPembelajarans()->contains($vldPembelajaran)) {
            $this->collVldPembelajarans->remove($this->collVldPembelajarans->search($vldPembelajaran));
            if (null === $this->vldPembelajaransScheduledForDeletion) {
                $this->vldPembelajaransScheduledForDeletion = clone $this->collVldPembelajarans;
                $this->vldPembelajaransScheduledForDeletion->clear();
            }
            $this->vldPembelajaransScheduledForDeletion[]= clone $vldPembelajaran;
            $vldPembelajaran->setPembelajaran(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Pembelajaran is new, it will return
     * an empty collection; or if this Pembelajaran has previously
     * been saved, it will retrieve related VldPembelajarans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Pembelajaran.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|VldPembelajaran[] List of VldPembelajaran objects
     */
    public function getVldPembelajaransJoinErrortype($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = VldPembelajaranQuery::create(null, $criteria);
        $query->joinWith('Errortype', $join_behavior);

        return $this->getVldPembelajarans($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->pembelajaran_id = null;
        $this->rombongan_belajar_id = null;
        $this->semester_id = null;
        $this->mata_pelajaran_id = null;
        $this->ptk_terdaftar_id = null;
        $this->sk_mengajar = null;
        $this->tanggal_sk_mengajar = null;
        $this->jam_mengajar_per_minggu = null;
        $this->status_di_kurikulum = null;
        $this->nama_mata_pelajaran = null;
        $this->induk_pembelajaran_id = null;
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
            if ($this->collBukuPelajarans) {
                foreach ($this->collBukuPelajarans as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collJadwalsRelatedByBelKe01) {
                foreach ($this->collJadwalsRelatedByBelKe01 as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collJadwalsRelatedByBelKe02) {
                foreach ($this->collJadwalsRelatedByBelKe02 as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collJadwalsRelatedByBelKe03) {
                foreach ($this->collJadwalsRelatedByBelKe03 as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collJadwalsRelatedByBelKe04) {
                foreach ($this->collJadwalsRelatedByBelKe04 as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collJadwalsRelatedByBelKe05) {
                foreach ($this->collJadwalsRelatedByBelKe05 as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collJadwalsRelatedByBelKe06) {
                foreach ($this->collJadwalsRelatedByBelKe06 as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collJadwalsRelatedByBelKe07) {
                foreach ($this->collJadwalsRelatedByBelKe07 as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collJadwalsRelatedByBelKe08) {
                foreach ($this->collJadwalsRelatedByBelKe08 as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collJadwalsRelatedByBelKe09) {
                foreach ($this->collJadwalsRelatedByBelKe09 as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collJadwalsRelatedByBelKe10) {
                foreach ($this->collJadwalsRelatedByBelKe10 as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collJadwalsRelatedByBelKe11) {
                foreach ($this->collJadwalsRelatedByBelKe11 as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collJadwalsRelatedByBelKe12) {
                foreach ($this->collJadwalsRelatedByBelKe12 as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collJadwalsRelatedByBelKe13) {
                foreach ($this->collJadwalsRelatedByBelKe13 as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collJadwalsRelatedByBelKe14) {
                foreach ($this->collJadwalsRelatedByBelKe14 as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collJadwalsRelatedByBelKe15) {
                foreach ($this->collJadwalsRelatedByBelKe15 as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collJadwalsRelatedByBelKe16) {
                foreach ($this->collJadwalsRelatedByBelKe16 as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collJadwalsRelatedByBelKe17) {
                foreach ($this->collJadwalsRelatedByBelKe17 as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collJadwalsRelatedByBelKe18) {
                foreach ($this->collJadwalsRelatedByBelKe18 as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collJadwalsRelatedByBelKe19) {
                foreach ($this->collJadwalsRelatedByBelKe19 as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collJadwalsRelatedByBelKe20) {
                foreach ($this->collJadwalsRelatedByBelKe20 as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collPembelajaransRelatedByPembelajaranId) {
                foreach ($this->collPembelajaransRelatedByPembelajaranId as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collVldPembelajarans) {
                foreach ($this->collVldPembelajarans as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aPembelajaranRelatedByIndukPembelajaranId instanceof Persistent) {
              $this->aPembelajaranRelatedByIndukPembelajaranId->clearAllReferences($deep);
            }
            if ($this->aPtkTerdaftar instanceof Persistent) {
              $this->aPtkTerdaftar->clearAllReferences($deep);
            }
            if ($this->aSemester instanceof Persistent) {
              $this->aSemester->clearAllReferences($deep);
            }
            if ($this->aRombonganBelajar instanceof Persistent) {
              $this->aRombonganBelajar->clearAllReferences($deep);
            }
            if ($this->aMataPelajaran instanceof Persistent) {
              $this->aMataPelajaran->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collBukuPelajarans instanceof PropelCollection) {
            $this->collBukuPelajarans->clearIterator();
        }
        $this->collBukuPelajarans = null;
        if ($this->collJadwalsRelatedByBelKe01 instanceof PropelCollection) {
            $this->collJadwalsRelatedByBelKe01->clearIterator();
        }
        $this->collJadwalsRelatedByBelKe01 = null;
        if ($this->collJadwalsRelatedByBelKe02 instanceof PropelCollection) {
            $this->collJadwalsRelatedByBelKe02->clearIterator();
        }
        $this->collJadwalsRelatedByBelKe02 = null;
        if ($this->collJadwalsRelatedByBelKe03 instanceof PropelCollection) {
            $this->collJadwalsRelatedByBelKe03->clearIterator();
        }
        $this->collJadwalsRelatedByBelKe03 = null;
        if ($this->collJadwalsRelatedByBelKe04 instanceof PropelCollection) {
            $this->collJadwalsRelatedByBelKe04->clearIterator();
        }
        $this->collJadwalsRelatedByBelKe04 = null;
        if ($this->collJadwalsRelatedByBelKe05 instanceof PropelCollection) {
            $this->collJadwalsRelatedByBelKe05->clearIterator();
        }
        $this->collJadwalsRelatedByBelKe05 = null;
        if ($this->collJadwalsRelatedByBelKe06 instanceof PropelCollection) {
            $this->collJadwalsRelatedByBelKe06->clearIterator();
        }
        $this->collJadwalsRelatedByBelKe06 = null;
        if ($this->collJadwalsRelatedByBelKe07 instanceof PropelCollection) {
            $this->collJadwalsRelatedByBelKe07->clearIterator();
        }
        $this->collJadwalsRelatedByBelKe07 = null;
        if ($this->collJadwalsRelatedByBelKe08 instanceof PropelCollection) {
            $this->collJadwalsRelatedByBelKe08->clearIterator();
        }
        $this->collJadwalsRelatedByBelKe08 = null;
        if ($this->collJadwalsRelatedByBelKe09 instanceof PropelCollection) {
            $this->collJadwalsRelatedByBelKe09->clearIterator();
        }
        $this->collJadwalsRelatedByBelKe09 = null;
        if ($this->collJadwalsRelatedByBelKe10 instanceof PropelCollection) {
            $this->collJadwalsRelatedByBelKe10->clearIterator();
        }
        $this->collJadwalsRelatedByBelKe10 = null;
        if ($this->collJadwalsRelatedByBelKe11 instanceof PropelCollection) {
            $this->collJadwalsRelatedByBelKe11->clearIterator();
        }
        $this->collJadwalsRelatedByBelKe11 = null;
        if ($this->collJadwalsRelatedByBelKe12 instanceof PropelCollection) {
            $this->collJadwalsRelatedByBelKe12->clearIterator();
        }
        $this->collJadwalsRelatedByBelKe12 = null;
        if ($this->collJadwalsRelatedByBelKe13 instanceof PropelCollection) {
            $this->collJadwalsRelatedByBelKe13->clearIterator();
        }
        $this->collJadwalsRelatedByBelKe13 = null;
        if ($this->collJadwalsRelatedByBelKe14 instanceof PropelCollection) {
            $this->collJadwalsRelatedByBelKe14->clearIterator();
        }
        $this->collJadwalsRelatedByBelKe14 = null;
        if ($this->collJadwalsRelatedByBelKe15 instanceof PropelCollection) {
            $this->collJadwalsRelatedByBelKe15->clearIterator();
        }
        $this->collJadwalsRelatedByBelKe15 = null;
        if ($this->collJadwalsRelatedByBelKe16 instanceof PropelCollection) {
            $this->collJadwalsRelatedByBelKe16->clearIterator();
        }
        $this->collJadwalsRelatedByBelKe16 = null;
        if ($this->collJadwalsRelatedByBelKe17 instanceof PropelCollection) {
            $this->collJadwalsRelatedByBelKe17->clearIterator();
        }
        $this->collJadwalsRelatedByBelKe17 = null;
        if ($this->collJadwalsRelatedByBelKe18 instanceof PropelCollection) {
            $this->collJadwalsRelatedByBelKe18->clearIterator();
        }
        $this->collJadwalsRelatedByBelKe18 = null;
        if ($this->collJadwalsRelatedByBelKe19 instanceof PropelCollection) {
            $this->collJadwalsRelatedByBelKe19->clearIterator();
        }
        $this->collJadwalsRelatedByBelKe19 = null;
        if ($this->collJadwalsRelatedByBelKe20 instanceof PropelCollection) {
            $this->collJadwalsRelatedByBelKe20->clearIterator();
        }
        $this->collJadwalsRelatedByBelKe20 = null;
        if ($this->collPembelajaransRelatedByPembelajaranId instanceof PropelCollection) {
            $this->collPembelajaransRelatedByPembelajaranId->clearIterator();
        }
        $this->collPembelajaransRelatedByPembelajaranId = null;
        if ($this->collVldPembelajarans instanceof PropelCollection) {
            $this->collVldPembelajarans->clearIterator();
        }
        $this->collVldPembelajarans = null;
        $this->aPembelajaranRelatedByIndukPembelajaranId = null;
        $this->aPtkTerdaftar = null;
        $this->aSemester = null;
        $this->aRombonganBelajar = null;
        $this->aMataPelajaran = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(PembelajaranPeer::DEFAULT_STRING_FORMAT);
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
