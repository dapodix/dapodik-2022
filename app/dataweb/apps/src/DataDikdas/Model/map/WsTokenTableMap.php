<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'ws_token' table.
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
class WsTokenTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.WsTokenTableMap';

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
        $this->setName('ws_token');
        $this->setPhpName('WsToken');
        $this->setClassname('DataDikdas\\Model\\WsToken');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('ws_token_id', 'WsTokenId', 'VARCHAR', true, null, null);
        $this->addColumn('sekolah_id', 'SekolahId', 'VARCHAR', true, null, null);
        $this->addColumn('ip_address', 'IpAddress', 'VARCHAR', false, 15, null);
        $this->addColumn('port', 'Port', 'VARCHAR', false, 5, null);
        $this->addColumn('mac_address', 'MacAddress', 'VARCHAR', false, 20, null);
        $this->addColumn('token', 'Token', 'VARCHAR', true, 100, null);
        $this->addColumn('request_date', 'RequestDate', 'TIMESTAMP', true, null, null);
        $this->addColumn('expired_date', 'ExpiredDate', 'TIMESTAMP', true, null, null);
        $this->addColumn('ws_aplikasi_id', 'WsAplikasiId', 'VARCHAR', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

} // WsTokenTableMap
