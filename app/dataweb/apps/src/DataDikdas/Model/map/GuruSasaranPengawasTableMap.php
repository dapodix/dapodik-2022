<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'guru_sasaran_pengawas' table.
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
class GuruSasaranPengawasTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.GuruSasaranPengawasTableMap';

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
        $this->setName('guru_sasaran_pengawas');
        $this->setPhpName('GuruSasaranPengawas');
        $this->setClassname('DataDikdas\\Model\\GuruSasaranPengawas');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addForeignPrimaryKey('pengawas_terdaftar_id', 'PengawasTerdaftarId', 'VARCHAR' , 'pengawas_terdaftar', 'pengawas_terdaftar_id', true, null, null);
        $this->addForeignPrimaryKey('ptk_terdaftar_id', 'PtkTerdaftarId', 'VARCHAR' , 'ptk_terdaftar', 'ptk_terdaftar_id', true, null, null);
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
        $this->addRelation('PengawasTerdaftar', 'DataDikdas\\Model\\PengawasTerdaftar', RelationMap::MANY_TO_ONE, array('pengawas_terdaftar_id' => 'pengawas_terdaftar_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('PtkTerdaftar', 'DataDikdas\\Model\\PtkTerdaftar', RelationMap::MANY_TO_ONE, array('ptk_terdaftar_id' => 'ptk_terdaftar_id', ), 'RESTRICT', 'RESTRICT');
    } // buildRelations()

} // GuruSasaranPengawasTableMap
