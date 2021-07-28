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
use DataDikdas\Model\AkreditasiSp;
use DataDikdas\Model\AkreditasiSpQuery;
use DataDikdas\Model\Alat;
use DataDikdas\Model\AlatQuery;
use DataDikdas\Model\AnggotaGugus;
use DataDikdas\Model\AnggotaGugusQuery;
use DataDikdas\Model\Angkutan;
use DataDikdas\Model\AngkutanQuery;
use DataDikdas\Model\Bangunan;
use DataDikdas\Model\BangunanQuery;
use DataDikdas\Model\BentukPendidikan;
use DataDikdas\Model\BentukPendidikanQuery;
use DataDikdas\Model\Blockgrant;
use DataDikdas\Model\BlockgrantQuery;
use DataDikdas\Model\Buku;
use DataDikdas\Model\BukuQuery;
use DataDikdas\Model\DataDynamic;
use DataDikdas\Model\DataDynamicQuery;
use DataDikdas\Model\GugusSekolah;
use DataDikdas\Model\GugusSekolahQuery;
use DataDikdas\Model\Instalasi;
use DataDikdas\Model\InstalasiQuery;
use DataDikdas\Model\IzinOperasional;
use DataDikdas\Model\IzinOperasionalQuery;
use DataDikdas\Model\JurusanSp;
use DataDikdas\Model\JurusanSpQuery;
use DataDikdas\Model\KebutuhanKhusus;
use DataDikdas\Model\KebutuhanKhususQuery;
use DataDikdas\Model\Kepanitiaan;
use DataDikdas\Model\KepanitiaanQuery;
use DataDikdas\Model\LayananKhusus;
use DataDikdas\Model\LayananKhususQuery;
use DataDikdas\Model\Mou;
use DataDikdas\Model\MouQuery;
use DataDikdas\Model\MstWilayah;
use DataDikdas\Model\MstWilayahQuery;
use DataDikdas\Model\PesertaDidikBaru;
use DataDikdas\Model\PesertaDidikBaruQuery;
use DataDikdas\Model\ProgramInklusi;
use DataDikdas\Model\ProgramInklusiQuery;
use DataDikdas\Model\PtkBaru;
use DataDikdas\Model\PtkBaruQuery;
use DataDikdas\Model\PtkTerdaftar;
use DataDikdas\Model\PtkTerdaftarQuery;
use DataDikdas\Model\RegistrasiPesertaDidik;
use DataDikdas\Model\RegistrasiPesertaDidikQuery;
use DataDikdas\Model\RombonganBelajar;
use DataDikdas\Model\RombonganBelajarQuery;
use DataDikdas\Model\Ruang;
use DataDikdas\Model\RuangQuery;
use DataDikdas\Model\Sanitasi;
use DataDikdas\Model\SanitasiQuery;
use DataDikdas\Model\SasaranPengawasan;
use DataDikdas\Model\SasaranPengawasanQuery;
use DataDikdas\Model\Sekolah;
use DataDikdas\Model\SekolahLongitudinal;
use DataDikdas\Model\SekolahLongitudinalQuery;
use DataDikdas\Model\SekolahPaud;
use DataDikdas\Model\SekolahPaudQuery;
use DataDikdas\Model\SekolahPeer;
use DataDikdas\Model\SekolahQuery;
use DataDikdas\Model\StatusKepemilikan;
use DataDikdas\Model\StatusKepemilikanQuery;
use DataDikdas\Model\Tanah;
use DataDikdas\Model\TanahQuery;
use DataDikdas\Model\TugasTambahan;
use DataDikdas\Model\TugasTambahanQuery;
use DataDikdas\Model\UnitUsaha;
use DataDikdas\Model\UnitUsahaQuery;
use DataDikdas\Model\VldSekolah;
use DataDikdas\Model\VldSekolahQuery;
use DataDikdas\Model\Yayasan;
use DataDikdas\Model\YayasanQuery;

/**
 * Base class that represents a row from the 'sekolah' table.
 *
 * 
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseSekolah extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'DataDikdas\\Model\\SekolahPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        SekolahPeer
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
     * The value for the nama field.
     * @var        string
     */
    protected $nama;

    /**
     * The value for the nama_nomenklatur field.
     * @var        string
     */
    protected $nama_nomenklatur;

    /**
     * The value for the nss field.
     * @var        string
     */
    protected $nss;

    /**
     * The value for the npsn field.
     * @var        string
     */
    protected $npsn;

    /**
     * The value for the bentuk_pendidikan_id field.
     * @var        int
     */
    protected $bentuk_pendidikan_id;

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
     * The value for the nomor_telepon field.
     * @var        string
     */
    protected $nomor_telepon;

    /**
     * The value for the nomor_fax field.
     * @var        string
     */
    protected $nomor_fax;

    /**
     * The value for the email field.
     * @var        string
     */
    protected $email;

    /**
     * The value for the website field.
     * @var        string
     */
    protected $website;

    /**
     * The value for the kebutuhan_khusus_id field.
     * @var        int
     */
    protected $kebutuhan_khusus_id;

    /**
     * The value for the status_sekolah field.
     * @var        string
     */
    protected $status_sekolah;

    /**
     * The value for the sk_pendirian_sekolah field.
     * @var        string
     */
    protected $sk_pendirian_sekolah;

    /**
     * The value for the tanggal_sk_pendirian field.
     * @var        string
     */
    protected $tanggal_sk_pendirian;

    /**
     * The value for the status_kepemilikan_id field.
     * @var        string
     */
    protected $status_kepemilikan_id;

    /**
     * The value for the yayasan_id field.
     * @var        string
     */
    protected $yayasan_id;

    /**
     * The value for the sk_izin_operasional field.
     * @var        string
     */
    protected $sk_izin_operasional;

    /**
     * The value for the tanggal_sk_izin_operasional field.
     * @var        string
     */
    protected $tanggal_sk_izin_operasional;

    /**
     * The value for the no_rekening field.
     * @var        string
     */
    protected $no_rekening;

    /**
     * The value for the nama_bank field.
     * @var        string
     */
    protected $nama_bank;

    /**
     * The value for the cabang_kcp_unit field.
     * @var        string
     */
    protected $cabang_kcp_unit;

    /**
     * The value for the rekening_atas_nama field.
     * @var        string
     */
    protected $rekening_atas_nama;

    /**
     * The value for the mbs field.
     * @var        string
     */
    protected $mbs;

    /**
     * The value for the luas_tanah_milik field.
     * @var        string
     */
    protected $luas_tanah_milik;

    /**
     * The value for the luas_tanah_bukan_milik field.
     * @var        string
     */
    protected $luas_tanah_bukan_milik;

    /**
     * The value for the kode_registrasi field.
     * @var        string
     */
    protected $kode_registrasi;

    /**
     * The value for the npwp field.
     * @var        string
     */
    protected $npwp;

    /**
     * The value for the nm_wp field.
     * @var        string
     */
    protected $nm_wp;

    /**
     * The value for the keaktifan field.
     * Note: this column has a database default value of: '1'
     * @var        string
     */
    protected $keaktifan;

    /**
     * The value for the flag field.
     * @var        string
     */
    protected $flag;

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
     * @var        MstWilayah
     */
    protected $aMstWilayah;

    /**
     * @var        KebutuhanKhusus
     */
    protected $aKebutuhanKhusus;

    /**
     * @var        BentukPendidikan
     */
    protected $aBentukPendidikan;

    /**
     * @var        Yayasan
     */
    protected $aYayasan;

    /**
     * @var        StatusKepemilikan
     */
    protected $aStatusKepemilikan;

    /**
     * @var        PropelObjectCollection|AkreditasiSp[] Collection to store aggregation of AkreditasiSp objects.
     */
    protected $collAkreditasiSps;
    protected $collAkreditasiSpsPartial;

    /**
     * @var        PropelObjectCollection|Alat[] Collection to store aggregation of Alat objects.
     */
    protected $collAlats;
    protected $collAlatsPartial;

    /**
     * @var        PropelObjectCollection|AnggotaGugus[] Collection to store aggregation of AnggotaGugus objects.
     */
    protected $collAnggotaGuguses;
    protected $collAnggotaGugusesPartial;

    /**
     * @var        PropelObjectCollection|Angkutan[] Collection to store aggregation of Angkutan objects.
     */
    protected $collAngkutans;
    protected $collAngkutansPartial;

    /**
     * @var        PropelObjectCollection|Bangunan[] Collection to store aggregation of Bangunan objects.
     */
    protected $collBangunans;
    protected $collBangunansPartial;

    /**
     * @var        PropelObjectCollection|Blockgrant[] Collection to store aggregation of Blockgrant objects.
     */
    protected $collBlockgrants;
    protected $collBlockgrantsPartial;

    /**
     * @var        PropelObjectCollection|Buku[] Collection to store aggregation of Buku objects.
     */
    protected $collBukus;
    protected $collBukusPartial;

    /**
     * @var        PropelObjectCollection|DataDynamic[] Collection to store aggregation of DataDynamic objects.
     */
    protected $collDataDynamics;
    protected $collDataDynamicsPartial;

    /**
     * @var        PropelObjectCollection|GugusSekolah[] Collection to store aggregation of GugusSekolah objects.
     */
    protected $collGugusSekolahs;
    protected $collGugusSekolahsPartial;

    /**
     * @var        PropelObjectCollection|Instalasi[] Collection to store aggregation of Instalasi objects.
     */
    protected $collInstalasis;
    protected $collInstalasisPartial;

    /**
     * @var        PropelObjectCollection|IzinOperasional[] Collection to store aggregation of IzinOperasional objects.
     */
    protected $collIzinOperasionals;
    protected $collIzinOperasionalsPartial;

    /**
     * @var        PropelObjectCollection|JurusanSp[] Collection to store aggregation of JurusanSp objects.
     */
    protected $collJurusanSps;
    protected $collJurusanSpsPartial;

    /**
     * @var        PropelObjectCollection|Kepanitiaan[] Collection to store aggregation of Kepanitiaan objects.
     */
    protected $collKepanitiaans;
    protected $collKepanitiaansPartial;

    /**
     * @var        PropelObjectCollection|LayananKhusus[] Collection to store aggregation of LayananKhusus objects.
     */
    protected $collLayananKhususes;
    protected $collLayananKhususesPartial;

    /**
     * @var        PropelObjectCollection|Mou[] Collection to store aggregation of Mou objects.
     */
    protected $collMous;
    protected $collMousPartial;

    /**
     * @var        PropelObjectCollection|PesertaDidikBaru[] Collection to store aggregation of PesertaDidikBaru objects.
     */
    protected $collPesertaDidikBarus;
    protected $collPesertaDidikBarusPartial;

    /**
     * @var        PropelObjectCollection|ProgramInklusi[] Collection to store aggregation of ProgramInklusi objects.
     */
    protected $collProgramInklusis;
    protected $collProgramInklusisPartial;

    /**
     * @var        PropelObjectCollection|PtkBaru[] Collection to store aggregation of PtkBaru objects.
     */
    protected $collPtkBarus;
    protected $collPtkBarusPartial;

    /**
     * @var        PropelObjectCollection|PtkTerdaftar[] Collection to store aggregation of PtkTerdaftar objects.
     */
    protected $collPtkTerdaftars;
    protected $collPtkTerdaftarsPartial;

    /**
     * @var        PropelObjectCollection|RegistrasiPesertaDidik[] Collection to store aggregation of RegistrasiPesertaDidik objects.
     */
    protected $collRegistrasiPesertaDidiks;
    protected $collRegistrasiPesertaDidiksPartial;

    /**
     * @var        PropelObjectCollection|RombonganBelajar[] Collection to store aggregation of RombonganBelajar objects.
     */
    protected $collRombonganBelajars;
    protected $collRombonganBelajarsPartial;

    /**
     * @var        PropelObjectCollection|Ruang[] Collection to store aggregation of Ruang objects.
     */
    protected $collRuangs;
    protected $collRuangsPartial;

    /**
     * @var        PropelObjectCollection|Sanitasi[] Collection to store aggregation of Sanitasi objects.
     */
    protected $collSanitasis;
    protected $collSanitasisPartial;

    /**
     * @var        PropelObjectCollection|SasaranPengawasan[] Collection to store aggregation of SasaranPengawasan objects.
     */
    protected $collSasaranPengawasans;
    protected $collSasaranPengawasansPartial;

    /**
     * @var        PropelObjectCollection|SekolahLongitudinal[] Collection to store aggregation of SekolahLongitudinal objects.
     */
    protected $collSekolahLongitudinals;
    protected $collSekolahLongitudinalsPartial;

    /**
     * @var        SekolahPaud one-to-one related SekolahPaud object
     */
    protected $singleSekolahPaud;

    /**
     * @var        PropelObjectCollection|Tanah[] Collection to store aggregation of Tanah objects.
     */
    protected $collTanahs;
    protected $collTanahsPartial;

    /**
     * @var        PropelObjectCollection|TugasTambahan[] Collection to store aggregation of TugasTambahan objects.
     */
    protected $collTugasTambahans;
    protected $collTugasTambahansPartial;

    /**
     * @var        PropelObjectCollection|UnitUsaha[] Collection to store aggregation of UnitUsaha objects.
     */
    protected $collUnitUsahas;
    protected $collUnitUsahasPartial;

    /**
     * @var        PropelObjectCollection|VldSekolah[] Collection to store aggregation of VldSekolah objects.
     */
    protected $collVldSekolahs;
    protected $collVldSekolahsPartial;

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
    protected $akreditasiSpsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $alatsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $anggotaGugusesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $angkutansScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $bangunansScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $blockgrantsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $bukusScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $dataDynamicsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $gugusSekolahsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $instalasisScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $izinOperasionalsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $jurusanSpsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $kepanitiaansScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $layananKhususesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $mousScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $pesertaDidikBarusScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $programInklusisScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $ptkBarusScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $ptkTerdaftarsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $registrasiPesertaDidiksScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $rombonganBelajarsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $ruangsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $sanitasisScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $sasaranPengawasansScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $sekolahLongitudinalsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $sekolahPaudsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $tanahsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $tugasTambahansScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $unitUsahasScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $vldSekolahsScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->keaktifan = '1';
        $this->create_date = '2020-04-16 09:40:03';
        $this->last_update = '2020-04-16 09:40:03';
        $this->last_sync = '1901-01-01 00:00:00';
    }

    /**
     * Initializes internal state of BaseSekolah object.
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
     * Get the [nama] column value.
     * 
     * @return string
     */
    public function getNama()
    {
        return $this->nama;
    }

    /**
     * Get the [nama_nomenklatur] column value.
     * 
     * @return string
     */
    public function getNamaNomenklatur()
    {
        return $this->nama_nomenklatur;
    }

    /**
     * Get the [nss] column value.
     * 
     * @return string
     */
    public function getNss()
    {
        return $this->nss;
    }

    /**
     * Get the [npsn] column value.
     * 
     * @return string
     */
    public function getNpsn()
    {
        return $this->npsn;
    }

    /**
     * Get the [bentuk_pendidikan_id] column value.
     * 
     * @return int
     */
    public function getBentukPendidikanId()
    {
        return $this->bentuk_pendidikan_id;
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
     * Get the [nomor_telepon] column value.
     * 
     * @return string
     */
    public function getNomorTelepon()
    {
        return $this->nomor_telepon;
    }

    /**
     * Get the [nomor_fax] column value.
     * 
     * @return string
     */
    public function getNomorFax()
    {
        return $this->nomor_fax;
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
     * Get the [website] column value.
     * 
     * @return string
     */
    public function getWebsite()
    {
        return $this->website;
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
     * Get the [status_sekolah] column value.
     * 
     * @return string
     */
    public function getStatusSekolah()
    {
        return $this->status_sekolah;
    }

    /**
     * Get the [sk_pendirian_sekolah] column value.
     * 
     * @return string
     */
    public function getSkPendirianSekolah()
    {
        return $this->sk_pendirian_sekolah;
    }

    /**
     * Get the [optionally formatted] temporal [tanggal_sk_pendirian] column value.
     * 
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getTanggalSkPendirian($format = '%Y-%m-%d')
    {
        if ($this->tanggal_sk_pendirian === null) {
            return null;
        }


        try {
            $dt = new DateTime($this->tanggal_sk_pendirian);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->tanggal_sk_pendirian, true), $x);
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
     * Get the [status_kepemilikan_id] column value.
     * 
     * @return string
     */
    public function getStatusKepemilikanId()
    {
        return $this->status_kepemilikan_id;
    }

    /**
     * Get the [yayasan_id] column value.
     * 
     * @return string
     */
    public function getYayasanId()
    {
        return $this->yayasan_id;
    }

    /**
     * Get the [sk_izin_operasional] column value.
     * 
     * @return string
     */
    public function getSkIzinOperasional()
    {
        return $this->sk_izin_operasional;
    }

    /**
     * Get the [optionally formatted] temporal [tanggal_sk_izin_operasional] column value.
     * 
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getTanggalSkIzinOperasional($format = '%Y-%m-%d')
    {
        if ($this->tanggal_sk_izin_operasional === null) {
            return null;
        }


        try {
            $dt = new DateTime($this->tanggal_sk_izin_operasional);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->tanggal_sk_izin_operasional, true), $x);
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
     * Get the [no_rekening] column value.
     * 
     * @return string
     */
    public function getNoRekening()
    {
        return $this->no_rekening;
    }

    /**
     * Get the [nama_bank] column value.
     * 
     * @return string
     */
    public function getNamaBank()
    {
        return $this->nama_bank;
    }

    /**
     * Get the [cabang_kcp_unit] column value.
     * 
     * @return string
     */
    public function getCabangKcpUnit()
    {
        return $this->cabang_kcp_unit;
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
     * Get the [mbs] column value.
     * 
     * @return string
     */
    public function getMbs()
    {
        return $this->mbs;
    }

    /**
     * Get the [luas_tanah_milik] column value.
     * 
     * @return string
     */
    public function getLuasTanahMilik()
    {
        return $this->luas_tanah_milik;
    }

    /**
     * Get the [luas_tanah_bukan_milik] column value.
     * 
     * @return string
     */
    public function getLuasTanahBukanMilik()
    {
        return $this->luas_tanah_bukan_milik;
    }

    /**
     * Get the [kode_registrasi] column value.
     * 
     * @return string
     */
    public function getKodeRegistrasi()
    {
        return $this->kode_registrasi;
    }

    /**
     * Get the [npwp] column value.
     * 
     * @return string
     */
    public function getNpwp()
    {
        return $this->npwp;
    }

    /**
     * Get the [nm_wp] column value.
     * 
     * @return string
     */
    public function getNmWp()
    {
        return $this->nm_wp;
    }

    /**
     * Get the [keaktifan] column value.
     * 
     * @return string
     */
    public function getKeaktifan()
    {
        return $this->keaktifan;
    }

    /**
     * Get the [flag] column value.
     * 
     * @return string
     */
    public function getFlag()
    {
        return $this->flag;
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
     * @return Sekolah The current object (for fluent API support)
     */
    public function setSekolahId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->sekolah_id !== $v) {
            $this->sekolah_id = $v;
            $this->modifiedColumns[] = SekolahPeer::SEKOLAH_ID;
        }


        return $this;
    } // setSekolahId()

    /**
     * Set the value of [nama] column.
     * 
     * @param string $v new value
     * @return Sekolah The current object (for fluent API support)
     */
    public function setNama($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nama !== $v) {
            $this->nama = $v;
            $this->modifiedColumns[] = SekolahPeer::NAMA;
        }


        return $this;
    } // setNama()

    /**
     * Set the value of [nama_nomenklatur] column.
     * 
     * @param string $v new value
     * @return Sekolah The current object (for fluent API support)
     */
    public function setNamaNomenklatur($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nama_nomenklatur !== $v) {
            $this->nama_nomenklatur = $v;
            $this->modifiedColumns[] = SekolahPeer::NAMA_NOMENKLATUR;
        }


        return $this;
    } // setNamaNomenklatur()

    /**
     * Set the value of [nss] column.
     * 
     * @param string $v new value
     * @return Sekolah The current object (for fluent API support)
     */
    public function setNss($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nss !== $v) {
            $this->nss = $v;
            $this->modifiedColumns[] = SekolahPeer::NSS;
        }


        return $this;
    } // setNss()

    /**
     * Set the value of [npsn] column.
     * 
     * @param string $v new value
     * @return Sekolah The current object (for fluent API support)
     */
    public function setNpsn($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->npsn !== $v) {
            $this->npsn = $v;
            $this->modifiedColumns[] = SekolahPeer::NPSN;
        }


        return $this;
    } // setNpsn()

    /**
     * Set the value of [bentuk_pendidikan_id] column.
     * 
     * @param int $v new value
     * @return Sekolah The current object (for fluent API support)
     */
    public function setBentukPendidikanId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->bentuk_pendidikan_id !== $v) {
            $this->bentuk_pendidikan_id = $v;
            $this->modifiedColumns[] = SekolahPeer::BENTUK_PENDIDIKAN_ID;
        }

        if ($this->aBentukPendidikan !== null && $this->aBentukPendidikan->getBentukPendidikanId() !== $v) {
            $this->aBentukPendidikan = null;
        }


        return $this;
    } // setBentukPendidikanId()

    /**
     * Set the value of [alamat_jalan] column.
     * 
     * @param string $v new value
     * @return Sekolah The current object (for fluent API support)
     */
    public function setAlamatJalan($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->alamat_jalan !== $v) {
            $this->alamat_jalan = $v;
            $this->modifiedColumns[] = SekolahPeer::ALAMAT_JALAN;
        }


        return $this;
    } // setAlamatJalan()

    /**
     * Set the value of [rt] column.
     * 
     * @param string $v new value
     * @return Sekolah The current object (for fluent API support)
     */
    public function setRt($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->rt !== $v) {
            $this->rt = $v;
            $this->modifiedColumns[] = SekolahPeer::RT;
        }


        return $this;
    } // setRt()

    /**
     * Set the value of [rw] column.
     * 
     * @param string $v new value
     * @return Sekolah The current object (for fluent API support)
     */
    public function setRw($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->rw !== $v) {
            $this->rw = $v;
            $this->modifiedColumns[] = SekolahPeer::RW;
        }


        return $this;
    } // setRw()

    /**
     * Set the value of [nama_dusun] column.
     * 
     * @param string $v new value
     * @return Sekolah The current object (for fluent API support)
     */
    public function setNamaDusun($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nama_dusun !== $v) {
            $this->nama_dusun = $v;
            $this->modifiedColumns[] = SekolahPeer::NAMA_DUSUN;
        }


        return $this;
    } // setNamaDusun()

    /**
     * Set the value of [desa_kelurahan] column.
     * 
     * @param string $v new value
     * @return Sekolah The current object (for fluent API support)
     */
    public function setDesaKelurahan($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->desa_kelurahan !== $v) {
            $this->desa_kelurahan = $v;
            $this->modifiedColumns[] = SekolahPeer::DESA_KELURAHAN;
        }


        return $this;
    } // setDesaKelurahan()

    /**
     * Set the value of [kode_wilayah] column.
     * 
     * @param string $v new value
     * @return Sekolah The current object (for fluent API support)
     */
    public function setKodeWilayah($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->kode_wilayah !== $v) {
            $this->kode_wilayah = $v;
            $this->modifiedColumns[] = SekolahPeer::KODE_WILAYAH;
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
     * @return Sekolah The current object (for fluent API support)
     */
    public function setKodePos($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->kode_pos !== $v) {
            $this->kode_pos = $v;
            $this->modifiedColumns[] = SekolahPeer::KODE_POS;
        }


        return $this;
    } // setKodePos()

    /**
     * Set the value of [lintang] column.
     * 
     * @param string $v new value
     * @return Sekolah The current object (for fluent API support)
     */
    public function setLintang($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->lintang !== $v) {
            $this->lintang = $v;
            $this->modifiedColumns[] = SekolahPeer::LINTANG;
        }


        return $this;
    } // setLintang()

    /**
     * Set the value of [bujur] column.
     * 
     * @param string $v new value
     * @return Sekolah The current object (for fluent API support)
     */
    public function setBujur($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->bujur !== $v) {
            $this->bujur = $v;
            $this->modifiedColumns[] = SekolahPeer::BUJUR;
        }


        return $this;
    } // setBujur()

    /**
     * Set the value of [nomor_telepon] column.
     * 
     * @param string $v new value
     * @return Sekolah The current object (for fluent API support)
     */
    public function setNomorTelepon($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nomor_telepon !== $v) {
            $this->nomor_telepon = $v;
            $this->modifiedColumns[] = SekolahPeer::NOMOR_TELEPON;
        }


        return $this;
    } // setNomorTelepon()

    /**
     * Set the value of [nomor_fax] column.
     * 
     * @param string $v new value
     * @return Sekolah The current object (for fluent API support)
     */
    public function setNomorFax($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nomor_fax !== $v) {
            $this->nomor_fax = $v;
            $this->modifiedColumns[] = SekolahPeer::NOMOR_FAX;
        }


        return $this;
    } // setNomorFax()

    /**
     * Set the value of [email] column.
     * 
     * @param string $v new value
     * @return Sekolah The current object (for fluent API support)
     */
    public function setEmail($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->email !== $v) {
            $this->email = $v;
            $this->modifiedColumns[] = SekolahPeer::EMAIL;
        }


        return $this;
    } // setEmail()

    /**
     * Set the value of [website] column.
     * 
     * @param string $v new value
     * @return Sekolah The current object (for fluent API support)
     */
    public function setWebsite($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->website !== $v) {
            $this->website = $v;
            $this->modifiedColumns[] = SekolahPeer::WEBSITE;
        }


        return $this;
    } // setWebsite()

    /**
     * Set the value of [kebutuhan_khusus_id] column.
     * 
     * @param int $v new value
     * @return Sekolah The current object (for fluent API support)
     */
    public function setKebutuhanKhususId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->kebutuhan_khusus_id !== $v) {
            $this->kebutuhan_khusus_id = $v;
            $this->modifiedColumns[] = SekolahPeer::KEBUTUHAN_KHUSUS_ID;
        }

        if ($this->aKebutuhanKhusus !== null && $this->aKebutuhanKhusus->getKebutuhanKhususId() !== $v) {
            $this->aKebutuhanKhusus = null;
        }


        return $this;
    } // setKebutuhanKhususId()

    /**
     * Set the value of [status_sekolah] column.
     * 
     * @param string $v new value
     * @return Sekolah The current object (for fluent API support)
     */
    public function setStatusSekolah($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->status_sekolah !== $v) {
            $this->status_sekolah = $v;
            $this->modifiedColumns[] = SekolahPeer::STATUS_SEKOLAH;
        }


        return $this;
    } // setStatusSekolah()

    /**
     * Set the value of [sk_pendirian_sekolah] column.
     * 
     * @param string $v new value
     * @return Sekolah The current object (for fluent API support)
     */
    public function setSkPendirianSekolah($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->sk_pendirian_sekolah !== $v) {
            $this->sk_pendirian_sekolah = $v;
            $this->modifiedColumns[] = SekolahPeer::SK_PENDIRIAN_SEKOLAH;
        }


        return $this;
    } // setSkPendirianSekolah()

    /**
     * Sets the value of [tanggal_sk_pendirian] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Sekolah The current object (for fluent API support)
     */
    public function setTanggalSkPendirian($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->tanggal_sk_pendirian !== null || $dt !== null) {
            $currentDateAsString = ($this->tanggal_sk_pendirian !== null && $tmpDt = new DateTime($this->tanggal_sk_pendirian)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->tanggal_sk_pendirian = $newDateAsString;
                $this->modifiedColumns[] = SekolahPeer::TANGGAL_SK_PENDIRIAN;
            }
        } // if either are not null


        return $this;
    } // setTanggalSkPendirian()

    /**
     * Set the value of [status_kepemilikan_id] column.
     * 
     * @param string $v new value
     * @return Sekolah The current object (for fluent API support)
     */
    public function setStatusKepemilikanId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->status_kepemilikan_id !== $v) {
            $this->status_kepemilikan_id = $v;
            $this->modifiedColumns[] = SekolahPeer::STATUS_KEPEMILIKAN_ID;
        }

        if ($this->aStatusKepemilikan !== null && $this->aStatusKepemilikan->getStatusKepemilikanId() !== $v) {
            $this->aStatusKepemilikan = null;
        }


        return $this;
    } // setStatusKepemilikanId()

    /**
     * Set the value of [yayasan_id] column.
     * 
     * @param string $v new value
     * @return Sekolah The current object (for fluent API support)
     */
    public function setYayasanId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->yayasan_id !== $v) {
            $this->yayasan_id = $v;
            $this->modifiedColumns[] = SekolahPeer::YAYASAN_ID;
        }

        if ($this->aYayasan !== null && $this->aYayasan->getYayasanId() !== $v) {
            $this->aYayasan = null;
        }


        return $this;
    } // setYayasanId()

    /**
     * Set the value of [sk_izin_operasional] column.
     * 
     * @param string $v new value
     * @return Sekolah The current object (for fluent API support)
     */
    public function setSkIzinOperasional($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->sk_izin_operasional !== $v) {
            $this->sk_izin_operasional = $v;
            $this->modifiedColumns[] = SekolahPeer::SK_IZIN_OPERASIONAL;
        }


        return $this;
    } // setSkIzinOperasional()

    /**
     * Sets the value of [tanggal_sk_izin_operasional] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Sekolah The current object (for fluent API support)
     */
    public function setTanggalSkIzinOperasional($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->tanggal_sk_izin_operasional !== null || $dt !== null) {
            $currentDateAsString = ($this->tanggal_sk_izin_operasional !== null && $tmpDt = new DateTime($this->tanggal_sk_izin_operasional)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->tanggal_sk_izin_operasional = $newDateAsString;
                $this->modifiedColumns[] = SekolahPeer::TANGGAL_SK_IZIN_OPERASIONAL;
            }
        } // if either are not null


        return $this;
    } // setTanggalSkIzinOperasional()

    /**
     * Set the value of [no_rekening] column.
     * 
     * @param string $v new value
     * @return Sekolah The current object (for fluent API support)
     */
    public function setNoRekening($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->no_rekening !== $v) {
            $this->no_rekening = $v;
            $this->modifiedColumns[] = SekolahPeer::NO_REKENING;
        }


        return $this;
    } // setNoRekening()

    /**
     * Set the value of [nama_bank] column.
     * 
     * @param string $v new value
     * @return Sekolah The current object (for fluent API support)
     */
    public function setNamaBank($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nama_bank !== $v) {
            $this->nama_bank = $v;
            $this->modifiedColumns[] = SekolahPeer::NAMA_BANK;
        }


        return $this;
    } // setNamaBank()

    /**
     * Set the value of [cabang_kcp_unit] column.
     * 
     * @param string $v new value
     * @return Sekolah The current object (for fluent API support)
     */
    public function setCabangKcpUnit($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->cabang_kcp_unit !== $v) {
            $this->cabang_kcp_unit = $v;
            $this->modifiedColumns[] = SekolahPeer::CABANG_KCP_UNIT;
        }


        return $this;
    } // setCabangKcpUnit()

    /**
     * Set the value of [rekening_atas_nama] column.
     * 
     * @param string $v new value
     * @return Sekolah The current object (for fluent API support)
     */
    public function setRekeningAtasNama($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->rekening_atas_nama !== $v) {
            $this->rekening_atas_nama = $v;
            $this->modifiedColumns[] = SekolahPeer::REKENING_ATAS_NAMA;
        }


        return $this;
    } // setRekeningAtasNama()

    /**
     * Set the value of [mbs] column.
     * 
     * @param string $v new value
     * @return Sekolah The current object (for fluent API support)
     */
    public function setMbs($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->mbs !== $v) {
            $this->mbs = $v;
            $this->modifiedColumns[] = SekolahPeer::MBS;
        }


        return $this;
    } // setMbs()

    /**
     * Set the value of [luas_tanah_milik] column.
     * 
     * @param string $v new value
     * @return Sekolah The current object (for fluent API support)
     */
    public function setLuasTanahMilik($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->luas_tanah_milik !== $v) {
            $this->luas_tanah_milik = $v;
            $this->modifiedColumns[] = SekolahPeer::LUAS_TANAH_MILIK;
        }


        return $this;
    } // setLuasTanahMilik()

    /**
     * Set the value of [luas_tanah_bukan_milik] column.
     * 
     * @param string $v new value
     * @return Sekolah The current object (for fluent API support)
     */
    public function setLuasTanahBukanMilik($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->luas_tanah_bukan_milik !== $v) {
            $this->luas_tanah_bukan_milik = $v;
            $this->modifiedColumns[] = SekolahPeer::LUAS_TANAH_BUKAN_MILIK;
        }


        return $this;
    } // setLuasTanahBukanMilik()

    /**
     * Set the value of [kode_registrasi] column.
     * 
     * @param string $v new value
     * @return Sekolah The current object (for fluent API support)
     */
    public function setKodeRegistrasi($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->kode_registrasi !== $v) {
            $this->kode_registrasi = $v;
            $this->modifiedColumns[] = SekolahPeer::KODE_REGISTRASI;
        }


        return $this;
    } // setKodeRegistrasi()

    /**
     * Set the value of [npwp] column.
     * 
     * @param string $v new value
     * @return Sekolah The current object (for fluent API support)
     */
    public function setNpwp($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->npwp !== $v) {
            $this->npwp = $v;
            $this->modifiedColumns[] = SekolahPeer::NPWP;
        }


        return $this;
    } // setNpwp()

    /**
     * Set the value of [nm_wp] column.
     * 
     * @param string $v new value
     * @return Sekolah The current object (for fluent API support)
     */
    public function setNmWp($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nm_wp !== $v) {
            $this->nm_wp = $v;
            $this->modifiedColumns[] = SekolahPeer::NM_WP;
        }


        return $this;
    } // setNmWp()

    /**
     * Set the value of [keaktifan] column.
     * 
     * @param string $v new value
     * @return Sekolah The current object (for fluent API support)
     */
    public function setKeaktifan($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->keaktifan !== $v) {
            $this->keaktifan = $v;
            $this->modifiedColumns[] = SekolahPeer::KEAKTIFAN;
        }


        return $this;
    } // setKeaktifan()

    /**
     * Set the value of [flag] column.
     * 
     * @param string $v new value
     * @return Sekolah The current object (for fluent API support)
     */
    public function setFlag($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->flag !== $v) {
            $this->flag = $v;
            $this->modifiedColumns[] = SekolahPeer::FLAG;
        }


        return $this;
    } // setFlag()

    /**
     * Sets the value of [create_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Sekolah The current object (for fluent API support)
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
                $this->modifiedColumns[] = SekolahPeer::CREATE_DATE;
            }
        } // if either are not null


        return $this;
    } // setCreateDate()

    /**
     * Sets the value of [last_update] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Sekolah The current object (for fluent API support)
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
                $this->modifiedColumns[] = SekolahPeer::LAST_UPDATE;
            }
        } // if either are not null


        return $this;
    } // setLastUpdate()

    /**
     * Set the value of [soft_delete] column.
     * 
     * @param string $v new value
     * @return Sekolah The current object (for fluent API support)
     */
    public function setSoftDelete($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->soft_delete !== $v) {
            $this->soft_delete = $v;
            $this->modifiedColumns[] = SekolahPeer::SOFT_DELETE;
        }


        return $this;
    } // setSoftDelete()

    /**
     * Sets the value of [last_sync] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Sekolah The current object (for fluent API support)
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
                $this->modifiedColumns[] = SekolahPeer::LAST_SYNC;
            }
        } // if either are not null


        return $this;
    } // setLastSync()

    /**
     * Set the value of [updater_id] column.
     * 
     * @param string $v new value
     * @return Sekolah The current object (for fluent API support)
     */
    public function setUpdaterId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->updater_id !== $v) {
            $this->updater_id = $v;
            $this->modifiedColumns[] = SekolahPeer::UPDATER_ID;
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
            if ($this->keaktifan !== '1') {
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

            $this->sekolah_id = ($row[$startcol + 0] !== null) ? (string) $row[$startcol + 0] : null;
            $this->nama = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->nama_nomenklatur = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->nss = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->npsn = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->bentuk_pendidikan_id = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
            $this->alamat_jalan = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->rt = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->rw = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->nama_dusun = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
            $this->desa_kelurahan = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
            $this->kode_wilayah = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
            $this->kode_pos = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
            $this->lintang = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
            $this->bujur = ($row[$startcol + 14] !== null) ? (string) $row[$startcol + 14] : null;
            $this->nomor_telepon = ($row[$startcol + 15] !== null) ? (string) $row[$startcol + 15] : null;
            $this->nomor_fax = ($row[$startcol + 16] !== null) ? (string) $row[$startcol + 16] : null;
            $this->email = ($row[$startcol + 17] !== null) ? (string) $row[$startcol + 17] : null;
            $this->website = ($row[$startcol + 18] !== null) ? (string) $row[$startcol + 18] : null;
            $this->kebutuhan_khusus_id = ($row[$startcol + 19] !== null) ? (int) $row[$startcol + 19] : null;
            $this->status_sekolah = ($row[$startcol + 20] !== null) ? (string) $row[$startcol + 20] : null;
            $this->sk_pendirian_sekolah = ($row[$startcol + 21] !== null) ? (string) $row[$startcol + 21] : null;
            $this->tanggal_sk_pendirian = ($row[$startcol + 22] !== null) ? (string) $row[$startcol + 22] : null;
            $this->status_kepemilikan_id = ($row[$startcol + 23] !== null) ? (string) $row[$startcol + 23] : null;
            $this->yayasan_id = ($row[$startcol + 24] !== null) ? (string) $row[$startcol + 24] : null;
            $this->sk_izin_operasional = ($row[$startcol + 25] !== null) ? (string) $row[$startcol + 25] : null;
            $this->tanggal_sk_izin_operasional = ($row[$startcol + 26] !== null) ? (string) $row[$startcol + 26] : null;
            $this->no_rekening = ($row[$startcol + 27] !== null) ? (string) $row[$startcol + 27] : null;
            $this->nama_bank = ($row[$startcol + 28] !== null) ? (string) $row[$startcol + 28] : null;
            $this->cabang_kcp_unit = ($row[$startcol + 29] !== null) ? (string) $row[$startcol + 29] : null;
            $this->rekening_atas_nama = ($row[$startcol + 30] !== null) ? (string) $row[$startcol + 30] : null;
            $this->mbs = ($row[$startcol + 31] !== null) ? (string) $row[$startcol + 31] : null;
            $this->luas_tanah_milik = ($row[$startcol + 32] !== null) ? (string) $row[$startcol + 32] : null;
            $this->luas_tanah_bukan_milik = ($row[$startcol + 33] !== null) ? (string) $row[$startcol + 33] : null;
            $this->kode_registrasi = ($row[$startcol + 34] !== null) ? (string) $row[$startcol + 34] : null;
            $this->npwp = ($row[$startcol + 35] !== null) ? (string) $row[$startcol + 35] : null;
            $this->nm_wp = ($row[$startcol + 36] !== null) ? (string) $row[$startcol + 36] : null;
            $this->keaktifan = ($row[$startcol + 37] !== null) ? (string) $row[$startcol + 37] : null;
            $this->flag = ($row[$startcol + 38] !== null) ? (string) $row[$startcol + 38] : null;
            $this->create_date = ($row[$startcol + 39] !== null) ? (string) $row[$startcol + 39] : null;
            $this->last_update = ($row[$startcol + 40] !== null) ? (string) $row[$startcol + 40] : null;
            $this->soft_delete = ($row[$startcol + 41] !== null) ? (string) $row[$startcol + 41] : null;
            $this->last_sync = ($row[$startcol + 42] !== null) ? (string) $row[$startcol + 42] : null;
            $this->updater_id = ($row[$startcol + 43] !== null) ? (string) $row[$startcol + 43] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 44; // 44 = SekolahPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Sekolah object", $e);
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

        if ($this->aBentukPendidikan !== null && $this->bentuk_pendidikan_id !== $this->aBentukPendidikan->getBentukPendidikanId()) {
            $this->aBentukPendidikan = null;
        }
        if ($this->aMstWilayah !== null && $this->kode_wilayah !== $this->aMstWilayah->getKodeWilayah()) {
            $this->aMstWilayah = null;
        }
        if ($this->aKebutuhanKhusus !== null && $this->kebutuhan_khusus_id !== $this->aKebutuhanKhusus->getKebutuhanKhususId()) {
            $this->aKebutuhanKhusus = null;
        }
        if ($this->aStatusKepemilikan !== null && $this->status_kepemilikan_id !== $this->aStatusKepemilikan->getStatusKepemilikanId()) {
            $this->aStatusKepemilikan = null;
        }
        if ($this->aYayasan !== null && $this->yayasan_id !== $this->aYayasan->getYayasanId()) {
            $this->aYayasan = null;
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
            $con = Propel::getConnection(SekolahPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = SekolahPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aMstWilayah = null;
            $this->aKebutuhanKhusus = null;
            $this->aBentukPendidikan = null;
            $this->aYayasan = null;
            $this->aStatusKepemilikan = null;
            $this->collAkreditasiSps = null;

            $this->collAlats = null;

            $this->collAnggotaGuguses = null;

            $this->collAngkutans = null;

            $this->collBangunans = null;

            $this->collBlockgrants = null;

            $this->collBukus = null;

            $this->collDataDynamics = null;

            $this->collGugusSekolahs = null;

            $this->collInstalasis = null;

            $this->collIzinOperasionals = null;

            $this->collJurusanSps = null;

            $this->collKepanitiaans = null;

            $this->collLayananKhususes = null;

            $this->collMous = null;

            $this->collPesertaDidikBarus = null;

            $this->collProgramInklusis = null;

            $this->collPtkBarus = null;

            $this->collPtkTerdaftars = null;

            $this->collRegistrasiPesertaDidiks = null;

            $this->collRombonganBelajars = null;

            $this->collRuangs = null;

            $this->collSanitasis = null;

            $this->collSasaranPengawasans = null;

            $this->collSekolahLongitudinals = null;

            $this->singleSekolahPaud = null;

            $this->collTanahs = null;

            $this->collTugasTambahans = null;

            $this->collUnitUsahas = null;

            $this->collVldSekolahs = null;

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
            $con = Propel::getConnection(SekolahPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = SekolahQuery::create()
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
            $con = Propel::getConnection(SekolahPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                SekolahPeer::addInstanceToPool($this);
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

            if ($this->aMstWilayah !== null) {
                if ($this->aMstWilayah->isModified() || $this->aMstWilayah->isNew()) {
                    $affectedRows += $this->aMstWilayah->save($con);
                }
                $this->setMstWilayah($this->aMstWilayah);
            }

            if ($this->aKebutuhanKhusus !== null) {
                if ($this->aKebutuhanKhusus->isModified() || $this->aKebutuhanKhusus->isNew()) {
                    $affectedRows += $this->aKebutuhanKhusus->save($con);
                }
                $this->setKebutuhanKhusus($this->aKebutuhanKhusus);
            }

            if ($this->aBentukPendidikan !== null) {
                if ($this->aBentukPendidikan->isModified() || $this->aBentukPendidikan->isNew()) {
                    $affectedRows += $this->aBentukPendidikan->save($con);
                }
                $this->setBentukPendidikan($this->aBentukPendidikan);
            }

            if ($this->aYayasan !== null) {
                if ($this->aYayasan->isModified() || $this->aYayasan->isNew()) {
                    $affectedRows += $this->aYayasan->save($con);
                }
                $this->setYayasan($this->aYayasan);
            }

            if ($this->aStatusKepemilikan !== null) {
                if ($this->aStatusKepemilikan->isModified() || $this->aStatusKepemilikan->isNew()) {
                    $affectedRows += $this->aStatusKepemilikan->save($con);
                }
                $this->setStatusKepemilikan($this->aStatusKepemilikan);
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

            if ($this->akreditasiSpsScheduledForDeletion !== null) {
                if (!$this->akreditasiSpsScheduledForDeletion->isEmpty()) {
                    AkreditasiSpQuery::create()
                        ->filterByPrimaryKeys($this->akreditasiSpsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->akreditasiSpsScheduledForDeletion = null;
                }
            }

            if ($this->collAkreditasiSps !== null) {
                foreach ($this->collAkreditasiSps as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->alatsScheduledForDeletion !== null) {
                if (!$this->alatsScheduledForDeletion->isEmpty()) {
                    AlatQuery::create()
                        ->filterByPrimaryKeys($this->alatsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
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

            if ($this->anggotaGugusesScheduledForDeletion !== null) {
                if (!$this->anggotaGugusesScheduledForDeletion->isEmpty()) {
                    AnggotaGugusQuery::create()
                        ->filterByPrimaryKeys($this->anggotaGugusesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->anggotaGugusesScheduledForDeletion = null;
                }
            }

            if ($this->collAnggotaGuguses !== null) {
                foreach ($this->collAnggotaGuguses as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->angkutansScheduledForDeletion !== null) {
                if (!$this->angkutansScheduledForDeletion->isEmpty()) {
                    AngkutanQuery::create()
                        ->filterByPrimaryKeys($this->angkutansScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->angkutansScheduledForDeletion = null;
                }
            }

            if ($this->collAngkutans !== null) {
                foreach ($this->collAngkutans as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->bangunansScheduledForDeletion !== null) {
                if (!$this->bangunansScheduledForDeletion->isEmpty()) {
                    BangunanQuery::create()
                        ->filterByPrimaryKeys($this->bangunansScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
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

            if ($this->blockgrantsScheduledForDeletion !== null) {
                if (!$this->blockgrantsScheduledForDeletion->isEmpty()) {
                    BlockgrantQuery::create()
                        ->filterByPrimaryKeys($this->blockgrantsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->blockgrantsScheduledForDeletion = null;
                }
            }

            if ($this->collBlockgrants !== null) {
                foreach ($this->collBlockgrants as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->bukusScheduledForDeletion !== null) {
                if (!$this->bukusScheduledForDeletion->isEmpty()) {
                    BukuQuery::create()
                        ->filterByPrimaryKeys($this->bukusScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
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

            if ($this->dataDynamicsScheduledForDeletion !== null) {
                if (!$this->dataDynamicsScheduledForDeletion->isEmpty()) {
                    DataDynamicQuery::create()
                        ->filterByPrimaryKeys($this->dataDynamicsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->dataDynamicsScheduledForDeletion = null;
                }
            }

            if ($this->collDataDynamics !== null) {
                foreach ($this->collDataDynamics as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->gugusSekolahsScheduledForDeletion !== null) {
                if (!$this->gugusSekolahsScheduledForDeletion->isEmpty()) {
                    foreach ($this->gugusSekolahsScheduledForDeletion as $gugusSekolah) {
                        // need to save related object because we set the relation to null
                        $gugusSekolah->save($con);
                    }
                    $this->gugusSekolahsScheduledForDeletion = null;
                }
            }

            if ($this->collGugusSekolahs !== null) {
                foreach ($this->collGugusSekolahs as $referrerFK) {
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

            if ($this->izinOperasionalsScheduledForDeletion !== null) {
                if (!$this->izinOperasionalsScheduledForDeletion->isEmpty()) {
                    IzinOperasionalQuery::create()
                        ->filterByPrimaryKeys($this->izinOperasionalsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->izinOperasionalsScheduledForDeletion = null;
                }
            }

            if ($this->collIzinOperasionals !== null) {
                foreach ($this->collIzinOperasionals as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->jurusanSpsScheduledForDeletion !== null) {
                if (!$this->jurusanSpsScheduledForDeletion->isEmpty()) {
                    JurusanSpQuery::create()
                        ->filterByPrimaryKeys($this->jurusanSpsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->jurusanSpsScheduledForDeletion = null;
                }
            }

            if ($this->collJurusanSps !== null) {
                foreach ($this->collJurusanSps as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->kepanitiaansScheduledForDeletion !== null) {
                if (!$this->kepanitiaansScheduledForDeletion->isEmpty()) {
                    foreach ($this->kepanitiaansScheduledForDeletion as $kepanitiaan) {
                        // need to save related object because we set the relation to null
                        $kepanitiaan->save($con);
                    }
                    $this->kepanitiaansScheduledForDeletion = null;
                }
            }

            if ($this->collKepanitiaans !== null) {
                foreach ($this->collKepanitiaans as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->layananKhususesScheduledForDeletion !== null) {
                if (!$this->layananKhususesScheduledForDeletion->isEmpty()) {
                    LayananKhususQuery::create()
                        ->filterByPrimaryKeys($this->layananKhususesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->layananKhususesScheduledForDeletion = null;
                }
            }

            if ($this->collLayananKhususes !== null) {
                foreach ($this->collLayananKhususes as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->mousScheduledForDeletion !== null) {
                if (!$this->mousScheduledForDeletion->isEmpty()) {
                    MouQuery::create()
                        ->filterByPrimaryKeys($this->mousScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->mousScheduledForDeletion = null;
                }
            }

            if ($this->collMous !== null) {
                foreach ($this->collMous as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->pesertaDidikBarusScheduledForDeletion !== null) {
                if (!$this->pesertaDidikBarusScheduledForDeletion->isEmpty()) {
                    PesertaDidikBaruQuery::create()
                        ->filterByPrimaryKeys($this->pesertaDidikBarusScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
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

            if ($this->programInklusisScheduledForDeletion !== null) {
                if (!$this->programInklusisScheduledForDeletion->isEmpty()) {
                    ProgramInklusiQuery::create()
                        ->filterByPrimaryKeys($this->programInklusisScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->programInklusisScheduledForDeletion = null;
                }
            }

            if ($this->collProgramInklusis !== null) {
                foreach ($this->collProgramInklusis as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->ptkBarusScheduledForDeletion !== null) {
                if (!$this->ptkBarusScheduledForDeletion->isEmpty()) {
                    PtkBaruQuery::create()
                        ->filterByPrimaryKeys($this->ptkBarusScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->ptkBarusScheduledForDeletion = null;
                }
            }

            if ($this->collPtkBarus !== null) {
                foreach ($this->collPtkBarus as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->ptkTerdaftarsScheduledForDeletion !== null) {
                if (!$this->ptkTerdaftarsScheduledForDeletion->isEmpty()) {
                    PtkTerdaftarQuery::create()
                        ->filterByPrimaryKeys($this->ptkTerdaftarsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->ptkTerdaftarsScheduledForDeletion = null;
                }
            }

            if ($this->collPtkTerdaftars !== null) {
                foreach ($this->collPtkTerdaftars as $referrerFK) {
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

            if ($this->sanitasisScheduledForDeletion !== null) {
                if (!$this->sanitasisScheduledForDeletion->isEmpty()) {
                    SanitasiQuery::create()
                        ->filterByPrimaryKeys($this->sanitasisScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->sanitasisScheduledForDeletion = null;
                }
            }

            if ($this->collSanitasis !== null) {
                foreach ($this->collSanitasis as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->sasaranPengawasansScheduledForDeletion !== null) {
                if (!$this->sasaranPengawasansScheduledForDeletion->isEmpty()) {
                    SasaranPengawasanQuery::create()
                        ->filterByPrimaryKeys($this->sasaranPengawasansScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->sasaranPengawasansScheduledForDeletion = null;
                }
            }

            if ($this->collSasaranPengawasans !== null) {
                foreach ($this->collSasaranPengawasans as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->sekolahLongitudinalsScheduledForDeletion !== null) {
                if (!$this->sekolahLongitudinalsScheduledForDeletion->isEmpty()) {
                    SekolahLongitudinalQuery::create()
                        ->filterByPrimaryKeys($this->sekolahLongitudinalsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->sekolahLongitudinalsScheduledForDeletion = null;
                }
            }

            if ($this->collSekolahLongitudinals !== null) {
                foreach ($this->collSekolahLongitudinals as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->sekolahPaudsScheduledForDeletion !== null) {
                if (!$this->sekolahPaudsScheduledForDeletion->isEmpty()) {
                    SekolahPaudQuery::create()
                        ->filterByPrimaryKeys($this->sekolahPaudsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->sekolahPaudsScheduledForDeletion = null;
                }
            }

            if ($this->singleSekolahPaud !== null) {
                if (!$this->singleSekolahPaud->isDeleted() && ($this->singleSekolahPaud->isNew() || $this->singleSekolahPaud->isModified())) {
                        $affectedRows += $this->singleSekolahPaud->save($con);
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

            if ($this->tugasTambahansScheduledForDeletion !== null) {
                if (!$this->tugasTambahansScheduledForDeletion->isEmpty()) {
                    TugasTambahanQuery::create()
                        ->filterByPrimaryKeys($this->tugasTambahansScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
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

            if ($this->unitUsahasScheduledForDeletion !== null) {
                if (!$this->unitUsahasScheduledForDeletion->isEmpty()) {
                    UnitUsahaQuery::create()
                        ->filterByPrimaryKeys($this->unitUsahasScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->unitUsahasScheduledForDeletion = null;
                }
            }

            if ($this->collUnitUsahas !== null) {
                foreach ($this->collUnitUsahas as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->vldSekolahsScheduledForDeletion !== null) {
                if (!$this->vldSekolahsScheduledForDeletion->isEmpty()) {
                    VldSekolahQuery::create()
                        ->filterByPrimaryKeys($this->vldSekolahsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->vldSekolahsScheduledForDeletion = null;
                }
            }

            if ($this->collVldSekolahs !== null) {
                foreach ($this->collVldSekolahs as $referrerFK) {
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
        if ($this->isColumnModified(SekolahPeer::SEKOLAH_ID)) {
            $modifiedColumns[':p' . $index++]  = '"sekolah_id"';
        }
        if ($this->isColumnModified(SekolahPeer::NAMA)) {
            $modifiedColumns[':p' . $index++]  = '"nama"';
        }
        if ($this->isColumnModified(SekolahPeer::NAMA_NOMENKLATUR)) {
            $modifiedColumns[':p' . $index++]  = '"nama_nomenklatur"';
        }
        if ($this->isColumnModified(SekolahPeer::NSS)) {
            $modifiedColumns[':p' . $index++]  = '"nss"';
        }
        if ($this->isColumnModified(SekolahPeer::NPSN)) {
            $modifiedColumns[':p' . $index++]  = '"npsn"';
        }
        if ($this->isColumnModified(SekolahPeer::BENTUK_PENDIDIKAN_ID)) {
            $modifiedColumns[':p' . $index++]  = '"bentuk_pendidikan_id"';
        }
        if ($this->isColumnModified(SekolahPeer::ALAMAT_JALAN)) {
            $modifiedColumns[':p' . $index++]  = '"alamat_jalan"';
        }
        if ($this->isColumnModified(SekolahPeer::RT)) {
            $modifiedColumns[':p' . $index++]  = '"rt"';
        }
        if ($this->isColumnModified(SekolahPeer::RW)) {
            $modifiedColumns[':p' . $index++]  = '"rw"';
        }
        if ($this->isColumnModified(SekolahPeer::NAMA_DUSUN)) {
            $modifiedColumns[':p' . $index++]  = '"nama_dusun"';
        }
        if ($this->isColumnModified(SekolahPeer::DESA_KELURAHAN)) {
            $modifiedColumns[':p' . $index++]  = '"desa_kelurahan"';
        }
        if ($this->isColumnModified(SekolahPeer::KODE_WILAYAH)) {
            $modifiedColumns[':p' . $index++]  = '"kode_wilayah"';
        }
        if ($this->isColumnModified(SekolahPeer::KODE_POS)) {
            $modifiedColumns[':p' . $index++]  = '"kode_pos"';
        }
        if ($this->isColumnModified(SekolahPeer::LINTANG)) {
            $modifiedColumns[':p' . $index++]  = '"lintang"';
        }
        if ($this->isColumnModified(SekolahPeer::BUJUR)) {
            $modifiedColumns[':p' . $index++]  = '"bujur"';
        }
        if ($this->isColumnModified(SekolahPeer::NOMOR_TELEPON)) {
            $modifiedColumns[':p' . $index++]  = '"nomor_telepon"';
        }
        if ($this->isColumnModified(SekolahPeer::NOMOR_FAX)) {
            $modifiedColumns[':p' . $index++]  = '"nomor_fax"';
        }
        if ($this->isColumnModified(SekolahPeer::EMAIL)) {
            $modifiedColumns[':p' . $index++]  = '"email"';
        }
        if ($this->isColumnModified(SekolahPeer::WEBSITE)) {
            $modifiedColumns[':p' . $index++]  = '"website"';
        }
        if ($this->isColumnModified(SekolahPeer::KEBUTUHAN_KHUSUS_ID)) {
            $modifiedColumns[':p' . $index++]  = '"kebutuhan_khusus_id"';
        }
        if ($this->isColumnModified(SekolahPeer::STATUS_SEKOLAH)) {
            $modifiedColumns[':p' . $index++]  = '"status_sekolah"';
        }
        if ($this->isColumnModified(SekolahPeer::SK_PENDIRIAN_SEKOLAH)) {
            $modifiedColumns[':p' . $index++]  = '"sk_pendirian_sekolah"';
        }
        if ($this->isColumnModified(SekolahPeer::TANGGAL_SK_PENDIRIAN)) {
            $modifiedColumns[':p' . $index++]  = '"tanggal_sk_pendirian"';
        }
        if ($this->isColumnModified(SekolahPeer::STATUS_KEPEMILIKAN_ID)) {
            $modifiedColumns[':p' . $index++]  = '"status_kepemilikan_id"';
        }
        if ($this->isColumnModified(SekolahPeer::YAYASAN_ID)) {
            $modifiedColumns[':p' . $index++]  = '"yayasan_id"';
        }
        if ($this->isColumnModified(SekolahPeer::SK_IZIN_OPERASIONAL)) {
            $modifiedColumns[':p' . $index++]  = '"sk_izin_operasional"';
        }
        if ($this->isColumnModified(SekolahPeer::TANGGAL_SK_IZIN_OPERASIONAL)) {
            $modifiedColumns[':p' . $index++]  = '"tanggal_sk_izin_operasional"';
        }
        if ($this->isColumnModified(SekolahPeer::NO_REKENING)) {
            $modifiedColumns[':p' . $index++]  = '"no_rekening"';
        }
        if ($this->isColumnModified(SekolahPeer::NAMA_BANK)) {
            $modifiedColumns[':p' . $index++]  = '"nama_bank"';
        }
        if ($this->isColumnModified(SekolahPeer::CABANG_KCP_UNIT)) {
            $modifiedColumns[':p' . $index++]  = '"cabang_kcp_unit"';
        }
        if ($this->isColumnModified(SekolahPeer::REKENING_ATAS_NAMA)) {
            $modifiedColumns[':p' . $index++]  = '"rekening_atas_nama"';
        }
        if ($this->isColumnModified(SekolahPeer::MBS)) {
            $modifiedColumns[':p' . $index++]  = '"mbs"';
        }
        if ($this->isColumnModified(SekolahPeer::LUAS_TANAH_MILIK)) {
            $modifiedColumns[':p' . $index++]  = '"luas_tanah_milik"';
        }
        if ($this->isColumnModified(SekolahPeer::LUAS_TANAH_BUKAN_MILIK)) {
            $modifiedColumns[':p' . $index++]  = '"luas_tanah_bukan_milik"';
        }
        if ($this->isColumnModified(SekolahPeer::KODE_REGISTRASI)) {
            $modifiedColumns[':p' . $index++]  = '"kode_registrasi"';
        }
        if ($this->isColumnModified(SekolahPeer::NPWP)) {
            $modifiedColumns[':p' . $index++]  = '"npwp"';
        }
        if ($this->isColumnModified(SekolahPeer::NM_WP)) {
            $modifiedColumns[':p' . $index++]  = '"nm_wp"';
        }
        if ($this->isColumnModified(SekolahPeer::KEAKTIFAN)) {
            $modifiedColumns[':p' . $index++]  = '"keaktifan"';
        }
        if ($this->isColumnModified(SekolahPeer::FLAG)) {
            $modifiedColumns[':p' . $index++]  = '"flag"';
        }
        if ($this->isColumnModified(SekolahPeer::CREATE_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"create_date"';
        }
        if ($this->isColumnModified(SekolahPeer::LAST_UPDATE)) {
            $modifiedColumns[':p' . $index++]  = '"last_update"';
        }
        if ($this->isColumnModified(SekolahPeer::SOFT_DELETE)) {
            $modifiedColumns[':p' . $index++]  = '"soft_delete"';
        }
        if ($this->isColumnModified(SekolahPeer::LAST_SYNC)) {
            $modifiedColumns[':p' . $index++]  = '"last_sync"';
        }
        if ($this->isColumnModified(SekolahPeer::UPDATER_ID)) {
            $modifiedColumns[':p' . $index++]  = '"updater_id"';
        }

        $sql = sprintf(
            'INSERT INTO "sekolah" (%s) VALUES (%s)',
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
                    case '"nama"':						
                        $stmt->bindValue($identifier, $this->nama, PDO::PARAM_STR);
                        break;
                    case '"nama_nomenklatur"':						
                        $stmt->bindValue($identifier, $this->nama_nomenklatur, PDO::PARAM_STR);
                        break;
                    case '"nss"':						
                        $stmt->bindValue($identifier, $this->nss, PDO::PARAM_STR);
                        break;
                    case '"npsn"':						
                        $stmt->bindValue($identifier, $this->npsn, PDO::PARAM_STR);
                        break;
                    case '"bentuk_pendidikan_id"':						
                        $stmt->bindValue($identifier, $this->bentuk_pendidikan_id, PDO::PARAM_INT);
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
                    case '"nomor_telepon"':						
                        $stmt->bindValue($identifier, $this->nomor_telepon, PDO::PARAM_STR);
                        break;
                    case '"nomor_fax"':						
                        $stmt->bindValue($identifier, $this->nomor_fax, PDO::PARAM_STR);
                        break;
                    case '"email"':						
                        $stmt->bindValue($identifier, $this->email, PDO::PARAM_STR);
                        break;
                    case '"website"':						
                        $stmt->bindValue($identifier, $this->website, PDO::PARAM_STR);
                        break;
                    case '"kebutuhan_khusus_id"':						
                        $stmt->bindValue($identifier, $this->kebutuhan_khusus_id, PDO::PARAM_INT);
                        break;
                    case '"status_sekolah"':						
                        $stmt->bindValue($identifier, $this->status_sekolah, PDO::PARAM_STR);
                        break;
                    case '"sk_pendirian_sekolah"':						
                        $stmt->bindValue($identifier, $this->sk_pendirian_sekolah, PDO::PARAM_STR);
                        break;
                    case '"tanggal_sk_pendirian"':						
                        $stmt->bindValue($identifier, $this->tanggal_sk_pendirian, PDO::PARAM_STR);
                        break;
                    case '"status_kepemilikan_id"':						
                        $stmt->bindValue($identifier, $this->status_kepemilikan_id, PDO::PARAM_STR);
                        break;
                    case '"yayasan_id"':						
                        $stmt->bindValue($identifier, $this->yayasan_id, PDO::PARAM_STR);
                        break;
                    case '"sk_izin_operasional"':						
                        $stmt->bindValue($identifier, $this->sk_izin_operasional, PDO::PARAM_STR);
                        break;
                    case '"tanggal_sk_izin_operasional"':						
                        $stmt->bindValue($identifier, $this->tanggal_sk_izin_operasional, PDO::PARAM_STR);
                        break;
                    case '"no_rekening"':						
                        $stmt->bindValue($identifier, $this->no_rekening, PDO::PARAM_STR);
                        break;
                    case '"nama_bank"':						
                        $stmt->bindValue($identifier, $this->nama_bank, PDO::PARAM_STR);
                        break;
                    case '"cabang_kcp_unit"':						
                        $stmt->bindValue($identifier, $this->cabang_kcp_unit, PDO::PARAM_STR);
                        break;
                    case '"rekening_atas_nama"':						
                        $stmt->bindValue($identifier, $this->rekening_atas_nama, PDO::PARAM_STR);
                        break;
                    case '"mbs"':						
                        $stmt->bindValue($identifier, $this->mbs, PDO::PARAM_STR);
                        break;
                    case '"luas_tanah_milik"':						
                        $stmt->bindValue($identifier, $this->luas_tanah_milik, PDO::PARAM_STR);
                        break;
                    case '"luas_tanah_bukan_milik"':						
                        $stmt->bindValue($identifier, $this->luas_tanah_bukan_milik, PDO::PARAM_STR);
                        break;
                    case '"kode_registrasi"':						
                        $stmt->bindValue($identifier, $this->kode_registrasi, PDO::PARAM_STR);
                        break;
                    case '"npwp"':						
                        $stmt->bindValue($identifier, $this->npwp, PDO::PARAM_STR);
                        break;
                    case '"nm_wp"':						
                        $stmt->bindValue($identifier, $this->nm_wp, PDO::PARAM_STR);
                        break;
                    case '"keaktifan"':						
                        $stmt->bindValue($identifier, $this->keaktifan, PDO::PARAM_STR);
                        break;
                    case '"flag"':						
                        $stmt->bindValue($identifier, $this->flag, PDO::PARAM_STR);
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

            if ($this->aMstWilayah !== null) {
                if (!$this->aMstWilayah->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aMstWilayah->getValidationFailures());
                }
            }

            if ($this->aKebutuhanKhusus !== null) {
                if (!$this->aKebutuhanKhusus->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aKebutuhanKhusus->getValidationFailures());
                }
            }

            if ($this->aBentukPendidikan !== null) {
                if (!$this->aBentukPendidikan->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aBentukPendidikan->getValidationFailures());
                }
            }

            if ($this->aYayasan !== null) {
                if (!$this->aYayasan->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aYayasan->getValidationFailures());
                }
            }

            if ($this->aStatusKepemilikan !== null) {
                if (!$this->aStatusKepemilikan->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aStatusKepemilikan->getValidationFailures());
                }
            }


            if (($retval = SekolahPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collAkreditasiSps !== null) {
                    foreach ($this->collAkreditasiSps as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collAlats !== null) {
                    foreach ($this->collAlats as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collAnggotaGuguses !== null) {
                    foreach ($this->collAnggotaGuguses as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collAngkutans !== null) {
                    foreach ($this->collAngkutans as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collBangunans !== null) {
                    foreach ($this->collBangunans as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collBlockgrants !== null) {
                    foreach ($this->collBlockgrants as $referrerFK) {
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

                if ($this->collDataDynamics !== null) {
                    foreach ($this->collDataDynamics as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collGugusSekolahs !== null) {
                    foreach ($this->collGugusSekolahs as $referrerFK) {
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

                if ($this->collIzinOperasionals !== null) {
                    foreach ($this->collIzinOperasionals as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collJurusanSps !== null) {
                    foreach ($this->collJurusanSps as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collKepanitiaans !== null) {
                    foreach ($this->collKepanitiaans as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collLayananKhususes !== null) {
                    foreach ($this->collLayananKhususes as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collMous !== null) {
                    foreach ($this->collMous as $referrerFK) {
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

                if ($this->collProgramInklusis !== null) {
                    foreach ($this->collProgramInklusis as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collPtkBarus !== null) {
                    foreach ($this->collPtkBarus as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collPtkTerdaftars !== null) {
                    foreach ($this->collPtkTerdaftars as $referrerFK) {
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

                if ($this->collRombonganBelajars !== null) {
                    foreach ($this->collRombonganBelajars as $referrerFK) {
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

                if ($this->collSanitasis !== null) {
                    foreach ($this->collSanitasis as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collSasaranPengawasans !== null) {
                    foreach ($this->collSasaranPengawasans as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collSekolahLongitudinals !== null) {
                    foreach ($this->collSekolahLongitudinals as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->singleSekolahPaud !== null) {
                    if (!$this->singleSekolahPaud->validate($columns)) {
                        $failureMap = array_merge($failureMap, $this->singleSekolahPaud->getValidationFailures());
                    }
                }

                if ($this->collTanahs !== null) {
                    foreach ($this->collTanahs as $referrerFK) {
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

                if ($this->collUnitUsahas !== null) {
                    foreach ($this->collUnitUsahas as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collVldSekolahs !== null) {
                    foreach ($this->collVldSekolahs as $referrerFK) {
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
        $pos = SekolahPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getNama();
                break;
            case 2:
                return $this->getNamaNomenklatur();
                break;
            case 3:
                return $this->getNss();
                break;
            case 4:
                return $this->getNpsn();
                break;
            case 5:
                return $this->getBentukPendidikanId();
                break;
            case 6:
                return $this->getAlamatJalan();
                break;
            case 7:
                return $this->getRt();
                break;
            case 8:
                return $this->getRw();
                break;
            case 9:
                return $this->getNamaDusun();
                break;
            case 10:
                return $this->getDesaKelurahan();
                break;
            case 11:
                return $this->getKodeWilayah();
                break;
            case 12:
                return $this->getKodePos();
                break;
            case 13:
                return $this->getLintang();
                break;
            case 14:
                return $this->getBujur();
                break;
            case 15:
                return $this->getNomorTelepon();
                break;
            case 16:
                return $this->getNomorFax();
                break;
            case 17:
                return $this->getEmail();
                break;
            case 18:
                return $this->getWebsite();
                break;
            case 19:
                return $this->getKebutuhanKhususId();
                break;
            case 20:
                return $this->getStatusSekolah();
                break;
            case 21:
                return $this->getSkPendirianSekolah();
                break;
            case 22:
                return $this->getTanggalSkPendirian();
                break;
            case 23:
                return $this->getStatusKepemilikanId();
                break;
            case 24:
                return $this->getYayasanId();
                break;
            case 25:
                return $this->getSkIzinOperasional();
                break;
            case 26:
                return $this->getTanggalSkIzinOperasional();
                break;
            case 27:
                return $this->getNoRekening();
                break;
            case 28:
                return $this->getNamaBank();
                break;
            case 29:
                return $this->getCabangKcpUnit();
                break;
            case 30:
                return $this->getRekeningAtasNama();
                break;
            case 31:
                return $this->getMbs();
                break;
            case 32:
                return $this->getLuasTanahMilik();
                break;
            case 33:
                return $this->getLuasTanahBukanMilik();
                break;
            case 34:
                return $this->getKodeRegistrasi();
                break;
            case 35:
                return $this->getNpwp();
                break;
            case 36:
                return $this->getNmWp();
                break;
            case 37:
                return $this->getKeaktifan();
                break;
            case 38:
                return $this->getFlag();
                break;
            case 39:
                return $this->getCreateDate();
                break;
            case 40:
                return $this->getLastUpdate();
                break;
            case 41:
                return $this->getSoftDelete();
                break;
            case 42:
                return $this->getLastSync();
                break;
            case 43:
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
        if (isset($alreadyDumpedObjects['Sekolah'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Sekolah'][$this->getPrimaryKey()] = true;
        $keys = SekolahPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getSekolahId(),
            $keys[1] => $this->getNama(),
            $keys[2] => $this->getNamaNomenklatur(),
            $keys[3] => $this->getNss(),
            $keys[4] => $this->getNpsn(),
            $keys[5] => $this->getBentukPendidikanId(),
            $keys[6] => $this->getAlamatJalan(),
            $keys[7] => $this->getRt(),
            $keys[8] => $this->getRw(),
            $keys[9] => $this->getNamaDusun(),
            $keys[10] => $this->getDesaKelurahan(),
            $keys[11] => $this->getKodeWilayah(),
            $keys[12] => $this->getKodePos(),
            $keys[13] => $this->getLintang(),
            $keys[14] => $this->getBujur(),
            $keys[15] => $this->getNomorTelepon(),
            $keys[16] => $this->getNomorFax(),
            $keys[17] => $this->getEmail(),
            $keys[18] => $this->getWebsite(),
            $keys[19] => $this->getKebutuhanKhususId(),
            $keys[20] => $this->getStatusSekolah(),
            $keys[21] => $this->getSkPendirianSekolah(),
            $keys[22] => $this->getTanggalSkPendirian(),
            $keys[23] => $this->getStatusKepemilikanId(),
            $keys[24] => $this->getYayasanId(),
            $keys[25] => $this->getSkIzinOperasional(),
            $keys[26] => $this->getTanggalSkIzinOperasional(),
            $keys[27] => $this->getNoRekening(),
            $keys[28] => $this->getNamaBank(),
            $keys[29] => $this->getCabangKcpUnit(),
            $keys[30] => $this->getRekeningAtasNama(),
            $keys[31] => $this->getMbs(),
            $keys[32] => $this->getLuasTanahMilik(),
            $keys[33] => $this->getLuasTanahBukanMilik(),
            $keys[34] => $this->getKodeRegistrasi(),
            $keys[35] => $this->getNpwp(),
            $keys[36] => $this->getNmWp(),
            $keys[37] => $this->getKeaktifan(),
            $keys[38] => $this->getFlag(),
            $keys[39] => $this->getCreateDate(),
            $keys[40] => $this->getLastUpdate(),
            $keys[41] => $this->getSoftDelete(),
            $keys[42] => $this->getLastSync(),
            $keys[43] => $this->getUpdaterId(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aMstWilayah) {
                $result['MstWilayah'] = $this->aMstWilayah->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aKebutuhanKhusus) {
                $result['KebutuhanKhusus'] = $this->aKebutuhanKhusus->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aBentukPendidikan) {
                $result['BentukPendidikan'] = $this->aBentukPendidikan->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aYayasan) {
                $result['Yayasan'] = $this->aYayasan->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aStatusKepemilikan) {
                $result['StatusKepemilikan'] = $this->aStatusKepemilikan->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collAkreditasiSps) {
                $result['AkreditasiSps'] = $this->collAkreditasiSps->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collAlats) {
                $result['Alats'] = $this->collAlats->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collAnggotaGuguses) {
                $result['AnggotaGuguses'] = $this->collAnggotaGuguses->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collAngkutans) {
                $result['Angkutans'] = $this->collAngkutans->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collBangunans) {
                $result['Bangunans'] = $this->collBangunans->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collBlockgrants) {
                $result['Blockgrants'] = $this->collBlockgrants->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collBukus) {
                $result['Bukus'] = $this->collBukus->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collDataDynamics) {
                $result['DataDynamics'] = $this->collDataDynamics->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collGugusSekolahs) {
                $result['GugusSekolahs'] = $this->collGugusSekolahs->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collInstalasis) {
                $result['Instalasis'] = $this->collInstalasis->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collIzinOperasionals) {
                $result['IzinOperasionals'] = $this->collIzinOperasionals->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collJurusanSps) {
                $result['JurusanSps'] = $this->collJurusanSps->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collKepanitiaans) {
                $result['Kepanitiaans'] = $this->collKepanitiaans->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collLayananKhususes) {
                $result['LayananKhususes'] = $this->collLayananKhususes->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collMous) {
                $result['Mous'] = $this->collMous->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collPesertaDidikBarus) {
                $result['PesertaDidikBarus'] = $this->collPesertaDidikBarus->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collProgramInklusis) {
                $result['ProgramInklusis'] = $this->collProgramInklusis->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collPtkBarus) {
                $result['PtkBarus'] = $this->collPtkBarus->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collPtkTerdaftars) {
                $result['PtkTerdaftars'] = $this->collPtkTerdaftars->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collRegistrasiPesertaDidiks) {
                $result['RegistrasiPesertaDidiks'] = $this->collRegistrasiPesertaDidiks->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collRombonganBelajars) {
                $result['RombonganBelajars'] = $this->collRombonganBelajars->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collRuangs) {
                $result['Ruangs'] = $this->collRuangs->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collSanitasis) {
                $result['Sanitasis'] = $this->collSanitasis->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collSasaranPengawasans) {
                $result['SasaranPengawasans'] = $this->collSasaranPengawasans->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collSekolahLongitudinals) {
                $result['SekolahLongitudinals'] = $this->collSekolahLongitudinals->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->singleSekolahPaud) {
                $result['SekolahPaud'] = $this->singleSekolahPaud->toArray($keyType, $includeLazyLoadColumns, $alreadyDumpedObjects, true);
            }
            if (null !== $this->collTanahs) {
                $result['Tanahs'] = $this->collTanahs->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collTugasTambahans) {
                $result['TugasTambahans'] = $this->collTugasTambahans->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collUnitUsahas) {
                $result['UnitUsahas'] = $this->collUnitUsahas->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collVldSekolahs) {
                $result['VldSekolahs'] = $this->collVldSekolahs->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = SekolahPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setNama($value);
                break;
            case 2:
                $this->setNamaNomenklatur($value);
                break;
            case 3:
                $this->setNss($value);
                break;
            case 4:
                $this->setNpsn($value);
                break;
            case 5:
                $this->setBentukPendidikanId($value);
                break;
            case 6:
                $this->setAlamatJalan($value);
                break;
            case 7:
                $this->setRt($value);
                break;
            case 8:
                $this->setRw($value);
                break;
            case 9:
                $this->setNamaDusun($value);
                break;
            case 10:
                $this->setDesaKelurahan($value);
                break;
            case 11:
                $this->setKodeWilayah($value);
                break;
            case 12:
                $this->setKodePos($value);
                break;
            case 13:
                $this->setLintang($value);
                break;
            case 14:
                $this->setBujur($value);
                break;
            case 15:
                $this->setNomorTelepon($value);
                break;
            case 16:
                $this->setNomorFax($value);
                break;
            case 17:
                $this->setEmail($value);
                break;
            case 18:
                $this->setWebsite($value);
                break;
            case 19:
                $this->setKebutuhanKhususId($value);
                break;
            case 20:
                $this->setStatusSekolah($value);
                break;
            case 21:
                $this->setSkPendirianSekolah($value);
                break;
            case 22:
                $this->setTanggalSkPendirian($value);
                break;
            case 23:
                $this->setStatusKepemilikanId($value);
                break;
            case 24:
                $this->setYayasanId($value);
                break;
            case 25:
                $this->setSkIzinOperasional($value);
                break;
            case 26:
                $this->setTanggalSkIzinOperasional($value);
                break;
            case 27:
                $this->setNoRekening($value);
                break;
            case 28:
                $this->setNamaBank($value);
                break;
            case 29:
                $this->setCabangKcpUnit($value);
                break;
            case 30:
                $this->setRekeningAtasNama($value);
                break;
            case 31:
                $this->setMbs($value);
                break;
            case 32:
                $this->setLuasTanahMilik($value);
                break;
            case 33:
                $this->setLuasTanahBukanMilik($value);
                break;
            case 34:
                $this->setKodeRegistrasi($value);
                break;
            case 35:
                $this->setNpwp($value);
                break;
            case 36:
                $this->setNmWp($value);
                break;
            case 37:
                $this->setKeaktifan($value);
                break;
            case 38:
                $this->setFlag($value);
                break;
            case 39:
                $this->setCreateDate($value);
                break;
            case 40:
                $this->setLastUpdate($value);
                break;
            case 41:
                $this->setSoftDelete($value);
                break;
            case 42:
                $this->setLastSync($value);
                break;
            case 43:
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
        $keys = SekolahPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setSekolahId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setNama($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setNamaNomenklatur($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setNss($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setNpsn($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setBentukPendidikanId($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setAlamatJalan($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setRt($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setRw($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setNamaDusun($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setDesaKelurahan($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setKodeWilayah($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setKodePos($arr[$keys[12]]);
        if (array_key_exists($keys[13], $arr)) $this->setLintang($arr[$keys[13]]);
        if (array_key_exists($keys[14], $arr)) $this->setBujur($arr[$keys[14]]);
        if (array_key_exists($keys[15], $arr)) $this->setNomorTelepon($arr[$keys[15]]);
        if (array_key_exists($keys[16], $arr)) $this->setNomorFax($arr[$keys[16]]);
        if (array_key_exists($keys[17], $arr)) $this->setEmail($arr[$keys[17]]);
        if (array_key_exists($keys[18], $arr)) $this->setWebsite($arr[$keys[18]]);
        if (array_key_exists($keys[19], $arr)) $this->setKebutuhanKhususId($arr[$keys[19]]);
        if (array_key_exists($keys[20], $arr)) $this->setStatusSekolah($arr[$keys[20]]);
        if (array_key_exists($keys[21], $arr)) $this->setSkPendirianSekolah($arr[$keys[21]]);
        if (array_key_exists($keys[22], $arr)) $this->setTanggalSkPendirian($arr[$keys[22]]);
        if (array_key_exists($keys[23], $arr)) $this->setStatusKepemilikanId($arr[$keys[23]]);
        if (array_key_exists($keys[24], $arr)) $this->setYayasanId($arr[$keys[24]]);
        if (array_key_exists($keys[25], $arr)) $this->setSkIzinOperasional($arr[$keys[25]]);
        if (array_key_exists($keys[26], $arr)) $this->setTanggalSkIzinOperasional($arr[$keys[26]]);
        if (array_key_exists($keys[27], $arr)) $this->setNoRekening($arr[$keys[27]]);
        if (array_key_exists($keys[28], $arr)) $this->setNamaBank($arr[$keys[28]]);
        if (array_key_exists($keys[29], $arr)) $this->setCabangKcpUnit($arr[$keys[29]]);
        if (array_key_exists($keys[30], $arr)) $this->setRekeningAtasNama($arr[$keys[30]]);
        if (array_key_exists($keys[31], $arr)) $this->setMbs($arr[$keys[31]]);
        if (array_key_exists($keys[32], $arr)) $this->setLuasTanahMilik($arr[$keys[32]]);
        if (array_key_exists($keys[33], $arr)) $this->setLuasTanahBukanMilik($arr[$keys[33]]);
        if (array_key_exists($keys[34], $arr)) $this->setKodeRegistrasi($arr[$keys[34]]);
        if (array_key_exists($keys[35], $arr)) $this->setNpwp($arr[$keys[35]]);
        if (array_key_exists($keys[36], $arr)) $this->setNmWp($arr[$keys[36]]);
        if (array_key_exists($keys[37], $arr)) $this->setKeaktifan($arr[$keys[37]]);
        if (array_key_exists($keys[38], $arr)) $this->setFlag($arr[$keys[38]]);
        if (array_key_exists($keys[39], $arr)) $this->setCreateDate($arr[$keys[39]]);
        if (array_key_exists($keys[40], $arr)) $this->setLastUpdate($arr[$keys[40]]);
        if (array_key_exists($keys[41], $arr)) $this->setSoftDelete($arr[$keys[41]]);
        if (array_key_exists($keys[42], $arr)) $this->setLastSync($arr[$keys[42]]);
        if (array_key_exists($keys[43], $arr)) $this->setUpdaterId($arr[$keys[43]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(SekolahPeer::DATABASE_NAME);

        if ($this->isColumnModified(SekolahPeer::SEKOLAH_ID)) $criteria->add(SekolahPeer::SEKOLAH_ID, $this->sekolah_id);
        if ($this->isColumnModified(SekolahPeer::NAMA)) $criteria->add(SekolahPeer::NAMA, $this->nama);
        if ($this->isColumnModified(SekolahPeer::NAMA_NOMENKLATUR)) $criteria->add(SekolahPeer::NAMA_NOMENKLATUR, $this->nama_nomenklatur);
        if ($this->isColumnModified(SekolahPeer::NSS)) $criteria->add(SekolahPeer::NSS, $this->nss);
        if ($this->isColumnModified(SekolahPeer::NPSN)) $criteria->add(SekolahPeer::NPSN, $this->npsn);
        if ($this->isColumnModified(SekolahPeer::BENTUK_PENDIDIKAN_ID)) $criteria->add(SekolahPeer::BENTUK_PENDIDIKAN_ID, $this->bentuk_pendidikan_id);
        if ($this->isColumnModified(SekolahPeer::ALAMAT_JALAN)) $criteria->add(SekolahPeer::ALAMAT_JALAN, $this->alamat_jalan);
        if ($this->isColumnModified(SekolahPeer::RT)) $criteria->add(SekolahPeer::RT, $this->rt);
        if ($this->isColumnModified(SekolahPeer::RW)) $criteria->add(SekolahPeer::RW, $this->rw);
        if ($this->isColumnModified(SekolahPeer::NAMA_DUSUN)) $criteria->add(SekolahPeer::NAMA_DUSUN, $this->nama_dusun);
        if ($this->isColumnModified(SekolahPeer::DESA_KELURAHAN)) $criteria->add(SekolahPeer::DESA_KELURAHAN, $this->desa_kelurahan);
        if ($this->isColumnModified(SekolahPeer::KODE_WILAYAH)) $criteria->add(SekolahPeer::KODE_WILAYAH, $this->kode_wilayah);
        if ($this->isColumnModified(SekolahPeer::KODE_POS)) $criteria->add(SekolahPeer::KODE_POS, $this->kode_pos);
        if ($this->isColumnModified(SekolahPeer::LINTANG)) $criteria->add(SekolahPeer::LINTANG, $this->lintang);
        if ($this->isColumnModified(SekolahPeer::BUJUR)) $criteria->add(SekolahPeer::BUJUR, $this->bujur);
        if ($this->isColumnModified(SekolahPeer::NOMOR_TELEPON)) $criteria->add(SekolahPeer::NOMOR_TELEPON, $this->nomor_telepon);
        if ($this->isColumnModified(SekolahPeer::NOMOR_FAX)) $criteria->add(SekolahPeer::NOMOR_FAX, $this->nomor_fax);
        if ($this->isColumnModified(SekolahPeer::EMAIL)) $criteria->add(SekolahPeer::EMAIL, $this->email);
        if ($this->isColumnModified(SekolahPeer::WEBSITE)) $criteria->add(SekolahPeer::WEBSITE, $this->website);
        if ($this->isColumnModified(SekolahPeer::KEBUTUHAN_KHUSUS_ID)) $criteria->add(SekolahPeer::KEBUTUHAN_KHUSUS_ID, $this->kebutuhan_khusus_id);
        if ($this->isColumnModified(SekolahPeer::STATUS_SEKOLAH)) $criteria->add(SekolahPeer::STATUS_SEKOLAH, $this->status_sekolah);
        if ($this->isColumnModified(SekolahPeer::SK_PENDIRIAN_SEKOLAH)) $criteria->add(SekolahPeer::SK_PENDIRIAN_SEKOLAH, $this->sk_pendirian_sekolah);
        if ($this->isColumnModified(SekolahPeer::TANGGAL_SK_PENDIRIAN)) $criteria->add(SekolahPeer::TANGGAL_SK_PENDIRIAN, $this->tanggal_sk_pendirian);
        if ($this->isColumnModified(SekolahPeer::STATUS_KEPEMILIKAN_ID)) $criteria->add(SekolahPeer::STATUS_KEPEMILIKAN_ID, $this->status_kepemilikan_id);
        if ($this->isColumnModified(SekolahPeer::YAYASAN_ID)) $criteria->add(SekolahPeer::YAYASAN_ID, $this->yayasan_id);
        if ($this->isColumnModified(SekolahPeer::SK_IZIN_OPERASIONAL)) $criteria->add(SekolahPeer::SK_IZIN_OPERASIONAL, $this->sk_izin_operasional);
        if ($this->isColumnModified(SekolahPeer::TANGGAL_SK_IZIN_OPERASIONAL)) $criteria->add(SekolahPeer::TANGGAL_SK_IZIN_OPERASIONAL, $this->tanggal_sk_izin_operasional);
        if ($this->isColumnModified(SekolahPeer::NO_REKENING)) $criteria->add(SekolahPeer::NO_REKENING, $this->no_rekening);
        if ($this->isColumnModified(SekolahPeer::NAMA_BANK)) $criteria->add(SekolahPeer::NAMA_BANK, $this->nama_bank);
        if ($this->isColumnModified(SekolahPeer::CABANG_KCP_UNIT)) $criteria->add(SekolahPeer::CABANG_KCP_UNIT, $this->cabang_kcp_unit);
        if ($this->isColumnModified(SekolahPeer::REKENING_ATAS_NAMA)) $criteria->add(SekolahPeer::REKENING_ATAS_NAMA, $this->rekening_atas_nama);
        if ($this->isColumnModified(SekolahPeer::MBS)) $criteria->add(SekolahPeer::MBS, $this->mbs);
        if ($this->isColumnModified(SekolahPeer::LUAS_TANAH_MILIK)) $criteria->add(SekolahPeer::LUAS_TANAH_MILIK, $this->luas_tanah_milik);
        if ($this->isColumnModified(SekolahPeer::LUAS_TANAH_BUKAN_MILIK)) $criteria->add(SekolahPeer::LUAS_TANAH_BUKAN_MILIK, $this->luas_tanah_bukan_milik);
        if ($this->isColumnModified(SekolahPeer::KODE_REGISTRASI)) $criteria->add(SekolahPeer::KODE_REGISTRASI, $this->kode_registrasi);
        if ($this->isColumnModified(SekolahPeer::NPWP)) $criteria->add(SekolahPeer::NPWP, $this->npwp);
        if ($this->isColumnModified(SekolahPeer::NM_WP)) $criteria->add(SekolahPeer::NM_WP, $this->nm_wp);
        if ($this->isColumnModified(SekolahPeer::KEAKTIFAN)) $criteria->add(SekolahPeer::KEAKTIFAN, $this->keaktifan);
        if ($this->isColumnModified(SekolahPeer::FLAG)) $criteria->add(SekolahPeer::FLAG, $this->flag);
        if ($this->isColumnModified(SekolahPeer::CREATE_DATE)) $criteria->add(SekolahPeer::CREATE_DATE, $this->create_date);
        if ($this->isColumnModified(SekolahPeer::LAST_UPDATE)) $criteria->add(SekolahPeer::LAST_UPDATE, $this->last_update);
        if ($this->isColumnModified(SekolahPeer::SOFT_DELETE)) $criteria->add(SekolahPeer::SOFT_DELETE, $this->soft_delete);
        if ($this->isColumnModified(SekolahPeer::LAST_SYNC)) $criteria->add(SekolahPeer::LAST_SYNC, $this->last_sync);
        if ($this->isColumnModified(SekolahPeer::UPDATER_ID)) $criteria->add(SekolahPeer::UPDATER_ID, $this->updater_id);

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
        $criteria = new Criteria(SekolahPeer::DATABASE_NAME);
        $criteria->add(SekolahPeer::SEKOLAH_ID, $this->sekolah_id);

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
     * @param object $copyObj An object of Sekolah (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setNama($this->getNama());
        $copyObj->setNamaNomenklatur($this->getNamaNomenklatur());
        $copyObj->setNss($this->getNss());
        $copyObj->setNpsn($this->getNpsn());
        $copyObj->setBentukPendidikanId($this->getBentukPendidikanId());
        $copyObj->setAlamatJalan($this->getAlamatJalan());
        $copyObj->setRt($this->getRt());
        $copyObj->setRw($this->getRw());
        $copyObj->setNamaDusun($this->getNamaDusun());
        $copyObj->setDesaKelurahan($this->getDesaKelurahan());
        $copyObj->setKodeWilayah($this->getKodeWilayah());
        $copyObj->setKodePos($this->getKodePos());
        $copyObj->setLintang($this->getLintang());
        $copyObj->setBujur($this->getBujur());
        $copyObj->setNomorTelepon($this->getNomorTelepon());
        $copyObj->setNomorFax($this->getNomorFax());
        $copyObj->setEmail($this->getEmail());
        $copyObj->setWebsite($this->getWebsite());
        $copyObj->setKebutuhanKhususId($this->getKebutuhanKhususId());
        $copyObj->setStatusSekolah($this->getStatusSekolah());
        $copyObj->setSkPendirianSekolah($this->getSkPendirianSekolah());
        $copyObj->setTanggalSkPendirian($this->getTanggalSkPendirian());
        $copyObj->setStatusKepemilikanId($this->getStatusKepemilikanId());
        $copyObj->setYayasanId($this->getYayasanId());
        $copyObj->setSkIzinOperasional($this->getSkIzinOperasional());
        $copyObj->setTanggalSkIzinOperasional($this->getTanggalSkIzinOperasional());
        $copyObj->setNoRekening($this->getNoRekening());
        $copyObj->setNamaBank($this->getNamaBank());
        $copyObj->setCabangKcpUnit($this->getCabangKcpUnit());
        $copyObj->setRekeningAtasNama($this->getRekeningAtasNama());
        $copyObj->setMbs($this->getMbs());
        $copyObj->setLuasTanahMilik($this->getLuasTanahMilik());
        $copyObj->setLuasTanahBukanMilik($this->getLuasTanahBukanMilik());
        $copyObj->setKodeRegistrasi($this->getKodeRegistrasi());
        $copyObj->setNpwp($this->getNpwp());
        $copyObj->setNmWp($this->getNmWp());
        $copyObj->setKeaktifan($this->getKeaktifan());
        $copyObj->setFlag($this->getFlag());
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

            foreach ($this->getAkreditasiSps() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addAkreditasiSp($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getAlats() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addAlat($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getAnggotaGuguses() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addAnggotaGugus($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getAngkutans() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addAngkutan($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getBangunans() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addBangunan($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getBlockgrants() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addBlockgrant($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getBukus() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addBuku($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getDataDynamics() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addDataDynamic($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getGugusSekolahs() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addGugusSekolah($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getInstalasis() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addInstalasi($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getIzinOperasionals() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addIzinOperasional($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getJurusanSps() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addJurusanSp($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getKepanitiaans() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addKepanitiaan($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getLayananKhususes() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addLayananKhusus($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getMous() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addMou($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getPesertaDidikBarus() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPesertaDidikBaru($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getProgramInklusis() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addProgramInklusi($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getPtkBarus() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPtkBaru($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getPtkTerdaftars() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPtkTerdaftar($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getRegistrasiPesertaDidiks() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addRegistrasiPesertaDidik($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getRombonganBelajars() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addRombonganBelajar($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getRuangs() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addRuang($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getSanitasis() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSanitasi($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getSasaranPengawasans() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSasaranPengawasan($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getSekolahLongitudinals() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSekolahLongitudinal($relObj->copy($deepCopy));
                }
            }

            $relObj = $this->getSekolahPaud();
            if ($relObj) {
                $copyObj->setSekolahPaud($relObj->copy($deepCopy));
            }

            foreach ($this->getTanahs() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addTanah($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getTugasTambahans() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addTugasTambahan($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getUnitUsahas() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addUnitUsaha($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getVldSekolahs() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addVldSekolah($relObj->copy($deepCopy));
                }
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
     * @return Sekolah Clone of current object.
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
     * @return SekolahPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new SekolahPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a MstWilayah object.
     *
     * @param             MstWilayah $v
     * @return Sekolah The current object (for fluent API support)
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
            $v->addSekolah($this);
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
                $this->aMstWilayah->addSekolahs($this);
             */
        }

        return $this->aMstWilayah;
    }

    /**
     * Declares an association between this object and a KebutuhanKhusus object.
     *
     * @param             KebutuhanKhusus $v
     * @return Sekolah The current object (for fluent API support)
     * @throws PropelException
     */
    public function setKebutuhanKhusus(KebutuhanKhusus $v = null)
    {
        if ($v === null) {
            $this->setKebutuhanKhususId(NULL);
        } else {
            $this->setKebutuhanKhususId($v->getKebutuhanKhususId());
        }

        $this->aKebutuhanKhusus = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the KebutuhanKhusus object, it will not be re-added.
        if ($v !== null) {
            $v->addSekolah($this);
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
    public function getKebutuhanKhusus(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aKebutuhanKhusus === null && ($this->kebutuhan_khusus_id !== null) && $doQuery) {
            $this->aKebutuhanKhusus = KebutuhanKhususQuery::create()->findPk($this->kebutuhan_khusus_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aKebutuhanKhusus->addSekolahs($this);
             */
        }

        return $this->aKebutuhanKhusus;
    }

    /**
     * Declares an association between this object and a BentukPendidikan object.
     *
     * @param             BentukPendidikan $v
     * @return Sekolah The current object (for fluent API support)
     * @throws PropelException
     */
    public function setBentukPendidikan(BentukPendidikan $v = null)
    {
        if ($v === null) {
            $this->setBentukPendidikanId(NULL);
        } else {
            $this->setBentukPendidikanId($v->getBentukPendidikanId());
        }

        $this->aBentukPendidikan = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the BentukPendidikan object, it will not be re-added.
        if ($v !== null) {
            $v->addSekolah($this);
        }


        return $this;
    }


    /**
     * Get the associated BentukPendidikan object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return BentukPendidikan The associated BentukPendidikan object.
     * @throws PropelException
     */
    public function getBentukPendidikan(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aBentukPendidikan === null && ($this->bentuk_pendidikan_id !== null) && $doQuery) {
            $this->aBentukPendidikan = BentukPendidikanQuery::create()->findPk($this->bentuk_pendidikan_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aBentukPendidikan->addSekolahs($this);
             */
        }

        return $this->aBentukPendidikan;
    }

    /**
     * Declares an association between this object and a Yayasan object.
     *
     * @param             Yayasan $v
     * @return Sekolah The current object (for fluent API support)
     * @throws PropelException
     */
    public function setYayasan(Yayasan $v = null)
    {
        if ($v === null) {
            $this->setYayasanId(NULL);
        } else {
            $this->setYayasanId($v->getYayasanId());
        }

        $this->aYayasan = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Yayasan object, it will not be re-added.
        if ($v !== null) {
            $v->addSekolah($this);
        }


        return $this;
    }


    /**
     * Get the associated Yayasan object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Yayasan The associated Yayasan object.
     * @throws PropelException
     */
    public function getYayasan(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aYayasan === null && (($this->yayasan_id !== "" && $this->yayasan_id !== null)) && $doQuery) {
            $this->aYayasan = YayasanQuery::create()->findPk($this->yayasan_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aYayasan->addSekolahs($this);
             */
        }

        return $this->aYayasan;
    }

    /**
     * Declares an association between this object and a StatusKepemilikan object.
     *
     * @param             StatusKepemilikan $v
     * @return Sekolah The current object (for fluent API support)
     * @throws PropelException
     */
    public function setStatusKepemilikan(StatusKepemilikan $v = null)
    {
        if ($v === null) {
            $this->setStatusKepemilikanId(NULL);
        } else {
            $this->setStatusKepemilikanId($v->getStatusKepemilikanId());
        }

        $this->aStatusKepemilikan = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the StatusKepemilikan object, it will not be re-added.
        if ($v !== null) {
            $v->addSekolah($this);
        }


        return $this;
    }


    /**
     * Get the associated StatusKepemilikan object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return StatusKepemilikan The associated StatusKepemilikan object.
     * @throws PropelException
     */
    public function getStatusKepemilikan(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aStatusKepemilikan === null && (($this->status_kepemilikan_id !== "" && $this->status_kepemilikan_id !== null)) && $doQuery) {
            $this->aStatusKepemilikan = StatusKepemilikanQuery::create()->findPk($this->status_kepemilikan_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aStatusKepemilikan->addSekolahs($this);
             */
        }

        return $this->aStatusKepemilikan;
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
        if ('AkreditasiSp' == $relationName) {
            $this->initAkreditasiSps();
        }
        if ('Alat' == $relationName) {
            $this->initAlats();
        }
        if ('AnggotaGugus' == $relationName) {
            $this->initAnggotaGuguses();
        }
        if ('Angkutan' == $relationName) {
            $this->initAngkutans();
        }
        if ('Bangunan' == $relationName) {
            $this->initBangunans();
        }
        if ('Blockgrant' == $relationName) {
            $this->initBlockgrants();
        }
        if ('Buku' == $relationName) {
            $this->initBukus();
        }
        if ('DataDynamic' == $relationName) {
            $this->initDataDynamics();
        }
        if ('GugusSekolah' == $relationName) {
            $this->initGugusSekolahs();
        }
        if ('Instalasi' == $relationName) {
            $this->initInstalasis();
        }
        if ('IzinOperasional' == $relationName) {
            $this->initIzinOperasionals();
        }
        if ('JurusanSp' == $relationName) {
            $this->initJurusanSps();
        }
        if ('Kepanitiaan' == $relationName) {
            $this->initKepanitiaans();
        }
        if ('LayananKhusus' == $relationName) {
            $this->initLayananKhususes();
        }
        if ('Mou' == $relationName) {
            $this->initMous();
        }
        if ('PesertaDidikBaru' == $relationName) {
            $this->initPesertaDidikBarus();
        }
        if ('ProgramInklusi' == $relationName) {
            $this->initProgramInklusis();
        }
        if ('PtkBaru' == $relationName) {
            $this->initPtkBarus();
        }
        if ('PtkTerdaftar' == $relationName) {
            $this->initPtkTerdaftars();
        }
        if ('RegistrasiPesertaDidik' == $relationName) {
            $this->initRegistrasiPesertaDidiks();
        }
        if ('RombonganBelajar' == $relationName) {
            $this->initRombonganBelajars();
        }
        if ('Ruang' == $relationName) {
            $this->initRuangs();
        }
        if ('Sanitasi' == $relationName) {
            $this->initSanitasis();
        }
        if ('SasaranPengawasan' == $relationName) {
            $this->initSasaranPengawasans();
        }
        if ('SekolahLongitudinal' == $relationName) {
            $this->initSekolahLongitudinals();
        }
        if ('Tanah' == $relationName) {
            $this->initTanahs();
        }
        if ('TugasTambahan' == $relationName) {
            $this->initTugasTambahans();
        }
        if ('UnitUsaha' == $relationName) {
            $this->initUnitUsahas();
        }
        if ('VldSekolah' == $relationName) {
            $this->initVldSekolahs();
        }
    }

    /**
     * Clears out the collAkreditasiSps collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Sekolah The current object (for fluent API support)
     * @see        addAkreditasiSps()
     */
    public function clearAkreditasiSps()
    {
        $this->collAkreditasiSps = null; // important to set this to null since that means it is uninitialized
        $this->collAkreditasiSpsPartial = null;

        return $this;
    }

    /**
     * reset is the collAkreditasiSps collection loaded partially
     *
     * @return void
     */
    public function resetPartialAkreditasiSps($v = true)
    {
        $this->collAkreditasiSpsPartial = $v;
    }

    /**
     * Initializes the collAkreditasiSps collection.
     *
     * By default this just sets the collAkreditasiSps collection to an empty array (like clearcollAkreditasiSps());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initAkreditasiSps($overrideExisting = true)
    {
        if (null !== $this->collAkreditasiSps && !$overrideExisting) {
            return;
        }
        $this->collAkreditasiSps = new PropelObjectCollection();
        $this->collAkreditasiSps->setModel('AkreditasiSp');
    }

    /**
     * Gets an array of AkreditasiSp objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Sekolah is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|AkreditasiSp[] List of AkreditasiSp objects
     * @throws PropelException
     */
    public function getAkreditasiSps($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collAkreditasiSpsPartial && !$this->isNew();
        if (null === $this->collAkreditasiSps || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collAkreditasiSps) {
                // return empty collection
                $this->initAkreditasiSps();
            } else {
                $collAkreditasiSps = AkreditasiSpQuery::create(null, $criteria)
                    ->filterBySekolah($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collAkreditasiSpsPartial && count($collAkreditasiSps)) {
                      $this->initAkreditasiSps(false);

                      foreach($collAkreditasiSps as $obj) {
                        if (false == $this->collAkreditasiSps->contains($obj)) {
                          $this->collAkreditasiSps->append($obj);
                        }
                      }

                      $this->collAkreditasiSpsPartial = true;
                    }

                    $collAkreditasiSps->getInternalIterator()->rewind();
                    return $collAkreditasiSps;
                }

                if($partial && $this->collAkreditasiSps) {
                    foreach($this->collAkreditasiSps as $obj) {
                        if($obj->isNew()) {
                            $collAkreditasiSps[] = $obj;
                        }
                    }
                }

                $this->collAkreditasiSps = $collAkreditasiSps;
                $this->collAkreditasiSpsPartial = false;
            }
        }

        return $this->collAkreditasiSps;
    }

    /**
     * Sets a collection of AkreditasiSp objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $akreditasiSps A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Sekolah The current object (for fluent API support)
     */
    public function setAkreditasiSps(PropelCollection $akreditasiSps, PropelPDO $con = null)
    {
        $akreditasiSpsToDelete = $this->getAkreditasiSps(new Criteria(), $con)->diff($akreditasiSps);

        $this->akreditasiSpsScheduledForDeletion = unserialize(serialize($akreditasiSpsToDelete));

        foreach ($akreditasiSpsToDelete as $akreditasiSpRemoved) {
            $akreditasiSpRemoved->setSekolah(null);
        }

        $this->collAkreditasiSps = null;
        foreach ($akreditasiSps as $akreditasiSp) {
            $this->addAkreditasiSp($akreditasiSp);
        }

        $this->collAkreditasiSps = $akreditasiSps;
        $this->collAkreditasiSpsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related AkreditasiSp objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related AkreditasiSp objects.
     * @throws PropelException
     */
    public function countAkreditasiSps(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collAkreditasiSpsPartial && !$this->isNew();
        if (null === $this->collAkreditasiSps || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collAkreditasiSps) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getAkreditasiSps());
            }
            $query = AkreditasiSpQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterBySekolah($this)
                ->count($con);
        }

        return count($this->collAkreditasiSps);
    }

    /**
     * Method called to associate a AkreditasiSp object to this object
     * through the AkreditasiSp foreign key attribute.
     *
     * @param    AkreditasiSp $l AkreditasiSp
     * @return Sekolah The current object (for fluent API support)
     */
    public function addAkreditasiSp(AkreditasiSp $l)
    {
        if ($this->collAkreditasiSps === null) {
            $this->initAkreditasiSps();
            $this->collAkreditasiSpsPartial = true;
        }
        if (!in_array($l, $this->collAkreditasiSps->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddAkreditasiSp($l);
        }

        return $this;
    }

    /**
     * @param	AkreditasiSp $akreditasiSp The akreditasiSp object to add.
     */
    protected function doAddAkreditasiSp($akreditasiSp)
    {
        $this->collAkreditasiSps[]= $akreditasiSp;
        $akreditasiSp->setSekolah($this);
    }

    /**
     * @param	AkreditasiSp $akreditasiSp The akreditasiSp object to remove.
     * @return Sekolah The current object (for fluent API support)
     */
    public function removeAkreditasiSp($akreditasiSp)
    {
        if ($this->getAkreditasiSps()->contains($akreditasiSp)) {
            $this->collAkreditasiSps->remove($this->collAkreditasiSps->search($akreditasiSp));
            if (null === $this->akreditasiSpsScheduledForDeletion) {
                $this->akreditasiSpsScheduledForDeletion = clone $this->collAkreditasiSps;
                $this->akreditasiSpsScheduledForDeletion->clear();
            }
            $this->akreditasiSpsScheduledForDeletion[]= clone $akreditasiSp;
            $akreditasiSp->setSekolah(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Sekolah is new, it will return
     * an empty collection; or if this Sekolah has previously
     * been saved, it will retrieve related AkreditasiSps from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Sekolah.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|AkreditasiSp[] List of AkreditasiSp objects
     */
    public function getAkreditasiSpsJoinAkreditasi($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = AkreditasiSpQuery::create(null, $criteria);
        $query->joinWith('Akreditasi', $join_behavior);

        return $this->getAkreditasiSps($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Sekolah is new, it will return
     * an empty collection; or if this Sekolah has previously
     * been saved, it will retrieve related AkreditasiSps from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Sekolah.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|AkreditasiSp[] List of AkreditasiSp objects
     */
    public function getAkreditasiSpsJoinLembagaAkreditasi($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = AkreditasiSpQuery::create(null, $criteria);
        $query->joinWith('LembagaAkreditasi', $join_behavior);

        return $this->getAkreditasiSps($query, $con);
    }

    /**
     * Clears out the collAlats collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Sekolah The current object (for fluent API support)
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
     * If this Sekolah is new, it will return
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
                    ->filterBySekolah($this)
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
     * @return Sekolah The current object (for fluent API support)
     */
    public function setAlats(PropelCollection $alats, PropelPDO $con = null)
    {
        $alatsToDelete = $this->getAlats(new Criteria(), $con)->diff($alats);

        $this->alatsScheduledForDeletion = unserialize(serialize($alatsToDelete));

        foreach ($alatsToDelete as $alatRemoved) {
            $alatRemoved->setSekolah(null);
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
                ->filterBySekolah($this)
                ->count($con);
        }

        return count($this->collAlats);
    }

    /**
     * Method called to associate a Alat object to this object
     * through the Alat foreign key attribute.
     *
     * @param    Alat $l Alat
     * @return Sekolah The current object (for fluent API support)
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
        $alat->setSekolah($this);
    }

    /**
     * @param	Alat $alat The alat object to remove.
     * @return Sekolah The current object (for fluent API support)
     */
    public function removeAlat($alat)
    {
        if ($this->getAlats()->contains($alat)) {
            $this->collAlats->remove($this->collAlats->search($alat));
            if (null === $this->alatsScheduledForDeletion) {
                $this->alatsScheduledForDeletion = clone $this->collAlats;
                $this->alatsScheduledForDeletion->clear();
            }
            $this->alatsScheduledForDeletion[]= clone $alat;
            $alat->setSekolah(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Sekolah is new, it will return
     * an empty collection; or if this Sekolah has previously
     * been saved, it will retrieve related Alats from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Sekolah.
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
     * Otherwise if this Sekolah is new, it will return
     * an empty collection; or if this Sekolah has previously
     * been saved, it will retrieve related Alats from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Sekolah.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Alat[] List of Alat objects
     */
    public function getAlatsJoinRuang($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = AlatQuery::create(null, $criteria);
        $query->joinWith('Ruang', $join_behavior);

        return $this->getAlats($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Sekolah is new, it will return
     * an empty collection; or if this Sekolah has previously
     * been saved, it will retrieve related Alats from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Sekolah.
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
     * Otherwise if this Sekolah is new, it will return
     * an empty collection; or if this Sekolah has previously
     * been saved, it will retrieve related Alats from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Sekolah.
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
     * Otherwise if this Sekolah is new, it will return
     * an empty collection; or if this Sekolah has previously
     * been saved, it will retrieve related Alats from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Sekolah.
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
     * Clears out the collAnggotaGuguses collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Sekolah The current object (for fluent API support)
     * @see        addAnggotaGuguses()
     */
    public function clearAnggotaGuguses()
    {
        $this->collAnggotaGuguses = null; // important to set this to null since that means it is uninitialized
        $this->collAnggotaGugusesPartial = null;

        return $this;
    }

    /**
     * reset is the collAnggotaGuguses collection loaded partially
     *
     * @return void
     */
    public function resetPartialAnggotaGuguses($v = true)
    {
        $this->collAnggotaGugusesPartial = $v;
    }

    /**
     * Initializes the collAnggotaGuguses collection.
     *
     * By default this just sets the collAnggotaGuguses collection to an empty array (like clearcollAnggotaGuguses());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initAnggotaGuguses($overrideExisting = true)
    {
        if (null !== $this->collAnggotaGuguses && !$overrideExisting) {
            return;
        }
        $this->collAnggotaGuguses = new PropelObjectCollection();
        $this->collAnggotaGuguses->setModel('AnggotaGugus');
    }

    /**
     * Gets an array of AnggotaGugus objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Sekolah is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|AnggotaGugus[] List of AnggotaGugus objects
     * @throws PropelException
     */
    public function getAnggotaGuguses($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collAnggotaGugusesPartial && !$this->isNew();
        if (null === $this->collAnggotaGuguses || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collAnggotaGuguses) {
                // return empty collection
                $this->initAnggotaGuguses();
            } else {
                $collAnggotaGuguses = AnggotaGugusQuery::create(null, $criteria)
                    ->filterBySekolah($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collAnggotaGugusesPartial && count($collAnggotaGuguses)) {
                      $this->initAnggotaGuguses(false);

                      foreach($collAnggotaGuguses as $obj) {
                        if (false == $this->collAnggotaGuguses->contains($obj)) {
                          $this->collAnggotaGuguses->append($obj);
                        }
                      }

                      $this->collAnggotaGugusesPartial = true;
                    }

                    $collAnggotaGuguses->getInternalIterator()->rewind();
                    return $collAnggotaGuguses;
                }

                if($partial && $this->collAnggotaGuguses) {
                    foreach($this->collAnggotaGuguses as $obj) {
                        if($obj->isNew()) {
                            $collAnggotaGuguses[] = $obj;
                        }
                    }
                }

                $this->collAnggotaGuguses = $collAnggotaGuguses;
                $this->collAnggotaGugusesPartial = false;
            }
        }

        return $this->collAnggotaGuguses;
    }

    /**
     * Sets a collection of AnggotaGugus objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $anggotaGuguses A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Sekolah The current object (for fluent API support)
     */
    public function setAnggotaGuguses(PropelCollection $anggotaGuguses, PropelPDO $con = null)
    {
        $anggotaGugusesToDelete = $this->getAnggotaGuguses(new Criteria(), $con)->diff($anggotaGuguses);

        $this->anggotaGugusesScheduledForDeletion = unserialize(serialize($anggotaGugusesToDelete));

        foreach ($anggotaGugusesToDelete as $anggotaGugusRemoved) {
            $anggotaGugusRemoved->setSekolah(null);
        }

        $this->collAnggotaGuguses = null;
        foreach ($anggotaGuguses as $anggotaGugus) {
            $this->addAnggotaGugus($anggotaGugus);
        }

        $this->collAnggotaGuguses = $anggotaGuguses;
        $this->collAnggotaGugusesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related AnggotaGugus objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related AnggotaGugus objects.
     * @throws PropelException
     */
    public function countAnggotaGuguses(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collAnggotaGugusesPartial && !$this->isNew();
        if (null === $this->collAnggotaGuguses || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collAnggotaGuguses) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getAnggotaGuguses());
            }
            $query = AnggotaGugusQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterBySekolah($this)
                ->count($con);
        }

        return count($this->collAnggotaGuguses);
    }

    /**
     * Method called to associate a AnggotaGugus object to this object
     * through the AnggotaGugus foreign key attribute.
     *
     * @param    AnggotaGugus $l AnggotaGugus
     * @return Sekolah The current object (for fluent API support)
     */
    public function addAnggotaGugus(AnggotaGugus $l)
    {
        if ($this->collAnggotaGuguses === null) {
            $this->initAnggotaGuguses();
            $this->collAnggotaGugusesPartial = true;
        }
        if (!in_array($l, $this->collAnggotaGuguses->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddAnggotaGugus($l);
        }

        return $this;
    }

    /**
     * @param	AnggotaGugus $anggotaGugus The anggotaGugus object to add.
     */
    protected function doAddAnggotaGugus($anggotaGugus)
    {
        $this->collAnggotaGuguses[]= $anggotaGugus;
        $anggotaGugus->setSekolah($this);
    }

    /**
     * @param	AnggotaGugus $anggotaGugus The anggotaGugus object to remove.
     * @return Sekolah The current object (for fluent API support)
     */
    public function removeAnggotaGugus($anggotaGugus)
    {
        if ($this->getAnggotaGuguses()->contains($anggotaGugus)) {
            $this->collAnggotaGuguses->remove($this->collAnggotaGuguses->search($anggotaGugus));
            if (null === $this->anggotaGugusesScheduledForDeletion) {
                $this->anggotaGugusesScheduledForDeletion = clone $this->collAnggotaGuguses;
                $this->anggotaGugusesScheduledForDeletion->clear();
            }
            $this->anggotaGugusesScheduledForDeletion[]= clone $anggotaGugus;
            $anggotaGugus->setSekolah(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Sekolah is new, it will return
     * an empty collection; or if this Sekolah has previously
     * been saved, it will retrieve related AnggotaGuguses from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Sekolah.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|AnggotaGugus[] List of AnggotaGugus objects
     */
    public function getAnggotaGugusesJoinGugusSekolah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = AnggotaGugusQuery::create(null, $criteria);
        $query->joinWith('GugusSekolah', $join_behavior);

        return $this->getAnggotaGuguses($query, $con);
    }

    /**
     * Clears out the collAngkutans collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Sekolah The current object (for fluent API support)
     * @see        addAngkutans()
     */
    public function clearAngkutans()
    {
        $this->collAngkutans = null; // important to set this to null since that means it is uninitialized
        $this->collAngkutansPartial = null;

        return $this;
    }

    /**
     * reset is the collAngkutans collection loaded partially
     *
     * @return void
     */
    public function resetPartialAngkutans($v = true)
    {
        $this->collAngkutansPartial = $v;
    }

    /**
     * Initializes the collAngkutans collection.
     *
     * By default this just sets the collAngkutans collection to an empty array (like clearcollAngkutans());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initAngkutans($overrideExisting = true)
    {
        if (null !== $this->collAngkutans && !$overrideExisting) {
            return;
        }
        $this->collAngkutans = new PropelObjectCollection();
        $this->collAngkutans->setModel('Angkutan');
    }

    /**
     * Gets an array of Angkutan objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Sekolah is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Angkutan[] List of Angkutan objects
     * @throws PropelException
     */
    public function getAngkutans($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collAngkutansPartial && !$this->isNew();
        if (null === $this->collAngkutans || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collAngkutans) {
                // return empty collection
                $this->initAngkutans();
            } else {
                $collAngkutans = AngkutanQuery::create(null, $criteria)
                    ->filterBySekolah($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collAngkutansPartial && count($collAngkutans)) {
                      $this->initAngkutans(false);

                      foreach($collAngkutans as $obj) {
                        if (false == $this->collAngkutans->contains($obj)) {
                          $this->collAngkutans->append($obj);
                        }
                      }

                      $this->collAngkutansPartial = true;
                    }

                    $collAngkutans->getInternalIterator()->rewind();
                    return $collAngkutans;
                }

                if($partial && $this->collAngkutans) {
                    foreach($this->collAngkutans as $obj) {
                        if($obj->isNew()) {
                            $collAngkutans[] = $obj;
                        }
                    }
                }

                $this->collAngkutans = $collAngkutans;
                $this->collAngkutansPartial = false;
            }
        }

        return $this->collAngkutans;
    }

    /**
     * Sets a collection of Angkutan objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $angkutans A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Sekolah The current object (for fluent API support)
     */
    public function setAngkutans(PropelCollection $angkutans, PropelPDO $con = null)
    {
        $angkutansToDelete = $this->getAngkutans(new Criteria(), $con)->diff($angkutans);

        $this->angkutansScheduledForDeletion = unserialize(serialize($angkutansToDelete));

        foreach ($angkutansToDelete as $angkutanRemoved) {
            $angkutanRemoved->setSekolah(null);
        }

        $this->collAngkutans = null;
        foreach ($angkutans as $angkutan) {
            $this->addAngkutan($angkutan);
        }

        $this->collAngkutans = $angkutans;
        $this->collAngkutansPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Angkutan objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Angkutan objects.
     * @throws PropelException
     */
    public function countAngkutans(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collAngkutansPartial && !$this->isNew();
        if (null === $this->collAngkutans || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collAngkutans) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getAngkutans());
            }
            $query = AngkutanQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterBySekolah($this)
                ->count($con);
        }

        return count($this->collAngkutans);
    }

    /**
     * Method called to associate a Angkutan object to this object
     * through the Angkutan foreign key attribute.
     *
     * @param    Angkutan $l Angkutan
     * @return Sekolah The current object (for fluent API support)
     */
    public function addAngkutan(Angkutan $l)
    {
        if ($this->collAngkutans === null) {
            $this->initAngkutans();
            $this->collAngkutansPartial = true;
        }
        if (!in_array($l, $this->collAngkutans->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddAngkutan($l);
        }

        return $this;
    }

    /**
     * @param	Angkutan $angkutan The angkutan object to add.
     */
    protected function doAddAngkutan($angkutan)
    {
        $this->collAngkutans[]= $angkutan;
        $angkutan->setSekolah($this);
    }

    /**
     * @param	Angkutan $angkutan The angkutan object to remove.
     * @return Sekolah The current object (for fluent API support)
     */
    public function removeAngkutan($angkutan)
    {
        if ($this->getAngkutans()->contains($angkutan)) {
            $this->collAngkutans->remove($this->collAngkutans->search($angkutan));
            if (null === $this->angkutansScheduledForDeletion) {
                $this->angkutansScheduledForDeletion = clone $this->collAngkutans;
                $this->angkutansScheduledForDeletion->clear();
            }
            $this->angkutansScheduledForDeletion[]= clone $angkutan;
            $angkutan->setSekolah(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Sekolah is new, it will return
     * an empty collection; or if this Sekolah has previously
     * been saved, it will retrieve related Angkutans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Sekolah.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Angkutan[] List of Angkutan objects
     */
    public function getAngkutansJoinPtk($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = AngkutanQuery::create(null, $criteria);
        $query->joinWith('Ptk', $join_behavior);

        return $this->getAngkutans($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Sekolah is new, it will return
     * an empty collection; or if this Sekolah has previously
     * been saved, it will retrieve related Angkutans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Sekolah.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Angkutan[] List of Angkutan objects
     */
    public function getAngkutansJoinJenisHapusBuku($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = AngkutanQuery::create(null, $criteria);
        $query->joinWith('JenisHapusBuku', $join_behavior);

        return $this->getAngkutans($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Sekolah is new, it will return
     * an empty collection; or if this Sekolah has previously
     * been saved, it will retrieve related Angkutans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Sekolah.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Angkutan[] List of Angkutan objects
     */
    public function getAngkutansJoinStatusKepemilikanSarpras($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = AngkutanQuery::create(null, $criteria);
        $query->joinWith('StatusKepemilikanSarpras', $join_behavior);

        return $this->getAngkutans($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Sekolah is new, it will return
     * an empty collection; or if this Sekolah has previously
     * been saved, it will retrieve related Angkutans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Sekolah.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Angkutan[] List of Angkutan objects
     */
    public function getAngkutansJoinJenisSarana($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = AngkutanQuery::create(null, $criteria);
        $query->joinWith('JenisSarana', $join_behavior);

        return $this->getAngkutans($query, $con);
    }

    /**
     * Clears out the collBangunans collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Sekolah The current object (for fluent API support)
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
     * If this Sekolah is new, it will return
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
                    ->filterBySekolah($this)
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
     * @return Sekolah The current object (for fluent API support)
     */
    public function setBangunans(PropelCollection $bangunans, PropelPDO $con = null)
    {
        $bangunansToDelete = $this->getBangunans(new Criteria(), $con)->diff($bangunans);

        $this->bangunansScheduledForDeletion = unserialize(serialize($bangunansToDelete));

        foreach ($bangunansToDelete as $bangunanRemoved) {
            $bangunanRemoved->setSekolah(null);
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
                ->filterBySekolah($this)
                ->count($con);
        }

        return count($this->collBangunans);
    }

    /**
     * Method called to associate a Bangunan object to this object
     * through the Bangunan foreign key attribute.
     *
     * @param    Bangunan $l Bangunan
     * @return Sekolah The current object (for fluent API support)
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
        $bangunan->setSekolah($this);
    }

    /**
     * @param	Bangunan $bangunan The bangunan object to remove.
     * @return Sekolah The current object (for fluent API support)
     */
    public function removeBangunan($bangunan)
    {
        if ($this->getBangunans()->contains($bangunan)) {
            $this->collBangunans->remove($this->collBangunans->search($bangunan));
            if (null === $this->bangunansScheduledForDeletion) {
                $this->bangunansScheduledForDeletion = clone $this->collBangunans;
                $this->bangunansScheduledForDeletion->clear();
            }
            $this->bangunansScheduledForDeletion[]= clone $bangunan;
            $bangunan->setSekolah(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Sekolah is new, it will return
     * an empty collection; or if this Sekolah has previously
     * been saved, it will retrieve related Bangunans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Sekolah.
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
     * Otherwise if this Sekolah is new, it will return
     * an empty collection; or if this Sekolah has previously
     * been saved, it will retrieve related Bangunans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Sekolah.
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
     * Otherwise if this Sekolah is new, it will return
     * an empty collection; or if this Sekolah has previously
     * been saved, it will retrieve related Bangunans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Sekolah.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Bangunan[] List of Bangunan objects
     */
    public function getBangunansJoinTanah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = BangunanQuery::create(null, $criteria);
        $query->joinWith('Tanah', $join_behavior);

        return $this->getBangunans($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Sekolah is new, it will return
     * an empty collection; or if this Sekolah has previously
     * been saved, it will retrieve related Bangunans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Sekolah.
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
     * Otherwise if this Sekolah is new, it will return
     * an empty collection; or if this Sekolah has previously
     * been saved, it will retrieve related Bangunans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Sekolah.
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
     * Clears out the collBlockgrants collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Sekolah The current object (for fluent API support)
     * @see        addBlockgrants()
     */
    public function clearBlockgrants()
    {
        $this->collBlockgrants = null; // important to set this to null since that means it is uninitialized
        $this->collBlockgrantsPartial = null;

        return $this;
    }

    /**
     * reset is the collBlockgrants collection loaded partially
     *
     * @return void
     */
    public function resetPartialBlockgrants($v = true)
    {
        $this->collBlockgrantsPartial = $v;
    }

    /**
     * Initializes the collBlockgrants collection.
     *
     * By default this just sets the collBlockgrants collection to an empty array (like clearcollBlockgrants());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initBlockgrants($overrideExisting = true)
    {
        if (null !== $this->collBlockgrants && !$overrideExisting) {
            return;
        }
        $this->collBlockgrants = new PropelObjectCollection();
        $this->collBlockgrants->setModel('Blockgrant');
    }

    /**
     * Gets an array of Blockgrant objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Sekolah is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Blockgrant[] List of Blockgrant objects
     * @throws PropelException
     */
    public function getBlockgrants($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collBlockgrantsPartial && !$this->isNew();
        if (null === $this->collBlockgrants || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collBlockgrants) {
                // return empty collection
                $this->initBlockgrants();
            } else {
                $collBlockgrants = BlockgrantQuery::create(null, $criteria)
                    ->filterBySekolah($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collBlockgrantsPartial && count($collBlockgrants)) {
                      $this->initBlockgrants(false);

                      foreach($collBlockgrants as $obj) {
                        if (false == $this->collBlockgrants->contains($obj)) {
                          $this->collBlockgrants->append($obj);
                        }
                      }

                      $this->collBlockgrantsPartial = true;
                    }

                    $collBlockgrants->getInternalIterator()->rewind();
                    return $collBlockgrants;
                }

                if($partial && $this->collBlockgrants) {
                    foreach($this->collBlockgrants as $obj) {
                        if($obj->isNew()) {
                            $collBlockgrants[] = $obj;
                        }
                    }
                }

                $this->collBlockgrants = $collBlockgrants;
                $this->collBlockgrantsPartial = false;
            }
        }

        return $this->collBlockgrants;
    }

    /**
     * Sets a collection of Blockgrant objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $blockgrants A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Sekolah The current object (for fluent API support)
     */
    public function setBlockgrants(PropelCollection $blockgrants, PropelPDO $con = null)
    {
        $blockgrantsToDelete = $this->getBlockgrants(new Criteria(), $con)->diff($blockgrants);

        $this->blockgrantsScheduledForDeletion = unserialize(serialize($blockgrantsToDelete));

        foreach ($blockgrantsToDelete as $blockgrantRemoved) {
            $blockgrantRemoved->setSekolah(null);
        }

        $this->collBlockgrants = null;
        foreach ($blockgrants as $blockgrant) {
            $this->addBlockgrant($blockgrant);
        }

        $this->collBlockgrants = $blockgrants;
        $this->collBlockgrantsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Blockgrant objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Blockgrant objects.
     * @throws PropelException
     */
    public function countBlockgrants(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collBlockgrantsPartial && !$this->isNew();
        if (null === $this->collBlockgrants || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collBlockgrants) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getBlockgrants());
            }
            $query = BlockgrantQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterBySekolah($this)
                ->count($con);
        }

        return count($this->collBlockgrants);
    }

    /**
     * Method called to associate a Blockgrant object to this object
     * through the Blockgrant foreign key attribute.
     *
     * @param    Blockgrant $l Blockgrant
     * @return Sekolah The current object (for fluent API support)
     */
    public function addBlockgrant(Blockgrant $l)
    {
        if ($this->collBlockgrants === null) {
            $this->initBlockgrants();
            $this->collBlockgrantsPartial = true;
        }
        if (!in_array($l, $this->collBlockgrants->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddBlockgrant($l);
        }

        return $this;
    }

    /**
     * @param	Blockgrant $blockgrant The blockgrant object to add.
     */
    protected function doAddBlockgrant($blockgrant)
    {
        $this->collBlockgrants[]= $blockgrant;
        $blockgrant->setSekolah($this);
    }

    /**
     * @param	Blockgrant $blockgrant The blockgrant object to remove.
     * @return Sekolah The current object (for fluent API support)
     */
    public function removeBlockgrant($blockgrant)
    {
        if ($this->getBlockgrants()->contains($blockgrant)) {
            $this->collBlockgrants->remove($this->collBlockgrants->search($blockgrant));
            if (null === $this->blockgrantsScheduledForDeletion) {
                $this->blockgrantsScheduledForDeletion = clone $this->collBlockgrants;
                $this->blockgrantsScheduledForDeletion->clear();
            }
            $this->blockgrantsScheduledForDeletion[]= clone $blockgrant;
            $blockgrant->setSekolah(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Sekolah is new, it will return
     * an empty collection; or if this Sekolah has previously
     * been saved, it will retrieve related Blockgrants from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Sekolah.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Blockgrant[] List of Blockgrant objects
     */
    public function getBlockgrantsJoinJenisBantuan($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = BlockgrantQuery::create(null, $criteria);
        $query->joinWith('JenisBantuan', $join_behavior);

        return $this->getBlockgrants($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Sekolah is new, it will return
     * an empty collection; or if this Sekolah has previously
     * been saved, it will retrieve related Blockgrants from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Sekolah.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Blockgrant[] List of Blockgrant objects
     */
    public function getBlockgrantsJoinSumberDana($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = BlockgrantQuery::create(null, $criteria);
        $query->joinWith('SumberDana', $join_behavior);

        return $this->getBlockgrants($query, $con);
    }

    /**
     * Clears out the collBukus collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Sekolah The current object (for fluent API support)
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
     * If this Sekolah is new, it will return
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
                    ->filterBySekolah($this)
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
     * @return Sekolah The current object (for fluent API support)
     */
    public function setBukus(PropelCollection $bukus, PropelPDO $con = null)
    {
        $bukusToDelete = $this->getBukus(new Criteria(), $con)->diff($bukus);

        $this->bukusScheduledForDeletion = unserialize(serialize($bukusToDelete));

        foreach ($bukusToDelete as $bukuRemoved) {
            $bukuRemoved->setSekolah(null);
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
                ->filterBySekolah($this)
                ->count($con);
        }

        return count($this->collBukus);
    }

    /**
     * Method called to associate a Buku object to this object
     * through the Buku foreign key attribute.
     *
     * @param    Buku $l Buku
     * @return Sekolah The current object (for fluent API support)
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
        $buku->setSekolah($this);
    }

    /**
     * @param	Buku $buku The buku object to remove.
     * @return Sekolah The current object (for fluent API support)
     */
    public function removeBuku($buku)
    {
        if ($this->getBukus()->contains($buku)) {
            $this->collBukus->remove($this->collBukus->search($buku));
            if (null === $this->bukusScheduledForDeletion) {
                $this->bukusScheduledForDeletion = clone $this->collBukus;
                $this->bukusScheduledForDeletion->clear();
            }
            $this->bukusScheduledForDeletion[]= clone $buku;
            $buku->setSekolah(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Sekolah is new, it will return
     * an empty collection; or if this Sekolah has previously
     * been saved, it will retrieve related Bukus from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Sekolah.
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
     * Otherwise if this Sekolah is new, it will return
     * an empty collection; or if this Sekolah has previously
     * been saved, it will retrieve related Bukus from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Sekolah.
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
     * Otherwise if this Sekolah is new, it will return
     * an empty collection; or if this Sekolah has previously
     * been saved, it will retrieve related Bukus from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Sekolah.
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
     * Otherwise if this Sekolah is new, it will return
     * an empty collection; or if this Sekolah has previously
     * been saved, it will retrieve related Bukus from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Sekolah.
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
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Sekolah is new, it will return
     * an empty collection; or if this Sekolah has previously
     * been saved, it will retrieve related Bukus from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Sekolah.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Buku[] List of Buku objects
     */
    public function getBukusJoinRuang($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = BukuQuery::create(null, $criteria);
        $query->joinWith('Ruang', $join_behavior);

        return $this->getBukus($query, $con);
    }

    /**
     * Clears out the collDataDynamics collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Sekolah The current object (for fluent API support)
     * @see        addDataDynamics()
     */
    public function clearDataDynamics()
    {
        $this->collDataDynamics = null; // important to set this to null since that means it is uninitialized
        $this->collDataDynamicsPartial = null;

        return $this;
    }

    /**
     * reset is the collDataDynamics collection loaded partially
     *
     * @return void
     */
    public function resetPartialDataDynamics($v = true)
    {
        $this->collDataDynamicsPartial = $v;
    }

    /**
     * Initializes the collDataDynamics collection.
     *
     * By default this just sets the collDataDynamics collection to an empty array (like clearcollDataDynamics());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initDataDynamics($overrideExisting = true)
    {
        if (null !== $this->collDataDynamics && !$overrideExisting) {
            return;
        }
        $this->collDataDynamics = new PropelObjectCollection();
        $this->collDataDynamics->setModel('DataDynamic');
    }

    /**
     * Gets an array of DataDynamic objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Sekolah is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|DataDynamic[] List of DataDynamic objects
     * @throws PropelException
     */
    public function getDataDynamics($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collDataDynamicsPartial && !$this->isNew();
        if (null === $this->collDataDynamics || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collDataDynamics) {
                // return empty collection
                $this->initDataDynamics();
            } else {
                $collDataDynamics = DataDynamicQuery::create(null, $criteria)
                    ->filterBySekolah($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collDataDynamicsPartial && count($collDataDynamics)) {
                      $this->initDataDynamics(false);

                      foreach($collDataDynamics as $obj) {
                        if (false == $this->collDataDynamics->contains($obj)) {
                          $this->collDataDynamics->append($obj);
                        }
                      }

                      $this->collDataDynamicsPartial = true;
                    }

                    $collDataDynamics->getInternalIterator()->rewind();
                    return $collDataDynamics;
                }

                if($partial && $this->collDataDynamics) {
                    foreach($this->collDataDynamics as $obj) {
                        if($obj->isNew()) {
                            $collDataDynamics[] = $obj;
                        }
                    }
                }

                $this->collDataDynamics = $collDataDynamics;
                $this->collDataDynamicsPartial = false;
            }
        }

        return $this->collDataDynamics;
    }

    /**
     * Sets a collection of DataDynamic objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $dataDynamics A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Sekolah The current object (for fluent API support)
     */
    public function setDataDynamics(PropelCollection $dataDynamics, PropelPDO $con = null)
    {
        $dataDynamicsToDelete = $this->getDataDynamics(new Criteria(), $con)->diff($dataDynamics);

        $this->dataDynamicsScheduledForDeletion = unserialize(serialize($dataDynamicsToDelete));

        foreach ($dataDynamicsToDelete as $dataDynamicRemoved) {
            $dataDynamicRemoved->setSekolah(null);
        }

        $this->collDataDynamics = null;
        foreach ($dataDynamics as $dataDynamic) {
            $this->addDataDynamic($dataDynamic);
        }

        $this->collDataDynamics = $dataDynamics;
        $this->collDataDynamicsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related DataDynamic objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related DataDynamic objects.
     * @throws PropelException
     */
    public function countDataDynamics(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collDataDynamicsPartial && !$this->isNew();
        if (null === $this->collDataDynamics || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collDataDynamics) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getDataDynamics());
            }
            $query = DataDynamicQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterBySekolah($this)
                ->count($con);
        }

        return count($this->collDataDynamics);
    }

    /**
     * Method called to associate a DataDynamic object to this object
     * through the DataDynamic foreign key attribute.
     *
     * @param    DataDynamic $l DataDynamic
     * @return Sekolah The current object (for fluent API support)
     */
    public function addDataDynamic(DataDynamic $l)
    {
        if ($this->collDataDynamics === null) {
            $this->initDataDynamics();
            $this->collDataDynamicsPartial = true;
        }
        if (!in_array($l, $this->collDataDynamics->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddDataDynamic($l);
        }

        return $this;
    }

    /**
     * @param	DataDynamic $dataDynamic The dataDynamic object to add.
     */
    protected function doAddDataDynamic($dataDynamic)
    {
        $this->collDataDynamics[]= $dataDynamic;
        $dataDynamic->setSekolah($this);
    }

    /**
     * @param	DataDynamic $dataDynamic The dataDynamic object to remove.
     * @return Sekolah The current object (for fluent API support)
     */
    public function removeDataDynamic($dataDynamic)
    {
        if ($this->getDataDynamics()->contains($dataDynamic)) {
            $this->collDataDynamics->remove($this->collDataDynamics->search($dataDynamic));
            if (null === $this->dataDynamicsScheduledForDeletion) {
                $this->dataDynamicsScheduledForDeletion = clone $this->collDataDynamics;
                $this->dataDynamicsScheduledForDeletion->clear();
            }
            $this->dataDynamicsScheduledForDeletion[]= clone $dataDynamic;
            $dataDynamic->setSekolah(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Sekolah is new, it will return
     * an empty collection; or if this Sekolah has previously
     * been saved, it will retrieve related DataDynamics from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Sekolah.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|DataDynamic[] List of DataDynamic objects
     */
    public function getDataDynamicsJoinVariabel($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = DataDynamicQuery::create(null, $criteria);
        $query->joinWith('Variabel', $join_behavior);

        return $this->getDataDynamics($query, $con);
    }

    /**
     * Clears out the collGugusSekolahs collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Sekolah The current object (for fluent API support)
     * @see        addGugusSekolahs()
     */
    public function clearGugusSekolahs()
    {
        $this->collGugusSekolahs = null; // important to set this to null since that means it is uninitialized
        $this->collGugusSekolahsPartial = null;

        return $this;
    }

    /**
     * reset is the collGugusSekolahs collection loaded partially
     *
     * @return void
     */
    public function resetPartialGugusSekolahs($v = true)
    {
        $this->collGugusSekolahsPartial = $v;
    }

    /**
     * Initializes the collGugusSekolahs collection.
     *
     * By default this just sets the collGugusSekolahs collection to an empty array (like clearcollGugusSekolahs());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initGugusSekolahs($overrideExisting = true)
    {
        if (null !== $this->collGugusSekolahs && !$overrideExisting) {
            return;
        }
        $this->collGugusSekolahs = new PropelObjectCollection();
        $this->collGugusSekolahs->setModel('GugusSekolah');
    }

    /**
     * Gets an array of GugusSekolah objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Sekolah is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|GugusSekolah[] List of GugusSekolah objects
     * @throws PropelException
     */
    public function getGugusSekolahs($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collGugusSekolahsPartial && !$this->isNew();
        if (null === $this->collGugusSekolahs || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collGugusSekolahs) {
                // return empty collection
                $this->initGugusSekolahs();
            } else {
                $collGugusSekolahs = GugusSekolahQuery::create(null, $criteria)
                    ->filterBySekolah($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collGugusSekolahsPartial && count($collGugusSekolahs)) {
                      $this->initGugusSekolahs(false);

                      foreach($collGugusSekolahs as $obj) {
                        if (false == $this->collGugusSekolahs->contains($obj)) {
                          $this->collGugusSekolahs->append($obj);
                        }
                      }

                      $this->collGugusSekolahsPartial = true;
                    }

                    $collGugusSekolahs->getInternalIterator()->rewind();
                    return $collGugusSekolahs;
                }

                if($partial && $this->collGugusSekolahs) {
                    foreach($this->collGugusSekolahs as $obj) {
                        if($obj->isNew()) {
                            $collGugusSekolahs[] = $obj;
                        }
                    }
                }

                $this->collGugusSekolahs = $collGugusSekolahs;
                $this->collGugusSekolahsPartial = false;
            }
        }

        return $this->collGugusSekolahs;
    }

    /**
     * Sets a collection of GugusSekolah objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $gugusSekolahs A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Sekolah The current object (for fluent API support)
     */
    public function setGugusSekolahs(PropelCollection $gugusSekolahs, PropelPDO $con = null)
    {
        $gugusSekolahsToDelete = $this->getGugusSekolahs(new Criteria(), $con)->diff($gugusSekolahs);

        $this->gugusSekolahsScheduledForDeletion = unserialize(serialize($gugusSekolahsToDelete));

        foreach ($gugusSekolahsToDelete as $gugusSekolahRemoved) {
            $gugusSekolahRemoved->setSekolah(null);
        }

        $this->collGugusSekolahs = null;
        foreach ($gugusSekolahs as $gugusSekolah) {
            $this->addGugusSekolah($gugusSekolah);
        }

        $this->collGugusSekolahs = $gugusSekolahs;
        $this->collGugusSekolahsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related GugusSekolah objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related GugusSekolah objects.
     * @throws PropelException
     */
    public function countGugusSekolahs(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collGugusSekolahsPartial && !$this->isNew();
        if (null === $this->collGugusSekolahs || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collGugusSekolahs) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getGugusSekolahs());
            }
            $query = GugusSekolahQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterBySekolah($this)
                ->count($con);
        }

        return count($this->collGugusSekolahs);
    }

    /**
     * Method called to associate a GugusSekolah object to this object
     * through the GugusSekolah foreign key attribute.
     *
     * @param    GugusSekolah $l GugusSekolah
     * @return Sekolah The current object (for fluent API support)
     */
    public function addGugusSekolah(GugusSekolah $l)
    {
        if ($this->collGugusSekolahs === null) {
            $this->initGugusSekolahs();
            $this->collGugusSekolahsPartial = true;
        }
        if (!in_array($l, $this->collGugusSekolahs->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddGugusSekolah($l);
        }

        return $this;
    }

    /**
     * @param	GugusSekolah $gugusSekolah The gugusSekolah object to add.
     */
    protected function doAddGugusSekolah($gugusSekolah)
    {
        $this->collGugusSekolahs[]= $gugusSekolah;
        $gugusSekolah->setSekolah($this);
    }

    /**
     * @param	GugusSekolah $gugusSekolah The gugusSekolah object to remove.
     * @return Sekolah The current object (for fluent API support)
     */
    public function removeGugusSekolah($gugusSekolah)
    {
        if ($this->getGugusSekolahs()->contains($gugusSekolah)) {
            $this->collGugusSekolahs->remove($this->collGugusSekolahs->search($gugusSekolah));
            if (null === $this->gugusSekolahsScheduledForDeletion) {
                $this->gugusSekolahsScheduledForDeletion = clone $this->collGugusSekolahs;
                $this->gugusSekolahsScheduledForDeletion->clear();
            }
            $this->gugusSekolahsScheduledForDeletion[]= $gugusSekolah;
            $gugusSekolah->setSekolah(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Sekolah is new, it will return
     * an empty collection; or if this Sekolah has previously
     * been saved, it will retrieve related GugusSekolahs from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Sekolah.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|GugusSekolah[] List of GugusSekolah objects
     */
    public function getGugusSekolahsJoinJenisGugus($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = GugusSekolahQuery::create(null, $criteria);
        $query->joinWith('JenisGugus', $join_behavior);

        return $this->getGugusSekolahs($query, $con);
    }

    /**
     * Clears out the collInstalasis collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Sekolah The current object (for fluent API support)
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
     * If this Sekolah is new, it will return
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
                    ->filterBySekolah($this)
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
     * @return Sekolah The current object (for fluent API support)
     */
    public function setInstalasis(PropelCollection $instalasis, PropelPDO $con = null)
    {
        $instalasisToDelete = $this->getInstalasis(new Criteria(), $con)->diff($instalasis);

        $this->instalasisScheduledForDeletion = unserialize(serialize($instalasisToDelete));

        foreach ($instalasisToDelete as $instalasiRemoved) {
            $instalasiRemoved->setSekolah(null);
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
                ->filterBySekolah($this)
                ->count($con);
        }

        return count($this->collInstalasis);
    }

    /**
     * Method called to associate a Instalasi object to this object
     * through the Instalasi foreign key attribute.
     *
     * @param    Instalasi $l Instalasi
     * @return Sekolah The current object (for fluent API support)
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
        $instalasi->setSekolah($this);
    }

    /**
     * @param	Instalasi $instalasi The instalasi object to remove.
     * @return Sekolah The current object (for fluent API support)
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
            $instalasi->setSekolah(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Sekolah is new, it will return
     * an empty collection; or if this Sekolah has previously
     * been saved, it will retrieve related Instalasis from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Sekolah.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Instalasi[] List of Instalasi objects
     */
    public function getInstalasisJoinMstWilayah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = InstalasiQuery::create(null, $criteria);
        $query->joinWith('MstWilayah', $join_behavior);

        return $this->getInstalasis($query, $con);
    }

    /**
     * Clears out the collIzinOperasionals collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Sekolah The current object (for fluent API support)
     * @see        addIzinOperasionals()
     */
    public function clearIzinOperasionals()
    {
        $this->collIzinOperasionals = null; // important to set this to null since that means it is uninitialized
        $this->collIzinOperasionalsPartial = null;

        return $this;
    }

    /**
     * reset is the collIzinOperasionals collection loaded partially
     *
     * @return void
     */
    public function resetPartialIzinOperasionals($v = true)
    {
        $this->collIzinOperasionalsPartial = $v;
    }

    /**
     * Initializes the collIzinOperasionals collection.
     *
     * By default this just sets the collIzinOperasionals collection to an empty array (like clearcollIzinOperasionals());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initIzinOperasionals($overrideExisting = true)
    {
        if (null !== $this->collIzinOperasionals && !$overrideExisting) {
            return;
        }
        $this->collIzinOperasionals = new PropelObjectCollection();
        $this->collIzinOperasionals->setModel('IzinOperasional');
    }

    /**
     * Gets an array of IzinOperasional objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Sekolah is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|IzinOperasional[] List of IzinOperasional objects
     * @throws PropelException
     */
    public function getIzinOperasionals($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collIzinOperasionalsPartial && !$this->isNew();
        if (null === $this->collIzinOperasionals || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collIzinOperasionals) {
                // return empty collection
                $this->initIzinOperasionals();
            } else {
                $collIzinOperasionals = IzinOperasionalQuery::create(null, $criteria)
                    ->filterBySekolah($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collIzinOperasionalsPartial && count($collIzinOperasionals)) {
                      $this->initIzinOperasionals(false);

                      foreach($collIzinOperasionals as $obj) {
                        if (false == $this->collIzinOperasionals->contains($obj)) {
                          $this->collIzinOperasionals->append($obj);
                        }
                      }

                      $this->collIzinOperasionalsPartial = true;
                    }

                    $collIzinOperasionals->getInternalIterator()->rewind();
                    return $collIzinOperasionals;
                }

                if($partial && $this->collIzinOperasionals) {
                    foreach($this->collIzinOperasionals as $obj) {
                        if($obj->isNew()) {
                            $collIzinOperasionals[] = $obj;
                        }
                    }
                }

                $this->collIzinOperasionals = $collIzinOperasionals;
                $this->collIzinOperasionalsPartial = false;
            }
        }

        return $this->collIzinOperasionals;
    }

    /**
     * Sets a collection of IzinOperasional objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $izinOperasionals A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Sekolah The current object (for fluent API support)
     */
    public function setIzinOperasionals(PropelCollection $izinOperasionals, PropelPDO $con = null)
    {
        $izinOperasionalsToDelete = $this->getIzinOperasionals(new Criteria(), $con)->diff($izinOperasionals);

        $this->izinOperasionalsScheduledForDeletion = unserialize(serialize($izinOperasionalsToDelete));

        foreach ($izinOperasionalsToDelete as $izinOperasionalRemoved) {
            $izinOperasionalRemoved->setSekolah(null);
        }

        $this->collIzinOperasionals = null;
        foreach ($izinOperasionals as $izinOperasional) {
            $this->addIzinOperasional($izinOperasional);
        }

        $this->collIzinOperasionals = $izinOperasionals;
        $this->collIzinOperasionalsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related IzinOperasional objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related IzinOperasional objects.
     * @throws PropelException
     */
    public function countIzinOperasionals(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collIzinOperasionalsPartial && !$this->isNew();
        if (null === $this->collIzinOperasionals || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collIzinOperasionals) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getIzinOperasionals());
            }
            $query = IzinOperasionalQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterBySekolah($this)
                ->count($con);
        }

        return count($this->collIzinOperasionals);
    }

    /**
     * Method called to associate a IzinOperasional object to this object
     * through the IzinOperasional foreign key attribute.
     *
     * @param    IzinOperasional $l IzinOperasional
     * @return Sekolah The current object (for fluent API support)
     */
    public function addIzinOperasional(IzinOperasional $l)
    {
        if ($this->collIzinOperasionals === null) {
            $this->initIzinOperasionals();
            $this->collIzinOperasionalsPartial = true;
        }
        if (!in_array($l, $this->collIzinOperasionals->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddIzinOperasional($l);
        }

        return $this;
    }

    /**
     * @param	IzinOperasional $izinOperasional The izinOperasional object to add.
     */
    protected function doAddIzinOperasional($izinOperasional)
    {
        $this->collIzinOperasionals[]= $izinOperasional;
        $izinOperasional->setSekolah($this);
    }

    /**
     * @param	IzinOperasional $izinOperasional The izinOperasional object to remove.
     * @return Sekolah The current object (for fluent API support)
     */
    public function removeIzinOperasional($izinOperasional)
    {
        if ($this->getIzinOperasionals()->contains($izinOperasional)) {
            $this->collIzinOperasionals->remove($this->collIzinOperasionals->search($izinOperasional));
            if (null === $this->izinOperasionalsScheduledForDeletion) {
                $this->izinOperasionalsScheduledForDeletion = clone $this->collIzinOperasionals;
                $this->izinOperasionalsScheduledForDeletion->clear();
            }
            $this->izinOperasionalsScheduledForDeletion[]= clone $izinOperasional;
            $izinOperasional->setSekolah(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Sekolah is new, it will return
     * an empty collection; or if this Sekolah has previously
     * been saved, it will retrieve related IzinOperasionals from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Sekolah.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|IzinOperasional[] List of IzinOperasional objects
     */
    public function getIzinOperasionalsJoinLembagaNonSekolah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = IzinOperasionalQuery::create(null, $criteria);
        $query->joinWith('LembagaNonSekolah', $join_behavior);

        return $this->getIzinOperasionals($query, $con);
    }

    /**
     * Clears out the collJurusanSps collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Sekolah The current object (for fluent API support)
     * @see        addJurusanSps()
     */
    public function clearJurusanSps()
    {
        $this->collJurusanSps = null; // important to set this to null since that means it is uninitialized
        $this->collJurusanSpsPartial = null;

        return $this;
    }

    /**
     * reset is the collJurusanSps collection loaded partially
     *
     * @return void
     */
    public function resetPartialJurusanSps($v = true)
    {
        $this->collJurusanSpsPartial = $v;
    }

    /**
     * Initializes the collJurusanSps collection.
     *
     * By default this just sets the collJurusanSps collection to an empty array (like clearcollJurusanSps());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initJurusanSps($overrideExisting = true)
    {
        if (null !== $this->collJurusanSps && !$overrideExisting) {
            return;
        }
        $this->collJurusanSps = new PropelObjectCollection();
        $this->collJurusanSps->setModel('JurusanSp');
    }

    /**
     * Gets an array of JurusanSp objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Sekolah is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|JurusanSp[] List of JurusanSp objects
     * @throws PropelException
     */
    public function getJurusanSps($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collJurusanSpsPartial && !$this->isNew();
        if (null === $this->collJurusanSps || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collJurusanSps) {
                // return empty collection
                $this->initJurusanSps();
            } else {
                $collJurusanSps = JurusanSpQuery::create(null, $criteria)
                    ->filterBySekolah($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collJurusanSpsPartial && count($collJurusanSps)) {
                      $this->initJurusanSps(false);

                      foreach($collJurusanSps as $obj) {
                        if (false == $this->collJurusanSps->contains($obj)) {
                          $this->collJurusanSps->append($obj);
                        }
                      }

                      $this->collJurusanSpsPartial = true;
                    }

                    $collJurusanSps->getInternalIterator()->rewind();
                    return $collJurusanSps;
                }

                if($partial && $this->collJurusanSps) {
                    foreach($this->collJurusanSps as $obj) {
                        if($obj->isNew()) {
                            $collJurusanSps[] = $obj;
                        }
                    }
                }

                $this->collJurusanSps = $collJurusanSps;
                $this->collJurusanSpsPartial = false;
            }
        }

        return $this->collJurusanSps;
    }

    /**
     * Sets a collection of JurusanSp objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $jurusanSps A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Sekolah The current object (for fluent API support)
     */
    public function setJurusanSps(PropelCollection $jurusanSps, PropelPDO $con = null)
    {
        $jurusanSpsToDelete = $this->getJurusanSps(new Criteria(), $con)->diff($jurusanSps);

        $this->jurusanSpsScheduledForDeletion = unserialize(serialize($jurusanSpsToDelete));

        foreach ($jurusanSpsToDelete as $jurusanSpRemoved) {
            $jurusanSpRemoved->setSekolah(null);
        }

        $this->collJurusanSps = null;
        foreach ($jurusanSps as $jurusanSp) {
            $this->addJurusanSp($jurusanSp);
        }

        $this->collJurusanSps = $jurusanSps;
        $this->collJurusanSpsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related JurusanSp objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related JurusanSp objects.
     * @throws PropelException
     */
    public function countJurusanSps(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collJurusanSpsPartial && !$this->isNew();
        if (null === $this->collJurusanSps || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collJurusanSps) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getJurusanSps());
            }
            $query = JurusanSpQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterBySekolah($this)
                ->count($con);
        }

        return count($this->collJurusanSps);
    }

    /**
     * Method called to associate a JurusanSp object to this object
     * through the JurusanSp foreign key attribute.
     *
     * @param    JurusanSp $l JurusanSp
     * @return Sekolah The current object (for fluent API support)
     */
    public function addJurusanSp(JurusanSp $l)
    {
        if ($this->collJurusanSps === null) {
            $this->initJurusanSps();
            $this->collJurusanSpsPartial = true;
        }
        if (!in_array($l, $this->collJurusanSps->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddJurusanSp($l);
        }

        return $this;
    }

    /**
     * @param	JurusanSp $jurusanSp The jurusanSp object to add.
     */
    protected function doAddJurusanSp($jurusanSp)
    {
        $this->collJurusanSps[]= $jurusanSp;
        $jurusanSp->setSekolah($this);
    }

    /**
     * @param	JurusanSp $jurusanSp The jurusanSp object to remove.
     * @return Sekolah The current object (for fluent API support)
     */
    public function removeJurusanSp($jurusanSp)
    {
        if ($this->getJurusanSps()->contains($jurusanSp)) {
            $this->collJurusanSps->remove($this->collJurusanSps->search($jurusanSp));
            if (null === $this->jurusanSpsScheduledForDeletion) {
                $this->jurusanSpsScheduledForDeletion = clone $this->collJurusanSps;
                $this->jurusanSpsScheduledForDeletion->clear();
            }
            $this->jurusanSpsScheduledForDeletion[]= clone $jurusanSp;
            $jurusanSp->setSekolah(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Sekolah is new, it will return
     * an empty collection; or if this Sekolah has previously
     * been saved, it will retrieve related JurusanSps from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Sekolah.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|JurusanSp[] List of JurusanSp objects
     */
    public function getJurusanSpsJoinJurusan($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = JurusanSpQuery::create(null, $criteria);
        $query->joinWith('Jurusan', $join_behavior);

        return $this->getJurusanSps($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Sekolah is new, it will return
     * an empty collection; or if this Sekolah has previously
     * been saved, it will retrieve related JurusanSps from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Sekolah.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|JurusanSp[] List of JurusanSp objects
     */
    public function getJurusanSpsJoinKebutuhanKhusus($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = JurusanSpQuery::create(null, $criteria);
        $query->joinWith('KebutuhanKhusus', $join_behavior);

        return $this->getJurusanSps($query, $con);
    }

    /**
     * Clears out the collKepanitiaans collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Sekolah The current object (for fluent API support)
     * @see        addKepanitiaans()
     */
    public function clearKepanitiaans()
    {
        $this->collKepanitiaans = null; // important to set this to null since that means it is uninitialized
        $this->collKepanitiaansPartial = null;

        return $this;
    }

    /**
     * reset is the collKepanitiaans collection loaded partially
     *
     * @return void
     */
    public function resetPartialKepanitiaans($v = true)
    {
        $this->collKepanitiaansPartial = $v;
    }

    /**
     * Initializes the collKepanitiaans collection.
     *
     * By default this just sets the collKepanitiaans collection to an empty array (like clearcollKepanitiaans());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initKepanitiaans($overrideExisting = true)
    {
        if (null !== $this->collKepanitiaans && !$overrideExisting) {
            return;
        }
        $this->collKepanitiaans = new PropelObjectCollection();
        $this->collKepanitiaans->setModel('Kepanitiaan');
    }

    /**
     * Gets an array of Kepanitiaan objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Sekolah is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Kepanitiaan[] List of Kepanitiaan objects
     * @throws PropelException
     */
    public function getKepanitiaans($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collKepanitiaansPartial && !$this->isNew();
        if (null === $this->collKepanitiaans || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collKepanitiaans) {
                // return empty collection
                $this->initKepanitiaans();
            } else {
                $collKepanitiaans = KepanitiaanQuery::create(null, $criteria)
                    ->filterBySekolah($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collKepanitiaansPartial && count($collKepanitiaans)) {
                      $this->initKepanitiaans(false);

                      foreach($collKepanitiaans as $obj) {
                        if (false == $this->collKepanitiaans->contains($obj)) {
                          $this->collKepanitiaans->append($obj);
                        }
                      }

                      $this->collKepanitiaansPartial = true;
                    }

                    $collKepanitiaans->getInternalIterator()->rewind();
                    return $collKepanitiaans;
                }

                if($partial && $this->collKepanitiaans) {
                    foreach($this->collKepanitiaans as $obj) {
                        if($obj->isNew()) {
                            $collKepanitiaans[] = $obj;
                        }
                    }
                }

                $this->collKepanitiaans = $collKepanitiaans;
                $this->collKepanitiaansPartial = false;
            }
        }

        return $this->collKepanitiaans;
    }

    /**
     * Sets a collection of Kepanitiaan objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $kepanitiaans A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Sekolah The current object (for fluent API support)
     */
    public function setKepanitiaans(PropelCollection $kepanitiaans, PropelPDO $con = null)
    {
        $kepanitiaansToDelete = $this->getKepanitiaans(new Criteria(), $con)->diff($kepanitiaans);

        $this->kepanitiaansScheduledForDeletion = unserialize(serialize($kepanitiaansToDelete));

        foreach ($kepanitiaansToDelete as $kepanitiaanRemoved) {
            $kepanitiaanRemoved->setSekolah(null);
        }

        $this->collKepanitiaans = null;
        foreach ($kepanitiaans as $kepanitiaan) {
            $this->addKepanitiaan($kepanitiaan);
        }

        $this->collKepanitiaans = $kepanitiaans;
        $this->collKepanitiaansPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Kepanitiaan objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Kepanitiaan objects.
     * @throws PropelException
     */
    public function countKepanitiaans(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collKepanitiaansPartial && !$this->isNew();
        if (null === $this->collKepanitiaans || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collKepanitiaans) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getKepanitiaans());
            }
            $query = KepanitiaanQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterBySekolah($this)
                ->count($con);
        }

        return count($this->collKepanitiaans);
    }

    /**
     * Method called to associate a Kepanitiaan object to this object
     * through the Kepanitiaan foreign key attribute.
     *
     * @param    Kepanitiaan $l Kepanitiaan
     * @return Sekolah The current object (for fluent API support)
     */
    public function addKepanitiaan(Kepanitiaan $l)
    {
        if ($this->collKepanitiaans === null) {
            $this->initKepanitiaans();
            $this->collKepanitiaansPartial = true;
        }
        if (!in_array($l, $this->collKepanitiaans->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddKepanitiaan($l);
        }

        return $this;
    }

    /**
     * @param	Kepanitiaan $kepanitiaan The kepanitiaan object to add.
     */
    protected function doAddKepanitiaan($kepanitiaan)
    {
        $this->collKepanitiaans[]= $kepanitiaan;
        $kepanitiaan->setSekolah($this);
    }

    /**
     * @param	Kepanitiaan $kepanitiaan The kepanitiaan object to remove.
     * @return Sekolah The current object (for fluent API support)
     */
    public function removeKepanitiaan($kepanitiaan)
    {
        if ($this->getKepanitiaans()->contains($kepanitiaan)) {
            $this->collKepanitiaans->remove($this->collKepanitiaans->search($kepanitiaan));
            if (null === $this->kepanitiaansScheduledForDeletion) {
                $this->kepanitiaansScheduledForDeletion = clone $this->collKepanitiaans;
                $this->kepanitiaansScheduledForDeletion->clear();
            }
            $this->kepanitiaansScheduledForDeletion[]= $kepanitiaan;
            $kepanitiaan->setSekolah(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Sekolah is new, it will return
     * an empty collection; or if this Sekolah has previously
     * been saved, it will retrieve related Kepanitiaans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Sekolah.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Kepanitiaan[] List of Kepanitiaan objects
     */
    public function getKepanitiaansJoinJenisKepanitiaan($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = KepanitiaanQuery::create(null, $criteria);
        $query->joinWith('JenisKepanitiaan', $join_behavior);

        return $this->getKepanitiaans($query, $con);
    }

    /**
     * Clears out the collLayananKhususes collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Sekolah The current object (for fluent API support)
     * @see        addLayananKhususes()
     */
    public function clearLayananKhususes()
    {
        $this->collLayananKhususes = null; // important to set this to null since that means it is uninitialized
        $this->collLayananKhususesPartial = null;

        return $this;
    }

    /**
     * reset is the collLayananKhususes collection loaded partially
     *
     * @return void
     */
    public function resetPartialLayananKhususes($v = true)
    {
        $this->collLayananKhususesPartial = $v;
    }

    /**
     * Initializes the collLayananKhususes collection.
     *
     * By default this just sets the collLayananKhususes collection to an empty array (like clearcollLayananKhususes());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initLayananKhususes($overrideExisting = true)
    {
        if (null !== $this->collLayananKhususes && !$overrideExisting) {
            return;
        }
        $this->collLayananKhususes = new PropelObjectCollection();
        $this->collLayananKhususes->setModel('LayananKhusus');
    }

    /**
     * Gets an array of LayananKhusus objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Sekolah is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|LayananKhusus[] List of LayananKhusus objects
     * @throws PropelException
     */
    public function getLayananKhususes($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collLayananKhususesPartial && !$this->isNew();
        if (null === $this->collLayananKhususes || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collLayananKhususes) {
                // return empty collection
                $this->initLayananKhususes();
            } else {
                $collLayananKhususes = LayananKhususQuery::create(null, $criteria)
                    ->filterBySekolah($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collLayananKhususesPartial && count($collLayananKhususes)) {
                      $this->initLayananKhususes(false);

                      foreach($collLayananKhususes as $obj) {
                        if (false == $this->collLayananKhususes->contains($obj)) {
                          $this->collLayananKhususes->append($obj);
                        }
                      }

                      $this->collLayananKhususesPartial = true;
                    }

                    $collLayananKhususes->getInternalIterator()->rewind();
                    return $collLayananKhususes;
                }

                if($partial && $this->collLayananKhususes) {
                    foreach($this->collLayananKhususes as $obj) {
                        if($obj->isNew()) {
                            $collLayananKhususes[] = $obj;
                        }
                    }
                }

                $this->collLayananKhususes = $collLayananKhususes;
                $this->collLayananKhususesPartial = false;
            }
        }

        return $this->collLayananKhususes;
    }

    /**
     * Sets a collection of LayananKhusus objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $layananKhususes A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Sekolah The current object (for fluent API support)
     */
    public function setLayananKhususes(PropelCollection $layananKhususes, PropelPDO $con = null)
    {
        $layananKhususesToDelete = $this->getLayananKhususes(new Criteria(), $con)->diff($layananKhususes);

        $this->layananKhususesScheduledForDeletion = unserialize(serialize($layananKhususesToDelete));

        foreach ($layananKhususesToDelete as $layananKhususRemoved) {
            $layananKhususRemoved->setSekolah(null);
        }

        $this->collLayananKhususes = null;
        foreach ($layananKhususes as $layananKhusus) {
            $this->addLayananKhusus($layananKhusus);
        }

        $this->collLayananKhususes = $layananKhususes;
        $this->collLayananKhususesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related LayananKhusus objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related LayananKhusus objects.
     * @throws PropelException
     */
    public function countLayananKhususes(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collLayananKhususesPartial && !$this->isNew();
        if (null === $this->collLayananKhususes || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collLayananKhususes) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getLayananKhususes());
            }
            $query = LayananKhususQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterBySekolah($this)
                ->count($con);
        }

        return count($this->collLayananKhususes);
    }

    /**
     * Method called to associate a LayananKhusus object to this object
     * through the LayananKhusus foreign key attribute.
     *
     * @param    LayananKhusus $l LayananKhusus
     * @return Sekolah The current object (for fluent API support)
     */
    public function addLayananKhusus(LayananKhusus $l)
    {
        if ($this->collLayananKhususes === null) {
            $this->initLayananKhususes();
            $this->collLayananKhususesPartial = true;
        }
        if (!in_array($l, $this->collLayananKhususes->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddLayananKhusus($l);
        }

        return $this;
    }

    /**
     * @param	LayananKhusus $layananKhusus The layananKhusus object to add.
     */
    protected function doAddLayananKhusus($layananKhusus)
    {
        $this->collLayananKhususes[]= $layananKhusus;
        $layananKhusus->setSekolah($this);
    }

    /**
     * @param	LayananKhusus $layananKhusus The layananKhusus object to remove.
     * @return Sekolah The current object (for fluent API support)
     */
    public function removeLayananKhusus($layananKhusus)
    {
        if ($this->getLayananKhususes()->contains($layananKhusus)) {
            $this->collLayananKhususes->remove($this->collLayananKhususes->search($layananKhusus));
            if (null === $this->layananKhususesScheduledForDeletion) {
                $this->layananKhususesScheduledForDeletion = clone $this->collLayananKhususes;
                $this->layananKhususesScheduledForDeletion->clear();
            }
            $this->layananKhususesScheduledForDeletion[]= clone $layananKhusus;
            $layananKhusus->setSekolah(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Sekolah is new, it will return
     * an empty collection; or if this Sekolah has previously
     * been saved, it will retrieve related LayananKhususes from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Sekolah.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|LayananKhusus[] List of LayananKhusus objects
     */
    public function getLayananKhususesJoinJenisLk($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = LayananKhususQuery::create(null, $criteria);
        $query->joinWith('JenisLk', $join_behavior);

        return $this->getLayananKhususes($query, $con);
    }

    /**
     * Clears out the collMous collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Sekolah The current object (for fluent API support)
     * @see        addMous()
     */
    public function clearMous()
    {
        $this->collMous = null; // important to set this to null since that means it is uninitialized
        $this->collMousPartial = null;

        return $this;
    }

    /**
     * reset is the collMous collection loaded partially
     *
     * @return void
     */
    public function resetPartialMous($v = true)
    {
        $this->collMousPartial = $v;
    }

    /**
     * Initializes the collMous collection.
     *
     * By default this just sets the collMous collection to an empty array (like clearcollMous());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initMous($overrideExisting = true)
    {
        if (null !== $this->collMous && !$overrideExisting) {
            return;
        }
        $this->collMous = new PropelObjectCollection();
        $this->collMous->setModel('Mou');
    }

    /**
     * Gets an array of Mou objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Sekolah is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Mou[] List of Mou objects
     * @throws PropelException
     */
    public function getMous($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collMousPartial && !$this->isNew();
        if (null === $this->collMous || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collMous) {
                // return empty collection
                $this->initMous();
            } else {
                $collMous = MouQuery::create(null, $criteria)
                    ->filterBySekolah($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collMousPartial && count($collMous)) {
                      $this->initMous(false);

                      foreach($collMous as $obj) {
                        if (false == $this->collMous->contains($obj)) {
                          $this->collMous->append($obj);
                        }
                      }

                      $this->collMousPartial = true;
                    }

                    $collMous->getInternalIterator()->rewind();
                    return $collMous;
                }

                if($partial && $this->collMous) {
                    foreach($this->collMous as $obj) {
                        if($obj->isNew()) {
                            $collMous[] = $obj;
                        }
                    }
                }

                $this->collMous = $collMous;
                $this->collMousPartial = false;
            }
        }

        return $this->collMous;
    }

    /**
     * Sets a collection of Mou objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $mous A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Sekolah The current object (for fluent API support)
     */
    public function setMous(PropelCollection $mous, PropelPDO $con = null)
    {
        $mousToDelete = $this->getMous(new Criteria(), $con)->diff($mous);

        $this->mousScheduledForDeletion = unserialize(serialize($mousToDelete));

        foreach ($mousToDelete as $mouRemoved) {
            $mouRemoved->setSekolah(null);
        }

        $this->collMous = null;
        foreach ($mous as $mou) {
            $this->addMou($mou);
        }

        $this->collMous = $mous;
        $this->collMousPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Mou objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Mou objects.
     * @throws PropelException
     */
    public function countMous(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collMousPartial && !$this->isNew();
        if (null === $this->collMous || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collMous) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getMous());
            }
            $query = MouQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterBySekolah($this)
                ->count($con);
        }

        return count($this->collMous);
    }

    /**
     * Method called to associate a Mou object to this object
     * through the Mou foreign key attribute.
     *
     * @param    Mou $l Mou
     * @return Sekolah The current object (for fluent API support)
     */
    public function addMou(Mou $l)
    {
        if ($this->collMous === null) {
            $this->initMous();
            $this->collMousPartial = true;
        }
        if (!in_array($l, $this->collMous->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddMou($l);
        }

        return $this;
    }

    /**
     * @param	Mou $mou The mou object to add.
     */
    protected function doAddMou($mou)
    {
        $this->collMous[]= $mou;
        $mou->setSekolah($this);
    }

    /**
     * @param	Mou $mou The mou object to remove.
     * @return Sekolah The current object (for fluent API support)
     */
    public function removeMou($mou)
    {
        if ($this->getMous()->contains($mou)) {
            $this->collMous->remove($this->collMous->search($mou));
            if (null === $this->mousScheduledForDeletion) {
                $this->mousScheduledForDeletion = clone $this->collMous;
                $this->mousScheduledForDeletion->clear();
            }
            $this->mousScheduledForDeletion[]= clone $mou;
            $mou->setSekolah(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Sekolah is new, it will return
     * an empty collection; or if this Sekolah has previously
     * been saved, it will retrieve related Mous from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Sekolah.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Mou[] List of Mou objects
     */
    public function getMousJoinJenisKs($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = MouQuery::create(null, $criteria);
        $query->joinWith('JenisKs', $join_behavior);

        return $this->getMous($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Sekolah is new, it will return
     * an empty collection; or if this Sekolah has previously
     * been saved, it will retrieve related Mous from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Sekolah.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Mou[] List of Mou objects
     */
    public function getMousJoinDudi($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = MouQuery::create(null, $criteria);
        $query->joinWith('Dudi', $join_behavior);

        return $this->getMous($query, $con);
    }

    /**
     * Clears out the collPesertaDidikBarus collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Sekolah The current object (for fluent API support)
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
     * If this Sekolah is new, it will return
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
                    ->filterBySekolah($this)
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
     * @return Sekolah The current object (for fluent API support)
     */
    public function setPesertaDidikBarus(PropelCollection $pesertaDidikBarus, PropelPDO $con = null)
    {
        $pesertaDidikBarusToDelete = $this->getPesertaDidikBarus(new Criteria(), $con)->diff($pesertaDidikBarus);

        $this->pesertaDidikBarusScheduledForDeletion = unserialize(serialize($pesertaDidikBarusToDelete));

        foreach ($pesertaDidikBarusToDelete as $pesertaDidikBaruRemoved) {
            $pesertaDidikBaruRemoved->setSekolah(null);
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
                ->filterBySekolah($this)
                ->count($con);
        }

        return count($this->collPesertaDidikBarus);
    }

    /**
     * Method called to associate a PesertaDidikBaru object to this object
     * through the PesertaDidikBaru foreign key attribute.
     *
     * @param    PesertaDidikBaru $l PesertaDidikBaru
     * @return Sekolah The current object (for fluent API support)
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
        $pesertaDidikBaru->setSekolah($this);
    }

    /**
     * @param	PesertaDidikBaru $pesertaDidikBaru The pesertaDidikBaru object to remove.
     * @return Sekolah The current object (for fluent API support)
     */
    public function removePesertaDidikBaru($pesertaDidikBaru)
    {
        if ($this->getPesertaDidikBarus()->contains($pesertaDidikBaru)) {
            $this->collPesertaDidikBarus->remove($this->collPesertaDidikBarus->search($pesertaDidikBaru));
            if (null === $this->pesertaDidikBarusScheduledForDeletion) {
                $this->pesertaDidikBarusScheduledForDeletion = clone $this->collPesertaDidikBarus;
                $this->pesertaDidikBarusScheduledForDeletion->clear();
            }
            $this->pesertaDidikBarusScheduledForDeletion[]= clone $pesertaDidikBaru;
            $pesertaDidikBaru->setSekolah(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Sekolah is new, it will return
     * an empty collection; or if this Sekolah has previously
     * been saved, it will retrieve related PesertaDidikBarus from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Sekolah.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidikBaru[] List of PesertaDidikBaru objects
     */
    public function getPesertaDidikBarusJoinPesertaDidik($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikBaruQuery::create(null, $criteria);
        $query->joinWith('PesertaDidik', $join_behavior);

        return $this->getPesertaDidikBarus($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Sekolah is new, it will return
     * an empty collection; or if this Sekolah has previously
     * been saved, it will retrieve related PesertaDidikBarus from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Sekolah.
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
     * Otherwise if this Sekolah is new, it will return
     * an empty collection; or if this Sekolah has previously
     * been saved, it will retrieve related PesertaDidikBarus from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Sekolah.
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
     * Clears out the collProgramInklusis collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Sekolah The current object (for fluent API support)
     * @see        addProgramInklusis()
     */
    public function clearProgramInklusis()
    {
        $this->collProgramInklusis = null; // important to set this to null since that means it is uninitialized
        $this->collProgramInklusisPartial = null;

        return $this;
    }

    /**
     * reset is the collProgramInklusis collection loaded partially
     *
     * @return void
     */
    public function resetPartialProgramInklusis($v = true)
    {
        $this->collProgramInklusisPartial = $v;
    }

    /**
     * Initializes the collProgramInklusis collection.
     *
     * By default this just sets the collProgramInklusis collection to an empty array (like clearcollProgramInklusis());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initProgramInklusis($overrideExisting = true)
    {
        if (null !== $this->collProgramInklusis && !$overrideExisting) {
            return;
        }
        $this->collProgramInklusis = new PropelObjectCollection();
        $this->collProgramInklusis->setModel('ProgramInklusi');
    }

    /**
     * Gets an array of ProgramInklusi objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Sekolah is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProgramInklusi[] List of ProgramInklusi objects
     * @throws PropelException
     */
    public function getProgramInklusis($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collProgramInklusisPartial && !$this->isNew();
        if (null === $this->collProgramInklusis || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collProgramInklusis) {
                // return empty collection
                $this->initProgramInklusis();
            } else {
                $collProgramInklusis = ProgramInklusiQuery::create(null, $criteria)
                    ->filterBySekolah($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collProgramInklusisPartial && count($collProgramInklusis)) {
                      $this->initProgramInklusis(false);

                      foreach($collProgramInklusis as $obj) {
                        if (false == $this->collProgramInklusis->contains($obj)) {
                          $this->collProgramInklusis->append($obj);
                        }
                      }

                      $this->collProgramInklusisPartial = true;
                    }

                    $collProgramInklusis->getInternalIterator()->rewind();
                    return $collProgramInklusis;
                }

                if($partial && $this->collProgramInklusis) {
                    foreach($this->collProgramInklusis as $obj) {
                        if($obj->isNew()) {
                            $collProgramInklusis[] = $obj;
                        }
                    }
                }

                $this->collProgramInklusis = $collProgramInklusis;
                $this->collProgramInklusisPartial = false;
            }
        }

        return $this->collProgramInklusis;
    }

    /**
     * Sets a collection of ProgramInklusi objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $programInklusis A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Sekolah The current object (for fluent API support)
     */
    public function setProgramInklusis(PropelCollection $programInklusis, PropelPDO $con = null)
    {
        $programInklusisToDelete = $this->getProgramInklusis(new Criteria(), $con)->diff($programInklusis);

        $this->programInklusisScheduledForDeletion = unserialize(serialize($programInklusisToDelete));

        foreach ($programInklusisToDelete as $programInklusiRemoved) {
            $programInklusiRemoved->setSekolah(null);
        }

        $this->collProgramInklusis = null;
        foreach ($programInklusis as $programInklusi) {
            $this->addProgramInklusi($programInklusi);
        }

        $this->collProgramInklusis = $programInklusis;
        $this->collProgramInklusisPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProgramInklusi objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProgramInklusi objects.
     * @throws PropelException
     */
    public function countProgramInklusis(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collProgramInklusisPartial && !$this->isNew();
        if (null === $this->collProgramInklusis || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collProgramInklusis) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getProgramInklusis());
            }
            $query = ProgramInklusiQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterBySekolah($this)
                ->count($con);
        }

        return count($this->collProgramInklusis);
    }

    /**
     * Method called to associate a ProgramInklusi object to this object
     * through the ProgramInklusi foreign key attribute.
     *
     * @param    ProgramInklusi $l ProgramInklusi
     * @return Sekolah The current object (for fluent API support)
     */
    public function addProgramInklusi(ProgramInklusi $l)
    {
        if ($this->collProgramInklusis === null) {
            $this->initProgramInklusis();
            $this->collProgramInklusisPartial = true;
        }
        if (!in_array($l, $this->collProgramInklusis->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddProgramInklusi($l);
        }

        return $this;
    }

    /**
     * @param	ProgramInklusi $programInklusi The programInklusi object to add.
     */
    protected function doAddProgramInklusi($programInklusi)
    {
        $this->collProgramInklusis[]= $programInklusi;
        $programInklusi->setSekolah($this);
    }

    /**
     * @param	ProgramInklusi $programInklusi The programInklusi object to remove.
     * @return Sekolah The current object (for fluent API support)
     */
    public function removeProgramInklusi($programInklusi)
    {
        if ($this->getProgramInklusis()->contains($programInklusi)) {
            $this->collProgramInklusis->remove($this->collProgramInklusis->search($programInklusi));
            if (null === $this->programInklusisScheduledForDeletion) {
                $this->programInklusisScheduledForDeletion = clone $this->collProgramInklusis;
                $this->programInklusisScheduledForDeletion->clear();
            }
            $this->programInklusisScheduledForDeletion[]= clone $programInklusi;
            $programInklusi->setSekolah(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Sekolah is new, it will return
     * an empty collection; or if this Sekolah has previously
     * been saved, it will retrieve related ProgramInklusis from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Sekolah.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProgramInklusi[] List of ProgramInklusi objects
     */
    public function getProgramInklusisJoinKebutuhanKhusus($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProgramInklusiQuery::create(null, $criteria);
        $query->joinWith('KebutuhanKhusus', $join_behavior);

        return $this->getProgramInklusis($query, $con);
    }

    /**
     * Clears out the collPtkBarus collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Sekolah The current object (for fluent API support)
     * @see        addPtkBarus()
     */
    public function clearPtkBarus()
    {
        $this->collPtkBarus = null; // important to set this to null since that means it is uninitialized
        $this->collPtkBarusPartial = null;

        return $this;
    }

    /**
     * reset is the collPtkBarus collection loaded partially
     *
     * @return void
     */
    public function resetPartialPtkBarus($v = true)
    {
        $this->collPtkBarusPartial = $v;
    }

    /**
     * Initializes the collPtkBarus collection.
     *
     * By default this just sets the collPtkBarus collection to an empty array (like clearcollPtkBarus());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPtkBarus($overrideExisting = true)
    {
        if (null !== $this->collPtkBarus && !$overrideExisting) {
            return;
        }
        $this->collPtkBarus = new PropelObjectCollection();
        $this->collPtkBarus->setModel('PtkBaru');
    }

    /**
     * Gets an array of PtkBaru objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Sekolah is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|PtkBaru[] List of PtkBaru objects
     * @throws PropelException
     */
    public function getPtkBarus($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collPtkBarusPartial && !$this->isNew();
        if (null === $this->collPtkBarus || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collPtkBarus) {
                // return empty collection
                $this->initPtkBarus();
            } else {
                $collPtkBarus = PtkBaruQuery::create(null, $criteria)
                    ->filterBySekolah($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collPtkBarusPartial && count($collPtkBarus)) {
                      $this->initPtkBarus(false);

                      foreach($collPtkBarus as $obj) {
                        if (false == $this->collPtkBarus->contains($obj)) {
                          $this->collPtkBarus->append($obj);
                        }
                      }

                      $this->collPtkBarusPartial = true;
                    }

                    $collPtkBarus->getInternalIterator()->rewind();
                    return $collPtkBarus;
                }

                if($partial && $this->collPtkBarus) {
                    foreach($this->collPtkBarus as $obj) {
                        if($obj->isNew()) {
                            $collPtkBarus[] = $obj;
                        }
                    }
                }

                $this->collPtkBarus = $collPtkBarus;
                $this->collPtkBarusPartial = false;
            }
        }

        return $this->collPtkBarus;
    }

    /**
     * Sets a collection of PtkBaru objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $ptkBarus A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Sekolah The current object (for fluent API support)
     */
    public function setPtkBarus(PropelCollection $ptkBarus, PropelPDO $con = null)
    {
        $ptkBarusToDelete = $this->getPtkBarus(new Criteria(), $con)->diff($ptkBarus);

        $this->ptkBarusScheduledForDeletion = unserialize(serialize($ptkBarusToDelete));

        foreach ($ptkBarusToDelete as $ptkBaruRemoved) {
            $ptkBaruRemoved->setSekolah(null);
        }

        $this->collPtkBarus = null;
        foreach ($ptkBarus as $ptkBaru) {
            $this->addPtkBaru($ptkBaru);
        }

        $this->collPtkBarus = $ptkBarus;
        $this->collPtkBarusPartial = false;

        return $this;
    }

    /**
     * Returns the number of related PtkBaru objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related PtkBaru objects.
     * @throws PropelException
     */
    public function countPtkBarus(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collPtkBarusPartial && !$this->isNew();
        if (null === $this->collPtkBarus || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPtkBarus) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getPtkBarus());
            }
            $query = PtkBaruQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterBySekolah($this)
                ->count($con);
        }

        return count($this->collPtkBarus);
    }

    /**
     * Method called to associate a PtkBaru object to this object
     * through the PtkBaru foreign key attribute.
     *
     * @param    PtkBaru $l PtkBaru
     * @return Sekolah The current object (for fluent API support)
     */
    public function addPtkBaru(PtkBaru $l)
    {
        if ($this->collPtkBarus === null) {
            $this->initPtkBarus();
            $this->collPtkBarusPartial = true;
        }
        if (!in_array($l, $this->collPtkBarus->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddPtkBaru($l);
        }

        return $this;
    }

    /**
     * @param	PtkBaru $ptkBaru The ptkBaru object to add.
     */
    protected function doAddPtkBaru($ptkBaru)
    {
        $this->collPtkBarus[]= $ptkBaru;
        $ptkBaru->setSekolah($this);
    }

    /**
     * @param	PtkBaru $ptkBaru The ptkBaru object to remove.
     * @return Sekolah The current object (for fluent API support)
     */
    public function removePtkBaru($ptkBaru)
    {
        if ($this->getPtkBarus()->contains($ptkBaru)) {
            $this->collPtkBarus->remove($this->collPtkBarus->search($ptkBaru));
            if (null === $this->ptkBarusScheduledForDeletion) {
                $this->ptkBarusScheduledForDeletion = clone $this->collPtkBarus;
                $this->ptkBarusScheduledForDeletion->clear();
            }
            $this->ptkBarusScheduledForDeletion[]= clone $ptkBaru;
            $ptkBaru->setSekolah(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Sekolah is new, it will return
     * an empty collection; or if this Sekolah has previously
     * been saved, it will retrieve related PtkBarus from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Sekolah.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PtkBaru[] List of PtkBaru objects
     */
    public function getPtkBarusJoinPtk($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PtkBaruQuery::create(null, $criteria);
        $query->joinWith('Ptk', $join_behavior);

        return $this->getPtkBarus($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Sekolah is new, it will return
     * an empty collection; or if this Sekolah has previously
     * been saved, it will retrieve related PtkBarus from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Sekolah.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PtkBaru[] List of PtkBaru objects
     */
    public function getPtkBarusJoinTahunAjaran($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PtkBaruQuery::create(null, $criteria);
        $query->joinWith('TahunAjaran', $join_behavior);

        return $this->getPtkBarus($query, $con);
    }

    /**
     * Clears out the collPtkTerdaftars collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Sekolah The current object (for fluent API support)
     * @see        addPtkTerdaftars()
     */
    public function clearPtkTerdaftars()
    {
        $this->collPtkTerdaftars = null; // important to set this to null since that means it is uninitialized
        $this->collPtkTerdaftarsPartial = null;

        return $this;
    }

    /**
     * reset is the collPtkTerdaftars collection loaded partially
     *
     * @return void
     */
    public function resetPartialPtkTerdaftars($v = true)
    {
        $this->collPtkTerdaftarsPartial = $v;
    }

    /**
     * Initializes the collPtkTerdaftars collection.
     *
     * By default this just sets the collPtkTerdaftars collection to an empty array (like clearcollPtkTerdaftars());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPtkTerdaftars($overrideExisting = true)
    {
        if (null !== $this->collPtkTerdaftars && !$overrideExisting) {
            return;
        }
        $this->collPtkTerdaftars = new PropelObjectCollection();
        $this->collPtkTerdaftars->setModel('PtkTerdaftar');
    }

    /**
     * Gets an array of PtkTerdaftar objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Sekolah is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|PtkTerdaftar[] List of PtkTerdaftar objects
     * @throws PropelException
     */
    public function getPtkTerdaftars($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collPtkTerdaftarsPartial && !$this->isNew();
        if (null === $this->collPtkTerdaftars || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collPtkTerdaftars) {
                // return empty collection
                $this->initPtkTerdaftars();
            } else {
                $collPtkTerdaftars = PtkTerdaftarQuery::create(null, $criteria)
                    ->filterBySekolah($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collPtkTerdaftarsPartial && count($collPtkTerdaftars)) {
                      $this->initPtkTerdaftars(false);

                      foreach($collPtkTerdaftars as $obj) {
                        if (false == $this->collPtkTerdaftars->contains($obj)) {
                          $this->collPtkTerdaftars->append($obj);
                        }
                      }

                      $this->collPtkTerdaftarsPartial = true;
                    }

                    $collPtkTerdaftars->getInternalIterator()->rewind();
                    return $collPtkTerdaftars;
                }

                if($partial && $this->collPtkTerdaftars) {
                    foreach($this->collPtkTerdaftars as $obj) {
                        if($obj->isNew()) {
                            $collPtkTerdaftars[] = $obj;
                        }
                    }
                }

                $this->collPtkTerdaftars = $collPtkTerdaftars;
                $this->collPtkTerdaftarsPartial = false;
            }
        }

        return $this->collPtkTerdaftars;
    }

    /**
     * Sets a collection of PtkTerdaftar objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $ptkTerdaftars A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Sekolah The current object (for fluent API support)
     */
    public function setPtkTerdaftars(PropelCollection $ptkTerdaftars, PropelPDO $con = null)
    {
        $ptkTerdaftarsToDelete = $this->getPtkTerdaftars(new Criteria(), $con)->diff($ptkTerdaftars);

        $this->ptkTerdaftarsScheduledForDeletion = unserialize(serialize($ptkTerdaftarsToDelete));

        foreach ($ptkTerdaftarsToDelete as $ptkTerdaftarRemoved) {
            $ptkTerdaftarRemoved->setSekolah(null);
        }

        $this->collPtkTerdaftars = null;
        foreach ($ptkTerdaftars as $ptkTerdaftar) {
            $this->addPtkTerdaftar($ptkTerdaftar);
        }

        $this->collPtkTerdaftars = $ptkTerdaftars;
        $this->collPtkTerdaftarsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related PtkTerdaftar objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related PtkTerdaftar objects.
     * @throws PropelException
     */
    public function countPtkTerdaftars(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collPtkTerdaftarsPartial && !$this->isNew();
        if (null === $this->collPtkTerdaftars || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPtkTerdaftars) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getPtkTerdaftars());
            }
            $query = PtkTerdaftarQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterBySekolah($this)
                ->count($con);
        }

        return count($this->collPtkTerdaftars);
    }

    /**
     * Method called to associate a PtkTerdaftar object to this object
     * through the PtkTerdaftar foreign key attribute.
     *
     * @param    PtkTerdaftar $l PtkTerdaftar
     * @return Sekolah The current object (for fluent API support)
     */
    public function addPtkTerdaftar(PtkTerdaftar $l)
    {
        if ($this->collPtkTerdaftars === null) {
            $this->initPtkTerdaftars();
            $this->collPtkTerdaftarsPartial = true;
        }
        if (!in_array($l, $this->collPtkTerdaftars->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddPtkTerdaftar($l);
        }

        return $this;
    }

    /**
     * @param	PtkTerdaftar $ptkTerdaftar The ptkTerdaftar object to add.
     */
    protected function doAddPtkTerdaftar($ptkTerdaftar)
    {
        $this->collPtkTerdaftars[]= $ptkTerdaftar;
        $ptkTerdaftar->setSekolah($this);
    }

    /**
     * @param	PtkTerdaftar $ptkTerdaftar The ptkTerdaftar object to remove.
     * @return Sekolah The current object (for fluent API support)
     */
    public function removePtkTerdaftar($ptkTerdaftar)
    {
        if ($this->getPtkTerdaftars()->contains($ptkTerdaftar)) {
            $this->collPtkTerdaftars->remove($this->collPtkTerdaftars->search($ptkTerdaftar));
            if (null === $this->ptkTerdaftarsScheduledForDeletion) {
                $this->ptkTerdaftarsScheduledForDeletion = clone $this->collPtkTerdaftars;
                $this->ptkTerdaftarsScheduledForDeletion->clear();
            }
            $this->ptkTerdaftarsScheduledForDeletion[]= clone $ptkTerdaftar;
            $ptkTerdaftar->setSekolah(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Sekolah is new, it will return
     * an empty collection; or if this Sekolah has previously
     * been saved, it will retrieve related PtkTerdaftars from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Sekolah.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PtkTerdaftar[] List of PtkTerdaftar objects
     */
    public function getPtkTerdaftarsJoinJenisKeluar($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PtkTerdaftarQuery::create(null, $criteria);
        $query->joinWith('JenisKeluar', $join_behavior);

        return $this->getPtkTerdaftars($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Sekolah is new, it will return
     * an empty collection; or if this Sekolah has previously
     * been saved, it will retrieve related PtkTerdaftars from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Sekolah.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PtkTerdaftar[] List of PtkTerdaftar objects
     */
    public function getPtkTerdaftarsJoinPtk($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PtkTerdaftarQuery::create(null, $criteria);
        $query->joinWith('Ptk', $join_behavior);

        return $this->getPtkTerdaftars($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Sekolah is new, it will return
     * an empty collection; or if this Sekolah has previously
     * been saved, it will retrieve related PtkTerdaftars from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Sekolah.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PtkTerdaftar[] List of PtkTerdaftar objects
     */
    public function getPtkTerdaftarsJoinTahunAjaran($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PtkTerdaftarQuery::create(null, $criteria);
        $query->joinWith('TahunAjaran', $join_behavior);

        return $this->getPtkTerdaftars($query, $con);
    }

    /**
     * Clears out the collRegistrasiPesertaDidiks collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Sekolah The current object (for fluent API support)
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
     * If this Sekolah is new, it will return
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
                    ->filterBySekolah($this)
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
     * @return Sekolah The current object (for fluent API support)
     */
    public function setRegistrasiPesertaDidiks(PropelCollection $registrasiPesertaDidiks, PropelPDO $con = null)
    {
        $registrasiPesertaDidiksToDelete = $this->getRegistrasiPesertaDidiks(new Criteria(), $con)->diff($registrasiPesertaDidiks);

        $this->registrasiPesertaDidiksScheduledForDeletion = unserialize(serialize($registrasiPesertaDidiksToDelete));

        foreach ($registrasiPesertaDidiksToDelete as $registrasiPesertaDidikRemoved) {
            $registrasiPesertaDidikRemoved->setSekolah(null);
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
                ->filterBySekolah($this)
                ->count($con);
        }

        return count($this->collRegistrasiPesertaDidiks);
    }

    /**
     * Method called to associate a RegistrasiPesertaDidik object to this object
     * through the RegistrasiPesertaDidik foreign key attribute.
     *
     * @param    RegistrasiPesertaDidik $l RegistrasiPesertaDidik
     * @return Sekolah The current object (for fluent API support)
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
        $registrasiPesertaDidik->setSekolah($this);
    }

    /**
     * @param	RegistrasiPesertaDidik $registrasiPesertaDidik The registrasiPesertaDidik object to remove.
     * @return Sekolah The current object (for fluent API support)
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
            $registrasiPesertaDidik->setSekolah(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Sekolah is new, it will return
     * an empty collection; or if this Sekolah has previously
     * been saved, it will retrieve related RegistrasiPesertaDidiks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Sekolah.
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
     * Otherwise if this Sekolah is new, it will return
     * an empty collection; or if this Sekolah has previously
     * been saved, it will retrieve related RegistrasiPesertaDidiks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Sekolah.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|RegistrasiPesertaDidik[] List of RegistrasiPesertaDidik objects
     */
    public function getRegistrasiPesertaDidiksJoinPesertaDidik($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = RegistrasiPesertaDidikQuery::create(null, $criteria);
        $query->joinWith('PesertaDidik', $join_behavior);

        return $this->getRegistrasiPesertaDidiks($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Sekolah is new, it will return
     * an empty collection; or if this Sekolah has previously
     * been saved, it will retrieve related RegistrasiPesertaDidiks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Sekolah.
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
     * Otherwise if this Sekolah is new, it will return
     * an empty collection; or if this Sekolah has previously
     * been saved, it will retrieve related RegistrasiPesertaDidiks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Sekolah.
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
     * Otherwise if this Sekolah is new, it will return
     * an empty collection; or if this Sekolah has previously
     * been saved, it will retrieve related RegistrasiPesertaDidiks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Sekolah.
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
     * Otherwise if this Sekolah is new, it will return
     * an empty collection; or if this Sekolah has previously
     * been saved, it will retrieve related RegistrasiPesertaDidiks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Sekolah.
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
     * Clears out the collRombonganBelajars collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Sekolah The current object (for fluent API support)
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
     * If this Sekolah is new, it will return
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
                    ->filterBySekolah($this)
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
     * @return Sekolah The current object (for fluent API support)
     */
    public function setRombonganBelajars(PropelCollection $rombonganBelajars, PropelPDO $con = null)
    {
        $rombonganBelajarsToDelete = $this->getRombonganBelajars(new Criteria(), $con)->diff($rombonganBelajars);

        $this->rombonganBelajarsScheduledForDeletion = unserialize(serialize($rombonganBelajarsToDelete));

        foreach ($rombonganBelajarsToDelete as $rombonganBelajarRemoved) {
            $rombonganBelajarRemoved->setSekolah(null);
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
                ->filterBySekolah($this)
                ->count($con);
        }

        return count($this->collRombonganBelajars);
    }

    /**
     * Method called to associate a RombonganBelajar object to this object
     * through the RombonganBelajar foreign key attribute.
     *
     * @param    RombonganBelajar $l RombonganBelajar
     * @return Sekolah The current object (for fluent API support)
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
        $rombonganBelajar->setSekolah($this);
    }

    /**
     * @param	RombonganBelajar $rombonganBelajar The rombonganBelajar object to remove.
     * @return Sekolah The current object (for fluent API support)
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
            $rombonganBelajar->setSekolah(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Sekolah is new, it will return
     * an empty collection; or if this Sekolah has previously
     * been saved, it will retrieve related RombonganBelajars from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Sekolah.
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
     * Otherwise if this Sekolah is new, it will return
     * an empty collection; or if this Sekolah has previously
     * been saved, it will retrieve related RombonganBelajars from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Sekolah.
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
     * Otherwise if this Sekolah is new, it will return
     * an empty collection; or if this Sekolah has previously
     * been saved, it will retrieve related RombonganBelajars from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Sekolah.
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
     * Otherwise if this Sekolah is new, it will return
     * an empty collection; or if this Sekolah has previously
     * been saved, it will retrieve related RombonganBelajars from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Sekolah.
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
     * Otherwise if this Sekolah is new, it will return
     * an empty collection; or if this Sekolah has previously
     * been saved, it will retrieve related RombonganBelajars from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Sekolah.
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
     * Otherwise if this Sekolah is new, it will return
     * an empty collection; or if this Sekolah has previously
     * been saved, it will retrieve related RombonganBelajars from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Sekolah.
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
     * Otherwise if this Sekolah is new, it will return
     * an empty collection; or if this Sekolah has previously
     * been saved, it will retrieve related RombonganBelajars from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Sekolah.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|RombonganBelajar[] List of RombonganBelajar objects
     */
    public function getRombonganBelajarsJoinRuang($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = RombonganBelajarQuery::create(null, $criteria);
        $query->joinWith('Ruang', $join_behavior);

        return $this->getRombonganBelajars($query, $con);
    }

    /**
     * Clears out the collRuangs collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Sekolah The current object (for fluent API support)
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
     * If this Sekolah is new, it will return
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
                    ->filterBySekolah($this)
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
     * @return Sekolah The current object (for fluent API support)
     */
    public function setRuangs(PropelCollection $ruangs, PropelPDO $con = null)
    {
        $ruangsToDelete = $this->getRuangs(new Criteria(), $con)->diff($ruangs);

        $this->ruangsScheduledForDeletion = unserialize(serialize($ruangsToDelete));

        foreach ($ruangsToDelete as $ruangRemoved) {
            $ruangRemoved->setSekolah(null);
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
                ->filterBySekolah($this)
                ->count($con);
        }

        return count($this->collRuangs);
    }

    /**
     * Method called to associate a Ruang object to this object
     * through the Ruang foreign key attribute.
     *
     * @param    Ruang $l Ruang
     * @return Sekolah The current object (for fluent API support)
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
        $ruang->setSekolah($this);
    }

    /**
     * @param	Ruang $ruang The ruang object to remove.
     * @return Sekolah The current object (for fluent API support)
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
            $ruang->setSekolah(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Sekolah is new, it will return
     * an empty collection; or if this Sekolah has previously
     * been saved, it will retrieve related Ruangs from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Sekolah.
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
     * Otherwise if this Sekolah is new, it will return
     * an empty collection; or if this Sekolah has previously
     * been saved, it will retrieve related Ruangs from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Sekolah.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Ruang[] List of Ruang objects
     */
    public function getRuangsJoinBangunan($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = RuangQuery::create(null, $criteria);
        $query->joinWith('Bangunan', $join_behavior);

        return $this->getRuangs($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Sekolah is new, it will return
     * an empty collection; or if this Sekolah has previously
     * been saved, it will retrieve related Ruangs from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Sekolah.
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
     * Clears out the collSanitasis collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Sekolah The current object (for fluent API support)
     * @see        addSanitasis()
     */
    public function clearSanitasis()
    {
        $this->collSanitasis = null; // important to set this to null since that means it is uninitialized
        $this->collSanitasisPartial = null;

        return $this;
    }

    /**
     * reset is the collSanitasis collection loaded partially
     *
     * @return void
     */
    public function resetPartialSanitasis($v = true)
    {
        $this->collSanitasisPartial = $v;
    }

    /**
     * Initializes the collSanitasis collection.
     *
     * By default this just sets the collSanitasis collection to an empty array (like clearcollSanitasis());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initSanitasis($overrideExisting = true)
    {
        if (null !== $this->collSanitasis && !$overrideExisting) {
            return;
        }
        $this->collSanitasis = new PropelObjectCollection();
        $this->collSanitasis->setModel('Sanitasi');
    }

    /**
     * Gets an array of Sanitasi objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Sekolah is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Sanitasi[] List of Sanitasi objects
     * @throws PropelException
     */
    public function getSanitasis($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collSanitasisPartial && !$this->isNew();
        if (null === $this->collSanitasis || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collSanitasis) {
                // return empty collection
                $this->initSanitasis();
            } else {
                $collSanitasis = SanitasiQuery::create(null, $criteria)
                    ->filterBySekolah($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collSanitasisPartial && count($collSanitasis)) {
                      $this->initSanitasis(false);

                      foreach($collSanitasis as $obj) {
                        if (false == $this->collSanitasis->contains($obj)) {
                          $this->collSanitasis->append($obj);
                        }
                      }

                      $this->collSanitasisPartial = true;
                    }

                    $collSanitasis->getInternalIterator()->rewind();
                    return $collSanitasis;
                }

                if($partial && $this->collSanitasis) {
                    foreach($this->collSanitasis as $obj) {
                        if($obj->isNew()) {
                            $collSanitasis[] = $obj;
                        }
                    }
                }

                $this->collSanitasis = $collSanitasis;
                $this->collSanitasisPartial = false;
            }
        }

        return $this->collSanitasis;
    }

    /**
     * Sets a collection of Sanitasi objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $sanitasis A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Sekolah The current object (for fluent API support)
     */
    public function setSanitasis(PropelCollection $sanitasis, PropelPDO $con = null)
    {
        $sanitasisToDelete = $this->getSanitasis(new Criteria(), $con)->diff($sanitasis);

        $this->sanitasisScheduledForDeletion = unserialize(serialize($sanitasisToDelete));

        foreach ($sanitasisToDelete as $sanitasiRemoved) {
            $sanitasiRemoved->setSekolah(null);
        }

        $this->collSanitasis = null;
        foreach ($sanitasis as $sanitasi) {
            $this->addSanitasi($sanitasi);
        }

        $this->collSanitasis = $sanitasis;
        $this->collSanitasisPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Sanitasi objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Sanitasi objects.
     * @throws PropelException
     */
    public function countSanitasis(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collSanitasisPartial && !$this->isNew();
        if (null === $this->collSanitasis || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collSanitasis) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getSanitasis());
            }
            $query = SanitasiQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterBySekolah($this)
                ->count($con);
        }

        return count($this->collSanitasis);
    }

    /**
     * Method called to associate a Sanitasi object to this object
     * through the Sanitasi foreign key attribute.
     *
     * @param    Sanitasi $l Sanitasi
     * @return Sekolah The current object (for fluent API support)
     */
    public function addSanitasi(Sanitasi $l)
    {
        if ($this->collSanitasis === null) {
            $this->initSanitasis();
            $this->collSanitasisPartial = true;
        }
        if (!in_array($l, $this->collSanitasis->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddSanitasi($l);
        }

        return $this;
    }

    /**
     * @param	Sanitasi $sanitasi The sanitasi object to add.
     */
    protected function doAddSanitasi($sanitasi)
    {
        $this->collSanitasis[]= $sanitasi;
        $sanitasi->setSekolah($this);
    }

    /**
     * @param	Sanitasi $sanitasi The sanitasi object to remove.
     * @return Sekolah The current object (for fluent API support)
     */
    public function removeSanitasi($sanitasi)
    {
        if ($this->getSanitasis()->contains($sanitasi)) {
            $this->collSanitasis->remove($this->collSanitasis->search($sanitasi));
            if (null === $this->sanitasisScheduledForDeletion) {
                $this->sanitasisScheduledForDeletion = clone $this->collSanitasis;
                $this->sanitasisScheduledForDeletion->clear();
            }
            $this->sanitasisScheduledForDeletion[]= clone $sanitasi;
            $sanitasi->setSekolah(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Sekolah is new, it will return
     * an empty collection; or if this Sekolah has previously
     * been saved, it will retrieve related Sanitasis from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Sekolah.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Sanitasi[] List of Sanitasi objects
     */
    public function getSanitasisJoinSemester($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = SanitasiQuery::create(null, $criteria);
        $query->joinWith('Semester', $join_behavior);

        return $this->getSanitasis($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Sekolah is new, it will return
     * an empty collection; or if this Sekolah has previously
     * been saved, it will retrieve related Sanitasis from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Sekolah.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Sanitasi[] List of Sanitasi objects
     */
    public function getSanitasisJoinSumberAirRelatedBySumberAirId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = SanitasiQuery::create(null, $criteria);
        $query->joinWith('SumberAirRelatedBySumberAirId', $join_behavior);

        return $this->getSanitasis($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Sekolah is new, it will return
     * an empty collection; or if this Sekolah has previously
     * been saved, it will retrieve related Sanitasis from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Sekolah.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Sanitasi[] List of Sanitasi objects
     */
    public function getSanitasisJoinSumberAirRelatedBySumberAirMinumId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = SanitasiQuery::create(null, $criteria);
        $query->joinWith('SumberAirRelatedBySumberAirMinumId', $join_behavior);

        return $this->getSanitasis($query, $con);
    }

    /**
     * Clears out the collSasaranPengawasans collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Sekolah The current object (for fluent API support)
     * @see        addSasaranPengawasans()
     */
    public function clearSasaranPengawasans()
    {
        $this->collSasaranPengawasans = null; // important to set this to null since that means it is uninitialized
        $this->collSasaranPengawasansPartial = null;

        return $this;
    }

    /**
     * reset is the collSasaranPengawasans collection loaded partially
     *
     * @return void
     */
    public function resetPartialSasaranPengawasans($v = true)
    {
        $this->collSasaranPengawasansPartial = $v;
    }

    /**
     * Initializes the collSasaranPengawasans collection.
     *
     * By default this just sets the collSasaranPengawasans collection to an empty array (like clearcollSasaranPengawasans());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initSasaranPengawasans($overrideExisting = true)
    {
        if (null !== $this->collSasaranPengawasans && !$overrideExisting) {
            return;
        }
        $this->collSasaranPengawasans = new PropelObjectCollection();
        $this->collSasaranPengawasans->setModel('SasaranPengawasan');
    }

    /**
     * Gets an array of SasaranPengawasan objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Sekolah is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|SasaranPengawasan[] List of SasaranPengawasan objects
     * @throws PropelException
     */
    public function getSasaranPengawasans($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collSasaranPengawasansPartial && !$this->isNew();
        if (null === $this->collSasaranPengawasans || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collSasaranPengawasans) {
                // return empty collection
                $this->initSasaranPengawasans();
            } else {
                $collSasaranPengawasans = SasaranPengawasanQuery::create(null, $criteria)
                    ->filterBySekolah($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collSasaranPengawasansPartial && count($collSasaranPengawasans)) {
                      $this->initSasaranPengawasans(false);

                      foreach($collSasaranPengawasans as $obj) {
                        if (false == $this->collSasaranPengawasans->contains($obj)) {
                          $this->collSasaranPengawasans->append($obj);
                        }
                      }

                      $this->collSasaranPengawasansPartial = true;
                    }

                    $collSasaranPengawasans->getInternalIterator()->rewind();
                    return $collSasaranPengawasans;
                }

                if($partial && $this->collSasaranPengawasans) {
                    foreach($this->collSasaranPengawasans as $obj) {
                        if($obj->isNew()) {
                            $collSasaranPengawasans[] = $obj;
                        }
                    }
                }

                $this->collSasaranPengawasans = $collSasaranPengawasans;
                $this->collSasaranPengawasansPartial = false;
            }
        }

        return $this->collSasaranPengawasans;
    }

    /**
     * Sets a collection of SasaranPengawasan objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $sasaranPengawasans A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Sekolah The current object (for fluent API support)
     */
    public function setSasaranPengawasans(PropelCollection $sasaranPengawasans, PropelPDO $con = null)
    {
        $sasaranPengawasansToDelete = $this->getSasaranPengawasans(new Criteria(), $con)->diff($sasaranPengawasans);

        $this->sasaranPengawasansScheduledForDeletion = unserialize(serialize($sasaranPengawasansToDelete));

        foreach ($sasaranPengawasansToDelete as $sasaranPengawasanRemoved) {
            $sasaranPengawasanRemoved->setSekolah(null);
        }

        $this->collSasaranPengawasans = null;
        foreach ($sasaranPengawasans as $sasaranPengawasan) {
            $this->addSasaranPengawasan($sasaranPengawasan);
        }

        $this->collSasaranPengawasans = $sasaranPengawasans;
        $this->collSasaranPengawasansPartial = false;

        return $this;
    }

    /**
     * Returns the number of related SasaranPengawasan objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related SasaranPengawasan objects.
     * @throws PropelException
     */
    public function countSasaranPengawasans(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collSasaranPengawasansPartial && !$this->isNew();
        if (null === $this->collSasaranPengawasans || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collSasaranPengawasans) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getSasaranPengawasans());
            }
            $query = SasaranPengawasanQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterBySekolah($this)
                ->count($con);
        }

        return count($this->collSasaranPengawasans);
    }

    /**
     * Method called to associate a SasaranPengawasan object to this object
     * through the SasaranPengawasan foreign key attribute.
     *
     * @param    SasaranPengawasan $l SasaranPengawasan
     * @return Sekolah The current object (for fluent API support)
     */
    public function addSasaranPengawasan(SasaranPengawasan $l)
    {
        if ($this->collSasaranPengawasans === null) {
            $this->initSasaranPengawasans();
            $this->collSasaranPengawasansPartial = true;
        }
        if (!in_array($l, $this->collSasaranPengawasans->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddSasaranPengawasan($l);
        }

        return $this;
    }

    /**
     * @param	SasaranPengawasan $sasaranPengawasan The sasaranPengawasan object to add.
     */
    protected function doAddSasaranPengawasan($sasaranPengawasan)
    {
        $this->collSasaranPengawasans[]= $sasaranPengawasan;
        $sasaranPengawasan->setSekolah($this);
    }

    /**
     * @param	SasaranPengawasan $sasaranPengawasan The sasaranPengawasan object to remove.
     * @return Sekolah The current object (for fluent API support)
     */
    public function removeSasaranPengawasan($sasaranPengawasan)
    {
        if ($this->getSasaranPengawasans()->contains($sasaranPengawasan)) {
            $this->collSasaranPengawasans->remove($this->collSasaranPengawasans->search($sasaranPengawasan));
            if (null === $this->sasaranPengawasansScheduledForDeletion) {
                $this->sasaranPengawasansScheduledForDeletion = clone $this->collSasaranPengawasans;
                $this->sasaranPengawasansScheduledForDeletion->clear();
            }
            $this->sasaranPengawasansScheduledForDeletion[]= clone $sasaranPengawasan;
            $sasaranPengawasan->setSekolah(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Sekolah is new, it will return
     * an empty collection; or if this Sekolah has previously
     * been saved, it will retrieve related SasaranPengawasans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Sekolah.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|SasaranPengawasan[] List of SasaranPengawasan objects
     */
    public function getSasaranPengawasansJoinPengawasTerdaftar($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = SasaranPengawasanQuery::create(null, $criteria);
        $query->joinWith('PengawasTerdaftar', $join_behavior);

        return $this->getSasaranPengawasans($query, $con);
    }

    /**
     * Clears out the collSekolahLongitudinals collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Sekolah The current object (for fluent API support)
     * @see        addSekolahLongitudinals()
     */
    public function clearSekolahLongitudinals()
    {
        $this->collSekolahLongitudinals = null; // important to set this to null since that means it is uninitialized
        $this->collSekolahLongitudinalsPartial = null;

        return $this;
    }

    /**
     * reset is the collSekolahLongitudinals collection loaded partially
     *
     * @return void
     */
    public function resetPartialSekolahLongitudinals($v = true)
    {
        $this->collSekolahLongitudinalsPartial = $v;
    }

    /**
     * Initializes the collSekolahLongitudinals collection.
     *
     * By default this just sets the collSekolahLongitudinals collection to an empty array (like clearcollSekolahLongitudinals());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initSekolahLongitudinals($overrideExisting = true)
    {
        if (null !== $this->collSekolahLongitudinals && !$overrideExisting) {
            return;
        }
        $this->collSekolahLongitudinals = new PropelObjectCollection();
        $this->collSekolahLongitudinals->setModel('SekolahLongitudinal');
    }

    /**
     * Gets an array of SekolahLongitudinal objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Sekolah is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|SekolahLongitudinal[] List of SekolahLongitudinal objects
     * @throws PropelException
     */
    public function getSekolahLongitudinals($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collSekolahLongitudinalsPartial && !$this->isNew();
        if (null === $this->collSekolahLongitudinals || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collSekolahLongitudinals) {
                // return empty collection
                $this->initSekolahLongitudinals();
            } else {
                $collSekolahLongitudinals = SekolahLongitudinalQuery::create(null, $criteria)
                    ->filterBySekolah($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collSekolahLongitudinalsPartial && count($collSekolahLongitudinals)) {
                      $this->initSekolahLongitudinals(false);

                      foreach($collSekolahLongitudinals as $obj) {
                        if (false == $this->collSekolahLongitudinals->contains($obj)) {
                          $this->collSekolahLongitudinals->append($obj);
                        }
                      }

                      $this->collSekolahLongitudinalsPartial = true;
                    }

                    $collSekolahLongitudinals->getInternalIterator()->rewind();
                    return $collSekolahLongitudinals;
                }

                if($partial && $this->collSekolahLongitudinals) {
                    foreach($this->collSekolahLongitudinals as $obj) {
                        if($obj->isNew()) {
                            $collSekolahLongitudinals[] = $obj;
                        }
                    }
                }

                $this->collSekolahLongitudinals = $collSekolahLongitudinals;
                $this->collSekolahLongitudinalsPartial = false;
            }
        }

        return $this->collSekolahLongitudinals;
    }

    /**
     * Sets a collection of SekolahLongitudinal objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $sekolahLongitudinals A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Sekolah The current object (for fluent API support)
     */
    public function setSekolahLongitudinals(PropelCollection $sekolahLongitudinals, PropelPDO $con = null)
    {
        $sekolahLongitudinalsToDelete = $this->getSekolahLongitudinals(new Criteria(), $con)->diff($sekolahLongitudinals);

        $this->sekolahLongitudinalsScheduledForDeletion = unserialize(serialize($sekolahLongitudinalsToDelete));

        foreach ($sekolahLongitudinalsToDelete as $sekolahLongitudinalRemoved) {
            $sekolahLongitudinalRemoved->setSekolah(null);
        }

        $this->collSekolahLongitudinals = null;
        foreach ($sekolahLongitudinals as $sekolahLongitudinal) {
            $this->addSekolahLongitudinal($sekolahLongitudinal);
        }

        $this->collSekolahLongitudinals = $sekolahLongitudinals;
        $this->collSekolahLongitudinalsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related SekolahLongitudinal objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related SekolahLongitudinal objects.
     * @throws PropelException
     */
    public function countSekolahLongitudinals(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collSekolahLongitudinalsPartial && !$this->isNew();
        if (null === $this->collSekolahLongitudinals || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collSekolahLongitudinals) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getSekolahLongitudinals());
            }
            $query = SekolahLongitudinalQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterBySekolah($this)
                ->count($con);
        }

        return count($this->collSekolahLongitudinals);
    }

    /**
     * Method called to associate a SekolahLongitudinal object to this object
     * through the SekolahLongitudinal foreign key attribute.
     *
     * @param    SekolahLongitudinal $l SekolahLongitudinal
     * @return Sekolah The current object (for fluent API support)
     */
    public function addSekolahLongitudinal(SekolahLongitudinal $l)
    {
        if ($this->collSekolahLongitudinals === null) {
            $this->initSekolahLongitudinals();
            $this->collSekolahLongitudinalsPartial = true;
        }
        if (!in_array($l, $this->collSekolahLongitudinals->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddSekolahLongitudinal($l);
        }

        return $this;
    }

    /**
     * @param	SekolahLongitudinal $sekolahLongitudinal The sekolahLongitudinal object to add.
     */
    protected function doAddSekolahLongitudinal($sekolahLongitudinal)
    {
        $this->collSekolahLongitudinals[]= $sekolahLongitudinal;
        $sekolahLongitudinal->setSekolah($this);
    }

    /**
     * @param	SekolahLongitudinal $sekolahLongitudinal The sekolahLongitudinal object to remove.
     * @return Sekolah The current object (for fluent API support)
     */
    public function removeSekolahLongitudinal($sekolahLongitudinal)
    {
        if ($this->getSekolahLongitudinals()->contains($sekolahLongitudinal)) {
            $this->collSekolahLongitudinals->remove($this->collSekolahLongitudinals->search($sekolahLongitudinal));
            if (null === $this->sekolahLongitudinalsScheduledForDeletion) {
                $this->sekolahLongitudinalsScheduledForDeletion = clone $this->collSekolahLongitudinals;
                $this->sekolahLongitudinalsScheduledForDeletion->clear();
            }
            $this->sekolahLongitudinalsScheduledForDeletion[]= clone $sekolahLongitudinal;
            $sekolahLongitudinal->setSekolah(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Sekolah is new, it will return
     * an empty collection; or if this Sekolah has previously
     * been saved, it will retrieve related SekolahLongitudinals from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Sekolah.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|SekolahLongitudinal[] List of SekolahLongitudinal objects
     */
    public function getSekolahLongitudinalsJoinLargeObject($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = SekolahLongitudinalQuery::create(null, $criteria);
        $query->joinWith('LargeObject', $join_behavior);

        return $this->getSekolahLongitudinals($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Sekolah is new, it will return
     * an empty collection; or if this Sekolah has previously
     * been saved, it will retrieve related SekolahLongitudinals from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Sekolah.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|SekolahLongitudinal[] List of SekolahLongitudinal objects
     */
    public function getSekolahLongitudinalsJoinSertifikasiIso($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = SekolahLongitudinalQuery::create(null, $criteria);
        $query->joinWith('SertifikasiIso', $join_behavior);

        return $this->getSekolahLongitudinals($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Sekolah is new, it will return
     * an empty collection; or if this Sekolah has previously
     * been saved, it will retrieve related SekolahLongitudinals from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Sekolah.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|SekolahLongitudinal[] List of SekolahLongitudinal objects
     */
    public function getSekolahLongitudinalsJoinSemester($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = SekolahLongitudinalQuery::create(null, $criteria);
        $query->joinWith('Semester', $join_behavior);

        return $this->getSekolahLongitudinals($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Sekolah is new, it will return
     * an empty collection; or if this Sekolah has previously
     * been saved, it will retrieve related SekolahLongitudinals from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Sekolah.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|SekolahLongitudinal[] List of SekolahLongitudinal objects
     */
    public function getSekolahLongitudinalsJoinSumberListrik($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = SekolahLongitudinalQuery::create(null, $criteria);
        $query->joinWith('SumberListrik', $join_behavior);

        return $this->getSekolahLongitudinals($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Sekolah is new, it will return
     * an empty collection; or if this Sekolah has previously
     * been saved, it will retrieve related SekolahLongitudinals from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Sekolah.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|SekolahLongitudinal[] List of SekolahLongitudinal objects
     */
    public function getSekolahLongitudinalsJoinWaktuPenyelenggaraan($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = SekolahLongitudinalQuery::create(null, $criteria);
        $query->joinWith('WaktuPenyelenggaraan', $join_behavior);

        return $this->getSekolahLongitudinals($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Sekolah is new, it will return
     * an empty collection; or if this Sekolah has previously
     * been saved, it will retrieve related SekolahLongitudinals from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Sekolah.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|SekolahLongitudinal[] List of SekolahLongitudinal objects
     */
    public function getSekolahLongitudinalsJoinAksesInternetRelatedByAksesInternetId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = SekolahLongitudinalQuery::create(null, $criteria);
        $query->joinWith('AksesInternetRelatedByAksesInternetId', $join_behavior);

        return $this->getSekolahLongitudinals($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Sekolah is new, it will return
     * an empty collection; or if this Sekolah has previously
     * been saved, it will retrieve related SekolahLongitudinals from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Sekolah.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|SekolahLongitudinal[] List of SekolahLongitudinal objects
     */
    public function getSekolahLongitudinalsJoinAksesInternetRelatedByAksesInternet2Id($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = SekolahLongitudinalQuery::create(null, $criteria);
        $query->joinWith('AksesInternetRelatedByAksesInternet2Id', $join_behavior);

        return $this->getSekolahLongitudinals($query, $con);
    }

    /**
     * Gets a single SekolahPaud object, which is related to this object by a one-to-one relationship.
     *
     * @param PropelPDO $con optional connection object
     * @return SekolahPaud
     * @throws PropelException
     */
    public function getSekolahPaud(PropelPDO $con = null)
    {

        if ($this->singleSekolahPaud === null && !$this->isNew()) {
            $this->singleSekolahPaud = SekolahPaudQuery::create()->findPk($this->getPrimaryKey(), $con);
        }

        return $this->singleSekolahPaud;
    }

    /**
     * Sets a single SekolahPaud object as related to this object by a one-to-one relationship.
     *
     * @param             SekolahPaud $v SekolahPaud
     * @return Sekolah The current object (for fluent API support)
     * @throws PropelException
     */
    public function setSekolahPaud(SekolahPaud $v = null)
    {
        $this->singleSekolahPaud = $v;

        // Make sure that that the passed-in SekolahPaud isn't already associated with this object
        if ($v !== null && $v->getSekolah(null, false) === null) {
            $v->setSekolah($this);
        }

        return $this;
    }

    /**
     * Clears out the collTanahs collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Sekolah The current object (for fluent API support)
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
     * If this Sekolah is new, it will return
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
                    ->filterBySekolah($this)
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
     * @return Sekolah The current object (for fluent API support)
     */
    public function setTanahs(PropelCollection $tanahs, PropelPDO $con = null)
    {
        $tanahsToDelete = $this->getTanahs(new Criteria(), $con)->diff($tanahs);

        $this->tanahsScheduledForDeletion = unserialize(serialize($tanahsToDelete));

        foreach ($tanahsToDelete as $tanahRemoved) {
            $tanahRemoved->setSekolah(null);
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
                ->filterBySekolah($this)
                ->count($con);
        }

        return count($this->collTanahs);
    }

    /**
     * Method called to associate a Tanah object to this object
     * through the Tanah foreign key attribute.
     *
     * @param    Tanah $l Tanah
     * @return Sekolah The current object (for fluent API support)
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
        $tanah->setSekolah($this);
    }

    /**
     * @param	Tanah $tanah The tanah object to remove.
     * @return Sekolah The current object (for fluent API support)
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
            $tanah->setSekolah(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Sekolah is new, it will return
     * an empty collection; or if this Sekolah has previously
     * been saved, it will retrieve related Tanahs from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Sekolah.
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
     * Otherwise if this Sekolah is new, it will return
     * an empty collection; or if this Sekolah has previously
     * been saved, it will retrieve related Tanahs from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Sekolah.
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
     * Otherwise if this Sekolah is new, it will return
     * an empty collection; or if this Sekolah has previously
     * been saved, it will retrieve related Tanahs from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Sekolah.
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
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Sekolah is new, it will return
     * an empty collection; or if this Sekolah has previously
     * been saved, it will retrieve related Tanahs from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Sekolah.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Tanah[] List of Tanah objects
     */
    public function getTanahsJoinMstWilayah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TanahQuery::create(null, $criteria);
        $query->joinWith('MstWilayah', $join_behavior);

        return $this->getTanahs($query, $con);
    }

    /**
     * Clears out the collTugasTambahans collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Sekolah The current object (for fluent API support)
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
     * If this Sekolah is new, it will return
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
                    ->filterBySekolah($this)
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
     * @return Sekolah The current object (for fluent API support)
     */
    public function setTugasTambahans(PropelCollection $tugasTambahans, PropelPDO $con = null)
    {
        $tugasTambahansToDelete = $this->getTugasTambahans(new Criteria(), $con)->diff($tugasTambahans);

        $this->tugasTambahansScheduledForDeletion = unserialize(serialize($tugasTambahansToDelete));

        foreach ($tugasTambahansToDelete as $tugasTambahanRemoved) {
            $tugasTambahanRemoved->setSekolah(null);
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
                ->filterBySekolah($this)
                ->count($con);
        }

        return count($this->collTugasTambahans);
    }

    /**
     * Method called to associate a TugasTambahan object to this object
     * through the TugasTambahan foreign key attribute.
     *
     * @param    TugasTambahan $l TugasTambahan
     * @return Sekolah The current object (for fluent API support)
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
        $tugasTambahan->setSekolah($this);
    }

    /**
     * @param	TugasTambahan $tugasTambahan The tugasTambahan object to remove.
     * @return Sekolah The current object (for fluent API support)
     */
    public function removeTugasTambahan($tugasTambahan)
    {
        if ($this->getTugasTambahans()->contains($tugasTambahan)) {
            $this->collTugasTambahans->remove($this->collTugasTambahans->search($tugasTambahan));
            if (null === $this->tugasTambahansScheduledForDeletion) {
                $this->tugasTambahansScheduledForDeletion = clone $this->collTugasTambahans;
                $this->tugasTambahansScheduledForDeletion->clear();
            }
            $this->tugasTambahansScheduledForDeletion[]= clone $tugasTambahan;
            $tugasTambahan->setSekolah(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Sekolah is new, it will return
     * an empty collection; or if this Sekolah has previously
     * been saved, it will retrieve related TugasTambahans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Sekolah.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|TugasTambahan[] List of TugasTambahan objects
     */
    public function getTugasTambahansJoinRuang($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TugasTambahanQuery::create(null, $criteria);
        $query->joinWith('Ruang', $join_behavior);

        return $this->getTugasTambahans($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Sekolah is new, it will return
     * an empty collection; or if this Sekolah has previously
     * been saved, it will retrieve related TugasTambahans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Sekolah.
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
     * Otherwise if this Sekolah is new, it will return
     * an empty collection; or if this Sekolah has previously
     * been saved, it will retrieve related TugasTambahans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Sekolah.
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
     * Clears out the collUnitUsahas collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Sekolah The current object (for fluent API support)
     * @see        addUnitUsahas()
     */
    public function clearUnitUsahas()
    {
        $this->collUnitUsahas = null; // important to set this to null since that means it is uninitialized
        $this->collUnitUsahasPartial = null;

        return $this;
    }

    /**
     * reset is the collUnitUsahas collection loaded partially
     *
     * @return void
     */
    public function resetPartialUnitUsahas($v = true)
    {
        $this->collUnitUsahasPartial = $v;
    }

    /**
     * Initializes the collUnitUsahas collection.
     *
     * By default this just sets the collUnitUsahas collection to an empty array (like clearcollUnitUsahas());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initUnitUsahas($overrideExisting = true)
    {
        if (null !== $this->collUnitUsahas && !$overrideExisting) {
            return;
        }
        $this->collUnitUsahas = new PropelObjectCollection();
        $this->collUnitUsahas->setModel('UnitUsaha');
    }

    /**
     * Gets an array of UnitUsaha objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Sekolah is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|UnitUsaha[] List of UnitUsaha objects
     * @throws PropelException
     */
    public function getUnitUsahas($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collUnitUsahasPartial && !$this->isNew();
        if (null === $this->collUnitUsahas || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collUnitUsahas) {
                // return empty collection
                $this->initUnitUsahas();
            } else {
                $collUnitUsahas = UnitUsahaQuery::create(null, $criteria)
                    ->filterBySekolah($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collUnitUsahasPartial && count($collUnitUsahas)) {
                      $this->initUnitUsahas(false);

                      foreach($collUnitUsahas as $obj) {
                        if (false == $this->collUnitUsahas->contains($obj)) {
                          $this->collUnitUsahas->append($obj);
                        }
                      }

                      $this->collUnitUsahasPartial = true;
                    }

                    $collUnitUsahas->getInternalIterator()->rewind();
                    return $collUnitUsahas;
                }

                if($partial && $this->collUnitUsahas) {
                    foreach($this->collUnitUsahas as $obj) {
                        if($obj->isNew()) {
                            $collUnitUsahas[] = $obj;
                        }
                    }
                }

                $this->collUnitUsahas = $collUnitUsahas;
                $this->collUnitUsahasPartial = false;
            }
        }

        return $this->collUnitUsahas;
    }

    /**
     * Sets a collection of UnitUsaha objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $unitUsahas A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Sekolah The current object (for fluent API support)
     */
    public function setUnitUsahas(PropelCollection $unitUsahas, PropelPDO $con = null)
    {
        $unitUsahasToDelete = $this->getUnitUsahas(new Criteria(), $con)->diff($unitUsahas);

        $this->unitUsahasScheduledForDeletion = unserialize(serialize($unitUsahasToDelete));

        foreach ($unitUsahasToDelete as $unitUsahaRemoved) {
            $unitUsahaRemoved->setSekolah(null);
        }

        $this->collUnitUsahas = null;
        foreach ($unitUsahas as $unitUsaha) {
            $this->addUnitUsaha($unitUsaha);
        }

        $this->collUnitUsahas = $unitUsahas;
        $this->collUnitUsahasPartial = false;

        return $this;
    }

    /**
     * Returns the number of related UnitUsaha objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related UnitUsaha objects.
     * @throws PropelException
     */
    public function countUnitUsahas(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collUnitUsahasPartial && !$this->isNew();
        if (null === $this->collUnitUsahas || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collUnitUsahas) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getUnitUsahas());
            }
            $query = UnitUsahaQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterBySekolah($this)
                ->count($con);
        }

        return count($this->collUnitUsahas);
    }

    /**
     * Method called to associate a UnitUsaha object to this object
     * through the UnitUsaha foreign key attribute.
     *
     * @param    UnitUsaha $l UnitUsaha
     * @return Sekolah The current object (for fluent API support)
     */
    public function addUnitUsaha(UnitUsaha $l)
    {
        if ($this->collUnitUsahas === null) {
            $this->initUnitUsahas();
            $this->collUnitUsahasPartial = true;
        }
        if (!in_array($l, $this->collUnitUsahas->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddUnitUsaha($l);
        }

        return $this;
    }

    /**
     * @param	UnitUsaha $unitUsaha The unitUsaha object to add.
     */
    protected function doAddUnitUsaha($unitUsaha)
    {
        $this->collUnitUsahas[]= $unitUsaha;
        $unitUsaha->setSekolah($this);
    }

    /**
     * @param	UnitUsaha $unitUsaha The unitUsaha object to remove.
     * @return Sekolah The current object (for fluent API support)
     */
    public function removeUnitUsaha($unitUsaha)
    {
        if ($this->getUnitUsahas()->contains($unitUsaha)) {
            $this->collUnitUsahas->remove($this->collUnitUsahas->search($unitUsaha));
            if (null === $this->unitUsahasScheduledForDeletion) {
                $this->unitUsahasScheduledForDeletion = clone $this->collUnitUsahas;
                $this->unitUsahasScheduledForDeletion->clear();
            }
            $this->unitUsahasScheduledForDeletion[]= clone $unitUsaha;
            $unitUsaha->setSekolah(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Sekolah is new, it will return
     * an empty collection; or if this Sekolah has previously
     * been saved, it will retrieve related UnitUsahas from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Sekolah.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|UnitUsaha[] List of UnitUsaha objects
     */
    public function getUnitUsahasJoinKelompokUsaha($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = UnitUsahaQuery::create(null, $criteria);
        $query->joinWith('KelompokUsaha', $join_behavior);

        return $this->getUnitUsahas($query, $con);
    }

    /**
     * Clears out the collVldSekolahs collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Sekolah The current object (for fluent API support)
     * @see        addVldSekolahs()
     */
    public function clearVldSekolahs()
    {
        $this->collVldSekolahs = null; // important to set this to null since that means it is uninitialized
        $this->collVldSekolahsPartial = null;

        return $this;
    }

    /**
     * reset is the collVldSekolahs collection loaded partially
     *
     * @return void
     */
    public function resetPartialVldSekolahs($v = true)
    {
        $this->collVldSekolahsPartial = $v;
    }

    /**
     * Initializes the collVldSekolahs collection.
     *
     * By default this just sets the collVldSekolahs collection to an empty array (like clearcollVldSekolahs());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initVldSekolahs($overrideExisting = true)
    {
        if (null !== $this->collVldSekolahs && !$overrideExisting) {
            return;
        }
        $this->collVldSekolahs = new PropelObjectCollection();
        $this->collVldSekolahs->setModel('VldSekolah');
    }

    /**
     * Gets an array of VldSekolah objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Sekolah is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|VldSekolah[] List of VldSekolah objects
     * @throws PropelException
     */
    public function getVldSekolahs($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collVldSekolahsPartial && !$this->isNew();
        if (null === $this->collVldSekolahs || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collVldSekolahs) {
                // return empty collection
                $this->initVldSekolahs();
            } else {
                $collVldSekolahs = VldSekolahQuery::create(null, $criteria)
                    ->filterBySekolah($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collVldSekolahsPartial && count($collVldSekolahs)) {
                      $this->initVldSekolahs(false);

                      foreach($collVldSekolahs as $obj) {
                        if (false == $this->collVldSekolahs->contains($obj)) {
                          $this->collVldSekolahs->append($obj);
                        }
                      }

                      $this->collVldSekolahsPartial = true;
                    }

                    $collVldSekolahs->getInternalIterator()->rewind();
                    return $collVldSekolahs;
                }

                if($partial && $this->collVldSekolahs) {
                    foreach($this->collVldSekolahs as $obj) {
                        if($obj->isNew()) {
                            $collVldSekolahs[] = $obj;
                        }
                    }
                }

                $this->collVldSekolahs = $collVldSekolahs;
                $this->collVldSekolahsPartial = false;
            }
        }

        return $this->collVldSekolahs;
    }

    /**
     * Sets a collection of VldSekolah objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $vldSekolahs A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Sekolah The current object (for fluent API support)
     */
    public function setVldSekolahs(PropelCollection $vldSekolahs, PropelPDO $con = null)
    {
        $vldSekolahsToDelete = $this->getVldSekolahs(new Criteria(), $con)->diff($vldSekolahs);

        $this->vldSekolahsScheduledForDeletion = unserialize(serialize($vldSekolahsToDelete));

        foreach ($vldSekolahsToDelete as $vldSekolahRemoved) {
            $vldSekolahRemoved->setSekolah(null);
        }

        $this->collVldSekolahs = null;
        foreach ($vldSekolahs as $vldSekolah) {
            $this->addVldSekolah($vldSekolah);
        }

        $this->collVldSekolahs = $vldSekolahs;
        $this->collVldSekolahsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related VldSekolah objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related VldSekolah objects.
     * @throws PropelException
     */
    public function countVldSekolahs(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collVldSekolahsPartial && !$this->isNew();
        if (null === $this->collVldSekolahs || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collVldSekolahs) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getVldSekolahs());
            }
            $query = VldSekolahQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterBySekolah($this)
                ->count($con);
        }

        return count($this->collVldSekolahs);
    }

    /**
     * Method called to associate a VldSekolah object to this object
     * through the VldSekolah foreign key attribute.
     *
     * @param    VldSekolah $l VldSekolah
     * @return Sekolah The current object (for fluent API support)
     */
    public function addVldSekolah(VldSekolah $l)
    {
        if ($this->collVldSekolahs === null) {
            $this->initVldSekolahs();
            $this->collVldSekolahsPartial = true;
        }
        if (!in_array($l, $this->collVldSekolahs->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddVldSekolah($l);
        }

        return $this;
    }

    /**
     * @param	VldSekolah $vldSekolah The vldSekolah object to add.
     */
    protected function doAddVldSekolah($vldSekolah)
    {
        $this->collVldSekolahs[]= $vldSekolah;
        $vldSekolah->setSekolah($this);
    }

    /**
     * @param	VldSekolah $vldSekolah The vldSekolah object to remove.
     * @return Sekolah The current object (for fluent API support)
     */
    public function removeVldSekolah($vldSekolah)
    {
        if ($this->getVldSekolahs()->contains($vldSekolah)) {
            $this->collVldSekolahs->remove($this->collVldSekolahs->search($vldSekolah));
            if (null === $this->vldSekolahsScheduledForDeletion) {
                $this->vldSekolahsScheduledForDeletion = clone $this->collVldSekolahs;
                $this->vldSekolahsScheduledForDeletion->clear();
            }
            $this->vldSekolahsScheduledForDeletion[]= clone $vldSekolah;
            $vldSekolah->setSekolah(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Sekolah is new, it will return
     * an empty collection; or if this Sekolah has previously
     * been saved, it will retrieve related VldSekolahs from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Sekolah.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|VldSekolah[] List of VldSekolah objects
     */
    public function getVldSekolahsJoinErrortype($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = VldSekolahQuery::create(null, $criteria);
        $query->joinWith('Errortype', $join_behavior);

        return $this->getVldSekolahs($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->sekolah_id = null;
        $this->nama = null;
        $this->nama_nomenklatur = null;
        $this->nss = null;
        $this->npsn = null;
        $this->bentuk_pendidikan_id = null;
        $this->alamat_jalan = null;
        $this->rt = null;
        $this->rw = null;
        $this->nama_dusun = null;
        $this->desa_kelurahan = null;
        $this->kode_wilayah = null;
        $this->kode_pos = null;
        $this->lintang = null;
        $this->bujur = null;
        $this->nomor_telepon = null;
        $this->nomor_fax = null;
        $this->email = null;
        $this->website = null;
        $this->kebutuhan_khusus_id = null;
        $this->status_sekolah = null;
        $this->sk_pendirian_sekolah = null;
        $this->tanggal_sk_pendirian = null;
        $this->status_kepemilikan_id = null;
        $this->yayasan_id = null;
        $this->sk_izin_operasional = null;
        $this->tanggal_sk_izin_operasional = null;
        $this->no_rekening = null;
        $this->nama_bank = null;
        $this->cabang_kcp_unit = null;
        $this->rekening_atas_nama = null;
        $this->mbs = null;
        $this->luas_tanah_milik = null;
        $this->luas_tanah_bukan_milik = null;
        $this->kode_registrasi = null;
        $this->npwp = null;
        $this->nm_wp = null;
        $this->keaktifan = null;
        $this->flag = null;
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
            if ($this->collAkreditasiSps) {
                foreach ($this->collAkreditasiSps as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collAlats) {
                foreach ($this->collAlats as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collAnggotaGuguses) {
                foreach ($this->collAnggotaGuguses as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collAngkutans) {
                foreach ($this->collAngkutans as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collBangunans) {
                foreach ($this->collBangunans as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collBlockgrants) {
                foreach ($this->collBlockgrants as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collBukus) {
                foreach ($this->collBukus as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collDataDynamics) {
                foreach ($this->collDataDynamics as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collGugusSekolahs) {
                foreach ($this->collGugusSekolahs as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collInstalasis) {
                foreach ($this->collInstalasis as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collIzinOperasionals) {
                foreach ($this->collIzinOperasionals as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collJurusanSps) {
                foreach ($this->collJurusanSps as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collKepanitiaans) {
                foreach ($this->collKepanitiaans as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collLayananKhususes) {
                foreach ($this->collLayananKhususes as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collMous) {
                foreach ($this->collMous as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collPesertaDidikBarus) {
                foreach ($this->collPesertaDidikBarus as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collProgramInklusis) {
                foreach ($this->collProgramInklusis as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collPtkBarus) {
                foreach ($this->collPtkBarus as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collPtkTerdaftars) {
                foreach ($this->collPtkTerdaftars as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collRegistrasiPesertaDidiks) {
                foreach ($this->collRegistrasiPesertaDidiks as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collRombonganBelajars) {
                foreach ($this->collRombonganBelajars as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collRuangs) {
                foreach ($this->collRuangs as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collSanitasis) {
                foreach ($this->collSanitasis as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collSasaranPengawasans) {
                foreach ($this->collSasaranPengawasans as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collSekolahLongitudinals) {
                foreach ($this->collSekolahLongitudinals as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->singleSekolahPaud) {
                $this->singleSekolahPaud->clearAllReferences($deep);
            }
            if ($this->collTanahs) {
                foreach ($this->collTanahs as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collTugasTambahans) {
                foreach ($this->collTugasTambahans as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collUnitUsahas) {
                foreach ($this->collUnitUsahas as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collVldSekolahs) {
                foreach ($this->collVldSekolahs as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aMstWilayah instanceof Persistent) {
              $this->aMstWilayah->clearAllReferences($deep);
            }
            if ($this->aKebutuhanKhusus instanceof Persistent) {
              $this->aKebutuhanKhusus->clearAllReferences($deep);
            }
            if ($this->aBentukPendidikan instanceof Persistent) {
              $this->aBentukPendidikan->clearAllReferences($deep);
            }
            if ($this->aYayasan instanceof Persistent) {
              $this->aYayasan->clearAllReferences($deep);
            }
            if ($this->aStatusKepemilikan instanceof Persistent) {
              $this->aStatusKepemilikan->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collAkreditasiSps instanceof PropelCollection) {
            $this->collAkreditasiSps->clearIterator();
        }
        $this->collAkreditasiSps = null;
        if ($this->collAlats instanceof PropelCollection) {
            $this->collAlats->clearIterator();
        }
        $this->collAlats = null;
        if ($this->collAnggotaGuguses instanceof PropelCollection) {
            $this->collAnggotaGuguses->clearIterator();
        }
        $this->collAnggotaGuguses = null;
        if ($this->collAngkutans instanceof PropelCollection) {
            $this->collAngkutans->clearIterator();
        }
        $this->collAngkutans = null;
        if ($this->collBangunans instanceof PropelCollection) {
            $this->collBangunans->clearIterator();
        }
        $this->collBangunans = null;
        if ($this->collBlockgrants instanceof PropelCollection) {
            $this->collBlockgrants->clearIterator();
        }
        $this->collBlockgrants = null;
        if ($this->collBukus instanceof PropelCollection) {
            $this->collBukus->clearIterator();
        }
        $this->collBukus = null;
        if ($this->collDataDynamics instanceof PropelCollection) {
            $this->collDataDynamics->clearIterator();
        }
        $this->collDataDynamics = null;
        if ($this->collGugusSekolahs instanceof PropelCollection) {
            $this->collGugusSekolahs->clearIterator();
        }
        $this->collGugusSekolahs = null;
        if ($this->collInstalasis instanceof PropelCollection) {
            $this->collInstalasis->clearIterator();
        }
        $this->collInstalasis = null;
        if ($this->collIzinOperasionals instanceof PropelCollection) {
            $this->collIzinOperasionals->clearIterator();
        }
        $this->collIzinOperasionals = null;
        if ($this->collJurusanSps instanceof PropelCollection) {
            $this->collJurusanSps->clearIterator();
        }
        $this->collJurusanSps = null;
        if ($this->collKepanitiaans instanceof PropelCollection) {
            $this->collKepanitiaans->clearIterator();
        }
        $this->collKepanitiaans = null;
        if ($this->collLayananKhususes instanceof PropelCollection) {
            $this->collLayananKhususes->clearIterator();
        }
        $this->collLayananKhususes = null;
        if ($this->collMous instanceof PropelCollection) {
            $this->collMous->clearIterator();
        }
        $this->collMous = null;
        if ($this->collPesertaDidikBarus instanceof PropelCollection) {
            $this->collPesertaDidikBarus->clearIterator();
        }
        $this->collPesertaDidikBarus = null;
        if ($this->collProgramInklusis instanceof PropelCollection) {
            $this->collProgramInklusis->clearIterator();
        }
        $this->collProgramInklusis = null;
        if ($this->collPtkBarus instanceof PropelCollection) {
            $this->collPtkBarus->clearIterator();
        }
        $this->collPtkBarus = null;
        if ($this->collPtkTerdaftars instanceof PropelCollection) {
            $this->collPtkTerdaftars->clearIterator();
        }
        $this->collPtkTerdaftars = null;
        if ($this->collRegistrasiPesertaDidiks instanceof PropelCollection) {
            $this->collRegistrasiPesertaDidiks->clearIterator();
        }
        $this->collRegistrasiPesertaDidiks = null;
        if ($this->collRombonganBelajars instanceof PropelCollection) {
            $this->collRombonganBelajars->clearIterator();
        }
        $this->collRombonganBelajars = null;
        if ($this->collRuangs instanceof PropelCollection) {
            $this->collRuangs->clearIterator();
        }
        $this->collRuangs = null;
        if ($this->collSanitasis instanceof PropelCollection) {
            $this->collSanitasis->clearIterator();
        }
        $this->collSanitasis = null;
        if ($this->collSasaranPengawasans instanceof PropelCollection) {
            $this->collSasaranPengawasans->clearIterator();
        }
        $this->collSasaranPengawasans = null;
        if ($this->collSekolahLongitudinals instanceof PropelCollection) {
            $this->collSekolahLongitudinals->clearIterator();
        }
        $this->collSekolahLongitudinals = null;
        if ($this->singleSekolahPaud instanceof PropelCollection) {
            $this->singleSekolahPaud->clearIterator();
        }
        $this->singleSekolahPaud = null;
        if ($this->collTanahs instanceof PropelCollection) {
            $this->collTanahs->clearIterator();
        }
        $this->collTanahs = null;
        if ($this->collTugasTambahans instanceof PropelCollection) {
            $this->collTugasTambahans->clearIterator();
        }
        $this->collTugasTambahans = null;
        if ($this->collUnitUsahas instanceof PropelCollection) {
            $this->collUnitUsahas->clearIterator();
        }
        $this->collUnitUsahas = null;
        if ($this->collVldSekolahs instanceof PropelCollection) {
            $this->collVldSekolahs->clearIterator();
        }
        $this->collVldSekolahs = null;
        $this->aMstWilayah = null;
        $this->aKebutuhanKhusus = null;
        $this->aBentukPendidikan = null;
        $this->aYayasan = null;
        $this->aStatusKepemilikan = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(SekolahPeer::DEFAULT_STRING_FORMAT);
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
