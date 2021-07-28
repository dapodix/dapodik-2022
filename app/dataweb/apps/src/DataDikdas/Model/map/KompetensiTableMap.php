<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'ref.kompetensi' table.
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
class KompetensiTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.KompetensiTableMap';

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
        $this->setName('ref.kompetensi');
        $this->setPhpName('Kompetensi');
        $this->setClassname('DataDikdas\\Model\\Kompetensi');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('id_komp', 'IdKomp', 'VARCHAR', true, null, null);
        $this->addColumn('desk', 'Desk', 'LONGVARCHAR', true, null, null);
        $this->addColumn('nmr', 'Nmr', 'VARCHAR', true, 5, null);
        $this->addColumn('kelompok', 'Kelompok', 'CHAR', true, 1, null);
        $this->addColumn('versi', 'Versi', 'INTEGER', true, null, null);
        $this->addForeignKey('id_inti_dasar', 'IdIntiDasar', 'VARCHAR', 'ref.kompetensi', 'id_komp', false, null, null);
        $this->addColumn('level_komp', 'LevelKomp', 'DECIMAL', false, 196608, null);
        $this->addForeignKey('tingkat_pendidikan_id', 'TingkatPendidikanId', 'DECIMAL', 'ref.tingkat_pendidikan', 'tingkat_pendidikan_id', true, 131072, null);
        $this->addForeignKey('kurikulum_id', 'KurikulumId', 'SMALLINT', 'ref.kurikulum', 'kurikulum_id', true, null, null);
        $this->addForeignKey('mata_pelajaran_id', 'MataPelajaranId', 'INTEGER', 'ref.mata_pelajaran', 'mata_pelajaran_id', true, null, null);
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
        $this->addRelation('KompetensiRelatedByIdIntiDasar', 'DataDikdas\\Model\\Kompetensi', RelationMap::MANY_TO_ONE, array('id_inti_dasar' => 'id_komp', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('Kurikulum', 'DataDikdas\\Model\\Kurikulum', RelationMap::MANY_TO_ONE, array('kurikulum_id' => 'kurikulum_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('MataPelajaran', 'DataDikdas\\Model\\MataPelajaran', RelationMap::MANY_TO_ONE, array('mata_pelajaran_id' => 'mata_pelajaran_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('TingkatPendidikan', 'DataDikdas\\Model\\TingkatPendidikan', RelationMap::MANY_TO_ONE, array('tingkat_pendidikan_id' => 'tingkat_pendidikan_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('KompetensiRelatedByIdKomp', 'DataDikdas\\Model\\Kompetensi', RelationMap::ONE_TO_MANY, array('id_komp' => 'id_inti_dasar', ), 'RESTRICT', 'RESTRICT', 'KompetensisRelatedByIdKomp');
    } // buildRelations()

} // KompetensiTableMap
