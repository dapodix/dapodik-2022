<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'ref.bentuk_pendidikan' table.
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
class BentukPendidikanTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.BentukPendidikanTableMap';

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
        $this->setName('ref.bentuk_pendidikan');
        $this->setPhpName('BentukPendidikan');
        $this->setClassname('DataDikdas\\Model\\BentukPendidikan');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('bentuk_pendidikan_id', 'BentukPendidikanId', 'SMALLINT', true, null, null);
        $this->addColumn('nama', 'Nama', 'VARCHAR', true, 50, null);
        $this->addColumn('jenjang_paud', 'JenjangPaud', 'DECIMAL', true, 65536, null);
        $this->addColumn('jenjang_tk', 'JenjangTk', 'DECIMAL', true, 65536, null);
        $this->addColumn('jenjang_sd', 'JenjangSd', 'DECIMAL', true, 65536, null);
        $this->addColumn('jenjang_smp', 'JenjangSmp', 'DECIMAL', true, 65536, null);
        $this->addColumn('jenjang_sma', 'JenjangSma', 'DECIMAL', true, 65536, null);
        $this->addColumn('jenjang_tinggi', 'JenjangTinggi', 'DECIMAL', true, 65536, null);
        $this->addColumn('direktorat_pembinaan', 'DirektoratPembinaan', 'VARCHAR', false, 40, null);
        $this->addColumn('aktif', 'Aktif', 'DECIMAL', true, 65536, null);
        $this->addColumn('formalitas_pendidikan', 'FormalitasPendidikan', 'CHAR', true, 1, null);
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
        $this->addRelation('Peran', 'DataDikdas\\Model\\Peran', RelationMap::ONE_TO_MANY, array('bentuk_pendidikan_id' => 'bentuk_pendidikan_id', ), 'RESTRICT', 'RESTRICT', 'Perans');
        $this->addRelation('Sekolah', 'DataDikdas\\Model\\Sekolah', RelationMap::ONE_TO_MANY, array('bentuk_pendidikan_id' => 'bentuk_pendidikan_id', ), 'RESTRICT', 'RESTRICT', 'Sekolahs');
        $this->addRelation('StandarSarana', 'DataDikdas\\Model\\StandarSarana', RelationMap::ONE_TO_MANY, array('bentuk_pendidikan_id' => 'bentuk_pendidikan_id', ), 'RESTRICT', 'RESTRICT', 'StandarSaranas');
    } // buildRelations()

} // BentukPendidikanTableMap
