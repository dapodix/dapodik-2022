<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'dudi' table.
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
class DudiTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.DudiTableMap';

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
        $this->setName('dudi');
        $this->setPhpName('Dudi');
        $this->setClassname('DataDikdas\\Model\\Dudi');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('dudi_id', 'DudiId', 'VARCHAR', true, null, null);
        $this->addColumn('nama', 'Nama', 'VARCHAR', true, 100, null);
        $this->addForeignKey('bidang_usaha_id', 'BidangUsahaId', 'CHAR', 'ref.bidang_usaha', 'bidang_usaha_id', true, 10, null);
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
        $this->addColumn('npwp', 'Npwp', 'CHAR', false, 15, null);
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
        $this->addRelation('BidangUsaha', 'DataDikdas\\Model\\BidangUsaha', RelationMap::MANY_TO_ONE, array('bidang_usaha_id' => 'bidang_usaha_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('Mou', 'DataDikdas\\Model\\Mou', RelationMap::ONE_TO_MANY, array('dudi_id' => 'dudi_id', ), 'RESTRICT', 'RESTRICT', 'Mous');
        $this->addRelation('TracerLulusan', 'DataDikdas\\Model\\TracerLulusan', RelationMap::ONE_TO_MANY, array('dudi_id' => 'dudi_id', ), 'RESTRICT', 'RESTRICT', 'TracerLulusans');
        $this->addRelation('VldDudi', 'DataDikdas\\Model\\VldDudi', RelationMap::ONE_TO_MANY, array('dudi_id' => 'dudi_id', ), 'RESTRICT', 'RESTRICT', 'VldDudis');
    } // buildRelations()

} // DudiTableMap
