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
use DataDikdas\Model\AktPd;
use DataDikdas\Model\AktPdQuery;
use DataDikdas\Model\Dudi;
use DataDikdas\Model\DudiQuery;
use DataDikdas\Model\JenisKs;
use DataDikdas\Model\JenisKsQuery;
use DataDikdas\Model\JurusanKerjasama;
use DataDikdas\Model\JurusanKerjasamaQuery;
use DataDikdas\Model\Mou;
use DataDikdas\Model\MouPeer;
use DataDikdas\Model\MouQuery;
use DataDikdas\Model\Sekolah;
use DataDikdas\Model\SekolahQuery;
use DataDikdas\Model\UnitUsahaKerjasama;
use DataDikdas\Model\UnitUsahaKerjasamaQuery;
use DataDikdas\Model\VldMou;
use DataDikdas\Model\VldMouQuery;

/**
 * Base class that represents a row from the 'mou' table.
 *
 * 
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseMou extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'DataDikdas\\Model\\MouPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        MouPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the mou_id field.
     * @var        string
     */
    protected $mou_id;

    /**
     * The value for the id_jns_ks field.
     * @var        string
     */
    protected $id_jns_ks;

    /**
     * The value for the dudi_id field.
     * @var        string
     */
    protected $dudi_id;

    /**
     * The value for the sekolah_id field.
     * @var        string
     */
    protected $sekolah_id;

    /**
     * The value for the nomor_mou field.
     * @var        string
     */
    protected $nomor_mou;

    /**
     * The value for the judul_mou field.
     * @var        string
     */
    protected $judul_mou;

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
     * The value for the nama_dudi field.
     * @var        string
     */
    protected $nama_dudi;

    /**
     * The value for the npwp_dudi field.
     * @var        string
     */
    protected $npwp_dudi;

    /**
     * The value for the nama_bidang_usaha field.
     * @var        string
     */
    protected $nama_bidang_usaha;

    /**
     * The value for the telp_kantor field.
     * @var        string
     */
    protected $telp_kantor;

    /**
     * The value for the fax field.
     * @var        string
     */
    protected $fax;

    /**
     * The value for the contact_person field.
     * @var        string
     */
    protected $contact_person;

    /**
     * The value for the telp_cp field.
     * @var        string
     */
    protected $telp_cp;

    /**
     * The value for the jabatan_cp field.
     * @var        string
     */
    protected $jabatan_cp;

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
     * @var        JenisKs
     */
    protected $aJenisKs;

    /**
     * @var        Dudi
     */
    protected $aDudi;

    /**
     * @var        Sekolah
     */
    protected $aSekolah;

    /**
     * @var        PropelObjectCollection|AktPd[] Collection to store aggregation of AktPd objects.
     */
    protected $collAktPds;
    protected $collAktPdsPartial;

    /**
     * @var        PropelObjectCollection|JurusanKerjasama[] Collection to store aggregation of JurusanKerjasama objects.
     */
    protected $collJurusanKerjasamas;
    protected $collJurusanKerjasamasPartial;

    /**
     * @var        PropelObjectCollection|UnitUsahaKerjasama[] Collection to store aggregation of UnitUsahaKerjasama objects.
     */
    protected $collUnitUsahaKerjasamas;
    protected $collUnitUsahaKerjasamasPartial;

    /**
     * @var        PropelObjectCollection|VldMou[] Collection to store aggregation of VldMou objects.
     */
    protected $collVldMous;
    protected $collVldMousPartial;

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
    protected $aktPdsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $jurusanKerjasamasScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $unitUsahaKerjasamasScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $vldMousScheduledForDeletion = null;

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
     * Initializes internal state of BaseMou object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [mou_id] column value.
     * 
     * @return string
     */
    public function getMouId()
    {
        return $this->mou_id;
    }

    /**
     * Get the [id_jns_ks] column value.
     * 
     * @return string
     */
    public function getIdJnsKs()
    {
        return $this->id_jns_ks;
    }

    /**
     * Get the [dudi_id] column value.
     * 
     * @return string
     */
    public function getDudiId()
    {
        return $this->dudi_id;
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
     * Get the [nomor_mou] column value.
     * 
     * @return string
     */
    public function getNomorMou()
    {
        return $this->nomor_mou;
    }

    /**
     * Get the [judul_mou] column value.
     * 
     * @return string
     */
    public function getJudulMou()
    {
        return $this->judul_mou;
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
     * Get the [nama_dudi] column value.
     * 
     * @return string
     */
    public function getNamaDudi()
    {
        return $this->nama_dudi;
    }

    /**
     * Get the [npwp_dudi] column value.
     * 
     * @return string
     */
    public function getNpwpDudi()
    {
        return $this->npwp_dudi;
    }

    /**
     * Get the [nama_bidang_usaha] column value.
     * 
     * @return string
     */
    public function getNamaBidangUsaha()
    {
        return $this->nama_bidang_usaha;
    }

    /**
     * Get the [telp_kantor] column value.
     * 
     * @return string
     */
    public function getTelpKantor()
    {
        return $this->telp_kantor;
    }

    /**
     * Get the [fax] column value.
     * 
     * @return string
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * Get the [contact_person] column value.
     * 
     * @return string
     */
    public function getContactPerson()
    {
        return $this->contact_person;
    }

    /**
     * Get the [telp_cp] column value.
     * 
     * @return string
     */
    public function getTelpCp()
    {
        return $this->telp_cp;
    }

    /**
     * Get the [jabatan_cp] column value.
     * 
     * @return string
     */
    public function getJabatanCp()
    {
        return $this->jabatan_cp;
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
     * Set the value of [mou_id] column.
     * 
     * @param string $v new value
     * @return Mou The current object (for fluent API support)
     */
    public function setMouId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->mou_id !== $v) {
            $this->mou_id = $v;
            $this->modifiedColumns[] = MouPeer::MOU_ID;
        }


        return $this;
    } // setMouId()

    /**
     * Set the value of [id_jns_ks] column.
     * 
     * @param string $v new value
     * @return Mou The current object (for fluent API support)
     */
    public function setIdJnsKs($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->id_jns_ks !== $v) {
            $this->id_jns_ks = $v;
            $this->modifiedColumns[] = MouPeer::ID_JNS_KS;
        }

        if ($this->aJenisKs !== null && $this->aJenisKs->getIdJnsKs() !== $v) {
            $this->aJenisKs = null;
        }


        return $this;
    } // setIdJnsKs()

    /**
     * Set the value of [dudi_id] column.
     * 
     * @param string $v new value
     * @return Mou The current object (for fluent API support)
     */
    public function setDudiId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->dudi_id !== $v) {
            $this->dudi_id = $v;
            $this->modifiedColumns[] = MouPeer::DUDI_ID;
        }

        if ($this->aDudi !== null && $this->aDudi->getDudiId() !== $v) {
            $this->aDudi = null;
        }


        return $this;
    } // setDudiId()

    /**
     * Set the value of [sekolah_id] column.
     * 
     * @param string $v new value
     * @return Mou The current object (for fluent API support)
     */
    public function setSekolahId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->sekolah_id !== $v) {
            $this->sekolah_id = $v;
            $this->modifiedColumns[] = MouPeer::SEKOLAH_ID;
        }

        if ($this->aSekolah !== null && $this->aSekolah->getSekolahId() !== $v) {
            $this->aSekolah = null;
        }


        return $this;
    } // setSekolahId()

    /**
     * Set the value of [nomor_mou] column.
     * 
     * @param string $v new value
     * @return Mou The current object (for fluent API support)
     */
    public function setNomorMou($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nomor_mou !== $v) {
            $this->nomor_mou = $v;
            $this->modifiedColumns[] = MouPeer::NOMOR_MOU;
        }


        return $this;
    } // setNomorMou()

    /**
     * Set the value of [judul_mou] column.
     * 
     * @param string $v new value
     * @return Mou The current object (for fluent API support)
     */
    public function setJudulMou($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->judul_mou !== $v) {
            $this->judul_mou = $v;
            $this->modifiedColumns[] = MouPeer::JUDUL_MOU;
        }


        return $this;
    } // setJudulMou()

    /**
     * Sets the value of [tanggal_mulai] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Mou The current object (for fluent API support)
     */
    public function setTanggalMulai($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->tanggal_mulai !== null || $dt !== null) {
            $currentDateAsString = ($this->tanggal_mulai !== null && $tmpDt = new DateTime($this->tanggal_mulai)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->tanggal_mulai = $newDateAsString;
                $this->modifiedColumns[] = MouPeer::TANGGAL_MULAI;
            }
        } // if either are not null


        return $this;
    } // setTanggalMulai()

    /**
     * Sets the value of [tanggal_selesai] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Mou The current object (for fluent API support)
     */
    public function setTanggalSelesai($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->tanggal_selesai !== null || $dt !== null) {
            $currentDateAsString = ($this->tanggal_selesai !== null && $tmpDt = new DateTime($this->tanggal_selesai)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->tanggal_selesai = $newDateAsString;
                $this->modifiedColumns[] = MouPeer::TANGGAL_SELESAI;
            }
        } // if either are not null


        return $this;
    } // setTanggalSelesai()

    /**
     * Set the value of [nama_dudi] column.
     * 
     * @param string $v new value
     * @return Mou The current object (for fluent API support)
     */
    public function setNamaDudi($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nama_dudi !== $v) {
            $this->nama_dudi = $v;
            $this->modifiedColumns[] = MouPeer::NAMA_DUDI;
        }


        return $this;
    } // setNamaDudi()

    /**
     * Set the value of [npwp_dudi] column.
     * 
     * @param string $v new value
     * @return Mou The current object (for fluent API support)
     */
    public function setNpwpDudi($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->npwp_dudi !== $v) {
            $this->npwp_dudi = $v;
            $this->modifiedColumns[] = MouPeer::NPWP_DUDI;
        }


        return $this;
    } // setNpwpDudi()

    /**
     * Set the value of [nama_bidang_usaha] column.
     * 
     * @param string $v new value
     * @return Mou The current object (for fluent API support)
     */
    public function setNamaBidangUsaha($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nama_bidang_usaha !== $v) {
            $this->nama_bidang_usaha = $v;
            $this->modifiedColumns[] = MouPeer::NAMA_BIDANG_USAHA;
        }


        return $this;
    } // setNamaBidangUsaha()

    /**
     * Set the value of [telp_kantor] column.
     * 
     * @param string $v new value
     * @return Mou The current object (for fluent API support)
     */
    public function setTelpKantor($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->telp_kantor !== $v) {
            $this->telp_kantor = $v;
            $this->modifiedColumns[] = MouPeer::TELP_KANTOR;
        }


        return $this;
    } // setTelpKantor()

    /**
     * Set the value of [fax] column.
     * 
     * @param string $v new value
     * @return Mou The current object (for fluent API support)
     */
    public function setFax($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->fax !== $v) {
            $this->fax = $v;
            $this->modifiedColumns[] = MouPeer::FAX;
        }


        return $this;
    } // setFax()

    /**
     * Set the value of [contact_person] column.
     * 
     * @param string $v new value
     * @return Mou The current object (for fluent API support)
     */
    public function setContactPerson($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->contact_person !== $v) {
            $this->contact_person = $v;
            $this->modifiedColumns[] = MouPeer::CONTACT_PERSON;
        }


        return $this;
    } // setContactPerson()

    /**
     * Set the value of [telp_cp] column.
     * 
     * @param string $v new value
     * @return Mou The current object (for fluent API support)
     */
    public function setTelpCp($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->telp_cp !== $v) {
            $this->telp_cp = $v;
            $this->modifiedColumns[] = MouPeer::TELP_CP;
        }


        return $this;
    } // setTelpCp()

    /**
     * Set the value of [jabatan_cp] column.
     * 
     * @param string $v new value
     * @return Mou The current object (for fluent API support)
     */
    public function setJabatanCp($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->jabatan_cp !== $v) {
            $this->jabatan_cp = $v;
            $this->modifiedColumns[] = MouPeer::JABATAN_CP;
        }


        return $this;
    } // setJabatanCp()

    /**
     * Sets the value of [create_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Mou The current object (for fluent API support)
     */
    public function setCreateDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->create_date !== null || $dt !== null) {
            $currentDateAsString = ($this->create_date !== null && $tmpDt = new DateTime($this->create_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->create_date = $newDateAsString;
                $this->modifiedColumns[] = MouPeer::CREATE_DATE;
            }
        } // if either are not null


        return $this;
    } // setCreateDate()

    /**
     * Sets the value of [last_update] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Mou The current object (for fluent API support)
     */
    public function setLastUpdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->last_update !== null || $dt !== null) {
            $currentDateAsString = ($this->last_update !== null && $tmpDt = new DateTime($this->last_update)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->last_update = $newDateAsString;
                $this->modifiedColumns[] = MouPeer::LAST_UPDATE;
            }
        } // if either are not null


        return $this;
    } // setLastUpdate()

    /**
     * Set the value of [soft_delete] column.
     * 
     * @param string $v new value
     * @return Mou The current object (for fluent API support)
     */
    public function setSoftDelete($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->soft_delete !== $v) {
            $this->soft_delete = $v;
            $this->modifiedColumns[] = MouPeer::SOFT_DELETE;
        }


        return $this;
    } // setSoftDelete()

    /**
     * Sets the value of [last_sync] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Mou The current object (for fluent API support)
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
                $this->modifiedColumns[] = MouPeer::LAST_SYNC;
            }
        } // if either are not null


        return $this;
    } // setLastSync()

    /**
     * Set the value of [updater_id] column.
     * 
     * @param string $v new value
     * @return Mou The current object (for fluent API support)
     */
    public function setUpdaterId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->updater_id !== $v) {
            $this->updater_id = $v;
            $this->modifiedColumns[] = MouPeer::UPDATER_ID;
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

            $this->mou_id = ($row[$startcol + 0] !== null) ? (string) $row[$startcol + 0] : null;
            $this->id_jns_ks = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->dudi_id = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->sekolah_id = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->nomor_mou = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->judul_mou = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->tanggal_mulai = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->tanggal_selesai = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->nama_dudi = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->npwp_dudi = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
            $this->nama_bidang_usaha = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
            $this->telp_kantor = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
            $this->fax = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
            $this->contact_person = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
            $this->telp_cp = ($row[$startcol + 14] !== null) ? (string) $row[$startcol + 14] : null;
            $this->jabatan_cp = ($row[$startcol + 15] !== null) ? (string) $row[$startcol + 15] : null;
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
            return $startcol + 21; // 21 = MouPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Mou object", $e);
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

        if ($this->aJenisKs !== null && $this->id_jns_ks !== $this->aJenisKs->getIdJnsKs()) {
            $this->aJenisKs = null;
        }
        if ($this->aDudi !== null && $this->dudi_id !== $this->aDudi->getDudiId()) {
            $this->aDudi = null;
        }
        if ($this->aSekolah !== null && $this->sekolah_id !== $this->aSekolah->getSekolahId()) {
            $this->aSekolah = null;
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
            $con = Propel::getConnection(MouPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = MouPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aJenisKs = null;
            $this->aDudi = null;
            $this->aSekolah = null;
            $this->collAktPds = null;

            $this->collJurusanKerjasamas = null;

            $this->collUnitUsahaKerjasamas = null;

            $this->collVldMous = null;

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
            $con = Propel::getConnection(MouPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = MouQuery::create()
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
            $con = Propel::getConnection(MouPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                MouPeer::addInstanceToPool($this);
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

            if ($this->aJenisKs !== null) {
                if ($this->aJenisKs->isModified() || $this->aJenisKs->isNew()) {
                    $affectedRows += $this->aJenisKs->save($con);
                }
                $this->setJenisKs($this->aJenisKs);
            }

            if ($this->aDudi !== null) {
                if ($this->aDudi->isModified() || $this->aDudi->isNew()) {
                    $affectedRows += $this->aDudi->save($con);
                }
                $this->setDudi($this->aDudi);
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

            if ($this->aktPdsScheduledForDeletion !== null) {
                if (!$this->aktPdsScheduledForDeletion->isEmpty()) {
                    AktPdQuery::create()
                        ->filterByPrimaryKeys($this->aktPdsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->aktPdsScheduledForDeletion = null;
                }
            }

            if ($this->collAktPds !== null) {
                foreach ($this->collAktPds as $referrerFK) {
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

            if ($this->unitUsahaKerjasamasScheduledForDeletion !== null) {
                if (!$this->unitUsahaKerjasamasScheduledForDeletion->isEmpty()) {
                    UnitUsahaKerjasamaQuery::create()
                        ->filterByPrimaryKeys($this->unitUsahaKerjasamasScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->unitUsahaKerjasamasScheduledForDeletion = null;
                }
            }

            if ($this->collUnitUsahaKerjasamas !== null) {
                foreach ($this->collUnitUsahaKerjasamas as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->vldMousScheduledForDeletion !== null) {
                if (!$this->vldMousScheduledForDeletion->isEmpty()) {
                    VldMouQuery::create()
                        ->filterByPrimaryKeys($this->vldMousScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->vldMousScheduledForDeletion = null;
                }
            }

            if ($this->collVldMous !== null) {
                foreach ($this->collVldMous as $referrerFK) {
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
        if ($this->isColumnModified(MouPeer::MOU_ID)) {
            $modifiedColumns[':p' . $index++]  = '"mou_id"';
        }
        if ($this->isColumnModified(MouPeer::ID_JNS_KS)) {
            $modifiedColumns[':p' . $index++]  = '"id_jns_ks"';
        }
        if ($this->isColumnModified(MouPeer::DUDI_ID)) {
            $modifiedColumns[':p' . $index++]  = '"dudi_id"';
        }
        if ($this->isColumnModified(MouPeer::SEKOLAH_ID)) {
            $modifiedColumns[':p' . $index++]  = '"sekolah_id"';
        }
        if ($this->isColumnModified(MouPeer::NOMOR_MOU)) {
            $modifiedColumns[':p' . $index++]  = '"nomor_mou"';
        }
        if ($this->isColumnModified(MouPeer::JUDUL_MOU)) {
            $modifiedColumns[':p' . $index++]  = '"judul_mou"';
        }
        if ($this->isColumnModified(MouPeer::TANGGAL_MULAI)) {
            $modifiedColumns[':p' . $index++]  = '"tanggal_mulai"';
        }
        if ($this->isColumnModified(MouPeer::TANGGAL_SELESAI)) {
            $modifiedColumns[':p' . $index++]  = '"tanggal_selesai"';
        }
        if ($this->isColumnModified(MouPeer::NAMA_DUDI)) {
            $modifiedColumns[':p' . $index++]  = '"nama_dudi"';
        }
        if ($this->isColumnModified(MouPeer::NPWP_DUDI)) {
            $modifiedColumns[':p' . $index++]  = '"npwp_dudi"';
        }
        if ($this->isColumnModified(MouPeer::NAMA_BIDANG_USAHA)) {
            $modifiedColumns[':p' . $index++]  = '"nama_bidang_usaha"';
        }
        if ($this->isColumnModified(MouPeer::TELP_KANTOR)) {
            $modifiedColumns[':p' . $index++]  = '"telp_kantor"';
        }
        if ($this->isColumnModified(MouPeer::FAX)) {
            $modifiedColumns[':p' . $index++]  = '"fax"';
        }
        if ($this->isColumnModified(MouPeer::CONTACT_PERSON)) {
            $modifiedColumns[':p' . $index++]  = '"contact_person"';
        }
        if ($this->isColumnModified(MouPeer::TELP_CP)) {
            $modifiedColumns[':p' . $index++]  = '"telp_cp"';
        }
        if ($this->isColumnModified(MouPeer::JABATAN_CP)) {
            $modifiedColumns[':p' . $index++]  = '"jabatan_cp"';
        }
        if ($this->isColumnModified(MouPeer::CREATE_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"create_date"';
        }
        if ($this->isColumnModified(MouPeer::LAST_UPDATE)) {
            $modifiedColumns[':p' . $index++]  = '"last_update"';
        }
        if ($this->isColumnModified(MouPeer::SOFT_DELETE)) {
            $modifiedColumns[':p' . $index++]  = '"soft_delete"';
        }
        if ($this->isColumnModified(MouPeer::LAST_SYNC)) {
            $modifiedColumns[':p' . $index++]  = '"last_sync"';
        }
        if ($this->isColumnModified(MouPeer::UPDATER_ID)) {
            $modifiedColumns[':p' . $index++]  = '"updater_id"';
        }

        $sql = sprintf(
            'INSERT INTO "mou" (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '"mou_id"':						
                        $stmt->bindValue($identifier, $this->mou_id, PDO::PARAM_STR);
                        break;
                    case '"id_jns_ks"':						
                        $stmt->bindValue($identifier, $this->id_jns_ks, PDO::PARAM_STR);
                        break;
                    case '"dudi_id"':						
                        $stmt->bindValue($identifier, $this->dudi_id, PDO::PARAM_STR);
                        break;
                    case '"sekolah_id"':						
                        $stmt->bindValue($identifier, $this->sekolah_id, PDO::PARAM_STR);
                        break;
                    case '"nomor_mou"':						
                        $stmt->bindValue($identifier, $this->nomor_mou, PDO::PARAM_STR);
                        break;
                    case '"judul_mou"':						
                        $stmt->bindValue($identifier, $this->judul_mou, PDO::PARAM_STR);
                        break;
                    case '"tanggal_mulai"':						
                        $stmt->bindValue($identifier, $this->tanggal_mulai, PDO::PARAM_STR);
                        break;
                    case '"tanggal_selesai"':						
                        $stmt->bindValue($identifier, $this->tanggal_selesai, PDO::PARAM_STR);
                        break;
                    case '"nama_dudi"':						
                        $stmt->bindValue($identifier, $this->nama_dudi, PDO::PARAM_STR);
                        break;
                    case '"npwp_dudi"':						
                        $stmt->bindValue($identifier, $this->npwp_dudi, PDO::PARAM_STR);
                        break;
                    case '"nama_bidang_usaha"':						
                        $stmt->bindValue($identifier, $this->nama_bidang_usaha, PDO::PARAM_STR);
                        break;
                    case '"telp_kantor"':						
                        $stmt->bindValue($identifier, $this->telp_kantor, PDO::PARAM_STR);
                        break;
                    case '"fax"':						
                        $stmt->bindValue($identifier, $this->fax, PDO::PARAM_STR);
                        break;
                    case '"contact_person"':						
                        $stmt->bindValue($identifier, $this->contact_person, PDO::PARAM_STR);
                        break;
                    case '"telp_cp"':						
                        $stmt->bindValue($identifier, $this->telp_cp, PDO::PARAM_STR);
                        break;
                    case '"jabatan_cp"':						
                        $stmt->bindValue($identifier, $this->jabatan_cp, PDO::PARAM_STR);
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

            if ($this->aJenisKs !== null) {
                if (!$this->aJenisKs->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aJenisKs->getValidationFailures());
                }
            }

            if ($this->aDudi !== null) {
                if (!$this->aDudi->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aDudi->getValidationFailures());
                }
            }

            if ($this->aSekolah !== null) {
                if (!$this->aSekolah->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aSekolah->getValidationFailures());
                }
            }


            if (($retval = MouPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collAktPds !== null) {
                    foreach ($this->collAktPds as $referrerFK) {
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

                if ($this->collUnitUsahaKerjasamas !== null) {
                    foreach ($this->collUnitUsahaKerjasamas as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collVldMous !== null) {
                    foreach ($this->collVldMous as $referrerFK) {
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
        $pos = MouPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getMouId();
                break;
            case 1:
                return $this->getIdJnsKs();
                break;
            case 2:
                return $this->getDudiId();
                break;
            case 3:
                return $this->getSekolahId();
                break;
            case 4:
                return $this->getNomorMou();
                break;
            case 5:
                return $this->getJudulMou();
                break;
            case 6:
                return $this->getTanggalMulai();
                break;
            case 7:
                return $this->getTanggalSelesai();
                break;
            case 8:
                return $this->getNamaDudi();
                break;
            case 9:
                return $this->getNpwpDudi();
                break;
            case 10:
                return $this->getNamaBidangUsaha();
                break;
            case 11:
                return $this->getTelpKantor();
                break;
            case 12:
                return $this->getFax();
                break;
            case 13:
                return $this->getContactPerson();
                break;
            case 14:
                return $this->getTelpCp();
                break;
            case 15:
                return $this->getJabatanCp();
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
        if (isset($alreadyDumpedObjects['Mou'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Mou'][$this->getPrimaryKey()] = true;
        $keys = MouPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getMouId(),
            $keys[1] => $this->getIdJnsKs(),
            $keys[2] => $this->getDudiId(),
            $keys[3] => $this->getSekolahId(),
            $keys[4] => $this->getNomorMou(),
            $keys[5] => $this->getJudulMou(),
            $keys[6] => $this->getTanggalMulai(),
            $keys[7] => $this->getTanggalSelesai(),
            $keys[8] => $this->getNamaDudi(),
            $keys[9] => $this->getNpwpDudi(),
            $keys[10] => $this->getNamaBidangUsaha(),
            $keys[11] => $this->getTelpKantor(),
            $keys[12] => $this->getFax(),
            $keys[13] => $this->getContactPerson(),
            $keys[14] => $this->getTelpCp(),
            $keys[15] => $this->getJabatanCp(),
            $keys[16] => $this->getCreateDate(),
            $keys[17] => $this->getLastUpdate(),
            $keys[18] => $this->getSoftDelete(),
            $keys[19] => $this->getLastSync(),
            $keys[20] => $this->getUpdaterId(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aJenisKs) {
                $result['JenisKs'] = $this->aJenisKs->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aDudi) {
                $result['Dudi'] = $this->aDudi->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aSekolah) {
                $result['Sekolah'] = $this->aSekolah->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collAktPds) {
                $result['AktPds'] = $this->collAktPds->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collJurusanKerjasamas) {
                $result['JurusanKerjasamas'] = $this->collJurusanKerjasamas->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collUnitUsahaKerjasamas) {
                $result['UnitUsahaKerjasamas'] = $this->collUnitUsahaKerjasamas->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collVldMous) {
                $result['VldMous'] = $this->collVldMous->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = MouPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setMouId($value);
                break;
            case 1:
                $this->setIdJnsKs($value);
                break;
            case 2:
                $this->setDudiId($value);
                break;
            case 3:
                $this->setSekolahId($value);
                break;
            case 4:
                $this->setNomorMou($value);
                break;
            case 5:
                $this->setJudulMou($value);
                break;
            case 6:
                $this->setTanggalMulai($value);
                break;
            case 7:
                $this->setTanggalSelesai($value);
                break;
            case 8:
                $this->setNamaDudi($value);
                break;
            case 9:
                $this->setNpwpDudi($value);
                break;
            case 10:
                $this->setNamaBidangUsaha($value);
                break;
            case 11:
                $this->setTelpKantor($value);
                break;
            case 12:
                $this->setFax($value);
                break;
            case 13:
                $this->setContactPerson($value);
                break;
            case 14:
                $this->setTelpCp($value);
                break;
            case 15:
                $this->setJabatanCp($value);
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
        $keys = MouPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setMouId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setIdJnsKs($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setDudiId($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setSekolahId($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setNomorMou($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setJudulMou($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setTanggalMulai($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setTanggalSelesai($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setNamaDudi($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setNpwpDudi($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setNamaBidangUsaha($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setTelpKantor($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setFax($arr[$keys[12]]);
        if (array_key_exists($keys[13], $arr)) $this->setContactPerson($arr[$keys[13]]);
        if (array_key_exists($keys[14], $arr)) $this->setTelpCp($arr[$keys[14]]);
        if (array_key_exists($keys[15], $arr)) $this->setJabatanCp($arr[$keys[15]]);
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
        $criteria = new Criteria(MouPeer::DATABASE_NAME);

        if ($this->isColumnModified(MouPeer::MOU_ID)) $criteria->add(MouPeer::MOU_ID, $this->mou_id);
        if ($this->isColumnModified(MouPeer::ID_JNS_KS)) $criteria->add(MouPeer::ID_JNS_KS, $this->id_jns_ks);
        if ($this->isColumnModified(MouPeer::DUDI_ID)) $criteria->add(MouPeer::DUDI_ID, $this->dudi_id);
        if ($this->isColumnModified(MouPeer::SEKOLAH_ID)) $criteria->add(MouPeer::SEKOLAH_ID, $this->sekolah_id);
        if ($this->isColumnModified(MouPeer::NOMOR_MOU)) $criteria->add(MouPeer::NOMOR_MOU, $this->nomor_mou);
        if ($this->isColumnModified(MouPeer::JUDUL_MOU)) $criteria->add(MouPeer::JUDUL_MOU, $this->judul_mou);
        if ($this->isColumnModified(MouPeer::TANGGAL_MULAI)) $criteria->add(MouPeer::TANGGAL_MULAI, $this->tanggal_mulai);
        if ($this->isColumnModified(MouPeer::TANGGAL_SELESAI)) $criteria->add(MouPeer::TANGGAL_SELESAI, $this->tanggal_selesai);
        if ($this->isColumnModified(MouPeer::NAMA_DUDI)) $criteria->add(MouPeer::NAMA_DUDI, $this->nama_dudi);
        if ($this->isColumnModified(MouPeer::NPWP_DUDI)) $criteria->add(MouPeer::NPWP_DUDI, $this->npwp_dudi);
        if ($this->isColumnModified(MouPeer::NAMA_BIDANG_USAHA)) $criteria->add(MouPeer::NAMA_BIDANG_USAHA, $this->nama_bidang_usaha);
        if ($this->isColumnModified(MouPeer::TELP_KANTOR)) $criteria->add(MouPeer::TELP_KANTOR, $this->telp_kantor);
        if ($this->isColumnModified(MouPeer::FAX)) $criteria->add(MouPeer::FAX, $this->fax);
        if ($this->isColumnModified(MouPeer::CONTACT_PERSON)) $criteria->add(MouPeer::CONTACT_PERSON, $this->contact_person);
        if ($this->isColumnModified(MouPeer::TELP_CP)) $criteria->add(MouPeer::TELP_CP, $this->telp_cp);
        if ($this->isColumnModified(MouPeer::JABATAN_CP)) $criteria->add(MouPeer::JABATAN_CP, $this->jabatan_cp);
        if ($this->isColumnModified(MouPeer::CREATE_DATE)) $criteria->add(MouPeer::CREATE_DATE, $this->create_date);
        if ($this->isColumnModified(MouPeer::LAST_UPDATE)) $criteria->add(MouPeer::LAST_UPDATE, $this->last_update);
        if ($this->isColumnModified(MouPeer::SOFT_DELETE)) $criteria->add(MouPeer::SOFT_DELETE, $this->soft_delete);
        if ($this->isColumnModified(MouPeer::LAST_SYNC)) $criteria->add(MouPeer::LAST_SYNC, $this->last_sync);
        if ($this->isColumnModified(MouPeer::UPDATER_ID)) $criteria->add(MouPeer::UPDATER_ID, $this->updater_id);

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
        $criteria = new Criteria(MouPeer::DATABASE_NAME);
        $criteria->add(MouPeer::MOU_ID, $this->mou_id);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return string
     */
    public function getPrimaryKey()
    {
        return $this->getMouId();
    }

    /**
     * Generic method to set the primary key (mou_id column).
     *
     * @param  string $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setMouId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getMouId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of Mou (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setIdJnsKs($this->getIdJnsKs());
        $copyObj->setDudiId($this->getDudiId());
        $copyObj->setSekolahId($this->getSekolahId());
        $copyObj->setNomorMou($this->getNomorMou());
        $copyObj->setJudulMou($this->getJudulMou());
        $copyObj->setTanggalMulai($this->getTanggalMulai());
        $copyObj->setTanggalSelesai($this->getTanggalSelesai());
        $copyObj->setNamaDudi($this->getNamaDudi());
        $copyObj->setNpwpDudi($this->getNpwpDudi());
        $copyObj->setNamaBidangUsaha($this->getNamaBidangUsaha());
        $copyObj->setTelpKantor($this->getTelpKantor());
        $copyObj->setFax($this->getFax());
        $copyObj->setContactPerson($this->getContactPerson());
        $copyObj->setTelpCp($this->getTelpCp());
        $copyObj->setJabatanCp($this->getJabatanCp());
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

            foreach ($this->getAktPds() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addAktPd($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getJurusanKerjasamas() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addJurusanKerjasama($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getUnitUsahaKerjasamas() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addUnitUsahaKerjasama($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getVldMous() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addVldMou($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setMouId(NULL); // this is a auto-increment column, so set to default value
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
     * @return Mou Clone of current object.
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
     * @return MouPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new MouPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a JenisKs object.
     *
     * @param             JenisKs $v
     * @return Mou The current object (for fluent API support)
     * @throws PropelException
     */
    public function setJenisKs(JenisKs $v = null)
    {
        if ($v === null) {
            $this->setIdJnsKs(NULL);
        } else {
            $this->setIdJnsKs($v->getIdJnsKs());
        }

        $this->aJenisKs = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the JenisKs object, it will not be re-added.
        if ($v !== null) {
            $v->addMou($this);
        }


        return $this;
    }


    /**
     * Get the associated JenisKs object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return JenisKs The associated JenisKs object.
     * @throws PropelException
     */
    public function getJenisKs(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aJenisKs === null && (($this->id_jns_ks !== "" && $this->id_jns_ks !== null)) && $doQuery) {
            $this->aJenisKs = JenisKsQuery::create()->findPk($this->id_jns_ks, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aJenisKs->addMous($this);
             */
        }

        return $this->aJenisKs;
    }

    /**
     * Declares an association between this object and a Dudi object.
     *
     * @param             Dudi $v
     * @return Mou The current object (for fluent API support)
     * @throws PropelException
     */
    public function setDudi(Dudi $v = null)
    {
        if ($v === null) {
            $this->setDudiId(NULL);
        } else {
            $this->setDudiId($v->getDudiId());
        }

        $this->aDudi = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Dudi object, it will not be re-added.
        if ($v !== null) {
            $v->addMou($this);
        }


        return $this;
    }


    /**
     * Get the associated Dudi object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Dudi The associated Dudi object.
     * @throws PropelException
     */
    public function getDudi(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aDudi === null && (($this->dudi_id !== "" && $this->dudi_id !== null)) && $doQuery) {
            $this->aDudi = DudiQuery::create()->findPk($this->dudi_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aDudi->addMous($this);
             */
        }

        return $this->aDudi;
    }

    /**
     * Declares an association between this object and a Sekolah object.
     *
     * @param             Sekolah $v
     * @return Mou The current object (for fluent API support)
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
            $v->addMou($this);
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
                $this->aSekolah->addMous($this);
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
        if ('AktPd' == $relationName) {
            $this->initAktPds();
        }
        if ('JurusanKerjasama' == $relationName) {
            $this->initJurusanKerjasamas();
        }
        if ('UnitUsahaKerjasama' == $relationName) {
            $this->initUnitUsahaKerjasamas();
        }
        if ('VldMou' == $relationName) {
            $this->initVldMous();
        }
    }

    /**
     * Clears out the collAktPds collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Mou The current object (for fluent API support)
     * @see        addAktPds()
     */
    public function clearAktPds()
    {
        $this->collAktPds = null; // important to set this to null since that means it is uninitialized
        $this->collAktPdsPartial = null;

        return $this;
    }

    /**
     * reset is the collAktPds collection loaded partially
     *
     * @return void
     */
    public function resetPartialAktPds($v = true)
    {
        $this->collAktPdsPartial = $v;
    }

    /**
     * Initializes the collAktPds collection.
     *
     * By default this just sets the collAktPds collection to an empty array (like clearcollAktPds());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initAktPds($overrideExisting = true)
    {
        if (null !== $this->collAktPds && !$overrideExisting) {
            return;
        }
        $this->collAktPds = new PropelObjectCollection();
        $this->collAktPds->setModel('AktPd');
    }

    /**
     * Gets an array of AktPd objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Mou is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|AktPd[] List of AktPd objects
     * @throws PropelException
     */
    public function getAktPds($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collAktPdsPartial && !$this->isNew();
        if (null === $this->collAktPds || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collAktPds) {
                // return empty collection
                $this->initAktPds();
            } else {
                $collAktPds = AktPdQuery::create(null, $criteria)
                    ->filterByMou($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collAktPdsPartial && count($collAktPds)) {
                      $this->initAktPds(false);

                      foreach($collAktPds as $obj) {
                        if (false == $this->collAktPds->contains($obj)) {
                          $this->collAktPds->append($obj);
                        }
                      }

                      $this->collAktPdsPartial = true;
                    }

                    $collAktPds->getInternalIterator()->rewind();
                    return $collAktPds;
                }

                if($partial && $this->collAktPds) {
                    foreach($this->collAktPds as $obj) {
                        if($obj->isNew()) {
                            $collAktPds[] = $obj;
                        }
                    }
                }

                $this->collAktPds = $collAktPds;
                $this->collAktPdsPartial = false;
            }
        }

        return $this->collAktPds;
    }

    /**
     * Sets a collection of AktPd objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $aktPds A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Mou The current object (for fluent API support)
     */
    public function setAktPds(PropelCollection $aktPds, PropelPDO $con = null)
    {
        $aktPdsToDelete = $this->getAktPds(new Criteria(), $con)->diff($aktPds);

        $this->aktPdsScheduledForDeletion = unserialize(serialize($aktPdsToDelete));

        foreach ($aktPdsToDelete as $aktPdRemoved) {
            $aktPdRemoved->setMou(null);
        }

        $this->collAktPds = null;
        foreach ($aktPds as $aktPd) {
            $this->addAktPd($aktPd);
        }

        $this->collAktPds = $aktPds;
        $this->collAktPdsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related AktPd objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related AktPd objects.
     * @throws PropelException
     */
    public function countAktPds(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collAktPdsPartial && !$this->isNew();
        if (null === $this->collAktPds || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collAktPds) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getAktPds());
            }
            $query = AktPdQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByMou($this)
                ->count($con);
        }

        return count($this->collAktPds);
    }

    /**
     * Method called to associate a AktPd object to this object
     * through the AktPd foreign key attribute.
     *
     * @param    AktPd $l AktPd
     * @return Mou The current object (for fluent API support)
     */
    public function addAktPd(AktPd $l)
    {
        if ($this->collAktPds === null) {
            $this->initAktPds();
            $this->collAktPdsPartial = true;
        }
        if (!in_array($l, $this->collAktPds->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddAktPd($l);
        }

        return $this;
    }

    /**
     * @param	AktPd $aktPd The aktPd object to add.
     */
    protected function doAddAktPd($aktPd)
    {
        $this->collAktPds[]= $aktPd;
        $aktPd->setMou($this);
    }

    /**
     * @param	AktPd $aktPd The aktPd object to remove.
     * @return Mou The current object (for fluent API support)
     */
    public function removeAktPd($aktPd)
    {
        if ($this->getAktPds()->contains($aktPd)) {
            $this->collAktPds->remove($this->collAktPds->search($aktPd));
            if (null === $this->aktPdsScheduledForDeletion) {
                $this->aktPdsScheduledForDeletion = clone $this->collAktPds;
                $this->aktPdsScheduledForDeletion->clear();
            }
            $this->aktPdsScheduledForDeletion[]= clone $aktPd;
            $aktPd->setMou(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Mou is new, it will return
     * an empty collection; or if this Mou has previously
     * been saved, it will retrieve related AktPds from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Mou.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|AktPd[] List of AktPd objects
     */
    public function getAktPdsJoinJenisAktPd($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = AktPdQuery::create(null, $criteria);
        $query->joinWith('JenisAktPd', $join_behavior);

        return $this->getAktPds($query, $con);
    }

    /**
     * Clears out the collJurusanKerjasamas collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Mou The current object (for fluent API support)
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
     * If this Mou is new, it will return
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
                    ->filterByMou($this)
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
     * @return Mou The current object (for fluent API support)
     */
    public function setJurusanKerjasamas(PropelCollection $jurusanKerjasamas, PropelPDO $con = null)
    {
        $jurusanKerjasamasToDelete = $this->getJurusanKerjasamas(new Criteria(), $con)->diff($jurusanKerjasamas);

        $this->jurusanKerjasamasScheduledForDeletion = unserialize(serialize($jurusanKerjasamasToDelete));

        foreach ($jurusanKerjasamasToDelete as $jurusanKerjasamaRemoved) {
            $jurusanKerjasamaRemoved->setMou(null);
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
                ->filterByMou($this)
                ->count($con);
        }

        return count($this->collJurusanKerjasamas);
    }

    /**
     * Method called to associate a JurusanKerjasama object to this object
     * through the JurusanKerjasama foreign key attribute.
     *
     * @param    JurusanKerjasama $l JurusanKerjasama
     * @return Mou The current object (for fluent API support)
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
        $jurusanKerjasama->setMou($this);
    }

    /**
     * @param	JurusanKerjasama $jurusanKerjasama The jurusanKerjasama object to remove.
     * @return Mou The current object (for fluent API support)
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
            $jurusanKerjasama->setMou(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Mou is new, it will return
     * an empty collection; or if this Mou has previously
     * been saved, it will retrieve related JurusanKerjasamas from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Mou.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|JurusanKerjasama[] List of JurusanKerjasama objects
     */
    public function getJurusanKerjasamasJoinJurusanSp($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = JurusanKerjasamaQuery::create(null, $criteria);
        $query->joinWith('JurusanSp', $join_behavior);

        return $this->getJurusanKerjasamas($query, $con);
    }

    /**
     * Clears out the collUnitUsahaKerjasamas collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Mou The current object (for fluent API support)
     * @see        addUnitUsahaKerjasamas()
     */
    public function clearUnitUsahaKerjasamas()
    {
        $this->collUnitUsahaKerjasamas = null; // important to set this to null since that means it is uninitialized
        $this->collUnitUsahaKerjasamasPartial = null;

        return $this;
    }

    /**
     * reset is the collUnitUsahaKerjasamas collection loaded partially
     *
     * @return void
     */
    public function resetPartialUnitUsahaKerjasamas($v = true)
    {
        $this->collUnitUsahaKerjasamasPartial = $v;
    }

    /**
     * Initializes the collUnitUsahaKerjasamas collection.
     *
     * By default this just sets the collUnitUsahaKerjasamas collection to an empty array (like clearcollUnitUsahaKerjasamas());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initUnitUsahaKerjasamas($overrideExisting = true)
    {
        if (null !== $this->collUnitUsahaKerjasamas && !$overrideExisting) {
            return;
        }
        $this->collUnitUsahaKerjasamas = new PropelObjectCollection();
        $this->collUnitUsahaKerjasamas->setModel('UnitUsahaKerjasama');
    }

    /**
     * Gets an array of UnitUsahaKerjasama objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Mou is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|UnitUsahaKerjasama[] List of UnitUsahaKerjasama objects
     * @throws PropelException
     */
    public function getUnitUsahaKerjasamas($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collUnitUsahaKerjasamasPartial && !$this->isNew();
        if (null === $this->collUnitUsahaKerjasamas || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collUnitUsahaKerjasamas) {
                // return empty collection
                $this->initUnitUsahaKerjasamas();
            } else {
                $collUnitUsahaKerjasamas = UnitUsahaKerjasamaQuery::create(null, $criteria)
                    ->filterByMou($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collUnitUsahaKerjasamasPartial && count($collUnitUsahaKerjasamas)) {
                      $this->initUnitUsahaKerjasamas(false);

                      foreach($collUnitUsahaKerjasamas as $obj) {
                        if (false == $this->collUnitUsahaKerjasamas->contains($obj)) {
                          $this->collUnitUsahaKerjasamas->append($obj);
                        }
                      }

                      $this->collUnitUsahaKerjasamasPartial = true;
                    }

                    $collUnitUsahaKerjasamas->getInternalIterator()->rewind();
                    return $collUnitUsahaKerjasamas;
                }

                if($partial && $this->collUnitUsahaKerjasamas) {
                    foreach($this->collUnitUsahaKerjasamas as $obj) {
                        if($obj->isNew()) {
                            $collUnitUsahaKerjasamas[] = $obj;
                        }
                    }
                }

                $this->collUnitUsahaKerjasamas = $collUnitUsahaKerjasamas;
                $this->collUnitUsahaKerjasamasPartial = false;
            }
        }

        return $this->collUnitUsahaKerjasamas;
    }

    /**
     * Sets a collection of UnitUsahaKerjasama objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $unitUsahaKerjasamas A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Mou The current object (for fluent API support)
     */
    public function setUnitUsahaKerjasamas(PropelCollection $unitUsahaKerjasamas, PropelPDO $con = null)
    {
        $unitUsahaKerjasamasToDelete = $this->getUnitUsahaKerjasamas(new Criteria(), $con)->diff($unitUsahaKerjasamas);

        $this->unitUsahaKerjasamasScheduledForDeletion = unserialize(serialize($unitUsahaKerjasamasToDelete));

        foreach ($unitUsahaKerjasamasToDelete as $unitUsahaKerjasamaRemoved) {
            $unitUsahaKerjasamaRemoved->setMou(null);
        }

        $this->collUnitUsahaKerjasamas = null;
        foreach ($unitUsahaKerjasamas as $unitUsahaKerjasama) {
            $this->addUnitUsahaKerjasama($unitUsahaKerjasama);
        }

        $this->collUnitUsahaKerjasamas = $unitUsahaKerjasamas;
        $this->collUnitUsahaKerjasamasPartial = false;

        return $this;
    }

    /**
     * Returns the number of related UnitUsahaKerjasama objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related UnitUsahaKerjasama objects.
     * @throws PropelException
     */
    public function countUnitUsahaKerjasamas(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collUnitUsahaKerjasamasPartial && !$this->isNew();
        if (null === $this->collUnitUsahaKerjasamas || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collUnitUsahaKerjasamas) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getUnitUsahaKerjasamas());
            }
            $query = UnitUsahaKerjasamaQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByMou($this)
                ->count($con);
        }

        return count($this->collUnitUsahaKerjasamas);
    }

    /**
     * Method called to associate a UnitUsahaKerjasama object to this object
     * through the UnitUsahaKerjasama foreign key attribute.
     *
     * @param    UnitUsahaKerjasama $l UnitUsahaKerjasama
     * @return Mou The current object (for fluent API support)
     */
    public function addUnitUsahaKerjasama(UnitUsahaKerjasama $l)
    {
        if ($this->collUnitUsahaKerjasamas === null) {
            $this->initUnitUsahaKerjasamas();
            $this->collUnitUsahaKerjasamasPartial = true;
        }
        if (!in_array($l, $this->collUnitUsahaKerjasamas->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddUnitUsahaKerjasama($l);
        }

        return $this;
    }

    /**
     * @param	UnitUsahaKerjasama $unitUsahaKerjasama The unitUsahaKerjasama object to add.
     */
    protected function doAddUnitUsahaKerjasama($unitUsahaKerjasama)
    {
        $this->collUnitUsahaKerjasamas[]= $unitUsahaKerjasama;
        $unitUsahaKerjasama->setMou($this);
    }

    /**
     * @param	UnitUsahaKerjasama $unitUsahaKerjasama The unitUsahaKerjasama object to remove.
     * @return Mou The current object (for fluent API support)
     */
    public function removeUnitUsahaKerjasama($unitUsahaKerjasama)
    {
        if ($this->getUnitUsahaKerjasamas()->contains($unitUsahaKerjasama)) {
            $this->collUnitUsahaKerjasamas->remove($this->collUnitUsahaKerjasamas->search($unitUsahaKerjasama));
            if (null === $this->unitUsahaKerjasamasScheduledForDeletion) {
                $this->unitUsahaKerjasamasScheduledForDeletion = clone $this->collUnitUsahaKerjasamas;
                $this->unitUsahaKerjasamasScheduledForDeletion->clear();
            }
            $this->unitUsahaKerjasamasScheduledForDeletion[]= clone $unitUsahaKerjasama;
            $unitUsahaKerjasama->setMou(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Mou is new, it will return
     * an empty collection; or if this Mou has previously
     * been saved, it will retrieve related UnitUsahaKerjasamas from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Mou.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|UnitUsahaKerjasama[] List of UnitUsahaKerjasama objects
     */
    public function getUnitUsahaKerjasamasJoinUnitUsaha($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = UnitUsahaKerjasamaQuery::create(null, $criteria);
        $query->joinWith('UnitUsaha', $join_behavior);

        return $this->getUnitUsahaKerjasamas($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Mou is new, it will return
     * an empty collection; or if this Mou has previously
     * been saved, it will retrieve related UnitUsahaKerjasamas from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Mou.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|UnitUsahaKerjasama[] List of UnitUsahaKerjasama objects
     */
    public function getUnitUsahaKerjasamasJoinSumberDana($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = UnitUsahaKerjasamaQuery::create(null, $criteria);
        $query->joinWith('SumberDana', $join_behavior);

        return $this->getUnitUsahaKerjasamas($query, $con);
    }

    /**
     * Clears out the collVldMous collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Mou The current object (for fluent API support)
     * @see        addVldMous()
     */
    public function clearVldMous()
    {
        $this->collVldMous = null; // important to set this to null since that means it is uninitialized
        $this->collVldMousPartial = null;

        return $this;
    }

    /**
     * reset is the collVldMous collection loaded partially
     *
     * @return void
     */
    public function resetPartialVldMous($v = true)
    {
        $this->collVldMousPartial = $v;
    }

    /**
     * Initializes the collVldMous collection.
     *
     * By default this just sets the collVldMous collection to an empty array (like clearcollVldMous());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initVldMous($overrideExisting = true)
    {
        if (null !== $this->collVldMous && !$overrideExisting) {
            return;
        }
        $this->collVldMous = new PropelObjectCollection();
        $this->collVldMous->setModel('VldMou');
    }

    /**
     * Gets an array of VldMou objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Mou is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|VldMou[] List of VldMou objects
     * @throws PropelException
     */
    public function getVldMous($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collVldMousPartial && !$this->isNew();
        if (null === $this->collVldMous || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collVldMous) {
                // return empty collection
                $this->initVldMous();
            } else {
                $collVldMous = VldMouQuery::create(null, $criteria)
                    ->filterByMou($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collVldMousPartial && count($collVldMous)) {
                      $this->initVldMous(false);

                      foreach($collVldMous as $obj) {
                        if (false == $this->collVldMous->contains($obj)) {
                          $this->collVldMous->append($obj);
                        }
                      }

                      $this->collVldMousPartial = true;
                    }

                    $collVldMous->getInternalIterator()->rewind();
                    return $collVldMous;
                }

                if($partial && $this->collVldMous) {
                    foreach($this->collVldMous as $obj) {
                        if($obj->isNew()) {
                            $collVldMous[] = $obj;
                        }
                    }
                }

                $this->collVldMous = $collVldMous;
                $this->collVldMousPartial = false;
            }
        }

        return $this->collVldMous;
    }

    /**
     * Sets a collection of VldMou objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $vldMous A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Mou The current object (for fluent API support)
     */
    public function setVldMous(PropelCollection $vldMous, PropelPDO $con = null)
    {
        $vldMousToDelete = $this->getVldMous(new Criteria(), $con)->diff($vldMous);

        $this->vldMousScheduledForDeletion = unserialize(serialize($vldMousToDelete));

        foreach ($vldMousToDelete as $vldMouRemoved) {
            $vldMouRemoved->setMou(null);
        }

        $this->collVldMous = null;
        foreach ($vldMous as $vldMou) {
            $this->addVldMou($vldMou);
        }

        $this->collVldMous = $vldMous;
        $this->collVldMousPartial = false;

        return $this;
    }

    /**
     * Returns the number of related VldMou objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related VldMou objects.
     * @throws PropelException
     */
    public function countVldMous(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collVldMousPartial && !$this->isNew();
        if (null === $this->collVldMous || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collVldMous) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getVldMous());
            }
            $query = VldMouQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByMou($this)
                ->count($con);
        }

        return count($this->collVldMous);
    }

    /**
     * Method called to associate a VldMou object to this object
     * through the VldMou foreign key attribute.
     *
     * @param    VldMou $l VldMou
     * @return Mou The current object (for fluent API support)
     */
    public function addVldMou(VldMou $l)
    {
        if ($this->collVldMous === null) {
            $this->initVldMous();
            $this->collVldMousPartial = true;
        }
        if (!in_array($l, $this->collVldMous->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddVldMou($l);
        }

        return $this;
    }

    /**
     * @param	VldMou $vldMou The vldMou object to add.
     */
    protected function doAddVldMou($vldMou)
    {
        $this->collVldMous[]= $vldMou;
        $vldMou->setMou($this);
    }

    /**
     * @param	VldMou $vldMou The vldMou object to remove.
     * @return Mou The current object (for fluent API support)
     */
    public function removeVldMou($vldMou)
    {
        if ($this->getVldMous()->contains($vldMou)) {
            $this->collVldMous->remove($this->collVldMous->search($vldMou));
            if (null === $this->vldMousScheduledForDeletion) {
                $this->vldMousScheduledForDeletion = clone $this->collVldMous;
                $this->vldMousScheduledForDeletion->clear();
            }
            $this->vldMousScheduledForDeletion[]= clone $vldMou;
            $vldMou->setMou(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Mou is new, it will return
     * an empty collection; or if this Mou has previously
     * been saved, it will retrieve related VldMous from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Mou.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|VldMou[] List of VldMou objects
     */
    public function getVldMousJoinErrortype($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = VldMouQuery::create(null, $criteria);
        $query->joinWith('Errortype', $join_behavior);

        return $this->getVldMous($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->mou_id = null;
        $this->id_jns_ks = null;
        $this->dudi_id = null;
        $this->sekolah_id = null;
        $this->nomor_mou = null;
        $this->judul_mou = null;
        $this->tanggal_mulai = null;
        $this->tanggal_selesai = null;
        $this->nama_dudi = null;
        $this->npwp_dudi = null;
        $this->nama_bidang_usaha = null;
        $this->telp_kantor = null;
        $this->fax = null;
        $this->contact_person = null;
        $this->telp_cp = null;
        $this->jabatan_cp = null;
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
            if ($this->collAktPds) {
                foreach ($this->collAktPds as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collJurusanKerjasamas) {
                foreach ($this->collJurusanKerjasamas as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collUnitUsahaKerjasamas) {
                foreach ($this->collUnitUsahaKerjasamas as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collVldMous) {
                foreach ($this->collVldMous as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aJenisKs instanceof Persistent) {
              $this->aJenisKs->clearAllReferences($deep);
            }
            if ($this->aDudi instanceof Persistent) {
              $this->aDudi->clearAllReferences($deep);
            }
            if ($this->aSekolah instanceof Persistent) {
              $this->aSekolah->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collAktPds instanceof PropelCollection) {
            $this->collAktPds->clearIterator();
        }
        $this->collAktPds = null;
        if ($this->collJurusanKerjasamas instanceof PropelCollection) {
            $this->collJurusanKerjasamas->clearIterator();
        }
        $this->collJurusanKerjasamas = null;
        if ($this->collUnitUsahaKerjasamas instanceof PropelCollection) {
            $this->collUnitUsahaKerjasamas->clearIterator();
        }
        $this->collUnitUsahaKerjasamas = null;
        if ($this->collVldMous instanceof PropelCollection) {
            $this->collVldMous->clearIterator();
        }
        $this->collVldMous = null;
        $this->aJenisKs = null;
        $this->aDudi = null;
        $this->aSekolah = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(MouPeer::DEFAULT_STRING_FORMAT);
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
