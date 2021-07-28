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
use \PropelDateTime;
use \PropelException;
use \PropelPDO;
use DataDikdas\Model\BentukLembaga;
use DataDikdas\Model\BentukLembagaQuery;
use DataDikdas\Model\FasilitasLayanan;
use DataDikdas\Model\FasilitasLayananQuery;
use DataDikdas\Model\JadwalPaud;
use DataDikdas\Model\JadwalPaudQuery;
use DataDikdas\Model\KategoriTk;
use DataDikdas\Model\KategoriTkQuery;
use DataDikdas\Model\KlasifikasiLembaga;
use DataDikdas\Model\KlasifikasiLembagaQuery;
use DataDikdas\Model\LembagaPengangkat;
use DataDikdas\Model\LembagaPengangkatQuery;
use DataDikdas\Model\Sekolah;
use DataDikdas\Model\SekolahPaud;
use DataDikdas\Model\SekolahPaudPeer;
use DataDikdas\Model\SekolahPaudQuery;
use DataDikdas\Model\SekolahQuery;
use DataDikdas\Model\SumberDanaSekolah;
use DataDikdas\Model\SumberDanaSekolahQuery;

/**
 * Base class that represents a row from the 'sekolah_paud' table.
 *
 * 
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseSekolahPaud extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'DataDikdas\\Model\\SekolahPaudPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        SekolahPaudPeer
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
     * The value for the kategori_tk_id field.
     * @var        string
     */
    protected $kategori_tk_id;

    /**
     * The value for the klasifikasi_lembaga_id field.
     * @var        string
     */
    protected $klasifikasi_lembaga_id;

    /**
     * The value for the sumber_dana_sekolah_id field.
     * @var        string
     */
    protected $sumber_dana_sekolah_id;

    /**
     * The value for the fasilitas_layanan_id field.
     * @var        string
     */
    protected $fasilitas_layanan_id;

    /**
     * The value for the jadwal_pmtas field.
     * @var        string
     */
    protected $jadwal_pmtas;

    /**
     * The value for the lembaga_pengangkat_id field.
     * @var        string
     */
    protected $lembaga_pengangkat_id;

    /**
     * The value for the jadwal_ddtk field.
     * @var        string
     */
    protected $jadwal_ddtk;

    /**
     * The value for the freq_parenting field.
     * @var        string
     */
    protected $freq_parenting;

    /**
     * The value for the bentuk_lembaga_id field.
     * @var        string
     */
    protected $bentuk_lembaga_id;

    /**
     * The value for the jadwal_kesehatan field.
     * @var        string
     */
    protected $jadwal_kesehatan;

    /**
     * The value for the izin_paud field.
     * @var        string
     */
    protected $izin_paud;

    /**
     * The value for the pencatatan_ddtk field.
     * @var        string
     */
    protected $pencatatan_ddtk;

    /**
     * The value for the rujukan_ddtk field.
     * @var        string
     */
    protected $rujukan_ddtk;

    /**
     * The value for the pelaksanaan_parenting field.
     * @var        string
     */
    protected $pelaksanaan_parenting;

    /**
     * The value for the parenting_kpo field.
     * @var        string
     */
    protected $parenting_kpo;

    /**
     * The value for the parenting_kelas field.
     * @var        string
     */
    protected $parenting_kelas;

    /**
     * The value for the parenting_kegiatan field.
     * @var        string
     */
    protected $parenting_kegiatan;

    /**
     * The value for the parenting_konsultasi field.
     * @var        string
     */
    protected $parenting_konsultasi;

    /**
     * The value for the parenting_kunjungan field.
     * @var        string
     */
    protected $parenting_kunjungan;

    /**
     * The value for the parenting_lainnya field.
     * @var        string
     */
    protected $parenting_lainnya;

    /**
     * The value for the nilk field.
     * @var        string
     */
    protected $nilk;

    /**
     * The value for the nilm field.
     * @var        string
     */
    protected $nilm;

    /**
     * The value for the no_penetapan_pnf field.
     * @var        string
     */
    protected $no_penetapan_pnf;

    /**
     * The value for the tanggal_penetapan_pnf field.
     * @var        string
     */
    protected $tanggal_penetapan_pnf;

    /**
     * The value for the create_date field.
     * Note: this column has a database default value of: '2020-04-16 09:40:03'
     * @var        string
     */
    protected $create_date;

    /**
     * The value for the last_update field.
     * Note: this column has a database default value of: '2020-04-16 09:40:03'
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
     * @var        BentukLembaga
     */
    protected $aBentukLembaga;

    /**
     * @var        FasilitasLayanan
     */
    protected $aFasilitasLayanan;

    /**
     * @var        JadwalPaud
     */
    protected $aJadwalPaudRelatedByFreqParenting;

    /**
     * @var        JadwalPaud
     */
    protected $aJadwalPaudRelatedByJadwalDdtk;

    /**
     * @var        JadwalPaud
     */
    protected $aJadwalPaudRelatedByJadwalKesehatan;

    /**
     * @var        JadwalPaud
     */
    protected $aJadwalPaudRelatedByJadwalPmtas;

    /**
     * @var        KategoriTk
     */
    protected $aKategoriTk;

    /**
     * @var        KlasifikasiLembaga
     */
    protected $aKlasifikasiLembaga;

    /**
     * @var        LembagaPengangkat
     */
    protected $aLembagaPengangkat;

    /**
     * @var        Sekolah
     */
    protected $aSekolah;

    /**
     * @var        SumberDanaSekolah
     */
    protected $aSumberDanaSekolah;

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
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->create_date = '2020-04-16 09:40:03';
        $this->last_update = '2020-04-16 09:40:03';
        $this->last_sync = '1901-01-01 00:00:00';
    }

    /**
     * Initializes internal state of BaseSekolahPaud object.
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
     * Get the [kategori_tk_id] column value.
     * 
     * @return string
     */
    public function getKategoriTkId()
    {
        return $this->kategori_tk_id;
    }

    /**
     * Get the [klasifikasi_lembaga_id] column value.
     * 
     * @return string
     */
    public function getKlasifikasiLembagaId()
    {
        return $this->klasifikasi_lembaga_id;
    }

    /**
     * Get the [sumber_dana_sekolah_id] column value.
     * 
     * @return string
     */
    public function getSumberDanaSekolahId()
    {
        return $this->sumber_dana_sekolah_id;
    }

    /**
     * Get the [fasilitas_layanan_id] column value.
     * 
     * @return string
     */
    public function getFasilitasLayananId()
    {
        return $this->fasilitas_layanan_id;
    }

    /**
     * Get the [jadwal_pmtas] column value.
     * 
     * @return string
     */
    public function getJadwalPmtas()
    {
        return $this->jadwal_pmtas;
    }

    /**
     * Get the [lembaga_pengangkat_id] column value.
     * 
     * @return string
     */
    public function getLembagaPengangkatId()
    {
        return $this->lembaga_pengangkat_id;
    }

    /**
     * Get the [jadwal_ddtk] column value.
     * 
     * @return string
     */
    public function getJadwalDdtk()
    {
        return $this->jadwal_ddtk;
    }

    /**
     * Get the [freq_parenting] column value.
     * 
     * @return string
     */
    public function getFreqParenting()
    {
        return $this->freq_parenting;
    }

    /**
     * Get the [bentuk_lembaga_id] column value.
     * 
     * @return string
     */
    public function getBentukLembagaId()
    {
        return $this->bentuk_lembaga_id;
    }

    /**
     * Get the [jadwal_kesehatan] column value.
     * 
     * @return string
     */
    public function getJadwalKesehatan()
    {
        return $this->jadwal_kesehatan;
    }

    /**
     * Get the [izin_paud] column value.
     * 
     * @return string
     */
    public function getIzinPaud()
    {
        return $this->izin_paud;
    }

    /**
     * Get the [pencatatan_ddtk] column value.
     * 
     * @return string
     */
    public function getPencatatanDdtk()
    {
        return $this->pencatatan_ddtk;
    }

    /**
     * Get the [rujukan_ddtk] column value.
     * 
     * @return string
     */
    public function getRujukanDdtk()
    {
        return $this->rujukan_ddtk;
    }

    /**
     * Get the [pelaksanaan_parenting] column value.
     * 
     * @return string
     */
    public function getPelaksanaanParenting()
    {
        return $this->pelaksanaan_parenting;
    }

    /**
     * Get the [parenting_kpo] column value.
     * 
     * @return string
     */
    public function getParentingKpo()
    {
        return $this->parenting_kpo;
    }

    /**
     * Get the [parenting_kelas] column value.
     * 
     * @return string
     */
    public function getParentingKelas()
    {
        return $this->parenting_kelas;
    }

    /**
     * Get the [parenting_kegiatan] column value.
     * 
     * @return string
     */
    public function getParentingKegiatan()
    {
        return $this->parenting_kegiatan;
    }

    /**
     * Get the [parenting_konsultasi] column value.
     * 
     * @return string
     */
    public function getParentingKonsultasi()
    {
        return $this->parenting_konsultasi;
    }

    /**
     * Get the [parenting_kunjungan] column value.
     * 
     * @return string
     */
    public function getParentingKunjungan()
    {
        return $this->parenting_kunjungan;
    }

    /**
     * Get the [parenting_lainnya] column value.
     * 
     * @return string
     */
    public function getParentingLainnya()
    {
        return $this->parenting_lainnya;
    }

    /**
     * Get the [nilk] column value.
     * 
     * @return string
     */
    public function getNilk()
    {
        return $this->nilk;
    }

    /**
     * Get the [nilm] column value.
     * 
     * @return string
     */
    public function getNilm()
    {
        return $this->nilm;
    }

    /**
     * Get the [no_penetapan_pnf] column value.
     * 
     * @return string
     */
    public function getNoPenetapanPnf()
    {
        return $this->no_penetapan_pnf;
    }

    /**
     * Get the [optionally formatted] temporal [tanggal_penetapan_pnf] column value.
     * 
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getTanggalPenetapanPnf($format = '%Y-%m-%d')
    {
        if ($this->tanggal_penetapan_pnf === null) {
            return null;
        }


        try {
            $dt = new DateTime($this->tanggal_penetapan_pnf);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->tanggal_penetapan_pnf, true), $x);
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
     * @return SekolahPaud The current object (for fluent API support)
     */
    public function setSekolahId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->sekolah_id !== $v) {
            $this->sekolah_id = $v;
            $this->modifiedColumns[] = SekolahPaudPeer::SEKOLAH_ID;
        }

        if ($this->aSekolah !== null && $this->aSekolah->getSekolahId() !== $v) {
            $this->aSekolah = null;
        }


        return $this;
    } // setSekolahId()

    /**
     * Set the value of [kategori_tk_id] column.
     * 
     * @param string $v new value
     * @return SekolahPaud The current object (for fluent API support)
     */
    public function setKategoriTkId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->kategori_tk_id !== $v) {
            $this->kategori_tk_id = $v;
            $this->modifiedColumns[] = SekolahPaudPeer::KATEGORI_TK_ID;
        }

        if ($this->aKategoriTk !== null && $this->aKategoriTk->getKategoriTkId() !== $v) {
            $this->aKategoriTk = null;
        }


        return $this;
    } // setKategoriTkId()

    /**
     * Set the value of [klasifikasi_lembaga_id] column.
     * 
     * @param string $v new value
     * @return SekolahPaud The current object (for fluent API support)
     */
    public function setKlasifikasiLembagaId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->klasifikasi_lembaga_id !== $v) {
            $this->klasifikasi_lembaga_id = $v;
            $this->modifiedColumns[] = SekolahPaudPeer::KLASIFIKASI_LEMBAGA_ID;
        }

        if ($this->aKlasifikasiLembaga !== null && $this->aKlasifikasiLembaga->getKlasifikasiLembagaId() !== $v) {
            $this->aKlasifikasiLembaga = null;
        }


        return $this;
    } // setKlasifikasiLembagaId()

    /**
     * Set the value of [sumber_dana_sekolah_id] column.
     * 
     * @param string $v new value
     * @return SekolahPaud The current object (for fluent API support)
     */
    public function setSumberDanaSekolahId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->sumber_dana_sekolah_id !== $v) {
            $this->sumber_dana_sekolah_id = $v;
            $this->modifiedColumns[] = SekolahPaudPeer::SUMBER_DANA_SEKOLAH_ID;
        }

        if ($this->aSumberDanaSekolah !== null && $this->aSumberDanaSekolah->getSumberDanaSekolahId() !== $v) {
            $this->aSumberDanaSekolah = null;
        }


        return $this;
    } // setSumberDanaSekolahId()

    /**
     * Set the value of [fasilitas_layanan_id] column.
     * 
     * @param string $v new value
     * @return SekolahPaud The current object (for fluent API support)
     */
    public function setFasilitasLayananId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->fasilitas_layanan_id !== $v) {
            $this->fasilitas_layanan_id = $v;
            $this->modifiedColumns[] = SekolahPaudPeer::FASILITAS_LAYANAN_ID;
        }

        if ($this->aFasilitasLayanan !== null && $this->aFasilitasLayanan->getFasilitasLayananId() !== $v) {
            $this->aFasilitasLayanan = null;
        }


        return $this;
    } // setFasilitasLayananId()

    /**
     * Set the value of [jadwal_pmtas] column.
     * 
     * @param string $v new value
     * @return SekolahPaud The current object (for fluent API support)
     */
    public function setJadwalPmtas($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->jadwal_pmtas !== $v) {
            $this->jadwal_pmtas = $v;
            $this->modifiedColumns[] = SekolahPaudPeer::JADWAL_PMTAS;
        }

        if ($this->aJadwalPaudRelatedByJadwalPmtas !== null && $this->aJadwalPaudRelatedByJadwalPmtas->getJadwalId() !== $v) {
            $this->aJadwalPaudRelatedByJadwalPmtas = null;
        }


        return $this;
    } // setJadwalPmtas()

    /**
     * Set the value of [lembaga_pengangkat_id] column.
     * 
     * @param string $v new value
     * @return SekolahPaud The current object (for fluent API support)
     */
    public function setLembagaPengangkatId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->lembaga_pengangkat_id !== $v) {
            $this->lembaga_pengangkat_id = $v;
            $this->modifiedColumns[] = SekolahPaudPeer::LEMBAGA_PENGANGKAT_ID;
        }

        if ($this->aLembagaPengangkat !== null && $this->aLembagaPengangkat->getLembagaPengangkatId() !== $v) {
            $this->aLembagaPengangkat = null;
        }


        return $this;
    } // setLembagaPengangkatId()

    /**
     * Set the value of [jadwal_ddtk] column.
     * 
     * @param string $v new value
     * @return SekolahPaud The current object (for fluent API support)
     */
    public function setJadwalDdtk($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->jadwal_ddtk !== $v) {
            $this->jadwal_ddtk = $v;
            $this->modifiedColumns[] = SekolahPaudPeer::JADWAL_DDTK;
        }

        if ($this->aJadwalPaudRelatedByJadwalDdtk !== null && $this->aJadwalPaudRelatedByJadwalDdtk->getJadwalId() !== $v) {
            $this->aJadwalPaudRelatedByJadwalDdtk = null;
        }


        return $this;
    } // setJadwalDdtk()

    /**
     * Set the value of [freq_parenting] column.
     * 
     * @param string $v new value
     * @return SekolahPaud The current object (for fluent API support)
     */
    public function setFreqParenting($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->freq_parenting !== $v) {
            $this->freq_parenting = $v;
            $this->modifiedColumns[] = SekolahPaudPeer::FREQ_PARENTING;
        }

        if ($this->aJadwalPaudRelatedByFreqParenting !== null && $this->aJadwalPaudRelatedByFreqParenting->getJadwalId() !== $v) {
            $this->aJadwalPaudRelatedByFreqParenting = null;
        }


        return $this;
    } // setFreqParenting()

    /**
     * Set the value of [bentuk_lembaga_id] column.
     * 
     * @param string $v new value
     * @return SekolahPaud The current object (for fluent API support)
     */
    public function setBentukLembagaId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->bentuk_lembaga_id !== $v) {
            $this->bentuk_lembaga_id = $v;
            $this->modifiedColumns[] = SekolahPaudPeer::BENTUK_LEMBAGA_ID;
        }

        if ($this->aBentukLembaga !== null && $this->aBentukLembaga->getBentukLembagaId() !== $v) {
            $this->aBentukLembaga = null;
        }


        return $this;
    } // setBentukLembagaId()

    /**
     * Set the value of [jadwal_kesehatan] column.
     * 
     * @param string $v new value
     * @return SekolahPaud The current object (for fluent API support)
     */
    public function setJadwalKesehatan($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->jadwal_kesehatan !== $v) {
            $this->jadwal_kesehatan = $v;
            $this->modifiedColumns[] = SekolahPaudPeer::JADWAL_KESEHATAN;
        }

        if ($this->aJadwalPaudRelatedByJadwalKesehatan !== null && $this->aJadwalPaudRelatedByJadwalKesehatan->getJadwalId() !== $v) {
            $this->aJadwalPaudRelatedByJadwalKesehatan = null;
        }


        return $this;
    } // setJadwalKesehatan()

    /**
     * Set the value of [izin_paud] column.
     * 
     * @param string $v new value
     * @return SekolahPaud The current object (for fluent API support)
     */
    public function setIzinPaud($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->izin_paud !== $v) {
            $this->izin_paud = $v;
            $this->modifiedColumns[] = SekolahPaudPeer::IZIN_PAUD;
        }


        return $this;
    } // setIzinPaud()

    /**
     * Set the value of [pencatatan_ddtk] column.
     * 
     * @param string $v new value
     * @return SekolahPaud The current object (for fluent API support)
     */
    public function setPencatatanDdtk($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->pencatatan_ddtk !== $v) {
            $this->pencatatan_ddtk = $v;
            $this->modifiedColumns[] = SekolahPaudPeer::PENCATATAN_DDTK;
        }


        return $this;
    } // setPencatatanDdtk()

    /**
     * Set the value of [rujukan_ddtk] column.
     * 
     * @param string $v new value
     * @return SekolahPaud The current object (for fluent API support)
     */
    public function setRujukanDdtk($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->rujukan_ddtk !== $v) {
            $this->rujukan_ddtk = $v;
            $this->modifiedColumns[] = SekolahPaudPeer::RUJUKAN_DDTK;
        }


        return $this;
    } // setRujukanDdtk()

    /**
     * Set the value of [pelaksanaan_parenting] column.
     * 
     * @param string $v new value
     * @return SekolahPaud The current object (for fluent API support)
     */
    public function setPelaksanaanParenting($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->pelaksanaan_parenting !== $v) {
            $this->pelaksanaan_parenting = $v;
            $this->modifiedColumns[] = SekolahPaudPeer::PELAKSANAAN_PARENTING;
        }


        return $this;
    } // setPelaksanaanParenting()

    /**
     * Set the value of [parenting_kpo] column.
     * 
     * @param string $v new value
     * @return SekolahPaud The current object (for fluent API support)
     */
    public function setParentingKpo($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->parenting_kpo !== $v) {
            $this->parenting_kpo = $v;
            $this->modifiedColumns[] = SekolahPaudPeer::PARENTING_KPO;
        }


        return $this;
    } // setParentingKpo()

    /**
     * Set the value of [parenting_kelas] column.
     * 
     * @param string $v new value
     * @return SekolahPaud The current object (for fluent API support)
     */
    public function setParentingKelas($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->parenting_kelas !== $v) {
            $this->parenting_kelas = $v;
            $this->modifiedColumns[] = SekolahPaudPeer::PARENTING_KELAS;
        }


        return $this;
    } // setParentingKelas()

    /**
     * Set the value of [parenting_kegiatan] column.
     * 
     * @param string $v new value
     * @return SekolahPaud The current object (for fluent API support)
     */
    public function setParentingKegiatan($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->parenting_kegiatan !== $v) {
            $this->parenting_kegiatan = $v;
            $this->modifiedColumns[] = SekolahPaudPeer::PARENTING_KEGIATAN;
        }


        return $this;
    } // setParentingKegiatan()

    /**
     * Set the value of [parenting_konsultasi] column.
     * 
     * @param string $v new value
     * @return SekolahPaud The current object (for fluent API support)
     */
    public function setParentingKonsultasi($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->parenting_konsultasi !== $v) {
            $this->parenting_konsultasi = $v;
            $this->modifiedColumns[] = SekolahPaudPeer::PARENTING_KONSULTASI;
        }


        return $this;
    } // setParentingKonsultasi()

    /**
     * Set the value of [parenting_kunjungan] column.
     * 
     * @param string $v new value
     * @return SekolahPaud The current object (for fluent API support)
     */
    public function setParentingKunjungan($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->parenting_kunjungan !== $v) {
            $this->parenting_kunjungan = $v;
            $this->modifiedColumns[] = SekolahPaudPeer::PARENTING_KUNJUNGAN;
        }


        return $this;
    } // setParentingKunjungan()

    /**
     * Set the value of [parenting_lainnya] column.
     * 
     * @param string $v new value
     * @return SekolahPaud The current object (for fluent API support)
     */
    public function setParentingLainnya($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->parenting_lainnya !== $v) {
            $this->parenting_lainnya = $v;
            $this->modifiedColumns[] = SekolahPaudPeer::PARENTING_LAINNYA;
        }


        return $this;
    } // setParentingLainnya()

    /**
     * Set the value of [nilk] column.
     * 
     * @param string $v new value
     * @return SekolahPaud The current object (for fluent API support)
     */
    public function setNilk($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nilk !== $v) {
            $this->nilk = $v;
            $this->modifiedColumns[] = SekolahPaudPeer::NILK;
        }


        return $this;
    } // setNilk()

    /**
     * Set the value of [nilm] column.
     * 
     * @param string $v new value
     * @return SekolahPaud The current object (for fluent API support)
     */
    public function setNilm($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nilm !== $v) {
            $this->nilm = $v;
            $this->modifiedColumns[] = SekolahPaudPeer::NILM;
        }


        return $this;
    } // setNilm()

    /**
     * Set the value of [no_penetapan_pnf] column.
     * 
     * @param string $v new value
     * @return SekolahPaud The current object (for fluent API support)
     */
    public function setNoPenetapanPnf($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->no_penetapan_pnf !== $v) {
            $this->no_penetapan_pnf = $v;
            $this->modifiedColumns[] = SekolahPaudPeer::NO_PENETAPAN_PNF;
        }


        return $this;
    } // setNoPenetapanPnf()

    /**
     * Sets the value of [tanggal_penetapan_pnf] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return SekolahPaud The current object (for fluent API support)
     */
    public function setTanggalPenetapanPnf($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->tanggal_penetapan_pnf !== null || $dt !== null) {
            $currentDateAsString = ($this->tanggal_penetapan_pnf !== null && $tmpDt = new DateTime($this->tanggal_penetapan_pnf)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->tanggal_penetapan_pnf = $newDateAsString;
                $this->modifiedColumns[] = SekolahPaudPeer::TANGGAL_PENETAPAN_PNF;
            }
        } // if either are not null


        return $this;
    } // setTanggalPenetapanPnf()

    /**
     * Sets the value of [create_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return SekolahPaud The current object (for fluent API support)
     */
    public function setCreateDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->create_date !== null || $dt !== null) {
            $currentDateAsString = ($this->create_date !== null && $tmpDt = new DateTime($this->create_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ( ($currentDateAsString !== $newDateAsString) // normalized values don't match
                || ($dt->format('Y-m-d H:i:s') === '2020-04-16 09:40:03') // or the entered value matches the default
                 ) {
                $this->create_date = $newDateAsString;
                $this->modifiedColumns[] = SekolahPaudPeer::CREATE_DATE;
            }
        } // if either are not null


        return $this;
    } // setCreateDate()

    /**
     * Sets the value of [last_update] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return SekolahPaud The current object (for fluent API support)
     */
    public function setLastUpdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->last_update !== null || $dt !== null) {
            $currentDateAsString = ($this->last_update !== null && $tmpDt = new DateTime($this->last_update)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ( ($currentDateAsString !== $newDateAsString) // normalized values don't match
                || ($dt->format('Y-m-d H:i:s') === '2020-04-16 09:40:03') // or the entered value matches the default
                 ) {
                $this->last_update = $newDateAsString;
                $this->modifiedColumns[] = SekolahPaudPeer::LAST_UPDATE;
            }
        } // if either are not null


        return $this;
    } // setLastUpdate()

    /**
     * Set the value of [soft_delete] column.
     * 
     * @param string $v new value
     * @return SekolahPaud The current object (for fluent API support)
     */
    public function setSoftDelete($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->soft_delete !== $v) {
            $this->soft_delete = $v;
            $this->modifiedColumns[] = SekolahPaudPeer::SOFT_DELETE;
        }


        return $this;
    } // setSoftDelete()

    /**
     * Sets the value of [last_sync] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return SekolahPaud The current object (for fluent API support)
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
                $this->modifiedColumns[] = SekolahPaudPeer::LAST_SYNC;
            }
        } // if either are not null


        return $this;
    } // setLastSync()

    /**
     * Set the value of [updater_id] column.
     * 
     * @param string $v new value
     * @return SekolahPaud The current object (for fluent API support)
     */
    public function setUpdaterId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->updater_id !== $v) {
            $this->updater_id = $v;
            $this->modifiedColumns[] = SekolahPaudPeer::UPDATER_ID;
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
            if ($this->create_date !== '2020-04-16 09:40:03') {
                return false;
            }

            if ($this->last_update !== '2020-04-16 09:40:03') {
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
            $this->kategori_tk_id = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->klasifikasi_lembaga_id = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->sumber_dana_sekolah_id = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->fasilitas_layanan_id = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->jadwal_pmtas = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->lembaga_pengangkat_id = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->jadwal_ddtk = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->freq_parenting = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->bentuk_lembaga_id = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
            $this->jadwal_kesehatan = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
            $this->izin_paud = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
            $this->pencatatan_ddtk = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
            $this->rujukan_ddtk = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
            $this->pelaksanaan_parenting = ($row[$startcol + 14] !== null) ? (string) $row[$startcol + 14] : null;
            $this->parenting_kpo = ($row[$startcol + 15] !== null) ? (string) $row[$startcol + 15] : null;
            $this->parenting_kelas = ($row[$startcol + 16] !== null) ? (string) $row[$startcol + 16] : null;
            $this->parenting_kegiatan = ($row[$startcol + 17] !== null) ? (string) $row[$startcol + 17] : null;
            $this->parenting_konsultasi = ($row[$startcol + 18] !== null) ? (string) $row[$startcol + 18] : null;
            $this->parenting_kunjungan = ($row[$startcol + 19] !== null) ? (string) $row[$startcol + 19] : null;
            $this->parenting_lainnya = ($row[$startcol + 20] !== null) ? (string) $row[$startcol + 20] : null;
            $this->nilk = ($row[$startcol + 21] !== null) ? (string) $row[$startcol + 21] : null;
            $this->nilm = ($row[$startcol + 22] !== null) ? (string) $row[$startcol + 22] : null;
            $this->no_penetapan_pnf = ($row[$startcol + 23] !== null) ? (string) $row[$startcol + 23] : null;
            $this->tanggal_penetapan_pnf = ($row[$startcol + 24] !== null) ? (string) $row[$startcol + 24] : null;
            $this->create_date = ($row[$startcol + 25] !== null) ? (string) $row[$startcol + 25] : null;
            $this->last_update = ($row[$startcol + 26] !== null) ? (string) $row[$startcol + 26] : null;
            $this->soft_delete = ($row[$startcol + 27] !== null) ? (string) $row[$startcol + 27] : null;
            $this->last_sync = ($row[$startcol + 28] !== null) ? (string) $row[$startcol + 28] : null;
            $this->updater_id = ($row[$startcol + 29] !== null) ? (string) $row[$startcol + 29] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 30; // 30 = SekolahPaudPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating SekolahPaud object", $e);
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
        if ($this->aKategoriTk !== null && $this->kategori_tk_id !== $this->aKategoriTk->getKategoriTkId()) {
            $this->aKategoriTk = null;
        }
        if ($this->aKlasifikasiLembaga !== null && $this->klasifikasi_lembaga_id !== $this->aKlasifikasiLembaga->getKlasifikasiLembagaId()) {
            $this->aKlasifikasiLembaga = null;
        }
        if ($this->aSumberDanaSekolah !== null && $this->sumber_dana_sekolah_id !== $this->aSumberDanaSekolah->getSumberDanaSekolahId()) {
            $this->aSumberDanaSekolah = null;
        }
        if ($this->aFasilitasLayanan !== null && $this->fasilitas_layanan_id !== $this->aFasilitasLayanan->getFasilitasLayananId()) {
            $this->aFasilitasLayanan = null;
        }
        if ($this->aJadwalPaudRelatedByJadwalPmtas !== null && $this->jadwal_pmtas !== $this->aJadwalPaudRelatedByJadwalPmtas->getJadwalId()) {
            $this->aJadwalPaudRelatedByJadwalPmtas = null;
        }
        if ($this->aLembagaPengangkat !== null && $this->lembaga_pengangkat_id !== $this->aLembagaPengangkat->getLembagaPengangkatId()) {
            $this->aLembagaPengangkat = null;
        }
        if ($this->aJadwalPaudRelatedByJadwalDdtk !== null && $this->jadwal_ddtk !== $this->aJadwalPaudRelatedByJadwalDdtk->getJadwalId()) {
            $this->aJadwalPaudRelatedByJadwalDdtk = null;
        }
        if ($this->aJadwalPaudRelatedByFreqParenting !== null && $this->freq_parenting !== $this->aJadwalPaudRelatedByFreqParenting->getJadwalId()) {
            $this->aJadwalPaudRelatedByFreqParenting = null;
        }
        if ($this->aBentukLembaga !== null && $this->bentuk_lembaga_id !== $this->aBentukLembaga->getBentukLembagaId()) {
            $this->aBentukLembaga = null;
        }
        if ($this->aJadwalPaudRelatedByJadwalKesehatan !== null && $this->jadwal_kesehatan !== $this->aJadwalPaudRelatedByJadwalKesehatan->getJadwalId()) {
            $this->aJadwalPaudRelatedByJadwalKesehatan = null;
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
            $con = Propel::getConnection(SekolahPaudPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = SekolahPaudPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aBentukLembaga = null;
            $this->aFasilitasLayanan = null;
            $this->aJadwalPaudRelatedByFreqParenting = null;
            $this->aJadwalPaudRelatedByJadwalDdtk = null;
            $this->aJadwalPaudRelatedByJadwalKesehatan = null;
            $this->aJadwalPaudRelatedByJadwalPmtas = null;
            $this->aKategoriTk = null;
            $this->aKlasifikasiLembaga = null;
            $this->aLembagaPengangkat = null;
            $this->aSekolah = null;
            $this->aSumberDanaSekolah = null;
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
            $con = Propel::getConnection(SekolahPaudPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = SekolahPaudQuery::create()
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
            $con = Propel::getConnection(SekolahPaudPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                SekolahPaudPeer::addInstanceToPool($this);
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

            if ($this->aBentukLembaga !== null) {
                if ($this->aBentukLembaga->isModified() || $this->aBentukLembaga->isNew()) {
                    $affectedRows += $this->aBentukLembaga->save($con);
                }
                $this->setBentukLembaga($this->aBentukLembaga);
            }

            if ($this->aFasilitasLayanan !== null) {
                if ($this->aFasilitasLayanan->isModified() || $this->aFasilitasLayanan->isNew()) {
                    $affectedRows += $this->aFasilitasLayanan->save($con);
                }
                $this->setFasilitasLayanan($this->aFasilitasLayanan);
            }

            if ($this->aJadwalPaudRelatedByFreqParenting !== null) {
                if ($this->aJadwalPaudRelatedByFreqParenting->isModified() || $this->aJadwalPaudRelatedByFreqParenting->isNew()) {
                    $affectedRows += $this->aJadwalPaudRelatedByFreqParenting->save($con);
                }
                $this->setJadwalPaudRelatedByFreqParenting($this->aJadwalPaudRelatedByFreqParenting);
            }

            if ($this->aJadwalPaudRelatedByJadwalDdtk !== null) {
                if ($this->aJadwalPaudRelatedByJadwalDdtk->isModified() || $this->aJadwalPaudRelatedByJadwalDdtk->isNew()) {
                    $affectedRows += $this->aJadwalPaudRelatedByJadwalDdtk->save($con);
                }
                $this->setJadwalPaudRelatedByJadwalDdtk($this->aJadwalPaudRelatedByJadwalDdtk);
            }

            if ($this->aJadwalPaudRelatedByJadwalKesehatan !== null) {
                if ($this->aJadwalPaudRelatedByJadwalKesehatan->isModified() || $this->aJadwalPaudRelatedByJadwalKesehatan->isNew()) {
                    $affectedRows += $this->aJadwalPaudRelatedByJadwalKesehatan->save($con);
                }
                $this->setJadwalPaudRelatedByJadwalKesehatan($this->aJadwalPaudRelatedByJadwalKesehatan);
            }

            if ($this->aJadwalPaudRelatedByJadwalPmtas !== null) {
                if ($this->aJadwalPaudRelatedByJadwalPmtas->isModified() || $this->aJadwalPaudRelatedByJadwalPmtas->isNew()) {
                    $affectedRows += $this->aJadwalPaudRelatedByJadwalPmtas->save($con);
                }
                $this->setJadwalPaudRelatedByJadwalPmtas($this->aJadwalPaudRelatedByJadwalPmtas);
            }

            if ($this->aKategoriTk !== null) {
                if ($this->aKategoriTk->isModified() || $this->aKategoriTk->isNew()) {
                    $affectedRows += $this->aKategoriTk->save($con);
                }
                $this->setKategoriTk($this->aKategoriTk);
            }

            if ($this->aKlasifikasiLembaga !== null) {
                if ($this->aKlasifikasiLembaga->isModified() || $this->aKlasifikasiLembaga->isNew()) {
                    $affectedRows += $this->aKlasifikasiLembaga->save($con);
                }
                $this->setKlasifikasiLembaga($this->aKlasifikasiLembaga);
            }

            if ($this->aLembagaPengangkat !== null) {
                if ($this->aLembagaPengangkat->isModified() || $this->aLembagaPengangkat->isNew()) {
                    $affectedRows += $this->aLembagaPengangkat->save($con);
                }
                $this->setLembagaPengangkat($this->aLembagaPengangkat);
            }

            if ($this->aSekolah !== null) {
                if ($this->aSekolah->isModified() || $this->aSekolah->isNew()) {
                    $affectedRows += $this->aSekolah->save($con);
                }
                $this->setSekolah($this->aSekolah);
            }

            if ($this->aSumberDanaSekolah !== null) {
                if ($this->aSumberDanaSekolah->isModified() || $this->aSumberDanaSekolah->isNew()) {
                    $affectedRows += $this->aSumberDanaSekolah->save($con);
                }
                $this->setSumberDanaSekolah($this->aSumberDanaSekolah);
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
        if ($this->isColumnModified(SekolahPaudPeer::SEKOLAH_ID)) {
            $modifiedColumns[':p' . $index++]  = '"sekolah_id"';
        }
        if ($this->isColumnModified(SekolahPaudPeer::KATEGORI_TK_ID)) {
            $modifiedColumns[':p' . $index++]  = '"kategori_tk_id"';
        }
        if ($this->isColumnModified(SekolahPaudPeer::KLASIFIKASI_LEMBAGA_ID)) {
            $modifiedColumns[':p' . $index++]  = '"klasifikasi_lembaga_id"';
        }
        if ($this->isColumnModified(SekolahPaudPeer::SUMBER_DANA_SEKOLAH_ID)) {
            $modifiedColumns[':p' . $index++]  = '"sumber_dana_sekolah_id"';
        }
        if ($this->isColumnModified(SekolahPaudPeer::FASILITAS_LAYANAN_ID)) {
            $modifiedColumns[':p' . $index++]  = '"fasilitas_layanan_id"';
        }
        if ($this->isColumnModified(SekolahPaudPeer::JADWAL_PMTAS)) {
            $modifiedColumns[':p' . $index++]  = '"jadwal_pmtas"';
        }
        if ($this->isColumnModified(SekolahPaudPeer::LEMBAGA_PENGANGKAT_ID)) {
            $modifiedColumns[':p' . $index++]  = '"lembaga_pengangkat_id"';
        }
        if ($this->isColumnModified(SekolahPaudPeer::JADWAL_DDTK)) {
            $modifiedColumns[':p' . $index++]  = '"jadwal_ddtk"';
        }
        if ($this->isColumnModified(SekolahPaudPeer::FREQ_PARENTING)) {
            $modifiedColumns[':p' . $index++]  = '"freq_parenting"';
        }
        if ($this->isColumnModified(SekolahPaudPeer::BENTUK_LEMBAGA_ID)) {
            $modifiedColumns[':p' . $index++]  = '"bentuk_lembaga_id"';
        }
        if ($this->isColumnModified(SekolahPaudPeer::JADWAL_KESEHATAN)) {
            $modifiedColumns[':p' . $index++]  = '"jadwal_kesehatan"';
        }
        if ($this->isColumnModified(SekolahPaudPeer::IZIN_PAUD)) {
            $modifiedColumns[':p' . $index++]  = '"izin_paud"';
        }
        if ($this->isColumnModified(SekolahPaudPeer::PENCATATAN_DDTK)) {
            $modifiedColumns[':p' . $index++]  = '"pencatatan_ddtk"';
        }
        if ($this->isColumnModified(SekolahPaudPeer::RUJUKAN_DDTK)) {
            $modifiedColumns[':p' . $index++]  = '"rujukan_ddtk"';
        }
        if ($this->isColumnModified(SekolahPaudPeer::PELAKSANAAN_PARENTING)) {
            $modifiedColumns[':p' . $index++]  = '"pelaksanaan_parenting"';
        }
        if ($this->isColumnModified(SekolahPaudPeer::PARENTING_KPO)) {
            $modifiedColumns[':p' . $index++]  = '"parenting_kpo"';
        }
        if ($this->isColumnModified(SekolahPaudPeer::PARENTING_KELAS)) {
            $modifiedColumns[':p' . $index++]  = '"parenting_kelas"';
        }
        if ($this->isColumnModified(SekolahPaudPeer::PARENTING_KEGIATAN)) {
            $modifiedColumns[':p' . $index++]  = '"parenting_kegiatan"';
        }
        if ($this->isColumnModified(SekolahPaudPeer::PARENTING_KONSULTASI)) {
            $modifiedColumns[':p' . $index++]  = '"parenting_konsultasi"';
        }
        if ($this->isColumnModified(SekolahPaudPeer::PARENTING_KUNJUNGAN)) {
            $modifiedColumns[':p' . $index++]  = '"parenting_kunjungan"';
        }
        if ($this->isColumnModified(SekolahPaudPeer::PARENTING_LAINNYA)) {
            $modifiedColumns[':p' . $index++]  = '"parenting_lainnya"';
        }
        if ($this->isColumnModified(SekolahPaudPeer::NILK)) {
            $modifiedColumns[':p' . $index++]  = '"nilk"';
        }
        if ($this->isColumnModified(SekolahPaudPeer::NILM)) {
            $modifiedColumns[':p' . $index++]  = '"nilm"';
        }
        if ($this->isColumnModified(SekolahPaudPeer::NO_PENETAPAN_PNF)) {
            $modifiedColumns[':p' . $index++]  = '"no_penetapan_pnf"';
        }
        if ($this->isColumnModified(SekolahPaudPeer::TANGGAL_PENETAPAN_PNF)) {
            $modifiedColumns[':p' . $index++]  = '"tanggal_penetapan_pnf"';
        }
        if ($this->isColumnModified(SekolahPaudPeer::CREATE_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"create_date"';
        }
        if ($this->isColumnModified(SekolahPaudPeer::LAST_UPDATE)) {
            $modifiedColumns[':p' . $index++]  = '"last_update"';
        }
        if ($this->isColumnModified(SekolahPaudPeer::SOFT_DELETE)) {
            $modifiedColumns[':p' . $index++]  = '"soft_delete"';
        }
        if ($this->isColumnModified(SekolahPaudPeer::LAST_SYNC)) {
            $modifiedColumns[':p' . $index++]  = '"last_sync"';
        }
        if ($this->isColumnModified(SekolahPaudPeer::UPDATER_ID)) {
            $modifiedColumns[':p' . $index++]  = '"updater_id"';
        }

        $sql = sprintf(
            'INSERT INTO "sekolah_paud" (%s) VALUES (%s)',
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
                    case '"kategori_tk_id"':						
                        $stmt->bindValue($identifier, $this->kategori_tk_id, PDO::PARAM_STR);
                        break;
                    case '"klasifikasi_lembaga_id"':						
                        $stmt->bindValue($identifier, $this->klasifikasi_lembaga_id, PDO::PARAM_STR);
                        break;
                    case '"sumber_dana_sekolah_id"':						
                        $stmt->bindValue($identifier, $this->sumber_dana_sekolah_id, PDO::PARAM_STR);
                        break;
                    case '"fasilitas_layanan_id"':						
                        $stmt->bindValue($identifier, $this->fasilitas_layanan_id, PDO::PARAM_STR);
                        break;
                    case '"jadwal_pmtas"':						
                        $stmt->bindValue($identifier, $this->jadwal_pmtas, PDO::PARAM_STR);
                        break;
                    case '"lembaga_pengangkat_id"':						
                        $stmt->bindValue($identifier, $this->lembaga_pengangkat_id, PDO::PARAM_STR);
                        break;
                    case '"jadwal_ddtk"':						
                        $stmt->bindValue($identifier, $this->jadwal_ddtk, PDO::PARAM_STR);
                        break;
                    case '"freq_parenting"':						
                        $stmt->bindValue($identifier, $this->freq_parenting, PDO::PARAM_STR);
                        break;
                    case '"bentuk_lembaga_id"':						
                        $stmt->bindValue($identifier, $this->bentuk_lembaga_id, PDO::PARAM_STR);
                        break;
                    case '"jadwal_kesehatan"':						
                        $stmt->bindValue($identifier, $this->jadwal_kesehatan, PDO::PARAM_STR);
                        break;
                    case '"izin_paud"':						
                        $stmt->bindValue($identifier, $this->izin_paud, PDO::PARAM_STR);
                        break;
                    case '"pencatatan_ddtk"':						
                        $stmt->bindValue($identifier, $this->pencatatan_ddtk, PDO::PARAM_STR);
                        break;
                    case '"rujukan_ddtk"':						
                        $stmt->bindValue($identifier, $this->rujukan_ddtk, PDO::PARAM_STR);
                        break;
                    case '"pelaksanaan_parenting"':						
                        $stmt->bindValue($identifier, $this->pelaksanaan_parenting, PDO::PARAM_STR);
                        break;
                    case '"parenting_kpo"':						
                        $stmt->bindValue($identifier, $this->parenting_kpo, PDO::PARAM_STR);
                        break;
                    case '"parenting_kelas"':						
                        $stmt->bindValue($identifier, $this->parenting_kelas, PDO::PARAM_STR);
                        break;
                    case '"parenting_kegiatan"':						
                        $stmt->bindValue($identifier, $this->parenting_kegiatan, PDO::PARAM_STR);
                        break;
                    case '"parenting_konsultasi"':						
                        $stmt->bindValue($identifier, $this->parenting_konsultasi, PDO::PARAM_STR);
                        break;
                    case '"parenting_kunjungan"':						
                        $stmt->bindValue($identifier, $this->parenting_kunjungan, PDO::PARAM_STR);
                        break;
                    case '"parenting_lainnya"':						
                        $stmt->bindValue($identifier, $this->parenting_lainnya, PDO::PARAM_STR);
                        break;
                    case '"nilk"':						
                        $stmt->bindValue($identifier, $this->nilk, PDO::PARAM_STR);
                        break;
                    case '"nilm"':						
                        $stmt->bindValue($identifier, $this->nilm, PDO::PARAM_STR);
                        break;
                    case '"no_penetapan_pnf"':						
                        $stmt->bindValue($identifier, $this->no_penetapan_pnf, PDO::PARAM_STR);
                        break;
                    case '"tanggal_penetapan_pnf"':						
                        $stmt->bindValue($identifier, $this->tanggal_penetapan_pnf, PDO::PARAM_STR);
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

            if ($this->aBentukLembaga !== null) {
                if (!$this->aBentukLembaga->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aBentukLembaga->getValidationFailures());
                }
            }

            if ($this->aFasilitasLayanan !== null) {
                if (!$this->aFasilitasLayanan->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aFasilitasLayanan->getValidationFailures());
                }
            }

            if ($this->aJadwalPaudRelatedByFreqParenting !== null) {
                if (!$this->aJadwalPaudRelatedByFreqParenting->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aJadwalPaudRelatedByFreqParenting->getValidationFailures());
                }
            }

            if ($this->aJadwalPaudRelatedByJadwalDdtk !== null) {
                if (!$this->aJadwalPaudRelatedByJadwalDdtk->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aJadwalPaudRelatedByJadwalDdtk->getValidationFailures());
                }
            }

            if ($this->aJadwalPaudRelatedByJadwalKesehatan !== null) {
                if (!$this->aJadwalPaudRelatedByJadwalKesehatan->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aJadwalPaudRelatedByJadwalKesehatan->getValidationFailures());
                }
            }

            if ($this->aJadwalPaudRelatedByJadwalPmtas !== null) {
                if (!$this->aJadwalPaudRelatedByJadwalPmtas->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aJadwalPaudRelatedByJadwalPmtas->getValidationFailures());
                }
            }

            if ($this->aKategoriTk !== null) {
                if (!$this->aKategoriTk->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aKategoriTk->getValidationFailures());
                }
            }

            if ($this->aKlasifikasiLembaga !== null) {
                if (!$this->aKlasifikasiLembaga->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aKlasifikasiLembaga->getValidationFailures());
                }
            }

            if ($this->aLembagaPengangkat !== null) {
                if (!$this->aLembagaPengangkat->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aLembagaPengangkat->getValidationFailures());
                }
            }

            if ($this->aSekolah !== null) {
                if (!$this->aSekolah->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aSekolah->getValidationFailures());
                }
            }

            if ($this->aSumberDanaSekolah !== null) {
                if (!$this->aSumberDanaSekolah->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aSumberDanaSekolah->getValidationFailures());
                }
            }


            if (($retval = SekolahPaudPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
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
        $pos = SekolahPaudPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getKategoriTkId();
                break;
            case 2:
                return $this->getKlasifikasiLembagaId();
                break;
            case 3:
                return $this->getSumberDanaSekolahId();
                break;
            case 4:
                return $this->getFasilitasLayananId();
                break;
            case 5:
                return $this->getJadwalPmtas();
                break;
            case 6:
                return $this->getLembagaPengangkatId();
                break;
            case 7:
                return $this->getJadwalDdtk();
                break;
            case 8:
                return $this->getFreqParenting();
                break;
            case 9:
                return $this->getBentukLembagaId();
                break;
            case 10:
                return $this->getJadwalKesehatan();
                break;
            case 11:
                return $this->getIzinPaud();
                break;
            case 12:
                return $this->getPencatatanDdtk();
                break;
            case 13:
                return $this->getRujukanDdtk();
                break;
            case 14:
                return $this->getPelaksanaanParenting();
                break;
            case 15:
                return $this->getParentingKpo();
                break;
            case 16:
                return $this->getParentingKelas();
                break;
            case 17:
                return $this->getParentingKegiatan();
                break;
            case 18:
                return $this->getParentingKonsultasi();
                break;
            case 19:
                return $this->getParentingKunjungan();
                break;
            case 20:
                return $this->getParentingLainnya();
                break;
            case 21:
                return $this->getNilk();
                break;
            case 22:
                return $this->getNilm();
                break;
            case 23:
                return $this->getNoPenetapanPnf();
                break;
            case 24:
                return $this->getTanggalPenetapanPnf();
                break;
            case 25:
                return $this->getCreateDate();
                break;
            case 26:
                return $this->getLastUpdate();
                break;
            case 27:
                return $this->getSoftDelete();
                break;
            case 28:
                return $this->getLastSync();
                break;
            case 29:
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
        if (isset($alreadyDumpedObjects['SekolahPaud'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['SekolahPaud'][$this->getPrimaryKey()] = true;
        $keys = SekolahPaudPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getSekolahId(),
            $keys[1] => $this->getKategoriTkId(),
            $keys[2] => $this->getKlasifikasiLembagaId(),
            $keys[3] => $this->getSumberDanaSekolahId(),
            $keys[4] => $this->getFasilitasLayananId(),
            $keys[5] => $this->getJadwalPmtas(),
            $keys[6] => $this->getLembagaPengangkatId(),
            $keys[7] => $this->getJadwalDdtk(),
            $keys[8] => $this->getFreqParenting(),
            $keys[9] => $this->getBentukLembagaId(),
            $keys[10] => $this->getJadwalKesehatan(),
            $keys[11] => $this->getIzinPaud(),
            $keys[12] => $this->getPencatatanDdtk(),
            $keys[13] => $this->getRujukanDdtk(),
            $keys[14] => $this->getPelaksanaanParenting(),
            $keys[15] => $this->getParentingKpo(),
            $keys[16] => $this->getParentingKelas(),
            $keys[17] => $this->getParentingKegiatan(),
            $keys[18] => $this->getParentingKonsultasi(),
            $keys[19] => $this->getParentingKunjungan(),
            $keys[20] => $this->getParentingLainnya(),
            $keys[21] => $this->getNilk(),
            $keys[22] => $this->getNilm(),
            $keys[23] => $this->getNoPenetapanPnf(),
            $keys[24] => $this->getTanggalPenetapanPnf(),
            $keys[25] => $this->getCreateDate(),
            $keys[26] => $this->getLastUpdate(),
            $keys[27] => $this->getSoftDelete(),
            $keys[28] => $this->getLastSync(),
            $keys[29] => $this->getUpdaterId(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aBentukLembaga) {
                $result['BentukLembaga'] = $this->aBentukLembaga->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aFasilitasLayanan) {
                $result['FasilitasLayanan'] = $this->aFasilitasLayanan->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aJadwalPaudRelatedByFreqParenting) {
                $result['JadwalPaudRelatedByFreqParenting'] = $this->aJadwalPaudRelatedByFreqParenting->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aJadwalPaudRelatedByJadwalDdtk) {
                $result['JadwalPaudRelatedByJadwalDdtk'] = $this->aJadwalPaudRelatedByJadwalDdtk->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aJadwalPaudRelatedByJadwalKesehatan) {
                $result['JadwalPaudRelatedByJadwalKesehatan'] = $this->aJadwalPaudRelatedByJadwalKesehatan->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aJadwalPaudRelatedByJadwalPmtas) {
                $result['JadwalPaudRelatedByJadwalPmtas'] = $this->aJadwalPaudRelatedByJadwalPmtas->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aKategoriTk) {
                $result['KategoriTk'] = $this->aKategoriTk->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aKlasifikasiLembaga) {
                $result['KlasifikasiLembaga'] = $this->aKlasifikasiLembaga->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aLembagaPengangkat) {
                $result['LembagaPengangkat'] = $this->aLembagaPengangkat->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aSekolah) {
                $result['Sekolah'] = $this->aSekolah->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aSumberDanaSekolah) {
                $result['SumberDanaSekolah'] = $this->aSumberDanaSekolah->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
        $pos = SekolahPaudPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setKategoriTkId($value);
                break;
            case 2:
                $this->setKlasifikasiLembagaId($value);
                break;
            case 3:
                $this->setSumberDanaSekolahId($value);
                break;
            case 4:
                $this->setFasilitasLayananId($value);
                break;
            case 5:
                $this->setJadwalPmtas($value);
                break;
            case 6:
                $this->setLembagaPengangkatId($value);
                break;
            case 7:
                $this->setJadwalDdtk($value);
                break;
            case 8:
                $this->setFreqParenting($value);
                break;
            case 9:
                $this->setBentukLembagaId($value);
                break;
            case 10:
                $this->setJadwalKesehatan($value);
                break;
            case 11:
                $this->setIzinPaud($value);
                break;
            case 12:
                $this->setPencatatanDdtk($value);
                break;
            case 13:
                $this->setRujukanDdtk($value);
                break;
            case 14:
                $this->setPelaksanaanParenting($value);
                break;
            case 15:
                $this->setParentingKpo($value);
                break;
            case 16:
                $this->setParentingKelas($value);
                break;
            case 17:
                $this->setParentingKegiatan($value);
                break;
            case 18:
                $this->setParentingKonsultasi($value);
                break;
            case 19:
                $this->setParentingKunjungan($value);
                break;
            case 20:
                $this->setParentingLainnya($value);
                break;
            case 21:
                $this->setNilk($value);
                break;
            case 22:
                $this->setNilm($value);
                break;
            case 23:
                $this->setNoPenetapanPnf($value);
                break;
            case 24:
                $this->setTanggalPenetapanPnf($value);
                break;
            case 25:
                $this->setCreateDate($value);
                break;
            case 26:
                $this->setLastUpdate($value);
                break;
            case 27:
                $this->setSoftDelete($value);
                break;
            case 28:
                $this->setLastSync($value);
                break;
            case 29:
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
        $keys = SekolahPaudPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setSekolahId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setKategoriTkId($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setKlasifikasiLembagaId($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setSumberDanaSekolahId($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setFasilitasLayananId($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setJadwalPmtas($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setLembagaPengangkatId($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setJadwalDdtk($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setFreqParenting($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setBentukLembagaId($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setJadwalKesehatan($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setIzinPaud($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setPencatatanDdtk($arr[$keys[12]]);
        if (array_key_exists($keys[13], $arr)) $this->setRujukanDdtk($arr[$keys[13]]);
        if (array_key_exists($keys[14], $arr)) $this->setPelaksanaanParenting($arr[$keys[14]]);
        if (array_key_exists($keys[15], $arr)) $this->setParentingKpo($arr[$keys[15]]);
        if (array_key_exists($keys[16], $arr)) $this->setParentingKelas($arr[$keys[16]]);
        if (array_key_exists($keys[17], $arr)) $this->setParentingKegiatan($arr[$keys[17]]);
        if (array_key_exists($keys[18], $arr)) $this->setParentingKonsultasi($arr[$keys[18]]);
        if (array_key_exists($keys[19], $arr)) $this->setParentingKunjungan($arr[$keys[19]]);
        if (array_key_exists($keys[20], $arr)) $this->setParentingLainnya($arr[$keys[20]]);
        if (array_key_exists($keys[21], $arr)) $this->setNilk($arr[$keys[21]]);
        if (array_key_exists($keys[22], $arr)) $this->setNilm($arr[$keys[22]]);
        if (array_key_exists($keys[23], $arr)) $this->setNoPenetapanPnf($arr[$keys[23]]);
        if (array_key_exists($keys[24], $arr)) $this->setTanggalPenetapanPnf($arr[$keys[24]]);
        if (array_key_exists($keys[25], $arr)) $this->setCreateDate($arr[$keys[25]]);
        if (array_key_exists($keys[26], $arr)) $this->setLastUpdate($arr[$keys[26]]);
        if (array_key_exists($keys[27], $arr)) $this->setSoftDelete($arr[$keys[27]]);
        if (array_key_exists($keys[28], $arr)) $this->setLastSync($arr[$keys[28]]);
        if (array_key_exists($keys[29], $arr)) $this->setUpdaterId($arr[$keys[29]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(SekolahPaudPeer::DATABASE_NAME);

        if ($this->isColumnModified(SekolahPaudPeer::SEKOLAH_ID)) $criteria->add(SekolahPaudPeer::SEKOLAH_ID, $this->sekolah_id);
        if ($this->isColumnModified(SekolahPaudPeer::KATEGORI_TK_ID)) $criteria->add(SekolahPaudPeer::KATEGORI_TK_ID, $this->kategori_tk_id);
        if ($this->isColumnModified(SekolahPaudPeer::KLASIFIKASI_LEMBAGA_ID)) $criteria->add(SekolahPaudPeer::KLASIFIKASI_LEMBAGA_ID, $this->klasifikasi_lembaga_id);
        if ($this->isColumnModified(SekolahPaudPeer::SUMBER_DANA_SEKOLAH_ID)) $criteria->add(SekolahPaudPeer::SUMBER_DANA_SEKOLAH_ID, $this->sumber_dana_sekolah_id);
        if ($this->isColumnModified(SekolahPaudPeer::FASILITAS_LAYANAN_ID)) $criteria->add(SekolahPaudPeer::FASILITAS_LAYANAN_ID, $this->fasilitas_layanan_id);
        if ($this->isColumnModified(SekolahPaudPeer::JADWAL_PMTAS)) $criteria->add(SekolahPaudPeer::JADWAL_PMTAS, $this->jadwal_pmtas);
        if ($this->isColumnModified(SekolahPaudPeer::LEMBAGA_PENGANGKAT_ID)) $criteria->add(SekolahPaudPeer::LEMBAGA_PENGANGKAT_ID, $this->lembaga_pengangkat_id);
        if ($this->isColumnModified(SekolahPaudPeer::JADWAL_DDTK)) $criteria->add(SekolahPaudPeer::JADWAL_DDTK, $this->jadwal_ddtk);
        if ($this->isColumnModified(SekolahPaudPeer::FREQ_PARENTING)) $criteria->add(SekolahPaudPeer::FREQ_PARENTING, $this->freq_parenting);
        if ($this->isColumnModified(SekolahPaudPeer::BENTUK_LEMBAGA_ID)) $criteria->add(SekolahPaudPeer::BENTUK_LEMBAGA_ID, $this->bentuk_lembaga_id);
        if ($this->isColumnModified(SekolahPaudPeer::JADWAL_KESEHATAN)) $criteria->add(SekolahPaudPeer::JADWAL_KESEHATAN, $this->jadwal_kesehatan);
        if ($this->isColumnModified(SekolahPaudPeer::IZIN_PAUD)) $criteria->add(SekolahPaudPeer::IZIN_PAUD, $this->izin_paud);
        if ($this->isColumnModified(SekolahPaudPeer::PENCATATAN_DDTK)) $criteria->add(SekolahPaudPeer::PENCATATAN_DDTK, $this->pencatatan_ddtk);
        if ($this->isColumnModified(SekolahPaudPeer::RUJUKAN_DDTK)) $criteria->add(SekolahPaudPeer::RUJUKAN_DDTK, $this->rujukan_ddtk);
        if ($this->isColumnModified(SekolahPaudPeer::PELAKSANAAN_PARENTING)) $criteria->add(SekolahPaudPeer::PELAKSANAAN_PARENTING, $this->pelaksanaan_parenting);
        if ($this->isColumnModified(SekolahPaudPeer::PARENTING_KPO)) $criteria->add(SekolahPaudPeer::PARENTING_KPO, $this->parenting_kpo);
        if ($this->isColumnModified(SekolahPaudPeer::PARENTING_KELAS)) $criteria->add(SekolahPaudPeer::PARENTING_KELAS, $this->parenting_kelas);
        if ($this->isColumnModified(SekolahPaudPeer::PARENTING_KEGIATAN)) $criteria->add(SekolahPaudPeer::PARENTING_KEGIATAN, $this->parenting_kegiatan);
        if ($this->isColumnModified(SekolahPaudPeer::PARENTING_KONSULTASI)) $criteria->add(SekolahPaudPeer::PARENTING_KONSULTASI, $this->parenting_konsultasi);
        if ($this->isColumnModified(SekolahPaudPeer::PARENTING_KUNJUNGAN)) $criteria->add(SekolahPaudPeer::PARENTING_KUNJUNGAN, $this->parenting_kunjungan);
        if ($this->isColumnModified(SekolahPaudPeer::PARENTING_LAINNYA)) $criteria->add(SekolahPaudPeer::PARENTING_LAINNYA, $this->parenting_lainnya);
        if ($this->isColumnModified(SekolahPaudPeer::NILK)) $criteria->add(SekolahPaudPeer::NILK, $this->nilk);
        if ($this->isColumnModified(SekolahPaudPeer::NILM)) $criteria->add(SekolahPaudPeer::NILM, $this->nilm);
        if ($this->isColumnModified(SekolahPaudPeer::NO_PENETAPAN_PNF)) $criteria->add(SekolahPaudPeer::NO_PENETAPAN_PNF, $this->no_penetapan_pnf);
        if ($this->isColumnModified(SekolahPaudPeer::TANGGAL_PENETAPAN_PNF)) $criteria->add(SekolahPaudPeer::TANGGAL_PENETAPAN_PNF, $this->tanggal_penetapan_pnf);
        if ($this->isColumnModified(SekolahPaudPeer::CREATE_DATE)) $criteria->add(SekolahPaudPeer::CREATE_DATE, $this->create_date);
        if ($this->isColumnModified(SekolahPaudPeer::LAST_UPDATE)) $criteria->add(SekolahPaudPeer::LAST_UPDATE, $this->last_update);
        if ($this->isColumnModified(SekolahPaudPeer::SOFT_DELETE)) $criteria->add(SekolahPaudPeer::SOFT_DELETE, $this->soft_delete);
        if ($this->isColumnModified(SekolahPaudPeer::LAST_SYNC)) $criteria->add(SekolahPaudPeer::LAST_SYNC, $this->last_sync);
        if ($this->isColumnModified(SekolahPaudPeer::UPDATER_ID)) $criteria->add(SekolahPaudPeer::UPDATER_ID, $this->updater_id);

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
        $criteria = new Criteria(SekolahPaudPeer::DATABASE_NAME);
        $criteria->add(SekolahPaudPeer::SEKOLAH_ID, $this->sekolah_id);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return string
     */
    public function getPrimaryKey()
    {
        return $this->getSekolahId();
    }

    /**
     * Generic method to set the primary key (sekolah_id column).
     *
     * @param  string $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setSekolahId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getSekolahId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of SekolahPaud (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setKategoriTkId($this->getKategoriTkId());
        $copyObj->setKlasifikasiLembagaId($this->getKlasifikasiLembagaId());
        $copyObj->setSumberDanaSekolahId($this->getSumberDanaSekolahId());
        $copyObj->setFasilitasLayananId($this->getFasilitasLayananId());
        $copyObj->setJadwalPmtas($this->getJadwalPmtas());
        $copyObj->setLembagaPengangkatId($this->getLembagaPengangkatId());
        $copyObj->setJadwalDdtk($this->getJadwalDdtk());
        $copyObj->setFreqParenting($this->getFreqParenting());
        $copyObj->setBentukLembagaId($this->getBentukLembagaId());
        $copyObj->setJadwalKesehatan($this->getJadwalKesehatan());
        $copyObj->setIzinPaud($this->getIzinPaud());
        $copyObj->setPencatatanDdtk($this->getPencatatanDdtk());
        $copyObj->setRujukanDdtk($this->getRujukanDdtk());
        $copyObj->setPelaksanaanParenting($this->getPelaksanaanParenting());
        $copyObj->setParentingKpo($this->getParentingKpo());
        $copyObj->setParentingKelas($this->getParentingKelas());
        $copyObj->setParentingKegiatan($this->getParentingKegiatan());
        $copyObj->setParentingKonsultasi($this->getParentingKonsultasi());
        $copyObj->setParentingKunjungan($this->getParentingKunjungan());
        $copyObj->setParentingLainnya($this->getParentingLainnya());
        $copyObj->setNilk($this->getNilk());
        $copyObj->setNilm($this->getNilm());
        $copyObj->setNoPenetapanPnf($this->getNoPenetapanPnf());
        $copyObj->setTanggalPenetapanPnf($this->getTanggalPenetapanPnf());
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

            $relObj = $this->getSekolah();
            if ($relObj) {
                $copyObj->setSekolah($relObj->copy($deepCopy));
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setSekolahId(NULL); // this is a auto-increment column, so set to default value
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
     * @return SekolahPaud Clone of current object.
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
     * @return SekolahPaudPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new SekolahPaudPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a BentukLembaga object.
     *
     * @param             BentukLembaga $v
     * @return SekolahPaud The current object (for fluent API support)
     * @throws PropelException
     */
    public function setBentukLembaga(BentukLembaga $v = null)
    {
        if ($v === null) {
            $this->setBentukLembagaId(NULL);
        } else {
            $this->setBentukLembagaId($v->getBentukLembagaId());
        }

        $this->aBentukLembaga = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the BentukLembaga object, it will not be re-added.
        if ($v !== null) {
            $v->addSekolahPaud($this);
        }


        return $this;
    }


    /**
     * Get the associated BentukLembaga object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return BentukLembaga The associated BentukLembaga object.
     * @throws PropelException
     */
    public function getBentukLembaga(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aBentukLembaga === null && (($this->bentuk_lembaga_id !== "" && $this->bentuk_lembaga_id !== null)) && $doQuery) {
            $this->aBentukLembaga = BentukLembagaQuery::create()->findPk($this->bentuk_lembaga_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aBentukLembaga->addSekolahPauds($this);
             */
        }

        return $this->aBentukLembaga;
    }

    /**
     * Declares an association between this object and a FasilitasLayanan object.
     *
     * @param             FasilitasLayanan $v
     * @return SekolahPaud The current object (for fluent API support)
     * @throws PropelException
     */
    public function setFasilitasLayanan(FasilitasLayanan $v = null)
    {
        if ($v === null) {
            $this->setFasilitasLayananId(NULL);
        } else {
            $this->setFasilitasLayananId($v->getFasilitasLayananId());
        }

        $this->aFasilitasLayanan = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the FasilitasLayanan object, it will not be re-added.
        if ($v !== null) {
            $v->addSekolahPaud($this);
        }


        return $this;
    }


    /**
     * Get the associated FasilitasLayanan object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return FasilitasLayanan The associated FasilitasLayanan object.
     * @throws PropelException
     */
    public function getFasilitasLayanan(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aFasilitasLayanan === null && (($this->fasilitas_layanan_id !== "" && $this->fasilitas_layanan_id !== null)) && $doQuery) {
            $this->aFasilitasLayanan = FasilitasLayananQuery::create()->findPk($this->fasilitas_layanan_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aFasilitasLayanan->addSekolahPauds($this);
             */
        }

        return $this->aFasilitasLayanan;
    }

    /**
     * Declares an association between this object and a JadwalPaud object.
     *
     * @param             JadwalPaud $v
     * @return SekolahPaud The current object (for fluent API support)
     * @throws PropelException
     */
    public function setJadwalPaudRelatedByFreqParenting(JadwalPaud $v = null)
    {
        if ($v === null) {
            $this->setFreqParenting(NULL);
        } else {
            $this->setFreqParenting($v->getJadwalId());
        }

        $this->aJadwalPaudRelatedByFreqParenting = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the JadwalPaud object, it will not be re-added.
        if ($v !== null) {
            $v->addSekolahPaudRelatedByFreqParenting($this);
        }


        return $this;
    }


    /**
     * Get the associated JadwalPaud object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return JadwalPaud The associated JadwalPaud object.
     * @throws PropelException
     */
    public function getJadwalPaudRelatedByFreqParenting(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aJadwalPaudRelatedByFreqParenting === null && (($this->freq_parenting !== "" && $this->freq_parenting !== null)) && $doQuery) {
            $this->aJadwalPaudRelatedByFreqParenting = JadwalPaudQuery::create()->findPk($this->freq_parenting, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aJadwalPaudRelatedByFreqParenting->addSekolahPaudsRelatedByFreqParenting($this);
             */
        }

        return $this->aJadwalPaudRelatedByFreqParenting;
    }

    /**
     * Declares an association between this object and a JadwalPaud object.
     *
     * @param             JadwalPaud $v
     * @return SekolahPaud The current object (for fluent API support)
     * @throws PropelException
     */
    public function setJadwalPaudRelatedByJadwalDdtk(JadwalPaud $v = null)
    {
        if ($v === null) {
            $this->setJadwalDdtk(NULL);
        } else {
            $this->setJadwalDdtk($v->getJadwalId());
        }

        $this->aJadwalPaudRelatedByJadwalDdtk = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the JadwalPaud object, it will not be re-added.
        if ($v !== null) {
            $v->addSekolahPaudRelatedByJadwalDdtk($this);
        }


        return $this;
    }


    /**
     * Get the associated JadwalPaud object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return JadwalPaud The associated JadwalPaud object.
     * @throws PropelException
     */
    public function getJadwalPaudRelatedByJadwalDdtk(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aJadwalPaudRelatedByJadwalDdtk === null && (($this->jadwal_ddtk !== "" && $this->jadwal_ddtk !== null)) && $doQuery) {
            $this->aJadwalPaudRelatedByJadwalDdtk = JadwalPaudQuery::create()->findPk($this->jadwal_ddtk, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aJadwalPaudRelatedByJadwalDdtk->addSekolahPaudsRelatedByJadwalDdtk($this);
             */
        }

        return $this->aJadwalPaudRelatedByJadwalDdtk;
    }

    /**
     * Declares an association between this object and a JadwalPaud object.
     *
     * @param             JadwalPaud $v
     * @return SekolahPaud The current object (for fluent API support)
     * @throws PropelException
     */
    public function setJadwalPaudRelatedByJadwalKesehatan(JadwalPaud $v = null)
    {
        if ($v === null) {
            $this->setJadwalKesehatan(NULL);
        } else {
            $this->setJadwalKesehatan($v->getJadwalId());
        }

        $this->aJadwalPaudRelatedByJadwalKesehatan = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the JadwalPaud object, it will not be re-added.
        if ($v !== null) {
            $v->addSekolahPaudRelatedByJadwalKesehatan($this);
        }


        return $this;
    }


    /**
     * Get the associated JadwalPaud object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return JadwalPaud The associated JadwalPaud object.
     * @throws PropelException
     */
    public function getJadwalPaudRelatedByJadwalKesehatan(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aJadwalPaudRelatedByJadwalKesehatan === null && (($this->jadwal_kesehatan !== "" && $this->jadwal_kesehatan !== null)) && $doQuery) {
            $this->aJadwalPaudRelatedByJadwalKesehatan = JadwalPaudQuery::create()->findPk($this->jadwal_kesehatan, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aJadwalPaudRelatedByJadwalKesehatan->addSekolahPaudsRelatedByJadwalKesehatan($this);
             */
        }

        return $this->aJadwalPaudRelatedByJadwalKesehatan;
    }

    /**
     * Declares an association between this object and a JadwalPaud object.
     *
     * @param             JadwalPaud $v
     * @return SekolahPaud The current object (for fluent API support)
     * @throws PropelException
     */
    public function setJadwalPaudRelatedByJadwalPmtas(JadwalPaud $v = null)
    {
        if ($v === null) {
            $this->setJadwalPmtas(NULL);
        } else {
            $this->setJadwalPmtas($v->getJadwalId());
        }

        $this->aJadwalPaudRelatedByJadwalPmtas = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the JadwalPaud object, it will not be re-added.
        if ($v !== null) {
            $v->addSekolahPaudRelatedByJadwalPmtas($this);
        }


        return $this;
    }


    /**
     * Get the associated JadwalPaud object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return JadwalPaud The associated JadwalPaud object.
     * @throws PropelException
     */
    public function getJadwalPaudRelatedByJadwalPmtas(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aJadwalPaudRelatedByJadwalPmtas === null && (($this->jadwal_pmtas !== "" && $this->jadwal_pmtas !== null)) && $doQuery) {
            $this->aJadwalPaudRelatedByJadwalPmtas = JadwalPaudQuery::create()->findPk($this->jadwal_pmtas, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aJadwalPaudRelatedByJadwalPmtas->addSekolahPaudsRelatedByJadwalPmtas($this);
             */
        }

        return $this->aJadwalPaudRelatedByJadwalPmtas;
    }

    /**
     * Declares an association between this object and a KategoriTk object.
     *
     * @param             KategoriTk $v
     * @return SekolahPaud The current object (for fluent API support)
     * @throws PropelException
     */
    public function setKategoriTk(KategoriTk $v = null)
    {
        if ($v === null) {
            $this->setKategoriTkId(NULL);
        } else {
            $this->setKategoriTkId($v->getKategoriTkId());
        }

        $this->aKategoriTk = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the KategoriTk object, it will not be re-added.
        if ($v !== null) {
            $v->addSekolahPaud($this);
        }


        return $this;
    }


    /**
     * Get the associated KategoriTk object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return KategoriTk The associated KategoriTk object.
     * @throws PropelException
     */
    public function getKategoriTk(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aKategoriTk === null && (($this->kategori_tk_id !== "" && $this->kategori_tk_id !== null)) && $doQuery) {
            $this->aKategoriTk = KategoriTkQuery::create()->findPk($this->kategori_tk_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aKategoriTk->addSekolahPauds($this);
             */
        }

        return $this->aKategoriTk;
    }

    /**
     * Declares an association between this object and a KlasifikasiLembaga object.
     *
     * @param             KlasifikasiLembaga $v
     * @return SekolahPaud The current object (for fluent API support)
     * @throws PropelException
     */
    public function setKlasifikasiLembaga(KlasifikasiLembaga $v = null)
    {
        if ($v === null) {
            $this->setKlasifikasiLembagaId(NULL);
        } else {
            $this->setKlasifikasiLembagaId($v->getKlasifikasiLembagaId());
        }

        $this->aKlasifikasiLembaga = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the KlasifikasiLembaga object, it will not be re-added.
        if ($v !== null) {
            $v->addSekolahPaud($this);
        }


        return $this;
    }


    /**
     * Get the associated KlasifikasiLembaga object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return KlasifikasiLembaga The associated KlasifikasiLembaga object.
     * @throws PropelException
     */
    public function getKlasifikasiLembaga(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aKlasifikasiLembaga === null && (($this->klasifikasi_lembaga_id !== "" && $this->klasifikasi_lembaga_id !== null)) && $doQuery) {
            $this->aKlasifikasiLembaga = KlasifikasiLembagaQuery::create()->findPk($this->klasifikasi_lembaga_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aKlasifikasiLembaga->addSekolahPauds($this);
             */
        }

        return $this->aKlasifikasiLembaga;
    }

    /**
     * Declares an association between this object and a LembagaPengangkat object.
     *
     * @param             LembagaPengangkat $v
     * @return SekolahPaud The current object (for fluent API support)
     * @throws PropelException
     */
    public function setLembagaPengangkat(LembagaPengangkat $v = null)
    {
        if ($v === null) {
            $this->setLembagaPengangkatId(NULL);
        } else {
            $this->setLembagaPengangkatId($v->getLembagaPengangkatId());
        }

        $this->aLembagaPengangkat = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the LembagaPengangkat object, it will not be re-added.
        if ($v !== null) {
            $v->addSekolahPaud($this);
        }


        return $this;
    }


    /**
     * Get the associated LembagaPengangkat object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return LembagaPengangkat The associated LembagaPengangkat object.
     * @throws PropelException
     */
    public function getLembagaPengangkat(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aLembagaPengangkat === null && (($this->lembaga_pengangkat_id !== "" && $this->lembaga_pengangkat_id !== null)) && $doQuery) {
            $this->aLembagaPengangkat = LembagaPengangkatQuery::create()->findPk($this->lembaga_pengangkat_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aLembagaPengangkat->addSekolahPauds($this);
             */
        }

        return $this->aLembagaPengangkat;
    }

    /**
     * Declares an association between this object and a Sekolah object.
     *
     * @param             Sekolah $v
     * @return SekolahPaud The current object (for fluent API support)
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

        // Add binding for other direction of this 1:1 relationship.
        if ($v !== null) {
            $v->setSekolahPaud($this);
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
            // Because this foreign key represents a one-to-one relationship, we will create a bi-directional association.
            $this->aSekolah->setSekolahPaud($this);
        }

        return $this->aSekolah;
    }

    /**
     * Declares an association between this object and a SumberDanaSekolah object.
     *
     * @param             SumberDanaSekolah $v
     * @return SekolahPaud The current object (for fluent API support)
     * @throws PropelException
     */
    public function setSumberDanaSekolah(SumberDanaSekolah $v = null)
    {
        if ($v === null) {
            $this->setSumberDanaSekolahId(NULL);
        } else {
            $this->setSumberDanaSekolahId($v->getSumberDanaSekolahId());
        }

        $this->aSumberDanaSekolah = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the SumberDanaSekolah object, it will not be re-added.
        if ($v !== null) {
            $v->addSekolahPaud($this);
        }


        return $this;
    }


    /**
     * Get the associated SumberDanaSekolah object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return SumberDanaSekolah The associated SumberDanaSekolah object.
     * @throws PropelException
     */
    public function getSumberDanaSekolah(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aSumberDanaSekolah === null && (($this->sumber_dana_sekolah_id !== "" && $this->sumber_dana_sekolah_id !== null)) && $doQuery) {
            $this->aSumberDanaSekolah = SumberDanaSekolahQuery::create()->findPk($this->sumber_dana_sekolah_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aSumberDanaSekolah->addSekolahPauds($this);
             */
        }

        return $this->aSumberDanaSekolah;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->sekolah_id = null;
        $this->kategori_tk_id = null;
        $this->klasifikasi_lembaga_id = null;
        $this->sumber_dana_sekolah_id = null;
        $this->fasilitas_layanan_id = null;
        $this->jadwal_pmtas = null;
        $this->lembaga_pengangkat_id = null;
        $this->jadwal_ddtk = null;
        $this->freq_parenting = null;
        $this->bentuk_lembaga_id = null;
        $this->jadwal_kesehatan = null;
        $this->izin_paud = null;
        $this->pencatatan_ddtk = null;
        $this->rujukan_ddtk = null;
        $this->pelaksanaan_parenting = null;
        $this->parenting_kpo = null;
        $this->parenting_kelas = null;
        $this->parenting_kegiatan = null;
        $this->parenting_konsultasi = null;
        $this->parenting_kunjungan = null;
        $this->parenting_lainnya = null;
        $this->nilk = null;
        $this->nilm = null;
        $this->no_penetapan_pnf = null;
        $this->tanggal_penetapan_pnf = null;
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
            if ($this->aBentukLembaga instanceof Persistent) {
              $this->aBentukLembaga->clearAllReferences($deep);
            }
            if ($this->aFasilitasLayanan instanceof Persistent) {
              $this->aFasilitasLayanan->clearAllReferences($deep);
            }
            if ($this->aJadwalPaudRelatedByFreqParenting instanceof Persistent) {
              $this->aJadwalPaudRelatedByFreqParenting->clearAllReferences($deep);
            }
            if ($this->aJadwalPaudRelatedByJadwalDdtk instanceof Persistent) {
              $this->aJadwalPaudRelatedByJadwalDdtk->clearAllReferences($deep);
            }
            if ($this->aJadwalPaudRelatedByJadwalKesehatan instanceof Persistent) {
              $this->aJadwalPaudRelatedByJadwalKesehatan->clearAllReferences($deep);
            }
            if ($this->aJadwalPaudRelatedByJadwalPmtas instanceof Persistent) {
              $this->aJadwalPaudRelatedByJadwalPmtas->clearAllReferences($deep);
            }
            if ($this->aKategoriTk instanceof Persistent) {
              $this->aKategoriTk->clearAllReferences($deep);
            }
            if ($this->aKlasifikasiLembaga instanceof Persistent) {
              $this->aKlasifikasiLembaga->clearAllReferences($deep);
            }
            if ($this->aLembagaPengangkat instanceof Persistent) {
              $this->aLembagaPengangkat->clearAllReferences($deep);
            }
            if ($this->aSekolah instanceof Persistent) {
              $this->aSekolah->clearAllReferences($deep);
            }
            if ($this->aSumberDanaSekolah instanceof Persistent) {
              $this->aSumberDanaSekolah->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        $this->aBentukLembaga = null;
        $this->aFasilitasLayanan = null;
        $this->aJadwalPaudRelatedByFreqParenting = null;
        $this->aJadwalPaudRelatedByJadwalDdtk = null;
        $this->aJadwalPaudRelatedByJadwalKesehatan = null;
        $this->aJadwalPaudRelatedByJadwalPmtas = null;
        $this->aKategoriTk = null;
        $this->aKlasifikasiLembaga = null;
        $this->aLembagaPengangkat = null;
        $this->aSekolah = null;
        $this->aSumberDanaSekolah = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(SekolahPaudPeer::DEFAULT_STRING_FORMAT);
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
