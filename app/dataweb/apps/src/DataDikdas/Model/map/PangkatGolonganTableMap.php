<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'ref.pangkat_golongan' table.
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
class PangkatGolonganTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.PangkatGolonganTableMap';

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
        $this->setName('ref.pangkat_golongan');
        $this->setPhpName('PangkatGolongan');
        $this->setClassname('DataDikdas\\Model\\PangkatGolongan');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('pangkat_golongan_id', 'PangkatGolonganId', 'DECIMAL', true, 131072, null);
        $this->addColumn('kode', 'Kode', 'VARCHAR', true, 5, null);
        $this->addColumn('nama', 'Nama', 'VARCHAR', true, 20, null);
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
        $this->addRelation('Inpassing', 'DataDikdas\\Model\\Inpassing', RelationMap::ONE_TO_MANY, array('pangkat_golongan_id' => 'pangkat_golongan_id', ), 'RESTRICT', 'RESTRICT', 'Inpassings');
        $this->addRelation('Ptk', 'DataDikdas\\Model\\Ptk', RelationMap::ONE_TO_MANY, array('pangkat_golongan_id' => 'pangkat_golongan_id', ), 'RESTRICT', 'RESTRICT', 'Ptks');
        $this->addRelation('RiwayatGajiBerkala', 'DataDikdas\\Model\\RiwayatGajiBerkala', RelationMap::ONE_TO_MANY, array('pangkat_golongan_id' => 'pangkat_golongan_id', ), 'RESTRICT', 'RESTRICT', 'RiwayatGajiBerkalas');
        $this->addRelation('RwyKepangkatan', 'DataDikdas\\Model\\RwyKepangkatan', RelationMap::ONE_TO_MANY, array('pangkat_golongan_id' => 'pangkat_golongan_id', ), 'RESTRICT', 'RESTRICT', 'RwyKepangkatans');
    } // buildRelations()

} // PangkatGolonganTableMap
