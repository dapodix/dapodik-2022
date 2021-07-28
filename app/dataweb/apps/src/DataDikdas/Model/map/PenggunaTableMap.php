<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'man_akses.pengguna' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.DataDikdas.Model.map
 */
class PenggunaTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.PenggunaTableMap';

    /**
     * Initialize the table attributes, columns and validators
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('man_akses.pengguna');
        $this->setPhpName('Pengguna');
        $this->setClassname('DataDikdas\\Model\\Pengguna');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('pengguna_id', 'PenggunaId', 'VARCHAR', true, null, null);
        $this->addColumn('sekolah_id', 'SekolahId', 'VARCHAR', false, null, null);
        $this->addColumn('lembaga_id', 'LembagaId', 'VARCHAR', false, null, null);
        $this->addColumn('yayasan_id', 'YayasanId', 'VARCHAR', false, null, null);
        $this->addForeignKey('la_id', 'LaId', 'CHAR', 'ref.lembaga_akreditasi', 'la_id', false, 5, null);
        $this->addColumn('dudi_id', 'DudiId', 'VARCHAR', false, null, null);
        $this->addForeignKey('kode_lemb_sert', 'KodeLembSert', 'DECIMAL', 'ref.lemb_sertifikasi', 'kode_lemb_sert', false, 327680, null);
        $this->addColumn('peserta_didik_id', 'PesertaDidikId', 'VARCHAR', false, null, null);
        $this->addColumn('username', 'Username', 'VARCHAR', true, 60, null);
        $this->addColumn('a_bot', 'ABot', 'DECIMAL', true, 65536, 0);
        $this->addColumn('nama', 'Nama', 'VARCHAR', true, 100, null);
        $this->addColumn('tempat_lahir', 'TempatLahir', 'VARCHAR', false, 60, null);
        $this->addColumn('tgl_lahir', 'TglLahir', 'DATE', false, null, null);
        $this->addColumn('jenis_kelamin', 'JenisKelamin', 'CHAR', true, 1, null);
        $this->addColumn('nip_nim', 'NipNim', 'VARCHAR', false, 18, null);
        $this->addColumn('jabatan_lembaga', 'JabatanLembaga', 'VARCHAR', false, 25, null);
        $this->addColumn('alamat', 'Alamat', 'VARCHAR', false, 80, null);
        $this->addForeignKey('kode_wilayah', 'KodeWilayah', 'CHAR', 'ref.mst_wilayah', 'kode_wilayah', true, 8, null);
        $this->addColumn('no_telepon', 'NoTelepon', 'VARCHAR', false, 20, null);
        $this->addColumn('no_hp', 'NoHp', 'VARCHAR', false, 20, null);
        $this->addColumn('approval_pengguna', 'ApprovalPengguna', 'DECIMAL', true, 65536, 0);
        $this->addColumn('aktif', 'Aktif', 'DECIMAL', true, 65536, 1);
        $this->addColumn('password', 'Password', 'VARCHAR', true, 512, null);
        $this->addColumn('password_lama', 'PasswordLama', 'VARCHAR', false, 50, null);
        $this->addColumn('tgl_ganti_pwd', 'TglGantiPwd', 'DATE', false, null, null);
        $this->addColumn('id_sdm_pengguna', 'IdSdmPengguna', 'VARCHAR', false, null, null);
        $this->addColumn('id_pd_pengguna', 'IdPdPengguna', 'VARCHAR', false, null, null);
        $this->addColumn('token_reg', 'TokenReg', 'CHAR', false, 6, null);
        $this->addColumn('jabatan', 'Jabatan', 'VARCHAR', false, 80, null);
        $this->addColumn('ptk_id', 'PtkId', 'VARCHAR', false, null, null);
        $this->addColumn('create_date', 'CreateDate', 'TIMESTAMP', true, null, 'now()');
        $this->addColumn('last_update', 'LastUpdate', 'TIMESTAMP', true, null, 'now()');
        $this->addColumn('soft_delete', 'SoftDelete', 'DECIMAL', true, 65536, null);
        $this->addColumn('last_sync', 'LastSync', 'TIMESTAMP', true, null, '1901-01-01 00:00:00');
        $this->addColumn('updater_id', 'UpdaterId', 'VARCHAR', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('LembagaAkreditasi', 'DataDikdas\\Model\\LembagaAkreditasi', RelationMap::MANY_TO_ONE, array('la_id' => 'la_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('MstWilayah', 'DataDikdas\\Model\\MstWilayah', RelationMap::MANY_TO_ONE, array('kode_wilayah' => 'kode_wilayah', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('LembSertifikasi', 'DataDikdas\\Model\\LembSertifikasi', RelationMap::MANY_TO_ONE, array('kode_lemb_sert' => 'kode_lemb_sert', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('LogOtentikasi', 'DataDikdas\\Model\\LogOtentikasi', RelationMap::ONE_TO_MANY, array('pengguna_id' => 'pengguna_id', ), 'RESTRICT', 'RESTRICT', 'LogOtentikasis');
        $this->addRelation('RolePengguna', 'DataDikdas\\Model\\RolePengguna', RelationMap::ONE_TO_MANY, array('pengguna_id' => 'pengguna_id', ), 'RESTRICT', 'RESTRICT', 'RolePenggunas');
    } // buildRelations()

} // PenggunaTableMap
