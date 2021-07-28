<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'ref.kelompok_bidang' table.
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
class KelompokBidangTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.KelompokBidangTableMap';

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
        $this->setName('ref.kelompok_bidang');
        $this->setPhpName('KelompokBidang');
        $this->setClassname('DataDikdas\\Model\\KelompokBidang');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('level_bidang_id', 'LevelBidangId', 'VARCHAR', true, 5, null);
        $this->addColumn('nama_level_bidang', 'NamaLevelBidang', 'VARCHAR', true, 100, null);
        $this->addColumn('untuk_sma', 'UntukSma', 'DECIMAL', true, 65536, null);
        $this->addColumn('untuk_smk', 'UntukSmk', 'DECIMAL', true, 65536, null);
        $this->addColumn('untuk_pt', 'UntukPt', 'DECIMAL', true, 65536, null);
        $this->addColumn('untuk_slb', 'UntukSlb', 'DECIMAL', true, 65536, 0);
        $this->addColumn('untuk_smklb', 'UntukSmklb', 'DECIMAL', true, 65536, 0);
        $this->addForeignKey('level_bidang_induk', 'LevelBidangInduk', 'VARCHAR', 'ref.kelompok_bidang', 'level_bidang_id', false, 5, null);
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
        $this->addRelation('KelompokBidangRelatedByLevelBidangInduk', 'DataDikdas\\Model\\KelompokBidang', RelationMap::MANY_TO_ONE, array('level_bidang_induk' => 'level_bidang_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('Jurusan', 'DataDikdas\\Model\\Jurusan', RelationMap::ONE_TO_MANY, array('level_bidang_id' => 'level_bidang_id', ), 'RESTRICT', 'RESTRICT', 'Jurusans');
        $this->addRelation('KelompokBidangRelatedByLevelBidangId', 'DataDikdas\\Model\\KelompokBidang', RelationMap::ONE_TO_MANY, array('level_bidang_id' => 'level_bidang_induk', ), 'RESTRICT', 'RESTRICT', 'KelompokBidangsRelatedByLevelBidangId');
    } // buildRelations()

} // KelompokBidangTableMap
