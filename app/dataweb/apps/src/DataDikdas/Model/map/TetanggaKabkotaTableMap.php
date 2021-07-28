<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'ref.tetangga_kabkota' table.
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
class TetanggaKabkotaTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.TetanggaKabkotaTableMap';

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
        $this->setName('ref.tetangga_kabkota');
        $this->setPhpName('TetanggaKabkota');
        $this->setClassname('DataDikdas\\Model\\TetanggaKabkota');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addForeignPrimaryKey('kode_wilayah1', 'KodeWilayah1', 'CHAR' , 'ref.mst_wilayah', 'kode_wilayah', true, 8, null);
        $this->addForeignPrimaryKey('kode_wilayah2', 'KodeWilayah2', 'CHAR' , 'ref.mst_wilayah', 'kode_wilayah', true, 8, null);
        $this->addColumn('create_date', 'CreateDate', 'TIMESTAMP', true, null, 'now()');
        $this->addColumn('last_update', 'LastUpdate', 'TIMESTAMP', true, null, 'now()');
        $this->addColumn('expired_date', 'ExpiredDate', 'TIMESTAMP', false, null, null);
        $this->addColumn('last_sync', 'LastSync', 'TIMESTAMP', true, null, '1901-01-01 00:00:00');
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('MstWilayahRelatedByKodeWilayah1', 'DataDikdas\\Model\\MstWilayah', RelationMap::MANY_TO_ONE, array('kode_wilayah1' => 'kode_wilayah', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('MstWilayahRelatedByKodeWilayah2', 'DataDikdas\\Model\\MstWilayah', RelationMap::MANY_TO_ONE, array('kode_wilayah2' => 'kode_wilayah', ), 'RESTRICT', 'RESTRICT');
    } // buildRelations()

} // TetanggaKabkotaTableMap
