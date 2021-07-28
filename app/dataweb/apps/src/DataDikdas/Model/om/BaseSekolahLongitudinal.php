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
use DataDikdas\Model\AksesInternet;
use DataDikdas\Model\AksesInternetQuery;
use DataDikdas\Model\Jadwal;
use DataDikdas\Model\JadwalQuery;
use DataDikdas\Model\LargeObject;
use DataDikdas\Model\LargeObjectQuery;
use DataDikdas\Model\Sekolah;
use DataDikdas\Model\SekolahLongitudinal;
use DataDikdas\Model\SekolahLongitudinalPeer;
use DataDikdas\Model\SekolahLongitudinalQuery;
use DataDikdas\Model\SekolahQuery;
use DataDikdas\Model\Semester;
use DataDikdas\Model\SemesterQuery;
use DataDikdas\Model\SertifikasiIso;
use DataDikdas\Model\SertifikasiIsoQuery;
use DataDikdas\Model\SumberListrik;
use DataDikdas\Model\SumberListrikQuery;
use DataDikdas\Model\WaktuPenyelenggaraan;
use DataDikdas\Model\WaktuPenyelenggaraanQuery;

/**
 * Base class that represents a row from the 'sekolah_longitudinal' table.
 *
 * 
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseSekolahLongitudinal extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'DataDikdas\\Model\\SekolahLongitudinalPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        SekolahLongitudinalPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the sekolah_id field.
     * @var        string
     */
    protected $sekolah_id;

    /**
     * The value for the semester_id field.
     * @var        string
     */
    protected $semester_id;

    /**
     * The value for the waktu_penyelenggaraan_id field.
     * @var        string
     */
    protected $waktu_penyelenggaraan_id;

    /**
     * The value for the kontinuitas_listrik field.
     * Note: this column has a database default value of: '1'
     * @var        string
     */
    protected $kontinuitas_listrik;

    /**
     * The value for the jarak_listrik field.
     * @var        string
     */
    protected $jarak_listrik;

    /**
     * The value for the wilayah_terpencil field.
     * @var        string
     */
    protected $wilayah_terpencil;

    /**
     * The value for the wilayah_perbatasan field.
     * @var        string
     */
    protected $wilayah_perbatasan;

    /**
     * The value for the wilayah_transmigrasi field.
     * @var        string
     */
    protected $wilayah_transmigrasi;

    /**
     * The value for the wilayah_adat_terpencil field.
     * @var        string
     */
    protected $wilayah_adat_terpencil;

    /**
     * The value for the wilayah_bencana_alam field.
     * @var        string
     */
    protected $wilayah_bencana_alam;

    /**
     * The value for the wilayah_bencana_sosial field.
     * @var        string
     */
    protected $wilayah_bencana_sosial;

    /**
     * The value for the partisipasi_bos field.
     * Note: this column has a database default value of: '1'
     * @var        string
     */
    protected $partisipasi_bos;

    /**
     * The value for the sertifikasi_iso_id field.
     * @var        int
     */
    protected $sertifikasi_iso_id;

    /**
     * The value for the sumber_listrik_id field.
     * @var        string
     */
    protected $sumber_listrik_id;

    /**
     * The value for the daya_listrik field.
     * @var        string
     */
    protected $daya_listrik;

    /**
     * The value for the akses_internet_id field.
     * @var        int
     */
    protected $akses_internet_id;

    /**
     * The value for the akses_internet_2_id field.
     * @var        int
     */
    protected $akses_internet_2_id;

    /**
     * The value for the blob_id field.
     * @var        string
     */
    protected $blob_id;

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
     * @var        LargeObject
     */
    protected $aLargeObject;

    /**
     * @var        SertifikasiIso
     */
    protected $aSertifikasiIso;

    /**
     * @var        Sekolah
     */
    protected $aSekolah;

    /**
     * @var        Semester
     */
    protected $aSemester;

    /**
     * @var        SumberListrik
     */
    protected $aSumberListrik;

    /**
     * @var        WaktuPenyelenggaraan
     */
    protected $aWaktuPenyelenggaraan;

    /**
     * @var        AksesInternet
     */
    protected $aAksesInternetRelatedByAksesInternetId;

    /**
     * @var        AksesInternet
     */
    protected $aAksesInternetRelatedByAksesInternet2Id;

    /**
     * @var        PropelObjectCollection|Jadwal[] Collection to store aggregation of Jadwal objects.
     */
    protected $collJadwals;
    protected $collJadwalsPartial;

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
    protected $jadwalsScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->kontinuitas_listrik = '1';
        $this->partisipasi_bos = '1';
        $this->last_sync = '1901-01-01 00:00:00';
    }

    /**
     * Initializes internal state of BaseSekolahLongitudinal object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
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
     * Get the [semester_id] column value.
     * 
     * @return string
     */
    public function getSemesterId()
    {
        return $this->semester_id;
    }

    /**
     * Get the [waktu_penyelenggaraan_id] column value.
     * 
     * @return string
     */
    public function getWaktuPenyelenggaraanId()
    {
        return $this->waktu_penyelenggaraan_id;
    }

    /**
     * Get the [kontinuitas_listrik] column value.
     * 
     * @return string
     */
    public function getKontinuitasListrik()
    {
        return $this->kontinuitas_listrik;
    }

    /**
     * Get the [jarak_listrik] column value.
     * 
     * @return string
     */
    public function getJarakListrik()
    {
        return $this->jarak_listrik;
    }

    /**
     * Get the [wilayah_terpencil] column value.
     * 
     * @return string
     */
    public function getWilayahTerpencil()
    {
        return $this->wilayah_terpencil;
    }

    /**
     * Get the [wilayah_perbatasan] column value.
     * 
     * @return string
     */
    public function getWilayahPerbatasan()
    {
        return $this->wilayah_perbatasan;
    }

    /**
     * Get the [wilayah_transmigrasi] column value.
     * 
     * @return string
     */
    public function getWilayahTransmigrasi()
    {
        return $this->wilayah_transmigrasi;
    }

    /**
     * Get the [wilayah_adat_terpencil] column value.
     * 
     * @return string
     */
    public function getWilayahAdatTerpencil()
    {
        return $this->wilayah_adat_terpencil;
    }

    /**
     * Get the [wilayah_bencana_alam] column value.
     * 
     * @return string
     */
    public function getWilayahBencanaAlam()
    {
        return $this->wilayah_bencana_alam;
    }

    /**
     * Get the [wilayah_bencana_sosial] column value.
     * 
     * @return string
     */
    public function getWilayahBencanaSosial()
    {
        return $this->wilayah_bencana_sosial;
    }

    /**
     * Get the [partisipasi_bos] column value.
     * 
     * @return string
     */
    public function getPartisipasiBos()
    {
        return $this->partisipasi_bos;
    }

    /**
     * Get the [sertifikasi_iso_id] column value.
     * 
     * @return int
     */
    public function getSertifikasiIsoId()
    {
        return $this->sertifikasi_iso_id;
    }

    /**
     * Get the [sumber_listrik_id] column value.
     * 
     * @return string
     */
    public function getSumberListrikId()
    {
        return $this->sumber_listrik_id;
    }

    /**
     * Get the [daya_listrik] column value.
     * 
     * @return string
     */
    public function getDayaListrik()
    {
        return $this->daya_listrik;
    }

    /**
     * Get the [akses_internet_id] column value.
     * 
     * @return int
     */
    public function getAksesInternetId()
    {
        return $this->akses_internet_id;
    }

    /**
     * Get the [akses_internet_2_id] column value.
     * 
     * @return int
     */
    public function getAksesInternet2Id()
    {
        return $this->akses_internet_2_id;
    }

    /**
     * Get the [blob_id] column value.
     * 
     * @return string
     */
    public function getBlobId()
    {
        return $this->blob_id;
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
     * Set the value of [sekolah_id] column.
     * 
     * @param string $v new value
     * @return SekolahLongitudinal The current object (for fluent API support)
     */
    public function setSekolahId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->sekolah_id !== $v) {
            $this->sekolah_id = $v;
            $this->modifiedColumns[] = SekolahLongitudinalPeer::SEKOLAH_ID;
        }

        if ($this->aSekolah !== null && $this->aSekolah->getSekolahId() !== $v) {
            $this->aSekolah = null;
        }


        return $this;
    } // setSekolahId()

    /**
     * Set the value of [semester_id] column.
     * 
     * @param string $v new value
     * @return SekolahLongitudinal The current object (for fluent API support)
     */
    public function setSemesterId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->semester_id !== $v) {
            $this->semester_id = $v;
            $this->modifiedColumns[] = SekolahLongitudinalPeer::SEMESTER_ID;
        }

        if ($this->aSemester !== null && $this->aSemester->getSemesterId() !== $v) {
            $this->aSemester = null;
        }


        return $this;
    } // setSemesterId()

    /**
     * Set the value of [waktu_penyelenggaraan_id] column.
     * 
     * @param string $v new value
     * @return SekolahLongitudinal The current object (for fluent API support)
     */
    public function setWaktuPenyelenggaraanId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->waktu_penyelenggaraan_id !== $v) {
            $this->waktu_penyelenggaraan_id = $v;
            $this->modifiedColumns[] = SekolahLongitudinalPeer::WAKTU_PENYELENGGARAAN_ID;
        }

        if ($this->aWaktuPenyelenggaraan !== null && $this->aWaktuPenyelenggaraan->getWaktuPenyelenggaraanId() !== $v) {
            $this->aWaktuPenyelenggaraan = null;
        }


        return $this;
    } // setWaktuPenyelenggaraanId()

    /**
     * Set the value of [kontinuitas_listrik] column.
     * 
     * @param string $v new value
     * @return SekolahLongitudinal The current object (for fluent API support)
     */
    public function setKontinuitasListrik($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->kontinuitas_listrik !== $v) {
            $this->kontinuitas_listrik = $v;
            $this->modifiedColumns[] = SekolahLongitudinalPeer::KONTINUITAS_LISTRIK;
        }


        return $this;
    } // setKontinuitasListrik()

    /**
     * Set the value of [jarak_listrik] column.
     * 
     * @param string $v new value
     * @return SekolahLongitudinal The current object (for fluent API support)
     */
    public function setJarakListrik($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->jarak_listrik !== $v) {
            $this->jarak_listrik = $v;
            $this->modifiedColumns[] = SekolahLongitudinalPeer::JARAK_LISTRIK;
        }


        return $this;
    } // setJarakListrik()

    /**
     * Set the value of [wilayah_terpencil] column.
     * 
     * @param string $v new value
     * @return SekolahLongitudinal The current object (for fluent API support)
     */
    public function setWilayahTerpencil($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->wilayah_terpencil !== $v) {
            $this->wilayah_terpencil = $v;
            $this->modifiedColumns[] = SekolahLongitudinalPeer::WILAYAH_TERPENCIL;
        }


        return $this;
    } // setWilayahTerpencil()

    /**
     * Set the value of [wilayah_perbatasan] column.
     * 
     * @param string $v new value
     * @return SekolahLongitudinal The current object (for fluent API support)
     */
    public function setWilayahPerbatasan($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->wilayah_perbatasan !== $v) {
            $this->wilayah_perbatasan = $v;
            $this->modifiedColumns[] = SekolahLongitudinalPeer::WILAYAH_PERBATASAN;
        }


        return $this;
    } // setWilayahPerbatasan()

    /**
     * Set the value of [wilayah_transmigrasi] column.
     * 
     * @param string $v new value
     * @return SekolahLongitudinal The current object (for fluent API support)
     */
    public function setWilayahTransmigrasi($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->wilayah_transmigrasi !== $v) {
            $this->wilayah_transmigrasi = $v;
            $this->modifiedColumns[] = SekolahLongitudinalPeer::WILAYAH_TRANSMIGRASI;
        }


        return $this;
    } // setWilayahTransmigrasi()

    /**
     * Set the value of [wilayah_adat_terpencil] column.
     * 
     * @param string $v new value
     * @return SekolahLongitudinal The current object (for fluent API support)
     */
    public function setWilayahAdatTerpencil($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->wilayah_adat_terpencil !== $v) {
            $this->wilayah_adat_terpencil = $v;
            $this->modifiedColumns[] = SekolahLongitudinalPeer::WILAYAH_ADAT_TERPENCIL;
        }


        return $this;
    } // setWilayahAdatTerpencil()

    /**
     * Set the value of [wilayah_bencana_alam] column.
     * 
     * @param string $v new value
     * @return SekolahLongitudinal The current object (for fluent API support)
     */
    public function setWilayahBencanaAlam($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->wilayah_bencana_alam !== $v) {
            $this->wilayah_bencana_alam = $v;
            $this->modifiedColumns[] = SekolahLongitudinalPeer::WILAYAH_BENCANA_ALAM;
        }


        return $this;
    } // setWilayahBencanaAlam()

    /**
     * Set the value of [wilayah_bencana_sosial] column.
     * 
     * @param string $v new value
     * @return SekolahLongitudinal The current object (for fluent API support)
     */
    public function setWilayahBencanaSosial($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->wilayah_bencana_sosial !== $v) {
            $this->wilayah_bencana_sosial = $v;
            $this->modifiedColumns[] = SekolahLongitudinalPeer::WILAYAH_BENCANA_SOSIAL;
        }


        return $this;
    } // setWilayahBencanaSosial()

    /**
     * Set the value of [partisipasi_bos] column.
     * 
     * @param string $v new value
     * @return SekolahLongitudinal The current object (for fluent API support)
     */
    public function setPartisipasiBos($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->partisipasi_bos !== $v) {
            $this->partisipasi_bos = $v;
            $this->modifiedColumns[] = SekolahLongitudinalPeer::PARTISIPASI_BOS;
        }


        return $this;
    } // setPartisipasiBos()

    /**
     * Set the value of [sertifikasi_iso_id] column.
     * 
     * @param int $v new value
     * @return SekolahLongitudinal The current object (for fluent API support)
     */
    public function setSertifikasiIsoId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->sertifikasi_iso_id !== $v) {
            $this->sertifikasi_iso_id = $v;
            $this->modifiedColumns[] = SekolahLongitudinalPeer::SERTIFIKASI_ISO_ID;
        }

        if ($this->aSertifikasiIso !== null && $this->aSertifikasiIso->getSertifikasiIsoId() !== $v) {
            $this->aSertifikasiIso = null;
        }


        return $this;
    } // setSertifikasiIsoId()

    /**
     * Set the value of [sumber_listrik_id] column.
     * 
     * @param string $v new value
     * @return SekolahLongitudinal The current object (for fluent API support)
     */
    public function setSumberListrikId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->sumber_listrik_id !== $v) {
            $this->sumber_listrik_id = $v;
            $this->modifiedColumns[] = SekolahLongitudinalPeer::SUMBER_LISTRIK_ID;
        }

        if ($this->aSumberListrik !== null && $this->aSumberListrik->getSumberListrikId() !== $v) {
            $this->aSumberListrik = null;
        }


        return $this;
    } // setSumberListrikId()

    /**
     * Set the value of [daya_listrik] column.
     * 
     * @param string $v new value
     * @return SekolahLongitudinal The current object (for fluent API support)
     */
    public function setDayaListrik($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->daya_listrik !== $v) {
            $this->daya_listrik = $v;
            $this->modifiedColumns[] = SekolahLongitudinalPeer::DAYA_LISTRIK;
        }


        return $this;
    } // setDayaListrik()

    /**
     * Set the value of [akses_internet_id] column.
     * 
     * @param int $v new value
     * @return SekolahLongitudinal The current object (for fluent API support)
     */
    public function setAksesInternetId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->akses_internet_id !== $v) {
            $this->akses_internet_id = $v;
            $this->modifiedColumns[] = SekolahLongitudinalPeer::AKSES_INTERNET_ID;
        }

        if ($this->aAksesInternetRelatedByAksesInternetId !== null && $this->aAksesInternetRelatedByAksesInternetId->getAksesInternetId() !== $v) {
            $this->aAksesInternetRelatedByAksesInternetId = null;
        }


        return $this;
    } // setAksesInternetId()

    /**
     * Set the value of [akses_internet_2_id] column.
     * 
     * @param int $v new value
     * @return SekolahLongitudinal The current object (for fluent API support)
     */
    public function setAksesInternet2Id($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->akses_internet_2_id !== $v) {
            $this->akses_internet_2_id = $v;
            $this->modifiedColumns[] = SekolahLongitudinalPeer::AKSES_INTERNET_2_ID;
        }

        if ($this->aAksesInternetRelatedByAksesInternet2Id !== null && $this->aAksesInternetRelatedByAksesInternet2Id->getAksesInternetId() !== $v) {
            $this->aAksesInternetRelatedByAksesInternet2Id = null;
        }


        return $this;
    } // setAksesInternet2Id()

    /**
     * Set the value of [blob_id] column.
     * 
     * @param string $v new value
     * @return SekolahLongitudinal The current object (for fluent API support)
     */
    public function setBlobId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->blob_id !== $v) {
            $this->blob_id = $v;
            $this->modifiedColumns[] = SekolahLongitudinalPeer::BLOB_ID;
        }

        if ($this->aLargeObject !== null && $this->aLargeObject->getBlobId() !== $v) {
            $this->aLargeObject = null;
        }


        return $this;
    } // setBlobId()

    /**
     * Sets the value of [create_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return SekolahLongitudinal The current object (for fluent API support)
     */
    public function setCreateDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->create_date !== null || $dt !== null) {
            $currentDateAsString = ($this->create_date !== null && $tmpDt = new DateTime($this->create_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->create_date = $newDateAsString;
                $this->modifiedColumns[] = SekolahLongitudinalPeer::CREATE_DATE;
            }
        } // if either are not null


        return $this;
    } // setCreateDate()

    /**
     * Sets the value of [last_update] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return SekolahLongitudinal The current object (for fluent API support)
     */
    public function setLastUpdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->last_update !== null || $dt !== null) {
            $currentDateAsString = ($this->last_update !== null && $tmpDt = new DateTime($this->last_update)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->last_update = $newDateAsString;
                $this->modifiedColumns[] = SekolahLongitudinalPeer::LAST_UPDATE;
            }
        } // if either are not null


        return $this;
    } // setLastUpdate()

    /**
     * Set the value of [soft_delete] column.
     * 
     * @param string $v new value
     * @return SekolahLongitudinal The current object (for fluent API support)
     */
    public function setSoftDelete($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->soft_delete !== $v) {
            $this->soft_delete = $v;
            $this->modifiedColumns[] = SekolahLongitudinalPeer::SOFT_DELETE;
        }


        return $this;
    } // setSoftDelete()

    /**
     * Sets the value of [last_sync] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return SekolahLongitudinal The current object (for fluent API support)
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
                $this->modifiedColumns[] = SekolahLongitudinalPeer::LAST_SYNC;
            }
        } // if either are not null


        return $this;
    } // setLastSync()

    /**
     * Set the value of [updater_id] column.
     * 
     * @param string $v new value
     * @return SekolahLongitudinal The current object (for fluent API support)
     */
    public function setUpdaterId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->updater_id !== $v) {
            $this->updater_id = $v;
            $this->modifiedColumns[] = SekolahLongitudinalPeer::UPDATER_ID;
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
            if ($this->kontinuitas_listrik !== '1') {
                return false;
            }

            if ($this->partisipasi_bos !== '1') {
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

            $this->sekolah_id = ($row[$startcol + 0] !== null) ? (string) $row[$startcol + 0] : null;
            $this->semester_id = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->waktu_penyelenggaraan_id = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->kontinuitas_listrik = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->jarak_listrik = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->wilayah_terpencil = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->wilayah_perbatasan = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->wilayah_transmigrasi = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->wilayah_adat_terpencil = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->wilayah_bencana_alam = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
            $this->wilayah_bencana_sosial = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
            $this->partisipasi_bos = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
            $this->sertifikasi_iso_id = ($row[$startcol + 12] !== null) ? (int) $row[$startcol + 12] : null;
            $this->sumber_listrik_id = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
            $this->daya_listrik = ($row[$startcol + 14] !== null) ? (string) $row[$startcol + 14] : null;
            $this->akses_internet_id = ($row[$startcol + 15] !== null) ? (int) $row[$startcol + 15] : null;
            $this->akses_internet_2_id = ($row[$startcol + 16] !== null) ? (int) $row[$startcol + 16] : null;
            $this->blob_id = ($row[$startcol + 17] !== null) ? (string) $row[$startcol + 17] : null;
            $this->create_date = ($row[$startcol + 18] !== null) ? (string) $row[$startcol + 18] : null;
            $this->last_update = ($row[$startcol + 19] !== null) ? (string) $row[$startcol + 19] : null;
            $this->soft_delete = ($row[$startcol + 20] !== null) ? (string) $row[$startcol + 20] : null;
            $this->last_sync = ($row[$startcol + 21] !== null) ? (string) $row[$startcol + 21] : null;
            $this->updater_id = ($row[$startcol + 22] !== null) ? (string) $row[$startcol + 22] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 23; // 23 = SekolahLongitudinalPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating SekolahLongitudinal object", $e);
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
        if ($this->aSemester !== null && $this->semester_id !== $this->aSemester->getSemesterId()) {
            $this->aSemester = null;
        }
        if ($this->aWaktuPenyelenggaraan !== null && $this->waktu_penyelenggaraan_id !== $this->aWaktuPenyelenggaraan->getWaktuPenyelenggaraanId()) {
            $this->aWaktuPenyelenggaraan = null;
        }
        if ($this->aSertifikasiIso !== null && $this->sertifikasi_iso_id !== $this->aSertifikasiIso->getSertifikasiIsoId()) {
            $this->aSertifikasiIso = null;
        }
        if ($this->aSumberListrik !== null && $this->sumber_listrik_id !== $this->aSumberListrik->getSumberListrikId()) {
            $this->aSumberListrik = null;
        }
        if ($this->aAksesInternetRelatedByAksesInternetId !== null && $this->akses_internet_id !== $this->aAksesInternetRelatedByAksesInternetId->getAksesInternetId()) {
            $this->aAksesInternetRelatedByAksesInternetId = null;
        }
        if ($this->aAksesInternetRelatedByAksesInternet2Id !== null && $this->akses_internet_2_id !== $this->aAksesInternetRelatedByAksesInternet2Id->getAksesInternetId()) {
            $this->aAksesInternetRelatedByAksesInternet2Id = null;
        }
        if ($this->aLargeObject !== null && $this->blob_id !== $this->aLargeObject->getBlobId()) {
            $this->aLargeObject = null;
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
            $con = Propel::getConnection(SekolahLongitudinalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = SekolahLongitudinalPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aLargeObject = null;
            $this->aSertifikasiIso = null;
            $this->aSekolah = null;
            $this->aSemester = null;
            $this->aSumberListrik = null;
            $this->aWaktuPenyelenggaraan = null;
            $this->aAksesInternetRelatedByAksesInternetId = null;
            $this->aAksesInternetRelatedByAksesInternet2Id = null;
            $this->collJadwals = null;

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
            $con = Propel::getConnection(SekolahLongitudinalPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = SekolahLongitudinalQuery::create()
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
            $con = Propel::getConnection(SekolahLongitudinalPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                SekolahLongitudinalPeer::addInstanceToPool($this);
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

            if ($this->aLargeObject !== null) {
                if ($this->aLargeObject->isModified() || $this->aLargeObject->isNew()) {
                    $affectedRows += $this->aLargeObject->save($con);
                }
                $this->setLargeObject($this->aLargeObject);
            }

            if ($this->aSertifikasiIso !== null) {
                if ($this->aSertifikasiIso->isModified() || $this->aSertifikasiIso->isNew()) {
                    $affectedRows += $this->aSertifikasiIso->save($con);
                }
                $this->setSertifikasiIso($this->aSertifikasiIso);
            }

            if ($this->aSekolah !== null) {
                if ($this->aSekolah->isModified() || $this->aSekolah->isNew()) {
                    $affectedRows += $this->aSekolah->save($con);
                }
                $this->setSekolah($this->aSekolah);
            }

            if ($this->aSemester !== null) {
                if ($this->aSemester->isModified() || $this->aSemester->isNew()) {
                    $affectedRows += $this->aSemester->save($con);
                }
                $this->setSemester($this->aSemester);
            }

            if ($this->aSumberListrik !== null) {
                if ($this->aSumberListrik->isModified() || $this->aSumberListrik->isNew()) {
                    $affectedRows += $this->aSumberListrik->save($con);
                }
                $this->setSumberListrik($this->aSumberListrik);
            }

            if ($this->aWaktuPenyelenggaraan !== null) {
                if ($this->aWaktuPenyelenggaraan->isModified() || $this->aWaktuPenyelenggaraan->isNew()) {
                    $affectedRows += $this->aWaktuPenyelenggaraan->save($con);
                }
                $this->setWaktuPenyelenggaraan($this->aWaktuPenyelenggaraan);
            }

            if ($this->aAksesInternetRelatedByAksesInternetId !== null) {
                if ($this->aAksesInternetRelatedByAksesInternetId->isModified() || $this->aAksesInternetRelatedByAksesInternetId->isNew()) {
                    $affectedRows += $this->aAksesInternetRelatedByAksesInternetId->save($con);
                }
                $this->setAksesInternetRelatedByAksesInternetId($this->aAksesInternetRelatedByAksesInternetId);
            }

            if ($this->aAksesInternetRelatedByAksesInternet2Id !== null) {
                if ($this->aAksesInternetRelatedByAksesInternet2Id->isModified() || $this->aAksesInternetRelatedByAksesInternet2Id->isNew()) {
                    $affectedRows += $this->aAksesInternetRelatedByAksesInternet2Id->save($con);
                }
                $this->setAksesInternetRelatedByAksesInternet2Id($this->aAksesInternetRelatedByAksesInternet2Id);
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

            if ($this->jadwalsScheduledForDeletion !== null) {
                if (!$this->jadwalsScheduledForDeletion->isEmpty()) {
                    JadwalQuery::create()
                        ->filterByPrimaryKeys($this->jadwalsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->jadwalsScheduledForDeletion = null;
                }
            }

            if ($this->collJadwals !== null) {
                foreach ($this->collJadwals as $referrerFK) {
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
        if ($this->isColumnModified(SekolahLongitudinalPeer::SEKOLAH_ID)) {
            $modifiedColumns[':p' . $index++]  = '"sekolah_id"';
        }
        if ($this->isColumnModified(SekolahLongitudinalPeer::SEMESTER_ID)) {
            $modifiedColumns[':p' . $index++]  = '"semester_id"';
        }
        if ($this->isColumnModified(SekolahLongitudinalPeer::WAKTU_PENYELENGGARAAN_ID)) {
            $modifiedColumns[':p' . $index++]  = '"waktu_penyelenggaraan_id"';
        }
        if ($this->isColumnModified(SekolahLongitudinalPeer::KONTINUITAS_LISTRIK)) {
            $modifiedColumns[':p' . $index++]  = '"kontinuitas_listrik"';
        }
        if ($this->isColumnModified(SekolahLongitudinalPeer::JARAK_LISTRIK)) {
            $modifiedColumns[':p' . $index++]  = '"jarak_listrik"';
        }
        if ($this->isColumnModified(SekolahLongitudinalPeer::WILAYAH_TERPENCIL)) {
            $modifiedColumns[':p' . $index++]  = '"wilayah_terpencil"';
        }
        if ($this->isColumnModified(SekolahLongitudinalPeer::WILAYAH_PERBATASAN)) {
            $modifiedColumns[':p' . $index++]  = '"wilayah_perbatasan"';
        }
        if ($this->isColumnModified(SekolahLongitudinalPeer::WILAYAH_TRANSMIGRASI)) {
            $modifiedColumns[':p' . $index++]  = '"wilayah_transmigrasi"';
        }
        if ($this->isColumnModified(SekolahLongitudinalPeer::WILAYAH_ADAT_TERPENCIL)) {
            $modifiedColumns[':p' . $index++]  = '"wilayah_adat_terpencil"';
        }
        if ($this->isColumnModified(SekolahLongitudinalPeer::WILAYAH_BENCANA_ALAM)) {
            $modifiedColumns[':p' . $index++]  = '"wilayah_bencana_alam"';
        }
        if ($this->isColumnModified(SekolahLongitudinalPeer::WILAYAH_BENCANA_SOSIAL)) {
            $modifiedColumns[':p' . $index++]  = '"wilayah_bencana_sosial"';
        }
        if ($this->isColumnModified(SekolahLongitudinalPeer::PARTISIPASI_BOS)) {
            $modifiedColumns[':p' . $index++]  = '"partisipasi_bos"';
        }
        if ($this->isColumnModified(SekolahLongitudinalPeer::SERTIFIKASI_ISO_ID)) {
            $modifiedColumns[':p' . $index++]  = '"sertifikasi_iso_id"';
        }
        if ($this->isColumnModified(SekolahLongitudinalPeer::SUMBER_LISTRIK_ID)) {
            $modifiedColumns[':p' . $index++]  = '"sumber_listrik_id"';
        }
        if ($this->isColumnModified(SekolahLongitudinalPeer::DAYA_LISTRIK)) {
            $modifiedColumns[':p' . $index++]  = '"daya_listrik"';
        }
        if ($this->isColumnModified(SekolahLongitudinalPeer::AKSES_INTERNET_ID)) {
            $modifiedColumns[':p' . $index++]  = '"akses_internet_id"';
        }
        if ($this->isColumnModified(SekolahLongitudinalPeer::AKSES_INTERNET_2_ID)) {
            $modifiedColumns[':p' . $index++]  = '"akses_internet_2_id"';
        }
        if ($this->isColumnModified(SekolahLongitudinalPeer::BLOB_ID)) {
            $modifiedColumns[':p' . $index++]  = '"blob_id"';
        }
        if ($this->isColumnModified(SekolahLongitudinalPeer::CREATE_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"create_date"';
        }
        if ($this->isColumnModified(SekolahLongitudinalPeer::LAST_UPDATE)) {
            $modifiedColumns[':p' . $index++]  = '"last_update"';
        }
        if ($this->isColumnModified(SekolahLongitudinalPeer::SOFT_DELETE)) {
            $modifiedColumns[':p' . $index++]  = '"soft_delete"';
        }
        if ($this->isColumnModified(SekolahLongitudinalPeer::LAST_SYNC)) {
            $modifiedColumns[':p' . $index++]  = '"last_sync"';
        }
        if ($this->isColumnModified(SekolahLongitudinalPeer::UPDATER_ID)) {
            $modifiedColumns[':p' . $index++]  = '"updater_id"';
        }

        $sql = sprintf(
            'INSERT INTO "sekolah_longitudinal" (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '"sekolah_id"':						
                        $stmt->bindValue($identifier, $this->sekolah_id, PDO::PARAM_STR);
                        break;
                    case '"semester_id"':						
                        $stmt->bindValue($identifier, $this->semester_id, PDO::PARAM_STR);
                        break;
                    case '"waktu_penyelenggaraan_id"':						
                        $stmt->bindValue($identifier, $this->waktu_penyelenggaraan_id, PDO::PARAM_STR);
                        break;
                    case '"kontinuitas_listrik"':						
                        $stmt->bindValue($identifier, $this->kontinuitas_listrik, PDO::PARAM_STR);
                        break;
                    case '"jarak_listrik"':						
                        $stmt->bindValue($identifier, $this->jarak_listrik, PDO::PARAM_STR);
                        break;
                    case '"wilayah_terpencil"':						
                        $stmt->bindValue($identifier, $this->wilayah_terpencil, PDO::PARAM_STR);
                        break;
                    case '"wilayah_perbatasan"':						
                        $stmt->bindValue($identifier, $this->wilayah_perbatasan, PDO::PARAM_STR);
                        break;
                    case '"wilayah_transmigrasi"':						
                        $stmt->bindValue($identifier, $this->wilayah_transmigrasi, PDO::PARAM_STR);
                        break;
                    case '"wilayah_adat_terpencil"':						
                        $stmt->bindValue($identifier, $this->wilayah_adat_terpencil, PDO::PARAM_STR);
                        break;
                    case '"wilayah_bencana_alam"':						
                        $stmt->bindValue($identifier, $this->wilayah_bencana_alam, PDO::PARAM_STR);
                        break;
                    case '"wilayah_bencana_sosial"':						
                        $stmt->bindValue($identifier, $this->wilayah_bencana_sosial, PDO::PARAM_STR);
                        break;
                    case '"partisipasi_bos"':						
                        $stmt->bindValue($identifier, $this->partisipasi_bos, PDO::PARAM_STR);
                        break;
                    case '"sertifikasi_iso_id"':						
                        $stmt->bindValue($identifier, $this->sertifikasi_iso_id, PDO::PARAM_INT);
                        break;
                    case '"sumber_listrik_id"':						
                        $stmt->bindValue($identifier, $this->sumber_listrik_id, PDO::PARAM_STR);
                        break;
                    case '"daya_listrik"':						
                        $stmt->bindValue($identifier, $this->daya_listrik, PDO::PARAM_STR);
                        break;
                    case '"akses_internet_id"':						
                        $stmt->bindValue($identifier, $this->akses_internet_id, PDO::PARAM_INT);
                        break;
                    case '"akses_internet_2_id"':						
                        $stmt->bindValue($identifier, $this->akses_internet_2_id, PDO::PARAM_INT);
                        break;
                    case '"blob_id"':						
                        $stmt->bindValue($identifier, $this->blob_id, PDO::PARAM_STR);
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

            if ($this->aLargeObject !== null) {
                if (!$this->aLargeObject->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aLargeObject->getValidationFailures());
                }
            }

            if ($this->aSertifikasiIso !== null) {
                if (!$this->aSertifikasiIso->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aSertifikasiIso->getValidationFailures());
                }
            }

            if ($this->aSekolah !== null) {
                if (!$this->aSekolah->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aSekolah->getValidationFailures());
                }
            }

            if ($this->aSemester !== null) {
                if (!$this->aSemester->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aSemester->getValidationFailures());
                }
            }

            if ($this->aSumberListrik !== null) {
                if (!$this->aSumberListrik->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aSumberListrik->getValidationFailures());
                }
            }

            if ($this->aWaktuPenyelenggaraan !== null) {
                if (!$this->aWaktuPenyelenggaraan->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aWaktuPenyelenggaraan->getValidationFailures());
                }
            }

            if ($this->aAksesInternetRelatedByAksesInternetId !== null) {
                if (!$this->aAksesInternetRelatedByAksesInternetId->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aAksesInternetRelatedByAksesInternetId->getValidationFailures());
                }
            }

            if ($this->aAksesInternetRelatedByAksesInternet2Id !== null) {
                if (!$this->aAksesInternetRelatedByAksesInternet2Id->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aAksesInternetRelatedByAksesInternet2Id->getValidationFailures());
                }
            }


            if (($retval = SekolahLongitudinalPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collJadwals !== null) {
                    foreach ($this->collJadwals as $referrerFK) {
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
        $pos = SekolahLongitudinalPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getSekolahId();
                break;
            case 1:
                return $this->getSemesterId();
                break;
            case 2:
                return $this->getWaktuPenyelenggaraanId();
                break;
            case 3:
                return $this->getKontinuitasListrik();
                break;
            case 4:
                return $this->getJarakListrik();
                break;
            case 5:
                return $this->getWilayahTerpencil();
                break;
            case 6:
                return $this->getWilayahPerbatasan();
                break;
            case 7:
                return $this->getWilayahTransmigrasi();
                break;
            case 8:
                return $this->getWilayahAdatTerpencil();
                break;
            case 9:
                return $this->getWilayahBencanaAlam();
                break;
            case 10:
                return $this->getWilayahBencanaSosial();
                break;
            case 11:
                return $this->getPartisipasiBos();
                break;
            case 12:
                return $this->getSertifikasiIsoId();
                break;
            case 13:
                return $this->getSumberListrikId();
                break;
            case 14:
                return $this->getDayaListrik();
                break;
            case 15:
                return $this->getAksesInternetId();
                break;
            case 16:
                return $this->getAksesInternet2Id();
                break;
            case 17:
                return $this->getBlobId();
                break;
            case 18:
                return $this->getCreateDate();
                break;
            case 19:
                return $this->getLastUpdate();
                break;
            case 20:
                return $this->getSoftDelete();
                break;
            case 21:
                return $this->getLastSync();
                break;
            case 22:
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
        if (isset($alreadyDumpedObjects['SekolahLongitudinal'][serialize($this->getPrimaryKey())])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['SekolahLongitudinal'][serialize($this->getPrimaryKey())] = true;
        $keys = SekolahLongitudinalPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getSekolahId(),
            $keys[1] => $this->getSemesterId(),
            $keys[2] => $this->getWaktuPenyelenggaraanId(),
            $keys[3] => $this->getKontinuitasListrik(),
            $keys[4] => $this->getJarakListrik(),
            $keys[5] => $this->getWilayahTerpencil(),
            $keys[6] => $this->getWilayahPerbatasan(),
            $keys[7] => $this->getWilayahTransmigrasi(),
            $keys[8] => $this->getWilayahAdatTerpencil(),
            $keys[9] => $this->getWilayahBencanaAlam(),
            $keys[10] => $this->getWilayahBencanaSosial(),
            $keys[11] => $this->getPartisipasiBos(),
            $keys[12] => $this->getSertifikasiIsoId(),
            $keys[13] => $this->getSumberListrikId(),
            $keys[14] => $this->getDayaListrik(),
            $keys[15] => $this->getAksesInternetId(),
            $keys[16] => $this->getAksesInternet2Id(),
            $keys[17] => $this->getBlobId(),
            $keys[18] => $this->getCreateDate(),
            $keys[19] => $this->getLastUpdate(),
            $keys[20] => $this->getSoftDelete(),
            $keys[21] => $this->getLastSync(),
            $keys[22] => $this->getUpdaterId(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aLargeObject) {
                $result['LargeObject'] = $this->aLargeObject->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aSertifikasiIso) {
                $result['SertifikasiIso'] = $this->aSertifikasiIso->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aSekolah) {
                $result['Sekolah'] = $this->aSekolah->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aSemester) {
                $result['Semester'] = $this->aSemester->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aSumberListrik) {
                $result['SumberListrik'] = $this->aSumberListrik->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aWaktuPenyelenggaraan) {
                $result['WaktuPenyelenggaraan'] = $this->aWaktuPenyelenggaraan->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aAksesInternetRelatedByAksesInternetId) {
                $result['AksesInternetRelatedByAksesInternetId'] = $this->aAksesInternetRelatedByAksesInternetId->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aAksesInternetRelatedByAksesInternet2Id) {
                $result['AksesInternetRelatedByAksesInternet2Id'] = $this->aAksesInternetRelatedByAksesInternet2Id->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collJadwals) {
                $result['Jadwals'] = $this->collJadwals->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = SekolahLongitudinalPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setSekolahId($value);
                break;
            case 1:
                $this->setSemesterId($value);
                break;
            case 2:
                $this->setWaktuPenyelenggaraanId($value);
                break;
            case 3:
                $this->setKontinuitasListrik($value);
                break;
            case 4:
                $this->setJarakListrik($value);
                break;
            case 5:
                $this->setWilayahTerpencil($value);
                break;
            case 6:
                $this->setWilayahPerbatasan($value);
                break;
            case 7:
                $this->setWilayahTransmigrasi($value);
                break;
            case 8:
                $this->setWilayahAdatTerpencil($value);
                break;
            case 9:
                $this->setWilayahBencanaAlam($value);
                break;
            case 10:
                $this->setWilayahBencanaSosial($value);
                break;
            case 11:
                $this->setPartisipasiBos($value);
                break;
            case 12:
                $this->setSertifikasiIsoId($value);
                break;
            case 13:
                $this->setSumberListrikId($value);
                break;
            case 14:
                $this->setDayaListrik($value);
                break;
            case 15:
                $this->setAksesInternetId($value);
                break;
            case 16:
                $this->setAksesInternet2Id($value);
                break;
            case 17:
                $this->setBlobId($value);
                break;
            case 18:
                $this->setCreateDate($value);
                break;
            case 19:
                $this->setLastUpdate($value);
                break;
            case 20:
                $this->setSoftDelete($value);
                break;
            case 21:
                $this->setLastSync($value);
                break;
            case 22:
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
        $keys = SekolahLongitudinalPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setSekolahId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setSemesterId($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setWaktuPenyelenggaraanId($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setKontinuitasListrik($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setJarakListrik($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setWilayahTerpencil($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setWilayahPerbatasan($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setWilayahTransmigrasi($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setWilayahAdatTerpencil($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setWilayahBencanaAlam($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setWilayahBencanaSosial($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setPartisipasiBos($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setSertifikasiIsoId($arr[$keys[12]]);
        if (array_key_exists($keys[13], $arr)) $this->setSumberListrikId($arr[$keys[13]]);
        if (array_key_exists($keys[14], $arr)) $this->setDayaListrik($arr[$keys[14]]);
        if (array_key_exists($keys[15], $arr)) $this->setAksesInternetId($arr[$keys[15]]);
        if (array_key_exists($keys[16], $arr)) $this->setAksesInternet2Id($arr[$keys[16]]);
        if (array_key_exists($keys[17], $arr)) $this->setBlobId($arr[$keys[17]]);
        if (array_key_exists($keys[18], $arr)) $this->setCreateDate($arr[$keys[18]]);
        if (array_key_exists($keys[19], $arr)) $this->setLastUpdate($arr[$keys[19]]);
        if (array_key_exists($keys[20], $arr)) $this->setSoftDelete($arr[$keys[20]]);
        if (array_key_exists($keys[21], $arr)) $this->setLastSync($arr[$keys[21]]);
        if (array_key_exists($keys[22], $arr)) $this->setUpdaterId($arr[$keys[22]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(SekolahLongitudinalPeer::DATABASE_NAME);

        if ($this->isColumnModified(SekolahLongitudinalPeer::SEKOLAH_ID)) $criteria->add(SekolahLongitudinalPeer::SEKOLAH_ID, $this->sekolah_id);
        if ($this->isColumnModified(SekolahLongitudinalPeer::SEMESTER_ID)) $criteria->add(SekolahLongitudinalPeer::SEMESTER_ID, $this->semester_id);
        if ($this->isColumnModified(SekolahLongitudinalPeer::WAKTU_PENYELENGGARAAN_ID)) $criteria->add(SekolahLongitudinalPeer::WAKTU_PENYELENGGARAAN_ID, $this->waktu_penyelenggaraan_id);
        if ($this->isColumnModified(SekolahLongitudinalPeer::KONTINUITAS_LISTRIK)) $criteria->add(SekolahLongitudinalPeer::KONTINUITAS_LISTRIK, $this->kontinuitas_listrik);
        if ($this->isColumnModified(SekolahLongitudinalPeer::JARAK_LISTRIK)) $criteria->add(SekolahLongitudinalPeer::JARAK_LISTRIK, $this->jarak_listrik);
        if ($this->isColumnModified(SekolahLongitudinalPeer::WILAYAH_TERPENCIL)) $criteria->add(SekolahLongitudinalPeer::WILAYAH_TERPENCIL, $this->wilayah_terpencil);
        if ($this->isColumnModified(SekolahLongitudinalPeer::WILAYAH_PERBATASAN)) $criteria->add(SekolahLongitudinalPeer::WILAYAH_PERBATASAN, $this->wilayah_perbatasan);
        if ($this->isColumnModified(SekolahLongitudinalPeer::WILAYAH_TRANSMIGRASI)) $criteria->add(SekolahLongitudinalPeer::WILAYAH_TRANSMIGRASI, $this->wilayah_transmigrasi);
        if ($this->isColumnModified(SekolahLongitudinalPeer::WILAYAH_ADAT_TERPENCIL)) $criteria->add(SekolahLongitudinalPeer::WILAYAH_ADAT_TERPENCIL, $this->wilayah_adat_terpencil);
        if ($this->isColumnModified(SekolahLongitudinalPeer::WILAYAH_BENCANA_ALAM)) $criteria->add(SekolahLongitudinalPeer::WILAYAH_BENCANA_ALAM, $this->wilayah_bencana_alam);
        if ($this->isColumnModified(SekolahLongitudinalPeer::WILAYAH_BENCANA_SOSIAL)) $criteria->add(SekolahLongitudinalPeer::WILAYAH_BENCANA_SOSIAL, $this->wilayah_bencana_sosial);
        if ($this->isColumnModified(SekolahLongitudinalPeer::PARTISIPASI_BOS)) $criteria->add(SekolahLongitudinalPeer::PARTISIPASI_BOS, $this->partisipasi_bos);
        if ($this->isColumnModified(SekolahLongitudinalPeer::SERTIFIKASI_ISO_ID)) $criteria->add(SekolahLongitudinalPeer::SERTIFIKASI_ISO_ID, $this->sertifikasi_iso_id);
        if ($this->isColumnModified(SekolahLongitudinalPeer::SUMBER_LISTRIK_ID)) $criteria->add(SekolahLongitudinalPeer::SUMBER_LISTRIK_ID, $this->sumber_listrik_id);
        if ($this->isColumnModified(SekolahLongitudinalPeer::DAYA_LISTRIK)) $criteria->add(SekolahLongitudinalPeer::DAYA_LISTRIK, $this->daya_listrik);
        if ($this->isColumnModified(SekolahLongitudinalPeer::AKSES_INTERNET_ID)) $criteria->add(SekolahLongitudinalPeer::AKSES_INTERNET_ID, $this->akses_internet_id);
        if ($this->isColumnModified(SekolahLongitudinalPeer::AKSES_INTERNET_2_ID)) $criteria->add(SekolahLongitudinalPeer::AKSES_INTERNET_2_ID, $this->akses_internet_2_id);
        if ($this->isColumnModified(SekolahLongitudinalPeer::BLOB_ID)) $criteria->add(SekolahLongitudinalPeer::BLOB_ID, $this->blob_id);
        if ($this->isColumnModified(SekolahLongitudinalPeer::CREATE_DATE)) $criteria->add(SekolahLongitudinalPeer::CREATE_DATE, $this->create_date);
        if ($this->isColumnModified(SekolahLongitudinalPeer::LAST_UPDATE)) $criteria->add(SekolahLongitudinalPeer::LAST_UPDATE, $this->last_update);
        if ($this->isColumnModified(SekolahLongitudinalPeer::SOFT_DELETE)) $criteria->add(SekolahLongitudinalPeer::SOFT_DELETE, $this->soft_delete);
        if ($this->isColumnModified(SekolahLongitudinalPeer::LAST_SYNC)) $criteria->add(SekolahLongitudinalPeer::LAST_SYNC, $this->last_sync);
        if ($this->isColumnModified(SekolahLongitudinalPeer::UPDATER_ID)) $criteria->add(SekolahLongitudinalPeer::UPDATER_ID, $this->updater_id);

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
        $criteria = new Criteria(SekolahLongitudinalPeer::DATABASE_NAME);
        $criteria->add(SekolahLongitudinalPeer::SEKOLAH_ID, $this->sekolah_id);
        $criteria->add(SekolahLongitudinalPeer::SEMESTER_ID, $this->semester_id);

        return $criteria;
    }

    /**
     * Returns the composite primary key for this object.
     * The array elements will be in same order as specified in XML.
     * @return array
     */
    public function getPrimaryKey()
    {
        $pks = array();
        $pks[0] = $this->getSekolahId();
        $pks[1] = $this->getSemesterId();

        return $pks;
    }

    /**
     * Set the [composite] primary key.
     *
     * @param array $keys The elements of the composite key (order must match the order in XML file).
     * @return void
     */
    public function setPrimaryKey($keys)
    {
        $this->setSekolahId($keys[0]);
        $this->setSemesterId($keys[1]);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return (null === $this->getSekolahId()) && (null === $this->getSemesterId());
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of SekolahLongitudinal (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setSekolahId($this->getSekolahId());
        $copyObj->setSemesterId($this->getSemesterId());
        $copyObj->setWaktuPenyelenggaraanId($this->getWaktuPenyelenggaraanId());
        $copyObj->setKontinuitasListrik($this->getKontinuitasListrik());
        $copyObj->setJarakListrik($this->getJarakListrik());
        $copyObj->setWilayahTerpencil($this->getWilayahTerpencil());
        $copyObj->setWilayahPerbatasan($this->getWilayahPerbatasan());
        $copyObj->setWilayahTransmigrasi($this->getWilayahTransmigrasi());
        $copyObj->setWilayahAdatTerpencil($this->getWilayahAdatTerpencil());
        $copyObj->setWilayahBencanaAlam($this->getWilayahBencanaAlam());
        $copyObj->setWilayahBencanaSosial($this->getWilayahBencanaSosial());
        $copyObj->setPartisipasiBos($this->getPartisipasiBos());
        $copyObj->setSertifikasiIsoId($this->getSertifikasiIsoId());
        $copyObj->setSumberListrikId($this->getSumberListrikId());
        $copyObj->setDayaListrik($this->getDayaListrik());
        $copyObj->setAksesInternetId($this->getAksesInternetId());
        $copyObj->setAksesInternet2Id($this->getAksesInternet2Id());
        $copyObj->setBlobId($this->getBlobId());
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

            foreach ($this->getJadwals() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addJadwal($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
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
     * @return SekolahLongitudinal Clone of current object.
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
     * @return SekolahLongitudinalPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new SekolahLongitudinalPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a LargeObject object.
     *
     * @param             LargeObject $v
     * @return SekolahLongitudinal The current object (for fluent API support)
     * @throws PropelException
     */
    public function setLargeObject(LargeObject $v = null)
    {
        if ($v === null) {
            $this->setBlobId(NULL);
        } else {
            $this->setBlobId($v->getBlobId());
        }

        $this->aLargeObject = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the LargeObject object, it will not be re-added.
        if ($v !== null) {
            $v->addSekolahLongitudinal($this);
        }


        return $this;
    }


    /**
     * Get the associated LargeObject object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return LargeObject The associated LargeObject object.
     * @throws PropelException
     */
    public function getLargeObject(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aLargeObject === null && (($this->blob_id !== "" && $this->blob_id !== null)) && $doQuery) {
            $this->aLargeObject = LargeObjectQuery::create()->findPk($this->blob_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aLargeObject->addSekolahLongitudinals($this);
             */
        }

        return $this->aLargeObject;
    }

    /**
     * Declares an association between this object and a SertifikasiIso object.
     *
     * @param             SertifikasiIso $v
     * @return SekolahLongitudinal The current object (for fluent API support)
     * @throws PropelException
     */
    public function setSertifikasiIso(SertifikasiIso $v = null)
    {
        if ($v === null) {
            $this->setSertifikasiIsoId(NULL);
        } else {
            $this->setSertifikasiIsoId($v->getSertifikasiIsoId());
        }

        $this->aSertifikasiIso = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the SertifikasiIso object, it will not be re-added.
        if ($v !== null) {
            $v->addSekolahLongitudinal($this);
        }


        return $this;
    }


    /**
     * Get the associated SertifikasiIso object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return SertifikasiIso The associated SertifikasiIso object.
     * @throws PropelException
     */
    public function getSertifikasiIso(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aSertifikasiIso === null && ($this->sertifikasi_iso_id !== null) && $doQuery) {
            $this->aSertifikasiIso = SertifikasiIsoQuery::create()->findPk($this->sertifikasi_iso_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aSertifikasiIso->addSekolahLongitudinals($this);
             */
        }

        return $this->aSertifikasiIso;
    }

    /**
     * Declares an association between this object and a Sekolah object.
     *
     * @param             Sekolah $v
     * @return SekolahLongitudinal The current object (for fluent API support)
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
            $v->addSekolahLongitudinal($this);
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
                $this->aSekolah->addSekolahLongitudinals($this);
             */
        }

        return $this->aSekolah;
    }

    /**
     * Declares an association between this object and a Semester object.
     *
     * @param             Semester $v
     * @return SekolahLongitudinal The current object (for fluent API support)
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
            $v->addSekolahLongitudinal($this);
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
                $this->aSemester->addSekolahLongitudinals($this);
             */
        }

        return $this->aSemester;
    }

    /**
     * Declares an association between this object and a SumberListrik object.
     *
     * @param             SumberListrik $v
     * @return SekolahLongitudinal The current object (for fluent API support)
     * @throws PropelException
     */
    public function setSumberListrik(SumberListrik $v = null)
    {
        if ($v === null) {
            $this->setSumberListrikId(NULL);
        } else {
            $this->setSumberListrikId($v->getSumberListrikId());
        }

        $this->aSumberListrik = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the SumberListrik object, it will not be re-added.
        if ($v !== null) {
            $v->addSekolahLongitudinal($this);
        }


        return $this;
    }


    /**
     * Get the associated SumberListrik object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return SumberListrik The associated SumberListrik object.
     * @throws PropelException
     */
    public function getSumberListrik(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aSumberListrik === null && (($this->sumber_listrik_id !== "" && $this->sumber_listrik_id !== null)) && $doQuery) {
            $this->aSumberListrik = SumberListrikQuery::create()->findPk($this->sumber_listrik_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aSumberListrik->addSekolahLongitudinals($this);
             */
        }

        return $this->aSumberListrik;
    }

    /**
     * Declares an association between this object and a WaktuPenyelenggaraan object.
     *
     * @param             WaktuPenyelenggaraan $v
     * @return SekolahLongitudinal The current object (for fluent API support)
     * @throws PropelException
     */
    public function setWaktuPenyelenggaraan(WaktuPenyelenggaraan $v = null)
    {
        if ($v === null) {
            $this->setWaktuPenyelenggaraanId(NULL);
        } else {
            $this->setWaktuPenyelenggaraanId($v->getWaktuPenyelenggaraanId());
        }

        $this->aWaktuPenyelenggaraan = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the WaktuPenyelenggaraan object, it will not be re-added.
        if ($v !== null) {
            $v->addSekolahLongitudinal($this);
        }


        return $this;
    }


    /**
     * Get the associated WaktuPenyelenggaraan object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return WaktuPenyelenggaraan The associated WaktuPenyelenggaraan object.
     * @throws PropelException
     */
    public function getWaktuPenyelenggaraan(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aWaktuPenyelenggaraan === null && (($this->waktu_penyelenggaraan_id !== "" && $this->waktu_penyelenggaraan_id !== null)) && $doQuery) {
            $this->aWaktuPenyelenggaraan = WaktuPenyelenggaraanQuery::create()->findPk($this->waktu_penyelenggaraan_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aWaktuPenyelenggaraan->addSekolahLongitudinals($this);
             */
        }

        return $this->aWaktuPenyelenggaraan;
    }

    /**
     * Declares an association between this object and a AksesInternet object.
     *
     * @param             AksesInternet $v
     * @return SekolahLongitudinal The current object (for fluent API support)
     * @throws PropelException
     */
    public function setAksesInternetRelatedByAksesInternetId(AksesInternet $v = null)
    {
        if ($v === null) {
            $this->setAksesInternetId(NULL);
        } else {
            $this->setAksesInternetId($v->getAksesInternetId());
        }

        $this->aAksesInternetRelatedByAksesInternetId = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the AksesInternet object, it will not be re-added.
        if ($v !== null) {
            $v->addSekolahLongitudinalRelatedByAksesInternetId($this);
        }


        return $this;
    }


    /**
     * Get the associated AksesInternet object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return AksesInternet The associated AksesInternet object.
     * @throws PropelException
     */
    public function getAksesInternetRelatedByAksesInternetId(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aAksesInternetRelatedByAksesInternetId === null && ($this->akses_internet_id !== null) && $doQuery) {
            $this->aAksesInternetRelatedByAksesInternetId = AksesInternetQuery::create()->findPk($this->akses_internet_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aAksesInternetRelatedByAksesInternetId->addSekolahLongitudinalsRelatedByAksesInternetId($this);
             */
        }

        return $this->aAksesInternetRelatedByAksesInternetId;
    }

    /**
     * Declares an association between this object and a AksesInternet object.
     *
     * @param             AksesInternet $v
     * @return SekolahLongitudinal The current object (for fluent API support)
     * @throws PropelException
     */
    public function setAksesInternetRelatedByAksesInternet2Id(AksesInternet $v = null)
    {
        if ($v === null) {
            $this->setAksesInternet2Id(NULL);
        } else {
            $this->setAksesInternet2Id($v->getAksesInternetId());
        }

        $this->aAksesInternetRelatedByAksesInternet2Id = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the AksesInternet object, it will not be re-added.
        if ($v !== null) {
            $v->addSekolahLongitudinalRelatedByAksesInternet2Id($this);
        }


        return $this;
    }


    /**
     * Get the associated AksesInternet object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return AksesInternet The associated AksesInternet object.
     * @throws PropelException
     */
    public function getAksesInternetRelatedByAksesInternet2Id(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aAksesInternetRelatedByAksesInternet2Id === null && ($this->akses_internet_2_id !== null) && $doQuery) {
            $this->aAksesInternetRelatedByAksesInternet2Id = AksesInternetQuery::create()->findPk($this->akses_internet_2_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aAksesInternetRelatedByAksesInternet2Id->addSekolahLongitudinalsRelatedByAksesInternet2Id($this);
             */
        }

        return $this->aAksesInternetRelatedByAksesInternet2Id;
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
        if ('Jadwal' == $relationName) {
            $this->initJadwals();
        }
    }

    /**
     * Clears out the collJadwals collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return SekolahLongitudinal The current object (for fluent API support)
     * @see        addJadwals()
     */
    public function clearJadwals()
    {
        $this->collJadwals = null; // important to set this to null since that means it is uninitialized
        $this->collJadwalsPartial = null;

        return $this;
    }

    /**
     * reset is the collJadwals collection loaded partially
     *
     * @return void
     */
    public function resetPartialJadwals($v = true)
    {
        $this->collJadwalsPartial = $v;
    }

    /**
     * Initializes the collJadwals collection.
     *
     * By default this just sets the collJadwals collection to an empty array (like clearcollJadwals());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initJadwals($overrideExisting = true)
    {
        if (null !== $this->collJadwals && !$overrideExisting) {
            return;
        }
        $this->collJadwals = new PropelObjectCollection();
        $this->collJadwals->setModel('Jadwal');
    }

    /**
     * Gets an array of Jadwal objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this SekolahLongitudinal is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Jadwal[] List of Jadwal objects
     * @throws PropelException
     */
    public function getJadwals($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collJadwalsPartial && !$this->isNew();
        if (null === $this->collJadwals || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collJadwals) {
                // return empty collection
                $this->initJadwals();
            } else {
                $collJadwals = JadwalQuery::create(null, $criteria)
                    ->filterBySekolahLongitudinal($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collJadwalsPartial && count($collJadwals)) {
                      $this->initJadwals(false);

                      foreach($collJadwals as $obj) {
                        if (false == $this->collJadwals->contains($obj)) {
                          $this->collJadwals->append($obj);
                        }
                      }

                      $this->collJadwalsPartial = true;
                    }

                    $collJadwals->getInternalIterator()->rewind();
                    return $collJadwals;
                }

                if($partial && $this->collJadwals) {
                    foreach($this->collJadwals as $obj) {
                        if($obj->isNew()) {
                            $collJadwals[] = $obj;
                        }
                    }
                }

                $this->collJadwals = $collJadwals;
                $this->collJadwalsPartial = false;
            }
        }

        return $this->collJadwals;
    }

    /**
     * Sets a collection of Jadwal objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $jadwals A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return SekolahLongitudinal The current object (for fluent API support)
     */
    public function setJadwals(PropelCollection $jadwals, PropelPDO $con = null)
    {
        $jadwalsToDelete = $this->getJadwals(new Criteria(), $con)->diff($jadwals);

        $this->jadwalsScheduledForDeletion = unserialize(serialize($jadwalsToDelete));

        foreach ($jadwalsToDelete as $jadwalRemoved) {
            $jadwalRemoved->setSekolahLongitudinal(null);
        }

        $this->collJadwals = null;
        foreach ($jadwals as $jadwal) {
            $this->addJadwal($jadwal);
        }

        $this->collJadwals = $jadwals;
        $this->collJadwalsPartial = false;

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
    public function countJadwals(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collJadwalsPartial && !$this->isNew();
        if (null === $this->collJadwals || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collJadwals) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getJadwals());
            }
            $query = JadwalQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterBySekolahLongitudinal($this)
                ->count($con);
        }

        return count($this->collJadwals);
    }

    /**
     * Method called to associate a Jadwal object to this object
     * through the Jadwal foreign key attribute.
     *
     * @param    Jadwal $l Jadwal
     * @return SekolahLongitudinal The current object (for fluent API support)
     */
    public function addJadwal(Jadwal $l)
    {
        if ($this->collJadwals === null) {
            $this->initJadwals();
            $this->collJadwalsPartial = true;
        }
        if (!in_array($l, $this->collJadwals->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddJadwal($l);
        }

        return $this;
    }

    /**
     * @param	Jadwal $jadwal The jadwal object to add.
     */
    protected function doAddJadwal($jadwal)
    {
        $this->collJadwals[]= $jadwal;
        $jadwal->setSekolahLongitudinal($this);
    }

    /**
     * @param	Jadwal $jadwal The jadwal object to remove.
     * @return SekolahLongitudinal The current object (for fluent API support)
     */
    public function removeJadwal($jadwal)
    {
        if ($this->getJadwals()->contains($jadwal)) {
            $this->collJadwals->remove($this->collJadwals->search($jadwal));
            if (null === $this->jadwalsScheduledForDeletion) {
                $this->jadwalsScheduledForDeletion = clone $this->collJadwals;
                $this->jadwalsScheduledForDeletion->clear();
            }
            $this->jadwalsScheduledForDeletion[]= clone $jadwal;
            $jadwal->setSekolahLongitudinal(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SekolahLongitudinal is new, it will return
     * an empty collection; or if this SekolahLongitudinal has previously
     * been saved, it will retrieve related Jadwals from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SekolahLongitudinal.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Jadwal[] List of Jadwal objects
     */
    public function getJadwalsJoinRuang($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = JadwalQuery::create(null, $criteria);
        $query->joinWith('Ruang', $join_behavior);

        return $this->getJadwals($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SekolahLongitudinal is new, it will return
     * an empty collection; or if this SekolahLongitudinal has previously
     * been saved, it will retrieve related Jadwals from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SekolahLongitudinal.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Jadwal[] List of Jadwal objects
     */
    public function getJadwalsJoinPembelajaranRelatedByBelKe01($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = JadwalQuery::create(null, $criteria);
        $query->joinWith('PembelajaranRelatedByBelKe01', $join_behavior);

        return $this->getJadwals($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SekolahLongitudinal is new, it will return
     * an empty collection; or if this SekolahLongitudinal has previously
     * been saved, it will retrieve related Jadwals from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SekolahLongitudinal.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Jadwal[] List of Jadwal objects
     */
    public function getJadwalsJoinPembelajaranRelatedByBelKe02($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = JadwalQuery::create(null, $criteria);
        $query->joinWith('PembelajaranRelatedByBelKe02', $join_behavior);

        return $this->getJadwals($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SekolahLongitudinal is new, it will return
     * an empty collection; or if this SekolahLongitudinal has previously
     * been saved, it will retrieve related Jadwals from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SekolahLongitudinal.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Jadwal[] List of Jadwal objects
     */
    public function getJadwalsJoinPembelajaranRelatedByBelKe03($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = JadwalQuery::create(null, $criteria);
        $query->joinWith('PembelajaranRelatedByBelKe03', $join_behavior);

        return $this->getJadwals($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SekolahLongitudinal is new, it will return
     * an empty collection; or if this SekolahLongitudinal has previously
     * been saved, it will retrieve related Jadwals from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SekolahLongitudinal.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Jadwal[] List of Jadwal objects
     */
    public function getJadwalsJoinPembelajaranRelatedByBelKe04($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = JadwalQuery::create(null, $criteria);
        $query->joinWith('PembelajaranRelatedByBelKe04', $join_behavior);

        return $this->getJadwals($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SekolahLongitudinal is new, it will return
     * an empty collection; or if this SekolahLongitudinal has previously
     * been saved, it will retrieve related Jadwals from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SekolahLongitudinal.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Jadwal[] List of Jadwal objects
     */
    public function getJadwalsJoinPembelajaranRelatedByBelKe05($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = JadwalQuery::create(null, $criteria);
        $query->joinWith('PembelajaranRelatedByBelKe05', $join_behavior);

        return $this->getJadwals($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SekolahLongitudinal is new, it will return
     * an empty collection; or if this SekolahLongitudinal has previously
     * been saved, it will retrieve related Jadwals from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SekolahLongitudinal.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Jadwal[] List of Jadwal objects
     */
    public function getJadwalsJoinPembelajaranRelatedByBelKe06($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = JadwalQuery::create(null, $criteria);
        $query->joinWith('PembelajaranRelatedByBelKe06', $join_behavior);

        return $this->getJadwals($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SekolahLongitudinal is new, it will return
     * an empty collection; or if this SekolahLongitudinal has previously
     * been saved, it will retrieve related Jadwals from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SekolahLongitudinal.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Jadwal[] List of Jadwal objects
     */
    public function getJadwalsJoinPembelajaranRelatedByBelKe07($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = JadwalQuery::create(null, $criteria);
        $query->joinWith('PembelajaranRelatedByBelKe07', $join_behavior);

        return $this->getJadwals($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SekolahLongitudinal is new, it will return
     * an empty collection; or if this SekolahLongitudinal has previously
     * been saved, it will retrieve related Jadwals from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SekolahLongitudinal.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Jadwal[] List of Jadwal objects
     */
    public function getJadwalsJoinPembelajaranRelatedByBelKe08($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = JadwalQuery::create(null, $criteria);
        $query->joinWith('PembelajaranRelatedByBelKe08', $join_behavior);

        return $this->getJadwals($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SekolahLongitudinal is new, it will return
     * an empty collection; or if this SekolahLongitudinal has previously
     * been saved, it will retrieve related Jadwals from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SekolahLongitudinal.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Jadwal[] List of Jadwal objects
     */
    public function getJadwalsJoinPembelajaranRelatedByBelKe09($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = JadwalQuery::create(null, $criteria);
        $query->joinWith('PembelajaranRelatedByBelKe09', $join_behavior);

        return $this->getJadwals($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SekolahLongitudinal is new, it will return
     * an empty collection; or if this SekolahLongitudinal has previously
     * been saved, it will retrieve related Jadwals from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SekolahLongitudinal.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Jadwal[] List of Jadwal objects
     */
    public function getJadwalsJoinPembelajaranRelatedByBelKe10($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = JadwalQuery::create(null, $criteria);
        $query->joinWith('PembelajaranRelatedByBelKe10', $join_behavior);

        return $this->getJadwals($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SekolahLongitudinal is new, it will return
     * an empty collection; or if this SekolahLongitudinal has previously
     * been saved, it will retrieve related Jadwals from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SekolahLongitudinal.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Jadwal[] List of Jadwal objects
     */
    public function getJadwalsJoinPembelajaranRelatedByBelKe11($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = JadwalQuery::create(null, $criteria);
        $query->joinWith('PembelajaranRelatedByBelKe11', $join_behavior);

        return $this->getJadwals($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SekolahLongitudinal is new, it will return
     * an empty collection; or if this SekolahLongitudinal has previously
     * been saved, it will retrieve related Jadwals from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SekolahLongitudinal.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Jadwal[] List of Jadwal objects
     */
    public function getJadwalsJoinPembelajaranRelatedByBelKe12($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = JadwalQuery::create(null, $criteria);
        $query->joinWith('PembelajaranRelatedByBelKe12', $join_behavior);

        return $this->getJadwals($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SekolahLongitudinal is new, it will return
     * an empty collection; or if this SekolahLongitudinal has previously
     * been saved, it will retrieve related Jadwals from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SekolahLongitudinal.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Jadwal[] List of Jadwal objects
     */
    public function getJadwalsJoinPembelajaranRelatedByBelKe13($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = JadwalQuery::create(null, $criteria);
        $query->joinWith('PembelajaranRelatedByBelKe13', $join_behavior);

        return $this->getJadwals($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SekolahLongitudinal is new, it will return
     * an empty collection; or if this SekolahLongitudinal has previously
     * been saved, it will retrieve related Jadwals from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SekolahLongitudinal.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Jadwal[] List of Jadwal objects
     */
    public function getJadwalsJoinPembelajaranRelatedByBelKe14($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = JadwalQuery::create(null, $criteria);
        $query->joinWith('PembelajaranRelatedByBelKe14', $join_behavior);

        return $this->getJadwals($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SekolahLongitudinal is new, it will return
     * an empty collection; or if this SekolahLongitudinal has previously
     * been saved, it will retrieve related Jadwals from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SekolahLongitudinal.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Jadwal[] List of Jadwal objects
     */
    public function getJadwalsJoinPembelajaranRelatedByBelKe15($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = JadwalQuery::create(null, $criteria);
        $query->joinWith('PembelajaranRelatedByBelKe15', $join_behavior);

        return $this->getJadwals($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SekolahLongitudinal is new, it will return
     * an empty collection; or if this SekolahLongitudinal has previously
     * been saved, it will retrieve related Jadwals from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SekolahLongitudinal.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Jadwal[] List of Jadwal objects
     */
    public function getJadwalsJoinPembelajaranRelatedByBelKe16($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = JadwalQuery::create(null, $criteria);
        $query->joinWith('PembelajaranRelatedByBelKe16', $join_behavior);

        return $this->getJadwals($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SekolahLongitudinal is new, it will return
     * an empty collection; or if this SekolahLongitudinal has previously
     * been saved, it will retrieve related Jadwals from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SekolahLongitudinal.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Jadwal[] List of Jadwal objects
     */
    public function getJadwalsJoinPembelajaranRelatedByBelKe17($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = JadwalQuery::create(null, $criteria);
        $query->joinWith('PembelajaranRelatedByBelKe17', $join_behavior);

        return $this->getJadwals($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SekolahLongitudinal is new, it will return
     * an empty collection; or if this SekolahLongitudinal has previously
     * been saved, it will retrieve related Jadwals from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SekolahLongitudinal.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Jadwal[] List of Jadwal objects
     */
    public function getJadwalsJoinPembelajaranRelatedByBelKe18($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = JadwalQuery::create(null, $criteria);
        $query->joinWith('PembelajaranRelatedByBelKe18', $join_behavior);

        return $this->getJadwals($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SekolahLongitudinal is new, it will return
     * an empty collection; or if this SekolahLongitudinal has previously
     * been saved, it will retrieve related Jadwals from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SekolahLongitudinal.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Jadwal[] List of Jadwal objects
     */
    public function getJadwalsJoinPembelajaranRelatedByBelKe19($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = JadwalQuery::create(null, $criteria);
        $query->joinWith('PembelajaranRelatedByBelKe19', $join_behavior);

        return $this->getJadwals($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SekolahLongitudinal is new, it will return
     * an empty collection; or if this SekolahLongitudinal has previously
     * been saved, it will retrieve related Jadwals from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SekolahLongitudinal.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Jadwal[] List of Jadwal objects
     */
    public function getJadwalsJoinPembelajaranRelatedByBelKe20($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = JadwalQuery::create(null, $criteria);
        $query->joinWith('PembelajaranRelatedByBelKe20', $join_behavior);

        return $this->getJadwals($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->sekolah_id = null;
        $this->semester_id = null;
        $this->waktu_penyelenggaraan_id = null;
        $this->kontinuitas_listrik = null;
        $this->jarak_listrik = null;
        $this->wilayah_terpencil = null;
        $this->wilayah_perbatasan = null;
        $this->wilayah_transmigrasi = null;
        $this->wilayah_adat_terpencil = null;
        $this->wilayah_bencana_alam = null;
        $this->wilayah_bencana_sosial = null;
        $this->partisipasi_bos = null;
        $this->sertifikasi_iso_id = null;
        $this->sumber_listrik_id = null;
        $this->daya_listrik = null;
        $this->akses_internet_id = null;
        $this->akses_internet_2_id = null;
        $this->blob_id = null;
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
            if ($this->collJadwals) {
                foreach ($this->collJadwals as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aLargeObject instanceof Persistent) {
              $this->aLargeObject->clearAllReferences($deep);
            }
            if ($this->aSertifikasiIso instanceof Persistent) {
              $this->aSertifikasiIso->clearAllReferences($deep);
            }
            if ($this->aSekolah instanceof Persistent) {
              $this->aSekolah->clearAllReferences($deep);
            }
            if ($this->aSemester instanceof Persistent) {
              $this->aSemester->clearAllReferences($deep);
            }
            if ($this->aSumberListrik instanceof Persistent) {
              $this->aSumberListrik->clearAllReferences($deep);
            }
            if ($this->aWaktuPenyelenggaraan instanceof Persistent) {
              $this->aWaktuPenyelenggaraan->clearAllReferences($deep);
            }
            if ($this->aAksesInternetRelatedByAksesInternetId instanceof Persistent) {
              $this->aAksesInternetRelatedByAksesInternetId->clearAllReferences($deep);
            }
            if ($this->aAksesInternetRelatedByAksesInternet2Id instanceof Persistent) {
              $this->aAksesInternetRelatedByAksesInternet2Id->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collJadwals instanceof PropelCollection) {
            $this->collJadwals->clearIterator();
        }
        $this->collJadwals = null;
        $this->aLargeObject = null;
        $this->aSertifikasiIso = null;
        $this->aSekolah = null;
        $this->aSemester = null;
        $this->aSumberListrik = null;
        $this->aWaktuPenyelenggaraan = null;
        $this->aAksesInternetRelatedByAksesInternetId = null;
        $this->aAksesInternetRelatedByAksesInternet2Id = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(SekolahLongitudinalPeer::DEFAULT_STRING_FORMAT);
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
