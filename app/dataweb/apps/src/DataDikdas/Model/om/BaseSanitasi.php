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
use DataDikdas\Model\Sanitasi;
use DataDikdas\Model\SanitasiPeer;
use DataDikdas\Model\SanitasiQuery;
use DataDikdas\Model\Sekolah;
use DataDikdas\Model\SekolahQuery;
use DataDikdas\Model\Semester;
use DataDikdas\Model\SemesterQuery;
use DataDikdas\Model\SumberAir;
use DataDikdas\Model\SumberAirQuery;

/**
 * Base class that represents a row from the 'sanitasi' table.
 *
 * 
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseSanitasi extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'DataDikdas\\Model\\SanitasiPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        SanitasiPeer
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
     * The value for the sumber_air_id field.
     * @var        string
     */
    protected $sumber_air_id;

    /**
     * The value for the sumber_air_minum_id field.
     * @var        string
     */
    protected $sumber_air_minum_id;

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
     * The value for the ketersediaan_air field.
     * @var        string
     */
    protected $ketersediaan_air;

    /**
     * The value for the kecukupan_air field.
     * @var        string
     */
    protected $kecukupan_air;

    /**
     * The value for the minum_siswa field.
     * @var        string
     */
    protected $minum_siswa;

    /**
     * The value for the memproses_air field.
     * @var        string
     */
    protected $memproses_air;

    /**
     * The value for the siswa_bawa_air field.
     * @var        string
     */
    protected $siswa_bawa_air;

    /**
     * The value for the toilet_siswa_laki field.
     * @var        string
     */
    protected $toilet_siswa_laki;

    /**
     * The value for the toilet_siswa_perempuan field.
     * @var        string
     */
    protected $toilet_siswa_perempuan;

    /**
     * The value for the toilet_siswa_kk field.
     * @var        string
     */
    protected $toilet_siswa_kk;

    /**
     * The value for the toilet_siswa_kecil field.
     * @var        string
     */
    protected $toilet_siswa_kecil;

    /**
     * The value for the jml_jamban_l_g field.
     * Note: this column has a database default value of: '0'
     * @var        string
     */
    protected $jml_jamban_l_g;

    /**
     * The value for the jml_jamban_l_tg field.
     * Note: this column has a database default value of: '0'
     * @var        string
     */
    protected $jml_jamban_l_tg;

    /**
     * The value for the jml_jamban_p_g field.
     * Note: this column has a database default value of: '0'
     * @var        string
     */
    protected $jml_jamban_p_g;

    /**
     * The value for the jml_jamban_p_tg field.
     * Note: this column has a database default value of: '0'
     * @var        string
     */
    protected $jml_jamban_p_tg;

    /**
     * The value for the jml_jamban_lp_g field.
     * Note: this column has a database default value of: '0'
     * @var        string
     */
    protected $jml_jamban_lp_g;

    /**
     * The value for the jml_jamban_lp_tg field.
     * Note: this column has a database default value of: '0'
     * @var        string
     */
    protected $jml_jamban_lp_tg;

    /**
     * The value for the tempat_cuci_tangan field.
     * @var        string
     */
    protected $tempat_cuci_tangan;

    /**
     * The value for the tempat_cuci_tangan_rusak field.
     * @var        string
     */
    protected $tempat_cuci_tangan_rusak;

    /**
     * The value for the a_sabun_air_mengalir field.
     * @var        string
     */
    protected $a_sabun_air_mengalir;

    /**
     * The value for the jamban_difabel field.
     * @var        string
     */
    protected $jamban_difabel;

    /**
     * The value for the tipe_jamban field.
     * Note: this column has a database default value of: '9'
     * @var        string
     */
    protected $tipe_jamban;

    /**
     * The value for the a_sedia_pembalut field.
     * Note: this column has a database default value of: '0'
     * @var        string
     */
    protected $a_sedia_pembalut;

    /**
     * The value for the kegiatan_cuci_tangan field.
     * @var        string
     */
    protected $kegiatan_cuci_tangan;

    /**
     * The value for the pembuangan_air_limbah field.
     * @var        string
     */
    protected $pembuangan_air_limbah;

    /**
     * The value for the a_kuras_septitank field.
     * @var        string
     */
    protected $a_kuras_septitank;

    /**
     * The value for the a_memiliki_solokan field.
     * @var        string
     */
    protected $a_memiliki_solokan;

    /**
     * The value for the a_tempat_sampah_kelas field.
     * Note: this column has a database default value of: '0'
     * @var        string
     */
    protected $a_tempat_sampah_kelas;

    /**
     * The value for the a_tempat_sampah_tutup_p field.
     * Note: this column has a database default value of: '0'
     * @var        string
     */
    protected $a_tempat_sampah_tutup_p;

    /**
     * The value for the a_cermin_jamban_p field.
     * Note: this column has a database default value of: '0'
     * @var        string
     */
    protected $a_cermin_jamban_p;

    /**
     * The value for the a_memiliki_tps field.
     * Note: this column has a database default value of: '0'
     * @var        string
     */
    protected $a_memiliki_tps;

    /**
     * The value for the a_tps_angkut_rutin field.
     * Note: this column has a database default value of: '0'
     * @var        string
     */
    protected $a_tps_angkut_rutin;

    /**
     * The value for the a_anggaran_sanitasi field.
     * Note: this column has a database default value of: '0'
     * @var        string
     */
    protected $a_anggaran_sanitasi;

    /**
     * The value for the a_melibatkan_sanitasi_siswa field.
     * Note: this column has a database default value of: '0'
     * @var        string
     */
    protected $a_melibatkan_sanitasi_siswa;

    /**
     * The value for the a_kemitraan_san_daerah field.
     * @var        string
     */
    protected $a_kemitraan_san_daerah;

    /**
     * The value for the a_kemitraan_san_puskesmas field.
     * @var        string
     */
    protected $a_kemitraan_san_puskesmas;

    /**
     * The value for the a_kemitraan_san_swasta field.
     * @var        string
     */
    protected $a_kemitraan_san_swasta;

    /**
     * The value for the a_kemitraan_san_non_pem field.
     * @var        string
     */
    protected $a_kemitraan_san_non_pem;

    /**
     * The value for the kie_guru_cuci_tangan field.
     * @var        string
     */
    protected $kie_guru_cuci_tangan;

    /**
     * The value for the kie_guru_haid field.
     * @var        string
     */
    protected $kie_guru_haid;

    /**
     * The value for the kie_guru_perawatan_toilet field.
     * @var        string
     */
    protected $kie_guru_perawatan_toilet;

    /**
     * The value for the kie_guru_keamanan_pangan field.
     * @var        string
     */
    protected $kie_guru_keamanan_pangan;

    /**
     * The value for the kie_guru_minum_air field.
     * @var        string
     */
    protected $kie_guru_minum_air;

    /**
     * The value for the kie_kelas_cuci_tangan field.
     * @var        string
     */
    protected $kie_kelas_cuci_tangan;

    /**
     * The value for the kie_kelas_haid field.
     * @var        string
     */
    protected $kie_kelas_haid;

    /**
     * The value for the kie_kelas_perawatan_toilet field.
     * @var        string
     */
    protected $kie_kelas_perawatan_toilet;

    /**
     * The value for the kie_kelas_keamanan_pangan field.
     * @var        string
     */
    protected $kie_kelas_keamanan_pangan;

    /**
     * The value for the kie_kelas_minum_air field.
     * @var        string
     */
    protected $kie_kelas_minum_air;

    /**
     * The value for the kie_toilet_cuci_tangan field.
     * @var        string
     */
    protected $kie_toilet_cuci_tangan;

    /**
     * The value for the kie_toilet_haid field.
     * @var        string
     */
    protected $kie_toilet_haid;

    /**
     * The value for the kie_toilet_perawatan_toilet field.
     * @var        string
     */
    protected $kie_toilet_perawatan_toilet;

    /**
     * The value for the kie_toilet_keamanan_pangan field.
     * @var        string
     */
    protected $kie_toilet_keamanan_pangan;

    /**
     * The value for the kie_toilet_minum_air field.
     * @var        string
     */
    protected $kie_toilet_minum_air;

    /**
     * The value for the kie_selasar_cuci_tangan field.
     * @var        string
     */
    protected $kie_selasar_cuci_tangan;

    /**
     * The value for the kie_selasar_haid field.
     * @var        string
     */
    protected $kie_selasar_haid;

    /**
     * The value for the kie_selasar_perawatan_toilet field.
     * @var        string
     */
    protected $kie_selasar_perawatan_toilet;

    /**
     * The value for the kie_selasar_keamanan_pangan field.
     * @var        string
     */
    protected $kie_selasar_keamanan_pangan;

    /**
     * The value for the kie_selasar_minum_air field.
     * @var        string
     */
    protected $kie_selasar_minum_air;

    /**
     * The value for the kie_uks_cuci_tangan field.
     * @var        string
     */
    protected $kie_uks_cuci_tangan;

    /**
     * The value for the kie_uks_haid field.
     * @var        string
     */
    protected $kie_uks_haid;

    /**
     * The value for the kie_uks_perawatan_toilet field.
     * @var        string
     */
    protected $kie_uks_perawatan_toilet;

    /**
     * The value for the kie_uks_keamanan_pangan field.
     * @var        string
     */
    protected $kie_uks_keamanan_pangan;

    /**
     * The value for the kie_uks_minum_air field.
     * @var        string
     */
    protected $kie_uks_minum_air;

    /**
     * The value for the kie_kantin_cuci_tangan field.
     * @var        string
     */
    protected $kie_kantin_cuci_tangan;

    /**
     * The value for the kie_kantin_haid field.
     * @var        string
     */
    protected $kie_kantin_haid;

    /**
     * The value for the kie_kantin_perawatan_toilet field.
     * @var        string
     */
    protected $kie_kantin_perawatan_toilet;

    /**
     * The value for the kie_kantin_keamanan_pangan field.
     * @var        string
     */
    protected $kie_kantin_keamanan_pangan;

    /**
     * The value for the kie_kantin_minum_air field.
     * @var        string
     */
    protected $kie_kantin_minum_air;

    /**
     * @var        Sekolah
     */
    protected $aSekolah;

    /**
     * @var        Semester
     */
    protected $aSemester;

    /**
     * @var        SumberAir
     */
    protected $aSumberAirRelatedBySumberAirId;

    /**
     * @var        SumberAir
     */
    protected $aSumberAirRelatedBySumberAirMinumId;

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
        $this->create_date = '2021-06-07 11:49:57';
        $this->last_update = '2021-06-07 11:49:57';
        $this->last_sync = '1901-01-01 00:00:00';
        $this->jml_jamban_l_g = '0';
        $this->jml_jamban_l_tg = '0';
        $this->jml_jamban_p_g = '0';
        $this->jml_jamban_p_tg = '0';
        $this->jml_jamban_lp_g = '0';
        $this->jml_jamban_lp_tg = '0';
        $this->tipe_jamban = '9';
        $this->a_sedia_pembalut = '0';
        $this->a_tempat_sampah_kelas = '0';
        $this->a_tempat_sampah_tutup_p = '0';
        $this->a_cermin_jamban_p = '0';
        $this->a_memiliki_tps = '0';
        $this->a_tps_angkut_rutin = '0';
        $this->a_anggaran_sanitasi = '0';
        $this->a_melibatkan_sanitasi_siswa = '0';
    }

    /**
     * Initializes internal state of BaseSanitasi object.
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
     * Get the [sumber_air_id] column value.
     * 
     * @return string
     */
    public function getSumberAirId()
    {
        return $this->sumber_air_id;
    }

    /**
     * Get the [sumber_air_minum_id] column value.
     * 
     * @return string
     */
    public function getSumberAirMinumId()
    {
        return $this->sumber_air_minum_id;
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
     * Get the [ketersediaan_air] column value.
     * 
     * @return string
     */
    public function getKetersediaanAir()
    {
        return $this->ketersediaan_air;
    }

    /**
     * Get the [kecukupan_air] column value.
     * 
     * @return string
     */
    public function getKecukupanAir()
    {
        return $this->kecukupan_air;
    }

    /**
     * Get the [minum_siswa] column value.
     * 
     * @return string
     */
    public function getMinumSiswa()
    {
        return $this->minum_siswa;
    }

    /**
     * Get the [memproses_air] column value.
     * 
     * @return string
     */
    public function getMemprosesAir()
    {
        return $this->memproses_air;
    }

    /**
     * Get the [siswa_bawa_air] column value.
     * 
     * @return string
     */
    public function getSiswaBawaAir()
    {
        return $this->siswa_bawa_air;
    }

    /**
     * Get the [toilet_siswa_laki] column value.
     * 
     * @return string
     */
    public function getToiletSiswaLaki()
    {
        return $this->toilet_siswa_laki;
    }

    /**
     * Get the [toilet_siswa_perempuan] column value.
     * 
     * @return string
     */
    public function getToiletSiswaPerempuan()
    {
        return $this->toilet_siswa_perempuan;
    }

    /**
     * Get the [toilet_siswa_kk] column value.
     * 
     * @return string
     */
    public function getToiletSiswaKk()
    {
        return $this->toilet_siswa_kk;
    }

    /**
     * Get the [toilet_siswa_kecil] column value.
     * 
     * @return string
     */
    public function getToiletSiswaKecil()
    {
        return $this->toilet_siswa_kecil;
    }

    /**
     * Get the [jml_jamban_l_g] column value.
     * 
     * @return string
     */
    public function getJmlJambanLG()
    {
        return $this->jml_jamban_l_g;
    }

    /**
     * Get the [jml_jamban_l_tg] column value.
     * 
     * @return string
     */
    public function getJmlJambanLTg()
    {
        return $this->jml_jamban_l_tg;
    }

    /**
     * Get the [jml_jamban_p_g] column value.
     * 
     * @return string
     */
    public function getJmlJambanPG()
    {
        return $this->jml_jamban_p_g;
    }

    /**
     * Get the [jml_jamban_p_tg] column value.
     * 
     * @return string
     */
    public function getJmlJambanPTg()
    {
        return $this->jml_jamban_p_tg;
    }

    /**
     * Get the [jml_jamban_lp_g] column value.
     * 
     * @return string
     */
    public function getJmlJambanLpG()
    {
        return $this->jml_jamban_lp_g;
    }

    /**
     * Get the [jml_jamban_lp_tg] column value.
     * 
     * @return string
     */
    public function getJmlJambanLpTg()
    {
        return $this->jml_jamban_lp_tg;
    }

    /**
     * Get the [tempat_cuci_tangan] column value.
     * 
     * @return string
     */
    public function getTempatCuciTangan()
    {
        return $this->tempat_cuci_tangan;
    }

    /**
     * Get the [tempat_cuci_tangan_rusak] column value.
     * 
     * @return string
     */
    public function getTempatCuciTanganRusak()
    {
        return $this->tempat_cuci_tangan_rusak;
    }

    /**
     * Get the [a_sabun_air_mengalir] column value.
     * 
     * @return string
     */
    public function getASabunAirMengalir()
    {
        return $this->a_sabun_air_mengalir;
    }

    /**
     * Get the [jamban_difabel] column value.
     * 
     * @return string
     */
    public function getJambanDifabel()
    {
        return $this->jamban_difabel;
    }

    /**
     * Get the [tipe_jamban] column value.
     * 
     * @return string
     */
    public function getTipeJamban()
    {
        return $this->tipe_jamban;
    }

    /**
     * Get the [a_sedia_pembalut] column value.
     * 
     * @return string
     */
    public function getASediaPembalut()
    {
        return $this->a_sedia_pembalut;
    }

    /**
     * Get the [kegiatan_cuci_tangan] column value.
     * 
     * @return string
     */
    public function getKegiatanCuciTangan()
    {
        return $this->kegiatan_cuci_tangan;
    }

    /**
     * Get the [pembuangan_air_limbah] column value.
     * 
     * @return string
     */
    public function getPembuanganAirLimbah()
    {
        return $this->pembuangan_air_limbah;
    }

    /**
     * Get the [a_kuras_septitank] column value.
     * 
     * @return string
     */
    public function getAKurasSeptitank()
    {
        return $this->a_kuras_septitank;
    }

    /**
     * Get the [a_memiliki_solokan] column value.
     * 
     * @return string
     */
    public function getAMemilikiSolokan()
    {
        return $this->a_memiliki_solokan;
    }

    /**
     * Get the [a_tempat_sampah_kelas] column value.
     * 
     * @return string
     */
    public function getATempatSampahKelas()
    {
        return $this->a_tempat_sampah_kelas;
    }

    /**
     * Get the [a_tempat_sampah_tutup_p] column value.
     * 
     * @return string
     */
    public function getATempatSampahTutupP()
    {
        return $this->a_tempat_sampah_tutup_p;
    }

    /**
     * Get the [a_cermin_jamban_p] column value.
     * 
     * @return string
     */
    public function getACerminJambanP()
    {
        return $this->a_cermin_jamban_p;
    }

    /**
     * Get the [a_memiliki_tps] column value.
     * 
     * @return string
     */
    public function getAMemilikiTps()
    {
        return $this->a_memiliki_tps;
    }

    /**
     * Get the [a_tps_angkut_rutin] column value.
     * 
     * @return string
     */
    public function getATpsAngkutRutin()
    {
        return $this->a_tps_angkut_rutin;
    }

    /**
     * Get the [a_anggaran_sanitasi] column value.
     * 
     * @return string
     */
    public function getAAnggaranSanitasi()
    {
        return $this->a_anggaran_sanitasi;
    }

    /**
     * Get the [a_melibatkan_sanitasi_siswa] column value.
     * 
     * @return string
     */
    public function getAMelibatkanSanitasiSiswa()
    {
        return $this->a_melibatkan_sanitasi_siswa;
    }

    /**
     * Get the [a_kemitraan_san_daerah] column value.
     * 
     * @return string
     */
    public function getAKemitraanSanDaerah()
    {
        return $this->a_kemitraan_san_daerah;
    }

    /**
     * Get the [a_kemitraan_san_puskesmas] column value.
     * 
     * @return string
     */
    public function getAKemitraanSanPuskesmas()
    {
        return $this->a_kemitraan_san_puskesmas;
    }

    /**
     * Get the [a_kemitraan_san_swasta] column value.
     * 
     * @return string
     */
    public function getAKemitraanSanSwasta()
    {
        return $this->a_kemitraan_san_swasta;
    }

    /**
     * Get the [a_kemitraan_san_non_pem] column value.
     * 
     * @return string
     */
    public function getAKemitraanSanNonPem()
    {
        return $this->a_kemitraan_san_non_pem;
    }

    /**
     * Get the [kie_guru_cuci_tangan] column value.
     * 
     * @return string
     */
    public function getKieGuruCuciTangan()
    {
        return $this->kie_guru_cuci_tangan;
    }

    /**
     * Get the [kie_guru_haid] column value.
     * 
     * @return string
     */
    public function getKieGuruHaid()
    {
        return $this->kie_guru_haid;
    }

    /**
     * Get the [kie_guru_perawatan_toilet] column value.
     * 
     * @return string
     */
    public function getKieGuruPerawatanToilet()
    {
        return $this->kie_guru_perawatan_toilet;
    }

    /**
     * Get the [kie_guru_keamanan_pangan] column value.
     * 
     * @return string
     */
    public function getKieGuruKeamananPangan()
    {
        return $this->kie_guru_keamanan_pangan;
    }

    /**
     * Get the [kie_guru_minum_air] column value.
     * 
     * @return string
     */
    public function getKieGuruMinumAir()
    {
        return $this->kie_guru_minum_air;
    }

    /**
     * Get the [kie_kelas_cuci_tangan] column value.
     * 
     * @return string
     */
    public function getKieKelasCuciTangan()
    {
        return $this->kie_kelas_cuci_tangan;
    }

    /**
     * Get the [kie_kelas_haid] column value.
     * 
     * @return string
     */
    public function getKieKelasHaid()
    {
        return $this->kie_kelas_haid;
    }

    /**
     * Get the [kie_kelas_perawatan_toilet] column value.
     * 
     * @return string
     */
    public function getKieKelasPerawatanToilet()
    {
        return $this->kie_kelas_perawatan_toilet;
    }

    /**
     * Get the [kie_kelas_keamanan_pangan] column value.
     * 
     * @return string
     */
    public function getKieKelasKeamananPangan()
    {
        return $this->kie_kelas_keamanan_pangan;
    }

    /**
     * Get the [kie_kelas_minum_air] column value.
     * 
     * @return string
     */
    public function getKieKelasMinumAir()
    {
        return $this->kie_kelas_minum_air;
    }

    /**
     * Get the [kie_toilet_cuci_tangan] column value.
     * 
     * @return string
     */
    public function getKieToiletCuciTangan()
    {
        return $this->kie_toilet_cuci_tangan;
    }

    /**
     * Get the [kie_toilet_haid] column value.
     * 
     * @return string
     */
    public function getKieToiletHaid()
    {
        return $this->kie_toilet_haid;
    }

    /**
     * Get the [kie_toilet_perawatan_toilet] column value.
     * 
     * @return string
     */
    public function getKieToiletPerawatanToilet()
    {
        return $this->kie_toilet_perawatan_toilet;
    }

    /**
     * Get the [kie_toilet_keamanan_pangan] column value.
     * 
     * @return string
     */
    public function getKieToiletKeamananPangan()
    {
        return $this->kie_toilet_keamanan_pangan;
    }

    /**
     * Get the [kie_toilet_minum_air] column value.
     * 
     * @return string
     */
    public function getKieToiletMinumAir()
    {
        return $this->kie_toilet_minum_air;
    }

    /**
     * Get the [kie_selasar_cuci_tangan] column value.
     * 
     * @return string
     */
    public function getKieSelasarCuciTangan()
    {
        return $this->kie_selasar_cuci_tangan;
    }

    /**
     * Get the [kie_selasar_haid] column value.
     * 
     * @return string
     */
    public function getKieSelasarHaid()
    {
        return $this->kie_selasar_haid;
    }

    /**
     * Get the [kie_selasar_perawatan_toilet] column value.
     * 
     * @return string
     */
    public function getKieSelasarPerawatanToilet()
    {
        return $this->kie_selasar_perawatan_toilet;
    }

    /**
     * Get the [kie_selasar_keamanan_pangan] column value.
     * 
     * @return string
     */
    public function getKieSelasarKeamananPangan()
    {
        return $this->kie_selasar_keamanan_pangan;
    }

    /**
     * Get the [kie_selasar_minum_air] column value.
     * 
     * @return string
     */
    public function getKieSelasarMinumAir()
    {
        return $this->kie_selasar_minum_air;
    }

    /**
     * Get the [kie_uks_cuci_tangan] column value.
     * 
     * @return string
     */
    public function getKieUksCuciTangan()
    {
        return $this->kie_uks_cuci_tangan;
    }

    /**
     * Get the [kie_uks_haid] column value.
     * 
     * @return string
     */
    public function getKieUksHaid()
    {
        return $this->kie_uks_haid;
    }

    /**
     * Get the [kie_uks_perawatan_toilet] column value.
     * 
     * @return string
     */
    public function getKieUksPerawatanToilet()
    {
        return $this->kie_uks_perawatan_toilet;
    }

    /**
     * Get the [kie_uks_keamanan_pangan] column value.
     * 
     * @return string
     */
    public function getKieUksKeamananPangan()
    {
        return $this->kie_uks_keamanan_pangan;
    }

    /**
     * Get the [kie_uks_minum_air] column value.
     * 
     * @return string
     */
    public function getKieUksMinumAir()
    {
        return $this->kie_uks_minum_air;
    }

    /**
     * Get the [kie_kantin_cuci_tangan] column value.
     * 
     * @return string
     */
    public function getKieKantinCuciTangan()
    {
        return $this->kie_kantin_cuci_tangan;
    }

    /**
     * Get the [kie_kantin_haid] column value.
     * 
     * @return string
     */
    public function getKieKantinHaid()
    {
        return $this->kie_kantin_haid;
    }

    /**
     * Get the [kie_kantin_perawatan_toilet] column value.
     * 
     * @return string
     */
    public function getKieKantinPerawatanToilet()
    {
        return $this->kie_kantin_perawatan_toilet;
    }

    /**
     * Get the [kie_kantin_keamanan_pangan] column value.
     * 
     * @return string
     */
    public function getKieKantinKeamananPangan()
    {
        return $this->kie_kantin_keamanan_pangan;
    }

    /**
     * Get the [kie_kantin_minum_air] column value.
     * 
     * @return string
     */
    public function getKieKantinMinumAir()
    {
        return $this->kie_kantin_minum_air;
    }

    /**
     * Set the value of [sekolah_id] column.
     * 
     * @param string $v new value
     * @return Sanitasi The current object (for fluent API support)
     */
    public function setSekolahId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->sekolah_id !== $v) {
            $this->sekolah_id = $v;
            $this->modifiedColumns[] = SanitasiPeer::SEKOLAH_ID;
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
     * @return Sanitasi The current object (for fluent API support)
     */
    public function setSemesterId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->semester_id !== $v) {
            $this->semester_id = $v;
            $this->modifiedColumns[] = SanitasiPeer::SEMESTER_ID;
        }

        if ($this->aSemester !== null && $this->aSemester->getSemesterId() !== $v) {
            $this->aSemester = null;
        }


        return $this;
    } // setSemesterId()

    /**
     * Set the value of [sumber_air_id] column.
     * 
     * @param string $v new value
     * @return Sanitasi The current object (for fluent API support)
     */
    public function setSumberAirId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->sumber_air_id !== $v) {
            $this->sumber_air_id = $v;
            $this->modifiedColumns[] = SanitasiPeer::SUMBER_AIR_ID;
        }

        if ($this->aSumberAirRelatedBySumberAirId !== null && $this->aSumberAirRelatedBySumberAirId->getSumberAirId() !== $v) {
            $this->aSumberAirRelatedBySumberAirId = null;
        }


        return $this;
    } // setSumberAirId()

    /**
     * Set the value of [sumber_air_minum_id] column.
     * 
     * @param string $v new value
     * @return Sanitasi The current object (for fluent API support)
     */
    public function setSumberAirMinumId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->sumber_air_minum_id !== $v) {
            $this->sumber_air_minum_id = $v;
            $this->modifiedColumns[] = SanitasiPeer::SUMBER_AIR_MINUM_ID;
        }

        if ($this->aSumberAirRelatedBySumberAirMinumId !== null && $this->aSumberAirRelatedBySumberAirMinumId->getSumberAirId() !== $v) {
            $this->aSumberAirRelatedBySumberAirMinumId = null;
        }


        return $this;
    } // setSumberAirMinumId()

    /**
     * Sets the value of [create_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Sanitasi The current object (for fluent API support)
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
                $this->modifiedColumns[] = SanitasiPeer::CREATE_DATE;
            }
        } // if either are not null


        return $this;
    } // setCreateDate()

    /**
     * Sets the value of [last_update] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Sanitasi The current object (for fluent API support)
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
                $this->modifiedColumns[] = SanitasiPeer::LAST_UPDATE;
            }
        } // if either are not null


        return $this;
    } // setLastUpdate()

    /**
     * Set the value of [soft_delete] column.
     * 
     * @param string $v new value
     * @return Sanitasi The current object (for fluent API support)
     */
    public function setSoftDelete($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->soft_delete !== $v) {
            $this->soft_delete = $v;
            $this->modifiedColumns[] = SanitasiPeer::SOFT_DELETE;
        }


        return $this;
    } // setSoftDelete()

    /**
     * Sets the value of [last_sync] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Sanitasi The current object (for fluent API support)
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
                $this->modifiedColumns[] = SanitasiPeer::LAST_SYNC;
            }
        } // if either are not null


        return $this;
    } // setLastSync()

    /**
     * Set the value of [updater_id] column.
     * 
     * @param string $v new value
     * @return Sanitasi The current object (for fluent API support)
     */
    public function setUpdaterId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->updater_id !== $v) {
            $this->updater_id = $v;
            $this->modifiedColumns[] = SanitasiPeer::UPDATER_ID;
        }


        return $this;
    } // setUpdaterId()

    /**
     * Set the value of [ketersediaan_air] column.
     * 
     * @param string $v new value
     * @return Sanitasi The current object (for fluent API support)
     */
    public function setKetersediaanAir($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->ketersediaan_air !== $v) {
            $this->ketersediaan_air = $v;
            $this->modifiedColumns[] = SanitasiPeer::KETERSEDIAAN_AIR;
        }


        return $this;
    } // setKetersediaanAir()

    /**
     * Set the value of [kecukupan_air] column.
     * 
     * @param string $v new value
     * @return Sanitasi The current object (for fluent API support)
     */
    public function setKecukupanAir($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->kecukupan_air !== $v) {
            $this->kecukupan_air = $v;
            $this->modifiedColumns[] = SanitasiPeer::KECUKUPAN_AIR;
        }


        return $this;
    } // setKecukupanAir()

    /**
     * Set the value of [minum_siswa] column.
     * 
     * @param string $v new value
     * @return Sanitasi The current object (for fluent API support)
     */
    public function setMinumSiswa($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->minum_siswa !== $v) {
            $this->minum_siswa = $v;
            $this->modifiedColumns[] = SanitasiPeer::MINUM_SISWA;
        }


        return $this;
    } // setMinumSiswa()

    /**
     * Set the value of [memproses_air] column.
     * 
     * @param string $v new value
     * @return Sanitasi The current object (for fluent API support)
     */
    public function setMemprosesAir($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->memproses_air !== $v) {
            $this->memproses_air = $v;
            $this->modifiedColumns[] = SanitasiPeer::MEMPROSES_AIR;
        }


        return $this;
    } // setMemprosesAir()

    /**
     * Set the value of [siswa_bawa_air] column.
     * 
     * @param string $v new value
     * @return Sanitasi The current object (for fluent API support)
     */
    public function setSiswaBawaAir($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->siswa_bawa_air !== $v) {
            $this->siswa_bawa_air = $v;
            $this->modifiedColumns[] = SanitasiPeer::SISWA_BAWA_AIR;
        }


        return $this;
    } // setSiswaBawaAir()

    /**
     * Set the value of [toilet_siswa_laki] column.
     * 
     * @param string $v new value
     * @return Sanitasi The current object (for fluent API support)
     */
    public function setToiletSiswaLaki($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->toilet_siswa_laki !== $v) {
            $this->toilet_siswa_laki = $v;
            $this->modifiedColumns[] = SanitasiPeer::TOILET_SISWA_LAKI;
        }


        return $this;
    } // setToiletSiswaLaki()

    /**
     * Set the value of [toilet_siswa_perempuan] column.
     * 
     * @param string $v new value
     * @return Sanitasi The current object (for fluent API support)
     */
    public function setToiletSiswaPerempuan($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->toilet_siswa_perempuan !== $v) {
            $this->toilet_siswa_perempuan = $v;
            $this->modifiedColumns[] = SanitasiPeer::TOILET_SISWA_PEREMPUAN;
        }


        return $this;
    } // setToiletSiswaPerempuan()

    /**
     * Set the value of [toilet_siswa_kk] column.
     * 
     * @param string $v new value
     * @return Sanitasi The current object (for fluent API support)
     */
    public function setToiletSiswaKk($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->toilet_siswa_kk !== $v) {
            $this->toilet_siswa_kk = $v;
            $this->modifiedColumns[] = SanitasiPeer::TOILET_SISWA_KK;
        }


        return $this;
    } // setToiletSiswaKk()

    /**
     * Set the value of [toilet_siswa_kecil] column.
     * 
     * @param string $v new value
     * @return Sanitasi The current object (for fluent API support)
     */
    public function setToiletSiswaKecil($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->toilet_siswa_kecil !== $v) {
            $this->toilet_siswa_kecil = $v;
            $this->modifiedColumns[] = SanitasiPeer::TOILET_SISWA_KECIL;
        }


        return $this;
    } // setToiletSiswaKecil()

    /**
     * Set the value of [jml_jamban_l_g] column.
     * 
     * @param string $v new value
     * @return Sanitasi The current object (for fluent API support)
     */
    public function setJmlJambanLG($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->jml_jamban_l_g !== $v) {
            $this->jml_jamban_l_g = $v;
            $this->modifiedColumns[] = SanitasiPeer::JML_JAMBAN_L_G;
        }


        return $this;
    } // setJmlJambanLG()

    /**
     * Set the value of [jml_jamban_l_tg] column.
     * 
     * @param string $v new value
     * @return Sanitasi The current object (for fluent API support)
     */
    public function setJmlJambanLTg($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->jml_jamban_l_tg !== $v) {
            $this->jml_jamban_l_tg = $v;
            $this->modifiedColumns[] = SanitasiPeer::JML_JAMBAN_L_TG;
        }


        return $this;
    } // setJmlJambanLTg()

    /**
     * Set the value of [jml_jamban_p_g] column.
     * 
     * @param string $v new value
     * @return Sanitasi The current object (for fluent API support)
     */
    public function setJmlJambanPG($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->jml_jamban_p_g !== $v) {
            $this->jml_jamban_p_g = $v;
            $this->modifiedColumns[] = SanitasiPeer::JML_JAMBAN_P_G;
        }


        return $this;
    } // setJmlJambanPG()

    /**
     * Set the value of [jml_jamban_p_tg] column.
     * 
     * @param string $v new value
     * @return Sanitasi The current object (for fluent API support)
     */
    public function setJmlJambanPTg($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->jml_jamban_p_tg !== $v) {
            $this->jml_jamban_p_tg = $v;
            $this->modifiedColumns[] = SanitasiPeer::JML_JAMBAN_P_TG;
        }


        return $this;
    } // setJmlJambanPTg()

    /**
     * Set the value of [jml_jamban_lp_g] column.
     * 
     * @param string $v new value
     * @return Sanitasi The current object (for fluent API support)
     */
    public function setJmlJambanLpG($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->jml_jamban_lp_g !== $v) {
            $this->jml_jamban_lp_g = $v;
            $this->modifiedColumns[] = SanitasiPeer::JML_JAMBAN_LP_G;
        }


        return $this;
    } // setJmlJambanLpG()

    /**
     * Set the value of [jml_jamban_lp_tg] column.
     * 
     * @param string $v new value
     * @return Sanitasi The current object (for fluent API support)
     */
    public function setJmlJambanLpTg($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->jml_jamban_lp_tg !== $v) {
            $this->jml_jamban_lp_tg = $v;
            $this->modifiedColumns[] = SanitasiPeer::JML_JAMBAN_LP_TG;
        }


        return $this;
    } // setJmlJambanLpTg()

    /**
     * Set the value of [tempat_cuci_tangan] column.
     * 
     * @param string $v new value
     * @return Sanitasi The current object (for fluent API support)
     */
    public function setTempatCuciTangan($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->tempat_cuci_tangan !== $v) {
            $this->tempat_cuci_tangan = $v;
            $this->modifiedColumns[] = SanitasiPeer::TEMPAT_CUCI_TANGAN;
        }


        return $this;
    } // setTempatCuciTangan()

    /**
     * Set the value of [tempat_cuci_tangan_rusak] column.
     * 
     * @param string $v new value
     * @return Sanitasi The current object (for fluent API support)
     */
    public function setTempatCuciTanganRusak($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->tempat_cuci_tangan_rusak !== $v) {
            $this->tempat_cuci_tangan_rusak = $v;
            $this->modifiedColumns[] = SanitasiPeer::TEMPAT_CUCI_TANGAN_RUSAK;
        }


        return $this;
    } // setTempatCuciTanganRusak()

    /**
     * Set the value of [a_sabun_air_mengalir] column.
     * 
     * @param string $v new value
     * @return Sanitasi The current object (for fluent API support)
     */
    public function setASabunAirMengalir($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->a_sabun_air_mengalir !== $v) {
            $this->a_sabun_air_mengalir = $v;
            $this->modifiedColumns[] = SanitasiPeer::A_SABUN_AIR_MENGALIR;
        }


        return $this;
    } // setASabunAirMengalir()

    /**
     * Set the value of [jamban_difabel] column.
     * 
     * @param string $v new value
     * @return Sanitasi The current object (for fluent API support)
     */
    public function setJambanDifabel($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->jamban_difabel !== $v) {
            $this->jamban_difabel = $v;
            $this->modifiedColumns[] = SanitasiPeer::JAMBAN_DIFABEL;
        }


        return $this;
    } // setJambanDifabel()

    /**
     * Set the value of [tipe_jamban] column.
     * 
     * @param string $v new value
     * @return Sanitasi The current object (for fluent API support)
     */
    public function setTipeJamban($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->tipe_jamban !== $v) {
            $this->tipe_jamban = $v;
            $this->modifiedColumns[] = SanitasiPeer::TIPE_JAMBAN;
        }


        return $this;
    } // setTipeJamban()

    /**
     * Set the value of [a_sedia_pembalut] column.
     * 
     * @param string $v new value
     * @return Sanitasi The current object (for fluent API support)
     */
    public function setASediaPembalut($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->a_sedia_pembalut !== $v) {
            $this->a_sedia_pembalut = $v;
            $this->modifiedColumns[] = SanitasiPeer::A_SEDIA_PEMBALUT;
        }


        return $this;
    } // setASediaPembalut()

    /**
     * Set the value of [kegiatan_cuci_tangan] column.
     * 
     * @param string $v new value
     * @return Sanitasi The current object (for fluent API support)
     */
    public function setKegiatanCuciTangan($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->kegiatan_cuci_tangan !== $v) {
            $this->kegiatan_cuci_tangan = $v;
            $this->modifiedColumns[] = SanitasiPeer::KEGIATAN_CUCI_TANGAN;
        }


        return $this;
    } // setKegiatanCuciTangan()

    /**
     * Set the value of [pembuangan_air_limbah] column.
     * 
     * @param string $v new value
     * @return Sanitasi The current object (for fluent API support)
     */
    public function setPembuanganAirLimbah($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->pembuangan_air_limbah !== $v) {
            $this->pembuangan_air_limbah = $v;
            $this->modifiedColumns[] = SanitasiPeer::PEMBUANGAN_AIR_LIMBAH;
        }


        return $this;
    } // setPembuanganAirLimbah()

    /**
     * Set the value of [a_kuras_septitank] column.
     * 
     * @param string $v new value
     * @return Sanitasi The current object (for fluent API support)
     */
    public function setAKurasSeptitank($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->a_kuras_septitank !== $v) {
            $this->a_kuras_septitank = $v;
            $this->modifiedColumns[] = SanitasiPeer::A_KURAS_SEPTITANK;
        }


        return $this;
    } // setAKurasSeptitank()

    /**
     * Set the value of [a_memiliki_solokan] column.
     * 
     * @param string $v new value
     * @return Sanitasi The current object (for fluent API support)
     */
    public function setAMemilikiSolokan($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->a_memiliki_solokan !== $v) {
            $this->a_memiliki_solokan = $v;
            $this->modifiedColumns[] = SanitasiPeer::A_MEMILIKI_SOLOKAN;
        }


        return $this;
    } // setAMemilikiSolokan()

    /**
     * Set the value of [a_tempat_sampah_kelas] column.
     * 
     * @param string $v new value
     * @return Sanitasi The current object (for fluent API support)
     */
    public function setATempatSampahKelas($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->a_tempat_sampah_kelas !== $v) {
            $this->a_tempat_sampah_kelas = $v;
            $this->modifiedColumns[] = SanitasiPeer::A_TEMPAT_SAMPAH_KELAS;
        }


        return $this;
    } // setATempatSampahKelas()

    /**
     * Set the value of [a_tempat_sampah_tutup_p] column.
     * 
     * @param string $v new value
     * @return Sanitasi The current object (for fluent API support)
     */
    public function setATempatSampahTutupP($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->a_tempat_sampah_tutup_p !== $v) {
            $this->a_tempat_sampah_tutup_p = $v;
            $this->modifiedColumns[] = SanitasiPeer::A_TEMPAT_SAMPAH_TUTUP_P;
        }


        return $this;
    } // setATempatSampahTutupP()

    /**
     * Set the value of [a_cermin_jamban_p] column.
     * 
     * @param string $v new value
     * @return Sanitasi The current object (for fluent API support)
     */
    public function setACerminJambanP($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->a_cermin_jamban_p !== $v) {
            $this->a_cermin_jamban_p = $v;
            $this->modifiedColumns[] = SanitasiPeer::A_CERMIN_JAMBAN_P;
        }


        return $this;
    } // setACerminJambanP()

    /**
     * Set the value of [a_memiliki_tps] column.
     * 
     * @param string $v new value
     * @return Sanitasi The current object (for fluent API support)
     */
    public function setAMemilikiTps($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->a_memiliki_tps !== $v) {
            $this->a_memiliki_tps = $v;
            $this->modifiedColumns[] = SanitasiPeer::A_MEMILIKI_TPS;
        }


        return $this;
    } // setAMemilikiTps()

    /**
     * Set the value of [a_tps_angkut_rutin] column.
     * 
     * @param string $v new value
     * @return Sanitasi The current object (for fluent API support)
     */
    public function setATpsAngkutRutin($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->a_tps_angkut_rutin !== $v) {
            $this->a_tps_angkut_rutin = $v;
            $this->modifiedColumns[] = SanitasiPeer::A_TPS_ANGKUT_RUTIN;
        }


        return $this;
    } // setATpsAngkutRutin()

    /**
     * Set the value of [a_anggaran_sanitasi] column.
     * 
     * @param string $v new value
     * @return Sanitasi The current object (for fluent API support)
     */
    public function setAAnggaranSanitasi($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->a_anggaran_sanitasi !== $v) {
            $this->a_anggaran_sanitasi = $v;
            $this->modifiedColumns[] = SanitasiPeer::A_ANGGARAN_SANITASI;
        }


        return $this;
    } // setAAnggaranSanitasi()

    /**
     * Set the value of [a_melibatkan_sanitasi_siswa] column.
     * 
     * @param string $v new value
     * @return Sanitasi The current object (for fluent API support)
     */
    public function setAMelibatkanSanitasiSiswa($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->a_melibatkan_sanitasi_siswa !== $v) {
            $this->a_melibatkan_sanitasi_siswa = $v;
            $this->modifiedColumns[] = SanitasiPeer::A_MELIBATKAN_SANITASI_SISWA;
        }


        return $this;
    } // setAMelibatkanSanitasiSiswa()

    /**
     * Set the value of [a_kemitraan_san_daerah] column.
     * 
     * @param string $v new value
     * @return Sanitasi The current object (for fluent API support)
     */
    public function setAKemitraanSanDaerah($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->a_kemitraan_san_daerah !== $v) {
            $this->a_kemitraan_san_daerah = $v;
            $this->modifiedColumns[] = SanitasiPeer::A_KEMITRAAN_SAN_DAERAH;
        }


        return $this;
    } // setAKemitraanSanDaerah()

    /**
     * Set the value of [a_kemitraan_san_puskesmas] column.
     * 
     * @param string $v new value
     * @return Sanitasi The current object (for fluent API support)
     */
    public function setAKemitraanSanPuskesmas($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->a_kemitraan_san_puskesmas !== $v) {
            $this->a_kemitraan_san_puskesmas = $v;
            $this->modifiedColumns[] = SanitasiPeer::A_KEMITRAAN_SAN_PUSKESMAS;
        }


        return $this;
    } // setAKemitraanSanPuskesmas()

    /**
     * Set the value of [a_kemitraan_san_swasta] column.
     * 
     * @param string $v new value
     * @return Sanitasi The current object (for fluent API support)
     */
    public function setAKemitraanSanSwasta($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->a_kemitraan_san_swasta !== $v) {
            $this->a_kemitraan_san_swasta = $v;
            $this->modifiedColumns[] = SanitasiPeer::A_KEMITRAAN_SAN_SWASTA;
        }


        return $this;
    } // setAKemitraanSanSwasta()

    /**
     * Set the value of [a_kemitraan_san_non_pem] column.
     * 
     * @param string $v new value
     * @return Sanitasi The current object (for fluent API support)
     */
    public function setAKemitraanSanNonPem($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->a_kemitraan_san_non_pem !== $v) {
            $this->a_kemitraan_san_non_pem = $v;
            $this->modifiedColumns[] = SanitasiPeer::A_KEMITRAAN_SAN_NON_PEM;
        }


        return $this;
    } // setAKemitraanSanNonPem()

    /**
     * Set the value of [kie_guru_cuci_tangan] column.
     * 
     * @param string $v new value
     * @return Sanitasi The current object (for fluent API support)
     */
    public function setKieGuruCuciTangan($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->kie_guru_cuci_tangan !== $v) {
            $this->kie_guru_cuci_tangan = $v;
            $this->modifiedColumns[] = SanitasiPeer::KIE_GURU_CUCI_TANGAN;
        }


        return $this;
    } // setKieGuruCuciTangan()

    /**
     * Set the value of [kie_guru_haid] column.
     * 
     * @param string $v new value
     * @return Sanitasi The current object (for fluent API support)
     */
    public function setKieGuruHaid($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->kie_guru_haid !== $v) {
            $this->kie_guru_haid = $v;
            $this->modifiedColumns[] = SanitasiPeer::KIE_GURU_HAID;
        }


        return $this;
    } // setKieGuruHaid()

    /**
     * Set the value of [kie_guru_perawatan_toilet] column.
     * 
     * @param string $v new value
     * @return Sanitasi The current object (for fluent API support)
     */
    public function setKieGuruPerawatanToilet($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->kie_guru_perawatan_toilet !== $v) {
            $this->kie_guru_perawatan_toilet = $v;
            $this->modifiedColumns[] = SanitasiPeer::KIE_GURU_PERAWATAN_TOILET;
        }


        return $this;
    } // setKieGuruPerawatanToilet()

    /**
     * Set the value of [kie_guru_keamanan_pangan] column.
     * 
     * @param string $v new value
     * @return Sanitasi The current object (for fluent API support)
     */
    public function setKieGuruKeamananPangan($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->kie_guru_keamanan_pangan !== $v) {
            $this->kie_guru_keamanan_pangan = $v;
            $this->modifiedColumns[] = SanitasiPeer::KIE_GURU_KEAMANAN_PANGAN;
        }


        return $this;
    } // setKieGuruKeamananPangan()

    /**
     * Set the value of [kie_guru_minum_air] column.
     * 
     * @param string $v new value
     * @return Sanitasi The current object (for fluent API support)
     */
    public function setKieGuruMinumAir($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->kie_guru_minum_air !== $v) {
            $this->kie_guru_minum_air = $v;
            $this->modifiedColumns[] = SanitasiPeer::KIE_GURU_MINUM_AIR;
        }


        return $this;
    } // setKieGuruMinumAir()

    /**
     * Set the value of [kie_kelas_cuci_tangan] column.
     * 
     * @param string $v new value
     * @return Sanitasi The current object (for fluent API support)
     */
    public function setKieKelasCuciTangan($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->kie_kelas_cuci_tangan !== $v) {
            $this->kie_kelas_cuci_tangan = $v;
            $this->modifiedColumns[] = SanitasiPeer::KIE_KELAS_CUCI_TANGAN;
        }


        return $this;
    } // setKieKelasCuciTangan()

    /**
     * Set the value of [kie_kelas_haid] column.
     * 
     * @param string $v new value
     * @return Sanitasi The current object (for fluent API support)
     */
    public function setKieKelasHaid($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->kie_kelas_haid !== $v) {
            $this->kie_kelas_haid = $v;
            $this->modifiedColumns[] = SanitasiPeer::KIE_KELAS_HAID;
        }


        return $this;
    } // setKieKelasHaid()

    /**
     * Set the value of [kie_kelas_perawatan_toilet] column.
     * 
     * @param string $v new value
     * @return Sanitasi The current object (for fluent API support)
     */
    public function setKieKelasPerawatanToilet($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->kie_kelas_perawatan_toilet !== $v) {
            $this->kie_kelas_perawatan_toilet = $v;
            $this->modifiedColumns[] = SanitasiPeer::KIE_KELAS_PERAWATAN_TOILET;
        }


        return $this;
    } // setKieKelasPerawatanToilet()

    /**
     * Set the value of [kie_kelas_keamanan_pangan] column.
     * 
     * @param string $v new value
     * @return Sanitasi The current object (for fluent API support)
     */
    public function setKieKelasKeamananPangan($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->kie_kelas_keamanan_pangan !== $v) {
            $this->kie_kelas_keamanan_pangan = $v;
            $this->modifiedColumns[] = SanitasiPeer::KIE_KELAS_KEAMANAN_PANGAN;
        }


        return $this;
    } // setKieKelasKeamananPangan()

    /**
     * Set the value of [kie_kelas_minum_air] column.
     * 
     * @param string $v new value
     * @return Sanitasi The current object (for fluent API support)
     */
    public function setKieKelasMinumAir($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->kie_kelas_minum_air !== $v) {
            $this->kie_kelas_minum_air = $v;
            $this->modifiedColumns[] = SanitasiPeer::KIE_KELAS_MINUM_AIR;
        }


        return $this;
    } // setKieKelasMinumAir()

    /**
     * Set the value of [kie_toilet_cuci_tangan] column.
     * 
     * @param string $v new value
     * @return Sanitasi The current object (for fluent API support)
     */
    public function setKieToiletCuciTangan($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->kie_toilet_cuci_tangan !== $v) {
            $this->kie_toilet_cuci_tangan = $v;
            $this->modifiedColumns[] = SanitasiPeer::KIE_TOILET_CUCI_TANGAN;
        }


        return $this;
    } // setKieToiletCuciTangan()

    /**
     * Set the value of [kie_toilet_haid] column.
     * 
     * @param string $v new value
     * @return Sanitasi The current object (for fluent API support)
     */
    public function setKieToiletHaid($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->kie_toilet_haid !== $v) {
            $this->kie_toilet_haid = $v;
            $this->modifiedColumns[] = SanitasiPeer::KIE_TOILET_HAID;
        }


        return $this;
    } // setKieToiletHaid()

    /**
     * Set the value of [kie_toilet_perawatan_toilet] column.
     * 
     * @param string $v new value
     * @return Sanitasi The current object (for fluent API support)
     */
    public function setKieToiletPerawatanToilet($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->kie_toilet_perawatan_toilet !== $v) {
            $this->kie_toilet_perawatan_toilet = $v;
            $this->modifiedColumns[] = SanitasiPeer::KIE_TOILET_PERAWATAN_TOILET;
        }


        return $this;
    } // setKieToiletPerawatanToilet()

    /**
     * Set the value of [kie_toilet_keamanan_pangan] column.
     * 
     * @param string $v new value
     * @return Sanitasi The current object (for fluent API support)
     */
    public function setKieToiletKeamananPangan($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->kie_toilet_keamanan_pangan !== $v) {
            $this->kie_toilet_keamanan_pangan = $v;
            $this->modifiedColumns[] = SanitasiPeer::KIE_TOILET_KEAMANAN_PANGAN;
        }


        return $this;
    } // setKieToiletKeamananPangan()

    /**
     * Set the value of [kie_toilet_minum_air] column.
     * 
     * @param string $v new value
     * @return Sanitasi The current object (for fluent API support)
     */
    public function setKieToiletMinumAir($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->kie_toilet_minum_air !== $v) {
            $this->kie_toilet_minum_air = $v;
            $this->modifiedColumns[] = SanitasiPeer::KIE_TOILET_MINUM_AIR;
        }


        return $this;
    } // setKieToiletMinumAir()

    /**
     * Set the value of [kie_selasar_cuci_tangan] column.
     * 
     * @param string $v new value
     * @return Sanitasi The current object (for fluent API support)
     */
    public function setKieSelasarCuciTangan($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->kie_selasar_cuci_tangan !== $v) {
            $this->kie_selasar_cuci_tangan = $v;
            $this->modifiedColumns[] = SanitasiPeer::KIE_SELASAR_CUCI_TANGAN;
        }


        return $this;
    } // setKieSelasarCuciTangan()

    /**
     * Set the value of [kie_selasar_haid] column.
     * 
     * @param string $v new value
     * @return Sanitasi The current object (for fluent API support)
     */
    public function setKieSelasarHaid($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->kie_selasar_haid !== $v) {
            $this->kie_selasar_haid = $v;
            $this->modifiedColumns[] = SanitasiPeer::KIE_SELASAR_HAID;
        }


        return $this;
    } // setKieSelasarHaid()

    /**
     * Set the value of [kie_selasar_perawatan_toilet] column.
     * 
     * @param string $v new value
     * @return Sanitasi The current object (for fluent API support)
     */
    public function setKieSelasarPerawatanToilet($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->kie_selasar_perawatan_toilet !== $v) {
            $this->kie_selasar_perawatan_toilet = $v;
            $this->modifiedColumns[] = SanitasiPeer::KIE_SELASAR_PERAWATAN_TOILET;
        }


        return $this;
    } // setKieSelasarPerawatanToilet()

    /**
     * Set the value of [kie_selasar_keamanan_pangan] column.
     * 
     * @param string $v new value
     * @return Sanitasi The current object (for fluent API support)
     */
    public function setKieSelasarKeamananPangan($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->kie_selasar_keamanan_pangan !== $v) {
            $this->kie_selasar_keamanan_pangan = $v;
            $this->modifiedColumns[] = SanitasiPeer::KIE_SELASAR_KEAMANAN_PANGAN;
        }


        return $this;
    } // setKieSelasarKeamananPangan()

    /**
     * Set the value of [kie_selasar_minum_air] column.
     * 
     * @param string $v new value
     * @return Sanitasi The current object (for fluent API support)
     */
    public function setKieSelasarMinumAir($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->kie_selasar_minum_air !== $v) {
            $this->kie_selasar_minum_air = $v;
            $this->modifiedColumns[] = SanitasiPeer::KIE_SELASAR_MINUM_AIR;
        }


        return $this;
    } // setKieSelasarMinumAir()

    /**
     * Set the value of [kie_uks_cuci_tangan] column.
     * 
     * @param string $v new value
     * @return Sanitasi The current object (for fluent API support)
     */
    public function setKieUksCuciTangan($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->kie_uks_cuci_tangan !== $v) {
            $this->kie_uks_cuci_tangan = $v;
            $this->modifiedColumns[] = SanitasiPeer::KIE_UKS_CUCI_TANGAN;
        }


        return $this;
    } // setKieUksCuciTangan()

    /**
     * Set the value of [kie_uks_haid] column.
     * 
     * @param string $v new value
     * @return Sanitasi The current object (for fluent API support)
     */
    public function setKieUksHaid($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->kie_uks_haid !== $v) {
            $this->kie_uks_haid = $v;
            $this->modifiedColumns[] = SanitasiPeer::KIE_UKS_HAID;
        }


        return $this;
    } // setKieUksHaid()

    /**
     * Set the value of [kie_uks_perawatan_toilet] column.
     * 
     * @param string $v new value
     * @return Sanitasi The current object (for fluent API support)
     */
    public function setKieUksPerawatanToilet($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->kie_uks_perawatan_toilet !== $v) {
            $this->kie_uks_perawatan_toilet = $v;
            $this->modifiedColumns[] = SanitasiPeer::KIE_UKS_PERAWATAN_TOILET;
        }


        return $this;
    } // setKieUksPerawatanToilet()

    /**
     * Set the value of [kie_uks_keamanan_pangan] column.
     * 
     * @param string $v new value
     * @return Sanitasi The current object (for fluent API support)
     */
    public function setKieUksKeamananPangan($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->kie_uks_keamanan_pangan !== $v) {
            $this->kie_uks_keamanan_pangan = $v;
            $this->modifiedColumns[] = SanitasiPeer::KIE_UKS_KEAMANAN_PANGAN;
        }


        return $this;
    } // setKieUksKeamananPangan()

    /**
     * Set the value of [kie_uks_minum_air] column.
     * 
     * @param string $v new value
     * @return Sanitasi The current object (for fluent API support)
     */
    public function setKieUksMinumAir($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->kie_uks_minum_air !== $v) {
            $this->kie_uks_minum_air = $v;
            $this->modifiedColumns[] = SanitasiPeer::KIE_UKS_MINUM_AIR;
        }


        return $this;
    } // setKieUksMinumAir()

    /**
     * Set the value of [kie_kantin_cuci_tangan] column.
     * 
     * @param string $v new value
     * @return Sanitasi The current object (for fluent API support)
     */
    public function setKieKantinCuciTangan($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->kie_kantin_cuci_tangan !== $v) {
            $this->kie_kantin_cuci_tangan = $v;
            $this->modifiedColumns[] = SanitasiPeer::KIE_KANTIN_CUCI_TANGAN;
        }


        return $this;
    } // setKieKantinCuciTangan()

    /**
     * Set the value of [kie_kantin_haid] column.
     * 
     * @param string $v new value
     * @return Sanitasi The current object (for fluent API support)
     */
    public function setKieKantinHaid($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->kie_kantin_haid !== $v) {
            $this->kie_kantin_haid = $v;
            $this->modifiedColumns[] = SanitasiPeer::KIE_KANTIN_HAID;
        }


        return $this;
    } // setKieKantinHaid()

    /**
     * Set the value of [kie_kantin_perawatan_toilet] column.
     * 
     * @param string $v new value
     * @return Sanitasi The current object (for fluent API support)
     */
    public function setKieKantinPerawatanToilet($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->kie_kantin_perawatan_toilet !== $v) {
            $this->kie_kantin_perawatan_toilet = $v;
            $this->modifiedColumns[] = SanitasiPeer::KIE_KANTIN_PERAWATAN_TOILET;
        }


        return $this;
    } // setKieKantinPerawatanToilet()

    /**
     * Set the value of [kie_kantin_keamanan_pangan] column.
     * 
     * @param string $v new value
     * @return Sanitasi The current object (for fluent API support)
     */
    public function setKieKantinKeamananPangan($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->kie_kantin_keamanan_pangan !== $v) {
            $this->kie_kantin_keamanan_pangan = $v;
            $this->modifiedColumns[] = SanitasiPeer::KIE_KANTIN_KEAMANAN_PANGAN;
        }


        return $this;
    } // setKieKantinKeamananPangan()

    /**
     * Set the value of [kie_kantin_minum_air] column.
     * 
     * @param string $v new value
     * @return Sanitasi The current object (for fluent API support)
     */
    public function setKieKantinMinumAir($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->kie_kantin_minum_air !== $v) {
            $this->kie_kantin_minum_air = $v;
            $this->modifiedColumns[] = SanitasiPeer::KIE_KANTIN_MINUM_AIR;
        }


        return $this;
    } // setKieKantinMinumAir()

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
            if ($this->create_date !== '2021-06-07 11:49:57') {
                return false;
            }

            if ($this->last_update !== '2021-06-07 11:49:57') {
                return false;
            }

            if ($this->last_sync !== '1901-01-01 00:00:00') {
                return false;
            }

            if ($this->jml_jamban_l_g !== '0') {
                return false;
            }

            if ($this->jml_jamban_l_tg !== '0') {
                return false;
            }

            if ($this->jml_jamban_p_g !== '0') {
                return false;
            }

            if ($this->jml_jamban_p_tg !== '0') {
                return false;
            }

            if ($this->jml_jamban_lp_g !== '0') {
                return false;
            }

            if ($this->jml_jamban_lp_tg !== '0') {
                return false;
            }

            if ($this->tipe_jamban !== '9') {
                return false;
            }

            if ($this->a_sedia_pembalut !== '0') {
                return false;
            }

            if ($this->a_tempat_sampah_kelas !== '0') {
                return false;
            }

            if ($this->a_tempat_sampah_tutup_p !== '0') {
                return false;
            }

            if ($this->a_cermin_jamban_p !== '0') {
                return false;
            }

            if ($this->a_memiliki_tps !== '0') {
                return false;
            }

            if ($this->a_tps_angkut_rutin !== '0') {
                return false;
            }

            if ($this->a_anggaran_sanitasi !== '0') {
                return false;
            }

            if ($this->a_melibatkan_sanitasi_siswa !== '0') {
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
            $this->sumber_air_id = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->sumber_air_minum_id = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->create_date = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->last_update = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->soft_delete = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->last_sync = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->updater_id = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->ketersediaan_air = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
            $this->kecukupan_air = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
            $this->minum_siswa = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
            $this->memproses_air = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
            $this->siswa_bawa_air = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
            $this->toilet_siswa_laki = ($row[$startcol + 14] !== null) ? (string) $row[$startcol + 14] : null;
            $this->toilet_siswa_perempuan = ($row[$startcol + 15] !== null) ? (string) $row[$startcol + 15] : null;
            $this->toilet_siswa_kk = ($row[$startcol + 16] !== null) ? (string) $row[$startcol + 16] : null;
            $this->toilet_siswa_kecil = ($row[$startcol + 17] !== null) ? (string) $row[$startcol + 17] : null;
            $this->jml_jamban_l_g = ($row[$startcol + 18] !== null) ? (string) $row[$startcol + 18] : null;
            $this->jml_jamban_l_tg = ($row[$startcol + 19] !== null) ? (string) $row[$startcol + 19] : null;
            $this->jml_jamban_p_g = ($row[$startcol + 20] !== null) ? (string) $row[$startcol + 20] : null;
            $this->jml_jamban_p_tg = ($row[$startcol + 21] !== null) ? (string) $row[$startcol + 21] : null;
            $this->jml_jamban_lp_g = ($row[$startcol + 22] !== null) ? (string) $row[$startcol + 22] : null;
            $this->jml_jamban_lp_tg = ($row[$startcol + 23] !== null) ? (string) $row[$startcol + 23] : null;
            $this->tempat_cuci_tangan = ($row[$startcol + 24] !== null) ? (string) $row[$startcol + 24] : null;
            $this->tempat_cuci_tangan_rusak = ($row[$startcol + 25] !== null) ? (string) $row[$startcol + 25] : null;
            $this->a_sabun_air_mengalir = ($row[$startcol + 26] !== null) ? (string) $row[$startcol + 26] : null;
            $this->jamban_difabel = ($row[$startcol + 27] !== null) ? (string) $row[$startcol + 27] : null;
            $this->tipe_jamban = ($row[$startcol + 28] !== null) ? (string) $row[$startcol + 28] : null;
            $this->a_sedia_pembalut = ($row[$startcol + 29] !== null) ? (string) $row[$startcol + 29] : null;
            $this->kegiatan_cuci_tangan = ($row[$startcol + 30] !== null) ? (string) $row[$startcol + 30] : null;
            $this->pembuangan_air_limbah = ($row[$startcol + 31] !== null) ? (string) $row[$startcol + 31] : null;
            $this->a_kuras_septitank = ($row[$startcol + 32] !== null) ? (string) $row[$startcol + 32] : null;
            $this->a_memiliki_solokan = ($row[$startcol + 33] !== null) ? (string) $row[$startcol + 33] : null;
            $this->a_tempat_sampah_kelas = ($row[$startcol + 34] !== null) ? (string) $row[$startcol + 34] : null;
            $this->a_tempat_sampah_tutup_p = ($row[$startcol + 35] !== null) ? (string) $row[$startcol + 35] : null;
            $this->a_cermin_jamban_p = ($row[$startcol + 36] !== null) ? (string) $row[$startcol + 36] : null;
            $this->a_memiliki_tps = ($row[$startcol + 37] !== null) ? (string) $row[$startcol + 37] : null;
            $this->a_tps_angkut_rutin = ($row[$startcol + 38] !== null) ? (string) $row[$startcol + 38] : null;
            $this->a_anggaran_sanitasi = ($row[$startcol + 39] !== null) ? (string) $row[$startcol + 39] : null;
            $this->a_melibatkan_sanitasi_siswa = ($row[$startcol + 40] !== null) ? (string) $row[$startcol + 40] : null;
            $this->a_kemitraan_san_daerah = ($row[$startcol + 41] !== null) ? (string) $row[$startcol + 41] : null;
            $this->a_kemitraan_san_puskesmas = ($row[$startcol + 42] !== null) ? (string) $row[$startcol + 42] : null;
            $this->a_kemitraan_san_swasta = ($row[$startcol + 43] !== null) ? (string) $row[$startcol + 43] : null;
            $this->a_kemitraan_san_non_pem = ($row[$startcol + 44] !== null) ? (string) $row[$startcol + 44] : null;
            $this->kie_guru_cuci_tangan = ($row[$startcol + 45] !== null) ? (string) $row[$startcol + 45] : null;
            $this->kie_guru_haid = ($row[$startcol + 46] !== null) ? (string) $row[$startcol + 46] : null;
            $this->kie_guru_perawatan_toilet = ($row[$startcol + 47] !== null) ? (string) $row[$startcol + 47] : null;
            $this->kie_guru_keamanan_pangan = ($row[$startcol + 48] !== null) ? (string) $row[$startcol + 48] : null;
            $this->kie_guru_minum_air = ($row[$startcol + 49] !== null) ? (string) $row[$startcol + 49] : null;
            $this->kie_kelas_cuci_tangan = ($row[$startcol + 50] !== null) ? (string) $row[$startcol + 50] : null;
            $this->kie_kelas_haid = ($row[$startcol + 51] !== null) ? (string) $row[$startcol + 51] : null;
            $this->kie_kelas_perawatan_toilet = ($row[$startcol + 52] !== null) ? (string) $row[$startcol + 52] : null;
            $this->kie_kelas_keamanan_pangan = ($row[$startcol + 53] !== null) ? (string) $row[$startcol + 53] : null;
            $this->kie_kelas_minum_air = ($row[$startcol + 54] !== null) ? (string) $row[$startcol + 54] : null;
            $this->kie_toilet_cuci_tangan = ($row[$startcol + 55] !== null) ? (string) $row[$startcol + 55] : null;
            $this->kie_toilet_haid = ($row[$startcol + 56] !== null) ? (string) $row[$startcol + 56] : null;
            $this->kie_toilet_perawatan_toilet = ($row[$startcol + 57] !== null) ? (string) $row[$startcol + 57] : null;
            $this->kie_toilet_keamanan_pangan = ($row[$startcol + 58] !== null) ? (string) $row[$startcol + 58] : null;
            $this->kie_toilet_minum_air = ($row[$startcol + 59] !== null) ? (string) $row[$startcol + 59] : null;
            $this->kie_selasar_cuci_tangan = ($row[$startcol + 60] !== null) ? (string) $row[$startcol + 60] : null;
            $this->kie_selasar_haid = ($row[$startcol + 61] !== null) ? (string) $row[$startcol + 61] : null;
            $this->kie_selasar_perawatan_toilet = ($row[$startcol + 62] !== null) ? (string) $row[$startcol + 62] : null;
            $this->kie_selasar_keamanan_pangan = ($row[$startcol + 63] !== null) ? (string) $row[$startcol + 63] : null;
            $this->kie_selasar_minum_air = ($row[$startcol + 64] !== null) ? (string) $row[$startcol + 64] : null;
            $this->kie_uks_cuci_tangan = ($row[$startcol + 65] !== null) ? (string) $row[$startcol + 65] : null;
            $this->kie_uks_haid = ($row[$startcol + 66] !== null) ? (string) $row[$startcol + 66] : null;
            $this->kie_uks_perawatan_toilet = ($row[$startcol + 67] !== null) ? (string) $row[$startcol + 67] : null;
            $this->kie_uks_keamanan_pangan = ($row[$startcol + 68] !== null) ? (string) $row[$startcol + 68] : null;
            $this->kie_uks_minum_air = ($row[$startcol + 69] !== null) ? (string) $row[$startcol + 69] : null;
            $this->kie_kantin_cuci_tangan = ($row[$startcol + 70] !== null) ? (string) $row[$startcol + 70] : null;
            $this->kie_kantin_haid = ($row[$startcol + 71] !== null) ? (string) $row[$startcol + 71] : null;
            $this->kie_kantin_perawatan_toilet = ($row[$startcol + 72] !== null) ? (string) $row[$startcol + 72] : null;
            $this->kie_kantin_keamanan_pangan = ($row[$startcol + 73] !== null) ? (string) $row[$startcol + 73] : null;
            $this->kie_kantin_minum_air = ($row[$startcol + 74] !== null) ? (string) $row[$startcol + 74] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 75; // 75 = SanitasiPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Sanitasi object", $e);
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
        if ($this->aSumberAirRelatedBySumberAirId !== null && $this->sumber_air_id !== $this->aSumberAirRelatedBySumberAirId->getSumberAirId()) {
            $this->aSumberAirRelatedBySumberAirId = null;
        }
        if ($this->aSumberAirRelatedBySumberAirMinumId !== null && $this->sumber_air_minum_id !== $this->aSumberAirRelatedBySumberAirMinumId->getSumberAirId()) {
            $this->aSumberAirRelatedBySumberAirMinumId = null;
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
            $con = Propel::getConnection(SanitasiPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = SanitasiPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aSekolah = null;
            $this->aSemester = null;
            $this->aSumberAirRelatedBySumberAirId = null;
            $this->aSumberAirRelatedBySumberAirMinumId = null;
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
            $con = Propel::getConnection(SanitasiPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = SanitasiQuery::create()
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
            $con = Propel::getConnection(SanitasiPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                SanitasiPeer::addInstanceToPool($this);
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

            if ($this->aSumberAirRelatedBySumberAirId !== null) {
                if ($this->aSumberAirRelatedBySumberAirId->isModified() || $this->aSumberAirRelatedBySumberAirId->isNew()) {
                    $affectedRows += $this->aSumberAirRelatedBySumberAirId->save($con);
                }
                $this->setSumberAirRelatedBySumberAirId($this->aSumberAirRelatedBySumberAirId);
            }

            if ($this->aSumberAirRelatedBySumberAirMinumId !== null) {
                if ($this->aSumberAirRelatedBySumberAirMinumId->isModified() || $this->aSumberAirRelatedBySumberAirMinumId->isNew()) {
                    $affectedRows += $this->aSumberAirRelatedBySumberAirMinumId->save($con);
                }
                $this->setSumberAirRelatedBySumberAirMinumId($this->aSumberAirRelatedBySumberAirMinumId);
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
        if ($this->isColumnModified(SanitasiPeer::SEKOLAH_ID)) {
            $modifiedColumns[':p' . $index++]  = '"sekolah_id"';
        }
        if ($this->isColumnModified(SanitasiPeer::SEMESTER_ID)) {
            $modifiedColumns[':p' . $index++]  = '"semester_id"';
        }
        if ($this->isColumnModified(SanitasiPeer::SUMBER_AIR_ID)) {
            $modifiedColumns[':p' . $index++]  = '"sumber_air_id"';
        }
        if ($this->isColumnModified(SanitasiPeer::SUMBER_AIR_MINUM_ID)) {
            $modifiedColumns[':p' . $index++]  = '"sumber_air_minum_id"';
        }
        if ($this->isColumnModified(SanitasiPeer::CREATE_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"create_date"';
        }
        if ($this->isColumnModified(SanitasiPeer::LAST_UPDATE)) {
            $modifiedColumns[':p' . $index++]  = '"last_update"';
        }
        if ($this->isColumnModified(SanitasiPeer::SOFT_DELETE)) {
            $modifiedColumns[':p' . $index++]  = '"soft_delete"';
        }
        if ($this->isColumnModified(SanitasiPeer::LAST_SYNC)) {
            $modifiedColumns[':p' . $index++]  = '"last_sync"';
        }
        if ($this->isColumnModified(SanitasiPeer::UPDATER_ID)) {
            $modifiedColumns[':p' . $index++]  = '"updater_id"';
        }
        if ($this->isColumnModified(SanitasiPeer::KETERSEDIAAN_AIR)) {
            $modifiedColumns[':p' . $index++]  = '"ketersediaan_air"';
        }
        if ($this->isColumnModified(SanitasiPeer::KECUKUPAN_AIR)) {
            $modifiedColumns[':p' . $index++]  = '"kecukupan_air"';
        }
        if ($this->isColumnModified(SanitasiPeer::MINUM_SISWA)) {
            $modifiedColumns[':p' . $index++]  = '"minum_siswa"';
        }
        if ($this->isColumnModified(SanitasiPeer::MEMPROSES_AIR)) {
            $modifiedColumns[':p' . $index++]  = '"memproses_air"';
        }
        if ($this->isColumnModified(SanitasiPeer::SISWA_BAWA_AIR)) {
            $modifiedColumns[':p' . $index++]  = '"siswa_bawa_air"';
        }
        if ($this->isColumnModified(SanitasiPeer::TOILET_SISWA_LAKI)) {
            $modifiedColumns[':p' . $index++]  = '"toilet_siswa_laki"';
        }
        if ($this->isColumnModified(SanitasiPeer::TOILET_SISWA_PEREMPUAN)) {
            $modifiedColumns[':p' . $index++]  = '"toilet_siswa_perempuan"';
        }
        if ($this->isColumnModified(SanitasiPeer::TOILET_SISWA_KK)) {
            $modifiedColumns[':p' . $index++]  = '"toilet_siswa_kk"';
        }
        if ($this->isColumnModified(SanitasiPeer::TOILET_SISWA_KECIL)) {
            $modifiedColumns[':p' . $index++]  = '"toilet_siswa_kecil"';
        }
        if ($this->isColumnModified(SanitasiPeer::JML_JAMBAN_L_G)) {
            $modifiedColumns[':p' . $index++]  = '"jml_jamban_l_g"';
        }
        if ($this->isColumnModified(SanitasiPeer::JML_JAMBAN_L_TG)) {
            $modifiedColumns[':p' . $index++]  = '"jml_jamban_l_tg"';
        }
        if ($this->isColumnModified(SanitasiPeer::JML_JAMBAN_P_G)) {
            $modifiedColumns[':p' . $index++]  = '"jml_jamban_p_g"';
        }
        if ($this->isColumnModified(SanitasiPeer::JML_JAMBAN_P_TG)) {
            $modifiedColumns[':p' . $index++]  = '"jml_jamban_p_tg"';
        }
        if ($this->isColumnModified(SanitasiPeer::JML_JAMBAN_LP_G)) {
            $modifiedColumns[':p' . $index++]  = '"jml_jamban_lp_g"';
        }
        if ($this->isColumnModified(SanitasiPeer::JML_JAMBAN_LP_TG)) {
            $modifiedColumns[':p' . $index++]  = '"jml_jamban_lp_tg"';
        }
        if ($this->isColumnModified(SanitasiPeer::TEMPAT_CUCI_TANGAN)) {
            $modifiedColumns[':p' . $index++]  = '"tempat_cuci_tangan"';
        }
        if ($this->isColumnModified(SanitasiPeer::TEMPAT_CUCI_TANGAN_RUSAK)) {
            $modifiedColumns[':p' . $index++]  = '"tempat_cuci_tangan_rusak"';
        }
        if ($this->isColumnModified(SanitasiPeer::A_SABUN_AIR_MENGALIR)) {
            $modifiedColumns[':p' . $index++]  = '"a_sabun_air_mengalir"';
        }
        if ($this->isColumnModified(SanitasiPeer::JAMBAN_DIFABEL)) {
            $modifiedColumns[':p' . $index++]  = '"jamban_difabel"';
        }
        if ($this->isColumnModified(SanitasiPeer::TIPE_JAMBAN)) {
            $modifiedColumns[':p' . $index++]  = '"tipe_jamban"';
        }
        if ($this->isColumnModified(SanitasiPeer::A_SEDIA_PEMBALUT)) {
            $modifiedColumns[':p' . $index++]  = '"a_sedia_pembalut"';
        }
        if ($this->isColumnModified(SanitasiPeer::KEGIATAN_CUCI_TANGAN)) {
            $modifiedColumns[':p' . $index++]  = '"kegiatan_cuci_tangan"';
        }
        if ($this->isColumnModified(SanitasiPeer::PEMBUANGAN_AIR_LIMBAH)) {
            $modifiedColumns[':p' . $index++]  = '"pembuangan_air_limbah"';
        }
        if ($this->isColumnModified(SanitasiPeer::A_KURAS_SEPTITANK)) {
            $modifiedColumns[':p' . $index++]  = '"a_kuras_septitank"';
        }
        if ($this->isColumnModified(SanitasiPeer::A_MEMILIKI_SOLOKAN)) {
            $modifiedColumns[':p' . $index++]  = '"a_memiliki_solokan"';
        }
        if ($this->isColumnModified(SanitasiPeer::A_TEMPAT_SAMPAH_KELAS)) {
            $modifiedColumns[':p' . $index++]  = '"a_tempat_sampah_kelas"';
        }
        if ($this->isColumnModified(SanitasiPeer::A_TEMPAT_SAMPAH_TUTUP_P)) {
            $modifiedColumns[':p' . $index++]  = '"a_tempat_sampah_tutup_p"';
        }
        if ($this->isColumnModified(SanitasiPeer::A_CERMIN_JAMBAN_P)) {
            $modifiedColumns[':p' . $index++]  = '"a_cermin_jamban_p"';
        }
        if ($this->isColumnModified(SanitasiPeer::A_MEMILIKI_TPS)) {
            $modifiedColumns[':p' . $index++]  = '"a_memiliki_tps"';
        }
        if ($this->isColumnModified(SanitasiPeer::A_TPS_ANGKUT_RUTIN)) {
            $modifiedColumns[':p' . $index++]  = '"a_tps_angkut_rutin"';
        }
        if ($this->isColumnModified(SanitasiPeer::A_ANGGARAN_SANITASI)) {
            $modifiedColumns[':p' . $index++]  = '"a_anggaran_sanitasi"';
        }
        if ($this->isColumnModified(SanitasiPeer::A_MELIBATKAN_SANITASI_SISWA)) {
            $modifiedColumns[':p' . $index++]  = '"a_melibatkan_sanitasi_siswa"';
        }
        if ($this->isColumnModified(SanitasiPeer::A_KEMITRAAN_SAN_DAERAH)) {
            $modifiedColumns[':p' . $index++]  = '"a_kemitraan_san_daerah"';
        }
        if ($this->isColumnModified(SanitasiPeer::A_KEMITRAAN_SAN_PUSKESMAS)) {
            $modifiedColumns[':p' . $index++]  = '"a_kemitraan_san_puskesmas"';
        }
        if ($this->isColumnModified(SanitasiPeer::A_KEMITRAAN_SAN_SWASTA)) {
            $modifiedColumns[':p' . $index++]  = '"a_kemitraan_san_swasta"';
        }
        if ($this->isColumnModified(SanitasiPeer::A_KEMITRAAN_SAN_NON_PEM)) {
            $modifiedColumns[':p' . $index++]  = '"a_kemitraan_san_non_pem"';
        }
        if ($this->isColumnModified(SanitasiPeer::KIE_GURU_CUCI_TANGAN)) {
            $modifiedColumns[':p' . $index++]  = '"kie_guru_cuci_tangan"';
        }
        if ($this->isColumnModified(SanitasiPeer::KIE_GURU_HAID)) {
            $modifiedColumns[':p' . $index++]  = '"kie_guru_haid"';
        }
        if ($this->isColumnModified(SanitasiPeer::KIE_GURU_PERAWATAN_TOILET)) {
            $modifiedColumns[':p' . $index++]  = '"kie_guru_perawatan_toilet"';
        }
        if ($this->isColumnModified(SanitasiPeer::KIE_GURU_KEAMANAN_PANGAN)) {
            $modifiedColumns[':p' . $index++]  = '"kie_guru_keamanan_pangan"';
        }
        if ($this->isColumnModified(SanitasiPeer::KIE_GURU_MINUM_AIR)) {
            $modifiedColumns[':p' . $index++]  = '"kie_guru_minum_air"';
        }
        if ($this->isColumnModified(SanitasiPeer::KIE_KELAS_CUCI_TANGAN)) {
            $modifiedColumns[':p' . $index++]  = '"kie_kelas_cuci_tangan"';
        }
        if ($this->isColumnModified(SanitasiPeer::KIE_KELAS_HAID)) {
            $modifiedColumns[':p' . $index++]  = '"kie_kelas_haid"';
        }
        if ($this->isColumnModified(SanitasiPeer::KIE_KELAS_PERAWATAN_TOILET)) {
            $modifiedColumns[':p' . $index++]  = '"kie_kelas_perawatan_toilet"';
        }
        if ($this->isColumnModified(SanitasiPeer::KIE_KELAS_KEAMANAN_PANGAN)) {
            $modifiedColumns[':p' . $index++]  = '"kie_kelas_keamanan_pangan"';
        }
        if ($this->isColumnModified(SanitasiPeer::KIE_KELAS_MINUM_AIR)) {
            $modifiedColumns[':p' . $index++]  = '"kie_kelas_minum_air"';
        }
        if ($this->isColumnModified(SanitasiPeer::KIE_TOILET_CUCI_TANGAN)) {
            $modifiedColumns[':p' . $index++]  = '"kie_toilet_cuci_tangan"';
        }
        if ($this->isColumnModified(SanitasiPeer::KIE_TOILET_HAID)) {
            $modifiedColumns[':p' . $index++]  = '"kie_toilet_haid"';
        }
        if ($this->isColumnModified(SanitasiPeer::KIE_TOILET_PERAWATAN_TOILET)) {
            $modifiedColumns[':p' . $index++]  = '"kie_toilet_perawatan_toilet"';
        }
        if ($this->isColumnModified(SanitasiPeer::KIE_TOILET_KEAMANAN_PANGAN)) {
            $modifiedColumns[':p' . $index++]  = '"kie_toilet_keamanan_pangan"';
        }
        if ($this->isColumnModified(SanitasiPeer::KIE_TOILET_MINUM_AIR)) {
            $modifiedColumns[':p' . $index++]  = '"kie_toilet_minum_air"';
        }
        if ($this->isColumnModified(SanitasiPeer::KIE_SELASAR_CUCI_TANGAN)) {
            $modifiedColumns[':p' . $index++]  = '"kie_selasar_cuci_tangan"';
        }
        if ($this->isColumnModified(SanitasiPeer::KIE_SELASAR_HAID)) {
            $modifiedColumns[':p' . $index++]  = '"kie_selasar_haid"';
        }
        if ($this->isColumnModified(SanitasiPeer::KIE_SELASAR_PERAWATAN_TOILET)) {
            $modifiedColumns[':p' . $index++]  = '"kie_selasar_perawatan_toilet"';
        }
        if ($this->isColumnModified(SanitasiPeer::KIE_SELASAR_KEAMANAN_PANGAN)) {
            $modifiedColumns[':p' . $index++]  = '"kie_selasar_keamanan_pangan"';
        }
        if ($this->isColumnModified(SanitasiPeer::KIE_SELASAR_MINUM_AIR)) {
            $modifiedColumns[':p' . $index++]  = '"kie_selasar_minum_air"';
        }
        if ($this->isColumnModified(SanitasiPeer::KIE_UKS_CUCI_TANGAN)) {
            $modifiedColumns[':p' . $index++]  = '"kie_uks_cuci_tangan"';
        }
        if ($this->isColumnModified(SanitasiPeer::KIE_UKS_HAID)) {
            $modifiedColumns[':p' . $index++]  = '"kie_uks_haid"';
        }
        if ($this->isColumnModified(SanitasiPeer::KIE_UKS_PERAWATAN_TOILET)) {
            $modifiedColumns[':p' . $index++]  = '"kie_uks_perawatan_toilet"';
        }
        if ($this->isColumnModified(SanitasiPeer::KIE_UKS_KEAMANAN_PANGAN)) {
            $modifiedColumns[':p' . $index++]  = '"kie_uks_keamanan_pangan"';
        }
        if ($this->isColumnModified(SanitasiPeer::KIE_UKS_MINUM_AIR)) {
            $modifiedColumns[':p' . $index++]  = '"kie_uks_minum_air"';
        }
        if ($this->isColumnModified(SanitasiPeer::KIE_KANTIN_CUCI_TANGAN)) {
            $modifiedColumns[':p' . $index++]  = '"kie_kantin_cuci_tangan"';
        }
        if ($this->isColumnModified(SanitasiPeer::KIE_KANTIN_HAID)) {
            $modifiedColumns[':p' . $index++]  = '"kie_kantin_haid"';
        }
        if ($this->isColumnModified(SanitasiPeer::KIE_KANTIN_PERAWATAN_TOILET)) {
            $modifiedColumns[':p' . $index++]  = '"kie_kantin_perawatan_toilet"';
        }
        if ($this->isColumnModified(SanitasiPeer::KIE_KANTIN_KEAMANAN_PANGAN)) {
            $modifiedColumns[':p' . $index++]  = '"kie_kantin_keamanan_pangan"';
        }
        if ($this->isColumnModified(SanitasiPeer::KIE_KANTIN_MINUM_AIR)) {
            $modifiedColumns[':p' . $index++]  = '"kie_kantin_minum_air"';
        }

        $sql = sprintf(
            'INSERT INTO "sanitasi" (%s) VALUES (%s)',
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
                    case '"sumber_air_id"':						
                        $stmt->bindValue($identifier, $this->sumber_air_id, PDO::PARAM_STR);
                        break;
                    case '"sumber_air_minum_id"':						
                        $stmt->bindValue($identifier, $this->sumber_air_minum_id, PDO::PARAM_STR);
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
                    case '"ketersediaan_air"':						
                        $stmt->bindValue($identifier, $this->ketersediaan_air, PDO::PARAM_STR);
                        break;
                    case '"kecukupan_air"':						
                        $stmt->bindValue($identifier, $this->kecukupan_air, PDO::PARAM_STR);
                        break;
                    case '"minum_siswa"':						
                        $stmt->bindValue($identifier, $this->minum_siswa, PDO::PARAM_STR);
                        break;
                    case '"memproses_air"':						
                        $stmt->bindValue($identifier, $this->memproses_air, PDO::PARAM_STR);
                        break;
                    case '"siswa_bawa_air"':						
                        $stmt->bindValue($identifier, $this->siswa_bawa_air, PDO::PARAM_STR);
                        break;
                    case '"toilet_siswa_laki"':						
                        $stmt->bindValue($identifier, $this->toilet_siswa_laki, PDO::PARAM_STR);
                        break;
                    case '"toilet_siswa_perempuan"':						
                        $stmt->bindValue($identifier, $this->toilet_siswa_perempuan, PDO::PARAM_STR);
                        break;
                    case '"toilet_siswa_kk"':						
                        $stmt->bindValue($identifier, $this->toilet_siswa_kk, PDO::PARAM_STR);
                        break;
                    case '"toilet_siswa_kecil"':						
                        $stmt->bindValue($identifier, $this->toilet_siswa_kecil, PDO::PARAM_STR);
                        break;
                    case '"jml_jamban_l_g"':						
                        $stmt->bindValue($identifier, $this->jml_jamban_l_g, PDO::PARAM_STR);
                        break;
                    case '"jml_jamban_l_tg"':						
                        $stmt->bindValue($identifier, $this->jml_jamban_l_tg, PDO::PARAM_STR);
                        break;
                    case '"jml_jamban_p_g"':						
                        $stmt->bindValue($identifier, $this->jml_jamban_p_g, PDO::PARAM_STR);
                        break;
                    case '"jml_jamban_p_tg"':						
                        $stmt->bindValue($identifier, $this->jml_jamban_p_tg, PDO::PARAM_STR);
                        break;
                    case '"jml_jamban_lp_g"':						
                        $stmt->bindValue($identifier, $this->jml_jamban_lp_g, PDO::PARAM_STR);
                        break;
                    case '"jml_jamban_lp_tg"':						
                        $stmt->bindValue($identifier, $this->jml_jamban_lp_tg, PDO::PARAM_STR);
                        break;
                    case '"tempat_cuci_tangan"':						
                        $stmt->bindValue($identifier, $this->tempat_cuci_tangan, PDO::PARAM_STR);
                        break;
                    case '"tempat_cuci_tangan_rusak"':						
                        $stmt->bindValue($identifier, $this->tempat_cuci_tangan_rusak, PDO::PARAM_STR);
                        break;
                    case '"a_sabun_air_mengalir"':						
                        $stmt->bindValue($identifier, $this->a_sabun_air_mengalir, PDO::PARAM_STR);
                        break;
                    case '"jamban_difabel"':						
                        $stmt->bindValue($identifier, $this->jamban_difabel, PDO::PARAM_STR);
                        break;
                    case '"tipe_jamban"':						
                        $stmt->bindValue($identifier, $this->tipe_jamban, PDO::PARAM_STR);
                        break;
                    case '"a_sedia_pembalut"':						
                        $stmt->bindValue($identifier, $this->a_sedia_pembalut, PDO::PARAM_STR);
                        break;
                    case '"kegiatan_cuci_tangan"':						
                        $stmt->bindValue($identifier, $this->kegiatan_cuci_tangan, PDO::PARAM_STR);
                        break;
                    case '"pembuangan_air_limbah"':						
                        $stmt->bindValue($identifier, $this->pembuangan_air_limbah, PDO::PARAM_STR);
                        break;
                    case '"a_kuras_septitank"':						
                        $stmt->bindValue($identifier, $this->a_kuras_septitank, PDO::PARAM_STR);
                        break;
                    case '"a_memiliki_solokan"':						
                        $stmt->bindValue($identifier, $this->a_memiliki_solokan, PDO::PARAM_STR);
                        break;
                    case '"a_tempat_sampah_kelas"':						
                        $stmt->bindValue($identifier, $this->a_tempat_sampah_kelas, PDO::PARAM_STR);
                        break;
                    case '"a_tempat_sampah_tutup_p"':						
                        $stmt->bindValue($identifier, $this->a_tempat_sampah_tutup_p, PDO::PARAM_STR);
                        break;
                    case '"a_cermin_jamban_p"':						
                        $stmt->bindValue($identifier, $this->a_cermin_jamban_p, PDO::PARAM_STR);
                        break;
                    case '"a_memiliki_tps"':						
                        $stmt->bindValue($identifier, $this->a_memiliki_tps, PDO::PARAM_STR);
                        break;
                    case '"a_tps_angkut_rutin"':						
                        $stmt->bindValue($identifier, $this->a_tps_angkut_rutin, PDO::PARAM_STR);
                        break;
                    case '"a_anggaran_sanitasi"':						
                        $stmt->bindValue($identifier, $this->a_anggaran_sanitasi, PDO::PARAM_STR);
                        break;
                    case '"a_melibatkan_sanitasi_siswa"':						
                        $stmt->bindValue($identifier, $this->a_melibatkan_sanitasi_siswa, PDO::PARAM_STR);
                        break;
                    case '"a_kemitraan_san_daerah"':						
                        $stmt->bindValue($identifier, $this->a_kemitraan_san_daerah, PDO::PARAM_STR);
                        break;
                    case '"a_kemitraan_san_puskesmas"':						
                        $stmt->bindValue($identifier, $this->a_kemitraan_san_puskesmas, PDO::PARAM_STR);
                        break;
                    case '"a_kemitraan_san_swasta"':						
                        $stmt->bindValue($identifier, $this->a_kemitraan_san_swasta, PDO::PARAM_STR);
                        break;
                    case '"a_kemitraan_san_non_pem"':						
                        $stmt->bindValue($identifier, $this->a_kemitraan_san_non_pem, PDO::PARAM_STR);
                        break;
                    case '"kie_guru_cuci_tangan"':						
                        $stmt->bindValue($identifier, $this->kie_guru_cuci_tangan, PDO::PARAM_STR);
                        break;
                    case '"kie_guru_haid"':						
                        $stmt->bindValue($identifier, $this->kie_guru_haid, PDO::PARAM_STR);
                        break;
                    case '"kie_guru_perawatan_toilet"':						
                        $stmt->bindValue($identifier, $this->kie_guru_perawatan_toilet, PDO::PARAM_STR);
                        break;
                    case '"kie_guru_keamanan_pangan"':						
                        $stmt->bindValue($identifier, $this->kie_guru_keamanan_pangan, PDO::PARAM_STR);
                        break;
                    case '"kie_guru_minum_air"':						
                        $stmt->bindValue($identifier, $this->kie_guru_minum_air, PDO::PARAM_STR);
                        break;
                    case '"kie_kelas_cuci_tangan"':						
                        $stmt->bindValue($identifier, $this->kie_kelas_cuci_tangan, PDO::PARAM_STR);
                        break;
                    case '"kie_kelas_haid"':						
                        $stmt->bindValue($identifier, $this->kie_kelas_haid, PDO::PARAM_STR);
                        break;
                    case '"kie_kelas_perawatan_toilet"':						
                        $stmt->bindValue($identifier, $this->kie_kelas_perawatan_toilet, PDO::PARAM_STR);
                        break;
                    case '"kie_kelas_keamanan_pangan"':						
                        $stmt->bindValue($identifier, $this->kie_kelas_keamanan_pangan, PDO::PARAM_STR);
                        break;
                    case '"kie_kelas_minum_air"':						
                        $stmt->bindValue($identifier, $this->kie_kelas_minum_air, PDO::PARAM_STR);
                        break;
                    case '"kie_toilet_cuci_tangan"':						
                        $stmt->bindValue($identifier, $this->kie_toilet_cuci_tangan, PDO::PARAM_STR);
                        break;
                    case '"kie_toilet_haid"':						
                        $stmt->bindValue($identifier, $this->kie_toilet_haid, PDO::PARAM_STR);
                        break;
                    case '"kie_toilet_perawatan_toilet"':						
                        $stmt->bindValue($identifier, $this->kie_toilet_perawatan_toilet, PDO::PARAM_STR);
                        break;
                    case '"kie_toilet_keamanan_pangan"':						
                        $stmt->bindValue($identifier, $this->kie_toilet_keamanan_pangan, PDO::PARAM_STR);
                        break;
                    case '"kie_toilet_minum_air"':						
                        $stmt->bindValue($identifier, $this->kie_toilet_minum_air, PDO::PARAM_STR);
                        break;
                    case '"kie_selasar_cuci_tangan"':						
                        $stmt->bindValue($identifier, $this->kie_selasar_cuci_tangan, PDO::PARAM_STR);
                        break;
                    case '"kie_selasar_haid"':						
                        $stmt->bindValue($identifier, $this->kie_selasar_haid, PDO::PARAM_STR);
                        break;
                    case '"kie_selasar_perawatan_toilet"':						
                        $stmt->bindValue($identifier, $this->kie_selasar_perawatan_toilet, PDO::PARAM_STR);
                        break;
                    case '"kie_selasar_keamanan_pangan"':						
                        $stmt->bindValue($identifier, $this->kie_selasar_keamanan_pangan, PDO::PARAM_STR);
                        break;
                    case '"kie_selasar_minum_air"':						
                        $stmt->bindValue($identifier, $this->kie_selasar_minum_air, PDO::PARAM_STR);
                        break;
                    case '"kie_uks_cuci_tangan"':						
                        $stmt->bindValue($identifier, $this->kie_uks_cuci_tangan, PDO::PARAM_STR);
                        break;
                    case '"kie_uks_haid"':						
                        $stmt->bindValue($identifier, $this->kie_uks_haid, PDO::PARAM_STR);
                        break;
                    case '"kie_uks_perawatan_toilet"':						
                        $stmt->bindValue($identifier, $this->kie_uks_perawatan_toilet, PDO::PARAM_STR);
                        break;
                    case '"kie_uks_keamanan_pangan"':						
                        $stmt->bindValue($identifier, $this->kie_uks_keamanan_pangan, PDO::PARAM_STR);
                        break;
                    case '"kie_uks_minum_air"':						
                        $stmt->bindValue($identifier, $this->kie_uks_minum_air, PDO::PARAM_STR);
                        break;
                    case '"kie_kantin_cuci_tangan"':						
                        $stmt->bindValue($identifier, $this->kie_kantin_cuci_tangan, PDO::PARAM_STR);
                        break;
                    case '"kie_kantin_haid"':						
                        $stmt->bindValue($identifier, $this->kie_kantin_haid, PDO::PARAM_STR);
                        break;
                    case '"kie_kantin_perawatan_toilet"':						
                        $stmt->bindValue($identifier, $this->kie_kantin_perawatan_toilet, PDO::PARAM_STR);
                        break;
                    case '"kie_kantin_keamanan_pangan"':						
                        $stmt->bindValue($identifier, $this->kie_kantin_keamanan_pangan, PDO::PARAM_STR);
                        break;
                    case '"kie_kantin_minum_air"':						
                        $stmt->bindValue($identifier, $this->kie_kantin_minum_air, PDO::PARAM_STR);
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

            if ($this->aSumberAirRelatedBySumberAirId !== null) {
                if (!$this->aSumberAirRelatedBySumberAirId->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aSumberAirRelatedBySumberAirId->getValidationFailures());
                }
            }

            if ($this->aSumberAirRelatedBySumberAirMinumId !== null) {
                if (!$this->aSumberAirRelatedBySumberAirMinumId->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aSumberAirRelatedBySumberAirMinumId->getValidationFailures());
                }
            }


            if (($retval = SanitasiPeer::doValidate($this, $columns)) !== true) {
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
        $pos = SanitasiPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getSumberAirId();
                break;
            case 3:
                return $this->getSumberAirMinumId();
                break;
            case 4:
                return $this->getCreateDate();
                break;
            case 5:
                return $this->getLastUpdate();
                break;
            case 6:
                return $this->getSoftDelete();
                break;
            case 7:
                return $this->getLastSync();
                break;
            case 8:
                return $this->getUpdaterId();
                break;
            case 9:
                return $this->getKetersediaanAir();
                break;
            case 10:
                return $this->getKecukupanAir();
                break;
            case 11:
                return $this->getMinumSiswa();
                break;
            case 12:
                return $this->getMemprosesAir();
                break;
            case 13:
                return $this->getSiswaBawaAir();
                break;
            case 14:
                return $this->getToiletSiswaLaki();
                break;
            case 15:
                return $this->getToiletSiswaPerempuan();
                break;
            case 16:
                return $this->getToiletSiswaKk();
                break;
            case 17:
                return $this->getToiletSiswaKecil();
                break;
            case 18:
                return $this->getJmlJambanLG();
                break;
            case 19:
                return $this->getJmlJambanLTg();
                break;
            case 20:
                return $this->getJmlJambanPG();
                break;
            case 21:
                return $this->getJmlJambanPTg();
                break;
            case 22:
                return $this->getJmlJambanLpG();
                break;
            case 23:
                return $this->getJmlJambanLpTg();
                break;
            case 24:
                return $this->getTempatCuciTangan();
                break;
            case 25:
                return $this->getTempatCuciTanganRusak();
                break;
            case 26:
                return $this->getASabunAirMengalir();
                break;
            case 27:
                return $this->getJambanDifabel();
                break;
            case 28:
                return $this->getTipeJamban();
                break;
            case 29:
                return $this->getASediaPembalut();
                break;
            case 30:
                return $this->getKegiatanCuciTangan();
                break;
            case 31:
                return $this->getPembuanganAirLimbah();
                break;
            case 32:
                return $this->getAKurasSeptitank();
                break;
            case 33:
                return $this->getAMemilikiSolokan();
                break;
            case 34:
                return $this->getATempatSampahKelas();
                break;
            case 35:
                return $this->getATempatSampahTutupP();
                break;
            case 36:
                return $this->getACerminJambanP();
                break;
            case 37:
                return $this->getAMemilikiTps();
                break;
            case 38:
                return $this->getATpsAngkutRutin();
                break;
            case 39:
                return $this->getAAnggaranSanitasi();
                break;
            case 40:
                return $this->getAMelibatkanSanitasiSiswa();
                break;
            case 41:
                return $this->getAKemitraanSanDaerah();
                break;
            case 42:
                return $this->getAKemitraanSanPuskesmas();
                break;
            case 43:
                return $this->getAKemitraanSanSwasta();
                break;
            case 44:
                return $this->getAKemitraanSanNonPem();
                break;
            case 45:
                return $this->getKieGuruCuciTangan();
                break;
            case 46:
                return $this->getKieGuruHaid();
                break;
            case 47:
                return $this->getKieGuruPerawatanToilet();
                break;
            case 48:
                return $this->getKieGuruKeamananPangan();
                break;
            case 49:
                return $this->getKieGuruMinumAir();
                break;
            case 50:
                return $this->getKieKelasCuciTangan();
                break;
            case 51:
                return $this->getKieKelasHaid();
                break;
            case 52:
                return $this->getKieKelasPerawatanToilet();
                break;
            case 53:
                return $this->getKieKelasKeamananPangan();
                break;
            case 54:
                return $this->getKieKelasMinumAir();
                break;
            case 55:
                return $this->getKieToiletCuciTangan();
                break;
            case 56:
                return $this->getKieToiletHaid();
                break;
            case 57:
                return $this->getKieToiletPerawatanToilet();
                break;
            case 58:
                return $this->getKieToiletKeamananPangan();
                break;
            case 59:
                return $this->getKieToiletMinumAir();
                break;
            case 60:
                return $this->getKieSelasarCuciTangan();
                break;
            case 61:
                return $this->getKieSelasarHaid();
                break;
            case 62:
                return $this->getKieSelasarPerawatanToilet();
                break;
            case 63:
                return $this->getKieSelasarKeamananPangan();
                break;
            case 64:
                return $this->getKieSelasarMinumAir();
                break;
            case 65:
                return $this->getKieUksCuciTangan();
                break;
            case 66:
                return $this->getKieUksHaid();
                break;
            case 67:
                return $this->getKieUksPerawatanToilet();
                break;
            case 68:
                return $this->getKieUksKeamananPangan();
                break;
            case 69:
                return $this->getKieUksMinumAir();
                break;
            case 70:
                return $this->getKieKantinCuciTangan();
                break;
            case 71:
                return $this->getKieKantinHaid();
                break;
            case 72:
                return $this->getKieKantinPerawatanToilet();
                break;
            case 73:
                return $this->getKieKantinKeamananPangan();
                break;
            case 74:
                return $this->getKieKantinMinumAir();
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
        if (isset($alreadyDumpedObjects['Sanitasi'][serialize($this->getPrimaryKey())])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Sanitasi'][serialize($this->getPrimaryKey())] = true;
        $keys = SanitasiPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getSekolahId(),
            $keys[1] => $this->getSemesterId(),
            $keys[2] => $this->getSumberAirId(),
            $keys[3] => $this->getSumberAirMinumId(),
            $keys[4] => $this->getCreateDate(),
            $keys[5] => $this->getLastUpdate(),
            $keys[6] => $this->getSoftDelete(),
            $keys[7] => $this->getLastSync(),
            $keys[8] => $this->getUpdaterId(),
            $keys[9] => $this->getKetersediaanAir(),
            $keys[10] => $this->getKecukupanAir(),
            $keys[11] => $this->getMinumSiswa(),
            $keys[12] => $this->getMemprosesAir(),
            $keys[13] => $this->getSiswaBawaAir(),
            $keys[14] => $this->getToiletSiswaLaki(),
            $keys[15] => $this->getToiletSiswaPerempuan(),
            $keys[16] => $this->getToiletSiswaKk(),
            $keys[17] => $this->getToiletSiswaKecil(),
            $keys[18] => $this->getJmlJambanLG(),
            $keys[19] => $this->getJmlJambanLTg(),
            $keys[20] => $this->getJmlJambanPG(),
            $keys[21] => $this->getJmlJambanPTg(),
            $keys[22] => $this->getJmlJambanLpG(),
            $keys[23] => $this->getJmlJambanLpTg(),
            $keys[24] => $this->getTempatCuciTangan(),
            $keys[25] => $this->getTempatCuciTanganRusak(),
            $keys[26] => $this->getASabunAirMengalir(),
            $keys[27] => $this->getJambanDifabel(),
            $keys[28] => $this->getTipeJamban(),
            $keys[29] => $this->getASediaPembalut(),
            $keys[30] => $this->getKegiatanCuciTangan(),
            $keys[31] => $this->getPembuanganAirLimbah(),
            $keys[32] => $this->getAKurasSeptitank(),
            $keys[33] => $this->getAMemilikiSolokan(),
            $keys[34] => $this->getATempatSampahKelas(),
            $keys[35] => $this->getATempatSampahTutupP(),
            $keys[36] => $this->getACerminJambanP(),
            $keys[37] => $this->getAMemilikiTps(),
            $keys[38] => $this->getATpsAngkutRutin(),
            $keys[39] => $this->getAAnggaranSanitasi(),
            $keys[40] => $this->getAMelibatkanSanitasiSiswa(),
            $keys[41] => $this->getAKemitraanSanDaerah(),
            $keys[42] => $this->getAKemitraanSanPuskesmas(),
            $keys[43] => $this->getAKemitraanSanSwasta(),
            $keys[44] => $this->getAKemitraanSanNonPem(),
            $keys[45] => $this->getKieGuruCuciTangan(),
            $keys[46] => $this->getKieGuruHaid(),
            $keys[47] => $this->getKieGuruPerawatanToilet(),
            $keys[48] => $this->getKieGuruKeamananPangan(),
            $keys[49] => $this->getKieGuruMinumAir(),
            $keys[50] => $this->getKieKelasCuciTangan(),
            $keys[51] => $this->getKieKelasHaid(),
            $keys[52] => $this->getKieKelasPerawatanToilet(),
            $keys[53] => $this->getKieKelasKeamananPangan(),
            $keys[54] => $this->getKieKelasMinumAir(),
            $keys[55] => $this->getKieToiletCuciTangan(),
            $keys[56] => $this->getKieToiletHaid(),
            $keys[57] => $this->getKieToiletPerawatanToilet(),
            $keys[58] => $this->getKieToiletKeamananPangan(),
            $keys[59] => $this->getKieToiletMinumAir(),
            $keys[60] => $this->getKieSelasarCuciTangan(),
            $keys[61] => $this->getKieSelasarHaid(),
            $keys[62] => $this->getKieSelasarPerawatanToilet(),
            $keys[63] => $this->getKieSelasarKeamananPangan(),
            $keys[64] => $this->getKieSelasarMinumAir(),
            $keys[65] => $this->getKieUksCuciTangan(),
            $keys[66] => $this->getKieUksHaid(),
            $keys[67] => $this->getKieUksPerawatanToilet(),
            $keys[68] => $this->getKieUksKeamananPangan(),
            $keys[69] => $this->getKieUksMinumAir(),
            $keys[70] => $this->getKieKantinCuciTangan(),
            $keys[71] => $this->getKieKantinHaid(),
            $keys[72] => $this->getKieKantinPerawatanToilet(),
            $keys[73] => $this->getKieKantinKeamananPangan(),
            $keys[74] => $this->getKieKantinMinumAir(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aSekolah) {
                $result['Sekolah'] = $this->aSekolah->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aSemester) {
                $result['Semester'] = $this->aSemester->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aSumberAirRelatedBySumberAirId) {
                $result['SumberAirRelatedBySumberAirId'] = $this->aSumberAirRelatedBySumberAirId->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aSumberAirRelatedBySumberAirMinumId) {
                $result['SumberAirRelatedBySumberAirMinumId'] = $this->aSumberAirRelatedBySumberAirMinumId->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
        $pos = SanitasiPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setSumberAirId($value);
                break;
            case 3:
                $this->setSumberAirMinumId($value);
                break;
            case 4:
                $this->setCreateDate($value);
                break;
            case 5:
                $this->setLastUpdate($value);
                break;
            case 6:
                $this->setSoftDelete($value);
                break;
            case 7:
                $this->setLastSync($value);
                break;
            case 8:
                $this->setUpdaterId($value);
                break;
            case 9:
                $this->setKetersediaanAir($value);
                break;
            case 10:
                $this->setKecukupanAir($value);
                break;
            case 11:
                $this->setMinumSiswa($value);
                break;
            case 12:
                $this->setMemprosesAir($value);
                break;
            case 13:
                $this->setSiswaBawaAir($value);
                break;
            case 14:
                $this->setToiletSiswaLaki($value);
                break;
            case 15:
                $this->setToiletSiswaPerempuan($value);
                break;
            case 16:
                $this->setToiletSiswaKk($value);
                break;
            case 17:
                $this->setToiletSiswaKecil($value);
                break;
            case 18:
                $this->setJmlJambanLG($value);
                break;
            case 19:
                $this->setJmlJambanLTg($value);
                break;
            case 20:
                $this->setJmlJambanPG($value);
                break;
            case 21:
                $this->setJmlJambanPTg($value);
                break;
            case 22:
                $this->setJmlJambanLpG($value);
                break;
            case 23:
                $this->setJmlJambanLpTg($value);
                break;
            case 24:
                $this->setTempatCuciTangan($value);
                break;
            case 25:
                $this->setTempatCuciTanganRusak($value);
                break;
            case 26:
                $this->setASabunAirMengalir($value);
                break;
            case 27:
                $this->setJambanDifabel($value);
                break;
            case 28:
                $this->setTipeJamban($value);
                break;
            case 29:
                $this->setASediaPembalut($value);
                break;
            case 30:
                $this->setKegiatanCuciTangan($value);
                break;
            case 31:
                $this->setPembuanganAirLimbah($value);
                break;
            case 32:
                $this->setAKurasSeptitank($value);
                break;
            case 33:
                $this->setAMemilikiSolokan($value);
                break;
            case 34:
                $this->setATempatSampahKelas($value);
                break;
            case 35:
                $this->setATempatSampahTutupP($value);
                break;
            case 36:
                $this->setACerminJambanP($value);
                break;
            case 37:
                $this->setAMemilikiTps($value);
                break;
            case 38:
                $this->setATpsAngkutRutin($value);
                break;
            case 39:
                $this->setAAnggaranSanitasi($value);
                break;
            case 40:
                $this->setAMelibatkanSanitasiSiswa($value);
                break;
            case 41:
                $this->setAKemitraanSanDaerah($value);
                break;
            case 42:
                $this->setAKemitraanSanPuskesmas($value);
                break;
            case 43:
                $this->setAKemitraanSanSwasta($value);
                break;
            case 44:
                $this->setAKemitraanSanNonPem($value);
                break;
            case 45:
                $this->setKieGuruCuciTangan($value);
                break;
            case 46:
                $this->setKieGuruHaid($value);
                break;
            case 47:
                $this->setKieGuruPerawatanToilet($value);
                break;
            case 48:
                $this->setKieGuruKeamananPangan($value);
                break;
            case 49:
                $this->setKieGuruMinumAir($value);
                break;
            case 50:
                $this->setKieKelasCuciTangan($value);
                break;
            case 51:
                $this->setKieKelasHaid($value);
                break;
            case 52:
                $this->setKieKelasPerawatanToilet($value);
                break;
            case 53:
                $this->setKieKelasKeamananPangan($value);
                break;
            case 54:
                $this->setKieKelasMinumAir($value);
                break;
            case 55:
                $this->setKieToiletCuciTangan($value);
                break;
            case 56:
                $this->setKieToiletHaid($value);
                break;
            case 57:
                $this->setKieToiletPerawatanToilet($value);
                break;
            case 58:
                $this->setKieToiletKeamananPangan($value);
                break;
            case 59:
                $this->setKieToiletMinumAir($value);
                break;
            case 60:
                $this->setKieSelasarCuciTangan($value);
                break;
            case 61:
                $this->setKieSelasarHaid($value);
                break;
            case 62:
                $this->setKieSelasarPerawatanToilet($value);
                break;
            case 63:
                $this->setKieSelasarKeamananPangan($value);
                break;
            case 64:
                $this->setKieSelasarMinumAir($value);
                break;
            case 65:
                $this->setKieUksCuciTangan($value);
                break;
            case 66:
                $this->setKieUksHaid($value);
                break;
            case 67:
                $this->setKieUksPerawatanToilet($value);
                break;
            case 68:
                $this->setKieUksKeamananPangan($value);
                break;
            case 69:
                $this->setKieUksMinumAir($value);
                break;
            case 70:
                $this->setKieKantinCuciTangan($value);
                break;
            case 71:
                $this->setKieKantinHaid($value);
                break;
            case 72:
                $this->setKieKantinPerawatanToilet($value);
                break;
            case 73:
                $this->setKieKantinKeamananPangan($value);
                break;
            case 74:
                $this->setKieKantinMinumAir($value);
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
        $keys = SanitasiPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setSekolahId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setSemesterId($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setSumberAirId($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setSumberAirMinumId($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setCreateDate($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setLastUpdate($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setSoftDelete($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setLastSync($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setUpdaterId($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setKetersediaanAir($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setKecukupanAir($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setMinumSiswa($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setMemprosesAir($arr[$keys[12]]);
        if (array_key_exists($keys[13], $arr)) $this->setSiswaBawaAir($arr[$keys[13]]);
        if (array_key_exists($keys[14], $arr)) $this->setToiletSiswaLaki($arr[$keys[14]]);
        if (array_key_exists($keys[15], $arr)) $this->setToiletSiswaPerempuan($arr[$keys[15]]);
        if (array_key_exists($keys[16], $arr)) $this->setToiletSiswaKk($arr[$keys[16]]);
        if (array_key_exists($keys[17], $arr)) $this->setToiletSiswaKecil($arr[$keys[17]]);
        if (array_key_exists($keys[18], $arr)) $this->setJmlJambanLG($arr[$keys[18]]);
        if (array_key_exists($keys[19], $arr)) $this->setJmlJambanLTg($arr[$keys[19]]);
        if (array_key_exists($keys[20], $arr)) $this->setJmlJambanPG($arr[$keys[20]]);
        if (array_key_exists($keys[21], $arr)) $this->setJmlJambanPTg($arr[$keys[21]]);
        if (array_key_exists($keys[22], $arr)) $this->setJmlJambanLpG($arr[$keys[22]]);
        if (array_key_exists($keys[23], $arr)) $this->setJmlJambanLpTg($arr[$keys[23]]);
        if (array_key_exists($keys[24], $arr)) $this->setTempatCuciTangan($arr[$keys[24]]);
        if (array_key_exists($keys[25], $arr)) $this->setTempatCuciTanganRusak($arr[$keys[25]]);
        if (array_key_exists($keys[26], $arr)) $this->setASabunAirMengalir($arr[$keys[26]]);
        if (array_key_exists($keys[27], $arr)) $this->setJambanDifabel($arr[$keys[27]]);
        if (array_key_exists($keys[28], $arr)) $this->setTipeJamban($arr[$keys[28]]);
        if (array_key_exists($keys[29], $arr)) $this->setASediaPembalut($arr[$keys[29]]);
        if (array_key_exists($keys[30], $arr)) $this->setKegiatanCuciTangan($arr[$keys[30]]);
        if (array_key_exists($keys[31], $arr)) $this->setPembuanganAirLimbah($arr[$keys[31]]);
        if (array_key_exists($keys[32], $arr)) $this->setAKurasSeptitank($arr[$keys[32]]);
        if (array_key_exists($keys[33], $arr)) $this->setAMemilikiSolokan($arr[$keys[33]]);
        if (array_key_exists($keys[34], $arr)) $this->setATempatSampahKelas($arr[$keys[34]]);
        if (array_key_exists($keys[35], $arr)) $this->setATempatSampahTutupP($arr[$keys[35]]);
        if (array_key_exists($keys[36], $arr)) $this->setACerminJambanP($arr[$keys[36]]);
        if (array_key_exists($keys[37], $arr)) $this->setAMemilikiTps($arr[$keys[37]]);
        if (array_key_exists($keys[38], $arr)) $this->setATpsAngkutRutin($arr[$keys[38]]);
        if (array_key_exists($keys[39], $arr)) $this->setAAnggaranSanitasi($arr[$keys[39]]);
        if (array_key_exists($keys[40], $arr)) $this->setAMelibatkanSanitasiSiswa($arr[$keys[40]]);
        if (array_key_exists($keys[41], $arr)) $this->setAKemitraanSanDaerah($arr[$keys[41]]);
        if (array_key_exists($keys[42], $arr)) $this->setAKemitraanSanPuskesmas($arr[$keys[42]]);
        if (array_key_exists($keys[43], $arr)) $this->setAKemitraanSanSwasta($arr[$keys[43]]);
        if (array_key_exists($keys[44], $arr)) $this->setAKemitraanSanNonPem($arr[$keys[44]]);
        if (array_key_exists($keys[45], $arr)) $this->setKieGuruCuciTangan($arr[$keys[45]]);
        if (array_key_exists($keys[46], $arr)) $this->setKieGuruHaid($arr[$keys[46]]);
        if (array_key_exists($keys[47], $arr)) $this->setKieGuruPerawatanToilet($arr[$keys[47]]);
        if (array_key_exists($keys[48], $arr)) $this->setKieGuruKeamananPangan($arr[$keys[48]]);
        if (array_key_exists($keys[49], $arr)) $this->setKieGuruMinumAir($arr[$keys[49]]);
        if (array_key_exists($keys[50], $arr)) $this->setKieKelasCuciTangan($arr[$keys[50]]);
        if (array_key_exists($keys[51], $arr)) $this->setKieKelasHaid($arr[$keys[51]]);
        if (array_key_exists($keys[52], $arr)) $this->setKieKelasPerawatanToilet($arr[$keys[52]]);
        if (array_key_exists($keys[53], $arr)) $this->setKieKelasKeamananPangan($arr[$keys[53]]);
        if (array_key_exists($keys[54], $arr)) $this->setKieKelasMinumAir($arr[$keys[54]]);
        if (array_key_exists($keys[55], $arr)) $this->setKieToiletCuciTangan($arr[$keys[55]]);
        if (array_key_exists($keys[56], $arr)) $this->setKieToiletHaid($arr[$keys[56]]);
        if (array_key_exists($keys[57], $arr)) $this->setKieToiletPerawatanToilet($arr[$keys[57]]);
        if (array_key_exists($keys[58], $arr)) $this->setKieToiletKeamananPangan($arr[$keys[58]]);
        if (array_key_exists($keys[59], $arr)) $this->setKieToiletMinumAir($arr[$keys[59]]);
        if (array_key_exists($keys[60], $arr)) $this->setKieSelasarCuciTangan($arr[$keys[60]]);
        if (array_key_exists($keys[61], $arr)) $this->setKieSelasarHaid($arr[$keys[61]]);
        if (array_key_exists($keys[62], $arr)) $this->setKieSelasarPerawatanToilet($arr[$keys[62]]);
        if (array_key_exists($keys[63], $arr)) $this->setKieSelasarKeamananPangan($arr[$keys[63]]);
        if (array_key_exists($keys[64], $arr)) $this->setKieSelasarMinumAir($arr[$keys[64]]);
        if (array_key_exists($keys[65], $arr)) $this->setKieUksCuciTangan($arr[$keys[65]]);
        if (array_key_exists($keys[66], $arr)) $this->setKieUksHaid($arr[$keys[66]]);
        if (array_key_exists($keys[67], $arr)) $this->setKieUksPerawatanToilet($arr[$keys[67]]);
        if (array_key_exists($keys[68], $arr)) $this->setKieUksKeamananPangan($arr[$keys[68]]);
        if (array_key_exists($keys[69], $arr)) $this->setKieUksMinumAir($arr[$keys[69]]);
        if (array_key_exists($keys[70], $arr)) $this->setKieKantinCuciTangan($arr[$keys[70]]);
        if (array_key_exists($keys[71], $arr)) $this->setKieKantinHaid($arr[$keys[71]]);
        if (array_key_exists($keys[72], $arr)) $this->setKieKantinPerawatanToilet($arr[$keys[72]]);
        if (array_key_exists($keys[73], $arr)) $this->setKieKantinKeamananPangan($arr[$keys[73]]);
        if (array_key_exists($keys[74], $arr)) $this->setKieKantinMinumAir($arr[$keys[74]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(SanitasiPeer::DATABASE_NAME);

        if ($this->isColumnModified(SanitasiPeer::SEKOLAH_ID)) $criteria->add(SanitasiPeer::SEKOLAH_ID, $this->sekolah_id);
        if ($this->isColumnModified(SanitasiPeer::SEMESTER_ID)) $criteria->add(SanitasiPeer::SEMESTER_ID, $this->semester_id);
        if ($this->isColumnModified(SanitasiPeer::SUMBER_AIR_ID)) $criteria->add(SanitasiPeer::SUMBER_AIR_ID, $this->sumber_air_id);
        if ($this->isColumnModified(SanitasiPeer::SUMBER_AIR_MINUM_ID)) $criteria->add(SanitasiPeer::SUMBER_AIR_MINUM_ID, $this->sumber_air_minum_id);
        if ($this->isColumnModified(SanitasiPeer::CREATE_DATE)) $criteria->add(SanitasiPeer::CREATE_DATE, $this->create_date);
        if ($this->isColumnModified(SanitasiPeer::LAST_UPDATE)) $criteria->add(SanitasiPeer::LAST_UPDATE, $this->last_update);
        if ($this->isColumnModified(SanitasiPeer::SOFT_DELETE)) $criteria->add(SanitasiPeer::SOFT_DELETE, $this->soft_delete);
        if ($this->isColumnModified(SanitasiPeer::LAST_SYNC)) $criteria->add(SanitasiPeer::LAST_SYNC, $this->last_sync);
        if ($this->isColumnModified(SanitasiPeer::UPDATER_ID)) $criteria->add(SanitasiPeer::UPDATER_ID, $this->updater_id);
        if ($this->isColumnModified(SanitasiPeer::KETERSEDIAAN_AIR)) $criteria->add(SanitasiPeer::KETERSEDIAAN_AIR, $this->ketersediaan_air);
        if ($this->isColumnModified(SanitasiPeer::KECUKUPAN_AIR)) $criteria->add(SanitasiPeer::KECUKUPAN_AIR, $this->kecukupan_air);
        if ($this->isColumnModified(SanitasiPeer::MINUM_SISWA)) $criteria->add(SanitasiPeer::MINUM_SISWA, $this->minum_siswa);
        if ($this->isColumnModified(SanitasiPeer::MEMPROSES_AIR)) $criteria->add(SanitasiPeer::MEMPROSES_AIR, $this->memproses_air);
        if ($this->isColumnModified(SanitasiPeer::SISWA_BAWA_AIR)) $criteria->add(SanitasiPeer::SISWA_BAWA_AIR, $this->siswa_bawa_air);
        if ($this->isColumnModified(SanitasiPeer::TOILET_SISWA_LAKI)) $criteria->add(SanitasiPeer::TOILET_SISWA_LAKI, $this->toilet_siswa_laki);
        if ($this->isColumnModified(SanitasiPeer::TOILET_SISWA_PEREMPUAN)) $criteria->add(SanitasiPeer::TOILET_SISWA_PEREMPUAN, $this->toilet_siswa_perempuan);
        if ($this->isColumnModified(SanitasiPeer::TOILET_SISWA_KK)) $criteria->add(SanitasiPeer::TOILET_SISWA_KK, $this->toilet_siswa_kk);
        if ($this->isColumnModified(SanitasiPeer::TOILET_SISWA_KECIL)) $criteria->add(SanitasiPeer::TOILET_SISWA_KECIL, $this->toilet_siswa_kecil);
        if ($this->isColumnModified(SanitasiPeer::JML_JAMBAN_L_G)) $criteria->add(SanitasiPeer::JML_JAMBAN_L_G, $this->jml_jamban_l_g);
        if ($this->isColumnModified(SanitasiPeer::JML_JAMBAN_L_TG)) $criteria->add(SanitasiPeer::JML_JAMBAN_L_TG, $this->jml_jamban_l_tg);
        if ($this->isColumnModified(SanitasiPeer::JML_JAMBAN_P_G)) $criteria->add(SanitasiPeer::JML_JAMBAN_P_G, $this->jml_jamban_p_g);
        if ($this->isColumnModified(SanitasiPeer::JML_JAMBAN_P_TG)) $criteria->add(SanitasiPeer::JML_JAMBAN_P_TG, $this->jml_jamban_p_tg);
        if ($this->isColumnModified(SanitasiPeer::JML_JAMBAN_LP_G)) $criteria->add(SanitasiPeer::JML_JAMBAN_LP_G, $this->jml_jamban_lp_g);
        if ($this->isColumnModified(SanitasiPeer::JML_JAMBAN_LP_TG)) $criteria->add(SanitasiPeer::JML_JAMBAN_LP_TG, $this->jml_jamban_lp_tg);
        if ($this->isColumnModified(SanitasiPeer::TEMPAT_CUCI_TANGAN)) $criteria->add(SanitasiPeer::TEMPAT_CUCI_TANGAN, $this->tempat_cuci_tangan);
        if ($this->isColumnModified(SanitasiPeer::TEMPAT_CUCI_TANGAN_RUSAK)) $criteria->add(SanitasiPeer::TEMPAT_CUCI_TANGAN_RUSAK, $this->tempat_cuci_tangan_rusak);
        if ($this->isColumnModified(SanitasiPeer::A_SABUN_AIR_MENGALIR)) $criteria->add(SanitasiPeer::A_SABUN_AIR_MENGALIR, $this->a_sabun_air_mengalir);
        if ($this->isColumnModified(SanitasiPeer::JAMBAN_DIFABEL)) $criteria->add(SanitasiPeer::JAMBAN_DIFABEL, $this->jamban_difabel);
        if ($this->isColumnModified(SanitasiPeer::TIPE_JAMBAN)) $criteria->add(SanitasiPeer::TIPE_JAMBAN, $this->tipe_jamban);
        if ($this->isColumnModified(SanitasiPeer::A_SEDIA_PEMBALUT)) $criteria->add(SanitasiPeer::A_SEDIA_PEMBALUT, $this->a_sedia_pembalut);
        if ($this->isColumnModified(SanitasiPeer::KEGIATAN_CUCI_TANGAN)) $criteria->add(SanitasiPeer::KEGIATAN_CUCI_TANGAN, $this->kegiatan_cuci_tangan);
        if ($this->isColumnModified(SanitasiPeer::PEMBUANGAN_AIR_LIMBAH)) $criteria->add(SanitasiPeer::PEMBUANGAN_AIR_LIMBAH, $this->pembuangan_air_limbah);
        if ($this->isColumnModified(SanitasiPeer::A_KURAS_SEPTITANK)) $criteria->add(SanitasiPeer::A_KURAS_SEPTITANK, $this->a_kuras_septitank);
        if ($this->isColumnModified(SanitasiPeer::A_MEMILIKI_SOLOKAN)) $criteria->add(SanitasiPeer::A_MEMILIKI_SOLOKAN, $this->a_memiliki_solokan);
        if ($this->isColumnModified(SanitasiPeer::A_TEMPAT_SAMPAH_KELAS)) $criteria->add(SanitasiPeer::A_TEMPAT_SAMPAH_KELAS, $this->a_tempat_sampah_kelas);
        if ($this->isColumnModified(SanitasiPeer::A_TEMPAT_SAMPAH_TUTUP_P)) $criteria->add(SanitasiPeer::A_TEMPAT_SAMPAH_TUTUP_P, $this->a_tempat_sampah_tutup_p);
        if ($this->isColumnModified(SanitasiPeer::A_CERMIN_JAMBAN_P)) $criteria->add(SanitasiPeer::A_CERMIN_JAMBAN_P, $this->a_cermin_jamban_p);
        if ($this->isColumnModified(SanitasiPeer::A_MEMILIKI_TPS)) $criteria->add(SanitasiPeer::A_MEMILIKI_TPS, $this->a_memiliki_tps);
        if ($this->isColumnModified(SanitasiPeer::A_TPS_ANGKUT_RUTIN)) $criteria->add(SanitasiPeer::A_TPS_ANGKUT_RUTIN, $this->a_tps_angkut_rutin);
        if ($this->isColumnModified(SanitasiPeer::A_ANGGARAN_SANITASI)) $criteria->add(SanitasiPeer::A_ANGGARAN_SANITASI, $this->a_anggaran_sanitasi);
        if ($this->isColumnModified(SanitasiPeer::A_MELIBATKAN_SANITASI_SISWA)) $criteria->add(SanitasiPeer::A_MELIBATKAN_SANITASI_SISWA, $this->a_melibatkan_sanitasi_siswa);
        if ($this->isColumnModified(SanitasiPeer::A_KEMITRAAN_SAN_DAERAH)) $criteria->add(SanitasiPeer::A_KEMITRAAN_SAN_DAERAH, $this->a_kemitraan_san_daerah);
        if ($this->isColumnModified(SanitasiPeer::A_KEMITRAAN_SAN_PUSKESMAS)) $criteria->add(SanitasiPeer::A_KEMITRAAN_SAN_PUSKESMAS, $this->a_kemitraan_san_puskesmas);
        if ($this->isColumnModified(SanitasiPeer::A_KEMITRAAN_SAN_SWASTA)) $criteria->add(SanitasiPeer::A_KEMITRAAN_SAN_SWASTA, $this->a_kemitraan_san_swasta);
        if ($this->isColumnModified(SanitasiPeer::A_KEMITRAAN_SAN_NON_PEM)) $criteria->add(SanitasiPeer::A_KEMITRAAN_SAN_NON_PEM, $this->a_kemitraan_san_non_pem);
        if ($this->isColumnModified(SanitasiPeer::KIE_GURU_CUCI_TANGAN)) $criteria->add(SanitasiPeer::KIE_GURU_CUCI_TANGAN, $this->kie_guru_cuci_tangan);
        if ($this->isColumnModified(SanitasiPeer::KIE_GURU_HAID)) $criteria->add(SanitasiPeer::KIE_GURU_HAID, $this->kie_guru_haid);
        if ($this->isColumnModified(SanitasiPeer::KIE_GURU_PERAWATAN_TOILET)) $criteria->add(SanitasiPeer::KIE_GURU_PERAWATAN_TOILET, $this->kie_guru_perawatan_toilet);
        if ($this->isColumnModified(SanitasiPeer::KIE_GURU_KEAMANAN_PANGAN)) $criteria->add(SanitasiPeer::KIE_GURU_KEAMANAN_PANGAN, $this->kie_guru_keamanan_pangan);
        if ($this->isColumnModified(SanitasiPeer::KIE_GURU_MINUM_AIR)) $criteria->add(SanitasiPeer::KIE_GURU_MINUM_AIR, $this->kie_guru_minum_air);
        if ($this->isColumnModified(SanitasiPeer::KIE_KELAS_CUCI_TANGAN)) $criteria->add(SanitasiPeer::KIE_KELAS_CUCI_TANGAN, $this->kie_kelas_cuci_tangan);
        if ($this->isColumnModified(SanitasiPeer::KIE_KELAS_HAID)) $criteria->add(SanitasiPeer::KIE_KELAS_HAID, $this->kie_kelas_haid);
        if ($this->isColumnModified(SanitasiPeer::KIE_KELAS_PERAWATAN_TOILET)) $criteria->add(SanitasiPeer::KIE_KELAS_PERAWATAN_TOILET, $this->kie_kelas_perawatan_toilet);
        if ($this->isColumnModified(SanitasiPeer::KIE_KELAS_KEAMANAN_PANGAN)) $criteria->add(SanitasiPeer::KIE_KELAS_KEAMANAN_PANGAN, $this->kie_kelas_keamanan_pangan);
        if ($this->isColumnModified(SanitasiPeer::KIE_KELAS_MINUM_AIR)) $criteria->add(SanitasiPeer::KIE_KELAS_MINUM_AIR, $this->kie_kelas_minum_air);
        if ($this->isColumnModified(SanitasiPeer::KIE_TOILET_CUCI_TANGAN)) $criteria->add(SanitasiPeer::KIE_TOILET_CUCI_TANGAN, $this->kie_toilet_cuci_tangan);
        if ($this->isColumnModified(SanitasiPeer::KIE_TOILET_HAID)) $criteria->add(SanitasiPeer::KIE_TOILET_HAID, $this->kie_toilet_haid);
        if ($this->isColumnModified(SanitasiPeer::KIE_TOILET_PERAWATAN_TOILET)) $criteria->add(SanitasiPeer::KIE_TOILET_PERAWATAN_TOILET, $this->kie_toilet_perawatan_toilet);
        if ($this->isColumnModified(SanitasiPeer::KIE_TOILET_KEAMANAN_PANGAN)) $criteria->add(SanitasiPeer::KIE_TOILET_KEAMANAN_PANGAN, $this->kie_toilet_keamanan_pangan);
        if ($this->isColumnModified(SanitasiPeer::KIE_TOILET_MINUM_AIR)) $criteria->add(SanitasiPeer::KIE_TOILET_MINUM_AIR, $this->kie_toilet_minum_air);
        if ($this->isColumnModified(SanitasiPeer::KIE_SELASAR_CUCI_TANGAN)) $criteria->add(SanitasiPeer::KIE_SELASAR_CUCI_TANGAN, $this->kie_selasar_cuci_tangan);
        if ($this->isColumnModified(SanitasiPeer::KIE_SELASAR_HAID)) $criteria->add(SanitasiPeer::KIE_SELASAR_HAID, $this->kie_selasar_haid);
        if ($this->isColumnModified(SanitasiPeer::KIE_SELASAR_PERAWATAN_TOILET)) $criteria->add(SanitasiPeer::KIE_SELASAR_PERAWATAN_TOILET, $this->kie_selasar_perawatan_toilet);
        if ($this->isColumnModified(SanitasiPeer::KIE_SELASAR_KEAMANAN_PANGAN)) $criteria->add(SanitasiPeer::KIE_SELASAR_KEAMANAN_PANGAN, $this->kie_selasar_keamanan_pangan);
        if ($this->isColumnModified(SanitasiPeer::KIE_SELASAR_MINUM_AIR)) $criteria->add(SanitasiPeer::KIE_SELASAR_MINUM_AIR, $this->kie_selasar_minum_air);
        if ($this->isColumnModified(SanitasiPeer::KIE_UKS_CUCI_TANGAN)) $criteria->add(SanitasiPeer::KIE_UKS_CUCI_TANGAN, $this->kie_uks_cuci_tangan);
        if ($this->isColumnModified(SanitasiPeer::KIE_UKS_HAID)) $criteria->add(SanitasiPeer::KIE_UKS_HAID, $this->kie_uks_haid);
        if ($this->isColumnModified(SanitasiPeer::KIE_UKS_PERAWATAN_TOILET)) $criteria->add(SanitasiPeer::KIE_UKS_PERAWATAN_TOILET, $this->kie_uks_perawatan_toilet);
        if ($this->isColumnModified(SanitasiPeer::KIE_UKS_KEAMANAN_PANGAN)) $criteria->add(SanitasiPeer::KIE_UKS_KEAMANAN_PANGAN, $this->kie_uks_keamanan_pangan);
        if ($this->isColumnModified(SanitasiPeer::KIE_UKS_MINUM_AIR)) $criteria->add(SanitasiPeer::KIE_UKS_MINUM_AIR, $this->kie_uks_minum_air);
        if ($this->isColumnModified(SanitasiPeer::KIE_KANTIN_CUCI_TANGAN)) $criteria->add(SanitasiPeer::KIE_KANTIN_CUCI_TANGAN, $this->kie_kantin_cuci_tangan);
        if ($this->isColumnModified(SanitasiPeer::KIE_KANTIN_HAID)) $criteria->add(SanitasiPeer::KIE_KANTIN_HAID, $this->kie_kantin_haid);
        if ($this->isColumnModified(SanitasiPeer::KIE_KANTIN_PERAWATAN_TOILET)) $criteria->add(SanitasiPeer::KIE_KANTIN_PERAWATAN_TOILET, $this->kie_kantin_perawatan_toilet);
        if ($this->isColumnModified(SanitasiPeer::KIE_KANTIN_KEAMANAN_PANGAN)) $criteria->add(SanitasiPeer::KIE_KANTIN_KEAMANAN_PANGAN, $this->kie_kantin_keamanan_pangan);
        if ($this->isColumnModified(SanitasiPeer::KIE_KANTIN_MINUM_AIR)) $criteria->add(SanitasiPeer::KIE_KANTIN_MINUM_AIR, $this->kie_kantin_minum_air);

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
        $criteria = new Criteria(SanitasiPeer::DATABASE_NAME);
        $criteria->add(SanitasiPeer::SEKOLAH_ID, $this->sekolah_id);
        $criteria->add(SanitasiPeer::SEMESTER_ID, $this->semester_id);

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
     * @param object $copyObj An object of Sanitasi (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setSekolahId($this->getSekolahId());
        $copyObj->setSemesterId($this->getSemesterId());
        $copyObj->setSumberAirId($this->getSumberAirId());
        $copyObj->setSumberAirMinumId($this->getSumberAirMinumId());
        $copyObj->setCreateDate($this->getCreateDate());
        $copyObj->setLastUpdate($this->getLastUpdate());
        $copyObj->setSoftDelete($this->getSoftDelete());
        $copyObj->setLastSync($this->getLastSync());
        $copyObj->setUpdaterId($this->getUpdaterId());
        $copyObj->setKetersediaanAir($this->getKetersediaanAir());
        $copyObj->setKecukupanAir($this->getKecukupanAir());
        $copyObj->setMinumSiswa($this->getMinumSiswa());
        $copyObj->setMemprosesAir($this->getMemprosesAir());
        $copyObj->setSiswaBawaAir($this->getSiswaBawaAir());
        $copyObj->setToiletSiswaLaki($this->getToiletSiswaLaki());
        $copyObj->setToiletSiswaPerempuan($this->getToiletSiswaPerempuan());
        $copyObj->setToiletSiswaKk($this->getToiletSiswaKk());
        $copyObj->setToiletSiswaKecil($this->getToiletSiswaKecil());
        $copyObj->setJmlJambanLG($this->getJmlJambanLG());
        $copyObj->setJmlJambanLTg($this->getJmlJambanLTg());
        $copyObj->setJmlJambanPG($this->getJmlJambanPG());
        $copyObj->setJmlJambanPTg($this->getJmlJambanPTg());
        $copyObj->setJmlJambanLpG($this->getJmlJambanLpG());
        $copyObj->setJmlJambanLpTg($this->getJmlJambanLpTg());
        $copyObj->setTempatCuciTangan($this->getTempatCuciTangan());
        $copyObj->setTempatCuciTanganRusak($this->getTempatCuciTanganRusak());
        $copyObj->setASabunAirMengalir($this->getASabunAirMengalir());
        $copyObj->setJambanDifabel($this->getJambanDifabel());
        $copyObj->setTipeJamban($this->getTipeJamban());
        $copyObj->setASediaPembalut($this->getASediaPembalut());
        $copyObj->setKegiatanCuciTangan($this->getKegiatanCuciTangan());
        $copyObj->setPembuanganAirLimbah($this->getPembuanganAirLimbah());
        $copyObj->setAKurasSeptitank($this->getAKurasSeptitank());
        $copyObj->setAMemilikiSolokan($this->getAMemilikiSolokan());
        $copyObj->setATempatSampahKelas($this->getATempatSampahKelas());
        $copyObj->setATempatSampahTutupP($this->getATempatSampahTutupP());
        $copyObj->setACerminJambanP($this->getACerminJambanP());
        $copyObj->setAMemilikiTps($this->getAMemilikiTps());
        $copyObj->setATpsAngkutRutin($this->getATpsAngkutRutin());
        $copyObj->setAAnggaranSanitasi($this->getAAnggaranSanitasi());
        $copyObj->setAMelibatkanSanitasiSiswa($this->getAMelibatkanSanitasiSiswa());
        $copyObj->setAKemitraanSanDaerah($this->getAKemitraanSanDaerah());
        $copyObj->setAKemitraanSanPuskesmas($this->getAKemitraanSanPuskesmas());
        $copyObj->setAKemitraanSanSwasta($this->getAKemitraanSanSwasta());
        $copyObj->setAKemitraanSanNonPem($this->getAKemitraanSanNonPem());
        $copyObj->setKieGuruCuciTangan($this->getKieGuruCuciTangan());
        $copyObj->setKieGuruHaid($this->getKieGuruHaid());
        $copyObj->setKieGuruPerawatanToilet($this->getKieGuruPerawatanToilet());
        $copyObj->setKieGuruKeamananPangan($this->getKieGuruKeamananPangan());
        $copyObj->setKieGuruMinumAir($this->getKieGuruMinumAir());
        $copyObj->setKieKelasCuciTangan($this->getKieKelasCuciTangan());
        $copyObj->setKieKelasHaid($this->getKieKelasHaid());
        $copyObj->setKieKelasPerawatanToilet($this->getKieKelasPerawatanToilet());
        $copyObj->setKieKelasKeamananPangan($this->getKieKelasKeamananPangan());
        $copyObj->setKieKelasMinumAir($this->getKieKelasMinumAir());
        $copyObj->setKieToiletCuciTangan($this->getKieToiletCuciTangan());
        $copyObj->setKieToiletHaid($this->getKieToiletHaid());
        $copyObj->setKieToiletPerawatanToilet($this->getKieToiletPerawatanToilet());
        $copyObj->setKieToiletKeamananPangan($this->getKieToiletKeamananPangan());
        $copyObj->setKieToiletMinumAir($this->getKieToiletMinumAir());
        $copyObj->setKieSelasarCuciTangan($this->getKieSelasarCuciTangan());
        $copyObj->setKieSelasarHaid($this->getKieSelasarHaid());
        $copyObj->setKieSelasarPerawatanToilet($this->getKieSelasarPerawatanToilet());
        $copyObj->setKieSelasarKeamananPangan($this->getKieSelasarKeamananPangan());
        $copyObj->setKieSelasarMinumAir($this->getKieSelasarMinumAir());
        $copyObj->setKieUksCuciTangan($this->getKieUksCuciTangan());
        $copyObj->setKieUksHaid($this->getKieUksHaid());
        $copyObj->setKieUksPerawatanToilet($this->getKieUksPerawatanToilet());
        $copyObj->setKieUksKeamananPangan($this->getKieUksKeamananPangan());
        $copyObj->setKieUksMinumAir($this->getKieUksMinumAir());
        $copyObj->setKieKantinCuciTangan($this->getKieKantinCuciTangan());
        $copyObj->setKieKantinHaid($this->getKieKantinHaid());
        $copyObj->setKieKantinPerawatanToilet($this->getKieKantinPerawatanToilet());
        $copyObj->setKieKantinKeamananPangan($this->getKieKantinKeamananPangan());
        $copyObj->setKieKantinMinumAir($this->getKieKantinMinumAir());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

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
     * @return Sanitasi Clone of current object.
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
     * @return SanitasiPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new SanitasiPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Sekolah object.
     *
     * @param             Sekolah $v
     * @return Sanitasi The current object (for fluent API support)
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
            $v->addSanitasi($this);
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
                $this->aSekolah->addSanitasis($this);
             */
        }

        return $this->aSekolah;
    }

    /**
     * Declares an association between this object and a Semester object.
     *
     * @param             Semester $v
     * @return Sanitasi The current object (for fluent API support)
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
            $v->addSanitasi($this);
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
                $this->aSemester->addSanitasis($this);
             */
        }

        return $this->aSemester;
    }

    /**
     * Declares an association between this object and a SumberAir object.
     *
     * @param             SumberAir $v
     * @return Sanitasi The current object (for fluent API support)
     * @throws PropelException
     */
    public function setSumberAirRelatedBySumberAirId(SumberAir $v = null)
    {
        if ($v === null) {
            $this->setSumberAirId(NULL);
        } else {
            $this->setSumberAirId($v->getSumberAirId());
        }

        $this->aSumberAirRelatedBySumberAirId = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the SumberAir object, it will not be re-added.
        if ($v !== null) {
            $v->addSanitasiRelatedBySumberAirId($this);
        }


        return $this;
    }


    /**
     * Get the associated SumberAir object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return SumberAir The associated SumberAir object.
     * @throws PropelException
     */
    public function getSumberAirRelatedBySumberAirId(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aSumberAirRelatedBySumberAirId === null && (($this->sumber_air_id !== "" && $this->sumber_air_id !== null)) && $doQuery) {
            $this->aSumberAirRelatedBySumberAirId = SumberAirQuery::create()->findPk($this->sumber_air_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aSumberAirRelatedBySumberAirId->addSanitasisRelatedBySumberAirId($this);
             */
        }

        return $this->aSumberAirRelatedBySumberAirId;
    }

    /**
     * Declares an association between this object and a SumberAir object.
     *
     * @param             SumberAir $v
     * @return Sanitasi The current object (for fluent API support)
     * @throws PropelException
     */
    public function setSumberAirRelatedBySumberAirMinumId(SumberAir $v = null)
    {
        if ($v === null) {
            $this->setSumberAirMinumId(NULL);
        } else {
            $this->setSumberAirMinumId($v->getSumberAirId());
        }

        $this->aSumberAirRelatedBySumberAirMinumId = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the SumberAir object, it will not be re-added.
        if ($v !== null) {
            $v->addSanitasiRelatedBySumberAirMinumId($this);
        }


        return $this;
    }


    /**
     * Get the associated SumberAir object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return SumberAir The associated SumberAir object.
     * @throws PropelException
     */
    public function getSumberAirRelatedBySumberAirMinumId(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aSumberAirRelatedBySumberAirMinumId === null && (($this->sumber_air_minum_id !== "" && $this->sumber_air_minum_id !== null)) && $doQuery) {
            $this->aSumberAirRelatedBySumberAirMinumId = SumberAirQuery::create()->findPk($this->sumber_air_minum_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aSumberAirRelatedBySumberAirMinumId->addSanitasisRelatedBySumberAirMinumId($this);
             */
        }

        return $this->aSumberAirRelatedBySumberAirMinumId;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->sekolah_id = null;
        $this->semester_id = null;
        $this->sumber_air_id = null;
        $this->sumber_air_minum_id = null;
        $this->create_date = null;
        $this->last_update = null;
        $this->soft_delete = null;
        $this->last_sync = null;
        $this->updater_id = null;
        $this->ketersediaan_air = null;
        $this->kecukupan_air = null;
        $this->minum_siswa = null;
        $this->memproses_air = null;
        $this->siswa_bawa_air = null;
        $this->toilet_siswa_laki = null;
        $this->toilet_siswa_perempuan = null;
        $this->toilet_siswa_kk = null;
        $this->toilet_siswa_kecil = null;
        $this->jml_jamban_l_g = null;
        $this->jml_jamban_l_tg = null;
        $this->jml_jamban_p_g = null;
        $this->jml_jamban_p_tg = null;
        $this->jml_jamban_lp_g = null;
        $this->jml_jamban_lp_tg = null;
        $this->tempat_cuci_tangan = null;
        $this->tempat_cuci_tangan_rusak = null;
        $this->a_sabun_air_mengalir = null;
        $this->jamban_difabel = null;
        $this->tipe_jamban = null;
        $this->a_sedia_pembalut = null;
        $this->kegiatan_cuci_tangan = null;
        $this->pembuangan_air_limbah = null;
        $this->a_kuras_septitank = null;
        $this->a_memiliki_solokan = null;
        $this->a_tempat_sampah_kelas = null;
        $this->a_tempat_sampah_tutup_p = null;
        $this->a_cermin_jamban_p = null;
        $this->a_memiliki_tps = null;
        $this->a_tps_angkut_rutin = null;
        $this->a_anggaran_sanitasi = null;
        $this->a_melibatkan_sanitasi_siswa = null;
        $this->a_kemitraan_san_daerah = null;
        $this->a_kemitraan_san_puskesmas = null;
        $this->a_kemitraan_san_swasta = null;
        $this->a_kemitraan_san_non_pem = null;
        $this->kie_guru_cuci_tangan = null;
        $this->kie_guru_haid = null;
        $this->kie_guru_perawatan_toilet = null;
        $this->kie_guru_keamanan_pangan = null;
        $this->kie_guru_minum_air = null;
        $this->kie_kelas_cuci_tangan = null;
        $this->kie_kelas_haid = null;
        $this->kie_kelas_perawatan_toilet = null;
        $this->kie_kelas_keamanan_pangan = null;
        $this->kie_kelas_minum_air = null;
        $this->kie_toilet_cuci_tangan = null;
        $this->kie_toilet_haid = null;
        $this->kie_toilet_perawatan_toilet = null;
        $this->kie_toilet_keamanan_pangan = null;
        $this->kie_toilet_minum_air = null;
        $this->kie_selasar_cuci_tangan = null;
        $this->kie_selasar_haid = null;
        $this->kie_selasar_perawatan_toilet = null;
        $this->kie_selasar_keamanan_pangan = null;
        $this->kie_selasar_minum_air = null;
        $this->kie_uks_cuci_tangan = null;
        $this->kie_uks_haid = null;
        $this->kie_uks_perawatan_toilet = null;
        $this->kie_uks_keamanan_pangan = null;
        $this->kie_uks_minum_air = null;
        $this->kie_kantin_cuci_tangan = null;
        $this->kie_kantin_haid = null;
        $this->kie_kantin_perawatan_toilet = null;
        $this->kie_kantin_keamanan_pangan = null;
        $this->kie_kantin_minum_air = null;
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
            if ($this->aSekolah instanceof Persistent) {
              $this->aSekolah->clearAllReferences($deep);
            }
            if ($this->aSemester instanceof Persistent) {
              $this->aSemester->clearAllReferences($deep);
            }
            if ($this->aSumberAirRelatedBySumberAirId instanceof Persistent) {
              $this->aSumberAirRelatedBySumberAirId->clearAllReferences($deep);
            }
            if ($this->aSumberAirRelatedBySumberAirMinumId instanceof Persistent) {
              $this->aSumberAirRelatedBySumberAirMinumId->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        $this->aSekolah = null;
        $this->aSemester = null;
        $this->aSumberAirRelatedBySumberAirId = null;
        $this->aSumberAirRelatedBySumberAirMinumId = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(SanitasiPeer::DEFAULT_STRING_FORMAT);
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
