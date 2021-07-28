<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'ref.jenis_test' table.
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
class JenisTestTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.JenisTestTableMap';

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
        $this->setName('ref.jenis_test');
        $this->setPhpName('JenisTest');
        $this->setClassname('DataDikdas\\Model\\JenisTest');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('jenis_test_id', 'JenisTestId', 'DECIMAL', true, 196608, null);
        $this->addColumn('jenis_test', 'JenisTest', 'VARCHAR', true, 30, null);
        $this->addColumn('keterangan', 'Keterangan', 'VARCHAR', false, 80, null);
        $this->addColumn('nilai_maks', 'NilaiMaks', 'DECIMAL', true, 393218, null);
        $this->addColumn('ket_skor1', 'KetSkor1', 'VARCHAR', false, 80, null);
        $this->addColumn('ket_skor2', 'KetSkor2', 'VARCHAR', false, 80, null);
        $this->addColumn('ket_skor3', 'KetSkor3', 'VARCHAR', false, 80, null);
        $this->addColumn('ket_skor4', 'KetSkor4', 'VARCHAR', false, 80, null);
        $this->addColumn('ket_skor5', 'KetSkor5', 'VARCHAR', false, 80, null);
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
        $this->addRelation('NilaiTest', 'DataDikdas\\Model\\NilaiTest', RelationMap::ONE_TO_MANY, array('jenis_test_id' => 'jenis_test_id', ), 'RESTRICT', 'RESTRICT', 'NilaiTests');
    } // buildRelations()

} // JenisTestTableMap
