<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'nilai.nilai_rapor' table.
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
class NilaiRaporTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.NilaiRaporTableMap';

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
        $this->setName('nilai.nilai_rapor');
        $this->setPhpName('NilaiRapor');
        $this->setClassname('DataDikdas\\Model\\NilaiRapor');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('nilai_id', 'NilaiId', 'VARCHAR', true, null, null);
        $this->addForeignKey('id_evaluasi', 'IdEvaluasi', 'VARCHAR', 'nilai.matev_rapor', 'id_evaluasi', true, null, null);
        $this->addColumn('anggota_rombel_id', 'AnggotaRombelId', 'VARCHAR', true, null, null);
        $this->addColumn('nilai_kognitif_angka', 'NilaiKognitifAngka', 'DECIMAL', true, 327682, null);
        $this->addColumn('nilai_kognitif_huruf', 'NilaiKognitifHuruf', 'VARCHAR', false, 3, null);
        $this->addColumn('ket_kognitif', 'KetKognitif', 'VARCHAR', false, 300, null);
        $this->addColumn('nilai_psim_angka', 'NilaiPsimAngka', 'DECIMAL', false, 327682, null);
        $this->addColumn('nilai_psim_huruf', 'NilaiPsimHuruf', 'VARCHAR', false, 3, null);
        $this->addColumn('ket_psim', 'KetPsim', 'VARCHAR', false, 300, null);
        $this->addColumn('nilai_afektif_angka', 'NilaiAfektifAngka', 'DECIMAL', false, 327682, null);
        $this->addColumn('nilai_afektif_huruf', 'NilaiAfektifHuruf', 'VARCHAR', false, 3, null);
        $this->addColumn('ket_afektif', 'KetAfektif', 'VARCHAR', false, 300, null);
        $this->addColumn('nilai_afektif2_angka', 'NilaiAfektif2Angka', 'DECIMAL', false, 327682, null);
        $this->addColumn('nilai_afektif2_huruf', 'NilaiAfektif2Huruf', 'VARCHAR', false, 3, null);
        $this->addColumn('ket_afektif2', 'KetAfektif2', 'VARCHAR', false, 300, null);
        $this->addColumn('a_beku', 'ABeku', 'DECIMAL', true, 65536, 0);
        $this->addColumn('rapor_ke', 'RaporKe', 'DECIMAL', false, 131072, null);
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
        $this->addRelation('MatevRapor', 'DataDikdas\\Model\\MatevRapor', RelationMap::MANY_TO_ONE, array('id_evaluasi' => 'id_evaluasi', ), 'RESTRICT', 'RESTRICT');
    } // buildRelations()

} // NilaiRaporTableMap
