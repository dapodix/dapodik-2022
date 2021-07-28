<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'nilai.matev_rapor' table.
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
class MatevRaporTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.MatevRaporTableMap';

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
        $this->setName('nilai.matev_rapor');
        $this->setPhpName('MatevRapor');
        $this->setClassname('DataDikdas\\Model\\MatevRapor');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('id_evaluasi', 'IdEvaluasi', 'VARCHAR', true, null, null);
        $this->addColumn('nm_mata_evaluasi', 'NmMataEvaluasi', 'VARCHAR', true, 50, null);
        $this->addColumn('a_dari_template', 'ADariTemplate', 'DECIMAL', true, 65536, null);
        $this->addColumn('no_urut', 'NoUrut', 'DECIMAL', true, 196608, null);
        $this->addColumn('kkm_kognitif', 'KkmKognitif', 'DECIMAL', false, 327682, null);
        $this->addColumn('kkm_psikomotorik', 'KkmPsikomotorik', 'DECIMAL', false, 327682, null);
        $this->addColumn('rombongan_belajar_id', 'RombonganBelajarId', 'VARCHAR', true, null, null);
        $this->addForeignKey('mata_pelajaran_id', 'MataPelajaranId', 'INTEGER', 'ref.mata_pelajaran', 'mata_pelajaran_id', true, null, null);
        $this->addColumn('pembelajaran_id', 'PembelajaranId', 'VARCHAR', false, null, null);
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
        $this->addRelation('MataPelajaran', 'DataDikdas\\Model\\MataPelajaran', RelationMap::MANY_TO_ONE, array('mata_pelajaran_id' => 'mata_pelajaran_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('NilaiRapor', 'DataDikdas\\Model\\NilaiRapor', RelationMap::ONE_TO_MANY, array('id_evaluasi' => 'id_evaluasi', ), 'RESTRICT', 'RESTRICT', 'NilaiRapors');
    } // buildRelations()

} // MatevRaporTableMap
