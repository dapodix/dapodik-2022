<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'penghargaan' table.
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
class PenghargaanTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.PenghargaanTableMap';

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
        $this->setName('penghargaan');
        $this->setPhpName('Penghargaan');
        $this->setClassname('DataDikdas\\Model\\Penghargaan');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('penghargaan_id', 'PenghargaanId', 'VARCHAR', true, null, null);
        $this->addForeignKey('tingkat_penghargaan_id', 'TingkatPenghargaanId', 'INTEGER', 'ref.tingkat_penghargaan', 'tingkat_penghargaan_id', true, null, null);
        $this->addForeignKey('ptk_id', 'PtkId', 'VARCHAR', 'ptk', 'ptk_id', true, null, null);
        $this->addForeignKey('jenis_penghargaan_id', 'JenisPenghargaanId', 'INTEGER', 'ref.jenis_penghargaan', 'jenis_penghargaan_id', true, null, null);
        $this->addColumn('nama', 'Nama', 'VARCHAR', true, 50, null);
        $this->addColumn('tahun', 'Tahun', 'DECIMAL', true, 262144, null);
        $this->addColumn('instansi', 'Instansi', 'VARCHAR', false, 100, null);
        $this->addColumn('asal_data', 'AsalData', 'CHAR', true, 1, '1');
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
        $this->addRelation('Ptk', 'DataDikdas\\Model\\Ptk', RelationMap::MANY_TO_ONE, array('ptk_id' => 'ptk_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('JenisPenghargaan', 'DataDikdas\\Model\\JenisPenghargaan', RelationMap::MANY_TO_ONE, array('jenis_penghargaan_id' => 'jenis_penghargaan_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('TingkatPenghargaan', 'DataDikdas\\Model\\TingkatPenghargaan', RelationMap::MANY_TO_ONE, array('tingkat_penghargaan_id' => 'tingkat_penghargaan_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('VldPenghargaan', 'DataDikdas\\Model\\VldPenghargaan', RelationMap::ONE_TO_MANY, array('penghargaan_id' => 'penghargaan_id', ), 'RESTRICT', 'RESTRICT', 'VldPenghargaans');
    } // buildRelations()

} // PenghargaanTableMap
