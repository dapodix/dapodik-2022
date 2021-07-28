<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'akreditasi_prodi' table.
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
class AkreditasiProdiTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.AkreditasiProdiTableMap';

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
        $this->setName('akreditasi_prodi');
        $this->setPhpName('AkreditasiProdi');
        $this->setClassname('DataDikdas\\Model\\AkreditasiProdi');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('akred_prodi_id', 'AkredProdiId', 'VARCHAR', true, null, null);
        $this->addForeignKey('akreditasi_id', 'AkreditasiId', 'DECIMAL', 'ref.akreditasi', 'akreditasi_id', true, 65536, null);
        $this->addForeignKey('la_id', 'LaId', 'CHAR', 'ref.lembaga_akreditasi', 'la_id', true, 5, null);
        $this->addForeignKey('jurusan_sp_id', 'JurusanSpId', 'VARCHAR', 'jurusan_sp', 'jurusan_sp_id', true, null, null);
        $this->addColumn('no_sk_akred', 'NoSkAkred', 'VARCHAR', true, 80, null);
        $this->addColumn('tgl_sk_akred', 'TglSkAkred', 'DATE', true, null, null);
        $this->addColumn('tgl_akhir_akred', 'TglAkhirAkred', 'DATE', true, null, null);
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
        $this->addRelation('LembagaAkreditasi', 'DataDikdas\\Model\\LembagaAkreditasi', RelationMap::MANY_TO_ONE, array('la_id' => 'la_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('JurusanSp', 'DataDikdas\\Model\\JurusanSp', RelationMap::MANY_TO_ONE, array('jurusan_sp_id' => 'jurusan_sp_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('Akreditasi', 'DataDikdas\\Model\\Akreditasi', RelationMap::MANY_TO_ONE, array('akreditasi_id' => 'akreditasi_id', ), 'RESTRICT', 'RESTRICT');
    } // buildRelations()

} // AkreditasiProdiTableMap
