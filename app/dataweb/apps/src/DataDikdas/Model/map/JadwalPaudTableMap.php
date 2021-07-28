<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'ref.jadwal_paud' table.
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
class JadwalPaudTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.JadwalPaudTableMap';

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
        $this->setName('ref.jadwal_paud');
        $this->setPhpName('JadwalPaud');
        $this->setClassname('DataDikdas\\Model\\JadwalPaud');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('jadwal_id', 'JadwalId', 'DECIMAL', true, 131072, null);
        $this->addColumn('nama', 'Nama', 'VARCHAR', true, 100, null);
        $this->addColumn('kesehatan', 'Kesehatan', 'DECIMAL', true, 65536, null);
        $this->addColumn('pamts', 'Pamts', 'DECIMAL', true, 65536, null);
        $this->addColumn('ddtk', 'Ddtk', 'DECIMAL', true, 65536, null);
        $this->addColumn('freq_parenting', 'FreqParenting', 'DECIMAL', true, 65536, null);
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
        $this->addRelation('SekolahPaudRelatedByFreqParenting', 'DataDikdas\\Model\\SekolahPaud', RelationMap::ONE_TO_MANY, array('jadwal_id' => 'freq_parenting', ), 'RESTRICT', 'RESTRICT', 'SekolahPaudsRelatedByFreqParenting');
        $this->addRelation('SekolahPaudRelatedByJadwalDdtk', 'DataDikdas\\Model\\SekolahPaud', RelationMap::ONE_TO_MANY, array('jadwal_id' => 'jadwal_ddtk', ), 'RESTRICT', 'RESTRICT', 'SekolahPaudsRelatedByJadwalDdtk');
        $this->addRelation('SekolahPaudRelatedByJadwalKesehatan', 'DataDikdas\\Model\\SekolahPaud', RelationMap::ONE_TO_MANY, array('jadwal_id' => 'jadwal_kesehatan', ), 'RESTRICT', 'RESTRICT', 'SekolahPaudsRelatedByJadwalKesehatan');
        $this->addRelation('SekolahPaudRelatedByJadwalPmtas', 'DataDikdas\\Model\\SekolahPaud', RelationMap::ONE_TO_MANY, array('jadwal_id' => 'jadwal_pmtas', ), 'RESTRICT', 'RESTRICT', 'SekolahPaudsRelatedByJadwalPmtas');
    } // buildRelations()

} // JadwalPaudTableMap
