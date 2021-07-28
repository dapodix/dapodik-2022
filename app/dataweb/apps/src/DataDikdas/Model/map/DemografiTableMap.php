<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'demografi' table.
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
class DemografiTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.DemografiTableMap';

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
        $this->setName('demografi');
        $this->setPhpName('Demografi');
        $this->setClassname('DataDikdas\\Model\\Demografi');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('demografi_id', 'DemografiId', 'VARCHAR', true, null, null);
        $this->addForeignKey('kode_wilayah', 'KodeWilayah', 'CHAR', 'ref.mst_wilayah', 'kode_wilayah', true, 8, null);
        $this->addForeignKey('tahun_ajaran_id', 'TahunAjaranId', 'DECIMAL', 'ref.tahun_ajaran', 'tahun_ajaran_id', true, 262144, null);
        $this->addColumn('usia_5', 'Usia5', 'BIGINT', true, null, null);
        $this->addColumn('usia_7', 'Usia7', 'BIGINT', true, null, null);
        $this->addColumn('usia_13', 'Usia13', 'BIGINT', true, null, null);
        $this->addColumn('usia_16', 'Usia16', 'BIGINT', true, null, null);
        $this->addColumn('usia_18', 'Usia18', 'BIGINT', true, null, null);
        $this->addColumn('jumlah_penduduk', 'JumlahPenduduk', 'BIGINT', true, null, null);
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
        $this->addRelation('MstWilayah', 'DataDikdas\\Model\\MstWilayah', RelationMap::MANY_TO_ONE, array('kode_wilayah' => 'kode_wilayah', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('TahunAjaran', 'DataDikdas\\Model\\TahunAjaran', RelationMap::MANY_TO_ONE, array('tahun_ajaran_id' => 'tahun_ajaran_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('VldDemografi', 'DataDikdas\\Model\\VldDemografi', RelationMap::ONE_TO_MANY, array('demografi_id' => 'demografi_id', ), 'RESTRICT', 'RESTRICT', 'VldDemografis');
    } // buildRelations()

} // DemografiTableMap
