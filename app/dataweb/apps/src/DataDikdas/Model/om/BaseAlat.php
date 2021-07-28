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
use DataDikdas\Model\Alat;
use DataDikdas\Model\AlatDariBlockgrant;
use DataDikdas\Model\AlatDariBlockgrantQuery;
use DataDikdas\Model\AlatLongitudinal;
use DataDikdas\Model\AlatLongitudinalQuery;
use DataDikdas\Model\AlatPeer;
use DataDikdas\Model\AlatQuery;
use DataDikdas\Model\JenisHapusBuku;
use DataDikdas\Model\JenisHapusBukuQuery;
use DataDikdas\Model\JenisSarana;
use DataDikdas\Model\JenisSaranaQuery;
use DataDikdas\Model\Ptk;
use DataDikdas\Model\PtkQuery;
use DataDikdas\Model\Ruang;
use DataDikdas\Model\RuangQuery;
use DataDikdas\Model\Sekolah;
use DataDikdas\Model\SekolahQuery;
use DataDikdas\Model\StatusKepemilikanSarpras;
use DataDikdas\Model\StatusKepemilikanSarprasQuery;
use DataDikdas\Model\VldAlat;
use DataDikdas\Model\VldAlatQuery;

/**
 * Base class that represents a row from the 'alat' table.
 *
 * 
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseAlat extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'DataDikdas\\Model\\AlatPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        AlatPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the id_alat field.
     * @var        string
     */
    protected $id_alat;

    /**
     * The value for the jenis_sarana_id field.
     * @var        int
     */
    protected $jenis_sarana_id;

    /**
     * The value for the sekolah_id field.
     * @var        string
     */
    protected $sekolah_id;

    /**
     * The value for the ptk_id field.
     * @var        string
     */
    protected $ptk_id;

    /**
     * The value for the id_ruang field.
     * @var        string
     */
    protected $id_ruang;

    /**
     * The value for the id_hapus_buku field.
     * @var        string
     */
    protected $id_hapus_buku;

    /**
     * The value for the kepemilikan_sarpras_id field.
     * @var        string
     */
    protected $kepemilikan_sarpras_id;

    /**
     * The value for the kd_kl field.
     * @var        string
     */
    protected $kd_kl;

    /**
     * The value for the kd_satker field.
     * @var        string
     */
    protected $kd_satker;

    /**
     * The value for the kd_brg field.
     * @var        string
     */
    protected $kd_brg;

    /**
     * The value for the nup field.
     * @var        int
     */
    protected $nup;

    /**
     * The value for the kode_eselon1 field.
     * @var        string
     */
    protected $kode_eselon1;

    /**
     * The value for the nama_eselon1 field.
     * @var        string
     */
    protected $nama_eselon1;

    /**
     * The value for the kode_sub_satker field.
     * @var        string
     */
    protected $kode_sub_satker;

    /**
     * The value for the nama_sub_satker field.
     * @var        string
     */
    protected $nama_sub_satker;

    /**
     * The value for the nama field.
     * @var        string
     */
    protected $nama;

    /**
     * The value for the spesifikasi field.
     * @var        string
     */
    protected $spesifikasi;

    /**
     * The value for the tgl_hapus_buku field.
     * @var        string
     */
    protected $tgl_hapus_buku;

    /**
     * The value for the asal_data field.
     * Note: this column has a database default value of: '1'
     * @var        string
     */
    protected $asal_data;

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
     * @var        Ruang
     */
    protected $aRuang;

    /**
     * @var        JenisHapusBuku
     */
    protected $aJenisHapusBuku;

    /**
     * @var        JenisSarana
     */
    protected $aJenisSarana;

    /**
     * @var        StatusKepemilikanSarpras
     */
    protected $aStatusKepemilikanSarpras;

    /**
     * @var        Sekolah
     */
    protected $aSekolah;

    /**
     * @var        PropelObjectCollection|AlatDariBlockgrant[] Collection to store aggregation of AlatDariBlockgrant objects.
     */
    protected $collAlatDariBlockgrants;
    protected $collAlatDariBlockgrantsPartial;

    /**
     * @var        PropelObjectCollection|AlatLongitudinal[] Collection to store aggregation of AlatLongitudinal objects.
     */
    protected $collAlatLongitudinals;
    protected $collAlatLongitudinalsPartial;

    /**
     * @var        PropelObjectCollection|VldAlat[] Collection to store aggregation of VldAlat objects.
     */
    protected $collVldAlats;
    protected $collVldAlatsPartial;

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
    protected $alatDariBlockgrantsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $alatLongitudinalsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $vldAlatsScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->asal_data = '1';
        $this->last_sync = '1901-01-01 00:00:00';
    }

    /**
     * Initializes internal state of BaseAlat object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [id_alat] column value.
     * 
     * @return string
     */
    public function getIdAlat()
    {
        return $this->id_alat;
    }

    /**
     * Get the [jenis_sarana_id] column value.
     * 
     * @return int
     */
    public function getJenisSaranaId()
    {
        return $this->jenis_sarana_id;
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
     * Get the [ptk_id] column value.
     * 
     * @return string
     */
    public function getPtkId()
    {
        return $this->ptk_id;
    }

    /**
     * Get the [id_ruang] column value.
     * 
     * @return string
     */
    public function getIdRuang()
    {
        return $this->id_ruang;
    }

    /**
     * Get the [id_hapus_buku] column value.
     * 
     * @return string
     */
    public function getIdHapusBuku()
    {
        return $this->id_hapus_buku;
    }

    /**
     * Get the [kepemilikan_sarpras_id] column value.
     * 
     * @return string
     */
    public function getKepemilikanSarprasId()
    {
        return $this->kepemilikan_sarpras_id;
    }

    /**
     * Get the [kd_kl] column value.
     * 
     * @return string
     */
    public function getKdKl()
    {
        return $this->kd_kl;
    }

    /**
     * Get the [kd_satker] column value.
     * 
     * @return string
     */
    public function getKdSatker()
    {
        return $this->kd_satker;
    }

    /**
     * Get the [kd_brg] column value.
     * 
     * @return string
     */
    public function getKdBrg()
    {
        return $this->kd_brg;
    }

    /**
     * Get the [nup] column value.
     * 
     * @return int
     */
    public function getNup()
    {
        return $this->nup;
    }

    /**
     * Get the [kode_eselon1] column value.
     * 
     * @return string
     */
    public function getKodeEselon1()
    {
        return $this->kode_eselon1;
    }

    /**
     * Get the [nama_eselon1] column value.
     * 
     * @return string
     */
    public function getNamaEselon1()
    {
        return $this->nama_eselon1;
    }

    /**
     * Get the [kode_sub_satker] column value.
     * 
     * @return string
     */
    public function getKodeSubSatker()
    {
        return $this->kode_sub_satker;
    }

    /**
     * Get the [nama_sub_satker] column value.
     * 
     * @return string
     */
    public function getNamaSubSatker()
    {
        return $this->nama_sub_satker;
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
     * Get the [spesifikasi] column value.
     * 
     * @return string
     */
    public function getSpesifikasi()
    {
        return $this->spesifikasi;
    }

    /**
     * Get the [optionally formatted] temporal [tgl_hapus_buku] column value.
     * 
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getTglHapusBuku($format = '%Y-%m-%d')
    {
        if ($this->tgl_hapus_buku === null) {
            return null;
        }


        try {
            $dt = new DateTime($this->tgl_hapus_buku);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->tgl_hapus_buku, true), $x);
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
     * Get the [asal_data] column value.
     * 
     * @return string
     */
    public function getAsalData()
    {
        return $this->asal_data;
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
     * Set the value of [id_alat] column.
     * 
     * @param string $v new value
     * @return Alat The current object (for fluent API support)
     */
    public function setIdAlat($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->id_alat !== $v) {
            $this->id_alat = $v;
            $this->modifiedColumns[] = AlatPeer::ID_ALAT;
        }


        return $this;
    } // setIdAlat()

    /**
     * Set the value of [jenis_sarana_id] column.
     * 
     * @param int $v new value
     * @return Alat The current object (for fluent API support)
     */
    public function setJenisSaranaId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->jenis_sarana_id !== $v) {
            $this->jenis_sarana_id = $v;
            $this->modifiedColumns[] = AlatPeer::JENIS_SARANA_ID;
        }

        if ($this->aJenisSarana !== null && $this->aJenisSarana->getJenisSaranaId() !== $v) {
            $this->aJenisSarana = null;
        }


        return $this;
    } // setJenisSaranaId()

    /**
     * Set the value of [sekolah_id] column.
     * 
     * @param string $v new value
     * @return Alat The current object (for fluent API support)
     */
    public function setSekolahId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->sekolah_id !== $v) {
            $this->sekolah_id = $v;
            $this->modifiedColumns[] = AlatPeer::SEKOLAH_ID;
        }

        if ($this->aSekolah !== null && $this->aSekolah->getSekolahId() !== $v) {
            $this->aSekolah = null;
        }


        return $this;
    } // setSekolahId()

    /**
     * Set the value of [ptk_id] column.
     * 
     * @param string $v new value
     * @return Alat The current object (for fluent API support)
     */
    public function setPtkId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->ptk_id !== $v) {
            $this->ptk_id = $v;
            $this->modifiedColumns[] = AlatPeer::PTK_ID;
        }

        if ($this->aPtk !== null && $this->aPtk->getPtkId() !== $v) {
            $this->aPtk = null;
        }


        return $this;
    } // setPtkId()

    /**
     * Set the value of [id_ruang] column.
     * 
     * @param string $v new value
     * @return Alat The current object (for fluent API support)
     */
    public function setIdRuang($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->id_ruang !== $v) {
            $this->id_ruang = $v;
            $this->modifiedColumns[] = AlatPeer::ID_RUANG;
        }

        if ($this->aRuang !== null && $this->aRuang->getIdRuang() !== $v) {
            $this->aRuang = null;
        }


        return $this;
    } // setIdRuang()

    /**
     * Set the value of [id_hapus_buku] column.
     * 
     * @param string $v new value
     * @return Alat The current object (for fluent API support)
     */
    public function setIdHapusBuku($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->id_hapus_buku !== $v) {
            $this->id_hapus_buku = $v;
            $this->modifiedColumns[] = AlatPeer::ID_HAPUS_BUKU;
        }

        if ($this->aJenisHapusBuku !== null && $this->aJenisHapusBuku->getIdHapusBuku() !== $v) {
            $this->aJenisHapusBuku = null;
        }


        return $this;
    } // setIdHapusBuku()

    /**
     * Set the value of [kepemilikan_sarpras_id] column.
     * 
     * @param string $v new value
     * @return Alat The current object (for fluent API support)
     */
    public function setKepemilikanSarprasId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->kepemilikan_sarpras_id !== $v) {
            $this->kepemilikan_sarpras_id = $v;
            $this->modifiedColumns[] = AlatPeer::KEPEMILIKAN_SARPRAS_ID;
        }

        if ($this->aStatusKepemilikanSarpras !== null && $this->aStatusKepemilikanSarpras->getKepemilikanSarprasId() !== $v) {
            $this->aStatusKepemilikanSarpras = null;
        }


        return $this;
    } // setKepemilikanSarprasId()

    /**
     * Set the value of [kd_kl] column.
     * 
     * @param string $v new value
     * @return Alat The current object (for fluent API support)
     */
    public function setKdKl($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->kd_kl !== $v) {
            $this->kd_kl = $v;
            $this->modifiedColumns[] = AlatPeer::KD_KL;
        }


        return $this;
    } // setKdKl()

    /**
     * Set the value of [kd_satker] column.
     * 
     * @param string $v new value
     * @return Alat The current object (for fluent API support)
     */
    public function setKdSatker($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->kd_satker !== $v) {
            $this->kd_satker = $v;
            $this->modifiedColumns[] = AlatPeer::KD_SATKER;
        }


        return $this;
    } // setKdSatker()

    /**
     * Set the value of [kd_brg] column.
     * 
     * @param string $v new value
     * @return Alat The current object (for fluent API support)
     */
    public function setKdBrg($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->kd_brg !== $v) {
            $this->kd_brg = $v;
            $this->modifiedColumns[] = AlatPeer::KD_BRG;
        }


        return $this;
    } // setKdBrg()

    /**
     * Set the value of [nup] column.
     * 
     * @param int $v new value
     * @return Alat The current object (for fluent API support)
     */
    public function setNup($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->nup !== $v) {
            $this->nup = $v;
            $this->modifiedColumns[] = AlatPeer::NUP;
        }


        return $this;
    } // setNup()

    /**
     * Set the value of [kode_eselon1] column.
     * 
     * @param string $v new value
     * @return Alat The current object (for fluent API support)
     */
    public function setKodeEselon1($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->kode_eselon1 !== $v) {
            $this->kode_eselon1 = $v;
            $this->modifiedColumns[] = AlatPeer::KODE_ESELON1;
        }


        return $this;
    } // setKodeEselon1()

    /**
     * Set the value of [nama_eselon1] column.
     * 
     * @param string $v new value
     * @return Alat The current object (for fluent API support)
     */
    public function setNamaEselon1($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nama_eselon1 !== $v) {
            $this->nama_eselon1 = $v;
            $this->modifiedColumns[] = AlatPeer::NAMA_ESELON1;
        }


        return $this;
    } // setNamaEselon1()

    /**
     * Set the value of [kode_sub_satker] column.
     * 
     * @param string $v new value
     * @return Alat The current object (for fluent API support)
     */
    public function setKodeSubSatker($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->kode_sub_satker !== $v) {
            $this->kode_sub_satker = $v;
            $this->modifiedColumns[] = AlatPeer::KODE_SUB_SATKER;
        }


        return $this;
    } // setKodeSubSatker()

    /**
     * Set the value of [nama_sub_satker] column.
     * 
     * @param string $v new value
     * @return Alat The current object (for fluent API support)
     */
    public function setNamaSubSatker($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nama_sub_satker !== $v) {
            $this->nama_sub_satker = $v;
            $this->modifiedColumns[] = AlatPeer::NAMA_SUB_SATKER;
        }


        return $this;
    } // setNamaSubSatker()

    /**
     * Set the value of [nama] column.
     * 
     * @param string $v new value
     * @return Alat The current object (for fluent API support)
     */
    public function setNama($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nama !== $v) {
            $this->nama = $v;
            $this->modifiedColumns[] = AlatPeer::NAMA;
        }


        return $this;
    } // setNama()

    /**
     * Set the value of [spesifikasi] column.
     * 
     * @param string $v new value
     * @return Alat The current object (for fluent API support)
     */
    public function setSpesifikasi($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->spesifikasi !== $v) {
            $this->spesifikasi = $v;
            $this->modifiedColumns[] = AlatPeer::SPESIFIKASI;
        }


        return $this;
    } // setSpesifikasi()

    /**
     * Sets the value of [tgl_hapus_buku] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Alat The current object (for fluent API support)
     */
    public function setTglHapusBuku($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->tgl_hapus_buku !== null || $dt !== null) {
            $currentDateAsString = ($this->tgl_hapus_buku !== null && $tmpDt = new DateTime($this->tgl_hapus_buku)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->tgl_hapus_buku = $newDateAsString;
                $this->modifiedColumns[] = AlatPeer::TGL_HAPUS_BUKU;
            }
        } // if either are not null


        return $this;
    } // setTglHapusBuku()

    /**
     * Set the value of [asal_data] column.
     * 
     * @param string $v new value
     * @return Alat The current object (for fluent API support)
     */
    public function setAsalData($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->asal_data !== $v) {
            $this->asal_data = $v;
            $this->modifiedColumns[] = AlatPeer::ASAL_DATA;
        }


        return $this;
    } // setAsalData()

    /**
     * Sets the value of [create_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Alat The current object (for fluent API support)
     */
    public function setCreateDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->create_date !== null || $dt !== null) {
            $currentDateAsString = ($this->create_date !== null && $tmpDt = new DateTime($this->create_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->create_date = $newDateAsString;
                $this->modifiedColumns[] = AlatPeer::CREATE_DATE;
            }
        } // if either are not null


        return $this;
    } // setCreateDate()

    /**
     * Sets the value of [last_update] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Alat The current object (for fluent API support)
     */
    public function setLastUpdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->last_update !== null || $dt !== null) {
            $currentDateAsString = ($this->last_update !== null && $tmpDt = new DateTime($this->last_update)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->last_update = $newDateAsString;
                $this->modifiedColumns[] = AlatPeer::LAST_UPDATE;
            }
        } // if either are not null


        return $this;
    } // setLastUpdate()

    /**
     * Set the value of [soft_delete] column.
     * 
     * @param string $v new value
     * @return Alat The current object (for fluent API support)
     */
    public function setSoftDelete($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->soft_delete !== $v) {
            $this->soft_delete = $v;
            $this->modifiedColumns[] = AlatPeer::SOFT_DELETE;
        }


        return $this;
    } // setSoftDelete()

    /**
     * Sets the value of [last_sync] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Alat The current object (for fluent API support)
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
                $this->modifiedColumns[] = AlatPeer::LAST_SYNC;
            }
        } // if either are not null


        return $this;
    } // setLastSync()

    /**
     * Set the value of [updater_id] column.
     * 
     * @param string $v new value
     * @return Alat The current object (for fluent API support)
     */
    public function setUpdaterId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->updater_id !== $v) {
            $this->updater_id = $v;
            $this->modifiedColumns[] = AlatPeer::UPDATER_ID;
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
            if ($this->asal_data !== '1') {
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

            $this->id_alat = ($row[$startcol + 0] !== null) ? (string) $row[$startcol + 0] : null;
            $this->jenis_sarana_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->sekolah_id = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->ptk_id = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->id_ruang = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->id_hapus_buku = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->kepemilikan_sarpras_id = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->kd_kl = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->kd_satker = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->kd_brg = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
            $this->nup = ($row[$startcol + 10] !== null) ? (int) $row[$startcol + 10] : null;
            $this->kode_eselon1 = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
            $this->nama_eselon1 = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
            $this->kode_sub_satker = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
            $this->nama_sub_satker = ($row[$startcol + 14] !== null) ? (string) $row[$startcol + 14] : null;
            $this->nama = ($row[$startcol + 15] !== null) ? (string) $row[$startcol + 15] : null;
            $this->spesifikasi = ($row[$startcol + 16] !== null) ? (string) $row[$startcol + 16] : null;
            $this->tgl_hapus_buku = ($row[$startcol + 17] !== null) ? (string) $row[$startcol + 17] : null;
            $this->asal_data = ($row[$startcol + 18] !== null) ? (string) $row[$startcol + 18] : null;
            $this->create_date = ($row[$startcol + 19] !== null) ? (string) $row[$startcol + 19] : null;
            $this->last_update = ($row[$startcol + 20] !== null) ? (string) $row[$startcol + 20] : null;
            $this->soft_delete = ($row[$startcol + 21] !== null) ? (string) $row[$startcol + 21] : null;
            $this->last_sync = ($row[$startcol + 22] !== null) ? (string) $row[$startcol + 22] : null;
            $this->updater_id = ($row[$startcol + 23] !== null) ? (string) $row[$startcol + 23] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 24; // 24 = AlatPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Alat object", $e);
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

        if ($this->aJenisSarana !== null && $this->jenis_sarana_id !== $this->aJenisSarana->getJenisSaranaId()) {
            $this->aJenisSarana = null;
        }
        if ($this->aSekolah !== null && $this->sekolah_id !== $this->aSekolah->getSekolahId()) {
            $this->aSekolah = null;
        }
        if ($this->aPtk !== null && $this->ptk_id !== $this->aPtk->getPtkId()) {
            $this->aPtk = null;
        }
        if ($this->aRuang !== null && $this->id_ruang !== $this->aRuang->getIdRuang()) {
            $this->aRuang = null;
        }
        if ($this->aJenisHapusBuku !== null && $this->id_hapus_buku !== $this->aJenisHapusBuku->getIdHapusBuku()) {
            $this->aJenisHapusBuku = null;
        }
        if ($this->aStatusKepemilikanSarpras !== null && $this->kepemilikan_sarpras_id !== $this->aStatusKepemilikanSarpras->getKepemilikanSarprasId()) {
            $this->aStatusKepemilikanSarpras = null;
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
            $con = Propel::getConnection(AlatPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = AlatPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aPtk = null;
            $this->aRuang = null;
            $this->aJenisHapusBuku = null;
            $this->aJenisSarana = null;
            $this->aStatusKepemilikanSarpras = null;
            $this->aSekolah = null;
            $this->collAlatDariBlockgrants = null;

            $this->collAlatLongitudinals = null;

            $this->collVldAlats = null;

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
            $con = Propel::getConnection(AlatPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = AlatQuery::create()
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
            $con = Propel::getConnection(AlatPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                AlatPeer::addInstanceToPool($this);
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

            if ($this->aRuang !== null) {
                if ($this->aRuang->isModified() || $this->aRuang->isNew()) {
                    $affectedRows += $this->aRuang->save($con);
                }
                $this->setRuang($this->aRuang);
            }

            if ($this->aJenisHapusBuku !== null) {
                if ($this->aJenisHapusBuku->isModified() || $this->aJenisHapusBuku->isNew()) {
                    $affectedRows += $this->aJenisHapusBuku->save($con);
                }
                $this->setJenisHapusBuku($this->aJenisHapusBuku);
            }

            if ($this->aJenisSarana !== null) {
                if ($this->aJenisSarana->isModified() || $this->aJenisSarana->isNew()) {
                    $affectedRows += $this->aJenisSarana->save($con);
                }
                $this->setJenisSarana($this->aJenisSarana);
            }

            if ($this->aStatusKepemilikanSarpras !== null) {
                if ($this->aStatusKepemilikanSarpras->isModified() || $this->aStatusKepemilikanSarpras->isNew()) {
                    $affectedRows += $this->aStatusKepemilikanSarpras->save($con);
                }
                $this->setStatusKepemilikanSarpras($this->aStatusKepemilikanSarpras);
            }

            if ($this->aSekolah !== null) {
                if ($this->aSekolah->isModified() || $this->aSekolah->isNew()) {
                    $affectedRows += $this->aSekolah->save($con);
                }
                $this->setSekolah($this->aSekolah);
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

            if ($this->alatDariBlockgrantsScheduledForDeletion !== null) {
                if (!$this->alatDariBlockgrantsScheduledForDeletion->isEmpty()) {
                    AlatDariBlockgrantQuery::create()
                        ->filterByPrimaryKeys($this->alatDariBlockgrantsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->alatDariBlockgrantsScheduledForDeletion = null;
                }
            }

            if ($this->collAlatDariBlockgrants !== null) {
                foreach ($this->collAlatDariBlockgrants as $referrerFK) {
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

            if ($this->vldAlatsScheduledForDeletion !== null) {
                if (!$this->vldAlatsScheduledForDeletion->isEmpty()) {
                    VldAlatQuery::create()
                        ->filterByPrimaryKeys($this->vldAlatsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->vldAlatsScheduledForDeletion = null;
                }
            }

            if ($this->collVldAlats !== null) {
                foreach ($this->collVldAlats as $referrerFK) {
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
        if ($this->isColumnModified(AlatPeer::ID_ALAT)) {
            $modifiedColumns[':p' . $index++]  = '"id_alat"';
        }
        if ($this->isColumnModified(AlatPeer::JENIS_SARANA_ID)) {
            $modifiedColumns[':p' . $index++]  = '"jenis_sarana_id"';
        }
        if ($this->isColumnModified(AlatPeer::SEKOLAH_ID)) {
            $modifiedColumns[':p' . $index++]  = '"sekolah_id"';
        }
        if ($this->isColumnModified(AlatPeer::PTK_ID)) {
            $modifiedColumns[':p' . $index++]  = '"ptk_id"';
        }
        if ($this->isColumnModified(AlatPeer::ID_RUANG)) {
            $modifiedColumns[':p' . $index++]  = '"id_ruang"';
        }
        if ($this->isColumnModified(AlatPeer::ID_HAPUS_BUKU)) {
            $modifiedColumns[':p' . $index++]  = '"id_hapus_buku"';
        }
        if ($this->isColumnModified(AlatPeer::KEPEMILIKAN_SARPRAS_ID)) {
            $modifiedColumns[':p' . $index++]  = '"kepemilikan_sarpras_id"';
        }
        if ($this->isColumnModified(AlatPeer::KD_KL)) {
            $modifiedColumns[':p' . $index++]  = '"kd_kl"';
        }
        if ($this->isColumnModified(AlatPeer::KD_SATKER)) {
            $modifiedColumns[':p' . $index++]  = '"kd_satker"';
        }
        if ($this->isColumnModified(AlatPeer::KD_BRG)) {
            $modifiedColumns[':p' . $index++]  = '"kd_brg"';
        }
        if ($this->isColumnModified(AlatPeer::NUP)) {
            $modifiedColumns[':p' . $index++]  = '"nup"';
        }
        if ($this->isColumnModified(AlatPeer::KODE_ESELON1)) {
            $modifiedColumns[':p' . $index++]  = '"kode_eselon1"';
        }
        if ($this->isColumnModified(AlatPeer::NAMA_ESELON1)) {
            $modifiedColumns[':p' . $index++]  = '"nama_eselon1"';
        }
        if ($this->isColumnModified(AlatPeer::KODE_SUB_SATKER)) {
            $modifiedColumns[':p' . $index++]  = '"kode_sub_satker"';
        }
        if ($this->isColumnModified(AlatPeer::NAMA_SUB_SATKER)) {
            $modifiedColumns[':p' . $index++]  = '"nama_sub_satker"';
        }
        if ($this->isColumnModified(AlatPeer::NAMA)) {
            $modifiedColumns[':p' . $index++]  = '"nama"';
        }
        if ($this->isColumnModified(AlatPeer::SPESIFIKASI)) {
            $modifiedColumns[':p' . $index++]  = '"spesifikasi"';
        }
        if ($this->isColumnModified(AlatPeer::TGL_HAPUS_BUKU)) {
            $modifiedColumns[':p' . $index++]  = '"tgl_hapus_buku"';
        }
        if ($this->isColumnModified(AlatPeer::ASAL_DATA)) {
            $modifiedColumns[':p' . $index++]  = '"asal_data"';
        }
        if ($this->isColumnModified(AlatPeer::CREATE_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"create_date"';
        }
        if ($this->isColumnModified(AlatPeer::LAST_UPDATE)) {
            $modifiedColumns[':p' . $index++]  = '"last_update"';
        }
        if ($this->isColumnModified(AlatPeer::SOFT_DELETE)) {
            $modifiedColumns[':p' . $index++]  = '"soft_delete"';
        }
        if ($this->isColumnModified(AlatPeer::LAST_SYNC)) {
            $modifiedColumns[':p' . $index++]  = '"last_sync"';
        }
        if ($this->isColumnModified(AlatPeer::UPDATER_ID)) {
            $modifiedColumns[':p' . $index++]  = '"updater_id"';
        }

        $sql = sprintf(
            'INSERT INTO "alat" (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '"id_alat"':						
                        $stmt->bindValue($identifier, $this->id_alat, PDO::PARAM_STR);
                        break;
                    case '"jenis_sarana_id"':						
                        $stmt->bindValue($identifier, $this->jenis_sarana_id, PDO::PARAM_INT);
                        break;
                    case '"sekolah_id"':						
                        $stmt->bindValue($identifier, $this->sekolah_id, PDO::PARAM_STR);
                        break;
                    case '"ptk_id"':						
                        $stmt->bindValue($identifier, $this->ptk_id, PDO::PARAM_STR);
                        break;
                    case '"id_ruang"':						
                        $stmt->bindValue($identifier, $this->id_ruang, PDO::PARAM_STR);
                        break;
                    case '"id_hapus_buku"':						
                        $stmt->bindValue($identifier, $this->id_hapus_buku, PDO::PARAM_STR);
                        break;
                    case '"kepemilikan_sarpras_id"':						
                        $stmt->bindValue($identifier, $this->kepemilikan_sarpras_id, PDO::PARAM_STR);
                        break;
                    case '"kd_kl"':						
                        $stmt->bindValue($identifier, $this->kd_kl, PDO::PARAM_STR);
                        break;
                    case '"kd_satker"':						
                        $stmt->bindValue($identifier, $this->kd_satker, PDO::PARAM_STR);
                        break;
                    case '"kd_brg"':						
                        $stmt->bindValue($identifier, $this->kd_brg, PDO::PARAM_STR);
                        break;
                    case '"nup"':						
                        $stmt->bindValue($identifier, $this->nup, PDO::PARAM_INT);
                        break;
                    case '"kode_eselon1"':						
                        $stmt->bindValue($identifier, $this->kode_eselon1, PDO::PARAM_STR);
                        break;
                    case '"nama_eselon1"':						
                        $stmt->bindValue($identifier, $this->nama_eselon1, PDO::PARAM_STR);
                        break;
                    case '"kode_sub_satker"':						
                        $stmt->bindValue($identifier, $this->kode_sub_satker, PDO::PARAM_STR);
                        break;
                    case '"nama_sub_satker"':						
                        $stmt->bindValue($identifier, $this->nama_sub_satker, PDO::PARAM_STR);
                        break;
                    case '"nama"':						
                        $stmt->bindValue($identifier, $this->nama, PDO::PARAM_STR);
                        break;
                    case '"spesifikasi"':						
                        $stmt->bindValue($identifier, $this->spesifikasi, PDO::PARAM_STR);
                        break;
                    case '"tgl_hapus_buku"':						
                        $stmt->bindValue($identifier, $this->tgl_hapus_buku, PDO::PARAM_STR);
                        break;
                    case '"asal_data"':						
                        $stmt->bindValue($identifier, $this->asal_data, PDO::PARAM_STR);
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

            if ($this->aRuang !== null) {
                if (!$this->aRuang->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aRuang->getValidationFailures());
                }
            }

            if ($this->aJenisHapusBuku !== null) {
                if (!$this->aJenisHapusBuku->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aJenisHapusBuku->getValidationFailures());
                }
            }

            if ($this->aJenisSarana !== null) {
                if (!$this->aJenisSarana->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aJenisSarana->getValidationFailures());
                }
            }

            if ($this->aStatusKepemilikanSarpras !== null) {
                if (!$this->aStatusKepemilikanSarpras->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aStatusKepemilikanSarpras->getValidationFailures());
                }
            }

            if ($this->aSekolah !== null) {
                if (!$this->aSekolah->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aSekolah->getValidationFailures());
                }
            }


            if (($retval = AlatPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collAlatDariBlockgrants !== null) {
                    foreach ($this->collAlatDariBlockgrants as $referrerFK) {
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

                if ($this->collVldAlats !== null) {
                    foreach ($this->collVldAlats as $referrerFK) {
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
        $pos = AlatPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdAlat();
                break;
            case 1:
                return $this->getJenisSaranaId();
                break;
            case 2:
                return $this->getSekolahId();
                break;
            case 3:
                return $this->getPtkId();
                break;
            case 4:
                return $this->getIdRuang();
                break;
            case 5:
                return $this->getIdHapusBuku();
                break;
            case 6:
                return $this->getKepemilikanSarprasId();
                break;
            case 7:
                return $this->getKdKl();
                break;
            case 8:
                return $this->getKdSatker();
                break;
            case 9:
                return $this->getKdBrg();
                break;
            case 10:
                return $this->getNup();
                break;
            case 11:
                return $this->getKodeEselon1();
                break;
            case 12:
                return $this->getNamaEselon1();
                break;
            case 13:
                return $this->getKodeSubSatker();
                break;
            case 14:
                return $this->getNamaSubSatker();
                break;
            case 15:
                return $this->getNama();
                break;
            case 16:
                return $this->getSpesifikasi();
                break;
            case 17:
                return $this->getTglHapusBuku();
                break;
            case 18:
                return $this->getAsalData();
                break;
            case 19:
                return $this->getCreateDate();
                break;
            case 20:
                return $this->getLastUpdate();
                break;
            case 21:
                return $this->getSoftDelete();
                break;
            case 22:
                return $this->getLastSync();
                break;
            case 23:
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
        if (isset($alreadyDumpedObjects['Alat'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Alat'][$this->getPrimaryKey()] = true;
        $keys = AlatPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdAlat(),
            $keys[1] => $this->getJenisSaranaId(),
            $keys[2] => $this->getSekolahId(),
            $keys[3] => $this->getPtkId(),
            $keys[4] => $this->getIdRuang(),
            $keys[5] => $this->getIdHapusBuku(),
            $keys[6] => $this->getKepemilikanSarprasId(),
            $keys[7] => $this->getKdKl(),
            $keys[8] => $this->getKdSatker(),
            $keys[9] => $this->getKdBrg(),
            $keys[10] => $this->getNup(),
            $keys[11] => $this->getKodeEselon1(),
            $keys[12] => $this->getNamaEselon1(),
            $keys[13] => $this->getKodeSubSatker(),
            $keys[14] => $this->getNamaSubSatker(),
            $keys[15] => $this->getNama(),
            $keys[16] => $this->getSpesifikasi(),
            $keys[17] => $this->getTglHapusBuku(),
            $keys[18] => $this->getAsalData(),
            $keys[19] => $this->getCreateDate(),
            $keys[20] => $this->getLastUpdate(),
            $keys[21] => $this->getSoftDelete(),
            $keys[22] => $this->getLastSync(),
            $keys[23] => $this->getUpdaterId(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aPtk) {
                $result['Ptk'] = $this->aPtk->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aRuang) {
                $result['Ruang'] = $this->aRuang->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aJenisHapusBuku) {
                $result['JenisHapusBuku'] = $this->aJenisHapusBuku->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aJenisSarana) {
                $result['JenisSarana'] = $this->aJenisSarana->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aStatusKepemilikanSarpras) {
                $result['StatusKepemilikanSarpras'] = $this->aStatusKepemilikanSarpras->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aSekolah) {
                $result['Sekolah'] = $this->aSekolah->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collAlatDariBlockgrants) {
                $result['AlatDariBlockgrants'] = $this->collAlatDariBlockgrants->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collAlatLongitudinals) {
                $result['AlatLongitudinals'] = $this->collAlatLongitudinals->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collVldAlats) {
                $result['VldAlats'] = $this->collVldAlats->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = AlatPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdAlat($value);
                break;
            case 1:
                $this->setJenisSaranaId($value);
                break;
            case 2:
                $this->setSekolahId($value);
                break;
            case 3:
                $this->setPtkId($value);
                break;
            case 4:
                $this->setIdRuang($value);
                break;
            case 5:
                $this->setIdHapusBuku($value);
                break;
            case 6:
                $this->setKepemilikanSarprasId($value);
                break;
            case 7:
                $this->setKdKl($value);
                break;
            case 8:
                $this->setKdSatker($value);
                break;
            case 9:
                $this->setKdBrg($value);
                break;
            case 10:
                $this->setNup($value);
                break;
            case 11:
                $this->setKodeEselon1($value);
                break;
            case 12:
                $this->setNamaEselon1($value);
                break;
            case 13:
                $this->setKodeSubSatker($value);
                break;
            case 14:
                $this->setNamaSubSatker($value);
                break;
            case 15:
                $this->setNama($value);
                break;
            case 16:
                $this->setSpesifikasi($value);
                break;
            case 17:
                $this->setTglHapusBuku($value);
                break;
            case 18:
                $this->setAsalData($value);
                break;
            case 19:
                $this->setCreateDate($value);
                break;
            case 20:
                $this->setLastUpdate($value);
                break;
            case 21:
                $this->setSoftDelete($value);
                break;
            case 22:
                $this->setLastSync($value);
                break;
            case 23:
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
        $keys = AlatPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdAlat($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setJenisSaranaId($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setSekolahId($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setPtkId($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setIdRuang($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setIdHapusBuku($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setKepemilikanSarprasId($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setKdKl($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setKdSatker($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setKdBrg($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setNup($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setKodeEselon1($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setNamaEselon1($arr[$keys[12]]);
        if (array_key_exists($keys[13], $arr)) $this->setKodeSubSatker($arr[$keys[13]]);
        if (array_key_exists($keys[14], $arr)) $this->setNamaSubSatker($arr[$keys[14]]);
        if (array_key_exists($keys[15], $arr)) $this->setNama($arr[$keys[15]]);
        if (array_key_exists($keys[16], $arr)) $this->setSpesifikasi($arr[$keys[16]]);
        if (array_key_exists($keys[17], $arr)) $this->setTglHapusBuku($arr[$keys[17]]);
        if (array_key_exists($keys[18], $arr)) $this->setAsalData($arr[$keys[18]]);
        if (array_key_exists($keys[19], $arr)) $this->setCreateDate($arr[$keys[19]]);
        if (array_key_exists($keys[20], $arr)) $this->setLastUpdate($arr[$keys[20]]);
        if (array_key_exists($keys[21], $arr)) $this->setSoftDelete($arr[$keys[21]]);
        if (array_key_exists($keys[22], $arr)) $this->setLastSync($arr[$keys[22]]);
        if (array_key_exists($keys[23], $arr)) $this->setUpdaterId($arr[$keys[23]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(AlatPeer::DATABASE_NAME);

        if ($this->isColumnModified(AlatPeer::ID_ALAT)) $criteria->add(AlatPeer::ID_ALAT, $this->id_alat);
        if ($this->isColumnModified(AlatPeer::JENIS_SARANA_ID)) $criteria->add(AlatPeer::JENIS_SARANA_ID, $this->jenis_sarana_id);
        if ($this->isColumnModified(AlatPeer::SEKOLAH_ID)) $criteria->add(AlatPeer::SEKOLAH_ID, $this->sekolah_id);
        if ($this->isColumnModified(AlatPeer::PTK_ID)) $criteria->add(AlatPeer::PTK_ID, $this->ptk_id);
        if ($this->isColumnModified(AlatPeer::ID_RUANG)) $criteria->add(AlatPeer::ID_RUANG, $this->id_ruang);
        if ($this->isColumnModified(AlatPeer::ID_HAPUS_BUKU)) $criteria->add(AlatPeer::ID_HAPUS_BUKU, $this->id_hapus_buku);
        if ($this->isColumnModified(AlatPeer::KEPEMILIKAN_SARPRAS_ID)) $criteria->add(AlatPeer::KEPEMILIKAN_SARPRAS_ID, $this->kepemilikan_sarpras_id);
        if ($this->isColumnModified(AlatPeer::KD_KL)) $criteria->add(AlatPeer::KD_KL, $this->kd_kl);
        if ($this->isColumnModified(AlatPeer::KD_SATKER)) $criteria->add(AlatPeer::KD_SATKER, $this->kd_satker);
        if ($this->isColumnModified(AlatPeer::KD_BRG)) $criteria->add(AlatPeer::KD_BRG, $this->kd_brg);
        if ($this->isColumnModified(AlatPeer::NUP)) $criteria->add(AlatPeer::NUP, $this->nup);
        if ($this->isColumnModified(AlatPeer::KODE_ESELON1)) $criteria->add(AlatPeer::KODE_ESELON1, $this->kode_eselon1);
        if ($this->isColumnModified(AlatPeer::NAMA_ESELON1)) $criteria->add(AlatPeer::NAMA_ESELON1, $this->nama_eselon1);
        if ($this->isColumnModified(AlatPeer::KODE_SUB_SATKER)) $criteria->add(AlatPeer::KODE_SUB_SATKER, $this->kode_sub_satker);
        if ($this->isColumnModified(AlatPeer::NAMA_SUB_SATKER)) $criteria->add(AlatPeer::NAMA_SUB_SATKER, $this->nama_sub_satker);
        if ($this->isColumnModified(AlatPeer::NAMA)) $criteria->add(AlatPeer::NAMA, $this->nama);
        if ($this->isColumnModified(AlatPeer::SPESIFIKASI)) $criteria->add(AlatPeer::SPESIFIKASI, $this->spesifikasi);
        if ($this->isColumnModified(AlatPeer::TGL_HAPUS_BUKU)) $criteria->add(AlatPeer::TGL_HAPUS_BUKU, $this->tgl_hapus_buku);
        if ($this->isColumnModified(AlatPeer::ASAL_DATA)) $criteria->add(AlatPeer::ASAL_DATA, $this->asal_data);
        if ($this->isColumnModified(AlatPeer::CREATE_DATE)) $criteria->add(AlatPeer::CREATE_DATE, $this->create_date);
        if ($this->isColumnModified(AlatPeer::LAST_UPDATE)) $criteria->add(AlatPeer::LAST_UPDATE, $this->last_update);
        if ($this->isColumnModified(AlatPeer::SOFT_DELETE)) $criteria->add(AlatPeer::SOFT_DELETE, $this->soft_delete);
        if ($this->isColumnModified(AlatPeer::LAST_SYNC)) $criteria->add(AlatPeer::LAST_SYNC, $this->last_sync);
        if ($this->isColumnModified(AlatPeer::UPDATER_ID)) $criteria->add(AlatPeer::UPDATER_ID, $this->updater_id);

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
        $criteria = new Criteria(AlatPeer::DATABASE_NAME);
        $criteria->add(AlatPeer::ID_ALAT, $this->id_alat);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return string
     */
    public function getPrimaryKey()
    {
        return $this->getIdAlat();
    }

    /**
     * Generic method to set the primary key (id_alat column).
     *
     * @param  string $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdAlat($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdAlat();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of Alat (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setJenisSaranaId($this->getJenisSaranaId());
        $copyObj->setSekolahId($this->getSekolahId());
        $copyObj->setPtkId($this->getPtkId());
        $copyObj->setIdRuang($this->getIdRuang());
        $copyObj->setIdHapusBuku($this->getIdHapusBuku());
        $copyObj->setKepemilikanSarprasId($this->getKepemilikanSarprasId());
        $copyObj->setKdKl($this->getKdKl());
        $copyObj->setKdSatker($this->getKdSatker());
        $copyObj->setKdBrg($this->getKdBrg());
        $copyObj->setNup($this->getNup());
        $copyObj->setKodeEselon1($this->getKodeEselon1());
        $copyObj->setNamaEselon1($this->getNamaEselon1());
        $copyObj->setKodeSubSatker($this->getKodeSubSatker());
        $copyObj->setNamaSubSatker($this->getNamaSubSatker());
        $copyObj->setNama($this->getNama());
        $copyObj->setSpesifikasi($this->getSpesifikasi());
        $copyObj->setTglHapusBuku($this->getTglHapusBuku());
        $copyObj->setAsalData($this->getAsalData());
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

            foreach ($this->getAlatDariBlockgrants() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addAlatDariBlockgrant($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getAlatLongitudinals() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addAlatLongitudinal($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getVldAlats() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addVldAlat($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdAlat(NULL); // this is a auto-increment column, so set to default value
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
     * @return Alat Clone of current object.
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
     * @return AlatPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new AlatPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Ptk object.
     *
     * @param             Ptk $v
     * @return Alat The current object (for fluent API support)
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
            $v->addAlat($this);
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
                $this->aPtk->addAlats($this);
             */
        }

        return $this->aPtk;
    }

    /**
     * Declares an association between this object and a Ruang object.
     *
     * @param             Ruang $v
     * @return Alat The current object (for fluent API support)
     * @throws PropelException
     */
    public function setRuang(Ruang $v = null)
    {
        if ($v === null) {
            $this->setIdRuang(NULL);
        } else {
            $this->setIdRuang($v->getIdRuang());
        }

        $this->aRuang = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Ruang object, it will not be re-added.
        if ($v !== null) {
            $v->addAlat($this);
        }


        return $this;
    }


    /**
     * Get the associated Ruang object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Ruang The associated Ruang object.
     * @throws PropelException
     */
    public function getRuang(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aRuang === null && (($this->id_ruang !== "" && $this->id_ruang !== null)) && $doQuery) {
            $this->aRuang = RuangQuery::create()->findPk($this->id_ruang, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aRuang->addAlats($this);
             */
        }

        return $this->aRuang;
    }

    /**
     * Declares an association between this object and a JenisHapusBuku object.
     *
     * @param             JenisHapusBuku $v
     * @return Alat The current object (for fluent API support)
     * @throws PropelException
     */
    public function setJenisHapusBuku(JenisHapusBuku $v = null)
    {
        if ($v === null) {
            $this->setIdHapusBuku(NULL);
        } else {
            $this->setIdHapusBuku($v->getIdHapusBuku());
        }

        $this->aJenisHapusBuku = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the JenisHapusBuku object, it will not be re-added.
        if ($v !== null) {
            $v->addAlat($this);
        }


        return $this;
    }


    /**
     * Get the associated JenisHapusBuku object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return JenisHapusBuku The associated JenisHapusBuku object.
     * @throws PropelException
     */
    public function getJenisHapusBuku(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aJenisHapusBuku === null && (($this->id_hapus_buku !== "" && $this->id_hapus_buku !== null)) && $doQuery) {
            $this->aJenisHapusBuku = JenisHapusBukuQuery::create()->findPk($this->id_hapus_buku, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aJenisHapusBuku->addAlats($this);
             */
        }

        return $this->aJenisHapusBuku;
    }

    /**
     * Declares an association between this object and a JenisSarana object.
     *
     * @param             JenisSarana $v
     * @return Alat The current object (for fluent API support)
     * @throws PropelException
     */
    public function setJenisSarana(JenisSarana $v = null)
    {
        if ($v === null) {
            $this->setJenisSaranaId(NULL);
        } else {
            $this->setJenisSaranaId($v->getJenisSaranaId());
        }

        $this->aJenisSarana = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the JenisSarana object, it will not be re-added.
        if ($v !== null) {
            $v->addAlat($this);
        }


        return $this;
    }


    /**
     * Get the associated JenisSarana object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return JenisSarana The associated JenisSarana object.
     * @throws PropelException
     */
    public function getJenisSarana(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aJenisSarana === null && ($this->jenis_sarana_id !== null) && $doQuery) {
            $this->aJenisSarana = JenisSaranaQuery::create()->findPk($this->jenis_sarana_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aJenisSarana->addAlats($this);
             */
        }

        return $this->aJenisSarana;
    }

    /**
     * Declares an association between this object and a StatusKepemilikanSarpras object.
     *
     * @param             StatusKepemilikanSarpras $v
     * @return Alat The current object (for fluent API support)
     * @throws PropelException
     */
    public function setStatusKepemilikanSarpras(StatusKepemilikanSarpras $v = null)
    {
        if ($v === null) {
            $this->setKepemilikanSarprasId(NULL);
        } else {
            $this->setKepemilikanSarprasId($v->getKepemilikanSarprasId());
        }

        $this->aStatusKepemilikanSarpras = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the StatusKepemilikanSarpras object, it will not be re-added.
        if ($v !== null) {
            $v->addAlat($this);
        }


        return $this;
    }


    /**
     * Get the associated StatusKepemilikanSarpras object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return StatusKepemilikanSarpras The associated StatusKepemilikanSarpras object.
     * @throws PropelException
     */
    public function getStatusKepemilikanSarpras(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aStatusKepemilikanSarpras === null && (($this->kepemilikan_sarpras_id !== "" && $this->kepemilikan_sarpras_id !== null)) && $doQuery) {
            $this->aStatusKepemilikanSarpras = StatusKepemilikanSarprasQuery::create()->findPk($this->kepemilikan_sarpras_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aStatusKepemilikanSarpras->addAlats($this);
             */
        }

        return $this->aStatusKepemilikanSarpras;
    }

    /**
     * Declares an association between this object and a Sekolah object.
     *
     * @param             Sekolah $v
     * @return Alat The current object (for fluent API support)
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
            $v->addAlat($this);
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
                $this->aSekolah->addAlats($this);
             */
        }

        return $this->aSekolah;
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
        if ('AlatDariBlockgrant' == $relationName) {
            $this->initAlatDariBlockgrants();
        }
        if ('AlatLongitudinal' == $relationName) {
            $this->initAlatLongitudinals();
        }
        if ('VldAlat' == $relationName) {
            $this->initVldAlats();
        }
    }

    /**
     * Clears out the collAlatDariBlockgrants collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Alat The current object (for fluent API support)
     * @see        addAlatDariBlockgrants()
     */
    public function clearAlatDariBlockgrants()
    {
        $this->collAlatDariBlockgrants = null; // important to set this to null since that means it is uninitialized
        $this->collAlatDariBlockgrantsPartial = null;

        return $this;
    }

    /**
     * reset is the collAlatDariBlockgrants collection loaded partially
     *
     * @return void
     */
    public function resetPartialAlatDariBlockgrants($v = true)
    {
        $this->collAlatDariBlockgrantsPartial = $v;
    }

    /**
     * Initializes the collAlatDariBlockgrants collection.
     *
     * By default this just sets the collAlatDariBlockgrants collection to an empty array (like clearcollAlatDariBlockgrants());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initAlatDariBlockgrants($overrideExisting = true)
    {
        if (null !== $this->collAlatDariBlockgrants && !$overrideExisting) {
            return;
        }
        $this->collAlatDariBlockgrants = new PropelObjectCollection();
        $this->collAlatDariBlockgrants->setModel('AlatDariBlockgrant');
    }

    /**
     * Gets an array of AlatDariBlockgrant objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Alat is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|AlatDariBlockgrant[] List of AlatDariBlockgrant objects
     * @throws PropelException
     */
    public function getAlatDariBlockgrants($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collAlatDariBlockgrantsPartial && !$this->isNew();
        if (null === $this->collAlatDariBlockgrants || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collAlatDariBlockgrants) {
                // return empty collection
                $this->initAlatDariBlockgrants();
            } else {
                $collAlatDariBlockgrants = AlatDariBlockgrantQuery::create(null, $criteria)
                    ->filterByAlat($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collAlatDariBlockgrantsPartial && count($collAlatDariBlockgrants)) {
                      $this->initAlatDariBlockgrants(false);

                      foreach($collAlatDariBlockgrants as $obj) {
                        if (false == $this->collAlatDariBlockgrants->contains($obj)) {
                          $this->collAlatDariBlockgrants->append($obj);
                        }
                      }

                      $this->collAlatDariBlockgrantsPartial = true;
                    }

                    $collAlatDariBlockgrants->getInternalIterator()->rewind();
                    return $collAlatDariBlockgrants;
                }

                if($partial && $this->collAlatDariBlockgrants) {
                    foreach($this->collAlatDariBlockgrants as $obj) {
                        if($obj->isNew()) {
                            $collAlatDariBlockgrants[] = $obj;
                        }
                    }
                }

                $this->collAlatDariBlockgrants = $collAlatDariBlockgrants;
                $this->collAlatDariBlockgrantsPartial = false;
            }
        }

        return $this->collAlatDariBlockgrants;
    }

    /**
     * Sets a collection of AlatDariBlockgrant objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $alatDariBlockgrants A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Alat The current object (for fluent API support)
     */
    public function setAlatDariBlockgrants(PropelCollection $alatDariBlockgrants, PropelPDO $con = null)
    {
        $alatDariBlockgrantsToDelete = $this->getAlatDariBlockgrants(new Criteria(), $con)->diff($alatDariBlockgrants);

        $this->alatDariBlockgrantsScheduledForDeletion = unserialize(serialize($alatDariBlockgrantsToDelete));

        foreach ($alatDariBlockgrantsToDelete as $alatDariBlockgrantRemoved) {
            $alatDariBlockgrantRemoved->setAlat(null);
        }

        $this->collAlatDariBlockgrants = null;
        foreach ($alatDariBlockgrants as $alatDariBlockgrant) {
            $this->addAlatDariBlockgrant($alatDariBlockgrant);
        }

        $this->collAlatDariBlockgrants = $alatDariBlockgrants;
        $this->collAlatDariBlockgrantsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related AlatDariBlockgrant objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related AlatDariBlockgrant objects.
     * @throws PropelException
     */
    public function countAlatDariBlockgrants(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collAlatDariBlockgrantsPartial && !$this->isNew();
        if (null === $this->collAlatDariBlockgrants || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collAlatDariBlockgrants) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getAlatDariBlockgrants());
            }
            $query = AlatDariBlockgrantQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByAlat($this)
                ->count($con);
        }

        return count($this->collAlatDariBlockgrants);
    }

    /**
     * Method called to associate a AlatDariBlockgrant object to this object
     * through the AlatDariBlockgrant foreign key attribute.
     *
     * @param    AlatDariBlockgrant $l AlatDariBlockgrant
     * @return Alat The current object (for fluent API support)
     */
    public function addAlatDariBlockgrant(AlatDariBlockgrant $l)
    {
        if ($this->collAlatDariBlockgrants === null) {
            $this->initAlatDariBlockgrants();
            $this->collAlatDariBlockgrantsPartial = true;
        }
        if (!in_array($l, $this->collAlatDariBlockgrants->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddAlatDariBlockgrant($l);
        }

        return $this;
    }

    /**
     * @param	AlatDariBlockgrant $alatDariBlockgrant The alatDariBlockgrant object to add.
     */
    protected function doAddAlatDariBlockgrant($alatDariBlockgrant)
    {
        $this->collAlatDariBlockgrants[]= $alatDariBlockgrant;
        $alatDariBlockgrant->setAlat($this);
    }

    /**
     * @param	AlatDariBlockgrant $alatDariBlockgrant The alatDariBlockgrant object to remove.
     * @return Alat The current object (for fluent API support)
     */
    public function removeAlatDariBlockgrant($alatDariBlockgrant)
    {
        if ($this->getAlatDariBlockgrants()->contains($alatDariBlockgrant)) {
            $this->collAlatDariBlockgrants->remove($this->collAlatDariBlockgrants->search($alatDariBlockgrant));
            if (null === $this->alatDariBlockgrantsScheduledForDeletion) {
                $this->alatDariBlockgrantsScheduledForDeletion = clone $this->collAlatDariBlockgrants;
                $this->alatDariBlockgrantsScheduledForDeletion->clear();
            }
            $this->alatDariBlockgrantsScheduledForDeletion[]= clone $alatDariBlockgrant;
            $alatDariBlockgrant->setAlat(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Alat is new, it will return
     * an empty collection; or if this Alat has previously
     * been saved, it will retrieve related AlatDariBlockgrants from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Alat.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|AlatDariBlockgrant[] List of AlatDariBlockgrant objects
     */
    public function getAlatDariBlockgrantsJoinBlockgrant($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = AlatDariBlockgrantQuery::create(null, $criteria);
        $query->joinWith('Blockgrant', $join_behavior);

        return $this->getAlatDariBlockgrants($query, $con);
    }

    /**
     * Clears out the collAlatLongitudinals collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Alat The current object (for fluent API support)
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
     * If this Alat is new, it will return
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
                    ->filterByAlat($this)
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
     * @return Alat The current object (for fluent API support)
     */
    public function setAlatLongitudinals(PropelCollection $alatLongitudinals, PropelPDO $con = null)
    {
        $alatLongitudinalsToDelete = $this->getAlatLongitudinals(new Criteria(), $con)->diff($alatLongitudinals);

        $this->alatLongitudinalsScheduledForDeletion = unserialize(serialize($alatLongitudinalsToDelete));

        foreach ($alatLongitudinalsToDelete as $alatLongitudinalRemoved) {
            $alatLongitudinalRemoved->setAlat(null);
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
                ->filterByAlat($this)
                ->count($con);
        }

        return count($this->collAlatLongitudinals);
    }

    /**
     * Method called to associate a AlatLongitudinal object to this object
     * through the AlatLongitudinal foreign key attribute.
     *
     * @param    AlatLongitudinal $l AlatLongitudinal
     * @return Alat The current object (for fluent API support)
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
        $alatLongitudinal->setAlat($this);
    }

    /**
     * @param	AlatLongitudinal $alatLongitudinal The alatLongitudinal object to remove.
     * @return Alat The current object (for fluent API support)
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
            $alatLongitudinal->setAlat(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Alat is new, it will return
     * an empty collection; or if this Alat has previously
     * been saved, it will retrieve related AlatLongitudinals from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Alat.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|AlatLongitudinal[] List of AlatLongitudinal objects
     */
    public function getAlatLongitudinalsJoinSemester($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = AlatLongitudinalQuery::create(null, $criteria);
        $query->joinWith('Semester', $join_behavior);

        return $this->getAlatLongitudinals($query, $con);
    }

    /**
     * Clears out the collVldAlats collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Alat The current object (for fluent API support)
     * @see        addVldAlats()
     */
    public function clearVldAlats()
    {
        $this->collVldAlats = null; // important to set this to null since that means it is uninitialized
        $this->collVldAlatsPartial = null;

        return $this;
    }

    /**
     * reset is the collVldAlats collection loaded partially
     *
     * @return void
     */
    public function resetPartialVldAlats($v = true)
    {
        $this->collVldAlatsPartial = $v;
    }

    /**
     * Initializes the collVldAlats collection.
     *
     * By default this just sets the collVldAlats collection to an empty array (like clearcollVldAlats());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initVldAlats($overrideExisting = true)
    {
        if (null !== $this->collVldAlats && !$overrideExisting) {
            return;
        }
        $this->collVldAlats = new PropelObjectCollection();
        $this->collVldAlats->setModel('VldAlat');
    }

    /**
     * Gets an array of VldAlat objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Alat is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|VldAlat[] List of VldAlat objects
     * @throws PropelException
     */
    public function getVldAlats($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collVldAlatsPartial && !$this->isNew();
        if (null === $this->collVldAlats || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collVldAlats) {
                // return empty collection
                $this->initVldAlats();
            } else {
                $collVldAlats = VldAlatQuery::create(null, $criteria)
                    ->filterByAlat($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collVldAlatsPartial && count($collVldAlats)) {
                      $this->initVldAlats(false);

                      foreach($collVldAlats as $obj) {
                        if (false == $this->collVldAlats->contains($obj)) {
                          $this->collVldAlats->append($obj);
                        }
                      }

                      $this->collVldAlatsPartial = true;
                    }

                    $collVldAlats->getInternalIterator()->rewind();
                    return $collVldAlats;
                }

                if($partial && $this->collVldAlats) {
                    foreach($this->collVldAlats as $obj) {
                        if($obj->isNew()) {
                            $collVldAlats[] = $obj;
                        }
                    }
                }

                $this->collVldAlats = $collVldAlats;
                $this->collVldAlatsPartial = false;
            }
        }

        return $this->collVldAlats;
    }

    /**
     * Sets a collection of VldAlat objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $vldAlats A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Alat The current object (for fluent API support)
     */
    public function setVldAlats(PropelCollection $vldAlats, PropelPDO $con = null)
    {
        $vldAlatsToDelete = $this->getVldAlats(new Criteria(), $con)->diff($vldAlats);

        $this->vldAlatsScheduledForDeletion = unserialize(serialize($vldAlatsToDelete));

        foreach ($vldAlatsToDelete as $vldAlatRemoved) {
            $vldAlatRemoved->setAlat(null);
        }

        $this->collVldAlats = null;
        foreach ($vldAlats as $vldAlat) {
            $this->addVldAlat($vldAlat);
        }

        $this->collVldAlats = $vldAlats;
        $this->collVldAlatsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related VldAlat objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related VldAlat objects.
     * @throws PropelException
     */
    public function countVldAlats(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collVldAlatsPartial && !$this->isNew();
        if (null === $this->collVldAlats || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collVldAlats) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getVldAlats());
            }
            $query = VldAlatQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByAlat($this)
                ->count($con);
        }

        return count($this->collVldAlats);
    }

    /**
     * Method called to associate a VldAlat object to this object
     * through the VldAlat foreign key attribute.
     *
     * @param    VldAlat $l VldAlat
     * @return Alat The current object (for fluent API support)
     */
    public function addVldAlat(VldAlat $l)
    {
        if ($this->collVldAlats === null) {
            $this->initVldAlats();
            $this->collVldAlatsPartial = true;
        }
        if (!in_array($l, $this->collVldAlats->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddVldAlat($l);
        }

        return $this;
    }

    /**
     * @param	VldAlat $vldAlat The vldAlat object to add.
     */
    protected function doAddVldAlat($vldAlat)
    {
        $this->collVldAlats[]= $vldAlat;
        $vldAlat->setAlat($this);
    }

    /**
     * @param	VldAlat $vldAlat The vldAlat object to remove.
     * @return Alat The current object (for fluent API support)
     */
    public function removeVldAlat($vldAlat)
    {
        if ($this->getVldAlats()->contains($vldAlat)) {
            $this->collVldAlats->remove($this->collVldAlats->search($vldAlat));
            if (null === $this->vldAlatsScheduledForDeletion) {
                $this->vldAlatsScheduledForDeletion = clone $this->collVldAlats;
                $this->vldAlatsScheduledForDeletion->clear();
            }
            $this->vldAlatsScheduledForDeletion[]= clone $vldAlat;
            $vldAlat->setAlat(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Alat is new, it will return
     * an empty collection; or if this Alat has previously
     * been saved, it will retrieve related VldAlats from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Alat.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|VldAlat[] List of VldAlat objects
     */
    public function getVldAlatsJoinErrortype($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = VldAlatQuery::create(null, $criteria);
        $query->joinWith('Errortype', $join_behavior);

        return $this->getVldAlats($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id_alat = null;
        $this->jenis_sarana_id = null;
        $this->sekolah_id = null;
        $this->ptk_id = null;
        $this->id_ruang = null;
        $this->id_hapus_buku = null;
        $this->kepemilikan_sarpras_id = null;
        $this->kd_kl = null;
        $this->kd_satker = null;
        $this->kd_brg = null;
        $this->nup = null;
        $this->kode_eselon1 = null;
        $this->nama_eselon1 = null;
        $this->kode_sub_satker = null;
        $this->nama_sub_satker = null;
        $this->nama = null;
        $this->spesifikasi = null;
        $this->tgl_hapus_buku = null;
        $this->asal_data = null;
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
            if ($this->collAlatDariBlockgrants) {
                foreach ($this->collAlatDariBlockgrants as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collAlatLongitudinals) {
                foreach ($this->collAlatLongitudinals as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collVldAlats) {
                foreach ($this->collVldAlats as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aPtk instanceof Persistent) {
              $this->aPtk->clearAllReferences($deep);
            }
            if ($this->aRuang instanceof Persistent) {
              $this->aRuang->clearAllReferences($deep);
            }
            if ($this->aJenisHapusBuku instanceof Persistent) {
              $this->aJenisHapusBuku->clearAllReferences($deep);
            }
            if ($this->aJenisSarana instanceof Persistent) {
              $this->aJenisSarana->clearAllReferences($deep);
            }
            if ($this->aStatusKepemilikanSarpras instanceof Persistent) {
              $this->aStatusKepemilikanSarpras->clearAllReferences($deep);
            }
            if ($this->aSekolah instanceof Persistent) {
              $this->aSekolah->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collAlatDariBlockgrants instanceof PropelCollection) {
            $this->collAlatDariBlockgrants->clearIterator();
        }
        $this->collAlatDariBlockgrants = null;
        if ($this->collAlatLongitudinals instanceof PropelCollection) {
            $this->collAlatLongitudinals->clearIterator();
        }
        $this->collAlatLongitudinals = null;
        if ($this->collVldAlats instanceof PropelCollection) {
            $this->collVldAlats->clearIterator();
        }
        $this->collVldAlats = null;
        $this->aPtk = null;
        $this->aRuang = null;
        $this->aJenisHapusBuku = null;
        $this->aJenisSarana = null;
        $this->aStatusKepemilikanSarpras = null;
        $this->aSekolah = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(AlatPeer::DEFAULT_STRING_FORMAT);
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
