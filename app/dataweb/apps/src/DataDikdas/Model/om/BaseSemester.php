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
use DataDikdas\Model\AktivitasKepanitiaan;
use DataDikdas\Model\AktivitasKepanitiaanQuery;
use DataDikdas\Model\AlatLongitudinal;
use DataDikdas\Model\AlatLongitudinalQuery;
use DataDikdas\Model\BangunanLongitudinal;
use DataDikdas\Model\BangunanLongitudinalQuery;
use DataDikdas\Model\BatasWaktuRapor;
use DataDikdas\Model\BatasWaktuRaporQuery;
use DataDikdas\Model\BukuLongitudinal;
use DataDikdas\Model\BukuLongitudinalQuery;
use DataDikdas\Model\JurSpLong;
use DataDikdas\Model\JurSpLongQuery;
use DataDikdas\Model\Pembelajaran;
use DataDikdas\Model\PembelajaranQuery;
use DataDikdas\Model\PesertaDidikLongitudinal;
use DataDikdas\Model\PesertaDidikLongitudinalQuery;
use DataDikdas\Model\RombonganBelajar;
use DataDikdas\Model\RombonganBelajarQuery;
use DataDikdas\Model\RuangLongitudinal;
use DataDikdas\Model\RuangLongitudinalQuery;
use DataDikdas\Model\Sanitasi;
use DataDikdas\Model\SanitasiQuery;
use DataDikdas\Model\SekolahLongitudinal;
use DataDikdas\Model\SekolahLongitudinalQuery;
use DataDikdas\Model\Semester;
use DataDikdas\Model\SemesterPeer;
use DataDikdas\Model\SemesterQuery;
use DataDikdas\Model\TahunAjaran;
use DataDikdas\Model\TahunAjaranQuery;
use DataDikdas\Model\Tunjangan;
use DataDikdas\Model\TunjanganQuery;

/**
 * Base class that represents a row from the 'ref.semester' table.
 *
 * 
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseSemester extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'DataDikdas\\Model\\SemesterPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        SemesterPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the semester_id field.
     * @var        string
     */
    protected $semester_id;

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
     * The value for the semester field.
     * @var        string
     */
    protected $semester;

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
     * @var        TahunAjaran
     */
    protected $aTahunAjaran;

    /**
     * @var        PropelObjectCollection|AktivitasKepanitiaan[] Collection to store aggregation of AktivitasKepanitiaan objects.
     */
    protected $collAktivitasKepanitiaans;
    protected $collAktivitasKepanitiaansPartial;

    /**
     * @var        PropelObjectCollection|AlatLongitudinal[] Collection to store aggregation of AlatLongitudinal objects.
     */
    protected $collAlatLongitudinals;
    protected $collAlatLongitudinalsPartial;

    /**
     * @var        PropelObjectCollection|BangunanLongitudinal[] Collection to store aggregation of BangunanLongitudinal objects.
     */
    protected $collBangunanLongitudinals;
    protected $collBangunanLongitudinalsPartial;

    /**
     * @var        BatasWaktuRapor one-to-one related BatasWaktuRapor object
     */
    protected $singleBatasWaktuRapor;

    /**
     * @var        PropelObjectCollection|BukuLongitudinal[] Collection to store aggregation of BukuLongitudinal objects.
     */
    protected $collBukuLongitudinals;
    protected $collBukuLongitudinalsPartial;

    /**
     * @var        PropelObjectCollection|JurSpLong[] Collection to store aggregation of JurSpLong objects.
     */
    protected $collJurSpLongs;
    protected $collJurSpLongsPartial;

    /**
     * @var        PropelObjectCollection|Pembelajaran[] Collection to store aggregation of Pembelajaran objects.
     */
    protected $collPembelajarans;
    protected $collPembelajaransPartial;

    /**
     * @var        PropelObjectCollection|PesertaDidikLongitudinal[] Collection to store aggregation of PesertaDidikLongitudinal objects.
     */
    protected $collPesertaDidikLongitudinals;
    protected $collPesertaDidikLongitudinalsPartial;

    /**
     * @var        PropelObjectCollection|RombonganBelajar[] Collection to store aggregation of RombonganBelajar objects.
     */
    protected $collRombonganBelajars;
    protected $collRombonganBelajarsPartial;

    /**
     * @var        PropelObjectCollection|RuangLongitudinal[] Collection to store aggregation of RuangLongitudinal objects.
     */
    protected $collRuangLongitudinals;
    protected $collRuangLongitudinalsPartial;

    /**
     * @var        PropelObjectCollection|Sanitasi[] Collection to store aggregation of Sanitasi objects.
     */
    protected $collSanitasis;
    protected $collSanitasisPartial;

    /**
     * @var        PropelObjectCollection|SekolahLongitudinal[] Collection to store aggregation of SekolahLongitudinal objects.
     */
    protected $collSekolahLongitudinals;
    protected $collSekolahLongitudinalsPartial;

    /**
     * @var        PropelObjectCollection|Tunjangan[] Collection to store aggregation of Tunjangan objects.
     */
    protected $collTunjangans;
    protected $collTunjangansPartial;

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
    protected $aktivitasKepanitiaansScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $alatLongitudinalsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $bangunanLongitudinalsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $batasWaktuRaporsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $bukuLongitudinalsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $jurSpLongsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $pembelajaransScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $pesertaDidikLongitudinalsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $rombonganBelajarsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $ruangLongitudinalsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $sanitasisScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $sekolahLongitudinalsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $tunjangansScheduledForDeletion = null;

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
     * Initializes internal state of BaseSemester object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
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
     * Get the [semester] column value.
     * 
     * @return string
     */
    public function getSemester()
    {
        return $this->semester;
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
     * Set the value of [semester_id] column.
     * 
     * @param string $v new value
     * @return Semester The current object (for fluent API support)
     */
    public function setSemesterId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->semester_id !== $v) {
            $this->semester_id = $v;
            $this->modifiedColumns[] = SemesterPeer::SEMESTER_ID;
        }


        return $this;
    } // setSemesterId()

    /**
     * Set the value of [tahun_ajaran_id] column.
     * 
     * @param string $v new value
     * @return Semester The current object (for fluent API support)
     */
    public function setTahunAjaranId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->tahun_ajaran_id !== $v) {
            $this->tahun_ajaran_id = $v;
            $this->modifiedColumns[] = SemesterPeer::TAHUN_AJARAN_ID;
        }

        if ($this->aTahunAjaran !== null && $this->aTahunAjaran->getTahunAjaranId() !== $v) {
            $this->aTahunAjaran = null;
        }


        return $this;
    } // setTahunAjaranId()

    /**
     * Set the value of [nama] column.
     * 
     * @param string $v new value
     * @return Semester The current object (for fluent API support)
     */
    public function setNama($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nama !== $v) {
            $this->nama = $v;
            $this->modifiedColumns[] = SemesterPeer::NAMA;
        }


        return $this;
    } // setNama()

    /**
     * Set the value of [semester] column.
     * 
     * @param string $v new value
     * @return Semester The current object (for fluent API support)
     */
    public function setSemester($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->semester !== $v) {
            $this->semester = $v;
            $this->modifiedColumns[] = SemesterPeer::SEMESTER;
        }


        return $this;
    } // setSemester()

    /**
     * Set the value of [periode_aktif] column.
     * 
     * @param string $v new value
     * @return Semester The current object (for fluent API support)
     */
    public function setPeriodeAktif($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->periode_aktif !== $v) {
            $this->periode_aktif = $v;
            $this->modifiedColumns[] = SemesterPeer::PERIODE_AKTIF;
        }


        return $this;
    } // setPeriodeAktif()

    /**
     * Sets the value of [tanggal_mulai] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Semester The current object (for fluent API support)
     */
    public function setTanggalMulai($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->tanggal_mulai !== null || $dt !== null) {
            $currentDateAsString = ($this->tanggal_mulai !== null && $tmpDt = new DateTime($this->tanggal_mulai)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->tanggal_mulai = $newDateAsString;
                $this->modifiedColumns[] = SemesterPeer::TANGGAL_MULAI;
            }
        } // if either are not null


        return $this;
    } // setTanggalMulai()

    /**
     * Sets the value of [tanggal_selesai] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Semester The current object (for fluent API support)
     */
    public function setTanggalSelesai($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->tanggal_selesai !== null || $dt !== null) {
            $currentDateAsString = ($this->tanggal_selesai !== null && $tmpDt = new DateTime($this->tanggal_selesai)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->tanggal_selesai = $newDateAsString;
                $this->modifiedColumns[] = SemesterPeer::TANGGAL_SELESAI;
            }
        } // if either are not null


        return $this;
    } // setTanggalSelesai()

    /**
     * Sets the value of [create_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Semester The current object (for fluent API support)
     */
    public function setCreateDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->create_date !== null || $dt !== null) {
            $currentDateAsString = ($this->create_date !== null && $tmpDt = new DateTime($this->create_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->create_date = $newDateAsString;
                $this->modifiedColumns[] = SemesterPeer::CREATE_DATE;
            }
        } // if either are not null


        return $this;
    } // setCreateDate()

    /**
     * Sets the value of [last_update] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Semester The current object (for fluent API support)
     */
    public function setLastUpdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->last_update !== null || $dt !== null) {
            $currentDateAsString = ($this->last_update !== null && $tmpDt = new DateTime($this->last_update)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->last_update = $newDateAsString;
                $this->modifiedColumns[] = SemesterPeer::LAST_UPDATE;
            }
        } // if either are not null


        return $this;
    } // setLastUpdate()

    /**
     * Sets the value of [expired_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Semester The current object (for fluent API support)
     */
    public function setExpiredDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->expired_date !== null || $dt !== null) {
            $currentDateAsString = ($this->expired_date !== null && $tmpDt = new DateTime($this->expired_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->expired_date = $newDateAsString;
                $this->modifiedColumns[] = SemesterPeer::EXPIRED_DATE;
            }
        } // if either are not null


        return $this;
    } // setExpiredDate()

    /**
     * Sets the value of [last_sync] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Semester The current object (for fluent API support)
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
                $this->modifiedColumns[] = SemesterPeer::LAST_SYNC;
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

            $this->semester_id = ($row[$startcol + 0] !== null) ? (string) $row[$startcol + 0] : null;
            $this->tahun_ajaran_id = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->nama = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->semester = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->periode_aktif = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->tanggal_mulai = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->tanggal_selesai = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
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
            return $startcol + 11; // 11 = SemesterPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Semester object", $e);
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

        if ($this->aTahunAjaran !== null && $this->tahun_ajaran_id !== $this->aTahunAjaran->getTahunAjaranId()) {
            $this->aTahunAjaran = null;
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
            $con = Propel::getConnection(SemesterPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = SemesterPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aTahunAjaran = null;
            $this->collAktivitasKepanitiaans = null;

            $this->collAlatLongitudinals = null;

            $this->collBangunanLongitudinals = null;

            $this->singleBatasWaktuRapor = null;

            $this->collBukuLongitudinals = null;

            $this->collJurSpLongs = null;

            $this->collPembelajarans = null;

            $this->collPesertaDidikLongitudinals = null;

            $this->collRombonganBelajars = null;

            $this->collRuangLongitudinals = null;

            $this->collSanitasis = null;

            $this->collSekolahLongitudinals = null;

            $this->collTunjangans = null;

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
            $con = Propel::getConnection(SemesterPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = SemesterQuery::create()
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
            $con = Propel::getConnection(SemesterPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                SemesterPeer::addInstanceToPool($this);
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

            if ($this->aTahunAjaran !== null) {
                if ($this->aTahunAjaran->isModified() || $this->aTahunAjaran->isNew()) {
                    $affectedRows += $this->aTahunAjaran->save($con);
                }
                $this->setTahunAjaran($this->aTahunAjaran);
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

            if ($this->aktivitasKepanitiaansScheduledForDeletion !== null) {
                if (!$this->aktivitasKepanitiaansScheduledForDeletion->isEmpty()) {
                    AktivitasKepanitiaanQuery::create()
                        ->filterByPrimaryKeys($this->aktivitasKepanitiaansScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->aktivitasKepanitiaansScheduledForDeletion = null;
                }
            }

            if ($this->collAktivitasKepanitiaans !== null) {
                foreach ($this->collAktivitasKepanitiaans as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->alatLongitudinalsScheduledForDeletion !== null) {
                if (!$this->alatLongitudinalsScheduledForDeletion->isEmpty()) {
                    AlatLongitudinalQuery::create()
                        ->filterByPrimaryKeys($this->alatLongitudinalsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->alatLongitudinalsScheduledForDeletion = null;
                }
            }

            if ($this->collAlatLongitudinals !== null) {
                foreach ($this->collAlatLongitudinals as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->bangunanLongitudinalsScheduledForDeletion !== null) {
                if (!$this->bangunanLongitudinalsScheduledForDeletion->isEmpty()) {
                    BangunanLongitudinalQuery::create()
                        ->filterByPrimaryKeys($this->bangunanLongitudinalsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->bangunanLongitudinalsScheduledForDeletion = null;
                }
            }

            if ($this->collBangunanLongitudinals !== null) {
                foreach ($this->collBangunanLongitudinals as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->batasWaktuRaporsScheduledForDeletion !== null) {
                if (!$this->batasWaktuRaporsScheduledForDeletion->isEmpty()) {
                    BatasWaktuRaporQuery::create()
                        ->filterByPrimaryKeys($this->batasWaktuRaporsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->batasWaktuRaporsScheduledForDeletion = null;
                }
            }

            if ($this->singleBatasWaktuRapor !== null) {
                if (!$this->singleBatasWaktuRapor->isDeleted() && ($this->singleBatasWaktuRapor->isNew() || $this->singleBatasWaktuRapor->isModified())) {
                        $affectedRows += $this->singleBatasWaktuRapor->save($con);
                }
            }

            if ($this->bukuLongitudinalsScheduledForDeletion !== null) {
                if (!$this->bukuLongitudinalsScheduledForDeletion->isEmpty()) {
                    BukuLongitudinalQuery::create()
                        ->filterByPrimaryKeys($this->bukuLongitudinalsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->bukuLongitudinalsScheduledForDeletion = null;
                }
            }

            if ($this->collBukuLongitudinals !== null) {
                foreach ($this->collBukuLongitudinals as $referrerFK) {
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

            if ($this->pembelajaransScheduledForDeletion !== null) {
                if (!$this->pembelajaransScheduledForDeletion->isEmpty()) {
                    PembelajaranQuery::create()
                        ->filterByPrimaryKeys($this->pembelajaransScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->pembelajaransScheduledForDeletion = null;
                }
            }

            if ($this->collPembelajarans !== null) {
                foreach ($this->collPembelajarans as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->pesertaDidikLongitudinalsScheduledForDeletion !== null) {
                if (!$this->pesertaDidikLongitudinalsScheduledForDeletion->isEmpty()) {
                    PesertaDidikLongitudinalQuery::create()
                        ->filterByPrimaryKeys($this->pesertaDidikLongitudinalsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->pesertaDidikLongitudinalsScheduledForDeletion = null;
                }
            }

            if ($this->collPesertaDidikLongitudinals !== null) {
                foreach ($this->collPesertaDidikLongitudinals as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->rombonganBelajarsScheduledForDeletion !== null) {
                if (!$this->rombonganBelajarsScheduledForDeletion->isEmpty()) {
                    RombonganBelajarQuery::create()
                        ->filterByPrimaryKeys($this->rombonganBelajarsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
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

            if ($this->ruangLongitudinalsScheduledForDeletion !== null) {
                if (!$this->ruangLongitudinalsScheduledForDeletion->isEmpty()) {
                    RuangLongitudinalQuery::create()
                        ->filterByPrimaryKeys($this->ruangLongitudinalsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->ruangLongitudinalsScheduledForDeletion = null;
                }
            }

            if ($this->collRuangLongitudinals !== null) {
                foreach ($this->collRuangLongitudinals as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->sanitasisScheduledForDeletion !== null) {
                if (!$this->sanitasisScheduledForDeletion->isEmpty()) {
                    SanitasiQuery::create()
                        ->filterByPrimaryKeys($this->sanitasisScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->sanitasisScheduledForDeletion = null;
                }
            }

            if ($this->collSanitasis !== null) {
                foreach ($this->collSanitasis as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->sekolahLongitudinalsScheduledForDeletion !== null) {
                if (!$this->sekolahLongitudinalsScheduledForDeletion->isEmpty()) {
                    SekolahLongitudinalQuery::create()
                        ->filterByPrimaryKeys($this->sekolahLongitudinalsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->sekolahLongitudinalsScheduledForDeletion = null;
                }
            }

            if ($this->collSekolahLongitudinals !== null) {
                foreach ($this->collSekolahLongitudinals as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->tunjangansScheduledForDeletion !== null) {
                if (!$this->tunjangansScheduledForDeletion->isEmpty()) {
                    foreach ($this->tunjangansScheduledForDeletion as $tunjangan) {
                        // need to save related object because we set the relation to null
                        $tunjangan->save($con);
                    }
                    $this->tunjangansScheduledForDeletion = null;
                }
            }

            if ($this->collTunjangans !== null) {
                foreach ($this->collTunjangans as $referrerFK) {
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
        if ($this->isColumnModified(SemesterPeer::SEMESTER_ID)) {
            $modifiedColumns[':p' . $index++]  = '"semester_id"';
        }
        if ($this->isColumnModified(SemesterPeer::TAHUN_AJARAN_ID)) {
            $modifiedColumns[':p' . $index++]  = '"tahun_ajaran_id"';
        }
        if ($this->isColumnModified(SemesterPeer::NAMA)) {
            $modifiedColumns[':p' . $index++]  = '"nama"';
        }
        if ($this->isColumnModified(SemesterPeer::SEMESTER)) {
            $modifiedColumns[':p' . $index++]  = '"semester"';
        }
        if ($this->isColumnModified(SemesterPeer::PERIODE_AKTIF)) {
            $modifiedColumns[':p' . $index++]  = '"periode_aktif"';
        }
        if ($this->isColumnModified(SemesterPeer::TANGGAL_MULAI)) {
            $modifiedColumns[':p' . $index++]  = '"tanggal_mulai"';
        }
        if ($this->isColumnModified(SemesterPeer::TANGGAL_SELESAI)) {
            $modifiedColumns[':p' . $index++]  = '"tanggal_selesai"';
        }
        if ($this->isColumnModified(SemesterPeer::CREATE_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"create_date"';
        }
        if ($this->isColumnModified(SemesterPeer::LAST_UPDATE)) {
            $modifiedColumns[':p' . $index++]  = '"last_update"';
        }
        if ($this->isColumnModified(SemesterPeer::EXPIRED_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"expired_date"';
        }
        if ($this->isColumnModified(SemesterPeer::LAST_SYNC)) {
            $modifiedColumns[':p' . $index++]  = '"last_sync"';
        }

        $sql = sprintf(
            'INSERT INTO "ref"."semester" (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '"semester_id"':						
                        $stmt->bindValue($identifier, $this->semester_id, PDO::PARAM_STR);
                        break;
                    case '"tahun_ajaran_id"':						
                        $stmt->bindValue($identifier, $this->tahun_ajaran_id, PDO::PARAM_STR);
                        break;
                    case '"nama"':						
                        $stmt->bindValue($identifier, $this->nama, PDO::PARAM_STR);
                        break;
                    case '"semester"':						
                        $stmt->bindValue($identifier, $this->semester, PDO::PARAM_STR);
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


            // We call the validate method on the following object(s) if they
            // were passed to this object by their coresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aTahunAjaran !== null) {
                if (!$this->aTahunAjaran->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aTahunAjaran->getValidationFailures());
                }
            }


            if (($retval = SemesterPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collAktivitasKepanitiaans !== null) {
                    foreach ($this->collAktivitasKepanitiaans as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collAlatLongitudinals !== null) {
                    foreach ($this->collAlatLongitudinals as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collBangunanLongitudinals !== null) {
                    foreach ($this->collBangunanLongitudinals as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->singleBatasWaktuRapor !== null) {
                    if (!$this->singleBatasWaktuRapor->validate($columns)) {
                        $failureMap = array_merge($failureMap, $this->singleBatasWaktuRapor->getValidationFailures());
                    }
                }

                if ($this->collBukuLongitudinals !== null) {
                    foreach ($this->collBukuLongitudinals as $referrerFK) {
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

                if ($this->collPembelajarans !== null) {
                    foreach ($this->collPembelajarans as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collPesertaDidikLongitudinals !== null) {
                    foreach ($this->collPesertaDidikLongitudinals as $referrerFK) {
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

                if ($this->collRuangLongitudinals !== null) {
                    foreach ($this->collRuangLongitudinals as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collSanitasis !== null) {
                    foreach ($this->collSanitasis as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collSekolahLongitudinals !== null) {
                    foreach ($this->collSekolahLongitudinals as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collTunjangans !== null) {
                    foreach ($this->collTunjangans as $referrerFK) {
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
        $pos = SemesterPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getSemesterId();
                break;
            case 1:
                return $this->getTahunAjaranId();
                break;
            case 2:
                return $this->getNama();
                break;
            case 3:
                return $this->getSemester();
                break;
            case 4:
                return $this->getPeriodeAktif();
                break;
            case 5:
                return $this->getTanggalMulai();
                break;
            case 6:
                return $this->getTanggalSelesai();
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
        if (isset($alreadyDumpedObjects['Semester'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Semester'][$this->getPrimaryKey()] = true;
        $keys = SemesterPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getSemesterId(),
            $keys[1] => $this->getTahunAjaranId(),
            $keys[2] => $this->getNama(),
            $keys[3] => $this->getSemester(),
            $keys[4] => $this->getPeriodeAktif(),
            $keys[5] => $this->getTanggalMulai(),
            $keys[6] => $this->getTanggalSelesai(),
            $keys[7] => $this->getCreateDate(),
            $keys[8] => $this->getLastUpdate(),
            $keys[9] => $this->getExpiredDate(),
            $keys[10] => $this->getLastSync(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aTahunAjaran) {
                $result['TahunAjaran'] = $this->aTahunAjaran->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collAktivitasKepanitiaans) {
                $result['AktivitasKepanitiaans'] = $this->collAktivitasKepanitiaans->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collAlatLongitudinals) {
                $result['AlatLongitudinals'] = $this->collAlatLongitudinals->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collBangunanLongitudinals) {
                $result['BangunanLongitudinals'] = $this->collBangunanLongitudinals->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->singleBatasWaktuRapor) {
                $result['BatasWaktuRapor'] = $this->singleBatasWaktuRapor->toArray($keyType, $includeLazyLoadColumns, $alreadyDumpedObjects, true);
            }
            if (null !== $this->collBukuLongitudinals) {
                $result['BukuLongitudinals'] = $this->collBukuLongitudinals->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collJurSpLongs) {
                $result['JurSpLongs'] = $this->collJurSpLongs->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collPembelajarans) {
                $result['Pembelajarans'] = $this->collPembelajarans->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collPesertaDidikLongitudinals) {
                $result['PesertaDidikLongitudinals'] = $this->collPesertaDidikLongitudinals->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collRombonganBelajars) {
                $result['RombonganBelajars'] = $this->collRombonganBelajars->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collRuangLongitudinals) {
                $result['RuangLongitudinals'] = $this->collRuangLongitudinals->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collSanitasis) {
                $result['Sanitasis'] = $this->collSanitasis->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collSekolahLongitudinals) {
                $result['SekolahLongitudinals'] = $this->collSekolahLongitudinals->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collTunjangans) {
                $result['Tunjangans'] = $this->collTunjangans->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = SemesterPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setSemesterId($value);
                break;
            case 1:
                $this->setTahunAjaranId($value);
                break;
            case 2:
                $this->setNama($value);
                break;
            case 3:
                $this->setSemester($value);
                break;
            case 4:
                $this->setPeriodeAktif($value);
                break;
            case 5:
                $this->setTanggalMulai($value);
                break;
            case 6:
                $this->setTanggalSelesai($value);
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
        $keys = SemesterPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setSemesterId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setTahunAjaranId($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setNama($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setSemester($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setPeriodeAktif($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setTanggalMulai($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setTanggalSelesai($arr[$keys[6]]);
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
        $criteria = new Criteria(SemesterPeer::DATABASE_NAME);

        if ($this->isColumnModified(SemesterPeer::SEMESTER_ID)) $criteria->add(SemesterPeer::SEMESTER_ID, $this->semester_id);
        if ($this->isColumnModified(SemesterPeer::TAHUN_AJARAN_ID)) $criteria->add(SemesterPeer::TAHUN_AJARAN_ID, $this->tahun_ajaran_id);
        if ($this->isColumnModified(SemesterPeer::NAMA)) $criteria->add(SemesterPeer::NAMA, $this->nama);
        if ($this->isColumnModified(SemesterPeer::SEMESTER)) $criteria->add(SemesterPeer::SEMESTER, $this->semester);
        if ($this->isColumnModified(SemesterPeer::PERIODE_AKTIF)) $criteria->add(SemesterPeer::PERIODE_AKTIF, $this->periode_aktif);
        if ($this->isColumnModified(SemesterPeer::TANGGAL_MULAI)) $criteria->add(SemesterPeer::TANGGAL_MULAI, $this->tanggal_mulai);
        if ($this->isColumnModified(SemesterPeer::TANGGAL_SELESAI)) $criteria->add(SemesterPeer::TANGGAL_SELESAI, $this->tanggal_selesai);
        if ($this->isColumnModified(SemesterPeer::CREATE_DATE)) $criteria->add(SemesterPeer::CREATE_DATE, $this->create_date);
        if ($this->isColumnModified(SemesterPeer::LAST_UPDATE)) $criteria->add(SemesterPeer::LAST_UPDATE, $this->last_update);
        if ($this->isColumnModified(SemesterPeer::EXPIRED_DATE)) $criteria->add(SemesterPeer::EXPIRED_DATE, $this->expired_date);
        if ($this->isColumnModified(SemesterPeer::LAST_SYNC)) $criteria->add(SemesterPeer::LAST_SYNC, $this->last_sync);

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
        $criteria = new Criteria(SemesterPeer::DATABASE_NAME);
        $criteria->add(SemesterPeer::SEMESTER_ID, $this->semester_id);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return string
     */
    public function getPrimaryKey()
    {
        return $this->getSemesterId();
    }

    /**
     * Generic method to set the primary key (semester_id column).
     *
     * @param  string $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setSemesterId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getSemesterId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of Semester (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setTahunAjaranId($this->getTahunAjaranId());
        $copyObj->setNama($this->getNama());
        $copyObj->setSemester($this->getSemester());
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

            foreach ($this->getAktivitasKepanitiaans() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addAktivitasKepanitiaan($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getAlatLongitudinals() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addAlatLongitudinal($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getBangunanLongitudinals() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addBangunanLongitudinal($relObj->copy($deepCopy));
                }
            }

            $relObj = $this->getBatasWaktuRapor();
            if ($relObj) {
                $copyObj->setBatasWaktuRapor($relObj->copy($deepCopy));
            }

            foreach ($this->getBukuLongitudinals() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addBukuLongitudinal($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getJurSpLongs() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addJurSpLong($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getPembelajarans() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPembelajaran($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getPesertaDidikLongitudinals() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPesertaDidikLongitudinal($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getRombonganBelajars() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addRombonganBelajar($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getRuangLongitudinals() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addRuangLongitudinal($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getSanitasis() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSanitasi($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getSekolahLongitudinals() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSekolahLongitudinal($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getTunjangans() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addTunjangan($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setSemesterId(NULL); // this is a auto-increment column, so set to default value
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
     * @return Semester Clone of current object.
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
     * @return SemesterPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new SemesterPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a TahunAjaran object.
     *
     * @param             TahunAjaran $v
     * @return Semester The current object (for fluent API support)
     * @throws PropelException
     */
    public function setTahunAjaran(TahunAjaran $v = null)
    {
        if ($v === null) {
            $this->setTahunAjaranId(NULL);
        } else {
            $this->setTahunAjaranId($v->getTahunAjaranId());
        }

        $this->aTahunAjaran = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the TahunAjaran object, it will not be re-added.
        if ($v !== null) {
            $v->addSemester($this);
        }


        return $this;
    }


    /**
     * Get the associated TahunAjaran object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return TahunAjaran The associated TahunAjaran object.
     * @throws PropelException
     */
    public function getTahunAjaran(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aTahunAjaran === null && (($this->tahun_ajaran_id !== "" && $this->tahun_ajaran_id !== null)) && $doQuery) {
            $this->aTahunAjaran = TahunAjaranQuery::create()->findPk($this->tahun_ajaran_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aTahunAjaran->addSemesters($this);
             */
        }

        return $this->aTahunAjaran;
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
        if ('AktivitasKepanitiaan' == $relationName) {
            $this->initAktivitasKepanitiaans();
        }
        if ('AlatLongitudinal' == $relationName) {
            $this->initAlatLongitudinals();
        }
        if ('BangunanLongitudinal' == $relationName) {
            $this->initBangunanLongitudinals();
        }
        if ('BukuLongitudinal' == $relationName) {
            $this->initBukuLongitudinals();
        }
        if ('JurSpLong' == $relationName) {
            $this->initJurSpLongs();
        }
        if ('Pembelajaran' == $relationName) {
            $this->initPembelajarans();
        }
        if ('PesertaDidikLongitudinal' == $relationName) {
            $this->initPesertaDidikLongitudinals();
        }
        if ('RombonganBelajar' == $relationName) {
            $this->initRombonganBelajars();
        }
        if ('RuangLongitudinal' == $relationName) {
            $this->initRuangLongitudinals();
        }
        if ('Sanitasi' == $relationName) {
            $this->initSanitasis();
        }
        if ('SekolahLongitudinal' == $relationName) {
            $this->initSekolahLongitudinals();
        }
        if ('Tunjangan' == $relationName) {
            $this->initTunjangans();
        }
    }

    /**
     * Clears out the collAktivitasKepanitiaans collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Semester The current object (for fluent API support)
     * @see        addAktivitasKepanitiaans()
     */
    public function clearAktivitasKepanitiaans()
    {
        $this->collAktivitasKepanitiaans = null; // important to set this to null since that means it is uninitialized
        $this->collAktivitasKepanitiaansPartial = null;

        return $this;
    }

    /**
     * reset is the collAktivitasKepanitiaans collection loaded partially
     *
     * @return void
     */
    public function resetPartialAktivitasKepanitiaans($v = true)
    {
        $this->collAktivitasKepanitiaansPartial = $v;
    }

    /**
     * Initializes the collAktivitasKepanitiaans collection.
     *
     * By default this just sets the collAktivitasKepanitiaans collection to an empty array (like clearcollAktivitasKepanitiaans());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initAktivitasKepanitiaans($overrideExisting = true)
    {
        if (null !== $this->collAktivitasKepanitiaans && !$overrideExisting) {
            return;
        }
        $this->collAktivitasKepanitiaans = new PropelObjectCollection();
        $this->collAktivitasKepanitiaans->setModel('AktivitasKepanitiaan');
    }

    /**
     * Gets an array of AktivitasKepanitiaan objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Semester is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|AktivitasKepanitiaan[] List of AktivitasKepanitiaan objects
     * @throws PropelException
     */
    public function getAktivitasKepanitiaans($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collAktivitasKepanitiaansPartial && !$this->isNew();
        if (null === $this->collAktivitasKepanitiaans || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collAktivitasKepanitiaans) {
                // return empty collection
                $this->initAktivitasKepanitiaans();
            } else {
                $collAktivitasKepanitiaans = AktivitasKepanitiaanQuery::create(null, $criteria)
                    ->filterBySemester($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collAktivitasKepanitiaansPartial && count($collAktivitasKepanitiaans)) {
                      $this->initAktivitasKepanitiaans(false);

                      foreach($collAktivitasKepanitiaans as $obj) {
                        if (false == $this->collAktivitasKepanitiaans->contains($obj)) {
                          $this->collAktivitasKepanitiaans->append($obj);
                        }
                      }

                      $this->collAktivitasKepanitiaansPartial = true;
                    }

                    $collAktivitasKepanitiaans->getInternalIterator()->rewind();
                    return $collAktivitasKepanitiaans;
                }

                if($partial && $this->collAktivitasKepanitiaans) {
                    foreach($this->collAktivitasKepanitiaans as $obj) {
                        if($obj->isNew()) {
                            $collAktivitasKepanitiaans[] = $obj;
                        }
                    }
                }

                $this->collAktivitasKepanitiaans = $collAktivitasKepanitiaans;
                $this->collAktivitasKepanitiaansPartial = false;
            }
        }

        return $this->collAktivitasKepanitiaans;
    }

    /**
     * Sets a collection of AktivitasKepanitiaan objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $aktivitasKepanitiaans A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Semester The current object (for fluent API support)
     */
    public function setAktivitasKepanitiaans(PropelCollection $aktivitasKepanitiaans, PropelPDO $con = null)
    {
        $aktivitasKepanitiaansToDelete = $this->getAktivitasKepanitiaans(new Criteria(), $con)->diff($aktivitasKepanitiaans);

        $this->aktivitasKepanitiaansScheduledForDeletion = unserialize(serialize($aktivitasKepanitiaansToDelete));

        foreach ($aktivitasKepanitiaansToDelete as $aktivitasKepanitiaanRemoved) {
            $aktivitasKepanitiaanRemoved->setSemester(null);
        }

        $this->collAktivitasKepanitiaans = null;
        foreach ($aktivitasKepanitiaans as $aktivitasKepanitiaan) {
            $this->addAktivitasKepanitiaan($aktivitasKepanitiaan);
        }

        $this->collAktivitasKepanitiaans = $aktivitasKepanitiaans;
        $this->collAktivitasKepanitiaansPartial = false;

        return $this;
    }

    /**
     * Returns the number of related AktivitasKepanitiaan objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related AktivitasKepanitiaan objects.
     * @throws PropelException
     */
    public function countAktivitasKepanitiaans(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collAktivitasKepanitiaansPartial && !$this->isNew();
        if (null === $this->collAktivitasKepanitiaans || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collAktivitasKepanitiaans) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getAktivitasKepanitiaans());
            }
            $query = AktivitasKepanitiaanQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterBySemester($this)
                ->count($con);
        }

        return count($this->collAktivitasKepanitiaans);
    }

    /**
     * Method called to associate a AktivitasKepanitiaan object to this object
     * through the AktivitasKepanitiaan foreign key attribute.
     *
     * @param    AktivitasKepanitiaan $l AktivitasKepanitiaan
     * @return Semester The current object (for fluent API support)
     */
    public function addAktivitasKepanitiaan(AktivitasKepanitiaan $l)
    {
        if ($this->collAktivitasKepanitiaans === null) {
            $this->initAktivitasKepanitiaans();
            $this->collAktivitasKepanitiaansPartial = true;
        }
        if (!in_array($l, $this->collAktivitasKepanitiaans->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddAktivitasKepanitiaan($l);
        }

        return $this;
    }

    /**
     * @param	AktivitasKepanitiaan $aktivitasKepanitiaan The aktivitasKepanitiaan object to add.
     */
    protected function doAddAktivitasKepanitiaan($aktivitasKepanitiaan)
    {
        $this->collAktivitasKepanitiaans[]= $aktivitasKepanitiaan;
        $aktivitasKepanitiaan->setSemester($this);
    }

    /**
     * @param	AktivitasKepanitiaan $aktivitasKepanitiaan The aktivitasKepanitiaan object to remove.
     * @return Semester The current object (for fluent API support)
     */
    public function removeAktivitasKepanitiaan($aktivitasKepanitiaan)
    {
        if ($this->getAktivitasKepanitiaans()->contains($aktivitasKepanitiaan)) {
            $this->collAktivitasKepanitiaans->remove($this->collAktivitasKepanitiaans->search($aktivitasKepanitiaan));
            if (null === $this->aktivitasKepanitiaansScheduledForDeletion) {
                $this->aktivitasKepanitiaansScheduledForDeletion = clone $this->collAktivitasKepanitiaans;
                $this->aktivitasKepanitiaansScheduledForDeletion->clear();
            }
            $this->aktivitasKepanitiaansScheduledForDeletion[]= clone $aktivitasKepanitiaan;
            $aktivitasKepanitiaan->setSemester(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Semester is new, it will return
     * an empty collection; or if this Semester has previously
     * been saved, it will retrieve related AktivitasKepanitiaans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Semester.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|AktivitasKepanitiaan[] List of AktivitasKepanitiaan objects
     */
    public function getAktivitasKepanitiaansJoinJenisAktivitasKepanitiaan($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = AktivitasKepanitiaanQuery::create(null, $criteria);
        $query->joinWith('JenisAktivitasKepanitiaan', $join_behavior);

        return $this->getAktivitasKepanitiaans($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Semester is new, it will return
     * an empty collection; or if this Semester has previously
     * been saved, it will retrieve related AktivitasKepanitiaans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Semester.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|AktivitasKepanitiaan[] List of AktivitasKepanitiaan objects
     */
    public function getAktivitasKepanitiaansJoinKepanitiaan($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = AktivitasKepanitiaanQuery::create(null, $criteria);
        $query->joinWith('Kepanitiaan', $join_behavior);

        return $this->getAktivitasKepanitiaans($query, $con);
    }

    /**
     * Clears out the collAlatLongitudinals collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Semester The current object (for fluent API support)
     * @see        addAlatLongitudinals()
     */
    public function clearAlatLongitudinals()
    {
        $this->collAlatLongitudinals = null; // important to set this to null since that means it is uninitialized
        $this->collAlatLongitudinalsPartial = null;

        return $this;
    }

    /**
     * reset is the collAlatLongitudinals collection loaded partially
     *
     * @return void
     */
    public function resetPartialAlatLongitudinals($v = true)
    {
        $this->collAlatLongitudinalsPartial = $v;
    }

    /**
     * Initializes the collAlatLongitudinals collection.
     *
     * By default this just sets the collAlatLongitudinals collection to an empty array (like clearcollAlatLongitudinals());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initAlatLongitudinals($overrideExisting = true)
    {
        if (null !== $this->collAlatLongitudinals && !$overrideExisting) {
            return;
        }
        $this->collAlatLongitudinals = new PropelObjectCollection();
        $this->collAlatLongitudinals->setModel('AlatLongitudinal');
    }

    /**
     * Gets an array of AlatLongitudinal objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Semester is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|AlatLongitudinal[] List of AlatLongitudinal objects
     * @throws PropelException
     */
    public function getAlatLongitudinals($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collAlatLongitudinalsPartial && !$this->isNew();
        if (null === $this->collAlatLongitudinals || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collAlatLongitudinals) {
                // return empty collection
                $this->initAlatLongitudinals();
            } else {
                $collAlatLongitudinals = AlatLongitudinalQuery::create(null, $criteria)
                    ->filterBySemester($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collAlatLongitudinalsPartial && count($collAlatLongitudinals)) {
                      $this->initAlatLongitudinals(false);

                      foreach($collAlatLongitudinals as $obj) {
                        if (false == $this->collAlatLongitudinals->contains($obj)) {
                          $this->collAlatLongitudinals->append($obj);
                        }
                      }

                      $this->collAlatLongitudinalsPartial = true;
                    }

                    $collAlatLongitudinals->getInternalIterator()->rewind();
                    return $collAlatLongitudinals;
                }

                if($partial && $this->collAlatLongitudinals) {
                    foreach($this->collAlatLongitudinals as $obj) {
                        if($obj->isNew()) {
                            $collAlatLongitudinals[] = $obj;
                        }
                    }
                }

                $this->collAlatLongitudinals = $collAlatLongitudinals;
                $this->collAlatLongitudinalsPartial = false;
            }
        }

        return $this->collAlatLongitudinals;
    }

    /**
     * Sets a collection of AlatLongitudinal objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $alatLongitudinals A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Semester The current object (for fluent API support)
     */
    public function setAlatLongitudinals(PropelCollection $alatLongitudinals, PropelPDO $con = null)
    {
        $alatLongitudinalsToDelete = $this->getAlatLongitudinals(new Criteria(), $con)->diff($alatLongitudinals);

        $this->alatLongitudinalsScheduledForDeletion = unserialize(serialize($alatLongitudinalsToDelete));

        foreach ($alatLongitudinalsToDelete as $alatLongitudinalRemoved) {
            $alatLongitudinalRemoved->setSemester(null);
        }

        $this->collAlatLongitudinals = null;
        foreach ($alatLongitudinals as $alatLongitudinal) {
            $this->addAlatLongitudinal($alatLongitudinal);
        }

        $this->collAlatLongitudinals = $alatLongitudinals;
        $this->collAlatLongitudinalsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related AlatLongitudinal objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related AlatLongitudinal objects.
     * @throws PropelException
     */
    public function countAlatLongitudinals(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collAlatLongitudinalsPartial && !$this->isNew();
        if (null === $this->collAlatLongitudinals || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collAlatLongitudinals) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getAlatLongitudinals());
            }
            $query = AlatLongitudinalQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterBySemester($this)
                ->count($con);
        }

        return count($this->collAlatLongitudinals);
    }

    /**
     * Method called to associate a AlatLongitudinal object to this object
     * through the AlatLongitudinal foreign key attribute.
     *
     * @param    AlatLongitudinal $l AlatLongitudinal
     * @return Semester The current object (for fluent API support)
     */
    public function addAlatLongitudinal(AlatLongitudinal $l)
    {
        if ($this->collAlatLongitudinals === null) {
            $this->initAlatLongitudinals();
            $this->collAlatLongitudinalsPartial = true;
        }
        if (!in_array($l, $this->collAlatLongitudinals->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddAlatLongitudinal($l);
        }

        return $this;
    }

    /**
     * @param	AlatLongitudinal $alatLongitudinal The alatLongitudinal object to add.
     */
    protected function doAddAlatLongitudinal($alatLongitudinal)
    {
        $this->collAlatLongitudinals[]= $alatLongitudinal;
        $alatLongitudinal->setSemester($this);
    }

    /**
     * @param	AlatLongitudinal $alatLongitudinal The alatLongitudinal object to remove.
     * @return Semester The current object (for fluent API support)
     */
    public function removeAlatLongitudinal($alatLongitudinal)
    {
        if ($this->getAlatLongitudinals()->contains($alatLongitudinal)) {
            $this->collAlatLongitudinals->remove($this->collAlatLongitudinals->search($alatLongitudinal));
            if (null === $this->alatLongitudinalsScheduledForDeletion) {
                $this->alatLongitudinalsScheduledForDeletion = clone $this->collAlatLongitudinals;
                $this->alatLongitudinalsScheduledForDeletion->clear();
            }
            $this->alatLongitudinalsScheduledForDeletion[]= clone $alatLongitudinal;
            $alatLongitudinal->setSemester(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Semester is new, it will return
     * an empty collection; or if this Semester has previously
     * been saved, it will retrieve related AlatLongitudinals from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Semester.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|AlatLongitudinal[] List of AlatLongitudinal objects
     */
    public function getAlatLongitudinalsJoinAlat($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = AlatLongitudinalQuery::create(null, $criteria);
        $query->joinWith('Alat', $join_behavior);

        return $this->getAlatLongitudinals($query, $con);
    }

    /**
     * Clears out the collBangunanLongitudinals collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Semester The current object (for fluent API support)
     * @see        addBangunanLongitudinals()
     */
    public function clearBangunanLongitudinals()
    {
        $this->collBangunanLongitudinals = null; // important to set this to null since that means it is uninitialized
        $this->collBangunanLongitudinalsPartial = null;

        return $this;
    }

    /**
     * reset is the collBangunanLongitudinals collection loaded partially
     *
     * @return void
     */
    public function resetPartialBangunanLongitudinals($v = true)
    {
        $this->collBangunanLongitudinalsPartial = $v;
    }

    /**
     * Initializes the collBangunanLongitudinals collection.
     *
     * By default this just sets the collBangunanLongitudinals collection to an empty array (like clearcollBangunanLongitudinals());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initBangunanLongitudinals($overrideExisting = true)
    {
        if (null !== $this->collBangunanLongitudinals && !$overrideExisting) {
            return;
        }
        $this->collBangunanLongitudinals = new PropelObjectCollection();
        $this->collBangunanLongitudinals->setModel('BangunanLongitudinal');
    }

    /**
     * Gets an array of BangunanLongitudinal objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Semester is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|BangunanLongitudinal[] List of BangunanLongitudinal objects
     * @throws PropelException
     */
    public function getBangunanLongitudinals($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collBangunanLongitudinalsPartial && !$this->isNew();
        if (null === $this->collBangunanLongitudinals || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collBangunanLongitudinals) {
                // return empty collection
                $this->initBangunanLongitudinals();
            } else {
                $collBangunanLongitudinals = BangunanLongitudinalQuery::create(null, $criteria)
                    ->filterBySemester($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collBangunanLongitudinalsPartial && count($collBangunanLongitudinals)) {
                      $this->initBangunanLongitudinals(false);

                      foreach($collBangunanLongitudinals as $obj) {
                        if (false == $this->collBangunanLongitudinals->contains($obj)) {
                          $this->collBangunanLongitudinals->append($obj);
                        }
                      }

                      $this->collBangunanLongitudinalsPartial = true;
                    }

                    $collBangunanLongitudinals->getInternalIterator()->rewind();
                    return $collBangunanLongitudinals;
                }

                if($partial && $this->collBangunanLongitudinals) {
                    foreach($this->collBangunanLongitudinals as $obj) {
                        if($obj->isNew()) {
                            $collBangunanLongitudinals[] = $obj;
                        }
                    }
                }

                $this->collBangunanLongitudinals = $collBangunanLongitudinals;
                $this->collBangunanLongitudinalsPartial = false;
            }
        }

        return $this->collBangunanLongitudinals;
    }

    /**
     * Sets a collection of BangunanLongitudinal objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $bangunanLongitudinals A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Semester The current object (for fluent API support)
     */
    public function setBangunanLongitudinals(PropelCollection $bangunanLongitudinals, PropelPDO $con = null)
    {
        $bangunanLongitudinalsToDelete = $this->getBangunanLongitudinals(new Criteria(), $con)->diff($bangunanLongitudinals);

        $this->bangunanLongitudinalsScheduledForDeletion = unserialize(serialize($bangunanLongitudinalsToDelete));

        foreach ($bangunanLongitudinalsToDelete as $bangunanLongitudinalRemoved) {
            $bangunanLongitudinalRemoved->setSemester(null);
        }

        $this->collBangunanLongitudinals = null;
        foreach ($bangunanLongitudinals as $bangunanLongitudinal) {
            $this->addBangunanLongitudinal($bangunanLongitudinal);
        }

        $this->collBangunanLongitudinals = $bangunanLongitudinals;
        $this->collBangunanLongitudinalsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related BangunanLongitudinal objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related BangunanLongitudinal objects.
     * @throws PropelException
     */
    public function countBangunanLongitudinals(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collBangunanLongitudinalsPartial && !$this->isNew();
        if (null === $this->collBangunanLongitudinals || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collBangunanLongitudinals) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getBangunanLongitudinals());
            }
            $query = BangunanLongitudinalQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterBySemester($this)
                ->count($con);
        }

        return count($this->collBangunanLongitudinals);
    }

    /**
     * Method called to associate a BangunanLongitudinal object to this object
     * through the BangunanLongitudinal foreign key attribute.
     *
     * @param    BangunanLongitudinal $l BangunanLongitudinal
     * @return Semester The current object (for fluent API support)
     */
    public function addBangunanLongitudinal(BangunanLongitudinal $l)
    {
        if ($this->collBangunanLongitudinals === null) {
            $this->initBangunanLongitudinals();
            $this->collBangunanLongitudinalsPartial = true;
        }
        if (!in_array($l, $this->collBangunanLongitudinals->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddBangunanLongitudinal($l);
        }

        return $this;
    }

    /**
     * @param	BangunanLongitudinal $bangunanLongitudinal The bangunanLongitudinal object to add.
     */
    protected function doAddBangunanLongitudinal($bangunanLongitudinal)
    {
        $this->collBangunanLongitudinals[]= $bangunanLongitudinal;
        $bangunanLongitudinal->setSemester($this);
    }

    /**
     * @param	BangunanLongitudinal $bangunanLongitudinal The bangunanLongitudinal object to remove.
     * @return Semester The current object (for fluent API support)
     */
    public function removeBangunanLongitudinal($bangunanLongitudinal)
    {
        if ($this->getBangunanLongitudinals()->contains($bangunanLongitudinal)) {
            $this->collBangunanLongitudinals->remove($this->collBangunanLongitudinals->search($bangunanLongitudinal));
            if (null === $this->bangunanLongitudinalsScheduledForDeletion) {
                $this->bangunanLongitudinalsScheduledForDeletion = clone $this->collBangunanLongitudinals;
                $this->bangunanLongitudinalsScheduledForDeletion->clear();
            }
            $this->bangunanLongitudinalsScheduledForDeletion[]= clone $bangunanLongitudinal;
            $bangunanLongitudinal->setSemester(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Semester is new, it will return
     * an empty collection; or if this Semester has previously
     * been saved, it will retrieve related BangunanLongitudinals from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Semester.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|BangunanLongitudinal[] List of BangunanLongitudinal objects
     */
    public function getBangunanLongitudinalsJoinBangunan($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = BangunanLongitudinalQuery::create(null, $criteria);
        $query->joinWith('Bangunan', $join_behavior);

        return $this->getBangunanLongitudinals($query, $con);
    }

    /**
     * Gets a single BatasWaktuRapor object, which is related to this object by a one-to-one relationship.
     *
     * @param PropelPDO $con optional connection object
     * @return BatasWaktuRapor
     * @throws PropelException
     */
    public function getBatasWaktuRapor(PropelPDO $con = null)
    {

        if ($this->singleBatasWaktuRapor === null && !$this->isNew()) {
            $this->singleBatasWaktuRapor = BatasWaktuRaporQuery::create()->findPk($this->getPrimaryKey(), $con);
        }

        return $this->singleBatasWaktuRapor;
    }

    /**
     * Sets a single BatasWaktuRapor object as related to this object by a one-to-one relationship.
     *
     * @param             BatasWaktuRapor $v BatasWaktuRapor
     * @return Semester The current object (for fluent API support)
     * @throws PropelException
     */
    public function setBatasWaktuRapor(BatasWaktuRapor $v = null)
    {
        $this->singleBatasWaktuRapor = $v;

        // Make sure that that the passed-in BatasWaktuRapor isn't already associated with this object
        if ($v !== null && $v->getSemester(null, false) === null) {
            $v->setSemester($this);
        }

        return $this;
    }

    /**
     * Clears out the collBukuLongitudinals collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Semester The current object (for fluent API support)
     * @see        addBukuLongitudinals()
     */
    public function clearBukuLongitudinals()
    {
        $this->collBukuLongitudinals = null; // important to set this to null since that means it is uninitialized
        $this->collBukuLongitudinalsPartial = null;

        return $this;
    }

    /**
     * reset is the collBukuLongitudinals collection loaded partially
     *
     * @return void
     */
    public function resetPartialBukuLongitudinals($v = true)
    {
        $this->collBukuLongitudinalsPartial = $v;
    }

    /**
     * Initializes the collBukuLongitudinals collection.
     *
     * By default this just sets the collBukuLongitudinals collection to an empty array (like clearcollBukuLongitudinals());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initBukuLongitudinals($overrideExisting = true)
    {
        if (null !== $this->collBukuLongitudinals && !$overrideExisting) {
            return;
        }
        $this->collBukuLongitudinals = new PropelObjectCollection();
        $this->collBukuLongitudinals->setModel('BukuLongitudinal');
    }

    /**
     * Gets an array of BukuLongitudinal objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Semester is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|BukuLongitudinal[] List of BukuLongitudinal objects
     * @throws PropelException
     */
    public function getBukuLongitudinals($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collBukuLongitudinalsPartial && !$this->isNew();
        if (null === $this->collBukuLongitudinals || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collBukuLongitudinals) {
                // return empty collection
                $this->initBukuLongitudinals();
            } else {
                $collBukuLongitudinals = BukuLongitudinalQuery::create(null, $criteria)
                    ->filterBySemester($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collBukuLongitudinalsPartial && count($collBukuLongitudinals)) {
                      $this->initBukuLongitudinals(false);

                      foreach($collBukuLongitudinals as $obj) {
                        if (false == $this->collBukuLongitudinals->contains($obj)) {
                          $this->collBukuLongitudinals->append($obj);
                        }
                      }

                      $this->collBukuLongitudinalsPartial = true;
                    }

                    $collBukuLongitudinals->getInternalIterator()->rewind();
                    return $collBukuLongitudinals;
                }

                if($partial && $this->collBukuLongitudinals) {
                    foreach($this->collBukuLongitudinals as $obj) {
                        if($obj->isNew()) {
                            $collBukuLongitudinals[] = $obj;
                        }
                    }
                }

                $this->collBukuLongitudinals = $collBukuLongitudinals;
                $this->collBukuLongitudinalsPartial = false;
            }
        }

        return $this->collBukuLongitudinals;
    }

    /**
     * Sets a collection of BukuLongitudinal objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $bukuLongitudinals A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Semester The current object (for fluent API support)
     */
    public function setBukuLongitudinals(PropelCollection $bukuLongitudinals, PropelPDO $con = null)
    {
        $bukuLongitudinalsToDelete = $this->getBukuLongitudinals(new Criteria(), $con)->diff($bukuLongitudinals);

        $this->bukuLongitudinalsScheduledForDeletion = unserialize(serialize($bukuLongitudinalsToDelete));

        foreach ($bukuLongitudinalsToDelete as $bukuLongitudinalRemoved) {
            $bukuLongitudinalRemoved->setSemester(null);
        }

        $this->collBukuLongitudinals = null;
        foreach ($bukuLongitudinals as $bukuLongitudinal) {
            $this->addBukuLongitudinal($bukuLongitudinal);
        }

        $this->collBukuLongitudinals = $bukuLongitudinals;
        $this->collBukuLongitudinalsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related BukuLongitudinal objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related BukuLongitudinal objects.
     * @throws PropelException
     */
    public function countBukuLongitudinals(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collBukuLongitudinalsPartial && !$this->isNew();
        if (null === $this->collBukuLongitudinals || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collBukuLongitudinals) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getBukuLongitudinals());
            }
            $query = BukuLongitudinalQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterBySemester($this)
                ->count($con);
        }

        return count($this->collBukuLongitudinals);
    }

    /**
     * Method called to associate a BukuLongitudinal object to this object
     * through the BukuLongitudinal foreign key attribute.
     *
     * @param    BukuLongitudinal $l BukuLongitudinal
     * @return Semester The current object (for fluent API support)
     */
    public function addBukuLongitudinal(BukuLongitudinal $l)
    {
        if ($this->collBukuLongitudinals === null) {
            $this->initBukuLongitudinals();
            $this->collBukuLongitudinalsPartial = true;
        }
        if (!in_array($l, $this->collBukuLongitudinals->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddBukuLongitudinal($l);
        }

        return $this;
    }

    /**
     * @param	BukuLongitudinal $bukuLongitudinal The bukuLongitudinal object to add.
     */
    protected function doAddBukuLongitudinal($bukuLongitudinal)
    {
        $this->collBukuLongitudinals[]= $bukuLongitudinal;
        $bukuLongitudinal->setSemester($this);
    }

    /**
     * @param	BukuLongitudinal $bukuLongitudinal The bukuLongitudinal object to remove.
     * @return Semester The current object (for fluent API support)
     */
    public function removeBukuLongitudinal($bukuLongitudinal)
    {
        if ($this->getBukuLongitudinals()->contains($bukuLongitudinal)) {
            $this->collBukuLongitudinals->remove($this->collBukuLongitudinals->search($bukuLongitudinal));
            if (null === $this->bukuLongitudinalsScheduledForDeletion) {
                $this->bukuLongitudinalsScheduledForDeletion = clone $this->collBukuLongitudinals;
                $this->bukuLongitudinalsScheduledForDeletion->clear();
            }
            $this->bukuLongitudinalsScheduledForDeletion[]= clone $bukuLongitudinal;
            $bukuLongitudinal->setSemester(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Semester is new, it will return
     * an empty collection; or if this Semester has previously
     * been saved, it will retrieve related BukuLongitudinals from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Semester.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|BukuLongitudinal[] List of BukuLongitudinal objects
     */
    public function getBukuLongitudinalsJoinBuku($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = BukuLongitudinalQuery::create(null, $criteria);
        $query->joinWith('Buku', $join_behavior);

        return $this->getBukuLongitudinals($query, $con);
    }

    /**
     * Clears out the collJurSpLongs collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Semester The current object (for fluent API support)
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
     * If this Semester is new, it will return
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
                    ->filterBySemester($this)
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
     * @return Semester The current object (for fluent API support)
     */
    public function setJurSpLongs(PropelCollection $jurSpLongs, PropelPDO $con = null)
    {
        $jurSpLongsToDelete = $this->getJurSpLongs(new Criteria(), $con)->diff($jurSpLongs);

        $this->jurSpLongsScheduledForDeletion = unserialize(serialize($jurSpLongsToDelete));

        foreach ($jurSpLongsToDelete as $jurSpLongRemoved) {
            $jurSpLongRemoved->setSemester(null);
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
                ->filterBySemester($this)
                ->count($con);
        }

        return count($this->collJurSpLongs);
    }

    /**
     * Method called to associate a JurSpLong object to this object
     * through the JurSpLong foreign key attribute.
     *
     * @param    JurSpLong $l JurSpLong
     * @return Semester The current object (for fluent API support)
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
        $jurSpLong->setSemester($this);
    }

    /**
     * @param	JurSpLong $jurSpLong The jurSpLong object to remove.
     * @return Semester The current object (for fluent API support)
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
            $jurSpLong->setSemester(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Semester is new, it will return
     * an empty collection; or if this Semester has previously
     * been saved, it will retrieve related JurSpLongs from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Semester.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|JurSpLong[] List of JurSpLong objects
     */
    public function getJurSpLongsJoinJurusanSp($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = JurSpLongQuery::create(null, $criteria);
        $query->joinWith('JurusanSp', $join_behavior);

        return $this->getJurSpLongs($query, $con);
    }

    /**
     * Clears out the collPembelajarans collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Semester The current object (for fluent API support)
     * @see        addPembelajarans()
     */
    public function clearPembelajarans()
    {
        $this->collPembelajarans = null; // important to set this to null since that means it is uninitialized
        $this->collPembelajaransPartial = null;

        return $this;
    }

    /**
     * reset is the collPembelajarans collection loaded partially
     *
     * @return void
     */
    public function resetPartialPembelajarans($v = true)
    {
        $this->collPembelajaransPartial = $v;
    }

    /**
     * Initializes the collPembelajarans collection.
     *
     * By default this just sets the collPembelajarans collection to an empty array (like clearcollPembelajarans());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPembelajarans($overrideExisting = true)
    {
        if (null !== $this->collPembelajarans && !$overrideExisting) {
            return;
        }
        $this->collPembelajarans = new PropelObjectCollection();
        $this->collPembelajarans->setModel('Pembelajaran');
    }

    /**
     * Gets an array of Pembelajaran objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Semester is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Pembelajaran[] List of Pembelajaran objects
     * @throws PropelException
     */
    public function getPembelajarans($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collPembelajaransPartial && !$this->isNew();
        if (null === $this->collPembelajarans || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collPembelajarans) {
                // return empty collection
                $this->initPembelajarans();
            } else {
                $collPembelajarans = PembelajaranQuery::create(null, $criteria)
                    ->filterBySemester($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collPembelajaransPartial && count($collPembelajarans)) {
                      $this->initPembelajarans(false);

                      foreach($collPembelajarans as $obj) {
                        if (false == $this->collPembelajarans->contains($obj)) {
                          $this->collPembelajarans->append($obj);
                        }
                      }

                      $this->collPembelajaransPartial = true;
                    }

                    $collPembelajarans->getInternalIterator()->rewind();
                    return $collPembelajarans;
                }

                if($partial && $this->collPembelajarans) {
                    foreach($this->collPembelajarans as $obj) {
                        if($obj->isNew()) {
                            $collPembelajarans[] = $obj;
                        }
                    }
                }

                $this->collPembelajarans = $collPembelajarans;
                $this->collPembelajaransPartial = false;
            }
        }

        return $this->collPembelajarans;
    }

    /**
     * Sets a collection of Pembelajaran objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $pembelajarans A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Semester The current object (for fluent API support)
     */
    public function setPembelajarans(PropelCollection $pembelajarans, PropelPDO $con = null)
    {
        $pembelajaransToDelete = $this->getPembelajarans(new Criteria(), $con)->diff($pembelajarans);

        $this->pembelajaransScheduledForDeletion = unserialize(serialize($pembelajaransToDelete));

        foreach ($pembelajaransToDelete as $pembelajaranRemoved) {
            $pembelajaranRemoved->setSemester(null);
        }

        $this->collPembelajarans = null;
        foreach ($pembelajarans as $pembelajaran) {
            $this->addPembelajaran($pembelajaran);
        }

        $this->collPembelajarans = $pembelajarans;
        $this->collPembelajaransPartial = false;

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
    public function countPembelajarans(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collPembelajaransPartial && !$this->isNew();
        if (null === $this->collPembelajarans || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPembelajarans) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getPembelajarans());
            }
            $query = PembelajaranQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterBySemester($this)
                ->count($con);
        }

        return count($this->collPembelajarans);
    }

    /**
     * Method called to associate a Pembelajaran object to this object
     * through the Pembelajaran foreign key attribute.
     *
     * @param    Pembelajaran $l Pembelajaran
     * @return Semester The current object (for fluent API support)
     */
    public function addPembelajaran(Pembelajaran $l)
    {
        if ($this->collPembelajarans === null) {
            $this->initPembelajarans();
            $this->collPembelajaransPartial = true;
        }
        if (!in_array($l, $this->collPembelajarans->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddPembelajaran($l);
        }

        return $this;
    }

    /**
     * @param	Pembelajaran $pembelajaran The pembelajaran object to add.
     */
    protected function doAddPembelajaran($pembelajaran)
    {
        $this->collPembelajarans[]= $pembelajaran;
        $pembelajaran->setSemester($this);
    }

    /**
     * @param	Pembelajaran $pembelajaran The pembelajaran object to remove.
     * @return Semester The current object (for fluent API support)
     */
    public function removePembelajaran($pembelajaran)
    {
        if ($this->getPembelajarans()->contains($pembelajaran)) {
            $this->collPembelajarans->remove($this->collPembelajarans->search($pembelajaran));
            if (null === $this->pembelajaransScheduledForDeletion) {
                $this->pembelajaransScheduledForDeletion = clone $this->collPembelajarans;
                $this->pembelajaransScheduledForDeletion->clear();
            }
            $this->pembelajaransScheduledForDeletion[]= clone $pembelajaran;
            $pembelajaran->setSemester(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Semester is new, it will return
     * an empty collection; or if this Semester has previously
     * been saved, it will retrieve related Pembelajarans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Semester.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Pembelajaran[] List of Pembelajaran objects
     */
    public function getPembelajaransJoinPembelajaranRelatedByIndukPembelajaranId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PembelajaranQuery::create(null, $criteria);
        $query->joinWith('PembelajaranRelatedByIndukPembelajaranId', $join_behavior);

        return $this->getPembelajarans($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Semester is new, it will return
     * an empty collection; or if this Semester has previously
     * been saved, it will retrieve related Pembelajarans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Semester.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Pembelajaran[] List of Pembelajaran objects
     */
    public function getPembelajaransJoinPtkTerdaftar($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PembelajaranQuery::create(null, $criteria);
        $query->joinWith('PtkTerdaftar', $join_behavior);

        return $this->getPembelajarans($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Semester is new, it will return
     * an empty collection; or if this Semester has previously
     * been saved, it will retrieve related Pembelajarans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Semester.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Pembelajaran[] List of Pembelajaran objects
     */
    public function getPembelajaransJoinRombonganBelajar($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PembelajaranQuery::create(null, $criteria);
        $query->joinWith('RombonganBelajar', $join_behavior);

        return $this->getPembelajarans($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Semester is new, it will return
     * an empty collection; or if this Semester has previously
     * been saved, it will retrieve related Pembelajarans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Semester.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Pembelajaran[] List of Pembelajaran objects
     */
    public function getPembelajaransJoinMataPelajaran($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PembelajaranQuery::create(null, $criteria);
        $query->joinWith('MataPelajaran', $join_behavior);

        return $this->getPembelajarans($query, $con);
    }

    /**
     * Clears out the collPesertaDidikLongitudinals collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Semester The current object (for fluent API support)
     * @see        addPesertaDidikLongitudinals()
     */
    public function clearPesertaDidikLongitudinals()
    {
        $this->collPesertaDidikLongitudinals = null; // important to set this to null since that means it is uninitialized
        $this->collPesertaDidikLongitudinalsPartial = null;

        return $this;
    }

    /**
     * reset is the collPesertaDidikLongitudinals collection loaded partially
     *
     * @return void
     */
    public function resetPartialPesertaDidikLongitudinals($v = true)
    {
        $this->collPesertaDidikLongitudinalsPartial = $v;
    }

    /**
     * Initializes the collPesertaDidikLongitudinals collection.
     *
     * By default this just sets the collPesertaDidikLongitudinals collection to an empty array (like clearcollPesertaDidikLongitudinals());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPesertaDidikLongitudinals($overrideExisting = true)
    {
        if (null !== $this->collPesertaDidikLongitudinals && !$overrideExisting) {
            return;
        }
        $this->collPesertaDidikLongitudinals = new PropelObjectCollection();
        $this->collPesertaDidikLongitudinals->setModel('PesertaDidikLongitudinal');
    }

    /**
     * Gets an array of PesertaDidikLongitudinal objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Semester is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|PesertaDidikLongitudinal[] List of PesertaDidikLongitudinal objects
     * @throws PropelException
     */
    public function getPesertaDidikLongitudinals($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collPesertaDidikLongitudinalsPartial && !$this->isNew();
        if (null === $this->collPesertaDidikLongitudinals || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collPesertaDidikLongitudinals) {
                // return empty collection
                $this->initPesertaDidikLongitudinals();
            } else {
                $collPesertaDidikLongitudinals = PesertaDidikLongitudinalQuery::create(null, $criteria)
                    ->filterBySemester($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collPesertaDidikLongitudinalsPartial && count($collPesertaDidikLongitudinals)) {
                      $this->initPesertaDidikLongitudinals(false);

                      foreach($collPesertaDidikLongitudinals as $obj) {
                        if (false == $this->collPesertaDidikLongitudinals->contains($obj)) {
                          $this->collPesertaDidikLongitudinals->append($obj);
                        }
                      }

                      $this->collPesertaDidikLongitudinalsPartial = true;
                    }

                    $collPesertaDidikLongitudinals->getInternalIterator()->rewind();
                    return $collPesertaDidikLongitudinals;
                }

                if($partial && $this->collPesertaDidikLongitudinals) {
                    foreach($this->collPesertaDidikLongitudinals as $obj) {
                        if($obj->isNew()) {
                            $collPesertaDidikLongitudinals[] = $obj;
                        }
                    }
                }

                $this->collPesertaDidikLongitudinals = $collPesertaDidikLongitudinals;
                $this->collPesertaDidikLongitudinalsPartial = false;
            }
        }

        return $this->collPesertaDidikLongitudinals;
    }

    /**
     * Sets a collection of PesertaDidikLongitudinal objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $pesertaDidikLongitudinals A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Semester The current object (for fluent API support)
     */
    public function setPesertaDidikLongitudinals(PropelCollection $pesertaDidikLongitudinals, PropelPDO $con = null)
    {
        $pesertaDidikLongitudinalsToDelete = $this->getPesertaDidikLongitudinals(new Criteria(), $con)->diff($pesertaDidikLongitudinals);

        $this->pesertaDidikLongitudinalsScheduledForDeletion = unserialize(serialize($pesertaDidikLongitudinalsToDelete));

        foreach ($pesertaDidikLongitudinalsToDelete as $pesertaDidikLongitudinalRemoved) {
            $pesertaDidikLongitudinalRemoved->setSemester(null);
        }

        $this->collPesertaDidikLongitudinals = null;
        foreach ($pesertaDidikLongitudinals as $pesertaDidikLongitudinal) {
            $this->addPesertaDidikLongitudinal($pesertaDidikLongitudinal);
        }

        $this->collPesertaDidikLongitudinals = $pesertaDidikLongitudinals;
        $this->collPesertaDidikLongitudinalsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related PesertaDidikLongitudinal objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related PesertaDidikLongitudinal objects.
     * @throws PropelException
     */
    public function countPesertaDidikLongitudinals(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collPesertaDidikLongitudinalsPartial && !$this->isNew();
        if (null === $this->collPesertaDidikLongitudinals || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPesertaDidikLongitudinals) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getPesertaDidikLongitudinals());
            }
            $query = PesertaDidikLongitudinalQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterBySemester($this)
                ->count($con);
        }

        return count($this->collPesertaDidikLongitudinals);
    }

    /**
     * Method called to associate a PesertaDidikLongitudinal object to this object
     * through the PesertaDidikLongitudinal foreign key attribute.
     *
     * @param    PesertaDidikLongitudinal $l PesertaDidikLongitudinal
     * @return Semester The current object (for fluent API support)
     */
    public function addPesertaDidikLongitudinal(PesertaDidikLongitudinal $l)
    {
        if ($this->collPesertaDidikLongitudinals === null) {
            $this->initPesertaDidikLongitudinals();
            $this->collPesertaDidikLongitudinalsPartial = true;
        }
        if (!in_array($l, $this->collPesertaDidikLongitudinals->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddPesertaDidikLongitudinal($l);
        }

        return $this;
    }

    /**
     * @param	PesertaDidikLongitudinal $pesertaDidikLongitudinal The pesertaDidikLongitudinal object to add.
     */
    protected function doAddPesertaDidikLongitudinal($pesertaDidikLongitudinal)
    {
        $this->collPesertaDidikLongitudinals[]= $pesertaDidikLongitudinal;
        $pesertaDidikLongitudinal->setSemester($this);
    }

    /**
     * @param	PesertaDidikLongitudinal $pesertaDidikLongitudinal The pesertaDidikLongitudinal object to remove.
     * @return Semester The current object (for fluent API support)
     */
    public function removePesertaDidikLongitudinal($pesertaDidikLongitudinal)
    {
        if ($this->getPesertaDidikLongitudinals()->contains($pesertaDidikLongitudinal)) {
            $this->collPesertaDidikLongitudinals->remove($this->collPesertaDidikLongitudinals->search($pesertaDidikLongitudinal));
            if (null === $this->pesertaDidikLongitudinalsScheduledForDeletion) {
                $this->pesertaDidikLongitudinalsScheduledForDeletion = clone $this->collPesertaDidikLongitudinals;
                $this->pesertaDidikLongitudinalsScheduledForDeletion->clear();
            }
            $this->pesertaDidikLongitudinalsScheduledForDeletion[]= clone $pesertaDidikLongitudinal;
            $pesertaDidikLongitudinal->setSemester(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Semester is new, it will return
     * an empty collection; or if this Semester has previously
     * been saved, it will retrieve related PesertaDidikLongitudinals from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Semester.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidikLongitudinal[] List of PesertaDidikLongitudinal objects
     */
    public function getPesertaDidikLongitudinalsJoinPesertaDidik($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikLongitudinalQuery::create(null, $criteria);
        $query->joinWith('PesertaDidik', $join_behavior);

        return $this->getPesertaDidikLongitudinals($query, $con);
    }

    /**
     * Clears out the collRombonganBelajars collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Semester The current object (for fluent API support)
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
     * If this Semester is new, it will return
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
                    ->filterBySemester($this)
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
     * @return Semester The current object (for fluent API support)
     */
    public function setRombonganBelajars(PropelCollection $rombonganBelajars, PropelPDO $con = null)
    {
        $rombonganBelajarsToDelete = $this->getRombonganBelajars(new Criteria(), $con)->diff($rombonganBelajars);

        $this->rombonganBelajarsScheduledForDeletion = unserialize(serialize($rombonganBelajarsToDelete));

        foreach ($rombonganBelajarsToDelete as $rombonganBelajarRemoved) {
            $rombonganBelajarRemoved->setSemester(null);
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
                ->filterBySemester($this)
                ->count($con);
        }

        return count($this->collRombonganBelajars);
    }

    /**
     * Method called to associate a RombonganBelajar object to this object
     * through the RombonganBelajar foreign key attribute.
     *
     * @param    RombonganBelajar $l RombonganBelajar
     * @return Semester The current object (for fluent API support)
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
        $rombonganBelajar->setSemester($this);
    }

    /**
     * @param	RombonganBelajar $rombonganBelajar The rombonganBelajar object to remove.
     * @return Semester The current object (for fluent API support)
     */
    public function removeRombonganBelajar($rombonganBelajar)
    {
        if ($this->getRombonganBelajars()->contains($rombonganBelajar)) {
            $this->collRombonganBelajars->remove($this->collRombonganBelajars->search($rombonganBelajar));
            if (null === $this->rombonganBelajarsScheduledForDeletion) {
                $this->rombonganBelajarsScheduledForDeletion = clone $this->collRombonganBelajars;
                $this->rombonganBelajarsScheduledForDeletion->clear();
            }
            $this->rombonganBelajarsScheduledForDeletion[]= clone $rombonganBelajar;
            $rombonganBelajar->setSemester(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Semester is new, it will return
     * an empty collection; or if this Semester has previously
     * been saved, it will retrieve related RombonganBelajars from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Semester.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|RombonganBelajar[] List of RombonganBelajar objects
     */
    public function getRombonganBelajarsJoinJurusanSp($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = RombonganBelajarQuery::create(null, $criteria);
        $query->joinWith('JurusanSp', $join_behavior);

        return $this->getRombonganBelajars($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Semester is new, it will return
     * an empty collection; or if this Semester has previously
     * been saved, it will retrieve related RombonganBelajars from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Semester.
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
     * Otherwise if this Semester is new, it will return
     * an empty collection; or if this Semester has previously
     * been saved, it will retrieve related RombonganBelajars from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Semester.
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
     * Otherwise if this Semester is new, it will return
     * an empty collection; or if this Semester has previously
     * been saved, it will retrieve related RombonganBelajars from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Semester.
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
     * Otherwise if this Semester is new, it will return
     * an empty collection; or if this Semester has previously
     * been saved, it will retrieve related RombonganBelajars from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Semester.
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
     * Otherwise if this Semester is new, it will return
     * an empty collection; or if this Semester has previously
     * been saved, it will retrieve related RombonganBelajars from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Semester.
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
     * Otherwise if this Semester is new, it will return
     * an empty collection; or if this Semester has previously
     * been saved, it will retrieve related RombonganBelajars from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Semester.
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
     * Clears out the collRuangLongitudinals collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Semester The current object (for fluent API support)
     * @see        addRuangLongitudinals()
     */
    public function clearRuangLongitudinals()
    {
        $this->collRuangLongitudinals = null; // important to set this to null since that means it is uninitialized
        $this->collRuangLongitudinalsPartial = null;

        return $this;
    }

    /**
     * reset is the collRuangLongitudinals collection loaded partially
     *
     * @return void
     */
    public function resetPartialRuangLongitudinals($v = true)
    {
        $this->collRuangLongitudinalsPartial = $v;
    }

    /**
     * Initializes the collRuangLongitudinals collection.
     *
     * By default this just sets the collRuangLongitudinals collection to an empty array (like clearcollRuangLongitudinals());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initRuangLongitudinals($overrideExisting = true)
    {
        if (null !== $this->collRuangLongitudinals && !$overrideExisting) {
            return;
        }
        $this->collRuangLongitudinals = new PropelObjectCollection();
        $this->collRuangLongitudinals->setModel('RuangLongitudinal');
    }

    /**
     * Gets an array of RuangLongitudinal objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Semester is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|RuangLongitudinal[] List of RuangLongitudinal objects
     * @throws PropelException
     */
    public function getRuangLongitudinals($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collRuangLongitudinalsPartial && !$this->isNew();
        if (null === $this->collRuangLongitudinals || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collRuangLongitudinals) {
                // return empty collection
                $this->initRuangLongitudinals();
            } else {
                $collRuangLongitudinals = RuangLongitudinalQuery::create(null, $criteria)
                    ->filterBySemester($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collRuangLongitudinalsPartial && count($collRuangLongitudinals)) {
                      $this->initRuangLongitudinals(false);

                      foreach($collRuangLongitudinals as $obj) {
                        if (false == $this->collRuangLongitudinals->contains($obj)) {
                          $this->collRuangLongitudinals->append($obj);
                        }
                      }

                      $this->collRuangLongitudinalsPartial = true;
                    }

                    $collRuangLongitudinals->getInternalIterator()->rewind();
                    return $collRuangLongitudinals;
                }

                if($partial && $this->collRuangLongitudinals) {
                    foreach($this->collRuangLongitudinals as $obj) {
                        if($obj->isNew()) {
                            $collRuangLongitudinals[] = $obj;
                        }
                    }
                }

                $this->collRuangLongitudinals = $collRuangLongitudinals;
                $this->collRuangLongitudinalsPartial = false;
            }
        }

        return $this->collRuangLongitudinals;
    }

    /**
     * Sets a collection of RuangLongitudinal objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $ruangLongitudinals A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Semester The current object (for fluent API support)
     */
    public function setRuangLongitudinals(PropelCollection $ruangLongitudinals, PropelPDO $con = null)
    {
        $ruangLongitudinalsToDelete = $this->getRuangLongitudinals(new Criteria(), $con)->diff($ruangLongitudinals);

        $this->ruangLongitudinalsScheduledForDeletion = unserialize(serialize($ruangLongitudinalsToDelete));

        foreach ($ruangLongitudinalsToDelete as $ruangLongitudinalRemoved) {
            $ruangLongitudinalRemoved->setSemester(null);
        }

        $this->collRuangLongitudinals = null;
        foreach ($ruangLongitudinals as $ruangLongitudinal) {
            $this->addRuangLongitudinal($ruangLongitudinal);
        }

        $this->collRuangLongitudinals = $ruangLongitudinals;
        $this->collRuangLongitudinalsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related RuangLongitudinal objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related RuangLongitudinal objects.
     * @throws PropelException
     */
    public function countRuangLongitudinals(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collRuangLongitudinalsPartial && !$this->isNew();
        if (null === $this->collRuangLongitudinals || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collRuangLongitudinals) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getRuangLongitudinals());
            }
            $query = RuangLongitudinalQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterBySemester($this)
                ->count($con);
        }

        return count($this->collRuangLongitudinals);
    }

    /**
     * Method called to associate a RuangLongitudinal object to this object
     * through the RuangLongitudinal foreign key attribute.
     *
     * @param    RuangLongitudinal $l RuangLongitudinal
     * @return Semester The current object (for fluent API support)
     */
    public function addRuangLongitudinal(RuangLongitudinal $l)
    {
        if ($this->collRuangLongitudinals === null) {
            $this->initRuangLongitudinals();
            $this->collRuangLongitudinalsPartial = true;
        }
        if (!in_array($l, $this->collRuangLongitudinals->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddRuangLongitudinal($l);
        }

        return $this;
    }

    /**
     * @param	RuangLongitudinal $ruangLongitudinal The ruangLongitudinal object to add.
     */
    protected function doAddRuangLongitudinal($ruangLongitudinal)
    {
        $this->collRuangLongitudinals[]= $ruangLongitudinal;
        $ruangLongitudinal->setSemester($this);
    }

    /**
     * @param	RuangLongitudinal $ruangLongitudinal The ruangLongitudinal object to remove.
     * @return Semester The current object (for fluent API support)
     */
    public function removeRuangLongitudinal($ruangLongitudinal)
    {
        if ($this->getRuangLongitudinals()->contains($ruangLongitudinal)) {
            $this->collRuangLongitudinals->remove($this->collRuangLongitudinals->search($ruangLongitudinal));
            if (null === $this->ruangLongitudinalsScheduledForDeletion) {
                $this->ruangLongitudinalsScheduledForDeletion = clone $this->collRuangLongitudinals;
                $this->ruangLongitudinalsScheduledForDeletion->clear();
            }
            $this->ruangLongitudinalsScheduledForDeletion[]= clone $ruangLongitudinal;
            $ruangLongitudinal->setSemester(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Semester is new, it will return
     * an empty collection; or if this Semester has previously
     * been saved, it will retrieve related RuangLongitudinals from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Semester.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|RuangLongitudinal[] List of RuangLongitudinal objects
     */
    public function getRuangLongitudinalsJoinRuang($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = RuangLongitudinalQuery::create(null, $criteria);
        $query->joinWith('Ruang', $join_behavior);

        return $this->getRuangLongitudinals($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Semester is new, it will return
     * an empty collection; or if this Semester has previously
     * been saved, it will retrieve related RuangLongitudinals from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Semester.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|RuangLongitudinal[] List of RuangLongitudinal objects
     */
    public function getRuangLongitudinalsJoinLargeObject($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = RuangLongitudinalQuery::create(null, $criteria);
        $query->joinWith('LargeObject', $join_behavior);

        return $this->getRuangLongitudinals($query, $con);
    }

    /**
     * Clears out the collSanitasis collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Semester The current object (for fluent API support)
     * @see        addSanitasis()
     */
    public function clearSanitasis()
    {
        $this->collSanitasis = null; // important to set this to null since that means it is uninitialized
        $this->collSanitasisPartial = null;

        return $this;
    }

    /**
     * reset is the collSanitasis collection loaded partially
     *
     * @return void
     */
    public function resetPartialSanitasis($v = true)
    {
        $this->collSanitasisPartial = $v;
    }

    /**
     * Initializes the collSanitasis collection.
     *
     * By default this just sets the collSanitasis collection to an empty array (like clearcollSanitasis());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initSanitasis($overrideExisting = true)
    {
        if (null !== $this->collSanitasis && !$overrideExisting) {
            return;
        }
        $this->collSanitasis = new PropelObjectCollection();
        $this->collSanitasis->setModel('Sanitasi');
    }

    /**
     * Gets an array of Sanitasi objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Semester is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Sanitasi[] List of Sanitasi objects
     * @throws PropelException
     */
    public function getSanitasis($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collSanitasisPartial && !$this->isNew();
        if (null === $this->collSanitasis || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collSanitasis) {
                // return empty collection
                $this->initSanitasis();
            } else {
                $collSanitasis = SanitasiQuery::create(null, $criteria)
                    ->filterBySemester($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collSanitasisPartial && count($collSanitasis)) {
                      $this->initSanitasis(false);

                      foreach($collSanitasis as $obj) {
                        if (false == $this->collSanitasis->contains($obj)) {
                          $this->collSanitasis->append($obj);
                        }
                      }

                      $this->collSanitasisPartial = true;
                    }

                    $collSanitasis->getInternalIterator()->rewind();
                    return $collSanitasis;
                }

                if($partial && $this->collSanitasis) {
                    foreach($this->collSanitasis as $obj) {
                        if($obj->isNew()) {
                            $collSanitasis[] = $obj;
                        }
                    }
                }

                $this->collSanitasis = $collSanitasis;
                $this->collSanitasisPartial = false;
            }
        }

        return $this->collSanitasis;
    }

    /**
     * Sets a collection of Sanitasi objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $sanitasis A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Semester The current object (for fluent API support)
     */
    public function setSanitasis(PropelCollection $sanitasis, PropelPDO $con = null)
    {
        $sanitasisToDelete = $this->getSanitasis(new Criteria(), $con)->diff($sanitasis);

        $this->sanitasisScheduledForDeletion = unserialize(serialize($sanitasisToDelete));

        foreach ($sanitasisToDelete as $sanitasiRemoved) {
            $sanitasiRemoved->setSemester(null);
        }

        $this->collSanitasis = null;
        foreach ($sanitasis as $sanitasi) {
            $this->addSanitasi($sanitasi);
        }

        $this->collSanitasis = $sanitasis;
        $this->collSanitasisPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Sanitasi objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Sanitasi objects.
     * @throws PropelException
     */
    public function countSanitasis(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collSanitasisPartial && !$this->isNew();
        if (null === $this->collSanitasis || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collSanitasis) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getSanitasis());
            }
            $query = SanitasiQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterBySemester($this)
                ->count($con);
        }

        return count($this->collSanitasis);
    }

    /**
     * Method called to associate a Sanitasi object to this object
     * through the Sanitasi foreign key attribute.
     *
     * @param    Sanitasi $l Sanitasi
     * @return Semester The current object (for fluent API support)
     */
    public function addSanitasi(Sanitasi $l)
    {
        if ($this->collSanitasis === null) {
            $this->initSanitasis();
            $this->collSanitasisPartial = true;
        }
        if (!in_array($l, $this->collSanitasis->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddSanitasi($l);
        }

        return $this;
    }

    /**
     * @param	Sanitasi $sanitasi The sanitasi object to add.
     */
    protected function doAddSanitasi($sanitasi)
    {
        $this->collSanitasis[]= $sanitasi;
        $sanitasi->setSemester($this);
    }

    /**
     * @param	Sanitasi $sanitasi The sanitasi object to remove.
     * @return Semester The current object (for fluent API support)
     */
    public function removeSanitasi($sanitasi)
    {
        if ($this->getSanitasis()->contains($sanitasi)) {
            $this->collSanitasis->remove($this->collSanitasis->search($sanitasi));
            if (null === $this->sanitasisScheduledForDeletion) {
                $this->sanitasisScheduledForDeletion = clone $this->collSanitasis;
                $this->sanitasisScheduledForDeletion->clear();
            }
            $this->sanitasisScheduledForDeletion[]= clone $sanitasi;
            $sanitasi->setSemester(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Semester is new, it will return
     * an empty collection; or if this Semester has previously
     * been saved, it will retrieve related Sanitasis from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Semester.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Sanitasi[] List of Sanitasi objects
     */
    public function getSanitasisJoinSekolah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = SanitasiQuery::create(null, $criteria);
        $query->joinWith('Sekolah', $join_behavior);

        return $this->getSanitasis($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Semester is new, it will return
     * an empty collection; or if this Semester has previously
     * been saved, it will retrieve related Sanitasis from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Semester.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Sanitasi[] List of Sanitasi objects
     */
    public function getSanitasisJoinSumberAirRelatedBySumberAirId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = SanitasiQuery::create(null, $criteria);
        $query->joinWith('SumberAirRelatedBySumberAirId', $join_behavior);

        return $this->getSanitasis($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Semester is new, it will return
     * an empty collection; or if this Semester has previously
     * been saved, it will retrieve related Sanitasis from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Semester.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Sanitasi[] List of Sanitasi objects
     */
    public function getSanitasisJoinSumberAirRelatedBySumberAirMinumId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = SanitasiQuery::create(null, $criteria);
        $query->joinWith('SumberAirRelatedBySumberAirMinumId', $join_behavior);

        return $this->getSanitasis($query, $con);
    }

    /**
     * Clears out the collSekolahLongitudinals collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Semester The current object (for fluent API support)
     * @see        addSekolahLongitudinals()
     */
    public function clearSekolahLongitudinals()
    {
        $this->collSekolahLongitudinals = null; // important to set this to null since that means it is uninitialized
        $this->collSekolahLongitudinalsPartial = null;

        return $this;
    }

    /**
     * reset is the collSekolahLongitudinals collection loaded partially
     *
     * @return void
     */
    public function resetPartialSekolahLongitudinals($v = true)
    {
        $this->collSekolahLongitudinalsPartial = $v;
    }

    /**
     * Initializes the collSekolahLongitudinals collection.
     *
     * By default this just sets the collSekolahLongitudinals collection to an empty array (like clearcollSekolahLongitudinals());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initSekolahLongitudinals($overrideExisting = true)
    {
        if (null !== $this->collSekolahLongitudinals && !$overrideExisting) {
            return;
        }
        $this->collSekolahLongitudinals = new PropelObjectCollection();
        $this->collSekolahLongitudinals->setModel('SekolahLongitudinal');
    }

    /**
     * Gets an array of SekolahLongitudinal objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Semester is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|SekolahLongitudinal[] List of SekolahLongitudinal objects
     * @throws PropelException
     */
    public function getSekolahLongitudinals($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collSekolahLongitudinalsPartial && !$this->isNew();
        if (null === $this->collSekolahLongitudinals || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collSekolahLongitudinals) {
                // return empty collection
                $this->initSekolahLongitudinals();
            } else {
                $collSekolahLongitudinals = SekolahLongitudinalQuery::create(null, $criteria)
                    ->filterBySemester($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collSekolahLongitudinalsPartial && count($collSekolahLongitudinals)) {
                      $this->initSekolahLongitudinals(false);

                      foreach($collSekolahLongitudinals as $obj) {
                        if (false == $this->collSekolahLongitudinals->contains($obj)) {
                          $this->collSekolahLongitudinals->append($obj);
                        }
                      }

                      $this->collSekolahLongitudinalsPartial = true;
                    }

                    $collSekolahLongitudinals->getInternalIterator()->rewind();
                    return $collSekolahLongitudinals;
                }

                if($partial && $this->collSekolahLongitudinals) {
                    foreach($this->collSekolahLongitudinals as $obj) {
                        if($obj->isNew()) {
                            $collSekolahLongitudinals[] = $obj;
                        }
                    }
                }

                $this->collSekolahLongitudinals = $collSekolahLongitudinals;
                $this->collSekolahLongitudinalsPartial = false;
            }
        }

        return $this->collSekolahLongitudinals;
    }

    /**
     * Sets a collection of SekolahLongitudinal objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $sekolahLongitudinals A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Semester The current object (for fluent API support)
     */
    public function setSekolahLongitudinals(PropelCollection $sekolahLongitudinals, PropelPDO $con = null)
    {
        $sekolahLongitudinalsToDelete = $this->getSekolahLongitudinals(new Criteria(), $con)->diff($sekolahLongitudinals);

        $this->sekolahLongitudinalsScheduledForDeletion = unserialize(serialize($sekolahLongitudinalsToDelete));

        foreach ($sekolahLongitudinalsToDelete as $sekolahLongitudinalRemoved) {
            $sekolahLongitudinalRemoved->setSemester(null);
        }

        $this->collSekolahLongitudinals = null;
        foreach ($sekolahLongitudinals as $sekolahLongitudinal) {
            $this->addSekolahLongitudinal($sekolahLongitudinal);
        }

        $this->collSekolahLongitudinals = $sekolahLongitudinals;
        $this->collSekolahLongitudinalsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related SekolahLongitudinal objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related SekolahLongitudinal objects.
     * @throws PropelException
     */
    public function countSekolahLongitudinals(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collSekolahLongitudinalsPartial && !$this->isNew();
        if (null === $this->collSekolahLongitudinals || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collSekolahLongitudinals) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getSekolahLongitudinals());
            }
            $query = SekolahLongitudinalQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterBySemester($this)
                ->count($con);
        }

        return count($this->collSekolahLongitudinals);
    }

    /**
     * Method called to associate a SekolahLongitudinal object to this object
     * through the SekolahLongitudinal foreign key attribute.
     *
     * @param    SekolahLongitudinal $l SekolahLongitudinal
     * @return Semester The current object (for fluent API support)
     */
    public function addSekolahLongitudinal(SekolahLongitudinal $l)
    {
        if ($this->collSekolahLongitudinals === null) {
            $this->initSekolahLongitudinals();
            $this->collSekolahLongitudinalsPartial = true;
        }
        if (!in_array($l, $this->collSekolahLongitudinals->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddSekolahLongitudinal($l);
        }

        return $this;
    }

    /**
     * @param	SekolahLongitudinal $sekolahLongitudinal The sekolahLongitudinal object to add.
     */
    protected function doAddSekolahLongitudinal($sekolahLongitudinal)
    {
        $this->collSekolahLongitudinals[]= $sekolahLongitudinal;
        $sekolahLongitudinal->setSemester($this);
    }

    /**
     * @param	SekolahLongitudinal $sekolahLongitudinal The sekolahLongitudinal object to remove.
     * @return Semester The current object (for fluent API support)
     */
    public function removeSekolahLongitudinal($sekolahLongitudinal)
    {
        if ($this->getSekolahLongitudinals()->contains($sekolahLongitudinal)) {
            $this->collSekolahLongitudinals->remove($this->collSekolahLongitudinals->search($sekolahLongitudinal));
            if (null === $this->sekolahLongitudinalsScheduledForDeletion) {
                $this->sekolahLongitudinalsScheduledForDeletion = clone $this->collSekolahLongitudinals;
                $this->sekolahLongitudinalsScheduledForDeletion->clear();
            }
            $this->sekolahLongitudinalsScheduledForDeletion[]= clone $sekolahLongitudinal;
            $sekolahLongitudinal->setSemester(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Semester is new, it will return
     * an empty collection; or if this Semester has previously
     * been saved, it will retrieve related SekolahLongitudinals from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Semester.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|SekolahLongitudinal[] List of SekolahLongitudinal objects
     */
    public function getSekolahLongitudinalsJoinLargeObject($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = SekolahLongitudinalQuery::create(null, $criteria);
        $query->joinWith('LargeObject', $join_behavior);

        return $this->getSekolahLongitudinals($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Semester is new, it will return
     * an empty collection; or if this Semester has previously
     * been saved, it will retrieve related SekolahLongitudinals from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Semester.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|SekolahLongitudinal[] List of SekolahLongitudinal objects
     */
    public function getSekolahLongitudinalsJoinSertifikasiIso($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = SekolahLongitudinalQuery::create(null, $criteria);
        $query->joinWith('SertifikasiIso', $join_behavior);

        return $this->getSekolahLongitudinals($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Semester is new, it will return
     * an empty collection; or if this Semester has previously
     * been saved, it will retrieve related SekolahLongitudinals from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Semester.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|SekolahLongitudinal[] List of SekolahLongitudinal objects
     */
    public function getSekolahLongitudinalsJoinSekolah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = SekolahLongitudinalQuery::create(null, $criteria);
        $query->joinWith('Sekolah', $join_behavior);

        return $this->getSekolahLongitudinals($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Semester is new, it will return
     * an empty collection; or if this Semester has previously
     * been saved, it will retrieve related SekolahLongitudinals from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Semester.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|SekolahLongitudinal[] List of SekolahLongitudinal objects
     */
    public function getSekolahLongitudinalsJoinSumberListrik($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = SekolahLongitudinalQuery::create(null, $criteria);
        $query->joinWith('SumberListrik', $join_behavior);

        return $this->getSekolahLongitudinals($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Semester is new, it will return
     * an empty collection; or if this Semester has previously
     * been saved, it will retrieve related SekolahLongitudinals from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Semester.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|SekolahLongitudinal[] List of SekolahLongitudinal objects
     */
    public function getSekolahLongitudinalsJoinWaktuPenyelenggaraan($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = SekolahLongitudinalQuery::create(null, $criteria);
        $query->joinWith('WaktuPenyelenggaraan', $join_behavior);

        return $this->getSekolahLongitudinals($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Semester is new, it will return
     * an empty collection; or if this Semester has previously
     * been saved, it will retrieve related SekolahLongitudinals from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Semester.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|SekolahLongitudinal[] List of SekolahLongitudinal objects
     */
    public function getSekolahLongitudinalsJoinAksesInternetRelatedByAksesInternetId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = SekolahLongitudinalQuery::create(null, $criteria);
        $query->joinWith('AksesInternetRelatedByAksesInternetId', $join_behavior);

        return $this->getSekolahLongitudinals($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Semester is new, it will return
     * an empty collection; or if this Semester has previously
     * been saved, it will retrieve related SekolahLongitudinals from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Semester.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|SekolahLongitudinal[] List of SekolahLongitudinal objects
     */
    public function getSekolahLongitudinalsJoinAksesInternetRelatedByAksesInternet2Id($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = SekolahLongitudinalQuery::create(null, $criteria);
        $query->joinWith('AksesInternetRelatedByAksesInternet2Id', $join_behavior);

        return $this->getSekolahLongitudinals($query, $con);
    }

    /**
     * Clears out the collTunjangans collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Semester The current object (for fluent API support)
     * @see        addTunjangans()
     */
    public function clearTunjangans()
    {
        $this->collTunjangans = null; // important to set this to null since that means it is uninitialized
        $this->collTunjangansPartial = null;

        return $this;
    }

    /**
     * reset is the collTunjangans collection loaded partially
     *
     * @return void
     */
    public function resetPartialTunjangans($v = true)
    {
        $this->collTunjangansPartial = $v;
    }

    /**
     * Initializes the collTunjangans collection.
     *
     * By default this just sets the collTunjangans collection to an empty array (like clearcollTunjangans());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initTunjangans($overrideExisting = true)
    {
        if (null !== $this->collTunjangans && !$overrideExisting) {
            return;
        }
        $this->collTunjangans = new PropelObjectCollection();
        $this->collTunjangans->setModel('Tunjangan');
    }

    /**
     * Gets an array of Tunjangan objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Semester is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Tunjangan[] List of Tunjangan objects
     * @throws PropelException
     */
    public function getTunjangans($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collTunjangansPartial && !$this->isNew();
        if (null === $this->collTunjangans || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collTunjangans) {
                // return empty collection
                $this->initTunjangans();
            } else {
                $collTunjangans = TunjanganQuery::create(null, $criteria)
                    ->filterBySemester($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collTunjangansPartial && count($collTunjangans)) {
                      $this->initTunjangans(false);

                      foreach($collTunjangans as $obj) {
                        if (false == $this->collTunjangans->contains($obj)) {
                          $this->collTunjangans->append($obj);
                        }
                      }

                      $this->collTunjangansPartial = true;
                    }

                    $collTunjangans->getInternalIterator()->rewind();
                    return $collTunjangans;
                }

                if($partial && $this->collTunjangans) {
                    foreach($this->collTunjangans as $obj) {
                        if($obj->isNew()) {
                            $collTunjangans[] = $obj;
                        }
                    }
                }

                $this->collTunjangans = $collTunjangans;
                $this->collTunjangansPartial = false;
            }
        }

        return $this->collTunjangans;
    }

    /**
     * Sets a collection of Tunjangan objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $tunjangans A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Semester The current object (for fluent API support)
     */
    public function setTunjangans(PropelCollection $tunjangans, PropelPDO $con = null)
    {
        $tunjangansToDelete = $this->getTunjangans(new Criteria(), $con)->diff($tunjangans);

        $this->tunjangansScheduledForDeletion = unserialize(serialize($tunjangansToDelete));

        foreach ($tunjangansToDelete as $tunjanganRemoved) {
            $tunjanganRemoved->setSemester(null);
        }

        $this->collTunjangans = null;
        foreach ($tunjangans as $tunjangan) {
            $this->addTunjangan($tunjangan);
        }

        $this->collTunjangans = $tunjangans;
        $this->collTunjangansPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Tunjangan objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Tunjangan objects.
     * @throws PropelException
     */
    public function countTunjangans(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collTunjangansPartial && !$this->isNew();
        if (null === $this->collTunjangans || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collTunjangans) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getTunjangans());
            }
            $query = TunjanganQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterBySemester($this)
                ->count($con);
        }

        return count($this->collTunjangans);
    }

    /**
     * Method called to associate a Tunjangan object to this object
     * through the Tunjangan foreign key attribute.
     *
     * @param    Tunjangan $l Tunjangan
     * @return Semester The current object (for fluent API support)
     */
    public function addTunjangan(Tunjangan $l)
    {
        if ($this->collTunjangans === null) {
            $this->initTunjangans();
            $this->collTunjangansPartial = true;
        }
        if (!in_array($l, $this->collTunjangans->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddTunjangan($l);
        }

        return $this;
    }

    /**
     * @param	Tunjangan $tunjangan The tunjangan object to add.
     */
    protected function doAddTunjangan($tunjangan)
    {
        $this->collTunjangans[]= $tunjangan;
        $tunjangan->setSemester($this);
    }

    /**
     * @param	Tunjangan $tunjangan The tunjangan object to remove.
     * @return Semester The current object (for fluent API support)
     */
    public function removeTunjangan($tunjangan)
    {
        if ($this->getTunjangans()->contains($tunjangan)) {
            $this->collTunjangans->remove($this->collTunjangans->search($tunjangan));
            if (null === $this->tunjangansScheduledForDeletion) {
                $this->tunjangansScheduledForDeletion = clone $this->collTunjangans;
                $this->tunjangansScheduledForDeletion->clear();
            }
            $this->tunjangansScheduledForDeletion[]= $tunjangan;
            $tunjangan->setSemester(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Semester is new, it will return
     * an empty collection; or if this Semester has previously
     * been saved, it will retrieve related Tunjangans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Semester.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Tunjangan[] List of Tunjangan objects
     */
    public function getTunjangansJoinPtk($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TunjanganQuery::create(null, $criteria);
        $query->joinWith('Ptk', $join_behavior);

        return $this->getTunjangans($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Semester is new, it will return
     * an empty collection; or if this Semester has previously
     * been saved, it will retrieve related Tunjangans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Semester.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Tunjangan[] List of Tunjangan objects
     */
    public function getTunjangansJoinJenisTunjangan($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TunjanganQuery::create(null, $criteria);
        $query->joinWith('JenisTunjangan', $join_behavior);

        return $this->getTunjangans($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->semester_id = null;
        $this->tahun_ajaran_id = null;
        $this->nama = null;
        $this->semester = null;
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
            if ($this->collAktivitasKepanitiaans) {
                foreach ($this->collAktivitasKepanitiaans as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collAlatLongitudinals) {
                foreach ($this->collAlatLongitudinals as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collBangunanLongitudinals) {
                foreach ($this->collBangunanLongitudinals as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->singleBatasWaktuRapor) {
                $this->singleBatasWaktuRapor->clearAllReferences($deep);
            }
            if ($this->collBukuLongitudinals) {
                foreach ($this->collBukuLongitudinals as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collJurSpLongs) {
                foreach ($this->collJurSpLongs as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collPembelajarans) {
                foreach ($this->collPembelajarans as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collPesertaDidikLongitudinals) {
                foreach ($this->collPesertaDidikLongitudinals as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collRombonganBelajars) {
                foreach ($this->collRombonganBelajars as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collRuangLongitudinals) {
                foreach ($this->collRuangLongitudinals as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collSanitasis) {
                foreach ($this->collSanitasis as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collSekolahLongitudinals) {
                foreach ($this->collSekolahLongitudinals as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collTunjangans) {
                foreach ($this->collTunjangans as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aTahunAjaran instanceof Persistent) {
              $this->aTahunAjaran->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collAktivitasKepanitiaans instanceof PropelCollection) {
            $this->collAktivitasKepanitiaans->clearIterator();
        }
        $this->collAktivitasKepanitiaans = null;
        if ($this->collAlatLongitudinals instanceof PropelCollection) {
            $this->collAlatLongitudinals->clearIterator();
        }
        $this->collAlatLongitudinals = null;
        if ($this->collBangunanLongitudinals instanceof PropelCollection) {
            $this->collBangunanLongitudinals->clearIterator();
        }
        $this->collBangunanLongitudinals = null;
        if ($this->singleBatasWaktuRapor instanceof PropelCollection) {
            $this->singleBatasWaktuRapor->clearIterator();
        }
        $this->singleBatasWaktuRapor = null;
        if ($this->collBukuLongitudinals instanceof PropelCollection) {
            $this->collBukuLongitudinals->clearIterator();
        }
        $this->collBukuLongitudinals = null;
        if ($this->collJurSpLongs instanceof PropelCollection) {
            $this->collJurSpLongs->clearIterator();
        }
        $this->collJurSpLongs = null;
        if ($this->collPembelajarans instanceof PropelCollection) {
            $this->collPembelajarans->clearIterator();
        }
        $this->collPembelajarans = null;
        if ($this->collPesertaDidikLongitudinals instanceof PropelCollection) {
            $this->collPesertaDidikLongitudinals->clearIterator();
        }
        $this->collPesertaDidikLongitudinals = null;
        if ($this->collRombonganBelajars instanceof PropelCollection) {
            $this->collRombonganBelajars->clearIterator();
        }
        $this->collRombonganBelajars = null;
        if ($this->collRuangLongitudinals instanceof PropelCollection) {
            $this->collRuangLongitudinals->clearIterator();
        }
        $this->collRuangLongitudinals = null;
        if ($this->collSanitasis instanceof PropelCollection) {
            $this->collSanitasis->clearIterator();
        }
        $this->collSanitasis = null;
        if ($this->collSekolahLongitudinals instanceof PropelCollection) {
            $this->collSekolahLongitudinals->clearIterator();
        }
        $this->collSekolahLongitudinals = null;
        if ($this->collTunjangans instanceof PropelCollection) {
            $this->collTunjangans->clearIterator();
        }
        $this->collTunjangans = null;
        $this->aTahunAjaran = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(SemesterPeer::DEFAULT_STRING_FORMAT);
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
