<?php

namespace DataDikdas\Model\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use DataDikdas\Model\LembSertifikasiPeer;
use DataDikdas\Model\LembagaAkreditasiPeer;
use DataDikdas\Model\MstWilayahPeer;
use DataDikdas\Model\Pengguna;
use DataDikdas\Model\PenggunaPeer;
use DataDikdas\Model\map\PenggunaTableMap;

/**
 * Base static class for performing query and update operations on the 'man_akses.pengguna' table.
 *
 * 
 *
 * @package propel.generator.DataDikdas.Model.om
 */
abstract class BasePenggunaPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'pendataan';

    /** the table name for this class */
    const TABLE_NAME = 'man_akses.pengguna';

    /** the related Propel class for this table */
    const OM_CLASS = 'DataDikdas\\Model\\Pengguna';

    /** the related TableMap class for this table */
    const TM_CLASS = 'PenggunaTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 35;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 35;

    /** the column name for the pengguna_id field */
    const PENGGUNA_ID = 'man_akses.pengguna.pengguna_id';

    /** the column name for the sekolah_id field */
    const SEKOLAH_ID = 'man_akses.pengguna.sekolah_id';

    /** the column name for the lembaga_id field */
    const LEMBAGA_ID = 'man_akses.pengguna.lembaga_id';

    /** the column name for the yayasan_id field */
    const YAYASAN_ID = 'man_akses.pengguna.yayasan_id';

    /** the column name for the la_id field */
    const LA_ID = 'man_akses.pengguna.la_id';

    /** the column name for the dudi_id field */
    const DUDI_ID = 'man_akses.pengguna.dudi_id';

    /** the column name for the kode_lemb_sert field */
    const KODE_LEMB_SERT = 'man_akses.pengguna.kode_lemb_sert';

    /** the column name for the peserta_didik_id field */
    const PESERTA_DIDIK_ID = 'man_akses.pengguna.peserta_didik_id';

    /** the column name for the username field */
    const USERNAME = 'man_akses.pengguna.username';

    /** the column name for the a_bot field */
    const A_BOT = 'man_akses.pengguna.a_bot';

    /** the column name for the nama field */
    const NAMA = 'man_akses.pengguna.nama';

    /** the column name for the tempat_lahir field */
    const TEMPAT_LAHIR = 'man_akses.pengguna.tempat_lahir';

    /** the column name for the tgl_lahir field */
    const TGL_LAHIR = 'man_akses.pengguna.tgl_lahir';

    /** the column name for the jenis_kelamin field */
    const JENIS_KELAMIN = 'man_akses.pengguna.jenis_kelamin';

    /** the column name for the nip_nim field */
    const NIP_NIM = 'man_akses.pengguna.nip_nim';

    /** the column name for the jabatan_lembaga field */
    const JABATAN_LEMBAGA = 'man_akses.pengguna.jabatan_lembaga';

    /** the column name for the alamat field */
    const ALAMAT = 'man_akses.pengguna.alamat';

    /** the column name for the kode_wilayah field */
    const KODE_WILAYAH = 'man_akses.pengguna.kode_wilayah';

    /** the column name for the no_telepon field */
    const NO_TELEPON = 'man_akses.pengguna.no_telepon';

    /** the column name for the no_hp field */
    const NO_HP = 'man_akses.pengguna.no_hp';

    /** the column name for the approval_pengguna field */
    const APPROVAL_PENGGUNA = 'man_akses.pengguna.approval_pengguna';

    /** the column name for the aktif field */
    const AKTIF = 'man_akses.pengguna.aktif';

    /** the column name for the password field */
    const PASSWORD = 'man_akses.pengguna.password';

    /** the column name for the password_lama field */
    const PASSWORD_LAMA = 'man_akses.pengguna.password_lama';

    /** the column name for the tgl_ganti_pwd field */
    const TGL_GANTI_PWD = 'man_akses.pengguna.tgl_ganti_pwd';

    /** the column name for the id_sdm_pengguna field */
    const ID_SDM_PENGGUNA = 'man_akses.pengguna.id_sdm_pengguna';

    /** the column name for the id_pd_pengguna field */
    const ID_PD_PENGGUNA = 'man_akses.pengguna.id_pd_pengguna';

    /** the column name for the token_reg field */
    const TOKEN_REG = 'man_akses.pengguna.token_reg';

    /** the column name for the jabatan field */
    const JABATAN = 'man_akses.pengguna.jabatan';

    /** the column name for the ptk_id field */
    const PTK_ID = 'man_akses.pengguna.ptk_id';

    /** the column name for the create_date field */
    const CREATE_DATE = 'man_akses.pengguna.create_date';

    /** the column name for the last_update field */
    const LAST_UPDATE = 'man_akses.pengguna.last_update';

    /** the column name for the soft_delete field */
    const SOFT_DELETE = 'man_akses.pengguna.soft_delete';

    /** the column name for the last_sync field */
    const LAST_SYNC = 'man_akses.pengguna.last_sync';

    /** the column name for the updater_id field */
    const UPDATER_ID = 'man_akses.pengguna.updater_id';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of Pengguna objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array Pengguna[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. PenggunaPeer::$fieldNames[PenggunaPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('PenggunaId', 'SekolahId', 'LembagaId', 'YayasanId', 'LaId', 'DudiId', 'KodeLembSert', 'PesertaDidikId', 'Username', 'ABot', 'Nama', 'TempatLahir', 'TglLahir', 'JenisKelamin', 'NipNim', 'JabatanLembaga', 'Alamat', 'KodeWilayah', 'NoTelepon', 'NoHp', 'ApprovalPengguna', 'Aktif', 'Password', 'PasswordLama', 'TglGantiPwd', 'IdSdmPengguna', 'IdPdPengguna', 'TokenReg', 'Jabatan', 'PtkId', 'CreateDate', 'LastUpdate', 'SoftDelete', 'LastSync', 'UpdaterId', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('penggunaId', 'sekolahId', 'lembagaId', 'yayasanId', 'laId', 'dudiId', 'kodeLembSert', 'pesertaDidikId', 'username', 'aBot', 'nama', 'tempatLahir', 'tglLahir', 'jenisKelamin', 'nipNim', 'jabatanLembaga', 'alamat', 'kodeWilayah', 'noTelepon', 'noHp', 'approvalPengguna', 'aktif', 'password', 'passwordLama', 'tglGantiPwd', 'idSdmPengguna', 'idPdPengguna', 'tokenReg', 'jabatan', 'ptkId', 'createDate', 'lastUpdate', 'softDelete', 'lastSync', 'updaterId', ),
        BasePeer::TYPE_COLNAME => array (PenggunaPeer::PENGGUNA_ID, PenggunaPeer::SEKOLAH_ID, PenggunaPeer::LEMBAGA_ID, PenggunaPeer::YAYASAN_ID, PenggunaPeer::LA_ID, PenggunaPeer::DUDI_ID, PenggunaPeer::KODE_LEMB_SERT, PenggunaPeer::PESERTA_DIDIK_ID, PenggunaPeer::USERNAME, PenggunaPeer::A_BOT, PenggunaPeer::NAMA, PenggunaPeer::TEMPAT_LAHIR, PenggunaPeer::TGL_LAHIR, PenggunaPeer::JENIS_KELAMIN, PenggunaPeer::NIP_NIM, PenggunaPeer::JABATAN_LEMBAGA, PenggunaPeer::ALAMAT, PenggunaPeer::KODE_WILAYAH, PenggunaPeer::NO_TELEPON, PenggunaPeer::NO_HP, PenggunaPeer::APPROVAL_PENGGUNA, PenggunaPeer::AKTIF, PenggunaPeer::PASSWORD, PenggunaPeer::PASSWORD_LAMA, PenggunaPeer::TGL_GANTI_PWD, PenggunaPeer::ID_SDM_PENGGUNA, PenggunaPeer::ID_PD_PENGGUNA, PenggunaPeer::TOKEN_REG, PenggunaPeer::JABATAN, PenggunaPeer::PTK_ID, PenggunaPeer::CREATE_DATE, PenggunaPeer::LAST_UPDATE, PenggunaPeer::SOFT_DELETE, PenggunaPeer::LAST_SYNC, PenggunaPeer::UPDATER_ID, ),
        BasePeer::TYPE_RAW_COLNAME => array ('PENGGUNA_ID', 'SEKOLAH_ID', 'LEMBAGA_ID', 'YAYASAN_ID', 'LA_ID', 'DUDI_ID', 'KODE_LEMB_SERT', 'PESERTA_DIDIK_ID', 'USERNAME', 'A_BOT', 'NAMA', 'TEMPAT_LAHIR', 'TGL_LAHIR', 'JENIS_KELAMIN', 'NIP_NIM', 'JABATAN_LEMBAGA', 'ALAMAT', 'KODE_WILAYAH', 'NO_TELEPON', 'NO_HP', 'APPROVAL_PENGGUNA', 'AKTIF', 'PASSWORD', 'PASSWORD_LAMA', 'TGL_GANTI_PWD', 'ID_SDM_PENGGUNA', 'ID_PD_PENGGUNA', 'TOKEN_REG', 'JABATAN', 'PTK_ID', 'CREATE_DATE', 'LAST_UPDATE', 'SOFT_DELETE', 'LAST_SYNC', 'UPDATER_ID', ),
        BasePeer::TYPE_FIELDNAME => array ('pengguna_id', 'sekolah_id', 'lembaga_id', 'yayasan_id', 'la_id', 'dudi_id', 'kode_lemb_sert', 'peserta_didik_id', 'username', 'a_bot', 'nama', 'tempat_lahir', 'tgl_lahir', 'jenis_kelamin', 'nip_nim', 'jabatan_lembaga', 'alamat', 'kode_wilayah', 'no_telepon', 'no_hp', 'approval_pengguna', 'aktif', 'password', 'password_lama', 'tgl_ganti_pwd', 'id_sdm_pengguna', 'id_pd_pengguna', 'token_reg', 'jabatan', 'ptk_id', 'create_date', 'last_update', 'soft_delete', 'last_sync', 'updater_id', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. PenggunaPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('PenggunaId' => 0, 'SekolahId' => 1, 'LembagaId' => 2, 'YayasanId' => 3, 'LaId' => 4, 'DudiId' => 5, 'KodeLembSert' => 6, 'PesertaDidikId' => 7, 'Username' => 8, 'ABot' => 9, 'Nama' => 10, 'TempatLahir' => 11, 'TglLahir' => 12, 'JenisKelamin' => 13, 'NipNim' => 14, 'JabatanLembaga' => 15, 'Alamat' => 16, 'KodeWilayah' => 17, 'NoTelepon' => 18, 'NoHp' => 19, 'ApprovalPengguna' => 20, 'Aktif' => 21, 'Password' => 22, 'PasswordLama' => 23, 'TglGantiPwd' => 24, 'IdSdmPengguna' => 25, 'IdPdPengguna' => 26, 'TokenReg' => 27, 'Jabatan' => 28, 'PtkId' => 29, 'CreateDate' => 30, 'LastUpdate' => 31, 'SoftDelete' => 32, 'LastSync' => 33, 'UpdaterId' => 34, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('penggunaId' => 0, 'sekolahId' => 1, 'lembagaId' => 2, 'yayasanId' => 3, 'laId' => 4, 'dudiId' => 5, 'kodeLembSert' => 6, 'pesertaDidikId' => 7, 'username' => 8, 'aBot' => 9, 'nama' => 10, 'tempatLahir' => 11, 'tglLahir' => 12, 'jenisKelamin' => 13, 'nipNim' => 14, 'jabatanLembaga' => 15, 'alamat' => 16, 'kodeWilayah' => 17, 'noTelepon' => 18, 'noHp' => 19, 'approvalPengguna' => 20, 'aktif' => 21, 'password' => 22, 'passwordLama' => 23, 'tglGantiPwd' => 24, 'idSdmPengguna' => 25, 'idPdPengguna' => 26, 'tokenReg' => 27, 'jabatan' => 28, 'ptkId' => 29, 'createDate' => 30, 'lastUpdate' => 31, 'softDelete' => 32, 'lastSync' => 33, 'updaterId' => 34, ),
        BasePeer::TYPE_COLNAME => array (PenggunaPeer::PENGGUNA_ID => 0, PenggunaPeer::SEKOLAH_ID => 1, PenggunaPeer::LEMBAGA_ID => 2, PenggunaPeer::YAYASAN_ID => 3, PenggunaPeer::LA_ID => 4, PenggunaPeer::DUDI_ID => 5, PenggunaPeer::KODE_LEMB_SERT => 6, PenggunaPeer::PESERTA_DIDIK_ID => 7, PenggunaPeer::USERNAME => 8, PenggunaPeer::A_BOT => 9, PenggunaPeer::NAMA => 10, PenggunaPeer::TEMPAT_LAHIR => 11, PenggunaPeer::TGL_LAHIR => 12, PenggunaPeer::JENIS_KELAMIN => 13, PenggunaPeer::NIP_NIM => 14, PenggunaPeer::JABATAN_LEMBAGA => 15, PenggunaPeer::ALAMAT => 16, PenggunaPeer::KODE_WILAYAH => 17, PenggunaPeer::NO_TELEPON => 18, PenggunaPeer::NO_HP => 19, PenggunaPeer::APPROVAL_PENGGUNA => 20, PenggunaPeer::AKTIF => 21, PenggunaPeer::PASSWORD => 22, PenggunaPeer::PASSWORD_LAMA => 23, PenggunaPeer::TGL_GANTI_PWD => 24, PenggunaPeer::ID_SDM_PENGGUNA => 25, PenggunaPeer::ID_PD_PENGGUNA => 26, PenggunaPeer::TOKEN_REG => 27, PenggunaPeer::JABATAN => 28, PenggunaPeer::PTK_ID => 29, PenggunaPeer::CREATE_DATE => 30, PenggunaPeer::LAST_UPDATE => 31, PenggunaPeer::SOFT_DELETE => 32, PenggunaPeer::LAST_SYNC => 33, PenggunaPeer::UPDATER_ID => 34, ),
        BasePeer::TYPE_RAW_COLNAME => array ('PENGGUNA_ID' => 0, 'SEKOLAH_ID' => 1, 'LEMBAGA_ID' => 2, 'YAYASAN_ID' => 3, 'LA_ID' => 4, 'DUDI_ID' => 5, 'KODE_LEMB_SERT' => 6, 'PESERTA_DIDIK_ID' => 7, 'USERNAME' => 8, 'A_BOT' => 9, 'NAMA' => 10, 'TEMPAT_LAHIR' => 11, 'TGL_LAHIR' => 12, 'JENIS_KELAMIN' => 13, 'NIP_NIM' => 14, 'JABATAN_LEMBAGA' => 15, 'ALAMAT' => 16, 'KODE_WILAYAH' => 17, 'NO_TELEPON' => 18, 'NO_HP' => 19, 'APPROVAL_PENGGUNA' => 20, 'AKTIF' => 21, 'PASSWORD' => 22, 'PASSWORD_LAMA' => 23, 'TGL_GANTI_PWD' => 24, 'ID_SDM_PENGGUNA' => 25, 'ID_PD_PENGGUNA' => 26, 'TOKEN_REG' => 27, 'JABATAN' => 28, 'PTK_ID' => 29, 'CREATE_DATE' => 30, 'LAST_UPDATE' => 31, 'SOFT_DELETE' => 32, 'LAST_SYNC' => 33, 'UPDATER_ID' => 34, ),
        BasePeer::TYPE_FIELDNAME => array ('pengguna_id' => 0, 'sekolah_id' => 1, 'lembaga_id' => 2, 'yayasan_id' => 3, 'la_id' => 4, 'dudi_id' => 5, 'kode_lemb_sert' => 6, 'peserta_didik_id' => 7, 'username' => 8, 'a_bot' => 9, 'nama' => 10, 'tempat_lahir' => 11, 'tgl_lahir' => 12, 'jenis_kelamin' => 13, 'nip_nim' => 14, 'jabatan_lembaga' => 15, 'alamat' => 16, 'kode_wilayah' => 17, 'no_telepon' => 18, 'no_hp' => 19, 'approval_pengguna' => 20, 'aktif' => 21, 'password' => 22, 'password_lama' => 23, 'tgl_ganti_pwd' => 24, 'id_sdm_pengguna' => 25, 'id_pd_pengguna' => 26, 'token_reg' => 27, 'jabatan' => 28, 'ptk_id' => 29, 'create_date' => 30, 'last_update' => 31, 'soft_delete' => 32, 'last_sync' => 33, 'updater_id' => 34, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, )
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
        $toNames = PenggunaPeer::getFieldNames($toType);
        $key = isset(PenggunaPeer::$fieldKeys[$fromType][$name]) ? PenggunaPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(PenggunaPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, PenggunaPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return PenggunaPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. PenggunaPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(PenggunaPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(PenggunaPeer::PENGGUNA_ID);
            $criteria->addSelectColumn(PenggunaPeer::SEKOLAH_ID);
            $criteria->addSelectColumn(PenggunaPeer::LEMBAGA_ID);
            $criteria->addSelectColumn(PenggunaPeer::YAYASAN_ID);
            $criteria->addSelectColumn(PenggunaPeer::LA_ID);
            $criteria->addSelectColumn(PenggunaPeer::DUDI_ID);
            $criteria->addSelectColumn(PenggunaPeer::KODE_LEMB_SERT);
            $criteria->addSelectColumn(PenggunaPeer::PESERTA_DIDIK_ID);
            $criteria->addSelectColumn(PenggunaPeer::USERNAME);
            $criteria->addSelectColumn(PenggunaPeer::A_BOT);
            $criteria->addSelectColumn(PenggunaPeer::NAMA);
            $criteria->addSelectColumn(PenggunaPeer::TEMPAT_LAHIR);
            $criteria->addSelectColumn(PenggunaPeer::TGL_LAHIR);
            $criteria->addSelectColumn(PenggunaPeer::JENIS_KELAMIN);
            $criteria->addSelectColumn(PenggunaPeer::NIP_NIM);
            $criteria->addSelectColumn(PenggunaPeer::JABATAN_LEMBAGA);
            $criteria->addSelectColumn(PenggunaPeer::ALAMAT);
            $criteria->addSelectColumn(PenggunaPeer::KODE_WILAYAH);
            $criteria->addSelectColumn(PenggunaPeer::NO_TELEPON);
            $criteria->addSelectColumn(PenggunaPeer::NO_HP);
            $criteria->addSelectColumn(PenggunaPeer::APPROVAL_PENGGUNA);
            $criteria->addSelectColumn(PenggunaPeer::AKTIF);
            $criteria->addSelectColumn(PenggunaPeer::PASSWORD);
            $criteria->addSelectColumn(PenggunaPeer::PASSWORD_LAMA);
            $criteria->addSelectColumn(PenggunaPeer::TGL_GANTI_PWD);
            $criteria->addSelectColumn(PenggunaPeer::ID_SDM_PENGGUNA);
            $criteria->addSelectColumn(PenggunaPeer::ID_PD_PENGGUNA);
            $criteria->addSelectColumn(PenggunaPeer::TOKEN_REG);
            $criteria->addSelectColumn(PenggunaPeer::JABATAN);
            $criteria->addSelectColumn(PenggunaPeer::PTK_ID);
            $criteria->addSelectColumn(PenggunaPeer::CREATE_DATE);
            $criteria->addSelectColumn(PenggunaPeer::LAST_UPDATE);
            $criteria->addSelectColumn(PenggunaPeer::SOFT_DELETE);
            $criteria->addSelectColumn(PenggunaPeer::LAST_SYNC);
            $criteria->addSelectColumn(PenggunaPeer::UPDATER_ID);
        } else {
            $criteria->addSelectColumn($alias . '.pengguna_id');
            $criteria->addSelectColumn($alias . '.sekolah_id');
            $criteria->addSelectColumn($alias . '.lembaga_id');
            $criteria->addSelectColumn($alias . '.yayasan_id');
            $criteria->addSelectColumn($alias . '.la_id');
            $criteria->addSelectColumn($alias . '.dudi_id');
            $criteria->addSelectColumn($alias . '.kode_lemb_sert');
            $criteria->addSelectColumn($alias . '.peserta_didik_id');
            $criteria->addSelectColumn($alias . '.username');
            $criteria->addSelectColumn($alias . '.a_bot');
            $criteria->addSelectColumn($alias . '.nama');
            $criteria->addSelectColumn($alias . '.tempat_lahir');
            $criteria->addSelectColumn($alias . '.tgl_lahir');
            $criteria->addSelectColumn($alias . '.jenis_kelamin');
            $criteria->addSelectColumn($alias . '.nip_nim');
            $criteria->addSelectColumn($alias . '.jabatan_lembaga');
            $criteria->addSelectColumn($alias . '.alamat');
            $criteria->addSelectColumn($alias . '.kode_wilayah');
            $criteria->addSelectColumn($alias . '.no_telepon');
            $criteria->addSelectColumn($alias . '.no_hp');
            $criteria->addSelectColumn($alias . '.approval_pengguna');
            $criteria->addSelectColumn($alias . '.aktif');
            $criteria->addSelectColumn($alias . '.password');
            $criteria->addSelectColumn($alias . '.password_lama');
            $criteria->addSelectColumn($alias . '.tgl_ganti_pwd');
            $criteria->addSelectColumn($alias . '.id_sdm_pengguna');
            $criteria->addSelectColumn($alias . '.id_pd_pengguna');
            $criteria->addSelectColumn($alias . '.token_reg');
            $criteria->addSelectColumn($alias . '.jabatan');
            $criteria->addSelectColumn($alias . '.ptk_id');
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
        $criteria->setPrimaryTableName(PenggunaPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PenggunaPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(PenggunaPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(PenggunaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Pengguna
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = PenggunaPeer::doSelect($critcopy, $con);
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
        return PenggunaPeer::populateObjects(PenggunaPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(PenggunaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            PenggunaPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(PenggunaPeer::DATABASE_NAME);

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
     * @param      Pengguna $obj A Pengguna object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getPenggunaId();
            } // if key === null
            PenggunaPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A Pengguna object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof Pengguna) {
                $key = (string) $value->getPenggunaId();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Pengguna object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(PenggunaPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   Pengguna Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(PenggunaPeer::$instances[$key])) {
                return PenggunaPeer::$instances[$key];
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
        foreach (PenggunaPeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        PenggunaPeer::$instances = array();
    }
    
    /**
     * Method to invalidate the instance pool of all tables related to man_akses.pengguna
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
        $cls = PenggunaPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = PenggunaPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = PenggunaPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                PenggunaPeer::addInstanceToPool($obj, $key);
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
     * @return array (Pengguna object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = PenggunaPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = PenggunaPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + PenggunaPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = PenggunaPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            PenggunaPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }


    /**
     * Returns the number of rows matching criteria, joining the related LembagaAkreditasi table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinLembagaAkreditasi(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(PenggunaPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PenggunaPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(PenggunaPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PenggunaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(PenggunaPeer::LA_ID, LembagaAkreditasiPeer::LA_ID, $join_behavior);

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
        $criteria->setPrimaryTableName(PenggunaPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PenggunaPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(PenggunaPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PenggunaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(PenggunaPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related LembSertifikasi table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinLembSertifikasi(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(PenggunaPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PenggunaPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(PenggunaPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PenggunaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(PenggunaPeer::KODE_LEMB_SERT, LembSertifikasiPeer::KODE_LEMB_SERT, $join_behavior);

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
     * Selects a collection of Pengguna objects pre-filled with their LembagaAkreditasi objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Pengguna objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinLembagaAkreditasi(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PenggunaPeer::DATABASE_NAME);
        }

        PenggunaPeer::addSelectColumns($criteria);
        $startcol = PenggunaPeer::NUM_HYDRATE_COLUMNS;
        LembagaAkreditasiPeer::addSelectColumns($criteria);

        $criteria->addJoin(PenggunaPeer::LA_ID, LembagaAkreditasiPeer::LA_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PenggunaPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PenggunaPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = PenggunaPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PenggunaPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = LembagaAkreditasiPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = LembagaAkreditasiPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = LembagaAkreditasiPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    LembagaAkreditasiPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Pengguna) to $obj2 (LembagaAkreditasi)
                $obj2->addPengguna($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Pengguna objects pre-filled with their MstWilayah objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Pengguna objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinMstWilayah(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PenggunaPeer::DATABASE_NAME);
        }

        PenggunaPeer::addSelectColumns($criteria);
        $startcol = PenggunaPeer::NUM_HYDRATE_COLUMNS;
        MstWilayahPeer::addSelectColumns($criteria);

        $criteria->addJoin(PenggunaPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PenggunaPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PenggunaPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = PenggunaPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PenggunaPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Pengguna) to $obj2 (MstWilayah)
                $obj2->addPengguna($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Pengguna objects pre-filled with their LembSertifikasi objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Pengguna objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinLembSertifikasi(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PenggunaPeer::DATABASE_NAME);
        }

        PenggunaPeer::addSelectColumns($criteria);
        $startcol = PenggunaPeer::NUM_HYDRATE_COLUMNS;
        LembSertifikasiPeer::addSelectColumns($criteria);

        $criteria->addJoin(PenggunaPeer::KODE_LEMB_SERT, LembSertifikasiPeer::KODE_LEMB_SERT, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PenggunaPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PenggunaPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = PenggunaPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PenggunaPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = LembSertifikasiPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = LembSertifikasiPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = LembSertifikasiPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    LembSertifikasiPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Pengguna) to $obj2 (LembSertifikasi)
                $obj2->addPengguna($obj1);

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
        $criteria->setPrimaryTableName(PenggunaPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PenggunaPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(PenggunaPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PenggunaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(PenggunaPeer::LA_ID, LembagaAkreditasiPeer::LA_ID, $join_behavior);

        $criteria->addJoin(PenggunaPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

        $criteria->addJoin(PenggunaPeer::KODE_LEMB_SERT, LembSertifikasiPeer::KODE_LEMB_SERT, $join_behavior);

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
     * Selects a collection of Pengguna objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Pengguna objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PenggunaPeer::DATABASE_NAME);
        }

        PenggunaPeer::addSelectColumns($criteria);
        $startcol2 = PenggunaPeer::NUM_HYDRATE_COLUMNS;

        LembagaAkreditasiPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + LembagaAkreditasiPeer::NUM_HYDRATE_COLUMNS;

        MstWilayahPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + MstWilayahPeer::NUM_HYDRATE_COLUMNS;

        LembSertifikasiPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + LembSertifikasiPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(PenggunaPeer::LA_ID, LembagaAkreditasiPeer::LA_ID, $join_behavior);

        $criteria->addJoin(PenggunaPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

        $criteria->addJoin(PenggunaPeer::KODE_LEMB_SERT, LembSertifikasiPeer::KODE_LEMB_SERT, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PenggunaPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PenggunaPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = PenggunaPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PenggunaPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

            // Add objects for joined LembagaAkreditasi rows

            $key2 = LembagaAkreditasiPeer::getPrimaryKeyHashFromRow($row, $startcol2);
            if ($key2 !== null) {
                $obj2 = LembagaAkreditasiPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = LembagaAkreditasiPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    LembagaAkreditasiPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 loaded

                // Add the $obj1 (Pengguna) to the collection in $obj2 (LembagaAkreditasi)
                $obj2->addPengguna($obj1);
            } // if joined row not null

            // Add objects for joined MstWilayah rows

            $key3 = MstWilayahPeer::getPrimaryKeyHashFromRow($row, $startcol3);
            if ($key3 !== null) {
                $obj3 = MstWilayahPeer::getInstanceFromPool($key3);
                if (!$obj3) {

                    $cls = MstWilayahPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    MstWilayahPeer::addInstanceToPool($obj3, $key3);
                } // if obj3 loaded

                // Add the $obj1 (Pengguna) to the collection in $obj3 (MstWilayah)
                $obj3->addPengguna($obj1);
            } // if joined row not null

            // Add objects for joined LembSertifikasi rows

            $key4 = LembSertifikasiPeer::getPrimaryKeyHashFromRow($row, $startcol4);
            if ($key4 !== null) {
                $obj4 = LembSertifikasiPeer::getInstanceFromPool($key4);
                if (!$obj4) {

                    $cls = LembSertifikasiPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    LembSertifikasiPeer::addInstanceToPool($obj4, $key4);
                } // if obj4 loaded

                // Add the $obj1 (Pengguna) to the collection in $obj4 (LembSertifikasi)
                $obj4->addPengguna($obj1);
            } // if joined row not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Returns the number of rows matching criteria, joining the related LembagaAkreditasi table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptLembagaAkreditasi(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(PenggunaPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PenggunaPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(PenggunaPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PenggunaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(PenggunaPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

        $criteria->addJoin(PenggunaPeer::KODE_LEMB_SERT, LembSertifikasiPeer::KODE_LEMB_SERT, $join_behavior);

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
        $criteria->setPrimaryTableName(PenggunaPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PenggunaPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(PenggunaPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PenggunaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(PenggunaPeer::LA_ID, LembagaAkreditasiPeer::LA_ID, $join_behavior);

        $criteria->addJoin(PenggunaPeer::KODE_LEMB_SERT, LembSertifikasiPeer::KODE_LEMB_SERT, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related LembSertifikasi table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptLembSertifikasi(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(PenggunaPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PenggunaPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(PenggunaPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PenggunaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(PenggunaPeer::LA_ID, LembagaAkreditasiPeer::LA_ID, $join_behavior);

        $criteria->addJoin(PenggunaPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

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
     * Selects a collection of Pengguna objects pre-filled with all related objects except LembagaAkreditasi.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Pengguna objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptLembagaAkreditasi(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PenggunaPeer::DATABASE_NAME);
        }

        PenggunaPeer::addSelectColumns($criteria);
        $startcol2 = PenggunaPeer::NUM_HYDRATE_COLUMNS;

        MstWilayahPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + MstWilayahPeer::NUM_HYDRATE_COLUMNS;

        LembSertifikasiPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + LembSertifikasiPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(PenggunaPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

        $criteria->addJoin(PenggunaPeer::KODE_LEMB_SERT, LembSertifikasiPeer::KODE_LEMB_SERT, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PenggunaPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PenggunaPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = PenggunaPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PenggunaPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Pengguna) to the collection in $obj2 (MstWilayah)
                $obj2->addPengguna($obj1);

            } // if joined row is not null

                // Add objects for joined LembSertifikasi rows

                $key3 = LembSertifikasiPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = LembSertifikasiPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = LembSertifikasiPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    LembSertifikasiPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Pengguna) to the collection in $obj3 (LembSertifikasi)
                $obj3->addPengguna($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Pengguna objects pre-filled with all related objects except MstWilayah.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Pengguna objects.
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
            $criteria->setDbName(PenggunaPeer::DATABASE_NAME);
        }

        PenggunaPeer::addSelectColumns($criteria);
        $startcol2 = PenggunaPeer::NUM_HYDRATE_COLUMNS;

        LembagaAkreditasiPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + LembagaAkreditasiPeer::NUM_HYDRATE_COLUMNS;

        LembSertifikasiPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + LembSertifikasiPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(PenggunaPeer::LA_ID, LembagaAkreditasiPeer::LA_ID, $join_behavior);

        $criteria->addJoin(PenggunaPeer::KODE_LEMB_SERT, LembSertifikasiPeer::KODE_LEMB_SERT, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PenggunaPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PenggunaPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = PenggunaPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PenggunaPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined LembagaAkreditasi rows

                $key2 = LembagaAkreditasiPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = LembagaAkreditasiPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = LembagaAkreditasiPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    LembagaAkreditasiPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Pengguna) to the collection in $obj2 (LembagaAkreditasi)
                $obj2->addPengguna($obj1);

            } // if joined row is not null

                // Add objects for joined LembSertifikasi rows

                $key3 = LembSertifikasiPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = LembSertifikasiPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = LembSertifikasiPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    LembSertifikasiPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Pengguna) to the collection in $obj3 (LembSertifikasi)
                $obj3->addPengguna($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Pengguna objects pre-filled with all related objects except LembSertifikasi.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Pengguna objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptLembSertifikasi(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PenggunaPeer::DATABASE_NAME);
        }

        PenggunaPeer::addSelectColumns($criteria);
        $startcol2 = PenggunaPeer::NUM_HYDRATE_COLUMNS;

        LembagaAkreditasiPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + LembagaAkreditasiPeer::NUM_HYDRATE_COLUMNS;

        MstWilayahPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + MstWilayahPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(PenggunaPeer::LA_ID, LembagaAkreditasiPeer::LA_ID, $join_behavior);

        $criteria->addJoin(PenggunaPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PenggunaPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PenggunaPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = PenggunaPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PenggunaPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined LembagaAkreditasi rows

                $key2 = LembagaAkreditasiPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = LembagaAkreditasiPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = LembagaAkreditasiPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    LembagaAkreditasiPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Pengguna) to the collection in $obj2 (LembagaAkreditasi)
                $obj2->addPengguna($obj1);

            } // if joined row is not null

                // Add objects for joined MstWilayah rows

                $key3 = MstWilayahPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = MstWilayahPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = MstWilayahPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    MstWilayahPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Pengguna) to the collection in $obj3 (MstWilayah)
                $obj3->addPengguna($obj1);

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
        return Propel::getDatabaseMap(PenggunaPeer::DATABASE_NAME)->getTable(PenggunaPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BasePenggunaPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BasePenggunaPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new PenggunaTableMap());
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
        return PenggunaPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a Pengguna or Criteria object.
     *
     * @param      mixed $values Criteria or Pengguna object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(PenggunaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from Pengguna object
        }


        // Set the correct dbName
        $criteria->setDbName(PenggunaPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a Pengguna or Criteria object.
     *
     * @param      mixed $values Criteria or Pengguna object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(PenggunaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(PenggunaPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(PenggunaPeer::PENGGUNA_ID);
            $value = $criteria->remove(PenggunaPeer::PENGGUNA_ID);
            if ($value) {
                $selectCriteria->add(PenggunaPeer::PENGGUNA_ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(PenggunaPeer::TABLE_NAME);
            }

        } else { // $values is Pengguna object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(PenggunaPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the man_akses.pengguna table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(PenggunaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(PenggunaPeer::TABLE_NAME, $con, PenggunaPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            PenggunaPeer::clearInstancePool();
            PenggunaPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a Pengguna or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or Pengguna object or primary key or array of primary keys
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
            $con = Propel::getConnection(PenggunaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            PenggunaPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof Pengguna) { // it's a model object
            // invalidate the cache for this single object
            PenggunaPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(PenggunaPeer::DATABASE_NAME);
            $criteria->add(PenggunaPeer::PENGGUNA_ID, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                PenggunaPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(PenggunaPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            
            $affectedRows += BasePeer::doDelete($criteria, $con);
            PenggunaPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given Pengguna object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      Pengguna $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(PenggunaPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(PenggunaPeer::TABLE_NAME);

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

        return BasePeer::doValidate(PenggunaPeer::DATABASE_NAME, PenggunaPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      string $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return Pengguna
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = PenggunaPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(PenggunaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(PenggunaPeer::DATABASE_NAME);
        $criteria->add(PenggunaPeer::PENGGUNA_ID, $pk);

        $v = PenggunaPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return Pengguna[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(PenggunaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(PenggunaPeer::DATABASE_NAME);
            $criteria->add(PenggunaPeer::PENGGUNA_ID, $pks, Criteria::IN);
            $objs = PenggunaPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BasePenggunaPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BasePenggunaPeer::buildTableMap();

