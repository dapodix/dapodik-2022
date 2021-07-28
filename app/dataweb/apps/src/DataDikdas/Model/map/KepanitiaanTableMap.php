<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'kepanitiaan' table.
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
class KepanitiaanTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.KepanitiaanTableMap';

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
        $this->setName('kepanitiaan');
        $this->setPhpName('Kepanitiaan');
        $this->setClassname('DataDikdas\\Model\\Kepanitiaan');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('id_panitia', 'IdPanitia', 'VARCHAR', true, null, null);
        $this->addForeignKey('sekolah_id', 'SekolahId', 'VARCHAR', 'sekolah', 'sekolah_id', false, null, null);
        $this->addForeignKey('id_jns_panitia', 'IdJnsPanitia', 'INTEGER', 'ref.jenis_kepanitiaan', 'id_jns_panitia', true, null, null);
        $this->addColumn('nm_panitia', 'NmPanitia', 'VARCHAR', true, 80, null);
        $this->addColumn('instansi', 'Instansi', 'VARCHAR', true, 100, null);
        $this->addColumn('tkt_panitia', 'TktPanitia', 'CHAR', true, 1, null);
        $this->addColumn('sk_tugas', 'SkTugas', 'VARCHAR', true, 80, null);
        $this->addColumn('tmt_sk_tugas', 'TmtSkTugas', 'DATE', true, null, null);
        $this->addColumn('tst_sk_tugas', 'TstSkTugas', 'DATE', false, null, null);
        $this->addColumn('a_pasang_papan', 'APasangPapan', 'DECIMAL', true, 65536, null);
        $this->addColumn('a_formulir', 'AFormulir', 'DECIMAL', true, 65536, null);
        $this->addColumn('a_silabus', 'ASilabus', 'DECIMAL', true, 65536, null);
        $this->addColumn('a_berlaku_pos', 'ABerlakuPos', 'DECIMAL', true, 65536, null);
        $this->addColumn('a_sosialisasi_pos', 'ASosialisasiPos', 'DECIMAL', true, 65536, null);
        $this->addColumn('a_ks_edukatif', 'AKsEdukatif', 'DECIMAL', true, 65536, null);
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
        $this->addRelation('JenisKepanitiaan', 'DataDikdas\\Model\\JenisKepanitiaan', RelationMap::MANY_TO_ONE, array('id_jns_panitia' => 'id_jns_panitia', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('Sekolah', 'DataDikdas\\Model\\Sekolah', RelationMap::MANY_TO_ONE, array('sekolah_id' => 'sekolah_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('AktivitasKepanitiaan', 'DataDikdas\\Model\\AktivitasKepanitiaan', RelationMap::ONE_TO_MANY, array('id_panitia' => 'id_panitia', ), 'RESTRICT', 'RESTRICT', 'AktivitasKepanitiaans');
        $this->addRelation('AnggotaPanitia', 'DataDikdas\\Model\\AnggotaPanitia', RelationMap::ONE_TO_MANY, array('id_panitia' => 'id_panitia', ), 'RESTRICT', 'RESTRICT', 'AnggotaPanitias');
    } // buildRelations()

} // KepanitiaanTableMap
