<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'ref.tingkat_pendidikan' table.
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
class TingkatPendidikanTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.TingkatPendidikanTableMap';

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
        $this->setName('ref.tingkat_pendidikan');
        $this->setPhpName('TingkatPendidikan');
        $this->setClassname('DataDikdas\\Model\\TingkatPendidikan');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('tingkat_pendidikan_id', 'TingkatPendidikanId', 'DECIMAL', true, 131072, null);
        $this->addColumn('kode', 'Kode', 'VARCHAR', true, 5, null);
        $this->addColumn('nama', 'Nama', 'VARCHAR', true, 20, null);
        $this->addForeignKey('jenjang_pendidikan_id', 'JenjangPendidikanId', 'DECIMAL', 'ref.jenjang_pendidikan', 'jenjang_pendidikan_id', true, 131072, null);
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
        $this->addRelation('JenjangPendidikan', 'DataDikdas\\Model\\JenjangPendidikan', RelationMap::MANY_TO_ONE, array('jenjang_pendidikan_id' => 'jenjang_pendidikan_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('Buku', 'DataDikdas\\Model\\Buku', RelationMap::ONE_TO_MANY, array('tingkat_pendidikan_id' => 'tingkat_pendidikan_id', ), 'RESTRICT', 'RESTRICT', 'Bukus');
        $this->addRelation('GroupMatpel', 'DataDikdas\\Model\\GroupMatpel', RelationMap::ONE_TO_MANY, array('tingkat_pendidikan_id' => 'tingkat_pendidikan_id', ), 'RESTRICT', 'RESTRICT', 'GroupMatpels');
        $this->addRelation('Kompetensi', 'DataDikdas\\Model\\Kompetensi', RelationMap::ONE_TO_MANY, array('tingkat_pendidikan_id' => 'tingkat_pendidikan_id', ), 'RESTRICT', 'RESTRICT', 'Kompetensis');
        $this->addRelation('MataPelajaranKurikulum', 'DataDikdas\\Model\\MataPelajaranKurikulum', RelationMap::ONE_TO_MANY, array('tingkat_pendidikan_id' => 'tingkat_pendidikan_id', ), 'RESTRICT', 'RESTRICT', 'MataPelajaranKurikulums');
        $this->addRelation('RombonganBelajar', 'DataDikdas\\Model\\RombonganBelajar', RelationMap::ONE_TO_MANY, array('tingkat_pendidikan_id' => 'tingkat_pendidikan_id', ), 'RESTRICT', 'RESTRICT', 'RombonganBelajars');
        $this->addRelation('TingkatBiblio', 'DataDikdas\\Model\\TingkatBiblio', RelationMap::ONE_TO_MANY, array('tingkat_pendidikan_id' => 'tingkat_pendidikan_id', ), 'RESTRICT', 'RESTRICT', 'TingkatBiblios');
    } // buildRelations()

} // TingkatPendidikanTableMap
