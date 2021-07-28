<?php

namespace DataDikdas\Model\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use DataDikdas\Model\Bangunan;
use DataDikdas\Model\BangunanPeer;
use DataDikdas\Model\JenisHapusBukuPeer;
use DataDikdas\Model\JenisPrasaranaPeer;
use DataDikdas\Model\PtkPeer;
use DataDikdas\Model\SekolahPeer;
use DataDikdas\Model\StatusKepemilikanSarprasPeer;
use DataDikdas\Model\TanahPeer;
use DataDikdas\Model\map\BangunanTableMap;

/**
 * Base static class for performing query and update operations on the 'bangunan' table.
 *
 * 
 *
 * @package propel.generator.DataDikdas.Model.om
 */
abstract class BaseBangunanPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'pendataan';

    /** the table name for this class */
    const TABLE_NAME = 'bangunan';

    /** the related Propel class for this table */
    const OM_CLASS = 'DataDikdas\\Model\\Bangunan';

    /** the related TableMap class for this table */
    const TM_CLASS = 'BangunanTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 43;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 43;

    /** the column name for the id_bangunan field */
    const ID_BANGUNAN = 'bangunan.id_bangunan';

    /** the column name for the jenis_prasarana_id field */
    const JENIS_PRASARANA_ID = 'bangunan.jenis_prasarana_id';

    /** the column name for the sekolah_id field */
    const SEKOLAH_ID = 'bangunan.sekolah_id';

    /** the column name for the id_tanah field */
    const ID_TANAH = 'bangunan.id_tanah';

    /** the column name for the ptk_id field */
    const PTK_ID = 'bangunan.ptk_id';

    /** the column name for the id_hapus_buku field */
    const ID_HAPUS_BUKU = 'bangunan.id_hapus_buku';

    /** the column name for the kepemilikan_sarpras_id field */
    const KEPEMILIKAN_SARPRAS_ID = 'bangunan.kepemilikan_sarpras_id';

    /** the column name for the kd_kl field */
    const KD_KL = 'bangunan.kd_kl';

    /** the column name for the kd_satker field */
    const KD_SATKER = 'bangunan.kd_satker';

    /** the column name for the kd_brg field */
    const KD_BRG = 'bangunan.kd_brg';

    /** the column name for the nup field */
    const NUP = 'bangunan.nup';

    /** the column name for the kode_eselon1 field */
    const KODE_ESELON1 = 'bangunan.kode_eselon1';

    /** the column name for the nama_eselon1 field */
    const NAMA_ESELON1 = 'bangunan.nama_eselon1';

    /** the column name for the kode_sub_satker field */
    const KODE_SUB_SATKER = 'bangunan.kode_sub_satker';

    /** the column name for the nama_sub_satker field */
    const NAMA_SUB_SATKER = 'bangunan.nama_sub_satker';

    /** the column name for the nama field */
    const NAMA = 'bangunan.nama';

    /** the column name for the panjang field */
    const PANJANG = 'bangunan.panjang';

    /** the column name for the lebar field */
    const LEBAR = 'bangunan.lebar';

    /** the column name for the nilai_perolehan_aset field */
    const NILAI_PEROLEHAN_ASET = 'bangunan.nilai_perolehan_aset';

    /** the column name for the jml_lantai field */
    const JML_LANTAI = 'bangunan.jml_lantai';

    /** the column name for the thn_dibangun field */
    const THN_DIBANGUN = 'bangunan.thn_dibangun';

    /** the column name for the luas_tapak_bangunan field */
    const LUAS_TAPAK_BANGUNAN = 'bangunan.luas_tapak_bangunan';

    /** the column name for the vol_pondasi_m3 field */
    const VOL_PONDASI_M3 = 'bangunan.vol_pondasi_m3';

    /** the column name for the vol_sloop_kolom_balok_m3 field */
    const VOL_SLOOP_KOLOM_BALOK_M3 = 'bangunan.vol_sloop_kolom_balok_m3';

    /** the column name for the panj_kudakuda_m field */
    const PANJ_KUDAKUDA_M = 'bangunan.panj_kudakuda_m';

    /** the column name for the vol_kudakuda_m3 field */
    const VOL_KUDAKUDA_M3 = 'bangunan.vol_kudakuda_m3';

    /** the column name for the panj_kaso_m field */
    const PANJ_KASO_M = 'bangunan.panj_kaso_m';

    /** the column name for the panj_reng_m field */
    const PANJ_RENG_M = 'bangunan.panj_reng_m';

    /** the column name for the luas_tutup_atap_m2 field */
    const LUAS_TUTUP_ATAP_M2 = 'bangunan.luas_tutup_atap_m2';

    /** the column name for the kd_satker_tanah field */
    const KD_SATKER_TANAH = 'bangunan.kd_satker_tanah';

    /** the column name for the nm_satker_tanah field */
    const NM_SATKER_TANAH = 'bangunan.nm_satker_tanah';

    /** the column name for the kd_brg_tanah field */
    const KD_BRG_TANAH = 'bangunan.kd_brg_tanah';

    /** the column name for the nm_brg_tanah field */
    const NM_BRG_TANAH = 'bangunan.nm_brg_tanah';

    /** the column name for the nup_brg_tanah field */
    const NUP_BRG_TANAH = 'bangunan.nup_brg_tanah';

    /** the column name for the tgl_sk_pemakai field */
    const TGL_SK_PEMAKAI = 'bangunan.tgl_sk_pemakai';

    /** the column name for the tgl_hapus_buku field */
    const TGL_HAPUS_BUKU = 'bangunan.tgl_hapus_buku';

    /** the column name for the ket_bangunan field */
    const KET_BANGUNAN = 'bangunan.ket_bangunan';

    /** the column name for the asal_data field */
    const ASAL_DATA = 'bangunan.asal_data';

    /** the column name for the create_date field */
    const CREATE_DATE = 'bangunan.create_date';

    /** the column name for the last_update field */
    const LAST_UPDATE = 'bangunan.last_update';

    /** the column name for the soft_delete field */
    const SOFT_DELETE = 'bangunan.soft_delete';

    /** the column name for the last_sync field */
    const LAST_SYNC = 'bangunan.last_sync';

    /** the column name for the updater_id field */
    const UPDATER_ID = 'bangunan.updater_id';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of Bangunan objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array Bangunan[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. BangunanPeer::$fieldNames[BangunanPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('IdBangunan', 'JenisPrasaranaId', 'SekolahId', 'IdTanah', 'PtkId', 'IdHapusBuku', 'KepemilikanSarprasId', 'KdKl', 'KdSatker', 'KdBrg', 'Nup', 'KodeEselon1', 'NamaEselon1', 'KodeSubSatker', 'NamaSubSatker', 'Nama', 'Panjang', 'Lebar', 'NilaiPerolehanAset', 'JmlLantai', 'ThnDibangun', 'LuasTapakBangunan', 'VolPondasiM3', 'VolSloopKolomBalokM3', 'PanjKudakudaM', 'VolKudakudaM3', 'PanjKasoM', 'PanjRengM', 'LuasTutupAtapM2', 'KdSatkerTanah', 'NmSatkerTanah', 'KdBrgTanah', 'NmBrgTanah', 'NupBrgTanah', 'TglSkPemakai', 'TglHapusBuku', 'KetBangunan', 'AsalData', 'CreateDate', 'LastUpdate', 'SoftDelete', 'LastSync', 'UpdaterId', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idBangunan', 'jenisPrasaranaId', 'sekolahId', 'idTanah', 'ptkId', 'idHapusBuku', 'kepemilikanSarprasId', 'kdKl', 'kdSatker', 'kdBrg', 'nup', 'kodeEselon1', 'namaEselon1', 'kodeSubSatker', 'namaSubSatker', 'nama', 'panjang', 'lebar', 'nilaiPerolehanAset', 'jmlLantai', 'thnDibangun', 'luasTapakBangunan', 'volPondasiM3', 'volSloopKolomBalokM3', 'panjKudakudaM', 'volKudakudaM3', 'panjKasoM', 'panjRengM', 'luasTutupAtapM2', 'kdSatkerTanah', 'nmSatkerTanah', 'kdBrgTanah', 'nmBrgTanah', 'nupBrgTanah', 'tglSkPemakai', 'tglHapusBuku', 'ketBangunan', 'asalData', 'createDate', 'lastUpdate', 'softDelete', 'lastSync', 'updaterId', ),
        BasePeer::TYPE_COLNAME => array (BangunanPeer::ID_BANGUNAN, BangunanPeer::JENIS_PRASARANA_ID, BangunanPeer::SEKOLAH_ID, BangunanPeer::ID_TANAH, BangunanPeer::PTK_ID, BangunanPeer::ID_HAPUS_BUKU, BangunanPeer::KEPEMILIKAN_SARPRAS_ID, BangunanPeer::KD_KL, BangunanPeer::KD_SATKER, BangunanPeer::KD_BRG, BangunanPeer::NUP, BangunanPeer::KODE_ESELON1, BangunanPeer::NAMA_ESELON1, BangunanPeer::KODE_SUB_SATKER, BangunanPeer::NAMA_SUB_SATKER, BangunanPeer::NAMA, BangunanPeer::PANJANG, BangunanPeer::LEBAR, BangunanPeer::NILAI_PEROLEHAN_ASET, BangunanPeer::JML_LANTAI, BangunanPeer::THN_DIBANGUN, BangunanPeer::LUAS_TAPAK_BANGUNAN, BangunanPeer::VOL_PONDASI_M3, BangunanPeer::VOL_SLOOP_KOLOM_BALOK_M3, BangunanPeer::PANJ_KUDAKUDA_M, BangunanPeer::VOL_KUDAKUDA_M3, BangunanPeer::PANJ_KASO_M, BangunanPeer::PANJ_RENG_M, BangunanPeer::LUAS_TUTUP_ATAP_M2, BangunanPeer::KD_SATKER_TANAH, BangunanPeer::NM_SATKER_TANAH, BangunanPeer::KD_BRG_TANAH, BangunanPeer::NM_BRG_TANAH, BangunanPeer::NUP_BRG_TANAH, BangunanPeer::TGL_SK_PEMAKAI, BangunanPeer::TGL_HAPUS_BUKU, BangunanPeer::KET_BANGUNAN, BangunanPeer::ASAL_DATA, BangunanPeer::CREATE_DATE, BangunanPeer::LAST_UPDATE, BangunanPeer::SOFT_DELETE, BangunanPeer::LAST_SYNC, BangunanPeer::UPDATER_ID, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID_BANGUNAN', 'JENIS_PRASARANA_ID', 'SEKOLAH_ID', 'ID_TANAH', 'PTK_ID', 'ID_HAPUS_BUKU', 'KEPEMILIKAN_SARPRAS_ID', 'KD_KL', 'KD_SATKER', 'KD_BRG', 'NUP', 'KODE_ESELON1', 'NAMA_ESELON1', 'KODE_SUB_SATKER', 'NAMA_SUB_SATKER', 'NAMA', 'PANJANG', 'LEBAR', 'NILAI_PEROLEHAN_ASET', 'JML_LANTAI', 'THN_DIBANGUN', 'LUAS_TAPAK_BANGUNAN', 'VOL_PONDASI_M3', 'VOL_SLOOP_KOLOM_BALOK_M3', 'PANJ_KUDAKUDA_M', 'VOL_KUDAKUDA_M3', 'PANJ_KASO_M', 'PANJ_RENG_M', 'LUAS_TUTUP_ATAP_M2', 'KD_SATKER_TANAH', 'NM_SATKER_TANAH', 'KD_BRG_TANAH', 'NM_BRG_TANAH', 'NUP_BRG_TANAH', 'TGL_SK_PEMAKAI', 'TGL_HAPUS_BUKU', 'KET_BANGUNAN', 'ASAL_DATA', 'CREATE_DATE', 'LAST_UPDATE', 'SOFT_DELETE', 'LAST_SYNC', 'UPDATER_ID', ),
        BasePeer::TYPE_FIELDNAME => array ('id_bangunan', 'jenis_prasarana_id', 'sekolah_id', 'id_tanah', 'ptk_id', 'id_hapus_buku', 'kepemilikan_sarpras_id', 'kd_kl', 'kd_satker', 'kd_brg', 'nup', 'kode_eselon1', 'nama_eselon1', 'kode_sub_satker', 'nama_sub_satker', 'nama', 'panjang', 'lebar', 'nilai_perolehan_aset', 'jml_lantai', 'thn_dibangun', 'luas_tapak_bangunan', 'vol_pondasi_m3', 'vol_sloop_kolom_balok_m3', 'panj_kudakuda_m', 'vol_kudakuda_m3', 'panj_kaso_m', 'panj_reng_m', 'luas_tutup_atap_m2', 'kd_satker_tanah', 'nm_satker_tanah', 'kd_brg_tanah', 'nm_brg_tanah', 'nup_brg_tanah', 'tgl_sk_pemakai', 'tgl_hapus_buku', 'ket_bangunan', 'asal_data', 'create_date', 'last_update', 'soft_delete', 'last_sync', 'updater_id', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. BangunanPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('IdBangunan' => 0, 'JenisPrasaranaId' => 1, 'SekolahId' => 2, 'IdTanah' => 3, 'PtkId' => 4, 'IdHapusBuku' => 5, 'KepemilikanSarprasId' => 6, 'KdKl' => 7, 'KdSatker' => 8, 'KdBrg' => 9, 'Nup' => 10, 'KodeEselon1' => 11, 'NamaEselon1' => 12, 'KodeSubSatker' => 13, 'NamaSubSatker' => 14, 'Nama' => 15, 'Panjang' => 16, 'Lebar' => 17, 'NilaiPerolehanAset' => 18, 'JmlLantai' => 19, 'ThnDibangun' => 20, 'LuasTapakBangunan' => 21, 'VolPondasiM3' => 22, 'VolSloopKolomBalokM3' => 23, 'PanjKudakudaM' => 24, 'VolKudakudaM3' => 25, 'PanjKasoM' => 26, 'PanjRengM' => 27, 'LuasTutupAtapM2' => 28, 'KdSatkerTanah' => 29, 'NmSatkerTanah' => 30, 'KdBrgTanah' => 31, 'NmBrgTanah' => 32, 'NupBrgTanah' => 33, 'TglSkPemakai' => 34, 'TglHapusBuku' => 35, 'KetBangunan' => 36, 'AsalData' => 37, 'CreateDate' => 38, 'LastUpdate' => 39, 'SoftDelete' => 40, 'LastSync' => 41, 'UpdaterId' => 42, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idBangunan' => 0, 'jenisPrasaranaId' => 1, 'sekolahId' => 2, 'idTanah' => 3, 'ptkId' => 4, 'idHapusBuku' => 5, 'kepemilikanSarprasId' => 6, 'kdKl' => 7, 'kdSatker' => 8, 'kdBrg' => 9, 'nup' => 10, 'kodeEselon1' => 11, 'namaEselon1' => 12, 'kodeSubSatker' => 13, 'namaSubSatker' => 14, 'nama' => 15, 'panjang' => 16, 'lebar' => 17, 'nilaiPerolehanAset' => 18, 'jmlLantai' => 19, 'thnDibangun' => 20, 'luasTapakBangunan' => 21, 'volPondasiM3' => 22, 'volSloopKolomBalokM3' => 23, 'panjKudakudaM' => 24, 'volKudakudaM3' => 25, 'panjKasoM' => 26, 'panjRengM' => 27, 'luasTutupAtapM2' => 28, 'kdSatkerTanah' => 29, 'nmSatkerTanah' => 30, 'kdBrgTanah' => 31, 'nmBrgTanah' => 32, 'nupBrgTanah' => 33, 'tglSkPemakai' => 34, 'tglHapusBuku' => 35, 'ketBangunan' => 36, 'asalData' => 37, 'createDate' => 38, 'lastUpdate' => 39, 'softDelete' => 40, 'lastSync' => 41, 'updaterId' => 42, ),
        BasePeer::TYPE_COLNAME => array (BangunanPeer::ID_BANGUNAN => 0, BangunanPeer::JENIS_PRASARANA_ID => 1, BangunanPeer::SEKOLAH_ID => 2, BangunanPeer::ID_TANAH => 3, BangunanPeer::PTK_ID => 4, BangunanPeer::ID_HAPUS_BUKU => 5, BangunanPeer::KEPEMILIKAN_SARPRAS_ID => 6, BangunanPeer::KD_KL => 7, BangunanPeer::KD_SATKER => 8, BangunanPeer::KD_BRG => 9, BangunanPeer::NUP => 10, BangunanPeer::KODE_ESELON1 => 11, BangunanPeer::NAMA_ESELON1 => 12, BangunanPeer::KODE_SUB_SATKER => 13, BangunanPeer::NAMA_SUB_SATKER => 14, BangunanPeer::NAMA => 15, BangunanPeer::PANJANG => 16, BangunanPeer::LEBAR => 17, BangunanPeer::NILAI_PEROLEHAN_ASET => 18, BangunanPeer::JML_LANTAI => 19, BangunanPeer::THN_DIBANGUN => 20, BangunanPeer::LUAS_TAPAK_BANGUNAN => 21, BangunanPeer::VOL_PONDASI_M3 => 22, BangunanPeer::VOL_SLOOP_KOLOM_BALOK_M3 => 23, BangunanPeer::PANJ_KUDAKUDA_M => 24, BangunanPeer::VOL_KUDAKUDA_M3 => 25, BangunanPeer::PANJ_KASO_M => 26, BangunanPeer::PANJ_RENG_M => 27, BangunanPeer::LUAS_TUTUP_ATAP_M2 => 28, BangunanPeer::KD_SATKER_TANAH => 29, BangunanPeer::NM_SATKER_TANAH => 30, BangunanPeer::KD_BRG_TANAH => 31, BangunanPeer::NM_BRG_TANAH => 32, BangunanPeer::NUP_BRG_TANAH => 33, BangunanPeer::TGL_SK_PEMAKAI => 34, BangunanPeer::TGL_HAPUS_BUKU => 35, BangunanPeer::KET_BANGUNAN => 36, BangunanPeer::ASAL_DATA => 37, BangunanPeer::CREATE_DATE => 38, BangunanPeer::LAST_UPDATE => 39, BangunanPeer::SOFT_DELETE => 40, BangunanPeer::LAST_SYNC => 41, BangunanPeer::UPDATER_ID => 42, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID_BANGUNAN' => 0, 'JENIS_PRASARANA_ID' => 1, 'SEKOLAH_ID' => 2, 'ID_TANAH' => 3, 'PTK_ID' => 4, 'ID_HAPUS_BUKU' => 5, 'KEPEMILIKAN_SARPRAS_ID' => 6, 'KD_KL' => 7, 'KD_SATKER' => 8, 'KD_BRG' => 9, 'NUP' => 10, 'KODE_ESELON1' => 11, 'NAMA_ESELON1' => 12, 'KODE_SUB_SATKER' => 13, 'NAMA_SUB_SATKER' => 14, 'NAMA' => 15, 'PANJANG' => 16, 'LEBAR' => 17, 'NILAI_PEROLEHAN_ASET' => 18, 'JML_LANTAI' => 19, 'THN_DIBANGUN' => 20, 'LUAS_TAPAK_BANGUNAN' => 21, 'VOL_PONDASI_M3' => 22, 'VOL_SLOOP_KOLOM_BALOK_M3' => 23, 'PANJ_KUDAKUDA_M' => 24, 'VOL_KUDAKUDA_M3' => 25, 'PANJ_KASO_M' => 26, 'PANJ_RENG_M' => 27, 'LUAS_TUTUP_ATAP_M2' => 28, 'KD_SATKER_TANAH' => 29, 'NM_SATKER_TANAH' => 30, 'KD_BRG_TANAH' => 31, 'NM_BRG_TANAH' => 32, 'NUP_BRG_TANAH' => 33, 'TGL_SK_PEMAKAI' => 34, 'TGL_HAPUS_BUKU' => 35, 'KET_BANGUNAN' => 36, 'ASAL_DATA' => 37, 'CREATE_DATE' => 38, 'LAST_UPDATE' => 39, 'SOFT_DELETE' => 40, 'LAST_SYNC' => 41, 'UPDATER_ID' => 42, ),
        BasePeer::TYPE_FIELDNAME => array ('id_bangunan' => 0, 'jenis_prasarana_id' => 1, 'sekolah_id' => 2, 'id_tanah' => 3, 'ptk_id' => 4, 'id_hapus_buku' => 5, 'kepemilikan_sarpras_id' => 6, 'kd_kl' => 7, 'kd_satker' => 8, 'kd_brg' => 9, 'nup' => 10, 'kode_eselon1' => 11, 'nama_eselon1' => 12, 'kode_sub_satker' => 13, 'nama_sub_satker' => 14, 'nama' => 15, 'panjang' => 16, 'lebar' => 17, 'nilai_perolehan_aset' => 18, 'jml_lantai' => 19, 'thn_dibangun' => 20, 'luas_tapak_bangunan' => 21, 'vol_pondasi_m3' => 22, 'vol_sloop_kolom_balok_m3' => 23, 'panj_kudakuda_m' => 24, 'vol_kudakuda_m3' => 25, 'panj_kaso_m' => 26, 'panj_reng_m' => 27, 'luas_tutup_atap_m2' => 28, 'kd_satker_tanah' => 29, 'nm_satker_tanah' => 30, 'kd_brg_tanah' => 31, 'nm_brg_tanah' => 32, 'nup_brg_tanah' => 33, 'tgl_sk_pemakai' => 34, 'tgl_hapus_buku' => 35, 'ket_bangunan' => 36, 'asal_data' => 37, 'create_date' => 38, 'last_update' => 39, 'soft_delete' => 40, 'last_sync' => 41, 'updater_id' => 42, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, )
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
        $toNames = BangunanPeer::getFieldNames($toType);
        $key = isset(BangunanPeer::$fieldKeys[$fromType][$name]) ? BangunanPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(BangunanPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, BangunanPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return BangunanPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. BangunanPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(BangunanPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(BangunanPeer::ID_BANGUNAN);
            $criteria->addSelectColumn(BangunanPeer::JENIS_PRASARANA_ID);
            $criteria->addSelectColumn(BangunanPeer::SEKOLAH_ID);
            $criteria->addSelectColumn(BangunanPeer::ID_TANAH);
            $criteria->addSelectColumn(BangunanPeer::PTK_ID);
            $criteria->addSelectColumn(BangunanPeer::ID_HAPUS_BUKU);
            $criteria->addSelectColumn(BangunanPeer::KEPEMILIKAN_SARPRAS_ID);
            $criteria->addSelectColumn(BangunanPeer::KD_KL);
            $criteria->addSelectColumn(BangunanPeer::KD_SATKER);
            $criteria->addSelectColumn(BangunanPeer::KD_BRG);
            $criteria->addSelectColumn(BangunanPeer::NUP);
            $criteria->addSelectColumn(BangunanPeer::KODE_ESELON1);
            $criteria->addSelectColumn(BangunanPeer::NAMA_ESELON1);
            $criteria->addSelectColumn(BangunanPeer::KODE_SUB_SATKER);
            $criteria->addSelectColumn(BangunanPeer::NAMA_SUB_SATKER);
            $criteria->addSelectColumn(BangunanPeer::NAMA);
            $criteria->addSelectColumn(BangunanPeer::PANJANG);
            $criteria->addSelectColumn(BangunanPeer::LEBAR);
            $criteria->addSelectColumn(BangunanPeer::NILAI_PEROLEHAN_ASET);
            $criteria->addSelectColumn(BangunanPeer::JML_LANTAI);
            $criteria->addSelectColumn(BangunanPeer::THN_DIBANGUN);
            $criteria->addSelectColumn(BangunanPeer::LUAS_TAPAK_BANGUNAN);
            $criteria->addSelectColumn(BangunanPeer::VOL_PONDASI_M3);
            $criteria->addSelectColumn(BangunanPeer::VOL_SLOOP_KOLOM_BALOK_M3);
            $criteria->addSelectColumn(BangunanPeer::PANJ_KUDAKUDA_M);
            $criteria->addSelectColumn(BangunanPeer::VOL_KUDAKUDA_M3);
            $criteria->addSelectColumn(BangunanPeer::PANJ_KASO_M);
            $criteria->addSelectColumn(BangunanPeer::PANJ_RENG_M);
            $criteria->addSelectColumn(BangunanPeer::LUAS_TUTUP_ATAP_M2);
            $criteria->addSelectColumn(BangunanPeer::KD_SATKER_TANAH);
            $criteria->addSelectColumn(BangunanPeer::NM_SATKER_TANAH);
            $criteria->addSelectColumn(BangunanPeer::KD_BRG_TANAH);
            $criteria->addSelectColumn(BangunanPeer::NM_BRG_TANAH);
            $criteria->addSelectColumn(BangunanPeer::NUP_BRG_TANAH);
            $criteria->addSelectColumn(BangunanPeer::TGL_SK_PEMAKAI);
            $criteria->addSelectColumn(BangunanPeer::TGL_HAPUS_BUKU);
            $criteria->addSelectColumn(BangunanPeer::KET_BANGUNAN);
            $criteria->addSelectColumn(BangunanPeer::ASAL_DATA);
            $criteria->addSelectColumn(BangunanPeer::CREATE_DATE);
            $criteria->addSelectColumn(BangunanPeer::LAST_UPDATE);
            $criteria->addSelectColumn(BangunanPeer::SOFT_DELETE);
            $criteria->addSelectColumn(BangunanPeer::LAST_SYNC);
            $criteria->addSelectColumn(BangunanPeer::UPDATER_ID);
        } else {
            $criteria->addSelectColumn($alias . '.id_bangunan');
            $criteria->addSelectColumn($alias . '.jenis_prasarana_id');
            $criteria->addSelectColumn($alias . '.sekolah_id');
            $criteria->addSelectColumn($alias . '.id_tanah');
            $criteria->addSelectColumn($alias . '.ptk_id');
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
            $criteria->addSelectColumn($alias . '.jml_lantai');
            $criteria->addSelectColumn($alias . '.thn_dibangun');
            $criteria->addSelectColumn($alias . '.luas_tapak_bangunan');
            $criteria->addSelectColumn($alias . '.vol_pondasi_m3');
            $criteria->addSelectColumn($alias . '.vol_sloop_kolom_balok_m3');
            $criteria->addSelectColumn($alias . '.panj_kudakuda_m');
            $criteria->addSelectColumn($alias . '.vol_kudakuda_m3');
            $criteria->addSelectColumn($alias . '.panj_kaso_m');
            $criteria->addSelectColumn($alias . '.panj_reng_m');
            $criteria->addSelectColumn($alias . '.luas_tutup_atap_m2');
            $criteria->addSelectColumn($alias . '.kd_satker_tanah');
            $criteria->addSelectColumn($alias . '.nm_satker_tanah');
            $criteria->addSelectColumn($alias . '.kd_brg_tanah');
            $criteria->addSelectColumn($alias . '.nm_brg_tanah');
            $criteria->addSelectColumn($alias . '.nup_brg_tanah');
            $criteria->addSelectColumn($alias . '.tgl_sk_pemakai');
            $criteria->addSelectColumn($alias . '.tgl_hapus_buku');
            $criteria->addSelectColumn($alias . '.ket_bangunan');
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
        $criteria->setPrimaryTableName(BangunanPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            BangunanPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(BangunanPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(BangunanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Bangunan
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = BangunanPeer::doSelect($critcopy, $con);
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
        return BangunanPeer::populateObjects(BangunanPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(BangunanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            BangunanPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(BangunanPeer::DATABASE_NAME);

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
     * @param      Bangunan $obj A Bangunan object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getIdBangunan();
            } // if key === null
            BangunanPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A Bangunan object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof Bangunan) {
                $key = (string) $value->getIdBangunan();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Bangunan object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(BangunanPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   Bangunan Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(BangunanPeer::$instances[$key])) {
                return BangunanPeer::$instances[$key];
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
        foreach (BangunanPeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        BangunanPeer::$instances = array();
    }
    
    /**
     * Method to invalidate the instance pool of all tables related to bangunan
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
        $cls = BangunanPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = BangunanPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = BangunanPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                BangunanPeer::addInstanceToPool($obj, $key);
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
     * @return array (Bangunan object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = BangunanPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = BangunanPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + BangunanPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = BangunanPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            BangunanPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }


    /**
     * Returns the number of rows matching criteria, joining the related Ptk table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinPtk(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(BangunanPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            BangunanPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(BangunanPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(BangunanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(BangunanPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

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
        $criteria->setPrimaryTableName(BangunanPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            BangunanPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(BangunanPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(BangunanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(BangunanPeer::ID_HAPUS_BUKU, JenisHapusBukuPeer::ID_HAPUS_BUKU, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related Tanah table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinTanah(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(BangunanPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            BangunanPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(BangunanPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(BangunanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(BangunanPeer::ID_TANAH, TanahPeer::ID_TANAH, $join_behavior);

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
        $criteria->setPrimaryTableName(BangunanPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            BangunanPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(BangunanPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(BangunanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(BangunanPeer::JENIS_PRASARANA_ID, JenisPrasaranaPeer::JENIS_PRASARANA_ID, $join_behavior);

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
        $criteria->setPrimaryTableName(BangunanPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            BangunanPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(BangunanPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(BangunanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(BangunanPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

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
        $criteria->setPrimaryTableName(BangunanPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            BangunanPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(BangunanPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(BangunanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(BangunanPeer::KEPEMILIKAN_SARPRAS_ID, StatusKepemilikanSarprasPeer::KEPEMILIKAN_SARPRAS_ID, $join_behavior);

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
     * Selects a collection of Bangunan objects pre-filled with their Ptk objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Bangunan objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinPtk(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(BangunanPeer::DATABASE_NAME);
        }

        BangunanPeer::addSelectColumns($criteria);
        $startcol = BangunanPeer::NUM_HYDRATE_COLUMNS;
        PtkPeer::addSelectColumns($criteria);

        $criteria->addJoin(BangunanPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = BangunanPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = BangunanPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = BangunanPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                BangunanPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = PtkPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = PtkPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = PtkPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    PtkPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Bangunan) to $obj2 (Ptk)
                $obj2->addBangunan($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Bangunan objects pre-filled with their JenisHapusBuku objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Bangunan objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinJenisHapusBuku(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(BangunanPeer::DATABASE_NAME);
        }

        BangunanPeer::addSelectColumns($criteria);
        $startcol = BangunanPeer::NUM_HYDRATE_COLUMNS;
        JenisHapusBukuPeer::addSelectColumns($criteria);

        $criteria->addJoin(BangunanPeer::ID_HAPUS_BUKU, JenisHapusBukuPeer::ID_HAPUS_BUKU, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = BangunanPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = BangunanPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = BangunanPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                BangunanPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Bangunan) to $obj2 (JenisHapusBuku)
                $obj2->addBangunan($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Bangunan objects pre-filled with their Tanah objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Bangunan objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinTanah(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(BangunanPeer::DATABASE_NAME);
        }

        BangunanPeer::addSelectColumns($criteria);
        $startcol = BangunanPeer::NUM_HYDRATE_COLUMNS;
        TanahPeer::addSelectColumns($criteria);

        $criteria->addJoin(BangunanPeer::ID_TANAH, TanahPeer::ID_TANAH, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = BangunanPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = BangunanPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = BangunanPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                BangunanPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = TanahPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = TanahPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = TanahPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    TanahPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Bangunan) to $obj2 (Tanah)
                $obj2->addBangunan($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Bangunan objects pre-filled with their JenisPrasarana objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Bangunan objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinJenisPrasarana(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(BangunanPeer::DATABASE_NAME);
        }

        BangunanPeer::addSelectColumns($criteria);
        $startcol = BangunanPeer::NUM_HYDRATE_COLUMNS;
        JenisPrasaranaPeer::addSelectColumns($criteria);

        $criteria->addJoin(BangunanPeer::JENIS_PRASARANA_ID, JenisPrasaranaPeer::JENIS_PRASARANA_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = BangunanPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = BangunanPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = BangunanPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                BangunanPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Bangunan) to $obj2 (JenisPrasarana)
                $obj2->addBangunan($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Bangunan objects pre-filled with their Sekolah objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Bangunan objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinSekolah(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(BangunanPeer::DATABASE_NAME);
        }

        BangunanPeer::addSelectColumns($criteria);
        $startcol = BangunanPeer::NUM_HYDRATE_COLUMNS;
        SekolahPeer::addSelectColumns($criteria);

        $criteria->addJoin(BangunanPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = BangunanPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = BangunanPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = BangunanPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                BangunanPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Bangunan) to $obj2 (Sekolah)
                $obj2->addBangunan($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Bangunan objects pre-filled with their StatusKepemilikanSarpras objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Bangunan objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinStatusKepemilikanSarpras(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(BangunanPeer::DATABASE_NAME);
        }

        BangunanPeer::addSelectColumns($criteria);
        $startcol = BangunanPeer::NUM_HYDRATE_COLUMNS;
        StatusKepemilikanSarprasPeer::addSelectColumns($criteria);

        $criteria->addJoin(BangunanPeer::KEPEMILIKAN_SARPRAS_ID, StatusKepemilikanSarprasPeer::KEPEMILIKAN_SARPRAS_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = BangunanPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = BangunanPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = BangunanPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                BangunanPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Bangunan) to $obj2 (StatusKepemilikanSarpras)
                $obj2->addBangunan($obj1);

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
        $criteria->setPrimaryTableName(BangunanPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            BangunanPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(BangunanPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(BangunanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(BangunanPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $criteria->addJoin(BangunanPeer::ID_HAPUS_BUKU, JenisHapusBukuPeer::ID_HAPUS_BUKU, $join_behavior);

        $criteria->addJoin(BangunanPeer::ID_TANAH, TanahPeer::ID_TANAH, $join_behavior);

        $criteria->addJoin(BangunanPeer::JENIS_PRASARANA_ID, JenisPrasaranaPeer::JENIS_PRASARANA_ID, $join_behavior);

        $criteria->addJoin(BangunanPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $criteria->addJoin(BangunanPeer::KEPEMILIKAN_SARPRAS_ID, StatusKepemilikanSarprasPeer::KEPEMILIKAN_SARPRAS_ID, $join_behavior);

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
     * Selects a collection of Bangunan objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Bangunan objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(BangunanPeer::DATABASE_NAME);
        }

        BangunanPeer::addSelectColumns($criteria);
        $startcol2 = BangunanPeer::NUM_HYDRATE_COLUMNS;

        PtkPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + PtkPeer::NUM_HYDRATE_COLUMNS;

        JenisHapusBukuPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + JenisHapusBukuPeer::NUM_HYDRATE_COLUMNS;

        TanahPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + TanahPeer::NUM_HYDRATE_COLUMNS;

        JenisPrasaranaPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + JenisPrasaranaPeer::NUM_HYDRATE_COLUMNS;

        SekolahPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + SekolahPeer::NUM_HYDRATE_COLUMNS;

        StatusKepemilikanSarprasPeer::addSelectColumns($criteria);
        $startcol8 = $startcol7 + StatusKepemilikanSarprasPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(BangunanPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $criteria->addJoin(BangunanPeer::ID_HAPUS_BUKU, JenisHapusBukuPeer::ID_HAPUS_BUKU, $join_behavior);

        $criteria->addJoin(BangunanPeer::ID_TANAH, TanahPeer::ID_TANAH, $join_behavior);

        $criteria->addJoin(BangunanPeer::JENIS_PRASARANA_ID, JenisPrasaranaPeer::JENIS_PRASARANA_ID, $join_behavior);

        $criteria->addJoin(BangunanPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $criteria->addJoin(BangunanPeer::KEPEMILIKAN_SARPRAS_ID, StatusKepemilikanSarprasPeer::KEPEMILIKAN_SARPRAS_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = BangunanPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = BangunanPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = BangunanPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                BangunanPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

            // Add objects for joined Ptk rows

            $key2 = PtkPeer::getPrimaryKeyHashFromRow($row, $startcol2);
            if ($key2 !== null) {
                $obj2 = PtkPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = PtkPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    PtkPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 loaded

                // Add the $obj1 (Bangunan) to the collection in $obj2 (Ptk)
                $obj2->addBangunan($obj1);
            } // if joined row not null

            // Add objects for joined JenisHapusBuku rows

            $key3 = JenisHapusBukuPeer::getPrimaryKeyHashFromRow($row, $startcol3);
            if ($key3 !== null) {
                $obj3 = JenisHapusBukuPeer::getInstanceFromPool($key3);
                if (!$obj3) {

                    $cls = JenisHapusBukuPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    JenisHapusBukuPeer::addInstanceToPool($obj3, $key3);
                } // if obj3 loaded

                // Add the $obj1 (Bangunan) to the collection in $obj3 (JenisHapusBuku)
                $obj3->addBangunan($obj1);
            } // if joined row not null

            // Add objects for joined Tanah rows

            $key4 = TanahPeer::getPrimaryKeyHashFromRow($row, $startcol4);
            if ($key4 !== null) {
                $obj4 = TanahPeer::getInstanceFromPool($key4);
                if (!$obj4) {

                    $cls = TanahPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    TanahPeer::addInstanceToPool($obj4, $key4);
                } // if obj4 loaded

                // Add the $obj1 (Bangunan) to the collection in $obj4 (Tanah)
                $obj4->addBangunan($obj1);
            } // if joined row not null

            // Add objects for joined JenisPrasarana rows

            $key5 = JenisPrasaranaPeer::getPrimaryKeyHashFromRow($row, $startcol5);
            if ($key5 !== null) {
                $obj5 = JenisPrasaranaPeer::getInstanceFromPool($key5);
                if (!$obj5) {

                    $cls = JenisPrasaranaPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    JenisPrasaranaPeer::addInstanceToPool($obj5, $key5);
                } // if obj5 loaded

                // Add the $obj1 (Bangunan) to the collection in $obj5 (JenisPrasarana)
                $obj5->addBangunan($obj1);
            } // if joined row not null

            // Add objects for joined Sekolah rows

            $key6 = SekolahPeer::getPrimaryKeyHashFromRow($row, $startcol6);
            if ($key6 !== null) {
                $obj6 = SekolahPeer::getInstanceFromPool($key6);
                if (!$obj6) {

                    $cls = SekolahPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    SekolahPeer::addInstanceToPool($obj6, $key6);
                } // if obj6 loaded

                // Add the $obj1 (Bangunan) to the collection in $obj6 (Sekolah)
                $obj6->addBangunan($obj1);
            } // if joined row not null

            // Add objects for joined StatusKepemilikanSarpras rows

            $key7 = StatusKepemilikanSarprasPeer::getPrimaryKeyHashFromRow($row, $startcol7);
            if ($key7 !== null) {
                $obj7 = StatusKepemilikanSarprasPeer::getInstanceFromPool($key7);
                if (!$obj7) {

                    $cls = StatusKepemilikanSarprasPeer::getOMClass();

                    $obj7 = new $cls();
                    $obj7->hydrate($row, $startcol7);
                    StatusKepemilikanSarprasPeer::addInstanceToPool($obj7, $key7);
                } // if obj7 loaded

                // Add the $obj1 (Bangunan) to the collection in $obj7 (StatusKepemilikanSarpras)
                $obj7->addBangunan($obj1);
            } // if joined row not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Returns the number of rows matching criteria, joining the related Ptk table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptPtk(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(BangunanPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            BangunanPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(BangunanPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(BangunanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(BangunanPeer::ID_HAPUS_BUKU, JenisHapusBukuPeer::ID_HAPUS_BUKU, $join_behavior);

        $criteria->addJoin(BangunanPeer::ID_TANAH, TanahPeer::ID_TANAH, $join_behavior);

        $criteria->addJoin(BangunanPeer::JENIS_PRASARANA_ID, JenisPrasaranaPeer::JENIS_PRASARANA_ID, $join_behavior);

        $criteria->addJoin(BangunanPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $criteria->addJoin(BangunanPeer::KEPEMILIKAN_SARPRAS_ID, StatusKepemilikanSarprasPeer::KEPEMILIKAN_SARPRAS_ID, $join_behavior);

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
        $criteria->setPrimaryTableName(BangunanPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            BangunanPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(BangunanPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(BangunanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(BangunanPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $criteria->addJoin(BangunanPeer::ID_TANAH, TanahPeer::ID_TANAH, $join_behavior);

        $criteria->addJoin(BangunanPeer::JENIS_PRASARANA_ID, JenisPrasaranaPeer::JENIS_PRASARANA_ID, $join_behavior);

        $criteria->addJoin(BangunanPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $criteria->addJoin(BangunanPeer::KEPEMILIKAN_SARPRAS_ID, StatusKepemilikanSarprasPeer::KEPEMILIKAN_SARPRAS_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related Tanah table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptTanah(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(BangunanPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            BangunanPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(BangunanPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(BangunanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(BangunanPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $criteria->addJoin(BangunanPeer::ID_HAPUS_BUKU, JenisHapusBukuPeer::ID_HAPUS_BUKU, $join_behavior);

        $criteria->addJoin(BangunanPeer::JENIS_PRASARANA_ID, JenisPrasaranaPeer::JENIS_PRASARANA_ID, $join_behavior);

        $criteria->addJoin(BangunanPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $criteria->addJoin(BangunanPeer::KEPEMILIKAN_SARPRAS_ID, StatusKepemilikanSarprasPeer::KEPEMILIKAN_SARPRAS_ID, $join_behavior);

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
        $criteria->setPrimaryTableName(BangunanPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            BangunanPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(BangunanPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(BangunanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(BangunanPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $criteria->addJoin(BangunanPeer::ID_HAPUS_BUKU, JenisHapusBukuPeer::ID_HAPUS_BUKU, $join_behavior);

        $criteria->addJoin(BangunanPeer::ID_TANAH, TanahPeer::ID_TANAH, $join_behavior);

        $criteria->addJoin(BangunanPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $criteria->addJoin(BangunanPeer::KEPEMILIKAN_SARPRAS_ID, StatusKepemilikanSarprasPeer::KEPEMILIKAN_SARPRAS_ID, $join_behavior);

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
        $criteria->setPrimaryTableName(BangunanPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            BangunanPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(BangunanPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(BangunanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(BangunanPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $criteria->addJoin(BangunanPeer::ID_HAPUS_BUKU, JenisHapusBukuPeer::ID_HAPUS_BUKU, $join_behavior);

        $criteria->addJoin(BangunanPeer::ID_TANAH, TanahPeer::ID_TANAH, $join_behavior);

        $criteria->addJoin(BangunanPeer::JENIS_PRASARANA_ID, JenisPrasaranaPeer::JENIS_PRASARANA_ID, $join_behavior);

        $criteria->addJoin(BangunanPeer::KEPEMILIKAN_SARPRAS_ID, StatusKepemilikanSarprasPeer::KEPEMILIKAN_SARPRAS_ID, $join_behavior);

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
        $criteria->setPrimaryTableName(BangunanPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            BangunanPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(BangunanPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(BangunanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(BangunanPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $criteria->addJoin(BangunanPeer::ID_HAPUS_BUKU, JenisHapusBukuPeer::ID_HAPUS_BUKU, $join_behavior);

        $criteria->addJoin(BangunanPeer::ID_TANAH, TanahPeer::ID_TANAH, $join_behavior);

        $criteria->addJoin(BangunanPeer::JENIS_PRASARANA_ID, JenisPrasaranaPeer::JENIS_PRASARANA_ID, $join_behavior);

        $criteria->addJoin(BangunanPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

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
     * Selects a collection of Bangunan objects pre-filled with all related objects except Ptk.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Bangunan objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptPtk(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(BangunanPeer::DATABASE_NAME);
        }

        BangunanPeer::addSelectColumns($criteria);
        $startcol2 = BangunanPeer::NUM_HYDRATE_COLUMNS;

        JenisHapusBukuPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + JenisHapusBukuPeer::NUM_HYDRATE_COLUMNS;

        TanahPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + TanahPeer::NUM_HYDRATE_COLUMNS;

        JenisPrasaranaPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + JenisPrasaranaPeer::NUM_HYDRATE_COLUMNS;

        SekolahPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + SekolahPeer::NUM_HYDRATE_COLUMNS;

        StatusKepemilikanSarprasPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + StatusKepemilikanSarprasPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(BangunanPeer::ID_HAPUS_BUKU, JenisHapusBukuPeer::ID_HAPUS_BUKU, $join_behavior);

        $criteria->addJoin(BangunanPeer::ID_TANAH, TanahPeer::ID_TANAH, $join_behavior);

        $criteria->addJoin(BangunanPeer::JENIS_PRASARANA_ID, JenisPrasaranaPeer::JENIS_PRASARANA_ID, $join_behavior);

        $criteria->addJoin(BangunanPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $criteria->addJoin(BangunanPeer::KEPEMILIKAN_SARPRAS_ID, StatusKepemilikanSarprasPeer::KEPEMILIKAN_SARPRAS_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = BangunanPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = BangunanPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = BangunanPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                BangunanPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Bangunan) to the collection in $obj2 (JenisHapusBuku)
                $obj2->addBangunan($obj1);

            } // if joined row is not null

                // Add objects for joined Tanah rows

                $key3 = TanahPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = TanahPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = TanahPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    TanahPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Bangunan) to the collection in $obj3 (Tanah)
                $obj3->addBangunan($obj1);

            } // if joined row is not null

                // Add objects for joined JenisPrasarana rows

                $key4 = JenisPrasaranaPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = JenisPrasaranaPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = JenisPrasaranaPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    JenisPrasaranaPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (Bangunan) to the collection in $obj4 (JenisPrasarana)
                $obj4->addBangunan($obj1);

            } // if joined row is not null

                // Add objects for joined Sekolah rows

                $key5 = SekolahPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = SekolahPeer::getInstanceFromPool($key5);
                    if (!$obj5) {
    
                        $cls = SekolahPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    SekolahPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (Bangunan) to the collection in $obj5 (Sekolah)
                $obj5->addBangunan($obj1);

            } // if joined row is not null

                // Add objects for joined StatusKepemilikanSarpras rows

                $key6 = StatusKepemilikanSarprasPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = StatusKepemilikanSarprasPeer::getInstanceFromPool($key6);
                    if (!$obj6) {
    
                        $cls = StatusKepemilikanSarprasPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    StatusKepemilikanSarprasPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (Bangunan) to the collection in $obj6 (StatusKepemilikanSarpras)
                $obj6->addBangunan($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Bangunan objects pre-filled with all related objects except JenisHapusBuku.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Bangunan objects.
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
            $criteria->setDbName(BangunanPeer::DATABASE_NAME);
        }

        BangunanPeer::addSelectColumns($criteria);
        $startcol2 = BangunanPeer::NUM_HYDRATE_COLUMNS;

        PtkPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + PtkPeer::NUM_HYDRATE_COLUMNS;

        TanahPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + TanahPeer::NUM_HYDRATE_COLUMNS;

        JenisPrasaranaPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + JenisPrasaranaPeer::NUM_HYDRATE_COLUMNS;

        SekolahPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + SekolahPeer::NUM_HYDRATE_COLUMNS;

        StatusKepemilikanSarprasPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + StatusKepemilikanSarprasPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(BangunanPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $criteria->addJoin(BangunanPeer::ID_TANAH, TanahPeer::ID_TANAH, $join_behavior);

        $criteria->addJoin(BangunanPeer::JENIS_PRASARANA_ID, JenisPrasaranaPeer::JENIS_PRASARANA_ID, $join_behavior);

        $criteria->addJoin(BangunanPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $criteria->addJoin(BangunanPeer::KEPEMILIKAN_SARPRAS_ID, StatusKepemilikanSarprasPeer::KEPEMILIKAN_SARPRAS_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = BangunanPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = BangunanPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = BangunanPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                BangunanPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Ptk rows

                $key2 = PtkPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = PtkPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = PtkPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    PtkPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Bangunan) to the collection in $obj2 (Ptk)
                $obj2->addBangunan($obj1);

            } // if joined row is not null

                // Add objects for joined Tanah rows

                $key3 = TanahPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = TanahPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = TanahPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    TanahPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Bangunan) to the collection in $obj3 (Tanah)
                $obj3->addBangunan($obj1);

            } // if joined row is not null

                // Add objects for joined JenisPrasarana rows

                $key4 = JenisPrasaranaPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = JenisPrasaranaPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = JenisPrasaranaPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    JenisPrasaranaPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (Bangunan) to the collection in $obj4 (JenisPrasarana)
                $obj4->addBangunan($obj1);

            } // if joined row is not null

                // Add objects for joined Sekolah rows

                $key5 = SekolahPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = SekolahPeer::getInstanceFromPool($key5);
                    if (!$obj5) {
    
                        $cls = SekolahPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    SekolahPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (Bangunan) to the collection in $obj5 (Sekolah)
                $obj5->addBangunan($obj1);

            } // if joined row is not null

                // Add objects for joined StatusKepemilikanSarpras rows

                $key6 = StatusKepemilikanSarprasPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = StatusKepemilikanSarprasPeer::getInstanceFromPool($key6);
                    if (!$obj6) {
    
                        $cls = StatusKepemilikanSarprasPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    StatusKepemilikanSarprasPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (Bangunan) to the collection in $obj6 (StatusKepemilikanSarpras)
                $obj6->addBangunan($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Bangunan objects pre-filled with all related objects except Tanah.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Bangunan objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptTanah(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(BangunanPeer::DATABASE_NAME);
        }

        BangunanPeer::addSelectColumns($criteria);
        $startcol2 = BangunanPeer::NUM_HYDRATE_COLUMNS;

        PtkPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + PtkPeer::NUM_HYDRATE_COLUMNS;

        JenisHapusBukuPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + JenisHapusBukuPeer::NUM_HYDRATE_COLUMNS;

        JenisPrasaranaPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + JenisPrasaranaPeer::NUM_HYDRATE_COLUMNS;

        SekolahPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + SekolahPeer::NUM_HYDRATE_COLUMNS;

        StatusKepemilikanSarprasPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + StatusKepemilikanSarprasPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(BangunanPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $criteria->addJoin(BangunanPeer::ID_HAPUS_BUKU, JenisHapusBukuPeer::ID_HAPUS_BUKU, $join_behavior);

        $criteria->addJoin(BangunanPeer::JENIS_PRASARANA_ID, JenisPrasaranaPeer::JENIS_PRASARANA_ID, $join_behavior);

        $criteria->addJoin(BangunanPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $criteria->addJoin(BangunanPeer::KEPEMILIKAN_SARPRAS_ID, StatusKepemilikanSarprasPeer::KEPEMILIKAN_SARPRAS_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = BangunanPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = BangunanPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = BangunanPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                BangunanPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Ptk rows

                $key2 = PtkPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = PtkPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = PtkPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    PtkPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Bangunan) to the collection in $obj2 (Ptk)
                $obj2->addBangunan($obj1);

            } // if joined row is not null

                // Add objects for joined JenisHapusBuku rows

                $key3 = JenisHapusBukuPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = JenisHapusBukuPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = JenisHapusBukuPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    JenisHapusBukuPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Bangunan) to the collection in $obj3 (JenisHapusBuku)
                $obj3->addBangunan($obj1);

            } // if joined row is not null

                // Add objects for joined JenisPrasarana rows

                $key4 = JenisPrasaranaPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = JenisPrasaranaPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = JenisPrasaranaPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    JenisPrasaranaPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (Bangunan) to the collection in $obj4 (JenisPrasarana)
                $obj4->addBangunan($obj1);

            } // if joined row is not null

                // Add objects for joined Sekolah rows

                $key5 = SekolahPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = SekolahPeer::getInstanceFromPool($key5);
                    if (!$obj5) {
    
                        $cls = SekolahPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    SekolahPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (Bangunan) to the collection in $obj5 (Sekolah)
                $obj5->addBangunan($obj1);

            } // if joined row is not null

                // Add objects for joined StatusKepemilikanSarpras rows

                $key6 = StatusKepemilikanSarprasPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = StatusKepemilikanSarprasPeer::getInstanceFromPool($key6);
                    if (!$obj6) {
    
                        $cls = StatusKepemilikanSarprasPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    StatusKepemilikanSarprasPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (Bangunan) to the collection in $obj6 (StatusKepemilikanSarpras)
                $obj6->addBangunan($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Bangunan objects pre-filled with all related objects except JenisPrasarana.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Bangunan objects.
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
            $criteria->setDbName(BangunanPeer::DATABASE_NAME);
        }

        BangunanPeer::addSelectColumns($criteria);
        $startcol2 = BangunanPeer::NUM_HYDRATE_COLUMNS;

        PtkPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + PtkPeer::NUM_HYDRATE_COLUMNS;

        JenisHapusBukuPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + JenisHapusBukuPeer::NUM_HYDRATE_COLUMNS;

        TanahPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + TanahPeer::NUM_HYDRATE_COLUMNS;

        SekolahPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + SekolahPeer::NUM_HYDRATE_COLUMNS;

        StatusKepemilikanSarprasPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + StatusKepemilikanSarprasPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(BangunanPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $criteria->addJoin(BangunanPeer::ID_HAPUS_BUKU, JenisHapusBukuPeer::ID_HAPUS_BUKU, $join_behavior);

        $criteria->addJoin(BangunanPeer::ID_TANAH, TanahPeer::ID_TANAH, $join_behavior);

        $criteria->addJoin(BangunanPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $criteria->addJoin(BangunanPeer::KEPEMILIKAN_SARPRAS_ID, StatusKepemilikanSarprasPeer::KEPEMILIKAN_SARPRAS_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = BangunanPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = BangunanPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = BangunanPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                BangunanPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Ptk rows

                $key2 = PtkPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = PtkPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = PtkPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    PtkPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Bangunan) to the collection in $obj2 (Ptk)
                $obj2->addBangunan($obj1);

            } // if joined row is not null

                // Add objects for joined JenisHapusBuku rows

                $key3 = JenisHapusBukuPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = JenisHapusBukuPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = JenisHapusBukuPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    JenisHapusBukuPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Bangunan) to the collection in $obj3 (JenisHapusBuku)
                $obj3->addBangunan($obj1);

            } // if joined row is not null

                // Add objects for joined Tanah rows

                $key4 = TanahPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = TanahPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = TanahPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    TanahPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (Bangunan) to the collection in $obj4 (Tanah)
                $obj4->addBangunan($obj1);

            } // if joined row is not null

                // Add objects for joined Sekolah rows

                $key5 = SekolahPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = SekolahPeer::getInstanceFromPool($key5);
                    if (!$obj5) {
    
                        $cls = SekolahPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    SekolahPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (Bangunan) to the collection in $obj5 (Sekolah)
                $obj5->addBangunan($obj1);

            } // if joined row is not null

                // Add objects for joined StatusKepemilikanSarpras rows

                $key6 = StatusKepemilikanSarprasPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = StatusKepemilikanSarprasPeer::getInstanceFromPool($key6);
                    if (!$obj6) {
    
                        $cls = StatusKepemilikanSarprasPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    StatusKepemilikanSarprasPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (Bangunan) to the collection in $obj6 (StatusKepemilikanSarpras)
                $obj6->addBangunan($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Bangunan objects pre-filled with all related objects except Sekolah.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Bangunan objects.
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
            $criteria->setDbName(BangunanPeer::DATABASE_NAME);
        }

        BangunanPeer::addSelectColumns($criteria);
        $startcol2 = BangunanPeer::NUM_HYDRATE_COLUMNS;

        PtkPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + PtkPeer::NUM_HYDRATE_COLUMNS;

        JenisHapusBukuPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + JenisHapusBukuPeer::NUM_HYDRATE_COLUMNS;

        TanahPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + TanahPeer::NUM_HYDRATE_COLUMNS;

        JenisPrasaranaPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + JenisPrasaranaPeer::NUM_HYDRATE_COLUMNS;

        StatusKepemilikanSarprasPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + StatusKepemilikanSarprasPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(BangunanPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $criteria->addJoin(BangunanPeer::ID_HAPUS_BUKU, JenisHapusBukuPeer::ID_HAPUS_BUKU, $join_behavior);

        $criteria->addJoin(BangunanPeer::ID_TANAH, TanahPeer::ID_TANAH, $join_behavior);

        $criteria->addJoin(BangunanPeer::JENIS_PRASARANA_ID, JenisPrasaranaPeer::JENIS_PRASARANA_ID, $join_behavior);

        $criteria->addJoin(BangunanPeer::KEPEMILIKAN_SARPRAS_ID, StatusKepemilikanSarprasPeer::KEPEMILIKAN_SARPRAS_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = BangunanPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = BangunanPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = BangunanPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                BangunanPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Ptk rows

                $key2 = PtkPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = PtkPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = PtkPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    PtkPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Bangunan) to the collection in $obj2 (Ptk)
                $obj2->addBangunan($obj1);

            } // if joined row is not null

                // Add objects for joined JenisHapusBuku rows

                $key3 = JenisHapusBukuPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = JenisHapusBukuPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = JenisHapusBukuPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    JenisHapusBukuPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Bangunan) to the collection in $obj3 (JenisHapusBuku)
                $obj3->addBangunan($obj1);

            } // if joined row is not null

                // Add objects for joined Tanah rows

                $key4 = TanahPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = TanahPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = TanahPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    TanahPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (Bangunan) to the collection in $obj4 (Tanah)
                $obj4->addBangunan($obj1);

            } // if joined row is not null

                // Add objects for joined JenisPrasarana rows

                $key5 = JenisPrasaranaPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = JenisPrasaranaPeer::getInstanceFromPool($key5);
                    if (!$obj5) {
    
                        $cls = JenisPrasaranaPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    JenisPrasaranaPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (Bangunan) to the collection in $obj5 (JenisPrasarana)
                $obj5->addBangunan($obj1);

            } // if joined row is not null

                // Add objects for joined StatusKepemilikanSarpras rows

                $key6 = StatusKepemilikanSarprasPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = StatusKepemilikanSarprasPeer::getInstanceFromPool($key6);
                    if (!$obj6) {
    
                        $cls = StatusKepemilikanSarprasPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    StatusKepemilikanSarprasPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (Bangunan) to the collection in $obj6 (StatusKepemilikanSarpras)
                $obj6->addBangunan($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Bangunan objects pre-filled with all related objects except StatusKepemilikanSarpras.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Bangunan objects.
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
            $criteria->setDbName(BangunanPeer::DATABASE_NAME);
        }

        BangunanPeer::addSelectColumns($criteria);
        $startcol2 = BangunanPeer::NUM_HYDRATE_COLUMNS;

        PtkPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + PtkPeer::NUM_HYDRATE_COLUMNS;

        JenisHapusBukuPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + JenisHapusBukuPeer::NUM_HYDRATE_COLUMNS;

        TanahPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + TanahPeer::NUM_HYDRATE_COLUMNS;

        JenisPrasaranaPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + JenisPrasaranaPeer::NUM_HYDRATE_COLUMNS;

        SekolahPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + SekolahPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(BangunanPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $criteria->addJoin(BangunanPeer::ID_HAPUS_BUKU, JenisHapusBukuPeer::ID_HAPUS_BUKU, $join_behavior);

        $criteria->addJoin(BangunanPeer::ID_TANAH, TanahPeer::ID_TANAH, $join_behavior);

        $criteria->addJoin(BangunanPeer::JENIS_PRASARANA_ID, JenisPrasaranaPeer::JENIS_PRASARANA_ID, $join_behavior);

        $criteria->addJoin(BangunanPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = BangunanPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = BangunanPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = BangunanPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                BangunanPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Ptk rows

                $key2 = PtkPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = PtkPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = PtkPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    PtkPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Bangunan) to the collection in $obj2 (Ptk)
                $obj2->addBangunan($obj1);

            } // if joined row is not null

                // Add objects for joined JenisHapusBuku rows

                $key3 = JenisHapusBukuPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = JenisHapusBukuPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = JenisHapusBukuPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    JenisHapusBukuPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Bangunan) to the collection in $obj3 (JenisHapusBuku)
                $obj3->addBangunan($obj1);

            } // if joined row is not null

                // Add objects for joined Tanah rows

                $key4 = TanahPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = TanahPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = TanahPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    TanahPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (Bangunan) to the collection in $obj4 (Tanah)
                $obj4->addBangunan($obj1);

            } // if joined row is not null

                // Add objects for joined JenisPrasarana rows

                $key5 = JenisPrasaranaPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = JenisPrasaranaPeer::getInstanceFromPool($key5);
                    if (!$obj5) {
    
                        $cls = JenisPrasaranaPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    JenisPrasaranaPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (Bangunan) to the collection in $obj5 (JenisPrasarana)
                $obj5->addBangunan($obj1);

            } // if joined row is not null

                // Add objects for joined Sekolah rows

                $key6 = SekolahPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = SekolahPeer::getInstanceFromPool($key6);
                    if (!$obj6) {
    
                        $cls = SekolahPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    SekolahPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (Bangunan) to the collection in $obj6 (Sekolah)
                $obj6->addBangunan($obj1);

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
        return Propel::getDatabaseMap(BangunanPeer::DATABASE_NAME)->getTable(BangunanPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseBangunanPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseBangunanPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new BangunanTableMap());
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
        return BangunanPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a Bangunan or Criteria object.
     *
     * @param      mixed $values Criteria or Bangunan object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(BangunanPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from Bangunan object
        }


        // Set the correct dbName
        $criteria->setDbName(BangunanPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a Bangunan or Criteria object.
     *
     * @param      mixed $values Criteria or Bangunan object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(BangunanPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(BangunanPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(BangunanPeer::ID_BANGUNAN);
            $value = $criteria->remove(BangunanPeer::ID_BANGUNAN);
            if ($value) {
                $selectCriteria->add(BangunanPeer::ID_BANGUNAN, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(BangunanPeer::TABLE_NAME);
            }

        } else { // $values is Bangunan object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(BangunanPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the bangunan table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(BangunanPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(BangunanPeer::TABLE_NAME, $con, BangunanPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            BangunanPeer::clearInstancePool();
            BangunanPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a Bangunan or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or Bangunan object or primary key or array of primary keys
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
            $con = Propel::getConnection(BangunanPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            BangunanPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof Bangunan) { // it's a model object
            // invalidate the cache for this single object
            BangunanPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(BangunanPeer::DATABASE_NAME);
            $criteria->add(BangunanPeer::ID_BANGUNAN, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                BangunanPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(BangunanPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            
            $affectedRows += BasePeer::doDelete($criteria, $con);
            BangunanPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given Bangunan object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      Bangunan $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(BangunanPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(BangunanPeer::TABLE_NAME);

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

        return BasePeer::doValidate(BangunanPeer::DATABASE_NAME, BangunanPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      string $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return Bangunan
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = BangunanPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(BangunanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(BangunanPeer::DATABASE_NAME);
        $criteria->add(BangunanPeer::ID_BANGUNAN, $pk);

        $v = BangunanPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return Bangunan[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(BangunanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(BangunanPeer::DATABASE_NAME);
            $criteria->add(BangunanPeer::ID_BANGUNAN, $pks, Criteria::IN);
            $objs = BangunanPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseBangunanPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseBangunanPeer::buildTableMap();

