<?php

namespace DataDikdas\Model\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use DataDikdas\Model\JenisHapusBukuPeer;
use DataDikdas\Model\JenisPrasaranaPeer;
use DataDikdas\Model\MstWilayahPeer;
use DataDikdas\Model\SekolahPeer;
use DataDikdas\Model\StatusKepemilikanSarprasPeer;
use DataDikdas\Model\Tanah;
use DataDikdas\Model\TanahPeer;
use DataDikdas\Model\map\TanahTableMap;

/**
 * Base static class for performing query and update operations on the 'tanah' table.
 *
 * 
 *
 * @package propel.generator.DataDikdas.Model.om
 */
abstract class BaseTanahPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'pendataan';

    /** the table name for this class */
    const TABLE_NAME = 'tanah';

    /** the related Propel class for this table */
    const OM_CLASS = 'DataDikdas\\Model\\Tanah';

    /** the related TableMap class for this table */
    const TM_CLASS = 'TanahTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 38;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 38;

    /** the column name for the id_tanah field */
    const ID_TANAH = 'tanah.id_tanah';

    /** the column name for the jenis_prasarana_id field */
    const JENIS_PRASARANA_ID = 'tanah.jenis_prasarana_id';

    /** the column name for the sekolah_id field */
    const SEKOLAH_ID = 'tanah.sekolah_id';

    /** the column name for the id_hapus_buku field */
    const ID_HAPUS_BUKU = 'tanah.id_hapus_buku';

    /** the column name for the kepemilikan_sarpras_id field */
    const KEPEMILIKAN_SARPRAS_ID = 'tanah.kepemilikan_sarpras_id';

    /** the column name for the kd_kl field */
    const KD_KL = 'tanah.kd_kl';

    /** the column name for the kd_satker field */
    const KD_SATKER = 'tanah.kd_satker';

    /** the column name for the kd_brg field */
    const KD_BRG = 'tanah.kd_brg';

    /** the column name for the nup field */
    const NUP = 'tanah.nup';

    /** the column name for the kode_eselon1 field */
    const KODE_ESELON1 = 'tanah.kode_eselon1';

    /** the column name for the nama_eselon1 field */
    const NAMA_ESELON1 = 'tanah.nama_eselon1';

    /** the column name for the kode_sub_satker field */
    const KODE_SUB_SATKER = 'tanah.kode_sub_satker';

    /** the column name for the nama_sub_satker field */
    const NAMA_SUB_SATKER = 'tanah.nama_sub_satker';

    /** the column name for the nama field */
    const NAMA = 'tanah.nama';

    /** the column name for the panjang field */
    const PANJANG = 'tanah.panjang';

    /** the column name for the lebar field */
    const LEBAR = 'tanah.lebar';

    /** the column name for the nilai_perolehan_aset field */
    const NILAI_PEROLEHAN_ASET = 'tanah.nilai_perolehan_aset';

    /** the column name for the kode_wilayah field */
    const KODE_WILAYAH = 'tanah.kode_wilayah';

    /** the column name for the alamat_jalan field */
    const ALAMAT_JALAN = 'tanah.alamat_jalan';

    /** the column name for the rt field */
    const RT = 'tanah.rt';

    /** the column name for the rw field */
    const RW = 'tanah.rw';

    /** the column name for the nama_dusun field */
    const NAMA_DUSUN = 'tanah.nama_dusun';

    /** the column name for the desa_kelurahan field */
    const DESA_KELURAHAN = 'tanah.desa_kelurahan';

    /** the column name for the kode_pos field */
    const KODE_POS = 'tanah.kode_pos';

    /** the column name for the lintang field */
    const LINTANG = 'tanah.lintang';

    /** the column name for the bujur field */
    const BUJUR = 'tanah.bujur';

    /** the column name for the tgl_mutasi_keluar field */
    const TGL_MUTASI_KELUAR = 'tanah.tgl_mutasi_keluar';

    /** the column name for the batas field */
    const BATAS = 'tanah.batas';

    /** the column name for the ket_tanah field */
    const KET_TANAH = 'tanah.ket_tanah';

    /** the column name for the luas field */
    const LUAS = 'tanah.luas';

    /** the column name for the luas_lahan_tersedia field */
    const LUAS_LAHAN_TERSEDIA = 'tanah.luas_lahan_tersedia';

    /** the column name for the no_sertifikat_tanah field */
    const NO_SERTIFIKAT_TANAH = 'tanah.no_sertifikat_tanah';

    /** the column name for the asal_data field */
    const ASAL_DATA = 'tanah.asal_data';

    /** the column name for the create_date field */
    const CREATE_DATE = 'tanah.create_date';

    /** the column name for the last_update field */
    const LAST_UPDATE = 'tanah.last_update';

    /** the column name for the soft_delete field */
    const SOFT_DELETE = 'tanah.soft_delete';

    /** the column name for the last_sync field */
    const LAST_SYNC = 'tanah.last_sync';

    /** the column name for the updater_id field */
    const UPDATER_ID = 'tanah.updater_id';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of Tanah objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array Tanah[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. TanahPeer::$fieldNames[TanahPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('IdTanah', 'JenisPrasaranaId', 'SekolahId', 'IdHapusBuku', 'KepemilikanSarprasId', 'KdKl', 'KdSatker', 'KdBrg', 'Nup', 'KodeEselon1', 'NamaEselon1', 'KodeSubSatker', 'NamaSubSatker', 'Nama', 'Panjang', 'Lebar', 'NilaiPerolehanAset', 'KodeWilayah', 'AlamatJalan', 'Rt', 'Rw', 'NamaDusun', 'DesaKelurahan', 'KodePos', 'Lintang', 'Bujur', 'TglMutasiKeluar', 'Batas', 'KetTanah', 'Luas', 'LuasLahanTersedia', 'NoSertifikatTanah', 'AsalData', 'CreateDate', 'LastUpdate', 'SoftDelete', 'LastSync', 'UpdaterId', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idTanah', 'jenisPrasaranaId', 'sekolahId', 'idHapusBuku', 'kepemilikanSarprasId', 'kdKl', 'kdSatker', 'kdBrg', 'nup', 'kodeEselon1', 'namaEselon1', 'kodeSubSatker', 'namaSubSatker', 'nama', 'panjang', 'lebar', 'nilaiPerolehanAset', 'kodeWilayah', 'alamatJalan', 'rt', 'rw', 'namaDusun', 'desaKelurahan', 'kodePos', 'lintang', 'bujur', 'tglMutasiKeluar', 'batas', 'ketTanah', 'luas', 'luasLahanTersedia', 'noSertifikatTanah', 'asalData', 'createDate', 'lastUpdate', 'softDelete', 'lastSync', 'updaterId', ),
        BasePeer::TYPE_COLNAME => array (TanahPeer::ID_TANAH, TanahPeer::JENIS_PRASARANA_ID, TanahPeer::SEKOLAH_ID, TanahPeer::ID_HAPUS_BUKU, TanahPeer::KEPEMILIKAN_SARPRAS_ID, TanahPeer::KD_KL, TanahPeer::KD_SATKER, TanahPeer::KD_BRG, TanahPeer::NUP, TanahPeer::KODE_ESELON1, TanahPeer::NAMA_ESELON1, TanahPeer::KODE_SUB_SATKER, TanahPeer::NAMA_SUB_SATKER, TanahPeer::NAMA, TanahPeer::PANJANG, TanahPeer::LEBAR, TanahPeer::NILAI_PEROLEHAN_ASET, TanahPeer::KODE_WILAYAH, TanahPeer::ALAMAT_JALAN, TanahPeer::RT, TanahPeer::RW, TanahPeer::NAMA_DUSUN, TanahPeer::DESA_KELURAHAN, TanahPeer::KODE_POS, TanahPeer::LINTANG, TanahPeer::BUJUR, TanahPeer::TGL_MUTASI_KELUAR, TanahPeer::BATAS, TanahPeer::KET_TANAH, TanahPeer::LUAS, TanahPeer::LUAS_LAHAN_TERSEDIA, TanahPeer::NO_SERTIFIKAT_TANAH, TanahPeer::ASAL_DATA, TanahPeer::CREATE_DATE, TanahPeer::LAST_UPDATE, TanahPeer::SOFT_DELETE, TanahPeer::LAST_SYNC, TanahPeer::UPDATER_ID, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID_TANAH', 'JENIS_PRASARANA_ID', 'SEKOLAH_ID', 'ID_HAPUS_BUKU', 'KEPEMILIKAN_SARPRAS_ID', 'KD_KL', 'KD_SATKER', 'KD_BRG', 'NUP', 'KODE_ESELON1', 'NAMA_ESELON1', 'KODE_SUB_SATKER', 'NAMA_SUB_SATKER', 'NAMA', 'PANJANG', 'LEBAR', 'NILAI_PEROLEHAN_ASET', 'KODE_WILAYAH', 'ALAMAT_JALAN', 'RT', 'RW', 'NAMA_DUSUN', 'DESA_KELURAHAN', 'KODE_POS', 'LINTANG', 'BUJUR', 'TGL_MUTASI_KELUAR', 'BATAS', 'KET_TANAH', 'LUAS', 'LUAS_LAHAN_TERSEDIA', 'NO_SERTIFIKAT_TANAH', 'ASAL_DATA', 'CREATE_DATE', 'LAST_UPDATE', 'SOFT_DELETE', 'LAST_SYNC', 'UPDATER_ID', ),
        BasePeer::TYPE_FIELDNAME => array ('id_tanah', 'jenis_prasarana_id', 'sekolah_id', 'id_hapus_buku', 'kepemilikan_sarpras_id', 'kd_kl', 'kd_satker', 'kd_brg', 'nup', 'kode_eselon1', 'nama_eselon1', 'kode_sub_satker', 'nama_sub_satker', 'nama', 'panjang', 'lebar', 'nilai_perolehan_aset', 'kode_wilayah', 'alamat_jalan', 'rt', 'rw', 'nama_dusun', 'desa_kelurahan', 'kode_pos', 'lintang', 'bujur', 'tgl_mutasi_keluar', 'batas', 'ket_tanah', 'luas', 'luas_lahan_tersedia', 'no_sertifikat_tanah', 'asal_data', 'create_date', 'last_update', 'soft_delete', 'last_sync', 'updater_id', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. TanahPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('IdTanah' => 0, 'JenisPrasaranaId' => 1, 'SekolahId' => 2, 'IdHapusBuku' => 3, 'KepemilikanSarprasId' => 4, 'KdKl' => 5, 'KdSatker' => 6, 'KdBrg' => 7, 'Nup' => 8, 'KodeEselon1' => 9, 'NamaEselon1' => 10, 'KodeSubSatker' => 11, 'NamaSubSatker' => 12, 'Nama' => 13, 'Panjang' => 14, 'Lebar' => 15, 'NilaiPerolehanAset' => 16, 'KodeWilayah' => 17, 'AlamatJalan' => 18, 'Rt' => 19, 'Rw' => 20, 'NamaDusun' => 21, 'DesaKelurahan' => 22, 'KodePos' => 23, 'Lintang' => 24, 'Bujur' => 25, 'TglMutasiKeluar' => 26, 'Batas' => 27, 'KetTanah' => 28, 'Luas' => 29, 'LuasLahanTersedia' => 30, 'NoSertifikatTanah' => 31, 'AsalData' => 32, 'CreateDate' => 33, 'LastUpdate' => 34, 'SoftDelete' => 35, 'LastSync' => 36, 'UpdaterId' => 37, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idTanah' => 0, 'jenisPrasaranaId' => 1, 'sekolahId' => 2, 'idHapusBuku' => 3, 'kepemilikanSarprasId' => 4, 'kdKl' => 5, 'kdSatker' => 6, 'kdBrg' => 7, 'nup' => 8, 'kodeEselon1' => 9, 'namaEselon1' => 10, 'kodeSubSatker' => 11, 'namaSubSatker' => 12, 'nama' => 13, 'panjang' => 14, 'lebar' => 15, 'nilaiPerolehanAset' => 16, 'kodeWilayah' => 17, 'alamatJalan' => 18, 'rt' => 19, 'rw' => 20, 'namaDusun' => 21, 'desaKelurahan' => 22, 'kodePos' => 23, 'lintang' => 24, 'bujur' => 25, 'tglMutasiKeluar' => 26, 'batas' => 27, 'ketTanah' => 28, 'luas' => 29, 'luasLahanTersedia' => 30, 'noSertifikatTanah' => 31, 'asalData' => 32, 'createDate' => 33, 'lastUpdate' => 34, 'softDelete' => 35, 'lastSync' => 36, 'updaterId' => 37, ),
        BasePeer::TYPE_COLNAME => array (TanahPeer::ID_TANAH => 0, TanahPeer::JENIS_PRASARANA_ID => 1, TanahPeer::SEKOLAH_ID => 2, TanahPeer::ID_HAPUS_BUKU => 3, TanahPeer::KEPEMILIKAN_SARPRAS_ID => 4, TanahPeer::KD_KL => 5, TanahPeer::KD_SATKER => 6, TanahPeer::KD_BRG => 7, TanahPeer::NUP => 8, TanahPeer::KODE_ESELON1 => 9, TanahPeer::NAMA_ESELON1 => 10, TanahPeer::KODE_SUB_SATKER => 11, TanahPeer::NAMA_SUB_SATKER => 12, TanahPeer::NAMA => 13, TanahPeer::PANJANG => 14, TanahPeer::LEBAR => 15, TanahPeer::NILAI_PEROLEHAN_ASET => 16, TanahPeer::KODE_WILAYAH => 17, TanahPeer::ALAMAT_JALAN => 18, TanahPeer::RT => 19, TanahPeer::RW => 20, TanahPeer::NAMA_DUSUN => 21, TanahPeer::DESA_KELURAHAN => 22, TanahPeer::KODE_POS => 23, TanahPeer::LINTANG => 24, TanahPeer::BUJUR => 25, TanahPeer::TGL_MUTASI_KELUAR => 26, TanahPeer::BATAS => 27, TanahPeer::KET_TANAH => 28, TanahPeer::LUAS => 29, TanahPeer::LUAS_LAHAN_TERSEDIA => 30, TanahPeer::NO_SERTIFIKAT_TANAH => 31, TanahPeer::ASAL_DATA => 32, TanahPeer::CREATE_DATE => 33, TanahPeer::LAST_UPDATE => 34, TanahPeer::SOFT_DELETE => 35, TanahPeer::LAST_SYNC => 36, TanahPeer::UPDATER_ID => 37, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID_TANAH' => 0, 'JENIS_PRASARANA_ID' => 1, 'SEKOLAH_ID' => 2, 'ID_HAPUS_BUKU' => 3, 'KEPEMILIKAN_SARPRAS_ID' => 4, 'KD_KL' => 5, 'KD_SATKER' => 6, 'KD_BRG' => 7, 'NUP' => 8, 'KODE_ESELON1' => 9, 'NAMA_ESELON1' => 10, 'KODE_SUB_SATKER' => 11, 'NAMA_SUB_SATKER' => 12, 'NAMA' => 13, 'PANJANG' => 14, 'LEBAR' => 15, 'NILAI_PEROLEHAN_ASET' => 16, 'KODE_WILAYAH' => 17, 'ALAMAT_JALAN' => 18, 'RT' => 19, 'RW' => 20, 'NAMA_DUSUN' => 21, 'DESA_KELURAHAN' => 22, 'KODE_POS' => 23, 'LINTANG' => 24, 'BUJUR' => 25, 'TGL_MUTASI_KELUAR' => 26, 'BATAS' => 27, 'KET_TANAH' => 28, 'LUAS' => 29, 'LUAS_LAHAN_TERSEDIA' => 30, 'NO_SERTIFIKAT_TANAH' => 31, 'ASAL_DATA' => 32, 'CREATE_DATE' => 33, 'LAST_UPDATE' => 34, 'SOFT_DELETE' => 35, 'LAST_SYNC' => 36, 'UPDATER_ID' => 37, ),
        BasePeer::TYPE_FIELDNAME => array ('id_tanah' => 0, 'jenis_prasarana_id' => 1, 'sekolah_id' => 2, 'id_hapus_buku' => 3, 'kepemilikan_sarpras_id' => 4, 'kd_kl' => 5, 'kd_satker' => 6, 'kd_brg' => 7, 'nup' => 8, 'kode_eselon1' => 9, 'nama_eselon1' => 10, 'kode_sub_satker' => 11, 'nama_sub_satker' => 12, 'nama' => 13, 'panjang' => 14, 'lebar' => 15, 'nilai_perolehan_aset' => 16, 'kode_wilayah' => 17, 'alamat_jalan' => 18, 'rt' => 19, 'rw' => 20, 'nama_dusun' => 21, 'desa_kelurahan' => 22, 'kode_pos' => 23, 'lintang' => 24, 'bujur' => 25, 'tgl_mutasi_keluar' => 26, 'batas' => 27, 'ket_tanah' => 28, 'luas' => 29, 'luas_lahan_tersedia' => 30, 'no_sertifikat_tanah' => 31, 'asal_data' => 32, 'create_date' => 33, 'last_update' => 34, 'soft_delete' => 35, 'last_sync' => 36, 'updater_id' => 37, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, )
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
        $toNames = TanahPeer::getFieldNames($toType);
        $key = isset(TanahPeer::$fieldKeys[$fromType][$name]) ? TanahPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(TanahPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, TanahPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return TanahPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. TanahPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(TanahPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(TanahPeer::ID_TANAH);
            $criteria->addSelectColumn(TanahPeer::JENIS_PRASARANA_ID);
            $criteria->addSelectColumn(TanahPeer::SEKOLAH_ID);
            $criteria->addSelectColumn(TanahPeer::ID_HAPUS_BUKU);
            $criteria->addSelectColumn(TanahPeer::KEPEMILIKAN_SARPRAS_ID);
            $criteria->addSelectColumn(TanahPeer::KD_KL);
            $criteria->addSelectColumn(TanahPeer::KD_SATKER);
            $criteria->addSelectColumn(TanahPeer::KD_BRG);
            $criteria->addSelectColumn(TanahPeer::NUP);
            $criteria->addSelectColumn(TanahPeer::KODE_ESELON1);
            $criteria->addSelectColumn(TanahPeer::NAMA_ESELON1);
            $criteria->addSelectColumn(TanahPeer::KODE_SUB_SATKER);
            $criteria->addSelectColumn(TanahPeer::NAMA_SUB_SATKER);
            $criteria->addSelectColumn(TanahPeer::NAMA);
            $criteria->addSelectColumn(TanahPeer::PANJANG);
            $criteria->addSelectColumn(TanahPeer::LEBAR);
            $criteria->addSelectColumn(TanahPeer::NILAI_PEROLEHAN_ASET);
            $criteria->addSelectColumn(TanahPeer::KODE_WILAYAH);
            $criteria->addSelectColumn(TanahPeer::ALAMAT_JALAN);
            $criteria->addSelectColumn(TanahPeer::RT);
            $criteria->addSelectColumn(TanahPeer::RW);
            $criteria->addSelectColumn(TanahPeer::NAMA_DUSUN);
            $criteria->addSelectColumn(TanahPeer::DESA_KELURAHAN);
            $criteria->addSelectColumn(TanahPeer::KODE_POS);
            $criteria->addSelectColumn(TanahPeer::LINTANG);
            $criteria->addSelectColumn(TanahPeer::BUJUR);
            $criteria->addSelectColumn(TanahPeer::TGL_MUTASI_KELUAR);
            $criteria->addSelectColumn(TanahPeer::BATAS);
            $criteria->addSelectColumn(TanahPeer::KET_TANAH);
            $criteria->addSelectColumn(TanahPeer::LUAS);
            $criteria->addSelectColumn(TanahPeer::LUAS_LAHAN_TERSEDIA);
            $criteria->addSelectColumn(TanahPeer::NO_SERTIFIKAT_TANAH);
            $criteria->addSelectColumn(TanahPeer::ASAL_DATA);
            $criteria->addSelectColumn(TanahPeer::CREATE_DATE);
            $criteria->addSelectColumn(TanahPeer::LAST_UPDATE);
            $criteria->addSelectColumn(TanahPeer::SOFT_DELETE);
            $criteria->addSelectColumn(TanahPeer::LAST_SYNC);
            $criteria->addSelectColumn(TanahPeer::UPDATER_ID);
        } else {
            $criteria->addSelectColumn($alias . '.id_tanah');
            $criteria->addSelectColumn($alias . '.jenis_prasarana_id');
            $criteria->addSelectColumn($alias . '.sekolah_id');
            $criteria->addSelectColumn($alias . '.id_hapus_buku');
            $criteria->addSelectColumn($alias . '.kepemilikan_sarpras_id');
            $criteria->addSelectColumn($alias . '.kd_kl');
            $criteria->addSelectColumn($alias . '.kd_satker');
            $criteria->addSelectColumn($alias . '.kd_brg');
            $criteria->addSelectColumn($alias . '.nup');
            $criteria->addSelectColumn($alias . '.kode_eselon1');
            $criteria->addSelectColumn($alias . '.nama_eselon1');
            $criteria->addSelectColumn($alias . '.kode_sub_satker');
            $criteria->addSelectColumn($alias . '.nama_sub_satker');
            $criteria->addSelectColumn($alias . '.nama');
            $criteria->addSelectColumn($alias . '.panjang');
            $criteria->addSelectColumn($alias . '.lebar');
            $criteria->addSelectColumn($alias . '.nilai_perolehan_aset');
            $criteria->addSelectColumn($alias . '.kode_wilayah');
            $criteria->addSelectColumn($alias . '.alamat_jalan');
            $criteria->addSelectColumn($alias . '.rt');
            $criteria->addSelectColumn($alias . '.rw');
            $criteria->addSelectColumn($alias . '.nama_dusun');
            $criteria->addSelectColumn($alias . '.desa_kelurahan');
            $criteria->addSelectColumn($alias . '.kode_pos');
            $criteria->addSelectColumn($alias . '.lintang');
            $criteria->addSelectColumn($alias . '.bujur');
            $criteria->addSelectColumn($alias . '.tgl_mutasi_keluar');
            $criteria->addSelectColumn($alias . '.batas');
            $criteria->addSelectColumn($alias . '.ket_tanah');
            $criteria->addSelectColumn($alias . '.luas');
            $criteria->addSelectColumn($alias . '.luas_lahan_tersedia');
            $criteria->addSelectColumn($alias . '.no_sertifikat_tanah');
            $criteria->addSelectColumn($alias . '.asal_data');
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
        $criteria->setPrimaryTableName(TanahPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            TanahPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(TanahPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(TanahPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Tanah
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = TanahPeer::doSelect($critcopy, $con);
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
        return TanahPeer::populateObjects(TanahPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(TanahPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            TanahPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(TanahPeer::DATABASE_NAME);

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
     * @param      Tanah $obj A Tanah object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getIdTanah();
            } // if key === null
            TanahPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A Tanah object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof Tanah) {
                $key = (string) $value->getIdTanah();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Tanah object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(TanahPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   Tanah Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(TanahPeer::$instances[$key])) {
                return TanahPeer::$instances[$key];
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
        foreach (TanahPeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        TanahPeer::$instances = array();
    }
    
    /**
     * Method to invalidate the instance pool of all tables related to tanah
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
        $cls = TanahPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = TanahPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = TanahPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                TanahPeer::addInstanceToPool($obj, $key);
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
     * @return array (Tanah object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = TanahPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = TanahPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + TanahPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = TanahPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            TanahPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }


    /**
     * Returns the number of rows matching criteria, joining the related JenisHapusBuku table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinJenisHapusBuku(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(TanahPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            TanahPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(TanahPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(TanahPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(TanahPeer::ID_HAPUS_BUKU, JenisHapusBukuPeer::ID_HAPUS_BUKU, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related JenisPrasarana table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinJenisPrasarana(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(TanahPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            TanahPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(TanahPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(TanahPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(TanahPeer::JENIS_PRASARANA_ID, JenisPrasaranaPeer::JENIS_PRASARANA_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related Sekolah table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinSekolah(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(TanahPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            TanahPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(TanahPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(TanahPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(TanahPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related StatusKepemilikanSarpras table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinStatusKepemilikanSarpras(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(TanahPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            TanahPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(TanahPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(TanahPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(TanahPeer::KEPEMILIKAN_SARPRAS_ID, StatusKepemilikanSarprasPeer::KEPEMILIKAN_SARPRAS_ID, $join_behavior);

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
        $criteria->setPrimaryTableName(TanahPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            TanahPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(TanahPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(TanahPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(TanahPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

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
     * Selects a collection of Tanah objects pre-filled with their JenisHapusBuku objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Tanah objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinJenisHapusBuku(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(TanahPeer::DATABASE_NAME);
        }

        TanahPeer::addSelectColumns($criteria);
        $startcol = TanahPeer::NUM_HYDRATE_COLUMNS;
        JenisHapusBukuPeer::addSelectColumns($criteria);

        $criteria->addJoin(TanahPeer::ID_HAPUS_BUKU, JenisHapusBukuPeer::ID_HAPUS_BUKU, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = TanahPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = TanahPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = TanahPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                TanahPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = JenisHapusBukuPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = JenisHapusBukuPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = JenisHapusBukuPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    JenisHapusBukuPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Tanah) to $obj2 (JenisHapusBuku)
                $obj2->addTanah($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Tanah objects pre-filled with their JenisPrasarana objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Tanah objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinJenisPrasarana(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(TanahPeer::DATABASE_NAME);
        }

        TanahPeer::addSelectColumns($criteria);
        $startcol = TanahPeer::NUM_HYDRATE_COLUMNS;
        JenisPrasaranaPeer::addSelectColumns($criteria);

        $criteria->addJoin(TanahPeer::JENIS_PRASARANA_ID, JenisPrasaranaPeer::JENIS_PRASARANA_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = TanahPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = TanahPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = TanahPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                TanahPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = JenisPrasaranaPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = JenisPrasaranaPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = JenisPrasaranaPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    JenisPrasaranaPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Tanah) to $obj2 (JenisPrasarana)
                $obj2->addTanah($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Tanah objects pre-filled with their Sekolah objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Tanah objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinSekolah(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(TanahPeer::DATABASE_NAME);
        }

        TanahPeer::addSelectColumns($criteria);
        $startcol = TanahPeer::NUM_HYDRATE_COLUMNS;
        SekolahPeer::addSelectColumns($criteria);

        $criteria->addJoin(TanahPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = TanahPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = TanahPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = TanahPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                TanahPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = SekolahPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = SekolahPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = SekolahPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    SekolahPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Tanah) to $obj2 (Sekolah)
                $obj2->addTanah($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Tanah objects pre-filled with their StatusKepemilikanSarpras objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Tanah objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinStatusKepemilikanSarpras(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(TanahPeer::DATABASE_NAME);
        }

        TanahPeer::addSelectColumns($criteria);
        $startcol = TanahPeer::NUM_HYDRATE_COLUMNS;
        StatusKepemilikanSarprasPeer::addSelectColumns($criteria);

        $criteria->addJoin(TanahPeer::KEPEMILIKAN_SARPRAS_ID, StatusKepemilikanSarprasPeer::KEPEMILIKAN_SARPRAS_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = TanahPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = TanahPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = TanahPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                TanahPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = StatusKepemilikanSarprasPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = StatusKepemilikanSarprasPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = StatusKepemilikanSarprasPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    StatusKepemilikanSarprasPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Tanah) to $obj2 (StatusKepemilikanSarpras)
                $obj2->addTanah($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Tanah objects pre-filled with their MstWilayah objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Tanah objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinMstWilayah(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(TanahPeer::DATABASE_NAME);
        }

        TanahPeer::addSelectColumns($criteria);
        $startcol = TanahPeer::NUM_HYDRATE_COLUMNS;
        MstWilayahPeer::addSelectColumns($criteria);

        $criteria->addJoin(TanahPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = TanahPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = TanahPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = TanahPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                TanahPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Tanah) to $obj2 (MstWilayah)
                $obj2->addTanah($obj1);

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
        $criteria->setPrimaryTableName(TanahPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            TanahPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(TanahPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(TanahPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(TanahPeer::ID_HAPUS_BUKU, JenisHapusBukuPeer::ID_HAPUS_BUKU, $join_behavior);

        $criteria->addJoin(TanahPeer::JENIS_PRASARANA_ID, JenisPrasaranaPeer::JENIS_PRASARANA_ID, $join_behavior);

        $criteria->addJoin(TanahPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $criteria->addJoin(TanahPeer::KEPEMILIKAN_SARPRAS_ID, StatusKepemilikanSarprasPeer::KEPEMILIKAN_SARPRAS_ID, $join_behavior);

        $criteria->addJoin(TanahPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

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
     * Selects a collection of Tanah objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Tanah objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(TanahPeer::DATABASE_NAME);
        }

        TanahPeer::addSelectColumns($criteria);
        $startcol2 = TanahPeer::NUM_HYDRATE_COLUMNS;

        JenisHapusBukuPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + JenisHapusBukuPeer::NUM_HYDRATE_COLUMNS;

        JenisPrasaranaPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + JenisPrasaranaPeer::NUM_HYDRATE_COLUMNS;

        SekolahPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + SekolahPeer::NUM_HYDRATE_COLUMNS;

        StatusKepemilikanSarprasPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + StatusKepemilikanSarprasPeer::NUM_HYDRATE_COLUMNS;

        MstWilayahPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + MstWilayahPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(TanahPeer::ID_HAPUS_BUKU, JenisHapusBukuPeer::ID_HAPUS_BUKU, $join_behavior);

        $criteria->addJoin(TanahPeer::JENIS_PRASARANA_ID, JenisPrasaranaPeer::JENIS_PRASARANA_ID, $join_behavior);

        $criteria->addJoin(TanahPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $criteria->addJoin(TanahPeer::KEPEMILIKAN_SARPRAS_ID, StatusKepemilikanSarprasPeer::KEPEMILIKAN_SARPRAS_ID, $join_behavior);

        $criteria->addJoin(TanahPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = TanahPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = TanahPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = TanahPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                TanahPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

            // Add objects for joined JenisHapusBuku rows

            $key2 = JenisHapusBukuPeer::getPrimaryKeyHashFromRow($row, $startcol2);
            if ($key2 !== null) {
                $obj2 = JenisHapusBukuPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = JenisHapusBukuPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    JenisHapusBukuPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 loaded

                // Add the $obj1 (Tanah) to the collection in $obj2 (JenisHapusBuku)
                $obj2->addTanah($obj1);
            } // if joined row not null

            // Add objects for joined JenisPrasarana rows

            $key3 = JenisPrasaranaPeer::getPrimaryKeyHashFromRow($row, $startcol3);
            if ($key3 !== null) {
                $obj3 = JenisPrasaranaPeer::getInstanceFromPool($key3);
                if (!$obj3) {

                    $cls = JenisPrasaranaPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    JenisPrasaranaPeer::addInstanceToPool($obj3, $key3);
                } // if obj3 loaded

                // Add the $obj1 (Tanah) to the collection in $obj3 (JenisPrasarana)
                $obj3->addTanah($obj1);
            } // if joined row not null

            // Add objects for joined Sekolah rows

            $key4 = SekolahPeer::getPrimaryKeyHashFromRow($row, $startcol4);
            if ($key4 !== null) {
                $obj4 = SekolahPeer::getInstanceFromPool($key4);
                if (!$obj4) {

                    $cls = SekolahPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    SekolahPeer::addInstanceToPool($obj4, $key4);
                } // if obj4 loaded

                // Add the $obj1 (Tanah) to the collection in $obj4 (Sekolah)
                $obj4->addTanah($obj1);
            } // if joined row not null

            // Add objects for joined StatusKepemilikanSarpras rows

            $key5 = StatusKepemilikanSarprasPeer::getPrimaryKeyHashFromRow($row, $startcol5);
            if ($key5 !== null) {
                $obj5 = StatusKepemilikanSarprasPeer::getInstanceFromPool($key5);
                if (!$obj5) {

                    $cls = StatusKepemilikanSarprasPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    StatusKepemilikanSarprasPeer::addInstanceToPool($obj5, $key5);
                } // if obj5 loaded

                // Add the $obj1 (Tanah) to the collection in $obj5 (StatusKepemilikanSarpras)
                $obj5->addTanah($obj1);
            } // if joined row not null

            // Add objects for joined MstWilayah rows

            $key6 = MstWilayahPeer::getPrimaryKeyHashFromRow($row, $startcol6);
            if ($key6 !== null) {
                $obj6 = MstWilayahPeer::getInstanceFromPool($key6);
                if (!$obj6) {

                    $cls = MstWilayahPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    MstWilayahPeer::addInstanceToPool($obj6, $key6);
                } // if obj6 loaded

                // Add the $obj1 (Tanah) to the collection in $obj6 (MstWilayah)
                $obj6->addTanah($obj1);
            } // if joined row not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Returns the number of rows matching criteria, joining the related JenisHapusBuku table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptJenisHapusBuku(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(TanahPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            TanahPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(TanahPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(TanahPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(TanahPeer::JENIS_PRASARANA_ID, JenisPrasaranaPeer::JENIS_PRASARANA_ID, $join_behavior);

        $criteria->addJoin(TanahPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $criteria->addJoin(TanahPeer::KEPEMILIKAN_SARPRAS_ID, StatusKepemilikanSarprasPeer::KEPEMILIKAN_SARPRAS_ID, $join_behavior);

        $criteria->addJoin(TanahPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related JenisPrasarana table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptJenisPrasarana(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(TanahPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            TanahPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(TanahPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(TanahPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(TanahPeer::ID_HAPUS_BUKU, JenisHapusBukuPeer::ID_HAPUS_BUKU, $join_behavior);

        $criteria->addJoin(TanahPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $criteria->addJoin(TanahPeer::KEPEMILIKAN_SARPRAS_ID, StatusKepemilikanSarprasPeer::KEPEMILIKAN_SARPRAS_ID, $join_behavior);

        $criteria->addJoin(TanahPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related Sekolah table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptSekolah(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(TanahPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            TanahPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(TanahPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(TanahPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(TanahPeer::ID_HAPUS_BUKU, JenisHapusBukuPeer::ID_HAPUS_BUKU, $join_behavior);

        $criteria->addJoin(TanahPeer::JENIS_PRASARANA_ID, JenisPrasaranaPeer::JENIS_PRASARANA_ID, $join_behavior);

        $criteria->addJoin(TanahPeer::KEPEMILIKAN_SARPRAS_ID, StatusKepemilikanSarprasPeer::KEPEMILIKAN_SARPRAS_ID, $join_behavior);

        $criteria->addJoin(TanahPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related StatusKepemilikanSarpras table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptStatusKepemilikanSarpras(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(TanahPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            TanahPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(TanahPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(TanahPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(TanahPeer::ID_HAPUS_BUKU, JenisHapusBukuPeer::ID_HAPUS_BUKU, $join_behavior);

        $criteria->addJoin(TanahPeer::JENIS_PRASARANA_ID, JenisPrasaranaPeer::JENIS_PRASARANA_ID, $join_behavior);

        $criteria->addJoin(TanahPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $criteria->addJoin(TanahPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

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
        $criteria->setPrimaryTableName(TanahPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            TanahPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(TanahPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(TanahPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(TanahPeer::ID_HAPUS_BUKU, JenisHapusBukuPeer::ID_HAPUS_BUKU, $join_behavior);

        $criteria->addJoin(TanahPeer::JENIS_PRASARANA_ID, JenisPrasaranaPeer::JENIS_PRASARANA_ID, $join_behavior);

        $criteria->addJoin(TanahPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $criteria->addJoin(TanahPeer::KEPEMILIKAN_SARPRAS_ID, StatusKepemilikanSarprasPeer::KEPEMILIKAN_SARPRAS_ID, $join_behavior);

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
     * Selects a collection of Tanah objects pre-filled with all related objects except JenisHapusBuku.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Tanah objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptJenisHapusBuku(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(TanahPeer::DATABASE_NAME);
        }

        TanahPeer::addSelectColumns($criteria);
        $startcol2 = TanahPeer::NUM_HYDRATE_COLUMNS;

        JenisPrasaranaPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + JenisPrasaranaPeer::NUM_HYDRATE_COLUMNS;

        SekolahPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + SekolahPeer::NUM_HYDRATE_COLUMNS;

        StatusKepemilikanSarprasPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + StatusKepemilikanSarprasPeer::NUM_HYDRATE_COLUMNS;

        MstWilayahPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + MstWilayahPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(TanahPeer::JENIS_PRASARANA_ID, JenisPrasaranaPeer::JENIS_PRASARANA_ID, $join_behavior);

        $criteria->addJoin(TanahPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $criteria->addJoin(TanahPeer::KEPEMILIKAN_SARPRAS_ID, StatusKepemilikanSarprasPeer::KEPEMILIKAN_SARPRAS_ID, $join_behavior);

        $criteria->addJoin(TanahPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = TanahPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = TanahPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = TanahPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                TanahPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined JenisPrasarana rows

                $key2 = JenisPrasaranaPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = JenisPrasaranaPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = JenisPrasaranaPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    JenisPrasaranaPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Tanah) to the collection in $obj2 (JenisPrasarana)
                $obj2->addTanah($obj1);

            } // if joined row is not null

                // Add objects for joined Sekolah rows

                $key3 = SekolahPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = SekolahPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = SekolahPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    SekolahPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Tanah) to the collection in $obj3 (Sekolah)
                $obj3->addTanah($obj1);

            } // if joined row is not null

                // Add objects for joined StatusKepemilikanSarpras rows

                $key4 = StatusKepemilikanSarprasPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = StatusKepemilikanSarprasPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = StatusKepemilikanSarprasPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    StatusKepemilikanSarprasPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (Tanah) to the collection in $obj4 (StatusKepemilikanSarpras)
                $obj4->addTanah($obj1);

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

                // Add the $obj1 (Tanah) to the collection in $obj5 (MstWilayah)
                $obj5->addTanah($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Tanah objects pre-filled with all related objects except JenisPrasarana.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Tanah objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptJenisPrasarana(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(TanahPeer::DATABASE_NAME);
        }

        TanahPeer::addSelectColumns($criteria);
        $startcol2 = TanahPeer::NUM_HYDRATE_COLUMNS;

        JenisHapusBukuPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + JenisHapusBukuPeer::NUM_HYDRATE_COLUMNS;

        SekolahPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + SekolahPeer::NUM_HYDRATE_COLUMNS;

        StatusKepemilikanSarprasPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + StatusKepemilikanSarprasPeer::NUM_HYDRATE_COLUMNS;

        MstWilayahPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + MstWilayahPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(TanahPeer::ID_HAPUS_BUKU, JenisHapusBukuPeer::ID_HAPUS_BUKU, $join_behavior);

        $criteria->addJoin(TanahPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $criteria->addJoin(TanahPeer::KEPEMILIKAN_SARPRAS_ID, StatusKepemilikanSarprasPeer::KEPEMILIKAN_SARPRAS_ID, $join_behavior);

        $criteria->addJoin(TanahPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = TanahPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = TanahPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = TanahPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                TanahPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined JenisHapusBuku rows

                $key2 = JenisHapusBukuPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = JenisHapusBukuPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = JenisHapusBukuPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    JenisHapusBukuPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Tanah) to the collection in $obj2 (JenisHapusBuku)
                $obj2->addTanah($obj1);

            } // if joined row is not null

                // Add objects for joined Sekolah rows

                $key3 = SekolahPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = SekolahPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = SekolahPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    SekolahPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Tanah) to the collection in $obj3 (Sekolah)
                $obj3->addTanah($obj1);

            } // if joined row is not null

                // Add objects for joined StatusKepemilikanSarpras rows

                $key4 = StatusKepemilikanSarprasPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = StatusKepemilikanSarprasPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = StatusKepemilikanSarprasPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    StatusKepemilikanSarprasPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (Tanah) to the collection in $obj4 (StatusKepemilikanSarpras)
                $obj4->addTanah($obj1);

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

                // Add the $obj1 (Tanah) to the collection in $obj5 (MstWilayah)
                $obj5->addTanah($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Tanah objects pre-filled with all related objects except Sekolah.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Tanah objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptSekolah(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(TanahPeer::DATABASE_NAME);
        }

        TanahPeer::addSelectColumns($criteria);
        $startcol2 = TanahPeer::NUM_HYDRATE_COLUMNS;

        JenisHapusBukuPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + JenisHapusBukuPeer::NUM_HYDRATE_COLUMNS;

        JenisPrasaranaPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + JenisPrasaranaPeer::NUM_HYDRATE_COLUMNS;

        StatusKepemilikanSarprasPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + StatusKepemilikanSarprasPeer::NUM_HYDRATE_COLUMNS;

        MstWilayahPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + MstWilayahPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(TanahPeer::ID_HAPUS_BUKU, JenisHapusBukuPeer::ID_HAPUS_BUKU, $join_behavior);

        $criteria->addJoin(TanahPeer::JENIS_PRASARANA_ID, JenisPrasaranaPeer::JENIS_PRASARANA_ID, $join_behavior);

        $criteria->addJoin(TanahPeer::KEPEMILIKAN_SARPRAS_ID, StatusKepemilikanSarprasPeer::KEPEMILIKAN_SARPRAS_ID, $join_behavior);

        $criteria->addJoin(TanahPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = TanahPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = TanahPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = TanahPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                TanahPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined JenisHapusBuku rows

                $key2 = JenisHapusBukuPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = JenisHapusBukuPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = JenisHapusBukuPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    JenisHapusBukuPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Tanah) to the collection in $obj2 (JenisHapusBuku)
                $obj2->addTanah($obj1);

            } // if joined row is not null

                // Add objects for joined JenisPrasarana rows

                $key3 = JenisPrasaranaPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = JenisPrasaranaPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = JenisPrasaranaPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    JenisPrasaranaPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Tanah) to the collection in $obj3 (JenisPrasarana)
                $obj3->addTanah($obj1);

            } // if joined row is not null

                // Add objects for joined StatusKepemilikanSarpras rows

                $key4 = StatusKepemilikanSarprasPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = StatusKepemilikanSarprasPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = StatusKepemilikanSarprasPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    StatusKepemilikanSarprasPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (Tanah) to the collection in $obj4 (StatusKepemilikanSarpras)
                $obj4->addTanah($obj1);

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

                // Add the $obj1 (Tanah) to the collection in $obj5 (MstWilayah)
                $obj5->addTanah($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Tanah objects pre-filled with all related objects except StatusKepemilikanSarpras.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Tanah objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptStatusKepemilikanSarpras(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(TanahPeer::DATABASE_NAME);
        }

        TanahPeer::addSelectColumns($criteria);
        $startcol2 = TanahPeer::NUM_HYDRATE_COLUMNS;

        JenisHapusBukuPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + JenisHapusBukuPeer::NUM_HYDRATE_COLUMNS;

        JenisPrasaranaPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + JenisPrasaranaPeer::NUM_HYDRATE_COLUMNS;

        SekolahPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + SekolahPeer::NUM_HYDRATE_COLUMNS;

        MstWilayahPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + MstWilayahPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(TanahPeer::ID_HAPUS_BUKU, JenisHapusBukuPeer::ID_HAPUS_BUKU, $join_behavior);

        $criteria->addJoin(TanahPeer::JENIS_PRASARANA_ID, JenisPrasaranaPeer::JENIS_PRASARANA_ID, $join_behavior);

        $criteria->addJoin(TanahPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $criteria->addJoin(TanahPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = TanahPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = TanahPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = TanahPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                TanahPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined JenisHapusBuku rows

                $key2 = JenisHapusBukuPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = JenisHapusBukuPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = JenisHapusBukuPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    JenisHapusBukuPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Tanah) to the collection in $obj2 (JenisHapusBuku)
                $obj2->addTanah($obj1);

            } // if joined row is not null

                // Add objects for joined JenisPrasarana rows

                $key3 = JenisPrasaranaPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = JenisPrasaranaPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = JenisPrasaranaPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    JenisPrasaranaPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Tanah) to the collection in $obj3 (JenisPrasarana)
                $obj3->addTanah($obj1);

            } // if joined row is not null

                // Add objects for joined Sekolah rows

                $key4 = SekolahPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = SekolahPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = SekolahPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    SekolahPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (Tanah) to the collection in $obj4 (Sekolah)
                $obj4->addTanah($obj1);

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

                // Add the $obj1 (Tanah) to the collection in $obj5 (MstWilayah)
                $obj5->addTanah($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Tanah objects pre-filled with all related objects except MstWilayah.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Tanah objects.
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
            $criteria->setDbName(TanahPeer::DATABASE_NAME);
        }

        TanahPeer::addSelectColumns($criteria);
        $startcol2 = TanahPeer::NUM_HYDRATE_COLUMNS;

        JenisHapusBukuPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + JenisHapusBukuPeer::NUM_HYDRATE_COLUMNS;

        JenisPrasaranaPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + JenisPrasaranaPeer::NUM_HYDRATE_COLUMNS;

        SekolahPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + SekolahPeer::NUM_HYDRATE_COLUMNS;

        StatusKepemilikanSarprasPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + StatusKepemilikanSarprasPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(TanahPeer::ID_HAPUS_BUKU, JenisHapusBukuPeer::ID_HAPUS_BUKU, $join_behavior);

        $criteria->addJoin(TanahPeer::JENIS_PRASARANA_ID, JenisPrasaranaPeer::JENIS_PRASARANA_ID, $join_behavior);

        $criteria->addJoin(TanahPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $criteria->addJoin(TanahPeer::KEPEMILIKAN_SARPRAS_ID, StatusKepemilikanSarprasPeer::KEPEMILIKAN_SARPRAS_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = TanahPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = TanahPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = TanahPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                TanahPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined JenisHapusBuku rows

                $key2 = JenisHapusBukuPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = JenisHapusBukuPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = JenisHapusBukuPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    JenisHapusBukuPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Tanah) to the collection in $obj2 (JenisHapusBuku)
                $obj2->addTanah($obj1);

            } // if joined row is not null

                // Add objects for joined JenisPrasarana rows

                $key3 = JenisPrasaranaPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = JenisPrasaranaPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = JenisPrasaranaPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    JenisPrasaranaPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Tanah) to the collection in $obj3 (JenisPrasarana)
                $obj3->addTanah($obj1);

            } // if joined row is not null

                // Add objects for joined Sekolah rows

                $key4 = SekolahPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = SekolahPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = SekolahPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    SekolahPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (Tanah) to the collection in $obj4 (Sekolah)
                $obj4->addTanah($obj1);

            } // if joined row is not null

                // Add objects for joined StatusKepemilikanSarpras rows

                $key5 = StatusKepemilikanSarprasPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = StatusKepemilikanSarprasPeer::getInstanceFromPool($key5);
                    if (!$obj5) {
    
                        $cls = StatusKepemilikanSarprasPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    StatusKepemilikanSarprasPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (Tanah) to the collection in $obj5 (StatusKepemilikanSarpras)
                $obj5->addTanah($obj1);

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
        return Propel::getDatabaseMap(TanahPeer::DATABASE_NAME)->getTable(TanahPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseTanahPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseTanahPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new TanahTableMap());
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
        return TanahPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a Tanah or Criteria object.
     *
     * @param      mixed $values Criteria or Tanah object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(TanahPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from Tanah object
        }


        // Set the correct dbName
        $criteria->setDbName(TanahPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a Tanah or Criteria object.
     *
     * @param      mixed $values Criteria or Tanah object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(TanahPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(TanahPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(TanahPeer::ID_TANAH);
            $value = $criteria->remove(TanahPeer::ID_TANAH);
            if ($value) {
                $selectCriteria->add(TanahPeer::ID_TANAH, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(TanahPeer::TABLE_NAME);
            }

        } else { // $values is Tanah object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(TanahPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the tanah table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(TanahPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(TanahPeer::TABLE_NAME, $con, TanahPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            TanahPeer::clearInstancePool();
            TanahPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a Tanah or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or Tanah object or primary key or array of primary keys
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
            $con = Propel::getConnection(TanahPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            TanahPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof Tanah) { // it's a model object
            // invalidate the cache for this single object
            TanahPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(TanahPeer::DATABASE_NAME);
            $criteria->add(TanahPeer::ID_TANAH, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                TanahPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(TanahPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            
            $affectedRows += BasePeer::doDelete($criteria, $con);
            TanahPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given Tanah object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      Tanah $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(TanahPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(TanahPeer::TABLE_NAME);

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

        return BasePeer::doValidate(TanahPeer::DATABASE_NAME, TanahPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      string $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return Tanah
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = TanahPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(TanahPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(TanahPeer::DATABASE_NAME);
        $criteria->add(TanahPeer::ID_TANAH, $pk);

        $v = TanahPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return Tanah[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(TanahPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(TanahPeer::DATABASE_NAME);
            $criteria->add(TanahPeer::ID_TANAH, $pks, Criteria::IN);
            $objs = TanahPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseTanahPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseTanahPeer::buildTableMap();

