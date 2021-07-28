<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'tanah' table.
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
class TanahTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.TanahTableMap';

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
        $this->setName('tanah');
        $this->setPhpName('Tanah');
        $this->setClassname('DataDikdas\\Model\\Tanah');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('id_tanah', 'IdTanah', 'VARCHAR', true, null, null);
        $this->addForeignKey('jenis_prasarana_id', 'JenisPrasaranaId', 'INTEGER', 'ref.jenis_prasarana', 'jenis_prasarana_id', true, null, null);
        $this->addForeignKey('sekolah_id', 'SekolahId', 'VARCHAR', 'sekolah', 'sekolah_id', true, null, null);
        $this->addForeignKey('id_hapus_buku', 'IdHapusBuku', 'CHAR', 'ref.jenis_hapus_buku', 'id_hapus_buku', false, 1, null);
        $this->addForeignKey('kepemilikan_sarpras_id', 'KepemilikanSarprasId', 'DECIMAL', 'ref.status_kepemilikan_sarpras', 'kepemilikan_sarpras_id', true, 65536, null);
        $this->addColumn('kd_kl', 'KdKl', 'CHAR', false, 3, null);
        $this->addColumn('kd_satker', 'KdSatker', 'VARCHAR', false, 20, null);
        $this->addColumn('kd_brg', 'KdBrg', 'VARCHAR', false, 10, null);
        $this->addColumn('nup', 'Nup', 'INTEGER', false, null, null);
        $this->addColumn('kode_eselon1', 'KodeEselon1', 'VARCHAR', false, 2, null);
        $this->addColumn('nama_eselon1', 'NamaEselon1', 'VARCHAR', false, 255, null);
        $this->addColumn('kode_sub_satker', 'KodeSubSatker', 'VARCHAR', false, 3, null);
        $this->addColumn('nama_sub_satker', 'NamaSubSatker', 'VARCHAR', false, 255, null);
        $this->addColumn('nama', 'Nama', 'VARCHAR', true, 100, null);
        $this->addColumn('panjang', 'Panjang', 'DOUBLE', false, null, null);
        $this->addColumn('lebar', 'Lebar', 'DOUBLE', false, null, null);
        $this->addColumn('nilai_perolehan_aset', 'NilaiPerolehanAset', 'DECIMAL', false, 1310722, null);
        $this->addForeignKey('kode_wilayah', 'KodeWilayah', 'CHAR', 'ref.mst_wilayah', 'kode_wilayah', true, 8, null);
        $this->addColumn('alamat_jalan', 'AlamatJalan', 'VARCHAR', true, 80, null);
        $this->addColumn('rt', 'Rt', 'DECIMAL', false, 131072, null);
        $this->addColumn('rw', 'Rw', 'DECIMAL', false, 131072, null);
        $this->addColumn('nama_dusun', 'NamaDusun', 'VARCHAR', false, 60, null);
        $this->addColumn('desa_kelurahan', 'DesaKelurahan', 'VARCHAR', true, 60, null);
        $this->addColumn('kode_pos', 'KodePos', 'CHAR', false, 5, null);
        $this->addColumn('lintang', 'Lintang', 'DECIMAL', false, 1179660, null);
        $this->addColumn('bujur', 'Bujur', 'DECIMAL', false, 1179660, null);
        $this->addColumn('tgl_mutasi_keluar', 'TglMutasiKeluar', 'DATE', false, null, null);
        $this->addColumn('batas', 'Batas', 'LONGVARCHAR', false, null, null);
        $this->addColumn('ket_tanah', 'KetTanah', 'VARCHAR', false, 250, null);
        $this->addColumn('luas', 'Luas', 'DECIMAL', true, 655361, null);
        $this->addColumn('luas_lahan_tersedia', 'LuasLahanTersedia', 'DECIMAL', true, 655361, null);
        $this->addColumn('no_sertifikat_tanah', 'NoSertifikatTanah', 'VARCHAR', true, 16, null);
        $this->addColumn('asal_data', 'AsalData', 'CHAR', true, 1, '1');
        $this->addColumn('create_date', 'CreateDate', 'TIMESTAMP', true, null, '2021-06-07 11:49:57.910477');
        $this->addColumn('last_update', 'LastUpdate', 'TIMESTAMP', true, null, '2021-06-07 11:49:57.910477');
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
        $this->addRelation('JenisHapusBuku', 'DataDikdas\\Model\\JenisHapusBuku', RelationMap::MANY_TO_ONE, array('id_hapus_buku' => 'id_hapus_buku', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('JenisPrasarana', 'DataDikdas\\Model\\JenisPrasarana', RelationMap::MANY_TO_ONE, array('jenis_prasarana_id' => 'jenis_prasarana_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('Sekolah', 'DataDikdas\\Model\\Sekolah', RelationMap::MANY_TO_ONE, array('sekolah_id' => 'sekolah_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('StatusKepemilikanSarpras', 'DataDikdas\\Model\\StatusKepemilikanSarpras', RelationMap::MANY_TO_ONE, array('kepemilikan_sarpras_id' => 'kepemilikan_sarpras_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('MstWilayah', 'DataDikdas\\Model\\MstWilayah', RelationMap::MANY_TO_ONE, array('kode_wilayah' => 'kode_wilayah', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('Bangunan', 'DataDikdas\\Model\\Bangunan', RelationMap::ONE_TO_MANY, array('id_tanah' => 'id_tanah', ), 'RESTRICT', 'RESTRICT', 'Bangunans');
        $this->addRelation('TanahDariBlockgrant', 'DataDikdas\\Model\\TanahDariBlockgrant', RelationMap::ONE_TO_MANY, array('id_tanah' => 'id_tanah', ), 'RESTRICT', 'RESTRICT', 'TanahDariBlockgrants');
        $this->addRelation('TanahLongitudinal', 'DataDikdas\\Model\\TanahLongitudinal', RelationMap::ONE_TO_MANY, array('id_tanah' => 'id_tanah', ), 'RESTRICT', 'RESTRICT', 'TanahLongitudinals');
        $this->addRelation('VldTanah', 'DataDikdas\\Model\\VldTanah', RelationMap::ONE_TO_MANY, array('id_tanah' => 'id_tanah', ), 'RESTRICT', 'RESTRICT', 'VldTanahs');
    } // buildRelations()

} // TanahTableMap
