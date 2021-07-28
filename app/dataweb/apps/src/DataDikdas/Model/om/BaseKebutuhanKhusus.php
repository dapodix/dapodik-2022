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
use DataDikdas\Model\JenisSertifikasi;
use DataDikdas\Model\JenisSertifikasiQuery;
use DataDikdas\Model\JurusanSp;
use DataDikdas\Model\JurusanSpQuery;
use DataDikdas\Model\KebutuhanKhusus;
use DataDikdas\Model\KebutuhanKhususPeer;
use DataDikdas\Model\KebutuhanKhususQuery;
use DataDikdas\Model\PesertaDidik;
use DataDikdas\Model\PesertaDidikQuery;
use DataDikdas\Model\ProgramInklusi;
use DataDikdas\Model\ProgramInklusiQuery;
use DataDikdas\Model\Ptk;
use DataDikdas\Model\PtkQuery;
use DataDikdas\Model\RombonganBelajar;
use DataDikdas\Model\RombonganBelajarQuery;
use DataDikdas\Model\Sekolah;
use DataDikdas\Model\SekolahQuery;

/**
 * Base class that represents a row from the 'ref.kebutuhan_khusus' table.
 *
 * 
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseKebutuhanKhusus extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'DataDikdas\\Model\\KebutuhanKhususPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        KebutuhanKhususPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the kebutuhan_khusus_id field.
     * @var        int
     */
    protected $kebutuhan_khusus_id;

    /**
     * The value for the kebutuhan_khusus field.
     * @var        string
     */
    protected $kebutuhan_khusus;

    /**
     * The value for the kk_a field.
     * @var        string
     */
    protected $kk_a;

    /**
     * The value for the kk_b field.
     * @var        string
     */
    protected $kk_b;

    /**
     * The value for the kk_c field.
     * @var        string
     */
    protected $kk_c;

    /**
     * The value for the kk_c1 field.
     * @var        string
     */
    protected $kk_c1;

    /**
     * The value for the kk_d field.
     * @var        string
     */
    protected $kk_d;

    /**
     * The value for the kk_d1 field.
     * @var        string
     */
    protected $kk_d1;

    /**
     * The value for the kk_e field.
     * @var        string
     */
    protected $kk_e;

    /**
     * The value for the kk_f field.
     * @var        string
     */
    protected $kk_f;

    /**
     * The value for the kk_h field.
     * @var        string
     */
    protected $kk_h;

    /**
     * The value for the kk_i field.
     * @var        string
     */
    protected $kk_i;

    /**
     * The value for the kk_j field.
     * @var        string
     */
    protected $kk_j;

    /**
     * The value for the kk_k field.
     * @var        string
     */
    protected $kk_k;

    /**
     * The value for the kk_n field.
     * @var        string
     */
    protected $kk_n;

    /**
     * The value for the kk_o field.
     * @var        string
     */
    protected $kk_o;

    /**
     * The value for the kk_p field.
     * @var        string
     */
    protected $kk_p;

    /**
     * The value for the kk_q field.
     * @var        string
     */
    protected $kk_q;

    /**
     * The value for the untuk_lembaga field.
     * Note: this column has a database default value of: '1'
     * @var        string
     */
    protected $untuk_lembaga;

    /**
     * The value for the untuk_ptk field.
     * Note: this column has a database default value of: '1'
     * @var        string
     */
    protected $untuk_ptk;

    /**
     * The value for the untuk_pd field.
     * Note: this column has a database default value of: '1'
     * @var        string
     */
    protected $untuk_pd;

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
     * @var        PropelObjectCollection|JenisSertifikasi[] Collection to store aggregation of JenisSertifikasi objects.
     */
    protected $collJenisSertifikasis;
    protected $collJenisSertifikasisPartial;

    /**
     * @var        PropelObjectCollection|JurusanSp[] Collection to store aggregation of JurusanSp objects.
     */
    protected $collJurusanSps;
    protected $collJurusanSpsPartial;

    /**
     * @var        PropelObjectCollection|PesertaDidik[] Collection to store aggregation of PesertaDidik objects.
     */
    protected $collPesertaDidiksRelatedByKebutuhanKhususIdAyah;
    protected $collPesertaDidiksRelatedByKebutuhanKhususIdAyahPartial;

    /**
     * @var        PropelObjectCollection|PesertaDidik[] Collection to store aggregation of PesertaDidik objects.
     */
    protected $collPesertaDidiksRelatedByKebutuhanKhususIdIbu;
    protected $collPesertaDidiksRelatedByKebutuhanKhususIdIbuPartial;

    /**
     * @var        PropelObjectCollection|PesertaDidik[] Collection to store aggregation of PesertaDidik objects.
     */
    protected $collPesertaDidiksRelatedByKebutuhanKhususId;
    protected $collPesertaDidiksRelatedByKebutuhanKhususIdPartial;

    /**
     * @var        PropelObjectCollection|ProgramInklusi[] Collection to store aggregation of ProgramInklusi objects.
     */
    protected $collProgramInklusis;
    protected $collProgramInklusisPartial;

    /**
     * @var        PropelObjectCollection|Ptk[] Collection to store aggregation of Ptk objects.
     */
    protected $collPtks;
    protected $collPtksPartial;

    /**
     * @var        PropelObjectCollection|RombonganBelajar[] Collection to store aggregation of RombonganBelajar objects.
     */
    protected $collRombonganBelajars;
    protected $collRombonganBelajarsPartial;

    /**
     * @var        PropelObjectCollection|Sekolah[] Collection to store aggregation of Sekolah objects.
     */
    protected $collSekolahs;
    protected $collSekolahsPartial;

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
    protected $jenisSertifikasisScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $jurusanSpsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $pesertaDidiksRelatedByKebutuhanKhususIdAyahScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $pesertaDidiksRelatedByKebutuhanKhususIdIbuScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $pesertaDidiksRelatedByKebutuhanKhususIdScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $programInklusisScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $ptksScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $rombonganBelajarsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $sekolahsScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->untuk_lembaga = '1';
        $this->untuk_ptk = '1';
        $this->untuk_pd = '1';
        $this->last_sync = '1901-01-01 00:00:00';
    }

    /**
     * Initializes internal state of BaseKebutuhanKhusus object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
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
     * Get the [kebutuhan_khusus] column value.
     * 
     * @return string
     */
    public function getKebutuhanKhusus()
    {
        return $this->kebutuhan_khusus;
    }

    /**
     * Get the [kk_a] column value.
     * 
     * @return string
     */
    public function getKkA()
    {
        return $this->kk_a;
    }

    /**
     * Get the [kk_b] column value.
     * 
     * @return string
     */
    public function getKkB()
    {
        return $this->kk_b;
    }

    /**
     * Get the [kk_c] column value.
     * 
     * @return string
     */
    public function getKkC()
    {
        return $this->kk_c;
    }

    /**
     * Get the [kk_c1] column value.
     * 
     * @return string
     */
    public function getKkC1()
    {
        return $this->kk_c1;
    }

    /**
     * Get the [kk_d] column value.
     * 
     * @return string
     */
    public function getKkD()
    {
        return $this->kk_d;
    }

    /**
     * Get the [kk_d1] column value.
     * 
     * @return string
     */
    public function getKkD1()
    {
        return $this->kk_d1;
    }

    /**
     * Get the [kk_e] column value.
     * 
     * @return string
     */
    public function getKkE()
    {
        return $this->kk_e;
    }

    /**
     * Get the [kk_f] column value.
     * 
     * @return string
     */
    public function getKkF()
    {
        return $this->kk_f;
    }

    /**
     * Get the [kk_h] column value.
     * 
     * @return string
     */
    public function getKkH()
    {
        return $this->kk_h;
    }

    /**
     * Get the [kk_i] column value.
     * 
     * @return string
     */
    public function getKkI()
    {
        return $this->kk_i;
    }

    /**
     * Get the [kk_j] column value.
     * 
     * @return string
     */
    public function getKkJ()
    {
        return $this->kk_j;
    }

    /**
     * Get the [kk_k] column value.
     * 
     * @return string
     */
    public function getKkK()
    {
        return $this->kk_k;
    }

    /**
     * Get the [kk_n] column value.
     * 
     * @return string
     */
    public function getKkN()
    {
        return $this->kk_n;
    }

    /**
     * Get the [kk_o] column value.
     * 
     * @return string
     */
    public function getKkO()
    {
        return $this->kk_o;
    }

    /**
     * Get the [kk_p] column value.
     * 
     * @return string
     */
    public function getKkP()
    {
        return $this->kk_p;
    }

    /**
     * Get the [kk_q] column value.
     * 
     * @return string
     */
    public function getKkQ()
    {
        return $this->kk_q;
    }

    /**
     * Get the [untuk_lembaga] column value.
     * 
     * @return string
     */
    public function getUntukLembaga()
    {
        return $this->untuk_lembaga;
    }

    /**
     * Get the [untuk_ptk] column value.
     * 
     * @return string
     */
    public function getUntukPtk()
    {
        return $this->untuk_ptk;
    }

    /**
     * Get the [untuk_pd] column value.
     * 
     * @return string
     */
    public function getUntukPd()
    {
        return $this->untuk_pd;
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
     * Set the value of [kebutuhan_khusus_id] column.
     * 
     * @param int $v new value
     * @return KebutuhanKhusus The current object (for fluent API support)
     */
    public function setKebutuhanKhususId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->kebutuhan_khusus_id !== $v) {
            $this->kebutuhan_khusus_id = $v;
            $this->modifiedColumns[] = KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID;
        }


        return $this;
    } // setKebutuhanKhususId()

    /**
     * Set the value of [kebutuhan_khusus] column.
     * 
     * @param string $v new value
     * @return KebutuhanKhusus The current object (for fluent API support)
     */
    public function setKebutuhanKhusus($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->kebutuhan_khusus !== $v) {
            $this->kebutuhan_khusus = $v;
            $this->modifiedColumns[] = KebutuhanKhususPeer::KEBUTUHAN_KHUSUS;
        }


        return $this;
    } // setKebutuhanKhusus()

    /**
     * Set the value of [kk_a] column.
     * 
     * @param string $v new value
     * @return KebutuhanKhusus The current object (for fluent API support)
     */
    public function setKkA($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->kk_a !== $v) {
            $this->kk_a = $v;
            $this->modifiedColumns[] = KebutuhanKhususPeer::KK_A;
        }


        return $this;
    } // setKkA()

    /**
     * Set the value of [kk_b] column.
     * 
     * @param string $v new value
     * @return KebutuhanKhusus The current object (for fluent API support)
     */
    public function setKkB($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->kk_b !== $v) {
            $this->kk_b = $v;
            $this->modifiedColumns[] = KebutuhanKhususPeer::KK_B;
        }


        return $this;
    } // setKkB()

    /**
     * Set the value of [kk_c] column.
     * 
     * @param string $v new value
     * @return KebutuhanKhusus The current object (for fluent API support)
     */
    public function setKkC($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->kk_c !== $v) {
            $this->kk_c = $v;
            $this->modifiedColumns[] = KebutuhanKhususPeer::KK_C;
        }


        return $this;
    } // setKkC()

    /**
     * Set the value of [kk_c1] column.
     * 
     * @param string $v new value
     * @return KebutuhanKhusus The current object (for fluent API support)
     */
    public function setKkC1($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->kk_c1 !== $v) {
            $this->kk_c1 = $v;
            $this->modifiedColumns[] = KebutuhanKhususPeer::KK_C1;
        }


        return $this;
    } // setKkC1()

    /**
     * Set the value of [kk_d] column.
     * 
     * @param string $v new value
     * @return KebutuhanKhusus The current object (for fluent API support)
     */
    public function setKkD($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->kk_d !== $v) {
            $this->kk_d = $v;
            $this->modifiedColumns[] = KebutuhanKhususPeer::KK_D;
        }


        return $this;
    } // setKkD()

    /**
     * Set the value of [kk_d1] column.
     * 
     * @param string $v new value
     * @return KebutuhanKhusus The current object (for fluent API support)
     */
    public function setKkD1($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->kk_d1 !== $v) {
            $this->kk_d1 = $v;
            $this->modifiedColumns[] = KebutuhanKhususPeer::KK_D1;
        }


        return $this;
    } // setKkD1()

    /**
     * Set the value of [kk_e] column.
     * 
     * @param string $v new value
     * @return KebutuhanKhusus The current object (for fluent API support)
     */
    public function setKkE($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->kk_e !== $v) {
            $this->kk_e = $v;
            $this->modifiedColumns[] = KebutuhanKhususPeer::KK_E;
        }


        return $this;
    } // setKkE()

    /**
     * Set the value of [kk_f] column.
     * 
     * @param string $v new value
     * @return KebutuhanKhusus The current object (for fluent API support)
     */
    public function setKkF($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->kk_f !== $v) {
            $this->kk_f = $v;
            $this->modifiedColumns[] = KebutuhanKhususPeer::KK_F;
        }


        return $this;
    } // setKkF()

    /**
     * Set the value of [kk_h] column.
     * 
     * @param string $v new value
     * @return KebutuhanKhusus The current object (for fluent API support)
     */
    public function setKkH($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->kk_h !== $v) {
            $this->kk_h = $v;
            $this->modifiedColumns[] = KebutuhanKhususPeer::KK_H;
        }


        return $this;
    } // setKkH()

    /**
     * Set the value of [kk_i] column.
     * 
     * @param string $v new value
     * @return KebutuhanKhusus The current object (for fluent API support)
     */
    public function setKkI($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->kk_i !== $v) {
            $this->kk_i = $v;
            $this->modifiedColumns[] = KebutuhanKhususPeer::KK_I;
        }


        return $this;
    } // setKkI()

    /**
     * Set the value of [kk_j] column.
     * 
     * @param string $v new value
     * @return KebutuhanKhusus The current object (for fluent API support)
     */
    public function setKkJ($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->kk_j !== $v) {
            $this->kk_j = $v;
            $this->modifiedColumns[] = KebutuhanKhususPeer::KK_J;
        }


        return $this;
    } // setKkJ()

    /**
     * Set the value of [kk_k] column.
     * 
     * @param string $v new value
     * @return KebutuhanKhusus The current object (for fluent API support)
     */
    public function setKkK($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->kk_k !== $v) {
            $this->kk_k = $v;
            $this->modifiedColumns[] = KebutuhanKhususPeer::KK_K;
        }


        return $this;
    } // setKkK()

    /**
     * Set the value of [kk_n] column.
     * 
     * @param string $v new value
     * @return KebutuhanKhusus The current object (for fluent API support)
     */
    public function setKkN($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->kk_n !== $v) {
            $this->kk_n = $v;
            $this->modifiedColumns[] = KebutuhanKhususPeer::KK_N;
        }


        return $this;
    } // setKkN()

    /**
     * Set the value of [kk_o] column.
     * 
     * @param string $v new value
     * @return KebutuhanKhusus The current object (for fluent API support)
     */
    public function setKkO($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->kk_o !== $v) {
            $this->kk_o = $v;
            $this->modifiedColumns[] = KebutuhanKhususPeer::KK_O;
        }


        return $this;
    } // setKkO()

    /**
     * Set the value of [kk_p] column.
     * 
     * @param string $v new value
     * @return KebutuhanKhusus The current object (for fluent API support)
     */
    public function setKkP($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->kk_p !== $v) {
            $this->kk_p = $v;
            $this->modifiedColumns[] = KebutuhanKhususPeer::KK_P;
        }


        return $this;
    } // setKkP()

    /**
     * Set the value of [kk_q] column.
     * 
     * @param string $v new value
     * @return KebutuhanKhusus The current object (for fluent API support)
     */
    public function setKkQ($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->kk_q !== $v) {
            $this->kk_q = $v;
            $this->modifiedColumns[] = KebutuhanKhususPeer::KK_Q;
        }


        return $this;
    } // setKkQ()

    /**
     * Set the value of [untuk_lembaga] column.
     * 
     * @param string $v new value
     * @return KebutuhanKhusus The current object (for fluent API support)
     */
    public function setUntukLembaga($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->untuk_lembaga !== $v) {
            $this->untuk_lembaga = $v;
            $this->modifiedColumns[] = KebutuhanKhususPeer::UNTUK_LEMBAGA;
        }


        return $this;
    } // setUntukLembaga()

    /**
     * Set the value of [untuk_ptk] column.
     * 
     * @param string $v new value
     * @return KebutuhanKhusus The current object (for fluent API support)
     */
    public function setUntukPtk($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->untuk_ptk !== $v) {
            $this->untuk_ptk = $v;
            $this->modifiedColumns[] = KebutuhanKhususPeer::UNTUK_PTK;
        }


        return $this;
    } // setUntukPtk()

    /**
     * Set the value of [untuk_pd] column.
     * 
     * @param string $v new value
     * @return KebutuhanKhusus The current object (for fluent API support)
     */
    public function setUntukPd($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->untuk_pd !== $v) {
            $this->untuk_pd = $v;
            $this->modifiedColumns[] = KebutuhanKhususPeer::UNTUK_PD;
        }


        return $this;
    } // setUntukPd()

    /**
     * Sets the value of [create_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return KebutuhanKhusus The current object (for fluent API support)
     */
    public function setCreateDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->create_date !== null || $dt !== null) {
            $currentDateAsString = ($this->create_date !== null && $tmpDt = new DateTime($this->create_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->create_date = $newDateAsString;
                $this->modifiedColumns[] = KebutuhanKhususPeer::CREATE_DATE;
            }
        } // if either are not null


        return $this;
    } // setCreateDate()

    /**
     * Sets the value of [last_update] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return KebutuhanKhusus The current object (for fluent API support)
     */
    public function setLastUpdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->last_update !== null || $dt !== null) {
            $currentDateAsString = ($this->last_update !== null && $tmpDt = new DateTime($this->last_update)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->last_update = $newDateAsString;
                $this->modifiedColumns[] = KebutuhanKhususPeer::LAST_UPDATE;
            }
        } // if either are not null


        return $this;
    } // setLastUpdate()

    /**
     * Sets the value of [expired_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return KebutuhanKhusus The current object (for fluent API support)
     */
    public function setExpiredDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->expired_date !== null || $dt !== null) {
            $currentDateAsString = ($this->expired_date !== null && $tmpDt = new DateTime($this->expired_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->expired_date = $newDateAsString;
                $this->modifiedColumns[] = KebutuhanKhususPeer::EXPIRED_DATE;
            }
        } // if either are not null


        return $this;
    } // setExpiredDate()

    /**
     * Sets the value of [last_sync] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return KebutuhanKhusus The current object (for fluent API support)
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
                $this->modifiedColumns[] = KebutuhanKhususPeer::LAST_SYNC;
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
            if ($this->untuk_lembaga !== '1') {
                return false;
            }

            if ($this->untuk_ptk !== '1') {
                return false;
            }

            if ($this->untuk_pd !== '1') {
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

            $this->kebutuhan_khusus_id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->kebutuhan_khusus = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->kk_a = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->kk_b = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->kk_c = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->kk_c1 = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->kk_d = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->kk_d1 = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->kk_e = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->kk_f = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
            $this->kk_h = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
            $this->kk_i = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
            $this->kk_j = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
            $this->kk_k = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
            $this->kk_n = ($row[$startcol + 14] !== null) ? (string) $row[$startcol + 14] : null;
            $this->kk_o = ($row[$startcol + 15] !== null) ? (string) $row[$startcol + 15] : null;
            $this->kk_p = ($row[$startcol + 16] !== null) ? (string) $row[$startcol + 16] : null;
            $this->kk_q = ($row[$startcol + 17] !== null) ? (string) $row[$startcol + 17] : null;
            $this->untuk_lembaga = ($row[$startcol + 18] !== null) ? (string) $row[$startcol + 18] : null;
            $this->untuk_ptk = ($row[$startcol + 19] !== null) ? (string) $row[$startcol + 19] : null;
            $this->untuk_pd = ($row[$startcol + 20] !== null) ? (string) $row[$startcol + 20] : null;
            $this->create_date = ($row[$startcol + 21] !== null) ? (string) $row[$startcol + 21] : null;
            $this->last_update = ($row[$startcol + 22] !== null) ? (string) $row[$startcol + 22] : null;
            $this->expired_date = ($row[$startcol + 23] !== null) ? (string) $row[$startcol + 23] : null;
            $this->last_sync = ($row[$startcol + 24] !== null) ? (string) $row[$startcol + 24] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 25; // 25 = KebutuhanKhususPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating KebutuhanKhusus object", $e);
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
            $con = Propel::getConnection(KebutuhanKhususPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = KebutuhanKhususPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->collJenisSertifikasis = null;

            $this->collJurusanSps = null;

            $this->collPesertaDidiksRelatedByKebutuhanKhususIdAyah = null;

            $this->collPesertaDidiksRelatedByKebutuhanKhususIdIbu = null;

            $this->collPesertaDidiksRelatedByKebutuhanKhususId = null;

            $this->collProgramInklusis = null;

            $this->collPtks = null;

            $this->collRombonganBelajars = null;

            $this->collSekolahs = null;

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
            $con = Propel::getConnection(KebutuhanKhususPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = KebutuhanKhususQuery::create()
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
            $con = Propel::getConnection(KebutuhanKhususPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                KebutuhanKhususPeer::addInstanceToPool($this);
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

            if ($this->jenisSertifikasisScheduledForDeletion !== null) {
                if (!$this->jenisSertifikasisScheduledForDeletion->isEmpty()) {
                    JenisSertifikasiQuery::create()
                        ->filterByPrimaryKeys($this->jenisSertifikasisScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->jenisSertifikasisScheduledForDeletion = null;
                }
            }

            if ($this->collJenisSertifikasis !== null) {
                foreach ($this->collJenisSertifikasis as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->jurusanSpsScheduledForDeletion !== null) {
                if (!$this->jurusanSpsScheduledForDeletion->isEmpty()) {
                    JurusanSpQuery::create()
                        ->filterByPrimaryKeys($this->jurusanSpsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->jurusanSpsScheduledForDeletion = null;
                }
            }

            if ($this->collJurusanSps !== null) {
                foreach ($this->collJurusanSps as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->pesertaDidiksRelatedByKebutuhanKhususIdAyahScheduledForDeletion !== null) {
                if (!$this->pesertaDidiksRelatedByKebutuhanKhususIdAyahScheduledForDeletion->isEmpty()) {
                    PesertaDidikQuery::create()
                        ->filterByPrimaryKeys($this->pesertaDidiksRelatedByKebutuhanKhususIdAyahScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->pesertaDidiksRelatedByKebutuhanKhususIdAyahScheduledForDeletion = null;
                }
            }

            if ($this->collPesertaDidiksRelatedByKebutuhanKhususIdAyah !== null) {
                foreach ($this->collPesertaDidiksRelatedByKebutuhanKhususIdAyah as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->pesertaDidiksRelatedByKebutuhanKhususIdIbuScheduledForDeletion !== null) {
                if (!$this->pesertaDidiksRelatedByKebutuhanKhususIdIbuScheduledForDeletion->isEmpty()) {
                    PesertaDidikQuery::create()
                        ->filterByPrimaryKeys($this->pesertaDidiksRelatedByKebutuhanKhususIdIbuScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->pesertaDidiksRelatedByKebutuhanKhususIdIbuScheduledForDeletion = null;
                }
            }

            if ($this->collPesertaDidiksRelatedByKebutuhanKhususIdIbu !== null) {
                foreach ($this->collPesertaDidiksRelatedByKebutuhanKhususIdIbu as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->pesertaDidiksRelatedByKebutuhanKhususIdScheduledForDeletion !== null) {
                if (!$this->pesertaDidiksRelatedByKebutuhanKhususIdScheduledForDeletion->isEmpty()) {
                    PesertaDidikQuery::create()
                        ->filterByPrimaryKeys($this->pesertaDidiksRelatedByKebutuhanKhususIdScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->pesertaDidiksRelatedByKebutuhanKhususIdScheduledForDeletion = null;
                }
            }

            if ($this->collPesertaDidiksRelatedByKebutuhanKhususId !== null) {
                foreach ($this->collPesertaDidiksRelatedByKebutuhanKhususId as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->programInklusisScheduledForDeletion !== null) {
                if (!$this->programInklusisScheduledForDeletion->isEmpty()) {
                    ProgramInklusiQuery::create()
                        ->filterByPrimaryKeys($this->programInklusisScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->programInklusisScheduledForDeletion = null;
                }
            }

            if ($this->collProgramInklusis !== null) {
                foreach ($this->collProgramInklusis as $referrerFK) {
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
        if ($this->isColumnModified(KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID)) {
            $modifiedColumns[':p' . $index++]  = '"kebutuhan_khusus_id"';
        }
        if ($this->isColumnModified(KebutuhanKhususPeer::KEBUTUHAN_KHUSUS)) {
            $modifiedColumns[':p' . $index++]  = '"kebutuhan_khusus"';
        }
        if ($this->isColumnModified(KebutuhanKhususPeer::KK_A)) {
            $modifiedColumns[':p' . $index++]  = '"kk_a"';
        }
        if ($this->isColumnModified(KebutuhanKhususPeer::KK_B)) {
            $modifiedColumns[':p' . $index++]  = '"kk_b"';
        }
        if ($this->isColumnModified(KebutuhanKhususPeer::KK_C)) {
            $modifiedColumns[':p' . $index++]  = '"kk_c"';
        }
        if ($this->isColumnModified(KebutuhanKhususPeer::KK_C1)) {
            $modifiedColumns[':p' . $index++]  = '"kk_c1"';
        }
        if ($this->isColumnModified(KebutuhanKhususPeer::KK_D)) {
            $modifiedColumns[':p' . $index++]  = '"kk_d"';
        }
        if ($this->isColumnModified(KebutuhanKhususPeer::KK_D1)) {
            $modifiedColumns[':p' . $index++]  = '"kk_d1"';
        }
        if ($this->isColumnModified(KebutuhanKhususPeer::KK_E)) {
            $modifiedColumns[':p' . $index++]  = '"kk_e"';
        }
        if ($this->isColumnModified(KebutuhanKhususPeer::KK_F)) {
            $modifiedColumns[':p' . $index++]  = '"kk_f"';
        }
        if ($this->isColumnModified(KebutuhanKhususPeer::KK_H)) {
            $modifiedColumns[':p' . $index++]  = '"kk_h"';
        }
        if ($this->isColumnModified(KebutuhanKhususPeer::KK_I)) {
            $modifiedColumns[':p' . $index++]  = '"kk_i"';
        }
        if ($this->isColumnModified(KebutuhanKhususPeer::KK_J)) {
            $modifiedColumns[':p' . $index++]  = '"kk_j"';
        }
        if ($this->isColumnModified(KebutuhanKhususPeer::KK_K)) {
            $modifiedColumns[':p' . $index++]  = '"kk_k"';
        }
        if ($this->isColumnModified(KebutuhanKhususPeer::KK_N)) {
            $modifiedColumns[':p' . $index++]  = '"kk_n"';
        }
        if ($this->isColumnModified(KebutuhanKhususPeer::KK_O)) {
            $modifiedColumns[':p' . $index++]  = '"kk_o"';
        }
        if ($this->isColumnModified(KebutuhanKhususPeer::KK_P)) {
            $modifiedColumns[':p' . $index++]  = '"kk_p"';
        }
        if ($this->isColumnModified(KebutuhanKhususPeer::KK_Q)) {
            $modifiedColumns[':p' . $index++]  = '"kk_q"';
        }
        if ($this->isColumnModified(KebutuhanKhususPeer::UNTUK_LEMBAGA)) {
            $modifiedColumns[':p' . $index++]  = '"untuk_lembaga"';
        }
        if ($this->isColumnModified(KebutuhanKhususPeer::UNTUK_PTK)) {
            $modifiedColumns[':p' . $index++]  = '"untuk_ptk"';
        }
        if ($this->isColumnModified(KebutuhanKhususPeer::UNTUK_PD)) {
            $modifiedColumns[':p' . $index++]  = '"untuk_pd"';
        }
        if ($this->isColumnModified(KebutuhanKhususPeer::CREATE_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"create_date"';
        }
        if ($this->isColumnModified(KebutuhanKhususPeer::LAST_UPDATE)) {
            $modifiedColumns[':p' . $index++]  = '"last_update"';
        }
        if ($this->isColumnModified(KebutuhanKhususPeer::EXPIRED_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"expired_date"';
        }
        if ($this->isColumnModified(KebutuhanKhususPeer::LAST_SYNC)) {
            $modifiedColumns[':p' . $index++]  = '"last_sync"';
        }

        $sql = sprintf(
            'INSERT INTO "ref"."kebutuhan_khusus" (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '"kebutuhan_khusus_id"':						
                        $stmt->bindValue($identifier, $this->kebutuhan_khusus_id, PDO::PARAM_INT);
                        break;
                    case '"kebutuhan_khusus"':						
                        $stmt->bindValue($identifier, $this->kebutuhan_khusus, PDO::PARAM_STR);
                        break;
                    case '"kk_a"':						
                        $stmt->bindValue($identifier, $this->kk_a, PDO::PARAM_STR);
                        break;
                    case '"kk_b"':						
                        $stmt->bindValue($identifier, $this->kk_b, PDO::PARAM_STR);
                        break;
                    case '"kk_c"':						
                        $stmt->bindValue($identifier, $this->kk_c, PDO::PARAM_STR);
                        break;
                    case '"kk_c1"':						
                        $stmt->bindValue($identifier, $this->kk_c1, PDO::PARAM_STR);
                        break;
                    case '"kk_d"':						
                        $stmt->bindValue($identifier, $this->kk_d, PDO::PARAM_STR);
                        break;
                    case '"kk_d1"':						
                        $stmt->bindValue($identifier, $this->kk_d1, PDO::PARAM_STR);
                        break;
                    case '"kk_e"':						
                        $stmt->bindValue($identifier, $this->kk_e, PDO::PARAM_STR);
                        break;
                    case '"kk_f"':						
                        $stmt->bindValue($identifier, $this->kk_f, PDO::PARAM_STR);
                        break;
                    case '"kk_h"':						
                        $stmt->bindValue($identifier, $this->kk_h, PDO::PARAM_STR);
                        break;
                    case '"kk_i"':						
                        $stmt->bindValue($identifier, $this->kk_i, PDO::PARAM_STR);
                        break;
                    case '"kk_j"':						
                        $stmt->bindValue($identifier, $this->kk_j, PDO::PARAM_STR);
                        break;
                    case '"kk_k"':						
                        $stmt->bindValue($identifier, $this->kk_k, PDO::PARAM_STR);
                        break;
                    case '"kk_n"':						
                        $stmt->bindValue($identifier, $this->kk_n, PDO::PARAM_STR);
                        break;
                    case '"kk_o"':						
                        $stmt->bindValue($identifier, $this->kk_o, PDO::PARAM_STR);
                        break;
                    case '"kk_p"':						
                        $stmt->bindValue($identifier, $this->kk_p, PDO::PARAM_STR);
                        break;
                    case '"kk_q"':						
                        $stmt->bindValue($identifier, $this->kk_q, PDO::PARAM_STR);
                        break;
                    case '"untuk_lembaga"':						
                        $stmt->bindValue($identifier, $this->untuk_lembaga, PDO::PARAM_STR);
                        break;
                    case '"untuk_ptk"':						
                        $stmt->bindValue($identifier, $this->untuk_ptk, PDO::PARAM_STR);
                        break;
                    case '"untuk_pd"':						
                        $stmt->bindValue($identifier, $this->untuk_pd, PDO::PARAM_STR);
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


            if (($retval = KebutuhanKhususPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collJenisSertifikasis !== null) {
                    foreach ($this->collJenisSertifikasis as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collJurusanSps !== null) {
                    foreach ($this->collJurusanSps as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collPesertaDidiksRelatedByKebutuhanKhususIdAyah !== null) {
                    foreach ($this->collPesertaDidiksRelatedByKebutuhanKhususIdAyah as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collPesertaDidiksRelatedByKebutuhanKhususIdIbu !== null) {
                    foreach ($this->collPesertaDidiksRelatedByKebutuhanKhususIdIbu as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collPesertaDidiksRelatedByKebutuhanKhususId !== null) {
                    foreach ($this->collPesertaDidiksRelatedByKebutuhanKhususId as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collProgramInklusis !== null) {
                    foreach ($this->collProgramInklusis as $referrerFK) {
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

                if ($this->collRombonganBelajars !== null) {
                    foreach ($this->collRombonganBelajars as $referrerFK) {
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
        $pos = KebutuhanKhususPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getKebutuhanKhususId();
                break;
            case 1:
                return $this->getKebutuhanKhusus();
                break;
            case 2:
                return $this->getKkA();
                break;
            case 3:
                return $this->getKkB();
                break;
            case 4:
                return $this->getKkC();
                break;
            case 5:
                return $this->getKkC1();
                break;
            case 6:
                return $this->getKkD();
                break;
            case 7:
                return $this->getKkD1();
                break;
            case 8:
                return $this->getKkE();
                break;
            case 9:
                return $this->getKkF();
                break;
            case 10:
                return $this->getKkH();
                break;
            case 11:
                return $this->getKkI();
                break;
            case 12:
                return $this->getKkJ();
                break;
            case 13:
                return $this->getKkK();
                break;
            case 14:
                return $this->getKkN();
                break;
            case 15:
                return $this->getKkO();
                break;
            case 16:
                return $this->getKkP();
                break;
            case 17:
                return $this->getKkQ();
                break;
            case 18:
                return $this->getUntukLembaga();
                break;
            case 19:
                return $this->getUntukPtk();
                break;
            case 20:
                return $this->getUntukPd();
                break;
            case 21:
                return $this->getCreateDate();
                break;
            case 22:
                return $this->getLastUpdate();
                break;
            case 23:
                return $this->getExpiredDate();
                break;
            case 24:
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
        if (isset($alreadyDumpedObjects['KebutuhanKhusus'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['KebutuhanKhusus'][$this->getPrimaryKey()] = true;
        $keys = KebutuhanKhususPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getKebutuhanKhususId(),
            $keys[1] => $this->getKebutuhanKhusus(),
            $keys[2] => $this->getKkA(),
            $keys[3] => $this->getKkB(),
            $keys[4] => $this->getKkC(),
            $keys[5] => $this->getKkC1(),
            $keys[6] => $this->getKkD(),
            $keys[7] => $this->getKkD1(),
            $keys[8] => $this->getKkE(),
            $keys[9] => $this->getKkF(),
            $keys[10] => $this->getKkH(),
            $keys[11] => $this->getKkI(),
            $keys[12] => $this->getKkJ(),
            $keys[13] => $this->getKkK(),
            $keys[14] => $this->getKkN(),
            $keys[15] => $this->getKkO(),
            $keys[16] => $this->getKkP(),
            $keys[17] => $this->getKkQ(),
            $keys[18] => $this->getUntukLembaga(),
            $keys[19] => $this->getUntukPtk(),
            $keys[20] => $this->getUntukPd(),
            $keys[21] => $this->getCreateDate(),
            $keys[22] => $this->getLastUpdate(),
            $keys[23] => $this->getExpiredDate(),
            $keys[24] => $this->getLastSync(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->collJenisSertifikasis) {
                $result['JenisSertifikasis'] = $this->collJenisSertifikasis->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collJurusanSps) {
                $result['JurusanSps'] = $this->collJurusanSps->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collPesertaDidiksRelatedByKebutuhanKhususIdAyah) {
                $result['PesertaDidiksRelatedByKebutuhanKhususIdAyah'] = $this->collPesertaDidiksRelatedByKebutuhanKhususIdAyah->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collPesertaDidiksRelatedByKebutuhanKhususIdIbu) {
                $result['PesertaDidiksRelatedByKebutuhanKhususIdIbu'] = $this->collPesertaDidiksRelatedByKebutuhanKhususIdIbu->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collPesertaDidiksRelatedByKebutuhanKhususId) {
                $result['PesertaDidiksRelatedByKebutuhanKhususId'] = $this->collPesertaDidiksRelatedByKebutuhanKhususId->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collProgramInklusis) {
                $result['ProgramInklusis'] = $this->collProgramInklusis->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collPtks) {
                $result['Ptks'] = $this->collPtks->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collRombonganBelajars) {
                $result['RombonganBelajars'] = $this->collRombonganBelajars->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collSekolahs) {
                $result['Sekolahs'] = $this->collSekolahs->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = KebutuhanKhususPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setKebutuhanKhususId($value);
                break;
            case 1:
                $this->setKebutuhanKhusus($value);
                break;
            case 2:
                $this->setKkA($value);
                break;
            case 3:
                $this->setKkB($value);
                break;
            case 4:
                $this->setKkC($value);
                break;
            case 5:
                $this->setKkC1($value);
                break;
            case 6:
                $this->setKkD($value);
                break;
            case 7:
                $this->setKkD1($value);
                break;
            case 8:
                $this->setKkE($value);
                break;
            case 9:
                $this->setKkF($value);
                break;
            case 10:
                $this->setKkH($value);
                break;
            case 11:
                $this->setKkI($value);
                break;
            case 12:
                $this->setKkJ($value);
                break;
            case 13:
                $this->setKkK($value);
                break;
            case 14:
                $this->setKkN($value);
                break;
            case 15:
                $this->setKkO($value);
                break;
            case 16:
                $this->setKkP($value);
                break;
            case 17:
                $this->setKkQ($value);
                break;
            case 18:
                $this->setUntukLembaga($value);
                break;
            case 19:
                $this->setUntukPtk($value);
                break;
            case 20:
                $this->setUntukPd($value);
                break;
            case 21:
                $this->setCreateDate($value);
                break;
            case 22:
                $this->setLastUpdate($value);
                break;
            case 23:
                $this->setExpiredDate($value);
                break;
            case 24:
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
        $keys = KebutuhanKhususPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setKebutuhanKhususId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setKebutuhanKhusus($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setKkA($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setKkB($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setKkC($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setKkC1($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setKkD($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setKkD1($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setKkE($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setKkF($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setKkH($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setKkI($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setKkJ($arr[$keys[12]]);
        if (array_key_exists($keys[13], $arr)) $this->setKkK($arr[$keys[13]]);
        if (array_key_exists($keys[14], $arr)) $this->setKkN($arr[$keys[14]]);
        if (array_key_exists($keys[15], $arr)) $this->setKkO($arr[$keys[15]]);
        if (array_key_exists($keys[16], $arr)) $this->setKkP($arr[$keys[16]]);
        if (array_key_exists($keys[17], $arr)) $this->setKkQ($arr[$keys[17]]);
        if (array_key_exists($keys[18], $arr)) $this->setUntukLembaga($arr[$keys[18]]);
        if (array_key_exists($keys[19], $arr)) $this->setUntukPtk($arr[$keys[19]]);
        if (array_key_exists($keys[20], $arr)) $this->setUntukPd($arr[$keys[20]]);
        if (array_key_exists($keys[21], $arr)) $this->setCreateDate($arr[$keys[21]]);
        if (array_key_exists($keys[22], $arr)) $this->setLastUpdate($arr[$keys[22]]);
        if (array_key_exists($keys[23], $arr)) $this->setExpiredDate($arr[$keys[23]]);
        if (array_key_exists($keys[24], $arr)) $this->setLastSync($arr[$keys[24]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(KebutuhanKhususPeer::DATABASE_NAME);

        if ($this->isColumnModified(KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID)) $criteria->add(KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $this->kebutuhan_khusus_id);
        if ($this->isColumnModified(KebutuhanKhususPeer::KEBUTUHAN_KHUSUS)) $criteria->add(KebutuhanKhususPeer::KEBUTUHAN_KHUSUS, $this->kebutuhan_khusus);
        if ($this->isColumnModified(KebutuhanKhususPeer::KK_A)) $criteria->add(KebutuhanKhususPeer::KK_A, $this->kk_a);
        if ($this->isColumnModified(KebutuhanKhususPeer::KK_B)) $criteria->add(KebutuhanKhususPeer::KK_B, $this->kk_b);
        if ($this->isColumnModified(KebutuhanKhususPeer::KK_C)) $criteria->add(KebutuhanKhususPeer::KK_C, $this->kk_c);
        if ($this->isColumnModified(KebutuhanKhususPeer::KK_C1)) $criteria->add(KebutuhanKhususPeer::KK_C1, $this->kk_c1);
        if ($this->isColumnModified(KebutuhanKhususPeer::KK_D)) $criteria->add(KebutuhanKhususPeer::KK_D, $this->kk_d);
        if ($this->isColumnModified(KebutuhanKhususPeer::KK_D1)) $criteria->add(KebutuhanKhususPeer::KK_D1, $this->kk_d1);
        if ($this->isColumnModified(KebutuhanKhususPeer::KK_E)) $criteria->add(KebutuhanKhususPeer::KK_E, $this->kk_e);
        if ($this->isColumnModified(KebutuhanKhususPeer::KK_F)) $criteria->add(KebutuhanKhususPeer::KK_F, $this->kk_f);
        if ($this->isColumnModified(KebutuhanKhususPeer::KK_H)) $criteria->add(KebutuhanKhususPeer::KK_H, $this->kk_h);
        if ($this->isColumnModified(KebutuhanKhususPeer::KK_I)) $criteria->add(KebutuhanKhususPeer::KK_I, $this->kk_i);
        if ($this->isColumnModified(KebutuhanKhususPeer::KK_J)) $criteria->add(KebutuhanKhususPeer::KK_J, $this->kk_j);
        if ($this->isColumnModified(KebutuhanKhususPeer::KK_K)) $criteria->add(KebutuhanKhususPeer::KK_K, $this->kk_k);
        if ($this->isColumnModified(KebutuhanKhususPeer::KK_N)) $criteria->add(KebutuhanKhususPeer::KK_N, $this->kk_n);
        if ($this->isColumnModified(KebutuhanKhususPeer::KK_O)) $criteria->add(KebutuhanKhususPeer::KK_O, $this->kk_o);
        if ($this->isColumnModified(KebutuhanKhususPeer::KK_P)) $criteria->add(KebutuhanKhususPeer::KK_P, $this->kk_p);
        if ($this->isColumnModified(KebutuhanKhususPeer::KK_Q)) $criteria->add(KebutuhanKhususPeer::KK_Q, $this->kk_q);
        if ($this->isColumnModified(KebutuhanKhususPeer::UNTUK_LEMBAGA)) $criteria->add(KebutuhanKhususPeer::UNTUK_LEMBAGA, $this->untuk_lembaga);
        if ($this->isColumnModified(KebutuhanKhususPeer::UNTUK_PTK)) $criteria->add(KebutuhanKhususPeer::UNTUK_PTK, $this->untuk_ptk);
        if ($this->isColumnModified(KebutuhanKhususPeer::UNTUK_PD)) $criteria->add(KebutuhanKhususPeer::UNTUK_PD, $this->untuk_pd);
        if ($this->isColumnModified(KebutuhanKhususPeer::CREATE_DATE)) $criteria->add(KebutuhanKhususPeer::CREATE_DATE, $this->create_date);
        if ($this->isColumnModified(KebutuhanKhususPeer::LAST_UPDATE)) $criteria->add(KebutuhanKhususPeer::LAST_UPDATE, $this->last_update);
        if ($this->isColumnModified(KebutuhanKhususPeer::EXPIRED_DATE)) $criteria->add(KebutuhanKhususPeer::EXPIRED_DATE, $this->expired_date);
        if ($this->isColumnModified(KebutuhanKhususPeer::LAST_SYNC)) $criteria->add(KebutuhanKhususPeer::LAST_SYNC, $this->last_sync);

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
        $criteria = new Criteria(KebutuhanKhususPeer::DATABASE_NAME);
        $criteria->add(KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $this->kebutuhan_khusus_id);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getKebutuhanKhususId();
    }

    /**
     * Generic method to set the primary key (kebutuhan_khusus_id column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setKebutuhanKhususId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getKebutuhanKhususId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of KebutuhanKhusus (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setKebutuhanKhusus($this->getKebutuhanKhusus());
        $copyObj->setKkA($this->getKkA());
        $copyObj->setKkB($this->getKkB());
        $copyObj->setKkC($this->getKkC());
        $copyObj->setKkC1($this->getKkC1());
        $copyObj->setKkD($this->getKkD());
        $copyObj->setKkD1($this->getKkD1());
        $copyObj->setKkE($this->getKkE());
        $copyObj->setKkF($this->getKkF());
        $copyObj->setKkH($this->getKkH());
        $copyObj->setKkI($this->getKkI());
        $copyObj->setKkJ($this->getKkJ());
        $copyObj->setKkK($this->getKkK());
        $copyObj->setKkN($this->getKkN());
        $copyObj->setKkO($this->getKkO());
        $copyObj->setKkP($this->getKkP());
        $copyObj->setKkQ($this->getKkQ());
        $copyObj->setUntukLembaga($this->getUntukLembaga());
        $copyObj->setUntukPtk($this->getUntukPtk());
        $copyObj->setUntukPd($this->getUntukPd());
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

            foreach ($this->getJenisSertifikasis() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addJenisSertifikasi($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getJurusanSps() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addJurusanSp($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getPesertaDidiksRelatedByKebutuhanKhususIdAyah() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPesertaDidikRelatedByKebutuhanKhususIdAyah($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getPesertaDidiksRelatedByKebutuhanKhususIdIbu() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPesertaDidikRelatedByKebutuhanKhususIdIbu($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getPesertaDidiksRelatedByKebutuhanKhususId() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPesertaDidikRelatedByKebutuhanKhususId($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getProgramInklusis() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addProgramInklusi($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getPtks() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPtk($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getRombonganBelajars() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addRombonganBelajar($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getSekolahs() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSekolah($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setKebutuhanKhususId(NULL); // this is a auto-increment column, so set to default value
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
     * @return KebutuhanKhusus Clone of current object.
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
     * @return KebutuhanKhususPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new KebutuhanKhususPeer();
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
        if ('JenisSertifikasi' == $relationName) {
            $this->initJenisSertifikasis();
        }
        if ('JurusanSp' == $relationName) {
            $this->initJurusanSps();
        }
        if ('PesertaDidikRelatedByKebutuhanKhususIdAyah' == $relationName) {
            $this->initPesertaDidiksRelatedByKebutuhanKhususIdAyah();
        }
        if ('PesertaDidikRelatedByKebutuhanKhususIdIbu' == $relationName) {
            $this->initPesertaDidiksRelatedByKebutuhanKhususIdIbu();
        }
        if ('PesertaDidikRelatedByKebutuhanKhususId' == $relationName) {
            $this->initPesertaDidiksRelatedByKebutuhanKhususId();
        }
        if ('ProgramInklusi' == $relationName) {
            $this->initProgramInklusis();
        }
        if ('Ptk' == $relationName) {
            $this->initPtks();
        }
        if ('RombonganBelajar' == $relationName) {
            $this->initRombonganBelajars();
        }
        if ('Sekolah' == $relationName) {
            $this->initSekolahs();
        }
    }

    /**
     * Clears out the collJenisSertifikasis collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return KebutuhanKhusus The current object (for fluent API support)
     * @see        addJenisSertifikasis()
     */
    public function clearJenisSertifikasis()
    {
        $this->collJenisSertifikasis = null; // important to set this to null since that means it is uninitialized
        $this->collJenisSertifikasisPartial = null;

        return $this;
    }

    /**
     * reset is the collJenisSertifikasis collection loaded partially
     *
     * @return void
     */
    public function resetPartialJenisSertifikasis($v = true)
    {
        $this->collJenisSertifikasisPartial = $v;
    }

    /**
     * Initializes the collJenisSertifikasis collection.
     *
     * By default this just sets the collJenisSertifikasis collection to an empty array (like clearcollJenisSertifikasis());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initJenisSertifikasis($overrideExisting = true)
    {
        if (null !== $this->collJenisSertifikasis && !$overrideExisting) {
            return;
        }
        $this->collJenisSertifikasis = new PropelObjectCollection();
        $this->collJenisSertifikasis->setModel('JenisSertifikasi');
    }

    /**
     * Gets an array of JenisSertifikasi objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this KebutuhanKhusus is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|JenisSertifikasi[] List of JenisSertifikasi objects
     * @throws PropelException
     */
    public function getJenisSertifikasis($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collJenisSertifikasisPartial && !$this->isNew();
        if (null === $this->collJenisSertifikasis || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collJenisSertifikasis) {
                // return empty collection
                $this->initJenisSertifikasis();
            } else {
                $collJenisSertifikasis = JenisSertifikasiQuery::create(null, $criteria)
                    ->filterByKebutuhanKhusus($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collJenisSertifikasisPartial && count($collJenisSertifikasis)) {
                      $this->initJenisSertifikasis(false);

                      foreach($collJenisSertifikasis as $obj) {
                        if (false == $this->collJenisSertifikasis->contains($obj)) {
                          $this->collJenisSertifikasis->append($obj);
                        }
                      }

                      $this->collJenisSertifikasisPartial = true;
                    }

                    $collJenisSertifikasis->getInternalIterator()->rewind();
                    return $collJenisSertifikasis;
                }

                if($partial && $this->collJenisSertifikasis) {
                    foreach($this->collJenisSertifikasis as $obj) {
                        if($obj->isNew()) {
                            $collJenisSertifikasis[] = $obj;
                        }
                    }
                }

                $this->collJenisSertifikasis = $collJenisSertifikasis;
                $this->collJenisSertifikasisPartial = false;
            }
        }

        return $this->collJenisSertifikasis;
    }

    /**
     * Sets a collection of JenisSertifikasi objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $jenisSertifikasis A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return KebutuhanKhusus The current object (for fluent API support)
     */
    public function setJenisSertifikasis(PropelCollection $jenisSertifikasis, PropelPDO $con = null)
    {
        $jenisSertifikasisToDelete = $this->getJenisSertifikasis(new Criteria(), $con)->diff($jenisSertifikasis);

        $this->jenisSertifikasisScheduledForDeletion = unserialize(serialize($jenisSertifikasisToDelete));

        foreach ($jenisSertifikasisToDelete as $jenisSertifikasiRemoved) {
            $jenisSertifikasiRemoved->setKebutuhanKhusus(null);
        }

        $this->collJenisSertifikasis = null;
        foreach ($jenisSertifikasis as $jenisSertifikasi) {
            $this->addJenisSertifikasi($jenisSertifikasi);
        }

        $this->collJenisSertifikasis = $jenisSertifikasis;
        $this->collJenisSertifikasisPartial = false;

        return $this;
    }

    /**
     * Returns the number of related JenisSertifikasi objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related JenisSertifikasi objects.
     * @throws PropelException
     */
    public function countJenisSertifikasis(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collJenisSertifikasisPartial && !$this->isNew();
        if (null === $this->collJenisSertifikasis || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collJenisSertifikasis) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getJenisSertifikasis());
            }
            $query = JenisSertifikasiQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByKebutuhanKhusus($this)
                ->count($con);
        }

        return count($this->collJenisSertifikasis);
    }

    /**
     * Method called to associate a JenisSertifikasi object to this object
     * through the JenisSertifikasi foreign key attribute.
     *
     * @param    JenisSertifikasi $l JenisSertifikasi
     * @return KebutuhanKhusus The current object (for fluent API support)
     */
    public function addJenisSertifikasi(JenisSertifikasi $l)
    {
        if ($this->collJenisSertifikasis === null) {
            $this->initJenisSertifikasis();
            $this->collJenisSertifikasisPartial = true;
        }
        if (!in_array($l, $this->collJenisSertifikasis->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddJenisSertifikasi($l);
        }

        return $this;
    }

    /**
     * @param	JenisSertifikasi $jenisSertifikasi The jenisSertifikasi object to add.
     */
    protected function doAddJenisSertifikasi($jenisSertifikasi)
    {
        $this->collJenisSertifikasis[]= $jenisSertifikasi;
        $jenisSertifikasi->setKebutuhanKhusus($this);
    }

    /**
     * @param	JenisSertifikasi $jenisSertifikasi The jenisSertifikasi object to remove.
     * @return KebutuhanKhusus The current object (for fluent API support)
     */
    public function removeJenisSertifikasi($jenisSertifikasi)
    {
        if ($this->getJenisSertifikasis()->contains($jenisSertifikasi)) {
            $this->collJenisSertifikasis->remove($this->collJenisSertifikasis->search($jenisSertifikasi));
            if (null === $this->jenisSertifikasisScheduledForDeletion) {
                $this->jenisSertifikasisScheduledForDeletion = clone $this->collJenisSertifikasis;
                $this->jenisSertifikasisScheduledForDeletion->clear();
            }
            $this->jenisSertifikasisScheduledForDeletion[]= clone $jenisSertifikasi;
            $jenisSertifikasi->setKebutuhanKhusus(null);
        }

        return $this;
    }

    /**
     * Clears out the collJurusanSps collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return KebutuhanKhusus The current object (for fluent API support)
     * @see        addJurusanSps()
     */
    public function clearJurusanSps()
    {
        $this->collJurusanSps = null; // important to set this to null since that means it is uninitialized
        $this->collJurusanSpsPartial = null;

        return $this;
    }

    /**
     * reset is the collJurusanSps collection loaded partially
     *
     * @return void
     */
    public function resetPartialJurusanSps($v = true)
    {
        $this->collJurusanSpsPartial = $v;
    }

    /**
     * Initializes the collJurusanSps collection.
     *
     * By default this just sets the collJurusanSps collection to an empty array (like clearcollJurusanSps());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initJurusanSps($overrideExisting = true)
    {
        if (null !== $this->collJurusanSps && !$overrideExisting) {
            return;
        }
        $this->collJurusanSps = new PropelObjectCollection();
        $this->collJurusanSps->setModel('JurusanSp');
    }

    /**
     * Gets an array of JurusanSp objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this KebutuhanKhusus is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|JurusanSp[] List of JurusanSp objects
     * @throws PropelException
     */
    public function getJurusanSps($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collJurusanSpsPartial && !$this->isNew();
        if (null === $this->collJurusanSps || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collJurusanSps) {
                // return empty collection
                $this->initJurusanSps();
            } else {
                $collJurusanSps = JurusanSpQuery::create(null, $criteria)
                    ->filterByKebutuhanKhusus($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collJurusanSpsPartial && count($collJurusanSps)) {
                      $this->initJurusanSps(false);

                      foreach($collJurusanSps as $obj) {
                        if (false == $this->collJurusanSps->contains($obj)) {
                          $this->collJurusanSps->append($obj);
                        }
                      }

                      $this->collJurusanSpsPartial = true;
                    }

                    $collJurusanSps->getInternalIterator()->rewind();
                    return $collJurusanSps;
                }

                if($partial && $this->collJurusanSps) {
                    foreach($this->collJurusanSps as $obj) {
                        if($obj->isNew()) {
                            $collJurusanSps[] = $obj;
                        }
                    }
                }

                $this->collJurusanSps = $collJurusanSps;
                $this->collJurusanSpsPartial = false;
            }
        }

        return $this->collJurusanSps;
    }

    /**
     * Sets a collection of JurusanSp objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $jurusanSps A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return KebutuhanKhusus The current object (for fluent API support)
     */
    public function setJurusanSps(PropelCollection $jurusanSps, PropelPDO $con = null)
    {
        $jurusanSpsToDelete = $this->getJurusanSps(new Criteria(), $con)->diff($jurusanSps);

        $this->jurusanSpsScheduledForDeletion = unserialize(serialize($jurusanSpsToDelete));

        foreach ($jurusanSpsToDelete as $jurusanSpRemoved) {
            $jurusanSpRemoved->setKebutuhanKhusus(null);
        }

        $this->collJurusanSps = null;
        foreach ($jurusanSps as $jurusanSp) {
            $this->addJurusanSp($jurusanSp);
        }

        $this->collJurusanSps = $jurusanSps;
        $this->collJurusanSpsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related JurusanSp objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related JurusanSp objects.
     * @throws PropelException
     */
    public function countJurusanSps(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collJurusanSpsPartial && !$this->isNew();
        if (null === $this->collJurusanSps || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collJurusanSps) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getJurusanSps());
            }
            $query = JurusanSpQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByKebutuhanKhusus($this)
                ->count($con);
        }

        return count($this->collJurusanSps);
    }

    /**
     * Method called to associate a JurusanSp object to this object
     * through the JurusanSp foreign key attribute.
     *
     * @param    JurusanSp $l JurusanSp
     * @return KebutuhanKhusus The current object (for fluent API support)
     */
    public function addJurusanSp(JurusanSp $l)
    {
        if ($this->collJurusanSps === null) {
            $this->initJurusanSps();
            $this->collJurusanSpsPartial = true;
        }
        if (!in_array($l, $this->collJurusanSps->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddJurusanSp($l);
        }

        return $this;
    }

    /**
     * @param	JurusanSp $jurusanSp The jurusanSp object to add.
     */
    protected function doAddJurusanSp($jurusanSp)
    {
        $this->collJurusanSps[]= $jurusanSp;
        $jurusanSp->setKebutuhanKhusus($this);
    }

    /**
     * @param	JurusanSp $jurusanSp The jurusanSp object to remove.
     * @return KebutuhanKhusus The current object (for fluent API support)
     */
    public function removeJurusanSp($jurusanSp)
    {
        if ($this->getJurusanSps()->contains($jurusanSp)) {
            $this->collJurusanSps->remove($this->collJurusanSps->search($jurusanSp));
            if (null === $this->jurusanSpsScheduledForDeletion) {
                $this->jurusanSpsScheduledForDeletion = clone $this->collJurusanSps;
                $this->jurusanSpsScheduledForDeletion->clear();
            }
            $this->jurusanSpsScheduledForDeletion[]= clone $jurusanSp;
            $jurusanSp->setKebutuhanKhusus(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this KebutuhanKhusus is new, it will return
     * an empty collection; or if this KebutuhanKhusus has previously
     * been saved, it will retrieve related JurusanSps from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in KebutuhanKhusus.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|JurusanSp[] List of JurusanSp objects
     */
    public function getJurusanSpsJoinSekolah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = JurusanSpQuery::create(null, $criteria);
        $query->joinWith('Sekolah', $join_behavior);

        return $this->getJurusanSps($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this KebutuhanKhusus is new, it will return
     * an empty collection; or if this KebutuhanKhusus has previously
     * been saved, it will retrieve related JurusanSps from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in KebutuhanKhusus.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|JurusanSp[] List of JurusanSp objects
     */
    public function getJurusanSpsJoinJurusan($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = JurusanSpQuery::create(null, $criteria);
        $query->joinWith('Jurusan', $join_behavior);

        return $this->getJurusanSps($query, $con);
    }

    /**
     * Clears out the collPesertaDidiksRelatedByKebutuhanKhususIdAyah collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return KebutuhanKhusus The current object (for fluent API support)
     * @see        addPesertaDidiksRelatedByKebutuhanKhususIdAyah()
     */
    public function clearPesertaDidiksRelatedByKebutuhanKhususIdAyah()
    {
        $this->collPesertaDidiksRelatedByKebutuhanKhususIdAyah = null; // important to set this to null since that means it is uninitialized
        $this->collPesertaDidiksRelatedByKebutuhanKhususIdAyahPartial = null;

        return $this;
    }

    /**
     * reset is the collPesertaDidiksRelatedByKebutuhanKhususIdAyah collection loaded partially
     *
     * @return void
     */
    public function resetPartialPesertaDidiksRelatedByKebutuhanKhususIdAyah($v = true)
    {
        $this->collPesertaDidiksRelatedByKebutuhanKhususIdAyahPartial = $v;
    }

    /**
     * Initializes the collPesertaDidiksRelatedByKebutuhanKhususIdAyah collection.
     *
     * By default this just sets the collPesertaDidiksRelatedByKebutuhanKhususIdAyah collection to an empty array (like clearcollPesertaDidiksRelatedByKebutuhanKhususIdAyah());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPesertaDidiksRelatedByKebutuhanKhususIdAyah($overrideExisting = true)
    {
        if (null !== $this->collPesertaDidiksRelatedByKebutuhanKhususIdAyah && !$overrideExisting) {
            return;
        }
        $this->collPesertaDidiksRelatedByKebutuhanKhususIdAyah = new PropelObjectCollection();
        $this->collPesertaDidiksRelatedByKebutuhanKhususIdAyah->setModel('PesertaDidik');
    }

    /**
     * Gets an array of PesertaDidik objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this KebutuhanKhusus is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     * @throws PropelException
     */
    public function getPesertaDidiksRelatedByKebutuhanKhususIdAyah($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collPesertaDidiksRelatedByKebutuhanKhususIdAyahPartial && !$this->isNew();
        if (null === $this->collPesertaDidiksRelatedByKebutuhanKhususIdAyah || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collPesertaDidiksRelatedByKebutuhanKhususIdAyah) {
                // return empty collection
                $this->initPesertaDidiksRelatedByKebutuhanKhususIdAyah();
            } else {
                $collPesertaDidiksRelatedByKebutuhanKhususIdAyah = PesertaDidikQuery::create(null, $criteria)
                    ->filterByKebutuhanKhususRelatedByKebutuhanKhususIdAyah($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collPesertaDidiksRelatedByKebutuhanKhususIdAyahPartial && count($collPesertaDidiksRelatedByKebutuhanKhususIdAyah)) {
                      $this->initPesertaDidiksRelatedByKebutuhanKhususIdAyah(false);

                      foreach($collPesertaDidiksRelatedByKebutuhanKhususIdAyah as $obj) {
                        if (false == $this->collPesertaDidiksRelatedByKebutuhanKhususIdAyah->contains($obj)) {
                          $this->collPesertaDidiksRelatedByKebutuhanKhususIdAyah->append($obj);
                        }
                      }

                      $this->collPesertaDidiksRelatedByKebutuhanKhususIdAyahPartial = true;
                    }

                    $collPesertaDidiksRelatedByKebutuhanKhususIdAyah->getInternalIterator()->rewind();
                    return $collPesertaDidiksRelatedByKebutuhanKhususIdAyah;
                }

                if($partial && $this->collPesertaDidiksRelatedByKebutuhanKhususIdAyah) {
                    foreach($this->collPesertaDidiksRelatedByKebutuhanKhususIdAyah as $obj) {
                        if($obj->isNew()) {
                            $collPesertaDidiksRelatedByKebutuhanKhususIdAyah[] = $obj;
                        }
                    }
                }

                $this->collPesertaDidiksRelatedByKebutuhanKhususIdAyah = $collPesertaDidiksRelatedByKebutuhanKhususIdAyah;
                $this->collPesertaDidiksRelatedByKebutuhanKhususIdAyahPartial = false;
            }
        }

        return $this->collPesertaDidiksRelatedByKebutuhanKhususIdAyah;
    }

    /**
     * Sets a collection of PesertaDidikRelatedByKebutuhanKhususIdAyah objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $pesertaDidiksRelatedByKebutuhanKhususIdAyah A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return KebutuhanKhusus The current object (for fluent API support)
     */
    public function setPesertaDidiksRelatedByKebutuhanKhususIdAyah(PropelCollection $pesertaDidiksRelatedByKebutuhanKhususIdAyah, PropelPDO $con = null)
    {
        $pesertaDidiksRelatedByKebutuhanKhususIdAyahToDelete = $this->getPesertaDidiksRelatedByKebutuhanKhususIdAyah(new Criteria(), $con)->diff($pesertaDidiksRelatedByKebutuhanKhususIdAyah);

        $this->pesertaDidiksRelatedByKebutuhanKhususIdAyahScheduledForDeletion = unserialize(serialize($pesertaDidiksRelatedByKebutuhanKhususIdAyahToDelete));

        foreach ($pesertaDidiksRelatedByKebutuhanKhususIdAyahToDelete as $pesertaDidikRelatedByKebutuhanKhususIdAyahRemoved) {
            $pesertaDidikRelatedByKebutuhanKhususIdAyahRemoved->setKebutuhanKhususRelatedByKebutuhanKhususIdAyah(null);
        }

        $this->collPesertaDidiksRelatedByKebutuhanKhususIdAyah = null;
        foreach ($pesertaDidiksRelatedByKebutuhanKhususIdAyah as $pesertaDidikRelatedByKebutuhanKhususIdAyah) {
            $this->addPesertaDidikRelatedByKebutuhanKhususIdAyah($pesertaDidikRelatedByKebutuhanKhususIdAyah);
        }

        $this->collPesertaDidiksRelatedByKebutuhanKhususIdAyah = $pesertaDidiksRelatedByKebutuhanKhususIdAyah;
        $this->collPesertaDidiksRelatedByKebutuhanKhususIdAyahPartial = false;

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
    public function countPesertaDidiksRelatedByKebutuhanKhususIdAyah(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collPesertaDidiksRelatedByKebutuhanKhususIdAyahPartial && !$this->isNew();
        if (null === $this->collPesertaDidiksRelatedByKebutuhanKhususIdAyah || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPesertaDidiksRelatedByKebutuhanKhususIdAyah) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getPesertaDidiksRelatedByKebutuhanKhususIdAyah());
            }
            $query = PesertaDidikQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByKebutuhanKhususRelatedByKebutuhanKhususIdAyah($this)
                ->count($con);
        }

        return count($this->collPesertaDidiksRelatedByKebutuhanKhususIdAyah);
    }

    /**
     * Method called to associate a PesertaDidik object to this object
     * through the PesertaDidik foreign key attribute.
     *
     * @param    PesertaDidik $l PesertaDidik
     * @return KebutuhanKhusus The current object (for fluent API support)
     */
    public function addPesertaDidikRelatedByKebutuhanKhususIdAyah(PesertaDidik $l)
    {
        if ($this->collPesertaDidiksRelatedByKebutuhanKhususIdAyah === null) {
            $this->initPesertaDidiksRelatedByKebutuhanKhususIdAyah();
            $this->collPesertaDidiksRelatedByKebutuhanKhususIdAyahPartial = true;
        }
        if (!in_array($l, $this->collPesertaDidiksRelatedByKebutuhanKhususIdAyah->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddPesertaDidikRelatedByKebutuhanKhususIdAyah($l);
        }

        return $this;
    }

    /**
     * @param	PesertaDidikRelatedByKebutuhanKhususIdAyah $pesertaDidikRelatedByKebutuhanKhususIdAyah The pesertaDidikRelatedByKebutuhanKhususIdAyah object to add.
     */
    protected function doAddPesertaDidikRelatedByKebutuhanKhususIdAyah($pesertaDidikRelatedByKebutuhanKhususIdAyah)
    {
        $this->collPesertaDidiksRelatedByKebutuhanKhususIdAyah[]= $pesertaDidikRelatedByKebutuhanKhususIdAyah;
        $pesertaDidikRelatedByKebutuhanKhususIdAyah->setKebutuhanKhususRelatedByKebutuhanKhususIdAyah($this);
    }

    /**
     * @param	PesertaDidikRelatedByKebutuhanKhususIdAyah $pesertaDidikRelatedByKebutuhanKhususIdAyah The pesertaDidikRelatedByKebutuhanKhususIdAyah object to remove.
     * @return KebutuhanKhusus The current object (for fluent API support)
     */
    public function removePesertaDidikRelatedByKebutuhanKhususIdAyah($pesertaDidikRelatedByKebutuhanKhususIdAyah)
    {
        if ($this->getPesertaDidiksRelatedByKebutuhanKhususIdAyah()->contains($pesertaDidikRelatedByKebutuhanKhususIdAyah)) {
            $this->collPesertaDidiksRelatedByKebutuhanKhususIdAyah->remove($this->collPesertaDidiksRelatedByKebutuhanKhususIdAyah->search($pesertaDidikRelatedByKebutuhanKhususIdAyah));
            if (null === $this->pesertaDidiksRelatedByKebutuhanKhususIdAyahScheduledForDeletion) {
                $this->pesertaDidiksRelatedByKebutuhanKhususIdAyahScheduledForDeletion = clone $this->collPesertaDidiksRelatedByKebutuhanKhususIdAyah;
                $this->pesertaDidiksRelatedByKebutuhanKhususIdAyahScheduledForDeletion->clear();
            }
            $this->pesertaDidiksRelatedByKebutuhanKhususIdAyahScheduledForDeletion[]= clone $pesertaDidikRelatedByKebutuhanKhususIdAyah;
            $pesertaDidikRelatedByKebutuhanKhususIdAyah->setKebutuhanKhususRelatedByKebutuhanKhususIdAyah(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this KebutuhanKhusus is new, it will return
     * an empty collection; or if this KebutuhanKhusus has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByKebutuhanKhususIdAyah from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in KebutuhanKhusus.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByKebutuhanKhususIdAyahJoinNegara($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('Negara', $join_behavior);

        return $this->getPesertaDidiksRelatedByKebutuhanKhususIdAyah($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this KebutuhanKhusus is new, it will return
     * an empty collection; or if this KebutuhanKhusus has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByKebutuhanKhususIdAyah from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in KebutuhanKhusus.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByKebutuhanKhususIdAyahJoinAlasanLayakPip($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('AlasanLayakPip', $join_behavior);

        return $this->getPesertaDidiksRelatedByKebutuhanKhususIdAyah($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this KebutuhanKhusus is new, it will return
     * an empty collection; or if this KebutuhanKhusus has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByKebutuhanKhususIdAyah from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in KebutuhanKhusus.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByKebutuhanKhususIdAyahJoinBank($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('Bank', $join_behavior);

        return $this->getPesertaDidiksRelatedByKebutuhanKhususIdAyah($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this KebutuhanKhusus is new, it will return
     * an empty collection; or if this KebutuhanKhusus has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByKebutuhanKhususIdAyah from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in KebutuhanKhusus.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByKebutuhanKhususIdAyahJoinMstWilayah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('MstWilayah', $join_behavior);

        return $this->getPesertaDidiksRelatedByKebutuhanKhususIdAyah($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this KebutuhanKhusus is new, it will return
     * an empty collection; or if this KebutuhanKhusus has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByKebutuhanKhususIdAyah from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in KebutuhanKhusus.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByKebutuhanKhususIdAyahJoinPekerjaanRelatedByPekerjaanId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('PekerjaanRelatedByPekerjaanId', $join_behavior);

        return $this->getPesertaDidiksRelatedByKebutuhanKhususIdAyah($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this KebutuhanKhusus is new, it will return
     * an empty collection; or if this KebutuhanKhusus has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByKebutuhanKhususIdAyah from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in KebutuhanKhusus.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByKebutuhanKhususIdAyahJoinAgama($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('Agama', $join_behavior);

        return $this->getPesertaDidiksRelatedByKebutuhanKhususIdAyah($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this KebutuhanKhusus is new, it will return
     * an empty collection; or if this KebutuhanKhusus has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByKebutuhanKhususIdAyah from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in KebutuhanKhusus.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByKebutuhanKhususIdAyahJoinPenghasilanRelatedByPenghasilanIdAyah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('PenghasilanRelatedByPenghasilanIdAyah', $join_behavior);

        return $this->getPesertaDidiksRelatedByKebutuhanKhususIdAyah($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this KebutuhanKhusus is new, it will return
     * an empty collection; or if this KebutuhanKhusus has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByKebutuhanKhususIdAyah from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in KebutuhanKhusus.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByKebutuhanKhususIdAyahJoinJenisTinggal($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('JenisTinggal', $join_behavior);

        return $this->getPesertaDidiksRelatedByKebutuhanKhususIdAyah($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this KebutuhanKhusus is new, it will return
     * an empty collection; or if this KebutuhanKhusus has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByKebutuhanKhususIdAyah from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in KebutuhanKhusus.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByKebutuhanKhususIdAyahJoinAlatTransportasi($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('AlatTransportasi', $join_behavior);

        return $this->getPesertaDidiksRelatedByKebutuhanKhususIdAyah($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this KebutuhanKhusus is new, it will return
     * an empty collection; or if this KebutuhanKhusus has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByKebutuhanKhususIdAyah from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in KebutuhanKhusus.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByKebutuhanKhususIdAyahJoinPekerjaanRelatedByPekerjaanIdAyah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('PekerjaanRelatedByPekerjaanIdAyah', $join_behavior);

        return $this->getPesertaDidiksRelatedByKebutuhanKhususIdAyah($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this KebutuhanKhusus is new, it will return
     * an empty collection; or if this KebutuhanKhusus has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByKebutuhanKhususIdAyah from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in KebutuhanKhusus.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByKebutuhanKhususIdAyahJoinJenjangPendidikanRelatedByJenjangPendidikanIbu($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('JenjangPendidikanRelatedByJenjangPendidikanIbu', $join_behavior);

        return $this->getPesertaDidiksRelatedByKebutuhanKhususIdAyah($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this KebutuhanKhusus is new, it will return
     * an empty collection; or if this KebutuhanKhusus has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByKebutuhanKhususIdAyah from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in KebutuhanKhusus.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByKebutuhanKhususIdAyahJoinPenghasilanRelatedByPenghasilanIdWali($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('PenghasilanRelatedByPenghasilanIdWali', $join_behavior);

        return $this->getPesertaDidiksRelatedByKebutuhanKhususIdAyah($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this KebutuhanKhusus is new, it will return
     * an empty collection; or if this KebutuhanKhusus has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByKebutuhanKhususIdAyah from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in KebutuhanKhusus.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByKebutuhanKhususIdAyahJoinPekerjaanRelatedByPekerjaanIdIbu($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('PekerjaanRelatedByPekerjaanIdIbu', $join_behavior);

        return $this->getPesertaDidiksRelatedByKebutuhanKhususIdAyah($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this KebutuhanKhusus is new, it will return
     * an empty collection; or if this KebutuhanKhusus has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByKebutuhanKhususIdAyah from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in KebutuhanKhusus.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByKebutuhanKhususIdAyahJoinJenjangPendidikanRelatedByJenjangPendidikanAyah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('JenjangPendidikanRelatedByJenjangPendidikanAyah', $join_behavior);

        return $this->getPesertaDidiksRelatedByKebutuhanKhususIdAyah($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this KebutuhanKhusus is new, it will return
     * an empty collection; or if this KebutuhanKhusus has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByKebutuhanKhususIdAyah from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in KebutuhanKhusus.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByKebutuhanKhususIdAyahJoinPenghasilanRelatedByPenghasilanIdIbu($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('PenghasilanRelatedByPenghasilanIdIbu', $join_behavior);

        return $this->getPesertaDidiksRelatedByKebutuhanKhususIdAyah($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this KebutuhanKhusus is new, it will return
     * an empty collection; or if this KebutuhanKhusus has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByKebutuhanKhususIdAyah from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in KebutuhanKhusus.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByKebutuhanKhususIdAyahJoinPekerjaanRelatedByPekerjaanIdWali($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('PekerjaanRelatedByPekerjaanIdWali', $join_behavior);

        return $this->getPesertaDidiksRelatedByKebutuhanKhususIdAyah($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this KebutuhanKhusus is new, it will return
     * an empty collection; or if this KebutuhanKhusus has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByKebutuhanKhususIdAyah from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in KebutuhanKhusus.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByKebutuhanKhususIdAyahJoinJenjangPendidikanRelatedByJenjangPendidikanWali($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('JenjangPendidikanRelatedByJenjangPendidikanWali', $join_behavior);

        return $this->getPesertaDidiksRelatedByKebutuhanKhususIdAyah($query, $con);
    }

    /**
     * Clears out the collPesertaDidiksRelatedByKebutuhanKhususIdIbu collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return KebutuhanKhusus The current object (for fluent API support)
     * @see        addPesertaDidiksRelatedByKebutuhanKhususIdIbu()
     */
    public function clearPesertaDidiksRelatedByKebutuhanKhususIdIbu()
    {
        $this->collPesertaDidiksRelatedByKebutuhanKhususIdIbu = null; // important to set this to null since that means it is uninitialized
        $this->collPesertaDidiksRelatedByKebutuhanKhususIdIbuPartial = null;

        return $this;
    }

    /**
     * reset is the collPesertaDidiksRelatedByKebutuhanKhususIdIbu collection loaded partially
     *
     * @return void
     */
    public function resetPartialPesertaDidiksRelatedByKebutuhanKhususIdIbu($v = true)
    {
        $this->collPesertaDidiksRelatedByKebutuhanKhususIdIbuPartial = $v;
    }

    /**
     * Initializes the collPesertaDidiksRelatedByKebutuhanKhususIdIbu collection.
     *
     * By default this just sets the collPesertaDidiksRelatedByKebutuhanKhususIdIbu collection to an empty array (like clearcollPesertaDidiksRelatedByKebutuhanKhususIdIbu());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPesertaDidiksRelatedByKebutuhanKhususIdIbu($overrideExisting = true)
    {
        if (null !== $this->collPesertaDidiksRelatedByKebutuhanKhususIdIbu && !$overrideExisting) {
            return;
        }
        $this->collPesertaDidiksRelatedByKebutuhanKhususIdIbu = new PropelObjectCollection();
        $this->collPesertaDidiksRelatedByKebutuhanKhususIdIbu->setModel('PesertaDidik');
    }

    /**
     * Gets an array of PesertaDidik objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this KebutuhanKhusus is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     * @throws PropelException
     */
    public function getPesertaDidiksRelatedByKebutuhanKhususIdIbu($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collPesertaDidiksRelatedByKebutuhanKhususIdIbuPartial && !$this->isNew();
        if (null === $this->collPesertaDidiksRelatedByKebutuhanKhususIdIbu || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collPesertaDidiksRelatedByKebutuhanKhususIdIbu) {
                // return empty collection
                $this->initPesertaDidiksRelatedByKebutuhanKhususIdIbu();
            } else {
                $collPesertaDidiksRelatedByKebutuhanKhususIdIbu = PesertaDidikQuery::create(null, $criteria)
                    ->filterByKebutuhanKhususRelatedByKebutuhanKhususIdIbu($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collPesertaDidiksRelatedByKebutuhanKhususIdIbuPartial && count($collPesertaDidiksRelatedByKebutuhanKhususIdIbu)) {
                      $this->initPesertaDidiksRelatedByKebutuhanKhususIdIbu(false);

                      foreach($collPesertaDidiksRelatedByKebutuhanKhususIdIbu as $obj) {
                        if (false == $this->collPesertaDidiksRelatedByKebutuhanKhususIdIbu->contains($obj)) {
                          $this->collPesertaDidiksRelatedByKebutuhanKhususIdIbu->append($obj);
                        }
                      }

                      $this->collPesertaDidiksRelatedByKebutuhanKhususIdIbuPartial = true;
                    }

                    $collPesertaDidiksRelatedByKebutuhanKhususIdIbu->getInternalIterator()->rewind();
                    return $collPesertaDidiksRelatedByKebutuhanKhususIdIbu;
                }

                if($partial && $this->collPesertaDidiksRelatedByKebutuhanKhususIdIbu) {
                    foreach($this->collPesertaDidiksRelatedByKebutuhanKhususIdIbu as $obj) {
                        if($obj->isNew()) {
                            $collPesertaDidiksRelatedByKebutuhanKhususIdIbu[] = $obj;
                        }
                    }
                }

                $this->collPesertaDidiksRelatedByKebutuhanKhususIdIbu = $collPesertaDidiksRelatedByKebutuhanKhususIdIbu;
                $this->collPesertaDidiksRelatedByKebutuhanKhususIdIbuPartial = false;
            }
        }

        return $this->collPesertaDidiksRelatedByKebutuhanKhususIdIbu;
    }

    /**
     * Sets a collection of PesertaDidikRelatedByKebutuhanKhususIdIbu objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $pesertaDidiksRelatedByKebutuhanKhususIdIbu A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return KebutuhanKhusus The current object (for fluent API support)
     */
    public function setPesertaDidiksRelatedByKebutuhanKhususIdIbu(PropelCollection $pesertaDidiksRelatedByKebutuhanKhususIdIbu, PropelPDO $con = null)
    {
        $pesertaDidiksRelatedByKebutuhanKhususIdIbuToDelete = $this->getPesertaDidiksRelatedByKebutuhanKhususIdIbu(new Criteria(), $con)->diff($pesertaDidiksRelatedByKebutuhanKhususIdIbu);

        $this->pesertaDidiksRelatedByKebutuhanKhususIdIbuScheduledForDeletion = unserialize(serialize($pesertaDidiksRelatedByKebutuhanKhususIdIbuToDelete));

        foreach ($pesertaDidiksRelatedByKebutuhanKhususIdIbuToDelete as $pesertaDidikRelatedByKebutuhanKhususIdIbuRemoved) {
            $pesertaDidikRelatedByKebutuhanKhususIdIbuRemoved->setKebutuhanKhususRelatedByKebutuhanKhususIdIbu(null);
        }

        $this->collPesertaDidiksRelatedByKebutuhanKhususIdIbu = null;
        foreach ($pesertaDidiksRelatedByKebutuhanKhususIdIbu as $pesertaDidikRelatedByKebutuhanKhususIdIbu) {
            $this->addPesertaDidikRelatedByKebutuhanKhususIdIbu($pesertaDidikRelatedByKebutuhanKhususIdIbu);
        }

        $this->collPesertaDidiksRelatedByKebutuhanKhususIdIbu = $pesertaDidiksRelatedByKebutuhanKhususIdIbu;
        $this->collPesertaDidiksRelatedByKebutuhanKhususIdIbuPartial = false;

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
    public function countPesertaDidiksRelatedByKebutuhanKhususIdIbu(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collPesertaDidiksRelatedByKebutuhanKhususIdIbuPartial && !$this->isNew();
        if (null === $this->collPesertaDidiksRelatedByKebutuhanKhususIdIbu || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPesertaDidiksRelatedByKebutuhanKhususIdIbu) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getPesertaDidiksRelatedByKebutuhanKhususIdIbu());
            }
            $query = PesertaDidikQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByKebutuhanKhususRelatedByKebutuhanKhususIdIbu($this)
                ->count($con);
        }

        return count($this->collPesertaDidiksRelatedByKebutuhanKhususIdIbu);
    }

    /**
     * Method called to associate a PesertaDidik object to this object
     * through the PesertaDidik foreign key attribute.
     *
     * @param    PesertaDidik $l PesertaDidik
     * @return KebutuhanKhusus The current object (for fluent API support)
     */
    public function addPesertaDidikRelatedByKebutuhanKhususIdIbu(PesertaDidik $l)
    {
        if ($this->collPesertaDidiksRelatedByKebutuhanKhususIdIbu === null) {
            $this->initPesertaDidiksRelatedByKebutuhanKhususIdIbu();
            $this->collPesertaDidiksRelatedByKebutuhanKhususIdIbuPartial = true;
        }
        if (!in_array($l, $this->collPesertaDidiksRelatedByKebutuhanKhususIdIbu->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddPesertaDidikRelatedByKebutuhanKhususIdIbu($l);
        }

        return $this;
    }

    /**
     * @param	PesertaDidikRelatedByKebutuhanKhususIdIbu $pesertaDidikRelatedByKebutuhanKhususIdIbu The pesertaDidikRelatedByKebutuhanKhususIdIbu object to add.
     */
    protected function doAddPesertaDidikRelatedByKebutuhanKhususIdIbu($pesertaDidikRelatedByKebutuhanKhususIdIbu)
    {
        $this->collPesertaDidiksRelatedByKebutuhanKhususIdIbu[]= $pesertaDidikRelatedByKebutuhanKhususIdIbu;
        $pesertaDidikRelatedByKebutuhanKhususIdIbu->setKebutuhanKhususRelatedByKebutuhanKhususIdIbu($this);
    }

    /**
     * @param	PesertaDidikRelatedByKebutuhanKhususIdIbu $pesertaDidikRelatedByKebutuhanKhususIdIbu The pesertaDidikRelatedByKebutuhanKhususIdIbu object to remove.
     * @return KebutuhanKhusus The current object (for fluent API support)
     */
    public function removePesertaDidikRelatedByKebutuhanKhususIdIbu($pesertaDidikRelatedByKebutuhanKhususIdIbu)
    {
        if ($this->getPesertaDidiksRelatedByKebutuhanKhususIdIbu()->contains($pesertaDidikRelatedByKebutuhanKhususIdIbu)) {
            $this->collPesertaDidiksRelatedByKebutuhanKhususIdIbu->remove($this->collPesertaDidiksRelatedByKebutuhanKhususIdIbu->search($pesertaDidikRelatedByKebutuhanKhususIdIbu));
            if (null === $this->pesertaDidiksRelatedByKebutuhanKhususIdIbuScheduledForDeletion) {
                $this->pesertaDidiksRelatedByKebutuhanKhususIdIbuScheduledForDeletion = clone $this->collPesertaDidiksRelatedByKebutuhanKhususIdIbu;
                $this->pesertaDidiksRelatedByKebutuhanKhususIdIbuScheduledForDeletion->clear();
            }
            $this->pesertaDidiksRelatedByKebutuhanKhususIdIbuScheduledForDeletion[]= clone $pesertaDidikRelatedByKebutuhanKhususIdIbu;
            $pesertaDidikRelatedByKebutuhanKhususIdIbu->setKebutuhanKhususRelatedByKebutuhanKhususIdIbu(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this KebutuhanKhusus is new, it will return
     * an empty collection; or if this KebutuhanKhusus has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByKebutuhanKhususIdIbu from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in KebutuhanKhusus.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByKebutuhanKhususIdIbuJoinNegara($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('Negara', $join_behavior);

        return $this->getPesertaDidiksRelatedByKebutuhanKhususIdIbu($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this KebutuhanKhusus is new, it will return
     * an empty collection; or if this KebutuhanKhusus has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByKebutuhanKhususIdIbu from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in KebutuhanKhusus.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByKebutuhanKhususIdIbuJoinAlasanLayakPip($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('AlasanLayakPip', $join_behavior);

        return $this->getPesertaDidiksRelatedByKebutuhanKhususIdIbu($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this KebutuhanKhusus is new, it will return
     * an empty collection; or if this KebutuhanKhusus has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByKebutuhanKhususIdIbu from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in KebutuhanKhusus.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByKebutuhanKhususIdIbuJoinBank($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('Bank', $join_behavior);

        return $this->getPesertaDidiksRelatedByKebutuhanKhususIdIbu($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this KebutuhanKhusus is new, it will return
     * an empty collection; or if this KebutuhanKhusus has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByKebutuhanKhususIdIbu from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in KebutuhanKhusus.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByKebutuhanKhususIdIbuJoinMstWilayah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('MstWilayah', $join_behavior);

        return $this->getPesertaDidiksRelatedByKebutuhanKhususIdIbu($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this KebutuhanKhusus is new, it will return
     * an empty collection; or if this KebutuhanKhusus has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByKebutuhanKhususIdIbu from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in KebutuhanKhusus.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByKebutuhanKhususIdIbuJoinPekerjaanRelatedByPekerjaanId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('PekerjaanRelatedByPekerjaanId', $join_behavior);

        return $this->getPesertaDidiksRelatedByKebutuhanKhususIdIbu($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this KebutuhanKhusus is new, it will return
     * an empty collection; or if this KebutuhanKhusus has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByKebutuhanKhususIdIbu from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in KebutuhanKhusus.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByKebutuhanKhususIdIbuJoinAgama($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('Agama', $join_behavior);

        return $this->getPesertaDidiksRelatedByKebutuhanKhususIdIbu($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this KebutuhanKhusus is new, it will return
     * an empty collection; or if this KebutuhanKhusus has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByKebutuhanKhususIdIbu from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in KebutuhanKhusus.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByKebutuhanKhususIdIbuJoinPenghasilanRelatedByPenghasilanIdAyah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('PenghasilanRelatedByPenghasilanIdAyah', $join_behavior);

        return $this->getPesertaDidiksRelatedByKebutuhanKhususIdIbu($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this KebutuhanKhusus is new, it will return
     * an empty collection; or if this KebutuhanKhusus has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByKebutuhanKhususIdIbu from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in KebutuhanKhusus.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByKebutuhanKhususIdIbuJoinJenisTinggal($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('JenisTinggal', $join_behavior);

        return $this->getPesertaDidiksRelatedByKebutuhanKhususIdIbu($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this KebutuhanKhusus is new, it will return
     * an empty collection; or if this KebutuhanKhusus has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByKebutuhanKhususIdIbu from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in KebutuhanKhusus.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByKebutuhanKhususIdIbuJoinAlatTransportasi($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('AlatTransportasi', $join_behavior);

        return $this->getPesertaDidiksRelatedByKebutuhanKhususIdIbu($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this KebutuhanKhusus is new, it will return
     * an empty collection; or if this KebutuhanKhusus has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByKebutuhanKhususIdIbu from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in KebutuhanKhusus.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByKebutuhanKhususIdIbuJoinPekerjaanRelatedByPekerjaanIdAyah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('PekerjaanRelatedByPekerjaanIdAyah', $join_behavior);

        return $this->getPesertaDidiksRelatedByKebutuhanKhususIdIbu($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this KebutuhanKhusus is new, it will return
     * an empty collection; or if this KebutuhanKhusus has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByKebutuhanKhususIdIbu from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in KebutuhanKhusus.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByKebutuhanKhususIdIbuJoinJenjangPendidikanRelatedByJenjangPendidikanIbu($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('JenjangPendidikanRelatedByJenjangPendidikanIbu', $join_behavior);

        return $this->getPesertaDidiksRelatedByKebutuhanKhususIdIbu($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this KebutuhanKhusus is new, it will return
     * an empty collection; or if this KebutuhanKhusus has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByKebutuhanKhususIdIbu from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in KebutuhanKhusus.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByKebutuhanKhususIdIbuJoinPenghasilanRelatedByPenghasilanIdWali($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('PenghasilanRelatedByPenghasilanIdWali', $join_behavior);

        return $this->getPesertaDidiksRelatedByKebutuhanKhususIdIbu($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this KebutuhanKhusus is new, it will return
     * an empty collection; or if this KebutuhanKhusus has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByKebutuhanKhususIdIbu from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in KebutuhanKhusus.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByKebutuhanKhususIdIbuJoinPekerjaanRelatedByPekerjaanIdIbu($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('PekerjaanRelatedByPekerjaanIdIbu', $join_behavior);

        return $this->getPesertaDidiksRelatedByKebutuhanKhususIdIbu($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this KebutuhanKhusus is new, it will return
     * an empty collection; or if this KebutuhanKhusus has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByKebutuhanKhususIdIbu from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in KebutuhanKhusus.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByKebutuhanKhususIdIbuJoinJenjangPendidikanRelatedByJenjangPendidikanAyah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('JenjangPendidikanRelatedByJenjangPendidikanAyah', $join_behavior);

        return $this->getPesertaDidiksRelatedByKebutuhanKhususIdIbu($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this KebutuhanKhusus is new, it will return
     * an empty collection; or if this KebutuhanKhusus has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByKebutuhanKhususIdIbu from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in KebutuhanKhusus.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByKebutuhanKhususIdIbuJoinPenghasilanRelatedByPenghasilanIdIbu($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('PenghasilanRelatedByPenghasilanIdIbu', $join_behavior);

        return $this->getPesertaDidiksRelatedByKebutuhanKhususIdIbu($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this KebutuhanKhusus is new, it will return
     * an empty collection; or if this KebutuhanKhusus has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByKebutuhanKhususIdIbu from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in KebutuhanKhusus.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByKebutuhanKhususIdIbuJoinPekerjaanRelatedByPekerjaanIdWali($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('PekerjaanRelatedByPekerjaanIdWali', $join_behavior);

        return $this->getPesertaDidiksRelatedByKebutuhanKhususIdIbu($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this KebutuhanKhusus is new, it will return
     * an empty collection; or if this KebutuhanKhusus has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByKebutuhanKhususIdIbu from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in KebutuhanKhusus.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByKebutuhanKhususIdIbuJoinJenjangPendidikanRelatedByJenjangPendidikanWali($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('JenjangPendidikanRelatedByJenjangPendidikanWali', $join_behavior);

        return $this->getPesertaDidiksRelatedByKebutuhanKhususIdIbu($query, $con);
    }

    /**
     * Clears out the collPesertaDidiksRelatedByKebutuhanKhususId collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return KebutuhanKhusus The current object (for fluent API support)
     * @see        addPesertaDidiksRelatedByKebutuhanKhususId()
     */
    public function clearPesertaDidiksRelatedByKebutuhanKhususId()
    {
        $this->collPesertaDidiksRelatedByKebutuhanKhususId = null; // important to set this to null since that means it is uninitialized
        $this->collPesertaDidiksRelatedByKebutuhanKhususIdPartial = null;

        return $this;
    }

    /**
     * reset is the collPesertaDidiksRelatedByKebutuhanKhususId collection loaded partially
     *
     * @return void
     */
    public function resetPartialPesertaDidiksRelatedByKebutuhanKhususId($v = true)
    {
        $this->collPesertaDidiksRelatedByKebutuhanKhususIdPartial = $v;
    }

    /**
     * Initializes the collPesertaDidiksRelatedByKebutuhanKhususId collection.
     *
     * By default this just sets the collPesertaDidiksRelatedByKebutuhanKhususId collection to an empty array (like clearcollPesertaDidiksRelatedByKebutuhanKhususId());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPesertaDidiksRelatedByKebutuhanKhususId($overrideExisting = true)
    {
        if (null !== $this->collPesertaDidiksRelatedByKebutuhanKhususId && !$overrideExisting) {
            return;
        }
        $this->collPesertaDidiksRelatedByKebutuhanKhususId = new PropelObjectCollection();
        $this->collPesertaDidiksRelatedByKebutuhanKhususId->setModel('PesertaDidik');
    }

    /**
     * Gets an array of PesertaDidik objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this KebutuhanKhusus is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     * @throws PropelException
     */
    public function getPesertaDidiksRelatedByKebutuhanKhususId($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collPesertaDidiksRelatedByKebutuhanKhususIdPartial && !$this->isNew();
        if (null === $this->collPesertaDidiksRelatedByKebutuhanKhususId || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collPesertaDidiksRelatedByKebutuhanKhususId) {
                // return empty collection
                $this->initPesertaDidiksRelatedByKebutuhanKhususId();
            } else {
                $collPesertaDidiksRelatedByKebutuhanKhususId = PesertaDidikQuery::create(null, $criteria)
                    ->filterByKebutuhanKhususRelatedByKebutuhanKhususId($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collPesertaDidiksRelatedByKebutuhanKhususIdPartial && count($collPesertaDidiksRelatedByKebutuhanKhususId)) {
                      $this->initPesertaDidiksRelatedByKebutuhanKhususId(false);

                      foreach($collPesertaDidiksRelatedByKebutuhanKhususId as $obj) {
                        if (false == $this->collPesertaDidiksRelatedByKebutuhanKhususId->contains($obj)) {
                          $this->collPesertaDidiksRelatedByKebutuhanKhususId->append($obj);
                        }
                      }

                      $this->collPesertaDidiksRelatedByKebutuhanKhususIdPartial = true;
                    }

                    $collPesertaDidiksRelatedByKebutuhanKhususId->getInternalIterator()->rewind();
                    return $collPesertaDidiksRelatedByKebutuhanKhususId;
                }

                if($partial && $this->collPesertaDidiksRelatedByKebutuhanKhususId) {
                    foreach($this->collPesertaDidiksRelatedByKebutuhanKhususId as $obj) {
                        if($obj->isNew()) {
                            $collPesertaDidiksRelatedByKebutuhanKhususId[] = $obj;
                        }
                    }
                }

                $this->collPesertaDidiksRelatedByKebutuhanKhususId = $collPesertaDidiksRelatedByKebutuhanKhususId;
                $this->collPesertaDidiksRelatedByKebutuhanKhususIdPartial = false;
            }
        }

        return $this->collPesertaDidiksRelatedByKebutuhanKhususId;
    }

    /**
     * Sets a collection of PesertaDidikRelatedByKebutuhanKhususId objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $pesertaDidiksRelatedByKebutuhanKhususId A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return KebutuhanKhusus The current object (for fluent API support)
     */
    public function setPesertaDidiksRelatedByKebutuhanKhususId(PropelCollection $pesertaDidiksRelatedByKebutuhanKhususId, PropelPDO $con = null)
    {
        $pesertaDidiksRelatedByKebutuhanKhususIdToDelete = $this->getPesertaDidiksRelatedByKebutuhanKhususId(new Criteria(), $con)->diff($pesertaDidiksRelatedByKebutuhanKhususId);

        $this->pesertaDidiksRelatedByKebutuhanKhususIdScheduledForDeletion = unserialize(serialize($pesertaDidiksRelatedByKebutuhanKhususIdToDelete));

        foreach ($pesertaDidiksRelatedByKebutuhanKhususIdToDelete as $pesertaDidikRelatedByKebutuhanKhususIdRemoved) {
            $pesertaDidikRelatedByKebutuhanKhususIdRemoved->setKebutuhanKhususRelatedByKebutuhanKhususId(null);
        }

        $this->collPesertaDidiksRelatedByKebutuhanKhususId = null;
        foreach ($pesertaDidiksRelatedByKebutuhanKhususId as $pesertaDidikRelatedByKebutuhanKhususId) {
            $this->addPesertaDidikRelatedByKebutuhanKhususId($pesertaDidikRelatedByKebutuhanKhususId);
        }

        $this->collPesertaDidiksRelatedByKebutuhanKhususId = $pesertaDidiksRelatedByKebutuhanKhususId;
        $this->collPesertaDidiksRelatedByKebutuhanKhususIdPartial = false;

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
    public function countPesertaDidiksRelatedByKebutuhanKhususId(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collPesertaDidiksRelatedByKebutuhanKhususIdPartial && !$this->isNew();
        if (null === $this->collPesertaDidiksRelatedByKebutuhanKhususId || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPesertaDidiksRelatedByKebutuhanKhususId) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getPesertaDidiksRelatedByKebutuhanKhususId());
            }
            $query = PesertaDidikQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByKebutuhanKhususRelatedByKebutuhanKhususId($this)
                ->count($con);
        }

        return count($this->collPesertaDidiksRelatedByKebutuhanKhususId);
    }

    /**
     * Method called to associate a PesertaDidik object to this object
     * through the PesertaDidik foreign key attribute.
     *
     * @param    PesertaDidik $l PesertaDidik
     * @return KebutuhanKhusus The current object (for fluent API support)
     */
    public function addPesertaDidikRelatedByKebutuhanKhususId(PesertaDidik $l)
    {
        if ($this->collPesertaDidiksRelatedByKebutuhanKhususId === null) {
            $this->initPesertaDidiksRelatedByKebutuhanKhususId();
            $this->collPesertaDidiksRelatedByKebutuhanKhususIdPartial = true;
        }
        if (!in_array($l, $this->collPesertaDidiksRelatedByKebutuhanKhususId->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddPesertaDidikRelatedByKebutuhanKhususId($l);
        }

        return $this;
    }

    /**
     * @param	PesertaDidikRelatedByKebutuhanKhususId $pesertaDidikRelatedByKebutuhanKhususId The pesertaDidikRelatedByKebutuhanKhususId object to add.
     */
    protected function doAddPesertaDidikRelatedByKebutuhanKhususId($pesertaDidikRelatedByKebutuhanKhususId)
    {
        $this->collPesertaDidiksRelatedByKebutuhanKhususId[]= $pesertaDidikRelatedByKebutuhanKhususId;
        $pesertaDidikRelatedByKebutuhanKhususId->setKebutuhanKhususRelatedByKebutuhanKhususId($this);
    }

    /**
     * @param	PesertaDidikRelatedByKebutuhanKhususId $pesertaDidikRelatedByKebutuhanKhususId The pesertaDidikRelatedByKebutuhanKhususId object to remove.
     * @return KebutuhanKhusus The current object (for fluent API support)
     */
    public function removePesertaDidikRelatedByKebutuhanKhususId($pesertaDidikRelatedByKebutuhanKhususId)
    {
        if ($this->getPesertaDidiksRelatedByKebutuhanKhususId()->contains($pesertaDidikRelatedByKebutuhanKhususId)) {
            $this->collPesertaDidiksRelatedByKebutuhanKhususId->remove($this->collPesertaDidiksRelatedByKebutuhanKhususId->search($pesertaDidikRelatedByKebutuhanKhususId));
            if (null === $this->pesertaDidiksRelatedByKebutuhanKhususIdScheduledForDeletion) {
                $this->pesertaDidiksRelatedByKebutuhanKhususIdScheduledForDeletion = clone $this->collPesertaDidiksRelatedByKebutuhanKhususId;
                $this->pesertaDidiksRelatedByKebutuhanKhususIdScheduledForDeletion->clear();
            }
            $this->pesertaDidiksRelatedByKebutuhanKhususIdScheduledForDeletion[]= clone $pesertaDidikRelatedByKebutuhanKhususId;
            $pesertaDidikRelatedByKebutuhanKhususId->setKebutuhanKhususRelatedByKebutuhanKhususId(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this KebutuhanKhusus is new, it will return
     * an empty collection; or if this KebutuhanKhusus has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByKebutuhanKhususId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in KebutuhanKhusus.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByKebutuhanKhususIdJoinNegara($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('Negara', $join_behavior);

        return $this->getPesertaDidiksRelatedByKebutuhanKhususId($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this KebutuhanKhusus is new, it will return
     * an empty collection; or if this KebutuhanKhusus has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByKebutuhanKhususId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in KebutuhanKhusus.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByKebutuhanKhususIdJoinAlasanLayakPip($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('AlasanLayakPip', $join_behavior);

        return $this->getPesertaDidiksRelatedByKebutuhanKhususId($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this KebutuhanKhusus is new, it will return
     * an empty collection; or if this KebutuhanKhusus has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByKebutuhanKhususId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in KebutuhanKhusus.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByKebutuhanKhususIdJoinBank($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('Bank', $join_behavior);

        return $this->getPesertaDidiksRelatedByKebutuhanKhususId($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this KebutuhanKhusus is new, it will return
     * an empty collection; or if this KebutuhanKhusus has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByKebutuhanKhususId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in KebutuhanKhusus.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByKebutuhanKhususIdJoinMstWilayah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('MstWilayah', $join_behavior);

        return $this->getPesertaDidiksRelatedByKebutuhanKhususId($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this KebutuhanKhusus is new, it will return
     * an empty collection; or if this KebutuhanKhusus has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByKebutuhanKhususId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in KebutuhanKhusus.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByKebutuhanKhususIdJoinPekerjaanRelatedByPekerjaanId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('PekerjaanRelatedByPekerjaanId', $join_behavior);

        return $this->getPesertaDidiksRelatedByKebutuhanKhususId($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this KebutuhanKhusus is new, it will return
     * an empty collection; or if this KebutuhanKhusus has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByKebutuhanKhususId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in KebutuhanKhusus.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByKebutuhanKhususIdJoinAgama($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('Agama', $join_behavior);

        return $this->getPesertaDidiksRelatedByKebutuhanKhususId($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this KebutuhanKhusus is new, it will return
     * an empty collection; or if this KebutuhanKhusus has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByKebutuhanKhususId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in KebutuhanKhusus.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByKebutuhanKhususIdJoinPenghasilanRelatedByPenghasilanIdAyah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('PenghasilanRelatedByPenghasilanIdAyah', $join_behavior);

        return $this->getPesertaDidiksRelatedByKebutuhanKhususId($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this KebutuhanKhusus is new, it will return
     * an empty collection; or if this KebutuhanKhusus has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByKebutuhanKhususId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in KebutuhanKhusus.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByKebutuhanKhususIdJoinJenisTinggal($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('JenisTinggal', $join_behavior);

        return $this->getPesertaDidiksRelatedByKebutuhanKhususId($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this KebutuhanKhusus is new, it will return
     * an empty collection; or if this KebutuhanKhusus has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByKebutuhanKhususId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in KebutuhanKhusus.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByKebutuhanKhususIdJoinAlatTransportasi($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('AlatTransportasi', $join_behavior);

        return $this->getPesertaDidiksRelatedByKebutuhanKhususId($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this KebutuhanKhusus is new, it will return
     * an empty collection; or if this KebutuhanKhusus has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByKebutuhanKhususId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in KebutuhanKhusus.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByKebutuhanKhususIdJoinPekerjaanRelatedByPekerjaanIdAyah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('PekerjaanRelatedByPekerjaanIdAyah', $join_behavior);

        return $this->getPesertaDidiksRelatedByKebutuhanKhususId($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this KebutuhanKhusus is new, it will return
     * an empty collection; or if this KebutuhanKhusus has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByKebutuhanKhususId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in KebutuhanKhusus.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByKebutuhanKhususIdJoinJenjangPendidikanRelatedByJenjangPendidikanIbu($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('JenjangPendidikanRelatedByJenjangPendidikanIbu', $join_behavior);

        return $this->getPesertaDidiksRelatedByKebutuhanKhususId($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this KebutuhanKhusus is new, it will return
     * an empty collection; or if this KebutuhanKhusus has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByKebutuhanKhususId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in KebutuhanKhusus.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByKebutuhanKhususIdJoinPenghasilanRelatedByPenghasilanIdWali($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('PenghasilanRelatedByPenghasilanIdWali', $join_behavior);

        return $this->getPesertaDidiksRelatedByKebutuhanKhususId($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this KebutuhanKhusus is new, it will return
     * an empty collection; or if this KebutuhanKhusus has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByKebutuhanKhususId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in KebutuhanKhusus.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByKebutuhanKhususIdJoinPekerjaanRelatedByPekerjaanIdIbu($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('PekerjaanRelatedByPekerjaanIdIbu', $join_behavior);

        return $this->getPesertaDidiksRelatedByKebutuhanKhususId($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this KebutuhanKhusus is new, it will return
     * an empty collection; or if this KebutuhanKhusus has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByKebutuhanKhususId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in KebutuhanKhusus.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByKebutuhanKhususIdJoinJenjangPendidikanRelatedByJenjangPendidikanAyah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('JenjangPendidikanRelatedByJenjangPendidikanAyah', $join_behavior);

        return $this->getPesertaDidiksRelatedByKebutuhanKhususId($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this KebutuhanKhusus is new, it will return
     * an empty collection; or if this KebutuhanKhusus has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByKebutuhanKhususId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in KebutuhanKhusus.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByKebutuhanKhususIdJoinPenghasilanRelatedByPenghasilanIdIbu($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('PenghasilanRelatedByPenghasilanIdIbu', $join_behavior);

        return $this->getPesertaDidiksRelatedByKebutuhanKhususId($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this KebutuhanKhusus is new, it will return
     * an empty collection; or if this KebutuhanKhusus has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByKebutuhanKhususId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in KebutuhanKhusus.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByKebutuhanKhususIdJoinPekerjaanRelatedByPekerjaanIdWali($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('PekerjaanRelatedByPekerjaanIdWali', $join_behavior);

        return $this->getPesertaDidiksRelatedByKebutuhanKhususId($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this KebutuhanKhusus is new, it will return
     * an empty collection; or if this KebutuhanKhusus has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByKebutuhanKhususId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in KebutuhanKhusus.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByKebutuhanKhususIdJoinJenjangPendidikanRelatedByJenjangPendidikanWali($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('JenjangPendidikanRelatedByJenjangPendidikanWali', $join_behavior);

        return $this->getPesertaDidiksRelatedByKebutuhanKhususId($query, $con);
    }

    /**
     * Clears out the collProgramInklusis collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return KebutuhanKhusus The current object (for fluent API support)
     * @see        addProgramInklusis()
     */
    public function clearProgramInklusis()
    {
        $this->collProgramInklusis = null; // important to set this to null since that means it is uninitialized
        $this->collProgramInklusisPartial = null;

        return $this;
    }

    /**
     * reset is the collProgramInklusis collection loaded partially
     *
     * @return void
     */
    public function resetPartialProgramInklusis($v = true)
    {
        $this->collProgramInklusisPartial = $v;
    }

    /**
     * Initializes the collProgramInklusis collection.
     *
     * By default this just sets the collProgramInklusis collection to an empty array (like clearcollProgramInklusis());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initProgramInklusis($overrideExisting = true)
    {
        if (null !== $this->collProgramInklusis && !$overrideExisting) {
            return;
        }
        $this->collProgramInklusis = new PropelObjectCollection();
        $this->collProgramInklusis->setModel('ProgramInklusi');
    }

    /**
     * Gets an array of ProgramInklusi objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this KebutuhanKhusus is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProgramInklusi[] List of ProgramInklusi objects
     * @throws PropelException
     */
    public function getProgramInklusis($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collProgramInklusisPartial && !$this->isNew();
        if (null === $this->collProgramInklusis || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collProgramInklusis) {
                // return empty collection
                $this->initProgramInklusis();
            } else {
                $collProgramInklusis = ProgramInklusiQuery::create(null, $criteria)
                    ->filterByKebutuhanKhusus($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collProgramInklusisPartial && count($collProgramInklusis)) {
                      $this->initProgramInklusis(false);

                      foreach($collProgramInklusis as $obj) {
                        if (false == $this->collProgramInklusis->contains($obj)) {
                          $this->collProgramInklusis->append($obj);
                        }
                      }

                      $this->collProgramInklusisPartial = true;
                    }

                    $collProgramInklusis->getInternalIterator()->rewind();
                    return $collProgramInklusis;
                }

                if($partial && $this->collProgramInklusis) {
                    foreach($this->collProgramInklusis as $obj) {
                        if($obj->isNew()) {
                            $collProgramInklusis[] = $obj;
                        }
                    }
                }

                $this->collProgramInklusis = $collProgramInklusis;
                $this->collProgramInklusisPartial = false;
            }
        }

        return $this->collProgramInklusis;
    }

    /**
     * Sets a collection of ProgramInklusi objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $programInklusis A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return KebutuhanKhusus The current object (for fluent API support)
     */
    public function setProgramInklusis(PropelCollection $programInklusis, PropelPDO $con = null)
    {
        $programInklusisToDelete = $this->getProgramInklusis(new Criteria(), $con)->diff($programInklusis);

        $this->programInklusisScheduledForDeletion = unserialize(serialize($programInklusisToDelete));

        foreach ($programInklusisToDelete as $programInklusiRemoved) {
            $programInklusiRemoved->setKebutuhanKhusus(null);
        }

        $this->collProgramInklusis = null;
        foreach ($programInklusis as $programInklusi) {
            $this->addProgramInklusi($programInklusi);
        }

        $this->collProgramInklusis = $programInklusis;
        $this->collProgramInklusisPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProgramInklusi objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProgramInklusi objects.
     * @throws PropelException
     */
    public function countProgramInklusis(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collProgramInklusisPartial && !$this->isNew();
        if (null === $this->collProgramInklusis || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collProgramInklusis) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getProgramInklusis());
            }
            $query = ProgramInklusiQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByKebutuhanKhusus($this)
                ->count($con);
        }

        return count($this->collProgramInklusis);
    }

    /**
     * Method called to associate a ProgramInklusi object to this object
     * through the ProgramInklusi foreign key attribute.
     *
     * @param    ProgramInklusi $l ProgramInklusi
     * @return KebutuhanKhusus The current object (for fluent API support)
     */
    public function addProgramInklusi(ProgramInklusi $l)
    {
        if ($this->collProgramInklusis === null) {
            $this->initProgramInklusis();
            $this->collProgramInklusisPartial = true;
        }
        if (!in_array($l, $this->collProgramInklusis->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddProgramInklusi($l);
        }

        return $this;
    }

    /**
     * @param	ProgramInklusi $programInklusi The programInklusi object to add.
     */
    protected function doAddProgramInklusi($programInklusi)
    {
        $this->collProgramInklusis[]= $programInklusi;
        $programInklusi->setKebutuhanKhusus($this);
    }

    /**
     * @param	ProgramInklusi $programInklusi The programInklusi object to remove.
     * @return KebutuhanKhusus The current object (for fluent API support)
     */
    public function removeProgramInklusi($programInklusi)
    {
        if ($this->getProgramInklusis()->contains($programInklusi)) {
            $this->collProgramInklusis->remove($this->collProgramInklusis->search($programInklusi));
            if (null === $this->programInklusisScheduledForDeletion) {
                $this->programInklusisScheduledForDeletion = clone $this->collProgramInklusis;
                $this->programInklusisScheduledForDeletion->clear();
            }
            $this->programInklusisScheduledForDeletion[]= clone $programInklusi;
            $programInklusi->setKebutuhanKhusus(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this KebutuhanKhusus is new, it will return
     * an empty collection; or if this KebutuhanKhusus has previously
     * been saved, it will retrieve related ProgramInklusis from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in KebutuhanKhusus.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProgramInklusi[] List of ProgramInklusi objects
     */
    public function getProgramInklusisJoinSekolah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProgramInklusiQuery::create(null, $criteria);
        $query->joinWith('Sekolah', $join_behavior);

        return $this->getProgramInklusis($query, $con);
    }

    /**
     * Clears out the collPtks collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return KebutuhanKhusus The current object (for fluent API support)
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
     * If this KebutuhanKhusus is new, it will return
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
                    ->filterByKebutuhanKhusus($this)
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
     * @return KebutuhanKhusus The current object (for fluent API support)
     */
    public function setPtks(PropelCollection $ptks, PropelPDO $con = null)
    {
        $ptksToDelete = $this->getPtks(new Criteria(), $con)->diff($ptks);

        $this->ptksScheduledForDeletion = unserialize(serialize($ptksToDelete));

        foreach ($ptksToDelete as $ptkRemoved) {
            $ptkRemoved->setKebutuhanKhusus(null);
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
                ->filterByKebutuhanKhusus($this)
                ->count($con);
        }

        return count($this->collPtks);
    }

    /**
     * Method called to associate a Ptk object to this object
     * through the Ptk foreign key attribute.
     *
     * @param    Ptk $l Ptk
     * @return KebutuhanKhusus The current object (for fluent API support)
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
        $ptk->setKebutuhanKhusus($this);
    }

    /**
     * @param	Ptk $ptk The ptk object to remove.
     * @return KebutuhanKhusus The current object (for fluent API support)
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
            $ptk->setKebutuhanKhusus(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this KebutuhanKhusus is new, it will return
     * an empty collection; or if this KebutuhanKhusus has previously
     * been saved, it will retrieve related Ptks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in KebutuhanKhusus.
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
     * Otherwise if this KebutuhanKhusus is new, it will return
     * an empty collection; or if this KebutuhanKhusus has previously
     * been saved, it will retrieve related Ptks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in KebutuhanKhusus.
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
     * Otherwise if this KebutuhanKhusus is new, it will return
     * an empty collection; or if this KebutuhanKhusus has previously
     * been saved, it will retrieve related Ptks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in KebutuhanKhusus.
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
     * Otherwise if this KebutuhanKhusus is new, it will return
     * an empty collection; or if this KebutuhanKhusus has previously
     * been saved, it will retrieve related Ptks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in KebutuhanKhusus.
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
     * Otherwise if this KebutuhanKhusus is new, it will return
     * an empty collection; or if this KebutuhanKhusus has previously
     * been saved, it will retrieve related Ptks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in KebutuhanKhusus.
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
     * Otherwise if this KebutuhanKhusus is new, it will return
     * an empty collection; or if this KebutuhanKhusus has previously
     * been saved, it will retrieve related Ptks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in KebutuhanKhusus.
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
     * Otherwise if this KebutuhanKhusus is new, it will return
     * an empty collection; or if this KebutuhanKhusus has previously
     * been saved, it will retrieve related Ptks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in KebutuhanKhusus.
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
     * Otherwise if this KebutuhanKhusus is new, it will return
     * an empty collection; or if this KebutuhanKhusus has previously
     * been saved, it will retrieve related Ptks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in KebutuhanKhusus.
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
     * Otherwise if this KebutuhanKhusus is new, it will return
     * an empty collection; or if this KebutuhanKhusus has previously
     * been saved, it will retrieve related Ptks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in KebutuhanKhusus.
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
     * Otherwise if this KebutuhanKhusus is new, it will return
     * an empty collection; or if this KebutuhanKhusus has previously
     * been saved, it will retrieve related Ptks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in KebutuhanKhusus.
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
     * Otherwise if this KebutuhanKhusus is new, it will return
     * an empty collection; or if this KebutuhanKhusus has previously
     * been saved, it will retrieve related Ptks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in KebutuhanKhusus.
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
     * Otherwise if this KebutuhanKhusus is new, it will return
     * an empty collection; or if this KebutuhanKhusus has previously
     * been saved, it will retrieve related Ptks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in KebutuhanKhusus.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Ptk[] List of Ptk objects
     */
    public function getPtksJoinPekerjaan($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PtkQuery::create(null, $criteria);
        $query->joinWith('Pekerjaan', $join_behavior);

        return $this->getPtks($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this KebutuhanKhusus is new, it will return
     * an empty collection; or if this KebutuhanKhusus has previously
     * been saved, it will retrieve related Ptks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in KebutuhanKhusus.
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
     * Otherwise if this KebutuhanKhusus is new, it will return
     * an empty collection; or if this KebutuhanKhusus has previously
     * been saved, it will retrieve related Ptks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in KebutuhanKhusus.
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
     * Clears out the collRombonganBelajars collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return KebutuhanKhusus The current object (for fluent API support)
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
     * If this KebutuhanKhusus is new, it will return
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
                    ->filterByKebutuhanKhusus($this)
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
     * @return KebutuhanKhusus The current object (for fluent API support)
     */
    public function setRombonganBelajars(PropelCollection $rombonganBelajars, PropelPDO $con = null)
    {
        $rombonganBelajarsToDelete = $this->getRombonganBelajars(new Criteria(), $con)->diff($rombonganBelajars);

        $this->rombonganBelajarsScheduledForDeletion = unserialize(serialize($rombonganBelajarsToDelete));

        foreach ($rombonganBelajarsToDelete as $rombonganBelajarRemoved) {
            $rombonganBelajarRemoved->setKebutuhanKhusus(null);
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
                ->filterByKebutuhanKhusus($this)
                ->count($con);
        }

        return count($this->collRombonganBelajars);
    }

    /**
     * Method called to associate a RombonganBelajar object to this object
     * through the RombonganBelajar foreign key attribute.
     *
     * @param    RombonganBelajar $l RombonganBelajar
     * @return KebutuhanKhusus The current object (for fluent API support)
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
        $rombonganBelajar->setKebutuhanKhusus($this);
    }

    /**
     * @param	RombonganBelajar $rombonganBelajar The rombonganBelajar object to remove.
     * @return KebutuhanKhusus The current object (for fluent API support)
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
            $rombonganBelajar->setKebutuhanKhusus(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this KebutuhanKhusus is new, it will return
     * an empty collection; or if this KebutuhanKhusus has previously
     * been saved, it will retrieve related RombonganBelajars from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in KebutuhanKhusus.
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
     * Otherwise if this KebutuhanKhusus is new, it will return
     * an empty collection; or if this KebutuhanKhusus has previously
     * been saved, it will retrieve related RombonganBelajars from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in KebutuhanKhusus.
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
     * Otherwise if this KebutuhanKhusus is new, it will return
     * an empty collection; or if this KebutuhanKhusus has previously
     * been saved, it will retrieve related RombonganBelajars from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in KebutuhanKhusus.
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
     * Otherwise if this KebutuhanKhusus is new, it will return
     * an empty collection; or if this KebutuhanKhusus has previously
     * been saved, it will retrieve related RombonganBelajars from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in KebutuhanKhusus.
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
     * Otherwise if this KebutuhanKhusus is new, it will return
     * an empty collection; or if this KebutuhanKhusus has previously
     * been saved, it will retrieve related RombonganBelajars from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in KebutuhanKhusus.
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
     * Otherwise if this KebutuhanKhusus is new, it will return
     * an empty collection; or if this KebutuhanKhusus has previously
     * been saved, it will retrieve related RombonganBelajars from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in KebutuhanKhusus.
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
     * Otherwise if this KebutuhanKhusus is new, it will return
     * an empty collection; or if this KebutuhanKhusus has previously
     * been saved, it will retrieve related RombonganBelajars from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in KebutuhanKhusus.
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
     * Clears out the collSekolahs collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return KebutuhanKhusus The current object (for fluent API support)
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
     * If this KebutuhanKhusus is new, it will return
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
                    ->filterByKebutuhanKhusus($this)
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
     * @return KebutuhanKhusus The current object (for fluent API support)
     */
    public function setSekolahs(PropelCollection $sekolahs, PropelPDO $con = null)
    {
        $sekolahsToDelete = $this->getSekolahs(new Criteria(), $con)->diff($sekolahs);

        $this->sekolahsScheduledForDeletion = unserialize(serialize($sekolahsToDelete));

        foreach ($sekolahsToDelete as $sekolahRemoved) {
            $sekolahRemoved->setKebutuhanKhusus(null);
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
                ->filterByKebutuhanKhusus($this)
                ->count($con);
        }

        return count($this->collSekolahs);
    }

    /**
     * Method called to associate a Sekolah object to this object
     * through the Sekolah foreign key attribute.
     *
     * @param    Sekolah $l Sekolah
     * @return KebutuhanKhusus The current object (for fluent API support)
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
        $sekolah->setKebutuhanKhusus($this);
    }

    /**
     * @param	Sekolah $sekolah The sekolah object to remove.
     * @return KebutuhanKhusus The current object (for fluent API support)
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
            $sekolah->setKebutuhanKhusus(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this KebutuhanKhusus is new, it will return
     * an empty collection; or if this KebutuhanKhusus has previously
     * been saved, it will retrieve related Sekolahs from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in KebutuhanKhusus.
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
     * Otherwise if this KebutuhanKhusus is new, it will return
     * an empty collection; or if this KebutuhanKhusus has previously
     * been saved, it will retrieve related Sekolahs from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in KebutuhanKhusus.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Sekolah[] List of Sekolah objects
     */
    public function getSekolahsJoinBentukPendidikan($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = SekolahQuery::create(null, $criteria);
        $query->joinWith('BentukPendidikan', $join_behavior);

        return $this->getSekolahs($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this KebutuhanKhusus is new, it will return
     * an empty collection; or if this KebutuhanKhusus has previously
     * been saved, it will retrieve related Sekolahs from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in KebutuhanKhusus.
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
     * Otherwise if this KebutuhanKhusus is new, it will return
     * an empty collection; or if this KebutuhanKhusus has previously
     * been saved, it will retrieve related Sekolahs from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in KebutuhanKhusus.
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
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->kebutuhan_khusus_id = null;
        $this->kebutuhan_khusus = null;
        $this->kk_a = null;
        $this->kk_b = null;
        $this->kk_c = null;
        $this->kk_c1 = null;
        $this->kk_d = null;
        $this->kk_d1 = null;
        $this->kk_e = null;
        $this->kk_f = null;
        $this->kk_h = null;
        $this->kk_i = null;
        $this->kk_j = null;
        $this->kk_k = null;
        $this->kk_n = null;
        $this->kk_o = null;
        $this->kk_p = null;
        $this->kk_q = null;
        $this->untuk_lembaga = null;
        $this->untuk_ptk = null;
        $this->untuk_pd = null;
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
            if ($this->collJenisSertifikasis) {
                foreach ($this->collJenisSertifikasis as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collJurusanSps) {
                foreach ($this->collJurusanSps as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collPesertaDidiksRelatedByKebutuhanKhususIdAyah) {
                foreach ($this->collPesertaDidiksRelatedByKebutuhanKhususIdAyah as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collPesertaDidiksRelatedByKebutuhanKhususIdIbu) {
                foreach ($this->collPesertaDidiksRelatedByKebutuhanKhususIdIbu as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collPesertaDidiksRelatedByKebutuhanKhususId) {
                foreach ($this->collPesertaDidiksRelatedByKebutuhanKhususId as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collProgramInklusis) {
                foreach ($this->collProgramInklusis as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collPtks) {
                foreach ($this->collPtks as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collRombonganBelajars) {
                foreach ($this->collRombonganBelajars as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collSekolahs) {
                foreach ($this->collSekolahs as $o) {
                    $o->clearAllReferences($deep);
                }
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collJenisSertifikasis instanceof PropelCollection) {
            $this->collJenisSertifikasis->clearIterator();
        }
        $this->collJenisSertifikasis = null;
        if ($this->collJurusanSps instanceof PropelCollection) {
            $this->collJurusanSps->clearIterator();
        }
        $this->collJurusanSps = null;
        if ($this->collPesertaDidiksRelatedByKebutuhanKhususIdAyah instanceof PropelCollection) {
            $this->collPesertaDidiksRelatedByKebutuhanKhususIdAyah->clearIterator();
        }
        $this->collPesertaDidiksRelatedByKebutuhanKhususIdAyah = null;
        if ($this->collPesertaDidiksRelatedByKebutuhanKhususIdIbu instanceof PropelCollection) {
            $this->collPesertaDidiksRelatedByKebutuhanKhususIdIbu->clearIterator();
        }
        $this->collPesertaDidiksRelatedByKebutuhanKhususIdIbu = null;
        if ($this->collPesertaDidiksRelatedByKebutuhanKhususId instanceof PropelCollection) {
            $this->collPesertaDidiksRelatedByKebutuhanKhususId->clearIterator();
        }
        $this->collPesertaDidiksRelatedByKebutuhanKhususId = null;
        if ($this->collProgramInklusis instanceof PropelCollection) {
            $this->collProgramInklusis->clearIterator();
        }
        $this->collProgramInklusis = null;
        if ($this->collPtks instanceof PropelCollection) {
            $this->collPtks->clearIterator();
        }
        $this->collPtks = null;
        if ($this->collRombonganBelajars instanceof PropelCollection) {
            $this->collRombonganBelajars->clearIterator();
        }
        $this->collRombonganBelajars = null;
        if ($this->collSekolahs instanceof PropelCollection) {
            $this->collSekolahs->clearIterator();
        }
        $this->collSekolahs = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(KebutuhanKhususPeer::DEFAULT_STRING_FORMAT);
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
