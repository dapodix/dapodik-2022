<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'bitter_table' table.
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
class BitterTableTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.BitterTableTableMap';

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
        $this->setName('bitter_table');
        $this->setPhpName('BitterTable');
        $this->setClassname('DataDikdas\\Model\\BitterTable');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('bitter_table_id', 'BitterTableId', 'VARCHAR', true, null, null);
        $this->addColumn('param_1', 'Param1', 'VARCHAR', true, null, null);
        $this->addColumn('param_2', 'Param2', 'INTEGER', true, null, null);
        $this->addColumn('param_3', 'Param3', 'VARCHAR', true, null, null);
        $this->addColumn('param_4', 'Param4', 'LONGVARCHAR', true, null, null);
        $this->addColumn('create_date', 'CreateDate', 'TIMESTAMP', true, 2, 'now()');
        $this->addColumn('last_update', 'LastUpdate', 'TIMESTAMP', true, 2, 'now()');
        $this->addColumn('count_update', 'CountUpdate', 'SMALLINT', true, null, 1);
        $this->addColumn('param_5', 'Param5', 'LONGVARCHAR', false, null, null);
        $this->addColumn('param_6', 'Param6', 'LONGVARCHAR', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

} // BitterTableTableMap
