<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'nilai_test' table.
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
class NilaiTestTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.NilaiTestTableMap';

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
        $this->setName('nilai_test');
        $this->setPhpName('NilaiTest');
        $this->setClassname('DataDikdas\\Model\\NilaiTest');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('nilai_test_id', 'NilaiTestId', 'VARCHAR', true, null, null);
        $this->addForeignKey('jenis_test_id', 'JenisTestId', 'DECIMAL', 'ref.jenis_test', 'jenis_test_id', true, 196608, null);
        $this->addForeignKey('ptk_id', 'PtkId', 'VARCHAR', 'ptk', 'ptk_id', true, null, null);
        $this->addColumn('nama', 'Nama', 'VARCHAR', true, 50, null);
        $this->addColumn('penyelenggara', 'Penyelenggara', 'VARCHAR', true, 100, null);
        $this->addColumn('tahun', 'Tahun', 'DECIMAL', true, 262144, null);
        $this->addColumn('skor', 'Skor', 'DECIMAL', true, 393218, null);
        $this->addColumn('skor1', 'Skor1', 'DECIMAL', false, 393218, null);
        $this->addColumn('skor2', 'Skor2', 'DECIMAL', false, 393218, null);
        $this->addColumn('skor3', 'Skor3', 'DECIMAL', false, 393218, null);
        $this->addColumn('skor4', 'Skor4', 'DECIMAL', false, 393218, null);
        $this->addColumn('skor5', 'Skor5', 'DECIMAL', false, 393218, null);
        $this->addColumn('nomor_peserta', 'NomorPeserta', 'VARCHAR', false, 12, null);
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
        $this->addRelation('JenisTest', 'DataDikdas\\Model\\JenisTest', RelationMap::MANY_TO_ONE, array('jenis_test_id' => 'jenis_test_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('Ptk', 'DataDikdas\\Model\\Ptk', RelationMap::MANY_TO_ONE, array('ptk_id' => 'ptk_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('VldNilaiTest', 'DataDikdas\\Model\\VldNilaiTest', RelationMap::ONE_TO_MANY, array('nilai_test_id' => 'nilai_test_id', ), 'RESTRICT', 'RESTRICT', 'VldNilaiTests');
    } // buildRelations()

} // NilaiTestTableMap
