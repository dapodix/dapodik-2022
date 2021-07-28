<?php

namespace DataDikdas\Model\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use DataDikdas\Model\BentukPendidikanPeer;
use DataDikdas\Model\KebutuhanKhususPeer;
use DataDikdas\Model\MstWilayahPeer;
use DataDikdas\Model\Sekolah;
use DataDikdas\Model\SekolahPeer;
use DataDikdas\Model\StatusKepemilikanPeer;
use DataDikdas\Model\YayasanPeer;
use DataDikdas\Model\map\SekolahTableMap;

/**
 * Base static class for performing query and update operations on the 'sekolah' table.
 *
 * 
 *
 * @package propel.generator.DataDikdas.Model.om
 */
abstract class BaseSekolahPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'pendataan';

    /** the table name for this class */
    const TABLE_NAME = 'sekolah';

    /** the related Propel class for this table */
    const OM_CLASS = 'DataDikdas\\Model\\Sekolah';

    /** the related TableMap class for this table */
    const TM_CLASS = 'SekolahTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 44;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 44;

    /** the column name for the sekolah_id field */
    const SEKOLAH_ID = 'sekolah.sekolah_id';

    /** the column name for the nama field */
    const NAMA = 'sekolah.nama';

    /** the column name for the nama_nomenklatur field */
    const NAMA_NOMENKLATUR = 'sekolah.nama_nomenklatur';

    /** the column name for the nss field */
    const NSS = 'sekolah.nss';

    /** the column name for the npsn field */
    const NPSN = 'sekolah.npsn';

    /** the column name for the bentuk_pendidikan_id field */
    const BENTUK_PENDIDIKAN_ID = 'sekolah.bentuk_pendidikan_id';

    /** the column name for the alamat_jalan field */
    const ALAMAT_JALAN = 'sekolah.alamat_jalan';

    /** the column name for the rt field */
    const RT = 'sekolah.rt';

    /** the column name for the rw field */
    const RW = 'sekolah.rw';

    /** the column name for the nama_dusun field */
    const NAMA_DUSUN = 'sekolah.nama_dusun';

    /** the column name for the desa_kelurahan field */
    const DESA_KELURAHAN = 'sekolah.desa_kelurahan';

    /** the column name for the kode_wilayah field */
    const KODE_WILAYAH = 'sekolah.kode_wilayah';

    /** the column name for the kode_pos field */
    const KODE_POS = 'sekolah.kode_pos';

    /** the column name for the lintang field */
    const LINTANG = 'sekolah.lintang';

    /** the column name for the bujur field */
    const BUJUR = 'sekolah.bujur';

    /** the column name for the nomor_telepon field */
    const NOMOR_TELEPON = 'sekolah.nomor_telepon';

    /** the column name for the nomor_fax field */
    const NOMOR_FAX = 'sekolah.nomor_fax';

    /** the column name for the email field */
    const EMAIL = 'sekolah.email';

    /** the column name for the website field */
    const WEBSITE = 'sekolah.website';

    /** the column name for the kebutuhan_khusus_id field */
    const KEBUTUHAN_KHUSUS_ID = 'sekolah.kebutuhan_khusus_id';

    /** the column name for the status_sekolah field */
    const STATUS_SEKOLAH = 'sekolah.status_sekolah';

    /** the column name for the sk_pendirian_sekolah field */
    const SK_PENDIRIAN_SEKOLAH = 'sekolah.sk_pendirian_sekolah';

    /** the column name for the tanggal_sk_pendirian field */
    const TANGGAL_SK_PENDIRIAN = 'sekolah.tanggal_sk_pendirian';

    /** the column name for the status_kepemilikan_id field */
    const STATUS_KEPEMILIKAN_ID = 'sekolah.status_kepemilikan_id';

    /** the column name for the yayasan_id field */
    const YAYASAN_ID = 'sekolah.yayasan_id';

    /** the column name for the sk_izin_operasional field */
    const SK_IZIN_OPERASIONAL = 'sekolah.sk_izin_operasional';

    /** the column name for the tanggal_sk_izin_operasional field */
    const TANGGAL_SK_IZIN_OPERASIONAL = 'sekolah.tanggal_sk_izin_operasional';

    /** the column name for the no_rekening field */
    const NO_REKENING = 'sekolah.no_rekening';

    /** the column name for the nama_bank field */
    const NAMA_BANK = 'sekolah.nama_bank';

    /** the column name for the cabang_kcp_unit field */
    const CABANG_KCP_UNIT = 'sekolah.cabang_kcp_unit';

    /** the column name for the rekening_atas_nama field */
    const REKENING_ATAS_NAMA = 'sekolah.rekening_atas_nama';

    /** the column name for the mbs field */
    const MBS = 'sekolah.mbs';

    /** the column name for the luas_tanah_milik field */
    const LUAS_TANAH_MILIK = 'sekolah.luas_tanah_milik';

    /** the column name for the luas_tanah_bukan_milik field */
    const LUAS_TANAH_BUKAN_MILIK = 'sekolah.luas_tanah_bukan_milik';

    /** the column name for the kode_registrasi field */
    const KODE_REGISTRASI = 'sekolah.kode_registrasi';

    /** the column name for the npwp field */
    const NPWP = 'sekolah.npwp';

    /** the column name for the nm_wp field */
    const NM_WP = 'sekolah.nm_wp';

    /** the column name for the keaktifan field */
    const KEAKTIFAN = 'sekolah.keaktifan';

    /** the column name for the flag field */
    const FLAG = 'sekolah.flag';

    /** the column name for the create_date field */
    const CREATE_DATE = 'sekolah.create_date';

    /** the column name for the last_update field */
    const LAST_UPDATE = 'sekolah.last_update';

    /** the column name for the soft_delete field */
    const SOFT_DELETE = 'sekolah.soft_delete';

    /** the column name for the last_sync field */
    const LAST_SYNC = 'sekolah.last_sync';

    /** the column name for the updater_id field */
    const UPDATER_ID = 'sekolah.updater_id';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of Sekolah objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array Sekolah[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. SekolahPeer::$fieldNames[SekolahPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('SekolahId', 'Nama', 'NamaNomenklatur', 'Nss', 'Npsn', 'BentukPendidikanId', 'AlamatJalan', 'Rt', 'Rw', 'NamaDusun', 'DesaKelurahan', 'KodeWilayah', 'KodePos', 'Lintang', 'Bujur', 'NomorTelepon', 'NomorFax', 'Email', 'Website', 'KebutuhanKhususId', 'StatusSekolah', 'SkPendirianSekolah', 'TanggalSkPendirian', 'StatusKepemilikanId', 'YayasanId', 'SkIzinOperasional', 'TanggalSkIzinOperasional', 'NoRekening', 'NamaBank', 'CabangKcpUnit', 'RekeningAtasNama', 'Mbs', 'LuasTanahMilik', 'LuasTanahBukanMilik', 'KodeRegistrasi', 'Npwp', 'NmWp', 'Keaktifan', 'Flag', 'CreateDate', 'LastUpdate', 'SoftDelete', 'LastSync', 'UpdaterId', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('sekolahId', 'nama', 'namaNomenklatur', 'nss', 'npsn', 'bentukPendidikanId', 'alamatJalan', 'rt', 'rw', 'namaDusun', 'desaKelurahan', 'kodeWilayah', 'kodePos', 'lintang', 'bujur', 'nomorTelepon', 'nomorFax', 'email', 'website', 'kebutuhanKhususId', 'statusSekolah', 'skPendirianSekolah', 'tanggalSkPendirian', 'statusKepemilikanId', 'yayasanId', 'skIzinOperasional', 'tanggalSkIzinOperasional', 'noRekening', 'namaBank', 'cabangKcpUnit', 'rekeningAtasNama', 'mbs', 'luasTanahMilik', 'luasTanahBukanMilik', 'kodeRegistrasi', 'npwp', 'nmWp', 'keaktifan', 'flag', 'createDate', 'lastUpdate', 'softDelete', 'lastSync', 'updaterId', ),
        BasePeer::TYPE_COLNAME => array (SekolahPeer::SEKOLAH_ID, SekolahPeer::NAMA, SekolahPeer::NAMA_NOMENKLATUR, SekolahPeer::NSS, SekolahPeer::NPSN, SekolahPeer::BENTUK_PENDIDIKAN_ID, SekolahPeer::ALAMAT_JALAN, SekolahPeer::RT, SekolahPeer::RW, SekolahPeer::NAMA_DUSUN, SekolahPeer::DESA_KELURAHAN, SekolahPeer::KODE_WILAYAH, SekolahPeer::KODE_POS, SekolahPeer::LINTANG, SekolahPeer::BUJUR, SekolahPeer::NOMOR_TELEPON, SekolahPeer::NOMOR_FAX, SekolahPeer::EMAIL, SekolahPeer::WEBSITE, SekolahPeer::KEBUTUHAN_KHUSUS_ID, SekolahPeer::STATUS_SEKOLAH, SekolahPeer::SK_PENDIRIAN_SEKOLAH, SekolahPeer::TANGGAL_SK_PENDIRIAN, SekolahPeer::STATUS_KEPEMILIKAN_ID, SekolahPeer::YAYASAN_ID, SekolahPeer::SK_IZIN_OPERASIONAL, SekolahPeer::TANGGAL_SK_IZIN_OPERASIONAL, SekolahPeer::NO_REKENING, SekolahPeer::NAMA_BANK, SekolahPeer::CABANG_KCP_UNIT, SekolahPeer::REKENING_ATAS_NAMA, SekolahPeer::MBS, SekolahPeer::LUAS_TANAH_MILIK, SekolahPeer::LUAS_TANAH_BUKAN_MILIK, SekolahPeer::KODE_REGISTRASI, SekolahPeer::NPWP, SekolahPeer::NM_WP, SekolahPeer::KEAKTIFAN, SekolahPeer::FLAG, SekolahPeer::CREATE_DATE, SekolahPeer::LAST_UPDATE, SekolahPeer::SOFT_DELETE, SekolahPeer::LAST_SYNC, SekolahPeer::UPDATER_ID, ),
        BasePeer::TYPE_RAW_COLNAME => array ('SEKOLAH_ID', 'NAMA', 'NAMA_NOMENKLATUR', 'NSS', 'NPSN', 'BENTUK_PENDIDIKAN_ID', 'ALAMAT_JALAN', 'RT', 'RW', 'NAMA_DUSUN', 'DESA_KELURAHAN', 'KODE_WILAYAH', 'KODE_POS', 'LINTANG', 'BUJUR', 'NOMOR_TELEPON', 'NOMOR_FAX', 'EMAIL', 'WEBSITE', 'KEBUTUHAN_KHUSUS_ID', 'STATUS_SEKOLAH', 'SK_PENDIRIAN_SEKOLAH', 'TANGGAL_SK_PENDIRIAN', 'STATUS_KEPEMILIKAN_ID', 'YAYASAN_ID', 'SK_IZIN_OPERASIONAL', 'TANGGAL_SK_IZIN_OPERASIONAL', 'NO_REKENING', 'NAMA_BANK', 'CABANG_KCP_UNIT', 'REKENING_ATAS_NAMA', 'MBS', 'LUAS_TANAH_MILIK', 'LUAS_TANAH_BUKAN_MILIK', 'KODE_REGISTRASI', 'NPWP', 'NM_WP', 'KEAKTIFAN', 'FLAG', 'CREATE_DATE', 'LAST_UPDATE', 'SOFT_DELETE', 'LAST_SYNC', 'UPDATER_ID', ),
        BasePeer::TYPE_FIELDNAME => array ('sekolah_id', 'nama', 'nama_nomenklatur', 'nss', 'npsn', 'bentuk_pendidikan_id', 'alamat_jalan', 'rt', 'rw', 'nama_dusun', 'desa_kelurahan', 'kode_wilayah', 'kode_pos', 'lintang', 'bujur', 'nomor_telepon', 'nomor_fax', 'email', 'website', 'kebutuhan_khusus_id', 'status_sekolah', 'sk_pendirian_sekolah', 'tanggal_sk_pendirian', 'status_kepemilikan_id', 'yayasan_id', 'sk_izin_operasional', 'tanggal_sk_izin_operasional', 'no_rekening', 'nama_bank', 'cabang_kcp_unit', 'rekening_atas_nama', 'mbs', 'luas_tanah_milik', 'luas_tanah_bukan_milik', 'kode_registrasi', 'npwp', 'nm_wp', 'keaktifan', 'flag', 'create_date', 'last_update', 'soft_delete', 'last_sync', 'updater_id', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. SekolahPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('SekolahId' => 0, 'Nama' => 1, 'NamaNomenklatur' => 2, 'Nss' => 3, 'Npsn' => 4, 'BentukPendidikanId' => 5, 'AlamatJalan' => 6, 'Rt' => 7, 'Rw' => 8, 'NamaDusun' => 9, 'DesaKelurahan' => 10, 'KodeWilayah' => 11, 'KodePos' => 12, 'Lintang' => 13, 'Bujur' => 14, 'NomorTelepon' => 15, 'NomorFax' => 16, 'Email' => 17, 'Website' => 18, 'KebutuhanKhususId' => 19, 'StatusSekolah' => 20, 'SkPendirianSekolah' => 21, 'TanggalSkPendirian' => 22, 'StatusKepemilikanId' => 23, 'YayasanId' => 24, 'SkIzinOperasional' => 25, 'TanggalSkIzinOperasional' => 26, 'NoRekening' => 27, 'NamaBank' => 28, 'CabangKcpUnit' => 29, 'RekeningAtasNama' => 30, 'Mbs' => 31, 'LuasTanahMilik' => 32, 'LuasTanahBukanMilik' => 33, 'KodeRegistrasi' => 34, 'Npwp' => 35, 'NmWp' => 36, 'Keaktifan' => 37, 'Flag' => 38, 'CreateDate' => 39, 'LastUpdate' => 40, 'SoftDelete' => 41, 'LastSync' => 42, 'UpdaterId' => 43, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('sekolahId' => 0, 'nama' => 1, 'namaNomenklatur' => 2, 'nss' => 3, 'npsn' => 4, 'bentukPendidikanId' => 5, 'alamatJalan' => 6, 'rt' => 7, 'rw' => 8, 'namaDusun' => 9, 'desaKelurahan' => 10, 'kodeWilayah' => 11, 'kodePos' => 12, 'lintang' => 13, 'bujur' => 14, 'nomorTelepon' => 15, 'nomorFax' => 16, 'email' => 17, 'website' => 18, 'kebutuhanKhususId' => 19, 'statusSekolah' => 20, 'skPendirianSekolah' => 21, 'tanggalSkPendirian' => 22, 'statusKepemilikanId' => 23, 'yayasanId' => 24, 'skIzinOperasional' => 25, 'tanggalSkIzinOperasional' => 26, 'noRekening' => 27, 'namaBank' => 28, 'cabangKcpUnit' => 29, 'rekeningAtasNama' => 30, 'mbs' => 31, 'luasTanahMilik' => 32, 'luasTanahBukanMilik' => 33, 'kodeRegistrasi' => 34, 'npwp' => 35, 'nmWp' => 36, 'keaktifan' => 37, 'flag' => 38, 'createDate' => 39, 'lastUpdate' => 40, 'softDelete' => 41, 'lastSync' => 42, 'updaterId' => 43, ),
        BasePeer::TYPE_COLNAME => array (SekolahPeer::SEKOLAH_ID => 0, SekolahPeer::NAMA => 1, SekolahPeer::NAMA_NOMENKLATUR => 2, SekolahPeer::NSS => 3, SekolahPeer::NPSN => 4, SekolahPeer::BENTUK_PENDIDIKAN_ID => 5, SekolahPeer::ALAMAT_JALAN => 6, SekolahPeer::RT => 7, SekolahPeer::RW => 8, SekolahPeer::NAMA_DUSUN => 9, SekolahPeer::DESA_KELURAHAN => 10, SekolahPeer::KODE_WILAYAH => 11, SekolahPeer::KODE_POS => 12, SekolahPeer::LINTANG => 13, SekolahPeer::BUJUR => 14, SekolahPeer::NOMOR_TELEPON => 15, SekolahPeer::NOMOR_FAX => 16, SekolahPeer::EMAIL => 17, SekolahPeer::WEBSITE => 18, SekolahPeer::KEBUTUHAN_KHUSUS_ID => 19, SekolahPeer::STATUS_SEKOLAH => 20, SekolahPeer::SK_PENDIRIAN_SEKOLAH => 21, SekolahPeer::TANGGAL_SK_PENDIRIAN => 22, SekolahPeer::STATUS_KEPEMILIKAN_ID => 23, SekolahPeer::YAYASAN_ID => 24, SekolahPeer::SK_IZIN_OPERASIONAL => 25, SekolahPeer::TANGGAL_SK_IZIN_OPERASIONAL => 26, SekolahPeer::NO_REKENING => 27, SekolahPeer::NAMA_BANK => 28, SekolahPeer::CABANG_KCP_UNIT => 29, SekolahPeer::REKENING_ATAS_NAMA => 30, SekolahPeer::MBS => 31, SekolahPeer::LUAS_TANAH_MILIK => 32, SekolahPeer::LUAS_TANAH_BUKAN_MILIK => 33, SekolahPeer::KODE_REGISTRASI => 34, SekolahPeer::NPWP => 35, SekolahPeer::NM_WP => 36, SekolahPeer::KEAKTIFAN => 37, SekolahPeer::FLAG => 38, SekolahPeer::CREATE_DATE => 39, SekolahPeer::LAST_UPDATE => 40, SekolahPeer::SOFT_DELETE => 41, SekolahPeer::LAST_SYNC => 42, SekolahPeer::UPDATER_ID => 43, ),
        BasePeer::TYPE_RAW_COLNAME => array ('SEKOLAH_ID' => 0, 'NAMA' => 1, 'NAMA_NOMENKLATUR' => 2, 'NSS' => 3, 'NPSN' => 4, 'BENTUK_PENDIDIKAN_ID' => 5, 'ALAMAT_JALAN' => 6, 'RT' => 7, 'RW' => 8, 'NAMA_DUSUN' => 9, 'DESA_KELURAHAN' => 10, 'KODE_WILAYAH' => 11, 'KODE_POS' => 12, 'LINTANG' => 13, 'BUJUR' => 14, 'NOMOR_TELEPON' => 15, 'NOMOR_FAX' => 16, 'EMAIL' => 17, 'WEBSITE' => 18, 'KEBUTUHAN_KHUSUS_ID' => 19, 'STATUS_SEKOLAH' => 20, 'SK_PENDIRIAN_SEKOLAH' => 21, 'TANGGAL_SK_PENDIRIAN' => 22, 'STATUS_KEPEMILIKAN_ID' => 23, 'YAYASAN_ID' => 24, 'SK_IZIN_OPERASIONAL' => 25, 'TANGGAL_SK_IZIN_OPERASIONAL' => 26, 'NO_REKENING' => 27, 'NAMA_BANK' => 28, 'CABANG_KCP_UNIT' => 29, 'REKENING_ATAS_NAMA' => 30, 'MBS' => 31, 'LUAS_TANAH_MILIK' => 32, 'LUAS_TANAH_BUKAN_MILIK' => 33, 'KODE_REGISTRASI' => 34, 'NPWP' => 35, 'NM_WP' => 36, 'KEAKTIFAN' => 37, 'FLAG' => 38, 'CREATE_DATE' => 39, 'LAST_UPDATE' => 40, 'SOFT_DELETE' => 41, 'LAST_SYNC' => 42, 'UPDATER_ID' => 43, ),
        BasePeer::TYPE_FIELDNAME => array ('sekolah_id' => 0, 'nama' => 1, 'nama_nomenklatur' => 2, 'nss' => 3, 'npsn' => 4, 'bentuk_pendidikan_id' => 5, 'alamat_jalan' => 6, 'rt' => 7, 'rw' => 8, 'nama_dusun' => 9, 'desa_kelurahan' => 10, 'kode_wilayah' => 11, 'kode_pos' => 12, 'lintang' => 13, 'bujur' => 14, 'nomor_telepon' => 15, 'nomor_fax' => 16, 'email' => 17, 'website' => 18, 'kebutuhan_khusus_id' => 19, 'status_sekolah' => 20, 'sk_pendirian_sekolah' => 21, 'tanggal_sk_pendirian' => 22, 'status_kepemilikan_id' => 23, 'yayasan_id' => 24, 'sk_izin_operasional' => 25, 'tanggal_sk_izin_operasional' => 26, 'no_rekening' => 27, 'nama_bank' => 28, 'cabang_kcp_unit' => 29, 'rekening_atas_nama' => 30, 'mbs' => 31, 'luas_tanah_milik' => 32, 'luas_tanah_bukan_milik' => 33, 'kode_registrasi' => 34, 'npwp' => 35, 'nm_wp' => 36, 'keaktifan' => 37, 'flag' => 38, 'create_date' => 39, 'last_update' => 40, 'soft_delete' => 41, 'last_sync' => 42, 'updater_id' => 43, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, )
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
        $toNames = SekolahPeer::getFieldNames($toType);
        $key = isset(SekolahPeer::$fieldKeys[$fromType][$name]) ? SekolahPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(SekolahPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, SekolahPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return SekolahPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. SekolahPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(SekolahPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(SekolahPeer::SEKOLAH_ID);
            $criteria->addSelectColumn(SekolahPeer::NAMA);
            $criteria->addSelectColumn(SekolahPeer::NAMA_NOMENKLATUR);
            $criteria->addSelectColumn(SekolahPeer::NSS);
            $criteria->addSelectColumn(SekolahPeer::NPSN);
            $criteria->addSelectColumn(SekolahPeer::BENTUK_PENDIDIKAN_ID);
            $criteria->addSelectColumn(SekolahPeer::ALAMAT_JALAN);
            $criteria->addSelectColumn(SekolahPeer::RT);
            $criteria->addSelectColumn(SekolahPeer::RW);
            $criteria->addSelectColumn(SekolahPeer::NAMA_DUSUN);
            $criteria->addSelectColumn(SekolahPeer::DESA_KELURAHAN);
            $criteria->addSelectColumn(SekolahPeer::KODE_WILAYAH);
            $criteria->addSelectColumn(SekolahPeer::KODE_POS);
            $criteria->addSelectColumn(SekolahPeer::LINTANG);
            $criteria->addSelectColumn(SekolahPeer::BUJUR);
            $criteria->addSelectColumn(SekolahPeer::NOMOR_TELEPON);
            $criteria->addSelectColumn(SekolahPeer::NOMOR_FAX);
            $criteria->addSelectColumn(SekolahPeer::EMAIL);
            $criteria->addSelectColumn(SekolahPeer::WEBSITE);
            $criteria->addSelectColumn(SekolahPeer::KEBUTUHAN_KHUSUS_ID);
            $criteria->addSelectColumn(SekolahPeer::STATUS_SEKOLAH);
            $criteria->addSelectColumn(SekolahPeer::SK_PENDIRIAN_SEKOLAH);
            $criteria->addSelectColumn(SekolahPeer::TANGGAL_SK_PENDIRIAN);
            $criteria->addSelectColumn(SekolahPeer::STATUS_KEPEMILIKAN_ID);
            $criteria->addSelectColumn(SekolahPeer::YAYASAN_ID);
            $criteria->addSelectColumn(SekolahPeer::SK_IZIN_OPERASIONAL);
            $criteria->addSelectColumn(SekolahPeer::TANGGAL_SK_IZIN_OPERASIONAL);
            $criteria->addSelectColumn(SekolahPeer::NO_REKENING);
            $criteria->addSelectColumn(SekolahPeer::NAMA_BANK);
            $criteria->addSelectColumn(SekolahPeer::CABANG_KCP_UNIT);
            $criteria->addSelectColumn(SekolahPeer::REKENING_ATAS_NAMA);
            $criteria->addSelectColumn(SekolahPeer::MBS);
            $criteria->addSelectColumn(SekolahPeer::LUAS_TANAH_MILIK);
            $criteria->addSelectColumn(SekolahPeer::LUAS_TANAH_BUKAN_MILIK);
            $criteria->addSelectColumn(SekolahPeer::KODE_REGISTRASI);
            $criteria->addSelectColumn(SekolahPeer::NPWP);
            $criteria->addSelectColumn(SekolahPeer::NM_WP);
            $criteria->addSelectColumn(SekolahPeer::KEAKTIFAN);
            $criteria->addSelectColumn(SekolahPeer::FLAG);
            $criteria->addSelectColumn(SekolahPeer::CREATE_DATE);
            $criteria->addSelectColumn(SekolahPeer::LAST_UPDATE);
            $criteria->addSelectColumn(SekolahPeer::SOFT_DELETE);
            $criteria->addSelectColumn(SekolahPeer::LAST_SYNC);
            $criteria->addSelectColumn(SekolahPeer::UPDATER_ID);
        } else {
            $criteria->addSelectColumn($alias . '.sekolah_id');
            $criteria->addSelectColumn($alias . '.nama');
            $criteria->addSelectColumn($alias . '.nama_nomenklatur');
            $criteria->addSelectColumn($alias . '.nss');
            $criteria->addSelectColumn($alias . '.npsn');
            $criteria->addSelectColumn($alias . '.bentuk_pendidikan_id');
            $criteria->addSelectColumn($alias . '.alamat_jalan');
            $criteria->addSelectColumn($alias . '.rt');
            $criteria->addSelectColumn($alias . '.rw');
            $criteria->addSelectColumn($alias . '.nama_dusun');
            $criteria->addSelectColumn($alias . '.desa_kelurahan');
            $criteria->addSelectColumn($alias . '.kode_wilayah');
            $criteria->addSelectColumn($alias . '.kode_pos');
            $criteria->addSelectColumn($alias . '.lintang');
            $criteria->addSelectColumn($alias . '.bujur');
            $criteria->addSelectColumn($alias . '.nomor_telepon');
            $criteria->addSelectColumn($alias . '.nomor_fax');
            $criteria->addSelectColumn($alias . '.email');
            $criteria->addSelectColumn($alias . '.website');
            $criteria->addSelectColumn($alias . '.kebutuhan_khusus_id');
            $criteria->addSelectColumn($alias . '.status_sekolah');
            $criteria->addSelectColumn($alias . '.sk_pendirian_sekolah');
            $criteria->addSelectColumn($alias . '.tanggal_sk_pendirian');
            $criteria->addSelectColumn($alias . '.status_kepemilikan_id');
            $criteria->addSelectColumn($alias . '.yayasan_id');
            $criteria->addSelectColumn($alias . '.sk_izin_operasional');
            $criteria->addSelectColumn($alias . '.tanggal_sk_izin_operasional');
            $criteria->addSelectColumn($alias . '.no_rekening');
            $criteria->addSelectColumn($alias . '.nama_bank');
            $criteria->addSelectColumn($alias . '.cabang_kcp_unit');
            $criteria->addSelectColumn($alias . '.rekening_atas_nama');
            $criteria->addSelectColumn($alias . '.mbs');
            $criteria->addSelectColumn($alias . '.luas_tanah_milik');
            $criteria->addSelectColumn($alias . '.luas_tanah_bukan_milik');
            $criteria->addSelectColumn($alias . '.kode_registrasi');
            $criteria->addSelectColumn($alias . '.npwp');
            $criteria->addSelectColumn($alias . '.nm_wp');
            $criteria->addSelectColumn($alias . '.keaktifan');
            $criteria->addSelectColumn($alias . '.flag');
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
        $criteria->setPrimaryTableName(SekolahPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            SekolahPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(SekolahPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(SekolahPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Sekolah
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = SekolahPeer::doSelect($critcopy, $con);
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
        return SekolahPeer::populateObjects(SekolahPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(SekolahPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            SekolahPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(SekolahPeer::DATABASE_NAME);

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
     * @param      Sekolah $obj A Sekolah object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getSekolahId();
            } // if key === null
            SekolahPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A Sekolah object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof Sekolah) {
                $key = (string) $value->getSekolahId();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Sekolah object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(SekolahPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   Sekolah Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(SekolahPeer::$instances[$key])) {
                return SekolahPeer::$instances[$key];
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
        foreach (SekolahPeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        SekolahPeer::$instances = array();
    }
    
    /**
     * Method to invalidate the instance pool of all tables related to sekolah
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
        $cls = SekolahPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = SekolahPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = SekolahPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                SekolahPeer::addInstanceToPool($obj, $key);
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
     * @return array (Sekolah object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = SekolahPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = SekolahPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + SekolahPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = SekolahPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            SekolahPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
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
        $criteria->setPrimaryTableName(SekolahPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            SekolahPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(SekolahPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(SekolahPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(SekolahPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related KebutuhanKhusus table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinKebutuhanKhusus(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(SekolahPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            SekolahPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(SekolahPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(SekolahPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(SekolahPeer::KEBUTUHAN_KHUSUS_ID, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related BentukPendidikan table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinBentukPendidikan(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(SekolahPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            SekolahPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(SekolahPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(SekolahPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(SekolahPeer::BENTUK_PENDIDIKAN_ID, BentukPendidikanPeer::BENTUK_PENDIDIKAN_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related Yayasan table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinYayasan(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(SekolahPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            SekolahPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(SekolahPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(SekolahPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(SekolahPeer::YAYASAN_ID, YayasanPeer::YAYASAN_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related StatusKepemilikan table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinStatusKepemilikan(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(SekolahPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            SekolahPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(SekolahPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(SekolahPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(SekolahPeer::STATUS_KEPEMILIKAN_ID, StatusKepemilikanPeer::STATUS_KEPEMILIKAN_ID, $join_behavior);

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
     * Selects a collection of Sekolah objects pre-filled with their MstWilayah objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Sekolah objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinMstWilayah(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(SekolahPeer::DATABASE_NAME);
        }

        SekolahPeer::addSelectColumns($criteria);
        $startcol = SekolahPeer::NUM_HYDRATE_COLUMNS;
        MstWilayahPeer::addSelectColumns($criteria);

        $criteria->addJoin(SekolahPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = SekolahPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = SekolahPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = SekolahPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                SekolahPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Sekolah) to $obj2 (MstWilayah)
                $obj2->addSekolah($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Sekolah objects pre-filled with their KebutuhanKhusus objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Sekolah objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinKebutuhanKhusus(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(SekolahPeer::DATABASE_NAME);
        }

        SekolahPeer::addSelectColumns($criteria);
        $startcol = SekolahPeer::NUM_HYDRATE_COLUMNS;
        KebutuhanKhususPeer::addSelectColumns($criteria);

        $criteria->addJoin(SekolahPeer::KEBUTUHAN_KHUSUS_ID, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = SekolahPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = SekolahPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = SekolahPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                SekolahPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Sekolah) to $obj2 (KebutuhanKhusus)
                $obj2->addSekolah($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Sekolah objects pre-filled with their BentukPendidikan objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Sekolah objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinBentukPendidikan(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(SekolahPeer::DATABASE_NAME);
        }

        SekolahPeer::addSelectColumns($criteria);
        $startcol = SekolahPeer::NUM_HYDRATE_COLUMNS;
        BentukPendidikanPeer::addSelectColumns($criteria);

        $criteria->addJoin(SekolahPeer::BENTUK_PENDIDIKAN_ID, BentukPendidikanPeer::BENTUK_PENDIDIKAN_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = SekolahPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = SekolahPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = SekolahPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                SekolahPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = BentukPendidikanPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = BentukPendidikanPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = BentukPendidikanPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    BentukPendidikanPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Sekolah) to $obj2 (BentukPendidikan)
                $obj2->addSekolah($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Sekolah objects pre-filled with their Yayasan objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Sekolah objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinYayasan(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(SekolahPeer::DATABASE_NAME);
        }

        SekolahPeer::addSelectColumns($criteria);
        $startcol = SekolahPeer::NUM_HYDRATE_COLUMNS;
        YayasanPeer::addSelectColumns($criteria);

        $criteria->addJoin(SekolahPeer::YAYASAN_ID, YayasanPeer::YAYASAN_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = SekolahPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = SekolahPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = SekolahPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                SekolahPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = YayasanPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = YayasanPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = YayasanPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    YayasanPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Sekolah) to $obj2 (Yayasan)
                $obj2->addSekolah($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Sekolah objects pre-filled with their StatusKepemilikan objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Sekolah objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinStatusKepemilikan(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(SekolahPeer::DATABASE_NAME);
        }

        SekolahPeer::addSelectColumns($criteria);
        $startcol = SekolahPeer::NUM_HYDRATE_COLUMNS;
        StatusKepemilikanPeer::addSelectColumns($criteria);

        $criteria->addJoin(SekolahPeer::STATUS_KEPEMILIKAN_ID, StatusKepemilikanPeer::STATUS_KEPEMILIKAN_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = SekolahPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = SekolahPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = SekolahPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                SekolahPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = StatusKepemilikanPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = StatusKepemilikanPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = StatusKepemilikanPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    StatusKepemilikanPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Sekolah) to $obj2 (StatusKepemilikan)
                $obj2->addSekolah($obj1);

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
        $criteria->setPrimaryTableName(SekolahPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            SekolahPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(SekolahPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(SekolahPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(SekolahPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

        $criteria->addJoin(SekolahPeer::KEBUTUHAN_KHUSUS_ID, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(SekolahPeer::BENTUK_PENDIDIKAN_ID, BentukPendidikanPeer::BENTUK_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(SekolahPeer::YAYASAN_ID, YayasanPeer::YAYASAN_ID, $join_behavior);

        $criteria->addJoin(SekolahPeer::STATUS_KEPEMILIKAN_ID, StatusKepemilikanPeer::STATUS_KEPEMILIKAN_ID, $join_behavior);

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
     * Selects a collection of Sekolah objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Sekolah objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(SekolahPeer::DATABASE_NAME);
        }

        SekolahPeer::addSelectColumns($criteria);
        $startcol2 = SekolahPeer::NUM_HYDRATE_COLUMNS;

        MstWilayahPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + MstWilayahPeer::NUM_HYDRATE_COLUMNS;

        KebutuhanKhususPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + KebutuhanKhususPeer::NUM_HYDRATE_COLUMNS;

        BentukPendidikanPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + BentukPendidikanPeer::NUM_HYDRATE_COLUMNS;

        YayasanPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + YayasanPeer::NUM_HYDRATE_COLUMNS;

        StatusKepemilikanPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + StatusKepemilikanPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(SekolahPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

        $criteria->addJoin(SekolahPeer::KEBUTUHAN_KHUSUS_ID, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(SekolahPeer::BENTUK_PENDIDIKAN_ID, BentukPendidikanPeer::BENTUK_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(SekolahPeer::YAYASAN_ID, YayasanPeer::YAYASAN_ID, $join_behavior);

        $criteria->addJoin(SekolahPeer::STATUS_KEPEMILIKAN_ID, StatusKepemilikanPeer::STATUS_KEPEMILIKAN_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = SekolahPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = SekolahPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = SekolahPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                SekolahPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

            // Add objects for joined MstWilayah rows

            $key2 = MstWilayahPeer::getPrimaryKeyHashFromRow($row, $startcol2);
            if ($key2 !== null) {
                $obj2 = MstWilayahPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = MstWilayahPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    MstWilayahPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 loaded

                // Add the $obj1 (Sekolah) to the collection in $obj2 (MstWilayah)
                $obj2->addSekolah($obj1);
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

                // Add the $obj1 (Sekolah) to the collection in $obj3 (KebutuhanKhusus)
                $obj3->addSekolah($obj1);
            } // if joined row not null

            // Add objects for joined BentukPendidikan rows

            $key4 = BentukPendidikanPeer::getPrimaryKeyHashFromRow($row, $startcol4);
            if ($key4 !== null) {
                $obj4 = BentukPendidikanPeer::getInstanceFromPool($key4);
                if (!$obj4) {

                    $cls = BentukPendidikanPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    BentukPendidikanPeer::addInstanceToPool($obj4, $key4);
                } // if obj4 loaded

                // Add the $obj1 (Sekolah) to the collection in $obj4 (BentukPendidikan)
                $obj4->addSekolah($obj1);
            } // if joined row not null

            // Add objects for joined Yayasan rows

            $key5 = YayasanPeer::getPrimaryKeyHashFromRow($row, $startcol5);
            if ($key5 !== null) {
                $obj5 = YayasanPeer::getInstanceFromPool($key5);
                if (!$obj5) {

                    $cls = YayasanPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    YayasanPeer::addInstanceToPool($obj5, $key5);
                } // if obj5 loaded

                // Add the $obj1 (Sekolah) to the collection in $obj5 (Yayasan)
                $obj5->addSekolah($obj1);
            } // if joined row not null

            // Add objects for joined StatusKepemilikan rows

            $key6 = StatusKepemilikanPeer::getPrimaryKeyHashFromRow($row, $startcol6);
            if ($key6 !== null) {
                $obj6 = StatusKepemilikanPeer::getInstanceFromPool($key6);
                if (!$obj6) {

                    $cls = StatusKepemilikanPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    StatusKepemilikanPeer::addInstanceToPool($obj6, $key6);
                } // if obj6 loaded

                // Add the $obj1 (Sekolah) to the collection in $obj6 (StatusKepemilikan)
                $obj6->addSekolah($obj1);
            } // if joined row not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
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
        $criteria->setPrimaryTableName(SekolahPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            SekolahPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(SekolahPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(SekolahPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(SekolahPeer::KEBUTUHAN_KHUSUS_ID, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(SekolahPeer::BENTUK_PENDIDIKAN_ID, BentukPendidikanPeer::BENTUK_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(SekolahPeer::YAYASAN_ID, YayasanPeer::YAYASAN_ID, $join_behavior);

        $criteria->addJoin(SekolahPeer::STATUS_KEPEMILIKAN_ID, StatusKepemilikanPeer::STATUS_KEPEMILIKAN_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related KebutuhanKhusus table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptKebutuhanKhusus(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(SekolahPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            SekolahPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(SekolahPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(SekolahPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(SekolahPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

        $criteria->addJoin(SekolahPeer::BENTUK_PENDIDIKAN_ID, BentukPendidikanPeer::BENTUK_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(SekolahPeer::YAYASAN_ID, YayasanPeer::YAYASAN_ID, $join_behavior);

        $criteria->addJoin(SekolahPeer::STATUS_KEPEMILIKAN_ID, StatusKepemilikanPeer::STATUS_KEPEMILIKAN_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related BentukPendidikan table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptBentukPendidikan(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(SekolahPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            SekolahPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(SekolahPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(SekolahPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(SekolahPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

        $criteria->addJoin(SekolahPeer::KEBUTUHAN_KHUSUS_ID, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(SekolahPeer::YAYASAN_ID, YayasanPeer::YAYASAN_ID, $join_behavior);

        $criteria->addJoin(SekolahPeer::STATUS_KEPEMILIKAN_ID, StatusKepemilikanPeer::STATUS_KEPEMILIKAN_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related Yayasan table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptYayasan(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(SekolahPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            SekolahPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(SekolahPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(SekolahPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(SekolahPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

        $criteria->addJoin(SekolahPeer::KEBUTUHAN_KHUSUS_ID, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(SekolahPeer::BENTUK_PENDIDIKAN_ID, BentukPendidikanPeer::BENTUK_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(SekolahPeer::STATUS_KEPEMILIKAN_ID, StatusKepemilikanPeer::STATUS_KEPEMILIKAN_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related StatusKepemilikan table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptStatusKepemilikan(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(SekolahPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            SekolahPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(SekolahPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(SekolahPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(SekolahPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

        $criteria->addJoin(SekolahPeer::KEBUTUHAN_KHUSUS_ID, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(SekolahPeer::BENTUK_PENDIDIKAN_ID, BentukPendidikanPeer::BENTUK_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(SekolahPeer::YAYASAN_ID, YayasanPeer::YAYASAN_ID, $join_behavior);

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
     * Selects a collection of Sekolah objects pre-filled with all related objects except MstWilayah.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Sekolah objects.
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
            $criteria->setDbName(SekolahPeer::DATABASE_NAME);
        }

        SekolahPeer::addSelectColumns($criteria);
        $startcol2 = SekolahPeer::NUM_HYDRATE_COLUMNS;

        KebutuhanKhususPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + KebutuhanKhususPeer::NUM_HYDRATE_COLUMNS;

        BentukPendidikanPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + BentukPendidikanPeer::NUM_HYDRATE_COLUMNS;

        YayasanPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + YayasanPeer::NUM_HYDRATE_COLUMNS;

        StatusKepemilikanPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + StatusKepemilikanPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(SekolahPeer::KEBUTUHAN_KHUSUS_ID, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(SekolahPeer::BENTUK_PENDIDIKAN_ID, BentukPendidikanPeer::BENTUK_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(SekolahPeer::YAYASAN_ID, YayasanPeer::YAYASAN_ID, $join_behavior);

        $criteria->addJoin(SekolahPeer::STATUS_KEPEMILIKAN_ID, StatusKepemilikanPeer::STATUS_KEPEMILIKAN_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = SekolahPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = SekolahPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = SekolahPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                SekolahPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Sekolah) to the collection in $obj2 (KebutuhanKhusus)
                $obj2->addSekolah($obj1);

            } // if joined row is not null

                // Add objects for joined BentukPendidikan rows

                $key3 = BentukPendidikanPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = BentukPendidikanPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = BentukPendidikanPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    BentukPendidikanPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Sekolah) to the collection in $obj3 (BentukPendidikan)
                $obj3->addSekolah($obj1);

            } // if joined row is not null

                // Add objects for joined Yayasan rows

                $key4 = YayasanPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = YayasanPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = YayasanPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    YayasanPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (Sekolah) to the collection in $obj4 (Yayasan)
                $obj4->addSekolah($obj1);

            } // if joined row is not null

                // Add objects for joined StatusKepemilikan rows

                $key5 = StatusKepemilikanPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = StatusKepemilikanPeer::getInstanceFromPool($key5);
                    if (!$obj5) {
    
                        $cls = StatusKepemilikanPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    StatusKepemilikanPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (Sekolah) to the collection in $obj5 (StatusKepemilikan)
                $obj5->addSekolah($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Sekolah objects pre-filled with all related objects except KebutuhanKhusus.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Sekolah objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptKebutuhanKhusus(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(SekolahPeer::DATABASE_NAME);
        }

        SekolahPeer::addSelectColumns($criteria);
        $startcol2 = SekolahPeer::NUM_HYDRATE_COLUMNS;

        MstWilayahPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + MstWilayahPeer::NUM_HYDRATE_COLUMNS;

        BentukPendidikanPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + BentukPendidikanPeer::NUM_HYDRATE_COLUMNS;

        YayasanPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + YayasanPeer::NUM_HYDRATE_COLUMNS;

        StatusKepemilikanPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + StatusKepemilikanPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(SekolahPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

        $criteria->addJoin(SekolahPeer::BENTUK_PENDIDIKAN_ID, BentukPendidikanPeer::BENTUK_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(SekolahPeer::YAYASAN_ID, YayasanPeer::YAYASAN_ID, $join_behavior);

        $criteria->addJoin(SekolahPeer::STATUS_KEPEMILIKAN_ID, StatusKepemilikanPeer::STATUS_KEPEMILIKAN_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = SekolahPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = SekolahPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = SekolahPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                SekolahPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined MstWilayah rows

                $key2 = MstWilayahPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = MstWilayahPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = MstWilayahPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    MstWilayahPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Sekolah) to the collection in $obj2 (MstWilayah)
                $obj2->addSekolah($obj1);

            } // if joined row is not null

                // Add objects for joined BentukPendidikan rows

                $key3 = BentukPendidikanPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = BentukPendidikanPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = BentukPendidikanPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    BentukPendidikanPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Sekolah) to the collection in $obj3 (BentukPendidikan)
                $obj3->addSekolah($obj1);

            } // if joined row is not null

                // Add objects for joined Yayasan rows

                $key4 = YayasanPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = YayasanPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = YayasanPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    YayasanPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (Sekolah) to the collection in $obj4 (Yayasan)
                $obj4->addSekolah($obj1);

            } // if joined row is not null

                // Add objects for joined StatusKepemilikan rows

                $key5 = StatusKepemilikanPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = StatusKepemilikanPeer::getInstanceFromPool($key5);
                    if (!$obj5) {
    
                        $cls = StatusKepemilikanPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    StatusKepemilikanPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (Sekolah) to the collection in $obj5 (StatusKepemilikan)
                $obj5->addSekolah($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Sekolah objects pre-filled with all related objects except BentukPendidikan.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Sekolah objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptBentukPendidikan(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(SekolahPeer::DATABASE_NAME);
        }

        SekolahPeer::addSelectColumns($criteria);
        $startcol2 = SekolahPeer::NUM_HYDRATE_COLUMNS;

        MstWilayahPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + MstWilayahPeer::NUM_HYDRATE_COLUMNS;

        KebutuhanKhususPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + KebutuhanKhususPeer::NUM_HYDRATE_COLUMNS;

        YayasanPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + YayasanPeer::NUM_HYDRATE_COLUMNS;

        StatusKepemilikanPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + StatusKepemilikanPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(SekolahPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

        $criteria->addJoin(SekolahPeer::KEBUTUHAN_KHUSUS_ID, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(SekolahPeer::YAYASAN_ID, YayasanPeer::YAYASAN_ID, $join_behavior);

        $criteria->addJoin(SekolahPeer::STATUS_KEPEMILIKAN_ID, StatusKepemilikanPeer::STATUS_KEPEMILIKAN_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = SekolahPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = SekolahPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = SekolahPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                SekolahPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined MstWilayah rows

                $key2 = MstWilayahPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = MstWilayahPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = MstWilayahPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    MstWilayahPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Sekolah) to the collection in $obj2 (MstWilayah)
                $obj2->addSekolah($obj1);

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

                // Add the $obj1 (Sekolah) to the collection in $obj3 (KebutuhanKhusus)
                $obj3->addSekolah($obj1);

            } // if joined row is not null

                // Add objects for joined Yayasan rows

                $key4 = YayasanPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = YayasanPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = YayasanPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    YayasanPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (Sekolah) to the collection in $obj4 (Yayasan)
                $obj4->addSekolah($obj1);

            } // if joined row is not null

                // Add objects for joined StatusKepemilikan rows

                $key5 = StatusKepemilikanPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = StatusKepemilikanPeer::getInstanceFromPool($key5);
                    if (!$obj5) {
    
                        $cls = StatusKepemilikanPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    StatusKepemilikanPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (Sekolah) to the collection in $obj5 (StatusKepemilikan)
                $obj5->addSekolah($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Sekolah objects pre-filled with all related objects except Yayasan.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Sekolah objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptYayasan(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(SekolahPeer::DATABASE_NAME);
        }

        SekolahPeer::addSelectColumns($criteria);
        $startcol2 = SekolahPeer::NUM_HYDRATE_COLUMNS;

        MstWilayahPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + MstWilayahPeer::NUM_HYDRATE_COLUMNS;

        KebutuhanKhususPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + KebutuhanKhususPeer::NUM_HYDRATE_COLUMNS;

        BentukPendidikanPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + BentukPendidikanPeer::NUM_HYDRATE_COLUMNS;

        StatusKepemilikanPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + StatusKepemilikanPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(SekolahPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

        $criteria->addJoin(SekolahPeer::KEBUTUHAN_KHUSUS_ID, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(SekolahPeer::BENTUK_PENDIDIKAN_ID, BentukPendidikanPeer::BENTUK_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(SekolahPeer::STATUS_KEPEMILIKAN_ID, StatusKepemilikanPeer::STATUS_KEPEMILIKAN_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = SekolahPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = SekolahPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = SekolahPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                SekolahPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined MstWilayah rows

                $key2 = MstWilayahPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = MstWilayahPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = MstWilayahPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    MstWilayahPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Sekolah) to the collection in $obj2 (MstWilayah)
                $obj2->addSekolah($obj1);

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

                // Add the $obj1 (Sekolah) to the collection in $obj3 (KebutuhanKhusus)
                $obj3->addSekolah($obj1);

            } // if joined row is not null

                // Add objects for joined BentukPendidikan rows

                $key4 = BentukPendidikanPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = BentukPendidikanPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = BentukPendidikanPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    BentukPendidikanPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (Sekolah) to the collection in $obj4 (BentukPendidikan)
                $obj4->addSekolah($obj1);

            } // if joined row is not null

                // Add objects for joined StatusKepemilikan rows

                $key5 = StatusKepemilikanPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = StatusKepemilikanPeer::getInstanceFromPool($key5);
                    if (!$obj5) {
    
                        $cls = StatusKepemilikanPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    StatusKepemilikanPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (Sekolah) to the collection in $obj5 (StatusKepemilikan)
                $obj5->addSekolah($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Sekolah objects pre-filled with all related objects except StatusKepemilikan.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Sekolah objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptStatusKepemilikan(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(SekolahPeer::DATABASE_NAME);
        }

        SekolahPeer::addSelectColumns($criteria);
        $startcol2 = SekolahPeer::NUM_HYDRATE_COLUMNS;

        MstWilayahPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + MstWilayahPeer::NUM_HYDRATE_COLUMNS;

        KebutuhanKhususPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + KebutuhanKhususPeer::NUM_HYDRATE_COLUMNS;

        BentukPendidikanPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + BentukPendidikanPeer::NUM_HYDRATE_COLUMNS;

        YayasanPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + YayasanPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(SekolahPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

        $criteria->addJoin(SekolahPeer::KEBUTUHAN_KHUSUS_ID, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(SekolahPeer::BENTUK_PENDIDIKAN_ID, BentukPendidikanPeer::BENTUK_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(SekolahPeer::YAYASAN_ID, YayasanPeer::YAYASAN_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = SekolahPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = SekolahPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = SekolahPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                SekolahPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined MstWilayah rows

                $key2 = MstWilayahPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = MstWilayahPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = MstWilayahPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    MstWilayahPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Sekolah) to the collection in $obj2 (MstWilayah)
                $obj2->addSekolah($obj1);

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

                // Add the $obj1 (Sekolah) to the collection in $obj3 (KebutuhanKhusus)
                $obj3->addSekolah($obj1);

            } // if joined row is not null

                // Add objects for joined BentukPendidikan rows

                $key4 = BentukPendidikanPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = BentukPendidikanPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = BentukPendidikanPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    BentukPendidikanPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (Sekolah) to the collection in $obj4 (BentukPendidikan)
                $obj4->addSekolah($obj1);

            } // if joined row is not null

                // Add objects for joined Yayasan rows

                $key5 = YayasanPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = YayasanPeer::getInstanceFromPool($key5);
                    if (!$obj5) {
    
                        $cls = YayasanPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    YayasanPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (Sekolah) to the collection in $obj5 (Yayasan)
                $obj5->addSekolah($obj1);

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
        return Propel::getDatabaseMap(SekolahPeer::DATABASE_NAME)->getTable(SekolahPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseSekolahPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseSekolahPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new SekolahTableMap());
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
        return SekolahPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a Sekolah or Criteria object.
     *
     * @param      mixed $values Criteria or Sekolah object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(SekolahPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from Sekolah object
        }


        // Set the correct dbName
        $criteria->setDbName(SekolahPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a Sekolah or Criteria object.
     *
     * @param      mixed $values Criteria or Sekolah object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(SekolahPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(SekolahPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(SekolahPeer::SEKOLAH_ID);
            $value = $criteria->remove(SekolahPeer::SEKOLAH_ID);
            if ($value) {
                $selectCriteria->add(SekolahPeer::SEKOLAH_ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(SekolahPeer::TABLE_NAME);
            }

        } else { // $values is Sekolah object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(SekolahPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the sekolah table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(SekolahPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(SekolahPeer::TABLE_NAME, $con, SekolahPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SekolahPeer::clearInstancePool();
            SekolahPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a Sekolah or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or Sekolah object or primary key or array of primary keys
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
            $con = Propel::getConnection(SekolahPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            SekolahPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof Sekolah) { // it's a model object
            // invalidate the cache for this single object
            SekolahPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(SekolahPeer::DATABASE_NAME);
            $criteria->add(SekolahPeer::SEKOLAH_ID, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                SekolahPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(SekolahPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            
            $affectedRows += BasePeer::doDelete($criteria, $con);
            SekolahPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given Sekolah object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      Sekolah $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(SekolahPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(SekolahPeer::TABLE_NAME);

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

        return BasePeer::doValidate(SekolahPeer::DATABASE_NAME, SekolahPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      string $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return Sekolah
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = SekolahPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(SekolahPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(SekolahPeer::DATABASE_NAME);
        $criteria->add(SekolahPeer::SEKOLAH_ID, $pk);

        $v = SekolahPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return Sekolah[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(SekolahPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(SekolahPeer::DATABASE_NAME);
            $criteria->add(SekolahPeer::SEKOLAH_ID, $pks, Criteria::IN);
            $objs = SekolahPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseSekolahPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseSekolahPeer::buildTableMap();

