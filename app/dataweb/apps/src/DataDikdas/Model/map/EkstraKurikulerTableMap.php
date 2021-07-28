<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'ref.ekstra_kurikuler' table.
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
class EkstraKurikulerTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.EkstraKurikulerTableMap';

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
        $this->setName('ref.ekstra_kurikuler');
        $this->setPhpName('EkstraKurikuler');
        $this->setClassname('DataDikdas\\Model\\EkstraKurikuler');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('id_ekskul', 'IdEkskul', 'INTEGER', true, null, null);
        $this->addColumn('nm_ekskul', 'NmEkskul', 'VARCHAR', true, 80, null);
        $this->addColumn('u_sd', 'USd', 'DECIMAL', true, 65536, 0);
        $this->addColumn('u_smp', 'USmp', 'DECIMAL', true, 65536, 0);
        $this->addColumn('u_sma', 'USma', 'DECIMAL', true, 65536, 0);
        $this->addColumn('u_smk', 'USmk', 'DECIMAL', true, 65536, 0);
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
        $this->addRelation('KelasEkskul', 'DataDikdas\\Model\\KelasEkskul', RelationMap::ONE_TO_MANY, array('id_ekskul' => 'id_ekskul', ), 'RESTRICT', 'RESTRICT', 'KelasEkskuls');
    } // buildRelations()

} // EkstraKurikulerTableMap
