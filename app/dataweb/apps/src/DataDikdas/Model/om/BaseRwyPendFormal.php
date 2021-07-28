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
use DataDikdas\Model\BidangStudi;
use DataDikdas\Model\BidangStudiQuery;
use DataDikdas\Model\GelarAkademik;
use DataDikdas\Model\GelarAkademikQuery;
use DataDikdas\Model\JenjangPendidikan;
use DataDikdas\Model\JenjangPendidikanQuery;
use DataDikdas\Model\Ptk;
use DataDikdas\Model\PtkQuery;
use DataDikdas\Model\RwyPendFormal;
use DataDikdas\Model\RwyPendFormalPeer;
use DataDikdas\Model\RwyPendFormalQuery;
use DataDikdas\Model\VldRwyPendFormal;
use DataDikdas\Model\VldRwyPendFormalQuery;

/**
 * Base class that represents a row from the 'rwy_pend_formal' table.
 *
 * 
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseRwyPendFormal extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'DataDikdas\\Model\\RwyPendFormalPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        RwyPendFormalPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the riwayat_pendidikan_formal_id field.
     * @var        string
     */
    protected $riwayat_pendidikan_formal_id;

    /**
     * The value for the bidang_studi_id field.
     * @var        int
     */
    protected $bidang_studi_id;

    /**
     * The value for the jenjang_pendidikan_id field.
     * @var        string
     */
    protected $jenjang_pendidikan_id;

    /**
     * The value for the gelar_akademik_id field.
     * @var        int
     */
    protected $gelar_akademik_id;

    /**
     * The value for the ptk_id field.
     * @var        string
     */
    protected $ptk_id;

    /**
     * The value for the satuan_pendidikan_formal field.
     * @var        string
     */
    protected $satuan_pendidikan_formal;

    /**
     * The value for the fakultas field.
     * @var        string
     */
    protected $fakultas;

    /**
     * The value for the kependidikan field.
     * @var        string
     */
    protected $kependidikan;

    /**
     * The value for the tahun_masuk field.
     * @var        string
     */
    protected $tahun_masuk;

    /**
     * The value for the tahun_lulus field.
     * @var        string
     */
    protected $tahun_lulus;

    /**
     * The value for the nim field.
     * @var        string
     */
    protected $nim;

    /**
     * The value for the status_kuliah field.
     * @var        string
     */
    protected $status_kuliah;

    /**
     * The value for the semester field.
     * @var        string
     */
    protected $semester;

    /**
     * The value for the ipk field.
     * @var        string
     */
    protected $ipk;

    /**
     * The value for the prodi field.
     * @var        string
     */
    protected $prodi;

    /**
     * The value for the id_reg_pd field.
     * @var        string
     */
    protected $id_reg_pd;

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
     * @var        GelarAkademik
     */
    protected $aGelarAkademik;

    /**
     * @var        Ptk
     */
    protected $aPtk;

    /**
     * @var        BidangStudi
     */
    protected $aBidangStudi;

    /**
     * @var        JenjangPendidikan
     */
    protected $aJenjangPendidikan;

    /**
     * @var        PropelObjectCollection|VldRwyPendFormal[] Collection to store aggregation of VldRwyPendFormal objects.
     */
    protected $collVldRwyPendFormals;
    protected $collVldRwyPendFormalsPartial;

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
    protected $vldRwyPendFormalsScheduledForDeletion = null;

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
     * Initializes internal state of BaseRwyPendFormal object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [riwayat_pendidikan_formal_id] column value.
     * 
     * @return string
     */
    public function getRiwayatPendidikanFormalId()
    {
        return $this->riwayat_pendidikan_formal_id;
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
     * Get the [jenjang_pendidikan_id] column value.
     * 
     * @return string
     */
    public function getJenjangPendidikanId()
    {
        return $this->jenjang_pendidikan_id;
    }

    /**
     * Get the [gelar_akademik_id] column value.
     * 
     * @return int
     */
    public function getGelarAkademikId()
    {
        return $this->gelar_akademik_id;
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
     * Get the [satuan_pendidikan_formal] column value.
     * 
     * @return string
     */
    public function getSatuanPendidikanFormal()
    {
        return $this->satuan_pendidikan_formal;
    }

    /**
     * Get the [fakultas] column value.
     * 
     * @return string
     */
    public function getFakultas()
    {
        return $this->fakultas;
    }

    /**
     * Get the [kependidikan] column value.
     * 
     * @return string
     */
    public function getKependidikan()
    {
        return $this->kependidikan;
    }

    /**
     * Get the [tahun_masuk] column value.
     * 
     * @return string
     */
    public function getTahunMasuk()
    {
        return $this->tahun_masuk;
    }

    /**
     * Get the [tahun_lulus] column value.
     * 
     * @return string
     */
    public function getTahunLulus()
    {
        return $this->tahun_lulus;
    }

    /**
     * Get the [nim] column value.
     * 
     * @return string
     */
    public function getNim()
    {
        return $this->nim;
    }

    /**
     * Get the [status_kuliah] column value.
     * 
     * @return string
     */
    public function getStatusKuliah()
    {
        return $this->status_kuliah;
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
     * Get the [ipk] column value.
     * 
     * @return string
     */
    public function getIpk()
    {
        return $this->ipk;
    }

    /**
     * Get the [prodi] column value.
     * 
     * @return string
     */
    public function getProdi()
    {
        return $this->prodi;
    }

    /**
     * Get the [id_reg_pd] column value.
     * 
     * @return string
     */
    public function getIdRegPd()
    {
        return $this->id_reg_pd;
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
     * Set the value of [riwayat_pendidikan_formal_id] column.
     * 
     * @param string $v new value
     * @return RwyPendFormal The current object (for fluent API support)
     */
    public function setRiwayatPendidikanFormalId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->riwayat_pendidikan_formal_id !== $v) {
            $this->riwayat_pendidikan_formal_id = $v;
            $this->modifiedColumns[] = RwyPendFormalPeer::RIWAYAT_PENDIDIKAN_FORMAL_ID;
        }


        return $this;
    } // setRiwayatPendidikanFormalId()

    /**
     * Set the value of [bidang_studi_id] column.
     * 
     * @param int $v new value
     * @return RwyPendFormal The current object (for fluent API support)
     */
    public function setBidangStudiId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->bidang_studi_id !== $v) {
            $this->bidang_studi_id = $v;
            $this->modifiedColumns[] = RwyPendFormalPeer::BIDANG_STUDI_ID;
        }

        if ($this->aBidangStudi !== null && $this->aBidangStudi->getBidangStudiId() !== $v) {
            $this->aBidangStudi = null;
        }


        return $this;
    } // setBidangStudiId()

    /**
     * Set the value of [jenjang_pendidikan_id] column.
     * 
     * @param string $v new value
     * @return RwyPendFormal The current object (for fluent API support)
     */
    public function setJenjangPendidikanId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->jenjang_pendidikan_id !== $v) {
            $this->jenjang_pendidikan_id = $v;
            $this->modifiedColumns[] = RwyPendFormalPeer::JENJANG_PENDIDIKAN_ID;
        }

        if ($this->aJenjangPendidikan !== null && $this->aJenjangPendidikan->getJenjangPendidikanId() !== $v) {
            $this->aJenjangPendidikan = null;
        }


        return $this;
    } // setJenjangPendidikanId()

    /**
     * Set the value of [gelar_akademik_id] column.
     * 
     * @param int $v new value
     * @return RwyPendFormal The current object (for fluent API support)
     */
    public function setGelarAkademikId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->gelar_akademik_id !== $v) {
            $this->gelar_akademik_id = $v;
            $this->modifiedColumns[] = RwyPendFormalPeer::GELAR_AKADEMIK_ID;
        }

        if ($this->aGelarAkademik !== null && $this->aGelarAkademik->getGelarAkademikId() !== $v) {
            $this->aGelarAkademik = null;
        }


        return $this;
    } // setGelarAkademikId()

    /**
     * Set the value of [ptk_id] column.
     * 
     * @param string $v new value
     * @return RwyPendFormal The current object (for fluent API support)
     */
    public function setPtkId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->ptk_id !== $v) {
            $this->ptk_id = $v;
            $this->modifiedColumns[] = RwyPendFormalPeer::PTK_ID;
        }

        if ($this->aPtk !== null && $this->aPtk->getPtkId() !== $v) {
            $this->aPtk = null;
        }


        return $this;
    } // setPtkId()

    /**
     * Set the value of [satuan_pendidikan_formal] column.
     * 
     * @param string $v new value
     * @return RwyPendFormal The current object (for fluent API support)
     */
    public function setSatuanPendidikanFormal($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->satuan_pendidikan_formal !== $v) {
            $this->satuan_pendidikan_formal = $v;
            $this->modifiedColumns[] = RwyPendFormalPeer::SATUAN_PENDIDIKAN_FORMAL;
        }


        return $this;
    } // setSatuanPendidikanFormal()

    /**
     * Set the value of [fakultas] column.
     * 
     * @param string $v new value
     * @return RwyPendFormal The current object (for fluent API support)
     */
    public function setFakultas($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->fakultas !== $v) {
            $this->fakultas = $v;
            $this->modifiedColumns[] = RwyPendFormalPeer::FAKULTAS;
        }


        return $this;
    } // setFakultas()

    /**
     * Set the value of [kependidikan] column.
     * 
     * @param string $v new value
     * @return RwyPendFormal The current object (for fluent API support)
     */
    public function setKependidikan($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->kependidikan !== $v) {
            $this->kependidikan = $v;
            $this->modifiedColumns[] = RwyPendFormalPeer::KEPENDIDIKAN;
        }


        return $this;
    } // setKependidikan()

    /**
     * Set the value of [tahun_masuk] column.
     * 
     * @param string $v new value
     * @return RwyPendFormal The current object (for fluent API support)
     */
    public function setTahunMasuk($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->tahun_masuk !== $v) {
            $this->tahun_masuk = $v;
            $this->modifiedColumns[] = RwyPendFormalPeer::TAHUN_MASUK;
        }


        return $this;
    } // setTahunMasuk()

    /**
     * Set the value of [tahun_lulus] column.
     * 
     * @param string $v new value
     * @return RwyPendFormal The current object (for fluent API support)
     */
    public function setTahunLulus($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->tahun_lulus !== $v) {
            $this->tahun_lulus = $v;
            $this->modifiedColumns[] = RwyPendFormalPeer::TAHUN_LULUS;
        }


        return $this;
    } // setTahunLulus()

    /**
     * Set the value of [nim] column.
     * 
     * @param string $v new value
     * @return RwyPendFormal The current object (for fluent API support)
     */
    public function setNim($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nim !== $v) {
            $this->nim = $v;
            $this->modifiedColumns[] = RwyPendFormalPeer::NIM;
        }


        return $this;
    } // setNim()

    /**
     * Set the value of [status_kuliah] column.
     * 
     * @param string $v new value
     * @return RwyPendFormal The current object (for fluent API support)
     */
    public function setStatusKuliah($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->status_kuliah !== $v) {
            $this->status_kuliah = $v;
            $this->modifiedColumns[] = RwyPendFormalPeer::STATUS_KULIAH;
        }


        return $this;
    } // setStatusKuliah()

    /**
     * Set the value of [semester] column.
     * 
     * @param string $v new value
     * @return RwyPendFormal The current object (for fluent API support)
     */
    public function setSemester($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->semester !== $v) {
            $this->semester = $v;
            $this->modifiedColumns[] = RwyPendFormalPeer::SEMESTER;
        }


        return $this;
    } // setSemester()

    /**
     * Set the value of [ipk] column.
     * 
     * @param string $v new value
     * @return RwyPendFormal The current object (for fluent API support)
     */
    public function setIpk($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->ipk !== $v) {
            $this->ipk = $v;
            $this->modifiedColumns[] = RwyPendFormalPeer::IPK;
        }


        return $this;
    } // setIpk()

    /**
     * Set the value of [prodi] column.
     * 
     * @param string $v new value
     * @return RwyPendFormal The current object (for fluent API support)
     */
    public function setProdi($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->prodi !== $v) {
            $this->prodi = $v;
            $this->modifiedColumns[] = RwyPendFormalPeer::PRODI;
        }


        return $this;
    } // setProdi()

    /**
     * Set the value of [id_reg_pd] column.
     * 
     * @param string $v new value
     * @return RwyPendFormal The current object (for fluent API support)
     */
    public function setIdRegPd($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->id_reg_pd !== $v) {
            $this->id_reg_pd = $v;
            $this->modifiedColumns[] = RwyPendFormalPeer::ID_REG_PD;
        }


        return $this;
    } // setIdRegPd()

    /**
     * Sets the value of [create_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return RwyPendFormal The current object (for fluent API support)
     */
    public function setCreateDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->create_date !== null || $dt !== null) {
            $currentDateAsString = ($this->create_date !== null && $tmpDt = new DateTime($this->create_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->create_date = $newDateAsString;
                $this->modifiedColumns[] = RwyPendFormalPeer::CREATE_DATE;
            }
        } // if either are not null


        return $this;
    } // setCreateDate()

    /**
     * Sets the value of [last_update] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return RwyPendFormal The current object (for fluent API support)
     */
    public function setLastUpdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->last_update !== null || $dt !== null) {
            $currentDateAsString = ($this->last_update !== null && $tmpDt = new DateTime($this->last_update)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->last_update = $newDateAsString;
                $this->modifiedColumns[] = RwyPendFormalPeer::LAST_UPDATE;
            }
        } // if either are not null


        return $this;
    } // setLastUpdate()

    /**
     * Set the value of [soft_delete] column.
     * 
     * @param string $v new value
     * @return RwyPendFormal The current object (for fluent API support)
     */
    public function setSoftDelete($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->soft_delete !== $v) {
            $this->soft_delete = $v;
            $this->modifiedColumns[] = RwyPendFormalPeer::SOFT_DELETE;
        }


        return $this;
    } // setSoftDelete()

    /**
     * Sets the value of [last_sync] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return RwyPendFormal The current object (for fluent API support)
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
                $this->modifiedColumns[] = RwyPendFormalPeer::LAST_SYNC;
            }
        } // if either are not null


        return $this;
    } // setLastSync()

    /**
     * Set the value of [updater_id] column.
     * 
     * @param string $v new value
     * @return RwyPendFormal The current object (for fluent API support)
     */
    public function setUpdaterId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->updater_id !== $v) {
            $this->updater_id = $v;
            $this->modifiedColumns[] = RwyPendFormalPeer::UPDATER_ID;
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

            $this->riwayat_pendidikan_formal_id = ($row[$startcol + 0] !== null) ? (string) $row[$startcol + 0] : null;
            $this->bidang_studi_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->jenjang_pendidikan_id = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->gelar_akademik_id = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
            $this->ptk_id = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->satuan_pendidikan_formal = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->fakultas = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->kependidikan = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->tahun_masuk = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->tahun_lulus = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
            $this->nim = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
            $this->status_kuliah = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
            $this->semester = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
            $this->ipk = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
            $this->prodi = ($row[$startcol + 14] !== null) ? (string) $row[$startcol + 14] : null;
            $this->id_reg_pd = ($row[$startcol + 15] !== null) ? (string) $row[$startcol + 15] : null;
            $this->create_date = ($row[$startcol + 16] !== null) ? (string) $row[$startcol + 16] : null;
            $this->last_update = ($row[$startcol + 17] !== null) ? (string) $row[$startcol + 17] : null;
            $this->soft_delete = ($row[$startcol + 18] !== null) ? (string) $row[$startcol + 18] : null;
            $this->last_sync = ($row[$startcol + 19] !== null) ? (string) $row[$startcol + 19] : null;
            $this->updater_id = ($row[$startcol + 20] !== null) ? (string) $row[$startcol + 20] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 21; // 21 = RwyPendFormalPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating RwyPendFormal object", $e);
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

        if ($this->aBidangStudi !== null && $this->bidang_studi_id !== $this->aBidangStudi->getBidangStudiId()) {
            $this->aBidangStudi = null;
        }
        if ($this->aJenjangPendidikan !== null && $this->jenjang_pendidikan_id !== $this->aJenjangPendidikan->getJenjangPendidikanId()) {
            $this->aJenjangPendidikan = null;
        }
        if ($this->aGelarAkademik !== null && $this->gelar_akademik_id !== $this->aGelarAkademik->getGelarAkademikId()) {
            $this->aGelarAkademik = null;
        }
        if ($this->aPtk !== null && $this->ptk_id !== $this->aPtk->getPtkId()) {
            $this->aPtk = null;
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
            $con = Propel::getConnection(RwyPendFormalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = RwyPendFormalPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aGelarAkademik = null;
            $this->aPtk = null;
            $this->aBidangStudi = null;
            $this->aJenjangPendidikan = null;
            $this->collVldRwyPendFormals = null;

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
            $con = Propel::getConnection(RwyPendFormalPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = RwyPendFormalQuery::create()
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
            $con = Propel::getConnection(RwyPendFormalPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                RwyPendFormalPeer::addInstanceToPool($this);
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

            if ($this->aGelarAkademik !== null) {
                if ($this->aGelarAkademik->isModified() || $this->aGelarAkademik->isNew()) {
                    $affectedRows += $this->aGelarAkademik->save($con);
                }
                $this->setGelarAkademik($this->aGelarAkademik);
            }

            if ($this->aPtk !== null) {
                if ($this->aPtk->isModified() || $this->aPtk->isNew()) {
                    $affectedRows += $this->aPtk->save($con);
                }
                $this->setPtk($this->aPtk);
            }

            if ($this->aBidangStudi !== null) {
                if ($this->aBidangStudi->isModified() || $this->aBidangStudi->isNew()) {
                    $affectedRows += $this->aBidangStudi->save($con);
                }
                $this->setBidangStudi($this->aBidangStudi);
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

            if ($this->vldRwyPendFormalsScheduledForDeletion !== null) {
                if (!$this->vldRwyPendFormalsScheduledForDeletion->isEmpty()) {
                    VldRwyPendFormalQuery::create()
                        ->filterByPrimaryKeys($this->vldRwyPendFormalsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->vldRwyPendFormalsScheduledForDeletion = null;
                }
            }

            if ($this->collVldRwyPendFormals !== null) {
                foreach ($this->collVldRwyPendFormals as $referrerFK) {
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
        if ($this->isColumnModified(RwyPendFormalPeer::RIWAYAT_PENDIDIKAN_FORMAL_ID)) {
            $modifiedColumns[':p' . $index++]  = '"riwayat_pendidikan_formal_id"';
        }
        if ($this->isColumnModified(RwyPendFormalPeer::BIDANG_STUDI_ID)) {
            $modifiedColumns[':p' . $index++]  = '"bidang_studi_id"';
        }
        if ($this->isColumnModified(RwyPendFormalPeer::JENJANG_PENDIDIKAN_ID)) {
            $modifiedColumns[':p' . $index++]  = '"jenjang_pendidikan_id"';
        }
        if ($this->isColumnModified(RwyPendFormalPeer::GELAR_AKADEMIK_ID)) {
            $modifiedColumns[':p' . $index++]  = '"gelar_akademik_id"';
        }
        if ($this->isColumnModified(RwyPendFormalPeer::PTK_ID)) {
            $modifiedColumns[':p' . $index++]  = '"ptk_id"';
        }
        if ($this->isColumnModified(RwyPendFormalPeer::SATUAN_PENDIDIKAN_FORMAL)) {
            $modifiedColumns[':p' . $index++]  = '"satuan_pendidikan_formal"';
        }
        if ($this->isColumnModified(RwyPendFormalPeer::FAKULTAS)) {
            $modifiedColumns[':p' . $index++]  = '"fakultas"';
        }
        if ($this->isColumnModified(RwyPendFormalPeer::KEPENDIDIKAN)) {
            $modifiedColumns[':p' . $index++]  = '"kependidikan"';
        }
        if ($this->isColumnModified(RwyPendFormalPeer::TAHUN_MASUK)) {
            $modifiedColumns[':p' . $index++]  = '"tahun_masuk"';
        }
        if ($this->isColumnModified(RwyPendFormalPeer::TAHUN_LULUS)) {
            $modifiedColumns[':p' . $index++]  = '"tahun_lulus"';
        }
        if ($this->isColumnModified(RwyPendFormalPeer::NIM)) {
            $modifiedColumns[':p' . $index++]  = '"nim"';
        }
        if ($this->isColumnModified(RwyPendFormalPeer::STATUS_KULIAH)) {
            $modifiedColumns[':p' . $index++]  = '"status_kuliah"';
        }
        if ($this->isColumnModified(RwyPendFormalPeer::SEMESTER)) {
            $modifiedColumns[':p' . $index++]  = '"semester"';
        }
        if ($this->isColumnModified(RwyPendFormalPeer::IPK)) {
            $modifiedColumns[':p' . $index++]  = '"ipk"';
        }
        if ($this->isColumnModified(RwyPendFormalPeer::PRODI)) {
            $modifiedColumns[':p' . $index++]  = '"prodi"';
        }
        if ($this->isColumnModified(RwyPendFormalPeer::ID_REG_PD)) {
            $modifiedColumns[':p' . $index++]  = '"id_reg_pd"';
        }
        if ($this->isColumnModified(RwyPendFormalPeer::CREATE_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"create_date"';
        }
        if ($this->isColumnModified(RwyPendFormalPeer::LAST_UPDATE)) {
            $modifiedColumns[':p' . $index++]  = '"last_update"';
        }
        if ($this->isColumnModified(RwyPendFormalPeer::SOFT_DELETE)) {
            $modifiedColumns[':p' . $index++]  = '"soft_delete"';
        }
        if ($this->isColumnModified(RwyPendFormalPeer::LAST_SYNC)) {
            $modifiedColumns[':p' . $index++]  = '"last_sync"';
        }
        if ($this->isColumnModified(RwyPendFormalPeer::UPDATER_ID)) {
            $modifiedColumns[':p' . $index++]  = '"updater_id"';
        }

        $sql = sprintf(
            'INSERT INTO "rwy_pend_formal" (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '"riwayat_pendidikan_formal_id"':						
                        $stmt->bindValue($identifier, $this->riwayat_pendidikan_formal_id, PDO::PARAM_STR);
                        break;
                    case '"bidang_studi_id"':						
                        $stmt->bindValue($identifier, $this->bidang_studi_id, PDO::PARAM_INT);
                        break;
                    case '"jenjang_pendidikan_id"':						
                        $stmt->bindValue($identifier, $this->jenjang_pendidikan_id, PDO::PARAM_STR);
                        break;
                    case '"gelar_akademik_id"':						
                        $stmt->bindValue($identifier, $this->gelar_akademik_id, PDO::PARAM_INT);
                        break;
                    case '"ptk_id"':						
                        $stmt->bindValue($identifier, $this->ptk_id, PDO::PARAM_STR);
                        break;
                    case '"satuan_pendidikan_formal"':						
                        $stmt->bindValue($identifier, $this->satuan_pendidikan_formal, PDO::PARAM_STR);
                        break;
                    case '"fakultas"':						
                        $stmt->bindValue($identifier, $this->fakultas, PDO::PARAM_STR);
                        break;
                    case '"kependidikan"':						
                        $stmt->bindValue($identifier, $this->kependidikan, PDO::PARAM_STR);
                        break;
                    case '"tahun_masuk"':						
                        $stmt->bindValue($identifier, $this->tahun_masuk, PDO::PARAM_STR);
                        break;
                    case '"tahun_lulus"':						
                        $stmt->bindValue($identifier, $this->tahun_lulus, PDO::PARAM_STR);
                        break;
                    case '"nim"':						
                        $stmt->bindValue($identifier, $this->nim, PDO::PARAM_STR);
                        break;
                    case '"status_kuliah"':						
                        $stmt->bindValue($identifier, $this->status_kuliah, PDO::PARAM_STR);
                        break;
                    case '"semester"':						
                        $stmt->bindValue($identifier, $this->semester, PDO::PARAM_STR);
                        break;
                    case '"ipk"':						
                        $stmt->bindValue($identifier, $this->ipk, PDO::PARAM_STR);
                        break;
                    case '"prodi"':						
                        $stmt->bindValue($identifier, $this->prodi, PDO::PARAM_STR);
                        break;
                    case '"id_reg_pd"':						
                        $stmt->bindValue($identifier, $this->id_reg_pd, PDO::PARAM_STR);
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

            if ($this->aGelarAkademik !== null) {
                if (!$this->aGelarAkademik->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aGelarAkademik->getValidationFailures());
                }
            }

            if ($this->aPtk !== null) {
                if (!$this->aPtk->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aPtk->getValidationFailures());
                }
            }

            if ($this->aBidangStudi !== null) {
                if (!$this->aBidangStudi->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aBidangStudi->getValidationFailures());
                }
            }

            if ($this->aJenjangPendidikan !== null) {
                if (!$this->aJenjangPendidikan->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aJenjangPendidikan->getValidationFailures());
                }
            }


            if (($retval = RwyPendFormalPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collVldRwyPendFormals !== null) {
                    foreach ($this->collVldRwyPendFormals as $referrerFK) {
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
        $pos = RwyPendFormalPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getRiwayatPendidikanFormalId();
                break;
            case 1:
                return $this->getBidangStudiId();
                break;
            case 2:
                return $this->getJenjangPendidikanId();
                break;
            case 3:
                return $this->getGelarAkademikId();
                break;
            case 4:
                return $this->getPtkId();
                break;
            case 5:
                return $this->getSatuanPendidikanFormal();
                break;
            case 6:
                return $this->getFakultas();
                break;
            case 7:
                return $this->getKependidikan();
                break;
            case 8:
                return $this->getTahunMasuk();
                break;
            case 9:
                return $this->getTahunLulus();
                break;
            case 10:
                return $this->getNim();
                break;
            case 11:
                return $this->getStatusKuliah();
                break;
            case 12:
                return $this->getSemester();
                break;
            case 13:
                return $this->getIpk();
                break;
            case 14:
                return $this->getProdi();
                break;
            case 15:
                return $this->getIdRegPd();
                break;
            case 16:
                return $this->getCreateDate();
                break;
            case 17:
                return $this->getLastUpdate();
                break;
            case 18:
                return $this->getSoftDelete();
                break;
            case 19:
                return $this->getLastSync();
                break;
            case 20:
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
        if (isset($alreadyDumpedObjects['RwyPendFormal'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['RwyPendFormal'][$this->getPrimaryKey()] = true;
        $keys = RwyPendFormalPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getRiwayatPendidikanFormalId(),
            $keys[1] => $this->getBidangStudiId(),
            $keys[2] => $this->getJenjangPendidikanId(),
            $keys[3] => $this->getGelarAkademikId(),
            $keys[4] => $this->getPtkId(),
            $keys[5] => $this->getSatuanPendidikanFormal(),
            $keys[6] => $this->getFakultas(),
            $keys[7] => $this->getKependidikan(),
            $keys[8] => $this->getTahunMasuk(),
            $keys[9] => $this->getTahunLulus(),
            $keys[10] => $this->getNim(),
            $keys[11] => $this->getStatusKuliah(),
            $keys[12] => $this->getSemester(),
            $keys[13] => $this->getIpk(),
            $keys[14] => $this->getProdi(),
            $keys[15] => $this->getIdRegPd(),
            $keys[16] => $this->getCreateDate(),
            $keys[17] => $this->getLastUpdate(),
            $keys[18] => $this->getSoftDelete(),
            $keys[19] => $this->getLastSync(),
            $keys[20] => $this->getUpdaterId(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aGelarAkademik) {
                $result['GelarAkademik'] = $this->aGelarAkademik->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aPtk) {
                $result['Ptk'] = $this->aPtk->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aBidangStudi) {
                $result['BidangStudi'] = $this->aBidangStudi->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aJenjangPendidikan) {
                $result['JenjangPendidikan'] = $this->aJenjangPendidikan->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collVldRwyPendFormals) {
                $result['VldRwyPendFormals'] = $this->collVldRwyPendFormals->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = RwyPendFormalPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setRiwayatPendidikanFormalId($value);
                break;
            case 1:
                $this->setBidangStudiId($value);
                break;
            case 2:
                $this->setJenjangPendidikanId($value);
                break;
            case 3:
                $this->setGelarAkademikId($value);
                break;
            case 4:
                $this->setPtkId($value);
                break;
            case 5:
                $this->setSatuanPendidikanFormal($value);
                break;
            case 6:
                $this->setFakultas($value);
                break;
            case 7:
                $this->setKependidikan($value);
                break;
            case 8:
                $this->setTahunMasuk($value);
                break;
            case 9:
                $this->setTahunLulus($value);
                break;
            case 10:
                $this->setNim($value);
                break;
            case 11:
                $this->setStatusKuliah($value);
                break;
            case 12:
                $this->setSemester($value);
                break;
            case 13:
                $this->setIpk($value);
                break;
            case 14:
                $this->setProdi($value);
                break;
            case 15:
                $this->setIdRegPd($value);
                break;
            case 16:
                $this->setCreateDate($value);
                break;
            case 17:
                $this->setLastUpdate($value);
                break;
            case 18:
                $this->setSoftDelete($value);
                break;
            case 19:
                $this->setLastSync($value);
                break;
            case 20:
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
        $keys = RwyPendFormalPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setRiwayatPendidikanFormalId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setBidangStudiId($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setJenjangPendidikanId($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setGelarAkademikId($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setPtkId($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setSatuanPendidikanFormal($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setFakultas($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setKependidikan($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setTahunMasuk($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setTahunLulus($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setNim($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setStatusKuliah($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setSemester($arr[$keys[12]]);
        if (array_key_exists($keys[13], $arr)) $this->setIpk($arr[$keys[13]]);
        if (array_key_exists($keys[14], $arr)) $this->setProdi($arr[$keys[14]]);
        if (array_key_exists($keys[15], $arr)) $this->setIdRegPd($arr[$keys[15]]);
        if (array_key_exists($keys[16], $arr)) $this->setCreateDate($arr[$keys[16]]);
        if (array_key_exists($keys[17], $arr)) $this->setLastUpdate($arr[$keys[17]]);
        if (array_key_exists($keys[18], $arr)) $this->setSoftDelete($arr[$keys[18]]);
        if (array_key_exists($keys[19], $arr)) $this->setLastSync($arr[$keys[19]]);
        if (array_key_exists($keys[20], $arr)) $this->setUpdaterId($arr[$keys[20]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(RwyPendFormalPeer::DATABASE_NAME);

        if ($this->isColumnModified(RwyPendFormalPeer::RIWAYAT_PENDIDIKAN_FORMAL_ID)) $criteria->add(RwyPendFormalPeer::RIWAYAT_PENDIDIKAN_FORMAL_ID, $this->riwayat_pendidikan_formal_id);
        if ($this->isColumnModified(RwyPendFormalPeer::BIDANG_STUDI_ID)) $criteria->add(RwyPendFormalPeer::BIDANG_STUDI_ID, $this->bidang_studi_id);
        if ($this->isColumnModified(RwyPendFormalPeer::JENJANG_PENDIDIKAN_ID)) $criteria->add(RwyPendFormalPeer::JENJANG_PENDIDIKAN_ID, $this->jenjang_pendidikan_id);
        if ($this->isColumnModified(RwyPendFormalPeer::GELAR_AKADEMIK_ID)) $criteria->add(RwyPendFormalPeer::GELAR_AKADEMIK_ID, $this->gelar_akademik_id);
        if ($this->isColumnModified(RwyPendFormalPeer::PTK_ID)) $criteria->add(RwyPendFormalPeer::PTK_ID, $this->ptk_id);
        if ($this->isColumnModified(RwyPendFormalPeer::SATUAN_PENDIDIKAN_FORMAL)) $criteria->add(RwyPendFormalPeer::SATUAN_PENDIDIKAN_FORMAL, $this->satuan_pendidikan_formal);
        if ($this->isColumnModified(RwyPendFormalPeer::FAKULTAS)) $criteria->add(RwyPendFormalPeer::FAKULTAS, $this->fakultas);
        if ($this->isColumnModified(RwyPendFormalPeer::KEPENDIDIKAN)) $criteria->add(RwyPendFormalPeer::KEPENDIDIKAN, $this->kependidikan);
        if ($this->isColumnModified(RwyPendFormalPeer::TAHUN_MASUK)) $criteria->add(RwyPendFormalPeer::TAHUN_MASUK, $this->tahun_masuk);
        if ($this->isColumnModified(RwyPendFormalPeer::TAHUN_LULUS)) $criteria->add(RwyPendFormalPeer::TAHUN_LULUS, $this->tahun_lulus);
        if ($this->isColumnModified(RwyPendFormalPeer::NIM)) $criteria->add(RwyPendFormalPeer::NIM, $this->nim);
        if ($this->isColumnModified(RwyPendFormalPeer::STATUS_KULIAH)) $criteria->add(RwyPendFormalPeer::STATUS_KULIAH, $this->status_kuliah);
        if ($this->isColumnModified(RwyPendFormalPeer::SEMESTER)) $criteria->add(RwyPendFormalPeer::SEMESTER, $this->semester);
        if ($this->isColumnModified(RwyPendFormalPeer::IPK)) $criteria->add(RwyPendFormalPeer::IPK, $this->ipk);
        if ($this->isColumnModified(RwyPendFormalPeer::PRODI)) $criteria->add(RwyPendFormalPeer::PRODI, $this->prodi);
        if ($this->isColumnModified(RwyPendFormalPeer::ID_REG_PD)) $criteria->add(RwyPendFormalPeer::ID_REG_PD, $this->id_reg_pd);
        if ($this->isColumnModified(RwyPendFormalPeer::CREATE_DATE)) $criteria->add(RwyPendFormalPeer::CREATE_DATE, $this->create_date);
        if ($this->isColumnModified(RwyPendFormalPeer::LAST_UPDATE)) $criteria->add(RwyPendFormalPeer::LAST_UPDATE, $this->last_update);
        if ($this->isColumnModified(RwyPendFormalPeer::SOFT_DELETE)) $criteria->add(RwyPendFormalPeer::SOFT_DELETE, $this->soft_delete);
        if ($this->isColumnModified(RwyPendFormalPeer::LAST_SYNC)) $criteria->add(RwyPendFormalPeer::LAST_SYNC, $this->last_sync);
        if ($this->isColumnModified(RwyPendFormalPeer::UPDATER_ID)) $criteria->add(RwyPendFormalPeer::UPDATER_ID, $this->updater_id);

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
        $criteria = new Criteria(RwyPendFormalPeer::DATABASE_NAME);
        $criteria->add(RwyPendFormalPeer::RIWAYAT_PENDIDIKAN_FORMAL_ID, $this->riwayat_pendidikan_formal_id);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return string
     */
    public function getPrimaryKey()
    {
        return $this->getRiwayatPendidikanFormalId();
    }

    /**
     * Generic method to set the primary key (riwayat_pendidikan_formal_id column).
     *
     * @param  string $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setRiwayatPendidikanFormalId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getRiwayatPendidikanFormalId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of RwyPendFormal (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setBidangStudiId($this->getBidangStudiId());
        $copyObj->setJenjangPendidikanId($this->getJenjangPendidikanId());
        $copyObj->setGelarAkademikId($this->getGelarAkademikId());
        $copyObj->setPtkId($this->getPtkId());
        $copyObj->setSatuanPendidikanFormal($this->getSatuanPendidikanFormal());
        $copyObj->setFakultas($this->getFakultas());
        $copyObj->setKependidikan($this->getKependidikan());
        $copyObj->setTahunMasuk($this->getTahunMasuk());
        $copyObj->setTahunLulus($this->getTahunLulus());
        $copyObj->setNim($this->getNim());
        $copyObj->setStatusKuliah($this->getStatusKuliah());
        $copyObj->setSemester($this->getSemester());
        $copyObj->setIpk($this->getIpk());
        $copyObj->setProdi($this->getProdi());
        $copyObj->setIdRegPd($this->getIdRegPd());
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

            foreach ($this->getVldRwyPendFormals() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addVldRwyPendFormal($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setRiwayatPendidikanFormalId(NULL); // this is a auto-increment column, so set to default value
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
     * @return RwyPendFormal Clone of current object.
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
     * @return RwyPendFormalPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new RwyPendFormalPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a GelarAkademik object.
     *
     * @param             GelarAkademik $v
     * @return RwyPendFormal The current object (for fluent API support)
     * @throws PropelException
     */
    public function setGelarAkademik(GelarAkademik $v = null)
    {
        if ($v === null) {
            $this->setGelarAkademikId(NULL);
        } else {
            $this->setGelarAkademikId($v->getGelarAkademikId());
        }

        $this->aGelarAkademik = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the GelarAkademik object, it will not be re-added.
        if ($v !== null) {
            $v->addRwyPendFormal($this);
        }


        return $this;
    }


    /**
     * Get the associated GelarAkademik object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return GelarAkademik The associated GelarAkademik object.
     * @throws PropelException
     */
    public function getGelarAkademik(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aGelarAkademik === null && ($this->gelar_akademik_id !== null) && $doQuery) {
            $this->aGelarAkademik = GelarAkademikQuery::create()->findPk($this->gelar_akademik_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aGelarAkademik->addRwyPendFormals($this);
             */
        }

        return $this->aGelarAkademik;
    }

    /**
     * Declares an association between this object and a Ptk object.
     *
     * @param             Ptk $v
     * @return RwyPendFormal The current object (for fluent API support)
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
            $v->addRwyPendFormal($this);
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
                $this->aPtk->addRwyPendFormals($this);
             */
        }

        return $this->aPtk;
    }

    /**
     * Declares an association between this object and a BidangStudi object.
     *
     * @param             BidangStudi $v
     * @return RwyPendFormal The current object (for fluent API support)
     * @throws PropelException
     */
    public function setBidangStudi(BidangStudi $v = null)
    {
        if ($v === null) {
            $this->setBidangStudiId(NULL);
        } else {
            $this->setBidangStudiId($v->getBidangStudiId());
        }

        $this->aBidangStudi = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the BidangStudi object, it will not be re-added.
        if ($v !== null) {
            $v->addRwyPendFormal($this);
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
    public function getBidangStudi(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aBidangStudi === null && ($this->bidang_studi_id !== null) && $doQuery) {
            $this->aBidangStudi = BidangStudiQuery::create()->findPk($this->bidang_studi_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aBidangStudi->addRwyPendFormals($this);
             */
        }

        return $this->aBidangStudi;
    }

    /**
     * Declares an association between this object and a JenjangPendidikan object.
     *
     * @param             JenjangPendidikan $v
     * @return RwyPendFormal The current object (for fluent API support)
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
            $v->addRwyPendFormal($this);
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
                $this->aJenjangPendidikan->addRwyPendFormals($this);
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
        if ('VldRwyPendFormal' == $relationName) {
            $this->initVldRwyPendFormals();
        }
    }

    /**
     * Clears out the collVldRwyPendFormals collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return RwyPendFormal The current object (for fluent API support)
     * @see        addVldRwyPendFormals()
     */
    public function clearVldRwyPendFormals()
    {
        $this->collVldRwyPendFormals = null; // important to set this to null since that means it is uninitialized
        $this->collVldRwyPendFormalsPartial = null;

        return $this;
    }

    /**
     * reset is the collVldRwyPendFormals collection loaded partially
     *
     * @return void
     */
    public function resetPartialVldRwyPendFormals($v = true)
    {
        $this->collVldRwyPendFormalsPartial = $v;
    }

    /**
     * Initializes the collVldRwyPendFormals collection.
     *
     * By default this just sets the collVldRwyPendFormals collection to an empty array (like clearcollVldRwyPendFormals());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initVldRwyPendFormals($overrideExisting = true)
    {
        if (null !== $this->collVldRwyPendFormals && !$overrideExisting) {
            return;
        }
        $this->collVldRwyPendFormals = new PropelObjectCollection();
        $this->collVldRwyPendFormals->setModel('VldRwyPendFormal');
    }

    /**
     * Gets an array of VldRwyPendFormal objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this RwyPendFormal is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|VldRwyPendFormal[] List of VldRwyPendFormal objects
     * @throws PropelException
     */
    public function getVldRwyPendFormals($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collVldRwyPendFormalsPartial && !$this->isNew();
        if (null === $this->collVldRwyPendFormals || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collVldRwyPendFormals) {
                // return empty collection
                $this->initVldRwyPendFormals();
            } else {
                $collVldRwyPendFormals = VldRwyPendFormalQuery::create(null, $criteria)
                    ->filterByRwyPendFormal($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collVldRwyPendFormalsPartial && count($collVldRwyPendFormals)) {
                      $this->initVldRwyPendFormals(false);

                      foreach($collVldRwyPendFormals as $obj) {
                        if (false == $this->collVldRwyPendFormals->contains($obj)) {
                          $this->collVldRwyPendFormals->append($obj);
                        }
                      }

                      $this->collVldRwyPendFormalsPartial = true;
                    }

                    $collVldRwyPendFormals->getInternalIterator()->rewind();
                    return $collVldRwyPendFormals;
                }

                if($partial && $this->collVldRwyPendFormals) {
                    foreach($this->collVldRwyPendFormals as $obj) {
                        if($obj->isNew()) {
                            $collVldRwyPendFormals[] = $obj;
                        }
                    }
                }

                $this->collVldRwyPendFormals = $collVldRwyPendFormals;
                $this->collVldRwyPendFormalsPartial = false;
            }
        }

        return $this->collVldRwyPendFormals;
    }

    /**
     * Sets a collection of VldRwyPendFormal objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $vldRwyPendFormals A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return RwyPendFormal The current object (for fluent API support)
     */
    public function setVldRwyPendFormals(PropelCollection $vldRwyPendFormals, PropelPDO $con = null)
    {
        $vldRwyPendFormalsToDelete = $this->getVldRwyPendFormals(new Criteria(), $con)->diff($vldRwyPendFormals);

        $this->vldRwyPendFormalsScheduledForDeletion = unserialize(serialize($vldRwyPendFormalsToDelete));

        foreach ($vldRwyPendFormalsToDelete as $vldRwyPendFormalRemoved) {
            $vldRwyPendFormalRemoved->setRwyPendFormal(null);
        }

        $this->collVldRwyPendFormals = null;
        foreach ($vldRwyPendFormals as $vldRwyPendFormal) {
            $this->addVldRwyPendFormal($vldRwyPendFormal);
        }

        $this->collVldRwyPendFormals = $vldRwyPendFormals;
        $this->collVldRwyPendFormalsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related VldRwyPendFormal objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related VldRwyPendFormal objects.
     * @throws PropelException
     */
    public function countVldRwyPendFormals(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collVldRwyPendFormalsPartial && !$this->isNew();
        if (null === $this->collVldRwyPendFormals || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collVldRwyPendFormals) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getVldRwyPendFormals());
            }
            $query = VldRwyPendFormalQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByRwyPendFormal($this)
                ->count($con);
        }

        return count($this->collVldRwyPendFormals);
    }

    /**
     * Method called to associate a VldRwyPendFormal object to this object
     * through the VldRwyPendFormal foreign key attribute.
     *
     * @param    VldRwyPendFormal $l VldRwyPendFormal
     * @return RwyPendFormal The current object (for fluent API support)
     */
    public function addVldRwyPendFormal(VldRwyPendFormal $l)
    {
        if ($this->collVldRwyPendFormals === null) {
            $this->initVldRwyPendFormals();
            $this->collVldRwyPendFormalsPartial = true;
        }
        if (!in_array($l, $this->collVldRwyPendFormals->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddVldRwyPendFormal($l);
        }

        return $this;
    }

    /**
     * @param	VldRwyPendFormal $vldRwyPendFormal The vldRwyPendFormal object to add.
     */
    protected function doAddVldRwyPendFormal($vldRwyPendFormal)
    {
        $this->collVldRwyPendFormals[]= $vldRwyPendFormal;
        $vldRwyPendFormal->setRwyPendFormal($this);
    }

    /**
     * @param	VldRwyPendFormal $vldRwyPendFormal The vldRwyPendFormal object to remove.
     * @return RwyPendFormal The current object (for fluent API support)
     */
    public function removeVldRwyPendFormal($vldRwyPendFormal)
    {
        if ($this->getVldRwyPendFormals()->contains($vldRwyPendFormal)) {
            $this->collVldRwyPendFormals->remove($this->collVldRwyPendFormals->search($vldRwyPendFormal));
            if (null === $this->vldRwyPendFormalsScheduledForDeletion) {
                $this->vldRwyPendFormalsScheduledForDeletion = clone $this->collVldRwyPendFormals;
                $this->vldRwyPendFormalsScheduledForDeletion->clear();
            }
            $this->vldRwyPendFormalsScheduledForDeletion[]= clone $vldRwyPendFormal;
            $vldRwyPendFormal->setRwyPendFormal(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this RwyPendFormal is new, it will return
     * an empty collection; or if this RwyPendFormal has previously
     * been saved, it will retrieve related VldRwyPendFormals from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in RwyPendFormal.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|VldRwyPendFormal[] List of VldRwyPendFormal objects
     */
    public function getVldRwyPendFormalsJoinErrortype($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = VldRwyPendFormalQuery::create(null, $criteria);
        $query->joinWith('Errortype', $join_behavior);

        return $this->getVldRwyPendFormals($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->riwayat_pendidikan_formal_id = null;
        $this->bidang_studi_id = null;
        $this->jenjang_pendidikan_id = null;
        $this->gelar_akademik_id = null;
        $this->ptk_id = null;
        $this->satuan_pendidikan_formal = null;
        $this->fakultas = null;
        $this->kependidikan = null;
        $this->tahun_masuk = null;
        $this->tahun_lulus = null;
        $this->nim = null;
        $this->status_kuliah = null;
        $this->semester = null;
        $this->ipk = null;
        $this->prodi = null;
        $this->id_reg_pd = null;
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
            if ($this->collVldRwyPendFormals) {
                foreach ($this->collVldRwyPendFormals as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aGelarAkademik instanceof Persistent) {
              $this->aGelarAkademik->clearAllReferences($deep);
            }
            if ($this->aPtk instanceof Persistent) {
              $this->aPtk->clearAllReferences($deep);
            }
            if ($this->aBidangStudi instanceof Persistent) {
              $this->aBidangStudi->clearAllReferences($deep);
            }
            if ($this->aJenjangPendidikan instanceof Persistent) {
              $this->aJenjangPendidikan->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collVldRwyPendFormals instanceof PropelCollection) {
            $this->collVldRwyPendFormals->clearIterator();
        }
        $this->collVldRwyPendFormals = null;
        $this->aGelarAkademik = null;
        $this->aPtk = null;
        $this->aBidangStudi = null;
        $this->aJenjangPendidikan = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(RwyPendFormalPeer::DEFAULT_STRING_FORMAT);
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
