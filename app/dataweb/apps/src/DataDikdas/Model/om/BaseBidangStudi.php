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
use DataDikdas\Model\BidangSdm;
use DataDikdas\Model\BidangSdmQuery;
use DataDikdas\Model\BidangStudi;
use DataDikdas\Model\BidangStudiPeer;
use DataDikdas\Model\BidangStudiQuery;
use DataDikdas\Model\MapBidangMataPelajaran;
use DataDikdas\Model\MapBidangMataPelajaranQuery;
use DataDikdas\Model\PengawasTerdaftar;
use DataDikdas\Model\PengawasTerdaftarQuery;
use DataDikdas\Model\Ptk;
use DataDikdas\Model\PtkQuery;
use DataDikdas\Model\RwyPendFormal;
use DataDikdas\Model\RwyPendFormalQuery;
use DataDikdas\Model\RwySertifikasi;
use DataDikdas\Model\RwySertifikasiQuery;
use DataDikdas\Model\SertifikasiPd;
use DataDikdas\Model\SertifikasiPdQuery;

/**
 * Base class that represents a row from the 'ref.bidang_studi' table.
 *
 * 
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseBidangStudi extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'DataDikdas\\Model\\BidangStudiPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        BidangStudiPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the bidang_studi_id field.
     * @var        int
     */
    protected $bidang_studi_id;

    /**
     * The value for the kelompok_bidang_studi_id field.
     * @var        int
     */
    protected $kelompok_bidang_studi_id;

    /**
     * The value for the kode field.
     * @var        string
     */
    protected $kode;

    /**
     * The value for the bidang_studi field.
     * @var        string
     */
    protected $bidang_studi;

    /**
     * The value for the kelompok field.
     * @var        string
     */
    protected $kelompok;

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
     * The value for the a_sert_komp field.
     * Note: this column has a database default value of: '0'
     * @var        string
     */
    protected $a_sert_komp;

    /**
     * The value for the a_sert_profesi field.
     * Note: this column has a database default value of: '0'
     * @var        string
     */
    protected $a_sert_profesi;

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
     * @var        BidangStudi
     */
    protected $aBidangStudiRelatedByKelompokBidangStudiId;

    /**
     * @var        PropelObjectCollection|BidangSdm[] Collection to store aggregation of BidangSdm objects.
     */
    protected $collBidangSdms;
    protected $collBidangSdmsPartial;

    /**
     * @var        PropelObjectCollection|BidangStudi[] Collection to store aggregation of BidangStudi objects.
     */
    protected $collBidangStudisRelatedByBidangStudiId;
    protected $collBidangStudisRelatedByBidangStudiIdPartial;

    /**
     * @var        PropelObjectCollection|MapBidangMataPelajaran[] Collection to store aggregation of MapBidangMataPelajaran objects.
     */
    protected $collMapBidangMataPelajarans;
    protected $collMapBidangMataPelajaransPartial;

    /**
     * @var        PropelObjectCollection|PengawasTerdaftar[] Collection to store aggregation of PengawasTerdaftar objects.
     */
    protected $collPengawasTerdaftars;
    protected $collPengawasTerdaftarsPartial;

    /**
     * @var        PropelObjectCollection|Ptk[] Collection to store aggregation of Ptk objects.
     */
    protected $collPtks;
    protected $collPtksPartial;

    /**
     * @var        PropelObjectCollection|RwyPendFormal[] Collection to store aggregation of RwyPendFormal objects.
     */
    protected $collRwyPendFormals;
    protected $collRwyPendFormalsPartial;

    /**
     * @var        PropelObjectCollection|RwySertifikasi[] Collection to store aggregation of RwySertifikasi objects.
     */
    protected $collRwySertifikasis;
    protected $collRwySertifikasisPartial;

    /**
     * @var        PropelObjectCollection|SertifikasiPd[] Collection to store aggregation of SertifikasiPd objects.
     */
    protected $collSertifikasiPds;
    protected $collSertifikasiPdsPartial;

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
    protected $bidangSdmsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $bidangStudisRelatedByBidangStudiIdScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $mapBidangMataPelajaransScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $pengawasTerdaftarsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $ptksScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $rwyPendFormalsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $rwySertifikasisScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $sertifikasiPdsScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->a_sert_komp = '0';
        $this->a_sert_profesi = '0';
        $this->last_sync = '1901-01-01 00:00:00';
    }

    /**
     * Initializes internal state of BaseBidangStudi object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [bidang_studi_id] column value.
     * 
     * @return int
     */
    public function getBidangStudiId()
    {
        return $this->bidang_studi_id;
    }

    /**
     * Get the [kelompok_bidang_studi_id] column value.
     * 
     * @return int
     */
    public function getKelompokBidangStudiId()
    {
        return $this->kelompok_bidang_studi_id;
    }

    /**
     * Get the [kode] column value.
     * 
     * @return string
     */
    public function getKode()
    {
        return $this->kode;
    }

    /**
     * Get the [bidang_studi] column value.
     * 
     * @return string
     */
    public function getBidangStudi()
    {
        return $this->bidang_studi;
    }

    /**
     * Get the [kelompok] column value.
     * 
     * @return string
     */
    public function getKelompok()
    {
        return $this->kelompok;
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
     * Get the [a_sert_komp] column value.
     * 
     * @return string
     */
    public function getASertKomp()
    {
        return $this->a_sert_komp;
    }

    /**
     * Get the [a_sert_profesi] column value.
     * 
     * @return string
     */
    public function getASertProfesi()
    {
        return $this->a_sert_profesi;
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
     * Set the value of [bidang_studi_id] column.
     * 
     * @param int $v new value
     * @return BidangStudi The current object (for fluent API support)
     */
    public function setBidangStudiId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->bidang_studi_id !== $v) {
            $this->bidang_studi_id = $v;
            $this->modifiedColumns[] = BidangStudiPeer::BIDANG_STUDI_ID;
        }


        return $this;
    } // setBidangStudiId()

    /**
     * Set the value of [kelompok_bidang_studi_id] column.
     * 
     * @param int $v new value
     * @return BidangStudi The current object (for fluent API support)
     */
    public function setKelompokBidangStudiId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->kelompok_bidang_studi_id !== $v) {
            $this->kelompok_bidang_studi_id = $v;
            $this->modifiedColumns[] = BidangStudiPeer::KELOMPOK_BIDANG_STUDI_ID;
        }

        if ($this->aBidangStudiRelatedByKelompokBidangStudiId !== null && $this->aBidangStudiRelatedByKelompokBidangStudiId->getBidangStudiId() !== $v) {
            $this->aBidangStudiRelatedByKelompokBidangStudiId = null;
        }


        return $this;
    } // setKelompokBidangStudiId()

    /**
     * Set the value of [kode] column.
     * 
     * @param string $v new value
     * @return BidangStudi The current object (for fluent API support)
     */
    public function setKode($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->kode !== $v) {
            $this->kode = $v;
            $this->modifiedColumns[] = BidangStudiPeer::KODE;
        }


        return $this;
    } // setKode()

    /**
     * Set the value of [bidang_studi] column.
     * 
     * @param string $v new value
     * @return BidangStudi The current object (for fluent API support)
     */
    public function setBidangStudi($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->bidang_studi !== $v) {
            $this->bidang_studi = $v;
            $this->modifiedColumns[] = BidangStudiPeer::BIDANG_STUDI;
        }


        return $this;
    } // setBidangStudi()

    /**
     * Set the value of [kelompok] column.
     * 
     * @param string $v new value
     * @return BidangStudi The current object (for fluent API support)
     */
    public function setKelompok($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->kelompok !== $v) {
            $this->kelompok = $v;
            $this->modifiedColumns[] = BidangStudiPeer::KELOMPOK;
        }


        return $this;
    } // setKelompok()

    /**
     * Set the value of [jenjang_paud] column.
     * 
     * @param string $v new value
     * @return BidangStudi The current object (for fluent API support)
     */
    public function setJenjangPaud($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->jenjang_paud !== $v) {
            $this->jenjang_paud = $v;
            $this->modifiedColumns[] = BidangStudiPeer::JENJANG_PAUD;
        }


        return $this;
    } // setJenjangPaud()

    /**
     * Set the value of [jenjang_tk] column.
     * 
     * @param string $v new value
     * @return BidangStudi The current object (for fluent API support)
     */
    public function setJenjangTk($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->jenjang_tk !== $v) {
            $this->jenjang_tk = $v;
            $this->modifiedColumns[] = BidangStudiPeer::JENJANG_TK;
        }


        return $this;
    } // setJenjangTk()

    /**
     * Set the value of [jenjang_sd] column.
     * 
     * @param string $v new value
     * @return BidangStudi The current object (for fluent API support)
     */
    public function setJenjangSd($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->jenjang_sd !== $v) {
            $this->jenjang_sd = $v;
            $this->modifiedColumns[] = BidangStudiPeer::JENJANG_SD;
        }


        return $this;
    } // setJenjangSd()

    /**
     * Set the value of [jenjang_smp] column.
     * 
     * @param string $v new value
     * @return BidangStudi The current object (for fluent API support)
     */
    public function setJenjangSmp($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->jenjang_smp !== $v) {
            $this->jenjang_smp = $v;
            $this->modifiedColumns[] = BidangStudiPeer::JENJANG_SMP;
        }


        return $this;
    } // setJenjangSmp()

    /**
     * Set the value of [jenjang_sma] column.
     * 
     * @param string $v new value
     * @return BidangStudi The current object (for fluent API support)
     */
    public function setJenjangSma($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->jenjang_sma !== $v) {
            $this->jenjang_sma = $v;
            $this->modifiedColumns[] = BidangStudiPeer::JENJANG_SMA;
        }


        return $this;
    } // setJenjangSma()

    /**
     * Set the value of [jenjang_tinggi] column.
     * 
     * @param string $v new value
     * @return BidangStudi The current object (for fluent API support)
     */
    public function setJenjangTinggi($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->jenjang_tinggi !== $v) {
            $this->jenjang_tinggi = $v;
            $this->modifiedColumns[] = BidangStudiPeer::JENJANG_TINGGI;
        }


        return $this;
    } // setJenjangTinggi()

    /**
     * Set the value of [a_sert_komp] column.
     * 
     * @param string $v new value
     * @return BidangStudi The current object (for fluent API support)
     */
    public function setASertKomp($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->a_sert_komp !== $v) {
            $this->a_sert_komp = $v;
            $this->modifiedColumns[] = BidangStudiPeer::A_SERT_KOMP;
        }


        return $this;
    } // setASertKomp()

    /**
     * Set the value of [a_sert_profesi] column.
     * 
     * @param string $v new value
     * @return BidangStudi The current object (for fluent API support)
     */
    public function setASertProfesi($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->a_sert_profesi !== $v) {
            $this->a_sert_profesi = $v;
            $this->modifiedColumns[] = BidangStudiPeer::A_SERT_PROFESI;
        }


        return $this;
    } // setASertProfesi()

    /**
     * Sets the value of [create_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return BidangStudi The current object (for fluent API support)
     */
    public function setCreateDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->create_date !== null || $dt !== null) {
            $currentDateAsString = ($this->create_date !== null && $tmpDt = new DateTime($this->create_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->create_date = $newDateAsString;
                $this->modifiedColumns[] = BidangStudiPeer::CREATE_DATE;
            }
        } // if either are not null


        return $this;
    } // setCreateDate()

    /**
     * Sets the value of [last_update] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return BidangStudi The current object (for fluent API support)
     */
    public function setLastUpdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->last_update !== null || $dt !== null) {
            $currentDateAsString = ($this->last_update !== null && $tmpDt = new DateTime($this->last_update)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->last_update = $newDateAsString;
                $this->modifiedColumns[] = BidangStudiPeer::LAST_UPDATE;
            }
        } // if either are not null


        return $this;
    } // setLastUpdate()

    /**
     * Sets the value of [expired_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return BidangStudi The current object (for fluent API support)
     */
    public function setExpiredDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->expired_date !== null || $dt !== null) {
            $currentDateAsString = ($this->expired_date !== null && $tmpDt = new DateTime($this->expired_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->expired_date = $newDateAsString;
                $this->modifiedColumns[] = BidangStudiPeer::EXPIRED_DATE;
            }
        } // if either are not null


        return $this;
    } // setExpiredDate()

    /**
     * Sets the value of [last_sync] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return BidangStudi The current object (for fluent API support)
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
                $this->modifiedColumns[] = BidangStudiPeer::LAST_SYNC;
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
            if ($this->a_sert_komp !== '0') {
                return false;
            }

            if ($this->a_sert_profesi !== '0') {
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

            $this->bidang_studi_id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->kelompok_bidang_studi_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->kode = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->bidang_studi = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->kelompok = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->jenjang_paud = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->jenjang_tk = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->jenjang_sd = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->jenjang_smp = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->jenjang_sma = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
            $this->jenjang_tinggi = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
            $this->a_sert_komp = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
            $this->a_sert_profesi = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
            $this->create_date = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
            $this->last_update = ($row[$startcol + 14] !== null) ? (string) $row[$startcol + 14] : null;
            $this->expired_date = ($row[$startcol + 15] !== null) ? (string) $row[$startcol + 15] : null;
            $this->last_sync = ($row[$startcol + 16] !== null) ? (string) $row[$startcol + 16] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 17; // 17 = BidangStudiPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating BidangStudi object", $e);
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

        if ($this->aBidangStudiRelatedByKelompokBidangStudiId !== null && $this->kelompok_bidang_studi_id !== $this->aBidangStudiRelatedByKelompokBidangStudiId->getBidangStudiId()) {
            $this->aBidangStudiRelatedByKelompokBidangStudiId = null;
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
            $con = Propel::getConnection(BidangStudiPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = BidangStudiPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aBidangStudiRelatedByKelompokBidangStudiId = null;
            $this->collBidangSdms = null;

            $this->collBidangStudisRelatedByBidangStudiId = null;

            $this->collMapBidangMataPelajarans = null;

            $this->collPengawasTerdaftars = null;

            $this->collPtks = null;

            $this->collRwyPendFormals = null;

            $this->collRwySertifikasis = null;

            $this->collSertifikasiPds = null;

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
            $con = Propel::getConnection(BidangStudiPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = BidangStudiQuery::create()
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
            $con = Propel::getConnection(BidangStudiPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                BidangStudiPeer::addInstanceToPool($this);
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

            if ($this->aBidangStudiRelatedByKelompokBidangStudiId !== null) {
                if ($this->aBidangStudiRelatedByKelompokBidangStudiId->isModified() || $this->aBidangStudiRelatedByKelompokBidangStudiId->isNew()) {
                    $affectedRows += $this->aBidangStudiRelatedByKelompokBidangStudiId->save($con);
                }
                $this->setBidangStudiRelatedByKelompokBidangStudiId($this->aBidangStudiRelatedByKelompokBidangStudiId);
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

            if ($this->bidangSdmsScheduledForDeletion !== null) {
                if (!$this->bidangSdmsScheduledForDeletion->isEmpty()) {
                    BidangSdmQuery::create()
                        ->filterByPrimaryKeys($this->bidangSdmsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->bidangSdmsScheduledForDeletion = null;
                }
            }

            if ($this->collBidangSdms !== null) {
                foreach ($this->collBidangSdms as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->bidangStudisRelatedByBidangStudiIdScheduledForDeletion !== null) {
                if (!$this->bidangStudisRelatedByBidangStudiIdScheduledForDeletion->isEmpty()) {
                    foreach ($this->bidangStudisRelatedByBidangStudiIdScheduledForDeletion as $bidangStudiRelatedByBidangStudiId) {
                        // need to save related object because we set the relation to null
                        $bidangStudiRelatedByBidangStudiId->save($con);
                    }
                    $this->bidangStudisRelatedByBidangStudiIdScheduledForDeletion = null;
                }
            }

            if ($this->collBidangStudisRelatedByBidangStudiId !== null) {
                foreach ($this->collBidangStudisRelatedByBidangStudiId as $referrerFK) {
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

            if ($this->ptksScheduledForDeletion !== null) {
                if (!$this->ptksScheduledForDeletion->isEmpty()) {
                    foreach ($this->ptksScheduledForDeletion as $ptk) {
                        // need to save related object because we set the relation to null
                        $ptk->save($con);
                    }
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

            if ($this->rwyPendFormalsScheduledForDeletion !== null) {
                if (!$this->rwyPendFormalsScheduledForDeletion->isEmpty()) {
                    RwyPendFormalQuery::create()
                        ->filterByPrimaryKeys($this->rwyPendFormalsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->rwyPendFormalsScheduledForDeletion = null;
                }
            }

            if ($this->collRwyPendFormals !== null) {
                foreach ($this->collRwyPendFormals as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->rwySertifikasisScheduledForDeletion !== null) {
                if (!$this->rwySertifikasisScheduledForDeletion->isEmpty()) {
                    RwySertifikasiQuery::create()
                        ->filterByPrimaryKeys($this->rwySertifikasisScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->rwySertifikasisScheduledForDeletion = null;
                }
            }

            if ($this->collRwySertifikasis !== null) {
                foreach ($this->collRwySertifikasis as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->sertifikasiPdsScheduledForDeletion !== null) {
                if (!$this->sertifikasiPdsScheduledForDeletion->isEmpty()) {
                    SertifikasiPdQuery::create()
                        ->filterByPrimaryKeys($this->sertifikasiPdsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->sertifikasiPdsScheduledForDeletion = null;
                }
            }

            if ($this->collSertifikasiPds !== null) {
                foreach ($this->collSertifikasiPds as $referrerFK) {
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
        if ($this->isColumnModified(BidangStudiPeer::BIDANG_STUDI_ID)) {
            $modifiedColumns[':p' . $index++]  = '"bidang_studi_id"';
        }
        if ($this->isColumnModified(BidangStudiPeer::KELOMPOK_BIDANG_STUDI_ID)) {
            $modifiedColumns[':p' . $index++]  = '"kelompok_bidang_studi_id"';
        }
        if ($this->isColumnModified(BidangStudiPeer::KODE)) {
            $modifiedColumns[':p' . $index++]  = '"kode"';
        }
        if ($this->isColumnModified(BidangStudiPeer::BIDANG_STUDI)) {
            $modifiedColumns[':p' . $index++]  = '"bidang_studi"';
        }
        if ($this->isColumnModified(BidangStudiPeer::KELOMPOK)) {
            $modifiedColumns[':p' . $index++]  = '"kelompok"';
        }
        if ($this->isColumnModified(BidangStudiPeer::JENJANG_PAUD)) {
            $modifiedColumns[':p' . $index++]  = '"jenjang_paud"';
        }
        if ($this->isColumnModified(BidangStudiPeer::JENJANG_TK)) {
            $modifiedColumns[':p' . $index++]  = '"jenjang_tk"';
        }
        if ($this->isColumnModified(BidangStudiPeer::JENJANG_SD)) {
            $modifiedColumns[':p' . $index++]  = '"jenjang_sd"';
        }
        if ($this->isColumnModified(BidangStudiPeer::JENJANG_SMP)) {
            $modifiedColumns[':p' . $index++]  = '"jenjang_smp"';
        }
        if ($this->isColumnModified(BidangStudiPeer::JENJANG_SMA)) {
            $modifiedColumns[':p' . $index++]  = '"jenjang_sma"';
        }
        if ($this->isColumnModified(BidangStudiPeer::JENJANG_TINGGI)) {
            $modifiedColumns[':p' . $index++]  = '"jenjang_tinggi"';
        }
        if ($this->isColumnModified(BidangStudiPeer::A_SERT_KOMP)) {
            $modifiedColumns[':p' . $index++]  = '"a_sert_komp"';
        }
        if ($this->isColumnModified(BidangStudiPeer::A_SERT_PROFESI)) {
            $modifiedColumns[':p' . $index++]  = '"a_sert_profesi"';
        }
        if ($this->isColumnModified(BidangStudiPeer::CREATE_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"create_date"';
        }
        if ($this->isColumnModified(BidangStudiPeer::LAST_UPDATE)) {
            $modifiedColumns[':p' . $index++]  = '"last_update"';
        }
        if ($this->isColumnModified(BidangStudiPeer::EXPIRED_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"expired_date"';
        }
        if ($this->isColumnModified(BidangStudiPeer::LAST_SYNC)) {
            $modifiedColumns[':p' . $index++]  = '"last_sync"';
        }

        $sql = sprintf(
            'INSERT INTO "ref"."bidang_studi" (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '"bidang_studi_id"':						
                        $stmt->bindValue($identifier, $this->bidang_studi_id, PDO::PARAM_INT);
                        break;
                    case '"kelompok_bidang_studi_id"':						
                        $stmt->bindValue($identifier, $this->kelompok_bidang_studi_id, PDO::PARAM_INT);
                        break;
                    case '"kode"':						
                        $stmt->bindValue($identifier, $this->kode, PDO::PARAM_STR);
                        break;
                    case '"bidang_studi"':						
                        $stmt->bindValue($identifier, $this->bidang_studi, PDO::PARAM_STR);
                        break;
                    case '"kelompok"':						
                        $stmt->bindValue($identifier, $this->kelompok, PDO::PARAM_STR);
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
                    case '"a_sert_komp"':						
                        $stmt->bindValue($identifier, $this->a_sert_komp, PDO::PARAM_STR);
                        break;
                    case '"a_sert_profesi"':						
                        $stmt->bindValue($identifier, $this->a_sert_profesi, PDO::PARAM_STR);
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

            if ($this->aBidangStudiRelatedByKelompokBidangStudiId !== null) {
                if (!$this->aBidangStudiRelatedByKelompokBidangStudiId->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aBidangStudiRelatedByKelompokBidangStudiId->getValidationFailures());
                }
            }


            if (($retval = BidangStudiPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collBidangSdms !== null) {
                    foreach ($this->collBidangSdms as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collBidangStudisRelatedByBidangStudiId !== null) {
                    foreach ($this->collBidangStudisRelatedByBidangStudiId as $referrerFK) {
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

                if ($this->collPengawasTerdaftars !== null) {
                    foreach ($this->collPengawasTerdaftars as $referrerFK) {
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

                if ($this->collRwyPendFormals !== null) {
                    foreach ($this->collRwyPendFormals as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collRwySertifikasis !== null) {
                    foreach ($this->collRwySertifikasis as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collSertifikasiPds !== null) {
                    foreach ($this->collSertifikasiPds as $referrerFK) {
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
        $pos = BidangStudiPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getBidangStudiId();
                break;
            case 1:
                return $this->getKelompokBidangStudiId();
                break;
            case 2:
                return $this->getKode();
                break;
            case 3:
                return $this->getBidangStudi();
                break;
            case 4:
                return $this->getKelompok();
                break;
            case 5:
                return $this->getJenjangPaud();
                break;
            case 6:
                return $this->getJenjangTk();
                break;
            case 7:
                return $this->getJenjangSd();
                break;
            case 8:
                return $this->getJenjangSmp();
                break;
            case 9:
                return $this->getJenjangSma();
                break;
            case 10:
                return $this->getJenjangTinggi();
                break;
            case 11:
                return $this->getASertKomp();
                break;
            case 12:
                return $this->getASertProfesi();
                break;
            case 13:
                return $this->getCreateDate();
                break;
            case 14:
                return $this->getLastUpdate();
                break;
            case 15:
                return $this->getExpiredDate();
                break;
            case 16:
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
        if (isset($alreadyDumpedObjects['BidangStudi'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['BidangStudi'][$this->getPrimaryKey()] = true;
        $keys = BidangStudiPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getBidangStudiId(),
            $keys[1] => $this->getKelompokBidangStudiId(),
            $keys[2] => $this->getKode(),
            $keys[3] => $this->getBidangStudi(),
            $keys[4] => $this->getKelompok(),
            $keys[5] => $this->getJenjangPaud(),
            $keys[6] => $this->getJenjangTk(),
            $keys[7] => $this->getJenjangSd(),
            $keys[8] => $this->getJenjangSmp(),
            $keys[9] => $this->getJenjangSma(),
            $keys[10] => $this->getJenjangTinggi(),
            $keys[11] => $this->getASertKomp(),
            $keys[12] => $this->getASertProfesi(),
            $keys[13] => $this->getCreateDate(),
            $keys[14] => $this->getLastUpdate(),
            $keys[15] => $this->getExpiredDate(),
            $keys[16] => $this->getLastSync(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aBidangStudiRelatedByKelompokBidangStudiId) {
                $result['BidangStudiRelatedByKelompokBidangStudiId'] = $this->aBidangStudiRelatedByKelompokBidangStudiId->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collBidangSdms) {
                $result['BidangSdms'] = $this->collBidangSdms->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collBidangStudisRelatedByBidangStudiId) {
                $result['BidangStudisRelatedByBidangStudiId'] = $this->collBidangStudisRelatedByBidangStudiId->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collMapBidangMataPelajarans) {
                $result['MapBidangMataPelajarans'] = $this->collMapBidangMataPelajarans->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collPengawasTerdaftars) {
                $result['PengawasTerdaftars'] = $this->collPengawasTerdaftars->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collPtks) {
                $result['Ptks'] = $this->collPtks->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collRwyPendFormals) {
                $result['RwyPendFormals'] = $this->collRwyPendFormals->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collRwySertifikasis) {
                $result['RwySertifikasis'] = $this->collRwySertifikasis->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collSertifikasiPds) {
                $result['SertifikasiPds'] = $this->collSertifikasiPds->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = BidangStudiPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setBidangStudiId($value);
                break;
            case 1:
                $this->setKelompokBidangStudiId($value);
                break;
            case 2:
                $this->setKode($value);
                break;
            case 3:
                $this->setBidangStudi($value);
                break;
            case 4:
                $this->setKelompok($value);
                break;
            case 5:
                $this->setJenjangPaud($value);
                break;
            case 6:
                $this->setJenjangTk($value);
                break;
            case 7:
                $this->setJenjangSd($value);
                break;
            case 8:
                $this->setJenjangSmp($value);
                break;
            case 9:
                $this->setJenjangSma($value);
                break;
            case 10:
                $this->setJenjangTinggi($value);
                break;
            case 11:
                $this->setASertKomp($value);
                break;
            case 12:
                $this->setASertProfesi($value);
                break;
            case 13:
                $this->setCreateDate($value);
                break;
            case 14:
                $this->setLastUpdate($value);
                break;
            case 15:
                $this->setExpiredDate($value);
                break;
            case 16:
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
        $keys = BidangStudiPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setBidangStudiId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setKelompokBidangStudiId($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setKode($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setBidangStudi($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setKelompok($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setJenjangPaud($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setJenjangTk($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setJenjangSd($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setJenjangSmp($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setJenjangSma($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setJenjangTinggi($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setASertKomp($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setASertProfesi($arr[$keys[12]]);
        if (array_key_exists($keys[13], $arr)) $this->setCreateDate($arr[$keys[13]]);
        if (array_key_exists($keys[14], $arr)) $this->setLastUpdate($arr[$keys[14]]);
        if (array_key_exists($keys[15], $arr)) $this->setExpiredDate($arr[$keys[15]]);
        if (array_key_exists($keys[16], $arr)) $this->setLastSync($arr[$keys[16]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(BidangStudiPeer::DATABASE_NAME);

        if ($this->isColumnModified(BidangStudiPeer::BIDANG_STUDI_ID)) $criteria->add(BidangStudiPeer::BIDANG_STUDI_ID, $this->bidang_studi_id);
        if ($this->isColumnModified(BidangStudiPeer::KELOMPOK_BIDANG_STUDI_ID)) $criteria->add(BidangStudiPeer::KELOMPOK_BIDANG_STUDI_ID, $this->kelompok_bidang_studi_id);
        if ($this->isColumnModified(BidangStudiPeer::KODE)) $criteria->add(BidangStudiPeer::KODE, $this->kode);
        if ($this->isColumnModified(BidangStudiPeer::BIDANG_STUDI)) $criteria->add(BidangStudiPeer::BIDANG_STUDI, $this->bidang_studi);
        if ($this->isColumnModified(BidangStudiPeer::KELOMPOK)) $criteria->add(BidangStudiPeer::KELOMPOK, $this->kelompok);
        if ($this->isColumnModified(BidangStudiPeer::JENJANG_PAUD)) $criteria->add(BidangStudiPeer::JENJANG_PAUD, $this->jenjang_paud);
        if ($this->isColumnModified(BidangStudiPeer::JENJANG_TK)) $criteria->add(BidangStudiPeer::JENJANG_TK, $this->jenjang_tk);
        if ($this->isColumnModified(BidangStudiPeer::JENJANG_SD)) $criteria->add(BidangStudiPeer::JENJANG_SD, $this->jenjang_sd);
        if ($this->isColumnModified(BidangStudiPeer::JENJANG_SMP)) $criteria->add(BidangStudiPeer::JENJANG_SMP, $this->jenjang_smp);
        if ($this->isColumnModified(BidangStudiPeer::JENJANG_SMA)) $criteria->add(BidangStudiPeer::JENJANG_SMA, $this->jenjang_sma);
        if ($this->isColumnModified(BidangStudiPeer::JENJANG_TINGGI)) $criteria->add(BidangStudiPeer::JENJANG_TINGGI, $this->jenjang_tinggi);
        if ($this->isColumnModified(BidangStudiPeer::A_SERT_KOMP)) $criteria->add(BidangStudiPeer::A_SERT_KOMP, $this->a_sert_komp);
        if ($this->isColumnModified(BidangStudiPeer::A_SERT_PROFESI)) $criteria->add(BidangStudiPeer::A_SERT_PROFESI, $this->a_sert_profesi);
        if ($this->isColumnModified(BidangStudiPeer::CREATE_DATE)) $criteria->add(BidangStudiPeer::CREATE_DATE, $this->create_date);
        if ($this->isColumnModified(BidangStudiPeer::LAST_UPDATE)) $criteria->add(BidangStudiPeer::LAST_UPDATE, $this->last_update);
        if ($this->isColumnModified(BidangStudiPeer::EXPIRED_DATE)) $criteria->add(BidangStudiPeer::EXPIRED_DATE, $this->expired_date);
        if ($this->isColumnModified(BidangStudiPeer::LAST_SYNC)) $criteria->add(BidangStudiPeer::LAST_SYNC, $this->last_sync);

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
        $criteria = new Criteria(BidangStudiPeer::DATABASE_NAME);
        $criteria->add(BidangStudiPeer::BIDANG_STUDI_ID, $this->bidang_studi_id);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getBidangStudiId();
    }

    /**
     * Generic method to set the primary key (bidang_studi_id column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setBidangStudiId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getBidangStudiId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of BidangStudi (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setKelompokBidangStudiId($this->getKelompokBidangStudiId());
        $copyObj->setKode($this->getKode());
        $copyObj->setBidangStudi($this->getBidangStudi());
        $copyObj->setKelompok($this->getKelompok());
        $copyObj->setJenjangPaud($this->getJenjangPaud());
        $copyObj->setJenjangTk($this->getJenjangTk());
        $copyObj->setJenjangSd($this->getJenjangSd());
        $copyObj->setJenjangSmp($this->getJenjangSmp());
        $copyObj->setJenjangSma($this->getJenjangSma());
        $copyObj->setJenjangTinggi($this->getJenjangTinggi());
        $copyObj->setASertKomp($this->getASertKomp());
        $copyObj->setASertProfesi($this->getASertProfesi());
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

            foreach ($this->getBidangSdms() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addBidangSdm($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getBidangStudisRelatedByBidangStudiId() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addBidangStudiRelatedByBidangStudiId($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getMapBidangMataPelajarans() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addMapBidangMataPelajaran($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getPengawasTerdaftars() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPengawasTerdaftar($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getPtks() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPtk($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getRwyPendFormals() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addRwyPendFormal($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getRwySertifikasis() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addRwySertifikasi($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getSertifikasiPds() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSertifikasiPd($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setBidangStudiId(NULL); // this is a auto-increment column, so set to default value
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
     * @return BidangStudi Clone of current object.
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
     * @return BidangStudiPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new BidangStudiPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a BidangStudi object.
     *
     * @param             BidangStudi $v
     * @return BidangStudi The current object (for fluent API support)
     * @throws PropelException
     */
    public function setBidangStudiRelatedByKelompokBidangStudiId(BidangStudi $v = null)
    {
        if ($v === null) {
            $this->setKelompokBidangStudiId(NULL);
        } else {
            $this->setKelompokBidangStudiId($v->getBidangStudiId());
        }

        $this->aBidangStudiRelatedByKelompokBidangStudiId = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the BidangStudi object, it will not be re-added.
        if ($v !== null) {
            $v->addBidangStudiRelatedByBidangStudiId($this);
        }


        return $this;
    }


    /**
     * Get the associated BidangStudi object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return BidangStudi The associated BidangStudi object.
     * @throws PropelException
     */
    public function getBidangStudiRelatedByKelompokBidangStudiId(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aBidangStudiRelatedByKelompokBidangStudiId === null && ($this->kelompok_bidang_studi_id !== null) && $doQuery) {
            $this->aBidangStudiRelatedByKelompokBidangStudiId = BidangStudiQuery::create()->findPk($this->kelompok_bidang_studi_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aBidangStudiRelatedByKelompokBidangStudiId->addBidangStudisRelatedByBidangStudiId($this);
             */
        }

        return $this->aBidangStudiRelatedByKelompokBidangStudiId;
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
        if ('BidangSdm' == $relationName) {
            $this->initBidangSdms();
        }
        if ('BidangStudiRelatedByBidangStudiId' == $relationName) {
            $this->initBidangStudisRelatedByBidangStudiId();
        }
        if ('MapBidangMataPelajaran' == $relationName) {
            $this->initMapBidangMataPelajarans();
        }
        if ('PengawasTerdaftar' == $relationName) {
            $this->initPengawasTerdaftars();
        }
        if ('Ptk' == $relationName) {
            $this->initPtks();
        }
        if ('RwyPendFormal' == $relationName) {
            $this->initRwyPendFormals();
        }
        if ('RwySertifikasi' == $relationName) {
            $this->initRwySertifikasis();
        }
        if ('SertifikasiPd' == $relationName) {
            $this->initSertifikasiPds();
        }
    }

    /**
     * Clears out the collBidangSdms collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return BidangStudi The current object (for fluent API support)
     * @see        addBidangSdms()
     */
    public function clearBidangSdms()
    {
        $this->collBidangSdms = null; // important to set this to null since that means it is uninitialized
        $this->collBidangSdmsPartial = null;

        return $this;
    }

    /**
     * reset is the collBidangSdms collection loaded partially
     *
     * @return void
     */
    public function resetPartialBidangSdms($v = true)
    {
        $this->collBidangSdmsPartial = $v;
    }

    /**
     * Initializes the collBidangSdms collection.
     *
     * By default this just sets the collBidangSdms collection to an empty array (like clearcollBidangSdms());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initBidangSdms($overrideExisting = true)
    {
        if (null !== $this->collBidangSdms && !$overrideExisting) {
            return;
        }
        $this->collBidangSdms = new PropelObjectCollection();
        $this->collBidangSdms->setModel('BidangSdm');
    }

    /**
     * Gets an array of BidangSdm objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this BidangStudi is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|BidangSdm[] List of BidangSdm objects
     * @throws PropelException
     */
    public function getBidangSdms($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collBidangSdmsPartial && !$this->isNew();
        if (null === $this->collBidangSdms || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collBidangSdms) {
                // return empty collection
                $this->initBidangSdms();
            } else {
                $collBidangSdms = BidangSdmQuery::create(null, $criteria)
                    ->filterByBidangStudi($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collBidangSdmsPartial && count($collBidangSdms)) {
                      $this->initBidangSdms(false);

                      foreach($collBidangSdms as $obj) {
                        if (false == $this->collBidangSdms->contains($obj)) {
                          $this->collBidangSdms->append($obj);
                        }
                      }

                      $this->collBidangSdmsPartial = true;
                    }

                    $collBidangSdms->getInternalIterator()->rewind();
                    return $collBidangSdms;
                }

                if($partial && $this->collBidangSdms) {
                    foreach($this->collBidangSdms as $obj) {
                        if($obj->isNew()) {
                            $collBidangSdms[] = $obj;
                        }
                    }
                }

                $this->collBidangSdms = $collBidangSdms;
                $this->collBidangSdmsPartial = false;
            }
        }

        return $this->collBidangSdms;
    }

    /**
     * Sets a collection of BidangSdm objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $bidangSdms A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return BidangStudi The current object (for fluent API support)
     */
    public function setBidangSdms(PropelCollection $bidangSdms, PropelPDO $con = null)
    {
        $bidangSdmsToDelete = $this->getBidangSdms(new Criteria(), $con)->diff($bidangSdms);

        $this->bidangSdmsScheduledForDeletion = unserialize(serialize($bidangSdmsToDelete));

        foreach ($bidangSdmsToDelete as $bidangSdmRemoved) {
            $bidangSdmRemoved->setBidangStudi(null);
        }

        $this->collBidangSdms = null;
        foreach ($bidangSdms as $bidangSdm) {
            $this->addBidangSdm($bidangSdm);
        }

        $this->collBidangSdms = $bidangSdms;
        $this->collBidangSdmsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related BidangSdm objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related BidangSdm objects.
     * @throws PropelException
     */
    public function countBidangSdms(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collBidangSdmsPartial && !$this->isNew();
        if (null === $this->collBidangSdms || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collBidangSdms) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getBidangSdms());
            }
            $query = BidangSdmQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByBidangStudi($this)
                ->count($con);
        }

        return count($this->collBidangSdms);
    }

    /**
     * Method called to associate a BidangSdm object to this object
     * through the BidangSdm foreign key attribute.
     *
     * @param    BidangSdm $l BidangSdm
     * @return BidangStudi The current object (for fluent API support)
     */
    public function addBidangSdm(BidangSdm $l)
    {
        if ($this->collBidangSdms === null) {
            $this->initBidangSdms();
            $this->collBidangSdmsPartial = true;
        }
        if (!in_array($l, $this->collBidangSdms->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddBidangSdm($l);
        }

        return $this;
    }

    /**
     * @param	BidangSdm $bidangSdm The bidangSdm object to add.
     */
    protected function doAddBidangSdm($bidangSdm)
    {
        $this->collBidangSdms[]= $bidangSdm;
        $bidangSdm->setBidangStudi($this);
    }

    /**
     * @param	BidangSdm $bidangSdm The bidangSdm object to remove.
     * @return BidangStudi The current object (for fluent API support)
     */
    public function removeBidangSdm($bidangSdm)
    {
        if ($this->getBidangSdms()->contains($bidangSdm)) {
            $this->collBidangSdms->remove($this->collBidangSdms->search($bidangSdm));
            if (null === $this->bidangSdmsScheduledForDeletion) {
                $this->bidangSdmsScheduledForDeletion = clone $this->collBidangSdms;
                $this->bidangSdmsScheduledForDeletion->clear();
            }
            $this->bidangSdmsScheduledForDeletion[]= clone $bidangSdm;
            $bidangSdm->setBidangStudi(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this BidangStudi is new, it will return
     * an empty collection; or if this BidangStudi has previously
     * been saved, it will retrieve related BidangSdms from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in BidangStudi.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|BidangSdm[] List of BidangSdm objects
     */
    public function getBidangSdmsJoinPtk($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = BidangSdmQuery::create(null, $criteria);
        $query->joinWith('Ptk', $join_behavior);

        return $this->getBidangSdms($query, $con);
    }

    /**
     * Clears out the collBidangStudisRelatedByBidangStudiId collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return BidangStudi The current object (for fluent API support)
     * @see        addBidangStudisRelatedByBidangStudiId()
     */
    public function clearBidangStudisRelatedByBidangStudiId()
    {
        $this->collBidangStudisRelatedByBidangStudiId = null; // important to set this to null since that means it is uninitialized
        $this->collBidangStudisRelatedByBidangStudiIdPartial = null;

        return $this;
    }

    /**
     * reset is the collBidangStudisRelatedByBidangStudiId collection loaded partially
     *
     * @return void
     */
    public function resetPartialBidangStudisRelatedByBidangStudiId($v = true)
    {
        $this->collBidangStudisRelatedByBidangStudiIdPartial = $v;
    }

    /**
     * Initializes the collBidangStudisRelatedByBidangStudiId collection.
     *
     * By default this just sets the collBidangStudisRelatedByBidangStudiId collection to an empty array (like clearcollBidangStudisRelatedByBidangStudiId());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initBidangStudisRelatedByBidangStudiId($overrideExisting = true)
    {
        if (null !== $this->collBidangStudisRelatedByBidangStudiId && !$overrideExisting) {
            return;
        }
        $this->collBidangStudisRelatedByBidangStudiId = new PropelObjectCollection();
        $this->collBidangStudisRelatedByBidangStudiId->setModel('BidangStudi');
    }

    /**
     * Gets an array of BidangStudi objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this BidangStudi is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|BidangStudi[] List of BidangStudi objects
     * @throws PropelException
     */
    public function getBidangStudisRelatedByBidangStudiId($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collBidangStudisRelatedByBidangStudiIdPartial && !$this->isNew();
        if (null === $this->collBidangStudisRelatedByBidangStudiId || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collBidangStudisRelatedByBidangStudiId) {
                // return empty collection
                $this->initBidangStudisRelatedByBidangStudiId();
            } else {
                $collBidangStudisRelatedByBidangStudiId = BidangStudiQuery::create(null, $criteria)
                    ->filterByBidangStudiRelatedByKelompokBidangStudiId($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collBidangStudisRelatedByBidangStudiIdPartial && count($collBidangStudisRelatedByBidangStudiId)) {
                      $this->initBidangStudisRelatedByBidangStudiId(false);

                      foreach($collBidangStudisRelatedByBidangStudiId as $obj) {
                        if (false == $this->collBidangStudisRelatedByBidangStudiId->contains($obj)) {
                          $this->collBidangStudisRelatedByBidangStudiId->append($obj);
                        }
                      }

                      $this->collBidangStudisRelatedByBidangStudiIdPartial = true;
                    }

                    $collBidangStudisRelatedByBidangStudiId->getInternalIterator()->rewind();
                    return $collBidangStudisRelatedByBidangStudiId;
                }

                if($partial && $this->collBidangStudisRelatedByBidangStudiId) {
                    foreach($this->collBidangStudisRelatedByBidangStudiId as $obj) {
                        if($obj->isNew()) {
                            $collBidangStudisRelatedByBidangStudiId[] = $obj;
                        }
                    }
                }

                $this->collBidangStudisRelatedByBidangStudiId = $collBidangStudisRelatedByBidangStudiId;
                $this->collBidangStudisRelatedByBidangStudiIdPartial = false;
            }
        }

        return $this->collBidangStudisRelatedByBidangStudiId;
    }

    /**
     * Sets a collection of BidangStudiRelatedByBidangStudiId objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $bidangStudisRelatedByBidangStudiId A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return BidangStudi The current object (for fluent API support)
     */
    public function setBidangStudisRelatedByBidangStudiId(PropelCollection $bidangStudisRelatedByBidangStudiId, PropelPDO $con = null)
    {
        $bidangStudisRelatedByBidangStudiIdToDelete = $this->getBidangStudisRelatedByBidangStudiId(new Criteria(), $con)->diff($bidangStudisRelatedByBidangStudiId);

        $this->bidangStudisRelatedByBidangStudiIdScheduledForDeletion = unserialize(serialize($bidangStudisRelatedByBidangStudiIdToDelete));

        foreach ($bidangStudisRelatedByBidangStudiIdToDelete as $bidangStudiRelatedByBidangStudiIdRemoved) {
            $bidangStudiRelatedByBidangStudiIdRemoved->setBidangStudiRelatedByKelompokBidangStudiId(null);
        }

        $this->collBidangStudisRelatedByBidangStudiId = null;
        foreach ($bidangStudisRelatedByBidangStudiId as $bidangStudiRelatedByBidangStudiId) {
            $this->addBidangStudiRelatedByBidangStudiId($bidangStudiRelatedByBidangStudiId);
        }

        $this->collBidangStudisRelatedByBidangStudiId = $bidangStudisRelatedByBidangStudiId;
        $this->collBidangStudisRelatedByBidangStudiIdPartial = false;

        return $this;
    }

    /**
     * Returns the number of related BidangStudi objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related BidangStudi objects.
     * @throws PropelException
     */
    public function countBidangStudisRelatedByBidangStudiId(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collBidangStudisRelatedByBidangStudiIdPartial && !$this->isNew();
        if (null === $this->collBidangStudisRelatedByBidangStudiId || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collBidangStudisRelatedByBidangStudiId) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getBidangStudisRelatedByBidangStudiId());
            }
            $query = BidangStudiQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByBidangStudiRelatedByKelompokBidangStudiId($this)
                ->count($con);
        }

        return count($this->collBidangStudisRelatedByBidangStudiId);
    }

    /**
     * Method called to associate a BidangStudi object to this object
     * through the BidangStudi foreign key attribute.
     *
     * @param    BidangStudi $l BidangStudi
     * @return BidangStudi The current object (for fluent API support)
     */
    public function addBidangStudiRelatedByBidangStudiId(BidangStudi $l)
    {
        if ($this->collBidangStudisRelatedByBidangStudiId === null) {
            $this->initBidangStudisRelatedByBidangStudiId();
            $this->collBidangStudisRelatedByBidangStudiIdPartial = true;
        }
        if (!in_array($l, $this->collBidangStudisRelatedByBidangStudiId->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddBidangStudiRelatedByBidangStudiId($l);
        }

        return $this;
    }

    /**
     * @param	BidangStudiRelatedByBidangStudiId $bidangStudiRelatedByBidangStudiId The bidangStudiRelatedByBidangStudiId object to add.
     */
    protected function doAddBidangStudiRelatedByBidangStudiId($bidangStudiRelatedByBidangStudiId)
    {
        $this->collBidangStudisRelatedByBidangStudiId[]= $bidangStudiRelatedByBidangStudiId;
        $bidangStudiRelatedByBidangStudiId->setBidangStudiRelatedByKelompokBidangStudiId($this);
    }

    /**
     * @param	BidangStudiRelatedByBidangStudiId $bidangStudiRelatedByBidangStudiId The bidangStudiRelatedByBidangStudiId object to remove.
     * @return BidangStudi The current object (for fluent API support)
     */
    public function removeBidangStudiRelatedByBidangStudiId($bidangStudiRelatedByBidangStudiId)
    {
        if ($this->getBidangStudisRelatedByBidangStudiId()->contains($bidangStudiRelatedByBidangStudiId)) {
            $this->collBidangStudisRelatedByBidangStudiId->remove($this->collBidangStudisRelatedByBidangStudiId->search($bidangStudiRelatedByBidangStudiId));
            if (null === $this->bidangStudisRelatedByBidangStudiIdScheduledForDeletion) {
                $this->bidangStudisRelatedByBidangStudiIdScheduledForDeletion = clone $this->collBidangStudisRelatedByBidangStudiId;
                $this->bidangStudisRelatedByBidangStudiIdScheduledForDeletion->clear();
            }
            $this->bidangStudisRelatedByBidangStudiIdScheduledForDeletion[]= $bidangStudiRelatedByBidangStudiId;
            $bidangStudiRelatedByBidangStudiId->setBidangStudiRelatedByKelompokBidangStudiId(null);
        }

        return $this;
    }

    /**
     * Clears out the collMapBidangMataPelajarans collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return BidangStudi The current object (for fluent API support)
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
     * If this BidangStudi is new, it will return
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
                    ->filterByBidangStudi($this)
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
     * @return BidangStudi The current object (for fluent API support)
     */
    public function setMapBidangMataPelajarans(PropelCollection $mapBidangMataPelajarans, PropelPDO $con = null)
    {
        $mapBidangMataPelajaransToDelete = $this->getMapBidangMataPelajarans(new Criteria(), $con)->diff($mapBidangMataPelajarans);

        $this->mapBidangMataPelajaransScheduledForDeletion = unserialize(serialize($mapBidangMataPelajaransToDelete));

        foreach ($mapBidangMataPelajaransToDelete as $mapBidangMataPelajaranRemoved) {
            $mapBidangMataPelajaranRemoved->setBidangStudi(null);
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
                ->filterByBidangStudi($this)
                ->count($con);
        }

        return count($this->collMapBidangMataPelajarans);
    }

    /**
     * Method called to associate a MapBidangMataPelajaran object to this object
     * through the MapBidangMataPelajaran foreign key attribute.
     *
     * @param    MapBidangMataPelajaran $l MapBidangMataPelajaran
     * @return BidangStudi The current object (for fluent API support)
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
        $mapBidangMataPelajaran->setBidangStudi($this);
    }

    /**
     * @param	MapBidangMataPelajaran $mapBidangMataPelajaran The mapBidangMataPelajaran object to remove.
     * @return BidangStudi The current object (for fluent API support)
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
            $mapBidangMataPelajaran->setBidangStudi(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this BidangStudi is new, it will return
     * an empty collection; or if this BidangStudi has previously
     * been saved, it will retrieve related MapBidangMataPelajarans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in BidangStudi.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|MapBidangMataPelajaran[] List of MapBidangMataPelajaran objects
     */
    public function getMapBidangMataPelajaransJoinMataPelajaran($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = MapBidangMataPelajaranQuery::create(null, $criteria);
        $query->joinWith('MataPelajaran', $join_behavior);

        return $this->getMapBidangMataPelajarans($query, $con);
    }

    /**
     * Clears out the collPengawasTerdaftars collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return BidangStudi The current object (for fluent API support)
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
     * If this BidangStudi is new, it will return
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
                    ->filterByBidangStudi($this)
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
     * @return BidangStudi The current object (for fluent API support)
     */
    public function setPengawasTerdaftars(PropelCollection $pengawasTerdaftars, PropelPDO $con = null)
    {
        $pengawasTerdaftarsToDelete = $this->getPengawasTerdaftars(new Criteria(), $con)->diff($pengawasTerdaftars);

        $this->pengawasTerdaftarsScheduledForDeletion = unserialize(serialize($pengawasTerdaftarsToDelete));

        foreach ($pengawasTerdaftarsToDelete as $pengawasTerdaftarRemoved) {
            $pengawasTerdaftarRemoved->setBidangStudi(null);
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
                ->filterByBidangStudi($this)
                ->count($con);
        }

        return count($this->collPengawasTerdaftars);
    }

    /**
     * Method called to associate a PengawasTerdaftar object to this object
     * through the PengawasTerdaftar foreign key attribute.
     *
     * @param    PengawasTerdaftar $l PengawasTerdaftar
     * @return BidangStudi The current object (for fluent API support)
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
        $pengawasTerdaftar->setBidangStudi($this);
    }

    /**
     * @param	PengawasTerdaftar $pengawasTerdaftar The pengawasTerdaftar object to remove.
     * @return BidangStudi The current object (for fluent API support)
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
            $pengawasTerdaftar->setBidangStudi(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this BidangStudi is new, it will return
     * an empty collection; or if this BidangStudi has previously
     * been saved, it will retrieve related PengawasTerdaftars from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in BidangStudi.
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
     * Otherwise if this BidangStudi is new, it will return
     * an empty collection; or if this BidangStudi has previously
     * been saved, it will retrieve related PengawasTerdaftars from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in BidangStudi.
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
     * Otherwise if this BidangStudi is new, it will return
     * an empty collection; or if this BidangStudi has previously
     * been saved, it will retrieve related PengawasTerdaftars from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in BidangStudi.
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
     * Otherwise if this BidangStudi is new, it will return
     * an empty collection; or if this BidangStudi has previously
     * been saved, it will retrieve related PengawasTerdaftars from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in BidangStudi.
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
     * Otherwise if this BidangStudi is new, it will return
     * an empty collection; or if this BidangStudi has previously
     * been saved, it will retrieve related PengawasTerdaftars from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in BidangStudi.
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
     * Otherwise if this BidangStudi is new, it will return
     * an empty collection; or if this BidangStudi has previously
     * been saved, it will retrieve related PengawasTerdaftars from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in BidangStudi.
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
     * Clears out the collPtks collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return BidangStudi The current object (for fluent API support)
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
     * If this BidangStudi is new, it will return
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
                    ->filterByBidangStudi($this)
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
     * @return BidangStudi The current object (for fluent API support)
     */
    public function setPtks(PropelCollection $ptks, PropelPDO $con = null)
    {
        $ptksToDelete = $this->getPtks(new Criteria(), $con)->diff($ptks);

        $this->ptksScheduledForDeletion = unserialize(serialize($ptksToDelete));

        foreach ($ptksToDelete as $ptkRemoved) {
            $ptkRemoved->setBidangStudi(null);
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
                ->filterByBidangStudi($this)
                ->count($con);
        }

        return count($this->collPtks);
    }

    /**
     * Method called to associate a Ptk object to this object
     * through the Ptk foreign key attribute.
     *
     * @param    Ptk $l Ptk
     * @return BidangStudi The current object (for fluent API support)
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
        $ptk->setBidangStudi($this);
    }

    /**
     * @param	Ptk $ptk The ptk object to remove.
     * @return BidangStudi The current object (for fluent API support)
     */
    public function removePtk($ptk)
    {
        if ($this->getPtks()->contains($ptk)) {
            $this->collPtks->remove($this->collPtks->search($ptk));
            if (null === $this->ptksScheduledForDeletion) {
                $this->ptksScheduledForDeletion = clone $this->collPtks;
                $this->ptksScheduledForDeletion->clear();
            }
            $this->ptksScheduledForDeletion[]= $ptk;
            $ptk->setBidangStudi(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this BidangStudi is new, it will return
     * an empty collection; or if this BidangStudi has previously
     * been saved, it will retrieve related Ptks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in BidangStudi.
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
     * Otherwise if this BidangStudi is new, it will return
     * an empty collection; or if this BidangStudi has previously
     * been saved, it will retrieve related Ptks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in BidangStudi.
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
     * Otherwise if this BidangStudi is new, it will return
     * an empty collection; or if this BidangStudi has previously
     * been saved, it will retrieve related Ptks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in BidangStudi.
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
     * Otherwise if this BidangStudi is new, it will return
     * an empty collection; or if this BidangStudi has previously
     * been saved, it will retrieve related Ptks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in BidangStudi.
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
     * Otherwise if this BidangStudi is new, it will return
     * an empty collection; or if this BidangStudi has previously
     * been saved, it will retrieve related Ptks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in BidangStudi.
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
     * Otherwise if this BidangStudi is new, it will return
     * an empty collection; or if this BidangStudi has previously
     * been saved, it will retrieve related Ptks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in BidangStudi.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Ptk[] List of Ptk objects
     */
    public function getPtksJoinKebutuhanKhusus($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PtkQuery::create(null, $criteria);
        $query->joinWith('KebutuhanKhusus', $join_behavior);

        return $this->getPtks($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this BidangStudi is new, it will return
     * an empty collection; or if this BidangStudi has previously
     * been saved, it will retrieve related Ptks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in BidangStudi.
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
     * Otherwise if this BidangStudi is new, it will return
     * an empty collection; or if this BidangStudi has previously
     * been saved, it will retrieve related Ptks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in BidangStudi.
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
     * Otherwise if this BidangStudi is new, it will return
     * an empty collection; or if this BidangStudi has previously
     * been saved, it will retrieve related Ptks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in BidangStudi.
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
     * Otherwise if this BidangStudi is new, it will return
     * an empty collection; or if this BidangStudi has previously
     * been saved, it will retrieve related Ptks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in BidangStudi.
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
     * Otherwise if this BidangStudi is new, it will return
     * an empty collection; or if this BidangStudi has previously
     * been saved, it will retrieve related Ptks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in BidangStudi.
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
     * Otherwise if this BidangStudi is new, it will return
     * an empty collection; or if this BidangStudi has previously
     * been saved, it will retrieve related Ptks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in BidangStudi.
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
     * Otherwise if this BidangStudi is new, it will return
     * an empty collection; or if this BidangStudi has previously
     * been saved, it will retrieve related Ptks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in BidangStudi.
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
     * Otherwise if this BidangStudi is new, it will return
     * an empty collection; or if this BidangStudi has previously
     * been saved, it will retrieve related Ptks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in BidangStudi.
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
     * Clears out the collRwyPendFormals collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return BidangStudi The current object (for fluent API support)
     * @see        addRwyPendFormals()
     */
    public function clearRwyPendFormals()
    {
        $this->collRwyPendFormals = null; // important to set this to null since that means it is uninitialized
        $this->collRwyPendFormalsPartial = null;

        return $this;
    }

    /**
     * reset is the collRwyPendFormals collection loaded partially
     *
     * @return void
     */
    public function resetPartialRwyPendFormals($v = true)
    {
        $this->collRwyPendFormalsPartial = $v;
    }

    /**
     * Initializes the collRwyPendFormals collection.
     *
     * By default this just sets the collRwyPendFormals collection to an empty array (like clearcollRwyPendFormals());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initRwyPendFormals($overrideExisting = true)
    {
        if (null !== $this->collRwyPendFormals && !$overrideExisting) {
            return;
        }
        $this->collRwyPendFormals = new PropelObjectCollection();
        $this->collRwyPendFormals->setModel('RwyPendFormal');
    }

    /**
     * Gets an array of RwyPendFormal objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this BidangStudi is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|RwyPendFormal[] List of RwyPendFormal objects
     * @throws PropelException
     */
    public function getRwyPendFormals($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collRwyPendFormalsPartial && !$this->isNew();
        if (null === $this->collRwyPendFormals || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collRwyPendFormals) {
                // return empty collection
                $this->initRwyPendFormals();
            } else {
                $collRwyPendFormals = RwyPendFormalQuery::create(null, $criteria)
                    ->filterByBidangStudi($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collRwyPendFormalsPartial && count($collRwyPendFormals)) {
                      $this->initRwyPendFormals(false);

                      foreach($collRwyPendFormals as $obj) {
                        if (false == $this->collRwyPendFormals->contains($obj)) {
                          $this->collRwyPendFormals->append($obj);
                        }
                      }

                      $this->collRwyPendFormalsPartial = true;
                    }

                    $collRwyPendFormals->getInternalIterator()->rewind();
                    return $collRwyPendFormals;
                }

                if($partial && $this->collRwyPendFormals) {
                    foreach($this->collRwyPendFormals as $obj) {
                        if($obj->isNew()) {
                            $collRwyPendFormals[] = $obj;
                        }
                    }
                }

                $this->collRwyPendFormals = $collRwyPendFormals;
                $this->collRwyPendFormalsPartial = false;
            }
        }

        return $this->collRwyPendFormals;
    }

    /**
     * Sets a collection of RwyPendFormal objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $rwyPendFormals A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return BidangStudi The current object (for fluent API support)
     */
    public function setRwyPendFormals(PropelCollection $rwyPendFormals, PropelPDO $con = null)
    {
        $rwyPendFormalsToDelete = $this->getRwyPendFormals(new Criteria(), $con)->diff($rwyPendFormals);

        $this->rwyPendFormalsScheduledForDeletion = unserialize(serialize($rwyPendFormalsToDelete));

        foreach ($rwyPendFormalsToDelete as $rwyPendFormalRemoved) {
            $rwyPendFormalRemoved->setBidangStudi(null);
        }

        $this->collRwyPendFormals = null;
        foreach ($rwyPendFormals as $rwyPendFormal) {
            $this->addRwyPendFormal($rwyPendFormal);
        }

        $this->collRwyPendFormals = $rwyPendFormals;
        $this->collRwyPendFormalsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related RwyPendFormal objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related RwyPendFormal objects.
     * @throws PropelException
     */
    public function countRwyPendFormals(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collRwyPendFormalsPartial && !$this->isNew();
        if (null === $this->collRwyPendFormals || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collRwyPendFormals) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getRwyPendFormals());
            }
            $query = RwyPendFormalQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByBidangStudi($this)
                ->count($con);
        }

        return count($this->collRwyPendFormals);
    }

    /**
     * Method called to associate a RwyPendFormal object to this object
     * through the RwyPendFormal foreign key attribute.
     *
     * @param    RwyPendFormal $l RwyPendFormal
     * @return BidangStudi The current object (for fluent API support)
     */
    public function addRwyPendFormal(RwyPendFormal $l)
    {
        if ($this->collRwyPendFormals === null) {
            $this->initRwyPendFormals();
            $this->collRwyPendFormalsPartial = true;
        }
        if (!in_array($l, $this->collRwyPendFormals->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddRwyPendFormal($l);
        }

        return $this;
    }

    /**
     * @param	RwyPendFormal $rwyPendFormal The rwyPendFormal object to add.
     */
    protected function doAddRwyPendFormal($rwyPendFormal)
    {
        $this->collRwyPendFormals[]= $rwyPendFormal;
        $rwyPendFormal->setBidangStudi($this);
    }

    /**
     * @param	RwyPendFormal $rwyPendFormal The rwyPendFormal object to remove.
     * @return BidangStudi The current object (for fluent API support)
     */
    public function removeRwyPendFormal($rwyPendFormal)
    {
        if ($this->getRwyPendFormals()->contains($rwyPendFormal)) {
            $this->collRwyPendFormals->remove($this->collRwyPendFormals->search($rwyPendFormal));
            if (null === $this->rwyPendFormalsScheduledForDeletion) {
                $this->rwyPendFormalsScheduledForDeletion = clone $this->collRwyPendFormals;
                $this->rwyPendFormalsScheduledForDeletion->clear();
            }
            $this->rwyPendFormalsScheduledForDeletion[]= clone $rwyPendFormal;
            $rwyPendFormal->setBidangStudi(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this BidangStudi is new, it will return
     * an empty collection; or if this BidangStudi has previously
     * been saved, it will retrieve related RwyPendFormals from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in BidangStudi.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|RwyPendFormal[] List of RwyPendFormal objects
     */
    public function getRwyPendFormalsJoinGelarAkademik($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = RwyPendFormalQuery::create(null, $criteria);
        $query->joinWith('GelarAkademik', $join_behavior);

        return $this->getRwyPendFormals($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this BidangStudi is new, it will return
     * an empty collection; or if this BidangStudi has previously
     * been saved, it will retrieve related RwyPendFormals from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in BidangStudi.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|RwyPendFormal[] List of RwyPendFormal objects
     */
    public function getRwyPendFormalsJoinPtk($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = RwyPendFormalQuery::create(null, $criteria);
        $query->joinWith('Ptk', $join_behavior);

        return $this->getRwyPendFormals($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this BidangStudi is new, it will return
     * an empty collection; or if this BidangStudi has previously
     * been saved, it will retrieve related RwyPendFormals from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in BidangStudi.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|RwyPendFormal[] List of RwyPendFormal objects
     */
    public function getRwyPendFormalsJoinJenjangPendidikan($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = RwyPendFormalQuery::create(null, $criteria);
        $query->joinWith('JenjangPendidikan', $join_behavior);

        return $this->getRwyPendFormals($query, $con);
    }

    /**
     * Clears out the collRwySertifikasis collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return BidangStudi The current object (for fluent API support)
     * @see        addRwySertifikasis()
     */
    public function clearRwySertifikasis()
    {
        $this->collRwySertifikasis = null; // important to set this to null since that means it is uninitialized
        $this->collRwySertifikasisPartial = null;

        return $this;
    }

    /**
     * reset is the collRwySertifikasis collection loaded partially
     *
     * @return void
     */
    public function resetPartialRwySertifikasis($v = true)
    {
        $this->collRwySertifikasisPartial = $v;
    }

    /**
     * Initializes the collRwySertifikasis collection.
     *
     * By default this just sets the collRwySertifikasis collection to an empty array (like clearcollRwySertifikasis());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initRwySertifikasis($overrideExisting = true)
    {
        if (null !== $this->collRwySertifikasis && !$overrideExisting) {
            return;
        }
        $this->collRwySertifikasis = new PropelObjectCollection();
        $this->collRwySertifikasis->setModel('RwySertifikasi');
    }

    /**
     * Gets an array of RwySertifikasi objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this BidangStudi is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|RwySertifikasi[] List of RwySertifikasi objects
     * @throws PropelException
     */
    public function getRwySertifikasis($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collRwySertifikasisPartial && !$this->isNew();
        if (null === $this->collRwySertifikasis || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collRwySertifikasis) {
                // return empty collection
                $this->initRwySertifikasis();
            } else {
                $collRwySertifikasis = RwySertifikasiQuery::create(null, $criteria)
                    ->filterByBidangStudi($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collRwySertifikasisPartial && count($collRwySertifikasis)) {
                      $this->initRwySertifikasis(false);

                      foreach($collRwySertifikasis as $obj) {
                        if (false == $this->collRwySertifikasis->contains($obj)) {
                          $this->collRwySertifikasis->append($obj);
                        }
                      }

                      $this->collRwySertifikasisPartial = true;
                    }

                    $collRwySertifikasis->getInternalIterator()->rewind();
                    return $collRwySertifikasis;
                }

                if($partial && $this->collRwySertifikasis) {
                    foreach($this->collRwySertifikasis as $obj) {
                        if($obj->isNew()) {
                            $collRwySertifikasis[] = $obj;
                        }
                    }
                }

                $this->collRwySertifikasis = $collRwySertifikasis;
                $this->collRwySertifikasisPartial = false;
            }
        }

        return $this->collRwySertifikasis;
    }

    /**
     * Sets a collection of RwySertifikasi objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $rwySertifikasis A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return BidangStudi The current object (for fluent API support)
     */
    public function setRwySertifikasis(PropelCollection $rwySertifikasis, PropelPDO $con = null)
    {
        $rwySertifikasisToDelete = $this->getRwySertifikasis(new Criteria(), $con)->diff($rwySertifikasis);

        $this->rwySertifikasisScheduledForDeletion = unserialize(serialize($rwySertifikasisToDelete));

        foreach ($rwySertifikasisToDelete as $rwySertifikasiRemoved) {
            $rwySertifikasiRemoved->setBidangStudi(null);
        }

        $this->collRwySertifikasis = null;
        foreach ($rwySertifikasis as $rwySertifikasi) {
            $this->addRwySertifikasi($rwySertifikasi);
        }

        $this->collRwySertifikasis = $rwySertifikasis;
        $this->collRwySertifikasisPartial = false;

        return $this;
    }

    /**
     * Returns the number of related RwySertifikasi objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related RwySertifikasi objects.
     * @throws PropelException
     */
    public function countRwySertifikasis(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collRwySertifikasisPartial && !$this->isNew();
        if (null === $this->collRwySertifikasis || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collRwySertifikasis) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getRwySertifikasis());
            }
            $query = RwySertifikasiQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByBidangStudi($this)
                ->count($con);
        }

        return count($this->collRwySertifikasis);
    }

    /**
     * Method called to associate a RwySertifikasi object to this object
     * through the RwySertifikasi foreign key attribute.
     *
     * @param    RwySertifikasi $l RwySertifikasi
     * @return BidangStudi The current object (for fluent API support)
     */
    public function addRwySertifikasi(RwySertifikasi $l)
    {
        if ($this->collRwySertifikasis === null) {
            $this->initRwySertifikasis();
            $this->collRwySertifikasisPartial = true;
        }
        if (!in_array($l, $this->collRwySertifikasis->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddRwySertifikasi($l);
        }

        return $this;
    }

    /**
     * @param	RwySertifikasi $rwySertifikasi The rwySertifikasi object to add.
     */
    protected function doAddRwySertifikasi($rwySertifikasi)
    {
        $this->collRwySertifikasis[]= $rwySertifikasi;
        $rwySertifikasi->setBidangStudi($this);
    }

    /**
     * @param	RwySertifikasi $rwySertifikasi The rwySertifikasi object to remove.
     * @return BidangStudi The current object (for fluent API support)
     */
    public function removeRwySertifikasi($rwySertifikasi)
    {
        if ($this->getRwySertifikasis()->contains($rwySertifikasi)) {
            $this->collRwySertifikasis->remove($this->collRwySertifikasis->search($rwySertifikasi));
            if (null === $this->rwySertifikasisScheduledForDeletion) {
                $this->rwySertifikasisScheduledForDeletion = clone $this->collRwySertifikasis;
                $this->rwySertifikasisScheduledForDeletion->clear();
            }
            $this->rwySertifikasisScheduledForDeletion[]= clone $rwySertifikasi;
            $rwySertifikasi->setBidangStudi(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this BidangStudi is new, it will return
     * an empty collection; or if this BidangStudi has previously
     * been saved, it will retrieve related RwySertifikasis from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in BidangStudi.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|RwySertifikasi[] List of RwySertifikasi objects
     */
    public function getRwySertifikasisJoinJenisSertifikasi($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = RwySertifikasiQuery::create(null, $criteria);
        $query->joinWith('JenisSertifikasi', $join_behavior);

        return $this->getRwySertifikasis($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this BidangStudi is new, it will return
     * an empty collection; or if this BidangStudi has previously
     * been saved, it will retrieve related RwySertifikasis from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in BidangStudi.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|RwySertifikasi[] List of RwySertifikasi objects
     */
    public function getRwySertifikasisJoinPtk($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = RwySertifikasiQuery::create(null, $criteria);
        $query->joinWith('Ptk', $join_behavior);

        return $this->getRwySertifikasis($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this BidangStudi is new, it will return
     * an empty collection; or if this BidangStudi has previously
     * been saved, it will retrieve related RwySertifikasis from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in BidangStudi.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|RwySertifikasi[] List of RwySertifikasi objects
     */
    public function getRwySertifikasisJoinLembSertifikasi($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = RwySertifikasiQuery::create(null, $criteria);
        $query->joinWith('LembSertifikasi', $join_behavior);

        return $this->getRwySertifikasis($query, $con);
    }

    /**
     * Clears out the collSertifikasiPds collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return BidangStudi The current object (for fluent API support)
     * @see        addSertifikasiPds()
     */
    public function clearSertifikasiPds()
    {
        $this->collSertifikasiPds = null; // important to set this to null since that means it is uninitialized
        $this->collSertifikasiPdsPartial = null;

        return $this;
    }

    /**
     * reset is the collSertifikasiPds collection loaded partially
     *
     * @return void
     */
    public function resetPartialSertifikasiPds($v = true)
    {
        $this->collSertifikasiPdsPartial = $v;
    }

    /**
     * Initializes the collSertifikasiPds collection.
     *
     * By default this just sets the collSertifikasiPds collection to an empty array (like clearcollSertifikasiPds());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initSertifikasiPds($overrideExisting = true)
    {
        if (null !== $this->collSertifikasiPds && !$overrideExisting) {
            return;
        }
        $this->collSertifikasiPds = new PropelObjectCollection();
        $this->collSertifikasiPds->setModel('SertifikasiPd');
    }

    /**
     * Gets an array of SertifikasiPd objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this BidangStudi is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|SertifikasiPd[] List of SertifikasiPd objects
     * @throws PropelException
     */
    public function getSertifikasiPds($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collSertifikasiPdsPartial && !$this->isNew();
        if (null === $this->collSertifikasiPds || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collSertifikasiPds) {
                // return empty collection
                $this->initSertifikasiPds();
            } else {
                $collSertifikasiPds = SertifikasiPdQuery::create(null, $criteria)
                    ->filterByBidangStudi($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collSertifikasiPdsPartial && count($collSertifikasiPds)) {
                      $this->initSertifikasiPds(false);

                      foreach($collSertifikasiPds as $obj) {
                        if (false == $this->collSertifikasiPds->contains($obj)) {
                          $this->collSertifikasiPds->append($obj);
                        }
                      }

                      $this->collSertifikasiPdsPartial = true;
                    }

                    $collSertifikasiPds->getInternalIterator()->rewind();
                    return $collSertifikasiPds;
                }

                if($partial && $this->collSertifikasiPds) {
                    foreach($this->collSertifikasiPds as $obj) {
                        if($obj->isNew()) {
                            $collSertifikasiPds[] = $obj;
                        }
                    }
                }

                $this->collSertifikasiPds = $collSertifikasiPds;
                $this->collSertifikasiPdsPartial = false;
            }
        }

        return $this->collSertifikasiPds;
    }

    /**
     * Sets a collection of SertifikasiPd objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $sertifikasiPds A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return BidangStudi The current object (for fluent API support)
     */
    public function setSertifikasiPds(PropelCollection $sertifikasiPds, PropelPDO $con = null)
    {
        $sertifikasiPdsToDelete = $this->getSertifikasiPds(new Criteria(), $con)->diff($sertifikasiPds);

        $this->sertifikasiPdsScheduledForDeletion = unserialize(serialize($sertifikasiPdsToDelete));

        foreach ($sertifikasiPdsToDelete as $sertifikasiPdRemoved) {
            $sertifikasiPdRemoved->setBidangStudi(null);
        }

        $this->collSertifikasiPds = null;
        foreach ($sertifikasiPds as $sertifikasiPd) {
            $this->addSertifikasiPd($sertifikasiPd);
        }

        $this->collSertifikasiPds = $sertifikasiPds;
        $this->collSertifikasiPdsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related SertifikasiPd objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related SertifikasiPd objects.
     * @throws PropelException
     */
    public function countSertifikasiPds(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collSertifikasiPdsPartial && !$this->isNew();
        if (null === $this->collSertifikasiPds || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collSertifikasiPds) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getSertifikasiPds());
            }
            $query = SertifikasiPdQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByBidangStudi($this)
                ->count($con);
        }

        return count($this->collSertifikasiPds);
    }

    /**
     * Method called to associate a SertifikasiPd object to this object
     * through the SertifikasiPd foreign key attribute.
     *
     * @param    SertifikasiPd $l SertifikasiPd
     * @return BidangStudi The current object (for fluent API support)
     */
    public function addSertifikasiPd(SertifikasiPd $l)
    {
        if ($this->collSertifikasiPds === null) {
            $this->initSertifikasiPds();
            $this->collSertifikasiPdsPartial = true;
        }
        if (!in_array($l, $this->collSertifikasiPds->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddSertifikasiPd($l);
        }

        return $this;
    }

    /**
     * @param	SertifikasiPd $sertifikasiPd The sertifikasiPd object to add.
     */
    protected function doAddSertifikasiPd($sertifikasiPd)
    {
        $this->collSertifikasiPds[]= $sertifikasiPd;
        $sertifikasiPd->setBidangStudi($this);
    }

    /**
     * @param	SertifikasiPd $sertifikasiPd The sertifikasiPd object to remove.
     * @return BidangStudi The current object (for fluent API support)
     */
    public function removeSertifikasiPd($sertifikasiPd)
    {
        if ($this->getSertifikasiPds()->contains($sertifikasiPd)) {
            $this->collSertifikasiPds->remove($this->collSertifikasiPds->search($sertifikasiPd));
            if (null === $this->sertifikasiPdsScheduledForDeletion) {
                $this->sertifikasiPdsScheduledForDeletion = clone $this->collSertifikasiPds;
                $this->sertifikasiPdsScheduledForDeletion->clear();
            }
            $this->sertifikasiPdsScheduledForDeletion[]= clone $sertifikasiPd;
            $sertifikasiPd->setBidangStudi(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this BidangStudi is new, it will return
     * an empty collection; or if this BidangStudi has previously
     * been saved, it will retrieve related SertifikasiPds from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in BidangStudi.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|SertifikasiPd[] List of SertifikasiPd objects
     */
    public function getSertifikasiPdsJoinJenisSertifikasi($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = SertifikasiPdQuery::create(null, $criteria);
        $query->joinWith('JenisSertifikasi', $join_behavior);

        return $this->getSertifikasiPds($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this BidangStudi is new, it will return
     * an empty collection; or if this BidangStudi has previously
     * been saved, it will retrieve related SertifikasiPds from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in BidangStudi.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|SertifikasiPd[] List of SertifikasiPd objects
     */
    public function getSertifikasiPdsJoinLembSertifikasi($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = SertifikasiPdQuery::create(null, $criteria);
        $query->joinWith('LembSertifikasi', $join_behavior);

        return $this->getSertifikasiPds($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this BidangStudi is new, it will return
     * an empty collection; or if this BidangStudi has previously
     * been saved, it will retrieve related SertifikasiPds from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in BidangStudi.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|SertifikasiPd[] List of SertifikasiPd objects
     */
    public function getSertifikasiPdsJoinPesertaDidik($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = SertifikasiPdQuery::create(null, $criteria);
        $query->joinWith('PesertaDidik', $join_behavior);

        return $this->getSertifikasiPds($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->bidang_studi_id = null;
        $this->kelompok_bidang_studi_id = null;
        $this->kode = null;
        $this->bidang_studi = null;
        $this->kelompok = null;
        $this->jenjang_paud = null;
        $this->jenjang_tk = null;
        $this->jenjang_sd = null;
        $this->jenjang_smp = null;
        $this->jenjang_sma = null;
        $this->jenjang_tinggi = null;
        $this->a_sert_komp = null;
        $this->a_sert_profesi = null;
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
            if ($this->collBidangSdms) {
                foreach ($this->collBidangSdms as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collBidangStudisRelatedByBidangStudiId) {
                foreach ($this->collBidangStudisRelatedByBidangStudiId as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collMapBidangMataPelajarans) {
                foreach ($this->collMapBidangMataPelajarans as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collPengawasTerdaftars) {
                foreach ($this->collPengawasTerdaftars as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collPtks) {
                foreach ($this->collPtks as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collRwyPendFormals) {
                foreach ($this->collRwyPendFormals as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collRwySertifikasis) {
                foreach ($this->collRwySertifikasis as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collSertifikasiPds) {
                foreach ($this->collSertifikasiPds as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aBidangStudiRelatedByKelompokBidangStudiId instanceof Persistent) {
              $this->aBidangStudiRelatedByKelompokBidangStudiId->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collBidangSdms instanceof PropelCollection) {
            $this->collBidangSdms->clearIterator();
        }
        $this->collBidangSdms = null;
        if ($this->collBidangStudisRelatedByBidangStudiId instanceof PropelCollection) {
            $this->collBidangStudisRelatedByBidangStudiId->clearIterator();
        }
        $this->collBidangStudisRelatedByBidangStudiId = null;
        if ($this->collMapBidangMataPelajarans instanceof PropelCollection) {
            $this->collMapBidangMataPelajarans->clearIterator();
        }
        $this->collMapBidangMataPelajarans = null;
        if ($this->collPengawasTerdaftars instanceof PropelCollection) {
            $this->collPengawasTerdaftars->clearIterator();
        }
        $this->collPengawasTerdaftars = null;
        if ($this->collPtks instanceof PropelCollection) {
            $this->collPtks->clearIterator();
        }
        $this->collPtks = null;
        if ($this->collRwyPendFormals instanceof PropelCollection) {
            $this->collRwyPendFormals->clearIterator();
        }
        $this->collRwyPendFormals = null;
        if ($this->collRwySertifikasis instanceof PropelCollection) {
            $this->collRwySertifikasis->clearIterator();
        }
        $this->collRwySertifikasis = null;
        if ($this->collSertifikasiPds instanceof PropelCollection) {
            $this->collSertifikasiPds->clearIterator();
        }
        $this->collSertifikasiPds = null;
        $this->aBidangStudiRelatedByKelompokBidangStudiId = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(BidangStudiPeer::DEFAULT_STRING_FORMAT);
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
