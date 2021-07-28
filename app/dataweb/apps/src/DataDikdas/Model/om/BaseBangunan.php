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
use DataDikdas\Model\BangunanDariBlockgrant;
use DataDikdas\Model\BangunanDariBlockgrantQuery;
use DataDikdas\Model\BangunanLongitudinal;
use DataDikdas\Model\BangunanLongitudinalQuery;
use DataDikdas\Model\BangunanPeer;
use DataDikdas\Model\BangunanQuery;
use DataDikdas\Model\JenisHapusBuku;
use DataDikdas\Model\JenisHapusBukuQuery;
use DataDikdas\Model\JenisPrasarana;
use DataDikdas\Model\JenisPrasaranaQuery;
use DataDikdas\Model\Ptk;
use DataDikdas\Model\PtkQuery;
use DataDikdas\Model\Ruang;
use DataDikdas\Model\RuangQuery;
use DataDikdas\Model\Sekolah;
use DataDikdas\Model\SekolahQuery;
use DataDikdas\Model\StatusKepemilikanSarpras;
use DataDikdas\Model\StatusKepemilikanSarprasQuery;
use DataDikdas\Model\Tanah;
use DataDikdas\Model\TanahQuery;
use DataDikdas\Model\VldBangunan;
use DataDikdas\Model\VldBangunanQuery;

/**
 * Base class that represents a row from the 'bangunan' table.
 *
 * 
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseBangunan extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'DataDikdas\\Model\\BangunanPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        BangunanPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the id_bangunan field.
     * @var        string
     */
    protected $id_bangunan;

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
     * The value for the id_tanah field.
     * @var        string
     */
    protected $id_tanah;

    /**
     * The value for the ptk_id field.
     * @var        string
     */
    protected $ptk_id;

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
     * The value for the jml_lantai field.
     * Note: this column has a database default value of: '1'
     * @var        string
     */
    protected $jml_lantai;

    /**
     * The value for the thn_dibangun field.
     * @var        string
     */
    protected $thn_dibangun;

    /**
     * The value for the luas_tapak_bangunan field.
     * @var        string
     */
    protected $luas_tapak_bangunan;

    /**
     * The value for the vol_pondasi_m3 field.
     * @var        string
     */
    protected $vol_pondasi_m3;

    /**
     * The value for the vol_sloop_kolom_balok_m3 field.
     * @var        string
     */
    protected $vol_sloop_kolom_balok_m3;

    /**
     * The value for the panj_kudakuda_m field.
     * @var        string
     */
    protected $panj_kudakuda_m;

    /**
     * The value for the vol_kudakuda_m3 field.
     * @var        string
     */
    protected $vol_kudakuda_m3;

    /**
     * The value for the panj_kaso_m field.
     * @var        string
     */
    protected $panj_kaso_m;

    /**
     * The value for the panj_reng_m field.
     * @var        string
     */
    protected $panj_reng_m;

    /**
     * The value for the luas_tutup_atap_m2 field.
     * @var        string
     */
    protected $luas_tutup_atap_m2;

    /**
     * The value for the kd_satker_tanah field.
     * @var        string
     */
    protected $kd_satker_tanah;

    /**
     * The value for the nm_satker_tanah field.
     * @var        string
     */
    protected $nm_satker_tanah;

    /**
     * The value for the kd_brg_tanah field.
     * @var        string
     */
    protected $kd_brg_tanah;

    /**
     * The value for the nm_brg_tanah field.
     * @var        string
     */
    protected $nm_brg_tanah;

    /**
     * The value for the nup_brg_tanah field.
     * @var        string
     */
    protected $nup_brg_tanah;

    /**
     * The value for the tgl_sk_pemakai field.
     * @var        string
     */
    protected $tgl_sk_pemakai;

    /**
     * The value for the tgl_hapus_buku field.
     * @var        string
     */
    protected $tgl_hapus_buku;

    /**
     * The value for the ket_bangunan field.
     * @var        string
     */
    protected $ket_bangunan;

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
     * @var        JenisHapusBuku
     */
    protected $aJenisHapusBuku;

    /**
     * @var        Tanah
     */
    protected $aTanah;

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
     * @var        PropelObjectCollection|BangunanDariBlockgrant[] Collection to store aggregation of BangunanDariBlockgrant objects.
     */
    protected $collBangunanDariBlockgrants;
    protected $collBangunanDariBlockgrantsPartial;

    /**
     * @var        PropelObjectCollection|BangunanLongitudinal[] Collection to store aggregation of BangunanLongitudinal objects.
     */
    protected $collBangunanLongitudinals;
    protected $collBangunanLongitudinalsPartial;

    /**
     * @var        PropelObjectCollection|Ruang[] Collection to store aggregation of Ruang objects.
     */
    protected $collRuangs;
    protected $collRuangsPartial;

    /**
     * @var        PropelObjectCollection|VldBangunan[] Collection to store aggregation of VldBangunan objects.
     */
    protected $collVldBangunans;
    protected $collVldBangunansPartial;

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
    protected $bangunanDariBlockgrantsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $bangunanLongitudinalsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $ruangsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $vldBangunansScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->jml_lantai = '1';
        $this->asal_data = '1';
        $this->last_sync = '1901-01-01 00:00:00';
    }

    /**
     * Initializes internal state of BaseBangunan object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [id_bangunan] column value.
     * 
     * @return string
     */
    public function getIdBangunan()
    {
        return $this->id_bangunan;
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
     * Get the [id_tanah] column value.
     * 
     * @return string
     */
    public function getIdTanah()
    {
        return $this->id_tanah;
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
     * Get the [jml_lantai] column value.
     * 
     * @return string
     */
    public function getJmlLantai()
    {
        return $this->jml_lantai;
    }

    /**
     * Get the [thn_dibangun] column value.
     * 
     * @return string
     */
    public function getThnDibangun()
    {
        return $this->thn_dibangun;
    }

    /**
     * Get the [luas_tapak_bangunan] column value.
     * 
     * @return string
     */
    public function getLuasTapakBangunan()
    {
        return $this->luas_tapak_bangunan;
    }

    /**
     * Get the [vol_pondasi_m3] column value.
     * 
     * @return string
     */
    public function getVolPondasiM3()
    {
        return $this->vol_pondasi_m3;
    }

    /**
     * Get the [vol_sloop_kolom_balok_m3] column value.
     * 
     * @return string
     */
    public function getVolSloopKolomBalokM3()
    {
        return $this->vol_sloop_kolom_balok_m3;
    }

    /**
     * Get the [panj_kudakuda_m] column value.
     * 
     * @return string
     */
    public function getPanjKudakudaM()
    {
        return $this->panj_kudakuda_m;
    }

    /**
     * Get the [vol_kudakuda_m3] column value.
     * 
     * @return string
     */
    public function getVolKudakudaM3()
    {
        return $this->vol_kudakuda_m3;
    }

    /**
     * Get the [panj_kaso_m] column value.
     * 
     * @return string
     */
    public function getPanjKasoM()
    {
        return $this->panj_kaso_m;
    }

    /**
     * Get the [panj_reng_m] column value.
     * 
     * @return string
     */
    public function getPanjRengM()
    {
        return $this->panj_reng_m;
    }

    /**
     * Get the [luas_tutup_atap_m2] column value.
     * 
     * @return string
     */
    public function getLuasTutupAtapM2()
    {
        return $this->luas_tutup_atap_m2;
    }

    /**
     * Get the [kd_satker_tanah] column value.
     * 
     * @return string
     */
    public function getKdSatkerTanah()
    {
        return $this->kd_satker_tanah;
    }

    /**
     * Get the [nm_satker_tanah] column value.
     * 
     * @return string
     */
    public function getNmSatkerTanah()
    {
        return $this->nm_satker_tanah;
    }

    /**
     * Get the [kd_brg_tanah] column value.
     * 
     * @return string
     */
    public function getKdBrgTanah()
    {
        return $this->kd_brg_tanah;
    }

    /**
     * Get the [nm_brg_tanah] column value.
     * 
     * @return string
     */
    public function getNmBrgTanah()
    {
        return $this->nm_brg_tanah;
    }

    /**
     * Get the [nup_brg_tanah] column value.
     * 
     * @return string
     */
    public function getNupBrgTanah()
    {
        return $this->nup_brg_tanah;
    }

    /**
     * Get the [optionally formatted] temporal [tgl_sk_pemakai] column value.
     * 
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getTglSkPemakai($format = '%Y-%m-%d')
    {
        if ($this->tgl_sk_pemakai === null) {
            return null;
        }


        try {
            $dt = new DateTime($this->tgl_sk_pemakai);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->tgl_sk_pemakai, true), $x);
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
     * Get the [ket_bangunan] column value.
     * 
     * @return string
     */
    public function getKetBangunan()
    {
        return $this->ket_bangunan;
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
     * Set the value of [id_bangunan] column.
     * 
     * @param string $v new value
     * @return Bangunan The current object (for fluent API support)
     */
    public function setIdBangunan($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->id_bangunan !== $v) {
            $this->id_bangunan = $v;
            $this->modifiedColumns[] = BangunanPeer::ID_BANGUNAN;
        }


        return $this;
    } // setIdBangunan()

    /**
     * Set the value of [jenis_prasarana_id] column.
     * 
     * @param int $v new value
     * @return Bangunan The current object (for fluent API support)
     */
    public function setJenisPrasaranaId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->jenis_prasarana_id !== $v) {
            $this->jenis_prasarana_id = $v;
            $this->modifiedColumns[] = BangunanPeer::JENIS_PRASARANA_ID;
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
     * @return Bangunan The current object (for fluent API support)
     */
    public function setSekolahId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->sekolah_id !== $v) {
            $this->sekolah_id = $v;
            $this->modifiedColumns[] = BangunanPeer::SEKOLAH_ID;
        }

        if ($this->aSekolah !== null && $this->aSekolah->getSekolahId() !== $v) {
            $this->aSekolah = null;
        }


        return $this;
    } // setSekolahId()

    /**
     * Set the value of [id_tanah] column.
     * 
     * @param string $v new value
     * @return Bangunan The current object (for fluent API support)
     */
    public function setIdTanah($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->id_tanah !== $v) {
            $this->id_tanah = $v;
            $this->modifiedColumns[] = BangunanPeer::ID_TANAH;
        }

        if ($this->aTanah !== null && $this->aTanah->getIdTanah() !== $v) {
            $this->aTanah = null;
        }


        return $this;
    } // setIdTanah()

    /**
     * Set the value of [ptk_id] column.
     * 
     * @param string $v new value
     * @return Bangunan The current object (for fluent API support)
     */
    public function setPtkId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->ptk_id !== $v) {
            $this->ptk_id = $v;
            $this->modifiedColumns[] = BangunanPeer::PTK_ID;
        }

        if ($this->aPtk !== null && $this->aPtk->getPtkId() !== $v) {
            $this->aPtk = null;
        }


        return $this;
    } // setPtkId()

    /**
     * Set the value of [id_hapus_buku] column.
     * 
     * @param string $v new value
     * @return Bangunan The current object (for fluent API support)
     */
    public function setIdHapusBuku($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->id_hapus_buku !== $v) {
            $this->id_hapus_buku = $v;
            $this->modifiedColumns[] = BangunanPeer::ID_HAPUS_BUKU;
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
     * @return Bangunan The current object (for fluent API support)
     */
    public function setKepemilikanSarprasId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->kepemilikan_sarpras_id !== $v) {
            $this->kepemilikan_sarpras_id = $v;
            $this->modifiedColumns[] = BangunanPeer::KEPEMILIKAN_SARPRAS_ID;
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
     * @return Bangunan The current object (for fluent API support)
     */
    public function setKdKl($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->kd_kl !== $v) {
            $this->kd_kl = $v;
            $this->modifiedColumns[] = BangunanPeer::KD_KL;
        }


        return $this;
    } // setKdKl()

    /**
     * Set the value of [kd_satker] column.
     * 
     * @param string $v new value
     * @return Bangunan The current object (for fluent API support)
     */
    public function setKdSatker($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->kd_satker !== $v) {
            $this->kd_satker = $v;
            $this->modifiedColumns[] = BangunanPeer::KD_SATKER;
        }


        return $this;
    } // setKdSatker()

    /**
     * Set the value of [kd_brg] column.
     * 
     * @param string $v new value
     * @return Bangunan The current object (for fluent API support)
     */
    public function setKdBrg($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->kd_brg !== $v) {
            $this->kd_brg = $v;
            $this->modifiedColumns[] = BangunanPeer::KD_BRG;
        }


        return $this;
    } // setKdBrg()

    /**
     * Set the value of [nup] column.
     * 
     * @param int $v new value
     * @return Bangunan The current object (for fluent API support)
     */
    public function setNup($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->nup !== $v) {
            $this->nup = $v;
            $this->modifiedColumns[] = BangunanPeer::NUP;
        }


        return $this;
    } // setNup()

    /**
     * Set the value of [kode_eselon1] column.
     * 
     * @param string $v new value
     * @return Bangunan The current object (for fluent API support)
     */
    public function setKodeEselon1($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->kode_eselon1 !== $v) {
            $this->kode_eselon1 = $v;
            $this->modifiedColumns[] = BangunanPeer::KODE_ESELON1;
        }


        return $this;
    } // setKodeEselon1()

    /**
     * Set the value of [nama_eselon1] column.
     * 
     * @param string $v new value
     * @return Bangunan The current object (for fluent API support)
     */
    public function setNamaEselon1($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nama_eselon1 !== $v) {
            $this->nama_eselon1 = $v;
            $this->modifiedColumns[] = BangunanPeer::NAMA_ESELON1;
        }


        return $this;
    } // setNamaEselon1()

    /**
     * Set the value of [kode_sub_satker] column.
     * 
     * @param string $v new value
     * @return Bangunan The current object (for fluent API support)
     */
    public function setKodeSubSatker($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->kode_sub_satker !== $v) {
            $this->kode_sub_satker = $v;
            $this->modifiedColumns[] = BangunanPeer::KODE_SUB_SATKER;
        }


        return $this;
    } // setKodeSubSatker()

    /**
     * Set the value of [nama_sub_satker] column.
     * 
     * @param string $v new value
     * @return Bangunan The current object (for fluent API support)
     */
    public function setNamaSubSatker($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nama_sub_satker !== $v) {
            $this->nama_sub_satker = $v;
            $this->modifiedColumns[] = BangunanPeer::NAMA_SUB_SATKER;
        }


        return $this;
    } // setNamaSubSatker()

    /**
     * Set the value of [nama] column.
     * 
     * @param string $v new value
     * @return Bangunan The current object (for fluent API support)
     */
    public function setNama($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nama !== $v) {
            $this->nama = $v;
            $this->modifiedColumns[] = BangunanPeer::NAMA;
        }


        return $this;
    } // setNama()

    /**
     * Set the value of [panjang] column.
     * 
     * @param double $v new value
     * @return Bangunan The current object (for fluent API support)
     */
    public function setPanjang($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (double) $v;
        }

        if ($this->panjang !== $v) {
            $this->panjang = $v;
            $this->modifiedColumns[] = BangunanPeer::PANJANG;
        }


        return $this;
    } // setPanjang()

    /**
     * Set the value of [lebar] column.
     * 
     * @param double $v new value
     * @return Bangunan The current object (for fluent API support)
     */
    public function setLebar($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (double) $v;
        }

        if ($this->lebar !== $v) {
            $this->lebar = $v;
            $this->modifiedColumns[] = BangunanPeer::LEBAR;
        }


        return $this;
    } // setLebar()

    /**
     * Set the value of [nilai_perolehan_aset] column.
     * 
     * @param string $v new value
     * @return Bangunan The current object (for fluent API support)
     */
    public function setNilaiPerolehanAset($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nilai_perolehan_aset !== $v) {
            $this->nilai_perolehan_aset = $v;
            $this->modifiedColumns[] = BangunanPeer::NILAI_PEROLEHAN_ASET;
        }


        return $this;
    } // setNilaiPerolehanAset()

    /**
     * Set the value of [jml_lantai] column.
     * 
     * @param string $v new value
     * @return Bangunan The current object (for fluent API support)
     */
    public function setJmlLantai($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->jml_lantai !== $v) {
            $this->jml_lantai = $v;
            $this->modifiedColumns[] = BangunanPeer::JML_LANTAI;
        }


        return $this;
    } // setJmlLantai()

    /**
     * Set the value of [thn_dibangun] column.
     * 
     * @param string $v new value
     * @return Bangunan The current object (for fluent API support)
     */
    public function setThnDibangun($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->thn_dibangun !== $v) {
            $this->thn_dibangun = $v;
            $this->modifiedColumns[] = BangunanPeer::THN_DIBANGUN;
        }


        return $this;
    } // setThnDibangun()

    /**
     * Set the value of [luas_tapak_bangunan] column.
     * 
     * @param string $v new value
     * @return Bangunan The current object (for fluent API support)
     */
    public function setLuasTapakBangunan($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->luas_tapak_bangunan !== $v) {
            $this->luas_tapak_bangunan = $v;
            $this->modifiedColumns[] = BangunanPeer::LUAS_TAPAK_BANGUNAN;
        }


        return $this;
    } // setLuasTapakBangunan()

    /**
     * Set the value of [vol_pondasi_m3] column.
     * 
     * @param string $v new value
     * @return Bangunan The current object (for fluent API support)
     */
    public function setVolPondasiM3($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->vol_pondasi_m3 !== $v) {
            $this->vol_pondasi_m3 = $v;
            $this->modifiedColumns[] = BangunanPeer::VOL_PONDASI_M3;
        }


        return $this;
    } // setVolPondasiM3()

    /**
     * Set the value of [vol_sloop_kolom_balok_m3] column.
     * 
     * @param string $v new value
     * @return Bangunan The current object (for fluent API support)
     */
    public function setVolSloopKolomBalokM3($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->vol_sloop_kolom_balok_m3 !== $v) {
            $this->vol_sloop_kolom_balok_m3 = $v;
            $this->modifiedColumns[] = BangunanPeer::VOL_SLOOP_KOLOM_BALOK_M3;
        }


        return $this;
    } // setVolSloopKolomBalokM3()

    /**
     * Set the value of [panj_kudakuda_m] column.
     * 
     * @param string $v new value
     * @return Bangunan The current object (for fluent API support)
     */
    public function setPanjKudakudaM($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->panj_kudakuda_m !== $v) {
            $this->panj_kudakuda_m = $v;
            $this->modifiedColumns[] = BangunanPeer::PANJ_KUDAKUDA_M;
        }


        return $this;
    } // setPanjKudakudaM()

    /**
     * Set the value of [vol_kudakuda_m3] column.
     * 
     * @param string $v new value
     * @return Bangunan The current object (for fluent API support)
     */
    public function setVolKudakudaM3($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->vol_kudakuda_m3 !== $v) {
            $this->vol_kudakuda_m3 = $v;
            $this->modifiedColumns[] = BangunanPeer::VOL_KUDAKUDA_M3;
        }


        return $this;
    } // setVolKudakudaM3()

    /**
     * Set the value of [panj_kaso_m] column.
     * 
     * @param string $v new value
     * @return Bangunan The current object (for fluent API support)
     */
    public function setPanjKasoM($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->panj_kaso_m !== $v) {
            $this->panj_kaso_m = $v;
            $this->modifiedColumns[] = BangunanPeer::PANJ_KASO_M;
        }


        return $this;
    } // setPanjKasoM()

    /**
     * Set the value of [panj_reng_m] column.
     * 
     * @param string $v new value
     * @return Bangunan The current object (for fluent API support)
     */
    public function setPanjRengM($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->panj_reng_m !== $v) {
            $this->panj_reng_m = $v;
            $this->modifiedColumns[] = BangunanPeer::PANJ_RENG_M;
        }


        return $this;
    } // setPanjRengM()

    /**
     * Set the value of [luas_tutup_atap_m2] column.
     * 
     * @param string $v new value
     * @return Bangunan The current object (for fluent API support)
     */
    public function setLuasTutupAtapM2($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->luas_tutup_atap_m2 !== $v) {
            $this->luas_tutup_atap_m2 = $v;
            $this->modifiedColumns[] = BangunanPeer::LUAS_TUTUP_ATAP_M2;
        }


        return $this;
    } // setLuasTutupAtapM2()

    /**
     * Set the value of [kd_satker_tanah] column.
     * 
     * @param string $v new value
     * @return Bangunan The current object (for fluent API support)
     */
    public function setKdSatkerTanah($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->kd_satker_tanah !== $v) {
            $this->kd_satker_tanah = $v;
            $this->modifiedColumns[] = BangunanPeer::KD_SATKER_TANAH;
        }


        return $this;
    } // setKdSatkerTanah()

    /**
     * Set the value of [nm_satker_tanah] column.
     * 
     * @param string $v new value
     * @return Bangunan The current object (for fluent API support)
     */
    public function setNmSatkerTanah($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nm_satker_tanah !== $v) {
            $this->nm_satker_tanah = $v;
            $this->modifiedColumns[] = BangunanPeer::NM_SATKER_TANAH;
        }


        return $this;
    } // setNmSatkerTanah()

    /**
     * Set the value of [kd_brg_tanah] column.
     * 
     * @param string $v new value
     * @return Bangunan The current object (for fluent API support)
     */
    public function setKdBrgTanah($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->kd_brg_tanah !== $v) {
            $this->kd_brg_tanah = $v;
            $this->modifiedColumns[] = BangunanPeer::KD_BRG_TANAH;
        }


        return $this;
    } // setKdBrgTanah()

    /**
     * Set the value of [nm_brg_tanah] column.
     * 
     * @param string $v new value
     * @return Bangunan The current object (for fluent API support)
     */
    public function setNmBrgTanah($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nm_brg_tanah !== $v) {
            $this->nm_brg_tanah = $v;
            $this->modifiedColumns[] = BangunanPeer::NM_BRG_TANAH;
        }


        return $this;
    } // setNmBrgTanah()

    /**
     * Set the value of [nup_brg_tanah] column.
     * 
     * @param string $v new value
     * @return Bangunan The current object (for fluent API support)
     */
    public function setNupBrgTanah($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nup_brg_tanah !== $v) {
            $this->nup_brg_tanah = $v;
            $this->modifiedColumns[] = BangunanPeer::NUP_BRG_TANAH;
        }


        return $this;
    } // setNupBrgTanah()

    /**
     * Sets the value of [tgl_sk_pemakai] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Bangunan The current object (for fluent API support)
     */
    public function setTglSkPemakai($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->tgl_sk_pemakai !== null || $dt !== null) {
            $currentDateAsString = ($this->tgl_sk_pemakai !== null && $tmpDt = new DateTime($this->tgl_sk_pemakai)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->tgl_sk_pemakai = $newDateAsString;
                $this->modifiedColumns[] = BangunanPeer::TGL_SK_PEMAKAI;
            }
        } // if either are not null


        return $this;
    } // setTglSkPemakai()

    /**
     * Sets the value of [tgl_hapus_buku] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Bangunan The current object (for fluent API support)
     */
    public function setTglHapusBuku($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->tgl_hapus_buku !== null || $dt !== null) {
            $currentDateAsString = ($this->tgl_hapus_buku !== null && $tmpDt = new DateTime($this->tgl_hapus_buku)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->tgl_hapus_buku = $newDateAsString;
                $this->modifiedColumns[] = BangunanPeer::TGL_HAPUS_BUKU;
            }
        } // if either are not null


        return $this;
    } // setTglHapusBuku()

    /**
     * Set the value of [ket_bangunan] column.
     * 
     * @param string $v new value
     * @return Bangunan The current object (for fluent API support)
     */
    public function setKetBangunan($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->ket_bangunan !== $v) {
            $this->ket_bangunan = $v;
            $this->modifiedColumns[] = BangunanPeer::KET_BANGUNAN;
        }


        return $this;
    } // setKetBangunan()

    /**
     * Set the value of [asal_data] column.
     * 
     * @param string $v new value
     * @return Bangunan The current object (for fluent API support)
     */
    public function setAsalData($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->asal_data !== $v) {
            $this->asal_data = $v;
            $this->modifiedColumns[] = BangunanPeer::ASAL_DATA;
        }


        return $this;
    } // setAsalData()

    /**
     * Sets the value of [create_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Bangunan The current object (for fluent API support)
     */
    public function setCreateDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->create_date !== null || $dt !== null) {
            $currentDateAsString = ($this->create_date !== null && $tmpDt = new DateTime($this->create_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->create_date = $newDateAsString;
                $this->modifiedColumns[] = BangunanPeer::CREATE_DATE;
            }
        } // if either are not null


        return $this;
    } // setCreateDate()

    /**
     * Sets the value of [last_update] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Bangunan The current object (for fluent API support)
     */
    public function setLastUpdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->last_update !== null || $dt !== null) {
            $currentDateAsString = ($this->last_update !== null && $tmpDt = new DateTime($this->last_update)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->last_update = $newDateAsString;
                $this->modifiedColumns[] = BangunanPeer::LAST_UPDATE;
            }
        } // if either are not null


        return $this;
    } // setLastUpdate()

    /**
     * Set the value of [soft_delete] column.
     * 
     * @param string $v new value
     * @return Bangunan The current object (for fluent API support)
     */
    public function setSoftDelete($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->soft_delete !== $v) {
            $this->soft_delete = $v;
            $this->modifiedColumns[] = BangunanPeer::SOFT_DELETE;
        }


        return $this;
    } // setSoftDelete()

    /**
     * Sets the value of [last_sync] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Bangunan The current object (for fluent API support)
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
                $this->modifiedColumns[] = BangunanPeer::LAST_SYNC;
            }
        } // if either are not null


        return $this;
    } // setLastSync()

    /**
     * Set the value of [updater_id] column.
     * 
     * @param string $v new value
     * @return Bangunan The current object (for fluent API support)
     */
    public function setUpdaterId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->updater_id !== $v) {
            $this->updater_id = $v;
            $this->modifiedColumns[] = BangunanPeer::UPDATER_ID;
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
            if ($this->jml_lantai !== '1') {
                return false;
            }

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

            $this->id_bangunan = ($row[$startcol + 0] !== null) ? (string) $row[$startcol + 0] : null;
            $this->jenis_prasarana_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->sekolah_id = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->id_tanah = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->ptk_id = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
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
            $this->panjang = ($row[$startcol + 16] !== null) ? (double) $row[$startcol + 16] : null;
            $this->lebar = ($row[$startcol + 17] !== null) ? (double) $row[$startcol + 17] : null;
            $this->nilai_perolehan_aset = ($row[$startcol + 18] !== null) ? (string) $row[$startcol + 18] : null;
            $this->jml_lantai = ($row[$startcol + 19] !== null) ? (string) $row[$startcol + 19] : null;
            $this->thn_dibangun = ($row[$startcol + 20] !== null) ? (string) $row[$startcol + 20] : null;
            $this->luas_tapak_bangunan = ($row[$startcol + 21] !== null) ? (string) $row[$startcol + 21] : null;
            $this->vol_pondasi_m3 = ($row[$startcol + 22] !== null) ? (string) $row[$startcol + 22] : null;
            $this->vol_sloop_kolom_balok_m3 = ($row[$startcol + 23] !== null) ? (string) $row[$startcol + 23] : null;
            $this->panj_kudakuda_m = ($row[$startcol + 24] !== null) ? (string) $row[$startcol + 24] : null;
            $this->vol_kudakuda_m3 = ($row[$startcol + 25] !== null) ? (string) $row[$startcol + 25] : null;
            $this->panj_kaso_m = ($row[$startcol + 26] !== null) ? (string) $row[$startcol + 26] : null;
            $this->panj_reng_m = ($row[$startcol + 27] !== null) ? (string) $row[$startcol + 27] : null;
            $this->luas_tutup_atap_m2 = ($row[$startcol + 28] !== null) ? (string) $row[$startcol + 28] : null;
            $this->kd_satker_tanah = ($row[$startcol + 29] !== null) ? (string) $row[$startcol + 29] : null;
            $this->nm_satker_tanah = ($row[$startcol + 30] !== null) ? (string) $row[$startcol + 30] : null;
            $this->kd_brg_tanah = ($row[$startcol + 31] !== null) ? (string) $row[$startcol + 31] : null;
            $this->nm_brg_tanah = ($row[$startcol + 32] !== null) ? (string) $row[$startcol + 32] : null;
            $this->nup_brg_tanah = ($row[$startcol + 33] !== null) ? (string) $row[$startcol + 33] : null;
            $this->tgl_sk_pemakai = ($row[$startcol + 34] !== null) ? (string) $row[$startcol + 34] : null;
            $this->tgl_hapus_buku = ($row[$startcol + 35] !== null) ? (string) $row[$startcol + 35] : null;
            $this->ket_bangunan = ($row[$startcol + 36] !== null) ? (string) $row[$startcol + 36] : null;
            $this->asal_data = ($row[$startcol + 37] !== null) ? (string) $row[$startcol + 37] : null;
            $this->create_date = ($row[$startcol + 38] !== null) ? (string) $row[$startcol + 38] : null;
            $this->last_update = ($row[$startcol + 39] !== null) ? (string) $row[$startcol + 39] : null;
            $this->soft_delete = ($row[$startcol + 40] !== null) ? (string) $row[$startcol + 40] : null;
            $this->last_sync = ($row[$startcol + 41] !== null) ? (string) $row[$startcol + 41] : null;
            $this->updater_id = ($row[$startcol + 42] !== null) ? (string) $row[$startcol + 42] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 43; // 43 = BangunanPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Bangunan object", $e);
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
        if ($this->aTanah !== null && $this->id_tanah !== $this->aTanah->getIdTanah()) {
            $this->aTanah = null;
        }
        if ($this->aPtk !== null && $this->ptk_id !== $this->aPtk->getPtkId()) {
            $this->aPtk = null;
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
            $con = Propel::getConnection(BangunanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = BangunanPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aPtk = null;
            $this->aJenisHapusBuku = null;
            $this->aTanah = null;
            $this->aJenisPrasarana = null;
            $this->aSekolah = null;
            $this->aStatusKepemilikanSarpras = null;
            $this->collBangunanDariBlockgrants = null;

            $this->collBangunanLongitudinals = null;

            $this->collRuangs = null;

            $this->collVldBangunans = null;

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
            $con = Propel::getConnection(BangunanPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = BangunanQuery::create()
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
            $con = Propel::getConnection(BangunanPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                BangunanPeer::addInstanceToPool($this);
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

            if ($this->aJenisHapusBuku !== null) {
                if ($this->aJenisHapusBuku->isModified() || $this->aJenisHapusBuku->isNew()) {
                    $affectedRows += $this->aJenisHapusBuku->save($con);
                }
                $this->setJenisHapusBuku($this->aJenisHapusBuku);
            }

            if ($this->aTanah !== null) {
                if ($this->aTanah->isModified() || $this->aTanah->isNew()) {
                    $affectedRows += $this->aTanah->save($con);
                }
                $this->setTanah($this->aTanah);
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

            if ($this->bangunanDariBlockgrantsScheduledForDeletion !== null) {
                if (!$this->bangunanDariBlockgrantsScheduledForDeletion->isEmpty()) {
                    BangunanDariBlockgrantQuery::create()
                        ->filterByPrimaryKeys($this->bangunanDariBlockgrantsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->bangunanDariBlockgrantsScheduledForDeletion = null;
                }
            }

            if ($this->collBangunanDariBlockgrants !== null) {
                foreach ($this->collBangunanDariBlockgrants as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->bangunanLongitudinalsScheduledForDeletion !== null) {
                if (!$this->bangunanLongitudinalsScheduledForDeletion->isEmpty()) {
                    BangunanLongitudinalQuery::create()
                        ->filterByPrimaryKeys($this->bangunanLongitudinalsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->bangunanLongitudinalsScheduledForDeletion = null;
                }
            }

            if ($this->collBangunanLongitudinals !== null) {
                foreach ($this->collBangunanLongitudinals as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->ruangsScheduledForDeletion !== null) {
                if (!$this->ruangsScheduledForDeletion->isEmpty()) {
                    RuangQuery::create()
                        ->filterByPrimaryKeys($this->ruangsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->ruangsScheduledForDeletion = null;
                }
            }

            if ($this->collRuangs !== null) {
                foreach ($this->collRuangs as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->vldBangunansScheduledForDeletion !== null) {
                if (!$this->vldBangunansScheduledForDeletion->isEmpty()) {
                    VldBangunanQuery::create()
                        ->filterByPrimaryKeys($this->vldBangunansScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->vldBangunansScheduledForDeletion = null;
                }
            }

            if ($this->collVldBangunans !== null) {
                foreach ($this->collVldBangunans as $referrerFK) {
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
        if ($this->isColumnModified(BangunanPeer::ID_BANGUNAN)) {
            $modifiedColumns[':p' . $index++]  = '"id_bangunan"';
        }
        if ($this->isColumnModified(BangunanPeer::JENIS_PRASARANA_ID)) {
            $modifiedColumns[':p' . $index++]  = '"jenis_prasarana_id"';
        }
        if ($this->isColumnModified(BangunanPeer::SEKOLAH_ID)) {
            $modifiedColumns[':p' . $index++]  = '"sekolah_id"';
        }
        if ($this->isColumnModified(BangunanPeer::ID_TANAH)) {
            $modifiedColumns[':p' . $index++]  = '"id_tanah"';
        }
        if ($this->isColumnModified(BangunanPeer::PTK_ID)) {
            $modifiedColumns[':p' . $index++]  = '"ptk_id"';
        }
        if ($this->isColumnModified(BangunanPeer::ID_HAPUS_BUKU)) {
            $modifiedColumns[':p' . $index++]  = '"id_hapus_buku"';
        }
        if ($this->isColumnModified(BangunanPeer::KEPEMILIKAN_SARPRAS_ID)) {
            $modifiedColumns[':p' . $index++]  = '"kepemilikan_sarpras_id"';
        }
        if ($this->isColumnModified(BangunanPeer::KD_KL)) {
            $modifiedColumns[':p' . $index++]  = '"kd_kl"';
        }
        if ($this->isColumnModified(BangunanPeer::KD_SATKER)) {
            $modifiedColumns[':p' . $index++]  = '"kd_satker"';
        }
        if ($this->isColumnModified(BangunanPeer::KD_BRG)) {
            $modifiedColumns[':p' . $index++]  = '"kd_brg"';
        }
        if ($this->isColumnModified(BangunanPeer::NUP)) {
            $modifiedColumns[':p' . $index++]  = '"nup"';
        }
        if ($this->isColumnModified(BangunanPeer::KODE_ESELON1)) {
            $modifiedColumns[':p' . $index++]  = '"kode_eselon1"';
        }
        if ($this->isColumnModified(BangunanPeer::NAMA_ESELON1)) {
            $modifiedColumns[':p' . $index++]  = '"nama_eselon1"';
        }
        if ($this->isColumnModified(BangunanPeer::KODE_SUB_SATKER)) {
            $modifiedColumns[':p' . $index++]  = '"kode_sub_satker"';
        }
        if ($this->isColumnModified(BangunanPeer::NAMA_SUB_SATKER)) {
            $modifiedColumns[':p' . $index++]  = '"nama_sub_satker"';
        }
        if ($this->isColumnModified(BangunanPeer::NAMA)) {
            $modifiedColumns[':p' . $index++]  = '"nama"';
        }
        if ($this->isColumnModified(BangunanPeer::PANJANG)) {
            $modifiedColumns[':p' . $index++]  = '"panjang"';
        }
        if ($this->isColumnModified(BangunanPeer::LEBAR)) {
            $modifiedColumns[':p' . $index++]  = '"lebar"';
        }
        if ($this->isColumnModified(BangunanPeer::NILAI_PEROLEHAN_ASET)) {
            $modifiedColumns[':p' . $index++]  = '"nilai_perolehan_aset"';
        }
        if ($this->isColumnModified(BangunanPeer::JML_LANTAI)) {
            $modifiedColumns[':p' . $index++]  = '"jml_lantai"';
        }
        if ($this->isColumnModified(BangunanPeer::THN_DIBANGUN)) {
            $modifiedColumns[':p' . $index++]  = '"thn_dibangun"';
        }
        if ($this->isColumnModified(BangunanPeer::LUAS_TAPAK_BANGUNAN)) {
            $modifiedColumns[':p' . $index++]  = '"luas_tapak_bangunan"';
        }
        if ($this->isColumnModified(BangunanPeer::VOL_PONDASI_M3)) {
            $modifiedColumns[':p' . $index++]  = '"vol_pondasi_m3"';
        }
        if ($this->isColumnModified(BangunanPeer::VOL_SLOOP_KOLOM_BALOK_M3)) {
            $modifiedColumns[':p' . $index++]  = '"vol_sloop_kolom_balok_m3"';
        }
        if ($this->isColumnModified(BangunanPeer::PANJ_KUDAKUDA_M)) {
            $modifiedColumns[':p' . $index++]  = '"panj_kudakuda_m"';
        }
        if ($this->isColumnModified(BangunanPeer::VOL_KUDAKUDA_M3)) {
            $modifiedColumns[':p' . $index++]  = '"vol_kudakuda_m3"';
        }
        if ($this->isColumnModified(BangunanPeer::PANJ_KASO_M)) {
            $modifiedColumns[':p' . $index++]  = '"panj_kaso_m"';
        }
        if ($this->isColumnModified(BangunanPeer::PANJ_RENG_M)) {
            $modifiedColumns[':p' . $index++]  = '"panj_reng_m"';
        }
        if ($this->isColumnModified(BangunanPeer::LUAS_TUTUP_ATAP_M2)) {
            $modifiedColumns[':p' . $index++]  = '"luas_tutup_atap_m2"';
        }
        if ($this->isColumnModified(BangunanPeer::KD_SATKER_TANAH)) {
            $modifiedColumns[':p' . $index++]  = '"kd_satker_tanah"';
        }
        if ($this->isColumnModified(BangunanPeer::NM_SATKER_TANAH)) {
            $modifiedColumns[':p' . $index++]  = '"nm_satker_tanah"';
        }
        if ($this->isColumnModified(BangunanPeer::KD_BRG_TANAH)) {
            $modifiedColumns[':p' . $index++]  = '"kd_brg_tanah"';
        }
        if ($this->isColumnModified(BangunanPeer::NM_BRG_TANAH)) {
            $modifiedColumns[':p' . $index++]  = '"nm_brg_tanah"';
        }
        if ($this->isColumnModified(BangunanPeer::NUP_BRG_TANAH)) {
            $modifiedColumns[':p' . $index++]  = '"nup_brg_tanah"';
        }
        if ($this->isColumnModified(BangunanPeer::TGL_SK_PEMAKAI)) {
            $modifiedColumns[':p' . $index++]  = '"tgl_sk_pemakai"';
        }
        if ($this->isColumnModified(BangunanPeer::TGL_HAPUS_BUKU)) {
            $modifiedColumns[':p' . $index++]  = '"tgl_hapus_buku"';
        }
        if ($this->isColumnModified(BangunanPeer::KET_BANGUNAN)) {
            $modifiedColumns[':p' . $index++]  = '"ket_bangunan"';
        }
        if ($this->isColumnModified(BangunanPeer::ASAL_DATA)) {
            $modifiedColumns[':p' . $index++]  = '"asal_data"';
        }
        if ($this->isColumnModified(BangunanPeer::CREATE_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"create_date"';
        }
        if ($this->isColumnModified(BangunanPeer::LAST_UPDATE)) {
            $modifiedColumns[':p' . $index++]  = '"last_update"';
        }
        if ($this->isColumnModified(BangunanPeer::SOFT_DELETE)) {
            $modifiedColumns[':p' . $index++]  = '"soft_delete"';
        }
        if ($this->isColumnModified(BangunanPeer::LAST_SYNC)) {
            $modifiedColumns[':p' . $index++]  = '"last_sync"';
        }
        if ($this->isColumnModified(BangunanPeer::UPDATER_ID)) {
            $modifiedColumns[':p' . $index++]  = '"updater_id"';
        }

        $sql = sprintf(
            'INSERT INTO "bangunan" (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '"id_bangunan"':						
                        $stmt->bindValue($identifier, $this->id_bangunan, PDO::PARAM_STR);
                        break;
                    case '"jenis_prasarana_id"':						
                        $stmt->bindValue($identifier, $this->jenis_prasarana_id, PDO::PARAM_INT);
                        break;
                    case '"sekolah_id"':						
                        $stmt->bindValue($identifier, $this->sekolah_id, PDO::PARAM_STR);
                        break;
                    case '"id_tanah"':						
                        $stmt->bindValue($identifier, $this->id_tanah, PDO::PARAM_STR);
                        break;
                    case '"ptk_id"':						
                        $stmt->bindValue($identifier, $this->ptk_id, PDO::PARAM_STR);
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
                    case '"jml_lantai"':						
                        $stmt->bindValue($identifier, $this->jml_lantai, PDO::PARAM_STR);
                        break;
                    case '"thn_dibangun"':						
                        $stmt->bindValue($identifier, $this->thn_dibangun, PDO::PARAM_STR);
                        break;
                    case '"luas_tapak_bangunan"':						
                        $stmt->bindValue($identifier, $this->luas_tapak_bangunan, PDO::PARAM_STR);
                        break;
                    case '"vol_pondasi_m3"':						
                        $stmt->bindValue($identifier, $this->vol_pondasi_m3, PDO::PARAM_STR);
                        break;
                    case '"vol_sloop_kolom_balok_m3"':						
                        $stmt->bindValue($identifier, $this->vol_sloop_kolom_balok_m3, PDO::PARAM_STR);
                        break;
                    case '"panj_kudakuda_m"':						
                        $stmt->bindValue($identifier, $this->panj_kudakuda_m, PDO::PARAM_STR);
                        break;
                    case '"vol_kudakuda_m3"':						
                        $stmt->bindValue($identifier, $this->vol_kudakuda_m3, PDO::PARAM_STR);
                        break;
                    case '"panj_kaso_m"':						
                        $stmt->bindValue($identifier, $this->panj_kaso_m, PDO::PARAM_STR);
                        break;
                    case '"panj_reng_m"':						
                        $stmt->bindValue($identifier, $this->panj_reng_m, PDO::PARAM_STR);
                        break;
                    case '"luas_tutup_atap_m2"':						
                        $stmt->bindValue($identifier, $this->luas_tutup_atap_m2, PDO::PARAM_STR);
                        break;
                    case '"kd_satker_tanah"':						
                        $stmt->bindValue($identifier, $this->kd_satker_tanah, PDO::PARAM_STR);
                        break;
                    case '"nm_satker_tanah"':						
                        $stmt->bindValue($identifier, $this->nm_satker_tanah, PDO::PARAM_STR);
                        break;
                    case '"kd_brg_tanah"':						
                        $stmt->bindValue($identifier, $this->kd_brg_tanah, PDO::PARAM_STR);
                        break;
                    case '"nm_brg_tanah"':						
                        $stmt->bindValue($identifier, $this->nm_brg_tanah, PDO::PARAM_STR);
                        break;
                    case '"nup_brg_tanah"':						
                        $stmt->bindValue($identifier, $this->nup_brg_tanah, PDO::PARAM_STR);
                        break;
                    case '"tgl_sk_pemakai"':						
                        $stmt->bindValue($identifier, $this->tgl_sk_pemakai, PDO::PARAM_STR);
                        break;
                    case '"tgl_hapus_buku"':						
                        $stmt->bindValue($identifier, $this->tgl_hapus_buku, PDO::PARAM_STR);
                        break;
                    case '"ket_bangunan"':						
                        $stmt->bindValue($identifier, $this->ket_bangunan, PDO::PARAM_STR);
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

            if ($this->aJenisHapusBuku !== null) {
                if (!$this->aJenisHapusBuku->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aJenisHapusBuku->getValidationFailures());
                }
            }

            if ($this->aTanah !== null) {
                if (!$this->aTanah->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aTanah->getValidationFailures());
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


            if (($retval = BangunanPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collBangunanDariBlockgrants !== null) {
                    foreach ($this->collBangunanDariBlockgrants as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collBangunanLongitudinals !== null) {
                    foreach ($this->collBangunanLongitudinals as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collRuangs !== null) {
                    foreach ($this->collRuangs as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collVldBangunans !== null) {
                    foreach ($this->collVldBangunans as $referrerFK) {
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
        $pos = BangunanPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdBangunan();
                break;
            case 1:
                return $this->getJenisPrasaranaId();
                break;
            case 2:
                return $this->getSekolahId();
                break;
            case 3:
                return $this->getIdTanah();
                break;
            case 4:
                return $this->getPtkId();
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
                return $this->getPanjang();
                break;
            case 17:
                return $this->getLebar();
                break;
            case 18:
                return $this->getNilaiPerolehanAset();
                break;
            case 19:
                return $this->getJmlLantai();
                break;
            case 20:
                return $this->getThnDibangun();
                break;
            case 21:
                return $this->getLuasTapakBangunan();
                break;
            case 22:
                return $this->getVolPondasiM3();
                break;
            case 23:
                return $this->getVolSloopKolomBalokM3();
                break;
            case 24:
                return $this->getPanjKudakudaM();
                break;
            case 25:
                return $this->getVolKudakudaM3();
                break;
            case 26:
                return $this->getPanjKasoM();
                break;
            case 27:
                return $this->getPanjRengM();
                break;
            case 28:
                return $this->getLuasTutupAtapM2();
                break;
            case 29:
                return $this->getKdSatkerTanah();
                break;
            case 30:
                return $this->getNmSatkerTanah();
                break;
            case 31:
                return $this->getKdBrgTanah();
                break;
            case 32:
                return $this->getNmBrgTanah();
                break;
            case 33:
                return $this->getNupBrgTanah();
                break;
            case 34:
                return $this->getTglSkPemakai();
                break;
            case 35:
                return $this->getTglHapusBuku();
                break;
            case 36:
                return $this->getKetBangunan();
                break;
            case 37:
                return $this->getAsalData();
                break;
            case 38:
                return $this->getCreateDate();
                break;
            case 39:
                return $this->getLastUpdate();
                break;
            case 40:
                return $this->getSoftDelete();
                break;
            case 41:
                return $this->getLastSync();
                break;
            case 42:
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
        if (isset($alreadyDumpedObjects['Bangunan'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Bangunan'][$this->getPrimaryKey()] = true;
        $keys = BangunanPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdBangunan(),
            $keys[1] => $this->getJenisPrasaranaId(),
            $keys[2] => $this->getSekolahId(),
            $keys[3] => $this->getIdTanah(),
            $keys[4] => $this->getPtkId(),
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
            $keys[16] => $this->getPanjang(),
            $keys[17] => $this->getLebar(),
            $keys[18] => $this->getNilaiPerolehanAset(),
            $keys[19] => $this->getJmlLantai(),
            $keys[20] => $this->getThnDibangun(),
            $keys[21] => $this->getLuasTapakBangunan(),
            $keys[22] => $this->getVolPondasiM3(),
            $keys[23] => $this->getVolSloopKolomBalokM3(),
            $keys[24] => $this->getPanjKudakudaM(),
            $keys[25] => $this->getVolKudakudaM3(),
            $keys[26] => $this->getPanjKasoM(),
            $keys[27] => $this->getPanjRengM(),
            $keys[28] => $this->getLuasTutupAtapM2(),
            $keys[29] => $this->getKdSatkerTanah(),
            $keys[30] => $this->getNmSatkerTanah(),
            $keys[31] => $this->getKdBrgTanah(),
            $keys[32] => $this->getNmBrgTanah(),
            $keys[33] => $this->getNupBrgTanah(),
            $keys[34] => $this->getTglSkPemakai(),
            $keys[35] => $this->getTglHapusBuku(),
            $keys[36] => $this->getKetBangunan(),
            $keys[37] => $this->getAsalData(),
            $keys[38] => $this->getCreateDate(),
            $keys[39] => $this->getLastUpdate(),
            $keys[40] => $this->getSoftDelete(),
            $keys[41] => $this->getLastSync(),
            $keys[42] => $this->getUpdaterId(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aPtk) {
                $result['Ptk'] = $this->aPtk->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aJenisHapusBuku) {
                $result['JenisHapusBuku'] = $this->aJenisHapusBuku->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aTanah) {
                $result['Tanah'] = $this->aTanah->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
            if (null !== $this->collBangunanDariBlockgrants) {
                $result['BangunanDariBlockgrants'] = $this->collBangunanDariBlockgrants->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collBangunanLongitudinals) {
                $result['BangunanLongitudinals'] = $this->collBangunanLongitudinals->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collRuangs) {
                $result['Ruangs'] = $this->collRuangs->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collVldBangunans) {
                $result['VldBangunans'] = $this->collVldBangunans->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = BangunanPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdBangunan($value);
                break;
            case 1:
                $this->setJenisPrasaranaId($value);
                break;
            case 2:
                $this->setSekolahId($value);
                break;
            case 3:
                $this->setIdTanah($value);
                break;
            case 4:
                $this->setPtkId($value);
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
                $this->setPanjang($value);
                break;
            case 17:
                $this->setLebar($value);
                break;
            case 18:
                $this->setNilaiPerolehanAset($value);
                break;
            case 19:
                $this->setJmlLantai($value);
                break;
            case 20:
                $this->setThnDibangun($value);
                break;
            case 21:
                $this->setLuasTapakBangunan($value);
                break;
            case 22:
                $this->setVolPondasiM3($value);
                break;
            case 23:
                $this->setVolSloopKolomBalokM3($value);
                break;
            case 24:
                $this->setPanjKudakudaM($value);
                break;
            case 25:
                $this->setVolKudakudaM3($value);
                break;
            case 26:
                $this->setPanjKasoM($value);
                break;
            case 27:
                $this->setPanjRengM($value);
                break;
            case 28:
                $this->setLuasTutupAtapM2($value);
                break;
            case 29:
                $this->setKdSatkerTanah($value);
                break;
            case 30:
                $this->setNmSatkerTanah($value);
                break;
            case 31:
                $this->setKdBrgTanah($value);
                break;
            case 32:
                $this->setNmBrgTanah($value);
                break;
            case 33:
                $this->setNupBrgTanah($value);
                break;
            case 34:
                $this->setTglSkPemakai($value);
                break;
            case 35:
                $this->setTglHapusBuku($value);
                break;
            case 36:
                $this->setKetBangunan($value);
                break;
            case 37:
                $this->setAsalData($value);
                break;
            case 38:
                $this->setCreateDate($value);
                break;
            case 39:
                $this->setLastUpdate($value);
                break;
            case 40:
                $this->setSoftDelete($value);
                break;
            case 41:
                $this->setLastSync($value);
                break;
            case 42:
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
        $keys = BangunanPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdBangunan($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setJenisPrasaranaId($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setSekolahId($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setIdTanah($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setPtkId($arr[$keys[4]]);
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
        if (array_key_exists($keys[16], $arr)) $this->setPanjang($arr[$keys[16]]);
        if (array_key_exists($keys[17], $arr)) $this->setLebar($arr[$keys[17]]);
        if (array_key_exists($keys[18], $arr)) $this->setNilaiPerolehanAset($arr[$keys[18]]);
        if (array_key_exists($keys[19], $arr)) $this->setJmlLantai($arr[$keys[19]]);
        if (array_key_exists($keys[20], $arr)) $this->setThnDibangun($arr[$keys[20]]);
        if (array_key_exists($keys[21], $arr)) $this->setLuasTapakBangunan($arr[$keys[21]]);
        if (array_key_exists($keys[22], $arr)) $this->setVolPondasiM3($arr[$keys[22]]);
        if (array_key_exists($keys[23], $arr)) $this->setVolSloopKolomBalokM3($arr[$keys[23]]);
        if (array_key_exists($keys[24], $arr)) $this->setPanjKudakudaM($arr[$keys[24]]);
        if (array_key_exists($keys[25], $arr)) $this->setVolKudakudaM3($arr[$keys[25]]);
        if (array_key_exists($keys[26], $arr)) $this->setPanjKasoM($arr[$keys[26]]);
        if (array_key_exists($keys[27], $arr)) $this->setPanjRengM($arr[$keys[27]]);
        if (array_key_exists($keys[28], $arr)) $this->setLuasTutupAtapM2($arr[$keys[28]]);
        if (array_key_exists($keys[29], $arr)) $this->setKdSatkerTanah($arr[$keys[29]]);
        if (array_key_exists($keys[30], $arr)) $this->setNmSatkerTanah($arr[$keys[30]]);
        if (array_key_exists($keys[31], $arr)) $this->setKdBrgTanah($arr[$keys[31]]);
        if (array_key_exists($keys[32], $arr)) $this->setNmBrgTanah($arr[$keys[32]]);
        if (array_key_exists($keys[33], $arr)) $this->setNupBrgTanah($arr[$keys[33]]);
        if (array_key_exists($keys[34], $arr)) $this->setTglSkPemakai($arr[$keys[34]]);
        if (array_key_exists($keys[35], $arr)) $this->setTglHapusBuku($arr[$keys[35]]);
        if (array_key_exists($keys[36], $arr)) $this->setKetBangunan($arr[$keys[36]]);
        if (array_key_exists($keys[37], $arr)) $this->setAsalData($arr[$keys[37]]);
        if (array_key_exists($keys[38], $arr)) $this->setCreateDate($arr[$keys[38]]);
        if (array_key_exists($keys[39], $arr)) $this->setLastUpdate($arr[$keys[39]]);
        if (array_key_exists($keys[40], $arr)) $this->setSoftDelete($arr[$keys[40]]);
        if (array_key_exists($keys[41], $arr)) $this->setLastSync($arr[$keys[41]]);
        if (array_key_exists($keys[42], $arr)) $this->setUpdaterId($arr[$keys[42]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(BangunanPeer::DATABASE_NAME);

        if ($this->isColumnModified(BangunanPeer::ID_BANGUNAN)) $criteria->add(BangunanPeer::ID_BANGUNAN, $this->id_bangunan);
        if ($this->isColumnModified(BangunanPeer::JENIS_PRASARANA_ID)) $criteria->add(BangunanPeer::JENIS_PRASARANA_ID, $this->jenis_prasarana_id);
        if ($this->isColumnModified(BangunanPeer::SEKOLAH_ID)) $criteria->add(BangunanPeer::SEKOLAH_ID, $this->sekolah_id);
        if ($this->isColumnModified(BangunanPeer::ID_TANAH)) $criteria->add(BangunanPeer::ID_TANAH, $this->id_tanah);
        if ($this->isColumnModified(BangunanPeer::PTK_ID)) $criteria->add(BangunanPeer::PTK_ID, $this->ptk_id);
        if ($this->isColumnModified(BangunanPeer::ID_HAPUS_BUKU)) $criteria->add(BangunanPeer::ID_HAPUS_BUKU, $this->id_hapus_buku);
        if ($this->isColumnModified(BangunanPeer::KEPEMILIKAN_SARPRAS_ID)) $criteria->add(BangunanPeer::KEPEMILIKAN_SARPRAS_ID, $this->kepemilikan_sarpras_id);
        if ($this->isColumnModified(BangunanPeer::KD_KL)) $criteria->add(BangunanPeer::KD_KL, $this->kd_kl);
        if ($this->isColumnModified(BangunanPeer::KD_SATKER)) $criteria->add(BangunanPeer::KD_SATKER, $this->kd_satker);
        if ($this->isColumnModified(BangunanPeer::KD_BRG)) $criteria->add(BangunanPeer::KD_BRG, $this->kd_brg);
        if ($this->isColumnModified(BangunanPeer::NUP)) $criteria->add(BangunanPeer::NUP, $this->nup);
        if ($this->isColumnModified(BangunanPeer::KODE_ESELON1)) $criteria->add(BangunanPeer::KODE_ESELON1, $this->kode_eselon1);
        if ($this->isColumnModified(BangunanPeer::NAMA_ESELON1)) $criteria->add(BangunanPeer::NAMA_ESELON1, $this->nama_eselon1);
        if ($this->isColumnModified(BangunanPeer::KODE_SUB_SATKER)) $criteria->add(BangunanPeer::KODE_SUB_SATKER, $this->kode_sub_satker);
        if ($this->isColumnModified(BangunanPeer::NAMA_SUB_SATKER)) $criteria->add(BangunanPeer::NAMA_SUB_SATKER, $this->nama_sub_satker);
        if ($this->isColumnModified(BangunanPeer::NAMA)) $criteria->add(BangunanPeer::NAMA, $this->nama);
        if ($this->isColumnModified(BangunanPeer::PANJANG)) $criteria->add(BangunanPeer::PANJANG, $this->panjang);
        if ($this->isColumnModified(BangunanPeer::LEBAR)) $criteria->add(BangunanPeer::LEBAR, $this->lebar);
        if ($this->isColumnModified(BangunanPeer::NILAI_PEROLEHAN_ASET)) $criteria->add(BangunanPeer::NILAI_PEROLEHAN_ASET, $this->nilai_perolehan_aset);
        if ($this->isColumnModified(BangunanPeer::JML_LANTAI)) $criteria->add(BangunanPeer::JML_LANTAI, $this->jml_lantai);
        if ($this->isColumnModified(BangunanPeer::THN_DIBANGUN)) $criteria->add(BangunanPeer::THN_DIBANGUN, $this->thn_dibangun);
        if ($this->isColumnModified(BangunanPeer::LUAS_TAPAK_BANGUNAN)) $criteria->add(BangunanPeer::LUAS_TAPAK_BANGUNAN, $this->luas_tapak_bangunan);
        if ($this->isColumnModified(BangunanPeer::VOL_PONDASI_M3)) $criteria->add(BangunanPeer::VOL_PONDASI_M3, $this->vol_pondasi_m3);
        if ($this->isColumnModified(BangunanPeer::VOL_SLOOP_KOLOM_BALOK_M3)) $criteria->add(BangunanPeer::VOL_SLOOP_KOLOM_BALOK_M3, $this->vol_sloop_kolom_balok_m3);
        if ($this->isColumnModified(BangunanPeer::PANJ_KUDAKUDA_M)) $criteria->add(BangunanPeer::PANJ_KUDAKUDA_M, $this->panj_kudakuda_m);
        if ($this->isColumnModified(BangunanPeer::VOL_KUDAKUDA_M3)) $criteria->add(BangunanPeer::VOL_KUDAKUDA_M3, $this->vol_kudakuda_m3);
        if ($this->isColumnModified(BangunanPeer::PANJ_KASO_M)) $criteria->add(BangunanPeer::PANJ_KASO_M, $this->panj_kaso_m);
        if ($this->isColumnModified(BangunanPeer::PANJ_RENG_M)) $criteria->add(BangunanPeer::PANJ_RENG_M, $this->panj_reng_m);
        if ($this->isColumnModified(BangunanPeer::LUAS_TUTUP_ATAP_M2)) $criteria->add(BangunanPeer::LUAS_TUTUP_ATAP_M2, $this->luas_tutup_atap_m2);
        if ($this->isColumnModified(BangunanPeer::KD_SATKER_TANAH)) $criteria->add(BangunanPeer::KD_SATKER_TANAH, $this->kd_satker_tanah);
        if ($this->isColumnModified(BangunanPeer::NM_SATKER_TANAH)) $criteria->add(BangunanPeer::NM_SATKER_TANAH, $this->nm_satker_tanah);
        if ($this->isColumnModified(BangunanPeer::KD_BRG_TANAH)) $criteria->add(BangunanPeer::KD_BRG_TANAH, $this->kd_brg_tanah);
        if ($this->isColumnModified(BangunanPeer::NM_BRG_TANAH)) $criteria->add(BangunanPeer::NM_BRG_TANAH, $this->nm_brg_tanah);
        if ($this->isColumnModified(BangunanPeer::NUP_BRG_TANAH)) $criteria->add(BangunanPeer::NUP_BRG_TANAH, $this->nup_brg_tanah);
        if ($this->isColumnModified(BangunanPeer::TGL_SK_PEMAKAI)) $criteria->add(BangunanPeer::TGL_SK_PEMAKAI, $this->tgl_sk_pemakai);
        if ($this->isColumnModified(BangunanPeer::TGL_HAPUS_BUKU)) $criteria->add(BangunanPeer::TGL_HAPUS_BUKU, $this->tgl_hapus_buku);
        if ($this->isColumnModified(BangunanPeer::KET_BANGUNAN)) $criteria->add(BangunanPeer::KET_BANGUNAN, $this->ket_bangunan);
        if ($this->isColumnModified(BangunanPeer::ASAL_DATA)) $criteria->add(BangunanPeer::ASAL_DATA, $this->asal_data);
        if ($this->isColumnModified(BangunanPeer::CREATE_DATE)) $criteria->add(BangunanPeer::CREATE_DATE, $this->create_date);
        if ($this->isColumnModified(BangunanPeer::LAST_UPDATE)) $criteria->add(BangunanPeer::LAST_UPDATE, $this->last_update);
        if ($this->isColumnModified(BangunanPeer::SOFT_DELETE)) $criteria->add(BangunanPeer::SOFT_DELETE, $this->soft_delete);
        if ($this->isColumnModified(BangunanPeer::LAST_SYNC)) $criteria->add(BangunanPeer::LAST_SYNC, $this->last_sync);
        if ($this->isColumnModified(BangunanPeer::UPDATER_ID)) $criteria->add(BangunanPeer::UPDATER_ID, $this->updater_id);

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
        $criteria = new Criteria(BangunanPeer::DATABASE_NAME);
        $criteria->add(BangunanPeer::ID_BANGUNAN, $this->id_bangunan);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return string
     */
    public function getPrimaryKey()
    {
        return $this->getIdBangunan();
    }

    /**
     * Generic method to set the primary key (id_bangunan column).
     *
     * @param  string $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdBangunan($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdBangunan();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of Bangunan (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setJenisPrasaranaId($this->getJenisPrasaranaId());
        $copyObj->setSekolahId($this->getSekolahId());
        $copyObj->setIdTanah($this->getIdTanah());
        $copyObj->setPtkId($this->getPtkId());
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
        $copyObj->setJmlLantai($this->getJmlLantai());
        $copyObj->setThnDibangun($this->getThnDibangun());
        $copyObj->setLuasTapakBangunan($this->getLuasTapakBangunan());
        $copyObj->setVolPondasiM3($this->getVolPondasiM3());
        $copyObj->setVolSloopKolomBalokM3($this->getVolSloopKolomBalokM3());
        $copyObj->setPanjKudakudaM($this->getPanjKudakudaM());
        $copyObj->setVolKudakudaM3($this->getVolKudakudaM3());
        $copyObj->setPanjKasoM($this->getPanjKasoM());
        $copyObj->setPanjRengM($this->getPanjRengM());
        $copyObj->setLuasTutupAtapM2($this->getLuasTutupAtapM2());
        $copyObj->setKdSatkerTanah($this->getKdSatkerTanah());
        $copyObj->setNmSatkerTanah($this->getNmSatkerTanah());
        $copyObj->setKdBrgTanah($this->getKdBrgTanah());
        $copyObj->setNmBrgTanah($this->getNmBrgTanah());
        $copyObj->setNupBrgTanah($this->getNupBrgTanah());
        $copyObj->setTglSkPemakai($this->getTglSkPemakai());
        $copyObj->setTglHapusBuku($this->getTglHapusBuku());
        $copyObj->setKetBangunan($this->getKetBangunan());
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

            foreach ($this->getBangunanDariBlockgrants() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addBangunanDariBlockgrant($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getBangunanLongitudinals() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addBangunanLongitudinal($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getRuangs() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addRuang($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getVldBangunans() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addVldBangunan($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdBangunan(NULL); // this is a auto-increment column, so set to default value
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
     * @return Bangunan Clone of current object.
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
     * @return BangunanPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new BangunanPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Ptk object.
     *
     * @param             Ptk $v
     * @return Bangunan The current object (for fluent API support)
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
            $v->addBangunan($this);
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
                $this->aPtk->addBangunans($this);
             */
        }

        return $this->aPtk;
    }

    /**
     * Declares an association between this object and a JenisHapusBuku object.
     *
     * @param             JenisHapusBuku $v
     * @return Bangunan The current object (for fluent API support)
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
            $v->addBangunan($this);
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
                $this->aJenisHapusBuku->addBangunans($this);
             */
        }

        return $this->aJenisHapusBuku;
    }

    /**
     * Declares an association between this object and a Tanah object.
     *
     * @param             Tanah $v
     * @return Bangunan The current object (for fluent API support)
     * @throws PropelException
     */
    public function setTanah(Tanah $v = null)
    {
        if ($v === null) {
            $this->setIdTanah(NULL);
        } else {
            $this->setIdTanah($v->getIdTanah());
        }

        $this->aTanah = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Tanah object, it will not be re-added.
        if ($v !== null) {
            $v->addBangunan($this);
        }


        return $this;
    }


    /**
     * Get the associated Tanah object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Tanah The associated Tanah object.
     * @throws PropelException
     */
    public function getTanah(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aTanah === null && (($this->id_tanah !== "" && $this->id_tanah !== null)) && $doQuery) {
            $this->aTanah = TanahQuery::create()->findPk($this->id_tanah, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aTanah->addBangunans($this);
             */
        }

        return $this->aTanah;
    }

    /**
     * Declares an association between this object and a JenisPrasarana object.
     *
     * @param             JenisPrasarana $v
     * @return Bangunan The current object (for fluent API support)
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
            $v->addBangunan($this);
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
                $this->aJenisPrasarana->addBangunans($this);
             */
        }

        return $this->aJenisPrasarana;
    }

    /**
     * Declares an association between this object and a Sekolah object.
     *
     * @param             Sekolah $v
     * @return Bangunan The current object (for fluent API support)
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
            $v->addBangunan($this);
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
                $this->aSekolah->addBangunans($this);
             */
        }

        return $this->aSekolah;
    }

    /**
     * Declares an association between this object and a StatusKepemilikanSarpras object.
     *
     * @param             StatusKepemilikanSarpras $v
     * @return Bangunan The current object (for fluent API support)
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
            $v->addBangunan($this);
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
                $this->aStatusKepemilikanSarpras->addBangunans($this);
             */
        }

        return $this->aStatusKepemilikanSarpras;
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
        if ('BangunanDariBlockgrant' == $relationName) {
            $this->initBangunanDariBlockgrants();
        }
        if ('BangunanLongitudinal' == $relationName) {
            $this->initBangunanLongitudinals();
        }
        if ('Ruang' == $relationName) {
            $this->initRuangs();
        }
        if ('VldBangunan' == $relationName) {
            $this->initVldBangunans();
        }
    }

    /**
     * Clears out the collBangunanDariBlockgrants collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Bangunan The current object (for fluent API support)
     * @see        addBangunanDariBlockgrants()
     */
    public function clearBangunanDariBlockgrants()
    {
        $this->collBangunanDariBlockgrants = null; // important to set this to null since that means it is uninitialized
        $this->collBangunanDariBlockgrantsPartial = null;

        return $this;
    }

    /**
     * reset is the collBangunanDariBlockgrants collection loaded partially
     *
     * @return void
     */
    public function resetPartialBangunanDariBlockgrants($v = true)
    {
        $this->collBangunanDariBlockgrantsPartial = $v;
    }

    /**
     * Initializes the collBangunanDariBlockgrants collection.
     *
     * By default this just sets the collBangunanDariBlockgrants collection to an empty array (like clearcollBangunanDariBlockgrants());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initBangunanDariBlockgrants($overrideExisting = true)
    {
        if (null !== $this->collBangunanDariBlockgrants && !$overrideExisting) {
            return;
        }
        $this->collBangunanDariBlockgrants = new PropelObjectCollection();
        $this->collBangunanDariBlockgrants->setModel('BangunanDariBlockgrant');
    }

    /**
     * Gets an array of BangunanDariBlockgrant objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Bangunan is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|BangunanDariBlockgrant[] List of BangunanDariBlockgrant objects
     * @throws PropelException
     */
    public function getBangunanDariBlockgrants($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collBangunanDariBlockgrantsPartial && !$this->isNew();
        if (null === $this->collBangunanDariBlockgrants || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collBangunanDariBlockgrants) {
                // return empty collection
                $this->initBangunanDariBlockgrants();
            } else {
                $collBangunanDariBlockgrants = BangunanDariBlockgrantQuery::create(null, $criteria)
                    ->filterByBangunan($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collBangunanDariBlockgrantsPartial && count($collBangunanDariBlockgrants)) {
                      $this->initBangunanDariBlockgrants(false);

                      foreach($collBangunanDariBlockgrants as $obj) {
                        if (false == $this->collBangunanDariBlockgrants->contains($obj)) {
                          $this->collBangunanDariBlockgrants->append($obj);
                        }
                      }

                      $this->collBangunanDariBlockgrantsPartial = true;
                    }

                    $collBangunanDariBlockgrants->getInternalIterator()->rewind();
                    return $collBangunanDariBlockgrants;
                }

                if($partial && $this->collBangunanDariBlockgrants) {
                    foreach($this->collBangunanDariBlockgrants as $obj) {
                        if($obj->isNew()) {
                            $collBangunanDariBlockgrants[] = $obj;
                        }
                    }
                }

                $this->collBangunanDariBlockgrants = $collBangunanDariBlockgrants;
                $this->collBangunanDariBlockgrantsPartial = false;
            }
        }

        return $this->collBangunanDariBlockgrants;
    }

    /**
     * Sets a collection of BangunanDariBlockgrant objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $bangunanDariBlockgrants A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Bangunan The current object (for fluent API support)
     */
    public function setBangunanDariBlockgrants(PropelCollection $bangunanDariBlockgrants, PropelPDO $con = null)
    {
        $bangunanDariBlockgrantsToDelete = $this->getBangunanDariBlockgrants(new Criteria(), $con)->diff($bangunanDariBlockgrants);

        $this->bangunanDariBlockgrantsScheduledForDeletion = unserialize(serialize($bangunanDariBlockgrantsToDelete));

        foreach ($bangunanDariBlockgrantsToDelete as $bangunanDariBlockgrantRemoved) {
            $bangunanDariBlockgrantRemoved->setBangunan(null);
        }

        $this->collBangunanDariBlockgrants = null;
        foreach ($bangunanDariBlockgrants as $bangunanDariBlockgrant) {
            $this->addBangunanDariBlockgrant($bangunanDariBlockgrant);
        }

        $this->collBangunanDariBlockgrants = $bangunanDariBlockgrants;
        $this->collBangunanDariBlockgrantsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related BangunanDariBlockgrant objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related BangunanDariBlockgrant objects.
     * @throws PropelException
     */
    public function countBangunanDariBlockgrants(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collBangunanDariBlockgrantsPartial && !$this->isNew();
        if (null === $this->collBangunanDariBlockgrants || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collBangunanDariBlockgrants) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getBangunanDariBlockgrants());
            }
            $query = BangunanDariBlockgrantQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByBangunan($this)
                ->count($con);
        }

        return count($this->collBangunanDariBlockgrants);
    }

    /**
     * Method called to associate a BangunanDariBlockgrant object to this object
     * through the BangunanDariBlockgrant foreign key attribute.
     *
     * @param    BangunanDariBlockgrant $l BangunanDariBlockgrant
     * @return Bangunan The current object (for fluent API support)
     */
    public function addBangunanDariBlockgrant(BangunanDariBlockgrant $l)
    {
        if ($this->collBangunanDariBlockgrants === null) {
            $this->initBangunanDariBlockgrants();
            $this->collBangunanDariBlockgrantsPartial = true;
        }
        if (!in_array($l, $this->collBangunanDariBlockgrants->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddBangunanDariBlockgrant($l);
        }

        return $this;
    }

    /**
     * @param	BangunanDariBlockgrant $bangunanDariBlockgrant The bangunanDariBlockgrant object to add.
     */
    protected function doAddBangunanDariBlockgrant($bangunanDariBlockgrant)
    {
        $this->collBangunanDariBlockgrants[]= $bangunanDariBlockgrant;
        $bangunanDariBlockgrant->setBangunan($this);
    }

    /**
     * @param	BangunanDariBlockgrant $bangunanDariBlockgrant The bangunanDariBlockgrant object to remove.
     * @return Bangunan The current object (for fluent API support)
     */
    public function removeBangunanDariBlockgrant($bangunanDariBlockgrant)
    {
        if ($this->getBangunanDariBlockgrants()->contains($bangunanDariBlockgrant)) {
            $this->collBangunanDariBlockgrants->remove($this->collBangunanDariBlockgrants->search($bangunanDariBlockgrant));
            if (null === $this->bangunanDariBlockgrantsScheduledForDeletion) {
                $this->bangunanDariBlockgrantsScheduledForDeletion = clone $this->collBangunanDariBlockgrants;
                $this->bangunanDariBlockgrantsScheduledForDeletion->clear();
            }
            $this->bangunanDariBlockgrantsScheduledForDeletion[]= clone $bangunanDariBlockgrant;
            $bangunanDariBlockgrant->setBangunan(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Bangunan is new, it will return
     * an empty collection; or if this Bangunan has previously
     * been saved, it will retrieve related BangunanDariBlockgrants from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Bangunan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|BangunanDariBlockgrant[] List of BangunanDariBlockgrant objects
     */
    public function getBangunanDariBlockgrantsJoinBlockgrant($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = BangunanDariBlockgrantQuery::create(null, $criteria);
        $query->joinWith('Blockgrant', $join_behavior);

        return $this->getBangunanDariBlockgrants($query, $con);
    }

    /**
     * Clears out the collBangunanLongitudinals collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Bangunan The current object (for fluent API support)
     * @see        addBangunanLongitudinals()
     */
    public function clearBangunanLongitudinals()
    {
        $this->collBangunanLongitudinals = null; // important to set this to null since that means it is uninitialized
        $this->collBangunanLongitudinalsPartial = null;

        return $this;
    }

    /**
     * reset is the collBangunanLongitudinals collection loaded partially
     *
     * @return void
     */
    public function resetPartialBangunanLongitudinals($v = true)
    {
        $this->collBangunanLongitudinalsPartial = $v;
    }

    /**
     * Initializes the collBangunanLongitudinals collection.
     *
     * By default this just sets the collBangunanLongitudinals collection to an empty array (like clearcollBangunanLongitudinals());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initBangunanLongitudinals($overrideExisting = true)
    {
        if (null !== $this->collBangunanLongitudinals && !$overrideExisting) {
            return;
        }
        $this->collBangunanLongitudinals = new PropelObjectCollection();
        $this->collBangunanLongitudinals->setModel('BangunanLongitudinal');
    }

    /**
     * Gets an array of BangunanLongitudinal objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Bangunan is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|BangunanLongitudinal[] List of BangunanLongitudinal objects
     * @throws PropelException
     */
    public function getBangunanLongitudinals($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collBangunanLongitudinalsPartial && !$this->isNew();
        if (null === $this->collBangunanLongitudinals || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collBangunanLongitudinals) {
                // return empty collection
                $this->initBangunanLongitudinals();
            } else {
                $collBangunanLongitudinals = BangunanLongitudinalQuery::create(null, $criteria)
                    ->filterByBangunan($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collBangunanLongitudinalsPartial && count($collBangunanLongitudinals)) {
                      $this->initBangunanLongitudinals(false);

                      foreach($collBangunanLongitudinals as $obj) {
                        if (false == $this->collBangunanLongitudinals->contains($obj)) {
                          $this->collBangunanLongitudinals->append($obj);
                        }
                      }

                      $this->collBangunanLongitudinalsPartial = true;
                    }

                    $collBangunanLongitudinals->getInternalIterator()->rewind();
                    return $collBangunanLongitudinals;
                }

                if($partial && $this->collBangunanLongitudinals) {
                    foreach($this->collBangunanLongitudinals as $obj) {
                        if($obj->isNew()) {
                            $collBangunanLongitudinals[] = $obj;
                        }
                    }
                }

                $this->collBangunanLongitudinals = $collBangunanLongitudinals;
                $this->collBangunanLongitudinalsPartial = false;
            }
        }

        return $this->collBangunanLongitudinals;
    }

    /**
     * Sets a collection of BangunanLongitudinal objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $bangunanLongitudinals A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Bangunan The current object (for fluent API support)
     */
    public function setBangunanLongitudinals(PropelCollection $bangunanLongitudinals, PropelPDO $con = null)
    {
        $bangunanLongitudinalsToDelete = $this->getBangunanLongitudinals(new Criteria(), $con)->diff($bangunanLongitudinals);

        $this->bangunanLongitudinalsScheduledForDeletion = unserialize(serialize($bangunanLongitudinalsToDelete));

        foreach ($bangunanLongitudinalsToDelete as $bangunanLongitudinalRemoved) {
            $bangunanLongitudinalRemoved->setBangunan(null);
        }

        $this->collBangunanLongitudinals = null;
        foreach ($bangunanLongitudinals as $bangunanLongitudinal) {
            $this->addBangunanLongitudinal($bangunanLongitudinal);
        }

        $this->collBangunanLongitudinals = $bangunanLongitudinals;
        $this->collBangunanLongitudinalsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related BangunanLongitudinal objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related BangunanLongitudinal objects.
     * @throws PropelException
     */
    public function countBangunanLongitudinals(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collBangunanLongitudinalsPartial && !$this->isNew();
        if (null === $this->collBangunanLongitudinals || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collBangunanLongitudinals) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getBangunanLongitudinals());
            }
            $query = BangunanLongitudinalQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByBangunan($this)
                ->count($con);
        }

        return count($this->collBangunanLongitudinals);
    }

    /**
     * Method called to associate a BangunanLongitudinal object to this object
     * through the BangunanLongitudinal foreign key attribute.
     *
     * @param    BangunanLongitudinal $l BangunanLongitudinal
     * @return Bangunan The current object (for fluent API support)
     */
    public function addBangunanLongitudinal(BangunanLongitudinal $l)
    {
        if ($this->collBangunanLongitudinals === null) {
            $this->initBangunanLongitudinals();
            $this->collBangunanLongitudinalsPartial = true;
        }
        if (!in_array($l, $this->collBangunanLongitudinals->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddBangunanLongitudinal($l);
        }

        return $this;
    }

    /**
     * @param	BangunanLongitudinal $bangunanLongitudinal The bangunanLongitudinal object to add.
     */
    protected function doAddBangunanLongitudinal($bangunanLongitudinal)
    {
        $this->collBangunanLongitudinals[]= $bangunanLongitudinal;
        $bangunanLongitudinal->setBangunan($this);
    }

    /**
     * @param	BangunanLongitudinal $bangunanLongitudinal The bangunanLongitudinal object to remove.
     * @return Bangunan The current object (for fluent API support)
     */
    public function removeBangunanLongitudinal($bangunanLongitudinal)
    {
        if ($this->getBangunanLongitudinals()->contains($bangunanLongitudinal)) {
            $this->collBangunanLongitudinals->remove($this->collBangunanLongitudinals->search($bangunanLongitudinal));
            if (null === $this->bangunanLongitudinalsScheduledForDeletion) {
                $this->bangunanLongitudinalsScheduledForDeletion = clone $this->collBangunanLongitudinals;
                $this->bangunanLongitudinalsScheduledForDeletion->clear();
            }
            $this->bangunanLongitudinalsScheduledForDeletion[]= clone $bangunanLongitudinal;
            $bangunanLongitudinal->setBangunan(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Bangunan is new, it will return
     * an empty collection; or if this Bangunan has previously
     * been saved, it will retrieve related BangunanLongitudinals from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Bangunan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|BangunanLongitudinal[] List of BangunanLongitudinal objects
     */
    public function getBangunanLongitudinalsJoinSemester($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = BangunanLongitudinalQuery::create(null, $criteria);
        $query->joinWith('Semester', $join_behavior);

        return $this->getBangunanLongitudinals($query, $con);
    }

    /**
     * Clears out the collRuangs collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Bangunan The current object (for fluent API support)
     * @see        addRuangs()
     */
    public function clearRuangs()
    {
        $this->collRuangs = null; // important to set this to null since that means it is uninitialized
        $this->collRuangsPartial = null;

        return $this;
    }

    /**
     * reset is the collRuangs collection loaded partially
     *
     * @return void
     */
    public function resetPartialRuangs($v = true)
    {
        $this->collRuangsPartial = $v;
    }

    /**
     * Initializes the collRuangs collection.
     *
     * By default this just sets the collRuangs collection to an empty array (like clearcollRuangs());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initRuangs($overrideExisting = true)
    {
        if (null !== $this->collRuangs && !$overrideExisting) {
            return;
        }
        $this->collRuangs = new PropelObjectCollection();
        $this->collRuangs->setModel('Ruang');
    }

    /**
     * Gets an array of Ruang objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Bangunan is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Ruang[] List of Ruang objects
     * @throws PropelException
     */
    public function getRuangs($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collRuangsPartial && !$this->isNew();
        if (null === $this->collRuangs || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collRuangs) {
                // return empty collection
                $this->initRuangs();
            } else {
                $collRuangs = RuangQuery::create(null, $criteria)
                    ->filterByBangunan($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collRuangsPartial && count($collRuangs)) {
                      $this->initRuangs(false);

                      foreach($collRuangs as $obj) {
                        if (false == $this->collRuangs->contains($obj)) {
                          $this->collRuangs->append($obj);
                        }
                      }

                      $this->collRuangsPartial = true;
                    }

                    $collRuangs->getInternalIterator()->rewind();
                    return $collRuangs;
                }

                if($partial && $this->collRuangs) {
                    foreach($this->collRuangs as $obj) {
                        if($obj->isNew()) {
                            $collRuangs[] = $obj;
                        }
                    }
                }

                $this->collRuangs = $collRuangs;
                $this->collRuangsPartial = false;
            }
        }

        return $this->collRuangs;
    }

    /**
     * Sets a collection of Ruang objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $ruangs A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Bangunan The current object (for fluent API support)
     */
    public function setRuangs(PropelCollection $ruangs, PropelPDO $con = null)
    {
        $ruangsToDelete = $this->getRuangs(new Criteria(), $con)->diff($ruangs);

        $this->ruangsScheduledForDeletion = unserialize(serialize($ruangsToDelete));

        foreach ($ruangsToDelete as $ruangRemoved) {
            $ruangRemoved->setBangunan(null);
        }

        $this->collRuangs = null;
        foreach ($ruangs as $ruang) {
            $this->addRuang($ruang);
        }

        $this->collRuangs = $ruangs;
        $this->collRuangsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Ruang objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Ruang objects.
     * @throws PropelException
     */
    public function countRuangs(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collRuangsPartial && !$this->isNew();
        if (null === $this->collRuangs || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collRuangs) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getRuangs());
            }
            $query = RuangQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByBangunan($this)
                ->count($con);
        }

        return count($this->collRuangs);
    }

    /**
     * Method called to associate a Ruang object to this object
     * through the Ruang foreign key attribute.
     *
     * @param    Ruang $l Ruang
     * @return Bangunan The current object (for fluent API support)
     */
    public function addRuang(Ruang $l)
    {
        if ($this->collRuangs === null) {
            $this->initRuangs();
            $this->collRuangsPartial = true;
        }
        if (!in_array($l, $this->collRuangs->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddRuang($l);
        }

        return $this;
    }

    /**
     * @param	Ruang $ruang The ruang object to add.
     */
    protected function doAddRuang($ruang)
    {
        $this->collRuangs[]= $ruang;
        $ruang->setBangunan($this);
    }

    /**
     * @param	Ruang $ruang The ruang object to remove.
     * @return Bangunan The current object (for fluent API support)
     */
    public function removeRuang($ruang)
    {
        if ($this->getRuangs()->contains($ruang)) {
            $this->collRuangs->remove($this->collRuangs->search($ruang));
            if (null === $this->ruangsScheduledForDeletion) {
                $this->ruangsScheduledForDeletion = clone $this->collRuangs;
                $this->ruangsScheduledForDeletion->clear();
            }
            $this->ruangsScheduledForDeletion[]= clone $ruang;
            $ruang->setBangunan(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Bangunan is new, it will return
     * an empty collection; or if this Bangunan has previously
     * been saved, it will retrieve related Ruangs from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Bangunan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Ruang[] List of Ruang objects
     */
    public function getRuangsJoinRuangRelatedByParentIdRuang($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = RuangQuery::create(null, $criteria);
        $query->joinWith('RuangRelatedByParentIdRuang', $join_behavior);

        return $this->getRuangs($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Bangunan is new, it will return
     * an empty collection; or if this Bangunan has previously
     * been saved, it will retrieve related Ruangs from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Bangunan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Ruang[] List of Ruang objects
     */
    public function getRuangsJoinJenisPrasarana($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = RuangQuery::create(null, $criteria);
        $query->joinWith('JenisPrasarana', $join_behavior);

        return $this->getRuangs($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Bangunan is new, it will return
     * an empty collection; or if this Bangunan has previously
     * been saved, it will retrieve related Ruangs from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Bangunan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Ruang[] List of Ruang objects
     */
    public function getRuangsJoinSekolah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = RuangQuery::create(null, $criteria);
        $query->joinWith('Sekolah', $join_behavior);

        return $this->getRuangs($query, $con);
    }

    /**
     * Clears out the collVldBangunans collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Bangunan The current object (for fluent API support)
     * @see        addVldBangunans()
     */
    public function clearVldBangunans()
    {
        $this->collVldBangunans = null; // important to set this to null since that means it is uninitialized
        $this->collVldBangunansPartial = null;

        return $this;
    }

    /**
     * reset is the collVldBangunans collection loaded partially
     *
     * @return void
     */
    public function resetPartialVldBangunans($v = true)
    {
        $this->collVldBangunansPartial = $v;
    }

    /**
     * Initializes the collVldBangunans collection.
     *
     * By default this just sets the collVldBangunans collection to an empty array (like clearcollVldBangunans());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initVldBangunans($overrideExisting = true)
    {
        if (null !== $this->collVldBangunans && !$overrideExisting) {
            return;
        }
        $this->collVldBangunans = new PropelObjectCollection();
        $this->collVldBangunans->setModel('VldBangunan');
    }

    /**
     * Gets an array of VldBangunan objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Bangunan is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|VldBangunan[] List of VldBangunan objects
     * @throws PropelException
     */
    public function getVldBangunans($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collVldBangunansPartial && !$this->isNew();
        if (null === $this->collVldBangunans || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collVldBangunans) {
                // return empty collection
                $this->initVldBangunans();
            } else {
                $collVldBangunans = VldBangunanQuery::create(null, $criteria)
                    ->filterByBangunan($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collVldBangunansPartial && count($collVldBangunans)) {
                      $this->initVldBangunans(false);

                      foreach($collVldBangunans as $obj) {
                        if (false == $this->collVldBangunans->contains($obj)) {
                          $this->collVldBangunans->append($obj);
                        }
                      }

                      $this->collVldBangunansPartial = true;
                    }

                    $collVldBangunans->getInternalIterator()->rewind();
                    return $collVldBangunans;
                }

                if($partial && $this->collVldBangunans) {
                    foreach($this->collVldBangunans as $obj) {
                        if($obj->isNew()) {
                            $collVldBangunans[] = $obj;
                        }
                    }
                }

                $this->collVldBangunans = $collVldBangunans;
                $this->collVldBangunansPartial = false;
            }
        }

        return $this->collVldBangunans;
    }

    /**
     * Sets a collection of VldBangunan objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $vldBangunans A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Bangunan The current object (for fluent API support)
     */
    public function setVldBangunans(PropelCollection $vldBangunans, PropelPDO $con = null)
    {
        $vldBangunansToDelete = $this->getVldBangunans(new Criteria(), $con)->diff($vldBangunans);

        $this->vldBangunansScheduledForDeletion = unserialize(serialize($vldBangunansToDelete));

        foreach ($vldBangunansToDelete as $vldBangunanRemoved) {
            $vldBangunanRemoved->setBangunan(null);
        }

        $this->collVldBangunans = null;
        foreach ($vldBangunans as $vldBangunan) {
            $this->addVldBangunan($vldBangunan);
        }

        $this->collVldBangunans = $vldBangunans;
        $this->collVldBangunansPartial = false;

        return $this;
    }

    /**
     * Returns the number of related VldBangunan objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related VldBangunan objects.
     * @throws PropelException
     */
    public function countVldBangunans(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collVldBangunansPartial && !$this->isNew();
        if (null === $this->collVldBangunans || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collVldBangunans) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getVldBangunans());
            }
            $query = VldBangunanQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByBangunan($this)
                ->count($con);
        }

        return count($this->collVldBangunans);
    }

    /**
     * Method called to associate a VldBangunan object to this object
     * through the VldBangunan foreign key attribute.
     *
     * @param    VldBangunan $l VldBangunan
     * @return Bangunan The current object (for fluent API support)
     */
    public function addVldBangunan(VldBangunan $l)
    {
        if ($this->collVldBangunans === null) {
            $this->initVldBangunans();
            $this->collVldBangunansPartial = true;
        }
        if (!in_array($l, $this->collVldBangunans->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddVldBangunan($l);
        }

        return $this;
    }

    /**
     * @param	VldBangunan $vldBangunan The vldBangunan object to add.
     */
    protected function doAddVldBangunan($vldBangunan)
    {
        $this->collVldBangunans[]= $vldBangunan;
        $vldBangunan->setBangunan($this);
    }

    /**
     * @param	VldBangunan $vldBangunan The vldBangunan object to remove.
     * @return Bangunan The current object (for fluent API support)
     */
    public function removeVldBangunan($vldBangunan)
    {
        if ($this->getVldBangunans()->contains($vldBangunan)) {
            $this->collVldBangunans->remove($this->collVldBangunans->search($vldBangunan));
            if (null === $this->vldBangunansScheduledForDeletion) {
                $this->vldBangunansScheduledForDeletion = clone $this->collVldBangunans;
                $this->vldBangunansScheduledForDeletion->clear();
            }
            $this->vldBangunansScheduledForDeletion[]= clone $vldBangunan;
            $vldBangunan->setBangunan(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Bangunan is new, it will return
     * an empty collection; or if this Bangunan has previously
     * been saved, it will retrieve related VldBangunans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Bangunan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|VldBangunan[] List of VldBangunan objects
     */
    public function getVldBangunansJoinErrortype($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = VldBangunanQuery::create(null, $criteria);
        $query->joinWith('Errortype', $join_behavior);

        return $this->getVldBangunans($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id_bangunan = null;
        $this->jenis_prasarana_id = null;
        $this->sekolah_id = null;
        $this->id_tanah = null;
        $this->ptk_id = null;
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
        $this->jml_lantai = null;
        $this->thn_dibangun = null;
        $this->luas_tapak_bangunan = null;
        $this->vol_pondasi_m3 = null;
        $this->vol_sloop_kolom_balok_m3 = null;
        $this->panj_kudakuda_m = null;
        $this->vol_kudakuda_m3 = null;
        $this->panj_kaso_m = null;
        $this->panj_reng_m = null;
        $this->luas_tutup_atap_m2 = null;
        $this->kd_satker_tanah = null;
        $this->nm_satker_tanah = null;
        $this->kd_brg_tanah = null;
        $this->nm_brg_tanah = null;
        $this->nup_brg_tanah = null;
        $this->tgl_sk_pemakai = null;
        $this->tgl_hapus_buku = null;
        $this->ket_bangunan = null;
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
            if ($this->collBangunanDariBlockgrants) {
                foreach ($this->collBangunanDariBlockgrants as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collBangunanLongitudinals) {
                foreach ($this->collBangunanLongitudinals as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collRuangs) {
                foreach ($this->collRuangs as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collVldBangunans) {
                foreach ($this->collVldBangunans as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aPtk instanceof Persistent) {
              $this->aPtk->clearAllReferences($deep);
            }
            if ($this->aJenisHapusBuku instanceof Persistent) {
              $this->aJenisHapusBuku->clearAllReferences($deep);
            }
            if ($this->aTanah instanceof Persistent) {
              $this->aTanah->clearAllReferences($deep);
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

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collBangunanDariBlockgrants instanceof PropelCollection) {
            $this->collBangunanDariBlockgrants->clearIterator();
        }
        $this->collBangunanDariBlockgrants = null;
        if ($this->collBangunanLongitudinals instanceof PropelCollection) {
            $this->collBangunanLongitudinals->clearIterator();
        }
        $this->collBangunanLongitudinals = null;
        if ($this->collRuangs instanceof PropelCollection) {
            $this->collRuangs->clearIterator();
        }
        $this->collRuangs = null;
        if ($this->collVldBangunans instanceof PropelCollection) {
            $this->collVldBangunans->clearIterator();
        }
        $this->collVldBangunans = null;
        $this->aPtk = null;
        $this->aJenisHapusBuku = null;
        $this->aTanah = null;
        $this->aJenisPrasarana = null;
        $this->aSekolah = null;
        $this->aStatusKepemilikanSarpras = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(BangunanPeer::DEFAULT_STRING_FORMAT);
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
