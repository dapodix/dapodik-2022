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
use DataDikdas\Model\Demografi;
use DataDikdas\Model\DemografiQuery;
use DataDikdas\Model\Dudi;
use DataDikdas\Model\DudiQuery;
use DataDikdas\Model\Instalasi;
use DataDikdas\Model\InstalasiQuery;
use DataDikdas\Model\KategoriDesa;
use DataDikdas\Model\KategoriDesaQuery;
use DataDikdas\Model\LembSertifikasi;
use DataDikdas\Model\LembSertifikasiQuery;
use DataDikdas\Model\LembagaAkreditasi;
use DataDikdas\Model\LembagaAkreditasiQuery;
use DataDikdas\Model\LembagaNonSekolah;
use DataDikdas\Model\LembagaNonSekolahQuery;
use DataDikdas\Model\LevelWilayah;
use DataDikdas\Model\LevelWilayahQuery;
use DataDikdas\Model\MstWilayah;
use DataDikdas\Model\MstWilayahPeer;
use DataDikdas\Model\MstWilayahQuery;
use DataDikdas\Model\Mulok;
use DataDikdas\Model\MulokQuery;
use DataDikdas\Model\Negara;
use DataDikdas\Model\NegaraQuery;
use DataDikdas\Model\Pengguna;
use DataDikdas\Model\PenggunaQuery;
use DataDikdas\Model\PesertaDidik;
use DataDikdas\Model\PesertaDidikQuery;
use DataDikdas\Model\Ptk;
use DataDikdas\Model\PtkQuery;
use DataDikdas\Model\Publisher;
use DataDikdas\Model\PublisherQuery;
use DataDikdas\Model\Sekolah;
use DataDikdas\Model\SekolahQuery;
use DataDikdas\Model\Tanah;
use DataDikdas\Model\TanahQuery;
use DataDikdas\Model\TetanggaKabkota;
use DataDikdas\Model\TetanggaKabkotaQuery;
use DataDikdas\Model\Yayasan;
use DataDikdas\Model\YayasanQuery;

/**
 * Base class that represents a row from the 'ref.mst_wilayah' table.
 *
 * 
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseMstWilayah extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'DataDikdas\\Model\\MstWilayahPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        MstWilayahPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the kode_wilayah field.
     * @var        string
     */
    protected $kode_wilayah;

    /**
     * The value for the nama field.
     * @var        string
     */
    protected $nama;

    /**
     * The value for the id_level_wilayah field.
     * @var        int
     */
    protected $id_level_wilayah;

    /**
     * The value for the mst_kode_wilayah field.
     * @var        string
     */
    protected $mst_kode_wilayah;

    /**
     * The value for the negara_id field.
     * @var        string
     */
    protected $negara_id;

    /**
     * The value for the asal_wilayah field.
     * @var        string
     */
    protected $asal_wilayah;

    /**
     * The value for the kode_bps field.
     * @var        string
     */
    protected $kode_bps;

    /**
     * The value for the kode_dagri field.
     * @var        string
     */
    protected $kode_dagri;

    /**
     * The value for the kode_keu field.
     * @var        string
     */
    protected $kode_keu;

    /**
     * The value for the id_prov field.
     * @var        string
     */
    protected $id_prov;

    /**
     * The value for the id_kabkota field.
     * @var        string
     */
    protected $id_kabkota;

    /**
     * The value for the id_kec field.
     * @var        string
     */
    protected $id_kec;

    /**
     * The value for the a_desa field.
     * Note: this column has a database default value of: '0'
     * @var        string
     */
    protected $a_desa;

    /**
     * The value for the a_kelurahan field.
     * Note: this column has a database default value of: '0'
     * @var        string
     */
    protected $a_kelurahan;

    /**
     * The value for the a_35 field.
     * Note: this column has a database default value of: '0'
     * @var        string
     */
    protected $a_35;

    /**
     * The value for the a_urban field.
     * Note: this column has a database default value of: '0'
     * @var        string
     */
    protected $a_urban;

    /**
     * The value for the kategori_desa_id field.
     * @var        string
     */
    protected $kategori_desa_id;

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
     * @var        KategoriDesa
     */
    protected $aKategoriDesa;

    /**
     * @var        LevelWilayah
     */
    protected $aLevelWilayah;

    /**
     * @var        MstWilayah
     */
    protected $aMstWilayahRelatedByMstKodeWilayah;

    /**
     * @var        Negara
     */
    protected $aNegara;

    /**
     * @var        PropelObjectCollection|Demografi[] Collection to store aggregation of Demografi objects.
     */
    protected $collDemografis;
    protected $collDemografisPartial;

    /**
     * @var        PropelObjectCollection|Dudi[] Collection to store aggregation of Dudi objects.
     */
    protected $collDudis;
    protected $collDudisPartial;

    /**
     * @var        PropelObjectCollection|Instalasi[] Collection to store aggregation of Instalasi objects.
     */
    protected $collInstalasis;
    protected $collInstalasisPartial;

    /**
     * @var        PropelObjectCollection|LembSertifikasi[] Collection to store aggregation of LembSertifikasi objects.
     */
    protected $collLembSertifikasis;
    protected $collLembSertifikasisPartial;

    /**
     * @var        PropelObjectCollection|LembagaAkreditasi[] Collection to store aggregation of LembagaAkreditasi objects.
     */
    protected $collLembagaAkreditasis;
    protected $collLembagaAkreditasisPartial;

    /**
     * @var        PropelObjectCollection|LembagaNonSekolah[] Collection to store aggregation of LembagaNonSekolah objects.
     */
    protected $collLembagaNonSekolahs;
    protected $collLembagaNonSekolahsPartial;

    /**
     * @var        PropelObjectCollection|MstWilayah[] Collection to store aggregation of MstWilayah objects.
     */
    protected $collMstWilayahsRelatedByKodeWilayah;
    protected $collMstWilayahsRelatedByKodeWilayahPartial;

    /**
     * @var        PropelObjectCollection|Mulok[] Collection to store aggregation of Mulok objects.
     */
    protected $collMuloks;
    protected $collMuloksPartial;

    /**
     * @var        PropelObjectCollection|Pengguna[] Collection to store aggregation of Pengguna objects.
     */
    protected $collPenggunas;
    protected $collPenggunasPartial;

    /**
     * @var        PropelObjectCollection|PesertaDidik[] Collection to store aggregation of PesertaDidik objects.
     */
    protected $collPesertaDidiks;
    protected $collPesertaDidiksPartial;

    /**
     * @var        PropelObjectCollection|Ptk[] Collection to store aggregation of Ptk objects.
     */
    protected $collPtks;
    protected $collPtksPartial;

    /**
     * @var        PropelObjectCollection|Publisher[] Collection to store aggregation of Publisher objects.
     */
    protected $collPublishers;
    protected $collPublishersPartial;

    /**
     * @var        PropelObjectCollection|Sekolah[] Collection to store aggregation of Sekolah objects.
     */
    protected $collSekolahs;
    protected $collSekolahsPartial;

    /**
     * @var        PropelObjectCollection|Tanah[] Collection to store aggregation of Tanah objects.
     */
    protected $collTanahs;
    protected $collTanahsPartial;

    /**
     * @var        PropelObjectCollection|TetanggaKabkota[] Collection to store aggregation of TetanggaKabkota objects.
     */
    protected $collTetanggaKabkotasRelatedByKodeWilayah1;
    protected $collTetanggaKabkotasRelatedByKodeWilayah1Partial;

    /**
     * @var        PropelObjectCollection|TetanggaKabkota[] Collection to store aggregation of TetanggaKabkota objects.
     */
    protected $collTetanggaKabkotasRelatedByKodeWilayah2;
    protected $collTetanggaKabkotasRelatedByKodeWilayah2Partial;

    /**
     * @var        PropelObjectCollection|Yayasan[] Collection to store aggregation of Yayasan objects.
     */
    protected $collYayasans;
    protected $collYayasansPartial;

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
    protected $demografisScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $dudisScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $instalasisScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $lembSertifikasisScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $lembagaAkreditasisScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $lembagaNonSekolahsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $mstWilayahsRelatedByKodeWilayahScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $muloksScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $penggunasScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $pesertaDidiksScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $ptksScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $publishersScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $sekolahsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $tanahsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $tetanggaKabkotasRelatedByKodeWilayah1ScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $tetanggaKabkotasRelatedByKodeWilayah2ScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $yayasansScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->a_desa = '0';
        $this->a_kelurahan = '0';
        $this->a_35 = '0';
        $this->a_urban = '0';
        $this->create_date = '2020-04-16 09:40:03';
        $this->last_update = '2020-04-16 09:40:03';
        $this->last_sync = '1901-01-01 00:00:00';
    }

    /**
     * Initializes internal state of BaseMstWilayah object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [kode_wilayah] column value.
     * 
     * @return string
     */
    public function getKodeWilayah()
    {
        return $this->kode_wilayah;
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
     * Get the [id_level_wilayah] column value.
     * 
     * @return int
     */
    public function getIdLevelWilayah()
    {
        return $this->id_level_wilayah;
    }

    /**
     * Get the [mst_kode_wilayah] column value.
     * 
     * @return string
     */
    public function getMstKodeWilayah()
    {
        return $this->mst_kode_wilayah;
    }

    /**
     * Get the [negara_id] column value.
     * 
     * @return string
     */
    public function getNegaraId()
    {
        return $this->negara_id;
    }

    /**
     * Get the [asal_wilayah] column value.
     * 
     * @return string
     */
    public function getAsalWilayah()
    {
        return $this->asal_wilayah;
    }

    /**
     * Get the [kode_bps] column value.
     * 
     * @return string
     */
    public function getKodeBps()
    {
        return $this->kode_bps;
    }

    /**
     * Get the [kode_dagri] column value.
     * 
     * @return string
     */
    public function getKodeDagri()
    {
        return $this->kode_dagri;
    }

    /**
     * Get the [kode_keu] column value.
     * 
     * @return string
     */
    public function getKodeKeu()
    {
        return $this->kode_keu;
    }

    /**
     * Get the [id_prov] column value.
     * 
     * @return string
     */
    public function getIdProv()
    {
        return $this->id_prov;
    }

    /**
     * Get the [id_kabkota] column value.
     * 
     * @return string
     */
    public function getIdKabkota()
    {
        return $this->id_kabkota;
    }

    /**
     * Get the [id_kec] column value.
     * 
     * @return string
     */
    public function getIdKec()
    {
        return $this->id_kec;
    }

    /**
     * Get the [a_desa] column value.
     * 
     * @return string
     */
    public function getADesa()
    {
        return $this->a_desa;
    }

    /**
     * Get the [a_kelurahan] column value.
     * 
     * @return string
     */
    public function getAKelurahan()
    {
        return $this->a_kelurahan;
    }

    /**
     * Get the [a_35] column value.
     * 
     * @return string
     */
    public function getA35()
    {
        return $this->a_35;
    }

    /**
     * Get the [a_urban] column value.
     * 
     * @return string
     */
    public function getAUrban()
    {
        return $this->a_urban;
    }

    /**
     * Get the [kategori_desa_id] column value.
     * 
     * @return string
     */
    public function getKategoriDesaId()
    {
        return $this->kategori_desa_id;
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
     * Set the value of [kode_wilayah] column.
     * 
     * @param string $v new value
     * @return MstWilayah The current object (for fluent API support)
     */
    public function setKodeWilayah($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->kode_wilayah !== $v) {
            $this->kode_wilayah = $v;
            $this->modifiedColumns[] = MstWilayahPeer::KODE_WILAYAH;
        }


        return $this;
    } // setKodeWilayah()

    /**
     * Set the value of [nama] column.
     * 
     * @param string $v new value
     * @return MstWilayah The current object (for fluent API support)
     */
    public function setNama($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nama !== $v) {
            $this->nama = $v;
            $this->modifiedColumns[] = MstWilayahPeer::NAMA;
        }


        return $this;
    } // setNama()

    /**
     * Set the value of [id_level_wilayah] column.
     * 
     * @param int $v new value
     * @return MstWilayah The current object (for fluent API support)
     */
    public function setIdLevelWilayah($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id_level_wilayah !== $v) {
            $this->id_level_wilayah = $v;
            $this->modifiedColumns[] = MstWilayahPeer::ID_LEVEL_WILAYAH;
        }

        if ($this->aLevelWilayah !== null && $this->aLevelWilayah->getIdLevelWilayah() !== $v) {
            $this->aLevelWilayah = null;
        }


        return $this;
    } // setIdLevelWilayah()

    /**
     * Set the value of [mst_kode_wilayah] column.
     * 
     * @param string $v new value
     * @return MstWilayah The current object (for fluent API support)
     */
    public function setMstKodeWilayah($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->mst_kode_wilayah !== $v) {
            $this->mst_kode_wilayah = $v;
            $this->modifiedColumns[] = MstWilayahPeer::MST_KODE_WILAYAH;
        }

        if ($this->aMstWilayahRelatedByMstKodeWilayah !== null && $this->aMstWilayahRelatedByMstKodeWilayah->getKodeWilayah() !== $v) {
            $this->aMstWilayahRelatedByMstKodeWilayah = null;
        }


        return $this;
    } // setMstKodeWilayah()

    /**
     * Set the value of [negara_id] column.
     * 
     * @param string $v new value
     * @return MstWilayah The current object (for fluent API support)
     */
    public function setNegaraId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->negara_id !== $v) {
            $this->negara_id = $v;
            $this->modifiedColumns[] = MstWilayahPeer::NEGARA_ID;
        }

        if ($this->aNegara !== null && $this->aNegara->getNegaraId() !== $v) {
            $this->aNegara = null;
        }


        return $this;
    } // setNegaraId()

    /**
     * Set the value of [asal_wilayah] column.
     * 
     * @param string $v new value
     * @return MstWilayah The current object (for fluent API support)
     */
    public function setAsalWilayah($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->asal_wilayah !== $v) {
            $this->asal_wilayah = $v;
            $this->modifiedColumns[] = MstWilayahPeer::ASAL_WILAYAH;
        }


        return $this;
    } // setAsalWilayah()

    /**
     * Set the value of [kode_bps] column.
     * 
     * @param string $v new value
     * @return MstWilayah The current object (for fluent API support)
     */
    public function setKodeBps($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->kode_bps !== $v) {
            $this->kode_bps = $v;
            $this->modifiedColumns[] = MstWilayahPeer::KODE_BPS;
        }


        return $this;
    } // setKodeBps()

    /**
     * Set the value of [kode_dagri] column.
     * 
     * @param string $v new value
     * @return MstWilayah The current object (for fluent API support)
     */
    public function setKodeDagri($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->kode_dagri !== $v) {
            $this->kode_dagri = $v;
            $this->modifiedColumns[] = MstWilayahPeer::KODE_DAGRI;
        }


        return $this;
    } // setKodeDagri()

    /**
     * Set the value of [kode_keu] column.
     * 
     * @param string $v new value
     * @return MstWilayah The current object (for fluent API support)
     */
    public function setKodeKeu($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->kode_keu !== $v) {
            $this->kode_keu = $v;
            $this->modifiedColumns[] = MstWilayahPeer::KODE_KEU;
        }


        return $this;
    } // setKodeKeu()

    /**
     * Set the value of [id_prov] column.
     * 
     * @param string $v new value
     * @return MstWilayah The current object (for fluent API support)
     */
    public function setIdProv($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->id_prov !== $v) {
            $this->id_prov = $v;
            $this->modifiedColumns[] = MstWilayahPeer::ID_PROV;
        }


        return $this;
    } // setIdProv()

    /**
     * Set the value of [id_kabkota] column.
     * 
     * @param string $v new value
     * @return MstWilayah The current object (for fluent API support)
     */
    public function setIdKabkota($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->id_kabkota !== $v) {
            $this->id_kabkota = $v;
            $this->modifiedColumns[] = MstWilayahPeer::ID_KABKOTA;
        }


        return $this;
    } // setIdKabkota()

    /**
     * Set the value of [id_kec] column.
     * 
     * @param string $v new value
     * @return MstWilayah The current object (for fluent API support)
     */
    public function setIdKec($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->id_kec !== $v) {
            $this->id_kec = $v;
            $this->modifiedColumns[] = MstWilayahPeer::ID_KEC;
        }


        return $this;
    } // setIdKec()

    /**
     * Set the value of [a_desa] column.
     * 
     * @param string $v new value
     * @return MstWilayah The current object (for fluent API support)
     */
    public function setADesa($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->a_desa !== $v) {
            $this->a_desa = $v;
            $this->modifiedColumns[] = MstWilayahPeer::A_DESA;
        }


        return $this;
    } // setADesa()

    /**
     * Set the value of [a_kelurahan] column.
     * 
     * @param string $v new value
     * @return MstWilayah The current object (for fluent API support)
     */
    public function setAKelurahan($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->a_kelurahan !== $v) {
            $this->a_kelurahan = $v;
            $this->modifiedColumns[] = MstWilayahPeer::A_KELURAHAN;
        }


        return $this;
    } // setAKelurahan()

    /**
     * Set the value of [a_35] column.
     * 
     * @param string $v new value
     * @return MstWilayah The current object (for fluent API support)
     */
    public function setA35($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->a_35 !== $v) {
            $this->a_35 = $v;
            $this->modifiedColumns[] = MstWilayahPeer::A_35;
        }


        return $this;
    } // setA35()

    /**
     * Set the value of [a_urban] column.
     * 
     * @param string $v new value
     * @return MstWilayah The current object (for fluent API support)
     */
    public function setAUrban($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->a_urban !== $v) {
            $this->a_urban = $v;
            $this->modifiedColumns[] = MstWilayahPeer::A_URBAN;
        }


        return $this;
    } // setAUrban()

    /**
     * Set the value of [kategori_desa_id] column.
     * 
     * @param string $v new value
     * @return MstWilayah The current object (for fluent API support)
     */
    public function setKategoriDesaId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->kategori_desa_id !== $v) {
            $this->kategori_desa_id = $v;
            $this->modifiedColumns[] = MstWilayahPeer::KATEGORI_DESA_ID;
        }

        if ($this->aKategoriDesa !== null && $this->aKategoriDesa->getKategoriDesaId() !== $v) {
            $this->aKategoriDesa = null;
        }


        return $this;
    } // setKategoriDesaId()

    /**
     * Sets the value of [create_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return MstWilayah The current object (for fluent API support)
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
                $this->modifiedColumns[] = MstWilayahPeer::CREATE_DATE;
            }
        } // if either are not null


        return $this;
    } // setCreateDate()

    /**
     * Sets the value of [last_update] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return MstWilayah The current object (for fluent API support)
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
                $this->modifiedColumns[] = MstWilayahPeer::LAST_UPDATE;
            }
        } // if either are not null


        return $this;
    } // setLastUpdate()

    /**
     * Sets the value of [expired_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return MstWilayah The current object (for fluent API support)
     */
    public function setExpiredDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->expired_date !== null || $dt !== null) {
            $currentDateAsString = ($this->expired_date !== null && $tmpDt = new DateTime($this->expired_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->expired_date = $newDateAsString;
                $this->modifiedColumns[] = MstWilayahPeer::EXPIRED_DATE;
            }
        } // if either are not null


        return $this;
    } // setExpiredDate()

    /**
     * Sets the value of [last_sync] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return MstWilayah The current object (for fluent API support)
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
                $this->modifiedColumns[] = MstWilayahPeer::LAST_SYNC;
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
            if ($this->a_desa !== '0') {
                return false;
            }

            if ($this->a_kelurahan !== '0') {
                return false;
            }

            if ($this->a_35 !== '0') {
                return false;
            }

            if ($this->a_urban !== '0') {
                return false;
            }

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

            $this->kode_wilayah = ($row[$startcol + 0] !== null) ? (string) $row[$startcol + 0] : null;
            $this->nama = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->id_level_wilayah = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
            $this->mst_kode_wilayah = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->negara_id = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->asal_wilayah = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->kode_bps = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->kode_dagri = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->kode_keu = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->id_prov = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
            $this->id_kabkota = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
            $this->id_kec = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
            $this->a_desa = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
            $this->a_kelurahan = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
            $this->a_35 = ($row[$startcol + 14] !== null) ? (string) $row[$startcol + 14] : null;
            $this->a_urban = ($row[$startcol + 15] !== null) ? (string) $row[$startcol + 15] : null;
            $this->kategori_desa_id = ($row[$startcol + 16] !== null) ? (string) $row[$startcol + 16] : null;
            $this->create_date = ($row[$startcol + 17] !== null) ? (string) $row[$startcol + 17] : null;
            $this->last_update = ($row[$startcol + 18] !== null) ? (string) $row[$startcol + 18] : null;
            $this->expired_date = ($row[$startcol + 19] !== null) ? (string) $row[$startcol + 19] : null;
            $this->last_sync = ($row[$startcol + 20] !== null) ? (string) $row[$startcol + 20] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 21; // 21 = MstWilayahPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating MstWilayah object", $e);
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

        if ($this->aLevelWilayah !== null && $this->id_level_wilayah !== $this->aLevelWilayah->getIdLevelWilayah()) {
            $this->aLevelWilayah = null;
        }
        if ($this->aMstWilayahRelatedByMstKodeWilayah !== null && $this->mst_kode_wilayah !== $this->aMstWilayahRelatedByMstKodeWilayah->getKodeWilayah()) {
            $this->aMstWilayahRelatedByMstKodeWilayah = null;
        }
        if ($this->aNegara !== null && $this->negara_id !== $this->aNegara->getNegaraId()) {
            $this->aNegara = null;
        }
        if ($this->aKategoriDesa !== null && $this->kategori_desa_id !== $this->aKategoriDesa->getKategoriDesaId()) {
            $this->aKategoriDesa = null;
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
            $con = Propel::getConnection(MstWilayahPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = MstWilayahPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aKategoriDesa = null;
            $this->aLevelWilayah = null;
            $this->aMstWilayahRelatedByMstKodeWilayah = null;
            $this->aNegara = null;
            $this->collDemografis = null;

            $this->collDudis = null;

            $this->collInstalasis = null;

            $this->collLembSertifikasis = null;

            $this->collLembagaAkreditasis = null;

            $this->collLembagaNonSekolahs = null;

            $this->collMstWilayahsRelatedByKodeWilayah = null;

            $this->collMuloks = null;

            $this->collPenggunas = null;

            $this->collPesertaDidiks = null;

            $this->collPtks = null;

            $this->collPublishers = null;

            $this->collSekolahs = null;

            $this->collTanahs = null;

            $this->collTetanggaKabkotasRelatedByKodeWilayah1 = null;

            $this->collTetanggaKabkotasRelatedByKodeWilayah2 = null;

            $this->collYayasans = null;

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
            $con = Propel::getConnection(MstWilayahPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = MstWilayahQuery::create()
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
            $con = Propel::getConnection(MstWilayahPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                MstWilayahPeer::addInstanceToPool($this);
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

            if ($this->aKategoriDesa !== null) {
                if ($this->aKategoriDesa->isModified() || $this->aKategoriDesa->isNew()) {
                    $affectedRows += $this->aKategoriDesa->save($con);
                }
                $this->setKategoriDesa($this->aKategoriDesa);
            }

            if ($this->aLevelWilayah !== null) {
                if ($this->aLevelWilayah->isModified() || $this->aLevelWilayah->isNew()) {
                    $affectedRows += $this->aLevelWilayah->save($con);
                }
                $this->setLevelWilayah($this->aLevelWilayah);
            }

            if ($this->aMstWilayahRelatedByMstKodeWilayah !== null) {
                if ($this->aMstWilayahRelatedByMstKodeWilayah->isModified() || $this->aMstWilayahRelatedByMstKodeWilayah->isNew()) {
                    $affectedRows += $this->aMstWilayahRelatedByMstKodeWilayah->save($con);
                }
                $this->setMstWilayahRelatedByMstKodeWilayah($this->aMstWilayahRelatedByMstKodeWilayah);
            }

            if ($this->aNegara !== null) {
                if ($this->aNegara->isModified() || $this->aNegara->isNew()) {
                    $affectedRows += $this->aNegara->save($con);
                }
                $this->setNegara($this->aNegara);
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

            if ($this->demografisScheduledForDeletion !== null) {
                if (!$this->demografisScheduledForDeletion->isEmpty()) {
                    DemografiQuery::create()
                        ->filterByPrimaryKeys($this->demografisScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->demografisScheduledForDeletion = null;
                }
            }

            if ($this->collDemografis !== null) {
                foreach ($this->collDemografis as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->dudisScheduledForDeletion !== null) {
                if (!$this->dudisScheduledForDeletion->isEmpty()) {
                    DudiQuery::create()
                        ->filterByPrimaryKeys($this->dudisScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->dudisScheduledForDeletion = null;
                }
            }

            if ($this->collDudis !== null) {
                foreach ($this->collDudis as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->instalasisScheduledForDeletion !== null) {
                if (!$this->instalasisScheduledForDeletion->isEmpty()) {
                    foreach ($this->instalasisScheduledForDeletion as $instalasi) {
                        // need to save related object because we set the relation to null
                        $instalasi->save($con);
                    }
                    $this->instalasisScheduledForDeletion = null;
                }
            }

            if ($this->collInstalasis !== null) {
                foreach ($this->collInstalasis as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->lembSertifikasisScheduledForDeletion !== null) {
                if (!$this->lembSertifikasisScheduledForDeletion->isEmpty()) {
                    LembSertifikasiQuery::create()
                        ->filterByPrimaryKeys($this->lembSertifikasisScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->lembSertifikasisScheduledForDeletion = null;
                }
            }

            if ($this->collLembSertifikasis !== null) {
                foreach ($this->collLembSertifikasis as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->lembagaAkreditasisScheduledForDeletion !== null) {
                if (!$this->lembagaAkreditasisScheduledForDeletion->isEmpty()) {
                    LembagaAkreditasiQuery::create()
                        ->filterByPrimaryKeys($this->lembagaAkreditasisScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->lembagaAkreditasisScheduledForDeletion = null;
                }
            }

            if ($this->collLembagaAkreditasis !== null) {
                foreach ($this->collLembagaAkreditasis as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->lembagaNonSekolahsScheduledForDeletion !== null) {
                if (!$this->lembagaNonSekolahsScheduledForDeletion->isEmpty()) {
                    LembagaNonSekolahQuery::create()
                        ->filterByPrimaryKeys($this->lembagaNonSekolahsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->lembagaNonSekolahsScheduledForDeletion = null;
                }
            }

            if ($this->collLembagaNonSekolahs !== null) {
                foreach ($this->collLembagaNonSekolahs as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->mstWilayahsRelatedByKodeWilayahScheduledForDeletion !== null) {
                if (!$this->mstWilayahsRelatedByKodeWilayahScheduledForDeletion->isEmpty()) {
                    foreach ($this->mstWilayahsRelatedByKodeWilayahScheduledForDeletion as $mstWilayahRelatedByKodeWilayah) {
                        // need to save related object because we set the relation to null
                        $mstWilayahRelatedByKodeWilayah->save($con);
                    }
                    $this->mstWilayahsRelatedByKodeWilayahScheduledForDeletion = null;
                }
            }

            if ($this->collMstWilayahsRelatedByKodeWilayah !== null) {
                foreach ($this->collMstWilayahsRelatedByKodeWilayah as $referrerFK) {
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

            if ($this->penggunasScheduledForDeletion !== null) {
                if (!$this->penggunasScheduledForDeletion->isEmpty()) {
                    PenggunaQuery::create()
                        ->filterByPrimaryKeys($this->penggunasScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->penggunasScheduledForDeletion = null;
                }
            }

            if ($this->collPenggunas !== null) {
                foreach ($this->collPenggunas as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->pesertaDidiksScheduledForDeletion !== null) {
                if (!$this->pesertaDidiksScheduledForDeletion->isEmpty()) {
                    PesertaDidikQuery::create()
                        ->filterByPrimaryKeys($this->pesertaDidiksScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->pesertaDidiksScheduledForDeletion = null;
                }
            }

            if ($this->collPesertaDidiks !== null) {
                foreach ($this->collPesertaDidiks as $referrerFK) {
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

            if ($this->publishersScheduledForDeletion !== null) {
                if (!$this->publishersScheduledForDeletion->isEmpty()) {
                    PublisherQuery::create()
                        ->filterByPrimaryKeys($this->publishersScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->publishersScheduledForDeletion = null;
                }
            }

            if ($this->collPublishers !== null) {
                foreach ($this->collPublishers as $referrerFK) {
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

            if ($this->tanahsScheduledForDeletion !== null) {
                if (!$this->tanahsScheduledForDeletion->isEmpty()) {
                    TanahQuery::create()
                        ->filterByPrimaryKeys($this->tanahsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->tanahsScheduledForDeletion = null;
                }
            }

            if ($this->collTanahs !== null) {
                foreach ($this->collTanahs as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->tetanggaKabkotasRelatedByKodeWilayah1ScheduledForDeletion !== null) {
                if (!$this->tetanggaKabkotasRelatedByKodeWilayah1ScheduledForDeletion->isEmpty()) {
                    TetanggaKabkotaQuery::create()
                        ->filterByPrimaryKeys($this->tetanggaKabkotasRelatedByKodeWilayah1ScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->tetanggaKabkotasRelatedByKodeWilayah1ScheduledForDeletion = null;
                }
            }

            if ($this->collTetanggaKabkotasRelatedByKodeWilayah1 !== null) {
                foreach ($this->collTetanggaKabkotasRelatedByKodeWilayah1 as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->tetanggaKabkotasRelatedByKodeWilayah2ScheduledForDeletion !== null) {
                if (!$this->tetanggaKabkotasRelatedByKodeWilayah2ScheduledForDeletion->isEmpty()) {
                    TetanggaKabkotaQuery::create()
                        ->filterByPrimaryKeys($this->tetanggaKabkotasRelatedByKodeWilayah2ScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->tetanggaKabkotasRelatedByKodeWilayah2ScheduledForDeletion = null;
                }
            }

            if ($this->collTetanggaKabkotasRelatedByKodeWilayah2 !== null) {
                foreach ($this->collTetanggaKabkotasRelatedByKodeWilayah2 as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->yayasansScheduledForDeletion !== null) {
                if (!$this->yayasansScheduledForDeletion->isEmpty()) {
                    YayasanQuery::create()
                        ->filterByPrimaryKeys($this->yayasansScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->yayasansScheduledForDeletion = null;
                }
            }

            if ($this->collYayasans !== null) {
                foreach ($this->collYayasans as $referrerFK) {
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
        if ($this->isColumnModified(MstWilayahPeer::KODE_WILAYAH)) {
            $modifiedColumns[':p' . $index++]  = '"kode_wilayah"';
        }
        if ($this->isColumnModified(MstWilayahPeer::NAMA)) {
            $modifiedColumns[':p' . $index++]  = '"nama"';
        }
        if ($this->isColumnModified(MstWilayahPeer::ID_LEVEL_WILAYAH)) {
            $modifiedColumns[':p' . $index++]  = '"id_level_wilayah"';
        }
        if ($this->isColumnModified(MstWilayahPeer::MST_KODE_WILAYAH)) {
            $modifiedColumns[':p' . $index++]  = '"mst_kode_wilayah"';
        }
        if ($this->isColumnModified(MstWilayahPeer::NEGARA_ID)) {
            $modifiedColumns[':p' . $index++]  = '"negara_id"';
        }
        if ($this->isColumnModified(MstWilayahPeer::ASAL_WILAYAH)) {
            $modifiedColumns[':p' . $index++]  = '"asal_wilayah"';
        }
        if ($this->isColumnModified(MstWilayahPeer::KODE_BPS)) {
            $modifiedColumns[':p' . $index++]  = '"kode_bps"';
        }
        if ($this->isColumnModified(MstWilayahPeer::KODE_DAGRI)) {
            $modifiedColumns[':p' . $index++]  = '"kode_dagri"';
        }
        if ($this->isColumnModified(MstWilayahPeer::KODE_KEU)) {
            $modifiedColumns[':p' . $index++]  = '"kode_keu"';
        }
        if ($this->isColumnModified(MstWilayahPeer::ID_PROV)) {
            $modifiedColumns[':p' . $index++]  = '"id_prov"';
        }
        if ($this->isColumnModified(MstWilayahPeer::ID_KABKOTA)) {
            $modifiedColumns[':p' . $index++]  = '"id_kabkota"';
        }
        if ($this->isColumnModified(MstWilayahPeer::ID_KEC)) {
            $modifiedColumns[':p' . $index++]  = '"id_kec"';
        }
        if ($this->isColumnModified(MstWilayahPeer::A_DESA)) {
            $modifiedColumns[':p' . $index++]  = '"a_desa"';
        }
        if ($this->isColumnModified(MstWilayahPeer::A_KELURAHAN)) {
            $modifiedColumns[':p' . $index++]  = '"a_kelurahan"';
        }
        if ($this->isColumnModified(MstWilayahPeer::A_35)) {
            $modifiedColumns[':p' . $index++]  = '"a_35"';
        }
        if ($this->isColumnModified(MstWilayahPeer::A_URBAN)) {
            $modifiedColumns[':p' . $index++]  = '"a_urban"';
        }
        if ($this->isColumnModified(MstWilayahPeer::KATEGORI_DESA_ID)) {
            $modifiedColumns[':p' . $index++]  = '"kategori_desa_id"';
        }
        if ($this->isColumnModified(MstWilayahPeer::CREATE_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"create_date"';
        }
        if ($this->isColumnModified(MstWilayahPeer::LAST_UPDATE)) {
            $modifiedColumns[':p' . $index++]  = '"last_update"';
        }
        if ($this->isColumnModified(MstWilayahPeer::EXPIRED_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"expired_date"';
        }
        if ($this->isColumnModified(MstWilayahPeer::LAST_SYNC)) {
            $modifiedColumns[':p' . $index++]  = '"last_sync"';
        }

        $sql = sprintf(
            'INSERT INTO "ref"."mst_wilayah" (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '"kode_wilayah"':						
                        $stmt->bindValue($identifier, $this->kode_wilayah, PDO::PARAM_STR);
                        break;
                    case '"nama"':						
                        $stmt->bindValue($identifier, $this->nama, PDO::PARAM_STR);
                        break;
                    case '"id_level_wilayah"':						
                        $stmt->bindValue($identifier, $this->id_level_wilayah, PDO::PARAM_INT);
                        break;
                    case '"mst_kode_wilayah"':						
                        $stmt->bindValue($identifier, $this->mst_kode_wilayah, PDO::PARAM_STR);
                        break;
                    case '"negara_id"':						
                        $stmt->bindValue($identifier, $this->negara_id, PDO::PARAM_STR);
                        break;
                    case '"asal_wilayah"':						
                        $stmt->bindValue($identifier, $this->asal_wilayah, PDO::PARAM_STR);
                        break;
                    case '"kode_bps"':						
                        $stmt->bindValue($identifier, $this->kode_bps, PDO::PARAM_STR);
                        break;
                    case '"kode_dagri"':						
                        $stmt->bindValue($identifier, $this->kode_dagri, PDO::PARAM_STR);
                        break;
                    case '"kode_keu"':						
                        $stmt->bindValue($identifier, $this->kode_keu, PDO::PARAM_STR);
                        break;
                    case '"id_prov"':						
                        $stmt->bindValue($identifier, $this->id_prov, PDO::PARAM_STR);
                        break;
                    case '"id_kabkota"':						
                        $stmt->bindValue($identifier, $this->id_kabkota, PDO::PARAM_STR);
                        break;
                    case '"id_kec"':						
                        $stmt->bindValue($identifier, $this->id_kec, PDO::PARAM_STR);
                        break;
                    case '"a_desa"':						
                        $stmt->bindValue($identifier, $this->a_desa, PDO::PARAM_STR);
                        break;
                    case '"a_kelurahan"':						
                        $stmt->bindValue($identifier, $this->a_kelurahan, PDO::PARAM_STR);
                        break;
                    case '"a_35"':						
                        $stmt->bindValue($identifier, $this->a_35, PDO::PARAM_STR);
                        break;
                    case '"a_urban"':						
                        $stmt->bindValue($identifier, $this->a_urban, PDO::PARAM_STR);
                        break;
                    case '"kategori_desa_id"':						
                        $stmt->bindValue($identifier, $this->kategori_desa_id, PDO::PARAM_STR);
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

            if ($this->aKategoriDesa !== null) {
                if (!$this->aKategoriDesa->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aKategoriDesa->getValidationFailures());
                }
            }

            if ($this->aLevelWilayah !== null) {
                if (!$this->aLevelWilayah->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aLevelWilayah->getValidationFailures());
                }
            }

            if ($this->aMstWilayahRelatedByMstKodeWilayah !== null) {
                if (!$this->aMstWilayahRelatedByMstKodeWilayah->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aMstWilayahRelatedByMstKodeWilayah->getValidationFailures());
                }
            }

            if ($this->aNegara !== null) {
                if (!$this->aNegara->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aNegara->getValidationFailures());
                }
            }


            if (($retval = MstWilayahPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collDemografis !== null) {
                    foreach ($this->collDemografis as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collDudis !== null) {
                    foreach ($this->collDudis as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collInstalasis !== null) {
                    foreach ($this->collInstalasis as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collLembSertifikasis !== null) {
                    foreach ($this->collLembSertifikasis as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collLembagaAkreditasis !== null) {
                    foreach ($this->collLembagaAkreditasis as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collLembagaNonSekolahs !== null) {
                    foreach ($this->collLembagaNonSekolahs as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collMstWilayahsRelatedByKodeWilayah !== null) {
                    foreach ($this->collMstWilayahsRelatedByKodeWilayah as $referrerFK) {
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

                if ($this->collPenggunas !== null) {
                    foreach ($this->collPenggunas as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collPesertaDidiks !== null) {
                    foreach ($this->collPesertaDidiks as $referrerFK) {
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

                if ($this->collPublishers !== null) {
                    foreach ($this->collPublishers as $referrerFK) {
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

                if ($this->collTanahs !== null) {
                    foreach ($this->collTanahs as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collTetanggaKabkotasRelatedByKodeWilayah1 !== null) {
                    foreach ($this->collTetanggaKabkotasRelatedByKodeWilayah1 as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collTetanggaKabkotasRelatedByKodeWilayah2 !== null) {
                    foreach ($this->collTetanggaKabkotasRelatedByKodeWilayah2 as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collYayasans !== null) {
                    foreach ($this->collYayasans as $referrerFK) {
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
        $pos = MstWilayahPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getKodeWilayah();
                break;
            case 1:
                return $this->getNama();
                break;
            case 2:
                return $this->getIdLevelWilayah();
                break;
            case 3:
                return $this->getMstKodeWilayah();
                break;
            case 4:
                return $this->getNegaraId();
                break;
            case 5:
                return $this->getAsalWilayah();
                break;
            case 6:
                return $this->getKodeBps();
                break;
            case 7:
                return $this->getKodeDagri();
                break;
            case 8:
                return $this->getKodeKeu();
                break;
            case 9:
                return $this->getIdProv();
                break;
            case 10:
                return $this->getIdKabkota();
                break;
            case 11:
                return $this->getIdKec();
                break;
            case 12:
                return $this->getADesa();
                break;
            case 13:
                return $this->getAKelurahan();
                break;
            case 14:
                return $this->getA35();
                break;
            case 15:
                return $this->getAUrban();
                break;
            case 16:
                return $this->getKategoriDesaId();
                break;
            case 17:
                return $this->getCreateDate();
                break;
            case 18:
                return $this->getLastUpdate();
                break;
            case 19:
                return $this->getExpiredDate();
                break;
            case 20:
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
        if (isset($alreadyDumpedObjects['MstWilayah'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['MstWilayah'][$this->getPrimaryKey()] = true;
        $keys = MstWilayahPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getKodeWilayah(),
            $keys[1] => $this->getNama(),
            $keys[2] => $this->getIdLevelWilayah(),
            $keys[3] => $this->getMstKodeWilayah(),
            $keys[4] => $this->getNegaraId(),
            $keys[5] => $this->getAsalWilayah(),
            $keys[6] => $this->getKodeBps(),
            $keys[7] => $this->getKodeDagri(),
            $keys[8] => $this->getKodeKeu(),
            $keys[9] => $this->getIdProv(),
            $keys[10] => $this->getIdKabkota(),
            $keys[11] => $this->getIdKec(),
            $keys[12] => $this->getADesa(),
            $keys[13] => $this->getAKelurahan(),
            $keys[14] => $this->getA35(),
            $keys[15] => $this->getAUrban(),
            $keys[16] => $this->getKategoriDesaId(),
            $keys[17] => $this->getCreateDate(),
            $keys[18] => $this->getLastUpdate(),
            $keys[19] => $this->getExpiredDate(),
            $keys[20] => $this->getLastSync(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aKategoriDesa) {
                $result['KategoriDesa'] = $this->aKategoriDesa->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aLevelWilayah) {
                $result['LevelWilayah'] = $this->aLevelWilayah->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aMstWilayahRelatedByMstKodeWilayah) {
                $result['MstWilayahRelatedByMstKodeWilayah'] = $this->aMstWilayahRelatedByMstKodeWilayah->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aNegara) {
                $result['Negara'] = $this->aNegara->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collDemografis) {
                $result['Demografis'] = $this->collDemografis->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collDudis) {
                $result['Dudis'] = $this->collDudis->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collInstalasis) {
                $result['Instalasis'] = $this->collInstalasis->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collLembSertifikasis) {
                $result['LembSertifikasis'] = $this->collLembSertifikasis->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collLembagaAkreditasis) {
                $result['LembagaAkreditasis'] = $this->collLembagaAkreditasis->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collLembagaNonSekolahs) {
                $result['LembagaNonSekolahs'] = $this->collLembagaNonSekolahs->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collMstWilayahsRelatedByKodeWilayah) {
                $result['MstWilayahsRelatedByKodeWilayah'] = $this->collMstWilayahsRelatedByKodeWilayah->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collMuloks) {
                $result['Muloks'] = $this->collMuloks->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collPenggunas) {
                $result['Penggunas'] = $this->collPenggunas->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collPesertaDidiks) {
                $result['PesertaDidiks'] = $this->collPesertaDidiks->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collPtks) {
                $result['Ptks'] = $this->collPtks->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collPublishers) {
                $result['Publishers'] = $this->collPublishers->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collSekolahs) {
                $result['Sekolahs'] = $this->collSekolahs->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collTanahs) {
                $result['Tanahs'] = $this->collTanahs->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collTetanggaKabkotasRelatedByKodeWilayah1) {
                $result['TetanggaKabkotasRelatedByKodeWilayah1'] = $this->collTetanggaKabkotasRelatedByKodeWilayah1->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collTetanggaKabkotasRelatedByKodeWilayah2) {
                $result['TetanggaKabkotasRelatedByKodeWilayah2'] = $this->collTetanggaKabkotasRelatedByKodeWilayah2->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collYayasans) {
                $result['Yayasans'] = $this->collYayasans->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = MstWilayahPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setKodeWilayah($value);
                break;
            case 1:
                $this->setNama($value);
                break;
            case 2:
                $this->setIdLevelWilayah($value);
                break;
            case 3:
                $this->setMstKodeWilayah($value);
                break;
            case 4:
                $this->setNegaraId($value);
                break;
            case 5:
                $this->setAsalWilayah($value);
                break;
            case 6:
                $this->setKodeBps($value);
                break;
            case 7:
                $this->setKodeDagri($value);
                break;
            case 8:
                $this->setKodeKeu($value);
                break;
            case 9:
                $this->setIdProv($value);
                break;
            case 10:
                $this->setIdKabkota($value);
                break;
            case 11:
                $this->setIdKec($value);
                break;
            case 12:
                $this->setADesa($value);
                break;
            case 13:
                $this->setAKelurahan($value);
                break;
            case 14:
                $this->setA35($value);
                break;
            case 15:
                $this->setAUrban($value);
                break;
            case 16:
                $this->setKategoriDesaId($value);
                break;
            case 17:
                $this->setCreateDate($value);
                break;
            case 18:
                $this->setLastUpdate($value);
                break;
            case 19:
                $this->setExpiredDate($value);
                break;
            case 20:
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
        $keys = MstWilayahPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setKodeWilayah($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setNama($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setIdLevelWilayah($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setMstKodeWilayah($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setNegaraId($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setAsalWilayah($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setKodeBps($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setKodeDagri($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setKodeKeu($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setIdProv($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setIdKabkota($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setIdKec($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setADesa($arr[$keys[12]]);
        if (array_key_exists($keys[13], $arr)) $this->setAKelurahan($arr[$keys[13]]);
        if (array_key_exists($keys[14], $arr)) $this->setA35($arr[$keys[14]]);
        if (array_key_exists($keys[15], $arr)) $this->setAUrban($arr[$keys[15]]);
        if (array_key_exists($keys[16], $arr)) $this->setKategoriDesaId($arr[$keys[16]]);
        if (array_key_exists($keys[17], $arr)) $this->setCreateDate($arr[$keys[17]]);
        if (array_key_exists($keys[18], $arr)) $this->setLastUpdate($arr[$keys[18]]);
        if (array_key_exists($keys[19], $arr)) $this->setExpiredDate($arr[$keys[19]]);
        if (array_key_exists($keys[20], $arr)) $this->setLastSync($arr[$keys[20]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(MstWilayahPeer::DATABASE_NAME);

        if ($this->isColumnModified(MstWilayahPeer::KODE_WILAYAH)) $criteria->add(MstWilayahPeer::KODE_WILAYAH, $this->kode_wilayah);
        if ($this->isColumnModified(MstWilayahPeer::NAMA)) $criteria->add(MstWilayahPeer::NAMA, $this->nama);
        if ($this->isColumnModified(MstWilayahPeer::ID_LEVEL_WILAYAH)) $criteria->add(MstWilayahPeer::ID_LEVEL_WILAYAH, $this->id_level_wilayah);
        if ($this->isColumnModified(MstWilayahPeer::MST_KODE_WILAYAH)) $criteria->add(MstWilayahPeer::MST_KODE_WILAYAH, $this->mst_kode_wilayah);
        if ($this->isColumnModified(MstWilayahPeer::NEGARA_ID)) $criteria->add(MstWilayahPeer::NEGARA_ID, $this->negara_id);
        if ($this->isColumnModified(MstWilayahPeer::ASAL_WILAYAH)) $criteria->add(MstWilayahPeer::ASAL_WILAYAH, $this->asal_wilayah);
        if ($this->isColumnModified(MstWilayahPeer::KODE_BPS)) $criteria->add(MstWilayahPeer::KODE_BPS, $this->kode_bps);
        if ($this->isColumnModified(MstWilayahPeer::KODE_DAGRI)) $criteria->add(MstWilayahPeer::KODE_DAGRI, $this->kode_dagri);
        if ($this->isColumnModified(MstWilayahPeer::KODE_KEU)) $criteria->add(MstWilayahPeer::KODE_KEU, $this->kode_keu);
        if ($this->isColumnModified(MstWilayahPeer::ID_PROV)) $criteria->add(MstWilayahPeer::ID_PROV, $this->id_prov);
        if ($this->isColumnModified(MstWilayahPeer::ID_KABKOTA)) $criteria->add(MstWilayahPeer::ID_KABKOTA, $this->id_kabkota);
        if ($this->isColumnModified(MstWilayahPeer::ID_KEC)) $criteria->add(MstWilayahPeer::ID_KEC, $this->id_kec);
        if ($this->isColumnModified(MstWilayahPeer::A_DESA)) $criteria->add(MstWilayahPeer::A_DESA, $this->a_desa);
        if ($this->isColumnModified(MstWilayahPeer::A_KELURAHAN)) $criteria->add(MstWilayahPeer::A_KELURAHAN, $this->a_kelurahan);
        if ($this->isColumnModified(MstWilayahPeer::A_35)) $criteria->add(MstWilayahPeer::A_35, $this->a_35);
        if ($this->isColumnModified(MstWilayahPeer::A_URBAN)) $criteria->add(MstWilayahPeer::A_URBAN, $this->a_urban);
        if ($this->isColumnModified(MstWilayahPeer::KATEGORI_DESA_ID)) $criteria->add(MstWilayahPeer::KATEGORI_DESA_ID, $this->kategori_desa_id);
        if ($this->isColumnModified(MstWilayahPeer::CREATE_DATE)) $criteria->add(MstWilayahPeer::CREATE_DATE, $this->create_date);
        if ($this->isColumnModified(MstWilayahPeer::LAST_UPDATE)) $criteria->add(MstWilayahPeer::LAST_UPDATE, $this->last_update);
        if ($this->isColumnModified(MstWilayahPeer::EXPIRED_DATE)) $criteria->add(MstWilayahPeer::EXPIRED_DATE, $this->expired_date);
        if ($this->isColumnModified(MstWilayahPeer::LAST_SYNC)) $criteria->add(MstWilayahPeer::LAST_SYNC, $this->last_sync);

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
        $criteria = new Criteria(MstWilayahPeer::DATABASE_NAME);
        $criteria->add(MstWilayahPeer::KODE_WILAYAH, $this->kode_wilayah);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return string
     */
    public function getPrimaryKey()
    {
        return $this->getKodeWilayah();
    }

    /**
     * Generic method to set the primary key (kode_wilayah column).
     *
     * @param  string $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setKodeWilayah($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getKodeWilayah();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of MstWilayah (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setNama($this->getNama());
        $copyObj->setIdLevelWilayah($this->getIdLevelWilayah());
        $copyObj->setMstKodeWilayah($this->getMstKodeWilayah());
        $copyObj->setNegaraId($this->getNegaraId());
        $copyObj->setAsalWilayah($this->getAsalWilayah());
        $copyObj->setKodeBps($this->getKodeBps());
        $copyObj->setKodeDagri($this->getKodeDagri());
        $copyObj->setKodeKeu($this->getKodeKeu());
        $copyObj->setIdProv($this->getIdProv());
        $copyObj->setIdKabkota($this->getIdKabkota());
        $copyObj->setIdKec($this->getIdKec());
        $copyObj->setADesa($this->getADesa());
        $copyObj->setAKelurahan($this->getAKelurahan());
        $copyObj->setA35($this->getA35());
        $copyObj->setAUrban($this->getAUrban());
        $copyObj->setKategoriDesaId($this->getKategoriDesaId());
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

            foreach ($this->getDemografis() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addDemografi($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getDudis() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addDudi($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getInstalasis() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addInstalasi($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getLembSertifikasis() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addLembSertifikasi($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getLembagaAkreditasis() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addLembagaAkreditasi($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getLembagaNonSekolahs() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addLembagaNonSekolah($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getMstWilayahsRelatedByKodeWilayah() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addMstWilayahRelatedByKodeWilayah($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getMuloks() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addMulok($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getPenggunas() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPengguna($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getPesertaDidiks() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPesertaDidik($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getPtks() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPtk($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getPublishers() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPublisher($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getSekolahs() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSekolah($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getTanahs() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addTanah($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getTetanggaKabkotasRelatedByKodeWilayah1() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addTetanggaKabkotaRelatedByKodeWilayah1($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getTetanggaKabkotasRelatedByKodeWilayah2() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addTetanggaKabkotaRelatedByKodeWilayah2($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getYayasans() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addYayasan($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setKodeWilayah(NULL); // this is a auto-increment column, so set to default value
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
     * @return MstWilayah Clone of current object.
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
     * @return MstWilayahPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new MstWilayahPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a KategoriDesa object.
     *
     * @param             KategoriDesa $v
     * @return MstWilayah The current object (for fluent API support)
     * @throws PropelException
     */
    public function setKategoriDesa(KategoriDesa $v = null)
    {
        if ($v === null) {
            $this->setKategoriDesaId(NULL);
        } else {
            $this->setKategoriDesaId($v->getKategoriDesaId());
        }

        $this->aKategoriDesa = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the KategoriDesa object, it will not be re-added.
        if ($v !== null) {
            $v->addMstWilayah($this);
        }


        return $this;
    }


    /**
     * Get the associated KategoriDesa object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return KategoriDesa The associated KategoriDesa object.
     * @throws PropelException
     */
    public function getKategoriDesa(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aKategoriDesa === null && (($this->kategori_desa_id !== "" && $this->kategori_desa_id !== null)) && $doQuery) {
            $this->aKategoriDesa = KategoriDesaQuery::create()->findPk($this->kategori_desa_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aKategoriDesa->addMstWilayahs($this);
             */
        }

        return $this->aKategoriDesa;
    }

    /**
     * Declares an association between this object and a LevelWilayah object.
     *
     * @param             LevelWilayah $v
     * @return MstWilayah The current object (for fluent API support)
     * @throws PropelException
     */
    public function setLevelWilayah(LevelWilayah $v = null)
    {
        if ($v === null) {
            $this->setIdLevelWilayah(NULL);
        } else {
            $this->setIdLevelWilayah($v->getIdLevelWilayah());
        }

        $this->aLevelWilayah = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the LevelWilayah object, it will not be re-added.
        if ($v !== null) {
            $v->addMstWilayah($this);
        }


        return $this;
    }


    /**
     * Get the associated LevelWilayah object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return LevelWilayah The associated LevelWilayah object.
     * @throws PropelException
     */
    public function getLevelWilayah(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aLevelWilayah === null && ($this->id_level_wilayah !== null) && $doQuery) {
            $this->aLevelWilayah = LevelWilayahQuery::create()->findPk($this->id_level_wilayah, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aLevelWilayah->addMstWilayahs($this);
             */
        }

        return $this->aLevelWilayah;
    }

    /**
     * Declares an association between this object and a MstWilayah object.
     *
     * @param             MstWilayah $v
     * @return MstWilayah The current object (for fluent API support)
     * @throws PropelException
     */
    public function setMstWilayahRelatedByMstKodeWilayah(MstWilayah $v = null)
    {
        if ($v === null) {
            $this->setMstKodeWilayah(NULL);
        } else {
            $this->setMstKodeWilayah($v->getKodeWilayah());
        }

        $this->aMstWilayahRelatedByMstKodeWilayah = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the MstWilayah object, it will not be re-added.
        if ($v !== null) {
            $v->addMstWilayahRelatedByKodeWilayah($this);
        }


        return $this;
    }


    /**
     * Get the associated MstWilayah object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return MstWilayah The associated MstWilayah object.
     * @throws PropelException
     */
    public function getMstWilayahRelatedByMstKodeWilayah(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aMstWilayahRelatedByMstKodeWilayah === null && (($this->mst_kode_wilayah !== "" && $this->mst_kode_wilayah !== null)) && $doQuery) {
            $this->aMstWilayahRelatedByMstKodeWilayah = MstWilayahQuery::create()->findPk($this->mst_kode_wilayah, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aMstWilayahRelatedByMstKodeWilayah->addMstWilayahsRelatedByKodeWilayah($this);
             */
        }

        return $this->aMstWilayahRelatedByMstKodeWilayah;
    }

    /**
     * Declares an association between this object and a Negara object.
     *
     * @param             Negara $v
     * @return MstWilayah The current object (for fluent API support)
     * @throws PropelException
     */
    public function setNegara(Negara $v = null)
    {
        if ($v === null) {
            $this->setNegaraId(NULL);
        } else {
            $this->setNegaraId($v->getNegaraId());
        }

        $this->aNegara = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Negara object, it will not be re-added.
        if ($v !== null) {
            $v->addMstWilayah($this);
        }


        return $this;
    }


    /**
     * Get the associated Negara object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Negara The associated Negara object.
     * @throws PropelException
     */
    public function getNegara(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aNegara === null && (($this->negara_id !== "" && $this->negara_id !== null)) && $doQuery) {
            $this->aNegara = NegaraQuery::create()->findPk($this->negara_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aNegara->addMstWilayahs($this);
             */
        }

        return $this->aNegara;
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
        if ('Demografi' == $relationName) {
            $this->initDemografis();
        }
        if ('Dudi' == $relationName) {
            $this->initDudis();
        }
        if ('Instalasi' == $relationName) {
            $this->initInstalasis();
        }
        if ('LembSertifikasi' == $relationName) {
            $this->initLembSertifikasis();
        }
        if ('LembagaAkreditasi' == $relationName) {
            $this->initLembagaAkreditasis();
        }
        if ('LembagaNonSekolah' == $relationName) {
            $this->initLembagaNonSekolahs();
        }
        if ('MstWilayahRelatedByKodeWilayah' == $relationName) {
            $this->initMstWilayahsRelatedByKodeWilayah();
        }
        if ('Mulok' == $relationName) {
            $this->initMuloks();
        }
        if ('Pengguna' == $relationName) {
            $this->initPenggunas();
        }
        if ('PesertaDidik' == $relationName) {
            $this->initPesertaDidiks();
        }
        if ('Ptk' == $relationName) {
            $this->initPtks();
        }
        if ('Publisher' == $relationName) {
            $this->initPublishers();
        }
        if ('Sekolah' == $relationName) {
            $this->initSekolahs();
        }
        if ('Tanah' == $relationName) {
            $this->initTanahs();
        }
        if ('TetanggaKabkotaRelatedByKodeWilayah1' == $relationName) {
            $this->initTetanggaKabkotasRelatedByKodeWilayah1();
        }
        if ('TetanggaKabkotaRelatedByKodeWilayah2' == $relationName) {
            $this->initTetanggaKabkotasRelatedByKodeWilayah2();
        }
        if ('Yayasan' == $relationName) {
            $this->initYayasans();
        }
    }

    /**
     * Clears out the collDemografis collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return MstWilayah The current object (for fluent API support)
     * @see        addDemografis()
     */
    public function clearDemografis()
    {
        $this->collDemografis = null; // important to set this to null since that means it is uninitialized
        $this->collDemografisPartial = null;

        return $this;
    }

    /**
     * reset is the collDemografis collection loaded partially
     *
     * @return void
     */
    public function resetPartialDemografis($v = true)
    {
        $this->collDemografisPartial = $v;
    }

    /**
     * Initializes the collDemografis collection.
     *
     * By default this just sets the collDemografis collection to an empty array (like clearcollDemografis());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initDemografis($overrideExisting = true)
    {
        if (null !== $this->collDemografis && !$overrideExisting) {
            return;
        }
        $this->collDemografis = new PropelObjectCollection();
        $this->collDemografis->setModel('Demografi');
    }

    /**
     * Gets an array of Demografi objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this MstWilayah is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Demografi[] List of Demografi objects
     * @throws PropelException
     */
    public function getDemografis($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collDemografisPartial && !$this->isNew();
        if (null === $this->collDemografis || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collDemografis) {
                // return empty collection
                $this->initDemografis();
            } else {
                $collDemografis = DemografiQuery::create(null, $criteria)
                    ->filterByMstWilayah($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collDemografisPartial && count($collDemografis)) {
                      $this->initDemografis(false);

                      foreach($collDemografis as $obj) {
                        if (false == $this->collDemografis->contains($obj)) {
                          $this->collDemografis->append($obj);
                        }
                      }

                      $this->collDemografisPartial = true;
                    }

                    $collDemografis->getInternalIterator()->rewind();
                    return $collDemografis;
                }

                if($partial && $this->collDemografis) {
                    foreach($this->collDemografis as $obj) {
                        if($obj->isNew()) {
                            $collDemografis[] = $obj;
                        }
                    }
                }

                $this->collDemografis = $collDemografis;
                $this->collDemografisPartial = false;
            }
        }

        return $this->collDemografis;
    }

    /**
     * Sets a collection of Demografi objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $demografis A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return MstWilayah The current object (for fluent API support)
     */
    public function setDemografis(PropelCollection $demografis, PropelPDO $con = null)
    {
        $demografisToDelete = $this->getDemografis(new Criteria(), $con)->diff($demografis);

        $this->demografisScheduledForDeletion = unserialize(serialize($demografisToDelete));

        foreach ($demografisToDelete as $demografiRemoved) {
            $demografiRemoved->setMstWilayah(null);
        }

        $this->collDemografis = null;
        foreach ($demografis as $demografi) {
            $this->addDemografi($demografi);
        }

        $this->collDemografis = $demografis;
        $this->collDemografisPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Demografi objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Demografi objects.
     * @throws PropelException
     */
    public function countDemografis(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collDemografisPartial && !$this->isNew();
        if (null === $this->collDemografis || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collDemografis) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getDemografis());
            }
            $query = DemografiQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByMstWilayah($this)
                ->count($con);
        }

        return count($this->collDemografis);
    }

    /**
     * Method called to associate a Demografi object to this object
     * through the Demografi foreign key attribute.
     *
     * @param    Demografi $l Demografi
     * @return MstWilayah The current object (for fluent API support)
     */
    public function addDemografi(Demografi $l)
    {
        if ($this->collDemografis === null) {
            $this->initDemografis();
            $this->collDemografisPartial = true;
        }
        if (!in_array($l, $this->collDemografis->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddDemografi($l);
        }

        return $this;
    }

    /**
     * @param	Demografi $demografi The demografi object to add.
     */
    protected function doAddDemografi($demografi)
    {
        $this->collDemografis[]= $demografi;
        $demografi->setMstWilayah($this);
    }

    /**
     * @param	Demografi $demografi The demografi object to remove.
     * @return MstWilayah The current object (for fluent API support)
     */
    public function removeDemografi($demografi)
    {
        if ($this->getDemografis()->contains($demografi)) {
            $this->collDemografis->remove($this->collDemografis->search($demografi));
            if (null === $this->demografisScheduledForDeletion) {
                $this->demografisScheduledForDeletion = clone $this->collDemografis;
                $this->demografisScheduledForDeletion->clear();
            }
            $this->demografisScheduledForDeletion[]= clone $demografi;
            $demografi->setMstWilayah(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this MstWilayah is new, it will return
     * an empty collection; or if this MstWilayah has previously
     * been saved, it will retrieve related Demografis from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in MstWilayah.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Demografi[] List of Demografi objects
     */
    public function getDemografisJoinTahunAjaran($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = DemografiQuery::create(null, $criteria);
        $query->joinWith('TahunAjaran', $join_behavior);

        return $this->getDemografis($query, $con);
    }

    /**
     * Clears out the collDudis collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return MstWilayah The current object (for fluent API support)
     * @see        addDudis()
     */
    public function clearDudis()
    {
        $this->collDudis = null; // important to set this to null since that means it is uninitialized
        $this->collDudisPartial = null;

        return $this;
    }

    /**
     * reset is the collDudis collection loaded partially
     *
     * @return void
     */
    public function resetPartialDudis($v = true)
    {
        $this->collDudisPartial = $v;
    }

    /**
     * Initializes the collDudis collection.
     *
     * By default this just sets the collDudis collection to an empty array (like clearcollDudis());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initDudis($overrideExisting = true)
    {
        if (null !== $this->collDudis && !$overrideExisting) {
            return;
        }
        $this->collDudis = new PropelObjectCollection();
        $this->collDudis->setModel('Dudi');
    }

    /**
     * Gets an array of Dudi objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this MstWilayah is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Dudi[] List of Dudi objects
     * @throws PropelException
     */
    public function getDudis($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collDudisPartial && !$this->isNew();
        if (null === $this->collDudis || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collDudis) {
                // return empty collection
                $this->initDudis();
            } else {
                $collDudis = DudiQuery::create(null, $criteria)
                    ->filterByMstWilayah($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collDudisPartial && count($collDudis)) {
                      $this->initDudis(false);

                      foreach($collDudis as $obj) {
                        if (false == $this->collDudis->contains($obj)) {
                          $this->collDudis->append($obj);
                        }
                      }

                      $this->collDudisPartial = true;
                    }

                    $collDudis->getInternalIterator()->rewind();
                    return $collDudis;
                }

                if($partial && $this->collDudis) {
                    foreach($this->collDudis as $obj) {
                        if($obj->isNew()) {
                            $collDudis[] = $obj;
                        }
                    }
                }

                $this->collDudis = $collDudis;
                $this->collDudisPartial = false;
            }
        }

        return $this->collDudis;
    }

    /**
     * Sets a collection of Dudi objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $dudis A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return MstWilayah The current object (for fluent API support)
     */
    public function setDudis(PropelCollection $dudis, PropelPDO $con = null)
    {
        $dudisToDelete = $this->getDudis(new Criteria(), $con)->diff($dudis);

        $this->dudisScheduledForDeletion = unserialize(serialize($dudisToDelete));

        foreach ($dudisToDelete as $dudiRemoved) {
            $dudiRemoved->setMstWilayah(null);
        }

        $this->collDudis = null;
        foreach ($dudis as $dudi) {
            $this->addDudi($dudi);
        }

        $this->collDudis = $dudis;
        $this->collDudisPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Dudi objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Dudi objects.
     * @throws PropelException
     */
    public function countDudis(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collDudisPartial && !$this->isNew();
        if (null === $this->collDudis || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collDudis) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getDudis());
            }
            $query = DudiQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByMstWilayah($this)
                ->count($con);
        }

        return count($this->collDudis);
    }

    /**
     * Method called to associate a Dudi object to this object
     * through the Dudi foreign key attribute.
     *
     * @param    Dudi $l Dudi
     * @return MstWilayah The current object (for fluent API support)
     */
    public function addDudi(Dudi $l)
    {
        if ($this->collDudis === null) {
            $this->initDudis();
            $this->collDudisPartial = true;
        }
        if (!in_array($l, $this->collDudis->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddDudi($l);
        }

        return $this;
    }

    /**
     * @param	Dudi $dudi The dudi object to add.
     */
    protected function doAddDudi($dudi)
    {
        $this->collDudis[]= $dudi;
        $dudi->setMstWilayah($this);
    }

    /**
     * @param	Dudi $dudi The dudi object to remove.
     * @return MstWilayah The current object (for fluent API support)
     */
    public function removeDudi($dudi)
    {
        if ($this->getDudis()->contains($dudi)) {
            $this->collDudis->remove($this->collDudis->search($dudi));
            if (null === $this->dudisScheduledForDeletion) {
                $this->dudisScheduledForDeletion = clone $this->collDudis;
                $this->dudisScheduledForDeletion->clear();
            }
            $this->dudisScheduledForDeletion[]= clone $dudi;
            $dudi->setMstWilayah(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this MstWilayah is new, it will return
     * an empty collection; or if this MstWilayah has previously
     * been saved, it will retrieve related Dudis from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in MstWilayah.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Dudi[] List of Dudi objects
     */
    public function getDudisJoinBidangUsaha($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = DudiQuery::create(null, $criteria);
        $query->joinWith('BidangUsaha', $join_behavior);

        return $this->getDudis($query, $con);
    }

    /**
     * Clears out the collInstalasis collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return MstWilayah The current object (for fluent API support)
     * @see        addInstalasis()
     */
    public function clearInstalasis()
    {
        $this->collInstalasis = null; // important to set this to null since that means it is uninitialized
        $this->collInstalasisPartial = null;

        return $this;
    }

    /**
     * reset is the collInstalasis collection loaded partially
     *
     * @return void
     */
    public function resetPartialInstalasis($v = true)
    {
        $this->collInstalasisPartial = $v;
    }

    /**
     * Initializes the collInstalasis collection.
     *
     * By default this just sets the collInstalasis collection to an empty array (like clearcollInstalasis());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initInstalasis($overrideExisting = true)
    {
        if (null !== $this->collInstalasis && !$overrideExisting) {
            return;
        }
        $this->collInstalasis = new PropelObjectCollection();
        $this->collInstalasis->setModel('Instalasi');
    }

    /**
     * Gets an array of Instalasi objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this MstWilayah is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Instalasi[] List of Instalasi objects
     * @throws PropelException
     */
    public function getInstalasis($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collInstalasisPartial && !$this->isNew();
        if (null === $this->collInstalasis || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collInstalasis) {
                // return empty collection
                $this->initInstalasis();
            } else {
                $collInstalasis = InstalasiQuery::create(null, $criteria)
                    ->filterByMstWilayah($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collInstalasisPartial && count($collInstalasis)) {
                      $this->initInstalasis(false);

                      foreach($collInstalasis as $obj) {
                        if (false == $this->collInstalasis->contains($obj)) {
                          $this->collInstalasis->append($obj);
                        }
                      }

                      $this->collInstalasisPartial = true;
                    }

                    $collInstalasis->getInternalIterator()->rewind();
                    return $collInstalasis;
                }

                if($partial && $this->collInstalasis) {
                    foreach($this->collInstalasis as $obj) {
                        if($obj->isNew()) {
                            $collInstalasis[] = $obj;
                        }
                    }
                }

                $this->collInstalasis = $collInstalasis;
                $this->collInstalasisPartial = false;
            }
        }

        return $this->collInstalasis;
    }

    /**
     * Sets a collection of Instalasi objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $instalasis A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return MstWilayah The current object (for fluent API support)
     */
    public function setInstalasis(PropelCollection $instalasis, PropelPDO $con = null)
    {
        $instalasisToDelete = $this->getInstalasis(new Criteria(), $con)->diff($instalasis);

        $this->instalasisScheduledForDeletion = unserialize(serialize($instalasisToDelete));

        foreach ($instalasisToDelete as $instalasiRemoved) {
            $instalasiRemoved->setMstWilayah(null);
        }

        $this->collInstalasis = null;
        foreach ($instalasis as $instalasi) {
            $this->addInstalasi($instalasi);
        }

        $this->collInstalasis = $instalasis;
        $this->collInstalasisPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Instalasi objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Instalasi objects.
     * @throws PropelException
     */
    public function countInstalasis(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collInstalasisPartial && !$this->isNew();
        if (null === $this->collInstalasis || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collInstalasis) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getInstalasis());
            }
            $query = InstalasiQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByMstWilayah($this)
                ->count($con);
        }

        return count($this->collInstalasis);
    }

    /**
     * Method called to associate a Instalasi object to this object
     * through the Instalasi foreign key attribute.
     *
     * @param    Instalasi $l Instalasi
     * @return MstWilayah The current object (for fluent API support)
     */
    public function addInstalasi(Instalasi $l)
    {
        if ($this->collInstalasis === null) {
            $this->initInstalasis();
            $this->collInstalasisPartial = true;
        }
        if (!in_array($l, $this->collInstalasis->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddInstalasi($l);
        }

        return $this;
    }

    /**
     * @param	Instalasi $instalasi The instalasi object to add.
     */
    protected function doAddInstalasi($instalasi)
    {
        $this->collInstalasis[]= $instalasi;
        $instalasi->setMstWilayah($this);
    }

    /**
     * @param	Instalasi $instalasi The instalasi object to remove.
     * @return MstWilayah The current object (for fluent API support)
     */
    public function removeInstalasi($instalasi)
    {
        if ($this->getInstalasis()->contains($instalasi)) {
            $this->collInstalasis->remove($this->collInstalasis->search($instalasi));
            if (null === $this->instalasisScheduledForDeletion) {
                $this->instalasisScheduledForDeletion = clone $this->collInstalasis;
                $this->instalasisScheduledForDeletion->clear();
            }
            $this->instalasisScheduledForDeletion[]= $instalasi;
            $instalasi->setMstWilayah(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this MstWilayah is new, it will return
     * an empty collection; or if this MstWilayah has previously
     * been saved, it will retrieve related Instalasis from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in MstWilayah.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Instalasi[] List of Instalasi objects
     */
    public function getInstalasisJoinSekolah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = InstalasiQuery::create(null, $criteria);
        $query->joinWith('Sekolah', $join_behavior);

        return $this->getInstalasis($query, $con);
    }

    /**
     * Clears out the collLembSertifikasis collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return MstWilayah The current object (for fluent API support)
     * @see        addLembSertifikasis()
     */
    public function clearLembSertifikasis()
    {
        $this->collLembSertifikasis = null; // important to set this to null since that means it is uninitialized
        $this->collLembSertifikasisPartial = null;

        return $this;
    }

    /**
     * reset is the collLembSertifikasis collection loaded partially
     *
     * @return void
     */
    public function resetPartialLembSertifikasis($v = true)
    {
        $this->collLembSertifikasisPartial = $v;
    }

    /**
     * Initializes the collLembSertifikasis collection.
     *
     * By default this just sets the collLembSertifikasis collection to an empty array (like clearcollLembSertifikasis());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initLembSertifikasis($overrideExisting = true)
    {
        if (null !== $this->collLembSertifikasis && !$overrideExisting) {
            return;
        }
        $this->collLembSertifikasis = new PropelObjectCollection();
        $this->collLembSertifikasis->setModel('LembSertifikasi');
    }

    /**
     * Gets an array of LembSertifikasi objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this MstWilayah is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|LembSertifikasi[] List of LembSertifikasi objects
     * @throws PropelException
     */
    public function getLembSertifikasis($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collLembSertifikasisPartial && !$this->isNew();
        if (null === $this->collLembSertifikasis || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collLembSertifikasis) {
                // return empty collection
                $this->initLembSertifikasis();
            } else {
                $collLembSertifikasis = LembSertifikasiQuery::create(null, $criteria)
                    ->filterByMstWilayah($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collLembSertifikasisPartial && count($collLembSertifikasis)) {
                      $this->initLembSertifikasis(false);

                      foreach($collLembSertifikasis as $obj) {
                        if (false == $this->collLembSertifikasis->contains($obj)) {
                          $this->collLembSertifikasis->append($obj);
                        }
                      }

                      $this->collLembSertifikasisPartial = true;
                    }

                    $collLembSertifikasis->getInternalIterator()->rewind();
                    return $collLembSertifikasis;
                }

                if($partial && $this->collLembSertifikasis) {
                    foreach($this->collLembSertifikasis as $obj) {
                        if($obj->isNew()) {
                            $collLembSertifikasis[] = $obj;
                        }
                    }
                }

                $this->collLembSertifikasis = $collLembSertifikasis;
                $this->collLembSertifikasisPartial = false;
            }
        }

        return $this->collLembSertifikasis;
    }

    /**
     * Sets a collection of LembSertifikasi objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $lembSertifikasis A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return MstWilayah The current object (for fluent API support)
     */
    public function setLembSertifikasis(PropelCollection $lembSertifikasis, PropelPDO $con = null)
    {
        $lembSertifikasisToDelete = $this->getLembSertifikasis(new Criteria(), $con)->diff($lembSertifikasis);

        $this->lembSertifikasisScheduledForDeletion = unserialize(serialize($lembSertifikasisToDelete));

        foreach ($lembSertifikasisToDelete as $lembSertifikasiRemoved) {
            $lembSertifikasiRemoved->setMstWilayah(null);
        }

        $this->collLembSertifikasis = null;
        foreach ($lembSertifikasis as $lembSertifikasi) {
            $this->addLembSertifikasi($lembSertifikasi);
        }

        $this->collLembSertifikasis = $lembSertifikasis;
        $this->collLembSertifikasisPartial = false;

        return $this;
    }

    /**
     * Returns the number of related LembSertifikasi objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related LembSertifikasi objects.
     * @throws PropelException
     */
    public function countLembSertifikasis(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collLembSertifikasisPartial && !$this->isNew();
        if (null === $this->collLembSertifikasis || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collLembSertifikasis) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getLembSertifikasis());
            }
            $query = LembSertifikasiQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByMstWilayah($this)
                ->count($con);
        }

        return count($this->collLembSertifikasis);
    }

    /**
     * Method called to associate a LembSertifikasi object to this object
     * through the LembSertifikasi foreign key attribute.
     *
     * @param    LembSertifikasi $l LembSertifikasi
     * @return MstWilayah The current object (for fluent API support)
     */
    public function addLembSertifikasi(LembSertifikasi $l)
    {
        if ($this->collLembSertifikasis === null) {
            $this->initLembSertifikasis();
            $this->collLembSertifikasisPartial = true;
        }
        if (!in_array($l, $this->collLembSertifikasis->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddLembSertifikasi($l);
        }

        return $this;
    }

    /**
     * @param	LembSertifikasi $lembSertifikasi The lembSertifikasi object to add.
     */
    protected function doAddLembSertifikasi($lembSertifikasi)
    {
        $this->collLembSertifikasis[]= $lembSertifikasi;
        $lembSertifikasi->setMstWilayah($this);
    }

    /**
     * @param	LembSertifikasi $lembSertifikasi The lembSertifikasi object to remove.
     * @return MstWilayah The current object (for fluent API support)
     */
    public function removeLembSertifikasi($lembSertifikasi)
    {
        if ($this->getLembSertifikasis()->contains($lembSertifikasi)) {
            $this->collLembSertifikasis->remove($this->collLembSertifikasis->search($lembSertifikasi));
            if (null === $this->lembSertifikasisScheduledForDeletion) {
                $this->lembSertifikasisScheduledForDeletion = clone $this->collLembSertifikasis;
                $this->lembSertifikasisScheduledForDeletion->clear();
            }
            $this->lembSertifikasisScheduledForDeletion[]= clone $lembSertifikasi;
            $lembSertifikasi->setMstWilayah(null);
        }

        return $this;
    }

    /**
     * Clears out the collLembagaAkreditasis collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return MstWilayah The current object (for fluent API support)
     * @see        addLembagaAkreditasis()
     */
    public function clearLembagaAkreditasis()
    {
        $this->collLembagaAkreditasis = null; // important to set this to null since that means it is uninitialized
        $this->collLembagaAkreditasisPartial = null;

        return $this;
    }

    /**
     * reset is the collLembagaAkreditasis collection loaded partially
     *
     * @return void
     */
    public function resetPartialLembagaAkreditasis($v = true)
    {
        $this->collLembagaAkreditasisPartial = $v;
    }

    /**
     * Initializes the collLembagaAkreditasis collection.
     *
     * By default this just sets the collLembagaAkreditasis collection to an empty array (like clearcollLembagaAkreditasis());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initLembagaAkreditasis($overrideExisting = true)
    {
        if (null !== $this->collLembagaAkreditasis && !$overrideExisting) {
            return;
        }
        $this->collLembagaAkreditasis = new PropelObjectCollection();
        $this->collLembagaAkreditasis->setModel('LembagaAkreditasi');
    }

    /**
     * Gets an array of LembagaAkreditasi objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this MstWilayah is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|LembagaAkreditasi[] List of LembagaAkreditasi objects
     * @throws PropelException
     */
    public function getLembagaAkreditasis($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collLembagaAkreditasisPartial && !$this->isNew();
        if (null === $this->collLembagaAkreditasis || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collLembagaAkreditasis) {
                // return empty collection
                $this->initLembagaAkreditasis();
            } else {
                $collLembagaAkreditasis = LembagaAkreditasiQuery::create(null, $criteria)
                    ->filterByMstWilayah($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collLembagaAkreditasisPartial && count($collLembagaAkreditasis)) {
                      $this->initLembagaAkreditasis(false);

                      foreach($collLembagaAkreditasis as $obj) {
                        if (false == $this->collLembagaAkreditasis->contains($obj)) {
                          $this->collLembagaAkreditasis->append($obj);
                        }
                      }

                      $this->collLembagaAkreditasisPartial = true;
                    }

                    $collLembagaAkreditasis->getInternalIterator()->rewind();
                    return $collLembagaAkreditasis;
                }

                if($partial && $this->collLembagaAkreditasis) {
                    foreach($this->collLembagaAkreditasis as $obj) {
                        if($obj->isNew()) {
                            $collLembagaAkreditasis[] = $obj;
                        }
                    }
                }

                $this->collLembagaAkreditasis = $collLembagaAkreditasis;
                $this->collLembagaAkreditasisPartial = false;
            }
        }

        return $this->collLembagaAkreditasis;
    }

    /**
     * Sets a collection of LembagaAkreditasi objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $lembagaAkreditasis A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return MstWilayah The current object (for fluent API support)
     */
    public function setLembagaAkreditasis(PropelCollection $lembagaAkreditasis, PropelPDO $con = null)
    {
        $lembagaAkreditasisToDelete = $this->getLembagaAkreditasis(new Criteria(), $con)->diff($lembagaAkreditasis);

        $this->lembagaAkreditasisScheduledForDeletion = unserialize(serialize($lembagaAkreditasisToDelete));

        foreach ($lembagaAkreditasisToDelete as $lembagaAkreditasiRemoved) {
            $lembagaAkreditasiRemoved->setMstWilayah(null);
        }

        $this->collLembagaAkreditasis = null;
        foreach ($lembagaAkreditasis as $lembagaAkreditasi) {
            $this->addLembagaAkreditasi($lembagaAkreditasi);
        }

        $this->collLembagaAkreditasis = $lembagaAkreditasis;
        $this->collLembagaAkreditasisPartial = false;

        return $this;
    }

    /**
     * Returns the number of related LembagaAkreditasi objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related LembagaAkreditasi objects.
     * @throws PropelException
     */
    public function countLembagaAkreditasis(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collLembagaAkreditasisPartial && !$this->isNew();
        if (null === $this->collLembagaAkreditasis || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collLembagaAkreditasis) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getLembagaAkreditasis());
            }
            $query = LembagaAkreditasiQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByMstWilayah($this)
                ->count($con);
        }

        return count($this->collLembagaAkreditasis);
    }

    /**
     * Method called to associate a LembagaAkreditasi object to this object
     * through the LembagaAkreditasi foreign key attribute.
     *
     * @param    LembagaAkreditasi $l LembagaAkreditasi
     * @return MstWilayah The current object (for fluent API support)
     */
    public function addLembagaAkreditasi(LembagaAkreditasi $l)
    {
        if ($this->collLembagaAkreditasis === null) {
            $this->initLembagaAkreditasis();
            $this->collLembagaAkreditasisPartial = true;
        }
        if (!in_array($l, $this->collLembagaAkreditasis->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddLembagaAkreditasi($l);
        }

        return $this;
    }

    /**
     * @param	LembagaAkreditasi $lembagaAkreditasi The lembagaAkreditasi object to add.
     */
    protected function doAddLembagaAkreditasi($lembagaAkreditasi)
    {
        $this->collLembagaAkreditasis[]= $lembagaAkreditasi;
        $lembagaAkreditasi->setMstWilayah($this);
    }

    /**
     * @param	LembagaAkreditasi $lembagaAkreditasi The lembagaAkreditasi object to remove.
     * @return MstWilayah The current object (for fluent API support)
     */
    public function removeLembagaAkreditasi($lembagaAkreditasi)
    {
        if ($this->getLembagaAkreditasis()->contains($lembagaAkreditasi)) {
            $this->collLembagaAkreditasis->remove($this->collLembagaAkreditasis->search($lembagaAkreditasi));
            if (null === $this->lembagaAkreditasisScheduledForDeletion) {
                $this->lembagaAkreditasisScheduledForDeletion = clone $this->collLembagaAkreditasis;
                $this->lembagaAkreditasisScheduledForDeletion->clear();
            }
            $this->lembagaAkreditasisScheduledForDeletion[]= clone $lembagaAkreditasi;
            $lembagaAkreditasi->setMstWilayah(null);
        }

        return $this;
    }

    /**
     * Clears out the collLembagaNonSekolahs collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return MstWilayah The current object (for fluent API support)
     * @see        addLembagaNonSekolahs()
     */
    public function clearLembagaNonSekolahs()
    {
        $this->collLembagaNonSekolahs = null; // important to set this to null since that means it is uninitialized
        $this->collLembagaNonSekolahsPartial = null;

        return $this;
    }

    /**
     * reset is the collLembagaNonSekolahs collection loaded partially
     *
     * @return void
     */
    public function resetPartialLembagaNonSekolahs($v = true)
    {
        $this->collLembagaNonSekolahsPartial = $v;
    }

    /**
     * Initializes the collLembagaNonSekolahs collection.
     *
     * By default this just sets the collLembagaNonSekolahs collection to an empty array (like clearcollLembagaNonSekolahs());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initLembagaNonSekolahs($overrideExisting = true)
    {
        if (null !== $this->collLembagaNonSekolahs && !$overrideExisting) {
            return;
        }
        $this->collLembagaNonSekolahs = new PropelObjectCollection();
        $this->collLembagaNonSekolahs->setModel('LembagaNonSekolah');
    }

    /**
     * Gets an array of LembagaNonSekolah objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this MstWilayah is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|LembagaNonSekolah[] List of LembagaNonSekolah objects
     * @throws PropelException
     */
    public function getLembagaNonSekolahs($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collLembagaNonSekolahsPartial && !$this->isNew();
        if (null === $this->collLembagaNonSekolahs || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collLembagaNonSekolahs) {
                // return empty collection
                $this->initLembagaNonSekolahs();
            } else {
                $collLembagaNonSekolahs = LembagaNonSekolahQuery::create(null, $criteria)
                    ->filterByMstWilayah($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collLembagaNonSekolahsPartial && count($collLembagaNonSekolahs)) {
                      $this->initLembagaNonSekolahs(false);

                      foreach($collLembagaNonSekolahs as $obj) {
                        if (false == $this->collLembagaNonSekolahs->contains($obj)) {
                          $this->collLembagaNonSekolahs->append($obj);
                        }
                      }

                      $this->collLembagaNonSekolahsPartial = true;
                    }

                    $collLembagaNonSekolahs->getInternalIterator()->rewind();
                    return $collLembagaNonSekolahs;
                }

                if($partial && $this->collLembagaNonSekolahs) {
                    foreach($this->collLembagaNonSekolahs as $obj) {
                        if($obj->isNew()) {
                            $collLembagaNonSekolahs[] = $obj;
                        }
                    }
                }

                $this->collLembagaNonSekolahs = $collLembagaNonSekolahs;
                $this->collLembagaNonSekolahsPartial = false;
            }
        }

        return $this->collLembagaNonSekolahs;
    }

    /**
     * Sets a collection of LembagaNonSekolah objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $lembagaNonSekolahs A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return MstWilayah The current object (for fluent API support)
     */
    public function setLembagaNonSekolahs(PropelCollection $lembagaNonSekolahs, PropelPDO $con = null)
    {
        $lembagaNonSekolahsToDelete = $this->getLembagaNonSekolahs(new Criteria(), $con)->diff($lembagaNonSekolahs);

        $this->lembagaNonSekolahsScheduledForDeletion = unserialize(serialize($lembagaNonSekolahsToDelete));

        foreach ($lembagaNonSekolahsToDelete as $lembagaNonSekolahRemoved) {
            $lembagaNonSekolahRemoved->setMstWilayah(null);
        }

        $this->collLembagaNonSekolahs = null;
        foreach ($lembagaNonSekolahs as $lembagaNonSekolah) {
            $this->addLembagaNonSekolah($lembagaNonSekolah);
        }

        $this->collLembagaNonSekolahs = $lembagaNonSekolahs;
        $this->collLembagaNonSekolahsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related LembagaNonSekolah objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related LembagaNonSekolah objects.
     * @throws PropelException
     */
    public function countLembagaNonSekolahs(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collLembagaNonSekolahsPartial && !$this->isNew();
        if (null === $this->collLembagaNonSekolahs || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collLembagaNonSekolahs) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getLembagaNonSekolahs());
            }
            $query = LembagaNonSekolahQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByMstWilayah($this)
                ->count($con);
        }

        return count($this->collLembagaNonSekolahs);
    }

    /**
     * Method called to associate a LembagaNonSekolah object to this object
     * through the LembagaNonSekolah foreign key attribute.
     *
     * @param    LembagaNonSekolah $l LembagaNonSekolah
     * @return MstWilayah The current object (for fluent API support)
     */
    public function addLembagaNonSekolah(LembagaNonSekolah $l)
    {
        if ($this->collLembagaNonSekolahs === null) {
            $this->initLembagaNonSekolahs();
            $this->collLembagaNonSekolahsPartial = true;
        }
        if (!in_array($l, $this->collLembagaNonSekolahs->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddLembagaNonSekolah($l);
        }

        return $this;
    }

    /**
     * @param	LembagaNonSekolah $lembagaNonSekolah The lembagaNonSekolah object to add.
     */
    protected function doAddLembagaNonSekolah($lembagaNonSekolah)
    {
        $this->collLembagaNonSekolahs[]= $lembagaNonSekolah;
        $lembagaNonSekolah->setMstWilayah($this);
    }

    /**
     * @param	LembagaNonSekolah $lembagaNonSekolah The lembagaNonSekolah object to remove.
     * @return MstWilayah The current object (for fluent API support)
     */
    public function removeLembagaNonSekolah($lembagaNonSekolah)
    {
        if ($this->getLembagaNonSekolahs()->contains($lembagaNonSekolah)) {
            $this->collLembagaNonSekolahs->remove($this->collLembagaNonSekolahs->search($lembagaNonSekolah));
            if (null === $this->lembagaNonSekolahsScheduledForDeletion) {
                $this->lembagaNonSekolahsScheduledForDeletion = clone $this->collLembagaNonSekolahs;
                $this->lembagaNonSekolahsScheduledForDeletion->clear();
            }
            $this->lembagaNonSekolahsScheduledForDeletion[]= clone $lembagaNonSekolah;
            $lembagaNonSekolah->setMstWilayah(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this MstWilayah is new, it will return
     * an empty collection; or if this MstWilayah has previously
     * been saved, it will retrieve related LembagaNonSekolahs from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in MstWilayah.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|LembagaNonSekolah[] List of LembagaNonSekolah objects
     */
    public function getLembagaNonSekolahsJoinJenisLembaga($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = LembagaNonSekolahQuery::create(null, $criteria);
        $query->joinWith('JenisLembaga', $join_behavior);

        return $this->getLembagaNonSekolahs($query, $con);
    }

    /**
     * Clears out the collMstWilayahsRelatedByKodeWilayah collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return MstWilayah The current object (for fluent API support)
     * @see        addMstWilayahsRelatedByKodeWilayah()
     */
    public function clearMstWilayahsRelatedByKodeWilayah()
    {
        $this->collMstWilayahsRelatedByKodeWilayah = null; // important to set this to null since that means it is uninitialized
        $this->collMstWilayahsRelatedByKodeWilayahPartial = null;

        return $this;
    }

    /**
     * reset is the collMstWilayahsRelatedByKodeWilayah collection loaded partially
     *
     * @return void
     */
    public function resetPartialMstWilayahsRelatedByKodeWilayah($v = true)
    {
        $this->collMstWilayahsRelatedByKodeWilayahPartial = $v;
    }

    /**
     * Initializes the collMstWilayahsRelatedByKodeWilayah collection.
     *
     * By default this just sets the collMstWilayahsRelatedByKodeWilayah collection to an empty array (like clearcollMstWilayahsRelatedByKodeWilayah());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initMstWilayahsRelatedByKodeWilayah($overrideExisting = true)
    {
        if (null !== $this->collMstWilayahsRelatedByKodeWilayah && !$overrideExisting) {
            return;
        }
        $this->collMstWilayahsRelatedByKodeWilayah = new PropelObjectCollection();
        $this->collMstWilayahsRelatedByKodeWilayah->setModel('MstWilayah');
    }

    /**
     * Gets an array of MstWilayah objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this MstWilayah is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|MstWilayah[] List of MstWilayah objects
     * @throws PropelException
     */
    public function getMstWilayahsRelatedByKodeWilayah($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collMstWilayahsRelatedByKodeWilayahPartial && !$this->isNew();
        if (null === $this->collMstWilayahsRelatedByKodeWilayah || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collMstWilayahsRelatedByKodeWilayah) {
                // return empty collection
                $this->initMstWilayahsRelatedByKodeWilayah();
            } else {
                $collMstWilayahsRelatedByKodeWilayah = MstWilayahQuery::create(null, $criteria)
                    ->filterByMstWilayahRelatedByMstKodeWilayah($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collMstWilayahsRelatedByKodeWilayahPartial && count($collMstWilayahsRelatedByKodeWilayah)) {
                      $this->initMstWilayahsRelatedByKodeWilayah(false);

                      foreach($collMstWilayahsRelatedByKodeWilayah as $obj) {
                        if (false == $this->collMstWilayahsRelatedByKodeWilayah->contains($obj)) {
                          $this->collMstWilayahsRelatedByKodeWilayah->append($obj);
                        }
                      }

                      $this->collMstWilayahsRelatedByKodeWilayahPartial = true;
                    }

                    $collMstWilayahsRelatedByKodeWilayah->getInternalIterator()->rewind();
                    return $collMstWilayahsRelatedByKodeWilayah;
                }

                if($partial && $this->collMstWilayahsRelatedByKodeWilayah) {
                    foreach($this->collMstWilayahsRelatedByKodeWilayah as $obj) {
                        if($obj->isNew()) {
                            $collMstWilayahsRelatedByKodeWilayah[] = $obj;
                        }
                    }
                }

                $this->collMstWilayahsRelatedByKodeWilayah = $collMstWilayahsRelatedByKodeWilayah;
                $this->collMstWilayahsRelatedByKodeWilayahPartial = false;
            }
        }

        return $this->collMstWilayahsRelatedByKodeWilayah;
    }

    /**
     * Sets a collection of MstWilayahRelatedByKodeWilayah objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $mstWilayahsRelatedByKodeWilayah A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return MstWilayah The current object (for fluent API support)
     */
    public function setMstWilayahsRelatedByKodeWilayah(PropelCollection $mstWilayahsRelatedByKodeWilayah, PropelPDO $con = null)
    {
        $mstWilayahsRelatedByKodeWilayahToDelete = $this->getMstWilayahsRelatedByKodeWilayah(new Criteria(), $con)->diff($mstWilayahsRelatedByKodeWilayah);

        $this->mstWilayahsRelatedByKodeWilayahScheduledForDeletion = unserialize(serialize($mstWilayahsRelatedByKodeWilayahToDelete));

        foreach ($mstWilayahsRelatedByKodeWilayahToDelete as $mstWilayahRelatedByKodeWilayahRemoved) {
            $mstWilayahRelatedByKodeWilayahRemoved->setMstWilayahRelatedByMstKodeWilayah(null);
        }

        $this->collMstWilayahsRelatedByKodeWilayah = null;
        foreach ($mstWilayahsRelatedByKodeWilayah as $mstWilayahRelatedByKodeWilayah) {
            $this->addMstWilayahRelatedByKodeWilayah($mstWilayahRelatedByKodeWilayah);
        }

        $this->collMstWilayahsRelatedByKodeWilayah = $mstWilayahsRelatedByKodeWilayah;
        $this->collMstWilayahsRelatedByKodeWilayahPartial = false;

        return $this;
    }

    /**
     * Returns the number of related MstWilayah objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related MstWilayah objects.
     * @throws PropelException
     */
    public function countMstWilayahsRelatedByKodeWilayah(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collMstWilayahsRelatedByKodeWilayahPartial && !$this->isNew();
        if (null === $this->collMstWilayahsRelatedByKodeWilayah || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collMstWilayahsRelatedByKodeWilayah) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getMstWilayahsRelatedByKodeWilayah());
            }
            $query = MstWilayahQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByMstWilayahRelatedByMstKodeWilayah($this)
                ->count($con);
        }

        return count($this->collMstWilayahsRelatedByKodeWilayah);
    }

    /**
     * Method called to associate a MstWilayah object to this object
     * through the MstWilayah foreign key attribute.
     *
     * @param    MstWilayah $l MstWilayah
     * @return MstWilayah The current object (for fluent API support)
     */
    public function addMstWilayahRelatedByKodeWilayah(MstWilayah $l)
    {
        if ($this->collMstWilayahsRelatedByKodeWilayah === null) {
            $this->initMstWilayahsRelatedByKodeWilayah();
            $this->collMstWilayahsRelatedByKodeWilayahPartial = true;
        }
        if (!in_array($l, $this->collMstWilayahsRelatedByKodeWilayah->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddMstWilayahRelatedByKodeWilayah($l);
        }

        return $this;
    }

    /**
     * @param	MstWilayahRelatedByKodeWilayah $mstWilayahRelatedByKodeWilayah The mstWilayahRelatedByKodeWilayah object to add.
     */
    protected function doAddMstWilayahRelatedByKodeWilayah($mstWilayahRelatedByKodeWilayah)
    {
        $this->collMstWilayahsRelatedByKodeWilayah[]= $mstWilayahRelatedByKodeWilayah;
        $mstWilayahRelatedByKodeWilayah->setMstWilayahRelatedByMstKodeWilayah($this);
    }

    /**
     * @param	MstWilayahRelatedByKodeWilayah $mstWilayahRelatedByKodeWilayah The mstWilayahRelatedByKodeWilayah object to remove.
     * @return MstWilayah The current object (for fluent API support)
     */
    public function removeMstWilayahRelatedByKodeWilayah($mstWilayahRelatedByKodeWilayah)
    {
        if ($this->getMstWilayahsRelatedByKodeWilayah()->contains($mstWilayahRelatedByKodeWilayah)) {
            $this->collMstWilayahsRelatedByKodeWilayah->remove($this->collMstWilayahsRelatedByKodeWilayah->search($mstWilayahRelatedByKodeWilayah));
            if (null === $this->mstWilayahsRelatedByKodeWilayahScheduledForDeletion) {
                $this->mstWilayahsRelatedByKodeWilayahScheduledForDeletion = clone $this->collMstWilayahsRelatedByKodeWilayah;
                $this->mstWilayahsRelatedByKodeWilayahScheduledForDeletion->clear();
            }
            $this->mstWilayahsRelatedByKodeWilayahScheduledForDeletion[]= $mstWilayahRelatedByKodeWilayah;
            $mstWilayahRelatedByKodeWilayah->setMstWilayahRelatedByMstKodeWilayah(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this MstWilayah is new, it will return
     * an empty collection; or if this MstWilayah has previously
     * been saved, it will retrieve related MstWilayahsRelatedByKodeWilayah from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in MstWilayah.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|MstWilayah[] List of MstWilayah objects
     */
    public function getMstWilayahsRelatedByKodeWilayahJoinKategoriDesa($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = MstWilayahQuery::create(null, $criteria);
        $query->joinWith('KategoriDesa', $join_behavior);

        return $this->getMstWilayahsRelatedByKodeWilayah($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this MstWilayah is new, it will return
     * an empty collection; or if this MstWilayah has previously
     * been saved, it will retrieve related MstWilayahsRelatedByKodeWilayah from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in MstWilayah.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|MstWilayah[] List of MstWilayah objects
     */
    public function getMstWilayahsRelatedByKodeWilayahJoinLevelWilayah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = MstWilayahQuery::create(null, $criteria);
        $query->joinWith('LevelWilayah', $join_behavior);

        return $this->getMstWilayahsRelatedByKodeWilayah($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this MstWilayah is new, it will return
     * an empty collection; or if this MstWilayah has previously
     * been saved, it will retrieve related MstWilayahsRelatedByKodeWilayah from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in MstWilayah.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|MstWilayah[] List of MstWilayah objects
     */
    public function getMstWilayahsRelatedByKodeWilayahJoinNegara($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = MstWilayahQuery::create(null, $criteria);
        $query->joinWith('Negara', $join_behavior);

        return $this->getMstWilayahsRelatedByKodeWilayah($query, $con);
    }

    /**
     * Clears out the collMuloks collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return MstWilayah The current object (for fluent API support)
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
     * If this MstWilayah is new, it will return
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
                    ->filterByMstWilayah($this)
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
     * @return MstWilayah The current object (for fluent API support)
     */
    public function setMuloks(PropelCollection $muloks, PropelPDO $con = null)
    {
        $muloksToDelete = $this->getMuloks(new Criteria(), $con)->diff($muloks);

        $this->muloksScheduledForDeletion = unserialize(serialize($muloksToDelete));

        foreach ($muloksToDelete as $mulokRemoved) {
            $mulokRemoved->setMstWilayah(null);
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
                ->filterByMstWilayah($this)
                ->count($con);
        }

        return count($this->collMuloks);
    }

    /**
     * Method called to associate a Mulok object to this object
     * through the Mulok foreign key attribute.
     *
     * @param    Mulok $l Mulok
     * @return MstWilayah The current object (for fluent API support)
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
        $mulok->setMstWilayah($this);
    }

    /**
     * @param	Mulok $mulok The mulok object to remove.
     * @return MstWilayah The current object (for fluent API support)
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
            $mulok->setMstWilayah(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this MstWilayah is new, it will return
     * an empty collection; or if this MstWilayah has previously
     * been saved, it will retrieve related Muloks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in MstWilayah.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Mulok[] List of Mulok objects
     */
    public function getMuloksJoinMataPelajaran($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = MulokQuery::create(null, $criteria);
        $query->joinWith('MataPelajaran', $join_behavior);

        return $this->getMuloks($query, $con);
    }

    /**
     * Clears out the collPenggunas collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return MstWilayah The current object (for fluent API support)
     * @see        addPenggunas()
     */
    public function clearPenggunas()
    {
        $this->collPenggunas = null; // important to set this to null since that means it is uninitialized
        $this->collPenggunasPartial = null;

        return $this;
    }

    /**
     * reset is the collPenggunas collection loaded partially
     *
     * @return void
     */
    public function resetPartialPenggunas($v = true)
    {
        $this->collPenggunasPartial = $v;
    }

    /**
     * Initializes the collPenggunas collection.
     *
     * By default this just sets the collPenggunas collection to an empty array (like clearcollPenggunas());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPenggunas($overrideExisting = true)
    {
        if (null !== $this->collPenggunas && !$overrideExisting) {
            return;
        }
        $this->collPenggunas = new PropelObjectCollection();
        $this->collPenggunas->setModel('Pengguna');
    }

    /**
     * Gets an array of Pengguna objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this MstWilayah is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Pengguna[] List of Pengguna objects
     * @throws PropelException
     */
    public function getPenggunas($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collPenggunasPartial && !$this->isNew();
        if (null === $this->collPenggunas || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collPenggunas) {
                // return empty collection
                $this->initPenggunas();
            } else {
                $collPenggunas = PenggunaQuery::create(null, $criteria)
                    ->filterByMstWilayah($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collPenggunasPartial && count($collPenggunas)) {
                      $this->initPenggunas(false);

                      foreach($collPenggunas as $obj) {
                        if (false == $this->collPenggunas->contains($obj)) {
                          $this->collPenggunas->append($obj);
                        }
                      }

                      $this->collPenggunasPartial = true;
                    }

                    $collPenggunas->getInternalIterator()->rewind();
                    return $collPenggunas;
                }

                if($partial && $this->collPenggunas) {
                    foreach($this->collPenggunas as $obj) {
                        if($obj->isNew()) {
                            $collPenggunas[] = $obj;
                        }
                    }
                }

                $this->collPenggunas = $collPenggunas;
                $this->collPenggunasPartial = false;
            }
        }

        return $this->collPenggunas;
    }

    /**
     * Sets a collection of Pengguna objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $penggunas A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return MstWilayah The current object (for fluent API support)
     */
    public function setPenggunas(PropelCollection $penggunas, PropelPDO $con = null)
    {
        $penggunasToDelete = $this->getPenggunas(new Criteria(), $con)->diff($penggunas);

        $this->penggunasScheduledForDeletion = unserialize(serialize($penggunasToDelete));

        foreach ($penggunasToDelete as $penggunaRemoved) {
            $penggunaRemoved->setMstWilayah(null);
        }

        $this->collPenggunas = null;
        foreach ($penggunas as $pengguna) {
            $this->addPengguna($pengguna);
        }

        $this->collPenggunas = $penggunas;
        $this->collPenggunasPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Pengguna objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Pengguna objects.
     * @throws PropelException
     */
    public function countPenggunas(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collPenggunasPartial && !$this->isNew();
        if (null === $this->collPenggunas || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPenggunas) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getPenggunas());
            }
            $query = PenggunaQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByMstWilayah($this)
                ->count($con);
        }

        return count($this->collPenggunas);
    }

    /**
     * Method called to associate a Pengguna object to this object
     * through the Pengguna foreign key attribute.
     *
     * @param    Pengguna $l Pengguna
     * @return MstWilayah The current object (for fluent API support)
     */
    public function addPengguna(Pengguna $l)
    {
        if ($this->collPenggunas === null) {
            $this->initPenggunas();
            $this->collPenggunasPartial = true;
        }
        if (!in_array($l, $this->collPenggunas->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddPengguna($l);
        }

        return $this;
    }

    /**
     * @param	Pengguna $pengguna The pengguna object to add.
     */
    protected function doAddPengguna($pengguna)
    {
        $this->collPenggunas[]= $pengguna;
        $pengguna->setMstWilayah($this);
    }

    /**
     * @param	Pengguna $pengguna The pengguna object to remove.
     * @return MstWilayah The current object (for fluent API support)
     */
    public function removePengguna($pengguna)
    {
        if ($this->getPenggunas()->contains($pengguna)) {
            $this->collPenggunas->remove($this->collPenggunas->search($pengguna));
            if (null === $this->penggunasScheduledForDeletion) {
                $this->penggunasScheduledForDeletion = clone $this->collPenggunas;
                $this->penggunasScheduledForDeletion->clear();
            }
            $this->penggunasScheduledForDeletion[]= clone $pengguna;
            $pengguna->setMstWilayah(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this MstWilayah is new, it will return
     * an empty collection; or if this MstWilayah has previously
     * been saved, it will retrieve related Penggunas from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in MstWilayah.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Pengguna[] List of Pengguna objects
     */
    public function getPenggunasJoinLembagaAkreditasi($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PenggunaQuery::create(null, $criteria);
        $query->joinWith('LembagaAkreditasi', $join_behavior);

        return $this->getPenggunas($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this MstWilayah is new, it will return
     * an empty collection; or if this MstWilayah has previously
     * been saved, it will retrieve related Penggunas from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in MstWilayah.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Pengguna[] List of Pengguna objects
     */
    public function getPenggunasJoinLembSertifikasi($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PenggunaQuery::create(null, $criteria);
        $query->joinWith('LembSertifikasi', $join_behavior);

        return $this->getPenggunas($query, $con);
    }

    /**
     * Clears out the collPesertaDidiks collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return MstWilayah The current object (for fluent API support)
     * @see        addPesertaDidiks()
     */
    public function clearPesertaDidiks()
    {
        $this->collPesertaDidiks = null; // important to set this to null since that means it is uninitialized
        $this->collPesertaDidiksPartial = null;

        return $this;
    }

    /**
     * reset is the collPesertaDidiks collection loaded partially
     *
     * @return void
     */
    public function resetPartialPesertaDidiks($v = true)
    {
        $this->collPesertaDidiksPartial = $v;
    }

    /**
     * Initializes the collPesertaDidiks collection.
     *
     * By default this just sets the collPesertaDidiks collection to an empty array (like clearcollPesertaDidiks());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPesertaDidiks($overrideExisting = true)
    {
        if (null !== $this->collPesertaDidiks && !$overrideExisting) {
            return;
        }
        $this->collPesertaDidiks = new PropelObjectCollection();
        $this->collPesertaDidiks->setModel('PesertaDidik');
    }

    /**
     * Gets an array of PesertaDidik objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this MstWilayah is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     * @throws PropelException
     */
    public function getPesertaDidiks($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collPesertaDidiksPartial && !$this->isNew();
        if (null === $this->collPesertaDidiks || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collPesertaDidiks) {
                // return empty collection
                $this->initPesertaDidiks();
            } else {
                $collPesertaDidiks = PesertaDidikQuery::create(null, $criteria)
                    ->filterByMstWilayah($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collPesertaDidiksPartial && count($collPesertaDidiks)) {
                      $this->initPesertaDidiks(false);

                      foreach($collPesertaDidiks as $obj) {
                        if (false == $this->collPesertaDidiks->contains($obj)) {
                          $this->collPesertaDidiks->append($obj);
                        }
                      }

                      $this->collPesertaDidiksPartial = true;
                    }

                    $collPesertaDidiks->getInternalIterator()->rewind();
                    return $collPesertaDidiks;
                }

                if($partial && $this->collPesertaDidiks) {
                    foreach($this->collPesertaDidiks as $obj) {
                        if($obj->isNew()) {
                            $collPesertaDidiks[] = $obj;
                        }
                    }
                }

                $this->collPesertaDidiks = $collPesertaDidiks;
                $this->collPesertaDidiksPartial = false;
            }
        }

        return $this->collPesertaDidiks;
    }

    /**
     * Sets a collection of PesertaDidik objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $pesertaDidiks A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return MstWilayah The current object (for fluent API support)
     */
    public function setPesertaDidiks(PropelCollection $pesertaDidiks, PropelPDO $con = null)
    {
        $pesertaDidiksToDelete = $this->getPesertaDidiks(new Criteria(), $con)->diff($pesertaDidiks);

        $this->pesertaDidiksScheduledForDeletion = unserialize(serialize($pesertaDidiksToDelete));

        foreach ($pesertaDidiksToDelete as $pesertaDidikRemoved) {
            $pesertaDidikRemoved->setMstWilayah(null);
        }

        $this->collPesertaDidiks = null;
        foreach ($pesertaDidiks as $pesertaDidik) {
            $this->addPesertaDidik($pesertaDidik);
        }

        $this->collPesertaDidiks = $pesertaDidiks;
        $this->collPesertaDidiksPartial = false;

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
    public function countPesertaDidiks(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collPesertaDidiksPartial && !$this->isNew();
        if (null === $this->collPesertaDidiks || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPesertaDidiks) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getPesertaDidiks());
            }
            $query = PesertaDidikQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByMstWilayah($this)
                ->count($con);
        }

        return count($this->collPesertaDidiks);
    }

    /**
     * Method called to associate a PesertaDidik object to this object
     * through the PesertaDidik foreign key attribute.
     *
     * @param    PesertaDidik $l PesertaDidik
     * @return MstWilayah The current object (for fluent API support)
     */
    public function addPesertaDidik(PesertaDidik $l)
    {
        if ($this->collPesertaDidiks === null) {
            $this->initPesertaDidiks();
            $this->collPesertaDidiksPartial = true;
        }
        if (!in_array($l, $this->collPesertaDidiks->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddPesertaDidik($l);
        }

        return $this;
    }

    /**
     * @param	PesertaDidik $pesertaDidik The pesertaDidik object to add.
     */
    protected function doAddPesertaDidik($pesertaDidik)
    {
        $this->collPesertaDidiks[]= $pesertaDidik;
        $pesertaDidik->setMstWilayah($this);
    }

    /**
     * @param	PesertaDidik $pesertaDidik The pesertaDidik object to remove.
     * @return MstWilayah The current object (for fluent API support)
     */
    public function removePesertaDidik($pesertaDidik)
    {
        if ($this->getPesertaDidiks()->contains($pesertaDidik)) {
            $this->collPesertaDidiks->remove($this->collPesertaDidiks->search($pesertaDidik));
            if (null === $this->pesertaDidiksScheduledForDeletion) {
                $this->pesertaDidiksScheduledForDeletion = clone $this->collPesertaDidiks;
                $this->pesertaDidiksScheduledForDeletion->clear();
            }
            $this->pesertaDidiksScheduledForDeletion[]= clone $pesertaDidik;
            $pesertaDidik->setMstWilayah(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this MstWilayah is new, it will return
     * an empty collection; or if this MstWilayah has previously
     * been saved, it will retrieve related PesertaDidiks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in MstWilayah.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksJoinKebutuhanKhususRelatedByKebutuhanKhususIdAyah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('KebutuhanKhususRelatedByKebutuhanKhususIdAyah', $join_behavior);

        return $this->getPesertaDidiks($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this MstWilayah is new, it will return
     * an empty collection; or if this MstWilayah has previously
     * been saved, it will retrieve related PesertaDidiks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in MstWilayah.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksJoinKebutuhanKhususRelatedByKebutuhanKhususIdIbu($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('KebutuhanKhususRelatedByKebutuhanKhususIdIbu', $join_behavior);

        return $this->getPesertaDidiks($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this MstWilayah is new, it will return
     * an empty collection; or if this MstWilayah has previously
     * been saved, it will retrieve related PesertaDidiks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in MstWilayah.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksJoinNegara($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('Negara', $join_behavior);

        return $this->getPesertaDidiks($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this MstWilayah is new, it will return
     * an empty collection; or if this MstWilayah has previously
     * been saved, it will retrieve related PesertaDidiks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in MstWilayah.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksJoinAlasanLayakPip($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('AlasanLayakPip', $join_behavior);

        return $this->getPesertaDidiks($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this MstWilayah is new, it will return
     * an empty collection; or if this MstWilayah has previously
     * been saved, it will retrieve related PesertaDidiks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in MstWilayah.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksJoinBank($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('Bank', $join_behavior);

        return $this->getPesertaDidiks($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this MstWilayah is new, it will return
     * an empty collection; or if this MstWilayah has previously
     * been saved, it will retrieve related PesertaDidiks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in MstWilayah.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksJoinKebutuhanKhususRelatedByKebutuhanKhususId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('KebutuhanKhususRelatedByKebutuhanKhususId', $join_behavior);

        return $this->getPesertaDidiks($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this MstWilayah is new, it will return
     * an empty collection; or if this MstWilayah has previously
     * been saved, it will retrieve related PesertaDidiks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in MstWilayah.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksJoinPekerjaanRelatedByPekerjaanId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('PekerjaanRelatedByPekerjaanId', $join_behavior);

        return $this->getPesertaDidiks($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this MstWilayah is new, it will return
     * an empty collection; or if this MstWilayah has previously
     * been saved, it will retrieve related PesertaDidiks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in MstWilayah.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksJoinAgama($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('Agama', $join_behavior);

        return $this->getPesertaDidiks($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this MstWilayah is new, it will return
     * an empty collection; or if this MstWilayah has previously
     * been saved, it will retrieve related PesertaDidiks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in MstWilayah.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksJoinPenghasilanRelatedByPenghasilanIdAyah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('PenghasilanRelatedByPenghasilanIdAyah', $join_behavior);

        return $this->getPesertaDidiks($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this MstWilayah is new, it will return
     * an empty collection; or if this MstWilayah has previously
     * been saved, it will retrieve related PesertaDidiks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in MstWilayah.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksJoinJenisTinggal($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('JenisTinggal', $join_behavior);

        return $this->getPesertaDidiks($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this MstWilayah is new, it will return
     * an empty collection; or if this MstWilayah has previously
     * been saved, it will retrieve related PesertaDidiks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in MstWilayah.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksJoinAlatTransportasi($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('AlatTransportasi', $join_behavior);

        return $this->getPesertaDidiks($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this MstWilayah is new, it will return
     * an empty collection; or if this MstWilayah has previously
     * been saved, it will retrieve related PesertaDidiks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in MstWilayah.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksJoinPekerjaanRelatedByPekerjaanIdAyah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('PekerjaanRelatedByPekerjaanIdAyah', $join_behavior);

        return $this->getPesertaDidiks($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this MstWilayah is new, it will return
     * an empty collection; or if this MstWilayah has previously
     * been saved, it will retrieve related PesertaDidiks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in MstWilayah.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksJoinJenjangPendidikanRelatedByJenjangPendidikanIbu($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('JenjangPendidikanRelatedByJenjangPendidikanIbu', $join_behavior);

        return $this->getPesertaDidiks($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this MstWilayah is new, it will return
     * an empty collection; or if this MstWilayah has previously
     * been saved, it will retrieve related PesertaDidiks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in MstWilayah.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksJoinPenghasilanRelatedByPenghasilanIdWali($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('PenghasilanRelatedByPenghasilanIdWali', $join_behavior);

        return $this->getPesertaDidiks($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this MstWilayah is new, it will return
     * an empty collection; or if this MstWilayah has previously
     * been saved, it will retrieve related PesertaDidiks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in MstWilayah.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksJoinPekerjaanRelatedByPekerjaanIdIbu($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('PekerjaanRelatedByPekerjaanIdIbu', $join_behavior);

        return $this->getPesertaDidiks($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this MstWilayah is new, it will return
     * an empty collection; or if this MstWilayah has previously
     * been saved, it will retrieve related PesertaDidiks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in MstWilayah.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksJoinJenjangPendidikanRelatedByJenjangPendidikanAyah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('JenjangPendidikanRelatedByJenjangPendidikanAyah', $join_behavior);

        return $this->getPesertaDidiks($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this MstWilayah is new, it will return
     * an empty collection; or if this MstWilayah has previously
     * been saved, it will retrieve related PesertaDidiks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in MstWilayah.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksJoinPenghasilanRelatedByPenghasilanIdIbu($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('PenghasilanRelatedByPenghasilanIdIbu', $join_behavior);

        return $this->getPesertaDidiks($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this MstWilayah is new, it will return
     * an empty collection; or if this MstWilayah has previously
     * been saved, it will retrieve related PesertaDidiks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in MstWilayah.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksJoinPekerjaanRelatedByPekerjaanIdWali($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('PekerjaanRelatedByPekerjaanIdWali', $join_behavior);

        return $this->getPesertaDidiks($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this MstWilayah is new, it will return
     * an empty collection; or if this MstWilayah has previously
     * been saved, it will retrieve related PesertaDidiks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in MstWilayah.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksJoinJenjangPendidikanRelatedByJenjangPendidikanWali($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('JenjangPendidikanRelatedByJenjangPendidikanWali', $join_behavior);

        return $this->getPesertaDidiks($query, $con);
    }

    /**
     * Clears out the collPtks collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return MstWilayah The current object (for fluent API support)
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
     * If this MstWilayah is new, it will return
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
                    ->filterByMstWilayah($this)
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
     * @return MstWilayah The current object (for fluent API support)
     */
    public function setPtks(PropelCollection $ptks, PropelPDO $con = null)
    {
        $ptksToDelete = $this->getPtks(new Criteria(), $con)->diff($ptks);

        $this->ptksScheduledForDeletion = unserialize(serialize($ptksToDelete));

        foreach ($ptksToDelete as $ptkRemoved) {
            $ptkRemoved->setMstWilayah(null);
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
                ->filterByMstWilayah($this)
                ->count($con);
        }

        return count($this->collPtks);
    }

    /**
     * Method called to associate a Ptk object to this object
     * through the Ptk foreign key attribute.
     *
     * @param    Ptk $l Ptk
     * @return MstWilayah The current object (for fluent API support)
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
        $ptk->setMstWilayah($this);
    }

    /**
     * @param	Ptk $ptk The ptk object to remove.
     * @return MstWilayah The current object (for fluent API support)
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
            $ptk->setMstWilayah(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this MstWilayah is new, it will return
     * an empty collection; or if this MstWilayah has previously
     * been saved, it will retrieve related Ptks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in MstWilayah.
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
     * Otherwise if this MstWilayah is new, it will return
     * an empty collection; or if this MstWilayah has previously
     * been saved, it will retrieve related Ptks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in MstWilayah.
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
     * Otherwise if this MstWilayah is new, it will return
     * an empty collection; or if this MstWilayah has previously
     * been saved, it will retrieve related Ptks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in MstWilayah.
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
     * Otherwise if this MstWilayah is new, it will return
     * an empty collection; or if this MstWilayah has previously
     * been saved, it will retrieve related Ptks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in MstWilayah.
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
     * Otherwise if this MstWilayah is new, it will return
     * an empty collection; or if this MstWilayah has previously
     * been saved, it will retrieve related Ptks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in MstWilayah.
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
     * Otherwise if this MstWilayah is new, it will return
     * an empty collection; or if this MstWilayah has previously
     * been saved, it will retrieve related Ptks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in MstWilayah.
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
     * Otherwise if this MstWilayah is new, it will return
     * an empty collection; or if this MstWilayah has previously
     * been saved, it will retrieve related Ptks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in MstWilayah.
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
     * Otherwise if this MstWilayah is new, it will return
     * an empty collection; or if this MstWilayah has previously
     * been saved, it will retrieve related Ptks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in MstWilayah.
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
     * Otherwise if this MstWilayah is new, it will return
     * an empty collection; or if this MstWilayah has previously
     * been saved, it will retrieve related Ptks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in MstWilayah.
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
     * Otherwise if this MstWilayah is new, it will return
     * an empty collection; or if this MstWilayah has previously
     * been saved, it will retrieve related Ptks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in MstWilayah.
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
     * Otherwise if this MstWilayah is new, it will return
     * an empty collection; or if this MstWilayah has previously
     * been saved, it will retrieve related Ptks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in MstWilayah.
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
     * Otherwise if this MstWilayah is new, it will return
     * an empty collection; or if this MstWilayah has previously
     * been saved, it will retrieve related Ptks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in MstWilayah.
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
     * Otherwise if this MstWilayah is new, it will return
     * an empty collection; or if this MstWilayah has previously
     * been saved, it will retrieve related Ptks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in MstWilayah.
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
     * Otherwise if this MstWilayah is new, it will return
     * an empty collection; or if this MstWilayah has previously
     * been saved, it will retrieve related Ptks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in MstWilayah.
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
     * Clears out the collPublishers collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return MstWilayah The current object (for fluent API support)
     * @see        addPublishers()
     */
    public function clearPublishers()
    {
        $this->collPublishers = null; // important to set this to null since that means it is uninitialized
        $this->collPublishersPartial = null;

        return $this;
    }

    /**
     * reset is the collPublishers collection loaded partially
     *
     * @return void
     */
    public function resetPartialPublishers($v = true)
    {
        $this->collPublishersPartial = $v;
    }

    /**
     * Initializes the collPublishers collection.
     *
     * By default this just sets the collPublishers collection to an empty array (like clearcollPublishers());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPublishers($overrideExisting = true)
    {
        if (null !== $this->collPublishers && !$overrideExisting) {
            return;
        }
        $this->collPublishers = new PropelObjectCollection();
        $this->collPublishers->setModel('Publisher');
    }

    /**
     * Gets an array of Publisher objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this MstWilayah is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Publisher[] List of Publisher objects
     * @throws PropelException
     */
    public function getPublishers($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collPublishersPartial && !$this->isNew();
        if (null === $this->collPublishers || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collPublishers) {
                // return empty collection
                $this->initPublishers();
            } else {
                $collPublishers = PublisherQuery::create(null, $criteria)
                    ->filterByMstWilayah($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collPublishersPartial && count($collPublishers)) {
                      $this->initPublishers(false);

                      foreach($collPublishers as $obj) {
                        if (false == $this->collPublishers->contains($obj)) {
                          $this->collPublishers->append($obj);
                        }
                      }

                      $this->collPublishersPartial = true;
                    }

                    $collPublishers->getInternalIterator()->rewind();
                    return $collPublishers;
                }

                if($partial && $this->collPublishers) {
                    foreach($this->collPublishers as $obj) {
                        if($obj->isNew()) {
                            $collPublishers[] = $obj;
                        }
                    }
                }

                $this->collPublishers = $collPublishers;
                $this->collPublishersPartial = false;
            }
        }

        return $this->collPublishers;
    }

    /**
     * Sets a collection of Publisher objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $publishers A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return MstWilayah The current object (for fluent API support)
     */
    public function setPublishers(PropelCollection $publishers, PropelPDO $con = null)
    {
        $publishersToDelete = $this->getPublishers(new Criteria(), $con)->diff($publishers);

        $this->publishersScheduledForDeletion = unserialize(serialize($publishersToDelete));

        foreach ($publishersToDelete as $publisherRemoved) {
            $publisherRemoved->setMstWilayah(null);
        }

        $this->collPublishers = null;
        foreach ($publishers as $publisher) {
            $this->addPublisher($publisher);
        }

        $this->collPublishers = $publishers;
        $this->collPublishersPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Publisher objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Publisher objects.
     * @throws PropelException
     */
    public function countPublishers(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collPublishersPartial && !$this->isNew();
        if (null === $this->collPublishers || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPublishers) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getPublishers());
            }
            $query = PublisherQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByMstWilayah($this)
                ->count($con);
        }

        return count($this->collPublishers);
    }

    /**
     * Method called to associate a Publisher object to this object
     * through the Publisher foreign key attribute.
     *
     * @param    Publisher $l Publisher
     * @return MstWilayah The current object (for fluent API support)
     */
    public function addPublisher(Publisher $l)
    {
        if ($this->collPublishers === null) {
            $this->initPublishers();
            $this->collPublishersPartial = true;
        }
        if (!in_array($l, $this->collPublishers->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddPublisher($l);
        }

        return $this;
    }

    /**
     * @param	Publisher $publisher The publisher object to add.
     */
    protected function doAddPublisher($publisher)
    {
        $this->collPublishers[]= $publisher;
        $publisher->setMstWilayah($this);
    }

    /**
     * @param	Publisher $publisher The publisher object to remove.
     * @return MstWilayah The current object (for fluent API support)
     */
    public function removePublisher($publisher)
    {
        if ($this->getPublishers()->contains($publisher)) {
            $this->collPublishers->remove($this->collPublishers->search($publisher));
            if (null === $this->publishersScheduledForDeletion) {
                $this->publishersScheduledForDeletion = clone $this->collPublishers;
                $this->publishersScheduledForDeletion->clear();
            }
            $this->publishersScheduledForDeletion[]= clone $publisher;
            $publisher->setMstWilayah(null);
        }

        return $this;
    }

    /**
     * Clears out the collSekolahs collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return MstWilayah The current object (for fluent API support)
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
     * If this MstWilayah is new, it will return
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
                    ->filterByMstWilayah($this)
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
     * @return MstWilayah The current object (for fluent API support)
     */
    public function setSekolahs(PropelCollection $sekolahs, PropelPDO $con = null)
    {
        $sekolahsToDelete = $this->getSekolahs(new Criteria(), $con)->diff($sekolahs);

        $this->sekolahsScheduledForDeletion = unserialize(serialize($sekolahsToDelete));

        foreach ($sekolahsToDelete as $sekolahRemoved) {
            $sekolahRemoved->setMstWilayah(null);
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
                ->filterByMstWilayah($this)
                ->count($con);
        }

        return count($this->collSekolahs);
    }

    /**
     * Method called to associate a Sekolah object to this object
     * through the Sekolah foreign key attribute.
     *
     * @param    Sekolah $l Sekolah
     * @return MstWilayah The current object (for fluent API support)
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
        $sekolah->setMstWilayah($this);
    }

    /**
     * @param	Sekolah $sekolah The sekolah object to remove.
     * @return MstWilayah The current object (for fluent API support)
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
            $sekolah->setMstWilayah(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this MstWilayah is new, it will return
     * an empty collection; or if this MstWilayah has previously
     * been saved, it will retrieve related Sekolahs from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in MstWilayah.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Sekolah[] List of Sekolah objects
     */
    public function getSekolahsJoinKebutuhanKhusus($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = SekolahQuery::create(null, $criteria);
        $query->joinWith('KebutuhanKhusus', $join_behavior);

        return $this->getSekolahs($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this MstWilayah is new, it will return
     * an empty collection; or if this MstWilayah has previously
     * been saved, it will retrieve related Sekolahs from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in MstWilayah.
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
     * Otherwise if this MstWilayah is new, it will return
     * an empty collection; or if this MstWilayah has previously
     * been saved, it will retrieve related Sekolahs from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in MstWilayah.
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
     * Otherwise if this MstWilayah is new, it will return
     * an empty collection; or if this MstWilayah has previously
     * been saved, it will retrieve related Sekolahs from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in MstWilayah.
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
     * Clears out the collTanahs collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return MstWilayah The current object (for fluent API support)
     * @see        addTanahs()
     */
    public function clearTanahs()
    {
        $this->collTanahs = null; // important to set this to null since that means it is uninitialized
        $this->collTanahsPartial = null;

        return $this;
    }

    /**
     * reset is the collTanahs collection loaded partially
     *
     * @return void
     */
    public function resetPartialTanahs($v = true)
    {
        $this->collTanahsPartial = $v;
    }

    /**
     * Initializes the collTanahs collection.
     *
     * By default this just sets the collTanahs collection to an empty array (like clearcollTanahs());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initTanahs($overrideExisting = true)
    {
        if (null !== $this->collTanahs && !$overrideExisting) {
            return;
        }
        $this->collTanahs = new PropelObjectCollection();
        $this->collTanahs->setModel('Tanah');
    }

    /**
     * Gets an array of Tanah objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this MstWilayah is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Tanah[] List of Tanah objects
     * @throws PropelException
     */
    public function getTanahs($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collTanahsPartial && !$this->isNew();
        if (null === $this->collTanahs || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collTanahs) {
                // return empty collection
                $this->initTanahs();
            } else {
                $collTanahs = TanahQuery::create(null, $criteria)
                    ->filterByMstWilayah($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collTanahsPartial && count($collTanahs)) {
                      $this->initTanahs(false);

                      foreach($collTanahs as $obj) {
                        if (false == $this->collTanahs->contains($obj)) {
                          $this->collTanahs->append($obj);
                        }
                      }

                      $this->collTanahsPartial = true;
                    }

                    $collTanahs->getInternalIterator()->rewind();
                    return $collTanahs;
                }

                if($partial && $this->collTanahs) {
                    foreach($this->collTanahs as $obj) {
                        if($obj->isNew()) {
                            $collTanahs[] = $obj;
                        }
                    }
                }

                $this->collTanahs = $collTanahs;
                $this->collTanahsPartial = false;
            }
        }

        return $this->collTanahs;
    }

    /**
     * Sets a collection of Tanah objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $tanahs A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return MstWilayah The current object (for fluent API support)
     */
    public function setTanahs(PropelCollection $tanahs, PropelPDO $con = null)
    {
        $tanahsToDelete = $this->getTanahs(new Criteria(), $con)->diff($tanahs);

        $this->tanahsScheduledForDeletion = unserialize(serialize($tanahsToDelete));

        foreach ($tanahsToDelete as $tanahRemoved) {
            $tanahRemoved->setMstWilayah(null);
        }

        $this->collTanahs = null;
        foreach ($tanahs as $tanah) {
            $this->addTanah($tanah);
        }

        $this->collTanahs = $tanahs;
        $this->collTanahsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Tanah objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Tanah objects.
     * @throws PropelException
     */
    public function countTanahs(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collTanahsPartial && !$this->isNew();
        if (null === $this->collTanahs || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collTanahs) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getTanahs());
            }
            $query = TanahQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByMstWilayah($this)
                ->count($con);
        }

        return count($this->collTanahs);
    }

    /**
     * Method called to associate a Tanah object to this object
     * through the Tanah foreign key attribute.
     *
     * @param    Tanah $l Tanah
     * @return MstWilayah The current object (for fluent API support)
     */
    public function addTanah(Tanah $l)
    {
        if ($this->collTanahs === null) {
            $this->initTanahs();
            $this->collTanahsPartial = true;
        }
        if (!in_array($l, $this->collTanahs->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddTanah($l);
        }

        return $this;
    }

    /**
     * @param	Tanah $tanah The tanah object to add.
     */
    protected function doAddTanah($tanah)
    {
        $this->collTanahs[]= $tanah;
        $tanah->setMstWilayah($this);
    }

    /**
     * @param	Tanah $tanah The tanah object to remove.
     * @return MstWilayah The current object (for fluent API support)
     */
    public function removeTanah($tanah)
    {
        if ($this->getTanahs()->contains($tanah)) {
            $this->collTanahs->remove($this->collTanahs->search($tanah));
            if (null === $this->tanahsScheduledForDeletion) {
                $this->tanahsScheduledForDeletion = clone $this->collTanahs;
                $this->tanahsScheduledForDeletion->clear();
            }
            $this->tanahsScheduledForDeletion[]= clone $tanah;
            $tanah->setMstWilayah(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this MstWilayah is new, it will return
     * an empty collection; or if this MstWilayah has previously
     * been saved, it will retrieve related Tanahs from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in MstWilayah.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Tanah[] List of Tanah objects
     */
    public function getTanahsJoinJenisHapusBuku($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TanahQuery::create(null, $criteria);
        $query->joinWith('JenisHapusBuku', $join_behavior);

        return $this->getTanahs($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this MstWilayah is new, it will return
     * an empty collection; or if this MstWilayah has previously
     * been saved, it will retrieve related Tanahs from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in MstWilayah.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Tanah[] List of Tanah objects
     */
    public function getTanahsJoinJenisPrasarana($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TanahQuery::create(null, $criteria);
        $query->joinWith('JenisPrasarana', $join_behavior);

        return $this->getTanahs($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this MstWilayah is new, it will return
     * an empty collection; or if this MstWilayah has previously
     * been saved, it will retrieve related Tanahs from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in MstWilayah.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Tanah[] List of Tanah objects
     */
    public function getTanahsJoinSekolah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TanahQuery::create(null, $criteria);
        $query->joinWith('Sekolah', $join_behavior);

        return $this->getTanahs($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this MstWilayah is new, it will return
     * an empty collection; or if this MstWilayah has previously
     * been saved, it will retrieve related Tanahs from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in MstWilayah.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Tanah[] List of Tanah objects
     */
    public function getTanahsJoinStatusKepemilikanSarpras($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TanahQuery::create(null, $criteria);
        $query->joinWith('StatusKepemilikanSarpras', $join_behavior);

        return $this->getTanahs($query, $con);
    }

    /**
     * Clears out the collTetanggaKabkotasRelatedByKodeWilayah1 collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return MstWilayah The current object (for fluent API support)
     * @see        addTetanggaKabkotasRelatedByKodeWilayah1()
     */
    public function clearTetanggaKabkotasRelatedByKodeWilayah1()
    {
        $this->collTetanggaKabkotasRelatedByKodeWilayah1 = null; // important to set this to null since that means it is uninitialized
        $this->collTetanggaKabkotasRelatedByKodeWilayah1Partial = null;

        return $this;
    }

    /**
     * reset is the collTetanggaKabkotasRelatedByKodeWilayah1 collection loaded partially
     *
     * @return void
     */
    public function resetPartialTetanggaKabkotasRelatedByKodeWilayah1($v = true)
    {
        $this->collTetanggaKabkotasRelatedByKodeWilayah1Partial = $v;
    }

    /**
     * Initializes the collTetanggaKabkotasRelatedByKodeWilayah1 collection.
     *
     * By default this just sets the collTetanggaKabkotasRelatedByKodeWilayah1 collection to an empty array (like clearcollTetanggaKabkotasRelatedByKodeWilayah1());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initTetanggaKabkotasRelatedByKodeWilayah1($overrideExisting = true)
    {
        if (null !== $this->collTetanggaKabkotasRelatedByKodeWilayah1 && !$overrideExisting) {
            return;
        }
        $this->collTetanggaKabkotasRelatedByKodeWilayah1 = new PropelObjectCollection();
        $this->collTetanggaKabkotasRelatedByKodeWilayah1->setModel('TetanggaKabkota');
    }

    /**
     * Gets an array of TetanggaKabkota objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this MstWilayah is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|TetanggaKabkota[] List of TetanggaKabkota objects
     * @throws PropelException
     */
    public function getTetanggaKabkotasRelatedByKodeWilayah1($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collTetanggaKabkotasRelatedByKodeWilayah1Partial && !$this->isNew();
        if (null === $this->collTetanggaKabkotasRelatedByKodeWilayah1 || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collTetanggaKabkotasRelatedByKodeWilayah1) {
                // return empty collection
                $this->initTetanggaKabkotasRelatedByKodeWilayah1();
            } else {
                $collTetanggaKabkotasRelatedByKodeWilayah1 = TetanggaKabkotaQuery::create(null, $criteria)
                    ->filterByMstWilayahRelatedByKodeWilayah1($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collTetanggaKabkotasRelatedByKodeWilayah1Partial && count($collTetanggaKabkotasRelatedByKodeWilayah1)) {
                      $this->initTetanggaKabkotasRelatedByKodeWilayah1(false);

                      foreach($collTetanggaKabkotasRelatedByKodeWilayah1 as $obj) {
                        if (false == $this->collTetanggaKabkotasRelatedByKodeWilayah1->contains($obj)) {
                          $this->collTetanggaKabkotasRelatedByKodeWilayah1->append($obj);
                        }
                      }

                      $this->collTetanggaKabkotasRelatedByKodeWilayah1Partial = true;
                    }

                    $collTetanggaKabkotasRelatedByKodeWilayah1->getInternalIterator()->rewind();
                    return $collTetanggaKabkotasRelatedByKodeWilayah1;
                }

                if($partial && $this->collTetanggaKabkotasRelatedByKodeWilayah1) {
                    foreach($this->collTetanggaKabkotasRelatedByKodeWilayah1 as $obj) {
                        if($obj->isNew()) {
                            $collTetanggaKabkotasRelatedByKodeWilayah1[] = $obj;
                        }
                    }
                }

                $this->collTetanggaKabkotasRelatedByKodeWilayah1 = $collTetanggaKabkotasRelatedByKodeWilayah1;
                $this->collTetanggaKabkotasRelatedByKodeWilayah1Partial = false;
            }
        }

        return $this->collTetanggaKabkotasRelatedByKodeWilayah1;
    }

    /**
     * Sets a collection of TetanggaKabkotaRelatedByKodeWilayah1 objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $tetanggaKabkotasRelatedByKodeWilayah1 A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return MstWilayah The current object (for fluent API support)
     */
    public function setTetanggaKabkotasRelatedByKodeWilayah1(PropelCollection $tetanggaKabkotasRelatedByKodeWilayah1, PropelPDO $con = null)
    {
        $tetanggaKabkotasRelatedByKodeWilayah1ToDelete = $this->getTetanggaKabkotasRelatedByKodeWilayah1(new Criteria(), $con)->diff($tetanggaKabkotasRelatedByKodeWilayah1);

        $this->tetanggaKabkotasRelatedByKodeWilayah1ScheduledForDeletion = unserialize(serialize($tetanggaKabkotasRelatedByKodeWilayah1ToDelete));

        foreach ($tetanggaKabkotasRelatedByKodeWilayah1ToDelete as $tetanggaKabkotaRelatedByKodeWilayah1Removed) {
            $tetanggaKabkotaRelatedByKodeWilayah1Removed->setMstWilayahRelatedByKodeWilayah1(null);
        }

        $this->collTetanggaKabkotasRelatedByKodeWilayah1 = null;
        foreach ($tetanggaKabkotasRelatedByKodeWilayah1 as $tetanggaKabkotaRelatedByKodeWilayah1) {
            $this->addTetanggaKabkotaRelatedByKodeWilayah1($tetanggaKabkotaRelatedByKodeWilayah1);
        }

        $this->collTetanggaKabkotasRelatedByKodeWilayah1 = $tetanggaKabkotasRelatedByKodeWilayah1;
        $this->collTetanggaKabkotasRelatedByKodeWilayah1Partial = false;

        return $this;
    }

    /**
     * Returns the number of related TetanggaKabkota objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related TetanggaKabkota objects.
     * @throws PropelException
     */
    public function countTetanggaKabkotasRelatedByKodeWilayah1(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collTetanggaKabkotasRelatedByKodeWilayah1Partial && !$this->isNew();
        if (null === $this->collTetanggaKabkotasRelatedByKodeWilayah1 || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collTetanggaKabkotasRelatedByKodeWilayah1) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getTetanggaKabkotasRelatedByKodeWilayah1());
            }
            $query = TetanggaKabkotaQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByMstWilayahRelatedByKodeWilayah1($this)
                ->count($con);
        }

        return count($this->collTetanggaKabkotasRelatedByKodeWilayah1);
    }

    /**
     * Method called to associate a TetanggaKabkota object to this object
     * through the TetanggaKabkota foreign key attribute.
     *
     * @param    TetanggaKabkota $l TetanggaKabkota
     * @return MstWilayah The current object (for fluent API support)
     */
    public function addTetanggaKabkotaRelatedByKodeWilayah1(TetanggaKabkota $l)
    {
        if ($this->collTetanggaKabkotasRelatedByKodeWilayah1 === null) {
            $this->initTetanggaKabkotasRelatedByKodeWilayah1();
            $this->collTetanggaKabkotasRelatedByKodeWilayah1Partial = true;
        }
        if (!in_array($l, $this->collTetanggaKabkotasRelatedByKodeWilayah1->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddTetanggaKabkotaRelatedByKodeWilayah1($l);
        }

        return $this;
    }

    /**
     * @param	TetanggaKabkotaRelatedByKodeWilayah1 $tetanggaKabkotaRelatedByKodeWilayah1 The tetanggaKabkotaRelatedByKodeWilayah1 object to add.
     */
    protected function doAddTetanggaKabkotaRelatedByKodeWilayah1($tetanggaKabkotaRelatedByKodeWilayah1)
    {
        $this->collTetanggaKabkotasRelatedByKodeWilayah1[]= $tetanggaKabkotaRelatedByKodeWilayah1;
        $tetanggaKabkotaRelatedByKodeWilayah1->setMstWilayahRelatedByKodeWilayah1($this);
    }

    /**
     * @param	TetanggaKabkotaRelatedByKodeWilayah1 $tetanggaKabkotaRelatedByKodeWilayah1 The tetanggaKabkotaRelatedByKodeWilayah1 object to remove.
     * @return MstWilayah The current object (for fluent API support)
     */
    public function removeTetanggaKabkotaRelatedByKodeWilayah1($tetanggaKabkotaRelatedByKodeWilayah1)
    {
        if ($this->getTetanggaKabkotasRelatedByKodeWilayah1()->contains($tetanggaKabkotaRelatedByKodeWilayah1)) {
            $this->collTetanggaKabkotasRelatedByKodeWilayah1->remove($this->collTetanggaKabkotasRelatedByKodeWilayah1->search($tetanggaKabkotaRelatedByKodeWilayah1));
            if (null === $this->tetanggaKabkotasRelatedByKodeWilayah1ScheduledForDeletion) {
                $this->tetanggaKabkotasRelatedByKodeWilayah1ScheduledForDeletion = clone $this->collTetanggaKabkotasRelatedByKodeWilayah1;
                $this->tetanggaKabkotasRelatedByKodeWilayah1ScheduledForDeletion->clear();
            }
            $this->tetanggaKabkotasRelatedByKodeWilayah1ScheduledForDeletion[]= clone $tetanggaKabkotaRelatedByKodeWilayah1;
            $tetanggaKabkotaRelatedByKodeWilayah1->setMstWilayahRelatedByKodeWilayah1(null);
        }

        return $this;
    }

    /**
     * Clears out the collTetanggaKabkotasRelatedByKodeWilayah2 collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return MstWilayah The current object (for fluent API support)
     * @see        addTetanggaKabkotasRelatedByKodeWilayah2()
     */
    public function clearTetanggaKabkotasRelatedByKodeWilayah2()
    {
        $this->collTetanggaKabkotasRelatedByKodeWilayah2 = null; // important to set this to null since that means it is uninitialized
        $this->collTetanggaKabkotasRelatedByKodeWilayah2Partial = null;

        return $this;
    }

    /**
     * reset is the collTetanggaKabkotasRelatedByKodeWilayah2 collection loaded partially
     *
     * @return void
     */
    public function resetPartialTetanggaKabkotasRelatedByKodeWilayah2($v = true)
    {
        $this->collTetanggaKabkotasRelatedByKodeWilayah2Partial = $v;
    }

    /**
     * Initializes the collTetanggaKabkotasRelatedByKodeWilayah2 collection.
     *
     * By default this just sets the collTetanggaKabkotasRelatedByKodeWilayah2 collection to an empty array (like clearcollTetanggaKabkotasRelatedByKodeWilayah2());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initTetanggaKabkotasRelatedByKodeWilayah2($overrideExisting = true)
    {
        if (null !== $this->collTetanggaKabkotasRelatedByKodeWilayah2 && !$overrideExisting) {
            return;
        }
        $this->collTetanggaKabkotasRelatedByKodeWilayah2 = new PropelObjectCollection();
        $this->collTetanggaKabkotasRelatedByKodeWilayah2->setModel('TetanggaKabkota');
    }

    /**
     * Gets an array of TetanggaKabkota objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this MstWilayah is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|TetanggaKabkota[] List of TetanggaKabkota objects
     * @throws PropelException
     */
    public function getTetanggaKabkotasRelatedByKodeWilayah2($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collTetanggaKabkotasRelatedByKodeWilayah2Partial && !$this->isNew();
        if (null === $this->collTetanggaKabkotasRelatedByKodeWilayah2 || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collTetanggaKabkotasRelatedByKodeWilayah2) {
                // return empty collection
                $this->initTetanggaKabkotasRelatedByKodeWilayah2();
            } else {
                $collTetanggaKabkotasRelatedByKodeWilayah2 = TetanggaKabkotaQuery::create(null, $criteria)
                    ->filterByMstWilayahRelatedByKodeWilayah2($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collTetanggaKabkotasRelatedByKodeWilayah2Partial && count($collTetanggaKabkotasRelatedByKodeWilayah2)) {
                      $this->initTetanggaKabkotasRelatedByKodeWilayah2(false);

                      foreach($collTetanggaKabkotasRelatedByKodeWilayah2 as $obj) {
                        if (false == $this->collTetanggaKabkotasRelatedByKodeWilayah2->contains($obj)) {
                          $this->collTetanggaKabkotasRelatedByKodeWilayah2->append($obj);
                        }
                      }

                      $this->collTetanggaKabkotasRelatedByKodeWilayah2Partial = true;
                    }

                    $collTetanggaKabkotasRelatedByKodeWilayah2->getInternalIterator()->rewind();
                    return $collTetanggaKabkotasRelatedByKodeWilayah2;
                }

                if($partial && $this->collTetanggaKabkotasRelatedByKodeWilayah2) {
                    foreach($this->collTetanggaKabkotasRelatedByKodeWilayah2 as $obj) {
                        if($obj->isNew()) {
                            $collTetanggaKabkotasRelatedByKodeWilayah2[] = $obj;
                        }
                    }
                }

                $this->collTetanggaKabkotasRelatedByKodeWilayah2 = $collTetanggaKabkotasRelatedByKodeWilayah2;
                $this->collTetanggaKabkotasRelatedByKodeWilayah2Partial = false;
            }
        }

        return $this->collTetanggaKabkotasRelatedByKodeWilayah2;
    }

    /**
     * Sets a collection of TetanggaKabkotaRelatedByKodeWilayah2 objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $tetanggaKabkotasRelatedByKodeWilayah2 A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return MstWilayah The current object (for fluent API support)
     */
    public function setTetanggaKabkotasRelatedByKodeWilayah2(PropelCollection $tetanggaKabkotasRelatedByKodeWilayah2, PropelPDO $con = null)
    {
        $tetanggaKabkotasRelatedByKodeWilayah2ToDelete = $this->getTetanggaKabkotasRelatedByKodeWilayah2(new Criteria(), $con)->diff($tetanggaKabkotasRelatedByKodeWilayah2);

        $this->tetanggaKabkotasRelatedByKodeWilayah2ScheduledForDeletion = unserialize(serialize($tetanggaKabkotasRelatedByKodeWilayah2ToDelete));

        foreach ($tetanggaKabkotasRelatedByKodeWilayah2ToDelete as $tetanggaKabkotaRelatedByKodeWilayah2Removed) {
            $tetanggaKabkotaRelatedByKodeWilayah2Removed->setMstWilayahRelatedByKodeWilayah2(null);
        }

        $this->collTetanggaKabkotasRelatedByKodeWilayah2 = null;
        foreach ($tetanggaKabkotasRelatedByKodeWilayah2 as $tetanggaKabkotaRelatedByKodeWilayah2) {
            $this->addTetanggaKabkotaRelatedByKodeWilayah2($tetanggaKabkotaRelatedByKodeWilayah2);
        }

        $this->collTetanggaKabkotasRelatedByKodeWilayah2 = $tetanggaKabkotasRelatedByKodeWilayah2;
        $this->collTetanggaKabkotasRelatedByKodeWilayah2Partial = false;

        return $this;
    }

    /**
     * Returns the number of related TetanggaKabkota objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related TetanggaKabkota objects.
     * @throws PropelException
     */
    public function countTetanggaKabkotasRelatedByKodeWilayah2(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collTetanggaKabkotasRelatedByKodeWilayah2Partial && !$this->isNew();
        if (null === $this->collTetanggaKabkotasRelatedByKodeWilayah2 || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collTetanggaKabkotasRelatedByKodeWilayah2) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getTetanggaKabkotasRelatedByKodeWilayah2());
            }
            $query = TetanggaKabkotaQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByMstWilayahRelatedByKodeWilayah2($this)
                ->count($con);
        }

        return count($this->collTetanggaKabkotasRelatedByKodeWilayah2);
    }

    /**
     * Method called to associate a TetanggaKabkota object to this object
     * through the TetanggaKabkota foreign key attribute.
     *
     * @param    TetanggaKabkota $l TetanggaKabkota
     * @return MstWilayah The current object (for fluent API support)
     */
    public function addTetanggaKabkotaRelatedByKodeWilayah2(TetanggaKabkota $l)
    {
        if ($this->collTetanggaKabkotasRelatedByKodeWilayah2 === null) {
            $this->initTetanggaKabkotasRelatedByKodeWilayah2();
            $this->collTetanggaKabkotasRelatedByKodeWilayah2Partial = true;
        }
        if (!in_array($l, $this->collTetanggaKabkotasRelatedByKodeWilayah2->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddTetanggaKabkotaRelatedByKodeWilayah2($l);
        }

        return $this;
    }

    /**
     * @param	TetanggaKabkotaRelatedByKodeWilayah2 $tetanggaKabkotaRelatedByKodeWilayah2 The tetanggaKabkotaRelatedByKodeWilayah2 object to add.
     */
    protected function doAddTetanggaKabkotaRelatedByKodeWilayah2($tetanggaKabkotaRelatedByKodeWilayah2)
    {
        $this->collTetanggaKabkotasRelatedByKodeWilayah2[]= $tetanggaKabkotaRelatedByKodeWilayah2;
        $tetanggaKabkotaRelatedByKodeWilayah2->setMstWilayahRelatedByKodeWilayah2($this);
    }

    /**
     * @param	TetanggaKabkotaRelatedByKodeWilayah2 $tetanggaKabkotaRelatedByKodeWilayah2 The tetanggaKabkotaRelatedByKodeWilayah2 object to remove.
     * @return MstWilayah The current object (for fluent API support)
     */
    public function removeTetanggaKabkotaRelatedByKodeWilayah2($tetanggaKabkotaRelatedByKodeWilayah2)
    {
        if ($this->getTetanggaKabkotasRelatedByKodeWilayah2()->contains($tetanggaKabkotaRelatedByKodeWilayah2)) {
            $this->collTetanggaKabkotasRelatedByKodeWilayah2->remove($this->collTetanggaKabkotasRelatedByKodeWilayah2->search($tetanggaKabkotaRelatedByKodeWilayah2));
            if (null === $this->tetanggaKabkotasRelatedByKodeWilayah2ScheduledForDeletion) {
                $this->tetanggaKabkotasRelatedByKodeWilayah2ScheduledForDeletion = clone $this->collTetanggaKabkotasRelatedByKodeWilayah2;
                $this->tetanggaKabkotasRelatedByKodeWilayah2ScheduledForDeletion->clear();
            }
            $this->tetanggaKabkotasRelatedByKodeWilayah2ScheduledForDeletion[]= clone $tetanggaKabkotaRelatedByKodeWilayah2;
            $tetanggaKabkotaRelatedByKodeWilayah2->setMstWilayahRelatedByKodeWilayah2(null);
        }

        return $this;
    }

    /**
     * Clears out the collYayasans collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return MstWilayah The current object (for fluent API support)
     * @see        addYayasans()
     */
    public function clearYayasans()
    {
        $this->collYayasans = null; // important to set this to null since that means it is uninitialized
        $this->collYayasansPartial = null;

        return $this;
    }

    /**
     * reset is the collYayasans collection loaded partially
     *
     * @return void
     */
    public function resetPartialYayasans($v = true)
    {
        $this->collYayasansPartial = $v;
    }

    /**
     * Initializes the collYayasans collection.
     *
     * By default this just sets the collYayasans collection to an empty array (like clearcollYayasans());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initYayasans($overrideExisting = true)
    {
        if (null !== $this->collYayasans && !$overrideExisting) {
            return;
        }
        $this->collYayasans = new PropelObjectCollection();
        $this->collYayasans->setModel('Yayasan');
    }

    /**
     * Gets an array of Yayasan objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this MstWilayah is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Yayasan[] List of Yayasan objects
     * @throws PropelException
     */
    public function getYayasans($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collYayasansPartial && !$this->isNew();
        if (null === $this->collYayasans || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collYayasans) {
                // return empty collection
                $this->initYayasans();
            } else {
                $collYayasans = YayasanQuery::create(null, $criteria)
                    ->filterByMstWilayah($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collYayasansPartial && count($collYayasans)) {
                      $this->initYayasans(false);

                      foreach($collYayasans as $obj) {
                        if (false == $this->collYayasans->contains($obj)) {
                          $this->collYayasans->append($obj);
                        }
                      }

                      $this->collYayasansPartial = true;
                    }

                    $collYayasans->getInternalIterator()->rewind();
                    return $collYayasans;
                }

                if($partial && $this->collYayasans) {
                    foreach($this->collYayasans as $obj) {
                        if($obj->isNew()) {
                            $collYayasans[] = $obj;
                        }
                    }
                }

                $this->collYayasans = $collYayasans;
                $this->collYayasansPartial = false;
            }
        }

        return $this->collYayasans;
    }

    /**
     * Sets a collection of Yayasan objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $yayasans A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return MstWilayah The current object (for fluent API support)
     */
    public function setYayasans(PropelCollection $yayasans, PropelPDO $con = null)
    {
        $yayasansToDelete = $this->getYayasans(new Criteria(), $con)->diff($yayasans);

        $this->yayasansScheduledForDeletion = unserialize(serialize($yayasansToDelete));

        foreach ($yayasansToDelete as $yayasanRemoved) {
            $yayasanRemoved->setMstWilayah(null);
        }

        $this->collYayasans = null;
        foreach ($yayasans as $yayasan) {
            $this->addYayasan($yayasan);
        }

        $this->collYayasans = $yayasans;
        $this->collYayasansPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Yayasan objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Yayasan objects.
     * @throws PropelException
     */
    public function countYayasans(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collYayasansPartial && !$this->isNew();
        if (null === $this->collYayasans || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collYayasans) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getYayasans());
            }
            $query = YayasanQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByMstWilayah($this)
                ->count($con);
        }

        return count($this->collYayasans);
    }

    /**
     * Method called to associate a Yayasan object to this object
     * through the Yayasan foreign key attribute.
     *
     * @param    Yayasan $l Yayasan
     * @return MstWilayah The current object (for fluent API support)
     */
    public function addYayasan(Yayasan $l)
    {
        if ($this->collYayasans === null) {
            $this->initYayasans();
            $this->collYayasansPartial = true;
        }
        if (!in_array($l, $this->collYayasans->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddYayasan($l);
        }

        return $this;
    }

    /**
     * @param	Yayasan $yayasan The yayasan object to add.
     */
    protected function doAddYayasan($yayasan)
    {
        $this->collYayasans[]= $yayasan;
        $yayasan->setMstWilayah($this);
    }

    /**
     * @param	Yayasan $yayasan The yayasan object to remove.
     * @return MstWilayah The current object (for fluent API support)
     */
    public function removeYayasan($yayasan)
    {
        if ($this->getYayasans()->contains($yayasan)) {
            $this->collYayasans->remove($this->collYayasans->search($yayasan));
            if (null === $this->yayasansScheduledForDeletion) {
                $this->yayasansScheduledForDeletion = clone $this->collYayasans;
                $this->yayasansScheduledForDeletion->clear();
            }
            $this->yayasansScheduledForDeletion[]= clone $yayasan;
            $yayasan->setMstWilayah(null);
        }

        return $this;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->kode_wilayah = null;
        $this->nama = null;
        $this->id_level_wilayah = null;
        $this->mst_kode_wilayah = null;
        $this->negara_id = null;
        $this->asal_wilayah = null;
        $this->kode_bps = null;
        $this->kode_dagri = null;
        $this->kode_keu = null;
        $this->id_prov = null;
        $this->id_kabkota = null;
        $this->id_kec = null;
        $this->a_desa = null;
        $this->a_kelurahan = null;
        $this->a_35 = null;
        $this->a_urban = null;
        $this->kategori_desa_id = null;
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
            if ($this->collDemografis) {
                foreach ($this->collDemografis as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collDudis) {
                foreach ($this->collDudis as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collInstalasis) {
                foreach ($this->collInstalasis as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collLembSertifikasis) {
                foreach ($this->collLembSertifikasis as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collLembagaAkreditasis) {
                foreach ($this->collLembagaAkreditasis as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collLembagaNonSekolahs) {
                foreach ($this->collLembagaNonSekolahs as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collMstWilayahsRelatedByKodeWilayah) {
                foreach ($this->collMstWilayahsRelatedByKodeWilayah as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collMuloks) {
                foreach ($this->collMuloks as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collPenggunas) {
                foreach ($this->collPenggunas as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collPesertaDidiks) {
                foreach ($this->collPesertaDidiks as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collPtks) {
                foreach ($this->collPtks as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collPublishers) {
                foreach ($this->collPublishers as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collSekolahs) {
                foreach ($this->collSekolahs as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collTanahs) {
                foreach ($this->collTanahs as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collTetanggaKabkotasRelatedByKodeWilayah1) {
                foreach ($this->collTetanggaKabkotasRelatedByKodeWilayah1 as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collTetanggaKabkotasRelatedByKodeWilayah2) {
                foreach ($this->collTetanggaKabkotasRelatedByKodeWilayah2 as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collYayasans) {
                foreach ($this->collYayasans as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aKategoriDesa instanceof Persistent) {
              $this->aKategoriDesa->clearAllReferences($deep);
            }
            if ($this->aLevelWilayah instanceof Persistent) {
              $this->aLevelWilayah->clearAllReferences($deep);
            }
            if ($this->aMstWilayahRelatedByMstKodeWilayah instanceof Persistent) {
              $this->aMstWilayahRelatedByMstKodeWilayah->clearAllReferences($deep);
            }
            if ($this->aNegara instanceof Persistent) {
              $this->aNegara->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collDemografis instanceof PropelCollection) {
            $this->collDemografis->clearIterator();
        }
        $this->collDemografis = null;
        if ($this->collDudis instanceof PropelCollection) {
            $this->collDudis->clearIterator();
        }
        $this->collDudis = null;
        if ($this->collInstalasis instanceof PropelCollection) {
            $this->collInstalasis->clearIterator();
        }
        $this->collInstalasis = null;
        if ($this->collLembSertifikasis instanceof PropelCollection) {
            $this->collLembSertifikasis->clearIterator();
        }
        $this->collLembSertifikasis = null;
        if ($this->collLembagaAkreditasis instanceof PropelCollection) {
            $this->collLembagaAkreditasis->clearIterator();
        }
        $this->collLembagaAkreditasis = null;
        if ($this->collLembagaNonSekolahs instanceof PropelCollection) {
            $this->collLembagaNonSekolahs->clearIterator();
        }
        $this->collLembagaNonSekolahs = null;
        if ($this->collMstWilayahsRelatedByKodeWilayah instanceof PropelCollection) {
            $this->collMstWilayahsRelatedByKodeWilayah->clearIterator();
        }
        $this->collMstWilayahsRelatedByKodeWilayah = null;
        if ($this->collMuloks instanceof PropelCollection) {
            $this->collMuloks->clearIterator();
        }
        $this->collMuloks = null;
        if ($this->collPenggunas instanceof PropelCollection) {
            $this->collPenggunas->clearIterator();
        }
        $this->collPenggunas = null;
        if ($this->collPesertaDidiks instanceof PropelCollection) {
            $this->collPesertaDidiks->clearIterator();
        }
        $this->collPesertaDidiks = null;
        if ($this->collPtks instanceof PropelCollection) {
            $this->collPtks->clearIterator();
        }
        $this->collPtks = null;
        if ($this->collPublishers instanceof PropelCollection) {
            $this->collPublishers->clearIterator();
        }
        $this->collPublishers = null;
        if ($this->collSekolahs instanceof PropelCollection) {
            $this->collSekolahs->clearIterator();
        }
        $this->collSekolahs = null;
        if ($this->collTanahs instanceof PropelCollection) {
            $this->collTanahs->clearIterator();
        }
        $this->collTanahs = null;
        if ($this->collTetanggaKabkotasRelatedByKodeWilayah1 instanceof PropelCollection) {
            $this->collTetanggaKabkotasRelatedByKodeWilayah1->clearIterator();
        }
        $this->collTetanggaKabkotasRelatedByKodeWilayah1 = null;
        if ($this->collTetanggaKabkotasRelatedByKodeWilayah2 instanceof PropelCollection) {
            $this->collTetanggaKabkotasRelatedByKodeWilayah2->clearIterator();
        }
        $this->collTetanggaKabkotasRelatedByKodeWilayah2 = null;
        if ($this->collYayasans instanceof PropelCollection) {
            $this->collYayasans->clearIterator();
        }
        $this->collYayasans = null;
        $this->aKategoriDesa = null;
        $this->aLevelWilayah = null;
        $this->aMstWilayahRelatedByMstKodeWilayah = null;
        $this->aNegara = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(MstWilayahPeer::DEFAULT_STRING_FORMAT);
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
