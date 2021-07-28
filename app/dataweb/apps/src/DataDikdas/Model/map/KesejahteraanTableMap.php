<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'kesejahteraan' table.
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
class KesejahteraanTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.KesejahteraanTableMap';

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
        $this->setName('kesejahteraan');
        $this->setPhpName('Kesejahteraan');
        $this->setClassname('DataDikdas\\Model\\Kesejahteraan');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('kesejahteraan_id', 'KesejahteraanId', 'VARCHAR', true, null, null);
        $this->addForeignKey('ptk_id', 'PtkId', 'VARCHAR', 'ptk', 'ptk_id', true, null, null);
        $this->addForeignKey('jenis_kesejahteraan_id', 'JenisKesejahteraanId', 'INTEGER', 'ref.jenis_kesejahteraan', 'jenis_kesejahteraan_id', true, null, null);
        $this->addColumn('nama', 'Nama', 'VARCHAR', true, 50, null);
        $this->addColumn('penyelenggara', 'Penyelenggara', 'VARCHAR', true, 100, null);
        $this->addColumn('dari_tahun', 'DariTahun', 'DECIMAL', true, 262144, null);
        $this->addColumn('sampai_tahun', 'SampaiTahun', 'DECIMAL', false, 262144, null);
        $this->addColumn('status', 'Status', 'INTEGER', false, null, null);
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
        $this->addRelation('JenisKesejahteraan', 'DataDikdas\\Model\\JenisKesejahteraan', RelationMap::MANY_TO_ONE, array('jenis_kesejahteraan_id' => 'jenis_kesejahteraan_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('VldKesejahteraan', 'DataDikdas\\Model\\VldKesejahteraan', RelationMap::ONE_TO_MANY, array('kesejahteraan_id' => 'kesejahteraan_id', ), 'RESTRICT', 'RESTRICT', 'VldKesejahteraans');
    } // buildRelations()

} // KesejahteraanTableMap
