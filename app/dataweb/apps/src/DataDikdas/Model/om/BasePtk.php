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
use DataDikdas\Model\Alat;
use DataDikdas\Model\AlatQuery;
use DataDikdas\Model\Anak;
use DataDikdas\Model\AnakQuery;
use DataDikdas\Model\AnggotaPanitia;
use DataDikdas\Model\AnggotaPanitiaQuery;
use DataDikdas\Model\Angkutan;
use DataDikdas\Model\AngkutanQuery;
use DataDikdas\Model\Bangunan;
use DataDikdas\Model\BangunanQuery;
use DataDikdas\Model\Bank;
use DataDikdas\Model\BankQuery;
use DataDikdas\Model\BeasiswaPtk;
use DataDikdas\Model\BeasiswaPtkQuery;
use DataDikdas\Model\BidangSdm;
use DataDikdas\Model\BidangSdmQuery;
use DataDikdas\Model\BidangStudi;
use DataDikdas\Model\BidangStudiQuery;
use DataDikdas\Model\BimbingPd;
use DataDikdas\Model\BimbingPdQuery;
use DataDikdas\Model\BukuPtk;
use DataDikdas\Model\BukuPtkQuery;
use DataDikdas\Model\Diklat;
use DataDikdas\Model\DiklatQuery;
use DataDikdas\Model\Inpassing;
use DataDikdas\Model\InpassingQuery;
use DataDikdas\Model\JenisPtk;
use DataDikdas\Model\JenisPtkQuery;
use DataDikdas\Model\KaryaTulis;
use DataDikdas\Model\KaryaTulisQuery;
use DataDikdas\Model\KeahlianLaboratorium;
use DataDikdas\Model\KeahlianLaboratoriumQuery;
use DataDikdas\Model\KebutuhanKhusus;
use DataDikdas\Model\KebutuhanKhususQuery;
use DataDikdas\Model\Kesejahteraan;
use DataDikdas\Model\KesejahteraanQuery;
use DataDikdas\Model\KitasPtk;
use DataDikdas\Model\KitasPtkQuery;
use DataDikdas\Model\LargeObject;
use DataDikdas\Model\LargeObjectQuery;
use DataDikdas\Model\LembagaPengangkat;
use DataDikdas\Model\LembagaPengangkatQuery;
use DataDikdas\Model\MstWilayah;
use DataDikdas\Model\MstWilayahQuery;
use DataDikdas\Model\Negara;
use DataDikdas\Model\NegaraQuery;
use DataDikdas\Model\NilaiTest;
use DataDikdas\Model\NilaiTestQuery;
use DataDikdas\Model\PangkatGolongan;
use DataDikdas\Model\PangkatGolonganQuery;
use DataDikdas\Model\PasporPtk;
use DataDikdas\Model\PasporPtkQuery;
use DataDikdas\Model\Pekerjaan;
use DataDikdas\Model\PekerjaanQuery;
use DataDikdas\Model\PengawasTerdaftar;
use DataDikdas\Model\PengawasTerdaftarQuery;
use DataDikdas\Model\Penghargaan;
use DataDikdas\Model\PenghargaanQuery;
use DataDikdas\Model\Ptk;
use DataDikdas\Model\PtkBaru;
use DataDikdas\Model\PtkBaruQuery;
use DataDikdas\Model\PtkPeer;
use DataDikdas\Model\PtkQuery;
use DataDikdas\Model\PtkTerdaftar;
use DataDikdas\Model\PtkTerdaftarQuery;
use DataDikdas\Model\RiwayatGajiBerkala;
use DataDikdas\Model\RiwayatGajiBerkalaQuery;
use DataDikdas\Model\RombonganBelajar;
use DataDikdas\Model\RombonganBelajarQuery;
use DataDikdas\Model\RwyFungsional;
use DataDikdas\Model\RwyFungsionalQuery;
use DataDikdas\Model\RwyKepangkatan;
use DataDikdas\Model\RwyKepangkatanQuery;
use DataDikdas\Model\RwyKerja;
use DataDikdas\Model\RwyKerjaQuery;
use DataDikdas\Model\RwyPendFormal;
use DataDikdas\Model\RwyPendFormalQuery;
use DataDikdas\Model\RwySertifikasi;
use DataDikdas\Model\RwySertifikasiQuery;
use DataDikdas\Model\RwyStruktural;
use DataDikdas\Model\RwyStrukturalQuery;
use DataDikdas\Model\StatusKeaktifanPegawai;
use DataDikdas\Model\StatusKeaktifanPegawaiQuery;
use DataDikdas\Model\StatusKepegawaian;
use DataDikdas\Model\StatusKepegawaianQuery;
use DataDikdas\Model\SumberGaji;
use DataDikdas\Model\SumberGajiQuery;
use DataDikdas\Model\TugasTambahan;
use DataDikdas\Model\TugasTambahanQuery;
use DataDikdas\Model\Tunjangan;
use DataDikdas\Model\TunjanganQuery;
use DataDikdas\Model\VldPtk;
use DataDikdas\Model\VldPtkQuery;

/**
 * Base class that represents a row from the 'ptk' table.
 *
 * 
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BasePtk extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'DataDikdas\\Model\\PtkPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        PtkPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the ptk_id field.
     * @var        string
     */
    protected $ptk_id;

    /**
     * The value for the nama field.
     * @var        string
     */
    protected $nama;

    /**
     * The value for the nip field.
     * @var        string
     */
    protected $nip;

    /**
     * The value for the jenis_kelamin field.
     * @var        string
     */
    protected $jenis_kelamin;

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
     * The value for the niy_nigk field.
     * @var        string
     */
    protected $niy_nigk;

    /**
     * The value for the nuptk field.
     * @var        string
     */
    protected $nuptk;

    /**
     * The value for the nrg field.
     * @var        string
     */
    protected $nrg;

    /**
     * The value for the nuks field.
     * @var        string
     */
    protected $nuks;

    /**
     * The value for the status_kepegawaian_id field.
     * @var        int
     */
    protected $status_kepegawaian_id;

    /**
     * The value for the jenis_ptk_id field.
     * @var        string
     */
    protected $jenis_ptk_id;

    /**
     * The value for the pengawas_bidang_studi_id field.
     * @var        int
     */
    protected $pengawas_bidang_studi_id;

    /**
     * The value for the agama_id field.
     * @var        int
     */
    protected $agama_id;

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
     * The value for the no_telepon_rumah field.
     * @var        string
     */
    protected $no_telepon_rumah;

    /**
     * The value for the no_hp field.
     * @var        string
     */
    protected $no_hp;

    /**
     * The value for the email field.
     * @var        string
     */
    protected $email;

    /**
     * The value for the status_keaktifan_id field.
     * @var        string
     */
    protected $status_keaktifan_id;

    /**
     * The value for the sk_cpns field.
     * @var        string
     */
    protected $sk_cpns;

    /**
     * The value for the tgl_cpns field.
     * @var        string
     */
    protected $tgl_cpns;

    /**
     * The value for the sk_pengangkatan field.
     * @var        string
     */
    protected $sk_pengangkatan;

    /**
     * The value for the tmt_pengangkatan field.
     * @var        string
     */
    protected $tmt_pengangkatan;

    /**
     * The value for the lembaga_pengangkat_id field.
     * @var        string
     */
    protected $lembaga_pengangkat_id;

    /**
     * The value for the pangkat_golongan_id field.
     * @var        string
     */
    protected $pangkat_golongan_id;

    /**
     * The value for the keahlian_laboratorium_id field.
     * @var        int
     */
    protected $keahlian_laboratorium_id;

    /**
     * The value for the sumber_gaji_id field.
     * @var        string
     */
    protected $sumber_gaji_id;

    /**
     * The value for the nama_ibu_kandung field.
     * @var        string
     */
    protected $nama_ibu_kandung;

    /**
     * The value for the status_perkawinan field.
     * @var        string
     */
    protected $status_perkawinan;

    /**
     * The value for the nama_suami_istri field.
     * @var        string
     */
    protected $nama_suami_istri;

    /**
     * The value for the nip_suami_istri field.
     * @var        string
     */
    protected $nip_suami_istri;

    /**
     * The value for the pekerjaan_suami_istri field.
     * @var        int
     */
    protected $pekerjaan_suami_istri;

    /**
     * The value for the tmt_pns field.
     * @var        string
     */
    protected $tmt_pns;

    /**
     * The value for the sudah_lisensi_kepala_sekolah field.
     * @var        string
     */
    protected $sudah_lisensi_kepala_sekolah;

    /**
     * The value for the jumlah_sekolah_binaan field.
     * @var        int
     */
    protected $jumlah_sekolah_binaan;

    /**
     * The value for the pernah_diklat_kepengawasan field.
     * @var        string
     */
    protected $pernah_diklat_kepengawasan;

    /**
     * The value for the nm_wp field.
     * @var        string
     */
    protected $nm_wp;

    /**
     * The value for the status_data field.
     * @var        int
     */
    protected $status_data;

    /**
     * The value for the karpeg field.
     * @var        string
     */
    protected $karpeg;

    /**
     * The value for the karpas field.
     * @var        string
     */
    protected $karpas;

    /**
     * The value for the mampu_handle_kk field.
     * @var        int
     */
    protected $mampu_handle_kk;

    /**
     * The value for the keahlian_braille field.
     * Note: this column has a database default value of: '0'
     * @var        string
     */
    protected $keahlian_braille;

    /**
     * The value for the keahlian_bhs_isyarat field.
     * Note: this column has a database default value of: '0'
     * @var        string
     */
    protected $keahlian_bhs_isyarat;

    /**
     * The value for the npwp field.
     * @var        string
     */
    protected $npwp;

    /**
     * The value for the kewarganegaraan field.
     * @var        string
     */
    protected $kewarganegaraan;

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
     * The value for the rekening_atas_nama field.
     * @var        string
     */
    protected $rekening_atas_nama;

    /**
     * The value for the blob_id field.
     * @var        string
     */
    protected $blob_id;

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
     * @var        Negara
     */
    protected $aNegara;

    /**
     * @var        Bank
     */
    protected $aBank;

    /**
     * @var        LargeObject
     */
    protected $aLargeObject;

    /**
     * @var        JenisPtk
     */
    protected $aJenisPtk;

    /**
     * @var        MstWilayah
     */
    protected $aMstWilayah;

    /**
     * @var        KebutuhanKhusus
     */
    protected $aKebutuhanKhusus;

    /**
     * @var        LembagaPengangkat
     */
    protected $aLembagaPengangkat;

    /**
     * @var        StatusKeaktifanPegawai
     */
    protected $aStatusKeaktifanPegawai;

    /**
     * @var        SumberGaji
     */
    protected $aSumberGaji;

    /**
     * @var        PangkatGolongan
     */
    protected $aPangkatGolongan;

    /**
     * @var        BidangStudi
     */
    protected $aBidangStudi;

    /**
     * @var        KeahlianLaboratorium
     */
    protected $aKeahlianLaboratorium;

    /**
     * @var        Pekerjaan
     */
    protected $aPekerjaan;

    /**
     * @var        Agama
     */
    protected $aAgama;

    /**
     * @var        StatusKepegawaian
     */
    protected $aStatusKepegawaian;

    /**
     * @var        PropelObjectCollection|Alat[] Collection to store aggregation of Alat objects.
     */
    protected $collAlats;
    protected $collAlatsPartial;

    /**
     * @var        PropelObjectCollection|Anak[] Collection to store aggregation of Anak objects.
     */
    protected $collAnaks;
    protected $collAnaksPartial;

    /**
     * @var        PropelObjectCollection|AnggotaPanitia[] Collection to store aggregation of AnggotaPanitia objects.
     */
    protected $collAnggotaPanitias;
    protected $collAnggotaPanitiasPartial;

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
     * @var        PropelObjectCollection|BeasiswaPtk[] Collection to store aggregation of BeasiswaPtk objects.
     */
    protected $collBeasiswaPtks;
    protected $collBeasiswaPtksPartial;

    /**
     * @var        PropelObjectCollection|BidangSdm[] Collection to store aggregation of BidangSdm objects.
     */
    protected $collBidangSdms;
    protected $collBidangSdmsPartial;

    /**
     * @var        PropelObjectCollection|BimbingPd[] Collection to store aggregation of BimbingPd objects.
     */
    protected $collBimbingPds;
    protected $collBimbingPdsPartial;

    /**
     * @var        PropelObjectCollection|BukuPtk[] Collection to store aggregation of BukuPtk objects.
     */
    protected $collBukuPtks;
    protected $collBukuPtksPartial;

    /**
     * @var        PropelObjectCollection|Diklat[] Collection to store aggregation of Diklat objects.
     */
    protected $collDiklats;
    protected $collDiklatsPartial;

    /**
     * @var        PropelObjectCollection|Inpassing[] Collection to store aggregation of Inpassing objects.
     */
    protected $collInpassings;
    protected $collInpassingsPartial;

    /**
     * @var        PropelObjectCollection|KaryaTulis[] Collection to store aggregation of KaryaTulis objects.
     */
    protected $collKaryaTuliss;
    protected $collKaryaTulissPartial;

    /**
     * @var        PropelObjectCollection|Kesejahteraan[] Collection to store aggregation of Kesejahteraan objects.
     */
    protected $collKesejahteraans;
    protected $collKesejahteraansPartial;

    /**
     * @var        PropelObjectCollection|KitasPtk[] Collection to store aggregation of KitasPtk objects.
     */
    protected $collKitasPtks;
    protected $collKitasPtksPartial;

    /**
     * @var        PropelObjectCollection|NilaiTest[] Collection to store aggregation of NilaiTest objects.
     */
    protected $collNilaiTests;
    protected $collNilaiTestsPartial;

    /**
     * @var        PropelObjectCollection|PasporPtk[] Collection to store aggregation of PasporPtk objects.
     */
    protected $collPasporPtks;
    protected $collPasporPtksPartial;

    /**
     * @var        PropelObjectCollection|PengawasTerdaftar[] Collection to store aggregation of PengawasTerdaftar objects.
     */
    protected $collPengawasTerdaftars;
    protected $collPengawasTerdaftarsPartial;

    /**
     * @var        PropelObjectCollection|Penghargaan[] Collection to store aggregation of Penghargaan objects.
     */
    protected $collPenghargaans;
    protected $collPenghargaansPartial;

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
     * @var        PropelObjectCollection|RiwayatGajiBerkala[] Collection to store aggregation of RiwayatGajiBerkala objects.
     */
    protected $collRiwayatGajiBerkalas;
    protected $collRiwayatGajiBerkalasPartial;

    /**
     * @var        PropelObjectCollection|RombonganBelajar[] Collection to store aggregation of RombonganBelajar objects.
     */
    protected $collRombonganBelajars;
    protected $collRombonganBelajarsPartial;

    /**
     * @var        PropelObjectCollection|RwyFungsional[] Collection to store aggregation of RwyFungsional objects.
     */
    protected $collRwyFungsionals;
    protected $collRwyFungsionalsPartial;

    /**
     * @var        PropelObjectCollection|RwyKepangkatan[] Collection to store aggregation of RwyKepangkatan objects.
     */
    protected $collRwyKepangkatans;
    protected $collRwyKepangkatansPartial;

    /**
     * @var        PropelObjectCollection|RwyKerja[] Collection to store aggregation of RwyKerja objects.
     */
    protected $collRwyKerjas;
    protected $collRwyKerjasPartial;

    /**
     * @var        PropelObjectCollection|RwyPendFormal[] Collection to store aggregation of RwyPendFormal objects.
     */
    protected $collRwyPendFormals;
    protected $collRwyPendFormalsPartial;

    /**
     * @var        PropelObjectCollection|RwySertifikasi[] Collection to store aggregation of RwySertifikasi objects.
     */
    protected $collRwySertifikasis;
    protected $collRwySertifikasisPartial;

    /**
     * @var        PropelObjectCollection|RwyStruktural[] Collection to store aggregation of RwyStruktural objects.
     */
    protected $collRwyStrukturals;
    protected $collRwyStrukturalsPartial;

    /**
     * @var        PropelObjectCollection|TugasTambahan[] Collection to store aggregation of TugasTambahan objects.
     */
    protected $collTugasTambahans;
    protected $collTugasTambahansPartial;

    /**
     * @var        PropelObjectCollection|Tunjangan[] Collection to store aggregation of Tunjangan objects.
     */
    protected $collTunjangans;
    protected $collTunjangansPartial;

    /**
     * @var        PropelObjectCollection|VldPtk[] Collection to store aggregation of VldPtk objects.
     */
    protected $collVldPtks;
    protected $collVldPtksPartial;

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
    protected $anaksScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $anggotaPanitiasScheduledForDeletion = null;

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
    protected $beasiswaPtksScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $bidangSdmsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $bimbingPdsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $bukuPtksScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $diklatsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $inpassingsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $karyaTulissScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $kesejahteraansScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $kitasPtksScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $nilaiTestsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $pasporPtksScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $pengawasTerdaftarsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $penghargaansScheduledForDeletion = null;

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
    protected $riwayatGajiBerkalasScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $rombonganBelajarsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $rwyFungsionalsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $rwyKepangkatansScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $rwyKerjasScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $rwyPendFormalsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $rwySertifikasisScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $rwyStrukturalsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $tugasTambahansScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $tunjangansScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $vldPtksScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->keahlian_braille = '0';
        $this->keahlian_bhs_isyarat = '0';
        $this->create_date = '2021-06-07 11:49:57';
        $this->last_update = '2021-06-07 11:49:57';
        $this->last_sync = '1901-01-01 00:00:00';
    }

    /**
     * Initializes internal state of BasePtk object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
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
     * Get the [nama] column value.
     * 
     * @return string
     */
    public function getNama()
    {
        return $this->nama;
    }

    /**
     * Get the [nip] column value.
     * 
     * @return string
     */
    public function getNip()
    {
        return $this->nip;
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
     * Get the [niy_nigk] column value.
     * 
     * @return string
     */
    public function getNiyNigk()
    {
        return $this->niy_nigk;
    }

    /**
     * Get the [nuptk] column value.
     * 
     * @return string
     */
    public function getNuptk()
    {
        return $this->nuptk;
    }

    /**
     * Get the [nrg] column value.
     * 
     * @return string
     */
    public function getNrg()
    {
        return $this->nrg;
    }

    /**
     * Get the [nuks] column value.
     * 
     * @return string
     */
    public function getNuks()
    {
        return $this->nuks;
    }

    /**
     * Get the [status_kepegawaian_id] column value.
     * 
     * @return int
     */
    public function getStatusKepegawaianId()
    {
        return $this->status_kepegawaian_id;
    }

    /**
     * Get the [jenis_ptk_id] column value.
     * 
     * @return string
     */
    public function getJenisPtkId()
    {
        return $this->jenis_ptk_id;
    }

    /**
     * Get the [pengawas_bidang_studi_id] column value.
     * 
     * @return int
     */
    public function getPengawasBidangStudiId()
    {
        return $this->pengawas_bidang_studi_id;
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
     * Get the [no_telepon_rumah] column value.
     * 
     * @return string
     */
    public function getNoTeleponRumah()
    {
        return $this->no_telepon_rumah;
    }

    /**
     * Get the [no_hp] column value.
     * 
     * @return string
     */
    public function getNoHp()
    {
        return $this->no_hp;
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
     * Get the [status_keaktifan_id] column value.
     * 
     * @return string
     */
    public function getStatusKeaktifanId()
    {
        return $this->status_keaktifan_id;
    }

    /**
     * Get the [sk_cpns] column value.
     * 
     * @return string
     */
    public function getSkCpns()
    {
        return $this->sk_cpns;
    }

    /**
     * Get the [optionally formatted] temporal [tgl_cpns] column value.
     * 
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getTglCpns($format = '%Y-%m-%d')
    {
        if ($this->tgl_cpns === null) {
            return null;
        }


        try {
            $dt = new DateTime($this->tgl_cpns);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->tgl_cpns, true), $x);
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
     * Get the [sk_pengangkatan] column value.
     * 
     * @return string
     */
    public function getSkPengangkatan()
    {
        return $this->sk_pengangkatan;
    }

    /**
     * Get the [optionally formatted] temporal [tmt_pengangkatan] column value.
     * 
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getTmtPengangkatan($format = '%Y-%m-%d')
    {
        if ($this->tmt_pengangkatan === null) {
            return null;
        }


        try {
            $dt = new DateTime($this->tmt_pengangkatan);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->tmt_pengangkatan, true), $x);
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
     * Get the [lembaga_pengangkat_id] column value.
     * 
     * @return string
     */
    public function getLembagaPengangkatId()
    {
        return $this->lembaga_pengangkat_id;
    }

    /**
     * Get the [pangkat_golongan_id] column value.
     * 
     * @return string
     */
    public function getPangkatGolonganId()
    {
        return $this->pangkat_golongan_id;
    }

    /**
     * Get the [keahlian_laboratorium_id] column value.
     * 
     * @return int
     */
    public function getKeahlianLaboratoriumId()
    {
        return $this->keahlian_laboratorium_id;
    }

    /**
     * Get the [sumber_gaji_id] column value.
     * 
     * @return string
     */
    public function getSumberGajiId()
    {
        return $this->sumber_gaji_id;
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
     * Get the [status_perkawinan] column value.
     * 
     * @return string
     */
    public function getStatusPerkawinan()
    {
        return $this->status_perkawinan;
    }

    /**
     * Get the [nama_suami_istri] column value.
     * 
     * @return string
     */
    public function getNamaSuamiIstri()
    {
        return $this->nama_suami_istri;
    }

    /**
     * Get the [nip_suami_istri] column value.
     * 
     * @return string
     */
    public function getNipSuamiIstri()
    {
        return $this->nip_suami_istri;
    }

    /**
     * Get the [pekerjaan_suami_istri] column value.
     * 
     * @return int
     */
    public function getPekerjaanSuamiIstri()
    {
        return $this->pekerjaan_suami_istri;
    }

    /**
     * Get the [optionally formatted] temporal [tmt_pns] column value.
     * 
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getTmtPns($format = '%Y-%m-%d')
    {
        if ($this->tmt_pns === null) {
            return null;
        }


        try {
            $dt = new DateTime($this->tmt_pns);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->tmt_pns, true), $x);
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
     * Get the [sudah_lisensi_kepala_sekolah] column value.
     * 
     * @return string
     */
    public function getSudahLisensiKepalaSekolah()
    {
        return $this->sudah_lisensi_kepala_sekolah;
    }

    /**
     * Get the [jumlah_sekolah_binaan] column value.
     * 
     * @return int
     */
    public function getJumlahSekolahBinaan()
    {
        return $this->jumlah_sekolah_binaan;
    }

    /**
     * Get the [pernah_diklat_kepengawasan] column value.
     * 
     * @return string
     */
    public function getPernahDiklatKepengawasan()
    {
        return $this->pernah_diklat_kepengawasan;
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
     * Get the [status_data] column value.
     * 
     * @return int
     */
    public function getStatusData()
    {
        return $this->status_data;
    }

    /**
     * Get the [karpeg] column value.
     * 
     * @return string
     */
    public function getKarpeg()
    {
        return $this->karpeg;
    }

    /**
     * Get the [karpas] column value.
     * 
     * @return string
     */
    public function getKarpas()
    {
        return $this->karpas;
    }

    /**
     * Get the [mampu_handle_kk] column value.
     * 
     * @return int
     */
    public function getMampuHandleKk()
    {
        return $this->mampu_handle_kk;
    }

    /**
     * Get the [keahlian_braille] column value.
     * 
     * @return string
     */
    public function getKeahlianBraille()
    {
        return $this->keahlian_braille;
    }

    /**
     * Get the [keahlian_bhs_isyarat] column value.
     * 
     * @return string
     */
    public function getKeahlianBhsIsyarat()
    {
        return $this->keahlian_bhs_isyarat;
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
     * Get the [kewarganegaraan] column value.
     * 
     * @return string
     */
    public function getKewarganegaraan()
    {
        return $this->kewarganegaraan;
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
     * Get the [rekening_atas_nama] column value.
     * 
     * @return string
     */
    public function getRekeningAtasNama()
    {
        return $this->rekening_atas_nama;
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
     * Set the value of [ptk_id] column.
     * 
     * @param string $v new value
     * @return Ptk The current object (for fluent API support)
     */
    public function setPtkId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->ptk_id !== $v) {
            $this->ptk_id = $v;
            $this->modifiedColumns[] = PtkPeer::PTK_ID;
        }


        return $this;
    } // setPtkId()

    /**
     * Set the value of [nama] column.
     * 
     * @param string $v new value
     * @return Ptk The current object (for fluent API support)
     */
    public function setNama($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nama !== $v) {
            $this->nama = $v;
            $this->modifiedColumns[] = PtkPeer::NAMA;
        }


        return $this;
    } // setNama()

    /**
     * Set the value of [nip] column.
     * 
     * @param string $v new value
     * @return Ptk The current object (for fluent API support)
     */
    public function setNip($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nip !== $v) {
            $this->nip = $v;
            $this->modifiedColumns[] = PtkPeer::NIP;
        }


        return $this;
    } // setNip()

    /**
     * Set the value of [jenis_kelamin] column.
     * 
     * @param string $v new value
     * @return Ptk The current object (for fluent API support)
     */
    public function setJenisKelamin($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->jenis_kelamin !== $v) {
            $this->jenis_kelamin = $v;
            $this->modifiedColumns[] = PtkPeer::JENIS_KELAMIN;
        }


        return $this;
    } // setJenisKelamin()

    /**
     * Set the value of [tempat_lahir] column.
     * 
     * @param string $v new value
     * @return Ptk The current object (for fluent API support)
     */
    public function setTempatLahir($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->tempat_lahir !== $v) {
            $this->tempat_lahir = $v;
            $this->modifiedColumns[] = PtkPeer::TEMPAT_LAHIR;
        }


        return $this;
    } // setTempatLahir()

    /**
     * Sets the value of [tanggal_lahir] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Ptk The current object (for fluent API support)
     */
    public function setTanggalLahir($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->tanggal_lahir !== null || $dt !== null) {
            $currentDateAsString = ($this->tanggal_lahir !== null && $tmpDt = new DateTime($this->tanggal_lahir)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->tanggal_lahir = $newDateAsString;
                $this->modifiedColumns[] = PtkPeer::TANGGAL_LAHIR;
            }
        } // if either are not null


        return $this;
    } // setTanggalLahir()

    /**
     * Set the value of [nik] column.
     * 
     * @param string $v new value
     * @return Ptk The current object (for fluent API support)
     */
    public function setNik($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nik !== $v) {
            $this->nik = $v;
            $this->modifiedColumns[] = PtkPeer::NIK;
        }


        return $this;
    } // setNik()

    /**
     * Set the value of [no_kk] column.
     * 
     * @param string $v new value
     * @return Ptk The current object (for fluent API support)
     */
    public function setNoKk($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->no_kk !== $v) {
            $this->no_kk = $v;
            $this->modifiedColumns[] = PtkPeer::NO_KK;
        }


        return $this;
    } // setNoKk()

    /**
     * Set the value of [niy_nigk] column.
     * 
     * @param string $v new value
     * @return Ptk The current object (for fluent API support)
     */
    public function setNiyNigk($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->niy_nigk !== $v) {
            $this->niy_nigk = $v;
            $this->modifiedColumns[] = PtkPeer::NIY_NIGK;
        }


        return $this;
    } // setNiyNigk()

    /**
     * Set the value of [nuptk] column.
     * 
     * @param string $v new value
     * @return Ptk The current object (for fluent API support)
     */
    public function setNuptk($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nuptk !== $v) {
            $this->nuptk = $v;
            $this->modifiedColumns[] = PtkPeer::NUPTK;
        }


        return $this;
    } // setNuptk()

    /**
     * Set the value of [nrg] column.
     * 
     * @param string $v new value
     * @return Ptk The current object (for fluent API support)
     */
    public function setNrg($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nrg !== $v) {
            $this->nrg = $v;
            $this->modifiedColumns[] = PtkPeer::NRG;
        }


        return $this;
    } // setNrg()

    /**
     * Set the value of [nuks] column.
     * 
     * @param string $v new value
     * @return Ptk The current object (for fluent API support)
     */
    public function setNuks($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nuks !== $v) {
            $this->nuks = $v;
            $this->modifiedColumns[] = PtkPeer::NUKS;
        }


        return $this;
    } // setNuks()

    /**
     * Set the value of [status_kepegawaian_id] column.
     * 
     * @param int $v new value
     * @return Ptk The current object (for fluent API support)
     */
    public function setStatusKepegawaianId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->status_kepegawaian_id !== $v) {
            $this->status_kepegawaian_id = $v;
            $this->modifiedColumns[] = PtkPeer::STATUS_KEPEGAWAIAN_ID;
        }

        if ($this->aStatusKepegawaian !== null && $this->aStatusKepegawaian->getStatusKepegawaianId() !== $v) {
            $this->aStatusKepegawaian = null;
        }


        return $this;
    } // setStatusKepegawaianId()

    /**
     * Set the value of [jenis_ptk_id] column.
     * 
     * @param string $v new value
     * @return Ptk The current object (for fluent API support)
     */
    public function setJenisPtkId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->jenis_ptk_id !== $v) {
            $this->jenis_ptk_id = $v;
            $this->modifiedColumns[] = PtkPeer::JENIS_PTK_ID;
        }

        if ($this->aJenisPtk !== null && $this->aJenisPtk->getJenisPtkId() !== $v) {
            $this->aJenisPtk = null;
        }


        return $this;
    } // setJenisPtkId()

    /**
     * Set the value of [pengawas_bidang_studi_id] column.
     * 
     * @param int $v new value
     * @return Ptk The current object (for fluent API support)
     */
    public function setPengawasBidangStudiId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->pengawas_bidang_studi_id !== $v) {
            $this->pengawas_bidang_studi_id = $v;
            $this->modifiedColumns[] = PtkPeer::PENGAWAS_BIDANG_STUDI_ID;
        }

        if ($this->aBidangStudi !== null && $this->aBidangStudi->getBidangStudiId() !== $v) {
            $this->aBidangStudi = null;
        }


        return $this;
    } // setPengawasBidangStudiId()

    /**
     * Set the value of [agama_id] column.
     * 
     * @param int $v new value
     * @return Ptk The current object (for fluent API support)
     */
    public function setAgamaId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->agama_id !== $v) {
            $this->agama_id = $v;
            $this->modifiedColumns[] = PtkPeer::AGAMA_ID;
        }

        if ($this->aAgama !== null && $this->aAgama->getAgamaId() !== $v) {
            $this->aAgama = null;
        }


        return $this;
    } // setAgamaId()

    /**
     * Set the value of [alamat_jalan] column.
     * 
     * @param string $v new value
     * @return Ptk The current object (for fluent API support)
     */
    public function setAlamatJalan($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->alamat_jalan !== $v) {
            $this->alamat_jalan = $v;
            $this->modifiedColumns[] = PtkPeer::ALAMAT_JALAN;
        }


        return $this;
    } // setAlamatJalan()

    /**
     * Set the value of [rt] column.
     * 
     * @param string $v new value
     * @return Ptk The current object (for fluent API support)
     */
    public function setRt($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->rt !== $v) {
            $this->rt = $v;
            $this->modifiedColumns[] = PtkPeer::RT;
        }


        return $this;
    } // setRt()

    /**
     * Set the value of [rw] column.
     * 
     * @param string $v new value
     * @return Ptk The current object (for fluent API support)
     */
    public function setRw($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->rw !== $v) {
            $this->rw = $v;
            $this->modifiedColumns[] = PtkPeer::RW;
        }


        return $this;
    } // setRw()

    /**
     * Set the value of [nama_dusun] column.
     * 
     * @param string $v new value
     * @return Ptk The current object (for fluent API support)
     */
    public function setNamaDusun($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nama_dusun !== $v) {
            $this->nama_dusun = $v;
            $this->modifiedColumns[] = PtkPeer::NAMA_DUSUN;
        }


        return $this;
    } // setNamaDusun()

    /**
     * Set the value of [desa_kelurahan] column.
     * 
     * @param string $v new value
     * @return Ptk The current object (for fluent API support)
     */
    public function setDesaKelurahan($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->desa_kelurahan !== $v) {
            $this->desa_kelurahan = $v;
            $this->modifiedColumns[] = PtkPeer::DESA_KELURAHAN;
        }


        return $this;
    } // setDesaKelurahan()

    /**
     * Set the value of [kode_wilayah] column.
     * 
     * @param string $v new value
     * @return Ptk The current object (for fluent API support)
     */
    public function setKodeWilayah($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->kode_wilayah !== $v) {
            $this->kode_wilayah = $v;
            $this->modifiedColumns[] = PtkPeer::KODE_WILAYAH;
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
     * @return Ptk The current object (for fluent API support)
     */
    public function setKodePos($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->kode_pos !== $v) {
            $this->kode_pos = $v;
            $this->modifiedColumns[] = PtkPeer::KODE_POS;
        }


        return $this;
    } // setKodePos()

    /**
     * Set the value of [lintang] column.
     * 
     * @param string $v new value
     * @return Ptk The current object (for fluent API support)
     */
    public function setLintang($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->lintang !== $v) {
            $this->lintang = $v;
            $this->modifiedColumns[] = PtkPeer::LINTANG;
        }


        return $this;
    } // setLintang()

    /**
     * Set the value of [bujur] column.
     * 
     * @param string $v new value
     * @return Ptk The current object (for fluent API support)
     */
    public function setBujur($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->bujur !== $v) {
            $this->bujur = $v;
            $this->modifiedColumns[] = PtkPeer::BUJUR;
        }


        return $this;
    } // setBujur()

    /**
     * Set the value of [no_telepon_rumah] column.
     * 
     * @param string $v new value
     * @return Ptk The current object (for fluent API support)
     */
    public function setNoTeleponRumah($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->no_telepon_rumah !== $v) {
            $this->no_telepon_rumah = $v;
            $this->modifiedColumns[] = PtkPeer::NO_TELEPON_RUMAH;
        }


        return $this;
    } // setNoTeleponRumah()

    /**
     * Set the value of [no_hp] column.
     * 
     * @param string $v new value
     * @return Ptk The current object (for fluent API support)
     */
    public function setNoHp($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->no_hp !== $v) {
            $this->no_hp = $v;
            $this->modifiedColumns[] = PtkPeer::NO_HP;
        }


        return $this;
    } // setNoHp()

    /**
     * Set the value of [email] column.
     * 
     * @param string $v new value
     * @return Ptk The current object (for fluent API support)
     */
    public function setEmail($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->email !== $v) {
            $this->email = $v;
            $this->modifiedColumns[] = PtkPeer::EMAIL;
        }


        return $this;
    } // setEmail()

    /**
     * Set the value of [status_keaktifan_id] column.
     * 
     * @param string $v new value
     * @return Ptk The current object (for fluent API support)
     */
    public function setStatusKeaktifanId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->status_keaktifan_id !== $v) {
            $this->status_keaktifan_id = $v;
            $this->modifiedColumns[] = PtkPeer::STATUS_KEAKTIFAN_ID;
        }

        if ($this->aStatusKeaktifanPegawai !== null && $this->aStatusKeaktifanPegawai->getStatusKeaktifanId() !== $v) {
            $this->aStatusKeaktifanPegawai = null;
        }


        return $this;
    } // setStatusKeaktifanId()

    /**
     * Set the value of [sk_cpns] column.
     * 
     * @param string $v new value
     * @return Ptk The current object (for fluent API support)
     */
    public function setSkCpns($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->sk_cpns !== $v) {
            $this->sk_cpns = $v;
            $this->modifiedColumns[] = PtkPeer::SK_CPNS;
        }


        return $this;
    } // setSkCpns()

    /**
     * Sets the value of [tgl_cpns] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Ptk The current object (for fluent API support)
     */
    public function setTglCpns($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->tgl_cpns !== null || $dt !== null) {
            $currentDateAsString = ($this->tgl_cpns !== null && $tmpDt = new DateTime($this->tgl_cpns)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->tgl_cpns = $newDateAsString;
                $this->modifiedColumns[] = PtkPeer::TGL_CPNS;
            }
        } // if either are not null


        return $this;
    } // setTglCpns()

    /**
     * Set the value of [sk_pengangkatan] column.
     * 
     * @param string $v new value
     * @return Ptk The current object (for fluent API support)
     */
    public function setSkPengangkatan($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->sk_pengangkatan !== $v) {
            $this->sk_pengangkatan = $v;
            $this->modifiedColumns[] = PtkPeer::SK_PENGANGKATAN;
        }


        return $this;
    } // setSkPengangkatan()

    /**
     * Sets the value of [tmt_pengangkatan] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Ptk The current object (for fluent API support)
     */
    public function setTmtPengangkatan($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->tmt_pengangkatan !== null || $dt !== null) {
            $currentDateAsString = ($this->tmt_pengangkatan !== null && $tmpDt = new DateTime($this->tmt_pengangkatan)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->tmt_pengangkatan = $newDateAsString;
                $this->modifiedColumns[] = PtkPeer::TMT_PENGANGKATAN;
            }
        } // if either are not null


        return $this;
    } // setTmtPengangkatan()

    /**
     * Set the value of [lembaga_pengangkat_id] column.
     * 
     * @param string $v new value
     * @return Ptk The current object (for fluent API support)
     */
    public function setLembagaPengangkatId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->lembaga_pengangkat_id !== $v) {
            $this->lembaga_pengangkat_id = $v;
            $this->modifiedColumns[] = PtkPeer::LEMBAGA_PENGANGKAT_ID;
        }

        if ($this->aLembagaPengangkat !== null && $this->aLembagaPengangkat->getLembagaPengangkatId() !== $v) {
            $this->aLembagaPengangkat = null;
        }


        return $this;
    } // setLembagaPengangkatId()

    /**
     * Set the value of [pangkat_golongan_id] column.
     * 
     * @param string $v new value
     * @return Ptk The current object (for fluent API support)
     */
    public function setPangkatGolonganId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->pangkat_golongan_id !== $v) {
            $this->pangkat_golongan_id = $v;
            $this->modifiedColumns[] = PtkPeer::PANGKAT_GOLONGAN_ID;
        }

        if ($this->aPangkatGolongan !== null && $this->aPangkatGolongan->getPangkatGolonganId() !== $v) {
            $this->aPangkatGolongan = null;
        }


        return $this;
    } // setPangkatGolonganId()

    /**
     * Set the value of [keahlian_laboratorium_id] column.
     * 
     * @param int $v new value
     * @return Ptk The current object (for fluent API support)
     */
    public function setKeahlianLaboratoriumId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->keahlian_laboratorium_id !== $v) {
            $this->keahlian_laboratorium_id = $v;
            $this->modifiedColumns[] = PtkPeer::KEAHLIAN_LABORATORIUM_ID;
        }

        if ($this->aKeahlianLaboratorium !== null && $this->aKeahlianLaboratorium->getKeahlianLaboratoriumId() !== $v) {
            $this->aKeahlianLaboratorium = null;
        }


        return $this;
    } // setKeahlianLaboratoriumId()

    /**
     * Set the value of [sumber_gaji_id] column.
     * 
     * @param string $v new value
     * @return Ptk The current object (for fluent API support)
     */
    public function setSumberGajiId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->sumber_gaji_id !== $v) {
            $this->sumber_gaji_id = $v;
            $this->modifiedColumns[] = PtkPeer::SUMBER_GAJI_ID;
        }

        if ($this->aSumberGaji !== null && $this->aSumberGaji->getSumberGajiId() !== $v) {
            $this->aSumberGaji = null;
        }


        return $this;
    } // setSumberGajiId()

    /**
     * Set the value of [nama_ibu_kandung] column.
     * 
     * @param string $v new value
     * @return Ptk The current object (for fluent API support)
     */
    public function setNamaIbuKandung($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nama_ibu_kandung !== $v) {
            $this->nama_ibu_kandung = $v;
            $this->modifiedColumns[] = PtkPeer::NAMA_IBU_KANDUNG;
        }


        return $this;
    } // setNamaIbuKandung()

    /**
     * Set the value of [status_perkawinan] column.
     * 
     * @param string $v new value
     * @return Ptk The current object (for fluent API support)
     */
    public function setStatusPerkawinan($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->status_perkawinan !== $v) {
            $this->status_perkawinan = $v;
            $this->modifiedColumns[] = PtkPeer::STATUS_PERKAWINAN;
        }


        return $this;
    } // setStatusPerkawinan()

    /**
     * Set the value of [nama_suami_istri] column.
     * 
     * @param string $v new value
     * @return Ptk The current object (for fluent API support)
     */
    public function setNamaSuamiIstri($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nama_suami_istri !== $v) {
            $this->nama_suami_istri = $v;
            $this->modifiedColumns[] = PtkPeer::NAMA_SUAMI_ISTRI;
        }


        return $this;
    } // setNamaSuamiIstri()

    /**
     * Set the value of [nip_suami_istri] column.
     * 
     * @param string $v new value
     * @return Ptk The current object (for fluent API support)
     */
    public function setNipSuamiIstri($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nip_suami_istri !== $v) {
            $this->nip_suami_istri = $v;
            $this->modifiedColumns[] = PtkPeer::NIP_SUAMI_ISTRI;
        }


        return $this;
    } // setNipSuamiIstri()

    /**
     * Set the value of [pekerjaan_suami_istri] column.
     * 
     * @param int $v new value
     * @return Ptk The current object (for fluent API support)
     */
    public function setPekerjaanSuamiIstri($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->pekerjaan_suami_istri !== $v) {
            $this->pekerjaan_suami_istri = $v;
            $this->modifiedColumns[] = PtkPeer::PEKERJAAN_SUAMI_ISTRI;
        }

        if ($this->aPekerjaan !== null && $this->aPekerjaan->getPekerjaanId() !== $v) {
            $this->aPekerjaan = null;
        }


        return $this;
    } // setPekerjaanSuamiIstri()

    /**
     * Sets the value of [tmt_pns] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Ptk The current object (for fluent API support)
     */
    public function setTmtPns($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->tmt_pns !== null || $dt !== null) {
            $currentDateAsString = ($this->tmt_pns !== null && $tmpDt = new DateTime($this->tmt_pns)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->tmt_pns = $newDateAsString;
                $this->modifiedColumns[] = PtkPeer::TMT_PNS;
            }
        } // if either are not null


        return $this;
    } // setTmtPns()

    /**
     * Set the value of [sudah_lisensi_kepala_sekolah] column.
     * 
     * @param string $v new value
     * @return Ptk The current object (for fluent API support)
     */
    public function setSudahLisensiKepalaSekolah($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->sudah_lisensi_kepala_sekolah !== $v) {
            $this->sudah_lisensi_kepala_sekolah = $v;
            $this->modifiedColumns[] = PtkPeer::SUDAH_LISENSI_KEPALA_SEKOLAH;
        }


        return $this;
    } // setSudahLisensiKepalaSekolah()

    /**
     * Set the value of [jumlah_sekolah_binaan] column.
     * 
     * @param int $v new value
     * @return Ptk The current object (for fluent API support)
     */
    public function setJumlahSekolahBinaan($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->jumlah_sekolah_binaan !== $v) {
            $this->jumlah_sekolah_binaan = $v;
            $this->modifiedColumns[] = PtkPeer::JUMLAH_SEKOLAH_BINAAN;
        }


        return $this;
    } // setJumlahSekolahBinaan()

    /**
     * Set the value of [pernah_diklat_kepengawasan] column.
     * 
     * @param string $v new value
     * @return Ptk The current object (for fluent API support)
     */
    public function setPernahDiklatKepengawasan($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->pernah_diklat_kepengawasan !== $v) {
            $this->pernah_diklat_kepengawasan = $v;
            $this->modifiedColumns[] = PtkPeer::PERNAH_DIKLAT_KEPENGAWASAN;
        }


        return $this;
    } // setPernahDiklatKepengawasan()

    /**
     * Set the value of [nm_wp] column.
     * 
     * @param string $v new value
     * @return Ptk The current object (for fluent API support)
     */
    public function setNmWp($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nm_wp !== $v) {
            $this->nm_wp = $v;
            $this->modifiedColumns[] = PtkPeer::NM_WP;
        }


        return $this;
    } // setNmWp()

    /**
     * Set the value of [status_data] column.
     * 
     * @param int $v new value
     * @return Ptk The current object (for fluent API support)
     */
    public function setStatusData($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->status_data !== $v) {
            $this->status_data = $v;
            $this->modifiedColumns[] = PtkPeer::STATUS_DATA;
        }


        return $this;
    } // setStatusData()

    /**
     * Set the value of [karpeg] column.
     * 
     * @param string $v new value
     * @return Ptk The current object (for fluent API support)
     */
    public function setKarpeg($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->karpeg !== $v) {
            $this->karpeg = $v;
            $this->modifiedColumns[] = PtkPeer::KARPEG;
        }


        return $this;
    } // setKarpeg()

    /**
     * Set the value of [karpas] column.
     * 
     * @param string $v new value
     * @return Ptk The current object (for fluent API support)
     */
    public function setKarpas($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->karpas !== $v) {
            $this->karpas = $v;
            $this->modifiedColumns[] = PtkPeer::KARPAS;
        }


        return $this;
    } // setKarpas()

    /**
     * Set the value of [mampu_handle_kk] column.
     * 
     * @param int $v new value
     * @return Ptk The current object (for fluent API support)
     */
    public function setMampuHandleKk($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->mampu_handle_kk !== $v) {
            $this->mampu_handle_kk = $v;
            $this->modifiedColumns[] = PtkPeer::MAMPU_HANDLE_KK;
        }

        if ($this->aKebutuhanKhusus !== null && $this->aKebutuhanKhusus->getKebutuhanKhususId() !== $v) {
            $this->aKebutuhanKhusus = null;
        }


        return $this;
    } // setMampuHandleKk()

    /**
     * Set the value of [keahlian_braille] column.
     * 
     * @param string $v new value
     * @return Ptk The current object (for fluent API support)
     */
    public function setKeahlianBraille($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->keahlian_braille !== $v) {
            $this->keahlian_braille = $v;
            $this->modifiedColumns[] = PtkPeer::KEAHLIAN_BRAILLE;
        }


        return $this;
    } // setKeahlianBraille()

    /**
     * Set the value of [keahlian_bhs_isyarat] column.
     * 
     * @param string $v new value
     * @return Ptk The current object (for fluent API support)
     */
    public function setKeahlianBhsIsyarat($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->keahlian_bhs_isyarat !== $v) {
            $this->keahlian_bhs_isyarat = $v;
            $this->modifiedColumns[] = PtkPeer::KEAHLIAN_BHS_ISYARAT;
        }


        return $this;
    } // setKeahlianBhsIsyarat()

    /**
     * Set the value of [npwp] column.
     * 
     * @param string $v new value
     * @return Ptk The current object (for fluent API support)
     */
    public function setNpwp($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->npwp !== $v) {
            $this->npwp = $v;
            $this->modifiedColumns[] = PtkPeer::NPWP;
        }


        return $this;
    } // setNpwp()

    /**
     * Set the value of [kewarganegaraan] column.
     * 
     * @param string $v new value
     * @return Ptk The current object (for fluent API support)
     */
    public function setKewarganegaraan($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->kewarganegaraan !== $v) {
            $this->kewarganegaraan = $v;
            $this->modifiedColumns[] = PtkPeer::KEWARGANEGARAAN;
        }

        if ($this->aNegara !== null && $this->aNegara->getNegaraId() !== $v) {
            $this->aNegara = null;
        }


        return $this;
    } // setKewarganegaraan()

    /**
     * Set the value of [id_bank] column.
     * 
     * @param string $v new value
     * @return Ptk The current object (for fluent API support)
     */
    public function setIdBank($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->id_bank !== $v) {
            $this->id_bank = $v;
            $this->modifiedColumns[] = PtkPeer::ID_BANK;
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
     * @return Ptk The current object (for fluent API support)
     */
    public function setRekeningBank($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->rekening_bank !== $v) {
            $this->rekening_bank = $v;
            $this->modifiedColumns[] = PtkPeer::REKENING_BANK;
        }


        return $this;
    } // setRekeningBank()

    /**
     * Set the value of [rekening_atas_nama] column.
     * 
     * @param string $v new value
     * @return Ptk The current object (for fluent API support)
     */
    public function setRekeningAtasNama($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->rekening_atas_nama !== $v) {
            $this->rekening_atas_nama = $v;
            $this->modifiedColumns[] = PtkPeer::REKENING_ATAS_NAMA;
        }


        return $this;
    } // setRekeningAtasNama()

    /**
     * Set the value of [blob_id] column.
     * 
     * @param string $v new value
     * @return Ptk The current object (for fluent API support)
     */
    public function setBlobId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->blob_id !== $v) {
            $this->blob_id = $v;
            $this->modifiedColumns[] = PtkPeer::BLOB_ID;
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
     * @return Ptk The current object (for fluent API support)
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
                $this->modifiedColumns[] = PtkPeer::CREATE_DATE;
            }
        } // if either are not null


        return $this;
    } // setCreateDate()

    /**
     * Sets the value of [last_update] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Ptk The current object (for fluent API support)
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
                $this->modifiedColumns[] = PtkPeer::LAST_UPDATE;
            }
        } // if either are not null


        return $this;
    } // setLastUpdate()

    /**
     * Set the value of [soft_delete] column.
     * 
     * @param string $v new value
     * @return Ptk The current object (for fluent API support)
     */
    public function setSoftDelete($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->soft_delete !== $v) {
            $this->soft_delete = $v;
            $this->modifiedColumns[] = PtkPeer::SOFT_DELETE;
        }


        return $this;
    } // setSoftDelete()

    /**
     * Sets the value of [last_sync] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Ptk The current object (for fluent API support)
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
                $this->modifiedColumns[] = PtkPeer::LAST_SYNC;
            }
        } // if either are not null


        return $this;
    } // setLastSync()

    /**
     * Set the value of [updater_id] column.
     * 
     * @param string $v new value
     * @return Ptk The current object (for fluent API support)
     */
    public function setUpdaterId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->updater_id !== $v) {
            $this->updater_id = $v;
            $this->modifiedColumns[] = PtkPeer::UPDATER_ID;
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
            if ($this->keahlian_braille !== '0') {
                return false;
            }

            if ($this->keahlian_bhs_isyarat !== '0') {
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

            $this->ptk_id = ($row[$startcol + 0] !== null) ? (string) $row[$startcol + 0] : null;
            $this->nama = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->nip = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->jenis_kelamin = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->tempat_lahir = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->tanggal_lahir = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->nik = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->no_kk = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->niy_nigk = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->nuptk = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
            $this->nrg = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
            $this->nuks = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
            $this->status_kepegawaian_id = ($row[$startcol + 12] !== null) ? (int) $row[$startcol + 12] : null;
            $this->jenis_ptk_id = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
            $this->pengawas_bidang_studi_id = ($row[$startcol + 14] !== null) ? (int) $row[$startcol + 14] : null;
            $this->agama_id = ($row[$startcol + 15] !== null) ? (int) $row[$startcol + 15] : null;
            $this->alamat_jalan = ($row[$startcol + 16] !== null) ? (string) $row[$startcol + 16] : null;
            $this->rt = ($row[$startcol + 17] !== null) ? (string) $row[$startcol + 17] : null;
            $this->rw = ($row[$startcol + 18] !== null) ? (string) $row[$startcol + 18] : null;
            $this->nama_dusun = ($row[$startcol + 19] !== null) ? (string) $row[$startcol + 19] : null;
            $this->desa_kelurahan = ($row[$startcol + 20] !== null) ? (string) $row[$startcol + 20] : null;
            $this->kode_wilayah = ($row[$startcol + 21] !== null) ? (string) $row[$startcol + 21] : null;
            $this->kode_pos = ($row[$startcol + 22] !== null) ? (string) $row[$startcol + 22] : null;
            $this->lintang = ($row[$startcol + 23] !== null) ? (string) $row[$startcol + 23] : null;
            $this->bujur = ($row[$startcol + 24] !== null) ? (string) $row[$startcol + 24] : null;
            $this->no_telepon_rumah = ($row[$startcol + 25] !== null) ? (string) $row[$startcol + 25] : null;
            $this->no_hp = ($row[$startcol + 26] !== null) ? (string) $row[$startcol + 26] : null;
            $this->email = ($row[$startcol + 27] !== null) ? (string) $row[$startcol + 27] : null;
            $this->status_keaktifan_id = ($row[$startcol + 28] !== null) ? (string) $row[$startcol + 28] : null;
            $this->sk_cpns = ($row[$startcol + 29] !== null) ? (string) $row[$startcol + 29] : null;
            $this->tgl_cpns = ($row[$startcol + 30] !== null) ? (string) $row[$startcol + 30] : null;
            $this->sk_pengangkatan = ($row[$startcol + 31] !== null) ? (string) $row[$startcol + 31] : null;
            $this->tmt_pengangkatan = ($row[$startcol + 32] !== null) ? (string) $row[$startcol + 32] : null;
            $this->lembaga_pengangkat_id = ($row[$startcol + 33] !== null) ? (string) $row[$startcol + 33] : null;
            $this->pangkat_golongan_id = ($row[$startcol + 34] !== null) ? (string) $row[$startcol + 34] : null;
            $this->keahlian_laboratorium_id = ($row[$startcol + 35] !== null) ? (int) $row[$startcol + 35] : null;
            $this->sumber_gaji_id = ($row[$startcol + 36] !== null) ? (string) $row[$startcol + 36] : null;
            $this->nama_ibu_kandung = ($row[$startcol + 37] !== null) ? (string) $row[$startcol + 37] : null;
            $this->status_perkawinan = ($row[$startcol + 38] !== null) ? (string) $row[$startcol + 38] : null;
            $this->nama_suami_istri = ($row[$startcol + 39] !== null) ? (string) $row[$startcol + 39] : null;
            $this->nip_suami_istri = ($row[$startcol + 40] !== null) ? (string) $row[$startcol + 40] : null;
            $this->pekerjaan_suami_istri = ($row[$startcol + 41] !== null) ? (int) $row[$startcol + 41] : null;
            $this->tmt_pns = ($row[$startcol + 42] !== null) ? (string) $row[$startcol + 42] : null;
            $this->sudah_lisensi_kepala_sekolah = ($row[$startcol + 43] !== null) ? (string) $row[$startcol + 43] : null;
            $this->jumlah_sekolah_binaan = ($row[$startcol + 44] !== null) ? (int) $row[$startcol + 44] : null;
            $this->pernah_diklat_kepengawasan = ($row[$startcol + 45] !== null) ? (string) $row[$startcol + 45] : null;
            $this->nm_wp = ($row[$startcol + 46] !== null) ? (string) $row[$startcol + 46] : null;
            $this->status_data = ($row[$startcol + 47] !== null) ? (int) $row[$startcol + 47] : null;
            $this->karpeg = ($row[$startcol + 48] !== null) ? (string) $row[$startcol + 48] : null;
            $this->karpas = ($row[$startcol + 49] !== null) ? (string) $row[$startcol + 49] : null;
            $this->mampu_handle_kk = ($row[$startcol + 50] !== null) ? (int) $row[$startcol + 50] : null;
            $this->keahlian_braille = ($row[$startcol + 51] !== null) ? (string) $row[$startcol + 51] : null;
            $this->keahlian_bhs_isyarat = ($row[$startcol + 52] !== null) ? (string) $row[$startcol + 52] : null;
            $this->npwp = ($row[$startcol + 53] !== null) ? (string) $row[$startcol + 53] : null;
            $this->kewarganegaraan = ($row[$startcol + 54] !== null) ? (string) $row[$startcol + 54] : null;
            $this->id_bank = ($row[$startcol + 55] !== null) ? (string) $row[$startcol + 55] : null;
            $this->rekening_bank = ($row[$startcol + 56] !== null) ? (string) $row[$startcol + 56] : null;
            $this->rekening_atas_nama = ($row[$startcol + 57] !== null) ? (string) $row[$startcol + 57] : null;
            $this->blob_id = ($row[$startcol + 58] !== null) ? (string) $row[$startcol + 58] : null;
            $this->create_date = ($row[$startcol + 59] !== null) ? (string) $row[$startcol + 59] : null;
            $this->last_update = ($row[$startcol + 60] !== null) ? (string) $row[$startcol + 60] : null;
            $this->soft_delete = ($row[$startcol + 61] !== null) ? (string) $row[$startcol + 61] : null;
            $this->last_sync = ($row[$startcol + 62] !== null) ? (string) $row[$startcol + 62] : null;
            $this->updater_id = ($row[$startcol + 63] !== null) ? (string) $row[$startcol + 63] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 64; // 64 = PtkPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Ptk object", $e);
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

        if ($this->aStatusKepegawaian !== null && $this->status_kepegawaian_id !== $this->aStatusKepegawaian->getStatusKepegawaianId()) {
            $this->aStatusKepegawaian = null;
        }
        if ($this->aJenisPtk !== null && $this->jenis_ptk_id !== $this->aJenisPtk->getJenisPtkId()) {
            $this->aJenisPtk = null;
        }
        if ($this->aBidangStudi !== null && $this->pengawas_bidang_studi_id !== $this->aBidangStudi->getBidangStudiId()) {
            $this->aBidangStudi = null;
        }
        if ($this->aAgama !== null && $this->agama_id !== $this->aAgama->getAgamaId()) {
            $this->aAgama = null;
        }
        if ($this->aMstWilayah !== null && $this->kode_wilayah !== $this->aMstWilayah->getKodeWilayah()) {
            $this->aMstWilayah = null;
        }
        if ($this->aStatusKeaktifanPegawai !== null && $this->status_keaktifan_id !== $this->aStatusKeaktifanPegawai->getStatusKeaktifanId()) {
            $this->aStatusKeaktifanPegawai = null;
        }
        if ($this->aLembagaPengangkat !== null && $this->lembaga_pengangkat_id !== $this->aLembagaPengangkat->getLembagaPengangkatId()) {
            $this->aLembagaPengangkat = null;
        }
        if ($this->aPangkatGolongan !== null && $this->pangkat_golongan_id !== $this->aPangkatGolongan->getPangkatGolonganId()) {
            $this->aPangkatGolongan = null;
        }
        if ($this->aKeahlianLaboratorium !== null && $this->keahlian_laboratorium_id !== $this->aKeahlianLaboratorium->getKeahlianLaboratoriumId()) {
            $this->aKeahlianLaboratorium = null;
        }
        if ($this->aSumberGaji !== null && $this->sumber_gaji_id !== $this->aSumberGaji->getSumberGajiId()) {
            $this->aSumberGaji = null;
        }
        if ($this->aPekerjaan !== null && $this->pekerjaan_suami_istri !== $this->aPekerjaan->getPekerjaanId()) {
            $this->aPekerjaan = null;
        }
        if ($this->aKebutuhanKhusus !== null && $this->mampu_handle_kk !== $this->aKebutuhanKhusus->getKebutuhanKhususId()) {
            $this->aKebutuhanKhusus = null;
        }
        if ($this->aNegara !== null && $this->kewarganegaraan !== $this->aNegara->getNegaraId()) {
            $this->aNegara = null;
        }
        if ($this->aBank !== null && $this->id_bank !== $this->aBank->getIdBank()) {
            $this->aBank = null;
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
            $con = Propel::getConnection(PtkPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = PtkPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aNegara = null;
            $this->aBank = null;
            $this->aLargeObject = null;
            $this->aJenisPtk = null;
            $this->aMstWilayah = null;
            $this->aKebutuhanKhusus = null;
            $this->aLembagaPengangkat = null;
            $this->aStatusKeaktifanPegawai = null;
            $this->aSumberGaji = null;
            $this->aPangkatGolongan = null;
            $this->aBidangStudi = null;
            $this->aKeahlianLaboratorium = null;
            $this->aPekerjaan = null;
            $this->aAgama = null;
            $this->aStatusKepegawaian = null;
            $this->collAlats = null;

            $this->collAnaks = null;

            $this->collAnggotaPanitias = null;

            $this->collAngkutans = null;

            $this->collBangunans = null;

            $this->collBeasiswaPtks = null;

            $this->collBidangSdms = null;

            $this->collBimbingPds = null;

            $this->collBukuPtks = null;

            $this->collDiklats = null;

            $this->collInpassings = null;

            $this->collKaryaTuliss = null;

            $this->collKesejahteraans = null;

            $this->collKitasPtks = null;

            $this->collNilaiTests = null;

            $this->collPasporPtks = null;

            $this->collPengawasTerdaftars = null;

            $this->collPenghargaans = null;

            $this->collPtkBarus = null;

            $this->collPtkTerdaftars = null;

            $this->collRiwayatGajiBerkalas = null;

            $this->collRombonganBelajars = null;

            $this->collRwyFungsionals = null;

            $this->collRwyKepangkatans = null;

            $this->collRwyKerjas = null;

            $this->collRwyPendFormals = null;

            $this->collRwySertifikasis = null;

            $this->collRwyStrukturals = null;

            $this->collTugasTambahans = null;

            $this->collTunjangans = null;

            $this->collVldPtks = null;

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
            $con = Propel::getConnection(PtkPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = PtkQuery::create()
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
            $con = Propel::getConnection(PtkPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                PtkPeer::addInstanceToPool($this);
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

            if ($this->aNegara !== null) {
                if ($this->aNegara->isModified() || $this->aNegara->isNew()) {
                    $affectedRows += $this->aNegara->save($con);
                }
                $this->setNegara($this->aNegara);
            }

            if ($this->aBank !== null) {
                if ($this->aBank->isModified() || $this->aBank->isNew()) {
                    $affectedRows += $this->aBank->save($con);
                }
                $this->setBank($this->aBank);
            }

            if ($this->aLargeObject !== null) {
                if ($this->aLargeObject->isModified() || $this->aLargeObject->isNew()) {
                    $affectedRows += $this->aLargeObject->save($con);
                }
                $this->setLargeObject($this->aLargeObject);
            }

            if ($this->aJenisPtk !== null) {
                if ($this->aJenisPtk->isModified() || $this->aJenisPtk->isNew()) {
                    $affectedRows += $this->aJenisPtk->save($con);
                }
                $this->setJenisPtk($this->aJenisPtk);
            }

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

            if ($this->aLembagaPengangkat !== null) {
                if ($this->aLembagaPengangkat->isModified() || $this->aLembagaPengangkat->isNew()) {
                    $affectedRows += $this->aLembagaPengangkat->save($con);
                }
                $this->setLembagaPengangkat($this->aLembagaPengangkat);
            }

            if ($this->aStatusKeaktifanPegawai !== null) {
                if ($this->aStatusKeaktifanPegawai->isModified() || $this->aStatusKeaktifanPegawai->isNew()) {
                    $affectedRows += $this->aStatusKeaktifanPegawai->save($con);
                }
                $this->setStatusKeaktifanPegawai($this->aStatusKeaktifanPegawai);
            }

            if ($this->aSumberGaji !== null) {
                if ($this->aSumberGaji->isModified() || $this->aSumberGaji->isNew()) {
                    $affectedRows += $this->aSumberGaji->save($con);
                }
                $this->setSumberGaji($this->aSumberGaji);
            }

            if ($this->aPangkatGolongan !== null) {
                if ($this->aPangkatGolongan->isModified() || $this->aPangkatGolongan->isNew()) {
                    $affectedRows += $this->aPangkatGolongan->save($con);
                }
                $this->setPangkatGolongan($this->aPangkatGolongan);
            }

            if ($this->aBidangStudi !== null) {
                if ($this->aBidangStudi->isModified() || $this->aBidangStudi->isNew()) {
                    $affectedRows += $this->aBidangStudi->save($con);
                }
                $this->setBidangStudi($this->aBidangStudi);
            }

            if ($this->aKeahlianLaboratorium !== null) {
                if ($this->aKeahlianLaboratorium->isModified() || $this->aKeahlianLaboratorium->isNew()) {
                    $affectedRows += $this->aKeahlianLaboratorium->save($con);
                }
                $this->setKeahlianLaboratorium($this->aKeahlianLaboratorium);
            }

            if ($this->aPekerjaan !== null) {
                if ($this->aPekerjaan->isModified() || $this->aPekerjaan->isNew()) {
                    $affectedRows += $this->aPekerjaan->save($con);
                }
                $this->setPekerjaan($this->aPekerjaan);
            }

            if ($this->aAgama !== null) {
                if ($this->aAgama->isModified() || $this->aAgama->isNew()) {
                    $affectedRows += $this->aAgama->save($con);
                }
                $this->setAgama($this->aAgama);
            }

            if ($this->aStatusKepegawaian !== null) {
                if ($this->aStatusKepegawaian->isModified() || $this->aStatusKepegawaian->isNew()) {
                    $affectedRows += $this->aStatusKepegawaian->save($con);
                }
                $this->setStatusKepegawaian($this->aStatusKepegawaian);
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

            if ($this->anaksScheduledForDeletion !== null) {
                if (!$this->anaksScheduledForDeletion->isEmpty()) {
                    AnakQuery::create()
                        ->filterByPrimaryKeys($this->anaksScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->anaksScheduledForDeletion = null;
                }
            }

            if ($this->collAnaks !== null) {
                foreach ($this->collAnaks as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
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

            if ($this->angkutansScheduledForDeletion !== null) {
                if (!$this->angkutansScheduledForDeletion->isEmpty()) {
                    foreach ($this->angkutansScheduledForDeletion as $angkutan) {
                        // need to save related object because we set the relation to null
                        $angkutan->save($con);
                    }
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

            if ($this->beasiswaPtksScheduledForDeletion !== null) {
                if (!$this->beasiswaPtksScheduledForDeletion->isEmpty()) {
                    BeasiswaPtkQuery::create()
                        ->filterByPrimaryKeys($this->beasiswaPtksScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->beasiswaPtksScheduledForDeletion = null;
                }
            }

            if ($this->collBeasiswaPtks !== null) {
                foreach ($this->collBeasiswaPtks as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->bidangSdmsScheduledForDeletion !== null) {
                if (!$this->bidangSdmsScheduledForDeletion->isEmpty()) {
                    BidangSdmQuery::create()
                        ->filterByPrimaryKeys($this->bidangSdmsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->bidangSdmsScheduledForDeletion = null;
                }
            }

            if ($this->collBidangSdms !== null) {
                foreach ($this->collBidangSdms as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->bimbingPdsScheduledForDeletion !== null) {
                if (!$this->bimbingPdsScheduledForDeletion->isEmpty()) {
                    BimbingPdQuery::create()
                        ->filterByPrimaryKeys($this->bimbingPdsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->bimbingPdsScheduledForDeletion = null;
                }
            }

            if ($this->collBimbingPds !== null) {
                foreach ($this->collBimbingPds as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->bukuPtksScheduledForDeletion !== null) {
                if (!$this->bukuPtksScheduledForDeletion->isEmpty()) {
                    BukuPtkQuery::create()
                        ->filterByPrimaryKeys($this->bukuPtksScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->bukuPtksScheduledForDeletion = null;
                }
            }

            if ($this->collBukuPtks !== null) {
                foreach ($this->collBukuPtks as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->diklatsScheduledForDeletion !== null) {
                if (!$this->diklatsScheduledForDeletion->isEmpty()) {
                    DiklatQuery::create()
                        ->filterByPrimaryKeys($this->diklatsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->diklatsScheduledForDeletion = null;
                }
            }

            if ($this->collDiklats !== null) {
                foreach ($this->collDiklats as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->inpassingsScheduledForDeletion !== null) {
                if (!$this->inpassingsScheduledForDeletion->isEmpty()) {
                    foreach ($this->inpassingsScheduledForDeletion as $inpassing) {
                        // need to save related object because we set the relation to null
                        $inpassing->save($con);
                    }
                    $this->inpassingsScheduledForDeletion = null;
                }
            }

            if ($this->collInpassings !== null) {
                foreach ($this->collInpassings as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->karyaTulissScheduledForDeletion !== null) {
                if (!$this->karyaTulissScheduledForDeletion->isEmpty()) {
                    KaryaTulisQuery::create()
                        ->filterByPrimaryKeys($this->karyaTulissScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->karyaTulissScheduledForDeletion = null;
                }
            }

            if ($this->collKaryaTuliss !== null) {
                foreach ($this->collKaryaTuliss as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->kesejahteraansScheduledForDeletion !== null) {
                if (!$this->kesejahteraansScheduledForDeletion->isEmpty()) {
                    KesejahteraanQuery::create()
                        ->filterByPrimaryKeys($this->kesejahteraansScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->kesejahteraansScheduledForDeletion = null;
                }
            }

            if ($this->collKesejahteraans !== null) {
                foreach ($this->collKesejahteraans as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->kitasPtksScheduledForDeletion !== null) {
                if (!$this->kitasPtksScheduledForDeletion->isEmpty()) {
                    KitasPtkQuery::create()
                        ->filterByPrimaryKeys($this->kitasPtksScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->kitasPtksScheduledForDeletion = null;
                }
            }

            if ($this->collKitasPtks !== null) {
                foreach ($this->collKitasPtks as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->nilaiTestsScheduledForDeletion !== null) {
                if (!$this->nilaiTestsScheduledForDeletion->isEmpty()) {
                    NilaiTestQuery::create()
                        ->filterByPrimaryKeys($this->nilaiTestsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->nilaiTestsScheduledForDeletion = null;
                }
            }

            if ($this->collNilaiTests !== null) {
                foreach ($this->collNilaiTests as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->pasporPtksScheduledForDeletion !== null) {
                if (!$this->pasporPtksScheduledForDeletion->isEmpty()) {
                    PasporPtkQuery::create()
                        ->filterByPrimaryKeys($this->pasporPtksScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->pasporPtksScheduledForDeletion = null;
                }
            }

            if ($this->collPasporPtks !== null) {
                foreach ($this->collPasporPtks as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->pengawasTerdaftarsScheduledForDeletion !== null) {
                if (!$this->pengawasTerdaftarsScheduledForDeletion->isEmpty()) {
                    PengawasTerdaftarQuery::create()
                        ->filterByPrimaryKeys($this->pengawasTerdaftarsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->pengawasTerdaftarsScheduledForDeletion = null;
                }
            }

            if ($this->collPengawasTerdaftars !== null) {
                foreach ($this->collPengawasTerdaftars as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->penghargaansScheduledForDeletion !== null) {
                if (!$this->penghargaansScheduledForDeletion->isEmpty()) {
                    PenghargaanQuery::create()
                        ->filterByPrimaryKeys($this->penghargaansScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->penghargaansScheduledForDeletion = null;
                }
            }

            if ($this->collPenghargaans !== null) {
                foreach ($this->collPenghargaans as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->ptkBarusScheduledForDeletion !== null) {
                if (!$this->ptkBarusScheduledForDeletion->isEmpty()) {
                    foreach ($this->ptkBarusScheduledForDeletion as $ptkBaru) {
                        // need to save related object because we set the relation to null
                        $ptkBaru->save($con);
                    }
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

            if ($this->riwayatGajiBerkalasScheduledForDeletion !== null) {
                if (!$this->riwayatGajiBerkalasScheduledForDeletion->isEmpty()) {
                    RiwayatGajiBerkalaQuery::create()
                        ->filterByPrimaryKeys($this->riwayatGajiBerkalasScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->riwayatGajiBerkalasScheduledForDeletion = null;
                }
            }

            if ($this->collRiwayatGajiBerkalas !== null) {
                foreach ($this->collRiwayatGajiBerkalas as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->rombonganBelajarsScheduledForDeletion !== null) {
                if (!$this->rombonganBelajarsScheduledForDeletion->isEmpty()) {
                    foreach ($this->rombonganBelajarsScheduledForDeletion as $rombonganBelajar) {
                        // need to save related object because we set the relation to null
                        $rombonganBelajar->save($con);
                    }
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

            if ($this->rwyFungsionalsScheduledForDeletion !== null) {
                if (!$this->rwyFungsionalsScheduledForDeletion->isEmpty()) {
                    RwyFungsionalQuery::create()
                        ->filterByPrimaryKeys($this->rwyFungsionalsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->rwyFungsionalsScheduledForDeletion = null;
                }
            }

            if ($this->collRwyFungsionals !== null) {
                foreach ($this->collRwyFungsionals as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->rwyKepangkatansScheduledForDeletion !== null) {
                if (!$this->rwyKepangkatansScheduledForDeletion->isEmpty()) {
                    RwyKepangkatanQuery::create()
                        ->filterByPrimaryKeys($this->rwyKepangkatansScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->rwyKepangkatansScheduledForDeletion = null;
                }
            }

            if ($this->collRwyKepangkatans !== null) {
                foreach ($this->collRwyKepangkatans as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->rwyKerjasScheduledForDeletion !== null) {
                if (!$this->rwyKerjasScheduledForDeletion->isEmpty()) {
                    RwyKerjaQuery::create()
                        ->filterByPrimaryKeys($this->rwyKerjasScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->rwyKerjasScheduledForDeletion = null;
                }
            }

            if ($this->collRwyKerjas !== null) {
                foreach ($this->collRwyKerjas as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->rwyPendFormalsScheduledForDeletion !== null) {
                if (!$this->rwyPendFormalsScheduledForDeletion->isEmpty()) {
                    RwyPendFormalQuery::create()
                        ->filterByPrimaryKeys($this->rwyPendFormalsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->rwyPendFormalsScheduledForDeletion = null;
                }
            }

            if ($this->collRwyPendFormals !== null) {
                foreach ($this->collRwyPendFormals as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->rwySertifikasisScheduledForDeletion !== null) {
                if (!$this->rwySertifikasisScheduledForDeletion->isEmpty()) {
                    RwySertifikasiQuery::create()
                        ->filterByPrimaryKeys($this->rwySertifikasisScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->rwySertifikasisScheduledForDeletion = null;
                }
            }

            if ($this->collRwySertifikasis !== null) {
                foreach ($this->collRwySertifikasis as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->rwyStrukturalsScheduledForDeletion !== null) {
                if (!$this->rwyStrukturalsScheduledForDeletion->isEmpty()) {
                    RwyStrukturalQuery::create()
                        ->filterByPrimaryKeys($this->rwyStrukturalsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->rwyStrukturalsScheduledForDeletion = null;
                }
            }

            if ($this->collRwyStrukturals !== null) {
                foreach ($this->collRwyStrukturals as $referrerFK) {
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

            if ($this->tunjangansScheduledForDeletion !== null) {
                if (!$this->tunjangansScheduledForDeletion->isEmpty()) {
                    TunjanganQuery::create()
                        ->filterByPrimaryKeys($this->tunjangansScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->tunjangansScheduledForDeletion = null;
                }
            }

            if ($this->collTunjangans !== null) {
                foreach ($this->collTunjangans as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->vldPtksScheduledForDeletion !== null) {
                if (!$this->vldPtksScheduledForDeletion->isEmpty()) {
                    VldPtkQuery::create()
                        ->filterByPrimaryKeys($this->vldPtksScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->vldPtksScheduledForDeletion = null;
                }
            }

            if ($this->collVldPtks !== null) {
                foreach ($this->collVldPtks as $referrerFK) {
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
        if ($this->isColumnModified(PtkPeer::PTK_ID)) {
            $modifiedColumns[':p' . $index++]  = '"ptk_id"';
        }
        if ($this->isColumnModified(PtkPeer::NAMA)) {
            $modifiedColumns[':p' . $index++]  = '"nama"';
        }
        if ($this->isColumnModified(PtkPeer::NIP)) {
            $modifiedColumns[':p' . $index++]  = '"nip"';
        }
        if ($this->isColumnModified(PtkPeer::JENIS_KELAMIN)) {
            $modifiedColumns[':p' . $index++]  = '"jenis_kelamin"';
        }
        if ($this->isColumnModified(PtkPeer::TEMPAT_LAHIR)) {
            $modifiedColumns[':p' . $index++]  = '"tempat_lahir"';
        }
        if ($this->isColumnModified(PtkPeer::TANGGAL_LAHIR)) {
            $modifiedColumns[':p' . $index++]  = '"tanggal_lahir"';
        }
        if ($this->isColumnModified(PtkPeer::NIK)) {
            $modifiedColumns[':p' . $index++]  = '"nik"';
        }
        if ($this->isColumnModified(PtkPeer::NO_KK)) {
            $modifiedColumns[':p' . $index++]  = '"no_kk"';
        }
        if ($this->isColumnModified(PtkPeer::NIY_NIGK)) {
            $modifiedColumns[':p' . $index++]  = '"niy_nigk"';
        }
        if ($this->isColumnModified(PtkPeer::NUPTK)) {
            $modifiedColumns[':p' . $index++]  = '"nuptk"';
        }
        if ($this->isColumnModified(PtkPeer::NRG)) {
            $modifiedColumns[':p' . $index++]  = '"nrg"';
        }
        if ($this->isColumnModified(PtkPeer::NUKS)) {
            $modifiedColumns[':p' . $index++]  = '"nuks"';
        }
        if ($this->isColumnModified(PtkPeer::STATUS_KEPEGAWAIAN_ID)) {
            $modifiedColumns[':p' . $index++]  = '"status_kepegawaian_id"';
        }
        if ($this->isColumnModified(PtkPeer::JENIS_PTK_ID)) {
            $modifiedColumns[':p' . $index++]  = '"jenis_ptk_id"';
        }
        if ($this->isColumnModified(PtkPeer::PENGAWAS_BIDANG_STUDI_ID)) {
            $modifiedColumns[':p' . $index++]  = '"pengawas_bidang_studi_id"';
        }
        if ($this->isColumnModified(PtkPeer::AGAMA_ID)) {
            $modifiedColumns[':p' . $index++]  = '"agama_id"';
        }
        if ($this->isColumnModified(PtkPeer::ALAMAT_JALAN)) {
            $modifiedColumns[':p' . $index++]  = '"alamat_jalan"';
        }
        if ($this->isColumnModified(PtkPeer::RT)) {
            $modifiedColumns[':p' . $index++]  = '"rt"';
        }
        if ($this->isColumnModified(PtkPeer::RW)) {
            $modifiedColumns[':p' . $index++]  = '"rw"';
        }
        if ($this->isColumnModified(PtkPeer::NAMA_DUSUN)) {
            $modifiedColumns[':p' . $index++]  = '"nama_dusun"';
        }
        if ($this->isColumnModified(PtkPeer::DESA_KELURAHAN)) {
            $modifiedColumns[':p' . $index++]  = '"desa_kelurahan"';
        }
        if ($this->isColumnModified(PtkPeer::KODE_WILAYAH)) {
            $modifiedColumns[':p' . $index++]  = '"kode_wilayah"';
        }
        if ($this->isColumnModified(PtkPeer::KODE_POS)) {
            $modifiedColumns[':p' . $index++]  = '"kode_pos"';
        }
        if ($this->isColumnModified(PtkPeer::LINTANG)) {
            $modifiedColumns[':p' . $index++]  = '"lintang"';
        }
        if ($this->isColumnModified(PtkPeer::BUJUR)) {
            $modifiedColumns[':p' . $index++]  = '"bujur"';
        }
        if ($this->isColumnModified(PtkPeer::NO_TELEPON_RUMAH)) {
            $modifiedColumns[':p' . $index++]  = '"no_telepon_rumah"';
        }
        if ($this->isColumnModified(PtkPeer::NO_HP)) {
            $modifiedColumns[':p' . $index++]  = '"no_hp"';
        }
        if ($this->isColumnModified(PtkPeer::EMAIL)) {
            $modifiedColumns[':p' . $index++]  = '"email"';
        }
        if ($this->isColumnModified(PtkPeer::STATUS_KEAKTIFAN_ID)) {
            $modifiedColumns[':p' . $index++]  = '"status_keaktifan_id"';
        }
        if ($this->isColumnModified(PtkPeer::SK_CPNS)) {
            $modifiedColumns[':p' . $index++]  = '"sk_cpns"';
        }
        if ($this->isColumnModified(PtkPeer::TGL_CPNS)) {
            $modifiedColumns[':p' . $index++]  = '"tgl_cpns"';
        }
        if ($this->isColumnModified(PtkPeer::SK_PENGANGKATAN)) {
            $modifiedColumns[':p' . $index++]  = '"sk_pengangkatan"';
        }
        if ($this->isColumnModified(PtkPeer::TMT_PENGANGKATAN)) {
            $modifiedColumns[':p' . $index++]  = '"tmt_pengangkatan"';
        }
        if ($this->isColumnModified(PtkPeer::LEMBAGA_PENGANGKAT_ID)) {
            $modifiedColumns[':p' . $index++]  = '"lembaga_pengangkat_id"';
        }
        if ($this->isColumnModified(PtkPeer::PANGKAT_GOLONGAN_ID)) {
            $modifiedColumns[':p' . $index++]  = '"pangkat_golongan_id"';
        }
        if ($this->isColumnModified(PtkPeer::KEAHLIAN_LABORATORIUM_ID)) {
            $modifiedColumns[':p' . $index++]  = '"keahlian_laboratorium_id"';
        }
        if ($this->isColumnModified(PtkPeer::SUMBER_GAJI_ID)) {
            $modifiedColumns[':p' . $index++]  = '"sumber_gaji_id"';
        }
        if ($this->isColumnModified(PtkPeer::NAMA_IBU_KANDUNG)) {
            $modifiedColumns[':p' . $index++]  = '"nama_ibu_kandung"';
        }
        if ($this->isColumnModified(PtkPeer::STATUS_PERKAWINAN)) {
            $modifiedColumns[':p' . $index++]  = '"status_perkawinan"';
        }
        if ($this->isColumnModified(PtkPeer::NAMA_SUAMI_ISTRI)) {
            $modifiedColumns[':p' . $index++]  = '"nama_suami_istri"';
        }
        if ($this->isColumnModified(PtkPeer::NIP_SUAMI_ISTRI)) {
            $modifiedColumns[':p' . $index++]  = '"nip_suami_istri"';
        }
        if ($this->isColumnModified(PtkPeer::PEKERJAAN_SUAMI_ISTRI)) {
            $modifiedColumns[':p' . $index++]  = '"pekerjaan_suami_istri"';
        }
        if ($this->isColumnModified(PtkPeer::TMT_PNS)) {
            $modifiedColumns[':p' . $index++]  = '"tmt_pns"';
        }
        if ($this->isColumnModified(PtkPeer::SUDAH_LISENSI_KEPALA_SEKOLAH)) {
            $modifiedColumns[':p' . $index++]  = '"sudah_lisensi_kepala_sekolah"';
        }
        if ($this->isColumnModified(PtkPeer::JUMLAH_SEKOLAH_BINAAN)) {
            $modifiedColumns[':p' . $index++]  = '"jumlah_sekolah_binaan"';
        }
        if ($this->isColumnModified(PtkPeer::PERNAH_DIKLAT_KEPENGAWASAN)) {
            $modifiedColumns[':p' . $index++]  = '"pernah_diklat_kepengawasan"';
        }
        if ($this->isColumnModified(PtkPeer::NM_WP)) {
            $modifiedColumns[':p' . $index++]  = '"nm_wp"';
        }
        if ($this->isColumnModified(PtkPeer::STATUS_DATA)) {
            $modifiedColumns[':p' . $index++]  = '"status_data"';
        }
        if ($this->isColumnModified(PtkPeer::KARPEG)) {
            $modifiedColumns[':p' . $index++]  = '"karpeg"';
        }
        if ($this->isColumnModified(PtkPeer::KARPAS)) {
            $modifiedColumns[':p' . $index++]  = '"karpas"';
        }
        if ($this->isColumnModified(PtkPeer::MAMPU_HANDLE_KK)) {
            $modifiedColumns[':p' . $index++]  = '"mampu_handle_kk"';
        }
        if ($this->isColumnModified(PtkPeer::KEAHLIAN_BRAILLE)) {
            $modifiedColumns[':p' . $index++]  = '"keahlian_braille"';
        }
        if ($this->isColumnModified(PtkPeer::KEAHLIAN_BHS_ISYARAT)) {
            $modifiedColumns[':p' . $index++]  = '"keahlian_bhs_isyarat"';
        }
        if ($this->isColumnModified(PtkPeer::NPWP)) {
            $modifiedColumns[':p' . $index++]  = '"npwp"';
        }
        if ($this->isColumnModified(PtkPeer::KEWARGANEGARAAN)) {
            $modifiedColumns[':p' . $index++]  = '"kewarganegaraan"';
        }
        if ($this->isColumnModified(PtkPeer::ID_BANK)) {
            $modifiedColumns[':p' . $index++]  = '"id_bank"';
        }
        if ($this->isColumnModified(PtkPeer::REKENING_BANK)) {
            $modifiedColumns[':p' . $index++]  = '"rekening_bank"';
        }
        if ($this->isColumnModified(PtkPeer::REKENING_ATAS_NAMA)) {
            $modifiedColumns[':p' . $index++]  = '"rekening_atas_nama"';
        }
        if ($this->isColumnModified(PtkPeer::BLOB_ID)) {
            $modifiedColumns[':p' . $index++]  = '"blob_id"';
        }
        if ($this->isColumnModified(PtkPeer::CREATE_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"create_date"';
        }
        if ($this->isColumnModified(PtkPeer::LAST_UPDATE)) {
            $modifiedColumns[':p' . $index++]  = '"last_update"';
        }
        if ($this->isColumnModified(PtkPeer::SOFT_DELETE)) {
            $modifiedColumns[':p' . $index++]  = '"soft_delete"';
        }
        if ($this->isColumnModified(PtkPeer::LAST_SYNC)) {
            $modifiedColumns[':p' . $index++]  = '"last_sync"';
        }
        if ($this->isColumnModified(PtkPeer::UPDATER_ID)) {
            $modifiedColumns[':p' . $index++]  = '"updater_id"';
        }

        $sql = sprintf(
            'INSERT INTO "ptk" (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '"ptk_id"':						
                        $stmt->bindValue($identifier, $this->ptk_id, PDO::PARAM_STR);
                        break;
                    case '"nama"':						
                        $stmt->bindValue($identifier, $this->nama, PDO::PARAM_STR);
                        break;
                    case '"nip"':						
                        $stmt->bindValue($identifier, $this->nip, PDO::PARAM_STR);
                        break;
                    case '"jenis_kelamin"':						
                        $stmt->bindValue($identifier, $this->jenis_kelamin, PDO::PARAM_STR);
                        break;
                    case '"tempat_lahir"':						
                        $stmt->bindValue($identifier, $this->tempat_lahir, PDO::PARAM_STR);
                        break;
                    case '"tanggal_lahir"':						
                        $stmt->bindValue($identifier, $this->tanggal_lahir, PDO::PARAM_STR);
                        break;
                    case '"nik"':						
                        $stmt->bindValue($identifier, $this->nik, PDO::PARAM_STR);
                        break;
                    case '"no_kk"':						
                        $stmt->bindValue($identifier, $this->no_kk, PDO::PARAM_STR);
                        break;
                    case '"niy_nigk"':						
                        $stmt->bindValue($identifier, $this->niy_nigk, PDO::PARAM_STR);
                        break;
                    case '"nuptk"':						
                        $stmt->bindValue($identifier, $this->nuptk, PDO::PARAM_STR);
                        break;
                    case '"nrg"':						
                        $stmt->bindValue($identifier, $this->nrg, PDO::PARAM_STR);
                        break;
                    case '"nuks"':						
                        $stmt->bindValue($identifier, $this->nuks, PDO::PARAM_STR);
                        break;
                    case '"status_kepegawaian_id"':						
                        $stmt->bindValue($identifier, $this->status_kepegawaian_id, PDO::PARAM_INT);
                        break;
                    case '"jenis_ptk_id"':						
                        $stmt->bindValue($identifier, $this->jenis_ptk_id, PDO::PARAM_STR);
                        break;
                    case '"pengawas_bidang_studi_id"':						
                        $stmt->bindValue($identifier, $this->pengawas_bidang_studi_id, PDO::PARAM_INT);
                        break;
                    case '"agama_id"':						
                        $stmt->bindValue($identifier, $this->agama_id, PDO::PARAM_INT);
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
                    case '"no_telepon_rumah"':						
                        $stmt->bindValue($identifier, $this->no_telepon_rumah, PDO::PARAM_STR);
                        break;
                    case '"no_hp"':						
                        $stmt->bindValue($identifier, $this->no_hp, PDO::PARAM_STR);
                        break;
                    case '"email"':						
                        $stmt->bindValue($identifier, $this->email, PDO::PARAM_STR);
                        break;
                    case '"status_keaktifan_id"':						
                        $stmt->bindValue($identifier, $this->status_keaktifan_id, PDO::PARAM_STR);
                        break;
                    case '"sk_cpns"':						
                        $stmt->bindValue($identifier, $this->sk_cpns, PDO::PARAM_STR);
                        break;
                    case '"tgl_cpns"':						
                        $stmt->bindValue($identifier, $this->tgl_cpns, PDO::PARAM_STR);
                        break;
                    case '"sk_pengangkatan"':						
                        $stmt->bindValue($identifier, $this->sk_pengangkatan, PDO::PARAM_STR);
                        break;
                    case '"tmt_pengangkatan"':						
                        $stmt->bindValue($identifier, $this->tmt_pengangkatan, PDO::PARAM_STR);
                        break;
                    case '"lembaga_pengangkat_id"':						
                        $stmt->bindValue($identifier, $this->lembaga_pengangkat_id, PDO::PARAM_STR);
                        break;
                    case '"pangkat_golongan_id"':						
                        $stmt->bindValue($identifier, $this->pangkat_golongan_id, PDO::PARAM_STR);
                        break;
                    case '"keahlian_laboratorium_id"':						
                        $stmt->bindValue($identifier, $this->keahlian_laboratorium_id, PDO::PARAM_INT);
                        break;
                    case '"sumber_gaji_id"':						
                        $stmt->bindValue($identifier, $this->sumber_gaji_id, PDO::PARAM_STR);
                        break;
                    case '"nama_ibu_kandung"':						
                        $stmt->bindValue($identifier, $this->nama_ibu_kandung, PDO::PARAM_STR);
                        break;
                    case '"status_perkawinan"':						
                        $stmt->bindValue($identifier, $this->status_perkawinan, PDO::PARAM_STR);
                        break;
                    case '"nama_suami_istri"':						
                        $stmt->bindValue($identifier, $this->nama_suami_istri, PDO::PARAM_STR);
                        break;
                    case '"nip_suami_istri"':						
                        $stmt->bindValue($identifier, $this->nip_suami_istri, PDO::PARAM_STR);
                        break;
                    case '"pekerjaan_suami_istri"':						
                        $stmt->bindValue($identifier, $this->pekerjaan_suami_istri, PDO::PARAM_INT);
                        break;
                    case '"tmt_pns"':						
                        $stmt->bindValue($identifier, $this->tmt_pns, PDO::PARAM_STR);
                        break;
                    case '"sudah_lisensi_kepala_sekolah"':						
                        $stmt->bindValue($identifier, $this->sudah_lisensi_kepala_sekolah, PDO::PARAM_STR);
                        break;
                    case '"jumlah_sekolah_binaan"':						
                        $stmt->bindValue($identifier, $this->jumlah_sekolah_binaan, PDO::PARAM_INT);
                        break;
                    case '"pernah_diklat_kepengawasan"':						
                        $stmt->bindValue($identifier, $this->pernah_diklat_kepengawasan, PDO::PARAM_STR);
                        break;
                    case '"nm_wp"':						
                        $stmt->bindValue($identifier, $this->nm_wp, PDO::PARAM_STR);
                        break;
                    case '"status_data"':						
                        $stmt->bindValue($identifier, $this->status_data, PDO::PARAM_INT);
                        break;
                    case '"karpeg"':						
                        $stmt->bindValue($identifier, $this->karpeg, PDO::PARAM_STR);
                        break;
                    case '"karpas"':						
                        $stmt->bindValue($identifier, $this->karpas, PDO::PARAM_STR);
                        break;
                    case '"mampu_handle_kk"':						
                        $stmt->bindValue($identifier, $this->mampu_handle_kk, PDO::PARAM_INT);
                        break;
                    case '"keahlian_braille"':						
                        $stmt->bindValue($identifier, $this->keahlian_braille, PDO::PARAM_STR);
                        break;
                    case '"keahlian_bhs_isyarat"':						
                        $stmt->bindValue($identifier, $this->keahlian_bhs_isyarat, PDO::PARAM_STR);
                        break;
                    case '"npwp"':						
                        $stmt->bindValue($identifier, $this->npwp, PDO::PARAM_STR);
                        break;
                    case '"kewarganegaraan"':						
                        $stmt->bindValue($identifier, $this->kewarganegaraan, PDO::PARAM_STR);
                        break;
                    case '"id_bank"':						
                        $stmt->bindValue($identifier, $this->id_bank, PDO::PARAM_STR);
                        break;
                    case '"rekening_bank"':						
                        $stmt->bindValue($identifier, $this->rekening_bank, PDO::PARAM_STR);
                        break;
                    case '"rekening_atas_nama"':						
                        $stmt->bindValue($identifier, $this->rekening_atas_nama, PDO::PARAM_STR);
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

            if ($this->aNegara !== null) {
                if (!$this->aNegara->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aNegara->getValidationFailures());
                }
            }

            if ($this->aBank !== null) {
                if (!$this->aBank->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aBank->getValidationFailures());
                }
            }

            if ($this->aLargeObject !== null) {
                if (!$this->aLargeObject->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aLargeObject->getValidationFailures());
                }
            }

            if ($this->aJenisPtk !== null) {
                if (!$this->aJenisPtk->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aJenisPtk->getValidationFailures());
                }
            }

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

            if ($this->aLembagaPengangkat !== null) {
                if (!$this->aLembagaPengangkat->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aLembagaPengangkat->getValidationFailures());
                }
            }

            if ($this->aStatusKeaktifanPegawai !== null) {
                if (!$this->aStatusKeaktifanPegawai->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aStatusKeaktifanPegawai->getValidationFailures());
                }
            }

            if ($this->aSumberGaji !== null) {
                if (!$this->aSumberGaji->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aSumberGaji->getValidationFailures());
                }
            }

            if ($this->aPangkatGolongan !== null) {
                if (!$this->aPangkatGolongan->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aPangkatGolongan->getValidationFailures());
                }
            }

            if ($this->aBidangStudi !== null) {
                if (!$this->aBidangStudi->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aBidangStudi->getValidationFailures());
                }
            }

            if ($this->aKeahlianLaboratorium !== null) {
                if (!$this->aKeahlianLaboratorium->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aKeahlianLaboratorium->getValidationFailures());
                }
            }

            if ($this->aPekerjaan !== null) {
                if (!$this->aPekerjaan->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aPekerjaan->getValidationFailures());
                }
            }

            if ($this->aAgama !== null) {
                if (!$this->aAgama->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aAgama->getValidationFailures());
                }
            }

            if ($this->aStatusKepegawaian !== null) {
                if (!$this->aStatusKepegawaian->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aStatusKepegawaian->getValidationFailures());
                }
            }


            if (($retval = PtkPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collAlats !== null) {
                    foreach ($this->collAlats as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collAnaks !== null) {
                    foreach ($this->collAnaks as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collAnggotaPanitias !== null) {
                    foreach ($this->collAnggotaPanitias as $referrerFK) {
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

                if ($this->collBeasiswaPtks !== null) {
                    foreach ($this->collBeasiswaPtks as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collBidangSdms !== null) {
                    foreach ($this->collBidangSdms as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collBimbingPds !== null) {
                    foreach ($this->collBimbingPds as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collBukuPtks !== null) {
                    foreach ($this->collBukuPtks as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collDiklats !== null) {
                    foreach ($this->collDiklats as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collInpassings !== null) {
                    foreach ($this->collInpassings as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collKaryaTuliss !== null) {
                    foreach ($this->collKaryaTuliss as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collKesejahteraans !== null) {
                    foreach ($this->collKesejahteraans as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collKitasPtks !== null) {
                    foreach ($this->collKitasPtks as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collNilaiTests !== null) {
                    foreach ($this->collNilaiTests as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collPasporPtks !== null) {
                    foreach ($this->collPasporPtks as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collPengawasTerdaftars !== null) {
                    foreach ($this->collPengawasTerdaftars as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collPenghargaans !== null) {
                    foreach ($this->collPenghargaans as $referrerFK) {
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

                if ($this->collRiwayatGajiBerkalas !== null) {
                    foreach ($this->collRiwayatGajiBerkalas as $referrerFK) {
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

                if ($this->collRwyFungsionals !== null) {
                    foreach ($this->collRwyFungsionals as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collRwyKepangkatans !== null) {
                    foreach ($this->collRwyKepangkatans as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collRwyKerjas !== null) {
                    foreach ($this->collRwyKerjas as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collRwyPendFormals !== null) {
                    foreach ($this->collRwyPendFormals as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collRwySertifikasis !== null) {
                    foreach ($this->collRwySertifikasis as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collRwyStrukturals !== null) {
                    foreach ($this->collRwyStrukturals as $referrerFK) {
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

                if ($this->collTunjangans !== null) {
                    foreach ($this->collTunjangans as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collVldPtks !== null) {
                    foreach ($this->collVldPtks as $referrerFK) {
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
        $pos = PtkPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getPtkId();
                break;
            case 1:
                return $this->getNama();
                break;
            case 2:
                return $this->getNip();
                break;
            case 3:
                return $this->getJenisKelamin();
                break;
            case 4:
                return $this->getTempatLahir();
                break;
            case 5:
                return $this->getTanggalLahir();
                break;
            case 6:
                return $this->getNik();
                break;
            case 7:
                return $this->getNoKk();
                break;
            case 8:
                return $this->getNiyNigk();
                break;
            case 9:
                return $this->getNuptk();
                break;
            case 10:
                return $this->getNrg();
                break;
            case 11:
                return $this->getNuks();
                break;
            case 12:
                return $this->getStatusKepegawaianId();
                break;
            case 13:
                return $this->getJenisPtkId();
                break;
            case 14:
                return $this->getPengawasBidangStudiId();
                break;
            case 15:
                return $this->getAgamaId();
                break;
            case 16:
                return $this->getAlamatJalan();
                break;
            case 17:
                return $this->getRt();
                break;
            case 18:
                return $this->getRw();
                break;
            case 19:
                return $this->getNamaDusun();
                break;
            case 20:
                return $this->getDesaKelurahan();
                break;
            case 21:
                return $this->getKodeWilayah();
                break;
            case 22:
                return $this->getKodePos();
                break;
            case 23:
                return $this->getLintang();
                break;
            case 24:
                return $this->getBujur();
                break;
            case 25:
                return $this->getNoTeleponRumah();
                break;
            case 26:
                return $this->getNoHp();
                break;
            case 27:
                return $this->getEmail();
                break;
            case 28:
                return $this->getStatusKeaktifanId();
                break;
            case 29:
                return $this->getSkCpns();
                break;
            case 30:
                return $this->getTglCpns();
                break;
            case 31:
                return $this->getSkPengangkatan();
                break;
            case 32:
                return $this->getTmtPengangkatan();
                break;
            case 33:
                return $this->getLembagaPengangkatId();
                break;
            case 34:
                return $this->getPangkatGolonganId();
                break;
            case 35:
                return $this->getKeahlianLaboratoriumId();
                break;
            case 36:
                return $this->getSumberGajiId();
                break;
            case 37:
                return $this->getNamaIbuKandung();
                break;
            case 38:
                return $this->getStatusPerkawinan();
                break;
            case 39:
                return $this->getNamaSuamiIstri();
                break;
            case 40:
                return $this->getNipSuamiIstri();
                break;
            case 41:
                return $this->getPekerjaanSuamiIstri();
                break;
            case 42:
                return $this->getTmtPns();
                break;
            case 43:
                return $this->getSudahLisensiKepalaSekolah();
                break;
            case 44:
                return $this->getJumlahSekolahBinaan();
                break;
            case 45:
                return $this->getPernahDiklatKepengawasan();
                break;
            case 46:
                return $this->getNmWp();
                break;
            case 47:
                return $this->getStatusData();
                break;
            case 48:
                return $this->getKarpeg();
                break;
            case 49:
                return $this->getKarpas();
                break;
            case 50:
                return $this->getMampuHandleKk();
                break;
            case 51:
                return $this->getKeahlianBraille();
                break;
            case 52:
                return $this->getKeahlianBhsIsyarat();
                break;
            case 53:
                return $this->getNpwp();
                break;
            case 54:
                return $this->getKewarganegaraan();
                break;
            case 55:
                return $this->getIdBank();
                break;
            case 56:
                return $this->getRekeningBank();
                break;
            case 57:
                return $this->getRekeningAtasNama();
                break;
            case 58:
                return $this->getBlobId();
                break;
            case 59:
                return $this->getCreateDate();
                break;
            case 60:
                return $this->getLastUpdate();
                break;
            case 61:
                return $this->getSoftDelete();
                break;
            case 62:
                return $this->getLastSync();
                break;
            case 63:
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
        if (isset($alreadyDumpedObjects['Ptk'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Ptk'][$this->getPrimaryKey()] = true;
        $keys = PtkPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getPtkId(),
            $keys[1] => $this->getNama(),
            $keys[2] => $this->getNip(),
            $keys[3] => $this->getJenisKelamin(),
            $keys[4] => $this->getTempatLahir(),
            $keys[5] => $this->getTanggalLahir(),
            $keys[6] => $this->getNik(),
            $keys[7] => $this->getNoKk(),
            $keys[8] => $this->getNiyNigk(),
            $keys[9] => $this->getNuptk(),
            $keys[10] => $this->getNrg(),
            $keys[11] => $this->getNuks(),
            $keys[12] => $this->getStatusKepegawaianId(),
            $keys[13] => $this->getJenisPtkId(),
            $keys[14] => $this->getPengawasBidangStudiId(),
            $keys[15] => $this->getAgamaId(),
            $keys[16] => $this->getAlamatJalan(),
            $keys[17] => $this->getRt(),
            $keys[18] => $this->getRw(),
            $keys[19] => $this->getNamaDusun(),
            $keys[20] => $this->getDesaKelurahan(),
            $keys[21] => $this->getKodeWilayah(),
            $keys[22] => $this->getKodePos(),
            $keys[23] => $this->getLintang(),
            $keys[24] => $this->getBujur(),
            $keys[25] => $this->getNoTeleponRumah(),
            $keys[26] => $this->getNoHp(),
            $keys[27] => $this->getEmail(),
            $keys[28] => $this->getStatusKeaktifanId(),
            $keys[29] => $this->getSkCpns(),
            $keys[30] => $this->getTglCpns(),
            $keys[31] => $this->getSkPengangkatan(),
            $keys[32] => $this->getTmtPengangkatan(),
            $keys[33] => $this->getLembagaPengangkatId(),
            $keys[34] => $this->getPangkatGolonganId(),
            $keys[35] => $this->getKeahlianLaboratoriumId(),
            $keys[36] => $this->getSumberGajiId(),
            $keys[37] => $this->getNamaIbuKandung(),
            $keys[38] => $this->getStatusPerkawinan(),
            $keys[39] => $this->getNamaSuamiIstri(),
            $keys[40] => $this->getNipSuamiIstri(),
            $keys[41] => $this->getPekerjaanSuamiIstri(),
            $keys[42] => $this->getTmtPns(),
            $keys[43] => $this->getSudahLisensiKepalaSekolah(),
            $keys[44] => $this->getJumlahSekolahBinaan(),
            $keys[45] => $this->getPernahDiklatKepengawasan(),
            $keys[46] => $this->getNmWp(),
            $keys[47] => $this->getStatusData(),
            $keys[48] => $this->getKarpeg(),
            $keys[49] => $this->getKarpas(),
            $keys[50] => $this->getMampuHandleKk(),
            $keys[51] => $this->getKeahlianBraille(),
            $keys[52] => $this->getKeahlianBhsIsyarat(),
            $keys[53] => $this->getNpwp(),
            $keys[54] => $this->getKewarganegaraan(),
            $keys[55] => $this->getIdBank(),
            $keys[56] => $this->getRekeningBank(),
            $keys[57] => $this->getRekeningAtasNama(),
            $keys[58] => $this->getBlobId(),
            $keys[59] => $this->getCreateDate(),
            $keys[60] => $this->getLastUpdate(),
            $keys[61] => $this->getSoftDelete(),
            $keys[62] => $this->getLastSync(),
            $keys[63] => $this->getUpdaterId(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aNegara) {
                $result['Negara'] = $this->aNegara->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aBank) {
                $result['Bank'] = $this->aBank->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aLargeObject) {
                $result['LargeObject'] = $this->aLargeObject->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aJenisPtk) {
                $result['JenisPtk'] = $this->aJenisPtk->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aMstWilayah) {
                $result['MstWilayah'] = $this->aMstWilayah->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aKebutuhanKhusus) {
                $result['KebutuhanKhusus'] = $this->aKebutuhanKhusus->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aLembagaPengangkat) {
                $result['LembagaPengangkat'] = $this->aLembagaPengangkat->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aStatusKeaktifanPegawai) {
                $result['StatusKeaktifanPegawai'] = $this->aStatusKeaktifanPegawai->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aSumberGaji) {
                $result['SumberGaji'] = $this->aSumberGaji->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aPangkatGolongan) {
                $result['PangkatGolongan'] = $this->aPangkatGolongan->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aBidangStudi) {
                $result['BidangStudi'] = $this->aBidangStudi->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aKeahlianLaboratorium) {
                $result['KeahlianLaboratorium'] = $this->aKeahlianLaboratorium->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aPekerjaan) {
                $result['Pekerjaan'] = $this->aPekerjaan->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aAgama) {
                $result['Agama'] = $this->aAgama->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aStatusKepegawaian) {
                $result['StatusKepegawaian'] = $this->aStatusKepegawaian->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collAlats) {
                $result['Alats'] = $this->collAlats->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collAnaks) {
                $result['Anaks'] = $this->collAnaks->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collAnggotaPanitias) {
                $result['AnggotaPanitias'] = $this->collAnggotaPanitias->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collAngkutans) {
                $result['Angkutans'] = $this->collAngkutans->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collBangunans) {
                $result['Bangunans'] = $this->collBangunans->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collBeasiswaPtks) {
                $result['BeasiswaPtks'] = $this->collBeasiswaPtks->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collBidangSdms) {
                $result['BidangSdms'] = $this->collBidangSdms->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collBimbingPds) {
                $result['BimbingPds'] = $this->collBimbingPds->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collBukuPtks) {
                $result['BukuPtks'] = $this->collBukuPtks->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collDiklats) {
                $result['Diklats'] = $this->collDiklats->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collInpassings) {
                $result['Inpassings'] = $this->collInpassings->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collKaryaTuliss) {
                $result['KaryaTuliss'] = $this->collKaryaTuliss->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collKesejahteraans) {
                $result['Kesejahteraans'] = $this->collKesejahteraans->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collKitasPtks) {
                $result['KitasPtks'] = $this->collKitasPtks->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collNilaiTests) {
                $result['NilaiTests'] = $this->collNilaiTests->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collPasporPtks) {
                $result['PasporPtks'] = $this->collPasporPtks->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collPengawasTerdaftars) {
                $result['PengawasTerdaftars'] = $this->collPengawasTerdaftars->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collPenghargaans) {
                $result['Penghargaans'] = $this->collPenghargaans->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collPtkBarus) {
                $result['PtkBarus'] = $this->collPtkBarus->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collPtkTerdaftars) {
                $result['PtkTerdaftars'] = $this->collPtkTerdaftars->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collRiwayatGajiBerkalas) {
                $result['RiwayatGajiBerkalas'] = $this->collRiwayatGajiBerkalas->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collRombonganBelajars) {
                $result['RombonganBelajars'] = $this->collRombonganBelajars->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collRwyFungsionals) {
                $result['RwyFungsionals'] = $this->collRwyFungsionals->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collRwyKepangkatans) {
                $result['RwyKepangkatans'] = $this->collRwyKepangkatans->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collRwyKerjas) {
                $result['RwyKerjas'] = $this->collRwyKerjas->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collRwyPendFormals) {
                $result['RwyPendFormals'] = $this->collRwyPendFormals->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collRwySertifikasis) {
                $result['RwySertifikasis'] = $this->collRwySertifikasis->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collRwyStrukturals) {
                $result['RwyStrukturals'] = $this->collRwyStrukturals->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collTugasTambahans) {
                $result['TugasTambahans'] = $this->collTugasTambahans->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collTunjangans) {
                $result['Tunjangans'] = $this->collTunjangans->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collVldPtks) {
                $result['VldPtks'] = $this->collVldPtks->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = PtkPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setPtkId($value);
                break;
            case 1:
                $this->setNama($value);
                break;
            case 2:
                $this->setNip($value);
                break;
            case 3:
                $this->setJenisKelamin($value);
                break;
            case 4:
                $this->setTempatLahir($value);
                break;
            case 5:
                $this->setTanggalLahir($value);
                break;
            case 6:
                $this->setNik($value);
                break;
            case 7:
                $this->setNoKk($value);
                break;
            case 8:
                $this->setNiyNigk($value);
                break;
            case 9:
                $this->setNuptk($value);
                break;
            case 10:
                $this->setNrg($value);
                break;
            case 11:
                $this->setNuks($value);
                break;
            case 12:
                $this->setStatusKepegawaianId($value);
                break;
            case 13:
                $this->setJenisPtkId($value);
                break;
            case 14:
                $this->setPengawasBidangStudiId($value);
                break;
            case 15:
                $this->setAgamaId($value);
                break;
            case 16:
                $this->setAlamatJalan($value);
                break;
            case 17:
                $this->setRt($value);
                break;
            case 18:
                $this->setRw($value);
                break;
            case 19:
                $this->setNamaDusun($value);
                break;
            case 20:
                $this->setDesaKelurahan($value);
                break;
            case 21:
                $this->setKodeWilayah($value);
                break;
            case 22:
                $this->setKodePos($value);
                break;
            case 23:
                $this->setLintang($value);
                break;
            case 24:
                $this->setBujur($value);
                break;
            case 25:
                $this->setNoTeleponRumah($value);
                break;
            case 26:
                $this->setNoHp($value);
                break;
            case 27:
                $this->setEmail($value);
                break;
            case 28:
                $this->setStatusKeaktifanId($value);
                break;
            case 29:
                $this->setSkCpns($value);
                break;
            case 30:
                $this->setTglCpns($value);
                break;
            case 31:
                $this->setSkPengangkatan($value);
                break;
            case 32:
                $this->setTmtPengangkatan($value);
                break;
            case 33:
                $this->setLembagaPengangkatId($value);
                break;
            case 34:
                $this->setPangkatGolonganId($value);
                break;
            case 35:
                $this->setKeahlianLaboratoriumId($value);
                break;
            case 36:
                $this->setSumberGajiId($value);
                break;
            case 37:
                $this->setNamaIbuKandung($value);
                break;
            case 38:
                $this->setStatusPerkawinan($value);
                break;
            case 39:
                $this->setNamaSuamiIstri($value);
                break;
            case 40:
                $this->setNipSuamiIstri($value);
                break;
            case 41:
                $this->setPekerjaanSuamiIstri($value);
                break;
            case 42:
                $this->setTmtPns($value);
                break;
            case 43:
                $this->setSudahLisensiKepalaSekolah($value);
                break;
            case 44:
                $this->setJumlahSekolahBinaan($value);
                break;
            case 45:
                $this->setPernahDiklatKepengawasan($value);
                break;
            case 46:
                $this->setNmWp($value);
                break;
            case 47:
                $this->setStatusData($value);
                break;
            case 48:
                $this->setKarpeg($value);
                break;
            case 49:
                $this->setKarpas($value);
                break;
            case 50:
                $this->setMampuHandleKk($value);
                break;
            case 51:
                $this->setKeahlianBraille($value);
                break;
            case 52:
                $this->setKeahlianBhsIsyarat($value);
                break;
            case 53:
                $this->setNpwp($value);
                break;
            case 54:
                $this->setKewarganegaraan($value);
                break;
            case 55:
                $this->setIdBank($value);
                break;
            case 56:
                $this->setRekeningBank($value);
                break;
            case 57:
                $this->setRekeningAtasNama($value);
                break;
            case 58:
                $this->setBlobId($value);
                break;
            case 59:
                $this->setCreateDate($value);
                break;
            case 60:
                $this->setLastUpdate($value);
                break;
            case 61:
                $this->setSoftDelete($value);
                break;
            case 62:
                $this->setLastSync($value);
                break;
            case 63:
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
        $keys = PtkPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setPtkId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setNama($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setNip($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setJenisKelamin($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setTempatLahir($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setTanggalLahir($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setNik($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setNoKk($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setNiyNigk($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setNuptk($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setNrg($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setNuks($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setStatusKepegawaianId($arr[$keys[12]]);
        if (array_key_exists($keys[13], $arr)) $this->setJenisPtkId($arr[$keys[13]]);
        if (array_key_exists($keys[14], $arr)) $this->setPengawasBidangStudiId($arr[$keys[14]]);
        if (array_key_exists($keys[15], $arr)) $this->setAgamaId($arr[$keys[15]]);
        if (array_key_exists($keys[16], $arr)) $this->setAlamatJalan($arr[$keys[16]]);
        if (array_key_exists($keys[17], $arr)) $this->setRt($arr[$keys[17]]);
        if (array_key_exists($keys[18], $arr)) $this->setRw($arr[$keys[18]]);
        if (array_key_exists($keys[19], $arr)) $this->setNamaDusun($arr[$keys[19]]);
        if (array_key_exists($keys[20], $arr)) $this->setDesaKelurahan($arr[$keys[20]]);
        if (array_key_exists($keys[21], $arr)) $this->setKodeWilayah($arr[$keys[21]]);
        if (array_key_exists($keys[22], $arr)) $this->setKodePos($arr[$keys[22]]);
        if (array_key_exists($keys[23], $arr)) $this->setLintang($arr[$keys[23]]);
        if (array_key_exists($keys[24], $arr)) $this->setBujur($arr[$keys[24]]);
        if (array_key_exists($keys[25], $arr)) $this->setNoTeleponRumah($arr[$keys[25]]);
        if (array_key_exists($keys[26], $arr)) $this->setNoHp($arr[$keys[26]]);
        if (array_key_exists($keys[27], $arr)) $this->setEmail($arr[$keys[27]]);
        if (array_key_exists($keys[28], $arr)) $this->setStatusKeaktifanId($arr[$keys[28]]);
        if (array_key_exists($keys[29], $arr)) $this->setSkCpns($arr[$keys[29]]);
        if (array_key_exists($keys[30], $arr)) $this->setTglCpns($arr[$keys[30]]);
        if (array_key_exists($keys[31], $arr)) $this->setSkPengangkatan($arr[$keys[31]]);
        if (array_key_exists($keys[32], $arr)) $this->setTmtPengangkatan($arr[$keys[32]]);
        if (array_key_exists($keys[33], $arr)) $this->setLembagaPengangkatId($arr[$keys[33]]);
        if (array_key_exists($keys[34], $arr)) $this->setPangkatGolonganId($arr[$keys[34]]);
        if (array_key_exists($keys[35], $arr)) $this->setKeahlianLaboratoriumId($arr[$keys[35]]);
        if (array_key_exists($keys[36], $arr)) $this->setSumberGajiId($arr[$keys[36]]);
        if (array_key_exists($keys[37], $arr)) $this->setNamaIbuKandung($arr[$keys[37]]);
        if (array_key_exists($keys[38], $arr)) $this->setStatusPerkawinan($arr[$keys[38]]);
        if (array_key_exists($keys[39], $arr)) $this->setNamaSuamiIstri($arr[$keys[39]]);
        if (array_key_exists($keys[40], $arr)) $this->setNipSuamiIstri($arr[$keys[40]]);
        if (array_key_exists($keys[41], $arr)) $this->setPekerjaanSuamiIstri($arr[$keys[41]]);
        if (array_key_exists($keys[42], $arr)) $this->setTmtPns($arr[$keys[42]]);
        if (array_key_exists($keys[43], $arr)) $this->setSudahLisensiKepalaSekolah($arr[$keys[43]]);
        if (array_key_exists($keys[44], $arr)) $this->setJumlahSekolahBinaan($arr[$keys[44]]);
        if (array_key_exists($keys[45], $arr)) $this->setPernahDiklatKepengawasan($arr[$keys[45]]);
        if (array_key_exists($keys[46], $arr)) $this->setNmWp($arr[$keys[46]]);
        if (array_key_exists($keys[47], $arr)) $this->setStatusData($arr[$keys[47]]);
        if (array_key_exists($keys[48], $arr)) $this->setKarpeg($arr[$keys[48]]);
        if (array_key_exists($keys[49], $arr)) $this->setKarpas($arr[$keys[49]]);
        if (array_key_exists($keys[50], $arr)) $this->setMampuHandleKk($arr[$keys[50]]);
        if (array_key_exists($keys[51], $arr)) $this->setKeahlianBraille($arr[$keys[51]]);
        if (array_key_exists($keys[52], $arr)) $this->setKeahlianBhsIsyarat($arr[$keys[52]]);
        if (array_key_exists($keys[53], $arr)) $this->setNpwp($arr[$keys[53]]);
        if (array_key_exists($keys[54], $arr)) $this->setKewarganegaraan($arr[$keys[54]]);
        if (array_key_exists($keys[55], $arr)) $this->setIdBank($arr[$keys[55]]);
        if (array_key_exists($keys[56], $arr)) $this->setRekeningBank($arr[$keys[56]]);
        if (array_key_exists($keys[57], $arr)) $this->setRekeningAtasNama($arr[$keys[57]]);
        if (array_key_exists($keys[58], $arr)) $this->setBlobId($arr[$keys[58]]);
        if (array_key_exists($keys[59], $arr)) $this->setCreateDate($arr[$keys[59]]);
        if (array_key_exists($keys[60], $arr)) $this->setLastUpdate($arr[$keys[60]]);
        if (array_key_exists($keys[61], $arr)) $this->setSoftDelete($arr[$keys[61]]);
        if (array_key_exists($keys[62], $arr)) $this->setLastSync($arr[$keys[62]]);
        if (array_key_exists($keys[63], $arr)) $this->setUpdaterId($arr[$keys[63]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(PtkPeer::DATABASE_NAME);

        if ($this->isColumnModified(PtkPeer::PTK_ID)) $criteria->add(PtkPeer::PTK_ID, $this->ptk_id);
        if ($this->isColumnModified(PtkPeer::NAMA)) $criteria->add(PtkPeer::NAMA, $this->nama);
        if ($this->isColumnModified(PtkPeer::NIP)) $criteria->add(PtkPeer::NIP, $this->nip);
        if ($this->isColumnModified(PtkPeer::JENIS_KELAMIN)) $criteria->add(PtkPeer::JENIS_KELAMIN, $this->jenis_kelamin);
        if ($this->isColumnModified(PtkPeer::TEMPAT_LAHIR)) $criteria->add(PtkPeer::TEMPAT_LAHIR, $this->tempat_lahir);
        if ($this->isColumnModified(PtkPeer::TANGGAL_LAHIR)) $criteria->add(PtkPeer::TANGGAL_LAHIR, $this->tanggal_lahir);
        if ($this->isColumnModified(PtkPeer::NIK)) $criteria->add(PtkPeer::NIK, $this->nik);
        if ($this->isColumnModified(PtkPeer::NO_KK)) $criteria->add(PtkPeer::NO_KK, $this->no_kk);
        if ($this->isColumnModified(PtkPeer::NIY_NIGK)) $criteria->add(PtkPeer::NIY_NIGK, $this->niy_nigk);
        if ($this->isColumnModified(PtkPeer::NUPTK)) $criteria->add(PtkPeer::NUPTK, $this->nuptk);
        if ($this->isColumnModified(PtkPeer::NRG)) $criteria->add(PtkPeer::NRG, $this->nrg);
        if ($this->isColumnModified(PtkPeer::NUKS)) $criteria->add(PtkPeer::NUKS, $this->nuks);
        if ($this->isColumnModified(PtkPeer::STATUS_KEPEGAWAIAN_ID)) $criteria->add(PtkPeer::STATUS_KEPEGAWAIAN_ID, $this->status_kepegawaian_id);
        if ($this->isColumnModified(PtkPeer::JENIS_PTK_ID)) $criteria->add(PtkPeer::JENIS_PTK_ID, $this->jenis_ptk_id);
        if ($this->isColumnModified(PtkPeer::PENGAWAS_BIDANG_STUDI_ID)) $criteria->add(PtkPeer::PENGAWAS_BIDANG_STUDI_ID, $this->pengawas_bidang_studi_id);
        if ($this->isColumnModified(PtkPeer::AGAMA_ID)) $criteria->add(PtkPeer::AGAMA_ID, $this->agama_id);
        if ($this->isColumnModified(PtkPeer::ALAMAT_JALAN)) $criteria->add(PtkPeer::ALAMAT_JALAN, $this->alamat_jalan);
        if ($this->isColumnModified(PtkPeer::RT)) $criteria->add(PtkPeer::RT, $this->rt);
        if ($this->isColumnModified(PtkPeer::RW)) $criteria->add(PtkPeer::RW, $this->rw);
        if ($this->isColumnModified(PtkPeer::NAMA_DUSUN)) $criteria->add(PtkPeer::NAMA_DUSUN, $this->nama_dusun);
        if ($this->isColumnModified(PtkPeer::DESA_KELURAHAN)) $criteria->add(PtkPeer::DESA_KELURAHAN, $this->desa_kelurahan);
        if ($this->isColumnModified(PtkPeer::KODE_WILAYAH)) $criteria->add(PtkPeer::KODE_WILAYAH, $this->kode_wilayah);
        if ($this->isColumnModified(PtkPeer::KODE_POS)) $criteria->add(PtkPeer::KODE_POS, $this->kode_pos);
        if ($this->isColumnModified(PtkPeer::LINTANG)) $criteria->add(PtkPeer::LINTANG, $this->lintang);
        if ($this->isColumnModified(PtkPeer::BUJUR)) $criteria->add(PtkPeer::BUJUR, $this->bujur);
        if ($this->isColumnModified(PtkPeer::NO_TELEPON_RUMAH)) $criteria->add(PtkPeer::NO_TELEPON_RUMAH, $this->no_telepon_rumah);
        if ($this->isColumnModified(PtkPeer::NO_HP)) $criteria->add(PtkPeer::NO_HP, $this->no_hp);
        if ($this->isColumnModified(PtkPeer::EMAIL)) $criteria->add(PtkPeer::EMAIL, $this->email);
        if ($this->isColumnModified(PtkPeer::STATUS_KEAKTIFAN_ID)) $criteria->add(PtkPeer::STATUS_KEAKTIFAN_ID, $this->status_keaktifan_id);
        if ($this->isColumnModified(PtkPeer::SK_CPNS)) $criteria->add(PtkPeer::SK_CPNS, $this->sk_cpns);
        if ($this->isColumnModified(PtkPeer::TGL_CPNS)) $criteria->add(PtkPeer::TGL_CPNS, $this->tgl_cpns);
        if ($this->isColumnModified(PtkPeer::SK_PENGANGKATAN)) $criteria->add(PtkPeer::SK_PENGANGKATAN, $this->sk_pengangkatan);
        if ($this->isColumnModified(PtkPeer::TMT_PENGANGKATAN)) $criteria->add(PtkPeer::TMT_PENGANGKATAN, $this->tmt_pengangkatan);
        if ($this->isColumnModified(PtkPeer::LEMBAGA_PENGANGKAT_ID)) $criteria->add(PtkPeer::LEMBAGA_PENGANGKAT_ID, $this->lembaga_pengangkat_id);
        if ($this->isColumnModified(PtkPeer::PANGKAT_GOLONGAN_ID)) $criteria->add(PtkPeer::PANGKAT_GOLONGAN_ID, $this->pangkat_golongan_id);
        if ($this->isColumnModified(PtkPeer::KEAHLIAN_LABORATORIUM_ID)) $criteria->add(PtkPeer::KEAHLIAN_LABORATORIUM_ID, $this->keahlian_laboratorium_id);
        if ($this->isColumnModified(PtkPeer::SUMBER_GAJI_ID)) $criteria->add(PtkPeer::SUMBER_GAJI_ID, $this->sumber_gaji_id);
        if ($this->isColumnModified(PtkPeer::NAMA_IBU_KANDUNG)) $criteria->add(PtkPeer::NAMA_IBU_KANDUNG, $this->nama_ibu_kandung);
        if ($this->isColumnModified(PtkPeer::STATUS_PERKAWINAN)) $criteria->add(PtkPeer::STATUS_PERKAWINAN, $this->status_perkawinan);
        if ($this->isColumnModified(PtkPeer::NAMA_SUAMI_ISTRI)) $criteria->add(PtkPeer::NAMA_SUAMI_ISTRI, $this->nama_suami_istri);
        if ($this->isColumnModified(PtkPeer::NIP_SUAMI_ISTRI)) $criteria->add(PtkPeer::NIP_SUAMI_ISTRI, $this->nip_suami_istri);
        if ($this->isColumnModified(PtkPeer::PEKERJAAN_SUAMI_ISTRI)) $criteria->add(PtkPeer::PEKERJAAN_SUAMI_ISTRI, $this->pekerjaan_suami_istri);
        if ($this->isColumnModified(PtkPeer::TMT_PNS)) $criteria->add(PtkPeer::TMT_PNS, $this->tmt_pns);
        if ($this->isColumnModified(PtkPeer::SUDAH_LISENSI_KEPALA_SEKOLAH)) $criteria->add(PtkPeer::SUDAH_LISENSI_KEPALA_SEKOLAH, $this->sudah_lisensi_kepala_sekolah);
        if ($this->isColumnModified(PtkPeer::JUMLAH_SEKOLAH_BINAAN)) $criteria->add(PtkPeer::JUMLAH_SEKOLAH_BINAAN, $this->jumlah_sekolah_binaan);
        if ($this->isColumnModified(PtkPeer::PERNAH_DIKLAT_KEPENGAWASAN)) $criteria->add(PtkPeer::PERNAH_DIKLAT_KEPENGAWASAN, $this->pernah_diklat_kepengawasan);
        if ($this->isColumnModified(PtkPeer::NM_WP)) $criteria->add(PtkPeer::NM_WP, $this->nm_wp);
        if ($this->isColumnModified(PtkPeer::STATUS_DATA)) $criteria->add(PtkPeer::STATUS_DATA, $this->status_data);
        if ($this->isColumnModified(PtkPeer::KARPEG)) $criteria->add(PtkPeer::KARPEG, $this->karpeg);
        if ($this->isColumnModified(PtkPeer::KARPAS)) $criteria->add(PtkPeer::KARPAS, $this->karpas);
        if ($this->isColumnModified(PtkPeer::MAMPU_HANDLE_KK)) $criteria->add(PtkPeer::MAMPU_HANDLE_KK, $this->mampu_handle_kk);
        if ($this->isColumnModified(PtkPeer::KEAHLIAN_BRAILLE)) $criteria->add(PtkPeer::KEAHLIAN_BRAILLE, $this->keahlian_braille);
        if ($this->isColumnModified(PtkPeer::KEAHLIAN_BHS_ISYARAT)) $criteria->add(PtkPeer::KEAHLIAN_BHS_ISYARAT, $this->keahlian_bhs_isyarat);
        if ($this->isColumnModified(PtkPeer::NPWP)) $criteria->add(PtkPeer::NPWP, $this->npwp);
        if ($this->isColumnModified(PtkPeer::KEWARGANEGARAAN)) $criteria->add(PtkPeer::KEWARGANEGARAAN, $this->kewarganegaraan);
        if ($this->isColumnModified(PtkPeer::ID_BANK)) $criteria->add(PtkPeer::ID_BANK, $this->id_bank);
        if ($this->isColumnModified(PtkPeer::REKENING_BANK)) $criteria->add(PtkPeer::REKENING_BANK, $this->rekening_bank);
        if ($this->isColumnModified(PtkPeer::REKENING_ATAS_NAMA)) $criteria->add(PtkPeer::REKENING_ATAS_NAMA, $this->rekening_atas_nama);
        if ($this->isColumnModified(PtkPeer::BLOB_ID)) $criteria->add(PtkPeer::BLOB_ID, $this->blob_id);
        if ($this->isColumnModified(PtkPeer::CREATE_DATE)) $criteria->add(PtkPeer::CREATE_DATE, $this->create_date);
        if ($this->isColumnModified(PtkPeer::LAST_UPDATE)) $criteria->add(PtkPeer::LAST_UPDATE, $this->last_update);
        if ($this->isColumnModified(PtkPeer::SOFT_DELETE)) $criteria->add(PtkPeer::SOFT_DELETE, $this->soft_delete);
        if ($this->isColumnModified(PtkPeer::LAST_SYNC)) $criteria->add(PtkPeer::LAST_SYNC, $this->last_sync);
        if ($this->isColumnModified(PtkPeer::UPDATER_ID)) $criteria->add(PtkPeer::UPDATER_ID, $this->updater_id);

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
        $criteria = new Criteria(PtkPeer::DATABASE_NAME);
        $criteria->add(PtkPeer::PTK_ID, $this->ptk_id);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return string
     */
    public function getPrimaryKey()
    {
        return $this->getPtkId();
    }

    /**
     * Generic method to set the primary key (ptk_id column).
     *
     * @param  string $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setPtkId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getPtkId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of Ptk (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setNama($this->getNama());
        $copyObj->setNip($this->getNip());
        $copyObj->setJenisKelamin($this->getJenisKelamin());
        $copyObj->setTempatLahir($this->getTempatLahir());
        $copyObj->setTanggalLahir($this->getTanggalLahir());
        $copyObj->setNik($this->getNik());
        $copyObj->setNoKk($this->getNoKk());
        $copyObj->setNiyNigk($this->getNiyNigk());
        $copyObj->setNuptk($this->getNuptk());
        $copyObj->setNrg($this->getNrg());
        $copyObj->setNuks($this->getNuks());
        $copyObj->setStatusKepegawaianId($this->getStatusKepegawaianId());
        $copyObj->setJenisPtkId($this->getJenisPtkId());
        $copyObj->setPengawasBidangStudiId($this->getPengawasBidangStudiId());
        $copyObj->setAgamaId($this->getAgamaId());
        $copyObj->setAlamatJalan($this->getAlamatJalan());
        $copyObj->setRt($this->getRt());
        $copyObj->setRw($this->getRw());
        $copyObj->setNamaDusun($this->getNamaDusun());
        $copyObj->setDesaKelurahan($this->getDesaKelurahan());
        $copyObj->setKodeWilayah($this->getKodeWilayah());
        $copyObj->setKodePos($this->getKodePos());
        $copyObj->setLintang($this->getLintang());
        $copyObj->setBujur($this->getBujur());
        $copyObj->setNoTeleponRumah($this->getNoTeleponRumah());
        $copyObj->setNoHp($this->getNoHp());
        $copyObj->setEmail($this->getEmail());
        $copyObj->setStatusKeaktifanId($this->getStatusKeaktifanId());
        $copyObj->setSkCpns($this->getSkCpns());
        $copyObj->setTglCpns($this->getTglCpns());
        $copyObj->setSkPengangkatan($this->getSkPengangkatan());
        $copyObj->setTmtPengangkatan($this->getTmtPengangkatan());
        $copyObj->setLembagaPengangkatId($this->getLembagaPengangkatId());
        $copyObj->setPangkatGolonganId($this->getPangkatGolonganId());
        $copyObj->setKeahlianLaboratoriumId($this->getKeahlianLaboratoriumId());
        $copyObj->setSumberGajiId($this->getSumberGajiId());
        $copyObj->setNamaIbuKandung($this->getNamaIbuKandung());
        $copyObj->setStatusPerkawinan($this->getStatusPerkawinan());
        $copyObj->setNamaSuamiIstri($this->getNamaSuamiIstri());
        $copyObj->setNipSuamiIstri($this->getNipSuamiIstri());
        $copyObj->setPekerjaanSuamiIstri($this->getPekerjaanSuamiIstri());
        $copyObj->setTmtPns($this->getTmtPns());
        $copyObj->setSudahLisensiKepalaSekolah($this->getSudahLisensiKepalaSekolah());
        $copyObj->setJumlahSekolahBinaan($this->getJumlahSekolahBinaan());
        $copyObj->setPernahDiklatKepengawasan($this->getPernahDiklatKepengawasan());
        $copyObj->setNmWp($this->getNmWp());
        $copyObj->setStatusData($this->getStatusData());
        $copyObj->setKarpeg($this->getKarpeg());
        $copyObj->setKarpas($this->getKarpas());
        $copyObj->setMampuHandleKk($this->getMampuHandleKk());
        $copyObj->setKeahlianBraille($this->getKeahlianBraille());
        $copyObj->setKeahlianBhsIsyarat($this->getKeahlianBhsIsyarat());
        $copyObj->setNpwp($this->getNpwp());
        $copyObj->setKewarganegaraan($this->getKewarganegaraan());
        $copyObj->setIdBank($this->getIdBank());
        $copyObj->setRekeningBank($this->getRekeningBank());
        $copyObj->setRekeningAtasNama($this->getRekeningAtasNama());
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

            foreach ($this->getAlats() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addAlat($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getAnaks() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addAnak($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getAnggotaPanitias() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addAnggotaPanitia($relObj->copy($deepCopy));
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

            foreach ($this->getBeasiswaPtks() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addBeasiswaPtk($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getBidangSdms() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addBidangSdm($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getBimbingPds() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addBimbingPd($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getBukuPtks() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addBukuPtk($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getDiklats() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addDiklat($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getInpassings() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addInpassing($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getKaryaTuliss() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addKaryaTulis($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getKesejahteraans() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addKesejahteraan($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getKitasPtks() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addKitasPtk($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getNilaiTests() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addNilaiTest($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getPasporPtks() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPasporPtk($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getPengawasTerdaftars() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPengawasTerdaftar($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getPenghargaans() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPenghargaan($relObj->copy($deepCopy));
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

            foreach ($this->getRiwayatGajiBerkalas() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addRiwayatGajiBerkala($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getRombonganBelajars() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addRombonganBelajar($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getRwyFungsionals() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addRwyFungsional($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getRwyKepangkatans() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addRwyKepangkatan($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getRwyKerjas() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addRwyKerja($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getRwyPendFormals() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addRwyPendFormal($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getRwySertifikasis() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addRwySertifikasi($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getRwyStrukturals() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addRwyStruktural($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getTugasTambahans() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addTugasTambahan($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getTunjangans() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addTunjangan($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getVldPtks() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addVldPtk($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setPtkId(NULL); // this is a auto-increment column, so set to default value
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
     * @return Ptk Clone of current object.
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
     * @return PtkPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new PtkPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Negara object.
     *
     * @param             Negara $v
     * @return Ptk The current object (for fluent API support)
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
            $v->addPtk($this);
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
                $this->aNegara->addPtks($this);
             */
        }

        return $this->aNegara;
    }

    /**
     * Declares an association between this object and a Bank object.
     *
     * @param             Bank $v
     * @return Ptk The current object (for fluent API support)
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
            $v->addPtk($this);
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
                $this->aBank->addPtks($this);
             */
        }

        return $this->aBank;
    }

    /**
     * Declares an association between this object and a LargeObject object.
     *
     * @param             LargeObject $v
     * @return Ptk The current object (for fluent API support)
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
            $v->addPtk($this);
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
                $this->aLargeObject->addPtks($this);
             */
        }

        return $this->aLargeObject;
    }

    /**
     * Declares an association between this object and a JenisPtk object.
     *
     * @param             JenisPtk $v
     * @return Ptk The current object (for fluent API support)
     * @throws PropelException
     */
    public function setJenisPtk(JenisPtk $v = null)
    {
        if ($v === null) {
            $this->setJenisPtkId(NULL);
        } else {
            $this->setJenisPtkId($v->getJenisPtkId());
        }

        $this->aJenisPtk = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the JenisPtk object, it will not be re-added.
        if ($v !== null) {
            $v->addPtk($this);
        }


        return $this;
    }


    /**
     * Get the associated JenisPtk object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return JenisPtk The associated JenisPtk object.
     * @throws PropelException
     */
    public function getJenisPtk(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aJenisPtk === null && (($this->jenis_ptk_id !== "" && $this->jenis_ptk_id !== null)) && $doQuery) {
            $this->aJenisPtk = JenisPtkQuery::create()->findPk($this->jenis_ptk_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aJenisPtk->addPtks($this);
             */
        }

        return $this->aJenisPtk;
    }

    /**
     * Declares an association between this object and a MstWilayah object.
     *
     * @param             MstWilayah $v
     * @return Ptk The current object (for fluent API support)
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
            $v->addPtk($this);
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
                $this->aMstWilayah->addPtks($this);
             */
        }

        return $this->aMstWilayah;
    }

    /**
     * Declares an association between this object and a KebutuhanKhusus object.
     *
     * @param             KebutuhanKhusus $v
     * @return Ptk The current object (for fluent API support)
     * @throws PropelException
     */
    public function setKebutuhanKhusus(KebutuhanKhusus $v = null)
    {
        if ($v === null) {
            $this->setMampuHandleKk(NULL);
        } else {
            $this->setMampuHandleKk($v->getKebutuhanKhususId());
        }

        $this->aKebutuhanKhusus = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the KebutuhanKhusus object, it will not be re-added.
        if ($v !== null) {
            $v->addPtk($this);
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
        if ($this->aKebutuhanKhusus === null && ($this->mampu_handle_kk !== null) && $doQuery) {
            $this->aKebutuhanKhusus = KebutuhanKhususQuery::create()->findPk($this->mampu_handle_kk, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aKebutuhanKhusus->addPtks($this);
             */
        }

        return $this->aKebutuhanKhusus;
    }

    /**
     * Declares an association between this object and a LembagaPengangkat object.
     *
     * @param             LembagaPengangkat $v
     * @return Ptk The current object (for fluent API support)
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
            $v->addPtk($this);
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
                $this->aLembagaPengangkat->addPtks($this);
             */
        }

        return $this->aLembagaPengangkat;
    }

    /**
     * Declares an association between this object and a StatusKeaktifanPegawai object.
     *
     * @param             StatusKeaktifanPegawai $v
     * @return Ptk The current object (for fluent API support)
     * @throws PropelException
     */
    public function setStatusKeaktifanPegawai(StatusKeaktifanPegawai $v = null)
    {
        if ($v === null) {
            $this->setStatusKeaktifanId(NULL);
        } else {
            $this->setStatusKeaktifanId($v->getStatusKeaktifanId());
        }

        $this->aStatusKeaktifanPegawai = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the StatusKeaktifanPegawai object, it will not be re-added.
        if ($v !== null) {
            $v->addPtk($this);
        }


        return $this;
    }


    /**
     * Get the associated StatusKeaktifanPegawai object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return StatusKeaktifanPegawai The associated StatusKeaktifanPegawai object.
     * @throws PropelException
     */
    public function getStatusKeaktifanPegawai(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aStatusKeaktifanPegawai === null && (($this->status_keaktifan_id !== "" && $this->status_keaktifan_id !== null)) && $doQuery) {
            $this->aStatusKeaktifanPegawai = StatusKeaktifanPegawaiQuery::create()->findPk($this->status_keaktifan_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aStatusKeaktifanPegawai->addPtks($this);
             */
        }

        return $this->aStatusKeaktifanPegawai;
    }

    /**
     * Declares an association between this object and a SumberGaji object.
     *
     * @param             SumberGaji $v
     * @return Ptk The current object (for fluent API support)
     * @throws PropelException
     */
    public function setSumberGaji(SumberGaji $v = null)
    {
        if ($v === null) {
            $this->setSumberGajiId(NULL);
        } else {
            $this->setSumberGajiId($v->getSumberGajiId());
        }

        $this->aSumberGaji = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the SumberGaji object, it will not be re-added.
        if ($v !== null) {
            $v->addPtk($this);
        }


        return $this;
    }


    /**
     * Get the associated SumberGaji object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return SumberGaji The associated SumberGaji object.
     * @throws PropelException
     */
    public function getSumberGaji(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aSumberGaji === null && (($this->sumber_gaji_id !== "" && $this->sumber_gaji_id !== null)) && $doQuery) {
            $this->aSumberGaji = SumberGajiQuery::create()->findPk($this->sumber_gaji_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aSumberGaji->addPtks($this);
             */
        }

        return $this->aSumberGaji;
    }

    /**
     * Declares an association between this object and a PangkatGolongan object.
     *
     * @param             PangkatGolongan $v
     * @return Ptk The current object (for fluent API support)
     * @throws PropelException
     */
    public function setPangkatGolongan(PangkatGolongan $v = null)
    {
        if ($v === null) {
            $this->setPangkatGolonganId(NULL);
        } else {
            $this->setPangkatGolonganId($v->getPangkatGolonganId());
        }

        $this->aPangkatGolongan = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the PangkatGolongan object, it will not be re-added.
        if ($v !== null) {
            $v->addPtk($this);
        }


        return $this;
    }


    /**
     * Get the associated PangkatGolongan object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return PangkatGolongan The associated PangkatGolongan object.
     * @throws PropelException
     */
    public function getPangkatGolongan(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aPangkatGolongan === null && (($this->pangkat_golongan_id !== "" && $this->pangkat_golongan_id !== null)) && $doQuery) {
            $this->aPangkatGolongan = PangkatGolonganQuery::create()->findPk($this->pangkat_golongan_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aPangkatGolongan->addPtks($this);
             */
        }

        return $this->aPangkatGolongan;
    }

    /**
     * Declares an association between this object and a BidangStudi object.
     *
     * @param             BidangStudi $v
     * @return Ptk The current object (for fluent API support)
     * @throws PropelException
     */
    public function setBidangStudi(BidangStudi $v = null)
    {
        if ($v === null) {
            $this->setPengawasBidangStudiId(NULL);
        } else {
            $this->setPengawasBidangStudiId($v->getBidangStudiId());
        }

        $this->aBidangStudi = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the BidangStudi object, it will not be re-added.
        if ($v !== null) {
            $v->addPtk($this);
        }


        return $this;
    }


    /**
     * Get the associated BidangStudi object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return BidangStudi The associated BidangStudi object.
     * @throws PropelException
     */
    public function getBidangStudi(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aBidangStudi === null && ($this->pengawas_bidang_studi_id !== null) && $doQuery) {
            $this->aBidangStudi = BidangStudiQuery::create()->findPk($this->pengawas_bidang_studi_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aBidangStudi->addPtks($this);
             */
        }

        return $this->aBidangStudi;
    }

    /**
     * Declares an association between this object and a KeahlianLaboratorium object.
     *
     * @param             KeahlianLaboratorium $v
     * @return Ptk The current object (for fluent API support)
     * @throws PropelException
     */
    public function setKeahlianLaboratorium(KeahlianLaboratorium $v = null)
    {
        if ($v === null) {
            $this->setKeahlianLaboratoriumId(NULL);
        } else {
            $this->setKeahlianLaboratoriumId($v->getKeahlianLaboratoriumId());
        }

        $this->aKeahlianLaboratorium = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the KeahlianLaboratorium object, it will not be re-added.
        if ($v !== null) {
            $v->addPtk($this);
        }


        return $this;
    }


    /**
     * Get the associated KeahlianLaboratorium object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return KeahlianLaboratorium The associated KeahlianLaboratorium object.
     * @throws PropelException
     */
    public function getKeahlianLaboratorium(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aKeahlianLaboratorium === null && ($this->keahlian_laboratorium_id !== null) && $doQuery) {
            $this->aKeahlianLaboratorium = KeahlianLaboratoriumQuery::create()->findPk($this->keahlian_laboratorium_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aKeahlianLaboratorium->addPtks($this);
             */
        }

        return $this->aKeahlianLaboratorium;
    }

    /**
     * Declares an association between this object and a Pekerjaan object.
     *
     * @param             Pekerjaan $v
     * @return Ptk The current object (for fluent API support)
     * @throws PropelException
     */
    public function setPekerjaan(Pekerjaan $v = null)
    {
        if ($v === null) {
            $this->setPekerjaanSuamiIstri(NULL);
        } else {
            $this->setPekerjaanSuamiIstri($v->getPekerjaanId());
        }

        $this->aPekerjaan = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Pekerjaan object, it will not be re-added.
        if ($v !== null) {
            $v->addPtk($this);
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
    public function getPekerjaan(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aPekerjaan === null && ($this->pekerjaan_suami_istri !== null) && $doQuery) {
            $this->aPekerjaan = PekerjaanQuery::create()->findPk($this->pekerjaan_suami_istri, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aPekerjaan->addPtks($this);
             */
        }

        return $this->aPekerjaan;
    }

    /**
     * Declares an association between this object and a Agama object.
     *
     * @param             Agama $v
     * @return Ptk The current object (for fluent API support)
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
            $v->addPtk($this);
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
                $this->aAgama->addPtks($this);
             */
        }

        return $this->aAgama;
    }

    /**
     * Declares an association between this object and a StatusKepegawaian object.
     *
     * @param             StatusKepegawaian $v
     * @return Ptk The current object (for fluent API support)
     * @throws PropelException
     */
    public function setStatusKepegawaian(StatusKepegawaian $v = null)
    {
        if ($v === null) {
            $this->setStatusKepegawaianId(NULL);
        } else {
            $this->setStatusKepegawaianId($v->getStatusKepegawaianId());
        }

        $this->aStatusKepegawaian = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the StatusKepegawaian object, it will not be re-added.
        if ($v !== null) {
            $v->addPtk($this);
        }


        return $this;
    }


    /**
     * Get the associated StatusKepegawaian object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return StatusKepegawaian The associated StatusKepegawaian object.
     * @throws PropelException
     */
    public function getStatusKepegawaian(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aStatusKepegawaian === null && ($this->status_kepegawaian_id !== null) && $doQuery) {
            $this->aStatusKepegawaian = StatusKepegawaianQuery::create()->findPk($this->status_kepegawaian_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aStatusKepegawaian->addPtks($this);
             */
        }

        return $this->aStatusKepegawaian;
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
        if ('Anak' == $relationName) {
            $this->initAnaks();
        }
        if ('AnggotaPanitia' == $relationName) {
            $this->initAnggotaPanitias();
        }
        if ('Angkutan' == $relationName) {
            $this->initAngkutans();
        }
        if ('Bangunan' == $relationName) {
            $this->initBangunans();
        }
        if ('BeasiswaPtk' == $relationName) {
            $this->initBeasiswaPtks();
        }
        if ('BidangSdm' == $relationName) {
            $this->initBidangSdms();
        }
        if ('BimbingPd' == $relationName) {
            $this->initBimbingPds();
        }
        if ('BukuPtk' == $relationName) {
            $this->initBukuPtks();
        }
        if ('Diklat' == $relationName) {
            $this->initDiklats();
        }
        if ('Inpassing' == $relationName) {
            $this->initInpassings();
        }
        if ('KaryaTulis' == $relationName) {
            $this->initKaryaTuliss();
        }
        if ('Kesejahteraan' == $relationName) {
            $this->initKesejahteraans();
        }
        if ('KitasPtk' == $relationName) {
            $this->initKitasPtks();
        }
        if ('NilaiTest' == $relationName) {
            $this->initNilaiTests();
        }
        if ('PasporPtk' == $relationName) {
            $this->initPasporPtks();
        }
        if ('PengawasTerdaftar' == $relationName) {
            $this->initPengawasTerdaftars();
        }
        if ('Penghargaan' == $relationName) {
            $this->initPenghargaans();
        }
        if ('PtkBaru' == $relationName) {
            $this->initPtkBarus();
        }
        if ('PtkTerdaftar' == $relationName) {
            $this->initPtkTerdaftars();
        }
        if ('RiwayatGajiBerkala' == $relationName) {
            $this->initRiwayatGajiBerkalas();
        }
        if ('RombonganBelajar' == $relationName) {
            $this->initRombonganBelajars();
        }
        if ('RwyFungsional' == $relationName) {
            $this->initRwyFungsionals();
        }
        if ('RwyKepangkatan' == $relationName) {
            $this->initRwyKepangkatans();
        }
        if ('RwyKerja' == $relationName) {
            $this->initRwyKerjas();
        }
        if ('RwyPendFormal' == $relationName) {
            $this->initRwyPendFormals();
        }
        if ('RwySertifikasi' == $relationName) {
            $this->initRwySertifikasis();
        }
        if ('RwyStruktural' == $relationName) {
            $this->initRwyStrukturals();
        }
        if ('TugasTambahan' == $relationName) {
            $this->initTugasTambahans();
        }
        if ('Tunjangan' == $relationName) {
            $this->initTunjangans();
        }
        if ('VldPtk' == $relationName) {
            $this->initVldPtks();
        }
    }

    /**
     * Clears out the collAlats collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Ptk The current object (for fluent API support)
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
     * If this Ptk is new, it will return
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
                    ->filterByPtk($this)
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
     * @return Ptk The current object (for fluent API support)
     */
    public function setAlats(PropelCollection $alats, PropelPDO $con = null)
    {
        $alatsToDelete = $this->getAlats(new Criteria(), $con)->diff($alats);

        $this->alatsScheduledForDeletion = unserialize(serialize($alatsToDelete));

        foreach ($alatsToDelete as $alatRemoved) {
            $alatRemoved->setPtk(null);
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
                ->filterByPtk($this)
                ->count($con);
        }

        return count($this->collAlats);
    }

    /**
     * Method called to associate a Alat object to this object
     * through the Alat foreign key attribute.
     *
     * @param    Alat $l Alat
     * @return Ptk The current object (for fluent API support)
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
        $alat->setPtk($this);
    }

    /**
     * @param	Alat $alat The alat object to remove.
     * @return Ptk The current object (for fluent API support)
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
            $alat->setPtk(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Ptk is new, it will return
     * an empty collection; or if this Ptk has previously
     * been saved, it will retrieve related Alats from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Ptk.
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
     * Otherwise if this Ptk is new, it will return
     * an empty collection; or if this Ptk has previously
     * been saved, it will retrieve related Alats from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Ptk.
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
     * Otherwise if this Ptk is new, it will return
     * an empty collection; or if this Ptk has previously
     * been saved, it will retrieve related Alats from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Ptk.
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
     * Otherwise if this Ptk is new, it will return
     * an empty collection; or if this Ptk has previously
     * been saved, it will retrieve related Alats from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Ptk.
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
     * Otherwise if this Ptk is new, it will return
     * an empty collection; or if this Ptk has previously
     * been saved, it will retrieve related Alats from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Ptk.
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
     * Clears out the collAnaks collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Ptk The current object (for fluent API support)
     * @see        addAnaks()
     */
    public function clearAnaks()
    {
        $this->collAnaks = null; // important to set this to null since that means it is uninitialized
        $this->collAnaksPartial = null;

        return $this;
    }

    /**
     * reset is the collAnaks collection loaded partially
     *
     * @return void
     */
    public function resetPartialAnaks($v = true)
    {
        $this->collAnaksPartial = $v;
    }

    /**
     * Initializes the collAnaks collection.
     *
     * By default this just sets the collAnaks collection to an empty array (like clearcollAnaks());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initAnaks($overrideExisting = true)
    {
        if (null !== $this->collAnaks && !$overrideExisting) {
            return;
        }
        $this->collAnaks = new PropelObjectCollection();
        $this->collAnaks->setModel('Anak');
    }

    /**
     * Gets an array of Anak objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Ptk is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Anak[] List of Anak objects
     * @throws PropelException
     */
    public function getAnaks($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collAnaksPartial && !$this->isNew();
        if (null === $this->collAnaks || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collAnaks) {
                // return empty collection
                $this->initAnaks();
            } else {
                $collAnaks = AnakQuery::create(null, $criteria)
                    ->filterByPtk($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collAnaksPartial && count($collAnaks)) {
                      $this->initAnaks(false);

                      foreach($collAnaks as $obj) {
                        if (false == $this->collAnaks->contains($obj)) {
                          $this->collAnaks->append($obj);
                        }
                      }

                      $this->collAnaksPartial = true;
                    }

                    $collAnaks->getInternalIterator()->rewind();
                    return $collAnaks;
                }

                if($partial && $this->collAnaks) {
                    foreach($this->collAnaks as $obj) {
                        if($obj->isNew()) {
                            $collAnaks[] = $obj;
                        }
                    }
                }

                $this->collAnaks = $collAnaks;
                $this->collAnaksPartial = false;
            }
        }

        return $this->collAnaks;
    }

    /**
     * Sets a collection of Anak objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $anaks A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Ptk The current object (for fluent API support)
     */
    public function setAnaks(PropelCollection $anaks, PropelPDO $con = null)
    {
        $anaksToDelete = $this->getAnaks(new Criteria(), $con)->diff($anaks);

        $this->anaksScheduledForDeletion = unserialize(serialize($anaksToDelete));

        foreach ($anaksToDelete as $anakRemoved) {
            $anakRemoved->setPtk(null);
        }

        $this->collAnaks = null;
        foreach ($anaks as $anak) {
            $this->addAnak($anak);
        }

        $this->collAnaks = $anaks;
        $this->collAnaksPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Anak objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Anak objects.
     * @throws PropelException
     */
    public function countAnaks(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collAnaksPartial && !$this->isNew();
        if (null === $this->collAnaks || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collAnaks) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getAnaks());
            }
            $query = AnakQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPtk($this)
                ->count($con);
        }

        return count($this->collAnaks);
    }

    /**
     * Method called to associate a Anak object to this object
     * through the Anak foreign key attribute.
     *
     * @param    Anak $l Anak
     * @return Ptk The current object (for fluent API support)
     */
    public function addAnak(Anak $l)
    {
        if ($this->collAnaks === null) {
            $this->initAnaks();
            $this->collAnaksPartial = true;
        }
        if (!in_array($l, $this->collAnaks->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddAnak($l);
        }

        return $this;
    }

    /**
     * @param	Anak $anak The anak object to add.
     */
    protected function doAddAnak($anak)
    {
        $this->collAnaks[]= $anak;
        $anak->setPtk($this);
    }

    /**
     * @param	Anak $anak The anak object to remove.
     * @return Ptk The current object (for fluent API support)
     */
    public function removeAnak($anak)
    {
        if ($this->getAnaks()->contains($anak)) {
            $this->collAnaks->remove($this->collAnaks->search($anak));
            if (null === $this->anaksScheduledForDeletion) {
                $this->anaksScheduledForDeletion = clone $this->collAnaks;
                $this->anaksScheduledForDeletion->clear();
            }
            $this->anaksScheduledForDeletion[]= clone $anak;
            $anak->setPtk(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Ptk is new, it will return
     * an empty collection; or if this Ptk has previously
     * been saved, it will retrieve related Anaks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Ptk.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Anak[] List of Anak objects
     */
    public function getAnaksJoinStatusAnak($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = AnakQuery::create(null, $criteria);
        $query->joinWith('StatusAnak', $join_behavior);

        return $this->getAnaks($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Ptk is new, it will return
     * an empty collection; or if this Ptk has previously
     * been saved, it will retrieve related Anaks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Ptk.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Anak[] List of Anak objects
     */
    public function getAnaksJoinJenjangPendidikan($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = AnakQuery::create(null, $criteria);
        $query->joinWith('JenjangPendidikan', $join_behavior);

        return $this->getAnaks($query, $con);
    }

    /**
     * Clears out the collAnggotaPanitias collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Ptk The current object (for fluent API support)
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
     * If this Ptk is new, it will return
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
                    ->filterByPtk($this)
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
     * @return Ptk The current object (for fluent API support)
     */
    public function setAnggotaPanitias(PropelCollection $anggotaPanitias, PropelPDO $con = null)
    {
        $anggotaPanitiasToDelete = $this->getAnggotaPanitias(new Criteria(), $con)->diff($anggotaPanitias);

        $this->anggotaPanitiasScheduledForDeletion = unserialize(serialize($anggotaPanitiasToDelete));

        foreach ($anggotaPanitiasToDelete as $anggotaPanitiaRemoved) {
            $anggotaPanitiaRemoved->setPtk(null);
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
                ->filterByPtk($this)
                ->count($con);
        }

        return count($this->collAnggotaPanitias);
    }

    /**
     * Method called to associate a AnggotaPanitia object to this object
     * through the AnggotaPanitia foreign key attribute.
     *
     * @param    AnggotaPanitia $l AnggotaPanitia
     * @return Ptk The current object (for fluent API support)
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
        $anggotaPanitia->setPtk($this);
    }

    /**
     * @param	AnggotaPanitia $anggotaPanitia The anggotaPanitia object to remove.
     * @return Ptk The current object (for fluent API support)
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
            $anggotaPanitia->setPtk(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Ptk is new, it will return
     * an empty collection; or if this Ptk has previously
     * been saved, it will retrieve related AnggotaPanitias from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Ptk.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|AnggotaPanitia[] List of AnggotaPanitia objects
     */
    public function getAnggotaPanitiasJoinPesertaDidik($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = AnggotaPanitiaQuery::create(null, $criteria);
        $query->joinWith('PesertaDidik', $join_behavior);

        return $this->getAnggotaPanitias($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Ptk is new, it will return
     * an empty collection; or if this Ptk has previously
     * been saved, it will retrieve related AnggotaPanitias from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Ptk.
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
     * Clears out the collAngkutans collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Ptk The current object (for fluent API support)
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
     * If this Ptk is new, it will return
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
                    ->filterByPtk($this)
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
     * @return Ptk The current object (for fluent API support)
     */
    public function setAngkutans(PropelCollection $angkutans, PropelPDO $con = null)
    {
        $angkutansToDelete = $this->getAngkutans(new Criteria(), $con)->diff($angkutans);

        $this->angkutansScheduledForDeletion = unserialize(serialize($angkutansToDelete));

        foreach ($angkutansToDelete as $angkutanRemoved) {
            $angkutanRemoved->setPtk(null);
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
                ->filterByPtk($this)
                ->count($con);
        }

        return count($this->collAngkutans);
    }

    /**
     * Method called to associate a Angkutan object to this object
     * through the Angkutan foreign key attribute.
     *
     * @param    Angkutan $l Angkutan
     * @return Ptk The current object (for fluent API support)
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
        $angkutan->setPtk($this);
    }

    /**
     * @param	Angkutan $angkutan The angkutan object to remove.
     * @return Ptk The current object (for fluent API support)
     */
    public function removeAngkutan($angkutan)
    {
        if ($this->getAngkutans()->contains($angkutan)) {
            $this->collAngkutans->remove($this->collAngkutans->search($angkutan));
            if (null === $this->angkutansScheduledForDeletion) {
                $this->angkutansScheduledForDeletion = clone $this->collAngkutans;
                $this->angkutansScheduledForDeletion->clear();
            }
            $this->angkutansScheduledForDeletion[]= $angkutan;
            $angkutan->setPtk(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Ptk is new, it will return
     * an empty collection; or if this Ptk has previously
     * been saved, it will retrieve related Angkutans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Ptk.
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
     * Otherwise if this Ptk is new, it will return
     * an empty collection; or if this Ptk has previously
     * been saved, it will retrieve related Angkutans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Ptk.
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
     * Otherwise if this Ptk is new, it will return
     * an empty collection; or if this Ptk has previously
     * been saved, it will retrieve related Angkutans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Ptk.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Angkutan[] List of Angkutan objects
     */
    public function getAngkutansJoinSekolah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = AngkutanQuery::create(null, $criteria);
        $query->joinWith('Sekolah', $join_behavior);

        return $this->getAngkutans($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Ptk is new, it will return
     * an empty collection; or if this Ptk has previously
     * been saved, it will retrieve related Angkutans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Ptk.
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
     * @return Ptk The current object (for fluent API support)
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
     * If this Ptk is new, it will return
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
                    ->filterByPtk($this)
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
     * @return Ptk The current object (for fluent API support)
     */
    public function setBangunans(PropelCollection $bangunans, PropelPDO $con = null)
    {
        $bangunansToDelete = $this->getBangunans(new Criteria(), $con)->diff($bangunans);

        $this->bangunansScheduledForDeletion = unserialize(serialize($bangunansToDelete));

        foreach ($bangunansToDelete as $bangunanRemoved) {
            $bangunanRemoved->setPtk(null);
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
                ->filterByPtk($this)
                ->count($con);
        }

        return count($this->collBangunans);
    }

    /**
     * Method called to associate a Bangunan object to this object
     * through the Bangunan foreign key attribute.
     *
     * @param    Bangunan $l Bangunan
     * @return Ptk The current object (for fluent API support)
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
        $bangunan->setPtk($this);
    }

    /**
     * @param	Bangunan $bangunan The bangunan object to remove.
     * @return Ptk The current object (for fluent API support)
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
            $bangunan->setPtk(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Ptk is new, it will return
     * an empty collection; or if this Ptk has previously
     * been saved, it will retrieve related Bangunans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Ptk.
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
     * Otherwise if this Ptk is new, it will return
     * an empty collection; or if this Ptk has previously
     * been saved, it will retrieve related Bangunans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Ptk.
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
     * Otherwise if this Ptk is new, it will return
     * an empty collection; or if this Ptk has previously
     * been saved, it will retrieve related Bangunans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Ptk.
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
     * Otherwise if this Ptk is new, it will return
     * an empty collection; or if this Ptk has previously
     * been saved, it will retrieve related Bangunans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Ptk.
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
     * Otherwise if this Ptk is new, it will return
     * an empty collection; or if this Ptk has previously
     * been saved, it will retrieve related Bangunans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Ptk.
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
     * Clears out the collBeasiswaPtks collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Ptk The current object (for fluent API support)
     * @see        addBeasiswaPtks()
     */
    public function clearBeasiswaPtks()
    {
        $this->collBeasiswaPtks = null; // important to set this to null since that means it is uninitialized
        $this->collBeasiswaPtksPartial = null;

        return $this;
    }

    /**
     * reset is the collBeasiswaPtks collection loaded partially
     *
     * @return void
     */
    public function resetPartialBeasiswaPtks($v = true)
    {
        $this->collBeasiswaPtksPartial = $v;
    }

    /**
     * Initializes the collBeasiswaPtks collection.
     *
     * By default this just sets the collBeasiswaPtks collection to an empty array (like clearcollBeasiswaPtks());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initBeasiswaPtks($overrideExisting = true)
    {
        if (null !== $this->collBeasiswaPtks && !$overrideExisting) {
            return;
        }
        $this->collBeasiswaPtks = new PropelObjectCollection();
        $this->collBeasiswaPtks->setModel('BeasiswaPtk');
    }

    /**
     * Gets an array of BeasiswaPtk objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Ptk is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|BeasiswaPtk[] List of BeasiswaPtk objects
     * @throws PropelException
     */
    public function getBeasiswaPtks($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collBeasiswaPtksPartial && !$this->isNew();
        if (null === $this->collBeasiswaPtks || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collBeasiswaPtks) {
                // return empty collection
                $this->initBeasiswaPtks();
            } else {
                $collBeasiswaPtks = BeasiswaPtkQuery::create(null, $criteria)
                    ->filterByPtk($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collBeasiswaPtksPartial && count($collBeasiswaPtks)) {
                      $this->initBeasiswaPtks(false);

                      foreach($collBeasiswaPtks as $obj) {
                        if (false == $this->collBeasiswaPtks->contains($obj)) {
                          $this->collBeasiswaPtks->append($obj);
                        }
                      }

                      $this->collBeasiswaPtksPartial = true;
                    }

                    $collBeasiswaPtks->getInternalIterator()->rewind();
                    return $collBeasiswaPtks;
                }

                if($partial && $this->collBeasiswaPtks) {
                    foreach($this->collBeasiswaPtks as $obj) {
                        if($obj->isNew()) {
                            $collBeasiswaPtks[] = $obj;
                        }
                    }
                }

                $this->collBeasiswaPtks = $collBeasiswaPtks;
                $this->collBeasiswaPtksPartial = false;
            }
        }

        return $this->collBeasiswaPtks;
    }

    /**
     * Sets a collection of BeasiswaPtk objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $beasiswaPtks A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Ptk The current object (for fluent API support)
     */
    public function setBeasiswaPtks(PropelCollection $beasiswaPtks, PropelPDO $con = null)
    {
        $beasiswaPtksToDelete = $this->getBeasiswaPtks(new Criteria(), $con)->diff($beasiswaPtks);

        $this->beasiswaPtksScheduledForDeletion = unserialize(serialize($beasiswaPtksToDelete));

        foreach ($beasiswaPtksToDelete as $beasiswaPtkRemoved) {
            $beasiswaPtkRemoved->setPtk(null);
        }

        $this->collBeasiswaPtks = null;
        foreach ($beasiswaPtks as $beasiswaPtk) {
            $this->addBeasiswaPtk($beasiswaPtk);
        }

        $this->collBeasiswaPtks = $beasiswaPtks;
        $this->collBeasiswaPtksPartial = false;

        return $this;
    }

    /**
     * Returns the number of related BeasiswaPtk objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related BeasiswaPtk objects.
     * @throws PropelException
     */
    public function countBeasiswaPtks(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collBeasiswaPtksPartial && !$this->isNew();
        if (null === $this->collBeasiswaPtks || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collBeasiswaPtks) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getBeasiswaPtks());
            }
            $query = BeasiswaPtkQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPtk($this)
                ->count($con);
        }

        return count($this->collBeasiswaPtks);
    }

    /**
     * Method called to associate a BeasiswaPtk object to this object
     * through the BeasiswaPtk foreign key attribute.
     *
     * @param    BeasiswaPtk $l BeasiswaPtk
     * @return Ptk The current object (for fluent API support)
     */
    public function addBeasiswaPtk(BeasiswaPtk $l)
    {
        if ($this->collBeasiswaPtks === null) {
            $this->initBeasiswaPtks();
            $this->collBeasiswaPtksPartial = true;
        }
        if (!in_array($l, $this->collBeasiswaPtks->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddBeasiswaPtk($l);
        }

        return $this;
    }

    /**
     * @param	BeasiswaPtk $beasiswaPtk The beasiswaPtk object to add.
     */
    protected function doAddBeasiswaPtk($beasiswaPtk)
    {
        $this->collBeasiswaPtks[]= $beasiswaPtk;
        $beasiswaPtk->setPtk($this);
    }

    /**
     * @param	BeasiswaPtk $beasiswaPtk The beasiswaPtk object to remove.
     * @return Ptk The current object (for fluent API support)
     */
    public function removeBeasiswaPtk($beasiswaPtk)
    {
        if ($this->getBeasiswaPtks()->contains($beasiswaPtk)) {
            $this->collBeasiswaPtks->remove($this->collBeasiswaPtks->search($beasiswaPtk));
            if (null === $this->beasiswaPtksScheduledForDeletion) {
                $this->beasiswaPtksScheduledForDeletion = clone $this->collBeasiswaPtks;
                $this->beasiswaPtksScheduledForDeletion->clear();
            }
            $this->beasiswaPtksScheduledForDeletion[]= clone $beasiswaPtk;
            $beasiswaPtk->setPtk(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Ptk is new, it will return
     * an empty collection; or if this Ptk has previously
     * been saved, it will retrieve related BeasiswaPtks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Ptk.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|BeasiswaPtk[] List of BeasiswaPtk objects
     */
    public function getBeasiswaPtksJoinJenisBeasiswa($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = BeasiswaPtkQuery::create(null, $criteria);
        $query->joinWith('JenisBeasiswa', $join_behavior);

        return $this->getBeasiswaPtks($query, $con);
    }

    /**
     * Clears out the collBidangSdms collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Ptk The current object (for fluent API support)
     * @see        addBidangSdms()
     */
    public function clearBidangSdms()
    {
        $this->collBidangSdms = null; // important to set this to null since that means it is uninitialized
        $this->collBidangSdmsPartial = null;

        return $this;
    }

    /**
     * reset is the collBidangSdms collection loaded partially
     *
     * @return void
     */
    public function resetPartialBidangSdms($v = true)
    {
        $this->collBidangSdmsPartial = $v;
    }

    /**
     * Initializes the collBidangSdms collection.
     *
     * By default this just sets the collBidangSdms collection to an empty array (like clearcollBidangSdms());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initBidangSdms($overrideExisting = true)
    {
        if (null !== $this->collBidangSdms && !$overrideExisting) {
            return;
        }
        $this->collBidangSdms = new PropelObjectCollection();
        $this->collBidangSdms->setModel('BidangSdm');
    }

    /**
     * Gets an array of BidangSdm objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Ptk is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|BidangSdm[] List of BidangSdm objects
     * @throws PropelException
     */
    public function getBidangSdms($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collBidangSdmsPartial && !$this->isNew();
        if (null === $this->collBidangSdms || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collBidangSdms) {
                // return empty collection
                $this->initBidangSdms();
            } else {
                $collBidangSdms = BidangSdmQuery::create(null, $criteria)
                    ->filterByPtk($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collBidangSdmsPartial && count($collBidangSdms)) {
                      $this->initBidangSdms(false);

                      foreach($collBidangSdms as $obj) {
                        if (false == $this->collBidangSdms->contains($obj)) {
                          $this->collBidangSdms->append($obj);
                        }
                      }

                      $this->collBidangSdmsPartial = true;
                    }

                    $collBidangSdms->getInternalIterator()->rewind();
                    return $collBidangSdms;
                }

                if($partial && $this->collBidangSdms) {
                    foreach($this->collBidangSdms as $obj) {
                        if($obj->isNew()) {
                            $collBidangSdms[] = $obj;
                        }
                    }
                }

                $this->collBidangSdms = $collBidangSdms;
                $this->collBidangSdmsPartial = false;
            }
        }

        return $this->collBidangSdms;
    }

    /**
     * Sets a collection of BidangSdm objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $bidangSdms A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Ptk The current object (for fluent API support)
     */
    public function setBidangSdms(PropelCollection $bidangSdms, PropelPDO $con = null)
    {
        $bidangSdmsToDelete = $this->getBidangSdms(new Criteria(), $con)->diff($bidangSdms);

        $this->bidangSdmsScheduledForDeletion = unserialize(serialize($bidangSdmsToDelete));

        foreach ($bidangSdmsToDelete as $bidangSdmRemoved) {
            $bidangSdmRemoved->setPtk(null);
        }

        $this->collBidangSdms = null;
        foreach ($bidangSdms as $bidangSdm) {
            $this->addBidangSdm($bidangSdm);
        }

        $this->collBidangSdms = $bidangSdms;
        $this->collBidangSdmsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related BidangSdm objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related BidangSdm objects.
     * @throws PropelException
     */
    public function countBidangSdms(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collBidangSdmsPartial && !$this->isNew();
        if (null === $this->collBidangSdms || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collBidangSdms) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getBidangSdms());
            }
            $query = BidangSdmQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPtk($this)
                ->count($con);
        }

        return count($this->collBidangSdms);
    }

    /**
     * Method called to associate a BidangSdm object to this object
     * through the BidangSdm foreign key attribute.
     *
     * @param    BidangSdm $l BidangSdm
     * @return Ptk The current object (for fluent API support)
     */
    public function addBidangSdm(BidangSdm $l)
    {
        if ($this->collBidangSdms === null) {
            $this->initBidangSdms();
            $this->collBidangSdmsPartial = true;
        }
        if (!in_array($l, $this->collBidangSdms->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddBidangSdm($l);
        }

        return $this;
    }

    /**
     * @param	BidangSdm $bidangSdm The bidangSdm object to add.
     */
    protected function doAddBidangSdm($bidangSdm)
    {
        $this->collBidangSdms[]= $bidangSdm;
        $bidangSdm->setPtk($this);
    }

    /**
     * @param	BidangSdm $bidangSdm The bidangSdm object to remove.
     * @return Ptk The current object (for fluent API support)
     */
    public function removeBidangSdm($bidangSdm)
    {
        if ($this->getBidangSdms()->contains($bidangSdm)) {
            $this->collBidangSdms->remove($this->collBidangSdms->search($bidangSdm));
            if (null === $this->bidangSdmsScheduledForDeletion) {
                $this->bidangSdmsScheduledForDeletion = clone $this->collBidangSdms;
                $this->bidangSdmsScheduledForDeletion->clear();
            }
            $this->bidangSdmsScheduledForDeletion[]= clone $bidangSdm;
            $bidangSdm->setPtk(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Ptk is new, it will return
     * an empty collection; or if this Ptk has previously
     * been saved, it will retrieve related BidangSdms from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Ptk.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|BidangSdm[] List of BidangSdm objects
     */
    public function getBidangSdmsJoinBidangStudi($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = BidangSdmQuery::create(null, $criteria);
        $query->joinWith('BidangStudi', $join_behavior);

        return $this->getBidangSdms($query, $con);
    }

    /**
     * Clears out the collBimbingPds collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Ptk The current object (for fluent API support)
     * @see        addBimbingPds()
     */
    public function clearBimbingPds()
    {
        $this->collBimbingPds = null; // important to set this to null since that means it is uninitialized
        $this->collBimbingPdsPartial = null;

        return $this;
    }

    /**
     * reset is the collBimbingPds collection loaded partially
     *
     * @return void
     */
    public function resetPartialBimbingPds($v = true)
    {
        $this->collBimbingPdsPartial = $v;
    }

    /**
     * Initializes the collBimbingPds collection.
     *
     * By default this just sets the collBimbingPds collection to an empty array (like clearcollBimbingPds());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initBimbingPds($overrideExisting = true)
    {
        if (null !== $this->collBimbingPds && !$overrideExisting) {
            return;
        }
        $this->collBimbingPds = new PropelObjectCollection();
        $this->collBimbingPds->setModel('BimbingPd');
    }

    /**
     * Gets an array of BimbingPd objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Ptk is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|BimbingPd[] List of BimbingPd objects
     * @throws PropelException
     */
    public function getBimbingPds($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collBimbingPdsPartial && !$this->isNew();
        if (null === $this->collBimbingPds || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collBimbingPds) {
                // return empty collection
                $this->initBimbingPds();
            } else {
                $collBimbingPds = BimbingPdQuery::create(null, $criteria)
                    ->filterByPtk($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collBimbingPdsPartial && count($collBimbingPds)) {
                      $this->initBimbingPds(false);

                      foreach($collBimbingPds as $obj) {
                        if (false == $this->collBimbingPds->contains($obj)) {
                          $this->collBimbingPds->append($obj);
                        }
                      }

                      $this->collBimbingPdsPartial = true;
                    }

                    $collBimbingPds->getInternalIterator()->rewind();
                    return $collBimbingPds;
                }

                if($partial && $this->collBimbingPds) {
                    foreach($this->collBimbingPds as $obj) {
                        if($obj->isNew()) {
                            $collBimbingPds[] = $obj;
                        }
                    }
                }

                $this->collBimbingPds = $collBimbingPds;
                $this->collBimbingPdsPartial = false;
            }
        }

        return $this->collBimbingPds;
    }

    /**
     * Sets a collection of BimbingPd objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $bimbingPds A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Ptk The current object (for fluent API support)
     */
    public function setBimbingPds(PropelCollection $bimbingPds, PropelPDO $con = null)
    {
        $bimbingPdsToDelete = $this->getBimbingPds(new Criteria(), $con)->diff($bimbingPds);

        $this->bimbingPdsScheduledForDeletion = unserialize(serialize($bimbingPdsToDelete));

        foreach ($bimbingPdsToDelete as $bimbingPdRemoved) {
            $bimbingPdRemoved->setPtk(null);
        }

        $this->collBimbingPds = null;
        foreach ($bimbingPds as $bimbingPd) {
            $this->addBimbingPd($bimbingPd);
        }

        $this->collBimbingPds = $bimbingPds;
        $this->collBimbingPdsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related BimbingPd objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related BimbingPd objects.
     * @throws PropelException
     */
    public function countBimbingPds(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collBimbingPdsPartial && !$this->isNew();
        if (null === $this->collBimbingPds || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collBimbingPds) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getBimbingPds());
            }
            $query = BimbingPdQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPtk($this)
                ->count($con);
        }

        return count($this->collBimbingPds);
    }

    /**
     * Method called to associate a BimbingPd object to this object
     * through the BimbingPd foreign key attribute.
     *
     * @param    BimbingPd $l BimbingPd
     * @return Ptk The current object (for fluent API support)
     */
    public function addBimbingPd(BimbingPd $l)
    {
        if ($this->collBimbingPds === null) {
            $this->initBimbingPds();
            $this->collBimbingPdsPartial = true;
        }
        if (!in_array($l, $this->collBimbingPds->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddBimbingPd($l);
        }

        return $this;
    }

    /**
     * @param	BimbingPd $bimbingPd The bimbingPd object to add.
     */
    protected function doAddBimbingPd($bimbingPd)
    {
        $this->collBimbingPds[]= $bimbingPd;
        $bimbingPd->setPtk($this);
    }

    /**
     * @param	BimbingPd $bimbingPd The bimbingPd object to remove.
     * @return Ptk The current object (for fluent API support)
     */
    public function removeBimbingPd($bimbingPd)
    {
        if ($this->getBimbingPds()->contains($bimbingPd)) {
            $this->collBimbingPds->remove($this->collBimbingPds->search($bimbingPd));
            if (null === $this->bimbingPdsScheduledForDeletion) {
                $this->bimbingPdsScheduledForDeletion = clone $this->collBimbingPds;
                $this->bimbingPdsScheduledForDeletion->clear();
            }
            $this->bimbingPdsScheduledForDeletion[]= clone $bimbingPd;
            $bimbingPd->setPtk(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Ptk is new, it will return
     * an empty collection; or if this Ptk has previously
     * been saved, it will retrieve related BimbingPds from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Ptk.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|BimbingPd[] List of BimbingPd objects
     */
    public function getBimbingPdsJoinAktPd($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = BimbingPdQuery::create(null, $criteria);
        $query->joinWith('AktPd', $join_behavior);

        return $this->getBimbingPds($query, $con);
    }

    /**
     * Clears out the collBukuPtks collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Ptk The current object (for fluent API support)
     * @see        addBukuPtks()
     */
    public function clearBukuPtks()
    {
        $this->collBukuPtks = null; // important to set this to null since that means it is uninitialized
        $this->collBukuPtksPartial = null;

        return $this;
    }

    /**
     * reset is the collBukuPtks collection loaded partially
     *
     * @return void
     */
    public function resetPartialBukuPtks($v = true)
    {
        $this->collBukuPtksPartial = $v;
    }

    /**
     * Initializes the collBukuPtks collection.
     *
     * By default this just sets the collBukuPtks collection to an empty array (like clearcollBukuPtks());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initBukuPtks($overrideExisting = true)
    {
        if (null !== $this->collBukuPtks && !$overrideExisting) {
            return;
        }
        $this->collBukuPtks = new PropelObjectCollection();
        $this->collBukuPtks->setModel('BukuPtk');
    }

    /**
     * Gets an array of BukuPtk objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Ptk is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|BukuPtk[] List of BukuPtk objects
     * @throws PropelException
     */
    public function getBukuPtks($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collBukuPtksPartial && !$this->isNew();
        if (null === $this->collBukuPtks || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collBukuPtks) {
                // return empty collection
                $this->initBukuPtks();
            } else {
                $collBukuPtks = BukuPtkQuery::create(null, $criteria)
                    ->filterByPtk($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collBukuPtksPartial && count($collBukuPtks)) {
                      $this->initBukuPtks(false);

                      foreach($collBukuPtks as $obj) {
                        if (false == $this->collBukuPtks->contains($obj)) {
                          $this->collBukuPtks->append($obj);
                        }
                      }

                      $this->collBukuPtksPartial = true;
                    }

                    $collBukuPtks->getInternalIterator()->rewind();
                    return $collBukuPtks;
                }

                if($partial && $this->collBukuPtks) {
                    foreach($this->collBukuPtks as $obj) {
                        if($obj->isNew()) {
                            $collBukuPtks[] = $obj;
                        }
                    }
                }

                $this->collBukuPtks = $collBukuPtks;
                $this->collBukuPtksPartial = false;
            }
        }

        return $this->collBukuPtks;
    }

    /**
     * Sets a collection of BukuPtk objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $bukuPtks A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Ptk The current object (for fluent API support)
     */
    public function setBukuPtks(PropelCollection $bukuPtks, PropelPDO $con = null)
    {
        $bukuPtksToDelete = $this->getBukuPtks(new Criteria(), $con)->diff($bukuPtks);

        $this->bukuPtksScheduledForDeletion = unserialize(serialize($bukuPtksToDelete));

        foreach ($bukuPtksToDelete as $bukuPtkRemoved) {
            $bukuPtkRemoved->setPtk(null);
        }

        $this->collBukuPtks = null;
        foreach ($bukuPtks as $bukuPtk) {
            $this->addBukuPtk($bukuPtk);
        }

        $this->collBukuPtks = $bukuPtks;
        $this->collBukuPtksPartial = false;

        return $this;
    }

    /**
     * Returns the number of related BukuPtk objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related BukuPtk objects.
     * @throws PropelException
     */
    public function countBukuPtks(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collBukuPtksPartial && !$this->isNew();
        if (null === $this->collBukuPtks || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collBukuPtks) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getBukuPtks());
            }
            $query = BukuPtkQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPtk($this)
                ->count($con);
        }

        return count($this->collBukuPtks);
    }

    /**
     * Method called to associate a BukuPtk object to this object
     * through the BukuPtk foreign key attribute.
     *
     * @param    BukuPtk $l BukuPtk
     * @return Ptk The current object (for fluent API support)
     */
    public function addBukuPtk(BukuPtk $l)
    {
        if ($this->collBukuPtks === null) {
            $this->initBukuPtks();
            $this->collBukuPtksPartial = true;
        }
        if (!in_array($l, $this->collBukuPtks->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddBukuPtk($l);
        }

        return $this;
    }

    /**
     * @param	BukuPtk $bukuPtk The bukuPtk object to add.
     */
    protected function doAddBukuPtk($bukuPtk)
    {
        $this->collBukuPtks[]= $bukuPtk;
        $bukuPtk->setPtk($this);
    }

    /**
     * @param	BukuPtk $bukuPtk The bukuPtk object to remove.
     * @return Ptk The current object (for fluent API support)
     */
    public function removeBukuPtk($bukuPtk)
    {
        if ($this->getBukuPtks()->contains($bukuPtk)) {
            $this->collBukuPtks->remove($this->collBukuPtks->search($bukuPtk));
            if (null === $this->bukuPtksScheduledForDeletion) {
                $this->bukuPtksScheduledForDeletion = clone $this->collBukuPtks;
                $this->bukuPtksScheduledForDeletion->clear();
            }
            $this->bukuPtksScheduledForDeletion[]= clone $bukuPtk;
            $bukuPtk->setPtk(null);
        }

        return $this;
    }

    /**
     * Clears out the collDiklats collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Ptk The current object (for fluent API support)
     * @see        addDiklats()
     */
    public function clearDiklats()
    {
        $this->collDiklats = null; // important to set this to null since that means it is uninitialized
        $this->collDiklatsPartial = null;

        return $this;
    }

    /**
     * reset is the collDiklats collection loaded partially
     *
     * @return void
     */
    public function resetPartialDiklats($v = true)
    {
        $this->collDiklatsPartial = $v;
    }

    /**
     * Initializes the collDiklats collection.
     *
     * By default this just sets the collDiklats collection to an empty array (like clearcollDiklats());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initDiklats($overrideExisting = true)
    {
        if (null !== $this->collDiklats && !$overrideExisting) {
            return;
        }
        $this->collDiklats = new PropelObjectCollection();
        $this->collDiklats->setModel('Diklat');
    }

    /**
     * Gets an array of Diklat objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Ptk is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Diklat[] List of Diklat objects
     * @throws PropelException
     */
    public function getDiklats($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collDiklatsPartial && !$this->isNew();
        if (null === $this->collDiklats || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collDiklats) {
                // return empty collection
                $this->initDiklats();
            } else {
                $collDiklats = DiklatQuery::create(null, $criteria)
                    ->filterByPtk($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collDiklatsPartial && count($collDiklats)) {
                      $this->initDiklats(false);

                      foreach($collDiklats as $obj) {
                        if (false == $this->collDiklats->contains($obj)) {
                          $this->collDiklats->append($obj);
                        }
                      }

                      $this->collDiklatsPartial = true;
                    }

                    $collDiklats->getInternalIterator()->rewind();
                    return $collDiklats;
                }

                if($partial && $this->collDiklats) {
                    foreach($this->collDiklats as $obj) {
                        if($obj->isNew()) {
                            $collDiklats[] = $obj;
                        }
                    }
                }

                $this->collDiklats = $collDiklats;
                $this->collDiklatsPartial = false;
            }
        }

        return $this->collDiklats;
    }

    /**
     * Sets a collection of Diklat objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $diklats A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Ptk The current object (for fluent API support)
     */
    public function setDiklats(PropelCollection $diklats, PropelPDO $con = null)
    {
        $diklatsToDelete = $this->getDiklats(new Criteria(), $con)->diff($diklats);

        $this->diklatsScheduledForDeletion = unserialize(serialize($diklatsToDelete));

        foreach ($diklatsToDelete as $diklatRemoved) {
            $diklatRemoved->setPtk(null);
        }

        $this->collDiklats = null;
        foreach ($diklats as $diklat) {
            $this->addDiklat($diklat);
        }

        $this->collDiklats = $diklats;
        $this->collDiklatsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Diklat objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Diklat objects.
     * @throws PropelException
     */
    public function countDiklats(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collDiklatsPartial && !$this->isNew();
        if (null === $this->collDiklats || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collDiklats) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getDiklats());
            }
            $query = DiklatQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPtk($this)
                ->count($con);
        }

        return count($this->collDiklats);
    }

    /**
     * Method called to associate a Diklat object to this object
     * through the Diklat foreign key attribute.
     *
     * @param    Diklat $l Diklat
     * @return Ptk The current object (for fluent API support)
     */
    public function addDiklat(Diklat $l)
    {
        if ($this->collDiklats === null) {
            $this->initDiklats();
            $this->collDiklatsPartial = true;
        }
        if (!in_array($l, $this->collDiklats->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddDiklat($l);
        }

        return $this;
    }

    /**
     * @param	Diklat $diklat The diklat object to add.
     */
    protected function doAddDiklat($diklat)
    {
        $this->collDiklats[]= $diklat;
        $diklat->setPtk($this);
    }

    /**
     * @param	Diklat $diklat The diklat object to remove.
     * @return Ptk The current object (for fluent API support)
     */
    public function removeDiklat($diklat)
    {
        if ($this->getDiklats()->contains($diklat)) {
            $this->collDiklats->remove($this->collDiklats->search($diklat));
            if (null === $this->diklatsScheduledForDeletion) {
                $this->diklatsScheduledForDeletion = clone $this->collDiklats;
                $this->diklatsScheduledForDeletion->clear();
            }
            $this->diklatsScheduledForDeletion[]= clone $diklat;
            $diklat->setPtk(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Ptk is new, it will return
     * an empty collection; or if this Ptk has previously
     * been saved, it will retrieve related Diklats from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Ptk.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Diklat[] List of Diklat objects
     */
    public function getDiklatsJoinJenisDiklat($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = DiklatQuery::create(null, $criteria);
        $query->joinWith('JenisDiklat', $join_behavior);

        return $this->getDiklats($query, $con);
    }

    /**
     * Clears out the collInpassings collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Ptk The current object (for fluent API support)
     * @see        addInpassings()
     */
    public function clearInpassings()
    {
        $this->collInpassings = null; // important to set this to null since that means it is uninitialized
        $this->collInpassingsPartial = null;

        return $this;
    }

    /**
     * reset is the collInpassings collection loaded partially
     *
     * @return void
     */
    public function resetPartialInpassings($v = true)
    {
        $this->collInpassingsPartial = $v;
    }

    /**
     * Initializes the collInpassings collection.
     *
     * By default this just sets the collInpassings collection to an empty array (like clearcollInpassings());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initInpassings($overrideExisting = true)
    {
        if (null !== $this->collInpassings && !$overrideExisting) {
            return;
        }
        $this->collInpassings = new PropelObjectCollection();
        $this->collInpassings->setModel('Inpassing');
    }

    /**
     * Gets an array of Inpassing objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Ptk is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Inpassing[] List of Inpassing objects
     * @throws PropelException
     */
    public function getInpassings($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collInpassingsPartial && !$this->isNew();
        if (null === $this->collInpassings || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collInpassings) {
                // return empty collection
                $this->initInpassings();
            } else {
                $collInpassings = InpassingQuery::create(null, $criteria)
                    ->filterByPtk($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collInpassingsPartial && count($collInpassings)) {
                      $this->initInpassings(false);

                      foreach($collInpassings as $obj) {
                        if (false == $this->collInpassings->contains($obj)) {
                          $this->collInpassings->append($obj);
                        }
                      }

                      $this->collInpassingsPartial = true;
                    }

                    $collInpassings->getInternalIterator()->rewind();
                    return $collInpassings;
                }

                if($partial && $this->collInpassings) {
                    foreach($this->collInpassings as $obj) {
                        if($obj->isNew()) {
                            $collInpassings[] = $obj;
                        }
                    }
                }

                $this->collInpassings = $collInpassings;
                $this->collInpassingsPartial = false;
            }
        }

        return $this->collInpassings;
    }

    /**
     * Sets a collection of Inpassing objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $inpassings A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Ptk The current object (for fluent API support)
     */
    public function setInpassings(PropelCollection $inpassings, PropelPDO $con = null)
    {
        $inpassingsToDelete = $this->getInpassings(new Criteria(), $con)->diff($inpassings);

        $this->inpassingsScheduledForDeletion = unserialize(serialize($inpassingsToDelete));

        foreach ($inpassingsToDelete as $inpassingRemoved) {
            $inpassingRemoved->setPtk(null);
        }

        $this->collInpassings = null;
        foreach ($inpassings as $inpassing) {
            $this->addInpassing($inpassing);
        }

        $this->collInpassings = $inpassings;
        $this->collInpassingsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Inpassing objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Inpassing objects.
     * @throws PropelException
     */
    public function countInpassings(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collInpassingsPartial && !$this->isNew();
        if (null === $this->collInpassings || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collInpassings) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getInpassings());
            }
            $query = InpassingQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPtk($this)
                ->count($con);
        }

        return count($this->collInpassings);
    }

    /**
     * Method called to associate a Inpassing object to this object
     * through the Inpassing foreign key attribute.
     *
     * @param    Inpassing $l Inpassing
     * @return Ptk The current object (for fluent API support)
     */
    public function addInpassing(Inpassing $l)
    {
        if ($this->collInpassings === null) {
            $this->initInpassings();
            $this->collInpassingsPartial = true;
        }
        if (!in_array($l, $this->collInpassings->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddInpassing($l);
        }

        return $this;
    }

    /**
     * @param	Inpassing $inpassing The inpassing object to add.
     */
    protected function doAddInpassing($inpassing)
    {
        $this->collInpassings[]= $inpassing;
        $inpassing->setPtk($this);
    }

    /**
     * @param	Inpassing $inpassing The inpassing object to remove.
     * @return Ptk The current object (for fluent API support)
     */
    public function removeInpassing($inpassing)
    {
        if ($this->getInpassings()->contains($inpassing)) {
            $this->collInpassings->remove($this->collInpassings->search($inpassing));
            if (null === $this->inpassingsScheduledForDeletion) {
                $this->inpassingsScheduledForDeletion = clone $this->collInpassings;
                $this->inpassingsScheduledForDeletion->clear();
            }
            $this->inpassingsScheduledForDeletion[]= $inpassing;
            $inpassing->setPtk(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Ptk is new, it will return
     * an empty collection; or if this Ptk has previously
     * been saved, it will retrieve related Inpassings from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Ptk.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Inpassing[] List of Inpassing objects
     */
    public function getInpassingsJoinPangkatGolongan($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = InpassingQuery::create(null, $criteria);
        $query->joinWith('PangkatGolongan', $join_behavior);

        return $this->getInpassings($query, $con);
    }

    /**
     * Clears out the collKaryaTuliss collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Ptk The current object (for fluent API support)
     * @see        addKaryaTuliss()
     */
    public function clearKaryaTuliss()
    {
        $this->collKaryaTuliss = null; // important to set this to null since that means it is uninitialized
        $this->collKaryaTulissPartial = null;

        return $this;
    }

    /**
     * reset is the collKaryaTuliss collection loaded partially
     *
     * @return void
     */
    public function resetPartialKaryaTuliss($v = true)
    {
        $this->collKaryaTulissPartial = $v;
    }

    /**
     * Initializes the collKaryaTuliss collection.
     *
     * By default this just sets the collKaryaTuliss collection to an empty array (like clearcollKaryaTuliss());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initKaryaTuliss($overrideExisting = true)
    {
        if (null !== $this->collKaryaTuliss && !$overrideExisting) {
            return;
        }
        $this->collKaryaTuliss = new PropelObjectCollection();
        $this->collKaryaTuliss->setModel('KaryaTulis');
    }

    /**
     * Gets an array of KaryaTulis objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Ptk is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|KaryaTulis[] List of KaryaTulis objects
     * @throws PropelException
     */
    public function getKaryaTuliss($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collKaryaTulissPartial && !$this->isNew();
        if (null === $this->collKaryaTuliss || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collKaryaTuliss) {
                // return empty collection
                $this->initKaryaTuliss();
            } else {
                $collKaryaTuliss = KaryaTulisQuery::create(null, $criteria)
                    ->filterByPtk($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collKaryaTulissPartial && count($collKaryaTuliss)) {
                      $this->initKaryaTuliss(false);

                      foreach($collKaryaTuliss as $obj) {
                        if (false == $this->collKaryaTuliss->contains($obj)) {
                          $this->collKaryaTuliss->append($obj);
                        }
                      }

                      $this->collKaryaTulissPartial = true;
                    }

                    $collKaryaTuliss->getInternalIterator()->rewind();
                    return $collKaryaTuliss;
                }

                if($partial && $this->collKaryaTuliss) {
                    foreach($this->collKaryaTuliss as $obj) {
                        if($obj->isNew()) {
                            $collKaryaTuliss[] = $obj;
                        }
                    }
                }

                $this->collKaryaTuliss = $collKaryaTuliss;
                $this->collKaryaTulissPartial = false;
            }
        }

        return $this->collKaryaTuliss;
    }

    /**
     * Sets a collection of KaryaTulis objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $karyaTuliss A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Ptk The current object (for fluent API support)
     */
    public function setKaryaTuliss(PropelCollection $karyaTuliss, PropelPDO $con = null)
    {
        $karyaTulissToDelete = $this->getKaryaTuliss(new Criteria(), $con)->diff($karyaTuliss);

        $this->karyaTulissScheduledForDeletion = unserialize(serialize($karyaTulissToDelete));

        foreach ($karyaTulissToDelete as $karyaTulisRemoved) {
            $karyaTulisRemoved->setPtk(null);
        }

        $this->collKaryaTuliss = null;
        foreach ($karyaTuliss as $karyaTulis) {
            $this->addKaryaTulis($karyaTulis);
        }

        $this->collKaryaTuliss = $karyaTuliss;
        $this->collKaryaTulissPartial = false;

        return $this;
    }

    /**
     * Returns the number of related KaryaTulis objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related KaryaTulis objects.
     * @throws PropelException
     */
    public function countKaryaTuliss(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collKaryaTulissPartial && !$this->isNew();
        if (null === $this->collKaryaTuliss || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collKaryaTuliss) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getKaryaTuliss());
            }
            $query = KaryaTulisQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPtk($this)
                ->count($con);
        }

        return count($this->collKaryaTuliss);
    }

    /**
     * Method called to associate a KaryaTulis object to this object
     * through the KaryaTulis foreign key attribute.
     *
     * @param    KaryaTulis $l KaryaTulis
     * @return Ptk The current object (for fluent API support)
     */
    public function addKaryaTulis(KaryaTulis $l)
    {
        if ($this->collKaryaTuliss === null) {
            $this->initKaryaTuliss();
            $this->collKaryaTulissPartial = true;
        }
        if (!in_array($l, $this->collKaryaTuliss->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddKaryaTulis($l);
        }

        return $this;
    }

    /**
     * @param	KaryaTulis $karyaTulis The karyaTulis object to add.
     */
    protected function doAddKaryaTulis($karyaTulis)
    {
        $this->collKaryaTuliss[]= $karyaTulis;
        $karyaTulis->setPtk($this);
    }

    /**
     * @param	KaryaTulis $karyaTulis The karyaTulis object to remove.
     * @return Ptk The current object (for fluent API support)
     */
    public function removeKaryaTulis($karyaTulis)
    {
        if ($this->getKaryaTuliss()->contains($karyaTulis)) {
            $this->collKaryaTuliss->remove($this->collKaryaTuliss->search($karyaTulis));
            if (null === $this->karyaTulissScheduledForDeletion) {
                $this->karyaTulissScheduledForDeletion = clone $this->collKaryaTuliss;
                $this->karyaTulissScheduledForDeletion->clear();
            }
            $this->karyaTulissScheduledForDeletion[]= clone $karyaTulis;
            $karyaTulis->setPtk(null);
        }

        return $this;
    }

    /**
     * Clears out the collKesejahteraans collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Ptk The current object (for fluent API support)
     * @see        addKesejahteraans()
     */
    public function clearKesejahteraans()
    {
        $this->collKesejahteraans = null; // important to set this to null since that means it is uninitialized
        $this->collKesejahteraansPartial = null;

        return $this;
    }

    /**
     * reset is the collKesejahteraans collection loaded partially
     *
     * @return void
     */
    public function resetPartialKesejahteraans($v = true)
    {
        $this->collKesejahteraansPartial = $v;
    }

    /**
     * Initializes the collKesejahteraans collection.
     *
     * By default this just sets the collKesejahteraans collection to an empty array (like clearcollKesejahteraans());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initKesejahteraans($overrideExisting = true)
    {
        if (null !== $this->collKesejahteraans && !$overrideExisting) {
            return;
        }
        $this->collKesejahteraans = new PropelObjectCollection();
        $this->collKesejahteraans->setModel('Kesejahteraan');
    }

    /**
     * Gets an array of Kesejahteraan objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Ptk is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Kesejahteraan[] List of Kesejahteraan objects
     * @throws PropelException
     */
    public function getKesejahteraans($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collKesejahteraansPartial && !$this->isNew();
        if (null === $this->collKesejahteraans || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collKesejahteraans) {
                // return empty collection
                $this->initKesejahteraans();
            } else {
                $collKesejahteraans = KesejahteraanQuery::create(null, $criteria)
                    ->filterByPtk($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collKesejahteraansPartial && count($collKesejahteraans)) {
                      $this->initKesejahteraans(false);

                      foreach($collKesejahteraans as $obj) {
                        if (false == $this->collKesejahteraans->contains($obj)) {
                          $this->collKesejahteraans->append($obj);
                        }
                      }

                      $this->collKesejahteraansPartial = true;
                    }

                    $collKesejahteraans->getInternalIterator()->rewind();
                    return $collKesejahteraans;
                }

                if($partial && $this->collKesejahteraans) {
                    foreach($this->collKesejahteraans as $obj) {
                        if($obj->isNew()) {
                            $collKesejahteraans[] = $obj;
                        }
                    }
                }

                $this->collKesejahteraans = $collKesejahteraans;
                $this->collKesejahteraansPartial = false;
            }
        }

        return $this->collKesejahteraans;
    }

    /**
     * Sets a collection of Kesejahteraan objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $kesejahteraans A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Ptk The current object (for fluent API support)
     */
    public function setKesejahteraans(PropelCollection $kesejahteraans, PropelPDO $con = null)
    {
        $kesejahteraansToDelete = $this->getKesejahteraans(new Criteria(), $con)->diff($kesejahteraans);

        $this->kesejahteraansScheduledForDeletion = unserialize(serialize($kesejahteraansToDelete));

        foreach ($kesejahteraansToDelete as $kesejahteraanRemoved) {
            $kesejahteraanRemoved->setPtk(null);
        }

        $this->collKesejahteraans = null;
        foreach ($kesejahteraans as $kesejahteraan) {
            $this->addKesejahteraan($kesejahteraan);
        }

        $this->collKesejahteraans = $kesejahteraans;
        $this->collKesejahteraansPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Kesejahteraan objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Kesejahteraan objects.
     * @throws PropelException
     */
    public function countKesejahteraans(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collKesejahteraansPartial && !$this->isNew();
        if (null === $this->collKesejahteraans || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collKesejahteraans) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getKesejahteraans());
            }
            $query = KesejahteraanQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPtk($this)
                ->count($con);
        }

        return count($this->collKesejahteraans);
    }

    /**
     * Method called to associate a Kesejahteraan object to this object
     * through the Kesejahteraan foreign key attribute.
     *
     * @param    Kesejahteraan $l Kesejahteraan
     * @return Ptk The current object (for fluent API support)
     */
    public function addKesejahteraan(Kesejahteraan $l)
    {
        if ($this->collKesejahteraans === null) {
            $this->initKesejahteraans();
            $this->collKesejahteraansPartial = true;
        }
        if (!in_array($l, $this->collKesejahteraans->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddKesejahteraan($l);
        }

        return $this;
    }

    /**
     * @param	Kesejahteraan $kesejahteraan The kesejahteraan object to add.
     */
    protected function doAddKesejahteraan($kesejahteraan)
    {
        $this->collKesejahteraans[]= $kesejahteraan;
        $kesejahteraan->setPtk($this);
    }

    /**
     * @param	Kesejahteraan $kesejahteraan The kesejahteraan object to remove.
     * @return Ptk The current object (for fluent API support)
     */
    public function removeKesejahteraan($kesejahteraan)
    {
        if ($this->getKesejahteraans()->contains($kesejahteraan)) {
            $this->collKesejahteraans->remove($this->collKesejahteraans->search($kesejahteraan));
            if (null === $this->kesejahteraansScheduledForDeletion) {
                $this->kesejahteraansScheduledForDeletion = clone $this->collKesejahteraans;
                $this->kesejahteraansScheduledForDeletion->clear();
            }
            $this->kesejahteraansScheduledForDeletion[]= clone $kesejahteraan;
            $kesejahteraan->setPtk(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Ptk is new, it will return
     * an empty collection; or if this Ptk has previously
     * been saved, it will retrieve related Kesejahteraans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Ptk.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Kesejahteraan[] List of Kesejahteraan objects
     */
    public function getKesejahteraansJoinJenisKesejahteraan($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = KesejahteraanQuery::create(null, $criteria);
        $query->joinWith('JenisKesejahteraan', $join_behavior);

        return $this->getKesejahteraans($query, $con);
    }

    /**
     * Clears out the collKitasPtks collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Ptk The current object (for fluent API support)
     * @see        addKitasPtks()
     */
    public function clearKitasPtks()
    {
        $this->collKitasPtks = null; // important to set this to null since that means it is uninitialized
        $this->collKitasPtksPartial = null;

        return $this;
    }

    /**
     * reset is the collKitasPtks collection loaded partially
     *
     * @return void
     */
    public function resetPartialKitasPtks($v = true)
    {
        $this->collKitasPtksPartial = $v;
    }

    /**
     * Initializes the collKitasPtks collection.
     *
     * By default this just sets the collKitasPtks collection to an empty array (like clearcollKitasPtks());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initKitasPtks($overrideExisting = true)
    {
        if (null !== $this->collKitasPtks && !$overrideExisting) {
            return;
        }
        $this->collKitasPtks = new PropelObjectCollection();
        $this->collKitasPtks->setModel('KitasPtk');
    }

    /**
     * Gets an array of KitasPtk objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Ptk is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|KitasPtk[] List of KitasPtk objects
     * @throws PropelException
     */
    public function getKitasPtks($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collKitasPtksPartial && !$this->isNew();
        if (null === $this->collKitasPtks || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collKitasPtks) {
                // return empty collection
                $this->initKitasPtks();
            } else {
                $collKitasPtks = KitasPtkQuery::create(null, $criteria)
                    ->filterByPtk($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collKitasPtksPartial && count($collKitasPtks)) {
                      $this->initKitasPtks(false);

                      foreach($collKitasPtks as $obj) {
                        if (false == $this->collKitasPtks->contains($obj)) {
                          $this->collKitasPtks->append($obj);
                        }
                      }

                      $this->collKitasPtksPartial = true;
                    }

                    $collKitasPtks->getInternalIterator()->rewind();
                    return $collKitasPtks;
                }

                if($partial && $this->collKitasPtks) {
                    foreach($this->collKitasPtks as $obj) {
                        if($obj->isNew()) {
                            $collKitasPtks[] = $obj;
                        }
                    }
                }

                $this->collKitasPtks = $collKitasPtks;
                $this->collKitasPtksPartial = false;
            }
        }

        return $this->collKitasPtks;
    }

    /**
     * Sets a collection of KitasPtk objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $kitasPtks A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Ptk The current object (for fluent API support)
     */
    public function setKitasPtks(PropelCollection $kitasPtks, PropelPDO $con = null)
    {
        $kitasPtksToDelete = $this->getKitasPtks(new Criteria(), $con)->diff($kitasPtks);

        $this->kitasPtksScheduledForDeletion = unserialize(serialize($kitasPtksToDelete));

        foreach ($kitasPtksToDelete as $kitasPtkRemoved) {
            $kitasPtkRemoved->setPtk(null);
        }

        $this->collKitasPtks = null;
        foreach ($kitasPtks as $kitasPtk) {
            $this->addKitasPtk($kitasPtk);
        }

        $this->collKitasPtks = $kitasPtks;
        $this->collKitasPtksPartial = false;

        return $this;
    }

    /**
     * Returns the number of related KitasPtk objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related KitasPtk objects.
     * @throws PropelException
     */
    public function countKitasPtks(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collKitasPtksPartial && !$this->isNew();
        if (null === $this->collKitasPtks || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collKitasPtks) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getKitasPtks());
            }
            $query = KitasPtkQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPtk($this)
                ->count($con);
        }

        return count($this->collKitasPtks);
    }

    /**
     * Method called to associate a KitasPtk object to this object
     * through the KitasPtk foreign key attribute.
     *
     * @param    KitasPtk $l KitasPtk
     * @return Ptk The current object (for fluent API support)
     */
    public function addKitasPtk(KitasPtk $l)
    {
        if ($this->collKitasPtks === null) {
            $this->initKitasPtks();
            $this->collKitasPtksPartial = true;
        }
        if (!in_array($l, $this->collKitasPtks->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddKitasPtk($l);
        }

        return $this;
    }

    /**
     * @param	KitasPtk $kitasPtk The kitasPtk object to add.
     */
    protected function doAddKitasPtk($kitasPtk)
    {
        $this->collKitasPtks[]= $kitasPtk;
        $kitasPtk->setPtk($this);
    }

    /**
     * @param	KitasPtk $kitasPtk The kitasPtk object to remove.
     * @return Ptk The current object (for fluent API support)
     */
    public function removeKitasPtk($kitasPtk)
    {
        if ($this->getKitasPtks()->contains($kitasPtk)) {
            $this->collKitasPtks->remove($this->collKitasPtks->search($kitasPtk));
            if (null === $this->kitasPtksScheduledForDeletion) {
                $this->kitasPtksScheduledForDeletion = clone $this->collKitasPtks;
                $this->kitasPtksScheduledForDeletion->clear();
            }
            $this->kitasPtksScheduledForDeletion[]= clone $kitasPtk;
            $kitasPtk->setPtk(null);
        }

        return $this;
    }

    /**
     * Clears out the collNilaiTests collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Ptk The current object (for fluent API support)
     * @see        addNilaiTests()
     */
    public function clearNilaiTests()
    {
        $this->collNilaiTests = null; // important to set this to null since that means it is uninitialized
        $this->collNilaiTestsPartial = null;

        return $this;
    }

    /**
     * reset is the collNilaiTests collection loaded partially
     *
     * @return void
     */
    public function resetPartialNilaiTests($v = true)
    {
        $this->collNilaiTestsPartial = $v;
    }

    /**
     * Initializes the collNilaiTests collection.
     *
     * By default this just sets the collNilaiTests collection to an empty array (like clearcollNilaiTests());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initNilaiTests($overrideExisting = true)
    {
        if (null !== $this->collNilaiTests && !$overrideExisting) {
            return;
        }
        $this->collNilaiTests = new PropelObjectCollection();
        $this->collNilaiTests->setModel('NilaiTest');
    }

    /**
     * Gets an array of NilaiTest objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Ptk is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|NilaiTest[] List of NilaiTest objects
     * @throws PropelException
     */
    public function getNilaiTests($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collNilaiTestsPartial && !$this->isNew();
        if (null === $this->collNilaiTests || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collNilaiTests) {
                // return empty collection
                $this->initNilaiTests();
            } else {
                $collNilaiTests = NilaiTestQuery::create(null, $criteria)
                    ->filterByPtk($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collNilaiTestsPartial && count($collNilaiTests)) {
                      $this->initNilaiTests(false);

                      foreach($collNilaiTests as $obj) {
                        if (false == $this->collNilaiTests->contains($obj)) {
                          $this->collNilaiTests->append($obj);
                        }
                      }

                      $this->collNilaiTestsPartial = true;
                    }

                    $collNilaiTests->getInternalIterator()->rewind();
                    return $collNilaiTests;
                }

                if($partial && $this->collNilaiTests) {
                    foreach($this->collNilaiTests as $obj) {
                        if($obj->isNew()) {
                            $collNilaiTests[] = $obj;
                        }
                    }
                }

                $this->collNilaiTests = $collNilaiTests;
                $this->collNilaiTestsPartial = false;
            }
        }

        return $this->collNilaiTests;
    }

    /**
     * Sets a collection of NilaiTest objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $nilaiTests A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Ptk The current object (for fluent API support)
     */
    public function setNilaiTests(PropelCollection $nilaiTests, PropelPDO $con = null)
    {
        $nilaiTestsToDelete = $this->getNilaiTests(new Criteria(), $con)->diff($nilaiTests);

        $this->nilaiTestsScheduledForDeletion = unserialize(serialize($nilaiTestsToDelete));

        foreach ($nilaiTestsToDelete as $nilaiTestRemoved) {
            $nilaiTestRemoved->setPtk(null);
        }

        $this->collNilaiTests = null;
        foreach ($nilaiTests as $nilaiTest) {
            $this->addNilaiTest($nilaiTest);
        }

        $this->collNilaiTests = $nilaiTests;
        $this->collNilaiTestsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related NilaiTest objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related NilaiTest objects.
     * @throws PropelException
     */
    public function countNilaiTests(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collNilaiTestsPartial && !$this->isNew();
        if (null === $this->collNilaiTests || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collNilaiTests) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getNilaiTests());
            }
            $query = NilaiTestQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPtk($this)
                ->count($con);
        }

        return count($this->collNilaiTests);
    }

    /**
     * Method called to associate a NilaiTest object to this object
     * through the NilaiTest foreign key attribute.
     *
     * @param    NilaiTest $l NilaiTest
     * @return Ptk The current object (for fluent API support)
     */
    public function addNilaiTest(NilaiTest $l)
    {
        if ($this->collNilaiTests === null) {
            $this->initNilaiTests();
            $this->collNilaiTestsPartial = true;
        }
        if (!in_array($l, $this->collNilaiTests->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddNilaiTest($l);
        }

        return $this;
    }

    /**
     * @param	NilaiTest $nilaiTest The nilaiTest object to add.
     */
    protected function doAddNilaiTest($nilaiTest)
    {
        $this->collNilaiTests[]= $nilaiTest;
        $nilaiTest->setPtk($this);
    }

    /**
     * @param	NilaiTest $nilaiTest The nilaiTest object to remove.
     * @return Ptk The current object (for fluent API support)
     */
    public function removeNilaiTest($nilaiTest)
    {
        if ($this->getNilaiTests()->contains($nilaiTest)) {
            $this->collNilaiTests->remove($this->collNilaiTests->search($nilaiTest));
            if (null === $this->nilaiTestsScheduledForDeletion) {
                $this->nilaiTestsScheduledForDeletion = clone $this->collNilaiTests;
                $this->nilaiTestsScheduledForDeletion->clear();
            }
            $this->nilaiTestsScheduledForDeletion[]= clone $nilaiTest;
            $nilaiTest->setPtk(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Ptk is new, it will return
     * an empty collection; or if this Ptk has previously
     * been saved, it will retrieve related NilaiTests from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Ptk.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|NilaiTest[] List of NilaiTest objects
     */
    public function getNilaiTestsJoinJenisTest($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = NilaiTestQuery::create(null, $criteria);
        $query->joinWith('JenisTest', $join_behavior);

        return $this->getNilaiTests($query, $con);
    }

    /**
     * Clears out the collPasporPtks collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Ptk The current object (for fluent API support)
     * @see        addPasporPtks()
     */
    public function clearPasporPtks()
    {
        $this->collPasporPtks = null; // important to set this to null since that means it is uninitialized
        $this->collPasporPtksPartial = null;

        return $this;
    }

    /**
     * reset is the collPasporPtks collection loaded partially
     *
     * @return void
     */
    public function resetPartialPasporPtks($v = true)
    {
        $this->collPasporPtksPartial = $v;
    }

    /**
     * Initializes the collPasporPtks collection.
     *
     * By default this just sets the collPasporPtks collection to an empty array (like clearcollPasporPtks());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPasporPtks($overrideExisting = true)
    {
        if (null !== $this->collPasporPtks && !$overrideExisting) {
            return;
        }
        $this->collPasporPtks = new PropelObjectCollection();
        $this->collPasporPtks->setModel('PasporPtk');
    }

    /**
     * Gets an array of PasporPtk objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Ptk is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|PasporPtk[] List of PasporPtk objects
     * @throws PropelException
     */
    public function getPasporPtks($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collPasporPtksPartial && !$this->isNew();
        if (null === $this->collPasporPtks || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collPasporPtks) {
                // return empty collection
                $this->initPasporPtks();
            } else {
                $collPasporPtks = PasporPtkQuery::create(null, $criteria)
                    ->filterByPtk($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collPasporPtksPartial && count($collPasporPtks)) {
                      $this->initPasporPtks(false);

                      foreach($collPasporPtks as $obj) {
                        if (false == $this->collPasporPtks->contains($obj)) {
                          $this->collPasporPtks->append($obj);
                        }
                      }

                      $this->collPasporPtksPartial = true;
                    }

                    $collPasporPtks->getInternalIterator()->rewind();
                    return $collPasporPtks;
                }

                if($partial && $this->collPasporPtks) {
                    foreach($this->collPasporPtks as $obj) {
                        if($obj->isNew()) {
                            $collPasporPtks[] = $obj;
                        }
                    }
                }

                $this->collPasporPtks = $collPasporPtks;
                $this->collPasporPtksPartial = false;
            }
        }

        return $this->collPasporPtks;
    }

    /**
     * Sets a collection of PasporPtk objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $pasporPtks A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Ptk The current object (for fluent API support)
     */
    public function setPasporPtks(PropelCollection $pasporPtks, PropelPDO $con = null)
    {
        $pasporPtksToDelete = $this->getPasporPtks(new Criteria(), $con)->diff($pasporPtks);

        $this->pasporPtksScheduledForDeletion = unserialize(serialize($pasporPtksToDelete));

        foreach ($pasporPtksToDelete as $pasporPtkRemoved) {
            $pasporPtkRemoved->setPtk(null);
        }

        $this->collPasporPtks = null;
        foreach ($pasporPtks as $pasporPtk) {
            $this->addPasporPtk($pasporPtk);
        }

        $this->collPasporPtks = $pasporPtks;
        $this->collPasporPtksPartial = false;

        return $this;
    }

    /**
     * Returns the number of related PasporPtk objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related PasporPtk objects.
     * @throws PropelException
     */
    public function countPasporPtks(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collPasporPtksPartial && !$this->isNew();
        if (null === $this->collPasporPtks || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPasporPtks) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getPasporPtks());
            }
            $query = PasporPtkQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPtk($this)
                ->count($con);
        }

        return count($this->collPasporPtks);
    }

    /**
     * Method called to associate a PasporPtk object to this object
     * through the PasporPtk foreign key attribute.
     *
     * @param    PasporPtk $l PasporPtk
     * @return Ptk The current object (for fluent API support)
     */
    public function addPasporPtk(PasporPtk $l)
    {
        if ($this->collPasporPtks === null) {
            $this->initPasporPtks();
            $this->collPasporPtksPartial = true;
        }
        if (!in_array($l, $this->collPasporPtks->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddPasporPtk($l);
        }

        return $this;
    }

    /**
     * @param	PasporPtk $pasporPtk The pasporPtk object to add.
     */
    protected function doAddPasporPtk($pasporPtk)
    {
        $this->collPasporPtks[]= $pasporPtk;
        $pasporPtk->setPtk($this);
    }

    /**
     * @param	PasporPtk $pasporPtk The pasporPtk object to remove.
     * @return Ptk The current object (for fluent API support)
     */
    public function removePasporPtk($pasporPtk)
    {
        if ($this->getPasporPtks()->contains($pasporPtk)) {
            $this->collPasporPtks->remove($this->collPasporPtks->search($pasporPtk));
            if (null === $this->pasporPtksScheduledForDeletion) {
                $this->pasporPtksScheduledForDeletion = clone $this->collPasporPtks;
                $this->pasporPtksScheduledForDeletion->clear();
            }
            $this->pasporPtksScheduledForDeletion[]= clone $pasporPtk;
            $pasporPtk->setPtk(null);
        }

        return $this;
    }

    /**
     * Clears out the collPengawasTerdaftars collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Ptk The current object (for fluent API support)
     * @see        addPengawasTerdaftars()
     */
    public function clearPengawasTerdaftars()
    {
        $this->collPengawasTerdaftars = null; // important to set this to null since that means it is uninitialized
        $this->collPengawasTerdaftarsPartial = null;

        return $this;
    }

    /**
     * reset is the collPengawasTerdaftars collection loaded partially
     *
     * @return void
     */
    public function resetPartialPengawasTerdaftars($v = true)
    {
        $this->collPengawasTerdaftarsPartial = $v;
    }

    /**
     * Initializes the collPengawasTerdaftars collection.
     *
     * By default this just sets the collPengawasTerdaftars collection to an empty array (like clearcollPengawasTerdaftars());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPengawasTerdaftars($overrideExisting = true)
    {
        if (null !== $this->collPengawasTerdaftars && !$overrideExisting) {
            return;
        }
        $this->collPengawasTerdaftars = new PropelObjectCollection();
        $this->collPengawasTerdaftars->setModel('PengawasTerdaftar');
    }

    /**
     * Gets an array of PengawasTerdaftar objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Ptk is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|PengawasTerdaftar[] List of PengawasTerdaftar objects
     * @throws PropelException
     */
    public function getPengawasTerdaftars($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collPengawasTerdaftarsPartial && !$this->isNew();
        if (null === $this->collPengawasTerdaftars || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collPengawasTerdaftars) {
                // return empty collection
                $this->initPengawasTerdaftars();
            } else {
                $collPengawasTerdaftars = PengawasTerdaftarQuery::create(null, $criteria)
                    ->filterByPtk($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collPengawasTerdaftarsPartial && count($collPengawasTerdaftars)) {
                      $this->initPengawasTerdaftars(false);

                      foreach($collPengawasTerdaftars as $obj) {
                        if (false == $this->collPengawasTerdaftars->contains($obj)) {
                          $this->collPengawasTerdaftars->append($obj);
                        }
                      }

                      $this->collPengawasTerdaftarsPartial = true;
                    }

                    $collPengawasTerdaftars->getInternalIterator()->rewind();
                    return $collPengawasTerdaftars;
                }

                if($partial && $this->collPengawasTerdaftars) {
                    foreach($this->collPengawasTerdaftars as $obj) {
                        if($obj->isNew()) {
                            $collPengawasTerdaftars[] = $obj;
                        }
                    }
                }

                $this->collPengawasTerdaftars = $collPengawasTerdaftars;
                $this->collPengawasTerdaftarsPartial = false;
            }
        }

        return $this->collPengawasTerdaftars;
    }

    /**
     * Sets a collection of PengawasTerdaftar objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $pengawasTerdaftars A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Ptk The current object (for fluent API support)
     */
    public function setPengawasTerdaftars(PropelCollection $pengawasTerdaftars, PropelPDO $con = null)
    {
        $pengawasTerdaftarsToDelete = $this->getPengawasTerdaftars(new Criteria(), $con)->diff($pengawasTerdaftars);

        $this->pengawasTerdaftarsScheduledForDeletion = unserialize(serialize($pengawasTerdaftarsToDelete));

        foreach ($pengawasTerdaftarsToDelete as $pengawasTerdaftarRemoved) {
            $pengawasTerdaftarRemoved->setPtk(null);
        }

        $this->collPengawasTerdaftars = null;
        foreach ($pengawasTerdaftars as $pengawasTerdaftar) {
            $this->addPengawasTerdaftar($pengawasTerdaftar);
        }

        $this->collPengawasTerdaftars = $pengawasTerdaftars;
        $this->collPengawasTerdaftarsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related PengawasTerdaftar objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related PengawasTerdaftar objects.
     * @throws PropelException
     */
    public function countPengawasTerdaftars(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collPengawasTerdaftarsPartial && !$this->isNew();
        if (null === $this->collPengawasTerdaftars || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPengawasTerdaftars) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getPengawasTerdaftars());
            }
            $query = PengawasTerdaftarQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPtk($this)
                ->count($con);
        }

        return count($this->collPengawasTerdaftars);
    }

    /**
     * Method called to associate a PengawasTerdaftar object to this object
     * through the PengawasTerdaftar foreign key attribute.
     *
     * @param    PengawasTerdaftar $l PengawasTerdaftar
     * @return Ptk The current object (for fluent API support)
     */
    public function addPengawasTerdaftar(PengawasTerdaftar $l)
    {
        if ($this->collPengawasTerdaftars === null) {
            $this->initPengawasTerdaftars();
            $this->collPengawasTerdaftarsPartial = true;
        }
        if (!in_array($l, $this->collPengawasTerdaftars->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddPengawasTerdaftar($l);
        }

        return $this;
    }

    /**
     * @param	PengawasTerdaftar $pengawasTerdaftar The pengawasTerdaftar object to add.
     */
    protected function doAddPengawasTerdaftar($pengawasTerdaftar)
    {
        $this->collPengawasTerdaftars[]= $pengawasTerdaftar;
        $pengawasTerdaftar->setPtk($this);
    }

    /**
     * @param	PengawasTerdaftar $pengawasTerdaftar The pengawasTerdaftar object to remove.
     * @return Ptk The current object (for fluent API support)
     */
    public function removePengawasTerdaftar($pengawasTerdaftar)
    {
        if ($this->getPengawasTerdaftars()->contains($pengawasTerdaftar)) {
            $this->collPengawasTerdaftars->remove($this->collPengawasTerdaftars->search($pengawasTerdaftar));
            if (null === $this->pengawasTerdaftarsScheduledForDeletion) {
                $this->pengawasTerdaftarsScheduledForDeletion = clone $this->collPengawasTerdaftars;
                $this->pengawasTerdaftarsScheduledForDeletion->clear();
            }
            $this->pengawasTerdaftarsScheduledForDeletion[]= clone $pengawasTerdaftar;
            $pengawasTerdaftar->setPtk(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Ptk is new, it will return
     * an empty collection; or if this Ptk has previously
     * been saved, it will retrieve related PengawasTerdaftars from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Ptk.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PengawasTerdaftar[] List of PengawasTerdaftar objects
     */
    public function getPengawasTerdaftarsJoinBidangStudi($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PengawasTerdaftarQuery::create(null, $criteria);
        $query->joinWith('BidangStudi', $join_behavior);

        return $this->getPengawasTerdaftars($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Ptk is new, it will return
     * an empty collection; or if this Ptk has previously
     * been saved, it will retrieve related PengawasTerdaftars from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Ptk.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PengawasTerdaftar[] List of PengawasTerdaftar objects
     */
    public function getPengawasTerdaftarsJoinJenisKeluar($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PengawasTerdaftarQuery::create(null, $criteria);
        $query->joinWith('JenisKeluar', $join_behavior);

        return $this->getPengawasTerdaftars($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Ptk is new, it will return
     * an empty collection; or if this Ptk has previously
     * been saved, it will retrieve related PengawasTerdaftars from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Ptk.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PengawasTerdaftar[] List of PengawasTerdaftar objects
     */
    public function getPengawasTerdaftarsJoinLembagaNonSekolah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PengawasTerdaftarQuery::create(null, $criteria);
        $query->joinWith('LembagaNonSekolah', $join_behavior);

        return $this->getPengawasTerdaftars($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Ptk is new, it will return
     * an empty collection; or if this Ptk has previously
     * been saved, it will retrieve related PengawasTerdaftars from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Ptk.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PengawasTerdaftar[] List of PengawasTerdaftar objects
     */
    public function getPengawasTerdaftarsJoinMataPelajaran($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PengawasTerdaftarQuery::create(null, $criteria);
        $query->joinWith('MataPelajaran', $join_behavior);

        return $this->getPengawasTerdaftars($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Ptk is new, it will return
     * an empty collection; or if this Ptk has previously
     * been saved, it will retrieve related PengawasTerdaftars from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Ptk.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PengawasTerdaftar[] List of PengawasTerdaftar objects
     */
    public function getPengawasTerdaftarsJoinTahunAjaran($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PengawasTerdaftarQuery::create(null, $criteria);
        $query->joinWith('TahunAjaran', $join_behavior);

        return $this->getPengawasTerdaftars($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Ptk is new, it will return
     * an empty collection; or if this Ptk has previously
     * been saved, it will retrieve related PengawasTerdaftars from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Ptk.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PengawasTerdaftar[] List of PengawasTerdaftar objects
     */
    public function getPengawasTerdaftarsJoinJenjangKepengawasan($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PengawasTerdaftarQuery::create(null, $criteria);
        $query->joinWith('JenjangKepengawasan', $join_behavior);

        return $this->getPengawasTerdaftars($query, $con);
    }

    /**
     * Clears out the collPenghargaans collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Ptk The current object (for fluent API support)
     * @see        addPenghargaans()
     */
    public function clearPenghargaans()
    {
        $this->collPenghargaans = null; // important to set this to null since that means it is uninitialized
        $this->collPenghargaansPartial = null;

        return $this;
    }

    /**
     * reset is the collPenghargaans collection loaded partially
     *
     * @return void
     */
    public function resetPartialPenghargaans($v = true)
    {
        $this->collPenghargaansPartial = $v;
    }

    /**
     * Initializes the collPenghargaans collection.
     *
     * By default this just sets the collPenghargaans collection to an empty array (like clearcollPenghargaans());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPenghargaans($overrideExisting = true)
    {
        if (null !== $this->collPenghargaans && !$overrideExisting) {
            return;
        }
        $this->collPenghargaans = new PropelObjectCollection();
        $this->collPenghargaans->setModel('Penghargaan');
    }

    /**
     * Gets an array of Penghargaan objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Ptk is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Penghargaan[] List of Penghargaan objects
     * @throws PropelException
     */
    public function getPenghargaans($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collPenghargaansPartial && !$this->isNew();
        if (null === $this->collPenghargaans || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collPenghargaans) {
                // return empty collection
                $this->initPenghargaans();
            } else {
                $collPenghargaans = PenghargaanQuery::create(null, $criteria)
                    ->filterByPtk($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collPenghargaansPartial && count($collPenghargaans)) {
                      $this->initPenghargaans(false);

                      foreach($collPenghargaans as $obj) {
                        if (false == $this->collPenghargaans->contains($obj)) {
                          $this->collPenghargaans->append($obj);
                        }
                      }

                      $this->collPenghargaansPartial = true;
                    }

                    $collPenghargaans->getInternalIterator()->rewind();
                    return $collPenghargaans;
                }

                if($partial && $this->collPenghargaans) {
                    foreach($this->collPenghargaans as $obj) {
                        if($obj->isNew()) {
                            $collPenghargaans[] = $obj;
                        }
                    }
                }

                $this->collPenghargaans = $collPenghargaans;
                $this->collPenghargaansPartial = false;
            }
        }

        return $this->collPenghargaans;
    }

    /**
     * Sets a collection of Penghargaan objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $penghargaans A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Ptk The current object (for fluent API support)
     */
    public function setPenghargaans(PropelCollection $penghargaans, PropelPDO $con = null)
    {
        $penghargaansToDelete = $this->getPenghargaans(new Criteria(), $con)->diff($penghargaans);

        $this->penghargaansScheduledForDeletion = unserialize(serialize($penghargaansToDelete));

        foreach ($penghargaansToDelete as $penghargaanRemoved) {
            $penghargaanRemoved->setPtk(null);
        }

        $this->collPenghargaans = null;
        foreach ($penghargaans as $penghargaan) {
            $this->addPenghargaan($penghargaan);
        }

        $this->collPenghargaans = $penghargaans;
        $this->collPenghargaansPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Penghargaan objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Penghargaan objects.
     * @throws PropelException
     */
    public function countPenghargaans(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collPenghargaansPartial && !$this->isNew();
        if (null === $this->collPenghargaans || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPenghargaans) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getPenghargaans());
            }
            $query = PenghargaanQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPtk($this)
                ->count($con);
        }

        return count($this->collPenghargaans);
    }

    /**
     * Method called to associate a Penghargaan object to this object
     * through the Penghargaan foreign key attribute.
     *
     * @param    Penghargaan $l Penghargaan
     * @return Ptk The current object (for fluent API support)
     */
    public function addPenghargaan(Penghargaan $l)
    {
        if ($this->collPenghargaans === null) {
            $this->initPenghargaans();
            $this->collPenghargaansPartial = true;
        }
        if (!in_array($l, $this->collPenghargaans->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddPenghargaan($l);
        }

        return $this;
    }

    /**
     * @param	Penghargaan $penghargaan The penghargaan object to add.
     */
    protected function doAddPenghargaan($penghargaan)
    {
        $this->collPenghargaans[]= $penghargaan;
        $penghargaan->setPtk($this);
    }

    /**
     * @param	Penghargaan $penghargaan The penghargaan object to remove.
     * @return Ptk The current object (for fluent API support)
     */
    public function removePenghargaan($penghargaan)
    {
        if ($this->getPenghargaans()->contains($penghargaan)) {
            $this->collPenghargaans->remove($this->collPenghargaans->search($penghargaan));
            if (null === $this->penghargaansScheduledForDeletion) {
                $this->penghargaansScheduledForDeletion = clone $this->collPenghargaans;
                $this->penghargaansScheduledForDeletion->clear();
            }
            $this->penghargaansScheduledForDeletion[]= clone $penghargaan;
            $penghargaan->setPtk(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Ptk is new, it will return
     * an empty collection; or if this Ptk has previously
     * been saved, it will retrieve related Penghargaans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Ptk.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Penghargaan[] List of Penghargaan objects
     */
    public function getPenghargaansJoinJenisPenghargaan($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PenghargaanQuery::create(null, $criteria);
        $query->joinWith('JenisPenghargaan', $join_behavior);

        return $this->getPenghargaans($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Ptk is new, it will return
     * an empty collection; or if this Ptk has previously
     * been saved, it will retrieve related Penghargaans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Ptk.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Penghargaan[] List of Penghargaan objects
     */
    public function getPenghargaansJoinTingkatPenghargaan($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PenghargaanQuery::create(null, $criteria);
        $query->joinWith('TingkatPenghargaan', $join_behavior);

        return $this->getPenghargaans($query, $con);
    }

    /**
     * Clears out the collPtkBarus collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Ptk The current object (for fluent API support)
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
     * If this Ptk is new, it will return
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
                    ->filterByPtk($this)
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
     * @return Ptk The current object (for fluent API support)
     */
    public function setPtkBarus(PropelCollection $ptkBarus, PropelPDO $con = null)
    {
        $ptkBarusToDelete = $this->getPtkBarus(new Criteria(), $con)->diff($ptkBarus);

        $this->ptkBarusScheduledForDeletion = unserialize(serialize($ptkBarusToDelete));

        foreach ($ptkBarusToDelete as $ptkBaruRemoved) {
            $ptkBaruRemoved->setPtk(null);
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
                ->filterByPtk($this)
                ->count($con);
        }

        return count($this->collPtkBarus);
    }

    /**
     * Method called to associate a PtkBaru object to this object
     * through the PtkBaru foreign key attribute.
     *
     * @param    PtkBaru $l PtkBaru
     * @return Ptk The current object (for fluent API support)
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
        $ptkBaru->setPtk($this);
    }

    /**
     * @param	PtkBaru $ptkBaru The ptkBaru object to remove.
     * @return Ptk The current object (for fluent API support)
     */
    public function removePtkBaru($ptkBaru)
    {
        if ($this->getPtkBarus()->contains($ptkBaru)) {
            $this->collPtkBarus->remove($this->collPtkBarus->search($ptkBaru));
            if (null === $this->ptkBarusScheduledForDeletion) {
                $this->ptkBarusScheduledForDeletion = clone $this->collPtkBarus;
                $this->ptkBarusScheduledForDeletion->clear();
            }
            $this->ptkBarusScheduledForDeletion[]= $ptkBaru;
            $ptkBaru->setPtk(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Ptk is new, it will return
     * an empty collection; or if this Ptk has previously
     * been saved, it will retrieve related PtkBarus from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Ptk.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PtkBaru[] List of PtkBaru objects
     */
    public function getPtkBarusJoinSekolah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PtkBaruQuery::create(null, $criteria);
        $query->joinWith('Sekolah', $join_behavior);

        return $this->getPtkBarus($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Ptk is new, it will return
     * an empty collection; or if this Ptk has previously
     * been saved, it will retrieve related PtkBarus from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Ptk.
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
     * @return Ptk The current object (for fluent API support)
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
     * If this Ptk is new, it will return
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
                    ->filterByPtk($this)
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
     * @return Ptk The current object (for fluent API support)
     */
    public function setPtkTerdaftars(PropelCollection $ptkTerdaftars, PropelPDO $con = null)
    {
        $ptkTerdaftarsToDelete = $this->getPtkTerdaftars(new Criteria(), $con)->diff($ptkTerdaftars);

        $this->ptkTerdaftarsScheduledForDeletion = unserialize(serialize($ptkTerdaftarsToDelete));

        foreach ($ptkTerdaftarsToDelete as $ptkTerdaftarRemoved) {
            $ptkTerdaftarRemoved->setPtk(null);
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
                ->filterByPtk($this)
                ->count($con);
        }

        return count($this->collPtkTerdaftars);
    }

    /**
     * Method called to associate a PtkTerdaftar object to this object
     * through the PtkTerdaftar foreign key attribute.
     *
     * @param    PtkTerdaftar $l PtkTerdaftar
     * @return Ptk The current object (for fluent API support)
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
        $ptkTerdaftar->setPtk($this);
    }

    /**
     * @param	PtkTerdaftar $ptkTerdaftar The ptkTerdaftar object to remove.
     * @return Ptk The current object (for fluent API support)
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
            $ptkTerdaftar->setPtk(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Ptk is new, it will return
     * an empty collection; or if this Ptk has previously
     * been saved, it will retrieve related PtkTerdaftars from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Ptk.
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
     * Otherwise if this Ptk is new, it will return
     * an empty collection; or if this Ptk has previously
     * been saved, it will retrieve related PtkTerdaftars from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Ptk.
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
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Ptk is new, it will return
     * an empty collection; or if this Ptk has previously
     * been saved, it will retrieve related PtkTerdaftars from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Ptk.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PtkTerdaftar[] List of PtkTerdaftar objects
     */
    public function getPtkTerdaftarsJoinSekolah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PtkTerdaftarQuery::create(null, $criteria);
        $query->joinWith('Sekolah', $join_behavior);

        return $this->getPtkTerdaftars($query, $con);
    }

    /**
     * Clears out the collRiwayatGajiBerkalas collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Ptk The current object (for fluent API support)
     * @see        addRiwayatGajiBerkalas()
     */
    public function clearRiwayatGajiBerkalas()
    {
        $this->collRiwayatGajiBerkalas = null; // important to set this to null since that means it is uninitialized
        $this->collRiwayatGajiBerkalasPartial = null;

        return $this;
    }

    /**
     * reset is the collRiwayatGajiBerkalas collection loaded partially
     *
     * @return void
     */
    public function resetPartialRiwayatGajiBerkalas($v = true)
    {
        $this->collRiwayatGajiBerkalasPartial = $v;
    }

    /**
     * Initializes the collRiwayatGajiBerkalas collection.
     *
     * By default this just sets the collRiwayatGajiBerkalas collection to an empty array (like clearcollRiwayatGajiBerkalas());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initRiwayatGajiBerkalas($overrideExisting = true)
    {
        if (null !== $this->collRiwayatGajiBerkalas && !$overrideExisting) {
            return;
        }
        $this->collRiwayatGajiBerkalas = new PropelObjectCollection();
        $this->collRiwayatGajiBerkalas->setModel('RiwayatGajiBerkala');
    }

    /**
     * Gets an array of RiwayatGajiBerkala objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Ptk is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|RiwayatGajiBerkala[] List of RiwayatGajiBerkala objects
     * @throws PropelException
     */
    public function getRiwayatGajiBerkalas($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collRiwayatGajiBerkalasPartial && !$this->isNew();
        if (null === $this->collRiwayatGajiBerkalas || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collRiwayatGajiBerkalas) {
                // return empty collection
                $this->initRiwayatGajiBerkalas();
            } else {
                $collRiwayatGajiBerkalas = RiwayatGajiBerkalaQuery::create(null, $criteria)
                    ->filterByPtk($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collRiwayatGajiBerkalasPartial && count($collRiwayatGajiBerkalas)) {
                      $this->initRiwayatGajiBerkalas(false);

                      foreach($collRiwayatGajiBerkalas as $obj) {
                        if (false == $this->collRiwayatGajiBerkalas->contains($obj)) {
                          $this->collRiwayatGajiBerkalas->append($obj);
                        }
                      }

                      $this->collRiwayatGajiBerkalasPartial = true;
                    }

                    $collRiwayatGajiBerkalas->getInternalIterator()->rewind();
                    return $collRiwayatGajiBerkalas;
                }

                if($partial && $this->collRiwayatGajiBerkalas) {
                    foreach($this->collRiwayatGajiBerkalas as $obj) {
                        if($obj->isNew()) {
                            $collRiwayatGajiBerkalas[] = $obj;
                        }
                    }
                }

                $this->collRiwayatGajiBerkalas = $collRiwayatGajiBerkalas;
                $this->collRiwayatGajiBerkalasPartial = false;
            }
        }

        return $this->collRiwayatGajiBerkalas;
    }

    /**
     * Sets a collection of RiwayatGajiBerkala objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $riwayatGajiBerkalas A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Ptk The current object (for fluent API support)
     */
    public function setRiwayatGajiBerkalas(PropelCollection $riwayatGajiBerkalas, PropelPDO $con = null)
    {
        $riwayatGajiBerkalasToDelete = $this->getRiwayatGajiBerkalas(new Criteria(), $con)->diff($riwayatGajiBerkalas);

        $this->riwayatGajiBerkalasScheduledForDeletion = unserialize(serialize($riwayatGajiBerkalasToDelete));

        foreach ($riwayatGajiBerkalasToDelete as $riwayatGajiBerkalaRemoved) {
            $riwayatGajiBerkalaRemoved->setPtk(null);
        }

        $this->collRiwayatGajiBerkalas = null;
        foreach ($riwayatGajiBerkalas as $riwayatGajiBerkala) {
            $this->addRiwayatGajiBerkala($riwayatGajiBerkala);
        }

        $this->collRiwayatGajiBerkalas = $riwayatGajiBerkalas;
        $this->collRiwayatGajiBerkalasPartial = false;

        return $this;
    }

    /**
     * Returns the number of related RiwayatGajiBerkala objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related RiwayatGajiBerkala objects.
     * @throws PropelException
     */
    public function countRiwayatGajiBerkalas(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collRiwayatGajiBerkalasPartial && !$this->isNew();
        if (null === $this->collRiwayatGajiBerkalas || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collRiwayatGajiBerkalas) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getRiwayatGajiBerkalas());
            }
            $query = RiwayatGajiBerkalaQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPtk($this)
                ->count($con);
        }

        return count($this->collRiwayatGajiBerkalas);
    }

    /**
     * Method called to associate a RiwayatGajiBerkala object to this object
     * through the RiwayatGajiBerkala foreign key attribute.
     *
     * @param    RiwayatGajiBerkala $l RiwayatGajiBerkala
     * @return Ptk The current object (for fluent API support)
     */
    public function addRiwayatGajiBerkala(RiwayatGajiBerkala $l)
    {
        if ($this->collRiwayatGajiBerkalas === null) {
            $this->initRiwayatGajiBerkalas();
            $this->collRiwayatGajiBerkalasPartial = true;
        }
        if (!in_array($l, $this->collRiwayatGajiBerkalas->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddRiwayatGajiBerkala($l);
        }

        return $this;
    }

    /**
     * @param	RiwayatGajiBerkala $riwayatGajiBerkala The riwayatGajiBerkala object to add.
     */
    protected function doAddRiwayatGajiBerkala($riwayatGajiBerkala)
    {
        $this->collRiwayatGajiBerkalas[]= $riwayatGajiBerkala;
        $riwayatGajiBerkala->setPtk($this);
    }

    /**
     * @param	RiwayatGajiBerkala $riwayatGajiBerkala The riwayatGajiBerkala object to remove.
     * @return Ptk The current object (for fluent API support)
     */
    public function removeRiwayatGajiBerkala($riwayatGajiBerkala)
    {
        if ($this->getRiwayatGajiBerkalas()->contains($riwayatGajiBerkala)) {
            $this->collRiwayatGajiBerkalas->remove($this->collRiwayatGajiBerkalas->search($riwayatGajiBerkala));
            if (null === $this->riwayatGajiBerkalasScheduledForDeletion) {
                $this->riwayatGajiBerkalasScheduledForDeletion = clone $this->collRiwayatGajiBerkalas;
                $this->riwayatGajiBerkalasScheduledForDeletion->clear();
            }
            $this->riwayatGajiBerkalasScheduledForDeletion[]= clone $riwayatGajiBerkala;
            $riwayatGajiBerkala->setPtk(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Ptk is new, it will return
     * an empty collection; or if this Ptk has previously
     * been saved, it will retrieve related RiwayatGajiBerkalas from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Ptk.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|RiwayatGajiBerkala[] List of RiwayatGajiBerkala objects
     */
    public function getRiwayatGajiBerkalasJoinPangkatGolongan($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = RiwayatGajiBerkalaQuery::create(null, $criteria);
        $query->joinWith('PangkatGolongan', $join_behavior);

        return $this->getRiwayatGajiBerkalas($query, $con);
    }

    /**
     * Clears out the collRombonganBelajars collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Ptk The current object (for fluent API support)
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
     * If this Ptk is new, it will return
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
                    ->filterByPtk($this)
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
     * @return Ptk The current object (for fluent API support)
     */
    public function setRombonganBelajars(PropelCollection $rombonganBelajars, PropelPDO $con = null)
    {
        $rombonganBelajarsToDelete = $this->getRombonganBelajars(new Criteria(), $con)->diff($rombonganBelajars);

        $this->rombonganBelajarsScheduledForDeletion = unserialize(serialize($rombonganBelajarsToDelete));

        foreach ($rombonganBelajarsToDelete as $rombonganBelajarRemoved) {
            $rombonganBelajarRemoved->setPtk(null);
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
                ->filterByPtk($this)
                ->count($con);
        }

        return count($this->collRombonganBelajars);
    }

    /**
     * Method called to associate a RombonganBelajar object to this object
     * through the RombonganBelajar foreign key attribute.
     *
     * @param    RombonganBelajar $l RombonganBelajar
     * @return Ptk The current object (for fluent API support)
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
        $rombonganBelajar->setPtk($this);
    }

    /**
     * @param	RombonganBelajar $rombonganBelajar The rombonganBelajar object to remove.
     * @return Ptk The current object (for fluent API support)
     */
    public function removeRombonganBelajar($rombonganBelajar)
    {
        if ($this->getRombonganBelajars()->contains($rombonganBelajar)) {
            $this->collRombonganBelajars->remove($this->collRombonganBelajars->search($rombonganBelajar));
            if (null === $this->rombonganBelajarsScheduledForDeletion) {
                $this->rombonganBelajarsScheduledForDeletion = clone $this->collRombonganBelajars;
                $this->rombonganBelajarsScheduledForDeletion->clear();
            }
            $this->rombonganBelajarsScheduledForDeletion[]= $rombonganBelajar;
            $rombonganBelajar->setPtk(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Ptk is new, it will return
     * an empty collection; or if this Ptk has previously
     * been saved, it will retrieve related RombonganBelajars from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Ptk.
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
     * Otherwise if this Ptk is new, it will return
     * an empty collection; or if this Ptk has previously
     * been saved, it will retrieve related RombonganBelajars from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Ptk.
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
     * Otherwise if this Ptk is new, it will return
     * an empty collection; or if this Ptk has previously
     * been saved, it will retrieve related RombonganBelajars from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Ptk.
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
     * Otherwise if this Ptk is new, it will return
     * an empty collection; or if this Ptk has previously
     * been saved, it will retrieve related RombonganBelajars from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Ptk.
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
     * Otherwise if this Ptk is new, it will return
     * an empty collection; or if this Ptk has previously
     * been saved, it will retrieve related RombonganBelajars from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Ptk.
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
     * Otherwise if this Ptk is new, it will return
     * an empty collection; or if this Ptk has previously
     * been saved, it will retrieve related RombonganBelajars from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Ptk.
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
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Ptk is new, it will return
     * an empty collection; or if this Ptk has previously
     * been saved, it will retrieve related RombonganBelajars from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Ptk.
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
     * Clears out the collRwyFungsionals collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Ptk The current object (for fluent API support)
     * @see        addRwyFungsionals()
     */
    public function clearRwyFungsionals()
    {
        $this->collRwyFungsionals = null; // important to set this to null since that means it is uninitialized
        $this->collRwyFungsionalsPartial = null;

        return $this;
    }

    /**
     * reset is the collRwyFungsionals collection loaded partially
     *
     * @return void
     */
    public function resetPartialRwyFungsionals($v = true)
    {
        $this->collRwyFungsionalsPartial = $v;
    }

    /**
     * Initializes the collRwyFungsionals collection.
     *
     * By default this just sets the collRwyFungsionals collection to an empty array (like clearcollRwyFungsionals());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initRwyFungsionals($overrideExisting = true)
    {
        if (null !== $this->collRwyFungsionals && !$overrideExisting) {
            return;
        }
        $this->collRwyFungsionals = new PropelObjectCollection();
        $this->collRwyFungsionals->setModel('RwyFungsional');
    }

    /**
     * Gets an array of RwyFungsional objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Ptk is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|RwyFungsional[] List of RwyFungsional objects
     * @throws PropelException
     */
    public function getRwyFungsionals($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collRwyFungsionalsPartial && !$this->isNew();
        if (null === $this->collRwyFungsionals || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collRwyFungsionals) {
                // return empty collection
                $this->initRwyFungsionals();
            } else {
                $collRwyFungsionals = RwyFungsionalQuery::create(null, $criteria)
                    ->filterByPtk($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collRwyFungsionalsPartial && count($collRwyFungsionals)) {
                      $this->initRwyFungsionals(false);

                      foreach($collRwyFungsionals as $obj) {
                        if (false == $this->collRwyFungsionals->contains($obj)) {
                          $this->collRwyFungsionals->append($obj);
                        }
                      }

                      $this->collRwyFungsionalsPartial = true;
                    }

                    $collRwyFungsionals->getInternalIterator()->rewind();
                    return $collRwyFungsionals;
                }

                if($partial && $this->collRwyFungsionals) {
                    foreach($this->collRwyFungsionals as $obj) {
                        if($obj->isNew()) {
                            $collRwyFungsionals[] = $obj;
                        }
                    }
                }

                $this->collRwyFungsionals = $collRwyFungsionals;
                $this->collRwyFungsionalsPartial = false;
            }
        }

        return $this->collRwyFungsionals;
    }

    /**
     * Sets a collection of RwyFungsional objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $rwyFungsionals A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Ptk The current object (for fluent API support)
     */
    public function setRwyFungsionals(PropelCollection $rwyFungsionals, PropelPDO $con = null)
    {
        $rwyFungsionalsToDelete = $this->getRwyFungsionals(new Criteria(), $con)->diff($rwyFungsionals);

        $this->rwyFungsionalsScheduledForDeletion = unserialize(serialize($rwyFungsionalsToDelete));

        foreach ($rwyFungsionalsToDelete as $rwyFungsionalRemoved) {
            $rwyFungsionalRemoved->setPtk(null);
        }

        $this->collRwyFungsionals = null;
        foreach ($rwyFungsionals as $rwyFungsional) {
            $this->addRwyFungsional($rwyFungsional);
        }

        $this->collRwyFungsionals = $rwyFungsionals;
        $this->collRwyFungsionalsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related RwyFungsional objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related RwyFungsional objects.
     * @throws PropelException
     */
    public function countRwyFungsionals(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collRwyFungsionalsPartial && !$this->isNew();
        if (null === $this->collRwyFungsionals || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collRwyFungsionals) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getRwyFungsionals());
            }
            $query = RwyFungsionalQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPtk($this)
                ->count($con);
        }

        return count($this->collRwyFungsionals);
    }

    /**
     * Method called to associate a RwyFungsional object to this object
     * through the RwyFungsional foreign key attribute.
     *
     * @param    RwyFungsional $l RwyFungsional
     * @return Ptk The current object (for fluent API support)
     */
    public function addRwyFungsional(RwyFungsional $l)
    {
        if ($this->collRwyFungsionals === null) {
            $this->initRwyFungsionals();
            $this->collRwyFungsionalsPartial = true;
        }
        if (!in_array($l, $this->collRwyFungsionals->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddRwyFungsional($l);
        }

        return $this;
    }

    /**
     * @param	RwyFungsional $rwyFungsional The rwyFungsional object to add.
     */
    protected function doAddRwyFungsional($rwyFungsional)
    {
        $this->collRwyFungsionals[]= $rwyFungsional;
        $rwyFungsional->setPtk($this);
    }

    /**
     * @param	RwyFungsional $rwyFungsional The rwyFungsional object to remove.
     * @return Ptk The current object (for fluent API support)
     */
    public function removeRwyFungsional($rwyFungsional)
    {
        if ($this->getRwyFungsionals()->contains($rwyFungsional)) {
            $this->collRwyFungsionals->remove($this->collRwyFungsionals->search($rwyFungsional));
            if (null === $this->rwyFungsionalsScheduledForDeletion) {
                $this->rwyFungsionalsScheduledForDeletion = clone $this->collRwyFungsionals;
                $this->rwyFungsionalsScheduledForDeletion->clear();
            }
            $this->rwyFungsionalsScheduledForDeletion[]= clone $rwyFungsional;
            $rwyFungsional->setPtk(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Ptk is new, it will return
     * an empty collection; or if this Ptk has previously
     * been saved, it will retrieve related RwyFungsionals from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Ptk.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|RwyFungsional[] List of RwyFungsional objects
     */
    public function getRwyFungsionalsJoinJabatanFungsional($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = RwyFungsionalQuery::create(null, $criteria);
        $query->joinWith('JabatanFungsional', $join_behavior);

        return $this->getRwyFungsionals($query, $con);
    }

    /**
     * Clears out the collRwyKepangkatans collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Ptk The current object (for fluent API support)
     * @see        addRwyKepangkatans()
     */
    public function clearRwyKepangkatans()
    {
        $this->collRwyKepangkatans = null; // important to set this to null since that means it is uninitialized
        $this->collRwyKepangkatansPartial = null;

        return $this;
    }

    /**
     * reset is the collRwyKepangkatans collection loaded partially
     *
     * @return void
     */
    public function resetPartialRwyKepangkatans($v = true)
    {
        $this->collRwyKepangkatansPartial = $v;
    }

    /**
     * Initializes the collRwyKepangkatans collection.
     *
     * By default this just sets the collRwyKepangkatans collection to an empty array (like clearcollRwyKepangkatans());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initRwyKepangkatans($overrideExisting = true)
    {
        if (null !== $this->collRwyKepangkatans && !$overrideExisting) {
            return;
        }
        $this->collRwyKepangkatans = new PropelObjectCollection();
        $this->collRwyKepangkatans->setModel('RwyKepangkatan');
    }

    /**
     * Gets an array of RwyKepangkatan objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Ptk is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|RwyKepangkatan[] List of RwyKepangkatan objects
     * @throws PropelException
     */
    public function getRwyKepangkatans($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collRwyKepangkatansPartial && !$this->isNew();
        if (null === $this->collRwyKepangkatans || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collRwyKepangkatans) {
                // return empty collection
                $this->initRwyKepangkatans();
            } else {
                $collRwyKepangkatans = RwyKepangkatanQuery::create(null, $criteria)
                    ->filterByPtk($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collRwyKepangkatansPartial && count($collRwyKepangkatans)) {
                      $this->initRwyKepangkatans(false);

                      foreach($collRwyKepangkatans as $obj) {
                        if (false == $this->collRwyKepangkatans->contains($obj)) {
                          $this->collRwyKepangkatans->append($obj);
                        }
                      }

                      $this->collRwyKepangkatansPartial = true;
                    }

                    $collRwyKepangkatans->getInternalIterator()->rewind();
                    return $collRwyKepangkatans;
                }

                if($partial && $this->collRwyKepangkatans) {
                    foreach($this->collRwyKepangkatans as $obj) {
                        if($obj->isNew()) {
                            $collRwyKepangkatans[] = $obj;
                        }
                    }
                }

                $this->collRwyKepangkatans = $collRwyKepangkatans;
                $this->collRwyKepangkatansPartial = false;
            }
        }

        return $this->collRwyKepangkatans;
    }

    /**
     * Sets a collection of RwyKepangkatan objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $rwyKepangkatans A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Ptk The current object (for fluent API support)
     */
    public function setRwyKepangkatans(PropelCollection $rwyKepangkatans, PropelPDO $con = null)
    {
        $rwyKepangkatansToDelete = $this->getRwyKepangkatans(new Criteria(), $con)->diff($rwyKepangkatans);

        $this->rwyKepangkatansScheduledForDeletion = unserialize(serialize($rwyKepangkatansToDelete));

        foreach ($rwyKepangkatansToDelete as $rwyKepangkatanRemoved) {
            $rwyKepangkatanRemoved->setPtk(null);
        }

        $this->collRwyKepangkatans = null;
        foreach ($rwyKepangkatans as $rwyKepangkatan) {
            $this->addRwyKepangkatan($rwyKepangkatan);
        }

        $this->collRwyKepangkatans = $rwyKepangkatans;
        $this->collRwyKepangkatansPartial = false;

        return $this;
    }

    /**
     * Returns the number of related RwyKepangkatan objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related RwyKepangkatan objects.
     * @throws PropelException
     */
    public function countRwyKepangkatans(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collRwyKepangkatansPartial && !$this->isNew();
        if (null === $this->collRwyKepangkatans || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collRwyKepangkatans) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getRwyKepangkatans());
            }
            $query = RwyKepangkatanQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPtk($this)
                ->count($con);
        }

        return count($this->collRwyKepangkatans);
    }

    /**
     * Method called to associate a RwyKepangkatan object to this object
     * through the RwyKepangkatan foreign key attribute.
     *
     * @param    RwyKepangkatan $l RwyKepangkatan
     * @return Ptk The current object (for fluent API support)
     */
    public function addRwyKepangkatan(RwyKepangkatan $l)
    {
        if ($this->collRwyKepangkatans === null) {
            $this->initRwyKepangkatans();
            $this->collRwyKepangkatansPartial = true;
        }
        if (!in_array($l, $this->collRwyKepangkatans->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddRwyKepangkatan($l);
        }

        return $this;
    }

    /**
     * @param	RwyKepangkatan $rwyKepangkatan The rwyKepangkatan object to add.
     */
    protected function doAddRwyKepangkatan($rwyKepangkatan)
    {
        $this->collRwyKepangkatans[]= $rwyKepangkatan;
        $rwyKepangkatan->setPtk($this);
    }

    /**
     * @param	RwyKepangkatan $rwyKepangkatan The rwyKepangkatan object to remove.
     * @return Ptk The current object (for fluent API support)
     */
    public function removeRwyKepangkatan($rwyKepangkatan)
    {
        if ($this->getRwyKepangkatans()->contains($rwyKepangkatan)) {
            $this->collRwyKepangkatans->remove($this->collRwyKepangkatans->search($rwyKepangkatan));
            if (null === $this->rwyKepangkatansScheduledForDeletion) {
                $this->rwyKepangkatansScheduledForDeletion = clone $this->collRwyKepangkatans;
                $this->rwyKepangkatansScheduledForDeletion->clear();
            }
            $this->rwyKepangkatansScheduledForDeletion[]= clone $rwyKepangkatan;
            $rwyKepangkatan->setPtk(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Ptk is new, it will return
     * an empty collection; or if this Ptk has previously
     * been saved, it will retrieve related RwyKepangkatans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Ptk.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|RwyKepangkatan[] List of RwyKepangkatan objects
     */
    public function getRwyKepangkatansJoinPangkatGolongan($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = RwyKepangkatanQuery::create(null, $criteria);
        $query->joinWith('PangkatGolongan', $join_behavior);

        return $this->getRwyKepangkatans($query, $con);
    }

    /**
     * Clears out the collRwyKerjas collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Ptk The current object (for fluent API support)
     * @see        addRwyKerjas()
     */
    public function clearRwyKerjas()
    {
        $this->collRwyKerjas = null; // important to set this to null since that means it is uninitialized
        $this->collRwyKerjasPartial = null;

        return $this;
    }

    /**
     * reset is the collRwyKerjas collection loaded partially
     *
     * @return void
     */
    public function resetPartialRwyKerjas($v = true)
    {
        $this->collRwyKerjasPartial = $v;
    }

    /**
     * Initializes the collRwyKerjas collection.
     *
     * By default this just sets the collRwyKerjas collection to an empty array (like clearcollRwyKerjas());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initRwyKerjas($overrideExisting = true)
    {
        if (null !== $this->collRwyKerjas && !$overrideExisting) {
            return;
        }
        $this->collRwyKerjas = new PropelObjectCollection();
        $this->collRwyKerjas->setModel('RwyKerja');
    }

    /**
     * Gets an array of RwyKerja objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Ptk is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|RwyKerja[] List of RwyKerja objects
     * @throws PropelException
     */
    public function getRwyKerjas($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collRwyKerjasPartial && !$this->isNew();
        if (null === $this->collRwyKerjas || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collRwyKerjas) {
                // return empty collection
                $this->initRwyKerjas();
            } else {
                $collRwyKerjas = RwyKerjaQuery::create(null, $criteria)
                    ->filterByPtk($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collRwyKerjasPartial && count($collRwyKerjas)) {
                      $this->initRwyKerjas(false);

                      foreach($collRwyKerjas as $obj) {
                        if (false == $this->collRwyKerjas->contains($obj)) {
                          $this->collRwyKerjas->append($obj);
                        }
                      }

                      $this->collRwyKerjasPartial = true;
                    }

                    $collRwyKerjas->getInternalIterator()->rewind();
                    return $collRwyKerjas;
                }

                if($partial && $this->collRwyKerjas) {
                    foreach($this->collRwyKerjas as $obj) {
                        if($obj->isNew()) {
                            $collRwyKerjas[] = $obj;
                        }
                    }
                }

                $this->collRwyKerjas = $collRwyKerjas;
                $this->collRwyKerjasPartial = false;
            }
        }

        return $this->collRwyKerjas;
    }

    /**
     * Sets a collection of RwyKerja objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $rwyKerjas A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Ptk The current object (for fluent API support)
     */
    public function setRwyKerjas(PropelCollection $rwyKerjas, PropelPDO $con = null)
    {
        $rwyKerjasToDelete = $this->getRwyKerjas(new Criteria(), $con)->diff($rwyKerjas);

        $this->rwyKerjasScheduledForDeletion = unserialize(serialize($rwyKerjasToDelete));

        foreach ($rwyKerjasToDelete as $rwyKerjaRemoved) {
            $rwyKerjaRemoved->setPtk(null);
        }

        $this->collRwyKerjas = null;
        foreach ($rwyKerjas as $rwyKerja) {
            $this->addRwyKerja($rwyKerja);
        }

        $this->collRwyKerjas = $rwyKerjas;
        $this->collRwyKerjasPartial = false;

        return $this;
    }

    /**
     * Returns the number of related RwyKerja objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related RwyKerja objects.
     * @throws PropelException
     */
    public function countRwyKerjas(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collRwyKerjasPartial && !$this->isNew();
        if (null === $this->collRwyKerjas || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collRwyKerjas) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getRwyKerjas());
            }
            $query = RwyKerjaQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPtk($this)
                ->count($con);
        }

        return count($this->collRwyKerjas);
    }

    /**
     * Method called to associate a RwyKerja object to this object
     * through the RwyKerja foreign key attribute.
     *
     * @param    RwyKerja $l RwyKerja
     * @return Ptk The current object (for fluent API support)
     */
    public function addRwyKerja(RwyKerja $l)
    {
        if ($this->collRwyKerjas === null) {
            $this->initRwyKerjas();
            $this->collRwyKerjasPartial = true;
        }
        if (!in_array($l, $this->collRwyKerjas->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddRwyKerja($l);
        }

        return $this;
    }

    /**
     * @param	RwyKerja $rwyKerja The rwyKerja object to add.
     */
    protected function doAddRwyKerja($rwyKerja)
    {
        $this->collRwyKerjas[]= $rwyKerja;
        $rwyKerja->setPtk($this);
    }

    /**
     * @param	RwyKerja $rwyKerja The rwyKerja object to remove.
     * @return Ptk The current object (for fluent API support)
     */
    public function removeRwyKerja($rwyKerja)
    {
        if ($this->getRwyKerjas()->contains($rwyKerja)) {
            $this->collRwyKerjas->remove($this->collRwyKerjas->search($rwyKerja));
            if (null === $this->rwyKerjasScheduledForDeletion) {
                $this->rwyKerjasScheduledForDeletion = clone $this->collRwyKerjas;
                $this->rwyKerjasScheduledForDeletion->clear();
            }
            $this->rwyKerjasScheduledForDeletion[]= clone $rwyKerja;
            $rwyKerja->setPtk(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Ptk is new, it will return
     * an empty collection; or if this Ptk has previously
     * been saved, it will retrieve related RwyKerjas from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Ptk.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|RwyKerja[] List of RwyKerja objects
     */
    public function getRwyKerjasJoinJenisLembaga($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = RwyKerjaQuery::create(null, $criteria);
        $query->joinWith('JenisLembaga', $join_behavior);

        return $this->getRwyKerjas($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Ptk is new, it will return
     * an empty collection; or if this Ptk has previously
     * been saved, it will retrieve related RwyKerjas from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Ptk.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|RwyKerja[] List of RwyKerja objects
     */
    public function getRwyKerjasJoinJenisPtk($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = RwyKerjaQuery::create(null, $criteria);
        $query->joinWith('JenisPtk', $join_behavior);

        return $this->getRwyKerjas($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Ptk is new, it will return
     * an empty collection; or if this Ptk has previously
     * been saved, it will retrieve related RwyKerjas from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Ptk.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|RwyKerja[] List of RwyKerja objects
     */
    public function getRwyKerjasJoinStatusKepegawaian($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = RwyKerjaQuery::create(null, $criteria);
        $query->joinWith('StatusKepegawaian', $join_behavior);

        return $this->getRwyKerjas($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Ptk is new, it will return
     * an empty collection; or if this Ptk has previously
     * been saved, it will retrieve related RwyKerjas from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Ptk.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|RwyKerja[] List of RwyKerja objects
     */
    public function getRwyKerjasJoinJenjangPendidikan($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = RwyKerjaQuery::create(null, $criteria);
        $query->joinWith('JenjangPendidikan', $join_behavior);

        return $this->getRwyKerjas($query, $con);
    }

    /**
     * Clears out the collRwyPendFormals collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Ptk The current object (for fluent API support)
     * @see        addRwyPendFormals()
     */
    public function clearRwyPendFormals()
    {
        $this->collRwyPendFormals = null; // important to set this to null since that means it is uninitialized
        $this->collRwyPendFormalsPartial = null;

        return $this;
    }

    /**
     * reset is the collRwyPendFormals collection loaded partially
     *
     * @return void
     */
    public function resetPartialRwyPendFormals($v = true)
    {
        $this->collRwyPendFormalsPartial = $v;
    }

    /**
     * Initializes the collRwyPendFormals collection.
     *
     * By default this just sets the collRwyPendFormals collection to an empty array (like clearcollRwyPendFormals());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initRwyPendFormals($overrideExisting = true)
    {
        if (null !== $this->collRwyPendFormals && !$overrideExisting) {
            return;
        }
        $this->collRwyPendFormals = new PropelObjectCollection();
        $this->collRwyPendFormals->setModel('RwyPendFormal');
    }

    /**
     * Gets an array of RwyPendFormal objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Ptk is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|RwyPendFormal[] List of RwyPendFormal objects
     * @throws PropelException
     */
    public function getRwyPendFormals($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collRwyPendFormalsPartial && !$this->isNew();
        if (null === $this->collRwyPendFormals || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collRwyPendFormals) {
                // return empty collection
                $this->initRwyPendFormals();
            } else {
                $collRwyPendFormals = RwyPendFormalQuery::create(null, $criteria)
                    ->filterByPtk($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collRwyPendFormalsPartial && count($collRwyPendFormals)) {
                      $this->initRwyPendFormals(false);

                      foreach($collRwyPendFormals as $obj) {
                        if (false == $this->collRwyPendFormals->contains($obj)) {
                          $this->collRwyPendFormals->append($obj);
                        }
                      }

                      $this->collRwyPendFormalsPartial = true;
                    }

                    $collRwyPendFormals->getInternalIterator()->rewind();
                    return $collRwyPendFormals;
                }

                if($partial && $this->collRwyPendFormals) {
                    foreach($this->collRwyPendFormals as $obj) {
                        if($obj->isNew()) {
                            $collRwyPendFormals[] = $obj;
                        }
                    }
                }

                $this->collRwyPendFormals = $collRwyPendFormals;
                $this->collRwyPendFormalsPartial = false;
            }
        }

        return $this->collRwyPendFormals;
    }

    /**
     * Sets a collection of RwyPendFormal objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $rwyPendFormals A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Ptk The current object (for fluent API support)
     */
    public function setRwyPendFormals(PropelCollection $rwyPendFormals, PropelPDO $con = null)
    {
        $rwyPendFormalsToDelete = $this->getRwyPendFormals(new Criteria(), $con)->diff($rwyPendFormals);

        $this->rwyPendFormalsScheduledForDeletion = unserialize(serialize($rwyPendFormalsToDelete));

        foreach ($rwyPendFormalsToDelete as $rwyPendFormalRemoved) {
            $rwyPendFormalRemoved->setPtk(null);
        }

        $this->collRwyPendFormals = null;
        foreach ($rwyPendFormals as $rwyPendFormal) {
            $this->addRwyPendFormal($rwyPendFormal);
        }

        $this->collRwyPendFormals = $rwyPendFormals;
        $this->collRwyPendFormalsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related RwyPendFormal objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related RwyPendFormal objects.
     * @throws PropelException
     */
    public function countRwyPendFormals(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collRwyPendFormalsPartial && !$this->isNew();
        if (null === $this->collRwyPendFormals || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collRwyPendFormals) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getRwyPendFormals());
            }
            $query = RwyPendFormalQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPtk($this)
                ->count($con);
        }

        return count($this->collRwyPendFormals);
    }

    /**
     * Method called to associate a RwyPendFormal object to this object
     * through the RwyPendFormal foreign key attribute.
     *
     * @param    RwyPendFormal $l RwyPendFormal
     * @return Ptk The current object (for fluent API support)
     */
    public function addRwyPendFormal(RwyPendFormal $l)
    {
        if ($this->collRwyPendFormals === null) {
            $this->initRwyPendFormals();
            $this->collRwyPendFormalsPartial = true;
        }
        if (!in_array($l, $this->collRwyPendFormals->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddRwyPendFormal($l);
        }

        return $this;
    }

    /**
     * @param	RwyPendFormal $rwyPendFormal The rwyPendFormal object to add.
     */
    protected function doAddRwyPendFormal($rwyPendFormal)
    {
        $this->collRwyPendFormals[]= $rwyPendFormal;
        $rwyPendFormal->setPtk($this);
    }

    /**
     * @param	RwyPendFormal $rwyPendFormal The rwyPendFormal object to remove.
     * @return Ptk The current object (for fluent API support)
     */
    public function removeRwyPendFormal($rwyPendFormal)
    {
        if ($this->getRwyPendFormals()->contains($rwyPendFormal)) {
            $this->collRwyPendFormals->remove($this->collRwyPendFormals->search($rwyPendFormal));
            if (null === $this->rwyPendFormalsScheduledForDeletion) {
                $this->rwyPendFormalsScheduledForDeletion = clone $this->collRwyPendFormals;
                $this->rwyPendFormalsScheduledForDeletion->clear();
            }
            $this->rwyPendFormalsScheduledForDeletion[]= clone $rwyPendFormal;
            $rwyPendFormal->setPtk(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Ptk is new, it will return
     * an empty collection; or if this Ptk has previously
     * been saved, it will retrieve related RwyPendFormals from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Ptk.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|RwyPendFormal[] List of RwyPendFormal objects
     */
    public function getRwyPendFormalsJoinGelarAkademik($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = RwyPendFormalQuery::create(null, $criteria);
        $query->joinWith('GelarAkademik', $join_behavior);

        return $this->getRwyPendFormals($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Ptk is new, it will return
     * an empty collection; or if this Ptk has previously
     * been saved, it will retrieve related RwyPendFormals from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Ptk.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|RwyPendFormal[] List of RwyPendFormal objects
     */
    public function getRwyPendFormalsJoinBidangStudi($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = RwyPendFormalQuery::create(null, $criteria);
        $query->joinWith('BidangStudi', $join_behavior);

        return $this->getRwyPendFormals($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Ptk is new, it will return
     * an empty collection; or if this Ptk has previously
     * been saved, it will retrieve related RwyPendFormals from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Ptk.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|RwyPendFormal[] List of RwyPendFormal objects
     */
    public function getRwyPendFormalsJoinJenjangPendidikan($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = RwyPendFormalQuery::create(null, $criteria);
        $query->joinWith('JenjangPendidikan', $join_behavior);

        return $this->getRwyPendFormals($query, $con);
    }

    /**
     * Clears out the collRwySertifikasis collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Ptk The current object (for fluent API support)
     * @see        addRwySertifikasis()
     */
    public function clearRwySertifikasis()
    {
        $this->collRwySertifikasis = null; // important to set this to null since that means it is uninitialized
        $this->collRwySertifikasisPartial = null;

        return $this;
    }

    /**
     * reset is the collRwySertifikasis collection loaded partially
     *
     * @return void
     */
    public function resetPartialRwySertifikasis($v = true)
    {
        $this->collRwySertifikasisPartial = $v;
    }

    /**
     * Initializes the collRwySertifikasis collection.
     *
     * By default this just sets the collRwySertifikasis collection to an empty array (like clearcollRwySertifikasis());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initRwySertifikasis($overrideExisting = true)
    {
        if (null !== $this->collRwySertifikasis && !$overrideExisting) {
            return;
        }
        $this->collRwySertifikasis = new PropelObjectCollection();
        $this->collRwySertifikasis->setModel('RwySertifikasi');
    }

    /**
     * Gets an array of RwySertifikasi objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Ptk is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|RwySertifikasi[] List of RwySertifikasi objects
     * @throws PropelException
     */
    public function getRwySertifikasis($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collRwySertifikasisPartial && !$this->isNew();
        if (null === $this->collRwySertifikasis || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collRwySertifikasis) {
                // return empty collection
                $this->initRwySertifikasis();
            } else {
                $collRwySertifikasis = RwySertifikasiQuery::create(null, $criteria)
                    ->filterByPtk($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collRwySertifikasisPartial && count($collRwySertifikasis)) {
                      $this->initRwySertifikasis(false);

                      foreach($collRwySertifikasis as $obj) {
                        if (false == $this->collRwySertifikasis->contains($obj)) {
                          $this->collRwySertifikasis->append($obj);
                        }
                      }

                      $this->collRwySertifikasisPartial = true;
                    }

                    $collRwySertifikasis->getInternalIterator()->rewind();
                    return $collRwySertifikasis;
                }

                if($partial && $this->collRwySertifikasis) {
                    foreach($this->collRwySertifikasis as $obj) {
                        if($obj->isNew()) {
                            $collRwySertifikasis[] = $obj;
                        }
                    }
                }

                $this->collRwySertifikasis = $collRwySertifikasis;
                $this->collRwySertifikasisPartial = false;
            }
        }

        return $this->collRwySertifikasis;
    }

    /**
     * Sets a collection of RwySertifikasi objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $rwySertifikasis A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Ptk The current object (for fluent API support)
     */
    public function setRwySertifikasis(PropelCollection $rwySertifikasis, PropelPDO $con = null)
    {
        $rwySertifikasisToDelete = $this->getRwySertifikasis(new Criteria(), $con)->diff($rwySertifikasis);

        $this->rwySertifikasisScheduledForDeletion = unserialize(serialize($rwySertifikasisToDelete));

        foreach ($rwySertifikasisToDelete as $rwySertifikasiRemoved) {
            $rwySertifikasiRemoved->setPtk(null);
        }

        $this->collRwySertifikasis = null;
        foreach ($rwySertifikasis as $rwySertifikasi) {
            $this->addRwySertifikasi($rwySertifikasi);
        }

        $this->collRwySertifikasis = $rwySertifikasis;
        $this->collRwySertifikasisPartial = false;

        return $this;
    }

    /**
     * Returns the number of related RwySertifikasi objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related RwySertifikasi objects.
     * @throws PropelException
     */
    public function countRwySertifikasis(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collRwySertifikasisPartial && !$this->isNew();
        if (null === $this->collRwySertifikasis || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collRwySertifikasis) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getRwySertifikasis());
            }
            $query = RwySertifikasiQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPtk($this)
                ->count($con);
        }

        return count($this->collRwySertifikasis);
    }

    /**
     * Method called to associate a RwySertifikasi object to this object
     * through the RwySertifikasi foreign key attribute.
     *
     * @param    RwySertifikasi $l RwySertifikasi
     * @return Ptk The current object (for fluent API support)
     */
    public function addRwySertifikasi(RwySertifikasi $l)
    {
        if ($this->collRwySertifikasis === null) {
            $this->initRwySertifikasis();
            $this->collRwySertifikasisPartial = true;
        }
        if (!in_array($l, $this->collRwySertifikasis->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddRwySertifikasi($l);
        }

        return $this;
    }

    /**
     * @param	RwySertifikasi $rwySertifikasi The rwySertifikasi object to add.
     */
    protected function doAddRwySertifikasi($rwySertifikasi)
    {
        $this->collRwySertifikasis[]= $rwySertifikasi;
        $rwySertifikasi->setPtk($this);
    }

    /**
     * @param	RwySertifikasi $rwySertifikasi The rwySertifikasi object to remove.
     * @return Ptk The current object (for fluent API support)
     */
    public function removeRwySertifikasi($rwySertifikasi)
    {
        if ($this->getRwySertifikasis()->contains($rwySertifikasi)) {
            $this->collRwySertifikasis->remove($this->collRwySertifikasis->search($rwySertifikasi));
            if (null === $this->rwySertifikasisScheduledForDeletion) {
                $this->rwySertifikasisScheduledForDeletion = clone $this->collRwySertifikasis;
                $this->rwySertifikasisScheduledForDeletion->clear();
            }
            $this->rwySertifikasisScheduledForDeletion[]= clone $rwySertifikasi;
            $rwySertifikasi->setPtk(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Ptk is new, it will return
     * an empty collection; or if this Ptk has previously
     * been saved, it will retrieve related RwySertifikasis from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Ptk.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|RwySertifikasi[] List of RwySertifikasi objects
     */
    public function getRwySertifikasisJoinBidangStudi($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = RwySertifikasiQuery::create(null, $criteria);
        $query->joinWith('BidangStudi', $join_behavior);

        return $this->getRwySertifikasis($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Ptk is new, it will return
     * an empty collection; or if this Ptk has previously
     * been saved, it will retrieve related RwySertifikasis from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Ptk.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|RwySertifikasi[] List of RwySertifikasi objects
     */
    public function getRwySertifikasisJoinJenisSertifikasi($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = RwySertifikasiQuery::create(null, $criteria);
        $query->joinWith('JenisSertifikasi', $join_behavior);

        return $this->getRwySertifikasis($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Ptk is new, it will return
     * an empty collection; or if this Ptk has previously
     * been saved, it will retrieve related RwySertifikasis from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Ptk.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|RwySertifikasi[] List of RwySertifikasi objects
     */
    public function getRwySertifikasisJoinLembSertifikasi($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = RwySertifikasiQuery::create(null, $criteria);
        $query->joinWith('LembSertifikasi', $join_behavior);

        return $this->getRwySertifikasis($query, $con);
    }

    /**
     * Clears out the collRwyStrukturals collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Ptk The current object (for fluent API support)
     * @see        addRwyStrukturals()
     */
    public function clearRwyStrukturals()
    {
        $this->collRwyStrukturals = null; // important to set this to null since that means it is uninitialized
        $this->collRwyStrukturalsPartial = null;

        return $this;
    }

    /**
     * reset is the collRwyStrukturals collection loaded partially
     *
     * @return void
     */
    public function resetPartialRwyStrukturals($v = true)
    {
        $this->collRwyStrukturalsPartial = $v;
    }

    /**
     * Initializes the collRwyStrukturals collection.
     *
     * By default this just sets the collRwyStrukturals collection to an empty array (like clearcollRwyStrukturals());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initRwyStrukturals($overrideExisting = true)
    {
        if (null !== $this->collRwyStrukturals && !$overrideExisting) {
            return;
        }
        $this->collRwyStrukturals = new PropelObjectCollection();
        $this->collRwyStrukturals->setModel('RwyStruktural');
    }

    /**
     * Gets an array of RwyStruktural objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Ptk is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|RwyStruktural[] List of RwyStruktural objects
     * @throws PropelException
     */
    public function getRwyStrukturals($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collRwyStrukturalsPartial && !$this->isNew();
        if (null === $this->collRwyStrukturals || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collRwyStrukturals) {
                // return empty collection
                $this->initRwyStrukturals();
            } else {
                $collRwyStrukturals = RwyStrukturalQuery::create(null, $criteria)
                    ->filterByPtk($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collRwyStrukturalsPartial && count($collRwyStrukturals)) {
                      $this->initRwyStrukturals(false);

                      foreach($collRwyStrukturals as $obj) {
                        if (false == $this->collRwyStrukturals->contains($obj)) {
                          $this->collRwyStrukturals->append($obj);
                        }
                      }

                      $this->collRwyStrukturalsPartial = true;
                    }

                    $collRwyStrukturals->getInternalIterator()->rewind();
                    return $collRwyStrukturals;
                }

                if($partial && $this->collRwyStrukturals) {
                    foreach($this->collRwyStrukturals as $obj) {
                        if($obj->isNew()) {
                            $collRwyStrukturals[] = $obj;
                        }
                    }
                }

                $this->collRwyStrukturals = $collRwyStrukturals;
                $this->collRwyStrukturalsPartial = false;
            }
        }

        return $this->collRwyStrukturals;
    }

    /**
     * Sets a collection of RwyStruktural objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $rwyStrukturals A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Ptk The current object (for fluent API support)
     */
    public function setRwyStrukturals(PropelCollection $rwyStrukturals, PropelPDO $con = null)
    {
        $rwyStrukturalsToDelete = $this->getRwyStrukturals(new Criteria(), $con)->diff($rwyStrukturals);

        $this->rwyStrukturalsScheduledForDeletion = unserialize(serialize($rwyStrukturalsToDelete));

        foreach ($rwyStrukturalsToDelete as $rwyStrukturalRemoved) {
            $rwyStrukturalRemoved->setPtk(null);
        }

        $this->collRwyStrukturals = null;
        foreach ($rwyStrukturals as $rwyStruktural) {
            $this->addRwyStruktural($rwyStruktural);
        }

        $this->collRwyStrukturals = $rwyStrukturals;
        $this->collRwyStrukturalsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related RwyStruktural objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related RwyStruktural objects.
     * @throws PropelException
     */
    public function countRwyStrukturals(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collRwyStrukturalsPartial && !$this->isNew();
        if (null === $this->collRwyStrukturals || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collRwyStrukturals) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getRwyStrukturals());
            }
            $query = RwyStrukturalQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPtk($this)
                ->count($con);
        }

        return count($this->collRwyStrukturals);
    }

    /**
     * Method called to associate a RwyStruktural object to this object
     * through the RwyStruktural foreign key attribute.
     *
     * @param    RwyStruktural $l RwyStruktural
     * @return Ptk The current object (for fluent API support)
     */
    public function addRwyStruktural(RwyStruktural $l)
    {
        if ($this->collRwyStrukturals === null) {
            $this->initRwyStrukturals();
            $this->collRwyStrukturalsPartial = true;
        }
        if (!in_array($l, $this->collRwyStrukturals->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddRwyStruktural($l);
        }

        return $this;
    }

    /**
     * @param	RwyStruktural $rwyStruktural The rwyStruktural object to add.
     */
    protected function doAddRwyStruktural($rwyStruktural)
    {
        $this->collRwyStrukturals[]= $rwyStruktural;
        $rwyStruktural->setPtk($this);
    }

    /**
     * @param	RwyStruktural $rwyStruktural The rwyStruktural object to remove.
     * @return Ptk The current object (for fluent API support)
     */
    public function removeRwyStruktural($rwyStruktural)
    {
        if ($this->getRwyStrukturals()->contains($rwyStruktural)) {
            $this->collRwyStrukturals->remove($this->collRwyStrukturals->search($rwyStruktural));
            if (null === $this->rwyStrukturalsScheduledForDeletion) {
                $this->rwyStrukturalsScheduledForDeletion = clone $this->collRwyStrukturals;
                $this->rwyStrukturalsScheduledForDeletion->clear();
            }
            $this->rwyStrukturalsScheduledForDeletion[]= clone $rwyStruktural;
            $rwyStruktural->setPtk(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Ptk is new, it will return
     * an empty collection; or if this Ptk has previously
     * been saved, it will retrieve related RwyStrukturals from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Ptk.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|RwyStruktural[] List of RwyStruktural objects
     */
    public function getRwyStrukturalsJoinJabatanTugasPtk($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = RwyStrukturalQuery::create(null, $criteria);
        $query->joinWith('JabatanTugasPtk', $join_behavior);

        return $this->getRwyStrukturals($query, $con);
    }

    /**
     * Clears out the collTugasTambahans collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Ptk The current object (for fluent API support)
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
     * If this Ptk is new, it will return
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
                    ->filterByPtk($this)
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
     * @return Ptk The current object (for fluent API support)
     */
    public function setTugasTambahans(PropelCollection $tugasTambahans, PropelPDO $con = null)
    {
        $tugasTambahansToDelete = $this->getTugasTambahans(new Criteria(), $con)->diff($tugasTambahans);

        $this->tugasTambahansScheduledForDeletion = unserialize(serialize($tugasTambahansToDelete));

        foreach ($tugasTambahansToDelete as $tugasTambahanRemoved) {
            $tugasTambahanRemoved->setPtk(null);
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
                ->filterByPtk($this)
                ->count($con);
        }

        return count($this->collTugasTambahans);
    }

    /**
     * Method called to associate a TugasTambahan object to this object
     * through the TugasTambahan foreign key attribute.
     *
     * @param    TugasTambahan $l TugasTambahan
     * @return Ptk The current object (for fluent API support)
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
        $tugasTambahan->setPtk($this);
    }

    /**
     * @param	TugasTambahan $tugasTambahan The tugasTambahan object to remove.
     * @return Ptk The current object (for fluent API support)
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
            $tugasTambahan->setPtk(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Ptk is new, it will return
     * an empty collection; or if this Ptk has previously
     * been saved, it will retrieve related TugasTambahans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Ptk.
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
     * Otherwise if this Ptk is new, it will return
     * an empty collection; or if this Ptk has previously
     * been saved, it will retrieve related TugasTambahans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Ptk.
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
     * Otherwise if this Ptk is new, it will return
     * an empty collection; or if this Ptk has previously
     * been saved, it will retrieve related TugasTambahans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Ptk.
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
     * Clears out the collTunjangans collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Ptk The current object (for fluent API support)
     * @see        addTunjangans()
     */
    public function clearTunjangans()
    {
        $this->collTunjangans = null; // important to set this to null since that means it is uninitialized
        $this->collTunjangansPartial = null;

        return $this;
    }

    /**
     * reset is the collTunjangans collection loaded partially
     *
     * @return void
     */
    public function resetPartialTunjangans($v = true)
    {
        $this->collTunjangansPartial = $v;
    }

    /**
     * Initializes the collTunjangans collection.
     *
     * By default this just sets the collTunjangans collection to an empty array (like clearcollTunjangans());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initTunjangans($overrideExisting = true)
    {
        if (null !== $this->collTunjangans && !$overrideExisting) {
            return;
        }
        $this->collTunjangans = new PropelObjectCollection();
        $this->collTunjangans->setModel('Tunjangan');
    }

    /**
     * Gets an array of Tunjangan objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Ptk is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Tunjangan[] List of Tunjangan objects
     * @throws PropelException
     */
    public function getTunjangans($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collTunjangansPartial && !$this->isNew();
        if (null === $this->collTunjangans || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collTunjangans) {
                // return empty collection
                $this->initTunjangans();
            } else {
                $collTunjangans = TunjanganQuery::create(null, $criteria)
                    ->filterByPtk($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collTunjangansPartial && count($collTunjangans)) {
                      $this->initTunjangans(false);

                      foreach($collTunjangans as $obj) {
                        if (false == $this->collTunjangans->contains($obj)) {
                          $this->collTunjangans->append($obj);
                        }
                      }

                      $this->collTunjangansPartial = true;
                    }

                    $collTunjangans->getInternalIterator()->rewind();
                    return $collTunjangans;
                }

                if($partial && $this->collTunjangans) {
                    foreach($this->collTunjangans as $obj) {
                        if($obj->isNew()) {
                            $collTunjangans[] = $obj;
                        }
                    }
                }

                $this->collTunjangans = $collTunjangans;
                $this->collTunjangansPartial = false;
            }
        }

        return $this->collTunjangans;
    }

    /**
     * Sets a collection of Tunjangan objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $tunjangans A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Ptk The current object (for fluent API support)
     */
    public function setTunjangans(PropelCollection $tunjangans, PropelPDO $con = null)
    {
        $tunjangansToDelete = $this->getTunjangans(new Criteria(), $con)->diff($tunjangans);

        $this->tunjangansScheduledForDeletion = unserialize(serialize($tunjangansToDelete));

        foreach ($tunjangansToDelete as $tunjanganRemoved) {
            $tunjanganRemoved->setPtk(null);
        }

        $this->collTunjangans = null;
        foreach ($tunjangans as $tunjangan) {
            $this->addTunjangan($tunjangan);
        }

        $this->collTunjangans = $tunjangans;
        $this->collTunjangansPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Tunjangan objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Tunjangan objects.
     * @throws PropelException
     */
    public function countTunjangans(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collTunjangansPartial && !$this->isNew();
        if (null === $this->collTunjangans || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collTunjangans) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getTunjangans());
            }
            $query = TunjanganQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPtk($this)
                ->count($con);
        }

        return count($this->collTunjangans);
    }

    /**
     * Method called to associate a Tunjangan object to this object
     * through the Tunjangan foreign key attribute.
     *
     * @param    Tunjangan $l Tunjangan
     * @return Ptk The current object (for fluent API support)
     */
    public function addTunjangan(Tunjangan $l)
    {
        if ($this->collTunjangans === null) {
            $this->initTunjangans();
            $this->collTunjangansPartial = true;
        }
        if (!in_array($l, $this->collTunjangans->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddTunjangan($l);
        }

        return $this;
    }

    /**
     * @param	Tunjangan $tunjangan The tunjangan object to add.
     */
    protected function doAddTunjangan($tunjangan)
    {
        $this->collTunjangans[]= $tunjangan;
        $tunjangan->setPtk($this);
    }

    /**
     * @param	Tunjangan $tunjangan The tunjangan object to remove.
     * @return Ptk The current object (for fluent API support)
     */
    public function removeTunjangan($tunjangan)
    {
        if ($this->getTunjangans()->contains($tunjangan)) {
            $this->collTunjangans->remove($this->collTunjangans->search($tunjangan));
            if (null === $this->tunjangansScheduledForDeletion) {
                $this->tunjangansScheduledForDeletion = clone $this->collTunjangans;
                $this->tunjangansScheduledForDeletion->clear();
            }
            $this->tunjangansScheduledForDeletion[]= clone $tunjangan;
            $tunjangan->setPtk(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Ptk is new, it will return
     * an empty collection; or if this Ptk has previously
     * been saved, it will retrieve related Tunjangans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Ptk.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Tunjangan[] List of Tunjangan objects
     */
    public function getTunjangansJoinSemester($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TunjanganQuery::create(null, $criteria);
        $query->joinWith('Semester', $join_behavior);

        return $this->getTunjangans($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Ptk is new, it will return
     * an empty collection; or if this Ptk has previously
     * been saved, it will retrieve related Tunjangans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Ptk.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Tunjangan[] List of Tunjangan objects
     */
    public function getTunjangansJoinJenisTunjangan($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TunjanganQuery::create(null, $criteria);
        $query->joinWith('JenisTunjangan', $join_behavior);

        return $this->getTunjangans($query, $con);
    }

    /**
     * Clears out the collVldPtks collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Ptk The current object (for fluent API support)
     * @see        addVldPtks()
     */
    public function clearVldPtks()
    {
        $this->collVldPtks = null; // important to set this to null since that means it is uninitialized
        $this->collVldPtksPartial = null;

        return $this;
    }

    /**
     * reset is the collVldPtks collection loaded partially
     *
     * @return void
     */
    public function resetPartialVldPtks($v = true)
    {
        $this->collVldPtksPartial = $v;
    }

    /**
     * Initializes the collVldPtks collection.
     *
     * By default this just sets the collVldPtks collection to an empty array (like clearcollVldPtks());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initVldPtks($overrideExisting = true)
    {
        if (null !== $this->collVldPtks && !$overrideExisting) {
            return;
        }
        $this->collVldPtks = new PropelObjectCollection();
        $this->collVldPtks->setModel('VldPtk');
    }

    /**
     * Gets an array of VldPtk objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Ptk is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|VldPtk[] List of VldPtk objects
     * @throws PropelException
     */
    public function getVldPtks($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collVldPtksPartial && !$this->isNew();
        if (null === $this->collVldPtks || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collVldPtks) {
                // return empty collection
                $this->initVldPtks();
            } else {
                $collVldPtks = VldPtkQuery::create(null, $criteria)
                    ->filterByPtk($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collVldPtksPartial && count($collVldPtks)) {
                      $this->initVldPtks(false);

                      foreach($collVldPtks as $obj) {
                        if (false == $this->collVldPtks->contains($obj)) {
                          $this->collVldPtks->append($obj);
                        }
                      }

                      $this->collVldPtksPartial = true;
                    }

                    $collVldPtks->getInternalIterator()->rewind();
                    return $collVldPtks;
                }

                if($partial && $this->collVldPtks) {
                    foreach($this->collVldPtks as $obj) {
                        if($obj->isNew()) {
                            $collVldPtks[] = $obj;
                        }
                    }
                }

                $this->collVldPtks = $collVldPtks;
                $this->collVldPtksPartial = false;
            }
        }

        return $this->collVldPtks;
    }

    /**
     * Sets a collection of VldPtk objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $vldPtks A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Ptk The current object (for fluent API support)
     */
    public function setVldPtks(PropelCollection $vldPtks, PropelPDO $con = null)
    {
        $vldPtksToDelete = $this->getVldPtks(new Criteria(), $con)->diff($vldPtks);

        $this->vldPtksScheduledForDeletion = unserialize(serialize($vldPtksToDelete));

        foreach ($vldPtksToDelete as $vldPtkRemoved) {
            $vldPtkRemoved->setPtk(null);
        }

        $this->collVldPtks = null;
        foreach ($vldPtks as $vldPtk) {
            $this->addVldPtk($vldPtk);
        }

        $this->collVldPtks = $vldPtks;
        $this->collVldPtksPartial = false;

        return $this;
    }

    /**
     * Returns the number of related VldPtk objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related VldPtk objects.
     * @throws PropelException
     */
    public function countVldPtks(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collVldPtksPartial && !$this->isNew();
        if (null === $this->collVldPtks || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collVldPtks) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getVldPtks());
            }
            $query = VldPtkQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPtk($this)
                ->count($con);
        }

        return count($this->collVldPtks);
    }

    /**
     * Method called to associate a VldPtk object to this object
     * through the VldPtk foreign key attribute.
     *
     * @param    VldPtk $l VldPtk
     * @return Ptk The current object (for fluent API support)
     */
    public function addVldPtk(VldPtk $l)
    {
        if ($this->collVldPtks === null) {
            $this->initVldPtks();
            $this->collVldPtksPartial = true;
        }
        if (!in_array($l, $this->collVldPtks->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddVldPtk($l);
        }

        return $this;
    }

    /**
     * @param	VldPtk $vldPtk The vldPtk object to add.
     */
    protected function doAddVldPtk($vldPtk)
    {
        $this->collVldPtks[]= $vldPtk;
        $vldPtk->setPtk($this);
    }

    /**
     * @param	VldPtk $vldPtk The vldPtk object to remove.
     * @return Ptk The current object (for fluent API support)
     */
    public function removeVldPtk($vldPtk)
    {
        if ($this->getVldPtks()->contains($vldPtk)) {
            $this->collVldPtks->remove($this->collVldPtks->search($vldPtk));
            if (null === $this->vldPtksScheduledForDeletion) {
                $this->vldPtksScheduledForDeletion = clone $this->collVldPtks;
                $this->vldPtksScheduledForDeletion->clear();
            }
            $this->vldPtksScheduledForDeletion[]= clone $vldPtk;
            $vldPtk->setPtk(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Ptk is new, it will return
     * an empty collection; or if this Ptk has previously
     * been saved, it will retrieve related VldPtks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Ptk.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|VldPtk[] List of VldPtk objects
     */
    public function getVldPtksJoinErrortype($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = VldPtkQuery::create(null, $criteria);
        $query->joinWith('Errortype', $join_behavior);

        return $this->getVldPtks($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->ptk_id = null;
        $this->nama = null;
        $this->nip = null;
        $this->jenis_kelamin = null;
        $this->tempat_lahir = null;
        $this->tanggal_lahir = null;
        $this->nik = null;
        $this->no_kk = null;
        $this->niy_nigk = null;
        $this->nuptk = null;
        $this->nrg = null;
        $this->nuks = null;
        $this->status_kepegawaian_id = null;
        $this->jenis_ptk_id = null;
        $this->pengawas_bidang_studi_id = null;
        $this->agama_id = null;
        $this->alamat_jalan = null;
        $this->rt = null;
        $this->rw = null;
        $this->nama_dusun = null;
        $this->desa_kelurahan = null;
        $this->kode_wilayah = null;
        $this->kode_pos = null;
        $this->lintang = null;
        $this->bujur = null;
        $this->no_telepon_rumah = null;
        $this->no_hp = null;
        $this->email = null;
        $this->status_keaktifan_id = null;
        $this->sk_cpns = null;
        $this->tgl_cpns = null;
        $this->sk_pengangkatan = null;
        $this->tmt_pengangkatan = null;
        $this->lembaga_pengangkat_id = null;
        $this->pangkat_golongan_id = null;
        $this->keahlian_laboratorium_id = null;
        $this->sumber_gaji_id = null;
        $this->nama_ibu_kandung = null;
        $this->status_perkawinan = null;
        $this->nama_suami_istri = null;
        $this->nip_suami_istri = null;
        $this->pekerjaan_suami_istri = null;
        $this->tmt_pns = null;
        $this->sudah_lisensi_kepala_sekolah = null;
        $this->jumlah_sekolah_binaan = null;
        $this->pernah_diklat_kepengawasan = null;
        $this->nm_wp = null;
        $this->status_data = null;
        $this->karpeg = null;
        $this->karpas = null;
        $this->mampu_handle_kk = null;
        $this->keahlian_braille = null;
        $this->keahlian_bhs_isyarat = null;
        $this->npwp = null;
        $this->kewarganegaraan = null;
        $this->id_bank = null;
        $this->rekening_bank = null;
        $this->rekening_atas_nama = null;
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
            if ($this->collAlats) {
                foreach ($this->collAlats as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collAnaks) {
                foreach ($this->collAnaks as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collAnggotaPanitias) {
                foreach ($this->collAnggotaPanitias as $o) {
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
            if ($this->collBeasiswaPtks) {
                foreach ($this->collBeasiswaPtks as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collBidangSdms) {
                foreach ($this->collBidangSdms as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collBimbingPds) {
                foreach ($this->collBimbingPds as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collBukuPtks) {
                foreach ($this->collBukuPtks as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collDiklats) {
                foreach ($this->collDiklats as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collInpassings) {
                foreach ($this->collInpassings as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collKaryaTuliss) {
                foreach ($this->collKaryaTuliss as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collKesejahteraans) {
                foreach ($this->collKesejahteraans as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collKitasPtks) {
                foreach ($this->collKitasPtks as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collNilaiTests) {
                foreach ($this->collNilaiTests as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collPasporPtks) {
                foreach ($this->collPasporPtks as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collPengawasTerdaftars) {
                foreach ($this->collPengawasTerdaftars as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collPenghargaans) {
                foreach ($this->collPenghargaans as $o) {
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
            if ($this->collRiwayatGajiBerkalas) {
                foreach ($this->collRiwayatGajiBerkalas as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collRombonganBelajars) {
                foreach ($this->collRombonganBelajars as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collRwyFungsionals) {
                foreach ($this->collRwyFungsionals as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collRwyKepangkatans) {
                foreach ($this->collRwyKepangkatans as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collRwyKerjas) {
                foreach ($this->collRwyKerjas as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collRwyPendFormals) {
                foreach ($this->collRwyPendFormals as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collRwySertifikasis) {
                foreach ($this->collRwySertifikasis as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collRwyStrukturals) {
                foreach ($this->collRwyStrukturals as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collTugasTambahans) {
                foreach ($this->collTugasTambahans as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collTunjangans) {
                foreach ($this->collTunjangans as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collVldPtks) {
                foreach ($this->collVldPtks as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aNegara instanceof Persistent) {
              $this->aNegara->clearAllReferences($deep);
            }
            if ($this->aBank instanceof Persistent) {
              $this->aBank->clearAllReferences($deep);
            }
            if ($this->aLargeObject instanceof Persistent) {
              $this->aLargeObject->clearAllReferences($deep);
            }
            if ($this->aJenisPtk instanceof Persistent) {
              $this->aJenisPtk->clearAllReferences($deep);
            }
            if ($this->aMstWilayah instanceof Persistent) {
              $this->aMstWilayah->clearAllReferences($deep);
            }
            if ($this->aKebutuhanKhusus instanceof Persistent) {
              $this->aKebutuhanKhusus->clearAllReferences($deep);
            }
            if ($this->aLembagaPengangkat instanceof Persistent) {
              $this->aLembagaPengangkat->clearAllReferences($deep);
            }
            if ($this->aStatusKeaktifanPegawai instanceof Persistent) {
              $this->aStatusKeaktifanPegawai->clearAllReferences($deep);
            }
            if ($this->aSumberGaji instanceof Persistent) {
              $this->aSumberGaji->clearAllReferences($deep);
            }
            if ($this->aPangkatGolongan instanceof Persistent) {
              $this->aPangkatGolongan->clearAllReferences($deep);
            }
            if ($this->aBidangStudi instanceof Persistent) {
              $this->aBidangStudi->clearAllReferences($deep);
            }
            if ($this->aKeahlianLaboratorium instanceof Persistent) {
              $this->aKeahlianLaboratorium->clearAllReferences($deep);
            }
            if ($this->aPekerjaan instanceof Persistent) {
              $this->aPekerjaan->clearAllReferences($deep);
            }
            if ($this->aAgama instanceof Persistent) {
              $this->aAgama->clearAllReferences($deep);
            }
            if ($this->aStatusKepegawaian instanceof Persistent) {
              $this->aStatusKepegawaian->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collAlats instanceof PropelCollection) {
            $this->collAlats->clearIterator();
        }
        $this->collAlats = null;
        if ($this->collAnaks instanceof PropelCollection) {
            $this->collAnaks->clearIterator();
        }
        $this->collAnaks = null;
        if ($this->collAnggotaPanitias instanceof PropelCollection) {
            $this->collAnggotaPanitias->clearIterator();
        }
        $this->collAnggotaPanitias = null;
        if ($this->collAngkutans instanceof PropelCollection) {
            $this->collAngkutans->clearIterator();
        }
        $this->collAngkutans = null;
        if ($this->collBangunans instanceof PropelCollection) {
            $this->collBangunans->clearIterator();
        }
        $this->collBangunans = null;
        if ($this->collBeasiswaPtks instanceof PropelCollection) {
            $this->collBeasiswaPtks->clearIterator();
        }
        $this->collBeasiswaPtks = null;
        if ($this->collBidangSdms instanceof PropelCollection) {
            $this->collBidangSdms->clearIterator();
        }
        $this->collBidangSdms = null;
        if ($this->collBimbingPds instanceof PropelCollection) {
            $this->collBimbingPds->clearIterator();
        }
        $this->collBimbingPds = null;
        if ($this->collBukuPtks instanceof PropelCollection) {
            $this->collBukuPtks->clearIterator();
        }
        $this->collBukuPtks = null;
        if ($this->collDiklats instanceof PropelCollection) {
            $this->collDiklats->clearIterator();
        }
        $this->collDiklats = null;
        if ($this->collInpassings instanceof PropelCollection) {
            $this->collInpassings->clearIterator();
        }
        $this->collInpassings = null;
        if ($this->collKaryaTuliss instanceof PropelCollection) {
            $this->collKaryaTuliss->clearIterator();
        }
        $this->collKaryaTuliss = null;
        if ($this->collKesejahteraans instanceof PropelCollection) {
            $this->collKesejahteraans->clearIterator();
        }
        $this->collKesejahteraans = null;
        if ($this->collKitasPtks instanceof PropelCollection) {
            $this->collKitasPtks->clearIterator();
        }
        $this->collKitasPtks = null;
        if ($this->collNilaiTests instanceof PropelCollection) {
            $this->collNilaiTests->clearIterator();
        }
        $this->collNilaiTests = null;
        if ($this->collPasporPtks instanceof PropelCollection) {
            $this->collPasporPtks->clearIterator();
        }
        $this->collPasporPtks = null;
        if ($this->collPengawasTerdaftars instanceof PropelCollection) {
            $this->collPengawasTerdaftars->clearIterator();
        }
        $this->collPengawasTerdaftars = null;
        if ($this->collPenghargaans instanceof PropelCollection) {
            $this->collPenghargaans->clearIterator();
        }
        $this->collPenghargaans = null;
        if ($this->collPtkBarus instanceof PropelCollection) {
            $this->collPtkBarus->clearIterator();
        }
        $this->collPtkBarus = null;
        if ($this->collPtkTerdaftars instanceof PropelCollection) {
            $this->collPtkTerdaftars->clearIterator();
        }
        $this->collPtkTerdaftars = null;
        if ($this->collRiwayatGajiBerkalas instanceof PropelCollection) {
            $this->collRiwayatGajiBerkalas->clearIterator();
        }
        $this->collRiwayatGajiBerkalas = null;
        if ($this->collRombonganBelajars instanceof PropelCollection) {
            $this->collRombonganBelajars->clearIterator();
        }
        $this->collRombonganBelajars = null;
        if ($this->collRwyFungsionals instanceof PropelCollection) {
            $this->collRwyFungsionals->clearIterator();
        }
        $this->collRwyFungsionals = null;
        if ($this->collRwyKepangkatans instanceof PropelCollection) {
            $this->collRwyKepangkatans->clearIterator();
        }
        $this->collRwyKepangkatans = null;
        if ($this->collRwyKerjas instanceof PropelCollection) {
            $this->collRwyKerjas->clearIterator();
        }
        $this->collRwyKerjas = null;
        if ($this->collRwyPendFormals instanceof PropelCollection) {
            $this->collRwyPendFormals->clearIterator();
        }
        $this->collRwyPendFormals = null;
        if ($this->collRwySertifikasis instanceof PropelCollection) {
            $this->collRwySertifikasis->clearIterator();
        }
        $this->collRwySertifikasis = null;
        if ($this->collRwyStrukturals instanceof PropelCollection) {
            $this->collRwyStrukturals->clearIterator();
        }
        $this->collRwyStrukturals = null;
        if ($this->collTugasTambahans instanceof PropelCollection) {
            $this->collTugasTambahans->clearIterator();
        }
        $this->collTugasTambahans = null;
        if ($this->collTunjangans instanceof PropelCollection) {
            $this->collTunjangans->clearIterator();
        }
        $this->collTunjangans = null;
        if ($this->collVldPtks instanceof PropelCollection) {
            $this->collVldPtks->clearIterator();
        }
        $this->collVldPtks = null;
        $this->aNegara = null;
        $this->aBank = null;
        $this->aLargeObject = null;
        $this->aJenisPtk = null;
        $this->aMstWilayah = null;
        $this->aKebutuhanKhusus = null;
        $this->aLembagaPengangkat = null;
        $this->aStatusKeaktifanPegawai = null;
        $this->aSumberGaji = null;
        $this->aPangkatGolongan = null;
        $this->aBidangStudi = null;
        $this->aKeahlianLaboratorium = null;
        $this->aPekerjaan = null;
        $this->aAgama = null;
        $this->aStatusKepegawaian = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(PtkPeer::DEFAULT_STRING_FORMAT);
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
