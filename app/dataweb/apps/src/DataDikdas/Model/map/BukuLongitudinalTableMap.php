<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'buku_longitudinal' table.
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
class BukuLongitudinalTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.BukuLongitudinalTableMap';

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
        $this->setName('buku_longitudinal');
        $this->setPhpName('BukuLongitudinal');
        $this->setClassname('DataDikdas\\Model\\BukuLongitudinal');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addForeignPrimaryKey('id_buku', 'IdBuku', 'VARCHAR' , 'buku', 'id_buku', true, null, null);
        $this->addForeignPrimaryKey('semester_id', 'SemesterId', 'CHAR' , 'ref.semester', 'semester_id', true, 5, null);
        $this->addColumn('jumlah', 'Jumlah', 'INTEGER', true, null, null);
        $this->addColumn('status_kelaikan', 'StatusKelaikan', 'DECIMAL', true, 65536, null);
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
        $this->addRelation('Buku', 'DataDikdas\\Model\\Buku', RelationMap::MANY_TO_ONE, array('id_buku' => 'id_buku', ), 'RESTRICT', 'RESTRICT');
    } // buildRelations()

} // BukuLongitudinalTableMap
