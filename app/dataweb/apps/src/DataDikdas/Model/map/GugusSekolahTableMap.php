<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'gugus_sekolah' table.
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
class GugusSekolahTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.GugusSekolahTableMap';

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
        $this->setName('gugus_sekolah');
        $this->setPhpName('GugusSekolah');
        $this->setClassname('DataDikdas\\Model\\GugusSekolah');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('gugus_id', 'GugusId', 'VARCHAR', true, null, null);
        $this->addColumn('asal_data', 'AsalData', 'CHAR', true, 1, '1');
        $this->addColumn('nama', 'Nama', 'VARCHAR', true, 50, null);
        $this->addColumn('sk_gugus', 'SkGugus', 'VARCHAR', false, 80, null);
        $this->addForeignKey('jenis_gugus_id', 'JenisGugusId', 'DECIMAL', 'ref.jenis_gugus', 'jenis_gugus_id', true, 196608, null);
        $this->addForeignKey('sekolah_inti_id', 'SekolahIntiId', 'VARCHAR', 'sekolah', 'sekolah_id', false, null, null);
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
        $this->addRelation('JenisGugus', 'DataDikdas\\Model\\JenisGugus', RelationMap::MANY_TO_ONE, array('jenis_gugus_id' => 'jenis_gugus_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('Sekolah', 'DataDikdas\\Model\\Sekolah', RelationMap::MANY_TO_ONE, array('sekolah_inti_id' => 'sekolah_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('AnggotaGugus', 'DataDikdas\\Model\\AnggotaGugus', RelationMap::ONE_TO_MANY, array('gugus_id' => 'gugus_id', ), 'RESTRICT', 'RESTRICT', 'AnggotaGuguses');
    } // buildRelations()

} // GugusSekolahTableMap
