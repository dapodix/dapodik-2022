<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'ref.jenis_keluar' table.
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
class JenisKeluarTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.JenisKeluarTableMap';

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
        $this->setName('ref.jenis_keluar');
        $this->setPhpName('JenisKeluar');
        $this->setClassname('DataDikdas\\Model\\JenisKeluar');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('jenis_keluar_id', 'JenisKeluarId', 'CHAR', true, 1, null);
        $this->addColumn('ket_keluar', 'KetKeluar', 'VARCHAR', true, 40, null);
        $this->addColumn('keluar_pd', 'KeluarPd', 'DECIMAL', true, 65536, null);
        $this->addColumn('keluar_ptk', 'KeluarPtk', 'DECIMAL', true, 65536, null);
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
        $this->addRelation('PengawasTerdaftar', 'DataDikdas\\Model\\PengawasTerdaftar', RelationMap::ONE_TO_MANY, array('jenis_keluar_id' => 'jenis_keluar_id', ), 'RESTRICT', 'RESTRICT', 'PengawasTerdaftars');
        $this->addRelation('PtkTerdaftar', 'DataDikdas\\Model\\PtkTerdaftar', RelationMap::ONE_TO_MANY, array('jenis_keluar_id' => 'jenis_keluar_id', ), 'RESTRICT', 'RESTRICT', 'PtkTerdaftars');
        $this->addRelation('RegistrasiPesertaDidik', 'DataDikdas\\Model\\RegistrasiPesertaDidik', RelationMap::ONE_TO_MANY, array('jenis_keluar_id' => 'jenis_keluar_id', ), 'RESTRICT', 'RESTRICT', 'RegistrasiPesertaDidiks');
    } // buildRelations()

} // JenisKeluarTableMap
