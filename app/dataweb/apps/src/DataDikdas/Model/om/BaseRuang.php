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
use DataDikdas\Model\AlatQuery;
use DataDikdas\Model\Bangunan;
use DataDikdas\Model\BangunanQuery;
use DataDikdas\Model\Buku;
use DataDikdas\Model\BukuQuery;
use DataDikdas\Model\Jadwal;
use DataDikdas\Model\JadwalQuery;
use DataDikdas\Model\JenisPrasarana;
use DataDikdas\Model\JenisPrasaranaQuery;
use DataDikdas\Model\RombonganBelajar;
use DataDikdas\Model\RombonganBelajarQuery;
use DataDikdas\Model\Ruang;
use DataDikdas\Model\RuangLongitudinal;
use DataDikdas\Model\RuangLongitudinalQuery;
use DataDikdas\Model\RuangPeer;
use DataDikdas\Model\RuangQuery;
use DataDikdas\Model\Sekolah;
use DataDikdas\Model\SekolahQuery;
use DataDikdas\Model\TugasTambahan;
use DataDikdas\Model\TugasTambahanQuery;

/**
 * Base class that represents a row from the 'ruang' table.
 *
 * 
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseRuang extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'DataDikdas\\Model\\RuangPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        RuangPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the id_ruang field.
     * @var        string
     */
    protected $id_ruang;

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
     * The value for the parent_id_ruang field.
     * @var        string
     */
    protected $parent_id_ruang;

    /**
     * The value for the id_bangunan field.
     * @var        string
     */
    protected $id_bangunan;

    /**
     * The value for the asal_data field.
     * Note: this column has a database default value of: '1'
     * @var        string
     */
    protected $asal_data;

    /**
     * The value for the kd_ruang field.
     * @var        string
     */
    protected $kd_ruang;

    /**
     * The value for the nm_ruang field.
     * @var        string
     */
    protected $nm_ruang;

    /**
     * The value for the lantai field.
     * Note: this column has a database default value of: '1'
     * @var        string
     */
    protected $lantai;

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
     * The value for the reg_pras field.
     * @var        string
     */
    protected $reg_pras;

    /**
     * The value for the kapasitas field.
     * @var        string
     */
    protected $kapasitas;

    /**
     * The value for the luas_ruang field.
     * @var        double
     */
    protected $luas_ruang;

    /**
     * The value for the luas_plester_m2 field.
     * @var        string
     */
    protected $luas_plester_m2;

    /**
     * The value for the luas_plafon_m2 field.
     * @var        string
     */
    protected $luas_plafon_m2;

    /**
     * The value for the luas_dinding_m2 field.
     * @var        string
     */
    protected $luas_dinding_m2;

    /**
     * The value for the luas_daun_jendela_m2 field.
     * @var        string
     */
    protected $luas_daun_jendela_m2;

    /**
     * The value for the luas_daun_pintu_m2 field.
     * @var        string
     */
    protected $luas_daun_pintu_m2;

    /**
     * The value for the panj_kusen_m field.
     * @var        string
     */
    protected $panj_kusen_m;

    /**
     * The value for the luas_tutup_lantai_m2 field.
     * @var        string
     */
    protected $luas_tutup_lantai_m2;

    /**
     * The value for the panj_inst_listrik_m field.
     * @var        string
     */
    protected $panj_inst_listrik_m;

    /**
     * The value for the jml_inst_listrik field.
     * @var        string
     */
    protected $jml_inst_listrik;

    /**
     * The value for the panj_inst_air_m field.
     * @var        string
     */
    protected $panj_inst_air_m;

    /**
     * The value for the jml_inst_air field.
     * @var        string
     */
    protected $jml_inst_air;

    /**
     * The value for the panj_drainase_m field.
     * @var        string
     */
    protected $panj_drainase_m;

    /**
     * The value for the luas_finish_struktur_m2 field.
     * @var        string
     */
    protected $luas_finish_struktur_m2;

    /**
     * The value for the luas_finish_plafon_m2 field.
     * @var        string
     */
    protected $luas_finish_plafon_m2;

    /**
     * The value for the luas_finish_dinding_m2 field.
     * @var        string
     */
    protected $luas_finish_dinding_m2;

    /**
     * The value for the luas_finish_kpj_m2 field.
     * @var        string
     */
    protected $luas_finish_kpj_m2;

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
     * @var        Ruang
     */
    protected $aRuangRelatedByParentIdRuang;

    /**
     * @var        Bangunan
     */
    protected $aBangunan;

    /**
     * @var        JenisPrasarana
     */
    protected $aJenisPrasarana;

    /**
     * @var        Sekolah
     */
    protected $aSekolah;

    /**
     * @var        PropelObjectCollection|Alat[] Collection to store aggregation of Alat objects.
     */
    protected $collAlats;
    protected $collAlatsPartial;

    /**
     * @var        PropelObjectCollection|Buku[] Collection to store aggregation of Buku objects.
     */
    protected $collBukus;
    protected $collBukusPartial;

    /**
     * @var        PropelObjectCollection|Jadwal[] Collection to store aggregation of Jadwal objects.
     */
    protected $collJadwals;
    protected $collJadwalsPartial;

    /**
     * @var        PropelObjectCollection|RombonganBelajar[] Collection to store aggregation of RombonganBelajar objects.
     */
    protected $collRombonganBelajars;
    protected $collRombonganBelajarsPartial;

    /**
     * @var        PropelObjectCollection|Ruang[] Collection to store aggregation of Ruang objects.
     */
    protected $collRuangsRelatedByIdRuang;
    protected $collRuangsRelatedByIdRuangPartial;

    /**
     * @var        PropelObjectCollection|RuangLongitudinal[] Collection to store aggregation of RuangLongitudinal objects.
     */
    protected $collRuangLongitudinals;
    protected $collRuangLongitudinalsPartial;

    /**
     * @var        PropelObjectCollection|TugasTambahan[] Collection to store aggregation of TugasTambahan objects.
     */
    protected $collTugasTambahans;
    protected $collTugasTambahansPartial;

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
    protected $alatsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $bukusScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $jadwalsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $rombonganBelajarsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $ruangsRelatedByIdRuangScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $ruangLongitudinalsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $tugasTambahansScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->asal_data = '1';
        $this->lantai = '1';
        $this->create_date = '2021-06-07 11:49:57';
        $this->last_update = '2021-06-07 11:49:57';
        $this->last_sync = '1901-01-01 00:00:00';
    }

    /**
     * Initializes internal state of BaseRuang object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
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
     * Get the [parent_id_ruang] column value.
     * 
     * @return string
     */
    public function getParentIdRuang()
    {
        return $this->parent_id_ruang;
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
     * Get the [asal_data] column value.
     * 
     * @return string
     */
    public function getAsalData()
    {
        return $this->asal_data;
    }

    /**
     * Get the [kd_ruang] column value.
     * 
     * @return string
     */
    public function getKdRuang()
    {
        return $this->kd_ruang;
    }

    /**
     * Get the [nm_ruang] column value.
     * 
     * @return string
     */
    public function getNmRuang()
    {
        return $this->nm_ruang;
    }

    /**
     * Get the [lantai] column value.
     * 
     * @return string
     */
    public function getLantai()
    {
        return $this->lantai;
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
     * Get the [reg_pras] column value.
     * 
     * @return string
     */
    public function getRegPras()
    {
        return $this->reg_pras;
    }

    /**
     * Get the [kapasitas] column value.
     * 
     * @return string
     */
    public function getKapasitas()
    {
        return $this->kapasitas;
    }

    /**
     * Get the [luas_ruang] column value.
     * 
     * @return double
     */
    public function getLuasRuang()
    {
        return $this->luas_ruang;
    }

    /**
     * Get the [luas_plester_m2] column value.
     * 
     * @return string
     */
    public function getLuasPlesterM2()
    {
        return $this->luas_plester_m2;
    }

    /**
     * Get the [luas_plafon_m2] column value.
     * 
     * @return string
     */
    public function getLuasPlafonM2()
    {
        return $this->luas_plafon_m2;
    }

    /**
     * Get the [luas_dinding_m2] column value.
     * 
     * @return string
     */
    public function getLuasDindingM2()
    {
        return $this->luas_dinding_m2;
    }

    /**
     * Get the [luas_daun_jendela_m2] column value.
     * 
     * @return string
     */
    public function getLuasDaunJendelaM2()
    {
        return $this->luas_daun_jendela_m2;
    }

    /**
     * Get the [luas_daun_pintu_m2] column value.
     * 
     * @return string
     */
    public function getLuasDaunPintuM2()
    {
        return $this->luas_daun_pintu_m2;
    }

    /**
     * Get the [panj_kusen_m] column value.
     * 
     * @return string
     */
    public function getPanjKusenM()
    {
        return $this->panj_kusen_m;
    }

    /**
     * Get the [luas_tutup_lantai_m2] column value.
     * 
     * @return string
     */
    public function getLuasTutupLantaiM2()
    {
        return $this->luas_tutup_lantai_m2;
    }

    /**
     * Get the [panj_inst_listrik_m] column value.
     * 
     * @return string
     */
    public function getPanjInstListrikM()
    {
        return $this->panj_inst_listrik_m;
    }

    /**
     * Get the [jml_inst_listrik] column value.
     * 
     * @return string
     */
    public function getJmlInstListrik()
    {
        return $this->jml_inst_listrik;
    }

    /**
     * Get the [panj_inst_air_m] column value.
     * 
     * @return string
     */
    public function getPanjInstAirM()
    {
        return $this->panj_inst_air_m;
    }

    /**
     * Get the [jml_inst_air] column value.
     * 
     * @return string
     */
    public function getJmlInstAir()
    {
        return $this->jml_inst_air;
    }

    /**
     * Get the [panj_drainase_m] column value.
     * 
     * @return string
     */
    public function getPanjDrainaseM()
    {
        return $this->panj_drainase_m;
    }

    /**
     * Get the [luas_finish_struktur_m2] column value.
     * 
     * @return string
     */
    public function getLuasFinishStrukturM2()
    {
        return $this->luas_finish_struktur_m2;
    }

    /**
     * Get the [luas_finish_plafon_m2] column value.
     * 
     * @return string
     */
    public function getLuasFinishPlafonM2()
    {
        return $this->luas_finish_plafon_m2;
    }

    /**
     * Get the [luas_finish_dinding_m2] column value.
     * 
     * @return string
     */
    public function getLuasFinishDindingM2()
    {
        return $this->luas_finish_dinding_m2;
    }

    /**
     * Get the [luas_finish_kpj_m2] column value.
     * 
     * @return string
     */
    public function getLuasFinishKpjM2()
    {
        return $this->luas_finish_kpj_m2;
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
     * Set the value of [id_ruang] column.
     * 
     * @param string $v new value
     * @return Ruang The current object (for fluent API support)
     */
    public function setIdRuang($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->id_ruang !== $v) {
            $this->id_ruang = $v;
            $this->modifiedColumns[] = RuangPeer::ID_RUANG;
        }


        return $this;
    } // setIdRuang()

    /**
     * Set the value of [jenis_prasarana_id] column.
     * 
     * @param int $v new value
     * @return Ruang The current object (for fluent API support)
     */
    public function setJenisPrasaranaId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->jenis_prasarana_id !== $v) {
            $this->jenis_prasarana_id = $v;
            $this->modifiedColumns[] = RuangPeer::JENIS_PRASARANA_ID;
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
     * @return Ruang The current object (for fluent API support)
     */
    public function setSekolahId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->sekolah_id !== $v) {
            $this->sekolah_id = $v;
            $this->modifiedColumns[] = RuangPeer::SEKOLAH_ID;
        }

        if ($this->aSekolah !== null && $this->aSekolah->getSekolahId() !== $v) {
            $this->aSekolah = null;
        }


        return $this;
    } // setSekolahId()

    /**
     * Set the value of [parent_id_ruang] column.
     * 
     * @param string $v new value
     * @return Ruang The current object (for fluent API support)
     */
    public function setParentIdRuang($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->parent_id_ruang !== $v) {
            $this->parent_id_ruang = $v;
            $this->modifiedColumns[] = RuangPeer::PARENT_ID_RUANG;
        }

        if ($this->aRuangRelatedByParentIdRuang !== null && $this->aRuangRelatedByParentIdRuang->getIdRuang() !== $v) {
            $this->aRuangRelatedByParentIdRuang = null;
        }


        return $this;
    } // setParentIdRuang()

    /**
     * Set the value of [id_bangunan] column.
     * 
     * @param string $v new value
     * @return Ruang The current object (for fluent API support)
     */
    public function setIdBangunan($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->id_bangunan !== $v) {
            $this->id_bangunan = $v;
            $this->modifiedColumns[] = RuangPeer::ID_BANGUNAN;
        }

        if ($this->aBangunan !== null && $this->aBangunan->getIdBangunan() !== $v) {
            $this->aBangunan = null;
        }


        return $this;
    } // setIdBangunan()

    /**
     * Set the value of [asal_data] column.
     * 
     * @param string $v new value
     * @return Ruang The current object (for fluent API support)
     */
    public function setAsalData($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->asal_data !== $v) {
            $this->asal_data = $v;
            $this->modifiedColumns[] = RuangPeer::ASAL_DATA;
        }


        return $this;
    } // setAsalData()

    /**
     * Set the value of [kd_ruang] column.
     * 
     * @param string $v new value
     * @return Ruang The current object (for fluent API support)
     */
    public function setKdRuang($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->kd_ruang !== $v) {
            $this->kd_ruang = $v;
            $this->modifiedColumns[] = RuangPeer::KD_RUANG;
        }


        return $this;
    } // setKdRuang()

    /**
     * Set the value of [nm_ruang] column.
     * 
     * @param string $v new value
     * @return Ruang The current object (for fluent API support)
     */
    public function setNmRuang($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nm_ruang !== $v) {
            $this->nm_ruang = $v;
            $this->modifiedColumns[] = RuangPeer::NM_RUANG;
        }


        return $this;
    } // setNmRuang()

    /**
     * Set the value of [lantai] column.
     * 
     * @param string $v new value
     * @return Ruang The current object (for fluent API support)
     */
    public function setLantai($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->lantai !== $v) {
            $this->lantai = $v;
            $this->modifiedColumns[] = RuangPeer::LANTAI;
        }


        return $this;
    } // setLantai()

    /**
     * Set the value of [panjang] column.
     * 
     * @param double $v new value
     * @return Ruang The current object (for fluent API support)
     */
    public function setPanjang($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (double) $v;
        }

        if ($this->panjang !== $v) {
            $this->panjang = $v;
            $this->modifiedColumns[] = RuangPeer::PANJANG;
        }


        return $this;
    } // setPanjang()

    /**
     * Set the value of [lebar] column.
     * 
     * @param double $v new value
     * @return Ruang The current object (for fluent API support)
     */
    public function setLebar($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (double) $v;
        }

        if ($this->lebar !== $v) {
            $this->lebar = $v;
            $this->modifiedColumns[] = RuangPeer::LEBAR;
        }


        return $this;
    } // setLebar()

    /**
     * Set the value of [reg_pras] column.
     * 
     * @param string $v new value
     * @return Ruang The current object (for fluent API support)
     */
    public function setRegPras($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->reg_pras !== $v) {
            $this->reg_pras = $v;
            $this->modifiedColumns[] = RuangPeer::REG_PRAS;
        }


        return $this;
    } // setRegPras()

    /**
     * Set the value of [kapasitas] column.
     * 
     * @param string $v new value
     * @return Ruang The current object (for fluent API support)
     */
    public function setKapasitas($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->kapasitas !== $v) {
            $this->kapasitas = $v;
            $this->modifiedColumns[] = RuangPeer::KAPASITAS;
        }


        return $this;
    } // setKapasitas()

    /**
     * Set the value of [luas_ruang] column.
     * 
     * @param double $v new value
     * @return Ruang The current object (for fluent API support)
     */
    public function setLuasRuang($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (double) $v;
        }

        if ($this->luas_ruang !== $v) {
            $this->luas_ruang = $v;
            $this->modifiedColumns[] = RuangPeer::LUAS_RUANG;
        }


        return $this;
    } // setLuasRuang()

    /**
     * Set the value of [luas_plester_m2] column.
     * 
     * @param string $v new value
     * @return Ruang The current object (for fluent API support)
     */
    public function setLuasPlesterM2($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->luas_plester_m2 !== $v) {
            $this->luas_plester_m2 = $v;
            $this->modifiedColumns[] = RuangPeer::LUAS_PLESTER_M2;
        }


        return $this;
    } // setLuasPlesterM2()

    /**
     * Set the value of [luas_plafon_m2] column.
     * 
     * @param string $v new value
     * @return Ruang The current object (for fluent API support)
     */
    public function setLuasPlafonM2($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->luas_plafon_m2 !== $v) {
            $this->luas_plafon_m2 = $v;
            $this->modifiedColumns[] = RuangPeer::LUAS_PLAFON_M2;
        }


        return $this;
    } // setLuasPlafonM2()

    /**
     * Set the value of [luas_dinding_m2] column.
     * 
     * @param string $v new value
     * @return Ruang The current object (for fluent API support)
     */
    public function setLuasDindingM2($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->luas_dinding_m2 !== $v) {
            $this->luas_dinding_m2 = $v;
            $this->modifiedColumns[] = RuangPeer::LUAS_DINDING_M2;
        }


        return $this;
    } // setLuasDindingM2()

    /**
     * Set the value of [luas_daun_jendela_m2] column.
     * 
     * @param string $v new value
     * @return Ruang The current object (for fluent API support)
     */
    public function setLuasDaunJendelaM2($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->luas_daun_jendela_m2 !== $v) {
            $this->luas_daun_jendela_m2 = $v;
            $this->modifiedColumns[] = RuangPeer::LUAS_DAUN_JENDELA_M2;
        }


        return $this;
    } // setLuasDaunJendelaM2()

    /**
     * Set the value of [luas_daun_pintu_m2] column.
     * 
     * @param string $v new value
     * @return Ruang The current object (for fluent API support)
     */
    public function setLuasDaunPintuM2($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->luas_daun_pintu_m2 !== $v) {
            $this->luas_daun_pintu_m2 = $v;
            $this->modifiedColumns[] = RuangPeer::LUAS_DAUN_PINTU_M2;
        }


        return $this;
    } // setLuasDaunPintuM2()

    /**
     * Set the value of [panj_kusen_m] column.
     * 
     * @param string $v new value
     * @return Ruang The current object (for fluent API support)
     */
    public function setPanjKusenM($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->panj_kusen_m !== $v) {
            $this->panj_kusen_m = $v;
            $this->modifiedColumns[] = RuangPeer::PANJ_KUSEN_M;
        }


        return $this;
    } // setPanjKusenM()

    /**
     * Set the value of [luas_tutup_lantai_m2] column.
     * 
     * @param string $v new value
     * @return Ruang The current object (for fluent API support)
     */
    public function setLuasTutupLantaiM2($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->luas_tutup_lantai_m2 !== $v) {
            $this->luas_tutup_lantai_m2 = $v;
            $this->modifiedColumns[] = RuangPeer::LUAS_TUTUP_LANTAI_M2;
        }


        return $this;
    } // setLuasTutupLantaiM2()

    /**
     * Set the value of [panj_inst_listrik_m] column.
     * 
     * @param string $v new value
     * @return Ruang The current object (for fluent API support)
     */
    public function setPanjInstListrikM($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->panj_inst_listrik_m !== $v) {
            $this->panj_inst_listrik_m = $v;
            $this->modifiedColumns[] = RuangPeer::PANJ_INST_LISTRIK_M;
        }


        return $this;
    } // setPanjInstListrikM()

    /**
     * Set the value of [jml_inst_listrik] column.
     * 
     * @param string $v new value
     * @return Ruang The current object (for fluent API support)
     */
    public function setJmlInstListrik($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->jml_inst_listrik !== $v) {
            $this->jml_inst_listrik = $v;
            $this->modifiedColumns[] = RuangPeer::JML_INST_LISTRIK;
        }


        return $this;
    } // setJmlInstListrik()

    /**
     * Set the value of [panj_inst_air_m] column.
     * 
     * @param string $v new value
     * @return Ruang The current object (for fluent API support)
     */
    public function setPanjInstAirM($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->panj_inst_air_m !== $v) {
            $this->panj_inst_air_m = $v;
            $this->modifiedColumns[] = RuangPeer::PANJ_INST_AIR_M;
        }


        return $this;
    } // setPanjInstAirM()

    /**
     * Set the value of [jml_inst_air] column.
     * 
     * @param string $v new value
     * @return Ruang The current object (for fluent API support)
     */
    public function setJmlInstAir($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->jml_inst_air !== $v) {
            $this->jml_inst_air = $v;
            $this->modifiedColumns[] = RuangPeer::JML_INST_AIR;
        }


        return $this;
    } // setJmlInstAir()

    /**
     * Set the value of [panj_drainase_m] column.
     * 
     * @param string $v new value
     * @return Ruang The current object (for fluent API support)
     */
    public function setPanjDrainaseM($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->panj_drainase_m !== $v) {
            $this->panj_drainase_m = $v;
            $this->modifiedColumns[] = RuangPeer::PANJ_DRAINASE_M;
        }


        return $this;
    } // setPanjDrainaseM()

    /**
     * Set the value of [luas_finish_struktur_m2] column.
     * 
     * @param string $v new value
     * @return Ruang The current object (for fluent API support)
     */
    public function setLuasFinishStrukturM2($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->luas_finish_struktur_m2 !== $v) {
            $this->luas_finish_struktur_m2 = $v;
            $this->modifiedColumns[] = RuangPeer::LUAS_FINISH_STRUKTUR_M2;
        }


        return $this;
    } // setLuasFinishStrukturM2()

    /**
     * Set the value of [luas_finish_plafon_m2] column.
     * 
     * @param string $v new value
     * @return Ruang The current object (for fluent API support)
     */
    public function setLuasFinishPlafonM2($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->luas_finish_plafon_m2 !== $v) {
            $this->luas_finish_plafon_m2 = $v;
            $this->modifiedColumns[] = RuangPeer::LUAS_FINISH_PLAFON_M2;
        }


        return $this;
    } // setLuasFinishPlafonM2()

    /**
     * Set the value of [luas_finish_dinding_m2] column.
     * 
     * @param string $v new value
     * @return Ruang The current object (for fluent API support)
     */
    public function setLuasFinishDindingM2($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->luas_finish_dinding_m2 !== $v) {
            $this->luas_finish_dinding_m2 = $v;
            $this->modifiedColumns[] = RuangPeer::LUAS_FINISH_DINDING_M2;
        }


        return $this;
    } // setLuasFinishDindingM2()

    /**
     * Set the value of [luas_finish_kpj_m2] column.
     * 
     * @param string $v new value
     * @return Ruang The current object (for fluent API support)
     */
    public function setLuasFinishKpjM2($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->luas_finish_kpj_m2 !== $v) {
            $this->luas_finish_kpj_m2 = $v;
            $this->modifiedColumns[] = RuangPeer::LUAS_FINISH_KPJ_M2;
        }


        return $this;
    } // setLuasFinishKpjM2()

    /**
     * Sets the value of [create_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Ruang The current object (for fluent API support)
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
                $this->modifiedColumns[] = RuangPeer::CREATE_DATE;
            }
        } // if either are not null


        return $this;
    } // setCreateDate()

    /**
     * Sets the value of [last_update] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Ruang The current object (for fluent API support)
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
                $this->modifiedColumns[] = RuangPeer::LAST_UPDATE;
            }
        } // if either are not null


        return $this;
    } // setLastUpdate()

    /**
     * Set the value of [soft_delete] column.
     * 
     * @param string $v new value
     * @return Ruang The current object (for fluent API support)
     */
    public function setSoftDelete($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->soft_delete !== $v) {
            $this->soft_delete = $v;
            $this->modifiedColumns[] = RuangPeer::SOFT_DELETE;
        }


        return $this;
    } // setSoftDelete()

    /**
     * Sets the value of [last_sync] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Ruang The current object (for fluent API support)
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
                $this->modifiedColumns[] = RuangPeer::LAST_SYNC;
            }
        } // if either are not null


        return $this;
    } // setLastSync()

    /**
     * Set the value of [updater_id] column.
     * 
     * @param string $v new value
     * @return Ruang The current object (for fluent API support)
     */
    public function setUpdaterId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->updater_id !== $v) {
            $this->updater_id = $v;
            $this->modifiedColumns[] = RuangPeer::UPDATER_ID;
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

            if ($this->lantai !== '1') {
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

            $this->id_ruang = ($row[$startcol + 0] !== null) ? (string) $row[$startcol + 0] : null;
            $this->jenis_prasarana_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->sekolah_id = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->parent_id_ruang = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->id_bangunan = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->asal_data = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->kd_ruang = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->nm_ruang = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->lantai = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->panjang = ($row[$startcol + 9] !== null) ? (double) $row[$startcol + 9] : null;
            $this->lebar = ($row[$startcol + 10] !== null) ? (double) $row[$startcol + 10] : null;
            $this->reg_pras = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
            $this->kapasitas = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
            $this->luas_ruang = ($row[$startcol + 13] !== null) ? (double) $row[$startcol + 13] : null;
            $this->luas_plester_m2 = ($row[$startcol + 14] !== null) ? (string) $row[$startcol + 14] : null;
            $this->luas_plafon_m2 = ($row[$startcol + 15] !== null) ? (string) $row[$startcol + 15] : null;
            $this->luas_dinding_m2 = ($row[$startcol + 16] !== null) ? (string) $row[$startcol + 16] : null;
            $this->luas_daun_jendela_m2 = ($row[$startcol + 17] !== null) ? (string) $row[$startcol + 17] : null;
            $this->luas_daun_pintu_m2 = ($row[$startcol + 18] !== null) ? (string) $row[$startcol + 18] : null;
            $this->panj_kusen_m = ($row[$startcol + 19] !== null) ? (string) $row[$startcol + 19] : null;
            $this->luas_tutup_lantai_m2 = ($row[$startcol + 20] !== null) ? (string) $row[$startcol + 20] : null;
            $this->panj_inst_listrik_m = ($row[$startcol + 21] !== null) ? (string) $row[$startcol + 21] : null;
            $this->jml_inst_listrik = ($row[$startcol + 22] !== null) ? (string) $row[$startcol + 22] : null;
            $this->panj_inst_air_m = ($row[$startcol + 23] !== null) ? (string) $row[$startcol + 23] : null;
            $this->jml_inst_air = ($row[$startcol + 24] !== null) ? (string) $row[$startcol + 24] : null;
            $this->panj_drainase_m = ($row[$startcol + 25] !== null) ? (string) $row[$startcol + 25] : null;
            $this->luas_finish_struktur_m2 = ($row[$startcol + 26] !== null) ? (string) $row[$startcol + 26] : null;
            $this->luas_finish_plafon_m2 = ($row[$startcol + 27] !== null) ? (string) $row[$startcol + 27] : null;
            $this->luas_finish_dinding_m2 = ($row[$startcol + 28] !== null) ? (string) $row[$startcol + 28] : null;
            $this->luas_finish_kpj_m2 = ($row[$startcol + 29] !== null) ? (string) $row[$startcol + 29] : null;
            $this->create_date = ($row[$startcol + 30] !== null) ? (string) $row[$startcol + 30] : null;
            $this->last_update = ($row[$startcol + 31] !== null) ? (string) $row[$startcol + 31] : null;
            $this->soft_delete = ($row[$startcol + 32] !== null) ? (string) $row[$startcol + 32] : null;
            $this->last_sync = ($row[$startcol + 33] !== null) ? (string) $row[$startcol + 33] : null;
            $this->updater_id = ($row[$startcol + 34] !== null) ? (string) $row[$startcol + 34] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 35; // 35 = RuangPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Ruang object", $e);
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
        if ($this->aRuangRelatedByParentIdRuang !== null && $this->parent_id_ruang !== $this->aRuangRelatedByParentIdRuang->getIdRuang()) {
            $this->aRuangRelatedByParentIdRuang = null;
        }
        if ($this->aBangunan !== null && $this->id_bangunan !== $this->aBangunan->getIdBangunan()) {
            $this->aBangunan = null;
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
            $con = Propel::getConnection(RuangPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = RuangPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aRuangRelatedByParentIdRuang = null;
            $this->aBangunan = null;
            $this->aJenisPrasarana = null;
            $this->aSekolah = null;
            $this->collAlats = null;

            $this->collBukus = null;

            $this->collJadwals = null;

            $this->collRombonganBelajars = null;

            $this->collRuangsRelatedByIdRuang = null;

            $this->collRuangLongitudinals = null;

            $this->collTugasTambahans = null;

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
            $con = Propel::getConnection(RuangPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = RuangQuery::create()
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
            $con = Propel::getConnection(RuangPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                RuangPeer::addInstanceToPool($this);
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

            if ($this->aRuangRelatedByParentIdRuang !== null) {
                if ($this->aRuangRelatedByParentIdRuang->isModified() || $this->aRuangRelatedByParentIdRuang->isNew()) {
                    $affectedRows += $this->aRuangRelatedByParentIdRuang->save($con);
                }
                $this->setRuangRelatedByParentIdRuang($this->aRuangRelatedByParentIdRuang);
            }

            if ($this->aBangunan !== null) {
                if ($this->aBangunan->isModified() || $this->aBangunan->isNew()) {
                    $affectedRows += $this->aBangunan->save($con);
                }
                $this->setBangunan($this->aBangunan);
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

            if ($this->alatsScheduledForDeletion !== null) {
                if (!$this->alatsScheduledForDeletion->isEmpty()) {
                    foreach ($this->alatsScheduledForDeletion as $alat) {
                        // need to save related object because we set the relation to null
                        $alat->save($con);
                    }
                    $this->alatsScheduledForDeletion = null;
                }
            }

            if ($this->collAlats !== null) {
                foreach ($this->collAlats as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->bukusScheduledForDeletion !== null) {
                if (!$this->bukusScheduledForDeletion->isEmpty()) {
                    foreach ($this->bukusScheduledForDeletion as $buku) {
                        // need to save related object because we set the relation to null
                        $buku->save($con);
                    }
                    $this->bukusScheduledForDeletion = null;
                }
            }

            if ($this->collBukus !== null) {
                foreach ($this->collBukus as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
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

            if ($this->ruangsRelatedByIdRuangScheduledForDeletion !== null) {
                if (!$this->ruangsRelatedByIdRuangScheduledForDeletion->isEmpty()) {
                    foreach ($this->ruangsRelatedByIdRuangScheduledForDeletion as $ruangRelatedByIdRuang) {
                        // need to save related object because we set the relation to null
                        $ruangRelatedByIdRuang->save($con);
                    }
                    $this->ruangsRelatedByIdRuangScheduledForDeletion = null;
                }
            }

            if ($this->collRuangsRelatedByIdRuang !== null) {
                foreach ($this->collRuangsRelatedByIdRuang as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->ruangLongitudinalsScheduledForDeletion !== null) {
                if (!$this->ruangLongitudinalsScheduledForDeletion->isEmpty()) {
                    RuangLongitudinalQuery::create()
                        ->filterByPrimaryKeys($this->ruangLongitudinalsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->ruangLongitudinalsScheduledForDeletion = null;
                }
            }

            if ($this->collRuangLongitudinals !== null) {
                foreach ($this->collRuangLongitudinals as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->tugasTambahansScheduledForDeletion !== null) {
                if (!$this->tugasTambahansScheduledForDeletion->isEmpty()) {
                    foreach ($this->tugasTambahansScheduledForDeletion as $tugasTambahan) {
                        // need to save related object because we set the relation to null
                        $tugasTambahan->save($con);
                    }
                    $this->tugasTambahansScheduledForDeletion = null;
                }
            }

            if ($this->collTugasTambahans !== null) {
                foreach ($this->collTugasTambahans as $referrerFK) {
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
        if ($this->isColumnModified(RuangPeer::ID_RUANG)) {
            $modifiedColumns[':p' . $index++]  = '"id_ruang"';
        }
        if ($this->isColumnModified(RuangPeer::JENIS_PRASARANA_ID)) {
            $modifiedColumns[':p' . $index++]  = '"jenis_prasarana_id"';
        }
        if ($this->isColumnModified(RuangPeer::SEKOLAH_ID)) {
            $modifiedColumns[':p' . $index++]  = '"sekolah_id"';
        }
        if ($this->isColumnModified(RuangPeer::PARENT_ID_RUANG)) {
            $modifiedColumns[':p' . $index++]  = '"parent_id_ruang"';
        }
        if ($this->isColumnModified(RuangPeer::ID_BANGUNAN)) {
            $modifiedColumns[':p' . $index++]  = '"id_bangunan"';
        }
        if ($this->isColumnModified(RuangPeer::ASAL_DATA)) {
            $modifiedColumns[':p' . $index++]  = '"asal_data"';
        }
        if ($this->isColumnModified(RuangPeer::KD_RUANG)) {
            $modifiedColumns[':p' . $index++]  = '"kd_ruang"';
        }
        if ($this->isColumnModified(RuangPeer::NM_RUANG)) {
            $modifiedColumns[':p' . $index++]  = '"nm_ruang"';
        }
        if ($this->isColumnModified(RuangPeer::LANTAI)) {
            $modifiedColumns[':p' . $index++]  = '"lantai"';
        }
        if ($this->isColumnModified(RuangPeer::PANJANG)) {
            $modifiedColumns[':p' . $index++]  = '"panjang"';
        }
        if ($this->isColumnModified(RuangPeer::LEBAR)) {
            $modifiedColumns[':p' . $index++]  = '"lebar"';
        }
        if ($this->isColumnModified(RuangPeer::REG_PRAS)) {
            $modifiedColumns[':p' . $index++]  = '"reg_pras"';
        }
        if ($this->isColumnModified(RuangPeer::KAPASITAS)) {
            $modifiedColumns[':p' . $index++]  = '"kapasitas"';
        }
        if ($this->isColumnModified(RuangPeer::LUAS_RUANG)) {
            $modifiedColumns[':p' . $index++]  = '"luas_ruang"';
        }
        if ($this->isColumnModified(RuangPeer::LUAS_PLESTER_M2)) {
            $modifiedColumns[':p' . $index++]  = '"luas_plester_m2"';
        }
        if ($this->isColumnModified(RuangPeer::LUAS_PLAFON_M2)) {
            $modifiedColumns[':p' . $index++]  = '"luas_plafon_m2"';
        }
        if ($this->isColumnModified(RuangPeer::LUAS_DINDING_M2)) {
            $modifiedColumns[':p' . $index++]  = '"luas_dinding_m2"';
        }
        if ($this->isColumnModified(RuangPeer::LUAS_DAUN_JENDELA_M2)) {
            $modifiedColumns[':p' . $index++]  = '"luas_daun_jendela_m2"';
        }
        if ($this->isColumnModified(RuangPeer::LUAS_DAUN_PINTU_M2)) {
            $modifiedColumns[':p' . $index++]  = '"luas_daun_pintu_m2"';
        }
        if ($this->isColumnModified(RuangPeer::PANJ_KUSEN_M)) {
            $modifiedColumns[':p' . $index++]  = '"panj_kusen_m"';
        }
        if ($this->isColumnModified(RuangPeer::LUAS_TUTUP_LANTAI_M2)) {
            $modifiedColumns[':p' . $index++]  = '"luas_tutup_lantai_m2"';
        }
        if ($this->isColumnModified(RuangPeer::PANJ_INST_LISTRIK_M)) {
            $modifiedColumns[':p' . $index++]  = '"panj_inst_listrik_m"';
        }
        if ($this->isColumnModified(RuangPeer::JML_INST_LISTRIK)) {
            $modifiedColumns[':p' . $index++]  = '"jml_inst_listrik"';
        }
        if ($this->isColumnModified(RuangPeer::PANJ_INST_AIR_M)) {
            $modifiedColumns[':p' . $index++]  = '"panj_inst_air_m"';
        }
        if ($this->isColumnModified(RuangPeer::JML_INST_AIR)) {
            $modifiedColumns[':p' . $index++]  = '"jml_inst_air"';
        }
        if ($this->isColumnModified(RuangPeer::PANJ_DRAINASE_M)) {
            $modifiedColumns[':p' . $index++]  = '"panj_drainase_m"';
        }
        if ($this->isColumnModified(RuangPeer::LUAS_FINISH_STRUKTUR_M2)) {
            $modifiedColumns[':p' . $index++]  = '"luas_finish_struktur_m2"';
        }
        if ($this->isColumnModified(RuangPeer::LUAS_FINISH_PLAFON_M2)) {
            $modifiedColumns[':p' . $index++]  = '"luas_finish_plafon_m2"';
        }
        if ($this->isColumnModified(RuangPeer::LUAS_FINISH_DINDING_M2)) {
            $modifiedColumns[':p' . $index++]  = '"luas_finish_dinding_m2"';
        }
        if ($this->isColumnModified(RuangPeer::LUAS_FINISH_KPJ_M2)) {
            $modifiedColumns[':p' . $index++]  = '"luas_finish_kpj_m2"';
        }
        if ($this->isColumnModified(RuangPeer::CREATE_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"create_date"';
        }
        if ($this->isColumnModified(RuangPeer::LAST_UPDATE)) {
            $modifiedColumns[':p' . $index++]  = '"last_update"';
        }
        if ($this->isColumnModified(RuangPeer::SOFT_DELETE)) {
            $modifiedColumns[':p' . $index++]  = '"soft_delete"';
        }
        if ($this->isColumnModified(RuangPeer::LAST_SYNC)) {
            $modifiedColumns[':p' . $index++]  = '"last_sync"';
        }
        if ($this->isColumnModified(RuangPeer::UPDATER_ID)) {
            $modifiedColumns[':p' . $index++]  = '"updater_id"';
        }

        $sql = sprintf(
            'INSERT INTO "ruang" (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '"id_ruang"':						
                        $stmt->bindValue($identifier, $this->id_ruang, PDO::PARAM_STR);
                        break;
                    case '"jenis_prasarana_id"':						
                        $stmt->bindValue($identifier, $this->jenis_prasarana_id, PDO::PARAM_INT);
                        break;
                    case '"sekolah_id"':						
                        $stmt->bindValue($identifier, $this->sekolah_id, PDO::PARAM_STR);
                        break;
                    case '"parent_id_ruang"':						
                        $stmt->bindValue($identifier, $this->parent_id_ruang, PDO::PARAM_STR);
                        break;
                    case '"id_bangunan"':						
                        $stmt->bindValue($identifier, $this->id_bangunan, PDO::PARAM_STR);
                        break;
                    case '"asal_data"':						
                        $stmt->bindValue($identifier, $this->asal_data, PDO::PARAM_STR);
                        break;
                    case '"kd_ruang"':						
                        $stmt->bindValue($identifier, $this->kd_ruang, PDO::PARAM_STR);
                        break;
                    case '"nm_ruang"':						
                        $stmt->bindValue($identifier, $this->nm_ruang, PDO::PARAM_STR);
                        break;
                    case '"lantai"':						
                        $stmt->bindValue($identifier, $this->lantai, PDO::PARAM_STR);
                        break;
                    case '"panjang"':						
                        $stmt->bindValue($identifier, $this->panjang, PDO::PARAM_STR);
                        break;
                    case '"lebar"':						
                        $stmt->bindValue($identifier, $this->lebar, PDO::PARAM_STR);
                        break;
                    case '"reg_pras"':						
                        $stmt->bindValue($identifier, $this->reg_pras, PDO::PARAM_STR);
                        break;
                    case '"kapasitas"':						
                        $stmt->bindValue($identifier, $this->kapasitas, PDO::PARAM_STR);
                        break;
                    case '"luas_ruang"':						
                        $stmt->bindValue($identifier, $this->luas_ruang, PDO::PARAM_STR);
                        break;
                    case '"luas_plester_m2"':						
                        $stmt->bindValue($identifier, $this->luas_plester_m2, PDO::PARAM_STR);
                        break;
                    case '"luas_plafon_m2"':						
                        $stmt->bindValue($identifier, $this->luas_plafon_m2, PDO::PARAM_STR);
                        break;
                    case '"luas_dinding_m2"':						
                        $stmt->bindValue($identifier, $this->luas_dinding_m2, PDO::PARAM_STR);
                        break;
                    case '"luas_daun_jendela_m2"':						
                        $stmt->bindValue($identifier, $this->luas_daun_jendela_m2, PDO::PARAM_STR);
                        break;
                    case '"luas_daun_pintu_m2"':						
                        $stmt->bindValue($identifier, $this->luas_daun_pintu_m2, PDO::PARAM_STR);
                        break;
                    case '"panj_kusen_m"':						
                        $stmt->bindValue($identifier, $this->panj_kusen_m, PDO::PARAM_STR);
                        break;
                    case '"luas_tutup_lantai_m2"':						
                        $stmt->bindValue($identifier, $this->luas_tutup_lantai_m2, PDO::PARAM_STR);
                        break;
                    case '"panj_inst_listrik_m"':						
                        $stmt->bindValue($identifier, $this->panj_inst_listrik_m, PDO::PARAM_STR);
                        break;
                    case '"jml_inst_listrik"':						
                        $stmt->bindValue($identifier, $this->jml_inst_listrik, PDO::PARAM_STR);
                        break;
                    case '"panj_inst_air_m"':						
                        $stmt->bindValue($identifier, $this->panj_inst_air_m, PDO::PARAM_STR);
                        break;
                    case '"jml_inst_air"':						
                        $stmt->bindValue($identifier, $this->jml_inst_air, PDO::PARAM_STR);
                        break;
                    case '"panj_drainase_m"':						
                        $stmt->bindValue($identifier, $this->panj_drainase_m, PDO::PARAM_STR);
                        break;
                    case '"luas_finish_struktur_m2"':						
                        $stmt->bindValue($identifier, $this->luas_finish_struktur_m2, PDO::PARAM_STR);
                        break;
                    case '"luas_finish_plafon_m2"':						
                        $stmt->bindValue($identifier, $this->luas_finish_plafon_m2, PDO::PARAM_STR);
                        break;
                    case '"luas_finish_dinding_m2"':						
                        $stmt->bindValue($identifier, $this->luas_finish_dinding_m2, PDO::PARAM_STR);
                        break;
                    case '"luas_finish_kpj_m2"':						
                        $stmt->bindValue($identifier, $this->luas_finish_kpj_m2, PDO::PARAM_STR);
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

            if ($this->aRuangRelatedByParentIdRuang !== null) {
                if (!$this->aRuangRelatedByParentIdRuang->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aRuangRelatedByParentIdRuang->getValidationFailures());
                }
            }

            if ($this->aBangunan !== null) {
                if (!$this->aBangunan->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aBangunan->getValidationFailures());
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


            if (($retval = RuangPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collAlats !== null) {
                    foreach ($this->collAlats as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collBukus !== null) {
                    foreach ($this->collBukus as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collJadwals !== null) {
                    foreach ($this->collJadwals as $referrerFK) {
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

                if ($this->collRuangsRelatedByIdRuang !== null) {
                    foreach ($this->collRuangsRelatedByIdRuang as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collRuangLongitudinals !== null) {
                    foreach ($this->collRuangLongitudinals as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collTugasTambahans !== null) {
                    foreach ($this->collTugasTambahans as $referrerFK) {
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
        $pos = RuangPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdRuang();
                break;
            case 1:
                return $this->getJenisPrasaranaId();
                break;
            case 2:
                return $this->getSekolahId();
                break;
            case 3:
                return $this->getParentIdRuang();
                break;
            case 4:
                return $this->getIdBangunan();
                break;
            case 5:
                return $this->getAsalData();
                break;
            case 6:
                return $this->getKdRuang();
                break;
            case 7:
                return $this->getNmRuang();
                break;
            case 8:
                return $this->getLantai();
                break;
            case 9:
                return $this->getPanjang();
                break;
            case 10:
                return $this->getLebar();
                break;
            case 11:
                return $this->getRegPras();
                break;
            case 12:
                return $this->getKapasitas();
                break;
            case 13:
                return $this->getLuasRuang();
                break;
            case 14:
                return $this->getLuasPlesterM2();
                break;
            case 15:
                return $this->getLuasPlafonM2();
                break;
            case 16:
                return $this->getLuasDindingM2();
                break;
            case 17:
                return $this->getLuasDaunJendelaM2();
                break;
            case 18:
                return $this->getLuasDaunPintuM2();
                break;
            case 19:
                return $this->getPanjKusenM();
                break;
            case 20:
                return $this->getLuasTutupLantaiM2();
                break;
            case 21:
                return $this->getPanjInstListrikM();
                break;
            case 22:
                return $this->getJmlInstListrik();
                break;
            case 23:
                return $this->getPanjInstAirM();
                break;
            case 24:
                return $this->getJmlInstAir();
                break;
            case 25:
                return $this->getPanjDrainaseM();
                break;
            case 26:
                return $this->getLuasFinishStrukturM2();
                break;
            case 27:
                return $this->getLuasFinishPlafonM2();
                break;
            case 28:
                return $this->getLuasFinishDindingM2();
                break;
            case 29:
                return $this->getLuasFinishKpjM2();
                break;
            case 30:
                return $this->getCreateDate();
                break;
            case 31:
                return $this->getLastUpdate();
                break;
            case 32:
                return $this->getSoftDelete();
                break;
            case 33:
                return $this->getLastSync();
                break;
            case 34:
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
        if (isset($alreadyDumpedObjects['Ruang'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Ruang'][$this->getPrimaryKey()] = true;
        $keys = RuangPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdRuang(),
            $keys[1] => $this->getJenisPrasaranaId(),
            $keys[2] => $this->getSekolahId(),
            $keys[3] => $this->getParentIdRuang(),
            $keys[4] => $this->getIdBangunan(),
            $keys[5] => $this->getAsalData(),
            $keys[6] => $this->getKdRuang(),
            $keys[7] => $this->getNmRuang(),
            $keys[8] => $this->getLantai(),
            $keys[9] => $this->getPanjang(),
            $keys[10] => $this->getLebar(),
            $keys[11] => $this->getRegPras(),
            $keys[12] => $this->getKapasitas(),
            $keys[13] => $this->getLuasRuang(),
            $keys[14] => $this->getLuasPlesterM2(),
            $keys[15] => $this->getLuasPlafonM2(),
            $keys[16] => $this->getLuasDindingM2(),
            $keys[17] => $this->getLuasDaunJendelaM2(),
            $keys[18] => $this->getLuasDaunPintuM2(),
            $keys[19] => $this->getPanjKusenM(),
            $keys[20] => $this->getLuasTutupLantaiM2(),
            $keys[21] => $this->getPanjInstListrikM(),
            $keys[22] => $this->getJmlInstListrik(),
            $keys[23] => $this->getPanjInstAirM(),
            $keys[24] => $this->getJmlInstAir(),
            $keys[25] => $this->getPanjDrainaseM(),
            $keys[26] => $this->getLuasFinishStrukturM2(),
            $keys[27] => $this->getLuasFinishPlafonM2(),
            $keys[28] => $this->getLuasFinishDindingM2(),
            $keys[29] => $this->getLuasFinishKpjM2(),
            $keys[30] => $this->getCreateDate(),
            $keys[31] => $this->getLastUpdate(),
            $keys[32] => $this->getSoftDelete(),
            $keys[33] => $this->getLastSync(),
            $keys[34] => $this->getUpdaterId(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aRuangRelatedByParentIdRuang) {
                $result['RuangRelatedByParentIdRuang'] = $this->aRuangRelatedByParentIdRuang->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aBangunan) {
                $result['Bangunan'] = $this->aBangunan->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aJenisPrasarana) {
                $result['JenisPrasarana'] = $this->aJenisPrasarana->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aSekolah) {
                $result['Sekolah'] = $this->aSekolah->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collAlats) {
                $result['Alats'] = $this->collAlats->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collBukus) {
                $result['Bukus'] = $this->collBukus->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collJadwals) {
                $result['Jadwals'] = $this->collJadwals->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collRombonganBelajars) {
                $result['RombonganBelajars'] = $this->collRombonganBelajars->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collRuangsRelatedByIdRuang) {
                $result['RuangsRelatedByIdRuang'] = $this->collRuangsRelatedByIdRuang->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collRuangLongitudinals) {
                $result['RuangLongitudinals'] = $this->collRuangLongitudinals->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collTugasTambahans) {
                $result['TugasTambahans'] = $this->collTugasTambahans->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = RuangPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdRuang($value);
                break;
            case 1:
                $this->setJenisPrasaranaId($value);
                break;
            case 2:
                $this->setSekolahId($value);
                break;
            case 3:
                $this->setParentIdRuang($value);
                break;
            case 4:
                $this->setIdBangunan($value);
                break;
            case 5:
                $this->setAsalData($value);
                break;
            case 6:
                $this->setKdRuang($value);
                break;
            case 7:
                $this->setNmRuang($value);
                break;
            case 8:
                $this->setLantai($value);
                break;
            case 9:
                $this->setPanjang($value);
                break;
            case 10:
                $this->setLebar($value);
                break;
            case 11:
                $this->setRegPras($value);
                break;
            case 12:
                $this->setKapasitas($value);
                break;
            case 13:
                $this->setLuasRuang($value);
                break;
            case 14:
                $this->setLuasPlesterM2($value);
                break;
            case 15:
                $this->setLuasPlafonM2($value);
                break;
            case 16:
                $this->setLuasDindingM2($value);
                break;
            case 17:
                $this->setLuasDaunJendelaM2($value);
                break;
            case 18:
                $this->setLuasDaunPintuM2($value);
                break;
            case 19:
                $this->setPanjKusenM($value);
                break;
            case 20:
                $this->setLuasTutupLantaiM2($value);
                break;
            case 21:
                $this->setPanjInstListrikM($value);
                break;
            case 22:
                $this->setJmlInstListrik($value);
                break;
            case 23:
                $this->setPanjInstAirM($value);
                break;
            case 24:
                $this->setJmlInstAir($value);
                break;
            case 25:
                $this->setPanjDrainaseM($value);
                break;
            case 26:
                $this->setLuasFinishStrukturM2($value);
                break;
            case 27:
                $this->setLuasFinishPlafonM2($value);
                break;
            case 28:
                $this->setLuasFinishDindingM2($value);
                break;
            case 29:
                $this->setLuasFinishKpjM2($value);
                break;
            case 30:
                $this->setCreateDate($value);
                break;
            case 31:
                $this->setLastUpdate($value);
                break;
            case 32:
                $this->setSoftDelete($value);
                break;
            case 33:
                $this->setLastSync($value);
                break;
            case 34:
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
        $keys = RuangPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdRuang($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setJenisPrasaranaId($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setSekolahId($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setParentIdRuang($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setIdBangunan($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setAsalData($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setKdRuang($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setNmRuang($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setLantai($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setPanjang($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setLebar($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setRegPras($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setKapasitas($arr[$keys[12]]);
        if (array_key_exists($keys[13], $arr)) $this->setLuasRuang($arr[$keys[13]]);
        if (array_key_exists($keys[14], $arr)) $this->setLuasPlesterM2($arr[$keys[14]]);
        if (array_key_exists($keys[15], $arr)) $this->setLuasPlafonM2($arr[$keys[15]]);
        if (array_key_exists($keys[16], $arr)) $this->setLuasDindingM2($arr[$keys[16]]);
        if (array_key_exists($keys[17], $arr)) $this->setLuasDaunJendelaM2($arr[$keys[17]]);
        if (array_key_exists($keys[18], $arr)) $this->setLuasDaunPintuM2($arr[$keys[18]]);
        if (array_key_exists($keys[19], $arr)) $this->setPanjKusenM($arr[$keys[19]]);
        if (array_key_exists($keys[20], $arr)) $this->setLuasTutupLantaiM2($arr[$keys[20]]);
        if (array_key_exists($keys[21], $arr)) $this->setPanjInstListrikM($arr[$keys[21]]);
        if (array_key_exists($keys[22], $arr)) $this->setJmlInstListrik($arr[$keys[22]]);
        if (array_key_exists($keys[23], $arr)) $this->setPanjInstAirM($arr[$keys[23]]);
        if (array_key_exists($keys[24], $arr)) $this->setJmlInstAir($arr[$keys[24]]);
        if (array_key_exists($keys[25], $arr)) $this->setPanjDrainaseM($arr[$keys[25]]);
        if (array_key_exists($keys[26], $arr)) $this->setLuasFinishStrukturM2($arr[$keys[26]]);
        if (array_key_exists($keys[27], $arr)) $this->setLuasFinishPlafonM2($arr[$keys[27]]);
        if (array_key_exists($keys[28], $arr)) $this->setLuasFinishDindingM2($arr[$keys[28]]);
        if (array_key_exists($keys[29], $arr)) $this->setLuasFinishKpjM2($arr[$keys[29]]);
        if (array_key_exists($keys[30], $arr)) $this->setCreateDate($arr[$keys[30]]);
        if (array_key_exists($keys[31], $arr)) $this->setLastUpdate($arr[$keys[31]]);
        if (array_key_exists($keys[32], $arr)) $this->setSoftDelete($arr[$keys[32]]);
        if (array_key_exists($keys[33], $arr)) $this->setLastSync($arr[$keys[33]]);
        if (array_key_exists($keys[34], $arr)) $this->setUpdaterId($arr[$keys[34]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(RuangPeer::DATABASE_NAME);

        if ($this->isColumnModified(RuangPeer::ID_RUANG)) $criteria->add(RuangPeer::ID_RUANG, $this->id_ruang);
        if ($this->isColumnModified(RuangPeer::JENIS_PRASARANA_ID)) $criteria->add(RuangPeer::JENIS_PRASARANA_ID, $this->jenis_prasarana_id);
        if ($this->isColumnModified(RuangPeer::SEKOLAH_ID)) $criteria->add(RuangPeer::SEKOLAH_ID, $this->sekolah_id);
        if ($this->isColumnModified(RuangPeer::PARENT_ID_RUANG)) $criteria->add(RuangPeer::PARENT_ID_RUANG, $this->parent_id_ruang);
        if ($this->isColumnModified(RuangPeer::ID_BANGUNAN)) $criteria->add(RuangPeer::ID_BANGUNAN, $this->id_bangunan);
        if ($this->isColumnModified(RuangPeer::ASAL_DATA)) $criteria->add(RuangPeer::ASAL_DATA, $this->asal_data);
        if ($this->isColumnModified(RuangPeer::KD_RUANG)) $criteria->add(RuangPeer::KD_RUANG, $this->kd_ruang);
        if ($this->isColumnModified(RuangPeer::NM_RUANG)) $criteria->add(RuangPeer::NM_RUANG, $this->nm_ruang);
        if ($this->isColumnModified(RuangPeer::LANTAI)) $criteria->add(RuangPeer::LANTAI, $this->lantai);
        if ($this->isColumnModified(RuangPeer::PANJANG)) $criteria->add(RuangPeer::PANJANG, $this->panjang);
        if ($this->isColumnModified(RuangPeer::LEBAR)) $criteria->add(RuangPeer::LEBAR, $this->lebar);
        if ($this->isColumnModified(RuangPeer::REG_PRAS)) $criteria->add(RuangPeer::REG_PRAS, $this->reg_pras);
        if ($this->isColumnModified(RuangPeer::KAPASITAS)) $criteria->add(RuangPeer::KAPASITAS, $this->kapasitas);
        if ($this->isColumnModified(RuangPeer::LUAS_RUANG)) $criteria->add(RuangPeer::LUAS_RUANG, $this->luas_ruang);
        if ($this->isColumnModified(RuangPeer::LUAS_PLESTER_M2)) $criteria->add(RuangPeer::LUAS_PLESTER_M2, $this->luas_plester_m2);
        if ($this->isColumnModified(RuangPeer::LUAS_PLAFON_M2)) $criteria->add(RuangPeer::LUAS_PLAFON_M2, $this->luas_plafon_m2);
        if ($this->isColumnModified(RuangPeer::LUAS_DINDING_M2)) $criteria->add(RuangPeer::LUAS_DINDING_M2, $this->luas_dinding_m2);
        if ($this->isColumnModified(RuangPeer::LUAS_DAUN_JENDELA_M2)) $criteria->add(RuangPeer::LUAS_DAUN_JENDELA_M2, $this->luas_daun_jendela_m2);
        if ($this->isColumnModified(RuangPeer::LUAS_DAUN_PINTU_M2)) $criteria->add(RuangPeer::LUAS_DAUN_PINTU_M2, $this->luas_daun_pintu_m2);
        if ($this->isColumnModified(RuangPeer::PANJ_KUSEN_M)) $criteria->add(RuangPeer::PANJ_KUSEN_M, $this->panj_kusen_m);
        if ($this->isColumnModified(RuangPeer::LUAS_TUTUP_LANTAI_M2)) $criteria->add(RuangPeer::LUAS_TUTUP_LANTAI_M2, $this->luas_tutup_lantai_m2);
        if ($this->isColumnModified(RuangPeer::PANJ_INST_LISTRIK_M)) $criteria->add(RuangPeer::PANJ_INST_LISTRIK_M, $this->panj_inst_listrik_m);
        if ($this->isColumnModified(RuangPeer::JML_INST_LISTRIK)) $criteria->add(RuangPeer::JML_INST_LISTRIK, $this->jml_inst_listrik);
        if ($this->isColumnModified(RuangPeer::PANJ_INST_AIR_M)) $criteria->add(RuangPeer::PANJ_INST_AIR_M, $this->panj_inst_air_m);
        if ($this->isColumnModified(RuangPeer::JML_INST_AIR)) $criteria->add(RuangPeer::JML_INST_AIR, $this->jml_inst_air);
        if ($this->isColumnModified(RuangPeer::PANJ_DRAINASE_M)) $criteria->add(RuangPeer::PANJ_DRAINASE_M, $this->panj_drainase_m);
        if ($this->isColumnModified(RuangPeer::LUAS_FINISH_STRUKTUR_M2)) $criteria->add(RuangPeer::LUAS_FINISH_STRUKTUR_M2, $this->luas_finish_struktur_m2);
        if ($this->isColumnModified(RuangPeer::LUAS_FINISH_PLAFON_M2)) $criteria->add(RuangPeer::LUAS_FINISH_PLAFON_M2, $this->luas_finish_plafon_m2);
        if ($this->isColumnModified(RuangPeer::LUAS_FINISH_DINDING_M2)) $criteria->add(RuangPeer::LUAS_FINISH_DINDING_M2, $this->luas_finish_dinding_m2);
        if ($this->isColumnModified(RuangPeer::LUAS_FINISH_KPJ_M2)) $criteria->add(RuangPeer::LUAS_FINISH_KPJ_M2, $this->luas_finish_kpj_m2);
        if ($this->isColumnModified(RuangPeer::CREATE_DATE)) $criteria->add(RuangPeer::CREATE_DATE, $this->create_date);
        if ($this->isColumnModified(RuangPeer::LAST_UPDATE)) $criteria->add(RuangPeer::LAST_UPDATE, $this->last_update);
        if ($this->isColumnModified(RuangPeer::SOFT_DELETE)) $criteria->add(RuangPeer::SOFT_DELETE, $this->soft_delete);
        if ($this->isColumnModified(RuangPeer::LAST_SYNC)) $criteria->add(RuangPeer::LAST_SYNC, $this->last_sync);
        if ($this->isColumnModified(RuangPeer::UPDATER_ID)) $criteria->add(RuangPeer::UPDATER_ID, $this->updater_id);

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
        $criteria = new Criteria(RuangPeer::DATABASE_NAME);
        $criteria->add(RuangPeer::ID_RUANG, $this->id_ruang);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return string
     */
    public function getPrimaryKey()
    {
        return $this->getIdRuang();
    }

    /**
     * Generic method to set the primary key (id_ruang column).
     *
     * @param  string $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdRuang($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdRuang();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of Ruang (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setJenisPrasaranaId($this->getJenisPrasaranaId());
        $copyObj->setSekolahId($this->getSekolahId());
        $copyObj->setParentIdRuang($this->getParentIdRuang());
        $copyObj->setIdBangunan($this->getIdBangunan());
        $copyObj->setAsalData($this->getAsalData());
        $copyObj->setKdRuang($this->getKdRuang());
        $copyObj->setNmRuang($this->getNmRuang());
        $copyObj->setLantai($this->getLantai());
        $copyObj->setPanjang($this->getPanjang());
        $copyObj->setLebar($this->getLebar());
        $copyObj->setRegPras($this->getRegPras());
        $copyObj->setKapasitas($this->getKapasitas());
        $copyObj->setLuasRuang($this->getLuasRuang());
        $copyObj->setLuasPlesterM2($this->getLuasPlesterM2());
        $copyObj->setLuasPlafonM2($this->getLuasPlafonM2());
        $copyObj->setLuasDindingM2($this->getLuasDindingM2());
        $copyObj->setLuasDaunJendelaM2($this->getLuasDaunJendelaM2());
        $copyObj->setLuasDaunPintuM2($this->getLuasDaunPintuM2());
        $copyObj->setPanjKusenM($this->getPanjKusenM());
        $copyObj->setLuasTutupLantaiM2($this->getLuasTutupLantaiM2());
        $copyObj->setPanjInstListrikM($this->getPanjInstListrikM());
        $copyObj->setJmlInstListrik($this->getJmlInstListrik());
        $copyObj->setPanjInstAirM($this->getPanjInstAirM());
        $copyObj->setJmlInstAir($this->getJmlInstAir());
        $copyObj->setPanjDrainaseM($this->getPanjDrainaseM());
        $copyObj->setLuasFinishStrukturM2($this->getLuasFinishStrukturM2());
        $copyObj->setLuasFinishPlafonM2($this->getLuasFinishPlafonM2());
        $copyObj->setLuasFinishDindingM2($this->getLuasFinishDindingM2());
        $copyObj->setLuasFinishKpjM2($this->getLuasFinishKpjM2());
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

            foreach ($this->getAlats() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addAlat($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getBukus() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addBuku($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getJadwals() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addJadwal($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getRombonganBelajars() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addRombonganBelajar($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getRuangsRelatedByIdRuang() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addRuangRelatedByIdRuang($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getRuangLongitudinals() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addRuangLongitudinal($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getTugasTambahans() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addTugasTambahan($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdRuang(NULL); // this is a auto-increment column, so set to default value
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
     * @return Ruang Clone of current object.
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
     * @return RuangPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new RuangPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Ruang object.
     *
     * @param             Ruang $v
     * @return Ruang The current object (for fluent API support)
     * @throws PropelException
     */
    public function setRuangRelatedByParentIdRuang(Ruang $v = null)
    {
        if ($v === null) {
            $this->setParentIdRuang(NULL);
        } else {
            $this->setParentIdRuang($v->getIdRuang());
        }

        $this->aRuangRelatedByParentIdRuang = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Ruang object, it will not be re-added.
        if ($v !== null) {
            $v->addRuangRelatedByIdRuang($this);
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
    public function getRuangRelatedByParentIdRuang(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aRuangRelatedByParentIdRuang === null && (($this->parent_id_ruang !== "" && $this->parent_id_ruang !== null)) && $doQuery) {
            $this->aRuangRelatedByParentIdRuang = RuangQuery::create()->findPk($this->parent_id_ruang, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aRuangRelatedByParentIdRuang->addRuangsRelatedByIdRuang($this);
             */
        }

        return $this->aRuangRelatedByParentIdRuang;
    }

    /**
     * Declares an association between this object and a Bangunan object.
     *
     * @param             Bangunan $v
     * @return Ruang The current object (for fluent API support)
     * @throws PropelException
     */
    public function setBangunan(Bangunan $v = null)
    {
        if ($v === null) {
            $this->setIdBangunan(NULL);
        } else {
            $this->setIdBangunan($v->getIdBangunan());
        }

        $this->aBangunan = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Bangunan object, it will not be re-added.
        if ($v !== null) {
            $v->addRuang($this);
        }


        return $this;
    }


    /**
     * Get the associated Bangunan object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Bangunan The associated Bangunan object.
     * @throws PropelException
     */
    public function getBangunan(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aBangunan === null && (($this->id_bangunan !== "" && $this->id_bangunan !== null)) && $doQuery) {
            $this->aBangunan = BangunanQuery::create()->findPk($this->id_bangunan, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aBangunan->addRuangs($this);
             */
        }

        return $this->aBangunan;
    }

    /**
     * Declares an association between this object and a JenisPrasarana object.
     *
     * @param             JenisPrasarana $v
     * @return Ruang The current object (for fluent API support)
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
            $v->addRuang($this);
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
                $this->aJenisPrasarana->addRuangs($this);
             */
        }

        return $this->aJenisPrasarana;
    }

    /**
     * Declares an association between this object and a Sekolah object.
     *
     * @param             Sekolah $v
     * @return Ruang The current object (for fluent API support)
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
            $v->addRuang($this);
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
                $this->aSekolah->addRuangs($this);
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
        if ('Alat' == $relationName) {
            $this->initAlats();
        }
        if ('Buku' == $relationName) {
            $this->initBukus();
        }
        if ('Jadwal' == $relationName) {
            $this->initJadwals();
        }
        if ('RombonganBelajar' == $relationName) {
            $this->initRombonganBelajars();
        }
        if ('RuangRelatedByIdRuang' == $relationName) {
            $this->initRuangsRelatedByIdRuang();
        }
        if ('RuangLongitudinal' == $relationName) {
            $this->initRuangLongitudinals();
        }
        if ('TugasTambahan' == $relationName) {
            $this->initTugasTambahans();
        }
    }

    /**
     * Clears out the collAlats collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Ruang The current object (for fluent API support)
     * @see        addAlats()
     */
    public function clearAlats()
    {
        $this->collAlats = null; // important to set this to null since that means it is uninitialized
        $this->collAlatsPartial = null;

        return $this;
    }

    /**
     * reset is the collAlats collection loaded partially
     *
     * @return void
     */
    public function resetPartialAlats($v = true)
    {
        $this->collAlatsPartial = $v;
    }

    /**
     * Initializes the collAlats collection.
     *
     * By default this just sets the collAlats collection to an empty array (like clearcollAlats());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initAlats($overrideExisting = true)
    {
        if (null !== $this->collAlats && !$overrideExisting) {
            return;
        }
        $this->collAlats = new PropelObjectCollection();
        $this->collAlats->setModel('Alat');
    }

    /**
     * Gets an array of Alat objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Ruang is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Alat[] List of Alat objects
     * @throws PropelException
     */
    public function getAlats($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collAlatsPartial && !$this->isNew();
        if (null === $this->collAlats || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collAlats) {
                // return empty collection
                $this->initAlats();
            } else {
                $collAlats = AlatQuery::create(null, $criteria)
                    ->filterByRuang($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collAlatsPartial && count($collAlats)) {
                      $this->initAlats(false);

                      foreach($collAlats as $obj) {
                        if (false == $this->collAlats->contains($obj)) {
                          $this->collAlats->append($obj);
                        }
                      }

                      $this->collAlatsPartial = true;
                    }

                    $collAlats->getInternalIterator()->rewind();
                    return $collAlats;
                }

                if($partial && $this->collAlats) {
                    foreach($this->collAlats as $obj) {
                        if($obj->isNew()) {
                            $collAlats[] = $obj;
                        }
                    }
                }

                $this->collAlats = $collAlats;
                $this->collAlatsPartial = false;
            }
        }

        return $this->collAlats;
    }

    /**
     * Sets a collection of Alat objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $alats A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Ruang The current object (for fluent API support)
     */
    public function setAlats(PropelCollection $alats, PropelPDO $con = null)
    {
        $alatsToDelete = $this->getAlats(new Criteria(), $con)->diff($alats);

        $this->alatsScheduledForDeletion = unserialize(serialize($alatsToDelete));

        foreach ($alatsToDelete as $alatRemoved) {
            $alatRemoved->setRuang(null);
        }

        $this->collAlats = null;
        foreach ($alats as $alat) {
            $this->addAlat($alat);
        }

        $this->collAlats = $alats;
        $this->collAlatsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Alat objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Alat objects.
     * @throws PropelException
     */
    public function countAlats(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collAlatsPartial && !$this->isNew();
        if (null === $this->collAlats || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collAlats) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getAlats());
            }
            $query = AlatQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByRuang($this)
                ->count($con);
        }

        return count($this->collAlats);
    }

    /**
     * Method called to associate a Alat object to this object
     * through the Alat foreign key attribute.
     *
     * @param    Alat $l Alat
     * @return Ruang The current object (for fluent API support)
     */
    public function addAlat(Alat $l)
    {
        if ($this->collAlats === null) {
            $this->initAlats();
            $this->collAlatsPartial = true;
        }
        if (!in_array($l, $this->collAlats->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddAlat($l);
        }

        return $this;
    }

    /**
     * @param	Alat $alat The alat object to add.
     */
    protected function doAddAlat($alat)
    {
        $this->collAlats[]= $alat;
        $alat->setRuang($this);
    }

    /**
     * @param	Alat $alat The alat object to remove.
     * @return Ruang The current object (for fluent API support)
     */
    public function removeAlat($alat)
    {
        if ($this->getAlats()->contains($alat)) {
            $this->collAlats->remove($this->collAlats->search($alat));
            if (null === $this->alatsScheduledForDeletion) {
                $this->alatsScheduledForDeletion = clone $this->collAlats;
                $this->alatsScheduledForDeletion->clear();
            }
            $this->alatsScheduledForDeletion[]= $alat;
            $alat->setRuang(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Ruang is new, it will return
     * an empty collection; or if this Ruang has previously
     * been saved, it will retrieve related Alats from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Ruang.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Alat[] List of Alat objects
     */
    public function getAlatsJoinPtk($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = AlatQuery::create(null, $criteria);
        $query->joinWith('Ptk', $join_behavior);

        return $this->getAlats($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Ruang is new, it will return
     * an empty collection; or if this Ruang has previously
     * been saved, it will retrieve related Alats from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Ruang.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Alat[] List of Alat objects
     */
    public function getAlatsJoinJenisHapusBuku($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = AlatQuery::create(null, $criteria);
        $query->joinWith('JenisHapusBuku', $join_behavior);

        return $this->getAlats($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Ruang is new, it will return
     * an empty collection; or if this Ruang has previously
     * been saved, it will retrieve related Alats from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Ruang.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Alat[] List of Alat objects
     */
    public function getAlatsJoinJenisSarana($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = AlatQuery::create(null, $criteria);
        $query->joinWith('JenisSarana', $join_behavior);

        return $this->getAlats($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Ruang is new, it will return
     * an empty collection; or if this Ruang has previously
     * been saved, it will retrieve related Alats from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Ruang.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Alat[] List of Alat objects
     */
    public function getAlatsJoinStatusKepemilikanSarpras($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = AlatQuery::create(null, $criteria);
        $query->joinWith('StatusKepemilikanSarpras', $join_behavior);

        return $this->getAlats($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Ruang is new, it will return
     * an empty collection; or if this Ruang has previously
     * been saved, it will retrieve related Alats from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Ruang.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Alat[] List of Alat objects
     */
    public function getAlatsJoinSekolah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = AlatQuery::create(null, $criteria);
        $query->joinWith('Sekolah', $join_behavior);

        return $this->getAlats($query, $con);
    }

    /**
     * Clears out the collBukus collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Ruang The current object (for fluent API support)
     * @see        addBukus()
     */
    public function clearBukus()
    {
        $this->collBukus = null; // important to set this to null since that means it is uninitialized
        $this->collBukusPartial = null;

        return $this;
    }

    /**
     * reset is the collBukus collection loaded partially
     *
     * @return void
     */
    public function resetPartialBukus($v = true)
    {
        $this->collBukusPartial = $v;
    }

    /**
     * Initializes the collBukus collection.
     *
     * By default this just sets the collBukus collection to an empty array (like clearcollBukus());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initBukus($overrideExisting = true)
    {
        if (null !== $this->collBukus && !$overrideExisting) {
            return;
        }
        $this->collBukus = new PropelObjectCollection();
        $this->collBukus->setModel('Buku');
    }

    /**
     * Gets an array of Buku objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Ruang is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Buku[] List of Buku objects
     * @throws PropelException
     */
    public function getBukus($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collBukusPartial && !$this->isNew();
        if (null === $this->collBukus || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collBukus) {
                // return empty collection
                $this->initBukus();
            } else {
                $collBukus = BukuQuery::create(null, $criteria)
                    ->filterByRuang($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collBukusPartial && count($collBukus)) {
                      $this->initBukus(false);

                      foreach($collBukus as $obj) {
                        if (false == $this->collBukus->contains($obj)) {
                          $this->collBukus->append($obj);
                        }
                      }

                      $this->collBukusPartial = true;
                    }

                    $collBukus->getInternalIterator()->rewind();
                    return $collBukus;
                }

                if($partial && $this->collBukus) {
                    foreach($this->collBukus as $obj) {
                        if($obj->isNew()) {
                            $collBukus[] = $obj;
                        }
                    }
                }

                $this->collBukus = $collBukus;
                $this->collBukusPartial = false;
            }
        }

        return $this->collBukus;
    }

    /**
     * Sets a collection of Buku objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $bukus A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Ruang The current object (for fluent API support)
     */
    public function setBukus(PropelCollection $bukus, PropelPDO $con = null)
    {
        $bukusToDelete = $this->getBukus(new Criteria(), $con)->diff($bukus);

        $this->bukusScheduledForDeletion = unserialize(serialize($bukusToDelete));

        foreach ($bukusToDelete as $bukuRemoved) {
            $bukuRemoved->setRuang(null);
        }

        $this->collBukus = null;
        foreach ($bukus as $buku) {
            $this->addBuku($buku);
        }

        $this->collBukus = $bukus;
        $this->collBukusPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Buku objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Buku objects.
     * @throws PropelException
     */
    public function countBukus(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collBukusPartial && !$this->isNew();
        if (null === $this->collBukus || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collBukus) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getBukus());
            }
            $query = BukuQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByRuang($this)
                ->count($con);
        }

        return count($this->collBukus);
    }

    /**
     * Method called to associate a Buku object to this object
     * through the Buku foreign key attribute.
     *
     * @param    Buku $l Buku
     * @return Ruang The current object (for fluent API support)
     */
    public function addBuku(Buku $l)
    {
        if ($this->collBukus === null) {
            $this->initBukus();
            $this->collBukusPartial = true;
        }
        if (!in_array($l, $this->collBukus->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddBuku($l);
        }

        return $this;
    }

    /**
     * @param	Buku $buku The buku object to add.
     */
    protected function doAddBuku($buku)
    {
        $this->collBukus[]= $buku;
        $buku->setRuang($this);
    }

    /**
     * @param	Buku $buku The buku object to remove.
     * @return Ruang The current object (for fluent API support)
     */
    public function removeBuku($buku)
    {
        if ($this->getBukus()->contains($buku)) {
            $this->collBukus->remove($this->collBukus->search($buku));
            if (null === $this->bukusScheduledForDeletion) {
                $this->bukusScheduledForDeletion = clone $this->collBukus;
                $this->bukusScheduledForDeletion->clear();
            }
            $this->bukusScheduledForDeletion[]= $buku;
            $buku->setRuang(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Ruang is new, it will return
     * an empty collection; or if this Ruang has previously
     * been saved, it will retrieve related Bukus from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Ruang.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Buku[] List of Buku objects
     */
    public function getBukusJoinMataPelajaran($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = BukuQuery::create(null, $criteria);
        $query->joinWith('MataPelajaran', $join_behavior);

        return $this->getBukus($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Ruang is new, it will return
     * an empty collection; or if this Ruang has previously
     * been saved, it will retrieve related Bukus from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Ruang.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Buku[] List of Buku objects
     */
    public function getBukusJoinBiblio($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = BukuQuery::create(null, $criteria);
        $query->joinWith('Biblio', $join_behavior);

        return $this->getBukus($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Ruang is new, it will return
     * an empty collection; or if this Ruang has previously
     * been saved, it will retrieve related Bukus from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Ruang.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Buku[] List of Buku objects
     */
    public function getBukusJoinSekolah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = BukuQuery::create(null, $criteria);
        $query->joinWith('Sekolah', $join_behavior);

        return $this->getBukus($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Ruang is new, it will return
     * an empty collection; or if this Ruang has previously
     * been saved, it will retrieve related Bukus from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Ruang.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Buku[] List of Buku objects
     */
    public function getBukusJoinTingkatPendidikan($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = BukuQuery::create(null, $criteria);
        $query->joinWith('TingkatPendidikan', $join_behavior);

        return $this->getBukus($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Ruang is new, it will return
     * an empty collection; or if this Ruang has previously
     * been saved, it will retrieve related Bukus from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Ruang.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Buku[] List of Buku objects
     */
    public function getBukusJoinJenisHapusBuku($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = BukuQuery::create(null, $criteria);
        $query->joinWith('JenisHapusBuku', $join_behavior);

        return $this->getBukus($query, $con);
    }

    /**
     * Clears out the collJadwals collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Ruang The current object (for fluent API support)
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
     * If this Ruang is new, it will return
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
                    ->filterByRuang($this)
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
     * @return Ruang The current object (for fluent API support)
     */
    public function setJadwals(PropelCollection $jadwals, PropelPDO $con = null)
    {
        $jadwalsToDelete = $this->getJadwals(new Criteria(), $con)->diff($jadwals);

        $this->jadwalsScheduledForDeletion = unserialize(serialize($jadwalsToDelete));

        foreach ($jadwalsToDelete as $jadwalRemoved) {
            $jadwalRemoved->setRuang(null);
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
                ->filterByRuang($this)
                ->count($con);
        }

        return count($this->collJadwals);
    }

    /**
     * Method called to associate a Jadwal object to this object
     * through the Jadwal foreign key attribute.
     *
     * @param    Jadwal $l Jadwal
     * @return Ruang The current object (for fluent API support)
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
        $jadwal->setRuang($this);
    }

    /**
     * @param	Jadwal $jadwal The jadwal object to remove.
     * @return Ruang The current object (for fluent API support)
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
            $jadwal->setRuang(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Ruang is new, it will return
     * an empty collection; or if this Ruang has previously
     * been saved, it will retrieve related Jadwals from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Ruang.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Jadwal[] List of Jadwal objects
     */
    public function getJadwalsJoinSekolahLongitudinal($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = JadwalQuery::create(null, $criteria);
        $query->joinWith('SekolahLongitudinal', $join_behavior);

        return $this->getJadwals($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Ruang is new, it will return
     * an empty collection; or if this Ruang has previously
     * been saved, it will retrieve related Jadwals from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Ruang.
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
     * Otherwise if this Ruang is new, it will return
     * an empty collection; or if this Ruang has previously
     * been saved, it will retrieve related Jadwals from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Ruang.
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
     * Otherwise if this Ruang is new, it will return
     * an empty collection; or if this Ruang has previously
     * been saved, it will retrieve related Jadwals from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Ruang.
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
     * Otherwise if this Ruang is new, it will return
     * an empty collection; or if this Ruang has previously
     * been saved, it will retrieve related Jadwals from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Ruang.
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
     * Otherwise if this Ruang is new, it will return
     * an empty collection; or if this Ruang has previously
     * been saved, it will retrieve related Jadwals from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Ruang.
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
     * Otherwise if this Ruang is new, it will return
     * an empty collection; or if this Ruang has previously
     * been saved, it will retrieve related Jadwals from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Ruang.
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
     * Otherwise if this Ruang is new, it will return
     * an empty collection; or if this Ruang has previously
     * been saved, it will retrieve related Jadwals from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Ruang.
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
     * Otherwise if this Ruang is new, it will return
     * an empty collection; or if this Ruang has previously
     * been saved, it will retrieve related Jadwals from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Ruang.
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
     * Otherwise if this Ruang is new, it will return
     * an empty collection; or if this Ruang has previously
     * been saved, it will retrieve related Jadwals from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Ruang.
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
     * Otherwise if this Ruang is new, it will return
     * an empty collection; or if this Ruang has previously
     * been saved, it will retrieve related Jadwals from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Ruang.
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
     * Otherwise if this Ruang is new, it will return
     * an empty collection; or if this Ruang has previously
     * been saved, it will retrieve related Jadwals from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Ruang.
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
     * Otherwise if this Ruang is new, it will return
     * an empty collection; or if this Ruang has previously
     * been saved, it will retrieve related Jadwals from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Ruang.
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
     * Otherwise if this Ruang is new, it will return
     * an empty collection; or if this Ruang has previously
     * been saved, it will retrieve related Jadwals from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Ruang.
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
     * Otherwise if this Ruang is new, it will return
     * an empty collection; or if this Ruang has previously
     * been saved, it will retrieve related Jadwals from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Ruang.
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
     * Otherwise if this Ruang is new, it will return
     * an empty collection; or if this Ruang has previously
     * been saved, it will retrieve related Jadwals from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Ruang.
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
     * Otherwise if this Ruang is new, it will return
     * an empty collection; or if this Ruang has previously
     * been saved, it will retrieve related Jadwals from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Ruang.
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
     * Otherwise if this Ruang is new, it will return
     * an empty collection; or if this Ruang has previously
     * been saved, it will retrieve related Jadwals from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Ruang.
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
     * Otherwise if this Ruang is new, it will return
     * an empty collection; or if this Ruang has previously
     * been saved, it will retrieve related Jadwals from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Ruang.
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
     * Otherwise if this Ruang is new, it will return
     * an empty collection; or if this Ruang has previously
     * been saved, it will retrieve related Jadwals from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Ruang.
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
     * Otherwise if this Ruang is new, it will return
     * an empty collection; or if this Ruang has previously
     * been saved, it will retrieve related Jadwals from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Ruang.
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
     * Clears out the collRombonganBelajars collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Ruang The current object (for fluent API support)
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
     * If this Ruang is new, it will return
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
                    ->filterByRuang($this)
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
     * @return Ruang The current object (for fluent API support)
     */
    public function setRombonganBelajars(PropelCollection $rombonganBelajars, PropelPDO $con = null)
    {
        $rombonganBelajarsToDelete = $this->getRombonganBelajars(new Criteria(), $con)->diff($rombonganBelajars);

        $this->rombonganBelajarsScheduledForDeletion = unserialize(serialize($rombonganBelajarsToDelete));

        foreach ($rombonganBelajarsToDelete as $rombonganBelajarRemoved) {
            $rombonganBelajarRemoved->setRuang(null);
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
                ->filterByRuang($this)
                ->count($con);
        }

        return count($this->collRombonganBelajars);
    }

    /**
     * Method called to associate a RombonganBelajar object to this object
     * through the RombonganBelajar foreign key attribute.
     *
     * @param    RombonganBelajar $l RombonganBelajar
     * @return Ruang The current object (for fluent API support)
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
        $rombonganBelajar->setRuang($this);
    }

    /**
     * @param	RombonganBelajar $rombonganBelajar The rombonganBelajar object to remove.
     * @return Ruang The current object (for fluent API support)
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
            $rombonganBelajar->setRuang(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Ruang is new, it will return
     * an empty collection; or if this Ruang has previously
     * been saved, it will retrieve related RombonganBelajars from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Ruang.
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
     * Otherwise if this Ruang is new, it will return
     * an empty collection; or if this Ruang has previously
     * been saved, it will retrieve related RombonganBelajars from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Ruang.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|RombonganBelajar[] List of RombonganBelajar objects
     */
    public function getRombonganBelajarsJoinKebutuhanKhusus($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = RombonganBelajarQuery::create(null, $criteria);
        $query->joinWith('KebutuhanKhusus', $join_behavior);

        return $this->getRombonganBelajars($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Ruang is new, it will return
     * an empty collection; or if this Ruang has previously
     * been saved, it will retrieve related RombonganBelajars from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Ruang.
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
     * Otherwise if this Ruang is new, it will return
     * an empty collection; or if this Ruang has previously
     * been saved, it will retrieve related RombonganBelajars from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Ruang.
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
     * Otherwise if this Ruang is new, it will return
     * an empty collection; or if this Ruang has previously
     * been saved, it will retrieve related RombonganBelajars from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Ruang.
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
     * Otherwise if this Ruang is new, it will return
     * an empty collection; or if this Ruang has previously
     * been saved, it will retrieve related RombonganBelajars from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Ruang.
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
     * Otherwise if this Ruang is new, it will return
     * an empty collection; or if this Ruang has previously
     * been saved, it will retrieve related RombonganBelajars from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Ruang.
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
     * Clears out the collRuangsRelatedByIdRuang collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Ruang The current object (for fluent API support)
     * @see        addRuangsRelatedByIdRuang()
     */
    public function clearRuangsRelatedByIdRuang()
    {
        $this->collRuangsRelatedByIdRuang = null; // important to set this to null since that means it is uninitialized
        $this->collRuangsRelatedByIdRuangPartial = null;

        return $this;
    }

    /**
     * reset is the collRuangsRelatedByIdRuang collection loaded partially
     *
     * @return void
     */
    public function resetPartialRuangsRelatedByIdRuang($v = true)
    {
        $this->collRuangsRelatedByIdRuangPartial = $v;
    }

    /**
     * Initializes the collRuangsRelatedByIdRuang collection.
     *
     * By default this just sets the collRuangsRelatedByIdRuang collection to an empty array (like clearcollRuangsRelatedByIdRuang());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initRuangsRelatedByIdRuang($overrideExisting = true)
    {
        if (null !== $this->collRuangsRelatedByIdRuang && !$overrideExisting) {
            return;
        }
        $this->collRuangsRelatedByIdRuang = new PropelObjectCollection();
        $this->collRuangsRelatedByIdRuang->setModel('Ruang');
    }

    /**
     * Gets an array of Ruang objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Ruang is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Ruang[] List of Ruang objects
     * @throws PropelException
     */
    public function getRuangsRelatedByIdRuang($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collRuangsRelatedByIdRuangPartial && !$this->isNew();
        if (null === $this->collRuangsRelatedByIdRuang || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collRuangsRelatedByIdRuang) {
                // return empty collection
                $this->initRuangsRelatedByIdRuang();
            } else {
                $collRuangsRelatedByIdRuang = RuangQuery::create(null, $criteria)
                    ->filterByRuangRelatedByParentIdRuang($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collRuangsRelatedByIdRuangPartial && count($collRuangsRelatedByIdRuang)) {
                      $this->initRuangsRelatedByIdRuang(false);

                      foreach($collRuangsRelatedByIdRuang as $obj) {
                        if (false == $this->collRuangsRelatedByIdRuang->contains($obj)) {
                          $this->collRuangsRelatedByIdRuang->append($obj);
                        }
                      }

                      $this->collRuangsRelatedByIdRuangPartial = true;
                    }

                    $collRuangsRelatedByIdRuang->getInternalIterator()->rewind();
                    return $collRuangsRelatedByIdRuang;
                }

                if($partial && $this->collRuangsRelatedByIdRuang) {
                    foreach($this->collRuangsRelatedByIdRuang as $obj) {
                        if($obj->isNew()) {
                            $collRuangsRelatedByIdRuang[] = $obj;
                        }
                    }
                }

                $this->collRuangsRelatedByIdRuang = $collRuangsRelatedByIdRuang;
                $this->collRuangsRelatedByIdRuangPartial = false;
            }
        }

        return $this->collRuangsRelatedByIdRuang;
    }

    /**
     * Sets a collection of RuangRelatedByIdRuang objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $ruangsRelatedByIdRuang A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Ruang The current object (for fluent API support)
     */
    public function setRuangsRelatedByIdRuang(PropelCollection $ruangsRelatedByIdRuang, PropelPDO $con = null)
    {
        $ruangsRelatedByIdRuangToDelete = $this->getRuangsRelatedByIdRuang(new Criteria(), $con)->diff($ruangsRelatedByIdRuang);

        $this->ruangsRelatedByIdRuangScheduledForDeletion = unserialize(serialize($ruangsRelatedByIdRuangToDelete));

        foreach ($ruangsRelatedByIdRuangToDelete as $ruangRelatedByIdRuangRemoved) {
            $ruangRelatedByIdRuangRemoved->setRuangRelatedByParentIdRuang(null);
        }

        $this->collRuangsRelatedByIdRuang = null;
        foreach ($ruangsRelatedByIdRuang as $ruangRelatedByIdRuang) {
            $this->addRuangRelatedByIdRuang($ruangRelatedByIdRuang);
        }

        $this->collRuangsRelatedByIdRuang = $ruangsRelatedByIdRuang;
        $this->collRuangsRelatedByIdRuangPartial = false;

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
    public function countRuangsRelatedByIdRuang(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collRuangsRelatedByIdRuangPartial && !$this->isNew();
        if (null === $this->collRuangsRelatedByIdRuang || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collRuangsRelatedByIdRuang) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getRuangsRelatedByIdRuang());
            }
            $query = RuangQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByRuangRelatedByParentIdRuang($this)
                ->count($con);
        }

        return count($this->collRuangsRelatedByIdRuang);
    }

    /**
     * Method called to associate a Ruang object to this object
     * through the Ruang foreign key attribute.
     *
     * @param    Ruang $l Ruang
     * @return Ruang The current object (for fluent API support)
     */
    public function addRuangRelatedByIdRuang(Ruang $l)
    {
        if ($this->collRuangsRelatedByIdRuang === null) {
            $this->initRuangsRelatedByIdRuang();
            $this->collRuangsRelatedByIdRuangPartial = true;
        }
        if (!in_array($l, $this->collRuangsRelatedByIdRuang->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddRuangRelatedByIdRuang($l);
        }

        return $this;
    }

    /**
     * @param	RuangRelatedByIdRuang $ruangRelatedByIdRuang The ruangRelatedByIdRuang object to add.
     */
    protected function doAddRuangRelatedByIdRuang($ruangRelatedByIdRuang)
    {
        $this->collRuangsRelatedByIdRuang[]= $ruangRelatedByIdRuang;
        $ruangRelatedByIdRuang->setRuangRelatedByParentIdRuang($this);
    }

    /**
     * @param	RuangRelatedByIdRuang $ruangRelatedByIdRuang The ruangRelatedByIdRuang object to remove.
     * @return Ruang The current object (for fluent API support)
     */
    public function removeRuangRelatedByIdRuang($ruangRelatedByIdRuang)
    {
        if ($this->getRuangsRelatedByIdRuang()->contains($ruangRelatedByIdRuang)) {
            $this->collRuangsRelatedByIdRuang->remove($this->collRuangsRelatedByIdRuang->search($ruangRelatedByIdRuang));
            if (null === $this->ruangsRelatedByIdRuangScheduledForDeletion) {
                $this->ruangsRelatedByIdRuangScheduledForDeletion = clone $this->collRuangsRelatedByIdRuang;
                $this->ruangsRelatedByIdRuangScheduledForDeletion->clear();
            }
            $this->ruangsRelatedByIdRuangScheduledForDeletion[]= $ruangRelatedByIdRuang;
            $ruangRelatedByIdRuang->setRuangRelatedByParentIdRuang(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Ruang is new, it will return
     * an empty collection; or if this Ruang has previously
     * been saved, it will retrieve related RuangsRelatedByIdRuang from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Ruang.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Ruang[] List of Ruang objects
     */
    public function getRuangsRelatedByIdRuangJoinBangunan($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = RuangQuery::create(null, $criteria);
        $query->joinWith('Bangunan', $join_behavior);

        return $this->getRuangsRelatedByIdRuang($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Ruang is new, it will return
     * an empty collection; or if this Ruang has previously
     * been saved, it will retrieve related RuangsRelatedByIdRuang from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Ruang.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Ruang[] List of Ruang objects
     */
    public function getRuangsRelatedByIdRuangJoinJenisPrasarana($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = RuangQuery::create(null, $criteria);
        $query->joinWith('JenisPrasarana', $join_behavior);

        return $this->getRuangsRelatedByIdRuang($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Ruang is new, it will return
     * an empty collection; or if this Ruang has previously
     * been saved, it will retrieve related RuangsRelatedByIdRuang from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Ruang.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Ruang[] List of Ruang objects
     */
    public function getRuangsRelatedByIdRuangJoinSekolah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = RuangQuery::create(null, $criteria);
        $query->joinWith('Sekolah', $join_behavior);

        return $this->getRuangsRelatedByIdRuang($query, $con);
    }

    /**
     * Clears out the collRuangLongitudinals collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Ruang The current object (for fluent API support)
     * @see        addRuangLongitudinals()
     */
    public function clearRuangLongitudinals()
    {
        $this->collRuangLongitudinals = null; // important to set this to null since that means it is uninitialized
        $this->collRuangLongitudinalsPartial = null;

        return $this;
    }

    /**
     * reset is the collRuangLongitudinals collection loaded partially
     *
     * @return void
     */
    public function resetPartialRuangLongitudinals($v = true)
    {
        $this->collRuangLongitudinalsPartial = $v;
    }

    /**
     * Initializes the collRuangLongitudinals collection.
     *
     * By default this just sets the collRuangLongitudinals collection to an empty array (like clearcollRuangLongitudinals());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initRuangLongitudinals($overrideExisting = true)
    {
        if (null !== $this->collRuangLongitudinals && !$overrideExisting) {
            return;
        }
        $this->collRuangLongitudinals = new PropelObjectCollection();
        $this->collRuangLongitudinals->setModel('RuangLongitudinal');
    }

    /**
     * Gets an array of RuangLongitudinal objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Ruang is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|RuangLongitudinal[] List of RuangLongitudinal objects
     * @throws PropelException
     */
    public function getRuangLongitudinals($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collRuangLongitudinalsPartial && !$this->isNew();
        if (null === $this->collRuangLongitudinals || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collRuangLongitudinals) {
                // return empty collection
                $this->initRuangLongitudinals();
            } else {
                $collRuangLongitudinals = RuangLongitudinalQuery::create(null, $criteria)
                    ->filterByRuang($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collRuangLongitudinalsPartial && count($collRuangLongitudinals)) {
                      $this->initRuangLongitudinals(false);

                      foreach($collRuangLongitudinals as $obj) {
                        if (false == $this->collRuangLongitudinals->contains($obj)) {
                          $this->collRuangLongitudinals->append($obj);
                        }
                      }

                      $this->collRuangLongitudinalsPartial = true;
                    }

                    $collRuangLongitudinals->getInternalIterator()->rewind();
                    return $collRuangLongitudinals;
                }

                if($partial && $this->collRuangLongitudinals) {
                    foreach($this->collRuangLongitudinals as $obj) {
                        if($obj->isNew()) {
                            $collRuangLongitudinals[] = $obj;
                        }
                    }
                }

                $this->collRuangLongitudinals = $collRuangLongitudinals;
                $this->collRuangLongitudinalsPartial = false;
            }
        }

        return $this->collRuangLongitudinals;
    }

    /**
     * Sets a collection of RuangLongitudinal objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $ruangLongitudinals A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Ruang The current object (for fluent API support)
     */
    public function setRuangLongitudinals(PropelCollection $ruangLongitudinals, PropelPDO $con = null)
    {
        $ruangLongitudinalsToDelete = $this->getRuangLongitudinals(new Criteria(), $con)->diff($ruangLongitudinals);

        $this->ruangLongitudinalsScheduledForDeletion = unserialize(serialize($ruangLongitudinalsToDelete));

        foreach ($ruangLongitudinalsToDelete as $ruangLongitudinalRemoved) {
            $ruangLongitudinalRemoved->setRuang(null);
        }

        $this->collRuangLongitudinals = null;
        foreach ($ruangLongitudinals as $ruangLongitudinal) {
            $this->addRuangLongitudinal($ruangLongitudinal);
        }

        $this->collRuangLongitudinals = $ruangLongitudinals;
        $this->collRuangLongitudinalsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related RuangLongitudinal objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related RuangLongitudinal objects.
     * @throws PropelException
     */
    public function countRuangLongitudinals(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collRuangLongitudinalsPartial && !$this->isNew();
        if (null === $this->collRuangLongitudinals || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collRuangLongitudinals) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getRuangLongitudinals());
            }
            $query = RuangLongitudinalQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByRuang($this)
                ->count($con);
        }

        return count($this->collRuangLongitudinals);
    }

    /**
     * Method called to associate a RuangLongitudinal object to this object
     * through the RuangLongitudinal foreign key attribute.
     *
     * @param    RuangLongitudinal $l RuangLongitudinal
     * @return Ruang The current object (for fluent API support)
     */
    public function addRuangLongitudinal(RuangLongitudinal $l)
    {
        if ($this->collRuangLongitudinals === null) {
            $this->initRuangLongitudinals();
            $this->collRuangLongitudinalsPartial = true;
        }
        if (!in_array($l, $this->collRuangLongitudinals->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddRuangLongitudinal($l);
        }

        return $this;
    }

    /**
     * @param	RuangLongitudinal $ruangLongitudinal The ruangLongitudinal object to add.
     */
    protected function doAddRuangLongitudinal($ruangLongitudinal)
    {
        $this->collRuangLongitudinals[]= $ruangLongitudinal;
        $ruangLongitudinal->setRuang($this);
    }

    /**
     * @param	RuangLongitudinal $ruangLongitudinal The ruangLongitudinal object to remove.
     * @return Ruang The current object (for fluent API support)
     */
    public function removeRuangLongitudinal($ruangLongitudinal)
    {
        if ($this->getRuangLongitudinals()->contains($ruangLongitudinal)) {
            $this->collRuangLongitudinals->remove($this->collRuangLongitudinals->search($ruangLongitudinal));
            if (null === $this->ruangLongitudinalsScheduledForDeletion) {
                $this->ruangLongitudinalsScheduledForDeletion = clone $this->collRuangLongitudinals;
                $this->ruangLongitudinalsScheduledForDeletion->clear();
            }
            $this->ruangLongitudinalsScheduledForDeletion[]= clone $ruangLongitudinal;
            $ruangLongitudinal->setRuang(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Ruang is new, it will return
     * an empty collection; or if this Ruang has previously
     * been saved, it will retrieve related RuangLongitudinals from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Ruang.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|RuangLongitudinal[] List of RuangLongitudinal objects
     */
    public function getRuangLongitudinalsJoinLargeObject($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = RuangLongitudinalQuery::create(null, $criteria);
        $query->joinWith('LargeObject', $join_behavior);

        return $this->getRuangLongitudinals($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Ruang is new, it will return
     * an empty collection; or if this Ruang has previously
     * been saved, it will retrieve related RuangLongitudinals from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Ruang.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|RuangLongitudinal[] List of RuangLongitudinal objects
     */
    public function getRuangLongitudinalsJoinSemester($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = RuangLongitudinalQuery::create(null, $criteria);
        $query->joinWith('Semester', $join_behavior);

        return $this->getRuangLongitudinals($query, $con);
    }

    /**
     * Clears out the collTugasTambahans collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Ruang The current object (for fluent API support)
     * @see        addTugasTambahans()
     */
    public function clearTugasTambahans()
    {
        $this->collTugasTambahans = null; // important to set this to null since that means it is uninitialized
        $this->collTugasTambahansPartial = null;

        return $this;
    }

    /**
     * reset is the collTugasTambahans collection loaded partially
     *
     * @return void
     */
    public function resetPartialTugasTambahans($v = true)
    {
        $this->collTugasTambahansPartial = $v;
    }

    /**
     * Initializes the collTugasTambahans collection.
     *
     * By default this just sets the collTugasTambahans collection to an empty array (like clearcollTugasTambahans());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initTugasTambahans($overrideExisting = true)
    {
        if (null !== $this->collTugasTambahans && !$overrideExisting) {
            return;
        }
        $this->collTugasTambahans = new PropelObjectCollection();
        $this->collTugasTambahans->setModel('TugasTambahan');
    }

    /**
     * Gets an array of TugasTambahan objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Ruang is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|TugasTambahan[] List of TugasTambahan objects
     * @throws PropelException
     */
    public function getTugasTambahans($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collTugasTambahansPartial && !$this->isNew();
        if (null === $this->collTugasTambahans || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collTugasTambahans) {
                // return empty collection
                $this->initTugasTambahans();
            } else {
                $collTugasTambahans = TugasTambahanQuery::create(null, $criteria)
                    ->filterByRuang($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collTugasTambahansPartial && count($collTugasTambahans)) {
                      $this->initTugasTambahans(false);

                      foreach($collTugasTambahans as $obj) {
                        if (false == $this->collTugasTambahans->contains($obj)) {
                          $this->collTugasTambahans->append($obj);
                        }
                      }

                      $this->collTugasTambahansPartial = true;
                    }

                    $collTugasTambahans->getInternalIterator()->rewind();
                    return $collTugasTambahans;
                }

                if($partial && $this->collTugasTambahans) {
                    foreach($this->collTugasTambahans as $obj) {
                        if($obj->isNew()) {
                            $collTugasTambahans[] = $obj;
                        }
                    }
                }

                $this->collTugasTambahans = $collTugasTambahans;
                $this->collTugasTambahansPartial = false;
            }
        }

        return $this->collTugasTambahans;
    }

    /**
     * Sets a collection of TugasTambahan objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $tugasTambahans A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Ruang The current object (for fluent API support)
     */
    public function setTugasTambahans(PropelCollection $tugasTambahans, PropelPDO $con = null)
    {
        $tugasTambahansToDelete = $this->getTugasTambahans(new Criteria(), $con)->diff($tugasTambahans);

        $this->tugasTambahansScheduledForDeletion = unserialize(serialize($tugasTambahansToDelete));

        foreach ($tugasTambahansToDelete as $tugasTambahanRemoved) {
            $tugasTambahanRemoved->setRuang(null);
        }

        $this->collTugasTambahans = null;
        foreach ($tugasTambahans as $tugasTambahan) {
            $this->addTugasTambahan($tugasTambahan);
        }

        $this->collTugasTambahans = $tugasTambahans;
        $this->collTugasTambahansPartial = false;

        return $this;
    }

    /**
     * Returns the number of related TugasTambahan objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related TugasTambahan objects.
     * @throws PropelException
     */
    public function countTugasTambahans(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collTugasTambahansPartial && !$this->isNew();
        if (null === $this->collTugasTambahans || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collTugasTambahans) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getTugasTambahans());
            }
            $query = TugasTambahanQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByRuang($this)
                ->count($con);
        }

        return count($this->collTugasTambahans);
    }

    /**
     * Method called to associate a TugasTambahan object to this object
     * through the TugasTambahan foreign key attribute.
     *
     * @param    TugasTambahan $l TugasTambahan
     * @return Ruang The current object (for fluent API support)
     */
    public function addTugasTambahan(TugasTambahan $l)
    {
        if ($this->collTugasTambahans === null) {
            $this->initTugasTambahans();
            $this->collTugasTambahansPartial = true;
        }
        if (!in_array($l, $this->collTugasTambahans->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddTugasTambahan($l);
        }

        return $this;
    }

    /**
     * @param	TugasTambahan $tugasTambahan The tugasTambahan object to add.
     */
    protected function doAddTugasTambahan($tugasTambahan)
    {
        $this->collTugasTambahans[]= $tugasTambahan;
        $tugasTambahan->setRuang($this);
    }

    /**
     * @param	TugasTambahan $tugasTambahan The tugasTambahan object to remove.
     * @return Ruang The current object (for fluent API support)
     */
    public function removeTugasTambahan($tugasTambahan)
    {
        if ($this->getTugasTambahans()->contains($tugasTambahan)) {
            $this->collTugasTambahans->remove($this->collTugasTambahans->search($tugasTambahan));
            if (null === $this->tugasTambahansScheduledForDeletion) {
                $this->tugasTambahansScheduledForDeletion = clone $this->collTugasTambahans;
                $this->tugasTambahansScheduledForDeletion->clear();
            }
            $this->tugasTambahansScheduledForDeletion[]= $tugasTambahan;
            $tugasTambahan->setRuang(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Ruang is new, it will return
     * an empty collection; or if this Ruang has previously
     * been saved, it will retrieve related TugasTambahans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Ruang.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|TugasTambahan[] List of TugasTambahan objects
     */
    public function getTugasTambahansJoinJabatanTugasPtk($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TugasTambahanQuery::create(null, $criteria);
        $query->joinWith('JabatanTugasPtk', $join_behavior);

        return $this->getTugasTambahans($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Ruang is new, it will return
     * an empty collection; or if this Ruang has previously
     * been saved, it will retrieve related TugasTambahans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Ruang.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|TugasTambahan[] List of TugasTambahan objects
     */
    public function getTugasTambahansJoinPtk($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TugasTambahanQuery::create(null, $criteria);
        $query->joinWith('Ptk', $join_behavior);

        return $this->getTugasTambahans($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Ruang is new, it will return
     * an empty collection; or if this Ruang has previously
     * been saved, it will retrieve related TugasTambahans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Ruang.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|TugasTambahan[] List of TugasTambahan objects
     */
    public function getTugasTambahansJoinSekolah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TugasTambahanQuery::create(null, $criteria);
        $query->joinWith('Sekolah', $join_behavior);

        return $this->getTugasTambahans($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id_ruang = null;
        $this->jenis_prasarana_id = null;
        $this->sekolah_id = null;
        $this->parent_id_ruang = null;
        $this->id_bangunan = null;
        $this->asal_data = null;
        $this->kd_ruang = null;
        $this->nm_ruang = null;
        $this->lantai = null;
        $this->panjang = null;
        $this->lebar = null;
        $this->reg_pras = null;
        $this->kapasitas = null;
        $this->luas_ruang = null;
        $this->luas_plester_m2 = null;
        $this->luas_plafon_m2 = null;
        $this->luas_dinding_m2 = null;
        $this->luas_daun_jendela_m2 = null;
        $this->luas_daun_pintu_m2 = null;
        $this->panj_kusen_m = null;
        $this->luas_tutup_lantai_m2 = null;
        $this->panj_inst_listrik_m = null;
        $this->jml_inst_listrik = null;
        $this->panj_inst_air_m = null;
        $this->jml_inst_air = null;
        $this->panj_drainase_m = null;
        $this->luas_finish_struktur_m2 = null;
        $this->luas_finish_plafon_m2 = null;
        $this->luas_finish_dinding_m2 = null;
        $this->luas_finish_kpj_m2 = null;
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
            if ($this->collAlats) {
                foreach ($this->collAlats as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collBukus) {
                foreach ($this->collBukus as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collJadwals) {
                foreach ($this->collJadwals as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collRombonganBelajars) {
                foreach ($this->collRombonganBelajars as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collRuangsRelatedByIdRuang) {
                foreach ($this->collRuangsRelatedByIdRuang as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collRuangLongitudinals) {
                foreach ($this->collRuangLongitudinals as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collTugasTambahans) {
                foreach ($this->collTugasTambahans as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aRuangRelatedByParentIdRuang instanceof Persistent) {
              $this->aRuangRelatedByParentIdRuang->clearAllReferences($deep);
            }
            if ($this->aBangunan instanceof Persistent) {
              $this->aBangunan->clearAllReferences($deep);
            }
            if ($this->aJenisPrasarana instanceof Persistent) {
              $this->aJenisPrasarana->clearAllReferences($deep);
            }
            if ($this->aSekolah instanceof Persistent) {
              $this->aSekolah->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collAlats instanceof PropelCollection) {
            $this->collAlats->clearIterator();
        }
        $this->collAlats = null;
        if ($this->collBukus instanceof PropelCollection) {
            $this->collBukus->clearIterator();
        }
        $this->collBukus = null;
        if ($this->collJadwals instanceof PropelCollection) {
            $this->collJadwals->clearIterator();
        }
        $this->collJadwals = null;
        if ($this->collRombonganBelajars instanceof PropelCollection) {
            $this->collRombonganBelajars->clearIterator();
        }
        $this->collRombonganBelajars = null;
        if ($this->collRuangsRelatedByIdRuang instanceof PropelCollection) {
            $this->collRuangsRelatedByIdRuang->clearIterator();
        }
        $this->collRuangsRelatedByIdRuang = null;
        if ($this->collRuangLongitudinals instanceof PropelCollection) {
            $this->collRuangLongitudinals->clearIterator();
        }
        $this->collRuangLongitudinals = null;
        if ($this->collTugasTambahans instanceof PropelCollection) {
            $this->collTugasTambahans->clearIterator();
        }
        $this->collTugasTambahans = null;
        $this->aRuangRelatedByParentIdRuang = null;
        $this->aBangunan = null;
        $this->aJenisPrasarana = null;
        $this->aSekolah = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(RuangPeer::DEFAULT_STRING_FORMAT);
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
