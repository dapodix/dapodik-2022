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
use DataDikdas\Model\Agama;
use DataDikdas\Model\AgamaQuery;
use DataDikdas\Model\AlasanLayakPip;
use DataDikdas\Model\AlasanLayakPipQuery;
use DataDikdas\Model\AlatTransportasi;
use DataDikdas\Model\AlatTransportasiQuery;
use DataDikdas\Model\AnggotaPanitia;
use DataDikdas\Model\AnggotaPanitiaQuery;
use DataDikdas\Model\AnggotaRombel;
use DataDikdas\Model\AnggotaRombelQuery;
use DataDikdas\Model\Bank;
use DataDikdas\Model\BankQuery;
use DataDikdas\Model\BeasiswaPesertaDidik;
use DataDikdas\Model\BeasiswaPesertaDidikQuery;
use DataDikdas\Model\JenisTinggal;
use DataDikdas\Model\JenisTinggalQuery;
use DataDikdas\Model\JenjangPendidikan;
use DataDikdas\Model\JenjangPendidikanQuery;
use DataDikdas\Model\KebutuhanKhusus;
use DataDikdas\Model\KebutuhanKhususQuery;
use DataDikdas\Model\KesejahteraanPd;
use DataDikdas\Model\KesejahteraanPdQuery;
use DataDikdas\Model\KitasPd;
use DataDikdas\Model\KitasPdQuery;
use DataDikdas\Model\MstWilayah;
use DataDikdas\Model\MstWilayahQuery;
use DataDikdas\Model\Negara;
use DataDikdas\Model\NegaraQuery;
use DataDikdas\Model\PasporPd;
use DataDikdas\Model\PasporPdQuery;
use DataDikdas\Model\Pekerjaan;
use DataDikdas\Model\PekerjaanQuery;
use DataDikdas\Model\Penghasilan;
use DataDikdas\Model\PenghasilanQuery;
use DataDikdas\Model\PesertaDidik;
use DataDikdas\Model\PesertaDidikBaru;
use DataDikdas\Model\PesertaDidikBaruQuery;
use DataDikdas\Model\PesertaDidikLongitudinal;
use DataDikdas\Model\PesertaDidikLongitudinalQuery;
use DataDikdas\Model\PesertaDidikPeer;
use DataDikdas\Model\PesertaDidikQuery;
use DataDikdas\Model\Prestasi;
use DataDikdas\Model\PrestasiQuery;
use DataDikdas\Model\RegistrasiPesertaDidik;
use DataDikdas\Model\RegistrasiPesertaDidikQuery;
use DataDikdas\Model\SertifikasiPd;
use DataDikdas\Model\SertifikasiPdQuery;
use DataDikdas\Model\VldPesertaDidik;
use DataDikdas\Model\VldPesertaDidikQuery;

/**
 * Base class that represents a row from the 'peserta_didik' table.
 *
 * 
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BasePesertaDidik extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'DataDikdas\\Model\\PesertaDidikPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        PesertaDidikPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the peserta_didik_id field.
     * @var        string
     */
    protected $peserta_didik_id;

    /**
     * The value for the nama field.
     * @var        string
     */
    protected $nama;

    /**
     * The value for the jenis_kelamin field.
     * @var        string
     */
    protected $jenis_kelamin;

    /**
     * The value for the nisn field.
     * @var        string
     */
    protected $nisn;

    /**
     * The value for the nik field.
     * @var        string
     */
    protected $nik;

    /**
     * The value for the no_kk field.
     * @var        string
     */
    protected $no_kk;

    /**
     * The value for the tempat_lahir field.
     * @var        string
     */
    protected $tempat_lahir;

    /**
     * The value for the tanggal_lahir field.
     * @var        string
     */
    protected $tanggal_lahir;

    /**
     * The value for the agama_id field.
     * @var        int
     */
    protected $agama_id;

    /**
     * The value for the kebutuhan_khusus_id field.
     * @var        int
     */
    protected $kebutuhan_khusus_id;

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
     * The value for the kode_wilayah field.
     * @var        string
     */
    protected $kode_wilayah;

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
     * The value for the jenis_tinggal_id field.
     * @var        string
     */
    protected $jenis_tinggal_id;

    /**
     * The value for the alat_transportasi_id field.
     * @var        string
     */
    protected $alat_transportasi_id;

    /**
     * The value for the nik_ayah field.
     * @var        string
     */
    protected $nik_ayah;

    /**
     * The value for the nik_ibu field.
     * @var        string
     */
    protected $nik_ibu;

    /**
     * The value for the anak_keberapa field.
     * @var        string
     */
    protected $anak_keberapa;

    /**
     * The value for the nik_wali field.
     * @var        string
     */
    protected $nik_wali;

    /**
     * The value for the nomor_telepon_rumah field.
     * @var        string
     */
    protected $nomor_telepon_rumah;

    /**
     * The value for the nomor_telepon_seluler field.
     * @var        string
     */
    protected $nomor_telepon_seluler;

    /**
     * The value for the email field.
     * @var        string
     */
    protected $email;

    /**
     * The value for the penerima_kps field.
     * @var        string
     */
    protected $penerima_kps;

    /**
     * The value for the no_kps field.
     * @var        string
     */
    protected $no_kps;

    /**
     * The value for the layak_pip field.
     * Note: this column has a database default value of: '0'
     * @var        string
     */
    protected $layak_pip;

    /**
     * The value for the penerima_kip field.
     * @var        string
     */
    protected $penerima_kip;

    /**
     * The value for the no_kip field.
     * @var        string
     */
    protected $no_kip;

    /**
     * The value for the nm_kip field.
     * @var        string
     */
    protected $nm_kip;

    /**
     * The value for the no_kks field.
     * @var        string
     */
    protected $no_kks;

    /**
     * The value for the reg_akta_lahir field.
     * @var        string
     */
    protected $reg_akta_lahir;

    /**
     * The value for the id_layak_pip field.
     * @var        string
     */
    protected $id_layak_pip;

    /**
     * The value for the id_bank field.
     * @var        string
     */
    protected $id_bank;

    /**
     * The value for the rekening_bank field.
     * @var        string
     */
    protected $rekening_bank;

    /**
     * The value for the nama_kcp field.
     * @var        string
     */
    protected $nama_kcp;

    /**
     * The value for the rekening_atas_nama field.
     * @var        string
     */
    protected $rekening_atas_nama;

    /**
     * The value for the status_data field.
     * @var        int
     */
    protected $status_data;

    /**
     * The value for the nama_ayah field.
     * @var        string
     */
    protected $nama_ayah;

    /**
     * The value for the tahun_lahir_ayah field.
     * @var        string
     */
    protected $tahun_lahir_ayah;

    /**
     * The value for the jenjang_pendidikan_ayah field.
     * @var        string
     */
    protected $jenjang_pendidikan_ayah;

    /**
     * The value for the pekerjaan_id_ayah field.
     * @var        int
     */
    protected $pekerjaan_id_ayah;

    /**
     * The value for the penghasilan_id_ayah field.
     * @var        int
     */
    protected $penghasilan_id_ayah;

    /**
     * The value for the kebutuhan_khusus_id_ayah field.
     * @var        int
     */
    protected $kebutuhan_khusus_id_ayah;

    /**
     * The value for the nama_ibu_kandung field.
     * @var        string
     */
    protected $nama_ibu_kandung;

    /**
     * The value for the tahun_lahir_ibu field.
     * @var        string
     */
    protected $tahun_lahir_ibu;

    /**
     * The value for the jenjang_pendidikan_ibu field.
     * @var        string
     */
    protected $jenjang_pendidikan_ibu;

    /**
     * The value for the penghasilan_id_ibu field.
     * @var        int
     */
    protected $penghasilan_id_ibu;

    /**
     * The value for the pekerjaan_id_ibu field.
     * @var        int
     */
    protected $pekerjaan_id_ibu;

    /**
     * The value for the kebutuhan_khusus_id_ibu field.
     * @var        int
     */
    protected $kebutuhan_khusus_id_ibu;

    /**
     * The value for the nama_wali field.
     * @var        string
     */
    protected $nama_wali;

    /**
     * The value for the tahun_lahir_wali field.
     * @var        string
     */
    protected $tahun_lahir_wali;

    /**
     * The value for the jenjang_pendidikan_wali field.
     * @var        string
     */
    protected $jenjang_pendidikan_wali;

    /**
     * The value for the pekerjaan_id_wali field.
     * @var        int
     */
    protected $pekerjaan_id_wali;

    /**
     * The value for the penghasilan_id_wali field.
     * @var        int
     */
    protected $penghasilan_id_wali;

    /**
     * The value for the kewarganegaraan field.
     * @var        string
     */
    protected $kewarganegaraan;

    /**
     * The value for the pekerjaan_id field.
     * @var        int
     */
    protected $pekerjaan_id;

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
     * @var        KebutuhanKhusus
     */
    protected $aKebutuhanKhususRelatedByKebutuhanKhususIdAyah;

    /**
     * @var        KebutuhanKhusus
     */
    protected $aKebutuhanKhususRelatedByKebutuhanKhususIdIbu;

    /**
     * @var        Negara
     */
    protected $aNegara;

    /**
     * @var        AlasanLayakPip
     */
    protected $aAlasanLayakPip;

    /**
     * @var        Bank
     */
    protected $aBank;

    /**
     * @var        MstWilayah
     */
    protected $aMstWilayah;

    /**
     * @var        KebutuhanKhusus
     */
    protected $aKebutuhanKhususRelatedByKebutuhanKhususId;

    /**
     * @var        Pekerjaan
     */
    protected $aPekerjaanRelatedByPekerjaanId;

    /**
     * @var        Agama
     */
    protected $aAgama;

    /**
     * @var        Penghasilan
     */
    protected $aPenghasilanRelatedByPenghasilanIdAyah;

    /**
     * @var        JenisTinggal
     */
    protected $aJenisTinggal;

    /**
     * @var        AlatTransportasi
     */
    protected $aAlatTransportasi;

    /**
     * @var        Pekerjaan
     */
    protected $aPekerjaanRelatedByPekerjaanIdAyah;

    /**
     * @var        JenjangPendidikan
     */
    protected $aJenjangPendidikanRelatedByJenjangPendidikanIbu;

    /**
     * @var        Penghasilan
     */
    protected $aPenghasilanRelatedByPenghasilanIdWali;

    /**
     * @var        Pekerjaan
     */
    protected $aPekerjaanRelatedByPekerjaanIdIbu;

    /**
     * @var        JenjangPendidikan
     */
    protected $aJenjangPendidikanRelatedByJenjangPendidikanAyah;

    /**
     * @var        Penghasilan
     */
    protected $aPenghasilanRelatedByPenghasilanIdIbu;

    /**
     * @var        Pekerjaan
     */
    protected $aPekerjaanRelatedByPekerjaanIdWali;

    /**
     * @var        JenjangPendidikan
     */
    protected $aJenjangPendidikanRelatedByJenjangPendidikanWali;

    /**
     * @var        PropelObjectCollection|AnggotaPanitia[] Collection to store aggregation of AnggotaPanitia objects.
     */
    protected $collAnggotaPanitias;
    protected $collAnggotaPanitiasPartial;

    /**
     * @var        PropelObjectCollection|AnggotaRombel[] Collection to store aggregation of AnggotaRombel objects.
     */
    protected $collAnggotaRombels;
    protected $collAnggotaRombelsPartial;

    /**
     * @var        PropelObjectCollection|BeasiswaPesertaDidik[] Collection to store aggregation of BeasiswaPesertaDidik objects.
     */
    protected $collBeasiswaPesertaDidiks;
    protected $collBeasiswaPesertaDidiksPartial;

    /**
     * @var        PropelObjectCollection|KesejahteraanPd[] Collection to store aggregation of KesejahteraanPd objects.
     */
    protected $collKesejahteraanPds;
    protected $collKesejahteraanPdsPartial;

    /**
     * @var        PropelObjectCollection|KitasPd[] Collection to store aggregation of KitasPd objects.
     */
    protected $collKitasPds;
    protected $collKitasPdsPartial;

    /**
     * @var        PropelObjectCollection|PasporPd[] Collection to store aggregation of PasporPd objects.
     */
    protected $collPasporPds;
    protected $collPasporPdsPartial;

    /**
     * @var        PropelObjectCollection|PesertaDidikBaru[] Collection to store aggregation of PesertaDidikBaru objects.
     */
    protected $collPesertaDidikBarus;
    protected $collPesertaDidikBarusPartial;

    /**
     * @var        PropelObjectCollection|PesertaDidikLongitudinal[] Collection to store aggregation of PesertaDidikLongitudinal objects.
     */
    protected $collPesertaDidikLongitudinals;
    protected $collPesertaDidikLongitudinalsPartial;

    /**
     * @var        PropelObjectCollection|Prestasi[] Collection to store aggregation of Prestasi objects.
     */
    protected $collPrestasis;
    protected $collPrestasisPartial;

    /**
     * @var        PropelObjectCollection|RegistrasiPesertaDidik[] Collection to store aggregation of RegistrasiPesertaDidik objects.
     */
    protected $collRegistrasiPesertaDidiks;
    protected $collRegistrasiPesertaDidiksPartial;

    /**
     * @var        PropelObjectCollection|SertifikasiPd[] Collection to store aggregation of SertifikasiPd objects.
     */
    protected $collSertifikasiPds;
    protected $collSertifikasiPdsPartial;

    /**
     * @var        PropelObjectCollection|VldPesertaDidik[] Collection to store aggregation of VldPesertaDidik objects.
     */
    protected $collVldPesertaDidiks;
    protected $collVldPesertaDidiksPartial;

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
    protected $anggotaPanitiasScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $anggotaRombelsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $beasiswaPesertaDidiksScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $kesejahteraanPdsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $kitasPdsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $pasporPdsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $pesertaDidikBarusScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $pesertaDidikLongitudinalsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $prestasisScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $registrasiPesertaDidiksScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $sertifikasiPdsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $vldPesertaDidiksScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->layak_pip = '0';
        $this->create_date = '2021-06-07 11:49:57';
        $this->last_update = '2021-06-07 11:49:57';
        $this->last_sync = '1901-01-01 00:00:00';
    }

    /**
     * Initializes internal state of BasePesertaDidik object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [peserta_didik_id] column value.
     * 
     * @return string
     */
    public function getPesertaDidikId()
    {
        return $this->peserta_didik_id;
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
     * Get the [jenis_kelamin] column value.
     * 
     * @return string
     */
    public function getJenisKelamin()
    {
        return $this->jenis_kelamin;
    }

    /**
     * Get the [nisn] column value.
     * 
     * @return string
     */
    public function getNisn()
    {
        return $this->nisn;
    }

    /**
     * Get the [nik] column value.
     * 
     * @return string
     */
    public function getNik()
    {
        return $this->nik;
    }

    /**
     * Get the [no_kk] column value.
     * 
     * @return string
     */
    public function getNoKk()
    {
        return $this->no_kk;
    }

    /**
     * Get the [tempat_lahir] column value.
     * 
     * @return string
     */
    public function getTempatLahir()
    {
        return $this->tempat_lahir;
    }

    /**
     * Get the [optionally formatted] temporal [tanggal_lahir] column value.
     * 
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getTanggalLahir($format = '%Y-%m-%d')
    {
        if ($this->tanggal_lahir === null) {
            return null;
        }


        try {
            $dt = new DateTime($this->tanggal_lahir);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->tanggal_lahir, true), $x);
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
     * Get the [agama_id] column value.
     * 
     * @return int
     */
    public function getAgamaId()
    {
        return $this->agama_id;
    }

    /**
     * Get the [kebutuhan_khusus_id] column value.
     * 
     * @return int
     */
    public function getKebutuhanKhususId()
    {
        return $this->kebutuhan_khusus_id;
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
     * Get the [kode_wilayah] column value.
     * 
     * @return string
     */
    public function getKodeWilayah()
    {
        return $this->kode_wilayah;
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
     * Get the [jenis_tinggal_id] column value.
     * 
     * @return string
     */
    public function getJenisTinggalId()
    {
        return $this->jenis_tinggal_id;
    }

    /**
     * Get the [alat_transportasi_id] column value.
     * 
     * @return string
     */
    public function getAlatTransportasiId()
    {
        return $this->alat_transportasi_id;
    }

    /**
     * Get the [nik_ayah] column value.
     * 
     * @return string
     */
    public function getNikAyah()
    {
        return $this->nik_ayah;
    }

    /**
     * Get the [nik_ibu] column value.
     * 
     * @return string
     */
    public function getNikIbu()
    {
        return $this->nik_ibu;
    }

    /**
     * Get the [anak_keberapa] column value.
     * 
     * @return string
     */
    public function getAnakKeberapa()
    {
        return $this->anak_keberapa;
    }

    /**
     * Get the [nik_wali] column value.
     * 
     * @return string
     */
    public function getNikWali()
    {
        return $this->nik_wali;
    }

    /**
     * Get the [nomor_telepon_rumah] column value.
     * 
     * @return string
     */
    public function getNomorTeleponRumah()
    {
        return $this->nomor_telepon_rumah;
    }

    /**
     * Get the [nomor_telepon_seluler] column value.
     * 
     * @return string
     */
    public function getNomorTeleponSeluler()
    {
        return $this->nomor_telepon_seluler;
    }

    /**
     * Get the [email] column value.
     * 
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Get the [penerima_kps] column value.
     * 
     * @return string
     */
    public function getPenerimaKps()
    {
        return $this->penerima_kps;
    }

    /**
     * Get the [no_kps] column value.
     * 
     * @return string
     */
    public function getNoKps()
    {
        return $this->no_kps;
    }

    /**
     * Get the [layak_pip] column value.
     * 
     * @return string
     */
    public function getLayakPip()
    {
        return $this->layak_pip;
    }

    /**
     * Get the [penerima_kip] column value.
     * 
     * @return string
     */
    public function getPenerimaKip()
    {
        return $this->penerima_kip;
    }

    /**
     * Get the [no_kip] column value.
     * 
     * @return string
     */
    public function getNoKip()
    {
        return $this->no_kip;
    }

    /**
     * Get the [nm_kip] column value.
     * 
     * @return string
     */
    public function getNmKip()
    {
        return $this->nm_kip;
    }

    /**
     * Get the [no_kks] column value.
     * 
     * @return string
     */
    public function getNoKks()
    {
        return $this->no_kks;
    }

    /**
     * Get the [reg_akta_lahir] column value.
     * 
     * @return string
     */
    public function getRegAktaLahir()
    {
        return $this->reg_akta_lahir;
    }

    /**
     * Get the [id_layak_pip] column value.
     * 
     * @return string
     */
    public function getIdLayakPip()
    {
        return $this->id_layak_pip;
    }

    /**
     * Get the [id_bank] column value.
     * 
     * @return string
     */
    public function getIdBank()
    {
        return $this->id_bank;
    }

    /**
     * Get the [rekening_bank] column value.
     * 
     * @return string
     */
    public function getRekeningBank()
    {
        return $this->rekening_bank;
    }

    /**
     * Get the [nama_kcp] column value.
     * 
     * @return string
     */
    public function getNamaKcp()
    {
        return $this->nama_kcp;
    }

    /**
     * Get the [rekening_atas_nama] column value.
     * 
     * @return string
     */
    public function getRekeningAtasNama()
    {
        return $this->rekening_atas_nama;
    }

    /**
     * Get the [status_data] column value.
     * 
     * @return int
     */
    public function getStatusData()
    {
        return $this->status_data;
    }

    /**
     * Get the [nama_ayah] column value.
     * 
     * @return string
     */
    public function getNamaAyah()
    {
        return $this->nama_ayah;
    }

    /**
     * Get the [tahun_lahir_ayah] column value.
     * 
     * @return string
     */
    public function getTahunLahirAyah()
    {
        return $this->tahun_lahir_ayah;
    }

    /**
     * Get the [jenjang_pendidikan_ayah] column value.
     * 
     * @return string
     */
    public function getJenjangPendidikanAyah()
    {
        return $this->jenjang_pendidikan_ayah;
    }

    /**
     * Get the [pekerjaan_id_ayah] column value.
     * 
     * @return int
     */
    public function getPekerjaanIdAyah()
    {
        return $this->pekerjaan_id_ayah;
    }

    /**
     * Get the [penghasilan_id_ayah] column value.
     * 
     * @return int
     */
    public function getPenghasilanIdAyah()
    {
        return $this->penghasilan_id_ayah;
    }

    /**
     * Get the [kebutuhan_khusus_id_ayah] column value.
     * 
     * @return int
     */
    public function getKebutuhanKhususIdAyah()
    {
        return $this->kebutuhan_khusus_id_ayah;
    }

    /**
     * Get the [nama_ibu_kandung] column value.
     * 
     * @return string
     */
    public function getNamaIbuKandung()
    {
        return $this->nama_ibu_kandung;
    }

    /**
     * Get the [tahun_lahir_ibu] column value.
     * 
     * @return string
     */
    public function getTahunLahirIbu()
    {
        return $this->tahun_lahir_ibu;
    }

    /**
     * Get the [jenjang_pendidikan_ibu] column value.
     * 
     * @return string
     */
    public function getJenjangPendidikanIbu()
    {
        return $this->jenjang_pendidikan_ibu;
    }

    /**
     * Get the [penghasilan_id_ibu] column value.
     * 
     * @return int
     */
    public function getPenghasilanIdIbu()
    {
        return $this->penghasilan_id_ibu;
    }

    /**
     * Get the [pekerjaan_id_ibu] column value.
     * 
     * @return int
     */
    public function getPekerjaanIdIbu()
    {
        return $this->pekerjaan_id_ibu;
    }

    /**
     * Get the [kebutuhan_khusus_id_ibu] column value.
     * 
     * @return int
     */
    public function getKebutuhanKhususIdIbu()
    {
        return $this->kebutuhan_khusus_id_ibu;
    }

    /**
     * Get the [nama_wali] column value.
     * 
     * @return string
     */
    public function getNamaWali()
    {
        return $this->nama_wali;
    }

    /**
     * Get the [tahun_lahir_wali] column value.
     * 
     * @return string
     */
    public function getTahunLahirWali()
    {
        return $this->tahun_lahir_wali;
    }

    /**
     * Get the [jenjang_pendidikan_wali] column value.
     * 
     * @return string
     */
    public function getJenjangPendidikanWali()
    {
        return $this->jenjang_pendidikan_wali;
    }

    /**
     * Get the [pekerjaan_id_wali] column value.
     * 
     * @return int
     */
    public function getPekerjaanIdWali()
    {
        return $this->pekerjaan_id_wali;
    }

    /**
     * Get the [penghasilan_id_wali] column value.
     * 
     * @return int
     */
    public function getPenghasilanIdWali()
    {
        return $this->penghasilan_id_wali;
    }

    /**
     * Get the [kewarganegaraan] column value.
     * 
     * @return string
     */
    public function getKewarganegaraan()
    {
        return $this->kewarganegaraan;
    }

    /**
     * Get the [pekerjaan_id] column value.
     * 
     * @return int
     */
    public function getPekerjaanId()
    {
        return $this->pekerjaan_id;
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
     * Set the value of [peserta_didik_id] column.
     * 
     * @param string $v new value
     * @return PesertaDidik The current object (for fluent API support)
     */
    public function setPesertaDidikId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->peserta_didik_id !== $v) {
            $this->peserta_didik_id = $v;
            $this->modifiedColumns[] = PesertaDidikPeer::PESERTA_DIDIK_ID;
        }


        return $this;
    } // setPesertaDidikId()

    /**
     * Set the value of [nama] column.
     * 
     * @param string $v new value
     * @return PesertaDidik The current object (for fluent API support)
     */
    public function setNama($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nama !== $v) {
            $this->nama = $v;
            $this->modifiedColumns[] = PesertaDidikPeer::NAMA;
        }


        return $this;
    } // setNama()

    /**
     * Set the value of [jenis_kelamin] column.
     * 
     * @param string $v new value
     * @return PesertaDidik The current object (for fluent API support)
     */
    public function setJenisKelamin($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->jenis_kelamin !== $v) {
            $this->jenis_kelamin = $v;
            $this->modifiedColumns[] = PesertaDidikPeer::JENIS_KELAMIN;
        }


        return $this;
    } // setJenisKelamin()

    /**
     * Set the value of [nisn] column.
     * 
     * @param string $v new value
     * @return PesertaDidik The current object (for fluent API support)
     */
    public function setNisn($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nisn !== $v) {
            $this->nisn = $v;
            $this->modifiedColumns[] = PesertaDidikPeer::NISN;
        }


        return $this;
    } // setNisn()

    /**
     * Set the value of [nik] column.
     * 
     * @param string $v new value
     * @return PesertaDidik The current object (for fluent API support)
     */
    public function setNik($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nik !== $v) {
            $this->nik = $v;
            $this->modifiedColumns[] = PesertaDidikPeer::NIK;
        }


        return $this;
    } // setNik()

    /**
     * Set the value of [no_kk] column.
     * 
     * @param string $v new value
     * @return PesertaDidik The current object (for fluent API support)
     */
    public function setNoKk($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->no_kk !== $v) {
            $this->no_kk = $v;
            $this->modifiedColumns[] = PesertaDidikPeer::NO_KK;
        }


        return $this;
    } // setNoKk()

    /**
     * Set the value of [tempat_lahir] column.
     * 
     * @param string $v new value
     * @return PesertaDidik The current object (for fluent API support)
     */
    public function setTempatLahir($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->tempat_lahir !== $v) {
            $this->tempat_lahir = $v;
            $this->modifiedColumns[] = PesertaDidikPeer::TEMPAT_LAHIR;
        }


        return $this;
    } // setTempatLahir()

    /**
     * Sets the value of [tanggal_lahir] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return PesertaDidik The current object (for fluent API support)
     */
    public function setTanggalLahir($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->tanggal_lahir !== null || $dt !== null) {
            $currentDateAsString = ($this->tanggal_lahir !== null && $tmpDt = new DateTime($this->tanggal_lahir)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->tanggal_lahir = $newDateAsString;
                $this->modifiedColumns[] = PesertaDidikPeer::TANGGAL_LAHIR;
            }
        } // if either are not null


        return $this;
    } // setTanggalLahir()

    /**
     * Set the value of [agama_id] column.
     * 
     * @param int $v new value
     * @return PesertaDidik The current object (for fluent API support)
     */
    public function setAgamaId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->agama_id !== $v) {
            $this->agama_id = $v;
            $this->modifiedColumns[] = PesertaDidikPeer::AGAMA_ID;
        }

        if ($this->aAgama !== null && $this->aAgama->getAgamaId() !== $v) {
            $this->aAgama = null;
        }


        return $this;
    } // setAgamaId()

    /**
     * Set the value of [kebutuhan_khusus_id] column.
     * 
     * @param int $v new value
     * @return PesertaDidik The current object (for fluent API support)
     */
    public function setKebutuhanKhususId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->kebutuhan_khusus_id !== $v) {
            $this->kebutuhan_khusus_id = $v;
            $this->modifiedColumns[] = PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID;
        }

        if ($this->aKebutuhanKhususRelatedByKebutuhanKhususId !== null && $this->aKebutuhanKhususRelatedByKebutuhanKhususId->getKebutuhanKhususId() !== $v) {
            $this->aKebutuhanKhususRelatedByKebutuhanKhususId = null;
        }


        return $this;
    } // setKebutuhanKhususId()

    /**
     * Set the value of [alamat_jalan] column.
     * 
     * @param string $v new value
     * @return PesertaDidik The current object (for fluent API support)
     */
    public function setAlamatJalan($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->alamat_jalan !== $v) {
            $this->alamat_jalan = $v;
            $this->modifiedColumns[] = PesertaDidikPeer::ALAMAT_JALAN;
        }


        return $this;
    } // setAlamatJalan()

    /**
     * Set the value of [rt] column.
     * 
     * @param string $v new value
     * @return PesertaDidik The current object (for fluent API support)
     */
    public function setRt($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->rt !== $v) {
            $this->rt = $v;
            $this->modifiedColumns[] = PesertaDidikPeer::RT;
        }


        return $this;
    } // setRt()

    /**
     * Set the value of [rw] column.
     * 
     * @param string $v new value
     * @return PesertaDidik The current object (for fluent API support)
     */
    public function setRw($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->rw !== $v) {
            $this->rw = $v;
            $this->modifiedColumns[] = PesertaDidikPeer::RW;
        }


        return $this;
    } // setRw()

    /**
     * Set the value of [nama_dusun] column.
     * 
     * @param string $v new value
     * @return PesertaDidik The current object (for fluent API support)
     */
    public function setNamaDusun($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nama_dusun !== $v) {
            $this->nama_dusun = $v;
            $this->modifiedColumns[] = PesertaDidikPeer::NAMA_DUSUN;
        }


        return $this;
    } // setNamaDusun()

    /**
     * Set the value of [desa_kelurahan] column.
     * 
     * @param string $v new value
     * @return PesertaDidik The current object (for fluent API support)
     */
    public function setDesaKelurahan($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->desa_kelurahan !== $v) {
            $this->desa_kelurahan = $v;
            $this->modifiedColumns[] = PesertaDidikPeer::DESA_KELURAHAN;
        }


        return $this;
    } // setDesaKelurahan()

    /**
     * Set the value of [kode_wilayah] column.
     * 
     * @param string $v new value
     * @return PesertaDidik The current object (for fluent API support)
     */
    public function setKodeWilayah($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->kode_wilayah !== $v) {
            $this->kode_wilayah = $v;
            $this->modifiedColumns[] = PesertaDidikPeer::KODE_WILAYAH;
        }

        if ($this->aMstWilayah !== null && $this->aMstWilayah->getKodeWilayah() !== $v) {
            $this->aMstWilayah = null;
        }


        return $this;
    } // setKodeWilayah()

    /**
     * Set the value of [kode_pos] column.
     * 
     * @param string $v new value
     * @return PesertaDidik The current object (for fluent API support)
     */
    public function setKodePos($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->kode_pos !== $v) {
            $this->kode_pos = $v;
            $this->modifiedColumns[] = PesertaDidikPeer::KODE_POS;
        }


        return $this;
    } // setKodePos()

    /**
     * Set the value of [lintang] column.
     * 
     * @param string $v new value
     * @return PesertaDidik The current object (for fluent API support)
     */
    public function setLintang($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->lintang !== $v) {
            $this->lintang = $v;
            $this->modifiedColumns[] = PesertaDidikPeer::LINTANG;
        }


        return $this;
    } // setLintang()

    /**
     * Set the value of [bujur] column.
     * 
     * @param string $v new value
     * @return PesertaDidik The current object (for fluent API support)
     */
    public function setBujur($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->bujur !== $v) {
            $this->bujur = $v;
            $this->modifiedColumns[] = PesertaDidikPeer::BUJUR;
        }


        return $this;
    } // setBujur()

    /**
     * Set the value of [jenis_tinggal_id] column.
     * 
     * @param string $v new value
     * @return PesertaDidik The current object (for fluent API support)
     */
    public function setJenisTinggalId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->jenis_tinggal_id !== $v) {
            $this->jenis_tinggal_id = $v;
            $this->modifiedColumns[] = PesertaDidikPeer::JENIS_TINGGAL_ID;
        }

        if ($this->aJenisTinggal !== null && $this->aJenisTinggal->getJenisTinggalId() !== $v) {
            $this->aJenisTinggal = null;
        }


        return $this;
    } // setJenisTinggalId()

    /**
     * Set the value of [alat_transportasi_id] column.
     * 
     * @param string $v new value
     * @return PesertaDidik The current object (for fluent API support)
     */
    public function setAlatTransportasiId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->alat_transportasi_id !== $v) {
            $this->alat_transportasi_id = $v;
            $this->modifiedColumns[] = PesertaDidikPeer::ALAT_TRANSPORTASI_ID;
        }

        if ($this->aAlatTransportasi !== null && $this->aAlatTransportasi->getAlatTransportasiId() !== $v) {
            $this->aAlatTransportasi = null;
        }


        return $this;
    } // setAlatTransportasiId()

    /**
     * Set the value of [nik_ayah] column.
     * 
     * @param string $v new value
     * @return PesertaDidik The current object (for fluent API support)
     */
    public function setNikAyah($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nik_ayah !== $v) {
            $this->nik_ayah = $v;
            $this->modifiedColumns[] = PesertaDidikPeer::NIK_AYAH;
        }


        return $this;
    } // setNikAyah()

    /**
     * Set the value of [nik_ibu] column.
     * 
     * @param string $v new value
     * @return PesertaDidik The current object (for fluent API support)
     */
    public function setNikIbu($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nik_ibu !== $v) {
            $this->nik_ibu = $v;
            $this->modifiedColumns[] = PesertaDidikPeer::NIK_IBU;
        }


        return $this;
    } // setNikIbu()

    /**
     * Set the value of [anak_keberapa] column.
     * 
     * @param string $v new value
     * @return PesertaDidik The current object (for fluent API support)
     */
    public function setAnakKeberapa($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->anak_keberapa !== $v) {
            $this->anak_keberapa = $v;
            $this->modifiedColumns[] = PesertaDidikPeer::ANAK_KEBERAPA;
        }


        return $this;
    } // setAnakKeberapa()

    /**
     * Set the value of [nik_wali] column.
     * 
     * @param string $v new value
     * @return PesertaDidik The current object (for fluent API support)
     */
    public function setNikWali($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nik_wali !== $v) {
            $this->nik_wali = $v;
            $this->modifiedColumns[] = PesertaDidikPeer::NIK_WALI;
        }


        return $this;
    } // setNikWali()

    /**
     * Set the value of [nomor_telepon_rumah] column.
     * 
     * @param string $v new value
     * @return PesertaDidik The current object (for fluent API support)
     */
    public function setNomorTeleponRumah($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nomor_telepon_rumah !== $v) {
            $this->nomor_telepon_rumah = $v;
            $this->modifiedColumns[] = PesertaDidikPeer::NOMOR_TELEPON_RUMAH;
        }


        return $this;
    } // setNomorTeleponRumah()

    /**
     * Set the value of [nomor_telepon_seluler] column.
     * 
     * @param string $v new value
     * @return PesertaDidik The current object (for fluent API support)
     */
    public function setNomorTeleponSeluler($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nomor_telepon_seluler !== $v) {
            $this->nomor_telepon_seluler = $v;
            $this->modifiedColumns[] = PesertaDidikPeer::NOMOR_TELEPON_SELULER;
        }


        return $this;
    } // setNomorTeleponSeluler()

    /**
     * Set the value of [email] column.
     * 
     * @param string $v new value
     * @return PesertaDidik The current object (for fluent API support)
     */
    public function setEmail($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->email !== $v) {
            $this->email = $v;
            $this->modifiedColumns[] = PesertaDidikPeer::EMAIL;
        }


        return $this;
    } // setEmail()

    /**
     * Set the value of [penerima_kps] column.
     * 
     * @param string $v new value
     * @return PesertaDidik The current object (for fluent API support)
     */
    public function setPenerimaKps($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->penerima_kps !== $v) {
            $this->penerima_kps = $v;
            $this->modifiedColumns[] = PesertaDidikPeer::PENERIMA_KPS;
        }


        return $this;
    } // setPenerimaKps()

    /**
     * Set the value of [no_kps] column.
     * 
     * @param string $v new value
     * @return PesertaDidik The current object (for fluent API support)
     */
    public function setNoKps($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->no_kps !== $v) {
            $this->no_kps = $v;
            $this->modifiedColumns[] = PesertaDidikPeer::NO_KPS;
        }


        return $this;
    } // setNoKps()

    /**
     * Set the value of [layak_pip] column.
     * 
     * @param string $v new value
     * @return PesertaDidik The current object (for fluent API support)
     */
    public function setLayakPip($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->layak_pip !== $v) {
            $this->layak_pip = $v;
            $this->modifiedColumns[] = PesertaDidikPeer::LAYAK_PIP;
        }


        return $this;
    } // setLayakPip()

    /**
     * Set the value of [penerima_kip] column.
     * 
     * @param string $v new value
     * @return PesertaDidik The current object (for fluent API support)
     */
    public function setPenerimaKip($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->penerima_kip !== $v) {
            $this->penerima_kip = $v;
            $this->modifiedColumns[] = PesertaDidikPeer::PENERIMA_KIP;
        }


        return $this;
    } // setPenerimaKip()

    /**
     * Set the value of [no_kip] column.
     * 
     * @param string $v new value
     * @return PesertaDidik The current object (for fluent API support)
     */
    public function setNoKip($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->no_kip !== $v) {
            $this->no_kip = $v;
            $this->modifiedColumns[] = PesertaDidikPeer::NO_KIP;
        }


        return $this;
    } // setNoKip()

    /**
     * Set the value of [nm_kip] column.
     * 
     * @param string $v new value
     * @return PesertaDidik The current object (for fluent API support)
     */
    public function setNmKip($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nm_kip !== $v) {
            $this->nm_kip = $v;
            $this->modifiedColumns[] = PesertaDidikPeer::NM_KIP;
        }


        return $this;
    } // setNmKip()

    /**
     * Set the value of [no_kks] column.
     * 
     * @param string $v new value
     * @return PesertaDidik The current object (for fluent API support)
     */
    public function setNoKks($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->no_kks !== $v) {
            $this->no_kks = $v;
            $this->modifiedColumns[] = PesertaDidikPeer::NO_KKS;
        }


        return $this;
    } // setNoKks()

    /**
     * Set the value of [reg_akta_lahir] column.
     * 
     * @param string $v new value
     * @return PesertaDidik The current object (for fluent API support)
     */
    public function setRegAktaLahir($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->reg_akta_lahir !== $v) {
            $this->reg_akta_lahir = $v;
            $this->modifiedColumns[] = PesertaDidikPeer::REG_AKTA_LAHIR;
        }


        return $this;
    } // setRegAktaLahir()

    /**
     * Set the value of [id_layak_pip] column.
     * 
     * @param string $v new value
     * @return PesertaDidik The current object (for fluent API support)
     */
    public function setIdLayakPip($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->id_layak_pip !== $v) {
            $this->id_layak_pip = $v;
            $this->modifiedColumns[] = PesertaDidikPeer::ID_LAYAK_PIP;
        }

        if ($this->aAlasanLayakPip !== null && $this->aAlasanLayakPip->getIdLayakPip() !== $v) {
            $this->aAlasanLayakPip = null;
        }


        return $this;
    } // setIdLayakPip()

    /**
     * Set the value of [id_bank] column.
     * 
     * @param string $v new value
     * @return PesertaDidik The current object (for fluent API support)
     */
    public function setIdBank($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->id_bank !== $v) {
            $this->id_bank = $v;
            $this->modifiedColumns[] = PesertaDidikPeer::ID_BANK;
        }

        if ($this->aBank !== null && $this->aBank->getIdBank() !== $v) {
            $this->aBank = null;
        }


        return $this;
    } // setIdBank()

    /**
     * Set the value of [rekening_bank] column.
     * 
     * @param string $v new value
     * @return PesertaDidik The current object (for fluent API support)
     */
    public function setRekeningBank($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->rekening_bank !== $v) {
            $this->rekening_bank = $v;
            $this->modifiedColumns[] = PesertaDidikPeer::REKENING_BANK;
        }


        return $this;
    } // setRekeningBank()

    /**
     * Set the value of [nama_kcp] column.
     * 
     * @param string $v new value
     * @return PesertaDidik The current object (for fluent API support)
     */
    public function setNamaKcp($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nama_kcp !== $v) {
            $this->nama_kcp = $v;
            $this->modifiedColumns[] = PesertaDidikPeer::NAMA_KCP;
        }


        return $this;
    } // setNamaKcp()

    /**
     * Set the value of [rekening_atas_nama] column.
     * 
     * @param string $v new value
     * @return PesertaDidik The current object (for fluent API support)
     */
    public function setRekeningAtasNama($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->rekening_atas_nama !== $v) {
            $this->rekening_atas_nama = $v;
            $this->modifiedColumns[] = PesertaDidikPeer::REKENING_ATAS_NAMA;
        }


        return $this;
    } // setRekeningAtasNama()

    /**
     * Set the value of [status_data] column.
     * 
     * @param int $v new value
     * @return PesertaDidik The current object (for fluent API support)
     */
    public function setStatusData($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->status_data !== $v) {
            $this->status_data = $v;
            $this->modifiedColumns[] = PesertaDidikPeer::STATUS_DATA;
        }


        return $this;
    } // setStatusData()

    /**
     * Set the value of [nama_ayah] column.
     * 
     * @param string $v new value
     * @return PesertaDidik The current object (for fluent API support)
     */
    public function setNamaAyah($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nama_ayah !== $v) {
            $this->nama_ayah = $v;
            $this->modifiedColumns[] = PesertaDidikPeer::NAMA_AYAH;
        }


        return $this;
    } // setNamaAyah()

    /**
     * Set the value of [tahun_lahir_ayah] column.
     * 
     * @param string $v new value
     * @return PesertaDidik The current object (for fluent API support)
     */
    public function setTahunLahirAyah($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->tahun_lahir_ayah !== $v) {
            $this->tahun_lahir_ayah = $v;
            $this->modifiedColumns[] = PesertaDidikPeer::TAHUN_LAHIR_AYAH;
        }


        return $this;
    } // setTahunLahirAyah()

    /**
     * Set the value of [jenjang_pendidikan_ayah] column.
     * 
     * @param string $v new value
     * @return PesertaDidik The current object (for fluent API support)
     */
    public function setJenjangPendidikanAyah($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->jenjang_pendidikan_ayah !== $v) {
            $this->jenjang_pendidikan_ayah = $v;
            $this->modifiedColumns[] = PesertaDidikPeer::JENJANG_PENDIDIKAN_AYAH;
        }

        if ($this->aJenjangPendidikanRelatedByJenjangPendidikanAyah !== null && $this->aJenjangPendidikanRelatedByJenjangPendidikanAyah->getJenjangPendidikanId() !== $v) {
            $this->aJenjangPendidikanRelatedByJenjangPendidikanAyah = null;
        }


        return $this;
    } // setJenjangPendidikanAyah()

    /**
     * Set the value of [pekerjaan_id_ayah] column.
     * 
     * @param int $v new value
     * @return PesertaDidik The current object (for fluent API support)
     */
    public function setPekerjaanIdAyah($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->pekerjaan_id_ayah !== $v) {
            $this->pekerjaan_id_ayah = $v;
            $this->modifiedColumns[] = PesertaDidikPeer::PEKERJAAN_ID_AYAH;
        }

        if ($this->aPekerjaanRelatedByPekerjaanIdAyah !== null && $this->aPekerjaanRelatedByPekerjaanIdAyah->getPekerjaanId() !== $v) {
            $this->aPekerjaanRelatedByPekerjaanIdAyah = null;
        }


        return $this;
    } // setPekerjaanIdAyah()

    /**
     * Set the value of [penghasilan_id_ayah] column.
     * 
     * @param int $v new value
     * @return PesertaDidik The current object (for fluent API support)
     */
    public function setPenghasilanIdAyah($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->penghasilan_id_ayah !== $v) {
            $this->penghasilan_id_ayah = $v;
            $this->modifiedColumns[] = PesertaDidikPeer::PENGHASILAN_ID_AYAH;
        }

        if ($this->aPenghasilanRelatedByPenghasilanIdAyah !== null && $this->aPenghasilanRelatedByPenghasilanIdAyah->getPenghasilanId() !== $v) {
            $this->aPenghasilanRelatedByPenghasilanIdAyah = null;
        }


        return $this;
    } // setPenghasilanIdAyah()

    /**
     * Set the value of [kebutuhan_khusus_id_ayah] column.
     * 
     * @param int $v new value
     * @return PesertaDidik The current object (for fluent API support)
     */
    public function setKebutuhanKhususIdAyah($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->kebutuhan_khusus_id_ayah !== $v) {
            $this->kebutuhan_khusus_id_ayah = $v;
            $this->modifiedColumns[] = PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID_AYAH;
        }

        if ($this->aKebutuhanKhususRelatedByKebutuhanKhususIdAyah !== null && $this->aKebutuhanKhususRelatedByKebutuhanKhususIdAyah->getKebutuhanKhususId() !== $v) {
            $this->aKebutuhanKhususRelatedByKebutuhanKhususIdAyah = null;
        }


        return $this;
    } // setKebutuhanKhususIdAyah()

    /**
     * Set the value of [nama_ibu_kandung] column.
     * 
     * @param string $v new value
     * @return PesertaDidik The current object (for fluent API support)
     */
    public function setNamaIbuKandung($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nama_ibu_kandung !== $v) {
            $this->nama_ibu_kandung = $v;
            $this->modifiedColumns[] = PesertaDidikPeer::NAMA_IBU_KANDUNG;
        }


        return $this;
    } // setNamaIbuKandung()

    /**
     * Set the value of [tahun_lahir_ibu] column.
     * 
     * @param string $v new value
     * @return PesertaDidik The current object (for fluent API support)
     */
    public function setTahunLahirIbu($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->tahun_lahir_ibu !== $v) {
            $this->tahun_lahir_ibu = $v;
            $this->modifiedColumns[] = PesertaDidikPeer::TAHUN_LAHIR_IBU;
        }


        return $this;
    } // setTahunLahirIbu()

    /**
     * Set the value of [jenjang_pendidikan_ibu] column.
     * 
     * @param string $v new value
     * @return PesertaDidik The current object (for fluent API support)
     */
    public function setJenjangPendidikanIbu($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->jenjang_pendidikan_ibu !== $v) {
            $this->jenjang_pendidikan_ibu = $v;
            $this->modifiedColumns[] = PesertaDidikPeer::JENJANG_PENDIDIKAN_IBU;
        }

        if ($this->aJenjangPendidikanRelatedByJenjangPendidikanIbu !== null && $this->aJenjangPendidikanRelatedByJenjangPendidikanIbu->getJenjangPendidikanId() !== $v) {
            $this->aJenjangPendidikanRelatedByJenjangPendidikanIbu = null;
        }


        return $this;
    } // setJenjangPendidikanIbu()

    /**
     * Set the value of [penghasilan_id_ibu] column.
     * 
     * @param int $v new value
     * @return PesertaDidik The current object (for fluent API support)
     */
    public function setPenghasilanIdIbu($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->penghasilan_id_ibu !== $v) {
            $this->penghasilan_id_ibu = $v;
            $this->modifiedColumns[] = PesertaDidikPeer::PENGHASILAN_ID_IBU;
        }

        if ($this->aPenghasilanRelatedByPenghasilanIdIbu !== null && $this->aPenghasilanRelatedByPenghasilanIdIbu->getPenghasilanId() !== $v) {
            $this->aPenghasilanRelatedByPenghasilanIdIbu = null;
        }


        return $this;
    } // setPenghasilanIdIbu()

    /**
     * Set the value of [pekerjaan_id_ibu] column.
     * 
     * @param int $v new value
     * @return PesertaDidik The current object (for fluent API support)
     */
    public function setPekerjaanIdIbu($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->pekerjaan_id_ibu !== $v) {
            $this->pekerjaan_id_ibu = $v;
            $this->modifiedColumns[] = PesertaDidikPeer::PEKERJAAN_ID_IBU;
        }

        if ($this->aPekerjaanRelatedByPekerjaanIdIbu !== null && $this->aPekerjaanRelatedByPekerjaanIdIbu->getPekerjaanId() !== $v) {
            $this->aPekerjaanRelatedByPekerjaanIdIbu = null;
        }


        return $this;
    } // setPekerjaanIdIbu()

    /**
     * Set the value of [kebutuhan_khusus_id_ibu] column.
     * 
     * @param int $v new value
     * @return PesertaDidik The current object (for fluent API support)
     */
    public function setKebutuhanKhususIdIbu($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->kebutuhan_khusus_id_ibu !== $v) {
            $this->kebutuhan_khusus_id_ibu = $v;
            $this->modifiedColumns[] = PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID_IBU;
        }

        if ($this->aKebutuhanKhususRelatedByKebutuhanKhususIdIbu !== null && $this->aKebutuhanKhususRelatedByKebutuhanKhususIdIbu->getKebutuhanKhususId() !== $v) {
            $this->aKebutuhanKhususRelatedByKebutuhanKhususIdIbu = null;
        }


        return $this;
    } // setKebutuhanKhususIdIbu()

    /**
     * Set the value of [nama_wali] column.
     * 
     * @param string $v new value
     * @return PesertaDidik The current object (for fluent API support)
     */
    public function setNamaWali($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nama_wali !== $v) {
            $this->nama_wali = $v;
            $this->modifiedColumns[] = PesertaDidikPeer::NAMA_WALI;
        }


        return $this;
    } // setNamaWali()

    /**
     * Set the value of [tahun_lahir_wali] column.
     * 
     * @param string $v new value
     * @return PesertaDidik The current object (for fluent API support)
     */
    public function setTahunLahirWali($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->tahun_lahir_wali !== $v) {
            $this->tahun_lahir_wali = $v;
            $this->modifiedColumns[] = PesertaDidikPeer::TAHUN_LAHIR_WALI;
        }


        return $this;
    } // setTahunLahirWali()

    /**
     * Set the value of [jenjang_pendidikan_wali] column.
     * 
     * @param string $v new value
     * @return PesertaDidik The current object (for fluent API support)
     */
    public function setJenjangPendidikanWali($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->jenjang_pendidikan_wali !== $v) {
            $this->jenjang_pendidikan_wali = $v;
            $this->modifiedColumns[] = PesertaDidikPeer::JENJANG_PENDIDIKAN_WALI;
        }

        if ($this->aJenjangPendidikanRelatedByJenjangPendidikanWali !== null && $this->aJenjangPendidikanRelatedByJenjangPendidikanWali->getJenjangPendidikanId() !== $v) {
            $this->aJenjangPendidikanRelatedByJenjangPendidikanWali = null;
        }


        return $this;
    } // setJenjangPendidikanWali()

    /**
     * Set the value of [pekerjaan_id_wali] column.
     * 
     * @param int $v new value
     * @return PesertaDidik The current object (for fluent API support)
     */
    public function setPekerjaanIdWali($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->pekerjaan_id_wali !== $v) {
            $this->pekerjaan_id_wali = $v;
            $this->modifiedColumns[] = PesertaDidikPeer::PEKERJAAN_ID_WALI;
        }

        if ($this->aPekerjaanRelatedByPekerjaanIdWali !== null && $this->aPekerjaanRelatedByPekerjaanIdWali->getPekerjaanId() !== $v) {
            $this->aPekerjaanRelatedByPekerjaanIdWali = null;
        }


        return $this;
    } // setPekerjaanIdWali()

    /**
     * Set the value of [penghasilan_id_wali] column.
     * 
     * @param int $v new value
     * @return PesertaDidik The current object (for fluent API support)
     */
    public function setPenghasilanIdWali($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->penghasilan_id_wali !== $v) {
            $this->penghasilan_id_wali = $v;
            $this->modifiedColumns[] = PesertaDidikPeer::PENGHASILAN_ID_WALI;
        }

        if ($this->aPenghasilanRelatedByPenghasilanIdWali !== null && $this->aPenghasilanRelatedByPenghasilanIdWali->getPenghasilanId() !== $v) {
            $this->aPenghasilanRelatedByPenghasilanIdWali = null;
        }


        return $this;
    } // setPenghasilanIdWali()

    /**
     * Set the value of [kewarganegaraan] column.
     * 
     * @param string $v new value
     * @return PesertaDidik The current object (for fluent API support)
     */
    public function setKewarganegaraan($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->kewarganegaraan !== $v) {
            $this->kewarganegaraan = $v;
            $this->modifiedColumns[] = PesertaDidikPeer::KEWARGANEGARAAN;
        }

        if ($this->aNegara !== null && $this->aNegara->getNegaraId() !== $v) {
            $this->aNegara = null;
        }


        return $this;
    } // setKewarganegaraan()

    /**
     * Set the value of [pekerjaan_id] column.
     * 
     * @param int $v new value
     * @return PesertaDidik The current object (for fluent API support)
     */
    public function setPekerjaanId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->pekerjaan_id !== $v) {
            $this->pekerjaan_id = $v;
            $this->modifiedColumns[] = PesertaDidikPeer::PEKERJAAN_ID;
        }

        if ($this->aPekerjaanRelatedByPekerjaanId !== null && $this->aPekerjaanRelatedByPekerjaanId->getPekerjaanId() !== $v) {
            $this->aPekerjaanRelatedByPekerjaanId = null;
        }


        return $this;
    } // setPekerjaanId()

    /**
     * Sets the value of [create_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return PesertaDidik The current object (for fluent API support)
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
                $this->modifiedColumns[] = PesertaDidikPeer::CREATE_DATE;
            }
        } // if either are not null


        return $this;
    } // setCreateDate()

    /**
     * Sets the value of [last_update] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return PesertaDidik The current object (for fluent API support)
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
                $this->modifiedColumns[] = PesertaDidikPeer::LAST_UPDATE;
            }
        } // if either are not null


        return $this;
    } // setLastUpdate()

    /**
     * Set the value of [soft_delete] column.
     * 
     * @param string $v new value
     * @return PesertaDidik The current object (for fluent API support)
     */
    public function setSoftDelete($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->soft_delete !== $v) {
            $this->soft_delete = $v;
            $this->modifiedColumns[] = PesertaDidikPeer::SOFT_DELETE;
        }


        return $this;
    } // setSoftDelete()

    /**
     * Sets the value of [last_sync] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return PesertaDidik The current object (for fluent API support)
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
                $this->modifiedColumns[] = PesertaDidikPeer::LAST_SYNC;
            }
        } // if either are not null


        return $this;
    } // setLastSync()

    /**
     * Set the value of [updater_id] column.
     * 
     * @param string $v new value
     * @return PesertaDidik The current object (for fluent API support)
     */
    public function setUpdaterId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->updater_id !== $v) {
            $this->updater_id = $v;
            $this->modifiedColumns[] = PesertaDidikPeer::UPDATER_ID;
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
            if ($this->layak_pip !== '0') {
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

            $this->peserta_didik_id = ($row[$startcol + 0] !== null) ? (string) $row[$startcol + 0] : null;
            $this->nama = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->jenis_kelamin = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->nisn = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->nik = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->no_kk = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->tempat_lahir = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->tanggal_lahir = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->agama_id = ($row[$startcol + 8] !== null) ? (int) $row[$startcol + 8] : null;
            $this->kebutuhan_khusus_id = ($row[$startcol + 9] !== null) ? (int) $row[$startcol + 9] : null;
            $this->alamat_jalan = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
            $this->rt = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
            $this->rw = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
            $this->nama_dusun = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
            $this->desa_kelurahan = ($row[$startcol + 14] !== null) ? (string) $row[$startcol + 14] : null;
            $this->kode_wilayah = ($row[$startcol + 15] !== null) ? (string) $row[$startcol + 15] : null;
            $this->kode_pos = ($row[$startcol + 16] !== null) ? (string) $row[$startcol + 16] : null;
            $this->lintang = ($row[$startcol + 17] !== null) ? (string) $row[$startcol + 17] : null;
            $this->bujur = ($row[$startcol + 18] !== null) ? (string) $row[$startcol + 18] : null;
            $this->jenis_tinggal_id = ($row[$startcol + 19] !== null) ? (string) $row[$startcol + 19] : null;
            $this->alat_transportasi_id = ($row[$startcol + 20] !== null) ? (string) $row[$startcol + 20] : null;
            $this->nik_ayah = ($row[$startcol + 21] !== null) ? (string) $row[$startcol + 21] : null;
            $this->nik_ibu = ($row[$startcol + 22] !== null) ? (string) $row[$startcol + 22] : null;
            $this->anak_keberapa = ($row[$startcol + 23] !== null) ? (string) $row[$startcol + 23] : null;
            $this->nik_wali = ($row[$startcol + 24] !== null) ? (string) $row[$startcol + 24] : null;
            $this->nomor_telepon_rumah = ($row[$startcol + 25] !== null) ? (string) $row[$startcol + 25] : null;
            $this->nomor_telepon_seluler = ($row[$startcol + 26] !== null) ? (string) $row[$startcol + 26] : null;
            $this->email = ($row[$startcol + 27] !== null) ? (string) $row[$startcol + 27] : null;
            $this->penerima_kps = ($row[$startcol + 28] !== null) ? (string) $row[$startcol + 28] : null;
            $this->no_kps = ($row[$startcol + 29] !== null) ? (string) $row[$startcol + 29] : null;
            $this->layak_pip = ($row[$startcol + 30] !== null) ? (string) $row[$startcol + 30] : null;
            $this->penerima_kip = ($row[$startcol + 31] !== null) ? (string) $row[$startcol + 31] : null;
            $this->no_kip = ($row[$startcol + 32] !== null) ? (string) $row[$startcol + 32] : null;
            $this->nm_kip = ($row[$startcol + 33] !== null) ? (string) $row[$startcol + 33] : null;
            $this->no_kks = ($row[$startcol + 34] !== null) ? (string) $row[$startcol + 34] : null;
            $this->reg_akta_lahir = ($row[$startcol + 35] !== null) ? (string) $row[$startcol + 35] : null;
            $this->id_layak_pip = ($row[$startcol + 36] !== null) ? (string) $row[$startcol + 36] : null;
            $this->id_bank = ($row[$startcol + 37] !== null) ? (string) $row[$startcol + 37] : null;
            $this->rekening_bank = ($row[$startcol + 38] !== null) ? (string) $row[$startcol + 38] : null;
            $this->nama_kcp = ($row[$startcol + 39] !== null) ? (string) $row[$startcol + 39] : null;
            $this->rekening_atas_nama = ($row[$startcol + 40] !== null) ? (string) $row[$startcol + 40] : null;
            $this->status_data = ($row[$startcol + 41] !== null) ? (int) $row[$startcol + 41] : null;
            $this->nama_ayah = ($row[$startcol + 42] !== null) ? (string) $row[$startcol + 42] : null;
            $this->tahun_lahir_ayah = ($row[$startcol + 43] !== null) ? (string) $row[$startcol + 43] : null;
            $this->jenjang_pendidikan_ayah = ($row[$startcol + 44] !== null) ? (string) $row[$startcol + 44] : null;
            $this->pekerjaan_id_ayah = ($row[$startcol + 45] !== null) ? (int) $row[$startcol + 45] : null;
            $this->penghasilan_id_ayah = ($row[$startcol + 46] !== null) ? (int) $row[$startcol + 46] : null;
            $this->kebutuhan_khusus_id_ayah = ($row[$startcol + 47] !== null) ? (int) $row[$startcol + 47] : null;
            $this->nama_ibu_kandung = ($row[$startcol + 48] !== null) ? (string) $row[$startcol + 48] : null;
            $this->tahun_lahir_ibu = ($row[$startcol + 49] !== null) ? (string) $row[$startcol + 49] : null;
            $this->jenjang_pendidikan_ibu = ($row[$startcol + 50] !== null) ? (string) $row[$startcol + 50] : null;
            $this->penghasilan_id_ibu = ($row[$startcol + 51] !== null) ? (int) $row[$startcol + 51] : null;
            $this->pekerjaan_id_ibu = ($row[$startcol + 52] !== null) ? (int) $row[$startcol + 52] : null;
            $this->kebutuhan_khusus_id_ibu = ($row[$startcol + 53] !== null) ? (int) $row[$startcol + 53] : null;
            $this->nama_wali = ($row[$startcol + 54] !== null) ? (string) $row[$startcol + 54] : null;
            $this->tahun_lahir_wali = ($row[$startcol + 55] !== null) ? (string) $row[$startcol + 55] : null;
            $this->jenjang_pendidikan_wali = ($row[$startcol + 56] !== null) ? (string) $row[$startcol + 56] : null;
            $this->pekerjaan_id_wali = ($row[$startcol + 57] !== null) ? (int) $row[$startcol + 57] : null;
            $this->penghasilan_id_wali = ($row[$startcol + 58] !== null) ? (int) $row[$startcol + 58] : null;
            $this->kewarganegaraan = ($row[$startcol + 59] !== null) ? (string) $row[$startcol + 59] : null;
            $this->pekerjaan_id = ($row[$startcol + 60] !== null) ? (int) $row[$startcol + 60] : null;
            $this->create_date = ($row[$startcol + 61] !== null) ? (string) $row[$startcol + 61] : null;
            $this->last_update = ($row[$startcol + 62] !== null) ? (string) $row[$startcol + 62] : null;
            $this->soft_delete = ($row[$startcol + 63] !== null) ? (string) $row[$startcol + 63] : null;
            $this->last_sync = ($row[$startcol + 64] !== null) ? (string) $row[$startcol + 64] : null;
            $this->updater_id = ($row[$startcol + 65] !== null) ? (string) $row[$startcol + 65] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 66; // 66 = PesertaDidikPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating PesertaDidik object", $e);
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

        if ($this->aAgama !== null && $this->agama_id !== $this->aAgama->getAgamaId()) {
            $this->aAgama = null;
        }
        if ($this->aKebutuhanKhususRelatedByKebutuhanKhususId !== null && $this->kebutuhan_khusus_id !== $this->aKebutuhanKhususRelatedByKebutuhanKhususId->getKebutuhanKhususId()) {
            $this->aKebutuhanKhususRelatedByKebutuhanKhususId = null;
        }
        if ($this->aMstWilayah !== null && $this->kode_wilayah !== $this->aMstWilayah->getKodeWilayah()) {
            $this->aMstWilayah = null;
        }
        if ($this->aJenisTinggal !== null && $this->jenis_tinggal_id !== $this->aJenisTinggal->getJenisTinggalId()) {
            $this->aJenisTinggal = null;
        }
        if ($this->aAlatTransportasi !== null && $this->alat_transportasi_id !== $this->aAlatTransportasi->getAlatTransportasiId()) {
            $this->aAlatTransportasi = null;
        }
        if ($this->aAlasanLayakPip !== null && $this->id_layak_pip !== $this->aAlasanLayakPip->getIdLayakPip()) {
            $this->aAlasanLayakPip = null;
        }
        if ($this->aBank !== null && $this->id_bank !== $this->aBank->getIdBank()) {
            $this->aBank = null;
        }
        if ($this->aJenjangPendidikanRelatedByJenjangPendidikanAyah !== null && $this->jenjang_pendidikan_ayah !== $this->aJenjangPendidikanRelatedByJenjangPendidikanAyah->getJenjangPendidikanId()) {
            $this->aJenjangPendidikanRelatedByJenjangPendidikanAyah = null;
        }
        if ($this->aPekerjaanRelatedByPekerjaanIdAyah !== null && $this->pekerjaan_id_ayah !== $this->aPekerjaanRelatedByPekerjaanIdAyah->getPekerjaanId()) {
            $this->aPekerjaanRelatedByPekerjaanIdAyah = null;
        }
        if ($this->aPenghasilanRelatedByPenghasilanIdAyah !== null && $this->penghasilan_id_ayah !== $this->aPenghasilanRelatedByPenghasilanIdAyah->getPenghasilanId()) {
            $this->aPenghasilanRelatedByPenghasilanIdAyah = null;
        }
        if ($this->aKebutuhanKhususRelatedByKebutuhanKhususIdAyah !== null && $this->kebutuhan_khusus_id_ayah !== $this->aKebutuhanKhususRelatedByKebutuhanKhususIdAyah->getKebutuhanKhususId()) {
            $this->aKebutuhanKhususRelatedByKebutuhanKhususIdAyah = null;
        }
        if ($this->aJenjangPendidikanRelatedByJenjangPendidikanIbu !== null && $this->jenjang_pendidikan_ibu !== $this->aJenjangPendidikanRelatedByJenjangPendidikanIbu->getJenjangPendidikanId()) {
            $this->aJenjangPendidikanRelatedByJenjangPendidikanIbu = null;
        }
        if ($this->aPenghasilanRelatedByPenghasilanIdIbu !== null && $this->penghasilan_id_ibu !== $this->aPenghasilanRelatedByPenghasilanIdIbu->getPenghasilanId()) {
            $this->aPenghasilanRelatedByPenghasilanIdIbu = null;
        }
        if ($this->aPekerjaanRelatedByPekerjaanIdIbu !== null && $this->pekerjaan_id_ibu !== $this->aPekerjaanRelatedByPekerjaanIdIbu->getPekerjaanId()) {
            $this->aPekerjaanRelatedByPekerjaanIdIbu = null;
        }
        if ($this->aKebutuhanKhususRelatedByKebutuhanKhususIdIbu !== null && $this->kebutuhan_khusus_id_ibu !== $this->aKebutuhanKhususRelatedByKebutuhanKhususIdIbu->getKebutuhanKhususId()) {
            $this->aKebutuhanKhususRelatedByKebutuhanKhususIdIbu = null;
        }
        if ($this->aJenjangPendidikanRelatedByJenjangPendidikanWali !== null && $this->jenjang_pendidikan_wali !== $this->aJenjangPendidikanRelatedByJenjangPendidikanWali->getJenjangPendidikanId()) {
            $this->aJenjangPendidikanRelatedByJenjangPendidikanWali = null;
        }
        if ($this->aPekerjaanRelatedByPekerjaanIdWali !== null && $this->pekerjaan_id_wali !== $this->aPekerjaanRelatedByPekerjaanIdWali->getPekerjaanId()) {
            $this->aPekerjaanRelatedByPekerjaanIdWali = null;
        }
        if ($this->aPenghasilanRelatedByPenghasilanIdWali !== null && $this->penghasilan_id_wali !== $this->aPenghasilanRelatedByPenghasilanIdWali->getPenghasilanId()) {
            $this->aPenghasilanRelatedByPenghasilanIdWali = null;
        }
        if ($this->aNegara !== null && $this->kewarganegaraan !== $this->aNegara->getNegaraId()) {
            $this->aNegara = null;
        }
        if ($this->aPekerjaanRelatedByPekerjaanId !== null && $this->pekerjaan_id !== $this->aPekerjaanRelatedByPekerjaanId->getPekerjaanId()) {
            $this->aPekerjaanRelatedByPekerjaanId = null;
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
            $con = Propel::getConnection(PesertaDidikPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = PesertaDidikPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aKebutuhanKhususRelatedByKebutuhanKhususIdAyah = null;
            $this->aKebutuhanKhususRelatedByKebutuhanKhususIdIbu = null;
            $this->aNegara = null;
            $this->aAlasanLayakPip = null;
            $this->aBank = null;
            $this->aMstWilayah = null;
            $this->aKebutuhanKhususRelatedByKebutuhanKhususId = null;
            $this->aPekerjaanRelatedByPekerjaanId = null;
            $this->aAgama = null;
            $this->aPenghasilanRelatedByPenghasilanIdAyah = null;
            $this->aJenisTinggal = null;
            $this->aAlatTransportasi = null;
            $this->aPekerjaanRelatedByPekerjaanIdAyah = null;
            $this->aJenjangPendidikanRelatedByJenjangPendidikanIbu = null;
            $this->aPenghasilanRelatedByPenghasilanIdWali = null;
            $this->aPekerjaanRelatedByPekerjaanIdIbu = null;
            $this->aJenjangPendidikanRelatedByJenjangPendidikanAyah = null;
            $this->aPenghasilanRelatedByPenghasilanIdIbu = null;
            $this->aPekerjaanRelatedByPekerjaanIdWali = null;
            $this->aJenjangPendidikanRelatedByJenjangPendidikanWali = null;
            $this->collAnggotaPanitias = null;

            $this->collAnggotaRombels = null;

            $this->collBeasiswaPesertaDidiks = null;

            $this->collKesejahteraanPds = null;

            $this->collKitasPds = null;

            $this->collPasporPds = null;

            $this->collPesertaDidikBarus = null;

            $this->collPesertaDidikLongitudinals = null;

            $this->collPrestasis = null;

            $this->collRegistrasiPesertaDidiks = null;

            $this->collSertifikasiPds = null;

            $this->collVldPesertaDidiks = null;

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
            $con = Propel::getConnection(PesertaDidikPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = PesertaDidikQuery::create()
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
            $con = Propel::getConnection(PesertaDidikPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                PesertaDidikPeer::addInstanceToPool($this);
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

            if ($this->aKebutuhanKhususRelatedByKebutuhanKhususIdAyah !== null) {
                if ($this->aKebutuhanKhususRelatedByKebutuhanKhususIdAyah->isModified() || $this->aKebutuhanKhususRelatedByKebutuhanKhususIdAyah->isNew()) {
                    $affectedRows += $this->aKebutuhanKhususRelatedByKebutuhanKhususIdAyah->save($con);
                }
                $this->setKebutuhanKhususRelatedByKebutuhanKhususIdAyah($this->aKebutuhanKhususRelatedByKebutuhanKhususIdAyah);
            }

            if ($this->aKebutuhanKhususRelatedByKebutuhanKhususIdIbu !== null) {
                if ($this->aKebutuhanKhususRelatedByKebutuhanKhususIdIbu->isModified() || $this->aKebutuhanKhususRelatedByKebutuhanKhususIdIbu->isNew()) {
                    $affectedRows += $this->aKebutuhanKhususRelatedByKebutuhanKhususIdIbu->save($con);
                }
                $this->setKebutuhanKhususRelatedByKebutuhanKhususIdIbu($this->aKebutuhanKhususRelatedByKebutuhanKhususIdIbu);
            }

            if ($this->aNegara !== null) {
                if ($this->aNegara->isModified() || $this->aNegara->isNew()) {
                    $affectedRows += $this->aNegara->save($con);
                }
                $this->setNegara($this->aNegara);
            }

            if ($this->aAlasanLayakPip !== null) {
                if ($this->aAlasanLayakPip->isModified() || $this->aAlasanLayakPip->isNew()) {
                    $affectedRows += $this->aAlasanLayakPip->save($con);
                }
                $this->setAlasanLayakPip($this->aAlasanLayakPip);
            }

            if ($this->aBank !== null) {
                if ($this->aBank->isModified() || $this->aBank->isNew()) {
                    $affectedRows += $this->aBank->save($con);
                }
                $this->setBank($this->aBank);
            }

            if ($this->aMstWilayah !== null) {
                if ($this->aMstWilayah->isModified() || $this->aMstWilayah->isNew()) {
                    $affectedRows += $this->aMstWilayah->save($con);
                }
                $this->setMstWilayah($this->aMstWilayah);
            }

            if ($this->aKebutuhanKhususRelatedByKebutuhanKhususId !== null) {
                if ($this->aKebutuhanKhususRelatedByKebutuhanKhususId->isModified() || $this->aKebutuhanKhususRelatedByKebutuhanKhususId->isNew()) {
                    $affectedRows += $this->aKebutuhanKhususRelatedByKebutuhanKhususId->save($con);
                }
                $this->setKebutuhanKhususRelatedByKebutuhanKhususId($this->aKebutuhanKhususRelatedByKebutuhanKhususId);
            }

            if ($this->aPekerjaanRelatedByPekerjaanId !== null) {
                if ($this->aPekerjaanRelatedByPekerjaanId->isModified() || $this->aPekerjaanRelatedByPekerjaanId->isNew()) {
                    $affectedRows += $this->aPekerjaanRelatedByPekerjaanId->save($con);
                }
                $this->setPekerjaanRelatedByPekerjaanId($this->aPekerjaanRelatedByPekerjaanId);
            }

            if ($this->aAgama !== null) {
                if ($this->aAgama->isModified() || $this->aAgama->isNew()) {
                    $affectedRows += $this->aAgama->save($con);
                }
                $this->setAgama($this->aAgama);
            }

            if ($this->aPenghasilanRelatedByPenghasilanIdAyah !== null) {
                if ($this->aPenghasilanRelatedByPenghasilanIdAyah->isModified() || $this->aPenghasilanRelatedByPenghasilanIdAyah->isNew()) {
                    $affectedRows += $this->aPenghasilanRelatedByPenghasilanIdAyah->save($con);
                }
                $this->setPenghasilanRelatedByPenghasilanIdAyah($this->aPenghasilanRelatedByPenghasilanIdAyah);
            }

            if ($this->aJenisTinggal !== null) {
                if ($this->aJenisTinggal->isModified() || $this->aJenisTinggal->isNew()) {
                    $affectedRows += $this->aJenisTinggal->save($con);
                }
                $this->setJenisTinggal($this->aJenisTinggal);
            }

            if ($this->aAlatTransportasi !== null) {
                if ($this->aAlatTransportasi->isModified() || $this->aAlatTransportasi->isNew()) {
                    $affectedRows += $this->aAlatTransportasi->save($con);
                }
                $this->setAlatTransportasi($this->aAlatTransportasi);
            }

            if ($this->aPekerjaanRelatedByPekerjaanIdAyah !== null) {
                if ($this->aPekerjaanRelatedByPekerjaanIdAyah->isModified() || $this->aPekerjaanRelatedByPekerjaanIdAyah->isNew()) {
                    $affectedRows += $this->aPekerjaanRelatedByPekerjaanIdAyah->save($con);
                }
                $this->setPekerjaanRelatedByPekerjaanIdAyah($this->aPekerjaanRelatedByPekerjaanIdAyah);
            }

            if ($this->aJenjangPendidikanRelatedByJenjangPendidikanIbu !== null) {
                if ($this->aJenjangPendidikanRelatedByJenjangPendidikanIbu->isModified() || $this->aJenjangPendidikanRelatedByJenjangPendidikanIbu->isNew()) {
                    $affectedRows += $this->aJenjangPendidikanRelatedByJenjangPendidikanIbu->save($con);
                }
                $this->setJenjangPendidikanRelatedByJenjangPendidikanIbu($this->aJenjangPendidikanRelatedByJenjangPendidikanIbu);
            }

            if ($this->aPenghasilanRelatedByPenghasilanIdWali !== null) {
                if ($this->aPenghasilanRelatedByPenghasilanIdWali->isModified() || $this->aPenghasilanRelatedByPenghasilanIdWali->isNew()) {
                    $affectedRows += $this->aPenghasilanRelatedByPenghasilanIdWali->save($con);
                }
                $this->setPenghasilanRelatedByPenghasilanIdWali($this->aPenghasilanRelatedByPenghasilanIdWali);
            }

            if ($this->aPekerjaanRelatedByPekerjaanIdIbu !== null) {
                if ($this->aPekerjaanRelatedByPekerjaanIdIbu->isModified() || $this->aPekerjaanRelatedByPekerjaanIdIbu->isNew()) {
                    $affectedRows += $this->aPekerjaanRelatedByPekerjaanIdIbu->save($con);
                }
                $this->setPekerjaanRelatedByPekerjaanIdIbu($this->aPekerjaanRelatedByPekerjaanIdIbu);
            }

            if ($this->aJenjangPendidikanRelatedByJenjangPendidikanAyah !== null) {
                if ($this->aJenjangPendidikanRelatedByJenjangPendidikanAyah->isModified() || $this->aJenjangPendidikanRelatedByJenjangPendidikanAyah->isNew()) {
                    $affectedRows += $this->aJenjangPendidikanRelatedByJenjangPendidikanAyah->save($con);
                }
                $this->setJenjangPendidikanRelatedByJenjangPendidikanAyah($this->aJenjangPendidikanRelatedByJenjangPendidikanAyah);
            }

            if ($this->aPenghasilanRelatedByPenghasilanIdIbu !== null) {
                if ($this->aPenghasilanRelatedByPenghasilanIdIbu->isModified() || $this->aPenghasilanRelatedByPenghasilanIdIbu->isNew()) {
                    $affectedRows += $this->aPenghasilanRelatedByPenghasilanIdIbu->save($con);
                }
                $this->setPenghasilanRelatedByPenghasilanIdIbu($this->aPenghasilanRelatedByPenghasilanIdIbu);
            }

            if ($this->aPekerjaanRelatedByPekerjaanIdWali !== null) {
                if ($this->aPekerjaanRelatedByPekerjaanIdWali->isModified() || $this->aPekerjaanRelatedByPekerjaanIdWali->isNew()) {
                    $affectedRows += $this->aPekerjaanRelatedByPekerjaanIdWali->save($con);
                }
                $this->setPekerjaanRelatedByPekerjaanIdWali($this->aPekerjaanRelatedByPekerjaanIdWali);
            }

            if ($this->aJenjangPendidikanRelatedByJenjangPendidikanWali !== null) {
                if ($this->aJenjangPendidikanRelatedByJenjangPendidikanWali->isModified() || $this->aJenjangPendidikanRelatedByJenjangPendidikanWali->isNew()) {
                    $affectedRows += $this->aJenjangPendidikanRelatedByJenjangPendidikanWali->save($con);
                }
                $this->setJenjangPendidikanRelatedByJenjangPendidikanWali($this->aJenjangPendidikanRelatedByJenjangPendidikanWali);
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

            if ($this->anggotaPanitiasScheduledForDeletion !== null) {
                if (!$this->anggotaPanitiasScheduledForDeletion->isEmpty()) {
                    foreach ($this->anggotaPanitiasScheduledForDeletion as $anggotaPanitia) {
                        // need to save related object because we set the relation to null
                        $anggotaPanitia->save($con);
                    }
                    $this->anggotaPanitiasScheduledForDeletion = null;
                }
            }

            if ($this->collAnggotaPanitias !== null) {
                foreach ($this->collAnggotaPanitias as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->anggotaRombelsScheduledForDeletion !== null) {
                if (!$this->anggotaRombelsScheduledForDeletion->isEmpty()) {
                    AnggotaRombelQuery::create()
                        ->filterByPrimaryKeys($this->anggotaRombelsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->anggotaRombelsScheduledForDeletion = null;
                }
            }

            if ($this->collAnggotaRombels !== null) {
                foreach ($this->collAnggotaRombels as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->beasiswaPesertaDidiksScheduledForDeletion !== null) {
                if (!$this->beasiswaPesertaDidiksScheduledForDeletion->isEmpty()) {
                    BeasiswaPesertaDidikQuery::create()
                        ->filterByPrimaryKeys($this->beasiswaPesertaDidiksScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->beasiswaPesertaDidiksScheduledForDeletion = null;
                }
            }

            if ($this->collBeasiswaPesertaDidiks !== null) {
                foreach ($this->collBeasiswaPesertaDidiks as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->kesejahteraanPdsScheduledForDeletion !== null) {
                if (!$this->kesejahteraanPdsScheduledForDeletion->isEmpty()) {
                    KesejahteraanPdQuery::create()
                        ->filterByPrimaryKeys($this->kesejahteraanPdsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->kesejahteraanPdsScheduledForDeletion = null;
                }
            }

            if ($this->collKesejahteraanPds !== null) {
                foreach ($this->collKesejahteraanPds as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->kitasPdsScheduledForDeletion !== null) {
                if (!$this->kitasPdsScheduledForDeletion->isEmpty()) {
                    KitasPdQuery::create()
                        ->filterByPrimaryKeys($this->kitasPdsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->kitasPdsScheduledForDeletion = null;
                }
            }

            if ($this->collKitasPds !== null) {
                foreach ($this->collKitasPds as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->pasporPdsScheduledForDeletion !== null) {
                if (!$this->pasporPdsScheduledForDeletion->isEmpty()) {
                    PasporPdQuery::create()
                        ->filterByPrimaryKeys($this->pasporPdsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->pasporPdsScheduledForDeletion = null;
                }
            }

            if ($this->collPasporPds !== null) {
                foreach ($this->collPasporPds as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->pesertaDidikBarusScheduledForDeletion !== null) {
                if (!$this->pesertaDidikBarusScheduledForDeletion->isEmpty()) {
                    foreach ($this->pesertaDidikBarusScheduledForDeletion as $pesertaDidikBaru) {
                        // need to save related object because we set the relation to null
                        $pesertaDidikBaru->save($con);
                    }
                    $this->pesertaDidikBarusScheduledForDeletion = null;
                }
            }

            if ($this->collPesertaDidikBarus !== null) {
                foreach ($this->collPesertaDidikBarus as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->pesertaDidikLongitudinalsScheduledForDeletion !== null) {
                if (!$this->pesertaDidikLongitudinalsScheduledForDeletion->isEmpty()) {
                    PesertaDidikLongitudinalQuery::create()
                        ->filterByPrimaryKeys($this->pesertaDidikLongitudinalsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->pesertaDidikLongitudinalsScheduledForDeletion = null;
                }
            }

            if ($this->collPesertaDidikLongitudinals !== null) {
                foreach ($this->collPesertaDidikLongitudinals as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->prestasisScheduledForDeletion !== null) {
                if (!$this->prestasisScheduledForDeletion->isEmpty()) {
                    PrestasiQuery::create()
                        ->filterByPrimaryKeys($this->prestasisScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->prestasisScheduledForDeletion = null;
                }
            }

            if ($this->collPrestasis !== null) {
                foreach ($this->collPrestasis as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->registrasiPesertaDidiksScheduledForDeletion !== null) {
                if (!$this->registrasiPesertaDidiksScheduledForDeletion->isEmpty()) {
                    RegistrasiPesertaDidikQuery::create()
                        ->filterByPrimaryKeys($this->registrasiPesertaDidiksScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->registrasiPesertaDidiksScheduledForDeletion = null;
                }
            }

            if ($this->collRegistrasiPesertaDidiks !== null) {
                foreach ($this->collRegistrasiPesertaDidiks as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->sertifikasiPdsScheduledForDeletion !== null) {
                if (!$this->sertifikasiPdsScheduledForDeletion->isEmpty()) {
                    SertifikasiPdQuery::create()
                        ->filterByPrimaryKeys($this->sertifikasiPdsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->sertifikasiPdsScheduledForDeletion = null;
                }
            }

            if ($this->collSertifikasiPds !== null) {
                foreach ($this->collSertifikasiPds as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->vldPesertaDidiksScheduledForDeletion !== null) {
                if (!$this->vldPesertaDidiksScheduledForDeletion->isEmpty()) {
                    VldPesertaDidikQuery::create()
                        ->filterByPrimaryKeys($this->vldPesertaDidiksScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->vldPesertaDidiksScheduledForDeletion = null;
                }
            }

            if ($this->collVldPesertaDidiks !== null) {
                foreach ($this->collVldPesertaDidiks as $referrerFK) {
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
        if ($this->isColumnModified(PesertaDidikPeer::PESERTA_DIDIK_ID)) {
            $modifiedColumns[':p' . $index++]  = '"peserta_didik_id"';
        }
        if ($this->isColumnModified(PesertaDidikPeer::NAMA)) {
            $modifiedColumns[':p' . $index++]  = '"nama"';
        }
        if ($this->isColumnModified(PesertaDidikPeer::JENIS_KELAMIN)) {
            $modifiedColumns[':p' . $index++]  = '"jenis_kelamin"';
        }
        if ($this->isColumnModified(PesertaDidikPeer::NISN)) {
            $modifiedColumns[':p' . $index++]  = '"nisn"';
        }
        if ($this->isColumnModified(PesertaDidikPeer::NIK)) {
            $modifiedColumns[':p' . $index++]  = '"nik"';
        }
        if ($this->isColumnModified(PesertaDidikPeer::NO_KK)) {
            $modifiedColumns[':p' . $index++]  = '"no_kk"';
        }
        if ($this->isColumnModified(PesertaDidikPeer::TEMPAT_LAHIR)) {
            $modifiedColumns[':p' . $index++]  = '"tempat_lahir"';
        }
        if ($this->isColumnModified(PesertaDidikPeer::TANGGAL_LAHIR)) {
            $modifiedColumns[':p' . $index++]  = '"tanggal_lahir"';
        }
        if ($this->isColumnModified(PesertaDidikPeer::AGAMA_ID)) {
            $modifiedColumns[':p' . $index++]  = '"agama_id"';
        }
        if ($this->isColumnModified(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID)) {
            $modifiedColumns[':p' . $index++]  = '"kebutuhan_khusus_id"';
        }
        if ($this->isColumnModified(PesertaDidikPeer::ALAMAT_JALAN)) {
            $modifiedColumns[':p' . $index++]  = '"alamat_jalan"';
        }
        if ($this->isColumnModified(PesertaDidikPeer::RT)) {
            $modifiedColumns[':p' . $index++]  = '"rt"';
        }
        if ($this->isColumnModified(PesertaDidikPeer::RW)) {
            $modifiedColumns[':p' . $index++]  = '"rw"';
        }
        if ($this->isColumnModified(PesertaDidikPeer::NAMA_DUSUN)) {
            $modifiedColumns[':p' . $index++]  = '"nama_dusun"';
        }
        if ($this->isColumnModified(PesertaDidikPeer::DESA_KELURAHAN)) {
            $modifiedColumns[':p' . $index++]  = '"desa_kelurahan"';
        }
        if ($this->isColumnModified(PesertaDidikPeer::KODE_WILAYAH)) {
            $modifiedColumns[':p' . $index++]  = '"kode_wilayah"';
        }
        if ($this->isColumnModified(PesertaDidikPeer::KODE_POS)) {
            $modifiedColumns[':p' . $index++]  = '"kode_pos"';
        }
        if ($this->isColumnModified(PesertaDidikPeer::LINTANG)) {
            $modifiedColumns[':p' . $index++]  = '"lintang"';
        }
        if ($this->isColumnModified(PesertaDidikPeer::BUJUR)) {
            $modifiedColumns[':p' . $index++]  = '"bujur"';
        }
        if ($this->isColumnModified(PesertaDidikPeer::JENIS_TINGGAL_ID)) {
            $modifiedColumns[':p' . $index++]  = '"jenis_tinggal_id"';
        }
        if ($this->isColumnModified(PesertaDidikPeer::ALAT_TRANSPORTASI_ID)) {
            $modifiedColumns[':p' . $index++]  = '"alat_transportasi_id"';
        }
        if ($this->isColumnModified(PesertaDidikPeer::NIK_AYAH)) {
            $modifiedColumns[':p' . $index++]  = '"nik_ayah"';
        }
        if ($this->isColumnModified(PesertaDidikPeer::NIK_IBU)) {
            $modifiedColumns[':p' . $index++]  = '"nik_ibu"';
        }
        if ($this->isColumnModified(PesertaDidikPeer::ANAK_KEBERAPA)) {
            $modifiedColumns[':p' . $index++]  = '"anak_keberapa"';
        }
        if ($this->isColumnModified(PesertaDidikPeer::NIK_WALI)) {
            $modifiedColumns[':p' . $index++]  = '"nik_wali"';
        }
        if ($this->isColumnModified(PesertaDidikPeer::NOMOR_TELEPON_RUMAH)) {
            $modifiedColumns[':p' . $index++]  = '"nomor_telepon_rumah"';
        }
        if ($this->isColumnModified(PesertaDidikPeer::NOMOR_TELEPON_SELULER)) {
            $modifiedColumns[':p' . $index++]  = '"nomor_telepon_seluler"';
        }
        if ($this->isColumnModified(PesertaDidikPeer::EMAIL)) {
            $modifiedColumns[':p' . $index++]  = '"email"';
        }
        if ($this->isColumnModified(PesertaDidikPeer::PENERIMA_KPS)) {
            $modifiedColumns[':p' . $index++]  = '"penerima_kps"';
        }
        if ($this->isColumnModified(PesertaDidikPeer::NO_KPS)) {
            $modifiedColumns[':p' . $index++]  = '"no_kps"';
        }
        if ($this->isColumnModified(PesertaDidikPeer::LAYAK_PIP)) {
            $modifiedColumns[':p' . $index++]  = '"layak_pip"';
        }
        if ($this->isColumnModified(PesertaDidikPeer::PENERIMA_KIP)) {
            $modifiedColumns[':p' . $index++]  = '"penerima_kip"';
        }
        if ($this->isColumnModified(PesertaDidikPeer::NO_KIP)) {
            $modifiedColumns[':p' . $index++]  = '"no_kip"';
        }
        if ($this->isColumnModified(PesertaDidikPeer::NM_KIP)) {
            $modifiedColumns[':p' . $index++]  = '"nm_kip"';
        }
        if ($this->isColumnModified(PesertaDidikPeer::NO_KKS)) {
            $modifiedColumns[':p' . $index++]  = '"no_kks"';
        }
        if ($this->isColumnModified(PesertaDidikPeer::REG_AKTA_LAHIR)) {
            $modifiedColumns[':p' . $index++]  = '"reg_akta_lahir"';
        }
        if ($this->isColumnModified(PesertaDidikPeer::ID_LAYAK_PIP)) {
            $modifiedColumns[':p' . $index++]  = '"id_layak_pip"';
        }
        if ($this->isColumnModified(PesertaDidikPeer::ID_BANK)) {
            $modifiedColumns[':p' . $index++]  = '"id_bank"';
        }
        if ($this->isColumnModified(PesertaDidikPeer::REKENING_BANK)) {
            $modifiedColumns[':p' . $index++]  = '"rekening_bank"';
        }
        if ($this->isColumnModified(PesertaDidikPeer::NAMA_KCP)) {
            $modifiedColumns[':p' . $index++]  = '"nama_kcp"';
        }
        if ($this->isColumnModified(PesertaDidikPeer::REKENING_ATAS_NAMA)) {
            $modifiedColumns[':p' . $index++]  = '"rekening_atas_nama"';
        }
        if ($this->isColumnModified(PesertaDidikPeer::STATUS_DATA)) {
            $modifiedColumns[':p' . $index++]  = '"status_data"';
        }
        if ($this->isColumnModified(PesertaDidikPeer::NAMA_AYAH)) {
            $modifiedColumns[':p' . $index++]  = '"nama_ayah"';
        }
        if ($this->isColumnModified(PesertaDidikPeer::TAHUN_LAHIR_AYAH)) {
            $modifiedColumns[':p' . $index++]  = '"tahun_lahir_ayah"';
        }
        if ($this->isColumnModified(PesertaDidikPeer::JENJANG_PENDIDIKAN_AYAH)) {
            $modifiedColumns[':p' . $index++]  = '"jenjang_pendidikan_ayah"';
        }
        if ($this->isColumnModified(PesertaDidikPeer::PEKERJAAN_ID_AYAH)) {
            $modifiedColumns[':p' . $index++]  = '"pekerjaan_id_ayah"';
        }
        if ($this->isColumnModified(PesertaDidikPeer::PENGHASILAN_ID_AYAH)) {
            $modifiedColumns[':p' . $index++]  = '"penghasilan_id_ayah"';
        }
        if ($this->isColumnModified(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID_AYAH)) {
            $modifiedColumns[':p' . $index++]  = '"kebutuhan_khusus_id_ayah"';
        }
        if ($this->isColumnModified(PesertaDidikPeer::NAMA_IBU_KANDUNG)) {
            $modifiedColumns[':p' . $index++]  = '"nama_ibu_kandung"';
        }
        if ($this->isColumnModified(PesertaDidikPeer::TAHUN_LAHIR_IBU)) {
            $modifiedColumns[':p' . $index++]  = '"tahun_lahir_ibu"';
        }
        if ($this->isColumnModified(PesertaDidikPeer::JENJANG_PENDIDIKAN_IBU)) {
            $modifiedColumns[':p' . $index++]  = '"jenjang_pendidikan_ibu"';
        }
        if ($this->isColumnModified(PesertaDidikPeer::PENGHASILAN_ID_IBU)) {
            $modifiedColumns[':p' . $index++]  = '"penghasilan_id_ibu"';
        }
        if ($this->isColumnModified(PesertaDidikPeer::PEKERJAAN_ID_IBU)) {
            $modifiedColumns[':p' . $index++]  = '"pekerjaan_id_ibu"';
        }
        if ($this->isColumnModified(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID_IBU)) {
            $modifiedColumns[':p' . $index++]  = '"kebutuhan_khusus_id_ibu"';
        }
        if ($this->isColumnModified(PesertaDidikPeer::NAMA_WALI)) {
            $modifiedColumns[':p' . $index++]  = '"nama_wali"';
        }
        if ($this->isColumnModified(PesertaDidikPeer::TAHUN_LAHIR_WALI)) {
            $modifiedColumns[':p' . $index++]  = '"tahun_lahir_wali"';
        }
        if ($this->isColumnModified(PesertaDidikPeer::JENJANG_PENDIDIKAN_WALI)) {
            $modifiedColumns[':p' . $index++]  = '"jenjang_pendidikan_wali"';
        }
        if ($this->isColumnModified(PesertaDidikPeer::PEKERJAAN_ID_WALI)) {
            $modifiedColumns[':p' . $index++]  = '"pekerjaan_id_wali"';
        }
        if ($this->isColumnModified(PesertaDidikPeer::PENGHASILAN_ID_WALI)) {
            $modifiedColumns[':p' . $index++]  = '"penghasilan_id_wali"';
        }
        if ($this->isColumnModified(PesertaDidikPeer::KEWARGANEGARAAN)) {
            $modifiedColumns[':p' . $index++]  = '"kewarganegaraan"';
        }
        if ($this->isColumnModified(PesertaDidikPeer::PEKERJAAN_ID)) {
            $modifiedColumns[':p' . $index++]  = '"pekerjaan_id"';
        }
        if ($this->isColumnModified(PesertaDidikPeer::CREATE_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"create_date"';
        }
        if ($this->isColumnModified(PesertaDidikPeer::LAST_UPDATE)) {
            $modifiedColumns[':p' . $index++]  = '"last_update"';
        }
        if ($this->isColumnModified(PesertaDidikPeer::SOFT_DELETE)) {
            $modifiedColumns[':p' . $index++]  = '"soft_delete"';
        }
        if ($this->isColumnModified(PesertaDidikPeer::LAST_SYNC)) {
            $modifiedColumns[':p' . $index++]  = '"last_sync"';
        }
        if ($this->isColumnModified(PesertaDidikPeer::UPDATER_ID)) {
            $modifiedColumns[':p' . $index++]  = '"updater_id"';
        }

        $sql = sprintf(
            'INSERT INTO "peserta_didik" (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '"peserta_didik_id"':						
                        $stmt->bindValue($identifier, $this->peserta_didik_id, PDO::PARAM_STR);
                        break;
                    case '"nama"':						
                        $stmt->bindValue($identifier, $this->nama, PDO::PARAM_STR);
                        break;
                    case '"jenis_kelamin"':						
                        $stmt->bindValue($identifier, $this->jenis_kelamin, PDO::PARAM_STR);
                        break;
                    case '"nisn"':						
                        $stmt->bindValue($identifier, $this->nisn, PDO::PARAM_STR);
                        break;
                    case '"nik"':						
                        $stmt->bindValue($identifier, $this->nik, PDO::PARAM_STR);
                        break;
                    case '"no_kk"':						
                        $stmt->bindValue($identifier, $this->no_kk, PDO::PARAM_STR);
                        break;
                    case '"tempat_lahir"':						
                        $stmt->bindValue($identifier, $this->tempat_lahir, PDO::PARAM_STR);
                        break;
                    case '"tanggal_lahir"':						
                        $stmt->bindValue($identifier, $this->tanggal_lahir, PDO::PARAM_STR);
                        break;
                    case '"agama_id"':						
                        $stmt->bindValue($identifier, $this->agama_id, PDO::PARAM_INT);
                        break;
                    case '"kebutuhan_khusus_id"':						
                        $stmt->bindValue($identifier, $this->kebutuhan_khusus_id, PDO::PARAM_INT);
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
                    case '"kode_wilayah"':						
                        $stmt->bindValue($identifier, $this->kode_wilayah, PDO::PARAM_STR);
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
                    case '"jenis_tinggal_id"':						
                        $stmt->bindValue($identifier, $this->jenis_tinggal_id, PDO::PARAM_STR);
                        break;
                    case '"alat_transportasi_id"':						
                        $stmt->bindValue($identifier, $this->alat_transportasi_id, PDO::PARAM_STR);
                        break;
                    case '"nik_ayah"':						
                        $stmt->bindValue($identifier, $this->nik_ayah, PDO::PARAM_STR);
                        break;
                    case '"nik_ibu"':						
                        $stmt->bindValue($identifier, $this->nik_ibu, PDO::PARAM_STR);
                        break;
                    case '"anak_keberapa"':						
                        $stmt->bindValue($identifier, $this->anak_keberapa, PDO::PARAM_STR);
                        break;
                    case '"nik_wali"':						
                        $stmt->bindValue($identifier, $this->nik_wali, PDO::PARAM_STR);
                        break;
                    case '"nomor_telepon_rumah"':						
                        $stmt->bindValue($identifier, $this->nomor_telepon_rumah, PDO::PARAM_STR);
                        break;
                    case '"nomor_telepon_seluler"':						
                        $stmt->bindValue($identifier, $this->nomor_telepon_seluler, PDO::PARAM_STR);
                        break;
                    case '"email"':						
                        $stmt->bindValue($identifier, $this->email, PDO::PARAM_STR);
                        break;
                    case '"penerima_kps"':						
                        $stmt->bindValue($identifier, $this->penerima_kps, PDO::PARAM_STR);
                        break;
                    case '"no_kps"':						
                        $stmt->bindValue($identifier, $this->no_kps, PDO::PARAM_STR);
                        break;
                    case '"layak_pip"':						
                        $stmt->bindValue($identifier, $this->layak_pip, PDO::PARAM_STR);
                        break;
                    case '"penerima_kip"':						
                        $stmt->bindValue($identifier, $this->penerima_kip, PDO::PARAM_STR);
                        break;
                    case '"no_kip"':						
                        $stmt->bindValue($identifier, $this->no_kip, PDO::PARAM_STR);
                        break;
                    case '"nm_kip"':						
                        $stmt->bindValue($identifier, $this->nm_kip, PDO::PARAM_STR);
                        break;
                    case '"no_kks"':						
                        $stmt->bindValue($identifier, $this->no_kks, PDO::PARAM_STR);
                        break;
                    case '"reg_akta_lahir"':						
                        $stmt->bindValue($identifier, $this->reg_akta_lahir, PDO::PARAM_STR);
                        break;
                    case '"id_layak_pip"':						
                        $stmt->bindValue($identifier, $this->id_layak_pip, PDO::PARAM_STR);
                        break;
                    case '"id_bank"':						
                        $stmt->bindValue($identifier, $this->id_bank, PDO::PARAM_STR);
                        break;
                    case '"rekening_bank"':						
                        $stmt->bindValue($identifier, $this->rekening_bank, PDO::PARAM_STR);
                        break;
                    case '"nama_kcp"':						
                        $stmt->bindValue($identifier, $this->nama_kcp, PDO::PARAM_STR);
                        break;
                    case '"rekening_atas_nama"':						
                        $stmt->bindValue($identifier, $this->rekening_atas_nama, PDO::PARAM_STR);
                        break;
                    case '"status_data"':						
                        $stmt->bindValue($identifier, $this->status_data, PDO::PARAM_INT);
                        break;
                    case '"nama_ayah"':						
                        $stmt->bindValue($identifier, $this->nama_ayah, PDO::PARAM_STR);
                        break;
                    case '"tahun_lahir_ayah"':						
                        $stmt->bindValue($identifier, $this->tahun_lahir_ayah, PDO::PARAM_STR);
                        break;
                    case '"jenjang_pendidikan_ayah"':						
                        $stmt->bindValue($identifier, $this->jenjang_pendidikan_ayah, PDO::PARAM_STR);
                        break;
                    case '"pekerjaan_id_ayah"':						
                        $stmt->bindValue($identifier, $this->pekerjaan_id_ayah, PDO::PARAM_INT);
                        break;
                    case '"penghasilan_id_ayah"':						
                        $stmt->bindValue($identifier, $this->penghasilan_id_ayah, PDO::PARAM_INT);
                        break;
                    case '"kebutuhan_khusus_id_ayah"':						
                        $stmt->bindValue($identifier, $this->kebutuhan_khusus_id_ayah, PDO::PARAM_INT);
                        break;
                    case '"nama_ibu_kandung"':						
                        $stmt->bindValue($identifier, $this->nama_ibu_kandung, PDO::PARAM_STR);
                        break;
                    case '"tahun_lahir_ibu"':						
                        $stmt->bindValue($identifier, $this->tahun_lahir_ibu, PDO::PARAM_STR);
                        break;
                    case '"jenjang_pendidikan_ibu"':						
                        $stmt->bindValue($identifier, $this->jenjang_pendidikan_ibu, PDO::PARAM_STR);
                        break;
                    case '"penghasilan_id_ibu"':						
                        $stmt->bindValue($identifier, $this->penghasilan_id_ibu, PDO::PARAM_INT);
                        break;
                    case '"pekerjaan_id_ibu"':						
                        $stmt->bindValue($identifier, $this->pekerjaan_id_ibu, PDO::PARAM_INT);
                        break;
                    case '"kebutuhan_khusus_id_ibu"':						
                        $stmt->bindValue($identifier, $this->kebutuhan_khusus_id_ibu, PDO::PARAM_INT);
                        break;
                    case '"nama_wali"':						
                        $stmt->bindValue($identifier, $this->nama_wali, PDO::PARAM_STR);
                        break;
                    case '"tahun_lahir_wali"':						
                        $stmt->bindValue($identifier, $this->tahun_lahir_wali, PDO::PARAM_STR);
                        break;
                    case '"jenjang_pendidikan_wali"':						
                        $stmt->bindValue($identifier, $this->jenjang_pendidikan_wali, PDO::PARAM_STR);
                        break;
                    case '"pekerjaan_id_wali"':						
                        $stmt->bindValue($identifier, $this->pekerjaan_id_wali, PDO::PARAM_INT);
                        break;
                    case '"penghasilan_id_wali"':						
                        $stmt->bindValue($identifier, $this->penghasilan_id_wali, PDO::PARAM_INT);
                        break;
                    case '"kewarganegaraan"':						
                        $stmt->bindValue($identifier, $this->kewarganegaraan, PDO::PARAM_STR);
                        break;
                    case '"pekerjaan_id"':						
                        $stmt->bindValue($identifier, $this->pekerjaan_id, PDO::PARAM_INT);
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

            if ($this->aKebutuhanKhususRelatedByKebutuhanKhususIdAyah !== null) {
                if (!$this->aKebutuhanKhususRelatedByKebutuhanKhususIdAyah->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aKebutuhanKhususRelatedByKebutuhanKhususIdAyah->getValidationFailures());
                }
            }

            if ($this->aKebutuhanKhususRelatedByKebutuhanKhususIdIbu !== null) {
                if (!$this->aKebutuhanKhususRelatedByKebutuhanKhususIdIbu->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aKebutuhanKhususRelatedByKebutuhanKhususIdIbu->getValidationFailures());
                }
            }

            if ($this->aNegara !== null) {
                if (!$this->aNegara->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aNegara->getValidationFailures());
                }
            }

            if ($this->aAlasanLayakPip !== null) {
                if (!$this->aAlasanLayakPip->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aAlasanLayakPip->getValidationFailures());
                }
            }

            if ($this->aBank !== null) {
                if (!$this->aBank->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aBank->getValidationFailures());
                }
            }

            if ($this->aMstWilayah !== null) {
                if (!$this->aMstWilayah->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aMstWilayah->getValidationFailures());
                }
            }

            if ($this->aKebutuhanKhususRelatedByKebutuhanKhususId !== null) {
                if (!$this->aKebutuhanKhususRelatedByKebutuhanKhususId->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aKebutuhanKhususRelatedByKebutuhanKhususId->getValidationFailures());
                }
            }

            if ($this->aPekerjaanRelatedByPekerjaanId !== null) {
                if (!$this->aPekerjaanRelatedByPekerjaanId->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aPekerjaanRelatedByPekerjaanId->getValidationFailures());
                }
            }

            if ($this->aAgama !== null) {
                if (!$this->aAgama->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aAgama->getValidationFailures());
                }
            }

            if ($this->aPenghasilanRelatedByPenghasilanIdAyah !== null) {
                if (!$this->aPenghasilanRelatedByPenghasilanIdAyah->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aPenghasilanRelatedByPenghasilanIdAyah->getValidationFailures());
                }
            }

            if ($this->aJenisTinggal !== null) {
                if (!$this->aJenisTinggal->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aJenisTinggal->getValidationFailures());
                }
            }

            if ($this->aAlatTransportasi !== null) {
                if (!$this->aAlatTransportasi->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aAlatTransportasi->getValidationFailures());
                }
            }

            if ($this->aPekerjaanRelatedByPekerjaanIdAyah !== null) {
                if (!$this->aPekerjaanRelatedByPekerjaanIdAyah->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aPekerjaanRelatedByPekerjaanIdAyah->getValidationFailures());
                }
            }

            if ($this->aJenjangPendidikanRelatedByJenjangPendidikanIbu !== null) {
                if (!$this->aJenjangPendidikanRelatedByJenjangPendidikanIbu->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aJenjangPendidikanRelatedByJenjangPendidikanIbu->getValidationFailures());
                }
            }

            if ($this->aPenghasilanRelatedByPenghasilanIdWali !== null) {
                if (!$this->aPenghasilanRelatedByPenghasilanIdWali->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aPenghasilanRelatedByPenghasilanIdWali->getValidationFailures());
                }
            }

            if ($this->aPekerjaanRelatedByPekerjaanIdIbu !== null) {
                if (!$this->aPekerjaanRelatedByPekerjaanIdIbu->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aPekerjaanRelatedByPekerjaanIdIbu->getValidationFailures());
                }
            }

            if ($this->aJenjangPendidikanRelatedByJenjangPendidikanAyah !== null) {
                if (!$this->aJenjangPendidikanRelatedByJenjangPendidikanAyah->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aJenjangPendidikanRelatedByJenjangPendidikanAyah->getValidationFailures());
                }
            }

            if ($this->aPenghasilanRelatedByPenghasilanIdIbu !== null) {
                if (!$this->aPenghasilanRelatedByPenghasilanIdIbu->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aPenghasilanRelatedByPenghasilanIdIbu->getValidationFailures());
                }
            }

            if ($this->aPekerjaanRelatedByPekerjaanIdWali !== null) {
                if (!$this->aPekerjaanRelatedByPekerjaanIdWali->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aPekerjaanRelatedByPekerjaanIdWali->getValidationFailures());
                }
            }

            if ($this->aJenjangPendidikanRelatedByJenjangPendidikanWali !== null) {
                if (!$this->aJenjangPendidikanRelatedByJenjangPendidikanWali->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aJenjangPendidikanRelatedByJenjangPendidikanWali->getValidationFailures());
                }
            }


            if (($retval = PesertaDidikPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collAnggotaPanitias !== null) {
                    foreach ($this->collAnggotaPanitias as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collAnggotaRombels !== null) {
                    foreach ($this->collAnggotaRombels as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collBeasiswaPesertaDidiks !== null) {
                    foreach ($this->collBeasiswaPesertaDidiks as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collKesejahteraanPds !== null) {
                    foreach ($this->collKesejahteraanPds as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collKitasPds !== null) {
                    foreach ($this->collKitasPds as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collPasporPds !== null) {
                    foreach ($this->collPasporPds as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collPesertaDidikBarus !== null) {
                    foreach ($this->collPesertaDidikBarus as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collPesertaDidikLongitudinals !== null) {
                    foreach ($this->collPesertaDidikLongitudinals as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collPrestasis !== null) {
                    foreach ($this->collPrestasis as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collRegistrasiPesertaDidiks !== null) {
                    foreach ($this->collRegistrasiPesertaDidiks as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collSertifikasiPds !== null) {
                    foreach ($this->collSertifikasiPds as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collVldPesertaDidiks !== null) {
                    foreach ($this->collVldPesertaDidiks as $referrerFK) {
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
        $pos = PesertaDidikPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getPesertaDidikId();
                break;
            case 1:
                return $this->getNama();
                break;
            case 2:
                return $this->getJenisKelamin();
                break;
            case 3:
                return $this->getNisn();
                break;
            case 4:
                return $this->getNik();
                break;
            case 5:
                return $this->getNoKk();
                break;
            case 6:
                return $this->getTempatLahir();
                break;
            case 7:
                return $this->getTanggalLahir();
                break;
            case 8:
                return $this->getAgamaId();
                break;
            case 9:
                return $this->getKebutuhanKhususId();
                break;
            case 10:
                return $this->getAlamatJalan();
                break;
            case 11:
                return $this->getRt();
                break;
            case 12:
                return $this->getRw();
                break;
            case 13:
                return $this->getNamaDusun();
                break;
            case 14:
                return $this->getDesaKelurahan();
                break;
            case 15:
                return $this->getKodeWilayah();
                break;
            case 16:
                return $this->getKodePos();
                break;
            case 17:
                return $this->getLintang();
                break;
            case 18:
                return $this->getBujur();
                break;
            case 19:
                return $this->getJenisTinggalId();
                break;
            case 20:
                return $this->getAlatTransportasiId();
                break;
            case 21:
                return $this->getNikAyah();
                break;
            case 22:
                return $this->getNikIbu();
                break;
            case 23:
                return $this->getAnakKeberapa();
                break;
            case 24:
                return $this->getNikWali();
                break;
            case 25:
                return $this->getNomorTeleponRumah();
                break;
            case 26:
                return $this->getNomorTeleponSeluler();
                break;
            case 27:
                return $this->getEmail();
                break;
            case 28:
                return $this->getPenerimaKps();
                break;
            case 29:
                return $this->getNoKps();
                break;
            case 30:
                return $this->getLayakPip();
                break;
            case 31:
                return $this->getPenerimaKip();
                break;
            case 32:
                return $this->getNoKip();
                break;
            case 33:
                return $this->getNmKip();
                break;
            case 34:
                return $this->getNoKks();
                break;
            case 35:
                return $this->getRegAktaLahir();
                break;
            case 36:
                return $this->getIdLayakPip();
                break;
            case 37:
                return $this->getIdBank();
                break;
            case 38:
                return $this->getRekeningBank();
                break;
            case 39:
                return $this->getNamaKcp();
                break;
            case 40:
                return $this->getRekeningAtasNama();
                break;
            case 41:
                return $this->getStatusData();
                break;
            case 42:
                return $this->getNamaAyah();
                break;
            case 43:
                return $this->getTahunLahirAyah();
                break;
            case 44:
                return $this->getJenjangPendidikanAyah();
                break;
            case 45:
                return $this->getPekerjaanIdAyah();
                break;
            case 46:
                return $this->getPenghasilanIdAyah();
                break;
            case 47:
                return $this->getKebutuhanKhususIdAyah();
                break;
            case 48:
                return $this->getNamaIbuKandung();
                break;
            case 49:
                return $this->getTahunLahirIbu();
                break;
            case 50:
                return $this->getJenjangPendidikanIbu();
                break;
            case 51:
                return $this->getPenghasilanIdIbu();
                break;
            case 52:
                return $this->getPekerjaanIdIbu();
                break;
            case 53:
                return $this->getKebutuhanKhususIdIbu();
                break;
            case 54:
                return $this->getNamaWali();
                break;
            case 55:
                return $this->getTahunLahirWali();
                break;
            case 56:
                return $this->getJenjangPendidikanWali();
                break;
            case 57:
                return $this->getPekerjaanIdWali();
                break;
            case 58:
                return $this->getPenghasilanIdWali();
                break;
            case 59:
                return $this->getKewarganegaraan();
                break;
            case 60:
                return $this->getPekerjaanId();
                break;
            case 61:
                return $this->getCreateDate();
                break;
            case 62:
                return $this->getLastUpdate();
                break;
            case 63:
                return $this->getSoftDelete();
                break;
            case 64:
                return $this->getLastSync();
                break;
            case 65:
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
        if (isset($alreadyDumpedObjects['PesertaDidik'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['PesertaDidik'][$this->getPrimaryKey()] = true;
        $keys = PesertaDidikPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getPesertaDidikId(),
            $keys[1] => $this->getNama(),
            $keys[2] => $this->getJenisKelamin(),
            $keys[3] => $this->getNisn(),
            $keys[4] => $this->getNik(),
            $keys[5] => $this->getNoKk(),
            $keys[6] => $this->getTempatLahir(),
            $keys[7] => $this->getTanggalLahir(),
            $keys[8] => $this->getAgamaId(),
            $keys[9] => $this->getKebutuhanKhususId(),
            $keys[10] => $this->getAlamatJalan(),
            $keys[11] => $this->getRt(),
            $keys[12] => $this->getRw(),
            $keys[13] => $this->getNamaDusun(),
            $keys[14] => $this->getDesaKelurahan(),
            $keys[15] => $this->getKodeWilayah(),
            $keys[16] => $this->getKodePos(),
            $keys[17] => $this->getLintang(),
            $keys[18] => $this->getBujur(),
            $keys[19] => $this->getJenisTinggalId(),
            $keys[20] => $this->getAlatTransportasiId(),
            $keys[21] => $this->getNikAyah(),
            $keys[22] => $this->getNikIbu(),
            $keys[23] => $this->getAnakKeberapa(),
            $keys[24] => $this->getNikWali(),
            $keys[25] => $this->getNomorTeleponRumah(),
            $keys[26] => $this->getNomorTeleponSeluler(),
            $keys[27] => $this->getEmail(),
            $keys[28] => $this->getPenerimaKps(),
            $keys[29] => $this->getNoKps(),
            $keys[30] => $this->getLayakPip(),
            $keys[31] => $this->getPenerimaKip(),
            $keys[32] => $this->getNoKip(),
            $keys[33] => $this->getNmKip(),
            $keys[34] => $this->getNoKks(),
            $keys[35] => $this->getRegAktaLahir(),
            $keys[36] => $this->getIdLayakPip(),
            $keys[37] => $this->getIdBank(),
            $keys[38] => $this->getRekeningBank(),
            $keys[39] => $this->getNamaKcp(),
            $keys[40] => $this->getRekeningAtasNama(),
            $keys[41] => $this->getStatusData(),
            $keys[42] => $this->getNamaAyah(),
            $keys[43] => $this->getTahunLahirAyah(),
            $keys[44] => $this->getJenjangPendidikanAyah(),
            $keys[45] => $this->getPekerjaanIdAyah(),
            $keys[46] => $this->getPenghasilanIdAyah(),
            $keys[47] => $this->getKebutuhanKhususIdAyah(),
            $keys[48] => $this->getNamaIbuKandung(),
            $keys[49] => $this->getTahunLahirIbu(),
            $keys[50] => $this->getJenjangPendidikanIbu(),
            $keys[51] => $this->getPenghasilanIdIbu(),
            $keys[52] => $this->getPekerjaanIdIbu(),
            $keys[53] => $this->getKebutuhanKhususIdIbu(),
            $keys[54] => $this->getNamaWali(),
            $keys[55] => $this->getTahunLahirWali(),
            $keys[56] => $this->getJenjangPendidikanWali(),
            $keys[57] => $this->getPekerjaanIdWali(),
            $keys[58] => $this->getPenghasilanIdWali(),
            $keys[59] => $this->getKewarganegaraan(),
            $keys[60] => $this->getPekerjaanId(),
            $keys[61] => $this->getCreateDate(),
            $keys[62] => $this->getLastUpdate(),
            $keys[63] => $this->getSoftDelete(),
            $keys[64] => $this->getLastSync(),
            $keys[65] => $this->getUpdaterId(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aKebutuhanKhususRelatedByKebutuhanKhususIdAyah) {
                $result['KebutuhanKhususRelatedByKebutuhanKhususIdAyah'] = $this->aKebutuhanKhususRelatedByKebutuhanKhususIdAyah->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aKebutuhanKhususRelatedByKebutuhanKhususIdIbu) {
                $result['KebutuhanKhususRelatedByKebutuhanKhususIdIbu'] = $this->aKebutuhanKhususRelatedByKebutuhanKhususIdIbu->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aNegara) {
                $result['Negara'] = $this->aNegara->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aAlasanLayakPip) {
                $result['AlasanLayakPip'] = $this->aAlasanLayakPip->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aBank) {
                $result['Bank'] = $this->aBank->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aMstWilayah) {
                $result['MstWilayah'] = $this->aMstWilayah->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aKebutuhanKhususRelatedByKebutuhanKhususId) {
                $result['KebutuhanKhususRelatedByKebutuhanKhususId'] = $this->aKebutuhanKhususRelatedByKebutuhanKhususId->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aPekerjaanRelatedByPekerjaanId) {
                $result['PekerjaanRelatedByPekerjaanId'] = $this->aPekerjaanRelatedByPekerjaanId->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aAgama) {
                $result['Agama'] = $this->aAgama->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aPenghasilanRelatedByPenghasilanIdAyah) {
                $result['PenghasilanRelatedByPenghasilanIdAyah'] = $this->aPenghasilanRelatedByPenghasilanIdAyah->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aJenisTinggal) {
                $result['JenisTinggal'] = $this->aJenisTinggal->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aAlatTransportasi) {
                $result['AlatTransportasi'] = $this->aAlatTransportasi->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aPekerjaanRelatedByPekerjaanIdAyah) {
                $result['PekerjaanRelatedByPekerjaanIdAyah'] = $this->aPekerjaanRelatedByPekerjaanIdAyah->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aJenjangPendidikanRelatedByJenjangPendidikanIbu) {
                $result['JenjangPendidikanRelatedByJenjangPendidikanIbu'] = $this->aJenjangPendidikanRelatedByJenjangPendidikanIbu->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aPenghasilanRelatedByPenghasilanIdWali) {
                $result['PenghasilanRelatedByPenghasilanIdWali'] = $this->aPenghasilanRelatedByPenghasilanIdWali->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aPekerjaanRelatedByPekerjaanIdIbu) {
                $result['PekerjaanRelatedByPekerjaanIdIbu'] = $this->aPekerjaanRelatedByPekerjaanIdIbu->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aJenjangPendidikanRelatedByJenjangPendidikanAyah) {
                $result['JenjangPendidikanRelatedByJenjangPendidikanAyah'] = $this->aJenjangPendidikanRelatedByJenjangPendidikanAyah->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aPenghasilanRelatedByPenghasilanIdIbu) {
                $result['PenghasilanRelatedByPenghasilanIdIbu'] = $this->aPenghasilanRelatedByPenghasilanIdIbu->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aPekerjaanRelatedByPekerjaanIdWali) {
                $result['PekerjaanRelatedByPekerjaanIdWali'] = $this->aPekerjaanRelatedByPekerjaanIdWali->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aJenjangPendidikanRelatedByJenjangPendidikanWali) {
                $result['JenjangPendidikanRelatedByJenjangPendidikanWali'] = $this->aJenjangPendidikanRelatedByJenjangPendidikanWali->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collAnggotaPanitias) {
                $result['AnggotaPanitias'] = $this->collAnggotaPanitias->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collAnggotaRombels) {
                $result['AnggotaRombels'] = $this->collAnggotaRombels->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collBeasiswaPesertaDidiks) {
                $result['BeasiswaPesertaDidiks'] = $this->collBeasiswaPesertaDidiks->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collKesejahteraanPds) {
                $result['KesejahteraanPds'] = $this->collKesejahteraanPds->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collKitasPds) {
                $result['KitasPds'] = $this->collKitasPds->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collPasporPds) {
                $result['PasporPds'] = $this->collPasporPds->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collPesertaDidikBarus) {
                $result['PesertaDidikBarus'] = $this->collPesertaDidikBarus->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collPesertaDidikLongitudinals) {
                $result['PesertaDidikLongitudinals'] = $this->collPesertaDidikLongitudinals->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collPrestasis) {
                $result['Prestasis'] = $this->collPrestasis->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collRegistrasiPesertaDidiks) {
                $result['RegistrasiPesertaDidiks'] = $this->collRegistrasiPesertaDidiks->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collSertifikasiPds) {
                $result['SertifikasiPds'] = $this->collSertifikasiPds->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collVldPesertaDidiks) {
                $result['VldPesertaDidiks'] = $this->collVldPesertaDidiks->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = PesertaDidikPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setPesertaDidikId($value);
                break;
            case 1:
                $this->setNama($value);
                break;
            case 2:
                $this->setJenisKelamin($value);
                break;
            case 3:
                $this->setNisn($value);
                break;
            case 4:
                $this->setNik($value);
                break;
            case 5:
                $this->setNoKk($value);
                break;
            case 6:
                $this->setTempatLahir($value);
                break;
            case 7:
                $this->setTanggalLahir($value);
                break;
            case 8:
                $this->setAgamaId($value);
                break;
            case 9:
                $this->setKebutuhanKhususId($value);
                break;
            case 10:
                $this->setAlamatJalan($value);
                break;
            case 11:
                $this->setRt($value);
                break;
            case 12:
                $this->setRw($value);
                break;
            case 13:
                $this->setNamaDusun($value);
                break;
            case 14:
                $this->setDesaKelurahan($value);
                break;
            case 15:
                $this->setKodeWilayah($value);
                break;
            case 16:
                $this->setKodePos($value);
                break;
            case 17:
                $this->setLintang($value);
                break;
            case 18:
                $this->setBujur($value);
                break;
            case 19:
                $this->setJenisTinggalId($value);
                break;
            case 20:
                $this->setAlatTransportasiId($value);
                break;
            case 21:
                $this->setNikAyah($value);
                break;
            case 22:
                $this->setNikIbu($value);
                break;
            case 23:
                $this->setAnakKeberapa($value);
                break;
            case 24:
                $this->setNikWali($value);
                break;
            case 25:
                $this->setNomorTeleponRumah($value);
                break;
            case 26:
                $this->setNomorTeleponSeluler($value);
                break;
            case 27:
                $this->setEmail($value);
                break;
            case 28:
                $this->setPenerimaKps($value);
                break;
            case 29:
                $this->setNoKps($value);
                break;
            case 30:
                $this->setLayakPip($value);
                break;
            case 31:
                $this->setPenerimaKip($value);
                break;
            case 32:
                $this->setNoKip($value);
                break;
            case 33:
                $this->setNmKip($value);
                break;
            case 34:
                $this->setNoKks($value);
                break;
            case 35:
                $this->setRegAktaLahir($value);
                break;
            case 36:
                $this->setIdLayakPip($value);
                break;
            case 37:
                $this->setIdBank($value);
                break;
            case 38:
                $this->setRekeningBank($value);
                break;
            case 39:
                $this->setNamaKcp($value);
                break;
            case 40:
                $this->setRekeningAtasNama($value);
                break;
            case 41:
                $this->setStatusData($value);
                break;
            case 42:
                $this->setNamaAyah($value);
                break;
            case 43:
                $this->setTahunLahirAyah($value);
                break;
            case 44:
                $this->setJenjangPendidikanAyah($value);
                break;
            case 45:
                $this->setPekerjaanIdAyah($value);
                break;
            case 46:
                $this->setPenghasilanIdAyah($value);
                break;
            case 47:
                $this->setKebutuhanKhususIdAyah($value);
                break;
            case 48:
                $this->setNamaIbuKandung($value);
                break;
            case 49:
                $this->setTahunLahirIbu($value);
                break;
            case 50:
                $this->setJenjangPendidikanIbu($value);
                break;
            case 51:
                $this->setPenghasilanIdIbu($value);
                break;
            case 52:
                $this->setPekerjaanIdIbu($value);
                break;
            case 53:
                $this->setKebutuhanKhususIdIbu($value);
                break;
            case 54:
                $this->setNamaWali($value);
                break;
            case 55:
                $this->setTahunLahirWali($value);
                break;
            case 56:
                $this->setJenjangPendidikanWali($value);
                break;
            case 57:
                $this->setPekerjaanIdWali($value);
                break;
            case 58:
                $this->setPenghasilanIdWali($value);
                break;
            case 59:
                $this->setKewarganegaraan($value);
                break;
            case 60:
                $this->setPekerjaanId($value);
                break;
            case 61:
                $this->setCreateDate($value);
                break;
            case 62:
                $this->setLastUpdate($value);
                break;
            case 63:
                $this->setSoftDelete($value);
                break;
            case 64:
                $this->setLastSync($value);
                break;
            case 65:
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
        $keys = PesertaDidikPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setPesertaDidikId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setNama($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setJenisKelamin($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setNisn($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setNik($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setNoKk($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setTempatLahir($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setTanggalLahir($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setAgamaId($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setKebutuhanKhususId($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setAlamatJalan($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setRt($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setRw($arr[$keys[12]]);
        if (array_key_exists($keys[13], $arr)) $this->setNamaDusun($arr[$keys[13]]);
        if (array_key_exists($keys[14], $arr)) $this->setDesaKelurahan($arr[$keys[14]]);
        if (array_key_exists($keys[15], $arr)) $this->setKodeWilayah($arr[$keys[15]]);
        if (array_key_exists($keys[16], $arr)) $this->setKodePos($arr[$keys[16]]);
        if (array_key_exists($keys[17], $arr)) $this->setLintang($arr[$keys[17]]);
        if (array_key_exists($keys[18], $arr)) $this->setBujur($arr[$keys[18]]);
        if (array_key_exists($keys[19], $arr)) $this->setJenisTinggalId($arr[$keys[19]]);
        if (array_key_exists($keys[20], $arr)) $this->setAlatTransportasiId($arr[$keys[20]]);
        if (array_key_exists($keys[21], $arr)) $this->setNikAyah($arr[$keys[21]]);
        if (array_key_exists($keys[22], $arr)) $this->setNikIbu($arr[$keys[22]]);
        if (array_key_exists($keys[23], $arr)) $this->setAnakKeberapa($arr[$keys[23]]);
        if (array_key_exists($keys[24], $arr)) $this->setNikWali($arr[$keys[24]]);
        if (array_key_exists($keys[25], $arr)) $this->setNomorTeleponRumah($arr[$keys[25]]);
        if (array_key_exists($keys[26], $arr)) $this->setNomorTeleponSeluler($arr[$keys[26]]);
        if (array_key_exists($keys[27], $arr)) $this->setEmail($arr[$keys[27]]);
        if (array_key_exists($keys[28], $arr)) $this->setPenerimaKps($arr[$keys[28]]);
        if (array_key_exists($keys[29], $arr)) $this->setNoKps($arr[$keys[29]]);
        if (array_key_exists($keys[30], $arr)) $this->setLayakPip($arr[$keys[30]]);
        if (array_key_exists($keys[31], $arr)) $this->setPenerimaKip($arr[$keys[31]]);
        if (array_key_exists($keys[32], $arr)) $this->setNoKip($arr[$keys[32]]);
        if (array_key_exists($keys[33], $arr)) $this->setNmKip($arr[$keys[33]]);
        if (array_key_exists($keys[34], $arr)) $this->setNoKks($arr[$keys[34]]);
        if (array_key_exists($keys[35], $arr)) $this->setRegAktaLahir($arr[$keys[35]]);
        if (array_key_exists($keys[36], $arr)) $this->setIdLayakPip($arr[$keys[36]]);
        if (array_key_exists($keys[37], $arr)) $this->setIdBank($arr[$keys[37]]);
        if (array_key_exists($keys[38], $arr)) $this->setRekeningBank($arr[$keys[38]]);
        if (array_key_exists($keys[39], $arr)) $this->setNamaKcp($arr[$keys[39]]);
        if (array_key_exists($keys[40], $arr)) $this->setRekeningAtasNama($arr[$keys[40]]);
        if (array_key_exists($keys[41], $arr)) $this->setStatusData($arr[$keys[41]]);
        if (array_key_exists($keys[42], $arr)) $this->setNamaAyah($arr[$keys[42]]);
        if (array_key_exists($keys[43], $arr)) $this->setTahunLahirAyah($arr[$keys[43]]);
        if (array_key_exists($keys[44], $arr)) $this->setJenjangPendidikanAyah($arr[$keys[44]]);
        if (array_key_exists($keys[45], $arr)) $this->setPekerjaanIdAyah($arr[$keys[45]]);
        if (array_key_exists($keys[46], $arr)) $this->setPenghasilanIdAyah($arr[$keys[46]]);
        if (array_key_exists($keys[47], $arr)) $this->setKebutuhanKhususIdAyah($arr[$keys[47]]);
        if (array_key_exists($keys[48], $arr)) $this->setNamaIbuKandung($arr[$keys[48]]);
        if (array_key_exists($keys[49], $arr)) $this->setTahunLahirIbu($arr[$keys[49]]);
        if (array_key_exists($keys[50], $arr)) $this->setJenjangPendidikanIbu($arr[$keys[50]]);
        if (array_key_exists($keys[51], $arr)) $this->setPenghasilanIdIbu($arr[$keys[51]]);
        if (array_key_exists($keys[52], $arr)) $this->setPekerjaanIdIbu($arr[$keys[52]]);
        if (array_key_exists($keys[53], $arr)) $this->setKebutuhanKhususIdIbu($arr[$keys[53]]);
        if (array_key_exists($keys[54], $arr)) $this->setNamaWali($arr[$keys[54]]);
        if (array_key_exists($keys[55], $arr)) $this->setTahunLahirWali($arr[$keys[55]]);
        if (array_key_exists($keys[56], $arr)) $this->setJenjangPendidikanWali($arr[$keys[56]]);
        if (array_key_exists($keys[57], $arr)) $this->setPekerjaanIdWali($arr[$keys[57]]);
        if (array_key_exists($keys[58], $arr)) $this->setPenghasilanIdWali($arr[$keys[58]]);
        if (array_key_exists($keys[59], $arr)) $this->setKewarganegaraan($arr[$keys[59]]);
        if (array_key_exists($keys[60], $arr)) $this->setPekerjaanId($arr[$keys[60]]);
        if (array_key_exists($keys[61], $arr)) $this->setCreateDate($arr[$keys[61]]);
        if (array_key_exists($keys[62], $arr)) $this->setLastUpdate($arr[$keys[62]]);
        if (array_key_exists($keys[63], $arr)) $this->setSoftDelete($arr[$keys[63]]);
        if (array_key_exists($keys[64], $arr)) $this->setLastSync($arr[$keys[64]]);
        if (array_key_exists($keys[65], $arr)) $this->setUpdaterId($arr[$keys[65]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(PesertaDidikPeer::DATABASE_NAME);

        if ($this->isColumnModified(PesertaDidikPeer::PESERTA_DIDIK_ID)) $criteria->add(PesertaDidikPeer::PESERTA_DIDIK_ID, $this->peserta_didik_id);
        if ($this->isColumnModified(PesertaDidikPeer::NAMA)) $criteria->add(PesertaDidikPeer::NAMA, $this->nama);
        if ($this->isColumnModified(PesertaDidikPeer::JENIS_KELAMIN)) $criteria->add(PesertaDidikPeer::JENIS_KELAMIN, $this->jenis_kelamin);
        if ($this->isColumnModified(PesertaDidikPeer::NISN)) $criteria->add(PesertaDidikPeer::NISN, $this->nisn);
        if ($this->isColumnModified(PesertaDidikPeer::NIK)) $criteria->add(PesertaDidikPeer::NIK, $this->nik);
        if ($this->isColumnModified(PesertaDidikPeer::NO_KK)) $criteria->add(PesertaDidikPeer::NO_KK, $this->no_kk);
        if ($this->isColumnModified(PesertaDidikPeer::TEMPAT_LAHIR)) $criteria->add(PesertaDidikPeer::TEMPAT_LAHIR, $this->tempat_lahir);
        if ($this->isColumnModified(PesertaDidikPeer::TANGGAL_LAHIR)) $criteria->add(PesertaDidikPeer::TANGGAL_LAHIR, $this->tanggal_lahir);
        if ($this->isColumnModified(PesertaDidikPeer::AGAMA_ID)) $criteria->add(PesertaDidikPeer::AGAMA_ID, $this->agama_id);
        if ($this->isColumnModified(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID)) $criteria->add(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID, $this->kebutuhan_khusus_id);
        if ($this->isColumnModified(PesertaDidikPeer::ALAMAT_JALAN)) $criteria->add(PesertaDidikPeer::ALAMAT_JALAN, $this->alamat_jalan);
        if ($this->isColumnModified(PesertaDidikPeer::RT)) $criteria->add(PesertaDidikPeer::RT, $this->rt);
        if ($this->isColumnModified(PesertaDidikPeer::RW)) $criteria->add(PesertaDidikPeer::RW, $this->rw);
        if ($this->isColumnModified(PesertaDidikPeer::NAMA_DUSUN)) $criteria->add(PesertaDidikPeer::NAMA_DUSUN, $this->nama_dusun);
        if ($this->isColumnModified(PesertaDidikPeer::DESA_KELURAHAN)) $criteria->add(PesertaDidikPeer::DESA_KELURAHAN, $this->desa_kelurahan);
        if ($this->isColumnModified(PesertaDidikPeer::KODE_WILAYAH)) $criteria->add(PesertaDidikPeer::KODE_WILAYAH, $this->kode_wilayah);
        if ($this->isColumnModified(PesertaDidikPeer::KODE_POS)) $criteria->add(PesertaDidikPeer::KODE_POS, $this->kode_pos);
        if ($this->isColumnModified(PesertaDidikPeer::LINTANG)) $criteria->add(PesertaDidikPeer::LINTANG, $this->lintang);
        if ($this->isColumnModified(PesertaDidikPeer::BUJUR)) $criteria->add(PesertaDidikPeer::BUJUR, $this->bujur);
        if ($this->isColumnModified(PesertaDidikPeer::JENIS_TINGGAL_ID)) $criteria->add(PesertaDidikPeer::JENIS_TINGGAL_ID, $this->jenis_tinggal_id);
        if ($this->isColumnModified(PesertaDidikPeer::ALAT_TRANSPORTASI_ID)) $criteria->add(PesertaDidikPeer::ALAT_TRANSPORTASI_ID, $this->alat_transportasi_id);
        if ($this->isColumnModified(PesertaDidikPeer::NIK_AYAH)) $criteria->add(PesertaDidikPeer::NIK_AYAH, $this->nik_ayah);
        if ($this->isColumnModified(PesertaDidikPeer::NIK_IBU)) $criteria->add(PesertaDidikPeer::NIK_IBU, $this->nik_ibu);
        if ($this->isColumnModified(PesertaDidikPeer::ANAK_KEBERAPA)) $criteria->add(PesertaDidikPeer::ANAK_KEBERAPA, $this->anak_keberapa);
        if ($this->isColumnModified(PesertaDidikPeer::NIK_WALI)) $criteria->add(PesertaDidikPeer::NIK_WALI, $this->nik_wali);
        if ($this->isColumnModified(PesertaDidikPeer::NOMOR_TELEPON_RUMAH)) $criteria->add(PesertaDidikPeer::NOMOR_TELEPON_RUMAH, $this->nomor_telepon_rumah);
        if ($this->isColumnModified(PesertaDidikPeer::NOMOR_TELEPON_SELULER)) $criteria->add(PesertaDidikPeer::NOMOR_TELEPON_SELULER, $this->nomor_telepon_seluler);
        if ($this->isColumnModified(PesertaDidikPeer::EMAIL)) $criteria->add(PesertaDidikPeer::EMAIL, $this->email);
        if ($this->isColumnModified(PesertaDidikPeer::PENERIMA_KPS)) $criteria->add(PesertaDidikPeer::PENERIMA_KPS, $this->penerima_kps);
        if ($this->isColumnModified(PesertaDidikPeer::NO_KPS)) $criteria->add(PesertaDidikPeer::NO_KPS, $this->no_kps);
        if ($this->isColumnModified(PesertaDidikPeer::LAYAK_PIP)) $criteria->add(PesertaDidikPeer::LAYAK_PIP, $this->layak_pip);
        if ($this->isColumnModified(PesertaDidikPeer::PENERIMA_KIP)) $criteria->add(PesertaDidikPeer::PENERIMA_KIP, $this->penerima_kip);
        if ($this->isColumnModified(PesertaDidikPeer::NO_KIP)) $criteria->add(PesertaDidikPeer::NO_KIP, $this->no_kip);
        if ($this->isColumnModified(PesertaDidikPeer::NM_KIP)) $criteria->add(PesertaDidikPeer::NM_KIP, $this->nm_kip);
        if ($this->isColumnModified(PesertaDidikPeer::NO_KKS)) $criteria->add(PesertaDidikPeer::NO_KKS, $this->no_kks);
        if ($this->isColumnModified(PesertaDidikPeer::REG_AKTA_LAHIR)) $criteria->add(PesertaDidikPeer::REG_AKTA_LAHIR, $this->reg_akta_lahir);
        if ($this->isColumnModified(PesertaDidikPeer::ID_LAYAK_PIP)) $criteria->add(PesertaDidikPeer::ID_LAYAK_PIP, $this->id_layak_pip);
        if ($this->isColumnModified(PesertaDidikPeer::ID_BANK)) $criteria->add(PesertaDidikPeer::ID_BANK, $this->id_bank);
        if ($this->isColumnModified(PesertaDidikPeer::REKENING_BANK)) $criteria->add(PesertaDidikPeer::REKENING_BANK, $this->rekening_bank);
        if ($this->isColumnModified(PesertaDidikPeer::NAMA_KCP)) $criteria->add(PesertaDidikPeer::NAMA_KCP, $this->nama_kcp);
        if ($this->isColumnModified(PesertaDidikPeer::REKENING_ATAS_NAMA)) $criteria->add(PesertaDidikPeer::REKENING_ATAS_NAMA, $this->rekening_atas_nama);
        if ($this->isColumnModified(PesertaDidikPeer::STATUS_DATA)) $criteria->add(PesertaDidikPeer::STATUS_DATA, $this->status_data);
        if ($this->isColumnModified(PesertaDidikPeer::NAMA_AYAH)) $criteria->add(PesertaDidikPeer::NAMA_AYAH, $this->nama_ayah);
        if ($this->isColumnModified(PesertaDidikPeer::TAHUN_LAHIR_AYAH)) $criteria->add(PesertaDidikPeer::TAHUN_LAHIR_AYAH, $this->tahun_lahir_ayah);
        if ($this->isColumnModified(PesertaDidikPeer::JENJANG_PENDIDIKAN_AYAH)) $criteria->add(PesertaDidikPeer::JENJANG_PENDIDIKAN_AYAH, $this->jenjang_pendidikan_ayah);
        if ($this->isColumnModified(PesertaDidikPeer::PEKERJAAN_ID_AYAH)) $criteria->add(PesertaDidikPeer::PEKERJAAN_ID_AYAH, $this->pekerjaan_id_ayah);
        if ($this->isColumnModified(PesertaDidikPeer::PENGHASILAN_ID_AYAH)) $criteria->add(PesertaDidikPeer::PENGHASILAN_ID_AYAH, $this->penghasilan_id_ayah);
        if ($this->isColumnModified(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID_AYAH)) $criteria->add(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID_AYAH, $this->kebutuhan_khusus_id_ayah);
        if ($this->isColumnModified(PesertaDidikPeer::NAMA_IBU_KANDUNG)) $criteria->add(PesertaDidikPeer::NAMA_IBU_KANDUNG, $this->nama_ibu_kandung);
        if ($this->isColumnModified(PesertaDidikPeer::TAHUN_LAHIR_IBU)) $criteria->add(PesertaDidikPeer::TAHUN_LAHIR_IBU, $this->tahun_lahir_ibu);
        if ($this->isColumnModified(PesertaDidikPeer::JENJANG_PENDIDIKAN_IBU)) $criteria->add(PesertaDidikPeer::JENJANG_PENDIDIKAN_IBU, $this->jenjang_pendidikan_ibu);
        if ($this->isColumnModified(PesertaDidikPeer::PENGHASILAN_ID_IBU)) $criteria->add(PesertaDidikPeer::PENGHASILAN_ID_IBU, $this->penghasilan_id_ibu);
        if ($this->isColumnModified(PesertaDidikPeer::PEKERJAAN_ID_IBU)) $criteria->add(PesertaDidikPeer::PEKERJAAN_ID_IBU, $this->pekerjaan_id_ibu);
        if ($this->isColumnModified(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID_IBU)) $criteria->add(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID_IBU, $this->kebutuhan_khusus_id_ibu);
        if ($this->isColumnModified(PesertaDidikPeer::NAMA_WALI)) $criteria->add(PesertaDidikPeer::NAMA_WALI, $this->nama_wali);
        if ($this->isColumnModified(PesertaDidikPeer::TAHUN_LAHIR_WALI)) $criteria->add(PesertaDidikPeer::TAHUN_LAHIR_WALI, $this->tahun_lahir_wali);
        if ($this->isColumnModified(PesertaDidikPeer::JENJANG_PENDIDIKAN_WALI)) $criteria->add(PesertaDidikPeer::JENJANG_PENDIDIKAN_WALI, $this->jenjang_pendidikan_wali);
        if ($this->isColumnModified(PesertaDidikPeer::PEKERJAAN_ID_WALI)) $criteria->add(PesertaDidikPeer::PEKERJAAN_ID_WALI, $this->pekerjaan_id_wali);
        if ($this->isColumnModified(PesertaDidikPeer::PENGHASILAN_ID_WALI)) $criteria->add(PesertaDidikPeer::PENGHASILAN_ID_WALI, $this->penghasilan_id_wali);
        if ($this->isColumnModified(PesertaDidikPeer::KEWARGANEGARAAN)) $criteria->add(PesertaDidikPeer::KEWARGANEGARAAN, $this->kewarganegaraan);
        if ($this->isColumnModified(PesertaDidikPeer::PEKERJAAN_ID)) $criteria->add(PesertaDidikPeer::PEKERJAAN_ID, $this->pekerjaan_id);
        if ($this->isColumnModified(PesertaDidikPeer::CREATE_DATE)) $criteria->add(PesertaDidikPeer::CREATE_DATE, $this->create_date);
        if ($this->isColumnModified(PesertaDidikPeer::LAST_UPDATE)) $criteria->add(PesertaDidikPeer::LAST_UPDATE, $this->last_update);
        if ($this->isColumnModified(PesertaDidikPeer::SOFT_DELETE)) $criteria->add(PesertaDidikPeer::SOFT_DELETE, $this->soft_delete);
        if ($this->isColumnModified(PesertaDidikPeer::LAST_SYNC)) $criteria->add(PesertaDidikPeer::LAST_SYNC, $this->last_sync);
        if ($this->isColumnModified(PesertaDidikPeer::UPDATER_ID)) $criteria->add(PesertaDidikPeer::UPDATER_ID, $this->updater_id);

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
        $criteria = new Criteria(PesertaDidikPeer::DATABASE_NAME);
        $criteria->add(PesertaDidikPeer::PESERTA_DIDIK_ID, $this->peserta_didik_id);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return string
     */
    public function getPrimaryKey()
    {
        return $this->getPesertaDidikId();
    }

    /**
     * Generic method to set the primary key (peserta_didik_id column).
     *
     * @param  string $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setPesertaDidikId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getPesertaDidikId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of PesertaDidik (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setNama($this->getNama());
        $copyObj->setJenisKelamin($this->getJenisKelamin());
        $copyObj->setNisn($this->getNisn());
        $copyObj->setNik($this->getNik());
        $copyObj->setNoKk($this->getNoKk());
        $copyObj->setTempatLahir($this->getTempatLahir());
        $copyObj->setTanggalLahir($this->getTanggalLahir());
        $copyObj->setAgamaId($this->getAgamaId());
        $copyObj->setKebutuhanKhususId($this->getKebutuhanKhususId());
        $copyObj->setAlamatJalan($this->getAlamatJalan());
        $copyObj->setRt($this->getRt());
        $copyObj->setRw($this->getRw());
        $copyObj->setNamaDusun($this->getNamaDusun());
        $copyObj->setDesaKelurahan($this->getDesaKelurahan());
        $copyObj->setKodeWilayah($this->getKodeWilayah());
        $copyObj->setKodePos($this->getKodePos());
        $copyObj->setLintang($this->getLintang());
        $copyObj->setBujur($this->getBujur());
        $copyObj->setJenisTinggalId($this->getJenisTinggalId());
        $copyObj->setAlatTransportasiId($this->getAlatTransportasiId());
        $copyObj->setNikAyah($this->getNikAyah());
        $copyObj->setNikIbu($this->getNikIbu());
        $copyObj->setAnakKeberapa($this->getAnakKeberapa());
        $copyObj->setNikWali($this->getNikWali());
        $copyObj->setNomorTeleponRumah($this->getNomorTeleponRumah());
        $copyObj->setNomorTeleponSeluler($this->getNomorTeleponSeluler());
        $copyObj->setEmail($this->getEmail());
        $copyObj->setPenerimaKps($this->getPenerimaKps());
        $copyObj->setNoKps($this->getNoKps());
        $copyObj->setLayakPip($this->getLayakPip());
        $copyObj->setPenerimaKip($this->getPenerimaKip());
        $copyObj->setNoKip($this->getNoKip());
        $copyObj->setNmKip($this->getNmKip());
        $copyObj->setNoKks($this->getNoKks());
        $copyObj->setRegAktaLahir($this->getRegAktaLahir());
        $copyObj->setIdLayakPip($this->getIdLayakPip());
        $copyObj->setIdBank($this->getIdBank());
        $copyObj->setRekeningBank($this->getRekeningBank());
        $copyObj->setNamaKcp($this->getNamaKcp());
        $copyObj->setRekeningAtasNama($this->getRekeningAtasNama());
        $copyObj->setStatusData($this->getStatusData());
        $copyObj->setNamaAyah($this->getNamaAyah());
        $copyObj->setTahunLahirAyah($this->getTahunLahirAyah());
        $copyObj->setJenjangPendidikanAyah($this->getJenjangPendidikanAyah());
        $copyObj->setPekerjaanIdAyah($this->getPekerjaanIdAyah());
        $copyObj->setPenghasilanIdAyah($this->getPenghasilanIdAyah());
        $copyObj->setKebutuhanKhususIdAyah($this->getKebutuhanKhususIdAyah());
        $copyObj->setNamaIbuKandung($this->getNamaIbuKandung());
        $copyObj->setTahunLahirIbu($this->getTahunLahirIbu());
        $copyObj->setJenjangPendidikanIbu($this->getJenjangPendidikanIbu());
        $copyObj->setPenghasilanIdIbu($this->getPenghasilanIdIbu());
        $copyObj->setPekerjaanIdIbu($this->getPekerjaanIdIbu());
        $copyObj->setKebutuhanKhususIdIbu($this->getKebutuhanKhususIdIbu());
        $copyObj->setNamaWali($this->getNamaWali());
        $copyObj->setTahunLahirWali($this->getTahunLahirWali());
        $copyObj->setJenjangPendidikanWali($this->getJenjangPendidikanWali());
        $copyObj->setPekerjaanIdWali($this->getPekerjaanIdWali());
        $copyObj->setPenghasilanIdWali($this->getPenghasilanIdWali());
        $copyObj->setKewarganegaraan($this->getKewarganegaraan());
        $copyObj->setPekerjaanId($this->getPekerjaanId());
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

            foreach ($this->getAnggotaPanitias() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addAnggotaPanitia($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getAnggotaRombels() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addAnggotaRombel($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getBeasiswaPesertaDidiks() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addBeasiswaPesertaDidik($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getKesejahteraanPds() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addKesejahteraanPd($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getKitasPds() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addKitasPd($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getPasporPds() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPasporPd($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getPesertaDidikBarus() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPesertaDidikBaru($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getPesertaDidikLongitudinals() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPesertaDidikLongitudinal($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getPrestasis() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPrestasi($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getRegistrasiPesertaDidiks() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addRegistrasiPesertaDidik($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getSertifikasiPds() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSertifikasiPd($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getVldPesertaDidiks() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addVldPesertaDidik($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setPesertaDidikId(NULL); // this is a auto-increment column, so set to default value
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
     * @return PesertaDidik Clone of current object.
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
     * @return PesertaDidikPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new PesertaDidikPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a KebutuhanKhusus object.
     *
     * @param             KebutuhanKhusus $v
     * @return PesertaDidik The current object (for fluent API support)
     * @throws PropelException
     */
    public function setKebutuhanKhususRelatedByKebutuhanKhususIdAyah(KebutuhanKhusus $v = null)
    {
        if ($v === null) {
            $this->setKebutuhanKhususIdAyah(NULL);
        } else {
            $this->setKebutuhanKhususIdAyah($v->getKebutuhanKhususId());
        }

        $this->aKebutuhanKhususRelatedByKebutuhanKhususIdAyah = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the KebutuhanKhusus object, it will not be re-added.
        if ($v !== null) {
            $v->addPesertaDidikRelatedByKebutuhanKhususIdAyah($this);
        }


        return $this;
    }


    /**
     * Get the associated KebutuhanKhusus object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return KebutuhanKhusus The associated KebutuhanKhusus object.
     * @throws PropelException
     */
    public function getKebutuhanKhususRelatedByKebutuhanKhususIdAyah(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aKebutuhanKhususRelatedByKebutuhanKhususIdAyah === null && ($this->kebutuhan_khusus_id_ayah !== null) && $doQuery) {
            $this->aKebutuhanKhususRelatedByKebutuhanKhususIdAyah = KebutuhanKhususQuery::create()->findPk($this->kebutuhan_khusus_id_ayah, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aKebutuhanKhususRelatedByKebutuhanKhususIdAyah->addPesertaDidiksRelatedByKebutuhanKhususIdAyah($this);
             */
        }

        return $this->aKebutuhanKhususRelatedByKebutuhanKhususIdAyah;
    }

    /**
     * Declares an association between this object and a KebutuhanKhusus object.
     *
     * @param             KebutuhanKhusus $v
     * @return PesertaDidik The current object (for fluent API support)
     * @throws PropelException
     */
    public function setKebutuhanKhususRelatedByKebutuhanKhususIdIbu(KebutuhanKhusus $v = null)
    {
        if ($v === null) {
            $this->setKebutuhanKhususIdIbu(NULL);
        } else {
            $this->setKebutuhanKhususIdIbu($v->getKebutuhanKhususId());
        }

        $this->aKebutuhanKhususRelatedByKebutuhanKhususIdIbu = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the KebutuhanKhusus object, it will not be re-added.
        if ($v !== null) {
            $v->addPesertaDidikRelatedByKebutuhanKhususIdIbu($this);
        }


        return $this;
    }


    /**
     * Get the associated KebutuhanKhusus object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return KebutuhanKhusus The associated KebutuhanKhusus object.
     * @throws PropelException
     */
    public function getKebutuhanKhususRelatedByKebutuhanKhususIdIbu(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aKebutuhanKhususRelatedByKebutuhanKhususIdIbu === null && ($this->kebutuhan_khusus_id_ibu !== null) && $doQuery) {
            $this->aKebutuhanKhususRelatedByKebutuhanKhususIdIbu = KebutuhanKhususQuery::create()->findPk($this->kebutuhan_khusus_id_ibu, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aKebutuhanKhususRelatedByKebutuhanKhususIdIbu->addPesertaDidiksRelatedByKebutuhanKhususIdIbu($this);
             */
        }

        return $this->aKebutuhanKhususRelatedByKebutuhanKhususIdIbu;
    }

    /**
     * Declares an association between this object and a Negara object.
     *
     * @param             Negara $v
     * @return PesertaDidik The current object (for fluent API support)
     * @throws PropelException
     */
    public function setNegara(Negara $v = null)
    {
        if ($v === null) {
            $this->setKewarganegaraan(NULL);
        } else {
            $this->setKewarganegaraan($v->getNegaraId());
        }

        $this->aNegara = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Negara object, it will not be re-added.
        if ($v !== null) {
            $v->addPesertaDidik($this);
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
        if ($this->aNegara === null && (($this->kewarganegaraan !== "" && $this->kewarganegaraan !== null)) && $doQuery) {
            $this->aNegara = NegaraQuery::create()->findPk($this->kewarganegaraan, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aNegara->addPesertaDidiks($this);
             */
        }

        return $this->aNegara;
    }

    /**
     * Declares an association between this object and a AlasanLayakPip object.
     *
     * @param             AlasanLayakPip $v
     * @return PesertaDidik The current object (for fluent API support)
     * @throws PropelException
     */
    public function setAlasanLayakPip(AlasanLayakPip $v = null)
    {
        if ($v === null) {
            $this->setIdLayakPip(NULL);
        } else {
            $this->setIdLayakPip($v->getIdLayakPip());
        }

        $this->aAlasanLayakPip = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the AlasanLayakPip object, it will not be re-added.
        if ($v !== null) {
            $v->addPesertaDidik($this);
        }


        return $this;
    }


    /**
     * Get the associated AlasanLayakPip object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return AlasanLayakPip The associated AlasanLayakPip object.
     * @throws PropelException
     */
    public function getAlasanLayakPip(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aAlasanLayakPip === null && (($this->id_layak_pip !== "" && $this->id_layak_pip !== null)) && $doQuery) {
            $this->aAlasanLayakPip = AlasanLayakPipQuery::create()->findPk($this->id_layak_pip, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aAlasanLayakPip->addPesertaDidiks($this);
             */
        }

        return $this->aAlasanLayakPip;
    }

    /**
     * Declares an association between this object and a Bank object.
     *
     * @param             Bank $v
     * @return PesertaDidik The current object (for fluent API support)
     * @throws PropelException
     */
    public function setBank(Bank $v = null)
    {
        if ($v === null) {
            $this->setIdBank(NULL);
        } else {
            $this->setIdBank($v->getIdBank());
        }

        $this->aBank = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Bank object, it will not be re-added.
        if ($v !== null) {
            $v->addPesertaDidik($this);
        }


        return $this;
    }


    /**
     * Get the associated Bank object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Bank The associated Bank object.
     * @throws PropelException
     */
    public function getBank(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aBank === null && (($this->id_bank !== "" && $this->id_bank !== null)) && $doQuery) {
            $this->aBank = BankQuery::create()->findPk($this->id_bank, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aBank->addPesertaDidiks($this);
             */
        }

        return $this->aBank;
    }

    /**
     * Declares an association between this object and a MstWilayah object.
     *
     * @param             MstWilayah $v
     * @return PesertaDidik The current object (for fluent API support)
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
            $v->addPesertaDidik($this);
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
                $this->aMstWilayah->addPesertaDidiks($this);
             */
        }

        return $this->aMstWilayah;
    }

    /**
     * Declares an association between this object and a KebutuhanKhusus object.
     *
     * @param             KebutuhanKhusus $v
     * @return PesertaDidik The current object (for fluent API support)
     * @throws PropelException
     */
    public function setKebutuhanKhususRelatedByKebutuhanKhususId(KebutuhanKhusus $v = null)
    {
        if ($v === null) {
            $this->setKebutuhanKhususId(NULL);
        } else {
            $this->setKebutuhanKhususId($v->getKebutuhanKhususId());
        }

        $this->aKebutuhanKhususRelatedByKebutuhanKhususId = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the KebutuhanKhusus object, it will not be re-added.
        if ($v !== null) {
            $v->addPesertaDidikRelatedByKebutuhanKhususId($this);
        }


        return $this;
    }


    /**
     * Get the associated KebutuhanKhusus object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return KebutuhanKhusus The associated KebutuhanKhusus object.
     * @throws PropelException
     */
    public function getKebutuhanKhususRelatedByKebutuhanKhususId(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aKebutuhanKhususRelatedByKebutuhanKhususId === null && ($this->kebutuhan_khusus_id !== null) && $doQuery) {
            $this->aKebutuhanKhususRelatedByKebutuhanKhususId = KebutuhanKhususQuery::create()->findPk($this->kebutuhan_khusus_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aKebutuhanKhususRelatedByKebutuhanKhususId->addPesertaDidiksRelatedByKebutuhanKhususId($this);
             */
        }

        return $this->aKebutuhanKhususRelatedByKebutuhanKhususId;
    }

    /**
     * Declares an association between this object and a Pekerjaan object.
     *
     * @param             Pekerjaan $v
     * @return PesertaDidik The current object (for fluent API support)
     * @throws PropelException
     */
    public function setPekerjaanRelatedByPekerjaanId(Pekerjaan $v = null)
    {
        if ($v === null) {
            $this->setPekerjaanId(NULL);
        } else {
            $this->setPekerjaanId($v->getPekerjaanId());
        }

        $this->aPekerjaanRelatedByPekerjaanId = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Pekerjaan object, it will not be re-added.
        if ($v !== null) {
            $v->addPesertaDidikRelatedByPekerjaanId($this);
        }


        return $this;
    }


    /**
     * Get the associated Pekerjaan object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Pekerjaan The associated Pekerjaan object.
     * @throws PropelException
     */
    public function getPekerjaanRelatedByPekerjaanId(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aPekerjaanRelatedByPekerjaanId === null && ($this->pekerjaan_id !== null) && $doQuery) {
            $this->aPekerjaanRelatedByPekerjaanId = PekerjaanQuery::create()->findPk($this->pekerjaan_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aPekerjaanRelatedByPekerjaanId->addPesertaDidiksRelatedByPekerjaanId($this);
             */
        }

        return $this->aPekerjaanRelatedByPekerjaanId;
    }

    /**
     * Declares an association between this object and a Agama object.
     *
     * @param             Agama $v
     * @return PesertaDidik The current object (for fluent API support)
     * @throws PropelException
     */
    public function setAgama(Agama $v = null)
    {
        if ($v === null) {
            $this->setAgamaId(NULL);
        } else {
            $this->setAgamaId($v->getAgamaId());
        }

        $this->aAgama = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Agama object, it will not be re-added.
        if ($v !== null) {
            $v->addPesertaDidik($this);
        }


        return $this;
    }


    /**
     * Get the associated Agama object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Agama The associated Agama object.
     * @throws PropelException
     */
    public function getAgama(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aAgama === null && ($this->agama_id !== null) && $doQuery) {
            $this->aAgama = AgamaQuery::create()->findPk($this->agama_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aAgama->addPesertaDidiks($this);
             */
        }

        return $this->aAgama;
    }

    /**
     * Declares an association between this object and a Penghasilan object.
     *
     * @param             Penghasilan $v
     * @return PesertaDidik The current object (for fluent API support)
     * @throws PropelException
     */
    public function setPenghasilanRelatedByPenghasilanIdAyah(Penghasilan $v = null)
    {
        if ($v === null) {
            $this->setPenghasilanIdAyah(NULL);
        } else {
            $this->setPenghasilanIdAyah($v->getPenghasilanId());
        }

        $this->aPenghasilanRelatedByPenghasilanIdAyah = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Penghasilan object, it will not be re-added.
        if ($v !== null) {
            $v->addPesertaDidikRelatedByPenghasilanIdAyah($this);
        }


        return $this;
    }


    /**
     * Get the associated Penghasilan object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Penghasilan The associated Penghasilan object.
     * @throws PropelException
     */
    public function getPenghasilanRelatedByPenghasilanIdAyah(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aPenghasilanRelatedByPenghasilanIdAyah === null && ($this->penghasilan_id_ayah !== null) && $doQuery) {
            $this->aPenghasilanRelatedByPenghasilanIdAyah = PenghasilanQuery::create()->findPk($this->penghasilan_id_ayah, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aPenghasilanRelatedByPenghasilanIdAyah->addPesertaDidiksRelatedByPenghasilanIdAyah($this);
             */
        }

        return $this->aPenghasilanRelatedByPenghasilanIdAyah;
    }

    /**
     * Declares an association between this object and a JenisTinggal object.
     *
     * @param             JenisTinggal $v
     * @return PesertaDidik The current object (for fluent API support)
     * @throws PropelException
     */
    public function setJenisTinggal(JenisTinggal $v = null)
    {
        if ($v === null) {
            $this->setJenisTinggalId(NULL);
        } else {
            $this->setJenisTinggalId($v->getJenisTinggalId());
        }

        $this->aJenisTinggal = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the JenisTinggal object, it will not be re-added.
        if ($v !== null) {
            $v->addPesertaDidik($this);
        }


        return $this;
    }


    /**
     * Get the associated JenisTinggal object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return JenisTinggal The associated JenisTinggal object.
     * @throws PropelException
     */
    public function getJenisTinggal(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aJenisTinggal === null && (($this->jenis_tinggal_id !== "" && $this->jenis_tinggal_id !== null)) && $doQuery) {
            $this->aJenisTinggal = JenisTinggalQuery::create()->findPk($this->jenis_tinggal_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aJenisTinggal->addPesertaDidiks($this);
             */
        }

        return $this->aJenisTinggal;
    }

    /**
     * Declares an association between this object and a AlatTransportasi object.
     *
     * @param             AlatTransportasi $v
     * @return PesertaDidik The current object (for fluent API support)
     * @throws PropelException
     */
    public function setAlatTransportasi(AlatTransportasi $v = null)
    {
        if ($v === null) {
            $this->setAlatTransportasiId(NULL);
        } else {
            $this->setAlatTransportasiId($v->getAlatTransportasiId());
        }

        $this->aAlatTransportasi = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the AlatTransportasi object, it will not be re-added.
        if ($v !== null) {
            $v->addPesertaDidik($this);
        }


        return $this;
    }


    /**
     * Get the associated AlatTransportasi object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return AlatTransportasi The associated AlatTransportasi object.
     * @throws PropelException
     */
    public function getAlatTransportasi(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aAlatTransportasi === null && (($this->alat_transportasi_id !== "" && $this->alat_transportasi_id !== null)) && $doQuery) {
            $this->aAlatTransportasi = AlatTransportasiQuery::create()->findPk($this->alat_transportasi_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aAlatTransportasi->addPesertaDidiks($this);
             */
        }

        return $this->aAlatTransportasi;
    }

    /**
     * Declares an association between this object and a Pekerjaan object.
     *
     * @param             Pekerjaan $v
     * @return PesertaDidik The current object (for fluent API support)
     * @throws PropelException
     */
    public function setPekerjaanRelatedByPekerjaanIdAyah(Pekerjaan $v = null)
    {
        if ($v === null) {
            $this->setPekerjaanIdAyah(NULL);
        } else {
            $this->setPekerjaanIdAyah($v->getPekerjaanId());
        }

        $this->aPekerjaanRelatedByPekerjaanIdAyah = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Pekerjaan object, it will not be re-added.
        if ($v !== null) {
            $v->addPesertaDidikRelatedByPekerjaanIdAyah($this);
        }


        return $this;
    }


    /**
     * Get the associated Pekerjaan object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Pekerjaan The associated Pekerjaan object.
     * @throws PropelException
     */
    public function getPekerjaanRelatedByPekerjaanIdAyah(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aPekerjaanRelatedByPekerjaanIdAyah === null && ($this->pekerjaan_id_ayah !== null) && $doQuery) {
            $this->aPekerjaanRelatedByPekerjaanIdAyah = PekerjaanQuery::create()->findPk($this->pekerjaan_id_ayah, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aPekerjaanRelatedByPekerjaanIdAyah->addPesertaDidiksRelatedByPekerjaanIdAyah($this);
             */
        }

        return $this->aPekerjaanRelatedByPekerjaanIdAyah;
    }

    /**
     * Declares an association between this object and a JenjangPendidikan object.
     *
     * @param             JenjangPendidikan $v
     * @return PesertaDidik The current object (for fluent API support)
     * @throws PropelException
     */
    public function setJenjangPendidikanRelatedByJenjangPendidikanIbu(JenjangPendidikan $v = null)
    {
        if ($v === null) {
            $this->setJenjangPendidikanIbu(NULL);
        } else {
            $this->setJenjangPendidikanIbu($v->getJenjangPendidikanId());
        }

        $this->aJenjangPendidikanRelatedByJenjangPendidikanIbu = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the JenjangPendidikan object, it will not be re-added.
        if ($v !== null) {
            $v->addPesertaDidikRelatedByJenjangPendidikanIbu($this);
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
    public function getJenjangPendidikanRelatedByJenjangPendidikanIbu(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aJenjangPendidikanRelatedByJenjangPendidikanIbu === null && (($this->jenjang_pendidikan_ibu !== "" && $this->jenjang_pendidikan_ibu !== null)) && $doQuery) {
            $this->aJenjangPendidikanRelatedByJenjangPendidikanIbu = JenjangPendidikanQuery::create()->findPk($this->jenjang_pendidikan_ibu, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aJenjangPendidikanRelatedByJenjangPendidikanIbu->addPesertaDidiksRelatedByJenjangPendidikanIbu($this);
             */
        }

        return $this->aJenjangPendidikanRelatedByJenjangPendidikanIbu;
    }

    /**
     * Declares an association between this object and a Penghasilan object.
     *
     * @param             Penghasilan $v
     * @return PesertaDidik The current object (for fluent API support)
     * @throws PropelException
     */
    public function setPenghasilanRelatedByPenghasilanIdWali(Penghasilan $v = null)
    {
        if ($v === null) {
            $this->setPenghasilanIdWali(NULL);
        } else {
            $this->setPenghasilanIdWali($v->getPenghasilanId());
        }

        $this->aPenghasilanRelatedByPenghasilanIdWali = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Penghasilan object, it will not be re-added.
        if ($v !== null) {
            $v->addPesertaDidikRelatedByPenghasilanIdWali($this);
        }


        return $this;
    }


    /**
     * Get the associated Penghasilan object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Penghasilan The associated Penghasilan object.
     * @throws PropelException
     */
    public function getPenghasilanRelatedByPenghasilanIdWali(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aPenghasilanRelatedByPenghasilanIdWali === null && ($this->penghasilan_id_wali !== null) && $doQuery) {
            $this->aPenghasilanRelatedByPenghasilanIdWali = PenghasilanQuery::create()->findPk($this->penghasilan_id_wali, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aPenghasilanRelatedByPenghasilanIdWali->addPesertaDidiksRelatedByPenghasilanIdWali($this);
             */
        }

        return $this->aPenghasilanRelatedByPenghasilanIdWali;
    }

    /**
     * Declares an association between this object and a Pekerjaan object.
     *
     * @param             Pekerjaan $v
     * @return PesertaDidik The current object (for fluent API support)
     * @throws PropelException
     */
    public function setPekerjaanRelatedByPekerjaanIdIbu(Pekerjaan $v = null)
    {
        if ($v === null) {
            $this->setPekerjaanIdIbu(NULL);
        } else {
            $this->setPekerjaanIdIbu($v->getPekerjaanId());
        }

        $this->aPekerjaanRelatedByPekerjaanIdIbu = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Pekerjaan object, it will not be re-added.
        if ($v !== null) {
            $v->addPesertaDidikRelatedByPekerjaanIdIbu($this);
        }


        return $this;
    }


    /**
     * Get the associated Pekerjaan object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Pekerjaan The associated Pekerjaan object.
     * @throws PropelException
     */
    public function getPekerjaanRelatedByPekerjaanIdIbu(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aPekerjaanRelatedByPekerjaanIdIbu === null && ($this->pekerjaan_id_ibu !== null) && $doQuery) {
            $this->aPekerjaanRelatedByPekerjaanIdIbu = PekerjaanQuery::create()->findPk($this->pekerjaan_id_ibu, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aPekerjaanRelatedByPekerjaanIdIbu->addPesertaDidiksRelatedByPekerjaanIdIbu($this);
             */
        }

        return $this->aPekerjaanRelatedByPekerjaanIdIbu;
    }

    /**
     * Declares an association between this object and a JenjangPendidikan object.
     *
     * @param             JenjangPendidikan $v
     * @return PesertaDidik The current object (for fluent API support)
     * @throws PropelException
     */
    public function setJenjangPendidikanRelatedByJenjangPendidikanAyah(JenjangPendidikan $v = null)
    {
        if ($v === null) {
            $this->setJenjangPendidikanAyah(NULL);
        } else {
            $this->setJenjangPendidikanAyah($v->getJenjangPendidikanId());
        }

        $this->aJenjangPendidikanRelatedByJenjangPendidikanAyah = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the JenjangPendidikan object, it will not be re-added.
        if ($v !== null) {
            $v->addPesertaDidikRelatedByJenjangPendidikanAyah($this);
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
    public function getJenjangPendidikanRelatedByJenjangPendidikanAyah(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aJenjangPendidikanRelatedByJenjangPendidikanAyah === null && (($this->jenjang_pendidikan_ayah !== "" && $this->jenjang_pendidikan_ayah !== null)) && $doQuery) {
            $this->aJenjangPendidikanRelatedByJenjangPendidikanAyah = JenjangPendidikanQuery::create()->findPk($this->jenjang_pendidikan_ayah, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aJenjangPendidikanRelatedByJenjangPendidikanAyah->addPesertaDidiksRelatedByJenjangPendidikanAyah($this);
             */
        }

        return $this->aJenjangPendidikanRelatedByJenjangPendidikanAyah;
    }

    /**
     * Declares an association between this object and a Penghasilan object.
     *
     * @param             Penghasilan $v
     * @return PesertaDidik The current object (for fluent API support)
     * @throws PropelException
     */
    public function setPenghasilanRelatedByPenghasilanIdIbu(Penghasilan $v = null)
    {
        if ($v === null) {
            $this->setPenghasilanIdIbu(NULL);
        } else {
            $this->setPenghasilanIdIbu($v->getPenghasilanId());
        }

        $this->aPenghasilanRelatedByPenghasilanIdIbu = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Penghasilan object, it will not be re-added.
        if ($v !== null) {
            $v->addPesertaDidikRelatedByPenghasilanIdIbu($this);
        }


        return $this;
    }


    /**
     * Get the associated Penghasilan object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Penghasilan The associated Penghasilan object.
     * @throws PropelException
     */
    public function getPenghasilanRelatedByPenghasilanIdIbu(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aPenghasilanRelatedByPenghasilanIdIbu === null && ($this->penghasilan_id_ibu !== null) && $doQuery) {
            $this->aPenghasilanRelatedByPenghasilanIdIbu = PenghasilanQuery::create()->findPk($this->penghasilan_id_ibu, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aPenghasilanRelatedByPenghasilanIdIbu->addPesertaDidiksRelatedByPenghasilanIdIbu($this);
             */
        }

        return $this->aPenghasilanRelatedByPenghasilanIdIbu;
    }

    /**
     * Declares an association between this object and a Pekerjaan object.
     *
     * @param             Pekerjaan $v
     * @return PesertaDidik The current object (for fluent API support)
     * @throws PropelException
     */
    public function setPekerjaanRelatedByPekerjaanIdWali(Pekerjaan $v = null)
    {
        if ($v === null) {
            $this->setPekerjaanIdWali(NULL);
        } else {
            $this->setPekerjaanIdWali($v->getPekerjaanId());
        }

        $this->aPekerjaanRelatedByPekerjaanIdWali = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Pekerjaan object, it will not be re-added.
        if ($v !== null) {
            $v->addPesertaDidikRelatedByPekerjaanIdWali($this);
        }


        return $this;
    }


    /**
     * Get the associated Pekerjaan object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Pekerjaan The associated Pekerjaan object.
     * @throws PropelException
     */
    public function getPekerjaanRelatedByPekerjaanIdWali(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aPekerjaanRelatedByPekerjaanIdWali === null && ($this->pekerjaan_id_wali !== null) && $doQuery) {
            $this->aPekerjaanRelatedByPekerjaanIdWali = PekerjaanQuery::create()->findPk($this->pekerjaan_id_wali, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aPekerjaanRelatedByPekerjaanIdWali->addPesertaDidiksRelatedByPekerjaanIdWali($this);
             */
        }

        return $this->aPekerjaanRelatedByPekerjaanIdWali;
    }

    /**
     * Declares an association between this object and a JenjangPendidikan object.
     *
     * @param             JenjangPendidikan $v
     * @return PesertaDidik The current object (for fluent API support)
     * @throws PropelException
     */
    public function setJenjangPendidikanRelatedByJenjangPendidikanWali(JenjangPendidikan $v = null)
    {
        if ($v === null) {
            $this->setJenjangPendidikanWali(NULL);
        } else {
            $this->setJenjangPendidikanWali($v->getJenjangPendidikanId());
        }

        $this->aJenjangPendidikanRelatedByJenjangPendidikanWali = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the JenjangPendidikan object, it will not be re-added.
        if ($v !== null) {
            $v->addPesertaDidikRelatedByJenjangPendidikanWali($this);
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
    public function getJenjangPendidikanRelatedByJenjangPendidikanWali(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aJenjangPendidikanRelatedByJenjangPendidikanWali === null && (($this->jenjang_pendidikan_wali !== "" && $this->jenjang_pendidikan_wali !== null)) && $doQuery) {
            $this->aJenjangPendidikanRelatedByJenjangPendidikanWali = JenjangPendidikanQuery::create()->findPk($this->jenjang_pendidikan_wali, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aJenjangPendidikanRelatedByJenjangPendidikanWali->addPesertaDidiksRelatedByJenjangPendidikanWali($this);
             */
        }

        return $this->aJenjangPendidikanRelatedByJenjangPendidikanWali;
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
        if ('AnggotaPanitia' == $relationName) {
            $this->initAnggotaPanitias();
        }
        if ('AnggotaRombel' == $relationName) {
            $this->initAnggotaRombels();
        }
        if ('BeasiswaPesertaDidik' == $relationName) {
            $this->initBeasiswaPesertaDidiks();
        }
        if ('KesejahteraanPd' == $relationName) {
            $this->initKesejahteraanPds();
        }
        if ('KitasPd' == $relationName) {
            $this->initKitasPds();
        }
        if ('PasporPd' == $relationName) {
            $this->initPasporPds();
        }
        if ('PesertaDidikBaru' == $relationName) {
            $this->initPesertaDidikBarus();
        }
        if ('PesertaDidikLongitudinal' == $relationName) {
            $this->initPesertaDidikLongitudinals();
        }
        if ('Prestasi' == $relationName) {
            $this->initPrestasis();
        }
        if ('RegistrasiPesertaDidik' == $relationName) {
            $this->initRegistrasiPesertaDidiks();
        }
        if ('SertifikasiPd' == $relationName) {
            $this->initSertifikasiPds();
        }
        if ('VldPesertaDidik' == $relationName) {
            $this->initVldPesertaDidiks();
        }
    }

    /**
     * Clears out the collAnggotaPanitias collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return PesertaDidik The current object (for fluent API support)
     * @see        addAnggotaPanitias()
     */
    public function clearAnggotaPanitias()
    {
        $this->collAnggotaPanitias = null; // important to set this to null since that means it is uninitialized
        $this->collAnggotaPanitiasPartial = null;

        return $this;
    }

    /**
     * reset is the collAnggotaPanitias collection loaded partially
     *
     * @return void
     */
    public function resetPartialAnggotaPanitias($v = true)
    {
        $this->collAnggotaPanitiasPartial = $v;
    }

    /**
     * Initializes the collAnggotaPanitias collection.
     *
     * By default this just sets the collAnggotaPanitias collection to an empty array (like clearcollAnggotaPanitias());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initAnggotaPanitias($overrideExisting = true)
    {
        if (null !== $this->collAnggotaPanitias && !$overrideExisting) {
            return;
        }
        $this->collAnggotaPanitias = new PropelObjectCollection();
        $this->collAnggotaPanitias->setModel('AnggotaPanitia');
    }

    /**
     * Gets an array of AnggotaPanitia objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this PesertaDidik is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|AnggotaPanitia[] List of AnggotaPanitia objects
     * @throws PropelException
     */
    public function getAnggotaPanitias($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collAnggotaPanitiasPartial && !$this->isNew();
        if (null === $this->collAnggotaPanitias || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collAnggotaPanitias) {
                // return empty collection
                $this->initAnggotaPanitias();
            } else {
                $collAnggotaPanitias = AnggotaPanitiaQuery::create(null, $criteria)
                    ->filterByPesertaDidik($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collAnggotaPanitiasPartial && count($collAnggotaPanitias)) {
                      $this->initAnggotaPanitias(false);

                      foreach($collAnggotaPanitias as $obj) {
                        if (false == $this->collAnggotaPanitias->contains($obj)) {
                          $this->collAnggotaPanitias->append($obj);
                        }
                      }

                      $this->collAnggotaPanitiasPartial = true;
                    }

                    $collAnggotaPanitias->getInternalIterator()->rewind();
                    return $collAnggotaPanitias;
                }

                if($partial && $this->collAnggotaPanitias) {
                    foreach($this->collAnggotaPanitias as $obj) {
                        if($obj->isNew()) {
                            $collAnggotaPanitias[] = $obj;
                        }
                    }
                }

                $this->collAnggotaPanitias = $collAnggotaPanitias;
                $this->collAnggotaPanitiasPartial = false;
            }
        }

        return $this->collAnggotaPanitias;
    }

    /**
     * Sets a collection of AnggotaPanitia objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $anggotaPanitias A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return PesertaDidik The current object (for fluent API support)
     */
    public function setAnggotaPanitias(PropelCollection $anggotaPanitias, PropelPDO $con = null)
    {
        $anggotaPanitiasToDelete = $this->getAnggotaPanitias(new Criteria(), $con)->diff($anggotaPanitias);

        $this->anggotaPanitiasScheduledForDeletion = unserialize(serialize($anggotaPanitiasToDelete));

        foreach ($anggotaPanitiasToDelete as $anggotaPanitiaRemoved) {
            $anggotaPanitiaRemoved->setPesertaDidik(null);
        }

        $this->collAnggotaPanitias = null;
        foreach ($anggotaPanitias as $anggotaPanitia) {
            $this->addAnggotaPanitia($anggotaPanitia);
        }

        $this->collAnggotaPanitias = $anggotaPanitias;
        $this->collAnggotaPanitiasPartial = false;

        return $this;
    }

    /**
     * Returns the number of related AnggotaPanitia objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related AnggotaPanitia objects.
     * @throws PropelException
     */
    public function countAnggotaPanitias(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collAnggotaPanitiasPartial && !$this->isNew();
        if (null === $this->collAnggotaPanitias || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collAnggotaPanitias) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getAnggotaPanitias());
            }
            $query = AnggotaPanitiaQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPesertaDidik($this)
                ->count($con);
        }

        return count($this->collAnggotaPanitias);
    }

    /**
     * Method called to associate a AnggotaPanitia object to this object
     * through the AnggotaPanitia foreign key attribute.
     *
     * @param    AnggotaPanitia $l AnggotaPanitia
     * @return PesertaDidik The current object (for fluent API support)
     */
    public function addAnggotaPanitia(AnggotaPanitia $l)
    {
        if ($this->collAnggotaPanitias === null) {
            $this->initAnggotaPanitias();
            $this->collAnggotaPanitiasPartial = true;
        }
        if (!in_array($l, $this->collAnggotaPanitias->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddAnggotaPanitia($l);
        }

        return $this;
    }

    /**
     * @param	AnggotaPanitia $anggotaPanitia The anggotaPanitia object to add.
     */
    protected function doAddAnggotaPanitia($anggotaPanitia)
    {
        $this->collAnggotaPanitias[]= $anggotaPanitia;
        $anggotaPanitia->setPesertaDidik($this);
    }

    /**
     * @param	AnggotaPanitia $anggotaPanitia The anggotaPanitia object to remove.
     * @return PesertaDidik The current object (for fluent API support)
     */
    public function removeAnggotaPanitia($anggotaPanitia)
    {
        if ($this->getAnggotaPanitias()->contains($anggotaPanitia)) {
            $this->collAnggotaPanitias->remove($this->collAnggotaPanitias->search($anggotaPanitia));
            if (null === $this->anggotaPanitiasScheduledForDeletion) {
                $this->anggotaPanitiasScheduledForDeletion = clone $this->collAnggotaPanitias;
                $this->anggotaPanitiasScheduledForDeletion->clear();
            }
            $this->anggotaPanitiasScheduledForDeletion[]= $anggotaPanitia;
            $anggotaPanitia->setPesertaDidik(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PesertaDidik is new, it will return
     * an empty collection; or if this PesertaDidik has previously
     * been saved, it will retrieve related AnggotaPanitias from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PesertaDidik.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|AnggotaPanitia[] List of AnggotaPanitia objects
     */
    public function getAnggotaPanitiasJoinPtk($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = AnggotaPanitiaQuery::create(null, $criteria);
        $query->joinWith('Ptk', $join_behavior);

        return $this->getAnggotaPanitias($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PesertaDidik is new, it will return
     * an empty collection; or if this PesertaDidik has previously
     * been saved, it will retrieve related AnggotaPanitias from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PesertaDidik.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|AnggotaPanitia[] List of AnggotaPanitia objects
     */
    public function getAnggotaPanitiasJoinKepanitiaan($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = AnggotaPanitiaQuery::create(null, $criteria);
        $query->joinWith('Kepanitiaan', $join_behavior);

        return $this->getAnggotaPanitias($query, $con);
    }

    /**
     * Clears out the collAnggotaRombels collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return PesertaDidik The current object (for fluent API support)
     * @see        addAnggotaRombels()
     */
    public function clearAnggotaRombels()
    {
        $this->collAnggotaRombels = null; // important to set this to null since that means it is uninitialized
        $this->collAnggotaRombelsPartial = null;

        return $this;
    }

    /**
     * reset is the collAnggotaRombels collection loaded partially
     *
     * @return void
     */
    public function resetPartialAnggotaRombels($v = true)
    {
        $this->collAnggotaRombelsPartial = $v;
    }

    /**
     * Initializes the collAnggotaRombels collection.
     *
     * By default this just sets the collAnggotaRombels collection to an empty array (like clearcollAnggotaRombels());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initAnggotaRombels($overrideExisting = true)
    {
        if (null !== $this->collAnggotaRombels && !$overrideExisting) {
            return;
        }
        $this->collAnggotaRombels = new PropelObjectCollection();
        $this->collAnggotaRombels->setModel('AnggotaRombel');
    }

    /**
     * Gets an array of AnggotaRombel objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this PesertaDidik is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|AnggotaRombel[] List of AnggotaRombel objects
     * @throws PropelException
     */
    public function getAnggotaRombels($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collAnggotaRombelsPartial && !$this->isNew();
        if (null === $this->collAnggotaRombels || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collAnggotaRombels) {
                // return empty collection
                $this->initAnggotaRombels();
            } else {
                $collAnggotaRombels = AnggotaRombelQuery::create(null, $criteria)
                    ->filterByPesertaDidik($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collAnggotaRombelsPartial && count($collAnggotaRombels)) {
                      $this->initAnggotaRombels(false);

                      foreach($collAnggotaRombels as $obj) {
                        if (false == $this->collAnggotaRombels->contains($obj)) {
                          $this->collAnggotaRombels->append($obj);
                        }
                      }

                      $this->collAnggotaRombelsPartial = true;
                    }

                    $collAnggotaRombels->getInternalIterator()->rewind();
                    return $collAnggotaRombels;
                }

                if($partial && $this->collAnggotaRombels) {
                    foreach($this->collAnggotaRombels as $obj) {
                        if($obj->isNew()) {
                            $collAnggotaRombels[] = $obj;
                        }
                    }
                }

                $this->collAnggotaRombels = $collAnggotaRombels;
                $this->collAnggotaRombelsPartial = false;
            }
        }

        return $this->collAnggotaRombels;
    }

    /**
     * Sets a collection of AnggotaRombel objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $anggotaRombels A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return PesertaDidik The current object (for fluent API support)
     */
    public function setAnggotaRombels(PropelCollection $anggotaRombels, PropelPDO $con = null)
    {
        $anggotaRombelsToDelete = $this->getAnggotaRombels(new Criteria(), $con)->diff($anggotaRombels);

        $this->anggotaRombelsScheduledForDeletion = unserialize(serialize($anggotaRombelsToDelete));

        foreach ($anggotaRombelsToDelete as $anggotaRombelRemoved) {
            $anggotaRombelRemoved->setPesertaDidik(null);
        }

        $this->collAnggotaRombels = null;
        foreach ($anggotaRombels as $anggotaRombel) {
            $this->addAnggotaRombel($anggotaRombel);
        }

        $this->collAnggotaRombels = $anggotaRombels;
        $this->collAnggotaRombelsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related AnggotaRombel objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related AnggotaRombel objects.
     * @throws PropelException
     */
    public function countAnggotaRombels(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collAnggotaRombelsPartial && !$this->isNew();
        if (null === $this->collAnggotaRombels || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collAnggotaRombels) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getAnggotaRombels());
            }
            $query = AnggotaRombelQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPesertaDidik($this)
                ->count($con);
        }

        return count($this->collAnggotaRombels);
    }

    /**
     * Method called to associate a AnggotaRombel object to this object
     * through the AnggotaRombel foreign key attribute.
     *
     * @param    AnggotaRombel $l AnggotaRombel
     * @return PesertaDidik The current object (for fluent API support)
     */
    public function addAnggotaRombel(AnggotaRombel $l)
    {
        if ($this->collAnggotaRombels === null) {
            $this->initAnggotaRombels();
            $this->collAnggotaRombelsPartial = true;
        }
        if (!in_array($l, $this->collAnggotaRombels->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddAnggotaRombel($l);
        }

        return $this;
    }

    /**
     * @param	AnggotaRombel $anggotaRombel The anggotaRombel object to add.
     */
    protected function doAddAnggotaRombel($anggotaRombel)
    {
        $this->collAnggotaRombels[]= $anggotaRombel;
        $anggotaRombel->setPesertaDidik($this);
    }

    /**
     * @param	AnggotaRombel $anggotaRombel The anggotaRombel object to remove.
     * @return PesertaDidik The current object (for fluent API support)
     */
    public function removeAnggotaRombel($anggotaRombel)
    {
        if ($this->getAnggotaRombels()->contains($anggotaRombel)) {
            $this->collAnggotaRombels->remove($this->collAnggotaRombels->search($anggotaRombel));
            if (null === $this->anggotaRombelsScheduledForDeletion) {
                $this->anggotaRombelsScheduledForDeletion = clone $this->collAnggotaRombels;
                $this->anggotaRombelsScheduledForDeletion->clear();
            }
            $this->anggotaRombelsScheduledForDeletion[]= clone $anggotaRombel;
            $anggotaRombel->setPesertaDidik(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PesertaDidik is new, it will return
     * an empty collection; or if this PesertaDidik has previously
     * been saved, it will retrieve related AnggotaRombels from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PesertaDidik.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|AnggotaRombel[] List of AnggotaRombel objects
     */
    public function getAnggotaRombelsJoinRombonganBelajar($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = AnggotaRombelQuery::create(null, $criteria);
        $query->joinWith('RombonganBelajar', $join_behavior);

        return $this->getAnggotaRombels($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PesertaDidik is new, it will return
     * an empty collection; or if this PesertaDidik has previously
     * been saved, it will retrieve related AnggotaRombels from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PesertaDidik.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|AnggotaRombel[] List of AnggotaRombel objects
     */
    public function getAnggotaRombelsJoinJenisPendaftaran($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = AnggotaRombelQuery::create(null, $criteria);
        $query->joinWith('JenisPendaftaran', $join_behavior);

        return $this->getAnggotaRombels($query, $con);
    }

    /**
     * Clears out the collBeasiswaPesertaDidiks collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return PesertaDidik The current object (for fluent API support)
     * @see        addBeasiswaPesertaDidiks()
     */
    public function clearBeasiswaPesertaDidiks()
    {
        $this->collBeasiswaPesertaDidiks = null; // important to set this to null since that means it is uninitialized
        $this->collBeasiswaPesertaDidiksPartial = null;

        return $this;
    }

    /**
     * reset is the collBeasiswaPesertaDidiks collection loaded partially
     *
     * @return void
     */
    public function resetPartialBeasiswaPesertaDidiks($v = true)
    {
        $this->collBeasiswaPesertaDidiksPartial = $v;
    }

    /**
     * Initializes the collBeasiswaPesertaDidiks collection.
     *
     * By default this just sets the collBeasiswaPesertaDidiks collection to an empty array (like clearcollBeasiswaPesertaDidiks());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initBeasiswaPesertaDidiks($overrideExisting = true)
    {
        if (null !== $this->collBeasiswaPesertaDidiks && !$overrideExisting) {
            return;
        }
        $this->collBeasiswaPesertaDidiks = new PropelObjectCollection();
        $this->collBeasiswaPesertaDidiks->setModel('BeasiswaPesertaDidik');
    }

    /**
     * Gets an array of BeasiswaPesertaDidik objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this PesertaDidik is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|BeasiswaPesertaDidik[] List of BeasiswaPesertaDidik objects
     * @throws PropelException
     */
    public function getBeasiswaPesertaDidiks($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collBeasiswaPesertaDidiksPartial && !$this->isNew();
        if (null === $this->collBeasiswaPesertaDidiks || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collBeasiswaPesertaDidiks) {
                // return empty collection
                $this->initBeasiswaPesertaDidiks();
            } else {
                $collBeasiswaPesertaDidiks = BeasiswaPesertaDidikQuery::create(null, $criteria)
                    ->filterByPesertaDidik($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collBeasiswaPesertaDidiksPartial && count($collBeasiswaPesertaDidiks)) {
                      $this->initBeasiswaPesertaDidiks(false);

                      foreach($collBeasiswaPesertaDidiks as $obj) {
                        if (false == $this->collBeasiswaPesertaDidiks->contains($obj)) {
                          $this->collBeasiswaPesertaDidiks->append($obj);
                        }
                      }

                      $this->collBeasiswaPesertaDidiksPartial = true;
                    }

                    $collBeasiswaPesertaDidiks->getInternalIterator()->rewind();
                    return $collBeasiswaPesertaDidiks;
                }

                if($partial && $this->collBeasiswaPesertaDidiks) {
                    foreach($this->collBeasiswaPesertaDidiks as $obj) {
                        if($obj->isNew()) {
                            $collBeasiswaPesertaDidiks[] = $obj;
                        }
                    }
                }

                $this->collBeasiswaPesertaDidiks = $collBeasiswaPesertaDidiks;
                $this->collBeasiswaPesertaDidiksPartial = false;
            }
        }

        return $this->collBeasiswaPesertaDidiks;
    }

    /**
     * Sets a collection of BeasiswaPesertaDidik objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $beasiswaPesertaDidiks A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return PesertaDidik The current object (for fluent API support)
     */
    public function setBeasiswaPesertaDidiks(PropelCollection $beasiswaPesertaDidiks, PropelPDO $con = null)
    {
        $beasiswaPesertaDidiksToDelete = $this->getBeasiswaPesertaDidiks(new Criteria(), $con)->diff($beasiswaPesertaDidiks);

        $this->beasiswaPesertaDidiksScheduledForDeletion = unserialize(serialize($beasiswaPesertaDidiksToDelete));

        foreach ($beasiswaPesertaDidiksToDelete as $beasiswaPesertaDidikRemoved) {
            $beasiswaPesertaDidikRemoved->setPesertaDidik(null);
        }

        $this->collBeasiswaPesertaDidiks = null;
        foreach ($beasiswaPesertaDidiks as $beasiswaPesertaDidik) {
            $this->addBeasiswaPesertaDidik($beasiswaPesertaDidik);
        }

        $this->collBeasiswaPesertaDidiks = $beasiswaPesertaDidiks;
        $this->collBeasiswaPesertaDidiksPartial = false;

        return $this;
    }

    /**
     * Returns the number of related BeasiswaPesertaDidik objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related BeasiswaPesertaDidik objects.
     * @throws PropelException
     */
    public function countBeasiswaPesertaDidiks(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collBeasiswaPesertaDidiksPartial && !$this->isNew();
        if (null === $this->collBeasiswaPesertaDidiks || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collBeasiswaPesertaDidiks) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getBeasiswaPesertaDidiks());
            }
            $query = BeasiswaPesertaDidikQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPesertaDidik($this)
                ->count($con);
        }

        return count($this->collBeasiswaPesertaDidiks);
    }

    /**
     * Method called to associate a BeasiswaPesertaDidik object to this object
     * through the BeasiswaPesertaDidik foreign key attribute.
     *
     * @param    BeasiswaPesertaDidik $l BeasiswaPesertaDidik
     * @return PesertaDidik The current object (for fluent API support)
     */
    public function addBeasiswaPesertaDidik(BeasiswaPesertaDidik $l)
    {
        if ($this->collBeasiswaPesertaDidiks === null) {
            $this->initBeasiswaPesertaDidiks();
            $this->collBeasiswaPesertaDidiksPartial = true;
        }
        if (!in_array($l, $this->collBeasiswaPesertaDidiks->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddBeasiswaPesertaDidik($l);
        }

        return $this;
    }

    /**
     * @param	BeasiswaPesertaDidik $beasiswaPesertaDidik The beasiswaPesertaDidik object to add.
     */
    protected function doAddBeasiswaPesertaDidik($beasiswaPesertaDidik)
    {
        $this->collBeasiswaPesertaDidiks[]= $beasiswaPesertaDidik;
        $beasiswaPesertaDidik->setPesertaDidik($this);
    }

    /**
     * @param	BeasiswaPesertaDidik $beasiswaPesertaDidik The beasiswaPesertaDidik object to remove.
     * @return PesertaDidik The current object (for fluent API support)
     */
    public function removeBeasiswaPesertaDidik($beasiswaPesertaDidik)
    {
        if ($this->getBeasiswaPesertaDidiks()->contains($beasiswaPesertaDidik)) {
            $this->collBeasiswaPesertaDidiks->remove($this->collBeasiswaPesertaDidiks->search($beasiswaPesertaDidik));
            if (null === $this->beasiswaPesertaDidiksScheduledForDeletion) {
                $this->beasiswaPesertaDidiksScheduledForDeletion = clone $this->collBeasiswaPesertaDidiks;
                $this->beasiswaPesertaDidiksScheduledForDeletion->clear();
            }
            $this->beasiswaPesertaDidiksScheduledForDeletion[]= clone $beasiswaPesertaDidik;
            $beasiswaPesertaDidik->setPesertaDidik(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PesertaDidik is new, it will return
     * an empty collection; or if this PesertaDidik has previously
     * been saved, it will retrieve related BeasiswaPesertaDidiks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PesertaDidik.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|BeasiswaPesertaDidik[] List of BeasiswaPesertaDidik objects
     */
    public function getBeasiswaPesertaDidiksJoinTahunAjaranRelatedByTahunSelesai($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = BeasiswaPesertaDidikQuery::create(null, $criteria);
        $query->joinWith('TahunAjaranRelatedByTahunSelesai', $join_behavior);

        return $this->getBeasiswaPesertaDidiks($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PesertaDidik is new, it will return
     * an empty collection; or if this PesertaDidik has previously
     * been saved, it will retrieve related BeasiswaPesertaDidiks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PesertaDidik.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|BeasiswaPesertaDidik[] List of BeasiswaPesertaDidik objects
     */
    public function getBeasiswaPesertaDidiksJoinTahunAjaranRelatedByTahunMulai($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = BeasiswaPesertaDidikQuery::create(null, $criteria);
        $query->joinWith('TahunAjaranRelatedByTahunMulai', $join_behavior);

        return $this->getBeasiswaPesertaDidiks($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PesertaDidik is new, it will return
     * an empty collection; or if this PesertaDidik has previously
     * been saved, it will retrieve related BeasiswaPesertaDidiks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PesertaDidik.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|BeasiswaPesertaDidik[] List of BeasiswaPesertaDidik objects
     */
    public function getBeasiswaPesertaDidiksJoinJenisBeasiswa($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = BeasiswaPesertaDidikQuery::create(null, $criteria);
        $query->joinWith('JenisBeasiswa', $join_behavior);

        return $this->getBeasiswaPesertaDidiks($query, $con);
    }

    /**
     * Clears out the collKesejahteraanPds collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return PesertaDidik The current object (for fluent API support)
     * @see        addKesejahteraanPds()
     */
    public function clearKesejahteraanPds()
    {
        $this->collKesejahteraanPds = null; // important to set this to null since that means it is uninitialized
        $this->collKesejahteraanPdsPartial = null;

        return $this;
    }

    /**
     * reset is the collKesejahteraanPds collection loaded partially
     *
     * @return void
     */
    public function resetPartialKesejahteraanPds($v = true)
    {
        $this->collKesejahteraanPdsPartial = $v;
    }

    /**
     * Initializes the collKesejahteraanPds collection.
     *
     * By default this just sets the collKesejahteraanPds collection to an empty array (like clearcollKesejahteraanPds());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initKesejahteraanPds($overrideExisting = true)
    {
        if (null !== $this->collKesejahteraanPds && !$overrideExisting) {
            return;
        }
        $this->collKesejahteraanPds = new PropelObjectCollection();
        $this->collKesejahteraanPds->setModel('KesejahteraanPd');
    }

    /**
     * Gets an array of KesejahteraanPd objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this PesertaDidik is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|KesejahteraanPd[] List of KesejahteraanPd objects
     * @throws PropelException
     */
    public function getKesejahteraanPds($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collKesejahteraanPdsPartial && !$this->isNew();
        if (null === $this->collKesejahteraanPds || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collKesejahteraanPds) {
                // return empty collection
                $this->initKesejahteraanPds();
            } else {
                $collKesejahteraanPds = KesejahteraanPdQuery::create(null, $criteria)
                    ->filterByPesertaDidik($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collKesejahteraanPdsPartial && count($collKesejahteraanPds)) {
                      $this->initKesejahteraanPds(false);

                      foreach($collKesejahteraanPds as $obj) {
                        if (false == $this->collKesejahteraanPds->contains($obj)) {
                          $this->collKesejahteraanPds->append($obj);
                        }
                      }

                      $this->collKesejahteraanPdsPartial = true;
                    }

                    $collKesejahteraanPds->getInternalIterator()->rewind();
                    return $collKesejahteraanPds;
                }

                if($partial && $this->collKesejahteraanPds) {
                    foreach($this->collKesejahteraanPds as $obj) {
                        if($obj->isNew()) {
                            $collKesejahteraanPds[] = $obj;
                        }
                    }
                }

                $this->collKesejahteraanPds = $collKesejahteraanPds;
                $this->collKesejahteraanPdsPartial = false;
            }
        }

        return $this->collKesejahteraanPds;
    }

    /**
     * Sets a collection of KesejahteraanPd objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $kesejahteraanPds A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return PesertaDidik The current object (for fluent API support)
     */
    public function setKesejahteraanPds(PropelCollection $kesejahteraanPds, PropelPDO $con = null)
    {
        $kesejahteraanPdsToDelete = $this->getKesejahteraanPds(new Criteria(), $con)->diff($kesejahteraanPds);

        $this->kesejahteraanPdsScheduledForDeletion = unserialize(serialize($kesejahteraanPdsToDelete));

        foreach ($kesejahteraanPdsToDelete as $kesejahteraanPdRemoved) {
            $kesejahteraanPdRemoved->setPesertaDidik(null);
        }

        $this->collKesejahteraanPds = null;
        foreach ($kesejahteraanPds as $kesejahteraanPd) {
            $this->addKesejahteraanPd($kesejahteraanPd);
        }

        $this->collKesejahteraanPds = $kesejahteraanPds;
        $this->collKesejahteraanPdsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related KesejahteraanPd objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related KesejahteraanPd objects.
     * @throws PropelException
     */
    public function countKesejahteraanPds(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collKesejahteraanPdsPartial && !$this->isNew();
        if (null === $this->collKesejahteraanPds || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collKesejahteraanPds) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getKesejahteraanPds());
            }
            $query = KesejahteraanPdQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPesertaDidik($this)
                ->count($con);
        }

        return count($this->collKesejahteraanPds);
    }

    /**
     * Method called to associate a KesejahteraanPd object to this object
     * through the KesejahteraanPd foreign key attribute.
     *
     * @param    KesejahteraanPd $l KesejahteraanPd
     * @return PesertaDidik The current object (for fluent API support)
     */
    public function addKesejahteraanPd(KesejahteraanPd $l)
    {
        if ($this->collKesejahteraanPds === null) {
            $this->initKesejahteraanPds();
            $this->collKesejahteraanPdsPartial = true;
        }
        if (!in_array($l, $this->collKesejahteraanPds->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddKesejahteraanPd($l);
        }

        return $this;
    }

    /**
     * @param	KesejahteraanPd $kesejahteraanPd The kesejahteraanPd object to add.
     */
    protected function doAddKesejahteraanPd($kesejahteraanPd)
    {
        $this->collKesejahteraanPds[]= $kesejahteraanPd;
        $kesejahteraanPd->setPesertaDidik($this);
    }

    /**
     * @param	KesejahteraanPd $kesejahteraanPd The kesejahteraanPd object to remove.
     * @return PesertaDidik The current object (for fluent API support)
     */
    public function removeKesejahteraanPd($kesejahteraanPd)
    {
        if ($this->getKesejahteraanPds()->contains($kesejahteraanPd)) {
            $this->collKesejahteraanPds->remove($this->collKesejahteraanPds->search($kesejahteraanPd));
            if (null === $this->kesejahteraanPdsScheduledForDeletion) {
                $this->kesejahteraanPdsScheduledForDeletion = clone $this->collKesejahteraanPds;
                $this->kesejahteraanPdsScheduledForDeletion->clear();
            }
            $this->kesejahteraanPdsScheduledForDeletion[]= clone $kesejahteraanPd;
            $kesejahteraanPd->setPesertaDidik(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PesertaDidik is new, it will return
     * an empty collection; or if this PesertaDidik has previously
     * been saved, it will retrieve related KesejahteraanPds from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PesertaDidik.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|KesejahteraanPd[] List of KesejahteraanPd objects
     */
    public function getKesejahteraanPdsJoinJenisKesejahteraan($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = KesejahteraanPdQuery::create(null, $criteria);
        $query->joinWith('JenisKesejahteraan', $join_behavior);

        return $this->getKesejahteraanPds($query, $con);
    }

    /**
     * Clears out the collKitasPds collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return PesertaDidik The current object (for fluent API support)
     * @see        addKitasPds()
     */
    public function clearKitasPds()
    {
        $this->collKitasPds = null; // important to set this to null since that means it is uninitialized
        $this->collKitasPdsPartial = null;

        return $this;
    }

    /**
     * reset is the collKitasPds collection loaded partially
     *
     * @return void
     */
    public function resetPartialKitasPds($v = true)
    {
        $this->collKitasPdsPartial = $v;
    }

    /**
     * Initializes the collKitasPds collection.
     *
     * By default this just sets the collKitasPds collection to an empty array (like clearcollKitasPds());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initKitasPds($overrideExisting = true)
    {
        if (null !== $this->collKitasPds && !$overrideExisting) {
            return;
        }
        $this->collKitasPds = new PropelObjectCollection();
        $this->collKitasPds->setModel('KitasPd');
    }

    /**
     * Gets an array of KitasPd objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this PesertaDidik is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|KitasPd[] List of KitasPd objects
     * @throws PropelException
     */
    public function getKitasPds($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collKitasPdsPartial && !$this->isNew();
        if (null === $this->collKitasPds || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collKitasPds) {
                // return empty collection
                $this->initKitasPds();
            } else {
                $collKitasPds = KitasPdQuery::create(null, $criteria)
                    ->filterByPesertaDidik($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collKitasPdsPartial && count($collKitasPds)) {
                      $this->initKitasPds(false);

                      foreach($collKitasPds as $obj) {
                        if (false == $this->collKitasPds->contains($obj)) {
                          $this->collKitasPds->append($obj);
                        }
                      }

                      $this->collKitasPdsPartial = true;
                    }

                    $collKitasPds->getInternalIterator()->rewind();
                    return $collKitasPds;
                }

                if($partial && $this->collKitasPds) {
                    foreach($this->collKitasPds as $obj) {
                        if($obj->isNew()) {
                            $collKitasPds[] = $obj;
                        }
                    }
                }

                $this->collKitasPds = $collKitasPds;
                $this->collKitasPdsPartial = false;
            }
        }

        return $this->collKitasPds;
    }

    /**
     * Sets a collection of KitasPd objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $kitasPds A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return PesertaDidik The current object (for fluent API support)
     */
    public function setKitasPds(PropelCollection $kitasPds, PropelPDO $con = null)
    {
        $kitasPdsToDelete = $this->getKitasPds(new Criteria(), $con)->diff($kitasPds);

        $this->kitasPdsScheduledForDeletion = unserialize(serialize($kitasPdsToDelete));

        foreach ($kitasPdsToDelete as $kitasPdRemoved) {
            $kitasPdRemoved->setPesertaDidik(null);
        }

        $this->collKitasPds = null;
        foreach ($kitasPds as $kitasPd) {
            $this->addKitasPd($kitasPd);
        }

        $this->collKitasPds = $kitasPds;
        $this->collKitasPdsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related KitasPd objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related KitasPd objects.
     * @throws PropelException
     */
    public function countKitasPds(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collKitasPdsPartial && !$this->isNew();
        if (null === $this->collKitasPds || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collKitasPds) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getKitasPds());
            }
            $query = KitasPdQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPesertaDidik($this)
                ->count($con);
        }

        return count($this->collKitasPds);
    }

    /**
     * Method called to associate a KitasPd object to this object
     * through the KitasPd foreign key attribute.
     *
     * @param    KitasPd $l KitasPd
     * @return PesertaDidik The current object (for fluent API support)
     */
    public function addKitasPd(KitasPd $l)
    {
        if ($this->collKitasPds === null) {
            $this->initKitasPds();
            $this->collKitasPdsPartial = true;
        }
        if (!in_array($l, $this->collKitasPds->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddKitasPd($l);
        }

        return $this;
    }

    /**
     * @param	KitasPd $kitasPd The kitasPd object to add.
     */
    protected function doAddKitasPd($kitasPd)
    {
        $this->collKitasPds[]= $kitasPd;
        $kitasPd->setPesertaDidik($this);
    }

    /**
     * @param	KitasPd $kitasPd The kitasPd object to remove.
     * @return PesertaDidik The current object (for fluent API support)
     */
    public function removeKitasPd($kitasPd)
    {
        if ($this->getKitasPds()->contains($kitasPd)) {
            $this->collKitasPds->remove($this->collKitasPds->search($kitasPd));
            if (null === $this->kitasPdsScheduledForDeletion) {
                $this->kitasPdsScheduledForDeletion = clone $this->collKitasPds;
                $this->kitasPdsScheduledForDeletion->clear();
            }
            $this->kitasPdsScheduledForDeletion[]= clone $kitasPd;
            $kitasPd->setPesertaDidik(null);
        }

        return $this;
    }

    /**
     * Clears out the collPasporPds collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return PesertaDidik The current object (for fluent API support)
     * @see        addPasporPds()
     */
    public function clearPasporPds()
    {
        $this->collPasporPds = null; // important to set this to null since that means it is uninitialized
        $this->collPasporPdsPartial = null;

        return $this;
    }

    /**
     * reset is the collPasporPds collection loaded partially
     *
     * @return void
     */
    public function resetPartialPasporPds($v = true)
    {
        $this->collPasporPdsPartial = $v;
    }

    /**
     * Initializes the collPasporPds collection.
     *
     * By default this just sets the collPasporPds collection to an empty array (like clearcollPasporPds());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPasporPds($overrideExisting = true)
    {
        if (null !== $this->collPasporPds && !$overrideExisting) {
            return;
        }
        $this->collPasporPds = new PropelObjectCollection();
        $this->collPasporPds->setModel('PasporPd');
    }

    /**
     * Gets an array of PasporPd objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this PesertaDidik is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|PasporPd[] List of PasporPd objects
     * @throws PropelException
     */
    public function getPasporPds($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collPasporPdsPartial && !$this->isNew();
        if (null === $this->collPasporPds || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collPasporPds) {
                // return empty collection
                $this->initPasporPds();
            } else {
                $collPasporPds = PasporPdQuery::create(null, $criteria)
                    ->filterByPesertaDidik($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collPasporPdsPartial && count($collPasporPds)) {
                      $this->initPasporPds(false);

                      foreach($collPasporPds as $obj) {
                        if (false == $this->collPasporPds->contains($obj)) {
                          $this->collPasporPds->append($obj);
                        }
                      }

                      $this->collPasporPdsPartial = true;
                    }

                    $collPasporPds->getInternalIterator()->rewind();
                    return $collPasporPds;
                }

                if($partial && $this->collPasporPds) {
                    foreach($this->collPasporPds as $obj) {
                        if($obj->isNew()) {
                            $collPasporPds[] = $obj;
                        }
                    }
                }

                $this->collPasporPds = $collPasporPds;
                $this->collPasporPdsPartial = false;
            }
        }

        return $this->collPasporPds;
    }

    /**
     * Sets a collection of PasporPd objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $pasporPds A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return PesertaDidik The current object (for fluent API support)
     */
    public function setPasporPds(PropelCollection $pasporPds, PropelPDO $con = null)
    {
        $pasporPdsToDelete = $this->getPasporPds(new Criteria(), $con)->diff($pasporPds);

        $this->pasporPdsScheduledForDeletion = unserialize(serialize($pasporPdsToDelete));

        foreach ($pasporPdsToDelete as $pasporPdRemoved) {
            $pasporPdRemoved->setPesertaDidik(null);
        }

        $this->collPasporPds = null;
        foreach ($pasporPds as $pasporPd) {
            $this->addPasporPd($pasporPd);
        }

        $this->collPasporPds = $pasporPds;
        $this->collPasporPdsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related PasporPd objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related PasporPd objects.
     * @throws PropelException
     */
    public function countPasporPds(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collPasporPdsPartial && !$this->isNew();
        if (null === $this->collPasporPds || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPasporPds) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getPasporPds());
            }
            $query = PasporPdQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPesertaDidik($this)
                ->count($con);
        }

        return count($this->collPasporPds);
    }

    /**
     * Method called to associate a PasporPd object to this object
     * through the PasporPd foreign key attribute.
     *
     * @param    PasporPd $l PasporPd
     * @return PesertaDidik The current object (for fluent API support)
     */
    public function addPasporPd(PasporPd $l)
    {
        if ($this->collPasporPds === null) {
            $this->initPasporPds();
            $this->collPasporPdsPartial = true;
        }
        if (!in_array($l, $this->collPasporPds->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddPasporPd($l);
        }

        return $this;
    }

    /**
     * @param	PasporPd $pasporPd The pasporPd object to add.
     */
    protected function doAddPasporPd($pasporPd)
    {
        $this->collPasporPds[]= $pasporPd;
        $pasporPd->setPesertaDidik($this);
    }

    /**
     * @param	PasporPd $pasporPd The pasporPd object to remove.
     * @return PesertaDidik The current object (for fluent API support)
     */
    public function removePasporPd($pasporPd)
    {
        if ($this->getPasporPds()->contains($pasporPd)) {
            $this->collPasporPds->remove($this->collPasporPds->search($pasporPd));
            if (null === $this->pasporPdsScheduledForDeletion) {
                $this->pasporPdsScheduledForDeletion = clone $this->collPasporPds;
                $this->pasporPdsScheduledForDeletion->clear();
            }
            $this->pasporPdsScheduledForDeletion[]= clone $pasporPd;
            $pasporPd->setPesertaDidik(null);
        }

        return $this;
    }

    /**
     * Clears out the collPesertaDidikBarus collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return PesertaDidik The current object (for fluent API support)
     * @see        addPesertaDidikBarus()
     */
    public function clearPesertaDidikBarus()
    {
        $this->collPesertaDidikBarus = null; // important to set this to null since that means it is uninitialized
        $this->collPesertaDidikBarusPartial = null;

        return $this;
    }

    /**
     * reset is the collPesertaDidikBarus collection loaded partially
     *
     * @return void
     */
    public function resetPartialPesertaDidikBarus($v = true)
    {
        $this->collPesertaDidikBarusPartial = $v;
    }

    /**
     * Initializes the collPesertaDidikBarus collection.
     *
     * By default this just sets the collPesertaDidikBarus collection to an empty array (like clearcollPesertaDidikBarus());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPesertaDidikBarus($overrideExisting = true)
    {
        if (null !== $this->collPesertaDidikBarus && !$overrideExisting) {
            return;
        }
        $this->collPesertaDidikBarus = new PropelObjectCollection();
        $this->collPesertaDidikBarus->setModel('PesertaDidikBaru');
    }

    /**
     * Gets an array of PesertaDidikBaru objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this PesertaDidik is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|PesertaDidikBaru[] List of PesertaDidikBaru objects
     * @throws PropelException
     */
    public function getPesertaDidikBarus($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collPesertaDidikBarusPartial && !$this->isNew();
        if (null === $this->collPesertaDidikBarus || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collPesertaDidikBarus) {
                // return empty collection
                $this->initPesertaDidikBarus();
            } else {
                $collPesertaDidikBarus = PesertaDidikBaruQuery::create(null, $criteria)
                    ->filterByPesertaDidik($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collPesertaDidikBarusPartial && count($collPesertaDidikBarus)) {
                      $this->initPesertaDidikBarus(false);

                      foreach($collPesertaDidikBarus as $obj) {
                        if (false == $this->collPesertaDidikBarus->contains($obj)) {
                          $this->collPesertaDidikBarus->append($obj);
                        }
                      }

                      $this->collPesertaDidikBarusPartial = true;
                    }

                    $collPesertaDidikBarus->getInternalIterator()->rewind();
                    return $collPesertaDidikBarus;
                }

                if($partial && $this->collPesertaDidikBarus) {
                    foreach($this->collPesertaDidikBarus as $obj) {
                        if($obj->isNew()) {
                            $collPesertaDidikBarus[] = $obj;
                        }
                    }
                }

                $this->collPesertaDidikBarus = $collPesertaDidikBarus;
                $this->collPesertaDidikBarusPartial = false;
            }
        }

        return $this->collPesertaDidikBarus;
    }

    /**
     * Sets a collection of PesertaDidikBaru objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $pesertaDidikBarus A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return PesertaDidik The current object (for fluent API support)
     */
    public function setPesertaDidikBarus(PropelCollection $pesertaDidikBarus, PropelPDO $con = null)
    {
        $pesertaDidikBarusToDelete = $this->getPesertaDidikBarus(new Criteria(), $con)->diff($pesertaDidikBarus);

        $this->pesertaDidikBarusScheduledForDeletion = unserialize(serialize($pesertaDidikBarusToDelete));

        foreach ($pesertaDidikBarusToDelete as $pesertaDidikBaruRemoved) {
            $pesertaDidikBaruRemoved->setPesertaDidik(null);
        }

        $this->collPesertaDidikBarus = null;
        foreach ($pesertaDidikBarus as $pesertaDidikBaru) {
            $this->addPesertaDidikBaru($pesertaDidikBaru);
        }

        $this->collPesertaDidikBarus = $pesertaDidikBarus;
        $this->collPesertaDidikBarusPartial = false;

        return $this;
    }

    /**
     * Returns the number of related PesertaDidikBaru objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related PesertaDidikBaru objects.
     * @throws PropelException
     */
    public function countPesertaDidikBarus(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collPesertaDidikBarusPartial && !$this->isNew();
        if (null === $this->collPesertaDidikBarus || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPesertaDidikBarus) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getPesertaDidikBarus());
            }
            $query = PesertaDidikBaruQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPesertaDidik($this)
                ->count($con);
        }

        return count($this->collPesertaDidikBarus);
    }

    /**
     * Method called to associate a PesertaDidikBaru object to this object
     * through the PesertaDidikBaru foreign key attribute.
     *
     * @param    PesertaDidikBaru $l PesertaDidikBaru
     * @return PesertaDidik The current object (for fluent API support)
     */
    public function addPesertaDidikBaru(PesertaDidikBaru $l)
    {
        if ($this->collPesertaDidikBarus === null) {
            $this->initPesertaDidikBarus();
            $this->collPesertaDidikBarusPartial = true;
        }
        if (!in_array($l, $this->collPesertaDidikBarus->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddPesertaDidikBaru($l);
        }

        return $this;
    }

    /**
     * @param	PesertaDidikBaru $pesertaDidikBaru The pesertaDidikBaru object to add.
     */
    protected function doAddPesertaDidikBaru($pesertaDidikBaru)
    {
        $this->collPesertaDidikBarus[]= $pesertaDidikBaru;
        $pesertaDidikBaru->setPesertaDidik($this);
    }

    /**
     * @param	PesertaDidikBaru $pesertaDidikBaru The pesertaDidikBaru object to remove.
     * @return PesertaDidik The current object (for fluent API support)
     */
    public function removePesertaDidikBaru($pesertaDidikBaru)
    {
        if ($this->getPesertaDidikBarus()->contains($pesertaDidikBaru)) {
            $this->collPesertaDidikBarus->remove($this->collPesertaDidikBarus->search($pesertaDidikBaru));
            if (null === $this->pesertaDidikBarusScheduledForDeletion) {
                $this->pesertaDidikBarusScheduledForDeletion = clone $this->collPesertaDidikBarus;
                $this->pesertaDidikBarusScheduledForDeletion->clear();
            }
            $this->pesertaDidikBarusScheduledForDeletion[]= $pesertaDidikBaru;
            $pesertaDidikBaru->setPesertaDidik(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PesertaDidik is new, it will return
     * an empty collection; or if this PesertaDidik has previously
     * been saved, it will retrieve related PesertaDidikBarus from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PesertaDidik.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidikBaru[] List of PesertaDidikBaru objects
     */
    public function getPesertaDidikBarusJoinJenisPendaftaran($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikBaruQuery::create(null, $criteria);
        $query->joinWith('JenisPendaftaran', $join_behavior);

        return $this->getPesertaDidikBarus($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PesertaDidik is new, it will return
     * an empty collection; or if this PesertaDidik has previously
     * been saved, it will retrieve related PesertaDidikBarus from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PesertaDidik.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidikBaru[] List of PesertaDidikBaru objects
     */
    public function getPesertaDidikBarusJoinSekolah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikBaruQuery::create(null, $criteria);
        $query->joinWith('Sekolah', $join_behavior);

        return $this->getPesertaDidikBarus($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PesertaDidik is new, it will return
     * an empty collection; or if this PesertaDidik has previously
     * been saved, it will retrieve related PesertaDidikBarus from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PesertaDidik.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidikBaru[] List of PesertaDidikBaru objects
     */
    public function getPesertaDidikBarusJoinTahunAjaran($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikBaruQuery::create(null, $criteria);
        $query->joinWith('TahunAjaran', $join_behavior);

        return $this->getPesertaDidikBarus($query, $con);
    }

    /**
     * Clears out the collPesertaDidikLongitudinals collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return PesertaDidik The current object (for fluent API support)
     * @see        addPesertaDidikLongitudinals()
     */
    public function clearPesertaDidikLongitudinals()
    {
        $this->collPesertaDidikLongitudinals = null; // important to set this to null since that means it is uninitialized
        $this->collPesertaDidikLongitudinalsPartial = null;

        return $this;
    }

    /**
     * reset is the collPesertaDidikLongitudinals collection loaded partially
     *
     * @return void
     */
    public function resetPartialPesertaDidikLongitudinals($v = true)
    {
        $this->collPesertaDidikLongitudinalsPartial = $v;
    }

    /**
     * Initializes the collPesertaDidikLongitudinals collection.
     *
     * By default this just sets the collPesertaDidikLongitudinals collection to an empty array (like clearcollPesertaDidikLongitudinals());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPesertaDidikLongitudinals($overrideExisting = true)
    {
        if (null !== $this->collPesertaDidikLongitudinals && !$overrideExisting) {
            return;
        }
        $this->collPesertaDidikLongitudinals = new PropelObjectCollection();
        $this->collPesertaDidikLongitudinals->setModel('PesertaDidikLongitudinal');
    }

    /**
     * Gets an array of PesertaDidikLongitudinal objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this PesertaDidik is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|PesertaDidikLongitudinal[] List of PesertaDidikLongitudinal objects
     * @throws PropelException
     */
    public function getPesertaDidikLongitudinals($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collPesertaDidikLongitudinalsPartial && !$this->isNew();
        if (null === $this->collPesertaDidikLongitudinals || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collPesertaDidikLongitudinals) {
                // return empty collection
                $this->initPesertaDidikLongitudinals();
            } else {
                $collPesertaDidikLongitudinals = PesertaDidikLongitudinalQuery::create(null, $criteria)
                    ->filterByPesertaDidik($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collPesertaDidikLongitudinalsPartial && count($collPesertaDidikLongitudinals)) {
                      $this->initPesertaDidikLongitudinals(false);

                      foreach($collPesertaDidikLongitudinals as $obj) {
                        if (false == $this->collPesertaDidikLongitudinals->contains($obj)) {
                          $this->collPesertaDidikLongitudinals->append($obj);
                        }
                      }

                      $this->collPesertaDidikLongitudinalsPartial = true;
                    }

                    $collPesertaDidikLongitudinals->getInternalIterator()->rewind();
                    return $collPesertaDidikLongitudinals;
                }

                if($partial && $this->collPesertaDidikLongitudinals) {
                    foreach($this->collPesertaDidikLongitudinals as $obj) {
                        if($obj->isNew()) {
                            $collPesertaDidikLongitudinals[] = $obj;
                        }
                    }
                }

                $this->collPesertaDidikLongitudinals = $collPesertaDidikLongitudinals;
                $this->collPesertaDidikLongitudinalsPartial = false;
            }
        }

        return $this->collPesertaDidikLongitudinals;
    }

    /**
     * Sets a collection of PesertaDidikLongitudinal objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $pesertaDidikLongitudinals A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return PesertaDidik The current object (for fluent API support)
     */
    public function setPesertaDidikLongitudinals(PropelCollection $pesertaDidikLongitudinals, PropelPDO $con = null)
    {
        $pesertaDidikLongitudinalsToDelete = $this->getPesertaDidikLongitudinals(new Criteria(), $con)->diff($pesertaDidikLongitudinals);

        $this->pesertaDidikLongitudinalsScheduledForDeletion = unserialize(serialize($pesertaDidikLongitudinalsToDelete));

        foreach ($pesertaDidikLongitudinalsToDelete as $pesertaDidikLongitudinalRemoved) {
            $pesertaDidikLongitudinalRemoved->setPesertaDidik(null);
        }

        $this->collPesertaDidikLongitudinals = null;
        foreach ($pesertaDidikLongitudinals as $pesertaDidikLongitudinal) {
            $this->addPesertaDidikLongitudinal($pesertaDidikLongitudinal);
        }

        $this->collPesertaDidikLongitudinals = $pesertaDidikLongitudinals;
        $this->collPesertaDidikLongitudinalsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related PesertaDidikLongitudinal objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related PesertaDidikLongitudinal objects.
     * @throws PropelException
     */
    public function countPesertaDidikLongitudinals(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collPesertaDidikLongitudinalsPartial && !$this->isNew();
        if (null === $this->collPesertaDidikLongitudinals || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPesertaDidikLongitudinals) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getPesertaDidikLongitudinals());
            }
            $query = PesertaDidikLongitudinalQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPesertaDidik($this)
                ->count($con);
        }

        return count($this->collPesertaDidikLongitudinals);
    }

    /**
     * Method called to associate a PesertaDidikLongitudinal object to this object
     * through the PesertaDidikLongitudinal foreign key attribute.
     *
     * @param    PesertaDidikLongitudinal $l PesertaDidikLongitudinal
     * @return PesertaDidik The current object (for fluent API support)
     */
    public function addPesertaDidikLongitudinal(PesertaDidikLongitudinal $l)
    {
        if ($this->collPesertaDidikLongitudinals === null) {
            $this->initPesertaDidikLongitudinals();
            $this->collPesertaDidikLongitudinalsPartial = true;
        }
        if (!in_array($l, $this->collPesertaDidikLongitudinals->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddPesertaDidikLongitudinal($l);
        }

        return $this;
    }

    /**
     * @param	PesertaDidikLongitudinal $pesertaDidikLongitudinal The pesertaDidikLongitudinal object to add.
     */
    protected function doAddPesertaDidikLongitudinal($pesertaDidikLongitudinal)
    {
        $this->collPesertaDidikLongitudinals[]= $pesertaDidikLongitudinal;
        $pesertaDidikLongitudinal->setPesertaDidik($this);
    }

    /**
     * @param	PesertaDidikLongitudinal $pesertaDidikLongitudinal The pesertaDidikLongitudinal object to remove.
     * @return PesertaDidik The current object (for fluent API support)
     */
    public function removePesertaDidikLongitudinal($pesertaDidikLongitudinal)
    {
        if ($this->getPesertaDidikLongitudinals()->contains($pesertaDidikLongitudinal)) {
            $this->collPesertaDidikLongitudinals->remove($this->collPesertaDidikLongitudinals->search($pesertaDidikLongitudinal));
            if (null === $this->pesertaDidikLongitudinalsScheduledForDeletion) {
                $this->pesertaDidikLongitudinalsScheduledForDeletion = clone $this->collPesertaDidikLongitudinals;
                $this->pesertaDidikLongitudinalsScheduledForDeletion->clear();
            }
            $this->pesertaDidikLongitudinalsScheduledForDeletion[]= clone $pesertaDidikLongitudinal;
            $pesertaDidikLongitudinal->setPesertaDidik(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PesertaDidik is new, it will return
     * an empty collection; or if this PesertaDidik has previously
     * been saved, it will retrieve related PesertaDidikLongitudinals from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PesertaDidik.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidikLongitudinal[] List of PesertaDidikLongitudinal objects
     */
    public function getPesertaDidikLongitudinalsJoinSemester($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikLongitudinalQuery::create(null, $criteria);
        $query->joinWith('Semester', $join_behavior);

        return $this->getPesertaDidikLongitudinals($query, $con);
    }

    /**
     * Clears out the collPrestasis collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return PesertaDidik The current object (for fluent API support)
     * @see        addPrestasis()
     */
    public function clearPrestasis()
    {
        $this->collPrestasis = null; // important to set this to null since that means it is uninitialized
        $this->collPrestasisPartial = null;

        return $this;
    }

    /**
     * reset is the collPrestasis collection loaded partially
     *
     * @return void
     */
    public function resetPartialPrestasis($v = true)
    {
        $this->collPrestasisPartial = $v;
    }

    /**
     * Initializes the collPrestasis collection.
     *
     * By default this just sets the collPrestasis collection to an empty array (like clearcollPrestasis());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPrestasis($overrideExisting = true)
    {
        if (null !== $this->collPrestasis && !$overrideExisting) {
            return;
        }
        $this->collPrestasis = new PropelObjectCollection();
        $this->collPrestasis->setModel('Prestasi');
    }

    /**
     * Gets an array of Prestasi objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this PesertaDidik is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Prestasi[] List of Prestasi objects
     * @throws PropelException
     */
    public function getPrestasis($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collPrestasisPartial && !$this->isNew();
        if (null === $this->collPrestasis || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collPrestasis) {
                // return empty collection
                $this->initPrestasis();
            } else {
                $collPrestasis = PrestasiQuery::create(null, $criteria)
                    ->filterByPesertaDidik($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collPrestasisPartial && count($collPrestasis)) {
                      $this->initPrestasis(false);

                      foreach($collPrestasis as $obj) {
                        if (false == $this->collPrestasis->contains($obj)) {
                          $this->collPrestasis->append($obj);
                        }
                      }

                      $this->collPrestasisPartial = true;
                    }

                    $collPrestasis->getInternalIterator()->rewind();
                    return $collPrestasis;
                }

                if($partial && $this->collPrestasis) {
                    foreach($this->collPrestasis as $obj) {
                        if($obj->isNew()) {
                            $collPrestasis[] = $obj;
                        }
                    }
                }

                $this->collPrestasis = $collPrestasis;
                $this->collPrestasisPartial = false;
            }
        }

        return $this->collPrestasis;
    }

    /**
     * Sets a collection of Prestasi objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $prestasis A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return PesertaDidik The current object (for fluent API support)
     */
    public function setPrestasis(PropelCollection $prestasis, PropelPDO $con = null)
    {
        $prestasisToDelete = $this->getPrestasis(new Criteria(), $con)->diff($prestasis);

        $this->prestasisScheduledForDeletion = unserialize(serialize($prestasisToDelete));

        foreach ($prestasisToDelete as $prestasiRemoved) {
            $prestasiRemoved->setPesertaDidik(null);
        }

        $this->collPrestasis = null;
        foreach ($prestasis as $prestasi) {
            $this->addPrestasi($prestasi);
        }

        $this->collPrestasis = $prestasis;
        $this->collPrestasisPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Prestasi objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Prestasi objects.
     * @throws PropelException
     */
    public function countPrestasis(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collPrestasisPartial && !$this->isNew();
        if (null === $this->collPrestasis || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPrestasis) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getPrestasis());
            }
            $query = PrestasiQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPesertaDidik($this)
                ->count($con);
        }

        return count($this->collPrestasis);
    }

    /**
     * Method called to associate a Prestasi object to this object
     * through the Prestasi foreign key attribute.
     *
     * @param    Prestasi $l Prestasi
     * @return PesertaDidik The current object (for fluent API support)
     */
    public function addPrestasi(Prestasi $l)
    {
        if ($this->collPrestasis === null) {
            $this->initPrestasis();
            $this->collPrestasisPartial = true;
        }
        if (!in_array($l, $this->collPrestasis->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddPrestasi($l);
        }

        return $this;
    }

    /**
     * @param	Prestasi $prestasi The prestasi object to add.
     */
    protected function doAddPrestasi($prestasi)
    {
        $this->collPrestasis[]= $prestasi;
        $prestasi->setPesertaDidik($this);
    }

    /**
     * @param	Prestasi $prestasi The prestasi object to remove.
     * @return PesertaDidik The current object (for fluent API support)
     */
    public function removePrestasi($prestasi)
    {
        if ($this->getPrestasis()->contains($prestasi)) {
            $this->collPrestasis->remove($this->collPrestasis->search($prestasi));
            if (null === $this->prestasisScheduledForDeletion) {
                $this->prestasisScheduledForDeletion = clone $this->collPrestasis;
                $this->prestasisScheduledForDeletion->clear();
            }
            $this->prestasisScheduledForDeletion[]= clone $prestasi;
            $prestasi->setPesertaDidik(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PesertaDidik is new, it will return
     * an empty collection; or if this PesertaDidik has previously
     * been saved, it will retrieve related Prestasis from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PesertaDidik.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Prestasi[] List of Prestasi objects
     */
    public function getPrestasisJoinJenisPrestasi($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PrestasiQuery::create(null, $criteria);
        $query->joinWith('JenisPrestasi', $join_behavior);

        return $this->getPrestasis($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PesertaDidik is new, it will return
     * an empty collection; or if this PesertaDidik has previously
     * been saved, it will retrieve related Prestasis from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PesertaDidik.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Prestasi[] List of Prestasi objects
     */
    public function getPrestasisJoinTingkatPrestasi($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PrestasiQuery::create(null, $criteria);
        $query->joinWith('TingkatPrestasi', $join_behavior);

        return $this->getPrestasis($query, $con);
    }

    /**
     * Clears out the collRegistrasiPesertaDidiks collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return PesertaDidik The current object (for fluent API support)
     * @see        addRegistrasiPesertaDidiks()
     */
    public function clearRegistrasiPesertaDidiks()
    {
        $this->collRegistrasiPesertaDidiks = null; // important to set this to null since that means it is uninitialized
        $this->collRegistrasiPesertaDidiksPartial = null;

        return $this;
    }

    /**
     * reset is the collRegistrasiPesertaDidiks collection loaded partially
     *
     * @return void
     */
    public function resetPartialRegistrasiPesertaDidiks($v = true)
    {
        $this->collRegistrasiPesertaDidiksPartial = $v;
    }

    /**
     * Initializes the collRegistrasiPesertaDidiks collection.
     *
     * By default this just sets the collRegistrasiPesertaDidiks collection to an empty array (like clearcollRegistrasiPesertaDidiks());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initRegistrasiPesertaDidiks($overrideExisting = true)
    {
        if (null !== $this->collRegistrasiPesertaDidiks && !$overrideExisting) {
            return;
        }
        $this->collRegistrasiPesertaDidiks = new PropelObjectCollection();
        $this->collRegistrasiPesertaDidiks->setModel('RegistrasiPesertaDidik');
    }

    /**
     * Gets an array of RegistrasiPesertaDidik objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this PesertaDidik is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|RegistrasiPesertaDidik[] List of RegistrasiPesertaDidik objects
     * @throws PropelException
     */
    public function getRegistrasiPesertaDidiks($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collRegistrasiPesertaDidiksPartial && !$this->isNew();
        if (null === $this->collRegistrasiPesertaDidiks || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collRegistrasiPesertaDidiks) {
                // return empty collection
                $this->initRegistrasiPesertaDidiks();
            } else {
                $collRegistrasiPesertaDidiks = RegistrasiPesertaDidikQuery::create(null, $criteria)
                    ->filterByPesertaDidik($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collRegistrasiPesertaDidiksPartial && count($collRegistrasiPesertaDidiks)) {
                      $this->initRegistrasiPesertaDidiks(false);

                      foreach($collRegistrasiPesertaDidiks as $obj) {
                        if (false == $this->collRegistrasiPesertaDidiks->contains($obj)) {
                          $this->collRegistrasiPesertaDidiks->append($obj);
                        }
                      }

                      $this->collRegistrasiPesertaDidiksPartial = true;
                    }

                    $collRegistrasiPesertaDidiks->getInternalIterator()->rewind();
                    return $collRegistrasiPesertaDidiks;
                }

                if($partial && $this->collRegistrasiPesertaDidiks) {
                    foreach($this->collRegistrasiPesertaDidiks as $obj) {
                        if($obj->isNew()) {
                            $collRegistrasiPesertaDidiks[] = $obj;
                        }
                    }
                }

                $this->collRegistrasiPesertaDidiks = $collRegistrasiPesertaDidiks;
                $this->collRegistrasiPesertaDidiksPartial = false;
            }
        }

        return $this->collRegistrasiPesertaDidiks;
    }

    /**
     * Sets a collection of RegistrasiPesertaDidik objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $registrasiPesertaDidiks A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return PesertaDidik The current object (for fluent API support)
     */
    public function setRegistrasiPesertaDidiks(PropelCollection $registrasiPesertaDidiks, PropelPDO $con = null)
    {
        $registrasiPesertaDidiksToDelete = $this->getRegistrasiPesertaDidiks(new Criteria(), $con)->diff($registrasiPesertaDidiks);

        $this->registrasiPesertaDidiksScheduledForDeletion = unserialize(serialize($registrasiPesertaDidiksToDelete));

        foreach ($registrasiPesertaDidiksToDelete as $registrasiPesertaDidikRemoved) {
            $registrasiPesertaDidikRemoved->setPesertaDidik(null);
        }

        $this->collRegistrasiPesertaDidiks = null;
        foreach ($registrasiPesertaDidiks as $registrasiPesertaDidik) {
            $this->addRegistrasiPesertaDidik($registrasiPesertaDidik);
        }

        $this->collRegistrasiPesertaDidiks = $registrasiPesertaDidiks;
        $this->collRegistrasiPesertaDidiksPartial = false;

        return $this;
    }

    /**
     * Returns the number of related RegistrasiPesertaDidik objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related RegistrasiPesertaDidik objects.
     * @throws PropelException
     */
    public function countRegistrasiPesertaDidiks(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collRegistrasiPesertaDidiksPartial && !$this->isNew();
        if (null === $this->collRegistrasiPesertaDidiks || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collRegistrasiPesertaDidiks) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getRegistrasiPesertaDidiks());
            }
            $query = RegistrasiPesertaDidikQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPesertaDidik($this)
                ->count($con);
        }

        return count($this->collRegistrasiPesertaDidiks);
    }

    /**
     * Method called to associate a RegistrasiPesertaDidik object to this object
     * through the RegistrasiPesertaDidik foreign key attribute.
     *
     * @param    RegistrasiPesertaDidik $l RegistrasiPesertaDidik
     * @return PesertaDidik The current object (for fluent API support)
     */
    public function addRegistrasiPesertaDidik(RegistrasiPesertaDidik $l)
    {
        if ($this->collRegistrasiPesertaDidiks === null) {
            $this->initRegistrasiPesertaDidiks();
            $this->collRegistrasiPesertaDidiksPartial = true;
        }
        if (!in_array($l, $this->collRegistrasiPesertaDidiks->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddRegistrasiPesertaDidik($l);
        }

        return $this;
    }

    /**
     * @param	RegistrasiPesertaDidik $registrasiPesertaDidik The registrasiPesertaDidik object to add.
     */
    protected function doAddRegistrasiPesertaDidik($registrasiPesertaDidik)
    {
        $this->collRegistrasiPesertaDidiks[]= $registrasiPesertaDidik;
        $registrasiPesertaDidik->setPesertaDidik($this);
    }

    /**
     * @param	RegistrasiPesertaDidik $registrasiPesertaDidik The registrasiPesertaDidik object to remove.
     * @return PesertaDidik The current object (for fluent API support)
     */
    public function removeRegistrasiPesertaDidik($registrasiPesertaDidik)
    {
        if ($this->getRegistrasiPesertaDidiks()->contains($registrasiPesertaDidik)) {
            $this->collRegistrasiPesertaDidiks->remove($this->collRegistrasiPesertaDidiks->search($registrasiPesertaDidik));
            if (null === $this->registrasiPesertaDidiksScheduledForDeletion) {
                $this->registrasiPesertaDidiksScheduledForDeletion = clone $this->collRegistrasiPesertaDidiks;
                $this->registrasiPesertaDidiksScheduledForDeletion->clear();
            }
            $this->registrasiPesertaDidiksScheduledForDeletion[]= clone $registrasiPesertaDidik;
            $registrasiPesertaDidik->setPesertaDidik(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PesertaDidik is new, it will return
     * an empty collection; or if this PesertaDidik has previously
     * been saved, it will retrieve related RegistrasiPesertaDidiks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PesertaDidik.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|RegistrasiPesertaDidik[] List of RegistrasiPesertaDidik objects
     */
    public function getRegistrasiPesertaDidiksJoinJurusanSp($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = RegistrasiPesertaDidikQuery::create(null, $criteria);
        $query->joinWith('JurusanSp', $join_behavior);

        return $this->getRegistrasiPesertaDidiks($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PesertaDidik is new, it will return
     * an empty collection; or if this PesertaDidik has previously
     * been saved, it will retrieve related RegistrasiPesertaDidiks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PesertaDidik.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|RegistrasiPesertaDidik[] List of RegistrasiPesertaDidik objects
     */
    public function getRegistrasiPesertaDidiksJoinSekolah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = RegistrasiPesertaDidikQuery::create(null, $criteria);
        $query->joinWith('Sekolah', $join_behavior);

        return $this->getRegistrasiPesertaDidiks($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PesertaDidik is new, it will return
     * an empty collection; or if this PesertaDidik has previously
     * been saved, it will retrieve related RegistrasiPesertaDidiks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PesertaDidik.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|RegistrasiPesertaDidik[] List of RegistrasiPesertaDidik objects
     */
    public function getRegistrasiPesertaDidiksJoinJenisPendaftaran($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = RegistrasiPesertaDidikQuery::create(null, $criteria);
        $query->joinWith('JenisPendaftaran', $join_behavior);

        return $this->getRegistrasiPesertaDidiks($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PesertaDidik is new, it will return
     * an empty collection; or if this PesertaDidik has previously
     * been saved, it will retrieve related RegistrasiPesertaDidiks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PesertaDidik.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|RegistrasiPesertaDidik[] List of RegistrasiPesertaDidik objects
     */
    public function getRegistrasiPesertaDidiksJoinJenisKeluar($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = RegistrasiPesertaDidikQuery::create(null, $criteria);
        $query->joinWith('JenisKeluar', $join_behavior);

        return $this->getRegistrasiPesertaDidiks($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PesertaDidik is new, it will return
     * an empty collection; or if this PesertaDidik has previously
     * been saved, it will retrieve related RegistrasiPesertaDidiks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PesertaDidik.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|RegistrasiPesertaDidik[] List of RegistrasiPesertaDidik objects
     */
    public function getRegistrasiPesertaDidiksJoinJenisCita($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = RegistrasiPesertaDidikQuery::create(null, $criteria);
        $query->joinWith('JenisCita', $join_behavior);

        return $this->getRegistrasiPesertaDidiks($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PesertaDidik is new, it will return
     * an empty collection; or if this PesertaDidik has previously
     * been saved, it will retrieve related RegistrasiPesertaDidiks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PesertaDidik.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|RegistrasiPesertaDidik[] List of RegistrasiPesertaDidik objects
     */
    public function getRegistrasiPesertaDidiksJoinJenisHobby($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = RegistrasiPesertaDidikQuery::create(null, $criteria);
        $query->joinWith('JenisHobby', $join_behavior);

        return $this->getRegistrasiPesertaDidiks($query, $con);
    }

    /**
     * Clears out the collSertifikasiPds collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return PesertaDidik The current object (for fluent API support)
     * @see        addSertifikasiPds()
     */
    public function clearSertifikasiPds()
    {
        $this->collSertifikasiPds = null; // important to set this to null since that means it is uninitialized
        $this->collSertifikasiPdsPartial = null;

        return $this;
    }

    /**
     * reset is the collSertifikasiPds collection loaded partially
     *
     * @return void
     */
    public function resetPartialSertifikasiPds($v = true)
    {
        $this->collSertifikasiPdsPartial = $v;
    }

    /**
     * Initializes the collSertifikasiPds collection.
     *
     * By default this just sets the collSertifikasiPds collection to an empty array (like clearcollSertifikasiPds());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initSertifikasiPds($overrideExisting = true)
    {
        if (null !== $this->collSertifikasiPds && !$overrideExisting) {
            return;
        }
        $this->collSertifikasiPds = new PropelObjectCollection();
        $this->collSertifikasiPds->setModel('SertifikasiPd');
    }

    /**
     * Gets an array of SertifikasiPd objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this PesertaDidik is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|SertifikasiPd[] List of SertifikasiPd objects
     * @throws PropelException
     */
    public function getSertifikasiPds($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collSertifikasiPdsPartial && !$this->isNew();
        if (null === $this->collSertifikasiPds || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collSertifikasiPds) {
                // return empty collection
                $this->initSertifikasiPds();
            } else {
                $collSertifikasiPds = SertifikasiPdQuery::create(null, $criteria)
                    ->filterByPesertaDidik($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collSertifikasiPdsPartial && count($collSertifikasiPds)) {
                      $this->initSertifikasiPds(false);

                      foreach($collSertifikasiPds as $obj) {
                        if (false == $this->collSertifikasiPds->contains($obj)) {
                          $this->collSertifikasiPds->append($obj);
                        }
                      }

                      $this->collSertifikasiPdsPartial = true;
                    }

                    $collSertifikasiPds->getInternalIterator()->rewind();
                    return $collSertifikasiPds;
                }

                if($partial && $this->collSertifikasiPds) {
                    foreach($this->collSertifikasiPds as $obj) {
                        if($obj->isNew()) {
                            $collSertifikasiPds[] = $obj;
                        }
                    }
                }

                $this->collSertifikasiPds = $collSertifikasiPds;
                $this->collSertifikasiPdsPartial = false;
            }
        }

        return $this->collSertifikasiPds;
    }

    /**
     * Sets a collection of SertifikasiPd objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $sertifikasiPds A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return PesertaDidik The current object (for fluent API support)
     */
    public function setSertifikasiPds(PropelCollection $sertifikasiPds, PropelPDO $con = null)
    {
        $sertifikasiPdsToDelete = $this->getSertifikasiPds(new Criteria(), $con)->diff($sertifikasiPds);

        $this->sertifikasiPdsScheduledForDeletion = unserialize(serialize($sertifikasiPdsToDelete));

        foreach ($sertifikasiPdsToDelete as $sertifikasiPdRemoved) {
            $sertifikasiPdRemoved->setPesertaDidik(null);
        }

        $this->collSertifikasiPds = null;
        foreach ($sertifikasiPds as $sertifikasiPd) {
            $this->addSertifikasiPd($sertifikasiPd);
        }

        $this->collSertifikasiPds = $sertifikasiPds;
        $this->collSertifikasiPdsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related SertifikasiPd objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related SertifikasiPd objects.
     * @throws PropelException
     */
    public function countSertifikasiPds(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collSertifikasiPdsPartial && !$this->isNew();
        if (null === $this->collSertifikasiPds || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collSertifikasiPds) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getSertifikasiPds());
            }
            $query = SertifikasiPdQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPesertaDidik($this)
                ->count($con);
        }

        return count($this->collSertifikasiPds);
    }

    /**
     * Method called to associate a SertifikasiPd object to this object
     * through the SertifikasiPd foreign key attribute.
     *
     * @param    SertifikasiPd $l SertifikasiPd
     * @return PesertaDidik The current object (for fluent API support)
     */
    public function addSertifikasiPd(SertifikasiPd $l)
    {
        if ($this->collSertifikasiPds === null) {
            $this->initSertifikasiPds();
            $this->collSertifikasiPdsPartial = true;
        }
        if (!in_array($l, $this->collSertifikasiPds->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddSertifikasiPd($l);
        }

        return $this;
    }

    /**
     * @param	SertifikasiPd $sertifikasiPd The sertifikasiPd object to add.
     */
    protected function doAddSertifikasiPd($sertifikasiPd)
    {
        $this->collSertifikasiPds[]= $sertifikasiPd;
        $sertifikasiPd->setPesertaDidik($this);
    }

    /**
     * @param	SertifikasiPd $sertifikasiPd The sertifikasiPd object to remove.
     * @return PesertaDidik The current object (for fluent API support)
     */
    public function removeSertifikasiPd($sertifikasiPd)
    {
        if ($this->getSertifikasiPds()->contains($sertifikasiPd)) {
            $this->collSertifikasiPds->remove($this->collSertifikasiPds->search($sertifikasiPd));
            if (null === $this->sertifikasiPdsScheduledForDeletion) {
                $this->sertifikasiPdsScheduledForDeletion = clone $this->collSertifikasiPds;
                $this->sertifikasiPdsScheduledForDeletion->clear();
            }
            $this->sertifikasiPdsScheduledForDeletion[]= clone $sertifikasiPd;
            $sertifikasiPd->setPesertaDidik(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PesertaDidik is new, it will return
     * an empty collection; or if this PesertaDidik has previously
     * been saved, it will retrieve related SertifikasiPds from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PesertaDidik.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|SertifikasiPd[] List of SertifikasiPd objects
     */
    public function getSertifikasiPdsJoinBidangStudi($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = SertifikasiPdQuery::create(null, $criteria);
        $query->joinWith('BidangStudi', $join_behavior);

        return $this->getSertifikasiPds($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PesertaDidik is new, it will return
     * an empty collection; or if this PesertaDidik has previously
     * been saved, it will retrieve related SertifikasiPds from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PesertaDidik.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|SertifikasiPd[] List of SertifikasiPd objects
     */
    public function getSertifikasiPdsJoinJenisSertifikasi($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = SertifikasiPdQuery::create(null, $criteria);
        $query->joinWith('JenisSertifikasi', $join_behavior);

        return $this->getSertifikasiPds($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PesertaDidik is new, it will return
     * an empty collection; or if this PesertaDidik has previously
     * been saved, it will retrieve related SertifikasiPds from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PesertaDidik.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|SertifikasiPd[] List of SertifikasiPd objects
     */
    public function getSertifikasiPdsJoinLembSertifikasi($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = SertifikasiPdQuery::create(null, $criteria);
        $query->joinWith('LembSertifikasi', $join_behavior);

        return $this->getSertifikasiPds($query, $con);
    }

    /**
     * Clears out the collVldPesertaDidiks collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return PesertaDidik The current object (for fluent API support)
     * @see        addVldPesertaDidiks()
     */
    public function clearVldPesertaDidiks()
    {
        $this->collVldPesertaDidiks = null; // important to set this to null since that means it is uninitialized
        $this->collVldPesertaDidiksPartial = null;

        return $this;
    }

    /**
     * reset is the collVldPesertaDidiks collection loaded partially
     *
     * @return void
     */
    public function resetPartialVldPesertaDidiks($v = true)
    {
        $this->collVldPesertaDidiksPartial = $v;
    }

    /**
     * Initializes the collVldPesertaDidiks collection.
     *
     * By default this just sets the collVldPesertaDidiks collection to an empty array (like clearcollVldPesertaDidiks());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initVldPesertaDidiks($overrideExisting = true)
    {
        if (null !== $this->collVldPesertaDidiks && !$overrideExisting) {
            return;
        }
        $this->collVldPesertaDidiks = new PropelObjectCollection();
        $this->collVldPesertaDidiks->setModel('VldPesertaDidik');
    }

    /**
     * Gets an array of VldPesertaDidik objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this PesertaDidik is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|VldPesertaDidik[] List of VldPesertaDidik objects
     * @throws PropelException
     */
    public function getVldPesertaDidiks($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collVldPesertaDidiksPartial && !$this->isNew();
        if (null === $this->collVldPesertaDidiks || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collVldPesertaDidiks) {
                // return empty collection
                $this->initVldPesertaDidiks();
            } else {
                $collVldPesertaDidiks = VldPesertaDidikQuery::create(null, $criteria)
                    ->filterByPesertaDidik($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collVldPesertaDidiksPartial && count($collVldPesertaDidiks)) {
                      $this->initVldPesertaDidiks(false);

                      foreach($collVldPesertaDidiks as $obj) {
                        if (false == $this->collVldPesertaDidiks->contains($obj)) {
                          $this->collVldPesertaDidiks->append($obj);
                        }
                      }

                      $this->collVldPesertaDidiksPartial = true;
                    }

                    $collVldPesertaDidiks->getInternalIterator()->rewind();
                    return $collVldPesertaDidiks;
                }

                if($partial && $this->collVldPesertaDidiks) {
                    foreach($this->collVldPesertaDidiks as $obj) {
                        if($obj->isNew()) {
                            $collVldPesertaDidiks[] = $obj;
                        }
                    }
                }

                $this->collVldPesertaDidiks = $collVldPesertaDidiks;
                $this->collVldPesertaDidiksPartial = false;
            }
        }

        return $this->collVldPesertaDidiks;
    }

    /**
     * Sets a collection of VldPesertaDidik objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $vldPesertaDidiks A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return PesertaDidik The current object (for fluent API support)
     */
    public function setVldPesertaDidiks(PropelCollection $vldPesertaDidiks, PropelPDO $con = null)
    {
        $vldPesertaDidiksToDelete = $this->getVldPesertaDidiks(new Criteria(), $con)->diff($vldPesertaDidiks);

        $this->vldPesertaDidiksScheduledForDeletion = unserialize(serialize($vldPesertaDidiksToDelete));

        foreach ($vldPesertaDidiksToDelete as $vldPesertaDidikRemoved) {
            $vldPesertaDidikRemoved->setPesertaDidik(null);
        }

        $this->collVldPesertaDidiks = null;
        foreach ($vldPesertaDidiks as $vldPesertaDidik) {
            $this->addVldPesertaDidik($vldPesertaDidik);
        }

        $this->collVldPesertaDidiks = $vldPesertaDidiks;
        $this->collVldPesertaDidiksPartial = false;

        return $this;
    }

    /**
     * Returns the number of related VldPesertaDidik objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related VldPesertaDidik objects.
     * @throws PropelException
     */
    public function countVldPesertaDidiks(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collVldPesertaDidiksPartial && !$this->isNew();
        if (null === $this->collVldPesertaDidiks || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collVldPesertaDidiks) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getVldPesertaDidiks());
            }
            $query = VldPesertaDidikQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPesertaDidik($this)
                ->count($con);
        }

        return count($this->collVldPesertaDidiks);
    }

    /**
     * Method called to associate a VldPesertaDidik object to this object
     * through the VldPesertaDidik foreign key attribute.
     *
     * @param    VldPesertaDidik $l VldPesertaDidik
     * @return PesertaDidik The current object (for fluent API support)
     */
    public function addVldPesertaDidik(VldPesertaDidik $l)
    {
        if ($this->collVldPesertaDidiks === null) {
            $this->initVldPesertaDidiks();
            $this->collVldPesertaDidiksPartial = true;
        }
        if (!in_array($l, $this->collVldPesertaDidiks->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddVldPesertaDidik($l);
        }

        return $this;
    }

    /**
     * @param	VldPesertaDidik $vldPesertaDidik The vldPesertaDidik object to add.
     */
    protected function doAddVldPesertaDidik($vldPesertaDidik)
    {
        $this->collVldPesertaDidiks[]= $vldPesertaDidik;
        $vldPesertaDidik->setPesertaDidik($this);
    }

    /**
     * @param	VldPesertaDidik $vldPesertaDidik The vldPesertaDidik object to remove.
     * @return PesertaDidik The current object (for fluent API support)
     */
    public function removeVldPesertaDidik($vldPesertaDidik)
    {
        if ($this->getVldPesertaDidiks()->contains($vldPesertaDidik)) {
            $this->collVldPesertaDidiks->remove($this->collVldPesertaDidiks->search($vldPesertaDidik));
            if (null === $this->vldPesertaDidiksScheduledForDeletion) {
                $this->vldPesertaDidiksScheduledForDeletion = clone $this->collVldPesertaDidiks;
                $this->vldPesertaDidiksScheduledForDeletion->clear();
            }
            $this->vldPesertaDidiksScheduledForDeletion[]= clone $vldPesertaDidik;
            $vldPesertaDidik->setPesertaDidik(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this PesertaDidik is new, it will return
     * an empty collection; or if this PesertaDidik has previously
     * been saved, it will retrieve related VldPesertaDidiks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in PesertaDidik.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|VldPesertaDidik[] List of VldPesertaDidik objects
     */
    public function getVldPesertaDidiksJoinErrortype($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = VldPesertaDidikQuery::create(null, $criteria);
        $query->joinWith('Errortype', $join_behavior);

        return $this->getVldPesertaDidiks($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->peserta_didik_id = null;
        $this->nama = null;
        $this->jenis_kelamin = null;
        $this->nisn = null;
        $this->nik = null;
        $this->no_kk = null;
        $this->tempat_lahir = null;
        $this->tanggal_lahir = null;
        $this->agama_id = null;
        $this->kebutuhan_khusus_id = null;
        $this->alamat_jalan = null;
        $this->rt = null;
        $this->rw = null;
        $this->nama_dusun = null;
        $this->desa_kelurahan = null;
        $this->kode_wilayah = null;
        $this->kode_pos = null;
        $this->lintang = null;
        $this->bujur = null;
        $this->jenis_tinggal_id = null;
        $this->alat_transportasi_id = null;
        $this->nik_ayah = null;
        $this->nik_ibu = null;
        $this->anak_keberapa = null;
        $this->nik_wali = null;
        $this->nomor_telepon_rumah = null;
        $this->nomor_telepon_seluler = null;
        $this->email = null;
        $this->penerima_kps = null;
        $this->no_kps = null;
        $this->layak_pip = null;
        $this->penerima_kip = null;
        $this->no_kip = null;
        $this->nm_kip = null;
        $this->no_kks = null;
        $this->reg_akta_lahir = null;
        $this->id_layak_pip = null;
        $this->id_bank = null;
        $this->rekening_bank = null;
        $this->nama_kcp = null;
        $this->rekening_atas_nama = null;
        $this->status_data = null;
        $this->nama_ayah = null;
        $this->tahun_lahir_ayah = null;
        $this->jenjang_pendidikan_ayah = null;
        $this->pekerjaan_id_ayah = null;
        $this->penghasilan_id_ayah = null;
        $this->kebutuhan_khusus_id_ayah = null;
        $this->nama_ibu_kandung = null;
        $this->tahun_lahir_ibu = null;
        $this->jenjang_pendidikan_ibu = null;
        $this->penghasilan_id_ibu = null;
        $this->pekerjaan_id_ibu = null;
        $this->kebutuhan_khusus_id_ibu = null;
        $this->nama_wali = null;
        $this->tahun_lahir_wali = null;
        $this->jenjang_pendidikan_wali = null;
        $this->pekerjaan_id_wali = null;
        $this->penghasilan_id_wali = null;
        $this->kewarganegaraan = null;
        $this->pekerjaan_id = null;
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
            if ($this->collAnggotaPanitias) {
                foreach ($this->collAnggotaPanitias as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collAnggotaRombels) {
                foreach ($this->collAnggotaRombels as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collBeasiswaPesertaDidiks) {
                foreach ($this->collBeasiswaPesertaDidiks as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collKesejahteraanPds) {
                foreach ($this->collKesejahteraanPds as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collKitasPds) {
                foreach ($this->collKitasPds as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collPasporPds) {
                foreach ($this->collPasporPds as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collPesertaDidikBarus) {
                foreach ($this->collPesertaDidikBarus as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collPesertaDidikLongitudinals) {
                foreach ($this->collPesertaDidikLongitudinals as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collPrestasis) {
                foreach ($this->collPrestasis as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collRegistrasiPesertaDidiks) {
                foreach ($this->collRegistrasiPesertaDidiks as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collSertifikasiPds) {
                foreach ($this->collSertifikasiPds as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collVldPesertaDidiks) {
                foreach ($this->collVldPesertaDidiks as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aKebutuhanKhususRelatedByKebutuhanKhususIdAyah instanceof Persistent) {
              $this->aKebutuhanKhususRelatedByKebutuhanKhususIdAyah->clearAllReferences($deep);
            }
            if ($this->aKebutuhanKhususRelatedByKebutuhanKhususIdIbu instanceof Persistent) {
              $this->aKebutuhanKhususRelatedByKebutuhanKhususIdIbu->clearAllReferences($deep);
            }
            if ($this->aNegara instanceof Persistent) {
              $this->aNegara->clearAllReferences($deep);
            }
            if ($this->aAlasanLayakPip instanceof Persistent) {
              $this->aAlasanLayakPip->clearAllReferences($deep);
            }
            if ($this->aBank instanceof Persistent) {
              $this->aBank->clearAllReferences($deep);
            }
            if ($this->aMstWilayah instanceof Persistent) {
              $this->aMstWilayah->clearAllReferences($deep);
            }
            if ($this->aKebutuhanKhususRelatedByKebutuhanKhususId instanceof Persistent) {
              $this->aKebutuhanKhususRelatedByKebutuhanKhususId->clearAllReferences($deep);
            }
            if ($this->aPekerjaanRelatedByPekerjaanId instanceof Persistent) {
              $this->aPekerjaanRelatedByPekerjaanId->clearAllReferences($deep);
            }
            if ($this->aAgama instanceof Persistent) {
              $this->aAgama->clearAllReferences($deep);
            }
            if ($this->aPenghasilanRelatedByPenghasilanIdAyah instanceof Persistent) {
              $this->aPenghasilanRelatedByPenghasilanIdAyah->clearAllReferences($deep);
            }
            if ($this->aJenisTinggal instanceof Persistent) {
              $this->aJenisTinggal->clearAllReferences($deep);
            }
            if ($this->aAlatTransportasi instanceof Persistent) {
              $this->aAlatTransportasi->clearAllReferences($deep);
            }
            if ($this->aPekerjaanRelatedByPekerjaanIdAyah instanceof Persistent) {
              $this->aPekerjaanRelatedByPekerjaanIdAyah->clearAllReferences($deep);
            }
            if ($this->aJenjangPendidikanRelatedByJenjangPendidikanIbu instanceof Persistent) {
              $this->aJenjangPendidikanRelatedByJenjangPendidikanIbu->clearAllReferences($deep);
            }
            if ($this->aPenghasilanRelatedByPenghasilanIdWali instanceof Persistent) {
              $this->aPenghasilanRelatedByPenghasilanIdWali->clearAllReferences($deep);
            }
            if ($this->aPekerjaanRelatedByPekerjaanIdIbu instanceof Persistent) {
              $this->aPekerjaanRelatedByPekerjaanIdIbu->clearAllReferences($deep);
            }
            if ($this->aJenjangPendidikanRelatedByJenjangPendidikanAyah instanceof Persistent) {
              $this->aJenjangPendidikanRelatedByJenjangPendidikanAyah->clearAllReferences($deep);
            }
            if ($this->aPenghasilanRelatedByPenghasilanIdIbu instanceof Persistent) {
              $this->aPenghasilanRelatedByPenghasilanIdIbu->clearAllReferences($deep);
            }
            if ($this->aPekerjaanRelatedByPekerjaanIdWali instanceof Persistent) {
              $this->aPekerjaanRelatedByPekerjaanIdWali->clearAllReferences($deep);
            }
            if ($this->aJenjangPendidikanRelatedByJenjangPendidikanWali instanceof Persistent) {
              $this->aJenjangPendidikanRelatedByJenjangPendidikanWali->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collAnggotaPanitias instanceof PropelCollection) {
            $this->collAnggotaPanitias->clearIterator();
        }
        $this->collAnggotaPanitias = null;
        if ($this->collAnggotaRombels instanceof PropelCollection) {
            $this->collAnggotaRombels->clearIterator();
        }
        $this->collAnggotaRombels = null;
        if ($this->collBeasiswaPesertaDidiks instanceof PropelCollection) {
            $this->collBeasiswaPesertaDidiks->clearIterator();
        }
        $this->collBeasiswaPesertaDidiks = null;
        if ($this->collKesejahteraanPds instanceof PropelCollection) {
            $this->collKesejahteraanPds->clearIterator();
        }
        $this->collKesejahteraanPds = null;
        if ($this->collKitasPds instanceof PropelCollection) {
            $this->collKitasPds->clearIterator();
        }
        $this->collKitasPds = null;
        if ($this->collPasporPds instanceof PropelCollection) {
            $this->collPasporPds->clearIterator();
        }
        $this->collPasporPds = null;
        if ($this->collPesertaDidikBarus instanceof PropelCollection) {
            $this->collPesertaDidikBarus->clearIterator();
        }
        $this->collPesertaDidikBarus = null;
        if ($this->collPesertaDidikLongitudinals instanceof PropelCollection) {
            $this->collPesertaDidikLongitudinals->clearIterator();
        }
        $this->collPesertaDidikLongitudinals = null;
        if ($this->collPrestasis instanceof PropelCollection) {
            $this->collPrestasis->clearIterator();
        }
        $this->collPrestasis = null;
        if ($this->collRegistrasiPesertaDidiks instanceof PropelCollection) {
            $this->collRegistrasiPesertaDidiks->clearIterator();
        }
        $this->collRegistrasiPesertaDidiks = null;
        if ($this->collSertifikasiPds instanceof PropelCollection) {
            $this->collSertifikasiPds->clearIterator();
        }
        $this->collSertifikasiPds = null;
        if ($this->collVldPesertaDidiks instanceof PropelCollection) {
            $this->collVldPesertaDidiks->clearIterator();
        }
        $this->collVldPesertaDidiks = null;
        $this->aKebutuhanKhususRelatedByKebutuhanKhususIdAyah = null;
        $this->aKebutuhanKhususRelatedByKebutuhanKhususIdIbu = null;
        $this->aNegara = null;
        $this->aAlasanLayakPip = null;
        $this->aBank = null;
        $this->aMstWilayah = null;
        $this->aKebutuhanKhususRelatedByKebutuhanKhususId = null;
        $this->aPekerjaanRelatedByPekerjaanId = null;
        $this->aAgama = null;
        $this->aPenghasilanRelatedByPenghasilanIdAyah = null;
        $this->aJenisTinggal = null;
        $this->aAlatTransportasi = null;
        $this->aPekerjaanRelatedByPekerjaanIdAyah = null;
        $this->aJenjangPendidikanRelatedByJenjangPendidikanIbu = null;
        $this->aPenghasilanRelatedByPenghasilanIdWali = null;
        $this->aPekerjaanRelatedByPekerjaanIdIbu = null;
        $this->aJenjangPendidikanRelatedByJenjangPendidikanAyah = null;
        $this->aPenghasilanRelatedByPenghasilanIdIbu = null;
        $this->aPekerjaanRelatedByPekerjaanIdWali = null;
        $this->aJenjangPendidikanRelatedByJenjangPendidikanWali = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(PesertaDidikPeer::DEFAULT_STRING_FORMAT);
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
