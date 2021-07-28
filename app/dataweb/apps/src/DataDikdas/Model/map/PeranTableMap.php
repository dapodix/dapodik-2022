<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'man_akses.peran' table.
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
class PeranTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.PeranTableMap';

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
        $this->setName('man_akses.peran');
        $this->setPhpName('Peran');
        $this->setClassname('DataDikdas\\Model\\Peran');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('peran_id', 'PeranId', 'INTEGER', true, null, null);
        $this->addForeignKey('bentuk_pendidikan_id', 'BentukPendidikanId', 'SMALLINT', 'ref.bentuk_pendidikan', 'bentuk_pendidikan_id', true, null, null);
        $this->addColumn('nama', 'Nama', 'VARCHAR', false, 200, null);
        $this->addColumn('a_perlu_sk', 'APerluSk', 'DECIMAL', true, 65536, 0);
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
        $this->addRelation('BentukPendidikan', 'DataDikdas\\Model\\BentukPendidikan', RelationMap::MANY_TO_ONE, array('bentuk_pendidikan_id' => 'bentuk_pendidikan_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('MenuRole', 'DataDikdas\\Model\\MenuRole', RelationMap::ONE_TO_MANY, array('peran_id' => 'peran_id', ), 'RESTRICT', 'RESTRICT', 'MenuRoles');
        $this->addRelation('RolePengguna', 'DataDikdas\\Model\\RolePengguna', RelationMap::ONE_TO_MANY, array('peran_id' => 'peran_id', ), 'RESTRICT', 'RESTRICT', 'RolePenggunas');
    } // buildRelations()

} // PeranTableMap
