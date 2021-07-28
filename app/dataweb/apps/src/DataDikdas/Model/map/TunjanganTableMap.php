<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'tunjangan' table.
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
class TunjanganTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.TunjanganTableMap';

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
        $this->setName('tunjangan');
        $this->setPhpName('Tunjangan');
        $this->setClassname('DataDikdas\\Model\\Tunjangan');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('tunjangan_id', 'TunjanganId', 'VARCHAR', true, null, null);
        $this->addForeignKey('ptk_id', 'PtkId', 'VARCHAR', 'ptk', 'ptk_id', true, null, null);
        $this->addForeignKey('jenis_tunjangan_id', 'JenisTunjanganId', 'INTEGER', 'ref.jenis_tunjangan', 'jenis_tunjangan_id', false, null, null);
        $this->addColumn('nama', 'Nama', 'VARCHAR', true, 50, null);
        $this->addColumn('instansi', 'Instansi', 'VARCHAR', false, 100, null);
        $this->addColumn('sk_tunjangan', 'SkTunjangan', 'VARCHAR', false, 80, null);
        $this->addColumn('tgl_sk_tunjangan', 'TglSkTunjangan', 'DATE', false, null, null);
        $this->addForeignKey('semester_id', 'SemesterId', 'CHAR', 'ref.semester', 'semester_id', false, 5, null);
        $this->addColumn('sumber_dana', 'SumberDana', 'VARCHAR', false, 30, null);
        $this->addColumn('dari_tahun', 'DariTahun', 'DECIMAL', true, 262144, null);
        $this->addColumn('sampai_tahun', 'SampaiTahun', 'DECIMAL', false, 262144, null);
        $this->addColumn('nominal', 'Nominal', 'DECIMAL', true, 1048578, null);
        $this->addColumn('status', 'Status', 'INTEGER', false, null, null);
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
        $this->addRelation('Semester', 'DataDikdas\\Model\\Semester', RelationMap::MANY_TO_ONE, array('semester_id' => 'semester_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('Ptk', 'DataDikdas\\Model\\Ptk', RelationMap::MANY_TO_ONE, array('ptk_id' => 'ptk_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('JenisTunjangan', 'DataDikdas\\Model\\JenisTunjangan', RelationMap::MANY_TO_ONE, array('jenis_tunjangan_id' => 'jenis_tunjangan_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('VldTunjangan', 'DataDikdas\\Model\\VldTunjangan', RelationMap::ONE_TO_MANY, array('tunjangan_id' => 'tunjangan_id', ), 'RESTRICT', 'RESTRICT', 'VldTunjangans');
    } // buildRelations()

} // TunjanganTableMap
