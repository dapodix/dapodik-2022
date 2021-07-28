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
use DataDikdas\Model\Buku;
use DataDikdas\Model\BukuQuery;
use DataDikdas\Model\Jurusan;
use DataDikdas\Model\JurusanQuery;
use DataDikdas\Model\Kompetensi;
use DataDikdas\Model\KompetensiQuery;
use DataDikdas\Model\MapBidangMataPelajaran;
use DataDikdas\Model\MapBidangMataPelajaranQuery;
use DataDikdas\Model\MapelBiblio;
use DataDikdas\Model\MapelBiblioQuery;
use DataDikdas\Model\MataPelajaran;
use DataDikdas\Model\MataPelajaranKurikulum;
use DataDikdas\Model\MataPelajaranKurikulumQuery;
use DataDikdas\Model\MataPelajaranPeer;
use DataDikdas\Model\MataPelajaranQuery;
use DataDikdas\Model\MatevRapor;
use DataDikdas\Model\MatevRaporQuery;
use DataDikdas\Model\Mulok;
use DataDikdas\Model\MulokQuery;
use DataDikdas\Model\Pembelajaran;
use DataDikdas\Model\PembelajaranQuery;
use DataDikdas\Model\PengawasTerdaftar;
use DataDikdas\Model\PengawasTerdaftarQuery;
use DataDikdas\Model\TemplateRapor;
use DataDikdas\Model\TemplateRaporQuery;
use DataDikdas\Model\TemplateUn;
use DataDikdas\Model\TemplateUnQuery;

/**
 * Base class that represents a row from the 'ref.mata_pelajaran' table.
 *
 * 
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseMataPelajaran extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'DataDikdas\\Model\\MataPelajaranPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        MataPelajaranPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the mata_pelajaran_id field.
     * @var        int
     */
    protected $mata_pelajaran_id;

    /**
     * The value for the nama field.
     * @var        string
     */
    protected $nama;

    /**
     * The value for the pilihan_sekolah field.
     * @var        string
     */
    protected $pilihan_sekolah;

    /**
     * The value for the pilihan_buku field.
     * @var        string
     */
    protected $pilihan_buku;

    /**
     * The value for the pilihan_kepengawasan field.
     * @var        string
     */
    protected $pilihan_kepengawasan;

    /**
     * The value for the pilihan_evaluasi field.
     * Note: this column has a database default value of: '0'
     * @var        string
     */
    protected $pilihan_evaluasi;

    /**
     * The value for the jurusan_id field.
     * @var        string
     */
    protected $jurusan_id;

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
     * @var        Jurusan
     */
    protected $aJurusan;

    /**
     * @var        PropelObjectCollection|Buku[] Collection to store aggregation of Buku objects.
     */
    protected $collBukus;
    protected $collBukusPartial;

    /**
     * @var        PropelObjectCollection|Kompetensi[] Collection to store aggregation of Kompetensi objects.
     */
    protected $collKompetensis;
    protected $collKompetensisPartial;

    /**
     * @var        PropelObjectCollection|MapBidangMataPelajaran[] Collection to store aggregation of MapBidangMataPelajaran objects.
     */
    protected $collMapBidangMataPelajarans;
    protected $collMapBidangMataPelajaransPartial;

    /**
     * @var        PropelObjectCollection|MapelBiblio[] Collection to store aggregation of MapelBiblio objects.
     */
    protected $collMapelBiblios;
    protected $collMapelBibliosPartial;

    /**
     * @var        PropelObjectCollection|MataPelajaranKurikulum[] Collection to store aggregation of MataPelajaranKurikulum objects.
     */
    protected $collMataPelajaranKurikulums;
    protected $collMataPelajaranKurikulumsPartial;

    /**
     * @var        PropelObjectCollection|MatevRapor[] Collection to store aggregation of MatevRapor objects.
     */
    protected $collMatevRapors;
    protected $collMatevRaporsPartial;

    /**
     * @var        PropelObjectCollection|Mulok[] Collection to store aggregation of Mulok objects.
     */
    protected $collMuloks;
    protected $collMuloksPartial;

    /**
     * @var        PropelObjectCollection|Pembelajaran[] Collection to store aggregation of Pembelajaran objects.
     */
    protected $collPembelajarans;
    protected $collPembelajaransPartial;

    /**
     * @var        PropelObjectCollection|PengawasTerdaftar[] Collection to store aggregation of PengawasTerdaftar objects.
     */
    protected $collPengawasTerdaftars;
    protected $collPengawasTerdaftarsPartial;

    /**
     * @var        PropelObjectCollection|TemplateRapor[] Collection to store aggregation of TemplateRapor objects.
     */
    protected $collTemplateRapors;
    protected $collTemplateRaporsPartial;

    /**
     * @var        PropelObjectCollection|TemplateUn[] Collection to store aggregation of TemplateUn objects.
     */
    protected $collTemplateUnsRelatedByMp3Id;
    protected $collTemplateUnsRelatedByMp3IdPartial;

    /**
     * @var        PropelObjectCollection|TemplateUn[] Collection to store aggregation of TemplateUn objects.
     */
    protected $collTemplateUnsRelatedByMp4Id;
    protected $collTemplateUnsRelatedByMp4IdPartial;

    /**
     * @var        PropelObjectCollection|TemplateUn[] Collection to store aggregation of TemplateUn objects.
     */
    protected $collTemplateUnsRelatedByMp7Id;
    protected $collTemplateUnsRelatedByMp7IdPartial;

    /**
     * @var        PropelObjectCollection|TemplateUn[] Collection to store aggregation of TemplateUn objects.
     */
    protected $collTemplateUnsRelatedByMp5Id;
    protected $collTemplateUnsRelatedByMp5IdPartial;

    /**
     * @var        PropelObjectCollection|TemplateUn[] Collection to store aggregation of TemplateUn objects.
     */
    protected $collTemplateUnsRelatedByMp1Id;
    protected $collTemplateUnsRelatedByMp1IdPartial;

    /**
     * @var        PropelObjectCollection|TemplateUn[] Collection to store aggregation of TemplateUn objects.
     */
    protected $collTemplateUnsRelatedByMp2Id;
    protected $collTemplateUnsRelatedByMp2IdPartial;

    /**
     * @var        PropelObjectCollection|TemplateUn[] Collection to store aggregation of TemplateUn objects.
     */
    protected $collTemplateUnsRelatedByMp6Id;
    protected $collTemplateUnsRelatedByMp6IdPartial;

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
    protected $bukusScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $kompetensisScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $mapBidangMataPelajaransScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $mapelBibliosScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $mataPelajaranKurikulumsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $matevRaporsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $muloksScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $pembelajaransScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $pengawasTerdaftarsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $templateRaporsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $templateUnsRelatedByMp3IdScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $templateUnsRelatedByMp4IdScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $templateUnsRelatedByMp7IdScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $templateUnsRelatedByMp5IdScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $templateUnsRelatedByMp1IdScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $templateUnsRelatedByMp2IdScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $templateUnsRelatedByMp6IdScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->pilihan_evaluasi = '0';
        $this->last_sync = '1901-01-01 00:00:00';
    }

    /**
     * Initializes internal state of BaseMataPelajaran object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
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
     * Get the [nama] column value.
     * 
     * @return string
     */
    public function getNama()
    {
        return $this->nama;
    }

    /**
     * Get the [pilihan_sekolah] column value.
     * 
     * @return string
     */
    public function getPilihanSekolah()
    {
        return $this->pilihan_sekolah;
    }

    /**
     * Get the [pilihan_buku] column value.
     * 
     * @return string
     */
    public function getPilihanBuku()
    {
        return $this->pilihan_buku;
    }

    /**
     * Get the [pilihan_kepengawasan] column value.
     * 
     * @return string
     */
    public function getPilihanKepengawasan()
    {
        return $this->pilihan_kepengawasan;
    }

    /**
     * Get the [pilihan_evaluasi] column value.
     * 
     * @return string
     */
    public function getPilihanEvaluasi()
    {
        return $this->pilihan_evaluasi;
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
     * Set the value of [mata_pelajaran_id] column.
     * 
     * @param int $v new value
     * @return MataPelajaran The current object (for fluent API support)
     */
    public function setMataPelajaranId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->mata_pelajaran_id !== $v) {
            $this->mata_pelajaran_id = $v;
            $this->modifiedColumns[] = MataPelajaranPeer::MATA_PELAJARAN_ID;
        }


        return $this;
    } // setMataPelajaranId()

    /**
     * Set the value of [nama] column.
     * 
     * @param string $v new value
     * @return MataPelajaran The current object (for fluent API support)
     */
    public function setNama($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nama !== $v) {
            $this->nama = $v;
            $this->modifiedColumns[] = MataPelajaranPeer::NAMA;
        }


        return $this;
    } // setNama()

    /**
     * Set the value of [pilihan_sekolah] column.
     * 
     * @param string $v new value
     * @return MataPelajaran The current object (for fluent API support)
     */
    public function setPilihanSekolah($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->pilihan_sekolah !== $v) {
            $this->pilihan_sekolah = $v;
            $this->modifiedColumns[] = MataPelajaranPeer::PILIHAN_SEKOLAH;
        }


        return $this;
    } // setPilihanSekolah()

    /**
     * Set the value of [pilihan_buku] column.
     * 
     * @param string $v new value
     * @return MataPelajaran The current object (for fluent API support)
     */
    public function setPilihanBuku($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->pilihan_buku !== $v) {
            $this->pilihan_buku = $v;
            $this->modifiedColumns[] = MataPelajaranPeer::PILIHAN_BUKU;
        }


        return $this;
    } // setPilihanBuku()

    /**
     * Set the value of [pilihan_kepengawasan] column.
     * 
     * @param string $v new value
     * @return MataPelajaran The current object (for fluent API support)
     */
    public function setPilihanKepengawasan($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->pilihan_kepengawasan !== $v) {
            $this->pilihan_kepengawasan = $v;
            $this->modifiedColumns[] = MataPelajaranPeer::PILIHAN_KEPENGAWASAN;
        }


        return $this;
    } // setPilihanKepengawasan()

    /**
     * Set the value of [pilihan_evaluasi] column.
     * 
     * @param string $v new value
     * @return MataPelajaran The current object (for fluent API support)
     */
    public function setPilihanEvaluasi($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->pilihan_evaluasi !== $v) {
            $this->pilihan_evaluasi = $v;
            $this->modifiedColumns[] = MataPelajaranPeer::PILIHAN_EVALUASI;
        }


        return $this;
    } // setPilihanEvaluasi()

    /**
     * Set the value of [jurusan_id] column.
     * 
     * @param string $v new value
     * @return MataPelajaran The current object (for fluent API support)
     */
    public function setJurusanId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->jurusan_id !== $v) {
            $this->jurusan_id = $v;
            $this->modifiedColumns[] = MataPelajaranPeer::JURUSAN_ID;
        }

        if ($this->aJurusan !== null && $this->aJurusan->getJurusanId() !== $v) {
            $this->aJurusan = null;
        }


        return $this;
    } // setJurusanId()

    /**
     * Sets the value of [create_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return MataPelajaran The current object (for fluent API support)
     */
    public function setCreateDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->create_date !== null || $dt !== null) {
            $currentDateAsString = ($this->create_date !== null && $tmpDt = new DateTime($this->create_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->create_date = $newDateAsString;
                $this->modifiedColumns[] = MataPelajaranPeer::CREATE_DATE;
            }
        } // if either are not null


        return $this;
    } // setCreateDate()

    /**
     * Sets the value of [last_update] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return MataPelajaran The current object (for fluent API support)
     */
    public function setLastUpdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->last_update !== null || $dt !== null) {
            $currentDateAsString = ($this->last_update !== null && $tmpDt = new DateTime($this->last_update)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->last_update = $newDateAsString;
                $this->modifiedColumns[] = MataPelajaranPeer::LAST_UPDATE;
            }
        } // if either are not null


        return $this;
    } // setLastUpdate()

    /**
     * Sets the value of [expired_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return MataPelajaran The current object (for fluent API support)
     */
    public function setExpiredDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->expired_date !== null || $dt !== null) {
            $currentDateAsString = ($this->expired_date !== null && $tmpDt = new DateTime($this->expired_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->expired_date = $newDateAsString;
                $this->modifiedColumns[] = MataPelajaranPeer::EXPIRED_DATE;
            }
        } // if either are not null


        return $this;
    } // setExpiredDate()

    /**
     * Sets the value of [last_sync] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return MataPelajaran The current object (for fluent API support)
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
                $this->modifiedColumns[] = MataPelajaranPeer::LAST_SYNC;
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
            if ($this->pilihan_evaluasi !== '0') {
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

            $this->mata_pelajaran_id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->nama = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->pilihan_sekolah = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->pilihan_buku = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->pilihan_kepengawasan = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->pilihan_evaluasi = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->jurusan_id = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
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
            return $startcol + 11; // 11 = MataPelajaranPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating MataPelajaran object", $e);
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
            $con = Propel::getConnection(MataPelajaranPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = MataPelajaranPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aJurusan = null;
            $this->collBukus = null;

            $this->collKompetensis = null;

            $this->collMapBidangMataPelajarans = null;

            $this->collMapelBiblios = null;

            $this->collMataPelajaranKurikulums = null;

            $this->collMatevRapors = null;

            $this->collMuloks = null;

            $this->collPembelajarans = null;

            $this->collPengawasTerdaftars = null;

            $this->collTemplateRapors = null;

            $this->collTemplateUnsRelatedByMp3Id = null;

            $this->collTemplateUnsRelatedByMp4Id = null;

            $this->collTemplateUnsRelatedByMp7Id = null;

            $this->collTemplateUnsRelatedByMp5Id = null;

            $this->collTemplateUnsRelatedByMp1Id = null;

            $this->collTemplateUnsRelatedByMp2Id = null;

            $this->collTemplateUnsRelatedByMp6Id = null;

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
            $con = Propel::getConnection(MataPelajaranPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = MataPelajaranQuery::create()
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
            $con = Propel::getConnection(MataPelajaranPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                MataPelajaranPeer::addInstanceToPool($this);
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

            if ($this->bukusScheduledForDeletion !== null) {
                if (!$this->bukusScheduledForDeletion->isEmpty()) {
                    BukuQuery::create()
                        ->filterByPrimaryKeys($this->bukusScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->bukusScheduledForDeletion = null;
                }
            }

            if ($this->collBukus !== null) {
                foreach ($this->collBukus as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->kompetensisScheduledForDeletion !== null) {
                if (!$this->kompetensisScheduledForDeletion->isEmpty()) {
                    KompetensiQuery::create()
                        ->filterByPrimaryKeys($this->kompetensisScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->kompetensisScheduledForDeletion = null;
                }
            }

            if ($this->collKompetensis !== null) {
                foreach ($this->collKompetensis as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->mapBidangMataPelajaransScheduledForDeletion !== null) {
                if (!$this->mapBidangMataPelajaransScheduledForDeletion->isEmpty()) {
                    MapBidangMataPelajaranQuery::create()
                        ->filterByPrimaryKeys($this->mapBidangMataPelajaransScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->mapBidangMataPelajaransScheduledForDeletion = null;
                }
            }

            if ($this->collMapBidangMataPelajarans !== null) {
                foreach ($this->collMapBidangMataPelajarans as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->mapelBibliosScheduledForDeletion !== null) {
                if (!$this->mapelBibliosScheduledForDeletion->isEmpty()) {
                    MapelBiblioQuery::create()
                        ->filterByPrimaryKeys($this->mapelBibliosScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->mapelBibliosScheduledForDeletion = null;
                }
            }

            if ($this->collMapelBiblios !== null) {
                foreach ($this->collMapelBiblios as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->mataPelajaranKurikulumsScheduledForDeletion !== null) {
                if (!$this->mataPelajaranKurikulumsScheduledForDeletion->isEmpty()) {
                    MataPelajaranKurikulumQuery::create()
                        ->filterByPrimaryKeys($this->mataPelajaranKurikulumsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->mataPelajaranKurikulumsScheduledForDeletion = null;
                }
            }

            if ($this->collMataPelajaranKurikulums !== null) {
                foreach ($this->collMataPelajaranKurikulums as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->matevRaporsScheduledForDeletion !== null) {
                if (!$this->matevRaporsScheduledForDeletion->isEmpty()) {
                    MatevRaporQuery::create()
                        ->filterByPrimaryKeys($this->matevRaporsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->matevRaporsScheduledForDeletion = null;
                }
            }

            if ($this->collMatevRapors !== null) {
                foreach ($this->collMatevRapors as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->muloksScheduledForDeletion !== null) {
                if (!$this->muloksScheduledForDeletion->isEmpty()) {
                    MulokQuery::create()
                        ->filterByPrimaryKeys($this->muloksScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->muloksScheduledForDeletion = null;
                }
            }

            if ($this->collMuloks !== null) {
                foreach ($this->collMuloks as $referrerFK) {
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

            if ($this->pengawasTerdaftarsScheduledForDeletion !== null) {
                if (!$this->pengawasTerdaftarsScheduledForDeletion->isEmpty()) {
                    foreach ($this->pengawasTerdaftarsScheduledForDeletion as $pengawasTerdaftar) {
                        // need to save related object because we set the relation to null
                        $pengawasTerdaftar->save($con);
                    }
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

            if ($this->templateRaporsScheduledForDeletion !== null) {
                if (!$this->templateRaporsScheduledForDeletion->isEmpty()) {
                    TemplateRaporQuery::create()
                        ->filterByPrimaryKeys($this->templateRaporsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->templateRaporsScheduledForDeletion = null;
                }
            }

            if ($this->collTemplateRapors !== null) {
                foreach ($this->collTemplateRapors as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->templateUnsRelatedByMp3IdScheduledForDeletion !== null) {
                if (!$this->templateUnsRelatedByMp3IdScheduledForDeletion->isEmpty()) {
                    foreach ($this->templateUnsRelatedByMp3IdScheduledForDeletion as $templateUnRelatedByMp3Id) {
                        // need to save related object because we set the relation to null
                        $templateUnRelatedByMp3Id->save($con);
                    }
                    $this->templateUnsRelatedByMp3IdScheduledForDeletion = null;
                }
            }

            if ($this->collTemplateUnsRelatedByMp3Id !== null) {
                foreach ($this->collTemplateUnsRelatedByMp3Id as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->templateUnsRelatedByMp4IdScheduledForDeletion !== null) {
                if (!$this->templateUnsRelatedByMp4IdScheduledForDeletion->isEmpty()) {
                    foreach ($this->templateUnsRelatedByMp4IdScheduledForDeletion as $templateUnRelatedByMp4Id) {
                        // need to save related object because we set the relation to null
                        $templateUnRelatedByMp4Id->save($con);
                    }
                    $this->templateUnsRelatedByMp4IdScheduledForDeletion = null;
                }
            }

            if ($this->collTemplateUnsRelatedByMp4Id !== null) {
                foreach ($this->collTemplateUnsRelatedByMp4Id as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->templateUnsRelatedByMp7IdScheduledForDeletion !== null) {
                if (!$this->templateUnsRelatedByMp7IdScheduledForDeletion->isEmpty()) {
                    foreach ($this->templateUnsRelatedByMp7IdScheduledForDeletion as $templateUnRelatedByMp7Id) {
                        // need to save related object because we set the relation to null
                        $templateUnRelatedByMp7Id->save($con);
                    }
                    $this->templateUnsRelatedByMp7IdScheduledForDeletion = null;
                }
            }

            if ($this->collTemplateUnsRelatedByMp7Id !== null) {
                foreach ($this->collTemplateUnsRelatedByMp7Id as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->templateUnsRelatedByMp5IdScheduledForDeletion !== null) {
                if (!$this->templateUnsRelatedByMp5IdScheduledForDeletion->isEmpty()) {
                    foreach ($this->templateUnsRelatedByMp5IdScheduledForDeletion as $templateUnRelatedByMp5Id) {
                        // need to save related object because we set the relation to null
                        $templateUnRelatedByMp5Id->save($con);
                    }
                    $this->templateUnsRelatedByMp5IdScheduledForDeletion = null;
                }
            }

            if ($this->collTemplateUnsRelatedByMp5Id !== null) {
                foreach ($this->collTemplateUnsRelatedByMp5Id as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->templateUnsRelatedByMp1IdScheduledForDeletion !== null) {
                if (!$this->templateUnsRelatedByMp1IdScheduledForDeletion->isEmpty()) {
                    foreach ($this->templateUnsRelatedByMp1IdScheduledForDeletion as $templateUnRelatedByMp1Id) {
                        // need to save related object because we set the relation to null
                        $templateUnRelatedByMp1Id->save($con);
                    }
                    $this->templateUnsRelatedByMp1IdScheduledForDeletion = null;
                }
            }

            if ($this->collTemplateUnsRelatedByMp1Id !== null) {
                foreach ($this->collTemplateUnsRelatedByMp1Id as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->templateUnsRelatedByMp2IdScheduledForDeletion !== null) {
                if (!$this->templateUnsRelatedByMp2IdScheduledForDeletion->isEmpty()) {
                    foreach ($this->templateUnsRelatedByMp2IdScheduledForDeletion as $templateUnRelatedByMp2Id) {
                        // need to save related object because we set the relation to null
                        $templateUnRelatedByMp2Id->save($con);
                    }
                    $this->templateUnsRelatedByMp2IdScheduledForDeletion = null;
                }
            }

            if ($this->collTemplateUnsRelatedByMp2Id !== null) {
                foreach ($this->collTemplateUnsRelatedByMp2Id as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->templateUnsRelatedByMp6IdScheduledForDeletion !== null) {
                if (!$this->templateUnsRelatedByMp6IdScheduledForDeletion->isEmpty()) {
                    foreach ($this->templateUnsRelatedByMp6IdScheduledForDeletion as $templateUnRelatedByMp6Id) {
                        // need to save related object because we set the relation to null
                        $templateUnRelatedByMp6Id->save($con);
                    }
                    $this->templateUnsRelatedByMp6IdScheduledForDeletion = null;
                }
            }

            if ($this->collTemplateUnsRelatedByMp6Id !== null) {
                foreach ($this->collTemplateUnsRelatedByMp6Id as $referrerFK) {
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
        if ($this->isColumnModified(MataPelajaranPeer::MATA_PELAJARAN_ID)) {
            $modifiedColumns[':p' . $index++]  = '"mata_pelajaran_id"';
        }
        if ($this->isColumnModified(MataPelajaranPeer::NAMA)) {
            $modifiedColumns[':p' . $index++]  = '"nama"';
        }
        if ($this->isColumnModified(MataPelajaranPeer::PILIHAN_SEKOLAH)) {
            $modifiedColumns[':p' . $index++]  = '"pilihan_sekolah"';
        }
        if ($this->isColumnModified(MataPelajaranPeer::PILIHAN_BUKU)) {
            $modifiedColumns[':p' . $index++]  = '"pilihan_buku"';
        }
        if ($this->isColumnModified(MataPelajaranPeer::PILIHAN_KEPENGAWASAN)) {
            $modifiedColumns[':p' . $index++]  = '"pilihan_kepengawasan"';
        }
        if ($this->isColumnModified(MataPelajaranPeer::PILIHAN_EVALUASI)) {
            $modifiedColumns[':p' . $index++]  = '"pilihan_evaluasi"';
        }
        if ($this->isColumnModified(MataPelajaranPeer::JURUSAN_ID)) {
            $modifiedColumns[':p' . $index++]  = '"jurusan_id"';
        }
        if ($this->isColumnModified(MataPelajaranPeer::CREATE_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"create_date"';
        }
        if ($this->isColumnModified(MataPelajaranPeer::LAST_UPDATE)) {
            $modifiedColumns[':p' . $index++]  = '"last_update"';
        }
        if ($this->isColumnModified(MataPelajaranPeer::EXPIRED_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"expired_date"';
        }
        if ($this->isColumnModified(MataPelajaranPeer::LAST_SYNC)) {
            $modifiedColumns[':p' . $index++]  = '"last_sync"';
        }

        $sql = sprintf(
            'INSERT INTO "ref"."mata_pelajaran" (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '"mata_pelajaran_id"':						
                        $stmt->bindValue($identifier, $this->mata_pelajaran_id, PDO::PARAM_INT);
                        break;
                    case '"nama"':						
                        $stmt->bindValue($identifier, $this->nama, PDO::PARAM_STR);
                        break;
                    case '"pilihan_sekolah"':						
                        $stmt->bindValue($identifier, $this->pilihan_sekolah, PDO::PARAM_STR);
                        break;
                    case '"pilihan_buku"':						
                        $stmt->bindValue($identifier, $this->pilihan_buku, PDO::PARAM_STR);
                        break;
                    case '"pilihan_kepengawasan"':						
                        $stmt->bindValue($identifier, $this->pilihan_kepengawasan, PDO::PARAM_STR);
                        break;
                    case '"pilihan_evaluasi"':						
                        $stmt->bindValue($identifier, $this->pilihan_evaluasi, PDO::PARAM_STR);
                        break;
                    case '"jurusan_id"':						
                        $stmt->bindValue($identifier, $this->jurusan_id, PDO::PARAM_STR);
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

            if ($this->aJurusan !== null) {
                if (!$this->aJurusan->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aJurusan->getValidationFailures());
                }
            }


            if (($retval = MataPelajaranPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collBukus !== null) {
                    foreach ($this->collBukus as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collKompetensis !== null) {
                    foreach ($this->collKompetensis as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collMapBidangMataPelajarans !== null) {
                    foreach ($this->collMapBidangMataPelajarans as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collMapelBiblios !== null) {
                    foreach ($this->collMapelBiblios as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collMataPelajaranKurikulums !== null) {
                    foreach ($this->collMataPelajaranKurikulums as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collMatevRapors !== null) {
                    foreach ($this->collMatevRapors as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collMuloks !== null) {
                    foreach ($this->collMuloks as $referrerFK) {
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

                if ($this->collPengawasTerdaftars !== null) {
                    foreach ($this->collPengawasTerdaftars as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collTemplateRapors !== null) {
                    foreach ($this->collTemplateRapors as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collTemplateUnsRelatedByMp3Id !== null) {
                    foreach ($this->collTemplateUnsRelatedByMp3Id as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collTemplateUnsRelatedByMp4Id !== null) {
                    foreach ($this->collTemplateUnsRelatedByMp4Id as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collTemplateUnsRelatedByMp7Id !== null) {
                    foreach ($this->collTemplateUnsRelatedByMp7Id as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collTemplateUnsRelatedByMp5Id !== null) {
                    foreach ($this->collTemplateUnsRelatedByMp5Id as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collTemplateUnsRelatedByMp1Id !== null) {
                    foreach ($this->collTemplateUnsRelatedByMp1Id as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collTemplateUnsRelatedByMp2Id !== null) {
                    foreach ($this->collTemplateUnsRelatedByMp2Id as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collTemplateUnsRelatedByMp6Id !== null) {
                    foreach ($this->collTemplateUnsRelatedByMp6Id as $referrerFK) {
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
        $pos = MataPelajaranPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getMataPelajaranId();
                break;
            case 1:
                return $this->getNama();
                break;
            case 2:
                return $this->getPilihanSekolah();
                break;
            case 3:
                return $this->getPilihanBuku();
                break;
            case 4:
                return $this->getPilihanKepengawasan();
                break;
            case 5:
                return $this->getPilihanEvaluasi();
                break;
            case 6:
                return $this->getJurusanId();
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
        if (isset($alreadyDumpedObjects['MataPelajaran'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['MataPelajaran'][$this->getPrimaryKey()] = true;
        $keys = MataPelajaranPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getMataPelajaranId(),
            $keys[1] => $this->getNama(),
            $keys[2] => $this->getPilihanSekolah(),
            $keys[3] => $this->getPilihanBuku(),
            $keys[4] => $this->getPilihanKepengawasan(),
            $keys[5] => $this->getPilihanEvaluasi(),
            $keys[6] => $this->getJurusanId(),
            $keys[7] => $this->getCreateDate(),
            $keys[8] => $this->getLastUpdate(),
            $keys[9] => $this->getExpiredDate(),
            $keys[10] => $this->getLastSync(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aJurusan) {
                $result['Jurusan'] = $this->aJurusan->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collBukus) {
                $result['Bukus'] = $this->collBukus->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collKompetensis) {
                $result['Kompetensis'] = $this->collKompetensis->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collMapBidangMataPelajarans) {
                $result['MapBidangMataPelajarans'] = $this->collMapBidangMataPelajarans->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collMapelBiblios) {
                $result['MapelBiblios'] = $this->collMapelBiblios->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collMataPelajaranKurikulums) {
                $result['MataPelajaranKurikulums'] = $this->collMataPelajaranKurikulums->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collMatevRapors) {
                $result['MatevRapors'] = $this->collMatevRapors->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collMuloks) {
                $result['Muloks'] = $this->collMuloks->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collPembelajarans) {
                $result['Pembelajarans'] = $this->collPembelajarans->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collPengawasTerdaftars) {
                $result['PengawasTerdaftars'] = $this->collPengawasTerdaftars->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collTemplateRapors) {
                $result['TemplateRapors'] = $this->collTemplateRapors->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collTemplateUnsRelatedByMp3Id) {
                $result['TemplateUnsRelatedByMp3Id'] = $this->collTemplateUnsRelatedByMp3Id->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collTemplateUnsRelatedByMp4Id) {
                $result['TemplateUnsRelatedByMp4Id'] = $this->collTemplateUnsRelatedByMp4Id->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collTemplateUnsRelatedByMp7Id) {
                $result['TemplateUnsRelatedByMp7Id'] = $this->collTemplateUnsRelatedByMp7Id->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collTemplateUnsRelatedByMp5Id) {
                $result['TemplateUnsRelatedByMp5Id'] = $this->collTemplateUnsRelatedByMp5Id->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collTemplateUnsRelatedByMp1Id) {
                $result['TemplateUnsRelatedByMp1Id'] = $this->collTemplateUnsRelatedByMp1Id->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collTemplateUnsRelatedByMp2Id) {
                $result['TemplateUnsRelatedByMp2Id'] = $this->collTemplateUnsRelatedByMp2Id->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collTemplateUnsRelatedByMp6Id) {
                $result['TemplateUnsRelatedByMp6Id'] = $this->collTemplateUnsRelatedByMp6Id->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = MataPelajaranPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setMataPelajaranId($value);
                break;
            case 1:
                $this->setNama($value);
                break;
            case 2:
                $this->setPilihanSekolah($value);
                break;
            case 3:
                $this->setPilihanBuku($value);
                break;
            case 4:
                $this->setPilihanKepengawasan($value);
                break;
            case 5:
                $this->setPilihanEvaluasi($value);
                break;
            case 6:
                $this->setJurusanId($value);
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
        $keys = MataPelajaranPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setMataPelajaranId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setNama($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setPilihanSekolah($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setPilihanBuku($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setPilihanKepengawasan($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setPilihanEvaluasi($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setJurusanId($arr[$keys[6]]);
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
        $criteria = new Criteria(MataPelajaranPeer::DATABASE_NAME);

        if ($this->isColumnModified(MataPelajaranPeer::MATA_PELAJARAN_ID)) $criteria->add(MataPelajaranPeer::MATA_PELAJARAN_ID, $this->mata_pelajaran_id);
        if ($this->isColumnModified(MataPelajaranPeer::NAMA)) $criteria->add(MataPelajaranPeer::NAMA, $this->nama);
        if ($this->isColumnModified(MataPelajaranPeer::PILIHAN_SEKOLAH)) $criteria->add(MataPelajaranPeer::PILIHAN_SEKOLAH, $this->pilihan_sekolah);
        if ($this->isColumnModified(MataPelajaranPeer::PILIHAN_BUKU)) $criteria->add(MataPelajaranPeer::PILIHAN_BUKU, $this->pilihan_buku);
        if ($this->isColumnModified(MataPelajaranPeer::PILIHAN_KEPENGAWASAN)) $criteria->add(MataPelajaranPeer::PILIHAN_KEPENGAWASAN, $this->pilihan_kepengawasan);
        if ($this->isColumnModified(MataPelajaranPeer::PILIHAN_EVALUASI)) $criteria->add(MataPelajaranPeer::PILIHAN_EVALUASI, $this->pilihan_evaluasi);
        if ($this->isColumnModified(MataPelajaranPeer::JURUSAN_ID)) $criteria->add(MataPelajaranPeer::JURUSAN_ID, $this->jurusan_id);
        if ($this->isColumnModified(MataPelajaranPeer::CREATE_DATE)) $criteria->add(MataPelajaranPeer::CREATE_DATE, $this->create_date);
        if ($this->isColumnModified(MataPelajaranPeer::LAST_UPDATE)) $criteria->add(MataPelajaranPeer::LAST_UPDATE, $this->last_update);
        if ($this->isColumnModified(MataPelajaranPeer::EXPIRED_DATE)) $criteria->add(MataPelajaranPeer::EXPIRED_DATE, $this->expired_date);
        if ($this->isColumnModified(MataPelajaranPeer::LAST_SYNC)) $criteria->add(MataPelajaranPeer::LAST_SYNC, $this->last_sync);

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
        $criteria = new Criteria(MataPelajaranPeer::DATABASE_NAME);
        $criteria->add(MataPelajaranPeer::MATA_PELAJARAN_ID, $this->mata_pelajaran_id);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getMataPelajaranId();
    }

    /**
     * Generic method to set the primary key (mata_pelajaran_id column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setMataPelajaranId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getMataPelajaranId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of MataPelajaran (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setNama($this->getNama());
        $copyObj->setPilihanSekolah($this->getPilihanSekolah());
        $copyObj->setPilihanBuku($this->getPilihanBuku());
        $copyObj->setPilihanKepengawasan($this->getPilihanKepengawasan());
        $copyObj->setPilihanEvaluasi($this->getPilihanEvaluasi());
        $copyObj->setJurusanId($this->getJurusanId());
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

            foreach ($this->getBukus() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addBuku($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getKompetensis() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addKompetensi($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getMapBidangMataPelajarans() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addMapBidangMataPelajaran($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getMapelBiblios() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addMapelBiblio($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getMataPelajaranKurikulums() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addMataPelajaranKurikulum($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getMatevRapors() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addMatevRapor($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getMuloks() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addMulok($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getPembelajarans() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPembelajaran($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getPengawasTerdaftars() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPengawasTerdaftar($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getTemplateRapors() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addTemplateRapor($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getTemplateUnsRelatedByMp3Id() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addTemplateUnRelatedByMp3Id($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getTemplateUnsRelatedByMp4Id() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addTemplateUnRelatedByMp4Id($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getTemplateUnsRelatedByMp7Id() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addTemplateUnRelatedByMp7Id($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getTemplateUnsRelatedByMp5Id() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addTemplateUnRelatedByMp5Id($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getTemplateUnsRelatedByMp1Id() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addTemplateUnRelatedByMp1Id($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getTemplateUnsRelatedByMp2Id() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addTemplateUnRelatedByMp2Id($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getTemplateUnsRelatedByMp6Id() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addTemplateUnRelatedByMp6Id($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setMataPelajaranId(NULL); // this is a auto-increment column, so set to default value
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
     * @return MataPelajaran Clone of current object.
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
     * @return MataPelajaranPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new MataPelajaranPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Jurusan object.
     *
     * @param             Jurusan $v
     * @return MataPelajaran The current object (for fluent API support)
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
            $v->addMataPelajaran($this);
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
                $this->aJurusan->addMataPelajarans($this);
             */
        }

        return $this->aJurusan;
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
        if ('Buku' == $relationName) {
            $this->initBukus();
        }
        if ('Kompetensi' == $relationName) {
            $this->initKompetensis();
        }
        if ('MapBidangMataPelajaran' == $relationName) {
            $this->initMapBidangMataPelajarans();
        }
        if ('MapelBiblio' == $relationName) {
            $this->initMapelBiblios();
        }
        if ('MataPelajaranKurikulum' == $relationName) {
            $this->initMataPelajaranKurikulums();
        }
        if ('MatevRapor' == $relationName) {
            $this->initMatevRapors();
        }
        if ('Mulok' == $relationName) {
            $this->initMuloks();
        }
        if ('Pembelajaran' == $relationName) {
            $this->initPembelajarans();
        }
        if ('PengawasTerdaftar' == $relationName) {
            $this->initPengawasTerdaftars();
        }
        if ('TemplateRapor' == $relationName) {
            $this->initTemplateRapors();
        }
        if ('TemplateUnRelatedByMp3Id' == $relationName) {
            $this->initTemplateUnsRelatedByMp3Id();
        }
        if ('TemplateUnRelatedByMp4Id' == $relationName) {
            $this->initTemplateUnsRelatedByMp4Id();
        }
        if ('TemplateUnRelatedByMp7Id' == $relationName) {
            $this->initTemplateUnsRelatedByMp7Id();
        }
        if ('TemplateUnRelatedByMp5Id' == $relationName) {
            $this->initTemplateUnsRelatedByMp5Id();
        }
        if ('TemplateUnRelatedByMp1Id' == $relationName) {
            $this->initTemplateUnsRelatedByMp1Id();
        }
        if ('TemplateUnRelatedByMp2Id' == $relationName) {
            $this->initTemplateUnsRelatedByMp2Id();
        }
        if ('TemplateUnRelatedByMp6Id' == $relationName) {
            $this->initTemplateUnsRelatedByMp6Id();
        }
    }

    /**
     * Clears out the collBukus collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return MataPelajaran The current object (for fluent API support)
     * @see        addBukus()
     */
    public function clearBukus()
    {
        $this->collBukus = null; // important to set this to null since that means it is uninitialized
        $this->collBukusPartial = null;

        return $this;
    }

    /**
     * reset is the collBukus collection loaded partially
     *
     * @return void
     */
    public function resetPartialBukus($v = true)
    {
        $this->collBukusPartial = $v;
    }

    /**
     * Initializes the collBukus collection.
     *
     * By default this just sets the collBukus collection to an empty array (like clearcollBukus());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initBukus($overrideExisting = true)
    {
        if (null !== $this->collBukus && !$overrideExisting) {
            return;
        }
        $this->collBukus = new PropelObjectCollection();
        $this->collBukus->setModel('Buku');
    }

    /**
     * Gets an array of Buku objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this MataPelajaran is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Buku[] List of Buku objects
     * @throws PropelException
     */
    public function getBukus($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collBukusPartial && !$this->isNew();
        if (null === $this->collBukus || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collBukus) {
                // return empty collection
                $this->initBukus();
            } else {
                $collBukus = BukuQuery::create(null, $criteria)
                    ->filterByMataPelajaran($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collBukusPartial && count($collBukus)) {
                      $this->initBukus(false);

                      foreach($collBukus as $obj) {
                        if (false == $this->collBukus->contains($obj)) {
                          $this->collBukus->append($obj);
                        }
                      }

                      $this->collBukusPartial = true;
                    }

                    $collBukus->getInternalIterator()->rewind();
                    return $collBukus;
                }

                if($partial && $this->collBukus) {
                    foreach($this->collBukus as $obj) {
                        if($obj->isNew()) {
                            $collBukus[] = $obj;
                        }
                    }
                }

                $this->collBukus = $collBukus;
                $this->collBukusPartial = false;
            }
        }

        return $this->collBukus;
    }

    /**
     * Sets a collection of Buku objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $bukus A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return MataPelajaran The current object (for fluent API support)
     */
    public function setBukus(PropelCollection $bukus, PropelPDO $con = null)
    {
        $bukusToDelete = $this->getBukus(new Criteria(), $con)->diff($bukus);

        $this->bukusScheduledForDeletion = unserialize(serialize($bukusToDelete));

        foreach ($bukusToDelete as $bukuRemoved) {
            $bukuRemoved->setMataPelajaran(null);
        }

        $this->collBukus = null;
        foreach ($bukus as $buku) {
            $this->addBuku($buku);
        }

        $this->collBukus = $bukus;
        $this->collBukusPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Buku objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Buku objects.
     * @throws PropelException
     */
    public function countBukus(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collBukusPartial && !$this->isNew();
        if (null === $this->collBukus || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collBukus) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getBukus());
            }
            $query = BukuQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByMataPelajaran($this)
                ->count($con);
        }

        return count($this->collBukus);
    }

    /**
     * Method called to associate a Buku object to this object
     * through the Buku foreign key attribute.
     *
     * @param    Buku $l Buku
     * @return MataPelajaran The current object (for fluent API support)
     */
    public function addBuku(Buku $l)
    {
        if ($this->collBukus === null) {
            $this->initBukus();
            $this->collBukusPartial = true;
        }
        if (!in_array($l, $this->collBukus->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddBuku($l);
        }

        return $this;
    }

    /**
     * @param	Buku $buku The buku object to add.
     */
    protected function doAddBuku($buku)
    {
        $this->collBukus[]= $buku;
        $buku->setMataPelajaran($this);
    }

    /**
     * @param	Buku $buku The buku object to remove.
     * @return MataPelajaran The current object (for fluent API support)
     */
    public function removeBuku($buku)
    {
        if ($this->getBukus()->contains($buku)) {
            $this->collBukus->remove($this->collBukus->search($buku));
            if (null === $this->bukusScheduledForDeletion) {
                $this->bukusScheduledForDeletion = clone $this->collBukus;
                $this->bukusScheduledForDeletion->clear();
            }
            $this->bukusScheduledForDeletion[]= clone $buku;
            $buku->setMataPelajaran(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this MataPelajaran is new, it will return
     * an empty collection; or if this MataPelajaran has previously
     * been saved, it will retrieve related Bukus from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in MataPelajaran.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Buku[] List of Buku objects
     */
    public function getBukusJoinBiblio($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = BukuQuery::create(null, $criteria);
        $query->joinWith('Biblio', $join_behavior);

        return $this->getBukus($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this MataPelajaran is new, it will return
     * an empty collection; or if this MataPelajaran has previously
     * been saved, it will retrieve related Bukus from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in MataPelajaran.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Buku[] List of Buku objects
     */
    public function getBukusJoinSekolah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = BukuQuery::create(null, $criteria);
        $query->joinWith('Sekolah', $join_behavior);

        return $this->getBukus($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this MataPelajaran is new, it will return
     * an empty collection; or if this MataPelajaran has previously
     * been saved, it will retrieve related Bukus from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in MataPelajaran.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Buku[] List of Buku objects
     */
    public function getBukusJoinTingkatPendidikan($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = BukuQuery::create(null, $criteria);
        $query->joinWith('TingkatPendidikan', $join_behavior);

        return $this->getBukus($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this MataPelajaran is new, it will return
     * an empty collection; or if this MataPelajaran has previously
     * been saved, it will retrieve related Bukus from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in MataPelajaran.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Buku[] List of Buku objects
     */
    public function getBukusJoinJenisHapusBuku($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = BukuQuery::create(null, $criteria);
        $query->joinWith('JenisHapusBuku', $join_behavior);

        return $this->getBukus($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this MataPelajaran is new, it will return
     * an empty collection; or if this MataPelajaran has previously
     * been saved, it will retrieve related Bukus from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in MataPelajaran.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Buku[] List of Buku objects
     */
    public function getBukusJoinRuang($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = BukuQuery::create(null, $criteria);
        $query->joinWith('Ruang', $join_behavior);

        return $this->getBukus($query, $con);
    }

    /**
     * Clears out the collKompetensis collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return MataPelajaran The current object (for fluent API support)
     * @see        addKompetensis()
     */
    public function clearKompetensis()
    {
        $this->collKompetensis = null; // important to set this to null since that means it is uninitialized
        $this->collKompetensisPartial = null;

        return $this;
    }

    /**
     * reset is the collKompetensis collection loaded partially
     *
     * @return void
     */
    public function resetPartialKompetensis($v = true)
    {
        $this->collKompetensisPartial = $v;
    }

    /**
     * Initializes the collKompetensis collection.
     *
     * By default this just sets the collKompetensis collection to an empty array (like clearcollKompetensis());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initKompetensis($overrideExisting = true)
    {
        if (null !== $this->collKompetensis && !$overrideExisting) {
            return;
        }
        $this->collKompetensis = new PropelObjectCollection();
        $this->collKompetensis->setModel('Kompetensi');
    }

    /**
     * Gets an array of Kompetensi objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this MataPelajaran is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Kompetensi[] List of Kompetensi objects
     * @throws PropelException
     */
    public function getKompetensis($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collKompetensisPartial && !$this->isNew();
        if (null === $this->collKompetensis || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collKompetensis) {
                // return empty collection
                $this->initKompetensis();
            } else {
                $collKompetensis = KompetensiQuery::create(null, $criteria)
                    ->filterByMataPelajaran($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collKompetensisPartial && count($collKompetensis)) {
                      $this->initKompetensis(false);

                      foreach($collKompetensis as $obj) {
                        if (false == $this->collKompetensis->contains($obj)) {
                          $this->collKompetensis->append($obj);
                        }
                      }

                      $this->collKompetensisPartial = true;
                    }

                    $collKompetensis->getInternalIterator()->rewind();
                    return $collKompetensis;
                }

                if($partial && $this->collKompetensis) {
                    foreach($this->collKompetensis as $obj) {
                        if($obj->isNew()) {
                            $collKompetensis[] = $obj;
                        }
                    }
                }

                $this->collKompetensis = $collKompetensis;
                $this->collKompetensisPartial = false;
            }
        }

        return $this->collKompetensis;
    }

    /**
     * Sets a collection of Kompetensi objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $kompetensis A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return MataPelajaran The current object (for fluent API support)
     */
    public function setKompetensis(PropelCollection $kompetensis, PropelPDO $con = null)
    {
        $kompetensisToDelete = $this->getKompetensis(new Criteria(), $con)->diff($kompetensis);

        $this->kompetensisScheduledForDeletion = unserialize(serialize($kompetensisToDelete));

        foreach ($kompetensisToDelete as $kompetensiRemoved) {
            $kompetensiRemoved->setMataPelajaran(null);
        }

        $this->collKompetensis = null;
        foreach ($kompetensis as $kompetensi) {
            $this->addKompetensi($kompetensi);
        }

        $this->collKompetensis = $kompetensis;
        $this->collKompetensisPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Kompetensi objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Kompetensi objects.
     * @throws PropelException
     */
    public function countKompetensis(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collKompetensisPartial && !$this->isNew();
        if (null === $this->collKompetensis || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collKompetensis) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getKompetensis());
            }
            $query = KompetensiQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByMataPelajaran($this)
                ->count($con);
        }

        return count($this->collKompetensis);
    }

    /**
     * Method called to associate a Kompetensi object to this object
     * through the Kompetensi foreign key attribute.
     *
     * @param    Kompetensi $l Kompetensi
     * @return MataPelajaran The current object (for fluent API support)
     */
    public function addKompetensi(Kompetensi $l)
    {
        if ($this->collKompetensis === null) {
            $this->initKompetensis();
            $this->collKompetensisPartial = true;
        }
        if (!in_array($l, $this->collKompetensis->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddKompetensi($l);
        }

        return $this;
    }

    /**
     * @param	Kompetensi $kompetensi The kompetensi object to add.
     */
    protected function doAddKompetensi($kompetensi)
    {
        $this->collKompetensis[]= $kompetensi;
        $kompetensi->setMataPelajaran($this);
    }

    /**
     * @param	Kompetensi $kompetensi The kompetensi object to remove.
     * @return MataPelajaran The current object (for fluent API support)
     */
    public function removeKompetensi($kompetensi)
    {
        if ($this->getKompetensis()->contains($kompetensi)) {
            $this->collKompetensis->remove($this->collKompetensis->search($kompetensi));
            if (null === $this->kompetensisScheduledForDeletion) {
                $this->kompetensisScheduledForDeletion = clone $this->collKompetensis;
                $this->kompetensisScheduledForDeletion->clear();
            }
            $this->kompetensisScheduledForDeletion[]= clone $kompetensi;
            $kompetensi->setMataPelajaran(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this MataPelajaran is new, it will return
     * an empty collection; or if this MataPelajaran has previously
     * been saved, it will retrieve related Kompetensis from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in MataPelajaran.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Kompetensi[] List of Kompetensi objects
     */
    public function getKompetensisJoinKompetensiRelatedByIdIntiDasar($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = KompetensiQuery::create(null, $criteria);
        $query->joinWith('KompetensiRelatedByIdIntiDasar', $join_behavior);

        return $this->getKompetensis($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this MataPelajaran is new, it will return
     * an empty collection; or if this MataPelajaran has previously
     * been saved, it will retrieve related Kompetensis from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in MataPelajaran.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Kompetensi[] List of Kompetensi objects
     */
    public function getKompetensisJoinKurikulum($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = KompetensiQuery::create(null, $criteria);
        $query->joinWith('Kurikulum', $join_behavior);

        return $this->getKompetensis($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this MataPelajaran is new, it will return
     * an empty collection; or if this MataPelajaran has previously
     * been saved, it will retrieve related Kompetensis from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in MataPelajaran.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Kompetensi[] List of Kompetensi objects
     */
    public function getKompetensisJoinTingkatPendidikan($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = KompetensiQuery::create(null, $criteria);
        $query->joinWith('TingkatPendidikan', $join_behavior);

        return $this->getKompetensis($query, $con);
    }

    /**
     * Clears out the collMapBidangMataPelajarans collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return MataPelajaran The current object (for fluent API support)
     * @see        addMapBidangMataPelajarans()
     */
    public function clearMapBidangMataPelajarans()
    {
        $this->collMapBidangMataPelajarans = null; // important to set this to null since that means it is uninitialized
        $this->collMapBidangMataPelajaransPartial = null;

        return $this;
    }

    /**
     * reset is the collMapBidangMataPelajarans collection loaded partially
     *
     * @return void
     */
    public function resetPartialMapBidangMataPelajarans($v = true)
    {
        $this->collMapBidangMataPelajaransPartial = $v;
    }

    /**
     * Initializes the collMapBidangMataPelajarans collection.
     *
     * By default this just sets the collMapBidangMataPelajarans collection to an empty array (like clearcollMapBidangMataPelajarans());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initMapBidangMataPelajarans($overrideExisting = true)
    {
        if (null !== $this->collMapBidangMataPelajarans && !$overrideExisting) {
            return;
        }
        $this->collMapBidangMataPelajarans = new PropelObjectCollection();
        $this->collMapBidangMataPelajarans->setModel('MapBidangMataPelajaran');
    }

    /**
     * Gets an array of MapBidangMataPelajaran objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this MataPelajaran is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|MapBidangMataPelajaran[] List of MapBidangMataPelajaran objects
     * @throws PropelException
     */
    public function getMapBidangMataPelajarans($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collMapBidangMataPelajaransPartial && !$this->isNew();
        if (null === $this->collMapBidangMataPelajarans || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collMapBidangMataPelajarans) {
                // return empty collection
                $this->initMapBidangMataPelajarans();
            } else {
                $collMapBidangMataPelajarans = MapBidangMataPelajaranQuery::create(null, $criteria)
                    ->filterByMataPelajaran($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collMapBidangMataPelajaransPartial && count($collMapBidangMataPelajarans)) {
                      $this->initMapBidangMataPelajarans(false);

                      foreach($collMapBidangMataPelajarans as $obj) {
                        if (false == $this->collMapBidangMataPelajarans->contains($obj)) {
                          $this->collMapBidangMataPelajarans->append($obj);
                        }
                      }

                      $this->collMapBidangMataPelajaransPartial = true;
                    }

                    $collMapBidangMataPelajarans->getInternalIterator()->rewind();
                    return $collMapBidangMataPelajarans;
                }

                if($partial && $this->collMapBidangMataPelajarans) {
                    foreach($this->collMapBidangMataPelajarans as $obj) {
                        if($obj->isNew()) {
                            $collMapBidangMataPelajarans[] = $obj;
                        }
                    }
                }

                $this->collMapBidangMataPelajarans = $collMapBidangMataPelajarans;
                $this->collMapBidangMataPelajaransPartial = false;
            }
        }

        return $this->collMapBidangMataPelajarans;
    }

    /**
     * Sets a collection of MapBidangMataPelajaran objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $mapBidangMataPelajarans A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return MataPelajaran The current object (for fluent API support)
     */
    public function setMapBidangMataPelajarans(PropelCollection $mapBidangMataPelajarans, PropelPDO $con = null)
    {
        $mapBidangMataPelajaransToDelete = $this->getMapBidangMataPelajarans(new Criteria(), $con)->diff($mapBidangMataPelajarans);

        $this->mapBidangMataPelajaransScheduledForDeletion = unserialize(serialize($mapBidangMataPelajaransToDelete));

        foreach ($mapBidangMataPelajaransToDelete as $mapBidangMataPelajaranRemoved) {
            $mapBidangMataPelajaranRemoved->setMataPelajaran(null);
        }

        $this->collMapBidangMataPelajarans = null;
        foreach ($mapBidangMataPelajarans as $mapBidangMataPelajaran) {
            $this->addMapBidangMataPelajaran($mapBidangMataPelajaran);
        }

        $this->collMapBidangMataPelajarans = $mapBidangMataPelajarans;
        $this->collMapBidangMataPelajaransPartial = false;

        return $this;
    }

    /**
     * Returns the number of related MapBidangMataPelajaran objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related MapBidangMataPelajaran objects.
     * @throws PropelException
     */
    public function countMapBidangMataPelajarans(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collMapBidangMataPelajaransPartial && !$this->isNew();
        if (null === $this->collMapBidangMataPelajarans || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collMapBidangMataPelajarans) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getMapBidangMataPelajarans());
            }
            $query = MapBidangMataPelajaranQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByMataPelajaran($this)
                ->count($con);
        }

        return count($this->collMapBidangMataPelajarans);
    }

    /**
     * Method called to associate a MapBidangMataPelajaran object to this object
     * through the MapBidangMataPelajaran foreign key attribute.
     *
     * @param    MapBidangMataPelajaran $l MapBidangMataPelajaran
     * @return MataPelajaran The current object (for fluent API support)
     */
    public function addMapBidangMataPelajaran(MapBidangMataPelajaran $l)
    {
        if ($this->collMapBidangMataPelajarans === null) {
            $this->initMapBidangMataPelajarans();
            $this->collMapBidangMataPelajaransPartial = true;
        }
        if (!in_array($l, $this->collMapBidangMataPelajarans->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddMapBidangMataPelajaran($l);
        }

        return $this;
    }

    /**
     * @param	MapBidangMataPelajaran $mapBidangMataPelajaran The mapBidangMataPelajaran object to add.
     */
    protected function doAddMapBidangMataPelajaran($mapBidangMataPelajaran)
    {
        $this->collMapBidangMataPelajarans[]= $mapBidangMataPelajaran;
        $mapBidangMataPelajaran->setMataPelajaran($this);
    }

    /**
     * @param	MapBidangMataPelajaran $mapBidangMataPelajaran The mapBidangMataPelajaran object to remove.
     * @return MataPelajaran The current object (for fluent API support)
     */
    public function removeMapBidangMataPelajaran($mapBidangMataPelajaran)
    {
        if ($this->getMapBidangMataPelajarans()->contains($mapBidangMataPelajaran)) {
            $this->collMapBidangMataPelajarans->remove($this->collMapBidangMataPelajarans->search($mapBidangMataPelajaran));
            if (null === $this->mapBidangMataPelajaransScheduledForDeletion) {
                $this->mapBidangMataPelajaransScheduledForDeletion = clone $this->collMapBidangMataPelajarans;
                $this->mapBidangMataPelajaransScheduledForDeletion->clear();
            }
            $this->mapBidangMataPelajaransScheduledForDeletion[]= clone $mapBidangMataPelajaran;
            $mapBidangMataPelajaran->setMataPelajaran(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this MataPelajaran is new, it will return
     * an empty collection; or if this MataPelajaran has previously
     * been saved, it will retrieve related MapBidangMataPelajarans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in MataPelajaran.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|MapBidangMataPelajaran[] List of MapBidangMataPelajaran objects
     */
    public function getMapBidangMataPelajaransJoinBidangStudi($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = MapBidangMataPelajaranQuery::create(null, $criteria);
        $query->joinWith('BidangStudi', $join_behavior);

        return $this->getMapBidangMataPelajarans($query, $con);
    }

    /**
     * Clears out the collMapelBiblios collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return MataPelajaran The current object (for fluent API support)
     * @see        addMapelBiblios()
     */
    public function clearMapelBiblios()
    {
        $this->collMapelBiblios = null; // important to set this to null since that means it is uninitialized
        $this->collMapelBibliosPartial = null;

        return $this;
    }

    /**
     * reset is the collMapelBiblios collection loaded partially
     *
     * @return void
     */
    public function resetPartialMapelBiblios($v = true)
    {
        $this->collMapelBibliosPartial = $v;
    }

    /**
     * Initializes the collMapelBiblios collection.
     *
     * By default this just sets the collMapelBiblios collection to an empty array (like clearcollMapelBiblios());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initMapelBiblios($overrideExisting = true)
    {
        if (null !== $this->collMapelBiblios && !$overrideExisting) {
            return;
        }
        $this->collMapelBiblios = new PropelObjectCollection();
        $this->collMapelBiblios->setModel('MapelBiblio');
    }

    /**
     * Gets an array of MapelBiblio objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this MataPelajaran is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|MapelBiblio[] List of MapelBiblio objects
     * @throws PropelException
     */
    public function getMapelBiblios($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collMapelBibliosPartial && !$this->isNew();
        if (null === $this->collMapelBiblios || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collMapelBiblios) {
                // return empty collection
                $this->initMapelBiblios();
            } else {
                $collMapelBiblios = MapelBiblioQuery::create(null, $criteria)
                    ->filterByMataPelajaran($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collMapelBibliosPartial && count($collMapelBiblios)) {
                      $this->initMapelBiblios(false);

                      foreach($collMapelBiblios as $obj) {
                        if (false == $this->collMapelBiblios->contains($obj)) {
                          $this->collMapelBiblios->append($obj);
                        }
                      }

                      $this->collMapelBibliosPartial = true;
                    }

                    $collMapelBiblios->getInternalIterator()->rewind();
                    return $collMapelBiblios;
                }

                if($partial && $this->collMapelBiblios) {
                    foreach($this->collMapelBiblios as $obj) {
                        if($obj->isNew()) {
                            $collMapelBiblios[] = $obj;
                        }
                    }
                }

                $this->collMapelBiblios = $collMapelBiblios;
                $this->collMapelBibliosPartial = false;
            }
        }

        return $this->collMapelBiblios;
    }

    /**
     * Sets a collection of MapelBiblio objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $mapelBiblios A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return MataPelajaran The current object (for fluent API support)
     */
    public function setMapelBiblios(PropelCollection $mapelBiblios, PropelPDO $con = null)
    {
        $mapelBibliosToDelete = $this->getMapelBiblios(new Criteria(), $con)->diff($mapelBiblios);

        $this->mapelBibliosScheduledForDeletion = unserialize(serialize($mapelBibliosToDelete));

        foreach ($mapelBibliosToDelete as $mapelBiblioRemoved) {
            $mapelBiblioRemoved->setMataPelajaran(null);
        }

        $this->collMapelBiblios = null;
        foreach ($mapelBiblios as $mapelBiblio) {
            $this->addMapelBiblio($mapelBiblio);
        }

        $this->collMapelBiblios = $mapelBiblios;
        $this->collMapelBibliosPartial = false;

        return $this;
    }

    /**
     * Returns the number of related MapelBiblio objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related MapelBiblio objects.
     * @throws PropelException
     */
    public function countMapelBiblios(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collMapelBibliosPartial && !$this->isNew();
        if (null === $this->collMapelBiblios || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collMapelBiblios) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getMapelBiblios());
            }
            $query = MapelBiblioQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByMataPelajaran($this)
                ->count($con);
        }

        return count($this->collMapelBiblios);
    }

    /**
     * Method called to associate a MapelBiblio object to this object
     * through the MapelBiblio foreign key attribute.
     *
     * @param    MapelBiblio $l MapelBiblio
     * @return MataPelajaran The current object (for fluent API support)
     */
    public function addMapelBiblio(MapelBiblio $l)
    {
        if ($this->collMapelBiblios === null) {
            $this->initMapelBiblios();
            $this->collMapelBibliosPartial = true;
        }
        if (!in_array($l, $this->collMapelBiblios->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddMapelBiblio($l);
        }

        return $this;
    }

    /**
     * @param	MapelBiblio $mapelBiblio The mapelBiblio object to add.
     */
    protected function doAddMapelBiblio($mapelBiblio)
    {
        $this->collMapelBiblios[]= $mapelBiblio;
        $mapelBiblio->setMataPelajaran($this);
    }

    /**
     * @param	MapelBiblio $mapelBiblio The mapelBiblio object to remove.
     * @return MataPelajaran The current object (for fluent API support)
     */
    public function removeMapelBiblio($mapelBiblio)
    {
        if ($this->getMapelBiblios()->contains($mapelBiblio)) {
            $this->collMapelBiblios->remove($this->collMapelBiblios->search($mapelBiblio));
            if (null === $this->mapelBibliosScheduledForDeletion) {
                $this->mapelBibliosScheduledForDeletion = clone $this->collMapelBiblios;
                $this->mapelBibliosScheduledForDeletion->clear();
            }
            $this->mapelBibliosScheduledForDeletion[]= clone $mapelBiblio;
            $mapelBiblio->setMataPelajaran(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this MataPelajaran is new, it will return
     * an empty collection; or if this MataPelajaran has previously
     * been saved, it will retrieve related MapelBiblios from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in MataPelajaran.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|MapelBiblio[] List of MapelBiblio objects
     */
    public function getMapelBibliosJoinBiblio($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = MapelBiblioQuery::create(null, $criteria);
        $query->joinWith('Biblio', $join_behavior);

        return $this->getMapelBiblios($query, $con);
    }

    /**
     * Clears out the collMataPelajaranKurikulums collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return MataPelajaran The current object (for fluent API support)
     * @see        addMataPelajaranKurikulums()
     */
    public function clearMataPelajaranKurikulums()
    {
        $this->collMataPelajaranKurikulums = null; // important to set this to null since that means it is uninitialized
        $this->collMataPelajaranKurikulumsPartial = null;

        return $this;
    }

    /**
     * reset is the collMataPelajaranKurikulums collection loaded partially
     *
     * @return void
     */
    public function resetPartialMataPelajaranKurikulums($v = true)
    {
        $this->collMataPelajaranKurikulumsPartial = $v;
    }

    /**
     * Initializes the collMataPelajaranKurikulums collection.
     *
     * By default this just sets the collMataPelajaranKurikulums collection to an empty array (like clearcollMataPelajaranKurikulums());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initMataPelajaranKurikulums($overrideExisting = true)
    {
        if (null !== $this->collMataPelajaranKurikulums && !$overrideExisting) {
            return;
        }
        $this->collMataPelajaranKurikulums = new PropelObjectCollection();
        $this->collMataPelajaranKurikulums->setModel('MataPelajaranKurikulum');
    }

    /**
     * Gets an array of MataPelajaranKurikulum objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this MataPelajaran is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|MataPelajaranKurikulum[] List of MataPelajaranKurikulum objects
     * @throws PropelException
     */
    public function getMataPelajaranKurikulums($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collMataPelajaranKurikulumsPartial && !$this->isNew();
        if (null === $this->collMataPelajaranKurikulums || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collMataPelajaranKurikulums) {
                // return empty collection
                $this->initMataPelajaranKurikulums();
            } else {
                $collMataPelajaranKurikulums = MataPelajaranKurikulumQuery::create(null, $criteria)
                    ->filterByMataPelajaran($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collMataPelajaranKurikulumsPartial && count($collMataPelajaranKurikulums)) {
                      $this->initMataPelajaranKurikulums(false);

                      foreach($collMataPelajaranKurikulums as $obj) {
                        if (false == $this->collMataPelajaranKurikulums->contains($obj)) {
                          $this->collMataPelajaranKurikulums->append($obj);
                        }
                      }

                      $this->collMataPelajaranKurikulumsPartial = true;
                    }

                    $collMataPelajaranKurikulums->getInternalIterator()->rewind();
                    return $collMataPelajaranKurikulums;
                }

                if($partial && $this->collMataPelajaranKurikulums) {
                    foreach($this->collMataPelajaranKurikulums as $obj) {
                        if($obj->isNew()) {
                            $collMataPelajaranKurikulums[] = $obj;
                        }
                    }
                }

                $this->collMataPelajaranKurikulums = $collMataPelajaranKurikulums;
                $this->collMataPelajaranKurikulumsPartial = false;
            }
        }

        return $this->collMataPelajaranKurikulums;
    }

    /**
     * Sets a collection of MataPelajaranKurikulum objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $mataPelajaranKurikulums A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return MataPelajaran The current object (for fluent API support)
     */
    public function setMataPelajaranKurikulums(PropelCollection $mataPelajaranKurikulums, PropelPDO $con = null)
    {
        $mataPelajaranKurikulumsToDelete = $this->getMataPelajaranKurikulums(new Criteria(), $con)->diff($mataPelajaranKurikulums);

        $this->mataPelajaranKurikulumsScheduledForDeletion = unserialize(serialize($mataPelajaranKurikulumsToDelete));

        foreach ($mataPelajaranKurikulumsToDelete as $mataPelajaranKurikulumRemoved) {
            $mataPelajaranKurikulumRemoved->setMataPelajaran(null);
        }

        $this->collMataPelajaranKurikulums = null;
        foreach ($mataPelajaranKurikulums as $mataPelajaranKurikulum) {
            $this->addMataPelajaranKurikulum($mataPelajaranKurikulum);
        }

        $this->collMataPelajaranKurikulums = $mataPelajaranKurikulums;
        $this->collMataPelajaranKurikulumsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related MataPelajaranKurikulum objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related MataPelajaranKurikulum objects.
     * @throws PropelException
     */
    public function countMataPelajaranKurikulums(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collMataPelajaranKurikulumsPartial && !$this->isNew();
        if (null === $this->collMataPelajaranKurikulums || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collMataPelajaranKurikulums) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getMataPelajaranKurikulums());
            }
            $query = MataPelajaranKurikulumQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByMataPelajaran($this)
                ->count($con);
        }

        return count($this->collMataPelajaranKurikulums);
    }

    /**
     * Method called to associate a MataPelajaranKurikulum object to this object
     * through the MataPelajaranKurikulum foreign key attribute.
     *
     * @param    MataPelajaranKurikulum $l MataPelajaranKurikulum
     * @return MataPelajaran The current object (for fluent API support)
     */
    public function addMataPelajaranKurikulum(MataPelajaranKurikulum $l)
    {
        if ($this->collMataPelajaranKurikulums === null) {
            $this->initMataPelajaranKurikulums();
            $this->collMataPelajaranKurikulumsPartial = true;
        }
        if (!in_array($l, $this->collMataPelajaranKurikulums->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddMataPelajaranKurikulum($l);
        }

        return $this;
    }

    /**
     * @param	MataPelajaranKurikulum $mataPelajaranKurikulum The mataPelajaranKurikulum object to add.
     */
    protected function doAddMataPelajaranKurikulum($mataPelajaranKurikulum)
    {
        $this->collMataPelajaranKurikulums[]= $mataPelajaranKurikulum;
        $mataPelajaranKurikulum->setMataPelajaran($this);
    }

    /**
     * @param	MataPelajaranKurikulum $mataPelajaranKurikulum The mataPelajaranKurikulum object to remove.
     * @return MataPelajaran The current object (for fluent API support)
     */
    public function removeMataPelajaranKurikulum($mataPelajaranKurikulum)
    {
        if ($this->getMataPelajaranKurikulums()->contains($mataPelajaranKurikulum)) {
            $this->collMataPelajaranKurikulums->remove($this->collMataPelajaranKurikulums->search($mataPelajaranKurikulum));
            if (null === $this->mataPelajaranKurikulumsScheduledForDeletion) {
                $this->mataPelajaranKurikulumsScheduledForDeletion = clone $this->collMataPelajaranKurikulums;
                $this->mataPelajaranKurikulumsScheduledForDeletion->clear();
            }
            $this->mataPelajaranKurikulumsScheduledForDeletion[]= clone $mataPelajaranKurikulum;
            $mataPelajaranKurikulum->setMataPelajaran(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this MataPelajaran is new, it will return
     * an empty collection; or if this MataPelajaran has previously
     * been saved, it will retrieve related MataPelajaranKurikulums from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in MataPelajaran.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|MataPelajaranKurikulum[] List of MataPelajaranKurikulum objects
     */
    public function getMataPelajaranKurikulumsJoinGroupMatpel($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = MataPelajaranKurikulumQuery::create(null, $criteria);
        $query->joinWith('GroupMatpel', $join_behavior);

        return $this->getMataPelajaranKurikulums($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this MataPelajaran is new, it will return
     * an empty collection; or if this MataPelajaran has previously
     * been saved, it will retrieve related MataPelajaranKurikulums from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in MataPelajaran.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|MataPelajaranKurikulum[] List of MataPelajaranKurikulum objects
     */
    public function getMataPelajaranKurikulumsJoinKurikulum($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = MataPelajaranKurikulumQuery::create(null, $criteria);
        $query->joinWith('Kurikulum', $join_behavior);

        return $this->getMataPelajaranKurikulums($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this MataPelajaran is new, it will return
     * an empty collection; or if this MataPelajaran has previously
     * been saved, it will retrieve related MataPelajaranKurikulums from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in MataPelajaran.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|MataPelajaranKurikulum[] List of MataPelajaranKurikulum objects
     */
    public function getMataPelajaranKurikulumsJoinTingkatPendidikan($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = MataPelajaranKurikulumQuery::create(null, $criteria);
        $query->joinWith('TingkatPendidikan', $join_behavior);

        return $this->getMataPelajaranKurikulums($query, $con);
    }

    /**
     * Clears out the collMatevRapors collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return MataPelajaran The current object (for fluent API support)
     * @see        addMatevRapors()
     */
    public function clearMatevRapors()
    {
        $this->collMatevRapors = null; // important to set this to null since that means it is uninitialized
        $this->collMatevRaporsPartial = null;

        return $this;
    }

    /**
     * reset is the collMatevRapors collection loaded partially
     *
     * @return void
     */
    public function resetPartialMatevRapors($v = true)
    {
        $this->collMatevRaporsPartial = $v;
    }

    /**
     * Initializes the collMatevRapors collection.
     *
     * By default this just sets the collMatevRapors collection to an empty array (like clearcollMatevRapors());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initMatevRapors($overrideExisting = true)
    {
        if (null !== $this->collMatevRapors && !$overrideExisting) {
            return;
        }
        $this->collMatevRapors = new PropelObjectCollection();
        $this->collMatevRapors->setModel('MatevRapor');
    }

    /**
     * Gets an array of MatevRapor objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this MataPelajaran is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|MatevRapor[] List of MatevRapor objects
     * @throws PropelException
     */
    public function getMatevRapors($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collMatevRaporsPartial && !$this->isNew();
        if (null === $this->collMatevRapors || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collMatevRapors) {
                // return empty collection
                $this->initMatevRapors();
            } else {
                $collMatevRapors = MatevRaporQuery::create(null, $criteria)
                    ->filterByMataPelajaran($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collMatevRaporsPartial && count($collMatevRapors)) {
                      $this->initMatevRapors(false);

                      foreach($collMatevRapors as $obj) {
                        if (false == $this->collMatevRapors->contains($obj)) {
                          $this->collMatevRapors->append($obj);
                        }
                      }

                      $this->collMatevRaporsPartial = true;
                    }

                    $collMatevRapors->getInternalIterator()->rewind();
                    return $collMatevRapors;
                }

                if($partial && $this->collMatevRapors) {
                    foreach($this->collMatevRapors as $obj) {
                        if($obj->isNew()) {
                            $collMatevRapors[] = $obj;
                        }
                    }
                }

                $this->collMatevRapors = $collMatevRapors;
                $this->collMatevRaporsPartial = false;
            }
        }

        return $this->collMatevRapors;
    }

    /**
     * Sets a collection of MatevRapor objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $matevRapors A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return MataPelajaran The current object (for fluent API support)
     */
    public function setMatevRapors(PropelCollection $matevRapors, PropelPDO $con = null)
    {
        $matevRaporsToDelete = $this->getMatevRapors(new Criteria(), $con)->diff($matevRapors);

        $this->matevRaporsScheduledForDeletion = unserialize(serialize($matevRaporsToDelete));

        foreach ($matevRaporsToDelete as $matevRaporRemoved) {
            $matevRaporRemoved->setMataPelajaran(null);
        }

        $this->collMatevRapors = null;
        foreach ($matevRapors as $matevRapor) {
            $this->addMatevRapor($matevRapor);
        }

        $this->collMatevRapors = $matevRapors;
        $this->collMatevRaporsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related MatevRapor objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related MatevRapor objects.
     * @throws PropelException
     */
    public function countMatevRapors(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collMatevRaporsPartial && !$this->isNew();
        if (null === $this->collMatevRapors || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collMatevRapors) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getMatevRapors());
            }
            $query = MatevRaporQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByMataPelajaran($this)
                ->count($con);
        }

        return count($this->collMatevRapors);
    }

    /**
     * Method called to associate a MatevRapor object to this object
     * through the MatevRapor foreign key attribute.
     *
     * @param    MatevRapor $l MatevRapor
     * @return MataPelajaran The current object (for fluent API support)
     */
    public function addMatevRapor(MatevRapor $l)
    {
        if ($this->collMatevRapors === null) {
            $this->initMatevRapors();
            $this->collMatevRaporsPartial = true;
        }
        if (!in_array($l, $this->collMatevRapors->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddMatevRapor($l);
        }

        return $this;
    }

    /**
     * @param	MatevRapor $matevRapor The matevRapor object to add.
     */
    protected function doAddMatevRapor($matevRapor)
    {
        $this->collMatevRapors[]= $matevRapor;
        $matevRapor->setMataPelajaran($this);
    }

    /**
     * @param	MatevRapor $matevRapor The matevRapor object to remove.
     * @return MataPelajaran The current object (for fluent API support)
     */
    public function removeMatevRapor($matevRapor)
    {
        if ($this->getMatevRapors()->contains($matevRapor)) {
            $this->collMatevRapors->remove($this->collMatevRapors->search($matevRapor));
            if (null === $this->matevRaporsScheduledForDeletion) {
                $this->matevRaporsScheduledForDeletion = clone $this->collMatevRapors;
                $this->matevRaporsScheduledForDeletion->clear();
            }
            $this->matevRaporsScheduledForDeletion[]= clone $matevRapor;
            $matevRapor->setMataPelajaran(null);
        }

        return $this;
    }

    /**
     * Clears out the collMuloks collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return MataPelajaran The current object (for fluent API support)
     * @see        addMuloks()
     */
    public function clearMuloks()
    {
        $this->collMuloks = null; // important to set this to null since that means it is uninitialized
        $this->collMuloksPartial = null;

        return $this;
    }

    /**
     * reset is the collMuloks collection loaded partially
     *
     * @return void
     */
    public function resetPartialMuloks($v = true)
    {
        $this->collMuloksPartial = $v;
    }

    /**
     * Initializes the collMuloks collection.
     *
     * By default this just sets the collMuloks collection to an empty array (like clearcollMuloks());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initMuloks($overrideExisting = true)
    {
        if (null !== $this->collMuloks && !$overrideExisting) {
            return;
        }
        $this->collMuloks = new PropelObjectCollection();
        $this->collMuloks->setModel('Mulok');
    }

    /**
     * Gets an array of Mulok objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this MataPelajaran is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Mulok[] List of Mulok objects
     * @throws PropelException
     */
    public function getMuloks($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collMuloksPartial && !$this->isNew();
        if (null === $this->collMuloks || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collMuloks) {
                // return empty collection
                $this->initMuloks();
            } else {
                $collMuloks = MulokQuery::create(null, $criteria)
                    ->filterByMataPelajaran($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collMuloksPartial && count($collMuloks)) {
                      $this->initMuloks(false);

                      foreach($collMuloks as $obj) {
                        if (false == $this->collMuloks->contains($obj)) {
                          $this->collMuloks->append($obj);
                        }
                      }

                      $this->collMuloksPartial = true;
                    }

                    $collMuloks->getInternalIterator()->rewind();
                    return $collMuloks;
                }

                if($partial && $this->collMuloks) {
                    foreach($this->collMuloks as $obj) {
                        if($obj->isNew()) {
                            $collMuloks[] = $obj;
                        }
                    }
                }

                $this->collMuloks = $collMuloks;
                $this->collMuloksPartial = false;
            }
        }

        return $this->collMuloks;
    }

    /**
     * Sets a collection of Mulok objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $muloks A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return MataPelajaran The current object (for fluent API support)
     */
    public function setMuloks(PropelCollection $muloks, PropelPDO $con = null)
    {
        $muloksToDelete = $this->getMuloks(new Criteria(), $con)->diff($muloks);

        $this->muloksScheduledForDeletion = unserialize(serialize($muloksToDelete));

        foreach ($muloksToDelete as $mulokRemoved) {
            $mulokRemoved->setMataPelajaran(null);
        }

        $this->collMuloks = null;
        foreach ($muloks as $mulok) {
            $this->addMulok($mulok);
        }

        $this->collMuloks = $muloks;
        $this->collMuloksPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Mulok objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Mulok objects.
     * @throws PropelException
     */
    public function countMuloks(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collMuloksPartial && !$this->isNew();
        if (null === $this->collMuloks || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collMuloks) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getMuloks());
            }
            $query = MulokQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByMataPelajaran($this)
                ->count($con);
        }

        return count($this->collMuloks);
    }

    /**
     * Method called to associate a Mulok object to this object
     * through the Mulok foreign key attribute.
     *
     * @param    Mulok $l Mulok
     * @return MataPelajaran The current object (for fluent API support)
     */
    public function addMulok(Mulok $l)
    {
        if ($this->collMuloks === null) {
            $this->initMuloks();
            $this->collMuloksPartial = true;
        }
        if (!in_array($l, $this->collMuloks->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddMulok($l);
        }

        return $this;
    }

    /**
     * @param	Mulok $mulok The mulok object to add.
     */
    protected function doAddMulok($mulok)
    {
        $this->collMuloks[]= $mulok;
        $mulok->setMataPelajaran($this);
    }

    /**
     * @param	Mulok $mulok The mulok object to remove.
     * @return MataPelajaran The current object (for fluent API support)
     */
    public function removeMulok($mulok)
    {
        if ($this->getMuloks()->contains($mulok)) {
            $this->collMuloks->remove($this->collMuloks->search($mulok));
            if (null === $this->muloksScheduledForDeletion) {
                $this->muloksScheduledForDeletion = clone $this->collMuloks;
                $this->muloksScheduledForDeletion->clear();
            }
            $this->muloksScheduledForDeletion[]= clone $mulok;
            $mulok->setMataPelajaran(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this MataPelajaran is new, it will return
     * an empty collection; or if this MataPelajaran has previously
     * been saved, it will retrieve related Muloks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in MataPelajaran.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Mulok[] List of Mulok objects
     */
    public function getMuloksJoinMstWilayah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = MulokQuery::create(null, $criteria);
        $query->joinWith('MstWilayah', $join_behavior);

        return $this->getMuloks($query, $con);
    }

    /**
     * Clears out the collPembelajarans collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return MataPelajaran The current object (for fluent API support)
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
     * If this MataPelajaran is new, it will return
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
                    ->filterByMataPelajaran($this)
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
     * @return MataPelajaran The current object (for fluent API support)
     */
    public function setPembelajarans(PropelCollection $pembelajarans, PropelPDO $con = null)
    {
        $pembelajaransToDelete = $this->getPembelajarans(new Criteria(), $con)->diff($pembelajarans);

        $this->pembelajaransScheduledForDeletion = unserialize(serialize($pembelajaransToDelete));

        foreach ($pembelajaransToDelete as $pembelajaranRemoved) {
            $pembelajaranRemoved->setMataPelajaran(null);
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
                ->filterByMataPelajaran($this)
                ->count($con);
        }

        return count($this->collPembelajarans);
    }

    /**
     * Method called to associate a Pembelajaran object to this object
     * through the Pembelajaran foreign key attribute.
     *
     * @param    Pembelajaran $l Pembelajaran
     * @return MataPelajaran The current object (for fluent API support)
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
        $pembelajaran->setMataPelajaran($this);
    }

    /**
     * @param	Pembelajaran $pembelajaran The pembelajaran object to remove.
     * @return MataPelajaran The current object (for fluent API support)
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
            $pembelajaran->setMataPelajaran(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this MataPelajaran is new, it will return
     * an empty collection; or if this MataPelajaran has previously
     * been saved, it will retrieve related Pembelajarans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in MataPelajaran.
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
     * Otherwise if this MataPelajaran is new, it will return
     * an empty collection; or if this MataPelajaran has previously
     * been saved, it will retrieve related Pembelajarans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in MataPelajaran.
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
     * Otherwise if this MataPelajaran is new, it will return
     * an empty collection; or if this MataPelajaran has previously
     * been saved, it will retrieve related Pembelajarans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in MataPelajaran.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Pembelajaran[] List of Pembelajaran objects
     */
    public function getPembelajaransJoinSemester($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PembelajaranQuery::create(null, $criteria);
        $query->joinWith('Semester', $join_behavior);

        return $this->getPembelajarans($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this MataPelajaran is new, it will return
     * an empty collection; or if this MataPelajaran has previously
     * been saved, it will retrieve related Pembelajarans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in MataPelajaran.
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
     * Clears out the collPengawasTerdaftars collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return MataPelajaran The current object (for fluent API support)
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
     * If this MataPelajaran is new, it will return
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
                    ->filterByMataPelajaran($this)
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
     * @return MataPelajaran The current object (for fluent API support)
     */
    public function setPengawasTerdaftars(PropelCollection $pengawasTerdaftars, PropelPDO $con = null)
    {
        $pengawasTerdaftarsToDelete = $this->getPengawasTerdaftars(new Criteria(), $con)->diff($pengawasTerdaftars);

        $this->pengawasTerdaftarsScheduledForDeletion = unserialize(serialize($pengawasTerdaftarsToDelete));

        foreach ($pengawasTerdaftarsToDelete as $pengawasTerdaftarRemoved) {
            $pengawasTerdaftarRemoved->setMataPelajaran(null);
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
                ->filterByMataPelajaran($this)
                ->count($con);
        }

        return count($this->collPengawasTerdaftars);
    }

    /**
     * Method called to associate a PengawasTerdaftar object to this object
     * through the PengawasTerdaftar foreign key attribute.
     *
     * @param    PengawasTerdaftar $l PengawasTerdaftar
     * @return MataPelajaran The current object (for fluent API support)
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
        $pengawasTerdaftar->setMataPelajaran($this);
    }

    /**
     * @param	PengawasTerdaftar $pengawasTerdaftar The pengawasTerdaftar object to remove.
     * @return MataPelajaran The current object (for fluent API support)
     */
    public function removePengawasTerdaftar($pengawasTerdaftar)
    {
        if ($this->getPengawasTerdaftars()->contains($pengawasTerdaftar)) {
            $this->collPengawasTerdaftars->remove($this->collPengawasTerdaftars->search($pengawasTerdaftar));
            if (null === $this->pengawasTerdaftarsScheduledForDeletion) {
                $this->pengawasTerdaftarsScheduledForDeletion = clone $this->collPengawasTerdaftars;
                $this->pengawasTerdaftarsScheduledForDeletion->clear();
            }
            $this->pengawasTerdaftarsScheduledForDeletion[]= $pengawasTerdaftar;
            $pengawasTerdaftar->setMataPelajaran(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this MataPelajaran is new, it will return
     * an empty collection; or if this MataPelajaran has previously
     * been saved, it will retrieve related PengawasTerdaftars from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in MataPelajaran.
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
     * Otherwise if this MataPelajaran is new, it will return
     * an empty collection; or if this MataPelajaran has previously
     * been saved, it will retrieve related PengawasTerdaftars from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in MataPelajaran.
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
     * Otherwise if this MataPelajaran is new, it will return
     * an empty collection; or if this MataPelajaran has previously
     * been saved, it will retrieve related PengawasTerdaftars from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in MataPelajaran.
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
     * Otherwise if this MataPelajaran is new, it will return
     * an empty collection; or if this MataPelajaran has previously
     * been saved, it will retrieve related PengawasTerdaftars from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in MataPelajaran.
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
     * Otherwise if this MataPelajaran is new, it will return
     * an empty collection; or if this MataPelajaran has previously
     * been saved, it will retrieve related PengawasTerdaftars from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in MataPelajaran.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PengawasTerdaftar[] List of PengawasTerdaftar objects
     */
    public function getPengawasTerdaftarsJoinTahunAjaran($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PengawasTerdaftarQuery::create(null, $criteria);
        $query->joinWith('TahunAjaran', $join_behavior);

        return $this->getPengawasTerdaftars($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this MataPelajaran is new, it will return
     * an empty collection; or if this MataPelajaran has previously
     * been saved, it will retrieve related PengawasTerdaftars from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in MataPelajaran.
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
     * Clears out the collTemplateRapors collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return MataPelajaran The current object (for fluent API support)
     * @see        addTemplateRapors()
     */
    public function clearTemplateRapors()
    {
        $this->collTemplateRapors = null; // important to set this to null since that means it is uninitialized
        $this->collTemplateRaporsPartial = null;

        return $this;
    }

    /**
     * reset is the collTemplateRapors collection loaded partially
     *
     * @return void
     */
    public function resetPartialTemplateRapors($v = true)
    {
        $this->collTemplateRaporsPartial = $v;
    }

    /**
     * Initializes the collTemplateRapors collection.
     *
     * By default this just sets the collTemplateRapors collection to an empty array (like clearcollTemplateRapors());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initTemplateRapors($overrideExisting = true)
    {
        if (null !== $this->collTemplateRapors && !$overrideExisting) {
            return;
        }
        $this->collTemplateRapors = new PropelObjectCollection();
        $this->collTemplateRapors->setModel('TemplateRapor');
    }

    /**
     * Gets an array of TemplateRapor objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this MataPelajaran is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|TemplateRapor[] List of TemplateRapor objects
     * @throws PropelException
     */
    public function getTemplateRapors($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collTemplateRaporsPartial && !$this->isNew();
        if (null === $this->collTemplateRapors || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collTemplateRapors) {
                // return empty collection
                $this->initTemplateRapors();
            } else {
                $collTemplateRapors = TemplateRaporQuery::create(null, $criteria)
                    ->filterByMataPelajaran($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collTemplateRaporsPartial && count($collTemplateRapors)) {
                      $this->initTemplateRapors(false);

                      foreach($collTemplateRapors as $obj) {
                        if (false == $this->collTemplateRapors->contains($obj)) {
                          $this->collTemplateRapors->append($obj);
                        }
                      }

                      $this->collTemplateRaporsPartial = true;
                    }

                    $collTemplateRapors->getInternalIterator()->rewind();
                    return $collTemplateRapors;
                }

                if($partial && $this->collTemplateRapors) {
                    foreach($this->collTemplateRapors as $obj) {
                        if($obj->isNew()) {
                            $collTemplateRapors[] = $obj;
                        }
                    }
                }

                $this->collTemplateRapors = $collTemplateRapors;
                $this->collTemplateRaporsPartial = false;
            }
        }

        return $this->collTemplateRapors;
    }

    /**
     * Sets a collection of TemplateRapor objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $templateRapors A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return MataPelajaran The current object (for fluent API support)
     */
    public function setTemplateRapors(PropelCollection $templateRapors, PropelPDO $con = null)
    {
        $templateRaporsToDelete = $this->getTemplateRapors(new Criteria(), $con)->diff($templateRapors);

        $this->templateRaporsScheduledForDeletion = unserialize(serialize($templateRaporsToDelete));

        foreach ($templateRaporsToDelete as $templateRaporRemoved) {
            $templateRaporRemoved->setMataPelajaran(null);
        }

        $this->collTemplateRapors = null;
        foreach ($templateRapors as $templateRapor) {
            $this->addTemplateRapor($templateRapor);
        }

        $this->collTemplateRapors = $templateRapors;
        $this->collTemplateRaporsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related TemplateRapor objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related TemplateRapor objects.
     * @throws PropelException
     */
    public function countTemplateRapors(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collTemplateRaporsPartial && !$this->isNew();
        if (null === $this->collTemplateRapors || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collTemplateRapors) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getTemplateRapors());
            }
            $query = TemplateRaporQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByMataPelajaran($this)
                ->count($con);
        }

        return count($this->collTemplateRapors);
    }

    /**
     * Method called to associate a TemplateRapor object to this object
     * through the TemplateRapor foreign key attribute.
     *
     * @param    TemplateRapor $l TemplateRapor
     * @return MataPelajaran The current object (for fluent API support)
     */
    public function addTemplateRapor(TemplateRapor $l)
    {
        if ($this->collTemplateRapors === null) {
            $this->initTemplateRapors();
            $this->collTemplateRaporsPartial = true;
        }
        if (!in_array($l, $this->collTemplateRapors->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddTemplateRapor($l);
        }

        return $this;
    }

    /**
     * @param	TemplateRapor $templateRapor The templateRapor object to add.
     */
    protected function doAddTemplateRapor($templateRapor)
    {
        $this->collTemplateRapors[]= $templateRapor;
        $templateRapor->setMataPelajaran($this);
    }

    /**
     * @param	TemplateRapor $templateRapor The templateRapor object to remove.
     * @return MataPelajaran The current object (for fluent API support)
     */
    public function removeTemplateRapor($templateRapor)
    {
        if ($this->getTemplateRapors()->contains($templateRapor)) {
            $this->collTemplateRapors->remove($this->collTemplateRapors->search($templateRapor));
            if (null === $this->templateRaporsScheduledForDeletion) {
                $this->templateRaporsScheduledForDeletion = clone $this->collTemplateRapors;
                $this->templateRaporsScheduledForDeletion->clear();
            }
            $this->templateRaporsScheduledForDeletion[]= clone $templateRapor;
            $templateRapor->setMataPelajaran(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this MataPelajaran is new, it will return
     * an empty collection; or if this MataPelajaran has previously
     * been saved, it will retrieve related TemplateRapors from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in MataPelajaran.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|TemplateRapor[] List of TemplateRapor objects
     */
    public function getTemplateRaporsJoinTemplateUn($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TemplateRaporQuery::create(null, $criteria);
        $query->joinWith('TemplateUn', $join_behavior);

        return $this->getTemplateRapors($query, $con);
    }

    /**
     * Clears out the collTemplateUnsRelatedByMp3Id collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return MataPelajaran The current object (for fluent API support)
     * @see        addTemplateUnsRelatedByMp3Id()
     */
    public function clearTemplateUnsRelatedByMp3Id()
    {
        $this->collTemplateUnsRelatedByMp3Id = null; // important to set this to null since that means it is uninitialized
        $this->collTemplateUnsRelatedByMp3IdPartial = null;

        return $this;
    }

    /**
     * reset is the collTemplateUnsRelatedByMp3Id collection loaded partially
     *
     * @return void
     */
    public function resetPartialTemplateUnsRelatedByMp3Id($v = true)
    {
        $this->collTemplateUnsRelatedByMp3IdPartial = $v;
    }

    /**
     * Initializes the collTemplateUnsRelatedByMp3Id collection.
     *
     * By default this just sets the collTemplateUnsRelatedByMp3Id collection to an empty array (like clearcollTemplateUnsRelatedByMp3Id());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initTemplateUnsRelatedByMp3Id($overrideExisting = true)
    {
        if (null !== $this->collTemplateUnsRelatedByMp3Id && !$overrideExisting) {
            return;
        }
        $this->collTemplateUnsRelatedByMp3Id = new PropelObjectCollection();
        $this->collTemplateUnsRelatedByMp3Id->setModel('TemplateUn');
    }

    /**
     * Gets an array of TemplateUn objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this MataPelajaran is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|TemplateUn[] List of TemplateUn objects
     * @throws PropelException
     */
    public function getTemplateUnsRelatedByMp3Id($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collTemplateUnsRelatedByMp3IdPartial && !$this->isNew();
        if (null === $this->collTemplateUnsRelatedByMp3Id || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collTemplateUnsRelatedByMp3Id) {
                // return empty collection
                $this->initTemplateUnsRelatedByMp3Id();
            } else {
                $collTemplateUnsRelatedByMp3Id = TemplateUnQuery::create(null, $criteria)
                    ->filterByMataPelajaranRelatedByMp3Id($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collTemplateUnsRelatedByMp3IdPartial && count($collTemplateUnsRelatedByMp3Id)) {
                      $this->initTemplateUnsRelatedByMp3Id(false);

                      foreach($collTemplateUnsRelatedByMp3Id as $obj) {
                        if (false == $this->collTemplateUnsRelatedByMp3Id->contains($obj)) {
                          $this->collTemplateUnsRelatedByMp3Id->append($obj);
                        }
                      }

                      $this->collTemplateUnsRelatedByMp3IdPartial = true;
                    }

                    $collTemplateUnsRelatedByMp3Id->getInternalIterator()->rewind();
                    return $collTemplateUnsRelatedByMp3Id;
                }

                if($partial && $this->collTemplateUnsRelatedByMp3Id) {
                    foreach($this->collTemplateUnsRelatedByMp3Id as $obj) {
                        if($obj->isNew()) {
                            $collTemplateUnsRelatedByMp3Id[] = $obj;
                        }
                    }
                }

                $this->collTemplateUnsRelatedByMp3Id = $collTemplateUnsRelatedByMp3Id;
                $this->collTemplateUnsRelatedByMp3IdPartial = false;
            }
        }

        return $this->collTemplateUnsRelatedByMp3Id;
    }

    /**
     * Sets a collection of TemplateUnRelatedByMp3Id objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $templateUnsRelatedByMp3Id A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return MataPelajaran The current object (for fluent API support)
     */
    public function setTemplateUnsRelatedByMp3Id(PropelCollection $templateUnsRelatedByMp3Id, PropelPDO $con = null)
    {
        $templateUnsRelatedByMp3IdToDelete = $this->getTemplateUnsRelatedByMp3Id(new Criteria(), $con)->diff($templateUnsRelatedByMp3Id);

        $this->templateUnsRelatedByMp3IdScheduledForDeletion = unserialize(serialize($templateUnsRelatedByMp3IdToDelete));

        foreach ($templateUnsRelatedByMp3IdToDelete as $templateUnRelatedByMp3IdRemoved) {
            $templateUnRelatedByMp3IdRemoved->setMataPelajaranRelatedByMp3Id(null);
        }

        $this->collTemplateUnsRelatedByMp3Id = null;
        foreach ($templateUnsRelatedByMp3Id as $templateUnRelatedByMp3Id) {
            $this->addTemplateUnRelatedByMp3Id($templateUnRelatedByMp3Id);
        }

        $this->collTemplateUnsRelatedByMp3Id = $templateUnsRelatedByMp3Id;
        $this->collTemplateUnsRelatedByMp3IdPartial = false;

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
    public function countTemplateUnsRelatedByMp3Id(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collTemplateUnsRelatedByMp3IdPartial && !$this->isNew();
        if (null === $this->collTemplateUnsRelatedByMp3Id || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collTemplateUnsRelatedByMp3Id) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getTemplateUnsRelatedByMp3Id());
            }
            $query = TemplateUnQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByMataPelajaranRelatedByMp3Id($this)
                ->count($con);
        }

        return count($this->collTemplateUnsRelatedByMp3Id);
    }

    /**
     * Method called to associate a TemplateUn object to this object
     * through the TemplateUn foreign key attribute.
     *
     * @param    TemplateUn $l TemplateUn
     * @return MataPelajaran The current object (for fluent API support)
     */
    public function addTemplateUnRelatedByMp3Id(TemplateUn $l)
    {
        if ($this->collTemplateUnsRelatedByMp3Id === null) {
            $this->initTemplateUnsRelatedByMp3Id();
            $this->collTemplateUnsRelatedByMp3IdPartial = true;
        }
        if (!in_array($l, $this->collTemplateUnsRelatedByMp3Id->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddTemplateUnRelatedByMp3Id($l);
        }

        return $this;
    }

    /**
     * @param	TemplateUnRelatedByMp3Id $templateUnRelatedByMp3Id The templateUnRelatedByMp3Id object to add.
     */
    protected function doAddTemplateUnRelatedByMp3Id($templateUnRelatedByMp3Id)
    {
        $this->collTemplateUnsRelatedByMp3Id[]= $templateUnRelatedByMp3Id;
        $templateUnRelatedByMp3Id->setMataPelajaranRelatedByMp3Id($this);
    }

    /**
     * @param	TemplateUnRelatedByMp3Id $templateUnRelatedByMp3Id The templateUnRelatedByMp3Id object to remove.
     * @return MataPelajaran The current object (for fluent API support)
     */
    public function removeTemplateUnRelatedByMp3Id($templateUnRelatedByMp3Id)
    {
        if ($this->getTemplateUnsRelatedByMp3Id()->contains($templateUnRelatedByMp3Id)) {
            $this->collTemplateUnsRelatedByMp3Id->remove($this->collTemplateUnsRelatedByMp3Id->search($templateUnRelatedByMp3Id));
            if (null === $this->templateUnsRelatedByMp3IdScheduledForDeletion) {
                $this->templateUnsRelatedByMp3IdScheduledForDeletion = clone $this->collTemplateUnsRelatedByMp3Id;
                $this->templateUnsRelatedByMp3IdScheduledForDeletion->clear();
            }
            $this->templateUnsRelatedByMp3IdScheduledForDeletion[]= $templateUnRelatedByMp3Id;
            $templateUnRelatedByMp3Id->setMataPelajaranRelatedByMp3Id(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this MataPelajaran is new, it will return
     * an empty collection; or if this MataPelajaran has previously
     * been saved, it will retrieve related TemplateUnsRelatedByMp3Id from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in MataPelajaran.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|TemplateUn[] List of TemplateUn objects
     */
    public function getTemplateUnsRelatedByMp3IdJoinJenjangPendidikan($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TemplateUnQuery::create(null, $criteria);
        $query->joinWith('JenjangPendidikan', $join_behavior);

        return $this->getTemplateUnsRelatedByMp3Id($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this MataPelajaran is new, it will return
     * an empty collection; or if this MataPelajaran has previously
     * been saved, it will retrieve related TemplateUnsRelatedByMp3Id from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in MataPelajaran.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|TemplateUn[] List of TemplateUn objects
     */
    public function getTemplateUnsRelatedByMp3IdJoinJurusan($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TemplateUnQuery::create(null, $criteria);
        $query->joinWith('Jurusan', $join_behavior);

        return $this->getTemplateUnsRelatedByMp3Id($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this MataPelajaran is new, it will return
     * an empty collection; or if this MataPelajaran has previously
     * been saved, it will retrieve related TemplateUnsRelatedByMp3Id from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in MataPelajaran.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|TemplateUn[] List of TemplateUn objects
     */
    public function getTemplateUnsRelatedByMp3IdJoinTahunAjaran($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TemplateUnQuery::create(null, $criteria);
        $query->joinWith('TahunAjaran', $join_behavior);

        return $this->getTemplateUnsRelatedByMp3Id($query, $con);
    }

    /**
     * Clears out the collTemplateUnsRelatedByMp4Id collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return MataPelajaran The current object (for fluent API support)
     * @see        addTemplateUnsRelatedByMp4Id()
     */
    public function clearTemplateUnsRelatedByMp4Id()
    {
        $this->collTemplateUnsRelatedByMp4Id = null; // important to set this to null since that means it is uninitialized
        $this->collTemplateUnsRelatedByMp4IdPartial = null;

        return $this;
    }

    /**
     * reset is the collTemplateUnsRelatedByMp4Id collection loaded partially
     *
     * @return void
     */
    public function resetPartialTemplateUnsRelatedByMp4Id($v = true)
    {
        $this->collTemplateUnsRelatedByMp4IdPartial = $v;
    }

    /**
     * Initializes the collTemplateUnsRelatedByMp4Id collection.
     *
     * By default this just sets the collTemplateUnsRelatedByMp4Id collection to an empty array (like clearcollTemplateUnsRelatedByMp4Id());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initTemplateUnsRelatedByMp4Id($overrideExisting = true)
    {
        if (null !== $this->collTemplateUnsRelatedByMp4Id && !$overrideExisting) {
            return;
        }
        $this->collTemplateUnsRelatedByMp4Id = new PropelObjectCollection();
        $this->collTemplateUnsRelatedByMp4Id->setModel('TemplateUn');
    }

    /**
     * Gets an array of TemplateUn objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this MataPelajaran is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|TemplateUn[] List of TemplateUn objects
     * @throws PropelException
     */
    public function getTemplateUnsRelatedByMp4Id($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collTemplateUnsRelatedByMp4IdPartial && !$this->isNew();
        if (null === $this->collTemplateUnsRelatedByMp4Id || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collTemplateUnsRelatedByMp4Id) {
                // return empty collection
                $this->initTemplateUnsRelatedByMp4Id();
            } else {
                $collTemplateUnsRelatedByMp4Id = TemplateUnQuery::create(null, $criteria)
                    ->filterByMataPelajaranRelatedByMp4Id($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collTemplateUnsRelatedByMp4IdPartial && count($collTemplateUnsRelatedByMp4Id)) {
                      $this->initTemplateUnsRelatedByMp4Id(false);

                      foreach($collTemplateUnsRelatedByMp4Id as $obj) {
                        if (false == $this->collTemplateUnsRelatedByMp4Id->contains($obj)) {
                          $this->collTemplateUnsRelatedByMp4Id->append($obj);
                        }
                      }

                      $this->collTemplateUnsRelatedByMp4IdPartial = true;
                    }

                    $collTemplateUnsRelatedByMp4Id->getInternalIterator()->rewind();
                    return $collTemplateUnsRelatedByMp4Id;
                }

                if($partial && $this->collTemplateUnsRelatedByMp4Id) {
                    foreach($this->collTemplateUnsRelatedByMp4Id as $obj) {
                        if($obj->isNew()) {
                            $collTemplateUnsRelatedByMp4Id[] = $obj;
                        }
                    }
                }

                $this->collTemplateUnsRelatedByMp4Id = $collTemplateUnsRelatedByMp4Id;
                $this->collTemplateUnsRelatedByMp4IdPartial = false;
            }
        }

        return $this->collTemplateUnsRelatedByMp4Id;
    }

    /**
     * Sets a collection of TemplateUnRelatedByMp4Id objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $templateUnsRelatedByMp4Id A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return MataPelajaran The current object (for fluent API support)
     */
    public function setTemplateUnsRelatedByMp4Id(PropelCollection $templateUnsRelatedByMp4Id, PropelPDO $con = null)
    {
        $templateUnsRelatedByMp4IdToDelete = $this->getTemplateUnsRelatedByMp4Id(new Criteria(), $con)->diff($templateUnsRelatedByMp4Id);

        $this->templateUnsRelatedByMp4IdScheduledForDeletion = unserialize(serialize($templateUnsRelatedByMp4IdToDelete));

        foreach ($templateUnsRelatedByMp4IdToDelete as $templateUnRelatedByMp4IdRemoved) {
            $templateUnRelatedByMp4IdRemoved->setMataPelajaranRelatedByMp4Id(null);
        }

        $this->collTemplateUnsRelatedByMp4Id = null;
        foreach ($templateUnsRelatedByMp4Id as $templateUnRelatedByMp4Id) {
            $this->addTemplateUnRelatedByMp4Id($templateUnRelatedByMp4Id);
        }

        $this->collTemplateUnsRelatedByMp4Id = $templateUnsRelatedByMp4Id;
        $this->collTemplateUnsRelatedByMp4IdPartial = false;

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
    public function countTemplateUnsRelatedByMp4Id(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collTemplateUnsRelatedByMp4IdPartial && !$this->isNew();
        if (null === $this->collTemplateUnsRelatedByMp4Id || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collTemplateUnsRelatedByMp4Id) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getTemplateUnsRelatedByMp4Id());
            }
            $query = TemplateUnQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByMataPelajaranRelatedByMp4Id($this)
                ->count($con);
        }

        return count($this->collTemplateUnsRelatedByMp4Id);
    }

    /**
     * Method called to associate a TemplateUn object to this object
     * through the TemplateUn foreign key attribute.
     *
     * @param    TemplateUn $l TemplateUn
     * @return MataPelajaran The current object (for fluent API support)
     */
    public function addTemplateUnRelatedByMp4Id(TemplateUn $l)
    {
        if ($this->collTemplateUnsRelatedByMp4Id === null) {
            $this->initTemplateUnsRelatedByMp4Id();
            $this->collTemplateUnsRelatedByMp4IdPartial = true;
        }
        if (!in_array($l, $this->collTemplateUnsRelatedByMp4Id->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddTemplateUnRelatedByMp4Id($l);
        }

        return $this;
    }

    /**
     * @param	TemplateUnRelatedByMp4Id $templateUnRelatedByMp4Id The templateUnRelatedByMp4Id object to add.
     */
    protected function doAddTemplateUnRelatedByMp4Id($templateUnRelatedByMp4Id)
    {
        $this->collTemplateUnsRelatedByMp4Id[]= $templateUnRelatedByMp4Id;
        $templateUnRelatedByMp4Id->setMataPelajaranRelatedByMp4Id($this);
    }

    /**
     * @param	TemplateUnRelatedByMp4Id $templateUnRelatedByMp4Id The templateUnRelatedByMp4Id object to remove.
     * @return MataPelajaran The current object (for fluent API support)
     */
    public function removeTemplateUnRelatedByMp4Id($templateUnRelatedByMp4Id)
    {
        if ($this->getTemplateUnsRelatedByMp4Id()->contains($templateUnRelatedByMp4Id)) {
            $this->collTemplateUnsRelatedByMp4Id->remove($this->collTemplateUnsRelatedByMp4Id->search($templateUnRelatedByMp4Id));
            if (null === $this->templateUnsRelatedByMp4IdScheduledForDeletion) {
                $this->templateUnsRelatedByMp4IdScheduledForDeletion = clone $this->collTemplateUnsRelatedByMp4Id;
                $this->templateUnsRelatedByMp4IdScheduledForDeletion->clear();
            }
            $this->templateUnsRelatedByMp4IdScheduledForDeletion[]= $templateUnRelatedByMp4Id;
            $templateUnRelatedByMp4Id->setMataPelajaranRelatedByMp4Id(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this MataPelajaran is new, it will return
     * an empty collection; or if this MataPelajaran has previously
     * been saved, it will retrieve related TemplateUnsRelatedByMp4Id from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in MataPelajaran.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|TemplateUn[] List of TemplateUn objects
     */
    public function getTemplateUnsRelatedByMp4IdJoinJenjangPendidikan($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TemplateUnQuery::create(null, $criteria);
        $query->joinWith('JenjangPendidikan', $join_behavior);

        return $this->getTemplateUnsRelatedByMp4Id($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this MataPelajaran is new, it will return
     * an empty collection; or if this MataPelajaran has previously
     * been saved, it will retrieve related TemplateUnsRelatedByMp4Id from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in MataPelajaran.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|TemplateUn[] List of TemplateUn objects
     */
    public function getTemplateUnsRelatedByMp4IdJoinJurusan($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TemplateUnQuery::create(null, $criteria);
        $query->joinWith('Jurusan', $join_behavior);

        return $this->getTemplateUnsRelatedByMp4Id($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this MataPelajaran is new, it will return
     * an empty collection; or if this MataPelajaran has previously
     * been saved, it will retrieve related TemplateUnsRelatedByMp4Id from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in MataPelajaran.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|TemplateUn[] List of TemplateUn objects
     */
    public function getTemplateUnsRelatedByMp4IdJoinTahunAjaran($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TemplateUnQuery::create(null, $criteria);
        $query->joinWith('TahunAjaran', $join_behavior);

        return $this->getTemplateUnsRelatedByMp4Id($query, $con);
    }

    /**
     * Clears out the collTemplateUnsRelatedByMp7Id collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return MataPelajaran The current object (for fluent API support)
     * @see        addTemplateUnsRelatedByMp7Id()
     */
    public function clearTemplateUnsRelatedByMp7Id()
    {
        $this->collTemplateUnsRelatedByMp7Id = null; // important to set this to null since that means it is uninitialized
        $this->collTemplateUnsRelatedByMp7IdPartial = null;

        return $this;
    }

    /**
     * reset is the collTemplateUnsRelatedByMp7Id collection loaded partially
     *
     * @return void
     */
    public function resetPartialTemplateUnsRelatedByMp7Id($v = true)
    {
        $this->collTemplateUnsRelatedByMp7IdPartial = $v;
    }

    /**
     * Initializes the collTemplateUnsRelatedByMp7Id collection.
     *
     * By default this just sets the collTemplateUnsRelatedByMp7Id collection to an empty array (like clearcollTemplateUnsRelatedByMp7Id());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initTemplateUnsRelatedByMp7Id($overrideExisting = true)
    {
        if (null !== $this->collTemplateUnsRelatedByMp7Id && !$overrideExisting) {
            return;
        }
        $this->collTemplateUnsRelatedByMp7Id = new PropelObjectCollection();
        $this->collTemplateUnsRelatedByMp7Id->setModel('TemplateUn');
    }

    /**
     * Gets an array of TemplateUn objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this MataPelajaran is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|TemplateUn[] List of TemplateUn objects
     * @throws PropelException
     */
    public function getTemplateUnsRelatedByMp7Id($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collTemplateUnsRelatedByMp7IdPartial && !$this->isNew();
        if (null === $this->collTemplateUnsRelatedByMp7Id || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collTemplateUnsRelatedByMp7Id) {
                // return empty collection
                $this->initTemplateUnsRelatedByMp7Id();
            } else {
                $collTemplateUnsRelatedByMp7Id = TemplateUnQuery::create(null, $criteria)
                    ->filterByMataPelajaranRelatedByMp7Id($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collTemplateUnsRelatedByMp7IdPartial && count($collTemplateUnsRelatedByMp7Id)) {
                      $this->initTemplateUnsRelatedByMp7Id(false);

                      foreach($collTemplateUnsRelatedByMp7Id as $obj) {
                        if (false == $this->collTemplateUnsRelatedByMp7Id->contains($obj)) {
                          $this->collTemplateUnsRelatedByMp7Id->append($obj);
                        }
                      }

                      $this->collTemplateUnsRelatedByMp7IdPartial = true;
                    }

                    $collTemplateUnsRelatedByMp7Id->getInternalIterator()->rewind();
                    return $collTemplateUnsRelatedByMp7Id;
                }

                if($partial && $this->collTemplateUnsRelatedByMp7Id) {
                    foreach($this->collTemplateUnsRelatedByMp7Id as $obj) {
                        if($obj->isNew()) {
                            $collTemplateUnsRelatedByMp7Id[] = $obj;
                        }
                    }
                }

                $this->collTemplateUnsRelatedByMp7Id = $collTemplateUnsRelatedByMp7Id;
                $this->collTemplateUnsRelatedByMp7IdPartial = false;
            }
        }

        return $this->collTemplateUnsRelatedByMp7Id;
    }

    /**
     * Sets a collection of TemplateUnRelatedByMp7Id objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $templateUnsRelatedByMp7Id A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return MataPelajaran The current object (for fluent API support)
     */
    public function setTemplateUnsRelatedByMp7Id(PropelCollection $templateUnsRelatedByMp7Id, PropelPDO $con = null)
    {
        $templateUnsRelatedByMp7IdToDelete = $this->getTemplateUnsRelatedByMp7Id(new Criteria(), $con)->diff($templateUnsRelatedByMp7Id);

        $this->templateUnsRelatedByMp7IdScheduledForDeletion = unserialize(serialize($templateUnsRelatedByMp7IdToDelete));

        foreach ($templateUnsRelatedByMp7IdToDelete as $templateUnRelatedByMp7IdRemoved) {
            $templateUnRelatedByMp7IdRemoved->setMataPelajaranRelatedByMp7Id(null);
        }

        $this->collTemplateUnsRelatedByMp7Id = null;
        foreach ($templateUnsRelatedByMp7Id as $templateUnRelatedByMp7Id) {
            $this->addTemplateUnRelatedByMp7Id($templateUnRelatedByMp7Id);
        }

        $this->collTemplateUnsRelatedByMp7Id = $templateUnsRelatedByMp7Id;
        $this->collTemplateUnsRelatedByMp7IdPartial = false;

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
    public function countTemplateUnsRelatedByMp7Id(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collTemplateUnsRelatedByMp7IdPartial && !$this->isNew();
        if (null === $this->collTemplateUnsRelatedByMp7Id || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collTemplateUnsRelatedByMp7Id) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getTemplateUnsRelatedByMp7Id());
            }
            $query = TemplateUnQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByMataPelajaranRelatedByMp7Id($this)
                ->count($con);
        }

        return count($this->collTemplateUnsRelatedByMp7Id);
    }

    /**
     * Method called to associate a TemplateUn object to this object
     * through the TemplateUn foreign key attribute.
     *
     * @param    TemplateUn $l TemplateUn
     * @return MataPelajaran The current object (for fluent API support)
     */
    public function addTemplateUnRelatedByMp7Id(TemplateUn $l)
    {
        if ($this->collTemplateUnsRelatedByMp7Id === null) {
            $this->initTemplateUnsRelatedByMp7Id();
            $this->collTemplateUnsRelatedByMp7IdPartial = true;
        }
        if (!in_array($l, $this->collTemplateUnsRelatedByMp7Id->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddTemplateUnRelatedByMp7Id($l);
        }

        return $this;
    }

    /**
     * @param	TemplateUnRelatedByMp7Id $templateUnRelatedByMp7Id The templateUnRelatedByMp7Id object to add.
     */
    protected function doAddTemplateUnRelatedByMp7Id($templateUnRelatedByMp7Id)
    {
        $this->collTemplateUnsRelatedByMp7Id[]= $templateUnRelatedByMp7Id;
        $templateUnRelatedByMp7Id->setMataPelajaranRelatedByMp7Id($this);
    }

    /**
     * @param	TemplateUnRelatedByMp7Id $templateUnRelatedByMp7Id The templateUnRelatedByMp7Id object to remove.
     * @return MataPelajaran The current object (for fluent API support)
     */
    public function removeTemplateUnRelatedByMp7Id($templateUnRelatedByMp7Id)
    {
        if ($this->getTemplateUnsRelatedByMp7Id()->contains($templateUnRelatedByMp7Id)) {
            $this->collTemplateUnsRelatedByMp7Id->remove($this->collTemplateUnsRelatedByMp7Id->search($templateUnRelatedByMp7Id));
            if (null === $this->templateUnsRelatedByMp7IdScheduledForDeletion) {
                $this->templateUnsRelatedByMp7IdScheduledForDeletion = clone $this->collTemplateUnsRelatedByMp7Id;
                $this->templateUnsRelatedByMp7IdScheduledForDeletion->clear();
            }
            $this->templateUnsRelatedByMp7IdScheduledForDeletion[]= $templateUnRelatedByMp7Id;
            $templateUnRelatedByMp7Id->setMataPelajaranRelatedByMp7Id(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this MataPelajaran is new, it will return
     * an empty collection; or if this MataPelajaran has previously
     * been saved, it will retrieve related TemplateUnsRelatedByMp7Id from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in MataPelajaran.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|TemplateUn[] List of TemplateUn objects
     */
    public function getTemplateUnsRelatedByMp7IdJoinJenjangPendidikan($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TemplateUnQuery::create(null, $criteria);
        $query->joinWith('JenjangPendidikan', $join_behavior);

        return $this->getTemplateUnsRelatedByMp7Id($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this MataPelajaran is new, it will return
     * an empty collection; or if this MataPelajaran has previously
     * been saved, it will retrieve related TemplateUnsRelatedByMp7Id from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in MataPelajaran.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|TemplateUn[] List of TemplateUn objects
     */
    public function getTemplateUnsRelatedByMp7IdJoinJurusan($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TemplateUnQuery::create(null, $criteria);
        $query->joinWith('Jurusan', $join_behavior);

        return $this->getTemplateUnsRelatedByMp7Id($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this MataPelajaran is new, it will return
     * an empty collection; or if this MataPelajaran has previously
     * been saved, it will retrieve related TemplateUnsRelatedByMp7Id from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in MataPelajaran.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|TemplateUn[] List of TemplateUn objects
     */
    public function getTemplateUnsRelatedByMp7IdJoinTahunAjaran($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TemplateUnQuery::create(null, $criteria);
        $query->joinWith('TahunAjaran', $join_behavior);

        return $this->getTemplateUnsRelatedByMp7Id($query, $con);
    }

    /**
     * Clears out the collTemplateUnsRelatedByMp5Id collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return MataPelajaran The current object (for fluent API support)
     * @see        addTemplateUnsRelatedByMp5Id()
     */
    public function clearTemplateUnsRelatedByMp5Id()
    {
        $this->collTemplateUnsRelatedByMp5Id = null; // important to set this to null since that means it is uninitialized
        $this->collTemplateUnsRelatedByMp5IdPartial = null;

        return $this;
    }

    /**
     * reset is the collTemplateUnsRelatedByMp5Id collection loaded partially
     *
     * @return void
     */
    public function resetPartialTemplateUnsRelatedByMp5Id($v = true)
    {
        $this->collTemplateUnsRelatedByMp5IdPartial = $v;
    }

    /**
     * Initializes the collTemplateUnsRelatedByMp5Id collection.
     *
     * By default this just sets the collTemplateUnsRelatedByMp5Id collection to an empty array (like clearcollTemplateUnsRelatedByMp5Id());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initTemplateUnsRelatedByMp5Id($overrideExisting = true)
    {
        if (null !== $this->collTemplateUnsRelatedByMp5Id && !$overrideExisting) {
            return;
        }
        $this->collTemplateUnsRelatedByMp5Id = new PropelObjectCollection();
        $this->collTemplateUnsRelatedByMp5Id->setModel('TemplateUn');
    }

    /**
     * Gets an array of TemplateUn objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this MataPelajaran is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|TemplateUn[] List of TemplateUn objects
     * @throws PropelException
     */
    public function getTemplateUnsRelatedByMp5Id($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collTemplateUnsRelatedByMp5IdPartial && !$this->isNew();
        if (null === $this->collTemplateUnsRelatedByMp5Id || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collTemplateUnsRelatedByMp5Id) {
                // return empty collection
                $this->initTemplateUnsRelatedByMp5Id();
            } else {
                $collTemplateUnsRelatedByMp5Id = TemplateUnQuery::create(null, $criteria)
                    ->filterByMataPelajaranRelatedByMp5Id($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collTemplateUnsRelatedByMp5IdPartial && count($collTemplateUnsRelatedByMp5Id)) {
                      $this->initTemplateUnsRelatedByMp5Id(false);

                      foreach($collTemplateUnsRelatedByMp5Id as $obj) {
                        if (false == $this->collTemplateUnsRelatedByMp5Id->contains($obj)) {
                          $this->collTemplateUnsRelatedByMp5Id->append($obj);
                        }
                      }

                      $this->collTemplateUnsRelatedByMp5IdPartial = true;
                    }

                    $collTemplateUnsRelatedByMp5Id->getInternalIterator()->rewind();
                    return $collTemplateUnsRelatedByMp5Id;
                }

                if($partial && $this->collTemplateUnsRelatedByMp5Id) {
                    foreach($this->collTemplateUnsRelatedByMp5Id as $obj) {
                        if($obj->isNew()) {
                            $collTemplateUnsRelatedByMp5Id[] = $obj;
                        }
                    }
                }

                $this->collTemplateUnsRelatedByMp5Id = $collTemplateUnsRelatedByMp5Id;
                $this->collTemplateUnsRelatedByMp5IdPartial = false;
            }
        }

        return $this->collTemplateUnsRelatedByMp5Id;
    }

    /**
     * Sets a collection of TemplateUnRelatedByMp5Id objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $templateUnsRelatedByMp5Id A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return MataPelajaran The current object (for fluent API support)
     */
    public function setTemplateUnsRelatedByMp5Id(PropelCollection $templateUnsRelatedByMp5Id, PropelPDO $con = null)
    {
        $templateUnsRelatedByMp5IdToDelete = $this->getTemplateUnsRelatedByMp5Id(new Criteria(), $con)->diff($templateUnsRelatedByMp5Id);

        $this->templateUnsRelatedByMp5IdScheduledForDeletion = unserialize(serialize($templateUnsRelatedByMp5IdToDelete));

        foreach ($templateUnsRelatedByMp5IdToDelete as $templateUnRelatedByMp5IdRemoved) {
            $templateUnRelatedByMp5IdRemoved->setMataPelajaranRelatedByMp5Id(null);
        }

        $this->collTemplateUnsRelatedByMp5Id = null;
        foreach ($templateUnsRelatedByMp5Id as $templateUnRelatedByMp5Id) {
            $this->addTemplateUnRelatedByMp5Id($templateUnRelatedByMp5Id);
        }

        $this->collTemplateUnsRelatedByMp5Id = $templateUnsRelatedByMp5Id;
        $this->collTemplateUnsRelatedByMp5IdPartial = false;

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
    public function countTemplateUnsRelatedByMp5Id(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collTemplateUnsRelatedByMp5IdPartial && !$this->isNew();
        if (null === $this->collTemplateUnsRelatedByMp5Id || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collTemplateUnsRelatedByMp5Id) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getTemplateUnsRelatedByMp5Id());
            }
            $query = TemplateUnQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByMataPelajaranRelatedByMp5Id($this)
                ->count($con);
        }

        return count($this->collTemplateUnsRelatedByMp5Id);
    }

    /**
     * Method called to associate a TemplateUn object to this object
     * through the TemplateUn foreign key attribute.
     *
     * @param    TemplateUn $l TemplateUn
     * @return MataPelajaran The current object (for fluent API support)
     */
    public function addTemplateUnRelatedByMp5Id(TemplateUn $l)
    {
        if ($this->collTemplateUnsRelatedByMp5Id === null) {
            $this->initTemplateUnsRelatedByMp5Id();
            $this->collTemplateUnsRelatedByMp5IdPartial = true;
        }
        if (!in_array($l, $this->collTemplateUnsRelatedByMp5Id->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddTemplateUnRelatedByMp5Id($l);
        }

        return $this;
    }

    /**
     * @param	TemplateUnRelatedByMp5Id $templateUnRelatedByMp5Id The templateUnRelatedByMp5Id object to add.
     */
    protected function doAddTemplateUnRelatedByMp5Id($templateUnRelatedByMp5Id)
    {
        $this->collTemplateUnsRelatedByMp5Id[]= $templateUnRelatedByMp5Id;
        $templateUnRelatedByMp5Id->setMataPelajaranRelatedByMp5Id($this);
    }

    /**
     * @param	TemplateUnRelatedByMp5Id $templateUnRelatedByMp5Id The templateUnRelatedByMp5Id object to remove.
     * @return MataPelajaran The current object (for fluent API support)
     */
    public function removeTemplateUnRelatedByMp5Id($templateUnRelatedByMp5Id)
    {
        if ($this->getTemplateUnsRelatedByMp5Id()->contains($templateUnRelatedByMp5Id)) {
            $this->collTemplateUnsRelatedByMp5Id->remove($this->collTemplateUnsRelatedByMp5Id->search($templateUnRelatedByMp5Id));
            if (null === $this->templateUnsRelatedByMp5IdScheduledForDeletion) {
                $this->templateUnsRelatedByMp5IdScheduledForDeletion = clone $this->collTemplateUnsRelatedByMp5Id;
                $this->templateUnsRelatedByMp5IdScheduledForDeletion->clear();
            }
            $this->templateUnsRelatedByMp5IdScheduledForDeletion[]= $templateUnRelatedByMp5Id;
            $templateUnRelatedByMp5Id->setMataPelajaranRelatedByMp5Id(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this MataPelajaran is new, it will return
     * an empty collection; or if this MataPelajaran has previously
     * been saved, it will retrieve related TemplateUnsRelatedByMp5Id from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in MataPelajaran.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|TemplateUn[] List of TemplateUn objects
     */
    public function getTemplateUnsRelatedByMp5IdJoinJenjangPendidikan($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TemplateUnQuery::create(null, $criteria);
        $query->joinWith('JenjangPendidikan', $join_behavior);

        return $this->getTemplateUnsRelatedByMp5Id($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this MataPelajaran is new, it will return
     * an empty collection; or if this MataPelajaran has previously
     * been saved, it will retrieve related TemplateUnsRelatedByMp5Id from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in MataPelajaran.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|TemplateUn[] List of TemplateUn objects
     */
    public function getTemplateUnsRelatedByMp5IdJoinJurusan($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TemplateUnQuery::create(null, $criteria);
        $query->joinWith('Jurusan', $join_behavior);

        return $this->getTemplateUnsRelatedByMp5Id($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this MataPelajaran is new, it will return
     * an empty collection; or if this MataPelajaran has previously
     * been saved, it will retrieve related TemplateUnsRelatedByMp5Id from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in MataPelajaran.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|TemplateUn[] List of TemplateUn objects
     */
    public function getTemplateUnsRelatedByMp5IdJoinTahunAjaran($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TemplateUnQuery::create(null, $criteria);
        $query->joinWith('TahunAjaran', $join_behavior);

        return $this->getTemplateUnsRelatedByMp5Id($query, $con);
    }

    /**
     * Clears out the collTemplateUnsRelatedByMp1Id collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return MataPelajaran The current object (for fluent API support)
     * @see        addTemplateUnsRelatedByMp1Id()
     */
    public function clearTemplateUnsRelatedByMp1Id()
    {
        $this->collTemplateUnsRelatedByMp1Id = null; // important to set this to null since that means it is uninitialized
        $this->collTemplateUnsRelatedByMp1IdPartial = null;

        return $this;
    }

    /**
     * reset is the collTemplateUnsRelatedByMp1Id collection loaded partially
     *
     * @return void
     */
    public function resetPartialTemplateUnsRelatedByMp1Id($v = true)
    {
        $this->collTemplateUnsRelatedByMp1IdPartial = $v;
    }

    /**
     * Initializes the collTemplateUnsRelatedByMp1Id collection.
     *
     * By default this just sets the collTemplateUnsRelatedByMp1Id collection to an empty array (like clearcollTemplateUnsRelatedByMp1Id());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initTemplateUnsRelatedByMp1Id($overrideExisting = true)
    {
        if (null !== $this->collTemplateUnsRelatedByMp1Id && !$overrideExisting) {
            return;
        }
        $this->collTemplateUnsRelatedByMp1Id = new PropelObjectCollection();
        $this->collTemplateUnsRelatedByMp1Id->setModel('TemplateUn');
    }

    /**
     * Gets an array of TemplateUn objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this MataPelajaran is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|TemplateUn[] List of TemplateUn objects
     * @throws PropelException
     */
    public function getTemplateUnsRelatedByMp1Id($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collTemplateUnsRelatedByMp1IdPartial && !$this->isNew();
        if (null === $this->collTemplateUnsRelatedByMp1Id || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collTemplateUnsRelatedByMp1Id) {
                // return empty collection
                $this->initTemplateUnsRelatedByMp1Id();
            } else {
                $collTemplateUnsRelatedByMp1Id = TemplateUnQuery::create(null, $criteria)
                    ->filterByMataPelajaranRelatedByMp1Id($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collTemplateUnsRelatedByMp1IdPartial && count($collTemplateUnsRelatedByMp1Id)) {
                      $this->initTemplateUnsRelatedByMp1Id(false);

                      foreach($collTemplateUnsRelatedByMp1Id as $obj) {
                        if (false == $this->collTemplateUnsRelatedByMp1Id->contains($obj)) {
                          $this->collTemplateUnsRelatedByMp1Id->append($obj);
                        }
                      }

                      $this->collTemplateUnsRelatedByMp1IdPartial = true;
                    }

                    $collTemplateUnsRelatedByMp1Id->getInternalIterator()->rewind();
                    return $collTemplateUnsRelatedByMp1Id;
                }

                if($partial && $this->collTemplateUnsRelatedByMp1Id) {
                    foreach($this->collTemplateUnsRelatedByMp1Id as $obj) {
                        if($obj->isNew()) {
                            $collTemplateUnsRelatedByMp1Id[] = $obj;
                        }
                    }
                }

                $this->collTemplateUnsRelatedByMp1Id = $collTemplateUnsRelatedByMp1Id;
                $this->collTemplateUnsRelatedByMp1IdPartial = false;
            }
        }

        return $this->collTemplateUnsRelatedByMp1Id;
    }

    /**
     * Sets a collection of TemplateUnRelatedByMp1Id objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $templateUnsRelatedByMp1Id A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return MataPelajaran The current object (for fluent API support)
     */
    public function setTemplateUnsRelatedByMp1Id(PropelCollection $templateUnsRelatedByMp1Id, PropelPDO $con = null)
    {
        $templateUnsRelatedByMp1IdToDelete = $this->getTemplateUnsRelatedByMp1Id(new Criteria(), $con)->diff($templateUnsRelatedByMp1Id);

        $this->templateUnsRelatedByMp1IdScheduledForDeletion = unserialize(serialize($templateUnsRelatedByMp1IdToDelete));

        foreach ($templateUnsRelatedByMp1IdToDelete as $templateUnRelatedByMp1IdRemoved) {
            $templateUnRelatedByMp1IdRemoved->setMataPelajaranRelatedByMp1Id(null);
        }

        $this->collTemplateUnsRelatedByMp1Id = null;
        foreach ($templateUnsRelatedByMp1Id as $templateUnRelatedByMp1Id) {
            $this->addTemplateUnRelatedByMp1Id($templateUnRelatedByMp1Id);
        }

        $this->collTemplateUnsRelatedByMp1Id = $templateUnsRelatedByMp1Id;
        $this->collTemplateUnsRelatedByMp1IdPartial = false;

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
    public function countTemplateUnsRelatedByMp1Id(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collTemplateUnsRelatedByMp1IdPartial && !$this->isNew();
        if (null === $this->collTemplateUnsRelatedByMp1Id || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collTemplateUnsRelatedByMp1Id) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getTemplateUnsRelatedByMp1Id());
            }
            $query = TemplateUnQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByMataPelajaranRelatedByMp1Id($this)
                ->count($con);
        }

        return count($this->collTemplateUnsRelatedByMp1Id);
    }

    /**
     * Method called to associate a TemplateUn object to this object
     * through the TemplateUn foreign key attribute.
     *
     * @param    TemplateUn $l TemplateUn
     * @return MataPelajaran The current object (for fluent API support)
     */
    public function addTemplateUnRelatedByMp1Id(TemplateUn $l)
    {
        if ($this->collTemplateUnsRelatedByMp1Id === null) {
            $this->initTemplateUnsRelatedByMp1Id();
            $this->collTemplateUnsRelatedByMp1IdPartial = true;
        }
        if (!in_array($l, $this->collTemplateUnsRelatedByMp1Id->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddTemplateUnRelatedByMp1Id($l);
        }

        return $this;
    }

    /**
     * @param	TemplateUnRelatedByMp1Id $templateUnRelatedByMp1Id The templateUnRelatedByMp1Id object to add.
     */
    protected function doAddTemplateUnRelatedByMp1Id($templateUnRelatedByMp1Id)
    {
        $this->collTemplateUnsRelatedByMp1Id[]= $templateUnRelatedByMp1Id;
        $templateUnRelatedByMp1Id->setMataPelajaranRelatedByMp1Id($this);
    }

    /**
     * @param	TemplateUnRelatedByMp1Id $templateUnRelatedByMp1Id The templateUnRelatedByMp1Id object to remove.
     * @return MataPelajaran The current object (for fluent API support)
     */
    public function removeTemplateUnRelatedByMp1Id($templateUnRelatedByMp1Id)
    {
        if ($this->getTemplateUnsRelatedByMp1Id()->contains($templateUnRelatedByMp1Id)) {
            $this->collTemplateUnsRelatedByMp1Id->remove($this->collTemplateUnsRelatedByMp1Id->search($templateUnRelatedByMp1Id));
            if (null === $this->templateUnsRelatedByMp1IdScheduledForDeletion) {
                $this->templateUnsRelatedByMp1IdScheduledForDeletion = clone $this->collTemplateUnsRelatedByMp1Id;
                $this->templateUnsRelatedByMp1IdScheduledForDeletion->clear();
            }
            $this->templateUnsRelatedByMp1IdScheduledForDeletion[]= $templateUnRelatedByMp1Id;
            $templateUnRelatedByMp1Id->setMataPelajaranRelatedByMp1Id(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this MataPelajaran is new, it will return
     * an empty collection; or if this MataPelajaran has previously
     * been saved, it will retrieve related TemplateUnsRelatedByMp1Id from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in MataPelajaran.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|TemplateUn[] List of TemplateUn objects
     */
    public function getTemplateUnsRelatedByMp1IdJoinJenjangPendidikan($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TemplateUnQuery::create(null, $criteria);
        $query->joinWith('JenjangPendidikan', $join_behavior);

        return $this->getTemplateUnsRelatedByMp1Id($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this MataPelajaran is new, it will return
     * an empty collection; or if this MataPelajaran has previously
     * been saved, it will retrieve related TemplateUnsRelatedByMp1Id from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in MataPelajaran.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|TemplateUn[] List of TemplateUn objects
     */
    public function getTemplateUnsRelatedByMp1IdJoinJurusan($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TemplateUnQuery::create(null, $criteria);
        $query->joinWith('Jurusan', $join_behavior);

        return $this->getTemplateUnsRelatedByMp1Id($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this MataPelajaran is new, it will return
     * an empty collection; or if this MataPelajaran has previously
     * been saved, it will retrieve related TemplateUnsRelatedByMp1Id from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in MataPelajaran.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|TemplateUn[] List of TemplateUn objects
     */
    public function getTemplateUnsRelatedByMp1IdJoinTahunAjaran($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TemplateUnQuery::create(null, $criteria);
        $query->joinWith('TahunAjaran', $join_behavior);

        return $this->getTemplateUnsRelatedByMp1Id($query, $con);
    }

    /**
     * Clears out the collTemplateUnsRelatedByMp2Id collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return MataPelajaran The current object (for fluent API support)
     * @see        addTemplateUnsRelatedByMp2Id()
     */
    public function clearTemplateUnsRelatedByMp2Id()
    {
        $this->collTemplateUnsRelatedByMp2Id = null; // important to set this to null since that means it is uninitialized
        $this->collTemplateUnsRelatedByMp2IdPartial = null;

        return $this;
    }

    /**
     * reset is the collTemplateUnsRelatedByMp2Id collection loaded partially
     *
     * @return void
     */
    public function resetPartialTemplateUnsRelatedByMp2Id($v = true)
    {
        $this->collTemplateUnsRelatedByMp2IdPartial = $v;
    }

    /**
     * Initializes the collTemplateUnsRelatedByMp2Id collection.
     *
     * By default this just sets the collTemplateUnsRelatedByMp2Id collection to an empty array (like clearcollTemplateUnsRelatedByMp2Id());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initTemplateUnsRelatedByMp2Id($overrideExisting = true)
    {
        if (null !== $this->collTemplateUnsRelatedByMp2Id && !$overrideExisting) {
            return;
        }
        $this->collTemplateUnsRelatedByMp2Id = new PropelObjectCollection();
        $this->collTemplateUnsRelatedByMp2Id->setModel('TemplateUn');
    }

    /**
     * Gets an array of TemplateUn objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this MataPelajaran is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|TemplateUn[] List of TemplateUn objects
     * @throws PropelException
     */
    public function getTemplateUnsRelatedByMp2Id($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collTemplateUnsRelatedByMp2IdPartial && !$this->isNew();
        if (null === $this->collTemplateUnsRelatedByMp2Id || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collTemplateUnsRelatedByMp2Id) {
                // return empty collection
                $this->initTemplateUnsRelatedByMp2Id();
            } else {
                $collTemplateUnsRelatedByMp2Id = TemplateUnQuery::create(null, $criteria)
                    ->filterByMataPelajaranRelatedByMp2Id($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collTemplateUnsRelatedByMp2IdPartial && count($collTemplateUnsRelatedByMp2Id)) {
                      $this->initTemplateUnsRelatedByMp2Id(false);

                      foreach($collTemplateUnsRelatedByMp2Id as $obj) {
                        if (false == $this->collTemplateUnsRelatedByMp2Id->contains($obj)) {
                          $this->collTemplateUnsRelatedByMp2Id->append($obj);
                        }
                      }

                      $this->collTemplateUnsRelatedByMp2IdPartial = true;
                    }

                    $collTemplateUnsRelatedByMp2Id->getInternalIterator()->rewind();
                    return $collTemplateUnsRelatedByMp2Id;
                }

                if($partial && $this->collTemplateUnsRelatedByMp2Id) {
                    foreach($this->collTemplateUnsRelatedByMp2Id as $obj) {
                        if($obj->isNew()) {
                            $collTemplateUnsRelatedByMp2Id[] = $obj;
                        }
                    }
                }

                $this->collTemplateUnsRelatedByMp2Id = $collTemplateUnsRelatedByMp2Id;
                $this->collTemplateUnsRelatedByMp2IdPartial = false;
            }
        }

        return $this->collTemplateUnsRelatedByMp2Id;
    }

    /**
     * Sets a collection of TemplateUnRelatedByMp2Id objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $templateUnsRelatedByMp2Id A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return MataPelajaran The current object (for fluent API support)
     */
    public function setTemplateUnsRelatedByMp2Id(PropelCollection $templateUnsRelatedByMp2Id, PropelPDO $con = null)
    {
        $templateUnsRelatedByMp2IdToDelete = $this->getTemplateUnsRelatedByMp2Id(new Criteria(), $con)->diff($templateUnsRelatedByMp2Id);

        $this->templateUnsRelatedByMp2IdScheduledForDeletion = unserialize(serialize($templateUnsRelatedByMp2IdToDelete));

        foreach ($templateUnsRelatedByMp2IdToDelete as $templateUnRelatedByMp2IdRemoved) {
            $templateUnRelatedByMp2IdRemoved->setMataPelajaranRelatedByMp2Id(null);
        }

        $this->collTemplateUnsRelatedByMp2Id = null;
        foreach ($templateUnsRelatedByMp2Id as $templateUnRelatedByMp2Id) {
            $this->addTemplateUnRelatedByMp2Id($templateUnRelatedByMp2Id);
        }

        $this->collTemplateUnsRelatedByMp2Id = $templateUnsRelatedByMp2Id;
        $this->collTemplateUnsRelatedByMp2IdPartial = false;

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
    public function countTemplateUnsRelatedByMp2Id(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collTemplateUnsRelatedByMp2IdPartial && !$this->isNew();
        if (null === $this->collTemplateUnsRelatedByMp2Id || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collTemplateUnsRelatedByMp2Id) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getTemplateUnsRelatedByMp2Id());
            }
            $query = TemplateUnQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByMataPelajaranRelatedByMp2Id($this)
                ->count($con);
        }

        return count($this->collTemplateUnsRelatedByMp2Id);
    }

    /**
     * Method called to associate a TemplateUn object to this object
     * through the TemplateUn foreign key attribute.
     *
     * @param    TemplateUn $l TemplateUn
     * @return MataPelajaran The current object (for fluent API support)
     */
    public function addTemplateUnRelatedByMp2Id(TemplateUn $l)
    {
        if ($this->collTemplateUnsRelatedByMp2Id === null) {
            $this->initTemplateUnsRelatedByMp2Id();
            $this->collTemplateUnsRelatedByMp2IdPartial = true;
        }
        if (!in_array($l, $this->collTemplateUnsRelatedByMp2Id->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddTemplateUnRelatedByMp2Id($l);
        }

        return $this;
    }

    /**
     * @param	TemplateUnRelatedByMp2Id $templateUnRelatedByMp2Id The templateUnRelatedByMp2Id object to add.
     */
    protected function doAddTemplateUnRelatedByMp2Id($templateUnRelatedByMp2Id)
    {
        $this->collTemplateUnsRelatedByMp2Id[]= $templateUnRelatedByMp2Id;
        $templateUnRelatedByMp2Id->setMataPelajaranRelatedByMp2Id($this);
    }

    /**
     * @param	TemplateUnRelatedByMp2Id $templateUnRelatedByMp2Id The templateUnRelatedByMp2Id object to remove.
     * @return MataPelajaran The current object (for fluent API support)
     */
    public function removeTemplateUnRelatedByMp2Id($templateUnRelatedByMp2Id)
    {
        if ($this->getTemplateUnsRelatedByMp2Id()->contains($templateUnRelatedByMp2Id)) {
            $this->collTemplateUnsRelatedByMp2Id->remove($this->collTemplateUnsRelatedByMp2Id->search($templateUnRelatedByMp2Id));
            if (null === $this->templateUnsRelatedByMp2IdScheduledForDeletion) {
                $this->templateUnsRelatedByMp2IdScheduledForDeletion = clone $this->collTemplateUnsRelatedByMp2Id;
                $this->templateUnsRelatedByMp2IdScheduledForDeletion->clear();
            }
            $this->templateUnsRelatedByMp2IdScheduledForDeletion[]= $templateUnRelatedByMp2Id;
            $templateUnRelatedByMp2Id->setMataPelajaranRelatedByMp2Id(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this MataPelajaran is new, it will return
     * an empty collection; or if this MataPelajaran has previously
     * been saved, it will retrieve related TemplateUnsRelatedByMp2Id from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in MataPelajaran.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|TemplateUn[] List of TemplateUn objects
     */
    public function getTemplateUnsRelatedByMp2IdJoinJenjangPendidikan($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TemplateUnQuery::create(null, $criteria);
        $query->joinWith('JenjangPendidikan', $join_behavior);

        return $this->getTemplateUnsRelatedByMp2Id($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this MataPelajaran is new, it will return
     * an empty collection; or if this MataPelajaran has previously
     * been saved, it will retrieve related TemplateUnsRelatedByMp2Id from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in MataPelajaran.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|TemplateUn[] List of TemplateUn objects
     */
    public function getTemplateUnsRelatedByMp2IdJoinJurusan($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TemplateUnQuery::create(null, $criteria);
        $query->joinWith('Jurusan', $join_behavior);

        return $this->getTemplateUnsRelatedByMp2Id($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this MataPelajaran is new, it will return
     * an empty collection; or if this MataPelajaran has previously
     * been saved, it will retrieve related TemplateUnsRelatedByMp2Id from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in MataPelajaran.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|TemplateUn[] List of TemplateUn objects
     */
    public function getTemplateUnsRelatedByMp2IdJoinTahunAjaran($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TemplateUnQuery::create(null, $criteria);
        $query->joinWith('TahunAjaran', $join_behavior);

        return $this->getTemplateUnsRelatedByMp2Id($query, $con);
    }

    /**
     * Clears out the collTemplateUnsRelatedByMp6Id collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return MataPelajaran The current object (for fluent API support)
     * @see        addTemplateUnsRelatedByMp6Id()
     */
    public function clearTemplateUnsRelatedByMp6Id()
    {
        $this->collTemplateUnsRelatedByMp6Id = null; // important to set this to null since that means it is uninitialized
        $this->collTemplateUnsRelatedByMp6IdPartial = null;

        return $this;
    }

    /**
     * reset is the collTemplateUnsRelatedByMp6Id collection loaded partially
     *
     * @return void
     */
    public function resetPartialTemplateUnsRelatedByMp6Id($v = true)
    {
        $this->collTemplateUnsRelatedByMp6IdPartial = $v;
    }

    /**
     * Initializes the collTemplateUnsRelatedByMp6Id collection.
     *
     * By default this just sets the collTemplateUnsRelatedByMp6Id collection to an empty array (like clearcollTemplateUnsRelatedByMp6Id());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initTemplateUnsRelatedByMp6Id($overrideExisting = true)
    {
        if (null !== $this->collTemplateUnsRelatedByMp6Id && !$overrideExisting) {
            return;
        }
        $this->collTemplateUnsRelatedByMp6Id = new PropelObjectCollection();
        $this->collTemplateUnsRelatedByMp6Id->setModel('TemplateUn');
    }

    /**
     * Gets an array of TemplateUn objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this MataPelajaran is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|TemplateUn[] List of TemplateUn objects
     * @throws PropelException
     */
    public function getTemplateUnsRelatedByMp6Id($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collTemplateUnsRelatedByMp6IdPartial && !$this->isNew();
        if (null === $this->collTemplateUnsRelatedByMp6Id || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collTemplateUnsRelatedByMp6Id) {
                // return empty collection
                $this->initTemplateUnsRelatedByMp6Id();
            } else {
                $collTemplateUnsRelatedByMp6Id = TemplateUnQuery::create(null, $criteria)
                    ->filterByMataPelajaranRelatedByMp6Id($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collTemplateUnsRelatedByMp6IdPartial && count($collTemplateUnsRelatedByMp6Id)) {
                      $this->initTemplateUnsRelatedByMp6Id(false);

                      foreach($collTemplateUnsRelatedByMp6Id as $obj) {
                        if (false == $this->collTemplateUnsRelatedByMp6Id->contains($obj)) {
                          $this->collTemplateUnsRelatedByMp6Id->append($obj);
                        }
                      }

                      $this->collTemplateUnsRelatedByMp6IdPartial = true;
                    }

                    $collTemplateUnsRelatedByMp6Id->getInternalIterator()->rewind();
                    return $collTemplateUnsRelatedByMp6Id;
                }

                if($partial && $this->collTemplateUnsRelatedByMp6Id) {
                    foreach($this->collTemplateUnsRelatedByMp6Id as $obj) {
                        if($obj->isNew()) {
                            $collTemplateUnsRelatedByMp6Id[] = $obj;
                        }
                    }
                }

                $this->collTemplateUnsRelatedByMp6Id = $collTemplateUnsRelatedByMp6Id;
                $this->collTemplateUnsRelatedByMp6IdPartial = false;
            }
        }

        return $this->collTemplateUnsRelatedByMp6Id;
    }

    /**
     * Sets a collection of TemplateUnRelatedByMp6Id objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $templateUnsRelatedByMp6Id A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return MataPelajaran The current object (for fluent API support)
     */
    public function setTemplateUnsRelatedByMp6Id(PropelCollection $templateUnsRelatedByMp6Id, PropelPDO $con = null)
    {
        $templateUnsRelatedByMp6IdToDelete = $this->getTemplateUnsRelatedByMp6Id(new Criteria(), $con)->diff($templateUnsRelatedByMp6Id);

        $this->templateUnsRelatedByMp6IdScheduledForDeletion = unserialize(serialize($templateUnsRelatedByMp6IdToDelete));

        foreach ($templateUnsRelatedByMp6IdToDelete as $templateUnRelatedByMp6IdRemoved) {
            $templateUnRelatedByMp6IdRemoved->setMataPelajaranRelatedByMp6Id(null);
        }

        $this->collTemplateUnsRelatedByMp6Id = null;
        foreach ($templateUnsRelatedByMp6Id as $templateUnRelatedByMp6Id) {
            $this->addTemplateUnRelatedByMp6Id($templateUnRelatedByMp6Id);
        }

        $this->collTemplateUnsRelatedByMp6Id = $templateUnsRelatedByMp6Id;
        $this->collTemplateUnsRelatedByMp6IdPartial = false;

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
    public function countTemplateUnsRelatedByMp6Id(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collTemplateUnsRelatedByMp6IdPartial && !$this->isNew();
        if (null === $this->collTemplateUnsRelatedByMp6Id || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collTemplateUnsRelatedByMp6Id) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getTemplateUnsRelatedByMp6Id());
            }
            $query = TemplateUnQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByMataPelajaranRelatedByMp6Id($this)
                ->count($con);
        }

        return count($this->collTemplateUnsRelatedByMp6Id);
    }

    /**
     * Method called to associate a TemplateUn object to this object
     * through the TemplateUn foreign key attribute.
     *
     * @param    TemplateUn $l TemplateUn
     * @return MataPelajaran The current object (for fluent API support)
     */
    public function addTemplateUnRelatedByMp6Id(TemplateUn $l)
    {
        if ($this->collTemplateUnsRelatedByMp6Id === null) {
            $this->initTemplateUnsRelatedByMp6Id();
            $this->collTemplateUnsRelatedByMp6IdPartial = true;
        }
        if (!in_array($l, $this->collTemplateUnsRelatedByMp6Id->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddTemplateUnRelatedByMp6Id($l);
        }

        return $this;
    }

    /**
     * @param	TemplateUnRelatedByMp6Id $templateUnRelatedByMp6Id The templateUnRelatedByMp6Id object to add.
     */
    protected function doAddTemplateUnRelatedByMp6Id($templateUnRelatedByMp6Id)
    {
        $this->collTemplateUnsRelatedByMp6Id[]= $templateUnRelatedByMp6Id;
        $templateUnRelatedByMp6Id->setMataPelajaranRelatedByMp6Id($this);
    }

    /**
     * @param	TemplateUnRelatedByMp6Id $templateUnRelatedByMp6Id The templateUnRelatedByMp6Id object to remove.
     * @return MataPelajaran The current object (for fluent API support)
     */
    public function removeTemplateUnRelatedByMp6Id($templateUnRelatedByMp6Id)
    {
        if ($this->getTemplateUnsRelatedByMp6Id()->contains($templateUnRelatedByMp6Id)) {
            $this->collTemplateUnsRelatedByMp6Id->remove($this->collTemplateUnsRelatedByMp6Id->search($templateUnRelatedByMp6Id));
            if (null === $this->templateUnsRelatedByMp6IdScheduledForDeletion) {
                $this->templateUnsRelatedByMp6IdScheduledForDeletion = clone $this->collTemplateUnsRelatedByMp6Id;
                $this->templateUnsRelatedByMp6IdScheduledForDeletion->clear();
            }
            $this->templateUnsRelatedByMp6IdScheduledForDeletion[]= $templateUnRelatedByMp6Id;
            $templateUnRelatedByMp6Id->setMataPelajaranRelatedByMp6Id(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this MataPelajaran is new, it will return
     * an empty collection; or if this MataPelajaran has previously
     * been saved, it will retrieve related TemplateUnsRelatedByMp6Id from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in MataPelajaran.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|TemplateUn[] List of TemplateUn objects
     */
    public function getTemplateUnsRelatedByMp6IdJoinJenjangPendidikan($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TemplateUnQuery::create(null, $criteria);
        $query->joinWith('JenjangPendidikan', $join_behavior);

        return $this->getTemplateUnsRelatedByMp6Id($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this MataPelajaran is new, it will return
     * an empty collection; or if this MataPelajaran has previously
     * been saved, it will retrieve related TemplateUnsRelatedByMp6Id from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in MataPelajaran.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|TemplateUn[] List of TemplateUn objects
     */
    public function getTemplateUnsRelatedByMp6IdJoinJurusan($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TemplateUnQuery::create(null, $criteria);
        $query->joinWith('Jurusan', $join_behavior);

        return $this->getTemplateUnsRelatedByMp6Id($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this MataPelajaran is new, it will return
     * an empty collection; or if this MataPelajaran has previously
     * been saved, it will retrieve related TemplateUnsRelatedByMp6Id from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in MataPelajaran.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|TemplateUn[] List of TemplateUn objects
     */
    public function getTemplateUnsRelatedByMp6IdJoinTahunAjaran($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TemplateUnQuery::create(null, $criteria);
        $query->joinWith('TahunAjaran', $join_behavior);

        return $this->getTemplateUnsRelatedByMp6Id($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->mata_pelajaran_id = null;
        $this->nama = null;
        $this->pilihan_sekolah = null;
        $this->pilihan_buku = null;
        $this->pilihan_kepengawasan = null;
        $this->pilihan_evaluasi = null;
        $this->jurusan_id = null;
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
            if ($this->collBukus) {
                foreach ($this->collBukus as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collKompetensis) {
                foreach ($this->collKompetensis as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collMapBidangMataPelajarans) {
                foreach ($this->collMapBidangMataPelajarans as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collMapelBiblios) {
                foreach ($this->collMapelBiblios as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collMataPelajaranKurikulums) {
                foreach ($this->collMataPelajaranKurikulums as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collMatevRapors) {
                foreach ($this->collMatevRapors as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collMuloks) {
                foreach ($this->collMuloks as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collPembelajarans) {
                foreach ($this->collPembelajarans as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collPengawasTerdaftars) {
                foreach ($this->collPengawasTerdaftars as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collTemplateRapors) {
                foreach ($this->collTemplateRapors as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collTemplateUnsRelatedByMp3Id) {
                foreach ($this->collTemplateUnsRelatedByMp3Id as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collTemplateUnsRelatedByMp4Id) {
                foreach ($this->collTemplateUnsRelatedByMp4Id as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collTemplateUnsRelatedByMp7Id) {
                foreach ($this->collTemplateUnsRelatedByMp7Id as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collTemplateUnsRelatedByMp5Id) {
                foreach ($this->collTemplateUnsRelatedByMp5Id as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collTemplateUnsRelatedByMp1Id) {
                foreach ($this->collTemplateUnsRelatedByMp1Id as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collTemplateUnsRelatedByMp2Id) {
                foreach ($this->collTemplateUnsRelatedByMp2Id as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collTemplateUnsRelatedByMp6Id) {
                foreach ($this->collTemplateUnsRelatedByMp6Id as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aJurusan instanceof Persistent) {
              $this->aJurusan->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collBukus instanceof PropelCollection) {
            $this->collBukus->clearIterator();
        }
        $this->collBukus = null;
        if ($this->collKompetensis instanceof PropelCollection) {
            $this->collKompetensis->clearIterator();
        }
        $this->collKompetensis = null;
        if ($this->collMapBidangMataPelajarans instanceof PropelCollection) {
            $this->collMapBidangMataPelajarans->clearIterator();
        }
        $this->collMapBidangMataPelajarans = null;
        if ($this->collMapelBiblios instanceof PropelCollection) {
            $this->collMapelBiblios->clearIterator();
        }
        $this->collMapelBiblios = null;
        if ($this->collMataPelajaranKurikulums instanceof PropelCollection) {
            $this->collMataPelajaranKurikulums->clearIterator();
        }
        $this->collMataPelajaranKurikulums = null;
        if ($this->collMatevRapors instanceof PropelCollection) {
            $this->collMatevRapors->clearIterator();
        }
        $this->collMatevRapors = null;
        if ($this->collMuloks instanceof PropelCollection) {
            $this->collMuloks->clearIterator();
        }
        $this->collMuloks = null;
        if ($this->collPembelajarans instanceof PropelCollection) {
            $this->collPembelajarans->clearIterator();
        }
        $this->collPembelajarans = null;
        if ($this->collPengawasTerdaftars instanceof PropelCollection) {
            $this->collPengawasTerdaftars->clearIterator();
        }
        $this->collPengawasTerdaftars = null;
        if ($this->collTemplateRapors instanceof PropelCollection) {
            $this->collTemplateRapors->clearIterator();
        }
        $this->collTemplateRapors = null;
        if ($this->collTemplateUnsRelatedByMp3Id instanceof PropelCollection) {
            $this->collTemplateUnsRelatedByMp3Id->clearIterator();
        }
        $this->collTemplateUnsRelatedByMp3Id = null;
        if ($this->collTemplateUnsRelatedByMp4Id instanceof PropelCollection) {
            $this->collTemplateUnsRelatedByMp4Id->clearIterator();
        }
        $this->collTemplateUnsRelatedByMp4Id = null;
        if ($this->collTemplateUnsRelatedByMp7Id instanceof PropelCollection) {
            $this->collTemplateUnsRelatedByMp7Id->clearIterator();
        }
        $this->collTemplateUnsRelatedByMp7Id = null;
        if ($this->collTemplateUnsRelatedByMp5Id instanceof PropelCollection) {
            $this->collTemplateUnsRelatedByMp5Id->clearIterator();
        }
        $this->collTemplateUnsRelatedByMp5Id = null;
        if ($this->collTemplateUnsRelatedByMp1Id instanceof PropelCollection) {
            $this->collTemplateUnsRelatedByMp1Id->clearIterator();
        }
        $this->collTemplateUnsRelatedByMp1Id = null;
        if ($this->collTemplateUnsRelatedByMp2Id instanceof PropelCollection) {
            $this->collTemplateUnsRelatedByMp2Id->clearIterator();
        }
        $this->collTemplateUnsRelatedByMp2Id = null;
        if ($this->collTemplateUnsRelatedByMp6Id instanceof PropelCollection) {
            $this->collTemplateUnsRelatedByMp6Id->clearIterator();
        }
        $this->collTemplateUnsRelatedByMp6Id = null;
        $this->aJurusan = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(MataPelajaranPeer::DEFAULT_STRING_FORMAT);
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
