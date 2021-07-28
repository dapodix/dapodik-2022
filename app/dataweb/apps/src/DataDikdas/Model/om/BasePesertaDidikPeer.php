<?php

namespace DataDikdas\Model\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use DataDikdas\Model\AgamaPeer;
use DataDikdas\Model\AlasanLayakPipPeer;
use DataDikdas\Model\AlatTransportasiPeer;
use DataDikdas\Model\BankPeer;
use DataDikdas\Model\JenisTinggalPeer;
use DataDikdas\Model\JenjangPendidikanPeer;
use DataDikdas\Model\KebutuhanKhususPeer;
use DataDikdas\Model\MstWilayahPeer;
use DataDikdas\Model\NegaraPeer;
use DataDikdas\Model\PekerjaanPeer;
use DataDikdas\Model\PenghasilanPeer;
use DataDikdas\Model\PesertaDidik;
use DataDikdas\Model\PesertaDidikPeer;
use DataDikdas\Model\map\PesertaDidikTableMap;

/**
 * Base static class for performing query and update operations on the 'peserta_didik' table.
 *
 * 
 *
 * @package propel.generator.DataDikdas.Model.om
 */
abstract class BasePesertaDidikPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'pendataan';

    /** the table name for this class */
    const TABLE_NAME = 'peserta_didik';

    /** the related Propel class for this table */
    const OM_CLASS = 'DataDikdas\\Model\\PesertaDidik';

    /** the related TableMap class for this table */
    const TM_CLASS = 'PesertaDidikTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 66;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 66;

    /** the column name for the peserta_didik_id field */
    const PESERTA_DIDIK_ID = 'peserta_didik.peserta_didik_id';

    /** the column name for the nama field */
    const NAMA = 'peserta_didik.nama';

    /** the column name for the jenis_kelamin field */
    const JENIS_KELAMIN = 'peserta_didik.jenis_kelamin';

    /** the column name for the nisn field */
    const NISN = 'peserta_didik.nisn';

    /** the column name for the nik field */
    const NIK = 'peserta_didik.nik';

    /** the column name for the no_kk field */
    const NO_KK = 'peserta_didik.no_kk';

    /** the column name for the tempat_lahir field */
    const TEMPAT_LAHIR = 'peserta_didik.tempat_lahir';

    /** the column name for the tanggal_lahir field */
    const TANGGAL_LAHIR = 'peserta_didik.tanggal_lahir';

    /** the column name for the agama_id field */
    const AGAMA_ID = 'peserta_didik.agama_id';

    /** the column name for the kebutuhan_khusus_id field */
    const KEBUTUHAN_KHUSUS_ID = 'peserta_didik.kebutuhan_khusus_id';

    /** the column name for the alamat_jalan field */
    const ALAMAT_JALAN = 'peserta_didik.alamat_jalan';

    /** the column name for the rt field */
    const RT = 'peserta_didik.rt';

    /** the column name for the rw field */
    const RW = 'peserta_didik.rw';

    /** the column name for the nama_dusun field */
    const NAMA_DUSUN = 'peserta_didik.nama_dusun';

    /** the column name for the desa_kelurahan field */
    const DESA_KELURAHAN = 'peserta_didik.desa_kelurahan';

    /** the column name for the kode_wilayah field */
    const KODE_WILAYAH = 'peserta_didik.kode_wilayah';

    /** the column name for the kode_pos field */
    const KODE_POS = 'peserta_didik.kode_pos';

    /** the column name for the lintang field */
    const LINTANG = 'peserta_didik.lintang';

    /** the column name for the bujur field */
    const BUJUR = 'peserta_didik.bujur';

    /** the column name for the jenis_tinggal_id field */
    const JENIS_TINGGAL_ID = 'peserta_didik.jenis_tinggal_id';

    /** the column name for the alat_transportasi_id field */
    const ALAT_TRANSPORTASI_ID = 'peserta_didik.alat_transportasi_id';

    /** the column name for the nik_ayah field */
    const NIK_AYAH = 'peserta_didik.nik_ayah';

    /** the column name for the nik_ibu field */
    const NIK_IBU = 'peserta_didik.nik_ibu';

    /** the column name for the anak_keberapa field */
    const ANAK_KEBERAPA = 'peserta_didik.anak_keberapa';

    /** the column name for the nik_wali field */
    const NIK_WALI = 'peserta_didik.nik_wali';

    /** the column name for the nomor_telepon_rumah field */
    const NOMOR_TELEPON_RUMAH = 'peserta_didik.nomor_telepon_rumah';

    /** the column name for the nomor_telepon_seluler field */
    const NOMOR_TELEPON_SELULER = 'peserta_didik.nomor_telepon_seluler';

    /** the column name for the email field */
    const EMAIL = 'peserta_didik.email';

    /** the column name for the penerima_kps field */
    const PENERIMA_KPS = 'peserta_didik.penerima_kps';

    /** the column name for the no_kps field */
    const NO_KPS = 'peserta_didik.no_kps';

    /** the column name for the layak_pip field */
    const LAYAK_PIP = 'peserta_didik.layak_pip';

    /** the column name for the penerima_kip field */
    const PENERIMA_KIP = 'peserta_didik.penerima_kip';

    /** the column name for the no_kip field */
    const NO_KIP = 'peserta_didik.no_kip';

    /** the column name for the nm_kip field */
    const NM_KIP = 'peserta_didik.nm_kip';

    /** the column name for the no_kks field */
    const NO_KKS = 'peserta_didik.no_kks';

    /** the column name for the reg_akta_lahir field */
    const REG_AKTA_LAHIR = 'peserta_didik.reg_akta_lahir';

    /** the column name for the id_layak_pip field */
    const ID_LAYAK_PIP = 'peserta_didik.id_layak_pip';

    /** the column name for the id_bank field */
    const ID_BANK = 'peserta_didik.id_bank';

    /** the column name for the rekening_bank field */
    const REKENING_BANK = 'peserta_didik.rekening_bank';

    /** the column name for the nama_kcp field */
    const NAMA_KCP = 'peserta_didik.nama_kcp';

    /** the column name for the rekening_atas_nama field */
    const REKENING_ATAS_NAMA = 'peserta_didik.rekening_atas_nama';

    /** the column name for the status_data field */
    const STATUS_DATA = 'peserta_didik.status_data';

    /** the column name for the nama_ayah field */
    const NAMA_AYAH = 'peserta_didik.nama_ayah';

    /** the column name for the tahun_lahir_ayah field */
    const TAHUN_LAHIR_AYAH = 'peserta_didik.tahun_lahir_ayah';

    /** the column name for the jenjang_pendidikan_ayah field */
    const JENJANG_PENDIDIKAN_AYAH = 'peserta_didik.jenjang_pendidikan_ayah';

    /** the column name for the pekerjaan_id_ayah field */
    const PEKERJAAN_ID_AYAH = 'peserta_didik.pekerjaan_id_ayah';

    /** the column name for the penghasilan_id_ayah field */
    const PENGHASILAN_ID_AYAH = 'peserta_didik.penghasilan_id_ayah';

    /** the column name for the kebutuhan_khusus_id_ayah field */
    const KEBUTUHAN_KHUSUS_ID_AYAH = 'peserta_didik.kebutuhan_khusus_id_ayah';

    /** the column name for the nama_ibu_kandung field */
    const NAMA_IBU_KANDUNG = 'peserta_didik.nama_ibu_kandung';

    /** the column name for the tahun_lahir_ibu field */
    const TAHUN_LAHIR_IBU = 'peserta_didik.tahun_lahir_ibu';

    /** the column name for the jenjang_pendidikan_ibu field */
    const JENJANG_PENDIDIKAN_IBU = 'peserta_didik.jenjang_pendidikan_ibu';

    /** the column name for the penghasilan_id_ibu field */
    const PENGHASILAN_ID_IBU = 'peserta_didik.penghasilan_id_ibu';

    /** the column name for the pekerjaan_id_ibu field */
    const PEKERJAAN_ID_IBU = 'peserta_didik.pekerjaan_id_ibu';

    /** the column name for the kebutuhan_khusus_id_ibu field */
    const KEBUTUHAN_KHUSUS_ID_IBU = 'peserta_didik.kebutuhan_khusus_id_ibu';

    /** the column name for the nama_wali field */
    const NAMA_WALI = 'peserta_didik.nama_wali';

    /** the column name for the tahun_lahir_wali field */
    const TAHUN_LAHIR_WALI = 'peserta_didik.tahun_lahir_wali';

    /** the column name for the jenjang_pendidikan_wali field */
    const JENJANG_PENDIDIKAN_WALI = 'peserta_didik.jenjang_pendidikan_wali';

    /** the column name for the pekerjaan_id_wali field */
    const PEKERJAAN_ID_WALI = 'peserta_didik.pekerjaan_id_wali';

    /** the column name for the penghasilan_id_wali field */
    const PENGHASILAN_ID_WALI = 'peserta_didik.penghasilan_id_wali';

    /** the column name for the kewarganegaraan field */
    const KEWARGANEGARAAN = 'peserta_didik.kewarganegaraan';

    /** the column name for the pekerjaan_id field */
    const PEKERJAAN_ID = 'peserta_didik.pekerjaan_id';

    /** the column name for the create_date field */
    const CREATE_DATE = 'peserta_didik.create_date';

    /** the column name for the last_update field */
    const LAST_UPDATE = 'peserta_didik.last_update';

    /** the column name for the soft_delete field */
    const SOFT_DELETE = 'peserta_didik.soft_delete';

    /** the column name for the last_sync field */
    const LAST_SYNC = 'peserta_didik.last_sync';

    /** the column name for the updater_id field */
    const UPDATER_ID = 'peserta_didik.updater_id';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of PesertaDidik objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array PesertaDidik[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. PesertaDidikPeer::$fieldNames[PesertaDidikPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('PesertaDidikId', 'Nama', 'JenisKelamin', 'Nisn', 'Nik', 'NoKk', 'TempatLahir', 'TanggalLahir', 'AgamaId', 'KebutuhanKhususId', 'AlamatJalan', 'Rt', 'Rw', 'NamaDusun', 'DesaKelurahan', 'KodeWilayah', 'KodePos', 'Lintang', 'Bujur', 'JenisTinggalId', 'AlatTransportasiId', 'NikAyah', 'NikIbu', 'AnakKeberapa', 'NikWali', 'NomorTeleponRumah', 'NomorTeleponSeluler', 'Email', 'PenerimaKps', 'NoKps', 'LayakPip', 'PenerimaKip', 'NoKip', 'NmKip', 'NoKks', 'RegAktaLahir', 'IdLayakPip', 'IdBank', 'RekeningBank', 'NamaKcp', 'RekeningAtasNama', 'StatusData', 'NamaAyah', 'TahunLahirAyah', 'JenjangPendidikanAyah', 'PekerjaanIdAyah', 'PenghasilanIdAyah', 'KebutuhanKhususIdAyah', 'NamaIbuKandung', 'TahunLahirIbu', 'JenjangPendidikanIbu', 'PenghasilanIdIbu', 'PekerjaanIdIbu', 'KebutuhanKhususIdIbu', 'NamaWali', 'TahunLahirWali', 'JenjangPendidikanWali', 'PekerjaanIdWali', 'PenghasilanIdWali', 'Kewarganegaraan', 'PekerjaanId', 'CreateDate', 'LastUpdate', 'SoftDelete', 'LastSync', 'UpdaterId', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('pesertaDidikId', 'nama', 'jenisKelamin', 'nisn', 'nik', 'noKk', 'tempatLahir', 'tanggalLahir', 'agamaId', 'kebutuhanKhususId', 'alamatJalan', 'rt', 'rw', 'namaDusun', 'desaKelurahan', 'kodeWilayah', 'kodePos', 'lintang', 'bujur', 'jenisTinggalId', 'alatTransportasiId', 'nikAyah', 'nikIbu', 'anakKeberapa', 'nikWali', 'nomorTeleponRumah', 'nomorTeleponSeluler', 'email', 'penerimaKps', 'noKps', 'layakPip', 'penerimaKip', 'noKip', 'nmKip', 'noKks', 'regAktaLahir', 'idLayakPip', 'idBank', 'rekeningBank', 'namaKcp', 'rekeningAtasNama', 'statusData', 'namaAyah', 'tahunLahirAyah', 'jenjangPendidikanAyah', 'pekerjaanIdAyah', 'penghasilanIdAyah', 'kebutuhanKhususIdAyah', 'namaIbuKandung', 'tahunLahirIbu', 'jenjangPendidikanIbu', 'penghasilanIdIbu', 'pekerjaanIdIbu', 'kebutuhanKhususIdIbu', 'namaWali', 'tahunLahirWali', 'jenjangPendidikanWali', 'pekerjaanIdWali', 'penghasilanIdWali', 'kewarganegaraan', 'pekerjaanId', 'createDate', 'lastUpdate', 'softDelete', 'lastSync', 'updaterId', ),
        BasePeer::TYPE_COLNAME => array (PesertaDidikPeer::PESERTA_DIDIK_ID, PesertaDidikPeer::NAMA, PesertaDidikPeer::JENIS_KELAMIN, PesertaDidikPeer::NISN, PesertaDidikPeer::NIK, PesertaDidikPeer::NO_KK, PesertaDidikPeer::TEMPAT_LAHIR, PesertaDidikPeer::TANGGAL_LAHIR, PesertaDidikPeer::AGAMA_ID, PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID, PesertaDidikPeer::ALAMAT_JALAN, PesertaDidikPeer::RT, PesertaDidikPeer::RW, PesertaDidikPeer::NAMA_DUSUN, PesertaDidikPeer::DESA_KELURAHAN, PesertaDidikPeer::KODE_WILAYAH, PesertaDidikPeer::KODE_POS, PesertaDidikPeer::LINTANG, PesertaDidikPeer::BUJUR, PesertaDidikPeer::JENIS_TINGGAL_ID, PesertaDidikPeer::ALAT_TRANSPORTASI_ID, PesertaDidikPeer::NIK_AYAH, PesertaDidikPeer::NIK_IBU, PesertaDidikPeer::ANAK_KEBERAPA, PesertaDidikPeer::NIK_WALI, PesertaDidikPeer::NOMOR_TELEPON_RUMAH, PesertaDidikPeer::NOMOR_TELEPON_SELULER, PesertaDidikPeer::EMAIL, PesertaDidikPeer::PENERIMA_KPS, PesertaDidikPeer::NO_KPS, PesertaDidikPeer::LAYAK_PIP, PesertaDidikPeer::PENERIMA_KIP, PesertaDidikPeer::NO_KIP, PesertaDidikPeer::NM_KIP, PesertaDidikPeer::NO_KKS, PesertaDidikPeer::REG_AKTA_LAHIR, PesertaDidikPeer::ID_LAYAK_PIP, PesertaDidikPeer::ID_BANK, PesertaDidikPeer::REKENING_BANK, PesertaDidikPeer::NAMA_KCP, PesertaDidikPeer::REKENING_ATAS_NAMA, PesertaDidikPeer::STATUS_DATA, PesertaDidikPeer::NAMA_AYAH, PesertaDidikPeer::TAHUN_LAHIR_AYAH, PesertaDidikPeer::JENJANG_PENDIDIKAN_AYAH, PesertaDidikPeer::PEKERJAAN_ID_AYAH, PesertaDidikPeer::PENGHASILAN_ID_AYAH, PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID_AYAH, PesertaDidikPeer::NAMA_IBU_KANDUNG, PesertaDidikPeer::TAHUN_LAHIR_IBU, PesertaDidikPeer::JENJANG_PENDIDIKAN_IBU, PesertaDidikPeer::PENGHASILAN_ID_IBU, PesertaDidikPeer::PEKERJAAN_ID_IBU, PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID_IBU, PesertaDidikPeer::NAMA_WALI, PesertaDidikPeer::TAHUN_LAHIR_WALI, PesertaDidikPeer::JENJANG_PENDIDIKAN_WALI, PesertaDidikPeer::PEKERJAAN_ID_WALI, PesertaDidikPeer::PENGHASILAN_ID_WALI, PesertaDidikPeer::KEWARGANEGARAAN, PesertaDidikPeer::PEKERJAAN_ID, PesertaDidikPeer::CREATE_DATE, PesertaDidikPeer::LAST_UPDATE, PesertaDidikPeer::SOFT_DELETE, PesertaDidikPeer::LAST_SYNC, PesertaDidikPeer::UPDATER_ID, ),
        BasePeer::TYPE_RAW_COLNAME => array ('PESERTA_DIDIK_ID', 'NAMA', 'JENIS_KELAMIN', 'NISN', 'NIK', 'NO_KK', 'TEMPAT_LAHIR', 'TANGGAL_LAHIR', 'AGAMA_ID', 'KEBUTUHAN_KHUSUS_ID', 'ALAMAT_JALAN', 'RT', 'RW', 'NAMA_DUSUN', 'DESA_KELURAHAN', 'KODE_WILAYAH', 'KODE_POS', 'LINTANG', 'BUJUR', 'JENIS_TINGGAL_ID', 'ALAT_TRANSPORTASI_ID', 'NIK_AYAH', 'NIK_IBU', 'ANAK_KEBERAPA', 'NIK_WALI', 'NOMOR_TELEPON_RUMAH', 'NOMOR_TELEPON_SELULER', 'EMAIL', 'PENERIMA_KPS', 'NO_KPS', 'LAYAK_PIP', 'PENERIMA_KIP', 'NO_KIP', 'NM_KIP', 'NO_KKS', 'REG_AKTA_LAHIR', 'ID_LAYAK_PIP', 'ID_BANK', 'REKENING_BANK', 'NAMA_KCP', 'REKENING_ATAS_NAMA', 'STATUS_DATA', 'NAMA_AYAH', 'TAHUN_LAHIR_AYAH', 'JENJANG_PENDIDIKAN_AYAH', 'PEKERJAAN_ID_AYAH', 'PENGHASILAN_ID_AYAH', 'KEBUTUHAN_KHUSUS_ID_AYAH', 'NAMA_IBU_KANDUNG', 'TAHUN_LAHIR_IBU', 'JENJANG_PENDIDIKAN_IBU', 'PENGHASILAN_ID_IBU', 'PEKERJAAN_ID_IBU', 'KEBUTUHAN_KHUSUS_ID_IBU', 'NAMA_WALI', 'TAHUN_LAHIR_WALI', 'JENJANG_PENDIDIKAN_WALI', 'PEKERJAAN_ID_WALI', 'PENGHASILAN_ID_WALI', 'KEWARGANEGARAAN', 'PEKERJAAN_ID', 'CREATE_DATE', 'LAST_UPDATE', 'SOFT_DELETE', 'LAST_SYNC', 'UPDATER_ID', ),
        BasePeer::TYPE_FIELDNAME => array ('peserta_didik_id', 'nama', 'jenis_kelamin', 'nisn', 'nik', 'no_kk', 'tempat_lahir', 'tanggal_lahir', 'agama_id', 'kebutuhan_khusus_id', 'alamat_jalan', 'rt', 'rw', 'nama_dusun', 'desa_kelurahan', 'kode_wilayah', 'kode_pos', 'lintang', 'bujur', 'jenis_tinggal_id', 'alat_transportasi_id', 'nik_ayah', 'nik_ibu', 'anak_keberapa', 'nik_wali', 'nomor_telepon_rumah', 'nomor_telepon_seluler', 'email', 'penerima_kps', 'no_kps', 'layak_pip', 'penerima_kip', 'no_kip', 'nm_kip', 'no_kks', 'reg_akta_lahir', 'id_layak_pip', 'id_bank', 'rekening_bank', 'nama_kcp', 'rekening_atas_nama', 'status_data', 'nama_ayah', 'tahun_lahir_ayah', 'jenjang_pendidikan_ayah', 'pekerjaan_id_ayah', 'penghasilan_id_ayah', 'kebutuhan_khusus_id_ayah', 'nama_ibu_kandung', 'tahun_lahir_ibu', 'jenjang_pendidikan_ibu', 'penghasilan_id_ibu', 'pekerjaan_id_ibu', 'kebutuhan_khusus_id_ibu', 'nama_wali', 'tahun_lahir_wali', 'jenjang_pendidikan_wali', 'pekerjaan_id_wali', 'penghasilan_id_wali', 'kewarganegaraan', 'pekerjaan_id', 'create_date', 'last_update', 'soft_delete', 'last_sync', 'updater_id', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, 62, 63, 64, 65, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. PesertaDidikPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('PesertaDidikId' => 0, 'Nama' => 1, 'JenisKelamin' => 2, 'Nisn' => 3, 'Nik' => 4, 'NoKk' => 5, 'TempatLahir' => 6, 'TanggalLahir' => 7, 'AgamaId' => 8, 'KebutuhanKhususId' => 9, 'AlamatJalan' => 10, 'Rt' => 11, 'Rw' => 12, 'NamaDusun' => 13, 'DesaKelurahan' => 14, 'KodeWilayah' => 15, 'KodePos' => 16, 'Lintang' => 17, 'Bujur' => 18, 'JenisTinggalId' => 19, 'AlatTransportasiId' => 20, 'NikAyah' => 21, 'NikIbu' => 22, 'AnakKeberapa' => 23, 'NikWali' => 24, 'NomorTeleponRumah' => 25, 'NomorTeleponSeluler' => 26, 'Email' => 27, 'PenerimaKps' => 28, 'NoKps' => 29, 'LayakPip' => 30, 'PenerimaKip' => 31, 'NoKip' => 32, 'NmKip' => 33, 'NoKks' => 34, 'RegAktaLahir' => 35, 'IdLayakPip' => 36, 'IdBank' => 37, 'RekeningBank' => 38, 'NamaKcp' => 39, 'RekeningAtasNama' => 40, 'StatusData' => 41, 'NamaAyah' => 42, 'TahunLahirAyah' => 43, 'JenjangPendidikanAyah' => 44, 'PekerjaanIdAyah' => 45, 'PenghasilanIdAyah' => 46, 'KebutuhanKhususIdAyah' => 47, 'NamaIbuKandung' => 48, 'TahunLahirIbu' => 49, 'JenjangPendidikanIbu' => 50, 'PenghasilanIdIbu' => 51, 'PekerjaanIdIbu' => 52, 'KebutuhanKhususIdIbu' => 53, 'NamaWali' => 54, 'TahunLahirWali' => 55, 'JenjangPendidikanWali' => 56, 'PekerjaanIdWali' => 57, 'PenghasilanIdWali' => 58, 'Kewarganegaraan' => 59, 'PekerjaanId' => 60, 'CreateDate' => 61, 'LastUpdate' => 62, 'SoftDelete' => 63, 'LastSync' => 64, 'UpdaterId' => 65, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('pesertaDidikId' => 0, 'nama' => 1, 'jenisKelamin' => 2, 'nisn' => 3, 'nik' => 4, 'noKk' => 5, 'tempatLahir' => 6, 'tanggalLahir' => 7, 'agamaId' => 8, 'kebutuhanKhususId' => 9, 'alamatJalan' => 10, 'rt' => 11, 'rw' => 12, 'namaDusun' => 13, 'desaKelurahan' => 14, 'kodeWilayah' => 15, 'kodePos' => 16, 'lintang' => 17, 'bujur' => 18, 'jenisTinggalId' => 19, 'alatTransportasiId' => 20, 'nikAyah' => 21, 'nikIbu' => 22, 'anakKeberapa' => 23, 'nikWali' => 24, 'nomorTeleponRumah' => 25, 'nomorTeleponSeluler' => 26, 'email' => 27, 'penerimaKps' => 28, 'noKps' => 29, 'layakPip' => 30, 'penerimaKip' => 31, 'noKip' => 32, 'nmKip' => 33, 'noKks' => 34, 'regAktaLahir' => 35, 'idLayakPip' => 36, 'idBank' => 37, 'rekeningBank' => 38, 'namaKcp' => 39, 'rekeningAtasNama' => 40, 'statusData' => 41, 'namaAyah' => 42, 'tahunLahirAyah' => 43, 'jenjangPendidikanAyah' => 44, 'pekerjaanIdAyah' => 45, 'penghasilanIdAyah' => 46, 'kebutuhanKhususIdAyah' => 47, 'namaIbuKandung' => 48, 'tahunLahirIbu' => 49, 'jenjangPendidikanIbu' => 50, 'penghasilanIdIbu' => 51, 'pekerjaanIdIbu' => 52, 'kebutuhanKhususIdIbu' => 53, 'namaWali' => 54, 'tahunLahirWali' => 55, 'jenjangPendidikanWali' => 56, 'pekerjaanIdWali' => 57, 'penghasilanIdWali' => 58, 'kewarganegaraan' => 59, 'pekerjaanId' => 60, 'createDate' => 61, 'lastUpdate' => 62, 'softDelete' => 63, 'lastSync' => 64, 'updaterId' => 65, ),
        BasePeer::TYPE_COLNAME => array (PesertaDidikPeer::PESERTA_DIDIK_ID => 0, PesertaDidikPeer::NAMA => 1, PesertaDidikPeer::JENIS_KELAMIN => 2, PesertaDidikPeer::NISN => 3, PesertaDidikPeer::NIK => 4, PesertaDidikPeer::NO_KK => 5, PesertaDidikPeer::TEMPAT_LAHIR => 6, PesertaDidikPeer::TANGGAL_LAHIR => 7, PesertaDidikPeer::AGAMA_ID => 8, PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID => 9, PesertaDidikPeer::ALAMAT_JALAN => 10, PesertaDidikPeer::RT => 11, PesertaDidikPeer::RW => 12, PesertaDidikPeer::NAMA_DUSUN => 13, PesertaDidikPeer::DESA_KELURAHAN => 14, PesertaDidikPeer::KODE_WILAYAH => 15, PesertaDidikPeer::KODE_POS => 16, PesertaDidikPeer::LINTANG => 17, PesertaDidikPeer::BUJUR => 18, PesertaDidikPeer::JENIS_TINGGAL_ID => 19, PesertaDidikPeer::ALAT_TRANSPORTASI_ID => 20, PesertaDidikPeer::NIK_AYAH => 21, PesertaDidikPeer::NIK_IBU => 22, PesertaDidikPeer::ANAK_KEBERAPA => 23, PesertaDidikPeer::NIK_WALI => 24, PesertaDidikPeer::NOMOR_TELEPON_RUMAH => 25, PesertaDidikPeer::NOMOR_TELEPON_SELULER => 26, PesertaDidikPeer::EMAIL => 27, PesertaDidikPeer::PENERIMA_KPS => 28, PesertaDidikPeer::NO_KPS => 29, PesertaDidikPeer::LAYAK_PIP => 30, PesertaDidikPeer::PENERIMA_KIP => 31, PesertaDidikPeer::NO_KIP => 32, PesertaDidikPeer::NM_KIP => 33, PesertaDidikPeer::NO_KKS => 34, PesertaDidikPeer::REG_AKTA_LAHIR => 35, PesertaDidikPeer::ID_LAYAK_PIP => 36, PesertaDidikPeer::ID_BANK => 37, PesertaDidikPeer::REKENING_BANK => 38, PesertaDidikPeer::NAMA_KCP => 39, PesertaDidikPeer::REKENING_ATAS_NAMA => 40, PesertaDidikPeer::STATUS_DATA => 41, PesertaDidikPeer::NAMA_AYAH => 42, PesertaDidikPeer::TAHUN_LAHIR_AYAH => 43, PesertaDidikPeer::JENJANG_PENDIDIKAN_AYAH => 44, PesertaDidikPeer::PEKERJAAN_ID_AYAH => 45, PesertaDidikPeer::PENGHASILAN_ID_AYAH => 46, PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID_AYAH => 47, PesertaDidikPeer::NAMA_IBU_KANDUNG => 48, PesertaDidikPeer::TAHUN_LAHIR_IBU => 49, PesertaDidikPeer::JENJANG_PENDIDIKAN_IBU => 50, PesertaDidikPeer::PENGHASILAN_ID_IBU => 51, PesertaDidikPeer::PEKERJAAN_ID_IBU => 52, PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID_IBU => 53, PesertaDidikPeer::NAMA_WALI => 54, PesertaDidikPeer::TAHUN_LAHIR_WALI => 55, PesertaDidikPeer::JENJANG_PENDIDIKAN_WALI => 56, PesertaDidikPeer::PEKERJAAN_ID_WALI => 57, PesertaDidikPeer::PENGHASILAN_ID_WALI => 58, PesertaDidikPeer::KEWARGANEGARAAN => 59, PesertaDidikPeer::PEKERJAAN_ID => 60, PesertaDidikPeer::CREATE_DATE => 61, PesertaDidikPeer::LAST_UPDATE => 62, PesertaDidikPeer::SOFT_DELETE => 63, PesertaDidikPeer::LAST_SYNC => 64, PesertaDidikPeer::UPDATER_ID => 65, ),
        BasePeer::TYPE_RAW_COLNAME => array ('PESERTA_DIDIK_ID' => 0, 'NAMA' => 1, 'JENIS_KELAMIN' => 2, 'NISN' => 3, 'NIK' => 4, 'NO_KK' => 5, 'TEMPAT_LAHIR' => 6, 'TANGGAL_LAHIR' => 7, 'AGAMA_ID' => 8, 'KEBUTUHAN_KHUSUS_ID' => 9, 'ALAMAT_JALAN' => 10, 'RT' => 11, 'RW' => 12, 'NAMA_DUSUN' => 13, 'DESA_KELURAHAN' => 14, 'KODE_WILAYAH' => 15, 'KODE_POS' => 16, 'LINTANG' => 17, 'BUJUR' => 18, 'JENIS_TINGGAL_ID' => 19, 'ALAT_TRANSPORTASI_ID' => 20, 'NIK_AYAH' => 21, 'NIK_IBU' => 22, 'ANAK_KEBERAPA' => 23, 'NIK_WALI' => 24, 'NOMOR_TELEPON_RUMAH' => 25, 'NOMOR_TELEPON_SELULER' => 26, 'EMAIL' => 27, 'PENERIMA_KPS' => 28, 'NO_KPS' => 29, 'LAYAK_PIP' => 30, 'PENERIMA_KIP' => 31, 'NO_KIP' => 32, 'NM_KIP' => 33, 'NO_KKS' => 34, 'REG_AKTA_LAHIR' => 35, 'ID_LAYAK_PIP' => 36, 'ID_BANK' => 37, 'REKENING_BANK' => 38, 'NAMA_KCP' => 39, 'REKENING_ATAS_NAMA' => 40, 'STATUS_DATA' => 41, 'NAMA_AYAH' => 42, 'TAHUN_LAHIR_AYAH' => 43, 'JENJANG_PENDIDIKAN_AYAH' => 44, 'PEKERJAAN_ID_AYAH' => 45, 'PENGHASILAN_ID_AYAH' => 46, 'KEBUTUHAN_KHUSUS_ID_AYAH' => 47, 'NAMA_IBU_KANDUNG' => 48, 'TAHUN_LAHIR_IBU' => 49, 'JENJANG_PENDIDIKAN_IBU' => 50, 'PENGHASILAN_ID_IBU' => 51, 'PEKERJAAN_ID_IBU' => 52, 'KEBUTUHAN_KHUSUS_ID_IBU' => 53, 'NAMA_WALI' => 54, 'TAHUN_LAHIR_WALI' => 55, 'JENJANG_PENDIDIKAN_WALI' => 56, 'PEKERJAAN_ID_WALI' => 57, 'PENGHASILAN_ID_WALI' => 58, 'KEWARGANEGARAAN' => 59, 'PEKERJAAN_ID' => 60, 'CREATE_DATE' => 61, 'LAST_UPDATE' => 62, 'SOFT_DELETE' => 63, 'LAST_SYNC' => 64, 'UPDATER_ID' => 65, ),
        BasePeer::TYPE_FIELDNAME => array ('peserta_didik_id' => 0, 'nama' => 1, 'jenis_kelamin' => 2, 'nisn' => 3, 'nik' => 4, 'no_kk' => 5, 'tempat_lahir' => 6, 'tanggal_lahir' => 7, 'agama_id' => 8, 'kebutuhan_khusus_id' => 9, 'alamat_jalan' => 10, 'rt' => 11, 'rw' => 12, 'nama_dusun' => 13, 'desa_kelurahan' => 14, 'kode_wilayah' => 15, 'kode_pos' => 16, 'lintang' => 17, 'bujur' => 18, 'jenis_tinggal_id' => 19, 'alat_transportasi_id' => 20, 'nik_ayah' => 21, 'nik_ibu' => 22, 'anak_keberapa' => 23, 'nik_wali' => 24, 'nomor_telepon_rumah' => 25, 'nomor_telepon_seluler' => 26, 'email' => 27, 'penerima_kps' => 28, 'no_kps' => 29, 'layak_pip' => 30, 'penerima_kip' => 31, 'no_kip' => 32, 'nm_kip' => 33, 'no_kks' => 34, 'reg_akta_lahir' => 35, 'id_layak_pip' => 36, 'id_bank' => 37, 'rekening_bank' => 38, 'nama_kcp' => 39, 'rekening_atas_nama' => 40, 'status_data' => 41, 'nama_ayah' => 42, 'tahun_lahir_ayah' => 43, 'jenjang_pendidikan_ayah' => 44, 'pekerjaan_id_ayah' => 45, 'penghasilan_id_ayah' => 46, 'kebutuhan_khusus_id_ayah' => 47, 'nama_ibu_kandung' => 48, 'tahun_lahir_ibu' => 49, 'jenjang_pendidikan_ibu' => 50, 'penghasilan_id_ibu' => 51, 'pekerjaan_id_ibu' => 52, 'kebutuhan_khusus_id_ibu' => 53, 'nama_wali' => 54, 'tahun_lahir_wali' => 55, 'jenjang_pendidikan_wali' => 56, 'pekerjaan_id_wali' => 57, 'penghasilan_id_wali' => 58, 'kewarganegaraan' => 59, 'pekerjaan_id' => 60, 'create_date' => 61, 'last_update' => 62, 'soft_delete' => 63, 'last_sync' => 64, 'updater_id' => 65, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, 62, 63, 64, 65, )
    );

    /**
     * Translates a fieldname to another type
     *
     * @param      string $name field name
     * @param      string $fromType One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                         BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
     * @param      string $toType   One of the class type constants
     * @return string          translated name of the field.
     * @throws PropelException - if the specified name could not be found in the fieldname mappings.
     */
    public static function translateFieldName($name, $fromType, $toType)
    {
        $toNames = PesertaDidikPeer::getFieldNames($toType);
        $key = isset(PesertaDidikPeer::$fieldKeys[$fromType][$name]) ? PesertaDidikPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(PesertaDidikPeer::$fieldKeys[$fromType], true));
        }

        return $toNames[$key];
    }

    /**
     * Returns an array of field names.
     *
     * @param      string $type The type of fieldnames to return:
     *                      One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                      BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
     * @return array           A list of field names
     * @throws PropelException - if the type is not valid.
     */
    public static function getFieldNames($type = BasePeer::TYPE_PHPNAME)
    {
        if (!array_key_exists($type, PesertaDidikPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return PesertaDidikPeer::$fieldNames[$type];
    }

    /**
     * Convenience method which changes table.column to alias.column.
     *
     * Using this method you can maintain SQL abstraction while using column aliases.
     * <code>
     *		$c->addAlias("alias1", TablePeer::TABLE_NAME);
     *		$c->addJoin(TablePeer::alias("alias1", TablePeer::PRIMARY_KEY_COLUMN), TablePeer::PRIMARY_KEY_COLUMN);
     * </code>
     * @param      string $alias The alias for the current table.
     * @param      string $column The column name for current table. (i.e. PesertaDidikPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(PesertaDidikPeer::TABLE_NAME.'.', $alias.'.', $column);
    }

    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param      Criteria $criteria object containing the columns to add.
     * @param      string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(PesertaDidikPeer::PESERTA_DIDIK_ID);
            $criteria->addSelectColumn(PesertaDidikPeer::NAMA);
            $criteria->addSelectColumn(PesertaDidikPeer::JENIS_KELAMIN);
            $criteria->addSelectColumn(PesertaDidikPeer::NISN);
            $criteria->addSelectColumn(PesertaDidikPeer::NIK);
            $criteria->addSelectColumn(PesertaDidikPeer::NO_KK);
            $criteria->addSelectColumn(PesertaDidikPeer::TEMPAT_LAHIR);
            $criteria->addSelectColumn(PesertaDidikPeer::TANGGAL_LAHIR);
            $criteria->addSelectColumn(PesertaDidikPeer::AGAMA_ID);
            $criteria->addSelectColumn(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID);
            $criteria->addSelectColumn(PesertaDidikPeer::ALAMAT_JALAN);
            $criteria->addSelectColumn(PesertaDidikPeer::RT);
            $criteria->addSelectColumn(PesertaDidikPeer::RW);
            $criteria->addSelectColumn(PesertaDidikPeer::NAMA_DUSUN);
            $criteria->addSelectColumn(PesertaDidikPeer::DESA_KELURAHAN);
            $criteria->addSelectColumn(PesertaDidikPeer::KODE_WILAYAH);
            $criteria->addSelectColumn(PesertaDidikPeer::KODE_POS);
            $criteria->addSelectColumn(PesertaDidikPeer::LINTANG);
            $criteria->addSelectColumn(PesertaDidikPeer::BUJUR);
            $criteria->addSelectColumn(PesertaDidikPeer::JENIS_TINGGAL_ID);
            $criteria->addSelectColumn(PesertaDidikPeer::ALAT_TRANSPORTASI_ID);
            $criteria->addSelectColumn(PesertaDidikPeer::NIK_AYAH);
            $criteria->addSelectColumn(PesertaDidikPeer::NIK_IBU);
            $criteria->addSelectColumn(PesertaDidikPeer::ANAK_KEBERAPA);
            $criteria->addSelectColumn(PesertaDidikPeer::NIK_WALI);
            $criteria->addSelectColumn(PesertaDidikPeer::NOMOR_TELEPON_RUMAH);
            $criteria->addSelectColumn(PesertaDidikPeer::NOMOR_TELEPON_SELULER);
            $criteria->addSelectColumn(PesertaDidikPeer::EMAIL);
            $criteria->addSelectColumn(PesertaDidikPeer::PENERIMA_KPS);
            $criteria->addSelectColumn(PesertaDidikPeer::NO_KPS);
            $criteria->addSelectColumn(PesertaDidikPeer::LAYAK_PIP);
            $criteria->addSelectColumn(PesertaDidikPeer::PENERIMA_KIP);
            $criteria->addSelectColumn(PesertaDidikPeer::NO_KIP);
            $criteria->addSelectColumn(PesertaDidikPeer::NM_KIP);
            $criteria->addSelectColumn(PesertaDidikPeer::NO_KKS);
            $criteria->addSelectColumn(PesertaDidikPeer::REG_AKTA_LAHIR);
            $criteria->addSelectColumn(PesertaDidikPeer::ID_LAYAK_PIP);
            $criteria->addSelectColumn(PesertaDidikPeer::ID_BANK);
            $criteria->addSelectColumn(PesertaDidikPeer::REKENING_BANK);
            $criteria->addSelectColumn(PesertaDidikPeer::NAMA_KCP);
            $criteria->addSelectColumn(PesertaDidikPeer::REKENING_ATAS_NAMA);
            $criteria->addSelectColumn(PesertaDidikPeer::STATUS_DATA);
            $criteria->addSelectColumn(PesertaDidikPeer::NAMA_AYAH);
            $criteria->addSelectColumn(PesertaDidikPeer::TAHUN_LAHIR_AYAH);
            $criteria->addSelectColumn(PesertaDidikPeer::JENJANG_PENDIDIKAN_AYAH);
            $criteria->addSelectColumn(PesertaDidikPeer::PEKERJAAN_ID_AYAH);
            $criteria->addSelectColumn(PesertaDidikPeer::PENGHASILAN_ID_AYAH);
            $criteria->addSelectColumn(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID_AYAH);
            $criteria->addSelectColumn(PesertaDidikPeer::NAMA_IBU_KANDUNG);
            $criteria->addSelectColumn(PesertaDidikPeer::TAHUN_LAHIR_IBU);
            $criteria->addSelectColumn(PesertaDidikPeer::JENJANG_PENDIDIKAN_IBU);
            $criteria->addSelectColumn(PesertaDidikPeer::PENGHASILAN_ID_IBU);
            $criteria->addSelectColumn(PesertaDidikPeer::PEKERJAAN_ID_IBU);
            $criteria->addSelectColumn(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID_IBU);
            $criteria->addSelectColumn(PesertaDidikPeer::NAMA_WALI);
            $criteria->addSelectColumn(PesertaDidikPeer::TAHUN_LAHIR_WALI);
            $criteria->addSelectColumn(PesertaDidikPeer::JENJANG_PENDIDIKAN_WALI);
            $criteria->addSelectColumn(PesertaDidikPeer::PEKERJAAN_ID_WALI);
            $criteria->addSelectColumn(PesertaDidikPeer::PENGHASILAN_ID_WALI);
            $criteria->addSelectColumn(PesertaDidikPeer::KEWARGANEGARAAN);
            $criteria->addSelectColumn(PesertaDidikPeer::PEKERJAAN_ID);
            $criteria->addSelectColumn(PesertaDidikPeer::CREATE_DATE);
            $criteria->addSelectColumn(PesertaDidikPeer::LAST_UPDATE);
            $criteria->addSelectColumn(PesertaDidikPeer::SOFT_DELETE);
            $criteria->addSelectColumn(PesertaDidikPeer::LAST_SYNC);
            $criteria->addSelectColumn(PesertaDidikPeer::UPDATER_ID);
        } else {
            $criteria->addSelectColumn($alias . '.peserta_didik_id');
            $criteria->addSelectColumn($alias . '.nama');
            $criteria->addSelectColumn($alias . '.jenis_kelamin');
            $criteria->addSelectColumn($alias . '.nisn');
            $criteria->addSelectColumn($alias . '.nik');
            $criteria->addSelectColumn($alias . '.no_kk');
            $criteria->addSelectColumn($alias . '.tempat_lahir');
            $criteria->addSelectColumn($alias . '.tanggal_lahir');
            $criteria->addSelectColumn($alias . '.agama_id');
            $criteria->addSelectColumn($alias . '.kebutuhan_khusus_id');
            $criteria->addSelectColumn($alias . '.alamat_jalan');
            $criteria->addSelectColumn($alias . '.rt');
            $criteria->addSelectColumn($alias . '.rw');
            $criteria->addSelectColumn($alias . '.nama_dusun');
            $criteria->addSelectColumn($alias . '.desa_kelurahan');
            $criteria->addSelectColumn($alias . '.kode_wilayah');
            $criteria->addSelectColumn($alias . '.kode_pos');
            $criteria->addSelectColumn($alias . '.lintang');
            $criteria->addSelectColumn($alias . '.bujur');
            $criteria->addSelectColumn($alias . '.jenis_tinggal_id');
            $criteria->addSelectColumn($alias . '.alat_transportasi_id');
            $criteria->addSelectColumn($alias . '.nik_ayah');
            $criteria->addSelectColumn($alias . '.nik_ibu');
            $criteria->addSelectColumn($alias . '.anak_keberapa');
            $criteria->addSelectColumn($alias . '.nik_wali');
            $criteria->addSelectColumn($alias . '.nomor_telepon_rumah');
            $criteria->addSelectColumn($alias . '.nomor_telepon_seluler');
            $criteria->addSelectColumn($alias . '.email');
            $criteria->addSelectColumn($alias . '.penerima_kps');
            $criteria->addSelectColumn($alias . '.no_kps');
            $criteria->addSelectColumn($alias . '.layak_pip');
            $criteria->addSelectColumn($alias . '.penerima_kip');
            $criteria->addSelectColumn($alias . '.no_kip');
            $criteria->addSelectColumn($alias . '.nm_kip');
            $criteria->addSelectColumn($alias . '.no_kks');
            $criteria->addSelectColumn($alias . '.reg_akta_lahir');
            $criteria->addSelectColumn($alias . '.id_layak_pip');
            $criteria->addSelectColumn($alias . '.id_bank');
            $criteria->addSelectColumn($alias . '.rekening_bank');
            $criteria->addSelectColumn($alias . '.nama_kcp');
            $criteria->addSelectColumn($alias . '.rekening_atas_nama');
            $criteria->addSelectColumn($alias . '.status_data');
            $criteria->addSelectColumn($alias . '.nama_ayah');
            $criteria->addSelectColumn($alias . '.tahun_lahir_ayah');
            $criteria->addSelectColumn($alias . '.jenjang_pendidikan_ayah');
            $criteria->addSelectColumn($alias . '.pekerjaan_id_ayah');
            $criteria->addSelectColumn($alias . '.penghasilan_id_ayah');
            $criteria->addSelectColumn($alias . '.kebutuhan_khusus_id_ayah');
            $criteria->addSelectColumn($alias . '.nama_ibu_kandung');
            $criteria->addSelectColumn($alias . '.tahun_lahir_ibu');
            $criteria->addSelectColumn($alias . '.jenjang_pendidikan_ibu');
            $criteria->addSelectColumn($alias . '.penghasilan_id_ibu');
            $criteria->addSelectColumn($alias . '.pekerjaan_id_ibu');
            $criteria->addSelectColumn($alias . '.kebutuhan_khusus_id_ibu');
            $criteria->addSelectColumn($alias . '.nama_wali');
            $criteria->addSelectColumn($alias . '.tahun_lahir_wali');
            $criteria->addSelectColumn($alias . '.jenjang_pendidikan_wali');
            $criteria->addSelectColumn($alias . '.pekerjaan_id_wali');
            $criteria->addSelectColumn($alias . '.penghasilan_id_wali');
            $criteria->addSelectColumn($alias . '.kewarganegaraan');
            $criteria->addSelectColumn($alias . '.pekerjaan_id');
            $criteria->addSelectColumn($alias . '.create_date');
            $criteria->addSelectColumn($alias . '.last_update');
            $criteria->addSelectColumn($alias . '.soft_delete');
            $criteria->addSelectColumn($alias . '.last_sync');
            $criteria->addSelectColumn($alias . '.updater_id');
        }
    }

    /**
     * Returns the number of rows matching criteria.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @return int Number of matching rows.
     */
    public static function doCount(Criteria $criteria, $distinct = false, PropelPDO $con = null)
    {
        // we may modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(PesertaDidikPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PesertaDidikPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(PesertaDidikPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(PesertaDidikPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
        // BasePeer returns a PDOStatement
        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }
    /**
     * Selects one object from the DB.
     *
     * @param      Criteria $criteria object used to create the SELECT statement.
     * @param      PropelPDO $con
     * @return                 PesertaDidik
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = PesertaDidikPeer::doSelect($critcopy, $con);
        if ($objects) {
            return $objects[0];
        }

        return null;
    }
    /**
     * Selects several row from the DB.
     *
     * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
     * @param      PropelPDO $con
     * @return array           Array of selected Objects
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelect(Criteria $criteria, PropelPDO $con = null)
    {
        return PesertaDidikPeer::populateObjects(PesertaDidikPeer::doSelectStmt($criteria, $con));
    }
    /**
     * Prepares the Criteria object and uses the parent doSelect() method to execute a PDOStatement.
     *
     * Use this method directly if you want to work with an executed statement directly (for example
     * to perform your own object hydration).
     *
     * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
     * @param      PropelPDO $con The connection to use
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     * @return PDOStatement The executed PDOStatement object.
     * @see        BasePeer::doSelect()
     */
    public static function doSelectStmt(Criteria $criteria, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(PesertaDidikPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            PesertaDidikPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(PesertaDidikPeer::DATABASE_NAME);

        // BasePeer returns a PDOStatement
        return BasePeer::doSelect($criteria, $con);
    }
    /**
     * Adds an object to the instance pool.
     *
     * Propel keeps cached copies of objects in an instance pool when they are retrieved
     * from the database.  In some cases -- especially when you override doSelect*()
     * methods in your stub classes -- you may need to explicitly add objects
     * to the cache in order to ensure that the same objects are always returned by doSelect*()
     * and retrieveByPK*() calls.
     *
     * @param      PesertaDidik $obj A PesertaDidik object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getPesertaDidikId();
            } // if key === null
            PesertaDidikPeer::$instances[$key] = $obj;
        }
    }

    /**
     * Removes an object from the instance pool.
     *
     * Propel keeps cached copies of objects in an instance pool when they are retrieved
     * from the database.  In some cases -- especially when you override doDelete
     * methods in your stub classes -- you may need to explicitly remove objects
     * from the cache in order to prevent returning objects that no longer exist.
     *
     * @param      mixed $value A PesertaDidik object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof PesertaDidik) {
                $key = (string) $value->getPesertaDidikId();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or PesertaDidik object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(PesertaDidikPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   PesertaDidik Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(PesertaDidikPeer::$instances[$key])) {
                return PesertaDidikPeer::$instances[$key];
            }
        }

        return null; // just to be explicit
    }
    
    /**
     * Clear the instance pool.
     *
     * @return void
     */
    public static function clearInstancePool($and_clear_all_references = false)
    {
      if ($and_clear_all_references)
      {
        foreach (PesertaDidikPeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        PesertaDidikPeer::$instances = array();
    }
    
    /**
     * Method to invalidate the instance pool of all tables related to peserta_didik
     * by a foreign key with ON DELETE CASCADE
     */
    public static function clearRelatedInstancePool()
    {
    }

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      array $row PropelPDO resultset row.
     * @param      int $startcol The 0-based offset for reading from the resultset row.
     * @return string A string version of PK or null if the components of primary key in result array are all null.
     */
    public static function getPrimaryKeyHashFromRow($row, $startcol = 0)
    {
        // If the PK cannot be derived from the row, return null.
        if ($row[$startcol] === null) {
            return null;
        }

        return (string) $row[$startcol];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param      array $row PropelPDO resultset row.
     * @param      int $startcol The 0-based offset for reading from the resultset row.
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $startcol = 0)
    {

        return (string) $row[$startcol];
    }
    
    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function populateObjects(PDOStatement $stmt)
    {
        $results = array();
    
        // set the class once to avoid overhead in the loop
        $cls = PesertaDidikPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = PesertaDidikPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = PesertaDidikPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                PesertaDidikPeer::addInstanceToPool($obj, $key);
            } // if key exists
        }
        $stmt->closeCursor();

        return $results;
    }
    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param      array $row PropelPDO resultset row.
     * @param      int $startcol The 0-based offset for reading from the resultset row.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     * @return array (PesertaDidik object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = PesertaDidikPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = PesertaDidikPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + PesertaDidikPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = PesertaDidikPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            PesertaDidikPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }


    /**
     * Returns the number of rows matching criteria, joining the related KebutuhanKhususRelatedByKebutuhanKhususIdAyah table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinKebutuhanKhususRelatedByKebutuhanKhususIdAyah(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(PesertaDidikPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PesertaDidikPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(PesertaDidikPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PesertaDidikPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID_AYAH, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related KebutuhanKhususRelatedByKebutuhanKhususIdIbu table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinKebutuhanKhususRelatedByKebutuhanKhususIdIbu(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(PesertaDidikPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PesertaDidikPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(PesertaDidikPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PesertaDidikPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID_IBU, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related Negara table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinNegara(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(PesertaDidikPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PesertaDidikPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(PesertaDidikPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PesertaDidikPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(PesertaDidikPeer::KEWARGANEGARAAN, NegaraPeer::NEGARA_ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related AlasanLayakPip table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAlasanLayakPip(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(PesertaDidikPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PesertaDidikPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(PesertaDidikPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PesertaDidikPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(PesertaDidikPeer::ID_LAYAK_PIP, AlasanLayakPipPeer::ID_LAYAK_PIP, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related Bank table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinBank(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(PesertaDidikPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PesertaDidikPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(PesertaDidikPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PesertaDidikPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(PesertaDidikPeer::ID_BANK, BankPeer::ID_BANK, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related MstWilayah table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinMstWilayah(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(PesertaDidikPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PesertaDidikPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(PesertaDidikPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PesertaDidikPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(PesertaDidikPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related KebutuhanKhususRelatedByKebutuhanKhususId table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinKebutuhanKhususRelatedByKebutuhanKhususId(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(PesertaDidikPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PesertaDidikPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(PesertaDidikPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PesertaDidikPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related PekerjaanRelatedByPekerjaanId table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinPekerjaanRelatedByPekerjaanId(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(PesertaDidikPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PesertaDidikPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(PesertaDidikPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PesertaDidikPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related Agama table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAgama(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(PesertaDidikPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PesertaDidikPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(PesertaDidikPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PesertaDidikPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(PesertaDidikPeer::AGAMA_ID, AgamaPeer::AGAMA_ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related PenghasilanRelatedByPenghasilanIdAyah table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinPenghasilanRelatedByPenghasilanIdAyah(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(PesertaDidikPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PesertaDidikPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(PesertaDidikPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PesertaDidikPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(PesertaDidikPeer::PENGHASILAN_ID_AYAH, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related JenisTinggal table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinJenisTinggal(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(PesertaDidikPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PesertaDidikPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(PesertaDidikPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PesertaDidikPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(PesertaDidikPeer::JENIS_TINGGAL_ID, JenisTinggalPeer::JENIS_TINGGAL_ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related AlatTransportasi table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAlatTransportasi(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(PesertaDidikPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PesertaDidikPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(PesertaDidikPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PesertaDidikPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(PesertaDidikPeer::ALAT_TRANSPORTASI_ID, AlatTransportasiPeer::ALAT_TRANSPORTASI_ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related PekerjaanRelatedByPekerjaanIdAyah table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinPekerjaanRelatedByPekerjaanIdAyah(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(PesertaDidikPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PesertaDidikPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(PesertaDidikPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PesertaDidikPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID_AYAH, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related JenjangPendidikanRelatedByJenjangPendidikanIbu table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinJenjangPendidikanRelatedByJenjangPendidikanIbu(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(PesertaDidikPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PesertaDidikPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(PesertaDidikPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PesertaDidikPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(PesertaDidikPeer::JENJANG_PENDIDIKAN_IBU, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related PenghasilanRelatedByPenghasilanIdWali table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinPenghasilanRelatedByPenghasilanIdWali(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(PesertaDidikPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PesertaDidikPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(PesertaDidikPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PesertaDidikPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(PesertaDidikPeer::PENGHASILAN_ID_WALI, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related PekerjaanRelatedByPekerjaanIdIbu table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinPekerjaanRelatedByPekerjaanIdIbu(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(PesertaDidikPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PesertaDidikPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(PesertaDidikPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PesertaDidikPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID_IBU, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related JenjangPendidikanRelatedByJenjangPendidikanAyah table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinJenjangPendidikanRelatedByJenjangPendidikanAyah(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(PesertaDidikPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PesertaDidikPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(PesertaDidikPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PesertaDidikPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(PesertaDidikPeer::JENJANG_PENDIDIKAN_AYAH, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related PenghasilanRelatedByPenghasilanIdIbu table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinPenghasilanRelatedByPenghasilanIdIbu(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(PesertaDidikPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PesertaDidikPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(PesertaDidikPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PesertaDidikPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(PesertaDidikPeer::PENGHASILAN_ID_IBU, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related PekerjaanRelatedByPekerjaanIdWali table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinPekerjaanRelatedByPekerjaanIdWali(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(PesertaDidikPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PesertaDidikPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(PesertaDidikPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PesertaDidikPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID_WALI, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related JenjangPendidikanRelatedByJenjangPendidikanWali table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinJenjangPendidikanRelatedByJenjangPendidikanWali(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(PesertaDidikPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PesertaDidikPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(PesertaDidikPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PesertaDidikPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(PesertaDidikPeer::JENJANG_PENDIDIKAN_WALI, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Selects a collection of PesertaDidik objects pre-filled with their KebutuhanKhusus objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of PesertaDidik objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinKebutuhanKhususRelatedByKebutuhanKhususIdAyah(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PesertaDidikPeer::DATABASE_NAME);
        }

        PesertaDidikPeer::addSelectColumns($criteria);
        $startcol = PesertaDidikPeer::NUM_HYDRATE_COLUMNS;
        KebutuhanKhususPeer::addSelectColumns($criteria);

        $criteria->addJoin(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID_AYAH, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PesertaDidikPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PesertaDidikPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = PesertaDidikPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PesertaDidikPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = KebutuhanKhususPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = KebutuhanKhususPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = KebutuhanKhususPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    KebutuhanKhususPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (PesertaDidik) to $obj2 (KebutuhanKhusus)
                $obj2->addPesertaDidikRelatedByKebutuhanKhususIdAyah($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of PesertaDidik objects pre-filled with their KebutuhanKhusus objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of PesertaDidik objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinKebutuhanKhususRelatedByKebutuhanKhususIdIbu(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PesertaDidikPeer::DATABASE_NAME);
        }

        PesertaDidikPeer::addSelectColumns($criteria);
        $startcol = PesertaDidikPeer::NUM_HYDRATE_COLUMNS;
        KebutuhanKhususPeer::addSelectColumns($criteria);

        $criteria->addJoin(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID_IBU, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PesertaDidikPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PesertaDidikPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = PesertaDidikPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PesertaDidikPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = KebutuhanKhususPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = KebutuhanKhususPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = KebutuhanKhususPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    KebutuhanKhususPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (PesertaDidik) to $obj2 (KebutuhanKhusus)
                $obj2->addPesertaDidikRelatedByKebutuhanKhususIdIbu($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of PesertaDidik objects pre-filled with their Negara objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of PesertaDidik objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinNegara(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PesertaDidikPeer::DATABASE_NAME);
        }

        PesertaDidikPeer::addSelectColumns($criteria);
        $startcol = PesertaDidikPeer::NUM_HYDRATE_COLUMNS;
        NegaraPeer::addSelectColumns($criteria);

        $criteria->addJoin(PesertaDidikPeer::KEWARGANEGARAAN, NegaraPeer::NEGARA_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PesertaDidikPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PesertaDidikPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = PesertaDidikPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PesertaDidikPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = NegaraPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = NegaraPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = NegaraPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    NegaraPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (PesertaDidik) to $obj2 (Negara)
                $obj2->addPesertaDidik($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of PesertaDidik objects pre-filled with their AlasanLayakPip objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of PesertaDidik objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAlasanLayakPip(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PesertaDidikPeer::DATABASE_NAME);
        }

        PesertaDidikPeer::addSelectColumns($criteria);
        $startcol = PesertaDidikPeer::NUM_HYDRATE_COLUMNS;
        AlasanLayakPipPeer::addSelectColumns($criteria);

        $criteria->addJoin(PesertaDidikPeer::ID_LAYAK_PIP, AlasanLayakPipPeer::ID_LAYAK_PIP, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PesertaDidikPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PesertaDidikPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = PesertaDidikPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PesertaDidikPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = AlasanLayakPipPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = AlasanLayakPipPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = AlasanLayakPipPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    AlasanLayakPipPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (PesertaDidik) to $obj2 (AlasanLayakPip)
                $obj2->addPesertaDidik($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of PesertaDidik objects pre-filled with their Bank objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of PesertaDidik objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinBank(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PesertaDidikPeer::DATABASE_NAME);
        }

        PesertaDidikPeer::addSelectColumns($criteria);
        $startcol = PesertaDidikPeer::NUM_HYDRATE_COLUMNS;
        BankPeer::addSelectColumns($criteria);

        $criteria->addJoin(PesertaDidikPeer::ID_BANK, BankPeer::ID_BANK, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PesertaDidikPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PesertaDidikPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = PesertaDidikPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PesertaDidikPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = BankPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = BankPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = BankPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    BankPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (PesertaDidik) to $obj2 (Bank)
                $obj2->addPesertaDidik($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of PesertaDidik objects pre-filled with their MstWilayah objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of PesertaDidik objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinMstWilayah(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PesertaDidikPeer::DATABASE_NAME);
        }

        PesertaDidikPeer::addSelectColumns($criteria);
        $startcol = PesertaDidikPeer::NUM_HYDRATE_COLUMNS;
        MstWilayahPeer::addSelectColumns($criteria);

        $criteria->addJoin(PesertaDidikPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PesertaDidikPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PesertaDidikPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = PesertaDidikPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PesertaDidikPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = MstWilayahPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = MstWilayahPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = MstWilayahPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    MstWilayahPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (PesertaDidik) to $obj2 (MstWilayah)
                $obj2->addPesertaDidik($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of PesertaDidik objects pre-filled with their KebutuhanKhusus objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of PesertaDidik objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinKebutuhanKhususRelatedByKebutuhanKhususId(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PesertaDidikPeer::DATABASE_NAME);
        }

        PesertaDidikPeer::addSelectColumns($criteria);
        $startcol = PesertaDidikPeer::NUM_HYDRATE_COLUMNS;
        KebutuhanKhususPeer::addSelectColumns($criteria);

        $criteria->addJoin(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PesertaDidikPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PesertaDidikPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = PesertaDidikPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PesertaDidikPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = KebutuhanKhususPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = KebutuhanKhususPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = KebutuhanKhususPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    KebutuhanKhususPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (PesertaDidik) to $obj2 (KebutuhanKhusus)
                $obj2->addPesertaDidikRelatedByKebutuhanKhususId($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of PesertaDidik objects pre-filled with their Pekerjaan objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of PesertaDidik objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinPekerjaanRelatedByPekerjaanId(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PesertaDidikPeer::DATABASE_NAME);
        }

        PesertaDidikPeer::addSelectColumns($criteria);
        $startcol = PesertaDidikPeer::NUM_HYDRATE_COLUMNS;
        PekerjaanPeer::addSelectColumns($criteria);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PesertaDidikPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PesertaDidikPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = PesertaDidikPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PesertaDidikPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = PekerjaanPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = PekerjaanPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = PekerjaanPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    PekerjaanPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (PesertaDidik) to $obj2 (Pekerjaan)
                $obj2->addPesertaDidikRelatedByPekerjaanId($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of PesertaDidik objects pre-filled with their Agama objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of PesertaDidik objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAgama(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PesertaDidikPeer::DATABASE_NAME);
        }

        PesertaDidikPeer::addSelectColumns($criteria);
        $startcol = PesertaDidikPeer::NUM_HYDRATE_COLUMNS;
        AgamaPeer::addSelectColumns($criteria);

        $criteria->addJoin(PesertaDidikPeer::AGAMA_ID, AgamaPeer::AGAMA_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PesertaDidikPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PesertaDidikPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = PesertaDidikPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PesertaDidikPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = AgamaPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = AgamaPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = AgamaPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    AgamaPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (PesertaDidik) to $obj2 (Agama)
                $obj2->addPesertaDidik($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of PesertaDidik objects pre-filled with their Penghasilan objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of PesertaDidik objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinPenghasilanRelatedByPenghasilanIdAyah(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PesertaDidikPeer::DATABASE_NAME);
        }

        PesertaDidikPeer::addSelectColumns($criteria);
        $startcol = PesertaDidikPeer::NUM_HYDRATE_COLUMNS;
        PenghasilanPeer::addSelectColumns($criteria);

        $criteria->addJoin(PesertaDidikPeer::PENGHASILAN_ID_AYAH, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PesertaDidikPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PesertaDidikPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = PesertaDidikPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PesertaDidikPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = PenghasilanPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = PenghasilanPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = PenghasilanPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    PenghasilanPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (PesertaDidik) to $obj2 (Penghasilan)
                $obj2->addPesertaDidikRelatedByPenghasilanIdAyah($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of PesertaDidik objects pre-filled with their JenisTinggal objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of PesertaDidik objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinJenisTinggal(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PesertaDidikPeer::DATABASE_NAME);
        }

        PesertaDidikPeer::addSelectColumns($criteria);
        $startcol = PesertaDidikPeer::NUM_HYDRATE_COLUMNS;
        JenisTinggalPeer::addSelectColumns($criteria);

        $criteria->addJoin(PesertaDidikPeer::JENIS_TINGGAL_ID, JenisTinggalPeer::JENIS_TINGGAL_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PesertaDidikPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PesertaDidikPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = PesertaDidikPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PesertaDidikPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = JenisTinggalPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = JenisTinggalPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = JenisTinggalPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    JenisTinggalPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (PesertaDidik) to $obj2 (JenisTinggal)
                $obj2->addPesertaDidik($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of PesertaDidik objects pre-filled with their AlatTransportasi objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of PesertaDidik objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAlatTransportasi(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PesertaDidikPeer::DATABASE_NAME);
        }

        PesertaDidikPeer::addSelectColumns($criteria);
        $startcol = PesertaDidikPeer::NUM_HYDRATE_COLUMNS;
        AlatTransportasiPeer::addSelectColumns($criteria);

        $criteria->addJoin(PesertaDidikPeer::ALAT_TRANSPORTASI_ID, AlatTransportasiPeer::ALAT_TRANSPORTASI_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PesertaDidikPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PesertaDidikPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = PesertaDidikPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PesertaDidikPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = AlatTransportasiPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = AlatTransportasiPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = AlatTransportasiPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    AlatTransportasiPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (PesertaDidik) to $obj2 (AlatTransportasi)
                $obj2->addPesertaDidik($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of PesertaDidik objects pre-filled with their Pekerjaan objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of PesertaDidik objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinPekerjaanRelatedByPekerjaanIdAyah(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PesertaDidikPeer::DATABASE_NAME);
        }

        PesertaDidikPeer::addSelectColumns($criteria);
        $startcol = PesertaDidikPeer::NUM_HYDRATE_COLUMNS;
        PekerjaanPeer::addSelectColumns($criteria);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID_AYAH, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PesertaDidikPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PesertaDidikPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = PesertaDidikPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PesertaDidikPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = PekerjaanPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = PekerjaanPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = PekerjaanPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    PekerjaanPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (PesertaDidik) to $obj2 (Pekerjaan)
                $obj2->addPesertaDidikRelatedByPekerjaanIdAyah($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of PesertaDidik objects pre-filled with their JenjangPendidikan objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of PesertaDidik objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinJenjangPendidikanRelatedByJenjangPendidikanIbu(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PesertaDidikPeer::DATABASE_NAME);
        }

        PesertaDidikPeer::addSelectColumns($criteria);
        $startcol = PesertaDidikPeer::NUM_HYDRATE_COLUMNS;
        JenjangPendidikanPeer::addSelectColumns($criteria);

        $criteria->addJoin(PesertaDidikPeer::JENJANG_PENDIDIKAN_IBU, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PesertaDidikPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PesertaDidikPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = PesertaDidikPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PesertaDidikPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = JenjangPendidikanPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = JenjangPendidikanPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = JenjangPendidikanPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    JenjangPendidikanPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (PesertaDidik) to $obj2 (JenjangPendidikan)
                $obj2->addPesertaDidikRelatedByJenjangPendidikanIbu($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of PesertaDidik objects pre-filled with their Penghasilan objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of PesertaDidik objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinPenghasilanRelatedByPenghasilanIdWali(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PesertaDidikPeer::DATABASE_NAME);
        }

        PesertaDidikPeer::addSelectColumns($criteria);
        $startcol = PesertaDidikPeer::NUM_HYDRATE_COLUMNS;
        PenghasilanPeer::addSelectColumns($criteria);

        $criteria->addJoin(PesertaDidikPeer::PENGHASILAN_ID_WALI, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PesertaDidikPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PesertaDidikPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = PesertaDidikPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PesertaDidikPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = PenghasilanPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = PenghasilanPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = PenghasilanPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    PenghasilanPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (PesertaDidik) to $obj2 (Penghasilan)
                $obj2->addPesertaDidikRelatedByPenghasilanIdWali($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of PesertaDidik objects pre-filled with their Pekerjaan objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of PesertaDidik objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinPekerjaanRelatedByPekerjaanIdIbu(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PesertaDidikPeer::DATABASE_NAME);
        }

        PesertaDidikPeer::addSelectColumns($criteria);
        $startcol = PesertaDidikPeer::NUM_HYDRATE_COLUMNS;
        PekerjaanPeer::addSelectColumns($criteria);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID_IBU, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PesertaDidikPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PesertaDidikPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = PesertaDidikPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PesertaDidikPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = PekerjaanPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = PekerjaanPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = PekerjaanPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    PekerjaanPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (PesertaDidik) to $obj2 (Pekerjaan)
                $obj2->addPesertaDidikRelatedByPekerjaanIdIbu($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of PesertaDidik objects pre-filled with their JenjangPendidikan objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of PesertaDidik objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinJenjangPendidikanRelatedByJenjangPendidikanAyah(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PesertaDidikPeer::DATABASE_NAME);
        }

        PesertaDidikPeer::addSelectColumns($criteria);
        $startcol = PesertaDidikPeer::NUM_HYDRATE_COLUMNS;
        JenjangPendidikanPeer::addSelectColumns($criteria);

        $criteria->addJoin(PesertaDidikPeer::JENJANG_PENDIDIKAN_AYAH, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PesertaDidikPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PesertaDidikPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = PesertaDidikPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PesertaDidikPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = JenjangPendidikanPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = JenjangPendidikanPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = JenjangPendidikanPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    JenjangPendidikanPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (PesertaDidik) to $obj2 (JenjangPendidikan)
                $obj2->addPesertaDidikRelatedByJenjangPendidikanAyah($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of PesertaDidik objects pre-filled with their Penghasilan objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of PesertaDidik objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinPenghasilanRelatedByPenghasilanIdIbu(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PesertaDidikPeer::DATABASE_NAME);
        }

        PesertaDidikPeer::addSelectColumns($criteria);
        $startcol = PesertaDidikPeer::NUM_HYDRATE_COLUMNS;
        PenghasilanPeer::addSelectColumns($criteria);

        $criteria->addJoin(PesertaDidikPeer::PENGHASILAN_ID_IBU, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PesertaDidikPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PesertaDidikPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = PesertaDidikPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PesertaDidikPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = PenghasilanPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = PenghasilanPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = PenghasilanPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    PenghasilanPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (PesertaDidik) to $obj2 (Penghasilan)
                $obj2->addPesertaDidikRelatedByPenghasilanIdIbu($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of PesertaDidik objects pre-filled with their Pekerjaan objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of PesertaDidik objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinPekerjaanRelatedByPekerjaanIdWali(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PesertaDidikPeer::DATABASE_NAME);
        }

        PesertaDidikPeer::addSelectColumns($criteria);
        $startcol = PesertaDidikPeer::NUM_HYDRATE_COLUMNS;
        PekerjaanPeer::addSelectColumns($criteria);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID_WALI, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PesertaDidikPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PesertaDidikPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = PesertaDidikPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PesertaDidikPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = PekerjaanPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = PekerjaanPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = PekerjaanPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    PekerjaanPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (PesertaDidik) to $obj2 (Pekerjaan)
                $obj2->addPesertaDidikRelatedByPekerjaanIdWali($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of PesertaDidik objects pre-filled with their JenjangPendidikan objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of PesertaDidik objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinJenjangPendidikanRelatedByJenjangPendidikanWali(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PesertaDidikPeer::DATABASE_NAME);
        }

        PesertaDidikPeer::addSelectColumns($criteria);
        $startcol = PesertaDidikPeer::NUM_HYDRATE_COLUMNS;
        JenjangPendidikanPeer::addSelectColumns($criteria);

        $criteria->addJoin(PesertaDidikPeer::JENJANG_PENDIDIKAN_WALI, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PesertaDidikPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PesertaDidikPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = PesertaDidikPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PesertaDidikPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = JenjangPendidikanPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = JenjangPendidikanPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = JenjangPendidikanPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    JenjangPendidikanPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (PesertaDidik) to $obj2 (JenjangPendidikan)
                $obj2->addPesertaDidikRelatedByJenjangPendidikanWali($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Returns the number of rows matching criteria, joining all related tables
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAll(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(PesertaDidikPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PesertaDidikPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(PesertaDidikPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PesertaDidikPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID_AYAH, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID_IBU, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KEWARGANEGARAAN, NegaraPeer::NEGARA_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::ID_LAYAK_PIP, AlasanLayakPipPeer::ID_LAYAK_PIP, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::ID_BANK, BankPeer::ID_BANK, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::AGAMA_ID, AgamaPeer::AGAMA_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PENGHASILAN_ID_AYAH, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENIS_TINGGAL_ID, JenisTinggalPeer::JENIS_TINGGAL_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::ALAT_TRANSPORTASI_ID, AlatTransportasiPeer::ALAT_TRANSPORTASI_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID_AYAH, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENJANG_PENDIDIKAN_IBU, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PENGHASILAN_ID_WALI, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID_IBU, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENJANG_PENDIDIKAN_AYAH, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PENGHASILAN_ID_IBU, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID_WALI, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENJANG_PENDIDIKAN_WALI, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }

    /**
     * Selects a collection of PesertaDidik objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of PesertaDidik objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PesertaDidikPeer::DATABASE_NAME);
        }

        PesertaDidikPeer::addSelectColumns($criteria);
        $startcol2 = PesertaDidikPeer::NUM_HYDRATE_COLUMNS;

        KebutuhanKhususPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + KebutuhanKhususPeer::NUM_HYDRATE_COLUMNS;

        KebutuhanKhususPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + KebutuhanKhususPeer::NUM_HYDRATE_COLUMNS;

        NegaraPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + NegaraPeer::NUM_HYDRATE_COLUMNS;

        AlasanLayakPipPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + AlasanLayakPipPeer::NUM_HYDRATE_COLUMNS;

        BankPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + BankPeer::NUM_HYDRATE_COLUMNS;

        MstWilayahPeer::addSelectColumns($criteria);
        $startcol8 = $startcol7 + MstWilayahPeer::NUM_HYDRATE_COLUMNS;

        KebutuhanKhususPeer::addSelectColumns($criteria);
        $startcol9 = $startcol8 + KebutuhanKhususPeer::NUM_HYDRATE_COLUMNS;

        PekerjaanPeer::addSelectColumns($criteria);
        $startcol10 = $startcol9 + PekerjaanPeer::NUM_HYDRATE_COLUMNS;

        AgamaPeer::addSelectColumns($criteria);
        $startcol11 = $startcol10 + AgamaPeer::NUM_HYDRATE_COLUMNS;

        PenghasilanPeer::addSelectColumns($criteria);
        $startcol12 = $startcol11 + PenghasilanPeer::NUM_HYDRATE_COLUMNS;

        JenisTinggalPeer::addSelectColumns($criteria);
        $startcol13 = $startcol12 + JenisTinggalPeer::NUM_HYDRATE_COLUMNS;

        AlatTransportasiPeer::addSelectColumns($criteria);
        $startcol14 = $startcol13 + AlatTransportasiPeer::NUM_HYDRATE_COLUMNS;

        PekerjaanPeer::addSelectColumns($criteria);
        $startcol15 = $startcol14 + PekerjaanPeer::NUM_HYDRATE_COLUMNS;

        JenjangPendidikanPeer::addSelectColumns($criteria);
        $startcol16 = $startcol15 + JenjangPendidikanPeer::NUM_HYDRATE_COLUMNS;

        PenghasilanPeer::addSelectColumns($criteria);
        $startcol17 = $startcol16 + PenghasilanPeer::NUM_HYDRATE_COLUMNS;

        PekerjaanPeer::addSelectColumns($criteria);
        $startcol18 = $startcol17 + PekerjaanPeer::NUM_HYDRATE_COLUMNS;

        JenjangPendidikanPeer::addSelectColumns($criteria);
        $startcol19 = $startcol18 + JenjangPendidikanPeer::NUM_HYDRATE_COLUMNS;

        PenghasilanPeer::addSelectColumns($criteria);
        $startcol20 = $startcol19 + PenghasilanPeer::NUM_HYDRATE_COLUMNS;

        PekerjaanPeer::addSelectColumns($criteria);
        $startcol21 = $startcol20 + PekerjaanPeer::NUM_HYDRATE_COLUMNS;

        JenjangPendidikanPeer::addSelectColumns($criteria);
        $startcol22 = $startcol21 + JenjangPendidikanPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID_AYAH, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID_IBU, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KEWARGANEGARAAN, NegaraPeer::NEGARA_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::ID_LAYAK_PIP, AlasanLayakPipPeer::ID_LAYAK_PIP, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::ID_BANK, BankPeer::ID_BANK, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::AGAMA_ID, AgamaPeer::AGAMA_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PENGHASILAN_ID_AYAH, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENIS_TINGGAL_ID, JenisTinggalPeer::JENIS_TINGGAL_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::ALAT_TRANSPORTASI_ID, AlatTransportasiPeer::ALAT_TRANSPORTASI_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID_AYAH, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENJANG_PENDIDIKAN_IBU, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PENGHASILAN_ID_WALI, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID_IBU, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENJANG_PENDIDIKAN_AYAH, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PENGHASILAN_ID_IBU, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID_WALI, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENJANG_PENDIDIKAN_WALI, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PesertaDidikPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PesertaDidikPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = PesertaDidikPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PesertaDidikPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

            // Add objects for joined KebutuhanKhusus rows

            $key2 = KebutuhanKhususPeer::getPrimaryKeyHashFromRow($row, $startcol2);
            if ($key2 !== null) {
                $obj2 = KebutuhanKhususPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = KebutuhanKhususPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    KebutuhanKhususPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj2 (KebutuhanKhusus)
                $obj2->addPesertaDidikRelatedByKebutuhanKhususIdAyah($obj1);
            } // if joined row not null

            // Add objects for joined KebutuhanKhusus rows

            $key3 = KebutuhanKhususPeer::getPrimaryKeyHashFromRow($row, $startcol3);
            if ($key3 !== null) {
                $obj3 = KebutuhanKhususPeer::getInstanceFromPool($key3);
                if (!$obj3) {

                    $cls = KebutuhanKhususPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    KebutuhanKhususPeer::addInstanceToPool($obj3, $key3);
                } // if obj3 loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj3 (KebutuhanKhusus)
                $obj3->addPesertaDidikRelatedByKebutuhanKhususIdIbu($obj1);
            } // if joined row not null

            // Add objects for joined Negara rows

            $key4 = NegaraPeer::getPrimaryKeyHashFromRow($row, $startcol4);
            if ($key4 !== null) {
                $obj4 = NegaraPeer::getInstanceFromPool($key4);
                if (!$obj4) {

                    $cls = NegaraPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    NegaraPeer::addInstanceToPool($obj4, $key4);
                } // if obj4 loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj4 (Negara)
                $obj4->addPesertaDidik($obj1);
            } // if joined row not null

            // Add objects for joined AlasanLayakPip rows

            $key5 = AlasanLayakPipPeer::getPrimaryKeyHashFromRow($row, $startcol5);
            if ($key5 !== null) {
                $obj5 = AlasanLayakPipPeer::getInstanceFromPool($key5);
                if (!$obj5) {

                    $cls = AlasanLayakPipPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    AlasanLayakPipPeer::addInstanceToPool($obj5, $key5);
                } // if obj5 loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj5 (AlasanLayakPip)
                $obj5->addPesertaDidik($obj1);
            } // if joined row not null

            // Add objects for joined Bank rows

            $key6 = BankPeer::getPrimaryKeyHashFromRow($row, $startcol6);
            if ($key6 !== null) {
                $obj6 = BankPeer::getInstanceFromPool($key6);
                if (!$obj6) {

                    $cls = BankPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    BankPeer::addInstanceToPool($obj6, $key6);
                } // if obj6 loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj6 (Bank)
                $obj6->addPesertaDidik($obj1);
            } // if joined row not null

            // Add objects for joined MstWilayah rows

            $key7 = MstWilayahPeer::getPrimaryKeyHashFromRow($row, $startcol7);
            if ($key7 !== null) {
                $obj7 = MstWilayahPeer::getInstanceFromPool($key7);
                if (!$obj7) {

                    $cls = MstWilayahPeer::getOMClass();

                    $obj7 = new $cls();
                    $obj7->hydrate($row, $startcol7);
                    MstWilayahPeer::addInstanceToPool($obj7, $key7);
                } // if obj7 loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj7 (MstWilayah)
                $obj7->addPesertaDidik($obj1);
            } // if joined row not null

            // Add objects for joined KebutuhanKhusus rows

            $key8 = KebutuhanKhususPeer::getPrimaryKeyHashFromRow($row, $startcol8);
            if ($key8 !== null) {
                $obj8 = KebutuhanKhususPeer::getInstanceFromPool($key8);
                if (!$obj8) {

                    $cls = KebutuhanKhususPeer::getOMClass();

                    $obj8 = new $cls();
                    $obj8->hydrate($row, $startcol8);
                    KebutuhanKhususPeer::addInstanceToPool($obj8, $key8);
                } // if obj8 loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj8 (KebutuhanKhusus)
                $obj8->addPesertaDidikRelatedByKebutuhanKhususId($obj1);
            } // if joined row not null

            // Add objects for joined Pekerjaan rows

            $key9 = PekerjaanPeer::getPrimaryKeyHashFromRow($row, $startcol9);
            if ($key9 !== null) {
                $obj9 = PekerjaanPeer::getInstanceFromPool($key9);
                if (!$obj9) {

                    $cls = PekerjaanPeer::getOMClass();

                    $obj9 = new $cls();
                    $obj9->hydrate($row, $startcol9);
                    PekerjaanPeer::addInstanceToPool($obj9, $key9);
                } // if obj9 loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj9 (Pekerjaan)
                $obj9->addPesertaDidikRelatedByPekerjaanId($obj1);
            } // if joined row not null

            // Add objects for joined Agama rows

            $key10 = AgamaPeer::getPrimaryKeyHashFromRow($row, $startcol10);
            if ($key10 !== null) {
                $obj10 = AgamaPeer::getInstanceFromPool($key10);
                if (!$obj10) {

                    $cls = AgamaPeer::getOMClass();

                    $obj10 = new $cls();
                    $obj10->hydrate($row, $startcol10);
                    AgamaPeer::addInstanceToPool($obj10, $key10);
                } // if obj10 loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj10 (Agama)
                $obj10->addPesertaDidik($obj1);
            } // if joined row not null

            // Add objects for joined Penghasilan rows

            $key11 = PenghasilanPeer::getPrimaryKeyHashFromRow($row, $startcol11);
            if ($key11 !== null) {
                $obj11 = PenghasilanPeer::getInstanceFromPool($key11);
                if (!$obj11) {

                    $cls = PenghasilanPeer::getOMClass();

                    $obj11 = new $cls();
                    $obj11->hydrate($row, $startcol11);
                    PenghasilanPeer::addInstanceToPool($obj11, $key11);
                } // if obj11 loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj11 (Penghasilan)
                $obj11->addPesertaDidikRelatedByPenghasilanIdAyah($obj1);
            } // if joined row not null

            // Add objects for joined JenisTinggal rows

            $key12 = JenisTinggalPeer::getPrimaryKeyHashFromRow($row, $startcol12);
            if ($key12 !== null) {
                $obj12 = JenisTinggalPeer::getInstanceFromPool($key12);
                if (!$obj12) {

                    $cls = JenisTinggalPeer::getOMClass();

                    $obj12 = new $cls();
                    $obj12->hydrate($row, $startcol12);
                    JenisTinggalPeer::addInstanceToPool($obj12, $key12);
                } // if obj12 loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj12 (JenisTinggal)
                $obj12->addPesertaDidik($obj1);
            } // if joined row not null

            // Add objects for joined AlatTransportasi rows

            $key13 = AlatTransportasiPeer::getPrimaryKeyHashFromRow($row, $startcol13);
            if ($key13 !== null) {
                $obj13 = AlatTransportasiPeer::getInstanceFromPool($key13);
                if (!$obj13) {

                    $cls = AlatTransportasiPeer::getOMClass();

                    $obj13 = new $cls();
                    $obj13->hydrate($row, $startcol13);
                    AlatTransportasiPeer::addInstanceToPool($obj13, $key13);
                } // if obj13 loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj13 (AlatTransportasi)
                $obj13->addPesertaDidik($obj1);
            } // if joined row not null

            // Add objects for joined Pekerjaan rows

            $key14 = PekerjaanPeer::getPrimaryKeyHashFromRow($row, $startcol14);
            if ($key14 !== null) {
                $obj14 = PekerjaanPeer::getInstanceFromPool($key14);
                if (!$obj14) {

                    $cls = PekerjaanPeer::getOMClass();

                    $obj14 = new $cls();
                    $obj14->hydrate($row, $startcol14);
                    PekerjaanPeer::addInstanceToPool($obj14, $key14);
                } // if obj14 loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj14 (Pekerjaan)
                $obj14->addPesertaDidikRelatedByPekerjaanIdAyah($obj1);
            } // if joined row not null

            // Add objects for joined JenjangPendidikan rows

            $key15 = JenjangPendidikanPeer::getPrimaryKeyHashFromRow($row, $startcol15);
            if ($key15 !== null) {
                $obj15 = JenjangPendidikanPeer::getInstanceFromPool($key15);
                if (!$obj15) {

                    $cls = JenjangPendidikanPeer::getOMClass();

                    $obj15 = new $cls();
                    $obj15->hydrate($row, $startcol15);
                    JenjangPendidikanPeer::addInstanceToPool($obj15, $key15);
                } // if obj15 loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj15 (JenjangPendidikan)
                $obj15->addPesertaDidikRelatedByJenjangPendidikanIbu($obj1);
            } // if joined row not null

            // Add objects for joined Penghasilan rows

            $key16 = PenghasilanPeer::getPrimaryKeyHashFromRow($row, $startcol16);
            if ($key16 !== null) {
                $obj16 = PenghasilanPeer::getInstanceFromPool($key16);
                if (!$obj16) {

                    $cls = PenghasilanPeer::getOMClass();

                    $obj16 = new $cls();
                    $obj16->hydrate($row, $startcol16);
                    PenghasilanPeer::addInstanceToPool($obj16, $key16);
                } // if obj16 loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj16 (Penghasilan)
                $obj16->addPesertaDidikRelatedByPenghasilanIdWali($obj1);
            } // if joined row not null

            // Add objects for joined Pekerjaan rows

            $key17 = PekerjaanPeer::getPrimaryKeyHashFromRow($row, $startcol17);
            if ($key17 !== null) {
                $obj17 = PekerjaanPeer::getInstanceFromPool($key17);
                if (!$obj17) {

                    $cls = PekerjaanPeer::getOMClass();

                    $obj17 = new $cls();
                    $obj17->hydrate($row, $startcol17);
                    PekerjaanPeer::addInstanceToPool($obj17, $key17);
                } // if obj17 loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj17 (Pekerjaan)
                $obj17->addPesertaDidikRelatedByPekerjaanIdIbu($obj1);
            } // if joined row not null

            // Add objects for joined JenjangPendidikan rows

            $key18 = JenjangPendidikanPeer::getPrimaryKeyHashFromRow($row, $startcol18);
            if ($key18 !== null) {
                $obj18 = JenjangPendidikanPeer::getInstanceFromPool($key18);
                if (!$obj18) {

                    $cls = JenjangPendidikanPeer::getOMClass();

                    $obj18 = new $cls();
                    $obj18->hydrate($row, $startcol18);
                    JenjangPendidikanPeer::addInstanceToPool($obj18, $key18);
                } // if obj18 loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj18 (JenjangPendidikan)
                $obj18->addPesertaDidikRelatedByJenjangPendidikanAyah($obj1);
            } // if joined row not null

            // Add objects for joined Penghasilan rows

            $key19 = PenghasilanPeer::getPrimaryKeyHashFromRow($row, $startcol19);
            if ($key19 !== null) {
                $obj19 = PenghasilanPeer::getInstanceFromPool($key19);
                if (!$obj19) {

                    $cls = PenghasilanPeer::getOMClass();

                    $obj19 = new $cls();
                    $obj19->hydrate($row, $startcol19);
                    PenghasilanPeer::addInstanceToPool($obj19, $key19);
                } // if obj19 loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj19 (Penghasilan)
                $obj19->addPesertaDidikRelatedByPenghasilanIdIbu($obj1);
            } // if joined row not null

            // Add objects for joined Pekerjaan rows

            $key20 = PekerjaanPeer::getPrimaryKeyHashFromRow($row, $startcol20);
            if ($key20 !== null) {
                $obj20 = PekerjaanPeer::getInstanceFromPool($key20);
                if (!$obj20) {

                    $cls = PekerjaanPeer::getOMClass();

                    $obj20 = new $cls();
                    $obj20->hydrate($row, $startcol20);
                    PekerjaanPeer::addInstanceToPool($obj20, $key20);
                } // if obj20 loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj20 (Pekerjaan)
                $obj20->addPesertaDidikRelatedByPekerjaanIdWali($obj1);
            } // if joined row not null

            // Add objects for joined JenjangPendidikan rows

            $key21 = JenjangPendidikanPeer::getPrimaryKeyHashFromRow($row, $startcol21);
            if ($key21 !== null) {
                $obj21 = JenjangPendidikanPeer::getInstanceFromPool($key21);
                if (!$obj21) {

                    $cls = JenjangPendidikanPeer::getOMClass();

                    $obj21 = new $cls();
                    $obj21->hydrate($row, $startcol21);
                    JenjangPendidikanPeer::addInstanceToPool($obj21, $key21);
                } // if obj21 loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj21 (JenjangPendidikan)
                $obj21->addPesertaDidikRelatedByJenjangPendidikanWali($obj1);
            } // if joined row not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Returns the number of rows matching criteria, joining the related KebutuhanKhususRelatedByKebutuhanKhususIdAyah table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptKebutuhanKhususRelatedByKebutuhanKhususIdAyah(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(PesertaDidikPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PesertaDidikPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(PesertaDidikPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PesertaDidikPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(PesertaDidikPeer::KEWARGANEGARAAN, NegaraPeer::NEGARA_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::ID_LAYAK_PIP, AlasanLayakPipPeer::ID_LAYAK_PIP, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::ID_BANK, BankPeer::ID_BANK, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::AGAMA_ID, AgamaPeer::AGAMA_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PENGHASILAN_ID_AYAH, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENIS_TINGGAL_ID, JenisTinggalPeer::JENIS_TINGGAL_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::ALAT_TRANSPORTASI_ID, AlatTransportasiPeer::ALAT_TRANSPORTASI_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID_AYAH, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENJANG_PENDIDIKAN_IBU, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PENGHASILAN_ID_WALI, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID_IBU, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENJANG_PENDIDIKAN_AYAH, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PENGHASILAN_ID_IBU, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID_WALI, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENJANG_PENDIDIKAN_WALI, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related KebutuhanKhususRelatedByKebutuhanKhususIdIbu table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptKebutuhanKhususRelatedByKebutuhanKhususIdIbu(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(PesertaDidikPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PesertaDidikPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(PesertaDidikPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PesertaDidikPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(PesertaDidikPeer::KEWARGANEGARAAN, NegaraPeer::NEGARA_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::ID_LAYAK_PIP, AlasanLayakPipPeer::ID_LAYAK_PIP, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::ID_BANK, BankPeer::ID_BANK, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::AGAMA_ID, AgamaPeer::AGAMA_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PENGHASILAN_ID_AYAH, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENIS_TINGGAL_ID, JenisTinggalPeer::JENIS_TINGGAL_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::ALAT_TRANSPORTASI_ID, AlatTransportasiPeer::ALAT_TRANSPORTASI_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID_AYAH, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENJANG_PENDIDIKAN_IBU, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PENGHASILAN_ID_WALI, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID_IBU, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENJANG_PENDIDIKAN_AYAH, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PENGHASILAN_ID_IBU, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID_WALI, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENJANG_PENDIDIKAN_WALI, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related Negara table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptNegara(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(PesertaDidikPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PesertaDidikPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(PesertaDidikPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PesertaDidikPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID_AYAH, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID_IBU, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::ID_LAYAK_PIP, AlasanLayakPipPeer::ID_LAYAK_PIP, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::ID_BANK, BankPeer::ID_BANK, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::AGAMA_ID, AgamaPeer::AGAMA_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PENGHASILAN_ID_AYAH, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENIS_TINGGAL_ID, JenisTinggalPeer::JENIS_TINGGAL_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::ALAT_TRANSPORTASI_ID, AlatTransportasiPeer::ALAT_TRANSPORTASI_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID_AYAH, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENJANG_PENDIDIKAN_IBU, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PENGHASILAN_ID_WALI, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID_IBU, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENJANG_PENDIDIKAN_AYAH, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PENGHASILAN_ID_IBU, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID_WALI, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENJANG_PENDIDIKAN_WALI, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related AlasanLayakPip table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptAlasanLayakPip(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(PesertaDidikPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PesertaDidikPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(PesertaDidikPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PesertaDidikPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID_AYAH, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID_IBU, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KEWARGANEGARAAN, NegaraPeer::NEGARA_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::ID_BANK, BankPeer::ID_BANK, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::AGAMA_ID, AgamaPeer::AGAMA_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PENGHASILAN_ID_AYAH, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENIS_TINGGAL_ID, JenisTinggalPeer::JENIS_TINGGAL_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::ALAT_TRANSPORTASI_ID, AlatTransportasiPeer::ALAT_TRANSPORTASI_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID_AYAH, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENJANG_PENDIDIKAN_IBU, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PENGHASILAN_ID_WALI, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID_IBU, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENJANG_PENDIDIKAN_AYAH, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PENGHASILAN_ID_IBU, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID_WALI, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENJANG_PENDIDIKAN_WALI, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related Bank table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptBank(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(PesertaDidikPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PesertaDidikPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(PesertaDidikPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PesertaDidikPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID_AYAH, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID_IBU, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KEWARGANEGARAAN, NegaraPeer::NEGARA_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::ID_LAYAK_PIP, AlasanLayakPipPeer::ID_LAYAK_PIP, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::AGAMA_ID, AgamaPeer::AGAMA_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PENGHASILAN_ID_AYAH, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENIS_TINGGAL_ID, JenisTinggalPeer::JENIS_TINGGAL_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::ALAT_TRANSPORTASI_ID, AlatTransportasiPeer::ALAT_TRANSPORTASI_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID_AYAH, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENJANG_PENDIDIKAN_IBU, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PENGHASILAN_ID_WALI, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID_IBU, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENJANG_PENDIDIKAN_AYAH, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PENGHASILAN_ID_IBU, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID_WALI, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENJANG_PENDIDIKAN_WALI, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related MstWilayah table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptMstWilayah(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(PesertaDidikPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PesertaDidikPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(PesertaDidikPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PesertaDidikPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID_AYAH, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID_IBU, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KEWARGANEGARAAN, NegaraPeer::NEGARA_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::ID_LAYAK_PIP, AlasanLayakPipPeer::ID_LAYAK_PIP, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::ID_BANK, BankPeer::ID_BANK, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::AGAMA_ID, AgamaPeer::AGAMA_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PENGHASILAN_ID_AYAH, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENIS_TINGGAL_ID, JenisTinggalPeer::JENIS_TINGGAL_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::ALAT_TRANSPORTASI_ID, AlatTransportasiPeer::ALAT_TRANSPORTASI_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID_AYAH, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENJANG_PENDIDIKAN_IBU, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PENGHASILAN_ID_WALI, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID_IBU, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENJANG_PENDIDIKAN_AYAH, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PENGHASILAN_ID_IBU, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID_WALI, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENJANG_PENDIDIKAN_WALI, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related KebutuhanKhususRelatedByKebutuhanKhususId table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptKebutuhanKhususRelatedByKebutuhanKhususId(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(PesertaDidikPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PesertaDidikPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(PesertaDidikPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PesertaDidikPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(PesertaDidikPeer::KEWARGANEGARAAN, NegaraPeer::NEGARA_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::ID_LAYAK_PIP, AlasanLayakPipPeer::ID_LAYAK_PIP, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::ID_BANK, BankPeer::ID_BANK, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::AGAMA_ID, AgamaPeer::AGAMA_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PENGHASILAN_ID_AYAH, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENIS_TINGGAL_ID, JenisTinggalPeer::JENIS_TINGGAL_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::ALAT_TRANSPORTASI_ID, AlatTransportasiPeer::ALAT_TRANSPORTASI_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID_AYAH, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENJANG_PENDIDIKAN_IBU, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PENGHASILAN_ID_WALI, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID_IBU, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENJANG_PENDIDIKAN_AYAH, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PENGHASILAN_ID_IBU, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID_WALI, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENJANG_PENDIDIKAN_WALI, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related PekerjaanRelatedByPekerjaanId table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptPekerjaanRelatedByPekerjaanId(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(PesertaDidikPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PesertaDidikPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(PesertaDidikPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PesertaDidikPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID_AYAH, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID_IBU, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KEWARGANEGARAAN, NegaraPeer::NEGARA_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::ID_LAYAK_PIP, AlasanLayakPipPeer::ID_LAYAK_PIP, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::ID_BANK, BankPeer::ID_BANK, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::AGAMA_ID, AgamaPeer::AGAMA_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PENGHASILAN_ID_AYAH, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENIS_TINGGAL_ID, JenisTinggalPeer::JENIS_TINGGAL_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::ALAT_TRANSPORTASI_ID, AlatTransportasiPeer::ALAT_TRANSPORTASI_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENJANG_PENDIDIKAN_IBU, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PENGHASILAN_ID_WALI, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENJANG_PENDIDIKAN_AYAH, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PENGHASILAN_ID_IBU, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENJANG_PENDIDIKAN_WALI, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related Agama table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptAgama(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(PesertaDidikPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PesertaDidikPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(PesertaDidikPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PesertaDidikPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID_AYAH, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID_IBU, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KEWARGANEGARAAN, NegaraPeer::NEGARA_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::ID_LAYAK_PIP, AlasanLayakPipPeer::ID_LAYAK_PIP, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::ID_BANK, BankPeer::ID_BANK, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PENGHASILAN_ID_AYAH, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENIS_TINGGAL_ID, JenisTinggalPeer::JENIS_TINGGAL_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::ALAT_TRANSPORTASI_ID, AlatTransportasiPeer::ALAT_TRANSPORTASI_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID_AYAH, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENJANG_PENDIDIKAN_IBU, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PENGHASILAN_ID_WALI, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID_IBU, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENJANG_PENDIDIKAN_AYAH, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PENGHASILAN_ID_IBU, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID_WALI, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENJANG_PENDIDIKAN_WALI, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related PenghasilanRelatedByPenghasilanIdAyah table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptPenghasilanRelatedByPenghasilanIdAyah(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(PesertaDidikPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PesertaDidikPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(PesertaDidikPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PesertaDidikPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID_AYAH, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID_IBU, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KEWARGANEGARAAN, NegaraPeer::NEGARA_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::ID_LAYAK_PIP, AlasanLayakPipPeer::ID_LAYAK_PIP, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::ID_BANK, BankPeer::ID_BANK, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::AGAMA_ID, AgamaPeer::AGAMA_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENIS_TINGGAL_ID, JenisTinggalPeer::JENIS_TINGGAL_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::ALAT_TRANSPORTASI_ID, AlatTransportasiPeer::ALAT_TRANSPORTASI_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID_AYAH, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENJANG_PENDIDIKAN_IBU, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID_IBU, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENJANG_PENDIDIKAN_AYAH, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID_WALI, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENJANG_PENDIDIKAN_WALI, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related JenisTinggal table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptJenisTinggal(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(PesertaDidikPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PesertaDidikPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(PesertaDidikPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PesertaDidikPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID_AYAH, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID_IBU, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KEWARGANEGARAAN, NegaraPeer::NEGARA_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::ID_LAYAK_PIP, AlasanLayakPipPeer::ID_LAYAK_PIP, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::ID_BANK, BankPeer::ID_BANK, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::AGAMA_ID, AgamaPeer::AGAMA_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PENGHASILAN_ID_AYAH, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::ALAT_TRANSPORTASI_ID, AlatTransportasiPeer::ALAT_TRANSPORTASI_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID_AYAH, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENJANG_PENDIDIKAN_IBU, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PENGHASILAN_ID_WALI, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID_IBU, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENJANG_PENDIDIKAN_AYAH, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PENGHASILAN_ID_IBU, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID_WALI, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENJANG_PENDIDIKAN_WALI, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related AlatTransportasi table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptAlatTransportasi(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(PesertaDidikPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PesertaDidikPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(PesertaDidikPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PesertaDidikPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID_AYAH, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID_IBU, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KEWARGANEGARAAN, NegaraPeer::NEGARA_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::ID_LAYAK_PIP, AlasanLayakPipPeer::ID_LAYAK_PIP, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::ID_BANK, BankPeer::ID_BANK, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::AGAMA_ID, AgamaPeer::AGAMA_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PENGHASILAN_ID_AYAH, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENIS_TINGGAL_ID, JenisTinggalPeer::JENIS_TINGGAL_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID_AYAH, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENJANG_PENDIDIKAN_IBU, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PENGHASILAN_ID_WALI, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID_IBU, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENJANG_PENDIDIKAN_AYAH, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PENGHASILAN_ID_IBU, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID_WALI, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENJANG_PENDIDIKAN_WALI, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related PekerjaanRelatedByPekerjaanIdAyah table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptPekerjaanRelatedByPekerjaanIdAyah(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(PesertaDidikPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PesertaDidikPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(PesertaDidikPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PesertaDidikPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID_AYAH, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID_IBU, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KEWARGANEGARAAN, NegaraPeer::NEGARA_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::ID_LAYAK_PIP, AlasanLayakPipPeer::ID_LAYAK_PIP, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::ID_BANK, BankPeer::ID_BANK, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::AGAMA_ID, AgamaPeer::AGAMA_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PENGHASILAN_ID_AYAH, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENIS_TINGGAL_ID, JenisTinggalPeer::JENIS_TINGGAL_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::ALAT_TRANSPORTASI_ID, AlatTransportasiPeer::ALAT_TRANSPORTASI_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENJANG_PENDIDIKAN_IBU, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PENGHASILAN_ID_WALI, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENJANG_PENDIDIKAN_AYAH, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PENGHASILAN_ID_IBU, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENJANG_PENDIDIKAN_WALI, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related JenjangPendidikanRelatedByJenjangPendidikanIbu table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptJenjangPendidikanRelatedByJenjangPendidikanIbu(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(PesertaDidikPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PesertaDidikPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(PesertaDidikPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PesertaDidikPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID_AYAH, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID_IBU, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KEWARGANEGARAAN, NegaraPeer::NEGARA_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::ID_LAYAK_PIP, AlasanLayakPipPeer::ID_LAYAK_PIP, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::ID_BANK, BankPeer::ID_BANK, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::AGAMA_ID, AgamaPeer::AGAMA_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PENGHASILAN_ID_AYAH, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENIS_TINGGAL_ID, JenisTinggalPeer::JENIS_TINGGAL_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::ALAT_TRANSPORTASI_ID, AlatTransportasiPeer::ALAT_TRANSPORTASI_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID_AYAH, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PENGHASILAN_ID_WALI, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID_IBU, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PENGHASILAN_ID_IBU, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID_WALI, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related PenghasilanRelatedByPenghasilanIdWali table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptPenghasilanRelatedByPenghasilanIdWali(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(PesertaDidikPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PesertaDidikPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(PesertaDidikPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PesertaDidikPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID_AYAH, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID_IBU, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KEWARGANEGARAAN, NegaraPeer::NEGARA_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::ID_LAYAK_PIP, AlasanLayakPipPeer::ID_LAYAK_PIP, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::ID_BANK, BankPeer::ID_BANK, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::AGAMA_ID, AgamaPeer::AGAMA_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENIS_TINGGAL_ID, JenisTinggalPeer::JENIS_TINGGAL_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::ALAT_TRANSPORTASI_ID, AlatTransportasiPeer::ALAT_TRANSPORTASI_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID_AYAH, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENJANG_PENDIDIKAN_IBU, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID_IBU, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENJANG_PENDIDIKAN_AYAH, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID_WALI, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENJANG_PENDIDIKAN_WALI, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related PekerjaanRelatedByPekerjaanIdIbu table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptPekerjaanRelatedByPekerjaanIdIbu(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(PesertaDidikPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PesertaDidikPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(PesertaDidikPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PesertaDidikPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID_AYAH, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID_IBU, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KEWARGANEGARAAN, NegaraPeer::NEGARA_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::ID_LAYAK_PIP, AlasanLayakPipPeer::ID_LAYAK_PIP, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::ID_BANK, BankPeer::ID_BANK, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::AGAMA_ID, AgamaPeer::AGAMA_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PENGHASILAN_ID_AYAH, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENIS_TINGGAL_ID, JenisTinggalPeer::JENIS_TINGGAL_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::ALAT_TRANSPORTASI_ID, AlatTransportasiPeer::ALAT_TRANSPORTASI_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENJANG_PENDIDIKAN_IBU, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PENGHASILAN_ID_WALI, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENJANG_PENDIDIKAN_AYAH, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PENGHASILAN_ID_IBU, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENJANG_PENDIDIKAN_WALI, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related JenjangPendidikanRelatedByJenjangPendidikanAyah table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptJenjangPendidikanRelatedByJenjangPendidikanAyah(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(PesertaDidikPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PesertaDidikPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(PesertaDidikPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PesertaDidikPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID_AYAH, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID_IBU, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KEWARGANEGARAAN, NegaraPeer::NEGARA_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::ID_LAYAK_PIP, AlasanLayakPipPeer::ID_LAYAK_PIP, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::ID_BANK, BankPeer::ID_BANK, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::AGAMA_ID, AgamaPeer::AGAMA_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PENGHASILAN_ID_AYAH, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENIS_TINGGAL_ID, JenisTinggalPeer::JENIS_TINGGAL_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::ALAT_TRANSPORTASI_ID, AlatTransportasiPeer::ALAT_TRANSPORTASI_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID_AYAH, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PENGHASILAN_ID_WALI, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID_IBU, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PENGHASILAN_ID_IBU, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID_WALI, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related PenghasilanRelatedByPenghasilanIdIbu table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptPenghasilanRelatedByPenghasilanIdIbu(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(PesertaDidikPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PesertaDidikPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(PesertaDidikPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PesertaDidikPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID_AYAH, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID_IBU, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KEWARGANEGARAAN, NegaraPeer::NEGARA_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::ID_LAYAK_PIP, AlasanLayakPipPeer::ID_LAYAK_PIP, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::ID_BANK, BankPeer::ID_BANK, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::AGAMA_ID, AgamaPeer::AGAMA_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENIS_TINGGAL_ID, JenisTinggalPeer::JENIS_TINGGAL_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::ALAT_TRANSPORTASI_ID, AlatTransportasiPeer::ALAT_TRANSPORTASI_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID_AYAH, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENJANG_PENDIDIKAN_IBU, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID_IBU, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENJANG_PENDIDIKAN_AYAH, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID_WALI, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENJANG_PENDIDIKAN_WALI, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related PekerjaanRelatedByPekerjaanIdWali table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptPekerjaanRelatedByPekerjaanIdWali(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(PesertaDidikPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PesertaDidikPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(PesertaDidikPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PesertaDidikPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID_AYAH, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID_IBU, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KEWARGANEGARAAN, NegaraPeer::NEGARA_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::ID_LAYAK_PIP, AlasanLayakPipPeer::ID_LAYAK_PIP, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::ID_BANK, BankPeer::ID_BANK, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::AGAMA_ID, AgamaPeer::AGAMA_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PENGHASILAN_ID_AYAH, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENIS_TINGGAL_ID, JenisTinggalPeer::JENIS_TINGGAL_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::ALAT_TRANSPORTASI_ID, AlatTransportasiPeer::ALAT_TRANSPORTASI_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENJANG_PENDIDIKAN_IBU, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PENGHASILAN_ID_WALI, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENJANG_PENDIDIKAN_AYAH, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PENGHASILAN_ID_IBU, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENJANG_PENDIDIKAN_WALI, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related JenjangPendidikanRelatedByJenjangPendidikanWali table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptJenjangPendidikanRelatedByJenjangPendidikanWali(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(PesertaDidikPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PesertaDidikPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(PesertaDidikPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PesertaDidikPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID_AYAH, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID_IBU, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KEWARGANEGARAAN, NegaraPeer::NEGARA_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::ID_LAYAK_PIP, AlasanLayakPipPeer::ID_LAYAK_PIP, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::ID_BANK, BankPeer::ID_BANK, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::AGAMA_ID, AgamaPeer::AGAMA_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PENGHASILAN_ID_AYAH, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENIS_TINGGAL_ID, JenisTinggalPeer::JENIS_TINGGAL_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::ALAT_TRANSPORTASI_ID, AlatTransportasiPeer::ALAT_TRANSPORTASI_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID_AYAH, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PENGHASILAN_ID_WALI, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID_IBU, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PENGHASILAN_ID_IBU, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID_WALI, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Selects a collection of PesertaDidik objects pre-filled with all related objects except KebutuhanKhususRelatedByKebutuhanKhususIdAyah.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of PesertaDidik objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptKebutuhanKhususRelatedByKebutuhanKhususIdAyah(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PesertaDidikPeer::DATABASE_NAME);
        }

        PesertaDidikPeer::addSelectColumns($criteria);
        $startcol2 = PesertaDidikPeer::NUM_HYDRATE_COLUMNS;

        NegaraPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + NegaraPeer::NUM_HYDRATE_COLUMNS;

        AlasanLayakPipPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + AlasanLayakPipPeer::NUM_HYDRATE_COLUMNS;

        BankPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + BankPeer::NUM_HYDRATE_COLUMNS;

        MstWilayahPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + MstWilayahPeer::NUM_HYDRATE_COLUMNS;

        PekerjaanPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + PekerjaanPeer::NUM_HYDRATE_COLUMNS;

        AgamaPeer::addSelectColumns($criteria);
        $startcol8 = $startcol7 + AgamaPeer::NUM_HYDRATE_COLUMNS;

        PenghasilanPeer::addSelectColumns($criteria);
        $startcol9 = $startcol8 + PenghasilanPeer::NUM_HYDRATE_COLUMNS;

        JenisTinggalPeer::addSelectColumns($criteria);
        $startcol10 = $startcol9 + JenisTinggalPeer::NUM_HYDRATE_COLUMNS;

        AlatTransportasiPeer::addSelectColumns($criteria);
        $startcol11 = $startcol10 + AlatTransportasiPeer::NUM_HYDRATE_COLUMNS;

        PekerjaanPeer::addSelectColumns($criteria);
        $startcol12 = $startcol11 + PekerjaanPeer::NUM_HYDRATE_COLUMNS;

        JenjangPendidikanPeer::addSelectColumns($criteria);
        $startcol13 = $startcol12 + JenjangPendidikanPeer::NUM_HYDRATE_COLUMNS;

        PenghasilanPeer::addSelectColumns($criteria);
        $startcol14 = $startcol13 + PenghasilanPeer::NUM_HYDRATE_COLUMNS;

        PekerjaanPeer::addSelectColumns($criteria);
        $startcol15 = $startcol14 + PekerjaanPeer::NUM_HYDRATE_COLUMNS;

        JenjangPendidikanPeer::addSelectColumns($criteria);
        $startcol16 = $startcol15 + JenjangPendidikanPeer::NUM_HYDRATE_COLUMNS;

        PenghasilanPeer::addSelectColumns($criteria);
        $startcol17 = $startcol16 + PenghasilanPeer::NUM_HYDRATE_COLUMNS;

        PekerjaanPeer::addSelectColumns($criteria);
        $startcol18 = $startcol17 + PekerjaanPeer::NUM_HYDRATE_COLUMNS;

        JenjangPendidikanPeer::addSelectColumns($criteria);
        $startcol19 = $startcol18 + JenjangPendidikanPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(PesertaDidikPeer::KEWARGANEGARAAN, NegaraPeer::NEGARA_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::ID_LAYAK_PIP, AlasanLayakPipPeer::ID_LAYAK_PIP, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::ID_BANK, BankPeer::ID_BANK, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::AGAMA_ID, AgamaPeer::AGAMA_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PENGHASILAN_ID_AYAH, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENIS_TINGGAL_ID, JenisTinggalPeer::JENIS_TINGGAL_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::ALAT_TRANSPORTASI_ID, AlatTransportasiPeer::ALAT_TRANSPORTASI_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID_AYAH, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENJANG_PENDIDIKAN_IBU, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PENGHASILAN_ID_WALI, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID_IBU, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENJANG_PENDIDIKAN_AYAH, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PENGHASILAN_ID_IBU, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID_WALI, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENJANG_PENDIDIKAN_WALI, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PesertaDidikPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PesertaDidikPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = PesertaDidikPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PesertaDidikPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Negara rows

                $key2 = NegaraPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = NegaraPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = NegaraPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    NegaraPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj2 (Negara)
                $obj2->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined AlasanLayakPip rows

                $key3 = AlasanLayakPipPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = AlasanLayakPipPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = AlasanLayakPipPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    AlasanLayakPipPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj3 (AlasanLayakPip)
                $obj3->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined Bank rows

                $key4 = BankPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = BankPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = BankPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    BankPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj4 (Bank)
                $obj4->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined MstWilayah rows

                $key5 = MstWilayahPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = MstWilayahPeer::getInstanceFromPool($key5);
                    if (!$obj5) {
    
                        $cls = MstWilayahPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    MstWilayahPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj5 (MstWilayah)
                $obj5->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined Pekerjaan rows

                $key6 = PekerjaanPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = PekerjaanPeer::getInstanceFromPool($key6);
                    if (!$obj6) {
    
                        $cls = PekerjaanPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    PekerjaanPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj6 (Pekerjaan)
                $obj6->addPesertaDidikRelatedByPekerjaanId($obj1);

            } // if joined row is not null

                // Add objects for joined Agama rows

                $key7 = AgamaPeer::getPrimaryKeyHashFromRow($row, $startcol7);
                if ($key7 !== null) {
                    $obj7 = AgamaPeer::getInstanceFromPool($key7);
                    if (!$obj7) {
    
                        $cls = AgamaPeer::getOMClass();

                    $obj7 = new $cls();
                    $obj7->hydrate($row, $startcol7);
                    AgamaPeer::addInstanceToPool($obj7, $key7);
                } // if $obj7 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj7 (Agama)
                $obj7->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined Penghasilan rows

                $key8 = PenghasilanPeer::getPrimaryKeyHashFromRow($row, $startcol8);
                if ($key8 !== null) {
                    $obj8 = PenghasilanPeer::getInstanceFromPool($key8);
                    if (!$obj8) {
    
                        $cls = PenghasilanPeer::getOMClass();

                    $obj8 = new $cls();
                    $obj8->hydrate($row, $startcol8);
                    PenghasilanPeer::addInstanceToPool($obj8, $key8);
                } // if $obj8 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj8 (Penghasilan)
                $obj8->addPesertaDidikRelatedByPenghasilanIdAyah($obj1);

            } // if joined row is not null

                // Add objects for joined JenisTinggal rows

                $key9 = JenisTinggalPeer::getPrimaryKeyHashFromRow($row, $startcol9);
                if ($key9 !== null) {
                    $obj9 = JenisTinggalPeer::getInstanceFromPool($key9);
                    if (!$obj9) {
    
                        $cls = JenisTinggalPeer::getOMClass();

                    $obj9 = new $cls();
                    $obj9->hydrate($row, $startcol9);
                    JenisTinggalPeer::addInstanceToPool($obj9, $key9);
                } // if $obj9 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj9 (JenisTinggal)
                $obj9->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined AlatTransportasi rows

                $key10 = AlatTransportasiPeer::getPrimaryKeyHashFromRow($row, $startcol10);
                if ($key10 !== null) {
                    $obj10 = AlatTransportasiPeer::getInstanceFromPool($key10);
                    if (!$obj10) {
    
                        $cls = AlatTransportasiPeer::getOMClass();

                    $obj10 = new $cls();
                    $obj10->hydrate($row, $startcol10);
                    AlatTransportasiPeer::addInstanceToPool($obj10, $key10);
                } // if $obj10 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj10 (AlatTransportasi)
                $obj10->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined Pekerjaan rows

                $key11 = PekerjaanPeer::getPrimaryKeyHashFromRow($row, $startcol11);
                if ($key11 !== null) {
                    $obj11 = PekerjaanPeer::getInstanceFromPool($key11);
                    if (!$obj11) {
    
                        $cls = PekerjaanPeer::getOMClass();

                    $obj11 = new $cls();
                    $obj11->hydrate($row, $startcol11);
                    PekerjaanPeer::addInstanceToPool($obj11, $key11);
                } // if $obj11 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj11 (Pekerjaan)
                $obj11->addPesertaDidikRelatedByPekerjaanIdAyah($obj1);

            } // if joined row is not null

                // Add objects for joined JenjangPendidikan rows

                $key12 = JenjangPendidikanPeer::getPrimaryKeyHashFromRow($row, $startcol12);
                if ($key12 !== null) {
                    $obj12 = JenjangPendidikanPeer::getInstanceFromPool($key12);
                    if (!$obj12) {
    
                        $cls = JenjangPendidikanPeer::getOMClass();

                    $obj12 = new $cls();
                    $obj12->hydrate($row, $startcol12);
                    JenjangPendidikanPeer::addInstanceToPool($obj12, $key12);
                } // if $obj12 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj12 (JenjangPendidikan)
                $obj12->addPesertaDidikRelatedByJenjangPendidikanIbu($obj1);

            } // if joined row is not null

                // Add objects for joined Penghasilan rows

                $key13 = PenghasilanPeer::getPrimaryKeyHashFromRow($row, $startcol13);
                if ($key13 !== null) {
                    $obj13 = PenghasilanPeer::getInstanceFromPool($key13);
                    if (!$obj13) {
    
                        $cls = PenghasilanPeer::getOMClass();

                    $obj13 = new $cls();
                    $obj13->hydrate($row, $startcol13);
                    PenghasilanPeer::addInstanceToPool($obj13, $key13);
                } // if $obj13 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj13 (Penghasilan)
                $obj13->addPesertaDidikRelatedByPenghasilanIdWali($obj1);

            } // if joined row is not null

                // Add objects for joined Pekerjaan rows

                $key14 = PekerjaanPeer::getPrimaryKeyHashFromRow($row, $startcol14);
                if ($key14 !== null) {
                    $obj14 = PekerjaanPeer::getInstanceFromPool($key14);
                    if (!$obj14) {
    
                        $cls = PekerjaanPeer::getOMClass();

                    $obj14 = new $cls();
                    $obj14->hydrate($row, $startcol14);
                    PekerjaanPeer::addInstanceToPool($obj14, $key14);
                } // if $obj14 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj14 (Pekerjaan)
                $obj14->addPesertaDidikRelatedByPekerjaanIdIbu($obj1);

            } // if joined row is not null

                // Add objects for joined JenjangPendidikan rows

                $key15 = JenjangPendidikanPeer::getPrimaryKeyHashFromRow($row, $startcol15);
                if ($key15 !== null) {
                    $obj15 = JenjangPendidikanPeer::getInstanceFromPool($key15);
                    if (!$obj15) {
    
                        $cls = JenjangPendidikanPeer::getOMClass();

                    $obj15 = new $cls();
                    $obj15->hydrate($row, $startcol15);
                    JenjangPendidikanPeer::addInstanceToPool($obj15, $key15);
                } // if $obj15 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj15 (JenjangPendidikan)
                $obj15->addPesertaDidikRelatedByJenjangPendidikanAyah($obj1);

            } // if joined row is not null

                // Add objects for joined Penghasilan rows

                $key16 = PenghasilanPeer::getPrimaryKeyHashFromRow($row, $startcol16);
                if ($key16 !== null) {
                    $obj16 = PenghasilanPeer::getInstanceFromPool($key16);
                    if (!$obj16) {
    
                        $cls = PenghasilanPeer::getOMClass();

                    $obj16 = new $cls();
                    $obj16->hydrate($row, $startcol16);
                    PenghasilanPeer::addInstanceToPool($obj16, $key16);
                } // if $obj16 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj16 (Penghasilan)
                $obj16->addPesertaDidikRelatedByPenghasilanIdIbu($obj1);

            } // if joined row is not null

                // Add objects for joined Pekerjaan rows

                $key17 = PekerjaanPeer::getPrimaryKeyHashFromRow($row, $startcol17);
                if ($key17 !== null) {
                    $obj17 = PekerjaanPeer::getInstanceFromPool($key17);
                    if (!$obj17) {
    
                        $cls = PekerjaanPeer::getOMClass();

                    $obj17 = new $cls();
                    $obj17->hydrate($row, $startcol17);
                    PekerjaanPeer::addInstanceToPool($obj17, $key17);
                } // if $obj17 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj17 (Pekerjaan)
                $obj17->addPesertaDidikRelatedByPekerjaanIdWali($obj1);

            } // if joined row is not null

                // Add objects for joined JenjangPendidikan rows

                $key18 = JenjangPendidikanPeer::getPrimaryKeyHashFromRow($row, $startcol18);
                if ($key18 !== null) {
                    $obj18 = JenjangPendidikanPeer::getInstanceFromPool($key18);
                    if (!$obj18) {
    
                        $cls = JenjangPendidikanPeer::getOMClass();

                    $obj18 = new $cls();
                    $obj18->hydrate($row, $startcol18);
                    JenjangPendidikanPeer::addInstanceToPool($obj18, $key18);
                } // if $obj18 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj18 (JenjangPendidikan)
                $obj18->addPesertaDidikRelatedByJenjangPendidikanWali($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of PesertaDidik objects pre-filled with all related objects except KebutuhanKhususRelatedByKebutuhanKhususIdIbu.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of PesertaDidik objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptKebutuhanKhususRelatedByKebutuhanKhususIdIbu(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PesertaDidikPeer::DATABASE_NAME);
        }

        PesertaDidikPeer::addSelectColumns($criteria);
        $startcol2 = PesertaDidikPeer::NUM_HYDRATE_COLUMNS;

        NegaraPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + NegaraPeer::NUM_HYDRATE_COLUMNS;

        AlasanLayakPipPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + AlasanLayakPipPeer::NUM_HYDRATE_COLUMNS;

        BankPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + BankPeer::NUM_HYDRATE_COLUMNS;

        MstWilayahPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + MstWilayahPeer::NUM_HYDRATE_COLUMNS;

        PekerjaanPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + PekerjaanPeer::NUM_HYDRATE_COLUMNS;

        AgamaPeer::addSelectColumns($criteria);
        $startcol8 = $startcol7 + AgamaPeer::NUM_HYDRATE_COLUMNS;

        PenghasilanPeer::addSelectColumns($criteria);
        $startcol9 = $startcol8 + PenghasilanPeer::NUM_HYDRATE_COLUMNS;

        JenisTinggalPeer::addSelectColumns($criteria);
        $startcol10 = $startcol9 + JenisTinggalPeer::NUM_HYDRATE_COLUMNS;

        AlatTransportasiPeer::addSelectColumns($criteria);
        $startcol11 = $startcol10 + AlatTransportasiPeer::NUM_HYDRATE_COLUMNS;

        PekerjaanPeer::addSelectColumns($criteria);
        $startcol12 = $startcol11 + PekerjaanPeer::NUM_HYDRATE_COLUMNS;

        JenjangPendidikanPeer::addSelectColumns($criteria);
        $startcol13 = $startcol12 + JenjangPendidikanPeer::NUM_HYDRATE_COLUMNS;

        PenghasilanPeer::addSelectColumns($criteria);
        $startcol14 = $startcol13 + PenghasilanPeer::NUM_HYDRATE_COLUMNS;

        PekerjaanPeer::addSelectColumns($criteria);
        $startcol15 = $startcol14 + PekerjaanPeer::NUM_HYDRATE_COLUMNS;

        JenjangPendidikanPeer::addSelectColumns($criteria);
        $startcol16 = $startcol15 + JenjangPendidikanPeer::NUM_HYDRATE_COLUMNS;

        PenghasilanPeer::addSelectColumns($criteria);
        $startcol17 = $startcol16 + PenghasilanPeer::NUM_HYDRATE_COLUMNS;

        PekerjaanPeer::addSelectColumns($criteria);
        $startcol18 = $startcol17 + PekerjaanPeer::NUM_HYDRATE_COLUMNS;

        JenjangPendidikanPeer::addSelectColumns($criteria);
        $startcol19 = $startcol18 + JenjangPendidikanPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(PesertaDidikPeer::KEWARGANEGARAAN, NegaraPeer::NEGARA_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::ID_LAYAK_PIP, AlasanLayakPipPeer::ID_LAYAK_PIP, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::ID_BANK, BankPeer::ID_BANK, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::AGAMA_ID, AgamaPeer::AGAMA_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PENGHASILAN_ID_AYAH, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENIS_TINGGAL_ID, JenisTinggalPeer::JENIS_TINGGAL_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::ALAT_TRANSPORTASI_ID, AlatTransportasiPeer::ALAT_TRANSPORTASI_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID_AYAH, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENJANG_PENDIDIKAN_IBU, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PENGHASILAN_ID_WALI, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID_IBU, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENJANG_PENDIDIKAN_AYAH, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PENGHASILAN_ID_IBU, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID_WALI, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENJANG_PENDIDIKAN_WALI, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PesertaDidikPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PesertaDidikPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = PesertaDidikPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PesertaDidikPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Negara rows

                $key2 = NegaraPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = NegaraPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = NegaraPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    NegaraPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj2 (Negara)
                $obj2->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined AlasanLayakPip rows

                $key3 = AlasanLayakPipPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = AlasanLayakPipPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = AlasanLayakPipPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    AlasanLayakPipPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj3 (AlasanLayakPip)
                $obj3->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined Bank rows

                $key4 = BankPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = BankPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = BankPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    BankPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj4 (Bank)
                $obj4->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined MstWilayah rows

                $key5 = MstWilayahPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = MstWilayahPeer::getInstanceFromPool($key5);
                    if (!$obj5) {
    
                        $cls = MstWilayahPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    MstWilayahPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj5 (MstWilayah)
                $obj5->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined Pekerjaan rows

                $key6 = PekerjaanPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = PekerjaanPeer::getInstanceFromPool($key6);
                    if (!$obj6) {
    
                        $cls = PekerjaanPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    PekerjaanPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj6 (Pekerjaan)
                $obj6->addPesertaDidikRelatedByPekerjaanId($obj1);

            } // if joined row is not null

                // Add objects for joined Agama rows

                $key7 = AgamaPeer::getPrimaryKeyHashFromRow($row, $startcol7);
                if ($key7 !== null) {
                    $obj7 = AgamaPeer::getInstanceFromPool($key7);
                    if (!$obj7) {
    
                        $cls = AgamaPeer::getOMClass();

                    $obj7 = new $cls();
                    $obj7->hydrate($row, $startcol7);
                    AgamaPeer::addInstanceToPool($obj7, $key7);
                } // if $obj7 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj7 (Agama)
                $obj7->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined Penghasilan rows

                $key8 = PenghasilanPeer::getPrimaryKeyHashFromRow($row, $startcol8);
                if ($key8 !== null) {
                    $obj8 = PenghasilanPeer::getInstanceFromPool($key8);
                    if (!$obj8) {
    
                        $cls = PenghasilanPeer::getOMClass();

                    $obj8 = new $cls();
                    $obj8->hydrate($row, $startcol8);
                    PenghasilanPeer::addInstanceToPool($obj8, $key8);
                } // if $obj8 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj8 (Penghasilan)
                $obj8->addPesertaDidikRelatedByPenghasilanIdAyah($obj1);

            } // if joined row is not null

                // Add objects for joined JenisTinggal rows

                $key9 = JenisTinggalPeer::getPrimaryKeyHashFromRow($row, $startcol9);
                if ($key9 !== null) {
                    $obj9 = JenisTinggalPeer::getInstanceFromPool($key9);
                    if (!$obj9) {
    
                        $cls = JenisTinggalPeer::getOMClass();

                    $obj9 = new $cls();
                    $obj9->hydrate($row, $startcol9);
                    JenisTinggalPeer::addInstanceToPool($obj9, $key9);
                } // if $obj9 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj9 (JenisTinggal)
                $obj9->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined AlatTransportasi rows

                $key10 = AlatTransportasiPeer::getPrimaryKeyHashFromRow($row, $startcol10);
                if ($key10 !== null) {
                    $obj10 = AlatTransportasiPeer::getInstanceFromPool($key10);
                    if (!$obj10) {
    
                        $cls = AlatTransportasiPeer::getOMClass();

                    $obj10 = new $cls();
                    $obj10->hydrate($row, $startcol10);
                    AlatTransportasiPeer::addInstanceToPool($obj10, $key10);
                } // if $obj10 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj10 (AlatTransportasi)
                $obj10->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined Pekerjaan rows

                $key11 = PekerjaanPeer::getPrimaryKeyHashFromRow($row, $startcol11);
                if ($key11 !== null) {
                    $obj11 = PekerjaanPeer::getInstanceFromPool($key11);
                    if (!$obj11) {
    
                        $cls = PekerjaanPeer::getOMClass();

                    $obj11 = new $cls();
                    $obj11->hydrate($row, $startcol11);
                    PekerjaanPeer::addInstanceToPool($obj11, $key11);
                } // if $obj11 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj11 (Pekerjaan)
                $obj11->addPesertaDidikRelatedByPekerjaanIdAyah($obj1);

            } // if joined row is not null

                // Add objects for joined JenjangPendidikan rows

                $key12 = JenjangPendidikanPeer::getPrimaryKeyHashFromRow($row, $startcol12);
                if ($key12 !== null) {
                    $obj12 = JenjangPendidikanPeer::getInstanceFromPool($key12);
                    if (!$obj12) {
    
                        $cls = JenjangPendidikanPeer::getOMClass();

                    $obj12 = new $cls();
                    $obj12->hydrate($row, $startcol12);
                    JenjangPendidikanPeer::addInstanceToPool($obj12, $key12);
                } // if $obj12 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj12 (JenjangPendidikan)
                $obj12->addPesertaDidikRelatedByJenjangPendidikanIbu($obj1);

            } // if joined row is not null

                // Add objects for joined Penghasilan rows

                $key13 = PenghasilanPeer::getPrimaryKeyHashFromRow($row, $startcol13);
                if ($key13 !== null) {
                    $obj13 = PenghasilanPeer::getInstanceFromPool($key13);
                    if (!$obj13) {
    
                        $cls = PenghasilanPeer::getOMClass();

                    $obj13 = new $cls();
                    $obj13->hydrate($row, $startcol13);
                    PenghasilanPeer::addInstanceToPool($obj13, $key13);
                } // if $obj13 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj13 (Penghasilan)
                $obj13->addPesertaDidikRelatedByPenghasilanIdWali($obj1);

            } // if joined row is not null

                // Add objects for joined Pekerjaan rows

                $key14 = PekerjaanPeer::getPrimaryKeyHashFromRow($row, $startcol14);
                if ($key14 !== null) {
                    $obj14 = PekerjaanPeer::getInstanceFromPool($key14);
                    if (!$obj14) {
    
                        $cls = PekerjaanPeer::getOMClass();

                    $obj14 = new $cls();
                    $obj14->hydrate($row, $startcol14);
                    PekerjaanPeer::addInstanceToPool($obj14, $key14);
                } // if $obj14 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj14 (Pekerjaan)
                $obj14->addPesertaDidikRelatedByPekerjaanIdIbu($obj1);

            } // if joined row is not null

                // Add objects for joined JenjangPendidikan rows

                $key15 = JenjangPendidikanPeer::getPrimaryKeyHashFromRow($row, $startcol15);
                if ($key15 !== null) {
                    $obj15 = JenjangPendidikanPeer::getInstanceFromPool($key15);
                    if (!$obj15) {
    
                        $cls = JenjangPendidikanPeer::getOMClass();

                    $obj15 = new $cls();
                    $obj15->hydrate($row, $startcol15);
                    JenjangPendidikanPeer::addInstanceToPool($obj15, $key15);
                } // if $obj15 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj15 (JenjangPendidikan)
                $obj15->addPesertaDidikRelatedByJenjangPendidikanAyah($obj1);

            } // if joined row is not null

                // Add objects for joined Penghasilan rows

                $key16 = PenghasilanPeer::getPrimaryKeyHashFromRow($row, $startcol16);
                if ($key16 !== null) {
                    $obj16 = PenghasilanPeer::getInstanceFromPool($key16);
                    if (!$obj16) {
    
                        $cls = PenghasilanPeer::getOMClass();

                    $obj16 = new $cls();
                    $obj16->hydrate($row, $startcol16);
                    PenghasilanPeer::addInstanceToPool($obj16, $key16);
                } // if $obj16 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj16 (Penghasilan)
                $obj16->addPesertaDidikRelatedByPenghasilanIdIbu($obj1);

            } // if joined row is not null

                // Add objects for joined Pekerjaan rows

                $key17 = PekerjaanPeer::getPrimaryKeyHashFromRow($row, $startcol17);
                if ($key17 !== null) {
                    $obj17 = PekerjaanPeer::getInstanceFromPool($key17);
                    if (!$obj17) {
    
                        $cls = PekerjaanPeer::getOMClass();

                    $obj17 = new $cls();
                    $obj17->hydrate($row, $startcol17);
                    PekerjaanPeer::addInstanceToPool($obj17, $key17);
                } // if $obj17 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj17 (Pekerjaan)
                $obj17->addPesertaDidikRelatedByPekerjaanIdWali($obj1);

            } // if joined row is not null

                // Add objects for joined JenjangPendidikan rows

                $key18 = JenjangPendidikanPeer::getPrimaryKeyHashFromRow($row, $startcol18);
                if ($key18 !== null) {
                    $obj18 = JenjangPendidikanPeer::getInstanceFromPool($key18);
                    if (!$obj18) {
    
                        $cls = JenjangPendidikanPeer::getOMClass();

                    $obj18 = new $cls();
                    $obj18->hydrate($row, $startcol18);
                    JenjangPendidikanPeer::addInstanceToPool($obj18, $key18);
                } // if $obj18 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj18 (JenjangPendidikan)
                $obj18->addPesertaDidikRelatedByJenjangPendidikanWali($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of PesertaDidik objects pre-filled with all related objects except Negara.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of PesertaDidik objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptNegara(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PesertaDidikPeer::DATABASE_NAME);
        }

        PesertaDidikPeer::addSelectColumns($criteria);
        $startcol2 = PesertaDidikPeer::NUM_HYDRATE_COLUMNS;

        KebutuhanKhususPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + KebutuhanKhususPeer::NUM_HYDRATE_COLUMNS;

        KebutuhanKhususPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + KebutuhanKhususPeer::NUM_HYDRATE_COLUMNS;

        AlasanLayakPipPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + AlasanLayakPipPeer::NUM_HYDRATE_COLUMNS;

        BankPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + BankPeer::NUM_HYDRATE_COLUMNS;

        MstWilayahPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + MstWilayahPeer::NUM_HYDRATE_COLUMNS;

        KebutuhanKhususPeer::addSelectColumns($criteria);
        $startcol8 = $startcol7 + KebutuhanKhususPeer::NUM_HYDRATE_COLUMNS;

        PekerjaanPeer::addSelectColumns($criteria);
        $startcol9 = $startcol8 + PekerjaanPeer::NUM_HYDRATE_COLUMNS;

        AgamaPeer::addSelectColumns($criteria);
        $startcol10 = $startcol9 + AgamaPeer::NUM_HYDRATE_COLUMNS;

        PenghasilanPeer::addSelectColumns($criteria);
        $startcol11 = $startcol10 + PenghasilanPeer::NUM_HYDRATE_COLUMNS;

        JenisTinggalPeer::addSelectColumns($criteria);
        $startcol12 = $startcol11 + JenisTinggalPeer::NUM_HYDRATE_COLUMNS;

        AlatTransportasiPeer::addSelectColumns($criteria);
        $startcol13 = $startcol12 + AlatTransportasiPeer::NUM_HYDRATE_COLUMNS;

        PekerjaanPeer::addSelectColumns($criteria);
        $startcol14 = $startcol13 + PekerjaanPeer::NUM_HYDRATE_COLUMNS;

        JenjangPendidikanPeer::addSelectColumns($criteria);
        $startcol15 = $startcol14 + JenjangPendidikanPeer::NUM_HYDRATE_COLUMNS;

        PenghasilanPeer::addSelectColumns($criteria);
        $startcol16 = $startcol15 + PenghasilanPeer::NUM_HYDRATE_COLUMNS;

        PekerjaanPeer::addSelectColumns($criteria);
        $startcol17 = $startcol16 + PekerjaanPeer::NUM_HYDRATE_COLUMNS;

        JenjangPendidikanPeer::addSelectColumns($criteria);
        $startcol18 = $startcol17 + JenjangPendidikanPeer::NUM_HYDRATE_COLUMNS;

        PenghasilanPeer::addSelectColumns($criteria);
        $startcol19 = $startcol18 + PenghasilanPeer::NUM_HYDRATE_COLUMNS;

        PekerjaanPeer::addSelectColumns($criteria);
        $startcol20 = $startcol19 + PekerjaanPeer::NUM_HYDRATE_COLUMNS;

        JenjangPendidikanPeer::addSelectColumns($criteria);
        $startcol21 = $startcol20 + JenjangPendidikanPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID_AYAH, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID_IBU, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::ID_LAYAK_PIP, AlasanLayakPipPeer::ID_LAYAK_PIP, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::ID_BANK, BankPeer::ID_BANK, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::AGAMA_ID, AgamaPeer::AGAMA_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PENGHASILAN_ID_AYAH, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENIS_TINGGAL_ID, JenisTinggalPeer::JENIS_TINGGAL_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::ALAT_TRANSPORTASI_ID, AlatTransportasiPeer::ALAT_TRANSPORTASI_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID_AYAH, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENJANG_PENDIDIKAN_IBU, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PENGHASILAN_ID_WALI, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID_IBU, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENJANG_PENDIDIKAN_AYAH, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PENGHASILAN_ID_IBU, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID_WALI, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENJANG_PENDIDIKAN_WALI, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PesertaDidikPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PesertaDidikPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = PesertaDidikPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PesertaDidikPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined KebutuhanKhusus rows

                $key2 = KebutuhanKhususPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = KebutuhanKhususPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = KebutuhanKhususPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    KebutuhanKhususPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj2 (KebutuhanKhusus)
                $obj2->addPesertaDidikRelatedByKebutuhanKhususIdAyah($obj1);

            } // if joined row is not null

                // Add objects for joined KebutuhanKhusus rows

                $key3 = KebutuhanKhususPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = KebutuhanKhususPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = KebutuhanKhususPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    KebutuhanKhususPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj3 (KebutuhanKhusus)
                $obj3->addPesertaDidikRelatedByKebutuhanKhususIdIbu($obj1);

            } // if joined row is not null

                // Add objects for joined AlasanLayakPip rows

                $key4 = AlasanLayakPipPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = AlasanLayakPipPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = AlasanLayakPipPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    AlasanLayakPipPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj4 (AlasanLayakPip)
                $obj4->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined Bank rows

                $key5 = BankPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = BankPeer::getInstanceFromPool($key5);
                    if (!$obj5) {
    
                        $cls = BankPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    BankPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj5 (Bank)
                $obj5->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined MstWilayah rows

                $key6 = MstWilayahPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = MstWilayahPeer::getInstanceFromPool($key6);
                    if (!$obj6) {
    
                        $cls = MstWilayahPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    MstWilayahPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj6 (MstWilayah)
                $obj6->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined KebutuhanKhusus rows

                $key7 = KebutuhanKhususPeer::getPrimaryKeyHashFromRow($row, $startcol7);
                if ($key7 !== null) {
                    $obj7 = KebutuhanKhususPeer::getInstanceFromPool($key7);
                    if (!$obj7) {
    
                        $cls = KebutuhanKhususPeer::getOMClass();

                    $obj7 = new $cls();
                    $obj7->hydrate($row, $startcol7);
                    KebutuhanKhususPeer::addInstanceToPool($obj7, $key7);
                } // if $obj7 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj7 (KebutuhanKhusus)
                $obj7->addPesertaDidikRelatedByKebutuhanKhususId($obj1);

            } // if joined row is not null

                // Add objects for joined Pekerjaan rows

                $key8 = PekerjaanPeer::getPrimaryKeyHashFromRow($row, $startcol8);
                if ($key8 !== null) {
                    $obj8 = PekerjaanPeer::getInstanceFromPool($key8);
                    if (!$obj8) {
    
                        $cls = PekerjaanPeer::getOMClass();

                    $obj8 = new $cls();
                    $obj8->hydrate($row, $startcol8);
                    PekerjaanPeer::addInstanceToPool($obj8, $key8);
                } // if $obj8 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj8 (Pekerjaan)
                $obj8->addPesertaDidikRelatedByPekerjaanId($obj1);

            } // if joined row is not null

                // Add objects for joined Agama rows

                $key9 = AgamaPeer::getPrimaryKeyHashFromRow($row, $startcol9);
                if ($key9 !== null) {
                    $obj9 = AgamaPeer::getInstanceFromPool($key9);
                    if (!$obj9) {
    
                        $cls = AgamaPeer::getOMClass();

                    $obj9 = new $cls();
                    $obj9->hydrate($row, $startcol9);
                    AgamaPeer::addInstanceToPool($obj9, $key9);
                } // if $obj9 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj9 (Agama)
                $obj9->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined Penghasilan rows

                $key10 = PenghasilanPeer::getPrimaryKeyHashFromRow($row, $startcol10);
                if ($key10 !== null) {
                    $obj10 = PenghasilanPeer::getInstanceFromPool($key10);
                    if (!$obj10) {
    
                        $cls = PenghasilanPeer::getOMClass();

                    $obj10 = new $cls();
                    $obj10->hydrate($row, $startcol10);
                    PenghasilanPeer::addInstanceToPool($obj10, $key10);
                } // if $obj10 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj10 (Penghasilan)
                $obj10->addPesertaDidikRelatedByPenghasilanIdAyah($obj1);

            } // if joined row is not null

                // Add objects for joined JenisTinggal rows

                $key11 = JenisTinggalPeer::getPrimaryKeyHashFromRow($row, $startcol11);
                if ($key11 !== null) {
                    $obj11 = JenisTinggalPeer::getInstanceFromPool($key11);
                    if (!$obj11) {
    
                        $cls = JenisTinggalPeer::getOMClass();

                    $obj11 = new $cls();
                    $obj11->hydrate($row, $startcol11);
                    JenisTinggalPeer::addInstanceToPool($obj11, $key11);
                } // if $obj11 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj11 (JenisTinggal)
                $obj11->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined AlatTransportasi rows

                $key12 = AlatTransportasiPeer::getPrimaryKeyHashFromRow($row, $startcol12);
                if ($key12 !== null) {
                    $obj12 = AlatTransportasiPeer::getInstanceFromPool($key12);
                    if (!$obj12) {
    
                        $cls = AlatTransportasiPeer::getOMClass();

                    $obj12 = new $cls();
                    $obj12->hydrate($row, $startcol12);
                    AlatTransportasiPeer::addInstanceToPool($obj12, $key12);
                } // if $obj12 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj12 (AlatTransportasi)
                $obj12->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined Pekerjaan rows

                $key13 = PekerjaanPeer::getPrimaryKeyHashFromRow($row, $startcol13);
                if ($key13 !== null) {
                    $obj13 = PekerjaanPeer::getInstanceFromPool($key13);
                    if (!$obj13) {
    
                        $cls = PekerjaanPeer::getOMClass();

                    $obj13 = new $cls();
                    $obj13->hydrate($row, $startcol13);
                    PekerjaanPeer::addInstanceToPool($obj13, $key13);
                } // if $obj13 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj13 (Pekerjaan)
                $obj13->addPesertaDidikRelatedByPekerjaanIdAyah($obj1);

            } // if joined row is not null

                // Add objects for joined JenjangPendidikan rows

                $key14 = JenjangPendidikanPeer::getPrimaryKeyHashFromRow($row, $startcol14);
                if ($key14 !== null) {
                    $obj14 = JenjangPendidikanPeer::getInstanceFromPool($key14);
                    if (!$obj14) {
    
                        $cls = JenjangPendidikanPeer::getOMClass();

                    $obj14 = new $cls();
                    $obj14->hydrate($row, $startcol14);
                    JenjangPendidikanPeer::addInstanceToPool($obj14, $key14);
                } // if $obj14 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj14 (JenjangPendidikan)
                $obj14->addPesertaDidikRelatedByJenjangPendidikanIbu($obj1);

            } // if joined row is not null

                // Add objects for joined Penghasilan rows

                $key15 = PenghasilanPeer::getPrimaryKeyHashFromRow($row, $startcol15);
                if ($key15 !== null) {
                    $obj15 = PenghasilanPeer::getInstanceFromPool($key15);
                    if (!$obj15) {
    
                        $cls = PenghasilanPeer::getOMClass();

                    $obj15 = new $cls();
                    $obj15->hydrate($row, $startcol15);
                    PenghasilanPeer::addInstanceToPool($obj15, $key15);
                } // if $obj15 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj15 (Penghasilan)
                $obj15->addPesertaDidikRelatedByPenghasilanIdWali($obj1);

            } // if joined row is not null

                // Add objects for joined Pekerjaan rows

                $key16 = PekerjaanPeer::getPrimaryKeyHashFromRow($row, $startcol16);
                if ($key16 !== null) {
                    $obj16 = PekerjaanPeer::getInstanceFromPool($key16);
                    if (!$obj16) {
    
                        $cls = PekerjaanPeer::getOMClass();

                    $obj16 = new $cls();
                    $obj16->hydrate($row, $startcol16);
                    PekerjaanPeer::addInstanceToPool($obj16, $key16);
                } // if $obj16 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj16 (Pekerjaan)
                $obj16->addPesertaDidikRelatedByPekerjaanIdIbu($obj1);

            } // if joined row is not null

                // Add objects for joined JenjangPendidikan rows

                $key17 = JenjangPendidikanPeer::getPrimaryKeyHashFromRow($row, $startcol17);
                if ($key17 !== null) {
                    $obj17 = JenjangPendidikanPeer::getInstanceFromPool($key17);
                    if (!$obj17) {
    
                        $cls = JenjangPendidikanPeer::getOMClass();

                    $obj17 = new $cls();
                    $obj17->hydrate($row, $startcol17);
                    JenjangPendidikanPeer::addInstanceToPool($obj17, $key17);
                } // if $obj17 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj17 (JenjangPendidikan)
                $obj17->addPesertaDidikRelatedByJenjangPendidikanAyah($obj1);

            } // if joined row is not null

                // Add objects for joined Penghasilan rows

                $key18 = PenghasilanPeer::getPrimaryKeyHashFromRow($row, $startcol18);
                if ($key18 !== null) {
                    $obj18 = PenghasilanPeer::getInstanceFromPool($key18);
                    if (!$obj18) {
    
                        $cls = PenghasilanPeer::getOMClass();

                    $obj18 = new $cls();
                    $obj18->hydrate($row, $startcol18);
                    PenghasilanPeer::addInstanceToPool($obj18, $key18);
                } // if $obj18 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj18 (Penghasilan)
                $obj18->addPesertaDidikRelatedByPenghasilanIdIbu($obj1);

            } // if joined row is not null

                // Add objects for joined Pekerjaan rows

                $key19 = PekerjaanPeer::getPrimaryKeyHashFromRow($row, $startcol19);
                if ($key19 !== null) {
                    $obj19 = PekerjaanPeer::getInstanceFromPool($key19);
                    if (!$obj19) {
    
                        $cls = PekerjaanPeer::getOMClass();

                    $obj19 = new $cls();
                    $obj19->hydrate($row, $startcol19);
                    PekerjaanPeer::addInstanceToPool($obj19, $key19);
                } // if $obj19 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj19 (Pekerjaan)
                $obj19->addPesertaDidikRelatedByPekerjaanIdWali($obj1);

            } // if joined row is not null

                // Add objects for joined JenjangPendidikan rows

                $key20 = JenjangPendidikanPeer::getPrimaryKeyHashFromRow($row, $startcol20);
                if ($key20 !== null) {
                    $obj20 = JenjangPendidikanPeer::getInstanceFromPool($key20);
                    if (!$obj20) {
    
                        $cls = JenjangPendidikanPeer::getOMClass();

                    $obj20 = new $cls();
                    $obj20->hydrate($row, $startcol20);
                    JenjangPendidikanPeer::addInstanceToPool($obj20, $key20);
                } // if $obj20 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj20 (JenjangPendidikan)
                $obj20->addPesertaDidikRelatedByJenjangPendidikanWali($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of PesertaDidik objects pre-filled with all related objects except AlasanLayakPip.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of PesertaDidik objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptAlasanLayakPip(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PesertaDidikPeer::DATABASE_NAME);
        }

        PesertaDidikPeer::addSelectColumns($criteria);
        $startcol2 = PesertaDidikPeer::NUM_HYDRATE_COLUMNS;

        KebutuhanKhususPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + KebutuhanKhususPeer::NUM_HYDRATE_COLUMNS;

        KebutuhanKhususPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + KebutuhanKhususPeer::NUM_HYDRATE_COLUMNS;

        NegaraPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + NegaraPeer::NUM_HYDRATE_COLUMNS;

        BankPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + BankPeer::NUM_HYDRATE_COLUMNS;

        MstWilayahPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + MstWilayahPeer::NUM_HYDRATE_COLUMNS;

        KebutuhanKhususPeer::addSelectColumns($criteria);
        $startcol8 = $startcol7 + KebutuhanKhususPeer::NUM_HYDRATE_COLUMNS;

        PekerjaanPeer::addSelectColumns($criteria);
        $startcol9 = $startcol8 + PekerjaanPeer::NUM_HYDRATE_COLUMNS;

        AgamaPeer::addSelectColumns($criteria);
        $startcol10 = $startcol9 + AgamaPeer::NUM_HYDRATE_COLUMNS;

        PenghasilanPeer::addSelectColumns($criteria);
        $startcol11 = $startcol10 + PenghasilanPeer::NUM_HYDRATE_COLUMNS;

        JenisTinggalPeer::addSelectColumns($criteria);
        $startcol12 = $startcol11 + JenisTinggalPeer::NUM_HYDRATE_COLUMNS;

        AlatTransportasiPeer::addSelectColumns($criteria);
        $startcol13 = $startcol12 + AlatTransportasiPeer::NUM_HYDRATE_COLUMNS;

        PekerjaanPeer::addSelectColumns($criteria);
        $startcol14 = $startcol13 + PekerjaanPeer::NUM_HYDRATE_COLUMNS;

        JenjangPendidikanPeer::addSelectColumns($criteria);
        $startcol15 = $startcol14 + JenjangPendidikanPeer::NUM_HYDRATE_COLUMNS;

        PenghasilanPeer::addSelectColumns($criteria);
        $startcol16 = $startcol15 + PenghasilanPeer::NUM_HYDRATE_COLUMNS;

        PekerjaanPeer::addSelectColumns($criteria);
        $startcol17 = $startcol16 + PekerjaanPeer::NUM_HYDRATE_COLUMNS;

        JenjangPendidikanPeer::addSelectColumns($criteria);
        $startcol18 = $startcol17 + JenjangPendidikanPeer::NUM_HYDRATE_COLUMNS;

        PenghasilanPeer::addSelectColumns($criteria);
        $startcol19 = $startcol18 + PenghasilanPeer::NUM_HYDRATE_COLUMNS;

        PekerjaanPeer::addSelectColumns($criteria);
        $startcol20 = $startcol19 + PekerjaanPeer::NUM_HYDRATE_COLUMNS;

        JenjangPendidikanPeer::addSelectColumns($criteria);
        $startcol21 = $startcol20 + JenjangPendidikanPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID_AYAH, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID_IBU, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KEWARGANEGARAAN, NegaraPeer::NEGARA_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::ID_BANK, BankPeer::ID_BANK, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::AGAMA_ID, AgamaPeer::AGAMA_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PENGHASILAN_ID_AYAH, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENIS_TINGGAL_ID, JenisTinggalPeer::JENIS_TINGGAL_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::ALAT_TRANSPORTASI_ID, AlatTransportasiPeer::ALAT_TRANSPORTASI_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID_AYAH, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENJANG_PENDIDIKAN_IBU, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PENGHASILAN_ID_WALI, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID_IBU, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENJANG_PENDIDIKAN_AYAH, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PENGHASILAN_ID_IBU, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID_WALI, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENJANG_PENDIDIKAN_WALI, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PesertaDidikPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PesertaDidikPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = PesertaDidikPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PesertaDidikPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined KebutuhanKhusus rows

                $key2 = KebutuhanKhususPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = KebutuhanKhususPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = KebutuhanKhususPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    KebutuhanKhususPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj2 (KebutuhanKhusus)
                $obj2->addPesertaDidikRelatedByKebutuhanKhususIdAyah($obj1);

            } // if joined row is not null

                // Add objects for joined KebutuhanKhusus rows

                $key3 = KebutuhanKhususPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = KebutuhanKhususPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = KebutuhanKhususPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    KebutuhanKhususPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj3 (KebutuhanKhusus)
                $obj3->addPesertaDidikRelatedByKebutuhanKhususIdIbu($obj1);

            } // if joined row is not null

                // Add objects for joined Negara rows

                $key4 = NegaraPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = NegaraPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = NegaraPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    NegaraPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj4 (Negara)
                $obj4->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined Bank rows

                $key5 = BankPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = BankPeer::getInstanceFromPool($key5);
                    if (!$obj5) {
    
                        $cls = BankPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    BankPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj5 (Bank)
                $obj5->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined MstWilayah rows

                $key6 = MstWilayahPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = MstWilayahPeer::getInstanceFromPool($key6);
                    if (!$obj6) {
    
                        $cls = MstWilayahPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    MstWilayahPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj6 (MstWilayah)
                $obj6->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined KebutuhanKhusus rows

                $key7 = KebutuhanKhususPeer::getPrimaryKeyHashFromRow($row, $startcol7);
                if ($key7 !== null) {
                    $obj7 = KebutuhanKhususPeer::getInstanceFromPool($key7);
                    if (!$obj7) {
    
                        $cls = KebutuhanKhususPeer::getOMClass();

                    $obj7 = new $cls();
                    $obj7->hydrate($row, $startcol7);
                    KebutuhanKhususPeer::addInstanceToPool($obj7, $key7);
                } // if $obj7 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj7 (KebutuhanKhusus)
                $obj7->addPesertaDidikRelatedByKebutuhanKhususId($obj1);

            } // if joined row is not null

                // Add objects for joined Pekerjaan rows

                $key8 = PekerjaanPeer::getPrimaryKeyHashFromRow($row, $startcol8);
                if ($key8 !== null) {
                    $obj8 = PekerjaanPeer::getInstanceFromPool($key8);
                    if (!$obj8) {
    
                        $cls = PekerjaanPeer::getOMClass();

                    $obj8 = new $cls();
                    $obj8->hydrate($row, $startcol8);
                    PekerjaanPeer::addInstanceToPool($obj8, $key8);
                } // if $obj8 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj8 (Pekerjaan)
                $obj8->addPesertaDidikRelatedByPekerjaanId($obj1);

            } // if joined row is not null

                // Add objects for joined Agama rows

                $key9 = AgamaPeer::getPrimaryKeyHashFromRow($row, $startcol9);
                if ($key9 !== null) {
                    $obj9 = AgamaPeer::getInstanceFromPool($key9);
                    if (!$obj9) {
    
                        $cls = AgamaPeer::getOMClass();

                    $obj9 = new $cls();
                    $obj9->hydrate($row, $startcol9);
                    AgamaPeer::addInstanceToPool($obj9, $key9);
                } // if $obj9 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj9 (Agama)
                $obj9->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined Penghasilan rows

                $key10 = PenghasilanPeer::getPrimaryKeyHashFromRow($row, $startcol10);
                if ($key10 !== null) {
                    $obj10 = PenghasilanPeer::getInstanceFromPool($key10);
                    if (!$obj10) {
    
                        $cls = PenghasilanPeer::getOMClass();

                    $obj10 = new $cls();
                    $obj10->hydrate($row, $startcol10);
                    PenghasilanPeer::addInstanceToPool($obj10, $key10);
                } // if $obj10 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj10 (Penghasilan)
                $obj10->addPesertaDidikRelatedByPenghasilanIdAyah($obj1);

            } // if joined row is not null

                // Add objects for joined JenisTinggal rows

                $key11 = JenisTinggalPeer::getPrimaryKeyHashFromRow($row, $startcol11);
                if ($key11 !== null) {
                    $obj11 = JenisTinggalPeer::getInstanceFromPool($key11);
                    if (!$obj11) {
    
                        $cls = JenisTinggalPeer::getOMClass();

                    $obj11 = new $cls();
                    $obj11->hydrate($row, $startcol11);
                    JenisTinggalPeer::addInstanceToPool($obj11, $key11);
                } // if $obj11 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj11 (JenisTinggal)
                $obj11->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined AlatTransportasi rows

                $key12 = AlatTransportasiPeer::getPrimaryKeyHashFromRow($row, $startcol12);
                if ($key12 !== null) {
                    $obj12 = AlatTransportasiPeer::getInstanceFromPool($key12);
                    if (!$obj12) {
    
                        $cls = AlatTransportasiPeer::getOMClass();

                    $obj12 = new $cls();
                    $obj12->hydrate($row, $startcol12);
                    AlatTransportasiPeer::addInstanceToPool($obj12, $key12);
                } // if $obj12 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj12 (AlatTransportasi)
                $obj12->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined Pekerjaan rows

                $key13 = PekerjaanPeer::getPrimaryKeyHashFromRow($row, $startcol13);
                if ($key13 !== null) {
                    $obj13 = PekerjaanPeer::getInstanceFromPool($key13);
                    if (!$obj13) {
    
                        $cls = PekerjaanPeer::getOMClass();

                    $obj13 = new $cls();
                    $obj13->hydrate($row, $startcol13);
                    PekerjaanPeer::addInstanceToPool($obj13, $key13);
                } // if $obj13 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj13 (Pekerjaan)
                $obj13->addPesertaDidikRelatedByPekerjaanIdAyah($obj1);

            } // if joined row is not null

                // Add objects for joined JenjangPendidikan rows

                $key14 = JenjangPendidikanPeer::getPrimaryKeyHashFromRow($row, $startcol14);
                if ($key14 !== null) {
                    $obj14 = JenjangPendidikanPeer::getInstanceFromPool($key14);
                    if (!$obj14) {
    
                        $cls = JenjangPendidikanPeer::getOMClass();

                    $obj14 = new $cls();
                    $obj14->hydrate($row, $startcol14);
                    JenjangPendidikanPeer::addInstanceToPool($obj14, $key14);
                } // if $obj14 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj14 (JenjangPendidikan)
                $obj14->addPesertaDidikRelatedByJenjangPendidikanIbu($obj1);

            } // if joined row is not null

                // Add objects for joined Penghasilan rows

                $key15 = PenghasilanPeer::getPrimaryKeyHashFromRow($row, $startcol15);
                if ($key15 !== null) {
                    $obj15 = PenghasilanPeer::getInstanceFromPool($key15);
                    if (!$obj15) {
    
                        $cls = PenghasilanPeer::getOMClass();

                    $obj15 = new $cls();
                    $obj15->hydrate($row, $startcol15);
                    PenghasilanPeer::addInstanceToPool($obj15, $key15);
                } // if $obj15 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj15 (Penghasilan)
                $obj15->addPesertaDidikRelatedByPenghasilanIdWali($obj1);

            } // if joined row is not null

                // Add objects for joined Pekerjaan rows

                $key16 = PekerjaanPeer::getPrimaryKeyHashFromRow($row, $startcol16);
                if ($key16 !== null) {
                    $obj16 = PekerjaanPeer::getInstanceFromPool($key16);
                    if (!$obj16) {
    
                        $cls = PekerjaanPeer::getOMClass();

                    $obj16 = new $cls();
                    $obj16->hydrate($row, $startcol16);
                    PekerjaanPeer::addInstanceToPool($obj16, $key16);
                } // if $obj16 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj16 (Pekerjaan)
                $obj16->addPesertaDidikRelatedByPekerjaanIdIbu($obj1);

            } // if joined row is not null

                // Add objects for joined JenjangPendidikan rows

                $key17 = JenjangPendidikanPeer::getPrimaryKeyHashFromRow($row, $startcol17);
                if ($key17 !== null) {
                    $obj17 = JenjangPendidikanPeer::getInstanceFromPool($key17);
                    if (!$obj17) {
    
                        $cls = JenjangPendidikanPeer::getOMClass();

                    $obj17 = new $cls();
                    $obj17->hydrate($row, $startcol17);
                    JenjangPendidikanPeer::addInstanceToPool($obj17, $key17);
                } // if $obj17 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj17 (JenjangPendidikan)
                $obj17->addPesertaDidikRelatedByJenjangPendidikanAyah($obj1);

            } // if joined row is not null

                // Add objects for joined Penghasilan rows

                $key18 = PenghasilanPeer::getPrimaryKeyHashFromRow($row, $startcol18);
                if ($key18 !== null) {
                    $obj18 = PenghasilanPeer::getInstanceFromPool($key18);
                    if (!$obj18) {
    
                        $cls = PenghasilanPeer::getOMClass();

                    $obj18 = new $cls();
                    $obj18->hydrate($row, $startcol18);
                    PenghasilanPeer::addInstanceToPool($obj18, $key18);
                } // if $obj18 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj18 (Penghasilan)
                $obj18->addPesertaDidikRelatedByPenghasilanIdIbu($obj1);

            } // if joined row is not null

                // Add objects for joined Pekerjaan rows

                $key19 = PekerjaanPeer::getPrimaryKeyHashFromRow($row, $startcol19);
                if ($key19 !== null) {
                    $obj19 = PekerjaanPeer::getInstanceFromPool($key19);
                    if (!$obj19) {
    
                        $cls = PekerjaanPeer::getOMClass();

                    $obj19 = new $cls();
                    $obj19->hydrate($row, $startcol19);
                    PekerjaanPeer::addInstanceToPool($obj19, $key19);
                } // if $obj19 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj19 (Pekerjaan)
                $obj19->addPesertaDidikRelatedByPekerjaanIdWali($obj1);

            } // if joined row is not null

                // Add objects for joined JenjangPendidikan rows

                $key20 = JenjangPendidikanPeer::getPrimaryKeyHashFromRow($row, $startcol20);
                if ($key20 !== null) {
                    $obj20 = JenjangPendidikanPeer::getInstanceFromPool($key20);
                    if (!$obj20) {
    
                        $cls = JenjangPendidikanPeer::getOMClass();

                    $obj20 = new $cls();
                    $obj20->hydrate($row, $startcol20);
                    JenjangPendidikanPeer::addInstanceToPool($obj20, $key20);
                } // if $obj20 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj20 (JenjangPendidikan)
                $obj20->addPesertaDidikRelatedByJenjangPendidikanWali($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of PesertaDidik objects pre-filled with all related objects except Bank.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of PesertaDidik objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptBank(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PesertaDidikPeer::DATABASE_NAME);
        }

        PesertaDidikPeer::addSelectColumns($criteria);
        $startcol2 = PesertaDidikPeer::NUM_HYDRATE_COLUMNS;

        KebutuhanKhususPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + KebutuhanKhususPeer::NUM_HYDRATE_COLUMNS;

        KebutuhanKhususPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + KebutuhanKhususPeer::NUM_HYDRATE_COLUMNS;

        NegaraPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + NegaraPeer::NUM_HYDRATE_COLUMNS;

        AlasanLayakPipPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + AlasanLayakPipPeer::NUM_HYDRATE_COLUMNS;

        MstWilayahPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + MstWilayahPeer::NUM_HYDRATE_COLUMNS;

        KebutuhanKhususPeer::addSelectColumns($criteria);
        $startcol8 = $startcol7 + KebutuhanKhususPeer::NUM_HYDRATE_COLUMNS;

        PekerjaanPeer::addSelectColumns($criteria);
        $startcol9 = $startcol8 + PekerjaanPeer::NUM_HYDRATE_COLUMNS;

        AgamaPeer::addSelectColumns($criteria);
        $startcol10 = $startcol9 + AgamaPeer::NUM_HYDRATE_COLUMNS;

        PenghasilanPeer::addSelectColumns($criteria);
        $startcol11 = $startcol10 + PenghasilanPeer::NUM_HYDRATE_COLUMNS;

        JenisTinggalPeer::addSelectColumns($criteria);
        $startcol12 = $startcol11 + JenisTinggalPeer::NUM_HYDRATE_COLUMNS;

        AlatTransportasiPeer::addSelectColumns($criteria);
        $startcol13 = $startcol12 + AlatTransportasiPeer::NUM_HYDRATE_COLUMNS;

        PekerjaanPeer::addSelectColumns($criteria);
        $startcol14 = $startcol13 + PekerjaanPeer::NUM_HYDRATE_COLUMNS;

        JenjangPendidikanPeer::addSelectColumns($criteria);
        $startcol15 = $startcol14 + JenjangPendidikanPeer::NUM_HYDRATE_COLUMNS;

        PenghasilanPeer::addSelectColumns($criteria);
        $startcol16 = $startcol15 + PenghasilanPeer::NUM_HYDRATE_COLUMNS;

        PekerjaanPeer::addSelectColumns($criteria);
        $startcol17 = $startcol16 + PekerjaanPeer::NUM_HYDRATE_COLUMNS;

        JenjangPendidikanPeer::addSelectColumns($criteria);
        $startcol18 = $startcol17 + JenjangPendidikanPeer::NUM_HYDRATE_COLUMNS;

        PenghasilanPeer::addSelectColumns($criteria);
        $startcol19 = $startcol18 + PenghasilanPeer::NUM_HYDRATE_COLUMNS;

        PekerjaanPeer::addSelectColumns($criteria);
        $startcol20 = $startcol19 + PekerjaanPeer::NUM_HYDRATE_COLUMNS;

        JenjangPendidikanPeer::addSelectColumns($criteria);
        $startcol21 = $startcol20 + JenjangPendidikanPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID_AYAH, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID_IBU, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KEWARGANEGARAAN, NegaraPeer::NEGARA_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::ID_LAYAK_PIP, AlasanLayakPipPeer::ID_LAYAK_PIP, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::AGAMA_ID, AgamaPeer::AGAMA_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PENGHASILAN_ID_AYAH, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENIS_TINGGAL_ID, JenisTinggalPeer::JENIS_TINGGAL_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::ALAT_TRANSPORTASI_ID, AlatTransportasiPeer::ALAT_TRANSPORTASI_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID_AYAH, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENJANG_PENDIDIKAN_IBU, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PENGHASILAN_ID_WALI, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID_IBU, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENJANG_PENDIDIKAN_AYAH, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PENGHASILAN_ID_IBU, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID_WALI, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENJANG_PENDIDIKAN_WALI, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PesertaDidikPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PesertaDidikPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = PesertaDidikPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PesertaDidikPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined KebutuhanKhusus rows

                $key2 = KebutuhanKhususPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = KebutuhanKhususPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = KebutuhanKhususPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    KebutuhanKhususPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj2 (KebutuhanKhusus)
                $obj2->addPesertaDidikRelatedByKebutuhanKhususIdAyah($obj1);

            } // if joined row is not null

                // Add objects for joined KebutuhanKhusus rows

                $key3 = KebutuhanKhususPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = KebutuhanKhususPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = KebutuhanKhususPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    KebutuhanKhususPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj3 (KebutuhanKhusus)
                $obj3->addPesertaDidikRelatedByKebutuhanKhususIdIbu($obj1);

            } // if joined row is not null

                // Add objects for joined Negara rows

                $key4 = NegaraPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = NegaraPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = NegaraPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    NegaraPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj4 (Negara)
                $obj4->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined AlasanLayakPip rows

                $key5 = AlasanLayakPipPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = AlasanLayakPipPeer::getInstanceFromPool($key5);
                    if (!$obj5) {
    
                        $cls = AlasanLayakPipPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    AlasanLayakPipPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj5 (AlasanLayakPip)
                $obj5->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined MstWilayah rows

                $key6 = MstWilayahPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = MstWilayahPeer::getInstanceFromPool($key6);
                    if (!$obj6) {
    
                        $cls = MstWilayahPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    MstWilayahPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj6 (MstWilayah)
                $obj6->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined KebutuhanKhusus rows

                $key7 = KebutuhanKhususPeer::getPrimaryKeyHashFromRow($row, $startcol7);
                if ($key7 !== null) {
                    $obj7 = KebutuhanKhususPeer::getInstanceFromPool($key7);
                    if (!$obj7) {
    
                        $cls = KebutuhanKhususPeer::getOMClass();

                    $obj7 = new $cls();
                    $obj7->hydrate($row, $startcol7);
                    KebutuhanKhususPeer::addInstanceToPool($obj7, $key7);
                } // if $obj7 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj7 (KebutuhanKhusus)
                $obj7->addPesertaDidikRelatedByKebutuhanKhususId($obj1);

            } // if joined row is not null

                // Add objects for joined Pekerjaan rows

                $key8 = PekerjaanPeer::getPrimaryKeyHashFromRow($row, $startcol8);
                if ($key8 !== null) {
                    $obj8 = PekerjaanPeer::getInstanceFromPool($key8);
                    if (!$obj8) {
    
                        $cls = PekerjaanPeer::getOMClass();

                    $obj8 = new $cls();
                    $obj8->hydrate($row, $startcol8);
                    PekerjaanPeer::addInstanceToPool($obj8, $key8);
                } // if $obj8 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj8 (Pekerjaan)
                $obj8->addPesertaDidikRelatedByPekerjaanId($obj1);

            } // if joined row is not null

                // Add objects for joined Agama rows

                $key9 = AgamaPeer::getPrimaryKeyHashFromRow($row, $startcol9);
                if ($key9 !== null) {
                    $obj9 = AgamaPeer::getInstanceFromPool($key9);
                    if (!$obj9) {
    
                        $cls = AgamaPeer::getOMClass();

                    $obj9 = new $cls();
                    $obj9->hydrate($row, $startcol9);
                    AgamaPeer::addInstanceToPool($obj9, $key9);
                } // if $obj9 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj9 (Agama)
                $obj9->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined Penghasilan rows

                $key10 = PenghasilanPeer::getPrimaryKeyHashFromRow($row, $startcol10);
                if ($key10 !== null) {
                    $obj10 = PenghasilanPeer::getInstanceFromPool($key10);
                    if (!$obj10) {
    
                        $cls = PenghasilanPeer::getOMClass();

                    $obj10 = new $cls();
                    $obj10->hydrate($row, $startcol10);
                    PenghasilanPeer::addInstanceToPool($obj10, $key10);
                } // if $obj10 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj10 (Penghasilan)
                $obj10->addPesertaDidikRelatedByPenghasilanIdAyah($obj1);

            } // if joined row is not null

                // Add objects for joined JenisTinggal rows

                $key11 = JenisTinggalPeer::getPrimaryKeyHashFromRow($row, $startcol11);
                if ($key11 !== null) {
                    $obj11 = JenisTinggalPeer::getInstanceFromPool($key11);
                    if (!$obj11) {
    
                        $cls = JenisTinggalPeer::getOMClass();

                    $obj11 = new $cls();
                    $obj11->hydrate($row, $startcol11);
                    JenisTinggalPeer::addInstanceToPool($obj11, $key11);
                } // if $obj11 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj11 (JenisTinggal)
                $obj11->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined AlatTransportasi rows

                $key12 = AlatTransportasiPeer::getPrimaryKeyHashFromRow($row, $startcol12);
                if ($key12 !== null) {
                    $obj12 = AlatTransportasiPeer::getInstanceFromPool($key12);
                    if (!$obj12) {
    
                        $cls = AlatTransportasiPeer::getOMClass();

                    $obj12 = new $cls();
                    $obj12->hydrate($row, $startcol12);
                    AlatTransportasiPeer::addInstanceToPool($obj12, $key12);
                } // if $obj12 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj12 (AlatTransportasi)
                $obj12->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined Pekerjaan rows

                $key13 = PekerjaanPeer::getPrimaryKeyHashFromRow($row, $startcol13);
                if ($key13 !== null) {
                    $obj13 = PekerjaanPeer::getInstanceFromPool($key13);
                    if (!$obj13) {
    
                        $cls = PekerjaanPeer::getOMClass();

                    $obj13 = new $cls();
                    $obj13->hydrate($row, $startcol13);
                    PekerjaanPeer::addInstanceToPool($obj13, $key13);
                } // if $obj13 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj13 (Pekerjaan)
                $obj13->addPesertaDidikRelatedByPekerjaanIdAyah($obj1);

            } // if joined row is not null

                // Add objects for joined JenjangPendidikan rows

                $key14 = JenjangPendidikanPeer::getPrimaryKeyHashFromRow($row, $startcol14);
                if ($key14 !== null) {
                    $obj14 = JenjangPendidikanPeer::getInstanceFromPool($key14);
                    if (!$obj14) {
    
                        $cls = JenjangPendidikanPeer::getOMClass();

                    $obj14 = new $cls();
                    $obj14->hydrate($row, $startcol14);
                    JenjangPendidikanPeer::addInstanceToPool($obj14, $key14);
                } // if $obj14 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj14 (JenjangPendidikan)
                $obj14->addPesertaDidikRelatedByJenjangPendidikanIbu($obj1);

            } // if joined row is not null

                // Add objects for joined Penghasilan rows

                $key15 = PenghasilanPeer::getPrimaryKeyHashFromRow($row, $startcol15);
                if ($key15 !== null) {
                    $obj15 = PenghasilanPeer::getInstanceFromPool($key15);
                    if (!$obj15) {
    
                        $cls = PenghasilanPeer::getOMClass();

                    $obj15 = new $cls();
                    $obj15->hydrate($row, $startcol15);
                    PenghasilanPeer::addInstanceToPool($obj15, $key15);
                } // if $obj15 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj15 (Penghasilan)
                $obj15->addPesertaDidikRelatedByPenghasilanIdWali($obj1);

            } // if joined row is not null

                // Add objects for joined Pekerjaan rows

                $key16 = PekerjaanPeer::getPrimaryKeyHashFromRow($row, $startcol16);
                if ($key16 !== null) {
                    $obj16 = PekerjaanPeer::getInstanceFromPool($key16);
                    if (!$obj16) {
    
                        $cls = PekerjaanPeer::getOMClass();

                    $obj16 = new $cls();
                    $obj16->hydrate($row, $startcol16);
                    PekerjaanPeer::addInstanceToPool($obj16, $key16);
                } // if $obj16 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj16 (Pekerjaan)
                $obj16->addPesertaDidikRelatedByPekerjaanIdIbu($obj1);

            } // if joined row is not null

                // Add objects for joined JenjangPendidikan rows

                $key17 = JenjangPendidikanPeer::getPrimaryKeyHashFromRow($row, $startcol17);
                if ($key17 !== null) {
                    $obj17 = JenjangPendidikanPeer::getInstanceFromPool($key17);
                    if (!$obj17) {
    
                        $cls = JenjangPendidikanPeer::getOMClass();

                    $obj17 = new $cls();
                    $obj17->hydrate($row, $startcol17);
                    JenjangPendidikanPeer::addInstanceToPool($obj17, $key17);
                } // if $obj17 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj17 (JenjangPendidikan)
                $obj17->addPesertaDidikRelatedByJenjangPendidikanAyah($obj1);

            } // if joined row is not null

                // Add objects for joined Penghasilan rows

                $key18 = PenghasilanPeer::getPrimaryKeyHashFromRow($row, $startcol18);
                if ($key18 !== null) {
                    $obj18 = PenghasilanPeer::getInstanceFromPool($key18);
                    if (!$obj18) {
    
                        $cls = PenghasilanPeer::getOMClass();

                    $obj18 = new $cls();
                    $obj18->hydrate($row, $startcol18);
                    PenghasilanPeer::addInstanceToPool($obj18, $key18);
                } // if $obj18 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj18 (Penghasilan)
                $obj18->addPesertaDidikRelatedByPenghasilanIdIbu($obj1);

            } // if joined row is not null

                // Add objects for joined Pekerjaan rows

                $key19 = PekerjaanPeer::getPrimaryKeyHashFromRow($row, $startcol19);
                if ($key19 !== null) {
                    $obj19 = PekerjaanPeer::getInstanceFromPool($key19);
                    if (!$obj19) {
    
                        $cls = PekerjaanPeer::getOMClass();

                    $obj19 = new $cls();
                    $obj19->hydrate($row, $startcol19);
                    PekerjaanPeer::addInstanceToPool($obj19, $key19);
                } // if $obj19 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj19 (Pekerjaan)
                $obj19->addPesertaDidikRelatedByPekerjaanIdWali($obj1);

            } // if joined row is not null

                // Add objects for joined JenjangPendidikan rows

                $key20 = JenjangPendidikanPeer::getPrimaryKeyHashFromRow($row, $startcol20);
                if ($key20 !== null) {
                    $obj20 = JenjangPendidikanPeer::getInstanceFromPool($key20);
                    if (!$obj20) {
    
                        $cls = JenjangPendidikanPeer::getOMClass();

                    $obj20 = new $cls();
                    $obj20->hydrate($row, $startcol20);
                    JenjangPendidikanPeer::addInstanceToPool($obj20, $key20);
                } // if $obj20 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj20 (JenjangPendidikan)
                $obj20->addPesertaDidikRelatedByJenjangPendidikanWali($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of PesertaDidik objects pre-filled with all related objects except MstWilayah.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of PesertaDidik objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptMstWilayah(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PesertaDidikPeer::DATABASE_NAME);
        }

        PesertaDidikPeer::addSelectColumns($criteria);
        $startcol2 = PesertaDidikPeer::NUM_HYDRATE_COLUMNS;

        KebutuhanKhususPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + KebutuhanKhususPeer::NUM_HYDRATE_COLUMNS;

        KebutuhanKhususPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + KebutuhanKhususPeer::NUM_HYDRATE_COLUMNS;

        NegaraPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + NegaraPeer::NUM_HYDRATE_COLUMNS;

        AlasanLayakPipPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + AlasanLayakPipPeer::NUM_HYDRATE_COLUMNS;

        BankPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + BankPeer::NUM_HYDRATE_COLUMNS;

        KebutuhanKhususPeer::addSelectColumns($criteria);
        $startcol8 = $startcol7 + KebutuhanKhususPeer::NUM_HYDRATE_COLUMNS;

        PekerjaanPeer::addSelectColumns($criteria);
        $startcol9 = $startcol8 + PekerjaanPeer::NUM_HYDRATE_COLUMNS;

        AgamaPeer::addSelectColumns($criteria);
        $startcol10 = $startcol9 + AgamaPeer::NUM_HYDRATE_COLUMNS;

        PenghasilanPeer::addSelectColumns($criteria);
        $startcol11 = $startcol10 + PenghasilanPeer::NUM_HYDRATE_COLUMNS;

        JenisTinggalPeer::addSelectColumns($criteria);
        $startcol12 = $startcol11 + JenisTinggalPeer::NUM_HYDRATE_COLUMNS;

        AlatTransportasiPeer::addSelectColumns($criteria);
        $startcol13 = $startcol12 + AlatTransportasiPeer::NUM_HYDRATE_COLUMNS;

        PekerjaanPeer::addSelectColumns($criteria);
        $startcol14 = $startcol13 + PekerjaanPeer::NUM_HYDRATE_COLUMNS;

        JenjangPendidikanPeer::addSelectColumns($criteria);
        $startcol15 = $startcol14 + JenjangPendidikanPeer::NUM_HYDRATE_COLUMNS;

        PenghasilanPeer::addSelectColumns($criteria);
        $startcol16 = $startcol15 + PenghasilanPeer::NUM_HYDRATE_COLUMNS;

        PekerjaanPeer::addSelectColumns($criteria);
        $startcol17 = $startcol16 + PekerjaanPeer::NUM_HYDRATE_COLUMNS;

        JenjangPendidikanPeer::addSelectColumns($criteria);
        $startcol18 = $startcol17 + JenjangPendidikanPeer::NUM_HYDRATE_COLUMNS;

        PenghasilanPeer::addSelectColumns($criteria);
        $startcol19 = $startcol18 + PenghasilanPeer::NUM_HYDRATE_COLUMNS;

        PekerjaanPeer::addSelectColumns($criteria);
        $startcol20 = $startcol19 + PekerjaanPeer::NUM_HYDRATE_COLUMNS;

        JenjangPendidikanPeer::addSelectColumns($criteria);
        $startcol21 = $startcol20 + JenjangPendidikanPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID_AYAH, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID_IBU, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KEWARGANEGARAAN, NegaraPeer::NEGARA_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::ID_LAYAK_PIP, AlasanLayakPipPeer::ID_LAYAK_PIP, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::ID_BANK, BankPeer::ID_BANK, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::AGAMA_ID, AgamaPeer::AGAMA_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PENGHASILAN_ID_AYAH, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENIS_TINGGAL_ID, JenisTinggalPeer::JENIS_TINGGAL_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::ALAT_TRANSPORTASI_ID, AlatTransportasiPeer::ALAT_TRANSPORTASI_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID_AYAH, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENJANG_PENDIDIKAN_IBU, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PENGHASILAN_ID_WALI, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID_IBU, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENJANG_PENDIDIKAN_AYAH, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PENGHASILAN_ID_IBU, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID_WALI, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENJANG_PENDIDIKAN_WALI, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PesertaDidikPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PesertaDidikPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = PesertaDidikPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PesertaDidikPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined KebutuhanKhusus rows

                $key2 = KebutuhanKhususPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = KebutuhanKhususPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = KebutuhanKhususPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    KebutuhanKhususPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj2 (KebutuhanKhusus)
                $obj2->addPesertaDidikRelatedByKebutuhanKhususIdAyah($obj1);

            } // if joined row is not null

                // Add objects for joined KebutuhanKhusus rows

                $key3 = KebutuhanKhususPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = KebutuhanKhususPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = KebutuhanKhususPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    KebutuhanKhususPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj3 (KebutuhanKhusus)
                $obj3->addPesertaDidikRelatedByKebutuhanKhususIdIbu($obj1);

            } // if joined row is not null

                // Add objects for joined Negara rows

                $key4 = NegaraPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = NegaraPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = NegaraPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    NegaraPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj4 (Negara)
                $obj4->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined AlasanLayakPip rows

                $key5 = AlasanLayakPipPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = AlasanLayakPipPeer::getInstanceFromPool($key5);
                    if (!$obj5) {
    
                        $cls = AlasanLayakPipPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    AlasanLayakPipPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj5 (AlasanLayakPip)
                $obj5->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined Bank rows

                $key6 = BankPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = BankPeer::getInstanceFromPool($key6);
                    if (!$obj6) {
    
                        $cls = BankPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    BankPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj6 (Bank)
                $obj6->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined KebutuhanKhusus rows

                $key7 = KebutuhanKhususPeer::getPrimaryKeyHashFromRow($row, $startcol7);
                if ($key7 !== null) {
                    $obj7 = KebutuhanKhususPeer::getInstanceFromPool($key7);
                    if (!$obj7) {
    
                        $cls = KebutuhanKhususPeer::getOMClass();

                    $obj7 = new $cls();
                    $obj7->hydrate($row, $startcol7);
                    KebutuhanKhususPeer::addInstanceToPool($obj7, $key7);
                } // if $obj7 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj7 (KebutuhanKhusus)
                $obj7->addPesertaDidikRelatedByKebutuhanKhususId($obj1);

            } // if joined row is not null

                // Add objects for joined Pekerjaan rows

                $key8 = PekerjaanPeer::getPrimaryKeyHashFromRow($row, $startcol8);
                if ($key8 !== null) {
                    $obj8 = PekerjaanPeer::getInstanceFromPool($key8);
                    if (!$obj8) {
    
                        $cls = PekerjaanPeer::getOMClass();

                    $obj8 = new $cls();
                    $obj8->hydrate($row, $startcol8);
                    PekerjaanPeer::addInstanceToPool($obj8, $key8);
                } // if $obj8 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj8 (Pekerjaan)
                $obj8->addPesertaDidikRelatedByPekerjaanId($obj1);

            } // if joined row is not null

                // Add objects for joined Agama rows

                $key9 = AgamaPeer::getPrimaryKeyHashFromRow($row, $startcol9);
                if ($key9 !== null) {
                    $obj9 = AgamaPeer::getInstanceFromPool($key9);
                    if (!$obj9) {
    
                        $cls = AgamaPeer::getOMClass();

                    $obj9 = new $cls();
                    $obj9->hydrate($row, $startcol9);
                    AgamaPeer::addInstanceToPool($obj9, $key9);
                } // if $obj9 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj9 (Agama)
                $obj9->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined Penghasilan rows

                $key10 = PenghasilanPeer::getPrimaryKeyHashFromRow($row, $startcol10);
                if ($key10 !== null) {
                    $obj10 = PenghasilanPeer::getInstanceFromPool($key10);
                    if (!$obj10) {
    
                        $cls = PenghasilanPeer::getOMClass();

                    $obj10 = new $cls();
                    $obj10->hydrate($row, $startcol10);
                    PenghasilanPeer::addInstanceToPool($obj10, $key10);
                } // if $obj10 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj10 (Penghasilan)
                $obj10->addPesertaDidikRelatedByPenghasilanIdAyah($obj1);

            } // if joined row is not null

                // Add objects for joined JenisTinggal rows

                $key11 = JenisTinggalPeer::getPrimaryKeyHashFromRow($row, $startcol11);
                if ($key11 !== null) {
                    $obj11 = JenisTinggalPeer::getInstanceFromPool($key11);
                    if (!$obj11) {
    
                        $cls = JenisTinggalPeer::getOMClass();

                    $obj11 = new $cls();
                    $obj11->hydrate($row, $startcol11);
                    JenisTinggalPeer::addInstanceToPool($obj11, $key11);
                } // if $obj11 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj11 (JenisTinggal)
                $obj11->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined AlatTransportasi rows

                $key12 = AlatTransportasiPeer::getPrimaryKeyHashFromRow($row, $startcol12);
                if ($key12 !== null) {
                    $obj12 = AlatTransportasiPeer::getInstanceFromPool($key12);
                    if (!$obj12) {
    
                        $cls = AlatTransportasiPeer::getOMClass();

                    $obj12 = new $cls();
                    $obj12->hydrate($row, $startcol12);
                    AlatTransportasiPeer::addInstanceToPool($obj12, $key12);
                } // if $obj12 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj12 (AlatTransportasi)
                $obj12->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined Pekerjaan rows

                $key13 = PekerjaanPeer::getPrimaryKeyHashFromRow($row, $startcol13);
                if ($key13 !== null) {
                    $obj13 = PekerjaanPeer::getInstanceFromPool($key13);
                    if (!$obj13) {
    
                        $cls = PekerjaanPeer::getOMClass();

                    $obj13 = new $cls();
                    $obj13->hydrate($row, $startcol13);
                    PekerjaanPeer::addInstanceToPool($obj13, $key13);
                } // if $obj13 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj13 (Pekerjaan)
                $obj13->addPesertaDidikRelatedByPekerjaanIdAyah($obj1);

            } // if joined row is not null

                // Add objects for joined JenjangPendidikan rows

                $key14 = JenjangPendidikanPeer::getPrimaryKeyHashFromRow($row, $startcol14);
                if ($key14 !== null) {
                    $obj14 = JenjangPendidikanPeer::getInstanceFromPool($key14);
                    if (!$obj14) {
    
                        $cls = JenjangPendidikanPeer::getOMClass();

                    $obj14 = new $cls();
                    $obj14->hydrate($row, $startcol14);
                    JenjangPendidikanPeer::addInstanceToPool($obj14, $key14);
                } // if $obj14 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj14 (JenjangPendidikan)
                $obj14->addPesertaDidikRelatedByJenjangPendidikanIbu($obj1);

            } // if joined row is not null

                // Add objects for joined Penghasilan rows

                $key15 = PenghasilanPeer::getPrimaryKeyHashFromRow($row, $startcol15);
                if ($key15 !== null) {
                    $obj15 = PenghasilanPeer::getInstanceFromPool($key15);
                    if (!$obj15) {
    
                        $cls = PenghasilanPeer::getOMClass();

                    $obj15 = new $cls();
                    $obj15->hydrate($row, $startcol15);
                    PenghasilanPeer::addInstanceToPool($obj15, $key15);
                } // if $obj15 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj15 (Penghasilan)
                $obj15->addPesertaDidikRelatedByPenghasilanIdWali($obj1);

            } // if joined row is not null

                // Add objects for joined Pekerjaan rows

                $key16 = PekerjaanPeer::getPrimaryKeyHashFromRow($row, $startcol16);
                if ($key16 !== null) {
                    $obj16 = PekerjaanPeer::getInstanceFromPool($key16);
                    if (!$obj16) {
    
                        $cls = PekerjaanPeer::getOMClass();

                    $obj16 = new $cls();
                    $obj16->hydrate($row, $startcol16);
                    PekerjaanPeer::addInstanceToPool($obj16, $key16);
                } // if $obj16 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj16 (Pekerjaan)
                $obj16->addPesertaDidikRelatedByPekerjaanIdIbu($obj1);

            } // if joined row is not null

                // Add objects for joined JenjangPendidikan rows

                $key17 = JenjangPendidikanPeer::getPrimaryKeyHashFromRow($row, $startcol17);
                if ($key17 !== null) {
                    $obj17 = JenjangPendidikanPeer::getInstanceFromPool($key17);
                    if (!$obj17) {
    
                        $cls = JenjangPendidikanPeer::getOMClass();

                    $obj17 = new $cls();
                    $obj17->hydrate($row, $startcol17);
                    JenjangPendidikanPeer::addInstanceToPool($obj17, $key17);
                } // if $obj17 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj17 (JenjangPendidikan)
                $obj17->addPesertaDidikRelatedByJenjangPendidikanAyah($obj1);

            } // if joined row is not null

                // Add objects for joined Penghasilan rows

                $key18 = PenghasilanPeer::getPrimaryKeyHashFromRow($row, $startcol18);
                if ($key18 !== null) {
                    $obj18 = PenghasilanPeer::getInstanceFromPool($key18);
                    if (!$obj18) {
    
                        $cls = PenghasilanPeer::getOMClass();

                    $obj18 = new $cls();
                    $obj18->hydrate($row, $startcol18);
                    PenghasilanPeer::addInstanceToPool($obj18, $key18);
                } // if $obj18 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj18 (Penghasilan)
                $obj18->addPesertaDidikRelatedByPenghasilanIdIbu($obj1);

            } // if joined row is not null

                // Add objects for joined Pekerjaan rows

                $key19 = PekerjaanPeer::getPrimaryKeyHashFromRow($row, $startcol19);
                if ($key19 !== null) {
                    $obj19 = PekerjaanPeer::getInstanceFromPool($key19);
                    if (!$obj19) {
    
                        $cls = PekerjaanPeer::getOMClass();

                    $obj19 = new $cls();
                    $obj19->hydrate($row, $startcol19);
                    PekerjaanPeer::addInstanceToPool($obj19, $key19);
                } // if $obj19 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj19 (Pekerjaan)
                $obj19->addPesertaDidikRelatedByPekerjaanIdWali($obj1);

            } // if joined row is not null

                // Add objects for joined JenjangPendidikan rows

                $key20 = JenjangPendidikanPeer::getPrimaryKeyHashFromRow($row, $startcol20);
                if ($key20 !== null) {
                    $obj20 = JenjangPendidikanPeer::getInstanceFromPool($key20);
                    if (!$obj20) {
    
                        $cls = JenjangPendidikanPeer::getOMClass();

                    $obj20 = new $cls();
                    $obj20->hydrate($row, $startcol20);
                    JenjangPendidikanPeer::addInstanceToPool($obj20, $key20);
                } // if $obj20 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj20 (JenjangPendidikan)
                $obj20->addPesertaDidikRelatedByJenjangPendidikanWali($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of PesertaDidik objects pre-filled with all related objects except KebutuhanKhususRelatedByKebutuhanKhususId.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of PesertaDidik objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptKebutuhanKhususRelatedByKebutuhanKhususId(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PesertaDidikPeer::DATABASE_NAME);
        }

        PesertaDidikPeer::addSelectColumns($criteria);
        $startcol2 = PesertaDidikPeer::NUM_HYDRATE_COLUMNS;

        NegaraPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + NegaraPeer::NUM_HYDRATE_COLUMNS;

        AlasanLayakPipPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + AlasanLayakPipPeer::NUM_HYDRATE_COLUMNS;

        BankPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + BankPeer::NUM_HYDRATE_COLUMNS;

        MstWilayahPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + MstWilayahPeer::NUM_HYDRATE_COLUMNS;

        PekerjaanPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + PekerjaanPeer::NUM_HYDRATE_COLUMNS;

        AgamaPeer::addSelectColumns($criteria);
        $startcol8 = $startcol7 + AgamaPeer::NUM_HYDRATE_COLUMNS;

        PenghasilanPeer::addSelectColumns($criteria);
        $startcol9 = $startcol8 + PenghasilanPeer::NUM_HYDRATE_COLUMNS;

        JenisTinggalPeer::addSelectColumns($criteria);
        $startcol10 = $startcol9 + JenisTinggalPeer::NUM_HYDRATE_COLUMNS;

        AlatTransportasiPeer::addSelectColumns($criteria);
        $startcol11 = $startcol10 + AlatTransportasiPeer::NUM_HYDRATE_COLUMNS;

        PekerjaanPeer::addSelectColumns($criteria);
        $startcol12 = $startcol11 + PekerjaanPeer::NUM_HYDRATE_COLUMNS;

        JenjangPendidikanPeer::addSelectColumns($criteria);
        $startcol13 = $startcol12 + JenjangPendidikanPeer::NUM_HYDRATE_COLUMNS;

        PenghasilanPeer::addSelectColumns($criteria);
        $startcol14 = $startcol13 + PenghasilanPeer::NUM_HYDRATE_COLUMNS;

        PekerjaanPeer::addSelectColumns($criteria);
        $startcol15 = $startcol14 + PekerjaanPeer::NUM_HYDRATE_COLUMNS;

        JenjangPendidikanPeer::addSelectColumns($criteria);
        $startcol16 = $startcol15 + JenjangPendidikanPeer::NUM_HYDRATE_COLUMNS;

        PenghasilanPeer::addSelectColumns($criteria);
        $startcol17 = $startcol16 + PenghasilanPeer::NUM_HYDRATE_COLUMNS;

        PekerjaanPeer::addSelectColumns($criteria);
        $startcol18 = $startcol17 + PekerjaanPeer::NUM_HYDRATE_COLUMNS;

        JenjangPendidikanPeer::addSelectColumns($criteria);
        $startcol19 = $startcol18 + JenjangPendidikanPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(PesertaDidikPeer::KEWARGANEGARAAN, NegaraPeer::NEGARA_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::ID_LAYAK_PIP, AlasanLayakPipPeer::ID_LAYAK_PIP, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::ID_BANK, BankPeer::ID_BANK, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::AGAMA_ID, AgamaPeer::AGAMA_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PENGHASILAN_ID_AYAH, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENIS_TINGGAL_ID, JenisTinggalPeer::JENIS_TINGGAL_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::ALAT_TRANSPORTASI_ID, AlatTransportasiPeer::ALAT_TRANSPORTASI_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID_AYAH, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENJANG_PENDIDIKAN_IBU, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PENGHASILAN_ID_WALI, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID_IBU, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENJANG_PENDIDIKAN_AYAH, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PENGHASILAN_ID_IBU, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID_WALI, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENJANG_PENDIDIKAN_WALI, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PesertaDidikPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PesertaDidikPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = PesertaDidikPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PesertaDidikPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Negara rows

                $key2 = NegaraPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = NegaraPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = NegaraPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    NegaraPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj2 (Negara)
                $obj2->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined AlasanLayakPip rows

                $key3 = AlasanLayakPipPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = AlasanLayakPipPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = AlasanLayakPipPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    AlasanLayakPipPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj3 (AlasanLayakPip)
                $obj3->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined Bank rows

                $key4 = BankPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = BankPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = BankPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    BankPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj4 (Bank)
                $obj4->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined MstWilayah rows

                $key5 = MstWilayahPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = MstWilayahPeer::getInstanceFromPool($key5);
                    if (!$obj5) {
    
                        $cls = MstWilayahPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    MstWilayahPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj5 (MstWilayah)
                $obj5->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined Pekerjaan rows

                $key6 = PekerjaanPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = PekerjaanPeer::getInstanceFromPool($key6);
                    if (!$obj6) {
    
                        $cls = PekerjaanPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    PekerjaanPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj6 (Pekerjaan)
                $obj6->addPesertaDidikRelatedByPekerjaanId($obj1);

            } // if joined row is not null

                // Add objects for joined Agama rows

                $key7 = AgamaPeer::getPrimaryKeyHashFromRow($row, $startcol7);
                if ($key7 !== null) {
                    $obj7 = AgamaPeer::getInstanceFromPool($key7);
                    if (!$obj7) {
    
                        $cls = AgamaPeer::getOMClass();

                    $obj7 = new $cls();
                    $obj7->hydrate($row, $startcol7);
                    AgamaPeer::addInstanceToPool($obj7, $key7);
                } // if $obj7 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj7 (Agama)
                $obj7->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined Penghasilan rows

                $key8 = PenghasilanPeer::getPrimaryKeyHashFromRow($row, $startcol8);
                if ($key8 !== null) {
                    $obj8 = PenghasilanPeer::getInstanceFromPool($key8);
                    if (!$obj8) {
    
                        $cls = PenghasilanPeer::getOMClass();

                    $obj8 = new $cls();
                    $obj8->hydrate($row, $startcol8);
                    PenghasilanPeer::addInstanceToPool($obj8, $key8);
                } // if $obj8 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj8 (Penghasilan)
                $obj8->addPesertaDidikRelatedByPenghasilanIdAyah($obj1);

            } // if joined row is not null

                // Add objects for joined JenisTinggal rows

                $key9 = JenisTinggalPeer::getPrimaryKeyHashFromRow($row, $startcol9);
                if ($key9 !== null) {
                    $obj9 = JenisTinggalPeer::getInstanceFromPool($key9);
                    if (!$obj9) {
    
                        $cls = JenisTinggalPeer::getOMClass();

                    $obj9 = new $cls();
                    $obj9->hydrate($row, $startcol9);
                    JenisTinggalPeer::addInstanceToPool($obj9, $key9);
                } // if $obj9 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj9 (JenisTinggal)
                $obj9->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined AlatTransportasi rows

                $key10 = AlatTransportasiPeer::getPrimaryKeyHashFromRow($row, $startcol10);
                if ($key10 !== null) {
                    $obj10 = AlatTransportasiPeer::getInstanceFromPool($key10);
                    if (!$obj10) {
    
                        $cls = AlatTransportasiPeer::getOMClass();

                    $obj10 = new $cls();
                    $obj10->hydrate($row, $startcol10);
                    AlatTransportasiPeer::addInstanceToPool($obj10, $key10);
                } // if $obj10 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj10 (AlatTransportasi)
                $obj10->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined Pekerjaan rows

                $key11 = PekerjaanPeer::getPrimaryKeyHashFromRow($row, $startcol11);
                if ($key11 !== null) {
                    $obj11 = PekerjaanPeer::getInstanceFromPool($key11);
                    if (!$obj11) {
    
                        $cls = PekerjaanPeer::getOMClass();

                    $obj11 = new $cls();
                    $obj11->hydrate($row, $startcol11);
                    PekerjaanPeer::addInstanceToPool($obj11, $key11);
                } // if $obj11 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj11 (Pekerjaan)
                $obj11->addPesertaDidikRelatedByPekerjaanIdAyah($obj1);

            } // if joined row is not null

                // Add objects for joined JenjangPendidikan rows

                $key12 = JenjangPendidikanPeer::getPrimaryKeyHashFromRow($row, $startcol12);
                if ($key12 !== null) {
                    $obj12 = JenjangPendidikanPeer::getInstanceFromPool($key12);
                    if (!$obj12) {
    
                        $cls = JenjangPendidikanPeer::getOMClass();

                    $obj12 = new $cls();
                    $obj12->hydrate($row, $startcol12);
                    JenjangPendidikanPeer::addInstanceToPool($obj12, $key12);
                } // if $obj12 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj12 (JenjangPendidikan)
                $obj12->addPesertaDidikRelatedByJenjangPendidikanIbu($obj1);

            } // if joined row is not null

                // Add objects for joined Penghasilan rows

                $key13 = PenghasilanPeer::getPrimaryKeyHashFromRow($row, $startcol13);
                if ($key13 !== null) {
                    $obj13 = PenghasilanPeer::getInstanceFromPool($key13);
                    if (!$obj13) {
    
                        $cls = PenghasilanPeer::getOMClass();

                    $obj13 = new $cls();
                    $obj13->hydrate($row, $startcol13);
                    PenghasilanPeer::addInstanceToPool($obj13, $key13);
                } // if $obj13 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj13 (Penghasilan)
                $obj13->addPesertaDidikRelatedByPenghasilanIdWali($obj1);

            } // if joined row is not null

                // Add objects for joined Pekerjaan rows

                $key14 = PekerjaanPeer::getPrimaryKeyHashFromRow($row, $startcol14);
                if ($key14 !== null) {
                    $obj14 = PekerjaanPeer::getInstanceFromPool($key14);
                    if (!$obj14) {
    
                        $cls = PekerjaanPeer::getOMClass();

                    $obj14 = new $cls();
                    $obj14->hydrate($row, $startcol14);
                    PekerjaanPeer::addInstanceToPool($obj14, $key14);
                } // if $obj14 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj14 (Pekerjaan)
                $obj14->addPesertaDidikRelatedByPekerjaanIdIbu($obj1);

            } // if joined row is not null

                // Add objects for joined JenjangPendidikan rows

                $key15 = JenjangPendidikanPeer::getPrimaryKeyHashFromRow($row, $startcol15);
                if ($key15 !== null) {
                    $obj15 = JenjangPendidikanPeer::getInstanceFromPool($key15);
                    if (!$obj15) {
    
                        $cls = JenjangPendidikanPeer::getOMClass();

                    $obj15 = new $cls();
                    $obj15->hydrate($row, $startcol15);
                    JenjangPendidikanPeer::addInstanceToPool($obj15, $key15);
                } // if $obj15 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj15 (JenjangPendidikan)
                $obj15->addPesertaDidikRelatedByJenjangPendidikanAyah($obj1);

            } // if joined row is not null

                // Add objects for joined Penghasilan rows

                $key16 = PenghasilanPeer::getPrimaryKeyHashFromRow($row, $startcol16);
                if ($key16 !== null) {
                    $obj16 = PenghasilanPeer::getInstanceFromPool($key16);
                    if (!$obj16) {
    
                        $cls = PenghasilanPeer::getOMClass();

                    $obj16 = new $cls();
                    $obj16->hydrate($row, $startcol16);
                    PenghasilanPeer::addInstanceToPool($obj16, $key16);
                } // if $obj16 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj16 (Penghasilan)
                $obj16->addPesertaDidikRelatedByPenghasilanIdIbu($obj1);

            } // if joined row is not null

                // Add objects for joined Pekerjaan rows

                $key17 = PekerjaanPeer::getPrimaryKeyHashFromRow($row, $startcol17);
                if ($key17 !== null) {
                    $obj17 = PekerjaanPeer::getInstanceFromPool($key17);
                    if (!$obj17) {
    
                        $cls = PekerjaanPeer::getOMClass();

                    $obj17 = new $cls();
                    $obj17->hydrate($row, $startcol17);
                    PekerjaanPeer::addInstanceToPool($obj17, $key17);
                } // if $obj17 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj17 (Pekerjaan)
                $obj17->addPesertaDidikRelatedByPekerjaanIdWali($obj1);

            } // if joined row is not null

                // Add objects for joined JenjangPendidikan rows

                $key18 = JenjangPendidikanPeer::getPrimaryKeyHashFromRow($row, $startcol18);
                if ($key18 !== null) {
                    $obj18 = JenjangPendidikanPeer::getInstanceFromPool($key18);
                    if (!$obj18) {
    
                        $cls = JenjangPendidikanPeer::getOMClass();

                    $obj18 = new $cls();
                    $obj18->hydrate($row, $startcol18);
                    JenjangPendidikanPeer::addInstanceToPool($obj18, $key18);
                } // if $obj18 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj18 (JenjangPendidikan)
                $obj18->addPesertaDidikRelatedByJenjangPendidikanWali($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of PesertaDidik objects pre-filled with all related objects except PekerjaanRelatedByPekerjaanId.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of PesertaDidik objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptPekerjaanRelatedByPekerjaanId(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PesertaDidikPeer::DATABASE_NAME);
        }

        PesertaDidikPeer::addSelectColumns($criteria);
        $startcol2 = PesertaDidikPeer::NUM_HYDRATE_COLUMNS;

        KebutuhanKhususPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + KebutuhanKhususPeer::NUM_HYDRATE_COLUMNS;

        KebutuhanKhususPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + KebutuhanKhususPeer::NUM_HYDRATE_COLUMNS;

        NegaraPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + NegaraPeer::NUM_HYDRATE_COLUMNS;

        AlasanLayakPipPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + AlasanLayakPipPeer::NUM_HYDRATE_COLUMNS;

        BankPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + BankPeer::NUM_HYDRATE_COLUMNS;

        MstWilayahPeer::addSelectColumns($criteria);
        $startcol8 = $startcol7 + MstWilayahPeer::NUM_HYDRATE_COLUMNS;

        KebutuhanKhususPeer::addSelectColumns($criteria);
        $startcol9 = $startcol8 + KebutuhanKhususPeer::NUM_HYDRATE_COLUMNS;

        AgamaPeer::addSelectColumns($criteria);
        $startcol10 = $startcol9 + AgamaPeer::NUM_HYDRATE_COLUMNS;

        PenghasilanPeer::addSelectColumns($criteria);
        $startcol11 = $startcol10 + PenghasilanPeer::NUM_HYDRATE_COLUMNS;

        JenisTinggalPeer::addSelectColumns($criteria);
        $startcol12 = $startcol11 + JenisTinggalPeer::NUM_HYDRATE_COLUMNS;

        AlatTransportasiPeer::addSelectColumns($criteria);
        $startcol13 = $startcol12 + AlatTransportasiPeer::NUM_HYDRATE_COLUMNS;

        JenjangPendidikanPeer::addSelectColumns($criteria);
        $startcol14 = $startcol13 + JenjangPendidikanPeer::NUM_HYDRATE_COLUMNS;

        PenghasilanPeer::addSelectColumns($criteria);
        $startcol15 = $startcol14 + PenghasilanPeer::NUM_HYDRATE_COLUMNS;

        JenjangPendidikanPeer::addSelectColumns($criteria);
        $startcol16 = $startcol15 + JenjangPendidikanPeer::NUM_HYDRATE_COLUMNS;

        PenghasilanPeer::addSelectColumns($criteria);
        $startcol17 = $startcol16 + PenghasilanPeer::NUM_HYDRATE_COLUMNS;

        JenjangPendidikanPeer::addSelectColumns($criteria);
        $startcol18 = $startcol17 + JenjangPendidikanPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID_AYAH, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID_IBU, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KEWARGANEGARAAN, NegaraPeer::NEGARA_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::ID_LAYAK_PIP, AlasanLayakPipPeer::ID_LAYAK_PIP, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::ID_BANK, BankPeer::ID_BANK, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::AGAMA_ID, AgamaPeer::AGAMA_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PENGHASILAN_ID_AYAH, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENIS_TINGGAL_ID, JenisTinggalPeer::JENIS_TINGGAL_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::ALAT_TRANSPORTASI_ID, AlatTransportasiPeer::ALAT_TRANSPORTASI_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENJANG_PENDIDIKAN_IBU, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PENGHASILAN_ID_WALI, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENJANG_PENDIDIKAN_AYAH, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PENGHASILAN_ID_IBU, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENJANG_PENDIDIKAN_WALI, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PesertaDidikPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PesertaDidikPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = PesertaDidikPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PesertaDidikPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined KebutuhanKhusus rows

                $key2 = KebutuhanKhususPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = KebutuhanKhususPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = KebutuhanKhususPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    KebutuhanKhususPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj2 (KebutuhanKhusus)
                $obj2->addPesertaDidikRelatedByKebutuhanKhususIdAyah($obj1);

            } // if joined row is not null

                // Add objects for joined KebutuhanKhusus rows

                $key3 = KebutuhanKhususPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = KebutuhanKhususPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = KebutuhanKhususPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    KebutuhanKhususPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj3 (KebutuhanKhusus)
                $obj3->addPesertaDidikRelatedByKebutuhanKhususIdIbu($obj1);

            } // if joined row is not null

                // Add objects for joined Negara rows

                $key4 = NegaraPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = NegaraPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = NegaraPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    NegaraPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj4 (Negara)
                $obj4->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined AlasanLayakPip rows

                $key5 = AlasanLayakPipPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = AlasanLayakPipPeer::getInstanceFromPool($key5);
                    if (!$obj5) {
    
                        $cls = AlasanLayakPipPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    AlasanLayakPipPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj5 (AlasanLayakPip)
                $obj5->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined Bank rows

                $key6 = BankPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = BankPeer::getInstanceFromPool($key6);
                    if (!$obj6) {
    
                        $cls = BankPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    BankPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj6 (Bank)
                $obj6->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined MstWilayah rows

                $key7 = MstWilayahPeer::getPrimaryKeyHashFromRow($row, $startcol7);
                if ($key7 !== null) {
                    $obj7 = MstWilayahPeer::getInstanceFromPool($key7);
                    if (!$obj7) {
    
                        $cls = MstWilayahPeer::getOMClass();

                    $obj7 = new $cls();
                    $obj7->hydrate($row, $startcol7);
                    MstWilayahPeer::addInstanceToPool($obj7, $key7);
                } // if $obj7 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj7 (MstWilayah)
                $obj7->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined KebutuhanKhusus rows

                $key8 = KebutuhanKhususPeer::getPrimaryKeyHashFromRow($row, $startcol8);
                if ($key8 !== null) {
                    $obj8 = KebutuhanKhususPeer::getInstanceFromPool($key8);
                    if (!$obj8) {
    
                        $cls = KebutuhanKhususPeer::getOMClass();

                    $obj8 = new $cls();
                    $obj8->hydrate($row, $startcol8);
                    KebutuhanKhususPeer::addInstanceToPool($obj8, $key8);
                } // if $obj8 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj8 (KebutuhanKhusus)
                $obj8->addPesertaDidikRelatedByKebutuhanKhususId($obj1);

            } // if joined row is not null

                // Add objects for joined Agama rows

                $key9 = AgamaPeer::getPrimaryKeyHashFromRow($row, $startcol9);
                if ($key9 !== null) {
                    $obj9 = AgamaPeer::getInstanceFromPool($key9);
                    if (!$obj9) {
    
                        $cls = AgamaPeer::getOMClass();

                    $obj9 = new $cls();
                    $obj9->hydrate($row, $startcol9);
                    AgamaPeer::addInstanceToPool($obj9, $key9);
                } // if $obj9 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj9 (Agama)
                $obj9->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined Penghasilan rows

                $key10 = PenghasilanPeer::getPrimaryKeyHashFromRow($row, $startcol10);
                if ($key10 !== null) {
                    $obj10 = PenghasilanPeer::getInstanceFromPool($key10);
                    if (!$obj10) {
    
                        $cls = PenghasilanPeer::getOMClass();

                    $obj10 = new $cls();
                    $obj10->hydrate($row, $startcol10);
                    PenghasilanPeer::addInstanceToPool($obj10, $key10);
                } // if $obj10 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj10 (Penghasilan)
                $obj10->addPesertaDidikRelatedByPenghasilanIdAyah($obj1);

            } // if joined row is not null

                // Add objects for joined JenisTinggal rows

                $key11 = JenisTinggalPeer::getPrimaryKeyHashFromRow($row, $startcol11);
                if ($key11 !== null) {
                    $obj11 = JenisTinggalPeer::getInstanceFromPool($key11);
                    if (!$obj11) {
    
                        $cls = JenisTinggalPeer::getOMClass();

                    $obj11 = new $cls();
                    $obj11->hydrate($row, $startcol11);
                    JenisTinggalPeer::addInstanceToPool($obj11, $key11);
                } // if $obj11 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj11 (JenisTinggal)
                $obj11->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined AlatTransportasi rows

                $key12 = AlatTransportasiPeer::getPrimaryKeyHashFromRow($row, $startcol12);
                if ($key12 !== null) {
                    $obj12 = AlatTransportasiPeer::getInstanceFromPool($key12);
                    if (!$obj12) {
    
                        $cls = AlatTransportasiPeer::getOMClass();

                    $obj12 = new $cls();
                    $obj12->hydrate($row, $startcol12);
                    AlatTransportasiPeer::addInstanceToPool($obj12, $key12);
                } // if $obj12 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj12 (AlatTransportasi)
                $obj12->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined JenjangPendidikan rows

                $key13 = JenjangPendidikanPeer::getPrimaryKeyHashFromRow($row, $startcol13);
                if ($key13 !== null) {
                    $obj13 = JenjangPendidikanPeer::getInstanceFromPool($key13);
                    if (!$obj13) {
    
                        $cls = JenjangPendidikanPeer::getOMClass();

                    $obj13 = new $cls();
                    $obj13->hydrate($row, $startcol13);
                    JenjangPendidikanPeer::addInstanceToPool($obj13, $key13);
                } // if $obj13 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj13 (JenjangPendidikan)
                $obj13->addPesertaDidikRelatedByJenjangPendidikanIbu($obj1);

            } // if joined row is not null

                // Add objects for joined Penghasilan rows

                $key14 = PenghasilanPeer::getPrimaryKeyHashFromRow($row, $startcol14);
                if ($key14 !== null) {
                    $obj14 = PenghasilanPeer::getInstanceFromPool($key14);
                    if (!$obj14) {
    
                        $cls = PenghasilanPeer::getOMClass();

                    $obj14 = new $cls();
                    $obj14->hydrate($row, $startcol14);
                    PenghasilanPeer::addInstanceToPool($obj14, $key14);
                } // if $obj14 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj14 (Penghasilan)
                $obj14->addPesertaDidikRelatedByPenghasilanIdWali($obj1);

            } // if joined row is not null

                // Add objects for joined JenjangPendidikan rows

                $key15 = JenjangPendidikanPeer::getPrimaryKeyHashFromRow($row, $startcol15);
                if ($key15 !== null) {
                    $obj15 = JenjangPendidikanPeer::getInstanceFromPool($key15);
                    if (!$obj15) {
    
                        $cls = JenjangPendidikanPeer::getOMClass();

                    $obj15 = new $cls();
                    $obj15->hydrate($row, $startcol15);
                    JenjangPendidikanPeer::addInstanceToPool($obj15, $key15);
                } // if $obj15 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj15 (JenjangPendidikan)
                $obj15->addPesertaDidikRelatedByJenjangPendidikanAyah($obj1);

            } // if joined row is not null

                // Add objects for joined Penghasilan rows

                $key16 = PenghasilanPeer::getPrimaryKeyHashFromRow($row, $startcol16);
                if ($key16 !== null) {
                    $obj16 = PenghasilanPeer::getInstanceFromPool($key16);
                    if (!$obj16) {
    
                        $cls = PenghasilanPeer::getOMClass();

                    $obj16 = new $cls();
                    $obj16->hydrate($row, $startcol16);
                    PenghasilanPeer::addInstanceToPool($obj16, $key16);
                } // if $obj16 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj16 (Penghasilan)
                $obj16->addPesertaDidikRelatedByPenghasilanIdIbu($obj1);

            } // if joined row is not null

                // Add objects for joined JenjangPendidikan rows

                $key17 = JenjangPendidikanPeer::getPrimaryKeyHashFromRow($row, $startcol17);
                if ($key17 !== null) {
                    $obj17 = JenjangPendidikanPeer::getInstanceFromPool($key17);
                    if (!$obj17) {
    
                        $cls = JenjangPendidikanPeer::getOMClass();

                    $obj17 = new $cls();
                    $obj17->hydrate($row, $startcol17);
                    JenjangPendidikanPeer::addInstanceToPool($obj17, $key17);
                } // if $obj17 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj17 (JenjangPendidikan)
                $obj17->addPesertaDidikRelatedByJenjangPendidikanWali($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of PesertaDidik objects pre-filled with all related objects except Agama.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of PesertaDidik objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptAgama(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PesertaDidikPeer::DATABASE_NAME);
        }

        PesertaDidikPeer::addSelectColumns($criteria);
        $startcol2 = PesertaDidikPeer::NUM_HYDRATE_COLUMNS;

        KebutuhanKhususPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + KebutuhanKhususPeer::NUM_HYDRATE_COLUMNS;

        KebutuhanKhususPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + KebutuhanKhususPeer::NUM_HYDRATE_COLUMNS;

        NegaraPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + NegaraPeer::NUM_HYDRATE_COLUMNS;

        AlasanLayakPipPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + AlasanLayakPipPeer::NUM_HYDRATE_COLUMNS;

        BankPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + BankPeer::NUM_HYDRATE_COLUMNS;

        MstWilayahPeer::addSelectColumns($criteria);
        $startcol8 = $startcol7 + MstWilayahPeer::NUM_HYDRATE_COLUMNS;

        KebutuhanKhususPeer::addSelectColumns($criteria);
        $startcol9 = $startcol8 + KebutuhanKhususPeer::NUM_HYDRATE_COLUMNS;

        PekerjaanPeer::addSelectColumns($criteria);
        $startcol10 = $startcol9 + PekerjaanPeer::NUM_HYDRATE_COLUMNS;

        PenghasilanPeer::addSelectColumns($criteria);
        $startcol11 = $startcol10 + PenghasilanPeer::NUM_HYDRATE_COLUMNS;

        JenisTinggalPeer::addSelectColumns($criteria);
        $startcol12 = $startcol11 + JenisTinggalPeer::NUM_HYDRATE_COLUMNS;

        AlatTransportasiPeer::addSelectColumns($criteria);
        $startcol13 = $startcol12 + AlatTransportasiPeer::NUM_HYDRATE_COLUMNS;

        PekerjaanPeer::addSelectColumns($criteria);
        $startcol14 = $startcol13 + PekerjaanPeer::NUM_HYDRATE_COLUMNS;

        JenjangPendidikanPeer::addSelectColumns($criteria);
        $startcol15 = $startcol14 + JenjangPendidikanPeer::NUM_HYDRATE_COLUMNS;

        PenghasilanPeer::addSelectColumns($criteria);
        $startcol16 = $startcol15 + PenghasilanPeer::NUM_HYDRATE_COLUMNS;

        PekerjaanPeer::addSelectColumns($criteria);
        $startcol17 = $startcol16 + PekerjaanPeer::NUM_HYDRATE_COLUMNS;

        JenjangPendidikanPeer::addSelectColumns($criteria);
        $startcol18 = $startcol17 + JenjangPendidikanPeer::NUM_HYDRATE_COLUMNS;

        PenghasilanPeer::addSelectColumns($criteria);
        $startcol19 = $startcol18 + PenghasilanPeer::NUM_HYDRATE_COLUMNS;

        PekerjaanPeer::addSelectColumns($criteria);
        $startcol20 = $startcol19 + PekerjaanPeer::NUM_HYDRATE_COLUMNS;

        JenjangPendidikanPeer::addSelectColumns($criteria);
        $startcol21 = $startcol20 + JenjangPendidikanPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID_AYAH, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID_IBU, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KEWARGANEGARAAN, NegaraPeer::NEGARA_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::ID_LAYAK_PIP, AlasanLayakPipPeer::ID_LAYAK_PIP, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::ID_BANK, BankPeer::ID_BANK, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PENGHASILAN_ID_AYAH, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENIS_TINGGAL_ID, JenisTinggalPeer::JENIS_TINGGAL_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::ALAT_TRANSPORTASI_ID, AlatTransportasiPeer::ALAT_TRANSPORTASI_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID_AYAH, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENJANG_PENDIDIKAN_IBU, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PENGHASILAN_ID_WALI, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID_IBU, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENJANG_PENDIDIKAN_AYAH, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PENGHASILAN_ID_IBU, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID_WALI, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENJANG_PENDIDIKAN_WALI, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PesertaDidikPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PesertaDidikPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = PesertaDidikPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PesertaDidikPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined KebutuhanKhusus rows

                $key2 = KebutuhanKhususPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = KebutuhanKhususPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = KebutuhanKhususPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    KebutuhanKhususPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj2 (KebutuhanKhusus)
                $obj2->addPesertaDidikRelatedByKebutuhanKhususIdAyah($obj1);

            } // if joined row is not null

                // Add objects for joined KebutuhanKhusus rows

                $key3 = KebutuhanKhususPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = KebutuhanKhususPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = KebutuhanKhususPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    KebutuhanKhususPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj3 (KebutuhanKhusus)
                $obj3->addPesertaDidikRelatedByKebutuhanKhususIdIbu($obj1);

            } // if joined row is not null

                // Add objects for joined Negara rows

                $key4 = NegaraPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = NegaraPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = NegaraPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    NegaraPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj4 (Negara)
                $obj4->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined AlasanLayakPip rows

                $key5 = AlasanLayakPipPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = AlasanLayakPipPeer::getInstanceFromPool($key5);
                    if (!$obj5) {
    
                        $cls = AlasanLayakPipPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    AlasanLayakPipPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj5 (AlasanLayakPip)
                $obj5->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined Bank rows

                $key6 = BankPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = BankPeer::getInstanceFromPool($key6);
                    if (!$obj6) {
    
                        $cls = BankPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    BankPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj6 (Bank)
                $obj6->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined MstWilayah rows

                $key7 = MstWilayahPeer::getPrimaryKeyHashFromRow($row, $startcol7);
                if ($key7 !== null) {
                    $obj7 = MstWilayahPeer::getInstanceFromPool($key7);
                    if (!$obj7) {
    
                        $cls = MstWilayahPeer::getOMClass();

                    $obj7 = new $cls();
                    $obj7->hydrate($row, $startcol7);
                    MstWilayahPeer::addInstanceToPool($obj7, $key7);
                } // if $obj7 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj7 (MstWilayah)
                $obj7->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined KebutuhanKhusus rows

                $key8 = KebutuhanKhususPeer::getPrimaryKeyHashFromRow($row, $startcol8);
                if ($key8 !== null) {
                    $obj8 = KebutuhanKhususPeer::getInstanceFromPool($key8);
                    if (!$obj8) {
    
                        $cls = KebutuhanKhususPeer::getOMClass();

                    $obj8 = new $cls();
                    $obj8->hydrate($row, $startcol8);
                    KebutuhanKhususPeer::addInstanceToPool($obj8, $key8);
                } // if $obj8 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj8 (KebutuhanKhusus)
                $obj8->addPesertaDidikRelatedByKebutuhanKhususId($obj1);

            } // if joined row is not null

                // Add objects for joined Pekerjaan rows

                $key9 = PekerjaanPeer::getPrimaryKeyHashFromRow($row, $startcol9);
                if ($key9 !== null) {
                    $obj9 = PekerjaanPeer::getInstanceFromPool($key9);
                    if (!$obj9) {
    
                        $cls = PekerjaanPeer::getOMClass();

                    $obj9 = new $cls();
                    $obj9->hydrate($row, $startcol9);
                    PekerjaanPeer::addInstanceToPool($obj9, $key9);
                } // if $obj9 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj9 (Pekerjaan)
                $obj9->addPesertaDidikRelatedByPekerjaanId($obj1);

            } // if joined row is not null

                // Add objects for joined Penghasilan rows

                $key10 = PenghasilanPeer::getPrimaryKeyHashFromRow($row, $startcol10);
                if ($key10 !== null) {
                    $obj10 = PenghasilanPeer::getInstanceFromPool($key10);
                    if (!$obj10) {
    
                        $cls = PenghasilanPeer::getOMClass();

                    $obj10 = new $cls();
                    $obj10->hydrate($row, $startcol10);
                    PenghasilanPeer::addInstanceToPool($obj10, $key10);
                } // if $obj10 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj10 (Penghasilan)
                $obj10->addPesertaDidikRelatedByPenghasilanIdAyah($obj1);

            } // if joined row is not null

                // Add objects for joined JenisTinggal rows

                $key11 = JenisTinggalPeer::getPrimaryKeyHashFromRow($row, $startcol11);
                if ($key11 !== null) {
                    $obj11 = JenisTinggalPeer::getInstanceFromPool($key11);
                    if (!$obj11) {
    
                        $cls = JenisTinggalPeer::getOMClass();

                    $obj11 = new $cls();
                    $obj11->hydrate($row, $startcol11);
                    JenisTinggalPeer::addInstanceToPool($obj11, $key11);
                } // if $obj11 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj11 (JenisTinggal)
                $obj11->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined AlatTransportasi rows

                $key12 = AlatTransportasiPeer::getPrimaryKeyHashFromRow($row, $startcol12);
                if ($key12 !== null) {
                    $obj12 = AlatTransportasiPeer::getInstanceFromPool($key12);
                    if (!$obj12) {
    
                        $cls = AlatTransportasiPeer::getOMClass();

                    $obj12 = new $cls();
                    $obj12->hydrate($row, $startcol12);
                    AlatTransportasiPeer::addInstanceToPool($obj12, $key12);
                } // if $obj12 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj12 (AlatTransportasi)
                $obj12->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined Pekerjaan rows

                $key13 = PekerjaanPeer::getPrimaryKeyHashFromRow($row, $startcol13);
                if ($key13 !== null) {
                    $obj13 = PekerjaanPeer::getInstanceFromPool($key13);
                    if (!$obj13) {
    
                        $cls = PekerjaanPeer::getOMClass();

                    $obj13 = new $cls();
                    $obj13->hydrate($row, $startcol13);
                    PekerjaanPeer::addInstanceToPool($obj13, $key13);
                } // if $obj13 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj13 (Pekerjaan)
                $obj13->addPesertaDidikRelatedByPekerjaanIdAyah($obj1);

            } // if joined row is not null

                // Add objects for joined JenjangPendidikan rows

                $key14 = JenjangPendidikanPeer::getPrimaryKeyHashFromRow($row, $startcol14);
                if ($key14 !== null) {
                    $obj14 = JenjangPendidikanPeer::getInstanceFromPool($key14);
                    if (!$obj14) {
    
                        $cls = JenjangPendidikanPeer::getOMClass();

                    $obj14 = new $cls();
                    $obj14->hydrate($row, $startcol14);
                    JenjangPendidikanPeer::addInstanceToPool($obj14, $key14);
                } // if $obj14 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj14 (JenjangPendidikan)
                $obj14->addPesertaDidikRelatedByJenjangPendidikanIbu($obj1);

            } // if joined row is not null

                // Add objects for joined Penghasilan rows

                $key15 = PenghasilanPeer::getPrimaryKeyHashFromRow($row, $startcol15);
                if ($key15 !== null) {
                    $obj15 = PenghasilanPeer::getInstanceFromPool($key15);
                    if (!$obj15) {
    
                        $cls = PenghasilanPeer::getOMClass();

                    $obj15 = new $cls();
                    $obj15->hydrate($row, $startcol15);
                    PenghasilanPeer::addInstanceToPool($obj15, $key15);
                } // if $obj15 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj15 (Penghasilan)
                $obj15->addPesertaDidikRelatedByPenghasilanIdWali($obj1);

            } // if joined row is not null

                // Add objects for joined Pekerjaan rows

                $key16 = PekerjaanPeer::getPrimaryKeyHashFromRow($row, $startcol16);
                if ($key16 !== null) {
                    $obj16 = PekerjaanPeer::getInstanceFromPool($key16);
                    if (!$obj16) {
    
                        $cls = PekerjaanPeer::getOMClass();

                    $obj16 = new $cls();
                    $obj16->hydrate($row, $startcol16);
                    PekerjaanPeer::addInstanceToPool($obj16, $key16);
                } // if $obj16 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj16 (Pekerjaan)
                $obj16->addPesertaDidikRelatedByPekerjaanIdIbu($obj1);

            } // if joined row is not null

                // Add objects for joined JenjangPendidikan rows

                $key17 = JenjangPendidikanPeer::getPrimaryKeyHashFromRow($row, $startcol17);
                if ($key17 !== null) {
                    $obj17 = JenjangPendidikanPeer::getInstanceFromPool($key17);
                    if (!$obj17) {
    
                        $cls = JenjangPendidikanPeer::getOMClass();

                    $obj17 = new $cls();
                    $obj17->hydrate($row, $startcol17);
                    JenjangPendidikanPeer::addInstanceToPool($obj17, $key17);
                } // if $obj17 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj17 (JenjangPendidikan)
                $obj17->addPesertaDidikRelatedByJenjangPendidikanAyah($obj1);

            } // if joined row is not null

                // Add objects for joined Penghasilan rows

                $key18 = PenghasilanPeer::getPrimaryKeyHashFromRow($row, $startcol18);
                if ($key18 !== null) {
                    $obj18 = PenghasilanPeer::getInstanceFromPool($key18);
                    if (!$obj18) {
    
                        $cls = PenghasilanPeer::getOMClass();

                    $obj18 = new $cls();
                    $obj18->hydrate($row, $startcol18);
                    PenghasilanPeer::addInstanceToPool($obj18, $key18);
                } // if $obj18 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj18 (Penghasilan)
                $obj18->addPesertaDidikRelatedByPenghasilanIdIbu($obj1);

            } // if joined row is not null

                // Add objects for joined Pekerjaan rows

                $key19 = PekerjaanPeer::getPrimaryKeyHashFromRow($row, $startcol19);
                if ($key19 !== null) {
                    $obj19 = PekerjaanPeer::getInstanceFromPool($key19);
                    if (!$obj19) {
    
                        $cls = PekerjaanPeer::getOMClass();

                    $obj19 = new $cls();
                    $obj19->hydrate($row, $startcol19);
                    PekerjaanPeer::addInstanceToPool($obj19, $key19);
                } // if $obj19 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj19 (Pekerjaan)
                $obj19->addPesertaDidikRelatedByPekerjaanIdWali($obj1);

            } // if joined row is not null

                // Add objects for joined JenjangPendidikan rows

                $key20 = JenjangPendidikanPeer::getPrimaryKeyHashFromRow($row, $startcol20);
                if ($key20 !== null) {
                    $obj20 = JenjangPendidikanPeer::getInstanceFromPool($key20);
                    if (!$obj20) {
    
                        $cls = JenjangPendidikanPeer::getOMClass();

                    $obj20 = new $cls();
                    $obj20->hydrate($row, $startcol20);
                    JenjangPendidikanPeer::addInstanceToPool($obj20, $key20);
                } // if $obj20 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj20 (JenjangPendidikan)
                $obj20->addPesertaDidikRelatedByJenjangPendidikanWali($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of PesertaDidik objects pre-filled with all related objects except PenghasilanRelatedByPenghasilanIdAyah.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of PesertaDidik objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptPenghasilanRelatedByPenghasilanIdAyah(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PesertaDidikPeer::DATABASE_NAME);
        }

        PesertaDidikPeer::addSelectColumns($criteria);
        $startcol2 = PesertaDidikPeer::NUM_HYDRATE_COLUMNS;

        KebutuhanKhususPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + KebutuhanKhususPeer::NUM_HYDRATE_COLUMNS;

        KebutuhanKhususPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + KebutuhanKhususPeer::NUM_HYDRATE_COLUMNS;

        NegaraPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + NegaraPeer::NUM_HYDRATE_COLUMNS;

        AlasanLayakPipPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + AlasanLayakPipPeer::NUM_HYDRATE_COLUMNS;

        BankPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + BankPeer::NUM_HYDRATE_COLUMNS;

        MstWilayahPeer::addSelectColumns($criteria);
        $startcol8 = $startcol7 + MstWilayahPeer::NUM_HYDRATE_COLUMNS;

        KebutuhanKhususPeer::addSelectColumns($criteria);
        $startcol9 = $startcol8 + KebutuhanKhususPeer::NUM_HYDRATE_COLUMNS;

        PekerjaanPeer::addSelectColumns($criteria);
        $startcol10 = $startcol9 + PekerjaanPeer::NUM_HYDRATE_COLUMNS;

        AgamaPeer::addSelectColumns($criteria);
        $startcol11 = $startcol10 + AgamaPeer::NUM_HYDRATE_COLUMNS;

        JenisTinggalPeer::addSelectColumns($criteria);
        $startcol12 = $startcol11 + JenisTinggalPeer::NUM_HYDRATE_COLUMNS;

        AlatTransportasiPeer::addSelectColumns($criteria);
        $startcol13 = $startcol12 + AlatTransportasiPeer::NUM_HYDRATE_COLUMNS;

        PekerjaanPeer::addSelectColumns($criteria);
        $startcol14 = $startcol13 + PekerjaanPeer::NUM_HYDRATE_COLUMNS;

        JenjangPendidikanPeer::addSelectColumns($criteria);
        $startcol15 = $startcol14 + JenjangPendidikanPeer::NUM_HYDRATE_COLUMNS;

        PekerjaanPeer::addSelectColumns($criteria);
        $startcol16 = $startcol15 + PekerjaanPeer::NUM_HYDRATE_COLUMNS;

        JenjangPendidikanPeer::addSelectColumns($criteria);
        $startcol17 = $startcol16 + JenjangPendidikanPeer::NUM_HYDRATE_COLUMNS;

        PekerjaanPeer::addSelectColumns($criteria);
        $startcol18 = $startcol17 + PekerjaanPeer::NUM_HYDRATE_COLUMNS;

        JenjangPendidikanPeer::addSelectColumns($criteria);
        $startcol19 = $startcol18 + JenjangPendidikanPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID_AYAH, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID_IBU, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KEWARGANEGARAAN, NegaraPeer::NEGARA_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::ID_LAYAK_PIP, AlasanLayakPipPeer::ID_LAYAK_PIP, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::ID_BANK, BankPeer::ID_BANK, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::AGAMA_ID, AgamaPeer::AGAMA_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENIS_TINGGAL_ID, JenisTinggalPeer::JENIS_TINGGAL_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::ALAT_TRANSPORTASI_ID, AlatTransportasiPeer::ALAT_TRANSPORTASI_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID_AYAH, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENJANG_PENDIDIKAN_IBU, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID_IBU, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENJANG_PENDIDIKAN_AYAH, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID_WALI, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENJANG_PENDIDIKAN_WALI, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PesertaDidikPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PesertaDidikPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = PesertaDidikPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PesertaDidikPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined KebutuhanKhusus rows

                $key2 = KebutuhanKhususPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = KebutuhanKhususPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = KebutuhanKhususPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    KebutuhanKhususPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj2 (KebutuhanKhusus)
                $obj2->addPesertaDidikRelatedByKebutuhanKhususIdAyah($obj1);

            } // if joined row is not null

                // Add objects for joined KebutuhanKhusus rows

                $key3 = KebutuhanKhususPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = KebutuhanKhususPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = KebutuhanKhususPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    KebutuhanKhususPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj3 (KebutuhanKhusus)
                $obj3->addPesertaDidikRelatedByKebutuhanKhususIdIbu($obj1);

            } // if joined row is not null

                // Add objects for joined Negara rows

                $key4 = NegaraPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = NegaraPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = NegaraPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    NegaraPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj4 (Negara)
                $obj4->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined AlasanLayakPip rows

                $key5 = AlasanLayakPipPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = AlasanLayakPipPeer::getInstanceFromPool($key5);
                    if (!$obj5) {
    
                        $cls = AlasanLayakPipPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    AlasanLayakPipPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj5 (AlasanLayakPip)
                $obj5->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined Bank rows

                $key6 = BankPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = BankPeer::getInstanceFromPool($key6);
                    if (!$obj6) {
    
                        $cls = BankPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    BankPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj6 (Bank)
                $obj6->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined MstWilayah rows

                $key7 = MstWilayahPeer::getPrimaryKeyHashFromRow($row, $startcol7);
                if ($key7 !== null) {
                    $obj7 = MstWilayahPeer::getInstanceFromPool($key7);
                    if (!$obj7) {
    
                        $cls = MstWilayahPeer::getOMClass();

                    $obj7 = new $cls();
                    $obj7->hydrate($row, $startcol7);
                    MstWilayahPeer::addInstanceToPool($obj7, $key7);
                } // if $obj7 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj7 (MstWilayah)
                $obj7->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined KebutuhanKhusus rows

                $key8 = KebutuhanKhususPeer::getPrimaryKeyHashFromRow($row, $startcol8);
                if ($key8 !== null) {
                    $obj8 = KebutuhanKhususPeer::getInstanceFromPool($key8);
                    if (!$obj8) {
    
                        $cls = KebutuhanKhususPeer::getOMClass();

                    $obj8 = new $cls();
                    $obj8->hydrate($row, $startcol8);
                    KebutuhanKhususPeer::addInstanceToPool($obj8, $key8);
                } // if $obj8 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj8 (KebutuhanKhusus)
                $obj8->addPesertaDidikRelatedByKebutuhanKhususId($obj1);

            } // if joined row is not null

                // Add objects for joined Pekerjaan rows

                $key9 = PekerjaanPeer::getPrimaryKeyHashFromRow($row, $startcol9);
                if ($key9 !== null) {
                    $obj9 = PekerjaanPeer::getInstanceFromPool($key9);
                    if (!$obj9) {
    
                        $cls = PekerjaanPeer::getOMClass();

                    $obj9 = new $cls();
                    $obj9->hydrate($row, $startcol9);
                    PekerjaanPeer::addInstanceToPool($obj9, $key9);
                } // if $obj9 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj9 (Pekerjaan)
                $obj9->addPesertaDidikRelatedByPekerjaanId($obj1);

            } // if joined row is not null

                // Add objects for joined Agama rows

                $key10 = AgamaPeer::getPrimaryKeyHashFromRow($row, $startcol10);
                if ($key10 !== null) {
                    $obj10 = AgamaPeer::getInstanceFromPool($key10);
                    if (!$obj10) {
    
                        $cls = AgamaPeer::getOMClass();

                    $obj10 = new $cls();
                    $obj10->hydrate($row, $startcol10);
                    AgamaPeer::addInstanceToPool($obj10, $key10);
                } // if $obj10 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj10 (Agama)
                $obj10->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined JenisTinggal rows

                $key11 = JenisTinggalPeer::getPrimaryKeyHashFromRow($row, $startcol11);
                if ($key11 !== null) {
                    $obj11 = JenisTinggalPeer::getInstanceFromPool($key11);
                    if (!$obj11) {
    
                        $cls = JenisTinggalPeer::getOMClass();

                    $obj11 = new $cls();
                    $obj11->hydrate($row, $startcol11);
                    JenisTinggalPeer::addInstanceToPool($obj11, $key11);
                } // if $obj11 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj11 (JenisTinggal)
                $obj11->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined AlatTransportasi rows

                $key12 = AlatTransportasiPeer::getPrimaryKeyHashFromRow($row, $startcol12);
                if ($key12 !== null) {
                    $obj12 = AlatTransportasiPeer::getInstanceFromPool($key12);
                    if (!$obj12) {
    
                        $cls = AlatTransportasiPeer::getOMClass();

                    $obj12 = new $cls();
                    $obj12->hydrate($row, $startcol12);
                    AlatTransportasiPeer::addInstanceToPool($obj12, $key12);
                } // if $obj12 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj12 (AlatTransportasi)
                $obj12->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined Pekerjaan rows

                $key13 = PekerjaanPeer::getPrimaryKeyHashFromRow($row, $startcol13);
                if ($key13 !== null) {
                    $obj13 = PekerjaanPeer::getInstanceFromPool($key13);
                    if (!$obj13) {
    
                        $cls = PekerjaanPeer::getOMClass();

                    $obj13 = new $cls();
                    $obj13->hydrate($row, $startcol13);
                    PekerjaanPeer::addInstanceToPool($obj13, $key13);
                } // if $obj13 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj13 (Pekerjaan)
                $obj13->addPesertaDidikRelatedByPekerjaanIdAyah($obj1);

            } // if joined row is not null

                // Add objects for joined JenjangPendidikan rows

                $key14 = JenjangPendidikanPeer::getPrimaryKeyHashFromRow($row, $startcol14);
                if ($key14 !== null) {
                    $obj14 = JenjangPendidikanPeer::getInstanceFromPool($key14);
                    if (!$obj14) {
    
                        $cls = JenjangPendidikanPeer::getOMClass();

                    $obj14 = new $cls();
                    $obj14->hydrate($row, $startcol14);
                    JenjangPendidikanPeer::addInstanceToPool($obj14, $key14);
                } // if $obj14 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj14 (JenjangPendidikan)
                $obj14->addPesertaDidikRelatedByJenjangPendidikanIbu($obj1);

            } // if joined row is not null

                // Add objects for joined Pekerjaan rows

                $key15 = PekerjaanPeer::getPrimaryKeyHashFromRow($row, $startcol15);
                if ($key15 !== null) {
                    $obj15 = PekerjaanPeer::getInstanceFromPool($key15);
                    if (!$obj15) {
    
                        $cls = PekerjaanPeer::getOMClass();

                    $obj15 = new $cls();
                    $obj15->hydrate($row, $startcol15);
                    PekerjaanPeer::addInstanceToPool($obj15, $key15);
                } // if $obj15 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj15 (Pekerjaan)
                $obj15->addPesertaDidikRelatedByPekerjaanIdIbu($obj1);

            } // if joined row is not null

                // Add objects for joined JenjangPendidikan rows

                $key16 = JenjangPendidikanPeer::getPrimaryKeyHashFromRow($row, $startcol16);
                if ($key16 !== null) {
                    $obj16 = JenjangPendidikanPeer::getInstanceFromPool($key16);
                    if (!$obj16) {
    
                        $cls = JenjangPendidikanPeer::getOMClass();

                    $obj16 = new $cls();
                    $obj16->hydrate($row, $startcol16);
                    JenjangPendidikanPeer::addInstanceToPool($obj16, $key16);
                } // if $obj16 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj16 (JenjangPendidikan)
                $obj16->addPesertaDidikRelatedByJenjangPendidikanAyah($obj1);

            } // if joined row is not null

                // Add objects for joined Pekerjaan rows

                $key17 = PekerjaanPeer::getPrimaryKeyHashFromRow($row, $startcol17);
                if ($key17 !== null) {
                    $obj17 = PekerjaanPeer::getInstanceFromPool($key17);
                    if (!$obj17) {
    
                        $cls = PekerjaanPeer::getOMClass();

                    $obj17 = new $cls();
                    $obj17->hydrate($row, $startcol17);
                    PekerjaanPeer::addInstanceToPool($obj17, $key17);
                } // if $obj17 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj17 (Pekerjaan)
                $obj17->addPesertaDidikRelatedByPekerjaanIdWali($obj1);

            } // if joined row is not null

                // Add objects for joined JenjangPendidikan rows

                $key18 = JenjangPendidikanPeer::getPrimaryKeyHashFromRow($row, $startcol18);
                if ($key18 !== null) {
                    $obj18 = JenjangPendidikanPeer::getInstanceFromPool($key18);
                    if (!$obj18) {
    
                        $cls = JenjangPendidikanPeer::getOMClass();

                    $obj18 = new $cls();
                    $obj18->hydrate($row, $startcol18);
                    JenjangPendidikanPeer::addInstanceToPool($obj18, $key18);
                } // if $obj18 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj18 (JenjangPendidikan)
                $obj18->addPesertaDidikRelatedByJenjangPendidikanWali($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of PesertaDidik objects pre-filled with all related objects except JenisTinggal.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of PesertaDidik objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptJenisTinggal(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PesertaDidikPeer::DATABASE_NAME);
        }

        PesertaDidikPeer::addSelectColumns($criteria);
        $startcol2 = PesertaDidikPeer::NUM_HYDRATE_COLUMNS;

        KebutuhanKhususPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + KebutuhanKhususPeer::NUM_HYDRATE_COLUMNS;

        KebutuhanKhususPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + KebutuhanKhususPeer::NUM_HYDRATE_COLUMNS;

        NegaraPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + NegaraPeer::NUM_HYDRATE_COLUMNS;

        AlasanLayakPipPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + AlasanLayakPipPeer::NUM_HYDRATE_COLUMNS;

        BankPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + BankPeer::NUM_HYDRATE_COLUMNS;

        MstWilayahPeer::addSelectColumns($criteria);
        $startcol8 = $startcol7 + MstWilayahPeer::NUM_HYDRATE_COLUMNS;

        KebutuhanKhususPeer::addSelectColumns($criteria);
        $startcol9 = $startcol8 + KebutuhanKhususPeer::NUM_HYDRATE_COLUMNS;

        PekerjaanPeer::addSelectColumns($criteria);
        $startcol10 = $startcol9 + PekerjaanPeer::NUM_HYDRATE_COLUMNS;

        AgamaPeer::addSelectColumns($criteria);
        $startcol11 = $startcol10 + AgamaPeer::NUM_HYDRATE_COLUMNS;

        PenghasilanPeer::addSelectColumns($criteria);
        $startcol12 = $startcol11 + PenghasilanPeer::NUM_HYDRATE_COLUMNS;

        AlatTransportasiPeer::addSelectColumns($criteria);
        $startcol13 = $startcol12 + AlatTransportasiPeer::NUM_HYDRATE_COLUMNS;

        PekerjaanPeer::addSelectColumns($criteria);
        $startcol14 = $startcol13 + PekerjaanPeer::NUM_HYDRATE_COLUMNS;

        JenjangPendidikanPeer::addSelectColumns($criteria);
        $startcol15 = $startcol14 + JenjangPendidikanPeer::NUM_HYDRATE_COLUMNS;

        PenghasilanPeer::addSelectColumns($criteria);
        $startcol16 = $startcol15 + PenghasilanPeer::NUM_HYDRATE_COLUMNS;

        PekerjaanPeer::addSelectColumns($criteria);
        $startcol17 = $startcol16 + PekerjaanPeer::NUM_HYDRATE_COLUMNS;

        JenjangPendidikanPeer::addSelectColumns($criteria);
        $startcol18 = $startcol17 + JenjangPendidikanPeer::NUM_HYDRATE_COLUMNS;

        PenghasilanPeer::addSelectColumns($criteria);
        $startcol19 = $startcol18 + PenghasilanPeer::NUM_HYDRATE_COLUMNS;

        PekerjaanPeer::addSelectColumns($criteria);
        $startcol20 = $startcol19 + PekerjaanPeer::NUM_HYDRATE_COLUMNS;

        JenjangPendidikanPeer::addSelectColumns($criteria);
        $startcol21 = $startcol20 + JenjangPendidikanPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID_AYAH, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID_IBU, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KEWARGANEGARAAN, NegaraPeer::NEGARA_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::ID_LAYAK_PIP, AlasanLayakPipPeer::ID_LAYAK_PIP, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::ID_BANK, BankPeer::ID_BANK, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::AGAMA_ID, AgamaPeer::AGAMA_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PENGHASILAN_ID_AYAH, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::ALAT_TRANSPORTASI_ID, AlatTransportasiPeer::ALAT_TRANSPORTASI_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID_AYAH, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENJANG_PENDIDIKAN_IBU, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PENGHASILAN_ID_WALI, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID_IBU, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENJANG_PENDIDIKAN_AYAH, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PENGHASILAN_ID_IBU, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID_WALI, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENJANG_PENDIDIKAN_WALI, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PesertaDidikPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PesertaDidikPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = PesertaDidikPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PesertaDidikPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined KebutuhanKhusus rows

                $key2 = KebutuhanKhususPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = KebutuhanKhususPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = KebutuhanKhususPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    KebutuhanKhususPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj2 (KebutuhanKhusus)
                $obj2->addPesertaDidikRelatedByKebutuhanKhususIdAyah($obj1);

            } // if joined row is not null

                // Add objects for joined KebutuhanKhusus rows

                $key3 = KebutuhanKhususPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = KebutuhanKhususPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = KebutuhanKhususPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    KebutuhanKhususPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj3 (KebutuhanKhusus)
                $obj3->addPesertaDidikRelatedByKebutuhanKhususIdIbu($obj1);

            } // if joined row is not null

                // Add objects for joined Negara rows

                $key4 = NegaraPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = NegaraPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = NegaraPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    NegaraPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj4 (Negara)
                $obj4->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined AlasanLayakPip rows

                $key5 = AlasanLayakPipPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = AlasanLayakPipPeer::getInstanceFromPool($key5);
                    if (!$obj5) {
    
                        $cls = AlasanLayakPipPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    AlasanLayakPipPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj5 (AlasanLayakPip)
                $obj5->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined Bank rows

                $key6 = BankPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = BankPeer::getInstanceFromPool($key6);
                    if (!$obj6) {
    
                        $cls = BankPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    BankPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj6 (Bank)
                $obj6->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined MstWilayah rows

                $key7 = MstWilayahPeer::getPrimaryKeyHashFromRow($row, $startcol7);
                if ($key7 !== null) {
                    $obj7 = MstWilayahPeer::getInstanceFromPool($key7);
                    if (!$obj7) {
    
                        $cls = MstWilayahPeer::getOMClass();

                    $obj7 = new $cls();
                    $obj7->hydrate($row, $startcol7);
                    MstWilayahPeer::addInstanceToPool($obj7, $key7);
                } // if $obj7 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj7 (MstWilayah)
                $obj7->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined KebutuhanKhusus rows

                $key8 = KebutuhanKhususPeer::getPrimaryKeyHashFromRow($row, $startcol8);
                if ($key8 !== null) {
                    $obj8 = KebutuhanKhususPeer::getInstanceFromPool($key8);
                    if (!$obj8) {
    
                        $cls = KebutuhanKhususPeer::getOMClass();

                    $obj8 = new $cls();
                    $obj8->hydrate($row, $startcol8);
                    KebutuhanKhususPeer::addInstanceToPool($obj8, $key8);
                } // if $obj8 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj8 (KebutuhanKhusus)
                $obj8->addPesertaDidikRelatedByKebutuhanKhususId($obj1);

            } // if joined row is not null

                // Add objects for joined Pekerjaan rows

                $key9 = PekerjaanPeer::getPrimaryKeyHashFromRow($row, $startcol9);
                if ($key9 !== null) {
                    $obj9 = PekerjaanPeer::getInstanceFromPool($key9);
                    if (!$obj9) {
    
                        $cls = PekerjaanPeer::getOMClass();

                    $obj9 = new $cls();
                    $obj9->hydrate($row, $startcol9);
                    PekerjaanPeer::addInstanceToPool($obj9, $key9);
                } // if $obj9 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj9 (Pekerjaan)
                $obj9->addPesertaDidikRelatedByPekerjaanId($obj1);

            } // if joined row is not null

                // Add objects for joined Agama rows

                $key10 = AgamaPeer::getPrimaryKeyHashFromRow($row, $startcol10);
                if ($key10 !== null) {
                    $obj10 = AgamaPeer::getInstanceFromPool($key10);
                    if (!$obj10) {
    
                        $cls = AgamaPeer::getOMClass();

                    $obj10 = new $cls();
                    $obj10->hydrate($row, $startcol10);
                    AgamaPeer::addInstanceToPool($obj10, $key10);
                } // if $obj10 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj10 (Agama)
                $obj10->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined Penghasilan rows

                $key11 = PenghasilanPeer::getPrimaryKeyHashFromRow($row, $startcol11);
                if ($key11 !== null) {
                    $obj11 = PenghasilanPeer::getInstanceFromPool($key11);
                    if (!$obj11) {
    
                        $cls = PenghasilanPeer::getOMClass();

                    $obj11 = new $cls();
                    $obj11->hydrate($row, $startcol11);
                    PenghasilanPeer::addInstanceToPool($obj11, $key11);
                } // if $obj11 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj11 (Penghasilan)
                $obj11->addPesertaDidikRelatedByPenghasilanIdAyah($obj1);

            } // if joined row is not null

                // Add objects for joined AlatTransportasi rows

                $key12 = AlatTransportasiPeer::getPrimaryKeyHashFromRow($row, $startcol12);
                if ($key12 !== null) {
                    $obj12 = AlatTransportasiPeer::getInstanceFromPool($key12);
                    if (!$obj12) {
    
                        $cls = AlatTransportasiPeer::getOMClass();

                    $obj12 = new $cls();
                    $obj12->hydrate($row, $startcol12);
                    AlatTransportasiPeer::addInstanceToPool($obj12, $key12);
                } // if $obj12 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj12 (AlatTransportasi)
                $obj12->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined Pekerjaan rows

                $key13 = PekerjaanPeer::getPrimaryKeyHashFromRow($row, $startcol13);
                if ($key13 !== null) {
                    $obj13 = PekerjaanPeer::getInstanceFromPool($key13);
                    if (!$obj13) {
    
                        $cls = PekerjaanPeer::getOMClass();

                    $obj13 = new $cls();
                    $obj13->hydrate($row, $startcol13);
                    PekerjaanPeer::addInstanceToPool($obj13, $key13);
                } // if $obj13 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj13 (Pekerjaan)
                $obj13->addPesertaDidikRelatedByPekerjaanIdAyah($obj1);

            } // if joined row is not null

                // Add objects for joined JenjangPendidikan rows

                $key14 = JenjangPendidikanPeer::getPrimaryKeyHashFromRow($row, $startcol14);
                if ($key14 !== null) {
                    $obj14 = JenjangPendidikanPeer::getInstanceFromPool($key14);
                    if (!$obj14) {
    
                        $cls = JenjangPendidikanPeer::getOMClass();

                    $obj14 = new $cls();
                    $obj14->hydrate($row, $startcol14);
                    JenjangPendidikanPeer::addInstanceToPool($obj14, $key14);
                } // if $obj14 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj14 (JenjangPendidikan)
                $obj14->addPesertaDidikRelatedByJenjangPendidikanIbu($obj1);

            } // if joined row is not null

                // Add objects for joined Penghasilan rows

                $key15 = PenghasilanPeer::getPrimaryKeyHashFromRow($row, $startcol15);
                if ($key15 !== null) {
                    $obj15 = PenghasilanPeer::getInstanceFromPool($key15);
                    if (!$obj15) {
    
                        $cls = PenghasilanPeer::getOMClass();

                    $obj15 = new $cls();
                    $obj15->hydrate($row, $startcol15);
                    PenghasilanPeer::addInstanceToPool($obj15, $key15);
                } // if $obj15 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj15 (Penghasilan)
                $obj15->addPesertaDidikRelatedByPenghasilanIdWali($obj1);

            } // if joined row is not null

                // Add objects for joined Pekerjaan rows

                $key16 = PekerjaanPeer::getPrimaryKeyHashFromRow($row, $startcol16);
                if ($key16 !== null) {
                    $obj16 = PekerjaanPeer::getInstanceFromPool($key16);
                    if (!$obj16) {
    
                        $cls = PekerjaanPeer::getOMClass();

                    $obj16 = new $cls();
                    $obj16->hydrate($row, $startcol16);
                    PekerjaanPeer::addInstanceToPool($obj16, $key16);
                } // if $obj16 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj16 (Pekerjaan)
                $obj16->addPesertaDidikRelatedByPekerjaanIdIbu($obj1);

            } // if joined row is not null

                // Add objects for joined JenjangPendidikan rows

                $key17 = JenjangPendidikanPeer::getPrimaryKeyHashFromRow($row, $startcol17);
                if ($key17 !== null) {
                    $obj17 = JenjangPendidikanPeer::getInstanceFromPool($key17);
                    if (!$obj17) {
    
                        $cls = JenjangPendidikanPeer::getOMClass();

                    $obj17 = new $cls();
                    $obj17->hydrate($row, $startcol17);
                    JenjangPendidikanPeer::addInstanceToPool($obj17, $key17);
                } // if $obj17 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj17 (JenjangPendidikan)
                $obj17->addPesertaDidikRelatedByJenjangPendidikanAyah($obj1);

            } // if joined row is not null

                // Add objects for joined Penghasilan rows

                $key18 = PenghasilanPeer::getPrimaryKeyHashFromRow($row, $startcol18);
                if ($key18 !== null) {
                    $obj18 = PenghasilanPeer::getInstanceFromPool($key18);
                    if (!$obj18) {
    
                        $cls = PenghasilanPeer::getOMClass();

                    $obj18 = new $cls();
                    $obj18->hydrate($row, $startcol18);
                    PenghasilanPeer::addInstanceToPool($obj18, $key18);
                } // if $obj18 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj18 (Penghasilan)
                $obj18->addPesertaDidikRelatedByPenghasilanIdIbu($obj1);

            } // if joined row is not null

                // Add objects for joined Pekerjaan rows

                $key19 = PekerjaanPeer::getPrimaryKeyHashFromRow($row, $startcol19);
                if ($key19 !== null) {
                    $obj19 = PekerjaanPeer::getInstanceFromPool($key19);
                    if (!$obj19) {
    
                        $cls = PekerjaanPeer::getOMClass();

                    $obj19 = new $cls();
                    $obj19->hydrate($row, $startcol19);
                    PekerjaanPeer::addInstanceToPool($obj19, $key19);
                } // if $obj19 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj19 (Pekerjaan)
                $obj19->addPesertaDidikRelatedByPekerjaanIdWali($obj1);

            } // if joined row is not null

                // Add objects for joined JenjangPendidikan rows

                $key20 = JenjangPendidikanPeer::getPrimaryKeyHashFromRow($row, $startcol20);
                if ($key20 !== null) {
                    $obj20 = JenjangPendidikanPeer::getInstanceFromPool($key20);
                    if (!$obj20) {
    
                        $cls = JenjangPendidikanPeer::getOMClass();

                    $obj20 = new $cls();
                    $obj20->hydrate($row, $startcol20);
                    JenjangPendidikanPeer::addInstanceToPool($obj20, $key20);
                } // if $obj20 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj20 (JenjangPendidikan)
                $obj20->addPesertaDidikRelatedByJenjangPendidikanWali($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of PesertaDidik objects pre-filled with all related objects except AlatTransportasi.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of PesertaDidik objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptAlatTransportasi(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PesertaDidikPeer::DATABASE_NAME);
        }

        PesertaDidikPeer::addSelectColumns($criteria);
        $startcol2 = PesertaDidikPeer::NUM_HYDRATE_COLUMNS;

        KebutuhanKhususPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + KebutuhanKhususPeer::NUM_HYDRATE_COLUMNS;

        KebutuhanKhususPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + KebutuhanKhususPeer::NUM_HYDRATE_COLUMNS;

        NegaraPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + NegaraPeer::NUM_HYDRATE_COLUMNS;

        AlasanLayakPipPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + AlasanLayakPipPeer::NUM_HYDRATE_COLUMNS;

        BankPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + BankPeer::NUM_HYDRATE_COLUMNS;

        MstWilayahPeer::addSelectColumns($criteria);
        $startcol8 = $startcol7 + MstWilayahPeer::NUM_HYDRATE_COLUMNS;

        KebutuhanKhususPeer::addSelectColumns($criteria);
        $startcol9 = $startcol8 + KebutuhanKhususPeer::NUM_HYDRATE_COLUMNS;

        PekerjaanPeer::addSelectColumns($criteria);
        $startcol10 = $startcol9 + PekerjaanPeer::NUM_HYDRATE_COLUMNS;

        AgamaPeer::addSelectColumns($criteria);
        $startcol11 = $startcol10 + AgamaPeer::NUM_HYDRATE_COLUMNS;

        PenghasilanPeer::addSelectColumns($criteria);
        $startcol12 = $startcol11 + PenghasilanPeer::NUM_HYDRATE_COLUMNS;

        JenisTinggalPeer::addSelectColumns($criteria);
        $startcol13 = $startcol12 + JenisTinggalPeer::NUM_HYDRATE_COLUMNS;

        PekerjaanPeer::addSelectColumns($criteria);
        $startcol14 = $startcol13 + PekerjaanPeer::NUM_HYDRATE_COLUMNS;

        JenjangPendidikanPeer::addSelectColumns($criteria);
        $startcol15 = $startcol14 + JenjangPendidikanPeer::NUM_HYDRATE_COLUMNS;

        PenghasilanPeer::addSelectColumns($criteria);
        $startcol16 = $startcol15 + PenghasilanPeer::NUM_HYDRATE_COLUMNS;

        PekerjaanPeer::addSelectColumns($criteria);
        $startcol17 = $startcol16 + PekerjaanPeer::NUM_HYDRATE_COLUMNS;

        JenjangPendidikanPeer::addSelectColumns($criteria);
        $startcol18 = $startcol17 + JenjangPendidikanPeer::NUM_HYDRATE_COLUMNS;

        PenghasilanPeer::addSelectColumns($criteria);
        $startcol19 = $startcol18 + PenghasilanPeer::NUM_HYDRATE_COLUMNS;

        PekerjaanPeer::addSelectColumns($criteria);
        $startcol20 = $startcol19 + PekerjaanPeer::NUM_HYDRATE_COLUMNS;

        JenjangPendidikanPeer::addSelectColumns($criteria);
        $startcol21 = $startcol20 + JenjangPendidikanPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID_AYAH, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID_IBU, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KEWARGANEGARAAN, NegaraPeer::NEGARA_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::ID_LAYAK_PIP, AlasanLayakPipPeer::ID_LAYAK_PIP, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::ID_BANK, BankPeer::ID_BANK, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::AGAMA_ID, AgamaPeer::AGAMA_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PENGHASILAN_ID_AYAH, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENIS_TINGGAL_ID, JenisTinggalPeer::JENIS_TINGGAL_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID_AYAH, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENJANG_PENDIDIKAN_IBU, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PENGHASILAN_ID_WALI, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID_IBU, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENJANG_PENDIDIKAN_AYAH, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PENGHASILAN_ID_IBU, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID_WALI, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENJANG_PENDIDIKAN_WALI, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PesertaDidikPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PesertaDidikPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = PesertaDidikPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PesertaDidikPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined KebutuhanKhusus rows

                $key2 = KebutuhanKhususPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = KebutuhanKhususPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = KebutuhanKhususPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    KebutuhanKhususPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj2 (KebutuhanKhusus)
                $obj2->addPesertaDidikRelatedByKebutuhanKhususIdAyah($obj1);

            } // if joined row is not null

                // Add objects for joined KebutuhanKhusus rows

                $key3 = KebutuhanKhususPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = KebutuhanKhususPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = KebutuhanKhususPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    KebutuhanKhususPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj3 (KebutuhanKhusus)
                $obj3->addPesertaDidikRelatedByKebutuhanKhususIdIbu($obj1);

            } // if joined row is not null

                // Add objects for joined Negara rows

                $key4 = NegaraPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = NegaraPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = NegaraPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    NegaraPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj4 (Negara)
                $obj4->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined AlasanLayakPip rows

                $key5 = AlasanLayakPipPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = AlasanLayakPipPeer::getInstanceFromPool($key5);
                    if (!$obj5) {
    
                        $cls = AlasanLayakPipPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    AlasanLayakPipPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj5 (AlasanLayakPip)
                $obj5->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined Bank rows

                $key6 = BankPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = BankPeer::getInstanceFromPool($key6);
                    if (!$obj6) {
    
                        $cls = BankPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    BankPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj6 (Bank)
                $obj6->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined MstWilayah rows

                $key7 = MstWilayahPeer::getPrimaryKeyHashFromRow($row, $startcol7);
                if ($key7 !== null) {
                    $obj7 = MstWilayahPeer::getInstanceFromPool($key7);
                    if (!$obj7) {
    
                        $cls = MstWilayahPeer::getOMClass();

                    $obj7 = new $cls();
                    $obj7->hydrate($row, $startcol7);
                    MstWilayahPeer::addInstanceToPool($obj7, $key7);
                } // if $obj7 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj7 (MstWilayah)
                $obj7->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined KebutuhanKhusus rows

                $key8 = KebutuhanKhususPeer::getPrimaryKeyHashFromRow($row, $startcol8);
                if ($key8 !== null) {
                    $obj8 = KebutuhanKhususPeer::getInstanceFromPool($key8);
                    if (!$obj8) {
    
                        $cls = KebutuhanKhususPeer::getOMClass();

                    $obj8 = new $cls();
                    $obj8->hydrate($row, $startcol8);
                    KebutuhanKhususPeer::addInstanceToPool($obj8, $key8);
                } // if $obj8 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj8 (KebutuhanKhusus)
                $obj8->addPesertaDidikRelatedByKebutuhanKhususId($obj1);

            } // if joined row is not null

                // Add objects for joined Pekerjaan rows

                $key9 = PekerjaanPeer::getPrimaryKeyHashFromRow($row, $startcol9);
                if ($key9 !== null) {
                    $obj9 = PekerjaanPeer::getInstanceFromPool($key9);
                    if (!$obj9) {
    
                        $cls = PekerjaanPeer::getOMClass();

                    $obj9 = new $cls();
                    $obj9->hydrate($row, $startcol9);
                    PekerjaanPeer::addInstanceToPool($obj9, $key9);
                } // if $obj9 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj9 (Pekerjaan)
                $obj9->addPesertaDidikRelatedByPekerjaanId($obj1);

            } // if joined row is not null

                // Add objects for joined Agama rows

                $key10 = AgamaPeer::getPrimaryKeyHashFromRow($row, $startcol10);
                if ($key10 !== null) {
                    $obj10 = AgamaPeer::getInstanceFromPool($key10);
                    if (!$obj10) {
    
                        $cls = AgamaPeer::getOMClass();

                    $obj10 = new $cls();
                    $obj10->hydrate($row, $startcol10);
                    AgamaPeer::addInstanceToPool($obj10, $key10);
                } // if $obj10 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj10 (Agama)
                $obj10->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined Penghasilan rows

                $key11 = PenghasilanPeer::getPrimaryKeyHashFromRow($row, $startcol11);
                if ($key11 !== null) {
                    $obj11 = PenghasilanPeer::getInstanceFromPool($key11);
                    if (!$obj11) {
    
                        $cls = PenghasilanPeer::getOMClass();

                    $obj11 = new $cls();
                    $obj11->hydrate($row, $startcol11);
                    PenghasilanPeer::addInstanceToPool($obj11, $key11);
                } // if $obj11 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj11 (Penghasilan)
                $obj11->addPesertaDidikRelatedByPenghasilanIdAyah($obj1);

            } // if joined row is not null

                // Add objects for joined JenisTinggal rows

                $key12 = JenisTinggalPeer::getPrimaryKeyHashFromRow($row, $startcol12);
                if ($key12 !== null) {
                    $obj12 = JenisTinggalPeer::getInstanceFromPool($key12);
                    if (!$obj12) {
    
                        $cls = JenisTinggalPeer::getOMClass();

                    $obj12 = new $cls();
                    $obj12->hydrate($row, $startcol12);
                    JenisTinggalPeer::addInstanceToPool($obj12, $key12);
                } // if $obj12 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj12 (JenisTinggal)
                $obj12->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined Pekerjaan rows

                $key13 = PekerjaanPeer::getPrimaryKeyHashFromRow($row, $startcol13);
                if ($key13 !== null) {
                    $obj13 = PekerjaanPeer::getInstanceFromPool($key13);
                    if (!$obj13) {
    
                        $cls = PekerjaanPeer::getOMClass();

                    $obj13 = new $cls();
                    $obj13->hydrate($row, $startcol13);
                    PekerjaanPeer::addInstanceToPool($obj13, $key13);
                } // if $obj13 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj13 (Pekerjaan)
                $obj13->addPesertaDidikRelatedByPekerjaanIdAyah($obj1);

            } // if joined row is not null

                // Add objects for joined JenjangPendidikan rows

                $key14 = JenjangPendidikanPeer::getPrimaryKeyHashFromRow($row, $startcol14);
                if ($key14 !== null) {
                    $obj14 = JenjangPendidikanPeer::getInstanceFromPool($key14);
                    if (!$obj14) {
    
                        $cls = JenjangPendidikanPeer::getOMClass();

                    $obj14 = new $cls();
                    $obj14->hydrate($row, $startcol14);
                    JenjangPendidikanPeer::addInstanceToPool($obj14, $key14);
                } // if $obj14 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj14 (JenjangPendidikan)
                $obj14->addPesertaDidikRelatedByJenjangPendidikanIbu($obj1);

            } // if joined row is not null

                // Add objects for joined Penghasilan rows

                $key15 = PenghasilanPeer::getPrimaryKeyHashFromRow($row, $startcol15);
                if ($key15 !== null) {
                    $obj15 = PenghasilanPeer::getInstanceFromPool($key15);
                    if (!$obj15) {
    
                        $cls = PenghasilanPeer::getOMClass();

                    $obj15 = new $cls();
                    $obj15->hydrate($row, $startcol15);
                    PenghasilanPeer::addInstanceToPool($obj15, $key15);
                } // if $obj15 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj15 (Penghasilan)
                $obj15->addPesertaDidikRelatedByPenghasilanIdWali($obj1);

            } // if joined row is not null

                // Add objects for joined Pekerjaan rows

                $key16 = PekerjaanPeer::getPrimaryKeyHashFromRow($row, $startcol16);
                if ($key16 !== null) {
                    $obj16 = PekerjaanPeer::getInstanceFromPool($key16);
                    if (!$obj16) {
    
                        $cls = PekerjaanPeer::getOMClass();

                    $obj16 = new $cls();
                    $obj16->hydrate($row, $startcol16);
                    PekerjaanPeer::addInstanceToPool($obj16, $key16);
                } // if $obj16 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj16 (Pekerjaan)
                $obj16->addPesertaDidikRelatedByPekerjaanIdIbu($obj1);

            } // if joined row is not null

                // Add objects for joined JenjangPendidikan rows

                $key17 = JenjangPendidikanPeer::getPrimaryKeyHashFromRow($row, $startcol17);
                if ($key17 !== null) {
                    $obj17 = JenjangPendidikanPeer::getInstanceFromPool($key17);
                    if (!$obj17) {
    
                        $cls = JenjangPendidikanPeer::getOMClass();

                    $obj17 = new $cls();
                    $obj17->hydrate($row, $startcol17);
                    JenjangPendidikanPeer::addInstanceToPool($obj17, $key17);
                } // if $obj17 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj17 (JenjangPendidikan)
                $obj17->addPesertaDidikRelatedByJenjangPendidikanAyah($obj1);

            } // if joined row is not null

                // Add objects for joined Penghasilan rows

                $key18 = PenghasilanPeer::getPrimaryKeyHashFromRow($row, $startcol18);
                if ($key18 !== null) {
                    $obj18 = PenghasilanPeer::getInstanceFromPool($key18);
                    if (!$obj18) {
    
                        $cls = PenghasilanPeer::getOMClass();

                    $obj18 = new $cls();
                    $obj18->hydrate($row, $startcol18);
                    PenghasilanPeer::addInstanceToPool($obj18, $key18);
                } // if $obj18 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj18 (Penghasilan)
                $obj18->addPesertaDidikRelatedByPenghasilanIdIbu($obj1);

            } // if joined row is not null

                // Add objects for joined Pekerjaan rows

                $key19 = PekerjaanPeer::getPrimaryKeyHashFromRow($row, $startcol19);
                if ($key19 !== null) {
                    $obj19 = PekerjaanPeer::getInstanceFromPool($key19);
                    if (!$obj19) {
    
                        $cls = PekerjaanPeer::getOMClass();

                    $obj19 = new $cls();
                    $obj19->hydrate($row, $startcol19);
                    PekerjaanPeer::addInstanceToPool($obj19, $key19);
                } // if $obj19 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj19 (Pekerjaan)
                $obj19->addPesertaDidikRelatedByPekerjaanIdWali($obj1);

            } // if joined row is not null

                // Add objects for joined JenjangPendidikan rows

                $key20 = JenjangPendidikanPeer::getPrimaryKeyHashFromRow($row, $startcol20);
                if ($key20 !== null) {
                    $obj20 = JenjangPendidikanPeer::getInstanceFromPool($key20);
                    if (!$obj20) {
    
                        $cls = JenjangPendidikanPeer::getOMClass();

                    $obj20 = new $cls();
                    $obj20->hydrate($row, $startcol20);
                    JenjangPendidikanPeer::addInstanceToPool($obj20, $key20);
                } // if $obj20 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj20 (JenjangPendidikan)
                $obj20->addPesertaDidikRelatedByJenjangPendidikanWali($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of PesertaDidik objects pre-filled with all related objects except PekerjaanRelatedByPekerjaanIdAyah.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of PesertaDidik objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptPekerjaanRelatedByPekerjaanIdAyah(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PesertaDidikPeer::DATABASE_NAME);
        }

        PesertaDidikPeer::addSelectColumns($criteria);
        $startcol2 = PesertaDidikPeer::NUM_HYDRATE_COLUMNS;

        KebutuhanKhususPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + KebutuhanKhususPeer::NUM_HYDRATE_COLUMNS;

        KebutuhanKhususPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + KebutuhanKhususPeer::NUM_HYDRATE_COLUMNS;

        NegaraPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + NegaraPeer::NUM_HYDRATE_COLUMNS;

        AlasanLayakPipPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + AlasanLayakPipPeer::NUM_HYDRATE_COLUMNS;

        BankPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + BankPeer::NUM_HYDRATE_COLUMNS;

        MstWilayahPeer::addSelectColumns($criteria);
        $startcol8 = $startcol7 + MstWilayahPeer::NUM_HYDRATE_COLUMNS;

        KebutuhanKhususPeer::addSelectColumns($criteria);
        $startcol9 = $startcol8 + KebutuhanKhususPeer::NUM_HYDRATE_COLUMNS;

        AgamaPeer::addSelectColumns($criteria);
        $startcol10 = $startcol9 + AgamaPeer::NUM_HYDRATE_COLUMNS;

        PenghasilanPeer::addSelectColumns($criteria);
        $startcol11 = $startcol10 + PenghasilanPeer::NUM_HYDRATE_COLUMNS;

        JenisTinggalPeer::addSelectColumns($criteria);
        $startcol12 = $startcol11 + JenisTinggalPeer::NUM_HYDRATE_COLUMNS;

        AlatTransportasiPeer::addSelectColumns($criteria);
        $startcol13 = $startcol12 + AlatTransportasiPeer::NUM_HYDRATE_COLUMNS;

        JenjangPendidikanPeer::addSelectColumns($criteria);
        $startcol14 = $startcol13 + JenjangPendidikanPeer::NUM_HYDRATE_COLUMNS;

        PenghasilanPeer::addSelectColumns($criteria);
        $startcol15 = $startcol14 + PenghasilanPeer::NUM_HYDRATE_COLUMNS;

        JenjangPendidikanPeer::addSelectColumns($criteria);
        $startcol16 = $startcol15 + JenjangPendidikanPeer::NUM_HYDRATE_COLUMNS;

        PenghasilanPeer::addSelectColumns($criteria);
        $startcol17 = $startcol16 + PenghasilanPeer::NUM_HYDRATE_COLUMNS;

        JenjangPendidikanPeer::addSelectColumns($criteria);
        $startcol18 = $startcol17 + JenjangPendidikanPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID_AYAH, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID_IBU, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KEWARGANEGARAAN, NegaraPeer::NEGARA_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::ID_LAYAK_PIP, AlasanLayakPipPeer::ID_LAYAK_PIP, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::ID_BANK, BankPeer::ID_BANK, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::AGAMA_ID, AgamaPeer::AGAMA_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PENGHASILAN_ID_AYAH, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENIS_TINGGAL_ID, JenisTinggalPeer::JENIS_TINGGAL_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::ALAT_TRANSPORTASI_ID, AlatTransportasiPeer::ALAT_TRANSPORTASI_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENJANG_PENDIDIKAN_IBU, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PENGHASILAN_ID_WALI, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENJANG_PENDIDIKAN_AYAH, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PENGHASILAN_ID_IBU, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENJANG_PENDIDIKAN_WALI, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PesertaDidikPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PesertaDidikPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = PesertaDidikPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PesertaDidikPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined KebutuhanKhusus rows

                $key2 = KebutuhanKhususPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = KebutuhanKhususPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = KebutuhanKhususPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    KebutuhanKhususPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj2 (KebutuhanKhusus)
                $obj2->addPesertaDidikRelatedByKebutuhanKhususIdAyah($obj1);

            } // if joined row is not null

                // Add objects for joined KebutuhanKhusus rows

                $key3 = KebutuhanKhususPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = KebutuhanKhususPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = KebutuhanKhususPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    KebutuhanKhususPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj3 (KebutuhanKhusus)
                $obj3->addPesertaDidikRelatedByKebutuhanKhususIdIbu($obj1);

            } // if joined row is not null

                // Add objects for joined Negara rows

                $key4 = NegaraPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = NegaraPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = NegaraPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    NegaraPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj4 (Negara)
                $obj4->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined AlasanLayakPip rows

                $key5 = AlasanLayakPipPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = AlasanLayakPipPeer::getInstanceFromPool($key5);
                    if (!$obj5) {
    
                        $cls = AlasanLayakPipPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    AlasanLayakPipPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj5 (AlasanLayakPip)
                $obj5->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined Bank rows

                $key6 = BankPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = BankPeer::getInstanceFromPool($key6);
                    if (!$obj6) {
    
                        $cls = BankPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    BankPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj6 (Bank)
                $obj6->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined MstWilayah rows

                $key7 = MstWilayahPeer::getPrimaryKeyHashFromRow($row, $startcol7);
                if ($key7 !== null) {
                    $obj7 = MstWilayahPeer::getInstanceFromPool($key7);
                    if (!$obj7) {
    
                        $cls = MstWilayahPeer::getOMClass();

                    $obj7 = new $cls();
                    $obj7->hydrate($row, $startcol7);
                    MstWilayahPeer::addInstanceToPool($obj7, $key7);
                } // if $obj7 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj7 (MstWilayah)
                $obj7->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined KebutuhanKhusus rows

                $key8 = KebutuhanKhususPeer::getPrimaryKeyHashFromRow($row, $startcol8);
                if ($key8 !== null) {
                    $obj8 = KebutuhanKhususPeer::getInstanceFromPool($key8);
                    if (!$obj8) {
    
                        $cls = KebutuhanKhususPeer::getOMClass();

                    $obj8 = new $cls();
                    $obj8->hydrate($row, $startcol8);
                    KebutuhanKhususPeer::addInstanceToPool($obj8, $key8);
                } // if $obj8 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj8 (KebutuhanKhusus)
                $obj8->addPesertaDidikRelatedByKebutuhanKhususId($obj1);

            } // if joined row is not null

                // Add objects for joined Agama rows

                $key9 = AgamaPeer::getPrimaryKeyHashFromRow($row, $startcol9);
                if ($key9 !== null) {
                    $obj9 = AgamaPeer::getInstanceFromPool($key9);
                    if (!$obj9) {
    
                        $cls = AgamaPeer::getOMClass();

                    $obj9 = new $cls();
                    $obj9->hydrate($row, $startcol9);
                    AgamaPeer::addInstanceToPool($obj9, $key9);
                } // if $obj9 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj9 (Agama)
                $obj9->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined Penghasilan rows

                $key10 = PenghasilanPeer::getPrimaryKeyHashFromRow($row, $startcol10);
                if ($key10 !== null) {
                    $obj10 = PenghasilanPeer::getInstanceFromPool($key10);
                    if (!$obj10) {
    
                        $cls = PenghasilanPeer::getOMClass();

                    $obj10 = new $cls();
                    $obj10->hydrate($row, $startcol10);
                    PenghasilanPeer::addInstanceToPool($obj10, $key10);
                } // if $obj10 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj10 (Penghasilan)
                $obj10->addPesertaDidikRelatedByPenghasilanIdAyah($obj1);

            } // if joined row is not null

                // Add objects for joined JenisTinggal rows

                $key11 = JenisTinggalPeer::getPrimaryKeyHashFromRow($row, $startcol11);
                if ($key11 !== null) {
                    $obj11 = JenisTinggalPeer::getInstanceFromPool($key11);
                    if (!$obj11) {
    
                        $cls = JenisTinggalPeer::getOMClass();

                    $obj11 = new $cls();
                    $obj11->hydrate($row, $startcol11);
                    JenisTinggalPeer::addInstanceToPool($obj11, $key11);
                } // if $obj11 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj11 (JenisTinggal)
                $obj11->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined AlatTransportasi rows

                $key12 = AlatTransportasiPeer::getPrimaryKeyHashFromRow($row, $startcol12);
                if ($key12 !== null) {
                    $obj12 = AlatTransportasiPeer::getInstanceFromPool($key12);
                    if (!$obj12) {
    
                        $cls = AlatTransportasiPeer::getOMClass();

                    $obj12 = new $cls();
                    $obj12->hydrate($row, $startcol12);
                    AlatTransportasiPeer::addInstanceToPool($obj12, $key12);
                } // if $obj12 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj12 (AlatTransportasi)
                $obj12->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined JenjangPendidikan rows

                $key13 = JenjangPendidikanPeer::getPrimaryKeyHashFromRow($row, $startcol13);
                if ($key13 !== null) {
                    $obj13 = JenjangPendidikanPeer::getInstanceFromPool($key13);
                    if (!$obj13) {
    
                        $cls = JenjangPendidikanPeer::getOMClass();

                    $obj13 = new $cls();
                    $obj13->hydrate($row, $startcol13);
                    JenjangPendidikanPeer::addInstanceToPool($obj13, $key13);
                } // if $obj13 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj13 (JenjangPendidikan)
                $obj13->addPesertaDidikRelatedByJenjangPendidikanIbu($obj1);

            } // if joined row is not null

                // Add objects for joined Penghasilan rows

                $key14 = PenghasilanPeer::getPrimaryKeyHashFromRow($row, $startcol14);
                if ($key14 !== null) {
                    $obj14 = PenghasilanPeer::getInstanceFromPool($key14);
                    if (!$obj14) {
    
                        $cls = PenghasilanPeer::getOMClass();

                    $obj14 = new $cls();
                    $obj14->hydrate($row, $startcol14);
                    PenghasilanPeer::addInstanceToPool($obj14, $key14);
                } // if $obj14 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj14 (Penghasilan)
                $obj14->addPesertaDidikRelatedByPenghasilanIdWali($obj1);

            } // if joined row is not null

                // Add objects for joined JenjangPendidikan rows

                $key15 = JenjangPendidikanPeer::getPrimaryKeyHashFromRow($row, $startcol15);
                if ($key15 !== null) {
                    $obj15 = JenjangPendidikanPeer::getInstanceFromPool($key15);
                    if (!$obj15) {
    
                        $cls = JenjangPendidikanPeer::getOMClass();

                    $obj15 = new $cls();
                    $obj15->hydrate($row, $startcol15);
                    JenjangPendidikanPeer::addInstanceToPool($obj15, $key15);
                } // if $obj15 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj15 (JenjangPendidikan)
                $obj15->addPesertaDidikRelatedByJenjangPendidikanAyah($obj1);

            } // if joined row is not null

                // Add objects for joined Penghasilan rows

                $key16 = PenghasilanPeer::getPrimaryKeyHashFromRow($row, $startcol16);
                if ($key16 !== null) {
                    $obj16 = PenghasilanPeer::getInstanceFromPool($key16);
                    if (!$obj16) {
    
                        $cls = PenghasilanPeer::getOMClass();

                    $obj16 = new $cls();
                    $obj16->hydrate($row, $startcol16);
                    PenghasilanPeer::addInstanceToPool($obj16, $key16);
                } // if $obj16 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj16 (Penghasilan)
                $obj16->addPesertaDidikRelatedByPenghasilanIdIbu($obj1);

            } // if joined row is not null

                // Add objects for joined JenjangPendidikan rows

                $key17 = JenjangPendidikanPeer::getPrimaryKeyHashFromRow($row, $startcol17);
                if ($key17 !== null) {
                    $obj17 = JenjangPendidikanPeer::getInstanceFromPool($key17);
                    if (!$obj17) {
    
                        $cls = JenjangPendidikanPeer::getOMClass();

                    $obj17 = new $cls();
                    $obj17->hydrate($row, $startcol17);
                    JenjangPendidikanPeer::addInstanceToPool($obj17, $key17);
                } // if $obj17 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj17 (JenjangPendidikan)
                $obj17->addPesertaDidikRelatedByJenjangPendidikanWali($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of PesertaDidik objects pre-filled with all related objects except JenjangPendidikanRelatedByJenjangPendidikanIbu.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of PesertaDidik objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptJenjangPendidikanRelatedByJenjangPendidikanIbu(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PesertaDidikPeer::DATABASE_NAME);
        }

        PesertaDidikPeer::addSelectColumns($criteria);
        $startcol2 = PesertaDidikPeer::NUM_HYDRATE_COLUMNS;

        KebutuhanKhususPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + KebutuhanKhususPeer::NUM_HYDRATE_COLUMNS;

        KebutuhanKhususPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + KebutuhanKhususPeer::NUM_HYDRATE_COLUMNS;

        NegaraPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + NegaraPeer::NUM_HYDRATE_COLUMNS;

        AlasanLayakPipPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + AlasanLayakPipPeer::NUM_HYDRATE_COLUMNS;

        BankPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + BankPeer::NUM_HYDRATE_COLUMNS;

        MstWilayahPeer::addSelectColumns($criteria);
        $startcol8 = $startcol7 + MstWilayahPeer::NUM_HYDRATE_COLUMNS;

        KebutuhanKhususPeer::addSelectColumns($criteria);
        $startcol9 = $startcol8 + KebutuhanKhususPeer::NUM_HYDRATE_COLUMNS;

        PekerjaanPeer::addSelectColumns($criteria);
        $startcol10 = $startcol9 + PekerjaanPeer::NUM_HYDRATE_COLUMNS;

        AgamaPeer::addSelectColumns($criteria);
        $startcol11 = $startcol10 + AgamaPeer::NUM_HYDRATE_COLUMNS;

        PenghasilanPeer::addSelectColumns($criteria);
        $startcol12 = $startcol11 + PenghasilanPeer::NUM_HYDRATE_COLUMNS;

        JenisTinggalPeer::addSelectColumns($criteria);
        $startcol13 = $startcol12 + JenisTinggalPeer::NUM_HYDRATE_COLUMNS;

        AlatTransportasiPeer::addSelectColumns($criteria);
        $startcol14 = $startcol13 + AlatTransportasiPeer::NUM_HYDRATE_COLUMNS;

        PekerjaanPeer::addSelectColumns($criteria);
        $startcol15 = $startcol14 + PekerjaanPeer::NUM_HYDRATE_COLUMNS;

        PenghasilanPeer::addSelectColumns($criteria);
        $startcol16 = $startcol15 + PenghasilanPeer::NUM_HYDRATE_COLUMNS;

        PekerjaanPeer::addSelectColumns($criteria);
        $startcol17 = $startcol16 + PekerjaanPeer::NUM_HYDRATE_COLUMNS;

        PenghasilanPeer::addSelectColumns($criteria);
        $startcol18 = $startcol17 + PenghasilanPeer::NUM_HYDRATE_COLUMNS;

        PekerjaanPeer::addSelectColumns($criteria);
        $startcol19 = $startcol18 + PekerjaanPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID_AYAH, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID_IBU, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KEWARGANEGARAAN, NegaraPeer::NEGARA_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::ID_LAYAK_PIP, AlasanLayakPipPeer::ID_LAYAK_PIP, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::ID_BANK, BankPeer::ID_BANK, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::AGAMA_ID, AgamaPeer::AGAMA_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PENGHASILAN_ID_AYAH, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENIS_TINGGAL_ID, JenisTinggalPeer::JENIS_TINGGAL_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::ALAT_TRANSPORTASI_ID, AlatTransportasiPeer::ALAT_TRANSPORTASI_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID_AYAH, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PENGHASILAN_ID_WALI, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID_IBU, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PENGHASILAN_ID_IBU, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID_WALI, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PesertaDidikPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PesertaDidikPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = PesertaDidikPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PesertaDidikPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined KebutuhanKhusus rows

                $key2 = KebutuhanKhususPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = KebutuhanKhususPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = KebutuhanKhususPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    KebutuhanKhususPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj2 (KebutuhanKhusus)
                $obj2->addPesertaDidikRelatedByKebutuhanKhususIdAyah($obj1);

            } // if joined row is not null

                // Add objects for joined KebutuhanKhusus rows

                $key3 = KebutuhanKhususPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = KebutuhanKhususPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = KebutuhanKhususPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    KebutuhanKhususPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj3 (KebutuhanKhusus)
                $obj3->addPesertaDidikRelatedByKebutuhanKhususIdIbu($obj1);

            } // if joined row is not null

                // Add objects for joined Negara rows

                $key4 = NegaraPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = NegaraPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = NegaraPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    NegaraPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj4 (Negara)
                $obj4->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined AlasanLayakPip rows

                $key5 = AlasanLayakPipPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = AlasanLayakPipPeer::getInstanceFromPool($key5);
                    if (!$obj5) {
    
                        $cls = AlasanLayakPipPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    AlasanLayakPipPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj5 (AlasanLayakPip)
                $obj5->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined Bank rows

                $key6 = BankPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = BankPeer::getInstanceFromPool($key6);
                    if (!$obj6) {
    
                        $cls = BankPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    BankPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj6 (Bank)
                $obj6->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined MstWilayah rows

                $key7 = MstWilayahPeer::getPrimaryKeyHashFromRow($row, $startcol7);
                if ($key7 !== null) {
                    $obj7 = MstWilayahPeer::getInstanceFromPool($key7);
                    if (!$obj7) {
    
                        $cls = MstWilayahPeer::getOMClass();

                    $obj7 = new $cls();
                    $obj7->hydrate($row, $startcol7);
                    MstWilayahPeer::addInstanceToPool($obj7, $key7);
                } // if $obj7 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj7 (MstWilayah)
                $obj7->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined KebutuhanKhusus rows

                $key8 = KebutuhanKhususPeer::getPrimaryKeyHashFromRow($row, $startcol8);
                if ($key8 !== null) {
                    $obj8 = KebutuhanKhususPeer::getInstanceFromPool($key8);
                    if (!$obj8) {
    
                        $cls = KebutuhanKhususPeer::getOMClass();

                    $obj8 = new $cls();
                    $obj8->hydrate($row, $startcol8);
                    KebutuhanKhususPeer::addInstanceToPool($obj8, $key8);
                } // if $obj8 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj8 (KebutuhanKhusus)
                $obj8->addPesertaDidikRelatedByKebutuhanKhususId($obj1);

            } // if joined row is not null

                // Add objects for joined Pekerjaan rows

                $key9 = PekerjaanPeer::getPrimaryKeyHashFromRow($row, $startcol9);
                if ($key9 !== null) {
                    $obj9 = PekerjaanPeer::getInstanceFromPool($key9);
                    if (!$obj9) {
    
                        $cls = PekerjaanPeer::getOMClass();

                    $obj9 = new $cls();
                    $obj9->hydrate($row, $startcol9);
                    PekerjaanPeer::addInstanceToPool($obj9, $key9);
                } // if $obj9 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj9 (Pekerjaan)
                $obj9->addPesertaDidikRelatedByPekerjaanId($obj1);

            } // if joined row is not null

                // Add objects for joined Agama rows

                $key10 = AgamaPeer::getPrimaryKeyHashFromRow($row, $startcol10);
                if ($key10 !== null) {
                    $obj10 = AgamaPeer::getInstanceFromPool($key10);
                    if (!$obj10) {
    
                        $cls = AgamaPeer::getOMClass();

                    $obj10 = new $cls();
                    $obj10->hydrate($row, $startcol10);
                    AgamaPeer::addInstanceToPool($obj10, $key10);
                } // if $obj10 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj10 (Agama)
                $obj10->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined Penghasilan rows

                $key11 = PenghasilanPeer::getPrimaryKeyHashFromRow($row, $startcol11);
                if ($key11 !== null) {
                    $obj11 = PenghasilanPeer::getInstanceFromPool($key11);
                    if (!$obj11) {
    
                        $cls = PenghasilanPeer::getOMClass();

                    $obj11 = new $cls();
                    $obj11->hydrate($row, $startcol11);
                    PenghasilanPeer::addInstanceToPool($obj11, $key11);
                } // if $obj11 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj11 (Penghasilan)
                $obj11->addPesertaDidikRelatedByPenghasilanIdAyah($obj1);

            } // if joined row is not null

                // Add objects for joined JenisTinggal rows

                $key12 = JenisTinggalPeer::getPrimaryKeyHashFromRow($row, $startcol12);
                if ($key12 !== null) {
                    $obj12 = JenisTinggalPeer::getInstanceFromPool($key12);
                    if (!$obj12) {
    
                        $cls = JenisTinggalPeer::getOMClass();

                    $obj12 = new $cls();
                    $obj12->hydrate($row, $startcol12);
                    JenisTinggalPeer::addInstanceToPool($obj12, $key12);
                } // if $obj12 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj12 (JenisTinggal)
                $obj12->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined AlatTransportasi rows

                $key13 = AlatTransportasiPeer::getPrimaryKeyHashFromRow($row, $startcol13);
                if ($key13 !== null) {
                    $obj13 = AlatTransportasiPeer::getInstanceFromPool($key13);
                    if (!$obj13) {
    
                        $cls = AlatTransportasiPeer::getOMClass();

                    $obj13 = new $cls();
                    $obj13->hydrate($row, $startcol13);
                    AlatTransportasiPeer::addInstanceToPool($obj13, $key13);
                } // if $obj13 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj13 (AlatTransportasi)
                $obj13->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined Pekerjaan rows

                $key14 = PekerjaanPeer::getPrimaryKeyHashFromRow($row, $startcol14);
                if ($key14 !== null) {
                    $obj14 = PekerjaanPeer::getInstanceFromPool($key14);
                    if (!$obj14) {
    
                        $cls = PekerjaanPeer::getOMClass();

                    $obj14 = new $cls();
                    $obj14->hydrate($row, $startcol14);
                    PekerjaanPeer::addInstanceToPool($obj14, $key14);
                } // if $obj14 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj14 (Pekerjaan)
                $obj14->addPesertaDidikRelatedByPekerjaanIdAyah($obj1);

            } // if joined row is not null

                // Add objects for joined Penghasilan rows

                $key15 = PenghasilanPeer::getPrimaryKeyHashFromRow($row, $startcol15);
                if ($key15 !== null) {
                    $obj15 = PenghasilanPeer::getInstanceFromPool($key15);
                    if (!$obj15) {
    
                        $cls = PenghasilanPeer::getOMClass();

                    $obj15 = new $cls();
                    $obj15->hydrate($row, $startcol15);
                    PenghasilanPeer::addInstanceToPool($obj15, $key15);
                } // if $obj15 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj15 (Penghasilan)
                $obj15->addPesertaDidikRelatedByPenghasilanIdWali($obj1);

            } // if joined row is not null

                // Add objects for joined Pekerjaan rows

                $key16 = PekerjaanPeer::getPrimaryKeyHashFromRow($row, $startcol16);
                if ($key16 !== null) {
                    $obj16 = PekerjaanPeer::getInstanceFromPool($key16);
                    if (!$obj16) {
    
                        $cls = PekerjaanPeer::getOMClass();

                    $obj16 = new $cls();
                    $obj16->hydrate($row, $startcol16);
                    PekerjaanPeer::addInstanceToPool($obj16, $key16);
                } // if $obj16 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj16 (Pekerjaan)
                $obj16->addPesertaDidikRelatedByPekerjaanIdIbu($obj1);

            } // if joined row is not null

                // Add objects for joined Penghasilan rows

                $key17 = PenghasilanPeer::getPrimaryKeyHashFromRow($row, $startcol17);
                if ($key17 !== null) {
                    $obj17 = PenghasilanPeer::getInstanceFromPool($key17);
                    if (!$obj17) {
    
                        $cls = PenghasilanPeer::getOMClass();

                    $obj17 = new $cls();
                    $obj17->hydrate($row, $startcol17);
                    PenghasilanPeer::addInstanceToPool($obj17, $key17);
                } // if $obj17 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj17 (Penghasilan)
                $obj17->addPesertaDidikRelatedByPenghasilanIdIbu($obj1);

            } // if joined row is not null

                // Add objects for joined Pekerjaan rows

                $key18 = PekerjaanPeer::getPrimaryKeyHashFromRow($row, $startcol18);
                if ($key18 !== null) {
                    $obj18 = PekerjaanPeer::getInstanceFromPool($key18);
                    if (!$obj18) {
    
                        $cls = PekerjaanPeer::getOMClass();

                    $obj18 = new $cls();
                    $obj18->hydrate($row, $startcol18);
                    PekerjaanPeer::addInstanceToPool($obj18, $key18);
                } // if $obj18 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj18 (Pekerjaan)
                $obj18->addPesertaDidikRelatedByPekerjaanIdWali($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of PesertaDidik objects pre-filled with all related objects except PenghasilanRelatedByPenghasilanIdWali.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of PesertaDidik objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptPenghasilanRelatedByPenghasilanIdWali(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PesertaDidikPeer::DATABASE_NAME);
        }

        PesertaDidikPeer::addSelectColumns($criteria);
        $startcol2 = PesertaDidikPeer::NUM_HYDRATE_COLUMNS;

        KebutuhanKhususPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + KebutuhanKhususPeer::NUM_HYDRATE_COLUMNS;

        KebutuhanKhususPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + KebutuhanKhususPeer::NUM_HYDRATE_COLUMNS;

        NegaraPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + NegaraPeer::NUM_HYDRATE_COLUMNS;

        AlasanLayakPipPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + AlasanLayakPipPeer::NUM_HYDRATE_COLUMNS;

        BankPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + BankPeer::NUM_HYDRATE_COLUMNS;

        MstWilayahPeer::addSelectColumns($criteria);
        $startcol8 = $startcol7 + MstWilayahPeer::NUM_HYDRATE_COLUMNS;

        KebutuhanKhususPeer::addSelectColumns($criteria);
        $startcol9 = $startcol8 + KebutuhanKhususPeer::NUM_HYDRATE_COLUMNS;

        PekerjaanPeer::addSelectColumns($criteria);
        $startcol10 = $startcol9 + PekerjaanPeer::NUM_HYDRATE_COLUMNS;

        AgamaPeer::addSelectColumns($criteria);
        $startcol11 = $startcol10 + AgamaPeer::NUM_HYDRATE_COLUMNS;

        JenisTinggalPeer::addSelectColumns($criteria);
        $startcol12 = $startcol11 + JenisTinggalPeer::NUM_HYDRATE_COLUMNS;

        AlatTransportasiPeer::addSelectColumns($criteria);
        $startcol13 = $startcol12 + AlatTransportasiPeer::NUM_HYDRATE_COLUMNS;

        PekerjaanPeer::addSelectColumns($criteria);
        $startcol14 = $startcol13 + PekerjaanPeer::NUM_HYDRATE_COLUMNS;

        JenjangPendidikanPeer::addSelectColumns($criteria);
        $startcol15 = $startcol14 + JenjangPendidikanPeer::NUM_HYDRATE_COLUMNS;

        PekerjaanPeer::addSelectColumns($criteria);
        $startcol16 = $startcol15 + PekerjaanPeer::NUM_HYDRATE_COLUMNS;

        JenjangPendidikanPeer::addSelectColumns($criteria);
        $startcol17 = $startcol16 + JenjangPendidikanPeer::NUM_HYDRATE_COLUMNS;

        PekerjaanPeer::addSelectColumns($criteria);
        $startcol18 = $startcol17 + PekerjaanPeer::NUM_HYDRATE_COLUMNS;

        JenjangPendidikanPeer::addSelectColumns($criteria);
        $startcol19 = $startcol18 + JenjangPendidikanPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID_AYAH, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID_IBU, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KEWARGANEGARAAN, NegaraPeer::NEGARA_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::ID_LAYAK_PIP, AlasanLayakPipPeer::ID_LAYAK_PIP, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::ID_BANK, BankPeer::ID_BANK, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::AGAMA_ID, AgamaPeer::AGAMA_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENIS_TINGGAL_ID, JenisTinggalPeer::JENIS_TINGGAL_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::ALAT_TRANSPORTASI_ID, AlatTransportasiPeer::ALAT_TRANSPORTASI_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID_AYAH, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENJANG_PENDIDIKAN_IBU, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID_IBU, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENJANG_PENDIDIKAN_AYAH, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID_WALI, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENJANG_PENDIDIKAN_WALI, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PesertaDidikPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PesertaDidikPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = PesertaDidikPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PesertaDidikPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined KebutuhanKhusus rows

                $key2 = KebutuhanKhususPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = KebutuhanKhususPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = KebutuhanKhususPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    KebutuhanKhususPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj2 (KebutuhanKhusus)
                $obj2->addPesertaDidikRelatedByKebutuhanKhususIdAyah($obj1);

            } // if joined row is not null

                // Add objects for joined KebutuhanKhusus rows

                $key3 = KebutuhanKhususPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = KebutuhanKhususPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = KebutuhanKhususPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    KebutuhanKhususPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj3 (KebutuhanKhusus)
                $obj3->addPesertaDidikRelatedByKebutuhanKhususIdIbu($obj1);

            } // if joined row is not null

                // Add objects for joined Negara rows

                $key4 = NegaraPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = NegaraPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = NegaraPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    NegaraPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj4 (Negara)
                $obj4->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined AlasanLayakPip rows

                $key5 = AlasanLayakPipPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = AlasanLayakPipPeer::getInstanceFromPool($key5);
                    if (!$obj5) {
    
                        $cls = AlasanLayakPipPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    AlasanLayakPipPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj5 (AlasanLayakPip)
                $obj5->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined Bank rows

                $key6 = BankPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = BankPeer::getInstanceFromPool($key6);
                    if (!$obj6) {
    
                        $cls = BankPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    BankPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj6 (Bank)
                $obj6->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined MstWilayah rows

                $key7 = MstWilayahPeer::getPrimaryKeyHashFromRow($row, $startcol7);
                if ($key7 !== null) {
                    $obj7 = MstWilayahPeer::getInstanceFromPool($key7);
                    if (!$obj7) {
    
                        $cls = MstWilayahPeer::getOMClass();

                    $obj7 = new $cls();
                    $obj7->hydrate($row, $startcol7);
                    MstWilayahPeer::addInstanceToPool($obj7, $key7);
                } // if $obj7 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj7 (MstWilayah)
                $obj7->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined KebutuhanKhusus rows

                $key8 = KebutuhanKhususPeer::getPrimaryKeyHashFromRow($row, $startcol8);
                if ($key8 !== null) {
                    $obj8 = KebutuhanKhususPeer::getInstanceFromPool($key8);
                    if (!$obj8) {
    
                        $cls = KebutuhanKhususPeer::getOMClass();

                    $obj8 = new $cls();
                    $obj8->hydrate($row, $startcol8);
                    KebutuhanKhususPeer::addInstanceToPool($obj8, $key8);
                } // if $obj8 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj8 (KebutuhanKhusus)
                $obj8->addPesertaDidikRelatedByKebutuhanKhususId($obj1);

            } // if joined row is not null

                // Add objects for joined Pekerjaan rows

                $key9 = PekerjaanPeer::getPrimaryKeyHashFromRow($row, $startcol9);
                if ($key9 !== null) {
                    $obj9 = PekerjaanPeer::getInstanceFromPool($key9);
                    if (!$obj9) {
    
                        $cls = PekerjaanPeer::getOMClass();

                    $obj9 = new $cls();
                    $obj9->hydrate($row, $startcol9);
                    PekerjaanPeer::addInstanceToPool($obj9, $key9);
                } // if $obj9 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj9 (Pekerjaan)
                $obj9->addPesertaDidikRelatedByPekerjaanId($obj1);

            } // if joined row is not null

                // Add objects for joined Agama rows

                $key10 = AgamaPeer::getPrimaryKeyHashFromRow($row, $startcol10);
                if ($key10 !== null) {
                    $obj10 = AgamaPeer::getInstanceFromPool($key10);
                    if (!$obj10) {
    
                        $cls = AgamaPeer::getOMClass();

                    $obj10 = new $cls();
                    $obj10->hydrate($row, $startcol10);
                    AgamaPeer::addInstanceToPool($obj10, $key10);
                } // if $obj10 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj10 (Agama)
                $obj10->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined JenisTinggal rows

                $key11 = JenisTinggalPeer::getPrimaryKeyHashFromRow($row, $startcol11);
                if ($key11 !== null) {
                    $obj11 = JenisTinggalPeer::getInstanceFromPool($key11);
                    if (!$obj11) {
    
                        $cls = JenisTinggalPeer::getOMClass();

                    $obj11 = new $cls();
                    $obj11->hydrate($row, $startcol11);
                    JenisTinggalPeer::addInstanceToPool($obj11, $key11);
                } // if $obj11 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj11 (JenisTinggal)
                $obj11->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined AlatTransportasi rows

                $key12 = AlatTransportasiPeer::getPrimaryKeyHashFromRow($row, $startcol12);
                if ($key12 !== null) {
                    $obj12 = AlatTransportasiPeer::getInstanceFromPool($key12);
                    if (!$obj12) {
    
                        $cls = AlatTransportasiPeer::getOMClass();

                    $obj12 = new $cls();
                    $obj12->hydrate($row, $startcol12);
                    AlatTransportasiPeer::addInstanceToPool($obj12, $key12);
                } // if $obj12 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj12 (AlatTransportasi)
                $obj12->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined Pekerjaan rows

                $key13 = PekerjaanPeer::getPrimaryKeyHashFromRow($row, $startcol13);
                if ($key13 !== null) {
                    $obj13 = PekerjaanPeer::getInstanceFromPool($key13);
                    if (!$obj13) {
    
                        $cls = PekerjaanPeer::getOMClass();

                    $obj13 = new $cls();
                    $obj13->hydrate($row, $startcol13);
                    PekerjaanPeer::addInstanceToPool($obj13, $key13);
                } // if $obj13 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj13 (Pekerjaan)
                $obj13->addPesertaDidikRelatedByPekerjaanIdAyah($obj1);

            } // if joined row is not null

                // Add objects for joined JenjangPendidikan rows

                $key14 = JenjangPendidikanPeer::getPrimaryKeyHashFromRow($row, $startcol14);
                if ($key14 !== null) {
                    $obj14 = JenjangPendidikanPeer::getInstanceFromPool($key14);
                    if (!$obj14) {
    
                        $cls = JenjangPendidikanPeer::getOMClass();

                    $obj14 = new $cls();
                    $obj14->hydrate($row, $startcol14);
                    JenjangPendidikanPeer::addInstanceToPool($obj14, $key14);
                } // if $obj14 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj14 (JenjangPendidikan)
                $obj14->addPesertaDidikRelatedByJenjangPendidikanIbu($obj1);

            } // if joined row is not null

                // Add objects for joined Pekerjaan rows

                $key15 = PekerjaanPeer::getPrimaryKeyHashFromRow($row, $startcol15);
                if ($key15 !== null) {
                    $obj15 = PekerjaanPeer::getInstanceFromPool($key15);
                    if (!$obj15) {
    
                        $cls = PekerjaanPeer::getOMClass();

                    $obj15 = new $cls();
                    $obj15->hydrate($row, $startcol15);
                    PekerjaanPeer::addInstanceToPool($obj15, $key15);
                } // if $obj15 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj15 (Pekerjaan)
                $obj15->addPesertaDidikRelatedByPekerjaanIdIbu($obj1);

            } // if joined row is not null

                // Add objects for joined JenjangPendidikan rows

                $key16 = JenjangPendidikanPeer::getPrimaryKeyHashFromRow($row, $startcol16);
                if ($key16 !== null) {
                    $obj16 = JenjangPendidikanPeer::getInstanceFromPool($key16);
                    if (!$obj16) {
    
                        $cls = JenjangPendidikanPeer::getOMClass();

                    $obj16 = new $cls();
                    $obj16->hydrate($row, $startcol16);
                    JenjangPendidikanPeer::addInstanceToPool($obj16, $key16);
                } // if $obj16 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj16 (JenjangPendidikan)
                $obj16->addPesertaDidikRelatedByJenjangPendidikanAyah($obj1);

            } // if joined row is not null

                // Add objects for joined Pekerjaan rows

                $key17 = PekerjaanPeer::getPrimaryKeyHashFromRow($row, $startcol17);
                if ($key17 !== null) {
                    $obj17 = PekerjaanPeer::getInstanceFromPool($key17);
                    if (!$obj17) {
    
                        $cls = PekerjaanPeer::getOMClass();

                    $obj17 = new $cls();
                    $obj17->hydrate($row, $startcol17);
                    PekerjaanPeer::addInstanceToPool($obj17, $key17);
                } // if $obj17 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj17 (Pekerjaan)
                $obj17->addPesertaDidikRelatedByPekerjaanIdWali($obj1);

            } // if joined row is not null

                // Add objects for joined JenjangPendidikan rows

                $key18 = JenjangPendidikanPeer::getPrimaryKeyHashFromRow($row, $startcol18);
                if ($key18 !== null) {
                    $obj18 = JenjangPendidikanPeer::getInstanceFromPool($key18);
                    if (!$obj18) {
    
                        $cls = JenjangPendidikanPeer::getOMClass();

                    $obj18 = new $cls();
                    $obj18->hydrate($row, $startcol18);
                    JenjangPendidikanPeer::addInstanceToPool($obj18, $key18);
                } // if $obj18 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj18 (JenjangPendidikan)
                $obj18->addPesertaDidikRelatedByJenjangPendidikanWali($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of PesertaDidik objects pre-filled with all related objects except PekerjaanRelatedByPekerjaanIdIbu.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of PesertaDidik objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptPekerjaanRelatedByPekerjaanIdIbu(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PesertaDidikPeer::DATABASE_NAME);
        }

        PesertaDidikPeer::addSelectColumns($criteria);
        $startcol2 = PesertaDidikPeer::NUM_HYDRATE_COLUMNS;

        KebutuhanKhususPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + KebutuhanKhususPeer::NUM_HYDRATE_COLUMNS;

        KebutuhanKhususPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + KebutuhanKhususPeer::NUM_HYDRATE_COLUMNS;

        NegaraPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + NegaraPeer::NUM_HYDRATE_COLUMNS;

        AlasanLayakPipPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + AlasanLayakPipPeer::NUM_HYDRATE_COLUMNS;

        BankPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + BankPeer::NUM_HYDRATE_COLUMNS;

        MstWilayahPeer::addSelectColumns($criteria);
        $startcol8 = $startcol7 + MstWilayahPeer::NUM_HYDRATE_COLUMNS;

        KebutuhanKhususPeer::addSelectColumns($criteria);
        $startcol9 = $startcol8 + KebutuhanKhususPeer::NUM_HYDRATE_COLUMNS;

        AgamaPeer::addSelectColumns($criteria);
        $startcol10 = $startcol9 + AgamaPeer::NUM_HYDRATE_COLUMNS;

        PenghasilanPeer::addSelectColumns($criteria);
        $startcol11 = $startcol10 + PenghasilanPeer::NUM_HYDRATE_COLUMNS;

        JenisTinggalPeer::addSelectColumns($criteria);
        $startcol12 = $startcol11 + JenisTinggalPeer::NUM_HYDRATE_COLUMNS;

        AlatTransportasiPeer::addSelectColumns($criteria);
        $startcol13 = $startcol12 + AlatTransportasiPeer::NUM_HYDRATE_COLUMNS;

        JenjangPendidikanPeer::addSelectColumns($criteria);
        $startcol14 = $startcol13 + JenjangPendidikanPeer::NUM_HYDRATE_COLUMNS;

        PenghasilanPeer::addSelectColumns($criteria);
        $startcol15 = $startcol14 + PenghasilanPeer::NUM_HYDRATE_COLUMNS;

        JenjangPendidikanPeer::addSelectColumns($criteria);
        $startcol16 = $startcol15 + JenjangPendidikanPeer::NUM_HYDRATE_COLUMNS;

        PenghasilanPeer::addSelectColumns($criteria);
        $startcol17 = $startcol16 + PenghasilanPeer::NUM_HYDRATE_COLUMNS;

        JenjangPendidikanPeer::addSelectColumns($criteria);
        $startcol18 = $startcol17 + JenjangPendidikanPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID_AYAH, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID_IBU, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KEWARGANEGARAAN, NegaraPeer::NEGARA_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::ID_LAYAK_PIP, AlasanLayakPipPeer::ID_LAYAK_PIP, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::ID_BANK, BankPeer::ID_BANK, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::AGAMA_ID, AgamaPeer::AGAMA_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PENGHASILAN_ID_AYAH, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENIS_TINGGAL_ID, JenisTinggalPeer::JENIS_TINGGAL_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::ALAT_TRANSPORTASI_ID, AlatTransportasiPeer::ALAT_TRANSPORTASI_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENJANG_PENDIDIKAN_IBU, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PENGHASILAN_ID_WALI, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENJANG_PENDIDIKAN_AYAH, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PENGHASILAN_ID_IBU, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENJANG_PENDIDIKAN_WALI, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PesertaDidikPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PesertaDidikPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = PesertaDidikPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PesertaDidikPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined KebutuhanKhusus rows

                $key2 = KebutuhanKhususPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = KebutuhanKhususPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = KebutuhanKhususPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    KebutuhanKhususPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj2 (KebutuhanKhusus)
                $obj2->addPesertaDidikRelatedByKebutuhanKhususIdAyah($obj1);

            } // if joined row is not null

                // Add objects for joined KebutuhanKhusus rows

                $key3 = KebutuhanKhususPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = KebutuhanKhususPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = KebutuhanKhususPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    KebutuhanKhususPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj3 (KebutuhanKhusus)
                $obj3->addPesertaDidikRelatedByKebutuhanKhususIdIbu($obj1);

            } // if joined row is not null

                // Add objects for joined Negara rows

                $key4 = NegaraPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = NegaraPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = NegaraPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    NegaraPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj4 (Negara)
                $obj4->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined AlasanLayakPip rows

                $key5 = AlasanLayakPipPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = AlasanLayakPipPeer::getInstanceFromPool($key5);
                    if (!$obj5) {
    
                        $cls = AlasanLayakPipPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    AlasanLayakPipPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj5 (AlasanLayakPip)
                $obj5->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined Bank rows

                $key6 = BankPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = BankPeer::getInstanceFromPool($key6);
                    if (!$obj6) {
    
                        $cls = BankPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    BankPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj6 (Bank)
                $obj6->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined MstWilayah rows

                $key7 = MstWilayahPeer::getPrimaryKeyHashFromRow($row, $startcol7);
                if ($key7 !== null) {
                    $obj7 = MstWilayahPeer::getInstanceFromPool($key7);
                    if (!$obj7) {
    
                        $cls = MstWilayahPeer::getOMClass();

                    $obj7 = new $cls();
                    $obj7->hydrate($row, $startcol7);
                    MstWilayahPeer::addInstanceToPool($obj7, $key7);
                } // if $obj7 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj7 (MstWilayah)
                $obj7->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined KebutuhanKhusus rows

                $key8 = KebutuhanKhususPeer::getPrimaryKeyHashFromRow($row, $startcol8);
                if ($key8 !== null) {
                    $obj8 = KebutuhanKhususPeer::getInstanceFromPool($key8);
                    if (!$obj8) {
    
                        $cls = KebutuhanKhususPeer::getOMClass();

                    $obj8 = new $cls();
                    $obj8->hydrate($row, $startcol8);
                    KebutuhanKhususPeer::addInstanceToPool($obj8, $key8);
                } // if $obj8 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj8 (KebutuhanKhusus)
                $obj8->addPesertaDidikRelatedByKebutuhanKhususId($obj1);

            } // if joined row is not null

                // Add objects for joined Agama rows

                $key9 = AgamaPeer::getPrimaryKeyHashFromRow($row, $startcol9);
                if ($key9 !== null) {
                    $obj9 = AgamaPeer::getInstanceFromPool($key9);
                    if (!$obj9) {
    
                        $cls = AgamaPeer::getOMClass();

                    $obj9 = new $cls();
                    $obj9->hydrate($row, $startcol9);
                    AgamaPeer::addInstanceToPool($obj9, $key9);
                } // if $obj9 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj9 (Agama)
                $obj9->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined Penghasilan rows

                $key10 = PenghasilanPeer::getPrimaryKeyHashFromRow($row, $startcol10);
                if ($key10 !== null) {
                    $obj10 = PenghasilanPeer::getInstanceFromPool($key10);
                    if (!$obj10) {
    
                        $cls = PenghasilanPeer::getOMClass();

                    $obj10 = new $cls();
                    $obj10->hydrate($row, $startcol10);
                    PenghasilanPeer::addInstanceToPool($obj10, $key10);
                } // if $obj10 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj10 (Penghasilan)
                $obj10->addPesertaDidikRelatedByPenghasilanIdAyah($obj1);

            } // if joined row is not null

                // Add objects for joined JenisTinggal rows

                $key11 = JenisTinggalPeer::getPrimaryKeyHashFromRow($row, $startcol11);
                if ($key11 !== null) {
                    $obj11 = JenisTinggalPeer::getInstanceFromPool($key11);
                    if (!$obj11) {
    
                        $cls = JenisTinggalPeer::getOMClass();

                    $obj11 = new $cls();
                    $obj11->hydrate($row, $startcol11);
                    JenisTinggalPeer::addInstanceToPool($obj11, $key11);
                } // if $obj11 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj11 (JenisTinggal)
                $obj11->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined AlatTransportasi rows

                $key12 = AlatTransportasiPeer::getPrimaryKeyHashFromRow($row, $startcol12);
                if ($key12 !== null) {
                    $obj12 = AlatTransportasiPeer::getInstanceFromPool($key12);
                    if (!$obj12) {
    
                        $cls = AlatTransportasiPeer::getOMClass();

                    $obj12 = new $cls();
                    $obj12->hydrate($row, $startcol12);
                    AlatTransportasiPeer::addInstanceToPool($obj12, $key12);
                } // if $obj12 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj12 (AlatTransportasi)
                $obj12->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined JenjangPendidikan rows

                $key13 = JenjangPendidikanPeer::getPrimaryKeyHashFromRow($row, $startcol13);
                if ($key13 !== null) {
                    $obj13 = JenjangPendidikanPeer::getInstanceFromPool($key13);
                    if (!$obj13) {
    
                        $cls = JenjangPendidikanPeer::getOMClass();

                    $obj13 = new $cls();
                    $obj13->hydrate($row, $startcol13);
                    JenjangPendidikanPeer::addInstanceToPool($obj13, $key13);
                } // if $obj13 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj13 (JenjangPendidikan)
                $obj13->addPesertaDidikRelatedByJenjangPendidikanIbu($obj1);

            } // if joined row is not null

                // Add objects for joined Penghasilan rows

                $key14 = PenghasilanPeer::getPrimaryKeyHashFromRow($row, $startcol14);
                if ($key14 !== null) {
                    $obj14 = PenghasilanPeer::getInstanceFromPool($key14);
                    if (!$obj14) {
    
                        $cls = PenghasilanPeer::getOMClass();

                    $obj14 = new $cls();
                    $obj14->hydrate($row, $startcol14);
                    PenghasilanPeer::addInstanceToPool($obj14, $key14);
                } // if $obj14 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj14 (Penghasilan)
                $obj14->addPesertaDidikRelatedByPenghasilanIdWali($obj1);

            } // if joined row is not null

                // Add objects for joined JenjangPendidikan rows

                $key15 = JenjangPendidikanPeer::getPrimaryKeyHashFromRow($row, $startcol15);
                if ($key15 !== null) {
                    $obj15 = JenjangPendidikanPeer::getInstanceFromPool($key15);
                    if (!$obj15) {
    
                        $cls = JenjangPendidikanPeer::getOMClass();

                    $obj15 = new $cls();
                    $obj15->hydrate($row, $startcol15);
                    JenjangPendidikanPeer::addInstanceToPool($obj15, $key15);
                } // if $obj15 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj15 (JenjangPendidikan)
                $obj15->addPesertaDidikRelatedByJenjangPendidikanAyah($obj1);

            } // if joined row is not null

                // Add objects for joined Penghasilan rows

                $key16 = PenghasilanPeer::getPrimaryKeyHashFromRow($row, $startcol16);
                if ($key16 !== null) {
                    $obj16 = PenghasilanPeer::getInstanceFromPool($key16);
                    if (!$obj16) {
    
                        $cls = PenghasilanPeer::getOMClass();

                    $obj16 = new $cls();
                    $obj16->hydrate($row, $startcol16);
                    PenghasilanPeer::addInstanceToPool($obj16, $key16);
                } // if $obj16 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj16 (Penghasilan)
                $obj16->addPesertaDidikRelatedByPenghasilanIdIbu($obj1);

            } // if joined row is not null

                // Add objects for joined JenjangPendidikan rows

                $key17 = JenjangPendidikanPeer::getPrimaryKeyHashFromRow($row, $startcol17);
                if ($key17 !== null) {
                    $obj17 = JenjangPendidikanPeer::getInstanceFromPool($key17);
                    if (!$obj17) {
    
                        $cls = JenjangPendidikanPeer::getOMClass();

                    $obj17 = new $cls();
                    $obj17->hydrate($row, $startcol17);
                    JenjangPendidikanPeer::addInstanceToPool($obj17, $key17);
                } // if $obj17 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj17 (JenjangPendidikan)
                $obj17->addPesertaDidikRelatedByJenjangPendidikanWali($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of PesertaDidik objects pre-filled with all related objects except JenjangPendidikanRelatedByJenjangPendidikanAyah.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of PesertaDidik objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptJenjangPendidikanRelatedByJenjangPendidikanAyah(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PesertaDidikPeer::DATABASE_NAME);
        }

        PesertaDidikPeer::addSelectColumns($criteria);
        $startcol2 = PesertaDidikPeer::NUM_HYDRATE_COLUMNS;

        KebutuhanKhususPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + KebutuhanKhususPeer::NUM_HYDRATE_COLUMNS;

        KebutuhanKhususPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + KebutuhanKhususPeer::NUM_HYDRATE_COLUMNS;

        NegaraPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + NegaraPeer::NUM_HYDRATE_COLUMNS;

        AlasanLayakPipPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + AlasanLayakPipPeer::NUM_HYDRATE_COLUMNS;

        BankPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + BankPeer::NUM_HYDRATE_COLUMNS;

        MstWilayahPeer::addSelectColumns($criteria);
        $startcol8 = $startcol7 + MstWilayahPeer::NUM_HYDRATE_COLUMNS;

        KebutuhanKhususPeer::addSelectColumns($criteria);
        $startcol9 = $startcol8 + KebutuhanKhususPeer::NUM_HYDRATE_COLUMNS;

        PekerjaanPeer::addSelectColumns($criteria);
        $startcol10 = $startcol9 + PekerjaanPeer::NUM_HYDRATE_COLUMNS;

        AgamaPeer::addSelectColumns($criteria);
        $startcol11 = $startcol10 + AgamaPeer::NUM_HYDRATE_COLUMNS;

        PenghasilanPeer::addSelectColumns($criteria);
        $startcol12 = $startcol11 + PenghasilanPeer::NUM_HYDRATE_COLUMNS;

        JenisTinggalPeer::addSelectColumns($criteria);
        $startcol13 = $startcol12 + JenisTinggalPeer::NUM_HYDRATE_COLUMNS;

        AlatTransportasiPeer::addSelectColumns($criteria);
        $startcol14 = $startcol13 + AlatTransportasiPeer::NUM_HYDRATE_COLUMNS;

        PekerjaanPeer::addSelectColumns($criteria);
        $startcol15 = $startcol14 + PekerjaanPeer::NUM_HYDRATE_COLUMNS;

        PenghasilanPeer::addSelectColumns($criteria);
        $startcol16 = $startcol15 + PenghasilanPeer::NUM_HYDRATE_COLUMNS;

        PekerjaanPeer::addSelectColumns($criteria);
        $startcol17 = $startcol16 + PekerjaanPeer::NUM_HYDRATE_COLUMNS;

        PenghasilanPeer::addSelectColumns($criteria);
        $startcol18 = $startcol17 + PenghasilanPeer::NUM_HYDRATE_COLUMNS;

        PekerjaanPeer::addSelectColumns($criteria);
        $startcol19 = $startcol18 + PekerjaanPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID_AYAH, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID_IBU, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KEWARGANEGARAAN, NegaraPeer::NEGARA_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::ID_LAYAK_PIP, AlasanLayakPipPeer::ID_LAYAK_PIP, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::ID_BANK, BankPeer::ID_BANK, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::AGAMA_ID, AgamaPeer::AGAMA_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PENGHASILAN_ID_AYAH, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENIS_TINGGAL_ID, JenisTinggalPeer::JENIS_TINGGAL_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::ALAT_TRANSPORTASI_ID, AlatTransportasiPeer::ALAT_TRANSPORTASI_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID_AYAH, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PENGHASILAN_ID_WALI, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID_IBU, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PENGHASILAN_ID_IBU, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID_WALI, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PesertaDidikPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PesertaDidikPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = PesertaDidikPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PesertaDidikPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined KebutuhanKhusus rows

                $key2 = KebutuhanKhususPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = KebutuhanKhususPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = KebutuhanKhususPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    KebutuhanKhususPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj2 (KebutuhanKhusus)
                $obj2->addPesertaDidikRelatedByKebutuhanKhususIdAyah($obj1);

            } // if joined row is not null

                // Add objects for joined KebutuhanKhusus rows

                $key3 = KebutuhanKhususPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = KebutuhanKhususPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = KebutuhanKhususPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    KebutuhanKhususPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj3 (KebutuhanKhusus)
                $obj3->addPesertaDidikRelatedByKebutuhanKhususIdIbu($obj1);

            } // if joined row is not null

                // Add objects for joined Negara rows

                $key4 = NegaraPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = NegaraPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = NegaraPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    NegaraPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj4 (Negara)
                $obj4->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined AlasanLayakPip rows

                $key5 = AlasanLayakPipPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = AlasanLayakPipPeer::getInstanceFromPool($key5);
                    if (!$obj5) {
    
                        $cls = AlasanLayakPipPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    AlasanLayakPipPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj5 (AlasanLayakPip)
                $obj5->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined Bank rows

                $key6 = BankPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = BankPeer::getInstanceFromPool($key6);
                    if (!$obj6) {
    
                        $cls = BankPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    BankPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj6 (Bank)
                $obj6->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined MstWilayah rows

                $key7 = MstWilayahPeer::getPrimaryKeyHashFromRow($row, $startcol7);
                if ($key7 !== null) {
                    $obj7 = MstWilayahPeer::getInstanceFromPool($key7);
                    if (!$obj7) {
    
                        $cls = MstWilayahPeer::getOMClass();

                    $obj7 = new $cls();
                    $obj7->hydrate($row, $startcol7);
                    MstWilayahPeer::addInstanceToPool($obj7, $key7);
                } // if $obj7 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj7 (MstWilayah)
                $obj7->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined KebutuhanKhusus rows

                $key8 = KebutuhanKhususPeer::getPrimaryKeyHashFromRow($row, $startcol8);
                if ($key8 !== null) {
                    $obj8 = KebutuhanKhususPeer::getInstanceFromPool($key8);
                    if (!$obj8) {
    
                        $cls = KebutuhanKhususPeer::getOMClass();

                    $obj8 = new $cls();
                    $obj8->hydrate($row, $startcol8);
                    KebutuhanKhususPeer::addInstanceToPool($obj8, $key8);
                } // if $obj8 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj8 (KebutuhanKhusus)
                $obj8->addPesertaDidikRelatedByKebutuhanKhususId($obj1);

            } // if joined row is not null

                // Add objects for joined Pekerjaan rows

                $key9 = PekerjaanPeer::getPrimaryKeyHashFromRow($row, $startcol9);
                if ($key9 !== null) {
                    $obj9 = PekerjaanPeer::getInstanceFromPool($key9);
                    if (!$obj9) {
    
                        $cls = PekerjaanPeer::getOMClass();

                    $obj9 = new $cls();
                    $obj9->hydrate($row, $startcol9);
                    PekerjaanPeer::addInstanceToPool($obj9, $key9);
                } // if $obj9 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj9 (Pekerjaan)
                $obj9->addPesertaDidikRelatedByPekerjaanId($obj1);

            } // if joined row is not null

                // Add objects for joined Agama rows

                $key10 = AgamaPeer::getPrimaryKeyHashFromRow($row, $startcol10);
                if ($key10 !== null) {
                    $obj10 = AgamaPeer::getInstanceFromPool($key10);
                    if (!$obj10) {
    
                        $cls = AgamaPeer::getOMClass();

                    $obj10 = new $cls();
                    $obj10->hydrate($row, $startcol10);
                    AgamaPeer::addInstanceToPool($obj10, $key10);
                } // if $obj10 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj10 (Agama)
                $obj10->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined Penghasilan rows

                $key11 = PenghasilanPeer::getPrimaryKeyHashFromRow($row, $startcol11);
                if ($key11 !== null) {
                    $obj11 = PenghasilanPeer::getInstanceFromPool($key11);
                    if (!$obj11) {
    
                        $cls = PenghasilanPeer::getOMClass();

                    $obj11 = new $cls();
                    $obj11->hydrate($row, $startcol11);
                    PenghasilanPeer::addInstanceToPool($obj11, $key11);
                } // if $obj11 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj11 (Penghasilan)
                $obj11->addPesertaDidikRelatedByPenghasilanIdAyah($obj1);

            } // if joined row is not null

                // Add objects for joined JenisTinggal rows

                $key12 = JenisTinggalPeer::getPrimaryKeyHashFromRow($row, $startcol12);
                if ($key12 !== null) {
                    $obj12 = JenisTinggalPeer::getInstanceFromPool($key12);
                    if (!$obj12) {
    
                        $cls = JenisTinggalPeer::getOMClass();

                    $obj12 = new $cls();
                    $obj12->hydrate($row, $startcol12);
                    JenisTinggalPeer::addInstanceToPool($obj12, $key12);
                } // if $obj12 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj12 (JenisTinggal)
                $obj12->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined AlatTransportasi rows

                $key13 = AlatTransportasiPeer::getPrimaryKeyHashFromRow($row, $startcol13);
                if ($key13 !== null) {
                    $obj13 = AlatTransportasiPeer::getInstanceFromPool($key13);
                    if (!$obj13) {
    
                        $cls = AlatTransportasiPeer::getOMClass();

                    $obj13 = new $cls();
                    $obj13->hydrate($row, $startcol13);
                    AlatTransportasiPeer::addInstanceToPool($obj13, $key13);
                } // if $obj13 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj13 (AlatTransportasi)
                $obj13->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined Pekerjaan rows

                $key14 = PekerjaanPeer::getPrimaryKeyHashFromRow($row, $startcol14);
                if ($key14 !== null) {
                    $obj14 = PekerjaanPeer::getInstanceFromPool($key14);
                    if (!$obj14) {
    
                        $cls = PekerjaanPeer::getOMClass();

                    $obj14 = new $cls();
                    $obj14->hydrate($row, $startcol14);
                    PekerjaanPeer::addInstanceToPool($obj14, $key14);
                } // if $obj14 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj14 (Pekerjaan)
                $obj14->addPesertaDidikRelatedByPekerjaanIdAyah($obj1);

            } // if joined row is not null

                // Add objects for joined Penghasilan rows

                $key15 = PenghasilanPeer::getPrimaryKeyHashFromRow($row, $startcol15);
                if ($key15 !== null) {
                    $obj15 = PenghasilanPeer::getInstanceFromPool($key15);
                    if (!$obj15) {
    
                        $cls = PenghasilanPeer::getOMClass();

                    $obj15 = new $cls();
                    $obj15->hydrate($row, $startcol15);
                    PenghasilanPeer::addInstanceToPool($obj15, $key15);
                } // if $obj15 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj15 (Penghasilan)
                $obj15->addPesertaDidikRelatedByPenghasilanIdWali($obj1);

            } // if joined row is not null

                // Add objects for joined Pekerjaan rows

                $key16 = PekerjaanPeer::getPrimaryKeyHashFromRow($row, $startcol16);
                if ($key16 !== null) {
                    $obj16 = PekerjaanPeer::getInstanceFromPool($key16);
                    if (!$obj16) {
    
                        $cls = PekerjaanPeer::getOMClass();

                    $obj16 = new $cls();
                    $obj16->hydrate($row, $startcol16);
                    PekerjaanPeer::addInstanceToPool($obj16, $key16);
                } // if $obj16 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj16 (Pekerjaan)
                $obj16->addPesertaDidikRelatedByPekerjaanIdIbu($obj1);

            } // if joined row is not null

                // Add objects for joined Penghasilan rows

                $key17 = PenghasilanPeer::getPrimaryKeyHashFromRow($row, $startcol17);
                if ($key17 !== null) {
                    $obj17 = PenghasilanPeer::getInstanceFromPool($key17);
                    if (!$obj17) {
    
                        $cls = PenghasilanPeer::getOMClass();

                    $obj17 = new $cls();
                    $obj17->hydrate($row, $startcol17);
                    PenghasilanPeer::addInstanceToPool($obj17, $key17);
                } // if $obj17 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj17 (Penghasilan)
                $obj17->addPesertaDidikRelatedByPenghasilanIdIbu($obj1);

            } // if joined row is not null

                // Add objects for joined Pekerjaan rows

                $key18 = PekerjaanPeer::getPrimaryKeyHashFromRow($row, $startcol18);
                if ($key18 !== null) {
                    $obj18 = PekerjaanPeer::getInstanceFromPool($key18);
                    if (!$obj18) {
    
                        $cls = PekerjaanPeer::getOMClass();

                    $obj18 = new $cls();
                    $obj18->hydrate($row, $startcol18);
                    PekerjaanPeer::addInstanceToPool($obj18, $key18);
                } // if $obj18 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj18 (Pekerjaan)
                $obj18->addPesertaDidikRelatedByPekerjaanIdWali($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of PesertaDidik objects pre-filled with all related objects except PenghasilanRelatedByPenghasilanIdIbu.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of PesertaDidik objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptPenghasilanRelatedByPenghasilanIdIbu(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PesertaDidikPeer::DATABASE_NAME);
        }

        PesertaDidikPeer::addSelectColumns($criteria);
        $startcol2 = PesertaDidikPeer::NUM_HYDRATE_COLUMNS;

        KebutuhanKhususPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + KebutuhanKhususPeer::NUM_HYDRATE_COLUMNS;

        KebutuhanKhususPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + KebutuhanKhususPeer::NUM_HYDRATE_COLUMNS;

        NegaraPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + NegaraPeer::NUM_HYDRATE_COLUMNS;

        AlasanLayakPipPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + AlasanLayakPipPeer::NUM_HYDRATE_COLUMNS;

        BankPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + BankPeer::NUM_HYDRATE_COLUMNS;

        MstWilayahPeer::addSelectColumns($criteria);
        $startcol8 = $startcol7 + MstWilayahPeer::NUM_HYDRATE_COLUMNS;

        KebutuhanKhususPeer::addSelectColumns($criteria);
        $startcol9 = $startcol8 + KebutuhanKhususPeer::NUM_HYDRATE_COLUMNS;

        PekerjaanPeer::addSelectColumns($criteria);
        $startcol10 = $startcol9 + PekerjaanPeer::NUM_HYDRATE_COLUMNS;

        AgamaPeer::addSelectColumns($criteria);
        $startcol11 = $startcol10 + AgamaPeer::NUM_HYDRATE_COLUMNS;

        JenisTinggalPeer::addSelectColumns($criteria);
        $startcol12 = $startcol11 + JenisTinggalPeer::NUM_HYDRATE_COLUMNS;

        AlatTransportasiPeer::addSelectColumns($criteria);
        $startcol13 = $startcol12 + AlatTransportasiPeer::NUM_HYDRATE_COLUMNS;

        PekerjaanPeer::addSelectColumns($criteria);
        $startcol14 = $startcol13 + PekerjaanPeer::NUM_HYDRATE_COLUMNS;

        JenjangPendidikanPeer::addSelectColumns($criteria);
        $startcol15 = $startcol14 + JenjangPendidikanPeer::NUM_HYDRATE_COLUMNS;

        PekerjaanPeer::addSelectColumns($criteria);
        $startcol16 = $startcol15 + PekerjaanPeer::NUM_HYDRATE_COLUMNS;

        JenjangPendidikanPeer::addSelectColumns($criteria);
        $startcol17 = $startcol16 + JenjangPendidikanPeer::NUM_HYDRATE_COLUMNS;

        PekerjaanPeer::addSelectColumns($criteria);
        $startcol18 = $startcol17 + PekerjaanPeer::NUM_HYDRATE_COLUMNS;

        JenjangPendidikanPeer::addSelectColumns($criteria);
        $startcol19 = $startcol18 + JenjangPendidikanPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID_AYAH, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID_IBU, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KEWARGANEGARAAN, NegaraPeer::NEGARA_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::ID_LAYAK_PIP, AlasanLayakPipPeer::ID_LAYAK_PIP, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::ID_BANK, BankPeer::ID_BANK, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::AGAMA_ID, AgamaPeer::AGAMA_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENIS_TINGGAL_ID, JenisTinggalPeer::JENIS_TINGGAL_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::ALAT_TRANSPORTASI_ID, AlatTransportasiPeer::ALAT_TRANSPORTASI_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID_AYAH, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENJANG_PENDIDIKAN_IBU, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID_IBU, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENJANG_PENDIDIKAN_AYAH, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID_WALI, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENJANG_PENDIDIKAN_WALI, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PesertaDidikPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PesertaDidikPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = PesertaDidikPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PesertaDidikPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined KebutuhanKhusus rows

                $key2 = KebutuhanKhususPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = KebutuhanKhususPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = KebutuhanKhususPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    KebutuhanKhususPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj2 (KebutuhanKhusus)
                $obj2->addPesertaDidikRelatedByKebutuhanKhususIdAyah($obj1);

            } // if joined row is not null

                // Add objects for joined KebutuhanKhusus rows

                $key3 = KebutuhanKhususPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = KebutuhanKhususPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = KebutuhanKhususPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    KebutuhanKhususPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj3 (KebutuhanKhusus)
                $obj3->addPesertaDidikRelatedByKebutuhanKhususIdIbu($obj1);

            } // if joined row is not null

                // Add objects for joined Negara rows

                $key4 = NegaraPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = NegaraPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = NegaraPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    NegaraPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj4 (Negara)
                $obj4->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined AlasanLayakPip rows

                $key5 = AlasanLayakPipPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = AlasanLayakPipPeer::getInstanceFromPool($key5);
                    if (!$obj5) {
    
                        $cls = AlasanLayakPipPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    AlasanLayakPipPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj5 (AlasanLayakPip)
                $obj5->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined Bank rows

                $key6 = BankPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = BankPeer::getInstanceFromPool($key6);
                    if (!$obj6) {
    
                        $cls = BankPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    BankPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj6 (Bank)
                $obj6->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined MstWilayah rows

                $key7 = MstWilayahPeer::getPrimaryKeyHashFromRow($row, $startcol7);
                if ($key7 !== null) {
                    $obj7 = MstWilayahPeer::getInstanceFromPool($key7);
                    if (!$obj7) {
    
                        $cls = MstWilayahPeer::getOMClass();

                    $obj7 = new $cls();
                    $obj7->hydrate($row, $startcol7);
                    MstWilayahPeer::addInstanceToPool($obj7, $key7);
                } // if $obj7 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj7 (MstWilayah)
                $obj7->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined KebutuhanKhusus rows

                $key8 = KebutuhanKhususPeer::getPrimaryKeyHashFromRow($row, $startcol8);
                if ($key8 !== null) {
                    $obj8 = KebutuhanKhususPeer::getInstanceFromPool($key8);
                    if (!$obj8) {
    
                        $cls = KebutuhanKhususPeer::getOMClass();

                    $obj8 = new $cls();
                    $obj8->hydrate($row, $startcol8);
                    KebutuhanKhususPeer::addInstanceToPool($obj8, $key8);
                } // if $obj8 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj8 (KebutuhanKhusus)
                $obj8->addPesertaDidikRelatedByKebutuhanKhususId($obj1);

            } // if joined row is not null

                // Add objects for joined Pekerjaan rows

                $key9 = PekerjaanPeer::getPrimaryKeyHashFromRow($row, $startcol9);
                if ($key9 !== null) {
                    $obj9 = PekerjaanPeer::getInstanceFromPool($key9);
                    if (!$obj9) {
    
                        $cls = PekerjaanPeer::getOMClass();

                    $obj9 = new $cls();
                    $obj9->hydrate($row, $startcol9);
                    PekerjaanPeer::addInstanceToPool($obj9, $key9);
                } // if $obj9 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj9 (Pekerjaan)
                $obj9->addPesertaDidikRelatedByPekerjaanId($obj1);

            } // if joined row is not null

                // Add objects for joined Agama rows

                $key10 = AgamaPeer::getPrimaryKeyHashFromRow($row, $startcol10);
                if ($key10 !== null) {
                    $obj10 = AgamaPeer::getInstanceFromPool($key10);
                    if (!$obj10) {
    
                        $cls = AgamaPeer::getOMClass();

                    $obj10 = new $cls();
                    $obj10->hydrate($row, $startcol10);
                    AgamaPeer::addInstanceToPool($obj10, $key10);
                } // if $obj10 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj10 (Agama)
                $obj10->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined JenisTinggal rows

                $key11 = JenisTinggalPeer::getPrimaryKeyHashFromRow($row, $startcol11);
                if ($key11 !== null) {
                    $obj11 = JenisTinggalPeer::getInstanceFromPool($key11);
                    if (!$obj11) {
    
                        $cls = JenisTinggalPeer::getOMClass();

                    $obj11 = new $cls();
                    $obj11->hydrate($row, $startcol11);
                    JenisTinggalPeer::addInstanceToPool($obj11, $key11);
                } // if $obj11 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj11 (JenisTinggal)
                $obj11->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined AlatTransportasi rows

                $key12 = AlatTransportasiPeer::getPrimaryKeyHashFromRow($row, $startcol12);
                if ($key12 !== null) {
                    $obj12 = AlatTransportasiPeer::getInstanceFromPool($key12);
                    if (!$obj12) {
    
                        $cls = AlatTransportasiPeer::getOMClass();

                    $obj12 = new $cls();
                    $obj12->hydrate($row, $startcol12);
                    AlatTransportasiPeer::addInstanceToPool($obj12, $key12);
                } // if $obj12 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj12 (AlatTransportasi)
                $obj12->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined Pekerjaan rows

                $key13 = PekerjaanPeer::getPrimaryKeyHashFromRow($row, $startcol13);
                if ($key13 !== null) {
                    $obj13 = PekerjaanPeer::getInstanceFromPool($key13);
                    if (!$obj13) {
    
                        $cls = PekerjaanPeer::getOMClass();

                    $obj13 = new $cls();
                    $obj13->hydrate($row, $startcol13);
                    PekerjaanPeer::addInstanceToPool($obj13, $key13);
                } // if $obj13 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj13 (Pekerjaan)
                $obj13->addPesertaDidikRelatedByPekerjaanIdAyah($obj1);

            } // if joined row is not null

                // Add objects for joined JenjangPendidikan rows

                $key14 = JenjangPendidikanPeer::getPrimaryKeyHashFromRow($row, $startcol14);
                if ($key14 !== null) {
                    $obj14 = JenjangPendidikanPeer::getInstanceFromPool($key14);
                    if (!$obj14) {
    
                        $cls = JenjangPendidikanPeer::getOMClass();

                    $obj14 = new $cls();
                    $obj14->hydrate($row, $startcol14);
                    JenjangPendidikanPeer::addInstanceToPool($obj14, $key14);
                } // if $obj14 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj14 (JenjangPendidikan)
                $obj14->addPesertaDidikRelatedByJenjangPendidikanIbu($obj1);

            } // if joined row is not null

                // Add objects for joined Pekerjaan rows

                $key15 = PekerjaanPeer::getPrimaryKeyHashFromRow($row, $startcol15);
                if ($key15 !== null) {
                    $obj15 = PekerjaanPeer::getInstanceFromPool($key15);
                    if (!$obj15) {
    
                        $cls = PekerjaanPeer::getOMClass();

                    $obj15 = new $cls();
                    $obj15->hydrate($row, $startcol15);
                    PekerjaanPeer::addInstanceToPool($obj15, $key15);
                } // if $obj15 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj15 (Pekerjaan)
                $obj15->addPesertaDidikRelatedByPekerjaanIdIbu($obj1);

            } // if joined row is not null

                // Add objects for joined JenjangPendidikan rows

                $key16 = JenjangPendidikanPeer::getPrimaryKeyHashFromRow($row, $startcol16);
                if ($key16 !== null) {
                    $obj16 = JenjangPendidikanPeer::getInstanceFromPool($key16);
                    if (!$obj16) {
    
                        $cls = JenjangPendidikanPeer::getOMClass();

                    $obj16 = new $cls();
                    $obj16->hydrate($row, $startcol16);
                    JenjangPendidikanPeer::addInstanceToPool($obj16, $key16);
                } // if $obj16 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj16 (JenjangPendidikan)
                $obj16->addPesertaDidikRelatedByJenjangPendidikanAyah($obj1);

            } // if joined row is not null

                // Add objects for joined Pekerjaan rows

                $key17 = PekerjaanPeer::getPrimaryKeyHashFromRow($row, $startcol17);
                if ($key17 !== null) {
                    $obj17 = PekerjaanPeer::getInstanceFromPool($key17);
                    if (!$obj17) {
    
                        $cls = PekerjaanPeer::getOMClass();

                    $obj17 = new $cls();
                    $obj17->hydrate($row, $startcol17);
                    PekerjaanPeer::addInstanceToPool($obj17, $key17);
                } // if $obj17 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj17 (Pekerjaan)
                $obj17->addPesertaDidikRelatedByPekerjaanIdWali($obj1);

            } // if joined row is not null

                // Add objects for joined JenjangPendidikan rows

                $key18 = JenjangPendidikanPeer::getPrimaryKeyHashFromRow($row, $startcol18);
                if ($key18 !== null) {
                    $obj18 = JenjangPendidikanPeer::getInstanceFromPool($key18);
                    if (!$obj18) {
    
                        $cls = JenjangPendidikanPeer::getOMClass();

                    $obj18 = new $cls();
                    $obj18->hydrate($row, $startcol18);
                    JenjangPendidikanPeer::addInstanceToPool($obj18, $key18);
                } // if $obj18 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj18 (JenjangPendidikan)
                $obj18->addPesertaDidikRelatedByJenjangPendidikanWali($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of PesertaDidik objects pre-filled with all related objects except PekerjaanRelatedByPekerjaanIdWali.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of PesertaDidik objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptPekerjaanRelatedByPekerjaanIdWali(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PesertaDidikPeer::DATABASE_NAME);
        }

        PesertaDidikPeer::addSelectColumns($criteria);
        $startcol2 = PesertaDidikPeer::NUM_HYDRATE_COLUMNS;

        KebutuhanKhususPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + KebutuhanKhususPeer::NUM_HYDRATE_COLUMNS;

        KebutuhanKhususPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + KebutuhanKhususPeer::NUM_HYDRATE_COLUMNS;

        NegaraPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + NegaraPeer::NUM_HYDRATE_COLUMNS;

        AlasanLayakPipPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + AlasanLayakPipPeer::NUM_HYDRATE_COLUMNS;

        BankPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + BankPeer::NUM_HYDRATE_COLUMNS;

        MstWilayahPeer::addSelectColumns($criteria);
        $startcol8 = $startcol7 + MstWilayahPeer::NUM_HYDRATE_COLUMNS;

        KebutuhanKhususPeer::addSelectColumns($criteria);
        $startcol9 = $startcol8 + KebutuhanKhususPeer::NUM_HYDRATE_COLUMNS;

        AgamaPeer::addSelectColumns($criteria);
        $startcol10 = $startcol9 + AgamaPeer::NUM_HYDRATE_COLUMNS;

        PenghasilanPeer::addSelectColumns($criteria);
        $startcol11 = $startcol10 + PenghasilanPeer::NUM_HYDRATE_COLUMNS;

        JenisTinggalPeer::addSelectColumns($criteria);
        $startcol12 = $startcol11 + JenisTinggalPeer::NUM_HYDRATE_COLUMNS;

        AlatTransportasiPeer::addSelectColumns($criteria);
        $startcol13 = $startcol12 + AlatTransportasiPeer::NUM_HYDRATE_COLUMNS;

        JenjangPendidikanPeer::addSelectColumns($criteria);
        $startcol14 = $startcol13 + JenjangPendidikanPeer::NUM_HYDRATE_COLUMNS;

        PenghasilanPeer::addSelectColumns($criteria);
        $startcol15 = $startcol14 + PenghasilanPeer::NUM_HYDRATE_COLUMNS;

        JenjangPendidikanPeer::addSelectColumns($criteria);
        $startcol16 = $startcol15 + JenjangPendidikanPeer::NUM_HYDRATE_COLUMNS;

        PenghasilanPeer::addSelectColumns($criteria);
        $startcol17 = $startcol16 + PenghasilanPeer::NUM_HYDRATE_COLUMNS;

        JenjangPendidikanPeer::addSelectColumns($criteria);
        $startcol18 = $startcol17 + JenjangPendidikanPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID_AYAH, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID_IBU, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KEWARGANEGARAAN, NegaraPeer::NEGARA_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::ID_LAYAK_PIP, AlasanLayakPipPeer::ID_LAYAK_PIP, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::ID_BANK, BankPeer::ID_BANK, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::AGAMA_ID, AgamaPeer::AGAMA_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PENGHASILAN_ID_AYAH, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENIS_TINGGAL_ID, JenisTinggalPeer::JENIS_TINGGAL_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::ALAT_TRANSPORTASI_ID, AlatTransportasiPeer::ALAT_TRANSPORTASI_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENJANG_PENDIDIKAN_IBU, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PENGHASILAN_ID_WALI, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENJANG_PENDIDIKAN_AYAH, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PENGHASILAN_ID_IBU, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENJANG_PENDIDIKAN_WALI, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PesertaDidikPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PesertaDidikPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = PesertaDidikPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PesertaDidikPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined KebutuhanKhusus rows

                $key2 = KebutuhanKhususPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = KebutuhanKhususPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = KebutuhanKhususPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    KebutuhanKhususPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj2 (KebutuhanKhusus)
                $obj2->addPesertaDidikRelatedByKebutuhanKhususIdAyah($obj1);

            } // if joined row is not null

                // Add objects for joined KebutuhanKhusus rows

                $key3 = KebutuhanKhususPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = KebutuhanKhususPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = KebutuhanKhususPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    KebutuhanKhususPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj3 (KebutuhanKhusus)
                $obj3->addPesertaDidikRelatedByKebutuhanKhususIdIbu($obj1);

            } // if joined row is not null

                // Add objects for joined Negara rows

                $key4 = NegaraPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = NegaraPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = NegaraPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    NegaraPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj4 (Negara)
                $obj4->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined AlasanLayakPip rows

                $key5 = AlasanLayakPipPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = AlasanLayakPipPeer::getInstanceFromPool($key5);
                    if (!$obj5) {
    
                        $cls = AlasanLayakPipPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    AlasanLayakPipPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj5 (AlasanLayakPip)
                $obj5->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined Bank rows

                $key6 = BankPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = BankPeer::getInstanceFromPool($key6);
                    if (!$obj6) {
    
                        $cls = BankPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    BankPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj6 (Bank)
                $obj6->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined MstWilayah rows

                $key7 = MstWilayahPeer::getPrimaryKeyHashFromRow($row, $startcol7);
                if ($key7 !== null) {
                    $obj7 = MstWilayahPeer::getInstanceFromPool($key7);
                    if (!$obj7) {
    
                        $cls = MstWilayahPeer::getOMClass();

                    $obj7 = new $cls();
                    $obj7->hydrate($row, $startcol7);
                    MstWilayahPeer::addInstanceToPool($obj7, $key7);
                } // if $obj7 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj7 (MstWilayah)
                $obj7->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined KebutuhanKhusus rows

                $key8 = KebutuhanKhususPeer::getPrimaryKeyHashFromRow($row, $startcol8);
                if ($key8 !== null) {
                    $obj8 = KebutuhanKhususPeer::getInstanceFromPool($key8);
                    if (!$obj8) {
    
                        $cls = KebutuhanKhususPeer::getOMClass();

                    $obj8 = new $cls();
                    $obj8->hydrate($row, $startcol8);
                    KebutuhanKhususPeer::addInstanceToPool($obj8, $key8);
                } // if $obj8 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj8 (KebutuhanKhusus)
                $obj8->addPesertaDidikRelatedByKebutuhanKhususId($obj1);

            } // if joined row is not null

                // Add objects for joined Agama rows

                $key9 = AgamaPeer::getPrimaryKeyHashFromRow($row, $startcol9);
                if ($key9 !== null) {
                    $obj9 = AgamaPeer::getInstanceFromPool($key9);
                    if (!$obj9) {
    
                        $cls = AgamaPeer::getOMClass();

                    $obj9 = new $cls();
                    $obj9->hydrate($row, $startcol9);
                    AgamaPeer::addInstanceToPool($obj9, $key9);
                } // if $obj9 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj9 (Agama)
                $obj9->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined Penghasilan rows

                $key10 = PenghasilanPeer::getPrimaryKeyHashFromRow($row, $startcol10);
                if ($key10 !== null) {
                    $obj10 = PenghasilanPeer::getInstanceFromPool($key10);
                    if (!$obj10) {
    
                        $cls = PenghasilanPeer::getOMClass();

                    $obj10 = new $cls();
                    $obj10->hydrate($row, $startcol10);
                    PenghasilanPeer::addInstanceToPool($obj10, $key10);
                } // if $obj10 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj10 (Penghasilan)
                $obj10->addPesertaDidikRelatedByPenghasilanIdAyah($obj1);

            } // if joined row is not null

                // Add objects for joined JenisTinggal rows

                $key11 = JenisTinggalPeer::getPrimaryKeyHashFromRow($row, $startcol11);
                if ($key11 !== null) {
                    $obj11 = JenisTinggalPeer::getInstanceFromPool($key11);
                    if (!$obj11) {
    
                        $cls = JenisTinggalPeer::getOMClass();

                    $obj11 = new $cls();
                    $obj11->hydrate($row, $startcol11);
                    JenisTinggalPeer::addInstanceToPool($obj11, $key11);
                } // if $obj11 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj11 (JenisTinggal)
                $obj11->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined AlatTransportasi rows

                $key12 = AlatTransportasiPeer::getPrimaryKeyHashFromRow($row, $startcol12);
                if ($key12 !== null) {
                    $obj12 = AlatTransportasiPeer::getInstanceFromPool($key12);
                    if (!$obj12) {
    
                        $cls = AlatTransportasiPeer::getOMClass();

                    $obj12 = new $cls();
                    $obj12->hydrate($row, $startcol12);
                    AlatTransportasiPeer::addInstanceToPool($obj12, $key12);
                } // if $obj12 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj12 (AlatTransportasi)
                $obj12->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined JenjangPendidikan rows

                $key13 = JenjangPendidikanPeer::getPrimaryKeyHashFromRow($row, $startcol13);
                if ($key13 !== null) {
                    $obj13 = JenjangPendidikanPeer::getInstanceFromPool($key13);
                    if (!$obj13) {
    
                        $cls = JenjangPendidikanPeer::getOMClass();

                    $obj13 = new $cls();
                    $obj13->hydrate($row, $startcol13);
                    JenjangPendidikanPeer::addInstanceToPool($obj13, $key13);
                } // if $obj13 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj13 (JenjangPendidikan)
                $obj13->addPesertaDidikRelatedByJenjangPendidikanIbu($obj1);

            } // if joined row is not null

                // Add objects for joined Penghasilan rows

                $key14 = PenghasilanPeer::getPrimaryKeyHashFromRow($row, $startcol14);
                if ($key14 !== null) {
                    $obj14 = PenghasilanPeer::getInstanceFromPool($key14);
                    if (!$obj14) {
    
                        $cls = PenghasilanPeer::getOMClass();

                    $obj14 = new $cls();
                    $obj14->hydrate($row, $startcol14);
                    PenghasilanPeer::addInstanceToPool($obj14, $key14);
                } // if $obj14 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj14 (Penghasilan)
                $obj14->addPesertaDidikRelatedByPenghasilanIdWali($obj1);

            } // if joined row is not null

                // Add objects for joined JenjangPendidikan rows

                $key15 = JenjangPendidikanPeer::getPrimaryKeyHashFromRow($row, $startcol15);
                if ($key15 !== null) {
                    $obj15 = JenjangPendidikanPeer::getInstanceFromPool($key15);
                    if (!$obj15) {
    
                        $cls = JenjangPendidikanPeer::getOMClass();

                    $obj15 = new $cls();
                    $obj15->hydrate($row, $startcol15);
                    JenjangPendidikanPeer::addInstanceToPool($obj15, $key15);
                } // if $obj15 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj15 (JenjangPendidikan)
                $obj15->addPesertaDidikRelatedByJenjangPendidikanAyah($obj1);

            } // if joined row is not null

                // Add objects for joined Penghasilan rows

                $key16 = PenghasilanPeer::getPrimaryKeyHashFromRow($row, $startcol16);
                if ($key16 !== null) {
                    $obj16 = PenghasilanPeer::getInstanceFromPool($key16);
                    if (!$obj16) {
    
                        $cls = PenghasilanPeer::getOMClass();

                    $obj16 = new $cls();
                    $obj16->hydrate($row, $startcol16);
                    PenghasilanPeer::addInstanceToPool($obj16, $key16);
                } // if $obj16 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj16 (Penghasilan)
                $obj16->addPesertaDidikRelatedByPenghasilanIdIbu($obj1);

            } // if joined row is not null

                // Add objects for joined JenjangPendidikan rows

                $key17 = JenjangPendidikanPeer::getPrimaryKeyHashFromRow($row, $startcol17);
                if ($key17 !== null) {
                    $obj17 = JenjangPendidikanPeer::getInstanceFromPool($key17);
                    if (!$obj17) {
    
                        $cls = JenjangPendidikanPeer::getOMClass();

                    $obj17 = new $cls();
                    $obj17->hydrate($row, $startcol17);
                    JenjangPendidikanPeer::addInstanceToPool($obj17, $key17);
                } // if $obj17 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj17 (JenjangPendidikan)
                $obj17->addPesertaDidikRelatedByJenjangPendidikanWali($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of PesertaDidik objects pre-filled with all related objects except JenjangPendidikanRelatedByJenjangPendidikanWali.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of PesertaDidik objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptJenjangPendidikanRelatedByJenjangPendidikanWali(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PesertaDidikPeer::DATABASE_NAME);
        }

        PesertaDidikPeer::addSelectColumns($criteria);
        $startcol2 = PesertaDidikPeer::NUM_HYDRATE_COLUMNS;

        KebutuhanKhususPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + KebutuhanKhususPeer::NUM_HYDRATE_COLUMNS;

        KebutuhanKhususPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + KebutuhanKhususPeer::NUM_HYDRATE_COLUMNS;

        NegaraPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + NegaraPeer::NUM_HYDRATE_COLUMNS;

        AlasanLayakPipPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + AlasanLayakPipPeer::NUM_HYDRATE_COLUMNS;

        BankPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + BankPeer::NUM_HYDRATE_COLUMNS;

        MstWilayahPeer::addSelectColumns($criteria);
        $startcol8 = $startcol7 + MstWilayahPeer::NUM_HYDRATE_COLUMNS;

        KebutuhanKhususPeer::addSelectColumns($criteria);
        $startcol9 = $startcol8 + KebutuhanKhususPeer::NUM_HYDRATE_COLUMNS;

        PekerjaanPeer::addSelectColumns($criteria);
        $startcol10 = $startcol9 + PekerjaanPeer::NUM_HYDRATE_COLUMNS;

        AgamaPeer::addSelectColumns($criteria);
        $startcol11 = $startcol10 + AgamaPeer::NUM_HYDRATE_COLUMNS;

        PenghasilanPeer::addSelectColumns($criteria);
        $startcol12 = $startcol11 + PenghasilanPeer::NUM_HYDRATE_COLUMNS;

        JenisTinggalPeer::addSelectColumns($criteria);
        $startcol13 = $startcol12 + JenisTinggalPeer::NUM_HYDRATE_COLUMNS;

        AlatTransportasiPeer::addSelectColumns($criteria);
        $startcol14 = $startcol13 + AlatTransportasiPeer::NUM_HYDRATE_COLUMNS;

        PekerjaanPeer::addSelectColumns($criteria);
        $startcol15 = $startcol14 + PekerjaanPeer::NUM_HYDRATE_COLUMNS;

        PenghasilanPeer::addSelectColumns($criteria);
        $startcol16 = $startcol15 + PenghasilanPeer::NUM_HYDRATE_COLUMNS;

        PekerjaanPeer::addSelectColumns($criteria);
        $startcol17 = $startcol16 + PekerjaanPeer::NUM_HYDRATE_COLUMNS;

        PenghasilanPeer::addSelectColumns($criteria);
        $startcol18 = $startcol17 + PenghasilanPeer::NUM_HYDRATE_COLUMNS;

        PekerjaanPeer::addSelectColumns($criteria);
        $startcol19 = $startcol18 + PekerjaanPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID_AYAH, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID_IBU, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KEWARGANEGARAAN, NegaraPeer::NEGARA_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::ID_LAYAK_PIP, AlasanLayakPipPeer::ID_LAYAK_PIP, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::ID_BANK, BankPeer::ID_BANK, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::AGAMA_ID, AgamaPeer::AGAMA_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PENGHASILAN_ID_AYAH, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::JENIS_TINGGAL_ID, JenisTinggalPeer::JENIS_TINGGAL_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::ALAT_TRANSPORTASI_ID, AlatTransportasiPeer::ALAT_TRANSPORTASI_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID_AYAH, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PENGHASILAN_ID_WALI, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID_IBU, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PENGHASILAN_ID_IBU, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $criteria->addJoin(PesertaDidikPeer::PEKERJAAN_ID_WALI, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PesertaDidikPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PesertaDidikPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = PesertaDidikPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PesertaDidikPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined KebutuhanKhusus rows

                $key2 = KebutuhanKhususPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = KebutuhanKhususPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = KebutuhanKhususPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    KebutuhanKhususPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj2 (KebutuhanKhusus)
                $obj2->addPesertaDidikRelatedByKebutuhanKhususIdAyah($obj1);

            } // if joined row is not null

                // Add objects for joined KebutuhanKhusus rows

                $key3 = KebutuhanKhususPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = KebutuhanKhususPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = KebutuhanKhususPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    KebutuhanKhususPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj3 (KebutuhanKhusus)
                $obj3->addPesertaDidikRelatedByKebutuhanKhususIdIbu($obj1);

            } // if joined row is not null

                // Add objects for joined Negara rows

                $key4 = NegaraPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = NegaraPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = NegaraPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    NegaraPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj4 (Negara)
                $obj4->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined AlasanLayakPip rows

                $key5 = AlasanLayakPipPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = AlasanLayakPipPeer::getInstanceFromPool($key5);
                    if (!$obj5) {
    
                        $cls = AlasanLayakPipPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    AlasanLayakPipPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj5 (AlasanLayakPip)
                $obj5->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined Bank rows

                $key6 = BankPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = BankPeer::getInstanceFromPool($key6);
                    if (!$obj6) {
    
                        $cls = BankPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    BankPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj6 (Bank)
                $obj6->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined MstWilayah rows

                $key7 = MstWilayahPeer::getPrimaryKeyHashFromRow($row, $startcol7);
                if ($key7 !== null) {
                    $obj7 = MstWilayahPeer::getInstanceFromPool($key7);
                    if (!$obj7) {
    
                        $cls = MstWilayahPeer::getOMClass();

                    $obj7 = new $cls();
                    $obj7->hydrate($row, $startcol7);
                    MstWilayahPeer::addInstanceToPool($obj7, $key7);
                } // if $obj7 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj7 (MstWilayah)
                $obj7->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined KebutuhanKhusus rows

                $key8 = KebutuhanKhususPeer::getPrimaryKeyHashFromRow($row, $startcol8);
                if ($key8 !== null) {
                    $obj8 = KebutuhanKhususPeer::getInstanceFromPool($key8);
                    if (!$obj8) {
    
                        $cls = KebutuhanKhususPeer::getOMClass();

                    $obj8 = new $cls();
                    $obj8->hydrate($row, $startcol8);
                    KebutuhanKhususPeer::addInstanceToPool($obj8, $key8);
                } // if $obj8 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj8 (KebutuhanKhusus)
                $obj8->addPesertaDidikRelatedByKebutuhanKhususId($obj1);

            } // if joined row is not null

                // Add objects for joined Pekerjaan rows

                $key9 = PekerjaanPeer::getPrimaryKeyHashFromRow($row, $startcol9);
                if ($key9 !== null) {
                    $obj9 = PekerjaanPeer::getInstanceFromPool($key9);
                    if (!$obj9) {
    
                        $cls = PekerjaanPeer::getOMClass();

                    $obj9 = new $cls();
                    $obj9->hydrate($row, $startcol9);
                    PekerjaanPeer::addInstanceToPool($obj9, $key9);
                } // if $obj9 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj9 (Pekerjaan)
                $obj9->addPesertaDidikRelatedByPekerjaanId($obj1);

            } // if joined row is not null

                // Add objects for joined Agama rows

                $key10 = AgamaPeer::getPrimaryKeyHashFromRow($row, $startcol10);
                if ($key10 !== null) {
                    $obj10 = AgamaPeer::getInstanceFromPool($key10);
                    if (!$obj10) {
    
                        $cls = AgamaPeer::getOMClass();

                    $obj10 = new $cls();
                    $obj10->hydrate($row, $startcol10);
                    AgamaPeer::addInstanceToPool($obj10, $key10);
                } // if $obj10 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj10 (Agama)
                $obj10->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined Penghasilan rows

                $key11 = PenghasilanPeer::getPrimaryKeyHashFromRow($row, $startcol11);
                if ($key11 !== null) {
                    $obj11 = PenghasilanPeer::getInstanceFromPool($key11);
                    if (!$obj11) {
    
                        $cls = PenghasilanPeer::getOMClass();

                    $obj11 = new $cls();
                    $obj11->hydrate($row, $startcol11);
                    PenghasilanPeer::addInstanceToPool($obj11, $key11);
                } // if $obj11 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj11 (Penghasilan)
                $obj11->addPesertaDidikRelatedByPenghasilanIdAyah($obj1);

            } // if joined row is not null

                // Add objects for joined JenisTinggal rows

                $key12 = JenisTinggalPeer::getPrimaryKeyHashFromRow($row, $startcol12);
                if ($key12 !== null) {
                    $obj12 = JenisTinggalPeer::getInstanceFromPool($key12);
                    if (!$obj12) {
    
                        $cls = JenisTinggalPeer::getOMClass();

                    $obj12 = new $cls();
                    $obj12->hydrate($row, $startcol12);
                    JenisTinggalPeer::addInstanceToPool($obj12, $key12);
                } // if $obj12 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj12 (JenisTinggal)
                $obj12->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined AlatTransportasi rows

                $key13 = AlatTransportasiPeer::getPrimaryKeyHashFromRow($row, $startcol13);
                if ($key13 !== null) {
                    $obj13 = AlatTransportasiPeer::getInstanceFromPool($key13);
                    if (!$obj13) {
    
                        $cls = AlatTransportasiPeer::getOMClass();

                    $obj13 = new $cls();
                    $obj13->hydrate($row, $startcol13);
                    AlatTransportasiPeer::addInstanceToPool($obj13, $key13);
                } // if $obj13 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj13 (AlatTransportasi)
                $obj13->addPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined Pekerjaan rows

                $key14 = PekerjaanPeer::getPrimaryKeyHashFromRow($row, $startcol14);
                if ($key14 !== null) {
                    $obj14 = PekerjaanPeer::getInstanceFromPool($key14);
                    if (!$obj14) {
    
                        $cls = PekerjaanPeer::getOMClass();

                    $obj14 = new $cls();
                    $obj14->hydrate($row, $startcol14);
                    PekerjaanPeer::addInstanceToPool($obj14, $key14);
                } // if $obj14 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj14 (Pekerjaan)
                $obj14->addPesertaDidikRelatedByPekerjaanIdAyah($obj1);

            } // if joined row is not null

                // Add objects for joined Penghasilan rows

                $key15 = PenghasilanPeer::getPrimaryKeyHashFromRow($row, $startcol15);
                if ($key15 !== null) {
                    $obj15 = PenghasilanPeer::getInstanceFromPool($key15);
                    if (!$obj15) {
    
                        $cls = PenghasilanPeer::getOMClass();

                    $obj15 = new $cls();
                    $obj15->hydrate($row, $startcol15);
                    PenghasilanPeer::addInstanceToPool($obj15, $key15);
                } // if $obj15 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj15 (Penghasilan)
                $obj15->addPesertaDidikRelatedByPenghasilanIdWali($obj1);

            } // if joined row is not null

                // Add objects for joined Pekerjaan rows

                $key16 = PekerjaanPeer::getPrimaryKeyHashFromRow($row, $startcol16);
                if ($key16 !== null) {
                    $obj16 = PekerjaanPeer::getInstanceFromPool($key16);
                    if (!$obj16) {
    
                        $cls = PekerjaanPeer::getOMClass();

                    $obj16 = new $cls();
                    $obj16->hydrate($row, $startcol16);
                    PekerjaanPeer::addInstanceToPool($obj16, $key16);
                } // if $obj16 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj16 (Pekerjaan)
                $obj16->addPesertaDidikRelatedByPekerjaanIdIbu($obj1);

            } // if joined row is not null

                // Add objects for joined Penghasilan rows

                $key17 = PenghasilanPeer::getPrimaryKeyHashFromRow($row, $startcol17);
                if ($key17 !== null) {
                    $obj17 = PenghasilanPeer::getInstanceFromPool($key17);
                    if (!$obj17) {
    
                        $cls = PenghasilanPeer::getOMClass();

                    $obj17 = new $cls();
                    $obj17->hydrate($row, $startcol17);
                    PenghasilanPeer::addInstanceToPool($obj17, $key17);
                } // if $obj17 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj17 (Penghasilan)
                $obj17->addPesertaDidikRelatedByPenghasilanIdIbu($obj1);

            } // if joined row is not null

                // Add objects for joined Pekerjaan rows

                $key18 = PekerjaanPeer::getPrimaryKeyHashFromRow($row, $startcol18);
                if ($key18 !== null) {
                    $obj18 = PekerjaanPeer::getInstanceFromPool($key18);
                    if (!$obj18) {
    
                        $cls = PekerjaanPeer::getOMClass();

                    $obj18 = new $cls();
                    $obj18->hydrate($row, $startcol18);
                    PekerjaanPeer::addInstanceToPool($obj18, $key18);
                } // if $obj18 already loaded

                // Add the $obj1 (PesertaDidik) to the collection in $obj18 (Pekerjaan)
                $obj18->addPesertaDidikRelatedByPekerjaanIdWali($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }

    /**
     * Returns the TableMap related to this peer.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getDatabaseMap(PesertaDidikPeer::DATABASE_NAME)->getTable(PesertaDidikPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BasePesertaDidikPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BasePesertaDidikPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new PesertaDidikTableMap());
      }
    }

    /**
     * The class that the Peer will make instances of.
     *
     *
     * @return string ClassName
     */
    public static function getOMClass()
    {
        return PesertaDidikPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a PesertaDidik or Criteria object.
     *
     * @param      mixed $values Criteria or PesertaDidik object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(PesertaDidikPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from PesertaDidik object
        }


        // Set the correct dbName
        $criteria->setDbName(PesertaDidikPeer::DATABASE_NAME);

        try {
            // use transaction because $criteria could contain info
            // for more than one table (I guess, conceivably)
            $con->beginTransaction();
            $pk = BasePeer::doInsert($criteria, $con);
            $con->commit();
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }

        return $pk;
    }

    /**
     * Performs an UPDATE on the database, given a PesertaDidik or Criteria object.
     *
     * @param      mixed $values Criteria or PesertaDidik object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(PesertaDidikPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(PesertaDidikPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(PesertaDidikPeer::PESERTA_DIDIK_ID);
            $value = $criteria->remove(PesertaDidikPeer::PESERTA_DIDIK_ID);
            if ($value) {
                $selectCriteria->add(PesertaDidikPeer::PESERTA_DIDIK_ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(PesertaDidikPeer::TABLE_NAME);
            }

        } else { // $values is PesertaDidik object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(PesertaDidikPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the peserta_didik table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(PesertaDidikPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(PesertaDidikPeer::TABLE_NAME, $con, PesertaDidikPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            PesertaDidikPeer::clearInstancePool();
            PesertaDidikPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a PesertaDidik or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or PesertaDidik object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param      PropelPDO $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *				if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, PropelPDO $con = null)
     {
        if ($con === null) {
            $con = Propel::getConnection(PesertaDidikPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            PesertaDidikPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof PesertaDidik) { // it's a model object
            // invalidate the cache for this single object
            PesertaDidikPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(PesertaDidikPeer::DATABASE_NAME);
            $criteria->add(PesertaDidikPeer::PESERTA_DIDIK_ID, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                PesertaDidikPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(PesertaDidikPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            
            $affectedRows += BasePeer::doDelete($criteria, $con);
            PesertaDidikPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given PesertaDidik object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      PesertaDidik $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(PesertaDidikPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(PesertaDidikPeer::TABLE_NAME);

            if (! is_array($cols)) {
                $cols = array($cols);
            }

            foreach ($cols as $colName) {
                if ($tableMap->hasColumn($colName)) {
                    $get = 'get' . $tableMap->getColumn($colName)->getPhpName();
                    $columns[$colName] = $obj->$get();
                }
            }
        } else {

        }

        return BasePeer::doValidate(PesertaDidikPeer::DATABASE_NAME, PesertaDidikPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      string $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return PesertaDidik
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = PesertaDidikPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(PesertaDidikPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(PesertaDidikPeer::DATABASE_NAME);
        $criteria->add(PesertaDidikPeer::PESERTA_DIDIK_ID, $pk);

        $v = PesertaDidikPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return PesertaDidik[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(PesertaDidikPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(PesertaDidikPeer::DATABASE_NAME);
            $criteria->add(PesertaDidikPeer::PESERTA_DIDIK_ID, $pks, Criteria::IN);
            $objs = PesertaDidikPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BasePesertaDidikPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BasePesertaDidikPeer::buildTableMap();

