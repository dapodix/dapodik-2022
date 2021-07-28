<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'sekolah' table.
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
class SekolahTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.SekolahTableMap';

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
        $this->setName('sekolah');
        $this->setPhpName('Sekolah');
        $this->setClassname('DataDikdas\\Model\\Sekolah');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('sekolah_id', 'SekolahId', 'VARCHAR', true, null, null);
        $this->addColumn('nama', 'Nama', 'VARCHAR', true, 100, null);
        $this->addColumn('nama_nomenklatur', 'NamaNomenklatur', 'VARCHAR', false, 100, null);
        $this->addColumn('nss', 'Nss', 'CHAR', false, 12, null);
        $this->addColumn('npsn', 'Npsn', 'CHAR', false, 8, null);
        $this->addForeignKey('bentuk_pendidikan_id', 'BentukPendidikanId', 'SMALLINT', 'ref.bentuk_pendidikan', 'bentuk_pendidikan_id', true, null, null);
        $this->addColumn('alamat_jalan', 'AlamatJalan', 'VARCHAR', true, 80, null);
        $this->addColumn('rt', 'Rt', 'DECIMAL', false, 131072, null);
        $this->addColumn('rw', 'Rw', 'DECIMAL', false, 131072, null);
        $this->addColumn('nama_dusun', 'NamaDusun', 'VARCHAR', false, 60, null);
        $this->addColumn('desa_kelurahan', 'DesaKelurahan', 'VARCHAR', true, 60, null);
        $this->addForeignKey('kode_wilayah', 'KodeWilayah', 'CHAR', 'ref.mst_wilayah', 'kode_wilayah', true, 8, null);
        $this->addColumn('kode_pos', 'KodePos', 'CHAR', false, 5, null);
        $this->addColumn('lintang', 'Lintang', 'DECIMAL', false, 1179660, null);
        $this->addColumn('bujur', 'Bujur', 'DECIMAL', false, 1179660, null);
        $this->addColumn('nomor_telepon', 'NomorTelepon', 'VARCHAR', false, 20, null);
        $this->addColumn('nomor_fax', 'NomorFax', 'VARCHAR', false, 20, null);
        $this->addColumn('email', 'Email', 'VARCHAR', false, 60, null);
        $this->addColumn('website', 'Website', 'VARCHAR', false, 100, null);
        $this->addForeignKey('kebutuhan_khusus_id', 'KebutuhanKhususId', 'INTEGER', 'ref.kebutuhan_khusus', 'kebutuhan_khusus_id', true, null, null);
        $this->addColumn('status_sekolah', 'StatusSekolah', 'DECIMAL', true, 65536, null);
        $this->addColumn('sk_pendirian_sekolah', 'SkPendirianSekolah', 'VARCHAR', false, 80, null);
        $this->addColumn('tanggal_sk_pendirian', 'TanggalSkPendirian', 'DATE', false, null, null);
        $this->addForeignKey('status_kepemilikan_id', 'StatusKepemilikanId', 'DECIMAL', 'ref.status_kepemilikan', 'status_kepemilikan_id', true, 65536, null);
        $this->addForeignKey('yayasan_id', 'YayasanId', 'VARCHAR', 'yayasan', 'yayasan_id', false, null, null);
        $this->addColumn('sk_izin_operasional', 'SkIzinOperasional', 'VARCHAR', false, 80, null);
        $this->addColumn('tanggal_sk_izin_operasional', 'TanggalSkIzinOperasional', 'DATE', false, null, null);
        $this->addColumn('no_rekening', 'NoRekening', 'VARCHAR', false, 20, null);
        $this->addColumn('nama_bank', 'NamaBank', 'VARCHAR', false, 20, null);
        $this->addColumn('cabang_kcp_unit', 'CabangKcpUnit', 'VARCHAR', false, 60, null);
        $this->addColumn('rekening_atas_nama', 'RekeningAtasNama', 'VARCHAR', false, 50, null);
        $this->addColumn('mbs', 'Mbs', 'DECIMAL', true, 65536, null);
        $this->addColumn('luas_tanah_milik', 'LuasTanahMilik', 'DECIMAL', true, 458752, null);
        $this->addColumn('luas_tanah_bukan_milik', 'LuasTanahBukanMilik', 'DECIMAL', true, 458752, null);
        $this->addColumn('kode_registrasi', 'KodeRegistrasi', 'BIGINT', false, null, null);
        $this->addColumn('npwp', 'Npwp', 'CHAR', false, 15, null);
        $this->addColumn('nm_wp', 'NmWp', 'VARCHAR', false, 100, null);
        $this->addColumn('keaktifan', 'Keaktifan', 'DECIMAL', true, 65536, 1);
        $this->addColumn('flag', 'Flag', 'CHAR', false, 3, null);
        $this->addColumn('create_date', 'CreateDate', 'TIMESTAMP', true, null, '2020-04-16 09:40:03.422677');
        $this->addColumn('last_update', 'LastUpdate', 'TIMESTAMP', true, null, '2020-04-16 09:40:03.422677');
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
        $this->addRelation('MstWilayah', 'DataDikdas\\Model\\MstWilayah', RelationMap::MANY_TO_ONE, array('kode_wilayah' => 'kode_wilayah', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('KebutuhanKhusus', 'DataDikdas\\Model\\KebutuhanKhusus', RelationMap::MANY_TO_ONE, array('kebutuhan_khusus_id' => 'kebutuhan_khusus_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('BentukPendidikan', 'DataDikdas\\Model\\BentukPendidikan', RelationMap::MANY_TO_ONE, array('bentuk_pendidikan_id' => 'bentuk_pendidikan_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('Yayasan', 'DataDikdas\\Model\\Yayasan', RelationMap::MANY_TO_ONE, array('yayasan_id' => 'yayasan_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('StatusKepemilikan', 'DataDikdas\\Model\\StatusKepemilikan', RelationMap::MANY_TO_ONE, array('status_kepemilikan_id' => 'status_kepemilikan_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('AkreditasiSp', 'DataDikdas\\Model\\AkreditasiSp', RelationMap::ONE_TO_MANY, array('sekolah_id' => 'sekolah_id', ), 'RESTRICT', 'RESTRICT', 'AkreditasiSps');
        $this->addRelation('Alat', 'DataDikdas\\Model\\Alat', RelationMap::ONE_TO_MANY, array('sekolah_id' => 'sekolah_id', ), 'RESTRICT', 'RESTRICT', 'Alats');
        $this->addRelation('AnggotaGugus', 'DataDikdas\\Model\\AnggotaGugus', RelationMap::ONE_TO_MANY, array('sekolah_id' => 'sekolah_id', ), 'RESTRICT', 'RESTRICT', 'AnggotaGuguses');
        $this->addRelation('Angkutan', 'DataDikdas\\Model\\Angkutan', RelationMap::ONE_TO_MANY, array('sekolah_id' => 'sekolah_id', ), 'RESTRICT', 'RESTRICT', 'Angkutans');
        $this->addRelation('Bangunan', 'DataDikdas\\Model\\Bangunan', RelationMap::ONE_TO_MANY, array('sekolah_id' => 'sekolah_id', ), 'RESTRICT', 'RESTRICT', 'Bangunans');
        $this->addRelation('Blockgrant', 'DataDikdas\\Model\\Blockgrant', RelationMap::ONE_TO_MANY, array('sekolah_id' => 'sekolah_id', ), 'RESTRICT', 'RESTRICT', 'Blockgrants');
        $this->addRelation('Buku', 'DataDikdas\\Model\\Buku', RelationMap::ONE_TO_MANY, array('sekolah_id' => 'sekolah_id', ), 'RESTRICT', 'RESTRICT', 'Bukus');
        $this->addRelation('DataDynamic', 'DataDikdas\\Model\\DataDynamic', RelationMap::ONE_TO_MANY, array('sekolah_id' => 'sekolah_id', ), 'RESTRICT', 'RESTRICT', 'DataDynamics');
        $this->addRelation('GugusSekolah', 'DataDikdas\\Model\\GugusSekolah', RelationMap::ONE_TO_MANY, array('sekolah_id' => 'sekolah_inti_id', ), 'RESTRICT', 'RESTRICT', 'GugusSekolahs');
        $this->addRelation('Instalasi', 'DataDikdas\\Model\\Instalasi', RelationMap::ONE_TO_MANY, array('sekolah_id' => 'sekolah_id', ), 'RESTRICT', 'RESTRICT', 'Instalasis');
        $this->addRelation('IzinOperasional', 'DataDikdas\\Model\\IzinOperasional', RelationMap::ONE_TO_MANY, array('sekolah_id' => 'sekolah_id', ), 'RESTRICT', 'RESTRICT', 'IzinOperasionals');
        $this->addRelation('JurusanSp', 'DataDikdas\\Model\\JurusanSp', RelationMap::ONE_TO_MANY, array('sekolah_id' => 'sekolah_id', ), 'RESTRICT', 'RESTRICT', 'JurusanSps');
        $this->addRelation('Kepanitiaan', 'DataDikdas\\Model\\Kepanitiaan', RelationMap::ONE_TO_MANY, array('sekolah_id' => 'sekolah_id', ), 'RESTRICT', 'RESTRICT', 'Kepanitiaans');
        $this->addRelation('LayananKhusus', 'DataDikdas\\Model\\LayananKhusus', RelationMap::ONE_TO_MANY, array('sekolah_id' => 'sekolah_id', ), 'RESTRICT', 'RESTRICT', 'LayananKhususes');
        $this->addRelation('Mou', 'DataDikdas\\Model\\Mou', RelationMap::ONE_TO_MANY, array('sekolah_id' => 'sekolah_id', ), 'RESTRICT', 'RESTRICT', 'Mous');
        $this->addRelation('PesertaDidikBaru', 'DataDikdas\\Model\\PesertaDidikBaru', RelationMap::ONE_TO_MANY, array('sekolah_id' => 'sekolah_id', ), 'RESTRICT', 'RESTRICT', 'PesertaDidikBarus');
        $this->addRelation('ProgramInklusi', 'DataDikdas\\Model\\ProgramInklusi', RelationMap::ONE_TO_MANY, array('sekolah_id' => 'sekolah_id', ), 'RESTRICT', 'RESTRICT', 'ProgramInklusis');
        $this->addRelation('PtkBaru', 'DataDikdas\\Model\\PtkBaru', RelationMap::ONE_TO_MANY, array('sekolah_id' => 'sekolah_id', ), 'RESTRICT', 'RESTRICT', 'PtkBarus');
        $this->addRelation('PtkTerdaftar', 'DataDikdas\\Model\\PtkTerdaftar', RelationMap::ONE_TO_MANY, array('sekolah_id' => 'sekolah_id', ), 'RESTRICT', 'RESTRICT', 'PtkTerdaftars');
        $this->addRelation('RegistrasiPesertaDidik', 'DataDikdas\\Model\\RegistrasiPesertaDidik', RelationMap::ONE_TO_MANY, array('sekolah_id' => 'sekolah_id', ), 'RESTRICT', 'RESTRICT', 'RegistrasiPesertaDidiks');
        $this->addRelation('RombonganBelajar', 'DataDikdas\\Model\\RombonganBelajar', RelationMap::ONE_TO_MANY, array('sekolah_id' => 'sekolah_id', ), 'RESTRICT', 'RESTRICT', 'RombonganBelajars');
        $this->addRelation('Ruang', 'DataDikdas\\Model\\Ruang', RelationMap::ONE_TO_MANY, array('sekolah_id' => 'sekolah_id', ), 'RESTRICT', 'RESTRICT', 'Ruangs');
        $this->addRelation('Sanitasi', 'DataDikdas\\Model\\Sanitasi', RelationMap::ONE_TO_MANY, array('sekolah_id' => 'sekolah_id', ), 'RESTRICT', 'RESTRICT', 'Sanitasis');
        $this->addRelation('SasaranPengawasan', 'DataDikdas\\Model\\SasaranPengawasan', RelationMap::ONE_TO_MANY, array('sekolah_id' => 'sekolah_id', ), 'RESTRICT', 'RESTRICT', 'SasaranPengawasans');
        $this->addRelation('SekolahLongitudinal', 'DataDikdas\\Model\\SekolahLongitudinal', RelationMap::ONE_TO_MANY, array('sekolah_id' => 'sekolah_id', ), 'RESTRICT', 'RESTRICT', 'SekolahLongitudinals');
        $this->addRelation('SekolahPaud', 'DataDikdas\\Model\\SekolahPaud', RelationMap::ONE_TO_ONE, array('sekolah_id' => 'sekolah_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('Tanah', 'DataDikdas\\Model\\Tanah', RelationMap::ONE_TO_MANY, array('sekolah_id' => 'sekolah_id', ), 'RESTRICT', 'RESTRICT', 'Tanahs');
        $this->addRelation('TugasTambahan', 'DataDikdas\\Model\\TugasTambahan', RelationMap::ONE_TO_MANY, array('sekolah_id' => 'sekolah_id', ), 'RESTRICT', 'RESTRICT', 'TugasTambahans');
        $this->addRelation('UnitUsaha', 'DataDikdas\\Model\\UnitUsaha', RelationMap::ONE_TO_MANY, array('sekolah_id' => 'sekolah_id', ), 'RESTRICT', 'RESTRICT', 'UnitUsahas');
        $this->addRelation('VldSekolah', 'DataDikdas\\Model\\VldSekolah', RelationMap::ONE_TO_MANY, array('sekolah_id' => 'sekolah_id', ), 'RESTRICT', 'RESTRICT', 'VldSekolahs');
    } // buildRelations()

} // SekolahTableMap
