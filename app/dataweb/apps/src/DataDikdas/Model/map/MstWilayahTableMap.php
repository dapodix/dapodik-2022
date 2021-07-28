<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'ref.mst_wilayah' table.
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
class MstWilayahTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.MstWilayahTableMap';

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
        $this->setName('ref.mst_wilayah');
        $this->setPhpName('MstWilayah');
        $this->setClassname('DataDikdas\\Model\\MstWilayah');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('kode_wilayah', 'KodeWilayah', 'CHAR', true, 8, null);
        $this->addColumn('nama', 'Nama', 'VARCHAR', true, 60, null);
        $this->addForeignKey('id_level_wilayah', 'IdLevelWilayah', 'SMALLINT', 'ref.level_wilayah', 'id_level_wilayah', true, null, null);
        $this->addForeignKey('mst_kode_wilayah', 'MstKodeWilayah', 'CHAR', 'ref.mst_wilayah', 'kode_wilayah', false, 8, null);
        $this->addForeignKey('negara_id', 'NegaraId', 'CHAR', 'ref.negara', 'negara_id', true, 2, null);
        $this->addColumn('asal_wilayah', 'AsalWilayah', 'CHAR', false, 8, null);
        $this->addColumn('kode_bps', 'KodeBps', 'CHAR', false, 7, null);
        $this->addColumn('kode_dagri', 'KodeDagri', 'CHAR', false, 10, null);
        $this->addColumn('kode_keu', 'KodeKeu', 'CHAR', false, 10, null);
        $this->addColumn('id_prov', 'IdProv', 'CHAR', false, 8, null);
        $this->addColumn('id_kabkota', 'IdKabkota', 'CHAR', false, 8, null);
        $this->addColumn('id_kec', 'IdKec', 'CHAR', false, 8, null);
        $this->addColumn('a_desa', 'ADesa', 'DECIMAL', true, 65536, 0);
        $this->addColumn('a_kelurahan', 'AKelurahan', 'DECIMAL', true, 65536, 0);
        $this->addColumn('a_35', 'A35', 'DECIMAL', true, 65536, 0);
        $this->addColumn('a_urban', 'AUrban', 'DECIMAL', true, 65536, 0);
        $this->addForeignKey('kategori_desa_id', 'KategoriDesaId', 'DECIMAL', 'ref.kategori_desa', 'kategori_desa_id', false, 131072, null);
        $this->addColumn('create_date', 'CreateDate', 'TIMESTAMP', true, null, '2020-04-16 09:40:03.422677');
        $this->addColumn('last_update', 'LastUpdate', 'TIMESTAMP', true, null, '2020-04-16 09:40:03.422677');
        $this->addColumn('expired_date', 'ExpiredDate', 'TIMESTAMP', false, null, null);
        $this->addColumn('last_sync', 'LastSync', 'TIMESTAMP', true, null, '1901-01-01 00:00:00');
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('KategoriDesa', 'DataDikdas\\Model\\KategoriDesa', RelationMap::MANY_TO_ONE, array('kategori_desa_id' => 'kategori_desa_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('LevelWilayah', 'DataDikdas\\Model\\LevelWilayah', RelationMap::MANY_TO_ONE, array('id_level_wilayah' => 'id_level_wilayah', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('MstWilayahRelatedByMstKodeWilayah', 'DataDikdas\\Model\\MstWilayah', RelationMap::MANY_TO_ONE, array('mst_kode_wilayah' => 'kode_wilayah', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('Negara', 'DataDikdas\\Model\\Negara', RelationMap::MANY_TO_ONE, array('negara_id' => 'negara_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('Demografi', 'DataDikdas\\Model\\Demografi', RelationMap::ONE_TO_MANY, array('kode_wilayah' => 'kode_wilayah', ), 'RESTRICT', 'RESTRICT', 'Demografis');
        $this->addRelation('Dudi', 'DataDikdas\\Model\\Dudi', RelationMap::ONE_TO_MANY, array('kode_wilayah' => 'kode_wilayah', ), 'RESTRICT', 'RESTRICT', 'Dudis');
        $this->addRelation('Instalasi', 'DataDikdas\\Model\\Instalasi', RelationMap::ONE_TO_MANY, array('kode_wilayah' => 'kode_wilayah', ), 'RESTRICT', 'RESTRICT', 'Instalasis');
        $this->addRelation('LembSertifikasi', 'DataDikdas\\Model\\LembSertifikasi', RelationMap::ONE_TO_MANY, array('kode_wilayah' => 'kode_wilayah', ), 'RESTRICT', 'RESTRICT', 'LembSertifikasis');
        $this->addRelation('LembagaAkreditasi', 'DataDikdas\\Model\\LembagaAkreditasi', RelationMap::ONE_TO_MANY, array('kode_wilayah' => 'kode_wilayah', ), 'RESTRICT', 'RESTRICT', 'LembagaAkreditasis');
        $this->addRelation('LembagaNonSekolah', 'DataDikdas\\Model\\LembagaNonSekolah', RelationMap::ONE_TO_MANY, array('kode_wilayah' => 'kode_wilayah', ), 'RESTRICT', 'RESTRICT', 'LembagaNonSekolahs');
        $this->addRelation('MstWilayahRelatedByKodeWilayah', 'DataDikdas\\Model\\MstWilayah', RelationMap::ONE_TO_MANY, array('kode_wilayah' => 'mst_kode_wilayah', ), 'RESTRICT', 'RESTRICT', 'MstWilayahsRelatedByKodeWilayah');
        $this->addRelation('Mulok', 'DataDikdas\\Model\\Mulok', RelationMap::ONE_TO_MANY, array('kode_wilayah' => 'kode_wilayah', ), 'RESTRICT', 'RESTRICT', 'Muloks');
        $this->addRelation('Pengguna', 'DataDikdas\\Model\\Pengguna', RelationMap::ONE_TO_MANY, array('kode_wilayah' => 'kode_wilayah', ), 'RESTRICT', 'RESTRICT', 'Penggunas');
        $this->addRelation('PesertaDidik', 'DataDikdas\\Model\\PesertaDidik', RelationMap::ONE_TO_MANY, array('kode_wilayah' => 'kode_wilayah', ), 'RESTRICT', 'RESTRICT', 'PesertaDidiks');
        $this->addRelation('Ptk', 'DataDikdas\\Model\\Ptk', RelationMap::ONE_TO_MANY, array('kode_wilayah' => 'kode_wilayah', ), 'RESTRICT', 'RESTRICT', 'Ptks');
        $this->addRelation('Publisher', 'DataDikdas\\Model\\Publisher', RelationMap::ONE_TO_MANY, array('kode_wilayah' => 'kode_wilayah', ), 'RESTRICT', 'RESTRICT', 'Publishers');
        $this->addRelation('Sekolah', 'DataDikdas\\Model\\Sekolah', RelationMap::ONE_TO_MANY, array('kode_wilayah' => 'kode_wilayah', ), 'RESTRICT', 'RESTRICT', 'Sekolahs');
        $this->addRelation('Tanah', 'DataDikdas\\Model\\Tanah', RelationMap::ONE_TO_MANY, array('kode_wilayah' => 'kode_wilayah', ), 'RESTRICT', 'RESTRICT', 'Tanahs');
        $this->addRelation('TetanggaKabkotaRelatedByKodeWilayah1', 'DataDikdas\\Model\\TetanggaKabkota', RelationMap::ONE_TO_MANY, array('kode_wilayah' => 'kode_wilayah1', ), 'RESTRICT', 'RESTRICT', 'TetanggaKabkotasRelatedByKodeWilayah1');
        $this->addRelation('TetanggaKabkotaRelatedByKodeWilayah2', 'DataDikdas\\Model\\TetanggaKabkota', RelationMap::ONE_TO_MANY, array('kode_wilayah' => 'kode_wilayah2', ), 'RESTRICT', 'RESTRICT', 'TetanggaKabkotasRelatedByKodeWilayah2');
        $this->addRelation('Yayasan', 'DataDikdas\\Model\\Yayasan', RelationMap::ONE_TO_MANY, array('kode_wilayah' => 'kode_wilayah', ), 'RESTRICT', 'RESTRICT', 'Yayasans');
    } // buildRelations()

} // MstWilayahTableMap
