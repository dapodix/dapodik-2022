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
use DataDikdas\Model\Bangunan;
use DataDikdas\Model\BangunanQuery;
use DataDikdas\Model\JenisHapusBuku;
use DataDikdas\Model\JenisHapusBukuQuery;
use DataDikdas\Model\JenisPrasarana;
use DataDikdas\Model\JenisPrasaranaQuery;
use DataDikdas\Model\MstWilayah;
use DataDikdas\Model\MstWilayahQuery;
use DataDikdas\Model\Sekolah;
use DataDikdas\Model\SekolahQuery;
use DataDikdas\Model\StatusKepemilikanSarpras;
use DataDikdas\Model\StatusKepemilikanSarprasQuery;
use DataDikdas\Model\Tanah;
use DataDikdas\Model\TanahDariBlockgrant;
use DataDikdas\Model\TanahDariBlockgrantQuery;
use DataDikdas\Model\TanahLongitudinal;
use DataDikdas\Model\TanahLongitudinalQuery;
use DataDikdas\Model\TanahPeer;
use DataDikdas\Model\TanahQuery;
use DataDikdas\Model\VldTanah;
use DataDikdas\Model\VldTanahQuery;

/**
 * Base class that represents a row from the 'tanah' table.
 *
 * 
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseTanah extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'DataDikdas\\Model\\TanahPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        TanahPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the id_tanah field.
     * @var        string
     */
    protected $id_tanah;

    /**
     * The value for the jenis_prasarana_id field.
     * @var        int
     */
    protected $jenis_prasarana_id;

    /**
     * The value for the sekolah_id field.
     * @var        string
     */
    protected $sekolah_id;

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
     * The value for the panjang field.
     * @var        double
     */
    protected $panjang;

    /**
     * The value for the lebar field.
     * @var        double
     */
    protected $lebar;

    /**
     * The value for the nilai_perolehan_aset field.
     * @var        string
     */
    protected $nilai_perolehan_aset;

    /**
     * The value for the kode_wilayah field.
     * @var        string
     */
    protected $kode_wilayah;

    /**
     * The value for the alamat_jalan field.
     * @var        string
     */
    protected $alamat_jalan;

    /**
     * The value for the rt field.
     * @var        string
     */
    protected $rt;

    /**
     * The value for the rw field.
     * @var        string
     */
    protected $rw;

    /**
     * The value for the nama_dusun field.
     * @var        string
     */
    protected $nama_dusun;

    /**
     * The value for the desa_kelurahan field.
     * @var        string
     */
    protected $desa_kelurahan;

    /**
     * The value for the kode_pos field.
     * @var        string
     */
    protected $kode_pos;

    /**
     * The value for the lintang field.
     * @var        string
     */
    protected $lintang;

    /**
     * The value for the bujur field.
     * @var        string
     */
    protected $bujur;

    /**
     * The value for the tgl_mutasi_keluar field.
     * @var        string
     */
    protected $tgl_mutasi_keluar;

    /**
     * The value for the batas field.
     * @var        string
     */
    protected $batas;

    /**
     * The value for the ket_tanah field.
     * @var        string
     */
    protected $ket_tanah;

    /**
     * The value for the luas field.
     * @var        string
     */
    protected $luas;

    /**
     * The value for the luas_lahan_tersedia field.
     * @var        string
     */
    protected $luas_lahan_tersedia;

    /**
     * The value for the no_sertifikat_tanah field.
     * @var        string
     */
    protected $no_sertifikat_tanah;

    /**
     * The value for the asal_data field.
     * Note: this column has a database default value of: '1'
     * @var        string
     */
    protected $asal_data;

    /**
     * The value for the create_date field.
     * Note: this column has a database default value of: '2021-06-07 11:49:57'
     * @var        string
     */
    protected $create_date;

    /**
     * The value for the last_update field.
     * Note: this column has a database default value of: '2021-06-07 11:49:57'
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
     * @var        JenisHapusBuku
     */
    protected $aJenisHapusBuku;

    /**
     * @var        JenisPrasarana
     */
    protected $aJenisPrasarana;

    /**
     * @var        Sekolah
     */
    protected $aSekolah;

    /**
     * @var        StatusKepemilikanSarpras
     */
    protected $aStatusKepemilikanSarpras;

    /**
     * @var        MstWilayah
     */
    protected $aMstWilayah;

    /**
     * @var        PropelObjectCollection|Bangunan[] Collection to store aggregation of Bangunan objects.
     */
    protected $collBangunans;
    protected $collBangunansPartial;

    /**
     * @var        PropelObjectCollection|TanahDariBlockgrant[] Collection to store aggregation of TanahDariBlockgrant objects.
     */
    protected $collTanahDariBlockgrants;
    protected $collTanahDariBlockgrantsPartial;

    /**
     * @var        PropelObjectCollection|TanahLongitudinal[] Collection to store aggregation of TanahLongitudinal objects.
     */
    protected $collTanahLongitudinals;
    protected $collTanahLongitudinalsPartial;

    /**
     * @var        PropelObjectCollection|VldTanah[] Collection to store aggregation of VldTanah objects.
     */
    protected $collVldTanahs;
    protected $collVldTanahsPartial;

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
    protected $bangunansScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $tanahDariBlockgrantsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $tanahLongitudinalsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $vldTanahsScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->asal_data = '1';
        $this->create_date = '2021-06-07 11:49:57';
        $this->last_update = '2021-06-07 11:49:57';
        $this->last_sync = '1901-01-01 00:00:00';
    }

    /**
     * Initializes internal state of BaseTanah object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [id_tanah] column value.
     * 
     * @return string
     */
    public function getIdTanah()
    {
        return $this->id_tanah;
    }

    /**
     * Get the [jenis_prasarana_id] column value.
     * 
     * @return int
     */
    public function getJenisPrasaranaId()
    {
        return $this->jenis_prasarana_id;
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
     * Get the [panjang] column value.
     * 
     * @return double
     */
    public function getPanjang()
    {
        return $this->panjang;
    }

    /**
     * Get the [lebar] column value.
     * 
     * @return double
     */
    public function getLebar()
    {
        return $this->lebar;
    }

    /**
     * Get the [nilai_perolehan_aset] column value.
     * 
     * @return string
     */
    public function getNilaiPerolehanAset()
    {
        return $this->nilai_perolehan_aset;
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
     * Get the [alamat_jalan] column value.
     * 
     * @return string
     */
    public function getAlamatJalan()
    {
        return $this->alamat_jalan;
    }

    /**
     * Get the [rt] column value.
     * 
     * @return string
     */
    public function getRt()
    {
        return $this->rt;
    }

    /**
     * Get the [rw] column value.
     * 
     * @return string
     */
    public function getRw()
    {
        return $this->rw;
    }

    /**
     * Get the [nama_dusun] column value.
     * 
     * @return string
     */
    public function getNamaDusun()
    {
        return $this->nama_dusun;
    }

    /**
     * Get the [desa_kelurahan] column value.
     * 
     * @return string
     */
    public function getDesaKelurahan()
    {
        return $this->desa_kelurahan;
    }

    /**
     * Get the [kode_pos] column value.
     * 
     * @return string
     */
    public function getKodePos()
    {
        return $this->kode_pos;
    }

    /**
     * Get the [lintang] column value.
     * 
     * @return string
     */
    public function getLintang()
    {
        return $this->lintang;
    }

    /**
     * Get the [bujur] column value.
     * 
     * @return string
     */
    public function getBujur()
    {
        return $this->bujur;
    }

    /**
     * Get the [optionally formatted] temporal [tgl_mutasi_keluar] column value.
     * 
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getTglMutasiKeluar($format = '%Y-%m-%d')
    {
        if ($this->tgl_mutasi_keluar === null) {
            return null;
        }


        try {
            $dt = new DateTime($this->tgl_mutasi_keluar);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->tgl_mutasi_keluar, true), $x);
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
     * Get the [batas] column value.
     * 
     * @return string
     */
    public function getBatas()
    {
        return $this->batas;
    }

    /**
     * Get the [ket_tanah] column value.
     * 
     * @return string
     */
    public function getKetTanah()
    {
        return $this->ket_tanah;
    }

    /**
     * Get the [luas] column value.
     * 
     * @return string
     */
    public function getLuas()
    {
        return $this->luas;
    }

    /**
     * Get the [luas_lahan_tersedia] column value.
     * 
     * @return string
     */
    public function getLuasLahanTersedia()
    {
        return $this->luas_lahan_tersedia;
    }

    /**
     * Get the [no_sertifikat_tanah] column value.
     * 
     * @return string
     */
    public function getNoSertifikatTanah()
    {
        return $this->no_sertifikat_tanah;
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
     * Set the value of [id_tanah] column.
     * 
     * @param string $v new value
     * @return Tanah The current object (for fluent API support)
     */
    public function setIdTanah($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->id_tanah !== $v) {
            $this->id_tanah = $v;
            $this->modifiedColumns[] = TanahPeer::ID_TANAH;
        }


        return $this;
    } // setIdTanah()

    /**
     * Set the value of [jenis_prasarana_id] column.
     * 
     * @param int $v new value
     * @return Tanah The current object (for fluent API support)
     */
    public function setJenisPrasaranaId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->jenis_prasarana_id !== $v) {
            $this->jenis_prasarana_id = $v;
            $this->modifiedColumns[] = TanahPeer::JENIS_PRASARANA_ID;
        }

        if ($this->aJenisPrasarana !== null && $this->aJenisPrasarana->getJenisPrasaranaId() !== $v) {
            $this->aJenisPrasarana = null;
        }


        return $this;
    } // setJenisPrasaranaId()

    /**
     * Set the value of [sekolah_id] column.
     * 
     * @param string $v new value
     * @return Tanah The current object (for fluent API support)
     */
    public function setSekolahId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->sekolah_id !== $v) {
            $this->sekolah_id = $v;
            $this->modifiedColumns[] = TanahPeer::SEKOLAH_ID;
        }

        if ($this->aSekolah !== null && $this->aSekolah->getSekolahId() !== $v) {
            $this->aSekolah = null;
        }


        return $this;
    } // setSekolahId()

    /**
     * Set the value of [id_hapus_buku] column.
     * 
     * @param string $v new value
     * @return Tanah The current object (for fluent API support)
     */
    public function setIdHapusBuku($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->id_hapus_buku !== $v) {
            $this->id_hapus_buku = $v;
            $this->modifiedColumns[] = TanahPeer::ID_HAPUS_BUKU;
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
     * @return Tanah The current object (for fluent API support)
     */
    public function setKepemilikanSarprasId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->kepemilikan_sarpras_id !== $v) {
            $this->kepemilikan_sarpras_id = $v;
            $this->modifiedColumns[] = TanahPeer::KEPEMILIKAN_SARPRAS_ID;
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
     * @return Tanah The current object (for fluent API support)
     */
    public function setKdKl($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->kd_kl !== $v) {
            $this->kd_kl = $v;
            $this->modifiedColumns[] = TanahPeer::KD_KL;
        }


        return $this;
    } // setKdKl()

    /**
     * Set the value of [kd_satker] column.
     * 
     * @param string $v new value
     * @return Tanah The current object (for fluent API support)
     */
    public function setKdSatker($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->kd_satker !== $v) {
            $this->kd_satker = $v;
            $this->modifiedColumns[] = TanahPeer::KD_SATKER;
        }


        return $this;
    } // setKdSatker()

    /**
     * Set the value of [kd_brg] column.
     * 
     * @param string $v new value
     * @return Tanah The current object (for fluent API support)
     */
    public function setKdBrg($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->kd_brg !== $v) {
            $this->kd_brg = $v;
            $this->modifiedColumns[] = TanahPeer::KD_BRG;
        }


        return $this;
    } // setKdBrg()

    /**
     * Set the value of [nup] column.
     * 
     * @param int $v new value
     * @return Tanah The current object (for fluent API support)
     */
    public function setNup($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->nup !== $v) {
            $this->nup = $v;
            $this->modifiedColumns[] = TanahPeer::NUP;
        }


        return $this;
    } // setNup()

    /**
     * Set the value of [kode_eselon1] column.
     * 
     * @param string $v new value
     * @return Tanah The current object (for fluent API support)
     */
    public function setKodeEselon1($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->kode_eselon1 !== $v) {
            $this->kode_eselon1 = $v;
            $this->modifiedColumns[] = TanahPeer::KODE_ESELON1;
        }


        return $this;
    } // setKodeEselon1()

    /**
     * Set the value of [nama_eselon1] column.
     * 
     * @param string $v new value
     * @return Tanah The current object (for fluent API support)
     */
    public function setNamaEselon1($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nama_eselon1 !== $v) {
            $this->nama_eselon1 = $v;
            $this->modifiedColumns[] = TanahPeer::NAMA_ESELON1;
        }


        return $this;
    } // setNamaEselon1()

    /**
     * Set the value of [kode_sub_satker] column.
     * 
     * @param string $v new value
     * @return Tanah The current object (for fluent API support)
     */
    public function setKodeSubSatker($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->kode_sub_satker !== $v) {
            $this->kode_sub_satker = $v;
            $this->modifiedColumns[] = TanahPeer::KODE_SUB_SATKER;
        }


        return $this;
    } // setKodeSubSatker()

    /**
     * Set the value of [nama_sub_satker] column.
     * 
     * @param string $v new value
     * @return Tanah The current object (for fluent API support)
     */
    public function setNamaSubSatker($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nama_sub_satker !== $v) {
            $this->nama_sub_satker = $v;
            $this->modifiedColumns[] = TanahPeer::NAMA_SUB_SATKER;
        }


        return $this;
    } // setNamaSubSatker()

    /**
     * Set the value of [nama] column.
     * 
     * @param string $v new value
     * @return Tanah The current object (for fluent API support)
     */
    public function setNama($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nama !== $v) {
            $this->nama = $v;
            $this->modifiedColumns[] = TanahPeer::NAMA;
        }


        return $this;
    } // setNama()

    /**
     * Set the value of [panjang] column.
     * 
     * @param double $v new value
     * @return Tanah The current object (for fluent API support)
     */
    public function setPanjang($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (double) $v;
        }

        if ($this->panjang !== $v) {
            $this->panjang = $v;
            $this->modifiedColumns[] = TanahPeer::PANJANG;
        }


        return $this;
    } // setPanjang()

    /**
     * Set the value of [lebar] column.
     * 
     * @param double $v new value
     * @return Tanah The current object (for fluent API support)
     */
    public function setLebar($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (double) $v;
        }

        if ($this->lebar !== $v) {
            $this->lebar = $v;
            $this->modifiedColumns[] = TanahPeer::LEBAR;
        }


        return $this;
    } // setLebar()

    /**
     * Set the value of [nilai_perolehan_aset] column.
     * 
     * @param string $v new value
     * @return Tanah The current object (for fluent API support)
     */
    public function setNilaiPerolehanAset($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nilai_perolehan_aset !== $v) {
            $this->nilai_perolehan_aset = $v;
            $this->modifiedColumns[] = TanahPeer::NILAI_PEROLEHAN_ASET;
        }


        return $this;
    } // setNilaiPerolehanAset()

    /**
     * Set the value of [kode_wilayah] column.
     * 
     * @param string $v new value
     * @return Tanah The current object (for fluent API support)
     */
    public function setKodeWilayah($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->kode_wilayah !== $v) {
            $this->kode_wilayah = $v;
            $this->modifiedColumns[] = TanahPeer::KODE_WILAYAH;
        }

        if ($this->aMstWilayah !== null && $this->aMstWilayah->getKodeWilayah() !== $v) {
            $this->aMstWilayah = null;
        }


        return $this;
    } // setKodeWilayah()

    /**
     * Set the value of [alamat_jalan] column.
     * 
     * @param string $v new value
     * @return Tanah The current object (for fluent API support)
     */
    public function setAlamatJalan($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->alamat_jalan !== $v) {
            $this->alamat_jalan = $v;
            $this->modifiedColumns[] = TanahPeer::ALAMAT_JALAN;
        }


        return $this;
    } // setAlamatJalan()

    /**
     * Set the value of [rt] column.
     * 
     * @param string $v new value
     * @return Tanah The current object (for fluent API support)
     */
    public function setRt($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->rt !== $v) {
            $this->rt = $v;
            $this->modifiedColumns[] = TanahPeer::RT;
        }


        return $this;
    } // setRt()

    /**
     * Set the value of [rw] column.
     * 
     * @param string $v new value
     * @return Tanah The current object (for fluent API support)
     */
    public function setRw($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->rw !== $v) {
            $this->rw = $v;
            $this->modifiedColumns[] = TanahPeer::RW;
        }


        return $this;
    } // setRw()

    /**
     * Set the value of [nama_dusun] column.
     * 
     * @param string $v new value
     * @return Tanah The current object (for fluent API support)
     */
    public function setNamaDusun($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nama_dusun !== $v) {
            $this->nama_dusun = $v;
            $this->modifiedColumns[] = TanahPeer::NAMA_DUSUN;
        }


        return $this;
    } // setNamaDusun()

    /**
     * Set the value of [desa_kelurahan] column.
     * 
     * @param string $v new value
     * @return Tanah The current object (for fluent API support)
     */
    public function setDesaKelurahan($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->desa_kelurahan !== $v) {
            $this->desa_kelurahan = $v;
            $this->modifiedColumns[] = TanahPeer::DESA_KELURAHAN;
        }


        return $this;
    } // setDesaKelurahan()

    /**
     * Set the value of [kode_pos] column.
     * 
     * @param string $v new value
     * @return Tanah The current object (for fluent API support)
     */
    public function setKodePos($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->kode_pos !== $v) {
            $this->kode_pos = $v;
            $this->modifiedColumns[] = TanahPeer::KODE_POS;
        }


        return $this;
    } // setKodePos()

    /**
     * Set the value of [lintang] column.
     * 
     * @param string $v new value
     * @return Tanah The current object (for fluent API support)
     */
    public function setLintang($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->lintang !== $v) {
            $this->lintang = $v;
            $this->modifiedColumns[] = TanahPeer::LINTANG;
        }


        return $this;
    } // setLintang()

    /**
     * Set the value of [bujur] column.
     * 
     * @param string $v new value
     * @return Tanah The current object (for fluent API support)
     */
    public function setBujur($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->bujur !== $v) {
            $this->bujur = $v;
            $this->modifiedColumns[] = TanahPeer::BUJUR;
        }


        return $this;
    } // setBujur()

    /**
     * Sets the value of [tgl_mutasi_keluar] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Tanah The current object (for fluent API support)
     */
    public function setTglMutasiKeluar($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->tgl_mutasi_keluar !== null || $dt !== null) {
            $currentDateAsString = ($this->tgl_mutasi_keluar !== null && $tmpDt = new DateTime($this->tgl_mutasi_keluar)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->tgl_mutasi_keluar = $newDateAsString;
                $this->modifiedColumns[] = TanahPeer::TGL_MUTASI_KELUAR;
            }
        } // if either are not null


        return $this;
    } // setTglMutasiKeluar()

    /**
     * Set the value of [batas] column.
     * 
     * @param string $v new value
     * @return Tanah The current object (for fluent API support)
     */
    public function setBatas($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->batas !== $v) {
            $this->batas = $v;
            $this->modifiedColumns[] = TanahPeer::BATAS;
        }


        return $this;
    } // setBatas()

    /**
     * Set the value of [ket_tanah] column.
     * 
     * @param string $v new value
     * @return Tanah The current object (for fluent API support)
     */
    public function setKetTanah($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->ket_tanah !== $v) {
            $this->ket_tanah = $v;
            $this->modifiedColumns[] = TanahPeer::KET_TANAH;
        }


        return $this;
    } // setKetTanah()

    /**
     * Set the value of [luas] column.
     * 
     * @param string $v new value
     * @return Tanah The current object (for fluent API support)
     */
    public function setLuas($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->luas !== $v) {
            $this->luas = $v;
            $this->modifiedColumns[] = TanahPeer::LUAS;
        }


        return $this;
    } // setLuas()

    /**
     * Set the value of [luas_lahan_tersedia] column.
     * 
     * @param string $v new value
     * @return Tanah The current object (for fluent API support)
     */
    public function setLuasLahanTersedia($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->luas_lahan_tersedia !== $v) {
            $this->luas_lahan_tersedia = $v;
            $this->modifiedColumns[] = TanahPeer::LUAS_LAHAN_TERSEDIA;
        }


        return $this;
    } // setLuasLahanTersedia()

    /**
     * Set the value of [no_sertifikat_tanah] column.
     * 
     * @param string $v new value
     * @return Tanah The current object (for fluent API support)
     */
    public function setNoSertifikatTanah($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->no_sertifikat_tanah !== $v) {
            $this->no_sertifikat_tanah = $v;
            $this->modifiedColumns[] = TanahPeer::NO_SERTIFIKAT_TANAH;
        }


        return $this;
    } // setNoSertifikatTanah()

    /**
     * Set the value of [asal_data] column.
     * 
     * @param string $v new value
     * @return Tanah The current object (for fluent API support)
     */
    public function setAsalData($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->asal_data !== $v) {
            $this->asal_data = $v;
            $this->modifiedColumns[] = TanahPeer::ASAL_DATA;
        }


        return $this;
    } // setAsalData()

    /**
     * Sets the value of [create_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Tanah The current object (for fluent API support)
     */
    public function setCreateDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->create_date !== null || $dt !== null) {
            $currentDateAsString = ($this->create_date !== null && $tmpDt = new DateTime($this->create_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ( ($currentDateAsString !== $newDateAsString) // normalized values don't match
                || ($dt->format('Y-m-d H:i:s') === '2021-06-07 11:49:57') // or the entered value matches the default
                 ) {
                $this->create_date = $newDateAsString;
                $this->modifiedColumns[] = TanahPeer::CREATE_DATE;
            }
        } // if either are not null


        return $this;
    } // setCreateDate()

    /**
     * Sets the value of [last_update] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Tanah The current object (for fluent API support)
     */
    public function setLastUpdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->last_update !== null || $dt !== null) {
            $currentDateAsString = ($this->last_update !== null && $tmpDt = new DateTime($this->last_update)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ( ($currentDateAsString !== $newDateAsString) // normalized values don't match
                || ($dt->format('Y-m-d H:i:s') === '2021-06-07 11:49:57') // or the entered value matches the default
                 ) {
                $this->last_update = $newDateAsString;
                $this->modifiedColumns[] = TanahPeer::LAST_UPDATE;
            }
        } // if either are not null


        return $this;
    } // setLastUpdate()

    /**
     * Set the value of [soft_delete] column.
     * 
     * @param string $v new value
     * @return Tanah The current object (for fluent API support)
     */
    public function setSoftDelete($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->soft_delete !== $v) {
            $this->soft_delete = $v;
            $this->modifiedColumns[] = TanahPeer::SOFT_DELETE;
        }


        return $this;
    } // setSoftDelete()

    /**
     * Sets the value of [last_sync] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Tanah The current object (for fluent API support)
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
                $this->modifiedColumns[] = TanahPeer::LAST_SYNC;
            }
        } // if either are not null


        return $this;
    } // setLastSync()

    /**
     * Set the value of [updater_id] column.
     * 
     * @param string $v new value
     * @return Tanah The current object (for fluent API support)
     */
    public function setUpdaterId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->updater_id !== $v) {
            $this->updater_id = $v;
            $this->modifiedColumns[] = TanahPeer::UPDATER_ID;
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

            if ($this->create_date !== '2021-06-07 11:49:57') {
                return false;
            }

            if ($this->last_update !== '2021-06-07 11:49:57') {
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

            $this->id_tanah = ($row[$startcol + 0] !== null) ? (string) $row[$startcol + 0] : null;
            $this->jenis_prasarana_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->sekolah_id = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->id_hapus_buku = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->kepemilikan_sarpras_id = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->kd_kl = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->kd_satker = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->kd_brg = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->nup = ($row[$startcol + 8] !== null) ? (int) $row[$startcol + 8] : null;
            $this->kode_eselon1 = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
            $this->nama_eselon1 = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
            $this->kode_sub_satker = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
            $this->nama_sub_satker = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
            $this->nama = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
            $this->panjang = ($row[$startcol + 14] !== null) ? (double) $row[$startcol + 14] : null;
            $this->lebar = ($row[$startcol + 15] !== null) ? (double) $row[$startcol + 15] : null;
            $this->nilai_perolehan_aset = ($row[$startcol + 16] !== null) ? (string) $row[$startcol + 16] : null;
            $this->kode_wilayah = ($row[$startcol + 17] !== null) ? (string) $row[$startcol + 17] : null;
            $this->alamat_jalan = ($row[$startcol + 18] !== null) ? (string) $row[$startcol + 18] : null;
            $this->rt = ($row[$startcol + 19] !== null) ? (string) $row[$startcol + 19] : null;
            $this->rw = ($row[$startcol + 20] !== null) ? (string) $row[$startcol + 20] : null;
            $this->nama_dusun = ($row[$startcol + 21] !== null) ? (string) $row[$startcol + 21] : null;
            $this->desa_kelurahan = ($row[$startcol + 22] !== null) ? (string) $row[$startcol + 22] : null;
            $this->kode_pos = ($row[$startcol + 23] !== null) ? (string) $row[$startcol + 23] : null;
            $this->lintang = ($row[$startcol + 24] !== null) ? (string) $row[$startcol + 24] : null;
            $this->bujur = ($row[$startcol + 25] !== null) ? (string) $row[$startcol + 25] : null;
            $this->tgl_mutasi_keluar = ($row[$startcol + 26] !== null) ? (string) $row[$startcol + 26] : null;
            $this->batas = ($row[$startcol + 27] !== null) ? (string) $row[$startcol + 27] : null;
            $this->ket_tanah = ($row[$startcol + 28] !== null) ? (string) $row[$startcol + 28] : null;
            $this->luas = ($row[$startcol + 29] !== null) ? (string) $row[$startcol + 29] : null;
            $this->luas_lahan_tersedia = ($row[$startcol + 30] !== null) ? (string) $row[$startcol + 30] : null;
            $this->no_sertifikat_tanah = ($row[$startcol + 31] !== null) ? (string) $row[$startcol + 31] : null;
            $this->asal_data = ($row[$startcol + 32] !== null) ? (string) $row[$startcol + 32] : null;
            $this->create_date = ($row[$startcol + 33] !== null) ? (string) $row[$startcol + 33] : null;
            $this->last_update = ($row[$startcol + 34] !== null) ? (string) $row[$startcol + 34] : null;
            $this->soft_delete = ($row[$startcol + 35] !== null) ? (string) $row[$startcol + 35] : null;
            $this->last_sync = ($row[$startcol + 36] !== null) ? (string) $row[$startcol + 36] : null;
            $this->updater_id = ($row[$startcol + 37] !== null) ? (string) $row[$startcol + 37] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 38; // 38 = TanahPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Tanah object", $e);
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

        if ($this->aJenisPrasarana !== null && $this->jenis_prasarana_id !== $this->aJenisPrasarana->getJenisPrasaranaId()) {
            $this->aJenisPrasarana = null;
        }
        if ($this->aSekolah !== null && $this->sekolah_id !== $this->aSekolah->getSekolahId()) {
            $this->aSekolah = null;
        }
        if ($this->aJenisHapusBuku !== null && $this->id_hapus_buku !== $this->aJenisHapusBuku->getIdHapusBuku()) {
            $this->aJenisHapusBuku = null;
        }
        if ($this->aStatusKepemilikanSarpras !== null && $this->kepemilikan_sarpras_id !== $this->aStatusKepemilikanSarpras->getKepemilikanSarprasId()) {
            $this->aStatusKepemilikanSarpras = null;
        }
        if ($this->aMstWilayah !== null && $this->kode_wilayah !== $this->aMstWilayah->getKodeWilayah()) {
            $this->aMstWilayah = null;
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
            $con = Propel::getConnection(TanahPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = TanahPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aJenisHapusBuku = null;
            $this->aJenisPrasarana = null;
            $this->aSekolah = null;
            $this->aStatusKepemilikanSarpras = null;
            $this->aMstWilayah = null;
            $this->collBangunans = null;

            $this->collTanahDariBlockgrants = null;

            $this->collTanahLongitudinals = null;

            $this->collVldTanahs = null;

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
            $con = Propel::getConnection(TanahPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = TanahQuery::create()
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
            $con = Propel::getConnection(TanahPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                TanahPeer::addInstanceToPool($this);
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

            if ($this->aJenisHapusBuku !== null) {
                if ($this->aJenisHapusBuku->isModified() || $this->aJenisHapusBuku->isNew()) {
                    $affectedRows += $this->aJenisHapusBuku->save($con);
                }
                $this->setJenisHapusBuku($this->aJenisHapusBuku);
            }

            if ($this->aJenisPrasarana !== null) {
                if ($this->aJenisPrasarana->isModified() || $this->aJenisPrasarana->isNew()) {
                    $affectedRows += $this->aJenisPrasarana->save($con);
                }
                $this->setJenisPrasarana($this->aJenisPrasarana);
            }

            if ($this->aSekolah !== null) {
                if ($this->aSekolah->isModified() || $this->aSekolah->isNew()) {
                    $affectedRows += $this->aSekolah->save($con);
                }
                $this->setSekolah($this->aSekolah);
            }

            if ($this->aStatusKepemilikanSarpras !== null) {
                if ($this->aStatusKepemilikanSarpras->isModified() || $this->aStatusKepemilikanSarpras->isNew()) {
                    $affectedRows += $this->aStatusKepemilikanSarpras->save($con);
                }
                $this->setStatusKepemilikanSarpras($this->aStatusKepemilikanSarpras);
            }

            if ($this->aMstWilayah !== null) {
                if ($this->aMstWilayah->isModified() || $this->aMstWilayah->isNew()) {
                    $affectedRows += $this->aMstWilayah->save($con);
                }
                $this->setMstWilayah($this->aMstWilayah);
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

            if ($this->bangunansScheduledForDeletion !== null) {
                if (!$this->bangunansScheduledForDeletion->isEmpty()) {
                    foreach ($this->bangunansScheduledForDeletion as $bangunan) {
                        // need to save related object because we set the relation to null
                        $bangunan->save($con);
                    }
                    $this->bangunansScheduledForDeletion = null;
                }
            }

            if ($this->collBangunans !== null) {
                foreach ($this->collBangunans as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->tanahDariBlockgrantsScheduledForDeletion !== null) {
                if (!$this->tanahDariBlockgrantsScheduledForDeletion->isEmpty()) {
                    TanahDariBlockgrantQuery::create()
                        ->filterByPrimaryKeys($this->tanahDariBlockgrantsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->tanahDariBlockgrantsScheduledForDeletion = null;
                }
            }

            if ($this->collTanahDariBlockgrants !== null) {
                foreach ($this->collTanahDariBlockgrants as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->tanahLongitudinalsScheduledForDeletion !== null) {
                if (!$this->tanahLongitudinalsScheduledForDeletion->isEmpty()) {
                    TanahLongitudinalQuery::create()
                        ->filterByPrimaryKeys($this->tanahLongitudinalsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->tanahLongitudinalsScheduledForDeletion = null;
                }
            }

            if ($this->collTanahLongitudinals !== null) {
                foreach ($this->collTanahLongitudinals as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->vldTanahsScheduledForDeletion !== null) {
                if (!$this->vldTanahsScheduledForDeletion->isEmpty()) {
                    VldTanahQuery::create()
                        ->filterByPrimaryKeys($this->vldTanahsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->vldTanahsScheduledForDeletion = null;
                }
            }

            if ($this->collVldTanahs !== null) {
                foreach ($this->collVldTanahs as $referrerFK) {
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
        if ($this->isColumnModified(TanahPeer::ID_TANAH)) {
            $modifiedColumns[':p' . $index++]  = '"id_tanah"';
        }
        if ($this->isColumnModified(TanahPeer::JENIS_PRASARANA_ID)) {
            $modifiedColumns[':p' . $index++]  = '"jenis_prasarana_id"';
        }
        if ($this->isColumnModified(TanahPeer::SEKOLAH_ID)) {
            $modifiedColumns[':p' . $index++]  = '"sekolah_id"';
        }
        if ($this->isColumnModified(TanahPeer::ID_HAPUS_BUKU)) {
            $modifiedColumns[':p' . $index++]  = '"id_hapus_buku"';
        }
        if ($this->isColumnModified(TanahPeer::KEPEMILIKAN_SARPRAS_ID)) {
            $modifiedColumns[':p' . $index++]  = '"kepemilikan_sarpras_id"';
        }
        if ($this->isColumnModified(TanahPeer::KD_KL)) {
            $modifiedColumns[':p' . $index++]  = '"kd_kl"';
        }
        if ($this->isColumnModified(TanahPeer::KD_SATKER)) {
            $modifiedColumns[':p' . $index++]  = '"kd_satker"';
        }
        if ($this->isColumnModified(TanahPeer::KD_BRG)) {
            $modifiedColumns[':p' . $index++]  = '"kd_brg"';
        }
        if ($this->isColumnModified(TanahPeer::NUP)) {
            $modifiedColumns[':p' . $index++]  = '"nup"';
        }
        if ($this->isColumnModified(TanahPeer::KODE_ESELON1)) {
            $modifiedColumns[':p' . $index++]  = '"kode_eselon1"';
        }
        if ($this->isColumnModified(TanahPeer::NAMA_ESELON1)) {
            $modifiedColumns[':p' . $index++]  = '"nama_eselon1"';
        }
        if ($this->isColumnModified(TanahPeer::KODE_SUB_SATKER)) {
            $modifiedColumns[':p' . $index++]  = '"kode_sub_satker"';
        }
        if ($this->isColumnModified(TanahPeer::NAMA_SUB_SATKER)) {
            $modifiedColumns[':p' . $index++]  = '"nama_sub_satker"';
        }
        if ($this->isColumnModified(TanahPeer::NAMA)) {
            $modifiedColumns[':p' . $index++]  = '"nama"';
        }
        if ($this->isColumnModified(TanahPeer::PANJANG)) {
            $modifiedColumns[':p' . $index++]  = '"panjang"';
        }
        if ($this->isColumnModified(TanahPeer::LEBAR)) {
            $modifiedColumns[':p' . $index++]  = '"lebar"';
        }
        if ($this->isColumnModified(TanahPeer::NILAI_PEROLEHAN_ASET)) {
            $modifiedColumns[':p' . $index++]  = '"nilai_perolehan_aset"';
        }
        if ($this->isColumnModified(TanahPeer::KODE_WILAYAH)) {
            $modifiedColumns[':p' . $index++]  = '"kode_wilayah"';
        }
        if ($this->isColumnModified(TanahPeer::ALAMAT_JALAN)) {
            $modifiedColumns[':p' . $index++]  = '"alamat_jalan"';
        }
        if ($this->isColumnModified(TanahPeer::RT)) {
            $modifiedColumns[':p' . $index++]  = '"rt"';
        }
        if ($this->isColumnModified(TanahPeer::RW)) {
            $modifiedColumns[':p' . $index++]  = '"rw"';
        }
        if ($this->isColumnModified(TanahPeer::NAMA_DUSUN)) {
            $modifiedColumns[':p' . $index++]  = '"nama_dusun"';
        }
        if ($this->isColumnModified(TanahPeer::DESA_KELURAHAN)) {
            $modifiedColumns[':p' . $index++]  = '"desa_kelurahan"';
        }
        if ($this->isColumnModified(TanahPeer::KODE_POS)) {
            $modifiedColumns[':p' . $index++]  = '"kode_pos"';
        }
        if ($this->isColumnModified(TanahPeer::LINTANG)) {
            $modifiedColumns[':p' . $index++]  = '"lintang"';
        }
        if ($this->isColumnModified(TanahPeer::BUJUR)) {
            $modifiedColumns[':p' . $index++]  = '"bujur"';
        }
        if ($this->isColumnModified(TanahPeer::TGL_MUTASI_KELUAR)) {
            $modifiedColumns[':p' . $index++]  = '"tgl_mutasi_keluar"';
        }
        if ($this->isColumnModified(TanahPeer::BATAS)) {
            $modifiedColumns[':p' . $index++]  = '"batas"';
        }
        if ($this->isColumnModified(TanahPeer::KET_TANAH)) {
            $modifiedColumns[':p' . $index++]  = '"ket_tanah"';
        }
        if ($this->isColumnModified(TanahPeer::LUAS)) {
            $modifiedColumns[':p' . $index++]  = '"luas"';
        }
        if ($this->isColumnModified(TanahPeer::LUAS_LAHAN_TERSEDIA)) {
            $modifiedColumns[':p' . $index++]  = '"luas_lahan_tersedia"';
        }
        if ($this->isColumnModified(TanahPeer::NO_SERTIFIKAT_TANAH)) {
            $modifiedColumns[':p' . $index++]  = '"no_sertifikat_tanah"';
        }
        if ($this->isColumnModified(TanahPeer::ASAL_DATA)) {
            $modifiedColumns[':p' . $index++]  = '"asal_data"';
        }
        if ($this->isColumnModified(TanahPeer::CREATE_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"create_date"';
        }
        if ($this->isColumnModified(TanahPeer::LAST_UPDATE)) {
            $modifiedColumns[':p' . $index++]  = '"last_update"';
        }
        if ($this->isColumnModified(TanahPeer::SOFT_DELETE)) {
            $modifiedColumns[':p' . $index++]  = '"soft_delete"';
        }
        if ($this->isColumnModified(TanahPeer::LAST_SYNC)) {
            $modifiedColumns[':p' . $index++]  = '"last_sync"';
        }
        if ($this->isColumnModified(TanahPeer::UPDATER_ID)) {
            $modifiedColumns[':p' . $index++]  = '"updater_id"';
        }

        $sql = sprintf(
            'INSERT INTO "tanah" (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '"id_tanah"':						
                        $stmt->bindValue($identifier, $this->id_tanah, PDO::PARAM_STR);
                        break;
                    case '"jenis_prasarana_id"':						
                        $stmt->bindValue($identifier, $this->jenis_prasarana_id, PDO::PARAM_INT);
                        break;
                    case '"sekolah_id"':						
                        $stmt->bindValue($identifier, $this->sekolah_id, PDO::PARAM_STR);
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
                    case '"panjang"':						
                        $stmt->bindValue($identifier, $this->panjang, PDO::PARAM_STR);
                        break;
                    case '"lebar"':						
                        $stmt->bindValue($identifier, $this->lebar, PDO::PARAM_STR);
                        break;
                    case '"nilai_perolehan_aset"':						
                        $stmt->bindValue($identifier, $this->nilai_perolehan_aset, PDO::PARAM_STR);
                        break;
                    case '"kode_wilayah"':						
                        $stmt->bindValue($identifier, $this->kode_wilayah, PDO::PARAM_STR);
                        break;
                    case '"alamat_jalan"':						
                        $stmt->bindValue($identifier, $this->alamat_jalan, PDO::PARAM_STR);
                        break;
                    case '"rt"':						
                        $stmt->bindValue($identifier, $this->rt, PDO::PARAM_STR);
                        break;
                    case '"rw"':						
                        $stmt->bindValue($identifier, $this->rw, PDO::PARAM_STR);
                        break;
                    case '"nama_dusun"':						
                        $stmt->bindValue($identifier, $this->nama_dusun, PDO::PARAM_STR);
                        break;
                    case '"desa_kelurahan"':						
                        $stmt->bindValue($identifier, $this->desa_kelurahan, PDO::PARAM_STR);
                        break;
                    case '"kode_pos"':						
                        $stmt->bindValue($identifier, $this->kode_pos, PDO::PARAM_STR);
                        break;
                    case '"lintang"':						
                        $stmt->bindValue($identifier, $this->lintang, PDO::PARAM_STR);
                        break;
                    case '"bujur"':						
                        $stmt->bindValue($identifier, $this->bujur, PDO::PARAM_STR);
                        break;
                    case '"tgl_mutasi_keluar"':						
                        $stmt->bindValue($identifier, $this->tgl_mutasi_keluar, PDO::PARAM_STR);
                        break;
                    case '"batas"':						
                        $stmt->bindValue($identifier, $this->batas, PDO::PARAM_STR);
                        break;
                    case '"ket_tanah"':						
                        $stmt->bindValue($identifier, $this->ket_tanah, PDO::PARAM_STR);
                        break;
                    case '"luas"':						
                        $stmt->bindValue($identifier, $this->luas, PDO::PARAM_STR);
                        break;
                    case '"luas_lahan_tersedia"':						
                        $stmt->bindValue($identifier, $this->luas_lahan_tersedia, PDO::PARAM_STR);
                        break;
                    case '"no_sertifikat_tanah"':						
                        $stmt->bindValue($identifier, $this->no_sertifikat_tanah, PDO::PARAM_STR);
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

            if ($this->aJenisHapusBuku !== null) {
                if (!$this->aJenisHapusBuku->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aJenisHapusBuku->getValidationFailures());
                }
            }

            if ($this->aJenisPrasarana !== null) {
                if (!$this->aJenisPrasarana->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aJenisPrasarana->getValidationFailures());
                }
            }

            if ($this->aSekolah !== null) {
                if (!$this->aSekolah->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aSekolah->getValidationFailures());
                }
            }

            if ($this->aStatusKepemilikanSarpras !== null) {
                if (!$this->aStatusKepemilikanSarpras->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aStatusKepemilikanSarpras->getValidationFailures());
                }
            }

            if ($this->aMstWilayah !== null) {
                if (!$this->aMstWilayah->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aMstWilayah->getValidationFailures());
                }
            }


            if (($retval = TanahPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collBangunans !== null) {
                    foreach ($this->collBangunans as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collTanahDariBlockgrants !== null) {
                    foreach ($this->collTanahDariBlockgrants as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collTanahLongitudinals !== null) {
                    foreach ($this->collTanahLongitudinals as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collVldTanahs !== null) {
                    foreach ($this->collVldTanahs as $referrerFK) {
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
        $pos = TanahPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdTanah();
                break;
            case 1:
                return $this->getJenisPrasaranaId();
                break;
            case 2:
                return $this->getSekolahId();
                break;
            case 3:
                return $this->getIdHapusBuku();
                break;
            case 4:
                return $this->getKepemilikanSarprasId();
                break;
            case 5:
                return $this->getKdKl();
                break;
            case 6:
                return $this->getKdSatker();
                break;
            case 7:
                return $this->getKdBrg();
                break;
            case 8:
                return $this->getNup();
                break;
            case 9:
                return $this->getKodeEselon1();
                break;
            case 10:
                return $this->getNamaEselon1();
                break;
            case 11:
                return $this->getKodeSubSatker();
                break;
            case 12:
                return $this->getNamaSubSatker();
                break;
            case 13:
                return $this->getNama();
                break;
            case 14:
                return $this->getPanjang();
                break;
            case 15:
                return $this->getLebar();
                break;
            case 16:
                return $this->getNilaiPerolehanAset();
                break;
            case 17:
                return $this->getKodeWilayah();
                break;
            case 18:
                return $this->getAlamatJalan();
                break;
            case 19:
                return $this->getRt();
                break;
            case 20:
                return $this->getRw();
                break;
            case 21:
                return $this->getNamaDusun();
                break;
            case 22:
                return $this->getDesaKelurahan();
                break;
            case 23:
                return $this->getKodePos();
                break;
            case 24:
                return $this->getLintang();
                break;
            case 25:
                return $this->getBujur();
                break;
            case 26:
                return $this->getTglMutasiKeluar();
                break;
            case 27:
                return $this->getBatas();
                break;
            case 28:
                return $this->getKetTanah();
                break;
            case 29:
                return $this->getLuas();
                break;
            case 30:
                return $this->getLuasLahanTersedia();
                break;
            case 31:
                return $this->getNoSertifikatTanah();
                break;
            case 32:
                return $this->getAsalData();
                break;
            case 33:
                return $this->getCreateDate();
                break;
            case 34:
                return $this->getLastUpdate();
                break;
            case 35:
                return $this->getSoftDelete();
                break;
            case 36:
                return $this->getLastSync();
                break;
            case 37:
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
        if (isset($alreadyDumpedObjects['Tanah'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Tanah'][$this->getPrimaryKey()] = true;
        $keys = TanahPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdTanah(),
            $keys[1] => $this->getJenisPrasaranaId(),
            $keys[2] => $this->getSekolahId(),
            $keys[3] => $this->getIdHapusBuku(),
            $keys[4] => $this->getKepemilikanSarprasId(),
            $keys[5] => $this->getKdKl(),
            $keys[6] => $this->getKdSatker(),
            $keys[7] => $this->getKdBrg(),
            $keys[8] => $this->getNup(),
            $keys[9] => $this->getKodeEselon1(),
            $keys[10] => $this->getNamaEselon1(),
            $keys[11] => $this->getKodeSubSatker(),
            $keys[12] => $this->getNamaSubSatker(),
            $keys[13] => $this->getNama(),
            $keys[14] => $this->getPanjang(),
            $keys[15] => $this->getLebar(),
            $keys[16] => $this->getNilaiPerolehanAset(),
            $keys[17] => $this->getKodeWilayah(),
            $keys[18] => $this->getAlamatJalan(),
            $keys[19] => $this->getRt(),
            $keys[20] => $this->getRw(),
            $keys[21] => $this->getNamaDusun(),
            $keys[22] => $this->getDesaKelurahan(),
            $keys[23] => $this->getKodePos(),
            $keys[24] => $this->getLintang(),
            $keys[25] => $this->getBujur(),
            $keys[26] => $this->getTglMutasiKeluar(),
            $keys[27] => $this->getBatas(),
            $keys[28] => $this->getKetTanah(),
            $keys[29] => $this->getLuas(),
            $keys[30] => $this->getLuasLahanTersedia(),
            $keys[31] => $this->getNoSertifikatTanah(),
            $keys[32] => $this->getAsalData(),
            $keys[33] => $this->getCreateDate(),
            $keys[34] => $this->getLastUpdate(),
            $keys[35] => $this->getSoftDelete(),
            $keys[36] => $this->getLastSync(),
            $keys[37] => $this->getUpdaterId(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aJenisHapusBuku) {
                $result['JenisHapusBuku'] = $this->aJenisHapusBuku->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aJenisPrasarana) {
                $result['JenisPrasarana'] = $this->aJenisPrasarana->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aSekolah) {
                $result['Sekolah'] = $this->aSekolah->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aStatusKepemilikanSarpras) {
                $result['StatusKepemilikanSarpras'] = $this->aStatusKepemilikanSarpras->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aMstWilayah) {
                $result['MstWilayah'] = $this->aMstWilayah->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collBangunans) {
                $result['Bangunans'] = $this->collBangunans->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collTanahDariBlockgrants) {
                $result['TanahDariBlockgrants'] = $this->collTanahDariBlockgrants->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collTanahLongitudinals) {
                $result['TanahLongitudinals'] = $this->collTanahLongitudinals->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collVldTanahs) {
                $result['VldTanahs'] = $this->collVldTanahs->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = TanahPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdTanah($value);
                break;
            case 1:
                $this->setJenisPrasaranaId($value);
                break;
            case 2:
                $this->setSekolahId($value);
                break;
            case 3:
                $this->setIdHapusBuku($value);
                break;
            case 4:
                $this->setKepemilikanSarprasId($value);
                break;
            case 5:
                $this->setKdKl($value);
                break;
            case 6:
                $this->setKdSatker($value);
                break;
            case 7:
                $this->setKdBrg($value);
                break;
            case 8:
                $this->setNup($value);
                break;
            case 9:
                $this->setKodeEselon1($value);
                break;
            case 10:
                $this->setNamaEselon1($value);
                break;
            case 11:
                $this->setKodeSubSatker($value);
                break;
            case 12:
                $this->setNamaSubSatker($value);
                break;
            case 13:
                $this->setNama($value);
                break;
            case 14:
                $this->setPanjang($value);
                break;
            case 15:
                $this->setLebar($value);
                break;
            case 16:
                $this->setNilaiPerolehanAset($value);
                break;
            case 17:
                $this->setKodeWilayah($value);
                break;
            case 18:
                $this->setAlamatJalan($value);
                break;
            case 19:
                $this->setRt($value);
                break;
            case 20:
                $this->setRw($value);
                break;
            case 21:
                $this->setNamaDusun($value);
                break;
            case 22:
                $this->setDesaKelurahan($value);
                break;
            case 23:
                $this->setKodePos($value);
                break;
            case 24:
                $this->setLintang($value);
                break;
            case 25:
                $this->setBujur($value);
                break;
            case 26:
                $this->setTglMutasiKeluar($value);
                break;
            case 27:
                $this->setBatas($value);
                break;
            case 28:
                $this->setKetTanah($value);
                break;
            case 29:
                $this->setLuas($value);
                break;
            case 30:
                $this->setLuasLahanTersedia($value);
                break;
            case 31:
                $this->setNoSertifikatTanah($value);
                break;
            case 32:
                $this->setAsalData($value);
                break;
            case 33:
                $this->setCreateDate($value);
                break;
            case 34:
                $this->setLastUpdate($value);
                break;
            case 35:
                $this->setSoftDelete($value);
                break;
            case 36:
                $this->setLastSync($value);
                break;
            case 37:
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
        $keys = TanahPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdTanah($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setJenisPrasaranaId($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setSekolahId($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setIdHapusBuku($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setKepemilikanSarprasId($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setKdKl($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setKdSatker($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setKdBrg($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setNup($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setKodeEselon1($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setNamaEselon1($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setKodeSubSatker($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setNamaSubSatker($arr[$keys[12]]);
        if (array_key_exists($keys[13], $arr)) $this->setNama($arr[$keys[13]]);
        if (array_key_exists($keys[14], $arr)) $this->setPanjang($arr[$keys[14]]);
        if (array_key_exists($keys[15], $arr)) $this->setLebar($arr[$keys[15]]);
        if (array_key_exists($keys[16], $arr)) $this->setNilaiPerolehanAset($arr[$keys[16]]);
        if (array_key_exists($keys[17], $arr)) $this->setKodeWilayah($arr[$keys[17]]);
        if (array_key_exists($keys[18], $arr)) $this->setAlamatJalan($arr[$keys[18]]);
        if (array_key_exists($keys[19], $arr)) $this->setRt($arr[$keys[19]]);
        if (array_key_exists($keys[20], $arr)) $this->setRw($arr[$keys[20]]);
        if (array_key_exists($keys[21], $arr)) $this->setNamaDusun($arr[$keys[21]]);
        if (array_key_exists($keys[22], $arr)) $this->setDesaKelurahan($arr[$keys[22]]);
        if (array_key_exists($keys[23], $arr)) $this->setKodePos($arr[$keys[23]]);
        if (array_key_exists($keys[24], $arr)) $this->setLintang($arr[$keys[24]]);
        if (array_key_exists($keys[25], $arr)) $this->setBujur($arr[$keys[25]]);
        if (array_key_exists($keys[26], $arr)) $this->setTglMutasiKeluar($arr[$keys[26]]);
        if (array_key_exists($keys[27], $arr)) $this->setBatas($arr[$keys[27]]);
        if (array_key_exists($keys[28], $arr)) $this->setKetTanah($arr[$keys[28]]);
        if (array_key_exists($keys[29], $arr)) $this->setLuas($arr[$keys[29]]);
        if (array_key_exists($keys[30], $arr)) $this->setLuasLahanTersedia($arr[$keys[30]]);
        if (array_key_exists($keys[31], $arr)) $this->setNoSertifikatTanah($arr[$keys[31]]);
        if (array_key_exists($keys[32], $arr)) $this->setAsalData($arr[$keys[32]]);
        if (array_key_exists($keys[33], $arr)) $this->setCreateDate($arr[$keys[33]]);
        if (array_key_exists($keys[34], $arr)) $this->setLastUpdate($arr[$keys[34]]);
        if (array_key_exists($keys[35], $arr)) $this->setSoftDelete($arr[$keys[35]]);
        if (array_key_exists($keys[36], $arr)) $this->setLastSync($arr[$keys[36]]);
        if (array_key_exists($keys[37], $arr)) $this->setUpdaterId($arr[$keys[37]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(TanahPeer::DATABASE_NAME);

        if ($this->isColumnModified(TanahPeer::ID_TANAH)) $criteria->add(TanahPeer::ID_TANAH, $this->id_tanah);
        if ($this->isColumnModified(TanahPeer::JENIS_PRASARANA_ID)) $criteria->add(TanahPeer::JENIS_PRASARANA_ID, $this->jenis_prasarana_id);
        if ($this->isColumnModified(TanahPeer::SEKOLAH_ID)) $criteria->add(TanahPeer::SEKOLAH_ID, $this->sekolah_id);
        if ($this->isColumnModified(TanahPeer::ID_HAPUS_BUKU)) $criteria->add(TanahPeer::ID_HAPUS_BUKU, $this->id_hapus_buku);
        if ($this->isColumnModified(TanahPeer::KEPEMILIKAN_SARPRAS_ID)) $criteria->add(TanahPeer::KEPEMILIKAN_SARPRAS_ID, $this->kepemilikan_sarpras_id);
        if ($this->isColumnModified(TanahPeer::KD_KL)) $criteria->add(TanahPeer::KD_KL, $this->kd_kl);
        if ($this->isColumnModified(TanahPeer::KD_SATKER)) $criteria->add(TanahPeer::KD_SATKER, $this->kd_satker);
        if ($this->isColumnModified(TanahPeer::KD_BRG)) $criteria->add(TanahPeer::KD_BRG, $this->kd_brg);
        if ($this->isColumnModified(TanahPeer::NUP)) $criteria->add(TanahPeer::NUP, $this->nup);
        if ($this->isColumnModified(TanahPeer::KODE_ESELON1)) $criteria->add(TanahPeer::KODE_ESELON1, $this->kode_eselon1);
        if ($this->isColumnModified(TanahPeer::NAMA_ESELON1)) $criteria->add(TanahPeer::NAMA_ESELON1, $this->nama_eselon1);
        if ($this->isColumnModified(TanahPeer::KODE_SUB_SATKER)) $criteria->add(TanahPeer::KODE_SUB_SATKER, $this->kode_sub_satker);
        if ($this->isColumnModified(TanahPeer::NAMA_SUB_SATKER)) $criteria->add(TanahPeer::NAMA_SUB_SATKER, $this->nama_sub_satker);
        if ($this->isColumnModified(TanahPeer::NAMA)) $criteria->add(TanahPeer::NAMA, $this->nama);
        if ($this->isColumnModified(TanahPeer::PANJANG)) $criteria->add(TanahPeer::PANJANG, $this->panjang);
        if ($this->isColumnModified(TanahPeer::LEBAR)) $criteria->add(TanahPeer::LEBAR, $this->lebar);
        if ($this->isColumnModified(TanahPeer::NILAI_PEROLEHAN_ASET)) $criteria->add(TanahPeer::NILAI_PEROLEHAN_ASET, $this->nilai_perolehan_aset);
        if ($this->isColumnModified(TanahPeer::KODE_WILAYAH)) $criteria->add(TanahPeer::KODE_WILAYAH, $this->kode_wilayah);
        if ($this->isColumnModified(TanahPeer::ALAMAT_JALAN)) $criteria->add(TanahPeer::ALAMAT_JALAN, $this->alamat_jalan);
        if ($this->isColumnModified(TanahPeer::RT)) $criteria->add(TanahPeer::RT, $this->rt);
        if ($this->isColumnModified(TanahPeer::RW)) $criteria->add(TanahPeer::RW, $this->rw);
        if ($this->isColumnModified(TanahPeer::NAMA_DUSUN)) $criteria->add(TanahPeer::NAMA_DUSUN, $this->nama_dusun);
        if ($this->isColumnModified(TanahPeer::DESA_KELURAHAN)) $criteria->add(TanahPeer::DESA_KELURAHAN, $this->desa_kelurahan);
        if ($this->isColumnModified(TanahPeer::KODE_POS)) $criteria->add(TanahPeer::KODE_POS, $this->kode_pos);
        if ($this->isColumnModified(TanahPeer::LINTANG)) $criteria->add(TanahPeer::LINTANG, $this->lintang);
        if ($this->isColumnModified(TanahPeer::BUJUR)) $criteria->add(TanahPeer::BUJUR, $this->bujur);
        if ($this->isColumnModified(TanahPeer::TGL_MUTASI_KELUAR)) $criteria->add(TanahPeer::TGL_MUTASI_KELUAR, $this->tgl_mutasi_keluar);
        if ($this->isColumnModified(TanahPeer::BATAS)) $criteria->add(TanahPeer::BATAS, $this->batas);
        if ($this->isColumnModified(TanahPeer::KET_TANAH)) $criteria->add(TanahPeer::KET_TANAH, $this->ket_tanah);
        if ($this->isColumnModified(TanahPeer::LUAS)) $criteria->add(TanahPeer::LUAS, $this->luas);
        if ($this->isColumnModified(TanahPeer::LUAS_LAHAN_TERSEDIA)) $criteria->add(TanahPeer::LUAS_LAHAN_TERSEDIA, $this->luas_lahan_tersedia);
        if ($this->isColumnModified(TanahPeer::NO_SERTIFIKAT_TANAH)) $criteria->add(TanahPeer::NO_SERTIFIKAT_TANAH, $this->no_sertifikat_tanah);
        if ($this->isColumnModified(TanahPeer::ASAL_DATA)) $criteria->add(TanahPeer::ASAL_DATA, $this->asal_data);
        if ($this->isColumnModified(TanahPeer::CREATE_DATE)) $criteria->add(TanahPeer::CREATE_DATE, $this->create_date);
        if ($this->isColumnModified(TanahPeer::LAST_UPDATE)) $criteria->add(TanahPeer::LAST_UPDATE, $this->last_update);
        if ($this->isColumnModified(TanahPeer::SOFT_DELETE)) $criteria->add(TanahPeer::SOFT_DELETE, $this->soft_delete);
        if ($this->isColumnModified(TanahPeer::LAST_SYNC)) $criteria->add(TanahPeer::LAST_SYNC, $this->last_sync);
        if ($this->isColumnModified(TanahPeer::UPDATER_ID)) $criteria->add(TanahPeer::UPDATER_ID, $this->updater_id);

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
        $criteria = new Criteria(TanahPeer::DATABASE_NAME);
        $criteria->add(TanahPeer::ID_TANAH, $this->id_tanah);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return string
     */
    public function getPrimaryKey()
    {
        return $this->getIdTanah();
    }

    /**
     * Generic method to set the primary key (id_tanah column).
     *
     * @param  string $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdTanah($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdTanah();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of Tanah (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setJenisPrasaranaId($this->getJenisPrasaranaId());
        $copyObj->setSekolahId($this->getSekolahId());
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
        $copyObj->setPanjang($this->getPanjang());
        $copyObj->setLebar($this->getLebar());
        $copyObj->setNilaiPerolehanAset($this->getNilaiPerolehanAset());
        $copyObj->setKodeWilayah($this->getKodeWilayah());
        $copyObj->setAlamatJalan($this->getAlamatJalan());
        $copyObj->setRt($this->getRt());
        $copyObj->setRw($this->getRw());
        $copyObj->setNamaDusun($this->getNamaDusun());
        $copyObj->setDesaKelurahan($this->getDesaKelurahan());
        $copyObj->setKodePos($this->getKodePos());
        $copyObj->setLintang($this->getLintang());
        $copyObj->setBujur($this->getBujur());
        $copyObj->setTglMutasiKeluar($this->getTglMutasiKeluar());
        $copyObj->setBatas($this->getBatas());
        $copyObj->setKetTanah($this->getKetTanah());
        $copyObj->setLuas($this->getLuas());
        $copyObj->setLuasLahanTersedia($this->getLuasLahanTersedia());
        $copyObj->setNoSertifikatTanah($this->getNoSertifikatTanah());
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

            foreach ($this->getBangunans() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addBangunan($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getTanahDariBlockgrants() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addTanahDariBlockgrant($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getTanahLongitudinals() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addTanahLongitudinal($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getVldTanahs() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addVldTanah($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdTanah(NULL); // this is a auto-increment column, so set to default value
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
     * @return Tanah Clone of current object.
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
     * @return TanahPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new TanahPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a JenisHapusBuku object.
     *
     * @param             JenisHapusBuku $v
     * @return Tanah The current object (for fluent API support)
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
            $v->addTanah($this);
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
                $this->aJenisHapusBuku->addTanahs($this);
             */
        }

        return $this->aJenisHapusBuku;
    }

    /**
     * Declares an association between this object and a JenisPrasarana object.
     *
     * @param             JenisPrasarana $v
     * @return Tanah The current object (for fluent API support)
     * @throws PropelException
     */
    public function setJenisPrasarana(JenisPrasarana $v = null)
    {
        if ($v === null) {
            $this->setJenisPrasaranaId(NULL);
        } else {
            $this->setJenisPrasaranaId($v->getJenisPrasaranaId());
        }

        $this->aJenisPrasarana = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the JenisPrasarana object, it will not be re-added.
        if ($v !== null) {
            $v->addTanah($this);
        }


        return $this;
    }


    /**
     * Get the associated JenisPrasarana object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return JenisPrasarana The associated JenisPrasarana object.
     * @throws PropelException
     */
    public function getJenisPrasarana(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aJenisPrasarana === null && ($this->jenis_prasarana_id !== null) && $doQuery) {
            $this->aJenisPrasarana = JenisPrasaranaQuery::create()->findPk($this->jenis_prasarana_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aJenisPrasarana->addTanahs($this);
             */
        }

        return $this->aJenisPrasarana;
    }

    /**
     * Declares an association between this object and a Sekolah object.
     *
     * @param             Sekolah $v
     * @return Tanah The current object (for fluent API support)
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
            $v->addTanah($this);
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
                $this->aSekolah->addTanahs($this);
             */
        }

        return $this->aSekolah;
    }

    /**
     * Declares an association between this object and a StatusKepemilikanSarpras object.
     *
     * @param             StatusKepemilikanSarpras $v
     * @return Tanah The current object (for fluent API support)
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
            $v->addTanah($this);
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
                $this->aStatusKepemilikanSarpras->addTanahs($this);
             */
        }

        return $this->aStatusKepemilikanSarpras;
    }

    /**
     * Declares an association between this object and a MstWilayah object.
     *
     * @param             MstWilayah $v
     * @return Tanah The current object (for fluent API support)
     * @throws PropelException
     */
    public function setMstWilayah(MstWilayah $v = null)
    {
        if ($v === null) {
            $this->setKodeWilayah(NULL);
        } else {
            $this->setKodeWilayah($v->getKodeWilayah());
        }

        $this->aMstWilayah = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the MstWilayah object, it will not be re-added.
        if ($v !== null) {
            $v->addTanah($this);
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
    public function getMstWilayah(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aMstWilayah === null && (($this->kode_wilayah !== "" && $this->kode_wilayah !== null)) && $doQuery) {
            $this->aMstWilayah = MstWilayahQuery::create()->findPk($this->kode_wilayah, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aMstWilayah->addTanahs($this);
             */
        }

        return $this->aMstWilayah;
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
        if ('Bangunan' == $relationName) {
            $this->initBangunans();
        }
        if ('TanahDariBlockgrant' == $relationName) {
            $this->initTanahDariBlockgrants();
        }
        if ('TanahLongitudinal' == $relationName) {
            $this->initTanahLongitudinals();
        }
        if ('VldTanah' == $relationName) {
            $this->initVldTanahs();
        }
    }

    /**
     * Clears out the collBangunans collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Tanah The current object (for fluent API support)
     * @see        addBangunans()
     */
    public function clearBangunans()
    {
        $this->collBangunans = null; // important to set this to null since that means it is uninitialized
        $this->collBangunansPartial = null;

        return $this;
    }

    /**
     * reset is the collBangunans collection loaded partially
     *
     * @return void
     */
    public function resetPartialBangunans($v = true)
    {
        $this->collBangunansPartial = $v;
    }

    /**
     * Initializes the collBangunans collection.
     *
     * By default this just sets the collBangunans collection to an empty array (like clearcollBangunans());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initBangunans($overrideExisting = true)
    {
        if (null !== $this->collBangunans && !$overrideExisting) {
            return;
        }
        $this->collBangunans = new PropelObjectCollection();
        $this->collBangunans->setModel('Bangunan');
    }

    /**
     * Gets an array of Bangunan objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Tanah is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Bangunan[] List of Bangunan objects
     * @throws PropelException
     */
    public function getBangunans($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collBangunansPartial && !$this->isNew();
        if (null === $this->collBangunans || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collBangunans) {
                // return empty collection
                $this->initBangunans();
            } else {
                $collBangunans = BangunanQuery::create(null, $criteria)
                    ->filterByTanah($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collBangunansPartial && count($collBangunans)) {
                      $this->initBangunans(false);

                      foreach($collBangunans as $obj) {
                        if (false == $this->collBangunans->contains($obj)) {
                          $this->collBangunans->append($obj);
                        }
                      }

                      $this->collBangunansPartial = true;
                    }

                    $collBangunans->getInternalIterator()->rewind();
                    return $collBangunans;
                }

                if($partial && $this->collBangunans) {
                    foreach($this->collBangunans as $obj) {
                        if($obj->isNew()) {
                            $collBangunans[] = $obj;
                        }
                    }
                }

                $this->collBangunans = $collBangunans;
                $this->collBangunansPartial = false;
            }
        }

        return $this->collBangunans;
    }

    /**
     * Sets a collection of Bangunan objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $bangunans A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Tanah The current object (for fluent API support)
     */
    public function setBangunans(PropelCollection $bangunans, PropelPDO $con = null)
    {
        $bangunansToDelete = $this->getBangunans(new Criteria(), $con)->diff($bangunans);

        $this->bangunansScheduledForDeletion = unserialize(serialize($bangunansToDelete));

        foreach ($bangunansToDelete as $bangunanRemoved) {
            $bangunanRemoved->setTanah(null);
        }

        $this->collBangunans = null;
        foreach ($bangunans as $bangunan) {
            $this->addBangunan($bangunan);
        }

        $this->collBangunans = $bangunans;
        $this->collBangunansPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Bangunan objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Bangunan objects.
     * @throws PropelException
     */
    public function countBangunans(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collBangunansPartial && !$this->isNew();
        if (null === $this->collBangunans || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collBangunans) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getBangunans());
            }
            $query = BangunanQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByTanah($this)
                ->count($con);
        }

        return count($this->collBangunans);
    }

    /**
     * Method called to associate a Bangunan object to this object
     * through the Bangunan foreign key attribute.
     *
     * @param    Bangunan $l Bangunan
     * @return Tanah The current object (for fluent API support)
     */
    public function addBangunan(Bangunan $l)
    {
        if ($this->collBangunans === null) {
            $this->initBangunans();
            $this->collBangunansPartial = true;
        }
        if (!in_array($l, $this->collBangunans->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddBangunan($l);
        }

        return $this;
    }

    /**
     * @param	Bangunan $bangunan The bangunan object to add.
     */
    protected function doAddBangunan($bangunan)
    {
        $this->collBangunans[]= $bangunan;
        $bangunan->setTanah($this);
    }

    /**
     * @param	Bangunan $bangunan The bangunan object to remove.
     * @return Tanah The current object (for fluent API support)
     */
    public function removeBangunan($bangunan)
    {
        if ($this->getBangunans()->contains($bangunan)) {
            $this->collBangunans->remove($this->collBangunans->search($bangunan));
            if (null === $this->bangunansScheduledForDeletion) {
                $this->bangunansScheduledForDeletion = clone $this->collBangunans;
                $this->bangunansScheduledForDeletion->clear();
            }
            $this->bangunansScheduledForDeletion[]= $bangunan;
            $bangunan->setTanah(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Tanah is new, it will return
     * an empty collection; or if this Tanah has previously
     * been saved, it will retrieve related Bangunans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Tanah.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Bangunan[] List of Bangunan objects
     */
    public function getBangunansJoinPtk($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = BangunanQuery::create(null, $criteria);
        $query->joinWith('Ptk', $join_behavior);

        return $this->getBangunans($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Tanah is new, it will return
     * an empty collection; or if this Tanah has previously
     * been saved, it will retrieve related Bangunans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Tanah.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Bangunan[] List of Bangunan objects
     */
    public function getBangunansJoinJenisHapusBuku($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = BangunanQuery::create(null, $criteria);
        $query->joinWith('JenisHapusBuku', $join_behavior);

        return $this->getBangunans($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Tanah is new, it will return
     * an empty collection; or if this Tanah has previously
     * been saved, it will retrieve related Bangunans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Tanah.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Bangunan[] List of Bangunan objects
     */
    public function getBangunansJoinJenisPrasarana($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = BangunanQuery::create(null, $criteria);
        $query->joinWith('JenisPrasarana', $join_behavior);

        return $this->getBangunans($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Tanah is new, it will return
     * an empty collection; or if this Tanah has previously
     * been saved, it will retrieve related Bangunans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Tanah.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Bangunan[] List of Bangunan objects
     */
    public function getBangunansJoinSekolah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = BangunanQuery::create(null, $criteria);
        $query->joinWith('Sekolah', $join_behavior);

        return $this->getBangunans($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Tanah is new, it will return
     * an empty collection; or if this Tanah has previously
     * been saved, it will retrieve related Bangunans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Tanah.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Bangunan[] List of Bangunan objects
     */
    public function getBangunansJoinStatusKepemilikanSarpras($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = BangunanQuery::create(null, $criteria);
        $query->joinWith('StatusKepemilikanSarpras', $join_behavior);

        return $this->getBangunans($query, $con);
    }

    /**
     * Clears out the collTanahDariBlockgrants collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Tanah The current object (for fluent API support)
     * @see        addTanahDariBlockgrants()
     */
    public function clearTanahDariBlockgrants()
    {
        $this->collTanahDariBlockgrants = null; // important to set this to null since that means it is uninitialized
        $this->collTanahDariBlockgrantsPartial = null;

        return $this;
    }

    /**
     * reset is the collTanahDariBlockgrants collection loaded partially
     *
     * @return void
     */
    public function resetPartialTanahDariBlockgrants($v = true)
    {
        $this->collTanahDariBlockgrantsPartial = $v;
    }

    /**
     * Initializes the collTanahDariBlockgrants collection.
     *
     * By default this just sets the collTanahDariBlockgrants collection to an empty array (like clearcollTanahDariBlockgrants());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initTanahDariBlockgrants($overrideExisting = true)
    {
        if (null !== $this->collTanahDariBlockgrants && !$overrideExisting) {
            return;
        }
        $this->collTanahDariBlockgrants = new PropelObjectCollection();
        $this->collTanahDariBlockgrants->setModel('TanahDariBlockgrant');
    }

    /**
     * Gets an array of TanahDariBlockgrant objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Tanah is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|TanahDariBlockgrant[] List of TanahDariBlockgrant objects
     * @throws PropelException
     */
    public function getTanahDariBlockgrants($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collTanahDariBlockgrantsPartial && !$this->isNew();
        if (null === $this->collTanahDariBlockgrants || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collTanahDariBlockgrants) {
                // return empty collection
                $this->initTanahDariBlockgrants();
            } else {
                $collTanahDariBlockgrants = TanahDariBlockgrantQuery::create(null, $criteria)
                    ->filterByTanah($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collTanahDariBlockgrantsPartial && count($collTanahDariBlockgrants)) {
                      $this->initTanahDariBlockgrants(false);

                      foreach($collTanahDariBlockgrants as $obj) {
                        if (false == $this->collTanahDariBlockgrants->contains($obj)) {
                          $this->collTanahDariBlockgrants->append($obj);
                        }
                      }

                      $this->collTanahDariBlockgrantsPartial = true;
                    }

                    $collTanahDariBlockgrants->getInternalIterator()->rewind();
                    return $collTanahDariBlockgrants;
                }

                if($partial && $this->collTanahDariBlockgrants) {
                    foreach($this->collTanahDariBlockgrants as $obj) {
                        if($obj->isNew()) {
                            $collTanahDariBlockgrants[] = $obj;
                        }
                    }
                }

                $this->collTanahDariBlockgrants = $collTanahDariBlockgrants;
                $this->collTanahDariBlockgrantsPartial = false;
            }
        }

        return $this->collTanahDariBlockgrants;
    }

    /**
     * Sets a collection of TanahDariBlockgrant objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $tanahDariBlockgrants A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Tanah The current object (for fluent API support)
     */
    public function setTanahDariBlockgrants(PropelCollection $tanahDariBlockgrants, PropelPDO $con = null)
    {
        $tanahDariBlockgrantsToDelete = $this->getTanahDariBlockgrants(new Criteria(), $con)->diff($tanahDariBlockgrants);

        $this->tanahDariBlockgrantsScheduledForDeletion = unserialize(serialize($tanahDariBlockgrantsToDelete));

        foreach ($tanahDariBlockgrantsToDelete as $tanahDariBlockgrantRemoved) {
            $tanahDariBlockgrantRemoved->setTanah(null);
        }

        $this->collTanahDariBlockgrants = null;
        foreach ($tanahDariBlockgrants as $tanahDariBlockgrant) {
            $this->addTanahDariBlockgrant($tanahDariBlockgrant);
        }

        $this->collTanahDariBlockgrants = $tanahDariBlockgrants;
        $this->collTanahDariBlockgrantsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related TanahDariBlockgrant objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related TanahDariBlockgrant objects.
     * @throws PropelException
     */
    public function countTanahDariBlockgrants(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collTanahDariBlockgrantsPartial && !$this->isNew();
        if (null === $this->collTanahDariBlockgrants || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collTanahDariBlockgrants) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getTanahDariBlockgrants());
            }
            $query = TanahDariBlockgrantQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByTanah($this)
                ->count($con);
        }

        return count($this->collTanahDariBlockgrants);
    }

    /**
     * Method called to associate a TanahDariBlockgrant object to this object
     * through the TanahDariBlockgrant foreign key attribute.
     *
     * @param    TanahDariBlockgrant $l TanahDariBlockgrant
     * @return Tanah The current object (for fluent API support)
     */
    public function addTanahDariBlockgrant(TanahDariBlockgrant $l)
    {
        if ($this->collTanahDariBlockgrants === null) {
            $this->initTanahDariBlockgrants();
            $this->collTanahDariBlockgrantsPartial = true;
        }
        if (!in_array($l, $this->collTanahDariBlockgrants->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddTanahDariBlockgrant($l);
        }

        return $this;
    }

    /**
     * @param	TanahDariBlockgrant $tanahDariBlockgrant The tanahDariBlockgrant object to add.
     */
    protected function doAddTanahDariBlockgrant($tanahDariBlockgrant)
    {
        $this->collTanahDariBlockgrants[]= $tanahDariBlockgrant;
        $tanahDariBlockgrant->setTanah($this);
    }

    /**
     * @param	TanahDariBlockgrant $tanahDariBlockgrant The tanahDariBlockgrant object to remove.
     * @return Tanah The current object (for fluent API support)
     */
    public function removeTanahDariBlockgrant($tanahDariBlockgrant)
    {
        if ($this->getTanahDariBlockgrants()->contains($tanahDariBlockgrant)) {
            $this->collTanahDariBlockgrants->remove($this->collTanahDariBlockgrants->search($tanahDariBlockgrant));
            if (null === $this->tanahDariBlockgrantsScheduledForDeletion) {
                $this->tanahDariBlockgrantsScheduledForDeletion = clone $this->collTanahDariBlockgrants;
                $this->tanahDariBlockgrantsScheduledForDeletion->clear();
            }
            $this->tanahDariBlockgrantsScheduledForDeletion[]= clone $tanahDariBlockgrant;
            $tanahDariBlockgrant->setTanah(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Tanah is new, it will return
     * an empty collection; or if this Tanah has previously
     * been saved, it will retrieve related TanahDariBlockgrants from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Tanah.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|TanahDariBlockgrant[] List of TanahDariBlockgrant objects
     */
    public function getTanahDariBlockgrantsJoinBlockgrant($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TanahDariBlockgrantQuery::create(null, $criteria);
        $query->joinWith('Blockgrant', $join_behavior);

        return $this->getTanahDariBlockgrants($query, $con);
    }

    /**
     * Clears out the collTanahLongitudinals collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Tanah The current object (for fluent API support)
     * @see        addTanahLongitudinals()
     */
    public function clearTanahLongitudinals()
    {
        $this->collTanahLongitudinals = null; // important to set this to null since that means it is uninitialized
        $this->collTanahLongitudinalsPartial = null;

        return $this;
    }

    /**
     * reset is the collTanahLongitudinals collection loaded partially
     *
     * @return void
     */
    public function resetPartialTanahLongitudinals($v = true)
    {
        $this->collTanahLongitudinalsPartial = $v;
    }

    /**
     * Initializes the collTanahLongitudinals collection.
     *
     * By default this just sets the collTanahLongitudinals collection to an empty array (like clearcollTanahLongitudinals());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initTanahLongitudinals($overrideExisting = true)
    {
        if (null !== $this->collTanahLongitudinals && !$overrideExisting) {
            return;
        }
        $this->collTanahLongitudinals = new PropelObjectCollection();
        $this->collTanahLongitudinals->setModel('TanahLongitudinal');
    }

    /**
     * Gets an array of TanahLongitudinal objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Tanah is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|TanahLongitudinal[] List of TanahLongitudinal objects
     * @throws PropelException
     */
    public function getTanahLongitudinals($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collTanahLongitudinalsPartial && !$this->isNew();
        if (null === $this->collTanahLongitudinals || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collTanahLongitudinals) {
                // return empty collection
                $this->initTanahLongitudinals();
            } else {
                $collTanahLongitudinals = TanahLongitudinalQuery::create(null, $criteria)
                    ->filterByTanah($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collTanahLongitudinalsPartial && count($collTanahLongitudinals)) {
                      $this->initTanahLongitudinals(false);

                      foreach($collTanahLongitudinals as $obj) {
                        if (false == $this->collTanahLongitudinals->contains($obj)) {
                          $this->collTanahLongitudinals->append($obj);
                        }
                      }

                      $this->collTanahLongitudinalsPartial = true;
                    }

                    $collTanahLongitudinals->getInternalIterator()->rewind();
                    return $collTanahLongitudinals;
                }

                if($partial && $this->collTanahLongitudinals) {
                    foreach($this->collTanahLongitudinals as $obj) {
                        if($obj->isNew()) {
                            $collTanahLongitudinals[] = $obj;
                        }
                    }
                }

                $this->collTanahLongitudinals = $collTanahLongitudinals;
                $this->collTanahLongitudinalsPartial = false;
            }
        }

        return $this->collTanahLongitudinals;
    }

    /**
     * Sets a collection of TanahLongitudinal objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $tanahLongitudinals A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Tanah The current object (for fluent API support)
     */
    public function setTanahLongitudinals(PropelCollection $tanahLongitudinals, PropelPDO $con = null)
    {
        $tanahLongitudinalsToDelete = $this->getTanahLongitudinals(new Criteria(), $con)->diff($tanahLongitudinals);

        $this->tanahLongitudinalsScheduledForDeletion = unserialize(serialize($tanahLongitudinalsToDelete));

        foreach ($tanahLongitudinalsToDelete as $tanahLongitudinalRemoved) {
            $tanahLongitudinalRemoved->setTanah(null);
        }

        $this->collTanahLongitudinals = null;
        foreach ($tanahLongitudinals as $tanahLongitudinal) {
            $this->addTanahLongitudinal($tanahLongitudinal);
        }

        $this->collTanahLongitudinals = $tanahLongitudinals;
        $this->collTanahLongitudinalsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related TanahLongitudinal objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related TanahLongitudinal objects.
     * @throws PropelException
     */
    public function countTanahLongitudinals(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collTanahLongitudinalsPartial && !$this->isNew();
        if (null === $this->collTanahLongitudinals || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collTanahLongitudinals) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getTanahLongitudinals());
            }
            $query = TanahLongitudinalQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByTanah($this)
                ->count($con);
        }

        return count($this->collTanahLongitudinals);
    }

    /**
     * Method called to associate a TanahLongitudinal object to this object
     * through the TanahLongitudinal foreign key attribute.
     *
     * @param    TanahLongitudinal $l TanahLongitudinal
     * @return Tanah The current object (for fluent API support)
     */
    public function addTanahLongitudinal(TanahLongitudinal $l)
    {
        if ($this->collTanahLongitudinals === null) {
            $this->initTanahLongitudinals();
            $this->collTanahLongitudinalsPartial = true;
        }
        if (!in_array($l, $this->collTanahLongitudinals->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddTanahLongitudinal($l);
        }

        return $this;
    }

    /**
     * @param	TanahLongitudinal $tanahLongitudinal The tanahLongitudinal object to add.
     */
    protected function doAddTanahLongitudinal($tanahLongitudinal)
    {
        $this->collTanahLongitudinals[]= $tanahLongitudinal;
        $tanahLongitudinal->setTanah($this);
    }

    /**
     * @param	TanahLongitudinal $tanahLongitudinal The tanahLongitudinal object to remove.
     * @return Tanah The current object (for fluent API support)
     */
    public function removeTanahLongitudinal($tanahLongitudinal)
    {
        if ($this->getTanahLongitudinals()->contains($tanahLongitudinal)) {
            $this->collTanahLongitudinals->remove($this->collTanahLongitudinals->search($tanahLongitudinal));
            if (null === $this->tanahLongitudinalsScheduledForDeletion) {
                $this->tanahLongitudinalsScheduledForDeletion = clone $this->collTanahLongitudinals;
                $this->tanahLongitudinalsScheduledForDeletion->clear();
            }
            $this->tanahLongitudinalsScheduledForDeletion[]= clone $tanahLongitudinal;
            $tanahLongitudinal->setTanah(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Tanah is new, it will return
     * an empty collection; or if this Tanah has previously
     * been saved, it will retrieve related TanahLongitudinals from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Tanah.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|TanahLongitudinal[] List of TanahLongitudinal objects
     */
    public function getTanahLongitudinalsJoinTahunAjaran($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TanahLongitudinalQuery::create(null, $criteria);
        $query->joinWith('TahunAjaran', $join_behavior);

        return $this->getTanahLongitudinals($query, $con);
    }

    /**
     * Clears out the collVldTanahs collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Tanah The current object (for fluent API support)
     * @see        addVldTanahs()
     */
    public function clearVldTanahs()
    {
        $this->collVldTanahs = null; // important to set this to null since that means it is uninitialized
        $this->collVldTanahsPartial = null;

        return $this;
    }

    /**
     * reset is the collVldTanahs collection loaded partially
     *
     * @return void
     */
    public function resetPartialVldTanahs($v = true)
    {
        $this->collVldTanahsPartial = $v;
    }

    /**
     * Initializes the collVldTanahs collection.
     *
     * By default this just sets the collVldTanahs collection to an empty array (like clearcollVldTanahs());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initVldTanahs($overrideExisting = true)
    {
        if (null !== $this->collVldTanahs && !$overrideExisting) {
            return;
        }
        $this->collVldTanahs = new PropelObjectCollection();
        $this->collVldTanahs->setModel('VldTanah');
    }

    /**
     * Gets an array of VldTanah objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Tanah is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|VldTanah[] List of VldTanah objects
     * @throws PropelException
     */
    public function getVldTanahs($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collVldTanahsPartial && !$this->isNew();
        if (null === $this->collVldTanahs || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collVldTanahs) {
                // return empty collection
                $this->initVldTanahs();
            } else {
                $collVldTanahs = VldTanahQuery::create(null, $criteria)
                    ->filterByTanah($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collVldTanahsPartial && count($collVldTanahs)) {
                      $this->initVldTanahs(false);

                      foreach($collVldTanahs as $obj) {
                        if (false == $this->collVldTanahs->contains($obj)) {
                          $this->collVldTanahs->append($obj);
                        }
                      }

                      $this->collVldTanahsPartial = true;
                    }

                    $collVldTanahs->getInternalIterator()->rewind();
                    return $collVldTanahs;
                }

                if($partial && $this->collVldTanahs) {
                    foreach($this->collVldTanahs as $obj) {
                        if($obj->isNew()) {
                            $collVldTanahs[] = $obj;
                        }
                    }
                }

                $this->collVldTanahs = $collVldTanahs;
                $this->collVldTanahsPartial = false;
            }
        }

        return $this->collVldTanahs;
    }

    /**
     * Sets a collection of VldTanah objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $vldTanahs A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Tanah The current object (for fluent API support)
     */
    public function setVldTanahs(PropelCollection $vldTanahs, PropelPDO $con = null)
    {
        $vldTanahsToDelete = $this->getVldTanahs(new Criteria(), $con)->diff($vldTanahs);

        $this->vldTanahsScheduledForDeletion = unserialize(serialize($vldTanahsToDelete));

        foreach ($vldTanahsToDelete as $vldTanahRemoved) {
            $vldTanahRemoved->setTanah(null);
        }

        $this->collVldTanahs = null;
        foreach ($vldTanahs as $vldTanah) {
            $this->addVldTanah($vldTanah);
        }

        $this->collVldTanahs = $vldTanahs;
        $this->collVldTanahsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related VldTanah objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related VldTanah objects.
     * @throws PropelException
     */
    public function countVldTanahs(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collVldTanahsPartial && !$this->isNew();
        if (null === $this->collVldTanahs || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collVldTanahs) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getVldTanahs());
            }
            $query = VldTanahQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByTanah($this)
                ->count($con);
        }

        return count($this->collVldTanahs);
    }

    /**
     * Method called to associate a VldTanah object to this object
     * through the VldTanah foreign key attribute.
     *
     * @param    VldTanah $l VldTanah
     * @return Tanah The current object (for fluent API support)
     */
    public function addVldTanah(VldTanah $l)
    {
        if ($this->collVldTanahs === null) {
            $this->initVldTanahs();
            $this->collVldTanahsPartial = true;
        }
        if (!in_array($l, $this->collVldTanahs->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddVldTanah($l);
        }

        return $this;
    }

    /**
     * @param	VldTanah $vldTanah The vldTanah object to add.
     */
    protected function doAddVldTanah($vldTanah)
    {
        $this->collVldTanahs[]= $vldTanah;
        $vldTanah->setTanah($this);
    }

    /**
     * @param	VldTanah $vldTanah The vldTanah object to remove.
     * @return Tanah The current object (for fluent API support)
     */
    public function removeVldTanah($vldTanah)
    {
        if ($this->getVldTanahs()->contains($vldTanah)) {
            $this->collVldTanahs->remove($this->collVldTanahs->search($vldTanah));
            if (null === $this->vldTanahsScheduledForDeletion) {
                $this->vldTanahsScheduledForDeletion = clone $this->collVldTanahs;
                $this->vldTanahsScheduledForDeletion->clear();
            }
            $this->vldTanahsScheduledForDeletion[]= clone $vldTanah;
            $vldTanah->setTanah(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Tanah is new, it will return
     * an empty collection; or if this Tanah has previously
     * been saved, it will retrieve related VldTanahs from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Tanah.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|VldTanah[] List of VldTanah objects
     */
    public function getVldTanahsJoinErrortype($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = VldTanahQuery::create(null, $criteria);
        $query->joinWith('Errortype', $join_behavior);

        return $this->getVldTanahs($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id_tanah = null;
        $this->jenis_prasarana_id = null;
        $this->sekolah_id = null;
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
        $this->panjang = null;
        $this->lebar = null;
        $this->nilai_perolehan_aset = null;
        $this->kode_wilayah = null;
        $this->alamat_jalan = null;
        $this->rt = null;
        $this->rw = null;
        $this->nama_dusun = null;
        $this->desa_kelurahan = null;
        $this->kode_pos = null;
        $this->lintang = null;
        $this->bujur = null;
        $this->tgl_mutasi_keluar = null;
        $this->batas = null;
        $this->ket_tanah = null;
        $this->luas = null;
        $this->luas_lahan_tersedia = null;
        $this->no_sertifikat_tanah = null;
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
            if ($this->collBangunans) {
                foreach ($this->collBangunans as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collTanahDariBlockgrants) {
                foreach ($this->collTanahDariBlockgrants as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collTanahLongitudinals) {
                foreach ($this->collTanahLongitudinals as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collVldTanahs) {
                foreach ($this->collVldTanahs as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aJenisHapusBuku instanceof Persistent) {
              $this->aJenisHapusBuku->clearAllReferences($deep);
            }
            if ($this->aJenisPrasarana instanceof Persistent) {
              $this->aJenisPrasarana->clearAllReferences($deep);
            }
            if ($this->aSekolah instanceof Persistent) {
              $this->aSekolah->clearAllReferences($deep);
            }
            if ($this->aStatusKepemilikanSarpras instanceof Persistent) {
              $this->aStatusKepemilikanSarpras->clearAllReferences($deep);
            }
            if ($this->aMstWilayah instanceof Persistent) {
              $this->aMstWilayah->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collBangunans instanceof PropelCollection) {
            $this->collBangunans->clearIterator();
        }
        $this->collBangunans = null;
        if ($this->collTanahDariBlockgrants instanceof PropelCollection) {
            $this->collTanahDariBlockgrants->clearIterator();
        }
        $this->collTanahDariBlockgrants = null;
        if ($this->collTanahLongitudinals instanceof PropelCollection) {
            $this->collTanahLongitudinals->clearIterator();
        }
        $this->collTanahLongitudinals = null;
        if ($this->collVldTanahs instanceof PropelCollection) {
            $this->collVldTanahs->clearIterator();
        }
        $this->collVldTanahs = null;
        $this->aJenisHapusBuku = null;
        $this->aJenisPrasarana = null;
        $this->aSekolah = null;
        $this->aStatusKepemilikanSarpras = null;
        $this->aMstWilayah = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(TanahPeer::DEFAULT_STRING_FORMAT);
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
