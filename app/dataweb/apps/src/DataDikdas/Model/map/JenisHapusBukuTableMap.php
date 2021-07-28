<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'ref.jenis_hapus_buku' table.
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
class JenisHapusBukuTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.JenisHapusBukuTableMap';

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
        $this->setName('ref.jenis_hapus_buku');
        $this->setPhpName('JenisHapusBuku');
        $this->setClassname('DataDikdas\\Model\\JenisHapusBuku');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('id_hapus_buku', 'IdHapusBuku', 'CHAR', true, 1, null);
        $this->addColumn('ket_hapus_buku', 'KetHapusBuku', 'VARCHAR', true, 80, null);
        $this->addColumn('u_prasarana', 'UPrasarana', 'DECIMAL', true, 65536, null);
        $this->addColumn('u_sarana', 'USarana', 'DECIMAL', true, 65536, null);
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
        $this->addRelation('Alat', 'DataDikdas\\Model\\Alat', RelationMap::ONE_TO_MANY, array('id_hapus_buku' => 'id_hapus_buku', ), 'RESTRICT', 'RESTRICT', 'Alats');
        $this->addRelation('Angkutan', 'DataDikdas\\Model\\Angkutan', RelationMap::ONE_TO_MANY, array('id_hapus_buku' => 'id_hapus_buku', ), 'RESTRICT', 'RESTRICT', 'Angkutans');
        $this->addRelation('Bangunan', 'DataDikdas\\Model\\Bangunan', RelationMap::ONE_TO_MANY, array('id_hapus_buku' => 'id_hapus_buku', ), 'RESTRICT', 'RESTRICT', 'Bangunans');
        $this->addRelation('Buku', 'DataDikdas\\Model\\Buku', RelationMap::ONE_TO_MANY, array('id_hapus_buku' => 'id_hapus_buku', ), 'RESTRICT', 'RESTRICT', 'Bukus');
        $this->addRelation('Tanah', 'DataDikdas\\Model\\Tanah', RelationMap::ONE_TO_MANY, array('id_hapus_buku' => 'id_hapus_buku', ), 'RESTRICT', 'RESTRICT', 'Tanahs');
    } // buildRelations()

} // JenisHapusBukuTableMap
